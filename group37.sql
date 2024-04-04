-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 11, 2024 at 06:08 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `group37`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_tbl`
--

CREATE TABLE `admin_tbl` (
  `admin_ID` int(11) NOT NULL,
  `first_name` varchar(111) NOT NULL,
  `last_name` varchar(111) NOT NULL,
  `username` varchar(111) NOT NULL,
  `password` varchar(111) NOT NULL,
  `email` varchar(111) NOT NULL,
  `position` varchar(111) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_tbl`
--

INSERT INTO `admin_tbl` (`admin_ID`, `first_name`, `last_name`, `username`, `password`, `email`, `position`, `date`) VALUES
(1, 'Aenon', 'Sarmenta', 'bogart', '93a3536b5ca2848705e965598447293ae7edadef', 'sarmentaaenon@gmail.com', 'Designer', '2024-02-25 15:11:10'),
(2, 'joshua', 'garcia', 'dominicpama', '0e68a8f820ca458767f88ec98fe00b9902f905fe', 'dominicpama@gmail.com', 'manager', '2024-02-28 00:28:22');

-- --------------------------------------------------------

--
-- Table structure for table `details_tbl`
--

CREATE TABLE `details_tbl` (
  `details_ID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `mop` varchar(111) NOT NULL,
  `address` varchar(111) NOT NULL,
  `location_details` varchar(111) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `details_tbl`
--

INSERT INTO `details_tbl` (`details_ID`, `UserID`, `mop`, `address`, `location_details`) VALUES
(1, 1, 'Gcash', 'Bacolod City', 'bangga Totong'),
(2, 1, 'Gcash', 'Bacolod City', 'bangga Totong'),
(3, 2, 'Gcash', 'dsadas', 'dsadas'),
(4, 2, 'Gcash', 'rwrw', 'rwrw'),
(5, 2, 'Gcash', 'james', 'pama'),
(6, 2, 'Gcash', 'yeah', 'yeah'),
(7, 2, 'Gcash', 'yeah', 'yeah'),
(8, 2, 'Gcash', 'silay', 'bcd'),
(9, 2, 'Gcash', 'jru', 'hey'),
(10, 2, 'Gcash', 'sdas', 'sdadsa'),
(11, 2, 'Gcash', 'james', 'pama');

-- --------------------------------------------------------

--
-- Table structure for table `remark`
--

CREATE TABLE `remark` (
  `id` int(11) NOT NULL,
  `frm_id` int(11) NOT NULL,
  `status` varchar(111) NOT NULL,
  `remark` mediumtext NOT NULL,
  `remarkDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `remark`
--

INSERT INTO `remark` (`id`, `frm_id`, `status`, `remark`, `remarkDate`) VALUES
(1, 9, 'in process', 'Pakadto na maam', '2024-02-26 15:28:47'),
(2, 9, 'accept', 'thank you', '2024-03-07 01:40:43'),
(3, 9, 'reject', '657575', '2024-03-07 01:41:13'),
(4, 9, 'missing', '856856', '2024-03-07 01:41:19'),
(5, 9, 'missing', 'dasdsa', '2024-03-07 01:44:40'),
(6, 9, 'missing', '2131', '2024-03-07 01:45:21'),
(8, 9, 'in process', 'rwrwrw', '2024-03-07 16:47:45'),
(9, 9, 'accept', 'ayoooo', '2024-03-07 16:49:06'),
(10, 9, 'rejected', 'dsdsds', '2024-03-07 16:51:42'),
(11, 9, 'accept', 'ayoo', '2024-03-07 16:54:22'),
(12, 9, 'missing', 'sdsds', '2024-03-07 16:57:50'),
(13, 15, 'accept', 'formid', '2024-03-07 17:04:58'),
(14, 14, 'closed', '412421', '2024-03-07 17:05:27'),
(15, 13, 'reject', 'pls work', '2024-03-07 17:08:47'),
(16, 13, 'rejected', 'jikgh', '2024-03-07 17:09:17'),
(17, 15, 'missing', '46', '2024-03-07 17:10:09'),
(18, 14, 'reject', '213123', '2024-03-07 17:10:33'),
(19, 9, 'in process', '23', '2024-03-07 17:11:20'),
(20, 9, 'closed', '2342', '2024-03-07 17:11:46'),
(21, 19, 'missing', '3222', '2024-03-07 17:24:15'),
(22, 12, 'closed', 'sdsds', '2024-03-07 17:24:37'),
(23, 17, 'closed', '24242', '2024-03-07 17:25:02'),
(24, 18, 'missing', '42141', '2024-03-07 17:25:20'),
(25, 16, 'reject', '2424', '2024-03-07 17:25:35'),
(26, 20, 'missing', 'ayoo', '2024-03-07 17:35:32'),
(27, 19, 'accept', 'hey', '2024-03-07 17:41:27'),
(28, 21, 'reject', 'hey', '2024-03-07 17:42:02'),
(29, 22, 'closed', 'heyyyo', '2024-03-07 17:56:30'),
(30, 24, 'closed', 'yeah', '2024-03-11 04:39:33'),
(31, 23, 'closed', 'yeahyeah', '2024-03-11 04:42:10');

-- --------------------------------------------------------

--
-- Table structure for table `services_tbl`
--

CREATE TABLE `services_tbl` (
  `services_ID` int(11) NOT NULL,
  `title` varchar(111) NOT NULL,
  `info` varchar(111) NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `services_tbl`
--

INSERT INTO `services_tbl` (`services_ID`, `title`, `info`, `price`) VALUES
(1, 'WASH-DRY-FOLD PER BAG', 'Php 40 per kilo min. of 4 kilos', 160.00),
(2, 'WASH-DRY-PRESS', 'Php 50 per kilo min. of 4 kilos', 200.00),
(3, 'COMFORTER', '1 pc- Single to Queen sized comforter', 300.00),
(4, 'SUIT', 'Up a piece', 500.00),
(5, 'GOWN', 'Up a piece; simple and no embellishment', 700.00),
(6, 'BARONG', 'Up a piece; 3-5 days', 300.00);

-- --------------------------------------------------------

--
-- Table structure for table `user_orders_tbl`
--

CREATE TABLE `user_orders_tbl` (
  `order_ID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `details_ID` int(11) NOT NULL,
  `title` varchar(111) NOT NULL,
  `quantity` varchar(111) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `status` varchar(111) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `remark` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_orders_tbl`
--

INSERT INTO `user_orders_tbl` (`order_ID`, `UserID`, `details_ID`, `title`, `quantity`, `price`, `status`, `date`, `remark`) VALUES
(9, 1, 0, 'WASH-DRY-FOLD PER BAG', '1', 160.00, 'closed', '2024-03-07 17:11:46', '2342'),
(10, 1, 0, 'COMFORTER', '1', 300.00, NULL, '2024-02-26 15:31:33', NULL),
(15, 2, 0, 'WASH-DRY-FOLD PER BAG', '4', 160.00, 'missing', '2024-03-07 17:10:09', '46'),
(17, 2, 0, 'GOWN', '1', 700.00, 'closed', '2024-03-07 17:25:02', '24242'),
(18, 2, 0, 'WASH-DRY-FOLD PER BAG', '1', 160.00, 'missing', '2024-03-07 17:25:20', '42141'),
(19, 2, 0, 'WASH-DRY-FOLD PER BAG', '7', 160.00, 'accept', '2024-03-07 17:41:27', 'hey'),
(20, 2, 0, 'WASH-DRY-FOLD PER BAG', '6', 160.00, 'missing', '2024-03-07 17:35:32', 'ayoo'),
(21, 2, 0, 'BARONG', '3', 300.00, 'reject', '2024-03-07 17:42:02', 'hey'),
(22, 2, 0, 'COMFORTER', '4', 300.00, 'closed', '2024-03-07 17:56:30', 'heyyyo'),
(23, 2, 0, 'GOWN', '1', 700.00, 'closed', '2024-03-11 04:42:10', 'yeahyeah'),
(24, 2, 0, 'WASH-DRY-FOLD PER BAG', '4', 160.00, 'closed', '2024-03-11 04:39:33', 'yeah');

-- --------------------------------------------------------

--
-- Table structure for table `user_tbl`
--

CREATE TABLE `user_tbl` (
  `UserID` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `first_name` varchar(200) NOT NULL,
  `last_name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone` varchar(25) NOT NULL,
  `password` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `status` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_tbl`
--

INSERT INTO `user_tbl` (`UserID`, `username`, `first_name`, `last_name`, `email`, `phone`, `password`, `address`, `status`, `date`) VALUES
(1, 'bogart', 'Aenon', 'Sarmenta', 'sarmentaaenon@gmail.com', '09063244739', '93a3536b5ca2848705e965598447293ae7edadef', '', 0, '2024-02-25 18:59:05'),
(2, 'zehfury', 'tulutoi', 'toi', 'jamesdominic@gmail.com', '0923092302', 'cba4b0048e474fd9dae5a21fa7ca14904a104624', 'bcd', 0, '2024-03-07 01:40:06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_tbl`
--
ALTER TABLE `admin_tbl`
  ADD PRIMARY KEY (`admin_ID`);

--
-- Indexes for table `details_tbl`
--
ALTER TABLE `details_tbl`
  ADD PRIMARY KEY (`details_ID`);

--
-- Indexes for table `remark`
--
ALTER TABLE `remark`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services_tbl`
--
ALTER TABLE `services_tbl`
  ADD PRIMARY KEY (`services_ID`);

--
-- Indexes for table `user_orders_tbl`
--
ALTER TABLE `user_orders_tbl`
  ADD PRIMARY KEY (`order_ID`);

--
-- Indexes for table `user_tbl`
--
ALTER TABLE `user_tbl`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_tbl`
--
ALTER TABLE `admin_tbl`
  MODIFY `admin_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `details_tbl`
--
ALTER TABLE `details_tbl`
  MODIFY `details_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `remark`
--
ALTER TABLE `remark`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `services_tbl`
--
ALTER TABLE `services_tbl`
  MODIFY `services_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_orders_tbl`
--
ALTER TABLE `user_orders_tbl`
  MODIFY `order_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `user_tbl`
--
ALTER TABLE `user_tbl`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
