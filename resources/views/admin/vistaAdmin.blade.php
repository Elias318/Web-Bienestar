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
                        <td></td>
                        <td class="container-btns"><button>Borrar</button> <button>Editar</button></td>
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