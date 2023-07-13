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