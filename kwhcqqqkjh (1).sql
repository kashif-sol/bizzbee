-- Adminer 4.7.8 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `charges`;
CREATE TABLE `charges` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `charge_id` bigint(20) NOT NULL,
  `test` tinyint(1) NOT NULL DEFAULT 0,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `terms` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `interval` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `capped_amount` decimal(8,2) DEFAULT NULL,
  `trial_days` int(11) DEFAULT NULL,
  `billing_on` timestamp NULL DEFAULT NULL,
  `activated_on` timestamp NULL DEFAULT NULL,
  `trial_ends_on` timestamp NULL DEFAULT NULL,
  `cancelled_on` timestamp NULL DEFAULT NULL,
  `expires_on` timestamp NULL DEFAULT NULL,
  `plan_id` int(10) unsigned DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reference_charge` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `charges_user_id_foreign` (`user_id`),
  KEY `charges_plan_id_foreign` (`plan_id`),
  CONSTRAINT `charges_plan_id_foreign` FOREIGN KEY (`plan_id`) REFERENCES `plans` (`id`),
  CONSTRAINT `charges_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1,	'2014_10_12_000000_create_users_table',	1),
(2,	'2014_10_12_100000_create_password_resets_table',	1),
(3,	'2019_08_19_000000_create_failed_jobs_table',	1),
(4,	'2019_12_14_000001_create_personal_access_tokens_table',	1),
(5,	'2020_01_29_010501_create_plans_table',	1),
(6,	'2020_01_29_230905_create_shops_table',	1),
(7,	'2020_01_29_231006_create_charges_table',	1),
(8,	'2020_07_03_211514_add_interval_column_to_charges_table',	1),
(9,	'2020_07_03_211854_add_interval_column_to_plans_table',	1),
(10,	'2021_04_21_103633_add_password_updated_at_to_users_table',	1),
(11,	'2022_10_04_134240_create_orders_table',	2),
(12,	'2022_10_06_074637_create_products_table',	2);

DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `api_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `orders` (`id`, `order_id`, `api_id`, `created_at`, `updated_at`) VALUES
(1,	'4915349815535',	'c26bee57-5b87-405b-9a04-fae50975660f',	'2022-10-06 11:47:11',	'2022-10-06 11:47:11'),
(2,	'5222707921199',	'bd4e269c-b97e-4afa-ac8f-1ff1ea6f40f3',	'2022-12-16 06:47:17',	'2022-12-16 06:47:17');

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `plans`;
CREATE TABLE `plans` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `interval` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `capped_amount` decimal(8,2) DEFAULT NULL,
  `terms` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trial_days` int(11) DEFAULT NULL,
  `test` tinyint(1) NOT NULL DEFAULT 0,
  `on_install` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `api_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `products` (`id`, `product_id`, `api_id`, `created_at`, `updated_at`) VALUES
(1,	'7825874485487',	'645e633d-8393-4f32-bf01-20b4c429bfc3',	'2022-10-06 11:48:34',	'2022-10-06 11:48:34'),
(2,	'7815436009711',	'4b71e299-01a6-4d9a-ab66-a2cbc4dc3112',	'2022-10-06 11:48:34',	'2022-10-06 11:48:34'),
(3,	'8029113778479',	'1fbeaf93-55ed-4a1d-afee-961c4d5b3763',	'2022-12-16 06:47:45',	'2022-12-16 06:47:45');

DROP TABLE IF EXISTS `shopifyappdata`;
CREATE TABLE `shopifyappdata` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `data1` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `data2` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `response` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `shopifyappdata` (`id`, `created_at`, `updated_at`, `data1`, `data2`, `response`) VALUES
(1,	'2022-06-28 12:25:15',	'2022-06-28 12:25:15',	'1',	'1',	'customer created'),
(2,	'2022-06-28 12:25:16',	'2022-06-28 12:25:16',	'1',	'1',	'customer created'),
(3,	'2022-06-28 12:25:17',	'2022-06-28 12:25:17',	'1',	'1',	'customer created'),
(4,	'2022-06-28 12:26:48',	'2022-06-28 12:26:48',	'1',	'1',	'customer created'),
(5,	'2022-06-28 12:27:19',	'2022-06-28 12:27:19',	'1',	'1',	'customer created'),
(6,	'2022-06-28 12:27:20',	'2022-06-28 12:27:20',	'1',	'1',	'customer created'),
(7,	'2022-06-28 12:27:21',	'2022-06-28 12:27:21',	'1',	'1',	'customer created'),
(8,	'2022-06-28 12:27:52',	'2022-06-28 12:27:52',	'1',	'1',	'customer created'),
(9,	'2022-06-28 12:28:22',	'2022-06-28 12:28:22',	'1',	'1',	'customer created'),
(10,	'2022-06-28 12:28:22',	'2022-06-28 12:28:22',	'1',	'1',	'customer created'),
(11,	'2022-06-28 12:28:23',	'2022-06-28 12:28:23',	'1',	'1',	'customer created'),
(12,	'2022-06-28 12:28:23',	'2022-06-28 12:28:23',	'1',	'1',	'customer created'),
(13,	'2022-06-28 12:28:25',	'2022-06-28 12:28:25',	'1',	'1',	'customer created'),
(14,	'2022-06-28 12:28:28',	'2022-06-28 12:28:28',	'1',	'1',	'customer created'),
(15,	'2022-06-28 12:28:44',	'2022-06-28 12:28:44',	'1',	'1',	'customer created'),
(16,	'2022-06-28 12:29:23',	'2022-06-28 12:29:23',	'1',	'1',	'customer created'),
(17,	'2022-06-28 12:29:24',	'2022-06-28 12:29:24',	'1',	'1',	'customer created'),
(18,	'2022-06-28 12:29:27',	'2022-06-28 12:29:27',	'1',	'1',	'customer created'),
(19,	'2022-06-28 12:29:48',	'2022-06-28 12:29:48',	'1',	'1',	'customer created'),
(20,	'2022-06-28 12:29:56',	'2022-06-28 12:29:56',	'1',	'1',	'customer created'),
(21,	'2022-06-28 12:31:22',	'2022-06-28 12:31:22',	'1',	'1',	'customer created'),
(22,	'2022-06-28 12:31:52',	'2022-06-28 12:31:52',	'1',	'1',	'customer created'),
(23,	'2022-06-28 12:32:03',	'2022-06-28 12:32:03',	'1',	'1',	'customer created'),
(24,	'2022-06-28 12:34:26',	'2022-06-28 12:34:26',	'1',	'1',	'customer created'),
(25,	'2022-06-28 12:34:28',	'2022-06-28 12:34:28',	'1',	'1',	'customer created'),
(26,	'2022-06-28 12:34:31',	'2022-06-28 12:34:31',	'1',	'1',	'customer created'),
(27,	'2022-06-28 12:50:26',	'2022-06-28 12:50:26',	'1',	'1',	'customer created'),
(28,	'2022-06-28 12:50:29',	'2022-06-28 12:50:29',	'1',	'1',	'customer created'),
(29,	'2022-06-28 12:50:32',	'2022-06-28 12:50:32',	'1',	'1',	'customer created'),
(30,	'2022-06-28 12:56:30',	'2022-06-28 12:56:30',	'1',	'1',	'customer created'),
(31,	'2022-06-28 12:56:32',	'2022-06-28 12:56:32',	'1',	'1',	'customer created'),
(32,	'2022-06-28 12:56:34',	'2022-06-28 12:56:34',	'1',	'1',	'customer created'),
(33,	'2022-06-28 13:20:33',	'2022-06-28 13:20:33',	'1',	'1',	'customer created'),
(34,	'2022-06-28 13:20:39',	'2022-06-28 13:20:39',	'1',	'1',	'customer created'),
(35,	'2022-06-28 13:26:35',	'2022-06-28 13:26:35',	'1',	'1',	'customer created'),
(36,	'2022-06-28 13:26:36',	'2022-06-28 13:26:36',	'1',	'1',	'customer created'),
(37,	'2022-06-28 13:26:38',	'2022-06-28 13:26:38',	'1',	'1',	'customer created'),
(38,	'2022-06-28 13:28:27',	'2022-06-28 13:28:27',	'1',	'1',	'customer created'),
(39,	'2022-06-28 13:28:29',	'2022-06-28 13:28:29',	'1',	'1',	'customer created'),
(40,	'2022-06-28 13:28:29',	'2022-06-28 13:28:29',	'1',	'1',	'customer created'),
(41,	'2022-06-28 14:20:40',	'2022-06-28 14:20:40',	'1',	'1',	'customer created'),
(42,	'2022-06-28 14:20:43',	'2022-06-28 14:20:43',	'1',	'1',	'customer created'),
(43,	'2022-06-28 14:26:39',	'2022-06-28 14:26:39',	'1',	'1',	'customer created'),
(44,	'2022-06-28 14:26:41',	'2022-06-28 14:26:41',	'1',	'1',	'customer created'),
(45,	'2022-06-28 14:26:42',	'2022-06-28 14:26:42',	'1',	'1',	'customer created'),
(46,	'2022-06-28 15:28:33',	'2022-06-28 15:28:33',	'1',	'1',	'customer created'),
(47,	'2022-06-28 15:28:34',	'2022-06-28 15:28:34',	'1',	'1',	'customer created'),
(48,	'2022-06-28 16:20:44',	'2022-06-28 16:20:44',	'1',	'1',	'customer created'),
(49,	'2022-06-28 16:20:47',	'2022-06-28 16:20:47',	'1',	'1',	'customer created'),
(50,	'2022-06-28 16:26:43',	'2022-06-28 16:26:43',	'1',	'1',	'customer created'),
(51,	'2022-06-28 16:26:45',	'2022-06-28 16:26:45',	'1',	'1',	'customer created'),
(52,	'2022-06-28 16:26:46',	'2022-06-28 16:26:46',	'1',	'1',	'customer created'),
(53,	'2022-06-28 19:28:37',	'2022-06-28 19:28:37',	'1',	'1',	'customer created'),
(54,	'2022-06-28 19:28:41',	'2022-06-28 19:28:41',	'1',	'1',	'customer created'),
(55,	'2022-06-28 20:20:52',	'2022-06-28 20:20:52',	'1',	'1',	'customer created'),
(56,	'2022-06-28 20:20:52',	'2022-06-28 20:20:52',	'1',	'1',	'customer created'),
(57,	'2022-06-28 20:26:47',	'2022-06-28 20:26:47',	'1',	'1',	'customer created'),
(58,	'2022-06-28 20:26:48',	'2022-06-28 20:26:48',	'1',	'1',	'customer created'),
(59,	'2022-06-28 20:26:50',	'2022-06-28 20:26:50',	'1',	'1',	'customer created'),
(60,	'2022-06-28 23:28:41',	'2022-06-28 23:28:41',	'1',	'1',	'customer created'),
(61,	'2022-06-28 23:28:45',	'2022-06-28 23:28:45',	'1',	'1',	'customer created'),
(62,	'2022-06-29 00:20:55',	'2022-06-29 00:20:55',	'1',	'1',	'customer created'),
(63,	'2022-06-29 00:20:56',	'2022-06-29 00:20:56',	'1',	'1',	'customer created'),
(64,	'2022-06-29 00:26:51',	'2022-06-29 00:26:51',	'1',	'1',	'customer created'),
(65,	'2022-06-29 00:26:53',	'2022-06-29 00:26:53',	'1',	'1',	'customer created'),
(66,	'2022-06-29 00:26:55',	'2022-06-29 00:26:55',	'1',	'1',	'customer created'),
(67,	'2022-06-29 03:28:45',	'2022-06-29 03:28:45',	'1',	'1',	'customer created'),
(68,	'2022-06-29 03:28:49',	'2022-06-29 03:28:49',	'1',	'1',	'customer created'),
(69,	'2022-06-29 04:21:00',	'2022-06-29 04:21:00',	'1',	'1',	'customer created'),
(70,	'2022-06-29 04:21:00',	'2022-06-29 04:21:00',	'1',	'1',	'customer created'),
(71,	'2022-06-29 04:26:55',	'2022-06-29 04:26:55',	'1',	'1',	'customer created'),
(72,	'2022-06-29 04:26:56',	'2022-06-29 04:26:56',	'1',	'1',	'customer created'),
(73,	'2022-06-29 04:26:59',	'2022-06-29 04:26:59',	'1',	'1',	'customer created'),
(74,	'2022-06-29 05:20:57',	'2022-06-29 05:20:57',	'1',	'1',	'customer created'),
(75,	'2022-06-29 05:31:08',	'2022-06-29 05:31:08',	'1',	'1',	'customer created'),
(76,	'2022-06-29 05:32:07',	'2022-06-29 05:32:07',	'1',	'1',	'customer created'),
(77,	'2022-06-29 05:32:16',	'2022-06-29 05:32:16',	'1',	'1',	'customer created'),
(78,	'2022-06-29 05:36:34',	'2022-06-29 05:36:34',	'1',	'1',	'customer created'),
(79,	'2022-06-29 05:37:00',	'2022-06-29 05:37:00',	'1',	'1',	'customer created'),
(80,	'2022-06-29 06:25:48',	'2022-06-29 06:25:48',	'1',	'1',	'customer created'),
(81,	'2022-06-29 06:29:37',	'2022-06-29 06:29:37',	'1',	'1',	'customer created'),
(82,	'2022-06-29 06:36:53',	'2022-06-29 06:36:53',	'1',	'1',	'customer created'),
(83,	'2022-06-29 06:40:23',	'2022-06-29 06:40:23',	'1',	'1',	'customer created'),
(84,	'2022-06-29 06:41:27',	'2022-06-29 06:41:27',	'1',	'1',	'customer created'),
(85,	'2022-06-29 06:42:21',	'2022-06-29 06:42:21',	'1',	'1',	'customer created'),
(86,	'2022-06-29 06:43:25',	'2022-06-29 06:43:25',	'1',	'1',	'customer created'),
(87,	'2022-06-29 06:43:32',	'2022-06-29 06:43:32',	'1',	'1',	'customer created'),
(88,	'2022-06-29 06:45:08',	'2022-06-29 06:45:08',	'1',	'1',	'customer created'),
(89,	'2022-06-29 06:58:26',	'2022-06-29 06:58:26',	'1',	'1',	'customer created'),
(90,	'2022-06-29 06:59:10',	'2022-06-29 06:59:10',	'1',	'1',	'customer created'),
(91,	'2022-06-29 06:59:29',	'2022-06-29 06:59:29',	'1',	'1',	'customer created'),
(92,	'2022-06-29 07:00:28',	'2022-06-29 07:00:28',	'1',	'1',	'customer created'),
(93,	'2022-06-29 07:01:32',	'2022-06-29 07:01:32',	'1',	'1',	'customer created'),
(94,	'2022-06-29 07:03:26',	'2022-06-29 07:03:26',	'1',	'1',	'customer created'),
(95,	'2022-06-29 07:03:53',	'2022-06-29 07:03:53',	'1',	'1',	'customer created'),
(96,	'2022-06-29 07:04:41',	'2022-06-29 07:04:41',	'1',	'1',	'customer created'),
(97,	'2022-06-29 07:05:06',	'2022-06-29 07:05:06',	'1',	'1',	'customer created'),
(98,	'2022-06-29 07:09:38',	'2022-06-29 07:09:38',	'1',	'1',	'customer created'),
(99,	'2022-06-29 07:10:04',	'2022-06-29 07:10:04',	'1',	'1',	'customer created'),
(100,	'2022-06-29 07:13:40',	'2022-06-29 07:13:40',	'1',	'1',	'customer created'),
(101,	'2022-06-29 07:25:48',	'2022-06-29 07:25:48',	'1',	'1',	'customer created'),
(102,	'2022-06-29 07:25:49',	'2022-06-29 07:25:49',	'1',	'1',	'customer created'),
(103,	'2022-06-29 07:25:49',	'2022-06-29 07:25:49',	'1',	'1',	'customer created'),
(104,	'2022-06-29 07:26:52',	'2022-06-29 07:26:52',	'1',	'1',	'customer created'),
(105,	'2022-06-29 07:26:53',	'2022-06-29 07:26:53',	'1',	'1',	'customer created'),
(106,	'2022-06-29 07:26:53',	'2022-06-29 07:26:53',	'1',	'1',	'customer created'),
(107,	'2022-06-29 07:27:59',	'2022-06-29 07:27:59',	'1',	'1',	'customer created'),
(108,	'2022-06-29 07:28:49',	'2022-06-29 07:28:49',	'1',	'1',	'customer created'),
(109,	'2022-06-29 07:28:53',	'2022-06-29 07:28:53',	'1',	'1',	'customer created'),
(110,	'2022-06-29 07:28:58',	'2022-06-29 07:28:58',	'1',	'1',	'customer created'),
(111,	'2022-06-29 07:29:00',	'2022-06-29 07:29:00',	'1',	'1',	'customer created'),
(112,	'2022-06-29 07:29:00',	'2022-06-29 07:29:00',	'1',	'1',	'customer created'),
(113,	'2022-06-29 08:21:04',	'2022-06-29 08:21:04',	'1',	'1',	'customer created'),
(114,	'2022-06-29 08:21:04',	'2022-06-29 08:21:04',	'1',	'1',	'customer created'),
(115,	'2022-06-29 08:27:00',	'2022-06-29 08:27:00',	'1',	'1',	'customer created'),
(116,	'2022-06-29 08:27:02',	'2022-06-29 08:27:02',	'1',	'1',	'customer created'),
(117,	'2022-06-29 08:27:03',	'2022-06-29 08:27:03',	'1',	'1',	'customer created'),
(118,	'2022-06-29 10:46:55',	'2022-06-29 10:46:55',	'1',	'1',	'customer created'),
(119,	'2022-06-29 10:47:25',	'2022-06-29 10:47:25',	'1',	'1',	'customer created'),
(120,	'2022-06-30 07:25:23',	'2022-06-30 07:25:23',	'1',	'1',	'customer created'),
(121,	'2022-06-30 07:25:52',	'2022-06-30 07:25:52',	'1',	'1',	'customer created'),
(122,	'2022-06-30 07:58:04',	'2022-06-30 07:58:04',	'1',	'1',	'customer created'),
(123,	'2022-07-01 13:45:28',	'2022-07-01 13:45:28',	'1',	'1',	'customer created'),
(124,	'2022-07-05 09:55:29',	'2022-07-05 09:55:29',	'1',	'1',	'customer created'),
(125,	'2022-07-05 09:55:30',	'2022-07-05 09:55:30',	'1',	'1',	'customer created'),
(126,	'2022-07-05 09:55:30',	'2022-07-05 09:55:30',	'1',	'1',	'customer created'),
(127,	'2022-07-05 09:57:07',	'2022-07-05 09:57:07',	'1',	'1',	'customer created'),
(128,	'2022-07-05 10:20:22',	'2022-07-05 10:20:22',	'1',	'1',	'customer created'),
(129,	'2022-07-05 10:20:23',	'2022-07-05 10:20:23',	'1',	'1',	'customer created'),
(130,	'2022-07-05 10:20:23',	'2022-07-05 10:20:23',	'1',	'1',	'customer created'),
(131,	'2022-07-05 10:21:08',	'2022-07-05 10:21:08',	'1',	'1',	'customer created'),
(132,	'2022-07-05 10:25:40',	'2022-07-05 10:25:40',	'1',	'1',	'customer created'),
(133,	'2022-07-05 10:25:43',	'2022-07-05 10:25:43',	'1',	'1',	'customer created'),
(134,	'2022-07-05 10:25:43',	'2022-07-05 10:25:43',	'1',	'1',	'customer created'),
(135,	'2022-07-05 10:27:30',	'2022-07-05 10:27:30',	'1',	'1',	'customer created'),
(136,	'2022-07-05 10:27:34',	'2022-07-05 10:27:34',	'1',	'1',	'order fulfilled from shopify to bizybee apis'),
(137,	'2022-07-05 11:02:50',	'2022-07-05 11:02:50',	'1',	'1',	'customer created'),
(138,	'2022-07-05 11:02:50',	'2022-07-05 11:02:50',	'1',	'1',	'customer created'),
(139,	'2022-07-05 11:02:54',	'2022-07-05 11:02:54',	'1',	'1',	'customer created'),
(140,	'2022-07-05 11:03:27',	'2022-07-05 11:03:27',	'1',	'1',	'order fulfilled from shopify to bizybee apis'),
(141,	'2022-07-05 11:03:27',	'2022-07-05 11:03:27',	'1',	'1',	'customer created'),
(142,	'2022-07-05 11:06:45',	'2022-07-05 11:06:45',	'1',	'1',	'customer created'),
(143,	'2022-07-05 11:06:45',	'2022-07-05 11:06:45',	'1',	'1',	'customer created'),
(144,	'2022-07-05 11:06:45',	'2022-07-05 11:06:45',	'1',	'1',	'customer created'),
(145,	'2022-07-05 11:07:08',	'2022-07-05 11:07:08',	'1',	'1',	'customer created'),
(146,	'2022-07-05 11:07:08',	'2022-07-05 11:07:08',	'0',	'0',	'order fulfilled from shopify to bizybee apis'),
(147,	'2022-07-13 09:11:46',	'2022-07-13 09:11:46',	'1',	'1',	'customer created'),
(148,	'2022-07-13 09:11:46',	'2022-07-13 09:11:46',	'1',	'1',	'customer created'),
(149,	'2022-07-13 09:11:46',	'2022-07-13 09:11:46',	'1',	'1',	'customer created'),
(150,	'2022-07-13 09:12:11',	'2022-07-13 09:12:11',	'1',	'1',	'customer created'),
(151,	'2022-07-13 09:12:11',	'2022-07-13 09:12:11',	'1',	'1',	'customer created'),
(152,	'2022-07-13 09:12:12',	'2022-07-13 09:12:12',	'1',	'1',	'customer created'),
(153,	'2022-07-13 09:12:15',	'2022-07-13 09:12:15',	'1',	'1',	'customer created'),
(154,	'2022-07-13 09:29:07',	'2022-07-13 09:29:07',	'1',	'1',	'customer created'),
(155,	'2022-07-13 09:34:22',	'2022-07-13 09:34:22',	'1',	'1',	'customer created'),
(156,	'2022-07-13 09:34:22',	'2022-07-13 09:34:22',	'1',	'1',	'order fulfilled from shopify to bizybee apis'),
(157,	'2022-09-02 03:47:36',	'2022-09-02 03:47:36',	'1',	'1',	'customer created'),
(158,	'2022-09-02 03:47:37',	'2022-09-02 03:47:37',	'1',	'1',	'customer created'),
(159,	'2022-09-02 03:47:39',	'2022-09-02 03:47:39',	'1',	'1',	'customer created'),
(160,	'2022-09-02 03:48:07',	'2022-09-02 03:48:07',	'1',	'1',	'customer created'),
(161,	'2022-09-02 03:51:25',	'2022-09-02 03:51:25',	'1',	'1',	'customer created'),
(162,	'2022-09-02 03:51:27',	'2022-09-02 03:51:27',	'1',	'1',	'customer created'),
(163,	'2022-09-02 03:51:27',	'2022-09-02 03:51:27',	'1',	'1',	'customer created'),
(164,	'2022-09-02 03:51:28',	'2022-09-02 03:51:28',	'1',	'1',	'customer created'),
(165,	'2022-09-02 03:54:59',	'2022-09-02 03:54:59',	'1',	'1',	'order fulfilled from shopify to bizybee apis'),
(166,	'2022-09-02 03:55:00',	'2022-09-02 03:55:00',	'1',	'1',	'customer created'),
(167,	'2022-09-02 03:55:50',	'2022-09-02 03:55:50',	'1',	'1',	'customer created'),
(168,	'2022-09-02 03:55:51',	'2022-09-02 03:55:51',	'1',	'1',	'customer created'),
(169,	'2022-09-02 03:55:51',	'2022-09-02 03:55:51',	'1',	'1',	'customer created'),
(170,	'2022-09-02 03:56:04',	'2022-09-02 03:56:04',	'1',	'1',	'customer created');

DROP TABLE IF EXISTS `shopifydata`;
CREATE TABLE `shopifydata` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `shops_otherdetails`;
CREATE TABLE `shops_otherdetails` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `identity` varchar(1024) NOT NULL,
  `authentication` varchar(1024) NOT NULL,
  `sonce` varchar(255) NOT NULL,
  `shop_id` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `shops_otherdetails` (`id`, `identity`, `authentication`, `sonce`, `shop_id`, `updated_at`, `created_at`) VALUES
(4,	'b3008ada-f6d0-11ec-92dc-3ec864fa32fc',	'ee603823510ae6c77cb68124bfecf90962098217bf31178912d6a9113038f51d4b66af949c553293fd37e160cfc5dc56d363d4f4405cfd3d43807669dcfbe5c3d2e64b81438ec64c0a0c5f18ee92a9f4aff2fc298923600e9bd4bd30ea61d747176a297ae7fa231330f6664e4ba881c0d0342ea41693ebf52827a31fe7f37b42',	'84e6830842ae256a',	13,	'2022-09-22 16:04:12',	'2022-06-28 11:22:30'),
(5,	'8d7b6d0e-8b62-11e8-916b-448a5b7b14f9',	'72927d81ab5922cbca8fdad2925b20d012a9eab810f67b3107f36e28bbc9d16a5e91e54de217027891e7081d8420bd7c23a9d8597b346002c58200352c5bf48d959c24ccfeecb935fe98bda616c5580347cb674e983a8a35f454cea2dceb86ecfe44e7854c5737b47d147c0444222926c369f9e09764d327b3c951a6c07287ab',	'null',	15,	'2022-12-14 10:15:35',	'2022-08-29 05:15:53'),
(6,	'ab806ac3-824c-4966-b560-6f857d60b033',	'YjYwMjU1MWMtNGUwMy00ZGUyLTg3ODQtNjEyODNmNzg1N2Ri',	'null',	18,	'2022-12-16 10:22:52',	'2022-10-06 11:47:02');

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `shopify_grandfathered` tinyint(1) NOT NULL DEFAULT 0,
  `shopify_namespace` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shopify_freemium` tinyint(1) NOT NULL DEFAULT 0,
  `plan_id` int(10) unsigned DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `password_updated_at` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_plan_id_foreign` (`plan_id`),
  CONSTRAINT `users_plan_id_foreign` FOREIGN KEY (`plan_id`) REFERENCES `plans` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `shopify_grandfathered`, `shopify_namespace`, `shopify_freemium`, `plan_id`, `deleted_at`, `password_updated_at`) VALUES
(18,	'fp-apps-testing.myshopify.com',	'shop@fp-apps-testing.myshopify.com',	NULL,	'shpua_e6373a8cf6b833642ae3ee38053d2bf2',	NULL,	'2022-12-16 10:21:38',	'2022-12-16 10:22:12',	0,	NULL,	0,	NULL,	NULL,	'2022-12-16');

-- 2022-12-18 15:50:05
