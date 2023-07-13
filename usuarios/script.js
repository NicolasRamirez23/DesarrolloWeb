$("#data").append(
    `<tr>
        <td>Folio</td>
        <td>Fecha</td>
        <td>Hora</td>
        <td>Nombre</td>
        <td>Usuario</td>
        <td>Editar</td>
        <td>Eliminar</td>
    </tr>`
    )

$.ajax({
    url: "api.php",
    type: "GET",
    data: {
        opcion:"mostrar"
    },
    success: function(response){ 
        
        var datos = JSON.parse(response);
        
        datos.forEach(function(objeto){

            $("#data").append(`<tr>
            <td>${objeto.folio}</td>
            <td>${objeto.fecha}</td>
            <td>${objeto.hora}</td>
            <td>${objeto.nombre}</td>
            <td>${objeto.usuario}</td>
            <td><button type="boton" class="btn-editar" id=editar${objeto.folio} data-folio="${objeto.folio}">Editar</button></td>
            <td><button type="boton" class="btn-eliminar" id=elimnar${objeto.folio} data-folio="${objeto.folio}">Eliminar</button></td>
            </tr>`)

        });           
    },
    error: function(error){
        console.error(error);
    }
});



$('body').on('click', '.btn-eliminar', function(){


    var folioEliminar = document.getElementById("folioeliminar").value;
        eliminar(folioEliminar);
        
});


$("#registro").click(function(){

    window.location.href = "view/registro/registro.php";
})


$("#regresar").click(function(){

    window.location.href = "../dashboard/index.php";
})



$('body').on('click', '.btn-editar', function(){
    window.location.href = "view/editar.php";
});


function eliminar(id){
    $.ajax({
        url:"api.php",
        type:"POST",
        data: {
            opcion:"eliminar",
            folio: id
        },
        success: function(datos){
            
            if(datos==2){
                alert("Usuario #"+id+" eliminado correctamente");
                window.location.href = "../index.php";
            }if(datos==3){
                alert("Error al eliminar usuario");
            }
        }
})
}


    


 