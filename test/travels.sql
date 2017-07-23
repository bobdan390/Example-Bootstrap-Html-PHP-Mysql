-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 23, 2017 at 07:44 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `travels`
--

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `id` int(50) NOT NULL,
  `cedula_viajero` int(50) NOT NULL,
  `codigo_viaje` int(50) NOT NULL,
  `codigo_ticket` int(50) NOT NULL,
  `nombre` text COLLATE utf8_bin NOT NULL,
  `otros` text COLLATE utf8_bin NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`id`, `cedula_viajero`, `codigo_viaje`, `codigo_ticket`, `nombre`, `otros`) VALUES
(61, 1234, 654, 654001234, 'Sabaneta - Bucaramanga', 'None'),
(59, 123, 1234, 123400123, 'Maracay - San Fernand', 'None');

-- --------------------------------------------------------

--
-- Table structure for table `viajeros`
--

CREATE TABLE `viajeros` (
  `id` int(11) NOT NULL,
  `cedula` int(50) NOT NULL,
  `nombre` text COLLATE utf8_bin NOT NULL,
  `direccion` text COLLATE utf8_bin NOT NULL,
  `telefono` text COLLATE utf8_bin NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `viajeros`
--

INSERT INTO `viajeros` (`id`, `cedula`, `nombre`, `direccion`, `telefono`) VALUES
(38, 1234, 'Guillermina Josefa', 'LAs MErcedez', '0125487458'),
(37, 123, 'Bob Daniel', 'Guasimo 2 San Fernando de Apure', '02473418577');

-- --------------------------------------------------------

--
-- Table structure for table `viajes`
--

CREATE TABLE `viajes` (
  `id` int(11) NOT NULL,
  `codigo` int(50) NOT NULL,
  `n_plazas` int(10) NOT NULL,
  `fecha` date NOT NULL,
  `origen` text COLLATE utf8_bin NOT NULL,
  `destino` text COLLATE utf8_bin NOT NULL,
  `otros` text COLLATE utf8_bin NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `viajes`
--

INSERT INTO `viajes` (`id`, `codigo`, `n_plazas`, `fecha`, `origen`, `destino`, `otros`) VALUES
(4, 1234, 30, '2017-06-06', 'Maracay', 'San Fernand', 'Sin Comentarios'),
(5, 654, 12, '2017-06-06', 'Sabaneta', 'Bucaramanga', 'Sin Observaciones');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `codigo_ticket` (`codigo_ticket`);

--
-- Indexes for table `viajeros`
--
ALTER TABLE `viajeros`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cedula` (`cedula`);

--
-- Indexes for table `viajes`
--
ALTER TABLE `viajes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `codigo` (`codigo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;
--
-- AUTO_INCREMENT for table `viajeros`
--
ALTER TABLE `viajeros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `viajes`
--
ALTER TABLE `viajes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
