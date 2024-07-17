-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 17, 2024 at 10:09 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ms`
--

-- --------------------------------------------------------

--
-- Table structure for table `a_request`
--

CREATE TABLE `a_request` (
  `a_id` int(5) NOT NULL,
  `a_name` varchar(100) DEFAULT NULL,
  `a_email` varchar(50) DEFAULT NULL,
  `a_contact` bigint(20) DEFAULT NULL,
  `a_state` varchar(100) NOT NULL,
  `a_city` varchar(50) NOT NULL,
  `a_pincode` int(10) NOT NULL,
  `a_dob` date NOT NULL,
  `a_blood_group` text NOT NULL,
  `a_health_issue` varchar(200) NOT NULL,
  `acc_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `r_id` int(5) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `profile_pic` text DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `contact` bigint(20) DEFAULT NULL,
  `password` varchar(50) NOT NULL,
  `conf_password` varchar(50) NOT NULL,
  `state` varchar(100) NOT NULL,
  `city` varchar(50) NOT NULL,
  `pincode` int(10) NOT NULL,
  `gender` text NOT NULL,
  `dob` date NOT NULL,
  `blood_group` text NOT NULL,
  `health_issue` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`r_id`, `name`, `profile_pic`, `email`, `contact`, `password`, `conf_password`, `state`, `city`, `pincode`, `gender`, `dob`, `blood_group`, `health_issue`) VALUES
(1, 'vardhan', 'john.jpg', 'vardhan@gmail.com', 9327079010, 'vardhan', 'vardhan', 'jammu', 'jammu', 365410, 'male', '2024-06-27', 'O+', '-'),
(2, 'kartik', 'jane.jpg', 'kartik@gmail.com', 7894561236, 'kartik', 'kartik', 'jammu', 'jammu', 365410, 'male', '2024-06-21', 'O+', '-'),
(3, 'gunjan', 'emily.jpg', 'gunjan@gmail.com', 654987452, 'gunjan', 'gunjan', 'gujarta', 'amreli', 365410, 'female', '2024-06-25', 'O+', '-'),
(4, 'Nidhi', 'aboutus.jpg', 'nidhi@gmail.com', 4548458942, 'nidhi', 'nidhi', 'gujarat', 'rajkot', 6987412, 'female', '2024-07-01', 'A+', 'diabities');

-- --------------------------------------------------------

--
-- Table structure for table `r_request`
--

CREATE TABLE `r_request` (
  `r_id` int(5) NOT NULL,
  `receiver_id` int(5) NOT NULL,
  `r_name` varchar(50) NOT NULL,
  `r_email` varchar(30) NOT NULL,
  `r_state` varchar(50) NOT NULL,
  `r_city` varchar(50) NOT NULL,
  `r_pincode` varchar(50) NOT NULL,
  `r_blood_grp` varchar(50) NOT NULL,
  `r_h_issue` varchar(200) NOT NULL,
  `reg_id` int(5) NOT NULL,
  `status` int(5) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `r_request`
--

INSERT INTO `r_request` (`r_id`, `receiver_id`, `r_name`, `r_email`, `r_state`, `r_city`, `r_pincode`, `r_blood_grp`, `r_h_issue`, `reg_id`, `status`) VALUES
(1, 1, 'vardhan', 'vardhan@gmail.com', 'jammu', 'jammu', '365410', 'O+', '-', 0, 0),
(2, 2, 'kartik', 'kartik@gmail.com', 'jammu', 'jammu', '365410', 'O+', '-', 0, 0),
(3, 2, 'kartik', 'kartik@gmail.com', 'jammu', 'jammu', '365410', 'O+', '-', 1, 1),
(4, 2, 'kartik', 'kartik@gmail.com', 'jammu', 'jammu', '365410', 'O+', '-', 4, 2),
(5, 3, 'gunjan', 'gunjan@gmail.com', 'gujarta', 'amreli', '365410', 'O+', '-', 4, 2),
(6, 3, 'gunjan', 'gunjan@gmail.com', 'gujarta', 'amreli', '365410', 'O+', '-', 2, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `a_request`
--
ALTER TABLE `a_request`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`r_id`);

--
-- Indexes for table `r_request`
--
ALTER TABLE `r_request`
  ADD PRIMARY KEY (`r_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `r_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `r_request`
--
ALTER TABLE `r_request`
  MODIFY `r_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
