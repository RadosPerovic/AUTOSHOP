-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 28, 2020 at 04:23 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `autoshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `artikal`
--

CREATE TABLE `artikal` (
  `id` int(30) NOT NULL,
  `naziv` varchar(30) NOT NULL,
  `cena` varchar(30) NOT NULL,
  `marka` varchar(30) NOT NULL,
  `opis` varchar(1000) NOT NULL,
  `kolicina` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `artikal`
--

INSERT INTO `artikal` (`id`, `naziv`, `cena`, `marka`, `opis`, `kolicina`) VALUES
(1, 'zupcasti kais', '2000', 'Audi', 'Veoma kvalitetan zupcasti kais za audi', 23),
(2, 'Cilindar menjaca', '5000', 'Peugeot', 'ovo je cilindar menjaca za peugeot', 10),
(3, 'DPF filter', '25124', 'VW', 'DPF Filter za VW automobile', 10),
(4, 'Volan', '12000', 'Audi', 'Menjac za audi', 9),
(5, 'Amortizeri', '2600', 'Peugeot', 'amortizeri u paru za peugeot', 2),
(6, 'Zadnja poluosovina', '9000', 'Skoda', 'zadnja poluosovina za skodu', 2),
(7, 'Prednji trap i solje', '6500', 'Opel', 'prednji trap i solje za opel', 50),
(8, 'Rucica za menjac', '2000', 'citroen', 'Rucica za menjac modela automobila Citroen', 123),
(9, 'Instrument tabla', '5122', 'Skoda', 'instrument tabla za skodu', 6),
(10, 'Zupcasti kais', '2000', 'Audi', 'Veoma kvalitetan zupcasti kais za audi', 30),
(11, 'DPF filter', '25124', 'VW', 'DPF Filter za VW automobile', 12),
(12, 'Zadnja poluosovina', '9000', 'Skoda', 'zadnja poluosovina za skodu', 2),
(13, 'Prednji trap i soljee', '6500', 'Opel', 'prednji trap i solje za opel', 54),
(14, 'Zadnja poluosovina', '9000', 'Skoda', 'zadnja poluosovina za skodu', 2),
(15, 'Prednji trap i solje', '6500', 'Opel', 'prednji trap i solje za opel', 54),
(16, 'Prednji trap i solje', '6500', 'Opel', 'prednji trap i solje za opel', 54),
(17, 'Zupcasti kais', '2000', 'Audi', 'Veoma kvalitetan zupcasti kais za audi', 30),
(18, 'Zupcasti kais', '2000', 'Audi', 'Veoma kvalitetan zupcasti kais za audi', 30),
(19, 'Zupcasti kais', '2000', 'Audi', 'Veoma kvalitetan zupcasti kais za audi', 30),
(20, 'DPF filter', '25124', 'VW', 'DPF Filter za VW automobile', 12),
(21, 'Cilindar menjaca', '5000', 'Peugeot', 'ovo je cilindar menjaca za peugeot', 10),
(22, 'DPF filter', '25124', 'VW', 'DPF Filter za VW automobile', 12),
(23, 'Volan', '12000', 'Audi', 'Menjac za audi', 9),
(24, 'Amortizeri', '2600', 'Peugeot', 'amortizeri u paru za peugeot', 5),
(25, 'Prednji trap i solje', '6500', 'Opel', 'prednji trap i solje za opel', 54),
(26, 'Volan', '12000', 'Audi', 'Menjac za audi', 9);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(4, '2020_02_12_002309_create_artikals_table', 1),
(5, '2020_02_12_005521_create_model_artikals_table', 2),
(6, '2020_02_12_210751_create_articles_table', 2),
(7, '2020_02_18_232509_create_user_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `model_artikals`
--

CREATE TABLE `model_artikals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(30) NOT NULL,
  `nacin_preuzimanja` varchar(30) NOT NULL,
  `adresa` varchar(150) DEFAULT NULL,
  `ukupna_vrednost` varchar(120) NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `datum_narucivanja` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `nacin_preuzimanja`, `adresa`, `ukupna_vrednost`, `id_user`, `datum_narucivanja`) VALUES
(26, 'dostava', 'Arcibalda Rajsa 2, Smederevo', '72,648.00', 13, '2020-02-24 20:46:44'),
(27, 'dostava', 'Zemunska 65, Valjevo', '9,200.00', 13, '2020-02-24 23:00:54'),
(28, 'preuzimanje', ', ', '8,000.00', 13, '2020-02-24 23:02:54'),
(29, 'preuzimanje', ', ', '8,000.00', 13, '2020-02-24 23:05:42'),
(30, 'preuzimanje', ', ', '8,000.00', 13, '2020-02-24 23:08:08'),
(31, 'preuzimanje', ', ', '5,000.00', 13, '2020-02-24 23:13:15'),
(32, 'preuzimanje', ', ', '5,000.00', 13, '2020-02-25 23:40:29'),
(33, 'dostava', 'Zemunska 65, Jagodina', '150,744.00', 14, '2020-02-26 01:07:08'),
(34, 'dostava', 'Arcibalda Rajsa 2, Smederevo', '11,600.00', 13, '2020-02-26 21:43:44'),
(35, 'preuzimanje', ', ', '5,200.00', 13, '2020-02-26 21:49:15'),
(36, 'preuzimanje', ', ', '5,200.00', 13, '2020-02-26 21:51:21'),
(37, 'preuzimanje', ', ', '5,200.00', 13, '2020-02-26 21:52:08'),
(38, 'preuzimanje', ', ', '5,200.00', 13, '2020-02-26 21:52:27'),
(39, 'preuzimanje', ', ', '7,800.00', 13, '2020-02-26 21:54:02'),
(40, 'dostava', 'Zemunska 65, Beograd', '58,048.00', 58, '2020-02-27 15:33:32'),
(41, 'dostava', 'Arcibalda Rajsa 2, Novi Sad', '23,800.00', 49, '2020-02-28 15:20:23');

-- --------------------------------------------------------

--
-- Table structure for table `orders_artikal`
--

CREATE TABLE `orders_artikal` (
  `id_order` int(30) NOT NULL,
  `id_artikal` int(30) NOT NULL,
  `kolicina` int(30) NOT NULL,
  `jedinicna_cena` varchar(30) NOT NULL,
  `ukupna_vrednost` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders_artikal`
--

INSERT INTO `orders_artikal` (`id_order`, `id_artikal`, `kolicina`, `jedinicna_cena`, `ukupna_vrednost`) VALUES
(27, 1, 1, '2000', 2000),
(28, 1, 1, '2000', 2000),
(29, 1, 1, '2000', 2000),
(30, 1, 1, '2000', 2000),
(41, 1, 8, '2000', 16000),
(31, 2, 1, '5000', 5000),
(32, 2, 1, '5000', 5000),
(26, 3, 2, '25124', 50248),
(33, 3, 6, '25124', 150744),
(40, 3, 2, '25124', 50248),
(26, 4, 1, '12000', 12000),
(26, 5, 4, '2600', 10400),
(34, 5, 4, '2600', 10400),
(35, 5, 2, '2600', 5200),
(38, 5, 2, '2600', 5200),
(39, 5, 3, '2600', 7800),
(40, 5, 3, '2600', 7800),
(41, 5, 3, '2600', 7800),
(27, 8, 3, '2000', 6000),
(28, 8, 3, '2000', 6000),
(29, 8, 3, '2000', 6000),
(30, 8, 3, '2000', 6000);

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
('radosperovic98@gmail.com', '$2y$10$Zlcjkrn3ulQYM3cAwaKJk.6T3g2sRBKpplopF90AWWjdXqHOpbx1O', '2020-02-22 14:05:44'),
('rados1717@its.edu.rs', '$2y$10$lAgNxhjxkcxycbo7gg9hIuSYFFTBqz5T7qwwkz0SXdncdloJDONR2', '2020-02-22 14:11:07');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(30) NOT NULL,
  `name` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`) VALUES
(1, 'SuperAdmin'),
(2, 'Admin'),
(3, 'User');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `id_role` int(30) NOT NULL DEFAULT 3,
  `id_user` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`id_role`, `id_user`) VALUES
(1, 1),
(1, 13),
(2, 3),
(2, 61),
(3, 14),
(3, 49),
(3, 58);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`) VALUES
(1, 'SuperAdmin', 'superadmin@superadmin.com', NULL, '$2y$10$dEG.ds0ApUwSLaIKB/60ju3/3LbT31qo9lEaCGKr0XOtUc01bIpLi', NULL),
(3, 'nikolaobicanadmin', 'nikolaobicanadmin@gmail.com', NULL, '$2y$10$aATOYa4jVDkCJedlNLYKOuaCoyNWS1Xh1XIW.U2aMWwcLgv7Wbimq', NULL),
(13, 'Rados', 'radosperovic98@gmail.com', NULL, '$2y$10$dQtn1040sJZBZX5s2GVLp.IX.nTMR4nzq/y6.9lU0VYafehEos9Ue', NULL),
(14, 'radosITS', 'rados1717@its.edu.rs', NULL, '$2y$10$eoKRmv4/H1Ly4sLI/K7z/.2j2KJU.Uy5O.BMkHdtBkclPuEn0yuOu', NULL),
(49, 'probaKorisnik', 'probaproba@proba.com', NULL, '$2y$10$eKVlRWDs5/v.8qS7mQV5ie/zgK01o30.q6c8gu1D1NUbItjZDClPG', NULL),
(58, 'ProbaKorisnik1', 'proba@proba.com', NULL, '$2y$10$LlQ512WkhopCaBS9eQ/nHOacx9hSKi95rVeB.N65G0QEvayvFnyTy', NULL),
(61, 'test', 'primer@email.com', NULL, '$2y$10$Hm893tzvAkD54LTDmHhLLOf05KCBortVcrVu4I.QVKlFifxHNVNje', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artikal`
--
ALTER TABLE `artikal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_artikals`
--
ALTER TABLE `model_artikals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `orders_artikal`
--
ALTER TABLE `orders_artikal`
  ADD PRIMARY KEY (`id_artikal`,`id_order`),
  ADD KEY `orderConstraint` (`id_order`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`id_role`,`id_user`),
  ADD KEY `userConstraint` (`id_user`);

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
-- AUTO_INCREMENT for table `artikal`
--
ALTER TABLE `artikal`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `model_artikals`
--
ALTER TABLE `model_artikals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Constraints for table `orders_artikal`
--
ALTER TABLE `orders_artikal`
  ADD CONSTRAINT `artikalContraint` FOREIGN KEY (`id_artikal`) REFERENCES `artikal` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orderConstraint` FOREIGN KEY (`id_order`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `roleConstraint` FOREIGN KEY (`id_role`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `userConstraint` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
