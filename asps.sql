-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 26, 2023 at 09:36 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

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
(104, 'b52c603cf5aa72472f7005d521f1555f.jpg', 'mohamedahmed@gmail.com'),
(105, 'ea7d08f00e0a684962ea6c701ad35c91.jpg', 'mohamedahmed@gmail.com'),
(106, '21939a5333e76f08c2329190247c410a.jpg', 'eslammohmoud@gmail.com'),
(107, 'cb56df7371f5d90fab20dc93c6dcf57d.jpg', 'eslammohmoud@gmail.com'),
(112, '757da50317a0f0a556baa8316423df9d.jpg', 'amirsameeh@mailinator.com'),
(113, 'c33ef6cc59d7d5576ce3c89a5fe00722.jpg', 'amirsameeh@mailinator.com'),
(114, '5ce806829b482f6f269e12bb0d5c9e8d.jpg', 'omarmohamed@gmail.com'),
(115, '0eec9703eb8bca390df48dd18416ed50.jpg', 'omarmohamed@gmail.com'),
(116, '45e15564a926d9c2f5f3076c203ade97.jpg', 'eslamahmed@gmail.com'),
(117, 'e49b94baa509144b2d07d19b81b28f49.jpg', 'eslamahmed@gmail.com'),
(120, '1a1221b0e90ec1d2934f0268a6485ffe.png', 'omarahmed@gmail.com'),
(121, 'c294b6f7498c29ee443cd37f55858273.jpg', 'omarahmed@gmail.com'),
(122, 'cc01014e2f13b9c2c9b2ec2d3735ce0b.jpg', 'saidahmed@gmail.com'),
(123, '40bb46bebb38d9130fff705a9a1a513d.jpg', 'saidahmed@gmail.com'),
(124, '492ce980862d05787734f32e45ec811b.jpg', 'ahmedwael@mailinator.com'),
(125, 'e30a582bedb00b58fc78e838c332acd1.jpg', 'ahmedwael@mailinator.com'),
(126, '1b1d888d8dab4428938ce9f10a648071.jpg', 'alisamy@gmail.com'),
(127, '308bfa793a415c0d87c038238361288f.jpg', 'alisamy@gmail.com'),
(131, '683e3e70f127a25fd18569869763e153.jpg', 'mohamedismail@gmail.com'),
(132, '0928feea769567f86661e043bba676a2.jpg', 'mohamedismail@gmail.com'),
(133, 'd1c55ac5e56a4e3b4bf98ae8f3eadc01.jpg', 'karimmohamed@gmail.com'),
(134, '1e945113238ee1ded02c4cb4ea207ab6.jpg', 'karimmohamed@gmail.com');

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
(4, 'Congratulations on the new position', 'mohamedahmed@gmail.com', 'eslammohmoud@gmail.com');

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
(5, 'New year celebration', 'Happy New year . Thank you so much for supporting our business in 2022. We’re looking forward to serving you again in 2023 !', 161, '2023-02-13 19:38:25');

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
(7, 'devices maintenance', 'mohamedahmed@gmail.com', 'amirsameeh@mailinator.com');

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
(161, 'Mohamed Ali', 'mohamedahmed@gmail.com', 'Pa$$w0rd!', 31261842, '01122555210', '0'),
(162, 'Eslam Mahmoud', 'eslammohmoud@gmail.com', 'Pa$$w0rd!', 75733521, '01112345431', '0'),
(165, 'Amir Sameeh', 'amirsameeh@mailinator.com', 'Pa$$w0rd!', 35393119, '01122555211', '1'),
(166, 'Omar Mohamed', 'omarmohamed@gmail.com', 'Pa$$w0rd!', 5724344, '01245256991', '1'),
(167, 'Eslam Ahmed', 'eslamahmed@gmail.com', 'Pa$$w0rd!', 47416729, '01122555211', '1'),
(169, 'Omar Ahmed', 'omarahmed@gmail.com', 'Pa$$w0rd!', 44808212, '01122555211', '2'),
(170, 'Said Ahmed', 'saidahmed@gmail.com', 'Pa$$w0rd!', 65821460, '01212255521', '2'),
(171, 'ahmed wael', 'ahmedwael@mailinator.com', 'Pa$$w0rd!', 41989184, '01122555211', '2'),
(172, 'Ali Samy', 'alisamy@gmail.com', 'Pa$$w0rd!', 93453239, '01122555211', '2'),
(174, 'Mohamed Ismail', 'mohamedismail@gmail.com', 'Pa$$w0rd!', 38080721, '01122555211', '0'),
(175, 'karim mohamed', 'karimmohamed@gmail.com', 'Pa$$w0rd!', 37526543, '01112255521', '0'),
(186, 'wael', 'hga@gmail.com', '123', 9390469, '010115100', '1'),
(188, 'wael', 'hgaa@gmail.com', '123', 33704938, '010115100', '1'),
(190, 'wael', 'hgaaa@gmail.com', '123', 6562059, '010115100', '1');

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
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=149;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `mes_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `places`
--
ALTER TABLE `places`
  MODIFY `place_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `task_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=197;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendance`
--
ALTER TABLE `attendance`
  ADD CONSTRAINT `Place_id` FOREIGN KEY (`place_id`) REFERENCES `places` (`place_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_ibfk_1` FOREIGN KEY (`email_user`) REFERENCES `users` (`user_email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`mes_from`) REFERENCES `users` (`user_email`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `messages_ibfk_2` FOREIGN KEY (`mes_to`) REFERENCES `users` (`user_email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`users_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `tasks_ibfk_1` FOREIGN KEY (`task_from`) REFERENCES `users` (`user_email`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tasks_ibfk_2` FOREIGN KEY (`task_To`) REFERENCES `users` (`user_email`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
