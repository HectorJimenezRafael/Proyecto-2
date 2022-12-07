-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-12-2022 a las 13:27:19
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
-- Base de datos: `bd_2223_jimenezhector`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fecha`
--

CREATE TABLE `fecha` (
  `id` int(11) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- Estructura de tabla para la tabla `tbl_horas`
--

CREATE TABLE `tbl_horas` (
  `id` int(11) NOT NULL,
  `hora` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_horas`
--

INSERT INTO `tbl_horas` (`id`, `hora`) VALUES
(1, '15:00:00'),
(2, '16:00:00'),
(3, '17:00:00'),
(4, '18:00:00'),
(5, '19:00:00'),
(6, '20:00:00'),
(7, '21:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_horas_final`
--

CREATE TABLE `tbl_horas_final` (
  `id` int(11) NOT NULL,
  `hora_final` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_horas_final`
--

INSERT INTO `tbl_horas_final` (`id`, `hora_final`) VALUES
(1, '16:00:00'),
(2, '17:00:00'),
(3, '18:00:00'),
(4, '19:00:00'),
(5, '20:00:00'),
(6, '21:00:00'),
(7, '22:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_lugar`
--

CREATE TABLE `tbl_lugar` (
  `id` int(11) NOT NULL,
  `lugar_recurso` varchar(50) NOT NULL,
  `img_lugar` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_lugar`
--

INSERT INTO `tbl_lugar` (`id`, `lugar_recurso`, `img_lugar`) VALUES
(1, 'interior', '../assets/img/mesas/interior.png'),
(2, 'terraza', '../assets/img/mesas/terraza.png'),
(3, 'vip1', '../assets/img/mesas/vip.png'),
(23, 'uwu2', '../assets/img/mesas/ochako.webp');

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
(13, 2, 3, 8, 'huu', 'Comprar sillas', '2022-11-11 18:10:13', '2022-11-12 09:35:25', 30, 1),
(14, 2, 3, 6, 'holasoyespa', 'Comprar sillas', '2022-11-11 18:11:23', '2022-11-12 09:35:42', 33, 1),
(15, 2, 3, 8, 'huu', 'UWW', '2022-11-13 14:21:39', '2022-12-03 18:22:48', 2, 1),
(17, 2, 3, 51, 'lol', 'UWU', '2022-12-02 16:16:41', '2022-12-03 18:22:59', 34, 1),
(18, 2, 3, 11, 'ASQUEROSOS', 'lol', '2022-12-03 18:23:33', '2022-12-07 12:03:09', 56, 1),
(19, 2, 3, 6, 'muxa cum', 'robar mesas', '2022-12-03 18:24:19', '2022-12-07 12:03:21', 67, 1);

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
  `img_recurso` varchar(256) NOT NULL,
  `coordX` int(5) NOT NULL,
  `coordY` int(5) NOT NULL,
  `scale` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_recurso`
--

INSERT INTO `tbl_recurso` (`id`, `nombre_mesa`, `id_lugar`, `id_estado`, `capacidad`, `img_recurso`, `coordX`, `coordY`, `scale`) VALUES
(5, 'Barcelona', 2, 1, 2, '../assets/img/mesas/mesa_fina.webp', 130, 360, 0.15),
(6, 'Madrid', 2, 1, 4, '../assets/img/mesas/mesa_4_2.png', 130, 500, 0.15),
(7, 'Zaragoza', 1, 1, 2, '../assets/img/mesas/mesa_def-removebg-preview.png', 1100, 800, 0.15),
(8, 'Sevilla', 1, 1, 2, '../assets/img/mesas/mesa_def-removebg-preview.png', 800, 800, 0.15),
(9, 'Valencia', 1, 1, 2, '../assets/img/mesas/mesa_azul.png', 1400, 800, 0.15),
(10, 'Holanda', 2, 1, 4, '../assets/img/mesas/mesa_4_2.png', 80, 700, 0.2),
(11, 'Francia', 1, 1, 4, '../assets/img/mesas/mesa_4_2.png', 400, 400, 0.2),
(12, 'Luxemburgo', 1, 1, 4, '../assets/img/mesas/mesa_4_1.png', 400, 700, 0.2),
(13, 'Italia', 2, 1, 4, '../assets/img/mesas/mesa_4_1.png', 750, 400, 0.2),
(14, 'Inglaterra', 1, 1, 4, '../assets/img/mesas/mesa_4_1.png', 750, 200, 0.2),
(51, 'Japón', 3, 1, 6, '../assets/img/mesas/mesa_6-removebg-preview.png', 0, 0, 0),
(54, 'OCHAKITO', 1, 1, 2, '../assets/img/mesas/mesa_azul.png', 0, 0, 0);

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
(1006, 2, 11, '2022-12-01 15:48:46', '2022-12-01 15:49:01', 4, 45, 1),
(1007, 2, 13, '2022-12-01 15:50:59', '2022-12-01 15:52:26', 4, 34, 1),
(1009, 2, 9, '2022-12-01 15:56:41', '2022-12-01 15:57:41', 2, 34, 1),
(1010, 2, 9, '2022-12-01 15:58:40', '2022-12-01 15:58:59', 2, 34, 1),
(1011, 2, 7, '2022-12-01 17:34:48', '2022-12-01 17:40:03', 2, 34, 1),
(1012, 2, 7, '2022-12-01 20:23:00', '2022-12-01 20:23:16', 2, 45, 1),
(1013, 2, 7, '2022-12-01 20:28:00', '2022-12-01 20:28:17', 2, 45, 1),
(1014, 2, 9, '2022-12-01 20:32:22', '2022-12-01 20:32:32', 2, 34, 1),
(1015, 2, 8, '2022-12-02 16:16:10', '2022-12-03 18:21:52', 2, 45, 1),
(1016, 2, 10, '2022-12-03 12:10:02', '2022-12-03 18:22:02', 4, 56, 1),
(1017, 2, 7, '2022-12-05 14:33:00', '2022-12-05 14:58:08', 2, 34, 1),
(1018, 2, 7, '2022-12-05 15:21:50', '2022-12-05 15:37:22', 2, 34, 1),
(1019, 2, 7, '2022-12-05 15:43:00', '2022-12-05 15:46:03', 2, 34, 1),
(1020, 2, 7, '2022-12-05 15:49:00', '2022-12-05 15:57:04', 2, 34, 1),
(1021, 2, 7, '2022-12-05 16:23:00', '2022-12-05 16:25:03', 2, 34, 1),
(1022, 2, 7, '2022-12-05 16:47:00', '2022-12-05 16:48:00', 2, 35, 1),
(1023, 2, 7, '2022-12-06 12:26:00', '2022-12-06 12:27:00', 2, 35, 1),
(1024, 2, 8, '2022-12-06 20:35:11', '2022-12-06 20:35:22', 2, 34, 1),
(1026, 47, 7, '2022-12-06 22:26:00', '2022-12-06 22:27:00', 2, 35, 1),
(1027, 47, 8, '2022-12-06 22:26:00', '2022-12-06 22:27:00', 2, 35, 1),
(1028, 47, 9, '2022-12-06 22:32:00', '2022-12-06 22:33:00', 2, 35, 1),
(1029, 2, 8, '2022-12-07 10:39:23', '2022-12-07 10:39:34', 2, 34, 1),
(1030, 2, 51, '2022-12-07 10:54:23', '2022-12-07 10:54:32', 6, 34, 1),
(1031, 47, 7, '2022-12-07 12:00:00', '2022-12-07 12:01:00', 2, 35, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_reserva_online`
--

CREATE TABLE `tbl_reserva_online` (
  `id` int(11) NOT NULL,
  `nombre_res_o` varchar(100) NOT NULL,
  `apellido_res_o` varchar(100) NOT NULL,
  `correo_res_o` varchar(100) NOT NULL,
  `telefono_res_o` char(9) NOT NULL,
  `id_mesa` int(11) NOT NULL,
  `id_lugar` int(11) NOT NULL,
  `dia` date NOT NULL,
  `hora_res_o` int(11) NOT NULL,
  `id_hora_res_o_final` int(11) NOT NULL,
  `ocupacion_res_o` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_reserva_online`
--

INSERT INTO `tbl_reserva_online` (`id`, `nombre_res_o`, `apellido_res_o`, `correo_res_o`, `telefono_res_o`, `id_mesa`, `id_lugar`, `dia`, `hora_res_o`, `id_hora_res_o_final`, `ocupacion_res_o`) VALUES
(34, 'qsad', 'sax', 'sergio@gmail.com', '123456789', 7, 1, '2022-12-06', 1, 1, 2),
(35, 'qsad', 'sax', 'hectorjimenezrafael18@gmail.com', '123456789', 7, 1, '2022-12-07', 1, 1, 2),
(39, 'qsad', 'nm k', 'hectorjimenezrafael18@gmail.com', '123456789', 7, 1, '2022-12-01', 1, 1, 2),
(40, 'qsad', 'sax', 'hectorjimenezrafael18@gmail.com', '123456789', 8, 1, '2022-12-06', 1, 1, 2),
(46, 'mlkl', 'ml,lm', 'sergio@gmail.com', '123456789', 8, 1, '2022-12-07', 1, 1, 2),
(47, 'qsad', 'sax', 'sergio@gmail.com', '123456789', 9, 1, '2022-12-07', 1, 1, 2),
(49, 'qsad', 'sax', 'hectorjimenezrafael18@gmail.com', '123456789', 54, 1, '2022-12-07', 1, 1, 2),
(51, 'qsad', 'sax', 'hectorjimenezrafael18@gmail.com', '123456789', 7, 1, '2022-12-08', 2, 2, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_usuarios`
--

CREATE TABLE `tbl_usuarios` (
  `id` int(11) NOT NULL,
  `usuario_nombre` varchar(25) DEFAULT NULL,
  `usuario_password` varchar(100) DEFAULT NULL,
  `usuario_tipo` int(11) NOT NULL,
  `Apellido` varchar(256) NOT NULL,
  `telefono` char(9) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `admin` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_usuarios`
--

INSERT INTO `tbl_usuarios` (`id`, `usuario_nombre`, `usuario_password`, `usuario_tipo`, `Apellido`, `telefono`, `correo`, `admin`) VALUES
(1, 'Sergio', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', 1, 'Fernandez', '604778089', 'sergio@gmail.com', 0),
(2, 'Hector', '7a9a93a93e4f3824b7be8f9acd43894f76b2776e4c33bbb5eb1cf1ba4beaaf01', 1, 'Falcos', '660343032', 'hector@gmail.com', 1),
(3, 'Oscar', '7a9a93a93e4f3824b7be8f9acd43894f76b2776e4c33bbb5eb1cf1ba4beaaf01', 2, 'Perez', '747066426', 'oscar@gmail.com', 0),
(41, 'Mercedes', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', 1, 'Pons', '671234589', 'merche@gmail.com', 0),
(45, 'Deku', '7a9a93a93e4f3824b7be8f9acd43894f76b2776e4c33bbb5eb1cf1ba4beaaf01', 1, 'Jimenez', '654321789', 'izuku@gmail.com', 0),
(47, 'DAW', '7a9a93a93e4f3824b7be8f9acd43894f76b2776e4c33bbb5eb1cf1ba4beaaf01', 3, 'restaurante', '666666777', 'daw@gmail.com', 1),
(48, 'Federico', '7a9a93a93e4f3824b7be8f9acd43894f76b2776e4c33bbb5eb1cf1ba4beaaf01', 1, 'Gonzalez', '666677777', 'fede@gmail.com', 0),
(49, 'Pedri', '7a9a93a93e4f3824b7be8f9acd43894f76b2776e4c33bbb5eb1cf1ba4beaaf01', 1, 'Gonzalez', '645321987', 'pedri@gmail.com', 0),
(50, 'Antonio', '7a9a93a93e4f3824b7be8f9acd43894f76b2776e4c33bbb5eb1cf1ba4beaaf01', 1, 'Rafael', '691352688', 'Antoni@gmail.com', 0),
(51, 'Unai', '7a9a93a93e4f3824b7be8f9acd43894f76b2776e4c33bbb5eb1cf1ba4beaaf01', 1, 'Simon', '729056535', 'portero@gmail.com', 0),
(52, 'Ochako', '7a9a93a93e4f3824b7be8f9acd43894f76b2776e4c33bbb5eb1cf1ba4beaaf01', 1, 'Aragall', '610203673', 'ocha@gmail.com', 0),
(53, 'Gavi', '7a9a93a93e4f3824b7be8f9acd43894f76b2776e4c33bbb5eb1cf1ba4beaaf01', 1, 'Rafael', '670100250', 'furbo@gmail.com', 0),
(54, 'Hector', '7a9a93a93e4f3824b7be8f9acd43894f76b2776e4c33bbb5eb1cf1ba4beaaf01', 1, 'Helio', '761228133', 'helio@gmail.com', 0),
(55, 'Marcos', '7a9a93a93e4f3824b7be8f9acd43894f76b2776e4c33bbb5eb1cf1ba4beaaf01', 2, 'Alonso', '678526785', 'marcos@gmail.com', 0),
(56, 'Marcos', '7a9a93a93e4f3824b7be8f9acd43894f76b2776e4c33bbb5eb1cf1ba4beaaf01', 2, 'Llorente', '778526785', 'mlloren@gmail.com', 0),
(57, 'Romario', '7a9a93a93e4f3824b7be8f9acd43894f76b2776e4c33bbb5eb1cf1ba4beaaf01', 2, 'Perez', '775626785', 'roma@gmail.com', 0),
(58, 'Pepito', '7a9a93a93e4f3824b7be8f9acd43894f76b2776e4c33bbb5eb1cf1ba4beaaf01', 2, 'Ronaldo', '778543691', 'rona@gmail.com', 0),
(59, 'Mercedes', '7a9a93a93e4f3824b7be8f9acd43894f76b2776e4c33bbb5eb1cf1ba4beaaf01', 2, 'Madalena', '645526785', 'mad@gmail.com', 0),
(60, 'Oscar', '7a9a93a93e4f3824b7be8f9acd43894f76b2776e4c33bbb5eb1cf1ba4beaaf01', 2, 'Garcia', '648526785', 'osga@gmail.com', 0),
(61, 'Raul', '7a9a93a93e4f3824b7be8f9acd43894f76b2776e4c33bbb5eb1cf1ba4beaaf01', 2, 'Garcia', '605005166', 'raul@gmail.com', 0);

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
(2, 'mantenimineto'),
(3, 'online');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `fecha`
--
ALTER TABLE `fecha`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbl_estado`
--
ALTER TABLE `tbl_estado`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbl_horas`
--
ALTER TABLE `tbl_horas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbl_horas_final`
--
ALTER TABLE `tbl_horas_final`
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
-- Indices de la tabla `tbl_reserva_online`
--
ALTER TABLE `tbl_reserva_online`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hora_res_o` (`hora_res_o`),
  ADD KEY `id_mesa` (`id_mesa`),
  ADD KEY `id_lugar` (`id_lugar`),
  ADD KEY `id_hora_res_o_final` (`id_hora_res_o_final`);

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
-- AUTO_INCREMENT de la tabla `fecha`
--
ALTER TABLE `fecha`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_estado`
--
ALTER TABLE `tbl_estado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tbl_horas`
--
ALTER TABLE `tbl_horas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `tbl_horas_final`
--
ALTER TABLE `tbl_horas_final`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `tbl_lugar`
--
ALTER TABLE `tbl_lugar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `tbl_mantenimiento`
--
ALTER TABLE `tbl_mantenimiento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `tbl_recurso`
--
ALTER TABLE `tbl_recurso`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT de la tabla `tbl_reserva`
--
ALTER TABLE `tbl_reserva`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1032;

--
-- AUTO_INCREMENT de la tabla `tbl_reserva_online`
--
ALTER TABLE `tbl_reserva_online`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT de la tabla `tbl_usuarios`
--
ALTER TABLE `tbl_usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT de la tabla `tbl_usuario_tipo`
--
ALTER TABLE `tbl_usuario_tipo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
-- Filtros para la tabla `tbl_reserva_online`
--
ALTER TABLE `tbl_reserva_online`
  ADD CONSTRAINT `tbl_reserva_online_ibfk_1` FOREIGN KEY (`id_lugar`) REFERENCES `tbl_lugar` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_reserva_online_ibfk_2` FOREIGN KEY (`id_mesa`) REFERENCES `tbl_recurso` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_reserva_online_ibfk_3` FOREIGN KEY (`hora_res_o`) REFERENCES `tbl_horas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_reserva_online_ibfk_4` FOREIGN KEY (`id_hora_res_o_final`) REFERENCES `tbl_horas_final` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_usuarios`
--
ALTER TABLE `tbl_usuarios`
  ADD CONSTRAINT `tbl_usuarios_ibfk_1` FOREIGN KEY (`usuario_tipo`) REFERENCES `tbl_usuario_tipo` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
