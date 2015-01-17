-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 18, 2015 at 03:26 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `aiefin`
--

-- --------------------------------------------------------

--
-- Table structure for table `committee`
--

CREATE TABLE IF NOT EXISTS `committee` (
  `Name` varchar(100) NOT NULL,
  `Location` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE IF NOT EXISTS `event` (
  `EventID` varchar(20) NOT NULL,
  `BudgetedExpense` float NOT NULL DEFAULT '0',
  `ActualExpense` float NOT NULL DEFAULT '0',
  `ActualIncome` float NOT NULL DEFAULT '0',
  `UserID` varchar(20) NOT NULL,
  `Duration` int(11) NOT NULL,
  `StartDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `exchangeperson`
--

CREATE TABLE IF NOT EXISTS `exchangeperson` (
  `EPID` varchar(20) NOT NULL,
  `Name` text NOT NULL,
  `Country` text NOT NULL,
  `StartDate` date NOT NULL,
  `EndDate` date NOT NULL,
  `EP_Fee` float NOT NULL DEFAULT '0',
  `Proj_ID` varchar(20) NOT NULL,
  `UserID` varchar(20) NOT NULL,
  `Status` text NOT NULL,
  `Function` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `expense`
--

CREATE TABLE IF NOT EXISTS `expense` (
  `Exp_ID` varchar(20) NOT NULL,
  `Date` date NOT NULL,
  `UserID` varchar(20) NOT NULL,
  `Function` text NOT NULL,
  `Status` text NOT NULL,
  `Description` text NOT NULL,
  `Amount` float NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `income`
--

CREATE TABLE IF NOT EXISTS `income` (
  `Inc_ID` varchar(20) NOT NULL,
  `Date` date NOT NULL,
  `UserID` varchar(20) NOT NULL,
  `Function` text NOT NULL,
  `Status` text NOT NULL,
  `Description` text NOT NULL,
  `Amount` float NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE IF NOT EXISTS `project` (
  `Proj_ID` varchar(20) NOT NULL,
  `Name` text NOT NULL,
  `Organization` text NOT NULL,
  `UserID` varchar(20) NOT NULL,
  `Function` text NOT NULL,
  `BudgetedExpense` float NOT NULL DEFAULT '0',
  `Proj_Fee` float NOT NULL DEFAULT '0',
  `Latest_endDate` date NOT NULL,
  `Earliest_startDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `uc_configuration`
--

CREATE TABLE IF NOT EXISTS `uc_configuration` (
`id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `value` varchar(150) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `uc_configuration`
--

INSERT INTO `uc_configuration` (`id`, `name`, `value`) VALUES
(1, 'website_name', 'aiefin'),
(2, 'website_url', 'localhost/'),
(3, 'email', 'arafathnihar@gmail.com'),
(4, 'activation', 'false'),
(5, 'resend_activation_threshold', '0'),
(6, 'language', 'models/languages/en.php'),
(7, 'template', 'models/site-templates/default.css'),
(8, 'can_register', 'false'),
(9, 'new_user_title', 'New Member');

-- --------------------------------------------------------

--
-- Table structure for table `uc_pages`
--

CREATE TABLE IF NOT EXISTS `uc_pages` (
`id` int(11) NOT NULL,
  `page` varchar(150) NOT NULL,
  `private` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `uc_pages`
--

INSERT INTO `uc_pages` (`id`, `page`, `private`) VALUES
(1, 'index.php', 0),
(2, 'register.php', 0),
(3, 'login.php', 0),
(4, 'process_login.php', 0),
(5, 'user_create_user.php', 0),
(6, 'activate_account.php', 0),
(7, 'forgot_password.php', 0),
(8, 'resend_activation.php', 0),
(9, 'user_resend_activation.php', 0),
(10, 'user_reset_password.php', 0),
(11, 'header-loggedout.php', 0),
(12, 'jumbotron_links.php', 0),
(13, 'account.php', 1),
(14, 'logout.php', 1),
(15, 'dashboard.php', 1),
(16, 'user_update_account_settings.php', 1),
(17, 'form-components.php', 1),
(18, 'user_alerts.php', 1),
(19, 'header.php', 1),
(20, 'account_settings.php', 1),
(21, 'load_current_user.php', 1),
(22, 'user_load_permissions.php', 1),
(23, 'load_permissions.php', 1),
(24, 'load_site_pages.php', 1),
(25, 'load_site_settings.php', 1),
(26, 'dashboard_admin.php', 1),
(27, 'site_pages.php', 1),
(28, 'site_settings.php', 1),
(29, 'update_site_settings.php', 1),
(30, 'update_user.php', 1),
(31, 'create_permission.php', 1),
(32, 'update_permission.php', 1),
(33, 'create_user.php', 1),
(34, 'update_page_permission.php', 1),
(35, 'delete_permission.php', 1),
(36, 'load_users.php', 1),
(37, 'admin_activate_user.php', 1),
(38, 'users.php', 1),
(39, 'user_details.php', 1),
(40, 'create_update_display_user_form.php', 1),
(41, 'update_user_enabled.php', 1),
(42, 'admin_load_permissions.php', 1),
(43, 'template-permissions-row.php', 1),
(44, 'delete_user_dialog.php', 1),
(45, 'load_user.php', 1),
(46, 'delete_user.php', 1),
(47, 'try.php', 1);

-- --------------------------------------------------------

--
-- Table structure for table `uc_permissions`
--

CREATE TABLE IF NOT EXISTS `uc_permissions` (
`id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `is_default` tinyint(1) NOT NULL,
  `can_delete` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `uc_permissions`
--

INSERT INTO `uc_permissions` (`id`, `name`, `is_default`, `can_delete`) VALUES
(1, 'User', 1, 0),
(2, 'Administrator', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `uc_permission_page_matches`
--

CREATE TABLE IF NOT EXISTS `uc_permission_page_matches` (
`id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL,
  `page_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=126 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `uc_permission_page_matches`
--

INSERT INTO `uc_permission_page_matches` (`id`, `permission_id`, `page_id`) VALUES
(1, 1, 13),
(2, 1, 14),
(4, 2, 13),
(12, 2, 14),
(23, 2, 34),
(24, 2, 29),
(25, 2, 27),
(26, 2, 28),
(27, 2, 25),
(28, 2, 24),
(29, 2, 23),
(30, 2, 35),
(31, 2, 31),
(32, 2, 19),
(33, 1, 19),
(34, 2, 26),
(37, 1, 21),
(38, 2, 21),
(40, 2, 30),
(43, 2, 36),
(45, 2, 38),
(47, 1, 18),
(48, 2, 18),
(49, 2, 40),
(54, 2, 43),
(55, 1, 17),
(56, 2, 17),
(57, 2, 45),
(58, 1, 22),
(59, 2, 22),
(60, 2, 42),
(63, 2, 44),
(64, 2, 41),
(65, 2, 46),
(66, 1, 20),
(67, 2, 20),
(68, 1, 16),
(69, 2, 16),
(70, 2, 39),
(71, 1, 15),
(72, 2, 15),
(73, 2, 37),
(74, 2, 32),
(75, 2, 33),
(76, 2, 47),
(77, 2, 1),
(78, 2, 2),
(79, 2, 3),
(80, 2, 4),
(81, 2, 5),
(82, 2, 6),
(83, 2, 7),
(84, 2, 8),
(85, 2, 9),
(86, 2, 10),
(87, 2, 11),
(88, 2, 12),
(89, 1, 12),
(90, 1, 11),
(91, 1, 10),
(92, 1, 9),
(93, 1, 8),
(94, 1, 7),
(95, 1, 6),
(96, 1, 5),
(97, 1, 4),
(98, 1, 3),
(99, 1, 2),
(100, 1, 1),
(101, 1, 23),
(102, 1, 24),
(103, 1, 25),
(104, 1, 26),
(105, 1, 27),
(106, 1, 28),
(107, 1, 29),
(108, 1, 30),
(109, 1, 31),
(110, 1, 32),
(111, 1, 33),
(112, 1, 34),
(113, 1, 35),
(114, 1, 36),
(115, 1, 37),
(116, 1, 38),
(117, 1, 39),
(118, 1, 40),
(119, 1, 41),
(120, 1, 42),
(121, 1, 43),
(122, 1, 44),
(123, 1, 45),
(124, 1, 46),
(125, 1, 47);

-- --------------------------------------------------------

--
-- Table structure for table `uc_users`
--

CREATE TABLE IF NOT EXISTS `uc_users` (
`id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `display_name` varchar(50) NOT NULL,
  `password` varchar(225) NOT NULL,
  `email` varchar(150) NOT NULL,
  `activation_token` varchar(225) NOT NULL,
  `last_activation_request` int(11) NOT NULL,
  `lost_password_request` tinyint(1) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `title` varchar(150) NOT NULL,
  `sign_up_stamp` int(11) NOT NULL,
  `last_sign_in_stamp` int(11) NOT NULL,
  `enabled` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'Specifies if the account is enabled.  Disabled accounts cannot be logged in to, but they retain all of their data and settings.'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `uc_users`
--

INSERT INTO `uc_users` (`id`, `user_name`, `display_name`, `password`, `email`, `activation_token`, `last_activation_request`, `lost_password_request`, `active`, `title`, `sign_up_stamp`, `last_sign_in_stamp`, `enabled`) VALUES
(1, 'darshana', 'MCVP', '4a3887427d1fca11cff2c247ec59edb46aaaa5f671a62ef425470ec6d0a3b6738', 'arafathnihar@gmail.com', '21085cbfaa9bc9dd99cdf48c64cb2e18', 1421241998, 0, 1, 'new member', 1421241998, 1421525796, 1),
(2, 'tharika', 'LCVP', '8b734ec23735252c803cd6e609c4f17c19ec5616a62f677b1ce81b43c142e4e7b', 'arafathcoolguy007@gmail.com', '1bdb58db68c4395806adb14b234487a9', 1421242196, 0, 1, 'user', 1421242196, 1421242226, 1);

-- --------------------------------------------------------

--
-- Table structure for table `uc_user_permission_matches`
--

CREATE TABLE IF NOT EXISTS `uc_user_permission_matches` (
`id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `uc_user_permission_matches`
--

INSERT INTO `uc_user_permission_matches` (`id`, `user_id`, `permission_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 1),
(4, 2, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `committee`
--
ALTER TABLE `committee`
 ADD PRIMARY KEY (`Name`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
 ADD PRIMARY KEY (`EventID`);

--
-- Indexes for table `exchangeperson`
--
ALTER TABLE `exchangeperson`
 ADD PRIMARY KEY (`EPID`);

--
-- Indexes for table `expense`
--
ALTER TABLE `expense`
 ADD PRIMARY KEY (`Exp_ID`);

--
-- Indexes for table `income`
--
ALTER TABLE `income`
 ADD PRIMARY KEY (`Inc_ID`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
 ADD PRIMARY KEY (`Proj_ID`);

--
-- Indexes for table `uc_configuration`
--
ALTER TABLE `uc_configuration`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uc_pages`
--
ALTER TABLE `uc_pages`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uc_permissions`
--
ALTER TABLE `uc_permissions`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uc_permission_page_matches`
--
ALTER TABLE `uc_permission_page_matches`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uc_users`
--
ALTER TABLE `uc_users`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uc_user_permission_matches`
--
ALTER TABLE `uc_user_permission_matches`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `uc_configuration`
--
ALTER TABLE `uc_configuration`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `uc_pages`
--
ALTER TABLE `uc_pages`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=48;
--
-- AUTO_INCREMENT for table `uc_permissions`
--
ALTER TABLE `uc_permissions`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `uc_permission_page_matches`
--
ALTER TABLE `uc_permission_page_matches`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=126;
--
-- AUTO_INCREMENT for table `uc_users`
--
ALTER TABLE `uc_users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `uc_user_permission_matches`
--
ALTER TABLE `uc_user_permission_matches`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
