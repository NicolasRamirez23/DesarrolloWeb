$(".btncrear").click(function(){
    var nombre = document.getElementById("nombre").value;
    var usuario = document.getElementById("usuario").value;
    var clave = document.getElementById("clave").value;

    $.ajax({
        url:"api.php",
        type:"POST",
        data: {
            name: nombre,
            user: usuario,
            pass: clave,
            opcion: 1
        },
        success: function(datos){
            if(datos==1){
                alert("¡Usuario registrado exitosamente!");
                window.location.href = "../index.php";
            }else{
                alert("Error al realizar registro");
            }
        }

    })
})


$(".btneliminar").click(function(){   
    
     var folioEliminar = document.getElementById("folioeliminar").value;
     eliminar(folioEliminar);
})

$(".btnebuscar").click(function(){
    var folioEditar = document.getElementById("folioeditar").value;
    buscar(folioEditar);
    
})

$(".btneditar").click(function(){
    var folioEditar = document.getElementById("folioeditar").value;
    var nombreEditar = document.getElementById("nombreeditar").value;
    var usuarioEditar = document.getElementById("usuarioeditar").value;
    var claveEditar = document.getElementById("passeditar").value;

    editar(folioEditar,nombreEditar,usuarioEditar,claveEditar);
    
})


$(".regresar").click(function(){
    window.location.href= "../index.php";

})

function eliminar(id){
    $.ajax({
        url:"api.php",
        type:"POST",
        data: {
            opcion:2,
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

function buscar(id){
    $.ajax({
        url:"api.php",
        type:"POST",
        data:{
            folio:id,
            opcion:3
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
        url:"api.php",
        type:"POST",
        data:{
            folio:id,
            name:nombre,
            user:usuario,
            pass:clave,
            opcion:4
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