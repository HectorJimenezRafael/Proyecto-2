-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-11-2022 a las 16:51:21
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_p1`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_man`
--

CREATE TABLE `personal_man` (
  `eda` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_estado`
--

CREATE TABLE `tbl_estado` (
  `id` int(11) NOT NULL,
  `nombre_estado` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_estado`
--

INSERT INTO `tbl_estado` (`id`, `nombre_estado`) VALUES
(1, 'libre'),
(2, 'ocupado'),
(3, 'mantenimiento');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_lugar`
--

CREATE TABLE `tbl_lugar` (
  `id` int(11) NOT NULL,
  `lugar_recurso` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_lugar`
--

INSERT INTO `tbl_lugar` (`id`, `lugar_recurso`) VALUES
(1, 'interior'),
(2, 'terraza'),
(3, 'vip1'),
(4, 'vip3'),
(21, 'Siuu');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_mantenimiento`
--

CREATE TABLE `tbl_mantenimiento` (
  `id` int(11) NOT NULL,
  `id_usuario_ini` int(11) NOT NULL,
  `id_usuario_fin` int(11) DEFAULT NULL,
  `id_recurso` int(11) NOT NULL,
  `problema` text NOT NULL,
  `solucion` text DEFAULT NULL,
  `data_ini` timestamp NOT NULL DEFAULT current_timestamp(),
  `data_fin` timestamp NULL DEFAULT NULL,
  `coste` float DEFAULT NULL,
  `finalizado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_mantenimiento`
--

INSERT INTO `tbl_mantenimiento` (`id`, `id_usuario_ini`, `id_usuario_fin`, `id_recurso`, `problema`, `solucion`, `data_ini`, `data_fin`, `coste`, `finalizado`) VALUES
(3, 1, 3, 13, 'test2', 'test SOl', '2022-11-09 19:46:12', '2022-11-10 08:25:52', 34, 1),
(4, 1, 3, 12, 'silla rota', 'dtfd', '2022-11-09 19:47:46', '2022-11-10 18:21:28', 45, 1),
(5, 2, 3, 13, 'uwu', 'dtfd', '2022-11-11 10:37:14', '2022-11-11 14:15:56', 34, 1),
(6, 2, 3, 12, 'uwu', 'dtfd', '2022-11-11 10:41:36', '2022-11-11 14:16:01', 34, 1),
(7, 2, 3, 11, 'Se ha roto la mesa', '34', '2022-11-11 13:53:31', '2022-11-11 14:16:07', 34, 1),
(8, 2, 3, 12, 'uwu', 'xdddddd', '2022-11-11 14:39:26', '2022-11-11 17:13:24', 65, 1),
(9, 2, 3, 13, 'uwu', 'Compro sillas', '2022-11-11 14:43:27', '2022-11-11 18:12:15', 45, 1),
(10, 2, 3, 14, 'esfds', 'IKEA', '2022-11-11 14:54:47', '2022-11-12 09:34:19', 54, 1),
(11, 2, 3, 11, 'uwu', 'dtfd', '2022-11-11 14:54:53', '2022-11-11 17:12:59', 34, 1),
(12, 2, 3, 15, 'uwu', 'Comprar mesa', '2022-11-11 17:12:24', '2022-11-12 09:35:03', 45, 1),
(13, 2, 3, 8, 'huu', 'Comprar sillas', '2022-11-11 18:10:13', '2022-11-12 09:35:25', 30, 1),
(14, 2, 3, 6, 'holasoyespa', 'Comprar sillas', '2022-11-11 18:11:23', '2022-11-12 09:35:42', 33, 1),
(15, 2, NULL, 8, 'huu', NULL, '2022-11-13 14:21:39', NULL, NULL, 0),
(16, 2, NULL, 16, 'Se ha roto la mesa', NULL, '2022-11-14 15:52:24', NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_recurso`
--

CREATE TABLE `tbl_recurso` (
  `id` int(11) NOT NULL,
  `nombre_mesa` varchar(50) NOT NULL,
  `id_lugar` int(11) NOT NULL,
  `id_estado` int(11) NOT NULL,
  `capacidad` int(2) NOT NULL,
  `coordX` int(5) NOT NULL,
  `coordY` int(5) NOT NULL,
  `scale` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_recurso`
--

INSERT INTO `tbl_recurso` (`id`, `nombre_mesa`, `id_lugar`, `id_estado`, `capacidad`, `coordX`, `coordY`, `scale`) VALUES
(5, 'Barcelona', 2, 1, 2, 130, 360, 0.15),
(6, 'Madrid', 2, 1, 2, 130, 500, 0.15),
(7, 'Zaragoza', 1, 1, 2, 1100, 800, 0.15),
(8, 'Sevilla', 1, 3, 2, 800, 800, 0.15),
(9, 'Valencia', 1, 2, 2, 1400, 800, 0.15),
(10, 'Holanda', 2, 1, 4, 80, 700, 0.2),
(11, 'Francia', 1, 1, 4, 400, 400, 0.2),
(12, 'Luxemburgo', 1, 1, 4, 400, 700, 0.2),
(13, 'Italia', 1, 1, 4, 750, 400, 0.2),
(14, 'Inglaterra', 1, 1, 4, 750, 200, 0.2),
(15, 'Nova York', 3, 1, 6, 1400, 250, 0.2),
(16, 'Japon', 3, 3, 8, 920, 200, 0.35),
(37, 'ANDORRA', 4, 1, 2, 0, 0, 0),
(44, 'Lol', 4, 1, 2, 0, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_reserva`
--

CREATE TABLE `tbl_reserva` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `id_recurso` int(11) DEFAULT NULL,
  `data_ini` timestamp NULL DEFAULT NULL,
  `data_fin` timestamp NULL DEFAULT NULL,
  `num_clientes` int(2) DEFAULT NULL,
  `precio` float DEFAULT 0,
  `finalizado` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_reserva`
--

INSERT INTO `tbl_reserva` (`id`, `id_usuario`, `id_recurso`, `data_ini`, `data_fin`, `num_clientes`, `precio`, `finalizado`) VALUES
(28, 1, 6, '2022-11-08 19:00:06', '2022-11-08 19:00:32', 2, 34, 1),
(29, 1, 5, '2022-11-08 19:01:12', '2022-11-08 19:01:25', 1, 45, 1),
(30, 1, 6, '2022-11-09 10:55:56', '2022-11-09 10:56:52', 2, 24, 1),
(31, 1, 6, '2022-11-09 10:59:58', '2022-11-09 11:00:26', 1, 34, 1),
(32, 1, 6, '2022-11-09 11:09:12', '2022-11-09 11:09:21', 1, 4, 1),
(33, 1, 9, '2022-11-09 11:34:07', '2022-11-09 12:01:59', 1, 89, 1),
(34, 1, 8, '2022-11-09 11:38:04', '2022-11-09 12:02:03', 1, 47, 1),
(35, 1, 8, '2022-11-09 12:09:39', '2022-11-09 12:09:54', 3, 2, 1),
(36, 1, 5, '2022-11-09 12:09:58', '2022-11-09 12:10:11', 2, 5, 1),
(37, 1, 9, '2022-11-09 12:30:45', '2022-11-09 12:31:07', 1, 34, 1),
(38, 1, 9, '2022-11-09 15:43:39', '2022-11-09 15:44:06', 2, 290, 1),
(39, 1, 8, '2022-11-09 15:46:40', '2022-11-09 15:46:55', 2, 45, 1),
(40, 1, 9, '2022-11-09 15:49:07', '2022-11-09 15:49:21', 2, 34, 1),
(41, 1, 14, '2022-11-09 16:01:15', '2022-11-09 16:01:47', 3, 89, 1),
(42, 1, 15, '2022-11-09 16:25:03', '2022-11-09 16:25:14', 4, 99, 1),
(43, 1, 14, '2022-11-09 16:33:07', '2022-11-09 16:36:16', 4, 50, 1),
(44, 1, 16, '2022-11-09 16:33:58', '2022-11-09 16:35:12', 8, 50, 1),
(45, 1, 16, '2022-11-09 18:16:12', '2022-11-09 18:17:11', 6, 89, 1),
(46, 1, 14, '2022-11-09 18:55:38', '2022-11-10 07:51:59', 3, 56, 1),
(47, 1, 11, '2022-11-10 14:10:35', '2022-11-10 14:10:57', 3, 4, 1),
(48, 1, 14, '2022-11-10 14:12:01', '2022-11-10 14:12:17', 0, 3, 1),
(49, 2, 13, '2022-11-11 10:10:21', '2022-11-11 10:12:04', 4, 67, 1),
(50, 2, 13, '2022-11-11 10:31:11', '2022-11-11 10:31:15', 0, 0, 1),
(51, 2, 12, '2022-11-11 10:35:06', '2022-11-11 10:35:13', 0, 0, 1),
(52, 2, 14, '2022-11-11 10:43:43', '2022-11-11 10:43:54', 0, 0, 1),
(53, 2, 14, '2022-11-11 13:53:48', '2022-11-11 13:53:53', 3, 34, 1),
(54, 2, 5, '2022-11-11 14:14:41', '2022-11-11 14:14:52', 2, 36, 1),
(55, 2, 8, '2022-11-11 17:11:57', '2022-11-11 17:12:08', 2, 67, 1),
(56, 2, 5, '2022-11-12 09:32:59', '2022-11-12 09:33:23', 2, 45, 1),
(57, 2, 9, '2022-11-13 14:56:18', NULL, 2, 0, 0),
(58, 2, 11, '2022-11-13 16:10:53', '2022-11-13 16:11:01', 3, 4, 1),
(59, 2, 10, '2022-11-14 15:51:06', '2022-11-14 15:51:34', 4, 56, 1),
(60, 2, 37, '2022-11-16 08:59:40', '2022-11-16 09:00:23', 2, 35, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_usuarios`
--

CREATE TABLE `tbl_usuarios` (
  `id` int(11) NOT NULL,
  `usuario_nombre` varchar(25) DEFAULT NULL,
  `usuario_password` varchar(100) DEFAULT NULL,
  `usuario_tipo` int(11) NOT NULL,
  `Apellido` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_usuarios`
--

INSERT INTO `tbl_usuarios` (`id`, `usuario_nombre`, `usuario_password`, `usuario_tipo`, `Apellido`) VALUES
(1, 'Sergio', '7a9a93a93e4f3824b7be8f9acd43894f76b2776e4c33bbb5eb1cf1ba4beaaf01', 1, 'Fernandez'),
(2, 'Hector', '7a9a93a93e4f3824b7be8f9acd43894f76b2776e4c33bbb5eb1cf1ba4beaaf01', 1, 'Falco'),
(3, 'Oscar', '7a9a93a93e4f3824b7be8f9acd43894f76b2776e4c33bbb5eb1cf1ba4beaaf01', 2, 'Hola'),
(4, 'Pique', 'lol', 1, 'Federic'),
(5, 'Bernabeu', 'lol', 1, 'Jimenez'),
(6, 'Gerard', 'Ernesto', 1, 'Gomez'),
(7, 'Gerard', 'sdad', 1, 'Rafael'),
(10, 'Antonio', 'qdw', 1, 'pedri'),
(12, 'Manuel', NULL, 2, 'Perez'),
(14, 'Alfredo', 'sxsd', 2, 'Vallejo'),
(16, 'Rafa', 'sxcsd', 2, 'Marquez'),
(18, 'Deulofeu', 'sxs', 2, 'Adama'),
(20, 'Busquets', 'scx cs', 2, 'Romeu'),
(23, 'PEDRIIII', NULL, 2, 'Hector');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_usuario_tipo`
--

CREATE TABLE `tbl_usuario_tipo` (
  `id` int(11) NOT NULL,
  `tipo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_usuario_tipo`
--

INSERT INTO `tbl_usuario_tipo` (`id`, `tipo`) VALUES
(1, 'camarero'),
(2, 'mantenimineto');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_estado`
--
ALTER TABLE `tbl_estado`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbl_lugar`
--
ALTER TABLE `tbl_lugar`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbl_mantenimiento`
--
ALTER TABLE `tbl_mantenimiento`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario_ini`,`id_recurso`),
  ADD KEY `id_recurso` (`id_recurso`),
  ADD KEY `id_usuario_fin` (`id_usuario_fin`);

--
-- Indices de la tabla `tbl_recurso`
--
ALTER TABLE `tbl_recurso`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_lugar` (`id_lugar`,`id_estado`),
  ADD KEY `id_estado` (`id_estado`);

--
-- Indices de la tabla `tbl_reserva`
--
ALTER TABLE `tbl_reserva`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`,`id_recurso`),
  ADD KEY `id_recurso` (`id_recurso`);

--
-- Indices de la tabla `tbl_usuarios`
--
ALTER TABLE `tbl_usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Apellido` (`id`),
  ADD KEY `usuario_tipo` (`usuario_tipo`);

--
-- Indices de la tabla `tbl_usuario_tipo`
--
ALTER TABLE `tbl_usuario_tipo`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_estado`
--
ALTER TABLE `tbl_estado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tbl_lugar`
--
ALTER TABLE `tbl_lugar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `tbl_mantenimiento`
--
ALTER TABLE `tbl_mantenimiento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `tbl_recurso`
--
ALTER TABLE `tbl_recurso`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT de la tabla `tbl_reserva`
--
ALTER TABLE `tbl_reserva`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT de la tabla `tbl_usuarios`
--
ALTER TABLE `tbl_usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `tbl_usuario_tipo`
--
ALTER TABLE `tbl_usuario_tipo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tbl_mantenimiento`
--
ALTER TABLE `tbl_mantenimiento`
  ADD CONSTRAINT `tbl_mantenimiento_ibfk_1` FOREIGN KEY (`id_usuario_ini`) REFERENCES `tbl_usuarios` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tbl_mantenimiento_ibfk_2` FOREIGN KEY (`id_recurso`) REFERENCES `tbl_recurso` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tbl_mantenimiento_ibfk_3` FOREIGN KEY (`id_usuario_fin`) REFERENCES `tbl_usuarios` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `tbl_recurso`
--
ALTER TABLE `tbl_recurso`
  ADD CONSTRAINT `tbl_recurso_ibfk_1` FOREIGN KEY (`id_lugar`) REFERENCES `tbl_lugar` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tbl_recurso_ibfk_3` FOREIGN KEY (`id_estado`) REFERENCES `tbl_estado` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `tbl_reserva`
--
ALTER TABLE `tbl_reserva`
  ADD CONSTRAINT `tbl_reserva_ibfk_1` FOREIGN KEY (`id_recurso`) REFERENCES `tbl_recurso` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tbl_reserva_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `tbl_usuarios` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `tbl_usuarios`
--
ALTER TABLE `tbl_usuarios`
  ADD CONSTRAINT `tbl_usuarios_ibfk_1` FOREIGN KEY (`usuario_tipo`) REFERENCES `tbl_usuario_tipo` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
