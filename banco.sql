-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-02-2018 a las 18:37:56
-- Versión del servidor: 10.1.30-MariaDB
-- Versión de PHP: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `banco`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id` int(11) NOT NULL,
  `rut` varchar(12) DEFAULT NULL,
  `nombre` varchar(120) NOT NULL,
  `direccion` varchar(200) NOT NULL,
  `telefono` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id`, `rut`, `nombre`, `direccion`, `telefono`) VALUES
(1, '1585368-4', 'Mario Gomez', 'Lord Cochrane 63', '997377'),
(3, '22436521-4', 'Esteban Morale', 'Isla Negra 47', '3423424'),
(4, '25153264-2', 'Estaban Martinez Vega', 'Los Altos 124', '23243433'),
(5, '10564826-8', 'Sofia Vergara', 'El molo 78', '3569875'),
(6, '25153264-2', 'Estaban Martinez Gallardo', 'Los Altos 124', '23243433'),
(8, '17843365-8', 'Juan Mendes Ortiz', 'Los Delfines 584', '9808239'),
(10, '22436521-4', 'Esteban Morale', 'Isla Negra 47', '3423424'),
(11, '17843365-K', 'Rosa Flores', 'San Camino 2015', '92546235'),
(12, '14894358-4', 'Victor Melendez', 'Lo Espejo 145', '98425115'),
(13, '12875046-5', 'Emilia Mora', 'El Carme #48', '8956352');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
