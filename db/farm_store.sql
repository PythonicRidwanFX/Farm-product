-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 29, 2024 at 08:21 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `farm_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `date_add` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `date_add`) VALUES
(1, 'LIVESTOCK', '2023-11-30'),
(2, 'GRAINS', '2023-11-30'),
(3, 'FRUIT', '2023-11-30'),
(4, 'VEGETABLES', '2023-11-30'),
(5, 'TUBES', '2023-11-30');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(10) NOT NULL,
  `fullName` varchar(255) NOT NULL,
  `phoneNo` varchar(13) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `date_add` varchar(100) NOT NULL,
  `email` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `fullName`, `phoneNo`, `address`, `date_add`, `email`) VALUES
(1, 'SAMSUDEEN JIMOH', '08102260007', 'Suit A17 Shoku Villa Opposite Federal polytechnic offa Main gate Offa, Kwara State', '2023-11-30', 'Jimohsamsudeen01@gmail.com'),
(2, 'joy oguntuase', '09169342615', '15 ogbontuntun', '2024-07-21', 'hsubsvtuportal@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `customer_cart`
--

CREATE TABLE `customer_cart` (
  `id` int(10) NOT NULL,
  `prdID` int(10) NOT NULL,
  `quantity` int(10) NOT NULL,
  `date_add` varchar(120) DEFAULT NULL,
  `customerNumber` varchar(13) DEFAULT NULL,
  `customerAddress` varchar(225) DEFAULT NULL,
  `customerName` varchar(225) DEFAULT NULL,
  `transcationID` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `customer_cart`
--

INSERT INTO `customer_cart` (`id`, `prdID`, `quantity`, `date_add`, `customerNumber`, `customerAddress`, `customerName`, `transcationID`) VALUES
(1, 2, 2, '2024-08-29', '2345678', 'offa', 'jimoh sam', 'ee0069592'),
(2, 4, 5, '2024-08-29', '2345678', 'offa', 'jimoh sam', 'ee0069592');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `productName` varchar(100) NOT NULL,
  `productPrice` varchar(100) NOT NULL,
  `date_create` varchar(100) NOT NULL,
  `quantity` int(120) NOT NULL,
  `productCategory` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `productName`, `productPrice`, `date_create`, `quantity`, `productCategory`) VALUES
(1, 'RICE', '15000', '2024-07-18', 200, 2),
(2, 'FISH', '9000', '2024-07-18', 799, 1),
(3, 'YAM', '2000', '2024-07-18', 210, 5),
(4, 'MANGO', '800', '2024-07-18', 82, 3),
(5, 'PEPPER', '300', '2024-07-18', 1200, 4);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `user_type` varchar(255) NOT NULL,
  `balance` varchar(255) NOT NULL DEFAULT '0',
  `otp` varchar(255) DEFAULT NULL,
  `message` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `fname`, `lname`, `email`, `phone`, `pass`, `user_type`, `balance`, `otp`, `message`) VALUES
(1, 'admin', 'admin ', 'jimohsamsudeen01@gmail.com', '09124028348', '1234', 'admin', '1040', '358617', 'your otp is358617');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_cart`
--
ALTER TABLE `customer_cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customer_cart`
--
ALTER TABLE `customer_cart`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
