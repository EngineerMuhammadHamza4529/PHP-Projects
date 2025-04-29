-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 21, 2023 at 01:44 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fixgo`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_product`
--

CREATE TABLE `add_product` (
  `prod_id` int(11) NOT NULL,
  `prod_image` varchar(200) NOT NULL,
  `Title` varchar(225) NOT NULL,
  `category` varchar(225) NOT NULL,
  `Release_year` varchar(200) NOT NULL,
  `duration` varchar(225) NOT NULL,
  `industry` varchar(200) NOT NULL,
  `description` varchar(255) NOT NULL,
  `video` varchar(200) NOT NULL,
  `rating` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `add_product`
--

INSERT INTO `add_product` (`prod_id`, `prod_image`, `Title`, `category`, `Release_year`, `duration`, `industry`, `description`, `video`, `rating`) VALUES
(31, '655ba646a83ec.jpg', 'Avatar', '1', '2019', '1hr 24min', 'Hollywood', 'Avatar is an American media franchise created by James Cameron, which consists of a planned series of epic science fiction films produced by Lightstorm Entertainment and distributed by 20th Century Studios, as well as associated merchandise, video games a', 'https://www.youtube.com/embed/ru3U8MHbFFI?si=JdjVubFHouKWLKnV', 4.8);

-- --------------------------------------------------------

--
-- Table structure for table `genre`
--

CREATE TABLE `genre` (
  `genre_id` int(11) NOT NULL,
  `genre_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `genre`
--

INSERT INTO `genre` (`genre_id`, `genre_name`) VALUES
(1, 'Action'),
(3, 'Thriller'),
(4, 'Horror');

-- --------------------------------------------------------

--
-- Table structure for table `movie_booking`
--

CREATE TABLE `movie_booking` (
  `booking_id` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `movie_name` varchar(200) NOT NULL,
  `movie_id` int(11) NOT NULL,
  `seats` int(11) NOT NULL,
  `theater_id` int(11) NOT NULL,
  `age_limits` varchar(200) NOT NULL,
  `date` varchar(200) NOT NULL,
  `time` varchar(200) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `movie_booking`
--

INSERT INTO `movie_booking` (`booking_id`, `username`, `movie_name`, `movie_id`, `seats`, `theater_id`, `age_limits`, `date`, `time`, `user_id`) VALUES
(2, 'usama', 'Avatar', 31, 5, 10, 'child', '24-12-2023', '09:00-12:00', 19),
(8, 'usama', 'Avatar', 31, 19, 5, 'child', '24-12-2023', '09:00-12:00', 19),
(9, 'usama', 'Avatar', 31, 18, 5, 'child', '24-12-2023', '09:00-12:00', 19),
(10, 'usama', 'Avatar', 31, 14, 5, 'child', '24-12-2023', '09:00-12:00', 19),
(11, 'usama', 'Avatar', 31, 15, 5, 'child', '24-12-2023', '09:00-12:00', 19);

-- --------------------------------------------------------

--
-- Table structure for table `poster`
--

CREATE TABLE `poster` (
  `prod_id` int(11) NOT NULL,
  `prod_image` text NOT NULL,
  `Title` varchar(225) NOT NULL,
  `Theater` varchar(225) NOT NULL,
  `category` varchar(225) NOT NULL,
  `Release_year` date NOT NULL,
  `duration` varchar(225) NOT NULL,
  `industry` varchar(225) NOT NULL,
  `description` varchar(225) NOT NULL,
  `rating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `poster`
--

INSERT INTO `poster` (`prod_id`, `prod_image`, `Title`, `Theater`, `category`, `Release_year`, `duration`, `industry`, `description`, `rating`) VALUES
(3, 'ab1.jpg', 'Avater', 'Capri cinema', 'action', '2023-11-09', '1 hour', 'bollywood', 'Marvel Bringing Back Iron Man, Captain America Is Disney Identifying Phase 4,5’s This Major Flaw & Still, It Won’t Help, Avengers: Endgame Was The Endgame For MCU & Nothing Can Bring The Undying Craze Back!', 4),
(4, 'ab3.jpg', 'Pain huslte', 'Me cinema ', 'funny', '2023-11-29', '1 hour', 'bollywood', 'Marvel Bringing Back Iron Man, Captain America Is Disney Identifying Phase 4,5’s This Major Flaw & Still, It Won’t Help, Avengers: Endgame Was The Endgame For MCU & Nothing Can Bring The Undying Craze Back!', 5),
(5, 'b1.jpg', 'Mostborous', 'Me cinema', 'action', '2023-11-08', '1 hour', 'hollywood', 'Marvel Bringing Back Iron Man, Captain America Is Disney Identifying Phase 4,5’s This Major Flaw & Still, It Won’t Help, Avengers: Endgame Was The Endgame For MCU & Nothing Can Bring The Undying Craze Back!', 3),
(6, 'b2.jpg', 'SUnuke', 'Capri cinema', 'funny', '2023-11-22', '2 hour', 'Bollywood', 'Marvel Bringing Back Iron Man, Captain America Is Disney Identifying Phase 4,5’s This Major Flaw & Still, It Won’t Help, Avengers: Endgame Was The Endgame For MCU & Nothing Can Bring The Undying Craze Back!', 4);

-- --------------------------------------------------------

--
-- Table structure for table `register_user`
--

CREATE TABLE `register_user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(200) NOT NULL,
  `user_email` varchar(200) NOT NULL,
  `user_password` varchar(200) NOT NULL,
  `register_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `register_user`
--

INSERT INTO `register_user` (`user_id`, `user_name`, `user_email`, `user_password`, `register_date`) VALUES
(15, 'muddassir', 'ibrahimabdullahjaan@gmail.com', '$2y$10$386am5eO9ftlp9Oi17t.IebgrjMaR0EFuyKKixzKenP/NpTB3l1/a', '2023-10-31 12:40:15'),
(16, 'muddassir', 'fareed@gmail.com', '$2y$10$sPUfqEcceobeXTyOSIaJVeYb9vXrpLpZFpbqCbI4bHhDacNDLkZjS', '2023-10-31 12:44:22'),
(17, 'muddassir', 'fawaz@gmail.com', '$2y$10$1KgwQQxFVp9i7TQdBCGxF.2OCuBvYjmmLghaEP3mIQ15pmzh.Bbt2', '2023-11-01 21:52:57'),
(18, 'muddassir', 'yahoo@gmail.com', '$2y$10$ietuRyGezkWGBBL7/DJyIu29sYbrbpNlonADm0g6eK5dbuNPtz0Pu', '2023-11-01 22:07:13'),
(19, 'muddassir', 'muddassirfareed05@gmail.com', '$2y$10$aNC29waTbcMhhCV4bJvWHOx8z6f9rKkO60sYrhZ7W3RqhJXnPsx.G', '2023-11-07 22:27:55');

-- --------------------------------------------------------

--
-- Table structure for table `shows`
--

CREATE TABLE `shows` (
  `show_id` int(11) NOT NULL,
  `theater_id` int(11) NOT NULL,
  `seats` int(11) NOT NULL,
  `date` varchar(200) NOT NULL,
  `timeslot` varchar(200) NOT NULL,
  `movie_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `shows`
--

INSERT INTO `shows` (`show_id`, `theater_id`, `seats`, `date`, `timeslot`, `movie_id`) VALUES
(2, 5, 24, '24-12-2023', '09:00-12:00', 31),
(3, 8, 28, '24-12-2023', '09:00-12:00', 31);

-- --------------------------------------------------------

--
-- Table structure for table `theatre`
--

CREATE TABLE `theatre` (
  `theatre_id` int(11) NOT NULL,
  `theatre_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `theatre`
--

INSERT INTO `theatre` (`theatre_id`, `theatre_name`) VALUES
(5, 'Cineplex'),
(6, 'Nueplex'),
(8, 'Arena'),
(9, 'Mega Multiplex'),
(10, 'Capri Cenima'),
(11, 'Nasheman'),
(12, 'Atrium');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add_product`
--
ALTER TABLE `add_product`
  ADD PRIMARY KEY (`prod_id`);

--
-- Indexes for table `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`genre_id`);

--
-- Indexes for table `movie_booking`
--
ALTER TABLE `movie_booking`
  ADD PRIMARY KEY (`booking_id`),
  ADD KEY `theater_id` (`theater_id`),
  ADD KEY `movie_id` (`movie_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `poster`
--
ALTER TABLE `poster`
  ADD PRIMARY KEY (`prod_id`);

--
-- Indexes for table `register_user`
--
ALTER TABLE `register_user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `shows`
--
ALTER TABLE `shows`
  ADD PRIMARY KEY (`show_id`),
  ADD KEY `theater_id` (`theater_id`),
  ADD KEY `shows_ibfk_1` (`movie_id`);

--
-- Indexes for table `theatre`
--
ALTER TABLE `theatre`
  ADD PRIMARY KEY (`theatre_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `add_product`
--
ALTER TABLE `add_product`
  MODIFY `prod_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `genre`
--
ALTER TABLE `genre`
  MODIFY `genre_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `movie_booking`
--
ALTER TABLE `movie_booking`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `poster`
--
ALTER TABLE `poster`
  MODIFY `prod_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `register_user`
--
ALTER TABLE `register_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `shows`
--
ALTER TABLE `shows`
  MODIFY `show_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `theatre`
--
ALTER TABLE `theatre`
  MODIFY `theatre_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `movie_booking`
--
ALTER TABLE `movie_booking`
  ADD CONSTRAINT `movie_booking_ibfk_1` FOREIGN KEY (`theater_id`) REFERENCES `theatre` (`theatre_id`),
  ADD CONSTRAINT `movie_booking_ibfk_2` FOREIGN KEY (`movie_id`) REFERENCES `add_product` (`prod_id`),
  ADD CONSTRAINT `movie_booking_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `register_user` (`user_id`);

--
-- Constraints for table `shows`
--
ALTER TABLE `shows`
  ADD CONSTRAINT `shows_ibfk_1` FOREIGN KEY (`movie_id`) REFERENCES `add_product` (`prod_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
