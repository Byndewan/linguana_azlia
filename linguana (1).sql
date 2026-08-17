-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 17, 2026 at 05:43 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `linguana`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('super-admin','contributor') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'super-admin',
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `role`, `photo`, `is_active`, `token`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'superadmin@gmail.com', '$2y$12$a5JzfdyJSOPy07uUo5pQauZThIDvE15sefOjy2ZakV8AAPrQJ1BRS', 'super-admin', 'admin.jpg', 1, '', NULL, NULL, '2026-08-04 02:03:32');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `clients_tables`
--

CREATE TABLE `clients_tables` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `photo` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clients_tables`
--

INSERT INTO `clients_tables` (`id`, `photo`, `created_at`, `updated_at`) VALUES
(1, 'client.png', NULL, NULL),
(4, 'client_1786002932.png', '2026-08-06 00:55:32', '2026-08-06 00:55:32'),
(6, 'client_1786003855.png', '2026-08-06 01:10:55', '2026-08-06 01:10:55');

-- --------------------------------------------------------

--
-- Table structure for table `daily_goals`
--

CREATE TABLE `daily_goals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `target_time` int(11) NOT NULL,
  `type` enum('general','test_prep') COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `daily_goals`
--

INSERT INTO `daily_goals` (`id`, `title`, `target_time`, `type`, `short_description`, `created_at`, `updated_at`) VALUES
(2, 'Casual', 10, 'general', 'Perfect for building a daily habit around a busy schedule.', '2026-08-13 23:01:14', '2026-08-13 23:01:14'),
(3, 'Regular', 20, 'general', 'The standard daily goal for steady and consistent progress.', '2026-08-13 23:01:47', '2026-08-13 23:01:47'),
(4, 'Serious', 30, 'general', 'Extra focus to quickly master basic conversations and grammar.', '2026-08-13 23:02:19', '2026-08-13 23:02:33'),
(5, 'Warm Up', 30, 'test_prep', 'Review basic materials and do light practice exercises.', '2026-08-13 23:03:07', '2026-08-13 23:03:07'),
(6, 'Intensive', 60, 'test_prep', 'A full hour for deep-dives into test questions and mini simulations.', '2026-08-13 23:04:08', '2026-08-13 23:04:08'),
(7, 'Hardcore', 120, 'test_prep', 'Maximum preparation and full simulations for when the exam is near.', '2026-08-13 23:04:51', '2026-08-13 23:04:51');

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
-- Table structure for table `hero_items`
--

CREATE TABLE `hero_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `hero_title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `hero_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `hero_button_text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `hero_photo` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hero_items`
--

INSERT INTO `hero_items` (`id`, `hero_title`, `hero_description`, `hero_button_text`, `hero_photo`, `created_at`, `updated_at`) VALUES
(1, 'Unlock Your World with Language Mastery', 'AI-powered lessons, gamified streaks, and structured test prep. All in one beautifully designed platform.', 'Learn Now', 'hero_photo.png', NULL, '2026-08-05 08:07:33');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `flag` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `language` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `flag`, `language`, `created_at`, `updated_at`) VALUES
(1, 'flag_1786531970.png', 'Indonesia', '2026-08-12 03:15:28', '2026-08-12 03:52:50'),
(3, 'flag_1786532065.png', 'English', '2026-08-12 03:54:25', '2026-08-12 03:54:25'),
(4, 'flag_1786532303.png', 'Korean', '2026-08-12 03:58:23', '2026-08-12 03:58:23'),
(5, 'flag_1786532320.png', 'Spanish', '2026-08-12 03:58:40', '2026-08-12 03:58:40'),
(6, 'flag_1786532340.png', 'French', '2026-08-12 03:59:00', '2026-08-12 03:59:00'),
(7, 'flag_1786532358.png', 'Japanese', '2026-08-12 03:59:18', '2026-08-12 03:59:18'),
(8, 'flag_1786532375.png', 'Germany', '2026-08-12 03:59:35', '2026-08-12 03:59:35'),
(9, 'flag_1786532392.png', 'Mandarin', '2026-08-12 03:59:52', '2026-08-12 03:59:52'),
(10, 'flag_1786532411.png', 'Italy', '2026-08-12 04:00:11', '2026-08-12 04:00:11'),
(11, 'flag_1786532445.png', 'Russian', '2026-08-12 04:00:45', '2026-08-12 04:00:45'),
(12, 'flag_1786532549.png', 'Portuguese', '2026-08-12 04:02:29', '2026-08-12 04:02:29'),
(13, 'flag_1786532572.png', 'Arabic', '2026-08-12 04:02:52', '2026-08-12 04:02:52');

-- --------------------------------------------------------

--
-- Table structure for table `learning_paths`
--

CREATE TABLE `learning_paths` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `language_id` bigint(20) UNSIGNED NOT NULL,
  `photo` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` enum('general','test_prep') COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `learning_paths`
--

INSERT INTO `learning_paths` (`id`, `language_id`, `photo`, `type`, `title`, `short_description`, `created_at`, `updated_at`) VALUES
(2, 3, 'logo_1786612073.png', 'test_prep', 'TOEFL iBT', 'Prepare for university admissions with comprehensive practice tests.', '2026-08-13 01:03:41', '2026-08-13 02:07:53'),
(5, 3, NULL, 'general', 'General English', 'Suitable for beginners', '2026-08-13 02:17:23', '2026-08-13 02:17:23'),
(6, 3, 'logo_1786613044.png', 'test_prep', 'IELTS Academic', 'Popular certification for study and migration to the UK, Australia, and New Zealand.', '2026-08-13 02:24:04', '2026-08-13 02:24:04'),
(7, 3, 'logo_1786613129.png', 'test_prep', 'TOEIC', 'English proficiency evaluation test specifically designed for professional and business communication.', '2026-08-13 02:25:29', '2026-08-13 02:25:29'),
(8, 4, 'logo_1786613220.png', 'test_prep', 'TOPIK', 'Official South Korean government certification for study, scholarships, and professional careers.', '2026-08-13 02:27:00', '2026-08-13 02:27:00'),
(9, 7, 'logo_1786613315.png', 'test_prep', 'JLPT', 'Standard Japanese proficiency test with levels ranging from basic (N5) to advanced (N1).', '2026-08-13 02:28:35', '2026-08-13 02:28:35');

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
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2026_07_29_093252_create_admins_table', 1),
(5, '2026_07_29_095648_create_admins_table', 2),
(6, '2026_07_31_064615_create_admins_table', 3),
(8, '2026_08_04_134621_create_hero_items_table', 4),
(9, '2026_08_06_032718_create_clients_tables_table', 5),
(11, '2026_08_06_120044_create_services_table', 6),
(12, '2026_08_10_051933_create_processes_table', 7),
(13, '2026_08_10_100047_create_testimonials_table', 8),
(14, '2026_08_11_122541_create_languages_table', 9),
(15, '2026_08_13_051632_create_learning_paths_table', 10),
(16, '2026_08_14_044919_create_daily_goals_table', 11),
(17, '2026_08_14_091143_create_user_progress_table', 12),
(18, '2026_08_15_095954_create_onboard_temp_data_table', 13);

-- --------------------------------------------------------

--
-- Table structure for table `onboard_temp_data`
--

CREATE TABLE `onboard_temp_data` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `token` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `onboarding_language_id` bigint(20) UNSIGNED DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `learning_path_id` bigint(20) UNSIGNED DEFAULT NULL,
  `daily_goal` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `processes`
--

CREATE TABLE `processes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `process` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `processes`
--

INSERT INTO `processes` (`id`, `process`, `description`, `icon`, `color`, `created_at`, `updated_at`) VALUES
(3, 'Set Your Goal', 'Choose a language, pick General Learning or Test Prep, set your daily XP target.', '<svg xmlns=\"http://www.w3.org/2000/svg\" fill=\"none\" viewBox=\"0 0 24 24\" stroke-width=\"1.5\" stroke=\"currentColor\" class=\"size-6\">   <path stroke-linecap=\"round\" stroke-linejoin=\"round\" d=\"M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z\" /> </svg>', '#dbbe00', '2026-08-10 00:22:52', '2026-08-10 00:22:52'),
(4, 'Follow the Path', 'Work through bite-sized modules,\r\nflashcards, and interactive exercises.', '<svg xmlns=\"http://www.w3.org/2000/svg\" fill=\"none\" viewBox=\"0 0 24 24\" stroke-width=\"1.5\" stroke=\"currentColor\" class=\"size-6\">   <path stroke-linecap=\"round\" stroke-linejoin=\"round\" d=\"M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25\" /> </svg>', '#0092d1', '2026-08-10 00:31:58', '2026-08-10 00:31:58'),
(5, 'Practice Daily', 'Build your streak. Earn XP. Unlock achievements as you hit milestones.', '<svg xmlns=\"http://www.w3.org/2000/svg\" fill=\"none\" viewBox=\"0 0 24 24\" stroke-width=\"1.5\" stroke=\"currentColor\" class=\"size-6\">   <path stroke-linecap=\"round\" stroke-linejoin=\"round\" d=\"m3.75 13.5 10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75Z\" /> </svg>', '#f08c00', '2026-08-10 00:33:44', '2026-08-10 00:33:44'),
(6, 'Reach Fluency', 'Pass mock tests, earn badges, and celebrate your progress with real results.', '<svg xmlns=\"http://www.w3.org/2000/svg\" fill=\"none\" viewBox=\"0 0 24 24\" stroke-width=\"1.5\" stroke=\"currentColor\" class=\"size-6\">   <path stroke-linecap=\"round\" stroke-linejoin=\"round\" d=\"M16.5 18.75h-9m9 0a3 3 0 0 1 3 3h-15a3 3 0 0 1 3-3m9 0v-3.375c0-.621-.503-1.125-1.125-1.125h-.871M7.5 18.75v-3.375c0-.621.504-1.125 1.125-1.125h.872m5.007 0H9.497m5.007 0a7.454 7.454 0 0 1-.982-3.172M9.497 14.25a7.454 7.454 0 0 0 .981-3.172M5.25 4.236c-.982.143-1.954.317-2.916.52A6.003 6.003 0 0 0 7.73 9.728M5.25 4.236V4.5c0 2.108.966 3.99 2.48 5.228M5.25 4.236V2.721C7.456 2.41 9.71 2.25 12 2.25c2.291 0 4.545.16 6.75.47v1.516M7.73 9.728a6.726 6.726 0 0 0 2.748 1.35m8.272-6.842V4.5c0 2.108-.966 3.99-2.48 5.228m2.48-5.492a46.32 46.32 0 0 1 2.916.52 6.003 6.003 0 0 1-5.395 4.972m0 0a6.726 6.726 0 0 1-2.749 1.35m0 0a6.772 6.772 0 0 1-3.044 0\" /> </svg>', '#8b00cc', '2026-08-10 00:35:42', '2026-08-10 00:35:42');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `service_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `background_color` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `service_name`, `description`, `icon`, `color`, `background_color`, `created_at`, `updated_at`) VALUES
(1, 'AI-Powered Lessons', 'Adaptive curriculum that learns from your mistakes and personalizes content in real-time.', '<svg xmlns=\"http://www.w3.org/2000/svg\" fill=\"none\" viewBox=\"0 0 24 24\" stroke-width=\"1.5\" stroke=\"currentColor\" class=\"size-6\">   <path stroke-linecap=\"round\" stroke-linejoin=\"round\" d=\"M12 18v-5.25m0 0a6.01 6.01 0 0 0 1.5-.189m-1.5.189a6.01 6.01 0 0 1-1.5-.189m3.75 7.478a12.06 12.06 0 0 1-4.5 0m3.75 2.383a14.406 14.406 0 0 1-3 0M14.25 18v-.192c0-.983.658-1.823 1.508-2.316a7.5 7.5 0 1 0-7.517 0c.85.493 1.509 1.333 1.509 2.316V18\" /> </svg>', '#b7016b', '#fb8ebd', '2026-08-07 01:38:54', '2026-08-07 05:26:54'),
(2, 'Live AI Feedback', 'Instant pronunciation and grammar corrections from your personal AI tutor.', '<svg xmlns=\"http://www.w3.org/2000/svg\" fill=\"none\" viewBox=\"0 0 24 24\" stroke-width=\"1.5\" stroke=\"currentColor\" class=\"size-6\">   <path stroke-linecap=\"round\" stroke-linejoin=\"round\" d=\"M2.25 12.76c0 1.6 1.123 2.994 2.707 3.227 1.087.16 2.185.283 3.293.369V21l4.076-4.076a1.526 1.526 0 0 1 1.037-.443 48.282 48.282 0 0 0 5.68-.494c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0 0 12 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018Z\" /> </svg>', '#5d91f9', '#a1c6f7', '2026-08-07 05:25:51', '2026-08-07 05:26:20'),
(3, 'Daily Goals', 'Customizable XP targets, streaks, and gentle nudges keep you on track every day.', '<svg xmlns=\"http://www.w3.org/2000/svg\" fill=\"none\" viewBox=\"0 0 24 24\" stroke-width=\"1.5\" stroke=\"currentColor\" class=\"size-6\">   <path stroke-linecap=\"round\" stroke-linejoin=\"round\" d=\"M2.25 18 9 11.25l4.306 4.306a11.95 11.95 0 0 1 5.814-5.518l2.74-1.22m0 0-5.94-2.281m5.94 2.28-2.28 5.941\" /> </svg>', '#fd1212', '#ff7070', '2026-08-07 07:00:08', '2026-08-07 07:00:08'),
(4, 'Progress Analytics', 'Detailed dashboards track your vocabulary, grammar, and fluency across every skill.', '<svg xmlns=\"http://www.w3.org/2000/svg\" fill=\"none\" viewBox=\"0 0 24 24\" stroke-width=\"1.5\" stroke=\"currentColor\" class=\"size-6\">   <path stroke-linecap=\"round\" stroke-linejoin=\"round\" d=\"M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 0 1 3 19.875v-6.75ZM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V8.625ZM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V4.125Z\" /> </svg>', '#00e01a', '#62f958', '2026-08-07 07:01:35', '2026-08-07 07:01:35');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('86aLDVeIYYgvvDNVc0PuCbEr2AZTGkcOKDjsF9EZ', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiVmRvN1JGclU2Zjc3U29lRmF5UEhkQ2R3ZWxhTjEwSnczaFdkSU9lTCI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sb2dpbiI7czo1OiJyb3V0ZSI7czoxMDoidXNlci5sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTI6ImxvZ2luX2FkbWluXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', 1786784478),
('NVaf6Jx2WL83Nzn49CEZqjaspbXQlpV0CBzCmpmK', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoibDVlS0JpcE1zYkJRWGF1dTdtRm52UXNzRHk5WGppbk9NT2JPQzFacyI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzM6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi9sb2dpbiI7czo1OiJyb3V0ZSI7czoxMToiYWRtaW4ubG9naW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1786869811),
('QZgNUuPRDmLz4xZHovRuTgXGrU8nxW4ovDAZ56yZ', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiYzdaRWVJczEwUmRJSXJlbFN2Zmc0STl2Z0Z2bm9tVk5CQXlkbndNUyI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NDM6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi9kYWlseS1nb2FsL3Nob3ciO3M6NToicm91dGUiO3M6MjE6ImFkbWluLmRhaWx5LWdvYWwuc2hvdyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTI6ImxvZ2luX2FkbWluXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', 1786775467),
('zWk1peJXYKvDn97rx1gTJfX90R1fZESM9h4cb7ia', 5, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiZ1M5TXB1bm1hU0JJbndoSlRTZGRoZjBNOXpFbk5sOUlEcnJvcGpGNiI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7czo1OiJyb3V0ZSI7czo0OiJob21lIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6NTt9', 1786938143);

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `photo` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `designation` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `rating` tinyint(4) NOT NULL DEFAULT 5,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `photo`, `name`, `designation`, `rating`, `comment`, `created_at`, `updated_at`) VALUES
(3, 'testimonial_1786444096.jpg', 'Sarah K.', 'Software Engineer', 5, 'I reached B2 in Spanish in just 6 months. The daily streaks kept me accountable!', '2026-08-11 03:28:16', '2026-08-11 03:28:16'),
(4, 'testimonial_1786444158.jpg', 'Azlia', 'Student', 3, 'Linguana\'s Al feedback is incredibly helpful. It feels like having a personal tutor 24/7.', '2026-08-11 03:29:18', '2026-08-11 03:29:18'),
(5, 'testimonial_1786444214.jpg', 'Jessica T.', 'Marketing Director', 5, 'The bite-sized modules fit perfectly into my busy schedule. Highly recommended!', '2026-08-11 03:30:14', '2026-08-11 03:30:14'),
(6, 'testimonial_1786444272.jpg', 'Michael B.', 'Designer', 4, 'The interface is so clean and easy to navigate. Best language app I\'ve tried!', '2026-08-11 03:31:12', '2026-08-11 03:31:12');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(3, 'Username', 'user@gmail.com', NULL, '$2y$12$7g6EEU7LDhKUW8M7d7Mr..REbKXApVcIpwrIvHeYhfzEsue.q32KG', NULL, '2026-08-14 04:14:54', '2026-08-14 04:14:54'),
(4, 'Azlia Nisrina Afifah', 'azlia@gmail.com', NULL, '$2y$12$v52fHn7hBZYhXyaRt.eQJ.aeoB73TvyLhGPt2f9Oe/aaG78kDMS/S', NULL, '2026-08-14 04:16:27', '2026-08-14 04:16:27'),
(5, 'Morgan', 'morgan@gmail.com', NULL, '$2y$12$FZ.pzhSTBo5BgoHrf5T6z.85U3Xir7aIUl1mLFyZrujNHtLFV5ZQi', NULL, '2026-08-16 20:40:25', '2026-08-16 20:40:25');

-- --------------------------------------------------------

--
-- Table structure for table `user_progress`
--

CREATE TABLE `user_progress` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `language_id` bigint(20) UNSIGNED NOT NULL,
  `learning_type` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `learning_path_id` bigint(20) UNSIGNED DEFAULT NULL,
  `daily_goal` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_progress`
--

INSERT INTO `user_progress` (`id`, `user_id`, `language_id`, `learning_type`, `learning_path_id`, `daily_goal`, `created_at`, `updated_at`) VALUES
(2, 3, 4, 'test_prep', 8, 30, '2026-08-14 04:14:54', '2026-08-14 04:14:54'),
(3, 4, 3, 'general', NULL, 10, '2026-08-14 04:16:27', '2026-08-14 04:16:27'),
(4, 5, 7, 'general', NULL, 20, '2026-08-16 20:40:25', '2026-08-16 20:40:25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_expiration_index` (`expiration`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_locks_expiration_index` (`expiration`);

--
-- Indexes for table `clients_tables`
--
ALTER TABLE `clients_tables`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `daily_goals`
--
ALTER TABLE `daily_goals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `hero_items`
--
ALTER TABLE `hero_items`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `learning_paths`
--
ALTER TABLE `learning_paths`
  ADD PRIMARY KEY (`id`),
  ADD KEY `learning_paths_language_id_foreign` (`language_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `onboard_temp_data`
--
ALTER TABLE `onboard_temp_data`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `onboard_temp_data_token_unique` (`token`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `processes`
--
ALTER TABLE `processes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_progress`
--
ALTER TABLE `user_progress`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_progress_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `clients_tables`
--
ALTER TABLE `clients_tables`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `daily_goals`
--
ALTER TABLE `daily_goals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hero_items`
--
ALTER TABLE `hero_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `learning_paths`
--
ALTER TABLE `learning_paths`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `onboard_temp_data`
--
ALTER TABLE `onboard_temp_data`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `processes`
--
ALTER TABLE `processes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_progress`
--
ALTER TABLE `user_progress`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `learning_paths`
--
ALTER TABLE `learning_paths`
  ADD CONSTRAINT `learning_paths_language_id_foreign` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_progress`
--
ALTER TABLE `user_progress`
  ADD CONSTRAINT `user_progress_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
