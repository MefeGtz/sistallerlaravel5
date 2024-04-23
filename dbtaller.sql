-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-08-2020 a las 06:41:49
-- Versión del servidor: 10.4.13-MariaDB
-- Versión de PHP: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `dbtaller`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aparatosh`
--

CREATE TABLE `aparatosh` (
  `idaparatosh` int(11) NOT NULL,
  `tipo` varchar(60) NOT NULL,
  `marca` varchar(45) NOT NULL,
  `modelo` varchar(45) DEFAULT NULL,
  `descripcion` varchar(255) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `imagen` varchar(70) DEFAULT NULL,
  `ubicacion` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `caratulas`
--

CREATE TABLE `caratulas` (
  `id` int(11) NOT NULL,
  `marca` varchar(20) NOT NULL,
  `modelo` varchar(50) NOT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `imagen` varchar(80) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente_aparato`
--

CREATE TABLE `cliente_aparato` (
  `idclienteaparato` int(11) NOT NULL,
  `nombre_apellido` varchar(250) NOT NULL,
  `direccion` varchar(45) NOT NULL,
  `telefono` varchar(45) DEFAULT NULL,
  `aparato` varchar(45) NOT NULL,
  `marca` varchar(50) NOT NULL,
  `modelo` varchar(45) NOT NULL,
  `descripcion` varchar(245) NOT NULL,
  `estado` varchar(45) NOT NULL,
  `f_ingreso` date NOT NULL,
  `f_entrega` date DEFAULT NULL,
  `imagenaparato` varchar(95) DEFAULT NULL,
  `cobro` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `controles`
--

CREATE TABLE `controles` (
  `id` int(11) NOT NULL,
  `marca` varchar(20) NOT NULL,
  `modelo` varchar(50) NOT NULL,
  `descripcion` varchar(250) DEFAULT NULL,
  `imagen` varchar(80) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fallas`
--

CREATE TABLE `fallas` (
  `id` int(11) NOT NULL,
  `titulo` varchar(60) DEFAULT NULL,
  `aparato` varchar(60) NOT NULL,
  `marca` varchar(50) DEFAULT NULL,
  `modelo` varchar(50) DEFAULT NULL,
  `descripcion` varchar(250) NOT NULL,
  `foto` varchar(60) DEFAULT NULL,
  `foto2` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `flybacks`
--

CREATE TABLE `flybacks` (
  `idflybacks` int(11) NOT NULL,
  `nomenclatura` varchar(45) DEFAULT NULL,
  `descripcion` varchar(80) NOT NULL,
  `foto` varchar(80) DEFAULT NULL,
  `foto2` varchar(60) DEFAULT NULL,
  `foto3` varchar(60) DEFAULT NULL,
  `ubicacion` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ics`
--

CREATE TABLE `ics` (
  `idics` int(11) NOT NULL,
  `nomenclatura` varchar(45) NOT NULL,
  `descripcion` varchar(205) DEFAULT NULL,
  `cantidad` int(11) NOT NULL,
  `contenedor` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marcas`
--

CREATE TABLE `marcas` (
  `idmarca` int(11) NOT NULL,
  `nombre` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `marcas`
--

INSERT INTO `marcas` (`idmarca`, `nombre`) VALUES
(7, 'Admiral'),
(8, 'AIWA'),
(9, 'Ansonic'),
(10, 'APEX'),
(11, 'AOK'),
(12, 'Atec-Panda'),
(13, 'ATVIO'),
(14, 'Audinac'),
(15, 'Apex'),
(16, 'Audiovox'),
(17, 'Aurora'),
(18, 'Basic Line'),
(19, 'Better'),
(20, 'Blue Sky'),
(21, 'Broksonic'),
(22, 'CCE'),
(23, 'Challenger'),
(24, 'Citizen'),
(25, 'Columbia'),
(26, 'Continental'),
(27, 'Crosley'),
(28, 'Crown Mustang'),
(29, 'Cyberlux'),
(30, 'Daenyx'),
(31, 'Daewoo'),
(32, 'Daytek'),
(33, 'Daytron'),
(34, 'Dikler'),
(35, 'Diplomatic'),
(36, 'Durabrand'),
(37, 'Elektra'),
(38, 'Emerson'),
(39, 'E-Tech'),
(40, 'Fisher'),
(41, 'General Electric'),
(42, 'GoldStar'),
(43, 'Goldtek'),
(44, 'Gradiente'),
(45, 'Hamilton'),
(46, 'Hisense'),
(47, 'Hitachi'),
(48, 'Hitech'),
(49, 'Hyundai'),
(50, 'Jensen'),
(51, 'JVC'),
(52, 'JBL'),
(53, 'jWIN'),
(54, 'Kalley'),
(55, 'Kioto'),
(56, 'Konka'),
(57, 'LG'),
(58, 'Magnavox'),
(59, 'Majestic'),
(60, 'Makrosonic'),
(61, 'Mastertech'),
(62, 'Memorex'),
(63, 'Microsonic'),
(64, 'Misawa'),
(65, 'Mitsubishi'),
(66, 'Mitsui'),
(67, 'Mustang'),
(68, 'Nec'),
(69, 'OKI'),
(70, 'Olimpo'),
(71, 'Orion'),
(72, 'Panasonic'),
(73, 'Panavideo'),
(74, 'Panavox'),
(75, 'Panda'),
(76, 'Panoramic'),
(77, 'Parker'),
(78, 'Philco'),
(79, 'PHILIPS'),
(80, 'Pioneer'),
(81, 'Portland'),
(82, 'Polaroid'),
(83, 'Precision'),
(84, 'Premier'),
(85, 'Prima'),
(86, 'Proscam'),
(87, 'Protech'),
(88, 'Pulsar'),
(89, 'Quasar'),
(90, 'Quartz'),
(91, 'Radio Shack'),
(92, 'RCA'),
(93, 'Sakura'),
(94, 'Samsung'),
(95, 'Sankey'),
(96, 'Sansei'),
(97, 'Sansui'),
(98, 'Sanyo'),
(99, 'Sharp'),
(100, 'Shneider'),
(101, 'Sigma'),
(102, 'Silver'),
(103, 'Simply'),
(104, 'Singer'),
(105, 'SONY'),
(106, 'Starlight'),
(107, 'Sylvania'),
(108, 'Symphonic'),
(109, 'Telefunken'),
(110, 'Tekno'),
(111, 'Telesonic'),
(112, 'Thomson'),
(113, 'TLC'),
(114, 'Tonomac'),
(115, 'Tosaki'),
(116, 'Toshiba'),
(117, 'Truesonic'),
(118, 'Watson'),
(119, 'Westinghouse'),
(120, 'Zenith'),
(121, 'Oster'),
(122, 'Osterizer'),
(125, 'Truper'),
(126, 'Kenwood');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `otros`
--

CREATE TABLE `otros` (
  `idotros` int(11) NOT NULL,
  `Tipo` varchar(45) NOT NULL,
  `nomenclatura` varchar(45) DEFAULT NULL,
  `descripcion` varchar(205) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `contenedor` varchar(45) DEFAULT NULL,
  `foto` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pantallas`
--

CREATE TABLE `pantallas` (
  `idpantallas` int(11) NOT NULL,
  `marca` varchar(45) NOT NULL,
  `modelo` varchar(45) NOT NULL,
  `descripcion` varchar(205) DEFAULT NULL,
  `cantidad` int(11) NOT NULL,
  `imagen` varchar(95) DEFAULT NULL,
  `ubicacion` varchar(95) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `papedir`
--

CREATE TABLE `papedir` (
  `idpapedir` int(11) NOT NULL,
  `tipo` varchar(45) NOT NULL,
  `nomenclatura` varchar(45) NOT NULL,
  `descripcion` varchar(245) DEFAULT NULL,
  `cantidad` int(11) NOT NULL,
  `imagen` varchar(95) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `placas`
--

CREATE TABLE `placas` (
  `idplacas` int(11) NOT NULL,
  `marca` varchar(45) NOT NULL,
  `modelo` varchar(45) NOT NULL,
  `descripcion` varchar(245) DEFAULT NULL,
  `foto` varchar(95) DEFAULT NULL,
  `foto2` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipoaparato`
--

CREATE TABLE `tipoaparato` (
  `idtipoaparato` int(11) NOT NULL,
  `nombre` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipoaparato`
--

INSERT INTO `tipoaparato` (`idtipoaparato`, `nombre`) VALUES
(1, 'TV-CRT'),
(2, 'TV-LED'),
(3, 'TV-LCD'),
(4, 'TV-PLASMA'),
(5, 'Equipo de Sonido'),
(6, 'DVD'),
(7, 'Microondas'),
(8, 'Radio de Carro'),
(9, 'Radio'),
(10, 'Reproductor de sonido'),
(11, 'Amplificador de sonido'),
(12, 'Teatro en casa'),
(13, 'Grabadora'),
(14, 'Licuadora'),
(15, 'Taladro'),
(16, 'Batidora'),
(17, 'Inversor AC-DC'),
(18, 'Plancha para ropa'),
(19, 'Plancha para cabello'),
(20, 'Cafetera'),
(21, 'Secadora'),
(22, 'Tostador'),
(23, 'Estabilizador de Corriente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transistores`
--

CREATE TABLE `transistores` (
  `idtransistores` int(11) NOT NULL,
  `nomenclatura` varchar(45) NOT NULL,
  `descripcion` varchar(245) DEFAULT NULL,
  `cantidad` int(11) NOT NULL,
  `contenedor` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Melvin F', 'fernandogutierres801@gmail.com', '$2y$10$3EEwS26bFTB5RneoUNqTUeGZov7l/crmSUYQillWvyKzM6x/Vpgmy', 'Qnset6GUCK1pGGonw29gg88r0aBLdX5vkVVTMUiwkkOnZEKWYeqVjxgt6VDT', '2020-07-13 04:45:36', '2020-08-24 04:40:58'),
(2, 'Usuario', 'usuario@gmail.com', '$2y$10$EahOCXxOTkhaKzT3SaCG.OCMz0TsLFqBWhrE/s/9E9ypE0U5peIFy', '9Wp2SKjgLyyKLy6N4sEYiOaMHptxKh2IHy2TJ5VTGvQWxAQIVGNRdYLQ6wmP', '2020-07-14 05:29:20', '2020-07-14 06:04:27'),
(4, 'prueba', 'prueba@gmail.com', '$2y$10$OKNVJ.j6KIKpfcTzPvwAnuucxIFjlljlyjqwhNAyX5ZKc71UJ4mbW', 'pEeeLEAxsnhYILI7dWk533Y9HDogM71qgHIcHmPnuH2hen1kytqgTKzcjjwd', '2020-07-27 05:44:45', '2020-08-23 05:04:59');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `aparatosh`
--
ALTER TABLE `aparatosh`
  ADD PRIMARY KEY (`idaparatosh`);

--
-- Indices de la tabla `caratulas`
--
ALTER TABLE `caratulas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cliente_aparato`
--
ALTER TABLE `cliente_aparato`
  ADD PRIMARY KEY (`idclienteaparato`);

--
-- Indices de la tabla `controles`
--
ALTER TABLE `controles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `fallas`
--
ALTER TABLE `fallas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `flybacks`
--
ALTER TABLE `flybacks`
  ADD PRIMARY KEY (`idflybacks`);

--
-- Indices de la tabla `ics`
--
ALTER TABLE `ics`
  ADD PRIMARY KEY (`idics`);

--
-- Indices de la tabla `marcas`
--
ALTER TABLE `marcas`
  ADD PRIMARY KEY (`idmarca`);

--
-- Indices de la tabla `otros`
--
ALTER TABLE `otros`
  ADD PRIMARY KEY (`idotros`);

--
-- Indices de la tabla `pantallas`
--
ALTER TABLE `pantallas`
  ADD PRIMARY KEY (`idpantallas`);

--
-- Indices de la tabla `papedir`
--
ALTER TABLE `papedir`
  ADD PRIMARY KEY (`idpapedir`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indices de la tabla `placas`
--
ALTER TABLE `placas`
  ADD PRIMARY KEY (`idplacas`);

--
-- Indices de la tabla `tipoaparato`
--
ALTER TABLE `tipoaparato`
  ADD PRIMARY KEY (`idtipoaparato`);

--
-- Indices de la tabla `transistores`
--
ALTER TABLE `transistores`
  ADD PRIMARY KEY (`idtransistores`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `aparatosh`
--
ALTER TABLE `aparatosh`
  MODIFY `idaparatosh` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `caratulas`
--
ALTER TABLE `caratulas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cliente_aparato`
--
ALTER TABLE `cliente_aparato`
  MODIFY `idclienteaparato` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `controles`
--
ALTER TABLE `controles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `fallas`
--
ALTER TABLE `fallas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `flybacks`
--
ALTER TABLE `flybacks`
  MODIFY `idflybacks` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ics`
--
ALTER TABLE `ics`
  MODIFY `idics` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `marcas`
--
ALTER TABLE `marcas`
  MODIFY `idmarca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT de la tabla `otros`
--
ALTER TABLE `otros`
  MODIFY `idotros` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pantallas`
--
ALTER TABLE `pantallas`
  MODIFY `idpantallas` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `papedir`
--
ALTER TABLE `papedir`
  MODIFY `idpapedir` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `placas`
--
ALTER TABLE `placas`
  MODIFY `idplacas` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipoaparato`
--
ALTER TABLE `tipoaparato`
  MODIFY `idtipoaparato` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `transistores`
--
ALTER TABLE `transistores`
  MODIFY `idtransistores` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
