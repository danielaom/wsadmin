<?php
  include_once("../BD/conexion.php");
  $cnn= new conexion();
  $con =$cnn->conectar();

  if (mysqli_select_db($con,"restaurante")) {
    # code...
    $usuario = mysqli_real_escape_string($con,$_POST['usuario']);
    $password = mysqli_real_escape_string($con,$_POST['password']);

    //$sql = "SELECT  FROM  usuario WHERE usuario = '$usuario' password = '$password' AND estado='Habilitado' AND rolIdRol=3";
    $sql = "SELECT u.idUsuario FROM  usuariorol as ur INNER JOIN usuario as u on ur.usuarioIdUsuario=u.idUsuario  WHERE ur.usuario = '$usuario' AND ur.password = '$password' AND u.estado='Habilitado' AND ur.rolIdRol='3'";
    $result=mysqli_query($con,$sql);
    $rows = mysqli_num_rows($result);

    $json = array();
    if($rows > 0) {
      $data = mysqli_fetch_assoc($result);
      $json["codigo"][] = $data['idUsuario'];
    } else {
       $json["codigo"][] = 0;
    }
  } else {
    # code...

  }

  mysqli_close($con);
  echo json_encode($json);
?>
