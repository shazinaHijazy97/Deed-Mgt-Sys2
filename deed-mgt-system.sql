-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 04, 2022 at 04:00 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `deed-mgt-system`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendances`
--

CREATE TABLE `attendances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nic` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_in` date NOT NULL,
  `time_in` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attendances`
--

INSERT INTO `attendances` (`id`, `nic`, `date_in`, `time_in`, `created_at`, `updated_at`) VALUES
(1, '988734377V', '2022-01-04', '01:51:36', '2022-01-04 08:21:44', '2022-01-04 08:21:44'),
(2, '948551295V', '2022-01-04', '01:55:47', '2022-01-04 08:26:29', '2022-01-04 08:26:29'),
(3, '987334275V', '2022-01-04', '02:51:35', '2022-01-04 09:22:06', '2022-01-04 09:22:06');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nic` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `fname`, `lname`, `gender`, `nic`, `contact`, `address`, `email`, `password`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Hansani', 'Senevirathne', 'Female', '901452547V', '0775478965', 'Moratuwa', 'hansi@gmail.com', '$2a$12$L4gJs3/.ksJSS8le92alp.lO38QKY2pqv8q7dmdVGa34RDIE1hpfy', '1', '1', NULL, NULL),
(2, 'Gayani', 'Priyanthika', 'Female', '942569876v', '07843756313', 'Kalutara', 'gayani@gmail.com', 'Gayani123', NULL, NULL, '2021-09-24 08:55:36', '2021-09-24 08:55:36'),
(3, 'Chamoda', 'Jayamini', 'Female', '972551973V', '0712758360', 'Badulla', 'chamoda@gmail.com', 'Chamoda123', NULL, NULL, '2021-09-24 08:59:21', '2021-09-24 08:59:21'),
(6, 'Minoshi', 'Ukuwela', 'Male', '788123639V', '0721089357', 'Colombo', 'minoshi@gmail.com', 'Minoshi123', NULL, NULL, '2022-01-03 03:28:22', '2022-01-03 04:29:55'),
(7, 'Kaveesha', 'Vidurangi', 'Male', '627355429V', '0726200410', 'Kandy', 'kaveesha@gmail.com', 'Kaveesha123', NULL, NULL, '2022-01-03 03:30:29', '2022-01-03 04:30:15'),
(8, 'Nimesh', 'Nayanajith', 'Male', '977420458V', '0770320179', 'Matara', 'nimesh@gmail.com', 'Nimesh123', NULL, NULL, '2022-01-03 03:34:46', '2022-01-03 03:41:31'),
(9, 'Kiran', 'Jayarathna', 'Male', '987112484V', '0774935829', 'Ampara', 'kiran@gmail.com', 'Kiran123', NULL, NULL, '2022-01-03 03:37:57', '2022-01-03 03:37:57'),
(10, 'Dilki', 'Amarasingha', 'Female', '981430052V', '0779862200', 'Colombo', 'dilki@gmail.com', 'Dilki123', NULL, NULL, '2022-01-03 03:40:51', '2022-01-03 03:40:51'),
(11, 'Kalari', 'Tushara', 'Female', '949022175V', '07828032294', 'Negambo', 'kalari@gmail.com', 'Kalari123', NULL, NULL, '2022-01-03 03:43:57', '2022-01-03 03:43:57'),
(12, 'Nethma', 'Inuri', 'Female', '9241555895V', '0778933680', 'Kurunagala', 'nethma@gmail.com', 'Nethma123', NULL, NULL, '2022-01-03 03:45:27', '2022-01-03 03:45:27'),
(13, 'Lakshi', 'Karunathilaka', 'Female', '983255259V', '0762011586', 'Monaragala', 'lakshi@gmail.com', 'Lakshi123', NULL, NULL, '2022-01-03 04:01:55', '2022-01-03 04:01:55'),
(14, 'Kirubashini', 'Vijayakanth', 'Female', '968552952V', '078460068', 'Jaffna', 'kirubashini@gmail.com', 'Kirubashini123', NULL, NULL, '2022-01-03 04:03:27', '2022-01-03 04:03:27'),
(15, 'Mahima', 'Jayasooriya', 'Female', '981336399V', '0767745225', 'Anuradhapura', 'mahima@gmail.com', 'Mahima123', NULL, NULL, '2022-01-03 04:05:04', '2022-01-03 04:05:04'),
(16, 'Yasith', 'Udugama', 'Male', '987022452V', '0762224610', 'Rathnapura', 'yasith@gmail.com', 'Yasith123', NULL, NULL, '2022-01-03 04:06:37', '2022-01-03 04:06:37'),
(17, 'Harin', 'Lakshan', 'Male', '942853900V', '0763470146', 'Polonnaruwa', 'harin@gmail.com', 'Harin123', NULL, NULL, '2022-01-03 04:21:10', '2022-01-03 04:21:10'),
(18, 'Kamal', 'Gunathilaka', 'Male', '932580951V', '0777038906', 'Monaragala', 'kamal@gmail.com', 'Kamal123', NULL, NULL, '2022-01-03 04:23:46', '2022-01-03 04:23:46'),
(19, 'Rameshi', 'Siriwardana', 'Female', '678289236V', '0789903719', 'Hambantota', 'rameshi@gmail.com', 'Rameshi123', NULL, NULL, '2022-01-03 04:25:44', '2022-01-03 04:25:44'),
(20, 'Ishini', 'Aarachchi', 'Female', '872690346V', '0726882902', 'Colombo', 'ishini@gmail.com', 'Ishini123', NULL, NULL, '2022-01-03 04:27:07', '2022-01-03 04:27:07');

-- --------------------------------------------------------

--
-- Table structure for table `deed_requests`
--

CREATE TABLE `deed_requests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deed_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deed_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `request_date` date NOT NULL,
  `payment_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `deed_requests`
--

INSERT INTO `deed_requests` (`id`, `client_id`, `deed_no`, `deed_type`, `request_date`, `payment_status`, `note`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, '3', '8855', 'Land', '2021-11-30', 'Completed', 'Urgent', NULL, NULL, '2021-11-30 07:00:41', '2021-11-30 07:00:41');

-- --------------------------------------------------------

--
-- Table structure for table `lawyers`
--

CREATE TABLE `lawyers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nic` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lawyers`
--

INSERT INTO `lawyers` (`id`, `fname`, `lname`, `gender`, `nic`, `address`, `contact`, `email`, `password`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(4, 'Kasuni', 'Humasha', 'Female', '623829917V', 'Galle', '0717863452', 'kasuni@gmail.com', 'Kasuni123', NULL, NULL, '2021-11-02 04:32:39', '2021-11-02 04:32:39'),
(5, 'Sachintha', 'Achala', 'Male', '987329077V', 'Gampaha', '0753846587', 'sachintha@gmail.com', 'Sachintha123', NULL, NULL, '2021-11-02 04:36:26', '2021-11-26 09:08:38'),
(6, 'Pasan', 'Bandara', 'Male', '965777457V', 'Rathnapura', '0752238467', 'pasan@gmail.com', 'Pasan123', NULL, NULL, '2022-01-02 06:37:10', '2022-01-02 07:04:58'),
(7, 'Bimal', 'Jayawardana', 'Male', '988734377V', 'Matara', '0789445748', 'bimal@gmail.com', 'Bimal123', NULL, NULL, '2022-01-02 07:04:24', '2022-01-02 07:04:24'),
(8, 'Anura', 'Jayathilaka', 'Male', '986567554V', 'Gampaha', '0784563328', 'anura@gmail.com', 'Anura123', NULL, NULL, '2022-01-02 07:06:13', '2022-01-02 07:06:13'),
(9, 'Kalpana', 'Sawindi', 'Female', '984567223V', 'Matara', '0768944589', 'kalpana@gmail.com', 'Kalpana123', NULL, NULL, '2022-01-02 07:07:51', '2022-01-02 07:07:51'),
(10, 'Manoj', 'Peiris', 'Male', '989667345V', 'Gampaha', '0769984254', 'manoj@gmail.com', 'Manoj123', NULL, NULL, '2022-01-03 02:04:56', '2022-01-03 02:04:56'),
(11, 'Minoli', 'Jayawansha', 'Female', '908766787V', 'Kalutara', '0768894567', 'minoli@gmail.com', 'Minoli123', NULL, NULL, '2022-01-03 02:15:49', '2022-01-03 02:15:49'),
(12, 'Supun', 'Malshan', 'Male', '987654867V', 'Badulla', '0789887653', 'supun@gmail.com', 'Supun123', NULL, NULL, '2022-01-03 02:20:32', '2022-01-03 02:20:32'),
(13, 'Fiham', 'Rajabdeen', 'Male', '987665437V', 'Negambo', '0756775432', 'fiham@gmail.com', 'Fiham123', NULL, NULL, '2022-01-03 02:23:14', '2022-01-03 02:23:14'),
(14, 'Anusha', 'Silva', 'Female', '9876675432', 'Matara', '0789956345', 'anusha@gmail.com', 'Anusha123', NULL, NULL, '2022-01-03 02:25:47', '2022-01-03 02:25:47'),
(15, 'Shiham', 'Gause', 'Male', '976998345V', 'Trincomalee', '0782228845', 'shiham@gmail.com', 'Shiham123', NULL, NULL, '2022-01-03 03:13:10', '2022-01-03 03:13:10'),
(16, 'Girija', 'Ayyar', 'Male', '97556249V', 'Jaffna', '07134588265', 'girija@gmail.com', 'Girija123', NULL, NULL, '2022-01-03 03:15:21', '2022-01-03 03:15:21'),
(17, 'Vignesh', 'Kumar', 'Male', '946648732V', 'Nuwaraeliya', '0713212987', 'vignesh@gmail.com', 'Vignesh123', NULL, NULL, '2022-01-03 03:17:19', '2022-01-03 03:17:19'),
(18, 'Mahroof', 'Mohamed', 'Male', '945883105V', 'Colombo', '0753725986', 'mahroof@gmail.com', 'Mahroof123', NULL, NULL, '2022-01-03 03:21:01', '2022-01-03 03:21:01'),
(19, 'Yousuf', 'Nasar', 'Male', '987334275V', 'Kandy', '0715588255', 'yousuf@gmail.com', 'Yousuf123', NULL, NULL, '2022-01-03 03:23:01', '2022-01-03 03:23:01'),
(20, 'Hiroshani', 'Kulathunga', 'Female', '984891205V', 'Hambantota', '0773284100', 'hiroshani@gmail.com', 'Hiroshani123', NULL, NULL, '2022-01-03 03:25:04', '2022-01-03 03:25:04');

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
(3, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(4, '2021_09_24_082644_create_clients_table', 2),
(5, '2021_10_01_143809_create_lawyers_table', 3),
(6, '2021_10_09_133436_create_staff_table', 4),
(8, '2021_11_24_133457_create_deed_requests_table', 5),
(9, '2021_12_24_141854_create_attendances_table', 6);

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
-- Table structure for table `personal_access_tokens`
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
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nic` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `fname`, `lname`, `gender`, `nic`, `address`, `contact`, `email`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Anil', 'Ranasingha', 'Male', '948551295V', 'Negambo', '0754328762', 'anil@gmail.com', NULL, NULL, '2021-11-26 09:22:32', '2021-11-26 09:22:32'),
(3, 'Hassana', 'Muhas', 'Female', '97822356v', 'Gampaha', '0712846746', 'hassana@gmail.com', NULL, NULL, '2021-12-27 10:42:17', '2021-12-27 10:42:17'),
(4, 'Thilini', 'Madushika', 'Female', '897563769v', 'Kandy', '0774773882', 'thilini@gmail.com', NULL, NULL, '2021-12-27 10:45:03', '2021-12-27 10:45:03'),
(5, 'Anurada', 'Jayaweera', 'Female', '864581255v', 'Matara', '0775637732', 'anurada@gmail.com', NULL, NULL, '2021-12-27 10:46:37', '2021-12-27 10:46:37'),
(6, 'Dushan', 'Herath', 'Male', '885679234v', 'Anuradapura', '0786543565', 'dushan@gmail.com', NULL, NULL, '2021-12-27 10:48:16', '2021-12-27 10:48:16'),
(7, 'Aaloka', 'Sampathini', 'Female', '965411987v', 'Hambantota', '0756788643', 'aaloka@gmail.com', NULL, NULL, '2021-12-27 10:50:42', '2021-12-27 10:50:42'),
(8, 'Anusha', 'Weerathunga', 'Female', '923899945V', 'Ampara', '0777369421', 'anusha@gmail.com', NULL, NULL, '2022-01-02 06:40:26', '2022-01-02 06:40:26'),
(9, 'Venushi', 'Abeyrathna', 'Female', '95677783V', 'Jaffna', '0712345698', 'venushi@gmail.com', NULL, NULL, '2022-01-02 06:41:50', '2022-01-02 06:41:50'),
(10, 'Sabith', 'Ahamed', 'Male', '984557631V', 'Nuwaraeliya', '0756742229', 'sabith@gmail.com', NULL, NULL, '2022-01-02 06:42:55', '2022-01-02 06:42:55'),
(11, 'Sampath', 'Nandasoma', 'Male', '987445638V', 'Trincomalee', '0784556664', 'sampath@gmail.com', NULL, NULL, '2022-01-02 06:44:00', '2022-01-02 06:44:00'),
(12, 'Maharu', 'Balapitiya', 'Male', '988456221V', 'Kalutara', '0776554560', 'maharu@gmail.com', NULL, NULL, '2022-01-02 06:47:26', '2022-01-02 06:47:26'),
(13, 'Poorni', 'Lokuliyana', 'Female', '987998345V', 'Panadura', '0785449770', 'poorni@gmail.com', NULL, NULL, '2022-01-02 06:49:11', '2022-01-02 06:54:45'),
(14, 'Nimesha', 'Prabuddi', 'Female', '988765121V', 'Maharagama', '0771118234', 'nimesha@gmail.com', NULL, NULL, '2022-01-02 06:51:31', '2022-01-02 06:51:31'),
(15, 'Hansamali', 'Navoda', 'Female', '988798445V', 'Negambo', '0757833458', 'hansamali@gmail.com', NULL, NULL, '2022-01-02 06:54:28', '2022-01-02 06:54:28'),
(16, 'Mihiri', 'Samadhi', 'Female', '965773456V', 'Matara', '0789945378', 'mihiri@gmail.com', NULL, NULL, '2022-01-02 06:55:54', '2022-01-02 06:55:54'),
(17, 'Ashani', 'Randika', 'Female', '954237194V', 'Gampaha', '0771549662', 'ashani@gmail.com', NULL, NULL, '2022-01-02 06:57:18', '2022-01-02 06:57:18'),
(18, 'Lashini', 'Perera', 'Female', '978676543V', 'Hambantota', '077826789', 'lashini@gmail.com', NULL, NULL, '2022-01-02 06:59:03', '2022-01-02 06:59:03'),
(19, 'Gihan', 'Rupasingha', 'Male', '985321268V', 'Matara', '0768124937', 'gihan@gmail.com', NULL, NULL, '2022-01-02 07:00:22', '2022-01-02 07:00:22'),
(20, 'Kasun', 'Geekiyana', 'Male', '9815567857V', 'Kandy', '0786566739', 'kasun@gmail.com', NULL, NULL, '2022-01-02 07:01:50', '2022-01-02 07:01:50');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nic` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `email`, `nic`, `email_verified_at`, `password`, `contact`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Zahra', 'Shazina', 'shazina@gmail.com', '972541236V', NULL, '$2a$12$7UGIj4nwrDx1kbD5uBPzretCahop2eDKcAxetaHTgp8jV7TBMXrBq', '0769854125', NULL, NULL, NULL),
(2, 'Sandeepa', 'Loku', 'sandeepa@gmail.com', '19974257896', NULL, '$2a$12$h1FhJuk7hdVOVW6kG2T5EOB0/FMNZkXfiye1Dx887lQNCeVqZIpii', '0779854563', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendances`
--
ALTER TABLE `attendances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `clients_email_unique` (`email`);

--
-- Indexes for table `deed_requests`
--
ALTER TABLE `deed_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lawyers`
--
ALTER TABLE `lawyers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `lawyers_email_unique` (`email`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `staff_email_unique` (`email`);

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
-- AUTO_INCREMENT for table `attendances`
--
ALTER TABLE `attendances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `deed_requests`
--
ALTER TABLE `deed_requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `lawyers`
--
ALTER TABLE `lawyers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
