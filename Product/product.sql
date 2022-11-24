-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 24, 2022 at 08:37 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `product`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `catname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `catname`) VALUES
(1, 'Electronics'),
(2, 'Clothes'),
(3, 'Healthcare'),
(4, 'Footwear');

-- --------------------------------------------------------

--
-- Table structure for table `product_list`
--

CREATE TABLE `product_list` (
  `name` varchar(255) NOT NULL,
  `mfdate` date NOT NULL,
  `price` varchar(50) NOT NULL,
  `category` varchar(255) NOT NULL,
  `subcategory` varchar(255) NOT NULL,
  `images` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_list`
--

INSERT INTO `product_list` (`name`, `mfdate`, `price`, `category`, `subcategory`, `images`) VALUES
('HCL QLED TV ', '2022-11-05', '599', 'Categoryone', 'Sub categorya', ''),
('Hp Pavilion Gp1020', '2022-11-03', '40000', 'Electronics', 'Laptops', 'osho.png'),
('DELL Reyzen5', '2022-11-11', '37800', 'Electronics', 'Laptops', 'images.jpg'),
('ADIDAS Roaster 8098', '2022-11-04', '1299', 'Footwear', 'Sneakers', 'Sneaker.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `sub_category`
--

CREATE TABLE `sub_category` (
  `id` int(20) NOT NULL,
  `scatname` varchar(255) NOT NULL,
  `cat_id` int(20) NOT NULL,
  `cat_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sub_category`
--

INSERT INTO `sub_category` (`id`, `scatname`, `cat_id`, `cat_name`) VALUES
(1, 'Television', 1, 'Electronics'),
(2, 'Laptops', 1, 'Electronics'),
(3, 'Mobile Phones', 1, 'Electronics'),
(4, 'Home Appliances', 1, 'Electronics'),
(5, 'Womens', 2, 'Clothes'),
(6, 'Mens', 2, 'Clothes'),
(7, 'Kids', 2, 'Clothes'),
(8, 'Skin Care', 3, 'HealthCare'),
(9, 'Diabetics Care', 3, 'HealthCare'),
(10, 'Herbal Suppliments', 3, 'HealthCare'),
(11, 'Sneakers', 4, 'Footwear'),
(12, 'Scandals', 4, 'Footwear'),
(13, 'Slippers', 4, 'Footwear');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_category`
--
ALTER TABLE `sub_category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cat_id` (`cat_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sub_category`
--
ALTER TABLE `sub_category`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `sub_category`
--
ALTER TABLE `sub_category`
  ADD CONSTRAINT `sub_category_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `category` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
