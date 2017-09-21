-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 21-09-2017 a las 09:31:39
-- Versión del servidor: 5.7.19-0ubuntu0.16.04.1
-- Versión de PHP: 7.0.22-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pjdsys`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `localidads`
--

CREATE TABLE `localidads` (
  `id` int(10) UNSIGNED NOT NULL,
  `ciudad_parroquia` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `condicion` int(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `localidads`
--

INSERT INTO `localidads` (`id`, `ciudad_parroquia`, `condicion`, `created_at`, `updated_at`) VALUES
(1, 'Atyrá – San Francisco de Asís', 1, NULL, NULL),
(2, 'Caacupé - Virgen de los Milagros de Caacupé', 1, NULL, NULL),
(3, 'Cabañas - María Auxiliadora', 1, NULL, NULL),
(4, 'Piribebuy – Santuario Dulce Nombre de Jesús (Ñandejara Guasu)', 1, NULL, NULL),
(5, 'Tobatí - Inmaculada Concepción', 1, NULL, NULL),
(6, 'Altos – San Lorenzo de los Altos', 1, NULL, NULL),
(7, 'Arroyos y Esteros - San Francisco de Asís', 1, NULL, NULL),
(8, 'Emboscada – San Agustín', 1, NULL, NULL),
(9, 'Juan de Mena – San Rafael Arcángel ', 1, NULL, NULL),
(10, 'Loma Grande – María Auxiliadora', 1, NULL, NULL),
(11, 'Nueva Colombia - San Miguel Arcángel', 1, NULL, NULL),
(12, 'San Bernardino – Nuestra Señora de la Asunción', 1, NULL, NULL),
(13, '1ero. De Marzo – Niño Jesús', 1, NULL, NULL),
(14, 'Caraguatay – Virgen de las Mercedes', 1, NULL, NULL),
(15, 'Cleto Romero - San Blas', 1, NULL, NULL),
(16, 'Eusebio Ayala – San Roque', 1, NULL, NULL),
(17, 'Isla Pucú – Virgen del Rosario', 1, NULL, NULL),
(18, 'Itacurubí – Virgen del Rosario', 1, NULL, NULL),
(19, 'Mbocayaty - Niño Salvador del Mundo', 1, NULL, NULL),
(21, 'San José Obrero - San José Obrero', 1, NULL, NULL),
(22, 'Santa Elena – Santa Elena', 1, NULL, NULL),
(23, 'Valenzuela – San José', 1, NULL, NULL),
(24, 'Otros', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(63, '2014_10_12_000000_create_users_table', 1),
(64, '2014_10_12_100000_create_password_resets_table', 1),
(65, '2017_07_06_163352_create_localidades_table', 1),
(66, '2017_07_06_163410_create_personas_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personas`
--

CREATE TABLE `personas` (
  `id` int(10) UNSIGNED NOT NULL,
  `cedula` int(11) NOT NULL,
  `nombre` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellido` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `edad` int(11) NOT NULL,
  `remera` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fotopermiso` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `animador` tinyint(1) NOT NULL,
  `miembrocj` tinyint(1) NOT NULL,
  `dinamizador` tinyint(1) NOT NULL,
  `experiencia` tinyint(1) NOT NULL,
  `zona` int(11) NOT NULL,
  `aprobado` tinyint(1) NOT NULL,
  `localidads_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@admin.com', '$2y$10$YVgX8vhpUKLbsVrgGDDgJuv4ZiyegZqp9nbWAzrWxAbO8uQc9UROK', 'vznxjzNnOZydcHLoDQ6QyaFdSW37RImt5r83qcMLcVV6Z2n6FR7SWHHFYENG', '2017-09-10 15:29:33', '2017-09-10 15:29:33');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `localidads`
--
ALTER TABLE `localidads`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indices de la tabla `personas`
--
ALTER TABLE `personas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personas_cedula_unique` (`cedula`),
  ADD KEY `personas_localidads_id_foreign` (`localidads_id`);

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
-- AUTO_INCREMENT de la tabla `localidads`
--
ALTER TABLE `localidads`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;
--
-- AUTO_INCREMENT de la tabla `personas`
--
ALTER TABLE `personas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `personas`
--
ALTER TABLE `personas`
  ADD CONSTRAINT `personas_localidads_id_foreign` FOREIGN KEY (`localidads_id`) REFERENCES `localidads` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
