-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 18, 2023 at 05:36 PM
-- Server version: 10.10.3-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `royalmeat`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_email` varchar(200) NOT NULL,
  `admin_image` varchar(2000) DEFAULT NULL,
  `admin_phone` varchar(2000) DEFAULT NULL,
  `admin_work` varchar(2000) DEFAULT NULL,
  `admin_about` varchar(2000) DEFAULT NULL,
  `power` int(11) NOT NULL DEFAULT 0,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `admin_name`, `admin_email`, `admin_image`, `admin_phone`, `admin_work`, `admin_about`, `power`, `created_date`) VALUES
(2, 'admin', '$2y$12$1FG/eIF42tZXzoVWub/th.r.hg5MAP.e0t77n3I3NtGr1tN5VGr32', 'Ayyappan', 'ayyappan@gm.com', 'admin1588728945.jpg', '8675002552', '1', '', 1, '2019-01-04 17:41:27'),
(10, 'nithya', '$2y$12$3zsOKvqqj41sqTvAdDl1HO/.f3pXE8nXCXKvlHXCyO7qotgY4QZ/e', 'Nithya', 'nithya@hyper.com', '', '9876543210', '1', NULL, 0, '2020-05-05 16:03:34');

-- --------------------------------------------------------

--
-- Table structure for table `adminlog`
--

DROP TABLE IF EXISTS `adminlog`;
CREATE TABLE IF NOT EXISTS `adminlog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(2000) NOT NULL,
  `action` varchar(2000) DEFAULT NULL,
  `time` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=55 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `adminlog`
--

INSERT INTO `adminlog` (`id`, `name`, `action`, `time`) VALUES
(1, '2', 'Banner deleted', '2020-06-08 15:33:47'),
(2, '2', 'Banner deleted', '2020-06-08 15:34:28'),
(3, '2', 'Banner deleted', '2020-06-08 15:35:43'),
(4, '2', 'Banner deleted', '2020-06-08 15:37:25'),
(5, '2', 'Banner deleted', '2020-06-08 15:38:33'),
(6, '2', 'category Updated', '2020-06-08 15:44:57'),
(7, '2', 'category Updated', '2020-06-08 15:53:07'),
(8, '2', 'category Updated', '2020-06-08 15:53:19'),
(9, '2', 'category Updated', '2020-06-08 15:53:31'),
(10, '2', 'category Updated', '2020-06-08 15:53:40'),
(11, '2', 'category Updated', '2020-06-08 15:55:11'),
(12, '2', 'category Updated', '2020-06-08 15:55:22'),
(13, '2', 'category Updated', '2020-06-08 15:55:56'),
(14, '2', 'tag Updated', '2020-06-08 15:57:42'),
(15, '2', 'Product deleted', '2020-06-08 16:39:26'),
(16, 'ayyappan@gm.com', 'login', '2020-06-08 18:28:52'),
(17, '2', 'category Updated', '2020-06-08 18:29:48'),
(18, 'ayyappan@gm.com', 'login', '2020-06-08 21:37:35'),
(19, 'ayyappan@gm.com', 'login', '2020-06-09 09:23:41'),
(20, '2', 'Blog deleted', '2020-06-09 13:16:51'),
(21, '2', 'Blog deleted', '2020-06-09 13:16:54'),
(22, 'ayyappan@gm.com', 'login', '2020-06-12 13:53:05'),
(23, 'ayyappan@gm.com', 'login', '2020-06-12 14:07:57'),
(24, 'ayyappan@gm.com', 'login', '2020-07-18 16:35:20'),
(25, '2', 'Subcategory deleted', '2020-07-22 09:51:08'),
(26, '2', 'Sub category Updated', '2020-07-22 09:52:05'),
(27, '2', 'Sub category Updated', '2020-07-22 10:12:08'),
(28, '2', 'Product Updated', '2020-07-22 11:57:02'),
(29, '2', 'Product Updated', '2020-07-22 12:29:46'),
(30, '2', 'Product Updated', '2020-07-22 12:30:32'),
(31, '2', 'Product Updated', '2020-07-22 12:30:37'),
(32, '2', 'Product Updated', '2020-07-22 12:30:41'),
(33, '2', 'Product Updated', '2020-07-22 12:30:54'),
(34, '2', 'Product Updated', '2020-07-22 12:35:12'),
(35, '2', 'Product Updated', '2020-07-22 12:41:48'),
(36, '2', 'Product Updated', '2020-07-22 12:41:55'),
(37, '2', 'Product Updated', '2020-07-22 12:42:00'),
(38, '2', 'Product Updated', '2020-07-22 12:42:44'),
(39, '2', 'Product Updated', '2020-07-22 12:43:07'),
(40, '2', 'Product Updated', '2020-07-22 12:43:12'),
(41, '2', 'Product Updated', '2020-07-22 12:43:53'),
(42, 'ayyappan@gm.com', 'login', '2020-07-22 14:01:59'),
(43, 'ayyappan@gm.com', 'login', '2020-07-22 20:06:35'),
(44, 'ayyappan', 'login', '2020-08-02 10:36:41'),
(45, 'ayyappan', 'login', '2020-08-02 13:57:41'),
(46, 'ayyappan', 'login', '2020-08-02 16:54:40'),
(47, 'ayyappan', 'login', '2020-08-02 20:01:38'),
(48, 'ayyappan', 'login', '2020-08-17 08:39:20'),
(49, 'ayyappan', 'login', '2020-08-17 08:40:12'),
(50, 'admin', 'login', '2020-08-19 12:29:54'),
(51, 'admin', 'login', '2020-08-19 21:18:44'),
(52, 'admin', 'login', '2020-08-19 21:21:47'),
(53, 'admin', 'login', '2020-10-03 11:48:50'),
(54, 'admin', 'login', '2023-07-18 22:33:27');

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

DROP TABLE IF EXISTS `banner`;
CREATE TABLE IF NOT EXISTS `banner` (
  `ban_id` int(11) NOT NULL AUTO_INCREMENT,
  `ban_title` varchar(2000) DEFAULT NULL,
  `ban_image` varchar(2000) DEFAULT NULL,
  `ban_created_on` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`ban_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`ban_id`, `ban_title`, `ban_image`, `ban_created_on`) VALUES
(1, 'a', 'banner1595390527.jpg', '2023-07-18 16:45:18'),
(2, 'a', 'banner1595390535.gif', '2023-07-18 16:45:18'),
(3, 'a', 'banner1595390540.png', '2023-07-18 16:45:18'),
(4, 'a', 'banner1595390546.gif', '2023-07-18 16:45:18'),
(5, 'a', 'banner1595390553.png', '2023-07-18 16:45:18');

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

DROP TABLE IF EXISTS `blog`;
CREATE TABLE IF NOT EXISTS `blog` (
  `b_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(2000) NOT NULL,
  `detail` varchar(2000) NOT NULL,
  `image` varchar(2000) NOT NULL,
  `views` int(11) NOT NULL DEFAULT 0,
  `dated` varchar(200) DEFAULT NULL,
  `b_created_on` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`b_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`b_id`, `title`, `detail`, `image`, `views`, `dated`, `b_created_on`) VALUES
(3, 'What is Lorem Ipsum?', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'blog1591688837.jpg', 0, '09 Jun 2020', '2023-07-18 16:45:18'),
(4, 'Why do we use it?', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'blog1591688854.jpg', 0, '09 Jun 2020', '2023-07-18 16:45:18'),
(5, 'Where does it come from?', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.\r\n\r\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.', 'blog1591688892.jpg', 0, '09 Jun 2020', '2023-07-18 16:45:18'),
(6, 'What is Lorem Ipsum', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum\r\n\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum\r\n\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', 'blog1591688938.jpg', 4, '09 Jun 2020', '2023-07-18 16:45:18'),
(7, 'asfasgas', 'agasg', 'blog1591951273.jpg', 0, '12 Jun 2020', '2023-07-18 16:45:18');

-- --------------------------------------------------------

--
-- Table structure for table `blog_image`
--

DROP TABLE IF EXISTS `blog_image`;
CREATE TABLE IF NOT EXISTS `blog_image` (
  `pi_id` int(11) NOT NULL AUTO_INCREMENT,
  `p_id` int(11) NOT NULL,
  `pi_image` varchar(2000) NOT NULL,
  `pi_created_on` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`pi_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

DROP TABLE IF EXISTS `booking`;
CREATE TABLE IF NOT EXISTS `booking` (
  `b_id` int(11) NOT NULL AUTO_INCREMENT,
  `u_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `b_price` varchar(200) NOT NULL,
  `b_quantity` varchar(200) NOT NULL,
  `book_type` varchar(200) DEFAULT NULL,
  `booking_complete` int(11) NOT NULL DEFAULT 0,
  `delivery_range` varchar(2000) DEFAULT NULL,
  `b_address` varchar(2000) DEFAULT NULL,
  `zip` varchar(200) NOT NULL,
  `b_city` varchar(2000) DEFAULT NULL,
  `b_phone` varchar(200) DEFAULT NULL,
  `payment_status` varchar(200) NOT NULL DEFAULT 'U' COMMENT 'W-waiting, P-paid,C-cod',
  `pay_ref` varchar(2000) DEFAULT NULL,
  `b_send_summary` varchar(2000) DEFAULT NULL,
  `b_received` int(11) NOT NULL DEFAULT 0,
  `b_created_on` datetime NOT NULL DEFAULT current_timestamp(),
  `admin_seen` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`b_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`b_id`, `u_id`, `p_id`, `b_price`, `b_quantity`, `book_type`, `booking_complete`, `delivery_range`, `b_address`, `zip`, `b_city`, `b_phone`, `payment_status`, `pay_ref`, `b_send_summary`, `b_received`, `b_created_on`, `admin_seen`) VALUES
(1, 17, 2, '271.4', '2', 'P', 1, 'Trichy', 'gsdgsgds', '235235', 'dgsdg', '9486845856	', 'P', 'pay_FLvKA0yVKgg1VC', 'sdgsgsdgsdg', 1, '2020-08-02 19:44:48', 0),
(2, 17, 2, '236.0', '1', 'C', 1, 'Trichy', 'gsdgsgds', '235235', 'dgsdg', '9486845856	', 'C', 'COD', NULL, 0, '2020-08-02 19:45:54', 0),
(3, 17, 2, '413.0', '2', 'C', 1, 'Trichy', 'gsdgsgds', '235235', 'dgsdg', '9486845856	', 'C', 'COD', NULL, 0, '2020-08-02 19:46:30', 0),
(4, 6, 2, '177', '1', 'C', 0, 'Chennai', 'wetwet', '3535', '3535', '9486884277', 'W', NULL, NULL, 0, '2020-08-11 13:11:24', 0),
(5, 6, 2, '177', '1', 'C', 0, 'Chennai', 'ffhdh', '333333', 'dfhdfh', '9879879879', 'W', NULL, NULL, 0, '2020-08-11 16:55:58', 0),
(6, 6, 2, '1781.8', '6', 'C', 1, 'Trichy', '13 Bharathidasan Street', '630001', 'KKDI', '9486884277', 'C', 'COD', NULL, 0, '2020-10-03 12:18:22', 0),
(7, 6, 2, '271.4', '2', 'C', 0, 'Chennai', '13 Bharathidasan Street', '630001', 'karaikudi', '9486884277', 'W', NULL, NULL, 0, '2020-10-10 19:50:44', 0);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `c_id` int(11) NOT NULL AUTO_INCREMENT,
  `u_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1,
  `c_status` int(11) NOT NULL DEFAULT 0,
  `c_booking_id` int(11) NOT NULL DEFAULT 0,
  `c_created_on` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`c_id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`c_id`, `u_id`, `p_id`, `quantity`, `c_status`, `c_booking_id`, `c_created_on`) VALUES
(1, 17, 14, 1, 1, 1, '2023-07-18 16:45:18'),
(2, 17, 13, 1, 1, 1, '2023-07-18 16:45:18'),
(3, 17, 11, 1, 1, 2, '2023-07-18 16:45:18'),
(4, 17, 12, 1, 1, 3, '2023-07-18 16:45:18'),
(5, 17, 11, 1, 1, 3, '2023-07-18 16:45:18'),
(6, 17, 14, 1, 0, 0, '2023-07-18 16:45:18'),
(7, 17, 13, 1, 0, 0, '2023-07-18 16:45:18'),
(10, 6, 3, 2, 1, 6, '2023-07-18 16:45:18'),
(11, 6, 2, 3, 1, 6, '2023-07-18 16:45:18'),
(12, 6, 5, 1, 1, 6, '2023-07-18 16:45:18'),
(13, 6, 14, 1, 0, 0, '2023-07-18 16:45:18'),
(14, 6, 13, 1, 0, 0, '2023-07-18 16:45:18');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(2000) DEFAULT NULL,
  `cat_detail` varchar(2000) NOT NULL,
  `cat_image` varchar(2000) DEFAULT NULL,
  `cat_active` int(11) NOT NULL DEFAULT 1,
  `cat_created_on` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`cat_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`, `cat_detail`, `cat_image`, `cat_active`, `cat_created_on`) VALUES
(7, 'Eggs', 'Eggs', 'eee.jpg', 1, '2023-07-18 16:45:18'),
(8, 'Others', 'Others', 'ggg.jpg', 1, '2023-07-18 16:45:18'),
(1, 'Offer', 'Offer', 'hhh.jpg', 1, '2023-07-18 16:45:18'),
(2, 'Chicken', 'Chicken', 'aaa.jpg', 1, '2023-07-18 16:45:18'),
(3, 'Mutton', 'Mutton', 'bbb.jpg', 1, '2023-07-18 16:45:18'),
(4, 'Sea Food', 'Sea Food', 'ccc.jpg', 1, '2023-07-18 16:45:18'),
(5, 'Ready to Cook', 'Ready to Cook', 'ddd.jpg', 1, '2023-07-18 16:45:18'),
(6, 'Cut Piece', 'Cut Piece', 'fff.jpg', 1, '2023-07-18 16:45:18');

-- --------------------------------------------------------

--
-- Table structure for table `favorite`
--

DROP TABLE IF EXISTS `favorite`;
CREATE TABLE IF NOT EXISTS `favorite` (
  `f_id` int(11) NOT NULL AUTO_INCREMENT,
  `u_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `f_created_on` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`f_id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `favorite`
--

INSERT INTO `favorite` (`f_id`, `u_id`, `p_id`, `f_created_on`) VALUES
(1, 13, 8, '2023-07-18 16:45:18'),
(2, 6, 7, '2023-07-18 16:45:18'),
(3, 6, 6, '2023-07-18 16:45:18'),
(4, 6, 4, '2023-07-18 16:45:18'),
(5, 6, 3, '2023-07-18 16:45:18'),
(6, 6, 9, '2023-07-18 16:45:18'),
(9, 6, 14, '2023-07-18 16:45:18'),
(8, 6, 1, '2023-07-18 16:45:18'),
(10, 15, 13, '2023-07-18 16:45:18'),
(11, 6, 2, '2023-07-18 16:45:18'),
(12, 6, 5, '2023-07-18 16:45:18');

-- --------------------------------------------------------

--
-- Table structure for table `help`
--

DROP TABLE IF EXISTS `help`;
CREATE TABLE IF NOT EXISTS `help` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `detail` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `help`
--

INSERT INTO `help` (`id`, `detail`) VALUES
(1, 'Help Document for Application \r\nYou can update this page from admin panel'),
(3, 'vjhvjhvjhvhv');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `p_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(2000) NOT NULL,
  `detail` varchar(2000) NOT NULL,
  `category_id` varchar(200) NOT NULL,
  `sub_cat` varchar(2000) NOT NULL,
  `tag` varchar(200) DEFAULT NULL,
  `image` varchar(2000) NOT NULL,
  `mrp` varchar(200) DEFAULT NULL,
  `offer` varchar(200) DEFAULT NULL,
  `material` varchar(200) DEFAULT NULL,
  `washable` varchar(200) DEFAULT NULL,
  `activity` varchar(200) DEFAULT NULL,
  `battery` varchar(200) DEFAULT NULL,
  `batterycount` varchar(200) DEFAULT NULL,
  `content` varchar(200) DEFAULT NULL,
  `brand` varchar(200) DEFAULT NULL,
  `warrenty` varchar(200) DEFAULT NULL,
  `age` varchar(200) DEFAULT NULL,
  `height` varchar(200) DEFAULT NULL,
  `length` varchar(200) DEFAULT NULL,
  `width` varchar(200) DEFAULT NULL,
  `weight` varchar(200) DEFAULT NULL,
  `p_active` int(11) NOT NULL DEFAULT 1,
  `p_available` int(11) NOT NULL DEFAULT 1,
  `p_views` int(11) NOT NULL DEFAULT 0,
  `p_likes` int(11) NOT NULL DEFAULT 0,
  `p_created_on` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`p_id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`p_id`, `title`, `detail`, `category_id`, `sub_cat`, `tag`, `image`, `mrp`, `offer`, `material`, `washable`, `activity`, `battery`, `batterycount`, `content`, `brand`, `warrenty`, `age`, `height`, `length`, `width`, `weight`, `p_active`, `p_available`, `p_views`, `p_likes`, `p_created_on`) VALUES
(1, 'Chicken Curry Cut (Small)', 'Your chicken curry essential to be. Half a chicken cut to bite-sized pieces including one leg (cut into two halves), a wing without the tip, one breast quarter with backbone. A complementary mix of both white and dark, skinned, bone-in meat, Chicken Curry cut is ideal to get a taste of soft and comparatively tougher meat all packed into one dish.', 'Chicken', '1', '1  2  3  4  5  6  ', 'product1595407904.jpg', '145', '200', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 6, 0, '2023-07-18 16:45:18'),
(2, 'Country Chicken (Nati Koli) - Curry Cut', 'Raised all natural, taste the an addiction in the making. Our country chickens offer full-bodied flavour and higher nutritional value in every bite. Dig into skin on pieces of one leg, a wing without the tip, one breast quarter with backbone. An acquired taste, the aromatic and game-like flavour sets this apart from being just another chicken dinner.', 'Chicken', '2', '3  4  5  6  7  8  9  10  11  12  13  ', 'product1595408813.jpg', '320', '350', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 3, 0, '2023-07-18 16:45:18'),
(3, 'Chicken Curry Cut - With Skin (Small)', 'Spike your chicken curries with this skin on cut. Half a chicken cut into bite-sized pieces including one leg, a wing without the tip, one breast quarter with backbone. A complementary mix of both white and dark, skin-on, bone-in meat, ideal to get a taste of soft and comparatively tougher meat all packed in one dish. Enjoy the emulsion of the skin as it adds another dimension to your curries.', 'Chicken', '1', '2  3  4  5  6  7  8  9  11  12  ', 'product1595408926.jpg', '150', '200', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 2, 0, '2023-07-18 16:45:18'),
(4, 'Chicken Lollipop', 'The meaty and toothsome bite to begin every meal with. Frenched chicken wingsâ€”meat cut from the tip and pushed down the bone, Chicken Lollipop makes a classic Indian meal starter. With a rolled meat appearance and a clean bone for a handle, it offers a mouthful of tasty, soft meat in every bite.', 'Chicken', '1', '2  3  4  5  6  8  9  10  11  12  13  ', 'product1595409019.jpg', '120', '150', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 4, 0, '2023-07-18 16:45:18'),
(5, 'Chicken Tikka Cut- Boneless', 'Bite into these bite-sized chunks of signature Licious chicken for the ultimate melt-Â­in-the-mouth tikka treat! Boneless, skinless, succulent pieces taken from the breast and leg portions thatâ€™s guaranteed to elevate your meat experience to extraordinary. Whether itâ€™s Chicken Tikka Masala or Chilli Chicken, try it to give your culinary experiments the right expression.', 'Chicken', '1', '8  9  10  11  12  13  ', 'product1595409080.jpg', '250', '300', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 2, 0, '2023-07-18 16:45:18'),
(6, 'Chicken Drumstick', 'For that craving to bite into something chunky and juicy. Dark, tender meat with bone from the lower leg of the chicken, Chicken Drumsticks are distinctly different from chicken thighs in their silken texture and their readiness to plump up in delicious juiciness when cooked. Skinless, they offer lower calories and a unique flavour enhanced by the bone.', 'Chicken', '2', '2  3  4  5  6  9  10  11  12  13  ', 'product1595409227.jpg', '230', '250', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 0, 0, '2023-07-18 16:45:18'),
(7, 'Lean Goat Curry Cut', 'With our Lean Goat Curry Cut, you get the subtle gamey essence of fresh goat meat and a velvety bite that melts in your mouth when cooked. Choose our lean, tender, easy-to-cook cuts to get more protein and nutrients. We bring you the choicest bite-sized pieces of premium goat meat on the bone from the ribs, leg and shoulder. It is extremely well suited for a variety of dishes like luscious khurmas, soulful stews, aromatic curries, juicy and tender pan-fried and pan-roasted kebabs.', 'Mutton', '8', '8  9  10  11  12  13  ', 'product1595409397.jpg', '600', '700', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 2, 0, '2023-07-18 16:45:18'),
(8, 'Brown Eggs', 'Brown shelled eggs with a soft and firm egg white and a bright orange creamy yolk laid naturally by healthy chickens for a flavour boost to any meal. The humane raising of our chickens and natural processing conditions impart a richer and sharper flavour to our eggs. They\'re a natural source of Vitamin D and are a rich source of protein.', 'Eggs', '9', '3  4  5  ', 'product1595409694.jpg', '60', '80', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 3, 0, '2023-07-18 16:45:18'),
(9, 'Classic eggs (Pack of 30)', 'The ultimate breakfast club inductee. Classic white shelled eggs with a pale yellow yolk laid naturally by healthy chickens for a flavour boost to any meal. The humane raising of our chickens and natural processing conditions, impart a richer and more sharp-tasting flavour to our eggs.', 'Eggs', '9', '2  4  5  6  ', 'product1595409751.jpg', '120', '150', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, 0, '2023-07-18 16:45:18'),
(10, 'Prawns Medium w/o Tail (cleaned, deveined)', 'The crustacean for everyday gratification! Cleaned with head removed, and ready-to-cook, take your dose of indulgence with this medium-sized bite without all that hassle of prep. Ideal for curries, stir fry and biryanis', 'Sea Food', '6', '9  10  11  12  13  ', 'product1595410306.jpg', '500', '600', '50', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 3, 0, '2023-07-18 16:45:18'),
(11, 'Aar - Bengali Cut, W/O Head', 'From the catfish family, Aar is a freshwater fish from the Western rivers of South India. Cleaned and carved into the essential Bengali cut with head and tail. Bite into chunky slabs of mild tasting, delicate textured meat. Revive your fish dishes with this versatile fish.', 'Sea Food', '4', '4  5  6  9  10  11  12  ', 'product1595410373.jpg', '200', '250', '4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 5, 0, '2023-07-18 16:45:18'),
(12, 'Tengra', 'A wholesome meal for sure. Savour this cleaned and gutted fish in all its glory, whole. Distinctly sweet flavoured, it is the choice if you\'re in the mood for something subtle tasting. Characteristically mild, you\'d love the element of delicacy about this fish. Try it and join the club of all its dedicated fans who swear by its flavour.', 'Sea Food', '4', '6  7  8  9  10  11  12  ', 'product1595410446.jpg', '150', '170', '10', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, 0, '2023-07-18 16:45:18'),
(13, 'Barracuda (Kanaki) - Steaks', 'They taste like how they look - strong and very distinct. These steaks are crafted from the popular barracuda that offers a unique, full-bodied flavour and a firm large flakes for texture. Fleshy, they are utterly appatising making them a delight to be had. Try these meaty steaks and discover your new obsession.', 'Sea Food', '4', '9  10  11  12  13  ', 'product1595410501.jpg', '80', '120', '7', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 23, 1, '2023-07-18 16:45:18'),
(14, 'Thyme and Paprika Roast Chicken - Spatchcock (Half)', 'Our pre-marinated Thyme and Paprika Chicken, butterfly/spatchcock cut, is super delicious, easy to cook and lets you enjoy your party. The herb and spice mix with garlic gives the chicken a robust flavour and makes the meat juicy. This chicken classic is yours to savour!', 'Chicken', '3', '3  4  5  7  8  9  10  11  12  13  ', 'product1595410610.jpg', '150', '200', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 89, 0, '2023-07-18 16:45:18');

-- --------------------------------------------------------

--
-- Table structure for table `product_image`
--

DROP TABLE IF EXISTS `product_image`;
CREATE TABLE IF NOT EXISTS `product_image` (
  `pi_id` int(11) NOT NULL AUTO_INCREMENT,
  `p_id` int(11) NOT NULL,
  `pi_image` varchar(2000) NOT NULL,
  `pi_created_on` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`pi_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `product_image`
--

INSERT INTO `product_image` (`pi_id`, `p_id`, `pi_image`, `pi_created_on`) VALUES
(1, 1, 'productmore_5f166ce8d3409.png', '2023-07-18 16:45:18'),
(2, 1, 'productmore_5f166cf1a5a62.png', '2023-07-18 16:45:18'),
(3, 14, 'productimages1595428703.jpg', '2023-07-18 16:45:18'),
(4, 14, 'productimages1595428710.jpg', '2023-07-18 16:45:18');

-- --------------------------------------------------------

--
-- Table structure for table `shop_range`
--

DROP TABLE IF EXISTS `shop_range`;
CREATE TABLE IF NOT EXISTS `shop_range` (
  `r_id` int(11) NOT NULL AUTO_INCREMENT,
  `range_name` varchar(2000) NOT NULL,
  `range_detail` varchar(2000) NOT NULL,
  `r_created_on` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`r_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `shop_range`
--

INSERT INTO `shop_range` (`r_id`, `range_name`, `range_detail`, `r_created_on`) VALUES
(1, 'Chennai', 'Chennai Based Circle', '2023-07-18 16:45:18'),
(2, 'Trichy', 'Trichy Based Circle', '2023-07-18 16:45:18'),
(3, 'dfsf', 'sdfsd', '2023-07-18 16:45:18');

-- --------------------------------------------------------

--
-- Table structure for table `subcategory`
--

DROP TABLE IF EXISTS `subcategory`;
CREATE TABLE IF NOT EXISTS `subcategory` (
  `sub_id` int(11) NOT NULL AUTO_INCREMENT,
  `cat` varchar(2000) NOT NULL,
  `sub_name` varchar(2000) NOT NULL,
  `sub_detail` varchar(2000) NOT NULL,
  `sub_active` int(11) NOT NULL DEFAULT 1,
  `sub_created_on` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`sub_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `subcategory`
--

INSERT INTO `subcategory` (`sub_id`, `cat`, `sub_name`, `sub_detail`, `sub_active`, `sub_created_on`) VALUES
(1, 'Chicken', 'Proiler Chicken', 'Proiler Chicken', 1, '2023-07-18 16:45:18'),
(2, 'Chicken', 'Country Chicken', 'Country Chicken', 1, '2023-07-18 16:45:18'),
(3, 'Chicken', 'Full Chicken', 'Full Chicken', 1, '2023-07-18 16:45:18'),
(4, 'Sea Food', 'Fish', 'Fish', 1, '2023-07-18 16:45:18'),
(5, 'Sea Food', 'Crab', 'Crab', 1, '2023-07-18 16:45:18'),
(6, 'Sea Food', 'Prawn', 'Prawn', 1, '2023-07-18 16:45:18'),
(7, 'Sea Food', 'Big Fish', 'Big Fish', 1, '2023-07-18 16:45:18'),
(8, 'Mutton', 'Mutton Meat', 'Mutton Meat', 1, '2023-07-18 16:45:18'),
(9, 'Eggs', 'Eggs', 'Eggs', 1, '2023-07-18 16:45:18');

-- --------------------------------------------------------

--
-- Table structure for table `tag`
--

DROP TABLE IF EXISTS `tag`;
CREATE TABLE IF NOT EXISTS `tag` (
  `tag_id` int(11) NOT NULL AUTO_INCREMENT,
  `tag_name` varchar(2000) DEFAULT NULL,
  `tag_active` int(11) NOT NULL DEFAULT 1,
  `tag_created_on` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`tag_id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tag`
--

INSERT INTO `tag` (`tag_id`, `tag_name`, `tag_active`, `tag_created_on`) VALUES
(1, 'Fast Delivery', 1, '2023-07-18 16:45:18'),
(2, '3 Hours Delivery', 1, '2023-07-18 16:45:18'),
(3, 'Door step Delivery', 1, '2023-07-18 16:45:18'),
(4, 'Fresh Garenty', 1, '2023-07-18 16:45:18'),
(5, 'Case on Delivery', 1, '2023-07-18 16:45:18'),
(6, 'Free Shipping', 1, '2023-07-18 16:45:18'),
(7, 'Hand selected after age and weight calibration', 1, '2023-07-18 16:45:18'),
(8, '100% free of antibiotic residue and hormones', 1, '2023-07-18 16:45:18'),
(9, 'Hygienically vacuum-packed', 1, '2023-07-18 16:45:18'),
(10, 'Temperature controlled Between 4 Â°C -8 Â°C', 1, '2023-07-18 16:45:18'),
(11, 'Meat of genetically modified chickens', 1, '2023-07-18 16:45:18'),
(12, 'Meat of chicken on growth promoters', 1, '2023-07-18 16:45:18'),
(13, 'Mix of Offal Organs', 1, '2023-07-18 16:45:18');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `u_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(2000) DEFAULT NULL,
  `phone` varchar(2000) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `profile` varchar(200) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `city` varchar(200) DEFAULT NULL,
  `address` varchar(2000) DEFAULT NULL,
  `active` int(11) NOT NULL DEFAULT 1,
  `u_created_on` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`u_id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`u_id`, `name`, `phone`, `email`, `profile`, `password`, `city`, `address`, `active`, `u_created_on`) VALUES
(6, 'Ayyappan', '9486884277', 'user@royalmeat.com', NULL, '111', 'KKDI', NULL, 1, '2023-07-18 16:45:18'),
(8, 'Ayyappan', '94868842277', 'what@gm.com', NULL, '123', 'kkdiss', 'sfasf', 1, '2023-07-18 16:45:18'),
(9, 'asfaaaaasf', '88888888888', 'asfasf', NULL, '222', 'safasf', NULL, 1, '2023-07-18 16:45:18'),
(10, 'sasd', '22424', 'sasf', NULL, '111', NULL, NULL, 1, '2023-07-18 16:45:18'),
(11, 'fsdg', '3333', 'asfsaf', NULL, '22', '', NULL, 1, '2023-07-18 16:45:18'),
(12, 'Ashok', '987654321', 'dddd@dd.com', NULL, '111', NULL, NULL, 1, '2023-07-18 16:45:18'),
(13, 'Ayyappan', '9186884236', 'info@gm.com', NULL, '123', '', NULL, 1, '2023-07-18 16:45:18'),
(14, 'Ayyappan', '9486884278', 'who@gmail.com', NULL, '123', '', NULL, 1, '2023-07-18 16:45:18'),
(15, 'adasd', '2321', 'aa@aa.com', NULL, '123', NULL, NULL, 1, '2023-07-18 16:45:18'),
(16, 'Deno', '8798789878', 'ee@ee.com', NULL, '123', NULL, NULL, 1, '2023-07-18 16:45:18'),
(17, 'Ayyap	', '9486845856	', 'info@rm.com', NULL, '111', '', NULL, 1, '2023-07-18 16:45:18');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
