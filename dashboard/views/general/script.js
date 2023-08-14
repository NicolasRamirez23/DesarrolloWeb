


$("#btncs").click(function(){
    var cerrar_sesion = 0;
    $.ajax({
        url:"../../api.php",
        type:"post",
        data:{
            cs:cerrar_sesion,
        },
        success:function(datos){
            if(datos==1){
                
                window.location.href="../../../login/index.php";
            }
        },
        error:function(error){
            console.error(error);
        }
    })
    
});

$("#usuarios").click(function(){
     window.location.href="../../../usuarios/index.php";
});

$("#grupos").click(function(){

    window.location.href="../../../grupos/index.php";

})

$("#perfiles").click(function(){

    window.location.href="../../../perfiles/index.php";

})



