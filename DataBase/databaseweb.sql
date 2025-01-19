-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 19, 2025 at 02:56 PM
-- Server version: 8.2.0
-- PHP Version: 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `databaseweb`
--

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

DROP TABLE IF EXISTS `banners`;
CREATE TABLE IF NOT EXISTS `banners` (
  `BannerID` int NOT NULL AUTO_INCREMENT,
  `Title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `ImageURL` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `LinkURL` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `CreatedAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`BannerID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `CategoryID` int NOT NULL AUTO_INCREMENT,
  `CategoryName` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `CreatedAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`CategoryID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`CategoryID`, `CategoryName`, `Description`, `CreatedAt`) VALUES
(1, 'shal', NULL, '2025-01-03 04:35:53'),
(2, 'rosari', NULL, '2025-01-03 04:35:53'),
(3, 'miniScarf', NULL, '2025-01-03 04:36:16');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `CommentID` int NOT NULL AUTO_INCREMENT,
  `ProductID` int NOT NULL,
  `UserID` int NOT NULL,
  `UserName` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Comment` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `CreatedAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`CommentID`),
  KEY `ProductID` (`ProductID`),
  KEY `UserID` (`UserID`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`CommentID`, `ProductID`, `UserID`, `UserName`, `Comment`, `CreatedAt`) VALUES
(2, 1, 1, 'سلام عن اقا', 'غمیمعفیفیویفیلو بر.بر.غبمهغبم کمم ممهمهبمغهبمغهبررم ذ ذذ ذ ذتعهبغبفبمبم رزممز د.\r\nتوزولزززمعزمرازز.ز.ز \r\n', '2025-01-18 13:18:26'),
(3, 1, 2, 'البشسیبلاتن', 'ضصثقفغعهخ شسیبلاتنم ظطزرذدپو. قبلذ لذد عتپ ترذ ز د', '2025-01-18 13:18:26'),
(8, 1, 3, 'نگارم', 'عخابسی.نز ععثقب.سیت.ظزذ سعاعب سیایعب', '2025-01-18 22:37:43'),
(5, 2, 4, 'بیل بیل بیل', 'زیمفععمیمییفمبه.مبغهمبغه ططوطزمفلعزعزی زعزیعمزیعم\r\nلطوطوطوطوطو', '2025-01-18 13:19:24'),
(6, 3, 3, 'بیل بیلی', 'یفعیفیعوی مهحم.خنموهنتپعتدعاد صسیزثیزفلغاد', '2025-01-18 13:20:21'),
(7, 4, 5, 'بیل جمعی', 'بیل کده سنغقسنقغسغنرنرزنفینعفسینس', '2025-01-18 13:20:21'),
(9, 1, 3, 'نگارم', 'عخابسی.نز ععثقب.سیت.ظزذ سعاعب سیایعب', '2025-01-18 22:45:03'),
(12, 1, 3, 'تتتتت', 'تتننتترنتر', '2025-01-18 22:55:18'),
(11, 1, 3, 'نگارم', 'عخابسی.نز ععثقب.سیت.ظزذ سعاعب سیایعب', '2025-01-18 22:46:39');

-- --------------------------------------------------------

--
-- Table structure for table `orderdetails`
--

DROP TABLE IF EXISTS `orderdetails`;
CREATE TABLE IF NOT EXISTS `orderdetails` (
  `OrderDetailID` int NOT NULL AUTO_INCREMENT,
  `OrderID` int DEFAULT NULL,
  `ProductID` int DEFAULT NULL,
  `Quantity` int NOT NULL,
  `Price` decimal(10,2) NOT NULL,
  `TotalAmount` decimal(10,2) NOT NULL,
  PRIMARY KEY (`OrderDetailID`),
  KEY `OrderID` (`OrderID`),
  KEY `ProductID` (`ProductID`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orderdetails`
--

INSERT INTO `orderdetails` (`OrderDetailID`, `OrderID`, `ProductID`, `Quantity`, `Price`, `TotalAmount`) VALUES
(18, 20, 3, 1, 150.00, 150.00);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `OrderID` int NOT NULL AUTO_INCREMENT,
  `UserID` int DEFAULT NULL,
  `Status` enum('Cart','Pending','Preparing','Shipped','Delivered','Cancelled') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT 'Cart',
  `CreatedAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`OrderID`),
  KEY `UserID` (`UserID`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`OrderID`, `UserID`, `Status`, `CreatedAt`) VALUES
(1, 2, 'Pending', '2025-01-03 19:51:04'),
(2, 7, 'Cart', '2025-01-03 19:51:04'),
(8, 3, 'Cart', '2025-01-19 12:29:49'),
(9, 3, 'Cart', '2025-01-19 12:30:45'),
(10, 3, 'Cart', '2025-01-19 12:30:50'),
(14, 3, 'Cart', '2025-01-19 12:59:44'),
(15, 3, 'Cart', '2025-01-19 12:59:57'),
(16, 3, 'Cart', '2025-01-19 13:00:05'),
(19, 3, 'Cart', '2025-01-19 13:06:35'),
(20, 3, 'Cart', '2025-01-19 13:33:39');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `ProductID` int NOT NULL AUTO_INCREMENT,
  `Name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `Price` decimal(10,0) NOT NULL,
  `Stock` int DEFAULT '0',
  `CategoryID` int DEFAULT NULL,
  `ImageURL` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `CreatedAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ProductID`),
  KEY `CategoryID` (`CategoryID`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`ProductID`, `Name`, `Description`, `Price`, `Stock`, `CategoryID`, `ImageURL`, `CreatedAt`) VALUES
(1, 'روسری خوشکلو', 'شسیبلاتنمکگصثقفغعه شسیبلاتنمصثقفغعه سیبلدپبرذد', 150, 8, 2, '../pic/../pic/1.jpg', '2025-01-03 04:42:29'),
(2, 'شال برقی', 'بلبل رنگی تو چقدر قشنگی', 130, 1, 1, NULL, '2025-01-03 04:42:29'),
(3, 'روسری بیلی', 'زنطیظسیقطزبراذتد صسیبلاتدپن صسیبلاتپنوم ', 150, 4, 1, '../pic/12.png', '2025-01-17 18:54:34'),
(5, 'دسته بیل صنعتی', 'رو سه پایه است', 200, 12, 3, '../pic/12.jpg', '2025-01-19 09:38:23'),
(6, 'عنصر چهلم', 'وارداتی', 300, 5, 2, NULL, '2025-01-19 09:38:23');

-- --------------------------------------------------------

--
-- Table structure for table `promotions`
--

DROP TABLE IF EXISTS `promotions`;
CREATE TABLE IF NOT EXISTS `promotions` (
  `PromotionID` int NOT NULL AUTO_INCREMENT,
  `Title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `DiscountPercentage` decimal(5,2) DEFAULT NULL,
  `StartDate` date DEFAULT NULL,
  `EndDate` date DEFAULT NULL,
  `CreatedAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`PromotionID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `UserID` int NOT NULL AUTO_INCREMENT,
  `FullName` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `PhoneNumber` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `CreatedAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`UserID`),
  UNIQUE KEY `Email` (`Email`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserID`, `FullName`, `Email`, `Password`, `PhoneNumber`, `Address`, `CreatedAt`) VALUES
(1, 'bahar ghofrani', 'bahar@gmail.com', 'admin1', '34567867', 'teh', '2024-12-03 20:46:48'),
(2, 'kimia bagheri', 'kimia@email.com', 'admin2', NULL, NULL, '2024-12-04 07:54:58'),
(3, 'شهلا برقی', 'ahmad@gmail.com', '123', '12345678912', 'lyfdktdkdkydkdkdku', '2024-12-04 08:01:43'),
(4, 'gffewfadad', 'daad@gmail.com', '123', NULL, NULL, '2024-12-04 08:03:30'),
(5, 'bfgh', 'fbgh@gmail.com', '$2y$10$fWlA84apRL4Lhra4OHjxouEq2MCCyShPCU9.8Qp5J4IGoEfnt3Fmi', NULL, NULL, '2024-12-08 05:31:36'),
(6, 'jdlkjcljddljlc', 'ckndkjc@gmail.com', '$2y$10$OlylVaRi61VvslKs8/tSm.83r2KoGwViPrrhF2MrYFfW1PF06R6.i', NULL, NULL, '2024-12-08 05:32:57'),
(7, 'abcdefg', 'fb@gamil.com', '1234567', NULL, NULL, '2024-12-08 13:59:25');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD CONSTRAINT `orderdetails_ibfk_1` FOREIGN KEY (`OrderID`) REFERENCES `orders` (`OrderID`) ON DELETE CASCADE,
  ADD CONSTRAINT `orderdetails_ibfk_2` FOREIGN KEY (`ProductID`) REFERENCES `products` (`ProductID`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`CategoryID`) REFERENCES `categories` (`CategoryID`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
