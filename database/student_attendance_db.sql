-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 12, 2023 at 07:39 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `student_attendance_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance_list`
--

CREATE TABLE IF NOT EXISTS `attendance_list` (
`id` int(30) NOT NULL,
  `class_subject_id` int(30) NOT NULL,
  `doc` date NOT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attendance_list`
--

INSERT INTO `attendance_list` (`id`, `class_subject_id`, `doc`, `date_created`) VALUES
(1, 1, '2020-10-28', '2020-10-28 20:06:37'),
(2, 1, '2023-04-04', '2023-04-04 13:42:44'),
(3, 1, '2023-04-12', '2023-04-12 12:53:58'),
(4, 1, '2023-04-13', '2023-04-12 13:09:08');

-- --------------------------------------------------------

--
-- Table structure for table `attendance_record`
--

CREATE TABLE IF NOT EXISTS `attendance_record` (
`id` int(30) NOT NULL,
  `attendance_id` int(30) NOT NULL,
  `student_id` int(30) NOT NULL,
  `type` tinyint(1) NOT NULL COMMENT '0=absent,1=present,2=late',
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attendance_record`
--

INSERT INTO `attendance_record` (`id`, `attendance_id`, `student_id`, `type`, `date_created`) VALUES
(1, 1, 1, 1, '2020-10-28 20:06:37'),
(2, 1, 2, 2, '2020-10-28 20:06:37'),
(3, 2, 1, 1, '2023-04-04 13:42:44'),
(4, 2, 2, 0, '2023-04-04 13:42:44'),
(5, 3, 1, 0, '2023-04-12 12:53:58'),
(6, 3, 2, 2, '2023-04-12 12:53:58'),
(7, 4, 1, 0, '2023-04-12 13:09:08'),
(8, 4, 2, 2, '2023-04-12 13:09:08');

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE IF NOT EXISTS `class` (
`id` int(30) NOT NULL,
  `course_id` int(30) NOT NULL,
  `level` varchar(50) NOT NULL,
  `section` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1=Active, 0=Inactive',
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`id`, `course_id`, `level`, `section`, `status`, `date_created`) VALUES
(1, 2, '1', 'B', 1, '2020-10-28 10:48:45'),
(2, 2, '1', 'A', 1, '2020-10-28 10:52:58');

-- --------------------------------------------------------

--
-- Table structure for table `class_subject`
--

CREATE TABLE IF NOT EXISTS `class_subject` (
`id` int(30) NOT NULL,
  `class_id` int(30) NOT NULL,
  `subject_id` int(30) NOT NULL,
  `faculty_id` int(30) NOT NULL,
  `student_ids` text NOT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `class_subject`
--

INSERT INTO `class_subject` (`id`, `class_id`, `subject_id`, `faculty_id`, `student_ids`, `date_created`) VALUES
(1, 2, 1, 1, '', '0000-00-00 00:00:00'),
(2, 1, 2, 1, '', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE IF NOT EXISTS `courses` (
`id` int(30) NOT NULL,
  `course` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `course`, `description`, `date_created`) VALUES
(1, 'Sample Course', 'Sample Course', '2020-10-28 10:00:41'),
(2, 'Course 2', ' Course 2', '2020-10-28 10:02:09'),
(3, 'Course 3', ' Course 3', '2020-10-28 10:02:16'),
(4, 'Course 4', ' Course 4', '2020-10-28 10:02:24');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE IF NOT EXISTS `faculty` (
`id` int(30) NOT NULL,
  `id_no` varchar(50) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(200) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`id`, `id_no`, `name`, `email`, `contact`, `address`, `date_created`) VALUES
(1, '06232014', 'John Smith', 'jsmith@sample.com', '+18456-5455-55', 'Sample Only', '2020-10-28 11:32:18');

-- --------------------------------------------------------

--
-- Table structure for table `grade`
--

CREATE TABLE IF NOT EXISTS `grade` (
`id` int(20) NOT NULL,
  `student_id` int(20) NOT NULL,
  `category` varchar(36) NOT NULL,
  `quarter` varchar(36) NOT NULL,
  `subject_id` int(20) NOT NULL,
  `it1` varchar(36) NOT NULL,
  `it2` varchar(36) NOT NULL,
  `it3` varchar(36) NOT NULL,
  `it4` varchar(36) NOT NULL,
  `it5` varchar(36) NOT NULL,
  `thps` varchar(36) NOT NULL,
  `trs` varchar(36) NOT NULL,
  `ps` varchar(36) NOT NULL,
  `wa` varchar(36) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `grade`
--

INSERT INTO `grade` (`id`, `student_id`, `category`, `quarter`, `subject_id`, `it1`, `it2`, `it3`, `it4`, `it5`, `thps`, `trs`, `ps`, `wa`) VALUES
(10, 1, 'Written_Works', '1st Quarter', 1, '9', '9', '9', '9', '9', '50', '45', '', ''),
(11, 2, 'Written_Work', '1st Quarter', 2, '8', '9', '9', '8', '9', '50', '43', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE IF NOT EXISTS `students` (
`id` int(30) NOT NULL,
  `id_no` varchar(50) NOT NULL,
  `class_id` int(30) NOT NULL,
  `name` text NOT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `id_no`, `class_id`, `name`, `date_created`) VALUES
(1, '06232014', 2, 'Claire Blake', '2020-10-28 11:53:24'),
(2, '123456', 2, 'George Wilson', '2020-10-28 15:20:57');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE IF NOT EXISTS `subjects` (
`id` int(30) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `subject`, `description`, `date_created`) VALUES
(1, 'Subject 1 ', 'Subject 1 ', '2020-10-28 10:29:53'),
(2, 'Subject 2', 'Subject 2', '2020-10-28 10:30:48'),
(3, 'Subject 3', 'Subject 3', '2020-10-28 10:30:57'),
(4, '', '', '2023-04-06 00:17:34');

-- --------------------------------------------------------

--
-- Table structure for table `system_settings`
--

CREATE TABLE IF NOT EXISTS `system_settings` (
`id` int(30) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(200) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `cover_img` text NOT NULL,
  `about_content` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `system_settings`
--

INSERT INTO `system_settings` (`id`, `name`, `email`, `contact`, `cover_img`, `about_content`) VALUES
(1, 'Student Attendance Management System', 'info@sample.comm', '+6948 8542 623', '1603344720_1602738120_pngtree-purple-hd-business-banner-image_5493.jpg', '&lt;p style=&quot;text-align: center; background: transparent; position: relative;&quot;&gt;&lt;span style=&quot;color: rgb(0, 0, 0); font-family: &amp;quot;Open Sans&amp;quot;, Arial, sans-serif; font-weight: 400; text-align: justify;&quot;&gt;&amp;nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&rsquo;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.&lt;/span&gt;&lt;br&gt;&lt;/p&gt;&lt;p style=&quot;text-align: center; background: transparent; position: relative;&quot;&gt;&lt;br&gt;&lt;/p&gt;&lt;p style=&quot;text-align: center; background: transparent; position: relative;&quot;&gt;&lt;br&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(30) NOT NULL,
  `name` text NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` text NOT NULL,
  `type` tinyint(1) NOT NULL DEFAULT '3' COMMENT '1=Admin,2=Staff',
  `faculty_id` int(30) NOT NULL COMMENT 'for faculty user only'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `type`, `faculty_id`) VALUES
(1, 'Administrator', 'admin', '0192023a7bbd73250516f069df18b500', 1, 0),
(2, 'John Smith', 'jsmith@sample.com', 'af606ddc433ae6471f104872585cf880', 3, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance_list`
--
ALTER TABLE `attendance_list`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendance_record`
--
ALTER TABLE `attendance_record`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class_subject`
--
ALTER TABLE `class_subject`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grade`
--
ALTER TABLE `grade`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `system_settings`
--
ALTER TABLE `system_settings`
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
-- AUTO_INCREMENT for table `attendance_list`
--
ALTER TABLE `attendance_list`
MODIFY `id` int(30) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `attendance_record`
--
ALTER TABLE `attendance_record`
MODIFY `id` int(30) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
MODIFY `id` int(30) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `class_subject`
--
ALTER TABLE `class_subject`
MODIFY `id` int(30) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
MODIFY `id` int(30) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
MODIFY `id` int(30) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `grade`
--
ALTER TABLE `grade`
MODIFY `id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
MODIFY `id` int(30) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
MODIFY `id` int(30) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `system_settings`
--
ALTER TABLE `system_settings`
MODIFY `id` int(30) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(30) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
