-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 09, 2021 at 10:48 AM
-- Server version: 5.7.24
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bloglaravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Yes'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `phone`, `email`, `password`, `status`) VALUES
(1, 'Zaihu Han', '+966545442309', 'zaihu.098@gmail.com', '$2y$10$CUQYs8yjTa5XmRreDKesFuURCNFEO01tWBx6/.az1pgvWKNKYbSWO', 'Yes'),
(2, 'Oyku Ayaz', '+966545442308', 'oyku.A@yahoo.com', '$2y$10$OHPsELvyHo04ZZAEdKSG6.CsF4Zl7oTStp5P9xXwYXvgm.l8oHl7O', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_05_02_095306_create_customers', 1),
(5, '2021_05_03_201718_create_orders', 1),
(6, '2021_05_06_214532_products', 1),
(7, '2021_06_07_105124_orders_products', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `customers_id` bigint(20) UNSIGNED DEFAULT NULL,
  `customer_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pickup_location` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dropoff_location` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_descript` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_amount` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customers_id`, `customer_name`, `customer_number`, `pickup_location`, `dropoff_location`, `order_descript`, `order_amount`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Zaihu Han', '+966545442309', '3220  blue tower', 'saddoun tower', '12 box of donuts', '200', 'Completed', '2021-06-07 14:47:36', '2021-06-07 15:08:12'),
(2, 1, 'Zaihu Han', '+966545442309', '3220  blue tower', '7890 Rakah Al Janubiyah', 'Donuts pack', '10', 'Canceled', '2021-06-07 14:49:04', '2021-06-07 16:10:27'),
(3, 2, 'Oyku Ayaz', '+966545442308', '4561 Rakah Shumalia', '5380 Rakah Al Janubia', '10 box of donuts with 40 cups of regular coffee . Each box containing 5 donuts', '250', 'Pending', '2021-06-07 14:54:36', '2021-06-07 16:11:39'),
(4, 2, 'Oyku Ayaz', '+966545442308', '5480 rakah', 'saddoun tower', '10 donuts with 5 black coffee', '75.95', 'Pending', '2021-06-07 14:56:15', '2021-06-07 14:56:15');

-- --------------------------------------------------------

--
-- Table structure for table `orders_products`
--

CREATE TABLE `orders_products` (
  `id` int(10) UNSIGNED NOT NULL,
  `orders_id` int(10) UNSIGNED DEFAULT NULL,
  `products_id` int(10) UNSIGNED DEFAULT NULL,
  `quantity` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `orders_id` int(10) UNSIGNED DEFAULT NULL,
  `p_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `p_descript` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `categories` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Yes',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `orders_id`, `p_name`, `img`, `p_descript`, `categories`, `price`, `quantity`, `status`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Donuts', 'chocolate_iced_3q_1_637520175928259915.png', 'regular chocolate glazed donut', 'Donuts', '5', '100', 'Yes', '2021-06-08 11:01:29', '2021-06-08 11:01:29'),
(2, NULL, 'Coffee', 'ec316ad916ce67ca14206bbf5fcf0563-size900.jpeg', 'regular black coffee with cream', 'Drinks', '4', '100', 'Yes', '2021-06-08 15:46:48', '2021-06-08 15:46:48'),
(3, NULL, 'Chocolate Donuts', 'http://blog.test/images', 'Regular chocolate glazed Donut', 'Donuts', '5.00', '200', 'Yes', '2021-06-09 13:41:37', '2021-06-09 13:41:37'),
(4, NULL, 'Glazed Donuts', 'big-donuts-112346.jpg', 'Regular sugar glazed donuts', 'Donuts', '5.00', '200', 'Yes', '2021-06-09 13:41:38', '2021-06-09 13:43:28'),
(5, NULL, 'Baby Donuts', '188eeb53cb4dff581e1378d742c30675-size900.png', 'different flavours and glazed donuts', 'Baby Donuts', '3.00', '150', 'Yes', '2021-06-09 13:41:38', '2021-06-09 13:44:39'),
(6, NULL, 'Coffee', 'http://blog.test/images', 'Regular black coffee with creame', 'Drinks', '2.50', '300', 'Yes', '2021-06-09 13:41:38', '2021-06-09 13:41:38'),
(7, NULL, 'Cappuccino', 'download (1).jpg', 'french vanilaa flavour cappuccino', 'Drinks', '10.00', '100', 'Yes', '2021-06-09 13:41:38', '2021-06-09 13:45:29'),
(8, NULL, 'Big sized Donuts', 'http://blog.test/images', 'Differend shaped donuts with different glaze either sugar or chocolate', 'Donuts', '7.00', '150', 'Yes', '2021-06-09 13:41:39', '2021-06-09 13:41:39'),
(9, NULL, 'Eid Specials', 'http://blog.test/images', 'special donuts for eid and limited editio', 'Specials', '8.00', '300', 'Yes', '2021-06-09 13:41:39', '2021-06-09 13:41:39'),
(10, NULL, 'National Day Speial ', 'http://blog.test/images', 'Green and white colored donuts for independence day', 'Specials', '6.00', '400', 'Yes', '2021-06-09 13:41:39', '2021-06-09 13:41:39'),
(11, NULL, 'Offers', 'http://blog.test/images', 'Special offeres for regular donuts in the shop', 'Donuts', '3.50', '200', 'Yes', '2021-06-09 13:41:40', '2021-06-09 13:41:40');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `usertype` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Yes',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `phone`, `usertype`, `email`, `email_verified_at`, `password`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', '+966503156709', 'admin', 'ay@gmail.com', NULL, '$2y$10$4/kBncrdmYCp5PggWHdPJOWR41PPD9/HB8AeJlKj4CiOJx5bOZcFS', 'Yes', NULL, '2021-06-07 14:44:05', '2021-06-07 14:44:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customers_id_unique` (`id`),
  ADD UNIQUE KEY `customers_email_unique` (`email`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_customers_id_foreign` (`customers_id`);

--
-- Indexes for table `orders_products`
--
ALTER TABLE `orders_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_products_orders_id_foreign` (`orders_id`),
  ADD KEY `orders_products_products_id_foreign` (`products_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_orders_id_foreign` (`orders_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orders_products`
--
ALTER TABLE `orders_products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_customers_id_foreign` FOREIGN KEY (`customers_id`) REFERENCES `customers` (`id`);

--
-- Constraints for table `orders_products`
--
ALTER TABLE `orders_products`
  ADD CONSTRAINT `orders_products_orders_id_foreign` FOREIGN KEY (`orders_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `orders_products_products_id_foreign` FOREIGN KEY (`products_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_orders_id_foreign` FOREIGN KEY (`orders_id`) REFERENCES `orders` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
