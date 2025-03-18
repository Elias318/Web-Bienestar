@include('header')
    <body>
        
        <div class="container-general-blog">
            <div class="container-categorias-ejercicios">
               
                @foreach ($categorias as $categoria)
                    <button data-id="{{$categoria->id_categoria}}" class="btnCategoria">{{$categoria->nombre_categoria}}</button>
                    
                @endforeach

            </div>
            
            <div id="container-entradas">
                @foreach ($entradas as $entrada)
                <div class="tarjeta-ejercicio">
                    <img class="imgDestacada" src="{{$entrada->imagenDestacada}}" alt="Img ejercicio">
                    <div class="container-dificultad-categoria">
                        <div class="container-dificultad">
                            {{$entrada->dificultad}}
                        </div>
                        <div class="container-categoria">
                            {{$entrada->categoria->nombre_categoria}}
                        </div>
                    </div>
                    <div class="container-descripcion-ejercicio">
                        <p>
                            {{$entrada->titulo_entrada}}
                        </p>
                    </div>
                    <!-- Modificar la llamada al onclick -->
                    <button class="btnCategoriaPopUp" onclick="mostrarPopUp('{{ addslashes($entrada->imagenDestacada) }}', '{{ addslashes($entrada->descripcion_entrada) }}')">Ver más</button>

                </div>
                @endforeach 

                <!-- Pop-Up -->
                <div class="popup-overlay" id="popupOverlay" style="display: none;"></div>

                <div id="popup" style="display: none;">
                    <!-- Contenido dinámico se inyecta aquí -->
                </div>
            </div>
  

@include('footer')
