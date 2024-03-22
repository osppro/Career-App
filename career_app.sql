-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 22, 2024 at 03:00 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `career_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `career`
--

CREATE TABLE `career` (
  `career_id` bigint(20) NOT NULL,
  `cname` varchar(200) NOT NULL,
  `croles` varchar(200) NOT NULL,
  `cdescription` varchar(200) NOT NULL,
  `eligibility` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `counselor`
--

CREATE TABLE `counselor` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `national_id` varchar(255) NOT NULL,
  `qualifications` varchar(255) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `address` varchar(200) NOT NULL,
  `nationality` varchar(50) NOT NULL,
  `next_of_kin` varchar(50) NOT NULL,
  `relative_contact` varchar(15) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `id` int(11) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`id`, `subject`, `status`) VALUES
(1, 'jkjhngbh', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userid` bigint(20) NOT NULL,
  `fname` varchar(200) NOT NULL,
  `lname` varchar(200) NOT NULL,
  `username` varchar(200) NOT NULL,
  `phone` varchar(200) NOT NULL,
  `email_address` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `u_status` varchar(200) NOT NULL,
  `education_status` varchar(200) NOT NULL,
  `role` varchar(200) NOT NULL,
  `stateoforgin` varchar(200) NOT NULL,
  `dfb` varchar(200) NOT NULL,
  `date_registered` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `fname`, `lname`, `username`, `phone`, `email_address`, `password`, `u_status`, `education_status`, `role`, `stateoforgin`, `dfb`, `date_registered`) VALUES
(1, '', '', 'michael james', '0734554553', '', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '0', '', 'Admin', '', '', '2024-02-17'),
(2, '', '', 'Mike', '076454447', '', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '0', '', 'Student', '', '', '2024-02-17'),
(3, '', '', 'eridad', '07564534', '', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '0', '', 'Counselor', '', '', '2024-02-17'),
(4, '', '', 'James Peter', '078645465', '', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '0', '', 'career', '', '', '2024-02-17'),
(5, '', '', 'olowo', '0756445756', '', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '0', '', 'Career', '', '', '2024-02-17'),
(6, '', '', 'mike', '076485767', '', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '0', '', 'Student', '', '', '2024-02-17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `career`
--
ALTER TABLE `career`
  ADD PRIMARY KEY (`career_id`);

--
-- Indexes for table `counselor`
--
ALTER TABLE `counselor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `career`
--
ALTER TABLE `career`
  MODIFY `career_id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `counselor`
--
ALTER TABLE `counselor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userid` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
