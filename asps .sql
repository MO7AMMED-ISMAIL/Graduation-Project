-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 12, 2023 at 05:20 PM
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
(73, 'f81f26c51807016aa64b445f46f38b5d.jpg', 'Karim@gmail.com'),
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

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`mes_id`, `mes_content`, `mes_from`, `mes_to`) VALUES
(1, 'message1', 'mo7medismail200@gmail.com', 'ahmed@mailinator.com'),
(2, 'message2.2', 'mosalah@gmail.com', 'ali@mailinator.com');

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
  `users_id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_title`, `post_content`, `users_id`, `date`) VALUES
(1, 'TITLE1.1', 'the first posts1.1', 156, '2023-02-10 18:46:45'),
(2, 'api title', 'updated content api 2', 152, '2023-02-10 20:31:02');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `task_id` int(11) NOT NULL,
  `task_content` text NOT NULL,
  `task_from` varchar(255) NOT NULL,
  `task_To` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`task_id`, `task_content`, `task_from`, `task_To`) VALUES
(1, 'task1', 'mosalah@gmail.com', 'Sincere@gmail.com'),
(2, 'task2', 'mo7medismail200@gmail.com', 'ahmed@mailinator.com'),
(3, 'task3', 'mosalah@gmail.com', 'ahmed@mailinator.com');

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
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`task_id`),
  ADD KEY `task_from` (`task_from`),
  ADD KEY `task_To` (`task_To`);

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
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `mes_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `places`
--
ALTER TABLE `places`
  MODIFY `place_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `task_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_ibfk_1` FOREIGN KEY (`email_user`) REFERENCES `users` (`user_email`);

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

--
-- Constraints for table `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `tasks_ibfk_1` FOREIGN KEY (`task_from`) REFERENCES `users` (`user_email`),
  ADD CONSTRAINT `tasks_ibfk_2` FOREIGN KEY (`task_To`) REFERENCES `users` (`user_email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
