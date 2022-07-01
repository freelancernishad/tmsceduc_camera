-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 20, 2022 at 08:42 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stock_management1`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `created_at`, `updated_at`) VALUES
(1, 'c', '2022-05-07 04:46:02', '2022-05-07 04:46:02'),
(2, 'c1', '2022-05-07 09:43:34', '2022-05-07 09:43:34'),
(3, 'c2', '2022-05-07 09:43:39', '2022-05-07 09:43:39'),
(4, 'c3', '2022-05-07 09:43:41', '2022-05-07 09:43:41'),
(5, 'c4', '2022-05-07 09:43:44', '2022-05-07 09:43:44'),
(6, 'c5', '2022-05-07 09:43:45', '2022-05-07 09:43:45'),
(7, 'c6', '2022-05-07 09:43:48', '2022-05-07 09:43:48'),
(8, 'c7', '2022-05-07 09:43:52', '2022-05-07 09:43:52'),
(9, 'c8', '2022-05-07 09:43:55', '2022-05-07 09:43:55'),
(10, 'c9', '2022-05-07 09:43:58', '2022-05-07 09:43:58'),
(11, 'c10.', '2022-05-07 09:44:01', '2022-05-07 09:44:01'),
(12, 'c10', '2022-05-07 09:44:02', '2022-05-07 09:44:02'),
(13, 'c11', '2022-05-07 09:44:06', '2022-05-07 09:44:06'),
(14, 'c12', '2022-05-07 09:44:09', '2022-05-07 09:44:09'),
(15, 'c13', '2022-05-07 09:44:11', '2022-05-07 09:44:11'),
(16, 'c14', '2022-05-07 09:44:14', '2022-05-07 09:44:14'),
(17, 'bish', '2022-06-13 09:04:42', '2022-06-13 09:04:42');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `phone`, `address`, `photo`, `created_at`, `updated_at`) VALUES
(1, 'Md Nishad Hossain cu', 'tmscedu2019@gmail.com', '+8801909756552', 'Baneshorpara, Tepriganj, Debiganj, Panchagarh', 'backend/customer/1651898903.jpeg', '2022-05-07 04:48:23', '2022-05-07 04:48:23'),
(2, 'Nishad Hossain', 'freelancernishad123@gmail.com', '+8801909756553', 'Baneshorpara, Tepriganj, Debiganj, Panchagarh', 'backend/customer/1652115202.jpeg', '2022-05-09 16:53:22', '2022-05-09 16:53:22');

-- --------------------------------------------------------

--
-- Table structure for table `custom_order_details`
--

CREATE TABLE `custom_order_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_quantity` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_quantity_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub_total` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `custom_order_details`
--

INSERT INTO `custom_order_details` (`id`, `order_id`, `product_name`, `product_quantity`, `product_quantity_type`, `product_price`, `sub_total`, `created_at`, `updated_at`) VALUES
(39, 18, 'p1', '5', 'কেজি', '20', '100', NULL, NULL),
(40, 18, 'p2', '15', 'কেজি', '10', '150', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `duepayments`
--

CREATE TABLE `duepayments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `payment_amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payBy` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pay_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pay_month` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pay_year` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `duepayments`
--

INSERT INTO `duepayments` (`id`, `customer_id`, `order_id`, `payment_amount`, `payBy`, `pay_date`, `pay_month`, `pay_year`, `created_at`, `updated_at`) VALUES
(19, 2, 16, '10', 'Hand Cash', '14/06/2022', 'June', '2022', '2022-06-14 12:25:39', '2022-06-14 12:25:39'),
(20, 2, 16, '1', 'Hand Cash', '14/06/2022', 'June', '2022', '2022-06-14 12:27:20', '2022-06-14 12:27:20');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `salary` double(8,2) NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `joining_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `name`, `email`, `phone`, `address`, `salary`, `photo`, `nid`, `joining_date`, `created_at`, `updated_at`) VALUES
(1, 'Md Nishad Hossain', 'tmscedu2019@gmail.com', '+8801909756552', 'Baneshorpara, Tepriganj, Debiganj, Panchagarh', 20000.00, 'backend/employee/1651898746.jpeg', '21542555555', '2022-05-07', '2022-05-07 04:45:46', '2022-05-07 04:45:46'),
(2, 'Md Nishad Hossain4', 'freelancernishad123@gmail.com', '+8801909756554', 'Baneshorpara, Tepriganj, Debiganj, Panchagarh', 11.00, NULL, '456456', '2022-05-18', '2022-05-16 06:56:39', '2022-05-16 06:56:39');

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `details` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expense_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`id`, `details`, `amount`, `expense_date`, `created_at`, `updated_at`) VALUES
(1, 'gdg', '10', '2022-05-19', '2022-05-19 03:35:28', '2022-05-19 03:35:28');

-- --------------------------------------------------------

--
-- Table structure for table `extra`
--

CREATE TABLE `extra` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `vat` int(11) NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `favicon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Invoices` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id`, `customer_name`, `address`, `date`, `type`, `Invoices`, `total_amount`, `created_at`, `updated_at`) VALUES
(1, 'নাম', 'নাম ঠিকানা', '2022-06-15', 'কেনা', '[{\"name\":\"\\u09a8\\u09be\\u09ae\",\"weight_quantity\":\"5\",\"price\":\"20\"},{\"name\":\"\\u09a8\\u09be\\u09ae2\",\"weight_quantity\":\"10\",\"price\":\"15\"}]', '250\r\n', '2022-06-15 07:34:57', '2022-06-15 07:34:57'),
(2, 'নাম', 'ঠিকানা', '2022-06-15', 'বেচা', '[{\"name\":\"\\u09a8\\u09be\\u09ae\",\"weight_quantity\":\"5\",\"price\":\"10\"},{\"name\":\"\\u09a8\\u09be\\u09ae2\",\"weight_quantity\":\"10\",\"price\":\"20\"}]', '250', '2022-06-15 08:15:08', '2022-06-15 08:15:08');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_09_25_202239_create_employees_table', 1),
(5, '2020_09_29_204653_create_suppliers_table', 1),
(6, '2020_09_29_214249_create_categories_table', 1),
(7, '2020_09_30_144042_create_products_table', 1),
(8, '2020_09_30_211814_create_expenses_table', 1),
(9, '2020_10_02_093726_create_salaries_table', 1),
(10, '2020_10_02_202045_create_customers_table', 1),
(11, '2020_10_03_191534_create_pos_table', 1),
(12, '2020_10_04_105052_create_extra_table', 1),
(13, '2020_10_04_194336_create_orders_table', 1),
(14, '2020_10_04_194547_create_order_details_table', 1),
(15, '2016_06_01_000001_create_oauth_auth_codes_table', 2),
(16, '2016_06_01_000002_create_oauth_access_tokens_table', 2),
(17, '2016_06_01_000003_create_oauth_refresh_tokens_table', 2),
(18, '2016_06_01_000004_create_oauth_clients_table', 2),
(19, '2016_06_01_000005_create_oauth_personal_access_clients_table', 2),
(20, '2019_12_14_000001_create_personal_access_tokens_table', 2),
(21, '2022_05_15_120650_create_duepayments_table', 3),
(22, '2022_06_15_132454_create_invoices_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('020d21a403140e44cf8b795c12717196ba8e0f2059386ebf4a46e996d620e2f2de3104aaf21193ce', 3, 3, 'accessToken', '[]', 0, '2022-06-13 09:00:30', '2022-06-13 09:00:30', '2023-06-13 15:00:30'),
('12b7631d8a7f94e47e1b8f18b3323c30d3637ca6f6af49dc0ff221728f7b039d087247cbb39d6a73', 3, 3, 'accessToken', '[]', 0, '2022-05-10 15:19:00', '2022-05-10 15:19:00', '2023-05-10 21:19:00'),
('17e3aa1691e92931ef8d235e525403be41cc4c504e4a529af19016ba5e05aa345e72beb74f929593', 3, 3, 'accessToken', '[]', 0, '2022-05-10 15:19:22', '2022-05-10 15:19:22', '2023-05-10 21:19:22'),
('1c69551be92a09a6fcbea40144aa20552337423237e2ca75f54f1683c2776da14d3ffb64ffe9ddbf', 3, 3, 'accessToken', '[]', 0, '2022-06-13 09:00:30', '2022-06-13 09:00:30', '2023-06-13 15:00:30'),
('1d898d494251ed9777d777bb9819e23f57318526f16ccaf30befd607fbbad94a31a970bad23e8a81', 3, 3, 'accessToken', '[]', 0, '2022-05-10 15:19:22', '2022-05-10 15:19:22', '2023-05-10 21:19:22'),
('1f7748f80407bb24438edc9024cfc2d58ce2884ddcb49704ca7eb4ae8ec7d01ce0a03ab9bec7d0fe', 3, 3, 'accessToken', '[]', 0, '2022-05-09 17:51:56', '2022-05-09 17:51:56', '2023-05-09 23:51:56'),
('23a6ac90695d1e76ef670ea971d3a82b0e78fa18be1fbc590af293b0dccb6c270637c8cac546ba0b', 3, 3, 'accessToken', '[]', 0, '2022-06-20 03:13:09', '2022-06-20 03:13:09', '2023-06-20 09:13:09'),
('2a0086967cea70693f5c1a3d1cc4edbe6e69dfba78e59a62ba4c68dd82997f8dad7e95c063a7bbf1', 3, 3, 'accessToken', '[]', 0, '2022-05-10 16:21:29', '2022-05-10 16:21:29', '2023-05-10 22:21:29'),
('45da066dba301aefdf155020a5e38049f86eddaa27295c5bcc48b70ec46ecf1163cf191528d0e877', 3, 3, 'accessToken', '[]', 0, '2022-05-10 16:21:29', '2022-05-10 16:21:29', '2023-05-10 22:21:29'),
('48ae9f8f54a71a9ae0563739033260c5ae730804431bbd807c6ee12ad9cc119a5c6a223bc93e5b3d', 3, 3, 'accessToken', '[]', 0, '2022-05-09 18:31:05', '2022-05-09 18:31:05', '2023-05-10 00:31:05'),
('5c184184ac0c2d3754bce21e3ba61e6de41cb661742f7b48307ab993a6c153b1d59a270075e30959', 3, 3, 'accessToken', '[]', 0, '2022-05-09 18:31:10', '2022-05-09 18:31:10', '2023-05-10 00:31:10'),
('9108b1939d33660b162c8b76ae2e6433edf4d6652c0325964365dbedb67b572967d35775dd6f9091', 3, 3, 'accessToken', '[]', 0, '2022-06-13 08:55:50', '2022-06-13 08:55:50', '2023-06-13 14:55:50'),
('b48905d0c95177a05f230e5cce48d3511c511d81c4ccc5e0943f7fb193069d96b99d4ab6bae19938', 3, 3, 'accessToken', '[]', 0, '2022-05-09 18:46:16', '2022-05-09 18:46:16', '2023-05-10 00:46:16'),
('b7a21de6da51a0d6ad85b6310f05cfb90fe31117303461a9f30fd16889c9d86da20baaf469140239', 3, 3, 'accessToken', '[]', 0, '2022-06-13 08:55:50', '2022-06-13 08:55:50', '2023-06-13 14:55:50'),
('ec84868d3d54c0f91da31729cc3200b524d75047dd044cd00ac258c8e261fee71e40be27a022a01b', 3, 3, 'accessToken', '[]', 0, '2022-06-20 03:13:09', '2022-06-20 03:13:09', '2023-06-20 09:13:09'),
('ef84316ab52dacd64aa72ec7ceb0d261c50cb87a97bc911ea5ceb86f4896f3f164fa9245509f2c35', 1, 1, 'accessToken', '[]', 0, '2022-05-09 17:49:37', '2022-05-09 17:49:37', '2023-05-09 23:49:37');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `provider`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Laravel8.2 Personal Access Client', 'gsOxvzM3apLHqIUjpZ9U7RZTbZFyyzcM9hnB86uf', NULL, 'http://localhost', 1, 0, 0, '2022-05-09 17:46:35', '2022-05-09 17:46:35'),
(2, NULL, 'Laravel8.2 Personal Access Client', 'yt627NWiYq2OLmzxgMOGhilni83ogPZV5Zc85RJD', NULL, 'http://localhost', 1, 0, 0, '2022-05-09 17:50:55', '2022-05-09 17:50:55'),
(3, NULL, 'Laravel8.2 Personal Access Client', '5FBGE0uVvp0DyPZ5L7Xe8xgu9r1D0JjUfybfNuRm', NULL, 'http://localhost', 1, 0, 0, '2022-05-09 17:51:00', '2022-05-09 17:51:00');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2022-05-09 17:46:35', '2022-05-09 17:46:35'),
(2, 2, '2022-05-09 17:50:55', '2022-05-09 17:50:55'),
(3, 3, '2022-05-09 17:51:00', '2022-05-09 17:51:00');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` int(11) NOT NULL,
  `qty` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub_total` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pay` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `due` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payBy` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_month` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_year` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `qty`, `sub_total`, `vat`, `total`, `pay`, `due`, `payBy`, `order_date`, `order_month`, `order_year`, `created_at`, `updated_at`) VALUES
(16, 2, '4', '45', NULL, NULL, '41', '4', 'Hand Cash', '14/06/2022', 'June', '2022', NULL, NULL),
(17, 1, '2', '270', NULL, NULL, '200', '70', 'Hand Cash', '20/06/2022', 'June', '2022', NULL, NULL),
(18, 1, '2', '270', NULL, NULL, '200', '70', 'Hand Cash', '20/06/2022', 'June', '2022', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `product_quantity` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub_total` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `product_quantity`, `product_price`, `sub_total`, `created_at`, `updated_at`) VALUES
(33, 16, 10, '1', '12', '12', NULL, NULL),
(34, 16, 9, '1', '11', '11', NULL, NULL),
(35, 16, 6, '1', '11', '11', NULL, NULL),
(36, 16, 3, '1', '11', '11', NULL, NULL),
(37, 17, 10, '1', '10', '10', NULL, NULL),
(38, 17, 3, '1', '10', '10', NULL, NULL),
(39, 18, 10, '1', '10', '10', NULL, NULL),
(40, 18, 3, '1', '10', '10', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pos`
--

CREATE TABLE `pos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_quantity` int(11) DEFAULT NULL,
  `product_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub_total` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `supplier_id` int(11) DEFAULT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `root` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `buying_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `selling_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `buying_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_quantity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `supplier_id`, `product_name`, `product_code`, `root`, `buying_price`, `selling_price`, `buying_date`, `image`, `product_quantity`, `created_at`, `updated_at`) VALUES
(2, 1, 1, 'product2', '123456', '+8801909756552', '50', '55', '2022-05-07', 'backend/product/1651907842.jpeg', '0', '2022-05-07 07:17:22', '2022-05-07 07:17:22'),
(3, 6, 1, 'product3', '1451', '+8801722597565', '11', '11', '2022-05-07', 'backend/product/1651916710.jpeg', '15', '2022-05-07 09:45:10', '2022-05-07 09:45:10'),
(4, 1, 1, 'product1', '1234', '01909756552', '10', '12', '2022-05-07', 'backend/product/1651898842.jpeg', '0', '2022-05-07 04:47:22', '2022-05-07 04:47:46'),
(6, 6, 1, 'product3', '1452', '+8801722597565', '11', '11', '2022-05-07', 'backend/product/1651916710.jpeg', '16', '2022-05-07 09:45:10', '2022-05-07 09:45:10'),
(7, 1, 1, 'product1', '1235', '01909756552', '10', '12', '2022-05-07', 'backend/product/1651898842.jpeg', '0', '2022-05-07 04:47:22', '2022-05-07 04:47:46'),
(8, 1, 1, 'product2', '123452', '+8801909756552', '50', '55', '2022-05-07', 'backend/product/1651907842.jpeg', '0', '2022-05-07 07:17:22', '2022-05-07 07:17:22'),
(9, 6, 1, 'product3', '1453', '+8801722597565', '11', '11', '2022-05-07', 'backend/product/1651916710.jpeg', '5', '2022-05-07 09:45:10', '2022-05-07 09:45:10'),
(10, 11, 1, 'product1', '1236', '01909756552', '10', '12', '2022-05-07', 'backend/product/1651898842.jpeg', '6', '2022-05-07 04:47:22', '2022-06-13 08:50:20'),
(11, 1, 1, 'product2', '123453', '+8801909756552', '50', '55', '2022-05-07', 'backend/product/1651907842.jpeg', '0', '2022-05-07 07:17:22', '2022-05-16 09:47:23');

-- --------------------------------------------------------

--
-- Table structure for table `salaries`
--

CREATE TABLE `salaries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` int(11) NOT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `salary_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `salary_month` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `salary_year` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `salaries`
--

INSERT INTO `salaries` (`id`, `employee_id`, `amount`, `salary_date`, `salary_month`, `salary_year`, `created_at`, `updated_at`) VALUES
(1, 1, '20000', '07/05/2022', 'January', '2022', NULL, NULL),
(2, 1, '20000', '07/05/2022', 'February', '2022', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shopName` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `name`, `email`, `phone`, `address`, `photo`, `shopName`, `created_at`, `updated_at`) VALUES
(1, 'Md Nishad Hossainss', 'tmscedu2019@gmail.com', '+8801909756552', 'Baneshorpara, Tepriganj, Debiganj, Panchagarh', 'backend/supplier/1651898804.jpeg', '11', '2022-05-07 04:46:45', '2022-05-07 04:46:45');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(3, 'Md Nishad Hossain', 'tmscedu2019@gmail.com', NULL, '$2y$10$PTraPAGMTeDVAp5dKdVNhu2rboFMcE9uat8NVyzb0jV/dK2akWPBa', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `custom_order_details`
--
ALTER TABLE `custom_order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `duepayments`
--
ALTER TABLE `duepayments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `extra`
--
ALTER TABLE `extra`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_auth_codes_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `pos`
--
ALTER TABLE `pos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_code` (`product_code`);

--
-- Indexes for table `salaries`
--
ALTER TABLE `salaries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `custom_order_details`
--
ALTER TABLE `custom_order_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `duepayments`
--
ALTER TABLE `duepayments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `extra`
--
ALTER TABLE `extra`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pos`
--
ALTER TABLE `pos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=147;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `salaries`
--
ALTER TABLE `salaries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
