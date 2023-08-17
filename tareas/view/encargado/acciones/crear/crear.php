<!DOCTYPE html>
<html>
<head>
    <title>Crear tarea</title>
</head>
<body>
    <h1>Crear Tarea</h1>
    <br>

    <label>Encargado</label>
    <br>
    <input type="text" id="encargado" disabled >

    <br><br>

    <label>Developer</label>
    <br>
    <select id="dev"></select>
    <br><br>
    
    <label>Fecha de Entrega</label>
    <br>
    <input type="date" id="fecha"  min="2023-08-14" max="2030-12-31" />

    <br><br>

    <label require>Titulo</label>
    <br>
    <input id="titulo"></input>
    <br><br>

    <label>Descripcion</label>
    <br>
    <input type="text" id="descripcion" style="width:400px; height:400px" maxlength="1000"></input>
    <br><br>

    <button id="crear_tarea">Crear</button>
    <button id="regresar">Regresar</button>
    
</body>
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src ="script.js"></script>
</html>