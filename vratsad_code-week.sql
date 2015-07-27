-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 27, 2015 at 01:00 PM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `vratsad_code-week`
--

-- --------------------------------------------------------

--
-- Table structure for table `apply`
--

CREATE TABLE IF NOT EXISTS `apply` (
  `course_num` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `test_result` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=cp1251;

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE IF NOT EXISTS `courses` (
  `course_num` int(11) NOT NULL,
  `course_name` varchar(50) NOT NULL,
  `hours` int(11) NOT NULL,
  `num_students` int(11) NOT NULL,
  `description` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=cp1251;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`course_num`, `course_name`, `hours`, `num_students`, `description`) VALUES
(101, 'php', 20, 20, 'php'),
(102, 'java', 20, 20, 'java');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE IF NOT EXISTS `students` (
  `student_id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `age` int(11) NOT NULL,
  `degree` varchar(60) NOT NULL,
  `city` varchar(60) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `motivation` varchar(200) NOT NULL,
  `phone` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=cp1251;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`student_id`, `first_name`, `last_name`, `age`, `degree`, `city`, `mail`, `motivation`, `phone`) VALUES
(1, 'Mihail', 'Ivanchev', 27, 'bachelors', 'Vratsa', 'mivanchev@gmail.com', 'none', 883469000),
(2, 'Ivan', 'Petrov', 20, 'student', 'vratsa', 'mail@abv.bg', 'none', 888888888);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `apply`
--
ALTER TABLE `apply`
  ADD KEY `course_num` (`course_num`), ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`course_num`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`student_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `apply`
--
ALTER TABLE `apply`
ADD CONSTRAINT `apply_ibfk_1` FOREIGN KEY (`course_num`) REFERENCES `courses` (`course_num`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `apply_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
