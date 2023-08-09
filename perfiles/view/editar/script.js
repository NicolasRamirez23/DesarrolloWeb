var urlParams = new URLSearchParams(window.location.search);
var folio = urlParams.get('id');
document.getElementById("folio").value=folio;


$("#data").append(
    `<tr>
        <td>ID perfil</td>
        <td>Grupos</td>
        <td>Editar</td>
    </tr>`
)


$.ajax({
    url:"../../api.php",
    type:"POST",
    data:{
        folio:folio,
        opcion:"buscarUsuario"
    },success:function(response){
        var datos = JSON.parse(response);
        
        datos.forEach(function(objeto){
            $("#fecha_editar").val(objeto.fecha_u);
            $("#hora_editar").val(objeto.hora_u);
            $("#usuario_editar").val(objeto.nombre_u);
            $("#data").append(
                `<tr>
                    <td>${objeto.folio_p}</td>
                    <td> 
                        <select class="grupos_perfiles" data-folio="${objeto.folio_p}">
                            <option value="${objeto.codigo_g}">${objeto.descripcion_g}</option>
                        </select>
                    </td>
                    <td><button class="btn_editar" value="${objeto.codigo_g}">Editar</button></td>
                </tr>`
            )
            
        });
    },
    error: function(error){
        console.error(error);
    } 
})

$(document).ready(function() {
    $(".grupos_perfiles").on("change", function() {
        var valorSeleccionado = $(this).val();
        console.log("Valor seleccionado: " + valorSeleccionado);
    });
});

var codigo_seleccionado = []

$('body').on('click', '.btn_editar', function() {
    var fila = $(this).closest("tr");
    var codigo = $(this).val();
    var gruposPerfilesComboBox = fila.find(".grupos_perfiles");

    if(!codigo_seleccionado.includes(codigo)){
        codigo_seleccionado.push(codigo);
        
        $.ajax({
            url:"../../api.php",
            type:"POST",
            data:{
                opcion:"obtener_descripcion"
            },success:function(response){
                var datos = JSON.parse(response);
                
                datos.forEach(function(objeto){
                        if(objeto.codigo != codigo){                    
                            var nuevaOpcion = `<option value="${objeto.codigo}">${objeto.descripcion}</option>`;
                            gruposPerfilesComboBox.append(nuevaOpcion);
                        }
                });
            },
            error: function(error){
                console.error(error);
            },
            
        })
    }else{
        $.ajax({
            url:"../../api.php",
            type:"POST",
            data:{
                opcion:"obtener_descripcion"
            },success:function(response){
                var datos = JSON.parse(response);
                
                datos.forEach(function(objeto){                
                            var nuevaOpcion = `<option value="${objeto.codigo}">${objeto.descripcion}</option>`;
                            gruposPerfilesComboBox.append(nuevaOpcion);
                        
                });
            },
            error: function(error){
                console.error(error);
            },
            
        })
    }
    
});


$(".btn-actualizar").click(function(){
    var codigos_grupos = [];
    var folios_perfiles = [];
    $(".grupos_perfiles").each(function(){
        var valorAtributo = $(this).attr("data-folio");
        var valor_seleccionado = $(this).val();

        if (valor_seleccionado !== "0") {
            codigos_grupos.push(valor_seleccionado);
        }
        if (valorAtributo !== "0") {
            folios_perfiles.push(valorAtributo);
        }
        
    })
    
    console.log(codigos_grupos);
    console.log(folios_perfiles);
    
    $.ajax({
        url:"../../api.php",
        type:"post",
        data:{
            codigos : codigos_grupos,
            folios_p : folios_perfiles,
            opcion : "actualizar_perfil"
        },success: function(response){
            console.log(response);
            if(response==1){
                alert("Actualizacion completado correctamente.");
                location.reload();
            }else{
                alert("Fallo al actualizar, intentar de nuevo.")
            }

        },error: function(error){
            console.error(error);
        }
    })
})

$(".regresar").click(function(){
    window.location.href= "../../index.php";

})
