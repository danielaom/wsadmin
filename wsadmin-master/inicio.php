<?php

session_start();
require 'conexion.php';

if(!isset($_SESSION["id_usuario"])){
	header("Location: index.php");
}

$idUsuario = $_SESSION['id_usuario'];

$sql = "SELECT u.idUsuarioRol, p.nombre FROM usuariorol AS u INNER JOIN usuario AS p ON u.usuarioIdUsuario=p.idUsuario WHERE u.idUsuarioRol = '$idUsuario'";
$result=$mysqli->query($sql);

$row = $result->fetch_assoc();
?>

<html>
<head>
	<title>Welcome</title>
</head>
<body>

<h1><?php echo 'Bienvenid@ '.utf8_decode($row['nombre']); ?></h1>

<?php if($_SESSION['tipo_usuario']==1) {

	header("Location: vista/indexAdm.php");

 }
 else
	 if($_SESSION['tipo_usuario']==2) {

		 header("Location: vista/indexCj.php");

	 }
?>

<a href="logout.php">Cerrar Sesi&oacute;n</a>

</body>
</html>