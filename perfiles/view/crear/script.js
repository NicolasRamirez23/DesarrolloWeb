var folio;
var codigo;

$.ajax({
    
    url: "../../api.php",
    type: "post",
    data:{
        opcion:"obtener_nombre"
    },
    success: function(response){ 
        var data = JSON.parse(response);  
        
        data.forEach(function(objeto){
            
            $("#nombresComboBox").append(`<option class="opcionNombre" value="${objeto.folio} ">${objeto.nombre}</option>`)

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
            
            $("#descripcionesComboBox").append(`<option class= "opcionDescripcion" value="${objeto.codigo}">${objeto.descripcion}</option>`)
            
        });     

    
    },
    error: function(error){ 
        console.error(error);
    }
});


$(".btncrear").click(function(){
    
        var comboBoxNombre = document.getElementById("nombresComboBox");
        
        var folio = comboBoxNombre.value;

        var comboBoxDescripcion= document.getElementById("descripcionesComboBox");
        
        var codigo = comboBoxDescripcion.value;
        

    $.ajax({
        url:"../../api.php",
        type:"POST",
        data: {
            folioUser: folio,
            codigoDesc: codigo,
            opcion: "crear_perfil"
        },
        success: function(datos){
            if(datos==1){
                alert("Perfil creado exitosamente!");
                window.location.href = "../../index.php";
            }else{
                alert("Error al crear perfil");
            }
        }

    })
})


$(".regresar").click(function(){
    window.location.href= "../../index.php";

})