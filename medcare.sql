-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 27, 2021 at 11:11 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `medcare`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `id` int(11) NOT NULL,
  `fullName` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `phone` varchar(40) NOT NULL,
  `nid` varchar(40) NOT NULL,
  `PASSWORD` varchar(255) NOT NULL,
  `users` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `fullName`, `email`, `phone`, `nid`, `PASSWORD`, `users`) VALUES
(1, 'Tanvir', 'khan_tanvir@outlook.com', '', '', '$2y$10$mHdM07SIdgs/2OrsG889xe.PFX2bbkkfzKJMy5Nhc5OIqqri8bsLq', 'doctor'),
(2, 'Rubayet', 'rubayet@gmail.com', '', '', '$2y$10$ULVWxGf/VqjbkIsrxAs1HuH9op5nlKGXOaInxMIQSjLj1GpNSlw7O', 'patient'),
(3, 'Ayon', 'ayon_chowdhury@gmail.com', '', '', '$2y$10$0BoCfkGEMxIpBY.Uy7dfme5REfXk9NweJ7D3ZcTS5CskCC8jToTLG', 'patient'),
(4, 'Admin', 'admin@gmail.com', '', '', '$2y$10$UNd/GEWvq57osaFkW7Ku7.nQ.IWpfemZhqdk/2d25UWApw45gCwsO', 'admin'),
(5, 'Prithy', 'prithy@gmail.com', '', '', '$2y$10$glRGej8mW9Pd/6W8NS5BPuRDfEhZd0oJtkXQbBag7YM2F9UR0xN5O', 'doctor'),
(6, 'Rubayet Shahir', 'rubayet_shahir@gmail.com', '01818529091', '2695432908210', '$2y$10$bJStKqF6w.7rGLErjoPwKOREzJxYedxXmVr9RxS7rW9lN3NuogqI6', 'admin'),
(7, 'Tazriyan', 'tazriyan@gmail.com', '01923534545', '2695432908210', '$2y$10$VbxcaC7tj2MUdwEgDpAFc.DPrUFCefhcIv1N5fbOT2zhEDMPTXIV2', 'patient'),
(8, 'Zafirah', 'zafirah@gmail.com', '01923534545', '2695432908210', '$2y$10$AazIK1hcsjzTtoFeS1KuG.c832EbiiJgE3i.fhCcpvlgrO3YHT2Fq', 'patient');

-- --------------------------------------------------------

--
-- Table structure for table `ambulance`
--

CREATE TABLE `ambulance` (
  `ambulance_id` int(30) NOT NULL,
  `ambulance_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ambulance`
--

INSERT INTO `ambulance` (`ambulance_id`, `ambulance_name`) VALUES
(1, 'Khaled Ambulance Service'),
(2, 'Ahad Ambulance Service'),
(3, '24 Ambulance Service'),
(4, 'M ICU Ambulance Service'),
(5, 'Ambulance BD'),
(6, 'Lamyea Ambulance Service'),
(7, 'Alif Ambulance'),
(8, 'Skider Ambulance');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `appointment_id` int(20) NOT NULL,
  `name` varchar(25) NOT NULL,
  `email` varchar(25) NOT NULL,
  `phone` varchar(25) NOT NULL,
  `date` date NOT NULL,
  `department` varchar(25) NOT NULL,
  `doctor` varchar(25) NOT NULL,
  `message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`appointment_id`, `name`, `email`, `phone`, `date`, `department`, `doctor`, `message`) VALUES
(1, 'Tanvir Ahmed Khan', 'khan_tanvir@outlook.com', '01923534545', '2021-11-28', 'Department 1', 'Doctor 1', 'Hello'),
(3, 'Ayon Chowdhury', 'ayon_chowdhury@gmail.com', '12345678901', '2021-11-28', 'Department 1', 'Doctor 1', 'Hello'),
(7, 'Asiya', 'asiya@gmail.com', '01923534545', '2021-11-29', 'Department 1', 'Doctor 1', 'Hello');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `booking_id` int(20) NOT NULL,
  `ambulance` varchar(100) NOT NULL,
  `hospital` varchar(100) NOT NULL,
  `area` varchar(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phome` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `contact_id` int(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`contact_id`, `name`, `email`, `subject`, `message`) VALUES
(1, 'Tanvir Ahmed Khan', 'khan_tanvir@outlook.com', 'Cancer', 'Cancer'),
(2, 'Ayon Chowdhury', 'ayon_chowdhury@gmail.com', 'Cancer', 'Cancer'),
(3, 'Asiya', 'asiya@gmail.com', 'Cancer', 'Cancer');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `department_id` int(20) NOT NULL,
  `department_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`department_id`, `department_name`) VALUES
(1, 'Medical'),
(2, 'Nursing'),
(3, 'Paramedical'),
(4, 'Physical'),
(5, 'Rehabilitation'),
(6, 'Operation Theatre'),
(7, 'Radiology');

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `doctor_id` int(20) NOT NULL,
  `doctor_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`doctor_id`, `doctor_name`) VALUES
(1, 'Dr. Taslima Afroz'),
(2, 'Dr. Rashidul Hasan Shafin'),
(3, 'Dr. Nusrat Jahan Daisy'),
(4, 'Dr. Newaz Ahmed'),
(5, 'Dr. Mohammad Ali'),
(6, 'Dr. Nurul Islam'),
(7, 'Dr. Elias Ali'),
(8, 'Dr. M.M.H. Monir'),
(11, 'Dr. Farid'),
(12, 'Dr Asiya');

-- --------------------------------------------------------

--
-- Table structure for table `hospital`
--

CREATE TABLE `hospital` (
  `hospital_id` int(30) NOT NULL,
  `hospital_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hospital`
--

INSERT INTO `hospital` (`hospital_id`, `hospital_name`) VALUES
(1, 'Islami Bank Specialized And General Hospital'),
(2, 'Islami Bank Central Hospital, Kakrail'),
(3, 'BIRDEM General Hospital 2 (Child and Mother)'),
(4, 'Asgar Ali Hospital'),
(5, 'Proshanti Hospital Limited'),
(6, 'Pan Pacific Hospital,Training & Research Institute Ltd.'),
(7, 'Dhaka Hospital'),
(8, 'The Barakah General Hospital Limited'),
(9, 'Health Care Hospital'),
(10, 'LABAID Cardiac Hospital'),
(11, 'Monowara Orthopedic and General Hospital'),
(12, 'Khidmah Hospital Private Limited'),
(13, 'Nibedita Shisu Hospital Limited'),
(14, 'Samorita Hospital Ltd.'),
(15, 'Better life Hospital');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_login`
--

CREATE TABLE `tbl_login` (
  `id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `gender` varchar(30) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `address` text NOT NULL,
  `mobile_no` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_login`
--

INSERT INTO `tbl_login` (`id`, `first_name`, `last_name`, `gender`, `email`, `password`, `address`, `mobile_no`) VALUES
(5, 'Khaled Ambulance Service', 'Islami Bank Specialized And General Hospital', 'north', 'ayon_chowdhury@gmail.com', '$2y$10$gFM170X6PcBttzH3V05sKOtO1e6KjuOPkZv4l4T5nm3nto66b79oG', '102/1 Nayapaltan', '1689848471');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ambulance`
--
ALTER TABLE `ambulance`
  ADD PRIMARY KEY (`ambulance_id`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`appointment_id`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`department_id`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`doctor_id`);

--
-- Indexes for table `hospital`
--
ALTER TABLE `hospital`
  ADD PRIMARY KEY (`hospital_id`);

--
-- Indexes for table `tbl_login`
--
ALTER TABLE `tbl_login`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `ambulance`
--
ALTER TABLE `ambulance`
  MODIFY `ambulance_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `appointment_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `booking_id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `contact_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `department_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `doctor_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `hospital`
--
ALTER TABLE `hospital`
  MODIFY `hospital_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tbl_login`
--
ALTER TABLE `tbl_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
