<?php
    include("../config/config.inc");
    $folio = $_SESSION['folio']
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tareas</title>
</head>
<body>

</body>
</html>
<?php 
    require("../config/config.inc");
    require("../config/db.inc");
    if(!isset($_SESSION['usuario'])){
        header ("location: ../login/index.php");
    }else{
        $usuario = $_SESSION['usuario'];
        $folio = $_SESSION['folio'];
        $nombre = $_SESSION['nombre'];

        $consulta ="SELECT 
        CASE 
            WHEN COUNT(*) > 0 THEN true 
            ELSE false 
        END AS resultado
        FROM sis_perfil
        LEFT JOIN cat_grupo ON cat_grupo.codigo = sis_perfil.grupo
        WHERE sis_perfil.usuario = '$folio' AND sis_perfil.grupo = 1";

        $resultado = mysqli_query($conexion, $consulta);

        if ($resultado) {
            $fila = mysqli_fetch_assoc($resultado);
            
            if ($fila) {
                $codigo = $fila['resultado'];
            }
        }
    }
    
if($codigo === '1'){
    header("Location: view/encargado/encargado.php?folio=$folio&nombre=$nombre"); 
    exit;
}else{
    header("Location: view/dev/dev.php?folio=$folio&nombre=$nombre"); 
    exit;
}
?>
