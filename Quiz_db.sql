-- --------------------------------------------------------
-- Hôte:                         5.39.64.207
-- Version du serveur:           10.1.13-MariaDB - mariadb.org binary distribution
-- SE du serveur:                Win32
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Listage de la structure de la base pour quiz_db
CREATE DATABASE IF NOT EXISTS `quiz_db` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `quiz_db`;

-- Listage de la structure de table quiz_db. answers
CREATE TABLE IF NOT EXISTS `answers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `topic_id` int(10) unsigned NOT NULL,
  `user_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `user_answer` char(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer` char(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `answers_topic_id_foreign` (`topic_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table quiz_db.answers : ~0 rows (environ)
DELETE FROM `answers`;

-- Listage de la structure de table quiz_db. configs
CREATE TABLE IF NOT EXISTS `configs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `MAIL_FROM_NAME` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `MAIL_DRIVER` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `MAIL_HOST` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `MAIL_PORT` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `MAIL_USERNAME` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `MAIL_FROM_ADDRESS` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `MAIL_PASSWORD` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `MAIL_ENCRYPTION` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table quiz_db.configs : ~0 rows (environ)
DELETE FROM `configs`;

-- Listage de la structure de table quiz_db. copyrighttexts
CREATE TABLE IF NOT EXISTS `copyrighttexts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table quiz_db.copyrighttexts : ~0 rows (environ)
DELETE FROM `copyrighttexts`;
INSERT INTO `copyrighttexts` (`id`, `name`, `created_at`, `updated_at`) VALUES
	(1, '&copy; 2019 Quick Quiz. All Rights Reserved', NULL, '2019-05-24 12:33:51');

-- Listage de la structure de table quiz_db. faq
CREATE TABLE IF NOT EXISTS `faq` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `faq_title_unique` (`title`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table quiz_db.faq : ~0 rows (environ)
DELETE FROM `faq`;

-- Listage de la structure de table quiz_db. migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table quiz_db.migrations : ~15 rows (environ)
DELETE FROM `migrations`;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2017_11_23_160102_create_sessions_table', 1),
	(4, '2017_11_25_133229_create_settings_table', 1),
	(5, '2017_12_03_080242_create_topics_table', 1),
	(6, '2017_12_03_080330_create_tests_table', 1),
	(7, '2017_12_03_091845_create_questions_table', 1),
	(8, '2017_12_03_110511_create_answers_table', 1),
	(9, '2017_12_21_085915_add_image_video_column_to_questions', 2),
	(12, '2019_02_07_113422_create_f_a_qs_table', 4),
	(13, '2019_02_04_122123_create_pages_table', 5),
	(14, '2019_02_12_065327_create_copyrighttexts_table', 6),
	(17, '2019_02_04_100908_create_social_icons_table', 7),
	(18, '2019_02_15_072716_create_config_table', 8),
	(19, '2019_02_12_165455_create_topic_user_table', 9);

-- Listage de la structure de table quiz_db. pages
CREATE TABLE IF NOT EXISTS `pages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `pages_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table quiz_db.pages : ~2 rows (environ)
DELETE FROM `pages`;
INSERT INTO `pages` (`id`, `name`, `details`, `slug`, `status`) VALUES
	(2, 'About us', '<p><strong>About us content goes here</strong></p>', 'about-us', 1),
	(3, 'How it works', '<p><strong>Content Goes here</strong></p>', 'how-it-works', 1);

-- Listage de la structure de table quiz_db. password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table quiz_db.password_resets : ~0 rows (environ)
DELETE FROM `password_resets`;

-- Listage de la structure de table quiz_db. questions
CREATE TABLE IF NOT EXISTS `questions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `topic_id` int(10) unsigned NOT NULL,
  `question` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `a` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `b` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `c` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `d` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code_snippet` text COLLATE utf8mb4_unicode_ci,
  `answer_exp` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `question_img` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `question_video_link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `questions_topic_id_foreign` (`topic_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table quiz_db.questions : ~0 rows (environ)
DELETE FROM `questions`;

-- Listage de la structure de table quiz_db. sessions
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL,
  UNIQUE KEY `sessions_id_unique` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table quiz_db.sessions : ~0 rows (environ)
DELETE FROM `sessions`;

-- Listage de la structure de table quiz_db. settings
CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `logo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `favicon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `welcome_txt` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Quick Quiz',
  `userquiz` tinyint(1) DEFAULT '0',
  `w_email` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency_code` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency_symbol` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google_login` tinyint(1) DEFAULT '0',
  `fb_login` tinyint(1) DEFAULT '0',
  `gitlab_login` tinyint(1) DEFAULT '0',
  `right_setting` tinyint(1) DEFAULT NULL,
  `element_setting` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table quiz_db.settings : ~0 rows (environ)
DELETE FROM `settings`;
INSERT INTO `settings` (`id`, `logo`, `favicon`, `welcome_txt`, `userquiz`, `w_email`, `currency_code`, `currency_symbol`, `google_login`, `fb_login`, `gitlab_login`, `right_setting`, `element_setting`, `created_at`, `updated_at`) VALUES
	(1, 'logo_1512974578qq2.png', 'favicon.ico', 'Quick Quiz', NULL, 'test@gmail.com', 'USD', 'fa fa-dollar', 0, 0, 0, 0, 0, NULL, '2019-05-26 00:34:27');

-- Listage de la structure de table quiz_db. social_icons
CREATE TABLE IF NOT EXISTS `social_icons` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table quiz_db.social_icons : ~0 rows (environ)
DELETE FROM `social_icons`;

-- Listage de la structure de table quiz_db. tests
CREATE TABLE IF NOT EXISTS `tests` (
  `id` int(10) unsigned NOT NULL,
  `user_id` int(11) NOT NULL,
  `topic_id` int(11) NOT NULL,
  `marks` int(11) NOT NULL,
  `total_marks` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table quiz_db.tests : ~0 rows (environ)
DELETE FROM `tests`;

-- Listage de la structure de table quiz_db. topics
CREATE TABLE IF NOT EXISTS `topics` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `per_q_mark` int(11) NOT NULL,
  `timer` int(11) DEFAULT NULL,
  `show_ans` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` float DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table quiz_db.topics : ~0 rows (environ)
DELETE FROM `topics`;

-- Listage de la structure de table quiz_db. topic_user
CREATE TABLE IF NOT EXISTS `topic_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `topic_id` int(10) unsigned NOT NULL,
  `transaction_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `amount` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `topic_user_user_id_foreign` (`user_id`),
  KEY `topic_user_topic_id_foreign` (`topic_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table quiz_db.topic_user : ~0 rows (environ)
DELETE FROM `topic_user`;

-- Listage de la structure de table quiz_db. users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` char(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `users_mobile_unique` (`mobile`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table quiz_db.users : ~2 rows (environ)
DELETE FROM `users`;
INSERT INTO `users` (`id`, `name`, `email`, `password`, `mobile`, `address`, `city`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Admin', 'admin@info.com', '$2y$10$4Y7TLx24XucQirs4RIH2UO0ormaEj1VoP9D3nhsoOialwV.frXrvO', NULL, NULL, NULL, 'A', 'AKUmruXUMKnbn1DamC0lu8a7zExAT5PLNGDoxYKW6mmkSGffB4kGWhdCWnCb', '2017-12-10 17:16:00', '2019-02-12 15:07:00'),
	(3, 'Jhon Doe', 'jhon@info.com', '$2y$10$4Y7TLx24XucQirs4RIH2UO0ormaEj1VoP9D3nhsoOialwV.frXrvO', '123456789', 'ujjain', 'Bhilwara', 'S', 'JU2rscsC5EYjOvjHjyLdTyA8xw66S179GEaRR6QDPvwLDYtcVf10p43TRVcJ', '2017-12-10 17:19:47', '2019-02-18 13:56:46');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
