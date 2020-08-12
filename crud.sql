-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 12, 2020 at 11:47 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crud`
--

-- --------------------------------------------------------

--
-- Table structure for table `canvas`
--

CREATE TABLE `canvas` (
  `id` int(11) NOT NULL,
  `firstName` varchar(100) NOT NULL,
  `lastName` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `zip` varchar(50) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `familyDrName` varchar(100) NOT NULL,
  `familyDrPhn` int(15) NOT NULL,
  `reasonForReg` text NOT NULL,
  `medicineList` text NOT NULL,
  `image` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `canvas`
--

INSERT INTO `canvas` (`id`, `firstName`, `lastName`, `email`, `address`, `city`, `state`, `zip`, `gender`, `status`, `date`, `familyDrName`, `familyDrPhn`, `reasonForReg`, `medicineList`, `image`) VALUES
(5, 'karim', 'sada', 'husnazaman@gmail.com', 'Niketon,Gulshan-1', 'Dhaka', 'Oslo', '1216', 'Male', '', '0000-00-00', '', 0, '', '', 'images/5f1fb204c5e9f.png'),
(6, 'Abdur', 'Rahim', 'rahim21@gmail.com', 'Niketon,Gulshan-1', 'Dhaka', '', '1216', 'Male', '', '0000-00-00', '', 0, '', '', 'images/5f1fc790158a1.png'),
(7, 'Rokey', 'Hossain', 'rok@gmail.com', 'USA', 'New York', 'Oslo', '1212', 'Male', '', '0000-00-00', '', 0, '', '', 'images/5f1fead198302.png'),
(8, 'Tanim', 'Hossain', 'tanim@gmail.com', 'Dhaka', 'Dhaka', 'Berger', '1216', 'Male', 'Single', '0000-00-00', '', 0, '', '', 'images/5f20fceb288d3.png'),
(9, 'Demo', 'Demo', 'demo@gmail.com', '2 Mirpur Road', 'Dhaka', 'Oslo', '1216', 'Male', 'Single', '2020-07-15', 'dr.Demo', 2147483647, 'Demo', 'Demo', 'images/5f21520303205.png'),
(10, 'Md', 'Razib', 'razib@gmail.com', 'BD', 'Dhaka', 'Oslo', '1214', 'Male', 'Single', '2020-07-22', 'Rahim', 1618195557, 'Sick', 'Napa', 'images/5f219a770ac27.png'),
(11, 'pdf', 'pdf', 'husnazaman@gmail.com', 'Niketon,Gulshan-1', 'Dhaka', 'Oslo', '1216', 'Male', 'Single', '2020-07-22', 'pdf', 0, 'pdf', 'pdf', 'images/5f225e5fa2681.png'),
(14, 'Karim', 'Hasan', 'karim@gmail.com', 'Niketon,Gulshan-1', 'Dhaka', 'Oslo', '1216', 'Male', 'Single', '2020-08-01', 'Dr Karim', 2147483647, 'Sick', 'napa', 'images/5f27ed4c517f5.png'),
(15, 'Karim', 'Hasan', 'karim@gmail.com', 'Bangladesh', 'Dhaka', 'Oslo', '1216', 'Male', 'Single', '2020-08-01', 'Rahim', 1618195557, 'Sick', 'Napa , sergel', 'images/5f2abd80bb6ac.png'),
(16, 'saikat', 'Vai', 'saikat@gmail.com', 'Bangladesh', 'Dhaka', 'Oslo', '1216', 'Male', 'Married', '2020-08-01', 'Rahim', 1618195557, 'Sick', 'Napa', 'images/5f2ac146d9555.png');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `student_id` int(11) NOT NULL,
  `student_name` varchar(100) NOT NULL,
  `email_address` varchar(100) NOT NULL,
  `contact` varchar(30) NOT NULL,
  `gender` varchar(15) NOT NULL,
  `country` varchar(50) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`student_id`, `student_name`, `email_address`, `contact`, `gender`, `country`, `datetime`) VALUES
(20, 'Isabella', 'isabella@yahoo.com', '01711000005', 'Female', 'Costa Rica', '2017-08-27 20:11:50'),
(19, 'Sophia', 'sophia@gmail.com', '01711000004', 'Female', 'Belgium', '2017-08-27 20:10:55'),
(18, 'William', 'william@gmail.com', '01711000003', 'Male', 'Brazil', '2017-08-27 20:10:08'),
(16, 'Nahid', 'nahid@yahoo.com', '01711000002', 'Male', 'Bangladesh', '2017-08-27 19:57:35'),
(17, 'Arif', 'arif@gmail.com', '01711000001', 'Male', 'Bangladesh', '2017-08-27 20:04:13'),
(21, 'Michael', 'michael@gmail.com', '01711000006', 'Male', 'Ecuador', '2017-08-27 20:13:02'),
(22, 'Suman', 'suman@gmail.com', '01711000007', 'Male', 'India', '2017-08-27 20:13:55'),
(23, 'James', 'james@gmail.com', '01711000009', 'Male', 'United Kingdom', '2017-08-27 20:16:05'),
(24, 'Asik', 'asik@gmail.com', '01712000010', 'Male', 'Bangladesh', '2017-08-27 20:19:11'),
(26, 'Rahim', 'rahim@gmail.com', '017111111110', 'Male', 'Bangladesh', '2020-07-27 14:39:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `canvas`
--
ALTER TABLE `canvas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`student_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `canvas`
--
ALTER TABLE `canvas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
