-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 22, 2024 at 11:24 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jobportal`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(100) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_password` varchar(255) NOT NULL,
  `admin_regdate` date NOT NULL DEFAULT current_timestamp(),
  `admin_status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_email`, `admin_password`, `admin_regdate`, `admin_status`) VALUES
(1, 'Apoorva', 'apoorvan721@gmail.com', '$2y$10$.drZo.7nZ6CIR59gBlpHJOJSwjBsLNX/Gr1oid9lYhkdj30fBRtWm', '2024-01-25', '');

-- --------------------------------------------------------

--
-- Table structure for table `application`
--

CREATE TABLE `application` (
  `application_id` int(11) NOT NULL,
  `job_id` int(11) NOT NULL,
  `seeker_id` int(11) NOT NULL,
  `message` varchar(350) NOT NULL,
  `application_regdate` date NOT NULL DEFAULT current_timestamp(),
  `application_status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `application`
--

INSERT INTO `application` (`application_id`, `job_id`, `seeker_id`, `message`, `application_regdate`, `application_status`) VALUES
(1, 4, 1, '', '2024-01-27', 'Shortlisted'),
(2, 10, 1, '', '2024-01-27', 'Shortlisted'),
(3, 5, 1, '', '2024-01-27', 'Shortlisted'),
(5, 9, 1, '', '2024-01-31', 'Selected'),
(6, 1, 3, '', '2024-02-03', 'Selected'),
(7, 1, 5, '', '2024-02-10', 'Selected');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `category_regdate` date NOT NULL DEFAULT current_timestamp(),
  `category_status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `category_regdate`, `category_status`) VALUES
(1, 'IT', '2024-01-17', ''),
(2, 'Sales', '2024-01-17', ''),
(3, 'Marketing', '2024-01-17', ''),
(4, 'HR', '2024-01-17', ''),
(7, 'Healthcare', '2024-01-27', ''),
(8, 'Finance and Accounting', '2024-01-27', ''),
(9, 'Design and Creative', '2024-01-27', '');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `job_id` int(11) NOT NULL,
  `jcategory_id` int(11) NOT NULL,
  `provider_id` int(11) NOT NULL,
  `job_img` varchar(400) NOT NULL,
  `job_role` varchar(100) NOT NULL,
  `job_publish` date NOT NULL DEFAULT current_timestamp(),
  `job_desc` varchar(450) NOT NULL,
  `job_status` int(11) NOT NULL,
  `job_exp` varchar(100) NOT NULL,
  `job_location` varchar(100) NOT NULL,
  `job_type` varchar(100) NOT NULL,
  `job_salary` int(11) NOT NULL,
  `job_site` varchar(100) NOT NULL,
  `last_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`job_id`, `jcategory_id`, `provider_id`, `job_img`, `job_role`, `job_publish`, `job_desc`, `job_status`, `job_exp`, `job_location`, `job_type`, `job_salary`, `job_site`, `last_date`) VALUES
(1, 1, 1, 'images/deloitte.png', 'Software Engineer', '2024-01-21', 'Roles And Responsibilities\r\n\r\nA Software Engineer plays a pivotal role in designing, coding, testing, and maintaining software applications. Responsibilities include analyzing user requirements, debugging, and ensuring software quality through code reviews and testing. \r\n\r\nCollaboration with cross-functional teams is essential to meet business objectives. Effective communication skills facilitate teamwork. Adaptability to new technologies and con', 0, 'Fresher', 'Bangalore', 'Full Time', 40000, 'https://www.deloitte.com', '2024-01-31'),
(4, 1, 3, 'images/accenture.png', 'Data Analyst', '2024-01-22', 'As a Business Analyst, the primary role involves evaluating and understanding business needs, analyzing processes, and providing data-driven insights. Responsibilities include gathering and documenting requirements, conducting market research, and collaborating with stakeholders to define project objectives. Business Analysts utilize analytical skills to assess data, identify trends, and make recommendations for business improvements. Effective c', 0, 'Fresher', 'Bangalore', 'Full Time', 30000, 'https://www.accenture.com', '2024-01-31'),
(5, 1, 4, 'images/tcs.png', 'Data Engineer', '2024-01-22', 'A Data Engineer specializes in designing, constructing, and maintaining the architecture for efficiently processing and managing large-scale data. Responsibilities include developing, testing, and deploying data infrastructure and systems. They design and implement scalable data pipelines, integrating various data sources and ensuring data accuracy and reliability. Data Engineers collaborate with data scientists, analysts, and other stakeholders ', 0, 'Fresher', 'Mumbai', 'Internship', 30000, 'https://www.tcs.com', '2024-01-29'),
(6, 1, 6, 'images/mindtree.png', 'Software Engineer Trainee', '2024-01-22', 'A Software Engineer plays a pivotal role in designing, coding, testing, and maintaining software applications. Responsibilities include analyzing user requirements, debugging, and ensuring software quality through code reviews and testing. Collaboration with cross-functional teams is essential to meet business objectives. Effective communication skills facilitate teamwork. Adaptability to new technologies and continuous learning are integral aspe', 0, 'Fresher', 'Pune', 'Part Time', 30000, 'https://www.mindtree.com', '2024-01-31'),
(7, 1, 1, 'images/deloitte.png', 'Data Analyst', '2024-01-27', 'As a Business Analyst, the primary role involves evaluating and understanding business needs, analyzing processes, and providing data-driven insights. Responsibilities include gathering and documenting requirements, conducting market research, and collaborating with stakeholders to define project objectives. Business Analysts utilize analytical skills to assess data, identify trends, and make recommendations for business improvements.', 0, 'Fresher', 'Bangalore', 'Internship', 30000, 'https://www.deloitte.com', '2024-02-29'),
(9, 4, 1, 'images/deloitte.png', 'Human Resource', '2024-01-27', 'As a Human Resource, the primary role involves evaluating and understanding business needs, analyzing processes, and providing data-driven insights. Responsibilities include gathering and documenting requirements, conducting market research, and collaborating with stakeholders to define project objectives. Business Analysts utilize analytical skills to assess data, identify trends, and make recommendations for business improvements. Effective c', 0, '4+ ', 'Bangalore', 'Full Time', 25000, 'https://www.deloitte.com', '2024-02-29'),
(10, 1, 2, 'images/dataqueue systems.png', 'Backend Developer', '2024-01-27', 'The primary role involves evaluating and understanding business needs, analyzing processes, and providing data-driven insights. Responsibilities include gathering and documenting requirements, conducting market research, and collaborating with stakeholders to define project objectives. Business Analysts utilize analytical skills to assess data, identify trends, and make recommendations for business improvements. Effective c', 0, '3+ ', 'Mangalore', 'Full Time', 30000, 'https://www.dataqueuesystems.com', '0000-00-00'),
(12, 1, 3, 'images/accenture.png', 'Software Engineer Trainee', '2024-01-27', 'The primary role involves evaluating and understanding business needs, analyzing processes, and providing data-driven insights. Responsibilities include gathering and documenting requirements, conducting market research, and collaborating with stakeholders to define project objectives. Business Analysts utilize analytical skills to assess data, identify trends, and make recommendations for business improvements. Effective c', 0, 'Fresher', 'Pune', 'Internship', 25000, 'https://www.accenture.com', '2024-02-24');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL,
  `seeker_id` int(11) NOT NULL,
  `payment_method` varchar(100) NOT NULL,
  `payment_amt` int(11) NOT NULL,
  `transaction_id` varchar(100) NOT NULL,
  `payment_date` date NOT NULL DEFAULT current_timestamp(),
  `payment_status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `seeker_id`, `payment_method`, `payment_amt`, `transaction_id`, `payment_date`, `payment_status`) VALUES
(2, 1, '', 99, 'pay_NVt5RJmX8ytC6W', '2024-01-27', 'success'),
(6, 1, '', 1999, 'pay_NVt5RJmX8ytC6W', '2024-01-29', 'success'),
(7, 1, '', 99, 'pay_NVt5RJmX8ytC6W', '2024-01-31', 'success'),
(8, 1, '', 1999, 'pay_NVt5RJmX8ytC6W', '2024-02-02', 'success'),
(9, 1, '', 1999, '', '2024-02-03', ''),
(10, 3, '', 1999, 'pay_NWM8stnehKCHBS', '2024-02-03', 'success'),
(11, 3, '', 1999, 'pay_NWM8stnehKCHBS', '2024-02-03', 'success'),
(12, 3, '', 1999, '', '2024-02-03', '');

-- --------------------------------------------------------

--
-- Table structure for table `provider`
--

CREATE TABLE `provider` (
  `provider_id` int(11) NOT NULL,
  `provider_name` varchar(100) NOT NULL,
  `provider_email` varchar(255) NOT NULL,
  `provider_pass` varchar(255) NOT NULL,
  `provider_contact` bigint(20) NOT NULL,
  `provider_size` varchar(100) NOT NULL,
  `provider_regno` varchar(100) NOT NULL,
  `provider_headquater` varchar(100) NOT NULL,
  `provider_founded` date NOT NULL,
  `provider_img` varchar(400) NOT NULL,
  `provider_regdate` date NOT NULL DEFAULT current_timestamp(),
  `provider_status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `provider`
--

INSERT INTO `provider` (`provider_id`, `provider_name`, `provider_email`, `provider_pass`, `provider_contact`, `provider_size`, `provider_regno`, `provider_headquater`, `provider_founded`, `provider_img`, `provider_regdate`, `provider_status`) VALUES
(1, 'Deloitte', 'deloitte@gmail.com', '$2y$10$.drZo.7nZ6CIR59gBlpHJOJSwjBsLNX/Gr1oid9lYhkdj30fBRtWm', 9857895856, '>1000', '57684000', 'Bangalore', '1986-06-11', 'images/deloitte.png', '2024-01-27', 'Approved'),
(2, 'Data Queue Systems', 'dqsystems@gmail.com', '$2y$10$b/pROEnnSb.2VmvBX6JTbeWEepCK8rjxFWG7z9tvmm7PUWoD3unLi', 9874758495, '50-200', '674000', 'Mangalore', '2010-06-09', 'images/dataqueue systems.png', '2024-01-27', 'Approved'),
(3, 'Accenture', 'accenture@gmail.com', '$2y$10$EVSstq7l8wKQg6QFCpVsJ.bH.ZmhdZ/IW/p5bm52lwggmvRKhezpC', 9887689577, '>1000', '7758700', 'Bangalore', '2013-06-06', 'images/accenture.png', '2024-01-27', 'Approved'),
(4, 'TCS', 'tcs@gmail.com', '$2y$10$v3Y5ki0CKDdyMqCimw3FOeswk8MFKIrr3Quh3.91QpJwVft3c0iCu', 9858764765, '>1000', '5687000', 'Bangalore', '1999-07-09', 'images/tcs.png', '2024-01-27', 'Approved'),
(5, 'Infosys', 'infosys@gmail.com', '$2y$10$qcezG41OJCk1rgk2Ce7y0eLebn6jtsCJLCJ0AQ8.4OwqvbkaYN/HW', 9873775898, '>1000', '5786000', 'Bangalore', '1997-02-05', 'images/infosys.png', '2024-01-27', 'Approved'),
(6, 'Mindtree', 'mindtree@gmail.com', '$2y$10$tnX3hETRbZjRQRQjZ73woeU9Rq9wbGr7PvvhaZKLt5LzZiS9Zxybm', 9657589485, '>1000', '7686900', 'Bangalore', '1999-02-18', 'images/mindtree.png', '2024-01-27', 'Approved');

-- --------------------------------------------------------

--
-- Table structure for table `refer`
--

CREATE TABLE `refer` (
  `refer_id` int(11) NOT NULL,
  `provider_id` int(11) NOT NULL,
  `seeker_id` int(11) NOT NULL,
  `refer_role` varchar(100) NOT NULL,
  `refer_name` varchar(100) NOT NULL,
  `refer_email` varchar(255) NOT NULL,
  `refer_phone` bigint(20) NOT NULL,
  `refer_gender` varchar(100) NOT NULL,
  `refer_qualification` varchar(100) NOT NULL,
  `refer_skills` varchar(255) NOT NULL,
  `refer_experience` varchar(100) NOT NULL,
  `refer_city` varchar(100) NOT NULL,
  `refer_resume` varchar(500) NOT NULL,
  `refer_regdate` date NOT NULL DEFAULT current_timestamp(),
  `refer_status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `refer`
--

INSERT INTO `refer` (`refer_id`, `provider_id`, `seeker_id`, `refer_role`, `refer_name`, `refer_email`, `refer_phone`, `refer_gender`, `refer_qualification`, `refer_skills`, `refer_experience`, `refer_city`, `refer_resume`, `refer_regdate`, `refer_status`) VALUES
(3, 2, 1, 'Software Engineer', 'Ashritha', 'ashritha@gmail.com', 6366073759, 'female', 'MCA', 'Java , SQL , HTML , CSS', 'Fresher', 'Mangalore', 'resumes/Apoorva_N Resume.pdf', '2024-01-24', ''),
(5, 3, 1, 'Software Engineer Trainee', 'Prakruthi', 'prakruthi@gmail.com', 6366073759, 'female', 'B.TECH', 'Java , SQL , HTML , CSS', 'Fresher', 'Mangalore', 'resumes/Apoorva_N Resume.pdf', '2024-01-27', '');

-- --------------------------------------------------------

--
-- Table structure for table `seeker`
--

CREATE TABLE `seeker` (
  `seeker_id` int(11) NOT NULL,
  `seeker_name` varchar(100) NOT NULL,
  `seeker_email` varchar(255) NOT NULL,
  `seeker_password` varchar(255) NOT NULL,
  `seeker_phone` bigint(20) NOT NULL,
  `seeker_city` varchar(100) NOT NULL,
  `seeker_gender` varchar(100) NOT NULL,
  `seeker_degree` varchar(100) NOT NULL,
  `seeker_img` varchar(400) NOT NULL,
  `seeker_skills` varchar(400) NOT NULL,
  `seeker_resume` varchar(255) NOT NULL,
  `seeker_exp` varchar(100) NOT NULL,
  `seeker_regdate` date NOT NULL DEFAULT current_timestamp(),
  `seeker_status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `seeker`
--

INSERT INTO `seeker` (`seeker_id`, `seeker_name`, `seeker_email`, `seeker_password`, `seeker_phone`, `seeker_city`, `seeker_gender`, `seeker_degree`, `seeker_img`, `seeker_skills`, `seeker_resume`, `seeker_exp`, `seeker_regdate`, `seeker_status`) VALUES
(1, 'Apoorva N', 'apoorvan721@gmail.com', '$2y$10$.drZo.7nZ6CIR59gBlpHJOJSwjBsLNX/Gr1oid9lYhkdj30fBRtWm', 6366073759, 'Mangalore', 'female', 'B.TECH', 'images/Untitled design (3).png', 'Java , SQL , HTML ', 'resumes/Resume 2023.pdf', 'Fresher', '2024-01-21', ''),
(2, 'Soujanya', 'soujanya@gmail.com', '$2y$10$V8oDq5DUYFvRnRbfjvDRGeGexPuS2ETWGxYoeGKZ7bpvkTXa5XG/q', 6366073759, 'Mangalore', 'female', 'B.TECH', 'images/WhatsApp Image 2024-01-08 at 20.40.12.jpeg', 'Java , Sql', 'resumes/Resume 2023.pdf', 'Fresher', '2024-01-24', ''),
(3, 'Ashritha', 'ashritha@gmail.com', '$2y$10$.drZo.7nZ6CIR59gBlpHJOJSwjBsLNX/Gr1oid9lYhkdj30fBRtWm', 6366073759, 'Mangalore', 'female', 'MCA', '', 'Java , SQL , HTML , CSS', 'resumes/Resume 2023.pdf', 'Fresher', '2024-01-24', ''),
(4, 'Sannidhi', 'sannidhi@gmail.com', '$2y$10$uv8KhiQVqgYCumshhxHKqeb56NAB.xZ/bkGPgYmttXvCAMFNyreki', 6366073759, 'Mangalore', 'male', 'B.TECH', '', 'Python, HTML, CSS', 'resumes/Resume 2023.pdf', '<2', '2024-01-24', ''),
(5, 'Prakruthi P D', 'pdprakruthi08@gmail.com', '$2y$10$.drZo.7nZ6CIR59gBlpHJOJSwjBsLNX/Gr1oid9lYhkdj30fBRtWm', 9902739159, 'MANGALORE', 'female', 'B.TECH', 'images/1.png', 'Java , SQL , HTML , CSS', 'resumes/Akhila CV- 4560.pdf', 'Fresher', '2024-02-10', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `application`
--
ALTER TABLE `application`
  ADD PRIMARY KEY (`application_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`job_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `provider`
--
ALTER TABLE `provider`
  ADD PRIMARY KEY (`provider_id`);

--
-- Indexes for table `refer`
--
ALTER TABLE `refer`
  ADD PRIMARY KEY (`refer_id`);

--
-- Indexes for table `seeker`
--
ALTER TABLE `seeker`
  ADD PRIMARY KEY (`seeker_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `application`
--
ALTER TABLE `application`
  MODIFY `application_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `job_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `provider`
--
ALTER TABLE `provider`
  MODIFY `provider_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `refer`
--
ALTER TABLE `refer`
  MODIFY `refer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `seeker`
--
ALTER TABLE `seeker`
  MODIFY `seeker_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
