var folio;
var codigo;

$("#data").append(
    `<tr>
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



let contador=0    

$("#btn_agregar_grupo").click(function() {

    $("#data").append(`<tr>
        <td><select name="grupo_combobox${contador}" id="grupo_combobox${contador}" 
        class="descripcionesComboBox"></select></td>
        <td><button type="boton" class="btn-eliminar" id=${contador} data-contador="${contador}"">Eliminar</button></td>
    </tr>`);

    let grupos=[];
    for(let i=0; i<contador;i++){
        var combobox_grupo = document.getElementById("grupo_combobox"+i);
        grupos.push(combobox_grupo.value);
    }
    console.log(grupos);

    $.ajax({
        url: "../../api.php",
        type: "post",
        data: {
            opcion: "obtener_descripcion"
        },
        success: function(response) {
            var data = JSON.parse(response);
            var $comboboxes = $(".descripcionesComboBox"); 
            $comboboxes.each(function(index, combobox) {
                $(combobox).empty();    
                data.forEach(function(objeto) {
                
                    if(!grupos.includes(objeto.codigo)){
                        $(combobox).append(`<option class="opcionDescripcion" id="descripcion${objeto.codigo}" 
                        value="${objeto.codigo}">${objeto.descripcion}</option>`)
                    }
            });
                    
                
                
            });
        },
        error: function(error) {
            console.error(error);
        }
    });

    contador++;
    
});

$('body').on('click', '.btn-eliminar', function(){
    const tabla = document.getElementById("data");
    let longitudFilas = tabla.rows.length;

    
    if(longitudFilas==2){
        alert("Debes elegir al menos un grupo.");
    }else{
        var fila=this.closest("tr");

        fila.remove();
    
    }

 
});
    


$("#btncrear").click(function(){

    var comboBoxNombre = document.getElementById("nombresComboBox");
        
    var folio = comboBoxNombre.value;

    grupos=[];
    
    for(let i=0; i<contador;i++){
        var combobox_grupo = document.getElementById("grupo_combobox"+i);
        grupos.push(combobox_grupo.value);
    }


    $.ajax({
        url:"../../api.php",
        type: "post",
        data:{
            folio: folio,
            descripciones:grupos,
            opcion:"crear_perfil"
        },
        success: function(response){
            if(response == "1"){
                alert("Registro completado correctamente.");
                location.reload();
            }else{
                alert("Error a realizar registro. Intentar de nuevo.")
            }

        },
        error: function(error){
            console.error(error);
        }
    })


})


$("#regresar").click(function(){
    window.location.href= "../../index.php";

})

