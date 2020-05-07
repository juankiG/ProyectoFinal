-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-05-2020 a las 14:25:31
-- Versión del servidor: 10.1.37-MariaDB
-- Versión de PHP: 7.3.0

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
CREATE DATABASE IF NOT EXISTS `proyectofinaldb` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `proyectofinaldb`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `chat`
--

CREATE TABLE `chat` (
  `id` int(11) NOT NULL,
  `idusuario` int(25) NOT NULL,
  `mensaje` varchar(200) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
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
(15, 3, 'hola\r\n', '2020-05-07 12:22:03');

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
  `descripcion` varchar(25) NOT NULL,
  `linkImagen` varchar(100) NOT NULL,
  `imagen` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `juegos`
--

INSERT INTO `juegos` (`id`, `nombre`, `descripcion`, `linkImagen`, `imagen`) VALUES
(31, 'Pong', 'Pong', '../contenido/recursos/pong.jpg', 0x696e6465782e706870);

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
(31, 3, 0);

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
(2, 4, 1);

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
(2, 'fran', 'fran@gmail.com', '1234', 1, 'basedfran', 'sa2GTAWZ5krdIMAnYkEB1HEUgW084U6p', ''),
(3, 'juancarlos', 'ciclosuperiorjuanki@gmail.com', 'juanki', 1, 'juanki', NULL, 'iuhefifjn'),
(4, 'ivan', 'ivan@gmail.com', '1234', 0, 'ivanA', NULL, 'mcvvm '),
(5, 'pepe', 'j@h.com', '1234', 0, 'pee', NULL, ''),
(6, 'prueba', 'p@j.com', '1234', 0, 'pru', NULL, ''),
(41, 'nieves', 'ciclosuperiorjuanki@gmail.com', 'juanki', 0, 'nie', NULL, 'IvmOuULZTkDlRvOMeNwmxn7gYL1ERrY4'),
(42, 'paco', 'juankimone@hotmail.com', '1234', 0, 'paco', NULL, NULL);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `juegos`
--
ALTER TABLE `juegos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `chat`
--
ALTER TABLE `chat`
  ADD CONSTRAINT `chat_ibfk_1` FOREIGN KEY (`idusuario`) REFERENCES `usuarios` (`id`);

--
-- Filtros para la tabla `recordusuario`
--
ALTER TABLE `recordusuario`
  ADD CONSTRAINT `recordusuario_ibfk_1` FOREIGN KEY (`idJuego`) REFERENCES `juegos` (`id`),
  ADD CONSTRAINT `recordusuario_ibfk_2` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`id`);

--
-- Filtros para la tabla `solicitudesamistad`
--
ALTER TABLE `solicitudesamistad`
  ADD CONSTRAINT `idUsuarioEnviador` FOREIGN KEY (`idUsuarioEnviador`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `idUsuarioSolicitado` FOREIGN KEY (`idUsuarioSolicitado`) REFERENCES `usuarios` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
