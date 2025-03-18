document.addEventListener("DOMContentLoaded", function () {
    // Obtener todos los botones de categoría
    const botones = document.querySelectorAll(".btnCategoria");

    botones.forEach(boton => {
        boton.addEventListener("click", function (event) {
            // Evitar que otros eventos (como los botones de categorías) se mezclen
            event.preventDefault();

            let categoriaId = this.getAttribute("data-id");

            fetch(`/ejercicios?categoria_id=${categoriaId}`, {
                headers: {
                    "X-Requested-With": "XMLHttpRequest" // Indica que es AJAX
                }
            })
            .then(response => response.json())
            .then(data => {
                let contenedor = document.getElementById("container-entradas");
                contenedor.innerHTML = ""; // Limpiar contenido anterior

                if (data.length === 0) {
                    contenedor.innerHTML = "<p>No hay ejercicios en esta categoría.</p>";
                    return;
                }

                data.forEach(entrada => {
                    let entradaHTML = `
                    <div class="tarjeta-ejercicio">
                        <img class="imgDestacada" src="${entrada.imagenDestacada}" alt="Img ejercicio">
                        <div class="container-dificultad-categoria">
                            <div class="container-dificultad">
                                ${entrada.dificultad}
                            </div>

                            <div class="container-categoria">
                                ${entrada.categoria.nombre_categoria}
                            </div>
                        </div>
                        <div class="container-descripcion-ejercicio">
                            <p>
                                ${entrada.titulo_entrada}
                            </p>
                        </div>
                        <!-- Asegúrate de que el botón "Ver más" llame correctamente a la función -->
                        <button class="btnCategoriaPopUp" onclick="mostrarPopUp('${entrada.imagenDestacada}', '${entrada.descripcion_entrada}')">Ver más</button>
                    </div>

                        <!-- Pop-Up -->
                    <div class="popup-overlay" id="popupOverlay" style="display: none;"></div>

                    <div id="popup" style="display: none;">
                        <!-- Contenido dinámico se inyecta aquí -->
                    </div>
                    `;
                    contenedor.innerHTML += entradaHTML;
                });
            })
            .catch(error => console.error("Error:", error));
        });
    });
});

function mostrarPopUp(imagen, descripcion) {
    // Prevenir ejecución si no se requiere el pop-up
    if (imagen && descripcion) {
        // Mostrar pop-up
        let popup = document.getElementById("popup");
        let overlay = document.getElementById("popupOverlay");

        if (popup && overlay) {
            popup.innerHTML = `
                <div class="popup-content">
                    <img class="imgDestacada" src="${imagen}" alt="Img ejercicio">
                    <div class="container-pop-descripcion">
                        <p>${descripcion}</p>
                        <button class="btnCategoria" onclick="cerrarPopUp()">Cerrar</button>
                    </div>
                </div>
            `;
            popup.style.display = "block";
            overlay.style.display = "block";
        }
    }
}

function cerrarPopUp() {
    document.getElementById("popup").style.display = "none";
    document.getElementById("popupOverlay").style.display = "none";
}
