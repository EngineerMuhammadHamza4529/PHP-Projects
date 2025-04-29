-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 06, 2024 at 09:00 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `courier`
--

-- --------------------------------------------------------

--
-- Table structure for table `agent`
--

CREATE TABLE `agent` (
  `agent_id` int(11) NOT NULL,
  `agent_name` varchar(255) NOT NULL,
  `agent_contact` varchar(255) NOT NULL,
  `agent_address` varchar(255) NOT NULL,
  `agent_city` varchar(255) NOT NULL,
  `agent_state` varchar(255) NOT NULL,
  `agent_country` varchar(255) NOT NULL,
  `agent_branch` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `agent`
--

INSERT INTO `agent` (`agent_id`, `agent_name`, `agent_contact`, `agent_address`, `agent_city`, `agent_state`, `agent_country`, `agent_branch`) VALUES
(4, 'Adnan', '03129802193', 'Baldia Town', 'Karachi', 'Sindh', 'Pakistan', '5'),
(5, 'Rida', '03259820610', 'Gulshan-e-Iqbal', 'Karachi', 'Sindh', 'Pakistan', '3'),
(6, 'Eman', '03229284137', '123-B, Block 9, Clifton', 'Karachi', 'Sindh', 'Pakistan', '1'),
(9, 'Taha', '03182976901', 'Baldia Town', 'Karachi', 'Sindh', 'Pakistan', '4'),
(10, 'Mohsin', '03122076902', ' Federal B Area', 'Karachi', 'Sindh', 'Pakistan', '1'),
(11, 'Sara', '0318 3456789', '22, Main Boulevard, Gulberg', 'Lahore', 'Punjab', 'Pakistan', '3'),
(12, 'Tariq', '0311 3186784', '12-A, Canal Bank Road', 'Lahore', 'Punjab', 'Pakistan', '3'),
(13, 'Mehmood', '0310 2456789', ' Model Town', 'Lahore', 'Punjab', 'Pakistan', '3'),
(14, 'Faisal', '0321 7406789', 'Jinnah Colony', 'Islamabad', 'Islamabad Capital Territory', 'Pakistan', '6'),
(15, 'Hira', '0325 6406789', 'Lahore Cantt', 'Lahore', 'Punjab', 'Pakistan', '3'),
(16, 'Farhan', '0322 9490782', 'Tariq Road', 'Karachi', 'Sindh', 'Pakistan', '1'),
(17, 'Maham', '0315 7406789', 'Tower', 'Karachi', 'Sindh', 'Pakistan', '5');

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `branch_id` int(11) NOT NULL,
  `branch_name` varchar(255) NOT NULL,
  `branch_contact` varchar(255) NOT NULL,
  `branch_address` varchar(255) NOT NULL,
  `branch_city` varchar(255) NOT NULL,
  `branch_state` varchar(255) NOT NULL,
  `branch_zipcode` varchar(255) NOT NULL,
  `branch_country` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`branch_id`, `branch_name`, `branch_contact`, `branch_address`, `branch_city`, `branch_state`, `branch_zipcode`, `branch_country`) VALUES
(1, 'Leopard', '03120972813', 'shahrah-e-Faisal', 'Karachi', 'Sindh', '75350', 'Pakistan'),
(3, 'TCS', '03180372013', 'DHA Phase 1', 'Lahore', 'Punjab', '54810', 'Pakistan'),
(4, 'DHL', '03140179013', 'Nazimabad', 'Karachi', 'Sindh', '74600', 'Pakistan'),
(5, 'RapidCOD', '03179062981', 'DHA Phase 5', 'Karachi', 'Sindh', '54910', 'Pakistan'),
(6, 'Leopard', '03192093913', 'Ghausia Plaza Jinnah Ave Block C', 'Islamabad', 'Islamabad Capital Territory', '44000', 'Pakistan'),
(7, 'M&P (Mian Express)', '03252831023', 'Gulshan e Hadid phase 2 ', 'karachi', 'Sindh', '75010', 'Pakistan');

-- --------------------------------------------------------

--
-- Table structure for table `courier`
--

CREATE TABLE `courier` (
  `courier_id` int(11) NOT NULL,
  `tracking_number` varchar(255) NOT NULL,
  `sender_name` varchar(255) NOT NULL,
  `sender_email` varchar(255) NOT NULL,
  `sender_address` varchar(255) NOT NULL,
  `sender_city` varchar(255) NOT NULL,
  `sender_country` varchar(255) NOT NULL,
  `receiver_name` varchar(255) NOT NULL,
  `receiver_email` varchar(255) NOT NULL,
  `receiver_address` varchar(255) NOT NULL,
  `receiver_city` varchar(255) NOT NULL,
  `receiver_country` varchar(255) NOT NULL,
  `courier_description` varchar(255) NOT NULL,
  `courier_status` varchar(255) NOT NULL,
  `from_branch` varchar(255) NOT NULL,
  `to_branch` varchar(255) NOT NULL,
  `width` varchar(255) NOT NULL,
  `height` varchar(255) NOT NULL,
  `lenght` varchar(255) NOT NULL,
  `weight` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `delivery_date` date NOT NULL,
  `creates_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `courier`
--

INSERT INTO `courier` (`courier_id`, `tracking_number`, `sender_name`, `sender_email`, `sender_address`, `sender_city`, `sender_country`, `receiver_name`, `receiver_email`, `receiver_address`, `receiver_city`, `receiver_country`, `courier_description`, `courier_status`, `from_branch`, `to_branch`, `width`, `height`, `lenght`, `weight`, `price`, `delivery_date`, `creates_date`) VALUES
(6, 'TRK-93467924', 'Arhan', 'muneebsheikh243@gmail.com', 'Malir', 'Karachi', 'Pakistan', 'Hooria', 'muneeb007shaikh007@gmail.com', 'Baldia Town', 'Karachi', 'Pakistan', 'Gift', '4', '1', '1', '2', '2', '5', '2', '1000', '2024-08-31', '2024-08-22 09:50:57'),
(7, 'TRK-92BA714D', 'Farhan', 'muneebsheikh243@gmail.com', 'Karsaz', 'Karachi', 'Pakistan', 'Amir', 'muneeb007shaikh007@gmail.com', 'Naval colony', 'Karachi', 'Pakistan', 'Gift', '4', '1', '4', '2', '2', '5', '5', '5000', '2024-08-24', '2024-08-22 09:56:21'),
(8, 'TRK-4FF1EBFC', 'Yumna', 'yumna@gmail.com', 'Saddar', 'Karachi', 'Pakistan', 'Hania', 'hania@gmail.com', 'Ayesha manzil', 'Karachi', 'Pakistan', 'Gift', '3', '4', '1', '2', '2', '5', '2', '1700', '2024-09-10', '2024-08-22 11:10:54'),
(9, 'TRK-4B3E89FC', 'Wahab', 'muneebsheikh243@gmail.com', 'Modal Town', 'Karachi', 'Pakistan', 'Razaq', 'muneeb007shaikh007@gmail.com', 'Saddar', 'Karachi', 'Pakistan', 'Gift', '4', '1', '1', '2', '2', '5', '2', '1700', '2024-08-31', '2024-08-22 20:59:32'),
(10, 'TRK-0009DE71', 'Fariha', 'muneebsheikh243@gmail.com', 'Naval', 'Karachi', 'Pakistan', 'Anisha', 'muneeb007shaikh007@gmail.com', 'Liyari', 'Karachi', 'Pakistan', 'Gift', '4', '4', '4', '2', '2', '5', '1', '1200', '2024-08-31', '2024-08-24 10:30:03'),
(12, 'TRK-422DB746', 'Yasir', 'muneebsheikh243@gmail.com', 'Malir', 'Karachi', 'Pakistan', 'Shahzad', 'muneeb007shaikh007@gmail.com', 'Saddar', 'Karachi', 'Pakistan', 'Gift', '1', '3', '4', '2', '5', '5', '5', '1200', '2024-09-30', '2024-09-02 13:55:22'),
(13, 'TRK-BBAD3051', 'Kashif', 'kashif@gmail.com', 'Gulshan e Iqbal', 'Karachi', 'Pakistan', 'Saddam', 'saddam@gmail.com', 'Modal Town', 'Lahore', 'Pakistan', 'Laptop', '3', '1', '3', '11.6 inches', '6.5 inches', '6.5 inches', '2', '2650', '2024-09-20', '2024-09-05 23:31:26'),
(14, 'TRK-8EFF9672', 'Hamza', 'hamza@gmail.com', 'North Nazimabad', 'Karachi', 'Pakistan', 'Ali', 'ali@gmail.com', 'Malir', 'Karachi', 'Pakistan', 'Mobile', '2', '4', '4', '3.0 inches', '5.7 inches', '5.7 inches', '1', '250', '2024-09-15', '2024-09-05 23:35:35'),
(15, 'TRK-4DDB0851', 'Ayeza', 'ayeza@gmail.com', 'Johar Town', 'Lahore', 'Pakistan', 'Nimra', 'nimra@gmail.com', 'Tariq Road', 'Karachi', 'Pakistan', 'Dress', '2', '3', '1', '9 inches', '3 inches', '12 inches', '1', '1700', '2024-09-09', '2024-09-05 23:41:07'),
(16, 'TRK-2DF43145', 'Arslan', 'arslan@gmail.com', 'Modal Town', 'Lahore', 'Pakistan', 'Shamir', 'shamir@gmail.com', '22, Main Boulevard, Gulberg', 'Lahore', 'Pakistan', 'Shoes', '4', '3', '3', '8 inches', '4 inches', '12 inches', ' 0.68', '360', '2024-09-04', '2024-09-05 23:45:47'),
(17, 'TRK-9C76B296', 'Ahmad', 'ahmad@gmail.com', 'Saddar', 'Karachi', 'Pakistan', 'Samad', 'samad@gmai.com', 'Shahrah e Faisal', 'Karachi', 'Pakistan', 'Watch', '4', '1', '1', '4 inches', '5 inches', '8 inches', ' 0.45 kg', '280', '2024-09-01', '2024-09-05 23:51:19');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `message_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`message_id`, `name`, `email`, `message`) VALUES
(1, 'Muneeb', 'muneeb@gmail.com', 'Excellent Services!'),
(2, 'Muneeb', 'muneeb@gmail.com', 'Excellent Services!'),
(3, 'Hamza', 'hamza@gmail.com', 'Good Services!');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `role_id` int(11) NOT NULL,
  `role_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`role_id`, `role_type`) VALUES
(4, 'admin'),
(5, 'agent'),
(6, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `status_id` int(11) NOT NULL,
  `status_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`status_id`, `status_type`) VALUES
(1, 'Item Accepted By Courier'),
(2, 'Pending'),
(3, 'Out Of Delivery'),
(4, 'Delivered');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `profile_picture` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `name`, `email`, `password`, `profile_picture`, `role_id`) VALUES
(1, 'Muneeb', 'muneeb@gmail.com', '$2y$10$RUZordC/bnFU4qZz0OoxkucB9XN3UeseWFu0fkgCenjBdF4LmQqau', 'images.jfif', 4),
(6, 'Adnan', 'adnan@gmail.com', '$2y$10$3jVRn.0Hff65OxAuJhbuFup7IXFeiRjXw/uK129ZLrKzmTJX7kBMW', 'testimonial-2.jpg', 5),
(7, 'Hafsa', 'hafsa@gmail.com', '$2y$10$uJNiLzCJbsYe5LhpYK2/k.eJ6Yfo25zUFsNvERGHe.CD2EZ44ysIq', 'testimonial-1.jpg', 6),
(8, 'Hamza', 'hamza@gmail.com', '$2y$10$b697ABW2HmLduDhgSk9EJuudSOtABdcjgWhShlvNYFqbYZIQCBDmG', 'user1.png', 6),
(10, 'Nimra', 'nimra@gmail.com', '$2y$10$vZ3J7nV4LVPHUn2yOP/UZO2AuztxWRM72hYH28Xo4wPUvZi.D9biW', 'testimonial-1.jpg', 6),
(11, 'Rida', 'rida@gmail.com', '$2y$10$15aooJaWPTishWsXUAwr4eptTW3SYtnjwB3oz6VjPFVE2UvVdOeO2', 'user7.jfif', 5),
(12, 'Eman', 'eman@gmail.com', '$2y$10$7NnWAKAk8ku9QupNW7rFpOnqwlc0AUHau.CRjE0qJZb4CCrrFrrHC', 'user8.jfif', 5),
(13, 'Faham', 'mfaham871@gmail.com', '$2y$10$ii0tgl4I4k89aNnZ1ZXWD.1X3uBVroN.c3qQ/KoB5LGqZXF7kuqBC', 'user4.jfif', 6),
(14, 'Taha', 'taha@gmail.com', '$2y$10$M2vTpt4pK2CceSZsVkL4AefcY/8xwKSNPwyaTFXCTY3NWP414Iv3S', 'user5.jfif', 5),
(15, 'Mohsin', 'mohsin@gmail.com', '$2y$10$heBFBLdf/RVz7sjKIRYgCOm/5TR5Y1wOrBDuHPxcQsM.43zFtSkGu', 'user6.jfif', 5),
(16, 'Sara', 'sara@gmail.com', '$2y$10$iqhFke7lW7gUpalFO6.hOOaqwz0anUui1uE.ffGnUjbR95OcXYYSu', 'user7.jfif', 5),
(17, 'Tariq', 'tariq@gmail.com', '$2y$10$EDMaSCaF79hvoqksymdLneJjW8b1Dt5hMcLBbvc.4S26EufTdgwLO', 'user.jpg', 5),
(18, 'Hira', 'hira@gmail.com', '$2y$10$fRqMsXHdyjXZdsPikC39AOhziV0lIV59E2cpcpqIXErfKbLjEyB6u', 'user8.jfif', 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agent`
--
ALTER TABLE `agent`
  ADD PRIMARY KEY (`agent_id`);

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`branch_id`);

--
-- Indexes for table `courier`
--
ALTER TABLE `courier`
  ADD PRIMARY KEY (`courier_id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`message_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`status_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `role_id_fk` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agent`
--
ALTER TABLE `agent`
  MODIFY `agent_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `branch`
--
ALTER TABLE `branch`
  MODIFY `branch_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `courier`
--
ALTER TABLE `courier`
  MODIFY `courier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `role_id_fk` FOREIGN KEY (`role_id`) REFERENCES `role` (`role_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
