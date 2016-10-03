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
    <link href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" rel="stylesheet">
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

    <div class="col-md-offset-3 col-md-6">
        <h1>Registro de promocion con varios productos</h1>
        <form>
            <div class="container">

                    <div class="col-md-offset-3 col-md-6">
                        <h1>Registro de promocion con varios productos</h1>
                        <form>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nombre</label>
                                <input type="email" class="form-control" placeholder="Nombre">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Regalo</label>
                                <input type="email" class="form-control" placeholder="Regalo">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Precio</label>
                                <input type="email" class="form-control" placeholder="Precio">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Fecha inicio</label>
                                <input type="email" class="form-control" placeholder="Fecha inicio">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Fecha fin</label>
                                <input type="email" class="form-control" placeholder="Fecha fin">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Imagen</label>
                                <input type="file" id="exampleInputFile">
                                <p class="help-block">Ingrese la imagen adjunta a la promocion.</p>
                            </div>


                        </form>
                    </div>

                    <div class="row">
                        <div class="col-md-offset-3 col-md-6">
                            <h1>Lista de producto a disposicion</h1>

                            <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Descripcion</th>
                                    <th>Precio</th>
                                    <th>Cantidad</th>
                                </tr>
                                </thead>

                                <tbody>
                                <tr>
                                    <td>Cafe</td>
                                    <td>Cafe caliente</td>
                                    <td>5 bs.</td>
                                    <td><input type="text" class="form-control" placeholder="Cantidad"></td>

                                </tr>
                                <tr>
                                    <td>te</td>
                                    <td>te caliente</td>
                                    <td>5 bs.</td>
                                    <td><input type="text" class="form-control" placeholder="Cantidad"></td>
                                </tr>
                                <tr>
                                    <td>toddy</td>
                                    <td>toddy caliente</td>
                                    <td>5 bs.</td>
                                    <td><input type="text" class="form-control" placeholder="Cantidad"></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-offset-6 col-md-3">

                            <button type="submit" class="btn  btn-success btn-block" >Registrar</button>
                        </div>
                    </div>



                </div>
            </div>

            <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
            <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
            <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>

            <!-- Include all compiled plugins (below), or include individual files as needed -->
            <script src="js/bootstrap.min.js"></script>
            <script type="text/javascript">
                $(document).ready(function() {
                    $('#example').DataTable( {
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
