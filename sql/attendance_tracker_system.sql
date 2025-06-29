-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 29, 2025 at 07:03 AM
-- Server version: 5.7.36
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `attendance_tracker_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

DROP TABLE IF EXISTS `attendance`;
CREATE TABLE IF NOT EXISTS `attendance` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `status` enum('present','absent') NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `student_id` (`student_id`,`subject_id`,`date`),
  KEY `subject_id` (`subject_id`,`date`),
  KEY `student_id_2` (`student_id`)
) ENGINE=MyISAM AUTO_INCREMENT=89 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`id`, `student_id`, `subject_id`, `date`, `status`) VALUES
(1, 1, 3, '2025-06-28', 'present'),
(2, 2, 3, '2025-06-28', 'absent'),
(3, 2, 4, '2025-06-28', 'absent'),
(4, 1, 1, '2025-06-01', 'present'),
(5, 1, 3, '2025-06-02', 'absent'),
(6, 1, 5, '2025-06-03', 'present'),
(7, 1, 1, '2025-06-04', 'present'),
(8, 1, 3, '2025-06-05', 'present'),
(9, 1, 5, '2025-06-06', 'absent'),
(10, 1, 1, '2025-06-07', 'present'),
(11, 1, 3, '2025-06-08', 'present'),
(12, 1, 5, '2025-06-09', 'present'),
(13, 1, 1, '2025-06-10', 'absent'),
(14, 1, 3, '2025-06-11', 'present'),
(15, 1, 5, '2025-06-12', 'present'),
(16, 1, 1, '2025-06-13', 'present'),
(17, 1, 3, '2025-06-14', 'absent'),
(18, 1, 5, '2025-06-15', 'present'),
(19, 1, 1, '2025-06-16', 'present'),
(20, 1, 3, '2025-06-17', 'present'),
(21, 1, 5, '2025-06-18', 'absent'),
(22, 1, 1, '2025-06-19', 'present'),
(23, 1, 3, '2025-06-20', 'present'),
(24, 1, 1, '2025-06-21', 'present'),
(25, 1, 3, '2025-06-22', 'absent'),
(26, 1, 5, '2024-06-23', 'present'),
(27, 1, 1, '2024-06-24', 'present'),
(28, 1, 3, '2024-06-25', 'absent'),
(29, 1, 5, '2024-06-26', 'present'),
(30, 1, 1, '2024-06-27', 'present'),
(31, 1, 3, '2024-06-28', 'present'),
(32, 1, 5, '2024-06-29', 'absent'),
(33, 1, 1, '2024-06-30', 'present'),
(34, 1, 3, '2024-07-01', 'present'),
(35, 1, 5, '2024-07-02', 'absent'),
(36, 1, 1, '2024-07-03', 'present'),
(37, 1, 3, '2024-07-04', 'absent'),
(38, 1, 5, '2024-07-05', 'present'),
(39, 1, 1, '2024-07-06', 'absent'),
(40, 1, 3, '2024-07-07', 'present'),
(41, 1, 5, '2024-07-08', 'present'),
(42, 1, 1, '2024-07-09', 'present'),
(43, 1, 3, '2024-07-10', 'present'),
(44, 1, 1, '2025-06-28', 'absent'),
(45, 3, 1, '2025-06-28', 'absent'),
(46, 5, 1, '2025-06-28', 'absent'),
(47, 7, 1, '2025-06-28', 'absent'),
(48, 8, 1, '2025-06-28', 'present'),
(49, 10, 1, '2025-06-28', 'absent'),
(50, 2, 2, '2025-06-28', 'present'),
(51, 3, 2, '2025-06-28', 'absent'),
(52, 5, 2, '2025-06-28', 'absent'),
(53, 6, 2, '2025-06-28', 'present'),
(54, 8, 2, '2025-06-28', 'absent'),
(55, 9, 2, '2025-06-28', 'present'),
(56, 4, 3, '2025-06-28', 'absent'),
(57, 5, 3, '2025-06-28', 'present'),
(58, 6, 3, '2025-06-28', 'present'),
(59, 8, 3, '2025-06-28', 'present'),
(60, 9, 3, '2025-06-28', 'present'),
(61, 10, 3, '2025-06-28', 'present'),
(62, 4, 4, '2025-06-28', 'present'),
(63, 7, 4, '2025-06-28', 'absent'),
(64, 9, 4, '2025-06-28', 'absent'),
(65, 1, 5, '2025-06-28', 'present'),
(66, 3, 5, '2025-06-28', 'absent'),
(67, 4, 5, '2025-06-28', 'present'),
(68, 6, 5, '2025-06-28', 'absent'),
(69, 7, 5, '2025-06-28', 'absent'),
(70, 8, 5, '2025-06-28', 'absent'),
(71, 10, 5, '2025-06-28', 'present'),
(72, 2, 2, '2025-06-29', 'absent'),
(73, 3, 2, '2025-06-29', 'present'),
(74, 5, 2, '2025-06-29', 'present'),
(75, 6, 2, '2025-06-29', 'absent'),
(76, 8, 2, '2025-06-29', 'present'),
(77, 9, 2, '2025-06-29', 'absent'),
(78, 1, 5, '2025-06-29', 'present'),
(79, 3, 5, '2025-06-29', 'absent'),
(80, 4, 5, '2025-06-29', 'present'),
(81, 6, 5, '2025-06-29', 'absent'),
(82, 7, 5, '2025-06-29', 'present'),
(83, 8, 5, '2025-06-29', 'absent'),
(84, 10, 5, '2025-06-29', 'present'),
(85, 2, 4, '2025-06-29', 'absent'),
(86, 4, 4, '2025-06-29', 'absent'),
(87, 7, 4, '2025-06-29', 'present'),
(88, 9, 4, '2025-06-29', 'absent');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

DROP TABLE IF EXISTS `students`;
CREATE TABLE IF NOT EXISTS `students` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `reg_number` varchar(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `reg_number` (`reg_number`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `reg_number`, `name`) VALUES
(1, 'DEK001', 'Alice Johnson'),
(2, 'DEK002', 'Bob Smith'),
(3, 'DEK003', 'Carol White'),
(4, 'DEK004', 'David Lee'),
(5, 'DEK005', 'Nora Brown'),
(6, 'DEK006', 'Frank Green'),
(7, 'DEK007', 'Grace Adams'),
(8, 'DEK008', 'Hannah Scott'),
(9, 'DEK009', 'Ian Wright'),
(10, 'DEK010', 'Jane Foster');

-- --------------------------------------------------------

--
-- Table structure for table `student_subjects`
--

DROP TABLE IF EXISTS `student_subjects`;
CREATE TABLE IF NOT EXISTS `student_subjects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `student_id` (`student_id`,`subject_id`),
  KEY `subject_id` (`subject_id`)
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_subjects`
--

INSERT INTO `student_subjects` (`id`, `student_id`, `subject_id`) VALUES
(1, 1, 1),
(2, 1, 3),
(3, 1, 5),
(4, 2, 2),
(5, 2, 3),
(6, 2, 4),
(7, 3, 1),
(8, 3, 2),
(9, 3, 5),
(10, 4, 3),
(11, 4, 4),
(12, 4, 5),
(13, 5, 1),
(14, 5, 2),
(15, 5, 3),
(16, 6, 2),
(17, 6, 3),
(18, 6, 5),
(19, 7, 1),
(20, 7, 4),
(21, 7, 5),
(22, 8, 1),
(23, 8, 2),
(24, 8, 3),
(25, 8, 5),
(26, 9, 2),
(27, 9, 3),
(28, 9, 4),
(29, 10, 1),
(30, 10, 3),
(31, 10, 5);

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

DROP TABLE IF EXISTS `subjects`;
CREATE TABLE IF NOT EXISTS `subjects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `name`) VALUES
(1, 'Mathematics'),
(2, 'Physics'),
(3, 'Chemistry'),
(4, 'English'),
(5, 'Computer Science');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
