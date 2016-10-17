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
                        <li><a href="registro_producto.php" tabindex="-1">Productos</a></li>
                        <li class="active"><a href="mostrar_promocion.php" tabindex="-1">Promociones</a></li>
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
