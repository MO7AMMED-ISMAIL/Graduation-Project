-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 04, 2023 at 01:34 PM
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
(3, 'Room3', 'Wating Room Vistor');

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
(1, 'Mohammed Ismail', 'fcis@gmail.com', '12345678', 14785236, '01008701177', '0'),
(2, 'Ahmed', 'Ahmed88@gmail.com', 'Amed@1489dd', 82500449, '01125059804', '0'),
(3, 'Anwer Ali', 'Anwer@gmail.com', '25486451', 78965412, '01278404283', '0'),
(4, 'Ali Yaser', 'Ali@gmail.com', '59875995', 32659874, '01207864540', '0'),
(5, 'Weal Ayman', 'weal@gmail.com', '54855947', 14789566, '01012579880', '0'),
(6, 'Mohsen Mohamed', 'Mohsensaad@gmail.com', 'Mosen@saad14', 58717943, '01062530934', '0'),
(27, 'ismail Mohammed', 'mo7mmedismail200@gmila.com', '03122000', 10002553, '0151014820', '0'),
(37, 'Ahmed Abdall', 'Ahmedabadall@gmail.com', '59596592', 78930621, '01025027924', '2'),
(38, 'Khilan Delhi', 'Delhi@gmail.com', '874595759', 1456980, '01008701177', '2'),
(39, 'Chaitali Mumbai', 'Mumbai@gmail.com', '85959587d54', 56989599, '01000101101', '2'),
(40, 'Ramesh kaushik', 'kaushik@gmail.com', 'medo7669dsk', 6589994, '01033830062', '2'),
(41, 'Hardik Bhopal', 'Bhopal@gmail.com', 'ahmed548mf', 85005840, '01118329511', '2'),
(42, 'Komal MP', 'MP@gmail.com', 'kimo59d5fd', 45548850, '01278404283', '2'),
(43, 'Leanne Graham', 'Sincere@gmail.com', 'Gramsd488445', 38742589, '01000709526', '1'),
(44, 'Ervin Howell', 'Shanna@gmail.com', 'Antonette147', 90566475, '01000374783', '1'),
(45, 'Clementine Bauch', 'Nathan@gmail.com', 'Samantha5810', 12344047, '01000786691', '1'),
(46, 'Patricia Lebsack', 'Karianne@gmail.com', 'Julianne147Conner', 49317096, '01001784848', '1'),
(47, 'Chelsey Dietrich', 'Chelsey@gmail.com', 'Chelsey14die', 95401289, '01008639058', '1'),
(48, 'Dennis Schulist', 'Schulist@gmail.com', 'Schulist789suh', 79358478, '01008642863', '1'),
(49, 'Kurtis Weissnat', 'Weissnat@gmail.com', 'Weissnat256wei', 21448984, '01009456693', '1'),
(51, 'mo7med@ismail99', 'MLKJV@gmail.com', 'MedoIsmai@14ismail', 64192080, '01000210140', '1'),
(54, 'Maner Elsayed Ismail', 'mero47@gmail.com', 'Mero47@elsayed', 20907568, '01000451841', '2');

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
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `places`
--
ALTER TABLE `places`
  MODIFY `place_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

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
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `user_email` FOREIGN KEY (`email_user`) REFERENCES `users` (`user_email`);

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`users_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
