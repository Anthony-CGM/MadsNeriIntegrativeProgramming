-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 05, 2023 at 10:42 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `madsneri2`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(10) UNSIGNED NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `lname` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `fname` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `addressline` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `town` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `zipcode` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `img_path` text COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'images/customers.jpg',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `title`, `lname`, `fname`, `addressline`, `town`, `zipcode`, `phone`, `img_path`, `created_at`, `updated_at`, `user_id`) VALUES
(2, 'customers', 'customers', 'customers', 'customers', 'customers', '1231234', '1231234', 'images/cust1.JPG', '2023-01-03 02:33:33', '2023-01-05 13:10:29', 3),
(5, 'customer2', 'customer2', 'customer2', 'customer2', 'customer2', '123123123', '123123123', 'images/1672952895-cust2.JPG', '2023-01-05 13:08:15', '2023-01-05 13:08:15', 15),
(6, 'customer3', 'customer3', 'customer3', 'customer3', 'customer3', '123123123', '123123', 'images/1672952940-cust3.JPG', '2023-01-05 13:09:00', '2023-01-05 13:09:00', 16),
(7, 'customer4', 'customer4', 'customer4', 'customer4', 'customer4', '123123123', '123123123', 'images/1672952963-cust4.JPG', '2023-01-05 13:09:23', '2023-01-05 13:09:23', 17),
(8, 'customer5', 'customer5', 'customer5', 'customer5', 'customer5', '123123123', '123123123', 'images/1672953012-cust5.JPG', '2023-01-05 13:10:12', '2023-01-05 13:10:12', 18),
(9, 'customer6', 'customer6', 'customer6', 'customer6', 'customer6', '123123123', '123123123', 'images/1672954826-cust6.JPG', '2023-01-05 13:40:26', '2023-01-05 13:40:26', 19);

-- --------------------------------------------------------

--
-- Table structure for table `devices`
--

CREATE TABLE `devices` (
  `device_id` int(10) UNSIGNED NOT NULL,
  `customer_id` int(10) UNSIGNED NOT NULL,
  `type` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `model` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `img_path` text COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'images/devices.jpg',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `devices`
--

INSERT INTO `devices` (`device_id`, `customer_id`, `type`, `brand`, `model`, `img_path`, `created_at`, `updated_at`, `deleted_at`) VALUES
(4, 6, 'Monitor', 'LGS', 'DXXASWQ', 'images/dev1.JPG', NULL, '2023-01-05 13:16:47', NULL),
(5, 5, 'Printer', 'Epson', 'SMXZA223', 'images/1672953330-dev2.JPG', '2023-01-05 13:15:30', '2023-01-05 13:15:30', NULL),
(6, 2, 'Radio', 'Bosch', '099PS', 'images/1672953347-dev3.JPG', '2023-01-05 13:15:47', '2023-01-05 13:15:47', NULL),
(7, 8, 'Television', 'Nokia', 'AXZZ23', 'images/1672953391-dev4.JPG', '2023-01-05 13:16:31', '2023-01-05 13:16:31', NULL),
(8, 6, 'Laptop', 'Apple', 'Mac092', 'images/1672953430-dev5.JPG', '2023-01-05 13:17:10', '2023-01-05 13:17:10', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `employee_id` int(10) UNSIGNED NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `lname` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `fname` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `addressline` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `town` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `zipcode` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `img_path` text COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'images/employees.jpg',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`employee_id`, `title`, `lname`, `fname`, `addressline`, `town`, `zipcode`, `phone`, `img_path`, `created_at`, `updated_at`, `user_id`) VALUES
(2, 'administrators', 'administrators', 'administrators', 'administrators', 'administrators', '1231234', '1231234', 'images/otto.jpg', NULL, '2023-01-05 13:10:53', 6),
(4, 'employee', 'employee', 'employee', 'employee', 'employee', '123123123', '123123123', 'images/emp1.JPG', '2023-01-05 08:03:58', '2023-01-05 13:02:30', 10),
(5, 'employee2', 'employee2', 'employee2', 'employee2', 'employee2', '123123123', '123123123', 'images/1672952645-emp2.JPG', '2023-01-05 13:04:05', '2023-01-05 13:04:05', 11),
(6, 'employee3', 'employee3', 'employee3', 'employee3', 'employee3', '123123123', '123123123', 'images/1672952680-emp3.JPG', '2023-01-05 13:04:40', '2023-01-05 13:04:40', 12),
(7, 'employee4', 'employee4', 'employee4', 'employee4', 'employee4', '123123123', '123123123', 'images/1672952712-emp4.JPG', '2023-01-05 13:05:12', '2023-01-05 13:05:12', 13),
(8, 'employee5', 'employee5', 'employee5', 'employee5', 'employee5', '123123123', '123123123', 'images/1672952747-emp5.JPG', '2023-01-05 13:05:47', '2023-01-05 13:05:47', 14);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

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
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 3, 'token', 'bd9fb4e1205e9f8a1306d1fac9c57bdc054be21cc8e6c56f3b8fae7e327975bf', '[\"*\"]', NULL, NULL, '2023-01-03 02:33:48', '2023-01-03 02:33:48'),
(2, 'App\\Models\\User', 4, 'token', 'db3a5932dbb76419e8db43af5d98800193f8bf05cc0323cb3d15687dc9548157', '[\"*\"]', NULL, NULL, '2023-01-03 02:35:44', '2023-01-03 02:35:44'),
(3, 'App\\Models\\User', 4, 'token', '7d2c9307a737276d940d51367000b9dc5e51d6f658bc5b366d2f3fbee167fc93', '[\"*\"]', NULL, NULL, '2023-01-03 03:02:57', '2023-01-03 03:02:57'),
(4, 'App\\Models\\User', 4, 'token', '03969d141cb5ca027843d654b5ee804d0bfb63b67ff1abfb9ca5b5d00c056205', '[\"*\"]', NULL, NULL, '2023-01-03 03:15:52', '2023-01-03 03:15:52'),
(5, 'App\\Models\\User', 4, 'token', '86c2858939aa17c5d1ecce1821ec4a32aae7d6f8a23b092374814d7721e36359', '[\"*\"]', NULL, NULL, '2023-01-03 04:20:55', '2023-01-03 04:20:55'),
(6, 'App\\Models\\User', 4, 'token', '83c9c9be5bfb2071985e4a1238c0aba63b3f376b74dbe175cd8a321007fea967', '[\"*\"]', NULL, NULL, '2023-01-03 05:55:35', '2023-01-03 05:55:35'),
(7, 'App\\Models\\User', 4, 'token', 'efb584469d4ce555fa5776ec4bf7b1d0a04b6d47e59fd05c6bff6fe4711e0624', '[\"*\"]', NULL, NULL, '2023-01-03 05:57:19', '2023-01-03 05:57:19'),
(8, 'App\\Models\\User', 4, 'token', 'e254044418ddc850e26210f3ba7a20a261153d0d937476ff7a0c249cd2fe9c69', '[\"*\"]', NULL, NULL, '2023-01-03 06:15:32', '2023-01-03 06:15:32'),
(9, 'App\\Models\\User', 4, 'token', '5a23ab4c9e84766094a5123715f3749cecb6d6ddace69a90eaf19ec84801465b', '[\"*\"]', NULL, NULL, '2023-01-03 06:48:45', '2023-01-03 06:48:45'),
(10, 'App\\Models\\User', 6, 'token', 'e76e09f121ad56bc6fc6cc86b324e9861be6e129e6ccc38c5bba9267cab6e80d', '[\"*\"]', NULL, NULL, '2023-01-03 06:51:40', '2023-01-03 06:51:40'),
(11, 'App\\Models\\User', 4, 'token', '30849576a9c8ca280811d1882798119d0df5e99108d5603a2e627cc61223ebf7', '[\"*\"]', NULL, NULL, '2023-01-05 03:44:23', '2023-01-05 03:44:23'),
(12, 'App\\Models\\User', 8, 'token', '66409af83dd98ef332121a964b2dc2ade28dd16e99f060313ac305da81e0139b', '[\"*\"]', NULL, NULL, '2023-01-05 03:49:48', '2023-01-05 03:49:48'),
(13, 'App\\Models\\User', 8, 'token', '3e63132a4bbe888697db50fbe9bdcc99330016975fe5c22ba0b504fd6ce3203f', '[\"*\"]', NULL, NULL, '2023-01-05 03:50:24', '2023-01-05 03:50:24'),
(14, 'App\\Models\\User', 4, 'token', '06f04ee3a55ba81ef9b5049c24b62cc612eba2f9522cd144b40bc568698c1732', '[\"*\"]', NULL, NULL, '2023-01-05 03:56:32', '2023-01-05 03:56:32'),
(15, 'App\\Models\\User', 4, 'token', 'd72056e5d32765c01de0d96642c36dc792d8a26e5c2b78b0db4ad87a81630de7', '[\"*\"]', NULL, NULL, '2023-01-05 05:14:29', '2023-01-05 05:14:29'),
(16, 'App\\Models\\User', 9, 'token', '8c3f6c1dd053c23baa59fc824575b2cc731ef08743a79dee748fe0aea5048ec5', '[\"*\"]', NULL, NULL, '2023-01-05 05:25:38', '2023-01-05 05:25:38'),
(17, 'App\\Models\\User', 4, 'token', '395dded990807090889282782d5ed51e674d8f7592989d8b50dfe6dab8f66738', '[\"*\"]', NULL, NULL, '2023-01-05 05:40:06', '2023-01-05 05:40:06'),
(18, 'App\\Models\\User', 4, 'token', 'c3b08f55aa3c0295692e081299738564d192fcd81b7bb818bd76c52decf1e393', '[\"*\"]', NULL, NULL, '2023-01-05 06:26:11', '2023-01-05 06:26:11'),
(19, 'App\\Models\\User', 4, 'token', '1b6f2957e41a6875ddf91efedd5b036d0d775d9704e20b7ad2ee893790d9699c', '[\"*\"]', NULL, NULL, '2023-01-05 06:46:50', '2023-01-05 06:46:50'),
(20, 'App\\Models\\User', 6, 'token', '5bd2331b31e7da227f7f0063de89e892d1533ea3c63296e9205347fb6f778234', '[\"*\"]', NULL, NULL, '2023-01-05 06:48:08', '2023-01-05 06:48:08'),
(21, 'App\\Models\\User', 3, 'token', 'e813824e5b5924c701a4d50fdd2d0348222051c35cdcb75247d75964ea4a2985', '[\"*\"]', NULL, NULL, '2023-01-05 06:52:51', '2023-01-05 06:52:51'),
(22, 'App\\Models\\User', 4, 'token', '7f8d625b78aaee81b899c48ce8bebceed2e3a606f25845893a7c3f31b22f4f40', '[\"*\"]', NULL, NULL, '2023-01-05 07:04:00', '2023-01-05 07:04:00'),
(23, 'App\\Models\\User', 3, 'token', '8e5078715d0b95e2d789a046af0d905ad2eef158034490d51b3ad469594f09f2', '[\"*\"]', NULL, NULL, '2023-01-05 07:05:31', '2023-01-05 07:05:31'),
(24, 'App\\Models\\User', 4, 'token', '4577ff68135ccce570aced4a743fa40d3c22b8fea9a94353f7f471609c5f0a9b', '[\"*\"]', NULL, NULL, '2023-01-05 07:06:07', '2023-01-05 07:06:07'),
(25, 'App\\Models\\User', 6, 'token', '87088ff3dd7233df3bd5bfb497ca5d89197332d79e1f18b65642980f4ddd6fe9', '[\"*\"]', NULL, NULL, '2023-01-05 07:08:37', '2023-01-05 07:08:37'),
(26, 'App\\Models\\User', 5, 'token', 'cb725c4c1a9bd5f8f74e62356a176f4c21c5a834ee706d8ea5ae042494286b8c', '[\"*\"]', NULL, NULL, '2023-01-05 07:11:22', '2023-01-05 07:11:22'),
(27, 'App\\Models\\User', 3, 'token', '2f973b38e6f3bd6002214301d8956cbc1df60aaeb43b87980bdc1833ab0abc65', '[\"*\"]', NULL, NULL, '2023-01-05 07:50:15', '2023-01-05 07:50:15'),
(28, 'App\\Models\\User', 5, 'token', '0b091fe7dbd7d8593ccc924be36548baea77b68e06588671460bb03b9c8f1503', '[\"*\"]', NULL, NULL, '2023-01-05 07:50:47', '2023-01-05 07:50:47'),
(29, 'App\\Models\\User', 7, 'token', 'e1949b4b7d2bac3b59bc76ad4fb26e93c0e111c6f21fc44b95ffb81c4ad104f2', '[\"*\"]', NULL, NULL, '2023-01-05 07:51:11', '2023-01-05 07:51:11'),
(30, 'App\\Models\\User', 3, 'token', '85d54b660dc26fe61cca06695ace04ba7b37c8b51bd405ebdd024536bcd4fb2b', '[\"*\"]', NULL, NULL, '2023-01-05 07:51:53', '2023-01-05 07:51:53'),
(31, 'App\\Models\\User', 3, 'token', '3f4eb2d6490860cc8943b406ef21770141f734860b5907c795222158de352caa', '[\"*\"]', NULL, NULL, '2023-01-05 07:52:37', '2023-01-05 07:52:37'),
(32, 'App\\Models\\User', 6, 'token', '2d6ec39b7075493597f56dff8dddb3ce91e35d5a34309868f276d079ea0bfa0d', '[\"*\"]', NULL, NULL, '2023-01-05 07:53:31', '2023-01-05 07:53:31'),
(33, 'App\\Models\\User', 3, 'token', '39a13cbf6c3f1e89c9a406164eaba646d0caff615e1b1f5f39fd7f5d6b63ce7e', '[\"*\"]', NULL, NULL, '2023-01-05 08:00:23', '2023-01-05 08:00:23'),
(34, 'App\\Models\\User', 4, 'token', '13df9577f323dcc7950bb34dcaa925898fe5a8863c811c01bf12bfb52bcc3053', '[\"*\"]', NULL, NULL, '2023-01-05 08:00:44', '2023-01-05 08:00:44'),
(35, 'App\\Models\\User', 4, 'token', '04992b6d719f73f459c2fc08bfa1e1be70146d5821b81ffbba186c95acf17144', '[\"*\"]', NULL, NULL, '2023-01-05 08:01:22', '2023-01-05 08:01:22'),
(36, 'App\\Models\\User', 6, 'token', 'a671c30fab333765dfa44781bf177e58e3122188eb7041928c7b22c7d10f60a8', '[\"*\"]', NULL, NULL, '2023-01-05 08:01:53', '2023-01-05 08:01:53'),
(37, 'App\\Models\\User', 7, 'token', '692542d9061f0d18373a22fb7cea81cd55ef2c453b36e918c7156d8f114d000d', '[\"*\"]', NULL, NULL, '2023-01-05 08:02:12', '2023-01-05 08:02:12'),
(38, 'App\\Models\\User', 7, 'token', 'c0bb0d8c0f36bf6b00ee868f7b4a3f95f8fdb004ed48261be46f9005b497244b', '[\"*\"]', NULL, NULL, '2023-01-05 08:02:21', '2023-01-05 08:02:21'),
(39, 'App\\Models\\User', 4, 'token', 'df9ccf1b8537a07815f287ede15cbe227df051abe12ba44a2287be4341a8aec4', '[\"*\"]', NULL, NULL, '2023-01-05 08:02:35', '2023-01-05 08:02:35'),
(40, 'App\\Models\\User', 5, 'token', '4ede85401b790cf3f9b47611a8ea1fd6cd0d4bb6746546b733aac780b29ccc78', '[\"*\"]', NULL, NULL, '2023-01-05 08:03:28', '2023-01-05 08:03:28'),
(41, 'App\\Models\\User', 10, 'token', 'bb0955f099fd52aed89465b6778d726c0e4fb55a8733db43ef774240a9f6b50e', '[\"*\"]', NULL, NULL, '2023-01-05 08:04:19', '2023-01-05 08:04:19'),
(42, 'App\\Models\\User', 10, 'token', 'fe78cc7a8368258de7b90356a11ca18413c48dc9df9db905b121a73d599b58c5', '[\"*\"]', NULL, NULL, '2023-01-05 08:19:14', '2023-01-05 08:19:14'),
(43, 'App\\Models\\User', 10, 'token', '32d020e4e3092ed95aca009be738a716af09720858ae8dde07e2a99443724771', '[\"*\"]', NULL, NULL, '2023-01-05 08:50:41', '2023-01-05 08:50:41'),
(44, 'App\\Models\\User', 10, 'token', '15363f2fe0e8d5feb4b1adc5ac4ca06c099f8df9b6340c3ceace8ecdae460785', '[\"*\"]', NULL, NULL, '2023-01-05 09:20:37', '2023-01-05 09:20:37'),
(45, 'App\\Models\\User', 10, 'token', '223feeb494c1d0e79261ad9d872564e30013d3e44e228060ef70d1d6aac4f323', '[\"*\"]', NULL, NULL, '2023-01-05 09:35:52', '2023-01-05 09:35:52'),
(46, 'App\\Models\\User', 10, 'token', '6574c83fefc885f96d863e5fff279f46099df92e0935322d20f81e2d40fe0e10', '[\"*\"]', NULL, NULL, '2023-01-05 10:59:31', '2023-01-05 10:59:31'),
(47, 'App\\Models\\User', 3, 'token', '1f539a0940601f6c8c3a64f5fcd1efc245541ce34fd6eefc5e191572a6490d1c', '[\"*\"]', NULL, NULL, '2023-01-05 11:01:39', '2023-01-05 11:01:39'),
(48, 'App\\Models\\User', 6, 'token', '131535ad032cb1cb96866a37ffb0f704f597556c36044aa69bd71be756740bee', '[\"*\"]', NULL, NULL, '2023-01-05 11:09:26', '2023-01-05 11:09:26'),
(49, 'App\\Models\\User', 6, 'token', '46c67ab5e160de5df6315834c0a7d94650bef7ea3e2ccdf8ab49bd6b9342dd11', '[\"*\"]', NULL, NULL, '2023-01-05 11:09:52', '2023-01-05 11:09:52'),
(50, 'App\\Models\\User', 10, 'token', '8eba2a1b53af4b68f4097f9a65ce78833fff3f814b7a6836f1ce63aac8d8eb23', '[\"*\"]', NULL, NULL, '2023-01-05 11:12:40', '2023-01-05 11:12:40'),
(51, 'App\\Models\\User', 6, 'token', '42d3baa39a454b27852f67e23b19b063b6f4e1d5ce7f812bfb60a23e1987da0b', '[\"*\"]', NULL, NULL, '2023-01-05 11:15:03', '2023-01-05 11:15:03'),
(52, 'App\\Models\\User', 10, 'token', '5bd8c8b6788545880a8bc1b7b74fe68d52609959326dcb636ac5e7855fbba66f', '[\"*\"]', NULL, NULL, '2023-01-05 11:16:31', '2023-01-05 11:16:31'),
(53, 'App\\Models\\User', 6, 'token', 'e0f0521259547482a80677eab2ccd3602703561286b810ce8568af67e69c8cc5', '[\"*\"]', NULL, NULL, '2023-01-05 11:16:40', '2023-01-05 11:16:40'),
(54, 'App\\Models\\User', 3, 'token', 'dfdf83ba85e7347be98dc55429d4d9a5da426f63ce81f9fd92a6038d4bcaa3ea', '[\"*\"]', NULL, NULL, '2023-01-05 12:38:11', '2023-01-05 12:38:11'),
(55, 'App\\Models\\User', 3, 'token', '7ec7d1d3d2c66afdb288b88bd1c19d4cfee7283851043363dff0195da37cbe2c', '[\"*\"]', NULL, NULL, '2023-01-05 12:42:25', '2023-01-05 12:42:25'),
(56, 'App\\Models\\User', 6, 'token', '1400135e8d39c371b5adb8006c639dd195f2b36ecf23881b25a4d3155575b19f', '[\"*\"]', NULL, NULL, '2023-01-05 12:44:56', '2023-01-05 12:44:56'),
(57, 'App\\Models\\User', 10, 'token', 'a7ca060b1ad1f1a2b4d21d67c39fe619c4bdd83689ba1db98e9f3016b5f43270', '[\"*\"]', NULL, NULL, '2023-01-05 12:48:25', '2023-01-05 12:48:25'),
(58, 'App\\Models\\User', 6, 'token', '8a71cc2c02eba1d89cac1b42e949e96a5828658b6357483231d187144138a7b8', '[\"*\"]', NULL, NULL, '2023-01-05 12:48:41', '2023-01-05 12:48:41'),
(59, 'App\\Models\\User', 10, 'token', '4d145ac7130da45a9b75392261cf337bd1966e807d9666fd243af88ee5cd5139', '[\"*\"]', NULL, NULL, '2023-01-05 13:17:55', '2023-01-05 13:17:55'),
(60, 'App\\Models\\User', 10, 'token', '09b99cfb19415f305917c06f1903636aa6d338b0314653644f939fea97f08326', '[\"*\"]', NULL, NULL, '2023-01-05 13:29:21', '2023-01-05 13:29:21'),
(61, 'App\\Models\\User', 12, 'token', '6e235f496809b565e00d2b7bc3157f036b00e53d2b177b3b95a6f3a1991ea535', '[\"*\"]', NULL, NULL, '2023-01-05 13:31:53', '2023-01-05 13:31:53'),
(62, 'App\\Models\\User', 19, 'token', '8e6bc813a4e5cf0b86ce614dfe1414e25d76958cb122399b91ec2472ab647bd8', '[\"*\"]', NULL, NULL, '2023-01-05 13:40:42', '2023-01-05 13:40:42');

-- --------------------------------------------------------

--
-- Table structure for table `repairinfo`
--

CREATE TABLE `repairinfo` (
  `repairinfo_id` int(10) UNSIGNED NOT NULL,
  `customer_id` int(10) UNSIGNED NOT NULL,
  `date_placed` date NOT NULL,
  `status` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `repairline`
--

CREATE TABLE `repairline` (
  `repairinfo_id` int(10) UNSIGNED NOT NULL,
  `service_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `service_id` int(10) UNSIGNED NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `img_path` text COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'images/services.jpg',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`service_id`, `description`, `price`, `img_path`, `created_at`, `updated_at`) VALUES
(3, 'Change Screen Protector', 250, 'images/serv1.JPG', '2023-01-05 13:06:22', '2023-01-05 13:06:54'),
(4, 'Battery Replacement', 600, 'images/1672952836-serv2.JPG', '2023-01-05 13:07:16', '2023-01-05 13:07:16');

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `supply_id` int(10) UNSIGNED NOT NULL,
  `quantity` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`supply_id`, `quantity`) VALUES
(6, '100'),
(7, '100'),
(8, '99'),
(9, '99'),
(10, '99'),
(11, '96'),
(12, '98');

-- --------------------------------------------------------

--
-- Table structure for table `stockinfo`
--

CREATE TABLE `stockinfo` (
  `stockinfo_id` int(10) UNSIGNED NOT NULL,
  `employee_id` int(10) UNSIGNED NOT NULL,
  `date_placed` date NOT NULL,
  `date_shipped` date DEFAULT NULL,
  `status` text COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Processing',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stockinfo`
--

INSERT INTO `stockinfo` (`stockinfo_id`, `employee_id`, `date_placed`, `date_shipped`, `status`, `created_at`, `updated_at`) VALUES
(19, 4, '2023-01-05', NULL, 'Processing', NULL, NULL),
(20, 4, '2023-01-05', NULL, 'Processing', NULL, NULL),
(24, 4, '2023-01-05', NULL, 'Processing', NULL, NULL),
(25, 4, '2023-01-05', NULL, 'Processing', NULL, NULL),
(26, 6, '2023-01-05', NULL, 'Processing', NULL, NULL),
(27, 6, '2023-01-05', NULL, 'Processing', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `stockline`
--

CREATE TABLE `stockline` (
  `stockinfo_id` int(10) UNSIGNED NOT NULL,
  `supply_id` int(11) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stockline`
--

INSERT INTO `stockline` (`stockinfo_id`, `supply_id`, `quantity`) VALUES
(24, 11, 1),
(25, 10, 1),
(25, 11, 1),
(25, 12, 1),
(25, 8, 1),
(25, 9, 1),
(26, 11, 1),
(26, 12, 1),
(27, 11, 1);

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `supplier_id` int(10) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `addressline` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `img_path` text COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'images/suppliers.jpg',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`supplier_id`, `name`, `addressline`, `img_path`, `created_at`, `updated_at`) VALUES
(5, 'Bosch', 'Makati', 'images/sup1.jpg', NULL, NULL),
(6, 'Samsung', 'Pasay', 'images/sup2.jpg', NULL, NULL),
(7, 'Huawei', 'Quezon City', 'images/sup3.jpg', NULL, NULL),
(8, 'Xiaomi', 'Malabon', 'images/sup4.jpg', NULL, NULL),
(9, 'Apple', 'Taguig', 'images/sup5.jpg', NULL, NULL),
(10, 'LG', 'Marikina', 'images/sup6.jpg', NULL, NULL),
(11, 'Lenovo', 'Navotas', 'images/sup7.jpg', NULL, NULL),
(12, 'Cherry Mobile', 'Pateros', 'images/sup8.JPG', '2023-01-05 12:55:25', '2023-01-05 12:55:25');

-- --------------------------------------------------------

--
-- Table structure for table `supplies`
--

CREATE TABLE `supplies` (
  `supply_id` int(10) UNSIGNED NOT NULL,
  `supplier_id` int(10) UNSIGNED NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `img_path` text COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'images/supplies.jpg',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `supplies`
--

INSERT INTO `supplies` (`supply_id`, `supplier_id`, `description`, `price`, `img_path`, `created_at`, `updated_at`) VALUES
(6, 5, 'Memory Card', 150, 'images/1.jpg', NULL, NULL),
(7, 11, 'Screen Protector', 250, 'images/2.jpg', NULL, NULL),
(8, 12, 'Power Button', 160, 'images/3.jpg', NULL, NULL),
(9, 9, 'Heat Fan', 250, 'images/4.jpg', NULL, NULL),
(10, 8, 'AVR', 1600, 'images/5.jpg', NULL, NULL),
(11, 8, 'RAM', 1000, 'images/6.jpg', NULL, NULL),
(12, 12, 'Motherboard', 600, 'images/7.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `email`, `email_verified_at`, `password`, `roles`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3, 'customer@gmail.com', NULL, '$2y$10$OasUhya6Rb2kTlipupxPSuSsX0tr4ukwfDjfF/UyZFy7NgHpIyN/u', 'Customer', NULL, '2023-01-03 02:33:33', '2023-01-03 02:33:33', NULL),
(6, 'administrator@gmail.com', NULL, '$2y$10$CQBqc9uGRwD167wVUlYaSOESb43mLfIancmF5OYdrn9HZIKJ9JRz6', 'Administrator', NULL, '2023-01-03 02:39:54', '2023-01-03 02:39:54', NULL),
(10, 'employee@gmail.com', NULL, '$2y$10$du5mzYhxv182MVpzDgQuYO1/qGjt2C/PaHmjz4e7OhFkPBF57Wp1S', 'Employee', NULL, '2023-01-05 08:03:58', '2023-01-05 08:03:58', NULL),
(11, 'employee2@gmail.com', NULL, '$2y$10$GESj3moZWlebEGgO6kTn7uiwghNXWdtaWOerMe9DGm0z1kGDvxxCy', 'Employee', NULL, '2023-01-05 13:04:05', '2023-01-05 13:04:05', NULL),
(12, 'employee3@gmail.com', NULL, '$2y$10$1u5/yDQez2s5EWeHghFpRu/K01dZB8XNN4HZHf0tToPXlegLPruOe', 'Employee', NULL, '2023-01-05 13:04:40', '2023-01-05 13:04:40', NULL),
(13, 'employee4@gmail.com', NULL, '$2y$10$mDteDgjePwXZHQHh9WGXuOrvTpAux3f7CGwJ9Zip8QgnxCufY857.', 'Employee', NULL, '2023-01-05 13:05:12', '2023-01-05 13:05:12', NULL),
(14, 'employee5@gmail.com', NULL, '$2y$10$vTfCEXt9I9XFfIgtGLDVUeIMwSMWRjX0tpuw9FcBMdnP4/DGEWv3K', 'Employee', NULL, '2023-01-05 13:05:47', '2023-01-05 13:05:47', NULL),
(15, 'customer2@gmail.com', NULL, '$2y$10$6nwdZO7.LrMqYKoxU40SPeBmpSt9dD6sN7r75jVNOHRTFQVkGma3a', 'Customer', NULL, '2023-01-05 13:08:15', '2023-01-05 13:08:15', NULL),
(16, 'customer3@gmail.com', NULL, '$2y$10$NTFuOftENycXu850MYNp0.WxabdZMf8ehqHaVILyHuWZH2TwVzSl2', 'Customer', NULL, '2023-01-05 13:09:00', '2023-01-05 13:09:00', NULL),
(17, 'customer4@gmail.com', NULL, '$2y$10$cHjg63W5xs.mQ4LHJEwHn.nxWk7opbGez1otCvLfh2bTZw4yA0j7K', 'Customer', NULL, '2023-01-05 13:09:23', '2023-01-05 13:09:23', NULL),
(18, 'customer5@gmail.com', NULL, '$2y$10$sXyK8DpcgfgOx1Au5St/WewNlxWZiXqf0iWOUQpKHNAi/.oOo/lkK', 'Customer', NULL, '2023-01-05 13:10:12', '2023-01-05 13:10:12', NULL),
(19, 'customer6@gmail.com', NULL, '$2y$10$IVKzDf3aLs3V.fnQGhjcruafzF5psgXs2ndweckhwDoGCtdxczUqm', 'Customer', NULL, '2023-01-05 13:40:26', '2023-01-05 13:40:26', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`),
  ADD KEY `customers_user_id_foreign` (`user_id`);

--
-- Indexes for table `devices`
--
ALTER TABLE `devices`
  ADD PRIMARY KEY (`device_id`),
  ADD KEY `devices_customer_id_foreign` (`customer_id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`employee_id`),
  ADD KEY `employees_user_id_foreign` (`user_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
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
-- Indexes for table `repairinfo`
--
ALTER TABLE `repairinfo`
  ADD PRIMARY KEY (`repairinfo_id`),
  ADD KEY `repairinfo_customer_id_foreign` (`customer_id`);

--
-- Indexes for table `repairline`
--
ALTER TABLE `repairline`
  ADD KEY `repairline_repairinfo_id_foreign` (`repairinfo_id`),
  ADD KEY `repairline_service_id_foreign` (`service_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`service_id`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD KEY `stock_supply_id_foreign` (`supply_id`);

--
-- Indexes for table `stockinfo`
--
ALTER TABLE `stockinfo`
  ADD PRIMARY KEY (`stockinfo_id`),
  ADD KEY `stockinfo_employee_id_foreign` (`employee_id`);

--
-- Indexes for table `stockline`
--
ALTER TABLE `stockline`
  ADD KEY `stockline_stockinfo_id_foreign` (`stockinfo_id`),
  ADD KEY `asdasdzza` (`supply_id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`supplier_id`);

--
-- Indexes for table `supplies`
--
ALTER TABLE `supplies`
  ADD PRIMARY KEY (`supply_id`),
  ADD KEY `supplies_supplier_id_foreign` (`supplier_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `devices`
--
ALTER TABLE `devices`
  MODIFY `device_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `employee_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `repairinfo`
--
ALTER TABLE `repairinfo`
  MODIFY `repairinfo_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `service_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `stockinfo`
--
ALTER TABLE `stockinfo`
  MODIFY `stockinfo_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `supplier_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `supplies`
--
ALTER TABLE `supplies`
  MODIFY `supply_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customers`
--
ALTER TABLE `customers`
  ADD CONSTRAINT `customers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `devices`
--
ALTER TABLE `devices`
  ADD CONSTRAINT `devices_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `employees_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `repairinfo`
--
ALTER TABLE `repairinfo`
  ADD CONSTRAINT `repairinfo_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `repairline`
--
ALTER TABLE `repairline`
  ADD CONSTRAINT `repairline_repairinfo_id_foreign` FOREIGN KEY (`repairinfo_id`) REFERENCES `repairinfo` (`repairinfo_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `repairline_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`service_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `stock`
--
ALTER TABLE `stock`
  ADD CONSTRAINT `stock_supply_id_foreign` FOREIGN KEY (`supply_id`) REFERENCES `supplies` (`supply_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `stockinfo`
--
ALTER TABLE `stockinfo`
  ADD CONSTRAINT `stockinfo_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`employee_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `stockline`
--
ALTER TABLE `stockline`
  ADD CONSTRAINT `asdasdzza` FOREIGN KEY (`supply_id`) REFERENCES `supplies` (`supply_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `stockline_stockinfo_id_foreign` FOREIGN KEY (`stockinfo_id`) REFERENCES `stockinfo` (`stockinfo_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `supplies`
--
ALTER TABLE `supplies`
  ADD CONSTRAINT `supplies_supplier_id_foreign` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`supplier_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
