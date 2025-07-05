-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 09-10-2024 a las 15:26:26
-- Versión del servidor: 10.3.15-MariaDB
-- Versión de PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `soluci15_usuarios_primax`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(4) NOT NULL,
  `usuario` text NOT NULL,
  `clave` text NOT NULL,
  `terminal` text NOT NULL,
  `rol` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `clave`, `terminal`, `rol`) VALUES
(1, 'primax', 'primax', 'bucaramanga', 'Administrador'),
(2, 'bucaramanga', 'primax', 'bucaramanga', 'Administrador'),
(3, 'bucaramanga1', 'primax', 'bucaramanga', 'Administrador'),
(4, 'bucaramanga2', 'primax', 'bucaramanga', 'Administrador'),
(5, 'bucaramanga3', 'primax', 'bucaramanga', 'Administrador'),
(6, 'primax', 'primax', 'buenaventura', 'Administrador'),
(7, 'buenaventura', 'primax', 'buenaventura', 'Administrador'),
(8, 'buenaventura1', 'primax', 'buenaventura', 'Administrador'),
(9, 'buenaventura2', 'primax', 'buenaventura', 'Administrador'),
(10, 'buenaventura3', 'primax', 'buenaventura', 'Administrador'),
(11, 'primax', 'primax', 'cartagena', 'Administrador'),
(12, 'cartagena', 'primax', 'cartagena', 'Administrador'),
(13, 'cartagena1', 'primax', 'cartagena', 'Administrador'),
(14, 'cartagena2', 'primax', 'cartagena', 'Administrador'),
(15, 'cartagena3', 'primax', 'cartagena', 'Administrador'),
(16, 'primax', 'primax', 'cartago', 'Administrador'),
(17, 'cartago', 'primax', 'cartago', 'Administrador'),
(18, 'cartago1', 'primax', 'cartago', 'Administrador'),
(19, 'cartago2', 'primax', 'cartago', 'Administrador'),
(20, 'cartago3', 'primax', 'cartago', 'Administrador'),
(21, 'primax', 'primax', 'galapa', 'Administrador'),
(22, 'galapa', 'primax', 'galapa', 'Administrador'),
(23, 'galapa1', 'primax', 'galapa', 'Administrador'),
(24, 'galapa2', 'primax', 'galapa', 'Administrador'),
(25, 'galapa3', 'primax', 'galapa', 'Administrador'),
(26, 'primax', 'primax', 'gualanday', 'Administrador'),
(27, 'gualanday', 'primax', 'gualanday', 'Administrador'),
(28, 'gualanday1', 'primax', 'gualanday', 'Administrador'),
(29, 'gualanday2', 'primax', 'gualanday', 'Administrador'),
(30, 'gualanday3', 'primax', 'gualanday', 'Administrador'),
(31, 'primax', 'primax', 'la_dorada', 'Administrador'),
(32, 'la_dorada', 'primax', 'la_dorada', 'Administrador'),
(33, 'la_dorada1', 'primax', 'la_dorada', 'Administrador'),
(34, 'la_dorada2', 'primax', 'la_dorada', 'Administrador'),
(35, 'la_dorada3', 'primax', 'la_dorada', 'Administrador'),
(36, 'primax', 'primax', 'mancilla', 'Administrador'),
(37, 'mancilla', 'primax', 'mancilla', 'Administrador'),
(38, 'mancilla1', 'primax', 'mancilla', 'Administrador'),
(39, 'mancilla2', 'primax', 'mancilla', 'Administrador'),
(40, 'mancilla3', 'primax', 'mancilla', 'Administrador'),
(41, 'primax', 'primax', 'medellin', 'Administrador'),
(42, 'medellin', 'primax', 'medellin', 'Administrador'),
(43, 'medellin1', 'primax', 'medellin', 'Administrador'),
(44, 'medellin2', 'primax', 'medellin', 'Administrador'),
(45, 'medellin3', 'primax', 'medellin', 'Administrador'),
(46, 'primax', 'primax', 'puente_aranda', 'Administrador'),
(47, 'puente_aranda', 'primax', 'puente_aranda', 'Administrador'),
(48, 'puente_aranda1', 'primax', 'puente_aranda', 'Administrador'),
(49, 'puente_aranda2', 'primax', 'puente_aranda', 'Administrador'),
(50, 'puente_aranda3', 'primax', 'puente_aranda', 'Administrador'),
(51, 'primax', 'primax', 'yumbo', 'Administrador'),
(52, 'yumbo', 'primax', 'yumbo', 'Administrador'),
(53, 'yumbo1', 'primax', 'yumbo', 'Administrador'),
(54, 'yumbo2', 'primax', 'yumbo', 'Administrador'),
(55, 'yumbo3', 'primax', 'yumbo', 'Administrador');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
