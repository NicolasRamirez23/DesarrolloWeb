var urlParams = new URLSearchParams(location.search);
var folio = urlParams.get('folio');
var nombre = urlParams.get('nombre');

$("#encargado").val(nombre);

$.ajax({
    url: "../../../../api.php",
    type: "post",
    data:{
        opcion:"buscar_developers"
    },
    success: function(response){ 
        var data = JSON.parse(response);
        
        data.forEach(function(objeto){

            $("#dev").append(`<option value=${objeto.folio} class="opciones">${objeto.nombre}</option>`);

        });          
    },
    error: function(error){
        console.error(error);
    }
});

$('#crear_tarea').on('click', function(){
    var fecha = new Date($('#fecha').val());
    var dia = fecha.getDate() + 1;
    var mes = fecha.getMonth() + 1;
    var ano = fecha.getFullYear();
    if(mes <10){
        mes = "0"+mes;
    }
    if(dia <10){
        dia = "0"+dia;
    }
    if(isNaN(dia) || isNaN(mes) || isNaN(ano)){
        alert("Fecha de entrega no valida. intentar de nuevo.")
        return;
    }else{
        fecha_entrega = ano + "-" + mes + "-" + dia;
    }

    var folio_usuario=$("#dev").val();

    var titulo = $("#titulo").val();

    var desc = $("#descripcion").val();

    if(titulo.length<2){
        alert("Es necesario agregar un titulo que describa bien la tarea.");
        return;
    }

    if(desc.length<15){
        alert("Por favor ingresa una descripcion de la tarea un poco más extensa");
        return;
    }

    console.log(folio+"---"+folio_usuario+"---"+titulo+"---"+desc+"---"+fecha_entrega)

    $.ajax({
        url: "../../../../api.php",
        type: "post",
        data:{
            opcion:"crear_tarea",
            folio:folio,
            dev:folio_usuario,
            titulo:titulo,
            desc:desc,  
            fecha:fecha_entrega
        },
        success: function(response){ 
            console.log(response);
            if(response==='1'){
                alert("Tarea creada correctamente!")
            }else{
                alert("Error al crear tarear, intentar de nuevo.")
            }
        },
        error: function(error){
            console.error(error);
        }
    });
    
  });

  $('#regresar').on('click', function(){
    window.history.back();
    
    
  });
  