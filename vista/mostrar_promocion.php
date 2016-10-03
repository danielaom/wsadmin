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
            <!-- Administrador -->
            <?php if ($_SESSION['tipo_usuario'] == 1):?>
                <link rel="shortcut icon" href="img/favicon.ico">
                <li><a href="../index.php">Inicio</a></li>
                <li><a href="registro_usuario.php">Usuarios</a></li>

                <li class="active" class="dropdown-submenu"><a href="#" tabindex="-1" data-toggle="dropdown">Menú</a>
                    <ul class="dropdown-menu">
                        <li><a href="registro_categoria.php" tabindex="-1">Categorias</a></li>
                        <li class="active"><a href="registro_producto.php" tabindex="-1">Productos</a></li>
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
            <div class="modal-content">
                <div class="box-content">
                    <table class="table table-striped table-bordered bootstrap-datatable datatable">
                        <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Imagen</th>
                            <th>Descripcion</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        include_once("../BD/conexion.php");
                        $cnn= new conexion();
                        $con =$cnn->conectar();
                        mysqli_select_db($con,"restaurante");

                        //TODO CONSULTA PARA OBTENER LISTA DE PRODUCTOS DADO UN ID PROMOCION
                        $query_Mostrar = "";

                        $getAll = mysqli_query($con, $query_Mostrar);
                        while ($row = mysqli_fetch_array($getAll, MYSQLI_ASSOC)):
                            ?>
                            <tr>
                                <td><?php echo $row ['nombre']; ?></td>
                                <td><?php echo '<br> <img  width="56" height="56" src='.$row["imagen"].'>'; ?></td>
                                <td><?php echo $row ['descripcion']; ?></td>
                            </tr>
                        <?php endwhile;  mysqli_close($con);?>
                        </tbody>
                    </table>
                </div>
            </div>
    </div>
</div>





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
                        <div class="col-md-offset-8 col-md-4">
                        <button type="button" class="btn btn-success">Success</button>
                        </div>
                        <table class="table table-striped table-bordered bootstrap-datatable datatable">
                            <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Imagen</th>
                                <th>Descripcion</th>
                                <th>Precio</th>
                                <th>Fecha inicio</th>
                                <th>Fecha fin</th>
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
                            $query_Mostrar = "SELECT * FROM promocion ";

                            $getAll = mysqli_query($con, $query_Mostrar);
                            while ($row = mysqli_fetch_array($getAll, MYSQLI_ASSOC)):
                                ?>
                                <tr>
                                    <td><?php echo $row ['nombre']; ?></td>
                                    <td><?php echo '<br> <img  width="56" height="56" src='.$row["imagen"].'>'; ?></td>
                                    <td><?php echo $row ['descripcion']; ?></td>
                                    <td><?php echo $row ['precio']; ?></td>
                                    <td><?php echo $row ['fechaInicio']; ?></td>
                                    <td><?php echo $row ['fechaFin']; ?></td>
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
                                        <a class="btn btn-info btn-xs" href="registro_promocion.php?id=<?php echo $row ['idPromocion']; ?>">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>

                                        </a>

                                        <a class="btn btn-primary btn-xs" href="?show=<?php echo $row ['idPromocion']; ?>">
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

</body>
</html>
