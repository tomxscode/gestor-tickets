-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-04-2023 a las 02:59:47
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `serv_tecnico`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(128) NOT NULL,
  `telefono` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `nombre`, `telefono`) VALUES
(1, 'Tomás Barros', 936945898),
(2, 'Gloria Galleguillos', 9343453),
(3, 'María Eugenia', 93546457),
(4, 'Guiselle France', 9123455);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipos`
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
-- Volcado de datos para la tabla `equipos`
--

INSERT INTO `equipos` (`id`, `modelo`, `marca`, `serial`, `dueno`, `comentarios`) VALUES
(1, '240 G7', 'HP', 'SU438438', 1, 'Falta batería'),
(2, 'Ideapad 3', 'Lenovo', 'SU93438543', 2, 'Sin detalles'),
(3, 'Ideapad 7', 'Lenovo', 'SU93438543', 1, 'Sin detalles'),
(4, 'Ideapad 10', 'Lenovo', 'SU93438543', 1, 'Sin detalles'),
(6, 'Matebook', 'Huawei', 'SU5676767', 2, 'Falta la tecla Ñ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tr_acciones`
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
-- Estructura de tabla para la tabla `tr_equipo`
--

CREATE TABLE `tr_equipo` (
  `id` int(11) NOT NULL,
  `cliente_id` int(11) NOT NULL,
  `equipo_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tr_informacion`
--

CREATE TABLE `tr_informacion` (
  `id` int(11) NOT NULL,
  `identificador_trabajo` int(11) NOT NULL,
  `ingreso` date NOT NULL,
  `egreso` date NOT NULL,
  `estado` int(11) NOT NULL,
  `precio` int(11) NOT NULL,
  `diag_inicial` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `contrasena` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `email`, `contrasena`) VALUES
(1, 'hola', 'tomas@admin.cl', '$2y$10$R5hR7/3B0tJdHxf9Glx8YukwOKzEVGzoqpcEQeCa53PkKWeLAdEeO');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `equipos`
--
ALTER TABLE `equipos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cliente_id` (`dueno`);

--
-- Indices de la tabla `tr_acciones`
--
ALTER TABLE `tr_acciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `equipo_identificador` (`equipo_identificador`),
  ADD KEY `accionador` (`accionador`);

--
-- Indices de la tabla `tr_equipo`
--
ALTER TABLE `tr_equipo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cliente_id` (`cliente_id`),
  ADD KEY `equipo_id` (`equipo_id`);

--
-- Indices de la tabla `tr_informacion`
--
ALTER TABLE `tr_informacion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `identificador_trabajo` (`identificador_trabajo`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `equipos`
--
ALTER TABLE `equipos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `tr_acciones`
--
ALTER TABLE `tr_acciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tr_equipo`
--
ALTER TABLE `tr_equipo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tr_informacion`
--
ALTER TABLE `tr_informacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `equipos`
--
ALTER TABLE `equipos`
  ADD CONSTRAINT `equipos_ibfk_1` FOREIGN KEY (`dueno`) REFERENCES `clientes` (`id`);

--
-- Filtros para la tabla `tr_acciones`
--
ALTER TABLE `tr_acciones`
  ADD CONSTRAINT `tr_acciones_ibfk_1` FOREIGN KEY (`equipo_identificador`) REFERENCES `tr_equipo` (`id`),
  ADD CONSTRAINT `tr_acciones_ibfk_2` FOREIGN KEY (`accionador`) REFERENCES `usuarios` (`id`);

--
-- Filtros para la tabla `tr_equipo`
--
ALTER TABLE `tr_equipo`
  ADD CONSTRAINT `tr_equipo_ibfk_1` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`id`),
  ADD CONSTRAINT `tr_equipo_ibfk_2` FOREIGN KEY (`equipo_id`) REFERENCES `equipos` (`id`);

--
-- Filtros para la tabla `tr_informacion`
--
ALTER TABLE `tr_informacion`
  ADD CONSTRAINT `tr_informacion_ibfk_1` FOREIGN KEY (`identificador_trabajo`) REFERENCES `tr_equipo` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;