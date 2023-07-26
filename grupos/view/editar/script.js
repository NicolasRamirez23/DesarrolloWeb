var urlParams = new URLSearchParams(window.location.search);
var id = urlParams.get('id');
document.getElementById("codigo_editar").value=id;

buscar(id);




$("#btn-actualizar").click(function(){
    var descripcionEditar = document.getElementById("descripcion_editar").value;

    editar(id,descripcionEditar);
    
})

$("#regresar").click(function(){
    window.location.href= "../../index.php";

})

function buscar(id){
    $.ajax({
        url:"../../api.php",
        type:"POST",
        data:{
            codigo:id,
            opcion:"buscar"
        },success:function(response){
            var datos = JSON.parse(response);

            document.getElementById("codigo_editar").value = id;
            document.getElementById("fecha_editar").value = datos.fecha;
            document.getElementById("hora_editar").value = datos.hora;
            document.getElementById("descripcion_editar").value = datos.descripcion;
            
        },
        error: function(error){
            console.error(error);
        }

        
    })
    
}

function editar(id,descripcion){
    $.ajax({
        url:"../../api.php",
        type:"POST",
        data:{
            folio:id,
            descripcion:descripcion,
            opcion:"editar"
        },
        success:function(datos){
            
            if(datos==1){
                alert("Grupo #"+id+" ha sido editado correctamente.");
                location.reload();
                //window.location.href="../../index.php";
            }else{
                alert("Error al editar el grupo. Favor de intentar nuevamente");
            }
        }
    })
}