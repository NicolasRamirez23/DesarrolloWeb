var urlParams = new URLSearchParams(window.location.search);
var folio = urlParams.get('id');
document.getElementById("folio").value=folio;

$("#data").append(
    `<tr>
        <td>#</td>
        <td>Grupos</td>
        <td>Eliminar</td>
    </tr>`
)

obtener_informacion();


function obtener_informacion (){
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
            });
        },
        error: function(error){
            console.error(error);
        } 
    })
    var contador = 1;
    var grupos_seleccionados = [];
    var grupos_activos = [];

    $.ajax({
        url:"../../api.php",
        type:"POST",
        data:{
            folio:folio,
            opcion:"buscar_foliop"
        },success:function(response){
            var datos = JSON.parse(response);
            
            datos.forEach(function(objeto){
                grupos_seleccionados.push(objeto.codigo_g);
                $("#data").append(
                    `<tr>
                        <td class="num">${contador}</td>
                        <td>
                            <select disabled=true lass="grupos_perfiles_nuevos" data-folio="${objeto.folio_p}">
                                <option class="codigo_nuevo" value="${objeto.codigo_g}">${objeto.descripcion_g}</option>
                            </select>
                        </td>
                        <td><button class="btn_eliminar" data-codigo="${objeto.codigo_g}" value="${objeto.folio_p}">Eliminar</button></td>
                    </tr>`
                )
                contador++;
                grupos_activos.push(objeto.codigo_g)
                
            });
            
        },
        error: function(error){
            console.error(error);
        } 
    })
    num_grupos = [];

    $.ajax({
        url:"../../api.php",
        type:"POST",
        data:{
            folio:folio,
            opcion:"obtener_descripcion"
        },success:function(response){
            var datos = JSON.parse(response);

            datos.forEach(function(objeto){
                if(!grupos_seleccionados.includes(objeto.codigo)){
                    $(".grupos_perfiles_nuevos").append(`<option value=${objeto.codigo}>${objeto.descripcion}</option>`)
                }
                num_grupos.push(objeto.codigo);
            });
        },
        error: function(error){
            console.error(error);
        } 
    })

    $(".btn_agregar_grupo").click(function(){      
        sumador=1;  
        

        var num_opciones = $('.grupos_perfiles_creados:last option').length;
        console.log(num_opciones);
        

        if(num_opciones==2){
            alert("Ya no hay más grupos por agregar.");
            return
        }

        /*if (comboBox.val() === "0") {
            alert("Debe seleccionar una opción antes de agregar otro elemento.");
            return; 
        }*/

        $("#data").append(
            `<tr>
            <td class="num">${contador}</td>
            <td><select class="grupos_perfiles_creados"></select></td>
            <td><button type="boton" class="btn_eliminar_nuevo">Eliminar</button></td>
            </tr>`
        )

        $.ajax({
            url: "../../api.php",
            type: "post",
            data: {
                opcion: "obtener_descripcion"
            },
            success: function(response) {
                var data = JSON.parse(response);
                var comboBox = $(".grupos_perfiles_creados:last");
                var elem_sel = [];

                comboBox.append('<option value="0">---Seleccione una opción---</option>');

                $(".grupos_perfiles_creados").each(function(){
                    var valor_seleccionado = $(this).val();
                    if(valor_seleccionado!=0){
                        elem_sel.push(valor_seleccionado);
                    }  
                })

                $(".num").each(function(){
                    $(this).text(sumador);
                    sumador++;
                })

                data.forEach(function(objeto) {                    
                    if (!elem_sel.includes(objeto.codigo) && !grupos_seleccionados.includes(objeto.codigo)) {
                        comboBox.append(`<option value="${objeto.codigo}">${objeto.descripcion}</option>`);
                    }
                });
            },
            error: function(error) {
                console.error(error);
            }
        });
    })

    $(document).ready(function() {
        $(document).on('change', '.grupos_perfiles_nuevos, .grupos_perfiles_creados', function() {
            var valorSeleccionado = $(this).val();
            
            $('.grupos_perfiles_nuevos, .grupos_perfiles_creados').not(this).each(function() {
                $(this).find('option[value="' + valorSeleccionado + '"]').prop('disabled', true);
                $(this).find('option').not('[value="' + valorSeleccionado + '"]').prop('disabled', false);
            });
        });
    });

    $('body').on('click', '.btn_eliminar', function() {
        codigo_borrar = $(this).data('codigo');
        
        const resultado = grupos_activos.filter(codigo => codigo != codigo_borrar);
        console.log(resultado);
        
        const longitud_perfiles = $('.grupos_perfiles_nuevos').length;
        folio = $(this).val();
        var borrar_fila = $(this).closest('tr');
        var num_perfiles=0;
    
        if(longitud_perfiles == 1){
            alert("El usuario debe pertenecer al menos a un grupo");
        }else{
            $.ajax({
                url:"../../api.php",
                type:"POST",
                data:{
                    folio:folio,
                    opcion:"numPerfiles"
                },success:function(response){
                    var datos = JSON.parse(response);
                    
                    num_perfiles = datos;
                    
                },
                error: function(error){
                    console.error(error);
                } 
            })
    
            if(num_perfiles!=1){
                $.ajax({
                url:"../../api.php",
                type:"POST",
                data:{
                    folio:folio,
                    opcion:"eliminarPerfil"
                },success:function(response){
                    if(response == 2){
                        alert("Perfil eliminado correctamente.");
                        $(borrar_fila).closest('tr').remove();
                        var elem_sel = [];
                        $(".grupos_perfiles_creados").each(function(){
                            var valor_seleccionado = $(this).val();
                            if(valor_seleccionado!=0){
                                elem_sel.push(valor_seleccionado);
                            }  
                        })
                        contador=1;
                        $('.num').each(function(index,elemento){
                            $(elemento).text(contador);
                            contador++;
                        })
                    }else{
                        alert("Fallo al eliminar perfil.")
                    }
                },
                error: function(error){
                    console.error(error);
                    } 
                })
            }else{
                alert("El usuario debe tener al menos un perfil.")
            }
        }
        
    
        contador=1;
        $('.num').each(function(index,elemento){
            $(elemento).text(contador);
            contador++;
        })
    });
}


$('body').on('click', '.btn_eliminar_nuevo', function() {
    var borrar_fila = $(this).closest('tr');
        
    $(borrar_fila).closest('tr').remove();
    contador=1;
    $('.num').each(function(index,elemento){
        $(elemento).text(contador);
        contador++;
    })
    
});

$(document).ready(function() {
    $(document).on('click', '.btn_actualizar', function() {
        var codigos_array = [];
        $('.grupos_perfiles_creados').not(this).each(function() {
            codigos_array.push($(this).val());
        });

        if(codigos_array.length===0){
            alert("No se ha realizado ningún cambio");
            return;
        }
    
        console.log(codigos_array)
        $.ajax({
            url:"../../api.php",
            type:"post",
            data:{
                user : folio,
                codigos : codigos_array,
                opcion : "actualizar_perfil"
            },success: function(response){
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
    });
});

$(".regresar").click(function(){
    window.location.href= "../../index.php";

})
