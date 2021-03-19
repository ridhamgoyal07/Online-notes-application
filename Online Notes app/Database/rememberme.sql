-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 16, 2020 at 08:16 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_notes_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `rememberme`
--

CREATE TABLE `rememberme` (
  `Identity` int(11) NOT NULL,
  `authenticator1` char(20) NOT NULL,
  `f2authenticator2` char(64) NOT NULL,
  `user_id` int(11) NOT NULL,
  `expires` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rememberme`
--

INSERT INTO `rememberme` (`Identity`, `authenticator1`, `f2authenticator2`, `user_id`, `expires`) VALUES
(1, 'd114811a710fa458c80f', '039116cfa66da274169c5d597979143c69bc10be81bc0931b2249f8bb82e1daf', 1, '2020-08-24 16:15:10'),
(2, 'c8a7a71d80e4418f22d8', '4dcbf02a11e4b08e658922e567f0a555f8d07edfef7f9992817f92f31222ff47', 1, '2020-08-24 18:57:39'),
(3, '6965a44fdf13d1b14d9b', '554fb01ef31325b7a044638f26bf40208aba5c4308be9f92b873197bfbca6849', 0, '2020-08-24 18:58:24'),
(4, '9f377a3ca8fdea5f0fb8', '714b8312fb65cfd28eea7b0f0032a97bdad001fd8b2de3667328db514d102d3c', 1, '2020-08-24 19:15:55'),
(5, '60a4fda40a0db9a1b2ba', 'c849334d788724f4b4cedb2f7624a28a8e2e0413714948a29a4cc2b85a4472ae', 1, '2020-08-24 19:16:42'),
(6, '57c340aa3b7d2d5d6aeb', '60ce75a9d18dc50e5a78cde62e9b868a15adc54bf78cc05aad140a3b6aa9051c', 1, '2020-08-24 19:17:39'),
(7, '981cf7a68db809246ba4', '8a34ce725b4827e1f8e3260a59a15be4cbd04fbe89aa245b29424b24d6b645f2', 1, '2020-08-24 19:18:46'),
(8, '69f81b82636d11c10515', '8047f311f09b31463c6565b583b1931f42df4a0bf581b0a3b271ba9a58262a8d', 1, '2020-08-25 10:16:53'),
(9, '340032d4433b8940297c', 'c2c195b6fe8148be8ccd1fe0ee4b655fc698acbda43bb40783e7f7cb5f11abb8', 1, '2020-08-25 16:08:43');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `rememberme`
--
ALTER TABLE `rememberme`
  ADD PRIMARY KEY (`Identity`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `rememberme`
--
ALTER TABLE `rememberme`
  MODIFY `Identity` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
