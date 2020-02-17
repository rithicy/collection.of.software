-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 24, 2019 at 08:42 PM
-- Server version: 10.3.15-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `instinct`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `user_id` int(11) NOT NULL,
  `firstname` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nickname` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthdate` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ip_address` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`user_id`, `firstname`, `lastname`, `nickname`, `email`, `profile`, `password`, `phone`, `address`, `role`, `birthdate`, `ip_address`, `created_at`) VALUES
(0, 'Somrith', 'Kuy', 'admin@admin.com ', 'admin@admin.com', 'default.png', '21232f297a57a5a743894a0e4a801fc3', '097 687 39 92', 'test', '', '2019-08-05', '', '2019-08-24 17:00:57'),
(1, 'nita', 'nita', 'nita@gmail.com ', 'kuysomrith@gmail.com', 'default.png', '21232f297a57a5a743894a0e4a801fc3', '01234', 'Singapure', '', '11 March 1980', '', '2019-08-24 17:00:38');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin_role`
--

CREATE TABLE `tbl_admin_role` (
  `user_role_id` int(11) NOT NULL,
  `user_role_value` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_admin_role`
--

INSERT INTO `tbl_admin_role` (`user_role_id`, `user_role_value`) VALUES
(1, 'Administrator'),
(2, 'Editor'),
(3, 'Author'),
(4, 'Contributor');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_advertise`
--

CREATE TABLE `tbl_advertise` (
  `id` int(11) NOT NULL,
  `title` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img_source` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_advertise`
--

INSERT INTO `tbl_advertise` (`id`, `title`, `img_source`, `detail`, `created_at`) VALUES
(5, 'ad 1', 'Thefashion_20161129153831-951091.jpg', 'ad 1', '2019-08-24 18:19:23'),
(6, 'ad 2', 'Thefashion_20180201163145-316360.png', 'ad 2', '2019-08-24 18:28:53');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `category_id` int(11) NOT NULL,
  `category_value` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`category_id`, `category_value`) VALUES
(1, 'Men'),
(2, 'Women'),
(3, 'Couple'),
(12, 'Accesssories');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_color`
--

CREATE TABLE `tbl_color` (
  `color_id` int(11) NOT NULL,
  `color_value` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_color`
--

INSERT INTO `tbl_color` (`color_id`, `color_value`) VALUES
(1, 'Grey'),
(2, 'Black Red'),
(3, 'Black and White');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `shipping_id` int(11) NOT NULL,
  `destination` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ordered_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `delivery_duration` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deliveried_date` datetime NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`shipping_id`, `destination`, `ordered_date`, `delivery_duration`, `deliveried_date`, `product_id`, `user_id`) VALUES
(1, 'Phnom Penh', '2019-08-16 15:03:44', '10 days', '2019-08-22 18:31:48', 1, 1),
(2, 'Korea', '2019-08-16 15:03:55', '10 days', '2019-08-26 20:35:51', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_overview`
--

CREATE TABLE `tbl_overview` (
  `overview_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `img_src` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `product_id` tinyint(11) NOT NULL,
  `name` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` float NOT NULL,
  `size_id` int(11) NOT NULL,
  `type` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumbnail` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`product_id`, `name`, `code`, `price`, `size_id`, `type`, `thumbnail`, `description`, `category_id`, `subcategory_id`, `user_id`, `created_at`) VALUES
(30, 'Sports shoes mens', 'SSH801744', 17.5, 0, 'popular', 'shoeforman234.jpg', 'Sports shoes mens summer breathable mesh shoes men casual shoes deodorant', 1, 1, 0, '2019-08-24 17:21:56'),
(31, 'New mens shoes', '973886', 17.5, 0, 'popular', 'O1CN01i71fRG27WHPCP3GWM_!!0-item_pic.jpg_500x500.jpg', 'New mens shoes spring shoes mens Korean version of the trend of sports and leisure shoes', 1, 1, 0, '2019-08-24 17:21:58'),
(32, 'Summer breathable mesh shoes', '505177', 15.5, 0, 'new', 'Thefashion_20190813142416-473132.jpg', 'Summer breathable mesh shoes hollow deodorant soft bottom casual shoes mens shoes', 1, 1, 0, '2019-08-24 17:22:28'),
(33, 'new peas shoes men', '680054', 15.5, 0, 'new', 'O1CN01ODcOzb2MGuNDPNC2Y_!!353909801.jpg_500x500.jpg', 'new peas shoes mens spring Korean version of the trend of mens shoes tide shoes social fast', 1, 1, 0, '2019-08-24 17:22:28'),
(34, 'new spring wild white shoes', '247762', 17.5, 0, 'new', 'TB1piF_nnvI8KJjSspjYXIgjXXa_M2.SS2_500x500.jpg', 'new spring wild white shoes female students Korean white shoes embroidery casual canvas shoes', 1, 1, 0, '2019-08-24 17:22:29'),
(35, 'Mens shoes summer breathable', '417013', 15.5, 0, 'instock', 'Thefashion_20190813151655-442909.jpg', 'Mens shoes summer breathable mesh summer sports shoes casual shoes deodorant hollow mesh', 1, 1, 0, '2019-08-24 17:22:33'),
(36, 'Student watch male simple', '353981', 11, 0, 'instock', 'Thefashion_20190811163702-055627.jpg', 'Student watch male simple junior high school student high school student trend ulzzang', 1, 3, 0, '2019-08-24 17:22:42'),
(48, 'waterproof sports shoes', 'SSH801111', 17.5, 0, 'new', 'O1CN01ODcOzb2MGuNDPNC2Y_!!353909801.jpg_500x500.jpg', 'wwww', 1, 1, 0, '2019-08-24 18:33:22');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product_image`
--

CREATE TABLE `tbl_product_image` (
  `productimg_id` int(11) NOT NULL,
  `productimg_value` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` int(11) NOT NULL,
  `productimg_url` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_product_image`
--

INSERT INTO `tbl_product_image` (`productimg_id`, `productimg_value`, `product_id`, `productimg_url`) VALUES
(1, 'Gray', 1, 'O1CN01is1UJN2ESnkDvH5Tz_!!2232648744.jpg_500x500.jpg'),
(2, 'Black Red', 1, 'O1CN01is1UJN2ESnkDvH5Tz_!!2232648744.jpg_500x500.jpg'),
(3, 'Black and white', 1, 'O1CN01is1UJN2ESnkDvH5Tz_!!2232648744.jpg_500x500.jpg'),
(4, 'White Red', 30, 'O1CN01is1UJN2ESnkDvH5Tz_!!2232648744.jpg_500x500.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sponsor`
--

CREATE TABLE `tbl_sponsor` (
  `id` int(11) NOT NULL,
  `detail` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img_src` int(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subcategory`
--

CREATE TABLE `tbl_subcategory` (
  `subcategory_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `category_value` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_subcategory`
--

INSERT INTO `tbl_subcategory` (`subcategory_id`, `category_id`, `category_value`) VALUES
(1, 1, 'Shoes'),
(2, 1, 'Shirt'),
(3, 1, 'Watch'),
(16, 1, 'Belt'),
(17, 2, 'Bag');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(11) NOT NULL,
  `firstname` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nickname` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthdate` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ip_address` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `firstname`, `lastname`, `nickname`, `profile`, `email`, `password`, `phone`, `address`, `birthdate`, `ip_address`, `created_at`) VALUES
(0, 'Pich', 'Sreysros', 'Liza', 'default.png', 'sreysros@gmail.com', 'd8578edf8458ce06fbc5bb76a58c5ca4', '069933378', 'Phnom penh', '01 Jan 1970', '345.554.443.008', '2019-08-16 14:25:06'),
(1, 'Lee', 'Min Ho', 'Bros sart', 'default.png', 'leeminh@gmail.com', 'd8578edf8458ce06fbc5bb76a58c5ca4', '012345678', 'Korea', '01 Jan 1970', '345.554.443.008', '2019-08-15 12:36:41'),
(2, 'Ronaldo', 'Cristino', '', 'default.png', 'ronaldo@manu.com', 'd8578edf8458ce06fbc5bb76a58c5ca4', '012345678', 'Portugal', '01 Jan 1970', '345.554.443.008', '2019-08-16 15:06:02');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_usercart`
--

CREATE TABLE `tbl_usercart` (
  `id` tinyint(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `tbl_admin_role`
--
ALTER TABLE `tbl_admin_role`
  ADD PRIMARY KEY (`user_role_id`);

--
-- Indexes for table `tbl_advertise`
--
ALTER TABLE `tbl_advertise`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `tbl_color`
--
ALTER TABLE `tbl_color`
  ADD PRIMARY KEY (`color_id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`shipping_id`);

--
-- Indexes for table `tbl_overview`
--
ALTER TABLE `tbl_overview`
  ADD PRIMARY KEY (`overview_id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `tbl_product_image`
--
ALTER TABLE `tbl_product_image`
  ADD PRIMARY KEY (`productimg_id`);

--
-- Indexes for table `tbl_sponsor`
--
ALTER TABLE `tbl_sponsor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_subcategory`
--
ALTER TABLE `tbl_subcategory`
  ADD PRIMARY KEY (`subcategory_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `tbl_usercart`
--
ALTER TABLE `tbl_usercart`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin_role`
--
ALTER TABLE `tbl_admin_role`
  MODIFY `user_role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_advertise`
--
ALTER TABLE `tbl_advertise`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_color`
--
ALTER TABLE `tbl_color`
  MODIFY `color_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `shipping_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_overview`
--
ALTER TABLE `tbl_overview`
  MODIFY `overview_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `product_id` tinyint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `tbl_product_image`
--
ALTER TABLE `tbl_product_image`
  MODIFY `productimg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_sponsor`
--
ALTER TABLE `tbl_sponsor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_subcategory`
--
ALTER TABLE `tbl_subcategory`
  MODIFY `subcategory_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_usercart`
--
ALTER TABLE `tbl_usercart`
  MODIFY `id` tinyint(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
