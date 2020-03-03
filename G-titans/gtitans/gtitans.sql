-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 05-12-2019 a las 06:33:59
-- Versión del servidor: 10.3.16-MariaDB
-- Versión de PHP: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gtitans`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id_juego` int(11) NOT NULL,
  `nombre_ca` varchar(20) NOT NULL,
  `estado_categoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id_juego`, `nombre_ca`, `estado_categoria`) VALUES
(2, 'accion', 1),
(3, 'aventura', 1),
(4, 'carreras', 1),
(5, 'deportes', 1),
(6, 'horror', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plataforma`
--

CREATE TABLE `plataforma` (
  `id_plataforma` int(11) NOT NULL,
  `nombre_pla` varchar(20) NOT NULL,
  `estado_pla` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `plataforma`
--

INSERT INTO `plataforma` (`id_plataforma`, `nombre_pla`, `estado_pla`) VALUES
(1, 'xbox 360', 1),
(2, 'ps4', 1),
(3, 'ps3', 1),
(4, 'xbox one', 1),
(5, 'wii', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `idProductos` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `juego_idJuego` int(11) NOT NULL,
  `plataforma_idPlataforma` int(11) NOT NULL,
  `descripcion` varchar(300) DEFAULT NULL,
  `valorunitario` int(11) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `imagen` varchar(45) DEFAULT NULL,
  `trailer` char(60) NOT NULL,
  `estado` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`idProductos`, `nombre`, `juego_idJuego`, `plataforma_idPlataforma`, `descripcion`, `valorunitario`, `cantidad`, `imagen`, `trailer`, `estado`) VALUES
(10, 'Spider Man', 2, 2, 'Spider-Man es un videojuego de acciÃ³n y aventura basado en el popular superhÃ©roe de la editorial Marvel Comics.â€‹ Fue desarrollado por Insomniac Games y publicado por Sony Interactive', 60000, 12, 'spider1.jpg', 'https://www.youtube.com/embed/q4GdJVvdxss', 1),
(11, 'FIFA 20', 5, 2, 'FIFA 20 es un videojuego de simulaciÃ³n de fÃºtbol desarrollado por EA Sports, como parte de la serie FIFA de Electronic Arts. EstÃ¡ disponible en las plataformas de PlayStation 4', 120000, 12, 'fifa20_ps4.jpg', 'https://www.youtube.com/embed/rrSpkJhZSuU', 1),
(12, 'Grand Theft Auto V', 2, 2, 'Grand Theft Auto V es un videojuego de acciÃ³n-aventura de mundo abierto desarrollado por la compaÃ±Ã­a britÃ¡nica Rockstar', 90000, 15, 'grand_the_auto_5.jpg', 'https://www.youtube.com/embed/FoaScpGT1GU', 1),
(13, 'Far Cry 4', 2, 2, 'Far Cry 4 es un videojuego de acciÃ³n en primera persona de mundo abierto desarrollado por Ubisoft Montreal en conjunto con Ubisoft Red Storm', 50000, 12, 'farcry.jpg', 'https://www.youtube.com/embed/wyhj5fkQTaA', 1),
(14, 'Assassins Creed Odyssey', 2, 2, 'Assassins Creed Odyssey es un video jueo de accion desarrollado por Ubisoft Quebec', 70000, 15, 'assassins-creed-odyssey.jpg', 'https://www.youtube.com/embed/_ddQqzwH__4', 1),
(15, 'Devil May Cry 5', 2, 2, 'Devil May Cry 5 es un videojuego perteneciente al gÃ©nero hack and slash, desarrollado y publicado por la empresa Capcom', 54000, 22, 'Devil-May-Cry-5-04-HD.png', 'https://www.youtube.com/embed/dG6_CAdiLPM', 1),
(16, 'Tomb Raider', 3, 2, 'Tomb Raider es un videojuego de acciÃ³n-aventura desarrollado por Crystal Dynamics y distribuido por Square Enix. Es el dÃ©cimo tÃ­tulo de la serie Tomb Raider y el quinto tÃ­tulo desarrollado por Crystal Dynamics', 34000, 11, '48529f65-1893-46a5-91aa-a4db1468c480.jpg', 'https://www.youtube.com/embed/1_FIyNcQSgA', 1),
(17, 'Shadow of the Colossus', 3, 2, 'Shadow of the Colossus es un videojuego perteneciente al gÃ©nero de acciÃ³n y aventura desarrollado por la empresa Bluepoint Games', 50000, 12, 'maxresdefault.jpg', 'https://www.youtube.com/embed/pdZQ98mWeto', 1),
(18, 'God of War', 3, 2, 'God of War es un videojuego de acciÃ³n-aventura desarrollado por SCE Santa Monica Studio y publicado por Sony Interactive', 45000, 21, 'maxresdefault (1).jpg', 'https://www.youtube.com/embed/AN3jEjjcZ-k', 1),
(19, 'crash bandicoot', 3, 2, 'Crash Bandicoot es el nombre de una serie de videojuegos protagonizado por el personaje del mismo nombre.', 34000, 13, 'header.jpg', 'https://www.youtube.com/embed/F7G91RjVmvk', 1),
(21, 'Left 4 Dead 2', 2, 1, 'Left 4 Dead 2 es un videojuego de disparos en primera persona cooperativo de tipo survival horror creado por la compaÃ±Ã­a Valve Software', 45000, 13, 'lef_fordead2.jpg', 'https://www.youtube.com/embed/nstNPJdmZtY', 1),
(22, 'Forza Horizon', 4, 1, 'Forza Horizon es un videojuego de carreras de mundo abierto para la consola Xbox 360. Desarrollado principalmente por el desarrollador de juegos britÃ¡nico Playground', 50000, 12, 'ForzaHorizon_Screen.jpg', 'https://www.youtube-nocookie.com/embed/IcPz9Dlw9V8?start=7', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `idRoles` int(11) NOT NULL,
  `descripcion` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`idRoles`, `descripcion`) VALUES
(1, 'admin'),
(2, 'usuario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idUsuarios` int(11) NOT NULL,
  `nombres` varchar(45) DEFAULT NULL,
  `apellidos` varchar(45) DEFAULT NULL,
  `correo` varchar(45) DEFAULT NULL,
  `clave` varchar(45) DEFAULT NULL,
  `telefono` varchar(45) DEFAULT NULL,
  `direccion` varchar(45) DEFAULT NULL,
  `ciudad` varchar(45) DEFAULT NULL,
  `Roles_idRoles` int(11) NOT NULL,
  `estado` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idUsuarios`, `nombres`, `apellidos`, `correo`, `clave`, `telefono`, `direccion`, `ciudad`, `Roles_idRoles`, `estado`) VALUES
(1, 'john', 'Rivera Naranjo', 'juandavid@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '3173903067', 'calle 57#25-03', 'cali', 2, 1),
(2, 'juan', 'rivera', 'juandavidnaranjo75@gmail.com', 'c5efe10ef922d575908700ec15d7517f', '3173903067', 'calle 57#25-03', 'cali', 1, 1),
(3, 'michel', 'rivera', 'venus@gmail.com', 'd93591bdf7860e1e4ee2fca799911215', '3167064670', 'calle 57#25-03', 'cali', 2, 1),
(6, 'Valentina ', 'Sanclemente', 'valentina@gmail.com', '113180fa10fcf7a118ecdbcd21c4cd24', '123456', 'calle 57#22-03', 'palmira', 2, 1),
(8, 'john edward', 'Rivera Naranjo', 'jerivera77@misena.edu.co', '827ccb0eea8a706c4c34a16891f84e7b', '3167064670', 'calle 57#25-03', 'cali', 2, 1),
(49, 'Juan David', 'Rivera Naranjo', 'naranjojuan135@gmail.com', '25f9e794323b453885f5181f1b624d0b', '3173903067', 'calle 57#25-03', 'cali', 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `idVentas` int(11) NOT NULL,
  `Usuarios_idUsuarios` int(11) NOT NULL,
  `Productos_idProductos` int(11) NOT NULL,
  `fecha` timestamp NULL DEFAULT NULL,
  `cantidad_ventas` int(11) DEFAULT NULL,
  `valorapagar` varchar(45) DEFAULT NULL,
  `estado_ventas` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`idVentas`, `Usuarios_idUsuarios`, `Productos_idProductos`, `fecha`, `cantidad_ventas`, `valorapagar`, `estado_ventas`) VALUES
(17, 1, 10, '2019-11-22 05:00:00', 1, '60000', 1),
(18, 1, 11, '2019-11-22 05:00:00', 1, '120000', 1),
(19, 2, 18, '2019-11-22 05:00:00', 1, '45000', 1),
(20, 2, 12, '2019-11-22 05:00:00', 1, '90000', 1),
(21, 2, 14, '2019-11-22 05:00:00', 3, '210000', 1),
(22, 6, 19, '2019-11-22 05:00:00', 1, '34000', 1),
(23, 6, 19, '2019-11-23 05:00:00', 1, '34000', 1),
(24, 6, 14, '2019-11-23 05:00:00', 1, '70000', 1),
(34, 6, 18, '2019-11-24 05:00:00', 1, '45000', 1),
(36, 49, 22, '2019-12-04 05:00:00', 1, '50000', 1),
(37, 49, 21, '2019-12-04 05:00:00', 1, '45000', 1),
(38, 49, 21, '2019-12-04 05:00:00', 1, '45000', 1),
(39, 49, 12, '2019-12-04 05:00:00', 1, '90000', 1),
(40, 49, 13, '2019-12-04 05:00:00', 1, '50000', 1),
(41, 49, 15, '2019-12-04 05:00:00', 1, '54000', 1),
(42, 49, 18, '2019-12-04 05:00:00', 1, '45000', 1),
(43, 49, 11, '2019-12-04 05:00:00', 1, '120000', 1),
(44, 49, 14, '2019-12-04 05:00:00', 1, '70000', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_juego`),
  ADD UNIQUE KEY `nombre` (`nombre_ca`);

--
-- Indices de la tabla `plataforma`
--
ALTER TABLE `plataforma`
  ADD PRIMARY KEY (`id_plataforma`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`idProductos`),
  ADD KEY `juego_idJuego` (`juego_idJuego`),
  ADD KEY `plataforma_idPlataforma` (`plataforma_idPlataforma`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`idRoles`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idUsuarios`),
  ADD UNIQUE KEY `correo` (`correo`),
  ADD KEY `fk_Usuarios_Roles_idx` (`Roles_idRoles`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`idVentas`),
  ADD KEY `fk_Ventas_Usuarios1_idx` (`Usuarios_idUsuarios`),
  ADD KEY `fk_Ventas_Productos1_idx` (`Productos_idProductos`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_juego` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `plataforma`
--
ALTER TABLE `plataforma`
  MODIFY `id_plataforma` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `idProductos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuarios` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `idVentas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`juego_idJuego`) REFERENCES `categoria` (`id_juego`) ON UPDATE CASCADE,
  ADD CONSTRAINT `productos_ibfk_2` FOREIGN KEY (`plataforma_idPlataforma`) REFERENCES `plataforma` (`id_plataforma`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `fk_Usuarios_Roles` FOREIGN KEY (`Roles_idRoles`) REFERENCES `roles` (`idRoles`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `fk_Ventas_Productos1` FOREIGN KEY (`Productos_idProductos`) REFERENCES `productos` (`idProductos`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Ventas_Usuarios1` FOREIGN KEY (`Usuarios_idUsuarios`) REFERENCES `usuarios` (`idUsuarios`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
