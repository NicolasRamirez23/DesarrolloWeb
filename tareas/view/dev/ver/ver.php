<!DOCTYPE html>
<html>
<head>
    <title>Ver tarea</title>
</head>
<body>
    <h1>Ver Tarea</h1>
    <br>

    <label>Encargado</label>
    <br>
    <input type="text" id="encargado" disabled >

    <br><br>
    
    <label>Fecha de Entrega</label>
    <br>
    <input disabled type="date" id="fecha"  min="2023-08-14" max="2030-12-31" />

    <br><br>

    <label>Titulo</label>
    <br>
    <input disabled id="titulo"></input>
    <br><br>

    <label>Descripcion</label>
    <br>
    <input disabled type="text" id="descripcion" style="width:400px; height:400px" maxlength="1000"></input>
    <br><br>
    
    <button id="regresar">Regresar</button>
    
</body>
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src ="script.js"></script>
</html>