
$(".btn").click(function(){
    var usuario = document.getElementById("usuario").value;
    var clave = document.getElementById("clave").value;
    $.post("api.php",{
        user: usuario,
        pass: clave
    },function(datos,estado){
        alert("datos: "+datos+"estado: "+estado);
        
    })

})
