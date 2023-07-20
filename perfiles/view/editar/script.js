var urlParams = new URLSearchParams(window.location.search);
var folio = urlParams.get('id');
document.getElementById("folio").value=folio;
buscar(folio);



$(".btn-actualizar").click(function(){
    console.log("hola");
    var comboBoxNombre = document.getElementById("usuario_editar");

    var usuario = comboBoxNombre.value;

     var comboBoxDescripcion= document.getElementById("grupo_editar");
        
    var codigo = comboBoxDescripcion.value;
    console.log(folio+"---"+codigo+"---"+usuario);


    editar(folio,codigo,usuario);
    
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
            opcion:"buscarPerfil"
        },success:function(response){
            var datos = JSON.parse(response);
            
            document.getElementById("fecha_editar").value = datos.fecha;
            document.getElementById("hora_editar").value = datos.hora;
               
        },
        error: function(error){
            console.error(error);
        }

        
    })

    $.ajax({
    
        url: "../../api.php",
        type: "post",
        data:{
            opcion:"obtener_nombre"
        },
        success: function(response){ 
            var data = JSON.parse(response);
            
            data.forEach(function(objeto){
                
                $("#usuario_editar").append(`<option class= "opcionNombre" value="${objeto.folio}">${objeto.nombre}</option>`)
                
            });     
    
        
        },
        error: function(error){ 
            console.error(error);
        }
    });

    $.ajax({
    
        url: "../../api.php",
        type: "post",
        data:{
            opcion:"obtener_descripcion"
        },
        success: function(response){ 
            var data = JSON.parse(response);
            
            data.forEach(function(objeto){
                
                $("#grupo_editar").append(`<option class= "opcionDescripcion" value="${objeto.codigo}">${objeto.descripcion}</option>`)
                
            });     
    
        
        },
        error: function(error){ 
            console.error(error);
        }
    });
    
}

function editar(id,descripcion,usuario){
    $.ajax({
        url:"../../api.php",
        type:"POST",
        data:{
            folio:id,
            descripcion:descripcion,
            user:usuario,
            opcion:"editarPerfil"
        },
        success:function(datos){
            console.log(datos);
            if(datos==1){
                alert("Perfil #"+id+" ha sido editado correctamente.");
                //location.reload();
                window.location.href="../../index.php";
            }else{
                alert("Error al editar el perfil. Favor de intentar nuevamente");
            }
        }
    })
}