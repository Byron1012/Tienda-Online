-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-09-2019 a las 08:44:15
-- Versión del servidor: 10.4.6-MariaDB
-- Versión de PHP: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tienda`
--
CREATE DATABASE IF NOT EXISTS `tienda` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `tienda`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `acceso`
--

DROP TABLE IF EXISTS `acceso`;
CREATE TABLE `acceso` (
  `id` int(11) NOT NULL,
  `tipo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `acceso`
--

INSERT INTO `acceso` (`id`, `tipo`) VALUES
(1, 'Administrador'),
(2, 'Cliente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito`
--

DROP TABLE IF EXISTS `carrito`;
CREATE TABLE `carrito` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_juego` int(11) NOT NULL,
  `cantidad_carrito` int(11) NOT NULL,
  `activo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contactos`
--

DROP TABLE IF EXISTS `contactos`;
CREATE TABLE `contactos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `asunto` varchar(50) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `mensaje` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

DROP TABLE IF EXISTS `factura`;
CREATE TABLE `factura` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `subtotal` float NOT NULL,
  `iva` float NOT NULL,
  `total` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `juego`
--

DROP TABLE IF EXISTS `juego`;
CREATE TABLE `juego` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `descuento` int(11) NOT NULL,
  `precio` float NOT NULL,
  `url` varchar(255) NOT NULL,
  `categoria` varchar(50) NOT NULL,
  `edicionLimitada` varchar(50) NOT NULL,
  `incluyeDLC` varchar(50) NOT NULL,
  `descripcionCorta` varchar(255) NOT NULL,
  `descripcionLarga` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `juego`
--

INSERT INTO `juego` (`id`, `nombre`, `cantidad`, `descuento`, `precio`, `url`, `categoria`, `edicionLimitada`, `incluyeDLC`, `descripcionCorta`, `descripcionLarga`) VALUES
(13, 'Residen Evil', 11, 20, 11.5, 'assets/img/ResidentEvil (3).jpg', 'Acción', 'Si', 'Si', 'Juego de Zombies', 'Juego de Acción donde tienes que dispararle a los zombies.'),
(15, 'GTA V', 7, 10, 25, 'assets/img/gta5.jpg', 'Acción', 'Si', 'Si', 'Juego de Acción', 'Juego basado en la delincuencia vivida en las calles.'),
(17, 'Mario Smash Bros', 10, 7, 45, 'assets/img/Mario.png', 'Aventura', 'No', 'Si', 'Juego de aventra', 'Juego de Aventura en 3D'),
(18, 'God of War', 15, 5, 35, 'assets/img/GOW.PNG', 'Aventura', 'Si', 'No', 'Juego de Guerra y aventura', 'Juego de Kratos despues de mucho tiempo cuando ya tiene hasta un hijo.'),
(19, 'Plants vs. Zombies: Garden Warfare 2', 20, 12, 60, 'assets/img/Plants-vs-Zombies-Garden-Warfare-2.jpg', 'Estrategias', 'No', 'Si', 'Plantas vs Zoombies ', 'Juego de estrategia y acción combinados.'),
(20, 'Ratchet & Clank', 25, 6, 30, 'assets/img/maxresdefault.jpg', 'Acción', 'Si', 'Si', 'Acción y aventuras combinadas', 'Acción combinada con aventura una mescla explosiva.'),
(21, 'PES 2019', 50, 7, 20, 'assets/img/pes.jpg', 'Deportes', 'No', 'Si', 'Juego de Footbol', 'Pro Evolution Soccer'),
(22, 'FIFA 2019', 60, 7, 35, 'assets/img/fifa19.jpeg', 'Deportes', 'No', 'Si', 'Juego de Football', 'UItima versión del Fifa.'),
(23, 'Call of duty infinite warfare', 25, 5, 40, 'assets/img/COD.jpg', 'Acción', 'Si', 'No', 'Juego de guerra', 'Juego de disparos y estrategia combinados.'),
(24, 'Crash Bandicoot N. Sane Trilogy', 25, 4, 15, 'assets/img/crash.jpg', 'Aventura', 'No', 'Si', 'Juego de Crash', 'Juego de aventura muy divertido y emocionante.'),
(25, 'Mortal Kombat 11', 45, 6, 32, 'assets/img/mortalcombat.jpg', 'Acción', 'No', 'No', 'Juego de luchas', 'Juego de luchas muy entretenido en 3D.'),
(26, 'World of Warcraft', 100, 8, 17, 'assets/img/wow.jpg', 'Aventura', 'No', 'Si', 'Mundo abierto', 'Juego de aventura de mundo abierto muy entretenido.'),
(27, 'Starcraft', 90, 5, 15, 'assets/img/starcraft.jpg', 'Estrategias', 'Si', 'No', 'Juego estrategico', 'Juego de estrategia y sabiduria muy bueno.'),
(28, 'PLAYERUNKNOWN\'S BATTLEGROUNDS (PUBG)', 100, 5, 50, 'assets/img/pubg.jpg', 'Acción', 'Si', 'Si', 'Juego de disparos', 'Juego de acción y de disparon en battle royale.'),
(29, 'Street Fighter V', 60, 5, 26, 'assets/img/street.jpg', 'Deportes', 'Si', 'No', 'Juego de acción en peleas', 'Juego combinado entre peleas y acción.'),
(30, 'Monster Hunter: World', 45, 10, 23, 'assets/img/Monster-Hunter-World.jpg', 'Aventura', 'Si', 'Si', 'Lucha contra monstruos gigantes en lugares épicos', 'Como cazador, emprenderás misiones para cazar monstruos en una variedad de hábitats.'),
(31, 'Shadow of The Tomb Raider', 40, 2, 36, 'assets/img/Shadow-of-The-Tomb-Raider.jpg', 'Acción', 'Si', 'No', 'Juego de acción de Lara Croft', 'Experimenta el momento decisivo de Lara Croft mientras se convierte en Tomb Raider.'),
(32, 'Detroit Become Human', 10, 3, 22, 'assets/img/Detroit-Become-Human.jpg', 'Aventura', 'Si', 'Si', 'Juego muy entretenido de aventura', 'A lo largo del juego, los jugadores co-escribirán la historia a través de las acciones de varios protagonistas en una narrativa ambiciosa y emocionante.'),
(33, 'NBA 2K19', 50, 4, 15, 'assets/img/NBA-2K19.jpg', 'Deportes', 'Si', 'Si', 'Juego de Baloncesto', 'Juego de deportes muy entretenido.'),
(34, 'Assetto Corsa', 46, 12, 50, 'assets/img/carreras.jpg', 'Carreras', 'Si', 'Si', 'Juego de Carrearas Entretenido', 'Juego muy entretenido de carreras de corsas.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `contraseña` varchar(50) NOT NULL,
  `id_acceso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nombre`, `correo`, `contraseña`, `id_acceso`) VALUES
(1, 'ByronMendoza', 'byron10_12@hotmail.com', '12345', 1),
(4, 'Byron', 'byron20092013@gmail.com', '12345', 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `acceso`
--
ALTER TABLE `acceso`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_juego` (`id_juego`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `contactos`
--
ALTER TABLE `contactos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `factura`
--
ALTER TABLE `factura`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `juego`
--
ALTER TABLE `juego`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`correo`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `id_acceso` (`id_acceso`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `acceso`
--
ALTER TABLE `acceso`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `carrito`
--
ALTER TABLE `carrito`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `contactos`
--
ALTER TABLE `contactos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `factura`
--
ALTER TABLE `factura`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `juego`
--
ALTER TABLE `juego`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD CONSTRAINT `carrito_ibfk_1` FOREIGN KEY (`id_juego`) REFERENCES `juego` (`id`),
  ADD CONSTRAINT `carrito_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `factura`
--
ALTER TABLE `factura`
  ADD CONSTRAINT `factura_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`id_acceso`) REFERENCES `acceso` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
