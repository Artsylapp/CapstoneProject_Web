-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 12, 2024 at 11:08 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `viammdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts_tbl`
--

CREATE TABLE `accounts_tbl` (
  `accounts_tbl_id` int(11) NOT NULL,
  `accounts_tbl_empType` varchar(11) NOT NULL,
  `accounts_tbl_name` varchar(50) NOT NULL,
  `accounts_tbl_address` varchar(50) NOT NULL,
  `accounts_tbl_contact` varchar(13) NOT NULL,
  `accounts_tbl_status` varchar(1000) NOT NULL,
  `accounts_tbl_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `accounts_tbl`
--

INSERT INTO `accounts_tbl` (`accounts_tbl_id`, `accounts_tbl_empType`, `accounts_tbl_name`, `accounts_tbl_address`, `accounts_tbl_contact`, `accounts_tbl_status`, `accounts_tbl_image`) VALUES
(12, 'Admin', 'Cashier Account', 'Testing Address', '09763266834', 'AVAILABLE', ''),
(13, 'Masseur', 'Masseur Account', 'Testing Address', '09763266834', 'AVAILABLE', ''),
(14, 'Masseur', 'Cyrus Jazer Montero', 'MPlace Tower A 2227', '09763266834', 'AVAILABLE', '');

-- --------------------------------------------------------

--
-- Table structure for table `api_keys_tbl`
--

CREATE TABLE `api_keys_tbl` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `api_key` varchar(40) NOT NULL,
  `level` int(2) NOT NULL,
  `ignore_limits` tinyint(1) NOT NULL,
  `is_private_key` tinyint(1) NOT NULL,
  `ip_addresses` text DEFAULT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `api_keys_tbl`
--

INSERT INTO `api_keys_tbl` (`id`, `user_id`, `api_key`, `level`, `ignore_limits`, `is_private_key`, `ip_addresses`, `date_created`) VALUES
(1, 0, 'viamm_key', 0, 0, 0, NULL, '2024-05-20 11:35:38');

-- --------------------------------------------------------

--
-- Table structure for table `company_tbl`
--

CREATE TABLE `company_tbl` (
  `company_tbl_id` int(11) NOT NULL,
  `company_tbl_name` varchar(1000) NOT NULL,
  `company_tbl_pass` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `company_tbl`
--

INSERT INTO `company_tbl` (`company_tbl_id`, `company_tbl_name`, `company_tbl_pass`) VALUES
(1, 'TEST', 'PASSWORD');

-- --------------------------------------------------------

--
-- Table structure for table `location_tbl`
--

CREATE TABLE `location_tbl` (
  `location_tbl_id` int(11) NOT NULL,
  `location_tbl_name` varchar(1000) NOT NULL,
  `location_tbl_status` varchar(1000) NOT NULL,
  `location_tbl_type` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `location_tbl`
--

INSERT INTO `location_tbl` (`location_tbl_id`, `location_tbl_name`, `location_tbl_status`, `location_tbl_type`) VALUES
(1, 'Chair 1', 'Open', 'Chair'),
(2, 'Chair 2', 'Open', 'Chair'),
(3, 'Chair 3', 'Open', 'Chair'),
(4, 'Table 1', 'Open', 'Bed'),
(5, 'Table 2', 'Open', 'Bed'),
(6, 'Table 3', 'Open', 'Bed');

-- --------------------------------------------------------

--
-- Table structure for table `orders_tbl`
--

CREATE TABLE `orders_tbl` (
  `orders_tbl_id` int(11) NOT NULL,
  `orders_tbl_details` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `orders_tbl_status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `services_tbl`
--

CREATE TABLE `services_tbl` (
  `services_tbl_id` int(11) NOT NULL,
  `services_tbl_name` varchar(50) NOT NULL,
  `services_tbl_description` varchar(255) NOT NULL,
  `services_tbl_price` int(30) NOT NULL,
  `services_tbl_designation` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `services_tbl`
--

INSERT INTO `services_tbl` (`services_tbl_id`, `services_tbl_name`, `services_tbl_description`, `services_tbl_price`, `services_tbl_designation`) VALUES
(2, 'Whole Body - 1 Hour (In Bed)', 'Whole body massage for 1 hour, in bed.', 350, 'Bed'),
(3, 'Whole Body - 1 Hour 30 Minutes(In Bed)', 'Whole body massage for 1 hour and 30 minutes, in bed.', 550, 'Bed'),
(4, 'Half Body - 30 Minutes (In Bed)', 'Half body massage for 30 minutes, in bed.', 250, 'Bed'),
(5, 'Whole Body - 1 Hour (On Chair)', 'Whole body massage for 1 hour, sitting.', 300, 'Chair'),
(6, 'Whole Body - 1 Hour 30 Minutes (On Chair)', 'Whole body massage for 1 hour and 30 minutes, sitting.', 450, 'Chair'),
(7, 'Half-Body Upper - 30 Minutes (On Chair)', 'Half body upper massage for 30 minutes, sitting.', 200, 'Chair'),
(8, 'Half-Body Upper - 1 Hour (On Chair)', 'Half body massage for 1 hour, sitting.', 300, 'Chair'),
(9, 'Half-Body Lower - 30 Minutes (On Chair)', 'Half body lower massage for 30 minutes, sitting.', 200, 'Chair'),
(10, 'Half-Body Lower - 1 Hour (On Chair)', 'Half-body lower massage for 1 hour, sitting', 300, 'Chair');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts_tbl`
--
ALTER TABLE `accounts_tbl`
  ADD PRIMARY KEY (`accounts_tbl_id`);

--
-- Indexes for table `api_keys_tbl`
--
ALTER TABLE `api_keys_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company_tbl`
--
ALTER TABLE `company_tbl`
  ADD PRIMARY KEY (`company_tbl_id`);

--
-- Indexes for table `location_tbl`
--
ALTER TABLE `location_tbl`
  ADD PRIMARY KEY (`location_tbl_id`);

--
-- Indexes for table `orders_tbl`
--
ALTER TABLE `orders_tbl`
  ADD PRIMARY KEY (`orders_tbl_id`);

--
-- Indexes for table `services_tbl`
--
ALTER TABLE `services_tbl`
  ADD PRIMARY KEY (`services_tbl_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts_tbl`
--
ALTER TABLE `accounts_tbl`
  MODIFY `accounts_tbl_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `api_keys_tbl`
--
ALTER TABLE `api_keys_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `company_tbl`
--
ALTER TABLE `company_tbl`
  MODIFY `company_tbl_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `location_tbl`
--
ALTER TABLE `location_tbl`
  MODIFY `location_tbl_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `orders_tbl`
--
ALTER TABLE `orders_tbl`
  MODIFY `orders_tbl_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `services_tbl`
--
ALTER TABLE `services_tbl`
  MODIFY `services_tbl_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
