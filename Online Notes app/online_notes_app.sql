-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 16, 2020 at 08:15 AM
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
-- Table structure for table `forgotpassword`
--

CREATE TABLE `forgotpassword` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `rkey` char(32) NOT NULL,
  `time` int(11) NOT NULL,
  `status` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `forgotpassword`
--

INSERT INTO `forgotpassword` (`id`, `user_id`, `rkey`, `time`, `status`) VALUES
(1, 1, '68080f42d225977298178d9a3c3c2df2', 1597042152, 'used'),
(2, 1, '3701046993cd13d9dea8d3c9c3985ff1', 1597044730, 'pending'),
(3, 1, 'd191ca0b794e8f31413889241d337dc3', 1597046582, 'pending'),
(4, 1, '40b9cb46c2d4207c56425bd414ee81be', 1597046587, 'pending'),
(5, 1, 'c53e63ef848de921cefe99c23011931c', 1597046731, 'used'),
(6, 1, '4deee1933a37d57ec880bce05f7878fb', 1597047294, 'used'),
(7, 1, '1bbd94228f40d325522fd73f5f746805', 1597068208, 'pending'),
(8, 1, 'c04b162d9cde9c133a78ea8af03d6d47', 1597068231, 'pending'),
(9, 1, '6bd1ff4d080be63a3da106b2e648ddab', 1597068237, 'pending'),
(10, 1, '66b7bc296bff1b8877824ba4729d7c1a', 1597068249, 'pending'),
(11, 1, 'c36b860035343d2c8a1a529f8f125c8d', 1597068299, 'pending'),
(12, 1, '79451827071fc166b19b82a4d74499d9', 1597068592, 'pending'),
(13, 1, 'ab6f39ef6349e2d0ad78fad2ef65f916', 1597068655, 'pending'),
(14, 1, 'f613098b1b80bc6d124424675bf89fac', 1597304965, 'pending'),
(15, 1, 'ccdfc5b8c2a0a1202e9a3812739d9930', 1597304972, 'used');

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`id`, `user_id`, `content`, `time`) VALUES
(71, 1, 'this is first note\n', 1597168797);

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

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(64) NOT NULL,
  `activation` char(32) NOT NULL,
  `activation2` char(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `password`, `activation`, `activation2`) VALUES
(1, 'ridham', 'ridhamgoyal07@gmail.com', '31d2fb6a6d8e5b09993927ccb96a05b001f4d1e52ebf921a123872cd75aaedc1', 'activated', 'fd9a9d275172790bb90be1d45bb62d73'),
(2, 'ridham1', 'ridhamgoyalrg@gmail.com', 'e92bc9b3a6933441475cde23449d4cf3219884e4f8343ccfe7bec620556dfcd5', 'activated', ''),
(3, 'ridhamgoyal07', 'ridhamgoyal077@gmail.com', '220f0341b0d2d239a00176cfde8a17c716723a779c7f0bbbd708f47bd4785f33', 'e758af9030d9acd1f998b9085ecd35b5', ''),
(4, 'ridhamgoyal077', 'ridhamgoyal0776@gmail.com', '220f0341b0d2d239a00176cfde8a17c716723a779c7f0bbbd708f47bd4785f33', '4b658978a8b3798f50ee083857af0cfd', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `forgotpassword`
--
ALTER TABLE `forgotpassword`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rememberme`
--
ALTER TABLE `rememberme`
  ADD PRIMARY KEY (`Identity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `forgotpassword`
--
ALTER TABLE `forgotpassword`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `rememberme`
--
ALTER TABLE `rememberme`
  MODIFY `Identity` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
