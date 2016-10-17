<?php

session_start();
require '../conexion.php';

if(!isset($_SESSION["id_usuario"])){
	header("Location: ../index.php");
}

$sql = "SELECT idUsuarioRol, nombre FROM rol";
$result=$mysqli->query($sql);

$bandera = false;

if(!empty($_POST))
{
$nombre = mysqli_real_escape_string($mysqli,$_POST['nombre']);
$usuario = mysqli_real_escape_string($mysqli,$_POST['usuario']);
$password = mysqli_real_escape_string($mysqli,$_POST['password']);
$tipo_usuario = $_POST['usuarioIdUsuario'];
$sha1_pass = sha1($password);

$error = '';

$sqlUser = "SELECT idUsuarioRol FROM usuariorol WHERE usuario = '$usuario'";
$resultUser=$mysqli->query($sqlUser);
$rows = $resultUser->num_rows;



?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8"   name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Sweet stop</title>
	<meta name="description" content="Bootstrap Metro Dashboard">
	<meta name="author" content="Daniela Orellana">
	<meta name="keyword" content="">
	<meta name="viewport" role="navigation"  class="navbar navbar-default" content="width=device-width, initial-scale=1" >
	<link href="../css/bootstrap.css" rel="stylesheet">
	<script src="../js/jquery-1.9.1.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>

</head>

<body bgcolor="#EBEFF1">

<nav role="navigation" class="navbar navbar-default">
	<div class="navbar-header">
		<button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
		<a href="#" class="navbar-brand">SWEET STOP</a>
	</div>

	<div id="navbarCollapse" class="collapse navbar-collapse">
		<ul class="nav navbar-nav">
			<li class="active"><a href="../index.php">Inicio</a></li>
			<li><a href="registro_usuario.php">Usuarios</a></li>

			<li class="dropdown-submenu"><a href="#" tabindex="-1" data-toggle="dropdown">Menú</a>
				<ul class="dropdown-menu">
					<li><a href="registro_categoria.php" tabindex="-1">Categorias</a></li>
					<li><a href="registro_producto.php" tabindex="-1">Productos</a></li>
					<li><a href="registro_promocion.php" tabindex="-1">Promociones</a></li>
				</ul>
			</li>

			<li class="dropdown-submenu"><a href="#" tabindex="-1" data-toggle="dropdown">Reportes</a>
				<ul class="dropdown-menu">
					<li><a href="reporte_cliente.php" tabindex="-1">Clientes</a></li>
					<li><a href="reporte_producto.php" tabindex="-1">Productos</a></li>
					<li><a href="reporte_venta.php" tabindex="-1">Ventas</a></li>
				</ul>
			</li>
		</ul>
		<ul class="nav navbar-nav navbar-right">
			<li data-toggle="modal" data-target="#loginModal">
				<a href="../logout.php "><span class="glyphicon glyphicon-log-out"></span> Cerrar sesión</a>
			</li>
		</ul>
	</div>
</nav>


<br><br><br><br>

<div align="center"><IMG SRC="../img/icono.png" WIDTH=1360 HEIGHT=400    srcset="img/icono.png 2x"></div>






			</div>
		</div>
	</div>
</body>
</html>
<?php } ?>
