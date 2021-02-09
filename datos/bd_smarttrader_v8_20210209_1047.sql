-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-02-2021 a las 16:46:59
-- Versión del servidor: 10.4.8-MariaDB
-- Versión de PHP: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
  `movi_codigo` int(11) NOT NULL AUTO_INCREMENT,
  `fk_par_inversionistas` int(11) NOT NULL,
  `movi_tipo` varchar(1) NOT NULL,
  `movi_descripcion` varchar(100) NOT NULL,
  `movi_fecha` datetime NOT NULL,
  `movi_monto` decimal(10,0) NOT NULL,
  `fc` datetime NOT NULL,
  `uc` int(11) NOT NULL,
  PRIMARY KEY (`movi_codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=84 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_par_clientes`
--

DROP TABLE IF EXISTS `tb_par_clientes`;
CREATE TABLE IF NOT EXISTS `tb_par_clientes` (
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
  UNIQUE KEY `clie_identificacion` (`clie_identificacion`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_par_tipos`
--

DROP TABLE IF EXISTS `tb_par_tipos`;
CREATE TABLE IF NOT EXISTS `tb_par_tipos` (
  `tipo_codigo` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_descripcion` varchar(56) NOT NULL,
  `fk_par_estados` int(11) NOT NULL DEFAULT 1,
  `fc` datetime NOT NULL,
  `uc` int(11) NOT NULL,
  `fm` datetime DEFAULT NULL,
  `um` int(11) DEFAULT NULL,
  PRIMARY KEY (`tipo_codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tb_par_tipos`
--

INSERT INTO `tb_par_tipos` (`tipo_codigo`, `tipo_descripcion`, `fk_par_estados`, `fc`, `uc`, `fm`, `um`) VALUES
(1, 'Cédula de Ciudadanía', 1, '2018-10-15 09:10:32', 1, '2020-07-07 00:07:00', 1),
(2, 'NIT', 1, '2020-07-07 00:07:41', 1, NULL, NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=112 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_pre_participacion`
--

DROP TABLE IF EXISTS `tb_pre_participacion`;
CREATE TABLE IF NOT EXISTS `tb_pre_participacion` (
  `prpa_codigo` int(11) NOT NULL AUTO_INCREMENT,
  `fk_pre_prestamos` int(11) NOT NULL,
  `fk_par_inversionistas` int(11) NOT NULL,
  `prpa_porcentaje` decimal(10,2) NOT NULL,
  PRIMARY KEY (`prpa_codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_pre_prestamos`
--

DROP TABLE IF EXISTS `tb_pre_prestamos`;
CREATE TABLE IF NOT EXISTS `tb_pre_prestamos` (
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
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tb_seg_inquilinos`
--

INSERT INTO `tb_seg_inquilinos` (`inqu_codigo`, `inqu_nombre`, `inqu_apellido`, `inqu_celular`, `inqu_correo`, `inqu_base_datos`, `fk_par_estados`, `fc`, `uc`, `fm`, `um`) VALUES
(1, 'Gloricet', 'Marin', '3101001010', 'q@q.com', 'bd_st_cliente_1', 1, '2020-12-21 17:04:25', 1, '2020-12-21 18:19:20', 1);

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
  `perf_codigo` int(11) NOT NULL AUTO_INCREMENT,
  `perf_descripcion` varchar(50) NOT NULL,
  `fk_par_estados` int(11) NOT NULL DEFAULT 1,
  `fc` datetime DEFAULT NULL,
  `uc` int(11) DEFAULT NULL,
  `fm` datetime DEFAULT NULL,
  `um` int(11) DEFAULT NULL,
  PRIMARY KEY (`perf_codigo`),
  UNIQUE KEY `perf_descripcion` (`perf_descripcion`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tb_seg_perfiles`
--

INSERT INTO `tb_seg_perfiles` (`perf_codigo`, `perf_descripcion`, `fk_par_estados`, `fc`, `uc`, `fm`, `um`) VALUES
(1, 'root', 1, '0000-00-00 00:00:00', 0, NULL, NULL),
(2, 'Administrador', 1, '2020-12-21 18:14:10', 1, NULL, NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=233 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tb_seg_permisos`
--

INSERT INTO `tb_seg_permisos` (`perm_codigo`, `fk_seg_perfiles`, `fk_seg_opciones`, `fk_par_estados`, `perm_c`, `perm_r`, `perm_u`, `perm_d`, `perm_l`) VALUES
(13, 5, 1004, 1, 1, 0, 0, 0, 0),
(14, 5, 2001, 1, 1, 1, 1, 0, 1),
(36, 6, 1004, 1, 1, 0, 0, 0, 0),
(37, 6, 2001, 1, 0, 0, 0, 0, 1),
(102, 3, 1001, 1, 1, 1, 1, 0, 1),
(103, 3, 1002, 1, 1, 1, 1, 0, 1),
(104, 3, 1003, 1, 1, 1, 1, 0, 1),
(105, 3, 1004, 1, 1, 1, 1, 0, 1),
(106, 3, 2001, 1, 1, 1, 1, 0, 1),
(107, 3, 2002, 1, 1, 1, 1, 0, 1),
(108, 3, 2003, 1, 1, 1, 1, 1, 1),
(109, 3, 3001, 1, 1, 1, 1, 0, 1),
(110, 3, 4001, 1, 1, 1, 1, 0, 1),
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
(232, 1, 4001, 1, 1, 1, 1, 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_seg_usuarios`
--

DROP TABLE IF EXISTS `tb_seg_usuarios`;
CREATE TABLE IF NOT EXISTS `tb_seg_usuarios` (
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
  UNIQUE KEY `usua_login` (`usua_login`),
  UNIQUE KEY `usua_mail` (`usua_mail`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tb_seg_usuarios`
--

INSERT INTO `tb_seg_usuarios` (`usua_codigo`, `usua_nombre`, `usua_mail`, `usua_login`, `usua_clave`, `fk_seg_perfiles`, `usua_token`, `usua_vcto_token`, `fk_par_estados`, `fc`, `uc`, `fm`, `um`) VALUES
(1, 'Usuario Root', 'jaguilar.8709@gmail.com', 'root', '698d51a19d8a121ce581499d7b701668', 1, '', '2020-09-10 17:49:55', 1, '2017-07-01 10:00:00', 0, '2020-09-10 17:09:05', 1),
(3, 'Administrador Prueba', 'q@q.com', 'admin.prueba', '202cb962ac59075b964b07152d234b70', 3, NULL, NULL, 1, '2018-10-13 17:10:15', 0, '2018-10-13 17:10:26', 1),
(19, 'Gloris Marin', 'glorimariana@gmail.com', 'gmarin', '202cb962ac59075b964b07152d234b70', 3, NULL, NULL, 1, '2020-09-10 17:09:00', 1, NULL, NULL),
(20, 'Carlos Andres  Herrera ', 'carlos.barrera@gmail.com', 'carlos.andres', '202cb962ac59075b964b07152d234b70', 8, NULL, NULL, 1, '2020-09-10 17:09:12', 19, NULL, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
