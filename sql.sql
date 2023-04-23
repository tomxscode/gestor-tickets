-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 23, 2023 at 06:48 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `serv_tecnico`
--

-- --------------------------------------------------------

--
-- Table structure for table `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(128) NOT NULL,
  `telefono` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `clientes`
--

INSERT INTO `clientes` (`id`, `nombre`, `telefono`) VALUES
(1, 'Tomás Barros', 936945898),
(2, 'Gloria Galleguillos', 9343453),
(3, 'María Eugenia', 93546457),
(4, 'Guiselle France', 9123455);

-- --------------------------------------------------------

--
-- Table structure for table `equipos`
--

CREATE TABLE `equipos` (
  `id` int(11) NOT NULL,
  `modelo` varchar(128) NOT NULL,
  `marca` varchar(128) NOT NULL,
  `serial` varchar(256) NOT NULL,
  `dueno` int(11) NOT NULL,
  `comentarios` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `equipos`
--

INSERT INTO `equipos` (`id`, `modelo`, `marca`, `serial`, `dueno`, `comentarios`) VALUES
(1, '240 G7', 'HP', 'SU438438', 1, 'Falta batería'),
(2, 'Ideapad 3', 'Lenovo', 'SU93438543', 2, 'Sin detalles'),
(3, 'Ideapad 7', 'Lenovo', 'SU93438543', 1, 'Sin detalles'),
(4, 'Ideapad 10', 'Lenovo', 'SU93438543', 1, 'Sin detalles'),
(6, 'Matebook', 'Huawei', 'SU5676767', 2, 'Falta la tecla Ñ');

-- --------------------------------------------------------

--
-- Table structure for table `tr_acciones`
--

CREATE TABLE `tr_acciones` (
  `id` int(11) NOT NULL,
  `equipo_identificador` int(11) NOT NULL,
  `accionador` int(11) NOT NULL,
  `comentario` varchar(256) NOT NULL,
  `fecha` date NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tr_equipo`
--

CREATE TABLE `tr_equipo` (
  `id` int(11) NOT NULL,
  `cliente_id` int(11) NOT NULL,
  `equipo_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tr_informacion`
--

CREATE TABLE `tr_informacion` (
  `id` int(11) NOT NULL,
  `identificador_trabajo` int(11) NOT NULL,
  `ingreso` date NOT NULL,
  `egreso` date NOT NULL,
  `estado` int(11) NOT NULL,
  `precio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `contrasena` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `email`, `contrasena`) VALUES
(1, 'hola', 'tomas@admin.cl', '$2y$10$R5hR7/3B0tJdHxf9Glx8YukwOKzEVGzoqpcEQeCa53PkKWeLAdEeO');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `equipos`
--
ALTER TABLE `equipos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cliente_id` (`dueno`);

--
-- Indexes for table `tr_acciones`
--
ALTER TABLE `tr_acciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `equipo_identificador` (`equipo_identificador`),
  ADD KEY `accionador` (`accionador`);

--
-- Indexes for table `tr_equipo`
--
ALTER TABLE `tr_equipo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cliente_id` (`cliente_id`),
  ADD KEY `equipo_id` (`equipo_id`);

--
-- Indexes for table `tr_informacion`
--
ALTER TABLE `tr_informacion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `identificador_trabajo` (`identificador_trabajo`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `equipos`
--
ALTER TABLE `equipos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tr_acciones`
--
ALTER TABLE `tr_acciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tr_equipo`
--
ALTER TABLE `tr_equipo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tr_informacion`
--
ALTER TABLE `tr_informacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `equipos`
--
ALTER TABLE `equipos`
  ADD CONSTRAINT `equipos_ibfk_1` FOREIGN KEY (`dueno`) REFERENCES `clientes` (`id`);

--
-- Constraints for table `tr_acciones`
--
ALTER TABLE `tr_acciones`
  ADD CONSTRAINT `tr_acciones_ibfk_1` FOREIGN KEY (`equipo_identificador`) REFERENCES `tr_equipo` (`id`),
  ADD CONSTRAINT `tr_acciones_ibfk_2` FOREIGN KEY (`accionador`) REFERENCES `usuarios` (`id`);

--
-- Constraints for table `tr_equipo`
--
ALTER TABLE `tr_equipo`
  ADD CONSTRAINT `tr_equipo_ibfk_1` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`id`),
  ADD CONSTRAINT `tr_equipo_ibfk_2` FOREIGN KEY (`equipo_id`) REFERENCES `equipos` (`id`);

--
-- Constraints for table `tr_informacion`
--
ALTER TABLE `tr_informacion`
  ADD CONSTRAINT `tr_informacion_ibfk_1` FOREIGN KEY (`identificador_trabajo`) REFERENCES `tr_equipo` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
