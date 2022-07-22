-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 07, 2022 at 07:08 AM
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
-- Database: `puzzleout`
--

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `file_id` int(11) NOT NULL,
  `file_name` varchar(100) NOT NULL,
  `file_type` varchar(40) NOT NULL,
  `file_size` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`file_id`, `file_name`, `file_type`, `file_size`) VALUES
(1, '13313-3rdyearsyllabus.pdf', 'application/pdf', '1462.2568359375'),
(2, '65281-3rdyearsyllabus.pdf', 'application/pdf', '1462.2568359375'),
(3, '1973-japneet-rajput.pdf', 'application/pdf', '216.005859375'),
(4, '51063-japneet-rajput.pdf', 'application/pdf', '216.005859375'),
(5, '10432-japneet-rajput.pdf', 'application/pdf', '216.005859375'),
(6, '89413-assignment.pdf', 'application/pdf', '259.451171875');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderId` int(11) NOT NULL,
  `clientName` varchar(120) NOT NULL,
  `clientEmail` varchar(150) NOT NULL,
  `clientNumber` varchar(25) NOT NULL,
  `assignmentTime` int(11) NOT NULL,
  `assignmentDate` date DEFAULT NULL,
  `dueDate` date DEFAULT NULL,
  `price` varchar(30) NOT NULL,
  `paymentStatus` varchar(15) NOT NULL,
  `advance` varchar(30) NOT NULL,
  `subject` varchar(20) NOT NULL,
  `description` varchar(150) NOT NULL,
  `file_name` varchar(100) NOT NULL,
  `pageCount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orderId`, `clientName`, `clientEmail`, `clientNumber`, `assignmentTime`, `assignmentDate`, `dueDate`, `price`, `paymentStatus`, `advance`, `subject`, `description`, `file_name`, `pageCount`) VALUES
(1, 'Japneet', 'j@gmail.com', '8104235686', 12, '2022-07-06', '2022-07-13', '', 'Advance', '', 'Data Stracture', '  abc desc', '13313-3rdyearsyllabus.pdf', 1),
(2, 'Jap', 'jap@gmail.com', '8104235686', 14, '2022-07-06', '2022-07-25', '', 'Advance', '', 'Data Stracture', '  Desc', '65281-3rdyearsyllabus.pdf', 2),
(3, 'Japneet Rajput', 'japneetrajput@gmail.com', '+91 8104233686', 14, '0000-00-00', '2022-07-09', '1000', 'Advance', '500', 'Data Stracture', '  desc', '51063-japneet-rajput.pdf', 4),
(4, 'Japneet Rajput', 'japneetrajput@gmail.com', '+91 8104233686', 14, '2022-07-06', '2022-07-09', '1000', 'Advance', '500', 'Data Stracture', '  desc', '10432-japneet-rajput.pdf', 5),
(5, 'Japneet', 'japneetrajput@gmail.com', '8104235686', 14, '2022-07-05', '2022-07-06', '1200', 'Advance', '500', 'Data Stracture', '  desc', '89413-assignment.pdf', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `Username` varchar(150) NOT NULL,
  `Password` varchar(150) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(250) NOT NULL,
  `vkey` varchar(150) NOT NULL,
  `verified` tinyint(4) NOT NULL,
  `createTime` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `Username`, `Password`, `name`, `email`, `vkey`, `verified`, `createTime`) VALUES
(1, 'ArjunAbstract', '$2y$10$2Ebqq9WTW962yMJ5sTkStuv79wtcg4TzjtxCqjuunT61JFN/fl.v6', 'Japneet Rajput', '2020.japneet.rajput@ves.ac.in', '3d7d814e8fa6f42eee658dfb7b3f1f3f', 1, '2022-07-05'),
(2, 'Arjun', '$2y$10$QFkRVuQy5nfwQfRfktr9GuSHWedCrmy0.QLWZdlsVLyhEBwoYeQcm', 'Arjun', 'arjun@gmail.com', '47338b2eae779ef866d93af9e9f0fd0e', 0, '2022-07-06'),
(6, 'Jap', '$2y$10$B/mz33C/1ac424qoJcsTsuUGNV/NQ0jG1NNYG/obNota.Y8saSOhO', 'Japneet Raj', '2020.japneet.rajput@ves.ac.in', '49c4e5b101523b44e8d2a7c44afccdc4', 1, '2022-07-04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`file_id`);

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
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `file_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
