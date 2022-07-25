-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 25, 2022 at 12:36 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hottely`
--

-- --------------------------------------------------------

--
-- Table structure for table `properties`
--

CREATE TABLE `properties` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `location` text NOT NULL,
  `address` text NOT NULL,
  `number` bigint(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `properties`
--

INSERT INTO `properties` (`id`, `name`, `location`, `address`, `number`, `image`, `created_at`, `updated_at`) VALUES
(5, 'Fritz Klein', 'Aut exercitation aut', 'Labore et officia qu', 576, 'http://localhost/clg_prjct/public/storage/images/20088225005cd809de8d56d34bfbd74b6b578e4c4f.jpg', '2022-02-25 02:23:15', '2022-02-25 02:23:15'),
(6, 'rampuriya', 'bikaner', 'bikaner', 234567890, 'http://localhost/clg_prjct/public/storage/images/1903283793abcd.jpg', '2022-03-21 22:57:00', '2022-03-21 22:57:00'),
(7, 'rampuriya', 'bikaner', 'bikaner', 234567890, 'http://localhost/clg_prjct/public/storage/images/338574844abcd.jpg', '2022-03-21 22:57:00', '2022-03-21 22:57:00'),
(8, 'rampuriya', 'bikaner', 'bikaner', 234567890, 'http://localhost/clg_prjct/public/storage/images/1649370978abcd.jpg', '2022-03-21 22:57:01', '2022-03-21 22:57:01');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `mobile_number` varchar(255) DEFAULT NULL,
  `remember_me_token` varchar(255) DEFAULT NULL,
  `type` enum('admin','users') DEFAULT 'users',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `mobile_number`, `remember_me_token`, `type`, `created_at`, `updated_at`) VALUES
(1, 'admin@gmail.com', '$2y$10$EOr516NWQwl.6geGMNeqquzILyC3tT1lWyj.QNUFw26CoQ8wUSAJO', NULL, NULL, 'admin', '2021-11-17 13:53:05', '2021-11-19 05:16:18');

-- --------------------------------------------------------

--
-- Table structure for table `vouchers`
--

CREATE TABLE `vouchers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone_number` bigint(110) NOT NULL,
  `check_in` timestamp NOT NULL DEFAULT current_timestamp(),
  `check_out` timestamp NOT NULL DEFAULT current_timestamp(),
  `adult` int(11) DEFAULT NULL,
  `kids` int(11) DEFAULT NULL,
  `infants` int(11) DEFAULT NULL,
  `total_amount` int(11) DEFAULT NULL,
  `advance` int(11) DEFAULT NULL,
  `due` int(11) DEFAULT NULL,
  `property_id` int(11) NOT NULL,
  `booking_id` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vouchers`
--

INSERT INTO `vouchers` (`id`, `name`, `phone_number`, `check_in`, `check_out`, `adult`, `kids`, `infants`, `total_amount`, `advance`, `due`, `property_id`, `booking_id`, `created_at`, `updated_at`) VALUES
(5, 'Kyla Shaffer', 6375929596, '2022-02-24 19:52:00', '2022-02-26 01:22:00', 83, 71, 65, 49, 75, -26, 5, '145d26b5bb397e9c8c9b', '2022-02-25 02:25:11', '2022-02-25 02:25:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `properties`
--
ALTER TABLE `properties`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `vouchers`
--
ALTER TABLE `vouchers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `properties`
--
ALTER TABLE `properties`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `vouchers`
--
ALTER TABLE `vouchers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
