-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 18, 2016 at 09:23 PM
-- Server version: 5.7.13-0ubuntu0.16.04.2
-- PHP Version: 7.0.8-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tiptop`
--

-- --------------------------------------------------------

--
-- Table structure for table `acl_classes`
--

CREATE TABLE `acl_classes` (
  `id` int(10) UNSIGNED NOT NULL,
  `class_type` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `acl_entries`
--

CREATE TABLE `acl_entries` (
  `id` int(10) UNSIGNED NOT NULL,
  `class_id` int(10) UNSIGNED NOT NULL,
  `object_identity_id` int(10) UNSIGNED DEFAULT NULL,
  `security_identity_id` int(10) UNSIGNED NOT NULL,
  `field_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ace_order` smallint(5) UNSIGNED NOT NULL,
  `mask` int(11) NOT NULL,
  `granting` tinyint(1) NOT NULL,
  `granting_strategy` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `audit_success` tinyint(1) NOT NULL,
  `audit_failure` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `acl_object_identities`
--

CREATE TABLE `acl_object_identities` (
  `id` int(10) UNSIGNED NOT NULL,
  `parent_object_identity_id` int(10) UNSIGNED DEFAULT NULL,
  `class_id` int(10) UNSIGNED NOT NULL,
  `object_identifier` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `entries_inheriting` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `acl_object_identity_ancestors`
--

CREATE TABLE `acl_object_identity_ancestors` (
  `object_identity_id` int(10) UNSIGNED NOT NULL,
  `ancestor_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `acl_security_identities`
--

CREATE TABLE `acl_security_identities` (
  `id` int(10) UNSIGNED NOT NULL,
  `identifier` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `username` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `app_ad`
--

CREATE TABLE `app_ad` (
  `id` int(11) NOT NULL,
  `image` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `body` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime DEFAULT NULL,
  `deleted` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `app_ad`
--

INSERT INTO `app_ad` (`id`, `image`, `title`, `body`, `created`, `updated`, `deleted`) VALUES
(1, NULL, 'квартира', '<p>супер квартира</p>', '2016-07-01 00:00:00', NULL, NULL),
(2, NULL, 'квартира', '<p>супер квартира</p>', '2016-07-01 00:00:00', NULL, NULL),
(3, NULL, 'test', '<p>test&nbsp;</p>', '2016-07-02 00:00:00', NULL, NULL),
(4, NULL, 'qwd qw q', '<p>wd qdw qwd qdw qw qwd qdw</p>', '2016-07-02 00:00:00', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `app_bundles`
--

CREATE TABLE `app_bundles` (
  `id` int(11) NOT NULL,
  `name` varchar(40) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `isActive` tinyint(1) NOT NULL DEFAULT '0',
  `isSystem` tinyint(1) NOT NULL DEFAULT '0',
  `orderBy` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `app_bundles`
--

INSERT INTO `app_bundles` (`id`, `name`, `isActive`, `isSystem`, `orderBy`) VALUES
(1, 'AppBundle', 1, 1, 0),
(2, 'AdsBundle', 1, 0, 1),
(3, 'ArticlesBundle', 1, 0, 2),
(4, 'ChatBundle', 1, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `app_page`
--

CREATE TABLE `app_page` (
  `id` int(11) NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nameInMenu` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `body` longtext COLLATE utf8_unicode_ci NOT NULL,
  `keywords` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime DEFAULT NULL,
  `deleted` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `app_page`
--

INSERT INTO `app_page` (`id`, `slug`, `title`, `image`, `nameInMenu`, `body`, `keywords`, `description`, `created`, `updated`, `deleted`) VALUES
(15, 'home', 'Главная', '3b17572a9a8f0d597988e1c02d69a2b04563f58b.jpeg', 'Главная', '<h4 class="title">КУХНИ НА ЗАКАЗ В МИНСКЕ</h4>\r\n<h5 style="text-align: right;"><strong>Кухня &mdash; это место, о котором мужчины думают, что там готовится еда,</strong><br /><strong>а женщины &mdash; что там проходят их лучшие годы.</strong></h5>\r\n<p>По исследованиям британских ученых женщины проводят на кухне в среднем три года своей жизни. Почти половина респондентов при этом считает кухню главным пространством в квартире или доме.</p>\r\n<p>Сделайте свою кухню максимально функциональной и эстетичной с помощью специалистов EcoGroup.by!</p>', 'кухни минск', 'кухни на заказ', '2010-01-01 00:00:00', '2010-01-01 00:00:00', '2010-01-01 00:00:00'),
(16, 'contacts', 'Контакты', 'adb07e76e4615650ff5ba580ff68deeb684dd008.jpeg', 'Контакты', '<p>Контактные номера телефонов:&nbsp;(029) 647-08-08 (vel), (033) 647-08-08 (мтс)</p>\r\n<p>E-mail:&nbsp;<a href="mailto:kitchenBy@yandex.ru">KitchenBy@yandex.ru</a></p>\r\n<p>Юридический адрес:<br />Республика Беларусь<br />г.Минск<br />просп. Победителей д.103, офис 907</p>\r\n<p>Мы работаем&nbsp;пн-пт с 10:00 до 20:00</p>', 'кухни, связаться', 'Кухни в минске, контакты', '2010-01-01 00:00:00', '2010-01-01 00:00:00', '2010-01-01 00:00:00'),
(18, 'galleries', 'Гелереи', '64267eb277e5fceda74948e1ea298321e1750df8.jpeg', 'Галереи', '<p>Тут вы можете ознакомится с примероми работ</p>', 'гарелереи', 'гелереи', '2015-07-05 23:08:27', NULL, NULL),
(20, 'bonus', 'Акции', '201308d051a3383e3bd66ce6a8810eabd3d51d26.jpeg', 'Акции', 'Временно не доступно', 'акции', 'акции', '2016-03-27 20:56:15', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `app_settings`
--

CREATE TABLE `app_settings` (
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `value` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `section` varchar(64) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `app_settings`
--

INSERT INTO `app_settings` (`name`, `value`, `type`, `section`) VALUES
('system_logo', '50176f5cf298053e53cbf8b42de7c528ac169924.jpeg', 'image', 'main'),
('system_mainpage_route', '_ads_index', 'route', 'main'),
('system_mainpage_route_params', '{"slug":"home"}', 'string', 'main');

-- --------------------------------------------------------

--
-- Table structure for table `articles_news`
--

CREATE TABLE `articles_news` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` longtext COLLATE utf8_unicode_ci NOT NULL,
  `body` text COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime DEFAULT NULL,
  `deleted` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `articles_news`
--

INSERT INTO `articles_news` (`id`, `title`, `image`, `body`, `created`, `updated`, `deleted`) VALUES
(1, 'qwd fq', '', '<p>wf qwf qfwqwqwefqwefqwefqwefqwefqwef</p>', '2016-07-06 06:16:00', NULL, NULL),
(2, 'waefawfawef', 'test2.png', '<p>wefwaefafeawef</p>', '2016-07-14 04:14:00', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `category_test`
--

CREATE TABLE `category_test` (
  `id` int(11) NOT NULL,
  `parent_category_id` int(11) DEFAULT NULL,
  `name` varchar(100) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category_test`
--

INSERT INTO `category_test` (`id`, `parent_category_id`, `name`) VALUES
(1, 0, 'авто и запчасти'),
(2, 1, 'audi'),
(3, 1, 'fiat'),
(4, 1, 'bmw'),
(5, 0, 'авто с прицепами'),
(6, 0, 'запчасти'),
(7, 5, 'для фольцвагена'),
(8, 5, 'для фиата'),
(9, 6, 'для пежо'),
(10, 6, 'для ауди'),
(11, 7, 'джетта'),
(12, 7, 'фокус'),
(13, 11, 'меньше 100'),
(14, 11, 'больше 100'),
(15, 13, 'меньше 50'),
(16, 2, 'защита');

-- --------------------------------------------------------

--
-- Table structure for table `gelleries_gallery`
--

CREATE TABLE `gelleries_gallery` (
  `id` int(11) NOT NULL,
  `object_id` int(11) DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `body` longtext COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `gelleries_gallery`
--

INSERT INTO `gelleries_gallery` (`id`, `object_id`, `title`, `body`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, NULL, 'Ntcn', '<p>asdfasdfasdfasdfasdfasdfef qwef qwfe qwef</p>', NULL, NULL, NULL),
(2, NULL, 'asdfasdfasdf', '<p>asdfasdfasdfasdfasdfasdf</p>', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `gelleries_gallery_image`
--

CREATE TABLE `gelleries_gallery_image` (
  `id` int(11) NOT NULL,
  `object_id` int(11) DEFAULT NULL,
  `gallery_id` int(255) NOT NULL,
  `image` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `gelleries_gallery_image`
--

INSERT INTO `gelleries_gallery_image` (`id`, `object_id`, `gallery_id`, `image`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, NULL, 1, 'c18c2ad089a7668cab43169ed888734fd399ceac.jpeg', NULL, NULL, NULL),
(2, NULL, 2, 'eee0828d27b6a544423ca86902f66030e57b4ca8.jpeg', NULL, NULL, NULL),
(3, NULL, 2, '3021dfaedb10103cfdf46ad589a8a809befee26a.jpeg', NULL, NULL, NULL),
(4, NULL, 1, 'dd285eb1a95a45f1d53bfc79cad1c9a564315304.jpeg', NULL, NULL, NULL),
(5, NULL, 1, '33dedb34538bfa3f6cbc28117024bf5eafc3702e.jpeg', NULL, NULL, NULL),
(6, NULL, 1, '053611ceb3ebe6d20ecdd97c95a3d2267a7a98b6.jpeg', NULL, NULL, NULL),
(7, NULL, 1, '258128c26c785cb2b95085b2cd63423db5d24aaa.jpeg', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `system_modules`
--

CREATE TABLE `system_modules` (
  `id` int(11) NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `system_objects`
--

CREATE TABLE `system_objects` (
  `id` int(11) NOT NULL,
  `type` varchar(80) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `system_roles`
--

CREATE TABLE `system_roles` (
  `id` int(11) NOT NULL,
  `name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `role` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `system_roles`
--

INSERT INTO `system_roles` (`id`, `name`, `role`) VALUES
(1, 'admin', 'ROLE_ADMIN'),
(2, 'user', 'ROLE_USER');

-- --------------------------------------------------------

--
-- Table structure for table `system_users`
--

CREATE TABLE `system_users` (
  `id` int(11) NOT NULL,
  `username` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `isActive` tinyint(1) NOT NULL,
  `roleId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `system_users`
--

INSERT INTO `system_users` (`id`, `username`, `password`, `email`, `isActive`, `roleId`) VALUES
(1, 'admin', '$2a$08$jHZj/wJfcVKlIwr5AvR78euJxYK7Ku5kURNhNx.7.CSIJ3Pq6LEPC', 'admin@admin.com', 1, 1),
(2, 'test', '$2y$13$8zwg8EDs4qTDnOootnuK4OOrbv/73tEDaUVMiYw/uJSqS4knzPuK.', 'test@test.com', 1, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acl_classes`
--
ALTER TABLE `acl_classes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_69DD750638A36066` (`class_type`);

--
-- Indexes for table `acl_entries`
--
ALTER TABLE `acl_entries`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_46C8B806EA000B103D9AB4A64DEF17BCE4289BF4` (`class_id`,`object_identity_id`,`field_name`,`ace_order`),
  ADD KEY `IDX_46C8B806EA000B103D9AB4A6DF9183C9` (`class_id`,`object_identity_id`,`security_identity_id`),
  ADD KEY `IDX_46C8B806EA000B10` (`class_id`),
  ADD KEY `IDX_46C8B8063D9AB4A6` (`object_identity_id`),
  ADD KEY `IDX_46C8B806DF9183C9` (`security_identity_id`);

--
-- Indexes for table `acl_object_identities`
--
ALTER TABLE `acl_object_identities`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_9407E5494B12AD6EA000B10` (`object_identifier`,`class_id`),
  ADD KEY `IDX_9407E54977FA751A` (`parent_object_identity_id`);

--
-- Indexes for table `acl_object_identity_ancestors`
--
ALTER TABLE `acl_object_identity_ancestors`
  ADD PRIMARY KEY (`object_identity_id`,`ancestor_id`),
  ADD KEY `IDX_825DE2993D9AB4A6` (`object_identity_id`),
  ADD KEY `IDX_825DE299C671CEA1` (`ancestor_id`);

--
-- Indexes for table `acl_security_identities`
--
ALTER TABLE `acl_security_identities`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_8835EE78772E836AF85E0677` (`identifier`,`username`);

--
-- Indexes for table `app_ad`
--
ALTER TABLE `app_ad`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `app_bundles`
--
ALTER TABLE `app_bundles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `app_page`
--
ALTER TABLE `app_page`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `app_settings`
--
ALTER TABLE `app_settings`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `articles_news`
--
ALTER TABLE `articles_news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_test`
--
ALTER TABLE `category_test`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gelleries_gallery`
--
ALTER TABLE `gelleries_gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gelleries_gallery_image`
--
ALTER TABLE `gelleries_gallery_image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `system_modules`
--
ALTER TABLE `system_modules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `system_objects`
--
ALTER TABLE `system_objects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `system_roles`
--
ALTER TABLE `system_roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_E2F1B55D57698A6A` (`role`);

--
-- Indexes for table `system_users`
--
ALTER TABLE `system_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_404C3E73E7927C74` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `acl_classes`
--
ALTER TABLE `acl_classes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `acl_entries`
--
ALTER TABLE `acl_entries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `acl_object_identities`
--
ALTER TABLE `acl_object_identities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `acl_security_identities`
--
ALTER TABLE `acl_security_identities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `app_ad`
--
ALTER TABLE `app_ad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `app_bundles`
--
ALTER TABLE `app_bundles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `app_page`
--
ALTER TABLE `app_page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `articles_news`
--
ALTER TABLE `articles_news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `category_test`
--
ALTER TABLE `category_test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `gelleries_gallery`
--
ALTER TABLE `gelleries_gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `gelleries_gallery_image`
--
ALTER TABLE `gelleries_gallery_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `system_roles`
--
ALTER TABLE `system_roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `system_users`
--
ALTER TABLE `system_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `acl_entries`
--
ALTER TABLE `acl_entries`
  ADD CONSTRAINT `FK_46C8B8063D9AB4A6` FOREIGN KEY (`object_identity_id`) REFERENCES `acl_object_identities` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_46C8B806DF9183C9` FOREIGN KEY (`security_identity_id`) REFERENCES `acl_security_identities` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_46C8B806EA000B10` FOREIGN KEY (`class_id`) REFERENCES `acl_classes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `acl_object_identities`
--
ALTER TABLE `acl_object_identities`
  ADD CONSTRAINT `FK_9407E54977FA751A` FOREIGN KEY (`parent_object_identity_id`) REFERENCES `acl_object_identities` (`id`);

--
-- Constraints for table `acl_object_identity_ancestors`
--
ALTER TABLE `acl_object_identity_ancestors`
  ADD CONSTRAINT `FK_825DE2993D9AB4A6` FOREIGN KEY (`object_identity_id`) REFERENCES `acl_object_identities` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_825DE299C671CEA1` FOREIGN KEY (`ancestor_id`) REFERENCES `acl_object_identities` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
