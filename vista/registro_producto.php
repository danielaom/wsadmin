<?php

$con = mysqli_connect("localhost", "root", "", "restaurante");

session_start();
if (!isset($_SESSION['loggedin'])) {
    # code...
    ?>
<?php } ?>
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
            <li><a href="indexAdm.php">Inicio</a></li>
            <li class="active"><a href="registro_usuario.php">Usuarios</a></li>

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
            <h1>Productos</h1>
            <div class="row-fluid sortable">
                <div class="box span12">
                    <div class="box-header" data-original-title>
                        <h2><i class="halflings-icon user"></i><span class="break"></span>Lista producto</h2>
                        <div class="box-icon">

                            <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>

                        </div>
                    </div>
                    <div class="box-content">
                        <table class="table table-striped table-bordered bootstrap-datatable datatable">
                            <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Imagen</th>
                                <th>Precio</th>
                                <th>Categoria</th>
                                <th>Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $query_Mostrar = "SELECT p.Nombre,i.imagen, p.precio,c.nombre,p.estado  FROM imagen as i INNER JOIN producto as p on i.idImagen=p.imagenIdImagen INNER JOIN categoria as c on p.categoriaIdCategoria=c.idCategoria ";

                            $getAll = mysqli_query($con, $query_Mostrar);
                            while ($row = mysqli_fetch_array($getAll, MYSQLI_ASSOC)):
                                ?>
                                <tr>
                                    <td><?php echo $row ['nombre']; ?></td>
                                    <td><?php echo $row ['imagen']; ?></td>
                                    <td><?php echo $row ['precio']; ?></td>
                                    <td><?php echo $row ['categoria']; ?></td>
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
                                        <a class="btn btn-info btn-xs" href="?id=<?php echo $row ['idProducto']; ?>">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>

                                        </a>
                                        <a class="btn btn-warning btn-xs" href="?id=<?php echo $row ['idProducto']; ?>">
                                            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>

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
                        <h2><i class="halflings-icon edit"></i><span class="break"></span>Ingresar datos del producto
                        </h2>
                        <div class="box-icon">
                            <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                        </div>
                    </div>
                    <div class="box-content">

                        <?php
                        if (!empty($_GET['id'])) {
                            $ID = $_GET['id'];
                            $SELECCIONAR_PRODUCTO = "SELECT * FROM producto WHERE idProducto='$ID'";

                            $QUERY_OBTENER_Producto = mysqli_query($con, $SELECCIONAR_PRODUCTO);
                            while ($DATA = mysqli_fetch_array($QUERY_OBTENER_USUARIO, MYSQLI_ASSOC)):

                                ?>
                                <form id="producto" class="form-horizontal" action="../controlador/editarProducto.php"
                                      method="POST">

                                    <div class="control-group">
                                        <div class="controls">
                                            <input name="id" class="input-xlarge form-control focused"
                                                   id="focusedInput" type="hidden" placeholder="Ingrese nombre…"
                                                   value="<?php echo $DATA['idProducto']; ?>">
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
                                        <label class="control-label">Descripcion</label>
                                        <div class="controls">
                                            <textarea name="descripcion" class="input-xlarge form-control focused"
                                                      id="focusedInput" type="textarea"
                                                      placeholder="Ingrese Descripción…"  class="form-control" rows="3"
                                                      value="<?php echo $DATA['descripcion']; ?>"></textarea>

                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label">Precio</label>
                                        <div class="controls">
                                            <input name="precio" class="input-xlarge form-control focused"
                                                   id="focusedInput" type="text"
                                                   placeholder="Ingrese precio…"
                                                   value="<?php echo $DATA['precio']; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Imagen</label>
                                        <div class="form-group">
                                            <label for="exampleInputFile">Imagen</label>
                                            <input name="imagen" type="file" id="exampleInputFile"
                                                   value="<?php echo $DATA['imagen']; ?>">

                                        </div>

                                    </div>
                                    <div class="form-group">
                                        <label class="control-label" for="selectError3">Categoria</label>
                                        <div class="controls">
                                            <select name="estado" id="selectError3" class="form-control">
                                                <?php
                                                $categoria = $DATA['categoria'];
                                                if ($categoria == 'Habilitado') {
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
                            <form id="usuario" class="form-horizontal" action="../controlador/registroProducto.php"
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
                                                    <option value="<?php echo $row['idCategotia']; ?>"><?php echo $row['nombre']; ?></option>
                                                <?php }?>
                                            </select>


                                        </div>
                                    </div>
                                    <div class="form-group">

                                        <label class="control-label"></label>
                                        <div class="controls">
                                            <label  for="exampleInputFile">Imagen</label>
                                            <input name="imagen" type="file" id="exampleInputFile">

                                        </div>
                                    </div>




                                    <br>
                                    <div class="form-actions">
                                        <button type="submit" id="btnvalidar" class="btn btn-primary">Registrar
                                        </button>
                                        <button type="button" class="btn btn-danger"
                                                onclick= return false;">Cancelar
                                        </button>
                                    </div>
                                </fieldset>
                            </form>
                        <?php }
                        if (!empty($_GET['error'])) {

                            echo "<font color='red'>Usuario existente</font>";

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
                            regexp: /^([E]{0,1})([-1-9]{0,1})([0-9]{5,5})/,
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
                    message: 'El telefono no es válido',
                    validators: {
                        notEmpty: {
                            message: 'El telefono es necesario'
                        },
                        regexp: {
                            regexp: /^([467]{1,1})([0-9]{6,7})+$/,
                            message: 'El telefono no acepta letras ni caracteres especiales '
                        },
                        stringLength: {
                            min: 7,
                            max: 8,
                            message: 'El telefono debe contener más de 7 y menos de 8 caracteres'
                        }

                    }
                },

                correo: {

                    validators: {

                        notEmpty: {

                            message: 'El correo es requerido y no puede ser vacio'

                        },

                        emailAddress: {

                            message: 'El correo electronico no es valido'

                        }

                    }

                }
            }
        });
    });
</script>
</body>
</html>
