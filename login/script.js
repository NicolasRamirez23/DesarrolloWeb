function hicieronClick(){
    event.preventDefault();
    var usuario = document.getElementById("usuario").value;
    var clave = document.getElementById("clave").value;
   
    var http = new XMLHttpRequest();
    var url = 'api.php';
    var params = 'usuario='+usuario+'&clave='+clave;
    http.open('POST', url, true);

    //Send the proper header information along with the request
    http.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

    http.onreadystatechange = function() {//Call a function when the state changes.

        if(http.readyState == "1") {
           console.log("Exito");
        }else{
            console.log("Credenciales Invalidas");
        }
}
http.send(params);

}
