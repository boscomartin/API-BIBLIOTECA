<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LibroPrestado;
class LibroPrestadoController extends Controller
{
    public function listarPrestados(){
        $response= LibroPrestado::all(['fecha_prestamo', 'fecha_devolucion', 'user_id', 'libro_id']);
        return response()-> json($response);
    }
    public function crearPrestamo(Request $request){
        $response = array('ok_code' => 200, 'ok_msg' => 'Prestamo registrado con éxito');
        $prestado = new LibroPrestado;
        $prestado->libro_id=$request->input('libro_id');
        $prestado->fecha_prestamo=$request->input('fecha_prestamo');
        $prestado->fecha_devolucion=$request->input('fecha_devolucion');
        $prestado->user_id=$request->input('user_id');
        $prestado->save();
        return response()-> json($response);
    }
    public function devolucionLibro(Request $request, $id){
        $response = array('ok_code' => 200, 'ok_msg' => 'El libro ha sido devuelto');
        LibroPrestado::where('id', $id)->update(['fecha_devolucion' => $request->fecha_devolucion]);
        return response()-> json($response);
    }
}
