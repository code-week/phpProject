-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 30, 2015 at 06:43 PM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `vratsad_code-week1`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `username` varchar(20) CHARACTER SET cp1251 NOT NULL,
  `password` varchar(64) CHARACTER SET cp1251 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `ages`
--

CREATE TABLE IF NOT EXISTS `ages` (
  `age-group` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ages`
--

INSERT INTO `ages` (`age-group`) VALUES
('13 - 19'),
('20 - 29'),
('30 - 40'),
('under 13'),
('up 40');

-- --------------------------------------------------------

--
-- Table structure for table `apply`
--

CREATE TABLE IF NOT EXISTS `apply` (
  `course_num` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `test_result` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`course_num`, `course_name`, `hours`, `num_students`, `description`) VALUES
(101, 'php', 20, 20, 'php'),
(102, 'java', 20, 20, 'java');

-- --------------------------------------------------------

--
-- Table structure for table `e-mails-templats`
--

CREATE TABLE IF NOT EXISTS `e-mails-templats` (
  `id_template` int(11) NOT NULL,
  `head` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `experiences`
--

CREATE TABLE IF NOT EXISTS `experiences` (
  `type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `experiences`
--

INSERT INTO `experiences` (`type`) VALUES
('advanced'),
('begginers'),
('without eperience');

-- --------------------------------------------------------

--
-- Table structure for table `occupations`
--

CREATE TABLE IF NOT EXISTS `occupations` (
  `type_occupation` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `occupations`
--

INSERT INTO `occupations` (`type_occupation`) VALUES
('employed'),
('other'),
('schoolboy / schoolgirl'),
('student'),
('unemployed');

-- --------------------------------------------------------

--
-- Table structure for table `sent_mails`
--

CREATE TABLE IF NOT EXISTS `sent_mails` (
  `id_sent` int(11) NOT NULL,
  `e-mail` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `statuses`
--

CREATE TABLE IF NOT EXISTS `statuses` (
  `id_status` int(20) NOT NULL,
  `status_type` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `statuses`
--

INSERT INTO `statuses` (`id_status`, `status_type`) VALUES
(4, 'approved'),
(1, 'confirmed'),
(3, 'declined'),
(2, 'not confirmed');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE IF NOT EXISTS `students` (
  `student_id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `age` varchar(100) NOT NULL,
  `occupation` varchar(60) NOT NULL,
  `previous_experience` varchar(100) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `course` varchar(30) NOT NULL,
  `phone` int(10) NOT NULL,
  `implementation` varchar(300) NOT NULL,
  `contribution` varchar(300) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`student_id`, `first_name`, `last_name`, `age`, `occupation`, `previous_experience`, `mail`, `course`, `phone`, `implementation`, `contribution`, `status`) VALUES
(1, 'Мартин', 'Найтън', 'under 13', 'other', 'begginers', 'mail@mail.mail', '101', 101, '', '', ''),
(2, 'Георги', 'Геогриев', '20 - 29', 'employed', 'advanced', 'mail@mail.mail', 'java', 888888999, 'some', 'random', 'declined'),
(3, 'Petyr', 'Petrov', '30 - 40', 'schoolboy / schoolgirl', 'without eperience', 'some@mai.bg', 'php', 889798465, 'dont know', 'dont know', 'approved');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ages`
--
ALTER TABLE `ages`
  ADD PRIMARY KEY (`age-group`);

--
-- Indexes for table `apply`
--
ALTER TABLE `apply`
  ADD KEY `course_num` (`course_num`), ADD KEY `student_id` (`student_id`), ADD KEY `test_result` (`test_result`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`course_num`), ADD KEY `course_name` (`course_name`);

--
-- Indexes for table `e-mails-templats`
--
ALTER TABLE `e-mails-templats`
  ADD PRIMARY KEY (`id_template`);

--
-- Indexes for table `experiences`
--
ALTER TABLE `experiences`
  ADD PRIMARY KEY (`type`);

--
-- Indexes for table `occupations`
--
ALTER TABLE `occupations`
  ADD PRIMARY KEY (`type_occupation`);

--
-- Indexes for table `sent_mails`
--
ALTER TABLE `sent_mails`
  ADD PRIMARY KEY (`id_sent`);

--
-- Indexes for table `statuses`
--
ALTER TABLE `statuses`
  ADD PRIMARY KEY (`id_status`), ADD UNIQUE KEY `status_type` (`status_type`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`student_id`), ADD KEY `age` (`age`), ADD KEY `age_2` (`age`), ADD KEY `previous_experience` (`previous_experience`), ADD KEY `ocupation` (`occupation`), ADD KEY `cource` (`course`), ADD KEY `age_3` (`age`), ADD KEY `ocupation_2` (`occupation`), ADD KEY `course` (`course`), ADD KEY `status` (`status`), ADD KEY `status_2` (`status`), ADD KEY `course_2` (`course`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `e-mails-templats`
--
ALTER TABLE `e-mails-templats`
  MODIFY `id_template` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sent_mails`
--
ALTER TABLE `sent_mails`
  MODIFY `id_sent` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `statuses`
--
ALTER TABLE `statuses`
  MODIFY `id_status` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `apply`
--
ALTER TABLE `apply`
ADD CONSTRAINT `apply_ibfk_1` FOREIGN KEY (`course_num`) REFERENCES `courses` (`course_num`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
