-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 01, 2024 at 12:50 PM
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
-- Database: `plants_ecomm`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminlogin`
--

CREATE TABLE `adminlogin` (
  `id` int(5) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `status` varchar(200) NOT NULL DEFAULT 'active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `adminlogin`
--

INSERT INTO `adminlogin` (`id`, `email`, `password`, `status`, `created_at`) VALUES
(1, 'admin@gmail.com', '202cb962ac59075b964b07152d234b70', 'active', '2023-07-02 06:21:01');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(6) NOT NULL,
  `productname` varchar(100) NOT NULL,
  `quantity` int(9) NOT NULL,
  `price` int(9) NOT NULL,
  `total_price` int(5) NOT NULL,
  `email` varchar(200) NOT NULL,
  `status` varchar(200) NOT NULL DEFAULT 'active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `productname`, `quantity`, `price`, `total_price`, `email`, `status`, `created_at`) VALUES
(5, 'indoor money plants', 2, 1200, 2400, '', 'active', '2024-03-31 11:09:05'),
(7, 'Colored sketches', 1, 3000, 3000, '', 'active', '2024-03-31 11:58:04'),
(8, 'ring', 2, 20000, 40000, '', 'active', '2024-04-01 10:10:55');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(6) NOT NULL,
  `category_name` varchar(200) NOT NULL,
  `thumbnail` varchar(200) NOT NULL,
  `status` varchar(200) NOT NULL DEFAULT 'active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category_name`, `thumbnail`, `status`, `created_at`) VALUES
(5, 'Silver', '1633548458r6.jpg', 'active', '2024-04-01 05:17:37'),
(6, 'Gold', '1845155794bt.jpg', 'active', '2024-04-01 05:17:45');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(6) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `message` longtext NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'Active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `subject`, `message`, `status`, `created_at`) VALUES
(1, 'Janki Janki', 'admin@gmail.com', 'demo', 'demo', 'Active', '2024-03-31 13:32:31');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(9) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `address` longtext NOT NULL,
  `contact` int(9) NOT NULL,
  `orderno` varchar(300) NOT NULL,
  `totalprice` int(9) NOT NULL,
  `orderdate` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `name`, `email`, `address`, `contact`, `orderno`, `totalprice`, `orderdate`, `status`, `created_at`) VALUES
(1, 'komal', 'komal@gmail.com', 'oihugyhjkm', 2147483647, 'OD1796918353', 5700, '29-08-23', 'Delivered', '2023-08-29 06:59:01'),
(2, 'janki', 'janki@gmail.com', '120 kalia colony jalandhar', 854645435, 'OD690636041', 6300, '31-03-24', 'Delivered', '2024-03-31 11:14:59'),
(3, 'janki', 'janki@gmail.com', '120 kalia colony jalandhar', 854645435, 'OD2025279033', 40100, '01-04-24', 'pending', '2024-04-01 10:44:42');

-- --------------------------------------------------------

--
-- Table structure for table `orderdetails`
--

CREATE TABLE `orderdetails` (
  `id` int(6) NOT NULL,
  `productname` varchar(200) NOT NULL,
  `quantity` int(6) NOT NULL,
  `price` int(9) NOT NULL,
  `orderno` varchar(200) NOT NULL,
  `status` varchar(200) NOT NULL DEFAULT 'active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orderdetails`
--

INSERT INTO `orderdetails` (`id`, `productname`, `quantity`, `price`, `orderno`, `status`, `created_at`) VALUES
(1, 'lily', 2, 1000, 'OD1796918353', 'active', '2023-08-29 06:59:02'),
(2, 'indoor money plants', 3, 1200, 'OD1796918353', 'active', '2023-08-29 06:59:02'),
(3, 'lily', 5, 1000, 'OD690636041', 'active', '2024-03-31 11:14:59'),
(4, 'indoor money plants', 1, 1200, 'OD690636041', 'active', '2024-03-31 11:14:59'),
(5, 'ring', 2, 20000, 'OD2025279033', 'active', '2024-04-01 10:44:42');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(6) NOT NULL,
  `productname` varchar(200) NOT NULL,
  `category_name` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL,
  `price` int(9) NOT NULL,
  `description` longtext NOT NULL,
  `status` varchar(200) NOT NULL DEFAULT 'active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `productname`, `category_name`, `image`, `price`, `description`, `status`, `created_at`) VALUES
(5, 'ring', 'Silver', '8736849491633548458r6.jpg', 20000, 'Beautiful color and asthetic', 'active', '2024-04-01 07:39:23');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(9) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(100) NOT NULL,
  `address` longtext NOT NULL,
  `contact` bigint(10) NOT NULL,
  `status` varchar(200) NOT NULL DEFAULT 'active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `address`, `contact`, `status`, `created_at`) VALUES
(1, 'avneet', 'avneet@gmail.com', '202cb962ac59075b964b07152d234b70', 'jalandhar', 645435435, 'active', '2023-07-04 12:12:44'),
(3, 'janki', 'janki@gmail.com', '202cb962ac59075b964b07152d234b70', '120 kalia colony jalandhar', 854645435, 'active', '2023-07-11 16:53:44'),
(4, 'nandini', 'nandini@gmail.com', '202cb962ac59075b964b07152d234b70', 'jalandhar', 9845403944, 'active', '2023-07-12 18:40:04'),
(5, 'komal', 'komal@gmail.com', '202cb962ac59075b964b07152d234b70', 'oihugyhjkm', 9845403943, 'active', '2023-08-26 04:36:45'),
(6, 'simran', 's@gmail.com', '202cb962ac59075b964b07152d234b70', 'Jalandhhar', 9845403942, 'active', '2023-08-26 11:26:18'),
(7, 'komal', 'komal@gmail.com', '202cb962ac59075b964b07152d234b70', 'Model Town', 9845403942, 'active', '2023-08-29 05:42:32');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminlogin`
--
ALTER TABLE `adminlogin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminlogin`
--
ALTER TABLE `adminlogin`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `orderdetails`
--
ALTER TABLE `orderdetails`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
