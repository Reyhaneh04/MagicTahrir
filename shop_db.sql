-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 13, 2026 at 01:44 PM
-- Server version: 8.3.0
-- PHP Version: 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(30) CHARACTER SET utf8mb3 COLLATE utf8mb3_persian_ci NOT NULL,
  `detail` text CHARACTER SET utf8mb3 COLLATE utf8mb3_persian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_persian_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `username`, `detail`) VALUES
(7, 'afsaneh', 'Ø³Ø§ÛŒØªØªÙˆÙ† Ø¹Ø§Ù„ÛŒÙ‡ :)'),
(11, 'afsaneh', 'Ø¹Ø§Ù„ÛŒ'),
(10, 'Rebecca', 'its the best'),
(12, 'afsaneh', '');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(30) CHARACTER SET utf8mb3 COLLATE utf8mb3_persian_ci NOT NULL,
  `orderdate` date NOT NULL,
  `pro_code` int NOT NULL,
  `pro_qty` int NOT NULL,
  `pro_price` float NOT NULL,
  `mobile` varchar(11) CHARACTER SET utf8mb3 COLLATE utf8mb3_persian_ci NOT NULL,
  `address` varchar(400) CHARACTER SET utf8mb3 COLLATE utf8mb3_persian_ci NOT NULL,
  `trackcode` varchar(24) CHARACTER SET utf8mb3 COLLATE utf8mb3_persian_ci NOT NULL,
  `state` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_persian_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `username`, `orderdate`, `pro_code`, `pro_qty`, `pro_price`, `mobile`, `address`, `trackcode`, `state`) VALUES
(1, 'Rebecca', '2021-06-23', 1, 5, 3960000, '09102425213', 'ØªÙ‡Ø±Ø§Ù†_Ù…Ù†Ø·Ù‚Ù‡ 18_ÛŒØ§ÙØª Ø§Ø¨Ø§Ø¯_Ù…ÛŒØ¯Ø§Ù† Ø§Ù„ØºØ¯ÛŒØ±_Ø®ÛŒØ§Ø¨Ø§Ù† Ù…Ø±ØªØ¶ÛŒ Ø²Ù†Ø¯ÛŒÙ‡', '000000000000000000000000', 0),
(2, 'afsaneh', '2021-06-23', 8, 4, 1570000, '09361175965', 'ØªÙ‡Ø±Ø§Ù†_ÛŒØ§ÙØª Ø§Ø¨Ø§Ø¯_Ø®ÛŒØ§Ø¨Ø§Ù† ØµÙÙˆÛŒ_Ú©ÙˆÚ†Ù‡ Ù…Ø±Ø§Ø¯ÛŒØ§Ù†', '000000000000000000000000', 3),
(3, 'Rebecca', '2021-06-23', 11, 2, 850000, '09102425213', 'Ø´Ù‡Ø±Ú© ÙˆÙ„ÛŒØ¹ØµØ±_Ø®ÛŒØ§Ø¨Ø§Ù† Ø´Ø±ÛŒØ¹ØªÛŒ_Ù¾Ù„Ø§Ú©2', '000000000000000000000000', 0);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `pro_code` int NOT NULL,
  `pro_name` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_persian_ci NOT NULL,
  `pro_qty` int NOT NULL,
  `pro_price` float NOT NULL,
  `pro_image` varchar(80) CHARACTER SET utf8mb3 COLLATE utf8mb3_persian_ci NOT NULL,
  `pro_detail` text CHARACTER SET utf8mb3 COLLATE utf8mb3_persian_ci NOT NULL,
  PRIMARY KEY (`pro_code`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_persian_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`pro_code`, `pro_name`, `pro_qty`, `pro_price`, `pro_image`, `pro_detail`) VALUES
(1, 'ماژیک رنگی', 120, 3960000, 'm1.jpg', 'ماژیک رنگی بسیار زیبا                '),
(2, 'خودکار', 130, 1860000, 'm2.jpg', 'خودکار باکیفیت'),
(3, 'ماژیک رنگی', 56000, 56000, '3m.jpg', 'ماژیک رنگی بسیار زیبا'),
(4, 'خودکارآبی', 200, 1278000, '4m.jpg', 'خودکارآبی باکیفیت'),
(5, 'خودکار رنگی', 60, 2000000, '5m.jpg', 'خودکار رنگی 6 تایی'),
(6, 'خودکار رنگی ', 60, 550000, '6m.jpg', 'خودکار رنگی 6 تایی'),
(7, 'دفتر', 400, 2050000, '7m.jpg', 'ذفترسیمی تکالیف'),
(8, 'دفتر سیمی', 42, 1570000, '8m.jpg', 'دفتر سیمی طراحی'),
(9, 'کتاب', 90, 1850000, '9m.jpg', 'کتاب رنگ آمیزی کودکان'),
(10, 'فوم', 160, 4200000, '10m.jpg', 'فوم رنگی اکلیلی'),
(11, 'خط کش', 74, 850000, '11m.jpg', 'خط کش کودکانه'),
(12, 'خط کش', 20, 490000, '12m.jpg', 'خط کش ژله ای'),
(13, 'پاک کن', 40, 6000, '15.jpg', 'پاک کن رنگی');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `realname` varchar(80) CHARACTER SET utf8mb3 COLLATE utf8mb3_persian_ci NOT NULL,
  `username` varchar(30) CHARACTER SET utf8mb3 COLLATE utf8mb3_persian_ci NOT NULL,
  `password` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_persian_ci NOT NULL,
  `email` varchar(60) CHARACTER SET utf8mb3 COLLATE utf8mb3_persian_ci NOT NULL,
  `type` tinyint(1) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_persian_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`realname`, `username`, `password`, `email`, `type`) VALUES
('fahimeh nikkhah', 'f.nikkhah', '123', 'fahimeh.nikkhak@gmail.com', 1),
('afsanehn', 'afsaneh', '123456', 'afsanehrezaii@gmail.com', 0),
('reyhaneh', 'Rebecca', '1234', 'reihanehdehghanan@gmail.com', 1),
('reyhaneh', 'Ø±ÛŒØ­Ø§Ù†Ù‡', '1234', 'reihanehdehghanan@gmail.com', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
