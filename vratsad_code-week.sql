-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 02, 2015 at 04:46 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

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
  `age_group` varchar(100) NOT NULL,
  PRIMARY KEY (`age_group`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ages`
--

INSERT INTO `ages` (`age_group`) VALUES
('над 40 години'),
('от 13 до 19 години'),
('от 20 до 29 години'),
('от 30 до 40 години'),
('под 13 години');

-- --------------------------------------------------------

--
-- Table structure for table `apply`
--

CREATE TABLE IF NOT EXISTS `apply` (
  `course_num` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `test_result` int(11) NOT NULL,
  KEY `course_num` (`course_num`),
  KEY `student_id` (`student_id`),
  KEY `test_result` (`test_result`)
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
  `description` varchar(300) NOT NULL,
  PRIMARY KEY (`course_num`),
  KEY `course_name` (`course_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`course_num`, `course_name`, `hours`, `num_students`, `description`) VALUES
(101, 'Android', 20, 20, 'Java'),
(102, 'java', 20, 20, 'java'),
(103, 'PHP/MYSQL', 40, 12, ''),
(104, 'Wordpress/HTML', 20, 10, '');

-- --------------------------------------------------------

--
-- Table structure for table `experiences`
--

CREATE TABLE IF NOT EXISTS `experiences` (
  `type` varchar(100) NOT NULL,
  PRIMARY KEY (`type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `experiences`
--

INSERT INTO `experiences` (`type`) VALUES
('без опит'),
('напреднал'),
('начинаещ');

-- --------------------------------------------------------

--
-- Table structure for table `mail_templates`
--

CREATE TABLE IF NOT EXISTS `mail_templates` (
  `id_template` int(11) NOT NULL AUTO_INCREMENT,
  `head` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id_template`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `occupations`
--

CREATE TABLE IF NOT EXISTS `occupations` (
  `type_occupation` varchar(60) NOT NULL,
  PRIMARY KEY (`type_occupation`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `occupations`
--

INSERT INTO `occupations` (`type_occupation`) VALUES
('безработен'),
('друго'),
('зает'),
('студент'),
('учащ');

-- --------------------------------------------------------

--
-- Table structure for table `sent_mails`
--

CREATE TABLE IF NOT EXISTS `sent_mails` (
  `id_sent` int(11) NOT NULL AUTO_INCREMENT,
  `e-mail` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id_sent`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `statuses`
--

CREATE TABLE IF NOT EXISTS `statuses` (
  `id_status` int(10) NOT NULL AUTO_INCREMENT,
  `status_type` varchar(100) NOT NULL,
  PRIMARY KEY (`id_status`),
  UNIQUE KEY `status_type` (`status_type`),
  KEY `id_status` (`id_status`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `statuses`
--

INSERT INTO `statuses` (`id_status`, `status_type`) VALUES
(1, 'approved'),
(3, 'declined'),
(2, 'not approved'),
(4, 'rejected');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE IF NOT EXISTS `students` (
  `student_id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `age` varchar(100) NOT NULL,
  `occupation` varchar(60) NOT NULL,
  `previous_experience` varchar(100) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `course` varchar(30) NOT NULL,
  `phone` int(10) NOT NULL,
  `implementation` varchar(300) NOT NULL,
  `contribution` varchar(300) NOT NULL,
  `status` varchar(100) NOT NULL,
  PRIMARY KEY (`student_id`),
  UNIQUE KEY `student_id_2` (`student_id`),
  KEY `age` (`age`),
  KEY `age_2` (`age`),
  KEY `previous_experience` (`previous_experience`),
  KEY `ocupation` (`occupation`),
  KEY `cource` (`course`),
  KEY `age_3` (`age`),
  KEY `ocupation_2` (`occupation`),
  KEY `course` (`course`),
  KEY `status` (`status`),
  KEY `status_2` (`status`),
  KEY `course_2` (`course`),
  KEY `student_id` (`student_id`),
  FULLTEXT KEY `first_name` (`first_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`student_id`, `first_name`, `last_name`, `age`, `occupation`, `previous_experience`, `mail`, `course`, `phone`, `implementation`, `contribution`, `status`) VALUES
(1, 'Ivan', 'Ivanov', '20 - 29', 'employed', 'beginner', 'asdfasdf@fsd.fsd', 'php', 656565, 'asdfsaf', 'asdf', 'declined'),
(2, 'Petar', 'Petrov', 'over 40', 'schoolboy / schoolgirl', 'inexperienced', 'sadd@fsd.bg', 'php', 55956655, 'sdfasdfasdf', 'asdfasdf', 'approved'),
(3, 'George', 'Takei', '30 - 40', 'unemployed', 'advanced', 'asdf@fasd.fad', 'java', 898656886, 'asaasdf', 'asdfasdf', 'approved'),
(4, 'Иванка', 'Борисова', '20-29', 'unempoyed', 'begginer', 'veles_ib@gmail.com', '', 0, '', '', ''),
(5, 'Петър', 'Великов', '20-29', 'unempoyed', '', 'drd@abv.bg', 'java', 0, 'o', 'gh', ''),
(6, 'Илияна', 'Първанова', 'от 30 до 40 години', 'друго', 'без опит', 'veles_ib@gmail.com', 'PHP/MYSQL', 0, 'да, ще ми бъде много полезно за работата', 'със сигурност ще повлия', '');

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
