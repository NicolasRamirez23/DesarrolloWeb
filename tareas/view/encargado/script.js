var urlParams = new URLSearchParams(window.location.search);
var folio = urlParams.get('folio');
var nombre = urlParams.get('nombre');

$("#bienvenida").text("Bienvenido Encargado "+nombre);

$("#data").append(`
    <td>Folio Tarea</td>
    <td>Developer</td>
    <td>Titulo</td>
    <td>Descripcion</td>
    <td>Fecha de Entrega</td>
    <td>Editar</td>
    <td>Eliminar</td>
`)

$.ajax({
    
    url: "../../api.php",
    type: "post",
    data:{
        opcion:"mostrar_tareas"
    },
    success: function(response){ 
        
        var data = JSON.parse(response); 
        
        data.forEach(function(objeto){

            $("#data").append(`<tr>
            <td>${objeto.folio}</td>
            <td>${objeto.developer}</td>
            <td>${objeto.titulo}</td>
            <td>${objeto.descripcion}</td>
            <td>${objeto.fecha_entrega}</td>
            <td><button type="boton" class="btn-editar" id=editar${objeto.folio} data-folio_dev="${objeto.dev_folio}"value="${objeto.folio}">Editar</button></td>
            <td><button type="boton" class="btn-eliminar" id=elimnar${objeto.folio} data-folio="${objeto.folio}">Eliminar</button></td>
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

$("#crear").click(function(){
    
    var link = "acciones/crear/crear.php?folio="+folio+"&nombre="+nombre;

    location.href=link;
})

$('body').on('click', '.btn-eliminar', function(){

    var folio = $(this).data('folio');
    var borrar_fila = $(this).closest('tr');
    $.ajax({
    
        url: "../../api.php",
        type: "post",
        data:{
            opcion:"eliminar_tarea",
            folio:folio
        },
        success: function(datos){ 
            
            if(datos==2){
                alert("Tarea eliminada exitosamente!");
                $(borrar_fila).closest('tr').remove();
            

            }if(datos==3){
                alert("Error al eliminar tarea");
            }
         
        },
        error: function(error){
            console.error(error);
        }
    });
 
});

$('body').on('click', '.btn-editar', function(){
    var folio_dev = $(this).data('folio_dev');
    var folio_tarea = $(this).val();
    var link = "acciones/editar/editar.php?folio="+folio_tarea+"&dev="+folio_dev;
    
    location.href=link;
 
});
