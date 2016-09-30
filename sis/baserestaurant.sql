-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8 ;
USE `mydb` ;

-- -----------------------------------------------------
-- Table `mydb`.`dosificacion`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`dosificacion` (
  `idDosificacion` INT(11) NOT NULL,
  `numAuto` BIGINT(20) NULL DEFAULT NULL,
  `numFac` INT(11) NULL DEFAULT NULL,
  `llave` VARCHAR(25) NULL DEFAULT NULL,
  `nroInicialFac` INT(11) NULL DEFAULT NULL,
  `nroFinalFac` INT(11) NULL DEFAULT NULL,
  `activo` VARCHAR(12) NULL DEFAULT NULL,
  PRIMARY KEY (`idDosificacion`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `mydb`.`venta`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`venta` (
  `idVenta` INT(11) NOT NULL,
  `fecha` DATETIME NULL DEFAULT NULL,
  `tipo` VARCHAR(18) NULL DEFAULT NULL,
  `razonSocial` VARCHAR(25) NULL DEFAULT NULL,
  `nit` INT(11) NULL DEFAULT NULL,
  `total` DECIMAL(18,2) NULL DEFAULT NULL,
  `codigoControl` VARCHAR(15) NULL DEFAULT NULL,
  `fechaLimite` DATETIME NULL DEFAULT NULL,
  `estado` VARCHAR(18) NULL DEFAULT NULL,
  `dosificacionIdDosificacion` INT(11) NOT NULL,
  PRIMARY KEY (`idVenta`, `dosificacionIdDosificacion`),
  INDEX `fk_Venta_Dosificacion1_idx` (`dosificacionIdDosificacion` ASC),
  CONSTRAINT `fk_Venta_Dosificacion1`
    FOREIGN KEY (`dosificacionIdDosificacion`)
    REFERENCES `mydb`.`dosificacion` (`idDosificacion`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `mydb`.`anulado`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`anulado` (
  `idAnulado` INT(11) NOT NULL,
  `descripcion` VARCHAR(50) NULL DEFAULT NULL,
  `ventaIdVenta` INT(11) NOT NULL,
  PRIMARY KEY (`idAnulado`, `ventaIdVenta`),
  INDEX `fk_Anulado_Venta_idx` (`ventaIdVenta` ASC),
  CONSTRAINT `fk_Anulado_Venta`
    FOREIGN KEY (`ventaIdVenta`)
    REFERENCES `mydb`.`venta` (`idVenta`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `mydb`.`categoria`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`categoria` (
  `idCategoria` INT(11) NOT NULL,
  `nombre` VARCHAR(18) NULL DEFAULT NULL,
  `estado` VARCHAR(18) NULL DEFAULT NULL,
  PRIMARY KEY (`idCategoria`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `mydb`.`usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`usuario` (
  `idUsuario` INT(11) NOT NULL,
  `nombre` VARCHAR(15) NULL DEFAULT NULL,
  `aPaterno` VARCHAR(15) NULL DEFAULT NULL,
  `aMaterno` VARCHAR(15) NULL DEFAULT NULL,
  `ci` VARCHAR(15) NULL DEFAULT NULL,
  `telefono` INT(11) NULL DEFAULT NULL,
  `usuario` VARCHAR(15) NULL DEFAULT NULL,
  `contracena` VARCHAR(15) NULL DEFAULT NULL,
  `estado` VARCHAR(18) NULL DEFAULT NULL,
  PRIMARY KEY (`idUsuario`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `mydb`.`cliente`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`cliente` (
  `idCliente` INT(11) NOT NULL,
  `direccion` VARCHAR(85) NULL DEFAULT NULL,
  `usuarioIdUsuario` INT(11) NOT NULL,
  PRIMARY KEY (`idCliente`, `usuarioIdUsuario`),
  INDEX `fk_Cliente_Usuario1_idx` (`usuarioIdUsuario` ASC),
  CONSTRAINT `fk_Cliente_Usuario1`
    FOREIGN KEY (`usuarioIdUsuario`)
    REFERENCES `mydb`.`usuario` (`idUsuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `mydb`.`pedido`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`pedido` (
  `idPedido` INT(11) NOT NULL,
  `fecha` DATETIME NULL DEFAULT NULL,
  `clienteIdCliente` INT(11) NOT NULL,
  PRIMARY KEY (`idPedido`, `clienteIdCliente`),
  INDEX `fk_Pedido_Cliente1_idx` (`clienteIdCliente` ASC),
  CONSTRAINT `fk_Pedido_Cliente1`
    FOREIGN KEY (`clienteIdCliente`)
    REFERENCES `mydb`.`cliente` (`idCliente`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `mydb`.`detalleventa`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`detalleventa` (
  `idDetalleVenta` INT(11) NOT NULL,
  `cantidad` INT(11) NULL DEFAULT NULL,
  `descripcion` VARCHAR(20) NULL DEFAULT NULL,
  `precioVenta` DECIMAL(18,2) NULL DEFAULT NULL,
  `pedidoIdPedido` INT(11) NOT NULL,
  `ventaIdVenta` INT(11) NOT NULL,
  PRIMARY KEY (`idDetalleVenta`, `pedidoIdPedido`, `ventaIdVenta`),
  INDEX `fk_DetalleVenta_Pedido1_idx` (`pedidoIdPedido` ASC),
  INDEX `fk_DetalleVenta_Venta1_idx` (`ventaIdVenta` ASC),
  CONSTRAINT `fk_DetalleVenta_Pedido1`
    FOREIGN KEY (`pedidoIdPedido`)
    REFERENCES `mydb`.`pedido` (`idPedido`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_DetalleVenta_Venta1`
    FOREIGN KEY (`ventaIdVenta`)
    REFERENCES `mydb`.`venta` (`idVenta`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `mydb`.`direccion`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`direccion` (
  `IdDireccion` INT(11) NOT NULL,
  `Ciudad` VARCHAR(45) NULL DEFAULT NULL,
  `Direccion` VARCHAR(45) NULL DEFAULT NULL,
  `Activa` TINYINT(1) NULL DEFAULT NULL,
  `Latitud` VARCHAR(45) NULL DEFAULT NULL,
  `Longitud` VARCHAR(45) NULL DEFAULT NULL,
  `Usuario_Idusuario` INT(11) NOT NULL,
  PRIMARY KEY (`IdDireccion`, `Usuario_Idusuario`),
  INDEX `fk_Direccion_Usuario1_idx` (`Usuario_Idusuario` ASC),
  CONSTRAINT `fk_Direccion_Usuario1`
    FOREIGN KEY (`Usuario_Idusuario`)
    REFERENCES `mydb`.`usuario` (`idUsuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `mydb`.`estado`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`estado` (
  `idEstado` INT(11) NOT NULL,
  `descripcion` VARCHAR(18) NULL DEFAULT NULL,
  PRIMARY KEY (`idEstado`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `mydb`.`estadopedido`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`estadopedido` (
  `idEstadoPedido` INT(11) NOT NULL,
  `fechaIni` DATETIME NULL DEFAULT NULL,
  `fechaFin` DATETIME NULL DEFAULT NULL,
  `estadoIdEstado` INT(11) NOT NULL,
  `pedidoIdPedido` INT(11) NOT NULL,
  PRIMARY KEY (`estadoIdEstado`, `pedidoIdPedido`, `idEstadoPedido`),
  INDEX `fk_EstadoPedido_Estado1_idx` (`estadoIdEstado` ASC),
  INDEX `fk_EstadoPedido_Pedido1` (`pedidoIdPedido` ASC),
  CONSTRAINT `fk_EstadoPedido_Estado1`
    FOREIGN KEY (`estadoIdEstado`)
    REFERENCES `mydb`.`estado` (`idEstado`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_EstadoPedido_Pedido1`
    FOREIGN KEY (`pedidoIdPedido`)
    REFERENCES `mydb`.`pedido` (`idPedido`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `mydb`.`mesa`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`mesa` (
  `idmesa` INT(11) NOT NULL,
  `numeroMesa` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`idmesa`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `mydb`.`estadoreserva`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`estadoreserva` (
  `idEstadoReserva` INT(11) NOT NULL,
  `fechaIni` DATETIME NULL DEFAULT NULL,
  `fechaFin` DATETIME NULL DEFAULT NULL,
  `estadoIdEstado` INT(11) NOT NULL,
  `mesaIdMesa` INT(11) NOT NULL,
  PRIMARY KEY (`estadoIdEstado`, `mesaIdMesa`, `idEstadoReserva`),
  INDEX `fk_EstadoReserva_Mesa1_idx` (`mesaIdMesa` ASC),
  CONSTRAINT `fk_EstadoReserva_Estado1`
    FOREIGN KEY (`estadoIdEstado`)
    REFERENCES `mydb`.`estado` (`idEstado`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_EstadoReserva_Mesa1`
    FOREIGN KEY (`mesaIdMesa`)
    REFERENCES `mydb`.`mesa` (`idmesa`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `mydb`.`imagen`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`imagen` (
  `idImagen` INT(11) NOT NULL,
  `imagen` VARCHAR(95) NULL DEFAULT NULL,
  PRIMARY KEY (`idImagen`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `mydb`.`producto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`producto` (
  `idProducto` INT(11) NOT NULL,
  `nombre` VARCHAR(18) NULL DEFAULT NULL,
  `precio` DECIMAL(18,2) NULL DEFAULT NULL,
  `fecha` DATETIME NULL DEFAULT NULL,
  `estado` VARCHAR(18) NULL DEFAULT NULL,
  `categoriaIdCategoria` INT(11) NOT NULL,
  `imagenIdImagen` INT(11) NOT NULL,
  PRIMARY KEY (`idProducto`, `categoriaIdCategoria`, `imagenIdImagen`),
  INDEX `fk_Producto_Categoria1_idx` (`categoriaIdCategoria` ASC),
  INDEX `fk_Producto_Imagen1_idx` (`imagenIdImagen` ASC),
  CONSTRAINT `fk_Producto_Categoria1`
    FOREIGN KEY (`categoriaIdCategoria`)
    REFERENCES `mydb`.`categoria` (`idCategoria`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Producto_Imagen1`
    FOREIGN KEY (`imagenIdImagen`)
    REFERENCES `mydb`.`imagen` (`idImagen`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `mydb`.`pedidoproducto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`pedidoproducto` (
  `idPedidoProducto` INT(11) NOT NULL,
  `pedidoIdPedido` INT(11) NOT NULL,
  `productoÌdProducto` INT(11) NOT NULL,
  PRIMARY KEY (`idPedidoProducto`, `pedidoIdPedido`, `productoÌdProducto`),
  INDEX `fk_PedidoProducto_Pedido1_idx` (`pedidoIdPedido` ASC),
  INDEX `fk_PedidoProducto_Producto1_idx` (`productoÌdProducto` ASC),
  CONSTRAINT `fk_PedidoProducto_Pedido1`
    FOREIGN KEY (`pedidoIdPedido`)
    REFERENCES `mydb`.`pedido` (`idPedido`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_PedidoProducto_Producto1`
    FOREIGN KEY (`productoÌdProducto`)
    REFERENCES `mydb`.`producto` (`idProducto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `mydb`.`promocion`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`promocion` (
  `IdPromocion` INT(11) NOT NULL,
  `regalo` VARCHAR(38) NULL DEFAULT NULL,
  `precio` DECIMAL(18,2) NULL DEFAULT NULL,
  `fechaIni` DATETIME NULL DEFAULT NULL,
  `fechaFin` DATETIME NULL DEFAULT NULL,
  `imagenIdImagen` INT(11) NOT NULL,
  PRIMARY KEY (`IdPromocion`, `imagenIdImagen`),
  INDEX `fk_Promocion_Imagen1_idx` (`imagenIdImagen` ASC),
  CONSTRAINT `fk_Promocion_Imagen1`
    FOREIGN KEY (`imagenIdImagen`)
    REFERENCES `mydb`.`imagen` (`idImagen`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `mydb`.`productopromocion`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`productopromocion` (
  `idProductoPromocion` INT(11) NOT NULL,
  `productoIdProducto` INT(11) NOT NULL,
  `promocionIdPromocion` INT(11) NOT NULL,
  PRIMARY KEY (`idProductoPromocion`, `productoIdProducto`, `promocionIdPromocion`),
  INDEX `fk_ProductoPromocion_Producto1_idx` (`productoIdProducto` ASC),
  INDEX `fk_ProductoPromocion_Promocion1_idx` (`promocionIdPromocion` ASC),
  CONSTRAINT `fk_ProductoPromocion_Producto1`
    FOREIGN KEY (`productoIdProducto`)
    REFERENCES `mydb`.`producto` (`idProducto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_ProductoPromocion_Promocion1`
    FOREIGN KEY (`promocionIdPromocion`)
    REFERENCES `mydb`.`promocion` (`IdPromocion`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `mydb`.`promocionproducto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`promocionproducto` (
  `idPromocionProducto` INT(11) NOT NULL,
  `productoIdProducto` INT(11) NOT NULL,
  `promocionIdPromocion` INT(11) NOT NULL,
  PRIMARY KEY (`idPromocionProducto`, `productoIdProducto`, `promocionIdPromocion`),
  INDEX `fk_PromocionProducto_Producto1_idx` (`productoIdProducto` ASC),
  INDEX `fk_PromocionProducto_Promocion1_idx` (`promocionIdPromocion` ASC),
  CONSTRAINT `fk_PromocionProducto_Producto1`
    FOREIGN KEY (`productoIdProducto`)
    REFERENCES `mydb`.`producto` (`idProducto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_PromocionProducto_Promocion1`
    FOREIGN KEY (`promocionIdPromocion`)
    REFERENCES `mydb`.`promocion` (`IdPromocion`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `mydb`.`reserva`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`reserva` (
  `idPedido` INT(11) NOT NULL,
  `fecha` DATETIME NULL DEFAULT NULL,
  `mesaIdMesa` INT(11) NOT NULL,
  `clienteIdCliente` INT(11) NOT NULL,
  PRIMARY KEY (`idPedido`, `mesaIdMesa`, `clienteIdCliente`),
  INDEX `fk_Reserva_Mesa1_idx` (`mesaIdMesa` ASC),
  INDEX `fk_Reserva_Cliente1_idx` (`clienteIdCliente` ASC),
  CONSTRAINT `fk_Reserva_Cliente1`
    FOREIGN KEY (`clienteIdCliente`)
    REFERENCES `mydb`.`cliente` (`idCliente`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Reserva_Mesa1`
    FOREIGN KEY (`mesaIdMesa`)
    REFERENCES `mydb`.`mesa` (`idmesa`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `mydb`.`rol`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`rol` (
  `idRol` INT(11) NOT NULL,
  `nombre` VARCHAR(12) NULL DEFAULT NULL,
  PRIMARY KEY (`idRol`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `mydb`.`usuariorol`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`usuariorol` (
  `idUsuario` INT(11) NOT NULL,
  `usuarioIdCliente` INT(11) NOT NULL,
  `rolIdRol` INT(11) NOT NULL,
  `estado` VARCHAR(14) NULL DEFAULT NULL,
  PRIMARY KEY (`idUsuario`, `usuarioIdCliente`, `rolIdRol`),
  INDEX `fk_UsuarioRol_Usuario1_idx` (`usuarioIdCliente` ASC),
  INDEX `fk_UsuarioRol_Rol1_idx` (`rolIdRol` ASC),
  CONSTRAINT `fk_UsuarioRol_Rol1`
    FOREIGN KEY (`rolIdRol`)
    REFERENCES `mydb`.`rol` (`idRol`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_UsuarioRol_Usuario1`
    FOREIGN KEY (`usuarioIdCliente`)
    REFERENCES `mydb`.`usuario` (`idUsuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
