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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `forgotpassword`
--
ALTER TABLE `forgotpassword`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `forgotpassword`
--
ALTER TABLE `forgotpassword`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
