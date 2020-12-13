DROP TABLE IF EXISTS asignatura; SET FOREIGN_KEY_CHECKS=0;

CREATE TABLE `asignatura` (
  `idasignatura` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `idestado` int(11) NOT NULL,
  PRIMARY KEY (`idasignatura`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

INSERT INTO asignatura VALUES("1","Matemáticas","1");
INSERT INTO asignatura VALUES("2","Lenguaje","1");
INSERT INTO asignatura VALUES("3","Ciencias","1");
INSERT INTO asignatura VALUES("4","Ciencias Sociales","1");
INSERT INTO asignatura VALUES("5","Informática","1");
INSERT INTO asignatura VALUES("6","Educación en la fé","1");
SET FOREIGN_KEY_CHECKS=1;

DROP TABLE IF EXISTS ciclo; SET FOREIGN_KEY_CHECKS=0;

CREATE TABLE `ciclo` (
  `idciclo` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `idestado` int(11) NOT NULL,
  PRIMARY KEY (`idciclo`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

INSERT INTO ciclo VALUES("1","Ciclo I","1");
INSERT INTO ciclo VALUES("2","Ciclo II","1");
SET FOREIGN_KEY_CHECKS=1;

DROP TABLE IF EXISTS comentario; SET FOREIGN_KEY_CHECKS=0;

CREATE TABLE `comentario` (
  `idcomentario` int(11) NOT NULL AUTO_INCREMENT,
  `comentario` varchar(10000) NOT NULL,
  `fecha` date NOT NULL,
  PRIMARY KEY (`idcomentario`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

INSERT INTO comentario VALUES("2","Solicito desbloqueo de usuario y cambio de contraseña: 123456987","2020-09-09");
INSERT INTO comentario VALUES("4","hola\n","2020-09-09");
INSERT INTO comentario VALUES("5","salu\n","2020-09-09");
INSERT INTO comentario VALUES("7","Solicito desbloqueo de usuario y cambio de contraseña: 112233445","2020-09-13");
INSERT INTO comentario VALUES("9","Solicito desbloqueo de usuario y cambio de contraseña: 051755463","2020-09-25");
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

INSERT INTO docente VALUES("1","Emerson","Martínez","Zacatecoluca","22556688","emer@gmail.com","051755462","08210505200015","1");
INSERT INTO docente VALUES("2","Yoselin","Ramos","Zacateculuca","22558899","yoselin@gmail.com","123456789","08218978521023","2");
INSERT INTO docente VALUES("3","Raul","Morales Alonso","Zacatecoluca","22556699","raul@gmail.com","112233445","12365489784512","2");
INSERT INTO docente VALUES("4","Daniel Antonio","Anaya Ruiz","Santa Ana","22556688","daniel@gmail.com","123456987","01235698748595","1");
INSERT INTO docente VALUES("5","Silvia Maria","Diaz Zavaleta","Zacatecoluca colonia Jose Simeon Cañas","78956254","silvia@gmail.com","051755463","08212506902010","1");
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

DROP TABLE IF EXISTS estudiante; SET FOREIGN_KEY_CHECKS=0;

CREATE TABLE `estudiante` (
  `nie` int(11) NOT NULL,
  `nombres` varchar(45) DEFAULT NULL,
  `apellidos` varchar(45) DEFAULT NULL,
  `foto` varchar(100) NOT NULL,
  `nacimiento` date DEFAULT NULL,
  `genero` char(1) DEFAULT NULL,
  `nacionalidad` varchar(25) NOT NULL,
  `viveCon` varchar(25) NOT NULL,
  `telefono` varchar(8) DEFAULT NULL,
  `zona` varchar(6) NOT NULL,
  `direccion` varchar(200) DEFAULT NULL,
  `enfermedad` varchar(200) DEFAULT NULL,
  `alergia` varchar(200) NOT NULL,
  `idestado` int(11) DEFAULT NULL,
  `duiPadre` varchar(9) NOT NULL,
  `duiMadre` varchar(9) NOT NULL,
  `duiResponsable` varchar(9) NOT NULL,
  PRIMARY KEY (`nie`,`duiResponsable`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

SET FOREIGN_KEY_CHECKS=1;

DROP TABLE IF EXISTS grado; SET FOREIGN_KEY_CHECKS=0;

CREATE TABLE `grado` (
  `idgrado` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `idestado` int(11) NOT NULL,
  `idciclo` int(11) NOT NULL,
  PRIMARY KEY (`idgrado`,`idciclo`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

INSERT INTO grado VALUES("2","Primero","1","1");
INSERT INTO grado VALUES("3","Segundo","1","1");
INSERT INTO grado VALUES("8","Tercero","1","1");
INSERT INTO grado VALUES("9","Cuarto","1","2");
INSERT INTO grado VALUES("11","Quinto","1","2");
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

DROP TABLE IF EXISTS madre; SET FOREIGN_KEY_CHECKS=0;

CREATE TABLE `madre` (
  `dui` varchar(9) NOT NULL,
  `nombres` varchar(45) NOT NULL,
  `apellidos` varchar(45) NOT NULL,
  `nacimiento` date NOT NULL,
  `profesion` varchar(45) NOT NULL,
  `telefono` varchar(8) NOT NULL,
  `direccion` varchar(200) NOT NULL,
  PRIMARY KEY (`dui`)
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

DROP TABLE IF EXISTS padre; SET FOREIGN_KEY_CHECKS=0;

CREATE TABLE `padre` (
  `dui` varchar(9) NOT NULL,
  `nombres` varchar(45) NOT NULL,
  `apellidos` varchar(45) NOT NULL,
  `nacimiento` date NOT NULL,
  `profesion` varchar(45) NOT NULL,
  `telefono` varchar(8) NOT NULL,
  `direccion` varchar(200) NOT NULL,
  PRIMARY KEY (`dui`)
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

DROP TABLE IF EXISTS responsable; SET FOREIGN_KEY_CHECKS=0;

CREATE TABLE `responsable` (
  `dui` varchar(9) NOT NULL,
  `parentesco` varchar(45) NOT NULL,
  `nombres` varchar(45) DEFAULT NULL,
  `apellidos` varchar(45) DEFAULT NULL,
  `nacimiento` date NOT NULL,
  `estadoCivil` varchar(25) DEFAULT NULL,
  `profesion` varchar(45) DEFAULT NULL,
  `ultimoGrado` varchar(45) DEFAULT NULL,
  `telefono` varchar(8) DEFAULT NULL,
  `zona` varchar(6) DEFAULT NULL,
  `direccion` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`dui`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

SET FOREIGN_KEY_CHECKS=1;

DROP TABLE IF EXISTS tipousuario; SET FOREIGN_KEY_CHECKS=0;

CREATE TABLE `tipousuario` (
  `idtipoUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `idestado` int(11) NOT NULL,
  PRIMARY KEY (`idtipoUsuario`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

INSERT INTO tipousuario VALUES("1","Administrador","1");
INSERT INTO tipousuario VALUES("2","Docente","1");
INSERT INTO tipousuario VALUES("8","soporte","1");
INSERT INTO tipousuario VALUES("12","secretaria","1");
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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

INSERT INTO usuario VALUES("1","051755462","202cb962ac59075b964b07152d234b70","Activo","0","0","2020-10-03 13:06:51","1","1");
INSERT INTO usuario VALUES("4","123456789","df6869f23329652ae501c695cf843b14","Inactivo","0","0","2020-09-05 22:21:51","8","2");
INSERT INTO usuario VALUES("5","123456987","202cb962ac59075b964b07152d234b70","Activo","0","0","2020-09-27 10:45:24","8","4");
INSERT INTO usuario VALUES("6","112233445","202cb962ac59075b964b07152d234b70","Inactivo","0","0","2020-09-23 16:50:32","2","3");
INSERT INTO usuario VALUES("7","051755463","386d932c6398ca3daa5148f2f4e9e5e2","Activo","0","0","2020-09-25 20:24:05","1","5");
SET FOREIGN_KEY_CHECKS=1;

