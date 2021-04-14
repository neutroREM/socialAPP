<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use MongoDB\Driver\Session;


class UsuarioController extends Controller
{

    //Crear
    public function crear(){
        $usuario = new Usuario();
        $usuario->correo = "";
        $usuario->password = "";
        $verificar = $usuario->save();
        if($verificar){
            echo json_encode(["estatus" => "success"]);
        }else{
            echo json_encode(["estatus" => "error"]);
        }
    }
    //Editar
    public function editar($id)
    {
        $usuario = Usuario::find($id);
        $usuario->correo = "";
        $usuario->password = "";
        $verificar = $usuario->save();
        if($verificar){
            echo json_encode(["estatus" => "success"]);
        }else{
            echo json_encode(["estatus" => "error"]);
        }
    }

    //Mostrar
    public function mostrar($id)
    {
        $usuario = Usuario::find($id);
        if($usuario){
            echo json_encode(["estatus" => "success","usuario" => $usuario]);
        }else{
            echo json_encode(["estatus" => "error"]);
        }
    }
    //mostrarTodo
    public function mostrarTodo()
    {
        $usuarios = Usuario::get();
        if($usuarios){
            echo json_encode(["estatus" => "success","usuarios" => $usuarios]);
        }else{
            echo json_encode(["estatus" => "error"]);
        }
    }
    //Eliminar
    public function eliminar($id)
    {
        $usuario = Usuario::find($id);
        $verificar = $usuario->delete();
        if($verificar){
            echo json_encode(["estatus" => "success"]);
        }else{
            echo json_encode(["estatus" => "error"]);
        }
    }
    public function inicio(){
        return view('inicio');
    }

    public function menu(){
        return view('menu');
    }

    //Registro de usuario nuevo
    public function registro(Request $datos){
        if(!$datos->nombre || !$datos->apellido || !$datos->edad || !$datos->correo || !$datos->contrasenia || !$datos->contrasenia2 || !$datos->masculino || !$datos->femenino){
            return view('inicio', ["estatus" => "error", "mensaje" => "Falta información"]);
        }

        $usuario = Usuario::where('correo',$datos->correo)->first();
        if($usuario)
            return view("inicio",["estatus"=> "error", "mensaje"=> "¡El correo ya se encuentra registrado!"]);

        $nombre = $datos->nombre;
        $apellido = $datos->apellido;
        $edad = $datos->edad;
        $correo = $datos->correo;
        $contrasenia = $datos->contrasenia;
        $contrasenia2 = $datos->contrasenia2;
        $masculino = $datos->masculino;
        $femenino = $datos->femenino;

        if($contrasenia != $contrasenia2){
            return view("inicio",["estatus" => "¡Las contraseñas son diferentes!"]);
        }

        $usuario = new Usuario();
        $usuario->nombre = $nombre;
        $usuario->apellido = $apellido;
        $usuario->edad = $edad;
        $usuario->correo = $correo;
        $usuario->contrasenia = bcrypt($contrasenia);
        $usuario->hombre = $masculino;
        $usuario->mujer = $femenino;
        $usuario->save();
        return view("inicio",["estatus"=> "success", "mensaje"=> "¡Cuenta Creada!"]);
    }

    //Ingreso al menu de usuario
    public function ingreso(Request $datos){

        if(!$datos->correo || !$datos->contrasenia){
            return view('inicio', ["estatus" => "error", "mensaje" => "Completa los campos"]);
        }

        $usuario = Usuario::where("correo", $datos->correo)->first();
        if(!$usuario){
            return view('inicio', ["estatus"=> "error", "mensaje"=> "¡El correo no esta registrado!"]);
        }

        if(!Hash::check($datos->contrasenia, $usuario->contrasenia)){
            return view('inicio', ["estatus"=> "error", "mensaje"=> "¡Datos incorrectos!"]);
        }

        \Illuminate\Support\Facades\Session::put('usuario', $usuario);

        if(isset($datos->url)){
            $url = decrypt($datos->url);
            return redirect($url);
        }else{
            return redirect()->route('usuario.menu');
        }
    }

    public function cerrarSesion(){
        if(\Illuminate\Support\Facades\Session::has('usuario'))
            \Illuminate\Support\Facades\Session::forget('usuario');

        return redirect()->route('inicio');
    }
}
