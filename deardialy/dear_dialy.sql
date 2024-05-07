-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 04, 2024 at 03:34 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dear_dialy`
--

-- --------------------------------------------------------

--
-- Table structure for table `diary_entries`
--

CREATE TABLE `diary_entries` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `character_name` varchar(50) NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `mood` varchar(20) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `article` text NOT NULL,
  `color` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `diary_entries`
--

INSERT INTO `diary_entries` (`id`, `user_id`, `date`, `character_name`, `image_path`, `mood`, `subject`, `article`, `color`) VALUES
(8, 1, '2024-05-03', 'Eleanor', 'image/happy.png', 'Happy', 'Happy Day', 'is the best because i have holidy ', '#06e03c'),
(9, 1, '2024-05-03', 'Alice', 'image/Angary.png', 'Angry', 'test', 'test', '#ff4d00'),
(10, 2, '2024-05-03', 'Eleanor', 'image/happy.png', 'Happy', 'test', 'testing article', '#ca9191'),
(11, 1, '2024-05-03', 'Bob', 'image/Angary.png', 'Happy', 'test', 'test', '#133b8b'),
(12, 1, '2024-05-04', '1test', '', 'Sad', 'test', 'test ', '#ed0c0c'),
(13, 1, '2024-05-04', '1test', '', 'Happy', 'test', 'test articel', '#2cdd38'),
(14, 1, '2024-05-04', '1Happy Day test', '', 'Happy', 'Happy Day test', 'test articel', '#14e147'),
(15, 1, '2024-05-04', '1Happy Day test', '', 'Happy', 'Happy Day test', 'test articel', '#14e147'),
(16, 1, '2024-05-04', '1test green color', '', 'Happy', 'test green color', 'test articel for green color', '#299e36'),
(17, 1, '2024-05-04', '1test green color', '', 'Happy', 'test green color', 'test articel for green color', '#299e36');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `birthdate` date NOT NULL DEFAULT current_timestamp(),
  `gender` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_name`, `email`, `password`, `birthdate`, `gender`) VALUES
(1, 'admin', 'admin@gmail.com', '1234', '2024-05-04', ''),
(2, 'afnan', 'afnan@gmail.test', '1234', '2024-05-04', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `diary_entries`
--
ALTER TABLE `diary_entries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_diary_entries_calendar` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `diary_entries`
--
ALTER TABLE `diary_entries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `diary_entries`
--
ALTER TABLE `diary_entries`
  ADD CONSTRAINT `fk_diary_entries_calendar` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
