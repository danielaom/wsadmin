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
                             VALUES ('','Juan','Perez','Garcia','E-1124322','4232122','juan@gmail.com','Av. America y Av Libertadores','activo'),
                                    ('','Manuel','Caceres','Leon','4124322','4223142','juan@gmail.com','Av. America y Av Libertadores','activo'),
                                    ('','Noel','Suarez','Lucha','1124322-1A','4523412','juan@gmail.com','Av. America y Av Libertadores','activo'),
                                    ('','Lucia','Torrez','Torrico','E-1124322','4567565','juan@gmail.com','Av. America y Av Libertadores','activo'),
                                    ('','Pamela','Galindo','Gomez','1124322-3R','4678795','juan@gmail.com','Av. America y Av Libertadores','activo'),
                                    ('','Roberto','Parada','Perez','E-1124322','4567658','juan@gmail.com','Av. America y Av Libertadores','activo')";
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
                                VALUES ('','jupe1124','md5(papaya)','1','1'),
                                       ('','maca4124','md5(papaya)','2','2'),
                                       ('','nosu1124','md5(papaya)','3','2'),
                                       ('','luto4322','md5(papaya)','4','3'),
                                       ('','paga4322','md5(papaya)','5','3'),
                                       ('','ropa1124','md5(papaya)','6','3')";

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
                              VALUES ('','Crepes','Habilitado'),
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
        fecha DATETIME,
        estado VARCHAR(18),
        imagen LONGBLOB,
        categoriIdCategoria INT,
        PRIMARY KEY(idProducto)
      )";

      if (mysqli_query($con,$TB_PRODUCTO)) {
        # code...
        echo "<br><br> -- TABLA PRODCUTO CREADA --";
        // $ADD_PRODUCTO_TEST = "INSERT INTO producto(idProducto,nombre,descripcion,precio,fecha,estado,imagen,categoriIdCategoria)
        //                       VALUES ('','jupe1124','md5(papaya)'),
        //                              ('','maca4124','md5(papaya)','2','2'),
        //                              ('','nosu1124','md5(papaya)','3','2'),
        //                              ('','luto4322','md5(papaya)','4','3'),
        //                              ('','paga4322','md5(papaya)','5','3'),
        //                              ('','ropa1124','md5(papaya)','6','3')";
        //
        // if (mysqli_query($con, $ADD_PRODUCTO_TEST)) {
        //   # code...
        //   echo "<br> -- PRODUCTOS INSERTADOS -- <br>";
        // }
      }
    }

    mysqli_close($con);
  }

  crearBD();
?>
