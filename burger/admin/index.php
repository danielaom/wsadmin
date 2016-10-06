<!DOCTYPE html>
<html>
    <head>
		<?php include("head.php");?>
    </head>
    
    <body>
        <h1 class="text-logo"><span class="glyphicon glyphicon-cutlery"></span> Burger Menu <span class="glyphicon glyphicon-cutlery"></span></h1>
        <div class="container admin">
            <div class="row">
                <h1><strong>Lista de productos   </strong><a href="insert.php" class="btn btn-success btn-lg"><span class="glyphicon glyphicon-plus"></span> Agregar</a></h1>
                <table class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>Nombre</th>
                      <th>Descripción</th>
                      <th>Precio</th>
                      <th>Categoría</th>
                      <th>Acciones</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php
                        require 'database.php';
                        $db = Database::connect();
                        $statement = $db->query('SELECT producto.idProducto, producto.nombre, producto.descripcion, producto.precio, categoria.nombre AS categoria FROM producto LEFT JOIN categoria ON producto.categoriaIdCategoria = categoria.idCategoria');
                        while($producto = $statement->fetch())
                        {
                            echo '<tr>';
                            echo '<td>'. $producto['nombre'] . '</td>';
                            echo '<td>'. $producto['descripcion'] . '</td>';
                            echo '<td>'. number_format($producto['precio'], 2, '.', '') . '</td>';
                            echo '<td>'. $producto['categoria'] . '</td>';
                            echo '<td width=300>';
                            echo '<a class="btn btn-default" href="view.php?idProducto='.$producto['idProducto'].'"><span class="glyphicon glyphicon-eye-open"></span> Ver</a>';
                            echo ' ';
                            echo '<a class="btn btn-primary" href="update.php?id='.$producto['idProducto'].'"><span class="glyphicon glyphicon-pencil"></span> Modificar</a>';
                            echo ' ';
                            echo '<a class="btn btn-danger" href="delete.php?id='.$producto['idProducto'].'"><span class="glyphicon glyphicon-remove"></span> Eliminar</a>';
                            echo '</td>';
                            echo '</tr>';
                        }
                        Database::disconnect();
                      ?>
                  </tbody>
                </table>
            </div>
        </div>
    </body>
</html>
