@include('header')

<body>  

    <div class="container-admin">
        <div class="container-tabs">
            <button id="btnEjercicios" class="btnOpcion">Ejercicios</button>
            <button id="btnProgreso" class="btnOpcion">Progreso</button>
    
        </div>
    </div>
    

    <div id="container-contenido">
        <div id="container-tabla-entradas" class="table_component" role="region" tabindex="0">
            <table>
                <caption>Table 1</caption>
                <thead>
                    <tr>
                        <th>Imagen destacada</th>
                        <th>Titulo</th>
                        <th>Fecha</th>
                        <th>Categorias</th>
                        <th></th>
                        
                       
                    </tr>
                   
                </thead>
                <tbody>
                    @foreach($entradas as $entrada)
                    <tr>
                        <td class="container-imagenDestacada"><img class="imagenDestacada" src="{{asset($entrada->imagenDestacada)}}" alt="Imagen destacada"></td>
                        <td>{{$entrada ->titulo_entrada }}</td>
                        <td>{{$entrada->fecha_creacion}}</td>
                        <td>
                        @if($entrada->categoria)
                            {{$entrada->categoria->nombre_categoria}}
                        @else
                            Sin categoria

                        @endif
                    </td>
                    <td>
                      
                        {{--PARA MOSTRAR LA GALERIA
                         @foreach(json_decode($entrada->galeria) as $imagen)
                        <img src="{{ asset($imagen) }}" alt="Imagen de la galería">
                        @endforeach --}}
                    

                        <div>
                            <form action="/entrada/{{$entrada->id_entrada}}" method="post">
                                @csrf
                                @method("DELETE")
        
                                <button class="btn-accion">Borrar</button>

                            </form>
                        </div>
                    </td>
                  
                        
                    </tr>
                       

                    @endforeach

                </tbody>
            </table>
            
            </div>

            <div class="container-btn-agregar-entrada">
                <a class="btn-1" href="{{route('ejercicio-create')}}">Agregar entrada</a>
            </div>

    </div>

</body>




@include('footer')