-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-05-2023 a las 08:19:14
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `registro_peluqueria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `citas`
--

CREATE TABLE `citas` (
  `idCita` int(11) NOT NULL,
  `fecha_cita` date NOT NULL,
  `hora_cita` varchar(5) COLLATE utf8_spanish_ci NOT NULL,
  `servicio` enum('Corte','Tinte','Moldeador','Peinado') COLLATE utf8_spanish_ci DEFAULT NULL,
  `id_user_FK` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `citas`
--

INSERT INTO `citas` (`idCita`, `fecha_cita`, `hora_cita`, `servicio`, `id_user_FK`) VALUES
(48, '2022-08-20', '10:00', 'Corte', 29),
(49, '2022-09-10', '10:00', 'Tinte', 29),
(57, '2022-09-01', '11:00', 'Peinado', 31),
(63, '2022-08-31', '13:00', 'Corte', 31),
(64, '2022-08-31', '12:00', 'Corte', 32),
(65, '2022-09-01', '12:00', 'Corte', 42),
(66, '2022-09-06', '17:00', 'Corte', 39),
(67, '2022-09-07', '12:00', 'Tinte', 39),
(69, '2022-08-31', '10:00', 'Corte', 33),
(70, '2022-09-02', '11:45', 'Moldeador', 33),
(71, '2022-09-15', '11:30', 'Corte', 28),
(72, '2022-09-14', '10:00', 'Moldeador', 31),
(73, '2022-10-03', '10:00', 'Corte', 42);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticias`
--

CREATE TABLE `noticias` (
  `idNoticia` int(11) NOT NULL,
  `fecha_noticia` date NOT NULL,
  `foto` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `titulo` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `texto` text COLLATE utf8_spanish_ci NOT NULL,
  `id_user_FK` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `noticias`
--

INSERT INTO `noticias` (`idNoticia`, `fecha_noticia`, `foto`, `titulo`, `texto`, `id_user_FK`) VALUES
(1, '2022-08-29', 'peinados.jpg', 'Saludos', 'Hola, cómo estás?\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Mi ipsum faucibus vitae aliquet nec ullamcorper sit amet. Aliquam malesuada bibendum arcu vitae elementum curabitur vitae nunc. Vel elit scelerisque mauris pellentesque pulvinar pellentesque habitant. Enim eu turpis egestas pretium aenean pharetra magna. Elementum curabitur vitae nunc sed velit. Vulputate dignissim suspendisse in est. Ipsum nunc aliquet bibendum enim facilisis gravida neque. Orci dapibus ultrices in iaculis. Ornare lectus sit amet est placerat in egestas erat imperdiet. Pretium quam vulputate dignissim suspendisse in est. Pellentesque diam volutpat commodo sed egestas egestas fringilla. Nisi quis eleifend quam adipiscing vitae proin.', 27),
(2, '2022-08-29', 'moldeado.jpg', 'Lo mejor para evitar la ca&iacute;da del pelo, para las personas mayores.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Sagittis orci a scelerisque purus semper eget duis at tellus. Arcu cursus euismod quis viverra nibh. Id nibh tortor id aliquet lectus proin nibh. Sollicitudin tempor id eu nisl nunc mi ipsum faucibus. Enim neque volutpat ac tincidunt vitae semper quis lectus nulla. Pharetra sit amet aliquam id diam maecenas ultricies mi. Rhoncus aenean vel elit scelerisque. Lorem donec massa sapien faucibus et molestie ac. Nascetur ridiculus mus mauris vitae. Placerat in egestas erat imperdiet sed. Velit ut tortor pretium viverra suspendisse potenti nullam ac. Dui sapien eget mi proin sed libero enim sed. Lobortis scelerisque fermentum dui faucibus in ornare. Aliquet eget sit amet tellus. Eu scelerisque felis imperdiet proin fermentum leo.Eget nulla facilisi etiam dignissim. Nisl purus in mollis nunc sed id semper. Pellentesque pulvinar pellentesque habitant morbi tristique senectus. Viverra adipiscing at in tellus integer. Quam quisque id diam vel quam elementum pulvinar etiam non. Blandit massa enim nec dui. Augue ut lectus arcu bibendum. Donec ac odio tempor orci dapibus ultrices in iaculis nunc. Sed vulputate mi sit amet mauris commodo quis imperdiet massa. Ultricies lacus sed turpis tincidunt. Maecenas volutpat blandit aliquam etiam erat velit scelerisque.', 29),
(3, '2022-08-29', 'Tintes.jpg', 'Tintes', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Mi ipsum faucibus vitae aliquet nec ullamcorper sit amet. Aliquam malesuada bibendum arcu vitae elementum curabitur vitae nunc. Vel elit scelerisque mauris pellentesque pulvinar pellentesque habitant. Enim eu turpis egestas pretium aenean pharetra magna. Elementum curabitur vitae nunc sed velit. Vulputate dignissim suspendisse in est. Ipsum nunc aliquet bibendum enim facilisis gravida neque. Orci dapibus ultrices in iaculis. Ornare lectus sit amet est placerat in egestas erat imperdiet. Pretium quam vulputate dignissim suspendisse in est. Pellentesque diam volutpat commodo sed egestas egestas fringilla. Nisi quis eleifend quam adipiscing vitae proin.', 29),
(6, '2022-08-30', 'image_2.jpg', 'La calvicie en temprana edad', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Sagittis orci a scelerisque purus semper eget duis at tellus. Arcu cursus euismod quis viverra nibh. Id nibh tortor id aliquet lectus proin nibh. Sollicitudin tempor id eu nisl nunc mi ipsum faucibus. Enim neque volutpat ac tincidunt vitae semper quis lectus nulla. Pharetra sit amet aliquam id diam maecenas ultricies mi. Rhoncus aenean vel elit scelerisque. Lorem donec massa sapien faucibus et molestie ac. Nascetur ridiculus mus mauris vitae. Placerat in egestas erat imperdiet sed. Velit ut tortor pretium viverra suspendisse potenti nullam ac. Dui sapien eget mi proin sed libero enim sed. Lobortis scelerisque fermentum dui faucibus in ornare. Aliquet eget sit amet tellus. Eu scelerisque felis imperdiet proin fermentum leo.Eget nulla facilisi etiam dignissim. Nisl purus in mollis nunc sed id semper. Pellentesque pulvinar pellentesque habitant morbi tristique senectus. Viverra adipiscing at in tellus integer. Quam quisque id diam vel quam elementum pulvinar etiam non. Blandit massa enim nec dui. Augue ut lectus arcu bibendum. Donec ac odio tempor orci dapibus ultrices in iaculis nunc. Sed vulputate mi sit amet mauris commodo quis imperdiet massa. Ultricies lacus sed turpis tincidunt. Maecenas volutpat blandit aliquam etiam erat velit scelerisque.', 46),
(7, '2022-08-31', 'Corte_mujer.jpg', 'Nuevos cortes de pela', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Amet facilisis magna etiam tempor. Gravida rutrum quisque non tellus. Diam in arcu cursus euismod quis viverra nibh cras pulvinar. Quam quisque id diam vel quam elementum pulvinar etiam non. Donec pretium vulputate sapien nec sagittis. Elit scelerisque mauris pellentesque pulvinar pellentesque habitant morbi tristique. Vulputate eu scelerisque felis imperdiet proin fermentum leo. Blandit massa enim nec dui nunc mattis enim ut. Elit at imperdiet dui accumsan sit amet. In vitae turpis massa sed. Quis lectus nulla at volutpat. Ultrices sagittis orci a scelerisque purus. Amet est placerat in egestas erat. A scelerisque purus semper eget. Tempor commodo ullamcorper a lacus vestibulum sed. Egestas fringilla phasellus faucibus scelerisque eleifend donec. Augue neque gravida in fermentum et sollicitudin ac.Nibh praesent tristique magna sit. Eu consequat ac felis donec et. Mauris nunc congue nisi vitae suscipit. Pulvinar elementum integer enim neque volutpat ac tincidunt. Feugiat vivamus at augue eget arcu dictum varius. Nisl nisi scelerisque eu ultrices vitae auctor eu. Tempor commodo ullamcorper a lacus vestibulum sed arcu non odio. Ut faucibus pulvinar elementum integer enim neque. Vel elit scelerisque mauris pellentesque pulvinar pellentesque habitant morbi tristique. Nulla malesuada pellentesque elit eget gravida cum. Felis eget nunc lobortis mattis aliquam faucibus purus in massa.', 46);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_data`
--

CREATE TABLE `user_data` (
  `idUser` int(50) NOT NULL,
  `nombre` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `apellidos` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(9) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_nac` date NOT NULL,
  `direccion` varchar(80) COLLATE utf8_spanish_ci NOT NULL,
  `poblacion` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `provincia` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `cp` varchar(5) COLLATE utf8_spanish_ci NOT NULL,
  `sexo` enum('Hombre','Mujer','N/C') COLLATE utf8_spanish_ci NOT NULL,
  `observaciones` text COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `user_data`
--

INSERT INTO `user_data` (`idUser`, `nombre`, `apellidos`, `email`, `telefono`, `fecha_nac`, `direccion`, `poblacion`, `provincia`, `cp`, `sexo`, `observaciones`) VALUES
(27, 'Antonio', 'Mata', 'ant.mata@hotmail.com', '925111111', '2000-09-20', 'C/ Tejar, 38', 'Torrijos', 'Toledo', '45500', 'Hombre', NULL),
(28, 'Inma', 'Mata', 'inma@hotmail.com', '925771111', '2022-08-03', 'C/ Tejar, 38', 'Torrijos', 'Toledo', '45500', 'Mujer', NULL),
(29, 'Pepe', 'Mata', 'pepe@hotmail.com', '925772222', '2022-08-03', 'C/ Tejar, 38', 'Torrijos', 'Toledo', '45500', 'Hombre', 'Hay que tener cuidado, no es muy hablador, no quiere que se le hable.'),
(31, 'Eva', 'Mata', 'eva@hotmail.com', '925333333', '2022-08-02', 'C/ Tejar, 38', 'Torrijos', 'Toledo', '45500', 'Mujer', 'Le gusta que le hablen de música, en especial de reguetón.'),
(32, 'Antonio', 'Mata Hermida Sanchez del Olmo', 'hermida@hotmail.com', '925000000', '2022-08-03', 'C/ Tejar, 38', 'Torrijos', 'Toledo', '45500', 'Hombre', 'Le gusta hablar de futbol, pero es anti-madridista, es del Barcelona.'),
(33, 'Manolo', 'Mata', 'manolo@hotmail.com', '925555555', '2022-08-04', 'C/ Tejar, 38', 'Torrijos', 'Toledo', '45500', 'Hombre', 'Es muy serio, pero deja muy buenas propinas, le gustan los detalles exclusivos.'),
(35, 'Lolo', 'Garcia', 'lolo@hotmail.com', '925888888', '2022-08-04', 'C/ Sonrisa, 5', 'Toledo', 'Toledo', '45002', 'Hombre', 'Es campeón de mus.'),
(36, 'Sara', 'Garcia Perez', 'sara@hotmail.com', '925999999', '2022-08-02', 'Avd. Jardines, nº 5 2º Izq.', 'Toledo', 'Toledo', '45001', 'Mujer', ''),
(37, 'Alicia', 'Gomez Diaz', 'Alicia@hotmail.com', '925776666', '2022-08-05', 'C/ Tejar, 38', 'Torrijos', 'Toledo', '45500', 'Mujer', 'Es alérgica al champús de huevo.'),
(38, 'Pedro', 'Garcia', 'pedro@hotmail.com', '925778888', '2022-08-01', 'C/ Tejar, 38', 'Torrijos', 'Toledo', '45500', 'Hombre', NULL),
(39, 'Ivan', 'Marín', 'ivan@hotmail.com', '925779999', '2022-08-03', 'C/ Tejar, 38', 'Torrijos', 'Toledo', '45500', 'Hombre', NULL),
(41, 'Toñi', 'Fernandez', 'antonia@hotmail.com', '925775555', '2022-08-03', 'C/ Tejar, 38', 'Torrijos', 'Toledo', '45500', 'Hombre', NULL),
(42, 'Tomás', 'León', 'tomas@hotmail.com', '925666666', '2022-08-03', 'Callejón Tejar, 33', 'Torrijos', 'Toledo', '45502', 'Hombre', NULL),
(46, 'Tito', 'Mata', 'tito@hotmail.com', '925898989', '2022-08-05', 'C/ Tejar, 38', 'Torrijos', 'Toledo', '45500', 'Hombre', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_login`
--

CREATE TABLE `user_login` (
  `idLogin` int(11) NOT NULL,
  `usuario` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `rol` enum('user','admin') COLLATE utf8_spanish_ci NOT NULL,
  `id_user_FK` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `user_login`
--

INSERT INTO `user_login` (`idLogin`, `usuario`, `password`, `rol`, `id_user_FK`) VALUES
(27, 'Antonio', '$2y$12$qT/ugpBa7f5tqGZTmXTJReuDMZXG/IvoLSp1XCQST4EcrcMyMDOaK', 'admin', 27),
(28, 'Inma', '$2y$12$3HpEmHIprlsakVQH6qlEUeO5dOgbKku1pHQxd5SuuTTzhEmh5VgV2', 'admin', 28),
(29, 'Pepe', '$2y$12$efWP6grceQAzsx8aUmoZ6eqFy/mNlLgTAz.UNGMp5ShtVYNTc27qm', 'admin', 29),
(31, 'Eva', '$2y$12$hiFCGssR0lidvenBHkciY.XOMDlbK37zy1cgg.nuyrK7nolxqs1Mu', 'user', 31),
(32, 'Hermida', '$2y$12$GyhCqPAlehQdzedrSmK/v.Nb21k9BfgkA19a68GRftCoUQgAaQwkG', 'user', 32),
(33, 'Manolo', '$2y$12$ZErAHrhYf1IuxwTUiKt28elIhvw5aiOSETHho5WeNNaUT1nZPHJw6', 'user', 33),
(35, 'Lolo', '$2y$12$u3QUQ6Q4RknPoGqs20lpBOfQgnj3/RdvZJL3VRR8p8f4lLF2kxP4y', 'user', 35),
(36, 'Sara', '$2y$12$4gqN02OnCSG/2pW.vDnLBOmpDMF5kOcm6NfqlRJUsZmR1QnORyYcq', 'admin', 36),
(37, 'Alicia', '$2y$12$5dh9XvOSLuufTHfjWEvacuO0UgMwCyvFoJzAx1a5PHPR7eoRJ6Dxa', 'user', 37),
(38, 'Pedro', '$2y$12$dRDtq8Zs/6GiR/elI.IwhelIyhaGy7xdzGdK2xuXqQvEsgTgPW79S', 'user', 38),
(39, 'Ivan', '$2y$12$5W0h.V/axZNwDUIK8cC4jOOpundMwU7SSEsOkicKriExKLeagO4/W', 'user', 39),
(41, 'Toñi', '$2y$12$T1YP5.uxtTtylzw7gkMF/eJcCsSKs9KcDEjZIAML2dN.rgI42p5gu', 'user', 41),
(42, 'Tomas', '$2y$12$4uuHNcPKQzEo.uzT.YbiSuiuZUrhVabjV1N.vyVBq2VDSvFkLXTYS', 'user', 42),
(46, 'Tito', '$2y$12$Wyb3FMFk2boOJy97VTy0Uu9i/yrfPgEKT1XYr2XEO0Pkve885R4zS', 'admin', 46);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `citas`
--
ALTER TABLE `citas`
  ADD PRIMARY KEY (`idCita`),
  ADD KEY `fecha_cita` (`fecha_cita`) USING BTREE,
  ADD KEY `id_user_FK` (`id_user_FK`) USING BTREE;

--
-- Indices de la tabla `noticias`
--
ALTER TABLE `noticias`
  ADD PRIMARY KEY (`idNoticia`),
  ADD UNIQUE KEY `titulo` (`titulo`),
  ADD KEY `id_user_FK` (`id_user_FK`);

--
-- Indices de la tabla `user_data`
--
ALTER TABLE `user_data`
  ADD PRIMARY KEY (`idUser`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indices de la tabla `user_login`
--
ALTER TABLE `user_login`
  ADD PRIMARY KEY (`idLogin`),
  ADD UNIQUE KEY `id_user_FK` (`id_user_FK`) USING BTREE,
  ADD UNIQUE KEY `usuario` (`usuario`) USING BTREE,
  ADD KEY `password` (`password`) USING BTREE,
  ADD KEY `id_user_FK_2` (`id_user_FK`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `citas`
--
ALTER TABLE `citas`
  MODIFY `idCita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT de la tabla `noticias`
--
ALTER TABLE `noticias`
  MODIFY `idNoticia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `user_data`
--
ALTER TABLE `user_data`
  MODIFY `idUser` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT de la tabla `user_login`
--
ALTER TABLE `user_login`
  MODIFY `idLogin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `citas`
--
ALTER TABLE `citas`
  ADD CONSTRAINT `citas_ibfk_1` FOREIGN KEY (`id_user_FK`) REFERENCES `user_data` (`idUser`) ON DELETE CASCADE;

--
-- Filtros para la tabla `noticias`
--
ALTER TABLE `noticias`
  ADD CONSTRAINT `noticias_ibfk_1` FOREIGN KEY (`id_user_FK`) REFERENCES `user_data` (`idUser`) ON DELETE CASCADE;

--
-- Filtros para la tabla `user_login`
--
ALTER TABLE `user_login`
  ADD CONSTRAINT `user_login_ibfk_1` FOREIGN KEY (`id_user_FK`) REFERENCES `user_data` (`idUser`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
