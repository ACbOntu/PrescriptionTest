-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 15, 2020 at 11:31 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `prescription`
--

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
(7, '2020_08_13_071158_create_prescriptions_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('acbontu@gmail.com', '$2y$10$LBy84vn0enyg6vYrq2BmkeAz4Yp4Q15Hg/.f2LbV2rzwoH.tsmk9y', '2020-08-14 10:53:12');

-- --------------------------------------------------------

--
-- Table structure for table `prescriptions`
--

CREATE TABLE `prescriptions` (
  `id` int(10) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `patient_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `patient_age` int(10) UNSIGNED NOT NULL,
  `gender` int(11) NOT NULL DEFAULT 1 COMMENT '0=female|1=male|2=others',
  `diagnosis` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `medicines` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `next_visit` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `prescriptions`
--

INSERT INTO `prescriptions` (`id`, `date`, `patient_name`, `patient_age`, `gender`, `diagnosis`, `medicines`, `user_id`, `next_visit`, `created_at`, `updated_at`) VALUES
(1, '2020-08-15', 'ONTU CHAKRABARTI', 42, 1, 'Cough', 'Fexo', 1, '2020-08-20', '2020-08-14 21:59:16', '2020-08-14 22:39:47'),
(2, '2020-07-29', 'ONTU CHAKRABARTI', 12, 1, '213', 'dasd', 1, '2020-08-08', '2020-08-14 22:09:26', '2020-08-14 22:09:26'),
(3, '2020-08-15', 'MD.Hasn', 20, 1, 'Cough', 'Syrap:adovas', 1, '2020-08-18', '2020-08-14 22:16:56', '2020-08-14 22:52:13'),
(6, '2020-08-07', 'Aysa Begum', 25, 0, 'Fever', 'paracetamol', 1, '2020-08-12', '2020-08-14 22:24:55', '2020-08-14 22:24:55'),
(7, '2020-07-09', 'Anita Chakrabarti', 46, 0, 'High blood pressur', 'Bizoran', 1, '2020-08-31', '2020-08-14 22:31:54', '2020-08-14 22:31:54'),
(9, '2020-06-10', 'Borna', 13, 0, 'Cough', 'Fexo 120mg', 1, '2020-07-25', '2020-08-15 00:07:50', '2020-08-15 00:07:50'),
(10, '2020-07-09', 'Neeti Mohan', 28, 0, 'Headace', 'Vagone', 1, '2020-07-31', '2020-08-15 02:36:18', '2020-08-15 02:39:30'),
(11, '2020-07-09', 'MD.Rashed Khan', 36, 1, 'Fever', 'Paracetamol', 1, '2020-07-19', '2020-08-15 02:38:50', '2020-08-15 02:38:50'),
(12, '2020-08-20', 'Avishakh', 23, 1, 'Cough', 'paracetamol', 1, '2020-08-25', '2020-08-15 02:41:32', '2020-08-15 02:41:32'),
(13, '2020-08-15', 'Mr. Y', 34, 1, 'Cough, Fever', 'Napa', 2, '2020-08-16', '2020-08-15 03:08:15', '2020-08-15 03:08:55'),
(14, '2020-08-15', 'Mr. A', 24, 2, 'Cold Fever', 'Paracetamol', 2, '2020-08-20', '2020-08-15 03:29:30', '2020-08-15 03:29:52');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `username`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Ontu', 'Chakrabarti', 'Ontu Chakrabarti', 'acbontu@gmail.com', '$2y$10$FDRGivgMIz3RwkcVlKKcVu1P0Op8lM3xGzBmTpfYqGRUfVKdUNKcq', 'j0c0bsRR2O9tlfOcC7dzArJI8MULkSkDPrMXF1xJBpCV0xFJjq290ID3QCas', '2020-08-13 02:28:56', '2020-08-13 02:28:56'),
(2, 'ACb', 'Ontu', 'ACb Ontu', 'ontu12@cse.pstu.ac.bd', '$2y$10$gLUnRDgljfBZ6X4lP61Grer.MH1lYo00dTeiJUxlaQL3t.L6KDAsa', '29oBmwUvU9zpxabveky1CU1gB9ae2khkadTVYRkYGzTi4oKYPig6hMbAFgwJ', '2020-08-13 09:25:26', '2020-08-13 09:25:26');

--
-- Indexes for dumped tables
--

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
-- Indexes for table `prescriptions`
--
ALTER TABLE `prescriptions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `prescriptions_user_id_foreign` (`user_id`);

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
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `prescriptions`
--
ALTER TABLE `prescriptions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `prescriptions`
--
ALTER TABLE `prescriptions`
  ADD CONSTRAINT `prescriptions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
