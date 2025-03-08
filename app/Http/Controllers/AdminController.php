<?php

namespace App\Http\Controllers;

use App\Models\EntradaModel;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function mostrarPanel(Request $request){
        $entradas = EntradaModel::all();


        return view('admin.vistaAdmin', compact('entradas'));
    }
}
