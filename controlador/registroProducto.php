<?php
include_once("../BD/conexion.php");
$cnn= new conexion();
$con =$cnn->conectar();
mysqli_select_db($con,"restaurante");
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
} else {


    $nombre = strtoupper($_POST["nombre"]);
    $descripcion = strtoupper($_POST["descripcion"]);
    $precio = ($_POST["precio"]);
    $categoria = $_POST["categoria"];
    $imagen = $_POST["imagen"];

    $VERIFY_USER = "SELECT * FROM producto WHERE nombre='$nombre'";
    $QUERY_VERIFY = mysqli_query($con, $VERIFY_USER);
    $TAM = mysqli_num_rows($QUERY_VERIFY);

    if ($TAM > 0) {
        //echo "producto EXISTENTE";
        header('location:../vista/registro_producto.php?error=201');
    } else {

        $QUERY_INSERIMAGEN = "insert into imagen(idImagen,imagen)
                            VALUES ('','$imagen')";

        if (!mysqli_query($con, $QUERY_INSERIMAGEN)) {
            die("Error al insertar imagen");
        } else {
            $QUERY_OBTENER = mysqli_query($con, "SELECT * from producto WHERE nombre='$nombre'");
            $DATA = mysqli_fetch_array($QUERY_OBTENER);
            $ID = $DATA['idImagen'];
            $QUERY_INSERT = "INSERT INTO producto(idProducto,nombre,descripcion,precio,fecha,estado,categoriaIdCategoria,imagenIdImagen)
                            VALUES('','$nombre','$descripcion','$precio','FECHA','Habilitado','$categoria','$ID')";



            if (!mysqli_query($con, $QUERY_INSERT)) {
                echo "Error al insertar producto";
            } else {

                header('location:../vista/registro_producto.php');
                exit();
            }
        }
    }
    mysqli_close($con);
}
?>
