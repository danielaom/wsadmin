<?php

include_once("../BD/conexion.php");
//if (    si la session no esta iniciada == null)
//  redireccionar a logeo
if (empty($_SESSION['id'])) {
//    header("Location: ../index.php");
}
?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Sweet stop</title>
        <meta name="description" content="Bootstrap Metro Dashboard">
        <meta name="author" content="Daniela Orellana">
        <meta name="keyword" content="">

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="../css/bootstrap.css" rel="stylesheet">
        <script src="../js/jquery-1.9.1.min.js"></script>
        <script src="../js/bootstrap.min.js"></script>

        <link rel="stylesheet" href="../css/bootstrapValidator.css"/>
        <script type="text/javascript" src="../js/jquery-1.10.2.min.js"></script>
        <script type="text/javascript" src="../js/bootstrapValidator.js"></script>
    </head>
    <body>


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
                <li ><a href="indexAdm.php">Inicio</a></li>
                <li><a href="registro_usuario.php">Usuarios</a></li>

                <li class="dropdown-submenu active" ><a href="#" tabindex="-1" data-toggle="dropdown">Menú</a>
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
                    <a href="../logout.php ">
                        <span class="glyphicon glyphicon-log-out"></span> Cerrar sesión
                    </a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h1>Categorias</h1>
                <div class="row-fluid sortable">
                    <div class="box span12">
                        <div class="box-header" data-original-title>
                            <h2><i class="halflings-icon user"></i><span class="break"></span>Lista categorias</h2>
                            <div class="box-icon">

                                <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>

                            </div>
                        </div>
                        <div class="box-content">
                            <table class="table table-striped table-bordered bootstrap-datatable datatable">
                                <thead>
                                <tr>
                                    <th>Categoria</th>
                                    <th>Estado</th>
                                    <th>Editar</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $query_Mostrar = "SELECT * FROM categoria ";
                                $getAll = mysqli_query($con, $query_Mostrar);
                                while ($row = mysqli_fetch_array($getAll, MYSQLI_ASSOC)):
                                    ?>
                                    <tr>
                                        <td><?php echo $row ['nombre']; ?></td>
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
                                            <a class="btn btn-info btn-xs" href="?id=<?php echo $row ['idCategoria']; ?>">
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
                <h1>Nueva Categoría</h1>
                <div class="row-fluid sortable">
                    <div class="box span12">
                        <div class="box-header" data-original-title>
                            <h2><i class="halflings-icon edit"></i><span class="break"></span>Ingresar nueva categoría
                            </h2>
                            <div class="box-icon">
                                <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                            </div>
                        </div>
                        <div class="box-content">

                            <?php
                            if (!empty($_GET['id'])) {
                                $ID = $_GET['id'];
                                $SELECCIONAR_CATEGORIA = "SELECT * FROM categoria WHERE idCategoria='$ID'";

                                $QUERY_OBTENER_CATEGORIA = mysqli_query($con, $SELECCIONAR_CATEGORIA);
                                while ($DATA = mysqli_fetch_array($QUERY_OBTENER_CATEGORIA, MYSQLI_ASSOC)):

                                    ?>
                                    <form id="categoria" class="form-horizontal" action="../controlador/editarCategoria.php"
                                          method="POST">

                                        <div class="control-group">
                                            <div class="controls">
                                                <input name="id" class="input-xlarge form-control focused"
                                                       id="focusedInput" type="hidden" placeholder="Ingrese nombre…"
                                                       value="<?php echo $DATA['idCategoria']; ?>">
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
                                <form id="categoria" class="form-horizontal" action="../controlador/registroCategoria.php"
                                      method="POST">

                                    <fieldset>

                                        <div class="form-group">
                                            <label class="control-label">*Nombre</label>
                                            <div class="controls">
                                                <input name="nombre" class="input-xlarge form-control focused"
                                                       id="nombre" type="text" placeholder="Ingrese nombre…">
                                            </div>
                                        </div>

                                        <div class="form-actions">
                                            <button type="submit" id="btnvalidar" class="btn btn-primary">Registrar
                                            </button>
                                            <button type="reset" class="btn btn-danger">Cancelar</button>
                                        </div>
                                    </fieldset>
                                </form>
                            <?php }
                            if (!empty($_GET['error'])) {
                                echo "<font color='red'>Categoria existente</font>";

                            } ?>
                        </div>
                    </div><!--/span-->

                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#categoria').bootstrapValidator({
                message: 'Este valor no es válido',
                fields: {
                    nombre: {
                        message: 'La categoria no es válido',
                        validators: {
                            notEmpty: {
                                message: 'El nombre de la categoria es necesario'
                            },
                            regexp: {
                                regexp: /^[a-zA-ZsñÑ\s]+$/,
                                message: 'El nombre de la categoria no acepta numeros ni caracteres especiales'
                            },
                            stringLength: {
                                min: 3,
                                max: 30,
                                message: 'El nombre de la categoria debe contener más de 3 y menos de 30 caracteres'
                            }

                        }
                    }
                }
            });
        });
    </script>
    </body>
    </html>
<?php
mysqli_close($con);
?>