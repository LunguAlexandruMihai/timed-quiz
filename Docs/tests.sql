-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 26, 2013 at 10:02 PM
-- Server version: 5.6.11
-- PHP Version: 5.5.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `tests`
--
CREATE DATABASE IF NOT EXISTS `tests` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `tests`;

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE IF NOT EXISTS `answers` (
  `a_id` int(11) NOT NULL AUTO_INCREMENT,
  `a_name` varchar(50) NOT NULL,
  PRIMARY KEY (`a_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `exams`
--

CREATE TABLE IF NOT EXISTS `exams` (
  `e_id` int(11) NOT NULL AUTO_INCREMENT,
  `e_name` varchar(50) NOT NULL,
  `e_description` varchar(200) NOT NULL,
  `e_questions` varchar(50) NOT NULL,
  PRIMARY KEY (`e_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `exams`
--

INSERT INTO `exams` (`e_id`, `e_name`, `e_description`, `e_questions`) VALUES
(1, 'Exam 1', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed blandit pharetra massa vitae sagittis. Praesent neque metus, tincidunt commodo suscipit hendrerit, congue ac diam. Phasellus at dapibus mi.', '1,2,3'),
(2, 'Exam 2', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed blandit pharetra massa vitae sagittis. Praesent neque metus, tincidunt commodo suscipit hendrerit, congue ac diam. Phasellus at dapibus mi.', '2'),
(3, 'Exam 3', 'Vestibulum molestie odio a enim ultricies gravida. In tristique malesuada tortor, vitae pulvinar lacus imperdiet pretium', '2,3');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE IF NOT EXISTS `questions` (
  `q_id` int(11) NOT NULL AUTO_INCREMENT,
  `q_name` varchar(50) NOT NULL DEFAULT '0',
  `q_answer_ids` varchar(50) NOT NULL DEFAULT '0',
  `q_answer_correct` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`q_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`q_id`, `q_name`, `q_answer_ids`, `q_answer_correct`) VALUES
(1, 'question', '0', 5),
(2, 'question 2', '0', 5),
(3, 'question 3', '0', 5),
(4, 'question 4', '0', 5);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
