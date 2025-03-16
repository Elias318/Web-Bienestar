@include('header')

<body>

    <div class="container-loggin">
        <div class="container-logo-loggin">
            <img src="./images/logo.png" alt="">
    
        </div>
    
    
        <div class="container-form">
            @if(session('error'))
                <div class="alert alert-danger">
                    {{session('error')}}
                </div>
            @endif
    
            <form action="{{route('login')}}" method="POST">
                @csrf
                <label for="">Nombre de usuario:</label>
                <input type="text" name="username_login" id="nombre_usuario">
                @error("username_login")
                    <div>{{$message}}</div>
                @enderror
                <label for="">Contraseña:</label>
                <input type="password" name="password_login" id="password_usuario">
                @error("password_login")
                    <div>{{$message}}</div>
                @enderror
                
    
                <div class="container-btn-loggin">
                    <button class="btn-2" type="submit">Ingresar</button>
                </div>
                
    
            </form>
    
            <div class="container-opciones-logueo">
    
            </div>
    
        </div>
    </div>
    

</body>
@include('footer')