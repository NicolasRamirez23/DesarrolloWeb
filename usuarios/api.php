<?php require("../config/db.inc");

$sql="SELECT * from sis_usuario ORDER BY folio DESC LIMIT 10";
$result=mysqli_query($conexion,$sql);

$arreglo=[];


if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    $arreglo[]=$row;
  }
}
$arrayDeArrays = json_encode($arreglo);
print_r($arrayDeArrays);

  
 