-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-02-2021 a las 16:03:03
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_smarttrader_v8`
--
CREATE DATABASE IF NOT EXISTS `bd_smarttrader_v8` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `bd_smarttrader_v8`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_caj_movimientos`
--

DROP TABLE IF EXISTS `tb_caj_movimientos`;
CREATE TABLE IF NOT EXISTS `tb_caj_movimientos` (
  `fk_seg_inquilinos` int(11) NOT NULL,
  `movi_codigo` int(11) NOT NULL AUTO_INCREMENT,
  `fk_par_inversionistas` int(11) NOT NULL,
  `movi_tipo` varchar(1) NOT NULL,
  `movi_descripcion` varchar(100) NOT NULL,
  `movi_fecha` datetime NOT NULL,
  `movi_monto` decimal(10,0) NOT NULL,
  `fc` datetime NOT NULL,
  `uc` int(11) NOT NULL,
  PRIMARY KEY (`movi_codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=92 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tb_caj_movimientos`
--

INSERT INTO `tb_caj_movimientos` (`fk_seg_inquilinos`, `movi_codigo`, `fk_par_inversionistas`, `movi_tipo`, `movi_descripcion`, `movi_fecha`, `movi_monto`, `fc`, `uc`) VALUES
(0, 84, 7, 'E', 'Capital de ingreso', '2021-02-09 22:10:29', '15000000', '2021-02-09 22:10:29', 1),
(1, 85, 8, 'E', 'Capital de ingreso', '2021-02-11 12:27:23', '5000000', '2021-02-11 12:27:23', 19),
(2, 86, 9, 'E', 'Capital de ingreso', '2021-02-11 12:28:02', '6000000', '2021-02-11 12:28:02', 24),
(2, 87, 9, 'S', 'Participación en el prestamo 6', '2021-02-11 00:00:00', '500000', '2021-02-11 16:02:09', 24),
(2, 88, 9, 'S', 'Participación en el prestamo 7', '2021-02-11 00:00:00', '500000', '2021-02-11 16:02:28', 24),
(2, 89, 9, 'E', 'Devolución de préstamos', '2021-02-11 00:00:00', '1500000', '2021-02-11 16:43:51', 24),
(2, 90, 9, 'S', 'Participación en el prestamo 1', '2021-02-11 00:00:00', '500000', '2021-02-11 16:02:57', 24),
(2, 91, 9, 'S', 'Participación en el prestamo 2', '2021-02-11 00:00:00', '700000', '2021-02-11 16:02:26', 24);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_par_clientes`
--

DROP TABLE IF EXISTS `tb_par_clientes`;
CREATE TABLE IF NOT EXISTS `tb_par_clientes` (
  `fk_seg_inquilinos` int(11) NOT NULL,
  `clie_codigo` int(11) NOT NULL AUTO_INCREMENT,
  `fk_par_tipos_identificacion` int(11) NOT NULL,
  `clie_identificacion` varchar(20) NOT NULL,
  `clie_nombre` varchar(50) NOT NULL,
  `clie_apellido` varchar(50) NOT NULL,
  `clie_correo` varchar(80) DEFAULT NULL,
  `clie_celular` varchar(10) NOT NULL,
  `clie_direccion` varchar(200) NOT NULL,
  `clie_calificacion` int(11) DEFAULT NULL,
  `fk_seg_usuarios` int(11) DEFAULT NULL,
  `fk_par_estados` int(11) NOT NULL DEFAULT 1,
  `fc` datetime NOT NULL,
  `uc` int(11) NOT NULL,
  `fm` datetime DEFAULT NULL,
  `um` int(11) DEFAULT NULL,
  PRIMARY KEY (`clie_codigo`),
  UNIQUE KEY `clie_identificacion` (`clie_identificacion`,`fk_seg_inquilinos`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tb_par_clientes`
--

INSERT INTO `tb_par_clientes` (`fk_seg_inquilinos`, `clie_codigo`, `fk_par_tipos_identificacion`, `clie_identificacion`, `clie_nombre`, `clie_apellido`, `clie_correo`, `clie_celular`, `clie_direccion`, `clie_calificacion`, `fk_seg_usuarios`, `fk_par_estados`, `fc`, `uc`, `fm`, `um`) VALUES
(1, 35, 1, '1130100100', 'Carlos', 'Lopez', NULL, '3101001010', 'Cr 1 # 1 - 1', NULL, NULL, 1, '2021-02-09 22:09:51', 1, '2021-02-11 10:44:52', 19),
(2, 38, 1, '1112621414', 'Oscar', 'Hincapié', NULL, '3103003030', 'Cr 3 # 3 - 3', NULL, NULL, 1, '2021-02-11 10:40:36', 24, '2021-02-11 12:21:08', 24),
(2, 39, 1, '1113300300', 'Leidy', 'Silva', NULL, '3104004040', 'Cr 4 # 4 - 4', NULL, NULL, 1, '2021-02-11 12:22:35', 24, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_par_estados`
--

DROP TABLE IF EXISTS `tb_par_estados`;
CREATE TABLE IF NOT EXISTS `tb_par_estados` (
  `esta_codigo` int(11) NOT NULL AUTO_INCREMENT,
  `esta_descripcion` varchar(20) NOT NULL,
  PRIMARY KEY (`esta_codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tb_par_estados`
--

INSERT INTO `tb_par_estados` (`esta_codigo`, `esta_descripcion`) VALUES
(1, 'Activo'),
(2, 'Inactivo'),
(3, 'Pendiente'),
(4, 'Pagada'),
(5, 'Atrasada'),
(6, 'Anulado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_par_inversionistas`
--

DROP TABLE IF EXISTS `tb_par_inversionistas`;
CREATE TABLE IF NOT EXISTS `tb_par_inversionistas` (
  `fk_seg_inquilinos` int(11) NOT NULL,
  `inve_codigo` int(11) NOT NULL AUTO_INCREMENT,
  `inve_identificacion` varchar(30) NOT NULL,
  `fk_par_tipos_identificacion` int(11) NOT NULL,
  `inve_nombre` varchar(80) NOT NULL,
  `inve_apellido` varchar(80) NOT NULL,
  `inve_correo` varchar(200) DEFAULT NULL,
  `inve_telefono` int(11) DEFAULT NULL,
  `inve_celular` varchar(10) NOT NULL,
  `inve_direccion` varchar(255) DEFAULT NULL,
  `fk_seg_usuarios` int(11) DEFAULT NULL,
  `inve_saldo` decimal(10,0) NOT NULL DEFAULT 0,
  `inve_saldo_min` decimal(10,0) DEFAULT NULL,
  `fk_par_estados` int(11) NOT NULL DEFAULT 1,
  `fc` datetime NOT NULL,
  `uc` int(11) NOT NULL,
  `fm` datetime DEFAULT NULL,
  `um` int(11) DEFAULT NULL,
  PRIMARY KEY (`inve_codigo`),
  UNIQUE KEY `inve_identificacion` (`inve_identificacion`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tb_par_inversionistas`
--

INSERT INTO `tb_par_inversionistas` (`fk_seg_inquilinos`, `inve_codigo`, `inve_identificacion`, `fk_par_tipos_identificacion`, `inve_nombre`, `inve_apellido`, `inve_correo`, `inve_telefono`, `inve_celular`, `inve_direccion`, `fk_seg_usuarios`, `inve_saldo`, `inve_saldo_min`, `fk_par_estados`, `fc`, `uc`, `fm`, `um`) VALUES
(0, 7, '1130200200', 1, 'Inversionista', 'Prueba', NULL, NULL, '3202002020', 'Cra 2 # 2 - 2', NULL, '15000000', NULL, 1, '2021-02-09 22:10:29', 1, NULL, NULL),
(1, 8, '1130595683', 1, 'Jorge', 'Aguilar', NULL, NULL, '3185572639', 'Cr 3C su # 4E - 16, Piso 2', NULL, '5000000', NULL, 1, '2021-02-11 12:27:23', 19, NULL, NULL),
(2, 9, '66661645', 1, 'Yuliet', 'Mejía', NULL, NULL, '3105044487', 'Cr 3C SUR # 4E - 16, Piso 2', NULL, '4800000', NULL, 1, '2021-02-11 16:43:51', 24, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_par_tipos_identificacion`
--

DROP TABLE IF EXISTS `tb_par_tipos_identificacion`;
CREATE TABLE IF NOT EXISTS `tb_par_tipos_identificacion` (
  `tiid_codigo` int(11) NOT NULL AUTO_INCREMENT,
  `tiid_descripcion` varchar(80) NOT NULL,
  `fk_par_estados` int(11) NOT NULL DEFAULT 1,
  `fc` datetime NOT NULL,
  `uc` int(11) NOT NULL,
  `fm` datetime DEFAULT NULL,
  `um` int(11) DEFAULT NULL,
  PRIMARY KEY (`tiid_codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tb_par_tipos_identificacion`
--

INSERT INTO `tb_par_tipos_identificacion` (`tiid_codigo`, `tiid_descripcion`, `fk_par_estados`, `fc`, `uc`, `fm`, `um`) VALUES
(1, 'Cédula de Ciudadanía', 1, '2020-07-07 01:07:17', 1, '2020-09-10 17:09:19', 1),
(2, 'NIT', 1, '2020-07-07 01:07:22', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_pre_cuotas`
--

DROP TABLE IF EXISTS `tb_pre_cuotas`;
CREATE TABLE IF NOT EXISTS `tb_pre_cuotas` (
  `fk_seg_inquilinos` int(11) NOT NULL,
  `prcu_codigo` int(11) NOT NULL AUTO_INCREMENT,
  `fk_pre_prestamos` int(11) NOT NULL,
  `prcu_numero` int(11) NOT NULL,
  `prcu_fecha` datetime NOT NULL,
  `prcu_fecha_pago` datetime DEFAULT NULL,
  `prcu_valor` int(11) NOT NULL,
  `prcu_vlr_saldo` decimal(10,0) NOT NULL,
  `prcu_valor_pago` int(11) DEFAULT NULL,
  `fk_par_estados` int(11) NOT NULL DEFAULT 3,
  PRIMARY KEY (`prcu_codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tb_pre_cuotas`
--

INSERT INTO `tb_pre_cuotas` (`fk_seg_inquilinos`, `prcu_codigo`, `fk_pre_prestamos`, `prcu_numero`, `prcu_fecha`, `prcu_fecha_pago`, `prcu_valor`, `prcu_vlr_saldo`, `prcu_valor_pago`, `fk_par_estados`) VALUES
(2, 1, 1, 1, '2021-02-18 00:00:00', NULL, 71900, '71900', NULL, 3),
(2, 2, 1, 2, '2021-02-25 00:00:00', NULL, 71900, '71900', NULL, 3),
(2, 3, 1, 3, '2021-03-04 00:00:00', NULL, 71900, '71900', NULL, 3),
(2, 4, 1, 4, '2021-03-11 00:00:00', NULL, 71900, '71900', NULL, 3),
(2, 5, 1, 5, '2021-03-18 00:00:00', NULL, 71900, '71900', NULL, 3),
(2, 6, 1, 6, '2021-03-25 00:00:00', NULL, 71900, '71900', NULL, 3),
(2, 7, 1, 7, '2021-04-01 00:00:00', NULL, 71900, '71900', NULL, 3),
(2, 8, 1, 8, '2021-04-08 00:00:00', NULL, 71900, '71900', NULL, 3),
(2, 9, 2, 1, '2021-03-11 00:00:00', NULL, 301000, '301000', NULL, 3),
(2, 10, 2, 2, '2021-04-11 00:00:00', NULL, 301000, '301000', NULL, 3),
(2, 11, 2, 3, '2021-05-11 00:00:00', NULL, 301000, '301000', NULL, 3),
(2, 12, 2, 4, '2021-06-11 00:00:00', NULL, 301000, '301000', NULL, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_pre_participacion`
--

DROP TABLE IF EXISTS `tb_pre_participacion`;
CREATE TABLE IF NOT EXISTS `tb_pre_participacion` (
  `fk_seg_inquilinos` int(11) NOT NULL,
  `prpa_codigo` int(11) NOT NULL AUTO_INCREMENT,
  `fk_pre_prestamos` int(11) NOT NULL,
  `fk_par_inversionistas` int(11) NOT NULL,
  `prpa_porcentaje` decimal(10,2) NOT NULL,
  PRIMARY KEY (`prpa_codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tb_pre_participacion`
--

INSERT INTO `tb_pre_participacion` (`fk_seg_inquilinos`, `prpa_codigo`, `fk_pre_prestamos`, `fk_par_inversionistas`, `prpa_porcentaje`) VALUES
(2, 1, 1, 9, '100.00'),
(2, 2, 2, 9, '100.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_pre_prestamos`
--

DROP TABLE IF EXISTS `tb_pre_prestamos`;
CREATE TABLE IF NOT EXISTS `tb_pre_prestamos` (
  `fk_seg_inquilinos` int(11) NOT NULL,
  `pres_codigo` int(11) NOT NULL AUTO_INCREMENT,
  `fk_par_clientes` int(11) NOT NULL,
  `pres_tipo` char(1) NOT NULL DEFAULT 'C',
  `pres_fecha` datetime NOT NULL,
  `pres_vlr_monto` decimal(10,0) NOT NULL,
  `pres_frecuencia` char(1) NOT NULL DEFAULT 'M',
  `pres_nro_cuotas` int(11) NOT NULL DEFAULT 1,
  `pres_plazo` int(11) NOT NULL,
  `pres_interes` float NOT NULL,
  `pres_int_mensual` decimal(10,0) NOT NULL,
  `pres_int_total` decimal(10,0) NOT NULL,
  `pres_vlr_pago` decimal(10,0) NOT NULL,
  `pres_vlr_saldo` decimal(10,0) NOT NULL,
  `pres_vlr_cuota` decimal(10,0) NOT NULL,
  `fk_par_estados` int(11) NOT NULL DEFAULT 1,
  `fc` datetime NOT NULL,
  `uc` int(11) NOT NULL,
  PRIMARY KEY (`pres_codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tb_pre_prestamos`
--

INSERT INTO `tb_pre_prestamos` (`fk_seg_inquilinos`, `pres_codigo`, `fk_par_clientes`, `pres_tipo`, `pres_fecha`, `pres_vlr_monto`, `pres_frecuencia`, `pres_nro_cuotas`, `pres_plazo`, `pres_interes`, `pres_int_mensual`, `pres_int_total`, `pres_vlr_pago`, `pres_vlr_saldo`, `pres_vlr_cuota`, `fk_par_estados`, `fc`, `uc`) VALUES
(2, 1, 38, 'C', '2021-02-11 00:00:00', '500000', 'S', 8, 1, 15, '75000', '75000', '575000', '575000', '71900', 1, '2021-02-11 16:02:57', 24),
(2, 2, 39, 'C', '2021-02-11 00:00:00', '700000', 'M', 4, 4, 18, '126000', '504000', '1204000', '1204000', '301000', 1, '2021-02-11 16:02:26', 24);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_seg_dba`
--

DROP TABLE IF EXISTS `tb_seg_dba`;
CREATE TABLE IF NOT EXISTS `tb_seg_dba` (
  `dba_codigo` int(11) NOT NULL AUTO_INCREMENT,
  `dba_id` varchar(20) NOT NULL,
  `dba_ejecutada` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`dba_codigo`),
  UNIQUE KEY `dba_id` (`dba_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tb_seg_dba`
--

INSERT INTO `tb_seg_dba` (`dba_codigo`, `dba_id`, `dba_ejecutada`) VALUES
(1, '20201114_1000', 1),
(2, '20201114_1006', 1),
(3, '20201115_1048', 1),
(4, '20201116_1007', 1),
(5, '20201120_0704', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_seg_inquilinos`
--

DROP TABLE IF EXISTS `tb_seg_inquilinos`;
CREATE TABLE IF NOT EXISTS `tb_seg_inquilinos` (
  `inqu_codigo` int(11) NOT NULL AUTO_INCREMENT,
  `inqu_nombre` varchar(100) NOT NULL,
  `inqu_apellido` varchar(100) NOT NULL,
  `inqu_celular` varchar(10) NOT NULL,
  `inqu_correo` varchar(100) NOT NULL,
  `inqu_base_datos` varchar(100) NOT NULL,
  `fk_par_estados` int(11) NOT NULL DEFAULT 1,
  `fc` datetime DEFAULT NULL,
  `uc` int(11) DEFAULT NULL,
  `fm` datetime DEFAULT NULL,
  `um` int(11) DEFAULT NULL,
  PRIMARY KEY (`inqu_codigo`),
  UNIQUE KEY `inqu_base_datos` (`inqu_base_datos`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tb_seg_inquilinos`
--

INSERT INTO `tb_seg_inquilinos` (`inqu_codigo`, `inqu_nombre`, `inqu_apellido`, `inqu_celular`, `inqu_correo`, `inqu_base_datos`, `fk_par_estados`, `fc`, `uc`, `fm`, `um`) VALUES
(1, 'Gloricet', 'Marin', '3101001010', 'glorimariana@gmail.com', 'bd_st_cliente_1', 1, '2020-12-21 17:04:25', 1, '2020-12-21 18:19:20', 1),
(2, 'Inquilino', 'Prueba', '3101001010', 'q@q.com', 'bd_st_3', 1, '2021-02-11 09:28:33', 23, '2021-02-11 12:48:49', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_seg_modulos`
--

DROP TABLE IF EXISTS `tb_seg_modulos`;
CREATE TABLE IF NOT EXISTS `tb_seg_modulos` (
  `modu_codigo` int(11) NOT NULL AUTO_INCREMENT,
  `modu_descripcion` varchar(50) NOT NULL,
  `modu_prefijo` varchar(3) NOT NULL,
  `modu_icono` varchar(20) NOT NULL,
  `fk_par_estados` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`modu_codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tb_seg_modulos`
--

INSERT INTO `tb_seg_modulos` (`modu_codigo`, `modu_descripcion`, `modu_prefijo`, `modu_icono`, `fk_par_estados`) VALUES
(1, 'Seguridad', 'seg', 'shield', 1),
(2, 'Parámetros', 'par', 'sliders', 1),
(3, 'Caja y Bancos', 'par', 'money', 1),
(4, 'Préstamos', 'pre', 'handshake-o', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_seg_opciones`
--

DROP TABLE IF EXISTS `tb_seg_opciones`;
CREATE TABLE IF NOT EXISTS `tb_seg_opciones` (
  `opci_codigo` int(11) NOT NULL,
  `fk_seg_modulos` int(11) NOT NULL,
  `opci_nombre` varchar(50) NOT NULL,
  `opci_enlace` varchar(100) NOT NULL,
  `fk_par_estados` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`opci_codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tb_seg_opciones`
--

INSERT INTO `tb_seg_opciones` (`opci_codigo`, `fk_seg_modulos`, `opci_nombre`, `opci_enlace`, `fk_par_estados`) VALUES
(1001, 1, 'Perfiles', 'perfiles/index', 1),
(1002, 1, 'Usuarios', 'usuarios/index', 1),
(1003, 1, 'Permisos', 'permisos/index', 1),
(1004, 1, 'Cambiar Clave', 'usuarios/clave', 1),
(1005, 1, 'DBA', 'seguridad/dba', 1),
(1006, 1, 'Inquilinos', 'inquilinos/index', 1),
(2001, 2, 'Tipos de Identificación', 'tiposId/index', 1),
(2002, 2, 'Inversionsitas', 'inversionistas/index', 1),
(2003, 2, 'Clientes', 'clientes/index', 1),
(3001, 3, 'Movimientos', 'movimientos/index', 1),
(4001, 4, 'Préstamos', 'prestamos/index', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_seg_perfiles`
--

DROP TABLE IF EXISTS `tb_seg_perfiles`;
CREATE TABLE IF NOT EXISTS `tb_seg_perfiles` (
  `fk_seg_inquilinos` int(11) NOT NULL,
  `perf_codigo` int(11) NOT NULL AUTO_INCREMENT,
  `perf_descripcion` varchar(50) NOT NULL,
  `fk_par_estados` int(11) NOT NULL DEFAULT 1,
  `fc` datetime DEFAULT NULL,
  `uc` int(11) DEFAULT NULL,
  `fm` datetime DEFAULT NULL,
  `um` int(11) DEFAULT NULL,
  PRIMARY KEY (`perf_codigo`),
  UNIQUE KEY `perf_descripcion` (`perf_descripcion`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tb_seg_perfiles`
--

INSERT INTO `tb_seg_perfiles` (`fk_seg_inquilinos`, `perf_codigo`, `perf_descripcion`, `fk_par_estados`, `fc`, `uc`, `fm`, `um`) VALUES
(0, 1, 'root', 1, '0000-00-00 00:00:00', 0, NULL, NULL),
(0, 2, 'Super Usuario', 1, '2020-12-21 18:14:10', 1, NULL, NULL),
(0, 3, 'Administrador', 1, '2021-02-11 11:05:53', 19, NULL, NULL),
(0, 4, 'Supervisor', 1, '2021-02-11 11:06:08', 19, NULL, NULL),
(0, 5, 'Cobrador', 1, '2021-02-11 11:06:16', 19, NULL, NULL),
(0, 6, 'Cliente', 1, '2021-02-11 11:06:23', 19, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_seg_permisos`
--

DROP TABLE IF EXISTS `tb_seg_permisos`;
CREATE TABLE IF NOT EXISTS `tb_seg_permisos` (
  `perm_codigo` int(11) NOT NULL AUTO_INCREMENT,
  `fk_seg_perfiles` int(11) NOT NULL,
  `fk_seg_opciones` int(11) NOT NULL,
  `fk_par_estados` int(11) NOT NULL DEFAULT 1,
  `perm_c` int(11) NOT NULL DEFAULT 0,
  `perm_r` int(11) NOT NULL DEFAULT 0,
  `perm_u` int(11) NOT NULL DEFAULT 0,
  `perm_d` int(11) NOT NULL DEFAULT 0,
  `perm_l` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`perm_codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=263 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tb_seg_permisos`
--

INSERT INTO `tb_seg_permisos` (`perm_codigo`, `fk_seg_perfiles`, `fk_seg_opciones`, `fk_par_estados`, `perm_c`, `perm_r`, `perm_u`, `perm_d`, `perm_l`) VALUES
(222, 1, 1001, 1, 1, 1, 1, 1, 1),
(223, 1, 1002, 1, 1, 1, 1, 1, 1),
(224, 1, 1003, 1, 1, 1, 1, 1, 1),
(225, 1, 1004, 1, 1, 1, 1, 1, 0),
(226, 1, 1005, 1, 1, 1, 1, 1, 0),
(227, 1, 1006, 1, 1, 1, 1, 1, 1),
(228, 1, 2001, 1, 1, 1, 1, 1, 1),
(229, 1, 2002, 1, 1, 1, 1, 1, 1),
(230, 1, 2003, 1, 1, 1, 1, 1, 1),
(231, 1, 3001, 1, 1, 1, 1, 1, 0),
(232, 1, 4001, 1, 1, 1, 1, 1, 0),
(242, 2, 1001, 1, 1, 1, 0, 0, 1),
(243, 2, 1002, 1, 1, 1, 1, 1, 1),
(244, 2, 1003, 1, 1, 1, 0, 0, 0),
(245, 2, 1004, 1, 1, 1, 1, 0, 0),
(246, 2, 2001, 1, 1, 1, 1, 1, 1),
(247, 2, 2002, 1, 1, 1, 1, 1, 1),
(248, 2, 2003, 1, 1, 1, 1, 1, 1),
(249, 2, 3001, 1, 1, 1, 1, 1, 1),
(250, 2, 4001, 1, 1, 1, 1, 1, 1),
(251, 3, 1001, 1, 1, 1, 0, 0, 1),
(252, 3, 1002, 1, 1, 1, 1, 0, 1),
(253, 3, 1003, 1, 1, 1, 1, 0, 1),
(254, 3, 1004, 1, 1, 1, 1, 0, 1),
(255, 3, 2001, 1, 1, 1, 1, 0, 1),
(256, 3, 2002, 1, 1, 1, 1, 0, 1),
(257, 3, 2003, 1, 1, 1, 1, 1, 1),
(258, 3, 3001, 1, 1, 1, 1, 0, 1),
(259, 3, 4001, 1, 1, 1, 1, 0, 1),
(260, 6, 1004, 1, 1, 0, 0, 0, 0),
(261, 5, 1004, 1, 1, 0, 0, 0, 0),
(262, 4, 1004, 1, 1, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_seg_usuarios`
--

DROP TABLE IF EXISTS `tb_seg_usuarios`;
CREATE TABLE IF NOT EXISTS `tb_seg_usuarios` (
  `fk_seg_inquilinos` int(11) NOT NULL,
  `usua_codigo` int(11) NOT NULL AUTO_INCREMENT,
  `usua_nombre` varchar(50) NOT NULL,
  `usua_mail` varchar(100) NOT NULL,
  `usua_login` varchar(20) NOT NULL,
  `usua_clave` varchar(50) NOT NULL,
  `fk_seg_perfiles` int(11) NOT NULL,
  `usua_token` varchar(255) DEFAULT NULL,
  `usua_vcto_token` datetime DEFAULT NULL,
  `fk_par_estados` int(11) NOT NULL DEFAULT 1,
  `fc` datetime NOT NULL DEFAULT '1000-01-01 00:00:00',
  `uc` int(11) NOT NULL,
  `fm` datetime DEFAULT NULL,
  `um` smallint(11) DEFAULT NULL,
  PRIMARY KEY (`usua_codigo`),
  UNIQUE KEY `usua_login` (`usua_login`,`fk_seg_inquilinos`) USING BTREE,
  UNIQUE KEY `usua_mail` (`usua_mail`,`fk_seg_inquilinos`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tb_seg_usuarios`
--

INSERT INTO `tb_seg_usuarios` (`fk_seg_inquilinos`, `usua_codigo`, `usua_nombre`, `usua_mail`, `usua_login`, `usua_clave`, `fk_seg_perfiles`, `usua_token`, `usua_vcto_token`, `fk_par_estados`, `fc`, `uc`, `fm`, `um`) VALUES
(0, 1, 'Usuario Root', 'jaguilar.8709@gmail.com', 'root', '698d51a19d8a121ce581499d7b701668', 1, '', '2020-09-10 17:49:55', 1, '2017-07-01 10:00:00', 0, '2020-09-10 17:09:05', 1),
(1, 19, 'Gloris Marin', 'glorimariana@gmail.com', 'gmarin', '202cb962ac59075b964b07152d234b70', 2, NULL, NULL, 1, '2020-09-10 17:09:00', 1, NULL, NULL),
(2, 24, 'Inquilino Prueba', 'q@q.com', 'inq.pru', '202cb962ac59075b964b07152d234b70', 2, NULL, NULL, 1, '2021-02-11 09:28:34', 23, NULL, NULL),
(1, 26, 'Administrador Prueba', 'admin@st1.com', 'admin.st1', '202cb962ac59075b964b07152d234b70', 3, NULL, NULL, 1, '2021-02-11 12:18:51', 19, '2021-02-11 17:31:06', 19);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
