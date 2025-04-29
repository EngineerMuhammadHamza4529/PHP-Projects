-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 10, 2024 at 02:43 PM
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
-- Database: `lawyers_application`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `lawname` varchar(255) NOT NULL,
  `service` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `username`, `email`, `date`, `time`, `lawname`, `service`, `status`) VALUES
(9, 'Usama Ali', 'usama@usama.com', '2024-09-25', '08:31:00', 'Akram Khan ', ' Business law', 'Done'),
(10, 'Usama Ali', 'usama@usama.com', '2024-09-10', '00:45:00', 'Iqbal Hussain ', ' Family Law', 'Pending'),
(11, 'Usama Ali', 'usama@usama.com', '2024-09-19', '12:00:00', 'Watson Harold ', ' Insurance law', 'Pending'),
(12, 'Usama Ali', 'usama@usama.com', '2024-09-19', '11:40:00', 'Janet Reno ', ' Financial law', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_details` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`, `category_details`) VALUES
(1, ' Family Law', 'A family lawyer manages legal issues related to family matters.'),
(3, ' Criminal Lawyer', 'A criminal lawyer defends clients accused of crimes and offenses.'),
(4, ' Civil Law', 'A civil lawyer handles non-criminal disputes like contracts and property.'),
(5, ' Immigration law', 'An immigration lawyer helps with visas residency and citizenship issues.'),
(6, ' Tax law', 'A tax lawyer advises on tax regulations and helps with disputes.'),
(8, ' Military lawyer', ' A military lawyer handles legal issues within the armed forces.'),
(9, ' Corporate lawyer', 'A corporate lawyer handle legal issue for businesse and corporation.'),
(10, ' Divorce Lawyer', 'A divorce lawyer assists with legal processes and settlements in divorces.'),
(11, ' Political Lawyer', 'A political lawyer handles legal matters related to politics and government.'),
(12, ' Business law', 'Business law covers legal matters in business operations and transactions.'),
(13, ' Insurance law', 'Insurance law governs the terms and enforcement of insurance policies.'),
(14, ' Property law', 'Property law governs the ownership, use, and transfer of real and personal property.'),
(15, ' Drug offenses', 'Drug offenses include illegal possession, distribution, or sale of drugs.'),
(16, ' Sexual offenses', 'Sexual offenses involve illegal acts of a sexual nature against another person.'),
(17, ' Employment law', 'Employment law governs the rights and obligations between employers and employees.'),
(18, ' Financial law', 'Financial law governs financial markets, transactions, institutions, and compliance rules.');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `qualification` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `dob` varchar(255) NOT NULL,
  `ph_no` varchar(255) NOT NULL,
  `lawyer_photograph` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL,
  `status` enum('pending','approved','rejected') DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`user_id`, `username`, `email`, `password`, `qualification`, `address`, `category`, `dob`, `ph_no`, `lawyer_photograph`, `role_id`, `status`) VALUES
(14, 'Iqbal Hussain', 'iqbal@iqbal.com', '123', 'Juris Doctorate J.D', 'Lahore, Pakistan', ' Family Law', '1984-06-20', '+923001200541', 'Salaar-Firm-Profile.jpg', 2, 'approved'),
(15, 'Akram Khan', 'akram@akram.com', '123', 'Legislative Law (L.L)', 'Islamabad,Pakistan', ' Business law', '1973-02-06', '+923145961421', '1681119668392.jfif', 2, 'approved'),
(16, 'Sher Afzal Marwat', 'sher@sher.com', '123', 'LLB', 'Peshawar, Pakistan', ' Political Lawyer', '1971-04-04', '+923257662001', '9338-267-13673.jpg', 2, 'approved'),
(17, 'Qasim Khan Suri', 'qasim@qasim.com', '123', 'LLA', 'Quetta, Pakistan', ' Property law', '1969-01-16', '+923132547211', '3072-616.jpg', 2, 'approved'),
(18, 'John Wick', 'john@john.com', '123', 'LLM', 'Austin, USA', ' Military lawyer', '1981-02-18', '+111-222-9812', 'Dicker_Jeremy.jpg', 2, 'approved'),
(20, 'Watson Harold', 'watson@watson.com', '123', 'LLM', 'California, USA', ' Insurance law', '1966-10-25', '+111-222-9212', 'WatsonHarold_480x640_acf_cropped.jpg', 2, 'approved'),
(21, 'Fuente Jaret', 'fuente@fuente.com', '123', 'Legislative Law (L.L)', 'Canberra, Australia', ' Divorce Lawyer', '1978-06-13', '+111-222-6527', 'Fuente_Jaret.png', 2, 'approved'),
(22, 'Henry Cavill', 'henry@henry.com', '123', 'LLA', 'Singapore', ' Criminal Lawyer', '1973-05-13', '+65-452-9812', 'christopher-m-dolan-180129.jfif', 2, 'approved'),
(25, 'Loretta Lynch', 'loretta@loretta.com', '123', 'LLM', 'New York, USA', ' Drug offenses', '1977-11-23', '+111-222-3423', 'iStock-104821088_FemaleAttorney_880x560.webp', 2, 'approved'),
(26, 'Sonia Sotomayor', 'sonia@sonai.com', '123', 'LLB', 'New York, USA', ' Sexual offenses', '1964-03-18', '+111-222-6512', 'female-lawyer-headshot-12.jpg', 2, 'pending'),
(27, 'Gloria Allred', 'gloria@gloria.com', '123', 'LLM', 'Chicago, USA', ' Employment law', '1977-10-25', '+111-222-3684', 'AdobeStock_86346713-1024x683.jpeg', 2, 'pending'),
(42, 'Usama Ali', 'usama@usama.com', '123', '', '', '', '', '', '', 3, 'pending'),
(44, 'Kamran Shah', 'kamran@kamran.com', '123', 'LLM', 'Karachi, Pakistan', ' Drug offenses', '2018-07-25', '03278453684', 'person_5.jpg', 2, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `role_id` int(11) NOT NULL,
  `role_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`role_id`, `role_type`) VALUES
(1, 'admin'),
(2, 'Lawyers'),
(3, 'Clients');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `profile_picture` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `email`, `password`, `profile_picture`, `role_id`) VALUES
(15, 'Hubab Khan', 'admin@admin.com', '$2y$10$GrBepNXEhq7FH8CT5msFyejdkAwcxV.l6A6zmjF5IISv9FRd/QIHy', '66c9d9a46628d_hubab.jpg', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `role_id_fk` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `role_id_fk` FOREIGN KEY (`role_id`) REFERENCES `roles` (`role_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
