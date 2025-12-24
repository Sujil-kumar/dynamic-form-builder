-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 24, 2025 at 10:35 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dynamic_forms`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `field_options`
--

CREATE TABLE `field_options` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `field_id` bigint(20) UNSIGNED NOT NULL,
  `option_text` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `field_options`
--

INSERT INTO `field_options` (`id`, `field_id`, `option_text`, `created_at`, `updated_at`) VALUES
(1, 4, 'Male', '2025-12-24 01:29:03', '2025-12-24 01:29:03'),
(2, 4, 'Male', '2025-12-24 01:29:03', '2025-12-24 01:29:03'),
(3, 4, 'Other', '2025-12-24 01:29:03', '2025-12-24 01:29:03'),
(4, 5, 'Fresher', '2025-12-24 01:29:03', '2025-12-24 01:29:03'),
(5, 5, '1-3 years', '2025-12-24 01:29:03', '2025-12-24 01:29:03'),
(6, 6, 'PHP', '2025-12-24 01:29:03', '2025-12-24 01:29:03'),
(7, 6, 'Laravel', '2025-12-24 01:29:03', '2025-12-24 01:29:03'),
(14, 24, 'Male', '2025-12-24 03:45:08', '2025-12-24 03:45:08'),
(15, 24, 'Female', '2025-12-24 03:45:08', '2025-12-24 03:45:08');

-- --------------------------------------------------------

--
-- Table structure for table `forms`
--

CREATE TABLE `forms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `form_name` varchar(255) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `forms`
--

INSERT INTO `forms` (`id`, `form_name`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Job Application Form', 1, '2025-12-24 01:29:03', '2025-12-24 01:29:03'),
(10, 'Example Form', 1, '2025-12-24 03:28:58', '2025-12-24 03:28:58');

-- --------------------------------------------------------

--
-- Table structure for table `form_fields`
--

CREATE TABLE `form_fields` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `form_id` bigint(20) UNSIGNED NOT NULL,
  `form_version_id` bigint(20) UNSIGNED DEFAULT NULL,
  `label` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `required` tinyint(1) NOT NULL DEFAULT 0,
  `placeholder` varchar(255) DEFAULT NULL,
  `sort_order` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `form_fields`
--

INSERT INTO `form_fields` (`id`, `form_id`, `form_version_id`, `label`, `type`, `required`, `placeholder`, `sort_order`, `created_at`, `updated_at`, `is_active`) VALUES
(1, 1, 1, 'Full Name', 'text', 1, 'Enter your full name', 1, '2025-12-24 01:29:03', '2025-12-24 01:44:52', 1),
(2, 1, 1, 'Email Address', 'text', 1, 'example@email.com', 2, '2025-12-24 01:29:03', '2025-12-24 01:44:52', 1),
(3, 1, 1, 'Age', 'number', 0, NULL, 3, '2025-12-24 01:29:03', '2025-12-24 01:44:52', 1),
(4, 1, 1, 'Gender', 'radio', 0, NULL, 4, '2025-12-24 01:29:03', '2025-12-24 01:44:52', 1),
(5, 1, 1, 'Experience Level', 'dropdown', 0, NULL, 5, '2025-12-24 01:29:03', '2025-12-24 01:44:52', 1),
(6, 1, 1, 'Skills', 'checkbox', 0, NULL, 6, '2025-12-24 01:29:03', '2025-12-24 01:44:52', 1),
(19, 10, 9, 'name', 'text', 0, NULL, 1, '2025-12-24 03:28:58', '2025-12-24 03:28:58', 1),
(20, 10, 10, 'name', 'text', 0, NULL, 1, '2025-12-24 03:29:41', '2025-12-24 03:29:41', 1),
(21, 10, 10, 'Email Address', 'text', 0, NULL, 2, '2025-12-24 03:29:41', '2025-12-24 03:29:41', 1),
(22, 10, 11, 'name', 'text', 0, NULL, 1, '2025-12-24 03:30:14', '2025-12-24 03:30:14', 1),
(23, 10, 12, 'name', 'text', 0, NULL, 1, '2025-12-24 03:45:08', '2025-12-24 03:45:08', 1),
(24, 10, 12, 'gender', 'checkbox', 0, NULL, 2, '2025-12-24 03:45:08', '2025-12-24 03:45:08', 1);

-- --------------------------------------------------------

--
-- Table structure for table `form_responses`
--

CREATE TABLE `form_responses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `form_id` bigint(20) UNSIGNED NOT NULL,
  `form_version_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `form_responses`
--

INSERT INTO `form_responses` (`id`, `form_id`, `form_version_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, '2025-12-24 01:29:46', '2025-12-24 01:44:52'),
(8, 10, 9, NULL, '2025-12-24 03:29:11', '2025-12-24 03:29:11'),
(9, 10, 10, NULL, '2025-12-24 03:29:58', '2025-12-24 03:29:58'),
(10, 10, 11, NULL, '2025-12-24 03:30:25', '2025-12-24 03:30:25'),
(11, 10, 12, NULL, '2025-12-24 03:45:48', '2025-12-24 03:45:48');

-- --------------------------------------------------------

--
-- Table structure for table `form_response_values`
--

CREATE TABLE `form_response_values` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `response_id` bigint(20) UNSIGNED NOT NULL,
  `field_id` bigint(20) UNSIGNED NOT NULL,
  `value` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `form_response_values`
--

INSERT INTO `form_response_values` (`id`, `response_id`, `field_id`, `value`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Sujilkumar', '2025-12-24 01:29:46', '2025-12-24 01:29:46'),
(2, 1, 2, 'sujilkumar3003@gmail.com,', '2025-12-24 01:29:46', '2025-12-24 01:29:46'),
(3, 1, 3, '22', '2025-12-24 01:29:46', '2025-12-24 01:29:46'),
(4, 1, 4, 'Male', '2025-12-24 01:29:46', '2025-12-24 01:29:46'),
(5, 1, 5, 'Fresher', '2025-12-24 01:29:46', '2025-12-24 01:29:46'),
(6, 1, 6, 'PHP', '2025-12-24 01:29:46', '2025-12-24 01:29:46'),
(16, 8, 19, 'sujil', '2025-12-24 03:29:11', '2025-12-24 03:29:11'),
(17, 9, 20, 'Sujil', '2025-12-24 03:29:58', '2025-12-24 03:29:58'),
(18, 9, 21, 'email', '2025-12-24 03:29:58', '2025-12-24 03:29:58'),
(19, 10, 22, 'sajin', '2025-12-24 03:30:25', '2025-12-24 03:30:25'),
(20, 11, 23, 'Sajin', '2025-12-24 03:45:48', '2025-12-24 03:45:48'),
(21, 11, 24, 'Male', '2025-12-24 03:45:48', '2025-12-24 03:45:48');

-- --------------------------------------------------------

--
-- Table structure for table `form_versions`
--

CREATE TABLE `form_versions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `form_id` bigint(20) UNSIGNED NOT NULL,
  `version_number` int(10) UNSIGNED NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `form_versions`
--

INSERT INTO `form_versions` (`id`, `form_id`, `version_number`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 0, '2025-12-24 01:44:52', '2025-12-24 03:45:08'),
(9, 10, 1, 0, '2025-12-24 03:28:58', '2025-12-24 03:45:08'),
(10, 10, 2, 0, '2025-12-24 03:29:41', '2025-12-24 03:45:08'),
(11, 10, 3, 0, '2025-12-24 03:30:14', '2025-12-24 03:45:08'),
(12, 10, 4, 1, '2025-12-24 03:45:08', '2025-12-24 03:45:08');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2025_12_17_135535_create_forms_table', 1),
(6, '2025_12_17_135618_create_form_fields_table', 1),
(7, '2025_12_17_135704_create_field_options_table', 1),
(8, '2025_12_17_135746_create_form_responses_table', 1),
(9, '2025_12_17_135832_create_form_response_values_table', 1),
(10, '2025_12_20_021039_add_is_active_to_forms_table', 1),
(11, '2025_12_24_062643_create_form_versions_table', 1),
(12, '2025_12_24_070400_create_form_versions_table', 2),
(13, '2025_12_24_070538_add_form_version_id_to_form_fields_table', 3),
(14, '2025_12_24_070658_add_form_version_id_to_form_responses_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `field_options`
--
ALTER TABLE `field_options`
  ADD PRIMARY KEY (`id`),
  ADD KEY `field_options_field_id_foreign` (`field_id`);

--
-- Indexes for table `forms`
--
ALTER TABLE `forms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `form_fields`
--
ALTER TABLE `form_fields`
  ADD PRIMARY KEY (`id`),
  ADD KEY `form_fields_form_id_foreign` (`form_id`);

--
-- Indexes for table `form_responses`
--
ALTER TABLE `form_responses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `form_responses_form_id_foreign` (`form_id`),
  ADD KEY `form_responses_user_id_foreign` (`user_id`);

--
-- Indexes for table `form_response_values`
--
ALTER TABLE `form_response_values`
  ADD PRIMARY KEY (`id`),
  ADD KEY `form_response_values_response_id_foreign` (`response_id`),
  ADD KEY `form_response_values_field_id_foreign` (`field_id`);

--
-- Indexes for table `form_versions`
--
ALTER TABLE `form_versions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `form_versions_form_id_foreign` (`form_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `field_options`
--
ALTER TABLE `field_options`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `forms`
--
ALTER TABLE `forms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `form_fields`
--
ALTER TABLE `form_fields`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `form_responses`
--
ALTER TABLE `form_responses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `form_response_values`
--
ALTER TABLE `form_response_values`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `form_versions`
--
ALTER TABLE `form_versions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `field_options`
--
ALTER TABLE `field_options`
  ADD CONSTRAINT `field_options_field_id_foreign` FOREIGN KEY (`field_id`) REFERENCES `form_fields` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `form_fields`
--
ALTER TABLE `form_fields`
  ADD CONSTRAINT `form_fields_form_id_foreign` FOREIGN KEY (`form_id`) REFERENCES `forms` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `form_responses`
--
ALTER TABLE `form_responses`
  ADD CONSTRAINT `form_responses_form_id_foreign` FOREIGN KEY (`form_id`) REFERENCES `forms` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `form_responses_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `form_response_values`
--
ALTER TABLE `form_response_values`
  ADD CONSTRAINT `form_response_values_field_id_foreign` FOREIGN KEY (`field_id`) REFERENCES `form_fields` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `form_response_values_response_id_foreign` FOREIGN KEY (`response_id`) REFERENCES `form_responses` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `form_versions`
--
ALTER TABLE `form_versions`
  ADD CONSTRAINT `form_versions_form_id_foreign` FOREIGN KEY (`form_id`) REFERENCES `forms` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
