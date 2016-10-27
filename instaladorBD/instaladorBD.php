<?php
  include_once("../BD/conexion.php");

  function crearBD(){
  	$cnn = new conexion();
  	$con = $cnn->conectar();

  	mysqli_query($con,"CREATE DATABASE restaurante");

    if (!mysqli_select_db($con,"restaurante")) {
      # code...
      echo "Error al Conectar con la BD";
    } else {
      # code...
      echo "*** BASE DE DATOS restautante creada exitosamente! ***";

      /** TABLA ROL **/
      $TB_ROL = "CREATE TABLE rol (
        idRol INT NOT NULL AUTO_INCREMENT,
        nombre VARCHAR(25),
        PRIMARY KEY(idRol)
      )";

      if (mysqli_query($con,$TB_ROL)) {
        # code...
        echo "<br><br> -- TABLA ROL CREADA --";
        $ADD_ROL_TEST = "INSERT INTO rol(idRol,nombre)
                         VALUES ('','Administrador'),
                                ('','Cajero'),
                                ('','Cliente')";
        if (mysqli_query($con, $ADD_ROL_TEST)) {
          # code...
          echo "<br> -- ROLES INSERTADOS -- <br>";
        }
      }

      /** TABLA USUARIO **/
      $TB_USUARIO = "CREATE TABLE usuario (
        idUsuario INT NOT NULL AUTO_INCREMENT,
        nombre VARCHAR(15),
        apellidoPaterno VARCHAR(15),
        apellidoMaterno VARCHAR(15),
        ci VARCHAR(15),
        telefono INT,
        correo VARCHAR(45),
        direccion VARCHAR(45),
        estado VARCHAR(45),
        PRIMARY KEY(idUsuario)
      )";

      if (mysqli_query($con,$TB_USUARIO)) {
        # code...
        echo "<br><br> -- TABLA USUARIO CREADA --";
        $ADD_USUARIO_TEST = "INSERT INTO usuario(idUsuario,nombre,apellidoPaterno,apellidoMaterno,ci,telefono,correo,direccion,estado)
                             VALUES ('','Juan','Perez','Garcia','E-1124322','4232122','juan@gmail.com','Av. America y Av Libertadores','Habilitado'),
                                    ('','Manuel','Caceres','Leon','4124322','4223142','juan@gmail.com','Av. America y Av Libertadores','Habilitado'),
                                    ('','Noel','Suarez','Lucha','1124322-1A','4523412','juan@gmail.com','Av. America y Av Libertadores','Habilitado'),
                                    ('','Lucia','Torrez','Torrico','E-1124322','4567565','juan@gmail.com','Av. America y Av Libertadores','Habilitado'),
                                    ('','Pamela','Galindo','Gomez','1124322-3R','4678795','juan@gmail.com','Av. America y Av Libertadores','Habilitado'),
                                    ('','Roberto','Parada','Perez','E-1124322','4567658','juan@gmail.com','Av. America y Av Libertadores','Habilitado')";
        if (mysqli_query($con, $ADD_USUARIO_TEST)) {
          # code...
          echo "<br> -- USUARIOS INSERTADOS -- <br>";
        }
      }

      /** TABLA USUARIOROL **/
      $TB_USUARIOROL = "CREATE TABLE usuariorol (
        idUsuarioRol INT NOT NULL AUTO_INCREMENT,
        usuario VARCHAR(24),
        password VARCHAR(28),
        usuarioIdUsuario INT,
        rolIdRol INT,
        PRIMARY KEY(idUsuarioRol)
      )";

      if (mysqli_query($con,$TB_USUARIOROL)) {
        # code...
        echo "<br><br> -- TABLA USUARIOROl CREADA --";
        $ADD_USUARIOROL_TEST = "INSERT INTO usuariorol(idUsuarioRol,usuario,password,usuarioIdUsuario,rolIdRol)
                                VALUES ('','jupe1124','papaya','1','1'),
                                       ('','maca4124','papaya','2','2'),
                                       ('','nosu1124','papaya','3','2'),
                                       ('','luto4322','papaya','4','3'),
                                       ('','paga4322','papaya','5','3'),
                                       ('','ropa1124','papaya','6','3')";

        if (mysqli_query($con, $ADD_USUARIOROL_TEST)) {
          # code...
          echo "<br> -- USUARIOSROL INSERTADOS -- <br>";
        }
      }

      /** TABLA CATEGORIA **/
      $TB_CATEGORIA = "CREATE TABLE categoria (
        idCategoria INT NOT NULL AUTO_INCREMENT,
        nombre VARCHAR(24),
        estado VARCHAR(28),
        PRIMARY KEY(idCategoria)
      )";

      if (mysqli_query($con,$TB_CATEGORIA)) {
        # code...
        echo "<br><br> -- TABLA CATEGORIA CREADA --";
        $ADD_CATEGORY_TEST = "INSERT INTO categoria(idCategoria,nombre,estado)
                              VALUES ('','Frappes','Habilitado'),
                                     ('','Jugos','Habilitado'),
                                     ('','Cafes','Habilitado')";

        if (mysqli_query($con, $ADD_CATEGORY_TEST)) {
            # code...
            echo "<br> -- CATEGORIAS INSERTADOS -- <br>";
          }
      }

      /** TABLA PRODUCTO **/
      $TB_PRODUCTO = "CREATE TABLE producto (
        idProducto INT NOT NULL AUTO_INCREMENT,
        nombre VARCHAR(24),
        descripcion VARCHAR(28),
        precio DECIMAL(18,2),
        fecha VARCHAR(18),
        estado VARCHAR(18),
        imagen TEXT,
        categoriaIdCategoria INT,
        PRIMARY KEY(idProducto)
      )";

      if (mysqli_query($con,$TB_PRODUCTO)) {
        # code...
        echo "<br> -- TABLA PRODUCTO CREADA --";
        $ADD_PRODUCTO_TEST = "INSERT INTO producto(idProducto,nombre,descripcion,precio,fecha,estado,imagen,categoriaIdCategoria)
                              VALUES ('','Frappuccino','Siente el dulce sabor del cafe en Sweet Stop','10','17-10-2016','Habilitado','http://192.168.1.36:80/sw/img/frappuccino.png','1'),
                                     ('','Frappe de Maracuya','El sabor exótico de Maracuyá lo tenemos al paso!!','10','17-10-2016','Habilitado','http://192.168.1.36:80/sw/img/jugomaracuya.png','1'),
                                     ('','Frappe de Frutilla','Deliciosos frappes que mejorarán tu día!!','10','17-10-2016','Habilitado','http://192.168.1.38:80/sw/img/jugofrutilla.png','1')";

        if (mysqli_query($con, $ADD_PRODUCTO_TEST)) {
          # code...
          echo "<br> -- PRODUCTOS INSERTADOS -- <br>";
        }
      }

      /** TABLA PROMOCION **/
      $TB_PROMOCION = "CREATE TABLE promocion (
          idPromocion INT NOT NULL AUTO_INCREMENT,
          codigo VARCHAR(24),
          nombre VARCHAR(24),
          descripcion TEXT,
          precio DECIMAL(18,2),
          fechaInicio DATE,
          fechaFin DATE,
          imagen TEXT,
          fecha DATETIME,
          estado VARCHAR(18),
          PRIMARY KEY(idPromocion)
        )";

      if (mysqli_query($con,$TB_PROMOCION)) {
        # code...
        echo "<br> -- TABLA PROMOCION CREADA --";
        $ADD_PROMOCION_TEST = "INSERT INTO promocion(idPromocion,codigo,nombre,descripcion,precio,fechaInicio,fechaFin,imagen,fecha,estado)
                               VALUES ('','DP-01','Dia dde la madre','mamá','15','17-10-2016','22-10-2016','http://192.168.1.36:80/sw/img/promocion.jpg','17-10-2016','Habilitado')";
        if (mysqli_query($con, $ADD_PROMOCION_TEST)) {
          # code...
          echo "<br> -- PROMOCION INSERTADOS -- <br>";
        }
      }

      /** TABLA PRODUCTO PROMOCION **/
      $TB_PRODUCTO_PROMOCION = "CREATE TABLE productoPromocion (
        idProductoPromocion INT NOT NULL AUTO_INCREMENT,
        cantidad INT,
        promocionIdPromocion INT,
        productoIdProducto INT,
        PRIMARY KEY(idProductoPromocion)
      )";

      if (mysqli_query($con,$TB_PRODUCTO_PROMOCION)) {
        # code...
        echo "<br> -- TABLA PRODUCTO PROMOCION CREADA --";
        $ADD_PRODUCT_PROMOCION_TEST = "INSERT INTO productoPromocion(idProductoPromocion, cantidad, promocionIdPromocion, productoIdProducto)
                                       VALUES ('','1','1','1'),
                                              ('','1','1','2')";
        if (mysqli_query($con, $ADD_PRODUCT_PROMOCION_TEST)) {
          # code...
          echo "<br> -- PRODUCTO PROMOCION INSERTADOS -- <br>";
        }

      }

      /** TABLA ESTADO **/
      $TB_ESTADO = "CREATE TABLE estado (
        idEstado INT NOT NULL AUTO_INCREMENT,
        parametro INT,
        nombre VARCHAR(28),
        PRIMARY KEY(idEstado)
      )";

      if (mysqli_query($con,$TB_ESTADO)) {
        # code...
        echo "<br> -- TABLA ESTADO CREADA --";
        $ADD_ESTADO_TEST = "INSERT INTO estado(idEstado,parametro,nombre)
                             VALUES ('','1','DISPONIBLE'),
                                    ('','2','RESERVADO'),
                                    ('','3','RECIBIDO'),
                                    ('','4','RECHAZADO'),
                                    ('','5','EN PROCESO'),
                                    ('','6','DESPACHADO')";
        if (mysqli_query($con, $ADD_ESTADO_TEST)) {
          # code...
          echo "<br> -- ESTADOS INSERTADOS -- <br>";
        }
      }

      /** TABLA PEDIDO **/
      $TB_PEDIDO = "CREATE TABLE pedido (
        idPedido INT NOT NULL AUTO_INCREMENT,
        fecha DATETIME,
        usuarioIdUsuario INT,
        PRIMARY KEY(idPedido)
      )";

      if (mysqli_query($con,$TB_PEDIDO)) {
        # code...
        echo "<br> -- TABLA PEDIDO CREADA --";
        $ADD_PEDIDO_TEST = "INSERT INTO pedido(idPedido,fecha,usuarioIdUsuario)
                            VALUES ('','17-10-2016','4')";
        if (mysqli_query($con, $ADD_PEDIDO_TEST)) {
          # code...
          echo "<br> -- PEDIDO INSERTADOS -- <br>";
        }
      }

      /** TABLA PEDIDO PRODUCTO **/
      $TB_PEDIDO_PRODUCTO = "CREATE TABLE pedidoProducto (
        idPedidoProducto INT NOT NULL AUTO_INCREMENT,
        pedidoIdPedido INT,
        productoIdProducto INT,
        cantidad INT,
        PRIMARY KEY(idPedidoProducto)
      )";

      if (mysqli_query($con,$TB_PEDIDO_PRODUCTO)) {
        # code...
        echo "<br> -- TABLA PEDIDO PRODUCTO CREADA --";
        $ADD_PEDIDO_PRODUCTO_TEST = "INSERT INTO pedidoProducto(idPedidoProducto,pedidoIdPedido,productoIdProducto,cantidad)
                                     VALUES ('','1','2','1'),('','1','3','2')";
        if (mysqli_query($con, $ADD_PEDIDO_PRODUCTO_TEST)) {
          # code...
          echo "<br> -- PEDIDO PRODUCTO INSERTADOS -- <br>";
        }
      }

      /** TABLA ESTADOPEDIDO **/
      $TB_ESTADOPEDIDO= "CREATE TABLE estadoPedido (
        idEstadoPedido INT NOT NULL AUTO_INCREMENT,
        pedidoIdPedido INT,
        estadoIdEstado INT,
        PRIMARY KEY(idEstadoPedido)
      )";

      if (mysqli_query($con,$TB_ESTADOPEDIDO)) {
        # code...
        echo "<br> -- TABLA ESTADO PEDIDO CREADA --";
        $ADD_PEDIDO_TEST = "INSERT INTO estadoPedido(idEstadoPedido,pedidoIdPedido,estadoIdEstado)
                             VALUES ('','1','3')";
        if (mysqli_query($con, $ADD_PEDIDO_TEST)) {
          # code...
          echo "<br> -- ESTADO PEDIDO INSERTADOS -- <br>";
        }
      }
    }

    mysqli_close($con);
  }

  crearBD();
?>
