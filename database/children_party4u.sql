-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 17, 2017 at 01:55 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `children_party4u`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_booking`
--

CREATE TABLE `tbl_booking` (
  `booking_id` int(11) NOT NULL,
  `party_type` int(11) NOT NULL,
  `cost_per_child` double NOT NULL,
  `booked_date` date NOT NULL,
  `total_children` int(11) NOT NULL,
  `total_cost` double NOT NULL,
  `booked_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_parties`
--

CREATE TABLE `tbl_parties` (
  `party_id` int(11) NOT NULL,
  `party_type` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `cost_per_child` double NOT NULL,
  `length` int(11) NOT NULL,
  `max_children` int(11) NOT NULL,
  `services` text NOT NULL,
  `image_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_parties`
--

INSERT INTO `tbl_parties` (`party_id`, `party_type`, `description`, `cost_per_child`, `length`, `max_children`, `services`, `image_name`) VALUES
(1, 'Pirate', 'This will be a pirate themed party and will include relevant decorations.\r\n', 15, 90, 30, 'Pirate costumers and face painting.', 'admin-pirate.png'),
(2, 'Build a Bear', 'This party will show the children how to make their own bear which they will keep at the end of the party.\r\n', 30, 120, 10, 'Each child will keep the bear they have made. Optional costumes can be purchased for an additional charge.', 'admin-bears.jpeg'),
(3, 'Star Wars', 'This party will have a Star Wars theme.\r\n', 15, 90, 15, 'Each child will receive a StarWars gift as their party prize.', 'admin-starwars.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `date_of_birth` date NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `usertype` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`user_id`, `first_name`, `last_name`, `gender`, `date_of_birth`, `email`, `username`, `password`, `usertype`) VALUES
(1, 'Rajinda', 'Rajinda', 'Female', '1990-01-01', 'rajinda@gmail.com', 'rajinda', 'rajinda', 'Admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_booking`
--
ALTER TABLE `tbl_booking`
  ADD PRIMARY KEY (`booking_id`),
  ADD KEY `party_type` (`party_type`),
  ADD KEY `user_id` (`booked_by`);

--
-- Indexes for table `tbl_parties`
--
ALTER TABLE `tbl_parties`
  ADD PRIMARY KEY (`party_id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_booking`
--
ALTER TABLE `tbl_booking`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_parties`
--
ALTER TABLE `tbl_parties`
  MODIFY `party_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_booking`
--
ALTER TABLE `tbl_booking`
  ADD CONSTRAINT `tbl_booking_ibfk_1` FOREIGN KEY (`party_type`) REFERENCES `tbl_parties` (`party_id`),
  ADD CONSTRAINT `tbl_booking_ibfk_2` FOREIGN KEY (`booked_by`) REFERENCES `tbl_users` (`user_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
