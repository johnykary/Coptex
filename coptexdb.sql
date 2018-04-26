-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 01, 2018 at 08:20 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `coptexdb`
--
CREATE DATABASE IF NOT EXISTS `coptexdb` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `coptexdb`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `isadmin` int(11) NOT NULL,
  `active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `isadmin`, `active`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `carousel`
--

DROP TABLE IF EXISTS `carousel`;
CREATE TABLE `carousel` (
  `id` int(11) NOT NULL,
  `imageurl` varchar(255) NOT NULL,
  `caption` varchar(255) NOT NULL,
  `active` int(11) NOT NULL,
  `position` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `carousel`
--

INSERT INTO `carousel` (`id`, `imageurl`, `caption`, `active`, `position`) VALUES
(7, 'img/ships_sea_light_rain_69192_1920x1080_5ac1152e9636a.jpg', '', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `imageurl` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `position` int(11) NOT NULL,
  `active` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `imageurl`, `position`, `active`, `title`, `content`) VALUES
(9, 'img/23666458_10214188879347158_1519185832_n_5ac1223b74869.jpg', 3, 1, 'Πλακέτες', ''),
(10, 'img/23666478_10214188878867146_679216243_n_5ac1224d9dfae.jpg', 3, 1, 'ΜΑΝΕΛΕΣ-ΚΟΠΤΗΡΕΣ', '');

-- --------------------------------------------------------

--
-- Table structure for table `homecontent`
--

DROP TABLE IF EXISTS `homecontent`;
CREATE TABLE `homecontent` (
  `id` int(11) NOT NULL,
  `imageurl` varchar(255) NOT NULL,
  `content` longtext NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `homecontent`
--

INSERT INTO `homecontent` (`id`, `imageurl`, `content`, `title`) VALUES
(1, 'img/cook-any-cuisine-perfectly-by-knowing-right-ingredients-use-part-1.1280x600_5ac1148ae0aeb.jpg', '<p>Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem Ipsum v</p>', '');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

DROP TABLE IF EXISTS `menu`;
CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `menuname` varchar(255) NOT NULL,
  `active` int(11) NOT NULL,
  `position` int(11) NOT NULL,
  `url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `menuname`, `active`, `position`, `url`) VALUES
(1, 'Home', 1, 1, 'index.php'),
(2, 'Categories', 1, 2, 'categories.php'),
(3, 'About', 1, 3, 'about.php'),
(4, 'Contact', 1, 4, 'contact.php');

-- --------------------------------------------------------

--
-- Table structure for table `partners`
--

DROP TABLE IF EXISTS `partners`;
CREATE TABLE `partners` (
  `id` int(11) NOT NULL,
  `position` int(11) NOT NULL,
  `partnerurl` varchar(255) NOT NULL,
  `partnerimageurl` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `partners`
--

INSERT INTO `partners` (`id`, `position`, `partnerurl`, `partnerimageurl`) VALUES
(1, 1, 'https://www.dormerpramet.com/', 'img/dormer.PNG'),
(2, 2, 'https://global.kyocera.com/', 'img/kyocera.png'),
(3, 3, 'http://www.llambrich.com/', 'img/llambrich.png'),
(4, 4, 'http://www.uop.it/', 'img/uop.png'),
(5, 5, 'https://www.latzscoop.com/en/', 'img/latz.png'),
(6, 6, 'http://www.jmcabre.com/', 'img/jmc.png'),
(7, 7, 'http://www.kimumecanic.com/k-ang-catalog.htm', 'img/kimu.png'),
(8, 8, 'https://thdgmbh.jimdo.com/', 'img/thd.png');

-- --------------------------------------------------------

--
-- Table structure for table `productdetails`
--

DROP TABLE IF EXISTS `productdetails`;
CREATE TABLE `productdetails` (
  `id` int(11) NOT NULL,
  `property1` varchar(255) NOT NULL,
  `product_Fid` int(11) NOT NULL,
  `property2` varchar(255) NOT NULL,
  `property3` varchar(255) NOT NULL,
  `property4` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `imageurl` varchar(255) NOT NULL,
  `position` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` longtext NOT NULL,
  `cat_Fid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `imageurl`, `position`, `title`, `content`, `cat_Fid`) VALUES
(13, 'img/cook-any-cuisine-perfectly-by-knowing-right-ingredients-use-part-1.1280x600_5ac114ad7029d.jpg', 1, 'koptika', '', 8);

-- --------------------------------------------------------

--
-- Table structure for table `producttablenames`
--

DROP TABLE IF EXISTS `producttablenames`;
CREATE TABLE `producttablenames` (
  `id` int(11) NOT NULL,
  `product_Fid` int(11) NOT NULL,
  `name1` varchar(255) NOT NULL,
  `name2` varchar(255) NOT NULL,
  `name3` varchar(255) NOT NULL,
  `name4` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `producttablenames`
--

INSERT INTO `producttablenames` (`id`, `product_Fid`, `name1`, `name2`, `name3`, `name4`) VALUES
(4, 13, 'megethos', 'timh', 'posothta', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carousel`
--
ALTER TABLE `carousel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `homecontent`
--
ALTER TABLE `homecontent`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `partners`
--
ALTER TABLE `partners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `productdetails`
--
ALTER TABLE `productdetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `producttablenames`
--
ALTER TABLE `producttablenames`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `carousel`
--
ALTER TABLE `carousel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `homecontent`
--
ALTER TABLE `homecontent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `partners`
--
ALTER TABLE `partners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `productdetails`
--
ALTER TABLE `productdetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `producttablenames`
--
ALTER TABLE `producttablenames`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
