<?php
  include_once("../BD/conexion.php");
  $cnn = new conexion();
  $con = $cnn->conectar();
  $database = mysqli_select_db($con,"restaurante") or die("Error al conectar la base de datos");

  $idUsuario = $_POST['idUsuario'];
  $idMesa = $_POST['idMesa'];
  $inicio = $_POST['inicio'];
  $fin = $_POST['fin'];

  date_default_timezone_set('America/New_York');
  $DATE = date('Y-m-d H:i:s');

  $json = array();

  $ADD_ESTADO_MESA = "INSERT INTO estadoMesa(idEstadoMesa,fechaInicio,fechaFin,estadoIdEstado,mesaIdMesa) VALUES ('','$inicio','$fin','2','$idMesa')";

  if (mysqli_query($con, $ADD_ESTADO_MESA)) {
    # code...
    $SELECT_ID_ESTADO_MESA = "SELECT * FROM estadoMesa WHERE fechaInicio = '$inicio' AND fechaFin = '$fin'";
    $GET_ID_ESTADO_MESA = mysqli_query($con,$SELECT_ID_ESTADO_MESA);
    $PARAM_ID_ESTADO_MESA = mysqli_fetch_assoc($GET_ID_ESTADO_MESA);
    $ID_ESTADO_MESA = $PARAM_ID_ESTADO_MESA['idEstadoMesa'];

    $ADD_RESERVA_TEST = "INSERT INTO reserva(idReserva,fecha,estadoMesaIdEstadoMesa,usuarioIdUsuario)
                         VALUES ('','$DATE','$ID_ESTADO_MESA','$idUsuario')";
    if (mysqli_query($con, $ADD_RESERVA_TEST)) {
      # code...
      $json["code"][] = 1;
    } else {
      # code...
      $json["code"][] = 0;
    }

  } else {
    # code...
    $json["code"][] = 0;
  }



  mysqli_close($con);
  echo json_encode($json);

?>
