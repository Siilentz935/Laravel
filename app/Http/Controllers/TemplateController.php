<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use App\Models\User;
use App\Models\Bitacora;
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Auth\Authenticatable;


class TemplateController extends Controller
{
    public function inicioAction(){
        return view('welcome');
    }
    public function inicioVIPaction(){
        return view('homeVIP');
    }
    public function formularioVista(){
        return view('formView');
    }
    public function createComic(){
        $comic = [
            "id"=> '',
            "title"=> "",
            "author" => "",
            "publisher" => "",
            "year" => '',
            "description" => " "
        ];
        return view('comics',$comic);
    }
    public function comicsAction(){
        $comics = DB::table('comics')
        ->orderBy('title', 'ASC')
        ->get();

        
        return view('tableViewComics',['comics' => $comics]);
    }
    public function logout(Request $request)
    {
        // Cerrar sesión del usuario actual
        Auth::logout();

        // Invalidar la sesión actual y evitar que el usuario vuelva atrás
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Redirigir al usuario a la vista de inicio de sesión
        return redirect()->route('login.submit');
    }
    public function formularioValidar(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user' => 'required|string|regex:/^[a-zA-Z0-9_.@\s]+$/',
            'pass' => 'required|string|regex:/^[a-zA-Z0-9\s]+$/',
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $user = $request->input('user');
        $pass = $request->input('pass');
    
        // Verificar si el usuario existe en la base de datos
        $userExists = User::where('strLogin', $user)->exists();
    
       
            if (!$userExists){
            return redirect()->back()->withErrors([
                'user' => 'Usuario incorrecto',
            ])->withInput();
          
        }
    
        // Obtener el usuario
        $passwordExist = User::where('strLogin', $user)->first();
    
        // Verificar si la contraseña ingresada coincide con la contraseña hasheada almacenada
        if (!Hash::check($pass, $passwordExist->strPassword)) {
            return redirect()->back()->withErrors([
                'pass' => 'Contraseña incorrecta.',
            ])->withInput();
        }
        
        // Guardar el valor en la sesión
        auth()->login($passwordExist);

        return redirect()->route('getDashboard');
    }
        
    public function updateComic($id){
        $Editcomic = [
            'title' => $request->input('title'),
            'author' => $request->input('author'),
            'publisher' => $request->input('publisher'),
            'year' => $request->input('year'),
            'description' => $request->input('description')
        ];
        $comics = DB::table('comics')
        ->where("id","=",$id)
        ->update($Editcomic);
        
        return view('comics', $Editcomic);
    }
    public function insertComic(Request $request){
       try{
        $comic = DB::table('comics')
        ->insert([
            'title' => $request->input('title'),
            'author' => $request->input('author'),
            'publisher' => $request->input('publisher'),
            'year' => $request->input('year'),
            'description' => $request->input('description')
        ]);

       } catch(\Exception $e){
    
    
        return "Usuario incorrecto o contraseña incorrectos";
    
       }
       
    }
    //Proyecto Usuarios
    public function registerUsuario(){
        $opciones = DB::table('TablecatStatus')->distinct()->pluck('strStatus');
        $usuario = new User();
        $usuario = [
            "idUsuarios" => $usuario->idUsuarios,
            "idStatus" => $usuario->idStatus,
            "strNombre" => $usuario->strNombre,
            "strApellidoPaterno" => $usuario->strApellidoPaterno,
            "strApellidoMaterno" => $usuario->strApellidoMaterno,
            "strLogin" => $usuario->strLogin,
            "strPassword" => $usuario->strPassword,
            "opciones" => $opciones
        ];
        
        return view('Usuarios',$usuario);
    }
    public function getUsuarios()
    {
      
        $usuarios = DB::table('TableUsuarios')
            ->get();
    
        // Crear la respuesta con la vista
        $response = response()->view('tableViewUsuarios', ['usuarios' => $usuarios,]);
    
        // Desactivar el almacenamiento en caché de la respuesta
        $response->header('Cache-Control', 'no-store, no-cache, must-revalidate, max-age=0');
    
        // Devolver la respuesta
        return $response;
    }
   
  
    public function getUsuario($idUsuarios)
    {
        $opciones = DB::table('TablecatStatus')->distinct()->pluck('strStatus');
        $usuario = User::where('idUsuarios', $idUsuarios)->firstOrFail();
    
        $editUsuario = [
            "idUsuarios" => $usuario->idUsuarios,
            "idStatus" => $usuario->idStatus,
            "strNombre" => $usuario->strNombre,
            "strApellidoPaterno" => $usuario->strApellidoPaterno,
            "strApellidoMaterno" => $usuario->strApellidoMaterno,
            "strLogin" => $usuario->strLogin,
            "strPassword" => $usuario->strPassword,
            "opciones" => $opciones
        ];
    
     
    
        return view('Usuarios', $editUsuario);
    }
    
    
    public function updateUsuario(Request $request){
        $validator = Validator::make($request->all(), [
            'idStatus' => 'required',
            'strNombre' => ['required', 'string', 'regex:/^[a-zA-Z0-9\s]+$/'],
            'strApellidoPaterno' => ['required', 'string', 'regex:/^[a-zA-Z0-9\s]+$/'],
            'strApellidoMaterno' => ['required', 'string', 'regex:/^[a-zA-Z0-9\s]+$/'],
            'strLogin' => ['required', 'string', 'email'],
            'strPassword' => ['required', 'string', 'regex:/^[a-zA-Z0-9\s]+$/'],
        ], [
            'idStatus.required' => 'El estado es requerido.',
            'strNombre.required' => 'El nombre es requerido.',
            'strNombre.regex' => 'Formato de nombre inválido.',
            'strApellidoPaterno.required' => 'El apellido paterno es requerido.',
            'strApellidoPaterno.regex' => 'Formato de apellido paterno inválido.',
            'strApellidoMaterno.required' => 'El apellido materno es requerido.',
            'strApellidoMaterno.regex' => 'Formato de apellido materno inválido.',
            'strLogin.required' => 'El correo es requerido.',
            'strLogin.regex' => 'Formato de correo inválido.',
            'strPassword.required' => 'La contraseña es requerida.',
        ]);
        
    
        if ($validator->fails()) {
            // Si la validación falla, agregar los errores y mostrar un mensaje
    
            return redirect()->back()->withErrors($validator)->with('error', 'Hubo un error en el formulario. Por favor, verifica los campos e inténtalo de nuevo.');
        }
     
        $usuarioAntiguo = User::find($request->input('idUsuarios'));

        $usuarioEdited = User::where('idUsuarios', $request->input('idUsuarios'))
        ->update([
            'idStatus' => $request->input('idStatus'),
            'strNombre' => $request->input('strNombre'),
            'strApellidoPaterno' => $request->input('strApellidoPaterno'),
            'strApellidoMaterno' => $request->input('strApellidoMaterno'),
            'strLogin' => $request->input('strLogin'),
            'strPassword' => bcrypt($request->input('strPassword')), // Hashear la contraseña
        ]);
        if ($usuarioEdited) {
            // Crear un nuevo registro en la tabla "bitacoras"
                $bitacora = new Bitacora();
                $bitacora->usuarioResponsable = auth()->user()->strLogin ?? 'No hubo sesión activa';
                $bitacora->accion = 'Usuario Actualizado';
                $bitacora->idUsuarios = $usuarioAntiguo->idUsuarios;
                $bitacora->idStatus = $usuarioAntiguo->idStatus;
                $bitacora->strNombre = $usuarioAntiguo->strNombre;
                $bitacora->strApellidoPaterno = $usuarioAntiguo->strApellidoPaterno; 
                $bitacora->strApellidoMaterno = $usuarioAntiguo->strApellidoMaterno;
                $bitacora->strLogin = $usuarioAntiguo->strLogin;
                $bitacora->strPassword = $usuarioAntiguo->strPassword;
                $bitacora->save();
        }
    
        
        return redirect()->route('getUsuarios');
    }
    public function insertUsuario(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'idStatus' => 'required',
            'strNombre' => ['required', 'string', 'regex:/^[a-zA-Z0-9\s]+$/'],
            'strApellidoPaterno' => ['required', 'string', 'regex:/^[a-zA-Z0-9\s]+$/'],
            'strApellidoMaterno' => ['required', 'string', 'regex:/^[a-zA-Z0-9\s]+$/'],
            'strLogin' => ['required', 'string', 'email'],
            'strPassword' => ['required', 'string', 'regex:/^[a-zA-Z0-9\s]+$/'],
        ], [
            'idStatus.required' => 'El estado es requerido.',
            'strNombre.required' => 'El nombre es requerido.',
            'strNombre.regex' => 'Formato de nombre inválido.',
            'strApellidoPaterno.required' => 'El apellido paterno es requerido.',
            'strApellidoPaterno.regex' => 'Formato de apellido paterno inválido.',
            'strApellidoMaterno.required' => 'El apellido materno es requerido.',
            'strApellidoMaterno.regex' => 'Formato de apellido materno inválido.',
            'strLogin.required' => 'El correo es requerido.',
            'strLogin.regex' => 'Formato de correo inválido.',
            'strPassword.required' => 'La contraseña es requerida.',
        ]);
        
        
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->with('error', 'Hubo un error en el formulario. Por favor, verifica los campos e inténtalo de nuevo.');
        }
        
    
        $usuario = new User();
        $usuario->idStatus = $request->input('idStatus');
        $usuario->strNombre = $request->input('strNombre');
        $usuario->strApellidoPaterno = $request->input('strApellidoPaterno');
        $usuario->strApellidoMaterno = $request->input('strApellidoMaterno');
        $usuario->strLogin = $request->input('strLogin');
        $usuario->strPassword = bcrypt($request->input('strPassword')); // Hashear la contraseña

            // Crear un nuevo registro en la tabla "bitacoras"
            $bitacora = new Bitacora();
            $bitacora->usuarioResponsable = auth()->user()->strLogin ?? 'No hubo sesión activa';
            $bitacora->accion = 'Usuario eliminado';
            $bitacora->idUsuarios = $usuario->idUsuarios;
            $bitacora->idStatus = $usuario->idStatus;
            $bitacora->strNombre = $usuario->strNombre;
            $bitacora->strApellidoPaterno = $usuario->strApellidoPaterno; 
            $bitacora->strApellidoMaterno = $usuario->strApellidoMaterno;
            $bitacora->strLogin = $usuario->strLogin;
            $bitacora->strPassword = $usuario->strPassword;
            $bitacora->save();
        $usuario->save();
    
        return redirect()->route('getUsuarios');
    }
    public function borrarUsuario($idUsuarios)
    {
        $loggedInUserId = auth()->user()->idUsuarios ?? null;
        if ($loggedInUserId && $loggedInUserId == $idUsuarios) {
            return redirect()->back()->withErrors([
                'delete_error' => 'No puedes eliminar tu propio usuario.',
            ]);
        }
        $usuarioDeleted = DB::table('TableUsuarios')
        ->where("idUsuarios", "=", $idUsuarios)
        ->first();

        $usuarioDelete = DB::table('TableUsuarios')
            ->where("idUsuarios", "=", $idUsuarios)
            ->delete();
    
            if ($usuarioDelete) {
                // Crear un nuevo registro en la tabla "bitacoras"
                $bitacora = new Bitacora();
                $bitacora->usuarioResponsable = auth()->user()->strLogin ?? 'No hubo sesión activa';
                $bitacora->accion = 'Usuario eliminado';
                $bitacora->idUsuarios = $usuarioDeleted->idUsuarios;
                $bitacora->idStatus = $usuarioDeleted->idStatus;
                $bitacora->strNombre = $usuarioDeleted->strNombre;
                $bitacora->strApellidoPaterno = $usuarioDeleted->strApellidoPaterno; 
                $bitacora->strApellidoMaterno = $usuarioDeleted->strApellidoMaterno;
                $bitacora->strLogin = $usuarioDeleted->strLogin;
                $bitacora->strPassword = $usuarioDeleted->strPassword;
                $bitacora->save();
            }
    
            return redirect()->route('getUsuarios');
    }
    public function getBitacoraUsuarios(Request $request)
    {
        $usuarios = DB::table('TableBitacoraUsuarios')
            ->get();
    
        // Crear la respuesta con la vista
        $response = response()->view('tableBitacora', ['usuarios' => $usuarios]);
    
        // Desactivar el almacenamiento en caché de la respuesta
        $response->header('Cache-Control', 'no-store, no-cache, must-revalidate, max-age=0');
    
        // Devolver la respuesta
        return $response;
    }
   public function getLogin(){

    return redirect()->route('login.submit');


   }

}
