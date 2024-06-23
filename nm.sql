-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 23, 2024 at 01:37 PM
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
-- Database: `nm`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `name`) VALUES
(2, 'Strength'),
(7, 'Cardio'),
(32, 'HIIT');

-- --------------------------------------------------------

--
-- Table structure for table `exerecise`
--

CREATE TABLE `exerecise` (
  `exercise_id` int(11) NOT NULL,
  `duration` int(11) NOT NULL,
  `description` text NOT NULL,
  `image_url` varchar(255) NOT NULL,
  `video_url` varchar(255) DEFAULT NULL,
  `title` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `exerecise`
--

INSERT INTO `exerecise` (`exercise_id`, `duration`, `description`, `image_url`, `video_url`, `title`) VALUES
(1, 12, 'A push-up is a classic bodyweight exercise that primarily targets the chest, shoulders, and triceps, while also engaging the core and lower body. It is one of the most fundamental and effective exercises for building upper body strength and endurance.', 'https://images.unsplash.com/photo-1598971639058-fab3c3109a00?q=80&w=2002&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D', 'https://www.youtube.com/watch?v=IODxDxX7oi4', 'Pushup'),
(2, 10, 'Bulgarian split squats are an excellent lower-body exercise that targets the quadriceps, hamstrings, glutes, and core. They also improve balance and stability.', 'https://images.unsplash.com/photo-1604233098531-90b71b1b17a6?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D', '', 'Bulgarian split'),
(3, 5, 'Pull-ups are a fundamental upper-body exercise that primarily targets the muscles of the back, shoulders, and arms. They are considered one of the best exercises for building upper-body strength and improving overall fitness.', 'https://images.unsplash.com/photo-1526506118085-60ce8714f8c5?q=80&w=1974&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3Da', '', 'Pull up'),
(5, 5, 'Crunches are a popular core exercise designed to strengthen and tone the abdominal muscles. Unlike sit-ups, which involve a greater range of motion and more hip flexor engagement, crunches focus primarily on the rectus abdominis, the', 'https://images.unsplash.com/photo-1616803824305-a07cfbc8ea60?q=80&amp;w=2070&amp;auto=format&amp;fit=crop&amp;ixlib=rb-4.0.3&amp;ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D', 'https://www.youtube.com/watch?v=MKmrqcoCZ-M', 'Crunches'),
(6, 1, 'chinup', 'https://images.unsplash.com/photo-1718964313194-5c028558f69d?q=80&amp;w=1974&amp;auto=format&amp;fit=crop&amp;ixlib=rb-4.0.3&amp;ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D', 'https://www.youtube.com/watch?v=mpaRMco0jV8', 'Chin up');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `passwd` varchar(255) NOT NULL,
  `type` enum('trainer','user','admin','') NOT NULL,
  `token` char(40) NOT NULL,
  `token_expire` datetime NOT NULL,
  `active` smallint(1) NOT NULL DEFAULT 0,
  `tokenR` char(40) DEFAULT NULL,
  `tokenRExpire` datetime DEFAULT NULL,
  `name` varchar(30) NOT NULL,
  `surname` varchar(30) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `bio` text DEFAULT NULL,
  `permission` enum('none','approved','blocked') NOT NULL DEFAULT 'none',
  `profile_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `passwd`, `type`, `token`, `token_expire`, `active`, `tokenR`, `tokenRExpire`, `name`, `surname`, `phone`, `bio`, `permission`, `profile_image`) VALUES
(36, 'max@gmail.com', '$2y$10$E8lhL/mEJCQBECTxUgJLuuCe0Kbf28NVD1UKUuPeeDIXE1jKSCgUW', 'trainer', '', '0000-00-00 00:00:00', 1, 'b37b59c8416426ca0e1c03e2d34dca19ac847957', '2024-06-17 12:06:49', 'Max', 'Reynoldss', '105031834', 'Max Reynolds, born on September 5, 1985, in San Diego, California, developed a passion for fitness early on. He earned a degree in Kinesiology from San Diego State University and became a certified personal trainer through NASM.\r\n\r\nStarting his career at a local gym, Max moved to Los Angeles in 2010, working with a diverse clientele, including athletes and celebrities. His holistic approach to fitness quickly gained him recognition.\r\n\r\nIn 2017, Max founded MaxFit, offering personalized training programs, online coaching, and fitness retreats. Max continues to inspire and guide individuals towards their fitness goals, emphasizing accessible and enjoyable workouts.', 'approved', 'God.jpg'),
(37, 'admin@admin.com', '$2y$10$HQnldNQr9fBWmWHO673b3uIE96Pjae3JSd6MgVt5GA2OLik4Tf8zq', 'admin', '', '0000-00-00 00:00:00', 1, NULL, NULL, 'awdawddddad', 'adminawcdawcawcd', '134155', NULL, 'none', 'default.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `workoutexercises`
--

CREATE TABLE `workoutexercises` (
  `workout_id` int(11) NOT NULL,
  `exercise_id` int(11) NOT NULL,
  `day_of_week` enum('Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `workoutexercises`
--

INSERT INTO `workoutexercises` (`workout_id`, `exercise_id`, `day_of_week`) VALUES
(36, 2, 'Monday'),
(36, 1, 'Monday'),
(36, 5, 'Monday');

-- --------------------------------------------------------

--
-- Table structure for table `workouts`
--

CREATE TABLE `workouts` (
  `workout_id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `duration_value` int(11) NOT NULL,
  `duration_unit` enum('week(s)','day(s)','month(s)') NOT NULL,
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `privacy` enum('public','private') NOT NULL,
  `workout_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `workouts`
--

INSERT INTO `workouts` (`workout_id`, `title`, `description`, `duration_value`, `duration_unit`, `id`, `category_id`, `privacy`, `workout_image`) VALUES
(36, 'Quick Start Fitness', 'Beginner-friendly program to kickstart your fitness journey and establish healthy habits.', 3, 'week(s)', 36, 2, 'public', 'gym1.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `exerecise`
--
ALTER TABLE `exerecise`
  ADD PRIMARY KEY (`exercise_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `workoutexercises`
--
ALTER TABLE `workoutexercises`
  ADD KEY `fk_workoutexercises_exercies` (`exercise_id`),
  ADD KEY `fk_workoutexercises_workouts` (`workout_id`);

--
-- Indexes for table `workouts`
--
ALTER TABLE `workouts`
  ADD PRIMARY KEY (`workout_id`),
  ADD KEY `fk_workouts_category` (`category_id`),
  ADD KEY `fk_workouts_user` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `exerecise`
--
ALTER TABLE `exerecise`
  MODIFY `exercise_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `workouts`
--
ALTER TABLE `workouts`
  MODIFY `workout_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `workoutexercises`
--
ALTER TABLE `workoutexercises`
  ADD CONSTRAINT `fk_workoutexercises_exercies` FOREIGN KEY (`exercise_id`) REFERENCES `exerecise` (`exercise_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_workoutexercises_workouts` FOREIGN KEY (`workout_id`) REFERENCES `workouts` (`workout_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `workouts`
--
ALTER TABLE `workouts`
  ADD CONSTRAINT `fk_workouts_category` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_workouts_user` FOREIGN KEY (`id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
