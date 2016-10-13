<?php
include_once("../BD/conexion.php");
$cnn = new conexion();
$con = $cnn->conectar();
$database = mysqli_select_db($con,"restaurante") or die("Error al conectar la base de datos");
$queryGetAllcategorias = "SELECT idCategoria, nombre FROM categoria WHERE estado='Habilitado'";
$resultGetAllcategorias = mysqli_query($con, $queryGetAllcategorias);
$jsoncategorias = array();
if (mysqli_num_rows($resultGetAllcategorias)) {
  # code...
  while ($row = mysqli_fetch_assoc($resultGetAllcategorias)) {
    # code...
    $jsoncategorias['categorias_info'][] = $row;
  }
} else {
  # code...
  $jsoncategorias['categorias_info'][] = 0;
}
mysqli_close($con);
echo json_encode($jsoncategorias);
?>
