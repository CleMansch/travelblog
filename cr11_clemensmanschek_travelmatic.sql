-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 23, 2019 at 11:59 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cr11_clemensmanschek_travelmatic`
--
CREATE DATABASE IF NOT EXISTS `clemensmanschek_travelmatic` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `clemensmanschek_travelmatic`;

-- --------------------------------------------------------

--
-- Table structure for table `adresses`
--

CREATE TABLE `adresses` (
  `adr_id` int(11) NOT NULL,
  `adr_zip` varchar(255) DEFAULT NULL,
  `adr_city` varchar(255) DEFAULT NULL,
  `adr_street` varchar(255) DEFAULT NULL,
  `adr_web` varchar(255) DEFAULT NULL,
  `adr_tel` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `adresses`
--

INSERT INTO `adresses` (`adr_id`, `adr_zip`, `adr_city`, `adr_street`, `adr_web`, `adr_tel`) VALUES
(1, '1140', 'Wien', 'Baumgartner Höhe', 'https://www.wien.gv.at/umwelt/wald/erholung/steinhof.html', NULL),
(2, '1020', 'Wien', 'Obere Augartenstraße', 'http://www.kultur.park.augarten.org/', '+43-1-332 26 94'),
(3, '7121', 'Weiden am See', 'Seebad 1', 'https://www.dasfritz.at/', '0216740222'),
(4, '1070', 'Wien', 'Stiftgasse4', 'https://centimeter.at/', '01470060642 '),
(5, '1040', 'Wien', 'Karlsplatz', NULL, NULL),
(6, 'Schweiz 8500', 'Frauenfeld', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `concerts`
--

CREATE TABLE `concerts` (
  `con_id` int(11) NOT NULL,
  `con_name` varchar(255) DEFAULT NULL,
  `con_type` varchar(255) DEFAULT NULL,
  `con_descr` varchar(255) DEFAULT NULL,
  `con_web` varchar(255) DEFAULT NULL,
  `con_adr` int(11) DEFAULT NULL,
  `con_date` datetime DEFAULT NULL,
  `con_prize` varchar(255) DEFAULT NULL,
  `con_creation_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `concerts`
--

INSERT INTO `concerts` (`con_id`, `con_name`, `con_type`, `con_descr`, `con_web`, `con_adr`, `con_date`, `con_prize`, `con_creation_date`) VALUES
(1, 'Nightwish', 'Metal', 'the 5th singer is good again', 'http://nightwish.com/', 6, '2019-12-24 19:00:00', '120 Euro', '2019-11-23 13:00:25'),
(2, 'Yasmo und die Klangkantine', 'Hip-Hop', 'Austrian Tunesian female voice is on the mic again.', 'https://www.yasmo.at/', 5, '2019-11-27 20:00:00', '45 Euro', '2019-11-23 13:00:25'),
(4, 'jkh', 'dvd', 'gkj', 'jökl', 2, '1992-04-04 00:00:00', '45 Euro', '2019-11-23 22:08:12'),
(5, 'Fiakergulasch', 'cooking sounds', 'mhhhmmm', 'sfjio', 3, '8912-05-04 00:00:00', '15 Euro', '2019-11-23 23:35:05');

-- --------------------------------------------------------

--
-- Table structure for table `restaurant`
--

CREATE TABLE `restaurant` (
  `res_id` int(11) NOT NULL,
  `res_name` varchar(255) DEFAULT NULL,
  `res_type` varchar(255) DEFAULT NULL,
  `res_descr` varchar(255) DEFAULT NULL,
  `res_adr` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `restaurant`
--

INSERT INTO `restaurant` (`res_id`, `res_name`, `res_type`, `res_descr`, `res_adr`) VALUES
(1, 'Das Fritz', 'Bauernkuchl mit Fisch', 'Eat directly at the UNESCO world-culture-heritage, the Neusiedlersee.', 3),
(2, 'Centimeter VII', 'Bauernkuchl a mit Fisch', 'Get much food for low money!', 4),
(3, NULL, NULL, NULL, NULL),
(6, 'hjj', 'hjj', 'hjj', 4),
(7, 'name', 'typ', 'descr', 2),
(8, 'a', 'b', 'c', 4),
(9, 'arnol', 'truhe', 'gugu', 3),
(11, 'klj', 'öjlk', 'jöklj', 4),
(13, 'Jammi Kebab', 'Upper class', 'alles scharf, sweet curry onion', 3);

-- --------------------------------------------------------

--
-- Table structure for table `todo`
--

CREATE TABLE `todo` (
  `tod_id` int(11) NOT NULL,
  `tod_name` varchar(255) DEFAULT NULL,
  `tod_type` varchar(255) DEFAULT NULL,
  `tod_descr` varchar(255) DEFAULT NULL,
  `tod_web` varchar(255) DEFAULT NULL,
  `tod_adr` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `todo`
--

INSERT INTO `todo` (`tod_id`, `tod_name`, `tod_type`, `tod_descr`, `tod_web`, `tod_adr`) VALUES
(1, 'Steinhofgründe', 'outdoor area', 'ur beautiful', NULL, 1),
(2, 'Augarten', 'Park area', 'Beautiful flower gardens, that invite to stay.', NULL, 2),
(7, 'k', 'khg', 'gkh', 'hkg', 4),
(8, 'Bogenschießen', 'activity', 'shoot arrows', 'xy.at', 5);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(30) NOT NULL,
  `user_email` varchar(60) DEFAULT NULL,
  `user_pass` varchar(255) NOT NULL,
  `user_role` enum('user','admin') DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_pass`, `user_role`) VALUES
(3, 'cala', 'mansccle@gmx.at', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'admin'),
(4, 'user', 'user@user.at', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adresses`
--
ALTER TABLE `adresses`
  ADD PRIMARY KEY (`adr_id`);

--
-- Indexes for table `concerts`
--
ALTER TABLE `concerts`
  ADD PRIMARY KEY (`con_id`),
  ADD KEY `con_adr` (`con_adr`);

--
-- Indexes for table `restaurant`
--
ALTER TABLE `restaurant`
  ADD PRIMARY KEY (`res_id`),
  ADD KEY `res_adr` (`res_adr`);

--
-- Indexes for table `todo`
--
ALTER TABLE `todo`
  ADD PRIMARY KEY (`tod_id`),
  ADD KEY `tod_adr` (`tod_adr`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adresses`
--
ALTER TABLE `adresses`
  MODIFY `adr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `concerts`
--
ALTER TABLE `concerts`
  MODIFY `con_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `restaurant`
--
ALTER TABLE `restaurant`
  MODIFY `res_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `todo`
--
ALTER TABLE `todo`
  MODIFY `tod_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `concerts`
--
ALTER TABLE `concerts`
  ADD CONSTRAINT `concerts_ibfk_1` FOREIGN KEY (`con_adr`) REFERENCES `adresses` (`adr_id`) ON DELETE CASCADE;

--
-- Constraints for table `restaurant`
--
ALTER TABLE `restaurant`
  ADD CONSTRAINT `restaurant_ibfk_1` FOREIGN KEY (`res_adr`) REFERENCES `adresses` (`adr_id`) ON DELETE CASCADE;

--
-- Constraints for table `todo`
--
ALTER TABLE `todo`
  ADD CONSTRAINT `todo_ibfk_1` FOREIGN KEY (`tod_adr`) REFERENCES `adresses` (`adr_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
