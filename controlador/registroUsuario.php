<?php
include_once("../BD/conexion.php");
$cnn= new conexion();
$con =$cnn->conectar();
mysqli_select_db($con,"restaurante");
if (mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
} else {

    $nombre =  strtoupper ($_POST["nombre"]);
    $apellidoPaterno  = strtoupper ($_POST["ap_paterno"]);
    $apellidoMaterno = strtoupper ($_POST["ap_materno"]);
    $ci   = strtoupper  ($_POST["ci"]);
    $telefono = $_POST["telefono"];
    $correo = $_POST["correo"];
    $rol = $_POST["rol"];

    $VERIFY_USER = "SELECT * FROM usuario WHERE ci='$ci'";
    $QUERY_VERIFY = mysqli_query($con,$VERIFY_USER);
    $TAM = mysqli_num_rows($QUERY_VERIFY);



    function randomPassword($length=6) {
        $char = "abcdefghijklmnopqrstuvwyxzABCDEFGHIJKLMNOPQRSTUVWZXY0987654321";
        return substr(str_shuffle($char),0,$length);
    }

    $PASSWORD = randomPassword();
    $PASS= $PASSWORD;
    if ($TAM > 0) {
        //TODO: Mostrar un mensaje o Alerta USUARIO EISTENTE;
        //echo "USUARIO EXISTENTE";
        header('location:../vista/registro_usuario.php?error=201');
    } else {


        $QUERY_INSERT = "INSERT INTO usuario(idUsuario,nombre,apellidoPaterno,apellidoMaterno,ci,telefono,correo,estado)
                            VALUES('','$nombre','$apellidoPaterno','$apellidoMaterno','$ci','$telefono','$correo','Habilitado')";

        if(!mysqli_query($con, $QUERY_INSERT)) {
            die("Error al insertar usuario nuevo");
        } else{
            $QUERY_OBTENER=mysqli_query($con,"SELECT * from usuario WHERE ci='$ci'");
            $DATA = mysqli_fetch_array($QUERY_OBTENER);
            $ID = $DATA['idUsuario'];
            $USRNOMBRE =substr ($DATA['nombre'],0,2);
            $USRAPELLIDO =substr( $DATA['apellidoPaterno'],0,2);

       $USUARIO=$USRNOMBRE.$USRAPELLIDO;
            $QUERY_INSERTROL= "insert into usuariorol(idUsuarioRol,usuario,password,usuarioIdUsuario,rolIdRol)
                            VALUES ('','$USUARIO','$PASS)','$ID','$rol')";

            if (!mysqli_query($con,$QUERY_INSERTROL)){
                echo "Error al insertar Usuario-Rol";
            } else {
                //Enviar Email de Credencial
                $MENSAJE = " usuario: ".$USUARIO." password: ".$PASSWORD;
                $to = $correo;
                $subject = 'Credencial de Acceso al Sistema ...';
                $header = 'From: dani292dani@gmail.com'.
                    'MIME-Version: 1.0'.'\r\n'.
                    'Content-type: text/html; charset=utf-8';

                if (mail($to,$subject,$MENSAJE,$header)) {
                    //echo "email enviado!";
                } else {
                    echo "error al enviar email!";
                }

                header('location:../vista/registro_usuario.php');
                exit();
            }



        }

    }

    mysqli_close($con);
}
?>
