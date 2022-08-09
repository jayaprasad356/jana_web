-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 09, 2022 at 12:42 AM
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
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` text DEFAULT NULL,
  `image` text DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `last_updated` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `date_created` int(11) NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `image`, `status`, `last_updated`, `date_created`) VALUES
(1, 'Work From Home', 'upload/images/3308-2022-08-05.jpg', 1, '2022-08-04 21:51:27', 2147483647),
(2, 'Office/Company Work', 'upload/images/0949-2022-08-05.jpg', 1, '2022-08-06 19:38:35', 2147483647),
(3, 'Field Work', 'upload/images/7585-2022-08-05.jpg', 0, NULL, 2147483647),
(4, 'Repair Work', 'upload/images/3481-2022-08-05.jpg', 1, '2022-08-06 19:38:41', 2147483647),
(5, 'Mechanical Work', 'upload/images/8987-2022-08-05.jpg', 0, NULL, 2147483647),
(6, 'Computer Work', 'upload/images/3079-2022-08-05.jpg', 1, '2022-08-06 19:38:47', 2147483647),
(7, 'Cleaning Work', 'upload/images/9697-2022-08-05.jpg', 0, NULL, 2147483647),
(8, 'Delivery Work', 'upload/images/9669-2022-08-05.jpg', 1, '2022-08-06 19:38:52', 2147483647);

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` int(11) NOT NULL,
  `company_name` text DEFAULT NULL,
  `job_title` text DEFAULT NULL,
  `category` text DEFAULT NULL,
  `location` text DEFAULT NULL,
  `salary` text DEFAULT NULL,
  `image` text DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `company_name`, `job_title`, `category`, `location`, `salary`, `image`, `status`) VALUES
(1, 'Jandroid  Tech Solutions', 'Frontend Developer', 'Trichy', 'Trichy', '3.8lakh', 'upload/images/1659713644.8223.jpg', 1);

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
(1, 'PHP Developer', 'Greymatter Works', 'Trichy', 'greymatter@gmail.com', '8428225519', '2022-07-07', '10.00-10.30 AM', 'B.E', '2years', 'htps:///gadfstfd.com', 'Bangalore', '1.5 Lakh', 'trailer', 'Tamil'),
(4, 'Frontend Developer', 'lenzan Tech', '1,Bangalore,Tamilnadu', 'example@gmail.com', '1234567899', '2022-07-28', '12:24', 'B.E[IT]', '2 Years', 'https://ncbcugc.in', 'trichy', '2.5lakh', 'NA', 'English'),
(5, 'backend Developer', 'gsgg', 'scbsch', 'dcbsgdid@gmail.com', '1234567890', '2022-07-14', '1.00-1.30 PM', 'scsv', '8yaers', 'https://ncbcugc.in', 'Bangalore', '3.8lakh', 'NA', 'Tamil');

-- --------------------------------------------------------

--
-- Table structure for table `slides`
--

CREATE TABLE `slides` (
  `id` int(11) NOT NULL,
  `name` text DEFAULT NULL,
  `image` text DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `slides`
--

INSERT INTO `slides` (`id`, `name`, `image`, `status`) VALUES
(3, 'Civil Engineer', 'upload/slides/9157-2022-08-05.png', 1);

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
(1, 'Divakar', '8426344659', '545547', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news_jobs`
--
ALTER TABLE `news_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slides`
--
ALTER TABLE `slides`
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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `news_jobs`
--
ALTER TABLE `news_jobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `slides`
--
ALTER TABLE `slides`
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
