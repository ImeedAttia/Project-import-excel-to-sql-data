-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 08, 2021 at 01:25 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test001`
--

-- --------------------------------------------------------

--
-- Table structure for table `super_user1`
--

CREATE TABLE `super_user1` (
  `id` int(11) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `availble` int(11) NOT NULL,
  `admin_user` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `super_user1`
--

INSERT INTO `super_user1` (`id`, `fname`, `lname`, `email`, `password`, `date`, `availble`, `admin_user`) VALUES
(1, 'imed', 'FQSDFQSFQ', 'QSDFSF', 'FSDFQFDQSF', '2021-08-07 23:10:37', 1, 'user'),
(2, 'imed', 'imed', 'imed@eada', 'imed1234', '0000-00-00 00:00:00', 1, 'admin'),
(9, 'attia', 'imedhyhyhy', 'FDSFQS', 'DSFQSDFSDFQ', '2021-08-07 23:16:05', 0, ''),
(10, 'hama', 'hbaieb', 'fdsqfqdsf', 'fdsqffq', '2021-08-07 23:15:04', 1, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `super_user1`
--
ALTER TABLE `super_user1`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `super_user1`
--
ALTER TABLE `super_user1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
