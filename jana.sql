-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 25, 2022 at 11:49 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jana`
--

-- --------------------------------------------------------

--
-- Table structure for table `news_jobs`
--

CREATE TABLE `news_jobs` (
  `id` int(11) NOT NULL,
  `job_title` text DEFAULT NULL,
  `company_name` text DEFAULT NULL,
  `company_address` text DEFAULT NULL,
  `email` text DEFAULT NULL,
  `phone_no` text DEFAULT NULL,
  `interview_date` text DEFAULT NULL,
  `interview_time` text DEFAULT NULL,
  `emp_qualification` text DEFAULT NULL,
  `emp_experience` text DEFAULT NULL,
  `link` text DEFAULT NULL,
  `venue` text DEFAULT NULL,
  `salary` text DEFAULT NULL,
  `more_details` text DEFAULT NULL,
  `language` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `news_jobs`
--

INSERT INTO `news_jobs` (`id`, `job_title`, `company_name`, `company_address`, `email`, `phone_no`, `interview_date`, `interview_time`, `emp_qualification`, `emp_experience`, `link`, `venue`, `salary`, `more_details`, `language`) VALUES
(1, 'PHP Developer', 'Greymatter Works', 'Trichy', 'greymatter@gmail.com', '8428225519', '13.09.2022', '10.00-10.30 AM', 'B.E', '2years', 'htps:///gadfstfd.com', 'Bangalore', '1.5 Lakh', 'trailer', 'Tamil');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` text DEFAULT NULL,
  `mobile` text DEFAULT NULL,
  `pincode` text DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `mobile`, `pincode`, `status`) VALUES
(1, 'Divakar', '8426344659', '545547', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `news_jobs`
--
ALTER TABLE `news_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `news_jobs`
--
ALTER TABLE `news_jobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
