-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 25, 2023 at 03:31 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `orphanage-master`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `aadharcard` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`aadharcard`, `name`, `password`, `phone`, `email`, `address`) VALUES
('123456789012', 'Admin', 'admin', '9090909090', 'admin@gmail.com', 'Pune');

-- --------------------------------------------------------

--
-- Table structure for table `adopter`
--

CREATE TABLE `adopter` (
  `aadharcard` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `address` varchar(200) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `adopter`
--

INSERT INTO `adopter` (`aadharcard`, `name`, `phone`, `address`, `password`) VALUES
('123456789012', 'user1', '9090909090', 'Pune', 'user123'),
('123456789034', 'Sameet Yunus Pathan', '9975777709', 'Pune', 'user123');

-- --------------------------------------------------------

--
-- Table structure for table `adopterrequest`
--

CREATE TABLE `adopterrequest` (
  `request_id` int(11) NOT NULL,
  `adopter_aadharcard` varchar(100) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `address` varchar(200) NOT NULL,
  `request_date` datetime NOT NULL DEFAULT current_timestamp(),
  `adoption_date` varchar(100) NOT NULL,
  `child_adopted` varchar(100) NOT NULL,
  `reason` varchar(500) DEFAULT NULL,
  `status` varchar(50) DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `adopterrequest`
--

INSERT INTO `adopterrequest` (`request_id`, `adopter_aadharcard`, `full_name`, `phone`, `address`, `request_date`, `adoption_date`, `child_adopted`, `reason`, `status`) VALUES
(1, '123456789012', 'user1', '9090909090', 'Pune', '2023-02-08 13:55:12', '2023-02-01', '123456789012', 'Test', 'Document Verification');

-- --------------------------------------------------------

--
-- Table structure for table `donar`
--

CREATE TABLE `donar` (
  `aadharcard` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `donar`
--

INSERT INTO `donar` (`aadharcard`, `name`, `phone`, `password`, `address`) VALUES
('123456789012', 'user1', '9090909090', 'user123', 'Pune'),
('123456789034', 'Sameet Yunus Pathan', '9975777709', 'user123', 'Pune');

-- --------------------------------------------------------

--
-- Table structure for table `donation`
--

CREATE TABLE `donation` (
  `donation_id` int(11) NOT NULL,
  `aadharcard` varchar(100) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `address` varchar(255) NOT NULL,
  `donation_amount` varchar(100) NOT NULL,
  `transaction_id` varchar(50) NOT NULL,
  `donation_date` varchar(100) NOT NULL,
  `status` varchar(50) DEFAULT 'Not Confirmed'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `donation`
--

INSERT INTO `donation` (`donation_id`, `aadharcard`, `full_name`, `phone`, `address`, `donation_amount`, `transaction_id`, `donation_date`, `status`) VALUES
(1, '123456789012', 'Sameet Yunus Pathan', '2332232323', 'Pune', '20000', '332323233', '2023-02-14', 'Failed'),
(3, '123456789034', 'Sameet Yunus Pathan', '323233232', 'Pune', '2323232', '2323232323', '2023-02-13', 'Failed'),
(4, '123456789012', 'Sameet Yunus Pathan', '3234324324', 'Pune', '455445656', '54656546', '2023-02-20', 'Not Confirmed'),
(5, '2232323232', 'dsda', '4343452313232', 'dsv', '34545', '35345', '2023-02-23', 'Not Confirmed');

-- --------------------------------------------------------

--
-- Table structure for table `orphan_children`
--

CREATE TABLE `orphan_children` (
  `id` int(11) NOT NULL,
  `aadharcard` varchar(100) DEFAULT NULL,
  `full_name` varchar(100) NOT NULL,
  `date_of_birth` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `address` varchar(255) NOT NULL,
  `adopter` varchar(255) DEFAULT NULL,
  `guardian_name` varchar(100) NOT NULL,
  `guardian_phone` varchar(100) DEFAULT NULL,
  `admission_date` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `medical_history` text DEFAULT NULL,
  `education_level` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orphan_children`
--

INSERT INTO `orphan_children` (`id`, `aadharcard`, `full_name`, `date_of_birth`, `gender`, `address`, `adopter`, `guardian_name`, `guardian_phone`, `admission_date`, `status`, `medical_history`, `education_level`) VALUES
(3, '123456789012', 'Sameet Yunus Pathan', '2023-02-08', 'male', 'Pune', '123456789212', 'Yunus Pathan', '1212121212', '2023-02-15', 'active', 'No', 'primary');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`aadharcard`),
  ADD UNIQUE KEY `phone` (`phone`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `adopter`
--
ALTER TABLE `adopter`
  ADD PRIMARY KEY (`aadharcard`),
  ADD UNIQUE KEY `phone` (`phone`);

--
-- Indexes for table `adopterrequest`
--
ALTER TABLE `adopterrequest`
  ADD PRIMARY KEY (`request_id`);

--
-- Indexes for table `donar`
--
ALTER TABLE `donar`
  ADD PRIMARY KEY (`aadharcard`),
  ADD UNIQUE KEY `phone` (`phone`);

--
-- Indexes for table `donation`
--
ALTER TABLE `donation`
  ADD PRIMARY KEY (`donation_id`);

--
-- Indexes for table `orphan_children`
--
ALTER TABLE `orphan_children`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adopterrequest`
--
ALTER TABLE `adopterrequest`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `donation`
--
ALTER TABLE `donation`
  MODIFY `donation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orphan_children`
--
ALTER TABLE `orphan_children`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
