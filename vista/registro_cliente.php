
<?php
session_start();
if (!isset($_SESSION['loggedin'])){
	# code...?>

	<!DOCTYPE html>
	<html lang="en">
	<head>
		<meta charset="utf-8"   name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Sweet stop</title>
		<link rel="shortcut icon" href="../img/favicon.ico">
		<meta name="description" content="Bootstrap Metro Dashboard">
		<meta name="author" content="Daniela Orellana">
		<meta name="keyword" content="">
		<meta name="viewport" role="navigation"  class="navbar navbar-default" content="width=device-width, initial-scale=1" >
		<link href="../css/bootstrap.css" rel="stylesheet">

<link rel="stylesheet" href="../css/flexslider.css" >
<link rel="stylesheet" href="../css/styleSlider.css" >
<script type="text/javascript" src="../js/modernizr.custom.28468.js"></script>
<script src="../js/flexslider-min.js.js"></script>
<script type="text/javascript" src="../js/jquery-1.10.2.min.js"></script>

		<script src="../js/jquery-1.9.1.min.js"></script>
		<script src="../js/bootstrap.min.js"></script>



			<link rel="stylesheet" href="../css/flexslider.css" type="text/css">
			<script src="../js/jquery.min.js"></script>
			<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
			<script src="../js/jquery.flexslider.js"></script>
			<script type="text/javascript" charset="utf-8">
		  $(window).load(function() {
		    $('.flexslider').flexslider({
		    	touch: true,
		    	pauseOnAction: false,
		    	pauseOnHover: false,
		    });
		  });
		</script>



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

				<li class="active"><a href="#">Inicio</a></li>
				<li><a href="#">Acerca de</a></li>
				<li><a href="#">Blog</a></li>
				<li><a href="#">Contacto</a></li>

			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li data-toggle="modal" data-target="#loginModal">
					<a><span class="glyphicon glyphicon-log-in"></span> Inicio de sesión</a>
				</li>
			</ul>

		</div>
	</nav>

	<?php if (isset($_GET['error'])) { echo "<script> $('#loginModal').modal('show'); </script>"; }?>

	<div class="flexslider">
			<ul class="slides">
				<li>
					<img src="../img/1.png" alt="">
					<section class="flex-caption">

					</section>
				</li>
				<li>
					<img src="../img/2.jpg" alt="">
					<section class="flex-caption">

					</section>
				</li>
				<li>
					<img src="../img/3.jpg" alt="">
					<section class="flex-caption">

					</section>
				</li>
			</ul>
		</div>

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
	<?php
} else {
	# code...
	$EVENTO = $_SESSION['loggedin']; ?>

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


<div class="container">
    <div class="row">
        <div class="col-md-8">
            <h1>Clientes</h1>
            <div class="row-fluid sortable">
                <div class="box span12">
                    <div class="box-header" data-original-title>
                        <h2><i class="halflings-icon user"></i><span class="break"></span>Lista clientes</h2>
                        <div class="box-icon">

                            <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>

                        </div>
                    </div>
                    <div class="box-content">
                        <table id="usu" class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Apellido paterno</th>
                                <th>Apellido materno</th>
                                <th>Ci</th>
                                <th>Celular</th>
                                <th>Dirección</th>
                                <th>Estado</th>
                                <th>Editar</th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php
                            include_once("../BD/conexion.php");
                            $cnn= new conexion();
                            $con =$cnn->conectar();
                            mysqli_select_db($con,"restaurante");
                            $query_Mostrar = "SELECT u.idUsuario,u.nombre, u.apellidoPaterno, u.apellidoMaterno, u.ci, u.telefono,u.direccion, u.estado  FROM usuario as u INNER JOIN usuariorol as r on u.idUsuario=r.usuarioIdUsuario WHERE r.rolIdRol=3";
                            //$query_Mostrar = "SELECT * FROM usuario  ";
                            $getAll = mysqli_query($con, $query_Mostrar);
                            while ($row = mysqli_fetch_array($getAll, MYSQLI_ASSOC)):
                                ?>
                                <tr>
                                    <td><?php echo $row ['nombre']; ?></td>
                                    <td><?php echo $row ['apellidoPaterno']; ?></td>
                                    <td><?php echo $row ['apellidoMaterno']; ?></td>
                                    <td><?php echo $row ['ci']; ?></td>
                                    <td><?php echo $row ['telefono']; ?></td>
                                    <td><?php echo $row ['direccion']; ?></td>
                                    <td>
                                        <?php
                                        switch ($row ['estado']) {
                                            case 'Habilitado':
                                                echo "
                                               <a class=\"btn btn-success btn-xs\">
                                                <span class=\"glyphicon glyphicon-ok\" aria-hidden=\"true\"  ></span>";
                                                break;
                                            case 'Deshabilitado':

                                                echo "
                                               <a class=\"btn btn-danger btn-xs\">
                                                <span class=\"glyphicon glyphicon-remove\" aria-hidden=\"true\"  ></span>";
                                                break;
                                        }
                                        ?>
                                    </td>
                                    <td class="center">
                                        <a class="btn btn-info btn-xs" href="?id=<?php echo $row ['idUsuario']; ?>">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>

                                        </a>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
        <div class="col-md-4">
            <h1>Nuevo cliente</h1>
            <div class="row-fluid sortable">
                <div class="box span12">
                    <div class="box-header" data-original-title>
                        <h2><i class="halflings-icon edit"></i><span class="break"></span>Ingresar datos del cliente
                        </h2>
                        <div class="box-icon">
                            <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                        </div>
                    </div>
                    <div class="box-content">

                        <?php
                        if (!empty($_GET['id'])) {
                            $ID = $_GET['id'];
                            $SELECCIONAR_USUARIO = "SELECT * FROM usuario WHERE idUsuario='$ID'";

                            $QUERY_OBTENER_USUARIO = mysqli_query($con, $SELECCIONAR_USUARIO);
                            while ($DATA = mysqli_fetch_array($QUERY_OBTENER_USUARIO, MYSQLI_ASSOC)):

                                ?>
                                <form id="usuario" class="form-horizontal" action="../controlador/editarCliente.php"
                                      method="POST">

                                    <div class="control-group">
                                        <div class="controls">
                                            <input name="id" class="input-xlarge form-control focused"
                                                   id="focusedInput" type="hidden" placeholder="Ingrese nombre…"
                                                   value="<?php echo $DATA['idUsuario']; ?>">
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label class="control-label">Nombre</label>
                                        <div class="controls">
                                            <input name="nombre" class="input-xlarge form-control focused"
                                                   id="nombre" type="text" placeholder="Ingrese nombre…"
                                                   value="<?php echo $DATA['nombre']; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Apellido Paterno</label>
                                        <div class="controls">
                                            <input name="ap_paterno" class="input-xlarge form-control focused"
                                                   id="focusedInput" type="text"
                                                   placeholder="Ingrese apellido paterno…"
                                                   value="<?php echo $DATA['apellidoPaterno']; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Apellido Materno</label>
                                        <div class="controls">
                                            <input name="ap_materno" class="input-xlarge form-control focused"
                                                   id="focusedInput" type="text"
                                                   placeholder="Ingrese apellido materno…"
                                                   value="<?php echo $DATA['apellidoMaterno']; ?>">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label">C&eacutedula de identidad</label>
                                        <div class="controls">
                                            <input name="ci" class="input-xlarge form-control focused"
                                                   id="focusedInput" type="text"
                                                   placeholder="Ingrese numero de carnet…"
                                                   value="<?php echo $DATA['ci']; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Celular</label>
                                        <div class="controls">
                                            <input name="telefono" class="input-xlarge form-control focused"
                                                   id="focusedInput" type="text" placeholder="Ingrese celular…"
                                                   value="<?php echo $DATA['telefono']; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Dirección</label>
                                        <div class="controls">
                                            <input name="direccion" class="input-xlarge form-control focused"
                                                   id="focusedInput" type="text" placeholder="Ingrese direccion…"
                                                   value="<?php echo $DATA['telefono']; ?>">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label" for="selectError3">Estado</label>
                                        <div class="controls">
                                            <select name="estado" id="selectError3" class="form-control">
                                                <?php
                                                $estado = $DATA['estado'];
                                                if ($estado == 'Habilitado') {
                                                    echo '  <option selected="selected" value="Habilitado">Habilitado</option>';
                                                    echo '  <option value="Deshabilitado">Deshabilitado</option> ';
                                                } else {
                                                    echo '  <option selected="selected" value="Deshabilitado">Deshabilitado</option> ';
                                                    echo '  <option  value="Habilitado">Habilitado</option>';

                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-actions">
                                        <button type="submit" class="btn btn-primary">Actualizar</button>
                                        <button type="reset" class="btn btn-danger">Cancelar</button>
                                    </div>
                                    </fieldset>
                                </form>
                            <?php endwhile;
                        } else { ?>
                            <form id="usuario" class="form-horizontal" action="../controlador/registroCliente.php"
                                  method="POST">

                                <fieldset>

                                    <div class="form-group">
                                        <label class="control-label">*Nombre</label>
                                        <div class="controls">
                                            <input name="nombre" class="input-xlarge form-control focused"
                                                   id="nombre" type="text" placeholder="Ingrese nombre…">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">*Apellido Paterno</label>
                                        <div class="controls">
                                            <input name="ap_paterno" class="input-xlarge form-control focused"
                                                   id="focusedInput" type="text"
                                                   placeholder="Ingrese apellido paterno…">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Apellido Materno</label>
                                        <div class="controls">
                                            <input name="ap_materno" class="input-xlarge form-control focused"
                                                   id="focusedInput" type="text"
                                                   placeholder="Ingrese apellido materno…">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label">*C&eacute;dula de identidad</label>
                                        <div class="controls">
                                            <input name="ci" class="input-xlarge form-control focused"
                                                   id="focusedInput" type="text"
                                                   placeholder="Ingrese numero de carnet…">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">*Tel&eacute;fono</label>
                                        <div class="controls">
                                            <input name="telefono" class="input-xlarge form-control focused"
                                                   id="focusedInput" type="text" placeholder="Ingrese telefono…">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">*Dirección</label>
                                        <div class="controls">
                                            <texarea name="direccion" class="input-xlarge form-control focused"
                                                   id="focusedInput" type="text" placeholder="Ingrese correo…">

                                                </texarea>
                                        </div>

                                    </div>

                                    <br>
                                    <div class="form-actions">
                                        <button type="submit" id="btnvalidar" class="btn btn-primary">Registrar
                                        </button>
                                        <button type="button" class="btn btn-danger" onclick="history.go(-1); return false;">Cancelar</button>
                                    </div>
                                </fieldset>
                            </form>
                        <?php }
                        if (!empty($_GET['error'])) {

                            echo "<font color='red'>Cliente existente</font>";

                        } ?>
                    </div>
                </div><!--/span-->

            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        $('#usuario').bootstrapValidator({
            message: 'Este valor no es válido',
            fields: {
                nombre: {
                    message: 'El nombre de usuario no es válido',
                    validators: {
                        notEmpty: {
                            message: 'El nombre del usuario es necesario'
                        },
                        regexp: {
                            regexp: /^[a-zA-ZsñÑ\s]+$/,
                            message: 'El nombre del usuario no acepta numeros ni caracteres especiales'
                        },
                        stringLength: {
                            min: 3,
                            max: 30,
                            message: 'El nombre de usuario debe contener más de 3 y menos de 30 caracteres'
                        }

                    }
                },
                ap_paterno: {
                    message: 'El apellido del usuario no es válido',
                    validators: {
                        notEmpty: {
                            message: 'El apellido del usuario es necesario'
                        },
                        regexp: {
                            regexp: /^[a-zA-ZsñÑ\s]+$/,
                            message: 'El apellido no acepta numeros ni caracteres especiales'
                        },
                        stringLength: {
                            min: 3,
                            max: 30,
                            message: 'El apellido de usuario debe contener más de 3 y menos de 30 caracteres'
                        }

                    }
                },
                ap_materno: {
                    message: 'El apellido del usuario no es válido',
                    validators: {

                        regexp: {
                            regexp: /^[a-zA-ZsñÑ\s]+$/,
                            message: 'El apellido no acepta numeros ni caracteres especiales '
                        },
                        stringLength: {
                            min: 3,
                            max: 30,
                            message: 'El apellido de usuario debe contener más de 3 y menos de 30 caracteres'
                        }

                    }
                },

                ci: {
                    message: 'El Ci no es válido',
                    validators: {
                        notEmpty: {
                            message: 'El Ci es necesario'
                        },


                        regexp: {
                            regexp: /^([Ee]{0,1})([-]{0,1})([0-9]{5,9})([-]{0,1})([0-9]{0,1})([a-zA-Z]{0,1})+$/,
                            message: 'El Ci debe ser de forma ej. 12345 o 12345-A7 o E-12345'
                        },
                        stringLength: {
                            min: 5,
                            max: 13,
                            message: 'El ci debe contener más de 5 y menos de 13 caracteres'
                        }
                    }
                },

                telefono: {
                    message: 'El celulaar no es válido',
                    validators: {
                        notEmpty: {
                            message: 'El celular es necesario'
                        },
                        regexp: {
                            regexp: /^([67]{1,1})([0-9]{7,7})+$/,
                            message: 'El celular no acepta letras ni caracteres especiales '
                        },
                        stringLength: {
                            min: 7,
                            max: 8,
                            message: 'El celular debe contener más de 7 y menos de 8 caracteres'
                        }

                    }
                },

                direccion: {
                    message: 'El apellido del usuario no es válido',
                    validators: {

                        regexp: {
                            regexp: /^[a-zA-ZsñÑ\s]+$/,
                            message: 'El apellido no acepta numeros ni caracteres especiales '
                        },
                        stringLength: {
                            min: 3,
                            max: 30,
                            message: 'El apellido de usuario debe contener más de 3 y menos de 30 caracteres'
                        }

                    }
                }
            }
        });
    });
</script>


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>

<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="../js/bootstrap.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#usu').DataTable( {
            "language": {
                "lengthMenu": "Mostrar _MENU_ registros por pagina",
                "zeroRecords": "No se econtraron registros",
                "info": "Mostrando pagina _PAGE_ de _PAGES_",
                "infoEmpty": "No se encontraron registros",
                "infoFiltered": "(filtered from _MAX_ total records)",
                "search": "Buscar",
                "paginate": {
                    "first":      "Primero",
                    "last":       "Ultimo",
                    "next":       "Siguiente",
                    "previous":   "Anterior"
                },

            }
        } );
    });
</script>
</body>
</html>
<?php }?>
