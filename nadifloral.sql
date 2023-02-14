-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 24, 2022 at 06:18 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nadifloral`
--

-- --------------------------------------------------------

--
-- Table structure for table `bouquets`
--

CREATE TABLE `bouquets` (
  `FloralID` int(11) NOT NULL,
  `FloralName` varchar(50) NOT NULL,
  `UnitPrice` int(11) NOT NULL,
  `TotalQuantities` int(11) NOT NULL,
  `FloralPicture` varchar(255) NOT NULL,
  `Ingredients` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bouquets`
--

INSERT INTO `bouquets` (`FloralID`, `FloralName`, `UnitPrice`, `TotalQuantities`, `FloralPicture`, `Ingredients`) VALUES
(1, 'Rose Bouquet', 10000, 6, 'flowerSet/rose.jpg', 'Pink Roses, you can choose desire color'),
(2, 'Lily Bouquet', 12000, 5, 'flowerSet/lily.jpg', 'Pink lilies, you can choose desire color'),
(3, 'Carnation Bouquet', 10000, 6, 'flowerSet/carnation.jpg', 'Pink carnations, you can choose desire color');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `CustomerID` int(11) NOT NULL,
  `CustomerName` varchar(50) NOT NULL,
  `Email` varchar(60) NOT NULL,
  `Password` varchar(30) NOT NULL,
  `DateOfBirth` date NOT NULL,
  `Phone` varchar(11) NOT NULL,
  `Gender` varchar(6) NOT NULL,
  `ProfilePicture` varchar(255) NOT NULL,
  `Addreess` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`CustomerID`, `CustomerName`, `Email`, `Password`, `DateOfBirth`, `Phone`, `Gender`, `ProfilePicture`, `Addreess`) VALUES
(1, 'AyeNadi', 'ayenadykyaw1@gmail.com', 'ffefefefefe', '2022-08-01', '09962288360', 'Male', '', 'fdfdfdfdfdfdfd'),
(2, 'Mg Mg', 'mgmg@gmail.com', 'Mgmg@1234', '2000-08-30', '09962288360', 'Male', 'CustomerProfile/elevator.jpg', 'ygn'),
(3, 'AyeNadi', 'ayenadykyaw1@gmail.com', '1234567', '2022-09-12', '09428939200', 'Female', 'CustomerProfile/marie-curie-facts-300x300 (2).jpg', 'ygn');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `OrderID` int(11) NOT NULL,
  `OrderQty` int(11) NOT NULL,
  `TotalAmount` int(11) NOT NULL,
  `OrderDate` varchar(30) NOT NULL,
  `PaymentType` varchar(50) NOT NULL,
  `Screenshot` varchar(255) NOT NULL,
  `DeliveryType` varchar(50) NOT NULL,
  `DeliveryAddress` varchar(255) NOT NULL,
  `ContactPhone` varchar(11) NOT NULL,
  `FloralID` int(11) NOT NULL,
  `CustomerID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`OrderID`, `OrderQty`, `TotalAmount`, `OrderDate`, `PaymentType`, `Screenshot`, `DeliveryType`, `DeliveryAddress`, `ContactPhone`, `FloralID`, `CustomerID`) VALUES
(16, 3, 30000, '2022-09-23', 'cod', '', 'olddeli', '', '', 1, 2),
(17, 3, 36000, '2022-09-23', 'online', 'Payment/computer.png', 'newdeli', '', '', 2, 2),
(18, 3, 30000, '2022-09-23', 'cod', '', 'newdeli', '', '', 1, 2),
(19, 3, 30000, '2022-09-23', 'online', 'Payment/Picture1.png', 'olddeli', '', '', 3, 2),
(20, 1, 12000, '2022-09-24', 'cod', '', 'olddeli', '', '', 2, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bouquets`
--
ALTER TABLE `bouquets`
  ADD PRIMARY KEY (`FloralID`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`CustomerID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`OrderID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bouquets`
--
ALTER TABLE `bouquets`
  MODIFY `FloralID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `CustomerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `OrderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
