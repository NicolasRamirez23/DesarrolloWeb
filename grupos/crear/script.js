$("#btncrear").click(function(){
    var descripcion = document.getElementById("descripcion").value;

    

    $.ajax({
        url:"../api.php",
        type:"POST",
        data: {
            descripcion: descripcion,
            opcion: "crear"
        },
        success: function(datos){
            if(datos==1){
                alert("Grupo creado exitosamente!");
                window.location.href = "../index.php";
            }else{
                alert("Error al realizar la creacion del grupo");
            }
        }

    })
})


$("#regresar").click(function(){
    window.location.href= "../../index.php";

})