<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function registro(Request $request){
        $data = $request->validate([
            "nombre" => ['required'],
            "apellido" => ['required'],
            "username" => ['required', 'min:2', 'max:12', 'alpha_dash'],
            "email" => ["required", "email"],
            "edad" => ["required"],
            "peso" => ["required"],


            "password" => ['required', 'regex:/^(?=.*[A-Za-z])(?=.*\d).+$/', 'confirmed'],
            "img_perfil"=>['image','mimes:jpeg,png,jpg,gif', 'max:2048']

        ],
        [
            "nombre.required" => "Este campo es obligatorio",
            "apellido.required" => "Este campo es obligatorio",
            "username.required" => "Este campo es obligatorio",
            "edad.required"=> "Este campo es obligatorio",
            "peso.required"=> "Este campo es obligatorio",

            "username.min" => "Este campo necesita más de 2 caracteres",
            "username.max" => "Este campo no puede tener màs de 12 caracteres",
            "username.alpha_dash" => "Este campo solo soporte valores alfanumericos y guiones",
            "email.required" => "Este campo es obligatorio",
            "email.email" => "Este campo tiene que ser un email",
            "password.required" => "Este campo es obligatorio",
            "password.regex" => "La contraseña necesita minimo 1 letra y 1 numero!",
            "password.confirmed" => "Las contraseñas no coinciden",
            "img_perfil.image"=> "Este archivo no es una imagen",
            "img_perfil.mimes" => "La imágen deben estar en formato jpeg, png, jpg o gif!",
            "img_perfil.max" => "La imagen no puede superar los 2 MB!"

        ]
        
        );

        $data["password"] = bcrypt($data["password"]);

        if($request->hasFile('img_perfil')){
            $nombreArchivo = uniqid().'_'. $request->file('img_perfil')->getClientOriginalName();


            $request->file('img_perfil')->move(public_path('images/imgPerfil'), $nombreArchivo);

             // Guardar la ruta de la imagen en la base de datos
             $data['imgDePerfil'] = 'images/imgPerfil/' . $nombreArchivo;
        }


        User::create($data);


        return response()->redirectTo('/')->with("success", "Se registro con exito");


    }

    public function login(Request $request){
        $data = $request -> validate([
                "username_login"=>['required'],
                "password_login"=>['required'],
                

            ],
            [
                "username_login.required" => "Este campo es obligatorio",
                "password_login.required" => "Este campo es obligatorio",
                

            ]
        );

       
        if(Auth::attempt (["username" => $data["username_login"], "password"=> $data["password_login"]])){
            $request->session()->regenerate();
            return redirect()->intended("/");
        }

    }

    public function logout(){
        Auth::logout();

        return response()->redirectTo('/');
    }



}
