<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

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
 
public function formularioValidar(Request $request){
    $user = $request->input('user');
    $pass = $request->input('pass');
    
    // Verificar si el usuario existe en la base de datos
    $userExists = DB::table('TableUsuarios')
        ->where('strLogin', $user)
        ->exists();

    if (!$userExists) {
        throw ValidationException::withMessages([
            'user' => 'Usuario no existe.',
        ]);
    }

    // Verificar si las credenciales son válidas
  /*  $credentials = [
        'strPassword' => $pass,
    ];

    if (!Auth::attempt($credentials)) {
        throw ValidationException::withMessages([
            'pass' => 'Contraseña incorrecta.',
        ]);
    }*/
    
    return redirect()->route('getUsuarios');
}
   
    public function getComic($id){
        $comics = DB::table('comics')
        ->where("id","=",$id)
        ->first();
        $Editcomic = [
            "id"=>$comics->id,
            "title"=>$comics->title,
            "author"=>$comics->author,
            "publisher"=> $comics->publisher,
            "year"=>$comics->year,
            "description"=>$comics->description
        ];
        return view('comics', $Editcomic);
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
        $usuario = [
            'idUsuarios' => '',
            'idStatus' => '',
            'strNombre' => '',
            'strApellidoPaterno' => '',
            'strApellidoMaterno' => '',
            'strLogin' => '',
            'strPassword' => ''
        ];
        return view('Usuarios',$usuario);
    }
    public function getUsuarios(){
        $usuarios = DB::table('TableUsuarios')
        ->get();

        
        return view('tableViewUsuarios',['usuarios' => $usuarios]);
    }
   
  
    public function getUsuario($idUsuarios){
        $usuario = DB::table('TableUsuarios')
        ->where("idUsuarios","=",$idUsuarios)
        ->first();
        $editUsuario = [
            "idUsuarios"=>$usuario->idUsuarios,
            "idStatus"=>$usuario->idStatus,
            "strNombre"=>$usuario->strNombre,
            "strApellidoPaterno"=> $usuario->strApellidoPaterno,
            "strApellidoMaterno"=>$usuario->strApellidoMaterno,
            "strLogin"=>$usuario->strLogin,
            "strPassword"=>$usuario->strPassword
        ];
        return view('Usuarios', $editUsuario);
    }
    public function updateUsuario(Request $request){
        $validator = Validator::make($request->all(), [
            'idStatus' => 'required|in:Activo,Inactivo',
            'strNombre' => 'required|string',
            'strApellidoPaterno' => 'required|string',
            'strApellidoMaterno' => 'required|string',
            'strLogin' => 'required|string',
            'strPassword' => 'required|string',
        ]);
    
        if ($validator->fails()) {
            // Si la validación falla, agregar los errores y mostrar un mensaje
    
            return redirect()->back()->withErrors($validator)->with('error', 'Hubo un error en el formulario. Por favor, verifica los campos e inténtalo de nuevo.');
        }
        $editUsuario = [
            'idUsuarios' => $request->input('idUsuarios'),
            'idStatus' => $request->input('idStatus'),
            'strNombre' => $request->input('strNombre'),
            'strApellidoPaterno' => $request->input('strApellidoPaterno'),
            'strApellidoMaterno' => $request->input('strApellidoMaterno'),
            'strLogin' => $request->input('strLogin'),
            'strPassword' => $request->input('strPassword')
        ];
     
        $usuarioEdited = DB::table('TableUsuarios')
        ->where("idUsuarios","=",$request->input('idUsuarios'))
        ->update($editUsuario);
        
        return redirect()->route('getUsuarios');
    }
    public function insertUsuario(Request $request){
        $validator = Validator::make($request->all(), [
            'idStatus' => 'required|string',
            'strNombre' => 'required|string',
            'strApellidoPaterno' => 'required|string',
            'strApellidoMaterno' => 'required|string',
            'strLogin' => 'required|string',
            'strPassword' => 'required|string',
        ]);
    
        if ($validator->fails()) {
            // Si la validación falla, agregar los errores y mostrar un mensaje
    
            return redirect()->back()->withErrors($validator)->with('error', 'Hubo un error en el formulario. Por favor, verifica los campos e inténtalo de nuevo.');
        }
        $usuario = DB::table('TableUsuarios')
        ->insert([
            'idStatus' => $request->input('idStatus'),
            'strNombre' => $request->input('strNombre'),
            'strApellidoPaterno' => $request->input('strApellidoPaterno'),
            'strApellidoMaterno' => $request->input('strApellidoMaterno'),
            'strLogin' => $request->input('strLogin'),
            'strPassword' => $request->input('strPassword')
        ]);
    
     return redirect()->route('getUsuarios');
    }
    public function borrarUsuario($idUsuarios)
    {
        $usuarioDeleted = DB::table('TableUsuarios')
            ->where("idUsuarios", "=", $idUsuarios)
            ->delete();
    
        $usuarios = DB::table('TableUsuarios')
            ->get();
    
            return redirect()->route('getUsuarios');
    }
    
}
