var urlParams = new URLSearchParams(location.search);
var folio = urlParams.get('folio');
var nombre = urlParams.get('nombre');

$("#bienvenida").text("Bienvenido Developer "+ nombre);

$("#data").append(`
    <td>Folio Tarea</td>
    <td>Encargado</td>
    <td>Titulo</td>
    <td>Descripcion</td>
    <td>Fecha de Entrega</td>
    <td>Ver Tarea</td>
`)

$.ajax({
    url: "../../api.php",
    type: "post",
    data:{
        opcion:"mostrar_tareas_dev",
        folio:folio
    },
    success: function(response){ 
        
        var datos = JSON.parse(response); 
        datos.forEach(function(objeto){
            

            $("#data").append(`<tr>
            <td>${objeto.folio}</td>
            <td>${objeto.encargado}</td>
            <td>${objeto.titulo}</td>
            <td>${objeto.descripcion}</td>
            <td>${objeto.fecha_entrega}</td>
            <td><button type="boton" class="btn-editar" id=editar${objeto.folio} 
                    value="${objeto.folio}">Ver
                </button></td>
            </tr>`)

        });           
    },
    error: function(error){
        console.error(error);
    }

    
});

$("#regresar").click(function(){

    window.location.href = "../../../dashboard/index.php";
})

$('body').on('click', '.btn-editar', function(){
    var folio_tarea = $(this).val();
    var link = "ver/ver.php?folio="+folio_tarea;
    
    location.href=link;
 
});

