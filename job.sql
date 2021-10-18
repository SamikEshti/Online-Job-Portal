-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 03, 2021 at 06:29 PM
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
-- Database: `job`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(1) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`) VALUES
(1, 'admin@gmail.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `all_jobs`
--

CREATE TABLE `all_jobs` (
  `id` int(99) NOT NULL,
  `company_name` varchar(99) NOT NULL,
  `category` varchar(99) NOT NULL,
  `title` varchar(99) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `experience` varchar(99) NOT NULL,
  `qualification` varchar(99) NOT NULL,
  `location` varchar(99) NOT NULL,
  `posting_date` date NOT NULL,
  `deadline` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `all_jobs`
--

INSERT INTO `all_jobs` (`id`, `company_name`, `category`, `title`, `description`, `experience`, `qualification`, `location`, `posting_date`, `deadline`) VALUES
(3, 'Eshti IT', '', 'Senior accountant', '                        Hello, this is an updated description.\r\n                                                            ', '5 plus', 'masters', 'sylhet', '2020-12-30', '2020-12-31'),
(6, 'Eshti IT', 'accounting', 'Junior accountant', 'Hello, this is an updated description.\r\n                                        ', '1 to 2', 'bachelor', 'dhaka', '2020-12-30', '2020-12-31'),
(7, 'Eshti IT', 'accounting', 'Senior accountant', 'Hello, this is an updated description.\r\n                                        ', '1 to 2', 'bachelor', 'dhaka', '2020-12-30', '2020-12-31'),
(8, 'Eshti IT', 'accounting', 'Junior accountant', 'Hello, this is an updated description.\r\n                                        ', '1 to 2', 'bachelor', 'dhaka', '2020-12-30', '2020-12-31'),
(9, 'Eshti IT', 'accounting', 'Junior accountant', 'Hello, this is an updated description.\r\n                                        ', '1 to 2', 'bachelor', 'dhaka', '2020-12-30', '2020-12-31'),
(10, 'Eshti IT', 'engineering', 'Senior Developer', 'We need a senior javascript developer\r\n                                        ', '5 plus', 'bachelor', 'dhaka', '2020-12-30', '2020-12-31');

-- --------------------------------------------------------

--
-- Table structure for table `applied_jobs`
--

CREATE TABLE `applied_jobs` (
  `id` int(9) NOT NULL,
  `company_name` varchar(99) NOT NULL,
  `full_name` varchar(99) NOT NULL,
  `title` varchar(20) NOT NULL,
  `post_id` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `applied_jobs`
--

INSERT INTO `applied_jobs` (`id`, `company_name`, `full_name`, `title`, `post_id`) VALUES
(1, 'Eshti IT', 'Tanzidur Rahman', 'Junior accountant', ''),
(2, 'Eshti IT', 'Tanzidur Rahman', 'Junior accountant', ''),
(3, 'Eshti IT', 'Ashik Ahmed', 'Junior accountant', ''),
(4, 'Eshti IT', 'Tanzidur Rahman', 'Senior Developer', ''),
(5, 'Eshti IT', 'Ashik Ahmed Eshan', 'Senior Developer', ''),
(6, 'Eshti IT', 'Ashik Ahmed', 'Senior Developer', ''),
(7, 'Eshti IT', 'Fahim', 'Senior accountant', ''),
(8, 'Eshti IT', 'Fahim Tanzid', 'Senior accountant', '3'),
(9, 'Eshti IT', 'New member', 'Senior accountant', '7'),
(10, 'Eshti IT', 'Ashik Eshan', 'Senior accountant', '3'),
(11, 'Eshti IT', 'Eshan', 'Junior accountant', '6'),
(12, 'Eshti IT', 'aShik93', 'Junior accountant', '6'),
(13, 'Eshti IT', 'Dummy', 'Junior accountant', '6');

-- --------------------------------------------------------

--
-- Table structure for table `employer`
--

CREATE TABLE `employer` (
  `id` int(2) NOT NULL,
  `company_name` varchar(99) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employer`
--

INSERT INTO `employer` (`id`, `company_name`, `email`, `password`) VALUES
(4, 'Eshti IT', 'samik@gmail.com', '12345'),
(7, 'Desh org', 'desh@gmail.com', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `seeker`
--

CREATE TABLE `seeker` (
  `id` int(2) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `seeker`
--

INSERT INTO `seeker` (`id`, `email`, `password`) VALUES
(4, 'fahim@gmail.com', '12345'),
(5, 'ratul@gmail.com', '12345'),
(7, 'hasan@gmail.com', '12345'),
(8, 'Rahman@gmail.com', '12345'),
(11, 'new@gmail.com', '12345');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `all_jobs`
--
ALTER TABLE `all_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `applied_jobs`
--
ALTER TABLE `applied_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employer`
--
ALTER TABLE `employer`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `seeker`
--
ALTER TABLE `seeker`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `all_jobs`
--
ALTER TABLE `all_jobs`
  MODIFY `id` int(99) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `applied_jobs`
--
ALTER TABLE `applied_jobs`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `employer`
--
ALTER TABLE `employer`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `seeker`
--
ALTER TABLE `seeker`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
