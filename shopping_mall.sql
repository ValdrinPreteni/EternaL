-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 17, 2022 at 09:07 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shopping_mall`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `name` text NOT NULL,
  `productCode` text NOT NULL,
  `unit` text NOT NULL,
  `price` float NOT NULL,
  `category` text NOT NULL,
  `description` text NOT NULL,
  `Image` text NOT NULL,
  `qtyInStock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`name`, `productCode`, `unit`, `price`, `category`, `description`, `Image`, `qtyInStock`) VALUES
('Apple', 'apple', 'apple', 1, 'fruit', 'apple', 'https://media.istockphoto.com/photos/red-apple-with-leaf-isolated-on-white-background-picture-id185262648?b=1&k=20&m=185262648&s=170667a&w=0&h=2ouM2rkF5oBplBmZdqs3hSOdBzA4mcGNCoF2P0KUMTM=', 100),
('Banana', 'banana', 'banana', 2, 'fruit', 'banana', 'https://upload.wikimedia.org/wikipedia/commons/8/8a/Banana-Single.jpg', 100),
('Red Dragon Fruit', 'reddragonfruit', 'reddragonfruit', 15, 'fruit', 'red dragon fruit', 'https://produits.bienmanger.com/38126-0w470h470_Red_Dragon_Fruit.jpg', 15),
('Avocado', 'avocado', 'avocado', 2, 'fruit', 'avocado', 'https://res.cloudinary.com/dk-find-out/image/upload/q_80,w_960,f_auto/DCTM_Penguin_UK_DK_AL226924_ohrtyp.jpg', 10),
('Kiwi', 'kiwi', 'kiwi', 1, 'fruit', 'kiwi', 'https://images.immediate.co.uk/production/volatile/sites/30/2020/02/Kiwi-fruits-582a07b.jpg?quality=90&resize=768,574', 100),
('Pineapple', 'Pineapple', 'Pineapple', 3, 'fruit', 'Pineapple', 'https://media.baamboozle.com/uploads/images/120695/1631109445_135910_url.jpeg', 25),
('Potato', 'Potato', 'Potato', 0.2, 'vegetable', 'Potato', 'http://cdn.shopify.com/s/files/1/0378/0886/5325/products/yellowpotato_0dccf9cf-b901-44d9-ab12-43101190f35e_1200x1200.jpg?v=1625500267', 100),
('Chips', 'chips', 'chips', 1, 'snacks', 'chips', 'https://m.media-amazon.com/images/I/81vJyb43URL._SL1500_.jpg', 53);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `name` text NOT NULL,
  `email` text NOT NULL,
  `address` text NOT NULL,
  `username` text NOT NULL,
  `role` int(1) NOT NULL,
  `createDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `password` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`name`, `email`, `address`, `username`, `role`, `createDate`, `password`) VALUES
('Valdrin', 'info@eternals.com', 'NA', 'EternaL', 1, '0000-00-00 00:00:00', 'eternal123');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
