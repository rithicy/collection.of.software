-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 30, 2019 at 06:21 PM
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
-- Table structure for table `tbl_mycolor`
--

CREATE TABLE `tbl_mycolor` (
  `id` int(11) NOT NULL,
  `value` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_uri` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_mycolor`
--

INSERT INTO `tbl_mycolor` (`id`, `value`, `image_uri`, `product_id`) VALUES
(1, 'Red Wine', 'https://gd4.alicdn.com/imgextra/i4/1015785338/O1CN01z4SSfj1pIqk0EGOXF_!!1015785338.jpg_500x500.jpg', 2),
(2, 'Black', 'https://gd3.alicdn.com/imgextra/i3/1015785338/O1CN01VexoFk1pIqjENnmYg_!!1015785338.jpg_500x500.jpg', 2),
(3, 'Black White', 'https://gd1.alicdn.com/bao/uploaded/i1/2830254124/TB2PoZoXtQLL1JjSZPhXXX3gVXa_!!2830254124.jpg_500x500.jpg', 3),
(4, 'Black Plate Blue', 'https://gd3.alicdn.com/bao/uploaded/i3/2830254124/TB20WgiXC3PL1JjSZFxXXcBBVXa_!!2830254124.jpg_500x500.jpg', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_myproduct`
--

CREATE TABLE `tbl_myproduct` (
  `id` int(11) NOT NULL,
  `name` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_url` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_myproduct`
--

INSERT INTO `tbl_myproduct` (`id`, `name`, `image_url`, `price`) VALUES
(1, '969993 Retro new net red with the bandage bow back green pla', 'https://gd4.alicdn.com/imgextra/i4/1015785338/O1CN01z4SSfj1pIqk0EGOXF_!!1015785338.jpg_500x500.jpg', 12.5),
(2, '968711 Womens new sexy port wind heart machine strapless ski', 'https://gd3.alicdn.com/imgextra/i3/1015785338/O1CN01VexoFk1pIqjENnmYg_!!1015785338.jpg_500x500.jpg', 12.5),
(3, 'BW484604', 'https://img.alicdn.com/imgextra/i3/2830254124/TB20WgiXC3PL1JjSZFxXXcBBVXa_!!2830254124.jpg_500x500.jpg', 12.5),
(4, 'PSH247762', 'https://gd2.alicdn.com/imgextra/i1/TB1piF_nnvI8KJjSspjYXIgjXXa_M2.SS2_500x500.jpg', 17.5);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mysize`
--

CREATE TABLE `tbl_mysize` (
  `id` int(11) NOT NULL,
  `value` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`id`, `name`, `photo`, `price`) VALUES
(15, 'INS-107722', 'TB2JRGmhl0lpuFjSszdXXcdxFXa_!!1645326347.jpg_500x500.jpg', 2.75),
(17, 'PC', '51HseKy6YIL._SX679_.jpg', 344),
(18, 'iphone', 'menu-login.png', 45);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_purchase`
--

CREATE TABLE `tbl_purchase` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` int(50) NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sex` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `name`, `sex`, `phone`, `password`) VALUES
(1, 'my name', 'F', '012 456 432', '23345'),
(2, 'qweer', 'F', '123 5667 788', 'qazswsfffg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_mycolor`
--
ALTER TABLE `tbl_mycolor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_myproduct`
--
ALTER TABLE `tbl_myproduct`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_mysize`
--
ALTER TABLE `tbl_mysize`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_purchase`
--
ALTER TABLE `tbl_purchase`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_mycolor`
--
ALTER TABLE `tbl_mycolor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_myproduct`
--
ALTER TABLE `tbl_myproduct`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_mysize`
--
ALTER TABLE `tbl_mysize`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tbl_purchase`
--
ALTER TABLE `tbl_purchase`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
