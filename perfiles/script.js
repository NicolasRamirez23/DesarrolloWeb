$("#data").append(
    `<tr>
        <td>Folio</td>
        <td>Fecha</td>
        <td>Hora</td>
        <td>Usuario</td>
        <td>Grupo</td>
        <td>Activo</td>
        <td>Editar</td>
        <td>Eliminar</td>
    </tr>`
    )
    
$.ajax({
    
    url: "api.php",
    type: "post",
    data:{
        opcion:"mostrarPerfiles"
    },
    success: function(response){ 
        
        var data = JSON.parse(response);
        
        
        data.forEach(function(objeto){

            $("#data").append(`<tr>
            <td>${objeto.folio}</td>
            <td>${objeto.fecha}</td>
            <td>${objeto.hora}</td>
            <td>${objeto.nombre}</td>
            <td>${objeto.descripcion}</td>
            <td>${objeto.activo}</td>
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

    var idfolio = $(this).data('folio');
    eliminar(idfolio);
 
});

$('body').on('click', '.btn-editar', function(){
    var folioPerfil = $(this).data('folio');
    window.location.href = "view/editar/editar.php?id="+encodeURIComponent(folioPerfil);
    
});


$("#crear").click(function(){

    window.location.href = "view/crear/crear.php";
})


$("#regresar").click(function(){

    window.location.href = "../dashboard/index.php";
})


function eliminar(id){
    $.ajax({
        url:"api.php",
        type:"POST",
        data: {
            opcion:"eliminarPerfil",
            folio: id
        },
        success: function(datos){   
            if(datos==2){
                alert("Perfil #"+id+" eliminado correctamente");
                window.location.href = "index.php";
            }if(datos==3){
                alert("Error al eliminar perfil");
            }
        }
})
}

