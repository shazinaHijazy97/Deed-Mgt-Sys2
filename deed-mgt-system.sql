-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 29, 2022 at 09:45 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

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
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lawyer_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `appointment_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `client_id`, `lawyer_id`, `date`, `time`, `appointment_status`, `note`, `created_at`, `updated_at`) VALUES
(2, '1', '4', '2022-01-23', '08:00:00', 'Active', 'Urgent', '2022-01-23 09:02:36', '2022-05-29 00:48:26'),
(3, '1', '4', '2022-01-23', '09:04:00', 'Pending', 'Urgent', '2022-01-23 09:03:36', '2022-01-23 09:03:36'),
(4, '1', '4', '2022-02-07', '16:15:00', 'Active', NULL, '2022-02-16 02:50:29', '2022-05-29 09:07:43'),
(5, '2', '19', '2022-02-17', '16:30:00', 'Active', 'Documents sent', '2022-02-16 05:40:39', '2022-02-16 05:40:39'),
(6, '6', '16', '2022-02-17', '08:00:00', 'Active', 'Urgent', '2022-02-16 05:41:59', '2022-02-16 05:41:59'),
(7, '14', '10', '2022-02-17', '10:45:00', 'Active', 'None', '2022-02-16 05:50:41', '2022-02-16 05:50:41'),
(8, '8', '16', '2022-02-21', '08:00:00', 'Active', 'Document sent', '2022-02-16 05:52:10', '2022-02-16 05:52:10'),
(9, '12', '12', '2022-02-23', '19:30:00', 'Active', 'None', '2022-02-16 05:53:04', '2022-02-16 05:53:04'),
(10, '19', '6', '2022-02-18', '09:15:00', 'Active', 'None', '2022-02-16 05:54:21', '2022-02-16 05:54:21'),
(11, '10', '10', '2022-02-24', '09:00:00', 'Pending', 'None', '2022-02-16 05:57:08', '2022-02-16 05:57:08'),
(12, '11', '20', '2022-02-20', '19:00:00', 'Pending', 'None', '2022-02-16 05:58:13', '2022-02-16 05:58:13'),
(13, '17', '7', '2022-02-25', '10:30:00', 'Active', 'None', '2022-02-16 06:16:46', '2022-02-16 06:16:46'),
(14, '16', '4', '2022-02-17', '16:30:00', 'Pending', 'None', '2022-02-16 06:18:10', '2022-02-16 06:18:10'),
(15, '8', '5', '2022-02-19', '11:00:00', 'Pending', 'None', '2022-02-16 06:19:22', '2022-02-16 06:19:22'),
(16, '12', '6', '2022-02-21', '11:00:00', 'Active', 'Documents sent', '2022-02-16 06:20:36', '2022-02-16 06:20:36'),
(17, '2', '13', '2022-02-24', '15:30:00', 'Cancelled', 'None', '2022-02-16 06:21:45', '2022-02-16 06:21:45'),
(18, '6', '14', '2022-02-17', '16:00:00', 'Active', 'Urgent', '2022-02-16 06:22:48', '2022-02-16 06:22:48'),
(19, '15', '9', '2022-02-28', '10:00:00', 'Pending', 'None', '2022-02-16 06:23:34', '2022-02-16 06:23:34'),
(20, '18', '11', '2022-02-23', '08:00:00', 'Active', 'None', '2022-02-16 06:25:48', '2022-02-16 06:25:48'),
(21, '7', '15', '2022-02-28', '17:30:00', 'Pending', 'None', '2022-02-16 06:26:37', '2022-02-16 06:26:37'),
(22, '7', '5', '2022-05-29', '08:30:00', 'Pending', 'None', '2022-05-29 07:29:20', '2022-05-29 07:29:20'),
(23, '3', '6', '2022-06-02', '16:30:00', 'Active', 'None', '2022-05-29 07:34:01', '2022-05-29 07:34:01'),
(24, '3', '6', '2022-07-02', '16:30:00', 'Pending', NULL, '2022-05-29 12:38:36', '2022-05-29 12:38:36');

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
(3, '987334275V', '2022-01-04', '02:51:35', '2022-01-04 09:22:06', '2022-01-04 09:22:06'),
(4, '623829917V', '2022-01-07', '03:52:03', '2022-01-07 10:22:07', '2022-01-07 10:22:07'),
(5, '623829917V', '2022-01-07', '03:52:15', '2022-01-07 10:22:42', '2022-01-07 10:22:42'),
(6, '9815567857V', '2022-02-16', '08:18:22', '2022-02-16 02:48:38', '2022-02-16 02:48:38'),
(7, '987665437V', '2022-02-16', '08:18:50', '2022-02-16 02:49:03', '2022-02-16 02:49:03'),
(8, '986567554V', '2022-02-16', '09:50:36', '2022-02-16 04:20:47', '2022-02-16 04:20:47'),
(9, '95677783V', '2022-02-16', '09:50:59', '2022-02-16 04:21:22', '2022-02-16 04:21:22'),
(10, '978676543V', '2022-02-16', '09:51:39', '2022-02-16 04:22:03', '2022-02-16 04:22:03'),
(11, '987445638V', '2022-02-16', '10:38:41', '2022-02-16 05:09:04', '2022-02-16 05:09:04'),
(12, '984557631V', '2022-02-16', '10:39:16', '2022-02-16 05:09:28', '2022-02-16 05:09:28'),
(13, '976998345V', '2022-02-16', '10:39:32', '2022-02-16 05:09:57', '2022-02-16 05:09:57'),
(14, '97556249V', '2022-02-16', '10:40:20', '2022-02-16 05:10:31', '2022-02-16 05:10:31'),
(15, '948551295V', '2022-02-16', '10:40:38', '2022-02-16 05:10:52', '2022-02-16 05:10:52'),
(16, '946648732V', '2022-02-16', '10:57:59', '2022-02-16 05:28:15', '2022-02-16 05:28:15'),
(17, '965773456V', '2022-02-16', '10:58:37', '2022-02-16 05:28:48', '2022-02-16 05:28:48'),
(18, '984567223V', '2022-02-16', '11:12:05', '2022-02-16 05:42:14', '2022-02-16 05:42:14'),
(19, '9815567857V', '2022-02-16', '11:58:53', '2022-02-16 06:29:15', '2022-02-16 06:29:15'),
(20, '985321268V', '2022-02-16', '11:59:26', '2022-02-16 06:29:35', '2022-02-16 06:29:35'),
(21, '623829917V', '2022-05-29', '03:39:38', '2022-05-28 22:09:42', '2022-05-28 22:09:42'),
(22, '623829917V', '2022-05-29', '04:00:50', '2022-05-28 22:30:53', '2022-05-28 22:30:53');

-- --------------------------------------------------------

--
-- Table structure for table `cases`
--

CREATE TABLE `cases` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `case_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lawyer_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `filed_date` date DEFAULT NULL,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cases`
--

INSERT INTO `cases` (`id`, `client_id`, `title`, `case_type`, `lawyer_id`, `filed_date`, `note`, `created_at`, `updated_at`) VALUES
(1, '1', 'Property Transfer', 'Property', '4', '2022-02-18', 'None', '2022-02-14 08:14:58', '2022-04-21 09:26:45'),
(3, '3', 'Divorce Agreement', 'Property', '4', '2022-02-10', 'None', '2022-02-14 09:46:44', '2022-05-27 10:26:03'),
(4, '6', 'Property Selling', 'Property', '4', '2022-03-15', 'Urgent', '2022-02-16 09:01:56', '2022-05-27 10:25:46'),
(5, '1', 'Leas Agreement', 'Property', '4', '2022-03-02', 'Shop for 5 years', '2022-02-16 09:03:25', '2022-04-21 09:33:11'),
(6, '12', 'Child Custody', 'Property', '16', '2022-04-03', 'Drunken Father', '2022-02-16 09:04:19', '2022-05-28 06:34:50'),
(7, '9', 'Hit and Run', 'Civil', '4', NULL, 'Claiming Insurance as compensation', '2022-02-16 09:07:55', '2022-02-16 09:07:55'),
(8, '1', 'Death of 40 Year old Woman', 'Property', '4', '2022-04-06', 'Stabbed to death in an apartment', '2022-02-16 09:10:34', '2022-04-21 10:54:49'),
(9, '1', 'Property Transfer', 'Property', '4', '2022-02-01', 'Details sent', '2022-02-16 09:11:28', '2022-04-21 10:18:27'),
(10, '1', 'Deed of Gift', 'Property', '4', '2022-03-27', 'None', '2022-02-16 09:12:01', '2022-04-21 10:19:54'),
(11, '7', 'Lease Agreement', 'Property', '10', NULL, 'House for 3 years', '2022-02-16 09:18:55', '2022-02-16 09:18:55'),
(12, '13', 'Get compensation from the Employer', 'Civil', '18', NULL, 'Hurt back while working in a mine', '2022-02-16 09:21:01', '2022-02-16 09:21:01'),
(13, '1', 'Deed of Transfer', 'Property', '4', '2022-02-27', 'Transfer shop ownership', '2022-02-16 09:21:44', '2022-04-21 10:41:25'),
(14, '18', 'Adoption of a 4 year old girl', 'Civil', '13', NULL, 'Parents are drug addicts', '2022-02-16 09:26:26', '2022-02-16 09:26:26'),
(15, '8', 'Claiming compensation for property damage', 'Property', '4', '2022-03-10', 'None', '2022-02-16 09:27:51', '2022-04-21 10:20:48'),
(16, '12', 'Defamation', 'Criminal', '20', NULL, 'Spreading false rumors on internet', '2022-02-16 09:32:26', '2022-02-16 09:32:26'),
(17, '14', 'Claiming ETF', 'Civil', '16', NULL, 'None', '2022-02-16 09:39:27', '2022-02-16 09:39:27'),
(18, '17', 'Intentional Harm', 'Criminal', '12', NULL, 'Hitting with sharp object', '2022-02-16 09:41:11', '2022-02-16 09:41:11'),
(19, '1', 'Petition against executives of the company', 'Civil', '4', '2022-03-16', 'Corruption of the management', '2022-02-16 09:43:17', '2022-04-21 09:42:24'),
(20, '1', 'Partnership Agreement', 'Property', '4', '2022-03-12', 'Business partnership', '2022-02-16 09:45:41', '2022-04-21 10:22:11'),
(22, '1', 'Hit and Run', 'Civil', '19', '2022-03-26', 'none', '2022-04-21 09:44:48', '2022-04-21 10:57:27'),
(23, '1', 'Deed of Gift', 'Property', '17', '2022-05-30', 'None', '2022-05-29 09:03:22', '2022-05-29 09:05:09'),
(24, '3', 'gfs', 'Divorce', '16', '2022-05-29', 'None', '2022-05-29 12:24:14', '2022-05-29 12:24:14');

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
(1, 'Hansani', 'Senevirathne', 'Male', '901452547V', '0775478965', 'Moratuwa', 'hansi@gmail.com', '$2a$12$L4gJs3/.ksJSS8le92alp.lO38QKY2pqv8q7dmdVGa34RDIE1hpfy', '1', '1', NULL, '2022-05-29 00:50:48'),
(2, 'Gayani', 'Priyanthika', 'Male', '942569876v', '07843756313', 'Kalutara', 'gayani@gmail.com', 'Gayani123', NULL, NULL, '2021-09-24 08:55:36', '2022-05-27 09:13:43'),
(3, 'Chamoda', 'Jayamini', 'Female', '972551973V', '0712758360', 'Badulla', 'chamoda@gmail.com', '$2a$12$MWuezaEXEPl3s414E6mG2el908S7TzcEpybGhL1VkIbYFByUTKbxW', NULL, NULL, '2021-09-24 08:59:21', '2021-09-24 08:59:21'),
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
(20, 'Ishini', 'Aarachchi', 'Female', '872690346V', '0726882902', 'Colombo', 'ishini@gmail.com', 'Ishini123', NULL, NULL, '2022-01-03 04:27:07', '2022-01-03 04:27:07'),
(21, 'Sandeepa', 'Loku', 'Male', '19978541256', '0779284076', 'Kurunegala', 'sandeepau@gmail.com', '$2y$10$1cpBWcJEDJHu6m/1Ri2Pou50CVjhScPl.b9R9AZ0.hUGO6n7/wqVe', NULL, NULL, '2022-05-29 13:27:57', '2022-05-29 13:27:57'),
(22, 'Randika', 'Nonis', 'Male', '85452154562V', '0715845689', 'Piliyandala', 'randika@gmail.com', '$2y$10$JZPoDI8HlRqf/ls8aDoBOu7WEowL5Tr/R14Sm0QiI3wmu9NMlfO/.', NULL, NULL, '2022-05-29 13:33:23', '2022-05-29 13:33:23'),
(23, 'Dinusha', 'Silva', 'Male', '88954215687V', '0714587896', 'Katubedda', 'dinusha@gmail.com', '$2y$10$A3GBoh8GmAkQ9ZnoJ.7LqOthWU3pYxmZ.zJB0MF7jsOnPTZUzuMvK', NULL, NULL, '2022-05-29 13:34:53', '2022-05-29 13:34:53');

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
  `note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `deed_requests`
--

INSERT INTO `deed_requests` (`id`, `client_id`, `deed_no`, `deed_type`, `request_date`, `payment_status`, `note`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, '3', '8855', 'Land', '2021-11-30', 'Completed', 'Urgent', NULL, NULL, '2021-11-30 07:00:41', '2021-11-30 07:00:41'),
(2, '2', '4588', 'Partnership', '2022-02-17', 'Completed', 'None', NULL, NULL, '2022-02-16 08:24:01', '2022-02-16 08:24:01'),
(3, '3', '3276', 'Property', '2022-02-20', 'Completed', 'None', NULL, NULL, '2022-02-16 08:24:46', '2022-05-27 09:14:38'),
(4, '20', '9012', 'Property', '2022-02-21', 'Pending', 'Urgent', NULL, NULL, '2022-02-16 08:25:44', '2022-02-16 08:25:44'),
(5, '19', '6643', 'House', '2022-02-23', 'Pending', 'None', NULL, NULL, '2022-02-16 08:27:12', '2022-02-16 08:27:12'),
(6, '6', '5892', 'Land', '2022-02-28', 'Completed', 'Two copies needed', NULL, NULL, '2022-02-16 08:28:51', '2022-02-16 08:28:51'),
(7, '7', '1890', 'Partnership', '2022-02-17', 'Cancel', 'None', NULL, NULL, '2022-02-16 08:30:35', '2022-02-16 08:30:35'),
(8, '8', '7869', 'Transfer', '2022-02-25', 'Pending', 'History should be checked', NULL, NULL, '2022-02-16 08:32:21', '2022-02-16 08:32:21'),
(9, '18', '5639', 'Land', '2022-02-22', 'Pending', 'None', NULL, NULL, '2022-02-16 08:33:07', '2022-02-16 08:33:07'),
(10, '10', '8520', 'Transfer', '2022-02-24', 'Completed', 'Urgent', NULL, NULL, '2022-02-16 08:33:42', '2022-02-16 08:33:42'),
(11, '9', '4142', 'Property', '2022-02-15', 'Completed', 'None', NULL, NULL, '2022-02-16 08:35:26', '2022-02-16 08:35:26'),
(12, '13', '7063', 'Partnership', '2022-02-24', 'Completed', 'Make Triplicate', NULL, NULL, '2022-02-16 08:36:52', '2022-02-16 08:36:52'),
(13, '3', '1458', 'Gift', '2022-03-08', 'Completed', 'None', NULL, NULL, '2022-02-16 08:37:50', '2022-02-16 08:37:50'),
(14, '11', '5733', 'Gift', '2022-02-21', 'Completed', 'None', NULL, NULL, '2022-02-16 08:38:43', '2022-02-16 08:38:43'),
(15, '16', '6431', 'House', '2022-02-25', 'Pending', 'None', NULL, NULL, '2022-02-16 08:39:49', '2022-02-16 08:39:49'),
(16, '17', '4013', 'House', '2022-02-24', 'Pending', 'Urgent', NULL, NULL, '2022-02-16 08:54:46', '2022-02-16 08:54:46'),
(17, '6', '0342', 'Transfer', '2022-02-25', 'Completed', 'None', NULL, NULL, '2022-02-16 08:55:56', '2022-02-16 08:55:56'),
(18, '7', '7397', 'Partnership', '2022-02-20', 'Completed', 'Two copies needed', NULL, NULL, '2022-02-16 08:56:39', '2022-02-16 08:56:39'),
(19, '9', '6058', 'House', '2022-02-18', 'Completed', 'History should be checked', NULL, NULL, '2022-02-16 08:57:22', '2022-04-21 11:32:44'),
(20, '20', '1544', 'House', '2022-02-23', 'Pending', 'None', NULL, NULL, '2022-02-16 08:58:03', '2022-02-16 08:58:03'),
(21, '17', '3488', 'Transfer', '2022-04-22', 'Completed', 'Urgent', NULL, NULL, '2022-04-22 01:03:56', '2022-04-22 01:03:56'),
(22, '3', '2339', 'Property', '2022-05-31', 'Pending', NULL, NULL, NULL, '2022-05-29 11:58:14', '2022-05-29 11:58:14'),
(23, '3', '9012', 'Land', '2022-06-03', 'Pending', NULL, NULL, NULL, '2022-05-29 12:02:31', '2022-05-29 12:02:31');

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `item_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `service_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `manufacturer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `manufacturer_contact` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`id`, `item_name`, `item_category`, `quantity`, `service_date`, `manufacturer`, `manufacturer_contact`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(2, 'chair', 'Office Table', '4', '2022-02-10', 'Arpico', '0785663598', NULL, NULL, '2022-02-07 10:06:09', '2022-02-16 03:58:44'),
(3, 'Laptop', 'Computers', '2', '2022-02-09', 'HP', '0774535736', NULL, NULL, '2022-02-07 10:07:19', '2022-02-07 10:07:19'),
(4, 'books', 'Stationary Items', '10', '2022-02-08', 'Atlas', '0112694428', NULL, NULL, '2022-02-07 10:10:45', '2022-02-07 10:10:45'),
(5, 'Table', 'Office Table', '5', '2022-02-10', 'Damro', '0112776296', NULL, NULL, '2022-02-16 03:20:10', '2022-02-16 03:20:10'),
(6, 'A4  Sheets', 'Stationary Items', '10 bundles', '2022-02-11', 'Nalaka Book Industries', '0112987668', NULL, NULL, '2022-02-16 03:28:37', '2022-02-16 03:28:37'),
(7, 'Printer', 'Printers', '2', '2022-02-17', 'None', 'None', NULL, NULL, '2022-02-16 03:33:19', '2022-02-16 03:33:19'),
(8, 'Book Shelf', 'Office Table', '2', '2022-02-23', 'Damro', '0112776296', NULL, NULL, '2022-02-16 03:35:39', '2022-02-16 03:35:39'),
(9, 'Laptop', 'Computers', '5', '2022-02-25', 'HP', '0774535736', NULL, NULL, '2022-02-16 03:36:41', '2022-02-16 03:36:41'),
(10, 'chair', 'Office Chair', '5', '2022-02-25', 'Damro', '0112776296', NULL, NULL, '2022-02-16 03:38:22', '2022-02-16 03:38:22'),
(11, 'Table', 'Office Table', '5', '2022-02-25', 'Damro', '0112776296', NULL, NULL, '2022-02-16 03:40:11', '2022-02-16 03:40:11'),
(12, 'Files', 'Office Table', '20', '2022-02-25', 'Atlas', '0112694428', NULL, NULL, '2022-02-16 03:42:16', '2022-02-16 03:42:56'),
(13, 'Books', 'Stationary Items', '20', '2022-02-25', 'Atlas', '0112694428', NULL, NULL, '2022-02-16 03:43:53', '2022-02-16 03:43:53'),
(14, 'Photocopy Machine', 'Photocopy Machine', '2', '2022-02-25', 'Brown and Company', '0115692278', NULL, NULL, '2022-02-16 03:48:03', '2022-02-16 03:48:03'),
(15, 'Priinter', 'Printers', '2', '2022-02-25', 'Brown and Company', '0115692278', NULL, NULL, '2022-02-16 03:49:05', '2022-02-16 03:49:05'),
(16, 'Scanner', 'Scanner', '2', '2022-02-25', 'Brown and Company', '0115692278', NULL, NULL, '2022-02-16 03:56:49', '2022-02-16 03:56:49'),
(17, 'Cupboard', 'Office Cupboards', '3', '2022-02-25', 'Damro', '0112776296', NULL, NULL, '2022-02-16 03:57:59', '2022-02-16 03:57:59'),
(18, 'Book Shelf', 'Office Cupboards', '2', '2022-02-25', 'Damro', '0112776296', NULL, NULL, '2022-02-16 03:59:49', '2022-02-16 03:59:49'),
(19, 'A4  Sheets', 'Stationary Items', '5 bundles', '2022-02-25', 'Nalaka Book Industries', '0112987668', NULL, NULL, '2022-02-16 04:00:49', '2022-02-16 04:00:49'),
(20, 'Stationary', 'Stationary Items', '10 pcs each', '2022-02-25', 'Atlas', '0774535736', NULL, NULL, '2022-02-16 04:02:09', '2022-02-16 04:02:09'),
(21, 'Conference Table', 'Office Table', '2', '2022-02-20', 'Damro', '0112776296', NULL, NULL, '2022-02-16 04:03:22', '2022-02-16 04:03:22'),
(22, 'Recorder Pen', 'Technical Items', '10', '2022-02-10', 'Book Line PVT LTD', '0112575285', NULL, NULL, '2022-02-16 04:08:56', '2022-02-16 04:08:56');

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
  `practicing_area` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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

INSERT INTO `lawyers` (`id`, `fname`, `lname`, `gender`, `nic`, `practicing_area`, `address`, `contact`, `email`, `password`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(4, 'Kasuni', 'Humasha', 'Male', '623829917V', 'Defence', 'Galle', '0717863452', 'kasuni@gmail.com', '$2a$12$BrtDIV.aCj/3U8QsK.umteGHUtV4GP7vpsmgXLxfHus3ihplcivfW', NULL, NULL, '2021-11-02 04:32:39', '2022-05-29 00:40:10'),
(5, 'Sachintha', 'Achala', 'Male', '987329077V', 'Business', 'Gampaha', '0753846587', 'sachintha@gmail.com', 'Sachintha123', NULL, NULL, '2021-11-02 04:36:26', '2022-05-29 00:40:19'),
(6, 'Pasan', 'Bandara', 'Male', '965777457V', 'Intellectual Property', 'Ampara', '0752238467', 'pasan@gmail.com', 'Pasan123', NULL, NULL, '2022-01-02 06:37:10', '2022-05-29 00:40:00'),
(7, 'Bimal', 'Jayawardana', 'Male', '988734377V', 'Family', 'Matara', '0789445748', 'bimal@gmail.com', 'Bimal123', NULL, NULL, '2022-01-02 07:04:24', '2022-05-29 00:39:51'),
(8, 'Anura', 'Jayathilaka', 'Male', '986567554V', 'Defence', 'Gampaha', '0784563328', 'anura@gmail.com', 'Anura123', NULL, NULL, '2022-01-02 07:06:13', '2022-05-29 00:39:37'),
(9, 'Kalpana', 'Sawindi', 'Male', '984567223V', 'Business', 'Matara', '0768944589', 'kalpana@gmail.com', 'Kalpana123', NULL, NULL, '2022-01-02 07:07:51', '2022-05-29 00:39:21'),
(10, 'Manoj', 'Peiris', 'Male', '989667345V', 'Civil Rights', 'Gampaha', '0769984254', 'manoj@gmail.com', 'Manoj123', NULL, NULL, '2022-01-03 02:04:56', '2022-05-29 00:38:57'),
(11, 'Minoli', 'Jayawansha', 'Male', '908766787V', 'Labour', 'Kalutara', '0768894567', 'minoli@gmail.com', 'Minoli123', NULL, NULL, '2022-01-03 02:15:49', '2022-05-29 00:38:42'),
(12, 'Supun', 'Malshan', 'Male', '987654867V', 'Bancruptcy', 'Badulla', '0789887653', 'supun@gmail.com', 'Supun123', NULL, NULL, '2022-01-03 02:20:32', '2022-05-29 00:38:24'),
(13, 'Fiham', 'Rajabdeen', 'Male', '987665437V', 'Labour', 'Negambo', '0756775432', 'fiham@gmail.com', 'Fiham123', NULL, NULL, '2022-01-03 02:23:14', '2022-05-29 00:38:06'),
(14, 'Anusha', 'Silva', 'Male', '9876675432', 'Finance and Securities', 'Matara', '0789956345', 'anusha@gmail.com', 'Anusha123', NULL, NULL, '2022-01-03 02:25:47', '2022-05-29 00:37:50'),
(15, 'Shiham', 'Gause', 'Male', '976998345V', 'Intellectual Property', 'Trincomalee', '0782228845', 'shiham@gmail.com', 'Shiham123', NULL, NULL, '2022-01-03 03:13:10', '2022-05-29 00:37:36'),
(16, 'Girija', 'Ayyar', 'Male', '97556249V', 'Defence', 'Jaffna', '07134588265', 'girija@gmail.com', 'Girija123', NULL, NULL, '2022-01-03 03:15:21', '2022-05-29 00:37:21'),
(17, 'Vignesh', 'Kumar', 'Male', '946648732V', 'Family', 'Nuwaraeliya', '0713212987', 'vignesh@gmail.com', 'Vignesh123', NULL, NULL, '2022-01-03 03:17:19', '2022-05-29 00:37:00'),
(18, 'Mahroof', 'Mohamed', 'Male', '945883105V', 'Labour', 'Colombo', '0753725986', 'mahroof@gmail.com', 'Mahroof123', NULL, NULL, '2022-01-03 03:21:01', '2022-05-29 00:36:45'),
(19, 'Yousuf', 'Nasar', 'Male', '987334275V', 'Civil Rights', 'Kandy', '0715588255', 'yousuf@gmail.com', 'Yousuf123', NULL, NULL, '2022-01-03 03:23:01', '2022-05-29 00:30:51'),
(20, 'Hiroshani', 'Kulathunga', 'Male', '984891205V', 'Intellectual Property', 'Hambantota', '0773284100', 'hiroshani@gmail.com', 'Hiroshani123', NULL, NULL, '2022-01-03 03:25:04', '2022-05-28 23:19:33'),
(21, 'Kunal', 'Peiris', 'Male', '987665439v', 'Business', 'Galle', '0776653158', 'kunal@gmail.com', 'Kunal123', NULL, NULL, '2022-05-23 07:35:15', '2022-05-28 23:19:10'),
(22, 'Gihani', 'Charundya', 'Female', '977827183V', 'Defence', 'Gampaha', '0789223710', 'gihani@gmail.com', 'Gihani123', NULL, NULL, '2022-05-28 23:09:09', '2022-05-28 23:09:09'),
(23, 'Thowfeek', 'Khan', 'Male', '854125478V', 'Business', 'Maradana', '0779854785', 'thowfeek@gmail.com', '$2y$10$wCc7st2anifizqe7GOhx6OQwvwn9NoDWmwlU6k84d5BOCcKm7Ie4K', NULL, NULL, '2022-05-29 13:42:14', '2022-05-29 13:42:14');

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
(9, '2021_12_24_141854_create_attendances_table', 6),
(11, '2022_01_07_132017_create_appointments_table', 7),
(14, '2022_01_24_125818_create_payments_table', 8),
(15, '2022_01_25_065759_create_notifications_table', 8),
(17, '2022_02_07_120304_create_inventory_table', 9),
(18, '2022_02_12_134419_create_cases_table', 10);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `notice_subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notice_content` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notice_date` date NOT NULL,
  `notice_time` time NOT NULL,
  `notice_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `recipient` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `notice_subject`, `notice_content`, `notice_date`, `notice_time`, `notice_type`, `recipient`, `created_at`, `updated_at`) VALUES
(9, 'New Branch Opening', 'New Branch is opening  in Bambalapitiya on 1st of March', '2022-02-20', '10:00:00', 'Public', 'Public', '2022-02-16 04:11:27', '2022-02-16 04:11:27'),
(10, 'Office Closure for New Year', 'Office will be closed from 10th April to 20th April for New Year', '2022-04-05', '12:00:00', 'Announcement', 'Public', '2022-02-16 04:15:09', '2022-02-16 04:15:28'),
(11, 'Appointment fee Change', 'Appointment fee will be increased by Rs. 500 from Next Month', '2022-01-25', '17:30:00', 'Announcement', 'Clients', '2022-02-16 04:18:19', '2022-02-16 04:18:19'),
(12, 'Annual Dinner', 'Get ready for the annual dinner of the company on this month last weekend', '2022-02-14', '20:30:00', 'Special', 'Lawyers', '2022-02-16 04:26:05', '2022-02-16 04:26:05'),
(13, 'Payment Statement', 'Find your payment statement for this month  in your mail box', '2022-02-25', '22:00:00', 'Announcement', 'Lawyers', '2022-02-16 04:29:12', '2022-02-16 04:29:12'),
(14, 'National Law Conference', 'National Law Conference will be held on 19th and 20th of February at Galadari Hotel Colombo', '2022-02-10', '20:00:00', 'Special', 'Lawyers', '2022-02-16 04:35:56', '2022-02-16 04:35:56'),
(15, 'Lawyers Day', 'Thanking you for your great support to the company and the our clients and wishing you a happy Lawyers Day', '2022-04-12', '06:00:00', 'Special', 'Lawyers', '2022-02-16 04:42:27', '2022-02-16 04:42:27'),
(16, 'Woman\'s Day Arrangements', 'A series of seminars on \"Woman\'s Right and Law\" are arranged for woman\'s day. Get yourself registered for participate in the seminar', '2022-02-25', '10:00:00', 'Public', 'Public', '2022-02-16 04:51:52', '2022-02-16 04:51:52'),
(17, 'Document Collection', 'Documents related to your lawsuit can be collected at last Tuesday and Friday of every month', '2022-02-15', '10:00:00', 'Public', 'Public', '2022-02-16 04:56:47', '2022-02-16 04:57:23'),
(18, 'Temporary Closure of the Office', 'Office will be temporarily closed for next two weeks', '2022-02-13', '08:00:00', 'Announcement', 'Clients + Lawyers', '2022-02-16 04:59:03', '2022-02-16 04:59:03'),
(19, '1st Lawsuit Discount', 'Get a 10% discount for your 1st lawsuit by registering with us', '2022-02-20', '09:45:00', 'Public', 'Public', '2022-02-16 05:02:14', '2022-02-16 05:02:14'),
(20, 'New Year Wishes', 'Wish You all a happy and prosperous new year', '2022-01-01', '00:00:00', 'Special', 'Public', '2022-02-16 05:04:37', '2022-02-16 05:04:37'),
(21, 'Postponing Appointment', 'Appointments Scheduled for 18th February morning will be postponed for 21st February morning', '2022-02-16', '16:30:00', 'Announcement', 'Clients', '2022-02-16 05:07:33', '2022-02-16 05:07:33');

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
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lawyer_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` date NOT NULL,
  `payment_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` decimal(6,2) NOT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `client_id`, `lawyer_id`, `date`, `payment_type`, `amount`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, '1', '4', '2022-02-20', 'Active', '1500.00', NULL, NULL, '2022-02-16 05:08:29', '2022-02-16 05:27:44'),
(2, '3', '19', '2022-02-21', 'Active', '500.00', NULL, NULL, '2022-02-16 05:11:33', '2022-02-16 05:11:33'),
(3, '1', '4', '2022-02-22', 'Active', '1500.00', NULL, NULL, '2022-02-16 05:12:21', '2022-02-16 05:30:20'),
(4, '7', '16', '2022-02-22', 'Active', '300.00', NULL, NULL, '2022-02-16 05:13:16', '2022-02-16 05:13:16'),
(5, '8', '14', '2022-02-23', 'Active', '200.00', NULL, NULL, '2022-02-16 05:19:34', '2022-02-16 05:19:34'),
(6, '1', '4', '2022-02-20', 'Active', '1000.00', NULL, NULL, '2022-02-16 05:20:15', '2022-02-16 05:30:39'),
(7, '10', '12', '2022-02-17', 'Cancelled', '500.00', NULL, NULL, '2022-02-16 05:21:05', '2022-02-16 05:21:05'),
(8, '11', '19', '2022-02-23', 'Pending', '900.00', NULL, NULL, '2022-02-16 05:23:08', '2022-02-16 05:23:08'),
(9, '12', '11', '2022-02-24', 'Pending', '500.00', NULL, NULL, '2022-02-16 05:23:54', '2022-02-16 05:23:54'),
(10, '13', '10', '2022-02-10', 'Cancelled', '1000.00', NULL, NULL, '2022-02-16 05:25:22', '2022-02-16 05:25:22'),
(11, '2', '19', '2022-02-20', 'Active', '500.00', NULL, NULL, '2022-02-16 05:26:21', '2022-02-16 05:26:21'),
(12, '15', '8', '2022-02-24', 'Pending', '1500.00', NULL, NULL, '2022-02-16 05:26:59', '2022-02-16 05:26:59'),
(13, '16', '6', '2022-02-24', 'Active', '300.00', NULL, NULL, '2022-02-16 05:27:28', '2022-02-16 05:27:28'),
(14, '17', '5', '2022-02-25', 'Active', '1000.00', NULL, NULL, '2022-02-16 05:29:18', '2022-02-16 05:29:18'),
(15, '18', '12', '2022-02-25', 'Pending', '200.00', NULL, NULL, '2022-02-16 05:30:12', '2022-02-16 05:30:12'),
(16, '19', '4', '2022-02-19', 'Pending', '500.00', NULL, NULL, '2022-02-16 05:31:10', '2022-02-16 05:31:10'),
(17, '20', '20', '2022-02-17', 'Pending', '300.00', NULL, NULL, '2022-02-16 05:31:44', '2022-02-16 05:31:44'),
(18, '11', '18', '2022-02-10', 'Cancelled', '500.00', NULL, NULL, '2022-02-16 05:37:07', '2022-02-16 05:37:07'),
(19, '10', '16', '2022-02-23', 'Active', '500.00', NULL, NULL, '2022-02-16 05:38:40', '2022-02-16 05:38:40'),
(20, '2', '13', '2022-02-18', 'Pending', '1000.00', NULL, NULL, '2022-02-16 05:39:11', '2022-02-16 05:39:11'),
(21, '6', '10', '2022-05-28', 'Pending', '1000.00', NULL, NULL, '2022-05-28 09:24:30', '2022-05-28 09:24:30');

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
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendances`
--
ALTER TABLE `attendances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cases`
--
ALTER TABLE `cases`
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
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
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
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `attendances`
--
ALTER TABLE `attendances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `cases`
--
ALTER TABLE `cases`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `deed_requests`
--
ALTER TABLE `deed_requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `lawyers`
--
ALTER TABLE `lawyers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

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
