-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 06-10-2021 a las 09:52:07
-- Versión del servidor: 8.0.18
-- Versión de PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mibdalvaro`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nota`
--

CREATE TABLE `nota` (
  `ci` int(11) NOT NULL,
  `sigla` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `nota1` double NOT NULL,
  `nota2` double NOT NULL,
  `nota3` double NOT NULL,
  `notaFinal` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `nota`
--

INSERT INTO `nota` (`ci`, `sigla`, `nota1`, `nota2`, `nota3`, `notaFinal`) VALUES
(456987, 'INF324', 50.5, 55, 70, 58.5),
(456987, 'INF330', 60.5, 75.6, 70, 68.7),
(123456, 'INF325', 70, 85.2, 65.8, 73.6),
(123456, 'INF320', 30.5, 45.9, 50.9, 42.43);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `ci` int(11) NOT NULL,
  `nombre` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `fechaNac` date NOT NULL,
  `depto` varchar(2) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`ci`, `nombre`, `fechaNac`, `depto`) VALUES
(123456, 'Armando Guerra', '1995-01-27', '02'),
(123555, 'Pablo Marmol', '1995-10-13', '08'),
(132222, 'Vilma Picapiedra', '1995-07-28', '04'),
(258741, 'Juan Perez', '1992-06-19', '01'),
(321654, 'Pedro Picapiedra', '1996-10-18', '09'),
(456987, 'Alvaro Copa', '1991-12-17', '03'),
(524698, 'Betty Marmol', '1993-07-09', '07'),
(654456, 'Jhony Bravo', '1999-10-14', '06'),
(963852, 'Fatima Saenz', '1994-12-10', '02'),
(987521, 'Alan Brito', '1999-03-17', '03'),
(987654, 'Zoila Cebra', '2000-05-20', '01'),
(987666, 'Juan Solano', '2000-10-18', '06');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `ci` int(11) NOT NULL,
  `usuario` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(15) COLLATE utf8mb4_general_ci NOT NULL,
  `rol` int(11) NOT NULL,
  `carrera` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`ci`, `usuario`, `password`, `rol`, `carrera`) VALUES
(123456, 'aguerra', '654321', 0, 1),
(123555, 'pmarmol', '123555', 0, 3),
(132222, 'vpicapiedra', '132222', 0, 5),
(258741, 'jperez', '987666', 0, 2),
(321654, 'ppicapiedra', '321654', 0, 4),
(456987, 'acopa', '123456', 0, 3),
(524698, 'bmarmol', '524698', 0, 4),
(654456, 'jbravo', '654456', 0, 4),
(987654, 'zcebra', '123456', 1, 3),
(987666, 'jsolano', '987666', 0, 6);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`ci`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`ci`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
