let btnEjercicios = document.getElementById("btnEjercicios");
let btnProgreso = document.getElementById("btnProgreso");
let botonesOpciones = document.querySelectorAll(".btnOpcion");
let divContenidoAdmin = document.getElementById("container-contenido");




btnEjercicios.addEventListener("click",function(){

   divContenidoAdmin.innerHTML = "";
  
    let contenido = document.createElement("div");

    contenido.innerHTML = `
    <div class="table_component" role="region" tabindex="0">
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
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td class="container-btns"><button>Borrar</button> <button>Editar</button></td>
                
                
            </tr>
        </thead>
        <tbody></tbody>
    </table>
    
    </div>`;

    divContenidoAdmin.appendChild(contenido);
    
});


btnProgreso.addEventListener("click",function(){

    divContenidoAdmin.innerHTML = "";
        btnProgreso.classList="active"
     let contenido = document.createElement("div");
 
     contenido.innerHTML =  `
        <div class="table_component" role="region" tabindex="0">
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
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td class="container-btns"><button>Borrar</button> <button>Editar</button></td>
                
                
            </tr>
        </thead>
        <tbody></tbody>
    </table>
    
    </div>`
 
     divContenidoAdmin.appendChild(contenido);
     
});

botonesOpciones.forEach(boton =>{
    boton.addEventListener("click", function(){
        botonesOpciones.forEach(btn=>btn.classList.remove("active"));

        this.classList.add("active");
    });
})

document.querySelector('.menu-toggle').addEventListener('click', function() {
    document.querySelector('.menu-gral').classList.toggle('active');
});



