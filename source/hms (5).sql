-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 14, 2021 at 08:06 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hms`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointements`
--

CREATE TABLE `appointements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `in_patient_id` bigint(20) UNSIGNED DEFAULT NULL,
  `doctor_id` bigint(20) UNSIGNED DEFAULT NULL,
  `appoint_date` date NOT NULL,
  `serial` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `problem` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `appointements`
--

INSERT INTO `appointements` (`id`, `in_patient_id`, `doctor_id`, `appoint_date`, `serial`, `problem`, `status`, `created_by`, `updated_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 3, 14, '2021-12-20', '1', 'asas', 1, 2, 2, NULL, '2021-12-14 11:54:29', '2021-12-14 11:54:29');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`, `description`, `deleted_at`, `created_at`, `updated_at`) VALUES
(9, 'Child', 'a', NULL, NULL, '2021-12-02 00:21:46'),
(10, 'Cardiology', 'b', NULL, NULL, '2021-12-02 00:21:31'),
(12, 'Eye', 'c', NULL, '2021-11-29 07:14:03', '2021-12-02 00:21:16'),
(13, 'ENT', 'dd', NULL, '2021-11-30 09:16:11', '2021-12-04 00:09:11');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `specialization` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `e_qualification` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '0=>suspended,1=>active,2=>retired',
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `department_id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `name`, `specialization`, `e_qualification`, `designation`, `contact`, `email`, `address`, `status`, `image`, `department_id`, `employee_id`, `user_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(11, 'Emran', 'ENT', 'mbbs', 'Professor', '12', 'emran@gmail.com', 'emran address', 1, 'images/1638423231.jpg', 13, 14, 28, NULL, '2021-12-01 23:33:51', '2021-12-02 00:22:40'),
(12, 'sakib', 'Eye', 'mbbs', 'Sr. Doctor', '123456', 'sakib_doctor@gmail.com', 'sakibaddress', 1, 'images/1638426324.png', 9, 16, 30, NULL, '2021-12-02 00:25:24', '2021-12-02 00:25:51'),
(13, 'raihan', 'Child', 'mbbs', 'Professor', '1234567', 'raihan@gmail.com', 'raihan address', 1, 'images/1638426412.jpg', 9, 17, 31, NULL, '2021-12-02 00:26:52', '2021-12-02 00:33:31'),
(14, 'Asma Akterr', 'no jani2', 'bekar2', 'Professor', '01326566562', 'irfanvai.ctg@gmail.com', 'Kazir Dewri', 1, 'images/1638468962.png', 9, 18, 33, NULL, '2021-12-02 12:16:02', '2021-12-06 09:28:07');

-- --------------------------------------------------------

--
-- Table structure for table `doctorschedules`
--

CREATE TABLE `doctorschedules` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `doctor_id` bigint(20) UNSIGNED NOT NULL,
  `weekday_id` bigint(20) UNSIGNED NOT NULL,
  `dutyshift_id` bigint(20) UNSIGNED NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '1=>active,2=>inactive',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `doctorschedules`
--

INSERT INTO `doctorschedules` (`id`, `doctor_id`, `weekday_id`, `dutyshift_id`, `status`, `created_by`, `updated_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 14, 4, 3, 1, 2, 2, NULL, '2021-12-11 05:47:59', '2021-12-11 10:16:14'),
(2, 14, 6, 3, 1, 2, 2, NULL, '2021-12-11 10:08:52', '2021-12-11 10:15:58');

-- --------------------------------------------------------

--
-- Table structure for table `dutyshifts`
--

CREATE TABLE `dutyshifts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `end_time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '1=>active,2=>inactive',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dutyshifts`
--

INSERT INTO `dutyshifts` (`id`, `name`, `start_time`, `end_time`, `status`, `created_by`, `updated_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'irfan', '01:05', '23:05', 1, NULL, 2, NULL, '2021-12-10 06:50:01', '2021-12-10 07:46:35'),
(2, 'Otto', '10:50', '20:40', 1, 2, NULL, NULL, '2021-12-10 06:56:23', '2021-12-10 06:56:23'),
(3, 'Asma Akter', '12:00', '16:00', 1, 2, NULL, NULL, '2021-12-10 07:47:01', '2021-12-10 07:47:01');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `joining_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `e_qualification` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `b_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '0=>suspended,1=>active,2=>retired',
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `name`, `address`, `contact`, `email`, `image`, `joining_date`, `designation`, `e_qualification`, `b_date`, `status`, `user_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(14, '2', 'emran address', '12', 'emran@gmail.com', 'images/1638423231.jpg', '2021-12-02 06:22:40', '', '', '2021-12-05', 1, 28, NULL, '2021-12-01 23:33:51', '2021-12-02 00:22:40'),
(15, '2', 'nurse_one address', '123', 'nurse_one@gmail.com', 'images/1638423468.png', '2021-12-02 06:22:21', '', '', '2021-12-14', 1, 29, NULL, '2021-12-01 23:37:48', '2021-12-02 00:22:21'),
(16, 'sakib', 'sakibaddress', '123456', 'sakib_doctor@gmail.com', 'images/1638426324.png', '2021-12-02 06:25:50', '', '', '2021-12-14', 2, 30, NULL, '2021-12-02 00:25:24', '2021-12-02 00:25:50'),
(17, 'raihan', 'raihan address', '1234567', 'raihan@gmail.com', 'images/1638426412.jpg', '2021-12-02 06:33:31', '', '', '2021-12-13', 2, 31, NULL, '2021-12-02 00:26:52', '2021-12-02 00:33:31'),
(18, 'Asma Akterr', 'Kazir Dewri', '01326566562', 'irfanvai.ctg@gmail.com', 'images/1638468962.png', '2021-12-06 15:28:07', 'Professor', 'bekar2', '2021-12-22', 1, 33, NULL, '2021-12-02 12:16:02', '2021-12-06 09:28:07'),
(19, 'Asma Akter nurezs', 'Kazir Dewri', '019796041000000', 'trynurse@email.com', 'images/1638472580.png', '2021-12-02 19:16:20', '', '', '2021-12-31', 1, 35, NULL, '2021-12-02 13:16:20', '2021-12-02 13:16:20'),
(20, 'aaaaaa', 'aaaaaaaaaaaaaas', 'aaaaaaaaaaaas', 'aaaaaaaaaaaaas@gmail.com', 'images/1638621994.png', '2021-12-04 14:43:53', 'xxcv', 'dffsdf', '2021-12-14', 2, 36, NULL, '2021-12-04 06:46:34', '2021-12-04 08:43:53');

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
-- Table structure for table `in_patients`
--

CREATE TABLE `in_patients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `patient_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `core_casualty` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `b_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `blood` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `weight` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `height` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `referred_by` bigint(20) UNSIGNED NOT NULL,
  `room_id` bigint(20) UNSIGNED NOT NULL,
  `admit_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `release_date` timestamp NULL DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '1=>admitted,2=>released',
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `in_patients`
--

INSERT INTO `in_patients` (`id`, `patient_id`, `name`, `contact`, `email`, `address`, `core_casualty`, `b_date`, `blood`, `weight`, `height`, `image`, `referred_by`, `room_id`, `admit_date`, `release_date`, `status`, `user_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(3, 'PA-IN-1425', 'ajhar', '019796041000', 'ajhar@gmail.com', 'ajhar', 'high pressuse', '2021-12-05', 'A+', '70', '5', 'images/1638426657.jpg', 13, 9, '2021-12-11 19:35:15', NULL, 2, 32, NULL, '2021-12-02 00:30:58', '2021-12-02 00:34:03');

-- --------------------------------------------------------

--
-- Table structure for table `medicinebrands`
--

CREATE TABLE `medicinebrands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `medicinebrands`
--

INSERT INTO `medicinebrands` (`id`, `name`, `description`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Renata Pharmaceuticals Limited', NULL, NULL, NULL, NULL),
(2, 'Incepta Pharmaceuticals Limited.', NULL, NULL, NULL, NULL),
(3, 'Beximco Pharmaceuticals Limited.', NULL, NULL, NULL, NULL),
(4, 'Square Pharmaceuticals Limited.', NULL, NULL, NULL, NULL),
(5, 'Irfann', 'dd', NULL, '2021-12-06 11:36:03', '2021-12-06 11:44:05');

-- --------------------------------------------------------

--
-- Table structure for table `medicinedetails`
--

CREATE TABLE `medicinedetails` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `medicinegeneric_id` bigint(20) UNSIGNED NOT NULL,
  `medicinebrand_id` bigint(20) UNSIGNED NOT NULL,
  `purchase_price` double(12,2) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sale_price` double(12,2) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '0=>Inactive,1=>active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `medicinedetails`
--

INSERT INTO `medicinedetails` (`id`, `name`, `description`, `medicinegeneric_id`, `medicinebrand_id`, `purchase_price`, `image`, `sale_price`, `deleted_at`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Ace', 'Paracetamol is indicated for fever, common cold and influenza, headache, toothache, earache, bodyache, myalgia, neuralgia, dysmenorrhoea, sprains, colic pain, back pain, post-operative pain, postpartum pain, inflammatory pain and post vaccination pain in ', 1, 4, 20.00, NULL, 25.00, NULL, 1, NULL, NULL),
(2, 'Monas', 'For Ezma', 3, 3, 12.00, '68747470733a2f2f692e696d6775722e636f6d2f4a48797866415a2e6a7067.jpg', 16.00, NULL, 1, '2021-12-05 13:54:06', '2021-12-05 13:54:06'),
(3, 'Irfan', 'dd', 1, 2, 12.00, 'images/1638799311.png', 160.00, NULL, 1, '2021-12-06 08:01:51', '2021-12-06 09:36:32');

-- --------------------------------------------------------

--
-- Table structure for table `medicinegenerics`
--

CREATE TABLE `medicinegenerics` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `medicinegenerics`
--

INSERT INTO `medicinegenerics` (`id`, `name`, `description`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Paracetamol', NULL, NULL, NULL, NULL),
(2, 'Multivitamin & Multimineral', NULL, NULL, NULL, NULL),
(3, 'Montelucast', NULL, NULL, NULL, NULL),
(4, 'Aceclofenac', NULL, NULL, NULL, NULL),
(5, 'Irfann', 'dd', NULL, '2021-12-06 11:58:45', '2021-12-06 12:22:24');

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
(1, '2013_11_26_063138_create_roles_table', 1),
(2, '2014_10_12_000000_create_users_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2015_11_27_173959_create_departments_table', 1),
(5, '2015_11_27_174336_create_employees_table', 1),
(6, '2015_11_27_190359_create_rooms_table', 1),
(7, '2019_08_19_000000_create_failed_jobs_table', 1),
(8, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(9, '2021_11_27_173833_create_doctors_table', 1),
(10, '2021_11_27_174027_create_nurses_table', 1),
(11, '2021_11_27_184513_create_in_patients_table', 1),
(12, '2021_11_27_184533_create_out_patients_table', 1),
(13, '2021_12_04_184952_create_medicine_generics_table', 2),
(21, '2021_12_04_191440_create_medicinebrands_table', 3),
(22, '2021_12_04_191459_create_medicinegenerics_table', 3),
(23, '2021_12_04_191545_create_medicinedetails_table', 3),
(24, '2021_12_06_155843_create_testdetails_table', 4),
(25, '2021_12_09_190019_create_dutyshifts_table', 5),
(28, '2021_12_10_064100_create_dutyshifts_table', 6),
(29, '2021_12_10_094724_weekdays', 6),
(30, '2021_12_10_190510_create_doctorschedules_table', 7),
(32, '2021_12_11_183428_create_appointements_table', 8);

-- --------------------------------------------------------

--
-- Table structure for table `nurses`
--

CREATE TABLE `nurses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `specialization` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `e_qualification` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department_id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nurses`
--

INSERT INTO `nurses` (`id`, `name`, `specialization`, `e_qualification`, `designation`, `address`, `contact`, `email`, `image`, `department_id`, `employee_id`, `user_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(2, 'nurse_one', 'ENT', 'nsa', 'Sr. Nurse', 'nurse_one address', '123', 'nurse_one@gmail.com', 'images/1638423468.png', 13, 15, 29, '2021-12-02 00:22:21', '2021-12-01 23:37:48', '2021-12-02 00:22:21'),
(3, 'Asma Akter nurezs', 'vbnv', 'cvv', 'Professor', 'Kazir Dewri', '019796041000000', 'trynurse@email.com', 'images/1638472580.png', 12, 19, 35, NULL, '2021-12-02 13:16:20', '2021-12-02 13:16:20');

-- --------------------------------------------------------

--
-- Table structure for table `out_patients`
--

CREATE TABLE `out_patients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `patient_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `core_casualty` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `b_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `blood` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `weight` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `height` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `out_patients`
--

INSERT INTO `out_patients` (`id`, `patient_id`, `name`, `contact`, `email`, `address`, `core_casualty`, `b_date`, `blood`, `weight`, `height`, `image`, `user_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(2, NULL, 'Asma Akter', '0132656656221', 'tryaaaa@email.com', 'Kazir Dewri', 'as', '2021-12-28', 'as', 'as', 'as', 'images/1638471139.png', 34, NULL, '2021-12-02 12:52:19', '2021-12-02 12:52:19');

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
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `identity` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `type`, `identity`, `created_at`, `updated_at`) VALUES
(1, 'Superadmin', 'superadmin', '2021-11-27 13:29:16', NULL),
(2, 'Admin', 'admin', '2021-11-27 13:29:16', NULL),
(3, 'Doctor', 'doctor', '2021-11-27 13:29:16', NULL),
(4, 'Patient', 'patient', '2021-11-27 13:29:16', NULL),
(5, 'Nurse', 'nurse', '2021-11-27 13:29:16', NULL),
(6, 'Receptionist', 'receptionist', '2021-11-27 13:29:16', NULL),
(7, 'CaseManager', 'casemanager', '2021-11-27 13:29:16', NULL),
(8, 'Laboratorist', 'laboratorist', '2021-11-27 13:29:16', NULL),
(9, 'Pharmacist', 'pharmacist', '2021-11-27 13:29:16', NULL),
(10, 'Accountant', 'accountant', '2021-11-27 13:29:16', NULL),
(11, 'Employee', 'guest', '2021-11-27 13:29:16', NULL),
(12, 'Guest', 'guest', '2021-11-27 13:29:16', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `room_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `room_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '1=>reserved,2=>free',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `room_no`, `room_type`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(7, '101', 'special', 2, NULL, NULL, NULL),
(8, '102', 'normal', 2, NULL, NULL, NULL),
(9, '103', 'normal', 2, NULL, NULL, '2021-12-04 00:13:51');

-- --------------------------------------------------------

--
-- Table structure for table `testdetails`
--

CREATE TABLE `testdetails` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `charge` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testdetails`
--

INSERT INTO `testdetails` (`id`, `name`, `type`, `description`, `charge`, `created_at`, `updated_at`) VALUES
(1, 'Irfann', 'ass', 'sss', '10.00', '2021-12-06 12:54:22', '2021-12-06 12:54:34');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '0 => inactive,\n                1 => active,\n                2 => pending,\n                3 => freeze,\n                4 => block',
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `contact`, `image`, `status`, `role_id`, `email_verified_at`, `password`, `remember_token`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'irfanadmin', 'irfanadmin', 'irfanadmin@gmail.com', '01837604101', NULL, 1, 2, NULL, '10470c3b4b1fed12c3baac014be15fac67c6e815', NULL, NULL, '2021-11-28 08:26:33', '2021-11-28 08:26:33'),
(2, 'irfansuperadmin', 'irfansuperadmin', 'irfansuperadmin@gmail.com', '01837604100', NULL, 1, 1, NULL, '10470c3b4b1fed12c3baac014be15fac67c6e815', NULL, NULL, '2021-11-28 08:26:33', '2021-11-28 08:26:33'),
(3, 'irfandoctor', 'irfandoctor', 'irfandoctor@gmail.com', '01837604102', NULL, 1, 3, NULL, '10470c3b4b1fed12c3baac014be15fac67c6e815', NULL, NULL, '2021-11-28 08:26:33', '2021-11-28 08:26:33'),
(4, 'irfanpatient', 'irfanpatient', 'irfanpatient@gmail.com', '01837604103', NULL, 0, 4, NULL, '10470c3b4b1fed12c3baac014be15fac67c6e815', NULL, NULL, '2021-11-28 08:26:33', '2021-12-01 12:44:45'),
(5, 'irfannurse', 'irfannurse', 'irfannurse@gmail.com', '01837604104', NULL, 1, 5, NULL, '10470c3b4b1fed12c3baac014be15fac67c6e815', NULL, NULL, '2021-11-28 08:26:33', '2021-11-28 08:26:33'),
(6, 'irfanreceptionist', 'irfanreceptionist', 'irfanreceptionist@gmail.com', '01837604105', NULL, 1, 6, NULL, '10470c3b4b1fed12c3baac014be15fac67c6e815', NULL, NULL, '2021-11-28 08:26:33', '2021-11-28 08:26:33'),
(7, 'irfancasemanager', 'irfancasemanager', 'irfancasemanager@gmail.com', '01837604106', NULL, 1, 7, NULL, '10470c3b4b1fed12c3baac014be15fac67c6e815', NULL, NULL, '2021-11-28 08:26:33', '2021-11-28 08:26:33'),
(8, 'irfanlaboratorist', 'irfanlaboratorist', 'irfanlaboratorist@gmail.com', '01837604107', NULL, 1, 8, NULL, '10470c3b4b1fed12c3baac014be15fac67c6e815', NULL, NULL, '2021-11-28 08:26:33', '2021-11-28 08:26:33'),
(9, 'irfanpharmacist', 'irfanpharmacist', 'irfanpharmacist@gmail.com', '01837604108', NULL, 1, 9, NULL, '10470c3b4b1fed12c3baac014be15fac67c6e815', NULL, NULL, '2021-11-28 08:26:33', '2021-11-28 08:26:33'),
(10, 'irfanaccountant', 'irfanaccountant', 'irfanaccountant@gmail.com', '01837604109', NULL, 1, 10, NULL, '10470c3b4b1fed12c3baac014be15fac67c6e815', NULL, NULL, '2021-11-28 08:26:33', '2021-11-28 08:26:33'),
(11, 'irfanuser', 'irfanuser', 'irfanuser@gmail.com', '018376041010', NULL, 1, 11, NULL, '10470c3b4b1fed12c3baac014be15fac67c6e815', NULL, NULL, '2021-11-28 08:26:33', '2021-11-28 08:26:33'),
(12, 'irfan new', 'userrname', 'admin@email.com', '014444', 'images/1638290458.png', 2, 3, NULL, '41e5033d7a2349be7a5991ecb85d39b0a9ae918a', NULL, NULL, '2021-11-30 10:40:58', '2021-12-04 01:11:18'),
(28, 'Emran', 'emran', 'emran@gmail.com', '12', 'images/1638423231.jpg', 0, 3, NULL, '10470c3b4b1fed12c3baac014be15fac67c6e815', NULL, NULL, '2021-12-01 23:33:51', '2021-12-02 00:22:40'),
(29, 'nurse_one', 'nurse_one', 'nurse_one@gmail.com', '123', 'images/1638423468.png', 0, 5, NULL, '10470c3b4b1fed12c3baac014be15fac67c6e815', NULL, NULL, '2021-12-01 23:37:48', '2021-12-02 00:22:21'),
(30, 'sakib', 'sakib', 'sakib_doctor@gmail.com', '123456', 'images/1638426324.png', 0, 3, NULL, '10470c3b4b1fed12c3baac014be15fac67c6e815', NULL, NULL, '2021-12-02 00:25:24', '2021-12-02 00:25:51'),
(31, 'raihan', 'raihan', 'raihan@gmail.com', '1234567', 'images/1638426412.jpg', 0, 3, NULL, '10470c3b4b1fed12c3baac014be15fac67c6e815', NULL, NULL, '2021-12-02 00:26:52', '2021-12-02 00:33:31'),
(32, 'ajhar', 'ajhar', 'ajhar@gmail.com', '019796041000', 'images/1638426657.jpg', 1, 4, NULL, '10470c3b4b1fed12c3baac014be15fac67c6e815', NULL, NULL, '2021-12-02 00:30:57', '2021-12-04 01:10:29'),
(33, 'Asma Akterr', 'asma', 'irfanvai.ctg@gmail.com', '01326566562', 'images/1638468962.png', 1, 3, NULL, '10470c3b4b1fed12c3baac014be15fac67c6e815', NULL, NULL, '2021-12-02 12:16:02', '2021-12-06 09:28:07'),
(34, 'Asma Akter', 'asma_121212', 'tryaaaa@email.com', '0132656656221', 'images/1638471139.png', 1, 4, NULL, '10470c3b4b1fed12c3baac014be15fac67c6e815', NULL, NULL, '2021-12-02 12:52:19', '2021-12-02 12:52:19'),
(35, 'Asma Akter nurezs', 'Amasnurse', 'trynurse@email.com', '019796041000000000000', 'images/1638472580.png', 1, 5, NULL, '10470c3b4b1fed12c3baac014be15fac67c6e815', NULL, NULL, '2021-12-02 13:16:20', '2021-12-04 01:10:14'),
(36, 'aaaaaa', 'aaaaaaaaaaaaaa', 'aaaaaaaaaaaaas@gmail.com', 'aaaaaaaaaaaas', 'images/1638621994.png', 0, 11, NULL, '10470c3b4b1fed12c3baac014be15fac67c6e815', NULL, NULL, '2021-12-04 06:46:34', '2021-12-04 08:43:53');

-- --------------------------------------------------------

--
-- Table structure for table `weekdays`
--

CREATE TABLE `weekdays` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `weekdays`
--

INSERT INTO `weekdays` (`id`, `name`) VALUES
(1, 'Friday'),
(2, 'Saturday'),
(3, 'Sunday'),
(4, 'Monday'),
(5, 'Tuesday'),
(6, 'Wednesday'),
(7, 'Thursday');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointements`
--
ALTER TABLE `appointements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `appointements_in_patient_id_foreign` (`in_patient_id`),
  ADD KEY `appointements_doctor_id_foreign` (`doctor_id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `doctors_department_id_foreign` (`department_id`),
  ADD KEY `doctors_employee_id_foreign` (`employee_id`),
  ADD KEY `doctors_user_id_foreign` (`user_id`);

--
-- Indexes for table `doctorschedules`
--
ALTER TABLE `doctorschedules`
  ADD PRIMARY KEY (`id`),
  ADD KEY `doctorschedules_doctor_id_foreign` (`doctor_id`),
  ADD KEY `doctorschedules_weekday_id_foreign` (`weekday_id`),
  ADD KEY `doctorschedules_dutyshift_id_foreign` (`dutyshift_id`);

--
-- Indexes for table `dutyshifts`
--
ALTER TABLE `dutyshifts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employees_user_id_foreign` (`user_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `in_patients`
--
ALTER TABLE `in_patients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `in_patients_referred_by_foreign` (`referred_by`),
  ADD KEY `in_patients_room_id_foreign` (`room_id`),
  ADD KEY `in_patients_user_id_foreign` (`user_id`);

--
-- Indexes for table `medicinebrands`
--
ALTER TABLE `medicinebrands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medicinedetails`
--
ALTER TABLE `medicinedetails`
  ADD PRIMARY KEY (`id`),
  ADD KEY `medicinedetails_medicinegeneric_id_foreign` (`medicinegeneric_id`),
  ADD KEY `medicinedetails_medicinebrand_id_foreign` (`medicinebrand_id`);

--
-- Indexes for table `medicinegenerics`
--
ALTER TABLE `medicinegenerics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nurses`
--
ALTER TABLE `nurses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nurses_department_id_foreign` (`department_id`),
  ADD KEY `nurses_employee_id_foreign` (`employee_id`),
  ADD KEY `nurses_user_id_foreign` (`user_id`);

--
-- Indexes for table `out_patients`
--
ALTER TABLE `out_patients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `out_patients_user_id_foreign` (`user_id`);

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
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testdetails`
--
ALTER TABLE `testdetails`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `testdetails_name_unique` (`name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_email_verified_at_unique` (`email_verified_at`),
  ADD KEY `users_role_id_index` (`role_id`);

--
-- Indexes for table `weekdays`
--
ALTER TABLE `weekdays`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointements`
--
ALTER TABLE `appointements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `doctorschedules`
--
ALTER TABLE `doctorschedules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `dutyshifts`
--
ALTER TABLE `dutyshifts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `in_patients`
--
ALTER TABLE `in_patients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `medicinebrands`
--
ALTER TABLE `medicinebrands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `medicinedetails`
--
ALTER TABLE `medicinedetails`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `medicinegenerics`
--
ALTER TABLE `medicinegenerics`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `nurses`
--
ALTER TABLE `nurses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `out_patients`
--
ALTER TABLE `out_patients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `testdetails`
--
ALTER TABLE `testdetails`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `weekdays`
--
ALTER TABLE `weekdays`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointements`
--
ALTER TABLE `appointements`
  ADD CONSTRAINT `appointements_doctor_id_foreign` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `appointements_in_patient_id_foreign` FOREIGN KEY (`in_patient_id`) REFERENCES `in_patients` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `doctors`
--
ALTER TABLE `doctors`
  ADD CONSTRAINT `doctors_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `doctors_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `doctors_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `doctorschedules`
--
ALTER TABLE `doctorschedules`
  ADD CONSTRAINT `doctorschedules_doctor_id_foreign` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `doctorschedules_dutyshift_id_foreign` FOREIGN KEY (`dutyshift_id`) REFERENCES `dutyshifts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `doctorschedules_weekday_id_foreign` FOREIGN KEY (`weekday_id`) REFERENCES `weekdays` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `employees_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `in_patients`
--
ALTER TABLE `in_patients`
  ADD CONSTRAINT `in_patients_referred_by_foreign` FOREIGN KEY (`referred_by`) REFERENCES `doctors` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `in_patients_room_id_foreign` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `in_patients_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `medicinedetails`
--
ALTER TABLE `medicinedetails`
  ADD CONSTRAINT `medicinedetails_medicinebrand_id_foreign` FOREIGN KEY (`medicinebrand_id`) REFERENCES `medicinebrands` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `medicinedetails_medicinegeneric_id_foreign` FOREIGN KEY (`medicinegeneric_id`) REFERENCES `medicinegenerics` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `nurses`
--
ALTER TABLE `nurses`
  ADD CONSTRAINT `nurses_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `nurses_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `nurses_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `out_patients`
--
ALTER TABLE `out_patients`
  ADD CONSTRAINT `out_patients_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
