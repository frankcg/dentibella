-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-07-2022 a las 20:08:43
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `dentibella`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `citas`
--

CREATE TABLE `citas` (
  `id_cita` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_paciente` int(11) NOT NULL,
  `id_doctor` int(11) NOT NULL,
  `fecha_cita` date NOT NULL,
  `hora_cita` time NOT NULL,
  `sintoma_uno` int(11) DEFAULT NULL,
  `sintoma_dos` int(11) DEFAULT NULL,
  `diagnostico` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tiempo` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `estado_cita` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `hora_atendido` time DEFAULT NULL,
  `hora_espera` time DEFAULT NULL,
  `hora_en_atencion` time DEFAULT NULL,
  `hora_ausente` time DEFAULT NULL,
  `monto` int(11) DEFAULT NULL,
  `estado_pago` int(11) DEFAULT NULL,
  `tipo` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fecha_creacion` date NOT NULL,
  `fecha_modificacion` date DEFAULT NULL,
  `fecha_eliminacion` date DEFAULT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `citas`
--

INSERT INTO `citas` (`id_cita`, `id_usuario`, `id_paciente`, `id_doctor`, `fecha_cita`, `hora_cita`, `sintoma_uno`, `sintoma_dos`, `diagnostico`, `tiempo`, `estado_cita`, `hora_atendido`, `hora_espera`, `hora_en_atencion`, `hora_ausente`, `monto`, `estado_pago`, `tipo`, `fecha_creacion`, `fecha_modificacion`, `fecha_eliminacion`, `estado`) VALUES
(1, 1, 1, 1, '2022-05-13', '08:16:22', 1, 3, 'Abertura en el diente', NULL, '4', '03:50:37', '00:49:25', '19:01:04', NULL, NULL, 1, NULL, '2022-05-05', NULL, NULL, 1),
(2, 2, 2, 1, '2022-05-13', '05:30:00', 2, 4, 'Caries', NULL, '4', '00:50:58', '00:50:52', '19:04:59', NULL, 212122, NULL, 'Efectivo', '2022-05-07', '2022-07-16', NULL, 1),
(3, 1, 3, 2, '2022-06-01', '20:32:00', 2, 4, 'Boca Sucia', NULL, '3', '21:11:22', NULL, NULL, NULL, NULL, 1, NULL, '2022-05-16', NULL, NULL, 1),
(4, 1, 4, 2, '2022-05-13', '12:10:00', 2, 4, 'Boca Sucia', NULL, '3', '22:12:16', NULL, NULL, NULL, NULL, NULL, NULL, '2022-05-17', NULL, NULL, 1),
(5, 1, 4, 2, '2022-05-19', '11:09:00', 1, 4, 'Sarro en los dientes', NULL, '5', '00:50:42', '00:49:36', '12:49:40', '00:43:08', NULL, NULL, NULL, '2022-05-20', NULL, NULL, 1),
(6, 2, 7, 2, '2022-05-21', '03:44:00', 2, 3, 'Diente Podrido', NULL, '3', '15:15:54', NULL, NULL, NULL, NULL, NULL, NULL, '2022-05-21', NULL, NULL, 1),
(7, 1, 5, 2, '2022-06-22', '07:15:00', 1, 2, NULL, NULL, '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-06-29', NULL, NULL, 1),
(8, 1, 1, 1, '2022-06-08', '21:19:00', 2, 1, NULL, NULL, '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-06-29', NULL, NULL, 1),
(14, 1, 4, 1, '2022-06-23', '03:25:00', 27, 28, 'diente con edodoncia', NULL, '3', '22:48:46', NULL, NULL, NULL, NULL, NULL, NULL, '2022-06-29', NULL, NULL, 1),
(15, 1, 1, 1, '2022-06-26', '03:46:00', 1, 2, 'periodontitis', NULL, '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-15', NULL, NULL, 1),
(19, 1, 10, 1, '2022-06-26', '07:49:00', 1, 2, 'periodontitis', NULL, '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-16', NULL, NULL, 1),
(30, 1, 3, 1, '2022-07-13', '22:57:00', NULL, NULL, '', '', '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-16', NULL, NULL, 1),
(31, 1, 2, 1, '2022-07-19', '21:59:00', 0, 0, '', '', '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-16', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `doctor`
--

CREATE TABLE `doctor` (
  `id_doctor` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `nombres` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `apellidos` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `especialidad` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `dni` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `fecha_creacion` date NOT NULL,
  `fecha_modificacion` date DEFAULT NULL,
  `fecha_eliminacion` date DEFAULT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `doctor`
--

INSERT INTO `doctor` (`id_doctor`, `id_usuario`, `nombres`, `apellidos`, `especialidad`, `dni`, `fecha_nacimiento`, `fecha_creacion`, `fecha_modificacion`, `fecha_eliminacion`, `estado`) VALUES
(1, 1, 'testttt', 'prueba', 'Cirujano', '34545', '2022-05-10', '2022-05-05', NULL, NULL, 1),
(2, 1, 'demos', 'test', 'test', '45767676', '2022-05-01', '2022-05-14', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historias`
--

CREATE TABLE `historias` (
  `id_historia` int(11) NOT NULL,
  `id_cita` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `archivo` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `comentario` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `diente` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `check1` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `check2` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `check3` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `check4` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `check5` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `check6` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `check7` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `check8` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `check9` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `check10` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `check11` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `check12` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `check13` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `fecha_creacion` date NOT NULL,
  `fecha_modificacion` date DEFAULT NULL,
  `fecha_eliminacion` date DEFAULT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `historias`
--

INSERT INTO `historias` (`id_historia`, `id_cita`, `id_usuario`, `archivo`, `comentario`, `diente`, `check1`, `check2`, `check3`, `check4`, `check5`, `check6`, `check7`, `check8`, `check9`, `check10`, `check11`, `check12`, `check13`, `fecha_creacion`, `fecha_modificacion`, `fecha_eliminacion`, `estado`) VALUES
(1, 1, 2, '7.1 - Say Yes To Mess.pdf', 'vcvcvcvcvcv', '18', 'Diente Ausente', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '2022-05-20', NULL, NULL, 1),
(2, 2, 2, 'PROJECT INT 7.pptx', 'xcxcxc', '48', '0', '0', '0', '0', '0', '0', '0', 'Corona en mal estado', '0', '0', '0', '0', '0', '2022-05-20', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pacientes`
--

CREATE TABLE `pacientes` (
  `id_paciente` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `nombres` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `apellidos` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `dni` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `telefono` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `direccion` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `enfermedad` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `persona` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `fecha_creacion` date NOT NULL,
  `fecha_modificacion` date DEFAULT NULL,
  `fecha_eliminacion` date DEFAULT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `pacientes`
--

INSERT INTO `pacientes` (`id_paciente`, `id_usuario`, `nombres`, `apellidos`, `dni`, `telefono`, `direccion`, `fecha_nacimiento`, `enfermedad`, `persona`, `fecha_creacion`, `fecha_modificacion`, `fecha_eliminacion`, `estado`) VALUES
(1, 1, 'demo', 'test', '123456', '455454', 'demooooooo', '2022-05-02', 'Presion arterial alta', 'Adulto Joven', '2022-05-04', NULL, NULL, 1),
(2, 1, 'test', 'test', '4333', '5656', 'test', '2022-05-04', 'Diabetes', 'Bebé', '2022-05-05', NULL, NULL, 1),
(3, 1, 'prueba', 'prueba', '11122', '3677', 'prueba', '2022-05-11', 'Problemas cardiacos', 'Adulto Joven', '2022-05-06', NULL, NULL, 1),
(4, 1, 'po', 'po', '123456', '5656566', 'fddf', '2022-05-05', NULL, 'Adulto Joven', '2022-05-03', NULL, NULL, 1),
(5, 1, 'erer', 'rere', '565634', '22111', 'ree', '2022-05-17', 'Especiales', 'Bebé', '2022-05-04', NULL, '2022-07-15', 0),
(6, 1, 'dfdf', 'fdf', '565634', '34343', 'fdfdf', '2022-05-09', 'Hemofilia', 'Adulto Joven', '2022-05-05', NULL, NULL, 1),
(7, 1, 'wewe', 'cvcv', '90455', '445', 'erere', '2022-05-03', 'Epilecticos', 'Adulto Joven', '2022-05-04', NULL, '2022-07-15', 0),
(8, 1, 'bryan', 'luis', '54445', '98981212', 'tressss', '2022-06-26', 'Ninguna Enfermedad', 'Adulto Joven', '2022-07-08', NULL, '2022-07-15', 0),
(9, 1, 'otro', 'otro', '8553434', '64221346565', 'otroooo', '1999-03-28', 'Alergia a la anestesia', 'Adulto Joven', '2022-07-15', NULL, NULL, 1),
(10, 1, 'as', 'as', '0435123124', '128776', 'as', '2019-01-29', NULL, 'Bebé', '2022-07-15', NULL, NULL, 1),
(11, 1, 'qw', 'qw', '6576576', '4546556', 'xzxzxzxz', '2022-06-27', NULL, 'Bebé', '2022-07-15', NULL, '2022-07-15', 0),
(12, 1, 'we', 'we', '232323', '768221', 'we', '2018-01-30', '0', 'Bebé', '2022-07-15', NULL, NULL, 1),
(14,1,'Pedro','Tenazoa','70396128','929914776','Calle los Jazmines','1990-01-01','Presion arterial alta','32','2022-03-01',NULL,NULL,1),
(15,1,'Juan','Perez','71337582','999555444','Camino real','1990-07-29','Diabetes','31','2022-03-01',NULL,NULL,1),
(16,1,'Juan','Perez','71337582','999555444','Camino real','1990-03-21','Diabetes','32','2022-03-01',NULL,NULL,1),
(17,1,'Pedro','Tenazoa','70396128','929914776','Calle los Jazmines','1986-02-10','Presion arterial alta','36','2022-03-01',NULL,NULL,1),
(18,1,'Juan','Perez','71337582','999555444','Camino real','1950-06-09','Diabetes','72','2022-03-01',NULL,NULL,1),
(19,1,'Juan','Perez','71337582','999555444','Camino real','1995-08-18','Diabetes','26','2022-03-01',NULL,NULL,1),
(20,1,'Pedro','Tenazoa','70396128','929914776','Calle los Jazmines','1995-08-19','Presion arterial alta','26','2022-03-01',NULL,NULL,1),
(21,1,'Juan','Perez','71337582','999555444','Camino real','1993-05-30','Diabetes','29','2022-03-01',NULL,NULL,1),
(22,1,'Rajhut','Fernandez','70235689','987654321','Los angeles','1992-01-21','Problemas cardiacos','30','2022-03-02',NULL,NULL,1),
(23,1,'Luis','Flores','75002222','985321654','Los incas','1992-09-27','Ninguna enfermedad','29','2022-03-02',NULL,NULL,1),
(24,1,'Rajhut','Fernandez','70235689','987654321','Los angeles','1974-05-10','Problemas cardiacos','48','2022-03-02',NULL,NULL,1),
(25,1,'Luis','Flores','75002222','985321654','Los incas','1991-06-29','Ninguna enfermedad','31','2022-03-02',NULL,NULL,1),
(26,1,'Rajhut','Fernandez','70235689','987654321','Los angeles','1975-11-26','Problemas cardiacos','46','2022-03-02',NULL,NULL,1),
(27,1,'Luis','Flores','75002222','985321654','Los incas','1975-03-31','Ninguna enfermedad','47','2022-03-02',NULL,NULL,1),
(28,1,'Rajhut','Fernandez','70235689','987654321','Los angeles','1975-04-01','Problemas cardiacos','47','2022-03-02',NULL,NULL,1),
(29,1,'Luis','Flores','75002222','985321654','Los incas','1975-08-02',NULL,'46','2022-03-02',NULL,NULL,1),
(30,1,'Alberto','Julca','76232341','987254123','Los incas','1982-04-01','Hemofilia','40','2022-03-03',NULL,NULL,1),
(31,1,'Renzo','Sanchez','70369456','963852741','San miguelito','1983-11-06','Alergia a la anestesia','38','2022-03-03',NULL,NULL,1),
(32,1,'Bryan','Cueva','71365544','963987951','Callao','1985-04-25','Ninguna enfermedad','37','2022-03-03',NULL,NULL,1),
(33,1,'Christian','Valdivia','10492255','987963124','Callao','1980-01-01','Ninguna enfermedad','42','2022-03-03',NULL,NULL,1),
(34,1,'Christian','Valdivia','10492255','987963124','Callao','2000-05-01','Ninguna enfermedad','22','2022-03-03',NULL,NULL,1),
(35,1,'Bryan','Cueva','71365544','963987951','Callao','2001-04-05','Ninguna enfermedad','21','2022-03-03',NULL,NULL,1),
(36,1,'Alberto','Julca','76232341','987254123','Los incas','1992-07-24','Hemofilia','29','2022-03-03',NULL,NULL,1),
(37,1,'Jhonny','Santos','79525634','999256236','Alfredo mendiola','1996-09-17','Ninguna enfermedad','25','2022-03-04',NULL,NULL,1),
(38,1,'Antonio','Cotrina','71224458','999222317','san martin de porres','1996-12-06','Presion arterial alta','25','2022-03-04',NULL,NULL,1),
(39,1,'Luis','Pelaez','71245258','986930147','Los incas','1996-02-20','Epilecticos','26','2022-03-04',NULL,NULL,1),
(40,1,'Luis','Pelaez','71245258','986930147','Los incas','1989-10-17','Epilecticos','32','2022-03-04',NULL,NULL,1),
(41,1,'Luis','Pelaez','71245258','986930147','Los incas','1989-12-16','Epilecticos','32','2022-03-04',NULL,NULL,1),
(42,1,'Antonio','Cotrina','71224458','999222317','san martin de porres','1990-03-01','Presion arterial alta','32','2022-03-04',NULL,NULL,1),
(43,1,'Luis','Pelaez','71245258','986930147','Los incas','1990-01-01','Epilecticos','32','2022-03-04',NULL,NULL,1),
(44,1,'Antonio','Cotrina','71224458','999222317','san martin de porres','1992-07-09','Presion arterial alta','30','2022-03-04',NULL,NULL,1),
(45,1,'Luis','Flores','75002222','985321654','Los incas','1997-01-11','Ninguna enfermedad','25','2022-03-05',NULL,NULL,1),
(46,1,'Rajhut','Fernandez','70235689','987654321','Los angeles','1984-08-28','Problemas cardiacos','37','2022-03-05',NULL,NULL,1),
(47,1,'Christian','Valdivia','10492255','987963124','Callao','1973-03-11','Ninguna enfermedad','49','2022-03-05',NULL,NULL,1),
(48,1,'Bryan','Cueva','71365544','963987951','Callao','1973-05-20','Ninguna enfermedad','49','2022-03-05',NULL,NULL,1),
(49,1,'Alberto','Julca','76232341','987254123','Los incas','1976-07-19','Hemofilia','46','2022-03-05',NULL,NULL,1),
(50,1,'Jhonny','Santos','79525634','999256236','Alfredo mendiola','2000-04-10','Ninguna enfermedad','22','2022-03-05',NULL,NULL,1),
(51,1,'Antonio','Cotrina','71224458','999222317','san martin de porres','2002-07-29','Presion arterial alta','19','2022-03-05',NULL,NULL,1),
(52,1,'Cristopher','De la Cruz','72584586','987102986','Calle las aduanas','2002-03-21','Presion arterial alta','20','2022-03-07',NULL,NULL,1),
(53,1,'Jose','Milla','80125458','983963974','san martin de porres','2001-02-10','Hemofilia','21','2022-03-07',NULL,NULL,1),
(54,1,'Gian','Fernandez','11525522','920967981','Callao','2001-06-09','Diabetes','21','2022-03-07',NULL,NULL,1),
(55,1,'Juan','Perez','71337582','999555444','Camino real','2000-08-18','Diabetes','21','2022-03-07',NULL,NULL,1),
(56,1,'Christian','Valdivia','10492255','987963124','Callao','1998-09-07','Ninguna enfermedad','23','2022-03-07',NULL,NULL,1),
(57,1,'Alberto','Julca','76232341','987254123','Los incas','1998-05-30','Hemofilia','24','2022-03-07',NULL,NULL,1),
(58,1,'Cristopher','De la Cruz','72584586','987102986','Calle las aduanas','1998-01-21',NULL,'24','2022-03-07',NULL,NULL,1),
(59,1,'Bruno','Rojas','40526388','983986989','Callao','1999-09-27','Ninguna enfermedad','22','2022-03-08',NULL,NULL,1),
(60,1,'Antonio','Cotrina','71224458','999222317','san martin de porres','1999-05-10','Presion arterial alta','23','2022-03-08',NULL,NULL,1),
(61,1,'Luis','Pelaez','71245258','986930147','Los incas','1994-06-29','Epilecticos','28','2022-03-08',NULL,NULL,1),
(62,1,'Bryan','Cueva','71365544','963987951','Callao','1994-11-26','Ninguna enfermedad','27','2022-03-08',NULL,NULL,1),
(63,1,'Alberto','Julca','76232341','987254123','Los incas','1994-03-31','Hemofilia','28','2022-03-08',NULL,NULL,1),
(64,1,'Christian','Valdivia','10492255','987963124','Callao','1950-01-31','Ninguna enfermedad','72','2022-03-08',NULL,NULL,1),
(65,1,'Cristopher','De la Cruz','72584586','987102986','Calle las aduanas','1979-10-27','Presion arterial alta','42','2022-03-08',NULL,NULL,1),
(66,1,'Bryand','Arroyo','41225563','920967981','Alfredo mendiola','1965-11-06',NULL,'56','2022-03-09',NULL,NULL,1),
(67,1,'Ricardo','Sanchez','41023658','940967988','San bartolo','2013-10-07','Epilecticos','8','2022-03-09',NULL,NULL,1),
(68,1,'Pedro','Tenazoa','70396128','929914776','Calle los Jazmines','2013-04-20','Presion arterial alta','9','2022-03-09',NULL,NULL,1),
(69,1,'Juan','Perez','71337582','999555444','Camino real','2012-07-29','Diabetes','9','2022-03-09',NULL,NULL,1),
(70,1,'Luis','Flores','75002222','985321654','Los incas','2012-03-21','Ninguna enfermedad','10','2022-03-09',NULL,NULL,1),
(71,1,'Rajhut','Fernandez','70235689','987654321','Los angeles','2012-02-10','Problemas cardiacos','10','2022-03-09',NULL,NULL,1),
(72,1,'Bryan','Cueva','71365544','963987951','Callao','2016-06-09','Ninguna enfermedad','6','2022-03-09',NULL,NULL,1),
(73,1,'Alberto','Julca','76232341','987254123','Los incas','2016-11-19','Hemofilia','5','2022-03-09',NULL,NULL,1),
(74,1,'Juan','Perez','71337582','999555444','Camino real','2016-09-07','Diabetes','5','2022-03-10',NULL,NULL,1),
(75,1,'Pedro','Tenazoa','70396128','929914776','Calle los Jazmines','2015-05-30',NULL,'7','2022-03-10',NULL,NULL,1),
(76,1,'Rajhut','Fernandez','70235689','987654321','Los angeles','2015-01-21','Problemas cardiacos','7','2022-03-10',NULL,NULL,1),
(77,1,'Bryan','Cueva','71365544','963987951','Callao','2015-09-27','Ninguna enfermedad','6','2022-03-10',NULL,NULL,1),
(78,1,'Bruno','Rojas','40526388','983986989','Callao','2000-05-10','Ninguna enfermedad','22','2022-03-10',NULL,NULL,1),
(79,1,'Antonio','Cotrina','71224458','999222317','san martin de porres','2000-06-29','Presion arterial alta','22','2022-03-10',NULL,NULL,1),
(80,1,'Luis','Pelaez','71245258','986930147','Los incas','1992-11-26','Epilecticos','29','2022-03-10',NULL,NULL,1),
(81,1,'Bryan','Cueva','71365544','963987951','Callao','1992-03-31','Ninguna enfermedad','30','2022-03-10',NULL,NULL,1),
(82,1,'Ricardo','Sanchez','41023658','940967988','San bartolo','2010-08-08','Epilecticos','11','2022-03-11',NULL,NULL,1),
(83,1,'Alfonso','Betancur','48256325','930967987','Callao','1983-01-31','Presion arterial alta','39','2022-03-11',NULL,NULL,1),
(84,1,'Luis','Flores','75002222','985321654','Los incas','1983-10-27',NULL,'38','2022-03-11',NULL,NULL,1),
(85,1,'Rajhut','Fernandez','70235689','987654321','Los angeles','2006-11-06','Problemas cardiacos','15','2022-03-11',NULL,NULL,1),
(86,1,'Antonio','Cotrina','71224458','999222317','san martin de porres','2006-10-07','Presion arterial alta','15','2022-03-11',NULL,NULL,1),
(87,1,'Luis','Pelaez','71245258','986930147','Los incas','2006-04-20','Epilecticos','16','2022-03-11',NULL,NULL,1),
(88,1,'Ricardo','Sanchez','41023658','940967988','San bartolo','1999-11-16','Epilecticos','22','2022-03-11',NULL,NULL,1),
(89,1,'Mauel','Alcala','10789642','920967987','San bartolo','2000-06-19','Alergia a la anestesia','22','2022-03-12',NULL,NULL,1),
(90,1,'Erik','Asmat','10204563','920967985','Alfredo mendiola','1990-04-30','Alergia a la anestesia','32','2022-03-12',NULL,NULL,1),
(91,1,'Pedro','Tenazoa','70396128','929914776','Calle los Jazmines','2001-09-17','Presion arterial alta','20','2022-03-12',NULL,NULL,1),
(92,1,'Juan','Perez','71337582','999555444','Camino real','1987-12-06','Diabetes','34','2022-03-12',NULL,NULL,1),
(93,1,'Cristopher','De la Cruz','72584586','987102986','Calle las aduanas','1988-02-20','Presion arterial alta','34','2022-03-12',NULL,NULL,1),
(94,1,'Jose','Milla','80125458','983963974','san martin de porres','1990-10-17','Hemofilia','31','2022-03-12',NULL,NULL,1),
(95,1,'Rajhut','Fernandez','70235689','987654321','Los angeles','1988-12-16','Problemas cardiacos','33','2022-03-12',NULL,NULL,1),
(96,1,'Bryan','Cueva','71365544','963987951','Callao','1985-03-01','Ninguna enfermedad','37','2022-03-12',NULL,NULL,1),
(97,1,'Daniel','Aguirre','70123654','920967982','Los incas','1985-01-01','Diabetes','37','2022-03-14',NULL,NULL,1),
(98,1,'Pedro','Tenazoa','70396128','929914776','Calle los Jazmines','2002-07-09','Presion arterial alta','20','2022-03-14',NULL,NULL,1),
(99,1,'Juan','Perez','71337582','999555444','Camino real','2013-01-11','Diabetes','9','2022-03-14',NULL,NULL,1),
(100,1,'Alberto','Julca','76232341','987254123','Los incas','2013-08-28','Hemofilia','8','2022-03-14',NULL,NULL,1),
(101,1,'Christian','Valdivia','10492255','987963124','Callao','2013-03-11','Ninguna enfermedad','9','2022-03-14',NULL,NULL,1),
(102,1,'Alfonso','Betancur','48256325','930967987','Callao','2015-05-20','Presion arterial alta','7','2022-03-14',NULL,NULL,1),
(103,1,'Luis','Flores','75002222','985321654','Los incas','1997-07-19','Ninguna enfermedad','25','2022-03-14',NULL,NULL,1),
(104,1,'Ricardo','Montenegro','41235874','987967981','Calle las aduanas','2011-04-10',NULL,'11','2022-03-15',NULL,NULL,1),
(105,1,'David','Aguirre','41005555','920967981','Izaguiire','1992-09-27','Presion arterial alta','29','2022-03-15',NULL,NULL,1),
(106,1,'Pedro','Tenazoa','70396128','929914776','Calle los Jazmines','1974-05-10','Presion arterial alta','48','2022-03-15',NULL,NULL,1),
(107,1,'Juan','Perez','71337582','999555444','Camino real','1991-06-29','Diabetes','31','2022-03-15',NULL,NULL,1),
(108,1,'Luis','Flores','75002222','985321654','Los incas','1975-11-26','Ninguna enfermedad','46','2022-03-15',NULL,NULL,1),
(109,1,'Rajhut','Fernandez','70235689','987654321','Los angeles','1975-03-31','Problemas cardiacos','47','2022-03-15',NULL,NULL,1),
(110,1,'Bryan','Cueva','71365544','963987951','Callao','1975-04-01','Ninguna enfermedad','47','2022-03-15',NULL,NULL,1),
(111,1,'Daniel','Aguirre','70123654','920967982','Los incas','1975-08-02','Diabetes','46','2022-03-15',NULL,NULL,1),
(112,1,'Elias','Aguirre','22554488','987963952','Callao','1982-04-01','anemia o hemoglobina muy baja','40','2022-03-16',NULL,NULL,1),
(113,1,'Pedro','Tenazoa','70396128','929914776','Calle los Jazmines','1983-11-06','Presion arterial alta','38','2022-03-16',NULL,NULL,1),
(114,1,'Juan','Perez','71337582','999555444','Camino real','1985-04-25','Diabetes','37','2022-03-16',NULL,NULL,1),
(115,1,'Rajhut','Fernandez','70235689','987654321','Los angeles','1980-01-01','Problemas cardiacos','42','2022-03-16',NULL,NULL,1),
(116,1,'Luis','Flores','75002222','985321654','Los incas','2000-05-01','Ninguna enfermedad','22','2022-03-16',NULL,NULL,1),
(117,1,'Christian','Valdivia','10492255','987963124','Callao','2001-04-05','Ninguna enfermedad','21','2022-03-16',NULL,NULL,1),
(118,1,'Cristopher','De la Cruz','72584586','987102986','Calle las aduanas','1992-07-24','Presion arterial alta','29','2022-03-16',NULL,NULL,1),
(119,1,'Bryand','Arroyo','41225563','920967981','Alfredo mendiola','1996-09-17','Especiales','25','2022-03-16',NULL,NULL,1),
(120,1,'Ivan','Flores','25841325','910970980','san martin de porres','1996-12-06','Especiales','25','2022-03-17',NULL,NULL,1),
(121,1,'Freddy','Julca','52545264','940950960','Calle las aduanas','1996-02-20','Epilecticos','26','2022-03-17',NULL,NULL,1),
(122,1,'Damian','Mullisaca','23564825','930920910','Alfredo mendiola','1989-10-17','Ninguna enfermedad','32','2022-03-17',NULL,NULL,1),
(123,1,'Ricardo','Sanchez','41023658','940967988','San bartolo','1989-12-16','Epilecticos','32','2022-03-17',NULL,NULL,1),
(124,1,'Alfonso','Betancur','48256325','930967987','Callao','1990-03-01','Presion arterial alta','32','2022-03-17',NULL,NULL,1),
(125,1,'Luis','Flores','75002222','985321654','Los incas','1990-01-01',NULL,'32','2022-03-17',NULL,NULL,1),
(126,1,'Erik','Asmat','10204563','920967985','Alfredo mendiola','1992-07-09','Alergia a la anestesia','30','2022-03-17',NULL,NULL,1),
(127,1,'Pedro','Tenazoa','70396128','929914776','Calle los Jazmines','1997-01-11','Presion arterial alta','25','2022-03-17',NULL,NULL,1),
(128,1,'Juan','Gonzales','70219978','980960961','san martin de porres','1984-08-28','Alergia a la anestesia','37','2022-03-18',NULL,NULL,1),
(129,1,'Pedro','Gonzales','70376998','963941920','Callao','1973-03-11','anemia o hemoglobina muy baja','49','2022-03-18',NULL,NULL,1),
(130,1,'Carlos','Rodriguez','71002211','990967974','Callao','1973-05-20','Presion arterial alta','49','2022-03-18',NULL,NULL,1),
(131,1,'Jose','Milla','80125458','983963974','san martin de porres','1976-07-19',NULL,'46','2022-03-18',NULL,NULL,1),
(132,1,'Gian','Fernandez','11525522','920967981','Callao','1960-04-10','Diabetes','62','2022-03-18',NULL,NULL,1),
(133,1,'Juan','Perez','71337582','999555444','Camino real','2002-07-29','Diabetes','19','2022-03-18',NULL,NULL,1),
(134,1,'Christian','Valdivia','10492255','987963124','Callao','2002-03-21','Ninguna enfermedad','20','2022-03-18',NULL,NULL,1),
(135,1,'Jose ','Tasayco','71003366','950967981','Calle las aduanas','2001-02-10','Diabetes','21','2022-03-19',NULL,NULL,1),
(136,1,'Jorge','Tasayco','71223366','999885222','izaguirre','2001-06-09','anemia o hemoglobina muy baja','21','2022-03-19',NULL,NULL,1),
(137,1,'Luis','Pelaez','71245258','986930147','Los incas','2000-08-18','Epilecticos','21','2022-03-19',NULL,NULL,1),
(138,1,'Ricardo','Sanchez','41023658','940967988','San bartolo','1998-09-07','Epilecticos','23','2022-03-19',NULL,NULL,1),
(139,1,'Mauel','Alcala','10789642','920967987','San bartolo','1998-05-30','Alergia a la anestesia','24','2022-03-19',NULL,NULL,1),
(140,1,'Erik','Asmat','10204563','920967985','Alfredo mendiola','1998-01-21','Alergia a la anestesia','24','2022-03-19',NULL,NULL,1),
(141,1,'Pedro','Tenazoa','70396128','929914776','Calle los Jazmines','1999-09-27','Presion arterial alta','22','2022-03-19',NULL,NULL,1),
(142,1,'Omar','Sevilla','78552233','995441552','Tomasvalle','1999-05-10','Ninguna enfermedad','23','2022-03-21',NULL,NULL,1),
(143,1,'Luis','Leiton','79551444','998663221','Camino real','1994-06-29','Ninguna enfermedad','28','2022-03-21',NULL,NULL,1),
(144,1,'Rajhut','Fernandez','70235689','987654321','Los angeles','1994-11-26','Problemas cardiacos','27','2022-03-21',NULL,NULL,1),
(145,1,'Antonio','Cotrina','71224458','999222317','san martin de porres','1994-03-31','Presion arterial alta','28','2022-03-21',NULL,NULL,1),
(146,1,'Luis','Pelaez','71245258','986930147','Los incas','1950-01-31','Epilecticos','72','2022-03-21',NULL,NULL,1),
(147,1,'Carlos','Rodriguez','71002211','990967974','Callao','1979-10-27',NULL,'42','2022-03-21',NULL,NULL,1),
(148,1,'Jose ','Tasayco','71003366','950967981','Calle las aduanas','2013-11-06','Diabetes','8','2022-03-21',NULL,NULL,1),
(149,1,'Jorge','Tasayco','71223366','999885222','izaguirre','2013-10-07','anemia o hemoglobina muy baja','8','2022-03-21',NULL,NULL,1),
(150,1,'Javier','Draxl','70336622','987852896','Los incas','2013-04-20','Presion arterial alta','9','2022-03-22',NULL,NULL,1),
(151,1,'Roly','Miranda','75889984','963900912','Retablo','2012-07-29','Problemas cardiacos','9','2022-03-22',NULL,NULL,1),
(152,1,'Ivan','Flores','25841325','910970980','san martin de porres','2012-03-21','Especiales','10','2022-03-22',NULL,NULL,1),
(153,1,'Freddy','Julca','52545264','940950960','Calle las aduanas','2012-02-10','Epilecticos','10','2022-03-22',NULL,NULL,1),
(154,1,'Damian','Mullisaca','23564825','930920910','Alfredo mendiola','2016-06-09','Ninguna enfermedad','6','2022-03-22',NULL,NULL,1),
(155,1,'Ricardo','Sanchez','41023658','940967988','San bartolo','2016-11-19','Epilecticos','5','2022-03-22',NULL,NULL,1),
(156,1,'Luis','Flores','75002222','985321654','Los incas','2016-09-07','Ninguna enfermedad','5','2022-03-22',NULL,NULL,1),
(157,1,'Rajhut','Fernandez','70235689','987654321','Los angeles','2015-05-30','Problemas cardiacos','7','2022-03-22',NULL,NULL,1),
(158,1,'Roly','Miranda','76985633','987968974','Tomasvalle','2015-01-21','Presion arterial alta','7','2022-03-23',NULL,NULL,1),
(159,1,'Jose','Sanchez','74123156','987985921','Calle camino real','2015-09-27',NULL,'6','2022-03-23',NULL,NULL,1),
(160,1,'Jorge','Curioso','78512364','963900900','Callao','2000-05-10','Ninguna enfermedad','22','2022-03-23',NULL,NULL,1),
(161,1,'Oswaldo','Santana','79523651','900123147','Retablo','2000-06-29','anemia o hemoglobina muy baja','22','2022-03-23',NULL,NULL,1),
(162,1,'Mauel','Alcala','10789642','920967987','San bartolo','1992-11-26','Alergia a la anestesia','29','2022-03-23',NULL,NULL,1),
(163,1,'Erik','Asmat','10204563','920967985','Alfredo mendiola','1992-03-31','Alergia a la anestesia','30','2022-03-23',NULL,NULL,1),
(164,1,'Pedro','Tenazoa','70396128','929914776','Calle los Jazmines','2010-08-08','Presion arterial alta','11','2022-03-23',NULL,NULL,1),
(165,1,'Juan','Perez','71337582','999555444','Camino real','1983-01-31','Diabetes','39','2022-03-23',NULL,NULL,1),
(166,1,'Juan Carlos','Quintanilla','70112445','900095412','Callao','1983-10-27','Presion arterial alta','38','2022-03-24',NULL,NULL,1),
(167,1,'Kevin','Fernandez','70998852','900114455','san martin de porres','2006-11-06','Hemofilia','15','2022-03-24',NULL,NULL,1),
(168,1,'Aldo','Ochoa','47852234','909084523','Retablo','2006-10-07','Diabetes','15','2022-03-24',NULL,NULL,1),
(169,1,'Jorge','Curioso','78512364','963900900','Callao','2006-04-20','Ninguna enfermedad','16','2022-03-24',NULL,NULL,1),
(170,1,'Daniel','Aguirre','70123654','920967982','Los incas','1999-11-16','Diabetes','22','2022-03-24',NULL,NULL,1),
(171,1,'Pedro','Tenazoa','70396128','929914776','Calle los Jazmines','2000-06-19','Presion arterial alta','22','2022-03-24',NULL,NULL,1),
(172,1,'Juan','Perez','71337582','999555444','Camino real','1990-04-30','Diabetes','32','2022-03-24',NULL,NULL,1),
(173,1,'Alberto','Julca','76232341','987254123','Los incas','2001-09-17','Hemofilia','20','2022-03-24',NULL,NULL,1),
(174,1,'Willy','Rondan','47122235','909398745','Canaval y moreyra','1987-12-06','Ninguna enfermedad','34','2022-03-25',NULL,NULL,1),
(175,1,'Pablo','Alata','47885526','987960001','Aramburu','1988-02-20','Diabetes','34','2022-03-25',NULL,NULL,1),
(176,1,'Jesus','Santiago','40123668','989636322','Javer prado','1990-10-17','Ninguna enfermedad','31','2022-03-25',NULL,NULL,1),
(177,1,'Juan Carlos','Quintanilla','70112445','900095412','Callao','2002-03-21','Presion arterial alta','20','2022-03-25',NULL,NULL,1),
(178,1,'Kevin','Fernandez','70998852','900114455','san martin de porres','2001-02-10','Hemofilia','21','2022-03-25',NULL,NULL,1),
(179,1,'Aldo','Ochoa','47852234','909084523','Retablo','2001-06-09','Diabetes','21','2022-03-25',NULL,NULL,1),
(180,1,'Jorge','Curioso','78512364','963900900','Callao','2000-08-18','Ninguna enfermedad','21','2022-03-25',NULL,NULL,1),
(181,1,'Daniel','Aguirre','70123654','920967982','Los incas','1998-09-07','Diabetes','23','2022-03-25',NULL,NULL,1),
(182,1,'Victor','Minaya','45522130','909874122','Calle las pizzas','1998-05-30','Presion arterial alta','24','2022-03-26',NULL,NULL,1),
(183,1,'Jhon ','Marin','70396225','982563478','Ricardo Palma','1998-01-21','Epilecticos','24','2022-03-26',NULL,NULL,1),
(184,1,'Alexander','Masco','71778852','999888777','Angamos','1999-09-27','Ninguna enfermedad','22','2022-03-26',NULL,NULL,1),
(185,1,'Cristian ','Solano','10206582','999666333','La victoria','1999-05-10','Epilecticos','23','2022-03-26',NULL,NULL,1),
(186,1,'Javier','Draxl','70336622','987852896','Los incas','1980-06-29','Presion arterial alta','42','2022-03-26',NULL,NULL,1),
(187,1,'Roly','Miranda','75889984','963900912','Retablo','1994-11-26','Problemas cardiacos','27','2022-03-26',NULL,NULL,1),
(188,1,'Ivan','Flores','25841325','910970980','san martin de porres','1994-03-31','Especiales','28','2022-03-26',NULL,NULL,1),
(189,1,'Freddy','Julca','52545264','940950960','Calle las aduanas','1950-01-31','Epilecticos','72','2022-03-26',NULL,NULL,1),
(190,1,'Mateo','Vega','10222554','990998556','Canada','1979-10-27','Ninguna enfermedad','42','2022-03-28',NULL,NULL,1),
(191,1,'Dylan','Heison','10369874','999888111','Estadio Nacional','2013-11-06','Epilecticos','8','2022-03-28',NULL,NULL,1),
(192,1,'Josep','Mendez','10778844','999825333','España','2013-10-07','Diabetes','8','2022-03-28',NULL,NULL,1),
(193,1,'Jorge','Curioso','78512364','963900900','Callao','2013-04-20','Ninguna enfermedad','9','2022-03-28',NULL,NULL,1),
(194,1,'Daniel','Aguirre','70123654','920967982','Los incas','2012-07-29','Diabetes','9','2022-03-28',NULL,NULL,1),
(195,1,'Victor','Minaya','45522130','909874122','Calle las pizzas','1998-01-21','Presion arterial alta','24','2022-03-28',NULL,NULL,1),
(196,1,'Jhon ','Marin','70396225','982563478','Ricardo Palma','1999-09-27','Epilecticos','22','2022-03-28',NULL,NULL,1),
(197,1,'Alexander','Masco','71778852','999888777','Angamos','1999-05-10','Ninguna enfermedad','23','2022-03-28',NULL,NULL,1),
(198,1,'Boris ','Montalvan','10224111','999333222','Callao','1994-06-29','Ninguna enfermedad','28','2022-03-29',NULL,NULL,1),
(199,1,'Aldo','Ochoa','47852234','909084523','Retablo','1994-11-26','Diabetes','27','2022-03-29',NULL,NULL,1),
(200,1,'Jorge','Curioso','78512364','963900900','Callao','1994-03-31','Ninguna enfermedad','28','2022-03-29',NULL,NULL,1),
(201,1,'Daniel','Aguirre','70123654','920967982','Los incas','1950-01-31','Diabetes','72','2022-03-29',NULL,NULL,1),
(202,1,'Alexander','Masco','71778852','999888777','Angamos','1979-10-27','Ninguna enfermedad','42','2022-03-29',NULL,NULL,1),
(203,1,'Cristian ','Solano','10206582','999666333','La victoria','2013-11-06','Epilecticos','8','2022-03-29',NULL,NULL,1),
(204,1,'Ivan','Flores','25841325','910970980','san martin de porres','2013-10-07','Especiales','8','2022-03-29',NULL,NULL,1),
(205,1,'Angel','Macedo','10255446','999555222','Naranjal','2013-04-20','Ninguna enfermedad','9','2022-03-30',NULL,NULL,1),
(206,1,'Cesar','Guevara','10333998','900974985','San miguelito','2012-07-29','Diabetes','9','2022-03-30',NULL,NULL,1),
(207,1,'Juan','Lopez','10778844','963987910','San jose','2001-09-17','anemia o hemoglobina muy baja','20','2022-03-30',NULL,NULL,1),
(208,1,'Jesus','Santiago','40123668','989636322','Javer prado','1987-12-06','Ninguna enfermedad','34','2022-03-30',NULL,NULL,1),
(209,1,'Juan Carlos','Quintanilla','70112445','900095412','Callao','1988-02-20','Presion arterial alta','34','2022-03-30',NULL,NULL,1),
(210,1,'Kevin','Fernandez','70998852','900114455','san martin de porres','1990-10-17','Hemofilia','31','2022-03-30',NULL,NULL,1),
(211,1,'Aldo','Ochoa','47852234','909084523','Retablo','2002-03-21','Diabetes','20','2022-03-30',NULL,NULL,1),
(212,1,'Daniel','Aguirre','70123654','920967982','Los incas','2001-02-10','Diabetes','21','2022-03-30',NULL,NULL,1),
(213,1,'Sanders','Davila','41123667','900988877','España','2001-06-09','Ninguna enfermedad','21','2022-03-31',NULL,NULL,1),
(214,1,'Angel','Ruiz','10207778','955296320','Callao','2000-08-18','Hemofilia','21','2022-03-31',NULL,NULL,1),
(215,1,'Jonathan','Cayetano','10887744','987963952','san martin de porres','1998-09-07','Diabetes','23','2022-03-31',NULL,NULL,1),
(216,1,'Hector','Cruz','70888552','900941252','Santo toribio','1998-05-30','Epilecticos','24','2022-03-31',NULL,NULL,1),
(217,1,'Boris ','Montalvan','10224111','999333222','Callao','1951-01-21','Ninguna enfermedad','71','2022-03-31',NULL,NULL,1),
(218,1,'Aldo','Ochoa','47852234','909084523','Retablo','1999-09-27','Diabetes','22','2022-03-31',NULL,NULL,1),
(219,1,'Jorge','Curioso','78512364','963900900','Callao','1999-05-10','Ninguna enfermedad','23','2022-03-31',NULL,NULL,1),
(220,1,'Juan Carlos','Quintanilla','70112445','900095412','Callao','1994-06-29','Ninguna enfermedad','28','2022-03-31',NULL,NULL,1);


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id_rol` int(11) NOT NULL,
  `nombre` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `fecha_creacion` date NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id_rol`, `nombre`, `fecha_creacion`, `estado`) VALUES
(1, 'Administrador', '2022-05-04', 1),
(2, 'Asistente', '2022-05-04', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sintomas`
--

CREATE TABLE `sintomas` (
  `id_sintoma` int(11) NOT NULL,
  `nombre` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `sintomas`
--

INSERT INTO `sintomas` (`id_sintoma`, `nombre`) VALUES
(1, 'placa y calculo dental'),
(2, 'retraccion gingivil'),
(3, 'perdida de hueso'),
(4, 'sangrado'),
(5, 'movilidad dental'),
(6, 'mal aliento'),
(7, 'sangrado de la encía'),
(8, 'inflamacion de encias'),
(9, 'encía rojas'),
(10, 'destruccion coronaris'),
(11, 'dolor espontaneol'),
(12, 'movilidad permanente'),
(13, 'imagen radiolucida'),
(14, 'inflamacion de la encia alrededor'),
(15, 'dolor bucal'),
(16, 'apertura bucal limitada'),
(17, 'pus'),
(18, 'dolor espontaneo y agudo'),
(19, 'dolor a la percusion'),
(20, 'caries profunda'),
(21, 'compromiso pulpar'),
(22, 'estructura dental'),
(23, 'pigmentacion negra'),
(24, 'sensibilidad al frio'),
(25, 'no presenta ningun diente'),
(26, 'pregunta algunos pliegos dentales'),
(27, 'material rediopoas sin sintomas'),
(28, 'dolor, mololato a un proceso apicol'),
(29, 'Ningun otro síntoma');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `id_rol` int(11) NOT NULL,
  `nombre` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `apellidos` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `usuario` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `clave` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `fecha_creacion` date NOT NULL,
  `fecha_modificacion` date DEFAULT NULL,
  `fecha_eliminacion` date DEFAULT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `id_rol`, `nombre`, `apellidos`, `usuario`, `clave`, `fecha_creacion`, `fecha_modificacion`, `fecha_eliminacion`, `estado`) VALUES
(1, 1, 'Carlos', 'Alberdi', 'carlosa', '123456', '2022-05-04', NULL, NULL, 1),
(2, 2, 'Angie', 'Flores', 'angief', '123456', '2022-05-04', NULL, NULL, 1),
(3, 1, 'Bryan', 'Solano', 'bryans', '123456', '2022-05-04', NULL, NULL, 1),
(4, 2, 'hola', 'hola', 'hola', '123456', '2022-05-06', NULL, NULL, 1),
(5, 1, 'fgfgfgf', 'fgfgfgf', 'gfgfgfg', '2323', '2022-07-15', NULL, NULL, 1),
(6, 1, 'dfdfd', 'dfdfd', 'hola', '122112323', '2022-07-15', NULL, NULL, 1),
(7, 2, 'rererer', 'fdfdfd', 'rererere', '2323243', '2022-07-15', NULL, NULL, 1),
(8, 1, 'ewewewe', 'vcvcvc', 'vc', '432465', '2022-07-16', NULL, NULL, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `citas`
--
ALTER TABLE `citas`
  ADD PRIMARY KEY (`id_cita`),
  ADD KEY `id_doctor` (`id_doctor`),
  ADD KEY `id_paciente` (`id_paciente`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `sintoma_uno` (`sintoma_uno`),
  ADD KEY `sintoma_dos` (`sintoma_dos`);

--
-- Indices de la tabla `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`id_doctor`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `historias`
--
ALTER TABLE `historias`
  ADD PRIMARY KEY (`id_historia`),
  ADD KEY `id_cita` (`id_cita`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  ADD PRIMARY KEY (`id_paciente`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `sintomas`
--
ALTER TABLE `sintomas`
  ADD PRIMARY KEY (`id_sintoma`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `id_rol` (`id_rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `citas`
--
ALTER TABLE `citas`
  MODIFY `id_cita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de la tabla `doctor`
--
ALTER TABLE `doctor`
  MODIFY `id_doctor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `historias`
--
ALTER TABLE `historias`
  MODIFY `id_historia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  MODIFY `id_paciente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `sintomas`
--
ALTER TABLE `sintomas`
  MODIFY `id_sintoma` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `citas`
--
ALTER TABLE `citas`
  ADD CONSTRAINT `citas_ibfk_1` FOREIGN KEY (`id_doctor`) REFERENCES `doctor` (`id_doctor`),
  ADD CONSTRAINT `citas_ibfk_2` FOREIGN KEY (`id_paciente`) REFERENCES `pacientes` (`id_paciente`),
  ADD CONSTRAINT `citas_ibfk_3` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`);

--
-- Filtros para la tabla `doctor`
--
ALTER TABLE `doctor`
  ADD CONSTRAINT `doctor_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`);

--
-- Filtros para la tabla `historias`
--
ALTER TABLE `historias`
  ADD CONSTRAINT `historias_ibfk_1` FOREIGN KEY (`id_cita`) REFERENCES `citas` (`id_cita`),
  ADD CONSTRAINT `historias_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`);

--
-- Filtros para la tabla `pacientes`
--
ALTER TABLE `pacientes`
  ADD CONSTRAINT `pacientes_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`id_rol`) REFERENCES `roles` (`id_rol`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
