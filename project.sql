-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 11, 2017 at 12:04 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cust_email` varchar(50) NOT NULL,
  `cust_name` varchar(30) NOT NULL,
  `cust_mobile` bigint(10) NOT NULL,
  `cust_address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cust_email`, `cust_name`, `cust_mobile`, `cust_address`) VALUES
('cse150001009@iiti.ac.in', 'Dhruv Chadha', 9958873617, '303 - A');

-- --------------------------------------------------------

--
-- Table structure for table `slot`
--

CREATE TABLE `slot` (
  `slot_no` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `machine` char(10) NOT NULL,
  `date` date NOT NULL,
  `start_time` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slot`
--

INSERT INTO `slot` (`slot_no`, `email`, `machine`, `date`, `start_time`) VALUES
(1, 'cse150001009@iiti.ac.in', 'facs', '2017-03-25', '9:00 A.M.'),
(2, 'cse150001009@iiti.ac.in', 'confocal', '2017-04-12', '9:00 A.M.'),
(3, 'cse150001009@iiti.ac.in', 'confocal', '2017-04-12', '11:00 A.M.'),
(4, 'cse150001009@iiti.ac.in', 'confocal', '2017-04-12', '1:00 P.M.'),
(5, 'cse150001009@iiti.ac.in', 'confocal', '2017-04-06', '9:00 A.M.'),
(6, 'cse150001009@iiti.ac.in', 'confocal', '2017-04-06', '11:00 A.M.'),
(7, 'cse150001009@iiti.ac.in', 'confocal', '2017-04-15', '9:00 A.M.'),
(8, 'cse150001009@iiti.ac.in', 'confocal', '2017-04-13', '9:00 A.M.'),
(9, 'cse150001009@iiti.ac.in', 'confocal', '2017-04-12', '5:00 P.M.'),
(10, 'cse150001009@iiti.ac.in', 'confocal', '2017-04-03', '9:00 A.M.'),
(11, 'cse150001009@iiti.ac.in', 'facs', '2017-04-12', '11:00 A.M.'),
(12, 'cse150001009@iiti.ac.in', 'facs', '2017-04-12', '9:00 A.M.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cust_email`);

--
-- Indexes for table `slot`
--
ALTER TABLE `slot`
  ADD PRIMARY KEY (`slot_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `slot`
--
ALTER TABLE `slot`
  MODIFY `slot_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
