-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 05, 2021 at 04:45 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jobtracker`
--

-- --------------------------------------------------------

--
-- Table structure for table `applicant`
--

CREATE TABLE `applicant` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `dob` date NOT NULL,
  `email` text NOT NULL,
  `contact` bigint(11) NOT NULL,
  `address` text NOT NULL,
  `vac_id` int(11) NOT NULL,
  `prelim` int(11) DEFAULT NULL,
  `remarks` varchar(120) NOT NULL DEFAULT 'Pending',
  `hr_remarks` varchar(120) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `applicant`
--

INSERT INTO `applicant` (`id`, `name`, `dob`, `email`, `contact`, `address`, `vac_id`, `prelim`, `remarks`, `hr_remarks`) VALUES
(1, 'Rahul', '2000-09-01', 'aakarshvermaofficial@gmail.com', 9876543224, 'Panvel', 1, 1, 'Approved', 'Approved'),
(2, 'shubam', '2021-03-04', 'shubam@gmail.com', 9876543201, 'Panvel', 3, NULL, 'Pending', 'Pending'),
(3, 'pr', '2021-03-12', 'raweul@gmail.com', 987654328, 'Panvel', 3, 0, 'Denied', 'Pending'),
(6, 'prq', '2021-04-03', 'prq@fmail.com', 9876543219, 'Panvel', 2, 0, 'Pending', 'Pending'),
(7, 'prq', '2021-04-03', 'prq@fmail.com', 9876543219, 'Panvel', 2, 0, 'Pending', 'Pending'),
(8, 'abcd', '2021-03-03', 'ancd@scd.com', 9876543298, 'Panvel', 1, 0, 'Pending', 'Pending'),
(9, 'abcde', '2021-03-03', 'anced@scd.com', 9876543299, 'Panvel', 1, NULL, 'Pending', 'Pending'),
(10, 'prq', '2021-03-04', 'aakarshkun@gmail.com', 98765432198, 'Panvel', 1, 1, 'Approved', 'Denied'),
(11, 'wawqdwqd', '2021-03-04', 'wqdqww@dada.com', 876543, 'Panvel', 2, 1, 'Pending', 'Pending'),
(12, 'Sujith', '2020-10-02', 'sujith@gmail.com', 9876543219, 'Panvel', 3, 1, 'Approved', 'Approved'),
(13, 'shubam', '2021-01-08', 'aakarshkun@gmail.com', 9876543212, 'Panvel', 5, NULL, 'Pending', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `head_id` int(11) DEFAULT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `name`, `head_id`, `description`) VALUES
(1, 'Research & Development', 1, 'Research & Development'),
(2, 'Production', 2, 'Production'),
(3, 'Human Resources', NULL, 'Human Resources');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `dob` date NOT NULL,
  `email` varchar(120) NOT NULL,
  `epassword` varchar(20) NOT NULL,
  `contact` bigint(20) NOT NULL,
  `role` varchar(60) NOT NULL,
  `salary` int(11) NOT NULL DEFAULT 50000,
  `deptid` int(11) NOT NULL,
  `idcard` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `name`, `dob`, `email`, `epassword`, `contact`, `role`, `salary`, `deptid`, `idcard`) VALUES
(1, 'Aakarsh', '2000-09-01', 'aakarshkun@gmail.com', '123456', 9876543212, 'head', 1000000, 1, NULL),
(2, 'Pramod', '2000-09-03', 'pramod@gmail.com', '123456', 9876543213, 'HR_Manager', 10000, 3, NULL),
(3, 'Saurab', '2000-03-01', 'saurab@gmail.com', '123456', 9876543214, 'Manager', 10000, 2, NULL),
(4, 'Pritam', '2000-01-01', 'pritam@gmail.com', '123456', 9876543215, 'Manager', 20000, 1, NULL),
(21, 'Rahul', '2000-09-01', 'aakarshvermaofficial@gmail.com', '123456', 9876543224, 'Assistant Manager', 50000, 2, 1),
(22, 'Sujith', '2020-10-02', 'sujith@gmail.com', '123456', 9876543219, 'Jr. Developer', 50000, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `organization`
--

CREATE TABLE `organization` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `address` text NOT NULL,
  `handler_name` varchar(60) NOT NULL,
  `handler_email` varchar(120) NOT NULL,
  `handler_contact` bigint(20) NOT NULL,
  `epassword` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `organization`
--

INSERT INTO `organization` (`id`, `name`, `address`, `handler_name`, `handler_email`, `handler_contact`, `epassword`) VALUES
(0, 'CyperSolutions', 'New Panvel.', 'Neel', 'neel@gmail.com', 9876543219, '123456');

-- --------------------------------------------------------

--
-- Table structure for table `vacancy`
--

CREATE TABLE `vacancy` (
  `id` int(11) NOT NULL,
  `role_name` varchar(60) NOT NULL,
  `role_desc` text NOT NULL,
  `comments` text DEFAULT NULL,
  `dept_id` int(11) NOT NULL,
  `date_start` date NOT NULL,
  `date_end` date DEFAULT NULL,
  `int_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vacancy`
--

INSERT INTO `vacancy` (`id`, `role_name`, `role_desc`, `comments`, `dept_id`, `date_start`, `date_end`, `int_id`) VALUES
(1, 'Assistant Manager', 'Assistant Manager of R&D.', 'required experience of at least 5 years.', 1, '2021-03-03', NULL, 4),
(2, 'Jr.Manager', 'Jr.Manager of HR.', 'required experience of at least 3 years.', 3, '2021-03-03', NULL, 2),
(3, 'Jr. Developer', 'Jr. Developer', '', 1, '2021-03-04', NULL, 3),
(4, 'Jr. Manager', 'Jr. Manager of R&D.', '', 1, '2021-03-04', NULL, 4),
(5, 'Sr. Manager', 'Sr. Manager of R&D', 'required experience of at least 5 years.', 1, '2021-03-04', NULL, 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applicant`
--
ALTER TABLE `applicant`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vac_id` (`vac_id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`),
  ADD KEY `head_id` (`head_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`),
  ADD KEY `deptid` (`deptid`);

--
-- Indexes for table `organization`
--
ALTER TABLE `organization`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vacancy`
--
ALTER TABLE `vacancy`
  ADD PRIMARY KEY (`id`),
  ADD KEY `int_id` (`int_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applicant`
--
ALTER TABLE `applicant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `vacancy`
--
ALTER TABLE `vacancy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `applicant`
--
ALTER TABLE `applicant`
  ADD CONSTRAINT `vac_id` FOREIGN KEY (`vac_id`) REFERENCES `vacancy` (`id`);

--
-- Constraints for table `department`
--
ALTER TABLE `department`
  ADD CONSTRAINT `head_id` FOREIGN KEY (`head_id`) REFERENCES `employee` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `deptid` FOREIGN KEY (`deptid`) REFERENCES `department` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `vacancy`
--
ALTER TABLE `vacancy`
  ADD CONSTRAINT `int_id` FOREIGN KEY (`int_id`) REFERENCES `employee` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
