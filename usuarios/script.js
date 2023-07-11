$(".data").append(
    `<tr>"
        <td>Folio</td>
        <td>Fecha</td>
        <td>Hora</td>
        <td>Nombre</td>
        <td>Usuario</td>
    </tr>`

    
    
    ,$.get("api.php",function(data){
        console.log(data);
        `<tr>
            <td></td>
        </tr>
        
        `
    })
);


    
 