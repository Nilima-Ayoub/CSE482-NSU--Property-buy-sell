-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 19, 2022 at 12:40 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `482_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `apt_info`
--

CREATE TABLE `apt_info` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `place` varchar(255) NOT NULL,
  `size` int(11) NOT NULL,
  `bedrooms` int(11) NOT NULL,
  `bathrooms` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `contact_info` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `apt_info`
--

INSERT INTO `apt_info` (`id`, `user_id`, `title`, `place`, `size`, `bedrooms`, `bathrooms`, `price`, `contact_info`, `img`, `date`) VALUES
(26, 11, '1734 Sqft Flat Available For Sale In Uttara', 'Sector 13, Uttara, Dhaka', 1734, 3, 3, 70000, '01254672890', 'apt3.png', '2022-04-13 00:13:46'),
(30, 10, 'New Apartment Selling in Farmgate', 'Farmgate, Tejgaon, Dhaka', 1400, 2, 1, 600000, '01234567893', 'apt2.png', '2022-04-19 13:11:03'),
(33, 10, 'Selling Apartment at Dhanmondi', 'West Dhanmondi and Shangkar, Dhanmondi, Dhaka', 1200, 3, 2, 800000, '01765432768', 'apt1.png', '2022-04-19 13:17:26');

-- --------------------------------------------------------

--
-- Table structure for table `land_post`
--

CREATE TABLE `land_post` (
  `id` int(11) NOT NULL,
  `user_id` int(255) NOT NULL,
  `Title` text NOT NULL,
  `Land_Type` varchar(255) NOT NULL,
  `Place` varchar(255) NOT NULL,
  `Land_Size` int(255) NOT NULL,
  `Price` int(255) NOT NULL,
  `Contact_info` varchar(255) NOT NULL,
  `img` varchar(255) DEFAULT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `land_post`
--

INSERT INTO `land_post` (`id`, `user_id`, `Title`, `Land_Type`, `Place`, `Land_Size`, `Price`, `Contact_info`, `img`, `date`) VALUES
(58, 11, '138 Katha Plot Is Available For Lease In Ashulia', 'agricultural', 'Ashulia bazar, Savar, Dhaka', 138, 1250000, '01345673835', 'land2.png', '2022-04-19 12:51:44'),
(59, 10, 'Near 300 Fit 10 Katha South at Sector-2', 'residential', 'Purbachal New Town', 10, 252, '01345267856', 'land.png', '2022-04-19 13:14:55');

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `id` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `role` varchar(11) NOT NULL,
  `Email_address` varchar(255) NOT NULL,
  `Password` varchar(30) NOT NULL,
  `phone_number` int(11) NOT NULL,
  `totalPost` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`id`, `Name`, `role`, `Email_address`, `Password`, `phone_number`, `totalPost`) VALUES
(3, 'ADMIN', 'admin', 'admin@gmail.com', 'Admin1', 1234578911, 0),
(10, 'Nilima', 'user', 'nilima@gmail.com', 'Nilima1', 1234567837, 3),
(11, 'Anupama', 'user', 'anu@@gmail.com', 'Anup1', 1478965423, 2),
(12, 'XXX', 'user', 'xxx@@gmail.com', 'Xxxx1', 1456987234, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `apt_info`
--
ALTER TABLE `apt_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `land_post`
--
ALTER TABLE `land_post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `apt_info`
--
ALTER TABLE `apt_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `land_post`
--
ALTER TABLE `land_post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
