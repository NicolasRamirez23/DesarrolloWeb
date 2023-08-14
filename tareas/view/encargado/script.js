$("#data").append(`
    <td>Folio Tarea</td>
    <td>Developer</td>
    <td>Fecha de Entrega</td>
    <td>Titulo</td>
    <td>Descripcion</td>
    <td>Editar</td>
    <td>Eliminar</td>
`)

$("#regresar").click(function(){

    window.location.href = "../../../dashboard/index.php";
})

$("#crear").click(function(){

    window.location.href = "acciones/crear/crear.php";
})
