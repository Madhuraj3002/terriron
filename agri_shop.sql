-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 23, 2023 at 08:41 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `agri_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `added_items`
--

CREATE TABLE `added_items` (
  `id` int(2) NOT NULL,
  `name` varchar(30) NOT NULL,
  `price` int(2) NOT NULL,
  `quantity` int(2) NOT NULL,
  `supplier_id` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `added_items`
--

INSERT INTO `added_items` (`id`, `name`, `price`, `quantity`, `supplier_id`) VALUES
(2, 'Brown Rice', 22, 29, 1),
(3, 'Red Rice', 2, 12, 1),
(4, 'Brown Rice', 32, 20, 9),
(5, 'Basmati Rice', 23, 320, 10),
(6, 'Brown Rice', 20, 195, 10),
(7, 'Wheat', 37, 50, 10);

-- --------------------------------------------------------

--
-- Table structure for table `product_count`
--

CREATE TABLE `product_count` (
  `count` int(11) NOT NULL,
  `pay` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `product_count`
--

INSERT INTO `product_count` (`count`, `pay`) VALUES
(7, 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_id`
--

CREATE TABLE `product_id` (
  `id` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `product_id`
--

INSERT INTO `product_id` (`id`) VALUES
(3);

-- --------------------------------------------------------

--
-- Table structure for table `supplier_details`
--

CREATE TABLE `supplier_details` (
  `id` int(5) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `address` varchar(100) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `supplier_details`
--

INSERT INTO `supplier_details` (`id`, `name`, `email`, `contact`, `address`, `password`) VALUES
(1, 'raja', 'raja@gmail.com', '9677606973', 'palayamkottai', 'Iamraja'),
(8, 'vignesh', 'vigneshscadece@gmail.com', '9677606974', 'tirunelveli', 'hello'),
(9, 'vivasayi farms', 'kavitha@gmail.com', '9942017420', 'Tirunelveli', 'Iamkavi'),
(10, 'madhu', 'aarumadhu@gmail.com', '9842151619', 'Tirunelveli', 'Iamraja');

-- --------------------------------------------------------

--
-- Table structure for table `supplier_id`
--

CREATE TABLE `supplier_id` (
  `id` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `supplier_id`
--

INSERT INTO `supplier_id` (`id`) VALUES
(1);

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `id` int(30) NOT NULL,
  `gname` varchar(20) NOT NULL,
  `sname` varchar(30) NOT NULL,
  `semail` varchar(30) NOT NULL,
  `scontact` varchar(30) NOT NULL,
  `saddress` varchar(30) NOT NULL,
  `uname` varchar(30) NOT NULL,
  `uemail` varchar(30) NOT NULL,
  `ucontact` varchar(30) NOT NULL,
  `uaddress` varchar(30) NOT NULL,
  `quantity` varchar(30) NOT NULL,
  `totalamt` varchar(30) NOT NULL,
  `useramt` varchar(30) NOT NULL,
  `commission` varchar(30) NOT NULL,
  `price` varchar(20) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `uid` varchar(10) NOT NULL,
  `sid` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`id`, `gname`, `sname`, `semail`, `scontact`, `saddress`, `uname`, `uemail`, `ucontact`, `uaddress`, `quantity`, `totalamt`, `useramt`, `commission`, `price`, `date`, `uid`, `sid`) VALUES
(9, 'Brown Rice', 'raja', 'raja@gmail.com', '9677606973', 'palayamkottai', 'raja', 'raja@gmail.com', '9842151619', 'Tirunelveli', '2', '44', '40', '4.4', '22', '2023-02-22 04:05:29', '3', '1'),
(10, 'Brown Rice', 'vivasayi farms', 'kavitha@gmail.com', '9942017420', 'Tirunelveli', 'raja', 'raja@gmail.com', '9842151619', 'Tirunelveli', '5', '225', '203', '22.5', '45', '2023-02-22 04:11:50', '3', '9'),
(11, 'Brown Rice', 'madhu', 'aarumadhu@gmail.com', '9842151619', 'Tirunelveli', 'madhu', 'madhu01@gmail.com', '7502436259', 'Tirunelveli', '5', '100', '90', '10', '20', '2023-02-23 06:40:23', '4', '10'),
(12, 'Red Rice', 'raja', 'raja@gmail.com', '9677606973', 'palayamkottai', 'madhu', 'madhu01@gmail.com', '7502436259', 'Tirunelveli', '7', '14', '13', '1.4', '2', '2023-02-23 06:45:05', '4', '1');

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `id` int(2) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `address` varchar(100) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`id`, `name`, `email`, `contact`, `address`, `password`) VALUES
(2, 'vignesh', 'vigneshscadece@gmail.com', '9677606973', 'tirunelveli', 'hello'),
(3, 'raja', 'raja@gmail.com', '9842151619', 'Tirunelveli', 'Iamraja'),
(4, 'madhu', 'madhu01@gmail.com', '7502436259', 'Tirunelveli', 'madhu');

-- --------------------------------------------------------

--
-- Table structure for table `user_id`
--

CREATE TABLE `user_id` (
  `id` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_id`
--

INSERT INTO `user_id` (`id`) VALUES
(4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `added_items`
--
ALTER TABLE `added_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplier_details`
--
ALTER TABLE `supplier_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `added_items`
--
ALTER TABLE `added_items`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `supplier_details`
--
ALTER TABLE `supplier_details`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
