var grupos=[];

$("#data").append(
    `<tr>
        <td>#</td>
        <td>Grupo</td>
        <td>Eliminar</td>
    </tr>`
    )

$.ajax({

    url: "../../api.php",
    type: "post",
    data:{
        opcion:"obtener_nombre"
    },
    success: function(response){ 
        var data = JSON.parse(response);  
        
        data.forEach(function(objeto){
            
            $("#nombresComboBox").append(`<option class="opcionNombre" value="${objeto.folio}">${objeto.nombre}</option>`)
        

        });     

    
    },
    error: function(error){ 
        console.error(error);
    }
}); 

$.ajax({
    url: "../../api.php",
    type: "post",
    data:{
        opcion:"obtener_descripcion"
    },
    success: function(response){ 
        var data = JSON.parse(response);  

        $("#data").append(
            `<tr>
                <td class="num">1</td>
                <td><select class="descripcionesComboBox"></select></td>
                <td><button type="boton" class="btn_eliminar">Eliminar</button></td>
            </tr>`
            )

            $(".descripcionesComboBox").append('<option value="0">---Seleccione una opción---</option>');
        
        data.forEach(function(objeto){
            
            $(".descripcionesComboBox").append(`<option value="${objeto.codigo}" name="opcion${objeto.codigo}" id="opcion${objeto.codigo}" 
            class="opciones">${objeto.descripcion}</option>`);
            });
        
    },
    error: function(error){ 
        console.error(error);
    }
}); 

$("#btn_agregar_grupo").click(function() {
    var cont = 0;  

    var comboBox = $(".descripcionesComboBox:last");
   
    if (comboBox.val() === "0") {
        alert("Debe seleccionar una opción antes de agregar otro elemento.");
        return; 
    }
    
    $("#data").append(`<tr>
        <td class="num"></td>
        <td><select class="descripcionesComboBox"></select></td>
        <td><button type="boton" class="btn_eliminar">Eliminar</button></td>
    </tr>`)

    cont++;

    $(".num").each(function(index,elemento){
        $(elemento).text(cont++);
    });

    $.ajax({
        url: "../../api.php",
        type: "post",
        data: {
            opcion: "obtener_descripcion"
        },
        success: function(response) {
            var data = JSON.parse(response);
            var comboBox = $(".descripcionesComboBox:last");
            var elem_sel = [];

            comboBox.append('<option value="0">---Seleccione una opción---</option>');

            $(".descripcionesComboBox").each(function(){
                var valor_seleccionado = $(this).val();
                if(valor_seleccionado!=0){
                    elem_sel.push(valor_seleccionado);
                }  
            })
            
            data.forEach(function(objeto) {
                if (!elem_sel.includes(objeto.codigo)) {
                    comboBox.append(`<option value="${objeto.codigo}" id=${objeto.codigo} class="opciones">${objeto.descripcion}</option>`);
                }
            });
        },
        error: function(error) {
            console.error(error);
        }
        
    });
    cont++;
});

$('body').on('click', '.btn_eliminar', function(){
    const longitudTabla = $('#data tr').length;

    if(longitudTabla == 2){
        alert("El usuario debe pertenecer a un grupo");
    }else{
        $(this).closest('tr').remove();
    }

    contador=1;
    $('.num').each(function(index,elemento){
        $(elemento).text(contador);
        contador++;
        
    })
});

$("#btn_crear").click(function(){
    var codigos = [];
    $(".descripcionesComboBox").each(function(){
        var valor_seleccionado = $(this).val();
        if (valor_seleccionado !== "0") {
            codigos.push(valor_seleccionado);
        }
    })

    var folio = $("#nombresComboBox").val();
    
    console.log(folio + "---"+codigos);
    $.ajax({
        url:"../../api.php",
        type:"post",
        data:{
            codigos : codigos,
            folio : folio,
            opcion : "crear_perfil"
        },success: function(response){
            if(response==1){
                alert("Registro completado correctamente.");
                location.reload();
            }else{
                alert("Fallo al registrar, intentar de nuevo.")
            }

        },error: function(error){
            console.error(error);
        }
    })

})

$("#btn_regresar").click(function(){
    window.location.href= "../../index.php";
})





