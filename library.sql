-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 23, 2020 at 03:31 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` int(11) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `name`, `email`, `phone`, `password`) VALUES
(10, 'Ashif Ahmed', 'ashif@gmail.com', 1712345678, '8222834c3681c76965e31b839b018a12ed77dfde'),
(11, 'Niloy Kumar', 'niloy@gmail.com', 1412345678, 'fc9cb1f90a364964b5b55b428fc834a8971bc38d'),
(12, 'Hafijur Rahman', 'hafijur5353@gmail.com', 1833859198, '6d5c4ab4c1f15787c1177c57d278f3b90bce4f67'),
(13, 'Dihan Abir', 'abir@gmail.com', 1471256632, 'e6016434703114f5999bdd8cccfab89891c1d570'),
(14, 'Ummahani Khatun', 'umme@gmail.com', 1721345678, '7673793d8ffbe14aa66919508639d980462c2032');

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `book_id` int(11) NOT NULL,
  `book_name` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `stock` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `edition` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`book_id`, `book_name`, `author`, `stock`, `cat_id`, `edition`) VALUES
(12, 'Electrical Engineering Fundamentals ', 'Devid Smith', 115, 1, '10th'),
(14, 'Textile Engineering Fundamentals', 'Jorg Reddy', 12, 6, '11th'),
(16, 'Mathematical Analysis', 'Abdur Rahman', 15, 1, '5th'),
(17, 'Integral Mathematics', 'Prof. Dr. Harunur Rashid', 55, 1, '9th'),
(18, 'Artificial Intelligence', 'Dr. Ameer Ali', 35, 1, '5th'),
(19, 'Fundamentals of Economics', 'Dr. Mikel John', 15, 7, '6th'),
(20, 'C Programming', 'E. Belaguru Samy', 150, 1, '9th'),
(26, 'C++ Programming', 'E. Belaguru Samy', 55, 1, '5th'),
(27, 'Microcontroller & Interfacing', 'Muhammad Ali Mizdi', 35, 1, '6th'),
(28, 'Microcontroller & Interfacing', 'Janice Mizdi', 25, 2, '6th'),
(29, 'Java Programming', 'Dr. Druva Kour', 25, 1, '4th');

-- --------------------------------------------------------

--
-- Table structure for table `borrow`
--

CREATE TABLE `borrow` (
  `borrow_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `dept` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `intake` int(11) NOT NULL,
  `book_name` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `book_id` int(11) NOT NULL,
  `borrow_date` date NOT NULL,
  `return_date` date NOT NULL,
  `how_many` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `borrow`
--

INSERT INTO `borrow` (`borrow_id`, `user_name`, `dept`, `user_id`, `intake`, `book_name`, `author`, `book_id`, `borrow_date`, `return_date`, `how_many`) VALUES
(10, 'Hafijur Rahman', '1', 3388, 35, 'Mathematical Analysis', 'Abdur Rahman', 0, '2020-03-22', '2020-03-30', 1),
(11, 'Nahid Hasan', '2', 3382, 32, 'Electrical Engineering Fundamentals', 'Devid Smith', 0, '2020-03-22', '2020-03-27', 1),
(13, 'Ummahani Khatun', '4', 800, 16, 'Fundamentals of Economics', 'Dr. Mikel John', 0, '2020-03-22', '2020-03-30', 1),
(14, 'Faisal Hamid Hemel', '7', 110, 10, 'Fundamentals of Economics', 'Dr. Ameer Ali', 0, '2020-03-20', '2020-03-25', 2),
(15, 'Omar Faruque', '2', 140, 25, 'Microcontroller & Interfacing', 'Muhammad Ali Mizdi', 0, '2020-03-22', '2020-03-29', 1),
(17, 'Hafijur Rahman', '1', 3388, 35, 'C++ Programming', 'E. Belaguru Samy', 0, '2020-03-24', '2020-03-31', 1),
(18, 'Faisal Hamid Hemel', '1', 110, 10, 'Java Programming', 'Dr. Druva Kour', 0, '2020-03-24', '2020-03-30', 1);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(255) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`, `description`) VALUES
(1, 'EEE', 'This is EEE category Book'),
(2, 'CSE', 'This is CSE category books');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `avater` text NOT NULL,
  `faculty` varchar(255) NOT NULL,
  `roll` int(11) NOT NULL,
  `intake` int(11) NOT NULL,
  `phone` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `name`, `avater`, `faculty`, `roll`, `intake`, `phone`, `date`) VALUES
(15, 'Faisal Hamid Hemel', '', '3', 110, 10, 1521345678, '0000-00-00'),
(16, 'Omar Faruque', '', '4', 140, 25, 1700000000, '0000-00-00'),
(20, 'Ummahani Khatun', '', '2', 800, 16, 172466362, '0000-00-00'),
(22, 'Nahid Hasan', '371Bud_digitalHomepage_icons-255x300.png', '1', 3382, 32, 1700000000, '0000-00-00'),
(31, 'Hafijur Rahman', '9130hafij.png', '1', 3388, 35, 1833859198, '0000-00-00'),
(32, 'Omar Faruque', '9915client2-free-img.png', '8', 1001, 11, 1471256632, '0000-00-00'),
(36, 'Abdur Rahim', '8976SM504653.jpg', '3', 1245, 15, 1712345678, '0000-00-00'),
(37, 'Md. Hafijur Rahman', '1457hafij.png', '1', 3388, 35, 1833859198, '0000-00-00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `borrow`
--
ALTER TABLE `borrow`
  ADD PRIMARY KEY (`borrow_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `borrow`
--
ALTER TABLE `borrow`
  MODIFY `borrow_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
