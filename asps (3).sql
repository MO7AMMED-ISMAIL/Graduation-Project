-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 09, 2023 at 11:00 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `asps`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `attendance_id` int(11) NOT NULL,
  `place_id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `emails`
--

CREATE TABLE `emails` (
  `email_id` int(11) NOT NULL,
  `email_content` text NOT NULL,
  `email_from` varchar(255) NOT NULL,
  `email_to` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `image_id` int(11) NOT NULL,
  `image_path` text NOT NULL,
  `email_user` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`image_id`, `image_path`, `email_user`) VALUES
(72, '2d9d07fda917b12fb2f3d1d43e5ebdf7.jpg', 'Karim@gmail.com'),
(73, 'f81f26c51807016aa64b445f46f38b5d.jpg', 'Karim@gmail.com'),
(74, '4e2fe3cd0ecda87de4370dbed8b04910.jpg', 'eslam@gmail.com'),
(75, '50cd4d51235b1b7c3c8b752230c84d5e.jpg', 'eslam@gmail.com'),
(76, '1e5feda10bf9e5d83a097f59a23c5415.jpg', 'ibrahem@mailinator.com'),
(77, 'ed72e9a455f98b047a52073a7b719190.jpg', 'mola@mailinator.com'),
(78, 'cc2291ee90d4c4e155e3721b629c950f.png', 'mola@mailinator.com'),
(79, 'b1d0397bf34b515f552fd949c87a562a.png', 'gafevag@mailinator.com'),
(80, '5fcb15853b7748556884a857204876cd.jpg', 'ali@mailinator.com'),
(81, 'f8fc319f44110b87f6139ba413e684c9.jpg', 'ali@mailinator.com'),
(82, '8f4a780e6f7a0e9c8c152c7e30f3b0b6.jpg', 'ahmed@mailinator.com'),
(83, '7fa5dc8fd221a6f9799371e5ec369302.png', 'ahmed@mailinator.com'),
(84, 'b6ae29817a8f951d8a12a79baec8adc8.jpg', 'baquxa@mailinator.com'),
(85, '4783f3f83fd8a50bbf6d776fa0a0a630.jpg', 'baquxa@mailinator.com'),
(86, '698836299daee6b6b10745eb1a6dc2f2.jpg', 'depuvor@mailinator.com'),
(87, 'bb717032f1af9be35fbae31f12fc63d3.jpg', 'depuvor@mailinator.com'),
(88, '7314028db6b38a450f130adf7e18ad63.jpg', 'pecyry@mailinator.com'),
(89, '0a2054de419cf4c26217867f46e1e540.jpg', 'hesham@mailinator.com'),
(90, '796d52144ce202935ec84177a1e2c6e4.jpg', 'hesham@mailinator.com'),
(91, 'bbdb247e3ebec76e1ca837fd03471166.jpg', 'mahmoud@mailinator.com'),
(92, 'bd6520cea901cdf78f77c61ea8db1d1d.jpg', 'mahmoud@mailinator.com'),
(93, 'be3daf7eec124b03fe90ef5b3e983a16.jpg', 'mahmoud@mailinator.com'),
(94, 'cd17feaa305682b557bb4f65d3082d33.jpg', 'mohmoud@mailinator.com'),
(95, '1a241dc3bdd03d9f8629fba322c2d899.jpg', 'mohmoud@mailinator.com'),
(97, '63e56ca22a4b7.jpg', 'mosalah@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `mes_id` int(11) NOT NULL,
  `mes_content` text NOT NULL,
  `mes_from` varchar(255) NOT NULL,
  `mes_to` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `places`
--

CREATE TABLE `places` (
  `place_id` int(11) NOT NULL,
  `place_name` varchar(255) NOT NULL,
  `place_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `places`
--

INSERT INTO `places` (`place_id`, `place_name`, `place_description`) VALUES
(1, 'Room1', 'Admins Room Control'),
(2, 'Room2', 'User Room finacial'),
(4, 'Erica Petty', 'Autem deserunt dolor'),
(5, 'Chanda Hahn', 'Odio ipsum eos conse');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `post_content` text NOT NULL,
  `users_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_pass_ard` int(11) NOT NULL,
  `user_phone` varchar(255) NOT NULL,
  `user_role` enum('0','1','2') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_password`, `user_pass_ard`, `user_phone`, `user_role`) VALUES
(134, 'Karim Ahmed', 'Karim@gmail.com', 'Asslo10923!DD12', 10142822, '01113254877', '2'),
(137, 'coxihaly', 'mola@mailinator.com', 'Pa$$w0rd!', 15933442, '01122555211', '2'),
(140, 'Ahmed Sameeh', 'ahmed@mailinator.com', 'Aswed123!', 42606050, '01245256991', '1'),
(141, 'dacerymen', 'baquxa@mailinator.com', 'Pa$$w0rd!', 27535086, '01111144255', '1'),
(144, 'Hesham Ahmed', 'hesham@mailinator.com', '123', 14450477, '01122555211', '0'),
(147, 'Mahmoud Wael', 'mohmoud@mailinator.com', 'Pa$$w0rd!!A', 71350033, '01224364520', '0'),
(148, 'Amir Ali', 'ali@mailinator.com', 'A!jha233', 18354182, '01111111141', '2'),
(149, 'Leanne Graham', 'Sincere@gmail.com', 'lena2556@s', 14785963, '01008701177', '1'),
(150, 'Hloee evain', 'evain145@gmail.com', 'eiroA@142', 25896347, '01000101101', '1'),
(152, 'Mohammed Ismail', 'mo7medismail200@gmail.com', 'MoIsmail99@1499', 62514890, '01025027924', '0'),
(156, 'Mohamed Salah', 'mosalah@gmail.com', 'Medo3122000', 73345946, '01033830062', '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`attendance_id`),
  ADD KEY `Place_id` (`place_id`);

--
-- Indexes for table `emails`
--
ALTER TABLE `emails`
  ADD PRIMARY KEY (`email_id`),
  ADD KEY `email_from` (`email_from`),
  ADD KEY `email_to` (`email_to`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`image_id`),
  ADD KEY `user_email` (`email_user`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`mes_id`),
  ADD KEY `mes_from` (`mes_from`),
  ADD KEY `mes_to` (`mes_to`);

--
-- Indexes for table `places`
--
ALTER TABLE `places`
  ADD PRIMARY KEY (`place_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `admins_id` (`users_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`user_email`),
  ADD KEY `role_users` (`user_role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `attendance_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `emails`
--
ALTER TABLE `emails`
  MODIFY `email_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `mes_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `places`
--
ALTER TABLE `places`
  MODIFY `place_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=157;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendance`
--
ALTER TABLE `attendance`
  ADD CONSTRAINT `Place_id` FOREIGN KEY (`place_id`) REFERENCES `places` (`place_id`);

--
-- Constraints for table `emails`
--
ALTER TABLE `emails`
  ADD CONSTRAINT `emails_ibfk_1` FOREIGN KEY (`email_from`) REFERENCES `users` (`user_email`),
  ADD CONSTRAINT `emails_ibfk_2` FOREIGN KEY (`email_to`) REFERENCES `users` (`user_email`);

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`mes_from`) REFERENCES `users` (`user_email`),
  ADD CONSTRAINT `messages_ibfk_2` FOREIGN KEY (`mes_to`) REFERENCES `users` (`user_email`);

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`users_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
