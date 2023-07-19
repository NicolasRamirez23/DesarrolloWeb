$.ajax({
    
    url: "../../api.php",
    type: "post",
    data:{
        opcion:"mostrar2"
    },
    success: function(response){ 
        var data = JSON.parse(response);  
        console.log(data.nombre);

        if (data && data.descripciones && data.nombres) {
            var descripciones = data.descripciones;
            descripciones.forEach(function(objeto) {
                $("#grupo").append(`<option value="${objeto.descripcion}">${objeto.descripcion}</option>`);
            });

            var nombres = data.nombres;
            nombres.forEach(function(objeto) {
                $("#usuario").append(`<option value="${objeto.nombre}">${objeto.nombre}</option>`);
            });
        } 
    
    
    },
    error: function(error){ 
        console.error(error);
    }
});



$(".btncrear").click(function(){
    var nombre = document.getElementById("nombre").value;
    var usuario = document.getElementById("usuario").value;
    var clave = document.getElementById("clave").value;
    

    $.ajax({
        url:"../../api.php",
        type:"POST",
        data: {
            name: nombre,
            user: usuario,
            pass: clave,
            opcion: "registrar"
        },
        success: function(datos){
            if(datos==1){
                alert("¡Usuario registrado exitosamente!");
                window.location.href = "../../index.php";
            }else{
                alert("Error al realizar registro");
            }
        }

    })
})


$(".regresar").click(function(){
    window.location.href= "../../index.php";

})