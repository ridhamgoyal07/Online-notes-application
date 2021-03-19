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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
