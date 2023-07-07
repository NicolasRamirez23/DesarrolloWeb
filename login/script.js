$(".btn").click(function(){
   
    var usuario = document.getElementById("usuario").value;
    var clave = document.getElementById("clave").value;

    $.post("api.php",{
        user: usuario,
        pass: clave
        },function(datos,estado){
            console.log (datos);
        if(datos==1){
            console.log ("holajs");
            window.location.href = "../dashboard/index.php";
        }else{
            console.log ();
            alert("Los datos son incorrectos. Por favor intentar denuevo.");
        }
        
        });
    
});


