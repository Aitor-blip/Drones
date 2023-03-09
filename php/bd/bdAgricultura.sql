-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-03-2023 a las 14:20:08
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
-- Base de datos: `agricultura`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contenedorparcela`
--

CREATE TABLE `contenedorparcela` (
  `id_parcela` int(11) NOT NULL,
  `x` double NOT NULL,
  `y` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `contenedorparcela`
--

INSERT INTO `contenedorparcela` (`id_parcela`, `x`, `y`) VALUES
(4, -4.359725903368, 43.313928283929);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dron`
--

CREATE TABLE `dron` (
  `id_dron` int(11) NOT NULL,
  `nombre_dron` varchar(20) NOT NULL,
  `marca_dron` varchar(10) NOT NULL,
  `id_usr` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `dron`
--

INSERT INTO `dron` (`id_dron`, `nombre_dron`, `marca_dron`, `id_usr`) VALUES
(17, 'DEr', 'ff', 27);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parcelas`
--

CREATE TABLE `parcelas` (
  `id_parcela` int(11) NOT NULL,
  `nparcela` int(11) NOT NULL,
  `municipio` varchar(20) NOT NULL,
  `provincia` varchar(20) NOT NULL,
  `npoligono` int(11) NOT NULL,
  `id_usr` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `parcelas`
--

INSERT INTO `parcelas` (`id_parcela`, `nparcela`, `municipio`, `provincia`, `npoligono`, `id_usr`) VALUES
(4, 178, '91', '39', 33, 27),
(5, 178, '91', '39', 33, 27),
(6, 178, '91', '39', 33, 27),
(7, 178, '91', '39', 33, 27),
(8, 178, '91', '39', 33, 27),
(9, 178, '91', '39', 33, 27),
(10, 178, '91', '39', 33, 27),
(11, 178, '91', '39', 33, 27),
(12, 178, '91', '39', 33, 27),
(13, 178, '91', '39', 33, 27),
(14, 178, '91', '39', 33, 27),
(15, 178, '91', '39', 33, 27),
(16, 178, '91', '39', 33, 27),
(17, 178, '91', '39', 33, 27),
(18, 178, '91', '39', 33, 27),
(19, 178, '91', '39', 33, 27),
(20, 178, '91', '39', 33, 27),
(21, 178, '91', '39', 33, 27);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id_rol` int(11) NOT NULL,
  `nombre_rol` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id_rol`, `nombre_rol`) VALUES
(1, 'administrador'),
(2, 'agricultor'),
(3, 'piloto'),
(4, 'invitado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarea`
--

CREATE TABLE `tarea` (
  `id_tarea` int(11) NOT NULL,
  `nombre_tarea` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tarea`
--

INSERT INTO `tarea` (`id_tarea`, `nombre_tarea`) VALUES
(1, 'Segar'),
(2, 'Regar');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trabajo`
--

CREATE TABLE `trabajo` (
  `id_trabajo` int(11) NOT NULL,
  `id_parcela` int(11) NOT NULL,
  `id_tarea` int(11) NOT NULL,
  `id_piloto` int(11) NOT NULL,
  `id_dron` int(11) NOT NULL,
  `nombre_Trabajo` varchar(244) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `trabajo`
--

INSERT INTO `trabajo` (`id_trabajo`, `id_parcela`, `id_tarea`, `id_piloto`, `id_dron`, `nombre_Trabajo`) VALUES
(19, 4, 27, 1, 17, 'DEr');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usr` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `apellidos` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(22) NOT NULL,
  `dni` varchar(9) NOT NULL,
  `username` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usr`, `nombre`, `apellidos`, `email`, `password`, `dni`, `username`) VALUES
(27, 'Aitor', 'Parada', 'aitorp@gmail.com', 'aitor2002', '72292385G', 'Aitor67'),
(28, 'Juan', 'dd', 'ff', 'aitor2002', '94994994C', 'Juan23'),
(29, 'Marcos', 'Rodriguez', 'marcos@gmail.com', 'aitor2002', '88585858', 'Marcos23');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_rol`
--

CREATE TABLE `usuario_rol` (
  `id_usr` int(11) NOT NULL,
  `id_rol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario_rol`
--

INSERT INTO `usuario_rol` (`id_usr`, `id_rol`) VALUES
(27, 1),
(27, 1),
(28, 1),
(28, 1),
(28, 1),
(28, 2),
(29, 2),
(29, 2),
(29, 2),
(29, 2),
(29, 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `contenedorparcela`
--
ALTER TABLE `contenedorparcela`
  ADD PRIMARY KEY (`id_parcela`),
  ADD KEY `id_parcela` (`id_parcela`);

--
-- Indices de la tabla `dron`
--
ALTER TABLE `dron`
  ADD PRIMARY KEY (`id_dron`),
  ADD UNIQUE KEY `nombre_dron` (`nombre_dron`),
  ADD KEY `id_usr` (`id_usr`),
  ADD KEY `id_dron` (`id_dron`),
  ADD KEY `id_dron_2` (`id_dron`);

--
-- Indices de la tabla `parcelas`
--
ALTER TABLE `parcelas`
  ADD PRIMARY KEY (`id_parcela`),
  ADD KEY `id_parcela` (`id_parcela`),
  ADD KEY `id_usr` (`id_usr`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `tarea`
--
ALTER TABLE `tarea`
  ADD PRIMARY KEY (`id_tarea`);

--
-- Indices de la tabla `trabajo`
--
ALTER TABLE `trabajo`
  ADD PRIMARY KEY (`id_trabajo`,`id_parcela`,`id_tarea`,`id_piloto`,`id_dron`),
  ADD UNIQUE KEY `nombre_Trabajo` (`nombre_Trabajo`),
  ADD KEY `id_trabajo` (`id_trabajo`),
  ADD KEY `id_parcela` (`id_parcela`,`id_tarea`,`id_dron`),
  ADD KEY `id_parcela_2` (`id_parcela`,`id_tarea`,`id_dron`),
  ADD KEY `id_piloto` (`id_piloto`),
  ADD KEY `id_tarea` (`id_tarea`),
  ADD KEY `id_dron` (`id_dron`),
  ADD KEY `id_dron_2` (`id_dron`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usr`),
  ADD UNIQUE KEY `id_usr` (`id_usr`,`nombre`,`email`,`dni`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `id_usr_2` (`id_usr`);

--
-- Indices de la tabla `usuario_rol`
--
ALTER TABLE `usuario_rol`
  ADD KEY `id_usr` (`id_usr`,`id_rol`),
  ADD KEY `id_rol` (`id_rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `dron`
--
ALTER TABLE `dron`
  MODIFY `id_dron` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `parcelas`
--
ALTER TABLE `parcelas`
  MODIFY `id_parcela` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tarea`
--
ALTER TABLE `tarea`
  MODIFY `id_tarea` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `trabajo`
--
ALTER TABLE `trabajo`
  MODIFY `id_trabajo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `contenedorparcela`
--
ALTER TABLE `contenedorparcela`
  ADD CONSTRAINT `contenedorparcela_ibfk_1` FOREIGN KEY (`id_parcela`) REFERENCES `parcelas` (`id_parcela`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `dron`
--
ALTER TABLE `dron`
  ADD CONSTRAINT `dron_ibfk_1` FOREIGN KEY (`id_usr`) REFERENCES `usuario` (`id_usr`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `parcelas`
--
ALTER TABLE `parcelas`
  ADD CONSTRAINT `parcelas_ibfk_1` FOREIGN KEY (`id_usr`) REFERENCES `usuario` (`id_usr`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `trabajo`
--
ALTER TABLE `trabajo`
  ADD CONSTRAINT `FK_trabajo_parcelas_id_parcela` FOREIGN KEY (`id_parcela`) REFERENCES `parcelas` (`id_parcela`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `trabajo_ibfk_1` FOREIGN KEY (`id_dron`) REFERENCES `dron` (`id_dron`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuario_rol`
--
ALTER TABLE `usuario_rol`
  ADD CONSTRAINT `usuario_rol_ibfk_1` FOREIGN KEY (`id_usr`) REFERENCES `usuario` (`id_usr`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `usuario_rol_ibfk_2` FOREIGN KEY (`id_rol`) REFERENCES `roles` (`id_rol`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
