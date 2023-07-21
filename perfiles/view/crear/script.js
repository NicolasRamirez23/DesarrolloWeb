var folio;
var codigo;

$("#data").append(
    `<tr>
        <td>Grupo</td>
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


let contador = 0;

$(".btn_agregar_grupo").click(function(){
    $("#data").append(`<tr>
                        <td><select name="grupo_combobox${contador}" id="grupo_combobox${contador}" class = "descripcionesComboBox"></select></td>`+
            $.ajax({
    
                url: "../../api.php",
                type: "post",
                data:{
                    opcion:"obtener_descripcion"
                },
                success: function(response){ 
                    var data = JSON.parse(response);
                    

                    data.forEach(function(objeto){
                        
                        $(".descripcionesComboBox").append(`<option class= "opcionDescripcion" 
                        id="descripcion${contador}" value="${objeto.codigo}">${objeto.descripcion}</option>`)
                    })    

            
                },
                error: function(error){ 
                    console.error(error);
                }
            })
    +`</tr>`) 
    contador++;
    console.log(contador);
})

    


$(".btncrear").click(function(){
    
        let valores=["hola"];
        console.log(valores);
    
        var comboBoxNombre = document.getElementById("nombresComboBox");
        
        var folio = comboBoxNombre.value;

        for(let i=0;i=contador;i++){

            var comboBoxDescripcion= document.getElementById("descripcion"+i);
        
            console.log(valores);
        }
        

        

})


$(".regresar").click(function(){
    window.location.href= "../../index.php";

})