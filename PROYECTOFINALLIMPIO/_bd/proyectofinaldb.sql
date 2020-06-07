-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-06-2020 a las 17:03:59
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyectofinaldb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `chat`
--

CREATE TABLE `chat` (
  `id` int(11) NOT NULL,
  `idusuario` int(25) NOT NULL,
  `mensaje` varchar(200) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `chat`
--

INSERT INTO `chat` (`id`, `idusuario`, `mensaje`, `fecha`) VALUES
(10, 3, 'que pasa Juanki', '2020-05-07 12:12:51'),
(11, 3, 'que tal\r\n', '2020-05-07 12:13:09'),
(12, 3, '', '2020-05-07 12:18:13'),
(13, 3, 'HOla Nieves', '2020-05-07 12:19:47'),
(14, 3, 'que tal\r\n', '2020-05-07 12:21:54'),
(15, 3, 'hola\r\n', '2020-05-07 12:22:03'),
(16, 43, 'hola\r\n', '2020-05-21 13:57:42'),
(17, 43, 'dssdf', '2020-05-21 13:57:46'),
(18, 43, 'fsdf', '2020-05-21 13:57:48'),
(19, 43, 'fsdf', '2020-05-21 13:58:41'),
(20, 43, 'sdasdfsfsdf\r\n', '2020-05-21 13:58:47'),
(21, 43, 'sdasdfsfsdf\r\n', '2020-05-21 13:59:08'),
(22, 43, 'dsfsdfsdf', '2020-05-21 13:59:13'),
(23, 43, 'sdfsdfsdf', '2020-05-21 13:59:17'),
(24, 43, 'dfsfsdfs', '2020-05-21 13:59:21'),
(25, 43, 'sdfsdfsd', '2020-05-21 13:59:27'),
(26, 43, 'sdfsdfsd', '2020-05-21 13:59:31'),
(27, 43, 'fsdfsdfsd', '2020-05-21 13:59:35'),
(28, 43, 'fsdfsdfs', '2020-05-21 13:59:38'),
(29, 43, 'fsdfsdfs', '2020-05-21 13:59:52'),
(30, 43, 'fsdfsdfs', '2020-05-21 14:00:20'),
(31, 43, 'fsdfsdfs', '2020-05-21 14:00:50'),
(32, 43, 'fsdfsdfs', '2020-05-21 14:01:17'),
(33, 43, 'fsdfsdfs', '2020-05-21 14:01:33'),
(34, 43, 'fsdfsdfs', '2020-05-21 14:01:56'),
(35, 43, 'fsdfsdfs', '2020-05-21 14:02:10'),
(36, 43, 'fsdfsdfs', '2020-05-21 14:02:37'),
(37, 43, 'hhhd', '2020-05-21 14:03:00'),
(38, 43, 'hhhd', '2020-05-21 14:03:32'),
(39, 43, 'hhhd', '2020-05-21 14:03:48'),
(40, 43, 'hola\r\n', '2020-05-21 14:04:03'),
(41, 43, 'que haces\r\n', '2020-05-21 14:04:08'),
(42, 43, 'que haces\r\n', '2020-05-21 14:04:57'),
(43, 43, 'que haces\r\n', '2020-05-21 14:05:42'),
(44, 43, 'que haces\r\n', '2020-05-21 14:28:05'),
(45, 43, 'que haces\r\n', '2020-05-21 14:28:33'),
(46, 43, 'que haces\r\n', '2020-05-21 14:28:34'),
(47, 43, 'que haces\r\n', '2020-05-21 14:28:52'),
(48, 43, 'que haces\r\n', '2020-05-21 14:29:07'),
(49, 43, 'que haces\r\n', '2020-05-21 14:29:52'),
(50, 43, 'que haces\r\n', '2020-05-21 14:30:04'),
(51, 43, 'que haces\r\n', '2020-05-21 14:30:29'),
(52, 43, 'que haces\r\n', '2020-05-21 14:32:01'),
(53, 43, 'que haces\r\n', '2020-05-21 14:32:30'),
(54, 43, 'que haces\r\n', '2020-05-21 14:32:50'),
(55, 43, 'que haces\r\n', '2020-05-21 14:32:58'),
(56, 43, 'que haces\r\n', '2020-05-21 14:33:48'),
(57, 43, 'que haces\r\n', '2020-05-21 14:34:08'),
(58, 43, 'que haces\r\n', '2020-05-21 14:34:45'),
(59, 43, 'que haces\r\n', '2020-05-21 14:35:14'),
(60, 43, 'que haces\r\n', '2020-05-21 14:35:24'),
(61, 43, 'que haces\r\n', '2020-05-21 14:35:33'),
(62, 43, 'que haces\r\n', '2020-05-21 14:35:45'),
(63, 43, 'que haces\r\n', '2020-05-21 14:36:04'),
(64, 43, 'que haces\r\n', '2020-05-21 14:36:09'),
(65, 43, 'que haces\r\n', '2020-05-21 14:36:21'),
(66, 43, 'que haces\r\n', '2020-05-21 14:36:33'),
(67, 43, 'que haces\r\n', '2020-05-21 14:40:48'),
(68, 43, 'que haces\r\n', '2020-05-21 14:40:51'),
(69, 43, 'que haces\r\n', '2020-05-21 14:40:53'),
(70, 43, 'que haces\r\n', '2020-05-21 14:40:57'),
(71, 43, 'que haces\r\n', '2020-05-21 14:45:09'),
(72, 43, 'que haces\r\n', '2020-05-21 14:45:39'),
(73, 43, 'que haces\r\n', '2020-05-21 14:45:41'),
(74, 43, 'que haces\r\n', '2020-05-21 14:45:54'),
(75, 43, 'que haces\r\n', '2020-05-21 14:46:10'),
(76, 43, 'que haces\r\n', '2020-05-21 14:48:11'),
(77, 43, 'que haces\r\n', '2020-05-21 14:48:12'),
(78, 43, 'que haces\r\n', '2020-05-21 14:48:12'),
(79, 43, 'que haces\r\n', '2020-05-21 14:48:22'),
(80, 43, 'que haces\r\n', '2020-05-21 15:10:25'),
(81, 43, 'que haces\r\n', '2020-05-21 15:11:10'),
(82, 43, 'que haces\r\n', '2020-05-21 15:11:29'),
(83, 43, 'que haces\r\n', '2020-05-21 15:12:00'),
(84, 43, 'que haces\r\n', '2020-05-21 15:12:25'),
(85, 43, 'que haces\r\n', '2020-05-21 15:12:35'),
(86, 43, 'que haces\r\n', '2020-05-21 15:12:44'),
(87, 43, 'que haces\r\n', '2020-05-21 15:13:01'),
(88, 43, 'que haces\r\n', '2020-05-21 15:15:38'),
(89, 43, 'que haces\r\n', '2020-05-21 15:15:40'),
(90, 43, 'que haces\r\n', '2020-05-21 15:15:41'),
(91, 43, 'que haces\r\n', '2020-05-21 15:16:21'),
(92, 43, 'que haces\r\n', '2020-05-21 15:16:22'),
(93, 43, 'hola', '2020-05-21 16:07:53'),
(94, 43, 'hola', '2020-05-21 16:08:23'),
(95, 43, 'd', '2020-05-21 16:08:27'),
(96, 43, 'hola', '2020-05-21 16:08:33'),
(97, 43, 'hola', '2020-05-21 16:08:43'),
(98, 43, 'hola', '2020-05-21 16:08:48'),
(99, 43, 'hola', '2020-05-21 16:10:16'),
(100, 43, 'hola', '2020-05-21 16:10:35'),
(101, 43, 'hola', '2020-05-21 16:11:05'),
(102, 43, 'hola', '2020-05-21 16:11:34'),
(103, 43, 'hola', '2020-05-21 16:11:49'),
(104, 43, 'hola', '2020-05-21 16:12:04'),
(105, 43, 'hola', '2020-05-21 16:12:50'),
(106, 43, 'jajajaja hola que tal todo bien todo correcto', '2020-05-21 16:16:07'),
(107, 43, 'jajajaja hola que tal todo bien todo correcto', '2020-05-21 16:18:21'),
(108, 43, 'jajajaja hola que tal todo bien todo correcto', '2020-05-21 16:19:53'),
(109, 43, 'jajajaja hola que tal todo bien todo correcto', '2020-05-21 16:22:28'),
(110, 43, 'jajajaja hola que tal todo bien todo correcto', '2020-05-21 16:22:46'),
(111, 43, 'jajajaja hola que tal todo bien todo correcto', '2020-05-21 16:22:54'),
(112, 43, 'jajajaja hola que tal todo bien todo correcto', '2020-05-21 16:23:14'),
(113, 43, 'hola', '2020-05-22 16:34:57'),
(114, 43, 'que haceis\r\n', '2020-05-22 16:36:16'),
(115, 43, 'jugais?', '2020-05-22 16:36:40'),
(116, 43, 'holaaaaaaaaaaa', '2020-05-22 16:37:45'),
(117, 43, 'que tal??', '2020-05-22 16:37:51'),
(118, 43, 'juankar parguelaaa', '2020-05-22 16:37:58'),
(119, 43, 'juankar parguelaaa', '2020-05-22 16:47:09'),
(120, 43, 'juankar parguelaaa', '2020-05-22 16:47:35'),
(121, 43, 'juankar parguelaaa', '2020-05-22 16:47:42'),
(122, 43, 'juankar parguelaaa', '2020-05-22 16:48:19'),
(123, 43, 'juankar parguelaaa', '2020-05-22 16:48:31'),
(124, 43, 'juankar parguelaaa', '2020-05-22 16:48:35'),
(125, 43, 'juankar parguelaaa', '2020-05-22 16:50:25'),
(126, 43, 'juankar parguelaaa', '2020-05-22 16:50:39'),
(127, 43, 'juankar parguelaaa', '2020-05-22 16:50:47'),
(128, 43, 'juankar parguelaaa', '2020-05-22 16:50:55'),
(129, 43, 'juankar parguelaaa', '2020-05-22 16:51:20'),
(130, 43, 'juankar parguelaaa', '2020-05-22 16:54:23'),
(131, 43, 'hola', '2020-05-23 17:32:25'),
(132, 43, 'jajaja', '2020-05-24 14:09:34'),
(134, 43, 'que tal tu\r\n', '2020-05-24 14:11:14'),
(136, 43, 'asdfghjkl', '2020-05-30 15:17:36'),
(137, 43, 'hola\r\n', '2020-06-05 13:58:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `conversaciones`
--

CREATE TABLE `conversaciones` (
  `idConversacion` int(11) NOT NULL,
  `idUsuarioUno` int(11) NOT NULL,
  `idUsuarioDos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `conversaciones`
--

INSERT INTO `conversaciones` (`idConversacion`, `idUsuarioUno`, `idUsuarioDos`) VALUES
(25, 2, 3),
(26, 43, 3),
(28, 43, 41),
(32, 43, 2),
(35, 43, 43);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `emailadmin`
--

CREATE TABLE `emailadmin` (
  `id` int(11) NOT NULL,
  `host` varchar(50) DEFAULT NULL,
  `puerto` int(11) DEFAULT NULL,
  `emailEmisor` varchar(50) DEFAULT NULL,
  `contrasenna` varchar(50) DEFAULT NULL,
  `asunto` varchar(50) DEFAULT NULL,
  `cuerpo` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `emailadmin`
--

INSERT INTO `emailadmin` (`id`, `host`, `puerto`, `emailEmisor`, `contrasenna`, `asunto`, `cuerpo`) VALUES
(1, 'smtp.gmail.com', 587, 'ciclosuperiorjuanki@gmail.com', 'Juanki100398', 'Bienvenid@', 'Hola, Buenas. <br>Saludos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `juegos`
--

CREATE TABLE `juegos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(25) NOT NULL,
  `descripcion` varchar(900) NOT NULL,
  `linkImagen` varchar(100) NOT NULL,
  `imagen` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `juegos`
--

INSERT INTO `juegos` (`id`, `nombre`, `descripcion`, `linkImagen`, `imagen`) VALUES
(31, 'Pong', 'Pong (o Tele-Pong) fue un videojuego de la primera generación de videoconsolas publicado por Atari, creado por Nolan Bushnell y lanzado el 29 de noviembre de 1972. Pong está basado en el deporte de tenis de mesa (o ping pong).', '../contenido/recursos/pong.jpg', 0x696e6465782e706870),
(32, 'tetris', 'Básicamente, el tetris consiste en ir encajando piezas de diferentes formas y tamaños que caen desde la parte superior de la pantalla para completar un muro sin dejar huecos.', '../contenido/recursos/tetris.jpg', 0x696e6465782e706870),
(33, 'snake', 'El Snake (a veces también llamado la serpiente) es un videojuego lanzado a mediados de la década de 1970 que ha mantenido su popularidad desde entonces, convirtiéndose en un clásico. En 1998, el Snake obtuvo una audiencia masiva tras convertirse en un juego estándar pre-grabado en los teléfonos Nokia.', '../contenido/recursos/snake.jpg', 0x696e6465782e706870);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajes`
--

CREATE TABLE `mensajes` (
  `idConversacion` int(11) NOT NULL,
  `idMensaje` int(11) NOT NULL,
  `idAutorMensaje` int(11) NOT NULL,
  `textoMensaje` varchar(300) NOT NULL,
  `fechaMensaje` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `mensajes`
--

INSERT INTO `mensajes` (`idConversacion`, `idMensaje`, `idAutorMensaje`, `textoMensaje`, `fechaMensaje`) VALUES
(25, 28, 2, 'Hola\r\n', '2020-05-13 22:26:21'),
(26, 43, 43, 'hola bro', '2020-05-30 03:42:14'),
(35, 55, 43, 'hola\r\n', '2020-06-05 16:05:23');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recordusuario`
--

CREATE TABLE `recordusuario` (
  `idJuego` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `recordUsuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `recordusuario`
--

INSERT INTO `recordusuario` (`idJuego`, `idUsuario`, `recordUsuario`) VALUES
(31, 2, 0),
(31, 3, 0),
(31, 41, 0),
(31, 43, 4),
(32, 2, 120),
(32, 3, 240),
(32, 41, 300),
(32, 42, 120),
(32, 43, 350),
(33, 2, 0),
(33, 3, 0),
(33, 41, 0),
(33, 43, 37);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitudesamistad`
--

CREATE TABLE `solicitudesamistad` (
  `idUsuarioSolicitado` int(6) NOT NULL,
  `idUsuarioEnviador` int(6) NOT NULL,
  `estadoSolicitud` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `solicitudesamistad`
--

INSERT INTO `solicitudesamistad` (`idUsuarioSolicitado`, `idUsuarioEnviador`, `estadoSolicitud`) VALUES
(2, 3, 1),
(2, 43, 2),
(3, 43, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contrasenna` varchar(25) NOT NULL,
  `tipoUsuario` int(11) NOT NULL,
  `nombreUsuario` varchar(30) NOT NULL,
  `codigoCookie` varchar(50) DEFAULT NULL,
  `token` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `email`, `contrasenna`, `tipoUsuario`, `nombreUsuario`, `codigoCookie`, `token`) VALUES
(2, 'fran', 'fran@gmail.com', '1234', 1, 'basedfran', 'OqTb9abwYt8iZ3jPeftsF7IZu8A8FdRV', 'qwewrfsd234234sfdfsd'),
(3, 'juancarlos', 'ciclosuperiorjuanki@gmail.com', 'juanki', 1, 'juanki', NULL, 'iuhefifjn'),
(6, 'prueba', 'p@j.com', '1234', 0, 'pru', NULL, ''),
(41, 'nieves', 'ciclosuperiorjuanki@gmail.com', 'juanki', 0, 'nie', NULL, 'IvmOuULZTkDlRvOMeNwmxn7gYL1ERrY4'),
(42, 'paco', 'juankimone@hotmail.com', '1234', 0, 'paco', NULL, NULL),
(43, 'ivan', 'ivanaraujo12@gmail.com', '4321', 1, 'ivan25jr', NULL, 'FDhgsUEtAwm8oKK8Fvq4HinSJne9nGF5'),
(44, 'a', 'a@a.a', 'a', 0, 'a', NULL, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`,`idusuario`),
  ADD KEY `idusuario` (`idusuario`);

--
-- Indices de la tabla `conversaciones`
--
ALTER TABLE `conversaciones`
  ADD PRIMARY KEY (`idConversacion`),
  ADD KEY `idUsuarioUno` (`idUsuarioUno`),
  ADD KEY `idUsuarioDos` (`idUsuarioDos`);

--
-- Indices de la tabla `emailadmin`
--
ALTER TABLE `emailadmin`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `juegos`
--
ALTER TABLE `juegos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  ADD PRIMARY KEY (`idMensaje`,`idConversacion`),
  ADD KEY `idAutorMensaje` (`idAutorMensaje`),
  ADD KEY `mensajes_ibfk_1` (`idConversacion`);

--
-- Indices de la tabla `recordusuario`
--
ALTER TABLE `recordusuario`
  ADD PRIMARY KEY (`idJuego`,`idUsuario`),
  ADD KEY `idUsuario` (`idUsuario`);

--
-- Indices de la tabla `solicitudesamistad`
--
ALTER TABLE `solicitudesamistad`
  ADD PRIMARY KEY (`idUsuarioSolicitado`,`idUsuarioEnviador`),
  ADD KEY `idUsuarioEnviador` (`idUsuarioEnviador`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=138;

--
-- AUTO_INCREMENT de la tabla `conversaciones`
--
ALTER TABLE `conversaciones`
  MODIFY `idConversacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de la tabla `juegos`
--
ALTER TABLE `juegos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  MODIFY `idMensaje` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `chat`
--
ALTER TABLE `chat`
  ADD CONSTRAINT `chat_ibfk_1` FOREIGN KEY (`idusuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `conversaciones`
--
ALTER TABLE `conversaciones`
  ADD CONSTRAINT `conversaciones_ibfk_1` FOREIGN KEY (`idUsuarioUno`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `conversaciones_ibfk_2` FOREIGN KEY (`idUsuarioDos`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `mensajes`
--
ALTER TABLE `mensajes`
  ADD CONSTRAINT `idAutorMensaje` FOREIGN KEY (`idAutorMensaje`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `mensajes_ibfk_1` FOREIGN KEY (`idConversacion`) REFERENCES `conversaciones` (`idConversacion`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `recordusuario`
--
ALTER TABLE `recordusuario`
  ADD CONSTRAINT `recordusuario_ibfk_1` FOREIGN KEY (`idJuego`) REFERENCES `juegos` (`id`),
  ADD CONSTRAINT `recordusuario_ibfk_2` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `solicitudesamistad`
--
ALTER TABLE `solicitudesamistad`
  ADD CONSTRAINT `idUsuarioEnviador` FOREIGN KEY (`idUsuarioEnviador`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `idUsuarioSolicitado` FOREIGN KEY (`idUsuarioSolicitado`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
