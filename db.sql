-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 17, 2021 at 12:12 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Database: `codeigniter_4`
--

-- --------------------------------------------------------

--
-- Table structure for table `auth_activation_attempts`
--

CREATE TABLE `auth_activation_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups`
--

CREATE TABLE `auth_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_groups`
--

INSERT INTO `auth_groups` (`id`, `name`, `description`) VALUES
(1, 'Administrator', 'Administrators. The top of the food chain.'),
(3, 'Kepegawaian', 'Mengurus Bagian User');

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups_permissions`
--

CREATE TABLE `auth_groups_permissions` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_groups_permissions`
--

INSERT INTO `auth_groups_permissions` (`group_id`, `permission_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `auth_logins`
--

CREATE TABLE `auth_logins` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `user_id` int(11) UNSIGNED DEFAULT NULL,
  `date` datetime NOT NULL,
  `success` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_logins`
--

INSERT INTO `auth_logins` (`id`, `ip_address`, `email`, `user_id`, `date`, `success`) VALUES
(1, '::1', 'admin@admin.com', 1, '2021-08-26 14:53:07', 1),
(2, '::1', 'admin@admin.com', 1, '2021-08-26 22:13:53', 1),
(3, '::1', 'administrator@gmail.com', 3, '2021-08-27 02:08:20', 1),
(4, '::1', 'admin@admin.com', 1, '2021-08-27 02:11:22', 1),
(5, '::1', 'admin@admin.com', 1, '2021-08-27 02:15:47', 1),
(6, '::1', 'administrator@gmail.com', 3, '2021-08-27 06:24:54', 1),
(7, '::1', 'user@user.com', 2, '2021-08-27 06:57:52', 1),
(8, '::1', 'administrator@gmail.com', 3, '2021-08-27 06:59:02', 1),
(9, '::1', 'administrator@gmail.com', 3, '2021-08-27 22:03:35', 1),
(10, '::1', 'administrator@gmail.com', 3, '2021-08-28 01:08:43', 1),
(11, '::1', 'admin', NULL, '2021-08-30 23:10:25', 0),
(12, '::1', 'admin@admin.com', 1, '2021-08-30 23:10:32', 1),
(13, '::1', 'admin@admin.com', 1, '2021-09-12 06:34:11', 1),
(14, '::1', 'administrator@gmail.com', 3, '2021-09-12 08:30:13', 1),
(15, '::1', 'administrator@gmail.com', 3, '2021-09-12 08:34:24', 1),
(16, '::1', 'administrator@gmail.com', 3, '2021-09-12 08:34:47', 1),
(17, '::1', 'admin@admin.com', 1, '2021-09-12 08:34:59', 1),
(18, '::1', 'administrator@gmail.com', 3, '2021-09-12 08:35:30', 1),
(19, '::1', 'administrator@gmail.com', 3, '2021-09-12 08:35:41', 1),
(20, '::1', 'admin@admin.com', 1, '2021-09-12 08:36:01', 1),
(21, '::1', 'admin@admin.com', 1, '2021-09-12 08:36:47', 1),
(22, '::1', 'user@user.com', 2, '2021-09-12 10:24:08', 1),
(23, '::1', 'admin@admin.com', 1, '2021-09-12 10:32:55', 1),
(24, '::1', 'admin@admin.com', 1, '2021-09-12 10:33:11', 1),
(25, '::1', 'admin@admin.com', 1, '2021-09-12 11:18:13', 1),
(26, '::1', 'admin@admin.com', 1, '2021-09-12 11:21:23', 1),
(27, '::1', 'admin@admin.com', 1, '2021-09-12 11:36:35', 1),
(28, '::1', 'admin@admin.com', 1, '2021-09-12 11:42:25', 1),
(29, '::1', 'user@user.com', 2, '2021-09-12 11:46:17', 1),
(30, '::1', 'admin@admin.com', 1, '2021-09-12 11:46:40', 1),
(31, '::1', 'admin@admin.com', 1, '2021-09-12 11:52:24', 1),
(32, '::1', 'user@user.com', 2, '2021-09-12 11:57:14', 1),
(33, '::1', 'admin@admin.com', 1, '2021-09-12 12:00:25', 1),
(34, '::1', 'admin@admin.com', 1, '2021-09-12 12:05:29', 1),
(35, '::1', 'user@user.com', 2, '2021-09-12 21:04:43', 1),
(36, '::1', 'admin@admin.com', 1, '2021-09-12 21:05:00', 1),
(37, '::1', 'admin@admin.com', 1, '2021-09-12 22:40:15', 1),
(38, '::1', 'admin@admin.com', 1, '2021-09-14 08:48:02', 1),
(39, '::1', 'administrator@gmail.com', 3, '2021-09-14 09:15:41', 1),
(40, '::1', 'administrator@gmail.com', 3, '2021-09-14 09:15:54', 1),
(41, '::1', 'admin', NULL, '2021-09-14 09:16:40', 0),
(42, '::1', 'admin', NULL, '2021-09-14 09:16:49', 0),
(43, '::1', 'admin', NULL, '2021-09-14 09:16:54', 0),
(44, '::1', 'admin@admin.com', 1, '2021-09-14 09:17:00', 1),
(45, '::1', 'administrator@gmail.com', 3, '2021-09-14 09:29:44', 1),
(46, '::1', 'admin@admin.com', 1, '2021-09-14 09:42:26', 1),
(47, '::1', 'user@user.com', 2, '2021-09-14 21:09:36', 1),
(48, '::1', 'admin@admin.com', 1, '2021-09-14 21:10:37', 1),
(49, '::1', 'administrator@gmail.com', 3, '2021-09-14 22:52:02', 1),
(50, '::1', 'administrator@gmail.com', 3, '2021-09-15 00:10:32', 1),
(51, '::1', 'administrator@gmail.com', 3, '2021-09-15 05:58:42', 1),
(52, '::1', 'admin@admin.com', 1, '2021-09-15 06:14:50', 1),
(53, '::1', 'iseplutpinur7@gmail.com', 1, '2021-09-15 06:17:21', 1),
(54, '::1', 'iseplutpinur7@gmail.com', 1, '2021-09-15 07:04:57', 1),
(55, '::1', 'iseplutpinur7@gmail.com', 1, '2021-09-15 07:05:31', 1),
(56, '::1', 'administrator@gmail.com', 3, '2021-09-15 07:06:20', 1),
(57, '::1', 'administrator@gmail.com', 3, '2021-09-15 10:29:02', 1),
(58, '::1', 'administrator@gmail.com', 3, '2021-09-15 10:45:07', 1),
(59, '::1', 'iseplutpinur7@gmail.com', 1, '2021-09-15 10:45:20', 1),
(60, '::1', 'administrator@gmail.com', 3, '2021-09-15 10:46:14', 1),
(61, '::1', 'administrator@gmail.com', 3, '2021-09-16 01:33:29', 1),
(62, '::1', 'iseplutpinur7@gmail.com', 1, '2021-09-16 01:33:43', 1),
(63, '::1', 'administrator@gmail.com', 3, '2021-09-16 02:45:33', 1),
(64, '::1', 'iseplutpinur7@gmail.com', 1, '2021-09-16 04:24:39', 1),
(65, '::1', 'iseplutpinur7@gmail.com', 1, '2021-09-16 07:21:57', 1),
(66, '::1', 'administrator@gmail.com', 3, '2021-09-16 07:50:28', 1),
(67, '::1', 'kepegawaian@gmail.com', 5, '2021-09-16 08:12:58', 1),
(68, '::1', 'kepegawaian1@gmail.com', NULL, '2021-09-16 12:39:19', 0),
(69, '::1', 'kepegawaian1@gmail.com', NULL, '2021-09-16 12:39:25', 0),
(70, '::1', 'kepegawaian@gmail.com', NULL, '2021-09-16 12:40:31', 0),
(71, '::1', 'kepegawaian@gmail.com', NULL, '2021-09-16 12:40:41', 0),
(72, '::1', 'kepegawaian', NULL, '2021-09-16 12:40:57', 0),
(73, '::1', 'kepegawaian@gmail.com', 5, '2021-09-16 12:41:11', 1),
(74, '::1', 'iseplutpinur7@gmail.com', 1, '2021-09-16 22:28:52', 1),
(75, '::1', 'iseplutpinur7@gmail.com', 1, '2021-09-17 01:25:10', 1),
(76, '::1', 'kepegawaian@gmail.com', 5, '2021-09-17 01:51:55', 1),
(77, '::1', 'administrator@gmail.com', 3, '2021-09-17 02:22:27', 1),
(78, '::1', 'iseplutpinur7@gmail.com', 1, '2021-09-17 02:35:23', 1),
(79, '::1', 'iseplutpinur7@gmail.com', 1, '2021-09-17 03:53:33', 1),
(80, '::1', 'administrator@gmail.com', 3, '2021-09-17 04:53:55', 1);

-- --------------------------------------------------------

--
-- Table structure for table `auth_permissions`
--

CREATE TABLE `auth_permissions` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_permissions`
--

INSERT INTO `auth_permissions` (`id`, `name`, `description`) VALUES
(1, 'back-office', 'User can access to the administration panel.'),
(2, 'manage-user', 'User can create, delete or modify the users.'),
(3, 'role-permission', 'User can edit and define permissions for a role.'),
(4, 'menu-permission', 'User cand create, delete or modify the menu.'),
(5, 'barang', 'Dapat mengakses menu barang');

-- --------------------------------------------------------

--
-- Table structure for table `auth_reset_attempts`
--

CREATE TABLE `auth_reset_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_tokens`
--

CREATE TABLE `auth_tokens` (
  `id` int(11) UNSIGNED NOT NULL,
  `selector` varchar(255) NOT NULL,
  `hashedValidator` varchar(255) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `expires` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_users_permissions`
--

CREATE TABLE `auth_users_permissions` (
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_users_permissions`
--

INSERT INTO `auth_users_permissions` (`user_id`, `permission_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(2, 1),
(3, 1),
(3, 2),
(3, 3),
(3, 4),
(3, 5),
(4, 2),
(5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `groups_menu`
--

CREATE TABLE `groups_menu` (
  `id` int(11) UNSIGNED NOT NULL,
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `menu_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groups_menu`
--

INSERT INTO `groups_menu` (`id`, `group_id`, `menu_id`) VALUES
(22, 1, 6),
(36, 1, 1),
(37, 3, 1),
(42, 1, 2),
(43, 3, 2),
(44, 1, 3),
(45, 3, 3),
(49, 1, 7),
(52, 1, 4),
(53, 1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) UNSIGNED NOT NULL,
  `parent_id` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `title` varchar(255) DEFAULT NULL,
  `icon` varchar(55) DEFAULT NULL,
  `route` varchar(255) DEFAULT NULL,
  `sequence` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `parent_id`, `active`, `title`, `icon`, `route`, `sequence`, `created_at`, `updated_at`) VALUES
(1, 0, 1, 'Dashboard', 'fas fa-tachometer-alt', '/', 1, '2021-08-26 07:52:10', '2021-09-17 05:10:38'),
(2, 0, 1, 'User Management', 'fas fa-user', '#', 2, '2021-08-26 07:52:10', '2021-09-17 05:10:38'),
(3, 2, 1, 'User Profile', 'fas fa-user-edit', 'user/profile', 3, '2021-08-26 07:52:10', '2021-09-17 05:10:38'),
(4, 2, 1, 'Users', 'fas fa-users', 'user/manage', 6, '2021-08-26 07:52:10', '2021-09-17 05:10:38'),
(5, 2, 1, 'Permissions', 'fas fa-user-lock', 'permission', 4, '2021-08-26 07:52:10', '2021-09-17 05:10:38'),
(6, 2, 1, 'Roles', 'fas fa-users-cog', 'role', 5, '2021-08-26 07:52:10', '2021-09-17 05:10:38'),
(7, 2, 1, 'Menu', 'fas fa-stream', 'menu', 7, '2021-08-26 07:52:10', '2021-09-17 05:10:38');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2017-11-20-223112', 'App\\Database\\Migrations\\CreateAuthTables', 'default', 'App', 1629982330, 1),
(2, '2020-02-03-081118', 'App\\Database\\Migrations\\CreateMenuTable', 'default', 'App', 1629982330, 1),
(3, '2020-02-03-081118', 'agungsugiarto\\boilerplate\\Database\\Migrations\\CreateMenuTable', 'default', 'App', 1631468101, 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `group_id` int(11) UNSIGNED DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `full_name` varchar(50) DEFAULT NULL,
  `password_hash` varchar(255) NOT NULL,
  `reset_hash` varchar(255) DEFAULT NULL,
  `reset_at` datetime DEFAULT NULL,
  `reset_expires` datetime DEFAULT NULL,
  `activate_hash` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `status_message` varchar(255) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `force_pass_reset` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `group_id`, `email`, `username`, `full_name`, `password_hash`, `reset_hash`, `reset_at`, `reset_expires`, `activate_hash`, `status`, `status_message`, `active`, `force_pass_reset`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'iseplutpinur7@gmail.com', 'iseplutpinur', 'Isep Lutpi Nur', '$2y$10$7/TSmqe7.UkrBlcLkjpRoeeBT2inW4q/nMvUvBB/MXUa09gUvghg6', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2021-08-26 07:52:10', '2021-09-17 02:46:31', NULL),
(3, 3, 'administrator@gmail.com', 'administrator', 'Administrator', '$2y$10$4KnIycPrdqYgivXqq4ycVOvV9ythlwhR7Wt4BnnjILmw0iqf2tmR6', 'b11b5612a416b7221b52757f25bcdb84', NULL, '2021-09-15 07:14:54', NULL, NULL, NULL, 1, 0, '2021-08-26 22:23:48', '2021-09-17 04:49:07', NULL),
(5, 3, 'kepegawaian@gmail.com', 'kepegawaian', 'Kepegawaian Nama', '$2y$10$4INuGR5s/kMLO3g65jxXceo4ao8kmOX2gd59CnPvJ3Xyb/uOibmrG', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2021-09-16 08:11:04', '2021-09-17 04:51:54', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_groups`
--
ALTER TABLE `auth_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD KEY `auth_groups_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `group_id_permission_id` (`group_id`,`permission_id`);

--
-- Indexes for table `auth_logins`
--
ALTER TABLE `auth_logins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `auth_permissions`
--
ALTER TABLE `auth_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `auth_tokens_user_id_foreign` (`user_id`),
  ADD KEY `selector` (`selector`);

--
-- Indexes for table `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD KEY `auth_users_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `user_id_permission_id` (`user_id`,`permission_id`);

--
-- Indexes for table `groups_menu`
--
ALTER TABLE `groups_menu`
  ADD KEY `groups_menu_menu_id_foreign` (`menu_id`),
  ADD KEY `groups_menu_group_id_foreign` (`group_id`),
  ADD KEY `id_group_id_menu_id` (`id`,`group_id`,`menu_id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `id_groups` (`group_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auth_groups`
--
ALTER TABLE `auth_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `auth_logins`
--
ALTER TABLE `auth_logins`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `auth_permissions`
--
ALTER TABLE `auth_permissions`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `groups_menu`
--
ALTER TABLE `groups_menu`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD CONSTRAINT `auth_groups_permissions_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD CONSTRAINT `auth_tokens_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD CONSTRAINT `auth_users_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_users_permissions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `groups_menu`
--
ALTER TABLE `groups_menu`
  ADD CONSTRAINT `groups_menu_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `groups_menu_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menu` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;
