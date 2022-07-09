-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-07-2022 a las 16:18:30
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
-- Base de datos: `peliculas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actor`
--

CREATE TABLE `actor` (
  `id` int(11) NOT NULL COMMENT 'id',
  `sex_id` int(11) DEFAULT NULL COMMENT 'Sexo',
  `act_nombre` varchar(60) NOT NULL COMMENT 'Nombre',
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Apellidos y nombre de los actores';

--
-- Volcado de datos para la tabla `actor`
--

INSERT INTO `actor` (`id`, `sex_id`, `act_nombre`, `updated_at`, `created_at`) VALUES
(1, 1, 'Tom Hanks', '2022-07-08 07:25:35', '2022-07-08 07:25:35'),
(2, 1, 'Leonardo DiCaprio', '2022-07-08 07:25:43', '2022-07-08 07:25:43'),
(3, 1, 'Johnny Depp', '2022-07-08 07:26:14', '2022-07-08 07:26:14'),
(4, 1, 'Denzel Washington', '2022-07-08 07:26:36', '2022-07-08 07:26:36'),
(5, 1, 'Brad Pitt', '2022-07-08 07:26:55', '2022-07-08 07:26:55'),
(6, 1, 'Tom Cruise', '2022-07-08 07:27:08', '2022-07-08 07:27:08'),
(7, 1, 'Morgan Freeman', '2022-07-08 07:27:28', '2022-07-08 07:27:28'),
(8, 1, 'Matt Damon', '2022-07-08 02:28:11', '2022-07-08 02:28:11'),
(9, 1, 'George Clooney', '2022-07-08 07:28:52', '2022-07-08 07:28:52'),
(10, 1, 'Will Smith', '2022-07-08 07:29:09', '2022-07-08 07:29:09'),
(11, 1, 'Robert Downey Jr.', '2022-07-08 07:29:27', '2022-07-08 07:29:27'),
(12, 1, 'Chris Hemsworth', '2022-07-08 07:29:50', '2022-07-08 07:29:50'),
(13, 1, 'Samuel L. Jackson', '2022-07-08 07:30:06', '2022-07-08 07:30:06'),
(14, 1, 'Vin Diesel', '2022-07-08 07:30:28', '2022-07-08 07:30:28'),
(15, 1, 'Nicolas Cage', '2022-07-08 07:30:45', '2022-07-08 07:30:45'),
(16, 2, 'Scarlett Johansson', '2022-07-08 07:31:21', '2022-07-08 07:31:21'),
(17, 2, 'Nicole Kidman', '2022-07-08 07:31:30', '2022-07-08 07:31:30'),
(18, 2, 'Angelina Jolie', '2022-07-08 07:31:43', '2022-07-08 07:31:43'),
(19, 2, 'Natalie Portman', '2022-07-08 02:32:11', '2022-07-08 02:32:11'),
(20, 2, 'Emma Watson', '2022-07-08 07:32:46', '2022-07-08 07:32:46'),
(21, 2, 'Jennifer Lawrence', '2022-07-08 07:33:04', '2022-07-08 07:33:04'),
(22, 2, 'Megan Fox', '2022-07-08 07:33:20', '2022-07-08 07:33:20'),
(23, 2, 'Winona Ryder', '2022-07-08 07:33:48', '2022-07-08 07:33:48');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actor_pelicula`
--

CREATE TABLE `actor_pelicula` (
  `id` int(11) NOT NULL COMMENT 'id',
  `act_id` int(11) DEFAULT NULL COMMENT 'Actor',
  `pel_id` int(11) DEFAULT NULL COMMENT 'Película',
  `apl_papel` varchar(60) NOT NULL COMMENT 'Papel',
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Registro de Papel en la Pelicula Actor Principal-&#';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alquiler`
--

CREATE TABLE `alquiler` (
  `id` int(11) NOT NULL COMMENT 'id',
  `soc_id` int(11) DEFAULT NULL COMMENT 'Socio',
  `pel_id` int(11) DEFAULT NULL COMMENT 'Película',
  `alq_fecha_desde` date NOT NULL COMMENT 'Fecha Inicial',
  `alq_fecha_hasta` date NOT NULL COMMENT 'Fecha Final',
  `alq_valor` decimal(10,2) NOT NULL COMMENT 'Valor',
  `alq_fecha_entrega` date DEFAULT NULL COMMENT 'Fecha Entrega',
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Datos de Alquiler de la Pelicula al Socio';

--
-- Volcado de datos para la tabla `alquiler`
--

INSERT INTO `alquiler` (`id`, `soc_id`, `pel_id`, `alq_fecha_desde`, `alq_fecha_hasta`, `alq_valor`, `alq_fecha_entrega`, `updated_at`, `created_at`) VALUES
(1, 27, 11, '2022-01-02', '2022-01-31', '3.40', '2022-01-31', '2022-01-02 06:00:00', '2022-01-02 06:00:00'),
(2, 19, 12, '2022-01-02', '2022-01-31', '2.80', '2022-01-31', '2022-01-02 06:00:01', '2022-01-02 06:00:01'),
(3, 48, 4, '2022-02-01', '2022-02-25', '2.30', '2022-02-25', '2022-07-08 12:39:53', '2022-07-08 12:39:53'),
(4, 42, 12, '2022-02-02', '2022-02-25', '2.80', '2022-02-25', '2022-07-08 12:39:53', '2022-07-08 12:39:53'),
(5, 4, 2, '2022-02-03', '2022-02-25', '2.50', '2022-02-25', '2022-07-08 12:39:53', '2022-07-08 12:39:53'),
(6, 30, 4, '2022-03-01', '2022-03-31', '2.30', '2022-03-31', '2022-01-02 06:00:05', '2022-01-02 06:00:05'),
(7, 41, 10, '2022-03-01', '2022-03-31', '3.90', '2022-03-31', '2022-01-02 06:00:06', '2022-01-02 06:00:06'),
(8, 30, 8, '2022-03-01', '2022-03-31', '2.30', '2022-03-31', '2022-01-02 06:00:07', '2022-01-02 06:00:07'),
(9, 32, 11, '2022-03-01', '2022-03-31', '3.40', '2022-03-31', '2022-01-02 06:00:08', '2022-01-02 06:00:08'),
(10, 4, 7, '2022-03-01', '2022-03-31', '4.50', '2022-03-31', '2022-01-02 06:00:09', '2022-01-02 06:00:09'),
(11, 16, 5, '2022-04-01', '2022-06-25', '3.10', '2022-06-25', '2022-07-08 12:39:53', '2022-07-08 12:39:53'),
(12, 1, 4, '2022-04-01', '2022-06-25', '2.30', '2022-06-25', '2022-07-08 12:39:53', '2022-07-08 12:39:53'),
(13, 7, 2, '2022-04-01', '2022-06-25', '2.50', '2022-06-25', '2022-07-08 12:39:53', '2022-07-08 12:39:53'),
(14, 8, 8, '2022-04-01', '2022-06-25', '2.30', '2022-06-25', '2022-07-08 12:39:53', '2022-07-08 12:39:53'),
(15, 30, 2, '2022-05-01', '2022-05-31', '2.50', '2022-05-31', '2022-01-02 06:00:14', '2022-01-02 06:00:14'),
(16, 1, 10, '2022-05-01', '2022-05-31', '3.90', '2022-05-31', '2022-01-02 06:00:15', '2022-01-02 06:00:15'),
(17, 14, 8, '2022-05-01', '2022-05-31', '2.30', '2022-05-31', '2022-01-02 06:00:16', '2022-01-02 06:00:16'),
(18, 13, 9, '2022-06-01', '2022-06-25', '2.40', '2022-06-25', '2022-07-08 12:39:54', '2022-07-08 12:39:54'),
(19, 18, 10, '2022-06-01', '2022-06-25', '3.90', '2022-06-25', '2022-07-08 12:39:54', '2022-07-08 12:39:54'),
(20, 41, 6, '2022-06-01', '2022-06-25', '2.20', '2022-06-25', '2022-07-08 12:39:54', '2022-07-08 12:39:54'),
(21, 21, 1, '2022-06-01', '2022-06-25', '2.50', '2022-06-25', '2022-07-08 12:39:54', '2022-07-08 12:39:54'),
(22, 2, 5, '2022-06-01', '2022-06-25', '3.10', '2022-06-25', '2022-07-08 12:39:54', '2022-07-08 12:39:54'),
(23, 5, 3, '2022-06-01', '2022-06-25', '2.30', '2022-06-25', '2022-07-08 12:39:54', '2022-07-08 12:39:54'),
(24, 41, 4, '2022-06-01', '2022-06-25', '2.30', '2022-06-25', '2022-07-08 12:39:54', '2022-07-08 12:39:54'),
(25, 17, 9, '2022-06-01', '2022-06-25', '2.40', '2022-06-25', '2022-07-08 12:39:54', '2022-07-08 12:39:54'),
(26, 47, 8, '2022-06-01', '2022-06-25', '2.30', '2022-06-25', '2022-07-08 12:39:54', '2022-07-08 12:39:54'),
(27, 26, 9, '2022-07-01', '2022-07-31', '2.40', '2022-07-31', '2022-01-02 06:00:26', '2022-01-02 06:00:26'),
(28, 23, 12, '2022-07-01', '2022-07-31', '2.80', '2022-07-31', '2022-01-02 06:00:27', '2022-01-02 06:00:27'),
(29, 10, 5, '2022-07-01', '2022-07-31', '3.10', '2022-07-31', '2022-01-02 06:00:28', '2022-01-02 06:00:28'),
(30, 44, 9, '2022-07-01', '2022-07-31', '2.40', '2022-07-31', '2022-01-02 06:00:29', '2022-01-02 06:00:29'),
(31, 32, 2, '2022-07-01', '2022-07-31', '2.50', '2022-07-31', '2022-01-02 06:00:30', '2022-01-02 06:00:30'),
(32, 20, 11, '2022-06-01', '2022-06-25', '3.40', '2022-06-25', '2022-07-08 13:03:49', '2022-07-08 13:03:49'),
(33, 11, 7, '2022-06-01', '2022-06-25', '4.50', '2022-06-25', '2022-07-08 13:02:54', '2022-07-08 13:02:54'),
(34, 49, 4, '2022-06-01', '2022-06-25', '2.30', '2022-06-25', '2022-07-08 13:03:10', '2022-07-08 13:03:10'),
(35, 27, 2, '2022-06-01', '2022-06-25', '2.50', '2022-06-25', '2022-07-08 13:03:40', '2022-07-08 13:03:40'),
(36, 37, 13, '2022-04-01', '2022-06-25', '4.10', '2022-06-25', '2022-07-08 12:39:53', '2022-07-08 12:39:53'),
(37, 2, 9, '2022-04-01', '2022-06-25', '2.40', '2022-06-25', '2022-07-08 12:39:53', '2022-07-08 12:39:53'),
(38, 44, 8, '2022-03-01', '2022-03-31', '2.30', '2022-03-31', '2022-01-02 06:00:37', '2022-01-02 06:00:37'),
(39, 46, 1, '2022-03-01', '2022-03-31', '2.50', '2022-03-31', '2022-01-02 06:00:38', '2022-01-02 06:00:38'),
(40, 10, 6, '2022-03-01', '2022-03-31', '2.20', '2022-03-31', '2022-01-02 06:00:39', '2022-01-02 06:00:39'),
(41, 23, 10, '2022-03-01', '2022-03-31', '3.90', '2022-03-31', '2022-01-02 06:00:40', '2022-01-02 06:00:40'),
(42, 44, 5, '2022-03-01', '2022-03-31', '3.10', '2022-03-31', '2022-01-02 06:00:41', '2022-01-02 06:00:41'),
(43, 44, 12, '2022-03-01', '2022-03-31', '2.80', '2022-03-31', '2022-01-02 06:00:42', '2022-01-02 06:00:42'),
(44, 2, 11, '2022-03-01', '2022-03-31', '3.40', '2022-03-31', '2022-01-02 06:00:43', '2022-01-02 06:00:43'),
(45, 23, 13, '2022-06-01', '2022-06-25', '4.10', '2022-06-25', '2022-07-08 12:39:54', '2022-07-08 12:39:54'),
(46, 16, 2, '2022-06-01', '2022-06-25', '2.50', '2022-06-25', '2022-07-08 12:39:54', '2022-07-08 12:39:54'),
(47, 31, 12, '2022-06-01', '2022-06-25', '2.80', '2022-06-25', '2022-07-08 12:39:54', '2022-07-08 12:39:54'),
(48, 27, 3, '2022-06-01', '2022-06-25', '2.30', '2022-06-25', '2022-07-08 12:39:54', '2022-07-08 12:39:54'),
(49, 33, 11, '2022-06-01', '2022-06-25', '3.40', '2022-06-25', '2022-07-08 12:39:54', '2022-07-08 12:39:54'),
(50, 8, 9, '2022-06-01', '2022-06-25', '2.40', '2022-06-25', '2022-07-08 12:39:54', '2022-07-08 12:39:54'),
(51, 12, 4, '2022-06-01', '2022-06-25', '2.30', '2022-06-25', '2022-07-08 12:39:54', '2022-07-08 12:39:54'),
(52, 2, 4, '2022-02-08', '2022-02-24', '2.30', '2022-02-24', '2022-07-08 18:02:04', '2022-07-08 18:02:04'),
(53, 3, 1, '2022-05-05', '2022-05-26', '2.50', '2022-05-26', '2022-07-08 18:05:31', '2022-07-08 18:05:31'),
(54, 8, 1, '2022-05-06', '2022-05-22', '2.50', '2022-05-22', '2022-07-08 18:06:27', '2022-07-08 18:06:27'),
(55, 9, 6, '2022-05-02', '2022-05-23', '2.20', '2022-05-23', '2022-07-08 18:08:00', '2022-07-08 18:08:00'),
(56, 3, 2, '2022-05-03', '2022-05-18', '2.50', '2022-05-18', '2022-07-08 18:09:02', '2022-07-08 18:09:02');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `director`
--

CREATE TABLE `director` (
  `id` int(11) NOT NULL COMMENT 'Id',
  `dir_nombre` varchar(60) NOT NULL COMMENT 'Nombre',
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Nombre del director de la pelicula';

--
-- Volcado de datos para la tabla `director`
--

INSERT INTO `director` (`id`, `dir_nombre`, `updated_at`, `created_at`) VALUES
(1, 'Steven Spielberg', '2022-07-08 07:43:05', '2022-07-08 07:43:05'),
(2, 'Martin Scorsese', '2022-07-08 07:43:13', '2022-07-08 07:43:13'),
(3, 'Stanley Kubrick', '2022-07-08 07:43:23', '2022-07-08 07:43:23'),
(4, 'Alfred Hitchcock', '2022-07-08 07:43:37', '2022-07-08 07:43:37'),
(5, 'Quentin Tarantino', '2022-07-08 07:43:47', '2022-07-08 07:43:47'),
(6, 'Christopher Nolan', '2022-07-08 07:45:59', '2022-07-08 07:45:59'),
(7, 'Tim Burton', '2022-07-08 07:46:08', '2022-07-08 07:46:08'),
(8, 'Guillermo del Toro', '2022-07-08 07:46:20', '2022-07-08 07:46:20'),
(9, 'James Gunn', '2022-07-08 07:47:12', '2022-07-08 07:47:12'),
(10, 'James Cameron', '2022-07-08 07:48:11', '2022-07-08 07:48:11'),
(11, 'Justin Baldoni', '2022-07-08 08:48:23', '2022-07-08 08:48:23'),
(12, 'Greg Mottola', '2022-07-08 08:50:24', '2022-07-08 08:50:24'),
(13, 'David Yates', '2022-07-08 08:57:27', '2022-07-08 08:57:27'),
(14, 'Adrian Malone', '2022-07-08 09:03:20', '2022-07-08 09:03:20');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `formato`
--

CREATE TABLE `formato` (
  `id` int(11) NOT NULL COMMENT 'Id',
  `for_nombre` varchar(60) NOT NULL COMMENT 'Nombre',
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='CD DVD VHS';

--
-- Volcado de datos para la tabla `formato`
--

INSERT INTO `formato` (`id`, `for_nombre`, `updated_at`, `created_at`) VALUES
(1, 'Blu-Ray', '2022-07-08 07:38:34', '2022-07-08 07:38:34'),
(2, 'DVD', '2022-07-08 07:38:43', '2022-07-08 07:38:43'),
(3, 'Laser Disc', '2022-07-08 07:38:53', '2022-07-08 07:38:53'),
(4, 'Digital', '2022-07-08 07:39:01', '2022-07-08 07:39:01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genero`
--

CREATE TABLE `genero` (
  `id` int(11) NOT NULL COMMENT 'Id',
  `gen_nombre` varchar(60) NOT NULL COMMENT 'Nombre',
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Romantica Comico Ciencia Ficcion Deportes';

--
-- Volcado de datos para la tabla `genero`
--

INSERT INTO `genero` (`id`, `gen_nombre`, `updated_at`, `created_at`) VALUES
(1, 'Acción', '2022-07-08 07:40:32', '2022-07-08 07:40:32'),
(2, 'Comedia', '2022-07-08 07:40:43', '2022-07-08 07:40:43'),
(3, 'Drama', '2022-07-08 07:40:50', '2022-07-08 07:40:50'),
(4, 'Fantasía', '2022-07-08 07:40:59', '2022-07-08 07:40:59'),
(5, 'Sci-fi', '2022-07-08 07:41:24', '2022-07-08 07:41:24'),
(6, 'Documental', '2022-07-08 07:41:37', '2022-07-08 07:41:37'),
(7, 'Terror', '2022-07-08 07:41:46', '2022-07-08 07:41:46'),
(8, 'Romance', '2022-07-08 07:42:15', '2022-07-08 07:42:15'),
(9, 'Animación', '2022-07-08 07:42:31', '2022-07-08 07:42:31');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2022_06_03_170905_create_sessions_table', 1);

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
-- Estructura de tabla para la tabla `pelicula`
--

CREATE TABLE `pelicula` (
  `id` int(11) NOT NULL COMMENT 'Id',
  `gen_id` int(11) DEFAULT NULL COMMENT 'Genero',
  `dir_id` int(11) DEFAULT NULL COMMENT 'Director',
  `for_id` int(11) DEFAULT NULL COMMENT 'Formato',
  `pel_nombre` varchar(60) NOT NULL COMMENT 'Nombre',
  `pel_costo` decimal(10,2) NOT NULL COMMENT 'Costo',
  `pel_fecha_estreno` date DEFAULT NULL COMMENT 'Fecha Estreno',
  `imagen` varchar(2500) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Datos de Identificación de la Película';

--
-- Volcado de datos para la tabla `pelicula`
--

INSERT INTO `pelicula` (`id`, `gen_id`, `dir_id`, `for_id`, `pel_nombre`, `pel_costo`, `pel_fecha_estreno`, `imagen`, `updated_at`, `created_at`) VALUES
(1, 1, 5, 1, 'Pulp Fiction', '2.50', '1994-05-21', 'public/img/movies/4ac0b7c0-7a3c-4335-a4f1-f352ac31b134', '2022-07-08 08:26:41', '2022-07-08 03:26:41'),
(2, 5, 1, 2, 'Jurassic Park', '2.50', '1993-06-09', 'public/img/movies/5125f97b-b1f9-4681-bfe9-c44bf2cc032b', '2022-07-08 08:30:21', '2022-07-08 08:30:21'),
(3, 7, 1, 4, 'Tiburón', '2.30', '1975-06-21', 'public/img/movies/8c15c0ed-bbcb-4d5a-a487-c5bd47f04956', '2022-07-08 08:33:24', '2022-07-08 08:33:24'),
(4, 1, 8, 2, 'Hellboy', '2.30', '2004-10-01', 'public/img/movies/e3157e8a-bfe2-4360-b5b6-55801f561e45', '2022-07-08 08:38:45', '2022-07-08 08:38:45'),
(5, 5, 9, 4, 'Guardianes de la Galaxia', '3.10', '2014-08-01', 'public/img/movies/248cb81b-36fb-4b21-90f0-e2750202801d', '2022-07-08 08:40:56', '2022-07-08 08:40:56'),
(6, 5, 9, 2, 'Suicide Squad', '2.20', '2021-08-06', 'public/img/movies/3dd10f3f-eaa3-4ff4-8e7c-af0ea6626845', '2022-07-08 08:42:48', '2022-07-08 08:42:48'),
(7, 8, 10, 1, 'Titanic', '4.50', '1997-12-19', 'public/img/movies/36e1b4a2-59ef-41fe-8358-b863609b9709', '2022-07-08 08:46:37', '2022-07-08 08:46:37'),
(8, 3, 11, 4, 'A dos metros de ti', '2.30', '2019-03-07', 'public/img/movies/925c47c0-cf89-473b-8000-427dc9a56e53', '2022-07-08 08:49:19', '2022-07-08 08:49:19'),
(9, 2, 12, 2, 'Supercool', '2.40', '2007-08-17', 'public/img/movies/6cb5d932-f701-42a0-92f7-05a773857f06', '2022-07-08 08:55:14', '2022-07-08 03:55:14'),
(10, 4, 13, 1, 'Animales fantásticos: los secretos de Dumbledore', '3.90', '2022-04-08', 'public/img/movies/ad7c65fd-e134-46f8-9031-d1b73830a04c', '2022-07-08 08:58:40', '2022-07-08 08:58:40'),
(11, 9, 7, 4, 'El extraño mundo de Jack', '3.40', '1993-10-13', 'public/img/movies/cc6e2bfc-0596-4746-98e2-d94b996f47d3', '2022-07-08 09:00:49', '2022-07-08 09:00:49'),
(12, 9, 7, 1, 'El cadáver de la novia', '2.80', '2005-09-16', 'public/img/movies/4fb0b602-ffdd-41ee-bd76-ddd182c89673', '2022-07-08 09:02:24', '2022-07-08 09:02:24'),
(13, 6, 14, 2, 'Cosmos: un viaje personal', '4.10', '1980-09-28', 'public/img/movies/8193fe79-c109-4452-b66c-4d593d5352ac', '2022-07-08 09:04:39', '2022-07-08 09:04:39');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('g0tH6BHC0KRuy4nPm955JNiC7oM4R3rBj2AKlDte', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiN0wzS2Y5R1E3cVF6SzZ3T1NYUWF1MUFndm5IaWJtWkh4M1ZpT0NMeiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hbHF1aWxlciI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7czo0OiJhdXRoIjthOjE6e3M6MjE6InBhc3N3b3JkX2NvbmZpcm1lZF9hdCI7aToxNjU3MzM3NTI3O319', 1657339445);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sexo`
--

CREATE TABLE `sexo` (
  `id` int(11) NOT NULL COMMENT 'id',
  `sex_nombre` varchar(60) NOT NULL COMMENT 'Nombre',
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Maculino Femenino';

--
-- Volcado de datos para la tabla `sexo`
--

INSERT INTO `sexo` (`id`, `sex_nombre`, `updated_at`, `created_at`) VALUES
(1, 'Masculino', '2022-07-08 07:24:41', '2022-07-08 07:24:41'),
(2, 'Femenino', '2022-07-08 07:24:47', '2022-07-08 07:24:47');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `socio`
--

CREATE TABLE `socio` (
  `id` int(11) NOT NULL COMMENT 'id',
  `soc_cedula` char(10) NOT NULL COMMENT 'Cédula',
  `soc_nombre` varchar(60) NOT NULL COMMENT 'Nombre',
  `soc_direccion` varchar(60) NOT NULL COMMENT 'Dirección',
  `soc_telefono` char(10) NOT NULL COMMENT 'Teléfono',
  `soc_correo` varchar(60) NOT NULL COMMENT 'Correo',
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `socio`
--

INSERT INTO `socio` (`id`, `soc_cedula`, `soc_nombre`, `soc_direccion`, `soc_telefono`, `soc_correo`, `updated_at`, `created_at`) VALUES
(1, '1753699808', 'Elias Telleria', 'Quito', '0995794780', 'socmail08@gmail.com', '2022-01-02 05:00:00', '2022-01-02 05:00:00'),
(2, '1753699809', 'Jose Garcia', 'Ambato', '0995794780', 'socmail09@gmail.com', '2022-01-02 05:00:00', '2022-01-02 05:00:00'),
(3, '1753699810', 'Antonio Rodriguez', 'Cuenca', '0995794781', 'socmail10@gmail.com', '2022-02-01 05:00:00', '2022-02-01 05:00:00'),
(4, '1753699811', 'Manuel Gonzalez', 'Guayaquil', '0995794781', 'socmail11@gmail.com', '2022-02-02 05:00:00', '2022-02-02 05:00:00'),
(5, '1753699812', 'Francisco Fernandez', 'Manta', '0995794781', 'socmail12@gmail.com', '2022-02-03 05:00:00', '2022-02-03 05:00:00'),
(6, '1753699813', 'Juan Lopez', 'Loja', '0995794781', 'socmail13@gmail.com', '2022-03-01 05:00:00', '2022-03-02 05:00:00'),
(7, '1753699814', 'Pedro Martinez', 'Ibarra', '0995794781', 'socmail14@gmail.com', '2022-03-01 05:00:00', '2022-03-02 05:00:00'),
(8, '1753699815', 'Luis Sanchez', 'Santo Domingo', '0995794781', 'socmail15@gmail.com', '2022-03-01 05:00:00', '2022-03-02 05:00:00'),
(9, '1753699816', 'Miguel Perez', 'Latacunga', '0995794781', 'socmail16@gmail.com', '2022-03-01 05:00:00', '2022-03-02 05:00:00'),
(10, '1753699817', 'Angel Gomez', 'Quevedo', '0995794781', 'socmail17@gmail.com', '2022-03-01 05:00:00', '2022-03-02 05:00:00'),
(11, '1753699818', 'Jesus Martin', 'Quito', '0995794781', 'socmail18@gmail.com', '2022-04-01 05:00:00', '2022-04-02 05:00:00'),
(12, '1753699819', 'Rafael Jimenez', 'Ambato', '0995794781', 'socmail19@gmail.com', '2022-04-01 05:00:00', '2022-04-02 05:00:00'),
(13, '1753699820', 'Vicente Hernandez', 'Cuenca', '0995794782', 'socmail20@gmail.com', '2022-04-01 05:00:00', '2022-04-02 05:00:00'),
(14, '1753699821', 'Ramon Ruiz', 'Guayaquil', '0995794782', 'socmail21@gmail.com', '2022-04-01 05:00:00', '2022-04-02 05:00:00'),
(15, '1753699822', 'Jose Maria Diaz', 'Manta', '0995794782', 'socmail22@gmail.com', '2022-05-01 05:00:00', '2022-05-02 05:00:00'),
(16, '1753699823', 'Jose Luis Moreno', 'Loja', '0995794782', 'socmail23@gmail.com', '2022-05-01 05:00:00', '2022-05-02 05:00:00'),
(17, '1753699824', 'Jose Antonio Muñoz', 'Ibarra', '0995794782', 'socmail24@gmail.com', '2022-05-01 05:00:00', '2022-05-02 05:00:00'),
(18, '1753699825', 'Joaquin Alvarez', 'Santo Domingo', '0995794782', 'socmail25@gmail.com', '2022-06-01 05:00:00', '2022-06-02 05:00:00'),
(19, '1753699826', 'Fernando Romero', 'Latacunga', '0995794782', 'socmail26@gmail.com', '2022-06-01 05:00:00', '2022-06-02 05:00:00'),
(20, '1753699827', 'Enrique Gutierrez', 'Quevedo', '0995794782', 'socmail27@gmail.com', '2022-06-01 05:00:00', '2022-06-02 05:00:00'),
(21, '1753699828', 'Andres Alonso', 'Quito', '0995794782', 'socmail28@gmail.com', '2022-06-01 05:00:00', '2022-06-02 05:00:00'),
(22, '1753699829', 'Emilio Navarro', 'Ambato', '0995794782', 'socmail29@gmail.com', '2022-06-01 05:00:00', '2022-06-02 05:00:00'),
(23, '1753699830', 'Julian Torres', 'Cuenca', '0995794783', 'socmail30@gmail.com', '2022-06-01 05:00:00', '2022-06-02 05:00:00'),
(24, '1753699831', 'Felix Dominguez', 'Guayaquil', '0995794783', 'socmail31@gmail.com', '2022-06-01 05:00:00', '2022-06-02 05:00:00'),
(25, '1753699832', 'Julio Ramos', 'Manta', '0995794783', 'socmail32@gmail.com', '2022-06-01 05:00:00', '2022-06-02 05:00:00'),
(26, '1753699833', 'Santiago Vazquez', 'Loja', '0995794783', 'socmail33@gmail.com', '2022-06-01 05:00:00', '2022-06-02 05:00:00'),
(27, '1753699834', 'Carlos Ramirez', 'Ibarra', '0995794783', 'socmail34@gmail.com', '2022-07-01 05:00:00', '2022-07-02 05:00:00'),
(28, '1753699835', 'Salvador Gil', 'Santo Domingo', '0995794783', 'socmail35@gmail.com', '2022-07-01 05:00:00', '2022-07-02 05:00:00'),
(29, '1753699836', 'Tomas Serrano', 'Latacunga', '0995794783', 'socmail36@gmail.com', '2022-07-01 05:00:00', '2022-07-02 05:00:00'),
(30, '1753699837', 'Agustin Morales', 'Quevedo', '0995794783', 'socmail37@gmail.com', '2022-07-01 05:00:00', '2022-07-02 05:00:00'),
(31, '1753699838', 'Domingo Molina', 'Quito', '0995794783', 'socmail38@gmail.com', '2022-07-01 05:00:00', '2022-07-02 05:00:00'),
(32, '1753699839', 'Mariano Blanco', 'Ambato', '0995794783', 'socmail39@gmail.com', '2022-04-01 05:00:00', '2022-04-02 05:00:00'),
(33, '1753699840', 'Jaime Suarez', 'Cuenca', '0995794784', 'socmail40@gmail.com', '2022-04-01 05:00:00', '2022-04-02 05:00:00'),
(34, '1753699841', 'Alfonso Castro', 'Guayaquil', '0995794784', 'socmail41@gmail.com', '2022-04-01 05:00:00', '2022-04-02 05:00:00'),
(35, '1753699842', 'Eduardo Ortega', 'Manta', '0995794784', 'socmail42@gmail.com', '2022-04-01 05:00:00', '2022-04-02 05:00:00'),
(36, '1753699843', 'Juan Jose Delgado', 'Loja', '0995794784', 'socmail43@gmail.com', '2022-04-01 05:00:00', '2022-04-02 05:00:00'),
(37, '1753699844', 'Gregorio Ortiz', 'Ibarra', '0995794784', 'socmail44@gmail.com', '2022-04-01 05:00:00', '2022-04-02 05:00:00'),
(38, '1753699845', 'Ricardo Marin', 'Santo Domingo', '0995794784', 'socmail45@gmail.com', '2022-03-01 05:00:00', '2022-03-02 05:00:00'),
(39, '1753699846', 'Pablo Rubio', 'Latacunga', '0995794784', 'socmail46@gmail.com', '2022-03-01 05:00:00', '2022-03-02 05:00:00'),
(40, '1753699847', 'Diego Nuñez', 'Quevedo', '0995794784', 'socmail47@gmail.com', '2022-03-01 05:00:00', '2022-03-02 05:00:00'),
(41, '1753699848', 'Felipe Sanz', 'Quito', '0995794784', 'socmail48@gmail.com', '2022-03-01 05:00:00', '2022-03-02 05:00:00'),
(42, '1753699849', 'Josep Medina', 'Ambato', '0995794784', 'socmail49@gmail.com', '2022-03-01 05:00:00', '2022-03-02 05:00:00'),
(43, '1753699850', 'Juan Antonio Iglesias', 'Cuenca', '0995794785', 'socmail50@gmail.com', '2022-03-01 05:00:00', '2022-03-02 05:00:00'),
(44, '1753699851', 'Jose Manuel Castillo', 'Guayaquil', '0995794785', 'socmail51@gmail.com', '2022-03-01 05:00:00', '2022-03-02 05:00:00'),
(45, '1753699852', 'Eugenio Cortes', 'Manta', '0995794785', 'socmail52@gmail.com', '2022-06-01 05:00:00', '2022-06-02 05:00:00'),
(46, '1753699853', 'Alejandro Garrido', 'Loja', '0995794785', 'socmail53@gmail.com', '2022-06-01 05:00:00', '2022-06-02 05:00:00'),
(47, '1753699854', 'Ignacio Santos', 'Ibarra', '0995794785', 'socmail54@gmail.com', '2022-06-01 05:00:00', '2022-06-02 05:00:00'),
(48, '1753699855', 'Sebastian Guerrero', 'Santo Domingo', '0995794785', 'socmail55@gmail.com', '2022-06-01 05:00:00', '2022-06-02 05:00:00'),
(49, '1753699856', 'Alberto Lozano', 'Latacunga', '0995794785', 'socmail56@gmail.com', '2022-06-01 05:00:00', '2022-06-02 05:00:00'),
(50, '1753699857', 'Lorenzo Cano', 'Quevedo', '0995794785', 'socmail57@gmail.com', '2022-06-01 05:00:00', '2022-06-02 05:00:00'),
(51, '1753699858', 'Daniel Mendez', 'Quito', '0995794785', 'socmail58@gmail.com', '2022-06-01 05:00:00', '2022-06-02 05:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'Elias Telleria', 'telleriaelias@gmail.com', NULL, '$2y$10$FLfdVLPARrojhFQM7ju00.xYydfMVD3nn5Huc1S01/zewcIJf0mP2', NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-08 07:24:26', '2022-07-08 07:24:26');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actor`
--
ALTER TABLE `actor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Fn_SEXO_ACTOR` (`sex_id`);

--
-- Indices de la tabla `actor_pelicula`
--
ALTER TABLE `actor_pelicula`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Fn_ACTOR_actor_pelicula` (`act_id`),
  ADD KEY `Fn_PELICULA_actor_pelicula` (`pel_id`);

--
-- Indices de la tabla `alquiler`
--
ALTER TABLE `alquiler`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Fn_PELICULA_ALQUILER` (`pel_id`),
  ADD KEY `Fn_SOCIO_ALQUILER` (`soc_id`);

--
-- Indices de la tabla `director`
--
ALTER TABLE `director`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `formato`
--
ALTER TABLE `formato`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `genero`
--
ALTER TABLE `genero`
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
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `pelicula`
--
ALTER TABLE `pelicula`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Fn_DIRECTOR_PELICULA` (`dir_id`),
  ADD KEY `Fn_FORMATO_PELICULA` (`for_id`),
  ADD KEY `Fn_GENERO_PELICULA` (`gen_id`);

--
-- Indices de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indices de la tabla `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indices de la tabla `sexo`
--
ALTER TABLE `sexo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `socio`
--
ALTER TABLE `socio`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT de la tabla `actor`
--
ALTER TABLE `actor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id', AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `actor_pelicula`
--
ALTER TABLE `actor_pelicula`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id';

--
-- AUTO_INCREMENT de la tabla `alquiler`
--
ALTER TABLE `alquiler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id', AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT de la tabla `director`
--
ALTER TABLE `director`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id', AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `formato`
--
ALTER TABLE `formato`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id', AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `genero`
--
ALTER TABLE `genero`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id', AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `pelicula`
--
ALTER TABLE `pelicula`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id', AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `sexo`
--
ALTER TABLE `sexo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id', AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `socio`
--
ALTER TABLE `socio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id', AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `actor`
--
ALTER TABLE `actor`
  ADD CONSTRAINT `Fn_SEXO_ACTOR` FOREIGN KEY (`sex_id`) REFERENCES `sexo` (`id`);

--
-- Filtros para la tabla `actor_pelicula`
--
ALTER TABLE `actor_pelicula`
  ADD CONSTRAINT `Fn_ACTOR_actor_pelicula` FOREIGN KEY (`act_id`) REFERENCES `actor` (`id`),
  ADD CONSTRAINT `Fn_PELICULA_actor_pelicula` FOREIGN KEY (`pel_id`) REFERENCES `pelicula` (`id`);

--
-- Filtros para la tabla `alquiler`
--
ALTER TABLE `alquiler`
  ADD CONSTRAINT `Fn_PELICULA_ALQUILER` FOREIGN KEY (`pel_id`) REFERENCES `pelicula` (`id`),
  ADD CONSTRAINT `Fn_SOCIO_ALQUILER` FOREIGN KEY (`soc_id`) REFERENCES `socio` (`id`);

--
-- Filtros para la tabla `pelicula`
--
ALTER TABLE `pelicula`
  ADD CONSTRAINT `Fn_DIRECTOR_PELICULA` FOREIGN KEY (`dir_id`) REFERENCES `director` (`id`),
  ADD CONSTRAINT `Fn_FORMATO_PELICULA` FOREIGN KEY (`for_id`) REFERENCES `formato` (`id`),
  ADD CONSTRAINT `Fn_GENERO_PELICULA` FOREIGN KEY (`gen_id`) REFERENCES `genero` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
