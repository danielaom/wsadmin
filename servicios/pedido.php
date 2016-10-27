<?php
  include_once("../BD/conexion.php");
  $cnn = new conexion();
  $con = $cnn->conectar();
  $database = mysqli_select_db($con,"restaurante") or die("Error al conectar la base de datos");

  $id = $_POST['idUsuario'];
  $items = $_POST['items'];
  $cantidad = $_POST['cantidad'];
  $json = array();

  date_default_timezone_set('America/New_York');
  $DATE = date('Y-m-d H:i:s');

  function randomCode($length=6) {
      $char = "abcdefghijklmnopqrstuvwyxzABCDEFGHIJKLMNOPQRSTUVWZXY0987654321";
      return substr(str_shuffle($char),0,$length);
  }

  $CODE = randomCode();

  $INSERT_TB_PEDIDO = "INSERT INTO pedido() VALUES ('','$CODE','$DATE','$id','7')";
  if (!mysqli_query($con,$INSERT_TB_PEDIDO)) {
    # code...
    die("Error al insertar pedido nuevo");
  } else {
    # code...

    $OBTENER_ID_PEDIDO = "SELECT idPedido FROM pedido WHERE codigo='$CODE'";
    $CONSULTAR_ID_PEDIDO = mysqli_query($con,$OBTENER_ID_PEDIDO);
    if (!$CONSULTAR_ID_PEDIDO) {
      # code...
      die("Error el ID pedido no Existe");
    } else {
      # code...
      $ID_PEDIDO = mysqli_fetch_assoc($CONSULTAR_ID_PEDIDO);
      $ID_P = $ID_PEDIDO['idPedido'];
      foreach ($items as $key => $value) {
        # code...
        $idProducto = $items[$key];
        $idCantidad = $cantidad[$key];

        $INSERT_TB_PRODUCTO_PEDIDO = "INSERT INTO pedidoProducto(idPedidoProducto,pedidoIdPedido,productoIdProducto,cantidad)
                                      VALUES ('','$ID_P','$idProducto','$idCantidad')";

        if (!mysqli_query($con,$INSERT_TB_PRODUCTO_PEDIDO)) {
          # code...
          die("Error al Insertar pedido producto");
        } else {
          # code...
          $json["code"][] = $items[$key];
          $json["code"][] = $cantidad[$key];
        }
      }
    }
  }

  mysqli_close($con);
  echo json_encode($json);

?>
