<?php
  include_once("../BD/conexion.php");
  $cnn = new conexion();
  $con = $cnn->conectar();
  $database = mysqli_select_db($con,"restaurante") or die("Error al conectar la base de datos");

  // $idUsuario = $_POST['idUsuario'];
  // $idMesa = $_POST['idMesa'];
  // $inicio = $_POST['date'];
  // $fin = $_POST['date'];

  $idMesa = $_POST['idMesa'];

  $json = array();

  $SELECT_STATE_BY_TABLE = "SELECT fechaInicio,fechaFin,estadoIdEstado FROM estadoMesa WHERE mesaIdMesa = '$idMesa' AND estadoIdEstado = '2'";
  $QUERY = mysqli_query($con,$SELECT_STATE_BY_TABLE);
  if (mysqli_num_rows($QUERY)) {
    # code...
    while ($row = mysqli_fetch_assoc($QUERY)) {
      # code...
      $json['estado_mesas_info'][] = $row;
    }
  } else {
    # code...
    $json['estado_mesas_info'][] = 0;
  }

  mysqli_close($con);
  echo json_encode($json);

?>
