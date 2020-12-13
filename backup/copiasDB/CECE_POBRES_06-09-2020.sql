DROP TABLE IF EXISTS alumno; SET FOREIGN_KEY_CHECKS=0;

CREATE TABLE `alumno` (
  `nie` int(11) NOT NULL,
  `nombres` varchar(45) DEFAULT NULL,
  `apellidos` varchar(45) DEFAULT NULL,
  `nacimiento` date DEFAULT NULL,
  `direccion` varchar(200) DEFAULT NULL,
  `telefono` varchar(8) DEFAULT NULL,
  `sexo` char(1) DEFAULT NULL,
  `enfermedad` varchar(200) DEFAULT NULL,
  `estado` varchar(25) DEFAULT NULL,
  `dui` varchar(9) NOT NULL,
  PRIMARY KEY (`nie`,`dui`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

SET FOREIGN_KEY_CHECKS=1;

DROP TABLE IF EXISTS ciclo; SET FOREIGN_KEY_CHECKS=0;

CREATE TABLE `ciclo` (
  `idciclo` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idciclo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

SET FOREIGN_KEY_CHECKS=1;

DROP TABLE IF EXISTS detallepago; SET FOREIGN_KEY_CHECKS=0;

CREATE TABLE `detallepago` (
  `iddetallePago` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(25) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `estado` varchar(45) DEFAULT NULL,
  `idpago` int(11) NOT NULL,
  `nie` int(11) NOT NULL,
  `idusuario` int(11) NOT NULL,
  PRIMARY KEY (`iddetallePago`,`idpago`,`nie`,`idusuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

SET FOREIGN_KEY_CHECKS=1;

DROP TABLE IF EXISTS docente; SET FOREIGN_KEY_CHECKS=0;

CREATE TABLE `docente` (
  `iddocente` int(11) NOT NULL AUTO_INCREMENT,
  `nombres` varchar(45) DEFAULT NULL,
  `apellidos` varchar(45) DEFAULT NULL,
  `direccion` varchar(200) DEFAULT NULL,
  `telefono` varchar(8) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `dui` varchar(9) DEFAULT NULL,
  `nit` varchar(14) DEFAULT NULL,
  `idestado` int(11) DEFAULT NULL,
  PRIMARY KEY (`iddocente`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

INSERT INTO docente VALUES("1","Emerson","Martínez","Zacatecoluca","22556688","emer@gmail.com","051755462","08210505200015","1");
INSERT INTO docente VALUES("2","Yoselin","Ramos","Zacateculuca","22558899","yoselin@gmail.com","123456789","08218978521023","2");
INSERT INTO docente VALUES("3","Raul","Morales Alonso","Zacatecoluca","22556699","raul@gmail.com","112233445","12365489784512","2");
SET FOREIGN_KEY_CHECKS=1;

DROP TABLE IF EXISTS docente_grado; SET FOREIGN_KEY_CHECKS=0;

CREATE TABLE `docente_grado` (
  `iddocente_grado` int(11) NOT NULL AUTO_INCREMENT,
  `año` year(4) DEFAULT NULL,
  `turno` varchar(45) DEFAULT NULL,
  `tipo` varchar(45) DEFAULT NULL,
  `guia` int(11) NOT NULL,
  `idgrado` int(11) NOT NULL,
  PRIMARY KEY (`iddocente_grado`,`guia`,`idgrado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

SET FOREIGN_KEY_CHECKS=1;

DROP TABLE IF EXISTS estado; SET FOREIGN_KEY_CHECKS=0;

CREATE TABLE `estado` (
  `idestado` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`idestado`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

INSERT INTO estado VALUES("1","Activo");
INSERT INTO estado VALUES("2","Inactivo");
SET FOREIGN_KEY_CHECKS=1;

DROP TABLE IF EXISTS grado; SET FOREIGN_KEY_CHECKS=0;

CREATE TABLE `grado` (
  `idgrado` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `idciclo` int(11) NOT NULL,
  PRIMARY KEY (`idgrado`,`idciclo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

SET FOREIGN_KEY_CHECKS=1;

DROP TABLE IF EXISTS inscripcion; SET FOREIGN_KEY_CHECKS=0;

CREATE TABLE `inscripcion` (
  `idinscripcion` int(11) NOT NULL AUTO_INCREMENT,
  `iddocente_grado` int(11) NOT NULL,
  `idmateria` int(11) NOT NULL,
  `iddocente` int(11) NOT NULL,
  `nie` int(11) NOT NULL,
  PRIMARY KEY (`idinscripcion`,`iddocente_grado`,`idmateria`,`iddocente`,`nie`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

SET FOREIGN_KEY_CHECKS=1;

DROP TABLE IF EXISTS materia; SET FOREIGN_KEY_CHECKS=0;

CREATE TABLE `materia` (
  `idmateria` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idmateria`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

SET FOREIGN_KEY_CHECKS=1;

DROP TABLE IF EXISTS notas; SET FOREIGN_KEY_CHECKS=0;

CREATE TABLE `notas` (
  `idnotas` int(11) NOT NULL AUTO_INCREMENT,
  `primerTrimestre` decimal(2,2) DEFAULT NULL,
  `segundoTrimestre` decimal(2,2) DEFAULT NULL,
  `tercerTrimestre` decimal(2,2) DEFAULT NULL,
  `notaFinal` decimal(2,2) DEFAULT NULL,
  `idinscripcion` int(11) NOT NULL,
  PRIMARY KEY (`idnotas`,`idinscripcion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

SET FOREIGN_KEY_CHECKS=1;

DROP TABLE IF EXISTS pago; SET FOREIGN_KEY_CHECKS=0;

CREATE TABLE `pago` (
  `idpago` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(25) DEFAULT NULL,
  `año` year(4) DEFAULT NULL,
  PRIMARY KEY (`idpago`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

SET FOREIGN_KEY_CHECKS=1;

DROP TABLE IF EXISTS pariente; SET FOREIGN_KEY_CHECKS=0;

CREATE TABLE `pariente` (
  `dui` varchar(9) NOT NULL,
  `nombres` varchar(45) DEFAULT NULL,
  `apellidos` varchar(45) DEFAULT NULL,
  `telefono` varchar(8) DEFAULT NULL,
  `direccion` varchar(200) DEFAULT NULL,
  `sexo` char(1) DEFAULT NULL,
  `ultimoGrado` varchar(45) DEFAULT NULL,
  `profesion` varchar(45) DEFAULT NULL,
  `estadoCivil` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`dui`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

SET FOREIGN_KEY_CHECKS=1;

DROP TABLE IF EXISTS permiso; SET FOREIGN_KEY_CHECKS=0;

CREATE TABLE `permiso` (
  `idpermiso` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idpermiso`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

SET FOREIGN_KEY_CHECKS=1;

DROP TABLE IF EXISTS permisousuario; SET FOREIGN_KEY_CHECKS=0;

CREATE TABLE `permisousuario` (
  `idpermisoUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `idpermiso` int(11) NOT NULL,
  `idtipoUsuario` int(11) NOT NULL,
  `valor` char(1) DEFAULT NULL,
  PRIMARY KEY (`idpermisoUsuario`,`idpermiso`,`idtipoUsuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

SET FOREIGN_KEY_CHECKS=1;

DROP TABLE IF EXISTS tipousuario; SET FOREIGN_KEY_CHECKS=0;

CREATE TABLE `tipousuario` (
  `idtipoUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idtipoUsuario`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

INSERT INTO tipousuario VALUES("1","Directora");
INSERT INTO tipousuario VALUES("2","Docente");
INSERT INTO tipousuario VALUES("8","informática");
SET FOREIGN_KEY_CHECKS=1;

DROP TABLE IF EXISTS usuario; SET FOREIGN_KEY_CHECKS=0;

CREATE TABLE `usuario` (
  `idusuario` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(45) DEFAULT NULL,
  `clave` varchar(45) DEFAULT NULL,
  `estado` varchar(15) DEFAULT NULL,
  `intentos` char(1) DEFAULT NULL,
  `bloqueado` char(1) DEFAULT NULL,
  `ultimoIngreso` datetime DEFAULT NULL,
  `idtipoUsuario` int(11) NOT NULL,
  `iddocente` int(11) NOT NULL,
  PRIMARY KEY (`idusuario`,`idtipoUsuario`,`iddocente`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

INSERT INTO usuario VALUES("1","051755462","202cb962ac59075b964b07152d234b70","Activo","0","0","2020-09-06 09:32:47","1","1");
INSERT INTO usuario VALUES("4","123456789","df6869f23329652ae501c695cf843b14","Inactivo","0","0","2020-09-05 22:21:51","8","2");
SET FOREIGN_KEY_CHECKS=1;

