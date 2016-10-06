<?php
    require 'database.php';

    if(!empty($_GET['idProducto']))
    {
        $idProducto = checkInput($_GET['idProducto']);
    }
     
    $db = Database::connect();
    $statement = $db->prepare("SELECT producto.idProducto, producto.nombre, producto.descripcion, producto.precio, producto.imagen, categoria.nombre AS categoria FROM producto LEFT JOIN categoria ON producto.categoriaIdCategoria = categoria.idCategoria WHERE producto.idProducto = ?");
    $statement->execute(array($idProducto));
    $producto = $statement->fetch();
    Database::disconnect();

    function checkInput($data) 
    {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }

?>

<!DOCTYPE html>
<html>
    <head>
        <?php include("head.php");?>
    </head>
    
    <body>
        <h1 class="text-logo"><span class="glyphicon glyphicon-cutlery"></span> Burger Menu <span class="glyphicon glyphicon-cutlery"></span></h1>
         <div class="container admin">
            <div class="row">
               <div class="col-sm-6">
                    <h1><strong>Ver producto</strong></h1>
                    <br>
                    <form>
                      <div class="form-group">
                        <label>Nombre:</label><?php echo '  '.$producto['nombre'];?>
                      </div>
                      <div class="form-group">
                        <label>Descripción:</label><?php echo '  '.$producto['descripcion'];?>
                      </div>
                      <div class="form-group">
                        <label>Precio:</label><?php echo '  '.number_format((float)$producto['precio'], 2). ' $';?>
                      </div>
                      <div class="form-group">
                        <label>Categoría:</label><?php echo '  '.$producto['categoria'];?>
                      </div>
                      <div class="form-group">
                        <label>Imagen:</label><?php echo '  '.$producto['imagen'];?>
                      </div>
                    </form>
                    <br>
                    <div class="form-actions">
                      <a class="btn btn-primary" href="index.php"><span class="glyphicon glyphicon-arrow-left"></span> Regresar</a>
                    </div>
                </div> 
                <div class="col-sm-6 site">
                    <div class="thumbnail">
                        <img src="<?php echo '../../images/'.$producto['imagen'];?>" alt="...">
                        <div class="price"><?php echo number_format((float)$producto['precio'], 2). ' $';?></div>
                          <div class="caption">
                            <h4><?php echo $producto['nombre'];?></h4>
                            <p><?php echo $producto['descripcion'];?></p>

                            <a href="#" class="btn btn-order" role="button"><span class="glyphicon glyphicon-shopping-cart"></span> Ordenar</a>
                          </div>
                    </div>
                </div>
            </div>
        </div>   
    </body>
</html>

