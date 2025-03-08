@include('header');

<body>

    <div class="container-loggin">
        <div class="container-logo-loggin">
            <img src="./images/logo.png" alt="">
    
        </div>
    
    
        <div class="container-form">
    
    
            <form action="{{route('registro')}}" method="POST" enctype="multipart/form-data">
                @csrf

                <label for="">Nombre de usuario:</label>
                <input type="text" name="username" id="nombre_usuario" >
                @error("username")
                    <div>{{$message}}</div>

                @enderror

                <label for="">Nombre:</label>
                <input type="text" name="nombre" id="nombre_usuario" value="{{old('nombre')}}">
                @error("nombre")
                <div>{{$message}}</div>

                @enderror

                <label for="">Apellido:</label>
                <input type="text" name="apellido" id="nombre_usuario" value="{{old('apellido')}}">
                @error("apellido")
                <div>{{$message}}</div>
                @enderror


                <label for="">Edad:</label>
                <input type="number" name="edad" id="edad_usuario" value="{{old('edad')}}">
                @error("edad")
                <div>{{$message}}</div>

                @enderror

                <label for="">Peso:</label>
                <input type="number" name="peso" id="peso_usuario" value="{{old('peso')}}">
                @error("peso")
                <div>{{$message}}</div>

                @enderror

                
                <label for="">email:</label>
                <input type="email" name="email" id="email_usuario" value="{{old('email')}}">
                @error("email")
                <div>{{$message}}</div>

                @enderror
                <label for="">Contraseña:</label>
                <input type="password" name="password"  id="password_usuario">
                @error("password")
                <div>{{$message}}</div>

                @enderror
                <label for="">Repetir contraseña:</label>
                <input name="password_confirmation" type="password" id="password_usuario">
                @error("password_confirmation")
                <div>{{$message}}</div>
                @enderror

                <label for="">Imagen de perfil:</label>
                <input name="img_perfil" type="file" id="img_perfil">
                @error("img_perfil")
                <div>{{$message}}</div>

                @enderror
                <div class="container-btn-loggin">
                    <button class="btn-2" type="submit">Crear cuenta</button>
                </div>
               
    
            </form>
    
            <div class="container-opciones-logueo">
    
            </div>
    
        </div>
    </div>
    

</body>
@include('footer');