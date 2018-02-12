-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 12, 2018 at 10:31 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onlinebookstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `email` varchar(50) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `password` varchar(16) NOT NULL,
  `user_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `author`
--

CREATE TABLE `author` (
  `authorNum` decimal(2,0) NOT NULL,
  `authorLast` char(12) DEFAULT NULL,
  `authorFirst` char(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `author`
--

INSERT INTO `author` (`authorNum`, `authorLast`, `authorFirst`) VALUES
('1', 'Morrison', 'Toni'),
('2', 'Solotaroff', 'Paul'),
('3', 'Vintage', 'Vernor'),
('4', 'Francis', 'Dick'),
('5', 'Straub', 'Peter'),
('6', 'King', 'Stephen'),
('7', 'Pratt', 'Philip'),
('8', 'Chase', 'Truddi'),
('9', 'Collins', 'Bradley'),
('10', 'Heller', 'Joseph'),
('11', 'Wills', 'Gary'),
('12', 'Hofstadter', 'Douglas R.'),
('13', 'Lee', 'Harper'),
('14', 'Ambrose', 'Stephen E.'),
('15', 'Rowling', 'J.K.'),
('16', 'Salinger', 'J.D.'),
('17', 'Heaney', 'Seamus'),
('18', 'Camus', 'Albert'),
('19', 'Collins, Jr.', 'Bradley'),
('20', 'Steinbeck', 'John'),
('21', 'Castelman', 'Riva'),
('22', 'Owen', 'Barbara'),
('23', 'O\'Rourke', 'Randy'),
('24', 'Kidder', 'Tracy'),
('25', 'Schleining', 'Lon');

-- --------------------------------------------------------

--
-- Table structure for table `genres`
--

CREATE TABLE `genres` (
  `gen_id` int(100) NOT NULL,
  `gen_type` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `genres`
--

INSERT INTO `genres` (`gen_id`, `gen_type`) VALUES
(1, 'SCI'),
(2, 'FIC');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(100) NOT NULL,
  `product_title` varchar(255) NOT NULL,
  `product_image` text NOT NULL,
  `product_author` varchar(255) NOT NULL,
  `product_desc` text NOT NULL,
  `product_bio` text NOT NULL,
  `product_genre` varchar(255) NOT NULL,
  `product_pub` text NOT NULL,
  `product_release` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`authorNum`);

--
-- Indexes for table `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`gen_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `genres`
--
ALTER TABLE `genres`
  MODIFY `gen_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(100) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
