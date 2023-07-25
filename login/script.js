$(".btn").click(function(){
   
    var usuario = document.getElementById("usuario").value;
    var clave = document.getElementById("clave").value;

    $.ajax({
        url:"api.php",
        type:"post",
        data:{
            user:usuario,
            pass:clave
        },
        success:function(datos){
            if (datos==1){
                alert("Datos correctos. Bienvenido "+usuario);
            }else{
                alert("Datos incorrectos, intentar de nuevo.")
            }
        },
        error:function(error){
            console.error(error);
        }
    })
    
});


