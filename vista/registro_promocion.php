<?php
  include_once("../BD/conexion.php");
  $cnn= new conexion();
  $con =$cnn->conectar();
  mysqli_select_db($con,"restaurante");
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
    <link href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/bootstrapValidator.css"/>

    <script src="../js/jquery-1.9.1.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../js/bootstrapValidator.js"></script>
    <script src="../js/jquery.dataTables.min.js"></script>
    <script src="../js/dataTables.bootstrap.min.js"></script>


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
              <li><a href="registro_usuario.php">Usuarios</a></li>

              <li class="dropdown-submenu active"><a href="#" tabindex="-1" data-toggle="dropdown">Menú</a>
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
    <?php if (!isset($_GET['id'])) { ?>
      <div class="container">
          <div class="row">
              <div class="col-md-5">
                  <table>
                      <tr>
                          <td><img src="../img/promo.jpg"></td>
                          <td><h1>Registro de promoción</h1></td>
                      </tr>

                  </table>

              </div>
          </div>
          <form action="../controlador/registroPromocion.php" method="POST">
              <div class="col-md-4">
                  <h3>Datos promoción</h3>
                  <div class="form-group">
                      <label>Codigo</label>
                      <input type="text" name="codigo" class="form-control" placeholder="Codigo">
                  </div>
                  <div class="form-group">
                      <label>Nombre</label>
                      <input type="text" name="nombre" class="form-control" placeholder="Nombre">
                  </div>
                  <div class="form-group">
                      <label>Descripcion</label>
                      <input type="text" name="descripcion" class="form-control" placeholder="Regalo">
                  </div>
                  <div class="form-group">
                      <label>Precio</label>
                      <input type="text" name="precio" class="form-control" placeholder="Precio">
                  </div>
                  <div class="form-group">
                      <label>Fecha inicio</label>
                      <input type="text"  name="fechaInicio" class="form-control" placeholder="Fecha inicio">
                  </div>
                  <div class="form-group">
                      <label>Fecha fin</label>
                      <input type="text" name="fechaFin" class="form-control" placeholder="Fecha fin">
                  </div>
                  <div class="form-group">
                      <label>Imagen</label>
                      <input type="file" name="imagen" id="exampleInputFile">
                      <p class="help-block">Ingrese la imagen adjunta a la promocion.</p>
                  </div>
                  <div class="col-md-offset-8 col-md-4">
                      <button type="submit" class="btn  btn-success btn-block">Registrar</button>
                      <button type="reset" class="btn btn-danger">Cancelar</button>
                  </div>
              </div>
              <div class="col-md-8">
                  <h3>Lista de producto disponibles</h3>
                  <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                      <thead>
                      <tr>
                          <th width="10%">Añadir</th>
                          <th width="10%">Imagen</th>
                          <th width="30%">Nombre</th>
                          <th width="10%">Precio</th>
                          <th width="30%">Cantidad</th>
                      </tr>
                      </thead>
                      <tbody>
                      <?php
                      $query_Mostrar = "SELECT * FROM producto";
                      $getAll = mysqli_query($con, $query_Mostrar);
                      while ($row = mysqli_fetch_array($getAll, MYSQLI_ASSOC)):
                          ?>
                          <tr>
                              <td><input type="checkbox" name="productos[]" value="<?php echo $row['idProducto']; ?>"></td>
                              <td><?php echo '<br> <img  width="36" height="36" src='.$row["imagen"].'>'; ?></td>
                              <td><?php echo $row ['nombre']; ?></td>
                              <td><?php echo $row ['precio']; ?></td>
                              <td><input type="text" class="form-control" placeholder="Cantidad" name="cantidad[]"></td>
                          </tr>
                      <?php endwhile; ?>
                      </tbody>
                  </table>
              </div>
          </form>
      </div>
    <?php } else {
      $ID =  $_GET['id'];
      $RESULT_PRODUCTO = mysqli_query($con, "SELECT * FROM promocion WHERE idPromocion='$ID'");
      $PROMOCION = mysqli_fetch_assoc($RESULT_PRODUCTO);
    ?>
      <div class="container">
          <div class="row">
              <div class="col-md-5">
                  <table>
                      <tr>
                          <td><img src="../img/promo.jpg"></td>
                          <td><h1>Editar promoción</h1></td>
                      </tr>

                  </table>
              </div>
          </div>
          <form action="../controlador/registroPromocion.php" method="POST">
              <div class="col-md-4">
                  <h4>Editar Datos promoción</h4>
                  <div class="form-group">
                      <input type="hidden" name="id" class="form-control" placeholder="Codigo" value="<?php echo $PROMOCION['idPromocion'];?>">
                  </div>
                  <div class="form-group">
                      <label>Codigo</label>
                      <input type="text" name="codigo" class="form-control" placeholder="Codigo" value="<?php echo $PROMOCION['codigo'];?>">
                  </div>
                  <div class="form-group">
                      <label>Nombre</label>
                      <input type="text" name="nombre" class="form-control" placeholder="Nombre" value="<?php echo $PROMOCION['nombre'];?>">
                  </div>
                  <div class="form-group">
                      <label>Descripcion</label>
                      <input type="text" name="descripcion" class="form-control" placeholder="Regalo" value="<?php echo $PROMOCION['descripcion'];?>">
                  </div>
                  <div class="form-group">
                      <label>Precio</label>
                      <input type="text" name="precio" class="form-control" placeholder="Precio" value="<?php echo $PROMOCION['precio'];?>">
                  </div>
                  <div class="form-group">
                      <label>Fecha inicio</label>
                      <input type="text"  name="fechaInicio" class="form-control" placeholder="Fecha inicio" value="<?php echo $PROMOCION['fechaInicio'];?>">
                  </div>
                  <div class="form-group">
                      <label>Fecha fin</label>
                      <input type="text" name="fechaFin" class="form-control" placeholder="Fecha fin" value="<?php echo $PROMOCION['fechaFin'];?>">
                  </div>
                  <div class="form-group">
                      <label>Imagen</label>
                      <input type="file" name="imagen" id="exampleInputFile">
                      <td><?php echo '<br> <img  width="56" height="56" src='.$PROMOCION['imagen'].'>'; ?></td>
                      <p class="help-block">Ingrese la imagen adjunta a la promocion.</p>
                  </div>
                  <div class="col-md-offset-8 col-md-4">
                      <button type="submit" class="btn  btn-success btn-block">Registrar</button>
                  </div>
              </div>
              <div class="col-md-8">
                  <h4>Producto Adicionados</h4>
                  <table id="promocion" class="table table-striped table-bordered" cellspacing="0" width="100%">
                      <thead>
                      <tr>
                          <th width="10%">Añadir</th>
                          <th width="10%">Imagen</th>
                          <th width="30%">Nombre</th>
                          <th width="10%">Precio</th>
                          <th width="30%">Cantidad</th>
                      </tr>
                      </thead>
                      <tbody>
                      <?php
                      $query_Mostrar = "SELECT * FROM productoPromocion WHERE promocionIdPromocion='$ID'";
                      $getAll = mysqli_query($con, $query_Mostrar);
                      while ($row = mysqli_fetch_array($getAll, MYSQLI_ASSOC)):
                          ?>
                          <tr>
                              <td><input type="checkbox" name="productos[]" value="<?php echo $row['idProducto']; ?>"></td>
                              <td><?php echo '<br> <img  width="36" height="36" src='.$row["imagen"].'>'; ?></td>
                              <td><?php echo $row ['nombre']; ?></td>
                              <td><?php echo $row ['precio']; ?></td>
                              <td><input type="text" class="form-control" placeholder="Cantidad" name="cantidad[]"></td>
                          </tr>
                      <?php endwhile; ?>
                      </tbody>
                  </table>
                  <br>
                  <h4>Lista de producto disponibles</h4>
                  <table id="promo" class="table table-striped table-bordered" cellspacing="0" width="100%">
                      <thead>
                      <tr>
                          <th width="10%">Añadir</th>
                          <th width="10%">Imagen</th>
                          <th width="30%">Nombre</th>
                          <th width="10%">Precio</th>
                          <th width="30%">Cantidad</th>
                      </tr>
                      </thead>
                      <tbody>
                      <?php
                      $query_Mostrar = "SELECT * FROM producto";
                      $getAll = mysqli_query($con, $query_Mostrar);
                      while ($row = mysqli_fetch_array($getAll, MYSQLI_ASSOC)):
                          ?>
                          <tr>
                              <td><input type="checkbox" name="productos[]" value="<?php echo $row['idProducto']; ?>"></td>
                              <td><?php echo '<br> <img  width="36" height="36" src='.$row["imagen"].'>'; ?></td>
                              <td><?php echo $row ['nombre']; ?></td>
                              <td><?php echo $row ['precio']; ?></td>
                              <td><input type="text" class="form-control" placeholder="Cantidad" name="cantidad[]"></td>
                          </tr>
                      <?php endwhile; ?>
                      </tbody>
                  </table>
              </div>
          </form>
      </div>
    <?php } ?>
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
          $('#promocion').DataTable({
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

      $("#save").click(function(event){
          event.preventDefault();
          var searchIDs = $("#example input:checkbox:checked").map(function(){
              return $(this).val();
          }).get(); // <----
          console.log(searchIDs);
      });
  </script>
  </body>

</html>
