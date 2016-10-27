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
		<script src="../js/jquery-1.9.1.min.js"></script>
		<script src="../js/bootstrap.min.js"></script>
	 <link rel="stylesheet" href="../css/bootstrap.min.css" >
	 <script src="../js/jquery.min.js"></script>
<script type='text/javascript' src='../js/chosen.jquery.min.js'></script>
<link rel="stylesheet" type="text/css" href="../css/chosen.min.css" />

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

  <div align="right"><img src="../img/rechazados.jpg"></div>
  <div class="col-md-2"></div>
  <div class="col-md-2">


<table>
                <tr>
                    <td><img src="../img/nuevo.png"></td>
                    <td><h4><i class="halflings-icon user"></i><span class="break"></span>Nuevos</h4></td>
                </tr>

            </table>

    


<?php
                                  include_once("../BD/conexion.php");
                                  $cnn= new conexion();
                                  $con =$cnn->conectar();
                                  mysqli_select_db($con,"restaurante");
                                  $query_Mostrar = "SELECT * FROM categoria ";
                                  $getAll = mysqli_query($con, $query_Mostrar);
                                  while ($row = mysqli_fetch_array($getAll, MYSQLI_ASSOC)):
                                      ?>

<table class="table table-striped table-bordered" cellspacing="0" width="70px">
	<tr>
    <td>  <div class="margin"  >
          <div class="panel panel-danger">
            <div class="panel-heading" width="20px" length="50px">
              <h2 class="panel-title"><?php echo $row ['nombre']; ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              	<button style="text-align:right"  type="button" class="btn btn-default btn-xs btn-round"><span class="glyphicon glyphicon-plus"></span></button></h2>
            </div>
            <div class="panel-body">
              <p><?php echo $row ['nombre']; ?></p>
            </div>
            <div class="panel-footer">
            	
              <a href="#" class="btn btn-danger">En proceso<span class="glyphicon glyphicon-menu-right"></a>
            </div>
          </div>
        </div></td>
</tr>
         <?php endwhile; ?>

</table>
  		</div>




    <div class="col-md-2">
    	<table>
                <tr>
                    <td><img src="../img/aceptado.jpg"></td>
                    <td><h4><i class="halflings-icon user"  ></i><span class="break"></span>Aceptados</h4></td>
                </tr>

            </table>
           



<?php
                                  include_once("../BD/conexion.php");
                                  $cnn= new conexion();
                                  $con =$cnn->conectar();
                                  mysqli_select_db($con,"restaurante");
                                  $query_Mostrar = "SELECT * FROM categoria ";
                                  $getAll = mysqli_query($con, $query_Mostrar);
                                  while ($row = mysqli_fetch_array($getAll, MYSQLI_ASSOC)):
                                      ?>

<table class="table table-striped table-bordered" cellspacing="0" width="70px">
	<tr>
    <td>  <div class="margin"  >
          <div class="panel panel-warning">
            <div class="panel-heading" width="20px" length="50px">
              <h2 class="panel-title"><?php echo $row ['nombre']; ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              	<button style="text-align:right"  type="button" class="btn btn-default btn-xs btn-round"><span class="glyphicon glyphicon-plus"></span></button></h2>
            </div>
            <div class="panel-body">
              <p><?php echo $row ['nombre']; ?></p>
            </div>
            <div class="panel-footer">
            	
              <a href="#" class="btn btn-warning">En proceso<span class="glyphicon glyphicon-menu-right"></a>
            </div>
          </div>
        </div></td>
</tr>
         <?php endwhile; ?>

</table>
  		</div>


 
      <div class="col-md-2">
      	<table>
                <tr>
                    <td><img src="../img/proceso.jpg"></td>
                    <td><h4><i class="halflings-icon user"  ></i><span class="break"></span>En proceso</h4></td>
                </tr>

            </table>
        
       <?php
                                  include_once("../BD/conexion.php");
                                  $cnn= new conexion();
                                  $con =$cnn->conectar();
                                  mysqli_select_db($con,"restaurante");
                                  $query_Mostrar = "SELECT * FROM categoria ";
                                  $getAll = mysqli_query($con, $query_Mostrar);
                                  while ($row = mysqli_fetch_array($getAll, MYSQLI_ASSOC)):
                                      ?>

<table class="table table-striped table-bordered" cellspacing="0" width="70px">
	<tr>
    <td>  <div class="margin"  >
          <div class="panel panel-info">
            <div class="panel-heading" width="20px" length="50px">
              <h2 class="panel-title"><?php echo $row ['nombre']; ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              	<button style="text-align:right"  type="button" class="btn btn-default btn-xs btn-round"><span class="glyphicon glyphicon-plus"></span></button></h2>
            </div>
            <div class="panel-body">
              <p><?php echo $row ['nombre']; ?></p>
            </div>
            <div class="panel-footer">
            	
              <a href="#" class="btn btn-info">En proceso<span class="glyphicon glyphicon-menu-right"></a>
            </div>
          </div>
        </div></td>
</tr>
         <?php endwhile; ?>

</table>
  		</div>
   
    <div class="col-md-2">
    		<table>
                <tr>
                    <td><img src="../img/desp.jpg"></td>
                    <td><h4><i class="halflings-icon user"  ></i><span class="break"></span>Despachados</h4></td>
                </tr>

            </table>

    
      <?php
                                  include_once("../BD/conexion.php");
                                  $cnn= new conexion();
                                  $con =$cnn->conectar();
                                  mysqli_select_db($con,"restaurante");
                                  $query_Mostrar = "SELECT * FROM categoria ";
                                  $getAll = mysqli_query($con, $query_Mostrar);
                                  while ($row = mysqli_fetch_array($getAll, MYSQLI_ASSOC)):
                                      ?>

<table class="table table-striped table-bordered" cellspacing="0" width="70px">
	<tr>
    <td>  <div class="margin"  >
          <div class="panel panel-success">
            <div class="panel-heading" width="20px" length="50px">
              <h2 class="panel-title"><?php echo $row ['nombre']; ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              	<button style="text-align:right"  type="button" class="btn btn-default btn-xs btn-round"><span class="glyphicon glyphicon-plus"></span></button></h2>
            </div>
            <div class="panel-body">
              <p><?php echo $row ['nombre']; ?></p>
            </div>
            <div class="panel-footer">
            	
              <a href="#" class="btn btn-success">En proceso<span class="glyphicon glyphicon-menu-right"></a>
            </div>
          </div>
        </div></td>
</tr>
         <?php endwhile; ?>

</table>
  		</div>
<div class="col-md-2"></div>




<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">

				<form id="loginForm" method="POST" class="form-horizontal" action="controlador/inicioSesion.php">

					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title">Inicio de Sesión</h4>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<label class="col-md-3 control-label">Usuario</label>
							<div class="col-md-7">
								<input type="text" class="form-control" name="usuario" id="usuario" required/>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Contrasenia</label>
							<div class="col-md-7">
								<input type="password" class="form-control" name="password" id="password" required/>
							</div>
						</div>

					</div>
					<div class="modal-footer">
						<div class="form-group">
							<div class="col-md-offset-5 col-md-5 ">
								<button type="submit" class="btn btn-default" name="restaurant" value="restaurant">Iniciar sesion</button>
							</div>
						</div>
					</div>
				</form>


				<div style = "font-size:16px; color:#cc0000;"><?php echo isset($error) ? utf8_decode($error) : '' ; ?></div>
			</div>
		</div>
	</div>


</body>
</html>


</div>
<script>
    $('#categoria').chosen();
</script>

</body>
</html>
