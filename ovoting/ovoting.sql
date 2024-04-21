-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 28, 2022 at 06:05 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ovoting`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `a_mob` varchar(30) COLLATE utf8_bin NOT NULL,
  `a_pass` varchar(50) COLLATE utf8_bin NOT NULL,
  `af_name` varchar(50) COLLATE utf8_bin NOT NULL,
  `al_name` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`a_mob`, `a_pass`, `af_name`, `al_name`) VALUES
('admin', 'admin', 'admin first name', 'admin last name');

-- --------------------------------------------------------

--
-- Table structure for table `topic`
--

CREATE TABLE `topic` (
  `t_id` int(11) NOT NULL,
  `t_disc` varchar(500) COLLATE utf8_bin NOT NULL,
  `op1` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `nop1` varchar(20) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `op2` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `nop2` varchar(20) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `op3` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `nop3` varchar(20) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `op4` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `nop4` varchar(20) COLLATE utf8_bin NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `topic`
--

INSERT INTO `topic` (`t_id`, `t_disc`, `op1`, `nop1`, `op2`, `nop2`, `op3`, `nop3`, `op4`, `nop4`) VALUES
(1, 'Which is the most important thing for our country?', 'Development', '0', 'Education', '2', 'Good governance', '1', 'Health', '0'),
(4, 'Which of the following is the best political party for India?', 'Bhartiya janta party', '2', 'Jan kalyan party', '0', 'Aam admin party', '1', 'Jan adhikar party', '1');

-- --------------------------------------------------------

--
-- Table structure for table `visitor`
--

CREATE TABLE `visitor` (
  `v_id` int(11) NOT NULL,
  `v_mob` varchar(20) COLLATE utf8_bin NOT NULL,
  `t_id` int(11) NOT NULL,
  `vf_name` varchar(30) COLLATE utf8_bin NOT NULL,
  `vl_name` varchar(30) COLLATE utf8_bin NOT NULL,
  `op` varchar(50) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `visitor`
--

INSERT INTO `visitor` (`v_id`, `v_mob`, `t_id`, `vf_name`, `vl_name`, `op`) VALUES
(8, '1111111111', 1, 'aman', 'kushwaha', 'Education'),
(12, '2222222222', 1, 'anjali', 'kumari', 'Good governance'),
(13, '1111111111', 4, 'aman', 'kushwaha', 'Akshay kumar'),
(14, '2222222222', 4, 'anjali', 'kumari', 'Shahrukh khan'),
(15, '3333333333', 4, 'aman', 'kushwaha', 'Alia bhatt'),
(16, '4545454545', 1, 'Rohan', 'sharma', 'Education'),
(17, '6856856851', 4, 'Saurabh', 'srivastav', 'Akshay kumar');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`a_mob`);

--
-- Indexes for table `topic`
--
ALTER TABLE `topic`
  ADD PRIMARY KEY (`t_id`),
  ADD KEY `t_id` (`t_id`);

--
-- Indexes for table `visitor`
--
ALTER TABLE `visitor`
  ADD PRIMARY KEY (`v_id`),
  ADD KEY `t_id` (`t_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `topic`
--
ALTER TABLE `topic`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `visitor`
--
ALTER TABLE `visitor`
  MODIFY `v_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `visitor`
--
ALTER TABLE `visitor`
  ADD CONSTRAINT `visitor_ibfk_1` FOREIGN KEY (`t_id`) REFERENCES `topic` (`t_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
