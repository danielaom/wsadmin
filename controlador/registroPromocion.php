<?php
  include_once("../BD/conexion.php");
  $cnn= new conexion();
  $con =$cnn->conectar();
  mysqli_select_db($con,"restaurante");

  $ITEMS = $_POST['productos'];
  $codigo = $_POST['codigo'];
  $nombre = $_POST['nombre'];
  $descripcion= $_POST['descripcion'];
  $precio= $_POST['precio'];
  $fechaInicio= $_POST['fechaInicio'];
  $fechaFin = $_POST['fechaFin'];
  $choose = $_POST['imagen'];
  $image = "http://localhost/sw/img/".$choose;
  //$CANTIDAD = $_POST['cantidad'];

  $INSERTAR_P = "INSERT INTO promocion(idPromocion,codigo,nombre,descripcion,precio,fechaInicio,fechaFin,imagen,fecha,estado) 
                 VALUES ('','$codigo','$nombre','$descripcion','$precio','$fechaInicio','$fechaFin','$image','0000/00/00','Habilitado')";

  if (!mysqli_query($con,$INSERTAR_P)) {
    echo "Error al insertar promcion";
  } else {

    $SELECT_ID = "SELECT idPromocion FROM promocion WHERE codigo='$codigo'";
    $RESULTADO = mysqli_query($con,$SELECT_ID);
    $TAM = mysqli_num_rows($RESULTADO);

    if ($TAM > 0) {

      $DATA = mysqli_fetch_array($RESULTADO,MYSQLI_ASSOC);
      $ID = $DATA['idPromocion'];

      foreach ($ITEMS as $key => $value) {
        # code...
        $INSERTAR_PP = "INSERT INTO productopromocion(idProductoPromocion,cantidad,promocionIdPromocion,productoIdproducto)
                  VALUES ('','1','$ID','$value')";

        if (!mysqli_query($con,$INSERTAR_PP)) {
          echo "Error al insertar ProductoPromocion";
        }
      }

      header('location:../vista/mostrar_promocion.php');

    } else {
      echo "La promocion Alertas";
    }
  }

/*foreach ($CANTIDAD as $key => $value) {
  # code...
  echo "<br>cantidad: ".$value;
}*/
?>
