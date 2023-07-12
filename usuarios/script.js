$("#data").append(
    `<tr>"
        <td>Folio</td>
        <td>Fecha</td>
        <td>Hora</td>
        <td>Nombre</td>
        <td>Usuario</td>
    </tr>`

    ,$.ajax({
        url: "api.php",
        type: "GET",
        success: function(response){
            
            var datos = JSON.parse(response);
            

            datos.forEach(function(objeto){
                var tabla = document.getElementById("data");
                var fila = document.createElement("tr");

                var celdaFolio = document.createElement("td");
                var celdaFecha = document.createElement("td");
                var celdaHora = document.createElement("td");
                var celdaNombre = document.createElement("td");
                var celdaUsuario = document.createElement("td");
                
                /*
                var celdaEditar = document.createElement("td");
                var celdaEliminar = document.createElement("td");
                */

                celdaFolio.innerHTML = objeto.folio;
                fila.appendChild(celdaFolio);

                celdaFecha.innerHTML = objeto.fecha;
                fila.appendChild(celdaFecha);
                
                celdaHora.innerHTML = objeto.hora;
                fila.appendChild(celdaHora);
                
                celdaNombre.innerHTML = objeto.nombre;
                fila.appendChild(celdaNombre);

                celdaUsuario.innerHTML = objeto.usuario;
                fila.appendChild(celdaUsuario);

                /*
                celdaEditar.innerHTML = `<button type="button" id="editar${objeto.folio}">Editar</button>`;
                fila.appendChild(celdaEditar);

                var variableEliminar = "eliminar"+objeto.folio;
                eliminar(variableEliminar);

                celdaEliminar.innerHTML = `<button type="button" id="eliminar${objeto.folio}">Eliminar</button>`;
                fila.appendChild(celdaEliminar);
                */
                


               tabla.appendChild(fila);
            });           
        },
        error: function(error){
            console.error(error);
        }
    }
));

$("#registro").click(function(){

    window.location.href = "view/registro.php";
})

$("#eliminar").click(function(){

    window.location.href = "view/eliminar.php";

})

$("#editar").click(function(){

    window.location.href = "view/editar.php";

})

$("#regresar").click(function(){

    window.location.href = "../dashboard/index.php";
})


    


 