<?php
include_once("../BD/conexion.php");
$cnn = new conexion();
$con = $cnn->conectar();
$database = mysqli_select_db($con,"restaurante") or die("Error al conectar la base de datos");
$queryGetAllProductos = "SELECT * FROM producto";
$resultGetAllProductos = mysqli_query($con, $queryGetAllProductos);
$jsonProductos = array();
$tam=mysqli_num_rows($resultGetAllProductos);
if ( $tam>0) {
  # code...
  while ($row = mysqli_fetch_assoc($resultGetAllProductos)) {
    # code...
    $jsonProductos['productos_info'][] = $row;
  }
} else {
  # code...
  $jsonProductos['productos_info'][] = 0;
}
mysqli_close($con);
echo json_encode($jsonProductos);
?>
