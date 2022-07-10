-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 10, 2022 at 07:21 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `admission`
--

-- --------------------------------------------------------

--
-- Table structure for table `apply_data`
--

CREATE TABLE `apply_data` (
  `Form No` int(10) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `DOB` varchar(15) NOT NULL,
  `Email_ID` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Contact_No` decimal(10,0) NOT NULL,
  `Branch` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `apply_data`
--

INSERT INTO `apply_data` (`Form No`, `Name`, `DOB`, `Email_ID`, `Password`, `Contact_No`, `Branch`) VALUES
(20, 'Raj Kumar', '01/01/2004', 'rajk123@gmail.com', '$2y$10$AVJHT2gi0VC.VehvEwC1Yuh1mDNcXxVlgpzg4MBJCtg', '8796054678', 'Computer Engineering'),
(21, 'Paresh Bhatt', '23/04/2003', 'pareshbhatt@gmail.com', '$2y$10$XtrR6lq9P/7p2FnJtbshSuq/5ZbPqJnsk2cWKknGu0H', '9567439021', 'Mechanical Engineering'),
(22, 'Kartik Tyagi', '25/12/2001', 'kt2512@gmail.com', '$2y$10$i1kejcFrmLW9uE22CBQwVu5RAyJ6D6NvOGmwL7Si2FR', '7789658792', 'Instrument & Control Engineering');

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE `image` (
  `Form No` int(10) NOT NULL,
  `image1_path` varchar(100) NOT NULL,
  `image2_path` varchar(100) NOT NULL,
  `image3_path` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`Form No`, `image1_path`, `image2_path`, `image3_path`) VALUES
(20, 'uploads/WhatsApp Image 2022-07-10 at 10.17.05 AM.jpeg', 'uploads/WhatsApp Image 2022-07-10 at 10.17.04 AM (1).jpeg', 'uploads/WhatsApp Image 2022-07-10 at 10.17.04 AM.jpeg'),
(21, 'uploads/WhatsApp Image 2022-07-10 at 10.17.03 AM (1).jpeg', 'uploads/WhatsApp Image 2022-07-10 at 10.17.03 AM.jpeg', 'uploads/WhatsApp Image 2022-07-10 at 10.17.02 AM.jpeg'),
(22, 'uploads/WhatsApp Image 2022-07-10 at 10.17.01 AM.jpeg', 'uploads/WhatsApp Image 2022-07-10 at 10.16.58 AM.jpeg', 'uploads/WhatsApp Image 2022-07-10 at 10.16.54 AM.jpeg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `apply_data`
--
ALTER TABLE `apply_data`
  ADD PRIMARY KEY (`Form No`);

--
-- Indexes for table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`Form No`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `apply_data`
--
ALTER TABLE `apply_data`
  MODIFY `Form No` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `image`
--
ALTER TABLE `image`
  MODIFY `Form No` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `image`
--
ALTER TABLE `image`
  ADD CONSTRAINT `image_ibfk_1` FOREIGN KEY (`Form No`) REFERENCES `apply_data` (`Form No`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
