DROP TABLE IF EXISTS abono; SET FOREIGN_KEY_CHECKS=0;

CREATE TABLE `abono` (
  `idabono` int(11) NOT NULL AUTO_INCREMENT,
  `abono` decimal(6,2) NOT NULL,
  `idbanquete` int(11) NOT NULL,
  PRIMARY KEY (`idabono`,`idbanquete`),
  KEY `fk_abono_banquete1_idx` (`idbanquete`),
  CONSTRAINT `fk_abono_banquete1` FOREIGN KEY (`idbanquete`) REFERENCES `banquete` (`idbanquete`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

SET FOREIGN_KEY_CHECKS=1;

DROP TABLE IF EXISTS banquete; SET FOREIGN_KEY_CHECKS=0;

CREATE TABLE `banquete` (
  `idbanquete` int(11) NOT NULL AUTO_INCREMENT,
  `fechabanquete` date NOT NULL,
  `servicios` varchar(600) NOT NULL,
  `formapago` varchar(45) NOT NULL,
  `serie` varchar(15) NOT NULL,
  `total` decimal(8,2) NOT NULL,
  `adelanto` decimal(6,2) NOT NULL,
  `restante` decimal(6,2) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `estado` varchar(25) NOT NULL,
  `idusuario` int(11) NOT NULL,
  `idcliente` int(11) NOT NULL,
  PRIMARY KEY (`idbanquete`,`idusuario`,`idcliente`),
  KEY `fk_banquete_usuario1_idx` (`idusuario`),
  KEY `fk_banquete_cliente1_idx` (`idcliente`),
  CONSTRAINT `fk_banquete_cliente1` FOREIGN KEY (`idcliente`) REFERENCES `cliente` (`idcliente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_banquete_usuario1` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

SET FOREIGN_KEY_CHECKS=1;

DROP TABLE IF EXISTS cliente; SET FOREIGN_KEY_CHECKS=0;

CREATE TABLE `cliente` (
  `idcliente` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `apellido` varchar(45) NOT NULL,
  `telefono` varchar(12) NOT NULL,
  `dui` varchar(10) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `estado` varchar(10) NOT NULL,
  PRIMARY KEY (`idcliente`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO cliente VALUES("1","cliente no registrado","- ninguno -","0000-0000","00000000-0","no registrado","Activo");
SET FOREIGN_KEY_CHECKS=1;

DROP TABLE IF EXISTS compra; SET FOREIGN_KEY_CHECKS=0;

CREATE TABLE `compra` (
  `idcompra` int(11) NOT NULL AUTO_INCREMENT,
  `fechacompra` date NOT NULL,
  `total` decimal(8,2) NOT NULL,
  `idusuario` int(11) NOT NULL,
  `idproveedor` int(11) NOT NULL,
  PRIMARY KEY (`idcompra`,`idusuario`,`idproveedor`),
  KEY `fk_compra_usuario_idx` (`idusuario`),
  KEY `fk_compra_proveedor1_idx` (`idproveedor`),
  CONSTRAINT `fk_compra_proveedor1` FOREIGN KEY (`idproveedor`) REFERENCES `proveedor` (`idproveedor`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_compra_usuario` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

SET FOREIGN_KEY_CHECKS=1;

DROP TABLE IF EXISTS detallebanquete; SET FOREIGN_KEY_CHECKS=0;

CREATE TABLE `detallebanquete` (
  `iddetalleventa` int(11) NOT NULL AUTO_INCREMENT,
  `precioactual` decimal(6,2) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `subtotal` decimal(6,2) NOT NULL,
  `idbanquete` int(11) NOT NULL,
  `idproducto` int(11) NOT NULL,
  PRIMARY KEY (`iddetalleventa`,`idbanquete`,`idproducto`),
  KEY `fk_detallebanquete_banquete1_idx` (`idbanquete`),
  KEY `fk_detallebanquete_producto1_idx` (`idproducto`),
  CONSTRAINT `fk_detallebanquete_banquete1` FOREIGN KEY (`idbanquete`) REFERENCES `banquete` (`idbanquete`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_detallebanquete_producto1` FOREIGN KEY (`idproducto`) REFERENCES `producto` (`idproducto`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

SET FOREIGN_KEY_CHECKS=1;

DROP TABLE IF EXISTS detallecompra; SET FOREIGN_KEY_CHECKS=0;

CREATE TABLE `detallecompra` (
  `iddetallecompra` int(11) NOT NULL AUTO_INCREMENT,
  `cantidad` int(11) NOT NULL,
  `precio` decimal(6,2) NOT NULL,
  `subtotal` decimal(6,2) NOT NULL,
  `idcompra` int(11) NOT NULL,
  `idproducto` int(11) NOT NULL,
  PRIMARY KEY (`iddetallecompra`,`idcompra`,`idproducto`),
  KEY `fk_detallecompra_compra1_idx` (`idcompra`),
  KEY `fk_detallecompra_producto1_idx` (`idproducto`),
  CONSTRAINT `fk_detallecompra_compra1` FOREIGN KEY (`idcompra`) REFERENCES `compra` (`idcompra`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_detallecompra_producto1` FOREIGN KEY (`idproducto`) REFERENCES `producto` (`idproducto`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

SET FOREIGN_KEY_CHECKS=1;

DROP TABLE IF EXISTS detalleventa; SET FOREIGN_KEY_CHECKS=0;

CREATE TABLE `detalleventa` (
  `iddetalleventa` int(11) NOT NULL AUTO_INCREMENT,
  `precioactual` decimal(6,2) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `subtotal` decimal(6,2) NOT NULL,
  `idventa` int(11) NOT NULL,
  `idproducto` int(11) NOT NULL,
  PRIMARY KEY (`iddetalleventa`,`idventa`,`idproducto`),
  KEY `fk_detalleventa_venta1_idx` (`idventa`),
  KEY `fk_detalleventa_producto1_idx` (`idproducto`),
  CONSTRAINT `fk_detalleventa_producto1` FOREIGN KEY (`idproducto`) REFERENCES `producto` (`idproducto`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_detalleventa_venta1` FOREIGN KEY (`idventa`) REFERENCES `venta` (`idventa`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

SET FOREIGN_KEY_CHECKS=1;

DROP TABLE IF EXISTS factura; SET FOREIGN_KEY_CHECKS=0;

CREATE TABLE `factura` (
  `idfactura` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` varchar(10) NOT NULL,
  `fecha` date NOT NULL,
  `tipo` varchar(25) NOT NULL,
  `idtipo` int(11) NOT NULL,
  PRIMARY KEY (`idfactura`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

SET FOREIGN_KEY_CHECKS=1;

DROP TABLE IF EXISTS gastos; SET FOREIGN_KEY_CHECKS=0;

CREATE TABLE `gastos` (
  `idgastos` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` date NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `costo` decimal(8,2) NOT NULL,
  PRIMARY KEY (`idgastos`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

SET FOREIGN_KEY_CHECKS=1;

DROP TABLE IF EXISTS perfil; SET FOREIGN_KEY_CHECKS=0;

CREATE TABLE `perfil` (
  `id_perfil` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_empresa` varchar(40) NOT NULL,
  `direccion` varchar(80) NOT NULL,
  `departamento` varchar(50) NOT NULL,
  `ciudad` varchar(50) NOT NULL,
  `telefono` varchar(15) NOT NULL,
  `email` varchar(40) NOT NULL,
  `impuesto` varchar(6) NOT NULL,
  `moneda` varchar(6) NOT NULL,
  `lema` varchar(100) NOT NULL,
  `logo_url` varchar(200) NOT NULL,
  PRIMARY KEY (`id_perfil`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO perfil VALUES("1","RESTAURANTE TRIDIMANIA","ninguna","La Paz","Santiago Nonualco","ninguno","ninguno@gmail.com","13","$","0000","../logo/1481296612_logo.jpg");
SET FOREIGN_KEY_CHECKS=1;

DROP TABLE IF EXISTS produccion; SET FOREIGN_KEY_CHECKS=0;

CREATE TABLE `produccion` (
  `idproduccion` int(11) NOT NULL AUTO_INCREMENT,
  `fechaproduccion` date NOT NULL,
  `cantidad` int(11) NOT NULL,
  `fechavencimiento` date NOT NULL,
  `tipo` varchar(25) NOT NULL,
  `precioventa` decimal(6,2) NOT NULL,
  `idproducto` int(11) NOT NULL,
  PRIMARY KEY (`idproduccion`,`idproducto`),
  KEY `fk_produccion_producto1_idx` (`idproducto`),
  CONSTRAINT `fk_produccion_producto1` FOREIGN KEY (`idproducto`) REFERENCES `producto` (`idproducto`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

SET FOREIGN_KEY_CHECKS=1;

DROP TABLE IF EXISTS producto; SET FOREIGN_KEY_CHECKS=0;

CREATE TABLE `producto` (
  `idproducto` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `preciounitario` decimal(6,2) NOT NULL,
  `precioventa` decimal(6,2) NOT NULL,
  `idtipoproducto` int(11) NOT NULL,
  `estado` varchar(10) NOT NULL,
  PRIMARY KEY (`idproducto`,`idtipoproducto`),
  KEY `fk_producto_tipoproducto1_idx` (`idtipoproducto`),
  CONSTRAINT `fk_producto_tipoproducto1` FOREIGN KEY (`idtipoproducto`) REFERENCES `tipoproducto` (`idtipoproducto`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

SET FOREIGN_KEY_CHECKS=1;

DROP TABLE IF EXISTS proveedor; SET FOREIGN_KEY_CHECKS=0;

CREATE TABLE `proveedor` (
  `idproveedor` int(11) NOT NULL AUTO_INCREMENT,
  `empresa` varchar(45) NOT NULL,
  `codigo` varchar(10) NOT NULL,
  `telefono` varchar(12) NOT NULL,
  `email` varchar(45) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `nombrecontacto` varchar(45) NOT NULL,
  `telefonocontacto` varchar(12) NOT NULL,
  `estado` varchar(10) NOT NULL,
  `comentario` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`idproveedor`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

SET FOREIGN_KEY_CHECKS=1;

DROP TABLE IF EXISTS restante; SET FOREIGN_KEY_CHECKS=0;

CREATE TABLE `restante` (
  `idrestante` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` date NOT NULL,
  `precio` decimal(6,2) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `subtotal` decimal(6,2) NOT NULL,
  `idproducto` int(11) NOT NULL,
  PRIMARY KEY (`idrestante`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

SET FOREIGN_KEY_CHECKS=1;

DROP TABLE IF EXISTS tipoproducto; SET FOREIGN_KEY_CHECKS=0;

CREATE TABLE `tipoproducto` (
  `idtipoproducto` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `estado` varchar(10) NOT NULL,
  PRIMARY KEY (`idtipoproducto`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO tipoproducto VALUES("1","produccion","Activo");
SET FOREIGN_KEY_CHECKS=1;

DROP TABLE IF EXISTS tipousuario; SET FOREIGN_KEY_CHECKS=0;

CREATE TABLE `tipousuario` (
  `idtipousuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `estado` varchar(10) NOT NULL,
  PRIMARY KEY (`idtipousuario`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

INSERT INTO tipousuario VALUES("1","administrador","Activo");
INSERT INTO tipousuario VALUES("2","cocinero","Activo");
INSERT INTO tipousuario VALUES("3","cajero","Activo");
SET FOREIGN_KEY_CHECKS=1;

DROP TABLE IF EXISTS usuario; SET FOREIGN_KEY_CHECKS=0;

CREATE TABLE `usuario` (
  `idusuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `apellido` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `usuario` varchar(45) NOT NULL,
  `clave` varchar(45) NOT NULL,
  `estado` varchar(10) NOT NULL,
  `ultimoingreso` datetime NOT NULL,
  `intentos` varchar(5) NOT NULL,
  `bloqueado` varchar(5) NOT NULL,
  `pregunta` varchar(80) NOT NULL,
  `respuesta` varchar(80) NOT NULL,
  `idtipousuario` int(11) NOT NULL,
  PRIMARY KEY (`idusuario`,`idtipousuario`),
  KEY `fk_usuario_tipousuario1_idx` (`idtipousuario`),
  CONSTRAINT `fk_usuario_tipousuario1` FOREIGN KEY (`idtipousuario`) REFERENCES `tipousuario` (`idtipousuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO usuario VALUES("1","Ana","Vaquerano","ana.vaquerano@gmail.com","anatridimania","202cb962ac59075b964b07152d234b70","Activo","2016-12-20 07:37:05","0","0","fer","fer","1");
SET FOREIGN_KEY_CHECKS=1;

DROP TABLE IF EXISTS venta; SET FOREIGN_KEY_CHECKS=0;

CREATE TABLE `venta` (
  `idventa` int(11) NOT NULL AUTO_INCREMENT,
  `fechaventa` date NOT NULL,
  `total` decimal(8,2) NOT NULL,
  `idusuario` int(11) NOT NULL,
  `idcliente` int(11) NOT NULL,
  PRIMARY KEY (`idventa`,`idusuario`,`idcliente`),
  KEY `fk_venta_usuario1_idx` (`idusuario`),
  KEY `fk_venta_cliente1_idx` (`idcliente`),
  CONSTRAINT `fk_venta_cliente1` FOREIGN KEY (`idcliente`) REFERENCES `cliente` (`idcliente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_venta_usuario1` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

SET FOREIGN_KEY_CHECKS=1;

