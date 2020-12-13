DROP TABLE IF EXISTS asignatura; SET FOREIGN_KEY_CHECKS=0;

CREATE TABLE `asignatura` (
  `idasignatura` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `idestado` int(11) NOT NULL,
  PRIMARY KEY (`idasignatura`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

INSERT INTO asignatura VALUES("1","Matematicas","1");
INSERT INTO asignatura VALUES("2","Lenguaje","1");
INSERT INTO asignatura VALUES("3","Ciencias","1");
INSERT INTO asignatura VALUES("4","Ciencias Sociales","1");
INSERT INTO asignatura VALUES("5","Educacion Informatica","1");
INSERT INTO asignatura VALUES("6","Educacion en la fe","1");
INSERT INTO asignatura VALUES("7","Ingles","1");
INSERT INTO asignatura VALUES("8","Acepta y valora la diversidad","1");
SET FOREIGN_KEY_CHECKS=1;

DROP TABLE IF EXISTS ciclo; SET FOREIGN_KEY_CHECKS=0;

CREATE TABLE `ciclo` (
  `idciclo` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `idestado` int(11) NOT NULL,
  PRIMARY KEY (`idciclo`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

INSERT INTO ciclo VALUES("1","Ciclo I","1");
INSERT INTO ciclo VALUES("2","Ciclo II","2");
SET FOREIGN_KEY_CHECKS=1;

DROP TABLE IF EXISTS comentario; SET FOREIGN_KEY_CHECKS=0;

CREATE TABLE `comentario` (
  `idcomentario` int(11) NOT NULL AUTO_INCREMENT,
  `comentario` varchar(10000) NOT NULL,
  `fecha` date NOT NULL,
  PRIMARY KEY (`idcomentario`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

INSERT INTO comentario VALUES("2","Solicito desbloqueo de usuario y cambio de contraseña: 123456987","2020-09-09");
INSERT INTO comentario VALUES("4","hola\n\n","2020-09-09");
INSERT INTO comentario VALUES("5","salu\n\n","2020-09-09");
INSERT INTO comentario VALUES("7","Solicito desbloqueo de usuario y cambio de contraseña: 112233445","2020-09-13");
INSERT INTO comentario VALUES("9","Solicito desbloqueo de usuario y cambio de contraseña: 051755463","2020-09-25");
INSERT INTO comentario VALUES("10","Solicito desbloqueo de usuario y cambio de contraseÃ±a: 112233445","2020-12-11");
SET FOREIGN_KEY_CHECKS=1;

DROP TABLE IF EXISTS curriculum; SET FOREIGN_KEY_CHECKS=0;

CREATE TABLE `curriculum` (
  `idcurriculum` int(11) NOT NULL AUTO_INCREMENT,
  `ahnio` year(4) NOT NULL,
  `curriculum` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `iddocente` int(11) NOT NULL,
  PRIMARY KEY (`idcurriculum`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO curriculum VALUES("1","2020","../img/curriculum/1604242739_IMG_20200815_0002.pdf","2");
INSERT INTO curriculum VALUES("2","2020","../img/curriculum/1604242739_IMG_20200815_0002.pdf","4");
INSERT INTO curriculum VALUES("3","2020","../img/curriculum/1604242739_IMG_20200815_0002.pdf","4");
INSERT INTO curriculum VALUES("4","2020","../img/curriculum/1604242739_IMG_20200815_0002.pdf","5");
INSERT INTO curriculum VALUES("5","2020","../img/curriculum/1604242739_IMG_20200815_0002.pdf","4");
INSERT INTO curriculum VALUES("6","2020","../img/curriculum/1604245417_fauna.docx","1");
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

INSERT INTO docente VALUES("1","Emerson","Martinez","Zacatecoluca","22556688","emer@gmail.com","051755462","08210505200015","1");
INSERT INTO docente VALUES("2","Yoselin","Ramos","Zacateculuca","22558899","yoselin@gmail.com","123456789","08218978521023","2");
INSERT INTO docente VALUES("3","Raul","Morales Alonso","Zacatecoluca","22556699","raul@gmail.com","112233445","12365489784512","1");
INSERT INTO docente VALUES("4","Daniel Antonio","Anaya Ruiz","Santa Ana","22556688","daniel@gmail.com","123456987","01235698748595","1");
INSERT INTO docente VALUES("5","Silvia Maria","Diaz Zavaleta","Zacatecoluca colonia Jose Simeon","78956254","silvia@gmail.com","051755463","08212506902010","1");
SET FOREIGN_KEY_CHECKS=1;

DROP TABLE IF EXISTS docente_asignatura; SET FOREIGN_KEY_CHECKS=0;

CREATE TABLE `docente_asignatura` (
  `iddocenteAsignatura` int(11) NOT NULL AUTO_INCREMENT,
  `idgradoDocente` int(11) NOT NULL,
  `iddocente` int(11) NOT NULL,
  `idasignatura` int(11) NOT NULL,
  PRIMARY KEY (`iddocenteAsignatura`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

INSERT INTO docente_asignatura VALUES("1","4","1","1");
INSERT INTO docente_asignatura VALUES("2","4","1","2");
INSERT INTO docente_asignatura VALUES("3","4","4","3");
INSERT INTO docente_asignatura VALUES("4","4","5","4");
INSERT INTO docente_asignatura VALUES("5","4","5","5");
INSERT INTO docente_asignatura VALUES("6","4","1","6");
INSERT INTO docente_asignatura VALUES("7","5","1","1");
INSERT INTO docente_asignatura VALUES("8","5","1","2");
INSERT INTO docente_asignatura VALUES("9","5","5","3");
INSERT INTO docente_asignatura VALUES("10","5","1","4");
INSERT INTO docente_asignatura VALUES("11","5","5","5");
INSERT INTO docente_asignatura VALUES("12","5","5","6");
INSERT INTO docente_asignatura VALUES("13","6","1","1");
INSERT INTO docente_asignatura VALUES("14","6","4","2");
INSERT INTO docente_asignatura VALUES("15","6","4","3");
INSERT INTO docente_asignatura VALUES("16","6","5","4");
INSERT INTO docente_asignatura VALUES("17","6","1","5");
INSERT INTO docente_asignatura VALUES("18","6","5","6");
INSERT INTO docente_asignatura VALUES("19","7","5","1");
INSERT INTO docente_asignatura VALUES("20","7","5","2");
INSERT INTO docente_asignatura VALUES("21","7","4","3");
INSERT INTO docente_asignatura VALUES("22","7","5","4");
INSERT INTO docente_asignatura VALUES("23","7","1","5");
INSERT INTO docente_asignatura VALUES("24","7","5","6");
SET FOREIGN_KEY_CHECKS=1;

DROP TABLE IF EXISTS documento; SET FOREIGN_KEY_CHECKS=0;

CREATE TABLE `documento` (
  `iddocumento` int(11) NOT NULL AUTO_INCREMENT,
  `ahnio` year(4) NOT NULL,
  `tipo` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  `documento` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `idusuario` int(11) NOT NULL,
  PRIMARY KEY (`iddocumento`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO documento VALUES("1","2019","PEA","Documento PEA del 2019","../img/documentos/1604241991_fauna.docx","1");
INSERT INTO documento VALUES("2","2020","Acta de rendicion de cuen","Cuentas del centro escolar","../img/documentos/1604241991_fauna.docx","1");
INSERT INTO documento VALUES("3","2020","Inventario de equipo","Equipo del centro escolar","../img/documentos/1604245637_Honduras.docx","1");
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
  `nie` varchar(11) NOT NULL,
  `nombres` varchar(45) DEFAULT NULL,
  `apellidos` varchar(45) DEFAULT NULL,
  `foto` varchar(100) NOT NULL,
  `nacimiento` date DEFAULT NULL,
  `genero` char(1) DEFAULT NULL,
  `nacionalidad` varchar(25) NOT NULL,
  `viveCon` varchar(25) NOT NULL,
  `parentescoResponsable` varchar(45) NOT NULL,
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

INSERT INTO estudiante VALUES("205896","Israel Antonio","Ayala Bonilla","","2006-07-21","M","SalvadoreÃ±a","Padre y Madre","TÃ­o","","Rural","Zacatecoluca","","","1","698574886","085223645","087521132");
INSERT INTO estudiante VALUES("564587","Yoselin","Montoya","","2012-09-10","F","Salvadoreña","Padre y Madre","Tia","7855687","Urbana","Zacatecoluca","Ninguna","Ninguna","1","897566231","889745654","654897213");
INSERT INTO estudiante VALUES("655886","Alvaro Armando","Benitez","","2010-08-19","M","SalvadoreÃ±a","Padre y Madre","Abuela","22569856","Rural","Zacatecoluca, JosÃ© Simeon CaÃ±as","Ninguna","Alergï¿½a al polvo","1","698574123","789855642","213654897");
SET FOREIGN_KEY_CHECKS=1;

DROP TABLE IF EXISTS grado; SET FOREIGN_KEY_CHECKS=0;

CREATE TABLE `grado` (
  `idgrado` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `idestado` int(11) NOT NULL,
  `idciclo` int(11) NOT NULL,
  PRIMARY KEY (`idgrado`,`idciclo`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

INSERT INTO grado VALUES("2","Primero","1","1");
INSERT INTO grado VALUES("3","Segundo","1","1");
INSERT INTO grado VALUES("8","Tercero","1","1");
INSERT INTO grado VALUES("9","Cuarto","1","2");
INSERT INTO grado VALUES("11","Quinto","1","2");
INSERT INTO grado VALUES("12","Sexto","1","2");
INSERT INTO grado VALUES("13","Septimo","1","1");
SET FOREIGN_KEY_CHECKS=1;

DROP TABLE IF EXISTS grado_docente; SET FOREIGN_KEY_CHECKS=0;

CREATE TABLE `grado_docente` (
  `idgradoDocente` int(11) NOT NULL AUTO_INCREMENT,
  `ahnio` year(4) DEFAULT NULL,
  `turno` varchar(45) DEFAULT NULL,
  `tipo` varchar(45) DEFAULT NULL,
  `guia` int(11) NOT NULL,
  `idgrado` int(11) NOT NULL,
  PRIMARY KEY (`idgradoDocente`,`guia`,`idgrado`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

INSERT INTO grado_docente VALUES("1","2020","Matutino","Unica","1","2");
INSERT INTO grado_docente VALUES("2","2017","Matutino","Integrada","5","8");
INSERT INTO grado_docente VALUES("3","2020","Vespertino","Integrada","5","9");
INSERT INTO grado_docente VALUES("4","2020","Vespertino","Unica","1","8");
INSERT INTO grado_docente VALUES("5","2020","Matutino","Unica","1","12");
INSERT INTO grado_docente VALUES("6","2020","Vespertino","Integrada","5","11");
INSERT INTO grado_docente VALUES("7","2020","Vespertino","Unica","4","9");
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

INSERT INTO madre VALUES("085223645","Ana","Bermudez","1985-10-16","Contadora PÃºblica","22559988","Zacatecoluca");
INSERT INTO madre VALUES("789855642","Sara","Miranda","1993-11-10","Ama de casa","22555589","Zacatecoluca");
INSERT INTO madre VALUES("889745654","Mirna","Pérez","2000-10-02","Psicóloga","22558897","Zacatecoluca La Paz SV");
SET FOREIGN_KEY_CHECKS=1;

DROP TABLE IF EXISTS matricula; SET FOREIGN_KEY_CHECKS=0;

CREATE TABLE `matricula` (
  `idmatricula` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` date NOT NULL,
  `idgradoDocente` int(11) NOT NULL,
  `nie` int(11) NOT NULL,
  `idestado` int(11) NOT NULL,
  PRIMARY KEY (`idmatricula`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO matricula VALUES("1","2020-11-03","7","205896","1");
INSERT INTO matricula VALUES("3","2020-11-08","6","205896","1");
INSERT INTO matricula VALUES("4","2020-11-10","7","564587","1");
INSERT INTO matricula VALUES("38","2020-11-15","5","564587","1");
INSERT INTO matricula VALUES("39","2020-11-15","5","205896","1");
INSERT INTO matricula VALUES("40","2020-11-15","5","655886","1");
INSERT INTO matricula VALUES("41","2020-11-15","6","564587","1");
INSERT INTO matricula VALUES("42","2020-11-22","4","564587","1");
INSERT INTO matricula VALUES("43","2020-11-22","4","655886","1");
INSERT INTO matricula VALUES("44","2020-12-04","3","564587","1");
INSERT INTO matricula VALUES("45","2020-12-04","3","205896","1");
INSERT INTO matricula VALUES("46","2020-12-04","3","655886","1");
SET FOREIGN_KEY_CHECKS=1;

DROP TABLE IF EXISTS notas; SET FOREIGN_KEY_CHECKS=0;

CREATE TABLE `notas` (
  `idnotas` int(11) NOT NULL AUTO_INCREMENT,
  `primerTrimestre` decimal(10,2) NOT NULL,
  `segundoTrimestre` decimal(10,2) NOT NULL,
  `tercerTrimestre` decimal(10,2) NOT NULL,
  `notaFinal` decimal(10,2) NOT NULL,
  `fecha` date NOT NULL,
  `idasignatura` int(11) NOT NULL,
  `idmatricula` int(11) NOT NULL,
  PRIMARY KEY (`idnotas`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO notas VALUES("10","7.00","8.00","9.00","8.00","2020-11-22","5","1");
INSERT INTO notas VALUES("11","6.00","7.00","8.00","7.00","2020-11-22","5","4");
INSERT INTO notas VALUES("12","8.00","9.00","9.00","8.50","2020-11-22","2","3");
INSERT INTO notas VALUES("13","7.00","7.00","7.00","7.00","2020-11-22","2","41");
INSERT INTO notas VALUES("14","7.00","8.00","9.00","8.00","2020-11-22","1","43");
INSERT INTO notas VALUES("15","7.00","9.00","9.00","8.00","2020-11-22","1","42");
INSERT INTO notas VALUES("16","7.00","8.00","9.00","8.00","2020-11-24","1","1");
INSERT INTO notas VALUES("17","0.00","0.00","0.00","7.00","2020-11-24","1","4");
INSERT INTO notas VALUES("18","8.00","8.00","8.00","8.00","2020-12-04","1","45");
INSERT INTO notas VALUES("19","7.00","8.00","9.00","8.00","2020-12-04","1","46");
INSERT INTO notas VALUES("20","7.00","8.00","9.00","8.00","2020-12-04","1","44");
INSERT INTO notas VALUES("21","8.00","8.00","8.00","8.00","2020-12-04","2","45");
INSERT INTO notas VALUES("22","7.00","7.00","7.00","7.00","2020-12-04","2","46");
INSERT INTO notas VALUES("23","9.00","9.00","9.00","9.00","2020-12-04","2","44");
INSERT INTO notas VALUES("24","0.00","0.00","0.00","0.00","2020-12-04","8","45");
INSERT INTO notas VALUES("25","0.00","0.00","0.00","0.00","2020-12-04","8","46");
INSERT INTO notas VALUES("26","0.00","0.00","0.00","0.00","2020-12-04","8","44");
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

INSERT INTO padre VALUES("698574123","Aldo","Ramirez  Mendez","1970-08-14","Profesor","78556997","Col. el progreso, Zacatecoluca, La Paz");
INSERT INTO padre VALUES("698574886","Ramiro","Mendez","1982-08-13","AlbaÃ±il","23556699","Zacatecoluca");
INSERT INTO padre VALUES("897566231","Mario","Anaya","1990-10-16","Operario","78995589","Calle principal Zacatecoluca, La Paz");
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
  `moduloUsuarios` char(1) NOT NULL,
  `moduloDocente` char(1) NOT NULL,
  `moduloCurriculum` char(1) NOT NULL,
  `moduloCiclo` char(1) NOT NULL,
  `moduloGrado` char(1) NOT NULL,
  `moduloLectivo` char(1) NOT NULL,
  `moduloMatricula` char(1) NOT NULL,
  `moduloAsignatura` char(1) NOT NULL,
  `moduloDocumentos` char(1) NOT NULL,
  `moduloEstudiante` char(1) NOT NULL,
  `moduloPadres` char(1) NOT NULL,
  `moduloMadres` char(1) NOT NULL,
  `moduloResponsable` char(1) NOT NULL,
  `idtipoUsuario` int(11) NOT NULL,
  PRIMARY KEY (`idpermiso`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

INSERT INTO permiso VALUES("1","1","1","1","1","1","1","1","1","1","1","1","1","1","1");
INSERT INTO permiso VALUES("5","0","0","0","0","0","0","0","0","0","0","0","0","0","2");
INSERT INTO permiso VALUES("6","1","1","1","1","1","0","0","0","0","0","0","0","0","3");
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

INSERT INTO responsable VALUES("087521132","Antonio","Castro","1990-02-08","Soltero/a","Motorista","Bachillerato (Completo)","78562441","Rural","Zacatecoluca");
INSERT INTO responsable VALUES("213654897","Armando Ernesto","Méndez","1970-10-15","Soltero/a","Soldador metélico","Bachillerato (Completo)","23548987","Urbana","Zacatecoluca, La Paz, av");
INSERT INTO responsable VALUES("654897213","Leticia","Mena","1960-10-22","Viudo/a","Ama de casa","Sexto Grado","22556698","Rural","San Salvador, San Salvador");
INSERT INTO responsable VALUES("879546213","Tony","Romas","1998-01-21","Casado/a","Chef","Técnico (Completo)","22558899","Urbana","San Vicente, San Vicente");
SET FOREIGN_KEY_CHECKS=1;

DROP TABLE IF EXISTS tipousuario; SET FOREIGN_KEY_CHECKS=0;

CREATE TABLE `tipousuario` (
  `idtipoUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `idestado` int(11) NOT NULL,
  PRIMARY KEY (`idtipoUsuario`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

INSERT INTO tipousuario VALUES("1","Administrador","1");
INSERT INTO tipousuario VALUES("2","Docente","1");
INSERT INTO tipousuario VALUES("3","soporte tecnico","1");
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

INSERT INTO usuario VALUES("1","051755462","202cb962ac59075b964b07152d234b70","Activo","0","0","2020-12-11 22:09:42","1","1");
INSERT INTO usuario VALUES("4","123456789","df6869f23329652ae501c695cf843b14","Inactivo","0","0","2020-09-05 22:21:51","8","2");
INSERT INTO usuario VALUES("5","123456987","202cb962ac59075b964b07152d234b70","Activo","0","0","2020-09-27 10:45:24","8","4");
INSERT INTO usuario VALUES("6","112233445","a9b3e1f8bb3b5d0056878ab6974ccc3e","Activo","0","0","2020-12-11 20:12:06","3","3");
INSERT INTO usuario VALUES("7","051755463","386d932c6398ca3daa5148f2f4e9e5e2","Activo","0","0","2020-09-25 20:24:05","1","5");
SET FOREIGN_KEY_CHECKS=1;

