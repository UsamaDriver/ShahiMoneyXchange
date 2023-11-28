-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2023 at 07:30 AM
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
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_details`
--

CREATE TABLE `admin_details` (
  `adminID` int(11) NOT NULL,
  `adminEmail` varchar(200) NOT NULL,
  `adminName` varchar(200) NOT NULL,
  `adminPhone` varchar(200) NOT NULL,
  `adminPassword` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin_details`
--

INSERT INTO `admin_details` (`adminID`, `adminEmail`, `adminName`, `adminPhone`, `adminPassword`) VALUES
(1, 'admin@gmail.com', 'First Admin', '7946549562', '654321');

-- --------------------------------------------------------

--
-- Table structure for table `booking_details`
--

CREATE TABLE `booking_details` (
  `bookingID` int(11) NOT NULL,
  `userEmail` varchar(200) NOT NULL,
  `userName` varchar(200) NOT NULL,
  `userContact` varchar(200) NOT NULL,
  `userAddress` varchar(500) NOT NULL,
  `requestDate` date NOT NULL,
  `requiredCurrency` varchar(200) NOT NULL,
  `requiredAmount` decimal(10,2) NOT NULL,
  `attendedOrNot` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `booking_details`
--

INSERT INTO `booking_details` (`bookingID`, `userEmail`, `userName`, `userContact`, `userAddress`, `requestDate`, `requiredCurrency`, `requiredAmount`, `attendedOrNot`) VALUES
(1, 'midda.sahid@gmail.com', 'Sahid', '9876543210', 'abcd', '2023-10-26', 'AED', 5000.00, 0),
(2, 'demouser@gmail.com', 'Demo User', '7956613232', 'demo address', '2023-11-09', 'USD', 3500.00, 1),
(4, 'usama@gmail.com', 'Usama', '9876543210', 'Surat', '2023-10-17', 'INR', 10000.00, 1),
(5, 'demo3@gmail.com', 'demo3', '9876543210', 'Surat', '2023-10-18', 'INR', 500.00, 0),
(6, 'abc@gmail.com', 'abc', '123', 'abc', '2023-11-18', 'CAD', 1000.00, 1);

-- --------------------------------------------------------

--
-- Table structure for table `company_earnings`
--

CREATE TABLE `company_earnings` (
  `totalPlatformFees` int(10) NOT NULL,
  `totalGst` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `company_earnings`
--

INSERT INTO `company_earnings` (`totalPlatformFees`, `totalGst`) VALUES
(14353, 41846);

-- --------------------------------------------------------

--
-- Table structure for table `contact_details`
--

CREATE TABLE `contact_details` (
  `contID` int(11) NOT NULL,
  `contName` varchar(50) NOT NULL,
  `contEmail` varchar(100) NOT NULL,
  `contPhone` varchar(50) NOT NULL,
  `contSubject` varchar(500) NOT NULL,
  `contMessage` varchar(2000) NOT NULL,
  `attendedOrNot` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `contact_details`
--

INSERT INTO `contact_details` (`contID`, `contName`, `contEmail`, `contPhone`, `contSubject`, `contMessage`, `attendedOrNot`) VALUES
(1, 'sahid', 'midda.sahid@gmail.com', '9876543210', 'abcd', 'jbnjkdsbnjksbvsndvbdnbv   jhjndjfn  jncs', 1),
(11, 'Subrata', 'subrata@gmail.com', '6874531215', 'jbjdjd', 'jbjbjkjn', 0),
(13, 'usama', 'usama@gmail.com', '8976453150', 'hsghcjba', 'jhvhnb', 0),
(16, 'test', 'test@gmail.com', '8789612203', 'test subject', 'test message', 1);

-- --------------------------------------------------------

--
-- Table structure for table `service_rates`
--

CREATE TABLE `service_rates` (
  `platformFees` int(10) NOT NULL,
  `gst` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `service_rates`
--

INSERT INTO `service_rates` (`platformFees`, `gst`) VALUES
(2, 9);

-- --------------------------------------------------------

--
-- Table structure for table `transaction_details`
--

CREATE TABLE `transaction_details` (
  `transactionID` int(11) NOT NULL,
  `moneySender` varchar(200) NOT NULL,
  `moneyReceiver` varchar(200) NOT NULL,
  `amountSent` decimal(10,2) NOT NULL,
  `amountReceived` decimal(10,2) NOT NULL,
  `transactionDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `platformFees` int(10) NOT NULL,
  `gst` int(10) NOT NULL,
  `sendCurrency` varchar(200) NOT NULL,
  `receiveCurrency` varchar(200) NOT NULL,
  `senderEmail` varchar(200) NOT NULL,
  `receiverEmail` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `transaction_details`
--

INSERT INTO `transaction_details` (`transactionID`, `moneySender`, `moneyReceiver`, `amountSent`, `amountReceived`, `transactionDate`, `platformFees`, `gst`, `sendCurrency`, `receiveCurrency`, `senderEmail`, `receiverEmail`) VALUES
(7, 'Demo User', 'Sahid Midda', 300.00, 6756.00, '2023-10-13 15:14:25', 9, 36, 'AED', 'INR', 'demouser@gmail.com', 'midda.sahid@gmail.com'),
(8, 'test', 'Sahid Midda', 500.00, 11260.00, '2023-10-13 16:03:53', 15, 60, 'USD', 'INR', 'test@gmail.com', 'midda.sahid@gmail.com'),
(10, 'Demo User', 'ABCD', 500.00, 425.00, '2023-10-14 13:38:52', 15, 60, 'AED', 'AED', 'demouser@gmail.com', 'abcd@gmail.com'),
(11, 'ABCD', 'Demo User', 750.00, 637.50, '2023-10-14 14:20:47', 23, 90, 'AED', 'AED', 'abcd@gmail.com', 'demouser@gmail.com'),
(12, 'Demo User', 'ABCD', 300.00, 261.00, '2023-10-15 13:21:25', 9, 30, 'AED', 'AED', 'demouser@gmail.com', 'abcd@gmail.com'),
(15, 'Subrata', 'ABCD', 450.00, 848.11, '2023-10-15 20:45:24', 29, 97, 'NZD', 'AED', 'subrata@gmail.com', 'abcd@gmail.com'),
(16, 'Usama', 'Sahid Midda', 5000.00, 265241.68, '2023-10-16 12:26:05', 9146, 30488, 'CAD', 'INR', 'usama@gmail.com', 'midda.sahid@gmail.com'),
(17, 'Subrata', 'Sahid Midda', 500.00, 23145.62, '2023-10-17 06:20:51', 246, 1231, 'NZD', 'INR', 'subrata@gmail.com', 'midda.sahid@gmail.com'),
(18, 'Demo', 'Sahid Midda', 1000.00, 0.00, '2023-10-17 06:50:53', 0, 0, 'USA', 'INR', 'demo3@gmail.com', 'midda.sahid@gmail.com'),
(19, 'Sahid Midda', 'Subrata', 1000.00, 18.48, '2023-10-17 06:52:50', 0, 1, 'INR', 'NZD', 'midda.sahid@gmail.com', 'subrata@gmail.com'),
(20, 'Sahid Midda', 'Usama', 500.00, 7.07, '2023-11-01 05:58:55', 0, 1, 'INR', 'CAD', 'midda.sahid@gmail.com', 'usama@gmail.com'),
(21, 'abc', 'Sahid Midda', 2000.00, 82381.15, '2023-11-01 06:21:41', 4846, 9692, 'NZD', 'INR', 'abc@gmail.com', 'midda.sahid@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `accountNo` int(11) NOT NULL,
  `userEmail` varchar(200) NOT NULL,
  `fullName` varchar(200) NOT NULL,
  `baseCurrency` varchar(200) NOT NULL,
  `userPhone` varchar(200) NOT NULL,
  `userPassword` varchar(200) NOT NULL,
  `currentBalance` decimal(10,2) NOT NULL DEFAULT 10000.00,
  `openingDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `userType` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`accountNo`, `userEmail`, `fullName`, `baseCurrency`, `userPhone`, `userPassword`, `currentBalance`, `openingDate`, `userType`) VALUES
(14, 'abc@gmail.com', 'abc', 'NZD', '123', 'abc', 8000.00, '2023-11-01 06:18:07', 'normal'),
(10, 'abcd@gmail.com', 'ABCD', 'AED', '8941326543', '123456', 10785.05, '2023-10-14 12:01:43', 'normal'),
(13, 'demo3@gmail.com', 'Demo', 'USA', '8746532145', '123456', 9000.00, '2023-10-17 06:46:29', 'normal'),
(8, 'demouser@gmail.com', 'Demo User', 'AED', '8976531265', '123456', 9537.50, '2023-10-13 10:20:40', 'normal'),
(2, 'midda.sahid@gmail.com', 'Sahid Midda', 'INR', '9876543210', '123456', 397284.45, '2023-10-11 16:17:42', 'normal'),
(11, 'subrata@gmail.com', 'Subrata', 'NZD', '9876453120', '123456', 9068.48, '2023-10-15 11:46:09', 'normal'),
(9, 'test@gmail.com', 'test', 'USD', '7981663221', '123456', 9500.00, '2023-10-13 16:00:50', 'normal'),
(12, 'usama@gmail.com', 'Usama', 'CAD', '9874531200', '123456', 5007.07, '2023-10-16 12:23:15', 'normal');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_details`
--
ALTER TABLE `admin_details`
  ADD PRIMARY KEY (`adminID`);

--
-- Indexes for table `booking_details`
--
ALTER TABLE `booking_details`
  ADD PRIMARY KEY (`bookingID`),
  ADD UNIQUE KEY `userEmail` (`userEmail`);

--
-- Indexes for table `contact_details`
--
ALTER TABLE `contact_details`
  ADD PRIMARY KEY (`contID`);

--
-- Indexes for table `transaction_details`
--
ALTER TABLE `transaction_details`
  ADD PRIMARY KEY (`transactionID`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`userEmail`),
  ADD UNIQUE KEY `accountNo` (`accountNo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_details`
--
ALTER TABLE `admin_details`
  MODIFY `adminID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `booking_details`
--
ALTER TABLE `booking_details`
  MODIFY `bookingID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `contact_details`
--
ALTER TABLE `contact_details`
  MODIFY `contID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `transaction_details`
--
ALTER TABLE `transaction_details`
  MODIFY `transactionID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `accountNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking_details`
--
ALTER TABLE `booking_details`
  ADD CONSTRAINT `fkEmail` FOREIGN KEY (`userEmail`) REFERENCES `user_details` (`userEmail`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
