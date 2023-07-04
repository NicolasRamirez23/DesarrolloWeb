
$(".btn").click(function(){
    var usuario = document.getElementById("usuario").value;
    var clave = document.getElementById("clave").value;
    //var accion = iniciar_sesion();//
    $.post("api.php",{
        user: usuario,
        pass: clave
    },function(datos,estado){
        if(datos == true){
            location.href ='../dashboard/index.php';
            
        }
        
    })

})
