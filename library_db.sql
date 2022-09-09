-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2021 at 12:54 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `accno` bigint(20) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `author` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `publisher` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `edition` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` bigint(20) DEFAULT NULL,
  `price` double(15,2) NOT NULL DEFAULT 0.00,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `accno`, `title`, `author`, `publisher`, `edition`, `quantity`, `price`, `created_at`, `updated_at`) VALUES
(1, 30105, 'Mobile Computing', 'Raj Kamal', 'Oxford', 'Second Edition', 5, 575.00, NULL, NULL),
(2, 30106, 'Data Communication and Networks', 'CHARANJEET SINGH', 'KALYANI PUBLISHERS', 'FIFTH EDITION', 7, 675.00, NULL, NULL),
(3, 30107, 'OPERATIONS RESEARCH', 'K.K. Chawla V.Gupta B.K. Sharma', 'KALYANI PUBLISHERS', 'THIRD EDITION', 6, 495.00, NULL, NULL),
(4, 30108, 'VB .NET', 'R. MANRO', 'KALYANI PUBLISHERS', 'FIRST 2018', 3, 555.00, NULL, NULL),
(5, 4545, 'Client Server Computing', 'Lalit Kumar', 'Sun India Publications, New Delhi', 'Second 2015', 5, 459.00, NULL, NULL),
(6, 4569, '.NET Framework & C#', 'Sharad Kumar Verma', 'Sun India Publication, New Delhi', '2009', 3, 588.00, NULL, NULL),
(7, 45645, 'Computer Networks', 'Saurabh Singhal', 'Thakur Publications', 'Second 2015-16', 2, 479.00, NULL, NULL),
(8, 32323, 'Artificial Intelligence', 'David L. Poole, Alan K. Mackworth', 'Cambridge University Press; 2 edition', '2nd Edition', 5, 599.00, NULL, NULL),
(9, 45452, 'Python', 'Dr. Charles Russell Severance, Sue Blumenberg, Elliott Hauser, Aimee Andrion', 'CreateSpace', 'THIRD EDITION', 9, 350.00, NULL, NULL),
(10, 3324, 'Fundamentals of Computer Programming with C#', 'SvetlinNakov, et al', 'Faber Publishing, Bulgaria (2013)', NULL, 7, 655.00, NULL, NULL),
(11, 90834, 'PC Architecture', 'Michael Karbo', 'Know Ware - Competence Micro', 'Second', 3, 655.00, NULL, NULL),
(12, 2569, 'Circuit Design Using Personal Computers', 'Thomas R. Cuthber', 'Krieger Pub Co (February 1994)', 'Seventh', 6, 544.00, NULL, NULL),
(13, 54532, 'Linux Inside', '0xAX', 'Gitbooks', 'FIRST 2018', 4, 350.00, NULL, NULL),
(14, 44432, 'Operating System: From 0 to 1', 'Tu, Do Hoang', 'GitHub', NULL, 1, 575.00, NULL, NULL),
(15, 66554, 'Functional-Light JavaScript', 'Kyle Simpson', 'CreateSpace 1 edition (November 27, 2017); eBook (Creative Commons Edition, GitHub)', '2014', 3, 588.00, NULL, NULL),
(16, 43221, 'Better Data Visualizations', 'Jonathan Schwabish', NULL, NULL, 4, 444.00, NULL, NULL),
(17, 75432, 'Cyber Security', 'Kevin Kali', NULL, NULL, 3, 350.00, NULL, NULL),
(18, 54537, 'Information Technology Essentials Volume 1', 'Eric Frick', NULL, NULL, 2, 432.00, NULL, NULL),
(19, 33436, 'Web Applications with Javascript or Java', 'Gerd Wagner and Mircea Diaconescu', 'De Gruyter Oldenbourg', '; 1st Edition (September 10, 2019)', 2, 437.00, NULL, NULL),
(20, 33438, 'The Art of Assembly Language', 'Randall Hyde', 'No Starch Press', '2 edition (March 22, 2010)', 1, 754.00, NULL, NULL),
(21, 33489, 'Machine Language for Beginners: Machine Language Programming for BASIC Language Programmers', 'Richard Mansfield', 'Compute! Publications Inc.,U.S. (November 1, 1987)', NULL, 3, 544.00, NULL, NULL),
(22, 33928, 'Compiler Design: Theory, Tools, and Examples', 'Seth D. Bergmann', 'Rowan University (C/C++ Version, 2010; Java Version: April 12, 2018)', 'Second 2018', 8, 566.00, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `issues`
--

CREATE TABLE `issues` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `issue_id` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `accno` bigint(20) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reg_no` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `department` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `member_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `issue_date` date NOT NULL,
  `due_date` date DEFAULT NULL,
  `return_date` date DEFAULT NULL,
  `fine` double(15,2) NOT NULL DEFAULT 0.00,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `issues`
--

INSERT INTO `issues` (`id`, `issue_id`, `accno`, `title`, `reg_no`, `name`, `department`, `member_type`, `issue_date`, `due_date`, `return_date`, `fine`, `created_at`, `updated_at`) VALUES
(1, 'IID-1', 30105, 'Mobile Computing', 'STD-1', 'Jaswinder Singh', 'Computer Science', 'Student', '2021-05-02', '2021-05-16', '2021-05-17', 0.00, NULL, NULL),
(2, 'IID-2', 30106, 'Data Communication and Networks', 'STD-2', 'Harmeet Singh', 'Computer Science', 'Student', '2021-05-02', '2021-05-16', '2021-05-17', 0.00, NULL, NULL),
(3, 'IID-3', 30107, 'OPERATIONS RESEARCH', 'STD-3', 'Deepika Sharma', 'Computer Science', 'Student', '2021-05-02', '2021-05-16', NULL, 0.00, NULL, NULL),
(4, 'IID-4', 32323, 'Artificial Intelligence', 'STD-6', 'Rahul', 'MA', 'Student', '2021-05-16', '2021-05-30', '2021-05-16', 0.00, NULL, NULL),
(5, 'IID-5', 3324, 'Fundamentals of Computer Programming with C#', 'STD-4', 'Navjot Kaur', 'Computer Science', 'Student', '2021-05-02', '2021-05-16', '2021-05-17', 0.00, NULL, NULL),
(6, 'IID-6', 33436, 'Web Applications with Javascript or Java', 'STF-1', 'Ranvver Sukhjia', 'Computer Science', 'Staff', '2021-05-16', '2021-05-30', NULL, 0.00, NULL, NULL),
(7, 'IID-7', 33438, 'The Art of Assembly Language', 'STF-7', 'Ms Nishi', 'Commerce', 'Staff', '2021-05-16', '2021-05-30', '2021-05-17', 0.00, NULL, NULL),
(8, 'IID-8', 54537, 'Information Technology Essentials Volume 1', 'STF-6', 'Mr Varun Maini', 'LLB', 'Staff', '2021-05-16', '2021-05-30', '2021-05-17', 0.00, NULL, NULL),
(9, 'IID-9', 33928, 'Compiler Design: Theory, Tools, and Examples', 'STF-5', NULL, 'MA', 'Staff', '2021-05-16', '2021-05-30', NULL, 0.00, NULL, NULL),
(10, 'IID-10', 75432, 'Cyber Security', 'STF-4', 'Ms Veerpal Kaur', 'Computer Science', 'Staff', '2021-05-16', '2021-05-30', NULL, 0.00, NULL, NULL),
(11, 'IID-11', 30105, 'Mobile Computing', 'STD-2', NULL, 'Computer Science', 'Student', '2021-05-16', '2021-05-30', '2021-05-16', 3.00, NULL, NULL),
(12, 'IID-12', 30107, 'OPERATIONS RESEARCH', 'STF-1', NULL, 'Computer Science', 'Staff', '2021-05-16', '2021-05-30', '2021-05-17', 10.00, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `lostdamagebooks`
--

CREATE TABLE `lostdamagebooks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `accno` bigint(20) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reg_no` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `department` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `member_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `book_condition` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fine` double(15,2) NOT NULL DEFAULT 0.00,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lostdamagebooks`
--

INSERT INTO `lostdamagebooks` (`id`, `accno`, `title`, `reg_no`, `department`, `member_type`, `book_condition`, `fine`, `created_at`, `updated_at`) VALUES
(1, 30105, 'Mobile Computing', 'STD-1', 'Computer Science', 'Student', 'Lost', 575.00, NULL, NULL),
(2, 54537, 'Information Technology Essentials Volume 1', 'STF-6', 'LLB', 'Staff', 'Damage', 150.00, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2021_03_25_110153_create_books_table', 1),
(6, '2021_03_25_163939_create_students_table', 1),
(7, '2021_03_26_130517_create_issues_table', 1),
(8, '2021_04_08_053939_create_staffmembers_table', 1),
(9, '2021_04_26_031235_create_lostdamagebooks_table', 1),
(10, '2021_05_06_173246_create_notes_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`id`, `subject`, `message`, `date`, `created_at`, `updated_at`) VALUES
(1, 'Exams', 'Exams Will Be Postpone', '16-May-2021', NULL, NULL),
(2, 'No Dues', 'No Dues wil be start from 31 April 2021', '16-May-2021', NULL, NULL),
(3, 'Staff Books', 'Computer Science Department Books Not Return till now.', '16-May-2021', NULL, NULL),
(4, 'Student Books', 'LLB\r\nDepartment Books Not Return till now.', '16-May-2021', NULL, NULL),
(5, 'May Examination', 'May Examination will start from 28 June', '16-May-2021', NULL, NULL),
(6, 'Fee Clearance', 'Inform to all college students that to pay your fees', '16-May-2021', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('admin@gmail.com', '$2y$10$4TDeWPv4Y8GEpxFs/gzbIuhkW32olVgdPqExa3D6Q9SF8BSxOHjWW', '2021-05-16 07:26:41');

-- --------------------------------------------------------

--
-- Table structure for table `staffmembers`
--

CREATE TABLE `staffmembers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `reg_no` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `staff_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `department` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact` bigint(20) DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `registration_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `staffmembers`
--

INSERT INTO `staffmembers` (`id`, `reg_no`, `staff_name`, `designation`, `department`, `gender`, `contact`, `address`, `registration_date`, `created_at`, `updated_at`) VALUES
(1, 'STF-1', 'Ranvver Sukhjia', 'Assistant Proffesor', 'Computer Science', 'Male', 9878978978, 'Sri Muktsar Sahib', '16-May-2021', NULL, NULL),
(2, 'STF-2', 'Mr. Manish Kumar Jindal', 'Professor', 'Computer Science', 'Male', 9865789567, 'Bathinda', '16-May-2021', NULL, NULL),
(3, 'STF-3', 'Mr. Mohinder Kumar', 'Professor', 'Computer Science', 'Male', 7888898887, 'Abohar', '16-May-2021', NULL, NULL),
(4, 'STF-4', 'Ms Veerpal Kaur', 'Assistant Professor', 'Computer Science', 'Female', 8777878787, 'Abohar', '16-May-2021', NULL, NULL),
(5, 'STF-5', 'Mr. Pawan Kumar', 'Professor', 'MA', 'Male', 8778788978, 'Ferozepur', '16-May-2021', NULL, NULL),
(6, 'STF-6', 'Mr Varun Maini', 'Professor', 'LLB', 'Male', 8778788978, 'Fazilka', '16-May-2021', NULL, NULL),
(7, 'STF-7', 'Ms Nishi', 'Professor', 'Commerce', 'Female', 8778788978, 'Chandigarh', '16-May-2021', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `reg_no` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `course` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `year` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `department` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `session` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `registration_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact` bigint(20) DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `reg_no`, `name`, `course`, `year`, `department`, `session`, `gender`, `registration_date`, `contact`, `address`, `created_at`, `updated_at`) VALUES
(1, 'STD-1', 'jaswinder singh', 'MCA', 'Final', 'Computer Science', '2020-21', 'Male', '16-May-2021', 8437838075, 'Guru Har Sahai', NULL, NULL),
(2, 'STD-2', 'Harmeet Singh', 'MCA', 'Final', 'Computer Science', '2020-21', 'Male', '16-May-2021', 8778788978, 'Sri Muktsar Sahib', NULL, NULL),
(3, 'STD-3', 'Deepika Sharma', 'MCA', 'Final', 'Computer Science', '2020-21', 'Female', '16-May-2021', 7888898887, 'Malout', NULL, NULL),
(4, 'STD-4', 'Navjot Kaur', 'MCA', 'Final', 'Computer Science', '2020-21', 'Female', '16-May-2021', 7888898887, 'Sri Muktsar Sahib', NULL, NULL),
(5, 'STD-5', 'Chetna', 'MCA', 'Final', 'Computer Science', '2020-21', 'Female', '16-May-2021', 9999999999, 'Chandigarh', NULL, NULL),
(6, 'STD-6', 'Rahul', 'MA', 'Third', 'Arts', '2020-22', 'Male', '16-May-2021', 9999999999, 'Ferozepur', NULL, NULL),
(7, 'STD-7', 'Nimrat', 'LLB', 'Fourth', 'LLB', '2020-22', 'Female', '16-May-2021', 9999999999, 'Faridkot', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact` bigint(20) DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `dob`, `gender`, `designation`, `address`, `contact`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'Jaswinder Singh', 'jassisaab07@gmail.com', '1996-04-10', 'Male', 'Library Head', 'Ferozepur', 8437838075, '$2y$10$Y0TRTR2dbK6FDxPMZ9DWK.iEE3DjKApF1.AQuKSB60aTkdY0UBka.', NULL, NULL, NULL, '2tBtuXcCm8tzQPpfYyxRwbDFUsXIYKStBoqnWjjjMF4KHffHMxqqzrSneIVv', '2021-05-16 07:28:42', '2021-05-16 13:00:46'),
(3, 'Rajveer Sidhu', 'rajveer@gmail.com', '1991-04-10', 'Male', 'Library Head', 'Bathinda', 9999999999, '$2y$10$pTM0XQGYTaWCAyxkmcM0wOTJzgPntIq6gH5FPPWt7MQl7XWpb2rQK', NULL, NULL, NULL, NULL, '2021-05-16 12:08:30', '2021-05-16 12:08:30'),
(4, 'Jonson', 'json@gmail.com', '1996-04-10', 'Male', 'Asst Head', 'Chandigarh', 9999999999, '$2y$10$HCFC.LDJ6R7x7HOMsw81g.JCTsU2elrThT8cGdI9wsp5PddDAT.uC', NULL, NULL, NULL, NULL, '2021-05-16 12:12:02', '2021-05-16 12:12:02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `books_accno_unique` (`accno`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `issues`
--
ALTER TABLE `issues`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lostdamagebooks`
--
ALTER TABLE `lostdamagebooks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `staffmembers`
--
ALTER TABLE `staffmembers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `issues`
--
ALTER TABLE `issues`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `lostdamagebooks`
--
ALTER TABLE `lostdamagebooks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `staffmembers`
--
ALTER TABLE `staffmembers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
