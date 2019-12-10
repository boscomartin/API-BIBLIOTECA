<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Libro;

class LibrosController extends Controller
{
    public function listarTodos(){
        $response = Libro::all(['id', 'titulo', 'sinopsis', 'genero', 'autor']);
        return response()-> json($response);
    }
    public function listarPorAutor($autor){
        $response = array('error_code' => 404, 'error_msg' => 'autor  no encontrado');
        $response = Libro::where('autor',$autor)->get();
        return response()-> json($response); 
    }
    public function listarPorGenero($genero){
        $response = array('error_code' => 404, 'error_msg' => 'genero  no encontrado');
        $response = Libro::where('genero',$genero)->get();
        return response()-> json($response);
    }
    public function crearLibro(Request $request){
        $response = array('ok_code' => 200, 'error_msg' => 'libro creado');
        $libro = new Libro;
        if(!empty($libro)){
            $libro->titulo=$request->input('titulo');
            $libro->genero=$request->input('genero');
            $libro->sinopsis=$request->input('sinopsis');
            $libro->autor=$request->input('autor');
            $libro->save();  
            return response()-> json($response);
        }

    }
    public function editarLibro(Request $request, $id){
        $response = array('ok_code' => 200, 'error_msg' => 'libro editado');
        $libro = Libro::find($id);
        if(!empty($libro)){
            $libro->titulo=$request->titulo;
            $libro->genero=$request->genero;
            $libro->sinopsis=$request->sinopsis;
            $libro->autor=$request->autor;
            $libro->save();
            return response()-> json($response);
        }
    }
    public function borrarLibro(Request $request, $id){
        $response = array('ok_code' => 200, 'error_msg' => 'libro borrado');
        $libro = Libro::find($id);
        $libro->delete();
        return response()-> json($response);
    }
}
