$("#data").append(
    `<tr>
        <td>Codigo</td>
        <td>Fecha</td>
        <td>Hora</td>
        <td>Descripcion</td>
        <td>Activo</td>
        <td>Editar</td>
        <td>Eliminar</td>
    </tr>`
)

$.ajax({
    url:"api.php",
    type: "post",
    data:{
        opcion:"mostrar"
    },
    success: function(response){
        
        var data = JSON.parse(response);

        data.forEach(function(objeto){
            $("#data").append(`<tr>
                <td>${objeto.codigo}</td>}
                <td>${objeto.fecha}</td>
                <td>${objeto.hora}</td>
                <td>${objeto.descripcion}</td>
                <td>${objeto.activo}</td>
                <td><button type="boton" class="btn-editar" id=editar${objeto.codigo} data-folio="${objeto.codigo}">Editar</button></td>
                <td><button type="boton" class="btn-eliminar" id=elimnar${objeto.codigo} data-folio="${objeto.codigo}">Eliminar</button></td>
            </tr>`)
        })

    },
    error: function(error){
        console.error(error);
    }    
});

$('body').on('click', '.btn-eliminar', function(){

    var idUsuario = $(this).data('folio');
    eliminar(idUsuario);
 
});

$('body').on('click', '.btn-editar', function(){
    var idUsuario = $(this).data('folio');
    window.location.href = "view/editar/editar.php?id="+encodeURIComponent(idUsuario);
    
});

function eliminar(id){
    $.ajax({
        url:"api.php",
        type:"POST",
        data: {
            opcion:"eliminar_grupo",
            folio: id
        },
        success: function(datos){   
            if(datos==2){
                alert("Grupo #"+id+" eliminado correctamente");
                window.location.href = "index.php";
            }if(datos==3){
                alert("Error al eliminar el grupo");
            }
        }
})
}

$("#crear").click(function(){

    window.location.href = "crear/crear.php";
})



$("#regresar").click(function(){

    window.location.href = "../dashboard/index.php";
})
