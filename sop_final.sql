-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 25, 2022 at 08:53 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sop_final`
--

-- --------------------------------------------------------

--
-- Table structure for table `address_infos`
--

CREATE TABLE `address_infos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rel_id` int(10) UNSIGNED NOT NULL,
  `type` int(11) DEFAULT NULL COMMENT '1:customer  2:staff 3: admin 4: business user',
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `town_city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apartment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_id` int(10) UNSIGNED NOT NULL,
  `tyle` int(10) UNSIGNED DEFAULT 1 COMMENT '1=personal,2=billing,3=shiping,4=other',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `address_infos`
--

INSERT INTO `address_infos` (`id`, `rel_id`, `type`, `first_name`, `last_name`, `address`, `post_code`, `unit`, `town_city`, `apartment`, `email_address`, `phone`, `zone`, `country_id`, `tyle`, `created_at`, `updated_at`) VALUES
(16, 1, 1, NULL, NULL, 'test', '045647', '04', 'singpure', '05', NULL, NULL, NULL, 6, 1, '2022-02-10 03:58:56', '2022-02-10 03:58:56'),
(18, 14, 1, NULL, NULL, '92 house road 4', '456123', '05 t', 'dhaka', '2nd floor', NULL, NULL, NULL, 6, 1, '2022-02-17 02:37:09', '2022-02-17 02:39:03'),
(20, 999, NULL, NULL, NULL, '$value', '232', '01', 'sfdf', '08', NULL, '23', NULL, 6, 1, '2022-03-15 05:24:45', '2022-03-15 05:24:45'),
(21, 999, NULL, NULL, NULL, 'saveimage', '23234', 'saveimage', 'saveimage', 'saveimage', NULL, '23', NULL, 6, 1, '2022-03-15 05:26:13', '2022-03-15 05:26:13'),
(22, 999, NULL, NULL, NULL, '11 Woodlands Close', '23234', '01', 'Woodlands 11', '08', NULL, '23', NULL, 6, 1, '2022-03-15 05:28:01', '2022-03-15 05:28:01');

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE `admin_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `staff_id` int(10) UNSIGNED DEFAULT NULL,
  `role_id` int(10) UNSIGNED DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_login_time` timestamp NULL DEFAULT NULL,
  `last_login_ip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_login_durtion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_login_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`id`, `name`, `staff_id`, `role_id`, `email`, `email_verified_at`, `password`, `last_login_time`, `last_login_ip`, `last_login_durtion`, `last_login_name`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 1, 1, 'Admin@gmail.com', NULL, '$2y$10$gTUURjtd0mI3/UyzBGrm/ed376Vt914d6GdhsmW3QHyxxA7on1/Ke', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `app_settings`
--

CREATE TABLE `app_settings` (
  `id` int(11) NOT NULL,
  `app_name` varchar(255) NOT NULL,
  `app_fev_icon` int(10) NOT NULL,
  `app_logo_id` int(10) NOT NULL,
  `address_id` int(10) NOT NULL,
  `title` varchar(255) NOT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `meta_keywords` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `app_settings`
--

INSERT INTO `app_settings` (`id`, `app_name`, `app_fev_icon`, `app_logo_id`, `address_id`, `title`, `meta_title`, `meta_description`, `meta_keywords`, `created_at`, `updated_at`) VALUES
(1, 'Fresh Pasar', 124, 123, 22, 'Fresh Pasar', 'Fresh Pasar', 'Fresh Pasar', 'Fresh Pasar', '2022-03-15 05:28:01', '2022-03-15 05:28:01');

-- --------------------------------------------------------

--
-- Table structure for table `band_info`
--

CREATE TABLE `band_info` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_company_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_log` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `brand_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `band_info`
--

INSERT INTO `band_info` (`id`, `name`, `brand_company_name`, `brand_log`, `brand_description`, `created_at`, `updated_at`) VALUES
(1, 'test', 'fssd', NULL, 'sdfs fs', '2022-01-02 23:52:22', '2022-01-02 23:52:22'),
(2, 'Pokka', 'Pokka Foods', NULL, 'Pokka Foods provide a wide variety of food items.', '2022-01-18 20:51:09', '2022-01-18 20:51:09'),
(3, 'ModernMum', 'ModernMum Pte Ltd', NULL, 'ModernMum provides healthy, certified, and affordable food items.', '2022-01-18 20:52:59', '2022-01-18 20:52:59'),
(4, 'ModernMum', 'ModernMum Pte Ltd', NULL, 'ModernMum provides healthy, certified, and affordable food items.', '2022-01-18 20:54:50', '2022-01-18 20:54:50'),
(5, 'FruitSense', 'FruitSense Pte Ltd', NULL, 'FruitSense sells a wide variety of fruits and fresh produce that are popular with the locals.', '2022-01-19 21:55:58', '2022-01-19 21:55:58'),
(6, 'EatFresh', 'EatFresh Pte Ltd', NULL, 'EatFresh sells all types of vegetables that are popular with Singaporeans.', '2022-01-19 21:57:42', '2022-01-19 21:57:42'),
(7, 'SnacksDaily', 'SnacksDaily Pte Ltd', NULL, 'SnacksDaily sells a wide variety of halal and healthy snacks for adults and children.', '2022-01-19 22:02:58', '2022-01-19 22:02:58'),
(8, 'sdf', 'sdfs', NULL, 'sdfs', '2022-03-03 03:00:04', '2022-03-03 03:00:04');

-- --------------------------------------------------------

--
-- Table structure for table `banner_buttton_details`
--

CREATE TABLE `banner_buttton_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `language_file_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link_route` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `view_port` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_drit_link` int(11) DEFAULT NULL,
  `other` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `business_type_infos`
--

CREATE TABLE `business_type_infos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type_of_business` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `business_code_alphabet` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `business_code_numerical` int(11) NOT NULL,
  `defination` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `business_user_infos`
--

CREATE TABLE `business_user_infos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_id` int(10) UNSIGNED NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `business_type_infos_id` int(10) UNSIGNED NOT NULL,
  `client_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'only 4 digit slug id',
  `uen_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `load_area_stall_permit_or_permises_regristy` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '1=active,2=inactive',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_login_ip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_login_durtion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_login_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_login_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_active_device_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cardinfos`
--

CREATE TABLE `cardinfos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `card_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `card_holder_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expiration_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cvv` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `other` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cardinfos`
--

INSERT INTO `cardinfos` (`id`, `card_number`, `card_holder_name`, `expiration_date`, `cvv`, `user_id`, `status`, `type`, `other`, `created_at`, `updated_at`) VALUES
(2, '456789-456789-44656789-45678-45610', 'test you', '02/2023', '123', '14', NULL, NULL, NULL, '2022-02-17 02:55:05', '2022-02-17 02:55:05'),
(3, '456789-456789-44656789-45678-45610', 'test', '02/2023', '123', '14', NULL, NULL, NULL, '2022-02-18 01:42:01', '2022-02-18 01:53:55');

-- --------------------------------------------------------

--
-- Table structure for table `category_infos`
--

CREATE TABLE `category_infos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bg_color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `language_file_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fav_icon_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1' COMMENT '1=use by defult,2=custom fav_icon used',
  `sec_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1' COMMENT '1=use by defult,2=custom seo',
  `discount_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1' COMMENT '1=no discount,2=fixd amount discount,3=percentage',
  `discount_amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `more_details` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` int(10) UNSIGNED DEFAULT NULL,
  `create_by` int(10) UNSIGNED DEFAULT NULL,
  `update_by` int(10) UNSIGNED DEFAULT NULL,
  `icon` int(11) DEFAULT NULL,
  `own_id` int(10) UNSIGNED DEFAULT NULL,
  `status` int(10) NOT NULL DEFAULT 1 COMMENT '1 =active 2 = inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category_infos`
--

INSERT INTO `category_infos` (`id`, `name`, `description`, `bg_color`, `language_file_name`, `fav_icon_status`, `sec_status`, `discount_type`, `discount_amount`, `more_details`, `parent_id`, `create_by`, `update_by`, `icon`, `own_id`, `status`, `created_at`, `updated_at`) VALUES
(20, 'mee', 'testing_mee', '#6fa8dc', 'category', '1', '1', '1', NULL, 'testing_details', NULL, NULL, NULL, NULL, NULL, 1, '2022-01-17 04:03:30', '2022-01-17 04:03:30'),
(21, 'fruits', 'testing_fruits', '#93c47d', 'category', '1', '1', '1', NULL, 'testing_fruits', NULL, NULL, NULL, NULL, NULL, 1, '2022-01-17 04:04:57', '2022-01-17 04:04:57'),
(22, 'vegetables', 'vegetables', '#9fc5e8', 'category', '1', '1', '1', NULL, 'vegetables', NULL, NULL, NULL, NULL, NULL, 1, '2022-01-17 04:05:42', '2022-01-17 04:05:42'),
(23, 'chilled_/frozen', 'chilled_/frozen', '#d9d2e9', 'category', '1', '1', '1', NULL, 'chilled_/frozen', NULL, NULL, NULL, NULL, NULL, 1, '2022-01-17 04:06:38', '2022-01-17 04:06:38'),
(24, 'eggs', 'eggs_description', '#d9ead3', 'category', '1', '1', '1', NULL, 'eggs_description', NULL, NULL, NULL, NULL, NULL, 1, '2022-01-17 04:07:21', '2022-01-17 04:07:21'),
(25, 'herbs_&_spices', 'herbs_&_spices_description', '#ead1dc', 'category', '1', '1', '1', NULL, 'header_&_spices_description', NULL, NULL, NULL, NULL, NULL, 1, '2022-01-17 04:08:39', '2022-01-17 04:08:39'),
(27, 'mee_one', 'mee_one', '#ead1dc', 'category', '1', '1', '1', NULL, 'mee_one', 20, NULL, NULL, NULL, NULL, 1, '2022-01-17 04:10:06', '2022-01-17 04:10:06'),
(28, 'dry_grocery', 'this_category_includes_rice,_dry_pasta,_flour,_sugar,_spices,_canned_goods,_dried_beans,_and_cereals.', '#ffe599', 'category', '1', '1', '1', NULL, 'this_category_includes_rice,_dry_pasta,_flour,_sugar,_spices,_canned_goods,_dried_beans,_and_cereals.', NULL, NULL, NULL, NULL, NULL, 1, '2022-01-17 21:20:29', '2022-01-17 21:20:29'),
(29, 'beverages', 'it_includes_carbonated_soft_drinks,_malted_beverages,_sweet_non-alcoholic_drinks.', '#e06666', 'category', '1', '1', '1', NULL, 'a_liquid_to_consume,_usually_excluding_water;_a_drink._this_may_include_tea,_coffee,_liquor,_beer,_milk,_juice,_or_soft_drinks.', NULL, NULL, NULL, NULL, NULL, 1, '2022-01-18 19:21:45', '2022-01-18 19:21:45'),
(30, 'asian_drinks', 'it_includes_various_healthy_drinks_that_are_popular_with_asian_people.', '#ea9999', 'category', '1', '1', '1', NULL, 'drinks_that_are_made_with_milk,_syrup,_tea,_barley_malt,_coffee,_sugar,_and_different_other_ingredients.', 29, NULL, NULL, NULL, NULL, 1, '2022-01-18 19:27:00', '2022-01-18 19:27:00');

-- --------------------------------------------------------

--
-- Table structure for table `country_infos`
--

CREATE TABLE `country_infos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_currency_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_currency_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `iso_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `min_digits` int(11) DEFAULT NULL,
  `max_digits` int(11) DEFAULT NULL,
  `language` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `country_infos`
--

INSERT INTO `country_infos` (`id`, `name`, `country_code`, `country_currency_name`, `country_currency_code`, `iso_code`, `min_digits`, `max_digits`, `language`, `created_at`, `updated_at`) VALUES
(1, 'Norway', '47', NULL, '', 'NO', 8, 8, 'bg', NULL, NULL),
(2, 'Myanmar', '95', NULL, '', 'MY', 11, 11, 'bg', NULL, NULL),
(3, 'Sweden', '46', NULL, '', 'SW', 8, 10, 'bg', NULL, NULL),
(4, 'Bangladesh', '88', NULL, '', 'BD', 8, 10, 'bg', NULL, NULL),
(6, 'Singapore', '+65', 'S$', NULL, 'SGP', 8, 8, 'English', '2022-01-17 21:14:35', '2022-01-17 21:14:35'),
(7, 'Malaysia', '+60', 'RM', NULL, 'MYS', 6, 8, 'Malay, English', '2022-01-18 21:07:41', '2022-01-18 21:07:41'),
(8, 'Indonesia', '+62', 'Rp', NULL, 'IDN', 8, 13, 'Bahasa Indonesia', '2022-01-18 21:11:13', '2022-01-18 21:11:13');

-- --------------------------------------------------------

--
-- Table structure for table `delivery_slots`
--

CREATE TABLE `delivery_slots` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `start_time` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `end_time` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `number_of_delivery` int(10) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `delivery_slots`
--

INSERT INTO `delivery_slots` (`id`, `start_time`, `end_time`, `details`, `number_of_delivery`, `created_at`, `updated_at`) VALUES
(1, '8:00 AM', '10:00 AM', NULL, 8, NULL, NULL),
(2, '10:01 AM ', '12:00PM', NULL, 8, NULL, NULL),
(3, '12:01 PM', '2:00 PM', NULL, 8, NULL, NULL),
(4, '2:01 PM', '4:00 PM', NULL, 8, NULL, NULL),
(5, '4:01 PM', '6:00 PM', NULL, 8, NULL, NULL),
(6, '6:01 PM', '8:00 PM', NULL, 8, NULL, NULL),
(7, '8:01 PM', '10:00 PM', NULL, 8, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `delivery_slot_delivery_weeklies`
--

CREATE TABLE `delivery_slot_delivery_weeklies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slot_id` int(10) UNSIGNED NOT NULL,
  `week_id` int(10) UNSIGNED NOT NULL,
  `type` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `delivery_slot_delivery_weeklies`
--

INSERT INTO `delivery_slot_delivery_weeklies` (`id`, `slot_id`, `week_id`, `type`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL, NULL),
(2, 2, 1, NULL, NULL, NULL),
(3, 3, 1, NULL, NULL, NULL),
(4, 4, 1, NULL, NULL, NULL),
(5, 5, 1, NULL, NULL, NULL),
(6, 6, 1, NULL, NULL, NULL),
(7, 7, 1, NULL, NULL, NULL),
(9, 1, 2, NULL, NULL, NULL),
(10, 2, 2, NULL, NULL, NULL),
(11, 3, 2, NULL, NULL, NULL),
(12, 4, 2, NULL, NULL, NULL),
(13, 5, 2, NULL, NULL, NULL),
(14, 6, 2, NULL, NULL, NULL),
(15, 7, 2, NULL, NULL, NULL),
(16, 1, 3, NULL, NULL, NULL),
(17, 2, 3, NULL, NULL, NULL),
(18, 3, 3, NULL, NULL, NULL),
(19, 4, 3, NULL, NULL, NULL),
(20, 5, 3, NULL, NULL, NULL),
(21, 6, 3, NULL, NULL, NULL),
(22, 7, 3, NULL, NULL, NULL),
(23, 1, 4, NULL, NULL, NULL),
(24, 2, 4, NULL, NULL, NULL),
(25, 3, 4, NULL, NULL, NULL),
(26, 4, 4, NULL, NULL, NULL),
(27, 5, 4, NULL, NULL, NULL),
(28, 6, 4, NULL, NULL, NULL),
(29, 7, 4, NULL, NULL, NULL),
(30, 1, 5, NULL, NULL, NULL),
(31, 2, 5, NULL, NULL, NULL),
(32, 3, 5, NULL, NULL, NULL),
(33, 4, 5, NULL, NULL, NULL),
(34, 5, 5, NULL, NULL, NULL),
(35, 6, 5, NULL, NULL, NULL),
(36, 7, 5, NULL, NULL, NULL),
(37, 1, 6, NULL, NULL, NULL),
(38, 2, 6, NULL, NULL, NULL),
(39, 3, 6, NULL, NULL, NULL),
(40, 4, 6, NULL, NULL, NULL),
(41, 5, 6, NULL, NULL, NULL),
(42, 6, 6, NULL, NULL, NULL),
(43, 7, 6, NULL, NULL, NULL),
(44, 1, 7, NULL, NULL, NULL),
(45, 2, 7, NULL, NULL, NULL),
(46, 3, 7, NULL, NULL, NULL),
(47, 4, 7, NULL, NULL, NULL),
(48, 5, 7, NULL, NULL, NULL),
(49, 6, 7, NULL, NULL, NULL),
(50, 7, 7, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `delivery_statuses`
--

CREATE TABLE `delivery_statuses` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `language_file_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `delivery_statuses`
--

INSERT INTO `delivery_statuses` (`id`, `name`, `language_file_name`, `description`, `type`, `created_at`, `updated_at`) VALUES
(1, 'preparing', 'status', 'preparing', 1, NULL, NULL),
(2, 'Delivery', NULL, NULL, NULL, '2022-02-02 18:29:13', '2022-02-02 18:29:13');

-- --------------------------------------------------------

--
-- Table structure for table `delivery_weeklies`
--

CREATE TABLE `delivery_weeklies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dayName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `delivery_weeklies`
--

INSERT INTO `delivery_weeklies` (`id`, `title`, `dayName`, `details`, `created_at`, `updated_at`) VALUES
(1, 'Thu', 'Thu', NULL, NULL, NULL),
(2, 'Fri', 'Fri', NULL, NULL, NULL),
(3, 'Sat', 'Sat', NULL, NULL, NULL),
(4, 'Sun', 'Sun', NULL, NULL, NULL),
(5, 'Mon', 'Mon', NULL, NULL, NULL),
(6, 'Tue', 'Tue', NULL, NULL, NULL),
(7, 'Wed', 'Wed', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `delivryinfos`
--

CREATE TABLE `delivryinfos` (
  `id` int(11) NOT NULL,
  `order_id` int(10) NOT NULL,
  `address_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `date_time` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `delivery_man_id` int(11) DEFAULT NULL,
  `delivery_slot_delivery_week_id` int(11) NOT NULL,
  `time_slort` int(11) DEFAULT NULL,
  `delivery_status` int(11) DEFAULT NULL,
  `delivery_note` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `delivryinfos`
--

INSERT INTO `delivryinfos` (`id`, `order_id`, `address_id`, `user_id`, `date_time`, `delivery_man_id`, `delivery_slot_delivery_week_id`, `time_slort`, `delivery_status`, `delivery_note`, `created_at`, `updated_at`) VALUES
(1, 17, 2, 1, 'Tue 01 Mar 22', NULL, 2, 2, 1, NULL, '2022-02-25 00:30:32', '2022-02-25 00:30:32');

-- --------------------------------------------------------

--
-- Table structure for table `dept_info`
--

CREATE TABLE `dept_info` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `div_info_id` int(10) UNSIGNED NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dept_info`
--

INSERT INTO `dept_info` (`id`, `name`, `div_info_id`, `description`, `created_at`, `updated_at`) VALUES
(1, 'sfd', 1, 'sdfsf', '2022-01-03 21:48:10', '2022-01-03 21:48:10');

-- --------------------------------------------------------

--
-- Table structure for table `div_info`
--

CREATE TABLE `div_info` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `div_info`
--

INSERT INTO `div_info` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'sdfsf', 'sdfsf', '2022-01-03 03:16:25', '2022-01-03 03:16:25');

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
-- Table structure for table `frontpagelists`
--

CREATE TABLE `frontpagelists` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `route` varchar(255) NOT NULL,
  `is_route_parmater` tinyint(3) DEFAULT 2 COMMENT '1:YES 2:NO',
  `parmater_type` int(11) NOT NULL DEFAULT 0,
  `parmater_type_wise_slider` tinyint(3) DEFAULT 2 COMMENT '1:YES 2:NO',
  `parmter_type_id_with_sider_id` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `app_id` int(11) DEFAULT NULL,
  `footer_link_type` int(11) DEFAULT NULL COMMENT '1:customcare2:quicklick',
  `is_cms_type` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1:false2:true',
  `cache_id` varchar(255) DEFAULT NULL,
  `create_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `frontpagelists`
--

INSERT INTO `frontpagelists` (`id`, `title`, `route`, `is_route_parmater`, `parmater_type`, `parmater_type_wise_slider`, `parmter_type_id_with_sider_id`, `app_id`, `footer_link_type`, `is_cms_type`, `cache_id`, `create_at`, `updated_at`) VALUES
(1, 'Home page', 'homepage', 2, 0, 2, NULL, NULL, NULL, 1, NULL, NULL, NULL),
(2, 'Product page', 'shoping.producd.all', 2, 0, 2, NULL, NULL, NULL, 1, NULL, NULL, NULL),
(3, 'View card', 'front.cart', 2, 0, 2, NULL, NULL, NULL, 1, NULL, NULL, NULL),
(4, 'Checkout', 'front.checkout', 2, 0, 2, NULL, NULL, NULL, 1, NULL, NULL, NULL),
(5, 'Login', 'front.log.login', 2, 0, 2, NULL, NULL, NULL, 1, NULL, NULL, NULL),
(6, 'Registration', 'front.registration', 2, 0, 2, NULL, NULL, NULL, 1, NULL, NULL, NULL),
(7, 'After Registration welcome page (In app)', 'api.sider', 2, 0, 2, NULL, NULL, NULL, 1, NULL, NULL, NULL),
(8, 'After Registration Delivery page (In app)', 'api.sider', 2, 0, 2, NULL, NULL, NULL, 1, NULL, NULL, NULL),
(9, 'Order Welcome page ', 'api.sider', 2, 0, 2, NULL, NULL, NULL, 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `halal_info`
--

CREATE TABLE `halal_info` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `authority` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `halal_info`
--

INSERT INTO `halal_info` (`id`, `authority`, `title`, `description`, `status`, `created_at`, `updated_at`) VALUES
(4, 'Singapore', 'test', NULL, NULL, '2022-01-17 04:31:38', '2022-01-17 04:31:38'),
(5, 'Majlis Ugama Islam Singapura', 'The Islamic Religious Council of Singapore has been working as the custodian of Halal food assurance for Singapore\'s 15% Muslim population since 1978.', NULL, NULL, '2022-01-18 20:57:39', '2022-01-18 20:57:39'),
(6, 'Recognised Foreign Halal Certification Body (FHCB)', 'Department of Islamic Development Malaysia (JAKIM) is the agency responsible for the Islamic affairs including halal certification in Malaysia.', NULL, NULL, '2022-01-18 21:00:34', '2022-01-18 21:00:34'),
(7, 'National Body of Halal Assurance (BPJPH)', 'The highest authority to certify and issue a halal certificate in Indonesia is held by the National Body of Halal Assurance (BPJPH). The inauguration happened in October 2017 and works in coordination with Indonesian Ulama Council (MUI).', NULL, NULL, '2022-01-18 21:02:54', '2022-01-18 21:02:54');

-- --------------------------------------------------------

--
-- Table structure for table `hala_details`
--

CREATE TABLE `hala_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_info_id` int(10) UNSIGNED NOT NULL,
  `hala_info_id` int(10) UNSIGNED NOT NULL,
  `halal_exipirydate` timestamp NULL DEFAULT NULL,
  `halal_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hala_details`
--

INSERT INTO `hala_details` (`id`, `product_info_id`, `hala_info_id`, `halal_exipirydate`, `halal_number`, `created_at`, `updated_at`) VALUES
(5, 24, 4, '2022-01-11 18:00:00', NULL, '2022-01-17 04:32:14', '2022-01-17 04:32:14'),
(7, 25, 5, '2022-01-11 18:00:00', NULL, '2022-03-06 23:43:35', '2022-03-06 23:43:35'),
(8, 26, 5, '2022-01-11 18:00:00', NULL, '2022-03-06 23:43:45', '2022-03-06 23:43:45'),
(9, 27, 5, '2022-01-11 18:00:00', NULL, '2022-03-06 23:43:52', '2022-03-06 23:43:52'),
(10, 28, 5, '2022-01-11 18:00:00', NULL, '2022-03-06 23:43:56', '2022-03-06 23:43:56'),
(11, 29, 5, '2022-01-11 18:00:00', NULL, '2022-03-06 23:44:00', '2022-03-06 23:44:00'),
(12, 30, 5, '2022-01-11 18:00:00', NULL, '2022-03-06 23:44:03', '2022-03-06 23:44:03'),
(13, 31, 5, '2022-01-11 18:00:00', NULL, '2022-03-06 23:44:08', '2022-03-06 23:44:08'),
(14, 32, 5, '2022-01-11 18:00:00', NULL, '2022-03-06 23:44:11', '2022-03-06 23:44:11'),
(15, 33, 5, '2022-01-11 18:00:00', NULL, '2022-03-06 23:44:16', '2022-03-06 23:44:16'),
(16, 34, 5, '2022-01-11 18:00:00', NULL, '2022-03-06 23:44:19', '2022-03-06 23:44:19'),
(17, 35, 5, '2022-01-11 18:00:00', NULL, '2022-03-06 23:44:22', '2022-03-06 23:44:22'),
(18, 36, 5, '2022-01-11 18:00:00', NULL, '2022-03-06 23:44:26', '2022-03-06 23:44:26'),
(19, 37, 5, '2022-01-11 18:00:00', NULL, '2022-03-06 23:44:31', '2022-03-06 23:44:31'),
(20, 38, 5, '2022-01-11 18:00:00', NULL, '2022-03-06 23:44:35', '2022-03-06 23:44:35'),
(21, 39, 5, '2022-01-11 18:00:00', NULL, '2022-03-06 23:44:38', '2022-03-06 23:44:38'),
(22, 40, 5, '2022-01-11 18:00:00', NULL, '2022-03-06 23:44:41', '2022-03-06 23:44:41'),
(23, 41, 5, '2022-01-11 18:00:00', NULL, '2022-03-06 23:44:44', '2022-03-06 23:44:44');

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE `image` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '1=active,2=inactive',
  `alt_text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` int(11) DEFAULT 1 COMMENT '1=image,2=video,3=icon,4=pdf,5=svg,6=other',
  `upload_user_id` int(11) DEFAULT NULL,
  `image_ext` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `folder_location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`id`, `name`, `status`, `alt_text`, `type`, `upload_user_id`, `image_ext`, `folder_location`, `created_at`, `updated_at`) VALUES
(48, '1642413810157.png', 1, NULL, 1, 1, 'png', '/image', '2022-01-17 04:03:30', '2022-01-17 04:03:30'),
(49, '1642413897386.png', 1, NULL, 1, 1, 'png', '/image', '2022-01-17 04:04:57', '2022-01-17 04:04:57'),
(50, '1642413942509.png', 1, NULL, 1, 1, 'png', '/image', '2022-01-17 04:05:42', '2022-01-17 04:05:42'),
(51, '1642413998107.png', 1, NULL, 1, 1, 'png', '/image', '2022-01-17 04:06:38', '2022-01-17 04:06:38'),
(52, '1642414041268.png', 1, NULL, 1, 1, 'png', '/image', '2022-01-17 04:07:21', '2022-01-17 04:07:21'),
(53, '1642414119332.png', 1, NULL, 1, 1, 'png', '/image', '2022-01-17 04:08:39', '2022-01-17 04:08:39'),
(54, '.', 1, NULL, 1, 1, NULL, '/image', '2022-01-17 04:09:22', '2022-01-17 04:09:22'),
(55, '1642414206922.png', 1, NULL, 1, 1, 'png', '/image', '2022-01-17 04:10:06', '2022-01-17 04:10:06'),
(56, '1_1642415097742.png', 1, NULL, 1, 1, 'png', '/image', '2022-01-17 04:24:57', '2022-01-17 04:24:57'),
(57, '2_1642415097878.png', 1, NULL, 1, 1, 'png', '/image', '2022-01-17 04:24:57', '2022-01-17 04:24:57'),
(58, '1642415213843.png', 1, NULL, 1, 1, 'png', '/image', '2022-01-17 04:26:53', '2022-01-17 04:26:53'),
(59, '1642415498343.png', 1, NULL, 1, 1, 'png', '/image', '2022-01-17 04:31:38', '2022-01-17 04:31:38'),
(60, '1642483229369.jpg', 1, NULL, 1, 1, 'jpg', '/image', '2022-01-17 21:20:29', '2022-01-17 21:20:29'),
(61, '1642562505537.jpg', 1, NULL, 1, 1, 'jpg', '/image', '2022-01-18 19:21:45', '2022-01-18 19:21:45'),
(62, '1642562820848.jpg', 1, NULL, 1, 1, 'jpg', '/image', '2022-01-18 19:27:00', '2022-01-18 19:27:00'),
(63, '1642563137940.png', 1, NULL, 1, 1, 'png', '/image', '2022-01-18 19:32:17', '2022-01-18 19:32:17'),
(64, '1642567410753.png', 1, NULL, 1, 1, 'png', '/image', '2022-01-18 20:43:30', '2022-01-18 20:43:30'),
(65, '1642567410781.png', 1, NULL, 1, 1, 'png', '/image', '2022-01-18 20:43:31', '2022-01-18 20:43:31'),
(66, '1642567565192.png', 1, NULL, 1, 1, 'png', '/image', '2022-01-18 20:46:05', '2022-01-18 20:46:05'),
(67, '1642567567220.png', 1, NULL, 1, 1, 'png', '/image', '2022-01-18 20:46:07', '2022-01-18 20:46:07'),
(68, '1642567709102.jpg', 1, NULL, 1, 1, 'jpg', '/image', '2022-01-18 20:48:29', '2022-01-18 20:48:29'),
(69, '1642567869625.gif', 1, NULL, 1, 1, 'gif', '/image', '2022-01-18 20:51:09', '2022-01-18 20:51:09'),
(70, '1642567979011.jpg', 1, NULL, 1, 1, 'jpg', '/image', '2022-01-18 20:52:59', '2022-01-18 20:52:59'),
(71, '1642568090747.png', 1, NULL, 1, 1, 'png', '/image', '2022-01-18 20:54:52', '2022-01-18 20:54:52'),
(72, '1642568259021.png', 1, NULL, 1, 1, 'png', '/image', '2022-01-18 20:57:39', '2022-01-18 20:57:39'),
(73, '1642568434875.png', 1, NULL, 1, 1, 'png', '/image', '2022-01-18 21:00:34', '2022-01-18 21:00:34'),
(74, '1642568574133.png', 1, NULL, 1, 1, 'png', '/image', '2022-01-18 21:02:54', '2022-01-18 21:02:54'),
(75, '1642569212550.png', 1, NULL, 1, 1, 'png', '/image', '2022-01-18 21:13:32', '2022-01-18 21:13:32'),
(76, '1642569319307.png', 1, NULL, 1, 1, 'png', '/image', '2022-01-18 21:15:19', '2022-01-18 21:15:19'),
(77, '1642569417570.png', 1, NULL, 1, 1, 'png', '/image', '2022-01-18 21:16:57', '2022-01-18 21:16:57'),
(78, '1642569505766.png', 1, NULL, 1, 1, 'png', '/image', '2022-01-18 21:18:25', '2022-01-18 21:18:25'),
(79, '1_1642571839997.png', 1, NULL, 1, 1, 'png', '/image', '2022-01-18 21:57:20', '2022-01-18 21:57:20'),
(80, '1642658158877.png', 1, NULL, 1, 1, 'png', '/image', '2022-01-19 21:55:59', '2022-01-19 21:55:59'),
(81, '1642658262413.jpg', 1, NULL, 1, 1, 'jpg', '/image', '2022-01-19 21:57:42', '2022-01-19 21:57:42'),
(82, '1642658578114.jpg', 1, NULL, 1, 1, 'jpg', '/image', '2022-01-19 22:02:58', '2022-01-19 22:02:58'),
(83, '1_1642658774719.jpg', 1, NULL, 1, 1, 'jpg', '/image', '2022-01-19 22:06:14', '2022-01-19 22:06:14'),
(84, '1_1642660055629.jpg', 1, NULL, 1, 1, 'jpg', '/image', '2022-01-19 22:27:35', '2022-01-19 22:27:35'),
(85, '1_1642660249373.png', 1, NULL, 1, 1, 'png', '/image', '2022-01-19 22:30:50', '2022-01-19 22:30:50'),
(86, '1_1642660475297.jpg', 1, NULL, 1, 1, 'jpg', '/image', '2022-01-19 22:34:35', '2022-01-19 22:34:35'),
(87, '1_1642660856954.png', 1, NULL, 1, 1, 'png', '/image', '2022-01-19 22:40:57', '2022-01-19 22:40:57'),
(88, '1_1642661036351.jpg', 1, NULL, 1, 1, 'jpg', '/image', '2022-01-19 22:43:56', '2022-01-19 22:43:56'),
(89, '1_1642661173499.jpg', 1, NULL, 1, 1, 'jpg', '/image', '2022-01-19 22:46:13', '2022-01-19 22:46:13'),
(90, '1_1642661311037.jpg', 1, NULL, 1, 1, 'jpg', '/image', '2022-01-19 22:48:31', '2022-01-19 22:48:31'),
(91, '1_1642661506085.jpg', 1, NULL, 1, 1, 'jpg', '/image', '2022-01-19 22:51:46', '2022-01-19 22:51:46'),
(92, '1_1642661702006.jpg', 1, NULL, 1, 1, 'jpg', '/image', '2022-01-19 22:55:02', '2022-01-19 22:55:02'),
(93, '1_1642661841424.jpg', 1, NULL, 1, 1, 'jpg', '/image', '2022-01-19 22:57:21', '2022-01-19 22:57:21'),
(94, '1_1644550460594.jpg', 1, NULL, 1, 1, 'jpg', '/image', '2022-02-10 19:34:20', '2022-02-10 19:34:20'),
(95, '1_1644550623747.jpg', 1, NULL, 1, 1, 'jpg', '/image', '2022-02-10 19:37:03', '2022-02-10 19:37:03'),
(96, '1_1644550950361.jpg', 1, NULL, 1, 1, 'jpg', '/image', '2022-02-10 19:42:30', '2022-02-10 19:42:30'),
(97, '1_1644551091217.jpg', 1, NULL, 1, 1, 'jpg', '/image', '2022-02-10 19:44:51', '2022-02-10 19:44:51'),
(98, '1_1644551837227.png', 1, NULL, 1, 1, 'png', '/image', '2022-02-10 19:57:17', '2022-02-10 19:57:17'),
(99, '1_1644551903294.jpg', 1, NULL, 1, 1, 'jpg', '/image', '2022-02-10 19:58:23', '2022-02-10 19:58:23'),
(100, '1_1644552356888.jpg', 1, NULL, 1, 1, 'jpg', '/image', '2022-02-10 20:05:56', '2022-02-10 20:05:56'),
(101, '1_1644552428296.png', 1, NULL, 1, 1, 'png', '/image', '2022-02-10 20:07:08', '2022-02-10 20:07:08'),
(102, '1_1644570867450.jpg', 1, NULL, 1, 1, 'jpg', '/image', '2022-02-11 01:14:27', '2022-02-11 01:14:27'),
(103, '1_1644570948289.jpg', 1, NULL, 1, 1, 'jpg', '/image', '2022-02-11 01:15:48', '2022-02-11 01:15:48'),
(104, '1_1644572706501.png', 1, NULL, 1, 1, 'png', '/image', '2022-02-11 01:45:06', '2022-02-11 01:45:06'),
(105, '1_1644573427702.jpg', 1, NULL, 1, 1, 'jpg', '/image', '2022-02-11 01:57:07', '2022-02-11 01:57:07'),
(106, '1_1644648418671.jpg', 1, NULL, 1, 1, 'jpg', '/image', '2022-02-11 22:46:58', '2022-02-11 22:46:58'),
(107, 'hero-banner.jpg', 1, 'hero-banner', 1, 1, 'jpg', '/banner', NULL, NULL),
(110, '1647248815761.jpg', 1, NULL, 1, 1, 'jpg', '/banner', '2022-03-14 03:06:55', '2022-03-14 03:06:55'),
(111, '1647249123317.jpg', 1, NULL, 1, 1, 'jpg', '/banner', '2022-03-14 03:12:03', '2022-03-14 03:12:03'),
(112, '1647249429795.jpg', 1, NULL, 1, 1, 'jpg', '/image', '2022-03-14 03:17:09', '2022-03-14 03:17:09'),
(113, '1647249597768.png', 1, NULL, 1, 1, 'png', '/image', '2022-03-14 03:19:57', '2022-03-14 03:19:57'),
(114, '1647249746602.png', 1, NULL, 1, 1, 'png', '/image', '2022-03-14 03:22:26', '2022-03-14 03:22:26'),
(115, '1_1647250072162.png', 1, NULL, 1, 1, 'png', '/image', '2022-03-14 03:27:52', '2022-03-14 03:27:52'),
(117, '1647250442375.png', 1, NULL, 1, 1, 'png', '/banner', '2022-03-14 03:34:02', '2022-03-14 03:34:02'),
(118, '1647250631929.png', 1, NULL, 1, 1, 'png', '/banner', '2022-03-14 03:37:11', '2022-03-14 03:37:11'),
(119, '1647320767708.jpg', 1, NULL, 1, 1, 'jpg', '/banner', '2022-03-14 23:06:07', '2022-03-14 23:06:07'),
(120, '1647343485108.png', 1, NULL, 1, 1, 'png', '/image', '2022-03-15 05:24:45', '2022-03-15 05:24:45'),
(121, '1647343573793.png', 1, NULL, 1, 1, 'png', '/image', '2022-03-15 05:26:13', '2022-03-15 05:26:13'),
(122, '1647343573884.png', 1, NULL, 1, 1, 'png', '/image', '2022-03-15 05:26:13', '2022-03-15 05:26:13'),
(123, '1647343681115.png', 1, NULL, 1, 1, 'png', '/image', '2022-03-15 05:28:01', '2022-03-15 05:28:01'),
(124, '1647343681190.png', 1, NULL, 1, 1, 'png', '/image', '2022-03-15 05:28:01', '2022-03-15 05:28:01');

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `language` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `name`, `language`, `created_at`, `updated_at`) VALUES
(1, 'English', 'en', '2021-12-20 01:22:13', '2021-12-20 01:22:13'),
(2, 'Bangla', 'bn', '2022-01-12 23:18:06', '2022-01-12 23:18:06');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'admin', NULL, NULL),
(2, 'businessuser', NULL, NULL),
(3, 'customer', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `menu_items`
--

CREATE TABLE `menu_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `menu_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `route` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `model_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `module_id` int(11) DEFAULT NULL,
  `language_key` int(11) DEFAULT NULL,
  `language_file_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT 1 COMMENT '1=active,2=inactive',
  `order` int(11) NOT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menu_items`
--

INSERT INTO `menu_items` (`id`, `menu_id`, `title`, `route`, `model_name`, `icon`, `parent_id`, `module_id`, `language_key`, `language_file_name`, `status`, `order`, `key`, `created_at`, `updated_at`) VALUES
(1, 1, 'dashboard', 'home', NULL, 'fas fa-align-right', NULL, 0, NULL, 'menuitems', 1, 1, NULL, NULL, NULL),
(2, 1, 'customers', 'home', NULL, 'fas fa-align-right', NULL, 0, NULL, 'menuitems', 1, 2, NULL, NULL, NULL),
(3, 1, 'business_customer', 'home', NULL, 'fas fa-align-right', NULL, 0, NULL, 'menuitems', 1, 3, NULL, NULL, NULL),
(5, 1, 'category', 'admin.category', NULL, 'fas fa-align-right', NULL, 0, NULL, 'menuitems', 1, 5, NULL, NULL, NULL),
(6, 1, 'settings', 'admin.setting', NULL, 'fas fa-align-right', NULL, 0, NULL, 'menuitems', 1, 6, NULL, NULL, NULL),
(7, 1, 'other', 'home', NULL, 'fas fa-align-right', NULL, 0, NULL, 'menuitems', 2, 7, NULL, NULL, NULL),
(27, 1, 'product_mangment', NULL, 'Product_info', 'fab fa-alipay', NULL, NULL, NULL, 'menuitems', 1, 4, NULL, '2021-12-28 04:06:48', '2022-01-17 00:06:37'),
(28, 1, 'product', 'admin.product', 'Product_info', 'fas fa-align-right', '27', NULL, NULL, 'menuitems', 1, 0, NULL, '2021-12-28 04:33:03', '2021-12-28 04:33:03'),
(29, 1, 'halal_managment', 'admin.halal', 'Hala_info', 'fab fa-adn', '27', NULL, NULL, 'menuitems', 1, 0, NULL, '2021-12-28 23:29:21', '2022-01-16 23:28:02'),
(30, 1, 'unit', 'admin.unit', 'Unit_info', 'fas fa-align-right', '27', NULL, NULL, 'menuitems', 1, 0, NULL, '2021-12-28 23:32:02', '2021-12-28 23:32:02'),
(31, 1, 'band_managment', 'admin.band', 'Band_info', 'fas fa-align-right', '27', NULL, NULL, 'menuitems', 1, 0, NULL, '2021-12-28 23:42:21', '2021-12-28 23:42:21'),
(32, 1, 'supplier_management', 'admin.supplier', 'Supplier_info', 'fas fa-align-right', '27', NULL, NULL, 'menuitems', 1, 0, NULL, '2021-12-28 23:57:35', '2021-12-28 23:57:35'),
(33, 1, 'division', 'admin.div', 'Division', 'fas fa-align-right', '27', NULL, NULL, 'menuitems', 1, 0, NULL, '2021-12-29 00:08:45', '2021-12-29 00:08:45'),
(34, 1, 'department', 'admin.dept', 'Department', 'fas fa-align-right', '27', NULL, NULL, 'menuitems', 1, 0, NULL, '2021-12-29 00:17:15', '2021-12-29 00:17:15'),
(35, 1, 'user_setting', NULL, NULL, 'fas fa-align-right', NULL, NULL, NULL, 'menuitems', 1, 8, NULL, '2022-01-12 05:00:31', '2022-01-12 05:00:31'),
(36, 1, 'order_management', NULL, 'order', 'fas fa-align-right', NULL, NULL, NULL, 'menuitems', 1, 9, NULL, '2022-02-02 21:08:23', '2022-02-02 21:08:23'),
(37, 1, 'order', 'admin.order', 'order', 'fas fa-align-right', '36', NULL, NULL, 'menuitems', 1, 0, NULL, '2022-02-02 21:25:53', '2022-02-02 21:25:53'),
(38, 1, 'setting_order', 'admin.setting.order', 'order', 'fas fa-align-right', '36', NULL, NULL, 'menuitems', 1, 0, NULL, '2022-02-02 21:27:19', '2022-02-02 21:27:19'),
(39, 1, 'product_class', 'admin.class', 'Product_class', 'fab fa-angrycreative', '27', NULL, NULL, 'menuitems', 1, 0, NULL, '2022-02-28 23:12:04', '2022-02-28 23:12:04'),
(40, 1, 'front_end_tools_setting', NULL, 'frontendController', 'fas fa-arrow-alt-circle-right', NULL, NULL, NULL, 'menuitems', 1, 10, NULL, '2022-03-13 21:13:52', '2022-03-13 21:15:02'),
(41, 1, 'sider_setting', 'admin.sider', 'Silder_and_other_banner', 'fab fa-blackberry', '40', NULL, NULL, 'menuitems', 1, 0, NULL, '2022-03-13 21:19:53', '2022-03-13 21:19:53'),
(42, 1, 'app_setting', 'admin.app_setting', 'App_setting', 'fas fa-atlas', '40', NULL, NULL, 'menuitems', 1, 0, NULL, '2022-03-15 02:31:21', '2022-03-15 02:31:21'),
(43, 1, 'discount_management', NULL, 'Product_info', 'fas fa-bullhorn', NULL, NULL, NULL, 'menuitems', 1, 11, NULL, '2022-03-16 02:43:43', '2022-03-16 02:43:43'),
(44, 1, 'weekly_deal_management', 'admin.weekydeals', 'Weekly_deal', 'fab fa-blackberry', '43', NULL, NULL, 'menuitems', 1, 12, NULL, '2022-03-21 22:08:26', '2022-03-24 06:15:12');

-- --------------------------------------------------------

--
-- Table structure for table `menu_role`
--

CREATE TABLE `menu_role` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_item_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(12, '2021_12_06_094116_create_admin_users_table', 3),
(15, '2021_12_10_041817_create_table_menu', 4),
(17, '2021_12_06_094020_create_category_infos_table', 5),
(18, '2021_12_10_041901_create_table_menu_items', 5),
(19, '2021_12_06_093724_create_country_infos_table', 6),
(20, '2018_08_29_200844_create_languages_table', 7),
(21, '2018_08_29_205156_create_translations_table', 7),
(22, '2021_12_22_053742_create_image_table', 8),
(23, '2021_12_22_054134_create_other_image_table', 8),
(24, '2021_12_06_093840_create_business_type_infos_table', 9),
(25, '2021_12_06_093851_create_business_user_infos_table', 9),
(26, '2021_12_06_093926_create_sales_team_infos_table', 9),
(27, '2021_12_06_094032_create_product_infos_table', 9),
(28, '2021_12_28_043308_create_unit_info_table', 9),
(29, '2021_12_28_043359_create_band_info_table', 10),
(30, '2021_12_28_043433_create_supplier_info_table', 10),
(37, '2021_12_28_043504_create_varient_info_table', 11),
(38, '2021_12_28_043543_create_halal_info_table', 11),
(39, '2021_12_28_043620_create_hala_details_table', 11),
(40, '2021_12_28_043729_create_div_info_table', 11),
(41, '2021_12_28_043754_create_dept_info_table', 11),
(42, '2021_12_28_043828_create_product_price_details_table', 11),
(43, '2022_01_13_082131_create_roles_table', 12),
(44, '2022_01_13_082201_create_permissions_table', 12),
(45, '2022_01_13_082246_create_permission_roles_table', 12),
(46, '2022_01_13_082421_create_menu_role_table', 12),
(47, '2022_01_13_083233_create_submenu_table', 13),
(56, '2017_06_26_000000_create_shopping_cart_table', 14),
(57, '2021_12_06_093806_create_address_infos_table', 14),
(58, '2022_01_28_050031_create_shoping_cart', 14),
(59, '2022_01_28_050154_create_orders_table', 14),
(60, '2022_01_28_050336_create_shopingcartdetails_table', 15),
(61, '2022_01_28_050359_create_orderdetails_table', 15),
(62, '2022_01_28_063052_create_orderstatuses_table', 15),
(63, '2022_01_28_065245_create_paymentmethods_table', 16);

-- --------------------------------------------------------

--
-- Table structure for table `orderdetails`
--

CREATE TABLE `orderdetails` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `varient_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `supplier_id` int(11) DEFAULT NULL,
  `payment_id` int(11) DEFAULT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `return_id` int(10) UNSIGNED DEFAULT NULL,
  `stock_load_id` int(10) UNSIGNED DEFAULT NULL,
  `price` double(10,4) NOT NULL,
  `other` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount` double(10,4) DEFAULT NULL,
  `qty` int(11) NOT NULL,
  `delivery_id` int(10) UNSIGNED DEFAULT NULL,
  `is_seen_by_supplier` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orderdetails`
--

INSERT INTO `orderdetails` (`id`, `varient_id`, `product_id`, `supplier_id`, `payment_id`, `order_id`, `return_id`, `stock_load_id`, `price`, `other`, `discount`, `qty`, `delivery_id`, `is_seen_by_supplier`, `created_at`, `updated_at`) VALUES
(16, 2, 24, 1, 2, 17, NULL, NULL, 39.6000, NULL, 4.4000, 2, NULL, 0, '2022-02-25 00:30:32', '2022-02-25 00:30:32'),
(17, 3, 26, 8, 2, 17, NULL, NULL, 11.0000, NULL, 0.0000, 2, NULL, 0, '2022-02-25 00:30:32', '2022-02-25 00:30:32');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `payment_id` int(10) UNSIGNED DEFAULT NULL,
  `admin_id` int(10) UNSIGNED DEFAULT NULL,
  `shipaddress_id` int(10) UNSIGNED DEFAULT NULL,
  `billingaddress_id` int(10) UNSIGNED DEFAULT NULL,
  `delivery_id` int(10) UNSIGNED DEFAULT NULL,
  `orderstatus_id` int(10) UNSIGNED DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ip_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_paid` tinyint(1) NOT NULL DEFAULT 0,
  `is_completed` tinyint(1) NOT NULL DEFAULT 0,
  `is_seen_by_admin` tinyint(1) NOT NULL DEFAULT 0,
  `is_delivered` tinyint(1) NOT NULL DEFAULT 0,
  `transaction_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_from` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_ip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_sku` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount_p` double(10,4) DEFAULT NULL,
  `promo_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `promo_code_id` int(11) DEFAULT NULL,
  `total` double(10,4) DEFAULT NULL,
  `card_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `payment_id`, `admin_id`, `shipaddress_id`, `billingaddress_id`, `delivery_id`, `orderstatus_id`, `email`, `ip_address`, `is_paid`, `is_completed`, `is_seen_by_admin`, `is_delivered`, `transaction_id`, `order_from`, `order_note`, `order_ip`, `order_sku`, `discount_p`, `promo_code`, `promo_code_id`, `total`, `card_id`, `created_at`, `updated_at`) VALUES
(17, 1, 1, NULL, 2, 2, NULL, 1, NULL, NULL, 0, 0, 0, 0, NULL, 'Api', NULL, NULL, '25899709712696277202', 2.0500, 'x20000', 1, 10.0000, 2, '2022-02-25 00:30:32', '2022-02-25 00:30:32');

-- --------------------------------------------------------

--
-- Table structure for table `orderstatuses`
--

CREATE TABLE `orderstatuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `language_file_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orderstatuses`
--

INSERT INTO `orderstatuses` (`id`, `name`, `language_file_name`, `description`, `type`, `created_at`, `updated_at`) VALUES
(1, 'pending', 'status', 'pending', 1, NULL, NULL),
(2, 'Delivery', NULL, NULL, NULL, '2022-02-03 02:29:13', '2022-02-03 02:29:13');

-- --------------------------------------------------------

--
-- Table structure for table `other_image`
--

CREATE TABLE `other_image` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `object_id` int(10) UNSIGNED NOT NULL,
  `image_id` int(10) UNSIGNED NOT NULL,
  `object_type` int(11) NOT NULL DEFAULT 1 COMMENT '1=not use yet,2=category,3=product,4=offer,5=slider',
  `object_status` int(11) DEFAULT NULL COMMENT 'which will by provide own object as comment modal',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `other_image`
--

INSERT INTO `other_image` (`id`, `object_id`, `image_id`, `object_type`, `object_status`, `created_at`, `updated_at`) VALUES
(34, 20, 48, 2, 1, '2022-01-17 04:03:30', '2022-01-17 04:03:30'),
(35, 21, 49, 2, 1, '2022-01-17 04:04:57', '2022-01-17 04:04:57'),
(36, 22, 50, 2, 1, '2022-01-17 04:05:42', '2022-01-17 04:05:42'),
(37, 23, 51, 2, 1, '2022-01-17 04:06:38', '2022-01-17 04:06:38'),
(38, 24, 52, 2, 1, '2022-01-17 04:07:21', '2022-01-17 04:07:21'),
(39, 25, 53, 2, 1, '2022-01-17 04:08:39', '2022-01-17 04:08:39'),
(40, 26, 54, 2, 1, '2022-01-17 04:09:22', '2022-01-17 04:09:22'),
(41, 27, 55, 2, 1, '2022-01-17 04:10:06', '2022-01-17 04:10:06'),
(42, 24, 56, 3, 1, '2022-01-17 04:24:57', '2022-01-17 04:24:57'),
(43, 24, 57, 3, 1, '2022-01-17 04:24:57', '2022-01-17 04:24:57'),
(44, 2, 58, 9, 1, '2022-01-17 04:26:53', '2022-01-17 04:26:53'),
(45, 4, 59, 6, 1, '2022-01-17 04:31:38', '2022-01-17 04:31:38'),
(46, 28, 60, 2, 1, '2022-01-17 21:20:29', '2022-01-17 21:20:29'),
(47, 29, 61, 2, 1, '2022-01-18 19:21:45', '2022-01-18 19:21:45'),
(48, 30, 62, 2, 1, '2022-01-18 19:27:00', '2022-01-18 19:27:00'),
(49, 2, 63, 8, 1, '2022-01-18 19:32:17', '2022-01-18 19:32:17'),
(50, 3, 64, 8, 1, '2022-01-18 20:43:30', '2022-01-18 20:43:30'),
(51, 4, 65, 8, 1, '2022-01-18 20:43:31', '2022-01-18 20:43:31'),
(52, 5, 66, 8, 1, '2022-01-18 20:46:05', '2022-01-18 20:46:05'),
(53, 6, 67, 8, 1, '2022-01-18 20:46:07', '2022-01-18 20:46:07'),
(54, 7, 68, 8, 1, '2022-01-18 20:48:29', '2022-01-18 20:48:29'),
(55, 2, 69, 7, 1, '2022-01-18 20:51:09', '2022-01-18 20:51:09'),
(56, 3, 70, 7, 1, '2022-01-18 20:52:59', '2022-01-18 20:52:59'),
(57, 4, 71, 7, 1, '2022-01-18 20:54:52', '2022-01-18 20:54:52'),
(58, 5, 72, 6, 1, '2022-01-18 20:57:39', '2022-01-18 20:57:39'),
(59, 6, 73, 6, 1, '2022-01-18 21:00:34', '2022-01-18 21:00:34'),
(60, 7, 74, 6, 1, '2022-01-18 21:02:54', '2022-01-18 21:02:54'),
(61, 8, 75, 8, 1, '2022-01-18 21:13:32', '2022-01-18 21:13:32'),
(62, 9, 76, 8, 1, '2022-01-18 21:15:19', '2022-01-18 21:15:19'),
(63, 10, 77, 8, 1, '2022-01-18 21:16:57', '2022-01-18 21:16:57'),
(64, 11, 78, 8, 1, '2022-01-18 21:18:25', '2022-01-18 21:18:25'),
(65, 25, 79, 3, 1, '2022-01-18 21:57:20', '2022-01-18 21:57:20'),
(66, 5, 80, 7, 1, '2022-01-19 21:55:59', '2022-01-19 21:55:59'),
(67, 6, 81, 7, 1, '2022-01-19 21:57:42', '2022-01-19 21:57:42'),
(68, 7, 82, 7, 1, '2022-01-19 22:02:58', '2022-01-19 22:02:58'),
(69, 26, 83, 3, 1, '2022-01-19 22:06:14', '2022-01-19 22:06:14'),
(70, 27, 84, 3, 1, '2022-01-19 22:27:35', '2022-01-19 22:27:35'),
(71, 28, 85, 3, 1, '2022-01-19 22:30:50', '2022-01-19 22:30:50'),
(72, 29, 86, 3, 1, '2022-01-19 22:34:35', '2022-01-19 22:34:35'),
(73, 30, 87, 3, 1, '2022-01-19 22:40:57', '2022-01-19 22:40:57'),
(74, 31, 88, 3, 1, '2022-01-19 22:43:56', '2022-01-19 22:43:56'),
(75, 32, 89, 3, 1, '2022-01-19 22:46:13', '2022-01-19 22:46:13'),
(76, 33, 90, 3, 1, '2022-01-19 22:48:31', '2022-01-19 22:48:31'),
(77, 34, 91, 3, 1, '2022-01-19 22:51:46', '2022-01-19 22:51:46'),
(78, 3, 92, 9, 1, '2022-01-19 22:55:02', '2022-01-19 22:55:02'),
(79, 4, 93, 9, 1, '2022-01-19 22:57:21', '2022-01-19 22:57:21'),
(80, 35, 94, 3, 1, '2022-02-10 19:34:20', '2022-02-10 19:34:20'),
(81, 5, 95, 9, 1, '2022-02-10 19:37:03', '2022-02-10 19:37:03'),
(82, 36, 96, 3, 1, '2022-02-10 19:42:30', '2022-02-10 19:42:30'),
(83, 6, 97, 9, 1, '2022-02-10 19:44:51', '2022-02-10 19:44:51'),
(84, 37, 98, 3, 1, '2022-02-10 19:57:17', '2022-02-10 19:57:17'),
(85, 7, 99, 9, 1, '2022-02-10 19:58:23', '2022-02-10 19:58:23'),
(86, 38, 100, 3, 1, '2022-02-10 20:05:56', '2022-02-10 20:05:56'),
(87, 8, 101, 9, 1, '2022-02-10 20:07:08', '2022-02-10 20:07:08'),
(88, 39, 102, 3, 1, '2022-02-11 01:14:27', '2022-02-11 01:14:27'),
(89, 9, 103, 9, 1, '2022-02-11 01:15:48', '2022-02-11 01:15:48'),
(90, 40, 104, 3, 1, '2022-02-11 01:45:06', '2022-02-11 01:45:06'),
(91, 10, 105, 9, 1, '2022-02-11 01:57:07', '2022-02-11 01:57:07'),
(92, 41, 106, 3, 1, '2022-02-11 22:46:58', '2022-02-11 22:46:58'),
(93, 1, 107, 5, 1, NULL, NULL),
(96, 5, 110, 5, 1, '2022-03-14 03:06:55', '2022-03-14 03:06:55'),
(97, 8, 111, 5, 1, '2022-03-14 03:12:03', '2022-03-14 03:12:03'),
(98, 9, 112, 5, 1, '2022-03-14 03:17:09', '2022-03-14 03:17:09'),
(99, 10, 113, 5, 1, '2022-03-14 03:19:57', '2022-03-14 03:19:57'),
(100, 11, 114, 5, 1, '2022-03-14 03:22:26', '2022-03-14 03:22:26'),
(101, 42, 115, 3, 1, '2022-03-14 03:27:52', '2022-03-14 03:27:52'),
(102, 16, 116, 5, 1, '2022-03-14 03:31:20', '2022-03-14 03:31:20'),
(103, 18, 117, 5, 1, '2022-03-14 03:34:02', '2022-03-14 03:34:02'),
(104, 19, 118, 5, 1, '2022-03-14 03:37:12', '2022-03-14 03:37:12'),
(105, 22, 119, 5, 1, '2022-03-14 23:06:07', '2022-03-14 23:06:07');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `id` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_opt` bigint(10) NOT NULL,
  `start_date_time` bigint(30) DEFAULT NULL,
  `end_date_time` bigint(30) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`id`, `email`, `token`, `email_opt`, `start_date_time`, `end_date_time`, `created_at`, `updated_at`) VALUES
(13, 'jasim.iovision@gmail.com', '_V$rquQgS1FcB6Y_pm9bLh8g5BidNO$C1CVS', 640461, 1646283712, 1646284312, '2022-03-02 23:01:52', '2022-03-02 23:01:52');

-- --------------------------------------------------------

--
-- Table structure for table `paymentmethods`
--

CREATE TABLE `paymentmethods` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `language_file_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_id` int(10) UNSIGNED DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '1=icon,2=image,3=image_gallary',
  `route` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `setting_route` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `setting_modal_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `paymentmethods`
--

INSERT INTO `paymentmethods` (`id`, `name`, `language_file_name`, `icon`, `image_id`, `image`, `status`, `route`, `setting_route`, `setting_modal_name`, `created_at`, `updated_at`) VALUES
(1, 'cash', 'title', NULL, NULL, 'cash.png', 1, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `submenu_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permission_roles`
--

CREATE TABLE `permission_roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `permission_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
-- Table structure for table `product_classes`
--

CREATE TABLE `product_classes` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `number` bigint(10) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_classes`
--

INSERT INTO `product_classes` (`id`, `name`, `number`, `description`, `created_at`, `updated_at`) VALUES
(1, 'testing start date', 23, 'tfsdf', '2022-02-28 23:44:04', '2022-02-28 23:44:04');

-- --------------------------------------------------------

--
-- Table structure for table `product_class_groupclasses`
--

CREATE TABLE `product_class_groupclasses` (
  `id` int(11) NOT NULL,
  `class_id` int(10) NOT NULL,
  `groupclass_id` int(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_class_groupclasses`
--

INSERT INTO `product_class_groupclasses` (`id`, `class_id`, `groupclass_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2022-03-01 00:37:17', '2022-03-01 00:37:17');

-- --------------------------------------------------------

--
-- Table structure for table `product_groupclasses`
--

CREATE TABLE `product_groupclasses` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `number` bigint(10) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_groupclasses`
--

INSERT INTO `product_groupclasses` (`id`, `name`, `number`, `description`, `created_at`, `updated_at`) VALUES
(1, 'tst', 23, 'sdf', '2022-03-01 00:37:17', '2022-03-01 00:37:17');

-- --------------------------------------------------------

--
-- Table structure for table `product_infos`
--

CREATE TABLE `product_infos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit_id` int(10) UNSIGNED NOT NULL,
  `unit_qty` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `online_display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `online_key_information` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_info_id` int(10) UNSIGNED NOT NULL,
  `item_gross_weight` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `item_weight_unit_id` int(10) UNSIGNED DEFAULT NULL,
  `item_length` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `item_width` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `item_height` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ingrdients` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `storage` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nutrition_fact` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `preparation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `per_serving_measure` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `per_serving_measure_unit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_expiry_data_rquired` tinyint(4) DEFAULT NULL,
  `period_indicatore_of_self_life` tinyint(4) DEFAULT NULL,
  `odd_shape_article` tinyint(4) DEFAULT NULL,
  `hala` tinyint(4) DEFAULT NULL,
  `organic` tinyint(4) DEFAULT NULL,
  `healthier_choice` tinyint(4) DEFAULT NULL,
  `healther_drink` tinyint(4) DEFAULT NULL,
  `dept_id` int(10) UNSIGNED DEFAULT NULL,
  `halal_info_details_id` int(10) UNSIGNED DEFAULT NULL,
  `band_info_id` int(10) UNSIGNED DEFAULT NULL,
  `supplier_info_id` int(10) UNSIGNED DEFAULT NULL,
  `food_info_details_id` int(10) UNSIGNED DEFAULT NULL,
  `country_id` int(10) UNSIGNED DEFAULT NULL,
  `p_discount` int(3) DEFAULT 0,
  `p_discount_type` int(2) DEFAULT 1 COMMENT '1;partage 2:fixit',
  `create_by` int(10) UNSIGNED DEFAULT NULL,
  `update_by` int(10) UNSIGNED DEFAULT NULL,
  `owner_id` int(10) UNSIGNED DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1=active,2=Inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_infos`
--

INSERT INTO `product_infos` (`id`, `product_name`, `product_number`, `unit_id`, `unit_qty`, `online_display_name`, `online_key_information`, `category_info_id`, `item_gross_weight`, `item_weight_unit_id`, `item_length`, `item_width`, `item_height`, `ingrdients`, `storage`, `nutrition_fact`, `preparation`, `per_serving_measure`, `per_serving_measure_unit`, `no_expiry_data_rquired`, `period_indicatore_of_self_life`, `odd_shape_article`, `hala`, `organic`, `healthier_choice`, `healther_drink`, `dept_id`, `halal_info_details_id`, `band_info_id`, `supplier_info_id`, `food_info_details_id`, `country_id`, `p_discount`, `p_discount_type`, `create_by`, `update_by`, `owner_id`, `status`, `created_at`, `updated_at`) VALUES
(24, 'product -1', '0001', 1, '2', 'product -1', 'product -1', 27, '5', 1, '5', '7', '5', 'test', 'test', 'sfs', 'sfds', NULL, NULL, 2, NULL, 2, 2, 1, 2, 2, NULL, NULL, 2, NULL, NULL, 1, 0, 1, NULL, NULL, NULL, 1, '2022-01-17 04:24:57', '2022-01-17 04:24:57'),
(25, 'Pokka Houjicha', '25', 3, '250', 'Pokka Houjicha No Sugar Drink', 'Pokka Houjicha is brewed with 100-percent Japanese tea leaves and roasted to perfection. We bring you the authentic taste and rich heritage of Japanese tea. The naturally lower caffeine makes it suitable to drink during any time of the day.', 30, NULL, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, 1, 1, 1, NULL, NULL, 2, NULL, NULL, 7, 0, 1, NULL, NULL, NULL, 1, '2022-01-18 21:57:19', '2022-01-18 21:57:19'),
(26, 'Blood Orange', '26', 1, '1', 'Australian Blood Orange', 'Sweet taste and vivid color of blood oranges make them a great addition to desserts, breakfasts, and even savory dishes.', 21, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 2, 1, 1, 1, NULL, NULL, NULL, 5, NULL, NULL, 6, 0, 1, NULL, NULL, NULL, 1, '2022-01-19 22:06:14', '2022-01-19 22:06:14'),
(27, 'Vegetable Chips', '27', 2, '1', 'Vegetable Chips, Gluten Free', 'This pack contains sea salt flavor and is free of GMO with 30% less fat than common veggie chips.', 22, '75', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, 2, 1, 2, 1, 2, NULL, NULL, 7, NULL, NULL, 6, 0, 1, NULL, NULL, NULL, 1, '2022-01-19 22:27:35', '2022-01-19 22:27:35'),
(28, 'Onion Shoots', '28', 2, '1', 'Shallot Onion Shoots', '100% organic and properly washed', 22, '250', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, 2, 1, 1, 1, 2, NULL, NULL, 6, NULL, NULL, 6, 0, 1, NULL, NULL, NULL, 1, '2022-01-19 22:30:49', '2022-01-19 22:30:49'),
(29, 'Veggie Sausage Rolls', '29', 2, '1', 'Veggie Sausage Rolls by SnacksDaily', 'Party-sized, veggie sausage rolls', 23, '500', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, 2, 1, 1, 1, 2, NULL, NULL, 7, NULL, NULL, 6, 0, 1, NULL, NULL, NULL, 1, '2022-01-19 22:34:35', '2022-01-19 22:34:35'),
(30, 'Egg Products', '30', 6, '1', 'All Natural Egg Products', 'Each NestFresh egg product that bears the Non-GMO Project Verified seal comes from cage free, free-range hens fed a diet of non-GMO grains.', 24, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, 2, 1, 1, 1, 2, NULL, NULL, 6, NULL, NULL, 6, 0, 1, NULL, NULL, NULL, 1, '2022-01-19 22:40:56', '2022-01-19 22:40:56'),
(31, 'Cinnamon', '31', 2, '1', 'Cinnamon Quills', 'Whole dried cinnamon quills', 25, '250', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, 2, 1, 1, 1, 2, NULL, NULL, 6, NULL, NULL, 6, 0, 1, NULL, NULL, NULL, 1, '2022-01-19 22:43:56', '2022-01-19 22:43:56'),
(32, 'Chili Powder', '32', 2, '1', 'Chili Seasoning', 'Dried and ground into powder', 25, '200', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, 2, 1, 1, 1, 2, NULL, NULL, 6, NULL, NULL, 7, 0, 1, NULL, NULL, NULL, 1, '2022-01-19 22:46:13', '2022-01-19 22:46:13'),
(33, 'Sweet Basil', '33', 2, '1', 'Rubbed Sweet Basil', 'Dried and rubbed into flakes', 22, '500', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, 2, 1, 1, 1, 2, NULL, NULL, 6, NULL, NULL, 8, 0, 1, NULL, NULL, NULL, 1, '2022-01-19 22:48:31', '2022-01-19 22:48:31'),
(34, 'Frozen Paratha', '34', 7, '25', 'Frozen Plain Paratha', 'The paratha has a flaky, layered texture and a wonderful aroma guaranteed to please any appetite.', 23, '1000', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, 2, 1, 1, 1, 2, NULL, NULL, 7, NULL, NULL, 2, 0, 1, NULL, NULL, NULL, 1, '2022-01-19 22:51:46', '2022-01-19 22:51:46'),
(35, 'Har Mee', '35', 8, '1', 'Her Mee', 'Ibumie Penang Har Mee Instant Noodles.', 20, '500', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 7, NULL, NULL, 7, 0, 1, NULL, NULL, NULL, 1, '2022-02-10 19:34:20', '2022-02-10 19:34:20'),
(36, 'Rambutan', '36', 1, '1', 'Rambutan', 'Rambutan is a medium-sized tropical tree in the family Sapindaceae. The name also refers to the edible fruit produced by this tree.', 21, '1', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, NULL, NULL, 6, 0, 1, NULL, NULL, NULL, 1, '2022-02-10 19:42:30', '2022-02-10 19:42:30'),
(37, 'Brown Sugar', '37', 8, '1', 'Light Brown Sugar', 'Brown sugar contains multiple micronutrients such as iron, calcium, potassium, zinc, copper, phosphorus, and vitamin B-6, which are essential for a healthy functioning body.', 28, '500', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 6, NULL, NULL, 7, 0, 1, NULL, NULL, NULL, 1, '2022-02-10 19:57:17', '2022-02-10 19:57:17'),
(38, 'Salad Greens', '38', 8, '1', 'Fresh Salad Greens', 'Salad greens contain Vitamin A, Vitamin C, beta-carotene, calcium, folate, fiber, and phytonutrients.', 22, '250', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 6, NULL, NULL, 6, 0, 1, NULL, NULL, NULL, 1, '2022-02-10 20:05:56', '2022-02-10 20:05:56'),
(39, 'Carbonated Drinks', '39', 9, '1', 'Carbonated Ramune Drinks', 'A carbonated drink enhances digestion by improving swallowing ability and reducing constipation. It\'s also a calorie-free beverage that causes a pleasurable bubbly sensation.', 30, '500', 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, 6, 0, 1, NULL, NULL, NULL, 1, '2022-02-11 01:14:27', '2022-02-11 01:14:27'),
(40, 'Chicken Eggs', '40', 10, '1', 'Chicken Eggs (White)', 'Chicken eggs produced by healthy pasture-raised hens.', 24, '12', 7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 6, NULL, NULL, NULL, 0, 1, NULL, NULL, NULL, 1, '2022-02-11 01:45:06', '2022-02-11 01:45:06'),
(41, 'Bread', '41', 8, '1', 'Bread', 'This is a bread', 28, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, 2, 1, 1, NULL, 2, NULL, NULL, 7, NULL, NULL, 6, 0, 1, NULL, NULL, NULL, 1, '2022-02-11 22:46:58', '2022-02-11 22:46:58'),
(42, 'tsdfsf', '42', 1, '10', 'sdfssdf sdfsfs', 'sdfsf', 20, '3', 1, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, 6, 0, 1, NULL, NULL, NULL, 1, '2022-03-14 03:27:52', '2022-03-14 03:27:52');

-- --------------------------------------------------------

--
-- Table structure for table `product_price_details`
--

CREATE TABLE `product_price_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_info_id` int(10) UNSIGNED NOT NULL,
  `varient_info_id` int(10) UNSIGNED NOT NULL,
  `supplier_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `promotion_infos`
--

CREATE TABLE `promotion_infos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `p_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `up_rang` int(11) DEFAULT NULL,
  `min_rang` int(11) DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `re_n_status` int(11) DEFAULT NULL,
  `require_number` int(11) DEFAULT NULL,
  `discount_amount` double(10,4) DEFAULT NULL,
  `discount_type` int(11) DEFAULT 1 COMMENT '1:practange 2:fixit',
  `start_date` timestamp NULL DEFAULT NULL,
  `end_date` timestamp NULL DEFAULT NULL,
  `depen_status` int(11) DEFAULT NULL,
  `dep_type` int(11) DEFAULT NULL,
  `other_type` int(11) DEFAULT NULL,
  `rules_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `promotion_infos`
--

INSERT INTO `promotion_infos` (`id`, `p_code`, `up_rang`, `min_rang`, `type`, `status`, `re_n_status`, `require_number`, `discount_amount`, `discount_type`, `start_date`, `end_date`, `depen_status`, `dep_type`, `other_type`, `rules_id`, `created_at`, `updated_at`) VALUES
(1, 'x20000', NULL, NULL, NULL, 1, NULL, NULL, 10.0000, 1, '2022-02-25 01:55:09', '2022-03-03 01:55:09', NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `promotion_info_details`
--

CREATE TABLE `promotion_info_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `object_id` int(11) DEFAULT NULL,
  `prom_id` int(11) DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `create_by` int(11) DEFAULT NULL,
  `update_by` int(11) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sales_team_infos`
--

CREATE TABLE `sales_team_infos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_id` int(10) UNSIGNED NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subsidairy_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `staff_id_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `commision_percentage` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1' COMMENT '1=active,2=inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `shopingcartdetails`
--

CREATE TABLE `shopingcartdetails` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cache_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shoping_cart_id` int(10) UNSIGNED DEFAULT NULL,
  `brand` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `varient_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `varient_id_value` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `qty` int(11) NOT NULL,
  `unit_details` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` double(10,4) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `other` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount` double(10,4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shopingcartdetails`
--

INSERT INTO `shopingcartdetails` (`id`, `cache_id`, `shoping_cart_id`, `brand`, `varient_id`, `varient_id_value`, `user_id`, `qty`, `unit_details`, `price`, `title`, `image`, `other`, `discount`, `created_at`, `updated_at`) VALUES
(69, 'vKOCjR4I*UnrevGGlAJAEPC*TzQApn$GU$2S7W3pT7JTm', 104, 'FruitSense', '36_6_9', 6, 1, 5, '1 kg', 9.2700, 'Rambutan Red Yellow Mixed', '/image/1_1644551091217.jpg', NULL, 1.0300, '2022-03-09 00:47:52', '2022-03-09 01:12:27'),
(70, 'f_gkJB9uXRMZ2hd0IHn4Y*oMmcCD3IlfPqoH2ifs979Y7', 116, 'FruitSense', '36_6_9', 6, NULL, 1, '1 kg', 9.2700, 'Rambutan Red Yellow Mixed', '/image/1_1644551091217.jpg', NULL, 1.0300, '2022-03-09 01:54:34', '2022-03-09 01:54:34'),
(72, 'jp1g2Pjfwad*Lcm4pVvPfOzzeBWzTK*BoX9e237j7_s41', 117, 'FruitSense', '36_6_9', 6, NULL, 1, '1 kg', 9.2700, 'Rambutan Red Yellow Mixed', '/image/1_1644551091217.jpg', NULL, 1.0300, '2022-03-10 01:04:23', '2022-03-10 01:04:23'),
(73, 'KNcDMvO599PCdf9JXDBy25kXhTloZhF4fA149$zcE6mau', 119, 'FruitSense', '26_3_8', 3, NULL, 1, '1 kg', 5.5000, 'Australian Blood Orange Malaysian', '/image/1_1642661702006.jpg', NULL, 0.0000, '2022-03-14 22:00:41', '2022-03-14 22:00:41'),
(74, 'KNcDMvO599PCdf9JXDBy25kXhTloZhF4fA149$zcE6mau', 119, 'Pokka', '24_2_1', 2, NULL, 1, '10 kg', 20.2400, 'product -1 product variant -1', '/image/1642415213843.png', NULL, 1.7600, '2022-03-15 00:38:52', '2022-03-15 00:38:52'),
(75, 'FQS3qT9jNhG90rBWC4W28UfTaTBh4_8Xhn3UX7YmHEF6c', 121, 'FruitSense', '36_6_9', 6, NULL, 2, '1 kg', 9.2700, 'Rambutan Red Yellow Mixed', '/image/1_1644551091217.jpg', NULL, 1.0300, '2022-03-16 01:45:57', '2022-03-16 01:45:57'),
(76, '0xoG8GyFTPSDCS1wEWMgFI22dvH8_rRyh8e5UPNyjIDuC', 122, 'FruitSense', '36_6_9', 6, NULL, 3, '1 kg', 9.2700, 'Rambutan Red Yellow Mixed', '/image/1_1644551091217.jpg', NULL, 1.0300, '2022-03-21 05:21:30', '2022-03-21 05:22:42');

-- --------------------------------------------------------

--
-- Table structure for table `shoping_cart`
--

CREATE TABLE `shoping_cart` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cache_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `user_ip` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shoping_cart`
--

INSERT INTO `shoping_cart` (`id`, `cache_id`, `user_id`, `user_ip`, `created_at`, `updated_at`) VALUES
(104, 'vKOCjR4I*UnrevGGlAJAEPC*TzQApn$GU$2S7W3pT7JTm', 1, NULL, '2022-03-09 00:47:52', '2022-03-09 01:11:00'),
(105, 'vKOCjR4I*UnrevGGlAJAEPC*TzQApn$GU$2S7W3pT7JTm', NULL, NULL, '2022-03-09 00:47:59', '2022-03-09 00:47:59'),
(106, 'vKOCjR4I*UnrevGGlAJAEPC*TzQApn$GU$2S7W3pT7JTm', NULL, NULL, '2022-03-09 00:53:50', '2022-03-09 00:53:50'),
(107, 'vKOCjR4I*UnrevGGlAJAEPC*TzQApn$GU$2S7W3pT7JTm', NULL, NULL, '2022-03-09 00:54:10', '2022-03-09 00:54:10'),
(108, 'vKOCjR4I*UnrevGGlAJAEPC*TzQApn$GU$2S7W3pT7JTm', NULL, NULL, '2022-03-09 01:00:23', '2022-03-09 01:00:23'),
(109, 'vKOCjR4I*UnrevGGlAJAEPC*TzQApn$GU$2S7W3pT7JTm', NULL, NULL, '2022-03-09 01:00:28', '2022-03-09 01:00:28'),
(110, 'vKOCjR4I*UnrevGGlAJAEPC*TzQApn$GU$2S7W3pT7JTm', NULL, NULL, '2022-03-09 01:04:44', '2022-03-09 01:04:44'),
(111, 'vKOCjR4I*UnrevGGlAJAEPC*TzQApn$GU$2S7W3pT7JTm', NULL, NULL, '2022-03-09 01:05:34', '2022-03-09 01:05:34'),
(112, 'vKOCjR4I*UnrevGGlAJAEPC*TzQApn$GU$2S7W3pT7JTm', NULL, NULL, '2022-03-09 01:05:44', '2022-03-09 01:05:44'),
(113, 'vKOCjR4I*UnrevGGlAJAEPC*TzQApn$GU$2S7W3pT7JTm', NULL, NULL, '2022-03-09 01:05:52', '2022-03-09 01:05:52'),
(114, 'vKOCjR4I*UnrevGGlAJAEPC*TzQApn$GU$2S7W3pT7JTm', 1, NULL, '2022-03-09 01:12:15', '2022-03-09 01:12:15'),
(115, 'vKOCjR4I*UnrevGGlAJAEPC*TzQApn$GU$2S7W3pT7JTm', 1, NULL, '2022-03-09 01:12:27', '2022-03-09 01:12:27'),
(116, 'f_gkJB9uXRMZ2hd0IHn4Y*oMmcCD3IlfPqoH2ifs979Y7', NULL, NULL, '2022-03-09 01:54:34', '2022-03-09 01:54:34'),
(117, 'jp1g2Pjfwad*Lcm4pVvPfOzzeBWzTK*BoX9e237j7_s41', NULL, NULL, '2022-03-10 00:07:20', '2022-03-10 00:07:20'),
(118, 'jp1g2Pjfwad*Lcm4pVvPfOzzeBWzTK*BoX9e237j7_s41', NULL, NULL, '2022-03-10 01:04:23', '2022-03-10 01:04:23'),
(119, 'KNcDMvO599PCdf9JXDBy25kXhTloZhF4fA149$zcE6mau', NULL, NULL, '2022-03-14 22:00:41', '2022-03-14 22:00:41'),
(120, 'KNcDMvO599PCdf9JXDBy25kXhTloZhF4fA149$zcE6mau', NULL, NULL, '2022-03-15 00:38:52', '2022-03-15 00:38:52'),
(121, 'FQS3qT9jNhG90rBWC4W28UfTaTBh4_8Xhn3UX7YmHEF6c', NULL, NULL, '2022-03-16 01:45:57', '2022-03-16 01:45:57'),
(122, '0xoG8GyFTPSDCS1wEWMgFI22dvH8_rRyh8e5UPNyjIDuC', NULL, NULL, '2022-03-21 05:21:30', '2022-03-21 05:21:30'),
(123, '0xoG8GyFTPSDCS1wEWMgFI22dvH8_rRyh8e5UPNyjIDuC', NULL, NULL, '2022-03-21 05:21:52', '2022-03-21 05:21:52'),
(124, '0xoG8GyFTPSDCS1wEWMgFI22dvH8_rRyh8e5UPNyjIDuC', NULL, NULL, '2022-03-21 05:22:42', '2022-03-21 05:22:42');

-- --------------------------------------------------------

--
-- Table structure for table `silder_and_other_banners`
--

CREATE TABLE `silder_and_other_banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bg_color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tag_line` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `update_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `create_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `silder_and_other_banners`
--

INSERT INTO `silder_and_other_banners` (`id`, `title`, `description`, `bg_color`, `tag_line`, `type`, `update_by`, `create_by`, `created_at`, `updated_at`) VALUES
(1, 'Check out my best weekly prices', 'Aliquam euismod, sapien quis vehicula tristique, nunc, placerat tristique lorem ipsum id augue.', NULL, '#stay at home', 1, NULL, NULL, NULL, NULL),
(22, NULL, NULL, NULL, NULL, 2, NULL, NULL, '2022-03-14 23:06:07', '2022-03-14 23:06:07');

-- --------------------------------------------------------

--
-- Table structure for table `sliderbuttonlists`
--

CREATE TABLE `sliderbuttonlists` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `language_file_name` varchar(255) DEFAULT NULL,
  `slider_id` int(10) NOT NULL,
  `frontpage_id` int(10) NOT NULL,
  `bg_color` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sliderbuttonlists`
--

INSERT INTO `sliderbuttonlists` (`id`, `title`, `language_file_name`, `slider_id`, `frontpage_id`, `bg_color`, `created_at`, `updated_at`) VALUES
(5, 'View Promotion', NULL, 1, 5, NULL, '2022-03-14 03:37:11', '2022-03-14 03:37:11'),
(6, 'Sign up Now', NULL, 1, 6, NULL, '2022-03-14 03:37:11', '2022-03-14 03:37:11'),
(9, 'Home', NULL, 22, 1, NULL, '2022-03-14 23:06:07', '2022-03-14 23:06:07');

-- --------------------------------------------------------

--
-- Table structure for table `socail_settings`
--

CREATE TABLE `socail_settings` (
  `id` bigint(20) NOT NULL,
  `app_id` varchar(255) DEFAULT NULL,
  `app_secret` varchar(255) DEFAULT NULL,
  `cal_back_url` varchar(255) NOT NULL,
  `type` int(10) NOT NULL DEFAULT 1 COMMENT '1:facebook,2:gmail,3:other',
  `other` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`other`)),
  `paltfromname` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `socail_settings`
--

INSERT INTO `socail_settings` (`id`, `app_id`, `app_secret`, `cal_back_url`, `type`, `other`, `paltfromname`, `created_at`, `updated_at`) VALUES
(1, '672024243841604', '9bfeab73ccac83c6cd290a9f03511cac', 'http://localhost/smat_mobile/facebooklogin/callback', 1, NULL, 'Facebook', NULL, NULL),
(2, '63194085043-nb38f3mku2888opik6nrc5vn6sfr1u5k.apps.googleusercontent.com', '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', 'http://localhost/smat_mobile/gmaillogin/callback', 2, NULL, 'Google', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `submenu`
--

CREATE TABLE `submenu` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `callback` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dataurl` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `view_port` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `menu_items_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `modal_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `language_file_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `update_by` int(11) DEFAULT NULL,
  `module_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `submenu`
--

INSERT INTO `submenu` (`id`, `title`, `callback`, `dataurl`, `icon`, `view_port`, `menu_items_id`, `modal_name`, `language_file_name`, `created_by`, `update_by`, `module_id`, `created_at`, `updated_at`) VALUES
(1, 'halal_list', 'data-callback=datatable_config', 'admin.list.halal', 'fas fa-cog', 'main-sub-view', '29', 'App\\Models\\Halal_info', 'title', 1, 1, 1, NULL, NULL),
(2, 'add_halal_list', 'data-callback=catgoryintial', 'admin.add.halal', 'fas fa-cog', 'main-sub-view', '29', 'App\\Models\\Halal_info', 'title', 1, 1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `supplier_info`
--

CREATE TABLE `supplier_info` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `business_user_id` int(10) UNSIGNED DEFAULT NULL,
  `country_id` int(10) UNSIGNED DEFAULT NULL,
  `supplier_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `supplier_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `supplier_details` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `supplier_info`
--

INSERT INTO `supplier_info` (`id`, `business_user_id`, `country_id`, `supplier_name`, `supplier_code`, `supplier_details`, `created_at`, `updated_at`) VALUES
(1, NULL, 1, 'sdfsf', 'dfsf', 'sdfsf', '2022-01-03 02:40:37', '2022-01-03 02:40:37'),
(2, NULL, 6, 'K Goh Trading Pte Ltd', '46900', 'K Goh Trading caters to all of Singapore, east of Malaysia, and the greater parts of southern China.', '2022-01-18 19:32:17', '2022-01-18 19:32:17'),
(3, NULL, 6, 'Chong Supplies Pte Ltd', '54678', 'Chong Supplies caters to the need of all households across Singapore, Malaysia, Indonesia, Hong Kong, and China.', '2022-01-18 20:43:30', '2022-01-18 20:43:30'),
(4, NULL, 6, 'Chong Supplies Pte Ltd', '54678', 'Chong Supplies caters to the need of all households across Singapore, Malaysia, Indonesia, Hong Kong, and China.', '2022-01-18 20:43:30', '2022-01-18 20:43:30'),
(5, NULL, 6, 'Chua Grocery Trading Co', '56745', 'Chua Grocery is committed to supplying fresh, healthy, and high-quality groceries to businesses that cater to households.', '2022-01-18 20:46:05', '2022-01-18 20:46:05'),
(6, NULL, 6, 'Chua Grocery Trading Co', '56745', 'Chua Grocery is committed to supplying fresh, healthy, and high-quality groceries to businesses that cater to households.', '2022-01-18 20:46:07', '2022-01-18 20:46:07'),
(7, NULL, 6, 'Victor Suppliers', '57698', 'Victor Suppliers deal in fresh produce, fruits, frozen, and canned food items.', '2022-01-18 20:48:29', '2022-01-18 20:48:29'),
(8, NULL, 7, 'Sangla Foods Sdn. Bhd.', '76568', 'Sangla Foods is a leading importer and distributor of FMCG in Malaysia', '2022-01-18 21:13:32', '2022-01-18 21:13:32'),
(9, NULL, 7, 'Tip Top Fruits & Groceries', '76890', 'Tip Top Fruits & Groceries is Malaysia’s best source for great fruits and groceries deliver right to your door step.', '2022-01-18 21:15:19', '2022-01-18 21:15:19'),
(10, NULL, 8, 'PT Alamboga Internusa', '45632', 'PT Alamboga Internusa is a Bali based company which seeks to serve the Indonesian and expat market with the best food products possible.', '2022-01-18 21:16:57', '2022-01-18 21:16:57'),
(11, NULL, 8, 'LOTTE Grosir Mastrip', '45321', 'LOTTE Grosir Mastrip is a leading Indonesian supplier of various food items.', '2022-01-18 21:18:25', '2022-01-18 21:18:25');

-- --------------------------------------------------------

--
-- Table structure for table `translations`
--

CREATE TABLE `translations` (
  `id` int(10) UNSIGNED NOT NULL,
  `language_id` int(10) UNSIGNED NOT NULL,
  `group` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `key` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `unit_info`
--

CREATE TABLE `unit_info` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `unit_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `unit_info`
--

INSERT INTO `unit_info` (`id`, `unit_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'kg', 'test', NULL, NULL),
(2, 'Gm', 'sfdsfsf s', '2021-12-30 22:51:27', '2021-12-30 22:51:27'),
(3, 'ML', 'Unit of measuring the amount of liquid', '2022-01-18 21:51:04', '2022-01-18 21:51:04'),
(4, 'Litre', 'Unit of measuring the amount of liquid', '2022-01-18 21:51:41', '2022-01-18 21:51:41'),
(5, 'fl. oz.', 'Unit of measuring the amount of liquid', '2022-01-18 21:52:44', '2022-01-18 21:52:44'),
(6, 'Dozen', 'A dozen includes 12 pieces of products.', '2022-01-19 22:38:22', '2022-01-19 22:38:22'),
(7, 'Piece', 'One single product', '2022-01-19 22:38:45', '2022-01-19 22:38:45'),
(8, 'Pack', 'This unit indicates one packet.', '2022-02-10 19:31:20', '2022-02-10 19:31:20'),
(9, 'Bottle', 'One glass bottle containing delicious fluid', '2022-02-11 01:13:29', '2022-02-11 01:13:29'),
(10, 'Case', 'One case contains at least 10 items.', '2022-02-11 01:27:29', '2022-02-11 01:27:29'),
(11, 'Case', 'One case contains at least 10 items.', '2022-02-11 01:28:02', '2022-02-11 01:28:02');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_id` int(10) UNSIGNED DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fd_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gmail_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_login_ip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_login_durtion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_login_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_login_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_active_device_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `country_id`, `phone`, `dob`, `email`, `fd_id`, `gmail_id`, `email_verified_at`, `password`, `last_login_ip`, `last_login_durtion`, `last_login_name`, `last_login_type`, `last_active_device_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'test', 'hello', 6, '312', '01/12/1986', 'orfeostory.dev@gmail.com', NULL, NULL, NULL, '$2y$10$gTUURjtd0mI3/UyzBGrm/ed376Vt914d6GdhsmW3QHyxxA7on1/Ke', NULL, NULL, NULL, NULL, NULL, NULL, '2021-12-07 00:35:13', '2022-02-25 04:11:23'),
(2, 'test', 'uddin', 6, '45678', '2022-01-29', 'teacher-1@gmail.com', NULL, NULL, NULL, '$2y$10$8e9s01t5lHl/eodbc/NBuuBEjVXkcu/MOmNFonlyDsMBXqgETvDu2', NULL, NULL, NULL, NULL, NULL, NULL, '2022-01-24 00:38:17', '2022-01-24 00:38:17'),
(3, 'test testing sdf', 'test', 6, '312', '2022-01-27', 'test@test.com', NULL, NULL, NULL, '$2y$10$uzueGTUfScNfz6nxwzJQDuSkBKsKxHD7/ncNulYsjAx65S.7dkJbG', NULL, NULL, NULL, NULL, NULL, NULL, '2022-01-24 00:54:14', '2022-01-24 00:54:14'),
(4, 'test testing sdf', 'test', 6, '312', '2022-01-02', 'teache1@gmail.com', NULL, NULL, NULL, '$2y$10$VCgSTd9s0TiNodvurA4pkuHiI7SayXBebCtcl5m5x3pPIkl2.P016', NULL, NULL, NULL, NULL, NULL, NULL, '2022-01-24 01:16:08', '2022-01-24 01:16:08'),
(5, 'test testing sdf', 'sdfs', 6, '312', '2022-01-04', 'test_t@test.com', NULL, NULL, NULL, '$2y$10$yzsC807tzR0B6WA.xBnmTu4X1ggeLpo5fhzyvA65qvHiylmFviHDe', NULL, NULL, NULL, NULL, NULL, NULL, '2022-01-24 01:21:01', '2022-01-24 01:21:01'),
(6, 'test', 'test', 6, '312', '2022-01-05', 'adm@gmail.com', NULL, NULL, NULL, '$2y$10$WDR6VpXR/0mVdCre97ZjFeN9h8ehXFq//5oqfb5Z4Fc1UnWqyyN7m', NULL, NULL, NULL, NULL, NULL, NULL, '2022-01-24 02:14:18', '2022-01-24 02:14:18'),
(7, 'orfeostory', 'dev', NULL, NULL, NULL, 'dev@orfeostory.com', NULL, NULL, NULL, '$2y$10$Jn.PYh7hw4dbmVEHN69pAuKYGiID2OVpEEOCyMyrpZ/tva9U0CL6e', NULL, NULL, NULL, NULL, NULL, NULL, '2022-02-07 04:26:24', '2022-02-07 04:26:24'),
(8, 'orfeostory', 'dev', NULL, NULL, NULL, 'devt@orfeostory.com', NULL, NULL, NULL, '$2y$10$N5FyWRyxbWudgWW7m66kbODZMdSOAxCbnRmT2J5kbYCzpaEs9RkiC', NULL, NULL, NULL, NULL, NULL, NULL, '2022-02-08 19:53:00', '2022-02-08 19:53:00'),
(9, 'orfeostory', 'dev', NULL, NULL, NULL, 'devtu@orfeostory.com', NULL, NULL, NULL, '$2y$10$c5LMiE94kDbjM7cAOiYxfOd7UYNAbZN4xSFSa3R1SkOZ.hXPXw86S', NULL, NULL, NULL, NULL, NULL, NULL, '2022-02-08 19:55:13', '2022-02-08 19:55:13'),
(10, 'D', 'h', 6, '97203540', '2010-06-08', 'desmond@orfeostory.com', NULL, NULL, NULL, '$2y$10$TBHBQz6ZfqYEKDFLa3HUAeuIXW53Seb3x7oqWpR700YKMvvWxb0LW', NULL, NULL, NULL, NULL, NULL, NULL, '2022-02-11 22:41:38', '2022-02-11 22:41:38'),
(11, 'bob', 'boib', 6, '91216812', '1995-05-07', 'dattabiradar357@gmail.com', NULL, NULL, NULL, '$2y$10$BMDx2PxCQhPUUnS5841B8u/l8SpgqlBEp339wLRtnhQY8HFjXNIjG', NULL, NULL, NULL, NULL, NULL, NULL, '2022-02-13 20:33:54', '2022-02-13 20:33:54'),
(12, 'testing', 'testlast', NULL, NULL, NULL, 'test@gmail.com', NULL, NULL, NULL, '$2y$10$xhildMGm0O8Dl1a0zBzhSOpZ5Axov.70H7hfY9CjpLY5Ibf7wwSjK', NULL, NULL, NULL, NULL, NULL, NULL, '2022-02-17 01:58:58', '2022-02-17 01:58:58'),
(13, 'testing', 'testlast', NULL, NULL, NULL, 'test1@gmail.com', NULL, NULL, NULL, '$2y$10$/tzpTNuW.r5plgdTp9FsdO9HSUsiELasu530BKEPgsWXdNIHp8Bu6', NULL, NULL, NULL, NULL, NULL, NULL, '2022-02-17 02:00:07', '2022-02-17 02:00:07'),
(14, 'testing', 'testlast', NULL, NULL, NULL, 'test2@gmail.com', NULL, NULL, NULL, '$2y$10$fQy3LQfjQVFCV0uH/VUpKOPqfsqqXkuCftGqUWh9aQX185zcQQoDm', NULL, NULL, NULL, NULL, NULL, NULL, '2022-02-17 02:02:22', '2022-02-17 02:02:22'),
(16, 'Justin Blake', 'Justin Blake', 6, NULL, NULL, 'arif.starit@gmail.com', '285193367060974', NULL, NULL, '$2y$10$lX2pBkY1GTe0YJAkzZTI4.DBfnWgRC1CGAxKZr/h00jRG7KZEaT.m', NULL, NULL, NULL, NULL, NULL, NULL, '2022-03-03 22:10:56', '2022-03-03 22:10:56'),
(18, 'Jasim Uddin', 'Jasim Uddin', 6, NULL, NULL, 'jasim.iovision@gmail.com', NULL, '104209843342254402494', NULL, 'eyJpdiI6ImZJaGRIM2U3dDltRmFMVXV0TEVKWFE9PSIsInZhbHVlIjoiTGZQWUpjRkgrY0dvdisrbEhUa3hhUT09IiwibWFjIjoiMDcxMTc4YTFiNTMwOGQ4MDdlZTZjMTU5MGEzZjE0ODJkNWRlMGE3ODliNTM1YWE4OTI4Yjk2ZDk2MWIzNmMwNiIsInRhZyI6IiJ9', NULL, NULL, NULL, NULL, NULL, NULL, '2022-03-03 23:45:45', '2022-03-03 23:45:45');

-- --------------------------------------------------------

--
-- Table structure for table `user_connections`
--

CREATE TABLE `user_connections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `user_device_id` int(10) UNSIGNED NOT NULL,
  `accessToken` varchar(4000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(600) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `refreshToken` varchar(4000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expireTime` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_connections`
--

INSERT INTO `user_connections` (`id`, `user_id`, `user_device_id`, `accessToken`, `secret`, `refreshToken`, `expireTime`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3RcL3NtYXRfbW9iaWxlXC9hcGlcL2xvZ2luIiwiaWF0IjoxNjQ0MjEzODkyLCJleHAiOjE2NDQyMTc0OTIsIm5iZiI6MTY0NDIxMzg5MiwianRpIjoiT1o4VzZ5dzk5Uk5nQ2tnOCIsInN1YiI6MSwicHJ2IjoiMjNiZDVjODk0OWY2MDBhZGIzOWU3MDFjNDAwODcyZGI3YTU5NzZmNyJ9.St30kU2Nw8sq7Z9sr9gnSFsUr5jhQWkY9ouwpcbGlmQ', NULL, NULL, 60, '2022-02-07 00:04:52', '2022-02-07 00:04:52'),
(2, 1, 1, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3RcL3NtYXRfbW9iaWxlXC9hcGlcL2xvZ2luIiwiaWF0IjoxNjQ0MjE3MzQzLCJleHAiOjE2NDQyMjA5NDMsIm5iZiI6MTY0NDIxNzM0MywianRpIjoiQlp1cHRFY3FkRW5kVEpzdCIsInN1YiI6MSwicHJ2IjoiMjNiZDVjODk0OWY2MDBhZGIzOWU3MDFjNDAwODcyZGI3YTU5NzZmNyJ9.ohXgKGeQMVTcIp27mUr95S6T4WqcLi0USCKypkt1ghg', NULL, NULL, 60, '2022-02-07 01:02:23', '2022-02-07 01:02:23'),
(3, 1, 1, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3RcL3NtYXRfbW9iaWxlXC9hcGlcL2xvZ2luIiwiaWF0IjoxNjQ0MjIwNjUzLCJleHAiOjE2NDQyMjQyNTMsIm5iZiI6MTY0NDIyMDY1MywianRpIjoiOFRUUk1PbzV6bTY3bEZyVSIsInN1YiI6MSwicHJ2IjoiMjNiZDVjODk0OWY2MDBhZGIzOWU3MDFjNDAwODcyZGI3YTU5NzZmNyJ9.dEhmbTqhLLC-3TVz20usgSE4ayH04nDgtZ8RsBFO6lk', NULL, NULL, 60, '2022-02-07 01:57:33', '2022-02-07 01:57:33'),
(4, 1, 1, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3RcL3NtYXRfbW9iaWxlXC9hcGlcL2xvZ2luIiwiaWF0IjoxNjQ0MjIzODQ3LCJleHAiOjE2NDQyMjc0NDcsIm5iZiI6MTY0NDIyMzg0NywianRpIjoicXpXRGY4WEl6V0ZmRUE4MCIsInN1YiI6MSwicHJ2IjoiMjNiZDVjODk0OWY2MDBhZGIzOWU3MDFjNDAwODcyZGI3YTU5NzZmNyJ9.qBBIp1eFuh14-OMvkVt1oRWo3zWzsxufnOe5KtAwlL0', NULL, NULL, 60, '2022-02-07 02:50:47', '2022-02-07 02:50:47'),
(5, 8, 2, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3RcL3NtYXRfbW9iaWxlXC9hcGlcL2xvZ2luIiwiaWF0IjoxNjQ0MjI1NDAzLCJleHAiOjE2NDQyMjkwMDMsIm5iZiI6MTY0NDIyNTQwMywianRpIjoiNktzZUpzY3VubzQ5TTl1eCIsInN1YiI6OCwicHJ2IjoiMjNiZDVjODk0OWY2MDBhZGIzOWU3MDFjNDAwODcyZGI3YTU5NzZmNyJ9.PgzeOxlfKoY-RaP4ZqL42eC7tHI_IfGppHtRDVRwsCM', NULL, NULL, 60, '2022-02-07 03:16:43', '2022-02-07 03:16:43'),
(6, 8, 2, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3RcL3NtYXRfbW9iaWxlXC9hcGlcL2xvZ2luIiwiaWF0IjoxNjQ0MjI1NTI4LCJleHAiOjE2NDQyMjkxMjgsIm5iZiI6MTY0NDIyNTUyOCwianRpIjoiTUF4T2UxblFZV1d3akpyVyIsInN1YiI6OCwicHJ2IjoiMjNiZDVjODk0OWY2MDBhZGIzOWU3MDFjNDAwODcyZGI3YTU5NzZmNyJ9.JH09KioZyt02S3LQ3yefg5_wbhkIF5K7F2TmdQbScP8', NULL, NULL, 60, '2022-02-07 03:18:48', '2022-02-07 03:18:48'),
(7, 8, 2, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3RcL3NtYXRfbW9iaWxlXC9hcGlcL2xvZ2luIiwiaWF0IjoxNjQ0MjI1NTY4LCJleHAiOjE2NDQyMjkxNjgsIm5iZiI6MTY0NDIyNTU2OCwianRpIjoiRmhiblBURTBPQmZBM2FXSyIsInN1YiI6OCwicHJ2IjoiMjNiZDVjODk0OWY2MDBhZGIzOWU3MDFjNDAwODcyZGI3YTU5NzZmNyJ9.V_RezwGZ10kc4IpfrhgHzDR4xbtDaVjSMnQqlvadqkM', NULL, NULL, 60, '2022-02-07 03:19:28', '2022-02-07 03:19:28'),
(8, 1, 1, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3RcL3NtYXRfbW9iaWxlXC9hcGlcL2xvZ2luIiwiaWF0IjoxNjQ0MjI2MzcxLCJleHAiOjE2NDQyMjk5NzEsIm5iZiI6MTY0NDIyNjM3MSwianRpIjoid2RIdFVydXB6Z0JHalBWRCIsInN1YiI6MSwicHJ2IjoiMjNiZDVjODk0OWY2MDBhZGIzOWU3MDFjNDAwODcyZGI3YTU5NzZmNyJ9.y6_Q_eldRxyDSOpJDuasPoPtHsU4YqKH7iVM5-zgkv0', NULL, NULL, 60, '2022-02-07 03:32:51', '2022-02-07 03:32:51'),
(9, 1, 1, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczpcL1wvb3JmZW9zdG9yeXNpdGUuY29tXC9zbWF0X21vYmlsZVwvYXBpXC9sb2dpbiIsImlhdCI6MTY0NDIzNTE3NywiZXhwIjoxNjQ0MjM4Nzc3LCJuYmYiOjE2NDQyMzUxNzcsImp0aSI6IkU1MjNOME1aYjhOejhJM3QiLCJzdWIiOjEsInBydiI6IjIzYmQ1Yzg5NDlmNjAwYWRiMzllNzAxYzQwMDg3MmRiN2E1OTc2ZjcifQ.ftdV0oE18WhZMQDutKrufsU1l9RKBrwtMghAFrgoJ4s', NULL, NULL, 60, '2022-02-07 03:59:38', '2022-02-07 03:59:38'),
(10, 1, 1, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9vcmZlb3N0b3J5c2l0ZS5jb21cL3NtYXRfbW9iaWxlXC9hcGlcL2xvZ2luIiwiaWF0IjoxNjQ0MjM2MDkxLCJleHAiOjE2NDQyMzk2OTEsIm5iZiI6MTY0NDIzNjA5MSwianRpIjoiU25NeUk4R0dEY2RpWWRTcCIsInN1YiI6MSwicHJ2IjoiMjNiZDVjODk0OWY2MDBhZGIzOWU3MDFjNDAwODcyZGI3YTU5NzZmNyJ9.vEfY1ZQLaWjGl_0VfEYsaggLfsxPbKoT1IZ9dZ3PkDU', NULL, NULL, 60, '2022-02-07 04:14:51', '2022-02-07 04:14:51'),
(11, 1, 1, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9vcmZlb3N0b3J5c2l0ZS5jb21cL3NtYXRfbW9iaWxlXC9hcGlcL2xvZ2luIiwiaWF0IjoxNjQ0MjM2MzU3LCJleHAiOjE2NDQyMzk5NTcsIm5iZiI6MTY0NDIzNjM1NywianRpIjoiUVZ2VzQ4S3UwckE5NkJVeSIsInN1YiI6MSwicHJ2IjoiMjNiZDVjODk0OWY2MDBhZGIzOWU3MDFjNDAwODcyZGI3YTU5NzZmNyJ9.aQ_SPBmQdIMY1Q0gVJrYN7WPFh24IkGgHas85zsEQq8', NULL, NULL, 60, '2022-02-07 04:19:17', '2022-02-07 04:19:17'),
(12, 1, 1, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczpcL1wvb3JmZW9zdG9yeXNpdGUuY29tXC9zbWF0X21vYmlsZVwvYXBpXC9sb2dpbiIsImlhdCI6MTY0NDM3NzgwNCwiZXhwIjoxNjQ0MzgxNDA0LCJuYmYiOjE2NDQzNzc4MDQsImp0aSI6IldlQU1jYlYzRUloM25VWEEiLCJzdWIiOjEsInBydiI6IjIzYmQ1Yzg5NDlmNjAwYWRiMzllNzAxYzQwMDg3MmRiN2E1OTc2ZjcifQ.IW1U1ipcRv5svrZQDvpP1cch03xUyZeOXYr8gXWZ_W0', NULL, NULL, 60, '2022-02-08 19:36:44', '2022-02-08 19:36:44'),
(13, 1, 1, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9vcmZlb3N0b3J5c2l0ZS5jb21cL3NtYXRfbW9iaWxlXC9hcGlcL2xvZ2luIiwiaWF0IjoxNjQ0Mzc4MTExLCJleHAiOjE2NDQzODE3MTEsIm5iZiI6MTY0NDM3ODExMSwianRpIjoiSWdUazJLNHJrMFd2TlpGMSIsInN1YiI6MSwicHJ2IjoiMjNiZDVjODk0OWY2MDBhZGIzOWU3MDFjNDAwODcyZGI3YTU5NzZmNyJ9.XQumbXrP3e25UnIny4wVGAkzfLH3QAIbKfZsj8Svp70', NULL, NULL, 60, '2022-02-08 19:41:51', '2022-02-08 19:41:51'),
(14, 1, 1, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9vcmZlb3N0b3J5c2l0ZS5jb21cL3NtYXRfbW9iaWxlXC9hcGlcL2xvZ2luIiwiaWF0IjoxNjQ0Mzc5NTYyLCJleHAiOjE2NDQzODMxNjIsIm5iZiI6MTY0NDM3OTU2MiwianRpIjoicGpBVWdXUkhzVVpFSmdGdCIsInN1YiI6MSwicHJ2IjoiMjNiZDVjODk0OWY2MDBhZGIzOWU3MDFjNDAwODcyZGI3YTU5NzZmNyJ9.TQ1OecHK7xAAOhY0Iu2q8bb5hw93Q2Uis6fsjPb5Btc', NULL, NULL, 60, '2022-02-08 20:06:02', '2022-02-08 20:06:02'),
(15, 1, 1, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczpcL1wvb3JmZW9zdG9yeXNpdGUuY29tXC9zbWF0X21vYmlsZVwvYXBpXC9sb2dpbiIsImlhdCI6MTY0NDQ5MDcyMiwiZXhwIjoxNjQ0NDk0MzIyLCJuYmYiOjE2NDQ0OTA3MjIsImp0aSI6IlllV2U5YWFtenNPOERXUlQiLCJzdWIiOjEsInBydiI6IjIzYmQ1Yzg5NDlmNjAwYWRiMzllNzAxYzQwMDg3MmRiN2E1OTc2ZjcifQ.Wl4VoS1VTbbpdVM71P76JX0KHg9Yzi6BKbGmHf4u3CA', NULL, NULL, 60, '2022-02-10 02:58:42', '2022-02-10 02:58:42'),
(16, 1, 1, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczpcL1wvb3JmZW9zdG9yeXNpdGUuY29tXC9zbWF0X21vYmlsZVwvYXBpXC9sb2dpbiIsImlhdCI6MTY0NDQ5MzE4MiwiZXhwIjoxNjQ0NDk2NzgyLCJuYmYiOjE2NDQ0OTMxODIsImp0aSI6Ilozc1I0MldSTDJBbDBlcUMiLCJzdWIiOjEsInBydiI6IjIzYmQ1Yzg5NDlmNjAwYWRiMzllNzAxYzQwMDg3MmRiN2E1OTc2ZjcifQ.3JOl8uzklbHWM2tbJ4mvo6t2OJTyAS30CjnZNJrmfxE', NULL, NULL, 60, '2022-02-10 03:39:42', '2022-02-10 03:39:42'),
(17, 1, 1, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczpcL1wvb3JmZW9zdG9yeXNpdGUuY29tXC9zbWF0X21vYmlsZVwvYXBpXC9sb2dpbiIsImlhdCI6MTY0NDQ5MzY2NSwiZXhwIjoxNjQ0NDk3MjY1LCJuYmYiOjE2NDQ0OTM2NjUsImp0aSI6IjcxbjJYanFpOVhtTmthWUciLCJzdWIiOjEsInBydiI6IjIzYmQ1Yzg5NDlmNjAwYWRiMzllNzAxYzQwMDg3MmRiN2E1OTc2ZjcifQ.JtJOItg94VejlCA3rfQ9VNVS6824VDI7YURtrZ1z97g', NULL, NULL, 60, '2022-02-10 03:47:45', '2022-02-10 03:47:45'),
(18, 1, 1, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczpcL1wvb3JmZW9zdG9yeXNpdGUuY29tXC9zbWF0X21vYmlsZVwvYXBpXC9sb2dpbiIsImlhdCI6MTY0NDU4MDU1NSwiZXhwIjoxNjQ0NTg0MTU1LCJuYmYiOjE2NDQ1ODA1NTUsImp0aSI6Imh3cDB1Y3FwSVZkMk5VS2ciLCJzdWIiOjEsInBydiI6IjIzYmQ1Yzg5NDlmNjAwYWRiMzllNzAxYzQwMDg3MmRiN2E1OTc2ZjcifQ.gCgn9YL8a06OSIOipBDoO5yT6nXbqmAhTy-l4xxcKxM', NULL, NULL, 60, '2022-02-11 03:55:55', '2022-02-11 03:55:55'),
(19, 1, 1, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczpcL1wvb3JmZW9zdG9yeXNpdGUuY29tXC9zbWF0X21vYmlsZVwvYXBpXC9sb2dpbiIsImlhdCI6MTY0NDgxMTExOSwiZXhwIjoxNjQ0ODE0NzE5LCJuYmYiOjE2NDQ4MTExMTksImp0aSI6Ik1JakMwd0FwcDBLV0puaUciLCJzdWIiOjEsInBydiI6IjIzYmQ1Yzg5NDlmNjAwYWRiMzllNzAxYzQwMDg3MmRiN2E1OTc2ZjcifQ.V4k2_Q-MkcqtMXAipCJgSafonDge6deNDvfPlCGLGVw', NULL, NULL, 60, '2022-02-13 19:58:39', '2022-02-13 19:58:39'),
(20, 1, 1, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczpcL1wvb3JmZW9zdG9yeXNpdGUuY29tXC9zbWF0X21vYmlsZVwvYXBpXC9sb2dpbiIsImlhdCI6MTY0NDgxMTkzNiwiZXhwIjoxNjQ0ODE1NTM2LCJuYmYiOjE2NDQ4MTE5MzYsImp0aSI6IlE2a1U5RjBRU0tJenVvZFYiLCJzdWIiOjEsInBydiI6IjIzYmQ1Yzg5NDlmNjAwYWRiMzllNzAxYzQwMDg3MmRiN2E1OTc2ZjcifQ.yj8b2vG_vSkU9o87Rr1ihgRR8zrtFYZPHtZWF5EIOjg', NULL, NULL, 60, '2022-02-13 20:12:16', '2022-02-13 20:12:16'),
(21, 1, 1, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczpcL1wvb3JmZW9zdG9yeXNpdGUuY29tXC9zbWF0X21vYmlsZVwvYXBpXC9sb2dpbiIsImlhdCI6MTY0NDkxODExNiwiZXhwIjoxNjQ0OTIxNzE2LCJuYmYiOjE2NDQ5MTgxMTYsImp0aSI6Ikh4QlRMeGRmcXVQSnJRcjciLCJzdWIiOjEsInBydiI6IjIzYmQ1Yzg5NDlmNjAwYWRiMzllNzAxYzQwMDg3MmRiN2E1OTc2ZjcifQ.S1PRXWOk0yc7mSC6voR3EWLKoMltDUxgwpM521e9IHQ', NULL, NULL, 60, '2022-02-15 01:41:56', '2022-02-15 01:41:56'),
(22, 1, 1, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczpcL1wvb3JmZW9zdG9yeXNpdGUuY29tXC9zbWF0X21vYmlsZVwvYXBpXC9sb2dpbiIsImlhdCI6MTY0NDkxOTYyNCwiZXhwIjoxNjQ0OTIzMjI0LCJuYmYiOjE2NDQ5MTk2MjQsImp0aSI6InhwRW5kdTBKandCQWZHcTUiLCJzdWIiOjEsInBydiI6IjIzYmQ1Yzg5NDlmNjAwYWRiMzllNzAxYzQwMDg3MmRiN2E1OTc2ZjcifQ.WKwF4p7A_ZCr9q0V2IPTxGhwQSSV65Kf_T40CnUPG5g', NULL, NULL, 60, '2022-02-15 02:07:04', '2022-02-15 02:07:04'),
(23, 1, 1, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczpcL1wvb3JmZW9zdG9yeXNpdGUuY29tXC9zbWF0X21vYmlsZVwvYXBpXC9sb2dpbiIsImlhdCI6MTY0NTAwNDA2OSwiZXhwIjoxNjQ1MDA3NjY5LCJuYmYiOjE2NDUwMDQwNjksImp0aSI6IlFqU1hrbWQzdWs1YWRRQngiLCJzdWIiOjEsInBydiI6IjIzYmQ1Yzg5NDlmNjAwYWRiMzllNzAxYzQwMDg3MmRiN2E1OTc2ZjcifQ.waWHzJfvrH1eMkEswY8pBuTb-yH2sOfLAbdXug53PZY', NULL, NULL, 60, '2022-02-16 01:34:29', '2022-02-16 01:34:29'),
(24, 1, 1, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczpcL1wvb3JmZW9zdG9yeXNpdGUuY29tXC9zbWF0X21vYmlsZVwvYXBpXC9sb2dpbiIsImlhdCI6MTY0NTAwODU2NCwiZXhwIjoxNjQ1MDEyMTY0LCJuYmYiOjE2NDUwMDg1NjQsImp0aSI6IkM5UEJvWWFlczVieWxCQVoiLCJzdWIiOjEsInBydiI6IjIzYmQ1Yzg5NDlmNjAwYWRiMzllNzAxYzQwMDg3MmRiN2E1OTc2ZjcifQ.QESooqtn76EIhHjQlh1VH6NRVY0UyGF_F_23rCoNki0', NULL, NULL, 60, '2022-02-16 02:49:24', '2022-02-16 02:49:24'),
(25, 1, 1, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczpcL1wvb3JmZW9zdG9yeXNpdGUuY29tXC9zbWF0X21vYmlsZVwvYXBpXC9sb2dpbiIsImlhdCI6MTY0NTA3MDk1NSwiZXhwIjoxNjQ1MDc0NTU1LCJuYmYiOjE2NDUwNzA5NTUsImp0aSI6ImV6THdLZVZOZUFaZUx2WjUiLCJzdWIiOjEsInBydiI6IjIzYmQ1Yzg5NDlmNjAwYWRiMzllNzAxYzQwMDg3MmRiN2E1OTc2ZjcifQ.7PZ1kY7y9URg3jACgEwy4TxyCiDPUrwT_SI2IldtsaE', NULL, NULL, 60, '2022-02-16 20:09:15', '2022-02-16 20:09:15'),
(26, 1, 1, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczpcL1wvb3JmZW9zdG9yeXNpdGUuY29tXC9zbWF0X21vYmlsZVwvYXBpXC9sb2dpbiIsImlhdCI6MTY0NTA3NDY1OSwiZXhwIjoxNjQ1MDc4MjU5LCJuYmYiOjE2NDUwNzQ2NTksImp0aSI6Ik0xZmpSeTdHR2Z3NFZrdlkiLCJzdWIiOjEsInBydiI6IjIzYmQ1Yzg5NDlmNjAwYWRiMzllNzAxYzQwMDg3MmRiN2E1OTc2ZjcifQ.l-wYZtJ4vwMR-IU27m01HBXCQL9Zi1IZXIvivbBDcnY', NULL, NULL, 60, '2022-02-16 21:10:59', '2022-02-16 21:10:59'),
(27, 1, 1, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczpcL1wvb3JmZW9zdG9yeXNpdGUuY29tXC9zbWF0X21vYmlsZVwvYXBpXC9sb2dpbiIsImlhdCI6MTY0NTA4OTExMywiZXhwIjoxNjUwMjczMTEzLCJuYmYiOjE2NDUwODkxMTMsImp0aSI6IjZmZU8wR2tLREtwaXZBTnYiLCJzdWIiOjEsInBydiI6IjIzYmQ1Yzg5NDlmNjAwYWRiMzllNzAxYzQwMDg3MmRiN2E1OTc2ZjcifQ.XOUcQ4qOjdKDNLk4JLaw1mrt5hzr35UDqzCrJs7uctM', NULL, NULL, 86400, '2022-02-17 01:11:53', '2022-02-17 01:11:53'),
(28, 14, 3, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczpcL1wvb3JmZW9zdG9yeXNpdGUuY29tXC9zbWF0X21vYmlsZVwvYXBpXC9yZWdpc3RlciIsImlhdCI6MTY0NTA5MjE0MiwiZXhwIjoxNjUwMjc2MTQyLCJuYmYiOjE2NDUwOTIxNDIsImp0aSI6ImZ5dlZPcHF1dE5Jc3JGbnYiLCJzdWIiOjE0LCJwcnYiOiIyM2JkNWM4OTQ5ZjYwMGFkYjM5ZTcwMWM0MDA4NzJkYjdhNTk3NmY3In0.wq94i0Cf7yvT_ykNI_7lQJP0uhZgBsLg-IJR1V8zO5g', NULL, NULL, 86400, '2022-02-17 02:02:22', '2022-02-17 02:02:22'),
(29, 1, 1, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczpcL1wvb3JmZW9zdG9yeXNpdGUuY29tXC9zbWF0X21vYmlsZVwvYXBpXC9sb2dpbiIsImlhdCI6MTY0NTE2NTU3NiwiZXhwIjoxNjUwMzQ5NTc2LCJuYmYiOjE2NDUxNjU1NzYsImp0aSI6ImNiV3F5Y0h3c3NBcmlGTlIiLCJzdWIiOjEsInBydiI6IjIzYmQ1Yzg5NDlmNjAwYWRiMzllNzAxYzQwMDg3MmRiN2E1OTc2ZjcifQ.pY_assB1undcTCD2QXUea7GRrVVq-JgyKzGBIvqgtSU', NULL, NULL, 86400, '2022-02-17 22:26:16', '2022-02-17 22:26:16'),
(30, 1, 1, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczpcL1wvb3JmZW9zdG9yeXNpdGUuY29tXC9zbWF0X21vYmlsZVwvYXBpXC9sb2dpbiIsImlhdCI6MTY0NTE3NDA5NiwiZXhwIjoxNjUwMzU4MDk2LCJuYmYiOjE2NDUxNzQwOTYsImp0aSI6ImVZVlVPZmVLRmFNazRXeWMiLCJzdWIiOjEsInBydiI6IjIzYmQ1Yzg5NDlmNjAwYWRiMzllNzAxYzQwMDg3MmRiN2E1OTc2ZjcifQ.KnRDP86f3Hq0QW4FtYr-sAwytRkcKINW1lCCK2xjtwA', NULL, NULL, 86400, '2022-02-18 00:48:16', '2022-02-18 00:48:16'),
(31, 1, 1, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczpcL1wvb3JmZW9zdG9yeXNpdGUuY29tXC9zbWF0X21vYmlsZVwvYXBpXC9sb2dpbiIsImlhdCI6MTY0NTU5ODMxOCwiZXhwIjoxNjUwNzgyMzE4LCJuYmYiOjE2NDU1OTgzMTgsImp0aSI6ImlEaVhKNHJZQW1ZSG1Lb20iLCJzdWIiOjEsInBydiI6IjIzYmQ1Yzg5NDlmNjAwYWRiMzllNzAxYzQwMDg3MmRiN2E1OTc2ZjcifQ.Hu5LyIWQhadci9j2ekGSlt4zsxRV7wAzZsAiSu0LXn8', NULL, NULL, 86400, '2022-02-22 22:38:38', '2022-02-22 22:38:38'),
(32, 1, 1, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczpcL1wvb3JmZW9zdG9yeXNpdGUuY29tXC9zbWF0X21vYmlsZVwvYXBpXC9sb2dpbiIsImlhdCI6MTY0NTU5OTE2MSwiZXhwIjoxNjUwNzgzMTYxLCJuYmYiOjE2NDU1OTkxNjEsImp0aSI6ImwyV2N6N1pKVWNSejN2bk8iLCJzdWIiOjEsInBydiI6IjIzYmQ1Yzg5NDlmNjAwYWRiMzllNzAxYzQwMDg3MmRiN2E1OTc2ZjcifQ.j7PdlJ9Hf7cTi8DXDOQeViRyXKBoi9sKsv6xK0Djgps', NULL, NULL, 86400, '2022-02-22 22:52:41', '2022-02-22 22:52:41'),
(33, 1, 1, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczpcL1wvb3JmZW9zdG9yeXNpdGUuY29tXC9zbWF0X21vYmlsZVwvYXBpXC9sb2dpbiIsImlhdCI6MTY0NTY3NDc2MiwiZXhwIjoxNjUwODU4NzYyLCJuYmYiOjE2NDU2NzQ3NjIsImp0aSI6InliMDI0elFRdm5uU0tqMloiLCJzdWIiOjEsInBydiI6IjIzYmQ1Yzg5NDlmNjAwYWRiMzllNzAxYzQwMDg3MmRiN2E1OTc2ZjcifQ.v3EYfpEM5qJzGjj-kILuz8zSx7jKSQmXMkDvrOCUjI0', NULL, NULL, 86400, '2022-02-23 19:52:42', '2022-02-23 19:52:42'),
(34, 1, 1, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczpcL1wvb3JmZW9zdG9yeXNpdGUuY29tXC9zbWF0X21vYmlsZVwvYXBpXC9sb2dpbiIsImlhdCI6MTY0NTY3NzIzOCwiZXhwIjoxNjUwODYxMjM4LCJuYmYiOjE2NDU2NzcyMzgsImp0aSI6ImxyS1Q1aHAxdU04WnJwa2giLCJzdWIiOjEsInBydiI6IjIzYmQ1Yzg5NDlmNjAwYWRiMzllNzAxYzQwMDg3MmRiN2E1OTc2ZjcifQ.vE8CgDn_YaiGPrLJSoCxDq3PUvyJGPqwFM-6ec8Uz88', NULL, NULL, 86400, '2022-02-23 20:33:58', '2022-02-23 20:33:58'),
(35, 1, 1, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczpcL1wvb3JmZW9zdG9yeXNpdGUuY29tXC9zbWF0X21vYmlsZVwvYXBpXC9sb2dpbiIsImlhdCI6MTY0NTY3NzQ5NCwiZXhwIjoxNjUwODYxNDk0LCJuYmYiOjE2NDU2Nzc0OTQsImp0aSI6IjJTNEtTaE9nSjZRQURKQWMiLCJzdWIiOjEsInBydiI6IjIzYmQ1Yzg5NDlmNjAwYWRiMzllNzAxYzQwMDg3MmRiN2E1OTc2ZjcifQ.dUrYGoyvzBzFv5QteGcp4W0sruDZYP4gQvi3z2pyJc4', NULL, NULL, 86400, '2022-02-23 20:38:14', '2022-02-23 20:38:14'),
(36, 1, 1, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczpcL1wvb3JmZW9zdG9yeXNpdGUuY29tXC9zbWF0X21vYmlsZVwvYXBpXC9sb2dpbiIsImlhdCI6MTY0NTY3ODY5NywiZXhwIjoxNjUwODYyNjk3LCJuYmYiOjE2NDU2Nzg2OTcsImp0aSI6InZQTlZWdXdkN0dUWU5BMHUiLCJzdWIiOjEsInBydiI6IjIzYmQ1Yzg5NDlmNjAwYWRiMzllNzAxYzQwMDg3MmRiN2E1OTc2ZjcifQ.27jT7erooPh_b0wfX2ZiDD5GNMph0o2tnB-_IrYM3sk', NULL, NULL, 86400, '2022-02-23 20:58:17', '2022-02-23 20:58:17'),
(37, 1, 1, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczpcL1wvb3JmZW9zdG9yeXNpdGUuY29tXC9zbWF0X21vYmlsZVwvYXBpXC9sb2dpbiIsImlhdCI6MTY0NTY5NTQyNCwiZXhwIjoxNjUwODc5NDI0LCJuYmYiOjE2NDU2OTU0MjQsImp0aSI6ImRVU1pkSVdrbTBpbmY2NUQiLCJzdWIiOjEsInBydiI6IjIzYmQ1Yzg5NDlmNjAwYWRiMzllNzAxYzQwMDg3MmRiN2E1OTc2ZjcifQ.pjI5cCd7E4HsWF20RIy9H87FpD-iRg-evmpPD-j7YCU', NULL, NULL, 86400, '2022-02-24 01:37:04', '2022-02-24 01:37:04'),
(38, 1, 1, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczpcL1wvb3JmZW9zdG9yeXNpdGUuY29tXC9zbWF0X21vYmlsZVwvYXBpXC9sb2dpbiIsImlhdCI6MTY0NTc1OTYyMCwiZXhwIjoxNjUwOTQzNjIwLCJuYmYiOjE2NDU3NTk2MjAsImp0aSI6Ik1sVUlPcUNncDlST2ZtNksiLCJzdWIiOjEsInBydiI6IjIzYmQ1Yzg5NDlmNjAwYWRiMzllNzAxYzQwMDg3MmRiN2E1OTc2ZjcifQ.NpKcvL2FxRhX8CzkKCItoDiofKoeRhj545Qshvjb0Xk', NULL, NULL, 86400, '2022-02-24 19:27:00', '2022-02-24 19:27:00'),
(39, 1, 1, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczpcL1wvb3JmZW9zdG9yeXNpdGUuY29tXC9zbWF0X21vYmlsZVwvYXBpXC9sb2dpbiIsImlhdCI6MTY0NTc2Mzc5MCwiZXhwIjoxNjUwOTQ3NzkwLCJuYmYiOjE2NDU3NjM3OTAsImp0aSI6IkZ3TjF2U2Q5aXhxYVdaMmQiLCJzdWIiOjEsInBydiI6IjIzYmQ1Yzg5NDlmNjAwYWRiMzllNzAxYzQwMDg3MmRiN2E1OTc2ZjcifQ.Jalcz3AVPuO3A9Tr4Tdob952hd3AOKCC4cTd3sEt3mM', NULL, NULL, 86400, '2022-02-24 20:36:30', '2022-02-24 20:36:30'),
(40, 1, 1, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczpcL1wvb3JmZW9zdG9yeXNpdGUuY29tXC9zbWF0X21vYmlsZVwvYXBpXC9sb2dpbiIsImlhdCI6MTY0NTc3MDg4OSwiZXhwIjoxNjUwOTU0ODg5LCJuYmYiOjE2NDU3NzA4ODksImp0aSI6ImVORllFV25mUER1WGlwTzUiLCJzdWIiOjEsInBydiI6IjIzYmQ1Yzg5NDlmNjAwYWRiMzllNzAxYzQwMDg3MmRiN2E1OTc2ZjcifQ.VYxJyJQNk8H5O0qDY8UyvMjTXrzju78vG3LIaR5lZGc', NULL, NULL, 86400, '2022-02-24 22:34:49', '2022-02-24 22:34:49'),
(41, 1, 1, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczpcL1wvb3JmZW9zdG9yeXNpdGUuY29tXC9zbWF0X21vYmlsZVwvYXBpXC9sb2dpbiIsImlhdCI6MTY0NTc3MDkwOCwiZXhwIjoxNjUwOTU0OTA4LCJuYmYiOjE2NDU3NzA5MDgsImp0aSI6Ilp5YVN3MTVNalBndnJCR0EiLCJzdWIiOjEsInBydiI6IjIzYmQ1Yzg5NDlmNjAwYWRiMzllNzAxYzQwMDg3MmRiN2E1OTc2ZjcifQ.JK1MugMlCQ8hq76SCHWy1kpByleb_4FZWZZ8e8RlP58', NULL, NULL, 86400, '2022-02-24 22:35:08', '2022-02-24 22:35:08'),
(42, 1, 1, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczpcL1wvb3JmZW9zdG9yeXNpdGUuY29tXC9zbWF0X21vYmlsZVwvYXBpXC9sb2dpbiIsImlhdCI6MTY0NTc3MTA5MSwiZXhwIjoxNjUwOTU1MDkxLCJuYmYiOjE2NDU3NzEwOTEsImp0aSI6Im1FZ1pIVEFMdHRZUmlBWEMiLCJzdWIiOjEsInBydiI6IjIzYmQ1Yzg5NDlmNjAwYWRiMzllNzAxYzQwMDg3MmRiN2E1OTc2ZjcifQ.2IqhpzaBTPuFdWy5ZVbTvf6z-GiK5WX-RUcV9mvkQIM', NULL, NULL, 86400, '2022-02-24 22:38:11', '2022-02-24 22:38:11'),
(43, 11, 4, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczpcL1wvb3JmZW9zdG9yeXNpdGUuY29tXC9zbWF0X21vYmlsZVwvYXBpXC9sb2dpbiIsImlhdCI6MTY0NTc3MTcwNCwiZXhwIjoxNjUwOTU1NzA0LCJuYmYiOjE2NDU3NzE3MDQsImp0aSI6IjU1YlNxRmdxZ1R5TEtic3IiLCJzdWIiOjExLCJwcnYiOiIyM2JkNWM4OTQ5ZjYwMGFkYjM5ZTcwMWM0MDA4NzJkYjdhNTk3NmY3In0.2-RyHM4RWmpzGvs3kJlXPWLlEKxgXyIvkMrFwg_D79Q', NULL, NULL, 86400, '2022-02-24 22:48:24', '2022-02-24 22:48:24'),
(44, 1, 1, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczpcL1wvb3JmZW9zdG9yeXNpdGUuY29tXC9zbWF0X21vYmlsZVwvYXBpXC9sb2dpbiIsImlhdCI6MTY0NTc5MDYwNywiZXhwIjoxNjUwOTc0NjA3LCJuYmYiOjE2NDU3OTA2MDcsImp0aSI6IlNKR0piZjRndjd1SUI5WE4iLCJzdWIiOjEsInBydiI6IjIzYmQ1Yzg5NDlmNjAwYWRiMzllNzAxYzQwMDg3MmRiN2E1OTc2ZjcifQ.pZGM-Mo09OKrPJi8WMt5s7cyqgz2CHNLwxEMb2KCzhU', NULL, NULL, 86400, '2022-02-25 04:03:27', '2022-02-25 04:03:27'),
(45, 1, 1, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczpcL1wvb3JmZW9zdG9yeXNpdGUuY29tXC9zbWF0X21vYmlsZVwvYXBpXC9sb2dpbiIsImlhdCI6MTY0NjAyNTQ4OCwiZXhwIjoxNjUxMjA5NDg4LCJuYmYiOjE2NDYwMjU0ODgsImp0aSI6InJFTmJ0SDFFZXpkQ1ozMjAiLCJzdWIiOjEsInBydiI6IjIzYmQ1Yzg5NDlmNjAwYWRiMzllNzAxYzQwMDg3MmRiN2E1OTc2ZjcifQ.MV83N2OUaod-0hL11UQoKTmaCRX_gd6izmB1Usmet9k', NULL, NULL, 86400, '2022-02-27 21:18:08', '2022-02-27 21:18:08'),
(46, 1, 1, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3RcL3NtYXRfbW9iaWxlXC9hcGlcL2xvZ2luIiwiaWF0IjoxNjQ2MDQ2OTUxLCJleHAiOjE2NTEyMzA5NTEsIm5iZiI6MTY0NjA0Njk1MSwianRpIjoiMnBEMW91M2c1N1FZQ2NTcyIsInN1YiI6MSwicHJ2IjoiMjNiZDVjODk0OWY2MDBhZGIzOWU3MDFjNDAwODcyZGI3YTU5NzZmNyJ9.2DWEPjXmUj-viXqrwIgN2ULNYXBWUZT1AFumqiKGdmI', NULL, NULL, 86400, '2022-02-28 05:15:51', '2022-02-28 05:15:51'),
(47, 15, 5, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3RcL3NtYXRfbW9iaWxlXC9hcGlcL3JlZ2lzdGVyIiwiaWF0IjoxNjQ2MjE2NDQ3LCJleHAiOjE2NTE0MDA0NDcsIm5iZiI6MTY0NjIxNjQ0NywianRpIjoiSVRCNFEwUWZZWTVJV0lTaiIsInN1YiI6MTUsInBydiI6IjIzYmQ1Yzg5NDlmNjAwYWRiMzllNzAxYzQwMDg3MmRiN2E1OTc2ZjcifQ.KOGe14oUMMDMuXU52MtRo9Gg893M0Lf9nCXuFHqcEO0', NULL, NULL, 86400, '2022-03-02 04:20:47', '2022-03-02 04:20:47'),
(48, 1, 1, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3RcL3NtYXRfbW9iaWxlX2xvY2FsXC9hcGlcL2xvZ2luIiwiaWF0IjoxNjQ3NTA2ODc0LCJleHAiOjE2NTI2OTA4NzQsIm5iZiI6MTY0NzUwNjg3NCwianRpIjoiYkhMUkRMd0k3NjA3T21BOSIsInN1YiI6MSwicHJ2IjoiMjNiZDVjODk0OWY2MDBhZGIzOWU3MDFjNDAwODcyZGI3YTU5NzZmNyJ9.jeMBzfEBOoWD34yOogbG_gaMYL3mT_FkbA5LVIVlB5c', NULL, NULL, 86400, '2022-03-17 02:47:55', '2022-03-17 02:47:55');

-- --------------------------------------------------------

--
-- Table structure for table `user_devices`
--

CREATE TABLE `user_devices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `deviceId` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `platformId` int(10) UNSIGNED DEFAULT NULL,
  `pushRegId` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `imei` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_devices`
--

INSERT INTO `user_devices` (`id`, `deviceId`, `user_id`, `platformId`, `pushRegId`, `imei`, `created_at`, `updated_at`) VALUES
(1, '123456789', 1, NULL, NULL, '123456789', '2022-02-07 00:04:52', '2022-02-24 22:38:11'),
(2, '123456789', 8, NULL, NULL, '123456789', '2022-02-07 03:16:43', '2022-02-07 03:16:43'),
(3, 'hello', 14, 123456, 'test', 'test', '2022-02-17 02:02:22', '2022-02-17 02:02:22'),
(4, 'c2e83e073ea8f578', 11, NULL, NULL, 'c2e83e073ea8f578', '2022-02-24 22:48:24', '2022-02-24 22:48:24'),
(5, 'hello', 15, 123456, 'test', 'test', '2022-03-02 04:20:47', '2022-03-02 04:20:47');

-- --------------------------------------------------------

--
-- Table structure for table `varient_info`
--

CREATE TABLE `varient_info` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `unit_of_quantity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `weight` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `packet_size` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `packet_size_unit_id` int(10) UNSIGNED DEFAULT NULL,
  `carton_pack_size` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_info_id` int(10) UNSIGNED NOT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gp_percentage` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_sku` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_price_id` int(10) UNSIGNED DEFAULT NULL,
  `varient_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rsp_w_gst` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `per_serving_measure` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `per_serving_measure_unit` int(11) DEFAULT NULL,
  `supplier_id` int(11) DEFAULT NULL,
  `v_discount` int(3) NOT NULL DEFAULT 0,
  `v_discount_type` int(2) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `varient_info`
--

INSERT INTO `varient_info` (`id`, `unit_of_quantity`, `weight`, `packet_size`, `packet_size_unit_id`, `carton_pack_size`, `product_info_id`, `color`, `size`, `gp_percentage`, `product_sku`, `product_price_id`, `varient_name`, `rsp_w_gst`, `per_serving_measure`, `per_serving_measure_unit`, `supplier_id`, `v_discount`, `v_discount_type`, `created_at`, `updated_at`) VALUES
(2, '10', '4', '4', 1, NULL, 24, NULL, NULL, '10', '0024001', NULL, 'product variant -1', '20', '5', 1, 1, 10, 1, '2022-01-17 04:26:53', '2022-01-17 04:26:53'),
(3, '1', '1', '4', 7, NULL, 26, NULL, NULL, '10', '0026008', NULL, 'Malaysian', '5', NULL, NULL, 8, 0, 1, '2022-01-19 22:55:01', '2022-01-19 22:55:01'),
(4, '30', '2', NULL, NULL, NULL, 29, NULL, NULL, '5', '0029002', NULL, 'Vegetable Sausage Rolls Large', '10', NULL, NULL, 2, 0, 1, '2022-01-19 22:57:21', '2022-01-19 22:57:21'),
(5, '1', '500', NULL, NULL, NULL, 35, NULL, NULL, '2', '0035002', NULL, 'Har Mee Spicy', '40', NULL, NULL, 2, 0, 1, '2022-02-10 19:37:03', '2022-02-10 19:37:03'),
(6, '1', '1', NULL, NULL, NULL, 36, NULL, NULL, '3', '0036009', NULL, 'Red Yellow Mixed', '10', NULL, NULL, 9, 0, 1, '2022-02-10 19:44:51', '2022-02-10 19:44:51'),
(7, '1', '500', NULL, NULL, NULL, 37, NULL, NULL, '1.5', '0037007', NULL, 'Dark Brown Sugar', '5', NULL, NULL, 7, 0, 1, '2022-02-10 19:58:23', '2022-02-10 19:58:23'),
(8, '1', '250', NULL, NULL, NULL, 38, NULL, NULL, '1.5', '0038003', NULL, 'Mixed Salad Greens', '4', NULL, NULL, 3, 0, 1, '2022-02-10 20:07:08', '2022-02-10 20:07:08'),
(9, '1', '500', NULL, NULL, NULL, 39, NULL, NULL, '1', '0039006', NULL, 'Carbonated Ramune Drinks - Strawberry Flavor', '5', NULL, NULL, 6, 0, 1, '2022-02-11 01:15:48', '2022-02-11 01:15:48'),
(10, '1', '500', NULL, NULL, NULL, 34, NULL, NULL, '2', '0034005', NULL, 'Spicy Frozen Paratha', '10', NULL, NULL, 5, 0, 1, '2022-02-11 01:57:07', '2022-02-11 01:57:07');

-- --------------------------------------------------------

--
-- Table structure for table `weekly_deals`
--

CREATE TABLE `weekly_deals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `details` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_date_time` timestamp NULL DEFAULT NULL,
  `end_date_time` timestamp NULL DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1' COMMENT '1=active,2=inactive',
  `p_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1' COMMENT '1=parcantage,2=fixd amount',
  `p_or_amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `exta_p_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0' COMMENT '0=no extaproduct,1=exta product',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `weekly_deals`
--

INSERT INTO `weekly_deals` (`id`, `details`, `start_date_time`, `end_date_time`, `type`, `status`, `p_type`, `p_or_amount`, `exta_p_status`, `created_at`, `updated_at`) VALUES
(1, 'testing', '2022-02-14 10:00:02', '2022-03-25 09:59:59', '1', '1', '1', '10', '0', NULL, NULL),
(2, 'testing', '2022-02-14 02:00:02', '2022-03-25 01:59:59', '1', '1', '1', '8', '0', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `weekly_details`
--

CREATE TABLE `weekly_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `object_id` int(11) DEFAULT NULL,
  `weekly_id` int(11) DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `weekly_details`
--

INSERT INTO `weekly_details` (`id`, `object_id`, `weekly_id`, `type`, `created_at`, `updated_at`) VALUES
(1, 6, 1, 1, NULL, NULL),
(2, 2, 2, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cache_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `user_ip` int(10) UNSIGNED DEFAULT NULL,
  `object_id` int(10) UNSIGNED DEFAULT NULL,
  `object_p_id` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `object_name` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` int(11) NOT NULL DEFAULT 1 COMMENT '1=product,2=catgory,3=other',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wishlists`
--

INSERT INTO `wishlists` (`id`, `cache_id`, `user_id`, `user_ip`, `object_id`, `object_p_id`, `object_name`, `image`, `type`, `created_at`, `updated_at`) VALUES
(11, 'OyTpu6vjBdxVv-Hm9pOmqEGzdkNZczg74BBBxRArHR$Yw', 1, NULL, 2, '24_2', 'product -1 ', '/image/1642415213843.png', 1, '2022-02-07 23:24:31', '2022-02-07 23:24:31'),
(12, NULL, 1, NULL, 5, '5_35', 'Her Mee Har Mee Spicy', '/image/1_1644550623747.jpg', 1, '2022-02-16 03:06:45', '2022-02-16 03:06:45'),
(13, NULL, 1, NULL, 6, '6_36', 'Rambutan Red Yellow Mixed', '/image/1_1644551091217.jpg', 1, '2022-02-16 03:09:28', '2022-02-16 03:09:28'),
(14, NULL, 1, NULL, 7, '7_37', 'Light Brown Sugar Dark Brown Sugar', '/image/1_1644551903294.jpg', 1, '2022-02-16 03:09:39', '2022-02-16 03:09:39'),
(15, NULL, 1, NULL, 9, '9_39', 'Carbonated Ramune Drinks Carbonated Ramune Drinks - Strawberry Flavor', '/image/1_1644570948289.jpg', 1, '2022-02-17 02:26:01', '2022-02-17 02:26:01'),
(16, 'e_EfHNDVng4cEDiBHRdpEMGVl-F_i-HOkR*SCu_OkWihR', NULL, NULL, 6, '36_6', 'Rambutan ', '/image/1_1644551091217.jpg', 1, '2022-03-06 22:49:58', '2022-03-06 22:49:58'),
(19, 'WEgfzcpGCwVGvePaez1ztM7IdpQfuZYT8Z-kWSkOpt1Fz', NULL, NULL, 6, '36_6', 'Rambutan ', '/image/1_1644551091217.jpg', 1, '2022-03-08 23:37:11', '2022-03-08 23:37:11'),
(20, '5YH_LR1mtdEIkGV9o*KtvtT5_1HP3QNtr_dxHbMdBfBaA', NULL, NULL, 2, '24_2', 'product -1 ', '/image/1642415213843.png', 1, '2022-03-15 00:38:58', '2022-03-15 00:38:58'),
(21, 'O2lF*SkAyJiRbph_pTrNJzYOu88odSoAxidRqQxlILOfN', NULL, NULL, 6, '36_6', 'Rambutan ', '/image/1_1644551091217.jpg', 1, '2022-03-16 05:25:21', '2022-03-16 05:25:21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address_infos`
--
ALTER TABLE `address_infos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admin_users_email_unique` (`email`);

--
-- Indexes for table `app_settings`
--
ALTER TABLE `app_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `band_info`
--
ALTER TABLE `band_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banner_buttton_details`
--
ALTER TABLE `banner_buttton_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `business_type_infos`
--
ALTER TABLE `business_type_infos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `business_user_infos`
--
ALTER TABLE `business_user_infos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `business_user_infos_email_unique` (`email`);

--
-- Indexes for table `cardinfos`
--
ALTER TABLE `cardinfos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_infos`
--
ALTER TABLE `category_infos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `country_infos`
--
ALTER TABLE `country_infos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `delivery_slots`
--
ALTER TABLE `delivery_slots`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `delivery_slot_delivery_weeklies`
--
ALTER TABLE `delivery_slot_delivery_weeklies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `delivery_statuses`
--
ALTER TABLE `delivery_statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `delivery_weeklies`
--
ALTER TABLE `delivery_weeklies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `delivryinfos`
--
ALTER TABLE `delivryinfos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `address_id` (`address_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `dept_info`
--
ALTER TABLE `dept_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `div_info`
--
ALTER TABLE `div_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `frontpagelists`
--
ALTER TABLE `frontpagelists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `halal_info`
--
ALTER TABLE `halal_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hala_details`
--
ALTER TABLE `hala_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu_items`
--
ALTER TABLE `menu_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu_role`
--
ALTER TABLE `menu_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orderstatuses`
--
ALTER TABLE `orderstatuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `other_image`
--
ALTER TABLE `other_image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `paymentmethods`
--
ALTER TABLE `paymentmethods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permission_roles`
--
ALTER TABLE `permission_roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `product_classes`
--
ALTER TABLE `product_classes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_class_groupclasses`
--
ALTER TABLE `product_class_groupclasses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_groupclasses`
--
ALTER TABLE `product_groupclasses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_infos`
--
ALTER TABLE `product_infos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_price_details`
--
ALTER TABLE `product_price_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `promotion_infos`
--
ALTER TABLE `promotion_infos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `promotion_info_details`
--
ALTER TABLE `promotion_info_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales_team_infos`
--
ALTER TABLE `sales_team_infos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shopingcartdetails`
--
ALTER TABLE `shopingcartdetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shoping_cart`
--
ALTER TABLE `shoping_cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `silder_and_other_banners`
--
ALTER TABLE `silder_and_other_banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliderbuttonlists`
--
ALTER TABLE `sliderbuttonlists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `socail_settings`
--
ALTER TABLE `socail_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `submenu`
--
ALTER TABLE `submenu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplier_info`
--
ALTER TABLE `supplier_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `translations`
--
ALTER TABLE `translations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `translations_language_id_foreign` (`language_id`);

--
-- Indexes for table `unit_info`
--
ALTER TABLE `unit_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_connections`
--
ALTER TABLE `user_connections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_devices`
--
ALTER TABLE `user_devices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `varient_info`
--
ALTER TABLE `varient_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `weekly_deals`
--
ALTER TABLE `weekly_deals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `weekly_details`
--
ALTER TABLE `weekly_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address_infos`
--
ALTER TABLE `address_infos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `app_settings`
--
ALTER TABLE `app_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `band_info`
--
ALTER TABLE `band_info`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `banner_buttton_details`
--
ALTER TABLE `banner_buttton_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `business_type_infos`
--
ALTER TABLE `business_type_infos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `business_user_infos`
--
ALTER TABLE `business_user_infos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cardinfos`
--
ALTER TABLE `cardinfos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `category_infos`
--
ALTER TABLE `category_infos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `country_infos`
--
ALTER TABLE `country_infos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `delivery_slots`
--
ALTER TABLE `delivery_slots`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `delivery_slot_delivery_weeklies`
--
ALTER TABLE `delivery_slot_delivery_weeklies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `delivery_statuses`
--
ALTER TABLE `delivery_statuses`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `delivery_weeklies`
--
ALTER TABLE `delivery_weeklies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `delivryinfos`
--
ALTER TABLE `delivryinfos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `dept_info`
--
ALTER TABLE `dept_info`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `div_info`
--
ALTER TABLE `div_info`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `frontpagelists`
--
ALTER TABLE `frontpagelists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `halal_info`
--
ALTER TABLE `halal_info`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `hala_details`
--
ALTER TABLE `hala_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `image`
--
ALTER TABLE `image`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `menu_items`
--
ALTER TABLE `menu_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `menu_role`
--
ALTER TABLE `menu_role`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `orderdetails`
--
ALTER TABLE `orderdetails`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `orderstatuses`
--
ALTER TABLE `orderstatuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `other_image`
--
ALTER TABLE `other_image`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT for table `password_resets`
--
ALTER TABLE `password_resets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `paymentmethods`
--
ALTER TABLE `paymentmethods`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permission_roles`
--
ALTER TABLE `permission_roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_classes`
--
ALTER TABLE `product_classes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product_class_groupclasses`
--
ALTER TABLE `product_class_groupclasses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product_groupclasses`
--
ALTER TABLE `product_groupclasses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product_infos`
--
ALTER TABLE `product_infos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `product_price_details`
--
ALTER TABLE `product_price_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `promotion_infos`
--
ALTER TABLE `promotion_infos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `promotion_info_details`
--
ALTER TABLE `promotion_info_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sales_team_infos`
--
ALTER TABLE `sales_team_infos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `shopingcartdetails`
--
ALTER TABLE `shopingcartdetails`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `shoping_cart`
--
ALTER TABLE `shoping_cart`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;

--
-- AUTO_INCREMENT for table `silder_and_other_banners`
--
ALTER TABLE `silder_and_other_banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `sliderbuttonlists`
--
ALTER TABLE `sliderbuttonlists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `socail_settings`
--
ALTER TABLE `socail_settings`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `submenu`
--
ALTER TABLE `submenu`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `supplier_info`
--
ALTER TABLE `supplier_info`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `translations`
--
ALTER TABLE `translations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `unit_info`
--
ALTER TABLE `unit_info`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `user_connections`
--
ALTER TABLE `user_connections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `user_devices`
--
ALTER TABLE `user_devices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `varient_info`
--
ALTER TABLE `varient_info`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `weekly_deals`
--
ALTER TABLE `weekly_deals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `weekly_details`
--
ALTER TABLE `weekly_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `translations`
--
ALTER TABLE `translations`
  ADD CONSTRAINT `translations_language_id_foreign` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
