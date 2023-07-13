$(".btneditar").click(function(){
    var folioEditar = document.getElementById("folioeditar").value;
    var nombreEditar = document.getElementById("nombreeditar").value;
    var usuarioEditar = document.getElementById("usuarioeditar").value;
    var claveEditar = document.getElementById("passeditar").value;

    editar(folioEditar,nombreEditar,usuarioEditar,claveEditar);
    
})

$(".regresar").click(function(){
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
                window.location.href="../index.php"
            }else{
                alert("Error al editar usuario. Favor de intentar nuevamente");
            }
        }
    })
}