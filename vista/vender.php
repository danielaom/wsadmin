<?php
session_start();
if (!isset($_SESSION['loggedin'])){
	# code...
}?>
	<!DOCTYPE html>
	<html lang="en">
	<head>
		<meta charset="utf-8"   name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Sweet stop</title>
		<meta name="description" content="Bootstrap Metro Dashboard">
		<meta name="author" content="Daniela Orellana">
		<link rel="shortcut icon" href="../img/favicon.ico">
		<meta name="keyword" content="">
		<meta name="viewport" role="navigation"  class="navbar navbar-default" content="width=device-width, initial-scale=1" >
		<link href="../css/bootstrap.css" rel="stylesheet">
		<script src="../js/jquery-1.9.1.min.js"></script>
		<script src="../js/bootstrap.min.js"></script>

	</head>

	<body bgcolor="#EBEFF1">

	<nav role="navigation" class="navbar navbar-default">
		<div class="navbar-header">
			<button type="button" data-target="#navbarCollapse_1" data-toggle="collapse" class="navbar-toggle">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a href="#" class="navbar-brand">SWEET STOP</a>
		</div>

		<div id="navbarCollapse_1" class="collapse navbar-collapse">
			<ul class="nav navbar-nav">

				<!-- Administrador -->
				<?php if ($_SESSION['tipo_usuario'] == 1):?>
					<link rel="shortcut icon" href="../img/favicon.ico">
					<li class="active"><a href="../index.php">Inicio</a></li>
					<li><a href="../vista/registro_usuario.php">Usuarios</a></li>

					<li class="dropdown-submenu"><a href="#" tabindex="-1" data-toggle="dropdown">Menú</a>
						<ul class="dropdown-menu">
							<li><a href="../vista/registro_categoria.php" tabindex="-1">Categorias</a></li>
							<li><a href="../vista/registro_producto.php" tabindex="-1">Productos</a></li>
							<li><a href="../vista/registro_promocion.php" tabindex="-1">Promociones</a></li>
						</ul>
					</li>

					<li class="dropdown-submenu"><a href="#" tabindex="-1" data-toggle="dropdown">Reportes</a>
						<ul class="dropdown-menu">
							<li><a href="../vista/reporte_cliente.php" tabindex="-1">Clientes</a></li>
							<li><a href="../vista/reporte_producto.php" tabindex="-1">Productos</a></li>
							<li><a href="../vista/reporte_venta.php" tabindex="-1">Ventas</a></li>
						</ul>
					</li>
				<?php endif; ?>

				<?php if ($_SESSION['tipo_usuario'] == 2):?>
				      	<li>   &nbsp;&nbsp;&nbsp;</li>
					    	<li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li>
                <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li>
								<li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li>
								<li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li>
								<li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li>
								<li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li>
								<li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li>
								<li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li>
								<li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li>
								<li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li>
								<li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li>

					<li><a href="../index.php">
						<img src="../img/minicio.png" class="img-rounded" alt="bordes redondeados">
					<center><p>Inicio</p></center>
				</a></li>

					<li><a href="../vista/registro_cliente.php">
						<img src="../img/mcliente.png" class="img-rounded" alt="bordes redondeados">
					<center><p>Clientes</p></center>
				</a></li>

        <li><a href="../vista/vender.php">
          <img src="../img/mvender.png" class="img-rounded" alt="bordes redondeados">
        <center><p>Vender</p></center>
        </a></li>

			<li><a href="../vista/pedidos.php">
				<img src="../img/mpedido.png" class="img-rounded" alt="bordes redondeados">
			<center><p>Pedidos</p></center>
		</a></li>

		<li><a href="../vista/reservas.php">
			<img src="../img/mreservas.png" class="img-rounded" alt="bordes redondeados">
		<center><p>Reservas</p></center>
	</a></li>

		<li><a href="../vista/ventas.php">
			<img src="../img/mventas.png" class="img-rounded" alt="bordes redondeados">
		<center><p>Ventas</p></center>
	</a></li>

				<?php endif; ?>


			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li data-toggle="modal" data-target="#loginModal">
					<a href="../logout.php "><span class="glyphicon glyphicon-log-out"></span> Cerrar sesión</a>
				</li>
			</ul>

		</div>
	</nav>

<ul class="nav nav-tabs" role="tablist">


  <?php
	  include_once("../BD/conexion.php");
	  $cnn= new conexion();
	  $con =$cnn->conectar();
	  mysqli_select_db($con,"restaurante");
	  $queryRoles="SELECT * FROM categoria";
	  $getAll = mysqli_query($con,$queryRoles);
	  while($row = mysqli_fetch_array($getAll, MYSQLI_ASSOC)){
	?>

  <li value="<?php echo $row['idCategoria']; ?>" ><a href="#hometab" role="tab" data-toggle="tab"><?php echo $row['nombre']; ?></a></li>
	<?php
		}	
		mysql_close($con);
	?>
</ul>
</li>

<!-- Tab panes -->
<div class="tab-content">


</div>

</body>
</html>
