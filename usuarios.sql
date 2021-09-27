-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-06-2021 a las 19:02:40
-- Versión del servidor: 10.1.36-MariaDB
-- Versión de PHP: 7.1.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `fenix`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `Id_Usuario` int(3) NOT NULL,
  `Id_Cargo` int(3) NOT NULL,
  `Nombre` varchar(20) NOT NULL,
  `Apellido` varchar(20) NOT NULL,
  `Usuario` varchar(20) NOT NULL,
  `Clave` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`Id_Usuario`, `Id_Cargo`, `Nombre`, `Apellido`, `Usuario`, `Clave`) VALUES
(36, 1, 'Agustin', 'Alonso', 'Napoleon', '202cb962ac59075b964b'),
(37, 2, 'Rodrigo', 'Alonso', 'Rodrigo', '202cb962ac59075b964b'),
(38, 5, 'Maria', 'Star', 'Maria', '202cb962ac59075b964b'),
(39, 6, 'Roberto', 'Wet', 'Roberto', '202cb962ac59075b964b'),
(40, 7, 'Emirs', 'Atuns', 'Emir', '202cb962ac59075b964b'),
(41, 7, 'Miguel Angel ', 'Wilson', 'Wilson', '202cb962ac59075b964b'),
(42, 2, 'Jose Luis', 'Davis', 'Davis456 ', '202cb962ac59075b964b'),
(43, 5, 'Edgar', 'Thomas', 'Thomas', '202cb962ac59075b964b'),
(44, 6, 'Diego ', 'Lee', 'Lee', '202cb962ac59075b964b07152d234b70\r\n');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`Id_Usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `Id_Usuario` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
