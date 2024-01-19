-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 19, 2024 at 07:43 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel_auth`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_logs`
--

CREATE TABLE `activity_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `activity_logs`
--

INSERT INTO `activity_logs` (`id`, `name`, `email`, `description`, `date_time`, `created_at`, `updated_at`) VALUES
(15, 'macamoelias99@gmail.com', 'macamoelias99@gmail.com', 'Iniciou sua sessão ou fez Login', 'Thu, Jul 13, 2023 7:17 PM', NULL, NULL),
(16, 'macamoelias99@gmail.com', 'macamoelias99@gmail.com', 'Iniciou sua sessão ou fez Login', 'Fri, Jul 14, 2023 8:37 AM', NULL, NULL),
(17, 'Elias Macamo', 'macamoelias99@gmail.com', 'Terminou sua sessão ou fez Logout', 'Fri, Jul 14, 2023 10:32 AM', NULL, NULL),
(18, 'user@gmail.com', 'user@gmail.com', 'Iniciou sua sessão ou fez Login', 'Fri, Jul 14, 2023 10:32 AM', NULL, NULL),
(19, 'user', 'user@gmail.com', 'Terminou sua sessão ou fez Logout', 'Fri, Jul 14, 2023 10:32 AM', NULL, NULL),
(21, 'Lídia Macamo', 'admin@gmail.com', 'Terminou sua sessão ou fez Logout', 'Fri, Jul 14, 2023 11:09 AM', NULL, NULL),
(27, 'admin@gmail.com', 'admin@gmail.com', 'Iniciou sua sessão ou fez Login', 'Tue, Jul 18, 2023 11:18 AM', NULL, NULL),
(30, 'Lídia Macamo', 'admin@gmail.com', 'Terminou sua sessão ou fez Logout', 'Tue, Jul 18, 2023 2:57 PM', NULL, NULL),
(32, 'admin@gmail.com', 'admin@gmail.com', 'Iniciou sua sessão ou fez Login', 'Tue, Jul 18, 2023 6:23 PM', NULL, NULL),
(36, 'Lídia Macamo', 'admin@gmail.com', 'Terminou sua sessão ou fez Logout', 'Wed, Jul 19, 2023 9:19 PM', NULL, NULL),
(41, 'Lídia Macamo', 'admin@gmail.com', 'Terminou sua sessão ou fez Logout', 'Thu, Jul 20, 2023 7:12 PM', NULL, NULL),
(42, 'admin@gmail.com', 'admin@gmail.com', 'Iniciou sua sessão ou fez Login', 'Fri, Jul 21, 2023 6:18 AM', NULL, NULL),
(43, 'admin@gmail.com', 'admin@gmail.com', 'Iniciou sua sessão ou fez Login', 'Sat, Jul 22, 2023 7:04 AM', NULL, NULL),
(44, 'Lídia Macamo', 'admin@gmail.com', 'Terminou sua sessão ou fez Logout', 'Sat, Jul 22, 2023 7:13 AM', NULL, NULL),
(45, 'admin@gmail.com', 'admin@gmail.com', 'Iniciou sua sessão ou fez Login', 'Sat, Jul 22, 2023 7:14 AM', NULL, NULL),
(46, 'Lídia Macamo', 'admin@gmail.com', 'Terminou sua sessão ou fez Logout', 'Sat, Jul 22, 2023 10:10 AM', NULL, NULL),
(47, 'admin@gmail.com', 'admin@gmail.com', 'Iniciou sua sessão ou fez Login', 'Sat, Jul 22, 2023 6:24 PM', NULL, NULL),
(48, 'admin@gmail.com', 'admin@gmail.com', 'Iniciou sua sessão ou fez Login', 'Sun, Jul 23, 2023 5:36 AM', NULL, NULL),
(49, 'Lídia Macamo', 'admin@gmail.com', 'Terminou sua sessão ou fez Logout', 'Sun, Jul 23, 2023 5:51 AM', NULL, NULL),
(50, 'macamoelias99@gmail.com', 'macamoelias99@gmail.com', 'Iniciou sua sessão ou fez Login', 'Sun, Jul 23, 2023 5:52 AM', NULL, NULL),
(51, 'admin@gmail.com', 'admin@gmail.com', 'Iniciou sua sessão ou fez Login', 'Sun, Jul 23, 2023 2:58 PM', NULL, NULL),
(52, 'admin@gmail.com', 'admin@gmail.com', 'Iniciou sua sessão ou fez Login', 'Sun, Jul 23, 2023 5:05 PM', NULL, NULL),
(53, 'admin@gmail.com', 'admin@gmail.com', 'Iniciou sua sessão ou fez Login', 'Mon, Jul 24, 2023 7:48 AM', NULL, NULL),
(54, 'admin@gmail.com', 'admin@gmail.com', 'Iniciou sua sessão ou fez Login', 'Mon, Jul 24, 2023 2:42 PM', NULL, NULL),
(55, 'admin@gmail.com', 'admin@gmail.com', 'Iniciou sua sessão ou fez Login', 'Mon, Jul 24, 2023 6:22 PM', NULL, NULL),
(56, 'Lídia Macamo', 'admin@gmail.com', 'Terminou sua sessão ou fez Logout', 'Mon, Jul 24, 2023 8:36 PM', NULL, NULL),
(57, 'admin@gmail.com', 'admin@gmail.com', 'Iniciou sua sessão ou fez Login', 'Tue, Jul 25, 2023 3:10 PM', NULL, NULL),
(58, 'admin@gmail.com', 'admin@gmail.com', 'Iniciou sua sessão ou fez Login', 'Wed, Jul 26, 2023 4:35 PM', NULL, NULL),
(59, 'admin@gmail.com', 'admin@gmail.com', 'Iniciou sua sessão ou fez Login', 'Sat, Jul 29, 2023 12:16 PM', NULL, NULL),
(60, 'Lídia Macamo', 'admin@gmail.com', 'Terminou sua sessão ou fez Logout', 'Sat, Jul 29, 2023 12:16 PM', NULL, NULL),
(61, 'admin@gmail.com', 'admin@gmail.com', 'Iniciou sua sessão ou fez Login', 'Sat, Jul 29, 2023 12:17 PM', NULL, NULL),
(62, 'Lídia Macamo', 'admin@gmail.com', 'Terminou sua sessão ou fez Logout', 'Sat, Jul 29, 2023 12:17 PM', NULL, NULL),
(63, 'admin@gmail.com', 'admin@gmail.com', 'Iniciou sua sessão ou fez Login', 'Sat, Jul 29, 2023 12:18 PM', NULL, NULL),
(64, 'Lídia Macamo', 'admin@gmail.com', 'Terminou sua sessão ou fez Logout', 'Sat, Jul 29, 2023 12:28 PM', NULL, NULL),
(65, 'admin@gmail.com', 'admin@gmail.com', 'Iniciou sua sessão ou fez Login', 'Sat, Jul 29, 2023 12:29 PM', NULL, NULL),
(66, 'admin@gmail.com', 'admin@gmail.com', 'Iniciou sua sessão ou fez Login', 'Sun, Jul 30, 2023 2:02 PM', NULL, NULL),
(67, 'admin@gmail.com', 'admin@gmail.com', 'Iniciou sua sessão ou fez Login', 'Sun, Jul 30, 2023 5:15 PM', NULL, NULL),
(68, 'Lídia Macamo', 'admin@gmail.com', 'Terminou sua sessão ou fez Logout', 'Sun, Jul 30, 2023 6:29 PM', NULL, NULL),
(69, 'admin@gmail.com', 'admin@gmail.com', 'Iniciou sua sessão ou fez Login', 'Sun, Jul 30, 2023 6:31 PM', NULL, NULL),
(70, 'Lídia Macamo', 'admin@gmail.com', 'Terminou sua sessão ou fez Logout', 'Sun, Jul 30, 2023 8:01 PM', NULL, NULL),
(71, 'admin@gmail.com', 'admin@gmail.com', 'Iniciou sua sessão ou fez Login', 'Mon, Jul 31, 2023 6:06 AM', NULL, NULL),
(72, 'admin@gmail.com', 'admin@gmail.com', 'Iniciou sua sessão ou fez Login', 'Mon, Jul 31, 2023 7:34 PM', NULL, NULL),
(73, 'admin@gmail.com', 'admin@gmail.com', 'Iniciou sua sessão ou fez Login', 'Tue, Aug 1, 2023 4:23 PM', NULL, NULL),
(74, 'admin@gmail.com', 'admin@gmail.com', 'Iniciou sua sessão ou fez Login', 'Wed, Aug 2, 2023 6:31 PM', NULL, NULL),
(75, 'admin@gmail.com', 'admin@gmail.com', 'Iniciou sua sessão ou fez Login', 'Thu, Aug 3, 2023 7:21 AM', NULL, NULL),
(76, 'admin@gmail.com', 'admin@gmail.com', 'Iniciou sua sessão ou fez Login', 'Mon, Aug 7, 2023 10:58 PM', NULL, NULL),
(77, 'admin@gmail.com', 'admin@gmail.com', 'Iniciou sua sessão ou fez Login', 'Tue, Aug 8, 2023 8:45 AM', NULL, NULL),
(78, 'admin@gmail.com', 'admin@gmail.com', 'Iniciou sua sessão ou fez Login', 'Fri, Aug 11, 2023 4:09 PM', NULL, NULL),
(79, 'admin@gmail.com', 'admin@gmail.com', 'Iniciou sua sessão ou fez Login', 'Sat, Aug 12, 2023 8:18 AM', NULL, NULL),
(80, 'admin@gmail.com', 'admin@gmail.com', 'Iniciou sua sessão ou fez Login', 'Sat, Aug 12, 2023 9:02 PM', NULL, NULL),
(81, 'admin@gmail.com', 'admin@gmail.com', 'Iniciou sua sessão ou fez Login', 'Sun, Aug 13, 2023 7:00 AM', NULL, NULL),
(82, 'admin@gmail.com', 'admin@gmail.com', 'Iniciou sua sessão ou fez Login', 'Sun, Aug 13, 2023 5:55 PM', NULL, NULL),
(83, 'admin@gmail.com', 'admin@gmail.com', 'Iniciou sua sessão ou fez Login', 'Thu, Aug 17, 2023 12:08 PM', NULL, NULL),
(84, 'admin@gmail.com', 'admin@gmail.com', 'Iniciou sua sessão ou fez Login', 'Thu, Aug 17, 2023 5:20 PM', NULL, NULL),
(85, 'admin@gmail.com', 'admin@gmail.com', 'Iniciou sua sessão ou fez Login', 'Sun, Aug 20, 2023 9:02 AM', NULL, NULL),
(86, 'admin@gmail.com', 'admin@gmail.com', 'Iniciou sua sessão ou fez Login', 'Sun, Aug 20, 2023 5:57 PM', NULL, NULL),
(87, 'admin@gmail.com', 'admin@gmail.com', 'Iniciou sua sessão ou fez Login', 'Tue, Aug 22, 2023 4:45 AM', NULL, NULL),
(88, 'admin@gmail.com', 'admin@gmail.com', 'Iniciou sua sessão ou fez Login', 'Tue, Aug 22, 2023 6:31 AM', NULL, NULL),
(89, 'admin@gmail.com', 'admin@gmail.com', 'Iniciou sua sessão ou fez Login', 'Tue, Aug 22, 2023 9:39 AM', NULL, NULL),
(90, 'admin@gmail.com', 'admin@gmail.com', 'Iniciou sua sessão ou fez Login', 'Tue, Aug 22, 2023 2:55 PM', NULL, NULL),
(91, 'admin@gmail.com', 'admin@gmail.com', 'Iniciou sua sessão ou fez Login', 'Tue, Aug 22, 2023 7:41 PM', NULL, NULL),
(92, 'admin@gmail.com', 'admin@gmail.com', 'Iniciou sua sessão ou fez Login', 'Wed, Aug 23, 2023 3:36 AM', NULL, NULL),
(93, 'admin@gmail.com', 'admin@gmail.com', 'Iniciou sua sessão ou fez Login', 'Wed, Aug 23, 2023 7:02 PM', NULL, NULL),
(94, 'admin@gmail.com', 'admin@gmail.com', 'Iniciou sua sessão ou fez Login', 'Thu, Aug 24, 2023 11:07 AM', NULL, NULL),
(95, 'admin@gmail.com', 'admin@gmail.com', 'Iniciou sua sessão ou fez Login', 'Fri, Aug 25, 2023 5:42 AM', NULL, NULL),
(96, 'admin@gmail.com', 'admin@gmail.com', 'Iniciou sua sessão ou fez Login', 'Fri, Aug 25, 2023 10:59 AM', NULL, NULL),
(97, 'admin@gmail.com', 'admin@gmail.com', 'Iniciou sua sessão ou fez Login', 'Fri, Aug 25, 2023 3:05 PM', NULL, NULL),
(98, 'Lídia Macamo', 'admin@gmail.com', 'Terminou sua sessão ou fez Logout', 'Fri, Aug 25, 2023 5:02 PM', NULL, NULL),
(99, 'admin@gmail.com', 'admin@gmail.com', 'Iniciou sua sessão ou fez Login', 'Fri, Aug 25, 2023 5:02 PM', NULL, NULL),
(100, 'admin@gmail.com', 'admin@gmail.com', 'Iniciou sua sessão ou fez Login', 'Sat, Aug 26, 2023 8:52 AM', NULL, NULL),
(101, 'admin@gmail.com', 'admin@gmail.com', 'Iniciou sua sessão ou fez Login', 'Sun, Aug 27, 2023 4:50 PM', NULL, NULL),
(102, 'Lídia Macamo', 'admin@gmail.com', 'Terminou sua sessão ou fez Logout', 'Sun, Aug 27, 2023 6:20 PM', NULL, NULL),
(103, 'admin@gmail.com', 'admin@gmail.com', 'Iniciou sua sessão ou fez Login', 'Sun, Aug 27, 2023 6:21 PM', NULL, NULL),
(104, 'admin@gmail.com', 'admin@gmail.com', 'Iniciou sua sessão ou fez Login', 'Mon, Aug 28, 2023 10:55 AM', NULL, NULL),
(105, 'admin@gmail.com', 'admin@gmail.com', 'Iniciou sua sessão ou fez Login', 'Mon, Aug 28, 2023 3:56 PM', NULL, NULL),
(106, 'admin@gmail.com', 'admin@gmail.com', 'Iniciou sua sessão ou fez Login', 'Tue, Aug 29, 2023 7:53 AM', NULL, NULL),
(107, 'admin@gmail.com', 'admin@gmail.com', 'Iniciou sua sessão ou fez Login', 'Tue, Aug 29, 2023 5:38 PM', NULL, NULL),
(108, 'Lídia Macamo', 'admin@gmail.com', 'Terminou sua sessão ou fez Logout', 'Tue, Aug 29, 2023 9:40 PM', NULL, NULL),
(109, 'admin@gmail.com', 'admin@gmail.com', 'Iniciou sua sessão ou fez Login', 'Wed, Aug 30, 2023 11:15 AM', NULL, NULL),
(110, 'admin@gmail.com', 'admin@gmail.com', 'Iniciou sua sessão ou fez Login', 'Wed, Aug 30, 2023 5:37 PM', NULL, NULL),
(111, 'admin@gmail.com', 'admin@gmail.com', 'Iniciou sua sessão ou fez Login', 'Thu, Aug 31, 2023 11:54 AM', NULL, NULL),
(112, 'admin@gmail.com', 'admin@gmail.com', 'Iniciou sua sessão ou fez Login', 'Fri, Sep 1, 2023 9:23 AM', NULL, NULL),
(113, 'admin@gmail.com', 'admin@gmail.com', 'Iniciou sua sessão ou fez Login', 'Fri, Sep 1, 2023 9:36 PM', NULL, NULL),
(114, 'admin@gmail.com', 'admin@gmail.com', 'Iniciou sua sessão ou fez Login', 'Sun, Sep 3, 2023 8:06 PM', NULL, NULL),
(115, 'admin@gmail.com', 'admin@gmail.com', 'Iniciou sua sessão ou fez Login', 'Mon, Sep 4, 2023 6:39 AM', NULL, NULL),
(116, 'admin@gmail.com', 'admin@gmail.com', 'Iniciou sua sessão ou fez Login', 'Thu, Sep 7, 2023 7:27 AM', NULL, NULL),
(117, 'admin@gmail.com', 'admin@gmail.com', 'Iniciou sua sessão ou fez Login', 'Thu, Sep 7, 2023 12:01 PM', NULL, NULL),
(118, 'admin@gmail.com', 'admin@gmail.com', 'Iniciou sua sessão ou fez Login', 'Sat, Sep 9, 2023 11:08 AM', NULL, NULL),
(119, 'admin@gmail.com', 'admin@gmail.com', 'Iniciou sua sessão ou fez Login', 'Sat, Sep 9, 2023 1:52 PM', NULL, NULL),
(120, 'admin@gmail.com', 'admin@gmail.com', 'Iniciou sua sessão ou fez Login', 'Sat, Sep 9, 2023 3:43 PM', NULL, NULL),
(121, 'admin@gmail.com', 'admin@gmail.com', 'Iniciou sua sessão ou fez Login', 'Sat, Sep 9, 2023 7:10 PM', NULL, NULL),
(122, 'admin@gmail.com', 'admin@gmail.com', 'Iniciou sua sessão ou fez Login', 'Mon, Sep 25, 2023 7:16 PM', NULL, NULL),
(123, 'admin@gmail.com', 'admin@gmail.com', 'Iniciou sua sessão ou fez Login', 'Thu, Sep 28, 2023 7:51 PM', NULL, NULL),
(124, 'admin@gmail.com', 'admin@gmail.com', 'Iniciou sua sessão ou fez Login', 'Sat, Oct 21, 2023 6:10 AM', NULL, NULL),
(125, 'admin@gmail.com', 'admin@gmail.com', 'Iniciou sua sessão ou fez Login', 'Sat, Oct 21, 2023 8:38 AM', NULL, NULL),
(126, 'admin@gmail.com', 'admin@gmail.com', 'Iniciou sua sessão ou fez Login', 'Mon, Oct 23, 2023 4:32 AM', NULL, NULL),
(127, 'admin@gmail.com', 'admin@gmail.com', 'Iniciou sua sessão ou fez Login', 'Mon, Oct 23, 2023 9:36 AM', NULL, NULL),
(128, 'admin@gmail.com', 'admin@gmail.com', 'Iniciou sua sessão ou fez Login', 'Tue, Oct 24, 2023 4:32 AM', NULL, NULL),
(129, 'admin@gmail.com', 'admin@gmail.com', 'Iniciou sua sessão ou fez Login', 'Tue, Oct 24, 2023 7:48 PM', NULL, NULL),
(130, 'admin@gmail.com', 'admin@gmail.com', 'Iniciou sua sessão ou fez Login', 'Wed, Oct 25, 2023 5:30 AM', NULL, NULL),
(131, 'admin@gmail.com', 'admin@gmail.com', 'Iniciou sua sessão ou fez Login', 'Wed, Oct 25, 2023 11:49 AM', NULL, NULL),
(132, 'admin@gmail.com', 'admin@gmail.com', 'Iniciou sua sessão ou fez Login', 'Thu, Oct 26, 2023 6:38 AM', NULL, NULL),
(133, 'admin@gmail.com', 'admin@gmail.com', 'Iniciou sua sessão ou fez Login', 'Thu, Oct 26, 2023 9:46 AM', NULL, NULL),
(134, 'admin@gmail.com', 'admin@gmail.com', 'Iniciou sua sessão ou fez Login', 'Fri, Oct 27, 2023 4:16 AM', NULL, NULL),
(135, 'admin@gmail.com', 'admin@gmail.com', 'Iniciou sua sessão ou fez Login', 'Fri, Oct 27, 2023 4:43 AM', NULL, NULL),
(136, 'Lídia Macamo', 'admin@gmail.com', 'Terminou sua sessão ou fez Logout', 'Fri, Oct 27, 2023 5:13 AM', NULL, NULL),
(137, 'Lídia Macamo', 'admin@gmail.com', 'Terminou sua sessão ou fez Logout', 'Fri, Oct 27, 2023 5:13 AM', NULL, NULL),
(138, 'admin@gmail.com', 'admin@gmail.com', 'Iniciou sua sessão ou fez Login', 'Fri, Oct 27, 2023 5:14 AM', NULL, NULL),
(139, 'Lídia Macamo', 'admin@gmail.com', 'Terminou sua sessão ou fez Logout', 'Fri, Oct 27, 2023 8:07 AM', NULL, NULL),
(140, 'admin@gmail.com', 'admin@gmail.com', 'Iniciou sua sessão ou fez Login', 'Fri, Oct 27, 2023 8:18 AM', NULL, NULL),
(141, 'Lídia Macamo', 'admin@gmail.com', 'Terminou sua sessão ou fez Logout', 'Fri, Oct 27, 2023 8:28 AM', NULL, NULL),
(142, 'admin@gmail.com', 'admin@gmail.com', 'Iniciou sua sessão ou fez Login', 'Fri, Oct 27, 2023 8:30 AM', NULL, NULL),
(143, 'admin@gmail.com', 'admin@gmail.com', 'Iniciou sua sessão ou fez Login', 'Sat, Oct 28, 2023 8:19 AM', NULL, NULL),
(144, 'admin@gmail.com', 'admin@gmail.com', 'Iniciou sua sessão ou fez Login', 'Sat, Oct 28, 2023 7:50 PM', NULL, NULL),
(145, 'admin@gmail.com', 'admin@gmail.com', 'Iniciou sua sessão ou fez Login', 'Sun, Oct 29, 2023 9:20 AM', NULL, NULL),
(146, 'Lídia Macamo', 'admin@gmail.com', 'Terminou sua sessão ou fez Logout', 'Sun, Oct 29, 2023 11:08 AM', NULL, NULL),
(147, 'admin@gmail.com', 'admin@gmail.com', 'Iniciou sua sessão ou fez Login', 'Sun, Oct 29, 2023 11:31 AM', NULL, NULL),
(148, 'admin@gmail.com', 'admin@gmail.com', 'Iniciou sua sessão ou fez Login', 'Sun, Oct 29, 2023 3:07 PM', NULL, NULL),
(149, 'admin@gmail.com', 'admin@gmail.com', 'Iniciou sua sessão ou fez Login', 'Sun, Oct 29, 2023 8:08 PM', NULL, NULL),
(150, 'Lídia Macamo', 'admin@gmail.com', 'Terminou sua sessão ou fez Logout', 'Sun, Oct 29, 2023 10:21 PM', NULL, NULL),
(151, 'admin@gmail.com', 'admin@gmail.com', 'Iniciou sua sessão ou fez Login', 'Sun, Oct 29, 2023 10:24 PM', NULL, NULL),
(152, 'Lídia Macamo', 'admin@gmail.com', 'Terminou sua sessão ou fez Logout', 'Sun, Oct 29, 2023 10:33 PM', NULL, NULL),
(153, 'admin@gmail.com', 'admin@gmail.com', 'Iniciou sua sessão ou fez Login', 'Sun, Oct 29, 2023 10:34 PM', NULL, NULL),
(154, 'Lídia Macamo', 'admin@gmail.com', 'Terminou sua sessão ou fez Logout', 'Sun, Oct 29, 2023 10:35 PM', NULL, NULL),
(155, 'admin@gmail.com', 'admin@gmail.com', 'Iniciou sua sessão ou fez Login', 'Sun, Oct 29, 2023 10:36 PM', NULL, NULL),
(156, 'admin@gmail.com', 'admin@gmail.com', 'Iniciou sua sessão ou fez Login', 'Tue, Oct 31, 2023 7:14 AM', NULL, NULL),
(157, 'admin@gmail.com', 'admin@gmail.com', 'Iniciou sua sessão ou fez Login', 'Tue, Oct 31, 2023 1:43 PM', NULL, NULL),
(158, 'admin@gmail.com', 'admin@gmail.com', 'Iniciou sua sessão ou fez Login', 'Wed, Nov 1, 2023 6:46 AM', NULL, NULL),
(159, 'admin@gmail.com', 'admin@gmail.com', 'Iniciou sua sessão ou fez Login', 'Wed, Nov 1, 2023 3:00 PM', NULL, NULL),
(160, 'admin@gmail.com', 'admin@gmail.com', 'Iniciou sua sessão ou fez Login', 'Thu, Nov 2, 2023 4:54 AM', NULL, NULL),
(161, 'admin@gmail.com', 'admin@gmail.com', 'Iniciou sua sessão ou fez Login', 'Thu, Nov 2, 2023 8:50 AM', NULL, NULL),
(162, 'admin@gmail.com', 'admin@gmail.com', 'Iniciou sua sessão ou fez Login', 'Thu, Nov 2, 2023 8:38 PM', NULL, NULL),
(163, 'admin@gmail.com', 'admin@gmail.com', 'Iniciou sua sessão ou fez Login', 'Fri, Nov 3, 2023 8:17 AM', NULL, NULL),
(164, 'admin@gmail.com', 'admin@gmail.com', 'Iniciou sua sessão ou fez Login', 'Fri, Nov 3, 2023 3:19 PM', NULL, NULL),
(165, 'admin@gmail.com', 'admin@gmail.com', 'Iniciou sua sessão ou fez Login', 'Sat, Nov 4, 2023 12:32 PM', NULL, NULL),
(166, 'admin@gmail.com', 'admin@gmail.com', 'Iniciou sua sessão ou fez Login', 'Mon, Nov 6, 2023 7:09 AM', NULL, NULL),
(167, 'admin@gmail.com', 'admin@gmail.com', 'Iniciou sua sessão ou fez Login', 'Mon, Nov 6, 2023 7:14 PM', NULL, NULL),
(168, 'admin@gmail.com', 'admin@gmail.com', 'Iniciou sua sessão ou fez Login', 'Tue, Nov 7, 2023 9:05 AM', NULL, NULL),
(169, 'admin@gmail.com', 'admin@gmail.com', 'Iniciou sua sessão ou fez Login', 'Tue, Nov 7, 2023 12:26 PM', NULL, NULL),
(170, 'admin@gmail.com', 'admin@gmail.com', 'Iniciou sua sessão ou fez Login', 'Wed, Nov 8, 2023 6:53 AM', NULL, NULL),
(171, 'admin@gmail.com', 'admin@gmail.com', 'Iniciou sua sessão ou fez Login', 'Thu, Nov 9, 2023 6:41 AM', NULL, NULL),
(172, 'admin@gmail.com', 'admin@gmail.com', 'Iniciou sua sessão ou fez Login', 'Sun, Nov 12, 2023 4:37 PM', NULL, NULL),
(173, 'Lídia Macamo', 'admin@gmail.com', 'Terminou sua sessão ou fez Logout', 'Sun, Nov 12, 2023 4:39 PM', NULL, NULL),
(174, 'admin@gmail.com', 'admin@gmail.com', 'Iniciou sua sessão ou fez Login', 'Sat, Nov 25, 2023 9:33 AM', NULL, NULL),
(175, 'Lídia Macamo', 'admin@gmail.com', 'Terminou sua sessão ou fez Logout', 'Sat, Nov 25, 2023 10:06 AM', NULL, NULL),
(176, 'admin@gmail.com', 'admin@gmail.com', 'Iniciou sua sessão ou fez Login', 'Mon, Nov 27, 2023 12:23 PM', NULL, NULL),
(177, 'Lídia Macamo', 'admin@gmail.com', 'Terminou sua sessão ou fez Logout', 'Mon, Nov 27, 2023 12:25 PM', NULL, NULL),
(178, 'admin@gmail.com', 'admin@gmail.com', 'Iniciou sua sessão ou fez Login', 'Mon, Nov 27, 2023 8:02 PM', NULL, NULL),
(179, 'admin@gmail.com', 'admin@gmail.com', 'Iniciou sua sessão ou fez Login', 'Tue, Nov 28, 2023 1:11 PM', NULL, NULL),
(180, 'Lídia Macamo', 'admin@gmail.com', 'Terminou sua sessão ou fez Logout', 'Tue, Nov 28, 2023 1:22 PM', NULL, NULL),
(181, 'admin@gmail.com', 'admin@gmail.com', 'Iniciou sua sessão ou fez Login', 'Thu, Nov 30, 2023 4:08 PM', NULL, NULL),
(182, 'admin@gmail.com', 'admin@gmail.com', 'Iniciou sua sessão ou fez Login', 'Thu, Dec 7, 2023 7:12 PM', NULL, NULL),
(183, 'admin@gmail.com', 'admin@gmail.com', 'Iniciou sua sessão ou fez Login', 'Thu, Dec 14, 2023 9:45 AM', NULL, NULL),
(184, 'admin@gmail.com', 'admin@gmail.com', 'Iniciou sua sessão ou fez Login', 'Thu, Dec 14, 2023 2:21 PM', NULL, NULL),
(185, 'admin@gmail.com', 'admin@gmail.com', 'Iniciou sua sessão ou fez Login', 'Fri, Dec 15, 2023 9:31 AM', NULL, NULL),
(186, 'admin@gmail.com', 'admin@gmail.com', 'Iniciou sua sessão ou fez Login', 'Wed, Dec 20, 2023 4:04 AM', NULL, NULL),
(187, 'admin@gmail.com', 'admin@gmail.com', 'Iniciou sua sessão ou fez Login', 'Wed, Dec 20, 2023 8:49 PM', NULL, NULL),
(188, 'admin@gmail.com', 'admin@gmail.com', 'Iniciou sua sessão ou fez Login', 'Thu, Dec 21, 2023 12:42 PM', NULL, NULL),
(189, 'admin@gmail.com', 'admin@gmail.com', 'Iniciou sua sessão ou fez Login', 'Fri, Dec 22, 2023 12:29 AM', NULL, NULL),
(190, 'admin@gmail.com', 'admin@gmail.com', 'Iniciou sua sessão ou fez Login', 'Fri, Dec 22, 2023 9:44 AM', NULL, NULL),
(191, 'admin@gmail.com', 'admin@gmail.com', 'Iniciou sua sessão ou fez Login', 'Sat, Dec 23, 2023 1:17 AM', NULL, NULL),
(192, 'admin@gmail.com', 'admin@gmail.com', 'Iniciou sua sessão ou fez Login', 'Sun, Dec 24, 2023 7:57 AM', NULL, NULL),
(193, 'admin@gmail.com', 'admin@gmail.com', 'Iniciou sua sessão ou fez Login', 'Sun, Dec 24, 2023 12:44 PM', NULL, NULL),
(194, 'admin@gmail.com', 'admin@gmail.com', 'Iniciou sua sessão ou fez Login', 'Mon, Dec 25, 2023 4:58 AM', NULL, NULL),
(195, 'admin@gmail.com', 'admin@gmail.com', 'Iniciou sua sessão ou fez Login', 'Tue, Dec 26, 2023 4:57 AM', NULL, NULL),
(196, 'admin@gmail.com', 'admin@gmail.com', 'Iniciou sua sessão ou fez Login', 'Wed, Dec 27, 2023 4:03 AM', NULL, NULL),
(197, 'admin@gmail.com', 'admin@gmail.com', 'Iniciou sua sessão ou fez Login', 'Wed, Dec 27, 2023 3:29 PM', NULL, NULL),
(198, 'admin@gmail.com', 'admin@gmail.com', 'Iniciou sua sessão ou fez Login', 'Thu, Dec 28, 2023 11:50 AM', NULL, NULL),
(199, 'admin@gmail.com', 'admin@gmail.com', 'Iniciou sua sessão ou fez Login', 'Fri, Dec 29, 2023 7:20 AM', NULL, NULL),
(200, 'admin@gmail.com', 'admin@gmail.com', 'Iniciou sua sessão ou fez Login', 'Sun, Dec 31, 2023 9:18 AM', NULL, NULL),
(201, 'admin@gmail.com', 'admin@gmail.com', 'Iniciou sua sessão ou fez Login', 'Sun, Dec 31, 2023 1:29 PM', NULL, NULL),
(202, 'admin@gmail.com', 'admin@gmail.com', 'Iniciou sua sessão ou fez Login', 'Tue, Jan 2, 2024 5:26 AM', NULL, NULL),
(203, 'admin@gmail.com', 'admin@gmail.com', 'Iniciou sua sessão ou fez Login', 'Wed, Jan 3, 2024 6:26 AM', NULL, NULL),
(204, 'admin@gmail.com', 'admin@gmail.com', 'Iniciou sua sessão ou fez Login', 'Wed, Jan 3, 2024 7:03 AM', NULL, NULL),
(205, 'admin@gmail.com', 'admin@gmail.com', 'Iniciou sua sessão ou fez Login', 'Thu, Jan 4, 2024 6:41 AM', NULL, NULL),
(206, 'admin@gmail.com', 'admin@gmail.com', 'Iniciou sua sessão ou fez Login', 'Thu, Jan 18, 2024 10:06 AM', NULL, NULL),
(207, 'admin@gmail.com', 'admin@gmail.com', 'Iniciou sua sessão ou fez Login', 'Fri, Jan 19, 2024 5:10 AM', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `atribui_objetivos`
--

CREATE TABLE `atribui_objetivos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cargo_funcionario` int(11) DEFAULT NULL,
  `dep_funcionario` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `missao_funcionario` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `local_funcionario` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reporte_funcionario` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `objetivo_atribuicao` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nome_funcionario` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `atribui_objetivos`
--

INSERT INTO `atribui_objetivos` (`id`, `cargo_funcionario`, `dep_funcionario`, `missao_funcionario`, `local_funcionario`, `reporte_funcionario`, `objetivo_atribuicao`, `nome_funcionario`, `created_at`, `updated_at`) VALUES
(17, 5, 'Contabilidade', 'Consertar máquinas pesadas', 'Banco de Moçambique', 'Teste', NULL, 'Marcus Rashford', '2023-12-21 12:12:11', '2023-12-21 12:12:11'),
(18, 3, 'Recursos Humanos', 'Gerir recursos humanos', 'Sede provincial', 'Teste', NULL, 'Kyle Jordan', '2023-12-21 12:18:04', '2023-12-21 12:18:04'),
(19, 3, 'Contabilidade', 'Escrever scripts em C#', 'Sede provincial', 'teste', NULL, 'Kyle Jordan', '2023-12-26 10:38:24', '2023-12-26 10:38:24'),
(20, 3, 'Gestão Comercial', 'Gerir clientes', 'Marracuene', 'Reporte 1', NULL, 'Calvet Lewin', '2023-12-26 10:39:28', '2023-12-26 10:39:28'),
(21, 1, 'Tecnologia de Informação', 'Escrever scripts em C++', 'Sede provincial', 'Reporte 1', NULL, 'Néusia Francisca', '2023-12-26 10:40:30', '2023-12-26 10:40:30'),
(22, 2, NULL, 'Escrever scripts', 'Banco de Moçambique', NULL, NULL, 'Mónica Patrício', '2023-12-27 15:58:55', '2023-12-27 15:58:55'),
(23, 5, NULL, 'teste', 'Sede provincial', NULL, NULL, 'Marcus Rashford', '2024-01-02 03:49:50', '2024-01-02 03:49:50'),
(24, 3, NULL, 'Teste', 'Banco de Moçambique', NULL, NULL, 'Kyle Jordan', '2024-01-02 04:16:33', '2024-01-02 04:16:33');

-- --------------------------------------------------------

--
-- Table structure for table `avaliacao_desempenhos`
--

CREATE TABLE `avaliacao_desempenhos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_funcionario` int(11) NOT NULL,
  `tipo_avaliacao` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `data` date NOT NULL,
  `acao` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `c_avaliador` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `c_avaliado` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `usuario` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `avaliacao_desempenhos`
--

INSERT INTO `avaliacao_desempenhos` (`id`, `id_funcionario`, `tipo_avaliacao`, `data`, `acao`, `c_avaliador`, `c_avaliado`, `usuario`, `created_at`, `updated_at`) VALUES
(20, 20, 'Semestral', '2023-10-28', 'Formação', 'Recomendação', 'Comentário', 'Lídia Macamo', '2023-10-28 18:41:23', '2023-10-28 18:41:23'),
(21, 21, 'Anual', '2023-10-28', 'Necessita duma formação para alcance de metas.', 'Deve empenhar-se muito.', 'Prometo que vou me dedicar muito para ter resultado melhor.', 'Lídia Macamo', '2023-10-28 18:43:50', '2023-10-28 18:43:50'),
(22, 29, 'Anual', '2023-10-28', 'Carece de uma formação a longo prazo para alcance das suas metas.', 'Carece de uma formação a longo prazo para alcance das suas metas.', 'Prometo melhorar o meu desempenho no ambiente de trabalho.', 'Lídia Macamo', '2023-10-28 18:48:22', '2023-10-28 18:48:22'),
(24, 22, 'Anual', '2023-10-29', 'Carece de uma formação a longo prazo para alcance das suas metas.', 'Carece de uma formação a longo prazo para alcance das suas metas.', 'Carece de uma formação a longo prazo para alcance das suas metas.', 'Lídia Macamo', '2023-10-28 18:53:52', '2023-10-28 18:53:52'),
(25, 16, 'Semestral', '2023-10-28', 'Carece de uma formação a longo prazo para alcance das suas metas.', 'Carece de uma formação a longo prazo para alcance das suas metas.', 'Carece de uma formação a longo prazo para alcance das suas metas.', 'Lídia Macamo', '2023-10-28 18:55:59', '2023-10-28 18:55:59'),
(26, 35, 'Anual', '2023-10-30', 'É independente dispensa apoio para alcance das suas metas.', 'Continue melhorando para alcançar os níveis mais altos do seu desempenho.', 'Me dedicarei mais para progresso contínuo.', 'Lídia Macamo', '2023-10-29 23:37:25', '2023-10-29 23:37:25'),
(27, 20, 'Semestral', '2023-12-22', 'Novo teste', 'Novo teste', 'Novo teste', 'Lídia Macamo', '2023-12-22 08:52:34', '2023-12-22 08:52:34');

-- --------------------------------------------------------

--
-- Table structure for table `cargos`
--

CREATE TABLE `cargos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nome_cargo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `grupo_funcional` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cargos`
--

INSERT INTO `cargos` (`id`, `nome_cargo`, `grupo_funcional`, `created_at`, `updated_at`) VALUES
(1, 'Analista', 'Quadros de gestão', '2023-07-14 08:22:53', '2023-08-23 20:50:44'),
(2, 'Gestor de Clientes', 'Quadros altamente qualificados', '2023-07-14 08:24:38', '2023-07-14 08:24:38'),
(3, 'Diretor Comercial', 'Quadros de gestão', '2023-07-14 08:25:45', '2023-08-23 20:50:00'),
(4, 'Programador', 'Quadros de apoio', '2023-07-14 08:27:14', '2023-08-23 20:49:49'),
(5, 'Recepcionista', 'Quadros Auxiliares', '2023-07-14 08:28:34', '2023-08-23 20:51:04'),
(6, 'Mecânico', 'Quadros de apoio', '2023-07-14 08:29:25', '2023-08-23 20:51:23');

-- --------------------------------------------------------

--
-- Table structure for table `clusters`
--

CREATE TABLE `clusters` (
  `id_cluster` bigint(20) UNSIGNED NOT NULL,
  `nome_cluster` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clusters`
--

INSERT INTO `clusters` (`id_cluster`, `nome_cluster`, `created_at`, `updated_at`) VALUES
(1, 'Colaborar', '2023-07-13 22:02:01', '2023-07-13 22:02:01'),
(2, 'Criar', '2023-07-13 22:02:12', '2023-07-13 22:02:12'),
(3, 'Competir', '2023-07-13 22:02:25', '2023-07-13 22:02:25'),
(4, 'Controlar', '2023-07-13 22:02:41', '2023-07-13 22:02:51');

-- --------------------------------------------------------

--
-- Table structure for table `competences`
--

CREATE TABLE `competences` (
  `id_competencia` bigint(20) UNSIGNED NOT NULL,
  `id_avaliacao` int(11) DEFAULT NULL,
  `competencia_funcionario` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `competences`
--

INSERT INTO `competences` (`id_competencia`, `id_avaliacao`, `competencia_funcionario`, `created_at`, `updated_at`) VALUES
(8, 20, '3', NULL, NULL),
(9, 20, '4', NULL, NULL),
(10, 21, '3', NULL, NULL),
(11, 21, '4', NULL, NULL),
(12, 21, '3', NULL, NULL),
(13, 22, '3', NULL, NULL),
(14, 22, '4', NULL, NULL),
(17, 24, '4', NULL, NULL),
(18, 24, '5', NULL, NULL),
(19, 25, '1', NULL, NULL),
(20, 25, '1', NULL, NULL),
(21, 25, '1', NULL, NULL),
(22, 26, '2', NULL, NULL),
(23, 26, '3', NULL, NULL),
(24, 27, '5', NULL, NULL),
(25, 27, '5', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `competence_groups`
--

CREATE TABLE `competence_groups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_cargo` int(11) DEFAULT NULL,
  `tipo_competencia` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_avaliacao` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `competence_groups`
--

INSERT INTO `competence_groups` (`id`, `id_cargo`, `tipo_competencia`, `id_avaliacao`, `created_at`, `updated_at`) VALUES
(26, 5, 'Cooperar', 18, '2023-12-20 20:50:36', '2023-12-20 20:50:36'),
(27, 5, 'Adaptar ao contexto', 18, '2023-12-20 20:50:36', '2023-12-20 20:50:36'),
(28, 5, 'Análise e sentido crítico', 18, '2023-12-20 20:50:36', '2023-12-20 20:50:36'),
(29, 5, 'Autonomia', 18, '2023-12-20 20:50:36', '2023-12-20 20:50:36'),
(30, 5, 'Comunicação eficaz', 18, '2023-12-20 20:50:36', '2023-12-20 20:50:36'),
(31, 1, 'Inspirar e mobilizar', 19, '2023-12-20 20:52:55', '2023-12-20 20:52:55'),
(32, 1, 'Cooperar', 19, '2023-12-20 20:52:55', '2023-12-20 20:52:55'),
(33, 1, 'Negociação e persuação', 19, '2023-12-20 20:52:55', '2023-12-20 20:52:55'),
(34, 1, 'Planear e organizar', 19, '2023-12-20 20:52:55', '2023-12-20 20:52:55'),
(35, 1, 'Orientação a resultados', 19, '2023-12-20 20:52:55', '2023-12-20 20:52:55'),
(38, 4, 'Cooperar', 21, '2023-12-27 05:49:31', '2023-12-27 05:49:31'),
(39, 4, 'Negociação e persuação', 21, '2023-12-27 05:49:31', '2023-12-27 05:49:31'),
(40, 4, 'Planear e organizar', 21, '2023-12-27 05:49:31', '2023-12-27 05:49:31'),
(41, 4, 'Orientação a resultados', 21, '2023-12-27 05:49:31', '2023-12-27 05:49:31'),
(42, 4, 'Focalizar no cliente', 21, '2023-12-27 05:49:31', '2023-12-27 05:49:31'),
(43, 4, 'Concretizar resultados', 21, '2023-12-27 05:49:31', '2023-12-27 05:49:31'),
(44, 4, 'Adaptar ao contexto', 21, '2023-12-27 05:49:31', '2023-12-27 05:49:31'),
(45, 4, 'Gerir informação', 21, '2023-12-27 05:49:31', '2023-12-27 05:49:31'),
(46, 2, 'Orientação a resultados', 22, '2023-12-27 15:56:57', '2023-12-27 15:56:57'),
(47, 2, 'Focalizar no cliente', 22, '2023-12-27 15:56:57', '2023-12-27 15:56:57'),
(48, 2, 'Gerir informação', 22, '2023-12-27 15:56:57', '2023-12-27 15:56:57'),
(49, 2, 'Promover a optimização', 22, '2023-12-27 15:56:57', '2023-12-27 15:56:57'),
(50, 2, 'Análise e sentido crítico', 22, '2023-12-27 15:56:57', '2023-12-27 15:56:57'),
(51, 2, 'Gerir conflitos', 22, '2023-12-27 15:56:57', '2023-12-27 15:56:57'),
(52, 2, 'Pensamento estratégico', 22, '2023-12-27 15:56:57', '2023-12-27 15:56:57'),
(53, 2, 'Networking', 22, '2023-12-27 15:56:57', '2023-12-27 15:56:57'),
(54, 2, 'Autonomia', 22, '2023-12-27 15:56:57', '2023-12-27 15:56:57'),
(55, 2, 'Comunicação eficaz', 22, '2023-12-27 15:56:57', '2023-12-27 15:56:57'),
(56, 2, 'Envolver e Integrar', 22, '2023-12-27 15:56:57', '2023-12-27 15:56:57'),
(57, 2, 'Criar oportunidades de negócio', 22, '2023-12-27 15:56:57', '2023-12-27 15:56:57'),
(58, 1, 'Gerir informação', 23, '2024-01-02 04:20:12', '2024-01-02 04:20:12'),
(59, 1, 'Promover a optimização', 23, '2024-01-02 04:20:12', '2024-01-02 04:20:12'),
(60, 1, 'Análise e sentido crítico', 23, '2024-01-02 04:20:12', '2024-01-02 04:20:12'),
(61, 1, 'Pensamento estratégico', 23, '2024-01-02 04:20:12', '2024-01-02 04:20:12'),
(62, 1, 'Garantir a qualidade', 23, '2024-01-02 04:20:12', '2024-01-02 04:20:12'),
(63, 4, 'Comunicação eficaz', 24, '2024-01-02 04:47:50', '2024-01-02 04:47:50'),
(64, 4, 'Envolver e Integrar', 24, '2024-01-02 04:47:50', '2024-01-02 04:47:50'),
(65, 4, 'Criar oportunidades de negócio', 24, '2024-01-02 04:47:50', '2024-01-02 04:47:50');

-- --------------------------------------------------------

--
-- Table structure for table `competencias`
--

CREATE TABLE `competencias` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nome_competencia` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descricao_competencia` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `competencias`
--

INSERT INTO `competencias` (`id`, `nome_competencia`, `descricao_competencia`, `created_at`, `updated_at`) VALUES
(1, 'Inspirar e mobilizar', 'Partilha e celebra os sucessos, reconhece e aprecia os esforços e contributos individuais.', '2023-07-13 05:22:41', '2023-10-29 09:39:28'),
(2, 'Cooperar', 'Desenvolve uma atitude de colaboração e interajuda permanente', '2023-07-13 05:26:50', '2023-07-13 06:19:39'),
(5, 'Negociação e persuação', 'Negociar com clientes no contexto de persuação', '2023-07-13 17:38:12', '2023-07-13 17:38:12'),
(6, 'Planear e organizar', 'Saber planear e organizar as informações ou dados da empresa para tomada de decisão.', '2023-07-13 17:39:34', '2023-07-13 17:39:34'),
(7, 'Orientação a resultados', 'Orientação a resultados', '2023-10-26 04:40:44', '2023-10-26 04:40:44'),
(8, 'Focalizar no cliente', 'Foco', '2023-10-26 04:41:10', '2023-10-26 04:41:10'),
(9, 'Desenvolver outros', 'Desenvolver outros', '2023-10-26 04:41:41', '2023-10-26 04:41:41'),
(10, 'Concretizar resultados', 'Concretização', '2023-10-26 04:42:08', '2023-10-26 04:42:08'),
(11, 'Adaptar ao contexto', 'Adaptação', '2023-10-26 04:42:33', '2023-10-26 04:42:33'),
(12, 'Gerir informação', 'Gerir', '2023-10-26 04:43:03', '2023-10-26 04:43:03'),
(13, 'Promover a optimização', 'Promoção', '2023-10-26 04:43:30', '2023-10-26 04:43:30'),
(14, 'Análise e sentido crítico', 'Análise', '2023-10-26 04:44:02', '2023-10-26 04:44:02'),
(15, 'Gerir conflitos', 'Gerir', '2023-10-26 04:44:33', '2023-10-26 04:44:33'),
(16, 'Pensamento estratégico', 'Estratégia', '2023-10-26 04:45:05', '2023-10-26 04:45:05'),
(17, 'Garantir a qualidade', 'Qualidade', '2023-10-26 04:45:36', '2023-10-26 04:45:36'),
(18, 'Dirigir para alinhar objetivos', 'Dirigir', '2023-10-26 04:52:07', '2023-10-26 04:52:07'),
(19, 'Networking', 'Networking', '2023-10-26 04:52:37', '2023-10-26 04:52:37'),
(20, 'Autonomia', 'Autonomia', '2023-10-26 04:52:57', '2023-10-26 04:52:57'),
(21, 'Comunicação eficaz', 'Comunicação', '2023-10-26 04:53:22', '2023-10-26 04:53:22'),
(22, 'Envolver e Integrar', 'Envolver', '2023-10-26 04:53:48', '2023-10-26 04:53:48'),
(23, 'Criar oportunidades de negócio', 'Oportunidades', '2023-10-26 04:54:20', '2023-10-26 04:54:20');

-- --------------------------------------------------------

--
-- Table structure for table `departamentos`
--

CREATE TABLE `departamentos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nome_departamento` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sigla_departamento` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departamentos`
--

INSERT INTO `departamentos` (`id`, `nome_departamento`, `sigla_departamento`, `created_at`, `updated_at`) VALUES
(1, 'Recursos Humanos', 'RH', '2023-07-13 19:48:26', '2023-07-13 19:48:26'),
(2, 'Tecnologia de Informação', 'TI', '2023-07-13 19:49:14', '2023-07-13 19:49:14'),
(3, 'Contabilidade', 'CTB', '2023-07-13 19:49:32', '2023-07-13 19:49:55'),
(5, 'Higiene e Segurança no Trabalho', 'HST', '2023-07-13 19:53:30', '2023-07-13 19:53:30'),
(6, 'Gestão Comercial', 'GC', '2023-07-13 19:54:27', '2023-07-13 19:54:27');

-- --------------------------------------------------------

--
-- Table structure for table `desempenhos`
--

CREATE TABLE `desempenhos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cargo` int(11) DEFAULT NULL,
  `dep` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `missao` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `local` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reporte` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `competencia` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `proficiencia` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `excel` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `powerpoint` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `word` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `access` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `desempenhos`
--

INSERT INTO `desempenhos` (`id`, `cargo`, `dep`, `missao`, `local`, `reporte`, `competencia`, `proficiencia`, `excel`, `powerpoint`, `word`, `access`, `created_at`, `updated_at`) VALUES
(18, 5, 'Higiene e Segurança no Trabalho', 'Receber expedientes', 'Agência Sede', 'Teste', NULL, '3', 'Básico', 'Intermediário', 'Intermediário', 'Intermediário', '2023-12-20 20:50:36', '2023-12-20 20:50:36'),
(19, 1, 'Contabilidade', 'Analisar mercado de negócio', 'Agência Sede', 'Teste', NULL, '4', 'Intermediário', 'Intermediário', 'Intermediário', 'Intermediário', '2023-12-20 20:52:55', '2023-12-20 20:52:55'),
(21, 4, 'Tecnologia de Informação', 'Escrever scripts em C#', 'Banco de Moçambique', 'Reporte 1', NULL, '4', 'Avançado', 'Intermediário', 'Avançado', 'Intermediário', '2023-12-27 05:49:30', '2023-12-27 05:49:30'),
(22, 2, 'Contabilidade', 'Gerir clientes', 'Banco de Moçambique', 'Reporte 1', NULL, '3', 'Intermediário', 'Intermediário', 'Intermediário', 'Intermediário', '2023-12-27 15:56:57', '2023-12-27 15:56:57'),
(23, 1, 'Contabilidade', 'Consertar máquinas pesadas', 'Sede provincial', 'teste', NULL, '4', 'Intermediário', 'Intermediário', 'Básico', 'Básico', '2024-01-02 04:20:12', '2024-01-02 04:20:12'),
(24, 4, 'Tecnologia de Informação', 'Escrever scripts', 'Sede provincial', 'Teste', NULL, '3', 'Avançado', 'Avançado', 'Avançado', 'Avançado', '2024-01-02 04:47:50', '2024-01-02 04:47:50');

-- --------------------------------------------------------

--
-- Table structure for table `especificacoes`
--

CREATE TABLE `especificacoes` (
  `id_especificacao` bigint(20) UNSIGNED NOT NULL,
  `id_funcionario` int(11) NOT NULL,
  `nome_especificacao` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `especificacoes`
--

INSERT INTO `especificacoes` (`id_especificacao`, `id_funcionario`, `nome_especificacao`, `created_at`, `updated_at`) VALUES
(15, 16, 'Economia', NULL, NULL),
(16, 17, 'Eletricidade Instaladora', NULL, NULL),
(17, 18, 'Direito', NULL, NULL),
(19, 20, 'Arqueologia', NULL, NULL),
(20, 20, 'Gestão de empresas', NULL, NULL),
(21, 21, 'Mecânica', NULL, NULL),
(22, 22, 'Eletricidade Instaladora', NULL, NULL),
(24, 24, 'Mecânica', NULL, NULL),
(29, 29, 'Eletricidade Instaladora', NULL, NULL),
(31, 31, 'Magistratura', NULL, NULL),
(32, 32, 'Economia', NULL, NULL),
(33, 33, 'Magistratura', NULL, NULL),
(34, 34, 'Magistratura', NULL, NULL),
(35, 35, 'Administração Pública', NULL, NULL),
(36, 36, 'Gestão de empresas', NULL, NULL),
(37, 37, 'Eletrónica', NULL, NULL),
(38, 38, 'Economia', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
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
-- Table structure for table `funcionarios`
--

CREATE TABLE `funcionarios` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nome_completo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sexo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `data_nascimento` date NOT NULL,
  `contato_pessoal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `endereco_fisico` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `provincia` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado_civil` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nacionalidade` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo_documento` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nr_documento` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `data_validade` date NOT NULL,
  `data_emissao` date NOT NULL,
  `deficiencias_alergias` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `grau_deficiencia` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `outros` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contato_emerg` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nome_emerg` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nome_dependente` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `datanasc_dependente` date DEFAULT NULL,
  `contato_prof` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_prof` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `funcao` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `categoria` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reporte` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `turno` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo_contrato` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `data_vigor` date NOT NULL,
  `nib` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nuit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `departamento` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prazo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fotografia` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `nome_conjuge` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `local_nascimento` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `doencas_cronicas` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `funcionarios`
--

INSERT INTO `funcionarios` (`id`, `nome_completo`, `sexo`, `data_nascimento`, `contato_pessoal`, `endereco_fisico`, `provincia`, `estado_civil`, `nacionalidade`, `tipo_documento`, `nr_documento`, `data_validade`, `data_emissao`, `deficiencias_alergias`, `grau_deficiencia`, `outros`, `contato_emerg`, `nome_emerg`, `nome_dependente`, `datanasc_dependente`, `contato_prof`, `email_prof`, `funcao`, `categoria`, `reporte`, `turno`, `tipo_contrato`, `data_vigor`, `nib`, `nuit`, `departamento`, `prazo`, `fotografia`, `created_at`, `updated_at`, `nome_conjuge`, `local_nascimento`, `doencas_cronicas`) VALUES
(16, 'Lisandro Martinez', 'Masculino', '1997-08-31', '865645563', 'Marracuene', 'Maputo', 'Casado', 'Argentina', 'Passaporte', '09037848899K', '2026-04-15', '2021-03-10', 'Nenhuma', 'Nenhum', NULL, '874512344', 'Diego', 'Marcus', '2017-10-26', '874563390', 'lisandro@gmail.com', '2', 'Quadros Qualificados', 'Reporte 2', 'Turno especial', 'Contrato de trabalho a prazo', '2023-02-02', '2457802111', '1242251767', 'Recursos Humanos', '4 anos e 9 meses', '1693241920.jpg', '2023-08-28 14:58:40', '2023-10-29 20:13:39', 'Jorgina', 'Bueno Aires', 'Nenhuma'),
(17, 'Jadon Sancho', 'Masculino', '1996-01-09', '873452789', 'Manhiça', 'Maputo', 'Solteiro', 'Inglesa', 'Passaporte', '09037848899K', '2027-05-04', '2021-05-12', 'Sim', 'Médio', 'Médio', '872415567', 'Harry', NULL, NULL, '874563390', 'jadon@gmail.com', '1', 'Quadros Qualificados', 'Reporte 2', 'Turno especial', 'Contrato  de trabalho a prazo incerto', '2022-06-15', '2457802111', '1242251767', 'Gestão Comercial', NULL, '1693243852.jpg', '2023-08-28 15:30:52', '2023-08-29 09:55:03', NULL, 'Southampton', 'Sim'),
(18, 'Marcus Rashford', 'Masculino', '1991-05-07', '873566444', 'Inhambane', 'Inhambane', 'Solteiro', 'Inglesa', 'Carta de condução', '09037848899H', '2026-11-11', '2020-11-11', 'Nenhuma', 'Nenhum', NULL, '872415567', 'Eric', NULL, NULL, '874563321', 'marcus@gmail.com', '5', 'Quadros Qualificados', 'Reporte 2', 'Turno especial', 'Contrato  de trabalho a tempo indeterminado', '2023-02-15', '37488120983', '1242251767', 'Gestão Comercial', NULL, '1693298385.jpg', '2023-08-29 06:39:45', '2023-08-29 06:39:45', NULL, 'Liverpol', 'Nenhuma'),
(20, 'Kyle Jordan', 'Masculino', '1987-08-13', '876543211', 'Matola', 'Maputo', 'Solteiro', 'Inglesa', 'Passaporte', '09037848899U', '2027-08-20', '2020-08-20', 'Sim', 'Baixo', 'Baixo', '873733111', 'Steve Jobs', 'Carick', '1986-10-16', '874563322', 'kyle@hotmail.com', '3', 'Quadros de Gestão', 'Reporte 2', 'Turno especial', 'Contrato de trabalho a prazo', '2019-08-22', '193874666611', '1242251711', 'Higiene e Segurança no Trabalho', NULL, NULL, '2023-08-29 07:28:18', '2023-10-31 15:38:46', NULL, 'Florida', 'Sim'),
(21, 'Mónica Patrício', 'Feminino', '1991-08-07', '876543266', 'Magoanine A', 'Maputo Cidade', 'Solteira', 'Moçambicana', 'BI', '09037848899O', '2025-02-21', '2020-01-14', NULL, NULL, NULL, '872415500', 'Maida Albano', NULL, NULL, '874563377', 'monica@gmail.com', '2', 'Quadros de Gestão', 'Reporte 4', 'Isenção de horário', 'Contrato  de trabalho a tempo indeterminado', '2022-05-19', '758653444332', '1286344445', 'Recursos Humanos', NULL, '1693301612.jpg', '2023-08-29 07:33:32', '2023-08-29 07:33:32', NULL, 'Maputo', NULL),
(22, 'Calvet Lewin', 'Masculino', '1990-08-24', '823452933', 'Manhiça', 'Maputo', 'Casado', 'Americana', 'BI', '09037848899S', '2030-08-22', '2021-08-20', NULL, NULL, NULL, '853733123', 'Sean', NULL, NULL, '820668955', 'calvet@gmail.com', '3', 'Quadros Qualificados', 'Reporte 4', 'Turno normal', 'Contrato  de trabalho a prazo incerto', '2021-06-17', '758653444332', '1242251767', 'Contabilidade', NULL, '1693301960.jpg', '2023-08-29 07:39:20', '2023-08-29 11:02:59', 'Michelle', 'Los Angels', NULL),
(24, 'Eva da Costa', 'Feminino', '1989-08-18', '876543277', 'Cidade de Xai-xai', 'Gaza', 'Solteira', 'Moçambicana', 'BI', '09037848899U', '2030-08-23', '2022-08-18', NULL, NULL, NULL, '872415567', 'Laú', NULL, NULL, '820358006', 'eva@hotmail.com', '1', 'Quadros Qualificados', 'Reporte 1', 'Isenção de horário', 'Contrato  de trabalho a tempo indeterminado', '2023-03-22', '2457802111', '1242251767', 'Recursos Humanos', NULL, '1693303335.jpg', '2023-08-29 08:02:15', '2023-08-29 08:04:33', NULL, 'Chibuto', NULL),
(29, 'Angelina Marcos', 'Feminino', '1992-08-31', '876543277', 'Costa do sol', 'Maputo Cidade', 'Casada', 'Moçambicana', 'BI', '09037848899A', '2025-08-15', '2019-08-15', NULL, NULL, NULL, '853733123', 'Bruna', NULL, NULL, '820668943', 'test@gmail.com', '1', 'Quadros Qualificados', 'Reporte 2', 'Turno especial', 'Contrato de trabalho a prazo', '2023-03-16', '2457802111', '1242251767', 'Recursos Humanos', '1 ano e 6 meses', NULL, '2023-08-31 10:01:17', '2023-09-04 12:22:01', NULL, 'Maputo', NULL),
(31, 'Teresa Lucas', 'Feminino', '1963-10-18', '876543277', 'Matola', 'Maputo', 'Solteira', 'Moçambicana', 'BI', '09037848899U', '2026-10-23', '2021-10-22', 'Não', 'Nenhum', 'Nenhum', '853733123', 'Maria Lopes', 'Américo', '2013-10-25', 'Zaida', 'teresaluc@gmail.com', '2', 'Quadros Qualificados', 'Reporte 2', 'Isenção de horário', 'Contrato de trabalho a tempo parcial', '2020-07-16', '1938746666723', '1242251767', 'Contabilidade', NULL, '1698623448.jpg', '2023-10-29 21:50:48', '2023-10-29 21:50:48', NULL, 'Maputo', 'Não'),
(32, 'Eric Rowen', 'Masculino', '1999-10-22', '876543277', 'Magoanine A', 'Maputo Cidade', 'Solteiro', 'Moçambicana', 'DIRE', '09037848899O', '2025-10-17', '2020-10-15', 'Não', 'Alto', 'Alto', '872415500', 'Maida Albano', 'Monica', '2004-10-22', '874563390', 'eric@gmail.com', '5', 'Quadros de Apoio', 'Reporte 2', 'Turno especial', 'Contrato  de trabalho a tempo indeterminado', '2020-10-16', '37488120983', '1234997858', 'Recursos Humanos', NULL, NULL, '2023-10-29 21:55:30', '2023-10-29 21:55:30', NULL, 'Maputo', 'Não'),
(33, 'Lucas Marcos', 'Masculino', '2000-10-20', '873452909', 'Marracuene', 'Maputo Cidade', 'Solteiro', 'Moçambicana', 'Passaporte', '09037848899H', '2026-10-16', '2021-10-29', 'Tuberculose', 'Alto', 'Alto', '872415500', 'Marta', 'Noé', '2015-10-23', '874634678', 'lucasmarcos12@gmail.com', '1', 'Quadros de Gestão', 'Reporte 1', 'Isenção de horário', 'Contrato de trabalho a tempo parcial', '2023-10-12', '1938746666723', '1234993444', 'Contabilidade', NULL, NULL, '2023-10-29 22:09:37', '2023-10-29 22:10:33', NULL, 'Maputo', 'Tuberculose'),
(34, 'Jacob Zaca', 'Masculino', '2000-10-27', '876543277', 'Beira-Matacuane', 'Sofala', 'Solteiro', 'Moçambicana', 'Passaporte', '09037848899K', '2025-10-16', '2020-10-23', 'Não', 'Nenhum', 'Nenhum', '872415567', 'Bruna', 'Nélsia', '2014-10-24', '874563377', 'jacob@gmail.com', '1', 'Quadros Qualificados', 'Reporte 2', 'Turno especial', 'Contrato  de trabalho a prazo incerto', '2023-10-26', '1938746666723', '1242251767', 'Recursos Humanos', NULL, NULL, '2023-10-29 22:16:49', '2023-10-29 22:16:49', NULL, 'Beira', 'Não'),
(35, 'Néusia Francisca', 'Feminino', '1999-10-29', '873452909', 'Mavalane', 'Maputo', 'Solteira', 'Moçambicana', 'Passaporte', '09037848899V', '2025-10-23', '2020-10-23', 'Não', 'Nenhum', 'Nenhum', '872415567', 'Marlen', 'Medina', '2005-10-21', '820668955', 'neusia@gmail.com', '1', 'Quadros de Gestão', 'Reporte 1', 'Turno especial', 'Contrato  de trabalho a tempo indeterminado', '2027-10-15', '2457802111', '1234997858', 'Recursos Humanos', NULL, NULL, '2023-10-29 22:23:33', '2023-10-29 22:23:33', NULL, 'Manchester', 'Não'),
(36, 'Marizete Jaime', 'Feminino', '1950-10-18', '873655489', 'Mavalane', 'Maputo Cidade', 'Solteira', 'Moçambicana', 'Passaporte', '09037848899A', '2026-10-23', '2020-10-16', 'Não', 'Nenhum', 'Nenhum', '874512344', 'Emordilência', 'Shayne', '2010-10-29', '874563390', 'marizete@gmail.com', '2', 'Quadros de Gestão', 'Reporte 1', 'Isenção de horário', 'Contrato de trabalho a tempo parcial', '2020-10-09', '2457802111', '1234997858', 'Recursos Humanos', NULL, NULL, '2023-10-29 22:30:08', '2023-11-08 07:05:24', NULL, 'Manhiça', 'Não'),
(37, 'Filipe Macamo', 'Masculino', '1994-10-14', '861347821', 'Xai-Xai', 'Gaza', 'Solteiro', 'Moçambicana', 'BI', '09037848899A', '2024-10-10', '2020-10-16', 'Não', 'Nenhum', 'Nenhum', '873733188', 'Faty', 'Sety', '2020-10-23', '874634678', 'filipe@gmail.com', '4', 'Quadros de Apoio', 'Reporte 2', 'Isenção de horário', 'Contrato de trabalho a tempo parcial', '2020-10-30', '34657578848844', '1286344445', 'Tecnologia de Informação', NULL, NULL, '2023-10-29 23:46:47', '2023-10-29 23:46:47', NULL, 'Xai-Xai', 'Não'),
(38, 'Altércio Luis', 'Masculino', '1988-10-14', '876543211', 'Museu', 'Maputo Cidade', 'Solteiro', 'Moçambicana', 'BI', '09037848899B', '2025-06-19', '2020-05-13', 'Não', 'Nenhum', 'Nenhum', '872415500', 'Venácio', 'Ermelinda', '2016-10-13', '874563390', 'altercio@gmail.com', '6', 'Quadros Qualificados', 'Reporte 2', 'Isenção de horário', 'Contrato de trabalho a tempo parcial', '2022-10-28', '026537471234', '1234997858', 'Recursos Humanos', NULL, NULL, '2023-10-31 15:51:49', '2023-10-31 15:51:49', NULL, 'Maputo', 'Não');

-- --------------------------------------------------------

--
-- Table structure for table `grauacademico`
--

CREATE TABLE `grauacademico` (
  `id_grau_academico` bigint(20) UNSIGNED NOT NULL,
  `id_funcionario` int(11) NOT NULL,
  `nivel_academico` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `instituicao` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `especializacao` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `inicio_termino` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `grauacademico`
--

INSERT INTO `grauacademico` (`id_grau_academico`, `id_funcionario`, `nivel_academico`, `instituicao`, `especializacao`, `inicio_termino`, `created_at`, `updated_at`) VALUES
(16, 16, 'Licenciatura', 'UniZambeze', 'Manutenção Industrial', '2000-2006', NULL, NULL),
(17, 17, 'Técnico superior', 'USTM', 'Mecânica', '2005-2010', NULL, NULL),
(18, 18, 'Técnico superior', 'UniZambeze', 'Mecânica', '2005-2010', NULL, NULL),
(20, 20, 'Licenciatura', 'UniLúrio', 'Estatística', '2005-2010', NULL, NULL),
(21, 21, 'Pós-graduação', 'UniLúrio', 'Engenharia Eletrica', '2012-2016', NULL, NULL),
(22, 22, 'Licenciatura', 'UniLúrio', 'CyberSecurity', '2005-2010', NULL, NULL),
(24, 24, 'Licenciatura', 'UEM', 'Estatística', '2011-2016', NULL, NULL),
(29, 29, 'Técnico superior', 'UEM', 'Estatística', '2014-2021', NULL, NULL),
(31, 31, 'Técnico médio', 'UEM', 'Mecânica', '2014-2021', NULL, NULL),
(32, 32, 'Licenciatura', 'UniZambeze', 'Gestão', '2014-2021', NULL, NULL),
(33, 33, 'MBA', 'UCM', 'Manutenção Elétrica', '2005-2010', NULL, NULL),
(34, 34, 'Técnico superior', 'UniLúrio', 'Mecânica', '2014-2021', NULL, NULL),
(35, 35, 'Técnico médio', 'USTM', 'Geologia', '2017-2021', NULL, NULL),
(36, 36, 'Licenciatura', 'UniZambeze', 'Economia', '2000-2006', NULL, NULL),
(37, 37, 'Técnico superior', 'UEM', 'Informática', '2014-2021', NULL, NULL),
(38, 38, 'Doutoramento', 'UEM', 'Gestão de dados', '2017-2021', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `local_de_trabalhos`
--

CREATE TABLE `local_de_trabalhos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nome_local` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `local_de_trabalhos`
--

INSERT INTO `local_de_trabalhos` (`id`, `nome_local`, `created_at`, `updated_at`) VALUES
(2, 'Agência Sede', '2023-07-13 21:00:05', '2023-07-13 21:00:05'),
(3, 'Sede provincial', '2023-07-13 21:01:02', '2023-07-13 21:01:02'),
(4, 'Banco de Moçambique', '2023-07-13 21:01:26', '2023-07-13 21:01:26'),
(5, 'Marracuene', '2023-07-13 21:02:13', '2023-07-13 21:02:13');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2023_07_09_122143_create_activity_logs_table', 2),
(5, '2023_07_12_065611_add_colunas_to_users_table', 3),
(6, '2023_07_12_140925_create_competencias_table', 4),
(7, '2023_07_12_141137_create_departamentos_table', 4),
(8, '2023_07_12_141208_create_turnos_table', 4),
(9, '2023_07_12_141228_create_tipo_contratos_table', 4),
(10, '2023_07_12_141257_create_local_de_trabalhos_table', 4),
(11, '2023_07_12_141317_create_cargos_table', 4),
(12, '2023_07_13_052743_create_competencias_table', 5),
(13, '2023_07_13_212130_create_table_departamentos', 6),
(14, '2023_07_13_213838_create_funcionarios_table', 7),
(15, '2023_07_13_214044_create_departamentos_table', 8),
(16, '2023_07_13_221613_create_turnos_table', 9),
(17, '2023_07_13_224015_create_locais_table', 10),
(18, '2023_07_13_225726_create_local_de_trabalhos_table', 11),
(19, '2023_07_13_232316_create_tipo_contratos_table', 12),
(20, '2023_07_13_233725_create_clusters_table', 13),
(21, '2023_07_14_101019_create_cargos_table', 14),
(22, '2023_07_14_180357_create_funcionarios_table', 15),
(23, '2023_07_16_092249_create_especificacoes_table', 15),
(24, '2023_07_16_092651_create_grauacademico_table', 15),
(25, '2023_07_19_210319_alter_table_funcionarios_change_nome_conjuge', 16),
(26, '2023_07_20_095352_add_fotografia_to_funcionarios_table', 17),
(27, '2023_07_31_061036_create_objetivos_table', 18),
(28, '2023_08_12_201000_create_avaliacao_desempenhos_table', 19),
(29, '2023_08_17_130559_create_tbcompetencias_table', 19),
(30, '2023_08_17_130947_create_tbobjetivos_table', 19),
(31, '2023_08_17_175915_create_tbcompetencias_table', 20),
(32, '2023_08_17_180302_create_tbobjetivoss_table', 20),
(33, '2023_08_17_200038_create_tbobjetivos_table', 21),
(34, '2023_08_26_085535_create_desempenhos_table', 22),
(35, '2023_10_28_082850_create_atribui_objetivos_table', 23),
(36, '2023_10_28_130053_create_objetives_table', 24),
(37, '2023_10_28_130203_create_competences_table', 24),
(38, '2023_12_20_202650_create_competence_groups_table', 25),
(39, '2023_12_21_131531_create_objetivo_groups_table', 26),
(40, '2023_12_21_134724_create_objetivo_groups_table', 27),
(41, '2024_01_18_094031_create_pesos_table', 28);

-- --------------------------------------------------------

--
-- Table structure for table `objetives`
--

CREATE TABLE `objetives` (
  `id_objetivo` bigint(20) UNSIGNED NOT NULL,
  `id_avaliacao` int(11) DEFAULT NULL,
  `objetivo_funcionario` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `objetives`
--

INSERT INTO `objetives` (`id_objetivo`, `id_avaliacao`, `objetivo_funcionario`, `created_at`, `updated_at`) VALUES
(7, 20, '3', NULL, NULL),
(8, 20, '4', NULL, NULL),
(9, 20, '5', NULL, NULL),
(10, 21, '4', NULL, NULL),
(11, 22, '3', NULL, NULL),
(12, 22, '3', NULL, NULL),
(15, 24, '5', NULL, NULL),
(16, 24, '5', NULL, NULL),
(17, 24, '4', NULL, NULL),
(18, 25, '5', NULL, NULL),
(19, 26, '5', NULL, NULL),
(20, 26, '5', NULL, NULL),
(21, 27, '5', NULL, NULL),
(22, 27, '5', NULL, NULL),
(23, 27, '5', NULL, NULL),
(24, 27, '5', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `objetivos`
--

CREATE TABLE `objetivos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nome_objetivo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `descricao_objetivo` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `objetivos`
--

INSERT INTO `objetivos` (`id`, `nome_objetivo`, `descricao_objetivo`, `created_at`, `updated_at`) VALUES
(1, 'Objetivo', 'Garantir a disponibilização da informação financeira devidamente reconciliado à data útil.', '2023-07-31 04:55:59', '2023-07-31 05:02:28'),
(2, 'objetivo2', 'Assegurar o cumprimento das obrigações fiscais', '2023-07-31 04:57:18', '2023-07-31 04:57:18'),
(4, 'Objetivo4', 'Optimizar a estrutura de custos tornando-a viável e ou flexível de acordo com o nível de recursos disponível e o volume de actividades', '2023-07-31 04:59:46', '2023-11-09 05:03:01'),
(5, 'objetivo5', 'Desenvolver/implementar politica de retenção de pessoal chave', '2023-07-31 05:00:49', '2023-07-31 05:00:49'),
(6, 'objetivo6', 'Assegurar o cumprimento das obrigações fiscais', '2023-07-31 05:01:52', '2023-07-31 05:01:52'),
(9, 'Objetivo3', 'Teste objectivo3', '2024-01-18 12:16:48', '2024-01-18 12:16:48');

-- --------------------------------------------------------

--
-- Table structure for table `objetivo_groups`
--

CREATE TABLE `objetivo_groups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nome_funcionario` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tipo_objetivo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_objetivo` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `objetivo_groups`
--

INSERT INTO `objetivo_groups` (`id`, `nome_funcionario`, `tipo_objetivo`, `id_objetivo`, `created_at`, `updated_at`) VALUES
(10, 'Marcus Rashford', 'Objetivo', 17, '2023-12-21 12:12:11', '2023-12-21 12:12:11'),
(11, 'Marcus Rashford', 'objetivo2', 17, '2023-12-21 12:12:11', '2023-12-21 12:12:11'),
(12, 'Marcus Rashford', 'objetivo3', 17, '2023-12-21 12:12:11', '2023-12-21 12:12:11'),
(13, 'Kyle Jordan', 'objetivo2', 18, '2023-12-21 12:18:04', '2023-12-21 12:18:04'),
(14, 'Kyle Jordan', 'objetivo3', 18, '2023-12-21 12:18:04', '2023-12-21 12:18:04'),
(15, 'Kyle Jordan', 'Objetivo4', 18, '2023-12-21 12:18:04', '2023-12-21 12:18:04'),
(16, 'Kyle Jordan', 'objetivo5', 18, '2023-12-21 12:18:04', '2023-12-21 12:18:04'),
(17, 'Kyle Jordan', 'objetivo2', 19, '2023-12-26 10:38:24', '2023-12-26 10:38:24'),
(18, 'Kyle Jordan', 'objetivo3', 19, '2023-12-26 10:38:24', '2023-12-26 10:38:24'),
(19, 'Kyle Jordan', 'Objetivo4', 19, '2023-12-26 10:38:24', '2023-12-26 10:38:24'),
(20, 'Kyle Jordan', 'objetivo5', 19, '2023-12-26 10:38:24', '2023-12-26 10:38:24'),
(21, 'Calvet Lewin', 'Objetivo', 20, '2023-12-26 10:39:28', '2023-12-26 10:39:28'),
(22, 'Calvet Lewin', 'objetivo2', 20, '2023-12-26 10:39:28', '2023-12-26 10:39:28'),
(23, 'Calvet Lewin', 'objetivo3', 20, '2023-12-26 10:39:28', '2023-12-26 10:39:28'),
(24, 'Calvet Lewin', 'Objetivo4', 20, '2023-12-26 10:39:28', '2023-12-26 10:39:28'),
(25, 'Calvet Lewin', 'objetivo5', 20, '2023-12-26 10:39:28', '2023-12-26 10:39:28'),
(26, 'Calvet Lewin', 'objetivo6', 20, '2023-12-26 10:39:28', '2023-12-26 10:39:28'),
(27, 'Néusia Francisca', 'Objetivo', 21, '2023-12-26 10:40:30', '2023-12-26 10:40:30'),
(28, 'Néusia Francisca', 'objetivo2', 21, '2023-12-26 10:40:30', '2023-12-26 10:40:30'),
(29, 'Néusia Francisca', 'objetivo3', 21, '2023-12-26 10:40:30', '2023-12-26 10:40:30'),
(30, 'Néusia Francisca', 'Objetivo4', 21, '2023-12-26 10:40:30', '2023-12-26 10:40:30'),
(31, 'Néusia Francisca', 'objetivo5', 21, '2023-12-26 10:40:30', '2023-12-26 10:40:30'),
(32, 'Néusia Francisca', 'objetivo6', 21, '2023-12-26 10:40:30', '2023-12-26 10:40:30'),
(33, 'Mónica Patrício', 'Objetivo', 22, '2023-12-27 15:58:55', '2023-12-27 15:58:55'),
(34, 'Mónica Patrício', 'objetivo2', 22, '2023-12-27 15:58:55', '2023-12-27 15:58:55'),
(35, 'Mónica Patrício', 'objetivo3', 22, '2023-12-27 15:58:55', '2023-12-27 15:58:55'),
(36, 'Mónica Patrício', 'Objetivo4', 22, '2023-12-27 15:58:55', '2023-12-27 15:58:55'),
(37, 'Mónica Patrício', 'objetivo5', 22, '2023-12-27 15:58:55', '2023-12-27 15:58:55'),
(38, 'Mónica Patrício', 'objetivo6', 22, '2023-12-27 15:58:55', '2023-12-27 15:58:55'),
(39, 'Marcus Rashford', 'Objetivo4', 23, '2024-01-02 03:49:50', '2024-01-02 03:49:50'),
(40, 'Kyle Jordan', 'Objetivo', 24, '2024-01-02 04:16:33', '2024-01-02 04:16:33');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pesos`
--

CREATE TABLE `pesos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `grupo_funcional` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `peso_competencias` int(11) DEFAULT NULL,
  `peso_objetivos` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pesos`
--

INSERT INTO `pesos` (`id`, `grupo_funcional`, `peso_competencias`, `peso_objetivos`, `created_at`, `updated_at`) VALUES
(1, 'Quadros de apoio', 60, 60, '2024-01-18 09:33:09', '2024-01-18 12:05:13'),
(2, 'Quadros de gestão', 20, 30, '2024-01-18 10:27:49', '2024-01-18 14:43:50'),
(4, 'Quadros Auxiliares', 90, 80, '2024-01-18 10:28:31', '2024-01-18 10:28:31'),
(5, 'Quadros altamente qualificados', 45, 70, '2024-01-18 12:15:30', '2024-01-18 12:15:30');

-- --------------------------------------------------------

--
-- Table structure for table `tbcompetencias`
--

CREATE TABLE `tbcompetencias` (
  `id_competencia` bigint(20) UNSIGNED NOT NULL,
  `id_avaliacao` int(11) NOT NULL,
  `inspirar` int(11) DEFAULT 0,
  `cooperar` int(11) DEFAULT 0,
  `envolver` int(11) DEFAULT 0,
  `desenvolver_outros` int(11) DEFAULT 0,
  `comunicacao_eficaz` int(11) DEFAULT 0,
  `orientacao_resultados` int(11) DEFAULT 0,
  `analise_sentido` int(11) DEFAULT 0,
  `negociacao_persuacao` int(11) DEFAULT 0,
  `planear_organizar` int(11) DEFAULT 0,
  `autonomia` int(11) DEFAULT 0,
  `pensamento_estrategico` int(11) DEFAULT 0,
  `networking` int(11) DEFAULT 0,
  `gerir_conflitos` int(11) DEFAULT 0,
  `gerir_mudanca` int(11) DEFAULT 0,
  `empreender_proagir` int(11) DEFAULT 0,
  `adaptar_contexto` int(11) DEFAULT 0,
  `desenvolver_gerir` int(11) DEFAULT 0,
  `aprender` int(11) DEFAULT 0,
  `empreender` int(11) DEFAULT 0,
  `inovar` int(11) DEFAULT 0,
  `focalizar_cliente` int(11) DEFAULT 0,
  `dirigir_alinhar` int(11) DEFAULT 0,
  `concretizar_resultados` int(11) DEFAULT 0,
  `criar_oportunidades` int(11) DEFAULT 0,
  `focalizar_objetivos` int(11) DEFAULT 0,
  `auto_motivacao` int(11) DEFAULT 0,
  `decidir` int(11) DEFAULT 0,
  `organizar_controlar` int(11) DEFAULT 0,
  `planear` int(11) DEFAULT 0,
  `garantir_qualidade` int(11) DEFAULT 0,
  `optimizacao` int(11) DEFAULT 0,
  `tomada_decisao` int(11) DEFAULT 0,
  `gerir_informacao` int(11) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbcompetencias`
--

INSERT INTO `tbcompetencias` (`id_competencia`, `id_avaliacao`, `inspirar`, `cooperar`, `envolver`, `desenvolver_outros`, `comunicacao_eficaz`, `orientacao_resultados`, `analise_sentido`, `negociacao_persuacao`, `planear_organizar`, `autonomia`, `pensamento_estrategico`, `networking`, `gerir_conflitos`, `gerir_mudanca`, `empreender_proagir`, `adaptar_contexto`, `desenvolver_gerir`, `aprender`, `empreender`, `inovar`, `focalizar_cliente`, `dirigir_alinhar`, `concretizar_resultados`, `criar_oportunidades`, `focalizar_objetivos`, `auto_motivacao`, `decidir`, `organizar_controlar`, `planear`, `garantir_qualidade`, `optimizacao`, `tomada_decisao`, `gerir_informacao`, `created_at`, `updated_at`) VALUES
(5, 5, 4, 5, 5, 0, 0, 0, 0, 0, 0, 5, 0, 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(6, 6, 1, 4, 5, 0, 0, 0, 0, 0, 0, 4, 0, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(8, 8, 1, NULL, 1, 0, 0, 0, 0, 0, 0, 1, 0, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(9, 9, 2, 2, 2, 0, 0, 0, 0, 0, 0, 2, 0, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(10, 10, 3, 3, 4, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(11, 11, 4, 4, 4, 0, 0, 0, 0, 0, 0, 4, 0, 4, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(12, 12, 1, 1, 1, 0, 0, 0, 0, 0, 0, 1, 0, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(13, 13, 5, NULL, 5, 0, 0, 0, 0, 0, 0, 5, 0, 4, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(14, 14, 2, 5, 2, 0, 0, 0, 0, 0, 0, 4, 0, 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(15, 15, 2, 3, 3, 0, 0, 0, 0, 0, 0, 3, 0, 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(16, 16, 1, 3, 2, 0, 0, 0, 0, 0, 0, 1, 0, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbobjetivos`
--

CREATE TABLE `tbobjetivos` (
  `id_objetivo` bigint(20) UNSIGNED NOT NULL,
  `id_avaliacao` int(11) NOT NULL,
  `disponibilidade_info` int(11) DEFAULT 0,
  `cumprimento_legislacao` int(11) DEFAULT 0,
  `desenvolvimento_prof` int(11) DEFAULT 0,
  `garantir_efetividade` int(11) DEFAULT 0,
  `niveis_liquidez` int(11) DEFAULT 0,
  `assessorar` int(11) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbobjetivos`
--

INSERT INTO `tbobjetivos` (`id_objetivo`, `id_avaliacao`, `disponibilidade_info`, `cumprimento_legislacao`, `desenvolvimento_prof`, `garantir_efetividade`, `niveis_liquidez`, `assessorar`, `created_at`, `updated_at`) VALUES
(1, 5, 4, NULL, 0, 4, 4, 5, NULL, NULL),
(2, 6, 3, 5, 0, 1, 5, 4, NULL, NULL),
(4, 8, 5, 3, 0, 3, 4, 4, NULL, NULL),
(5, 9, 4, 4, 0, 4, 4, 4, NULL, NULL),
(6, 10, 5, 1, 0, 4, 2, 5, NULL, NULL),
(7, 11, 5, 5, 0, 5, 5, 5, NULL, NULL),
(8, 12, 1, 1, 0, 1, 1, 1, NULL, NULL),
(9, 13, 5, 5, 0, 4, 5, 5, NULL, NULL),
(10, 14, 2, 1, 0, 1, 1, 2, NULL, NULL),
(11, 15, 2, 3, 0, 3, 2, 1, NULL, NULL),
(12, 16, 2, 2, 0, 3, 5, 5, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tipo_contratos`
--

CREATE TABLE `tipo_contratos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tipo_contrato` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tipo_contratos`
--

INSERT INTO `tipo_contratos` (`id`, `tipo_contrato`, `created_at`, `updated_at`) VALUES
(1, 'Contrato de trabalho a tempo parcial', '2023-07-13 21:31:19', '2023-07-13 21:33:35'),
(2, 'Contrato  de trabalho a tempo indeterminado', '2023-07-13 21:31:49', '2023-07-13 21:33:22'),
(3, 'Contrato  de trabalho a prazo incerto', '2023-07-13 21:32:08', '2023-07-13 21:32:58'),
(4, 'Contrato de trabalho a prazo', '2023-07-13 21:32:36', '2023-07-13 21:32:36');

-- --------------------------------------------------------

--
-- Table structure for table `turnos`
--

CREATE TABLE `turnos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nome_turno` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `turnos`
--

INSERT INTO `turnos` (`id`, `nome_turno`, `created_at`, `updated_at`) VALUES
(1, 'Isenção de horário', '2023-07-13 20:20:20', '2023-07-13 20:22:29'),
(3, 'Turno especial', '2023-07-13 20:23:31', '2023-07-13 20:23:31'),
(4, 'Turno normal', '2023-07-13 20:23:46', '2023-07-13 20:23:46');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` tinyint(1) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fotografia` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `contato` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role`, `email_verified_at`, `password`, `fotografia`, `remember_token`, `created_at`, `updated_at`, `contato`, `status`) VALUES
(1, 'Elias Macamo', 'macamoelias99@gmail.com', 1, NULL, '$2y$10$zpNkSLbrRv7FE.92sAg.pecr9tFaacZMI2TyjDa/AaKrY.fAaNm6e', '1689194181.png', NULL, '2023-07-04 08:05:26', '2023-12-22 09:29:49', '820350478', 'Activo'),
(2, 'Lídia Macamo', 'admin@gmail.com', 1, NULL, '$2y$10$6BTlcgNpVfD8Gi3XuLPbTu/ZmxF/NOoK74iVvZjS7rJES/ZtWiyXC', '1694257786.jpg', NULL, '2023-07-04 08:15:12', '2023-12-22 09:30:18', '873452789', 'Activo'),
(22, 'Patrice Evra', 'evra@gmail.com', 2, NULL, '$2y$10$JpMCrxXZZLZj5YMpLJQ6JOVzm/1LobX8bFUofYQ6c/RRaAT/lT6U6', NULL, NULL, '2023-08-08 07:00:46', '2023-12-22 09:30:40', '873566444', 'Desactivo'),
(24, 'Michael Owen', 'michaelowen@gmail.com', 3, NULL, '$2y$10$hEoKjP/L2Zs6Uqr.WPjNoeAzCORaFmIVQZ3cdIlJJWboEwhhdn9Ei', NULL, NULL, '2023-12-14 07:51:41', '2023-12-22 09:30:29', '871119027', 'Activo'),
(26, 'Kevin Debruyne', 'debruyne@gmail.com', 2, NULL, '$2y$10$duQNWVPBSJheqCvniMIhLur7DLPhkgWrII4sWYYIl7.oACjzxL7iq', NULL, NULL, '2023-12-14 08:43:28', '2024-01-03 05:05:55', '867829392', 'Activo');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_logs`
--
ALTER TABLE `activity_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `atribui_objetivos`
--
ALTER TABLE `atribui_objetivos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `avaliacao_desempenhos`
--
ALTER TABLE `avaliacao_desempenhos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cargos`
--
ALTER TABLE `cargos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clusters`
--
ALTER TABLE `clusters`
  ADD PRIMARY KEY (`id_cluster`);

--
-- Indexes for table `competences`
--
ALTER TABLE `competences`
  ADD PRIMARY KEY (`id_competencia`);

--
-- Indexes for table `competence_groups`
--
ALTER TABLE `competence_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `competencias`
--
ALTER TABLE `competencias`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departamentos`
--
ALTER TABLE `departamentos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `desempenhos`
--
ALTER TABLE `desempenhos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `especificacoes`
--
ALTER TABLE `especificacoes`
  ADD PRIMARY KEY (`id_especificacao`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `funcionarios`
--
ALTER TABLE `funcionarios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grauacademico`
--
ALTER TABLE `grauacademico`
  ADD PRIMARY KEY (`id_grau_academico`);

--
-- Indexes for table `local_de_trabalhos`
--
ALTER TABLE `local_de_trabalhos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `objetives`
--
ALTER TABLE `objetives`
  ADD PRIMARY KEY (`id_objetivo`);

--
-- Indexes for table `objetivos`
--
ALTER TABLE `objetivos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `objetivo_groups`
--
ALTER TABLE `objetivo_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pesos`
--
ALTER TABLE `pesos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbcompetencias`
--
ALTER TABLE `tbcompetencias`
  ADD PRIMARY KEY (`id_competencia`);

--
-- Indexes for table `tbobjetivos`
--
ALTER TABLE `tbobjetivos`
  ADD PRIMARY KEY (`id_objetivo`);

--
-- Indexes for table `tipo_contratos`
--
ALTER TABLE `tipo_contratos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `turnos`
--
ALTER TABLE `turnos`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `activity_logs`
--
ALTER TABLE `activity_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=208;

--
-- AUTO_INCREMENT for table `atribui_objetivos`
--
ALTER TABLE `atribui_objetivos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `avaliacao_desempenhos`
--
ALTER TABLE `avaliacao_desempenhos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `cargos`
--
ALTER TABLE `cargos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `clusters`
--
ALTER TABLE `clusters`
  MODIFY `id_cluster` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `competences`
--
ALTER TABLE `competences`
  MODIFY `id_competencia` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `competence_groups`
--
ALTER TABLE `competence_groups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `competencias`
--
ALTER TABLE `competencias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `departamentos`
--
ALTER TABLE `departamentos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `desempenhos`
--
ALTER TABLE `desempenhos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `especificacoes`
--
ALTER TABLE `especificacoes`
  MODIFY `id_especificacao` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `funcionarios`
--
ALTER TABLE `funcionarios`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `grauacademico`
--
ALTER TABLE `grauacademico`
  MODIFY `id_grau_academico` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `local_de_trabalhos`
--
ALTER TABLE `local_de_trabalhos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `objetives`
--
ALTER TABLE `objetives`
  MODIFY `id_objetivo` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `objetivos`
--
ALTER TABLE `objetivos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `objetivo_groups`
--
ALTER TABLE `objetivo_groups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `pesos`
--
ALTER TABLE `pesos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbcompetencias`
--
ALTER TABLE `tbcompetencias`
  MODIFY `id_competencia` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbobjetivos`
--
ALTER TABLE `tbobjetivos`
  MODIFY `id_objetivo` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tipo_contratos`
--
ALTER TABLE `tipo_contratos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `turnos`
--
ALTER TABLE `turnos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
