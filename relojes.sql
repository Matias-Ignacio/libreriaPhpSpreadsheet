-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-10-2023 a las 01:59:39
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `relojes`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marca`
--

CREATE TABLE `marca` (
  `idMarca` int(11) NOT NULL,
  `nombreMarca` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `marca`
--

INSERT INTO `marca` (`idMarca`, `nombreMarca`) VALUES
(1, 'Rolex'),
(2, 'Breguet'),
(3, 'Tudor'),
(4, 'Panerai'),
(5, 'Casio'),
(6, 'Bell Ross');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reloj`
--

CREATE TABLE `reloj` (
  `idReloj` int(11) NOT NULL,
  `nombreReloj` varchar(255) NOT NULL,
  `precio` double(7,2) NOT NULL,
  `idTipo` int(11) NOT NULL,
  `idMarca` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `reloj`
--

INSERT INTO `reloj` (`idReloj`, `nombreReloj`, `precio`, `idTipo`, `idMarca`) VALUES
(1, 'apple Watch', 20150.00, 4, 3),
(2, 'omega', 18360.00, 2, 6),
(3, 'garmin', 35820.85, 5, 1),
(4, 'fossil', 20780.80, 6, 5),
(5, 'tag', 9320.12, 1, 4),
(6, 'patek', 44780.35, 5, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo`
--

CREATE TABLE `tipo` (
  `idTipo` int(11) NOT NULL,
  `nombreTipo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipo`
--

INSERT INTO `tipo` (`idTipo`, `nombreTipo`) VALUES
(1, 'lujo'),
(2, 'moda'),
(3, 'clasico'),
(4, 'sport'),
(5, 'lujo'),
(6, 'smart');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `marca`
--
ALTER TABLE `marca`
  ADD PRIMARY KEY (`idMarca`);

--
-- Indices de la tabla `reloj`
--
ALTER TABLE `reloj`
  ADD PRIMARY KEY (`idReloj`),
  ADD KEY `idTipo` (`idTipo`),
  ADD KEY `idMarca` (`idMarca`);

--
-- Indices de la tabla `tipo`
--
ALTER TABLE `tipo`
  ADD PRIMARY KEY (`idTipo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `marca`
--
ALTER TABLE `marca`
  MODIFY `idMarca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `reloj`
--
ALTER TABLE `reloj`
  MODIFY `idReloj` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `tipo`
--
ALTER TABLE `tipo`
  MODIFY `idTipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `reloj`
--
ALTER TABLE `reloj`
  ADD CONSTRAINT `reloj_ibfk_1` FOREIGN KEY (`idTipo`) REFERENCES `tipo` (`idTipo`),
  ADD CONSTRAINT `reloj_ibfk_2` FOREIGN KEY (`idMarca`) REFERENCES `marca` (`idMarca`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
