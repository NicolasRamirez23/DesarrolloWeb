var urlParams = new URLSearchParams(location.search);
var folio = urlParams.get('folio');

$.ajax({
    url: "../../../api.php",
    type: "post",
    data:{
        opcion:"buscar_tarea",
        folio:"folio"
    },
    success: function(response){ 
        var data = JSON.parse(response);
        
        data.forEach(function(objeto){
            $("#encargado").val(objeto.encargado);
            $("#fecha").val(objeto.fecha_entrega);
            $("#titulo").val(objeto.titulo);
            $("#descripcion").val(objeto.descripcion);
        });          
    },
    error: function(error){
        console.error(error);
    }
});

$('#regresar').on('click', function(){
    window.history.back();
});
  