@include('header')

<body>
    <div class="container-agregar-entrada">

        <div class="container-form-agregar-entrada">
            <form action="{{route('ejercicio')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <label for="">Titulo</label>
                <input type="text" name="titulo-entrada" id="titulo-entrada">
                @error('titulo-entrada')
                <div class="">{{$message}}</div>
                @enderror
                
                <label for="">Descripcion</label>
                <input type="text" name="descripcion-entrada" id="descripcion-entrada">
                @error('descripcion-entrada')
                <div>{{$message}}</div>
                @enderror

                <label for="">Seleccionar Categoria</label>
                <select name="categoria-entrada" id="categoria-entrada">
                    <option value="3" selected>Sin categoría</option>
                    <option value="2">Cuerpo</option>
                    <option value="1">Mente</option>

                </select>
                
                @error('categoria-entrada')
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