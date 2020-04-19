-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-04-2020 a las 12:26:25
-- Versión del servidor: 10.4.10-MariaDB
-- Versión de PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyectoFinalDB`
--
CREATE DATABASE IF NOT EXISTS `proyectoFinalDB` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `proyectoFinalDB`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `juegos`
--

CREATE TABLE `juegos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(25) NOT NULL,
  `descripcion` varchar(25) NOT NULL,
  `link` varchar(25) NOT NULL,
  `imagen` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `juegos`
--

INSERT INTO `juegos` (`id`, `nombre`, `descripcion`, `link`, `imagen`) VALUES
(12, 'juego', 'descripcion', './administrador/Juego/lin', 0x2e2f61646d696e6973747261646f722f4a7565676f496d6167656e2f6465736361726761202832292e6a7067);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recordjugador`
--

CREATE TABLE `recordjugador` (
  `idJuego` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `RecordUsuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitudesamistad`
--

CREATE TABLE `solicitudesamistad` (
  `idUsuarioSolicitado` int(6) NOT NULL,
  `idUsuarioEnviador` int(6) NOT NULL,
  `estadoSolicitud` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `correoElectronico` varchar(50) NOT NULL,
  `contrasenna` varchar(25) NOT NULL,
  `tipousuario` int(11) NOT NULL,
  `usuario` varchar(30) NOT NULL,
  `codigoCookie` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `correoElectronico`, `contrasenna`, `tipousuario`, `usuario`, `codigoCookie`) VALUES
(2, 'fran', 'fran@gmail.com', '1234', 0, 'basedfran', 0),
(3, 'juancarlos', 'juanki@gmail.com', '1234', 0, 'juanki', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `juegos`
--
ALTER TABLE `juegos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `recordjugador`
--
ALTER TABLE `recordjugador`
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
-- AUTO_INCREMENT de la tabla `juegos`
--
ALTER TABLE `juegos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `recordjugador`
--
ALTER TABLE `recordjugador`
  ADD CONSTRAINT `recordjugador_ibfk_1` FOREIGN KEY (`idJuego`) REFERENCES `juegos` (`id`),
  ADD CONSTRAINT `recordjugador_ibfk_2` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`id`);

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
