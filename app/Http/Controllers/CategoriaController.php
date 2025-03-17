<?php

namespace App\Http\Controllers;

use App\Models\CategoriaModel;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    function mostrarCategorias(){
        $categorias = CategoriaModel::all();

        return view()
    }
}
