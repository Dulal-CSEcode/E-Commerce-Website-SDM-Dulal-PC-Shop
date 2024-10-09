-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 31, 2024 at 05:02 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

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
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `pid` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(100) NOT NULL,
  `quantity` int(100) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `pid`, `name`, `price`, `quantity`, `image`) VALUES
(72, 41, 30, 'Beetroot', 120, 1, 'Beetroot.jpg'),
(82, 45, 53, 'lime', 100, 1, 'lime.jpg'),
(86, 47, 30, 'Beetroot', 120, 9, 'Beetroot.jpg'),
(87, 47, 29, 'Carrot', 268, 1, 'carrot.png'),
(88, 45, 29, 'Carrot', 268, 1, 'carrot.png');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `number` varchar(12) NOT NULL,
  `message` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `number` varchar(12) NOT NULL,
  `email` varchar(100) NOT NULL,
  `method` varchar(50) NOT NULL,
  `address` varchar(500) NOT NULL,
  `total_products` varchar(1000) NOT NULL,
  `total_price` int(100) NOT NULL,
  `placed_on` varchar(50) NOT NULL,
  `payment_status` varchar(20) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `name`, `number`, `email`, `method`, `address`, `total_products`, `total_price`, `placed_on`, `payment_status`) VALUES
(22, 52, 'irteja mahmud', '01632645891', 'irtejamahamud9@gmail.com', 'cash on delivery', 'flat no. 77 15 Dhaka Dhaka Bangladesh - ', ', MacBook Pro ( 1 )', 110000, '26-May-2024', 'completed'),
(23, 52, 'irteja mahmud', '1632645891', 'irti@gmail.com', 'cash on delivery', 'flat no. 54 Lichubagan  Basundhara Dhaka Bangladesh - ', ', Acer Predator Helios 18 ( 1 )', 215000, '28-May-2024', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `category` varchar(20) NOT NULL,
  `details` varchar(500) NOT NULL,
  `price` int(100) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `category`, `details`, `price`, `image`) VALUES
(29, 'MacBook Pro', 'Laptop', 'Apple MacBook Pro 14-inch, M1 Pro Chip, 16GB RAM, 512GB SSD.', 110000, 'apple-mac-pro.jpg'),
(30, 'Dell Inspiron', 'Laptop', 'Dell Inspiron 15, Intel Core i7, 16GB RAM, 512GB SSD.', 98000, 'Dell Inspiron 15 3501 Core i5 11th-400x400.jpg'),
(31, 'HP Pavilion', 'Laptop', 'HP Pavilion 15, Intel Core i5, 8GB RAM, 256GB SSD.', 82000, 'c06912414.png'),
(32, 'Asus ROG', 'Laptop', 'Asus ROG Strix, AMD Ryzen 9, 16GB RAM, 1TB SSD.', 144000, 'asus_rog.jpg'),
(33, 'Samsung Galaxy S21', 'Mobile', 'Samsung Galaxy S21, 128GB.', 66000, 's21_galaxy.jpg'),
(34, 'iPhone 14', 'Mobile', 'Apple iPhone 14, 128GB, Blue.', 81000, 'images.jfif'),
(35, 'OnePlus 9', 'Mobile', 'OnePlus 9, 128GB, Winter Mist.', 36000, 's21_galaxy.jpg'),
(36, 'Google Pixel 6', 'Mobile', 'Google Pixel 6, 128GB, Black.', 43500, 'pixel_6.jpg'),
(37, 'Dell XPS 8940', 'PC', 'Dell XPS 8940 Desktop, Intel Core i7, 16GB RAM, 1TB HDD + 512GB SSD.', 11700, 'dell_xps.jpg'),
(38, 'HP Omen 30L', 'PC', 'HP Omen 30L, AMD Ryzen 7, 16GB RAM, 1TB SSD.', 77000, 'hp_omen.jpg'),
(39, 'Acer Predator Orion 3000', 'PC', 'Acer Predator Orion 3000, Intel Core i7, 16GB RAM, 512GB SSD.', 135900, 'Acer_Predator_Orion.jfif'),
(40, 'Corsair Vengeance i7200', 'PC', 'Corsair Vengeance i7200, Intel Core i9, 32GB RAM, 1TB SSD.', 7000, 'corsair.jpg'),
(41, 'Samsung Odyssey   G7', 'Monitor', 'Samsung Odyssey G7, 32-inch, 1440p, 240Hz.', 74999, 'Samsung Odyssey G7.jpg'),
(42, 'LG UltraGear 27GN950', 'Monitor', 'LG UltraGear 27GN950, 27-inch, 4K, 144Hz.', 107250, 'LG UltraGear 27GN950.jpg'),
(43, 'Asus TUF Gaming VG27AQ', 'Monitor', 'Asus TUF Gaming VG27AQ, 27-inch, 1440p, 165Hz.', 58000, 'Asus TUF Gaming VG27AQ.jfif'),
(44, 'Dell UltraSharp U2720Q', 'Monitor', 'Dell UltraSharp U2720Q, 27-inch, 4K, 60Hz.', 72000, 'Dell UltraSharp U2720Q.jpg'),
(71, 'Lenovo IdeaPad 1', 'Laptop', 'AMD Ryzen 5, 8GB DDR5 RAM 256GB SSD', 57000, 'Screenshot 2024-05-27 231038.png'),
(72, 'iPhone 15', 'Mobile', 'Apple iPhone 15, 256GB 6GB RAM, Pink.', 93000, 'iPhone-15-Plus-(4)-7443.jpg'),
(73, 'Acer Predator Helios 18', 'Laptop', 'Intel Core i9, NVIDIA RTX 4060, 165Hz Gaming Laptop', 215000, 'Acer-Predator-Helios-18.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `reviews` varchar(300) NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`id`, `name`, `reviews`, `userid`) VALUES
(8, 'Tanjim', 'DigitalMart offers a seamless shopping experience with fast delivery and excellent customer service. Highly recommend!', 1),
(9, 'Abid', 'Good product selection and user-friendly site, but shipping was slightly delayed. Overall, a decent shopping experience.', 2),
(10, 'Nazmul', 'Lovely little shop in the FarmFresh compound with a good range of organic products.', 3),
(11, 'Irteja ', 'Good product selection and user-friendly site, but shipping was slightly delayed. Overall, a decent shopping experience.', 52);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `user_type` varchar(20) NOT NULL DEFAULT 'user',
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `user_type`, `image`) VALUES
(50, 'Admin', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'admin', '1706601911714.jpg'),
(51, 'shayon', 'shaon@gmail.com', 'b8338bfdd797c08f8e5d7b2f22d0b854', 'user', 'Pic5.jfif'),
(52, 'irteja', 'irtejamahamud9@gmail.com', 'fe418b78efe16089c1da72559c875f9b', 'user', '1706601911714.jpg'),
(53, 'Shaon', 'shahriarhossenshaon4@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'user', '285809179_3033322080265154_1410153340465777872_n.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `pid` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(100) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`id`, `user_id`, `pid`, `name`, `price`, `image`) VALUES
(63, 49, 30, 'Beetroot', 120, 'Beetroot.jpg'),
(64, 49, 31, 'Capsicum ', 210, 'capsicum.jfif');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
