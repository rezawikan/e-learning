-- phpMyAdmin SQL Dump
-- version 4.4.15.5
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Jan 02, 2017 at 05:10 PM
-- Server version: 5.5.49-log
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e-learning`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` text NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `gender` varchar(15) NOT NULL,
  `date_of_birth` varchar(15) NOT NULL,
  `update_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `create_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `username`, `password`, `first_name`, `last_name`, `gender`, `date_of_birth`, `update_at`, `create_at`) VALUES
(1, 'reza_eaz@yahoo.com', 'admin', '$2y$10$idLs.CEJcJJlon3FMHwCTeRuINDCjaoWRQNVS.qlLryRemo3ywsmu', 'Mochammad', 'Dito', 'man', '12/18/2016', '2016-12-27 02:22:03', '2016-12-25 17:46:00');

-- --------------------------------------------------------

--
-- Table structure for table `assignment`
--

CREATE TABLE IF NOT EXISTS `assignment` (
  `id` int(11) NOT NULL,
  `assignment_number` int(11) NOT NULL,
  `assignment_name` text NOT NULL,
  `assignment_path` text NOT NULL,
  `id_courses` int(11) NOT NULL,
  `update_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `create_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assignment`
--

INSERT INTO `assignment` (`id`, `assignment_number`, `assignment_name`, `assignment_path`, `id_courses`, `update_at`, `create_at`) VALUES
(23, 2, 'EKG25N_Farhan_Fahmi_1483184452.pdf', 'uploads/assignment/EKG25N_Farhan_Fahmi_1483184452.pdf', 2, '2016-12-31 11:40:52', '2016-12-31 11:40:52'),
(24, 2, 'D78G8M_Ibrohim_Fadlannul_Haq_1483225002.pdf', 'uploads/assignment/D78G8M_Ibrohim_Fadlannul_Haq_1483225002.pdf', 11, '2016-12-31 22:56:42', '2016-12-31 22:56:42'),
(25, 1, 'EKG25N_Farhan_Fahmi_1483256533.pdf', 'uploads/assignment/EKG25N_Farhan_Fahmi_1483256533.pdf', 9, '2017-01-01 07:42:13', '2017-01-01 07:42:13'),
(26, 1, 'KSWGUP_Berthus_Yudhistira_1483256559.pdf', 'uploads/assignment/KSWGUP_Berthus_Yudhistira_1483256559.pdf', 16, '2017-01-01 07:42:39', '2017-01-01 07:42:39'),
(27, 2, 'invoice_KECM6H_Maritha_MPattalala_1483256575.pdf', 'uploads/assignment/invoice_KECM6H_Maritha_MPattalala_1483256575.pdf', 16, '2017-01-01 07:42:55', '2017-01-01 07:42:55'),
(28, 2, 'FFVYJL_Burhanudin_1483256596.pdf', 'uploads/assignment/FFVYJL_Burhanudin_1483256596.pdf', 9, '2017-01-01 07:43:16', '2017-01-01 07:43:16');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE IF NOT EXISTS `courses` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `description` text NOT NULL,
  `subject_id` varchar(20) NOT NULL,
  `tutors_id` int(11) NOT NULL,
  `day` varchar(10) NOT NULL,
  `time` varchar(11) NOT NULL,
  `update_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `create_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `name`, `description`, `subject_id`, `tutors_id`, `day`, `time`, `update_at`, `create_at`) VALUES
(6, 'Business Development', 'Learn Business Development', 'BIT310', 2, 'wednesday', '19:20', '2017-01-01 01:21:51', '2016-12-26 07:38:03'),
(9, 'Enterprise Architecture', 'Learn Enterprise Architecture', 'BIT308', 1, 'tuesday', '12:30', '2017-01-01 01:23:00', '2016-12-26 07:40:59'),
(11, 'Client Server', 'Learn Client Server Concept', 'BIT3061', 2, 'tuesday', '12:30', '2017-01-01 01:28:41', '2016-12-26 07:41:57'),
(16, 'Web Technology ', 'Learn Web Techlogy Modern', 'BIT306', 1, 'tuesday', '20:00', '2017-01-01 01:21:05', '2016-12-26 07:46:05'),
(17, 'Digital Photography and Imagin', 'Learn Digital Photography and Imaging', 'CSW201', 2, 'friday', '14:00', '2017-01-01 01:22:27', '2016-12-26 09:26:48'),
(19, 'Software Engineering', 'Learn Software Engineering', 'BIT202', 2, 'monday', '12:50', '2016-12-30 01:27:51', '2016-12-30 01:27:51');

-- --------------------------------------------------------

--
-- Table structure for table `enrollments`
--

CREATE TABLE IF NOT EXISTS `enrollments` (
  `id` int(11) NOT NULL,
  `courses_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `student_data_id` int(11) NOT NULL,
  `update_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `create_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `enrollments`
--

INSERT INTO `enrollments` (`id`, `courses_id`, `student_id`, `student_data_id`, `update_at`, `create_at`) VALUES
(23, 9, 11, 22, '2017-01-01 07:35:37', '2017-01-01 07:35:37'),
(24, 16, 11, 23, '2017-01-01 07:35:47', '2017-01-01 07:35:47');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `create_at` timestamp NULL DEFAULT NULL,
  `update_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `description`, `create_at`, `update_at`) VALUES
(1, 'Holiday Last Year', 'Holiday Last Year Holiday Last Year Holiday Last Year Holiday Last Year', '2016-12-26 19:35:00', '2016-12-27 07:35:51'),
(2, 'Halo', 'Halo BAndung', '2016-12-27 01:18:12', '2016-12-27 08:18:12'),
(3, 'Testing', 'Testing', '2016-12-27 01:18:35', '2016-12-27 08:18:35');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE IF NOT EXISTS `questions` (
  `id` int(11) NOT NULL,
  `question` text NOT NULL,
  `a` varchar(20) NOT NULL,
  `b` varchar(20) NOT NULL,
  `c` varchar(20) NOT NULL,
  `d` varchar(20) NOT NULL,
  `answer` varchar(20) NOT NULL,
  `courses_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `question`, `a`, `b`, `c`, `d`, `answer`, `courses_id`) VALUES
(5, '  asdasd', 'asdasd', 'asdasd', 'asdasd', 'asda', 'sasdasdasd', 5),
(6, '  asdasd', 'asdasd', 'asdas', 'asdasd', 'adsasd', 'asdasdasd', 4),
(7, '  asdasd', 'asdas', 'dasdas', 'dasdasd', 'asdasd', 'asdasdasdas', 3),
(8, '  sdfsdf', 'sdfsd', 'fsdfs', 'sdfsdf', 'sdfsdfs', 'dfsdfsdfsdf', 2),
(9, '  asdas', 'dasda', 'sdasd', 'asdas', 'dasd', 'asdasdasd', 4),
(10, '  asdasdas', 'dasdasd', 'asdas', 'asdasd', 'asdasd', 'adsasdasd', 5),
(11, '  asdasd', 'sadasd', 'dasda', 'sdasd', 'asdas', 'asdasdasd', 5),
(14, 'What does PHP stand for?', 'Personal Hypertext P', 'PHP: Hypertext Prepr', 'Private Home Page', 'Hypertext Personal P', 'PHP: Hypertext Prepr', 16),
(16, '  All variables in PHP start with which symbol?', '!', '&', '$', '#', '$', 16),
(17, 'How do you get information from a form that is submitted using the "get" method?', 'Request.QueryString;', '$_GET[];', 'Request.Form;', '$_POST[];', '$_GET[];', 16);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE IF NOT EXISTS `students` (
  `id` int(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` text NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `gender` varchar(15) NOT NULL,
  `date_of_birth` varchar(15) NOT NULL,
  `update_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `create_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `email`, `username`, `password`, `first_name`, `last_name`, `gender`, `date_of_birth`, `update_at`, `create_at`) VALUES
(6, 'reza.wikan.dito@gmail.com', 'rezawikan', '$2y$10$2ppgB4PLFWGG/rCoyal/uuQiPqBDJMnxhb1NwK3Im7gruCiJLcOTu', 'Mochammad', ' Rezza', 'men', '12/30/2016', '2016-12-27 01:50:13', '2016-12-26 00:50:10'),
(10, 'anrika@gmail.com', 'anrika', '$2y$10$IijJ0crv2mZpQIJmEdzTE.3KDa2GXFZaZowkGtXM0X9BFYnc5e0dK', 'Anrika', 'Dwi', 'women', '12/28/2016', '2016-12-27 01:57:19', '2016-12-27 01:57:19'),
(11, 'reza@gmail.com', 'wikandito', '$2y$10$r851sHAW/TVe021MKjAKTuYsZtnyt3G/IALkmp6aYeG6BlCZzqLpe', 'Reza', 'Wikan', 'man', '01/03/2017', '2017-01-02 05:31:47', '2017-01-01 01:06:41');

-- --------------------------------------------------------

--
-- Table structure for table `student_data`
--

CREATE TABLE IF NOT EXISTS `student_data` (
  `id` int(11) NOT NULL,
  `quiz` int(11) NOT NULL,
  `assignment_one` text NOT NULL,
  `assignment_two` text NOT NULL,
  `update_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `create_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_data`
--

INSERT INTO `student_data` (`id`, `quiz`, `assignment_one`, `assignment_two`, `update_at`, `create_at`) VALUES
(22, 0, 'D78G8M_Ibrohim_Fadlannul_Haq_1483280191.pdf', 'invoice_AGQRGZ_henny_silaen_1483280221.pdf', '2017-01-02 05:33:59', '2017-01-01 07:35:37'),
(23, 0, '', '', '2017-01-02 05:34:31', '2017-01-01 07:35:47');

-- --------------------------------------------------------

--
-- Table structure for table `tutors`
--

CREATE TABLE IF NOT EXISTS `tutors` (
  `id` int(11) NOT NULL,
  `email` varchar(25) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` text NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `gender` varchar(15) NOT NULL,
  `date_of_birth` varchar(15) NOT NULL,
  `update_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `create_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tutors`
--

INSERT INTO `tutors` (`id`, `email`, `username`, `password`, `first_name`, `last_name`, `gender`, `date_of_birth`, `update_at`, `create_at`) VALUES
(1, 'reza.wikan@gmail.com', 'wikandito', '$2y$10$vf6kO9WU4PFzcVMnSMbopev0YbRyQ3OGcC.5S3/0b.cNfQ9UAOgWy', 'Reza', 'Prawira', 'man', '12/13/2016', '2016-12-30 00:28:31', '2016-12-25 17:27:00'),
(2, 'dwi@gmail.com', 'dwisari', '$2y$10$0LK4KlXXmAnF17CzS91nJuHvrQouxGoZ1feZ0sfL2zkWVaZmEwtF2', 'Dwi', 'Sarinem', 'women', '12/05/2016', '2016-12-27 02:21:05', '2016-12-27 02:18:41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assignment`
--
ALTER TABLE `assignment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_courses` (`id_courses`),
  ADD KEY `id_courses_2` (`id_courses`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subject_id` (`subject_id`),
  ADD KEY `tutors_id` (`tutors_id`);

--
-- Indexes for table `enrollments`
--
ALTER TABLE `enrollments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_data_id` (`student_data_id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `courses_id` (`courses_id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `quiz_id` (`courses_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_data`
--
ALTER TABLE `student_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tutors`
--
ALTER TABLE `tutors`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `assignment`
--
ALTER TABLE `assignment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `enrollments`
--
ALTER TABLE `enrollments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `student_data`
--
ALTER TABLE `student_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `tutors`
--
ALTER TABLE `tutors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
