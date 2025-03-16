<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;700&display=swap" rel="stylesheet">

        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;700&display=swap" rel="stylesheet">

        <!-- Styles / Scripts -->
        <link rel="stylesheet" href="css/header.css">
        <link rel="stylesheet" href="css/home.css">
        <link rel="stylesheet" href="css/inicio_session.css">
        <link rel="stylesheet" href="css/vistaAdmin.css">




    </head>


    <header>
        <div class="container-logo">
            <a class="navbar-brand p-ajuste-logo" href="#">
                <img src={{asset('images/logo.png') }} alt="Logo" class="m-ajuste-logo logo">
            </a>
        </div>
        <div class="header-right">
            

            @auth

                @if(auth()->user()->rol === 'Cliente')

                
                    <div class="container-logueado">
                        <form action="{{route('logout')}}" method="POST">
                            @csrf
                            <button  type="submit">Salir</button>
                        </form>
                        <a href="#">Cuenta</a>
                        <h4>{{Auth::user()->username}}</h4>
                        <div>
                            @if(Auth::user()->imgDePerfil == NULL)
                            <img class="imagen-perfil-header" src="{{asset('/images/imgPerfil/imgDefault.png' )}}" alt="Imagen de perfil default">
                            @else
                            <img class="imagen-perfil-header" src="{{asset(Auth::user()->imgDePerfil )}}" alt="Imagen de perfil">

                            @endif


                        </div>
                        
                        
                    </div>
                @else

                    <div class="container-logueado">
                        <a href="{{route('vistaAdmin')}}">Panel</a>
                        <form action="{{route('logout')}}" method="POST">
                            @csrf
                            <button  type="submit">Salir</button>
                        </form>
                        <a href="#">Admin</a>
                        <div>
                            @if(Auth::user()->imgDePerfil == NULL)
                            <img class="imagen-perfil-header" src="{{asset('/images/imgPerfil/imgDefault.png' )}}" alt="Imagen de perfil default">
                            @else
                            <img class="imagen-perfil-header" src="{{asset(Auth::user()->imgDePerfil )}}" alt="Imagen de perfil">

                            @endif
                        </div>
                        
                        
                    </div>
               

                @endif

            @else

                <div class="container-btns-logueo">
                    <a href="{{route('crear-cuenta')}}">Registrarse</a>
                    <a href="{{route('iniciar-sesion')}}">Iniciar Sesión</a>
                </div>
            @endauth
    
            <!-- Menú hamburguesa -->
            <div class="menu-toggle" id="menu-toggle">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </div>
    
            <nav>
                <ul class="menu-gral">
                    <li class="menu-cuerpo">
                        <a href="#">CONECTATE CON TU CUERPO ▼</a>
                        <ul class="submenu-cuerpo">
                            <li><a href="#">Ejercicios del mes</a></li>
                            <li><a href="#">Definí tus objetivos</a></li>
                            <li><a href="#">Compartí tu progreso</a></li>
                        </ul>
                    </li>
    
                    <li class="menu-mente">
                        <a href="#">CONECTATE CON TU MENTE ▼</a>
                        <ul class="submenu-mente">
                            <li><a href="#">Ejercicios del mes</a></li>
                            <li><a href="#">Definí tus objetivos</a></li>
                            <li><a href="#">Compartí tu progreso</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
    </header>
    
    