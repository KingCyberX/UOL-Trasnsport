-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 23, 2023 at 05:48 PM
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
-- Database: `busscarddb`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_updates`
--

CREATE TABLE `add_updates` (
  `update_id` int(11) NOT NULL,
  `heading` varchar(255) NOT NULL,
  `paragraph` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `add_updates`
--

INSERT INTO `add_updates` (`update_id`, `heading`, `paragraph`, `created_at`) VALUES
(3, 'Route No 1', 'Route 1 Is not available till summers 4 oct', '2023-09-13 05:50:52'),
(4, 'ngbvn', 'thh', '2023-11-15 05:46:18'),
(5, 'Route 5 40 Bypass -- Uol', 'Not Avaible', '2023-11-23 08:18:09');

-- --------------------------------------------------------

--
-- Table structure for table `capacities`
--

CREATE TABLE `capacities` (
  `route_no` int(11) NOT NULL,
  `capacity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `capacities`
--

INSERT INTO `capacities` (`route_no`, `capacity`) VALUES
(1, 100),
(2, 100),
(3, 100),
(4, 100),
(5, 100),
(6, 100),
(7, 100),
(8, 100),
(9, 100),
(10, 100),
(11, 100),
(12, 100),
(13, 100),
(14, 100),
(15, 100),
(16, 100),
(17, 100),
(18, 100),
(19, 100),
(20, 100);

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` int(11) NOT NULL,
  `city_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `city_name`) VALUES
(13, 'Route 1 Sargodha--Uol'),
(14, 'Route 2 Bhera--Uol	'),
(16, 'Route 3 Chiniot--Uol	'),
(18, 'Route 4 49 Tail--Uol'),
(19, 'Route 5 Muqam e Hayyat--Uol'),
(20, 'Route 5 40 Bypass -- Uol		'),
(22, 'Route 2 Javaid--Uol	'),
(23, '	Route 9 Chakwal--Uol');

-- --------------------------------------------------------

--
-- Table structure for table `daily_reports`
--

CREATE TABLE `daily_reports` (
  `id` int(11) NOT NULL,
  `route_id` int(11) NOT NULL,
  `description` text NOT NULL,
  `report_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `daily_reports`
--

INSERT INTO `daily_reports` (`id`, `route_id`, `description`, `report_date`) VALUES
(1, 13, 'asddddddd', '2023-11-14'),
(2, 13, 'zzzzzzzzz', '2023-11-14'),
(12, 20, '10 students', '2023-11-15'),
(14, 18, '70 students', '2023-11-20'),
(15, 18, '70 students', '2023-11-21');

-- --------------------------------------------------------

--
-- Table structure for table `pickup_points`
--

CREATE TABLE `pickup_points` (
  `id` int(11) NOT NULL,
  `point_name` varchar(255) NOT NULL,
  `city_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pickup_points`
--

INSERT INTO `pickup_points` (`id`, `point_name`, `city_id`) VALUES
(10, '40 Phatak', 13),
(11, 'Gill wala', 13),
(12, 'Satlitetown', 13),
(13, 'Bhera', 14),
(14, 'Bhawal', 14),
(15, 'Sargodha', 14),
(16, 'Muqqam e Hayyat', 19),
(17, 'Satlitetown', 19),
(20, '9 No Chowngi', 19),
(21, 'Gill Wala', 20),
(23, 'Satlitetown', 22),
(24, 'Satlitetown', 23),
(25, 'Satlitetown', 23);

-- --------------------------------------------------------

--
-- Table structure for table `routetable`
--

CREATE TABLE `routetable` (
  `id` int(11) NOT NULL,
  `route_name` varchar(255) NOT NULL,
  `day` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `routetable`
--

INSERT INTO `routetable` (`id`, `route_name`, `day`) VALUES
(4, 'Route 1 Sargodha -- UOL', 'weekend'),
(17, 'Route 1 Sargodha -- UOL	', 'weekday'),
(18, 'Route 2 Bhera -- UOL	', 'weekday'),
(19, 'Route 3 Chiniot -- UOL	', 'weekday'),
(20, 'Route 5 40 Bypass -- Uol', 'weekday'),
(22, 'nsb xhcbhds', 'weekend'),
(23, 'Route 5 40 Bypass -- Uol', 'weekend');

-- --------------------------------------------------------

--
-- Table structure for table `studentinfo`
--

CREATE TABLE `studentinfo` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `unireg` varchar(34) NOT NULL,
  `uniemail` varchar(99) NOT NULL,
  `studentimage` varchar(999) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `depart` varchar(23) NOT NULL,
  `program` varchar(45) NOT NULL,
  `address` varchar(89) NOT NULL,
  `source` varchar(32) NOT NULL,
  `subsource` varchar(98) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `expire_date` date NOT NULL,
  `route_no` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `studentinfo`
--

INSERT INTO `studentinfo` (`id`, `name`, `unireg`, `uniemail`, `studentimage`, `phone`, `depart`, `program`, `address`, `source`, `subsource`, `date`, `expire_date`, `route_no`) VALUES
(15, 'Muhammad Osama', 'Bcs07213027', 'bcs07213027@student.uol.edu.pk', 'upload/osama.jpg', '03000297461', 'Computer Sciences', 'Bachloer', 'Gill Wala Sargodha', 'Sargodha', 'Gill wala', '2023-09-13 10:26:45', '2023-12-09', 3),
(16, 'Muhammad Osama', 'bsse07203031', 'bcs072130ss27@student.uol.edu.pk', 'upload/hands.jpg', '+923000297461', 'Behavioral Sciences', 'Bachloer', 'Sargodha,Punjab', 'wwww', 'gillwala', '2023-11-13 15:55:09', '2023-12-09', 4),
(17, 'tariq', 'bcs0721302755', 'bcs0721302755@student.uol.edu.pk', 'upload/hands.jpg', '03000000987', 'DOVS', 'Bachloer', 'Sargodha,Punjab', 'Route 1 Sargodha--Uol', 'Gill wala', '2023-11-13 22:22:30', '2023-12-09', 7),
(18, 'Sami ur Rehman', 'bcs07213052', 'bcs07213052@student.uol.edu.pk', 'upload/WhatsApp Image 2023-11-15 at 12.55.56_ad2745b6.jpg', '03046060055', 'Computer Sciences', 'Bachloer', 'Maqaam-e-Hayyat', 'Route 5 Muqam e Hayyat--Uol', 'Muqqam e Hayyat', '2023-11-15 13:00:57', '2023-12-09', 10),
(19, 'ARSHAD SALEEM', 'MSITS07223023', 'msits07223023@student.uol.edu.pk', 'upload/11.jpg', '03338319280', 'Computer Sciences', 'Mphil', 'Sargodha', 'Route 1 Sargodha--Uol', 'Sargodha', '2023-11-21 12:01:34', '2023-12-09', 11),
(20, 'Muhammad Osama', 'bscs07213099', 'bcs07213099@student.uol.edu.pk', 'upload/11.jpg', '+923000297461', 'Computer Sciences', 'Bachloer', 'Sargodha,Punjab', 'Route 1 Sargodha--Uol', 'Gill Wala', '2023-11-23 13:13:32', '0000-00-00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `subroutes`
--

CREATE TABLE `subroutes` (
  `id` int(11) NOT NULL,
  `subroute_name` varchar(255) NOT NULL,
  `route_id` int(11) DEFAULT NULL,
  `day_type` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subroutes`
--

INSERT INTO `subroutes` (`id`, `subroute_name`, `route_id`, `day_type`) VALUES
(31, 'Sargodha', 4, 'weekend'),
(32, 'Sargodha', 17, 'weekday'),
(33, 'Sargodha', 18, 'weekday'),
(34, 'Sargodha', 19, 'weekday'),
(35, 'Deen Colony', 20, 'weekday'),
(38, 'Gill Wala', 23, 'weekend'),
(39, 'Kanchi Mor', 23, 'weekend');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `admin_email` varchar(22) NOT NULL,
  `admin_pass` varchar(999) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `admin_email`, `admin_pass`, `date`) VALUES
(8, 'a@gmail.com', '$2y$10$QLKJSaVBjpBnRVm2XxhuLecC.DHRtNgKr.EsrLTW6wWVkwbdoyBeW', '2023-11-07 18:19:10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add_updates`
--
ALTER TABLE `add_updates`
  ADD PRIMARY KEY (`update_id`);

--
-- Indexes for table `capacities`
--
ALTER TABLE `capacities`
  ADD PRIMARY KEY (`route_no`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `daily_reports`
--
ALTER TABLE `daily_reports`
  ADD PRIMARY KEY (`id`),
  ADD KEY `route_id` (`route_id`);

--
-- Indexes for table `pickup_points`
--
ALTER TABLE `pickup_points`
  ADD PRIMARY KEY (`id`),
  ADD KEY `city_id` (`city_id`);

--
-- Indexes for table `routetable`
--
ALTER TABLE `routetable`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `studentinfo`
--
ALTER TABLE `studentinfo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subroutes`
--
ALTER TABLE `subroutes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `route_id` (`route_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `add_updates`
--
ALTER TABLE `add_updates`
  MODIFY `update_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `daily_reports`
--
ALTER TABLE `daily_reports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `pickup_points`
--
ALTER TABLE `pickup_points`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `routetable`
--
ALTER TABLE `routetable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `studentinfo`
--
ALTER TABLE `studentinfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `subroutes`
--
ALTER TABLE `subroutes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `daily_reports`
--
ALTER TABLE `daily_reports`
  ADD CONSTRAINT `daily_reports_ibfk_1` FOREIGN KEY (`route_id`) REFERENCES `cities` (`id`);

--
-- Constraints for table `pickup_points`
--
ALTER TABLE `pickup_points`
  ADD CONSTRAINT `pickup_points_ibfk_1` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`);

--
-- Constraints for table `subroutes`
--
ALTER TABLE `subroutes`
  ADD CONSTRAINT `subroutes_ibfk_1` FOREIGN KEY (`route_id`) REFERENCES `routetable` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
