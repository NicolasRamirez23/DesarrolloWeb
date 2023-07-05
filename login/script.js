var accion = {
    iniciar: function(usuario,clave){
        $.post("api.php",{
        user: usuario,
        pass: clave
        },function(datos,estado){
        if(datos==1){

            window.location.href = "../dashboard/index.php?usuario="+encodeURIComponent(usuario);
        
            
        }else{
            alert("Los datos son incorrectos. Por favor intentar denuevo.");
        }
        
        });
    },

    cerrar: function(){
       
       
        }  
};

$(".btn").click(function(){
    
    var usuario = document.getElementById("usuario").value;
    var clave = document.getElementById("clave").value;

    accion.iniciar(usuario,clave);
    
});


