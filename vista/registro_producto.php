<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
    # code...
    header("location: ../index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sweet stop</title>
    <meta name="description" content="Bootstrap Metro Dashboard">
    <meta name="author" content="Daniela Orellana">
    <link rel="shortcut icon" href="img/favicon.ico">
    <meta name="keyword" content="">
    <meta name="viewport" role="navigation" class="navbar navbar-default" content="width=device-width, initial-scale=1">
    <link href="../css/bootstrap.css" rel="stylesheet">
    <script src="../js/jquery-1.9.1.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="../css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="../css/bootstrapValidator.css"/>
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
            <!-- Administrador -->
            <?php if ($_SESSION['tipo_usuario'] == 1):?>
                <link rel="shortcut icon" href="img/favicon.ico">
                <li><a href="../index.php">Inicio</a></li>
                <li><a href="registro_usuario.php">Usuarios</a></li>

                <li class="active" class="dropdown-submenu"><a href="#" tabindex="-1" data-toggle="dropdown">Menú</a>
                    <ul class="dropdown-menu">
                        <li><a href="registro_categoria.php" tabindex="-1">Categorias</a></li>
                        <li class="active"><a href="registro_producto.php" tabindex="-1">Productos</a></li>
                        <li><a href="mostrar_promocion.php" tabindex="-1">Promociones</a></li>
                    </ul>
                </li>

                <li class="dropdown-submenu"><a href="#" tabindex="-1" data-toggle="dropdown">Reportes</a>
                    <ul class="dropdown-menu">
                        <li><a href="reporte_cliente.php" tabindex="-1">Clientes</a></li>
                        <li><a href="reporte_producto.php" tabindex="-1">Productos</a></li>
                        <li><a href="reporte_venta.php" tabindex="-1">Ventas</a></li>
                    </ul>
                </li>
            <?php endif; ?>

            <?php if ($_SESSION['tipo_usuario'] == 2):?>
                <li class="active"><a href="#">Inicio</a></li>
                <li><a href="vista/registro_cliente.php">Clientes</a></li>
                <li><a href="#">Productos</a></li>
                <li><a href="#">Pedidos</a></li>
                <li><a href="#">Reservas</a></li>
                <li><a href="#">Ventas</a></li>
            <?php endif; ?>
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
<?php
if (!empty($_GET['show'])) {
    echo "<script type='text/javascript'>
        $(document).ready(function(){
        $('#loginModal').modal('show');
        }); </script>";

    $ID_SHOW = $_GET['show'];
}

?>
<style>
    #mdialTamanio{
        width: 25% !important;
        height: 30% !important;
    }
</style>

<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
    <div class="modal-dialog" id="mdialTamanio">
        <?php
        include_once("../BD/conexion.php");
        $cnn= new conexion();
        $con =$cnn->conectar();
        mysqli_select_db($con,"restaurante");
        $SELECCIONAR_PRODUCTO = "SELECT * FROM producto WHERE idProducto='$ID_SHOW'";
        $QUERY_OBTENER_Producto = mysqli_query($con, $SELECCIONAR_PRODUCTO);

        while($DATA = mysqli_fetch_array($QUERY_OBTENER_Producto, MYSQLI_ASSOC)):  ?>
            <div class="modal-content">
                <form id="loginForm" method="POST" class="form-horizontal" action="controlador/inicioSesion.php">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <div class="row">
                        <div class="card"  >
                            <a class="img-card" href="http://www.fostrap.com/">
                                <img src="<?php echo $DATA['imagen'];?>" />
                            </a>
                            <br />
                            <div class="card-content" id="mdialTamanio">
                                <h4 class="card-title">
                                    <a href="http://www.fostrap.com/">
                                        <?php echo $DATA['nombre'];?>
                                    </a>
                                </h4>
                                <div class="">
                                    <?php echo $DATA['descripcion'];?>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

                <div style = "font-size:16px; color:#cc0000;"><?php echo isset($error) ? utf8_decode($error) : '' ; ?></div>
            </div>
        <?php endwhile; mysqli_close($con) ?>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-8">
            <table>
                <tr>
                    <td><img src="../img/productos.jpg"></td>
                    <td><h1>Productos</h1></td>
                </tr>

            </table>
            <div class="row-fluid sortable">
                <div class="box span12">
                    <div class="box-header" data-original-title>
                        <!-- <img  width="100" height="100" src="data:image/image/png;base64,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" /> -->
                        <h4><i class="halflings-icon user"></i><span class="break"></span>Lista producto</h4>
                        <div class="box-icon">

                            <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>

                        </div>
                    </div>
                    <div class="box-content">
                        <table id="productos" class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Imagen</th>
                                <th>Precio</th>
                                <th>Categoria</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            include_once("../BD/conexion.php");
                            $cnn= new conexion();
                            $con =$cnn->conectar();
                            mysqli_select_db($con,"restaurante");
                            $query_Mostrar = "SELECT * FROM producto ";

                            $getAll = mysqli_query($con, $query_Mostrar);
                            while ($row = mysqli_fetch_array($getAll, MYSQLI_ASSOC)):
                                ?>
                                <tr>
                                    <td><?php echo $row ['nombre']; ?></td>
                                    <td><?php echo '<br> <img  width="56" height="56" src='.$row["imagen"].'>'; ?></td>
                                    <td><?php echo $row ['precio']; ?></td>
                                    <td>
                                        <?php
                                        $ID_CATEGORIA = $row ['categoriaIdCategoria'];
                                        $OBTENER_CATEGORIA = mysqli_query($con,"SELECT nombre FROM categoria WHERE idCategoria='$ID_CATEGORIA'");
                                        $NOMBRE = mysqli_fetch_assoc($OBTENER_CATEGORIA);
                                        echo $NOMBRE['nombre'];
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                        switch ($row ['estado']) {
                                            case 'Habilitado':
                                                echo "
                                               <a class=\"btn btn-success btn-xs\">
                                                <span class=\"glyphicon glyphicon-ok\" aria-hidden=\"true\"  >&nbsp;HABILITADO&nbsp;&nbsp;</span>";
                                                break;
                                            case 'Deshabilitado':

                                                echo "
                                               <a class=\"btn btn-danger btn-xs\">
                                                <span class=\"glyphicon glyphicon-remove\" aria-hidden=\"true\"  >&nbsp;DESHABILITADO</span>";
                                                break;
                                        }
                                        ?>
                                    </td>
                                    <td class="center">
                                        <a class="btn btn-info btn-xs" href="?id=<?php echo $row ['idProducto']; ?>">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>

                                        </a>

                                        <a class="btn btn-primary btn-xs" href="?show=<?php echo $row ['idProducto']; ?>">
                                            <span data-toggle="modal" data-target="#loginModal" class="glyphicon glyphicon-search" aria-hidden="true"></span>
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
            <h1>Nuevo producto</h1>
            <div class="row-fluid sortable">
                <div class="box span12">
                    <div class="box-header" data-original-title>
                        <h4><i class="halflings-icon edit"></i><span class="break"></span>Ingresar datos del producto</h4>
                        <div class="box-icon">
                            <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                        </div>
                    </div>
                    <?php

                    if (!empty($_GET['id'])) {
                        $ID = $_GET['id'];
                        $SELECCIONAR_PRODUCTO = "SELECT * FROM producto WHERE idProducto='$ID'";
                        $QUERY_OBTENER_Producto = mysqli_query($con, $SELECCIONAR_PRODUCTO);

                        while($DATA = mysqli_fetch_array($QUERY_OBTENER_Producto, MYSQLI_ASSOC)):
                            ?>
                            <div class="box-content">
                                <form id="producto" enctype="multipart/form-data" class="form-horizontal" action="../controlador/editarProducto.php" method="POST">
                                    <fieldset>
                                        <div class="control-group">
                                            <div class="controls">
                                                <input name="id" class="input-xlarge form-control focused"
                                                       id="focusedInput" type="hidden" placeholder="Ingrese nombre…"
                                                       value="<?php echo $DATA['idProducto']; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">*Nombre</label>
                                            <div class="controls">
                                                <input name="nombre" class="input-xlarge form-control focused"
                                                       id="nombre" type="text" placeholder="Ingrese nombre…" value="<?php echo $DATA['nombre']; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Descripción </label>
                                            <div class="controls">


                              <textarea class="form-control" rows="3" name="descripcion" class="input-xlarge form-control focused"
                                        id="focusedInput"><?php echo $DATA['descripcion']; ?></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">*Precio</label>
                                            <div class="controls">
                                                <input name="precio" class="input-xlarge form-control focused"
                                                       id="focusedInput" type="text"
                                                       placeholder="Ingrese precio…" value="<?php echo $DATA['precio']; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label"></label>

                                            <label class="control-label">*Categoria</label>
                                            <div class="select">
                                                <select id="categoria" name="categoria" class="form-control">
                                                    <option value="0">Seleccione categoria...</option>
                                                    <?php
                                                    $queryRoles="SELECT idCategoria,nombre FROM categoria";
                                                    $getAll = mysqli_query($con,$queryRoles);
                                                    while($row = mysqli_fetch_array($getAll, MYSQLI_ASSOC)){ ?>
                                                        <option value="<?php echo $row['idCategoria']; ?>" <?php if($row['idCategoria']==$DATA['categoriaIdCategoria']): ?> selected="selected" <?php endif; ?>><?php echo $row['nombre']; ?></option>
                                                    <?php }?>
                                                </select>
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

                                        <div class="form-group">
                                            <label class="control-label"></label>
                                            <div class="controls">
                                                <label >Imagen</label>
                                                <input name="imagen" type="file" id="imagen"><?php echo '<br> <img  width="64" height="64" src='.$DATA["imagen"].'>'; ?>
                                            </div>
                                        </div>
                                        <br>

                                        <div class="form-actions">
                                            <button type="submit" id="btnvalidar" class="btn btn-primary">Actualizar</button>
                                            <button id="btnvalidar" class="btn btn-danger" Onclick="history.go(-1);">Cancelar</button>
                                        </div>

                                    </fieldset>
                                </form>
                            </div>
                        <?php endwhile; }
                    else {
                    ?>
                    <div class="box-content">
                        <form id="producto" enctype="multipart/form-data" class="form-horizontal" action="../controlador/registroProducto.php" method="POST">
                            <fieldset>
                                <div class="form-group">
                                    <label class="control-label">*Nombre</label>
                                    <div class="controls">
                                        <input name="nombre" class="input-xlarge form-control focused"
                                               id="nombre" type="text" placeholder="Ingrese nombre…">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label">Descripción </label>
                                    <div class="controls">


                                            <textarea class="form-control" rows="3" name="descripcion" class="input-xlarge form-control focused"
                                                      id="focusedInput"></textarea>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label">*Precio</label>
                                    <div class="controls">
                                        <input name="precio" class="input-xlarge form-control focused"
                                               id="focusedInput" type="text"
                                               placeholder="Ingrese precio…">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label"></label>

                                    <label class="control-label">*Categoria</label>
                                    <div class="select">

                                        <select id="categoria" name="categoria" class="form-control">
                                            <option value="0">Seleccione categoria...</option>
                                            <?php
                                            $queryRoles="SELECT idCategoria,nombre FROM categoria";
                                            $getAll = mysqli_query($con,$queryRoles);
                                            while($row = mysqli_fetch_array($getAll, MYSQLI_ASSOC)){ ?>
                                                <option value="<?php echo $row['idCategoria']; ?>"><?php echo $row['nombre']; ?></option>
                                            <?php }?>
                                        </select>

                                    </div>
                                </div>
                                <div class="form-group">

                                    <label class="control-label"></label>
                                    <div class="controls">
                                        <label >Imagen</label>
                                        <input name="imagen" type="file" id="imagen">
                                    </div>
                                </div>

                                <br>
                                <div class="form-actions">
                                    <button type="submit" id="btnvalidar" class="btn btn-primary">Registrar
                                    </button>
                                    <button type="reset" class="btn btn-danger">Cancelar</button>

                                </div>
                            </fieldset>
                        </form>

                    </div>
                </div><!--/span-->
                <?php }
                if (!empty($_GET['error'])) {

                    echo "<font color='red'>Usuario existente</font>";

                } ?>

            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        $('#producto').bootstrapValidator({
            message: 'Este valor no es válido',
            fields: {
                nombre: {
                    message: 'El nombre del producto no es válido',
                    validators: {
                        notEmpty: {
                            message: 'El nombre del producto es necesario'
                        },
                        regexp: {
                            regexp: /^[a-zA-ZsñÑ\s]+$/,
                            message: 'El nombre del producto no acepta numeros ni caracteres especiales'
                        },
                        stringLength: {
                            min: 3,
                            max: 30,
                            message: 'El nombre del producto debe contener más de 3 y menos de 30 caracteres'
                        }

                    }
                },
                descripcion: {
                    message: 'La descripción del producto no es válido',
                    validators: {
                        notEmpty: {
                            message: 'La descripción del producto es necesario'
                        },
                        regexp: {
                            regexp: /^[a-zA-ZsñÑ0-9\s]+$/,
                            message: 'la descripción no acepta  caracteres especiales'
                        },
                        stringLength: {
                            min: 8,

                            message: 'La descripción no debe tener  menos de 8  caracteres'
                        }
                    }
                },

                precio: {
                    message: 'El precio no es válido',
                    validators: {
                        notEmpty: {
                            message: 'El precio es necesario'
                        },
                        regexp: {
                            regexp: /^([0-9]{1,3})([.]{1,1})([0-9]{2,2})+$/,
                            message: 'El precio debe ser de forma ej. 10.00 o 25.50 '
                        },
                        stringLength: {
                            min: 4,
                            max: 6,
                            message: 'El precio debe contener más de 7 y menos de 8 caracteres'
                        }

                    }
                },

                categoria: {
                    validators: {
                        notEmpty: {
                            message: 'Elija una categoria.'
                        }
                    }
                }

            }
        });
    });
</script>
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
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="../js/jquery.dataTables.min.js"></script>
<script src="../js/dataTables.bootstrap.min.js"></script>

<!-- Include all compiled plugins (below), or include individual files as needed -->

<script type="text/javascript">
    $(document).ready(function () {
        $('#productos').DataTable({
            "iDisplayLength": 5,
            "aLengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],
            "language": {
                "lengthMenu": "Mostrar _MENU_ registros por pagina",
                "zeroRecords": "No se econtraron registros",
                "info": "Mostrando pagina _PAGE_ de _PAGES_",
                "infoEmpty": "No se encontraron registros",
                "infoFiltered": "(filtered from _MAX_ total records)",
                "search": "Buscar",
                "paginate": {
                    "first": "Primero",
                    "last": "Ultimo",
                    "next": "Siguiente",
                    "previous": "Anterior"
                },

            }
        });
    });
</script>
</body>
</html>
