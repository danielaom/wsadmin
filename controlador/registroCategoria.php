<?php

$con = mysqli_connect("localhost","root","","restaurante");


if (mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
} else {
    $nombre =  strtoupper ($_POST["nombre"]);


    $VERIFY_USER = "SELECT * FROM categoria WHERE nombre='$nombre'";
    $QUERY_VERIFY = mysqli_query($con,$VERIFY_USER);
    $TAM = mysqli_num_rows($QUERY_VERIFY);




    if ($TAM > 0) {
        //TODO: Mostrar un mensaje o Alerta USUARIO EISTENTE;
        //echo "USUARIO EXISTENTE";
        header('location:../vista/registro_categoria.php?error=201');
    } else {

        $QUERY_INSERT = "INSERT INTO categoria(idCategoria,nombre,estado)
                            VALUES('','$nombre','Habilitado')";

        if(!mysqli_query($con, $QUERY_INSERT)) {
            die("Error al insertar categoria nuevo");
        } else{
            $QUERY_OBTENER=mysqli_query($con,"SELECT * from categoria WHERE nombre='$nombre'");
            $DATA = mysqli_fetch_array($QUERY_OBTENER);
            $ID = $DATA['idCategoria'];


            header('location:../vista/registro_categoria.php');

        }

    }

    mysqli_close($con);
}
?>




