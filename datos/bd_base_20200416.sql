-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-04-2020 a las 16:28:54
-- Versión del servidor: 10.1.31-MariaDB
-- Versión de PHP: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_base`
--
CREATE DATABASE IF NOT EXISTS `bd_base` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `bd_base`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_par_estados`
--

DROP TABLE IF EXISTS `tb_par_estados`;
CREATE TABLE IF NOT EXISTS `tb_par_estados` (
  `esta_codigo` int(11) NOT NULL AUTO_INCREMENT,
  `esta_descripcion` varchar(80) NOT NULL,
  PRIMARY KEY (`esta_codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_seg_perfiles`
--

DROP TABLE IF EXISTS `tb_seg_perfiles`;
CREATE TABLE IF NOT EXISTS `tb_seg_perfiles` (
  `perf_codigo` int(11) NOT NULL AUTO_INCREMENT,
  `perf_descripcion` varchar(80) NOT NULL,
  `fk_par_estados` int(11) NOT NULL DEFAULT '1',
  `uc` int(11) NOT NULL,
  `fc` datetime NOT NULL,
  `um` int(11) DEFAULT NULL,
  `fm` datetime DEFAULT NULL,
  PRIMARY KEY (`perf_codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_seg_usuarios`
--

DROP TABLE IF EXISTS `tb_seg_usuarios`;
CREATE TABLE IF NOT EXISTS `tb_seg_usuarios` (
  `usua_correo` varchar(255) NOT NULL,
  `usua_nombre` varchar(100) NOT NULL,
  `usua_apellido` varchar(100) NOT NULL,
  `fk_seg_perfil` int(11) NOT NULL,
  `fk_par_estados` int(11) NOT NULL DEFAULT '1',
  `usua_clave` varchar(100) NOT NULL,
  `uc` int(11) NOT NULL,
  `fc` datetime NOT NULL,
  `um` int(11) DEFAULT NULL,
  `fm` datetime DEFAULT NULL,
  PRIMARY KEY (`usua_correo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tb_seg_usuarios`
--

INSERT INTO `tb_seg_usuarios` (`usua_correo`, `usua_nombre`, `usua_apellido`, `fk_seg_perfil`, `fk_par_estados`, `usua_clave`, `uc`, `fc`, `um`, `fm`) VALUES
('jaguilar.8709@gmail.com', 'Jorge', 'Aguilar', 1, 1, '202cb962ac59075b964b07152d234b70', 1, '1900-01-01 00:00:00', NULL, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
