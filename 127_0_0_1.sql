-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-11-2020 a las 14:37:47
-- Versión del servidor: 10.1.16-MariaDB
-- Versión de PHP: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_registro_academico`
--
CREATE DATABASE IF NOT EXISTS `bd_registro_academico` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci;
USE `bd_registro_academico`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignatura`
--

CREATE TABLE `asignatura` (
  `idasignatura` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `idestado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `asignatura`
--

INSERT INTO `asignatura` (`idasignatura`, `nombre`, `idestado`) VALUES
(1, 'Matematicas', 1),
(2, 'Lenguaje', 1),
(3, 'Ciencias', 1),
(4, 'Ciencias Sociales', 1),
(5, 'Educacion Informatica', 1),
(6, 'Educacion en la fe', 1),
(7, 'Ingles', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciclo`
--

CREATE TABLE `ciclo` (
  `idciclo` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `idestado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ciclo`
--

INSERT INTO `ciclo` (`idciclo`, `nombre`, `idestado`) VALUES
(1, 'Ciclo I', 1),
(2, 'Ciclo II', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentario`
--

CREATE TABLE `comentario` (
  `idcomentario` int(11) NOT NULL,
  `comentario` varchar(10000) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `comentario`
--

INSERT INTO `comentario` (`idcomentario`, `comentario`, `fecha`) VALUES
(2, 'Solicito desbloqueo de usuario y cambio de contraseña: 123456987', '2020-09-09'),
(4, 'hola\n\n', '2020-09-09'),
(5, 'salu\n\n', '2020-09-09'),
(7, 'Solicito desbloqueo de usuario y cambio de contraseña: 112233445', '2020-09-13'),
(9, 'Solicito desbloqueo de usuario y cambio de contraseña: 051755463', '2020-09-25');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `curriculum`
--

CREATE TABLE `curriculum` (
  `idcurriculum` int(11) NOT NULL,
  `ahnio` year(4) NOT NULL,
  `curriculum` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `iddocente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `curriculum`
--

INSERT INTO `curriculum` (`idcurriculum`, `ahnio`, `curriculum`, `iddocente`) VALUES
(1, 2020, '../img/curriculum/1604242739_IMG_20200815_0002.pdf', 2),
(2, 2020, '../img/curriculum/1604242739_IMG_20200815_0002.pdf', 4),
(3, 2020, '../img/curriculum/1604242739_IMG_20200815_0002.pdf', 4),
(4, 2020, '../img/curriculum/1604242739_IMG_20200815_0002.pdf', 5),
(5, 2020, '../img/curriculum/1604242739_IMG_20200815_0002.pdf', 4),
(6, 2020, '../img/curriculum/1604245417_fauna.docx', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallepago`
--

CREATE TABLE `detallepago` (
  `iddetallePago` int(11) NOT NULL,
  `descripcion` varchar(25) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `estado` varchar(45) DEFAULT NULL,
  `idpago` int(11) NOT NULL,
  `nie` int(11) NOT NULL,
  `idusuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `docente`
--

CREATE TABLE `docente` (
  `iddocente` int(11) NOT NULL,
  `nombres` varchar(45) DEFAULT NULL,
  `apellidos` varchar(45) DEFAULT NULL,
  `direccion` varchar(200) DEFAULT NULL,
  `telefono` varchar(8) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `dui` varchar(9) DEFAULT NULL,
  `nit` varchar(14) DEFAULT NULL,
  `idestado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `docente`
--

INSERT INTO `docente` (`iddocente`, `nombres`, `apellidos`, `direccion`, `telefono`, `email`, `dui`, `nit`, `idestado`) VALUES
(1, 'Emerson', 'Martinez', 'Zacatecoluca', '22556688', 'emer@gmail.com', '051755462', '08210505200015', 1),
(2, 'Yoselin', 'Ramos', 'Zacateculuca', '22558899', 'yoselin@gmail.com', '123456789', '08218978521023', 2),
(3, 'Raul', 'Morales Alonso', 'Zacatecoluca', '22556699', 'raul@gmail.com', '112233445', '12365489784512', 2),
(4, 'Daniel Antonio', 'Anaya Ruiz', 'Santa Ana', '22556688', 'daniel@gmail.com', '123456987', '01235698748595', 1),
(5, 'Silvia Maria', 'Diaz Zavaleta', 'Zacatecoluca colonia Jose Simeon Cañas', '78956254', 'silvia@gmail.com', '051755463', '08212506902010', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `docente_asignatura`
--

CREATE TABLE `docente_asignatura` (
  `iddocenteAsignatura` int(11) NOT NULL,
  `idgradoDocente` int(11) NOT NULL,
  `iddocente` int(11) NOT NULL,
  `idasignatura` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `docente_asignatura`
--

INSERT INTO `docente_asignatura` (`iddocenteAsignatura`, `idgradoDocente`, `iddocente`, `idasignatura`) VALUES
(1, 4, 1, 1),
(2, 4, 1, 2),
(3, 4, 4, 3),
(4, 4, 5, 4),
(5, 4, 5, 5),
(6, 4, 1, 6),
(7, 5, 1, 1),
(8, 5, 1, 2),
(9, 5, 5, 3),
(10, 5, 1, 4),
(11, 5, 5, 5),
(12, 5, 5, 6),
(13, 6, 1, 1),
(14, 6, 4, 2),
(15, 6, 4, 3),
(16, 6, 5, 4),
(17, 6, 1, 5),
(18, 6, 5, 6),
(19, 7, 5, 1),
(20, 7, 5, 2),
(21, 7, 4, 3),
(22, 7, 5, 4),
(23, 7, 1, 5),
(24, 7, 5, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documento`
--

CREATE TABLE `documento` (
  `iddocumento` int(11) NOT NULL,
  `ahnio` year(4) NOT NULL,
  `tipo` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  `documento` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `idusuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `documento`
--

INSERT INTO `documento` (`iddocumento`, `ahnio`, `tipo`, `descripcion`, `documento`, `idusuario`) VALUES
(1, 2019, 'PEA', 'Documento PEA del 2019', '../img/documentos/1604241991_fauna.docx', 1),
(2, 2020, 'Acta de rendicion de cuen', 'Cuentas del centro escolar', '../img/documentos/1604241991_fauna.docx', 1),
(3, 2020, 'Inventario de equipo', 'Equipo del centro escolar', '../img/documentos/1604245637_Honduras.docx', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE `estado` (
  `idestado` int(11) NOT NULL,
  `nombre` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `estado`
--

INSERT INTO `estado` (`idestado`, `nombre`) VALUES
(1, 'Activo'),
(2, 'Inactivo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiante`
--

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
  `duiResponsable` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `estudiante`
--

INSERT INTO `estudiante` (`nie`, `nombres`, `apellidos`, `foto`, `nacimiento`, `genero`, `nacionalidad`, `viveCon`, `parentescoResponsable`, `telefono`, `zona`, `direccion`, `enfermedad`, `alergia`, `idestado`, `duiPadre`, `duiMadre`, `duiResponsable`) VALUES
('205896', 'Israel Antonio', 'Ayala Bonilla', '', '2006-07-21', 'M', 'SalvadoreÃ±a', 'Padre y Madre', 'TÃ­o', '', 'Rural', 'Zacatecoluca', '', '', 1, '698574886', '085223645', '087521132'),
('564587', 'Yoselin', 'Montoya', '', '2012-09-10', 'F', 'Salvadoreña', 'Padre y Madre', 'Tia', '7855687', 'Urbana', 'Zacatecoluca', 'Ninguna', 'Ninguna', 1, '897566231', '889745654', '654897213'),
('655886', 'Alvaro Armando', 'Benitez', '', '2010-08-19', 'M', 'SalvadoreÃ±a', 'Padre y Madre', 'Abuela', '22569856', 'Rural', 'Zacatecoluca, JosÃ© Simeon CaÃ±as', 'Ninguna', 'Alergï¿½a al polvo', 1, '698574123', '789855642', '213654897');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grado`
--

CREATE TABLE `grado` (
  `idgrado` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `idestado` int(11) NOT NULL,
  `idciclo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `grado`
--

INSERT INTO `grado` (`idgrado`, `nombre`, `idestado`, `idciclo`) VALUES
(2, 'Primero', 1, 1),
(3, 'Segundo', 1, 1),
(8, 'Tercero', 1, 1),
(9, 'Cuarto', 1, 2),
(11, 'Quinto', 1, 2),
(12, 'Sexto', 1, 2),
(13, 'Septimo', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grado_docente`
--

CREATE TABLE `grado_docente` (
  `idgradoDocente` int(11) NOT NULL,
  `ahnio` year(4) DEFAULT NULL,
  `turno` varchar(45) DEFAULT NULL,
  `tipo` varchar(45) DEFAULT NULL,
  `guia` int(11) NOT NULL,
  `idgrado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `grado_docente`
--

INSERT INTO `grado_docente` (`idgradoDocente`, `ahnio`, `turno`, `tipo`, `guia`, `idgrado`) VALUES
(1, 2020, 'Matutino', 'Unica', 1, 2),
(2, 2017, 'Matutino', 'Integrada', 5, 8),
(3, 2020, 'Vespertino', 'Integrada', 5, 9),
(4, 2020, 'Vespertino', 'Unica', 1, 8),
(5, 2020, 'Matutino', 'Unica', 1, 12),
(6, 2020, 'Vespertino', 'Integrada', 5, 11),
(7, 2020, 'Vespertino', 'Unica', 4, 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inscripcion`
--

CREATE TABLE `inscripcion` (
  `idinscripcion` int(11) NOT NULL,
  `iddocente_grado` int(11) NOT NULL,
  `idmateria` int(11) NOT NULL,
  `iddocente` int(11) NOT NULL,
  `nie` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `madre`
--

CREATE TABLE `madre` (
  `dui` varchar(9) NOT NULL,
  `nombres` varchar(45) NOT NULL,
  `apellidos` varchar(45) NOT NULL,
  `nacimiento` date NOT NULL,
  `profesion` varchar(45) NOT NULL,
  `telefono` varchar(8) NOT NULL,
  `direccion` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `madre`
--

INSERT INTO `madre` (`dui`, `nombres`, `apellidos`, `nacimiento`, `profesion`, `telefono`, `direccion`) VALUES
('085223645', 'Ana', 'Bermudez', '1985-10-16', 'Contadora PÃºblica', '22559988', 'Zacatecoluca'),
('789855642', 'Sara', 'Miranda', '1993-11-10', 'Ama de casa', '22555589', 'Zacatecoluca'),
('889745654', 'Mirna', 'Pérez', '2000-10-02', 'Psicóloga', '22558897', 'Zacatecoluca La Paz SV');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `matricula`
--

CREATE TABLE `matricula` (
  `idmatricula` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `idgradoDocente` int(11) NOT NULL,
  `nie` int(11) NOT NULL,
  `idestado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `matricula`
--

INSERT INTO `matricula` (`idmatricula`, `fecha`, `idgradoDocente`, `nie`, `idestado`) VALUES
(1, '2020-11-03', 7, 205896, 1),
(3, '2020-11-08', 6, 205896, 1),
(4, '2020-11-10', 7, 564587, 1),
(38, '2020-11-15', 5, 564587, 1),
(39, '2020-11-15', 5, 205896, 1),
(40, '2020-11-15', 5, 655886, 1),
(41, '2020-11-15', 6, 564587, 1),
(42, '2020-11-22', 4, 564587, 1),
(43, '2020-11-22', 4, 655886, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notas`
--

CREATE TABLE `notas` (
  `idnotas` int(11) NOT NULL,
  `primerTrimestre` decimal(10,2) NOT NULL,
  `segundoTrimestre` decimal(10,2) NOT NULL,
  `tercerTrimestre` decimal(10,2) NOT NULL,
  `notaFinal` decimal(10,2) NOT NULL,
  `fecha` date NOT NULL,
  `idasignatura` int(11) NOT NULL,
  `idmatricula` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `notas`
--

INSERT INTO `notas` (`idnotas`, `primerTrimestre`, `segundoTrimestre`, `tercerTrimestre`, `notaFinal`, `fecha`, `idasignatura`, `idmatricula`) VALUES
(10, '7.00', '8.00', '9.00', '8.00', '2020-11-22', 5, 1),
(11, '6.00', '7.00', '8.00', '7.00', '2020-11-22', 5, 4),
(12, '8.00', '9.00', '9.00', '8.50', '2020-11-22', 2, 3),
(13, '7.00', '7.00', '7.00', '7.00', '2020-11-22', 2, 41),
(14, '7.00', '8.00', '9.00', '8.00', '2020-11-22', 1, 43),
(15, '7.00', '9.00', '9.00', '8.00', '2020-11-22', 1, 42),
(16, '7.00', '8.00', '9.00', '8.00', '2020-11-24', 1, 1),
(17, '0.00', '0.00', '0.00', '7.00', '2020-11-24', 1, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `padre`
--

CREATE TABLE `padre` (
  `dui` varchar(9) NOT NULL,
  `nombres` varchar(45) NOT NULL,
  `apellidos` varchar(45) NOT NULL,
  `nacimiento` date NOT NULL,
  `profesion` varchar(45) NOT NULL,
  `telefono` varchar(8) NOT NULL,
  `direccion` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `padre`
--

INSERT INTO `padre` (`dui`, `nombres`, `apellidos`, `nacimiento`, `profesion`, `telefono`, `direccion`) VALUES
('698574123', 'Aldo', 'Ramirez  Mendez', '1970-08-14', 'Profesor', '78556997', 'Col. el progreso, Zacatecoluca, La Paz'),
('698574886', 'Ramiro', 'Mendez', '1982-08-13', 'AlbaÃ±il', '23556699', 'Zacatecoluca'),
('897566231', 'Mario', 'Anaya', '1990-10-16', 'Operario', '78995589', 'Calle principal Zacatecoluca, La Paz');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pago`
--

CREATE TABLE `pago` (
  `idpago` int(11) NOT NULL,
  `nombre` varchar(25) DEFAULT NULL,
  `año` year(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permiso`
--

CREATE TABLE `permiso` (
  `idpermiso` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisousuario`
--

CREATE TABLE `permisousuario` (
  `idpermisoUsuario` int(11) NOT NULL,
  `idpermiso` int(11) NOT NULL,
  `idtipoUsuario` int(11) NOT NULL,
  `valor` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `responsable`
--

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
  `direccion` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `responsable`
--

INSERT INTO `responsable` (`dui`, `nombres`, `apellidos`, `nacimiento`, `estadoCivil`, `profesion`, `ultimoGrado`, `telefono`, `zona`, `direccion`) VALUES
('087521132', 'Antonio', 'Castro', '1990-02-08', 'Soltero/a', 'Motorista', 'Bachillerato (Completo)', '78562441', 'Rural', 'Zacatecoluca'),
('213654897', 'Armando Ernesto', 'Méndez', '1970-10-15', 'Soltero/a', 'Soldador metélico', 'Bachillerato (Completo)', '23548987', 'Urbana', 'Zacatecoluca, La Paz, av'),
('654897213', 'Leticia', 'Mena', '1960-10-22', 'Viudo/a', 'Ama de casa', 'Sexto Grado', '22556698', 'Rural', 'San Salvador, San Salvador'),
('879546213', 'Tony', 'Romas', '1998-01-21', 'Casado/a', 'Chef', 'Técnico (Completo)', '22558899', 'Urbana', 'San Vicente, San Vicente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipousuario`
--

CREATE TABLE `tipousuario` (
  `idtipoUsuario` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `idestado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipousuario`
--

INSERT INTO `tipousuario` (`idtipoUsuario`, `nombre`, `idestado`) VALUES
(1, 'Administrador', 1),
(2, 'Docente', 1),
(8, 'soporte', 1),
(12, 'secretaria', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idusuario` int(11) NOT NULL,
  `usuario` varchar(45) DEFAULT NULL,
  `clave` varchar(45) DEFAULT NULL,
  `estado` varchar(15) DEFAULT NULL,
  `intentos` char(1) DEFAULT NULL,
  `bloqueado` char(1) DEFAULT NULL,
  `ultimoIngreso` datetime DEFAULT NULL,
  `idtipoUsuario` int(11) NOT NULL,
  `iddocente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idusuario`, `usuario`, `clave`, `estado`, `intentos`, `bloqueado`, `ultimoIngreso`, `idtipoUsuario`, `iddocente`) VALUES
(1, '051755462', '202cb962ac59075b964b07152d234b70', 'Activo', '0', '0', '2020-11-29 07:31:44', 1, 1),
(4, '123456789', 'df6869f23329652ae501c695cf843b14', 'Inactivo', '0', '0', '2020-09-05 22:21:51', 8, 2),
(5, '123456987', '202cb962ac59075b964b07152d234b70', 'Activo', '0', '0', '2020-09-27 10:45:24', 8, 4),
(6, '112233445', '202cb962ac59075b964b07152d234b70', 'Inactivo', '0', '0', '2020-09-23 16:50:32', 2, 3),
(7, '051755463', '386d932c6398ca3daa5148f2f4e9e5e2', 'Activo', '0', '0', '2020-09-25 20:24:05', 1, 5);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `asignatura`
--
ALTER TABLE `asignatura`
  ADD PRIMARY KEY (`idasignatura`);

--
-- Indices de la tabla `ciclo`
--
ALTER TABLE `ciclo`
  ADD PRIMARY KEY (`idciclo`);

--
-- Indices de la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD PRIMARY KEY (`idcomentario`);

--
-- Indices de la tabla `curriculum`
--
ALTER TABLE `curriculum`
  ADD PRIMARY KEY (`idcurriculum`);

--
-- Indices de la tabla `detallepago`
--
ALTER TABLE `detallepago`
  ADD PRIMARY KEY (`iddetallePago`,`idpago`,`nie`,`idusuario`);

--
-- Indices de la tabla `docente`
--
ALTER TABLE `docente`
  ADD PRIMARY KEY (`iddocente`);

--
-- Indices de la tabla `docente_asignatura`
--
ALTER TABLE `docente_asignatura`
  ADD PRIMARY KEY (`iddocenteAsignatura`);

--
-- Indices de la tabla `documento`
--
ALTER TABLE `documento`
  ADD PRIMARY KEY (`iddocumento`);

--
-- Indices de la tabla `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`idestado`);

--
-- Indices de la tabla `estudiante`
--
ALTER TABLE `estudiante`
  ADD PRIMARY KEY (`nie`,`duiResponsable`);

--
-- Indices de la tabla `grado`
--
ALTER TABLE `grado`
  ADD PRIMARY KEY (`idgrado`,`idciclo`);

--
-- Indices de la tabla `grado_docente`
--
ALTER TABLE `grado_docente`
  ADD PRIMARY KEY (`idgradoDocente`,`guia`,`idgrado`);

--
-- Indices de la tabla `inscripcion`
--
ALTER TABLE `inscripcion`
  ADD PRIMARY KEY (`idinscripcion`,`iddocente_grado`,`idmateria`,`iddocente`,`nie`);

--
-- Indices de la tabla `madre`
--
ALTER TABLE `madre`
  ADD PRIMARY KEY (`dui`);

--
-- Indices de la tabla `matricula`
--
ALTER TABLE `matricula`
  ADD PRIMARY KEY (`idmatricula`);

--
-- Indices de la tabla `notas`
--
ALTER TABLE `notas`
  ADD PRIMARY KEY (`idnotas`);

--
-- Indices de la tabla `padre`
--
ALTER TABLE `padre`
  ADD PRIMARY KEY (`dui`);

--
-- Indices de la tabla `pago`
--
ALTER TABLE `pago`
  ADD PRIMARY KEY (`idpago`);

--
-- Indices de la tabla `permiso`
--
ALTER TABLE `permiso`
  ADD PRIMARY KEY (`idpermiso`);

--
-- Indices de la tabla `permisousuario`
--
ALTER TABLE `permisousuario`
  ADD PRIMARY KEY (`idpermisoUsuario`,`idpermiso`,`idtipoUsuario`);

--
-- Indices de la tabla `responsable`
--
ALTER TABLE `responsable`
  ADD PRIMARY KEY (`dui`);

--
-- Indices de la tabla `tipousuario`
--
ALTER TABLE `tipousuario`
  ADD PRIMARY KEY (`idtipoUsuario`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idusuario`,`idtipoUsuario`,`iddocente`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `asignatura`
--
ALTER TABLE `asignatura`
  MODIFY `idasignatura` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `ciclo`
--
ALTER TABLE `ciclo`
  MODIFY `idciclo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `comentario`
--
ALTER TABLE `comentario`
  MODIFY `idcomentario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `curriculum`
--
ALTER TABLE `curriculum`
  MODIFY `idcurriculum` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `detallepago`
--
ALTER TABLE `detallepago`
  MODIFY `iddetallePago` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `docente`
--
ALTER TABLE `docente`
  MODIFY `iddocente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `docente_asignatura`
--
ALTER TABLE `docente_asignatura`
  MODIFY `iddocenteAsignatura` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT de la tabla `documento`
--
ALTER TABLE `documento`
  MODIFY `iddocumento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `estado`
--
ALTER TABLE `estado`
  MODIFY `idestado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `grado`
--
ALTER TABLE `grado`
  MODIFY `idgrado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT de la tabla `grado_docente`
--
ALTER TABLE `grado_docente`
  MODIFY `idgradoDocente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `inscripcion`
--
ALTER TABLE `inscripcion`
  MODIFY `idinscripcion` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `matricula`
--
ALTER TABLE `matricula`
  MODIFY `idmatricula` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
--
-- AUTO_INCREMENT de la tabla `notas`
--
ALTER TABLE `notas`
  MODIFY `idnotas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT de la tabla `pago`
--
ALTER TABLE `pago`
  MODIFY `idpago` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `permiso`
--
ALTER TABLE `permiso`
  MODIFY `idpermiso` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `permisousuario`
--
ALTER TABLE `permisousuario`
  MODIFY `idpermisoUsuario` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tipousuario`
--
ALTER TABLE `tipousuario`
  MODIFY `idtipoUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
