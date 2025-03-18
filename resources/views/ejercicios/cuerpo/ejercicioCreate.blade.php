@include('header')

<body>
    <div class="container-agregar-entrada">

        <div class="container-form-agregar-entrada">
            <form action="{{route('ejercicio')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <label for="">Titulo</label>
                <input type="text" name="titulo-entrada" id="titulo-entrada" value="{{old('titulo-entrada')}}">
                @error('titulo-entrada')
                <div class="">{{$message}}</div>
                @enderror
                
                <label for="">Descripcion</label>
                <input type="text" name="descripcion-entrada" id="descripcion-entrada" value="{{old('descripcion-entrada')}}">
                @error('descripcion-entrada')
                <div>{{$message}}</div>
                @enderror

                <label for="">Seleccionar Categoria</label>
                <select name="categoria-entrada" id="categoria-entrada" value="{{old('categoria-entrada')}}>
                    @foreach ($categorias as $categoria)
                    <option value="{{$categoria->id_categoria}}" selected>{{$categoria->nombre_categoria}}</option>
                    @endforeach
                    

                </select>
                @error('categoria-entrada')
                <div>{{$message}}</div>
                @enderror

                <label for="">Repeticiones</label>
                <input type="number" name="repeticiones-entrada" id="repeticiones-entrada" value="{{old('repeticiones-entrada')}}">
                @error('repeticiones-entrada')
                <div>{{$message}}</div>
                @enderror

                <label for="">vueltas</label>
                <input type="number" name="vueltas-entrada" id="vueltas-entrada" value="{{old('vueltas-entrada')}}>
                @error('vueltas-entrada')
                <div>{{$message}}</div>
                @enderror

                <label for="">Dificultad</label>
                <select name="dificultad-entrada" id="dificultad-entrada" value="{{old('dificultad-entrada')}}">
                    <option value="Facil" selected>Facil</option>
                    <option value="Normal">Normal</option>
                    <option value="Dificil">Dificil</option>
                </select>
                @error('dificultad-entrada')
                <div>{{$message}}</div>
                @enderror
                
                <label for="">Imagen Destacada</label>
                <input type="file" name="img-entrada" id="img-entrada">
                @error('img-entrada')
                <div>{{$message}}</div>
                @enderror
    
    
                <label for="">Galeria de imagenes</label>
                <input type="file" name="galeria-entrada[]" id="galeria-entrada" accept="image/*" multiple>
                @error('galeria-entrada')
                <div>{{$message}}</div>
                @enderror
                <button type="submit">Agregar Entrada</button>
            </form>
        
        </div>

        
    </div>
    
</body>

@include('footer')