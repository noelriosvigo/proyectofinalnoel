-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: sql305.infinityfree.com
-- Tiempo de generación: 05-06-2025 a las 04:34:00
-- Versión del servidor: 10.6.19-MariaDB
-- Versión de PHP: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `if0_38707893_miproyectofinal`
--
CREATE DATABASE IF NOT EXISTS `if0_38707893_miproyectofinal` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `if0_38707893_miproyectofinal`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consejos`
--

DROP TABLE IF EXISTS `consejos`;
CREATE TABLE `consejos` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `contenido` text NOT NULL,
  `categoria` varchar(100) NOT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `fecha` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `consejos`
--

INSERT INTO `consejos` (`id`, `titulo`, `contenido`, `categoria`, `imagen`, `fecha`) VALUES
(1, 'Revisión de la correa de distribución', 'Es importante revisar la correa de distribución cada 60,000-100,000 km dependiendo del modelo de tu vehículo. Una correa de distribución desgastada puede causar graves daños al motor.', 'Motor', 'correa-distribucion.jpg', '2025-04-09 00:05:18'),
(2, 'Comprobación de la presión de los neumáticos', 'Mantén los neumáticos de tu coche con la presión adecuada para asegurar un buen rendimiento, ahorro de combustible y evitar desgastes irregulares.', 'Neumáticos', 'presion-neumaticos.jpg', '2025-04-09 00:15:52'),
(3, 'Cambio de aceite del motor', 'Cambia el aceite del motor según las recomendaciones del fabricante, normalmente cada 5,000 a 10,000 km, para evitar el desgaste prematuro del motor.', 'Aceite', 'cambio-aceite.jpg', '2025-04-09 00:27:27'),
(4, 'Revisión de la batería del coche', 'Asegúrate de que la batería de tu coche esté limpia y sin corrosión. Revisa la carga regularmente para evitar quedarte sin batería inesperadamente.', 'Batería', 'revision-bateria.jpg', '2025-04-09 00:33:25'),
(5, 'Reemplazo del filtro de aire', 'Cambiar el filtro de aire cada 12,000 a 15,000 km. Un filtro de aire limpio mejora el rendimiento del motor y la eficiencia del combustible.', 'Motor', 'filtro-aire.jpg', '2025-04-09 00:37:55'),
(6, 'Inspección de los frenos', 'Revisa las pastillas de freno regularmente, especialmente si escuchas ruidos extraños o notas que los frenos no responden correctamente. Cambiar las pastillas antes de que estén completamente desgastadas evitará daños en los discos de freno.', 'Frenos', 'revision-frenos.jpg', '2025-04-09 00:41:12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `foros`
--

DROP TABLE IF EXISTS `foros`;
CREATE TABLE `foros` (
  `id` int(11) NOT NULL,
  `autor` varchar(200) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `comentarios` text NOT NULL,
  `fecha` datetime DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `foros`
--

INSERT INTO `foros` (`id`, `autor`, `id_usuario`, `comentarios`, `fecha`) VALUES
(130, 'hola1@hotmail.com', 0, 'hola', '2025-06-04 09:51:17'),
(131, 'hola1@hotmail.com', 0, 'hola', '2025-06-04 09:51:28'),
(132, 'hola1@hotmail.com', 0, 'ggg', '2025-06-04 09:58:58'),
(133, 'usuario@hotmail.com', 0, 'hola', '2025-06-04 16:11:35'),
(134, 'ddd', 0, 'ddd', '2025-06-05 09:00:50'),
(135, 'admin@hotmail.com', 0, 'fff', '2025-06-05 09:07:56'),
(126, 'hola1@hotmail.com', 0, 'hola', '2025-06-04 09:48:15'),
(127, 'hola1@hotmail.com', 0, 'hola', '2025-06-04 09:48:33'),
(128, 'hola1@hotmail.com', 0, 'hola', '2025-06-04 09:50:13'),
(129, 'hola1@hotmail.com', 0, 'hola', '2025-06-04 09:50:44'),
(124, 'usuario@hotmail.com', 0, 'prueba', '2025-06-04 09:47:37'),
(125, 'hola1@hotmail.com', 0, 'hola', '2025-06-04 09:48:09');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `nombre_rol` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `nombre_rol`) VALUES
(1, 'Administrador'),
(2, 'Usuario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre_usuario` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fecha_registro` datetime NOT NULL,
  `rol_id` int(11) NOT NULL,
  `nombre_rol` varchar(255) DEFAULT NULL,
  `avatar_path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre_usuario`, `email`, `password`, `fecha_registro`, `rol_id`, `nombre_rol`, `avatar_path`) VALUES
(75, 'Admin', 'admin@hotmail.com', '$2y$10$/GtyVPlpK/d0Ta6OHVIYoOIfNzQ2EBNNH.AdZzx0gqEUAhBFJN4n6', '2025-06-04 17:19:37', 1, 'Administrador', 'default-avatar.png'),
(76, 'Usuario', 'usuario@hotmail.com', '$2y$10$fkDcWKy/GJr4JyzJTh5BueptEPaQVRvrHZh9Y.EswwLlQES580f1W', '2025-06-04 17:19:57', 2, 'Usuario', '683eee2b11e11_noche-oceano-paisaje-luna-llena-estrellas-brillan_107791-7397.avif'),
(80, 'Usuario', '11111@hola.com', '$2y$10$FYh/QNw9NXs60r3RkDdw/O4PVPfOEDOGSyMYwkZC2n05cA2Mw/V76', '2025-05-28 12:13:58', 2, 'Usuario', 'default-avatar.png'),
(81, 'Usuario', 'hola1@hotmail.com', '$2y$10$yJ8s403XREzZfIvx4GyRPOffguQGXm3t.BHqbqDSf/p4vw3xL4a2e', '2025-05-28 15:57:08', 2, 'Usuario', '683717b6bae1b_2025-02-233.jpg'),
(82, 'Usuario', 'hola2@hotmail.com', '$2y$10$3kWmD2Plltdc5Hu7nrZlNuXNAqnvQQuqEx5k974YnQ3cJdtsbZZ/6', '2025-05-28 16:20:29', 2, 'Usuario', '68371bf6c6a17_2021-08-28.jpg'),
(83, 'Usuario', 'hola4@hotmai.com', '$2y$10$WKNjyD4FIvORPG3z5ZGNPOx.ZsOXOd9Sa19UntjUk/8hT6YYguxvO', '2025-05-28 17:07:37', 2, 'Usuario', 'default-avatar.png'),
(84, 'Usuario', 'hola4@hotmail.com', '$2y$10$B2GrTxhzQ0.yUHQ5VIJJPe0j1F1m905GJpavJ.iHp2w/lU0tvKIsK', '2025-05-28 17:08:01', 2, 'Usuario', '683728e40ca54_unnamed.jpg'),
(85, 'Usuario', 'hola20@hotmail.com', '$2y$10$UBvUDF9vkR5EA8fviDk/9ONcZ57YRzGwxf7F33Z40t09khTc3Y/32', '2025-05-28 17:38:49', 2, 'Usuario', '68372fbb2fd15_unnamed1.jpg'),
(86, 'Usuario', 'joseantoniovigo.25@gmail.com', '$2y$10$z1U.7bS0zUf8BSsJ7seyoeDH4OO0BWelEk5Z96LVN/zBtgMNrVFpG', '2025-06-02 20:06:10', 2, 'Usuario', 'default-avatar.png'),
(87, 'Usuario', 'maricarmenlp3@gmail.com', '$2y$10$84lne5OXy74v.sEOhJ5RI.Bk8J6aDaL6bp8blBKXpGhxGGtD0erwi', '2025-06-03 23:16:20', 2, 'Usuario', 'default-avatar.png');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `consejos`
--
ALTER TABLE `consejos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `foros`
--
ALTER TABLE `foros`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rol_id` (`rol_id`) USING BTREE;

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `consejos`
--
ALTER TABLE `consejos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `foros`
--
ALTER TABLE `foros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `fk_rol_id` FOREIGN KEY (`rol_id`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
