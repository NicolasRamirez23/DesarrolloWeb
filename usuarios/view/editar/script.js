var urlParams = new URLSearchParams(window.location.search);
var id = urlParams.get('id');
document.getElementById("folio-editar").value=id;
buscar(id);



$("#btn-actualizar").click(function(){
    var nombreEditar = document.getElementById("nombreeditar").value;
    var usuarioEditar = document.getElementById("usuarioeditar").value;
    var claveEditar = document.getElementById("passeditar").value;

    editar(id,nombreEditar,usuarioEditar,claveEditar);
    
})

$("#regresar").click(function(){
    window.location.href= "../../index.php";

})

function buscar(id){
    $.ajax({
        url:"../../api.php",
        type:"POST",
        data:{
            folio:id,
            opcion:"buscar"
        },success:function(response){
            var datos = JSON.parse(response);
            
            document.getElementById("fecha-editar").value = datos.fecha;
            document.getElementById("hora-editar").value = datos.hora;
            document.getElementById("nombreeditar").value = datos.nombre;
            document.getElementById("usuarioeditar").value = datos.usuario;
            document.getElementById("passeditar").value = datos.contrasena;
        },
        error: function(error){
            console.error(error);
        }

        
    })
    
}

function editar(id,nombre,usuario,clave){
    $.ajax({
        url:"../../api.php",
        type:"POST",
        data:{
            folio:id,
            name:nombre,
            user:usuario,
            pass:clave,
            opcion:"editar"
        },
        success:function(datos){
            console.log(datos);
            if(datos==1){
                alert("Usuario #"+id+" ha sido editado correctamente.");
                location.reload();
                //window.location.href="../../index.php";
            }else{
                alert("Error al editar usuario. Favor de intentar nuevamente");
            }
        }
    })
}