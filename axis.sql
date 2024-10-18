-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 18, 2024 at 09:10 AM
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
-- Database: `axis`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_menu`
--

CREATE TABLE `admin_menu` (
  `id` int(10) UNSIGNED NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `order` int(11) NOT NULL DEFAULT 0,
  `title` varchar(50) NOT NULL,
  `icon` varchar(50) NOT NULL,
  `uri` varchar(255) DEFAULT NULL,
  `permission` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_menu`
--

INSERT INTO `admin_menu` (`id`, `parent_id`, `order`, `title`, `icon`, `uri`, `permission`, `created_at`, `updated_at`) VALUES
(1, 0, 1, 'Dashboard', 'icon-chart-bar', '/', NULL, NULL, NULL),
(2, 0, 2, 'Admin', 'icon-server', '', NULL, NULL, NULL),
(3, 2, 3, 'Users', 'icon-users', 'auth/users', NULL, NULL, NULL),
(4, 2, 4, 'Roles', 'icon-user', 'auth/roles', NULL, NULL, NULL),
(5, 2, 5, 'Permission', 'icon-ban', 'auth/permissions', NULL, NULL, NULL),
(6, 2, 6, 'Menu', 'icon-bars', 'auth/menu', NULL, NULL, NULL),
(7, 2, 7, 'Operation log', 'icon-history', 'auth/logs', NULL, NULL, NULL),
(8, 0, 7, 'Helpers', 'icon-cogs', '', NULL, '2024-10-14 05:49:15', '2024-10-14 05:49:15'),
(9, 8, 8, 'Scaffold', 'icon-keyboard', 'helpers/scaffold', NULL, '2024-10-14 05:49:15', '2024-10-14 05:49:15'),
(10, 8, 9, 'Database terminal', 'icon-database', 'helpers/terminal/database', NULL, '2024-10-14 05:49:15', '2024-10-14 05:49:15'),
(11, 8, 10, 'Laravel artisan', 'icon-terminal', 'helpers/terminal/artisan', NULL, '2024-10-14 05:49:15', '2024-10-14 05:49:15'),
(12, 8, 11, 'Routes', 'icon-list-alt', 'helpers/routes', NULL, '2024-10-14 05:49:15', '2024-10-14 05:49:15'),
(17, 0, 11, 'Blogs', 'icon-file', 'blogs', NULL, '2024-10-15 23:15:24', '2024-10-15 23:15:24'),
(18, 0, 11, 'News', 'icon-file', 'news', NULL, '2024-10-16 23:23:59', '2024-10-16 23:23:59');

-- --------------------------------------------------------

--
-- Table structure for table `admin_operation_log`
--

CREATE TABLE `admin_operation_log` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `path` varchar(255) NOT NULL,
  `method` varchar(10) NOT NULL,
  `ip` varchar(255) NOT NULL,
  `input` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_operation_log`
--

INSERT INTO `admin_operation_log` (`id`, `user_id`, `path`, `method`, `ip`, `input`, `created_at`, `updated_at`) VALUES
(1, 1, 'admin', 'GET', '::1', '[]', '2024-10-14 05:31:39', '2024-10-14 05:31:39'),
(2, 1, 'admin/auth/users', 'GET', '::1', '[]', '2024-10-14 05:47:17', '2024-10-14 05:47:17'),
(3, 1, 'admin/auth/roles', 'GET', '::1', '[]', '2024-10-14 05:47:20', '2024-10-14 05:47:20'),
(4, 1, 'admin/auth/permissions', 'GET', '::1', '[]', '2024-10-14 05:47:22', '2024-10-14 05:47:22'),
(5, 1, 'admin/auth/menu', 'GET', '::1', '[]', '2024-10-14 05:47:24', '2024-10-14 05:47:24'),
(6, 1, 'admin/auth/menu', 'GET', '::1', '[]', '2024-10-14 05:49:34', '2024-10-14 05:49:34'),
(7, 1, 'admin/helpers/scaffold', 'GET', '::1', '[]', '2024-10-14 05:51:57', '2024-10-14 05:51:57'),
(8, 1, 'admin/helpers/scaffold', 'POST', '::1', '{\"table_name\":\"News\",\"model_name\":\"App\\\\Models\\\\News\",\"controller_name\":\"App\\\\Admin\\\\Controllers\\\\News\",\"create\":[\"migration\",\"model\",\"controller\",\"migrate\",\"menu_item\"],\"fields\":[{\"name\":\"Title\",\"type\":\"string\",\"nullable\":\"on\",\"key\":null,\"default\":null,\"comment\":null},{\"name\":\"Featuredimage\",\"type\":\"string\",\"nullable\":\"on\",\"key\":null,\"default\":null,\"comment\":null},{\"name\":\"Category\",\"type\":\"string\",\"nullable\":\"on\",\"key\":null,\"default\":null,\"comment\":null},{\"name\":\"Tags\",\"type\":\"string\",\"nullable\":\"on\",\"key\":null,\"default\":null,\"comment\":null},{\"name\":\"Description\",\"type\":\"longText\",\"nullable\":\"on\",\"key\":null,\"default\":null,\"comment\":null},{\"name\":\"Date\",\"type\":\"date\",\"nullable\":\"on\",\"key\":null,\"default\":null,\"comment\":null}],\"timestamps\":\"on\",\"primary_key\":\"id\",\"_token\":\"bAPeQkGNBuifgYKHaV8JdYpygc2XdR4vjQlB5wui\"}', '2024-10-14 05:53:41', '2024-10-14 05:53:41'),
(9, 1, 'admin/helpers/scaffold', 'GET', '::1', '[]', '2024-10-14 05:53:41', '2024-10-14 05:53:41'),
(10, 1, 'admin/helpers/scaffold', 'GET', '::1', '[]', '2024-10-14 05:56:36', '2024-10-14 05:56:36'),
(11, 1, 'admin', 'GET', '::1', '[]', '2024-10-14 05:56:46', '2024-10-14 05:56:46'),
(12, 1, 'admin', 'GET', '::1', '[]', '2024-10-14 05:56:51', '2024-10-14 05:56:51'),
(13, 1, 'admin', 'GET', '::1', '[]', '2024-10-14 05:56:57', '2024-10-14 05:56:57'),
(14, 1, 'admin/helpers/scaffold', 'GET', '::1', '[]', '2024-10-14 05:57:02', '2024-10-14 05:57:02'),
(15, 1, 'admin/helpers/scaffold', 'GET', '::1', '[]', '2024-10-14 05:57:17', '2024-10-14 05:57:17'),
(16, 1, 'admin/news', 'GET', '::1', '[]', '2024-10-14 05:57:19', '2024-10-14 05:57:19'),
(17, 1, 'admin/news', 'GET', '::1', '[]', '2024-10-14 05:57:19', '2024-10-14 05:57:19'),
(18, 1, 'admin/news', 'GET', '::1', '[]', '2024-10-14 05:57:20', '2024-10-14 05:57:20'),
(19, 1, 'admin/news', 'GET', '::1', '[]', '2024-10-14 05:57:20', '2024-10-14 05:57:20'),
(20, 1, 'admin/news', 'GET', '::1', '[]', '2024-10-14 05:57:21', '2024-10-14 05:57:21'),
(21, 1, 'admin/news', 'GET', '::1', '[]', '2024-10-14 05:57:21', '2024-10-14 05:57:21'),
(22, 1, 'admin/news', 'GET', '::1', '[]', '2024-10-14 05:57:21', '2024-10-14 05:57:21'),
(23, 1, 'admin/news', 'GET', '::1', '[]', '2024-10-14 05:57:22', '2024-10-14 05:57:22'),
(24, 1, 'admin/news', 'GET', '::1', '[]', '2024-10-14 05:57:22', '2024-10-14 05:57:22'),
(25, 1, 'admin/news', 'GET', '::1', '[]', '2024-10-14 05:57:22', '2024-10-14 05:57:22'),
(26, 1, 'admin/news', 'GET', '::1', '[]', '2024-10-14 05:57:23', '2024-10-14 05:57:23'),
(27, 1, 'admin/news', 'GET', '::1', '[]', '2024-10-14 05:57:23', '2024-10-14 05:57:23'),
(28, 1, 'admin/news', 'GET', '::1', '[]', '2024-10-14 05:57:24', '2024-10-14 05:57:24'),
(29, 1, 'admin/news', 'GET', '::1', '[]', '2024-10-14 05:57:24', '2024-10-14 05:57:24'),
(30, 1, 'admin/news', 'GET', '::1', '[]', '2024-10-14 05:57:24', '2024-10-14 05:57:24'),
(31, 1, 'admin/news', 'GET', '::1', '[]', '2024-10-14 05:57:25', '2024-10-14 05:57:25'),
(32, 1, 'admin/news', 'GET', '::1', '[]', '2024-10-14 05:57:25', '2024-10-14 05:57:25'),
(33, 1, 'admin/news', 'GET', '::1', '[]', '2024-10-14 05:57:26', '2024-10-14 05:57:26'),
(34, 1, 'admin/news', 'GET', '::1', '[]', '2024-10-14 05:57:26', '2024-10-14 05:57:26'),
(35, 1, 'admin/news', 'GET', '::1', '[]', '2024-10-14 05:57:26', '2024-10-14 05:57:26'),
(36, 1, 'admin/news', 'GET', '::1', '[]', '2024-10-14 05:57:27', '2024-10-14 05:57:27'),
(37, 1, 'admin/news', 'GET', '::1', '[]', '2024-10-14 05:57:32', '2024-10-14 05:57:32'),
(38, 1, 'admin/news', 'GET', '::1', '[]', '2024-10-14 05:57:32', '2024-10-14 05:57:32'),
(39, 1, 'admin/news', 'GET', '::1', '[]', '2024-10-14 05:57:33', '2024-10-14 05:57:33'),
(40, 1, 'admin/news', 'GET', '::1', '[]', '2024-10-14 05:57:33', '2024-10-14 05:57:33'),
(41, 1, 'admin/news', 'GET', '::1', '[]', '2024-10-14 05:57:34', '2024-10-14 05:57:34'),
(42, 1, 'admin/news', 'GET', '::1', '[]', '2024-10-14 05:57:34', '2024-10-14 05:57:34'),
(43, 1, 'admin/news', 'GET', '::1', '[]', '2024-10-14 05:57:34', '2024-10-14 05:57:34'),
(44, 1, 'admin/news', 'GET', '::1', '[]', '2024-10-14 05:57:35', '2024-10-14 05:57:35'),
(45, 1, 'admin/news', 'GET', '::1', '[]', '2024-10-14 05:57:35', '2024-10-14 05:57:35'),
(46, 1, 'admin/news', 'GET', '::1', '[]', '2024-10-14 05:57:36', '2024-10-14 05:57:36'),
(47, 1, 'admin/news', 'GET', '::1', '[]', '2024-10-14 05:57:36', '2024-10-14 05:57:36'),
(48, 1, 'admin/news', 'GET', '::1', '[]', '2024-10-14 05:57:36', '2024-10-14 05:57:36'),
(49, 1, 'admin/news', 'GET', '::1', '[]', '2024-10-14 05:57:37', '2024-10-14 05:57:37'),
(50, 1, 'admin/news', 'GET', '::1', '[]', '2024-10-14 05:57:37', '2024-10-14 05:57:37'),
(51, 1, 'admin/news', 'GET', '::1', '[]', '2024-10-14 05:57:37', '2024-10-14 05:57:37'),
(52, 1, 'admin/news', 'GET', '::1', '[]', '2024-10-14 05:57:38', '2024-10-14 05:57:38'),
(53, 1, 'admin/news', 'GET', '::1', '[]', '2024-10-14 05:57:38', '2024-10-14 05:57:38'),
(54, 1, 'admin/news', 'GET', '::1', '[]', '2024-10-14 05:57:39', '2024-10-14 05:57:39'),
(55, 1, 'admin/news', 'GET', '::1', '[]', '2024-10-14 05:57:39', '2024-10-14 05:57:39'),
(56, 1, 'admin/news', 'GET', '::1', '[]', '2024-10-14 05:57:39', '2024-10-14 05:57:39'),
(57, 1, 'admin/news', 'GET', '::1', '[]', '2024-10-14 05:57:40', '2024-10-14 05:57:40'),
(58, 1, 'admin/helpers/terminal/database', 'GET', '::1', '[]', '2024-10-14 05:57:46', '2024-10-14 05:57:46'),
(59, 1, 'admin/news', 'GET', '::1', '[]', '2024-10-14 05:57:48', '2024-10-14 05:57:48'),
(60, 1, 'admin/news', 'GET', '::1', '[]', '2024-10-14 05:57:48', '2024-10-14 05:57:48'),
(61, 1, 'admin/news', 'GET', '::1', '[]', '2024-10-14 05:57:48', '2024-10-14 05:57:48'),
(62, 1, 'admin/news', 'GET', '::1', '[]', '2024-10-14 05:57:49', '2024-10-14 05:57:49'),
(63, 1, 'admin/news', 'GET', '::1', '[]', '2024-10-14 05:57:49', '2024-10-14 05:57:49'),
(64, 1, 'admin/news', 'GET', '::1', '[]', '2024-10-14 05:57:49', '2024-10-14 05:57:49'),
(65, 1, 'admin/news', 'GET', '::1', '[]', '2024-10-14 05:57:50', '2024-10-14 05:57:50'),
(66, 1, 'admin/news', 'GET', '::1', '[]', '2024-10-14 05:57:50', '2024-10-14 05:57:50'),
(67, 1, 'admin/news', 'GET', '::1', '[]', '2024-10-14 05:57:51', '2024-10-14 05:57:51'),
(68, 1, 'admin/news', 'GET', '::1', '[]', '2024-10-14 05:57:51', '2024-10-14 05:57:51'),
(69, 1, 'admin/news', 'GET', '::1', '[]', '2024-10-14 05:57:51', '2024-10-14 05:57:51'),
(70, 1, 'admin/news', 'GET', '::1', '[]', '2024-10-14 05:57:52', '2024-10-14 05:57:52'),
(71, 1, 'admin/news', 'GET', '::1', '[]', '2024-10-14 05:57:52', '2024-10-14 05:57:52'),
(72, 1, 'admin/news', 'GET', '::1', '[]', '2024-10-14 05:57:52', '2024-10-14 05:57:52'),
(73, 1, 'admin/news', 'GET', '::1', '[]', '2024-10-14 05:57:53', '2024-10-14 05:57:53'),
(74, 1, 'admin/news', 'GET', '::1', '[]', '2024-10-14 05:57:53', '2024-10-14 05:57:53'),
(75, 1, 'admin/news', 'GET', '::1', '[]', '2024-10-14 05:57:54', '2024-10-14 05:57:54'),
(76, 1, 'admin/news', 'GET', '::1', '[]', '2024-10-14 05:57:54', '2024-10-14 05:57:54'),
(77, 1, 'admin/news', 'GET', '::1', '[]', '2024-10-14 05:57:54', '2024-10-14 05:57:54'),
(78, 1, 'admin/news', 'GET', '::1', '[]', '2024-10-14 05:57:55', '2024-10-14 05:57:55'),
(79, 1, 'admin/news', 'GET', '::1', '[]', '2024-10-14 05:57:55', '2024-10-14 05:57:55'),
(80, 1, 'admin/news', 'GET', '::1', '[]', '2024-10-14 06:00:22', '2024-10-14 06:00:22'),
(81, 1, 'admin/news', 'GET', '::1', '[]', '2024-10-14 06:00:36', '2024-10-14 06:00:36'),
(82, 1, 'admin', 'GET', '::1', '[]', '2024-10-14 06:00:40', '2024-10-14 06:00:40'),
(83, 1, 'admin/news', 'GET', '::1', '[]', '2024-10-14 06:00:42', '2024-10-14 06:00:42'),
(84, 1, 'admin/news', 'GET', '::1', '[]', '2024-10-14 06:04:05', '2024-10-14 06:04:05'),
(85, 1, 'admin/news', 'GET', '::1', '[]', '2024-10-14 06:04:07', '2024-10-14 06:04:07'),
(86, 1, 'admin/news/create', 'GET', '::1', '[]', '2024-10-14 06:04:32', '2024-10-14 06:04:32'),
(87, 1, 'admin/news', 'GET', '::1', '[]', '2024-10-14 06:05:54', '2024-10-14 06:05:54'),
(88, 1, 'admin/news/create', 'GET', '::1', '[]', '2024-10-14 06:05:56', '2024-10-14 06:05:56'),
(89, 1, 'admin/news/create', 'GET', '::1', '[]', '2024-10-14 06:06:42', '2024-10-14 06:06:42'),
(90, 1, 'admin/news', 'GET', '::1', '[]', '2024-10-14 06:06:45', '2024-10-14 06:06:45'),
(91, 1, 'admin/news', 'GET', '::1', '[]', '2024-10-14 06:07:40', '2024-10-14 06:07:40'),
(92, 1, 'admin/news/create', 'GET', '::1', '[]', '2024-10-14 06:07:41', '2024-10-14 06:07:41'),
(93, 1, 'admin/news', 'GET', '::1', '[]', '2024-10-14 06:07:46', '2024-10-14 06:07:46'),
(94, 1, 'admin/news', 'GET', '::1', '[]', '2024-10-14 06:12:41', '2024-10-14 06:12:41'),
(95, 1, 'admin/news/create', 'GET', '::1', '[]', '2024-10-14 06:12:43', '2024-10-14 06:12:43'),
(96, 1, 'admin/news', 'GET', '::1', '[]', '2024-10-14 06:12:48', '2024-10-14 06:12:48'),
(97, 1, 'admin/news', 'GET', '::1', '[]', '2024-10-14 06:15:08', '2024-10-14 06:15:08'),
(98, 1, 'admin/news/create', 'GET', '::1', '[]', '2024-10-14 06:15:13', '2024-10-14 06:15:13'),
(99, 1, 'admin/news', 'GET', '::1', '[]', '2024-10-14 06:15:18', '2024-10-14 06:15:18'),
(100, 1, 'admin/news', 'GET', '::1', '[]', '2024-10-14 06:15:20', '2024-10-14 06:15:20'),
(101, 1, 'admin/news/2', 'DELETE', '::1', '{\"_method\":\"delete\",\"_token\":\"bAPeQkGNBuifgYKHaV8JdYpygc2XdR4vjQlB5wui\"}', '2024-10-14 06:15:23', '2024-10-14 06:15:23'),
(102, 1, 'admin/news', 'GET', '::1', '[]', '2024-10-14 06:15:23', '2024-10-14 06:15:23'),
(103, 1, 'admin/news', 'GET', '::1', '[]', '2024-10-14 06:15:53', '2024-10-14 06:15:53'),
(104, 1, 'admin/news/create', 'GET', '::1', '[]', '2024-10-14 06:15:55', '2024-10-14 06:15:55'),
(105, 1, 'admin/news/create', 'GET', '::1', '[]', '2024-10-14 06:15:58', '2024-10-14 06:15:58'),
(106, 1, 'admin/news/create', 'GET', '::1', '[]', '2024-10-14 06:16:04', '2024-10-14 06:16:04'),
(107, 1, 'admin/news', 'GET', '::1', '[]', '2024-10-14 06:16:06', '2024-10-14 06:16:06'),
(108, 1, 'admin/news/create', 'GET', '::1', '[]', '2024-10-14 06:16:07', '2024-10-14 06:16:07'),
(109, 1, 'admin/news', 'GET', '::1', '[]', '2024-10-14 06:16:46', '2024-10-14 06:16:46'),
(110, 1, 'admin/news', 'GET', '::1', '[]', '2024-10-14 06:16:46', '2024-10-14 06:16:46'),
(111, 1, 'admin/news', 'GET', '::1', '[]', '2024-10-14 06:16:47', '2024-10-14 06:16:47'),
(112, 1, 'admin/news/create', 'GET', '::1', '[]', '2024-10-14 06:16:48', '2024-10-14 06:16:48'),
(113, 1, 'admin/news', 'GET', '::1', '[]', '2024-10-14 06:16:57', '2024-10-14 06:16:57'),
(114, 1, 'admin/news', 'GET', '::1', '[]', '2024-10-14 06:18:22', '2024-10-14 06:18:22'),
(115, 1, 'admin/news/create', 'GET', '::1', '[]', '2024-10-14 06:18:23', '2024-10-14 06:18:23'),
(116, 1, 'admin/news/create', 'GET', '::1', '[]', '2024-10-14 06:18:29', '2024-10-14 06:18:29'),
(117, 1, 'admin/news/create', 'GET', '::1', '[]', '2024-10-14 06:18:29', '2024-10-14 06:18:29'),
(118, 1, 'admin/news/create', 'GET', '::1', '[]', '2024-10-14 06:18:30', '2024-10-14 06:18:30'),
(119, 1, 'admin/news', 'GET', '::1', '[]', '2024-10-14 06:18:31', '2024-10-14 06:18:31'),
(120, 1, 'admin/news/create', 'GET', '::1', '[]', '2024-10-14 06:18:38', '2024-10-14 06:18:38'),
(121, 1, 'admin/news', 'GET', '::1', '[]', '2024-10-14 06:18:41', '2024-10-14 06:18:41'),
(122, 1, 'admin/news', 'GET', '::1', '[]', '2024-10-14 06:19:34', '2024-10-14 06:19:34'),
(123, 1, 'admin/news/create', 'GET', '::1', '[]', '2024-10-14 06:19:38', '2024-10-14 06:19:38'),
(124, 1, 'admin/news', 'GET', '::1', '[]', '2024-10-14 06:19:42', '2024-10-14 06:19:42'),
(125, 1, 'admin/news', 'GET', '::1', '[]', '2024-10-14 06:19:56', '2024-10-14 06:19:56'),
(126, 1, 'admin/news', 'GET', '::1', '[]', '2024-10-14 06:23:31', '2024-10-14 06:23:31'),
(127, 1, 'admin/news/create', 'GET', '::1', '[]', '2024-10-14 06:23:32', '2024-10-14 06:23:32'),
(128, 1, 'admin/news', 'GET', '::1', '[]', '2024-10-14 06:23:35', '2024-10-14 06:23:35'),
(129, 1, 'admin/news', 'GET', '::1', '[]', '2024-10-14 06:25:33', '2024-10-14 06:25:33'),
(130, 1, 'admin/news', 'GET', '::1', '[]', '2024-10-14 06:25:44', '2024-10-14 06:25:44'),
(131, 1, 'admin/news/create', 'GET', '::1', '[]', '2024-10-14 06:26:59', '2024-10-14 06:26:59'),
(132, 1, 'admin/news', 'GET', '::1', '[]', '2024-10-14 06:27:02', '2024-10-14 06:27:02'),
(133, 1, 'admin/news/create', 'GET', '::1', '[]', '2024-10-14 06:29:33', '2024-10-14 06:29:33'),
(134, 1, 'admin/helpers/scaffold', 'GET', '::1', '[]', '2024-10-14 06:34:25', '2024-10-14 06:34:25'),
(135, 1, 'admin/news', 'GET', '::1', '[]', '2024-10-14 06:34:53', '2024-10-14 06:34:53'),
(136, 1, 'admin/helpers/scaffold', 'POST', '::1', '{\"table_name\":\"blogs\",\"model_name\":\"App\\\\Models\\\\blogs\",\"controller_name\":\"App\\\\Admin\\\\Controllers\\\\BlogController\",\"create\":[\"migration\",\"model\",\"controller\",\"migrate\",\"menu_item\"],\"fields\":[{\"name\":\"Title\",\"type\":\"string\",\"nullable\":\"on\",\"key\":null,\"default\":null,\"comment\":null},{\"name\":\"Featured Image\",\"type\":\"string\",\"nullable\":\"on\",\"key\":null,\"default\":null,\"comment\":null},{\"name\":\"Category\",\"type\":\"string\",\"nullable\":\"on\",\"key\":null,\"default\":null,\"comment\":null},{\"name\":\"Tags\",\"type\":\"string\",\"nullable\":\"on\",\"key\":null,\"default\":null,\"comment\":null},{\"name\":\"Description\",\"type\":\"string\",\"nullable\":\"on\",\"key\":null,\"default\":null,\"comment\":null},{\"name\":\"Date\",\"type\":\"string\",\"nullable\":\"on\",\"key\":null,\"default\":null,\"comment\":null}],\"timestamps\":\"on\",\"primary_key\":\"id\",\"_token\":\"bAPeQkGNBuifgYKHaV8JdYpygc2XdR4vjQlB5wui\"}', '2024-10-14 06:36:45', '2024-10-14 06:36:45'),
(137, 1, 'admin/helpers/scaffold', 'GET', '::1', '[]', '2024-10-14 06:36:46', '2024-10-14 06:36:46'),
(138, 1, 'admin/news', 'GET', '::1', '[]', '2024-10-14 06:37:50', '2024-10-14 06:37:50'),
(139, 1, 'admin/blogs', 'GET', '::1', '[]', '2024-10-14 06:37:52', '2024-10-14 06:37:52'),
(140, 1, 'admin/blogs', 'GET', '::1', '[]', '2024-10-14 06:37:52', '2024-10-14 06:37:52'),
(141, 1, 'admin/blogs', 'GET', '::1', '[]', '2024-10-14 06:37:52', '2024-10-14 06:37:52'),
(142, 1, 'admin/blogs', 'GET', '::1', '[]', '2024-10-14 06:37:53', '2024-10-14 06:37:53'),
(143, 1, 'admin/blogs', 'GET', '::1', '[]', '2024-10-14 06:37:53', '2024-10-14 06:37:53'),
(144, 1, 'admin/blogs', 'GET', '::1', '[]', '2024-10-14 06:37:54', '2024-10-14 06:37:54'),
(145, 1, 'admin/blogs', 'GET', '::1', '[]', '2024-10-14 06:37:54', '2024-10-14 06:37:54'),
(146, 1, 'admin/blogs', 'GET', '::1', '[]', '2024-10-14 06:37:54', '2024-10-14 06:37:54'),
(147, 1, 'admin/blogs', 'GET', '::1', '[]', '2024-10-14 06:37:55', '2024-10-14 06:37:55'),
(148, 1, 'admin/blogs', 'GET', '::1', '[]', '2024-10-14 06:37:55', '2024-10-14 06:37:55'),
(149, 1, 'admin/blogs', 'GET', '::1', '[]', '2024-10-14 06:37:55', '2024-10-14 06:37:55'),
(150, 1, 'admin/blogs', 'GET', '::1', '[]', '2024-10-14 06:37:56', '2024-10-14 06:37:56'),
(151, 1, 'admin/blogs', 'GET', '::1', '[]', '2024-10-14 06:37:56', '2024-10-14 06:37:56'),
(152, 1, 'admin/blogs', 'GET', '::1', '[]', '2024-10-14 06:37:57', '2024-10-14 06:37:57'),
(153, 1, 'admin/blogs', 'GET', '::1', '[]', '2024-10-14 06:37:57', '2024-10-14 06:37:57'),
(154, 1, 'admin/blogs', 'GET', '::1', '[]', '2024-10-14 06:37:57', '2024-10-14 06:37:57'),
(155, 1, 'admin/blogs', 'GET', '::1', '[]', '2024-10-14 06:37:58', '2024-10-14 06:37:58'),
(156, 1, 'admin/blogs', 'GET', '::1', '[]', '2024-10-14 06:37:58', '2024-10-14 06:37:58'),
(157, 1, 'admin/blogs', 'GET', '::1', '[]', '2024-10-14 06:37:59', '2024-10-14 06:37:59'),
(158, 1, 'admin/blogs', 'GET', '::1', '[]', '2024-10-14 06:37:59', '2024-10-14 06:37:59'),
(159, 1, 'admin/blogs', 'GET', '::1', '[]', '2024-10-14 06:37:59', '2024-10-14 06:37:59'),
(160, 1, 'admin/news', 'GET', '::1', '[]', '2024-10-14 06:38:37', '2024-10-14 06:38:37'),
(161, 1, 'admin/news', 'GET', '::1', '[]', '2024-10-14 06:38:39', '2024-10-14 06:38:39'),
(162, 1, 'admin/blogs', 'GET', '::1', '[]', '2024-10-14 06:38:41', '2024-10-14 06:38:41'),
(163, 1, 'admin/blogs', 'GET', '::1', '[]', '2024-10-14 06:38:41', '2024-10-14 06:38:41'),
(164, 1, 'admin/blogs', 'GET', '::1', '[]', '2024-10-14 06:38:41', '2024-10-14 06:38:41'),
(165, 1, 'admin/blogs', 'GET', '::1', '[]', '2024-10-14 06:38:42', '2024-10-14 06:38:42'),
(166, 1, 'admin/blogs', 'GET', '::1', '[]', '2024-10-14 06:38:42', '2024-10-14 06:38:42'),
(167, 1, 'admin/blogs', 'GET', '::1', '[]', '2024-10-14 06:38:43', '2024-10-14 06:38:43'),
(168, 1, 'admin/blogs', 'GET', '::1', '[]', '2024-10-14 06:38:43', '2024-10-14 06:38:43'),
(169, 1, 'admin/blogs', 'GET', '::1', '[]', '2024-10-14 06:38:43', '2024-10-14 06:38:43'),
(170, 1, 'admin/blogs', 'GET', '::1', '[]', '2024-10-14 06:38:44', '2024-10-14 06:38:44'),
(171, 1, 'admin/blogs', 'GET', '::1', '[]', '2024-10-14 06:38:44', '2024-10-14 06:38:44'),
(172, 1, 'admin/blogs', 'GET', '::1', '[]', '2024-10-14 06:38:44', '2024-10-14 06:38:44'),
(173, 1, 'admin/blogs', 'GET', '::1', '[]', '2024-10-14 06:38:45', '2024-10-14 06:38:45'),
(174, 1, 'admin/blogs', 'GET', '::1', '[]', '2024-10-14 06:38:45', '2024-10-14 06:38:45'),
(175, 1, 'admin/blogs', 'GET', '::1', '[]', '2024-10-14 06:38:46', '2024-10-14 06:38:46'),
(176, 1, 'admin/blogs', 'GET', '::1', '[]', '2024-10-14 06:38:46', '2024-10-14 06:38:46'),
(177, 1, 'admin/blogs', 'GET', '::1', '[]', '2024-10-14 06:38:46', '2024-10-14 06:38:46'),
(178, 1, 'admin/blogs', 'GET', '::1', '[]', '2024-10-14 06:38:47', '2024-10-14 06:38:47'),
(179, 1, 'admin/blogs', 'GET', '::1', '[]', '2024-10-14 06:38:47', '2024-10-14 06:38:47'),
(180, 1, 'admin/blogs', 'GET', '::1', '[]', '2024-10-14 06:38:47', '2024-10-14 06:38:47'),
(181, 1, 'admin/blogs', 'GET', '::1', '[]', '2024-10-14 06:38:48', '2024-10-14 06:38:48'),
(182, 1, 'admin/blogs', 'GET', '::1', '[]', '2024-10-14 06:38:48', '2024-10-14 06:38:48'),
(183, 1, 'admin/blogs', 'GET', '::1', '[]', '2024-10-14 06:39:27', '2024-10-14 06:39:27'),
(184, 1, 'admin/blogs', 'GET', '::1', '[]', '2024-10-14 06:39:45', '2024-10-14 06:39:45'),
(185, 1, 'admin/blogs/create', 'GET', '::1', '[]', '2024-10-14 06:39:48', '2024-10-14 06:39:48'),
(186, 1, 'admin/blogs', 'GET', '::1', '[]', '2024-10-14 06:39:53', '2024-10-14 06:39:53'),
(187, 1, 'admin/blogs', 'GET', '::1', '[]', '2024-10-14 06:40:41', '2024-10-14 06:40:41'),
(188, 1, 'admin/blogs/create', 'GET', '::1', '[]', '2024-10-14 06:40:43', '2024-10-14 06:40:43'),
(189, 1, 'admin/blogs', 'GET', '::1', '[]', '2024-10-14 06:40:45', '2024-10-14 06:40:45'),
(190, 1, 'admin/helpers/scaffold', 'GET', '::1', '[]', '2024-10-14 06:43:07', '2024-10-14 06:43:07'),
(191, 1, 'admin/helpers/scaffold', 'POST', '::1', '{\"table_name\":\"test\",\"model_name\":\"App\\\\Models\\\\test\",\"controller_name\":\"App\\\\Admin\\\\Controllers\\\\TestController\",\"create\":[\"migration\",\"model\",\"controller\",\"migrate\",\"menu_item\"],\"fields\":[{\"name\":\"image\",\"type\":\"string\",\"nullable\":\"on\",\"key\":null,\"default\":null,\"comment\":null},{\"name\":\"title\",\"type\":\"string\",\"nullable\":\"on\",\"key\":null,\"default\":null,\"comment\":null}],\"timestamps\":\"on\",\"primary_key\":\"id\",\"_token\":\"bAPeQkGNBuifgYKHaV8JdYpygc2XdR4vjQlB5wui\"}', '2024-10-14 06:44:02', '2024-10-14 06:44:02'),
(192, 1, 'admin/helpers/scaffold', 'GET', '::1', '[]', '2024-10-14 06:44:03', '2024-10-14 06:44:03'),
(193, 1, 'admin/helpers/scaffold', 'GET', '::1', '[]', '2024-10-14 06:44:31', '2024-10-14 06:44:31'),
(194, 1, 'admin/helpers/scaffold', 'GET', '::1', '[]', '2024-10-14 06:44:38', '2024-10-14 06:44:38'),
(195, 1, 'admin/helpers/scaffold', 'GET', '::1', '[]', '2024-10-14 06:45:17', '2024-10-14 06:45:17'),
(196, 1, 'admin/helpers/scaffold', 'GET', '::1', '[]', '2024-10-14 06:45:20', '2024-10-14 06:45:20'),
(197, 1, 'admin/helpers/scaffold', 'GET', '::1', '[]', '2024-10-14 06:45:25', '2024-10-14 06:45:25'),
(198, 1, 'admin/helpers/scaffold', 'GET', '::1', '[]', '2024-10-14 06:45:28', '2024-10-14 06:45:28'),
(199, 1, 'admin/helpers/scaffold', 'GET', '::1', '[]', '2024-10-14 06:46:03', '2024-10-14 06:46:03'),
(200, 1, 'admin/tests', 'GET', '::1', '[]', '2024-10-14 06:46:05', '2024-10-14 06:46:05'),
(201, 1, 'admin/tests', 'GET', '::1', '[]', '2024-10-14 06:46:22', '2024-10-14 06:46:22'),
(202, 1, 'admin/tests/create', 'GET', '::1', '[]', '2024-10-14 06:46:23', '2024-10-14 06:46:23'),
(203, 1, 'admin/helpers/scaffold', 'GET', '::1', '[]', '2024-10-14 06:46:57', '2024-10-14 06:46:57'),
(204, 1, 'admin/helpers/scaffold', 'POST', '::1', '{\"table_name\":\"blogs\",\"model_name\":\"App\\\\Models\\\\blogs\",\"controller_name\":\"App\\\\Admin\\\\Controllers\\\\BlogController\",\"create\":[\"migration\",\"model\",\"controller\",\"migrate\",\"menu_item\"],\"fields\":[{\"name\":\"Title\",\"type\":\"string\",\"nullable\":\"on\",\"key\":null,\"default\":null,\"comment\":null},{\"name\":\"image\",\"type\":\"string\",\"nullable\":\"on\",\"key\":null,\"default\":null,\"comment\":null},{\"name\":\"Description\",\"type\":\"string\",\"nullable\":\"on\",\"key\":null,\"default\":null,\"comment\":null},{\"name\":\"Category\",\"type\":\"string\",\"nullable\":\"on\",\"key\":null,\"default\":null,\"comment\":null},{\"name\":\"Tags\",\"type\":\"string\",\"nullable\":\"on\",\"key\":null,\"default\":null,\"comment\":null},{\"name\":\"Date\",\"type\":\"date\",\"nullable\":\"on\",\"key\":null,\"default\":null,\"comment\":null}],\"timestamps\":\"on\",\"primary_key\":\"id\",\"_token\":\"bAPeQkGNBuifgYKHaV8JdYpygc2XdR4vjQlB5wui\"}', '2024-10-14 06:50:15', '2024-10-14 06:50:15'),
(205, 1, 'admin/helpers/scaffold', 'GET', '::1', '[]', '2024-10-14 06:50:16', '2024-10-14 06:50:16'),
(206, 1, 'admin/helpers/scaffold', 'GET', '::1', '[]', '2024-10-14 06:50:19', '2024-10-14 06:50:19'),
(207, 1, 'admin/helpers/scaffold', 'GET', '::1', '[]', '2024-10-14 06:50:21', '2024-10-14 06:50:21'),
(208, 1, 'admin/helpers/scaffold', 'GET', '::1', '[]', '2024-10-14 06:50:30', '2024-10-14 06:50:30'),
(209, 1, 'admin/auth/login', 'GET', '::1', '[]', '2024-10-14 06:50:33', '2024-10-14 06:50:33'),
(210, 1, 'admin', 'GET', '::1', '[]', '2024-10-14 06:50:51', '2024-10-14 06:50:51'),
(211, 1, 'admin', 'GET', '::1', '[]', '2024-10-14 06:51:04', '2024-10-14 06:51:04'),
(212, 1, 'admin/blogs', 'GET', '::1', '[]', '2024-10-14 06:51:06', '2024-10-14 06:51:06'),
(213, 1, 'admin/blogs', 'GET', '::1', '[]', '2024-10-14 06:52:46', '2024-10-14 06:52:46'),
(214, 1, 'admin/blogs', 'GET', '::1', '[]', '2024-10-14 06:52:51', '2024-10-14 06:52:51'),
(215, 1, 'admin/blogs', 'GET', '::1', '[]', '2024-10-14 06:54:15', '2024-10-14 06:54:15'),
(216, 1, 'admin/blogs', 'GET', '::1', '[]', '2024-10-14 06:54:17', '2024-10-14 06:54:17'),
(217, 1, 'admin/blogs', 'GET', '::1', '[]', '2024-10-14 06:54:18', '2024-10-14 06:54:18'),
(218, 1, 'admin/blogs', 'GET', '::1', '[]', '2024-10-14 06:54:18', '2024-10-14 06:54:18'),
(219, 1, 'admin/blogs', 'GET', '::1', '[]', '2024-10-14 06:54:18', '2024-10-14 06:54:18'),
(220, 1, 'admin/blogs', 'GET', '::1', '[]', '2024-10-14 06:54:18', '2024-10-14 06:54:18'),
(221, 1, 'admin/blogs', 'GET', '::1', '[]', '2024-10-14 06:54:19', '2024-10-14 06:54:19'),
(222, 1, 'admin/blogs', 'GET', '::1', '[]', '2024-10-14 06:54:21', '2024-10-14 06:54:21'),
(223, 1, 'admin/blogs', 'GET', '::1', '[]', '2024-10-14 06:54:28', '2024-10-14 06:54:28'),
(224, 1, 'admin', 'GET', '::1', '[]', '2024-10-14 06:54:34', '2024-10-14 06:54:34'),
(225, 1, 'admin/helpers/terminal/database', 'GET', '::1', '[]', '2024-10-14 06:54:48', '2024-10-14 06:54:48'),
(226, 1, 'admin/helpers/terminal/artisan', 'GET', '::1', '[]', '2024-10-14 06:54:51', '2024-10-14 06:54:51'),
(227, 1, 'admin/helpers/routes', 'GET', '::1', '[]', '2024-10-14 06:54:57', '2024-10-14 06:54:57'),
(228, 1, 'admin/blogs', 'GET', '::1', '[]', '2024-10-14 06:58:27', '2024-10-14 06:58:27'),
(229, 1, 'admin/blogs', 'GET', '::1', '[]', '2024-10-14 06:59:02', '2024-10-14 06:59:02'),
(230, 1, 'admin/blogs/create', 'GET', '::1', '[]', '2024-10-14 06:59:04', '2024-10-14 06:59:04'),
(231, 1, 'admin/blogs', 'GET', '::1', '[]', '2024-10-14 06:59:10', '2024-10-14 06:59:10'),
(232, 1, 'admin', 'GET', '::1', '[]', '2024-10-15 22:56:41', '2024-10-15 22:56:41'),
(233, 1, 'admin/auth/users', 'GET', '::1', '[]', '2024-10-15 22:56:57', '2024-10-15 22:56:57'),
(234, 1, 'admin/blogs', 'GET', '::1', '[]', '2024-10-15 22:57:06', '2024-10-15 22:57:06'),
(235, 1, 'admin/blogs', 'GET', '::1', '[]', '2024-10-15 22:58:45', '2024-10-15 22:58:45'),
(236, 1, 'admin', 'GET', '::1', '[]', '2024-10-15 22:58:52', '2024-10-15 22:58:52'),
(237, 1, 'admin/blogs', 'GET', '::1', '[]', '2024-10-15 22:58:54', '2024-10-15 22:58:54'),
(238, 1, 'admin/helpers/routes', 'GET', '::1', '[]', '2024-10-15 23:02:11', '2024-10-15 23:02:11'),
(239, 1, 'admin/helpers/terminal/database', 'GET', '::1', '[]', '2024-10-15 23:02:31', '2024-10-15 23:02:31'),
(240, 1, 'admin/helpers/scaffold', 'GET', '::1', '[]', '2024-10-15 23:02:33', '2024-10-15 23:02:33'),
(241, 1, 'admin/helpers/scaffold', 'GET', '::1', '[]', '2024-10-15 23:07:56', '2024-10-15 23:07:56'),
(242, 1, 'admin/helpers/scaffold', 'GET', '::1', '[]', '2024-10-15 23:08:04', '2024-10-15 23:08:04'),
(243, 1, 'admin/blogs', 'GET', '::1', '[]', '2024-10-15 23:08:06', '2024-10-15 23:08:06'),
(244, 1, 'admin/blogs', 'GET', '::1', '[]', '2024-10-15 23:08:10', '2024-10-15 23:08:10'),
(245, 1, 'admin', 'GET', '::1', '[]', '2024-10-15 23:08:17', '2024-10-15 23:08:17'),
(246, 1, 'admin', 'GET', '::1', '[]', '2024-10-15 23:08:26', '2024-10-15 23:08:26'),
(247, 1, 'admin/blogs', 'GET', '::1', '[]', '2024-10-15 23:08:28', '2024-10-15 23:08:28'),
(248, 1, 'admin/blogs/create', 'GET', '::1', '[]', '2024-10-15 23:08:30', '2024-10-15 23:08:30'),
(249, 1, 'admin/blogs', 'GET', '::1', '[]', '2024-10-15 23:08:37', '2024-10-15 23:08:37'),
(250, 1, 'admin/blogs/create', 'GET', '::1', '[]', '2024-10-15 23:09:08', '2024-10-15 23:09:08'),
(251, 1, 'admin/blogs/create', 'GET', '::1', '[]', '2024-10-15 23:11:16', '2024-10-15 23:11:16'),
(252, 1, 'admin/blogs', 'GET', '::1', '[]', '2024-10-15 23:11:19', '2024-10-15 23:11:19'),
(253, 1, 'admin/blogs/create', 'GET', '::1', '[]', '2024-10-15 23:11:20', '2024-10-15 23:11:20'),
(254, 1, 'admin/blogs', 'GET', '::1', '[]', '2024-10-15 23:11:24', '2024-10-15 23:11:24'),
(255, 1, 'admin/blogs/1', 'DELETE', '::1', '{\"_method\":\"delete\",\"_token\":\"J0iHgeJ90LoxrJB7Xa3y7rsFWJ5kfSWVmW4hZf3m\"}', '2024-10-15 23:12:14', '2024-10-15 23:12:14'),
(256, 1, 'admin/blogs', 'GET', '::1', '[]', '2024-10-15 23:12:14', '2024-10-15 23:12:14'),
(257, 1, 'admin/blogs', 'GET', '::1', '[]', '2024-10-15 23:12:17', '2024-10-15 23:12:17'),
(258, 1, 'admin', 'GET', '::1', '[]', '2024-10-15 23:12:54', '2024-10-15 23:12:54'),
(259, 1, 'admin', 'GET', '::1', '[]', '2024-10-15 23:12:56', '2024-10-15 23:12:56'),
(260, 1, 'admin', 'GET', '::1', '[]', '2024-10-15 23:12:58', '2024-10-15 23:12:58'),
(261, 1, 'admin', 'GET', '::1', '[]', '2024-10-15 23:13:13', '2024-10-15 23:13:13'),
(262, 1, 'admin/helpers/scaffold', 'GET', '::1', '[]', '2024-10-15 23:13:20', '2024-10-15 23:13:20'),
(263, 1, 'admin/helpers/scaffold', 'POST', '::1', '{\"table_name\":\"blogs\",\"model_name\":\"App\\\\Models\\\\blogs\",\"controller_name\":\"App\\\\Admin\\\\Controllers\\\\BlogController\",\"create\":[\"migration\",\"model\",\"controller\",\"migrate\",\"menu_item\"],\"fields\":[{\"name\":\"title\",\"type\":\"string\",\"nullable\":\"on\",\"key\":null,\"default\":null,\"comment\":null},{\"name\":\"image\",\"type\":\"string\",\"nullable\":\"on\",\"key\":null,\"default\":null,\"comment\":null},{\"name\":\"description\",\"type\":\"longText\",\"nullable\":\"on\",\"key\":null,\"default\":null,\"comment\":null},{\"name\":\"category\",\"type\":\"string\",\"nullable\":\"on\",\"key\":null,\"default\":null,\"comment\":null},{\"name\":\"tags\",\"type\":\"string\",\"nullable\":\"on\",\"key\":null,\"default\":null,\"comment\":null}],\"timestamps\":\"on\",\"primary_key\":\"id\",\"_token\":\"J0iHgeJ90LoxrJB7Xa3y7rsFWJ5kfSWVmW4hZf3m\"}', '2024-10-15 23:14:42', '2024-10-15 23:14:42'),
(264, 1, 'admin/helpers/scaffold', 'GET', '::1', '[]', '2024-10-15 23:14:42', '2024-10-15 23:14:42'),
(265, 1, 'admin/helpers/scaffold', 'POST', '::1', '{\"table_name\":\"blogs\",\"model_name\":\"App\\\\Models\\\\blogs\",\"controller_name\":\"App\\\\Admin\\\\Controllers\\\\BlogController\",\"create\":[\"migration\",\"model\",\"controller\",\"migrate\",\"menu_item\"],\"fields\":[{\"name\":\"title\",\"type\":\"string\",\"nullable\":\"on\",\"key\":null,\"default\":null,\"comment\":null},{\"name\":\"image\",\"type\":\"string\",\"nullable\":\"on\",\"key\":null,\"default\":null,\"comment\":null},{\"name\":\"description\",\"type\":\"longText\",\"nullable\":\"on\",\"key\":null,\"default\":null,\"comment\":null},{\"name\":\"category\",\"type\":\"string\",\"nullable\":\"on\",\"key\":null,\"default\":null,\"comment\":null},{\"name\":\"tags\",\"type\":\"string\",\"nullable\":\"on\",\"key\":null,\"default\":null,\"comment\":null}],\"timestamps\":\"on\",\"primary_key\":\"id\",\"_token\":\"J0iHgeJ90LoxrJB7Xa3y7rsFWJ5kfSWVmW4hZf3m\"}', '2024-10-15 23:15:00', '2024-10-15 23:15:00'),
(266, 1, 'admin/helpers/scaffold', 'GET', '::1', '[]', '2024-10-15 23:15:03', '2024-10-15 23:15:03'),
(267, 1, 'admin/helpers/scaffold', 'POST', '::1', '{\"table_name\":\"blogs\",\"model_name\":\"App\\\\Models\\\\blogs\",\"controller_name\":\"App\\\\Admin\\\\Controllers\\\\BlogController\",\"create\":[\"migration\",\"model\",\"controller\",\"migrate\",\"menu_item\"],\"fields\":[{\"name\":\"title\",\"type\":\"string\",\"nullable\":\"on\",\"key\":null,\"default\":null,\"comment\":null},{\"name\":\"image\",\"type\":\"string\",\"nullable\":\"on\",\"key\":null,\"default\":null,\"comment\":null},{\"name\":\"description\",\"type\":\"longText\",\"nullable\":\"on\",\"key\":null,\"default\":null,\"comment\":null},{\"name\":\"category\",\"type\":\"string\",\"nullable\":\"on\",\"key\":null,\"default\":null,\"comment\":null},{\"name\":\"tags\",\"type\":\"string\",\"nullable\":\"on\",\"key\":null,\"default\":null,\"comment\":null}],\"timestamps\":\"on\",\"primary_key\":\"id\",\"_token\":\"J0iHgeJ90LoxrJB7Xa3y7rsFWJ5kfSWVmW4hZf3m\"}', '2024-10-15 23:15:24', '2024-10-15 23:15:24'),
(268, 1, 'admin/helpers/scaffold', 'POST', '::1', '{\"table_name\":\"blogs\",\"model_name\":\"App\\\\Models\\\\blogs\",\"controller_name\":\"App\\\\Admin\\\\Controllers\\\\BlogController\",\"create\":[\"migration\",\"model\",\"controller\",\"migrate\",\"menu_item\"],\"fields\":[{\"name\":\"title\",\"type\":\"string\",\"nullable\":\"on\",\"key\":null,\"default\":null,\"comment\":null},{\"name\":\"image\",\"type\":\"string\",\"nullable\":\"on\",\"key\":null,\"default\":null,\"comment\":null},{\"name\":\"description\",\"type\":\"longText\",\"nullable\":\"on\",\"key\":null,\"default\":null,\"comment\":null},{\"name\":\"category\",\"type\":\"string\",\"nullable\":\"on\",\"key\":null,\"default\":null,\"comment\":null},{\"name\":\"tags\",\"type\":\"string\",\"nullable\":\"on\",\"key\":null,\"default\":null,\"comment\":null}],\"timestamps\":\"on\",\"primary_key\":\"id\",\"_token\":\"J0iHgeJ90LoxrJB7Xa3y7rsFWJ5kfSWVmW4hZf3m\"}', '2024-10-15 23:15:24', '2024-10-15 23:15:24'),
(269, 1, 'admin/helpers/scaffold', 'GET', '::1', '[]', '2024-10-15 23:15:24', '2024-10-15 23:15:24'),
(270, 1, 'admin/helpers/scaffold', 'GET', '::1', '[]', '2024-10-15 23:15:25', '2024-10-15 23:15:25'),
(271, 1, 'admin/helpers/scaffold', 'GET', '::1', '[]', '2024-10-15 23:15:27', '2024-10-15 23:15:27'),
(272, 1, 'admin/helpers/scaffold', 'GET', '::1', '[]', '2024-10-15 23:15:41', '2024-10-15 23:15:41'),
(273, 1, 'admin/blogs', 'GET', '::1', '[]', '2024-10-15 23:15:43', '2024-10-15 23:15:43'),
(274, 1, 'admin/blogs', 'GET', '::1', '[]', '2024-10-15 23:17:05', '2024-10-15 23:17:05'),
(275, 1, 'admin/blogs/1/edit', 'GET', '::1', '[]', '2024-10-15 23:17:24', '2024-10-15 23:17:24'),
(276, 1, 'admin/blogs/1', 'PUT', '::1', '{\"title\":\"Amazing Facts That You Probably Didn\\u2019t Know About Sindhudurg\",\"description\":\"#Fact 1: The district of Sindhudurg was established in 1981. This was done after taking out six Talukas from the original District, Ratnagiri. These Talukas were Kudal, Vengurla, Sawantwadi, Malvan, Kankavli and Devgad.\\r\\n\\r\\n#Fact 2: It was only later that Vaibhavwadi and Dodamarg came to be attached to District Sindhudurg. At present, there are eight Talukas in Sindhudurg District.\\r\\n\\r\\n#Fact 3: From the time of the great Chhatrapati Shivaji Maharaj, this place has a big historical significance.  \\r\\n\\r\\n#Fact 4: It is a place that is known for its great forts, pristine beaches and places of spiritual and religious interests.\\r\\n\\r\\n#Fact 5: While the beaches take up most of the attention at Sindhudurg, there are some majestic waterfalls too in the area. Amboli waterfall is the most notable one and attracts plenty of tourists.\\r\\n\\r\\n#Fact 6:  There are also a couple of scenic waterfalls in Dodamarg as well. Mangeli, Savdav and Napne are some of the prominent ones that are an absolute must-visit during the monsoon months.\\r\\n\\r\\nFact #7: It is amongst one of the cleanest districts in India.\\r\\n\\r\\n#Fact 8: Want to go Scuba diving in India? Well, Sindhudurg is the place to be!\\r\\n\\r\\n#Fact 9: The district will soon have an airport of its own. Construction of the runway is going on in full swing and the Chipi airport is expected to be reopen soon. The airport will give a fillip to tourism in the coastal district of Sindhudurg, which Maharashtra wants to develop as an alternative destination to Goa. At present, most tourists travel to Sindhudurg and nearby places by road or through Konkan Railway.\\r\\n\\r\\n#Fact 10: The language that is most commonly spoken in Sindhudurg Konkani. There is a distinct dialect of Konkani \\u2013 Malvani that you can hear the locals communicate in. In addition, most people in the area are fluent in Marathi. Hindi & English is also widely understood in this part of the country.\\r\\n\\r\\n#Fact 11: Tropical fruits such as Alphonso mangoes, Cashews, Jamuns, Pineapples etc. are grown in this district.\\r\\n\\r\\n#Fact 12: Sindhudurg Fort is one of the major attractions of this district. It was built by Chhatrapati Shivaji Maharaj. It is an architectural marvel and its main entrance is built in a way that no one can pinpoint the entrance from outside.\\r\\n\\r\\n#Fact 13: The prestigious Taj Hotels of India have been allocated 54 hectares in Sindhudurg to set up a tourism centre.\\r\\n\\r\\n#Fact 14: Given the potential of the place, Axis Ecorp is also in the process of setting holiday homes that will help boost the tourism of the sector. Having land bank of 100 Acre the upcoming projects of the company include Axis Blues, Axis Yog Villas, Axis Lake City and Axis Lake City Plaza.\\r\\n\\r\\n#Fact 15: Malvani cuisine is the standard cuisine you will find in this place. Sindhudurg is a paradise for seafood lovers. If you are looking for some lip-smacking crabs, prawns and Pomfret, then Sindhudurg is the place to be. However, if you are a vegetarian, then you should not lose heart as you can get a lot of fresh locally sourced vegetables cooked in Malvani style.\",\"category\":\"Blogs\",\"tags\":null,\"_token\":\"J0iHgeJ90LoxrJB7Xa3y7rsFWJ5kfSWVmW4hZf3m\",\"_method\":\"PUT\"}', '2024-10-15 23:17:32', '2024-10-15 23:17:32'),
(277, 1, 'admin/blogs', 'GET', '::1', '[]', '2024-10-15 23:17:32', '2024-10-15 23:17:32'),
(278, 1, 'admin/blogs/1/edit', 'GET', '::1', '[]', '2024-10-15 23:17:37', '2024-10-15 23:17:37'),
(279, 1, 'admin/blogs', 'GET', '::1', '[]', '2024-10-15 23:17:39', '2024-10-15 23:17:39'),
(280, 1, 'admin', 'GET', '::1', '[]', '2024-10-15 23:17:59', '2024-10-15 23:17:59'),
(281, 1, 'admin/blogs', 'GET', '::1', '[]', '2024-10-15 23:31:25', '2024-10-15 23:31:25'),
(282, 1, 'admin/blogs/create', 'GET', '::1', '[]', '2024-10-16 01:16:30', '2024-10-16 01:16:30'),
(283, 1, 'admin/blogs', 'POST', '::1', '{\"title\":\"Hello\",\"description\":null,\"category\":null,\"tags\":null,\"_token\":\"J0iHgeJ90LoxrJB7Xa3y7rsFWJ5kfSWVmW4hZf3m\"}', '2024-10-16 01:16:35', '2024-10-16 01:16:35'),
(284, 1, 'admin/blogs', 'GET', '::1', '[]', '2024-10-16 01:16:36', '2024-10-16 01:16:36'),
(285, 1, 'admin/blogs/1/edit', 'GET', '::1', '[]', '2024-10-16 01:31:10', '2024-10-16 01:31:10'),
(286, 1, 'admin/blogs', 'GET', '::1', '[]', '2024-10-16 01:31:12', '2024-10-16 01:31:12'),
(287, 1, 'admin/blogs', 'GET', '::1', '[]', '2024-10-16 02:18:34', '2024-10-16 02:18:34'),
(288, 1, 'admin/blogs/2', 'DELETE', '::1', '{\"_method\":\"delete\",\"_token\":\"J0iHgeJ90LoxrJB7Xa3y7rsFWJ5kfSWVmW4hZf3m\"}', '2024-10-16 02:18:37', '2024-10-16 02:18:37'),
(289, 1, 'admin/blogs', 'GET', '::1', '[]', '2024-10-16 02:18:37', '2024-10-16 02:18:37'),
(290, 1, 'admin/blogs', 'GET', '::1', '{\"_export_\":\"all\"}', '2024-10-16 02:20:49', '2024-10-16 02:20:49'),
(291, 1, 'admin/blogs/create', 'GET', '::1', '[]', '2024-10-16 02:22:07', '2024-10-16 02:22:07'),
(292, 1, 'admin/blogs', 'POST', '::1', '{\"title\":\"Axis Ecorp to invest Rs 100 crore in holiday home project near upcoming Goa airport \\u2013 Property Reporter\",\"description\":\"Axis Ecorp, a real estate firm focused on premium developments in holiday homes and secondary housing segment, on Saturday announced that it will invest Rs 100 crore in the development of hotel apartments and luxury serviced villas near the upcoming Goa airport. The project will be developed on a 25-acres of land located at Shindhudurg, Goa-Maharashtra border. It is merely 13 kms away from the upcoming MOPA International Airport in Goa.\\r\\n\\r\\nThe company acquired the land recently. The new project will offer 150 serviced studio apartments, 70 luxury serviced villas and 100 build-to-suit plotted developments. \\u201cMOPA airport is being seen as a big game-changer for this region and it is expected to spell boom for Goa and its peripheral areas, which includes Dodamarg. Almost 50 per cent of the work for the MOPA airport is already done and the project is expected to be ready by 2022,\\u201d Aditya Kushwaha, CEO & Director, Axis Ecorp said in a statement.\",\"category\":\"News\",\"tags\":null,\"_token\":\"J0iHgeJ90LoxrJB7Xa3y7rsFWJ5kfSWVmW4hZf3m\",\"after-save\":\"continue_creating\"}', '2024-10-16 02:23:44', '2024-10-16 02:23:44'),
(293, 1, 'admin/blogs/create', 'GET', '::1', '[]', '2024-10-16 02:23:44', '2024-10-16 02:23:44'),
(294, 1, 'admin/blogs', 'GET', '::1', '[]', '2024-10-16 02:23:47', '2024-10-16 02:23:47'),
(295, 1, 'admin/blogs/1', 'GET', '::1', '[]', '2024-10-16 02:24:44', '2024-10-16 02:24:44'),
(296, 1, 'admin/blogs', 'GET', '::1', '[]', '2024-10-16 02:24:56', '2024-10-16 02:24:56'),
(297, 1, 'admin/blogs', 'GET', '::1', '[]', '2024-10-16 05:38:55', '2024-10-16 05:38:55'),
(298, 1, 'admin/blogs', 'GET', '::1', '[]', '2024-10-16 05:38:58', '2024-10-16 05:38:58'),
(299, 1, 'admin', 'GET', '::1', '[]', '2024-10-16 05:39:00', '2024-10-16 05:39:00'),
(300, 1, 'admin/blogs', 'GET', '::1', '[]', '2024-10-16 05:39:02', '2024-10-16 05:39:02'),
(301, 1, 'admin/blogs', 'GET', '::1', '[]', '2024-10-16 06:00:39', '2024-10-16 06:00:39'),
(302, 1, 'admin/blogs', 'GET', '::1', '[]', '2024-10-16 06:00:41', '2024-10-16 06:00:41'),
(303, 1, 'admin', 'GET', '::1', '[]', '2024-10-16 06:48:01', '2024-10-16 06:48:01'),
(304, 1, 'admin', 'GET', '::1', '[]', '2024-10-16 06:48:10', '2024-10-16 06:48:10'),
(305, 1, 'admin/blogs', 'GET', '::1', '[]', '2024-10-16 06:48:13', '2024-10-16 06:48:13'),
(306, 1, 'admin/blogs/1', 'GET', '::1', '[]', '2024-10-16 06:48:16', '2024-10-16 06:48:16'),
(307, 1, 'admin/blogs', 'GET', '::1', '[]', '2024-10-16 06:48:20', '2024-10-16 06:48:20'),
(308, 1, 'admin/blogs/3', 'DELETE', '::1', '{\"_method\":\"delete\",\"_token\":\"B3RTN0OSQs3e29DxrudEWxLhCQhfulC6ISnNntRM\"}', '2024-10-16 06:52:51', '2024-10-16 06:52:51'),
(309, 1, 'admin/blogs', 'GET', '::1', '[]', '2024-10-16 06:52:51', '2024-10-16 06:52:51'),
(310, 1, 'admin', 'GET', '::1', '[]', '2024-10-16 23:10:19', '2024-10-16 23:10:19'),
(311, 1, 'admin/blogs', 'GET', '::1', '[]', '2024-10-16 23:10:24', '2024-10-16 23:10:24'),
(312, 1, 'admin/blogs/create', 'GET', '::1', '[]', '2024-10-16 23:10:26', '2024-10-16 23:10:26'),
(313, 1, 'admin/blogs', 'POST', '::1', '{\"title\":\"Testing\",\"image_file_del_\":\"new\\/1-1.jpg,\",\"description\":\"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\",\"category\":\"Blogs\",\"tags\":null,\"_token\":\"pgi8l6trL1iPLKVvnJqlWyNAlW0aU29IQOzznRPV\"}', '2024-10-16 23:11:18', '2024-10-16 23:11:18'),
(314, 1, 'admin/blogs', 'GET', '::1', '[]', '2024-10-16 23:11:18', '2024-10-16 23:11:18'),
(315, 1, 'admin/blogs/4/edit', 'GET', '::1', '[]', '2024-10-16 23:12:01', '2024-10-16 23:12:01'),
(316, 1, 'admin/blogs/4', 'PUT', '::1', '{\"title\":\"Testing\",\"description\":\"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\",\"category\":\"Blogs\",\"tags\":null,\"_token\":\"pgi8l6trL1iPLKVvnJqlWyNAlW0aU29IQOzznRPV\",\"_method\":\"PUT\"}', '2024-10-16 23:12:08', '2024-10-16 23:12:08'),
(317, 1, 'admin/blogs', 'GET', '::1', '[]', '2024-10-16 23:12:08', '2024-10-16 23:12:08'),
(318, 1, 'admin/blogs/4', 'DELETE', '::1', '{\"_method\":\"delete\",\"_token\":\"pgi8l6trL1iPLKVvnJqlWyNAlW0aU29IQOzznRPV\"}', '2024-10-16 23:17:10', '2024-10-16 23:17:10'),
(319, 1, 'admin/blogs', 'GET', '::1', '[]', '2024-10-16 23:17:10', '2024-10-16 23:17:10'),
(320, 1, 'admin/helpers/scaffold', 'GET', '::1', '[]', '2024-10-16 23:22:41', '2024-10-16 23:22:41'),
(321, 1, 'admin/blogs', 'GET', '::1', '[]', '2024-10-16 23:23:03', '2024-10-16 23:23:03'),
(322, 1, 'admin/helpers/scaffold', 'POST', '::1', '{\"table_name\":\"news\",\"model_name\":\"App\\\\Models\\\\news\",\"controller_name\":\"App\\\\Admin\\\\Controllers\\\\NewsController\",\"create\":[\"migration\",\"model\",\"controller\",\"migrate\",\"menu_item\"],\"fields\":[{\"name\":\"title\",\"type\":\"string\",\"nullable\":\"on\",\"key\":null,\"default\":null,\"comment\":null},{\"name\":\"image\",\"type\":\"string\",\"nullable\":\"on\",\"key\":null,\"default\":null,\"comment\":null},{\"name\":\"description\",\"type\":\"longText\",\"nullable\":\"on\",\"key\":null,\"default\":null,\"comment\":null},{\"name\":\"category\",\"type\":\"string\",\"nullable\":\"on\",\"key\":null,\"default\":null,\"comment\":null},{\"name\":\"tags\",\"type\":\"string\",\"nullable\":\"on\",\"key\":null,\"default\":null,\"comment\":null}],\"timestamps\":\"on\",\"primary_key\":\"id\",\"_token\":\"pgi8l6trL1iPLKVvnJqlWyNAlW0aU29IQOzznRPV\"}', '2024-10-16 23:23:58', '2024-10-16 23:23:58'),
(323, 1, 'admin/helpers/scaffold', 'GET', '::1', '[]', '2024-10-16 23:24:00', '2024-10-16 23:24:00'),
(324, 1, 'admin/helpers/scaffold', 'GET', '::1', '[]', '2024-10-16 23:24:06', '2024-10-16 23:24:06'),
(325, 1, 'admin/helpers/scaffold', 'GET', '::1', '[]', '2024-10-16 23:24:10', '2024-10-16 23:24:10'),
(326, 1, 'admin', 'GET', '::1', '[]', '2024-10-16 23:24:16', '2024-10-16 23:24:16'),
(327, 1, 'admin', 'GET', '::1', '[]', '2024-10-16 23:24:57', '2024-10-16 23:24:57'),
(328, 1, 'admin/news', 'GET', '::1', '[]', '2024-10-16 23:24:58', '2024-10-16 23:24:58'),
(329, 1, 'admin/news', 'GET', '::1', '[]', '2024-10-16 23:31:56', '2024-10-16 23:31:56'),
(330, 1, 'admin/news/1/edit', 'GET', '::1', '[]', '2024-10-16 23:31:59', '2024-10-16 23:31:59'),
(331, 1, 'admin/news/1', 'PUT', '::1', '{\"title\":\"Axis Ecorp to invest Rs 100 crore in holiday home project near upcoming Goa airport \\u2013 Devdiscourse\",\"description\":\"Axis Ecorp, a real estate firm focused on premium developments in holiday homes and secondary housing segment, on Saturday announced that it will invest Rs 100 crore in the development of hotel apartments and luxury serviced villas near the upcoming Goa airport. The project will be developed on a 25-acres of land located at Shindhudurg, Goa-Maharashtra border. It is merely 13 kms away from the upcoming MOPA International Airport in Goa.\",\"category\":\"News\",\"tags\":null,\"_token\":\"pgi8l6trL1iPLKVvnJqlWyNAlW0aU29IQOzznRPV\",\"_method\":\"PUT\"}', '2024-10-16 23:32:27', '2024-10-16 23:32:27'),
(332, 1, 'admin/news', 'GET', '::1', '[]', '2024-10-16 23:32:27', '2024-10-16 23:32:27'),
(333, 1, 'admin/news/1/edit', 'GET', '::1', '[]', '2024-10-16 23:53:18', '2024-10-16 23:53:18'),
(334, 1, 'admin/news', 'GET', '::1', '[]', '2024-10-17 00:10:09', '2024-10-17 00:10:09'),
(335, 1, 'admin/news/create', 'GET', '::1', '[]', '2024-10-17 00:10:12', '2024-10-17 00:10:12'),
(336, 1, 'admin/news', 'POST', '::1', '{\"title\":\"jdvgvbhje\",\"description\":\"hgregreqgregregregregregergergregregreg\",\"category\":null,\"tags\":null,\"_token\":\"pgi8l6trL1iPLKVvnJqlWyNAlW0aU29IQOzznRPV\"}', '2024-10-17 00:10:52', '2024-10-17 00:10:52'),
(337, 1, 'admin/news', 'GET', '::1', '[]', '2024-10-17 00:10:52', '2024-10-17 00:10:52'),
(338, 1, 'admin/blogs', 'GET', '::1', '[]', '2024-10-17 00:11:53', '2024-10-17 00:11:53'),
(339, 1, 'admin/blogs/1/edit', 'GET', '::1', '[]', '2024-10-17 00:11:56', '2024-10-17 00:11:56'),
(340, 1, 'admin/blogs', 'GET', '::1', '[]', '2024-10-17 00:12:01', '2024-10-17 00:12:01'),
(341, 1, 'admin/blogs', 'GET', '::1', '[]', '2024-10-17 00:14:54', '2024-10-17 00:14:54'),
(342, 1, 'admin/news', 'GET', '::1', '[]', '2024-10-17 00:14:55', '2024-10-17 00:14:55'),
(343, 1, 'admin/news/create', 'GET', '::1', '[]', '2024-10-17 00:15:00', '2024-10-17 00:15:00'),
(344, 1, 'admin/news', 'GET', '::1', '[]', '2024-10-17 00:15:07', '2024-10-17 00:15:07'),
(345, 1, 'admin/helpers/scaffold', 'GET', '::1', '[]', '2024-10-17 00:15:26', '2024-10-17 00:15:26'),
(346, 1, 'admin/helpers/terminal/artisan', 'GET', '::1', '[]', '2024-10-17 00:15:30', '2024-10-17 00:15:30'),
(347, 1, 'admin/helpers/routes', 'GET', '::1', '[]', '2024-10-17 00:15:33', '2024-10-17 00:15:33'),
(348, 1, 'admin/helpers/terminal/database', 'GET', '::1', '[]', '2024-10-17 00:15:45', '2024-10-17 00:15:45'),
(349, 1, 'admin/news', 'GET', '::1', '[]', '2024-10-17 00:17:43', '2024-10-17 00:17:43'),
(350, 1, 'admin/news/2', 'DELETE', '::1', '{\"_method\":\"delete\",\"_token\":\"pgi8l6trL1iPLKVvnJqlWyNAlW0aU29IQOzznRPV\"}', '2024-10-17 00:17:45', '2024-10-17 00:17:45'),
(351, 1, 'admin/news', 'GET', '::1', '[]', '2024-10-17 00:17:46', '2024-10-17 00:17:46'),
(352, 1, 'admin/news/1/edit', 'GET', '::1', '[]', '2024-10-17 00:17:57', '2024-10-17 00:17:57'),
(353, 1, 'admin/auth/users', 'GET', '::1', '[]', '2024-10-17 00:35:05', '2024-10-17 00:35:05'),
(354, 1, 'admin/auth/users/create', 'GET', '::1', '[]', '2024-10-17 00:35:11', '2024-10-17 00:35:11'),
(355, 1, 'admin/auth/users', 'POST', '::1', '{\"username\":\"Himanshu\",\"name\":\"Himanshu Tyagi\",\"password\":\"*****-filtered-out-*****\",\"password_confirmation\":\"Himanshu@axis\",\"roles\":[\"1\",null],\"search_terms\":null,\"permissions\":[\"1\",\"6\",\"5\",\"2\",\"3\",\"4\",null],\"_token\":\"pgi8l6trL1iPLKVvnJqlWyNAlW0aU29IQOzznRPV\"}', '2024-10-17 00:36:53', '2024-10-17 00:36:53'),
(356, 1, 'admin/auth/users', 'GET', '::1', '[]', '2024-10-17 00:36:53', '2024-10-17 00:36:53'),
(357, 1, 'admin/auth/logout', 'GET', '::1', '[]', '2024-10-17 00:37:06', '2024-10-17 00:37:06'),
(358, 2, 'admin', 'GET', '::1', '[]', '2024-10-17 00:37:13', '2024-10-17 00:37:13'),
(359, 2, 'admin/helpers/scaffold', 'GET', '::1', '[]', '2024-10-17 00:37:17', '2024-10-17 00:37:17'),
(360, 2, 'admin', 'GET', '::1', '[]', '2024-10-17 00:37:19', '2024-10-17 00:37:19'),
(361, 2, 'admin/auth/users', 'GET', '::1', '[]', '2024-10-17 00:37:26', '2024-10-17 00:37:26'),
(362, 2, 'admin/auth/users/2', 'DELETE', '::1', '{\"_method\":\"delete\",\"_token\":\"XpmOpAWDGPgf0CmXRRPqoYF3PPRaMCNEzPccFaO9\"}', '2024-10-17 00:37:31', '2024-10-17 00:37:31'),
(363, 1, 'admin', 'GET', '::1', '[]', '2024-10-17 00:37:36', '2024-10-17 00:37:36'),
(364, 1, 'admin', 'GET', '::1', '[]', '2024-10-17 00:39:59', '2024-10-17 00:39:59'),
(365, 1, 'admin/auth/logout', 'GET', '::1', '[]', '2024-10-17 00:40:02', '2024-10-17 00:40:02'),
(366, 1, 'admin', 'GET', '::1', '[]', '2024-10-17 00:40:06', '2024-10-17 00:40:06'),
(367, 1, 'admin', 'GET', '::1', '[]', '2024-10-17 00:40:09', '2024-10-17 00:40:09'),
(368, 1, 'admin/auth/logout', 'GET', '::1', '[]', '2024-10-17 00:40:12', '2024-10-17 00:40:12'),
(369, 1, 'admin', 'GET', '::1', '[]', '2024-10-17 00:40:19', '2024-10-17 00:40:19'),
(370, 1, 'admin/auth/logout', 'GET', '::1', '[]', '2024-10-17 00:40:24', '2024-10-17 00:40:24'),
(371, 1, 'admin', 'GET', '::1', '[]', '2024-10-17 00:40:55', '2024-10-17 00:40:55'),
(372, 1, 'admin', 'GET', '::1', '[]', '2024-10-17 00:41:33', '2024-10-17 00:41:33'),
(373, 1, 'admin', 'GET', '::1', '[]', '2024-10-17 00:42:11', '2024-10-17 00:42:11'),
(374, 1, 'admin', 'GET', '::1', '[]', '2024-10-17 00:42:13', '2024-10-17 00:42:13');
INSERT INTO `admin_operation_log` (`id`, `user_id`, `path`, `method`, `ip`, `input`, `created_at`, `updated_at`) VALUES
(375, 1, 'admin/auth/users', 'GET', '::1', '[]', '2024-10-17 00:42:15', '2024-10-17 00:42:15'),
(376, 1, 'admin/auth/users/1/edit', 'GET', '::1', '[]', '2024-10-17 00:42:17', '2024-10-17 00:42:17'),
(377, 1, 'admin/auth/users/1', 'PUT', '::1', '{\"username\":\"admin\",\"name\":\"Administrator\",\"password\":\"*****-filtered-out-*****\",\"password_confirmation\":\"Himanshu@axis!@#\",\"roles\":[\"1\",null],\"search_terms\":null,\"permissions\":[null],\"_token\":\"edk1HuAXAHU64i28ko7JRS7YYQKa8jIoGflK3Ngd\",\"_method\":\"PUT\"}', '2024-10-17 00:42:52', '2024-10-17 00:42:52'),
(378, 1, 'admin/auth/users', 'GET', '::1', '[]', '2024-10-17 00:42:52', '2024-10-17 00:42:52'),
(379, 1, 'admin/auth/logout', 'GET', '::1', '[]', '2024-10-17 00:43:00', '2024-10-17 00:43:00'),
(380, 1, 'admin', 'GET', '::1', '[]', '2024-10-17 00:43:14', '2024-10-17 00:43:14'),
(381, 1, 'admin/auth/roles', 'GET', '::1', '[]', '2024-10-17 00:43:26', '2024-10-17 00:43:26'),
(382, 1, 'admin/auth/roles/create', 'GET', '::1', '[]', '2024-10-17 00:43:30', '2024-10-17 00:43:30'),
(383, 1, 'admin/auth/roles', 'POST', '::1', '{\"slug\":\"Author\",\"name\":\"Rajvant\",\"permissions\":[\"2\",\"6\",null],\"_token\":\"GDLtPbhAyvVXFGr8rwJc9U4gagTZZ63lt6vYyZ79\"}', '2024-10-17 00:44:07', '2024-10-17 00:44:07'),
(384, 1, 'admin/auth/roles', 'GET', '::1', '[]', '2024-10-17 00:44:08', '2024-10-17 00:44:08'),
(385, 1, 'admin/auth/users', 'GET', '::1', '[]', '2024-10-17 00:44:26', '2024-10-17 00:44:26'),
(386, 1, 'admin/auth/users/create', 'GET', '::1', '[]', '2024-10-17 00:44:27', '2024-10-17 00:44:27'),
(387, 1, 'admin/auth/users', 'POST', '::1', '{\"username\":\"Rajvant\",\"name\":\"Rajvant\",\"password\":\"*****-filtered-out-*****\",\"password_confirmation\":\"Rajvant@axis\",\"roles\":[\"2\",null],\"search_terms\":null,\"permissions\":[null],\"_token\":\"GDLtPbhAyvVXFGr8rwJc9U4gagTZZ63lt6vYyZ79\"}', '2024-10-17 00:45:03', '2024-10-17 00:45:03'),
(388, 1, 'admin/auth/users', 'GET', '::1', '[]', '2024-10-17 00:45:03', '2024-10-17 00:45:03'),
(389, 1, 'admin/auth/logout', 'GET', '::1', '[]', '2024-10-17 00:45:11', '2024-10-17 00:45:11'),
(390, 3, 'admin', 'GET', '::1', '[]', '2024-10-17 00:45:30', '2024-10-17 00:45:30'),
(391, 3, 'admin/helpers/scaffold', 'GET', '::1', '[]', '2024-10-17 00:45:37', '2024-10-17 00:45:37'),
(392, 3, 'admin', 'GET', '::1', '[]', '2024-10-17 00:45:38', '2024-10-17 00:45:38'),
(393, 3, 'admin/blogs', 'GET', '::1', '[]', '2024-10-17 00:45:40', '2024-10-17 00:45:40'),
(394, 3, 'admin/news', 'GET', '::1', '[]', '2024-10-17 00:45:42', '2024-10-17 00:45:42'),
(395, 3, 'admin/blogs', 'GET', '::1', '[]', '2024-10-17 00:45:45', '2024-10-17 00:45:45'),
(396, 3, 'admin/news', 'GET', '::1', '[]', '2024-10-17 00:45:46', '2024-10-17 00:45:46'),
(397, 3, 'admin/auth/logout', 'GET', '::1', '[]', '2024-10-17 00:45:53', '2024-10-17 00:45:53'),
(398, 1, 'admin', 'GET', '::1', '[]', '2024-10-17 00:46:12', '2024-10-17 00:46:12'),
(399, 1, 'admin/auth/users', 'GET', '::1', '[]', '2024-10-17 00:46:20', '2024-10-17 00:46:20'),
(400, 3, 'admin', 'GET', '::1', '[]', '2024-10-17 00:46:31', '2024-10-17 00:46:31'),
(401, 3, 'admin/blogs', 'GET', '::1', '[]', '2024-10-17 00:46:33', '2024-10-17 00:46:33'),
(402, 1, 'admin/auth/permissions', 'GET', '::1', '[]', '2024-10-17 00:46:37', '2024-10-17 00:46:37'),
(403, 1, 'admin/auth/roles', 'GET', '::1', '[]', '2024-10-17 00:46:42', '2024-10-17 00:46:42'),
(404, 1, 'admin/auth/roles/2/edit', 'GET', '::1', '[]', '2024-10-17 00:46:45', '2024-10-17 00:46:45'),
(405, 1, 'admin/auth/roles/2', 'PUT', '::1', '{\"slug\":\"Author\",\"name\":\"Rajvant\",\"permissions\":[\"2\",null],\"_token\":\"3nRekcG0FXokbVhCee8lPYOGzERSj4I4oJVdrKcK\",\"_method\":\"PUT\"}', '2024-10-17 00:46:51', '2024-10-17 00:46:51'),
(406, 1, 'admin/auth/roles', 'GET', '::1', '[]', '2024-10-17 00:46:51', '2024-10-17 00:46:51'),
(407, 3, 'admin/blogs', 'GET', '::1', '[]', '2024-10-17 00:46:53', '2024-10-17 00:46:53'),
(408, 3, 'admin/blogs', 'GET', '::1', '[]', '2024-10-17 00:46:55', '2024-10-17 00:46:55'),
(409, 3, 'admin/blogs', 'GET', '::1', '[]', '2024-10-17 00:46:56', '2024-10-17 00:46:56'),
(410, 3, 'admin/blogs', 'GET', '::1', '[]', '2024-10-17 00:46:56', '2024-10-17 00:46:56'),
(411, 3, 'admin/blogs', 'GET', '::1', '[]', '2024-10-17 00:46:56', '2024-10-17 00:46:56'),
(412, 3, 'admin/helpers/scaffold', 'GET', '::1', '[]', '2024-10-17 00:47:00', '2024-10-17 00:47:00'),
(413, 3, 'admin/helpers/scaffold', 'GET', '::1', '[]', '2024-10-17 00:47:01', '2024-10-17 00:47:01'),
(414, 3, 'admin/helpers/terminal/database', 'GET', '::1', '[]', '2024-10-17 00:47:04', '2024-10-17 00:47:04'),
(415, 3, 'admin/helpers/terminal/artisan', 'GET', '::1', '[]', '2024-10-17 00:47:05', '2024-10-17 00:47:05'),
(416, 1, 'admin/auth/roles/2/edit', 'GET', '::1', '[]', '2024-10-17 00:47:08', '2024-10-17 00:47:08'),
(417, 1, 'admin/auth/roles/2', 'PUT', '::1', '{\"slug\":\"Author\",\"name\":\"Rajvant\",\"permissions\":[\"2\",\"5\",null],\"_token\":\"3nRekcG0FXokbVhCee8lPYOGzERSj4I4oJVdrKcK\",\"_method\":\"PUT\"}', '2024-10-17 00:47:24', '2024-10-17 00:47:24'),
(418, 1, 'admin/auth/roles', 'GET', '::1', '[]', '2024-10-17 00:47:24', '2024-10-17 00:47:24'),
(419, 3, 'admin/helpers/terminal/artisan', 'GET', '::1', '[]', '2024-10-17 00:47:26', '2024-10-17 00:47:26'),
(420, 3, 'admin/helpers/scaffold', 'GET', '::1', '[]', '2024-10-17 00:47:30', '2024-10-17 00:47:30'),
(421, 3, 'admin/blogs', 'GET', '::1', '[]', '2024-10-17 00:47:31', '2024-10-17 00:47:31'),
(422, 3, 'admin/news', 'GET', '::1', '[]', '2024-10-17 00:47:32', '2024-10-17 00:47:32'),
(423, 1, 'admin/auth/roles/2/edit', 'GET', '::1', '[]', '2024-10-17 00:47:36', '2024-10-17 00:47:36'),
(424, 1, 'admin/auth/roles/2', 'PUT', '::1', '{\"slug\":\"Author\",\"name\":\"Rajvant\",\"permissions\":[\"3\",null],\"_token\":\"3nRekcG0FXokbVhCee8lPYOGzERSj4I4oJVdrKcK\",\"_method\":\"PUT\"}', '2024-10-17 00:47:48', '2024-10-17 00:47:48'),
(425, 1, 'admin/auth/roles', 'GET', '::1', '[]', '2024-10-17 00:47:48', '2024-10-17 00:47:48'),
(426, 3, 'admin/news', 'GET', '::1', '[]', '2024-10-17 00:47:50', '2024-10-17 00:47:50'),
(427, 3, 'admin/news', 'GET', '::1', '[]', '2024-10-17 00:47:50', '2024-10-17 00:47:50'),
(428, 3, 'admin/news', 'GET', '::1', '[]', '2024-10-17 00:47:51', '2024-10-17 00:47:51'),
(429, 3, 'admin/news', 'GET', '::1', '[]', '2024-10-17 00:47:52', '2024-10-17 00:47:52'),
(430, 3, 'admin', 'GET', '::1', '[]', '2024-10-17 00:47:54', '2024-10-17 00:47:54'),
(431, 3, 'admin/helpers/scaffold', 'GET', '::1', '[]', '2024-10-17 00:47:56', '2024-10-17 00:47:56'),
(432, 3, 'admin/helpers/terminal/database', 'GET', '::1', '[]', '2024-10-17 00:47:57', '2024-10-17 00:47:57'),
(433, 3, 'admin/helpers/routes', 'GET', '::1', '[]', '2024-10-17 00:47:58', '2024-10-17 00:47:58'),
(434, 3, 'admin/blogs', 'GET', '::1', '[]', '2024-10-17 00:47:58', '2024-10-17 00:47:58'),
(435, 3, 'admin/news', 'GET', '::1', '[]', '2024-10-17 00:48:00', '2024-10-17 00:48:00'),
(436, 1, 'admin/auth/roles/2/edit', 'GET', '::1', '[]', '2024-10-17 00:48:02', '2024-10-17 00:48:02'),
(437, 1, 'admin/auth/roles/2', 'PUT', '::1', '{\"slug\":\"Author\",\"name\":\"Rajvant\",\"permissions\":[\"2\",\"3\",\"5\",\"6\",null],\"_token\":\"3nRekcG0FXokbVhCee8lPYOGzERSj4I4oJVdrKcK\",\"_method\":\"PUT\"}', '2024-10-17 00:48:13', '2024-10-17 00:48:13'),
(438, 1, 'admin/auth/roles', 'GET', '::1', '[]', '2024-10-17 00:48:14', '2024-10-17 00:48:14'),
(439, 3, 'admin/news', 'GET', '::1', '[]', '2024-10-17 00:48:16', '2024-10-17 00:48:16'),
(440, 3, 'admin/news', 'GET', '::1', '[]', '2024-10-17 00:48:17', '2024-10-17 00:48:17'),
(441, 3, 'admin/news', 'GET', '::1', '[]', '2024-10-17 00:48:17', '2024-10-17 00:48:17'),
(442, 3, 'admin/blogs', 'GET', '::1', '[]', '2024-10-17 00:48:19', '2024-10-17 00:48:19'),
(443, 3, 'admin/helpers/scaffold', 'GET', '::1', '[]', '2024-10-17 00:48:21', '2024-10-17 00:48:21'),
(444, 3, 'admin', 'GET', '::1', '[]', '2024-10-17 00:48:23', '2024-10-17 00:48:23'),
(445, 3, 'admin/blogs', 'GET', '::1', '[]', '2024-10-17 00:48:27', '2024-10-17 00:48:27'),
(446, 1, 'admin/auth/roles/2/edit', 'GET', '::1', '[]', '2024-10-17 00:48:30', '2024-10-17 00:48:30'),
(447, 1, 'admin/auth/roles/2', 'PUT', '::1', '{\"slug\":\"Author\",\"name\":\"Rajvant\",\"permissions\":[\"1\",\"2\",null],\"_token\":\"3nRekcG0FXokbVhCee8lPYOGzERSj4I4oJVdrKcK\",\"_method\":\"PUT\"}', '2024-10-17 00:48:42', '2024-10-17 00:48:42'),
(448, 1, 'admin/auth/roles', 'GET', '::1', '[]', '2024-10-17 00:48:43', '2024-10-17 00:48:43'),
(449, 3, 'admin/blogs', 'GET', '::1', '[]', '2024-10-17 00:48:45', '2024-10-17 00:48:45'),
(450, 3, 'admin/news', 'GET', '::1', '[]', '2024-10-17 00:48:47', '2024-10-17 00:48:47'),
(451, 3, 'admin/blogs', 'GET', '::1', '[]', '2024-10-17 00:48:48', '2024-10-17 00:48:48'),
(452, 3, 'admin/helpers/scaffold', 'GET', '::1', '[]', '2024-10-17 00:48:49', '2024-10-17 00:48:49'),
(453, 3, 'admin', 'GET', '::1', '[]', '2024-10-17 00:48:50', '2024-10-17 00:48:50'),
(454, 3, 'admin/helpers/scaffold', 'GET', '::1', '[]', '2024-10-17 00:48:53', '2024-10-17 00:48:53'),
(455, 1, 'admin/auth/roles/2/edit', 'GET', '::1', '[]', '2024-10-17 00:48:55', '2024-10-17 00:48:55'),
(456, 1, 'admin/auth/roles/2', 'PUT', '::1', '{\"slug\":\"Author\",\"name\":\"Rajvant\",\"permissions\":[\"1\",null],\"_token\":\"3nRekcG0FXokbVhCee8lPYOGzERSj4I4oJVdrKcK\",\"_method\":\"PUT\"}', '2024-10-17 00:48:58', '2024-10-17 00:48:58'),
(457, 1, 'admin/auth/roles', 'GET', '::1', '[]', '2024-10-17 00:48:58', '2024-10-17 00:48:58'),
(458, 3, 'admin/helpers/scaffold', 'GET', '::1', '[]', '2024-10-17 00:49:00', '2024-10-17 00:49:00'),
(459, 3, 'admin/helpers/scaffold', 'GET', '::1', '[]', '2024-10-17 00:49:02', '2024-10-17 00:49:02'),
(460, 3, 'admin/blogs', 'GET', '::1', '[]', '2024-10-17 00:49:04', '2024-10-17 00:49:04'),
(461, 3, 'admin/news', 'GET', '::1', '[]', '2024-10-17 00:49:06', '2024-10-17 00:49:06'),
(462, 3, 'admin', 'GET', '::1', '[]', '2024-10-17 00:49:14', '2024-10-17 00:49:14'),
(463, 1, 'admin/auth/roles', 'GET', '::1', '[]', '2024-10-17 01:16:59', '2024-10-17 01:16:59'),
(464, 1, 'admin', 'GET', '::1', '[]', '2024-10-17 01:17:18', '2024-10-17 01:17:18'),
(465, 1, 'admin/blogs', 'GET', '::1', '[]', '2024-10-17 01:17:36', '2024-10-17 01:17:36'),
(466, 1, 'admin/blogs', 'GET', '::1', '[]', '2024-10-17 01:19:50', '2024-10-17 01:19:50'),
(467, 1, 'admin/auth/logout', 'GET', '::1', '[]', '2024-10-17 01:22:16', '2024-10-17 01:22:16'),
(468, 1, 'admin', 'GET', '::1', '[]', '2024-10-17 01:23:10', '2024-10-17 01:23:10'),
(469, 1, 'admin/blogs', 'GET', '::1', '[]', '2024-10-17 01:23:23', '2024-10-17 01:23:23'),
(470, 1, 'admin/news', 'GET', '::1', '[]', '2024-10-17 01:23:24', '2024-10-17 01:23:24'),
(471, 1, 'admin/news/create', 'GET', '::1', '[]', '2024-10-17 01:23:48', '2024-10-17 01:23:48'),
(472, 1, 'admin/news', 'POST', '::1', '{\"title\":\"Axis Ecorp to invest Rs 100 crore in holiday home project near upcoming Goa airport\",\"description\":\"New Delhi [India], January 8 (ANI): Axis Ecorp, a real estate firm focused on premium developments in holiday homes and secondary housing segment, on Saturday announced that it will invest Rs 100 crore in the development of hotel apartments and luxury serviced villas near the upcoming Goa airport.\\r\\n\\r\\n<a href=\\\"https:\\/\\/theprint.in\\/ani-press-releases\\/axis-ecorp-to-invest-rs-100-crore-in-holiday-home-project-near-upcoming-goa-airport\\/798831\\/\\\">Read More<\\/a>\",\"category\":\"News\",\"tags\":null,\"_token\":\"zig0IpK27lZI2o5N3zSTvw4agn87qHfl7z6XG33D\"}', '2024-10-17 01:25:41', '2024-10-17 01:25:41'),
(473, 1, 'admin/news', 'GET', '::1', '[]', '2024-10-17 01:25:41', '2024-10-17 01:25:41'),
(474, 1, 'admin/news/3/edit', 'GET', '::1', '[]', '2024-10-17 01:25:55', '2024-10-17 01:25:55'),
(475, 1, 'admin/news/3', 'PUT', '::1', '{\"title\":\"Axis Ecorp to invest Rs 100 crore in holiday home project near upcoming Goa airport\",\"description\":\"New Delhi [India], January 8 (ANI): Axis Ecorp, a real estate firm focused on premium developments in holiday homes and secondary housing segment, on Saturday announced that it will invest Rs 100 crore in the development of hotel apartments and luxury serviced villas near the upcoming Goa airport.\\r\\n\\r\\n<a href=\\\"https:\\/\\/theprint.in\\/ani-press-releases\\/axis-ecorp-to-invest-rs-100-crore-in-holiday-home-project-near-upcoming-goa-airport\\/798831\\/\\\">Read More<\\/a>\",\"category\":\"News\",\"tags\":null,\"_token\":\"zig0IpK27lZI2o5N3zSTvw4agn87qHfl7z6XG33D\",\"_method\":\"PUT\"}', '2024-10-17 01:26:07', '2024-10-17 01:26:07'),
(476, 1, 'admin/news', 'GET', '::1', '[]', '2024-10-17 01:26:07', '2024-10-17 01:26:07'),
(477, 1, 'admin/news/3/edit', 'GET', '::1', '[]', '2024-10-17 01:28:57', '2024-10-17 01:28:57'),
(478, 1, 'admin/news/3/edit', 'GET', '::1', '[]', '2024-10-17 02:18:08', '2024-10-17 02:18:08'),
(479, 1, 'admin/news', 'GET', '::1', '[]', '2024-10-17 02:18:11', '2024-10-17 02:18:11'),
(480, 1, 'admin', 'GET', '::1', '[]', '2024-10-18 01:27:05', '2024-10-18 01:27:05'),
(481, 1, 'admin/blogs', 'GET', '::1', '[]', '2024-10-18 01:27:11', '2024-10-18 01:27:11'),
(482, 1, 'admin/news', 'GET', '::1', '[]', '2024-10-18 01:27:13', '2024-10-18 01:27:13');

-- --------------------------------------------------------

--
-- Table structure for table `admin_permissions`
--

CREATE TABLE `admin_permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `slug` varchar(50) NOT NULL,
  `http_method` varchar(255) DEFAULT NULL,
  `http_path` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_permissions`
--

INSERT INTO `admin_permissions` (`id`, `name`, `slug`, `http_method`, `http_path`, `created_at`, `updated_at`) VALUES
(1, 'All permission', '*', '', '*', NULL, NULL),
(2, 'Dashboard', 'dashboard', 'GET', '/', NULL, NULL),
(3, 'Login', 'auth.login', '', '/auth/login\r\n/auth/logout', NULL, NULL),
(4, 'User setting', 'auth.setting', 'GET,PUT', '/auth/setting', NULL, NULL),
(5, 'Auth management', 'auth.management', '', '/auth/roles\r\n/auth/permissions\r\n/auth/menu\r\n/auth/logs', NULL, NULL),
(6, 'Admin helpers', 'ext.helpers', '', '/helpers/*', '2024-10-14 05:49:15', '2024-10-14 05:49:15');

-- --------------------------------------------------------

--
-- Table structure for table `admin_roles`
--

CREATE TABLE `admin_roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `slug` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_roles`
--

INSERT INTO `admin_roles` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'administrator', '2024-10-14 05:30:41', '2024-10-14 05:30:41'),
(2, 'Rajvant', 'Author', '2024-10-17 00:44:08', '2024-10-17 00:44:08');

-- --------------------------------------------------------

--
-- Table structure for table `admin_role_menu`
--

CREATE TABLE `admin_role_menu` (
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_role_menu`
--

INSERT INTO `admin_role_menu` (`role_id`, `menu_id`, `created_at`, `updated_at`) VALUES
(1, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `admin_role_permissions`
--

CREATE TABLE `admin_role_permissions` (
  `role_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_role_permissions`
--

INSERT INTO `admin_role_permissions` (`role_id`, `permission_id`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, NULL),
(2, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `admin_role_users`
--

CREATE TABLE `admin_role_users` (
  `role_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_role_users`
--

INSERT INTO `admin_role_users` (`role_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, NULL),
(2, 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE `admin_users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(190) NOT NULL,
  `password` varchar(60) NOT NULL,
  `name` varchar(255) NOT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`id`, `username`, `password`, `name`, `avatar`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', '$2y$10$/SI/J.sHvhv7sM7nilEtxOZ7588lIqRHneUB5VufhfRWkNLnFRfZe', 'Administrator', NULL, NULL, '2024-10-14 05:30:41', '2024-10-17 00:42:52'),
(3, 'Rajvant', '$2y$10$4QyZ0vA/MmYDrSHHHYtclOR.fhdfEl2S.VcwNP.5cy/xWxRONgszG', 'Rajvant', NULL, NULL, '2024-10-17 00:45:03', '2024-10-17 00:45:03');

-- --------------------------------------------------------

--
-- Table structure for table `admin_user_permissions`
--

CREATE TABLE `admin_user_permissions` (
  `user_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  `tags` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `image`, `description`, `category`, `tags`, `created_at`, `updated_at`) VALUES
(1, 'Amazing Facts That You Probably Didn’t Know About Sindhudurg', 'images/1-1.jpg', '#Fact 1: The district of Sindhudurg was established in 1981. This was done after taking out six Talukas from the original District, Ratnagiri. These Talukas were Kudal, Vengurla, Sawantwadi, Malvan, Kankavli and Devgad.\n\n#Fact 2: It was only later that Vaibhavwadi and Dodamarg came to be attached to District Sindhudurg. At present, there are eight Talukas in Sindhudurg District.\n\n#Fact 3: From the time of the great Chhatrapati Shivaji Maharaj, this place has a big historical significance.  \n\n#Fact 4: It is a place that is known for its great forts, pristine beaches and places of spiritual and religious interests.\n\n#Fact 5: While the beaches take up most of the attention at Sindhudurg, there are some majestic waterfalls too in the area. Amboli waterfall is the most notable one and attracts plenty of tourists.\n\n#Fact 6:  There are also a couple of scenic waterfalls in Dodamarg as well. Mangeli, Savdav and Napne are some of the prominent ones that are an absolute must-visit during the monsoon months.\n\nFact #7: It is amongst one of the cleanest districts in India.\n\n#Fact 8: Want to go Scuba diving in India? Well, Sindhudurg is the place to be!\n\n#Fact 9: The district will soon have an airport of its own. Construction of the runway is going on in full swing and the Chipi airport is expected to be reopen soon. The airport will give a fillip to tourism in the coastal district of Sindhudurg, which Maharashtra wants to develop as an alternative destination to Goa. At present, most tourists travel to Sindhudurg and nearby places by road or through Konkan Railway.\n\n#Fact 10: The language that is most commonly spoken in Sindhudurg Konkani. There is a distinct dialect of Konkani – Malvani that you can hear the locals communicate in. In addition, most people in the area are fluent in Marathi. Hindi & English is also widely understood in this part of the country.\n\n#Fact 11: Tropical fruits such as Alphonso mangoes, Cashews, Jamuns, Pineapples etc. are grown in this district.\n\n#Fact 12: Sindhudurg Fort is one of the major attractions of this district. It was built by Chhatrapati Shivaji Maharaj. It is an architectural marvel and its main entrance is built in a way that no one can pinpoint the entrance from outside.\n\n#Fact 13: The prestigious Taj Hotels of India have been allocated 54 hectares in Sindhudurg to set up a tourism centre.\n\n#Fact 14: Given the potential of the place, Axis Ecorp is also in the process of setting holiday homes that will help boost the tourism of the sector. Having land bank of 100 Acre the upcoming projects of the company include Axis Blues, Axis Yog Villas, Axis Lake City and Axis Lake City Plaza.\n\n#Fact 15: Malvani cuisine is the standard cuisine you will find in this place. Sindhudurg is a paradise for seafood lovers. If you are looking for some lip-smacking crabs, prawns and Pomfret, then Sindhudurg is the place to be. However, if you are a vegetarian, then you should not lose heart as you can get a lot of fresh locally sourced vegetables cooked in Malvani style.', 'Blogs', NULL, NULL, '2024-10-15 23:17:32');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` varchar(255) NOT NULL,
  `value` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2015_07_07_102904_parent_categories', 1),
(4, '2015_07_07_180033_subcategories', 1),
(5, '2015_07_09_162611_products', 1),
(6, '2015_07_10_110857_product_images', 1),
(7, '2015_07_10_154241_paypal', 1),
(8, '2015_07_10_191605_system', 1),
(9, '2015_07_10_205650_seo', 1),
(10, '2015_07_21_181815_orders', 1),
(11, '2015_07_23_111246_reviews', 1),
(12, '2015_07_25_112458_users', 2),
(13, '2015_08_02_094458_add_cashier_columns', 2),
(14, '2015_10_26_184424_coupons', 2),
(15, '2016_01_04_173148_create_admin_tables', 2),
(16, '2016_02_14_091633_update-settings', 2),
(17, '2016_08_07_143633_add_featured_to_products', 2),
(18, '2019_01_24_085153_create_jobs_table', 2),
(19, '2019_08_19_000000_create_failed_jobs_table', 2),
(20, '2019_12_14_000001_create_personal_access_tokens_table', 2),
(21, '2024_10_14_112341_create_News_table', 3),
(22, '2024_10_14_120645_create_blogs_table', 4),
(23, '2024_10_14_121402_create_test_table', 5),
(24, '2024_10_14_122015_create_blogs_table', 6),
(25, '2024_10_16_044524_create_blogs_table', 7),
(26, '2024_10_17_045359_create_news_table', 8);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  `tags` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `Date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `image`, `description`, `category`, `tags`, `created_at`, `updated_at`, `Date`) VALUES
(1, 'Axis Ecorp to invest Rs 100 crore in holiday home project near upcoming Goa airport – Devdiscourse', 'images/news.png', 'Axis Ecorp, a real estate firm focused on premium developments in holiday homes and secondary housing segment, on Saturday announced that it will invest Rs 100 crore in the development of hotel apartments and luxury serviced villas near the upcoming Goa airport. The project will be developed on a 25-acres of land located at Shindhudurg, Goa-Maharashtra border. It is merely 13 kms away from the upcoming MOPA International Airport in Goa.', 'News', NULL, NULL, '2024-10-16 23:32:27', '08-January-2022'),
(3, 'Axis Ecorp to invest Rs 100 crore in holiday home project near upcoming Goa airport', 'images/news_1.png', 'New Delhi [India], January 8 (ANI): Axis Ecorp, a real estate firm focused on premium developments in holiday homes and secondary housing segment, on Saturday announced that it will invest Rs 100 crore in the development of hotel apartments and luxury serviced villas near the upcoming Goa airport.\r\n\r\n<a href=\"https://theprint.in/ani-press-releases/axis-ecorp-to-invest-rs-100-crore-in-holiday-home-project-near-upcoming-goa-airport/798831/\">Read More</a>', 'News', NULL, '2024-10-17 01:25:41', '2024-10-17 01:26:07', '');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `product` varchar(255) NOT NULL,
  `client` varchar(255) NOT NULL,
  `phone` int(11) NOT NULL,
  `zip` int(11) NOT NULL,
  `city` varchar(255) NOT NULL,
  `total` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Processing',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `parent_categories`
--

CREATE TABLE `parent_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `paypal`
--

CREATE TABLE `paypal` (
  `client_id` varchar(255) NOT NULL,
  `secret` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `subcategory` varchar(255) NOT NULL,
  `price` double(8,2) NOT NULL,
  `offer_price` double(8,2) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `featured` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `product_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `review` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `seo`
--

CREATE TABLE `seo` (
  `keyword` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `google_analytics` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `parent` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `system`
--

CREATE TABLE `system` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `port` int(11) NOT NULL,
  `host` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `logo` varchar(255) NOT NULL,
  `mobile` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `facebook` varchar(255) NOT NULL,
  `linked_in` varchar(255) NOT NULL,
  `twitter` varchar(255) NOT NULL,
  `google_plus` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `zip` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `confirmed` tinyint(1) NOT NULL DEFAULT 0,
  `confirmation_code` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `stripe_active` tinyint(4) NOT NULL DEFAULT 0,
  `stripe_id` varchar(255) DEFAULT NULL,
  `stripe_subscription` varchar(255) DEFAULT NULL,
  `stripe_plan` varchar(100) DEFAULT NULL,
  `last_four` varchar(4) DEFAULT NULL,
  `trial_ends_at` timestamp NULL DEFAULT NULL,
  `subscription_ends_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `phone`, `address`, `zip`, `city`, `confirmed`, `confirmation_code`, `remember_token`, `created_at`, `updated_at`, `stripe_active`, `stripe_id`, `stripe_subscription`, `stripe_plan`, `last_four`, `trial_ends_at`, `subscription_ends_at`) VALUES
(1, 'Himanshu', 'himanshu.tyagi@axisecorp.com', '$2y$10$CNC7T6w5PSWJR3GVW1K4h.gWrECScvyu8z8ThErO5ieKHPpg73vd', 'Administrator', '9718108561', '', '', '', 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_menu`
--
ALTER TABLE `admin_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_operation_log`
--
ALTER TABLE `admin_operation_log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_operation_log_user_id_index` (`user_id`);

--
-- Indexes for table `admin_permissions`
--
ALTER TABLE `admin_permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admin_permissions_name_unique` (`name`),
  ADD UNIQUE KEY `admin_permissions_slug_unique` (`slug`);

--
-- Indexes for table `admin_roles`
--
ALTER TABLE `admin_roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admin_roles_name_unique` (`name`),
  ADD UNIQUE KEY `admin_roles_slug_unique` (`slug`);

--
-- Indexes for table `admin_role_menu`
--
ALTER TABLE `admin_role_menu`
  ADD KEY `admin_role_menu_role_id_menu_id_index` (`role_id`,`menu_id`);

--
-- Indexes for table `admin_role_permissions`
--
ALTER TABLE `admin_role_permissions`
  ADD KEY `admin_role_permissions_role_id_permission_id_index` (`role_id`,`permission_id`);

--
-- Indexes for table `admin_role_users`
--
ALTER TABLE `admin_role_users`
  ADD KEY `admin_role_users_role_id_user_id_index` (`role_id`,`user_id`);

--
-- Indexes for table `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admin_users_username_unique` (`username`);

--
-- Indexes for table `admin_user_permissions`
--
ALTER TABLE `admin_user_permissions`
  ADD KEY `admin_user_permissions_user_id_permission_id_index` (`user_id`,`permission_id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_reserved_reserved_at_index` (`queue`,`reserved`,`reserved_at`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parent_categories`
--
ALTER TABLE `parent_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `system`
--
ALTER TABLE `system`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_menu`
--
ALTER TABLE `admin_menu`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `admin_operation_log`
--
ALTER TABLE `admin_operation_log`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=483;

--
-- AUTO_INCREMENT for table `admin_permissions`
--
ALTER TABLE `admin_permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `admin_roles`
--
ALTER TABLE `admin_roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `parent_categories`
--
ALTER TABLE `parent_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `system`
--
ALTER TABLE `system`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
