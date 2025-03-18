<?php

namespace App\Http\Controllers;

use App\Models\CategoriaModel;
use App\Models\EntradaModel;
use Illuminate\Http\Request;

class EntradaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request){
        $categorias = CategoriaModel::all();

        if ($request->has('categoria_id')) {
            $entradas = EntradaModel::with('categoria') // Cargar relación con la categoría
                ->where('categoria_id', $request->categoria_id)
                ->get();
        } else {
            $entradas = EntradaModel::with('categoria')->get();
        }

        if ($request->ajax()) {
            return response()->json($entradas);
        }

        return view('ejercicios.cuerpo.ejercicios', compact('entradas', 'categorias'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $categorias = CategoriaModel::all();
        return view('ejercicios.cuerpo.ejercicioCreate', compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $data = $request->validate([
            "titulo-entrada"=>['required'],
            "descripcion-entrada"=>['required'],
            "img-entrada"=>['image','mimes:jpeg,png,jpg,gif', 'max:2048'],
            "categoria-entrada"=>['required'],
            "repeticiones-entrada"=>['required'],
            "vueltas-entrada"=>['required'],
            "dificultad-entrada"=>['required'],

            "galeria-entrada.*" => ['image', 'mimes:jpeg,png,jpg,gif', 'max:2048','required'],
        ],[
            "titulo-entrada.required" => "Este campo es obligatorio",
            "descripcion-entrada.required" => "Este campo es obligatorio",

            "img-entrada.image"=> "Este archivo no es una imagen",
            "img-entrada.mimes" => "La imágen deben estar en formato jpeg, png, jpg o gif!",
            "img-entrada.max" => "La imagen no puede superar los 2 MB!",

            "repeticiones-entrada.required" => "Este campo es obligatorio",
            "vueltas-entrada.required" => "Este campo es obligatorio",
            "dificultad-entrada.required" => "Este campo es obligatorio",

            "galeria-entrada.*.image" => "Uno de los archivos no es una imagen",
            "galeria-entrada.*.mimes" => "Las imágenes deben estar en formato jpeg, png, jpg o gif!",
            "galeria-entrada.*.max" => "Cada imagen no puede superar los 2 MB!"


        ]);
        
       
        $rutaImagen=Null;
        $rutasGaleria = [];
        if($request->hasFile('img-entrada')){
            $nombreArchivo = uniqid().'_'. $request->file('img-entrada')->getClientOriginalName();

            $rutaImagen = 'images/imgEntradas/' . $nombreArchivo;
            $request->file('img-entrada')->move(public_path('images/imgEntradas'), $nombreArchivo);

        }

        if($request->hasFile('galeria-entrada')){
           

            foreach($request->file('galeria-entrada') as $imagen){
                $nombreArchivo = uniqid() . '_' . $imagen->getClientOriginalName();
                $ruta = 'images/imgEntradas/' . $nombreArchivo;
                $imagen->move(public_path('images/imgEntradas'), $nombreArchivo);
                $rutasGaleria[] = $ruta; // Guardamos la ruta
            }
            


        }

        $entrada = EntradaModel::create([

            'titulo_entrada'=>$data['titulo-entrada'],
            'descripcion_entrada'=> $data['descripcion-entrada'],
            'fecha_creacion'=>now(),
            'repeticiones'=> $data['repeticiones-entrada'],
            'vueltas'=> $data['vueltas-entrada'],
            'dificultad'=> $data['dificultad-entrada'], 
            'imagenDestacada'=> $rutaImagen,
            'categoria_id'=>$data['categoria-entrada'],
            'galeria'=>json_encode($rutasGaleria)
        ]);



        return response()-> redirectTo("vistaAdmin")->with('success',"Entrada agregada correctamente");
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
       
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
    public function destroy(EntradaModel $entrada)
    {
        $entradaABorrar = $entrada->delete();

        if($entradaABorrar){
             return back()->with("success", "Se elimino el producto correctamente");
        }else{
             return back()->with("fail" ,"No se pudo eliminar");
        }
    }



    public function filtrarPorCategoria($id){
        $entradas= EntradaModel::where('categoria_id', $id)->get();
        return response()->json($entradas);
    }
}
