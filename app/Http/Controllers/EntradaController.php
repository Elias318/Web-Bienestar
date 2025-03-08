<?php

namespace App\Http\Controllers;

use App\Models\EntradaModel;
use Illuminate\Http\Request;

class EntradaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('ejercicios.cuerpo.ejercicioCuerpoCreate');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            "titulo_entrada"=>['required'],
            "descripcion_entrada"=>['required'],
            "img_entrada"=>['image','mimes:jpeg,png,jpg,gif', 'max:2048']



        ],[
            "titulo_entrada.required" => "Este campo es obligatorio",
            "descripcion_entrada.required" => "Este campo es obligatorio",
            "img_entrada.image"=> "Este archivo no es una imagen",
            "img_entrada.mimes" => "La imágen deben estar en formato jpeg, png, jpg o gif!",
            "img_entrada.max" => "La imagen no puede superar los 2 MB!"


        ]);

       

        if($request->hasFile('img_entrada')){
            $nombreArchivo = uniqid().'_'. $request->file('img_entrada')->getClientOriginalName();

            $rutaImagen = 'images/imgEntradas/' . $nombreArchivo;
            $request->file('img_entrada')->move(public_path('images/imgEntradas'), $nombreArchivo);

             // Guardar la ruta de la imagen en la base de datos

             $entrada = EntradaModel::create([

                'titulo'=>$data['titulo_entrada'],
                'descripcion'=> $data['descripcion_entrada'],
                'fecha_creacion'=>now(),
                'imagenDestacada'=> $rutaImagen
            ]);
            

            
        }

        return response()-> redirectTo("/")->with('success',"Entrada agregada correctamente");
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
