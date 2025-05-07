-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 07, 2025 at 01:09 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `investmenttracker`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fixed_deposits`
--

CREATE TABLE `fixed_deposits` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `investment_id` bigint(20) UNSIGNED NOT NULL,
  `bank_name` varchar(255) NOT NULL,
  `fd_number` varchar(255) DEFAULT NULL,
  `interest_rate` decimal(5,2) NOT NULL,
  `start_date` date NOT NULL,
  `maturity_date` date NOT NULL,
  `interest_type` enum('simple','compound') NOT NULL,
  `compounding_frequency` enum('monthly','quarterly','half-yearly','yearly') NOT NULL,
  `is_tax_saver` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fixed_deposits`
--

INSERT INTO `fixed_deposits` (`id`, `investment_id`, `bank_name`, `fd_number`, `interest_rate`, `start_date`, `maturity_date`, `interest_type`, `compounding_frequency`, `is_tax_saver`, `created_at`, `updated_at`) VALUES
(1, 1, 'Runte-McClure', 'FKGVVLHHEC', 5.05, '2023-04-19', '2027-02-07', 'simple', 'half-yearly', 0, '2025-05-07 04:58:48', '2025-05-07 04:58:48'),
(2, 2, 'Kautzer, Steuber and Schiller', 'JRYCDMVTHV', 5.45, '2023-01-21', '2027-05-25', 'compound', 'quarterly', 0, '2025-05-07 04:58:48', '2025-05-07 04:58:48'),
(3, 3, 'Hintz Ltd', 'IXKK1SQXDN', 6.46, '2021-07-23', '2026-06-10', 'compound', 'monthly', 0, '2025-05-07 04:58:48', '2025-05-07 04:58:48'),
(4, 4, 'Bailey, Jerde and Terry', 'GXDLOFKEIT', 5.65, '2021-03-01', '2028-07-06', 'simple', 'quarterly', 1, '2025-05-07 04:58:48', '2025-05-07 04:58:48'),
(6, 6, 'Bauch, Koepp and Klein', 'QOGYULYLRU', 8.64, '2024-07-01', '2027-03-21', 'simple', 'quarterly', 1, '2025-05-07 04:58:48', '2025-05-07 04:58:48'),
(7, 7, 'Dibbert, Macejkovic and Brekke', 'EJARFGYOFE', 8.90, '2024-09-03', '2026-03-06', 'compound', 'quarterly', 0, '2025-05-07 04:58:48', '2025-05-07 04:58:48'),
(8, 8, 'Kohler Ltd', 'NDZQSAWLWH', 6.43, '2024-10-11', '2027-04-19', 'simple', 'yearly', 0, '2025-05-07 04:58:48', '2025-05-07 04:58:48'),
(9, 9, 'Nitzsche-Carter', '7UMFVAD4BY', 6.12, '2022-01-06', '2025-07-24', 'compound', 'quarterly', 0, '2025-05-07 04:58:48', '2025-05-07 04:58:48'),
(10, 10, 'Abernathy, Paucek and Hamill', 'SACUCRNRTH', 4.46, '2020-07-13', '2027-06-18', 'simple', 'quarterly', 1, '2025-05-07 04:58:48', '2025-05-07 04:58:48');

-- --------------------------------------------------------

--
-- Table structure for table `investments`
--

CREATE TABLE `investments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` enum('fd','property','stock') NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `investment_date` date NOT NULL,
  `amount_invested` decimal(15,2) NOT NULL,
  `notes` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `investments`
--

INSERT INTO `investments` (`id`, `type`, `user_id`, `title`, `investment_date`, `amount_invested`, `notes`, `created_at`, `updated_at`) VALUES
(1, 'fd', 2, 'Odio qui omnis.', '2014-03-26', 63704.00, 'Rerum mollitia vitae ab consequatur nostrum. Doloribus fugiat eum asperiores quo eligendi. Voluptatem a est qui repellendus. Ab ab sed illum praesentium qui.', '2025-05-07 04:58:48', '2025-05-07 04:58:48'),
(2, 'fd', 6, 'Dolorem possimus deserunt.', '1993-08-22', 27385.00, NULL, '2025-05-07 04:58:48', '2025-05-07 04:58:48'),
(3, 'fd', 4, 'Omnis quo.', '1983-05-07', 12143.00, 'Fuga iusto aliquid eum ratione ullam vero. Eum voluptatem accusamus voluptates omnis dolores. Sequi optio illum molestiae maiores neque. Ut harum omnis aspernatur velit.', '2025-05-07 04:58:48', '2025-05-07 04:58:48'),
(4, 'fd', 2, 'Incidunt eos aut.', '1973-03-19', 27946.00, NULL, '2025-05-07 04:58:48', '2025-05-07 04:58:48'),
(6, 'fd', 9, 'Et magni consectetur.', '2009-06-09', 90908.00, 'Est laboriosam molestiae repellat alias itaque porro. Et voluptatem labore neque necessitatibus. Aliquam incidunt consequuntur amet quae earum.', '2025-05-07 04:58:48', '2025-05-07 04:58:48'),
(7, 'fd', 2, 'Sit perspiciatis.', '1989-11-01', 46717.00, 'Maiores non accusamus vel accusamus accusantium libero totam. Nulla corrupti voluptatem excepturi ea corporis. Et placeat provident aspernatur soluta laudantium consequuntur itaque.', '2025-05-07 04:58:48', '2025-05-07 04:58:48'),
(8, 'fd', 9, 'Corporis quisquam error incidunt.', '1974-03-18', 80966.00, 'Omnis ducimus rerum est sapiente. Et voluptas earum ad. Voluptate veniam facilis aliquid animi voluptas minus commodi.', '2025-05-07 04:58:48', '2025-05-07 04:58:48'),
(9, 'fd', 2, 'Minus est non omnis.', '2017-09-18', 25929.00, NULL, '2025-05-07 04:58:48', '2025-05-07 04:58:48'),
(10, 'fd', 4, 'Sunt est quos at itaque.', '2006-01-21', 27904.00, NULL, '2025-05-07 04:58:48', '2025-05-07 04:58:48'),
(11, 'property', 9, 'Dolor sed blanditiis.', '2018-01-01', 8318661.00, 'Veritatis dolores nihil fuga aliquid. Laudantium ut soluta ea nihil maiores reprehenderit. Velit sit error debitis qui et ipsam. Nemo quia ad sint commodi labore quam.', '2025-05-07 04:58:48', '2025-05-07 04:58:48'),
(12, 'property', 3, 'Asperiores sed sint.', '1975-08-19', 888031.00, 'Autem et voluptatum quae nobis enim. Assumenda voluptatum aspernatur nisi dolor rem. Sequi officiis ut et praesentium. Suscipit nemo accusantium est a.', '2025-05-07 04:58:48', '2025-05-07 04:58:48'),
(13, 'property', 5, 'Neque repudiandae qui laborum.', '2013-02-10', 2540363.00, 'Temporibus possimus voluptatem totam optio. Molestiae quia assumenda quibusdam ratione est. Natus autem officia voluptatem et et aut veniam ab.', '2025-05-07 04:58:48', '2025-05-07 04:58:48'),
(14, 'property', 11, 'ABBBD', '2021-08-05', 671203.00, NULL, '2025-05-07 04:58:48', '2025-05-07 05:34:54'),
(15, 'property', 10, 'Inventore totam a animi.', '1971-09-12', 7017164.00, 'Et et pariatur libero vel sequi ut quos. Eos architecto vel vitae et vero iste aut voluptates. Qui ipsa eveniet qui voluptatibus expedita.', '2025-05-07 04:58:48', '2025-05-07 04:58:48'),
(16, 'property', 5, 'Provident quia aut.', '2024-08-19', 9713629.00, 'Deleniti et ut saepe atque voluptatum molestiae necessitatibus. Asperiores deleniti amet suscipit dolores. Ratione facilis reiciendis quia nesciunt alias.', '2025-05-07 04:58:48', '2025-05-07 04:58:48'),
(17, 'property', 9, 'Ipsam quaerat porro aut reiciendis.', '2020-07-08', 9315168.00, NULL, '2025-05-07 04:58:48', '2025-05-07 04:58:48'),
(18, 'property', 2, 'Sed omnis dolorem.', '1983-11-17', 4364884.00, 'Dolor ad qui et in aspernatur. Molestiae ipsum laborum fuga at debitis corrupti.', '2025-05-07 04:58:48', '2025-05-07 04:58:48'),
(19, 'property', 7, 'Incidunt debitis quia in.', '2001-02-04', 8635607.00, 'Magni aspernatur nulla nulla. Soluta et dicta in nobis maxime unde inventore. Fugiat repellat non aut dolorem nobis consectetur reiciendis iusto.', '2025-05-07 04:58:48', '2025-05-07 04:58:48'),
(20, 'property', 6, 'In dignissimos in numquam.', '2012-10-16', 1799306.00, NULL, '2025-05-07 04:58:48', '2025-05-07 04:58:48'),
(21, 'stock', 6, 'Ratione sapiente molestiae soluta.', '1980-07-13', 77851.55, NULL, '2025-05-07 04:58:48', '2025-05-07 04:58:48'),
(22, 'stock', 10, 'Ad sint eos.', '1997-08-22', 8208.25, 'Temporibus id vel illo voluptatem illo laudantium. Facilis et quia quis. Voluptatem pariatur hic voluptatem molestiae labore. Qui illum sapiente ratione occaecati eos sed assumenda.', '2025-05-07 04:58:48', '2025-05-07 04:58:48'),
(23, 'stock', 3, 'Consectetur in explicabo.', '2006-10-11', 6978.32, NULL, '2025-05-07 04:58:48', '2025-05-07 04:58:48'),
(24, 'stock', 2, 'Ut dignissimos illo.', '2012-08-16', 7896.80, 'Et iste quia error aut commodi sed voluptatem. Id rem qui et laborum ad tempore. Non minima ut sit itaque optio porro. Non tempore numquam eveniet rerum a eius in.', '2025-05-07 04:58:48', '2025-05-07 04:58:48'),
(25, 'stock', 7, 'At consectetur impedit sapiente.', '1974-07-30', 14666.69, NULL, '2025-05-07 04:58:48', '2025-05-07 04:58:48'),
(26, 'stock', 1, 'Incidunt enim optio quia.', '1972-08-15', 42209.20, NULL, '2025-05-07 04:58:48', '2025-05-07 04:58:48'),
(27, 'stock', 1, 'Consequatur assumenda et est.', '2001-04-18', 37867.60, NULL, '2025-05-07 04:58:48', '2025-05-07 04:58:48'),
(28, 'stock', 4, 'Occaecati pariatur ea sunt.', '1994-04-09', 73269.00, NULL, '2025-05-07 04:58:48', '2025-05-07 04:58:48'),
(29, 'stock', 7, 'Sequi dolor voluptatem laudantium.', '1970-12-12', 35653.52, 'Quia enim dolores atque accusamus quaerat numquam. Quis porro ea quisquam sapiente perferendis sint. Excepturi ratione veritatis nostrum architecto. Qui in enim rerum enim at ab rerum.', '2025-05-07 04:58:48', '2025-05-07 04:58:48'),
(30, 'stock', 2, 'Dolorem nihil accusantium.', '1970-10-10', 26870.40, 'Voluptatem consequuntur neque ut eos ea maxime. Enim tenetur consectetur et iste et et eius. Quos nihil quasi sit. Autem occaecati aspernatur recusandae facere autem sed.', '2025-05-07 04:58:48', '2025-05-07 04:58:48');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_05_06_052044_create_investments_table', 1),
(5, '2025_05_06_052058_create_fixed_deposits_table', 1),
(6, '2025_05_06_052109_create_properties_table', 1),
(7, '2025_05_06_052121_create_stocks_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `properties`
--

CREATE TABLE `properties` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `investment_id` bigint(20) UNSIGNED NOT NULL,
  `property_type` enum('residential','commercial','land','other') NOT NULL,
  `location` varchar(255) NOT NULL,
  `purchase_date` date NOT NULL,
  `purchase_price` decimal(15,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `properties`
--

INSERT INTO `properties` (`id`, `investment_id`, `property_type`, `location`, `purchase_date`, `purchase_price`, `created_at`, `updated_at`) VALUES
(1, 11, 'commercial', '771 Hill Spring Apt. 749\nPort Blanche, ND 97024', '1991-04-11', 8318661.00, '2025-05-07 04:58:48', '2025-05-07 04:58:48'),
(2, 12, 'commercial', '59923 Schmidt Crossing\nMarvinberg, WY 89690', '2011-09-04', 888031.00, '2025-05-07 04:58:48', '2025-05-07 04:58:48'),
(3, 13, 'residential', '787 Kaylah Walk Suite 304\nMafaldabury, NH 70949-3980', '2004-08-27', 2540363.00, '2025-05-07 04:58:48', '2025-05-07 04:58:48'),
(4, 14, 'residential', '82576 Isadore CircleGusikowskifurt, MO 86528-4123', '1977-04-13', 671203.00, '2025-05-07 04:58:48', '2025-05-07 05:34:54'),
(5, 15, 'residential', '9795 Delpha Squares Apt. 397\nLake Estrellaberg, WY 86368-4597', '2021-11-29', 7017164.00, '2025-05-07 04:58:48', '2025-05-07 04:58:48'),
(6, 16, 'residential', '2397 Jeffry Fall\nPort Elinor, MT 71631-5631', '2015-08-25', 9713629.00, '2025-05-07 04:58:48', '2025-05-07 04:58:48'),
(7, 17, 'other', '48777 Rosenbaum Oval\nWest Carminefurt, DE 99488', '1991-12-17', 9315168.00, '2025-05-07 04:58:48', '2025-05-07 04:58:48'),
(8, 18, 'commercial', '6833 Bauch Springs Suite 847\nDeonfurt, VT 66525', '2012-09-14', 4364884.00, '2025-05-07 04:58:48', '2025-05-07 04:58:48'),
(9, 19, 'commercial', '934 Jon Islands\nPort Hank, MO 63465-2538', '2018-01-31', 8635607.00, '2025-05-07 04:58:48', '2025-05-07 04:58:48'),
(10, 20, 'residential', '7150 Towne Avenue Apt. 716\nLake Evangelineberg, GA 89520', '2019-09-14', 1799306.00, '2025-05-07 04:58:48', '2025-05-07 04:58:48');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('5Sd6xewMfVEkvKSOqxxJzbCsPpW5Nf60Mlph8P6V', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiV3d5SDl5a3ZQN1l2aXF5Y1dsTElQVk9HTjRXZGlTcWJleXZJYkpRRCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czoyMToiaHR0cDovLzEyNy4wLjAuMTo4MDAwIjt9czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sb2dpbiI7fX0=', 1746616160);

-- --------------------------------------------------------

--
-- Table structure for table `stocks`
--

CREATE TABLE `stocks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `investment_id` bigint(20) UNSIGNED NOT NULL,
  `ticker_symbol` varchar(255) DEFAULT NULL,
  `exchange` enum('NSE','BSE','NYSE','NASDAQ') NOT NULL,
  `purchase_date` date NOT NULL,
  `quantity` int(11) NOT NULL,
  `purchase_price_per_unit` decimal(15,2) NOT NULL,
  `broker_name` varchar(255) DEFAULT NULL,
  `sector` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stocks`
--

INSERT INTO `stocks` (`id`, `investment_id`, `ticker_symbol`, `exchange`, `purchase_date`, `quantity`, `purchase_price_per_unit`, `broker_name`, `sector`, `created_at`, `updated_at`) VALUES
(1, 21, 'OBLL', 'NASDAQ', '2013-02-28', 95, 819.49, 'Kertzmann Inc', 'dolore', '2025-05-07 04:58:48', '2025-05-07 04:58:48'),
(2, 22, 'SDHX', 'BSE', '1997-11-22', 25, 328.33, 'Lebsack-Wisozk', 'porro', '2025-05-07 04:58:48', '2025-05-07 04:58:48'),
(3, 23, 'JPFO', 'BSE', '2002-05-08', 8, 872.29, 'Gleichner, Koepp and Reilly', 'pariatur', '2025-05-07 04:58:48', '2025-05-07 04:58:48'),
(4, 24, 'RFJX', 'NYSE', '1991-10-01', 20, 394.84, 'Dicki PLC', 'rerum', '2025-05-07 04:58:48', '2025-05-07 04:58:48'),
(5, 25, 'YREX', 'NYSE', '2019-09-19', 53, 276.73, 'Cassin LLC', 'veniam', '2025-05-07 04:58:48', '2025-05-07 04:58:48'),
(6, 26, 'JXGP', 'BSE', '1980-07-26', 55, 767.44, 'Johnson, Lehner and Stark', 'nisi', '2025-05-07 04:58:48', '2025-05-07 04:58:48'),
(7, 27, 'YFJE', 'BSE', '1985-07-27', 82, 461.80, 'O\'Reilly LLC', 'aut', '2025-05-07 04:58:48', '2025-05-07 04:58:48'),
(8, 28, 'BTCE', 'NASDAQ', '2009-06-27', 100, 732.69, 'Lind Group', 'accusantium', '2025-05-07 04:58:48', '2025-05-07 04:58:48'),
(9, 29, 'PNYW', 'NYSE', '2004-05-28', 56, 636.67, 'Braun Ltd', 'minima', '2025-05-07 04:58:48', '2025-05-07 04:58:48'),
(10, 30, 'VHQL', 'NASDAQ', '1973-12-02', 32, 839.70, 'Stracke PLC', 'voluptas', '2025-05-07 04:58:48', '2025-05-07 04:58:48');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Laney Douglas', 'schoen.chloe@example.org', '2025-05-07 04:56:10', '$2y$12$xkGrB/.iykGfEIgNp8nSt.aQRXl1Zr0rPf9VeQwTDEevqDE4CDHRi', 'eqdAguNSnz', '2025-05-07 04:56:11', '2025-05-07 04:56:11'),
(2, 'Madeline Von', 'volkman.braulio@example.com', '2025-05-07 04:56:11', '$2y$12$xkGrB/.iykGfEIgNp8nSt.aQRXl1Zr0rPf9VeQwTDEevqDE4CDHRi', '0Dck1FaIZTwboFFLhy1Fek9GCd0hW8cZL19qCEl6KJhHeIvR3YQY3g4lChri', '2025-05-07 04:56:11', '2025-05-07 04:56:11'),
(3, 'Benton Jerde II', 'zrempel@example.net', '2025-05-07 04:56:11', '$2y$12$xkGrB/.iykGfEIgNp8nSt.aQRXl1Zr0rPf9VeQwTDEevqDE4CDHRi', 'nMCZgDJnbS', '2025-05-07 04:56:11', '2025-05-07 04:56:11'),
(4, 'Melisa Wuckert', 'rubye.langosh@example.com', '2025-05-07 04:56:11', '$2y$12$xkGrB/.iykGfEIgNp8nSt.aQRXl1Zr0rPf9VeQwTDEevqDE4CDHRi', 'T0B5McdDVI', '2025-05-07 04:56:11', '2025-05-07 04:56:11'),
(5, 'Martine Stokes', 'wilkinson.reggie@example.net', '2025-05-07 04:56:11', '$2y$12$xkGrB/.iykGfEIgNp8nSt.aQRXl1Zr0rPf9VeQwTDEevqDE4CDHRi', 'FK4OlXrYMh', '2025-05-07 04:56:11', '2025-05-07 04:56:11'),
(6, 'Dr. Scot Auer IV', 'dietrich.jada@example.com', '2025-05-07 04:56:11', '$2y$12$xkGrB/.iykGfEIgNp8nSt.aQRXl1Zr0rPf9VeQwTDEevqDE4CDHRi', 'itqKkiuUR0', '2025-05-07 04:56:11', '2025-05-07 04:56:11'),
(7, 'Cynthia Trantow', 'alessia83@example.com', '2025-05-07 04:56:11', '$2y$12$xkGrB/.iykGfEIgNp8nSt.aQRXl1Zr0rPf9VeQwTDEevqDE4CDHRi', '072CDfOSqS', '2025-05-07 04:56:11', '2025-05-07 04:56:11'),
(8, 'Forest Crona', 'alec25@example.net', '2025-05-07 04:56:11', '$2y$12$xkGrB/.iykGfEIgNp8nSt.aQRXl1Zr0rPf9VeQwTDEevqDE4CDHRi', 'XAgb2WigV7', '2025-05-07 04:56:11', '2025-05-07 04:56:11'),
(9, 'Randy Hoeger', 'ledner.vesta@example.org', '2025-05-07 04:56:11', '$2y$12$xkGrB/.iykGfEIgNp8nSt.aQRXl1Zr0rPf9VeQwTDEevqDE4CDHRi', 'bTFQIS0zUK', '2025-05-07 04:56:11', '2025-05-07 04:56:11'),
(10, 'Dr. Calista Dicki', 'lauryn42@example.net', '2025-05-07 04:56:11', '$2y$12$xkGrB/.iykGfEIgNp8nSt.aQRXl1Zr0rPf9VeQwTDEevqDE4CDHRi', 'nd9c1uauiz', '2025-05-07 04:56:11', '2025-05-07 04:56:11'),
(11, 'Kirtan', 'pithadiyakirtan08@gmail.com', '2025-05-07 04:56:11', '$2y$12$JRcxvk9VJhWlzaAlJGed6ejVc6DRJ2L7nYmJL99RHf4tyv1QhY.MK', 'ONv8kLpJwuhlHoeup4yARX1GTdijAR4EirsOVfBjl35mY5EHCXas3KCohK0e', '2025-05-07 04:56:11', '2025-05-07 04:56:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `fixed_deposits`
--
ALTER TABLE `fixed_deposits`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fixed_deposits_investment_id_foreign` (`investment_id`);

--
-- Indexes for table `investments`
--
ALTER TABLE `investments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `investments_user_id_foreign` (`user_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `properties`
--
ALTER TABLE `properties`
  ADD PRIMARY KEY (`id`),
  ADD KEY `properties_investment_id_foreign` (`investment_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `stocks`
--
ALTER TABLE `stocks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `stocks_investment_id_foreign` (`investment_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fixed_deposits`
--
ALTER TABLE `fixed_deposits`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `investments`
--
ALTER TABLE `investments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `properties`
--
ALTER TABLE `properties`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `stocks`
--
ALTER TABLE `stocks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `fixed_deposits`
--
ALTER TABLE `fixed_deposits`
  ADD CONSTRAINT `fixed_deposits_investment_id_foreign` FOREIGN KEY (`investment_id`) REFERENCES `investments` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `investments`
--
ALTER TABLE `investments`
  ADD CONSTRAINT `investments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `properties`
--
ALTER TABLE `properties`
  ADD CONSTRAINT `properties_investment_id_foreign` FOREIGN KEY (`investment_id`) REFERENCES `investments` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `stocks`
--
ALTER TABLE `stocks`
  ADD CONSTRAINT `stocks_investment_id_foreign` FOREIGN KEY (`investment_id`) REFERENCES `investments` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
