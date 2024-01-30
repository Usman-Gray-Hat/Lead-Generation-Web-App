-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 30, 2024 at 12:57 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `emeraldx`
--

-- --------------------------------------------------------

--
-- Table structure for table `account_credentials`
--

CREATE TABLE `account_credentials` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `gmail` varchar(200) DEFAULT NULL,
  `gmail_password` varchar(50) DEFAULT NULL,
  `twitter` varchar(200) DEFAULT NULL,
  `twitter_password` varchar(50) DEFAULT NULL,
  `instagram` varchar(200) DEFAULT NULL,
  `instagram_password` varchar(50) DEFAULT NULL,
  `discord` varchar(200) DEFAULT NULL,
  `discord_password` varchar(50) DEFAULT NULL,
  `twitch` varchar(200) DEFAULT NULL,
  `twitch_password` varchar(50) DEFAULT NULL,
  `status` varchar(20) DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `account_credentials`
--

INSERT INTO `account_credentials` (`id`, `name`, `gmail`, `gmail_password`, `twitter`, `twitter_password`, `instagram`, `instagram_password`, `discord`, `discord_password`, `twitch`, `twitch_password`, `status`) VALUES
(1, 'Rachel', 'rachel@gmail.com', 'Nomoredays', '@rachel35', 'rachel#9sept', 'rachelhouse_', 'GFXisLife#9', 'rachelhouse', 'GFXisLife#9', 'rachel_house35', 'GFXisLife#9', 'Active'),
(2, 'Olivia Stone', 'oliviastone@gmail.com', 'AssassinIsBack', '@ston_olivia', 'AssassinIsBack', 'oliviaston36', 'AssassinIsBack', 'olivia_stone', 'AssassinIsBack', 'oliviastone', 'AssassinIsBack', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `role` varchar(50) DEFAULT 'Not Assigned',
  `type` int(11) DEFAULT NULL,
  `employee_id_FK` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `username`, `email`, `password`, `role`, `type`, `employee_id_FK`) VALUES
(1, 'Usman Hameed', 'usman@123', 'usmanhameed1790@gmail.com', 'fcea920f7412b5da7be0cf42b8c93759', 'Lead Generation Head', 1, 9),
(2, 'Bilal Amir', 'bilal@123', NULL, '0cc175b9c0f1b6a831c399e269772661', 'Lead Generation', 2, 0),
(3, 'Abdullah Baig', 'abdullah@123', 'deadlysandra1997@gmail.com', 'fcea920f7412b5da7be0cf42b8c93759', 'Lead Generation', 2, 1),
(4, 'Ali Hyder', 'ali@123', NULL, '0cc175b9c0f1b6a831c399e269772661', 'Lead Generation', 2, 2),
(12, 'Adnan Ahmed', 'adnan@123', NULL, '0cc175b9c0f1b6a831c399e269772661', 'Lead Generation', 2, 15),
(13, 'Syed Shees', 'shees@123', NULL, '0cc175b9c0f1b6a831c399e269772661', 'Lead Generation', 2, 6),
(22, 'Talha Maqsood', 'talha600', 'officehome4997@gmail.com', '7d78239b4bfbbf6f88989d733eff336b', 'Closer', 1, 0),
(28, 'Javed Iqbal Khan', 'javed@123', 'javed@gmail.com', 'fcea920f7412b5da7be0cf42b8c93759', 'Manager', 2, 19);

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` int(11) NOT NULL,
  `employee_id_FK` int(11) DEFAULT NULL,
  `employee_name` varchar(50) DEFAULT NULL,
  `reason` varchar(200) DEFAULT NULL,
  `marked_by` varchar(50) DEFAULT NULL,
  `date_created` date DEFAULT curdate(),
  `admin_id_FK` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`id`, `employee_id_FK`, `employee_name`, `reason`, `marked_by`, `date_created`, `admin_id_FK`) VALUES
(5, 10, 'Hariz Malik', 'Sick (Dengue)', 'Usman Hameed', '2024-01-01', 1),
(6, 10, 'Hariz Malik', 'Sick (Dengue)', 'Usman Hameed', '2024-01-02', 1),
(7, 10, 'Hariz Malik', 'Sick (Dengue)', 'Usman Hameed', '2024-01-03', 1),
(8, 9, 'Usman Hameed', 'Sick (Vomiting)', 'Usman Hameed', '2024-01-02', 1),
(9, 10, 'Hariz Malik', 'Sick (Dengue)', 'Usman Hameed', '2024-01-04', 1),
(10, 4, 'Muhammad Ahmed', 'Sick', 'Usman Hameed', '2024-01-04', 1),
(11, 3, 'Ashfaq Hassan', 'Casual Off', 'Usman Hameed', '2024-01-04', 1),
(12, 10, 'Hariz Malik', 'Sick (Dengue)', 'Usman Hameed', '2024-01-05', 1),
(18, 4, 'Muhammad Ahmed', 'Family Outing', 'Usman Hameed', '2024-01-08', 1),
(19, 3, 'Ashfaq Hassan', 'Not Specified', 'Usman Hameed', '2024-01-08', 1),
(20, 6, 'Syed Shees', 'Guests at home', 'Usman Hameed', '2024-01-08', 1),
(21, 10, 'Hariz Malik', 'Sick (Dengue)', 'Usman Hameed', '2024-01-08', 1),
(22, 8, 'Muhammad Arshman Khan', 'Family Reason (Father was in hospital)', 'Usman Hameed', '2024-01-08', 1),
(23, 1, 'Mirza Abdullah Baig', 'Sick (Fever)', 'Usman Hameed', '2024-01-09', 1),
(24, 6, 'Syed Shees', 'Sick', 'Usman Hameed', '2024-01-09', 1),
(25, 8, 'Muhammad Arshman Khan', 'Family Reason (Father was in hospital)', 'Usman Hameed', '2024-01-09', 1),
(26, 10, 'Hariz Malik', 'Sick (Dengue)', 'Usman Hameed', '2024-01-09', 1),
(27, 3, 'Ashfaq Hassan', 'Not Specified', 'Usman Hameed', '2024-01-09', 1),
(28, 4, 'Muhammad Ahmed', 'Leave - Out of city', 'Usman Hameed', '2024-01-09', 1),
(29, 10, 'Hariz Malik', 'Sick (Dengue)', 'Usman Hameed', '2024-01-10', 1),
(30, 9, 'Usman Hameed', 'Sick (Fever)', 'Usman Hameed', '2024-01-10', 1),
(31, 1, 'Mirza Abdullah Baig', 'Sick (Fever)', 'Usman Hameed', '2024-01-10', 1),
(32, 3, 'Ashfaq Hassan', 'Not Specified', 'Usman Hameed', '2024-01-10', 1),
(33, 4, 'Muhammad Ahmed', 'Leave - Out of city', 'Usman Hameed', '2024-01-10', 1),
(34, 8, 'Muhammad Arshman Khan', 'Family Reason (Father was in hospital)', 'Usman Hameed', '2024-01-10', 1),
(35, 10, 'Hariz Malik', 'Sick (Dengue)', 'Usman Hameed', '2024-01-11', 1),
(36, 4, 'Muhammad Ahmed', 'Leave - Out of city', 'Usman Hameed', '2024-01-11', 1),
(37, 3, 'Ashfaq Hassan', 'Not Specified', 'Usman Hameed', '2024-01-11', 1),
(38, 10, 'Hariz Malik', 'Sick (Dengue)', 'Usman Hameed', '2024-01-12', 1),
(39, 4, 'Muhammad Ahmed', 'Leave - Out of city', 'Usman Hameed', '2024-01-12', 1),
(40, 3, 'Ashfaq Hassan', 'Not Specified', 'Usman Hameed', '2024-01-12', 1),
(41, 9, 'Usman Hameed', 'Family reasons', 'Usman Hameed', '2024-01-15', 1),
(42, 4, 'Muhammad Ahmed', 'Leave - Out of city', 'Usman Hameed', '2024-01-15', 1),
(43, 4, 'Muhammad Ahmed', 'Leave - Out of city', 'Usman Hameed', '2024-01-16', 1),
(44, 10, 'Hariz Malik', 'Sick (Dengue)', 'Usman Hameed', '2024-01-15', 1),
(45, 10, 'Hariz Malik', 'Sick (Dengue)', 'Usman Hameed', '2024-01-16', 1),
(46, 3, 'Ashfaq Hassan', 'Not Specified', 'Usman Hameed', '2024-01-15', 1),
(47, 3, 'Ashfaq Hassan', 'Not Specified', 'Usman Hameed', '2024-01-16', 1),
(48, 10, 'Hariz Malik', 'Sick (Dengue)', 'Usman Hameed', '2024-01-17', 1),
(49, 4, 'Muhammad Ahmed', 'Leave - Out of city', 'Usman Hameed', '2024-01-17', 1),
(50, 2, 'Ali Hyder', 'Family reasons', 'Usman Hameed', '2024-01-19', 1),
(52, 4, 'Muhammad Ahmed', 'Leave - Out of city', 'Usman Hameed', '2024-01-18', 1),
(53, 4, 'Muhammad Ahmed', 'Leave - Out of city', 'Usman Hameed', '2024-01-19', 1),
(54, 4, 'Muhammad Ahmed', 'Leave - Out of city', 'Usman Hameed', '2024-01-22', 1),
(55, 4, 'Muhammad Ahmed', 'Leave - Out of city', 'Usman Hameed', '2024-01-23', 1),
(56, 15, 'Adnan Ahmed', 'Exam', 'Usman Hameed', '2024-01-24', 1),
(57, 4, 'Muhammad Ahmed', 'Leave - Out of city', 'Usman Hameed', '2024-01-24', 1),
(58, 2, 'Ali Hyder', 'Sick', 'Usman Hameed', '2024-01-25', 1),
(59, 4, 'Muhammad Ahmed', 'Leave - Out of city', 'Usman Hameed', '2024-01-25', 1),
(60, 4, 'Muhammad Ahmed', 'Leave - Out of city', 'Usman Hameed', '2024-01-26', 1),
(61, 5, 'Abdul Rehman Shiekh', 'Not specified', 'Usman Hameed', '2024-01-26', 1),
(63, 4, 'Muhammad Ahmed', 'Leave - Out of city', 'Usman Hameed', '2024-01-29', 1);

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `full_name` varchar(50) DEFAULT NULL,
  `father_name` varchar(50) DEFAULT NULL,
  `cell_no` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `cnic_no` varchar(50) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `status` varchar(50) DEFAULT 'Active',
  `date_of_joining` date DEFAULT curdate(),
  `first_sale` date DEFAULT NULL,
  `added_by` varchar(50) DEFAULT NULL,
  `admin_id_FK` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `full_name`, `father_name`, `cell_no`, `email`, `cnic_no`, `address`, `status`, `date_of_joining`, `first_sale`, `added_by`, `admin_id_FK`) VALUES
(1, 'Mirza Abdullah Baig', 'Pervaiz Akhtar Baig', '03110879784', 'abaig5361@gmail.com', '3520224255227', 'Main numaish, lasbella', 'Active', '2023-10-18', '2023-10-21', 'Usman Hameed', 1),
(2, 'Ali Hyder', 'Qurban Ali', '03142614743', 'herelucifer329@gmail.com', '4250116714233', 'Malir Cantt Check Post 6 Number', 'Active', '2023-12-18', '2023-12-21', 'Usman Hameed', 1),
(3, 'Ashfaq Hassan', 'Azhar Hussain', '03062364977', 'ashfaqahmed9061@gmail.com', '4220191502213', 'R-110, Gulshan-E-Umair ', 'Left', '2023-12-05', '0000-00-00', 'Usman Hameed', 1),
(4, 'Muhammad Ahmed ', 'Usman', '03265879872', 'ahmeddashti9061@gmail.com', '', 'Gulshan-E-Umair, Street 3 House no R85 ', 'Active', '2023-12-05', '2023-12-12', 'Usman Hameed', 1),
(5, 'Abdul Rehman Shiekh', 'Abdul Raheem', '03171123456', 'abdulrehmanshiekh@gmail.com', '4240172614097', 'Sector 14, Orangi Town', 'Active', '2024-01-01', '2024-01-15', 'Usman Hameed', 1),
(6, 'Syed Shees', 'Syed Masood Iqbal', '03313425689', 'syedshees614@gmail.com', '4220164707529', 'House no A-308, Block-8 , Gulistan-E-Johar, Karachi', 'Active', '2023-11-01', '2023-12-07', 'Usman Hameed', 1),
(8, 'Muhammad Arshman Khan', 'Muhammad Aslam Khan', '03353248107', 'karshman200@gmail.com', '4210175880665', 'House no A-314, Block-8 , Gulistan-E-Johar, Karachi', 'Active', '2024-01-03', '2024-01-15', 'Usman Hameed', 1),
(9, 'Usman Hameed', 'Abdul Hameed', '03353307493', 'usmanhameed1790@gmail.com', '4220183898787', 'D-708, Tulip towers, Behind Rim Jhim Towers, Main Safora', 'Active', '2023-07-16', '2023-07-21', 'Usman Hameed', 1),
(10, 'Hariz Malik', '', '', '', '', '', 'Left', '2023-12-18', '0000-00-00', 'Usman Hameed', 1),
(15, 'Adnan Ahmed', 'Sibghatullah', '03083131828', 'adnaanjalbani@gmail.com', '4520344905393', 'Rao Zebaish Apartment, Gulistan-E-Johar, Block-13, Karachi', 'Active', '2024-01-22', NULL, 'Usman Hameed', 1),
(16, 'Aazan Shirazi', 'Mujtaba Shirazi', '03063736569', 'aazanshirazi9sept@gmail.com', '-', 'Gulistan-E-Johar, Block 8, AEECHS Society, House no:A260', 'Active', '2024-01-29', NULL, 'Usman Hameed', 1),
(18, 'Farzan Ahmed Malik', 'Haider Raza', '03348366402', 'farzanahmed37@gmail.com', '4220135217647', 'B-61, Block-2, Gulshan-E-Iqbal, Karachi', 'Active', '2024-01-29', NULL, 'Usman Hameed', 1),
(19, 'Javed Iqbal Khan', 'Iqbal Khan', '23165487', 'javed@gmail.com', '321654897', 'Johar', 'Active', '2024-01-30', NULL, 'Usman Hameed', 1);

-- --------------------------------------------------------

--
-- Table structure for table `leads`
--

CREATE TABLE `leads` (
  `id` int(11) NOT NULL,
  `lead_timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `lead_date` date DEFAULT curdate(),
  `employee_name` varchar(50) DEFAULT NULL,
  `account_name` varchar(50) DEFAULT NULL,
  `platform_name` varchar(50) DEFAULT NULL,
  `channel_link` varchar(225) DEFAULT '-',
  `client_username` varchar(100) DEFAULT NULL,
  `comments` varchar(500) DEFAULT 'Waiting for a response',
  `status` varchar(50) DEFAULT 'Pending',
  `items` varchar(500) DEFAULT '-',
  `follow_up_date_with_remarks` varchar(500) DEFAULT '-',
  `reason_of_rejection` varchar(500) DEFAULT '-',
  `quality_of_lead` varchar(50) DEFAULT 'Pending',
  `amount` bigint(20) DEFAULT 0,
  `admin_id_FK` int(11) DEFAULT NULL,
  `employee_id_FK` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `leads`
--

INSERT INTO `leads` (`id`, `lead_timestamp`, `lead_date`, `employee_name`, `account_name`, `platform_name`, `channel_link`, `client_username`, `comments`, `status`, `items`, `follow_up_date_with_remarks`, `reason_of_rejection`, `quality_of_lead`, `amount`, `admin_id_FK`, `employee_id_FK`) VALUES
(16, '2024-01-09 19:25:58', '2024-01-10', 'Usman Hameed', 'Olivia Stone', 'Discord', '-', 'zephimous_prime', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 1, 9),
(17, '2024-01-09 19:26:26', '2024-01-10', 'Usman Hameed', 'Rachel House', 'Discord', '-', 'jRockOfBerg', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 1, 9),
(18, '2024-01-09 19:27:44', '2024-01-10', 'Bilal Amir', 'Alice', 'Discord', '-', 'hydro', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 2, 0),
(19, '2024-01-09 19:28:08', '2024-01-10', 'Bilal Amir', 'Jane Morgolis', 'Discord', '-', 'confused kat', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 2, 0),
(20, '2024-01-09 20:02:31', '2024-01-10', 'Abdullah Baig', 'Sandra Rose', 'Discord', '-', 'bobthebob0517', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 3, 1),
(21, '2024-01-09 20:04:07', '2024-01-10', 'Abdullah Baig', 'Sandra Rose', 'Discord', '-', 'connor05l', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 3, 1),
(22, '2024-01-09 20:05:02', '2024-01-10', 'Abdullah Baig', 'Sandra Rose', 'Instagram', 'https://www.twitch.tv/midknightfable', 'midknightfable', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 3, 1),
(23, '2024-01-09 20:22:39', '2024-01-10', 'Abdullah Baig', 'Sandra Rose', 'Discord', '-', 'dsaadsad', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 3, 1),
(24, '2024-01-09 20:23:26', '2024-01-10', 'Ali Hyder', 'Alice', 'Instagram', 'www.twitchdsd', 'sadsadsa', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 4, 2),
(25, '2024-01-11 21:01:25', '2024-01-12', 'Usman Hameed', 'Alyxandra Carter', 'Discord', '-', 'vvv', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 1, 9),
(26, '2024-01-11 21:12:05', '2024-01-12', 'Abdullah Baig', 'Sandra Rose', 'Discord', '-', 'tsor_twang', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 3, 1),
(27, '2024-01-11 21:23:52', '2024-01-12', 'Bilal Amir', 'Alice', 'Discord', '-', 'macavellipirelli', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 2, 0),
(28, '2024-01-11 21:24:26', '2024-01-12', 'Bilal Amir', 'Alice', 'Discord', '-', 'goldberg1122', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 2, 0),
(29, '2024-01-11 22:41:38', '2024-01-12', 'Usman Hameed', 'Rachel House', 'Discord', '-', 'jmac091', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 1, 9),
(30, '2024-01-11 22:41:59', '2024-01-12', 'Usman Hameed', 'Rachel House', 'Discord', '-', 'mohrizz_', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 1, 9),
(31, '2024-01-11 22:50:23', '2024-01-12', 'Usman Hameed', 'Rachel House', 'Discord', '-', 'goldberg1122', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 1, 9),
(32, '2024-01-11 22:54:45', '2024-01-12', 'Usman Hameed', 'Rachel House', 'Discord', '-', 'reallyrealross', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 1, 9),
(33, '2024-01-11 22:59:00', '2024-01-12', 'Abdullah Baig', 'Sandra Rose', 'Discord', '-', 'xuziwrld', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 3, 1),
(34, '2024-01-11 23:29:28', '2024-01-12', 'Abdullah Baig', 'Sandra Rose', 'Discord', '-', 'rodneykilledyou', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 3, 1),
(35, '2024-01-12 19:34:17', '2024-01-13', 'Usman Hameed', 'Olivia Stone', 'Discord', '-', '00kyroz', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 1, 9),
(43, '2024-01-12 22:18:17', '2024-01-13', 'Usman Hameed', 'Olivia Stone', 'Discord', '-', 'wewe', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 1, 9),
(44, '2024-01-12 22:20:04', '2024-01-13', 'Usman Hameed', 'Alice', 'Discord', '-', 'sd', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 1, 9),
(45, '2024-01-12 22:20:31', '2024-01-13', 'Usman Hameed', 'Alyxandra Carter', 'Discord', '-', 'ddd', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 1, 9),
(46, '2024-01-12 22:25:14', '2024-01-13', 'Usman Hameed', 'Olivia Stone', 'Discord', '-', 'zzzz', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 1, 9),
(48, '2024-01-12 22:27:53', '2024-01-13', 'Bilal Amir', 'Alice', 'Discord', '-', 'vv', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 2, 0),
(49, '2024-01-12 22:28:13', '2024-01-13', 'Bilal Amir', 'Alyxandra Carter', 'Discord', '-', 'dfdf', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 2, 0),
(50, '2024-01-12 22:34:21', '2024-01-13', 'Usman Hameed', 'Olivia Stone', 'Discord', '-', 'thedarklord410', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 1, 9),
(51, '2024-01-12 22:35:04', '2024-01-13', 'Usman Hameed', 'Olivia Stone', 'Discord', '-', 'trippzy.', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 1, 9),
(52, '2024-01-12 22:37:36', '2024-01-13', 'Usman Hameed', 'Olivia Stone', 'Discord', '-', 'Flix_Clipz18#4331', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 1, 9),
(53, '2024-01-12 22:39:27', '2024-01-13', 'Bilal Amir', 'Amila James', 'Instagram', 'https://www.twitch.tv/gokrazystreamz', 'gokrazystreamz', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 2, 0),
(54, '2024-01-12 22:42:09', '2024-01-13', 'Bilal Amir', 'Alice', 'Discord', '-', 'oggouey', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 2, 0),
(55, '2024-01-12 22:45:00', '2024-01-13', 'Abdullah Baig', 'Sandra Rose', 'Discord', '-', 'shoot9427', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 3, 1),
(56, '2024-01-12 22:45:34', '2024-01-13', 'Abdullah Baig', 'Sandra Rose', 'Discord', '-', 'masterxxmits', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 3, 1),
(57, '2024-01-12 22:46:35', '2024-01-13', 'Bilal Amir', 'Alice', 'Instagram', 'https://www.twitch.tv/rafigaming284', 'rafigaming284', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 2, 0),
(58, '2024-01-13 00:12:26', '2024-01-13', 'Usman Hameed', 'Olivia Stone', 'Discord', '-', 'onlyfxnstv', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 1, 9),
(59, '2024-01-13 00:13:32', '2024-01-13', 'Usman Hameed', 'Olivia Stone', 'Discord', '-', 'babybackbs17_98886', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 1, 9),
(60, '2024-01-13 00:14:22', '2024-01-13', 'Bilal Amir', 'Alice', 'Discord', '-', 'juicy_ethic', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 2, 0),
(61, '2024-01-13 00:30:17', '2024-01-13', 'Abdullah Baig', 'Sandra Rose', 'Discord', '-', 'crimson564', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 3, 1),
(62, '2024-01-13 00:31:40', '2024-01-13', 'Usman Hameed', 'Olivia Stone', 'Discord', '-', 'onlyfxnstv', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 1, 9),
(63, '2024-01-13 00:34:34', '2024-01-13', 'Ali Hyder', 'Amila James', 'Discord', '-', 'xxapollo2001xx', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 4, 2),
(64, '2024-01-13 00:34:52', '2024-01-13', 'Ali Hyder', 'Amila James', 'Discord', '-', 'thedarklord410', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 4, 2),
(65, '2024-01-16 16:03:37', '2024-01-16', 'Usman Hameed', 'Rachel House', 'Discord', '-', 'lilbottgoose', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 1, 9),
(66, '2024-01-16 16:08:46', '2024-01-16', 'Usman Hameed', 'Olivia Stone', 'Discord', '-', '.shadowscorpion', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 1, 9),
(67, '2024-01-16 17:28:23', '2024-01-16', 'Bilal Amir', 'Alice', 'Discord', '-', 'syxo8009', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 2, 0),
(68, '2024-01-16 17:29:39', '2024-01-16', 'Bilal Amir', 'Alice', 'Discord', '-', 'montoya1627', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 2, 0),
(69, '2024-01-16 19:01:39', '2024-01-17', 'Usman Hameed', 'Olivia Stone', 'Discord', '-', 'donjulio8832', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 1, 9),
(70, '2024-01-16 19:37:09', '2024-01-17', 'Ali Hyder', 'Amelia Grace', 'Discord', '-', 'icyproman', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 4, 2),
(71, '2024-01-16 19:37:21', '2024-01-17', 'Ali Hyder', 'Amelia Grace', 'Discord', '-', 'jojo5891', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 4, 2),
(72, '2024-01-16 19:37:30', '2024-01-17', 'Ali Hyder', 'Amelia Grace', 'Discord', '-', 't.spears', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 4, 2),
(73, '2024-01-16 19:37:56', '2024-01-17', 'Ali Hyder', 'Amelia Grace', 'Instagram', 'https://www.twitch.tv/sikwidityo', 'sikwidityo', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 4, 2),
(74, '2024-01-16 22:45:33', '2024-01-17', 'Abdullah Baig', 'Sandra Rose', 'Discord', '-', 'jave121_q121', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 3, 1),
(75, '2024-01-16 22:45:46', '2024-01-17', 'Abdullah Baig', 'Sandra Rose', 'Discord', '-', 'vampireboylestat', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 3, 1),
(76, '2024-01-16 22:46:02', '2024-01-17', 'Abdullah Baig', 'Sandra Rose', 'Discord', '-', 'jaxerial', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 3, 1),
(77, '2024-01-16 22:47:37', '2024-01-17', 'Abdullah Baig', 'Sandra Rose', 'Discord', '-', 'justinvibey', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 3, 1),
(78, '2024-01-16 22:48:47', '2024-01-17', 'Abdullah Baig', 'Sandra Rose', 'Instagram', 'https://www.twitch.tv/sikwidityo', 'sikwidityo', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 3, 1),
(79, '2024-01-17 07:20:00', '2024-01-17', 'Usman Hameed', 'Olivia Stone', 'Discord', '-', 'zenix', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 1, 9),
(80, '2024-01-17 07:22:02', '2024-01-17', 'Usman Hameed', 'Olivia Stone', 'Discord', '-', 'kevin', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 1, 9),
(81, '2024-01-17 07:22:51', '2024-01-17', 'Usman Hameed', 'Everly Parker', 'Discord', '-', 'noir', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 1, 9),
(82, '2024-01-17 17:35:33', '2024-01-17', 'Usman Hameed', 'Olivia Stone', 'Discord', '-', '_yetigaming', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 1, 9),
(83, '2024-01-17 17:35:43', '2024-01-17', 'Usman Hameed', 'Olivia Stone', 'Discord', '-', '.spugz', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 1, 9),
(84, '2024-01-17 21:09:31', '2024-01-18', 'Usman Hameed', 'Olivia Stone', 'Discord', '-', 'brian.likethat', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 1, 9),
(85, '2024-01-17 21:11:12', '2024-01-18', 'Usman Hameed', 'Olivia Stone', 'Discord', '-', 'uamascot', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 1, 9),
(86, '2024-01-17 21:11:22', '2024-01-18', 'Usman Hameed', 'Olivia Stone', 'Discord', '-', 'jamesmarston50', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 1, 9),
(87, '2024-01-17 21:34:46', '2024-01-18', 'Abdullah Baig', 'Sandra Rose', 'Instagram', 'https://www.twitch.tv/winter586', '_.winter7990', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 3, 1),
(88, '2024-01-17 21:35:10', '2024-01-18', 'Abdullah Baig', 'Sandra Rose', 'Instagram', 'https://www.twitch.tv/reshinari', 'reshinarigames', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 3, 1),
(89, '2024-01-17 21:35:39', '2024-01-18', 'Abdullah Baig', 'Olivia Stone', 'Instagram', 'https://www.twitch.tv/maddengod931', 'mr_dontmiss931', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 3, 1),
(90, '2024-01-17 21:35:58', '2024-01-18', 'Abdullah Baig', 'Sandra Rose', 'Discord', '-', 'actuateddock97', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 3, 1),
(91, '2024-01-17 21:36:38', '2024-01-18', 'Ali Hyder', 'Amelia Grace', 'Discord', '-', 'vegitto5280', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 4, 2),
(92, '2024-01-17 21:36:56', '2024-01-18', 'Ali Hyder', 'Savannah Mendes', 'Discord', '-', 'jamesmarston50', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 4, 2),
(93, '2024-01-17 21:37:21', '2024-01-18', 'Ali Hyder', 'Amelia Grace', 'Discord', '-', 'itsmebloo', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 4, 2),
(94, '2024-01-17 21:37:30', '2024-01-18', 'Ali Hyder', 'Amelia Grace', 'Discord', '-', 'him1323', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 4, 2),
(95, '2024-01-17 21:37:48', '2024-01-18', 'Bilal Amir', 'Alice', 'Discord', '-', 'creamboymarley94', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 2, 0),
(96, '2024-01-17 21:37:59', '2024-01-18', 'Bilal Amir', 'Alice', 'Discord', '-', 'blitz12399', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 2, 0),
(97, '2024-01-17 21:38:08', '2024-01-18', 'Bilal Amir', 'Alice', 'Discord', '-', 'dell3597', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 2, 0),
(98, '2024-01-17 21:38:20', '2024-01-18', 'Bilal Amir', 'Alice', 'Discord', '-', 'kirbyyrock', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 2, 0),
(99, '2024-01-18 17:11:10', '2024-01-18', 'Usman Hameed', 'Olivia Stone', 'Discord', '-', 'drastic876', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 1, 9),
(100, '2024-01-18 17:11:22', '2024-01-18', 'Usman Hameed', 'Olivia Stone', 'Discord', '-', 'projekt#0418', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 1, 9),
(101, '2024-01-18 17:11:33', '2024-01-18', 'Usman Hameed', 'Olivia Stone', 'Discord', '-', 'youknowtyreek', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 1, 9),
(102, '2024-01-18 17:11:56', '2024-01-18', 'Usman Hameed', 'Olivia Stone', 'Discord', '-', 'gettinwhusdue', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 1, 9),
(103, '2024-01-18 17:12:09', '2024-01-18', 'Usman Hameed', 'Olivia Stone', 'Discord', '-', 'jamiettv', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 1, 9),
(104, '2024-01-18 17:26:35', '2024-01-18', 'Abdullah Baig', 'Sandra Rose', 'Discord', '-', 'lovedaprince', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 3, 1),
(105, '2024-01-18 17:26:46', '2024-01-18', 'Abdullah Baig', 'Sandra Rose', 'Discord', '-', 'xuziwrld', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 3, 1),
(106, '2024-01-18 17:26:55', '2024-01-18', 'Abdullah Baig', 'Sandra Rose', 'Discord', '-', 'niknak09', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 3, 1),
(107, '2024-01-18 17:27:16', '2024-01-18', 'Abdullah Baig', 'Sandra Rose', 'Discord', '-', 'deadlyz_', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 3, 1),
(108, '2024-01-18 17:39:09', '2024-01-18', 'Abdullah Baig', 'Sandra Rose', 'Instagram', 'https://www.twitch.tv/el_kronic', 'el_kronic', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 3, 1),
(109, '2024-01-18 18:07:41', '2024-01-18', 'Bilal Amir', 'Alice', 'Discord', '-', 'breyux', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 2, 0),
(110, '2024-01-18 18:07:51', '2024-01-18', 'Bilal Amir', 'Alice', 'Discord', '-', 'millie0406', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 2, 0),
(111, '2024-01-18 18:07:58', '2024-01-18', 'Bilal Amir', 'Alice', 'Discord', '-', 'YTkingseth#4075', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 2, 0),
(112, '2024-01-18 18:08:09', '2024-01-18', 'Bilal Amir', 'Alice', 'Discord', '-', 'timthesnackman', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 2, 0),
(113, '2024-01-18 18:16:46', '2024-01-18', 'Ali Hyder', 'Amelia Grace', 'Discord', '-', 'banglude', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 4, 2),
(114, '2024-01-18 18:17:05', '2024-01-18', 'Ali Hyder', 'Amelia Grace', 'Discord', '-', 'swdy', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 4, 2),
(115, '2024-01-18 18:17:13', '2024-01-18', 'Ali Hyder', 'Amelia Grace', 'Discord', '-', 'zestyranch2', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 4, 2),
(116, '2024-01-18 18:17:22', '2024-01-18', 'Ali Hyder', 'Alice', 'Discord', '-', 'ravenwinters', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 4, 2),
(117, '2024-01-18 18:17:32', '2024-01-18', 'Ali Hyder', 'Amelia Grace', 'Discord', '-', 'officerharper', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 4, 2),
(118, '2024-01-18 18:17:53', '2024-01-18', 'Ali Hyder', 'Amelia Grace', 'Discord', '-', 'electroyello', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 4, 2),
(119, '2024-01-18 18:18:03', '2024-01-18', 'Ali Hyder', 'Amelia Grace', 'Discord', '-', 'reallyrealross', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 4, 2),
(120, '2024-01-18 18:18:13', '2024-01-18', 'Ali Hyder', 'Amelia Grace', 'Discord', '-', 'hothead24', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 4, 2),
(121, '2024-01-18 18:18:38', '2024-01-18', 'Ali Hyder', 'Savannah Mendes', 'Discord', '-', 'freakyd3akyslime', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 4, 2),
(122, '2024-01-18 18:33:13', '2024-01-18', 'Usman Hameed', 'Olivia Stone', 'Discord', '-', 'callofthegoods', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 1, 9),
(123, '2024-01-18 18:33:24', '2024-01-18', 'Usman Hameed', 'Olivia Stone', 'Discord', '-', 'mister_chino', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 1, 9),
(124, '2024-01-18 19:50:01', '2024-01-19', 'Usman Hameed', 'Olivia Stone', 'Discord', '-', 'iamzy16', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 1, 9),
(125, '2024-01-18 19:50:13', '2024-01-19', 'Usman Hameed', 'Olivia Stone', 'Discord', '-', 'coolcat2258', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 1, 9),
(126, '2024-01-18 19:50:24', '2024-01-19', 'Usman Hameed', 'Olivia Stone', 'Discord', '-', 'pezz66', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 1, 9),
(127, '2024-01-18 19:50:33', '2024-01-19', 'Usman Hameed', 'Olivia Stone', 'Discord', '-', 'ghostrhino07', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 1, 9),
(128, '2024-01-18 19:51:02', '2024-01-19', 'Usman Hameed', 'Olivia Stone', 'Discord', '-', 'atrohimself', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 1, 9),
(129, '2024-01-18 19:51:13', '2024-01-19', 'Usman Hameed', 'Olivia Stone', 'Discord', '-', 'youcallmeaashik', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 1, 9),
(130, '2024-01-18 19:51:22', '2024-01-19', 'Usman Hameed', 'Olivia Stone', 'Discord', '-', 'shivyi', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 1, 9),
(131, '2024-01-18 19:51:32', '2024-01-19', 'Usman Hameed', 'Olivia Stone', 'Discord', '-', 'darkmoon_700', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 1, 9),
(132, '2024-01-18 19:52:08', '2024-01-19', 'Usman Hameed', 'Olivia Stone', 'Discord', '-', 'blacktsukuyomi', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 1, 9),
(133, '2024-01-18 19:52:39', '2024-01-19', 'Usman Hameed', 'Olivia Stone', 'Discord', '-', 'skelator_sama', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 1, 9),
(134, '2024-01-18 19:53:09', '2024-01-19', 'Usman Hameed', 'Olivia Stone', 'Discord', '-', 'fancierkill3r', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 1, 9),
(135, '2024-01-18 19:53:27', '2024-01-19', 'Usman Hameed', 'Olivia Stone', 'Discord', '-', 'jaymorrg', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 1, 9),
(136, '2024-01-18 19:54:33', '2024-01-19', 'Abdullah Baig', 'Sandra Rose', 'Discord', '-', 'jeoelovesvana', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 3, 1),
(137, '2024-01-18 19:54:41', '2024-01-19', 'Abdullah Baig', 'Sandra Rose', 'Discord', '-', '187b.i.g.', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 3, 1),
(138, '2024-01-18 19:54:53', '2024-01-19', 'Abdullah Baig', 'Sandra Rose', 'Discord', '-', 'ghost04142', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 3, 1),
(139, '2024-01-18 19:55:06', '2024-01-19', 'Abdullah Baig', 'Sandra Rose', 'Discord', '-', 'owenalexcutt', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 3, 1),
(140, '2024-01-18 19:55:22', '2024-01-19', 'Abdullah Baig', 'Sandra Rose', 'Discord', '-', 'mando5kyt', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 3, 1),
(141, '2024-01-18 19:55:52', '2024-01-19', 'Abdullah Baig', 'Sandra Rose', 'Discord', '-', 'lovinghimwasred', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 3, 1),
(142, '2024-01-18 19:56:02', '2024-01-19', 'Abdullah Baig', 'Sandra Rose', 'Discord', '-', 'bloody2001', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 3, 1),
(143, '2024-01-18 19:56:11', '2024-01-19', 'Abdullah Baig', 'Sandra Rose', 'Discord', '-', 'sgt_jackcole', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 3, 1),
(144, '2024-01-18 19:56:21', '2024-01-19', 'Abdullah Baig', 'Sandra Rose', 'Discord', '-', 'lonelys_pc_11332', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 3, 1),
(145, '2024-01-18 19:56:39', '2024-01-19', 'Abdullah Baig', 'Sandra Rose', 'Discord', '-', 'sakuma_727', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 3, 1),
(146, '2024-01-18 19:56:49', '2024-01-19', 'Abdullah Baig', 'Sandra Rose', 'Discord', '-', 'kingtragik', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 3, 1),
(147, '2024-01-18 19:57:32', '2024-01-19', 'Abdullah Baig', 'Sandra Rose', 'Discord', '-', 'dewyy222', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 3, 1),
(148, '2024-01-18 19:57:41', '2024-01-19', 'Abdullah Baig', 'Sandra Rose', 'Discord', '-', 'ashzane07', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 3, 1),
(149, '2024-01-18 19:57:53', '2024-01-19', 'Abdullah Baig', 'Sandra Rose', 'Discord', '-', 'fgmahye', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 3, 1),
(150, '2024-01-18 19:58:02', '2024-01-19', 'Abdullah Baig', 'Sandra Rose', 'Discord', '-', 'flare_11.', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 3, 1),
(151, '2024-01-18 19:58:23', '2024-01-19', 'Abdullah Baig', 'Sandra Rose', 'Discord', '-', '.elpatron420', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 3, 1),
(152, '2024-01-18 20:02:59', '2024-01-19', 'Ali Hyder', 'Amelia Grace', 'Discord', '-', 'bankrollcody', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 4, 2),
(153, '2024-01-18 20:03:23', '2024-01-19', 'Ali Hyder', 'Amelia Grace', 'Discord', '-', 'leesmad', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 4, 2),
(154, '2024-01-18 20:03:34', '2024-01-19', 'Ali Hyder', 'Amelia Grace', 'Discord', '-', 'storm_pooper', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 4, 2),
(155, '2024-01-18 20:03:42', '2024-01-19', 'Ali Hyder', 'Amelia Grace', 'Discord', '-', 'callme_daddy22', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 4, 2),
(156, '2024-01-18 20:03:53', '2024-01-19', 'Ali Hyder', 'Amelia Grace', 'Discord', '-', 'ale03029', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 4, 2),
(157, '2024-01-18 20:04:01', '2024-01-19', 'Ali Hyder', 'Amelia Grace', 'Discord', '-', 'orb6303', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 4, 2),
(158, '2024-01-18 20:04:10', '2024-01-19', 'Ali Hyder', 'Amelia Grace', 'Discord', '-', 'c.j06', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 4, 2),
(159, '2024-01-18 20:04:20', '2024-01-19', 'Ali Hyder', 'Amelia Grace', 'Discord', '-', 'readorread', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 4, 2),
(160, '2024-01-18 20:04:44', '2024-01-19', 'Ali Hyder', 'Amelia Grace', 'Discord', '-', 'norwal99', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 4, 2),
(161, '2024-01-18 20:05:24', '2024-01-19', 'Ali Hyder', 'Amelia Grace', 'Discord', '-', 'elpatron420', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 4, 2),
(162, '2024-01-18 20:07:12', '2024-01-19', 'Bilal Amir', 'Alice', 'Discord', '-', 'works._', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 2, 0),
(163, '2024-01-18 20:07:22', '2024-01-19', 'Bilal Amir', 'Alice', 'Discord', '-', 'springbokke_za', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 2, 0),
(164, '2024-01-18 20:07:31', '2024-01-19', 'Bilal Amir', 'Alice', 'Discord', '-', 'talkedtuna', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 2, 0),
(165, '2024-01-18 20:07:41', '2024-01-19', 'Bilal Amir', 'Alice', 'Discord', '-', 'himithythe3rd', 'Waiting for a response', 'Rejected', '-', '-', '-', 'Pending', 0, 2, 0),
(166, '2024-01-18 20:07:49', '2024-01-19', 'Bilal Amir', 'Alice', 'Discord', '-', 'trivoy', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 2, 0),
(167, '2024-01-18 20:07:57', '2024-01-19', 'Bilal Amir', 'Alice', 'Discord', '-', 'mh_boogie', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 2, 0),
(168, '2024-01-18 20:08:06', '2024-01-19', 'Bilal Amir', 'Alice', 'Discord', '-', 'ghostfaceishigh', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 2, 0),
(169, '2024-01-18 20:08:15', '2024-01-19', 'Bilal Amir', 'Alice', 'Discord', '-', 'Leo_HilowZzz#9301', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 2, 0),
(170, '2024-01-18 20:08:40', '2024-01-19', 'Bilal Amir', 'Alice', 'Instagram', 'https://www.twitch.tv/zvezdaphofficial', 'zvezdaphartist_97', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 2, 0),
(171, '2024-01-18 20:31:27', '2024-01-19', 'Ali Hyder', 'Amelia Grace', 'Discord', '-', 'jason04302', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 4, 2),
(172, '2024-01-18 20:40:02', '2024-01-19', 'Usman Hameed', 'Olivia Stone', 'Discord', '-', 'drastic876', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 1, 9),
(173, '2024-01-19 18:55:54', '2024-01-19', 'Abdullah Baig', 'Sandra Rose', 'Discord', '-', 'stutterparker', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 3, 1),
(174, '2024-01-19 18:57:53', '2024-01-19', 'Ali Hyder', 'Rachel House', 'Instagram', 'twich.https://www.twitch.tv/didyou_likethat', 'ill Gaming', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 4, 2),
(175, '2024-01-19 19:02:19', '2024-01-20', 'Usman Hameed', 'Olivia Stone', 'Discord', '-', 'waffle2446', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 1, 9),
(176, '2024-01-19 19:03:05', '2024-01-20', 'Usman Hameed', 'Olivia Stone', 'Discord', '-', 'jok3rzv3nom605', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 1, 9),
(177, '2024-01-19 20:08:45', '2024-01-20', 'Usman Hameed', 'Olivia Stone', 'Discord', '-', 'jakove84', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 1, 9),
(178, '2024-01-19 20:08:57', '2024-01-20', 'Usman Hameed', 'Olivia Stone', 'Discord', '-', 'scorch1220', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 1, 9),
(179, '2024-01-19 20:09:24', '2024-01-20', 'Usman Hameed', 'Olivia Stone', 'Discord', '-', 'smezan', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 1, 9),
(180, '2024-01-19 20:12:21', '2024-01-20', 'Usman Hameed', 'Olivia Stone', 'Discord', '-', 'abufihamat', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 1, 9),
(181, '2024-01-19 20:12:33', '2024-01-20', 'Usman Hameed', 'Olivia Stone', 'Discord', '-', 'iceonplane', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 1, 9),
(182, '2024-01-19 20:21:22', '2024-01-20', 'Abdullah Baig', 'Sandra Rose', 'Instagram', 'https://www.twitch.tv/sanitherebel', 'sanitherebel ', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 3, 1),
(183, '2024-01-19 20:22:05', '2024-01-20', 'Abdullah Baig', 'Sandra Rose', 'Instagram', 'https://www.twitch.tv/bigwaynebiggie', 'playboiwayne2.0 ', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 3, 1),
(184, '2024-01-19 20:22:51', '2024-01-20', 'Abdullah Baig', 'Sandra Rose', 'Instagram', 'https://www.twitch.tv/amishrobot33', 'tristenhancock ', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 3, 1),
(185, '2024-01-19 20:23:20', '2024-01-20', 'Abdullah Baig', 'Sandra Rose', 'Discord', '-', 'backendchildr', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 3, 1),
(186, '2024-01-19 20:24:54', '2024-01-20', 'Abdullah Baig', 'Sandra Rose', 'Discord', '-', 'fatboi42069_', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 3, 1),
(187, '2024-01-19 20:25:03', '2024-01-20', 'Abdullah Baig', 'Sandra Rose', 'Discord', '-', 'jbillions', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 3, 1),
(188, '2024-01-19 20:25:16', '2024-01-20', 'Abdullah Baig', 'Sandra Rose', 'Discord', '-', 'dabluedemon', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 3, 1),
(189, '2024-01-19 20:26:37', '2024-01-20', 'Abdullah Baig', 'Sandra Rose', 'Discord', '-', '.dragonmaster276', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 3, 1),
(190, '2024-01-19 20:30:00', '2024-01-20', 'Ali Hyder', 'Amelia Grace', 'Discord', '-', 'ribs#7494', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 4, 2),
(191, '2024-01-19 20:30:15', '2024-01-20', 'Ali Hyder', 'Amelia Grace', 'Discord', '-', 'muyiwr', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 4, 2),
(192, '2024-01-19 20:30:25', '2024-01-20', 'Ali Hyder', 'Amelia Grace', 'Discord', '-', 'mbam119', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 4, 2),
(193, '2024-01-19 20:30:36', '2024-01-20', 'Ali Hyder', 'Amelia Grace', 'Discord', '-', 'biggbankuchie305', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 4, 2),
(194, '2024-01-19 20:31:43', '2024-01-20', 'Ali Hyder', 'Savannah Mendes', 'Discord', '-', '3kneebleeder', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 4, 2),
(195, '2024-01-19 20:31:53', '2024-01-20', 'Ali Hyder', 'Savannah Mendes', 'Discord', '-', 'imyunilol', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 4, 2),
(196, '2024-01-19 20:32:07', '2024-01-20', 'Ali Hyder', 'Savannah Mendes', 'Discord', '-', 'jjmakavelli', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 4, 2),
(197, '2024-01-20 00:05:38', '2024-01-20', 'Bilal Amir', 'Alice', 'Discord', '-', 'jayjonesent', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 2, 0),
(198, '2024-01-20 00:05:48', '2024-01-20', 'Bilal Amir', 'Alice', 'Discord', '-', 'tiktok__srantech', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 2, 0),
(199, '2024-01-20 00:09:09', '2024-01-20', 'Bilal Amir', 'Alice', 'Discord', '-', 'luckytay.', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 2, 0),
(200, '2024-01-20 00:09:20', '2024-01-20', 'Bilal Amir', 'Alice', 'Discord', '-', 'spicytoxic', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 2, 0),
(201, '2024-01-20 00:09:30', '2024-01-20', 'Bilal Amir', 'Alice', 'Discord', '-', 'inotknow', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 2, 0),
(202, '2024-01-20 00:09:40', '2024-01-20', 'Bilal Amir', 'Alice', 'Discord', '-', 'danielanderline', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 2, 0),
(203, '2024-01-20 00:09:51', '2024-01-20', 'Bilal Amir', 'Alice', 'Discord', '-', 'desiigner_k54', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 2, 0),
(204, '2024-01-20 00:10:22', '2024-01-20', 'Bilal Amir', 'Alice', 'Discord', '-', 'brightervision', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 2, 0),
(205, '2024-01-20 00:10:31', '2024-01-20', 'Bilal Amir', 'Alice', 'Discord', '-', 'tacticalmaskedman', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 2, 0),
(206, '2024-01-20 00:10:54', '2024-01-20', 'Bilal Amir', 'Alice', 'Instagram', 'https://www.twitch.tv/zaaydripp', 'zaaydrippin', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 2, 0),
(207, '2024-01-22 17:49:59', '2024-01-22', 'Usman Hameed', 'Olivia Stone', 'Discord', '-', 'bigclandj', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 1, 9),
(208, '2024-01-22 17:50:13', '2024-01-22', 'Usman Hameed', 'Olivia Stone', 'Discord', '-', 'veggieman791', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 1, 9),
(209, '2024-01-22 17:50:23', '2024-01-22', 'Usman Hameed', 'Olivia Stone', 'Discord', '-', 'yngdmoney', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 1, 9),
(210, '2024-01-22 17:50:32', '2024-01-22', 'Usman Hameed', 'Olivia Stone', 'Discord', '-', 'bluejay.666#3449', 'No response', 'Pending', '-', '-', '-', 'Pending', 0, 1, 9),
(211, '2024-01-22 17:50:45', '2024-01-22', 'Usman Hameed', 'Olivia Stone', 'Discord', '-', 'godfreytheravenous', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 1, 9),
(212, '2024-01-22 17:51:10', '2024-01-22', 'Usman Hameed', 'Olivia Stone', 'Discord', '-', 'shadramadrox', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 1, 9),
(213, '2024-01-22 17:51:19', '2024-01-22', 'Usman Hameed', 'Olivia Stone', 'Discord', '-', 'desmos75', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 1, 9),
(214, '2024-01-22 17:51:35', '2024-01-22', 'Usman Hameed', 'Olivia Stone', 'Discord', '-', 'thats_me123', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 1, 9),
(215, '2024-01-22 17:51:46', '2024-01-22', 'Usman Hameed', 'Olivia Stone', 'Discord', '-', 'lols31', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 1, 9),
(216, '2024-01-22 17:52:16', '2024-01-22', 'Usman Hameed', 'Olivia Stone', 'Discord', '-', 'm_without_the_j', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 1, 9),
(217, '2024-01-22 17:55:06', '2024-01-22', 'Abdullah Baig', 'Sandra Rose', 'Instagram', 'https://www.twitch.tv/zxc9920', 'realzxc99', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 3, 1),
(218, '2024-01-22 17:55:31', '2024-01-22', 'Abdullah Baig', 'Sandra Rose', 'Instagram', 'https://www.twitch.tv/g23456789nnnnn', 'benjamin_willhoit', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 3, 1),
(219, '2024-01-22 17:56:02', '2024-01-22', 'Abdullah Baig', 'Sandra Rose', 'Discord', '-', 'dtbdrizzi', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 3, 1),
(220, '2024-01-22 17:56:14', '2024-01-22', 'Abdullah Baig', 'Sandra Rose', 'Discord', '-', 'llandon2011', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 3, 1),
(221, '2024-01-22 17:56:26', '2024-01-22', 'Abdullah Baig', 'Sandra Rose', 'Discord', '-', 'coltwallace', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 3, 1),
(222, '2024-01-22 17:56:41', '2024-01-22', 'Abdullah Baig', 'Sandra Rose', 'Discord', '-', 'miamews', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 3, 1),
(223, '2024-01-22 17:57:11', '2024-01-22', 'Abdullah Baig', 'Sandra Rose', 'Discord', '-', 'rim_pro10', 'Logo & Banner', 'Pending', '-', '-', '-', 'Pending', 0, 3, 1),
(224, '2024-01-22 17:57:39', '2024-01-22', 'Abdullah Baig', 'Sandra Rose', 'Discord', '-', 'makkisobtop', 'Logo & Banner', 'Closed', '-', '-', '-', 'Qualified', 145, 3, 1),
(225, '2024-01-22 17:57:48', '2024-01-22', 'Abdullah Baig', 'Sandra Rose', 'Discord', '-', '0nlyinsomnia', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 3, 1),
(226, '2024-01-22 17:58:14', '2024-01-22', 'Ali Hyder', 'Amelia Grace', 'Discord', '-', 'pwrclipz', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 4, 2),
(227, '2024-01-22 17:58:28', '2024-01-22', 'Ali Hyder', 'Amelia Grace', 'Discord', '-', 'vortexgaming_10101', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 4, 2),
(228, '2024-01-22 17:58:40', '2024-01-22', 'Ali Hyder', 'Amelia Grace', 'Discord', '-', 'lookatthisdude6182', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 4, 2),
(229, '2024-01-22 17:58:49', '2024-01-22', 'Ali Hyder', 'Amelia Grace', 'Discord', '-', 'yaboilunatic', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 4, 2),
(230, '2024-01-22 17:58:58', '2024-01-22', 'Ali Hyder', 'Amelia Grace', 'Discord', '-', 'fallen_matt', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 4, 2),
(231, '2024-01-22 17:59:07', '2024-01-22', 'Ali Hyder', 'Amelia Grace', 'Discord', '-', 'bigshortydee', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 4, 2),
(232, '2024-01-22 17:59:17', '2024-01-22', 'Ali Hyder', 'Amelia Grace', 'Discord', '-', 's3nk3m', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 4, 2),
(233, '2024-01-22 17:59:37', '2024-01-22', 'Ali Hyder', 'Amelia Grace', 'Discord', '-', 'amagkilleralpha', 'Logo & Banner', 'Pending', '-', '-', '-', 'Pending', 0, 4, 2),
(234, '2024-01-22 17:59:50', '2024-01-22', 'Ali Hyder', 'Amelia Grace', 'Discord', '-', 'dacookiekiller', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 4, 2),
(235, '2024-01-22 18:01:54', '2024-01-22', 'Bilal Amir', 'Alice', 'Discord', '-', 'tybreezy.', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 2, 0),
(236, '2024-01-22 18:02:03', '2024-01-22', 'Bilal Amir', 'Alice', 'Discord', '-', 'wrldwde3jay', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 2, 0),
(237, '2024-01-22 18:02:12', '2024-01-22', 'Bilal Amir', 'Alice', 'Discord', '-', 'kingmason217', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 2, 0),
(238, '2024-01-22 18:02:24', '2024-01-22', 'Bilal Amir', 'Alice', 'Discord', '-', 'tacticalhvac', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 2, 0),
(239, '2024-01-22 18:02:31', '2024-01-22', 'Bilal Amir', 'Alice', 'Discord', '-', 'iluvgothsnmoms', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 2, 0),
(240, '2024-01-22 18:02:40', '2024-01-22', 'Bilal Amir', 'Alice', 'Discord', '-', 'kiwiiiiiiiiiiiiiiiii', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 2, 0),
(241, '2024-01-22 18:02:49', '2024-01-22', 'Bilal Amir', 'Alice', 'Discord', '-', 'richrogers', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 2, 0),
(242, '2024-01-22 18:03:01', '2024-01-22', 'Bilal Amir', 'Alice', 'Discord', '-', 'stonedraccoon', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 2, 0),
(243, '2024-01-22 18:03:22', '2024-01-22', 'Bilal Amir', 'Alice', 'Discord', '-', 'multipak3487', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 2, 0),
(244, '2024-01-22 18:03:30', '2024-01-22', 'Bilal Amir', 'Alice', 'Discord', '-', 'wavyx3ddy', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 2, 0),
(245, '2024-01-22 18:03:39', '2024-01-22', 'Bilal Amir', 'Alice', 'Discord', '-', 'tsaiur', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 2, 0),
(246, '2024-01-22 18:03:47', '2024-01-22', 'Bilal Amir', 'Alice', 'Discord', '-', 'dracooo#5705', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 2, 0),
(247, '2024-01-22 21:28:22', '2024-01-23', 'Usman Hameed', 'Olivia Stone', 'Discord', '-', 'kaylaniiK', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 1, 9),
(248, '2024-01-22 23:25:35', '2024-01-23', 'Usman Hameed', 'Olivia Stone', 'Discord', '-', 'deafbluesniper', 'Logo & Banner', 'Pending', '-', '-', '-', 'Pending', 0, 1, 9),
(249, '2024-01-22 23:26:25', '2024-01-23', 'Usman Hameed', 'Olivia Stone', 'Discord', '-', 'flashflynn07', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 1, 9),
(250, '2024-01-22 23:35:21', '2024-01-23', 'Adnan Ahmed', 'Camila Addison', 'Discord', '-', '.pusha.', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 12, 15),
(251, '2024-01-22 23:35:36', '2024-01-23', 'Adnan Ahmed', 'Camila Addison', 'Discord', '-', '260eson', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 12, 15),
(252, '2024-01-22 23:35:46', '2024-01-23', 'Adnan Ahmed', 'Camila Addison', 'Discord', '-', 'deafbluesniper', 'Logo & Banner', 'Pending', '-', '-', '-', 'Pending', 0, 12, 15),
(253, '2024-01-23 00:32:29', '2024-01-23', 'Usman Hameed', 'Olivia Stone', 'Discord', '-', 'clutchkickers', 'Logo & Overlay', 'Closed', '-', '-', '-', 'Qualified', 285, 1, 9),
(254, '2024-01-23 18:23:49', '2024-01-23', 'Usman Hameed', 'Olivia Stone', 'Discord', '-', 'xjwz', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 1, 9),
(255, '2024-01-23 18:24:00', '2024-01-23', 'Usman Hameed', 'Olivia Stone', 'Discord', '-', 'gh_ak47', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 1, 9),
(256, '2024-01-23 18:24:12', '2024-01-23', 'Usman Hameed', 'Olivia Stone', 'Discord', '-', 'devinxsparkles', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 1, 9),
(257, '2024-01-23 18:24:24', '2024-01-23', 'Usman Hameed', 'Olivia Stone', 'Discord', '-', 'mrs_azbo', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 1, 9),
(258, '2024-01-23 18:24:34', '2024-01-23', 'Usman Hameed', 'Olivia Stone', 'Discord', '-', 'jaxonthesushislice', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 1, 9),
(259, '2024-01-23 18:26:09', '2024-01-23', 'Abdullah Baig', 'Sandra Rose', 'Discord', '-', 'anti0ne7', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 3, 1),
(260, '2024-01-23 18:26:17', '2024-01-23', 'Abdullah Baig', 'Sandra Rose', 'Discord', '-', 'zshavair', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 3, 1),
(261, '2024-01-23 18:26:29', '2024-01-23', 'Abdullah Baig', 'Sandra Rose', 'Discord', '-', 'lewis5095', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 3, 1),
(262, '2024-01-23 18:26:46', '2024-01-23', 'Abdullah Baig', 'Sandra Rose', 'Discord', '-', 'vibrantdiamond18', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 3, 1),
(263, '2024-01-23 18:27:09', '2024-01-23', 'Abdullah Baig', 'Sandra Rose', 'Discord', '-', 'werewolfking_25948', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 3, 1),
(264, '2024-01-23 18:28:40', '2024-01-23', 'Abdullah Baig', 'Sandra Rose', 'Discord', '-', 'zuvah', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 3, 1),
(265, '2024-01-23 18:28:54', '2024-01-23', 'Abdullah Baig', 'Sandra Rose', 'Discord', '-', 'm106', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 3, 1),
(266, '2024-01-23 18:29:02', '2024-01-23', 'Abdullah Baig', 'Sandra Rose', 'Discord', '-', 'bigbossbentley', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 3, 1),
(267, '2024-01-23 18:29:14', '2024-01-23', 'Abdullah Baig', 'Sandra Rose', 'Discord', '-', 'jackkfoyy', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 3, 1),
(268, '2024-01-23 18:29:30', '2024-01-23', 'Abdullah Baig', 'Sandra Rose', 'Discord', '-', 'taynhl', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 3, 1),
(269, '2024-01-23 18:29:42', '2024-01-23', 'Abdullah Baig', 'Sandra Rose', 'Discord', '-', 'anti0ne7', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 3, 1),
(270, '2024-01-23 18:31:01', '2024-01-23', 'Ali Hyder', 'Amelia Grace', 'Discord', '-', 'htx.sergio99', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 4, 2),
(271, '2024-01-23 18:31:09', '2024-01-23', 'Ali Hyder', 'Amelia Grace', 'Discord', '-', 'ghostostupid', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 4, 2),
(272, '2024-01-23 18:31:19', '2024-01-23', 'Ali Hyder', 'Amelia Grace', 'Discord', '-', 'jswag3616', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 4, 2),
(273, '2024-01-23 18:31:31', '2024-01-23', 'Ali Hyder', 'Amelia Grace', 'Discord', '-', 'flashflynn07', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 4, 2),
(274, '2024-01-23 18:31:41', '2024-01-23', 'Ali Hyder', 'Amelia Grace', 'Discord', '-', 'deafbluesniper', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 4, 2),
(275, '2024-01-23 18:31:52', '2024-01-23', 'Ali Hyder', 'Amelia Grace', 'Discord', '-', '260eson', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 4, 2),
(276, '2024-01-23 18:32:00', '2024-01-23', 'Ali Hyder', 'Amelia Grace', 'Discord', '-', '.pusha.', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 4, 2),
(277, '2024-01-23 18:32:18', '2024-01-23', 'Ali Hyder', 'Amelia Grace', 'Discord', '-', 'ALghost8119', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 4, 2),
(278, '2024-01-23 18:32:27', '2024-01-23', 'Ali Hyder', 'Amelia Grace', 'Discord', '-', 'abe.hm', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 4, 2),
(279, '2024-01-23 18:32:37', '2024-01-23', 'Ali Hyder', 'Amelia Grace', 'Discord', '-', 'missbibbs', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 4, 2),
(280, '2024-01-23 18:33:59', '2024-01-23', 'Adnan Ahmed', 'Camila Addison', 'Discord', '-', 'lols31', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 12, 15),
(281, '2024-01-23 18:34:09', '2024-01-23', 'Adnan Ahmed', 'Camila Addison', 'Discord', '-', 'thats_me123', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 12, 15),
(282, '2024-01-23 18:34:21', '2024-01-23', 'Adnan Ahmed', 'Camila Addison', 'Discord', '-', 'desmos75', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 12, 15),
(283, '2024-01-23 18:34:31', '2024-01-23', 'Adnan Ahmed', 'Camila Addison', 'Discord', '-', 'shadramadrox', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 12, 15),
(284, '2024-01-23 18:34:42', '2024-01-23', 'Adnan Ahmed', 'Camila Addison', 'Discord', '-', 'godfreytheravenous', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 12, 15),
(285, '2024-01-23 18:34:50', '2024-01-23', 'Adnan Ahmed', 'Camila Addison', 'Discord', '-', 'bluejay.666#3449', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 12, 15),
(286, '2024-01-23 18:34:59', '2024-01-23', 'Adnan Ahmed', 'Camila Addison', 'Discord', '-', 'yngdmoney', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 12, 15),
(287, '2024-01-23 18:35:09', '2024-01-23', 'Adnan Ahmed', 'Camila Addison', 'Discord', '-', 'veggieman791', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 12, 15),
(288, '2024-01-23 18:35:22', '2024-01-23', 'Adnan Ahmed', 'Camila Addison', 'Discord', '-', 'bigclandj', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 12, 15),
(289, '2024-01-23 18:37:27', '2024-01-23', 'Usman Hameed', 'Olivia Stone', 'Discord', '-', 'ruthless7469', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 1, 9),
(290, '2024-01-23 18:37:45', '2024-01-23', 'Usman Hameed', 'Olivia Stone', 'Discord', '-', 'jayjonesent', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 1, 9),
(291, '2024-01-23 18:38:10', '2024-01-23', 'Abdullah Baig', 'Sandra Rose', 'Discord', '-', 'goldmoufdawg901', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 3, 1),
(292, '2024-01-23 18:38:33', '2024-01-23', 'Ali Hyder', 'Amelia Grace', 'Discord', '-', 'calvin_wilson299', 'Banner & Overlay', 'Closed', 'Logo and Overlay', '-', '-', 'Qualified', 220, 4, 2),
(293, '2024-01-23 18:38:47', '2024-01-23', 'Ali Hyder', 'Amelia Grace', 'Discord', '-', 'datboikool_tv', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 4, 2),
(294, '2024-01-23 18:39:16', '2024-01-23', 'Abdullah Baig', 'Sandra Rose', 'Discord', '-', 'ch33zee37', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 3, 1),
(295, '2024-01-23 18:39:36', '2024-01-23', 'Usman Hameed', 'Olivia Stone', 'Discord', '-', 'asctoons', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 1, 9),
(296, '2024-01-24 00:14:26', '2024-01-24', 'Abdullah Baig', 'Sandra Rose', 'Discord', '-', 'ohbreaky', 'Interested', 'Closed', '1x Banner\n4x Panels.', '-', '-', 'Qualified', 136, 3, 1),
(297, '2024-01-24 00:17:32', '2024-01-24', 'Usman Hameed', 'Olivia Stone', 'Discord', '-', 'icampdntcry', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 1, 9),
(298, '2024-01-24 00:17:42', '2024-01-24', 'Usman Hameed', 'Olivia Stone', 'Discord', '-', 'boston617gamer', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 1, 9),
(299, '2024-01-24 00:17:51', '2024-01-24', 'Usman Hameed', 'Olivia Stone', 'Discord', '-', 'darktype78', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 1, 9),
(300, '2024-01-24 00:18:05', '2024-01-24', 'Usman Hameed', 'Olivia Stone', 'Discord', '-', 'sharkyboy798', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 1, 9),
(301, '2024-01-24 00:18:14', '2024-01-24', 'Usman Hameed', 'Olivia Stone', 'Discord', '-', 'butcher0750', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 1, 9),
(302, '2024-01-24 00:18:23', '2024-01-24', 'Usman Hameed', 'Olivia Stone', 'Discord', '-', 'madman2222', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 1, 9),
(303, '2024-01-24 00:18:34', '2024-01-24', 'Usman Hameed', 'Olivia Stone', 'Discord', '-', 'bigrarii', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 1, 9),
(304, '2024-01-24 00:19:28', '2024-01-24', 'Usman Hameed', 'Olivia Stone', 'Discord', '-', 'kai_grezella', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 1, 9);
INSERT INTO `leads` (`id`, `lead_timestamp`, `lead_date`, `employee_name`, `account_name`, `platform_name`, `channel_link`, `client_username`, `comments`, `status`, `items`, `follow_up_date_with_remarks`, `reason_of_rejection`, `quality_of_lead`, `amount`, `admin_id_FK`, `employee_id_FK`) VALUES
(305, '2024-01-24 00:19:37', '2024-01-24', 'Usman Hameed', 'Olivia Stone', 'Discord', '-', 'tiz_sloth', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 1, 9),
(306, '2024-01-24 00:20:04', '2024-01-24', 'Usman Hameed', 'Olivia Stone', 'Discord', '-', 'subrown', 'Interested in panels', 'Closed', '1 Banner and 3 panels', '-', '-', 'Qualified', 85, 1, 9),
(307, '2024-01-24 00:20:32', '2024-01-24', 'Usman Hameed', 'Olivia Stone', 'Discord', '-', 'jakepeters', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 1, 9),
(308, '2024-01-24 00:25:55', '2024-01-24', 'Abdullah Baig', 'Sandra Rose', 'Discord', '-', 'bailak', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 3, 1),
(309, '2024-01-24 00:26:46', '2024-01-24', 'Abdullah Baig', 'Sandra Rose', 'Discord', '-', 'xhollylouise', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 3, 1),
(310, '2024-01-24 00:26:54', '2024-01-24', 'Abdullah Baig', 'Sandra Rose', 'Discord', '-', 'nuskip', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 3, 1),
(311, '2024-01-24 00:27:29', '2024-01-24', 'Abdullah Baig', 'Sandra Rose', 'Discord', '-', 'BigPlayShea', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 3, 1),
(312, '2024-01-24 00:27:55', '2024-01-24', 'Abdullah Baig', 'Sandra Rose', 'Instagram', 'https://www.twitch.tv/shhdy', 'acruzer101', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 3, 1),
(313, '2024-01-24 00:28:24', '2024-01-24', 'Abdullah Baig', 'Sandra Rose', 'Instagram', 'https://www.twitch.tv/jaydallimore', 'symbiotspider_web', 'Interested in emotes.', 'Follow up date', '-', '(15-Feb-2024) He will pay 40% upfront on 15th February.', '-', 'Qualified', 0, 3, 1),
(314, '2024-01-24 17:02:23', '2024-01-24', 'Ali Hyder', 'Amelia Grace', 'Discord', '-', 'rileyneatthememester', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 4, 2),
(315, '2024-01-24 17:02:38', '2024-01-24', 'Ali Hyder', 'Amelia Grace', 'Discord', '-', 'nai_bae22', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 4, 2),
(316, '2024-01-24 17:03:18', '2024-01-24', 'Ali Hyder', 'Amelia Grace', 'Instagram', 'https://www.twitch.tv/lyntaic', 'lyntaic', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 4, 2),
(317, '2024-01-24 17:03:29', '2024-01-24', 'Ali Hyder', 'Amelia Grace', 'Discord', '-', 'jcrystelia', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 4, 2),
(318, '2024-01-24 17:03:53', '2024-01-24', 'Ali Hyder', 'Amelia Grace', 'Discord', '-', 'fruitiest', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 4, 2),
(319, '2024-01-24 17:10:01', '2024-01-24', 'Ali Hyder', 'Amelia Grace', 'Discord', '-', 'mariherbo', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 4, 2),
(320, '2024-01-24 17:10:11', '2024-01-24', 'Ali Hyder', 'Amelia Grace', 'Discord', '-', 'vyberx', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 4, 2),
(321, '2024-01-24 17:10:21', '2024-01-24', 'Ali Hyder', 'Amelia Grace', 'Discord', '-', 'dame3902', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 4, 2),
(322, '2024-01-24 17:13:10', '2024-01-24', 'Adnan Ahmed', 'Camila Addison', 'Discord', '-', 'iamdjdean', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 12, 15),
(323, '2024-01-24 17:13:36', '2024-01-24', 'Adnan Ahmed', 'Camila Addison', 'Discord', '-', 'jackbrilla', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 12, 15),
(324, '2024-01-24 17:13:49', '2024-01-24', 'Adnan Ahmed', 'Camila Addison', 'Discord', '-', 'tharula1k', 'Interested in logo and banner.', 'Closed', '1x Logo\n1x Banner', '-', '-', 'Qualified', 82, 12, 15),
(325, '2024-01-24 19:29:16', '2024-01-25', 'Usman Hameed', 'Olivia Stone', 'Discord', '-', 'wolfox210', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 1, 9),
(326, '2024-01-24 19:29:48', '2024-01-25', 'Usman Hameed', 'Olivia Stone', 'Discord', '-', 'iqhohacs', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 1, 9),
(327, '2024-01-24 19:32:43', '2024-01-25', 'Usman Hameed', 'Olivia Stone', 'Discord', '-', 'fatas', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 1, 9),
(328, '2024-01-24 19:33:04', '2024-01-25', 'Usman Hameed', 'Olivia Stone', 'Discord', '-', '15_drive🖐🏾#1766', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 1, 9),
(329, '2024-01-24 19:33:52', '2024-01-25', 'Usman Hameed', 'Olivia Stone', 'Discord', '-', 'ragingkiwiz', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 1, 9),
(330, '2024-01-24 19:34:11', '2024-01-25', 'Usman Hameed', 'Olivia Stone', 'Discord', '-', 'bullseyefr', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 1, 9),
(331, '2024-01-24 19:34:20', '2024-01-25', 'Usman Hameed', 'Olivia Stone', 'Discord', '-', 'suavegotit', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 1, 9),
(332, '2024-01-24 19:47:43', '2024-01-25', 'Abdullah Baig', 'Sandra Rose', 'Discord', '-', 'kingzupp54', 'talking', 'Pending', '-', '-', '-', 'Qualified', 85, 3, 1),
(333, '2024-01-24 20:11:05', '2024-01-25', 'Abdullah Baig', 'Sandra Rose', 'Discord', '-', 'minty6292', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 3, 1),
(334, '2024-01-24 20:11:14', '2024-01-25', 'Abdullah Baig', 'Olivia Stone', 'Discord', '-', 'jjmakavelli', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 3, 1),
(335, '2024-01-24 20:11:37', '2024-01-25', 'Abdullah Baig', 'Sandra Rose', 'Discord', '-', 'Shyrama#1120', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 3, 1),
(336, '2024-01-24 20:11:57', '2024-01-25', 'Abdullah Baig', 'Sandra Rose', 'Discord', '-', 'golden_mobx', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 3, 1),
(337, '2024-01-24 20:12:07', '2024-01-25', 'Abdullah Baig', 'Sandra Rose', 'Discord', '-', 'championstakechances', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 3, 1),
(338, '2024-01-24 20:12:33', '2024-01-25', 'Abdullah Baig', 'Sandra Rose', 'Discord', '-', 'vargerjaeger', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 3, 1),
(339, '2024-01-24 20:12:44', '2024-01-25', 'Abdullah Baig', 'Sandra Rose', 'Discord', '-', 'cloudsufn', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 3, 1),
(340, '2024-01-24 20:15:22', '2024-01-25', 'Ali Hyder', 'Amelia Grace', 'Discord', '-', 'noluv.corri', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 4, 2),
(341, '2024-01-24 20:15:31', '2024-01-25', 'Ali Hyder', 'Amelia Grace', 'Discord', '-', 'ewdeazy', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 4, 2),
(342, '2024-01-24 20:15:47', '2024-01-25', 'Ali Hyder', 'Amelia Grace', 'Discord', '-', 'claspjames96', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 4, 2),
(343, '2024-01-24 20:15:59', '2024-01-25', 'Ali Hyder', 'Amelia Grace', 'Discord', '-', 'angelonekro23', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 4, 2),
(344, '2024-01-24 20:16:07', '2024-01-25', 'Ali Hyder', 'Amelia Grace', 'Discord', '-', 'rmilkz', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 4, 2),
(345, '2024-01-24 20:16:20', '2024-01-25', 'Ali Hyder', 'Amelia Grace', 'Discord', '-', 'itsdavidm', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 4, 2),
(346, '2024-01-24 20:17:26', '2024-01-25', 'Ali Hyder', 'Savannah Mendes', 'Discord', '-', 'vCookie#3397', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 4, 2),
(347, '2024-01-24 20:17:38', '2024-01-25', 'Ali Hyder', 'Savannah Mendes', 'Discord', '-', 'dreambabi23', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 4, 2),
(348, '2024-01-24 20:18:48', '2024-01-25', 'Ali Hyder', 'Savannah Mendes', 'Discord', '-', 'brazyboi904#2986', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 4, 2),
(349, '2024-01-25 18:20:57', '2024-01-25', 'Usman Hameed', 'Olivia Stone', 'Discord', '-', 'lightpulsie', 'Interested. Asking for sometime', 'Closed', 'Logo & Overlay', '-', '-', 'Qualified', 422, 1, 9),
(350, '2024-01-25 18:21:28', '2024-01-25', 'Adnan Ahmed', 'Camila Addison', 'Discord', '-', 'callumxd.', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 12, 15),
(351, '2024-01-25 18:21:41', '2024-01-25', 'Adnan Ahmed', 'Camila Addison', 'Discord', '-', 'northsideace', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 12, 15),
(352, '2024-01-25 18:21:53', '2024-01-25', 'Adnan Ahmed', 'Camila Addison', 'Discord', '-', 'thbdirft', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 12, 15),
(353, '2024-01-25 18:22:11', '2024-01-25', 'Adnan Ahmed', 'Camila Addison', 'Discord', '-', 'drakio762', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 12, 15),
(354, '2024-01-25 18:22:20', '2024-01-25', 'Adnan Ahmed', 'Camila Addison', 'Discord', '-', 'cogar', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 12, 15),
(355, '2024-01-25 18:22:37', '2024-01-25', 'Adnan Ahmed', 'Camila Addison', 'Discord', '-', 'TommyBoy#8353', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 12, 15),
(356, '2024-01-25 18:22:58', '2024-01-25', 'Adnan Ahmed', 'Camila Addison', 'Discord', '-', 'tankoo', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 12, 15),
(357, '2024-01-25 18:23:09', '2024-01-25', 'Adnan Ahmed', 'Camila Addison', 'Discord', '-', 'rjaylivee', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 12, 15),
(358, '2024-01-25 19:49:52', '2024-01-26', 'Ali Hyder', 'Amelia Grace', 'Discord', '-', 'justanalabamafireman65', 'Interested in overlay', 'Follow up date', '-', 'Next week (Did not specify any specific day).\nHe will pay 30% upfront of $313', '-', 'Pending', 0, 4, 2),
(359, '2024-01-25 19:54:14', '2024-01-26', 'Ali Hyder', 'Amelia Grace', 'Instagram', 'https://www.twitch.tv/topfivetrigger', 'nvsty_jojo', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 4, 2),
(360, '2024-01-25 19:54:24', '2024-01-26', 'Ali Hyder', 'Amelia Grace', 'Discord', '-', 'demob0151', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 4, 2),
(361, '2024-01-25 19:54:50', '2024-01-26', 'Ali Hyder', 'Amelia Grace', 'Instagram', 'https://www.twitch.tv/xmitsuki7orochimarux', 'xgoku7kakarotx', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 4, 2),
(362, '2024-01-25 20:08:48', '2024-01-26', 'Ali Hyder', 'Amelia Grace', 'Discord', '-', 'payhommage', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 4, 2),
(363, '2024-01-25 20:08:57', '2024-01-26', 'Ali Hyder', 'Amelia Grace', 'Discord', '-', 'attila_05', 'Interested! Talking right now.', 'Pending', '-', '-', '-', 'Pending', 0, 4, 2),
(364, '2024-01-26 18:08:39', '2024-01-26', 'Usman Hameed', 'Olivia Stone', 'Discord', '-', 'aceito_716', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 1, 9),
(365, '2024-01-26 18:09:03', '2024-01-26', 'Usman Hameed', 'Olivia Stone', 'Discord', '-', 'Hellabandz.chris', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 1, 9),
(366, '2024-01-26 18:09:16', '2024-01-26', 'Usman Hameed', 'Olivia Stone', 'Discord', '-', 'plop9189', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 1, 9),
(367, '2024-01-26 18:09:29', '2024-01-26', 'Usman Hameed', 'Olivia Stone', 'Discord', '-', 'clixkin', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 1, 9),
(369, '2024-01-26 18:09:47', '2024-01-26', 'Usman Hameed', 'Olivia Stone', 'Discord', '-', 'ebonypugslove20306', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 1, 9),
(370, '2024-01-26 18:10:10', '2024-01-26', 'Usman Hameed', 'Olivia Stone', 'Discord', '-', 'justcassie19', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 1, 9),
(371, '2024-01-26 18:10:22', '2024-01-26', 'Usman Hameed', 'Olivia Stone', 'Discord', '-', 'TaigaXsenpai#5590', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 1, 9),
(372, '2024-01-26 18:10:32', '2024-01-26', 'Usman Hameed', 'Olivia Stone', 'Discord', '-', 'thebud69', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 1, 9),
(373, '2024-01-26 18:11:35', '2024-01-26', 'Ali Hyder', 'Amelia Grace', 'Discord', '-', 'ItsBreezyHuh', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 4, 2),
(374, '2024-01-26 18:11:47', '2024-01-26', 'Ali Hyder', 'Amelia Grace', 'Discord', '-', 'boozieisme', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 4, 2),
(375, '2024-01-26 18:11:56', '2024-01-26', 'Ali Hyder', 'Amelia Grace', 'Discord', '-', 'CAPITALj813', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 4, 2),
(376, '2024-01-26 18:12:26', '2024-01-26', 'Ali Hyder', 'Amelia Grace', 'Instagram', 'https://www.twitch.tv/trevarisb', '_736kay_', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 4, 2),
(377, '2024-01-26 18:19:41', '2024-01-26', 'Abdullah Baig', 'Sandra Rose', 'Discord', '-', 'manthingyt', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 3, 1),
(378, '2024-01-26 18:19:50', '2024-01-26', 'Abdullah Baig', 'Sandra Rose', 'Discord', '-', 'drchiech', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 3, 1),
(379, '2024-01-26 18:19:58', '2024-01-26', 'Abdullah Baig', 'Sandra Rose', 'Discord', '-', 'pooping36', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 3, 1),
(380, '2024-01-26 18:20:06', '2024-01-26', 'Abdullah Baig', 'Sandra Rose', 'Discord', '-', 'truancies', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 3, 1),
(381, '2024-01-26 18:20:27', '2024-01-26', 'Abdullah Baig', 'Sandra Rose', 'Instagram', 'https://www.twitch.tv/num1homie', 'num1homie', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 3, 1),
(382, '2024-01-26 18:21:03', '2024-01-26', 'Abdullah Baig', 'Sandra Rose', 'Instagram', 'https://www.twitch.tv/exotic_one3', 'taco_muncher46', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 3, 1),
(383, '2024-01-26 18:21:32', '2024-01-26', 'Abdullah Baig', 'Sandra Rose', 'Discord', '-', 'aiders_11', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 3, 1),
(384, '2024-01-26 18:21:49', '2024-01-26', 'Abdullah Baig', 'Sandra Rose', 'Discord', '-', 'fencedweller', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 3, 1),
(385, '2024-01-26 18:22:11', '2024-01-26', 'Abdullah Baig', 'Sandra Rose', 'Discord', '-', 'erdman_', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 3, 1),
(386, '2024-01-26 18:22:19', '2024-01-26', 'Abdullah Baig', 'Sandra Rose', 'Discord', '-', 'crimsoncare', 'Interested in emotes', 'Closed', '1x Banner.\n3x Emotes', '-', '-', 'Qualified', 92, 3, 1),
(387, '2024-01-26 22:16:19', '2024-01-27', 'Usman Hameed', 'Olivia Stone', 'Discord', '-', 'kaylaniiK', 'interested in animated emotes', 'Closed', '6x animated emotes', '2nd March 2024. Will pay 40% upfront', '-', 'Qualified', 200, 1, 9),
(388, '2024-01-26 23:05:05', '2024-01-27', 'Abdullah Baig', 'Sandra Rose', 'Discord', '-', 'tyfrm203', 'Waiting for a response', 'Closed', 'logo', '-', '-', 'Qualified', 150, 3, 1),
(389, '2024-01-29 22:14:50', '2024-01-30', 'Abdullah Baig', 'Sandra Rose', 'Discord', '-', 'kaylaniiK', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 3, 1),
(390, '2024-01-29 22:27:46', '2024-01-30', 'Abdullah Baig', 'Sandra Rose', 'Instagram', 'https://www.twitch.tv/parkplacel52va', 'bwm_zigonyawig52', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 3, 1),
(391, '2024-01-29 22:28:06', '2024-01-30', 'Abdullah Baig', 'Sandra Rose', 'Discord', '-', 'frostystillplays', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 3, 1),
(392, '2024-01-29 22:28:26', '2024-01-30', 'Abdullah Baig', 'Sandra Rose', 'Discord', '-', 'jamwickk', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 3, 1),
(393, '2024-01-29 22:28:34', '2024-01-30', 'Abdullah Baig', 'Sandra Rose', 'Discord', '-', 'freesh206512', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 3, 1),
(394, '2024-01-29 22:28:55', '2024-01-30', 'Abdullah Baig', 'Sandra Rose', 'Discord', '-', 'green_anxiety', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 3, 1),
(395, '2024-01-29 22:29:05', '2024-01-30', 'Abdullah Baig', 'Sandra Rose', 'Discord', '-', 'PresidentWB#3528', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 3, 1),
(396, '2024-01-29 22:29:14', '2024-01-30', 'Abdullah Baig', 'Sandra Rose', 'Discord', '-', '4ndrei_vv', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 3, 1),
(397, '2024-01-29 22:29:27', '2024-01-30', 'Abdullah Baig', 'Sandra Rose', 'Discord', '-', 'gunnza69', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 3, 1),
(398, '2024-01-29 22:29:52', '2024-01-30', 'Abdullah Baig', 'Sandra Rose', 'Discord', '-', 'kristus25', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 3, 1),
(399, '2024-01-30 00:20:19', '2024-01-30', 'Usman Hameed', 'Olivia Stone', 'Discord', '-', '.memeball', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 1, 9),
(400, '2024-01-30 00:20:29', '2024-01-30', 'Usman Hameed', 'Olivia Stone', 'Discord', '-', 'turtlespeed2927', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 1, 9),
(401, '2024-01-30 00:20:39', '2024-01-30', 'Usman Hameed', 'Olivia Stone', 'Discord', '-', 'trose__', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 1, 9),
(402, '2024-01-30 00:20:49', '2024-01-30', 'Usman Hameed', 'Olivia Stone', 'Discord', '-', 'janusmarine', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 1, 9),
(403, '2024-01-30 00:20:58', '2024-01-30', 'Usman Hameed', 'Olivia Stone', 'Discord', '-', 'tybeaszy', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 1, 9),
(404, '2024-01-30 00:21:49', '2024-01-30', 'Usman Hameed', 'Olivia Stone', 'Discord', '-', 'refllexEU#1759', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 1, 9),
(405, '2024-01-30 00:22:02', '2024-01-30', 'Usman Hameed', 'Olivia Stone', 'Discord', '-', 'demonknite_84', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 1, 9),
(406, '2024-01-30 00:22:14', '2024-01-30', 'Usman Hameed', 'Olivia Stone', 'Discord', '-', 'hallsyyy', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 1, 9),
(407, '2024-01-30 00:22:32', '2024-01-30', 'Usman Hameed', 'Olivia Stone', 'Discord', '-', 'sotnboogie', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 1, 9),
(408, '2024-01-30 00:22:40', '2024-01-30', 'Usman Hameed', 'Olivia Stone', 'Discord', '-', 'BirdMom#2417', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 1, 9),
(409, '2024-01-30 00:23:08', '2024-01-30', 'Usman Hameed', 'Olivia Stone', 'Discord', '-', 'kimaru_ds', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 1, 9),
(410, '2024-01-30 00:23:35', '2024-01-30', 'Usman Hameed', 'Olivia Stone', 'Instagram', 'https://www.twitch.tv/eastmade_', 'eastmade_.jay', 'Waiting for a response', 'Pending', '-', '-', '-', 'Pending', 0, 1, 9);

-- --------------------------------------------------------

--
-- Table structure for table `leads_count`
--

CREATE TABLE `leads_count` (
  `id` int(11) NOT NULL,
  `leads_count_date` date DEFAULT curdate(),
  `name` varchar(50) DEFAULT NULL,
  `admin_id_FK` int(11) DEFAULT NULL,
  `employee_id_FK` int(11) DEFAULT 0,
  `total_leads` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `leads_count`
--

INSERT INTO `leads_count` (`id`, `leads_count_date`, `name`, `admin_id_FK`, `employee_id_FK`, `total_leads`) VALUES
(5, '2024-01-13', 'Usman Hameed', 1, 9, 11),
(7, '2024-01-13', 'Bilal Amir', 2, 0, 6),
(8, '2024-01-13', 'Abdullah Baig', 3, 1, 3),
(9, '2024-01-13', 'Ali Hyder', 4, 2, 2),
(10, '2024-01-16', 'Usman Hameed', 1, 9, 2),
(11, '2024-01-16', 'Bilal Amir', 2, 0, 2),
(12, '2024-01-17', 'Usman Hameed', 1, 9, 6),
(13, '2024-01-17', 'Ali Hyder', 4, 2, 4),
(14, '2024-01-17', 'Abdullah Baig', 3, 1, 5),
(15, '2024-01-18', 'Usman Hameed', 1, 9, 10),
(16, '2024-01-18', 'Abdullah Baig', 3, 1, 9),
(17, '2024-01-18', 'Ali Hyder', 4, 2, 13),
(18, '2024-01-18', 'Bilal Amir', 2, 0, 8),
(19, '2024-01-19', 'Usman Hameed', 1, 9, 13),
(20, '2024-01-19', 'Abdullah Baig', 3, 1, 17),
(21, '2024-01-19', 'Ali Hyder', 4, 2, 12),
(22, '2024-01-19', 'Bilal Amir', 2, 0, 9),
(23, '2024-01-20', 'Usman Hameed', 1, 9, 7),
(24, '2024-01-20', 'Abdullah Baig', 3, 1, 8),
(25, '2024-01-20', 'Ali Hyder', 4, 2, 7),
(26, '2024-01-20', 'Bilal Amir', 2, 0, 10),
(27, '2024-01-22', 'Usman Hameed', 1, 9, 10),
(28, '2024-01-22', 'Abdullah Baig', 3, 1, 9),
(29, '2024-01-22', 'Ali Hyder', 4, 2, 9),
(30, '2024-01-22', 'Bilal Amir', 2, 0, 12),
(31, '2024-01-23', 'Usman Hameed', 1, 9, 12),
(32, '2024-01-23', 'Adnan Ahmed', 12, 15, 12),
(33, '2024-01-23', 'Abdullah Baig', 3, 1, 13),
(34, '2024-01-23', 'Ali Hyder', 4, 2, 12),
(35, '2024-01-24', 'Abdullah Baig', 3, 1, 7),
(36, '2024-01-24', 'Usman Hameed', 1, 9, 11),
(37, '2024-01-24', 'Ali Hyder', 4, 2, 8),
(38, '2024-01-24', 'Adnan Ahmed', 12, 15, 3),
(39, '2024-01-25', 'Usman Hameed', 1, 9, 8),
(40, '2024-01-25', 'Abdullah Baig', 3, 1, 8),
(41, '2024-01-25', 'Ali Hyder', 4, 2, 9),
(42, '2024-01-25', 'Adnan Ahmed', 12, 15, 8),
(43, '2024-01-26', 'Ali Hyder', 4, 2, 10),
(44, '2024-01-26', 'Usman Hameed', 1, 9, 8),
(45, '2024-01-26', 'Abdullah Baig', 3, 1, 10),
(46, '2024-01-27', 'Usman Hameed', 1, 9, 1),
(47, '2024-01-27', 'Abdullah Baig', 3, 1, 1),
(48, '2024-01-30', 'Abdullah Baig', 3, 1, 10),
(49, '2024-01-30', 'Usman Hameed', 1, 9, 12);

-- --------------------------------------------------------

--
-- Table structure for table `targets`
--

CREATE TABLE `targets` (
  `id` int(11) NOT NULL,
  `employee_name` varchar(50) DEFAULT NULL,
  `account_name` varchar(50) DEFAULT NULL,
  `platform_name` varchar(50) DEFAULT NULL,
  `client_username` varchar(50) DEFAULT NULL,
  `channel_link` varchar(200) DEFAULT '-',
  `items` varchar(200) DEFAULT NULL,
  `amount` bigint(20) DEFAULT NULL,
  `date_created` date DEFAULT curdate(),
  `admin_id_FK` int(11) DEFAULT NULL,
  `employee_id_FK` int(11) DEFAULT NULL,
  `lead_id_FK` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `targets`
--

INSERT INTO `targets` (`id`, `employee_name`, `account_name`, `platform_name`, `client_username`, `channel_link`, `items`, `amount`, `date_created`, `admin_id_FK`, `employee_id_FK`, `lead_id_FK`) VALUES
(8, 'Usman Hameed', 'Olivia Stone', 'Discord', 'clutchkickers', '-', 'Logo & Overlay', 285, '2024-01-23', 1, 9, 253),
(9, 'Abdullah Baig', 'Sandra Rose', 'Discord', 'makkisobtop', '-', 'Logo & Banner', 145, '2024-01-23', 3, 1, 224),
(13, 'Ali Hyder', 'Amelia Grace', 'Discord', 'calvin_wilson299', '-', 'Logo and Overlay', 220, '2024-01-24', 4, 2, 292),
(28, 'Adnan Ahmed', 'Camila Addison', 'Discord', 'tharula1k', '-', '1x Logo 1x Banner', 82, '2024-01-25', 12, 15, 324),
(34, 'Abdullah Baig', 'Sandra Rose', 'Discord', 'ohbreaky', '-', '1x Banner 4x Panels.', 136, '2024-01-26', 3, 1, 296),
(35, 'Usman Hameed', 'Olivia Stone', 'Discord', 'lightpulsie', '-', 'Logo & Overlay', 422, '2024-01-26', 1, 9, 349),
(36, 'Usman Hameed', 'Olivia Stone', 'Discord', 'subrown', '-', '1 Banner and 3 panels', 85, '2024-01-26', 1, 9, 306),
(38, 'Abdullah Baig', 'Sandra Rose', 'Discord', 'crimsoncare', '-', '1x Banner. 3x Emotes	', 92, '2024-01-26', 3, 1, 386),
(42, 'Abdullah Baig', 'Sandra Rose', 'Discord', 'tyfrm203', '-', 'logo', 150, '2024-01-27', 3, 1, 388),
(43, 'Usman Hameed', 'Olivia Stone', 'Discord', 'kaylaniiK', '-', '6x animated emotes', 200, '2024-01-27', 1, 9, 387);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account_credentials`
--
ALTER TABLE `account_credentials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leads`
--
ALTER TABLE `leads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leads_count`
--
ALTER TABLE `leads_count`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `targets`
--
ALTER TABLE `targets`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account_credentials`
--
ALTER TABLE `account_credentials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `leads`
--
ALTER TABLE `leads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=411;

--
-- AUTO_INCREMENT for table `leads_count`
--
ALTER TABLE `leads_count`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `targets`
--
ALTER TABLE `targets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
