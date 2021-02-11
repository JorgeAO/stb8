CREATE DATABASE bd_st_nueva;

USE bd_st_nueva;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_caj_movimientos`
--

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
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_par_clientes`
--

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
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_par_estados`
--

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
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_par_tipos_identificacion`
--

CREATE TABLE IF NOT EXISTS `tb_par_tipos_identificacion` (
  `tiid_codigo` int(11) NOT NULL AUTO_INCREMENT,
  `tiid_descripcion` varchar(80) NOT NULL,
  `fk_par_estados` int(11) NOT NULL DEFAULT 1,
  `fc` datetime NOT NULL,
  `uc` int(11) NOT NULL,
  `fm` datetime DEFAULT NULL,
  `um` int(11) DEFAULT NULL,
  PRIMARY KEY (`tiid_codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_pre_participacion`
--

CREATE TABLE IF NOT EXISTS `tb_pre_participacion` (
  `prpa_codigo` int(11) NOT NULL AUTO_INCREMENT,
  `fk_pre_prestamos` int(11) NOT NULL,
  `fk_par_inversionistas` int(11) NOT NULL,
  `prpa_porcentaje` decimal(10,2) NOT NULL,
  PRIMARY KEY (`prpa_codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_pre_prestamos`
--

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
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_seg_modulos`
--

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
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tb_seg_permisos`
--

INSERT INTO `tb_seg_permisos` (`perm_codigo`, `fk_seg_perfiles`, `fk_seg_opciones`, `fk_par_estados`, `perm_c`, `perm_r`, `perm_u`, `perm_d`, `perm_l`) VALUES
  (1, 5, 1004, 1, 1, 0, 0, 0, 0),
  (2, 5, 2001, 1, 1, 1, 1, 0, 1),
  (3, 6, 1004, 1, 1, 0, 0, 0, 0),
  (4, 6, 2001, 1, 0, 0, 0, 0, 1),
  (5, 3, 1001, 1, 1, 1, 1, 0, 1),
  (6, 3, 1002, 1, 1, 1, 1, 0, 1),
  (7, 3, 1003, 1, 1, 1, 1, 0, 1),
  (8, 3, 1004, 1, 1, 1, 1, 0, 1),
  (9, 3, 2001, 1, 1, 1, 1, 0, 1),
  (10, 3, 2002, 1, 1, 1, 1, 0, 1),
  (11, 3, 2003, 1, 1, 1, 1, 1, 1),
  (12, 3, 3001, 1, 1, 1, 1, 0, 1),
  (13, 3, 4001, 1, 1, 1, 1, 0, 1),
  (14, 1, 1001, 1, 1, 1, 1, 1, 1),
  (15, 1, 1002, 1, 1, 1, 1, 1, 1),
  (16, 1, 1003, 1, 1, 1, 1, 1, 1),
  (17, 1, 1004, 1, 1, 1, 1, 1, 0),
  (18, 1, 1005, 1, 1, 1, 1, 1, 0),
  (19, 1, 1006, 1, 1, 1, 1, 1, 1),
  (20, 1, 2001, 1, 1, 1, 1, 1, 1),
  (21, 1, 2002, 1, 1, 1, 1, 1, 1),
  (22, 1, 2003, 1, 1, 1, 1, 1, 1),
  (23, 1, 3001, 1, 1, 1, 1, 1, 0),
  (24, 1, 4001, 1, 1, 1, 1, 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_seg_usuarios`
--

CREATE TABLE `tb_seg_usuarios` (
  `fk_seg_inquilino` int(11) NOT NULL,
  `usua_codigo` int(11) NOT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

INSERT INTO `tb_seg_usuarios` (`fk_seg_inquilino`, `usua_codigo`, `usua_nombre`, `usua_mail`, `usua_login`, `usua_clave`, `fk_seg_perfiles`, `usua_token`, `usua_vcto_token`, `fk_par_estados`, `fc`, `uc`, `fm`, `um`) VALUES 
  ({{inquilino_id}}, '', 'Root', 'jaguilar.8709@gmail.com', 'jaguilar.8709', '202cb962ac59075b964b07152d234b70', 1, NULL, NULL, 1, '2020-03-17 06:15:00.000000', '', NULL, NULL)

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
