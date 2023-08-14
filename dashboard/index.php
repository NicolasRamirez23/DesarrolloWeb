<?php 
    require("../config/config.inc");
    require("../config/db.inc");
    if(!isset($_SESSION['usuario'])){
        header ("location: ../login/index.php");
    }else{
        $usuario = $_SESSION['usuario'];
        $folio = $_SESSION['folio'];

        $consulta ="SELECT 
        CASE 
            WHEN COUNT(*) > 0 THEN true 
            ELSE false 
        END AS resultado
        FROM sis_perfil
        LEFT JOIN cat_grupo ON cat_grupo.codigo = sis_perfil.grupo
        WHERE sis_perfil.usuario = '$folio' AND (sis_perfil.grupo = 1 OR sis_perfil.grupo = 2)";

        $resultado = mysqli_query($conexion, $consulta);

        if ($resultado) {
            $fila = mysqli_fetch_assoc($resultado);
            
            if ($fila) {
                $codigo = $fila['resultado'];
            }
        }
    }
?>

<!DOCTYPE html>
<html>
<head>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Menu Principal </title>
</head>
<body style="background-color: #fd7e14;">
        <?php if($codigo === '1'){
                header("Location: views/dev/dev.php?"); 
                exit;
            }else{
                header("Location: views/general/general.php"); 
                exit;
            }
            ?>
</body>
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src ="script.js"></script>
</html>