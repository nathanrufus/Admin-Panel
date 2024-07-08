-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 07, 2024 at 01:23 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `university_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `access_control`
--

CREATE TABLE `access_control` (
  `id` int(11) NOT NULL,
  `section_id` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `access_control`
--

INSERT INTO `access_control` (`id`, `section_id`, `role_id`) VALUES
(1, 'user_management', 1),
(2, 'course_management', 1),
(3, 'reports_analytics', 2),
(4, 'department_management', 2),
(5, 'event_management', 3),
(6, 'support_management', 4),
(7, 'settings_configuration', 5),
(8, 'communication', 5),
(9, 'security', 5),
(10, 'user_management', 5),
(11, 'user_management', 1),
(12, 'user_management', 1),
(13, 'department_management', 13);

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`, `created_at`) VALUES
(1, 'admin', '$2y$10$/vya8NpPekl1NR3nLAGk1ugbZwJcdjHa4TDyEyXzTpC5/swwqWwo6', '2024-07-06 08:13:43');

-- --------------------------------------------------------

--
-- Table structure for table `audit_logs`
--

CREATE TABLE `audit_logs` (
  `id` int(11) NOT NULL,
  `action` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `audit_logs`
--

INSERT INTO `audit_logs` (`id`, `action`, `created_at`) VALUES
(1, 'User created a new account', '2024-07-06 09:11:03'),
(2, 'User updated profile information', '2024-07-06 09:11:03'),
(3, 'Admin added a new course', '2024-07-06 09:11:03'),
(4, 'Admin deleted a course', '2024-07-06 09:11:03'),
(5, 'User enrolled in a course', '2024-07-06 09:11:03'),
(6, 'Admin updated department information', '2024-07-06 09:11:03'),
(7, 'Admin added a new event', '2024-07-06 09:11:03'),
(8, 'User submitted a ticket', '2024-07-06 09:11:03'),
(9, 'Admin responded to a ticket', '2024-07-06 09:11:03'),
(10, 'User viewed course details', '2024-07-06 09:11:03'),
(11, 'Admin generated a report', '2024-07-06 09:11:03'),
(12, 'User changed password', '2024-07-06 09:11:03'),
(13, 'Admin assigned roles to a user', '2024-07-06 09:11:03'),
(14, 'User logged out', '2024-07-06 09:11:03'),
(15, 'User logged in', '2024-07-06 09:11:03');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `course_name` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `instructor_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `course_name`, `description`, `instructor_id`, `created_at`) VALUES
(2, 'CS101', 'Introduction to Computer Science', 1, '2024-07-06 09:07:27'),
(3, 'MATH101', 'Calculus I', 2, '2024-07-06 09:07:27'),
(4, 'PHYS101', 'General Physics I', 3, '2024-07-06 09:07:27'),
(5, 'CHEM101', 'General Chemistry I', 4, '2024-07-06 09:07:27'),
(6, 'BIOL101', 'Introduction to Biology', 5, '2024-07-06 09:07:27'),
(7, 'HIST101', 'World History I', 6, '2024-07-06 09:07:27'),
(8, 'ENG101', 'English Literature I', 7, '2024-07-06 09:07:27'),
(9, 'PHIL101', 'Introduction to Philosophy', 8, '2024-07-06 09:07:27'),
(10, 'ECON101', 'Principles of Economics', 9, '2024-07-06 09:07:27'),
(11, 'POLSCI101', 'Introduction to Political Science', 10, '2024-07-06 09:07:27'),
(12, 'SOC101', 'Introduction to Sociology', 11, '2024-07-06 09:07:27'),
(13, 'PSY101', 'Introduction to Psychology', 12, '2024-07-06 09:07:27'),
(14, 'GEO101', 'Physical Geography', 13, '2024-07-06 09:07:27'),
(15, 'ENVSCI101', 'Environmental Science', 14, '2024-07-06 09:07:27'),
(16, 'ENGR101', 'Introduction to software Engineering', 15, '2024-07-06 09:07:27');

-- --------------------------------------------------------

--
-- Table structure for table `course_enrollments`
--

CREATE TABLE `course_enrollments` (
  `course_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `course_instructors`
--

CREATE TABLE `course_instructors` (
  `course_id` int(11) NOT NULL,
  `instructor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `course_instructors`
--

INSERT INTO `course_instructors` (`course_id`, `instructor_id`) VALUES
(1234, 2334);

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int(11) NOT NULL,
  `department_name` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `department_name`, `created_at`) VALUES
(2, 'Computer Science3', '2024-07-06 09:06:57'),
(3, 'Mathematics', '2024-07-06 09:06:57'),
(4, 'Physics', '2024-07-06 09:06:57'),
(5, 'Chemistry', '2024-07-06 09:06:57'),
(6, 'Biology', '2024-07-06 09:06:57'),
(7, 'History', '2024-07-06 09:06:57'),
(8, 'English', '2024-07-06 09:06:57'),
(9, 'Philosophy', '2024-07-06 09:06:57'),
(10, 'Economics', '2024-07-06 09:06:57'),
(11, 'Political Science', '2024-07-06 09:06:57'),
(12, 'Sociology', '2024-07-06 09:06:57'),
(13, 'Psychology', '2024-07-06 09:06:57'),
(14, 'Geography', '2024-07-06 09:06:57'),
(15, 'Environmental Science', '2024-07-06 09:06:57'),
(16, 'Engineering', '2024-07-06 09:06:57');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `event_name` varchar(100) NOT NULL,
  `event_date` date DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `event_name`, `event_date`, `description`, `created_at`) VALUES
(2, 'Orientation', '2024-08-01', 'Welcoming event for new students', '2024-07-06 09:10:31'),
(3, 'Seminar on AI', '2024-08-05', 'Seminar on the advancements in AI', '2024-07-06 09:10:31'),
(4, 'Workshop on Data Science', '2024-08-10', 'Hands-on workshop on data science techniques', '2024-07-06 09:10:31'),
(5, 'Career Fair', '2024-08-15', 'Career fair with various companies', '2024-07-06 09:10:31'),
(6, 'Alumni Meet', '2024-08-20', 'Meeting with alumni of the university', '2024-07-06 09:10:31'),
(7, 'Guest Lecture on Robotics', '2024-08-25', 'Lecture by an expert in robotics', '2024-07-06 09:10:31'),
(8, 'Health Camp', '2024-08-30', 'Health check-up camp for students and staff', '2024-07-06 09:10:31'),
(9, 'Cultural Fest', '2024-09-05', 'Annual cultural fest with various performances', '2024-07-06 09:10:31'),
(10, 'Sports Meet', '2024-09-10', 'Inter-departmental sports competitions', '2024-07-06 09:10:31'),
(11, 'Science Exhibition', '2024-09-15', 'Exhibition of science projects and experiments', '2024-07-06 09:10:31'),
(12, 'Art Exhibition', '2024-09-20', 'Exhibition of artworks by students', '2024-07-06 09:10:31'),
(13, 'Tech Talk', '2024-09-25', 'Talk on the latest tech trends', '2024-07-06 09:10:31'),
(14, 'Hackathon', '2024-09-30', '24-hour coding competition', '2024-07-06 09:10:31'),
(15, 'Music Concert', '2024-10-05', 'Concert by the university band', '2024-07-06 09:10:31'),
(16, 'Drama Night', '2024-10-10', 'Drama performances by the drama club', '2024-07-06 09:10:31'),
(18, 'Youth_Mentorship', '2024-07-06', 'mentoring youths', '2024-07-06 13:05:38');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `role_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role_name`) VALUES
(1, 'Admin'),
(2, 'Manager'),
(3, 'User'),
(4, 'Guest'),
(5, 'Super Admin'),
(6, 'Editor'),
(7, 'Viewer'),
(8, 'Contributor'),
(9, 'Moderator'),
(10, 'Support'),
(11, 'kitchen'),
(12, 'kitchen'),
(13, 'Teacher');

-- --------------------------------------------------------

--
-- Table structure for table `role_permissions`
--

CREATE TABLE `role_permissions` (
  `id` int(11) NOT NULL,
  `role_id` int(11) DEFAULT NULL,
  `permission` varchar(255) DEFAULT NULL,
  `role` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `role_permissions`
--

INSERT INTO `role_permissions` (`id`, `role_id`, `permission`, `role`) VALUES
(1, 1, 'manage_users', ''),
(2, 1, 'manage_courses', ''),
(3, 2, 'view_reports', ''),
(4, 2, 'manage_departments', ''),
(5, 3, 'view_courses', ''),
(6, 3, 'enroll_in_courses', ''),
(7, 4, 'view_events', ''),
(8, 4, 'register_for_events', ''),
(9, 5, 'access_all_areas', ''),
(10, 5, 'override_permissions', ''),
(11, NULL, '[\"general_settings\"]', 'admin'),
(12, 11, 'manage_users', NULL),
(13, NULL, '[\"edit_user\",\"general_settings\"]', 'student'),
(14, 13, 'manage_courses', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `site_name` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `contact_number` varchar(20) NOT NULL,
  `timezone` varchar(50) NOT NULL,
  `maintenance_mode` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `system_logs`
--

CREATE TABLE `system_logs` (
  `id` int(11) NOT NULL,
  `log` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `subject` varchar(100) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `status` varchar(20) DEFAULT 'Open',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`id`, `user_id`, `subject`, `message`, `status`, `created_at`) VALUES
(1, 1, 'Login Issue', 'Unable to login to my account', 'Open', '2024-07-06 09:11:27'),
(2, 2, 'Course Enrollment', 'Having trouble enrolling in a course', 'Open', '2024-07-06 09:11:27'),
(3, 3, 'Payment Issue', 'Payment for the course failed', 'Closed', '2024-07-06 09:11:27'),
(4, 4, 'Profile Update', 'Unable to update profile information', 'Open', '2024-07-06 09:11:27'),
(5, 5, 'Course Content', 'Course content not loading', 'Closed', '2024-07-06 09:11:27'),
(6, 6, 'Event Registration', 'Problem registering for an event', 'Open', '2024-07-06 09:11:27'),
(7, 7, 'Technical Issue', 'Facing a technical issue on the platform', 'Open', '2024-07-06 09:11:27'),
(8, 8, 'Account Deactivation', 'Request to deactivate my account', 'Closed', '2024-07-06 09:11:27'),
(9, 9, 'Password Reset', 'Unable to reset my password', 'Open', '2024-07-06 09:11:27'),
(10, 10, 'Course Materials', 'Need additional course materials', 'Closed', '2024-07-06 09:11:27'),
(11, 11, 'Grade Issue', 'Issue with the grades received', 'Open', '2024-07-06 09:11:27'),
(12, 12, 'Feedback', 'Providing feedback on the course', 'Closed', '2024-07-06 09:11:27'),
(13, 13, 'Request for Information', 'Requesting more information about a course', 'Open', '2024-07-06 09:11:27'),
(14, 14, 'Account Activation', 'Issue with account activation', 'Closed', '2024-07-06 09:11:27'),
(15, 15, 'General Query', 'General query about the platform', 'Open', '2024-07-06 09:11:27');

-- --------------------------------------------------------

--
-- Table structure for table `ticket_responses`
--

CREATE TABLE `ticket_responses` (
  `id` int(11) NOT NULL,
  `ticket_id` int(11) NOT NULL,
  `response` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `ticket_responses`
--

INSERT INTO `ticket_responses` (`id`, `ticket_id`, `response`, `date`) VALUES
(1, 1, 'We are looking into your issue.', '2024-07-06 09:18:00'),
(2, 2, 'Your enrollment problem has been resolved.', '2024-07-06 09:18:00'),
(3, 3, 'Payment issue has been sorted out.', '2024-07-06 09:18:00'),
(4, 4, 'Profile update can be done now.', '2024-07-06 09:18:00'),
(5, 5, 'Course content is now accessible.', '2024-07-06 09:18:00'),
(6, 1, 'Sold out', '2024-07-06 10:26:49'),
(7, 1, 'Not sold', '2024-07-06 13:06:21'),
(8, 15, 'This is last ticket', '2024-07-06 13:07:02');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(20) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `created_at`) VALUES
(2, 'normad', '$2y$10$qd.Lc/hySVgBc/R0wPmho.6145Cnjznq2bD3qZTuKwdSD4/en.XJi', 'faculty', '2024-07-05 17:07:24'),
(19, 'kimimi', '$2y$10$LUYbwZoIpEXt4QisQLgAleFie5mmXlpZw0hSS77cPSSQjKGAwgJSC', 'student', '2024-07-06 09:58:35');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `access_control`
--
ALTER TABLE `access_control`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `audit_logs`
--
ALTER TABLE `audit_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_permissions`
--
ALTER TABLE `role_permissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `system_logs`
--
ALTER TABLE `system_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ticket_responses`
--
ALTER TABLE `ticket_responses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ticket_id` (`ticket_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `access_control`
--
ALTER TABLE `access_control`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `audit_logs`
--
ALTER TABLE `audit_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `role_permissions`
--
ALTER TABLE `role_permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `system_logs`
--
ALTER TABLE `system_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `ticket_responses`
--
ALTER TABLE `ticket_responses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `access_control`
--
ALTER TABLE `access_control`
  ADD CONSTRAINT `access_control_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_permissions`
--
ALTER TABLE `role_permissions`
  ADD CONSTRAINT `role_permissions_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `ticket_responses`
--
ALTER TABLE `ticket_responses`
  ADD CONSTRAINT `ticket_responses_ibfk_1` FOREIGN KEY (`ticket_id`) REFERENCES `tickets` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
