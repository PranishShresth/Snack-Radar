-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 09, 2020 at 05:12 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `itech3108_30345392_a1`
--

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `user_id` int(11) NOT NULL,
  `snack_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`user_id`, `snack_id`) VALUES
(1, 2),
(1, 4),
(2, 2),
(2, 3),
(2, 4),
(3, 1),
(3, 3),
(3, 5),
(4, 2),
(4, 4),
(5, 1),
(5, 4),
(6, 1),
(11, 1),
(11, 5),
(14, 1),
(14, 2),
(14, 5),
(15, 2),
(15, 4);

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `from_user_id` int(11) NOT NULL,
  `to_user_id` int(11) NOT NULL,
  `message_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `text` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`from_user_id`, `to_user_id`, `message_date`, `text`) VALUES
(1, 5, '2020-04-21 05:36:07', 'Hey its been a while'),
(4, 3, '2020-04-21 05:36:07', 'How are you doing btw?'),
(6, 1, '2020-04-15 05:31:08', 'Hey man'),
(11, 1, '2020-04-22 04:23:26', 'how pranish'),
(11, 2, '2020-04-21 16:18:29', 'Heyo'),
(11, 3, '2020-04-22 04:23:01', 'Greetings tutor'),
(11, 5, '2020-04-22 04:25:10', 'Prashan'),
(11, 6, '2020-04-21 16:34:57', 'Hey there'),
(11, 13, '2020-04-21 16:36:03', 'How are you?'),
(11, 14, '2020-04-22 05:21:56', 'Hey pranish !! '),
(14, 1, '2020-04-28 05:25:53', 'how pranish'),
(14, 3, '2020-04-28 04:26:55', 'Good morning tutor'),
(14, 4, '2020-04-28 05:26:07', 'Hi Cynthia'),
(14, 5, '2020-04-22 04:29:55', 'Hi there , This is a test'),
(14, 6, '2020-04-28 05:28:31', 'Sup pran'),
(14, 11, '2020-04-22 04:30:14', 'Sup animester'),
(14, 12, '2020-05-07 13:28:16', 'How are you doing'),
(14, 15, '2020-05-05 07:56:32', 'Tajpuria'),
(15, 1, '2020-04-28 05:23:08', 'Damn'),
(15, 4, '2020-04-28 04:48:21', 'Hey '),
(15, 5, '2020-04-28 05:18:24', 'Hey man');

-- --------------------------------------------------------

--
-- Table structure for table `snack`
--

CREATE TABLE `snack` (
  `id` int(11) NOT NULL,
  `title` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `snack`
--

INSERT INTO `snack` (`id`, `title`) VALUES
(1, 'Burger'),
(2, 'Pizza'),
(3, 'Chips'),
(4, 'Cake'),
(5, 'Soup');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `profile` varchar(255) DEFAULT NULL,
  `photourl` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `profile`, `photourl`) VALUES
(1, '30345392', 'shresthapranish99@gmail.com', '$2y$10$123293543030000999999uq/unWhzRSJEpIP39OlhkwhgPK9VrTcK', 'Pranish', 'pranish.jpg'),
(2, 'Raiku', 'raiku9@gmail.com', '$2y$10$123293543030000999999uq/unWhzRSJEpIP39OlhkwhgPK9VrTcK', 'I am raiku of the thuder village.', 'raikou.jpg'),
(3, 'tutor', 'tutor@federation.com.au', '$2y$10$123293543030000999999uq/unWhzRSJEpIP39OlhkwhgPK9VrTcK', 'I am tutor', 'tutor.png'),
(4, 'Cynthia', 'cynthia@gmail.com', '$2y$10$123293543030000999999uq/unWhzRSJEpIP39OlhkwhgPK9VrTcK', 'Cyn', 'pcyn.jpg'),
(5, 'Remon', 'sremon@gmail.com', '$2y$10$123293543030000999999uq/unWhzRSJEpIP39OlhkwhgPK9VrTcK', 'Remony', 'remon.jpg'),
(6, 'Pran', 'dasd@das.com', '123', 'Super', 'dsad.png'),
(9, 'Prashan', 'pasd@dasd.com', '$2y$10$Kd9AVFdLrt9Uui0uQBehs.fXsQP3DgaCZDtOPspLVwe', 'Hey guys', NULL),
(10, 'ram', 'ram@rocketmail.com', '$2y$10$z2suIUJ1atx3YF720wvqLujbpTliLpJSpGmR2vK3tax', 'Sup', NULL),
(11, 'Animester', 'anime99@gmail.com', '$2y$10$fUPb1RsgERdXlAMlcJl7o.T7QoibCXAiryfhogSgQTL8lhh.pDlcS', 'I like cats', '3-2-anime-free-download-png.png'),
(12, 'Ruby', 'ruby22@gmail.com', '$2y$10$s20KgOu0Fy6jQlpSc/AHXur60SXBGqR/oydKnYr/XOtMxm17wiRve', 'I like to dance', NULL),
(13, 'Prasha', 'prasha@gmail.com', '$2y$10$nH4Z2Jjc5OuneL84qpOfEeArsJjyo2YwEtjsoLP9aeyUV.BmLedeS', 'Wow', NULL),
(14, 'Pranish', '30345392@students.federation.edu.au', '$2y$10$E2KvSE1YsH49PP1/vtuu7u6uVGq7S3tUi3A24LB2O24ogMyYoTxga', 'I love coding', 'download.jpg'),
(15, 'Madan', 'madan4@gmail.com', '$2y$10$jQPf0MZ1IIAWoAqvJmzSHuTBA0ikuTJZTaYCTfK1H/sz4lbPo4/GO', 'No 1 tajpuria', NULL),
(21, 'Rudy', 'rduy@gmail.com', '$2y$10$Y6S7qgqIg8B317C95y26m.fO3bXFqgTrs5ofJXnuuAlh/MtbxCu8u', 'Heyo', ''),
(22, 'Nabin', 'ghimirenabin@gmail.com', '$2y$10$W0NX57ZgHLq8AcFujkush.NjV1nh7G2hd4wJMLXOkmce1c1Lsg2Zu', 'My ', ''),
(23, 'Pranish11', 'shresthapranish@gmail.com', '$2y$10$JblpaYY5n.YkHsfvbuvuouNFe5xA/Qd7RSGPio6Ty7e8jdei2rAuO', 'Super cool', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`user_id`,`snack_id`),
  ADD KEY `snack_id` (`snack_id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`from_user_id`,`to_user_id`),
  ADD KEY `to_user_id` (`to_user_id`);

--
-- Indexes for table `snack`
--
ALTER TABLE `snack`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `snack`
--
ALTER TABLE `snack`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `likes_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `likes_ibfk_2` FOREIGN KEY (`snack_id`) REFERENCES `snack` (`id`);

--
-- Constraints for table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `message_ibfk_1` FOREIGN KEY (`from_user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `message_ibfk_2` FOREIGN KEY (`to_user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
