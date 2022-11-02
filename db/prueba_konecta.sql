-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-11-2022 a las 18:03:02
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `prueba_konecta`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `prd_id` int(11) NOT NULL,
  `prd_nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `prd_referencia` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `prd_precio` int(11) NOT NULL,
  `prd_peso` int(11) NOT NULL,
  `prd_categoria` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `prd_stock` int(11) NOT NULL,
  `prd_creado` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`prd_id`, `prd_nombre`, `prd_referencia`, `prd_precio`, `prd_peso`, `prd_categoria`, `prd_stock`, `prd_creado`) VALUES
(14, 'ALEXANDER', 'AAAAAAAAAAAA', 50000, 21, 'as', 1, '2022-11-02'),
(16, 'ALEXANDER', 'REFERENCIA C', 8800, 34, 'asda', 2, '2022-11-02'),
(17, 'EXAMENES MEDICOS', 'QQQQQQQQ', 1111111, 222222, 'QQQQQQQQQ', 2, '2022-11-02'),
(18, 'EXAMENES MEDICOS', 'HEY', 76, 21, 'asda', 1, '2022-11-02'),
(19, 'RODRIGUEZ.GERMAN', 'REFERENCIA C', 8800, 5, 'da', 1, '2022-11-02'),
(20, 'QQQQQQ', 'QQQQQQQQ', 230, 222, 'ADA', 1, '2022-11-02');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `vnt_id` int(11) NOT NULL,
  `vnt_prd_id` int(11) NOT NULL,
  `vnt_cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`vnt_id`, `vnt_prd_id`, `vnt_cantidad`) VALUES
(8, 14, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`prd_id`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`vnt_id`),
  ADD KEY `vnt_prd_id` (`vnt_prd_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `prd_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `vnt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `ventas_ibfk_1` FOREIGN KEY (`vnt_prd_id`) REFERENCES `productos` (`prd_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
