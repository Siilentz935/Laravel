<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Log;
class LogsController extends Controller
{
    //LogsController
    public function getLogs(Request $request)
    {
        
        $validator = Validator::make($request->all(), [
            'rev' => 'nullable|regex:/^[0-9.]+$/',
            'src_addr' => 'nullable|regex:/^[0-9.]+$/',
            'src_port' => 'nullable|regex:/^[0-9.]+$/',
            'dst_addr' => 'nullable|regex:/^[0-9.]+$/',
            'dst_port' => 'nullable|regex:/^[0-9.]+$/',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors('filtro invalido')->withInput();
        }
        $rev = $request->input('se', '');
        $src_addr = $request->input('ipO', '');
        $src_port = $request->input('pO', '');
        $dst_addr = $request->input('ipD', '');
        $dst_port = $request->input('pD', ''); 

        $logsQuery = Log::query();
        
        // Aplicar filtro solo si se proporciona un término de búsqueda
        if ($dst_port !== '' || $dst_addr !== ''|| $src_port !== ''|| $src_addr !== '') {  
            if ($rev != '') {
                $logsQuery->where('rev', '=', $rev);
            }     
            $logsQuery->where('rev', 'LIKE',$rev !== '' ? '%' . $rev . '%' : '%')
                ->where('src_addr', 'LIKE',$src_addr !== '' ? '%' . $src_addr . '%' : '%')
                ->where('src_port', 'LIKE',$src_port !== '' ? '%' . $src_port . '%' : '%')
                ->where('dst_addr', 'LIKE',$dst_addr !== '' ? '%' . $dst_addr . '%' : '%')
                ->where('dst_port', 'LIKE',$dst_port !== '' ? '%' . $dst_port . '%' : '%');
        } else {
            $logsQuery = Log::query();
        }
            // Ordenar los registros de forma ascendente o descendente
        $order = $request->input('order', 'asc');
        $logsQuery->orderBy('id', $order);
        
        // Aplicar paginación con 50 registros por página
      $logsSinPaginar = $logsQuery->get();
        $logs = $logsQuery->paginate(30);
        
        // Crear la respuesta con la vista
        $response = response()->view('tableViewReportes', ['logs' => $logs,'logsSinPaginar'=>$logsSinPaginar]);
        
        // Desactivar el almacenamiento en caché de la respuesta
        $response->header('Cache-Control', 'no-store, no-cache, must-revalidate, max-age=0');
      
        // Devolver la respuesta
        return $response;
    }
    
    public function updateAlert($id)
    {
        $log = Log::find($id);

        // Realiza validaciones adicionales si es necesario
         // Crear la respuesta con la vista
         $response = response()->view('logView',['log' => $log]);
        
         // Desactivar el almacenamiento en caché de la respuesta
         $response->header('Cache-Control', 'no-store, no-cache, must-revalidate, max-age=0');
       
         // Devolver la respuesta
         return $response;
        
    
    }
 public function postUpdateAlert(Request $request)
        {
            $log = Log::find($request->input('id'));
    
            // Realiza validaciones adicionales si es necesario
            
            $log->update([
                'falso_positivo' => $request->input('falso_positivo'),
                'incidencia' =>$request->input('falso_positivo') === 'no' ? true : false,
                'solucion' => $request->input('solucion',''),
                // Otros campos que deseas actualizar
            ]);
            
            return redirect()->route('logs');
        
        }
    
    public function getLogToEdit($idLog)
    {
        $log = Log::find($idLog);
    
        if ($log) {
            $editLog = [
                'action' => $log->action,
                'pkt_num' => $log->pkt_num,
                'gid' => $log->gid,
                'sid' => $log->sid,
                'rev' => $log->rev,
                'msg' => $log->msg,
                'service' => $log->service,
                'src_addr' => $log->src_addr,
                'src_port' => $log->src_port,
                'dst_addr' => $log->dst_addr,
                'dst_port' => $log->dst_port,
                'solucion' => $log->solucion,
                'falso_positivo' => $log->falso_positivo,
                'incidencia' => $log->incidencia,
            ];
    
            return view('LogView', $editLog);
        } else {
            return response()->json(['message' => 'Registro no encontrado'], 404);
        }
    }
    
    public function editLog(Request $request){
        $validator = Validator::make($request->all(), [
            'solucion' => 'nullable|string|regex:/^[a-zA-Z0-9\s]+$/',
            'falso_positivo' => 'required',
        ]);
    
        if ($validator->fails()) {
            // Si la validación falla, agregar los errores y mostrar un mensaje
    
            return redirect()->back()->withErrors($validator)->with('error', 'Hubo un error en el formulario. Por favor, verifica los campos e inténtalo de nuevo.');
        }
       
        $toEditLog = Log::find($request->input('id'));

        if ($toEditLog) {
            $toEditLog->update([
                'solucion' => $request->input('solucion'),
                'falso_positivo' => $request->input('falso_positivo'),
                'incidencia' => $request->input('incidencia'),
            ]);

            return response()->json(['message' => 'Registro actualizado correctamente'], 200);
        } else {
            return response()->json(['message' => 'Registro no encontrado'], 404);
        }

        
        return redirect()->route('');
    }
   
    public function borrarLog($idLog)
    {
        $usuarioDeleted = DB::table('')
            ->where("idLog", "=", $idLog)
            ->delete();
    
            return redirect()->route('getUsuarios');
    }
    public function getDashboard(Request $request)
    {
            $allLogs = Log::orderBy('id', 'desc')->take(5)->get();
            $totalAllLogs = Log::count();
    
            $falsoPositivoLogs = Log::where('falso_positivo', 'si')->orderBy('id', 'desc')->take(5)->get();
            $totalFalsoPositivoLogs = Log::where('falso_positivo', 'si')->count();
    
            $incidenciaLogs = Log::where('incidencia', true)->orderBy('id', 'desc')->take(5)->get();
            $totalIncidenciaLogs = Log::where('incidencia', true)->count();
    
        // Crear la respuesta con la vista
        $response = response()->view('DashBoardView', compact('allLogs', 'totalAllLogs', 'falsoPositivoLogs', 'totalFalsoPositivoLogs', 'incidenciaLogs', 'totalIncidenciaLogs'));
      
    
        // Desactivar el almacenamiento en caché de la respuesta
        $response->header('Cache-Control', 'no-store, no-cache, must-revalidate, max-age=0');
    
        // Devolver la respuesta
        return $response;
    }
    
}

