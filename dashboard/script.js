$("#btncs").click(function(){
    var cerrar_sesion = 0;
    $.post("api.php",{
        cs: cerrar_sesion
    },function(datos,estado){
        
        if(datos==1){
            window.location.href="../login/index.php";
        }
    });
    
});

$("#usuarios").click(function(){
     window.location.href="../usuarios/index.php";
});

$("#grupos").click(function(){

    window.location.href="../grupos/index.php";

})

$("#perfiles").click(function(){

    window.location.href="../perfiles/index.php";

})



