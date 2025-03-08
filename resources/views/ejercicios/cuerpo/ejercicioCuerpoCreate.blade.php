@include('header')

<body>
    <div class="container-form-agregar-entrada">

        <form action="{{route('ejercicio-store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <label for="">Titulo</label>
            <input type="text" name="titulo-entrada" id="titulo-entrada">
            @error('titulo-entrada')
            <div>{{$message}}</div>
            @enderror
            
            <label for="">Descripcion</label>
            <input type="text" name="descripcion-entrada" id="descripcion-entrada">
            @error('descripcion-entrada')
            <div>{{$message}}</div>
            @enderror
    
            
            <label for="">Imagen Destacada</label>
            <input type="file" name="img-entrada" id="img-entrada">
            @error('img-entrada')
            <div>{{$message}}</div>
            @enderror
            <button type="submit">Agregar Entrada</button>
        </form>
    
    </div>
    
</body>

@include('footer')