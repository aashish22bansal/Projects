-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 27, 2020 at 03:27 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecom`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(10) NOT NULL,
  `p_cat_id` int(10) NOT NULL,
  `cat_id` int(10) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `product_title` text NOT NULL,
  `product_img1` text NOT NULL,
  `product_img2` text NOT NULL,
  `product_img3` text NOT NULL,
  `product_price` int(10) NOT NULL,
  `product_desc` text NOT NULL,
  `product_keyword` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `p_cat_id`, `cat_id`, `date`, `product_title`, `product_img1`, `product_img2`, `product_img3`, `product_price`, `product_desc`, `product_keyword`) VALUES
(1, 2, 2, '2020-09-24 02:45:01', 'Samsung Galaxy M31 Mobile', 'Samsung1.png', 'Samsung2.png', 'Samsung3.png', 17499, '6GB RAM, 128GB Storage', 'Mobile'),
(2, 2, 2, '2020-09-24 02:50:35', 'Vivo U10', 'Vivo1.png', 'Vivo2.png', 'Vivo3.png', 10990, '5000 mAH 18W Fast Charge Battery, 3GB RAM, 32GB Storage', 'Mobile'),
(3, 2, 2, '2020-09-24 02:54:12', 'Boat Airdopes 281', 'Airdopes1.png', 'Airdopes2.png', 'Airdopes3.png', 2370, 'Bluetooth V5.0,Up to 17.5H Total Playtime,IPX5 Water & Sweat Resistance', 'Accessories'),
(4, 2, 2, '2020-09-24 02:57:33', 'Sennheiser Momentum', 'Earphones1.png', 'Earphones2.png', 'Earphones3.png', 24990, 'True Wireless 2 - Bluetooth Earbuds with Active Noise Cancellation, Smart Pause', 'Accessories'),
(5, 2, 2, '2020-09-24 03:13:24', 'Seagate STHN2000402', 'Seagate1.png', 'Seagate2.png', 'Seagate3.png', 5699, '2 TB External Hard Drive Portable HDD – Light Blue USB 3.0 for PC', 'Accessories'),
(6, 2, 2, '2020-09-24 03:13:34', 'Sparx Sport Shoes', 'Sport shoes1.png', 'Sport shoes2.png', 'Sport shoes3.png', 1049, 'Lifestyle: Casual,Closure Type: Lace-Up,Toe Style: Closed Toe\r\nBlack and Green', 'Shoes'),
(7, 2, 2, '2020-09-24 03:13:45', 'Puma Casual Shoes', 'Men-Casual1.png', 'Men-Casual2.png', 'Men-Casual3.png', 1799, 'Rubber,Lace Up,Regular,flats,Round Toe\r\nPeacoat', 'Shoes'),
(8, 2, 2, '2020-09-24 03:13:53', 'Bourge Regular Shoes', 'Women-Shoes1.png', 'Women-Shoes2.png', 'Women-Shoes3.png', 659, 'Slip-On,Mesh,Round Toe,Regular wear,washable L.Pink', 'Shoes'),
(9, 2, 2, '2020-09-24 03:14:00', 'FASHIMO Boots', 'Women-Boots1.png', 'Women-Boots2.png', 'Women-Boots3.png', 479, 'Rubber,Comfortable Movement,Anti-Slip Sole & 100% Pure Rubber Sole\r\nBlack Flower', 'Shoes'),
(10, 2, 2, '2020-09-24 03:14:09', 'Layasa Sports Shoes', 'Kids shoes1.png', 'Kids shoes2.png', 'Kids shoes3.png', 399, 'LaceUp,Airmix,Medium,Mesh,Sports,Running,Casual Blue', 'Shoes');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
