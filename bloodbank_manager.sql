-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 23, 2019 at 09:36 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bloodbank_manager`
--

-- --------------------------------------------------------

--
-- Table structure for table `donor`
--

CREATE TABLE `donor` (
  `donarId` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `age` int(11) NOT NULL,
  `phoneNo` varchar(50) DEFAULT NULL,
  `gender` varchar(10) NOT NULL,
  `bloodtype` varchar(5) NOT NULL
) ;

--
-- Dumping data for table `donor`
--

INSERT INTO `donor` (`donarId`, `name`, `age`, `phoneNo`, `gender`, `bloodtype`) VALUES
(5, 'Arjun Paramani', 19, '975027508', 'Male', 'A+'),
(10, 'Dharmik Doshi', 19, ' 9876543210', 'Male', 'B+'),
(11, 'riyush doshi', 19, '9769722566', 'Male', 'A+'),
(12, 'Dharmik Doshi', 19, '', 'Male', 'A+');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `empId` int(11) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(40) DEFAULT NULL,
  `designation` varchar(50) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`empId`, `name`, `email`, `phone`, `designation`, `address`, `date_added`) VALUES
(21, 'Dharmik', 'dharmikdoshi@gmail.com', '8984647163', 'Senior analyst', 'Mumbai', '2019-10-18 08:18:24');

-- --------------------------------------------------------

--
-- Table structure for table `hospital`
--

CREATE TABLE `hospital` (
  `hospId` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `phoneNo` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hospital`
--

INSERT INTO `hospital` (`hospId`, `name`, `location`, `phoneNo`) VALUES
(1, 'Jamnabai Hospital', 'Mumbai', 975027508),
(2, 'Lilavati Hospital', 'Dadar', 975027508);

-- --------------------------------------------------------

--
-- Table structure for table `hospitalusers`
--

CREATE TABLE `hospitalusers` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hospitalusers`
--

INSERT INTO `hospitalusers` (`id`, `username`, `password`) VALUES
(1, 'jamnabai', '$2y$10$eEqkUohC3tfxDUEVV.SkLuP3qx2/PSVxfaXtHouzXL6zYyK9xS5Gy'),
(2, 'lilavati', '$2y$10$eEqkUohC3tfxDUEVV.SkLuP3qx2/PSVxfaXtHouzXL6zYyK9xS5Gy');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderId` int(11) NOT NULL,
  `bloodtype` varchar(10) NOT NULL,
  `quantity` varchar(10) NOT NULL,
  `date` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orderId`, `bloodtype`, `quantity`, `date`) VALUES
(6, 'A+', ' 777', '2019-10-18'),
(7, 'B+', ' 2000', '2019-10-18'),
(8, 'A+', ' 123', '2019-10-18'),
(9, 'B+', ' 1000', '2019-10-18'),
(10, 'A+', ' 19000', '2019-10-18'),
(11, 'A-', ' 10000', '2019-10-18'),
(12, 'B-', ' 5000', '2019-10-18'),
(13, 'AB-', ' 3000', '2019-10-19'),
(14, 'A+', ' 2000', '2019-10-22'),
(15, 'AB+', ' 1000', '2019-10-22');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `name`, `password`) VALUES
(1, 'dharmikayush', 'dharmikayush', '$2y$10$eEqkUohC3tfxDUEVV.SkLuP3qx2/PSVxfaXtHouzXL6zYyK9xS5Gy'),
(2, 'kingdharmik', 'dharmik', 'yolos');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `donor`
--
ALTER TABLE `donor`
  ADD PRIMARY KEY (`donarId`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`empId`);

--
-- Indexes for table `hospital`
--
ALTER TABLE `hospital`
  ADD PRIMARY KEY (`hospId`);

--
-- Indexes for table `hospitalusers`
--
ALTER TABLE `hospitalusers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `donor`
--
ALTER TABLE `donor`
  MODIFY `donarId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `empId` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `hospital`
--
ALTER TABLE `hospital`
  MODIFY `hospId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `hospitalusers`
--
ALTER TABLE `hospitalusers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
