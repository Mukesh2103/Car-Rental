-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 05, 2017 at 04:45 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `car_rental`
--

-- --------------------------------------------------------

--
-- Table structure for table `car_hire`
--

CREATE TABLE `car_hire` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `address` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `from` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `where` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `no_days` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `car_list`
--

CREATE TABLE `car_list` (
  `id` int(11) NOT NULL,
  `car_name` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `company_name` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `seats` int(2) NOT NULL,
  `fuel` enum('Petrol','Diesel') COLLATE utf8_unicode_ci NOT NULL,
  `rent_day` int(5) NOT NULL,
  `rent_km` decimal(5,2) NOT NULL,
  `no_cars` int(2) NOT NULL,
  `free_cars` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `car_list`
--

INSERT INTO `car_list` (`id`, `car_name`, `company_name`, `seats`, `fuel`, `rent_day`, `rent_km`, `no_cars`, `free_cars`) VALUES
(1, 'Ciaz', 'Maruti Suzuki', 4, 'Diesel', 1000, '8.00', 5, 5),
(2, 'Bolero', 'Mahindra', 9, 'Diesel', 1200, '10.00', 5, 5),
(3, 'Nano', 'Tata', 4, 'Petrol', 800, '9.00', 10, 10),
(4, 'Swift Dezire', 'Maruti Suzuki', 4, 'Diesel', 1000, '10.00', 8, 8),
(5, 'Innova', 'Toyota', 7, 'Diesel', 1200, '10.00', 5, 5),
(6, 'Scorpio', 'Mahindra', 9, 'Diesel', 1300, '12.00', 5, 5),
(7, 'Tavera', 'Chevrolet', 10, 'Diesel', 1300, '10.00', 5, 5);

-- --------------------------------------------------------

--
-- Table structure for table `user_table`
--

CREATE TABLE `user_table` (
  `id` int(11) NOT NULL,
  `uname` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `umobile` varchar(13) COLLATE utf8_unicode_ci NOT NULL,
  `uemail` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `upassword` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `type` enum('Admin','User','Employee') COLLATE utf8_unicode_ci NOT NULL,
  `status` enum('Active','Denied','Pending') COLLATE utf8_unicode_ci NOT NULL,
  `car_request` enum('Yes','No','NULL') COLLATE utf8_unicode_ci NOT NULL,
  `car_alloted` enum('Yes','No','NULL') COLLATE utf8_unicode_ci NOT NULL,
  `total_rent` double(10,3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_table`
--

INSERT INTO `user_table` (`id`, `uname`, `umobile`, `uemail`, `upassword`, `type`, `status`, `car_request`, `car_alloted`, `total_rent`) VALUES
(1, 'Mukesh Dewangan', '9691066460', 'mukesh.dewangan@ssipmt.com', 'Mukesh@12', 'Admin', 'Active', 'NULL', 'NULL', 0.000),
(2, 'Xyz', '1234567890', 'xyz@gmail.com', 'Xyz@12345', 'User', 'Active', 'No', 'No', 0.000),
(3, 'Ashutosh Mishra', '8109119688', 'ashutosh.mishra@ssipmt.com', 'Ashutosh@2', 'Admin', 'Active', 'No', 'No', 0.000),
(4, 'abc', '1234567890', 'abc@gmail.com', 'Abc@12345', 'Employee', 'Active', 'No', 'No', 0.000),
(5, 'vinay', '7415220647', 'vinuasahu@gmail.com', 'VKvk221996', 'User', 'Active', 'No', 'No', 6000.000),
(6, 'md', '9691066460', 'a@gmail.com', 'Mukesh@21', 'User', 'Active', 'No', 'No', 0.000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `car_hire`
--
ALTER TABLE `car_hire`
  ADD PRIMARY KEY (`id`),
  ADD KEY `uid` (`uid`),
  ADD KEY `uid_2` (`uid`),
  ADD KEY `cid` (`cid`);

--
-- Indexes for table `car_list`
--
ALTER TABLE `car_list`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `car_name` (`car_name`),
  ADD KEY `car_name_2` (`car_name`);

--
-- Indexes for table `user_table`
--
ALTER TABLE `user_table`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uemail` (`uemail`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `car_hire`
--
ALTER TABLE `car_hire`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `car_list`
--
ALTER TABLE `car_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `user_table`
--
ALTER TABLE `user_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `car_hire`
--
ALTER TABLE `car_hire`
  ADD CONSTRAINT `car_hire_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `user_table` (`id`),
  ADD CONSTRAINT `car_hire_ibfk_2` FOREIGN KEY (`cid`) REFERENCES `car_list` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
