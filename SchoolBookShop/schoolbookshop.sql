-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 10, 2023 at 10:03 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `schoolbookshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Admin_Id` int(11) NOT NULL,
  `Admin_Username` varchar(255) NOT NULL,
  `Admin_Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Admin_Id`, `Admin_Username`, `Admin_Password`) VALUES
(1, '1@2.com', '4346d362f67c89d7ab4e28732a1b1ce8');

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `Book_Id` int(11) NOT NULL,
  `Book_Title` varchar(255) NOT NULL,
  `Standard` int(11) NOT NULL,
  `Book_Subject` varchar(255) NOT NULL,
  `Book_Author` varchar(255) NOT NULL,
  `Book_Type` varchar(255) NOT NULL,
  `Book_Price` int(11) NOT NULL,
  `Stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`Book_Id`, `Book_Title`, `Standard`, `Book_Subject`, `Book_Author`, `Book_Type`, `Book_Price`, `Stock`) VALUES
(8, 'book4', 8, '7', 'bilal23', '7', 456, 100),
(9, 'Book2', 8, '6', 'School1', '7', 345, 100),
(10, 'book1', 11, '7', 'School1', '7', 4600, 100),
(11, 'book6', 12, '5', 'Sir Syed ', '9', 340, 100),
(12, 'book7', 2, '6', 'bilal', '4', 500, 100),
(13, 'Book99', 8, '7', 'muneeb', '8', 150, 100);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `Cust_Id` int(11) NOT NULL,
  `Book_Id` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Cart_Id` int(11) NOT NULL,
  `Checkout` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`Cust_Id`, `Book_Id`, `Quantity`, `Cart_Id`, `Checkout`) VALUES
(1, 8, 4, 23, 1),
(1, 8, 4, 24, 1),
(1, 8, 4, 25, 1),
(1, 9, 1, 26, 1),
(1, 10, 13, 27, 1),
(1, 8, 4, 28, 1),
(1, 9, 1, 29, 1),
(1, 10, 13, 30, 1),
(1, 11, 6, 31, 1),
(1, 13, 1, 32, 1),
(1, 12, 1, 33, 1),
(1, 9, 1, 34, 1),
(1, 10, 13, 35, 1),
(1, 11, 6, 36, 1),
(1, 8, 4, 37, 1),
(1, 8, 4, 38, 1);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `Std_Id` int(11) NOT NULL,
  `Std_Username` varchar(255) NOT NULL,
  `Std_Password` varchar(255) NOT NULL,
  `Std_TOrders` int(11) NOT NULL,
  `Street` varchar(255) NOT NULL,
  `City` varchar(255) NOT NULL,
  `PostalCode` varchar(255) NOT NULL,
  `Contact` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`Std_Id`, `Std_Username`, `Std_Password`, `Std_TOrders`, `Street`, `City`, `PostalCode`, `Contact`) VALUES
(1, '1@2.com', '4346d362f67c89d7ab4e28732a1b1ce8', 0, '1', 'lahore', '345', '0883462384');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `Subject_Id` int(11) NOT NULL,
  `Subject` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`Subject_Id`, `Subject`) VALUES
(4, 'Maths'),
(5, 'Biology'),
(6, 'English'),
(7, 'Computer');

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE `type` (
  `Type_Id` int(11) NOT NULL,
  `Type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`Type_Id`, `Type`) VALUES
(4, 'Punjab Text  Book'),
(5, 'Federal Book'),
(6, 'Oxford Book'),
(7, 'Kpk Book'),
(8, 'Baluchistan Book'),
(9, 'Sindh Board');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Admin_Id`);

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`Book_Id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`Cart_Id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`Std_Id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`Subject_Id`);

--
-- Indexes for table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`Type_Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `Admin_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `Book_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `Cart_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `Std_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `Subject_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `type`
--
ALTER TABLE `type`
  MODIFY `Type_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
