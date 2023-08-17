<!DOCTYPE html>
<html>
<head>
    <title>Editar Tarea</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    
    <form style="background-color: #A0FCFF;" class="text-center">
        <h1>Editor de Tareas</h1>
        <br>

        <label>Developer</label>
        <br>
        <select class="form-select-sm size='3'" aria-label="Default select example" id="dev"></select>
        <br><br>
        
        <label>Fecha de Entrega</label>
        <br>
        <input type="date" id="fecha"  min="2023-08-14" max="2030-12-31" pattern="\d{2}-\d{2}-\d{4}">

        <br><br>

        <label>Titulo</label>
        <br>
        <input id="titulo"></input>
        <br><br>

        <label>Descripcion</label>
        <br>
        <textarea class="form-control-sm" id="descripcion" row="3" size="heigth=100px"></textarea>
        <br><br>

    <button id="actualizar_tarea">Actualizar</button>
    <button id="regresar">Regresar</button>
    </form>
    
</body>
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src ="script.js"></script>
</html>