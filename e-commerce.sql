-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 15, 2023 at 09:31 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e-commerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `IdCart` int(11) NOT NULL,
  `IdClient` int(11) NOT NULL,
  `IdProduct` int(11) NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`IdCart`, `IdClient`, `IdProduct`, `amount`) VALUES
(1, 9, 87965, 2);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `idCategory` int(11) NOT NULL,
  `categoryName` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`idCategory`, `categoryName`) VALUES
(1, 'camera'),
(2, 'Keyboard'),
(3, 'Laptop'),
(4, 'Lens'),
(5, 'Mouse');

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `IdClient` int(11) NOT NULL,
  `NameClient` varchar(100) NOT NULL,
  `FamilyNameClient` varchar(100) NOT NULL,
  `BirthdayClient` date NOT NULL,
  `SexClient` varchar(11) NOT NULL,
  `EmailClient` varchar(100) NOT NULL,
  `PhoneNumberClient` int(11) NOT NULL,
  `address01` varchar(1000) NOT NULL,
  `address02` varchar(1000) NOT NULL,
  `zip` varchar(5) NOT NULL,
  `country` varchar(20) NOT NULL,
  `city` varchar(20) NOT NULL,
  `nameCard` varchar(100) NOT NULL,
  `cardNumber` int(20) NOT NULL,
  `validThrough` int(20) NOT NULL,
  `CVV` int(3) NOT NULL,
  `passwordClient` varchar(100) NOT NULL,
  `typeClient` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`IdClient`, `NameClient`, `FamilyNameClient`, `BirthdayClient`, `SexClient`, `EmailClient`, `PhoneNumberClient`, `address01`, `address02`, `zip`, `country`, `city`, `nameCard`, `cardNumber`, `validThrough`, `CVV`, `passwordClient`, `typeClient`) VALUES
(6, 'hadj', 'mohamed', '2001-02-01', 'Male', 'hadj@gmail.com', 662222300, '', '', '', '', '', '', 0, 0, 0, 'ddfa', 'customer'),
(7, 'hadj', 'mohamed', '2001-02-01', 'Male', 'hadj@gmail.com', 662222300, '', '', '', '', '', '', 0, 0, 0, 'ddfa', 'customer'),
(8, 'hadj', 'mohamed', '2001-02-01', 'Male', 'hadj@gmail.com', 662222300, '', '', '', '', '', '', 0, 0, 0, 'ddfa', 'customer'),
(9, 'hadj Mohamed', 'Mokhtari', '2001-02-01', 'Male', 'hadj@gmail.com', 662222300, 'volani 36B', 'volani 36b', '14006', 'Algeria', 'Tiaret', '', 0, 0, 0, '7b0c21cdea68f79bd6f662514cca8d9b', 'customer'),
(10, 'Hadj Mohamed', 'Mokhtari', '2001-02-01', 'Male', '7adj.mo7amed@gmail.com', 662222300, '', '', '', '', '', '', 0, 0, 0, '3c64153cb0969f71faa6c8b6a94ab421', 'Admin'),
(11, 'Hadj Mohamed', 'Mokhtari', '2000-01-01', 'Female', 'm.hadj.mohamed.01.02.2001@gmail.com', 662222300, '', '', '', '', '', '', 0, 0, 0, '3c64153cb0969f71faa6c8b6a94ab421', 'customer');

-- --------------------------------------------------------

--
-- Table structure for table `deals_of_the_day`
--

CREATE TABLE `deals_of_the_day` (
  `idDealsOfTheDay` int(11) NOT NULL,
  `idProduct` int(11) NOT NULL,
  `date` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `deals_of_the_day`
--

INSERT INTO `deals_of_the_day` (`idDealsOfTheDay`, `idProduct`, `date`) VALUES
(1, 87965, 4);

-- --------------------------------------------------------

--
-- Table structure for table `delivery`
--

CREATE TABLE `delivery` (
  `idDelivery` int(11) NOT NULL,
  `idProduct` int(11) NOT NULL,
  `IdClient` int(11) NOT NULL,
  `PhoneNumberClient` int(11) NOT NULL,
  `address01` varchar(1000) NOT NULL,
  `address02` varchar(1000) NOT NULL,
  `zip` int(11) NOT NULL,
  `country` varchar(20) NOT NULL,
  `city` varchar(20) NOT NULL,
  `Price` int(11) NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `delivery`
--

INSERT INTO `delivery` (`idDelivery`, `idProduct`, `IdClient`, `PhoneNumberClient`, `address01`, `address02`, `zip`, `country`, `city`, `Price`, `amount`) VALUES
(1, 124321, 9, 662222300, 'volani 36B', 'volani 36b', 14006, 'Algeria', 'Tiaret', 32, 5),
(2, 342546, 9, 662222300, 'volani 36B', 'volani 36b', 14006, 'Algeria', 'Tiaret', 1495, 4),
(3, 124321, 9, 662222300, 'volani 36B', 'volani 36b', 14006, 'Algeria', 'Tiaret', 32, 5),
(4, 124321, 9, 0, 'volani 36B', 'volani 36b', 14006, 'Algeria', 'Tiaret', 32, 5);

-- --------------------------------------------------------

--
-- Table structure for table `featured_products`
--

CREATE TABLE `featured_products` (
  `idFeaturedProducts` int(11) NOT NULL,
  `idProduct` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `featured_products`
--

INSERT INTO `featured_products` (`idFeaturedProducts`, `idProduct`) VALUES
(1, 87965);

-- --------------------------------------------------------

--
-- Table structure for table `logclient`
--

CREATE TABLE `logclient` (
  `IdClient` int(11) NOT NULL,
  `emailClient` varchar(100) NOT NULL,
  `passwordClient` varchar(100) NOT NULL,
  `loginId` int(11) NOT NULL,
  `Date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `logclient`
--

INSERT INTO `logclient` (`IdClient`, `emailClient`, `passwordClient`, `loginId`, `Date`) VALUES
(9, 'hadj@gmail.com', '3c64153cb0969f71faa6c8b6a94ab421', 0, '2023-03-07'),
(9, 'hadj@gmail.com', '3c64153cb0969f71faa6c8b6a94ab421', 1, NULL),
(9, 'hadj@gmail.com', '3c64153cb0969f71faa6c8b6a94ab421', 2, NULL),
(9, 'hadj@gmail.com', '3c64153cb0969f71faa6c8b6a94ab421', 3, NULL),
(9, 'hadj@gmail.com', '3c64153cb0969f71faa6c8b6a94ab421', 4, NULL),
(9, 'hadj@gmail.com', '3c64153cb0969f71faa6c8b6a94ab421', 5, NULL),
(9, 'hadj@gmail.com', '3c64153cb0969f71faa6c8b6a94ab421', 6, NULL),
(9, 'hadj@gmail.com', '3c64153cb0969f71faa6c8b6a94ab421', 7, NULL),
(9, 'hadj@gmail.com', '3c64153cb0969f71faa6c8b6a94ab421', 8, NULL),
(9, 'hadj@gmail.com', '3c64153cb0969f71faa6c8b6a94ab421', 9, '0000-00-00'),
(9, 'hadj@gmail.com', '3c64153cb0969f71faa6c8b6a94ab421', 10, '0000-00-00'),
(9, 'hadj@gmail.com', '3c64153cb0969f71faa6c8b6a94ab421', 11, '0000-00-00'),
(9, 'hadj@gmail.com', '3c64153cb0969f71faa6c8b6a94ab421', 12, '0000-00-00'),
(9, 'hadj@gmail.com', '3c64153cb0969f71faa6c8b6a94ab421', 13, '0000-00-00'),
(9, 'hadj@gmail.com', '3c64153cb0969f71faa6c8b6a94ab421', 14, '0000-00-00'),
(9, 'hadj@gmail.com', '3c64153cb0969f71faa6c8b6a94ab421', 15, '0000-00-00'),
(9, 'hadj@gmail.com', '3c64153cb0969f71faa6c8b6a94ab421', 16, '0000-00-00'),
(9, 'hadj@gmail.com', '3c64153cb0969f71faa6c8b6a94ab421', 17, '0000-00-00'),
(9, 'hadj@gmail.com', '3c64153cb0969f71faa6c8b6a94ab421', 18, '0000-00-00'),
(9, 'hadj@gmail.com', '3c64153cb0969f71faa6c8b6a94ab421', 19, '0000-00-00'),
(9, 'hadj@gmail.com', '3c64153cb0969f71faa6c8b6a94ab421', 20, '0000-00-00'),
(9, 'hadj@gmail.com', '3c64153cb0969f71faa6c8b6a94ab421', 21, '0000-00-00'),
(9, 'hadj@gmail.com', '3c64153cb0969f71faa6c8b6a94ab421', 22, '0000-00-00'),
(9, 'hadj@gmail.com', '3c64153cb0969f71faa6c8b6a94ab421', 23, '0000-00-00'),
(9, 'hadj@gmail.com', '3c64153cb0969f71faa6c8b6a94ab421', 24, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `popular_products`
--

CREATE TABLE `popular_products` (
  `idPopularProducts` int(11) NOT NULL,
  `idProduct` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `popular_products`
--

INSERT INTO `popular_products` (`idPopularProducts`, `idProduct`) VALUES
(2, 87965),
(1, 124321);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `IdProduct` int(11) NOT NULL,
  `ProductName` varchar(200) NOT NULL,
  `ProductPrice` float NOT NULL,
  `ProductRating` float NOT NULL,
  `ProductAmount` int(11) NOT NULL,
  `ProductDescription` varchar(1000) NOT NULL,
  `ProductImage1` varchar(1000) NOT NULL,
  `ProductImage2` varchar(1000) NOT NULL,
  `ProductImage3` varchar(1000) NOT NULL,
  `Style` varchar(45) NOT NULL,
  `Color` varchar(45) NOT NULL,
  `idCategory` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`IdProduct`, `ProductName`, `ProductPrice`, `ProductRating`, `ProductAmount`, `ProductDescription`, `ProductImage1`, `ProductImage2`, `ProductImage3`, `Style`, `Color`, `idCategory`) VALUES
(87965, 'MacBook Pro (16-inch, 2021)', 1000, 4.5, 10, '    Apple M1 Pro or M1 Max chip for a massive leap in CPU, GPU, and machine learning performance\r\n    Up to 10-core CPU delivers up to 2x faster performance to fly through pro workflows quicker than ever\r\n    Up to 32-core GPU with up to 4x faster performance for graphics-intensive apps and games\r\n    16-core Neural Engine for up to 5x faster machine learning performance\r\n    Longer battery life, up to 21 hours\r\n    Up to 64GB of unified memory so everything you do is fast and fluid\r\n    Up to 8TB of superfast SSD storage launches apps and opens files in an instant\r\n    Stunning 16-inch Liquid Retina XDR display with extreme dynamic range and contrast ratio\r\n    1080p FaceTime HD camera with advanced image signal processor for sharper video calls\r\n    Six-speaker sound system with force-cancelling woofers\r\n', 'Image/category/Laptop/MacBook-Pro-(16-inch,-2021)/MacBook-Pro-(16-inch,-2021)-1.png', 'Image/category/Laptop/MacBook-Pro-(16-inch,-2021)/MacBook-Pro-(16-inch,-2021)-2.png', 'Image/category/Laptop/MacBook-Pro-(16-inch,-2021)/MacBook-Pro-(16-inch,-2021)-3.png', 'Apple M1 Pro Chip', 'white', 3),
(87966, 'MacBook Pro (16-inch, 2021)', 1000, 4.5, 10, '    Apple M1 Pro or M1 Max chip for a massive leap in CPU, GPU, and machine learning performance\r\n    Up to 10-core CPU delivers up to 2x faster performance to fly through pro workflows quicker than ever\r\n    Up to 32-core GPU with up to 4x faster performance for graphics-intensive apps and games\r\n    16-core Neural Engine for up to 5x faster machine learning performance\r\n    Longer battery life, up to 21 hours\r\n    Up to 64GB of unified memory so everything you do is fast and fluid\r\n    Up to 8TB of superfast SSD storage launches apps and opens files in an instant\r\n    Stunning 16-inch Liquid Retina XDR display with extreme dynamic range and contrast ratio\r\n    1080p FaceTime HD camera with advanced image signal processor for sharper video calls\r\n    Six-speaker sound system with force-cancelling woofers\r\n', 'Image/category/Laptop/MacBook-Pro-(16-inch,-2021)/MacBook-Pro-(16-inch,-2021)-1.png', 'Image/category/Laptop/MacBook-Pro-(16-inch,-2021)/MacBook-Pro-(16-inch,-2021)-2.png', 'Image/category/Laptop/MacBook-Pro-(16-inch,-2021)/MacBook-Pro-(16-inch,-2021)-3.png', 'Apple M1 Pro Chip', 'Gray', 3),
(87967, 'MacBook Pro (16-inch, 2021)', 1000, 4.5, 10, '\r\n    Apple M1 Pro or M1 Max chip for a massive leap in CPU, GPU, and machine learning performance\r\n    Up to 10-core CPU delivers up to 2x faster performance to fly through pro workflows quicker than ever\r\n    Up to 32-core GPU with up to 4x faster performance for graphics-intensive apps and games\r\n    16-core Neural Engine for up to 5x faster machine learning performance\r\n    Longer battery life, up to 21 hours\r\n    Up to 64GB of unified memory so everything you do is fast and fluid\r\n    Up to 8TB of superfast SSD storage launches apps and opens files in an instant\r\n    Stunning 16-inch Liquid Retina XDR display with extreme dynamic range and contrast ratio\r\n    1080p FaceTime HD camera with advanced image signal processor for sharper video calls\r\n    Six-speaker sound system with force-cancelling woofers\r\n', 'Image/category/Laptop/MacBook-Pro-(16-inch,2021)/MacBook-Pro-(16-inch,2021)-1.png', 'Image/category/Laptop/MacBook-Pro-(16-inch,2021)/MacBook-Pro-(16-inch,2021)-2.png', 'Image/category/Laptop/MacBook-Pro-(16-inch,2021)/MacBook-Pro-(16-inch,2021)-3.png', ' Apple M1 Max Chip', 'white', 3),
(87968, 'MacBook Pro (16-inch, 2021)', 1000, 4.5, 10, '\r\n    Apple M1 Pro or M1 Max chip for a massive leap in CPU, GPU, and machine learning performance\r\n    Up to 10-core CPU delivers up to 2x faster performance to fly through pro workflows quicker than ever\r\n    Up to 32-core GPU with up to 4x faster performance for graphics-intensive apps and games\r\n    16-core Neural Engine for up to 5x faster machine learning performance\r\n    Longer battery life, up to 21 hours\r\n    Up to 64GB of unified memory so everything you do is fast and fluid\r\n    Up to 8TB of superfast SSD storage launches apps and opens files in an instant\r\n    Stunning 16-inch Liquid Retina XDR display with extreme dynamic range and contrast ratio\r\n    1080p FaceTime HD camera with advanced image signal processor for sharper video calls\r\n    Six-speaker sound system with force-cancelling woofers\r\n', 'Image/category/Laptop/MacBook-Pro-(16-inch,2021)/MacBook-Pro-(16-inch,2021)-1.png', 'Image/category/Laptop/MacBook-Pro-(16-inch,2021)/MacBook-Pro-(16-inch,2021)-2.png', 'Image/category/Laptop/MacBook-Pro-(16-inch,2021)/MacBook-Pro-(16-inch,2021)-3.png', ' Apple M1 Max Chip', 'Gray', 3),
(124321, 'Logitech K835 Wired Mechanical Keyboard ', 32, 3, 50, '', 'Image/category/keyboard/Logitech-K835-Wired-Mechanical-Keyboard/Logitech-K835-Wired-Mechanical-Keyboard-1.jpg', 'Image/category/keyboard/Logitech-K835-Wired-Mechanical-Keyboard/Logitech-K835-Wired-Mechanical-Keyboard-2.jpg', 'Image/category/keyboard/Logitech-K835-Wired-Mechanical-Keyboard/Logitech-K835-Wired-Mechanical-Keyboard-3.jpg', 'blue switch', 'black', 2),
(124322, 'Logitech K835 Wired Mechanical Keyboard ', 32, 3, 50, '', 'Image/category/keyboard/Logitech-K835-Wired-Mechanical-Keyboard/Logitech-K835-Wired-Mechanical-Keyboard-1.jpg', 'Image/category/keyboard/Logitech-K835-Wired-Mechanical-Keyboard/Logitech-K835-Wired-Mechanical-Keyboard-2.jpg', 'Image/category/keyboard/Logitech-K835-Wired-Mechanical-Keyboard/Logitech-K835-Wired-Mechanical-Keyboard-3.jpg', 'blue switch', 'white', 2),
(124323, 'Logitech K835 Wired Mechanical Keyboard ', 32, 3, 50, '', 'Image/category/keyboard/Logitech-K835-Wired-Mechanical-Keyboard/Logitech-K835-Wired-Mechanical-Keyboard-1.jpg', 'Image/category/keyboard/Logitech-K835-Wired-Mechanical-Keyboard/Logitech-K835-Wired-Mechanical-Keyboard-2.jpg', 'Image/category/keyboard/Logitech-K835-Wired-Mechanical-Keyboard/Logitech-K835-Wired-Mechanical-Keyboard-3.jpg', 'red switch', 'black', 2),
(124324, 'Logitech K835 Wired Mechanical Keyboard ', 32, 3, 50, '', 'Image/category/keyboard/Logitech-K835-Wired-Mechanical-Keyboard/Logitech-K835-Wired-Mechanical-Keyboard-1.jpg', 'Image/category/keyboard/Logitech-K835-Wired-Mechanical-Keyboard/Logitech-K835-Wired-Mechanical-Keyboard-2.jpg', 'Image/category/keyboard/Logitech-K835-Wired-Mechanical-Keyboard/Logitech-K835-Wired-Mechanical-Keyboard-3.jpg', 'red switch', 'white', 2),
(132132, 'Canon EOS R5 Full-Frame Mirrorless Camera ', 3699, 4, 30, 'High Image Quality featuring a New 45 Megapixel Full-frame CMOS Sensor.\r\nDIGIC X Image Processor with an ISO range of 100-51200; Expandable to 102400x1.\r\nHigh-speed continuous shooting of up to 12 fps with Mechanical Shutter and up to 20 fps electronic (silent) shutter.\r\nDual pixel CMOS AF covering approx. 100% area with 1,053 AF areas.\r\nSubject tracking of people and animals using deep learning technology.\r\nDual Memory Card Slots\r\nCompatible with RF5.2mm F2.8 L Dual Fisheye lens\r\n', 'Image/category/camera/canon-R5/Canon-EOS-R5-Full-Frame-Mirrorless-Camera-1.jpg', 'Image/category/camera/canon-R5/Canon-EOS-R5-Full-Frame-Mirrorless-Camera-2.jpg', 'Image/category/camera/canon-R5/Canon-EOS-R5-Full-Frame-Mirrorless-Camera-3.jpg', '24-105mm', 'Black', 1),
(132133, 'Canon EOS R5 Full-Frame Mirrorless Camera ', 3699, 4, 30, 'High Image Quality featuring a New 45 Megapixel Full-frame CMOS Sensor.\r\nDIGIC X Image Processor with an ISO range of 100-51200; Expandable to 102400x1.\r\nHigh-speed continuous shooting of up to 12 fps with Mechanical Shutter and up to 20 fps electronic (silent) shutter.\r\nDual pixel CMOS AF covering approx. 100% area with 1,053 AF areas.\r\nSubject tracking of people and animals using deep learning technology.\r\nDual Memory Card Slots\r\nCompatible with RF5.2mm F2.8 L Dual Fisheye lens\r\n', 'Image/category/camera/canon-R5/Canon-EOS-R5-Full-Frame-Mirrorless-Camera-1.jpg', 'Image/category/camera/canon-R5/Canon-EOS-R5-Full-Frame-Mirrorless-Camera-2.jpg', 'Image/category/camera/canon-R5/Canon-EOS-R5-Full-Frame-Mirrorless-Camera-3.jpg', 'body Only', 'Black', 1),
(145565, 'POP KEYS Wireless Mechanical Keyboard with Customizable Emoji Keys', 99.99, 3.4, 30, 'Connection Type: Bluetooth Low Energy Wireless (Bluetooth 5.1)\r\nWireless range: 10 m\r\nMechanical switches (Brown, tactile)\r\nCustomization app: Supported by Logi Options+ on Windows and macOS 1Available on Windows and macOS at logitech.com/optionsplus\r\nBattery: 2 x AAA\r\nBattery life: 36 months 2Battery life may vary based on use and computing conditions.\r\nIndicator Lights (LED): Battery LED, 3 Bluetooth channel LEDs, Caps lock LED\r\nSustainability\r\nBlast plastics: 41% post-consumer recycled material 3Excludes plastic in printed wiring assembly (PWA), and packaging\r\nDaydream, Heartbreaker, Mist and Cosmos plastics: 20% post-consumer recycled material 4Excludes plastic in printed wiring assembly (PWA), and packaging.\r\nCertified carbon neutral', 'Image/category/keyboard/POP-KEYS/pop-keys-blast-gallery-1-us-intl.webp', 'Image/category/keyboard/POP-KEYS/pop-keys-blast-gallery-2-us-intl.webp', 'Image/category/keyboard/POP-KEYS/pop-keys-blast-gallery-1-us-intl.webp', 'UK English (Qwerty)', 'Blast', 2),
(145566, 'POP KEYS Wireless Mechanical Keyboard with Customizable Emoji Keys', 99.99, 3.4, 30, 'Connection Type: Bluetooth Low Energy Wireless (Bluetooth 5.1)\r\nWireless range: 10 m\r\nMechanical switches (Brown, tactile)\r\nCustomization app: Supported by Logi Options+ on Windows and macOS 1Available on Windows and macOS at logitech.com/optionsplus\r\nBattery: 2 x AAA\r\nBattery life: 36 months 2Battery life may vary based on use and computing conditions.\r\nIndicator Lights (LED): Battery LED, 3 Bluetooth channel LEDs, Caps lock LED\r\nSustainability\r\nBlast plastics: 41% post-consumer recycled material 3Excludes plastic in printed wiring assembly (PWA), and packaging\r\nDaydream, Heartbreaker, Mist and Cosmos plastics: 20% post-consumer recycled material 4Excludes plastic in printed wiring assembly (PWA), and packaging.\r\nCertified carbon neutral', 'Image/category/keyboard/POP-KEYS/pop-keys-blast-gallery-1-us-intl.webp', 'Image/category/keyboard/POP-KEYS/pop-keys-blast-gallery-2-us-intl.webp', 'Image/category/keyboard/POP-KEYS/pop-keys-blast-gallery-1-us-intl.webp', 'US International (Qwerty)', 'Blast', 2),
(145567, 'POP KEYS Wireless Mechanical Keyboard with Customizable Emoji Keys', 99.99, 3.4, 30, 'Connection Type: Bluetooth Low Energy Wireless (Bluetooth 5.1)\r\nWireless range: 10 m\r\nMechanical switches (Brown, tactile)\r\nCustomization app: Supported by Logi Options+ on Windows and macOS 1Available on Windows and macOS at logitech.com/optionsplus\r\nBattery: 2 x AAA\r\nBattery life: 36 months 2Battery life may vary based on use and computing conditions.\r\nIndicator Lights (LED): Battery LED, 3 Bluetooth channel LEDs, Caps lock LED\r\nSustainability\r\nBlast plastics: 41% post-consumer recycled material 3Excludes plastic in printed wiring assembly (PWA), and packaging\r\nDaydream, Heartbreaker, Mist and Cosmos plastics: 20% post-consumer recycled material 4Excludes plastic in printed wiring assembly (PWA), and packaging.\r\nCertified carbon neutral', 'Image/category/keyboard/POP-KEYS/pop-keys-daydream-gallery-1-us-intl.webp', 'Image/category/keyboard/POP-KEYS/pop-keys-daydream-gallery-2-us-intl.webp', 'Image/category/keyboard/POP-KEYS/pop-keys-daydream-gallery-3-us-intl.webp', 'US International (Qwerty)', 'Daydream', 2),
(145568, 'POP KEYS Wireless Mechanical Keyboard with Customizable Emoji Keys', 99.99, 3.4, 30, 'Connection Type: Bluetooth Low Energy Wireless (Bluetooth 5.1)\r\nWireless range: 10 m\r\nMechanical switches (Brown, tactile)\r\nCustomization app: Supported by Logi Options+ on Windows and macOS 1Available on Windows and macOS at logitech.com/optionsplus\r\nBattery: 2 x AAA\r\nBattery life: 36 months 2Battery life may vary based on use and computing conditions.\r\nIndicator Lights (LED): Battery LED, 3 Bluetooth channel LEDs, Caps lock LED\r\nSustainability\r\nBlast plastics: 41% post-consumer recycled material 3Excludes plastic in printed wiring assembly (PWA), and packaging\r\nDaydream, Heartbreaker, Mist and Cosmos plastics: 20% post-consumer recycled material 4Excludes plastic in printed wiring assembly (PWA), and packaging.\r\nCertified carbon neutral', 'Image/category/keyboard/POP-KEYS/pop-keys-daydream-gallery-1-us-intl.webp', 'Image/category/keyboard/POP-KEYS/pop-keys-daydream-gallery-2-us-intl.webp', 'Image/category/keyboard/POP-KEYS/pop-keys-daydream-gallery-3-us-intl.webp', 'UK English (Qwerty)', 'Daydream', 2),
(324324, 'POP-MOUSE', 32, 3.4, 50, 'it has a yellow color ', 'Image\\category\\mouse\\pop-mouse\\pop-mouse-gallery-blast-1.webp', 'Image\\category\\mouse\\pop-mouse\\pop-mouse-gallery-blast-2.webp', 'Image\\category\\mouse\\pop-mouse\\pop-mouse-gallery-blast-3.webp', '', 'blast', 5),
(342546, 'Rokinon Xeen 135mm T2.2 Professional Cine Lens', 1495, 4.6, 5, 'Features an aluminum body for increased durability, a tripod mount, large & easy to read markings, and a long focus throw (200 Degree)\r\nUnified focus, aperture gear and T-stop scale positions  among all Xeon by Rokinon lenses\r\nXeon by Rokinon lenses all have a 11 bladed diaphragm & unified 114mm front diameters for use with standard matte boxes\r\nAngle of view 18.8⁰ on full frame cameras and 12.4⁰ on APS-C camera\r\nMinimum focusing distance of 31.5 inches\r\n', 'Image/category/lens/Rokinon-Xeen-135mm-T2.2-Professional-Cine-Lens/Rokinon-Xeen-135mm-T2.2-Professional-Cine-Lens-1.jpg', 'Image/category/lens/Rokinon-Xeen-135mm-T2.2-Professional-Cine-Lens/Rokinon-Xeen-135mm-T2.2-Professional-Cine-Lens-2.jpg', 'Image/category/lens/Rokinon-Xeen-135mm-T2.2-Professional-Cine-Lens/Rokinon-Xeen-135mm-T2.2-Professional-Cine-Lens-3.jpg', 'canon ef', 'Black', 4),
(342547, 'Rokinon Xeen 135mm T2.2 Professional Cine Lens', 1495, 4.6, 5, 'Features an aluminum body for increased durability, a tripod mount, large & easy to read markings, and a long focus throw (200 Degree)\r\nUnified focus, aperture gear and T-stop scale positions  among all Xeon by Rokinon lenses\r\nXeon by Rokinon lenses all have a 11 bladed diaphragm & unified 114mm front diameters for use with standard matte boxes\r\nAngle of view 18.8⁰ on full frame cameras and 12.4⁰ on APS-C camera\r\nMinimum focusing distance of 31.5 inches\r\n', 'Image/category/lens/Rokinon-Xeen-135mm-T2.2-Professional-Cine-Lens/Rokinon-Xeen-135mm-T2.2-Professional-Cine-Lens-1.jpg', 'Image/category/lens/Rokinon-Xeen-135mm-T2.2-Professional-Cine-Lens/Rokinon-Xeen-135mm-T2.2-Professional-Cine-Lens-2.jpg', 'Image/category/lens/Rokinon-Xeen-135mm-T2.2-Professional-Cine-Lens/Rokinon-Xeen-135mm-T2.2-Professional-Cine-Lens-3.jpg', 'mft ', 'Black', 4),
(342548, 'Rokinon Xeen 135mm T2.2 Professional Cine Lens', 1495, 4.6, 5, 'Features an aluminum body for increased durability, a tripod mount, large & easy to read markings, and a long focus throw (200 Degree)\r\nUnified focus, aperture gear and T-stop scale positions  among all Xeon by Rokinon lenses\r\nXeon by Rokinon lenses all have a 11 bladed diaphragm & unified 114mm front diameters for use with standard matte boxes\r\nAngle of view 18.8⁰ on full frame cameras and 12.4⁰ on APS-C camera\r\nMinimum focusing distance of 31.5 inches\r\n', 'Image/category/lens/Rokinon-Xeen-135mm-T2.2-Professional-Cine-Lens/Rokinon-Xeen-135mm-T2.2-Professional-Cine-Lens-1.jpg', 'Image/category/lens/Rokinon-Xeen-135mm-T2.2-Professional-Cine-Lens/Rokinon-Xeen-135mm-T2.2-Professional-Cine-Lens-2.jpg', 'Image/category/lens/Rokinon-Xeen-135mm-T2.2-Professional-Cine-Lens/Rokinon-Xeen-135mm-T2.2-Professional-Cine-Lens-3.jpg', 'nikon', 'Black', 4),
(342549, 'Rokinon Xeen 135mm T2.2 Professional Cine Lens', 1495, 4.6, 5, 'Features an aluminum body for increased durability, a tripod mount, large & easy to read markings, and a long focus throw (200 Degree)\r\nUnified focus, aperture gear and T-stop scale positions  among all Xeon by Rokinon lenses\r\nXeon by Rokinon lenses all have a 11 bladed diaphragm & unified 114mm front diameters for use with standard matte boxes\r\nAngle of view 18.8⁰ on full frame cameras and 12.4⁰ on APS-C camera\r\nMinimum focusing distance of 31.5 inches\r\n', 'Image/category/lens/Rokinon-Xeen-135mm-T2.2-Professional-Cine-Lens/Rokinon-Xeen-135mm-T2.2-Professional-Cine-Lens-1.jpg', 'Image/category/lens/Rokinon-Xeen-135mm-T2.2-Professional-Cine-Lens/Rokinon-Xeen-135mm-T2.2-Professional-Cine-Lens-2.jpg', 'Image/category/lens/Rokinon-Xeen-135mm-T2.2-Professional-Cine-Lens/Rokinon-Xeen-135mm-T2.2-Professional-Cine-Lens-3.jpg', 'pl', 'Black', 4),
(342550, 'Rokinon Xeen 135mm T2.2 Professional Cine Lens', 1495, 4.6, 5, 'Features an aluminum body for increased durability, a tripod mount, large & easy to read markings, and a long focus throw (200 Degree)\r\nUnified focus, aperture gear and T-stop scale positions  among all Xeon by Rokinon lenses\r\nXeon by Rokinon lenses all have a 11 bladed diaphragm & unified 114mm front diameters for use with standard matte boxes\r\nAngle of view 18.8⁰ on full frame cameras and 12.4⁰ on APS-C camera\r\nMinimum focusing distance of 31.5 inches\r\n', 'Image/category/lens/Rokinon-Xeen-135mm-T2.2-Professional-Cine-Lens/Rokinon-Xeen-135mm-T2.2-Professional-Cine-Lens-1.jpg', 'Image/category/lens/Rokinon-Xeen-135mm-T2.2-Professional-Cine-Lens/Rokinon-Xeen-135mm-T2.2-Professional-Cine-Lens-2.jpg', 'Image/category/lens/Rokinon-Xeen-135mm-T2.2-Professional-Cine-Lens/Rokinon-Xeen-135mm-T2.2-Professional-Cine-Lens-3.jpg', 'Sony FE', 'Black', 4);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `idReviews` int(11) NOT NULL,
  `idProduct` int(11) NOT NULL,
  `IdClient` int(11) NOT NULL,
  `comment` varchar(5000) NOT NULL,
  `rating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`idReviews`, `idProduct`, `IdClient`, `comment`, `rating`) VALUES
(1, 87965, 9, 'Good laptop', 1),
(2, 87965, 9, 'Good laptop', 3),
(3, 87965, 9, '', 2),
(4, 87965, 9, '', 5);

-- --------------------------------------------------------

--
-- Table structure for table `shipping`
--

CREATE TABLE `shipping` (
  `idShipping` int(11) NOT NULL,
  `idProduct` int(11) NOT NULL,
  `IdClient` int(11) NOT NULL,
  `PhoneNumberClient` int(11) NOT NULL,
  `address01` varchar(1000) NOT NULL,
  `address02` varchar(1000) NOT NULL,
  `zip` int(11) NOT NULL,
  `country` varchar(20) NOT NULL,
  `city` varchar(20) NOT NULL,
  `Price` int(11) NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shipping`
--

INSERT INTO `shipping` (`idShipping`, `idProduct`, `IdClient`, `PhoneNumberClient`, `address01`, `address02`, `zip`, `country`, `city`, `Price`, `amount`) VALUES
(1, 132132, 9, 662222300, 'volani 36B', 'volani 36b', 14006, 'Algeria', 'Tiaret', 3699, 1),
(2, 132132, 9, 662222300, 'volani 36B', 'volani 36b', 14006, 'Algeria', 'Tiaret', 3699, 2);

-- --------------------------------------------------------

--
-- Table structure for table `showsection`
--

CREATE TABLE `showsection` (
  `idShowSection` int(11) NOT NULL,
  `idProduct` int(11) NOT NULL,
  `Image` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `showsection`
--

INSERT INTO `showsection` (`idShowSection`, `idProduct`, `Image`) VALUES
(1, 132132, 'Image/category/camera/canon-R5/canon-R5-Ads.webp'),
(2, 87965, 'Image/category/Laptop/MacBook-Pro-(16-inch,-2021)/MacBook-Pro-(16-inch,-2021)-Ads.webp'),
(3, 324324, 'Image/category/mouse/pop-mouse/pop-mouse-Ads.webp'),
(4, 342546, 'Image/category/lens/Rokinon-Xeen-135mm-T2.2-Professional-Cine-Lens/Rokinon-Xeen-135mm-T2.2-Professional-Cine-Lens-Ads.jpg'),
(5, 145565, 'Image/category/keyboard/POP-KEYS/pop-keys-ads.jpg'),
(6, 124323, 'Image/category/keyboard/Logitech-K835-Wired-Mechanical-Keyboard/Logitech-K835-Wired-Mechanical-Keyboard-ads.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`IdCart`),
  ADD KEY `IdProduct` (`IdProduct`) USING BTREE,
  ADD KEY `IdClient` (`IdClient`) USING BTREE;

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`idCategory`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`IdClient`);

--
-- Indexes for table `deals_of_the_day`
--
ALTER TABLE `deals_of_the_day`
  ADD PRIMARY KEY (`idDealsOfTheDay`),
  ADD KEY `idProduct` (`idProduct`);

--
-- Indexes for table `delivery`
--
ALTER TABLE `delivery`
  ADD PRIMARY KEY (`idDelivery`),
  ADD KEY `idProduct` (`idProduct`),
  ADD KEY `IdClient` (`IdClient`);

--
-- Indexes for table `featured_products`
--
ALTER TABLE `featured_products`
  ADD PRIMARY KEY (`idFeaturedProducts`),
  ADD KEY `idProduct` (`idProduct`);

--
-- Indexes for table `logclient`
--
ALTER TABLE `logclient`
  ADD PRIMARY KEY (`loginId`),
  ADD KEY `IdClient` (`IdClient`);

--
-- Indexes for table `popular_products`
--
ALTER TABLE `popular_products`
  ADD PRIMARY KEY (`idPopularProducts`),
  ADD KEY `idProduct` (`idProduct`),
  ADD KEY `idProduct_2` (`idProduct`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`IdProduct`),
  ADD KEY `idCategory` (`idCategory`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`idReviews`),
  ADD KEY `idProduct` (`idProduct`),
  ADD KEY `IdClient` (`IdClient`);

--
-- Indexes for table `shipping`
--
ALTER TABLE `shipping`
  ADD PRIMARY KEY (`idShipping`),
  ADD KEY `idProduct` (`idProduct`),
  ADD KEY `IdClient` (`IdClient`);

--
-- Indexes for table `showsection`
--
ALTER TABLE `showsection`
  ADD PRIMARY KEY (`idShowSection`),
  ADD KEY `idProduct` (`idProduct`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`IdClient`) REFERENCES `client` (`IdClient`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`IdProduct`) REFERENCES `product` (`IdProduct`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `deals_of_the_day`
--
ALTER TABLE `deals_of_the_day`
  ADD CONSTRAINT `deals_of_the_day_ibfk_1` FOREIGN KEY (`idProduct`) REFERENCES `product` (`IdProduct`);

--
-- Constraints for table `delivery`
--
ALTER TABLE `delivery`
  ADD CONSTRAINT `delivery_ibfk_1` FOREIGN KEY (`idProduct`) REFERENCES `product` (`IdProduct`),
  ADD CONSTRAINT `delivery_ibfk_2` FOREIGN KEY (`IdClient`) REFERENCES `client` (`IdClient`);

--
-- Constraints for table `featured_products`
--
ALTER TABLE `featured_products`
  ADD CONSTRAINT `featured_products_ibfk_1` FOREIGN KEY (`idProduct`) REFERENCES `product` (`IdProduct`);

--
-- Constraints for table `logclient`
--
ALTER TABLE `logclient`
  ADD CONSTRAINT `logclient_ibfk_1` FOREIGN KEY (`IdClient`) REFERENCES `client` (`IdClient`);

--
-- Constraints for table `popular_products`
--
ALTER TABLE `popular_products`
  ADD CONSTRAINT `popular_products_ibfk_1` FOREIGN KEY (`idProduct`) REFERENCES `product` (`IdProduct`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`idCategory`) REFERENCES `category` (`idCategory`);

--
-- Constraints for table `shipping`
--
ALTER TABLE `shipping`
  ADD CONSTRAINT `shipping_ibfk_1` FOREIGN KEY (`idProduct`) REFERENCES `product` (`IdProduct`),
  ADD CONSTRAINT `shipping_ibfk_2` FOREIGN KEY (`IdClient`) REFERENCES `client` (`IdClient`);

--
-- Constraints for table `showsection`
--
ALTER TABLE `showsection`
  ADD CONSTRAINT `showsection_ibfk_1` FOREIGN KEY (`idProduct`) REFERENCES `product` (`IdProduct`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
