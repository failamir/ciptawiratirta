-- -------------------------------------------------------------
-- TablePlus 5.5.2(512)
--
-- https://tableplus.com/
--
-- Database: cwtku
-- Generation Time: 2025-06-25 04:24:24.8460
-- -------------------------------------------------------------


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


DROP TABLE IF EXISTS `bc_attrs`;
CREATE TABLE `bc_attrs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `service` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `create_user` bigint(20) DEFAULT NULL,
  `update_user` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `hide_in_single` tinyint(4) DEFAULT NULL,
  `hide_in_filter_search` tinyint(4) DEFAULT NULL,
  `position` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;;

DROP TABLE IF EXISTS `bc_attrs_translations`;
CREATE TABLE `bc_attrs_translations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `origin_id` bigint(20) DEFAULT NULL,
  `locale` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `create_user` bigint(20) DEFAULT NULL,
  `update_user` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `bc_attrs_translations_origin_id_locale_unique` (`origin_id`,`locale`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;;

DROP TABLE IF EXISTS `bc_booking_meta`;
CREATE TABLE `bc_booking_meta` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `booking_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `val` text COLLATE utf8mb4_unicode_ci,
  `create_user` int(11) DEFAULT NULL,
  `update_user` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;;

DROP TABLE IF EXISTS `bc_booking_payments`;
CREATE TABLE `bc_booking_payments` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `booking_id` int(11) DEFAULT NULL,
  `payment_gateway` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `currency` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `converted_amount` decimal(10,2) DEFAULT NULL,
  `converted_currency` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `exchange_rate` decimal(10,2) DEFAULT NULL,
  `status` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logs` text COLLATE utf8mb4_unicode_ci,
  `create_user` int(11) DEFAULT NULL,
  `update_user` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;;

DROP TABLE IF EXISTS `bc_bookings`;
CREATE TABLE `bc_bookings` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vendor_id` int(11) DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `payment_id` int(11) DEFAULT NULL,
  `gateway` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `object_id` int(11) DEFAULT NULL,
  `object_model` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_date` datetime DEFAULT NULL,
  `end_date` datetime DEFAULT NULL,
  `total` decimal(10,2) DEFAULT NULL,
  `total_guests` int(11) DEFAULT NULL,
  `currency` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deposit` decimal(10,2) DEFAULT NULL,
  `deposit_type` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `commission` decimal(10,2) DEFAULT NULL,
  `commission_type` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_notes` text COLLATE utf8mb4_unicode_ci,
  `create_user` int(11) DEFAULT NULL,
  `update_user` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `object_child_id` bigint(20) DEFAULT NULL,
  `number` smallint(6) DEFAULT NULL,
  `paid` decimal(10,2) DEFAULT NULL,
  `pay_now` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;;

DROP TABLE IF EXISTS `bc_candidate_categories`;
CREATE TABLE `bc_candidate_categories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `origin_id` bigint(20) unsigned NOT NULL,
  `cat_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;;

DROP TABLE IF EXISTS `bc_candidate_contact`;
CREATE TABLE `bc_candidate_contact` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `origin_id` bigint(20) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci,
  `status` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `create_user` int(11) DEFAULT NULL,
  `update_user` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `contact_to` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `object_id` bigint(20) DEFAULT NULL,
  `object_model` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;;

DROP TABLE IF EXISTS `bc_candidate_cvs`;
CREATE TABLE `bc_candidate_cvs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `file_id` int(11) DEFAULT NULL,
  `origin_id` int(10) unsigned NOT NULL,
  `is_default` tinyint(4) DEFAULT NULL,
  `create_user` int(11) DEFAULT NULL,
  `update_user` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;;

DROP TABLE IF EXISTS `bc_candidate_skills`;
CREATE TABLE `bc_candidate_skills` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `origin_id` bigint(20) unsigned NOT NULL,
  `skill_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;;

DROP TABLE IF EXISTS `bc_candidate_translation`;
CREATE TABLE `bc_candidate_translation` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `origin_id` int(10) unsigned NOT NULL,
  `locale` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bio` text COLLATE utf8mb4_unicode_ci,
  `create_user` int(11) DEFAULT NULL,
  `update_user` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `bc_candidate_translation_locale_index` (`locale`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;;

DROP TABLE IF EXISTS `bc_candidates`;
CREATE TABLE `bc_candidates` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gallery` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `allow_search` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `education` text COLLATE utf8mb4_unicode_ci,
  `experience` text COLLATE utf8mb4_unicode_ci,
  `award` text COLLATE utf8mb4_unicode_ci,
  `social_media` text COLLATE utf8mb4_unicode_ci,
  `languages` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `education_level` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `experience_year` int(11) DEFAULT NULL,
  `expected_salary` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `salary_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location_id` bigint(20) DEFAULT NULL,
  `map_lat` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `map_lng` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `map_zoom` int(11) DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `create_user` int(11) DEFAULT NULL,
  `update_user` int(11) DEFAULT NULL,
  `slug` varchar(255) CHARACTER SET utf8 NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `origin_id` bigint(20) DEFAULT NULL,
  `lang` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `video_cover_id` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `bc_candidates_slug_index` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;;

DROP TABLE IF EXISTS `bc_categories`;
CREATE TABLE `bc_categories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `origin_id` bigint(20) DEFAULT NULL,
  `icon` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lang` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `_lft` int(10) unsigned NOT NULL DEFAULT '0',
  `_rgt` int(10) unsigned NOT NULL DEFAULT '0',
  `parent_id` int(10) unsigned DEFAULT NULL,
  `create_user` int(11) DEFAULT NULL,
  `update_user` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `bc_categories__lft__rgt_parent_id_index` (`_lft`,`_rgt`,`parent_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;;

DROP TABLE IF EXISTS `bc_category_translations`;
CREATE TABLE `bc_category_translations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `origin_id` int(10) unsigned NOT NULL,
  `locale` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci,
  `create_user` int(11) DEFAULT NULL,
  `update_user` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `bc_category_translations_locale_index` (`locale`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;;

DROP TABLE IF EXISTS `bc_companies`;
CREATE TABLE `bc_companies` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar_id` bigint(20) DEFAULT NULL,
  `cover_id` bigint(20) DEFAULT NULL,
  `founded_in` date DEFAULT NULL,
  `allow_search` tinyint(4) DEFAULT '0',
  `is_featured` tinyint(4) DEFAULT '0',
  `owner_id` bigint(20) DEFAULT NULL,
  `location_id` bigint(20) DEFAULT NULL,
  `category_id` bigint(20) DEFAULT NULL,
  `about` text COLLATE utf8mb4_unicode_ci,
  `social_media` text COLLATE utf8mb4_unicode_ci,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip_code` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `status` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `map_lat` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `map_lng` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gallery` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_verified` smallint(6) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `create_user` int(11) DEFAULT NULL,
  `update_user` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `review_score` decimal(2,1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `bc_companies_slug_index` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;;

DROP TABLE IF EXISTS `bc_company_categories`;
CREATE TABLE `bc_company_categories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `origin_id` bigint(20) DEFAULT NULL,
  `icon` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lang` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `_lft` int(10) unsigned NOT NULL DEFAULT '0',
  `_rgt` int(10) unsigned NOT NULL DEFAULT '0',
  `parent_id` int(10) unsigned DEFAULT NULL,
  `create_user` int(11) DEFAULT NULL,
  `update_user` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `bc_company_categories__lft__rgt_parent_id_index` (`_lft`,`_rgt`,`parent_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;;

DROP TABLE IF EXISTS `bc_company_category_translations`;
CREATE TABLE `bc_company_category_translations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `origin_id` int(10) unsigned NOT NULL,
  `locale` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci,
  `create_user` int(11) DEFAULT NULL,
  `update_user` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `bc_company_category_translations_locale_index` (`locale`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;;

DROP TABLE IF EXISTS `bc_company_term`;
CREATE TABLE `bc_company_term` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `term_id` int(11) DEFAULT NULL,
  `company_id` int(11) DEFAULT NULL,
  `create_user` bigint(20) DEFAULT NULL,
  `update_user` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;;

DROP TABLE IF EXISTS `bc_company_translations`;
CREATE TABLE `bc_company_translations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `origin_id` int(10) unsigned NOT NULL,
  `locale` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about` text COLLATE utf8mb4_unicode_ci,
  `create_user` int(11) DEFAULT NULL,
  `update_user` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `bc_company_translations_locale_index` (`locale`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;;

DROP TABLE IF EXISTS `bc_contact`;
CREATE TABLE `bc_contact` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci,
  `status` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `create_user` int(11) DEFAULT NULL,
  `update_user` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;;

DROP TABLE IF EXISTS `bc_customer_reports`;
CREATE TABLE `bc_customer_reports` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `service_id` bigint(20) DEFAULT NULL,
  `service_type` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `create_user` int(11) DEFAULT NULL,
  `update_user` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;;

DROP TABLE IF EXISTS `bc_gig_cat`;
CREATE TABLE `bc_gig_cat` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_id` bigint(20) DEFAULT NULL,
  `faqs` text COLLATE utf8mb4_unicode_ci,
  `news_cat_id` bigint(20) DEFAULT NULL,
  `_lft` int(10) unsigned NOT NULL DEFAULT '0',
  `_rgt` int(10) unsigned NOT NULL DEFAULT '0',
  `parent_id` int(10) unsigned DEFAULT NULL,
  `create_user` int(11) DEFAULT NULL,
  `update_user` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `bc_gig_cat_slug_unique` (`slug`),
  KEY `bc_gig_cat__lft__rgt_parent_id_index` (`_lft`,`_rgt`,`parent_id`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;;

DROP TABLE IF EXISTS `bc_gig_cat_trans`;
CREATE TABLE `bc_gig_cat_trans` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `origin_id` bigint(20) DEFAULT NULL,
  `locale` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci,
  `create_user` int(11) DEFAULT NULL,
  `update_user` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `faqs` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`),
  UNIQUE KEY `bc_gig_cat_trans_origin_id_locale_unique` (`origin_id`,`locale`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;;

DROP TABLE IF EXISTS `bc_gig_cat_type_trans`;
CREATE TABLE `bc_gig_cat_type_trans` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `origin_id` bigint(20) DEFAULT NULL,
  `locale` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci,
  `create_user` int(11) DEFAULT NULL,
  `update_user` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `bc_gig_cat_type_trans_origin_id_locale_unique` (`origin_id`,`locale`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;;

DROP TABLE IF EXISTS `bc_gig_cat_types`;
CREATE TABLE `bc_gig_cat_types` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_id` bigint(20) DEFAULT NULL,
  `cat_id` bigint(20) DEFAULT NULL,
  `cat_children` text COLLATE utf8mb4_unicode_ci,
  `_lft` int(10) unsigned NOT NULL DEFAULT '0',
  `_rgt` int(10) unsigned NOT NULL DEFAULT '0',
  `parent_id` int(10) unsigned DEFAULT NULL,
  `create_user` int(11) DEFAULT NULL,
  `update_user` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `bc_gig_cat_types_slug_unique` (`slug`),
  KEY `bc_gig_cat_types__lft__rgt_parent_id_index` (`_lft`,`_rgt`,`parent_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;;

DROP TABLE IF EXISTS `bc_gig_order_activities`;
CREATE TABLE `bc_gig_order_activities` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `gig_order_id` bigint(20) DEFAULT NULL,
  `type` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci,
  `user_id` bigint(20) DEFAULT NULL,
  `file_ids` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta` text COLLATE utf8mb4_unicode_ci,
  `create_user` int(11) DEFAULT NULL,
  `update_user` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `bc_gig_order_activities_gig_order_id_index` (`gig_order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;;

DROP TABLE IF EXISTS `bc_gig_orders`;
CREATE TABLE `bc_gig_orders` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` bigint(20) DEFAULT NULL,
  `order_item_id` bigint(20) DEFAULT NULL,
  `gig_id` bigint(20) DEFAULT NULL,
  `author_id` bigint(20) DEFAULT NULL,
  `customer_id` bigint(20) DEFAULT NULL,
  `revision` int(11) DEFAULT NULL,
  `delivery_time` int(11) DEFAULT NULL,
  `delivery_date` timestamp NULL DEFAULT NULL,
  `package` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `total` decimal(10,2) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `extra_prices` text COLLATE utf8mb4_unicode_ci,
  `requirements` text COLLATE utf8mb4_unicode_ci,
  `status` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta` text COLLATE utf8mb4_unicode_ci,
  `start_date` timestamp NULL DEFAULT NULL,
  `last_delivered` timestamp NULL DEFAULT NULL,
  `is_on_time` tinyint(4) DEFAULT '0',
  `create_user` int(11) DEFAULT NULL,
  `update_user` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `payout_id` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `bc_gig_orders_gig_id_order_item_id_unique` (`gig_id`,`order_item_id`),
  KEY `bc_gig_orders_customer_id_index` (`customer_id`),
  KEY `bc_gig_orders_author_id_index` (`author_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;;

DROP TABLE IF EXISTS `bc_gig_tags`;
CREATE TABLE `bc_gig_tags` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tag_id` int(11) DEFAULT NULL,
  `target_id` int(11) DEFAULT NULL,
  `create_user` bigint(20) DEFAULT NULL,
  `update_user` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;;

DROP TABLE IF EXISTS `bc_gig_term`;
CREATE TABLE `bc_gig_term` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `term_id` int(11) DEFAULT NULL,
  `target_id` int(11) DEFAULT NULL,
  `create_user` bigint(20) DEFAULT NULL,
  `update_user` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;;

DROP TABLE IF EXISTS `bc_gig_translations`;
CREATE TABLE `bc_gig_translations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `origin_id` int(10) unsigned NOT NULL,
  `locale` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci,
  `packages` text COLLATE utf8mb4_unicode_ci,
  `package_compare` text COLLATE utf8mb4_unicode_ci,
  `faqs` text COLLATE utf8mb4_unicode_ci,
  `requirements` text COLLATE utf8mb4_unicode_ci,
  `create_user` bigint(20) DEFAULT NULL,
  `update_user` bigint(20) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `bc_gig_translations_locale_index` (`locale`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;;

DROP TABLE IF EXISTS `bc_gigs`;
CREATE TABLE `bc_gigs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) CHARACTER SET utf8 NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci,
  `image_id` int(11) DEFAULT NULL,
  `banner_image_id` int(11) DEFAULT NULL,
  `is_featured` tinyint(4) DEFAULT NULL,
  `gallery` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cat_id` bigint(20) DEFAULT NULL,
  `cat2_id` bigint(20) DEFAULT NULL,
  `cat3_id` bigint(20) DEFAULT NULL,
  `basic_price` decimal(12,2) DEFAULT NULL,
  `standard_price` decimal(12,2) DEFAULT NULL,
  `premium_price` decimal(12,2) DEFAULT NULL,
  `extra_price` text COLLATE utf8mb4_unicode_ci,
  `review_score` decimal(2,1) DEFAULT NULL,
  `status` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `packages` text COLLATE utf8mb4_unicode_ci,
  `package_compare` text COLLATE utf8mb4_unicode_ci,
  `faqs` text COLLATE utf8mb4_unicode_ci,
  `requirements` text COLLATE utf8mb4_unicode_ci,
  `basic_delivery_time` int(11) DEFAULT NULL,
  `create_user` bigint(20) DEFAULT NULL,
  `update_user` bigint(20) DEFAULT NULL,
  `author_id` bigint(20) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `bc_gigs_slug_unique` (`slug`),
  KEY `bc_gigs_status_cat2_id_index` (`status`,`cat2_id`),
  KEY `bc_gigs_status_cat3_id_index` (`status`,`cat3_id`),
  KEY `bc_gigs_status_author_id_index` (`status`,`author_id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;;

DROP TABLE IF EXISTS `bc_job_alert_queries`;
CREATE TABLE `bc_job_alert_queries` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `hash` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `query` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `create_user` int(11) DEFAULT NULL,
  `update_user` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `bc_job_alert_queries_hash_unique` (`hash`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;;

DROP TABLE IF EXISTS `bc_job_alerts`;
CREATE TABLE `bc_job_alerts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `frequency` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT 'daily',
  `query_id` bigint(20) NOT NULL,
  `locale` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT 'en',
  `create_user` int(11) DEFAULT NULL,
  `update_user` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `bc_job_alerts_user_id_index` (`user_id`),
  KEY `bc_job_alerts_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;;

DROP TABLE IF EXISTS `bc_job_candidates`;
CREATE TABLE `bc_job_candidates` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `job_id` bigint(20) NOT NULL,
  `candidate_id` bigint(20) NOT NULL,
  `cv_id` bigint(20) NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_id` bigint(20) DEFAULT NULL,
  `create_user` int(11) DEFAULT NULL,
  `update_user` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;;

DROP TABLE IF EXISTS `bc_job_categories`;
CREATE TABLE `bc_job_categories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `origin_id` bigint(20) DEFAULT NULL,
  `icon` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lang` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `_lft` int(10) unsigned NOT NULL DEFAULT '0',
  `_rgt` int(10) unsigned NOT NULL DEFAULT '0',
  `parent_id` int(10) unsigned DEFAULT NULL,
  `create_user` int(11) DEFAULT NULL,
  `update_user` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `bc_job_categories__lft__rgt_parent_id_index` (`_lft`,`_rgt`,`parent_id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;;

DROP TABLE IF EXISTS `bc_job_category_translations`;
CREATE TABLE `bc_job_category_translations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `origin_id` int(10) unsigned NOT NULL,
  `locale` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci,
  `create_user` int(11) DEFAULT NULL,
  `update_user` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `bc_job_category_translations_locale_index` (`locale`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;;

DROP TABLE IF EXISTS `bc_job_skills`;
CREATE TABLE `bc_job_skills` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `job_id` bigint(20) unsigned NOT NULL,
  `skill_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;;

DROP TABLE IF EXISTS `bc_job_translations`;
CREATE TABLE `bc_job_translations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `origin_id` bigint(20) NOT NULL,
  `locale` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` text COLLATE utf8mb4_unicode_ci,
  `content` text COLLATE utf8mb4_unicode_ci,
  `create_user` bigint(20) DEFAULT NULL,
  `update_user` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `qualification` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;;

DROP TABLE IF EXISTS `bc_job_type_translations`;
CREATE TABLE `bc_job_type_translations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `origin_id` bigint(20) DEFAULT NULL,
  `locale` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `create_user` int(11) DEFAULT NULL,
  `update_user` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `bc_job_type_translations_origin_id_locale_unique` (`origin_id`,`locale`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;;

DROP TABLE IF EXISTS `bc_job_types`;
CREATE TABLE `bc_job_types` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` text COLLATE utf8mb4_unicode_ci,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `create_user` int(11) DEFAULT NULL,
  `update_user` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;;

DROP TABLE IF EXISTS `bc_jobs`;
CREATE TABLE `bc_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` text COLLATE utf8mb4_unicode_ci,
  `slug` varchar(255) CHARACTER SET utf8 NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci,
  `category_id` bigint(20) DEFAULT NULL,
  `thumbnail_id` bigint(20) DEFAULT NULL,
  `location_id` bigint(20) DEFAULT NULL,
  `company_id` bigint(20) DEFAULT NULL,
  `job_type_id` bigint(20) DEFAULT NULL,
  `expiration_date` datetime DEFAULT NULL,
  `hours` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hours_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `salary_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `salary_min` decimal(15,2) DEFAULT NULL,
  `salary_max` decimal(15,2) DEFAULT NULL,
  `gender` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `map_lat` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `map_lng` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `map_zoom` int(11) DEFAULT NULL,
  `experience` double(8,2) DEFAULT NULL,
  `is_featured` tinyint(4) DEFAULT NULL,
  `is_urgent` tinyint(4) DEFAULT NULL,
  `status` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `create_user` int(11) DEFAULT NULL,
  `update_user` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `apply_type` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `apply_link` text COLLATE utf8mb4_unicode_ci,
  `apply_email` text COLLATE utf8mb4_unicode_ci,
  `gallery` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video` text COLLATE utf8mb4_unicode_ci,
  `video_cover_id` bigint(20) DEFAULT NULL,
  `number_recruitments` int(11) DEFAULT NULL,
  `is_approved` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT 'approved',
  `qualification` text COLLATE utf8mb4_unicode_ci,
  `wage_agreement` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `bc_jobs_slug_index` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;;

DROP TABLE IF EXISTS `bc_location_translations`;
CREATE TABLE `bc_location_translations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `origin_id` bigint(20) DEFAULT NULL,
  `locale` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci,
  `create_user` int(11) DEFAULT NULL,
  `update_user` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `bc_location_translations_origin_id_locale_unique` (`origin_id`,`locale`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;;

DROP TABLE IF EXISTS `bc_locations`;
CREATE TABLE `bc_locations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_id` int(11) DEFAULT NULL,
  `map_lat` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `map_lng` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `map_zoom` int(11) DEFAULT NULL,
  `status` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `_lft` int(10) unsigned NOT NULL DEFAULT '0',
  `_rgt` int(10) unsigned NOT NULL DEFAULT '0',
  `parent_id` int(10) unsigned DEFAULT NULL,
  `create_user` int(11) DEFAULT NULL,
  `update_user` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `origin_id` bigint(20) DEFAULT NULL,
  `lang` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `zipcode` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `bc_locations__lft__rgt_parent_id_index` (`_lft`,`_rgt`,`parent_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;;

DROP TABLE IF EXISTS `bc_order_items`;
CREATE TABLE `bc_order_items` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` bigint(20) DEFAULT NULL,
  `object_id` bigint(20) DEFAULT NULL,
  `object_model` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `qty` int(11) DEFAULT '1',
  `subtotal` decimal(10,2) DEFAULT NULL,
  `status` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta` text COLLATE utf8mb4_unicode_ci,
  `create_user` int(11) DEFAULT NULL,
  `update_user` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;;

DROP TABLE IF EXISTS `bc_order_meta`;
CREATE TABLE `bc_order_meta` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `val` text COLLATE utf8mb4_unicode_ci,
  `create_user` int(11) DEFAULT NULL,
  `update_user` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;;

DROP TABLE IF EXISTS `bc_orders`;
CREATE TABLE `bc_orders` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `customer_id` bigint(20) DEFAULT NULL,
  `subtotal` decimal(10,2) DEFAULT NULL,
  `total` decimal(10,2) DEFAULT NULL,
  `payment_id` bigint(20) DEFAULT NULL,
  `gateway` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paid` decimal(10,2) DEFAULT NULL,
  `billing` text COLLATE utf8mb4_unicode_ci,
  `create_user` int(11) DEFAULT NULL,
  `update_user` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;;

DROP TABLE IF EXISTS `bc_payment_meta`;
CREATE TABLE `bc_payment_meta` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `payment_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `val` text COLLATE utf8mb4_unicode_ci,
  `create_user` int(11) DEFAULT NULL,
  `update_user` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;;

DROP TABLE IF EXISTS `bc_payments`;
CREATE TABLE `bc_payments` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `object_id` bigint(20) DEFAULT NULL,
  `object_model` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gateway` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `currency` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `converted_amount` decimal(10,2) DEFAULT NULL,
  `converted_currency` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `exchange_rate` decimal(10,2) DEFAULT NULL,
  `status` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logs` text COLLATE utf8mb4_unicode_ci,
  `create_user` int(11) DEFAULT NULL,
  `update_user` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;;

DROP TABLE IF EXISTS `bc_plan_trans`;
CREATE TABLE `bc_plan_trans` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci,
  `create_user` bigint(20) DEFAULT NULL,
  `update_user` bigint(20) DEFAULT NULL,
  `origin_id` int(10) unsigned NOT NULL,
  `locale` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `bc_plan_trans_origin_id_locale_unique` (`origin_id`,`locale`),
  KEY `bc_plan_trans_locale_index` (`locale`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;;

DROP TABLE IF EXISTS `bc_plans`;
CREATE TABLE `bc_plans` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci,
  `price` decimal(12,2) DEFAULT NULL,
  `duration` int(11) DEFAULT '0',
  `duration_type` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `annual_price` decimal(12,2) DEFAULT NULL,
  `max_service` int(11) DEFAULT '0',
  `status` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_id` bigint(20) DEFAULT NULL,
  `is_recommended` tinyint(4) DEFAULT '1',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `create_user` bigint(20) DEFAULT NULL,
  `update_user` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `annual_max_service` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;;

DROP TABLE IF EXISTS `bc_review`;
CREATE TABLE `bc_review` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `object_id` int(11) DEFAULT NULL,
  `object_model` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci,
  `rate_number` int(11) DEFAULT NULL,
  `author_ip` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `publish_date` datetime DEFAULT NULL,
  `create_user` bigint(20) DEFAULT NULL,
  `update_user` bigint(20) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `lang` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `vendor_id` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;;

DROP TABLE IF EXISTS `bc_review_meta`;
CREATE TABLE `bc_review_meta` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `review_id` int(11) DEFAULT NULL,
  `object_id` int(11) DEFAULT NULL,
  `object_model` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `val` text COLLATE utf8mb4_unicode_ci,
  `create_user` int(11) DEFAULT NULL,
  `update_user` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=301 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;;

DROP TABLE IF EXISTS `bc_seo`;
CREATE TABLE `bc_seo` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `object_id` int(11) DEFAULT NULL,
  `object_model` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_index` tinyint(4) DEFAULT NULL,
  `seo_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_desc` text COLLATE utf8mb4_unicode_ci,
  `seo_image` int(11) DEFAULT NULL,
  `seo_share` text COLLATE utf8mb4_unicode_ci,
  `create_user` bigint(20) DEFAULT NULL,
  `update_user` bigint(20) DEFAULT NULL,
  `origin_id` bigint(20) DEFAULT NULL,
  `lang` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;;

DROP TABLE IF EXISTS `bc_service_translations`;
CREATE TABLE `bc_service_translations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `origin_id` bigint(20) DEFAULT NULL,
  `locale` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `content` text COLLATE utf8mb4_unicode_ci,
  `create_user` int(11) DEFAULT NULL,
  `update_user` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `bc_service_translations_origin_id_locale_unique` (`origin_id`,`locale`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;;

DROP TABLE IF EXISTS `bc_services`;
CREATE TABLE `bc_services` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) CHARACTER SET utf8 NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `location_id` int(11) DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `map_lat` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `map_lng` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_featured` tinyint(4) DEFAULT NULL,
  `star_rate` tinyint(4) DEFAULT NULL,
  `price` decimal(12,2) DEFAULT NULL,
  `sale_price` decimal(12,2) DEFAULT NULL,
  `min_people` int(11) DEFAULT NULL,
  `max_people` int(11) DEFAULT NULL,
  `max_guests` int(11) DEFAULT NULL,
  `review_score` int(11) DEFAULT NULL,
  `min_day_before_booking` int(11) DEFAULT NULL,
  `min_day_stays` int(11) DEFAULT NULL,
  `object_id` int(11) DEFAULT NULL,
  `object_model` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `create_user` int(11) DEFAULT NULL,
  `update_user` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `bc_services_slug_index` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;;

DROP TABLE IF EXISTS `bc_skill_translations`;
CREATE TABLE `bc_skill_translations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `origin_id` bigint(20) DEFAULT NULL,
  `locale` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `create_user` int(11) DEFAULT NULL,
  `update_user` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `bc_skill_translations_origin_id_locale_unique` (`origin_id`,`locale`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;;

DROP TABLE IF EXISTS `bc_skills`;
CREATE TABLE `bc_skills` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `create_user` int(11) DEFAULT NULL,
  `update_user` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;;

DROP TABLE IF EXISTS `bc_terms`;
CREATE TABLE `bc_terms` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci,
  `attr_id` int(11) DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `create_user` bigint(20) DEFAULT NULL,
  `update_user` bigint(20) DEFAULT NULL,
  `origin_id` bigint(20) DEFAULT NULL,
  `lang` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `icon` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `image_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;;

DROP TABLE IF EXISTS `bc_terms_translations`;
CREATE TABLE `bc_terms_translations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `origin_id` bigint(20) DEFAULT NULL,
  `locale` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci,
  `create_user` bigint(20) DEFAULT NULL,
  `update_user` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `bc_terms_translations_origin_id_locale_unique` (`origin_id`,`locale`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;;

DROP TABLE IF EXISTS `core_inbox`;
CREATE TABLE `core_inbox` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `from_user` bigint(20) DEFAULT NULL,
  `to_user` bigint(20) DEFAULT NULL,
  `object_id` bigint(20) DEFAULT NULL,
  `object_model` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` tinyint(4) DEFAULT '0',
  `create_user` int(11) DEFAULT NULL,
  `update_user` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;;

DROP TABLE IF EXISTS `core_inbox_messages`;
CREATE TABLE `core_inbox_messages` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `inbox_id` bigint(20) DEFAULT NULL,
  `from_user` bigint(20) DEFAULT NULL,
  `to_user` bigint(20) DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci,
  `type` tinyint(4) DEFAULT '0',
  `is_read` tinyint(4) DEFAULT '0',
  `create_user` int(11) DEFAULT NULL,
  `update_user` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;;

DROP TABLE IF EXISTS `core_languages`;
CREATE TABLE `core_languages` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `locale` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `flag` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `create_user` int(11) DEFAULT NULL,
  `update_user` int(11) DEFAULT NULL,
  `last_build_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;;

DROP TABLE IF EXISTS `core_menu_translations`;
CREATE TABLE `core_menu_translations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `origin_id` int(10) unsigned NOT NULL,
  `locale` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `items` longtext COLLATE utf8mb4_unicode_ci,
  `create_user` int(11) DEFAULT NULL,
  `update_user` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `core_menu_translations_locale_index` (`locale`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;;

DROP TABLE IF EXISTS `core_menus`;
CREATE TABLE `core_menus` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `items` longtext COLLATE utf8mb4_unicode_ci,
  `create_user` int(11) DEFAULT NULL,
  `update_user` int(11) DEFAULT NULL,
  `origin_id` bigint(20) DEFAULT NULL,
  `lang` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;;

DROP TABLE IF EXISTS `core_news`;
CREATE TABLE `core_news` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cat_id` int(11) DEFAULT NULL,
  `image_id` int(11) DEFAULT NULL,
  `banner_id` int(11) DEFAULT NULL,
  `create_user` int(11) DEFAULT NULL,
  `update_user` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `origin_id` bigint(20) DEFAULT NULL,
  `lang` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;;

DROP TABLE IF EXISTS `core_news_category`;
CREATE TABLE `core_news_category` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `_lft` int(10) unsigned NOT NULL DEFAULT '0',
  `_rgt` int(10) unsigned NOT NULL DEFAULT '0',
  `parent_id` int(10) unsigned DEFAULT NULL,
  `create_user` int(11) DEFAULT NULL,
  `update_user` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `origin_id` bigint(20) DEFAULT NULL,
  `lang` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `core_news_category__lft__rgt_parent_id_index` (`_lft`,`_rgt`,`parent_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;;

DROP TABLE IF EXISTS `core_news_category_translations`;
CREATE TABLE `core_news_category_translations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `origin_id` int(10) unsigned NOT NULL,
  `locale` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci,
  `create_user` int(11) DEFAULT NULL,
  `update_user` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `core_news_category_translations_locale_index` (`locale`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;;

DROP TABLE IF EXISTS `core_news_tag`;
CREATE TABLE `core_news_tag` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `news_id` int(11) DEFAULT NULL,
  `tag_id` int(11) DEFAULT NULL,
  `create_user` int(11) DEFAULT NULL,
  `update_user` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;;

DROP TABLE IF EXISTS `core_news_translations`;
CREATE TABLE `core_news_translations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `origin_id` int(10) unsigned NOT NULL,
  `locale` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci,
  `create_user` int(11) DEFAULT NULL,
  `update_user` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `core_news_translations_locale_index` (`locale`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;;

DROP TABLE IF EXISTS `core_notifications`;
CREATE TABLE `core_notifications` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `from_user` bigint(20) DEFAULT NULL,
  `to_user` bigint(20) DEFAULT NULL,
  `is_read` tinyint(4) DEFAULT '0',
  `type` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type_group` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `target_id` bigint(20) DEFAULT NULL,
  `target_parent_id` bigint(20) DEFAULT NULL,
  `params` text COLLATE utf8mb4_unicode_ci,
  `create_user` int(11) DEFAULT NULL,
  `update_user` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;;

DROP TABLE IF EXISTS `core_page_translations`;
CREATE TABLE `core_page_translations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `origin_id` int(10) unsigned NOT NULL,
  `locale` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci,
  `short_desc` text COLLATE utf8mb4_unicode_ci,
  `create_user` bigint(20) DEFAULT NULL,
  `update_user` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `core_page_translations_origin_id_locale_unique` (`origin_id`,`locale`),
  KEY `core_page_translations_locale_index` (`locale`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;;

DROP TABLE IF EXISTS `core_pages`;
CREATE TABLE `core_pages` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `slug` varchar(255) CHARACTER SET utf8 NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci,
  `short_desc` text COLLATE utf8mb4_unicode_ci,
  `status` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `publish_date` datetime DEFAULT NULL,
  `image_id` int(11) DEFAULT NULL,
  `template_id` int(11) DEFAULT NULL,
  `show_template` tinyint(4) DEFAULT NULL,
  `header_style` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `footer_style` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `create_user` bigint(20) DEFAULT NULL,
  `update_user` bigint(20) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `origin_id` bigint(20) DEFAULT NULL,
  `lang` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `custom_logo` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `core_pages_slug_index` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;;

DROP TABLE IF EXISTS `core_role_permissions`;
CREATE TABLE `core_role_permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `role_id` int(10) unsigned DEFAULT NULL,
  `permission` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `create_user` int(11) DEFAULT NULL,
  `update_user` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `core_role_permissions_role_id_permission_unique` (`role_id`,`permission`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;;

DROP TABLE IF EXISTS `core_roles`;
CREATE TABLE `core_roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `create_user` int(11) DEFAULT NULL,
  `update_user` int(11) DEFAULT NULL,
  `status` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `core_roles_code_unique` (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;;

DROP TABLE IF EXISTS `core_settings`;
CREATE TABLE `core_settings` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `group` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `val` text COLLATE utf8mb4_unicode_ci,
  `autoload` tinyint(4) DEFAULT NULL,
  `create_user` int(11) DEFAULT NULL,
  `update_user` int(11) DEFAULT NULL,
  `lang` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=128 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;;

DROP TABLE IF EXISTS `core_subscribers`;
CREATE TABLE `core_subscribers` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `create_user` int(11) DEFAULT NULL,
  `update_user` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;;

DROP TABLE IF EXISTS `core_tag_translations`;
CREATE TABLE `core_tag_translations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `origin_id` int(10) unsigned NOT NULL,
  `locale` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci,
  `create_user` int(11) DEFAULT NULL,
  `update_user` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `core_tag_translations_locale_index` (`locale`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;;

DROP TABLE IF EXISTS `core_tags`;
CREATE TABLE `core_tags` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `create_user` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `update_user` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `origin_id` bigint(20) DEFAULT NULL,
  `lang` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;;

DROP TABLE IF EXISTS `core_template_translations`;
CREATE TABLE `core_template_translations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `origin_id` int(10) unsigned NOT NULL,
  `locale` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci,
  `create_user` int(11) DEFAULT NULL,
  `update_user` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `core_template_translations_locale_index` (`locale`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;;

DROP TABLE IF EXISTS `core_templates`;
CREATE TABLE `core_templates` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci,
  `type_id` int(11) DEFAULT NULL,
  `create_user` int(11) DEFAULT NULL,
  `update_user` int(11) DEFAULT NULL,
  `origin_id` bigint(20) DEFAULT NULL,
  `lang` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;;

DROP TABLE IF EXISTS `core_translations`;
CREATE TABLE `core_translations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `locale` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `string` text COLLATE utf8mb4_unicode_ci,
  `parent_id` bigint(20) DEFAULT NULL,
  `create_user` int(11) DEFAULT NULL,
  `update_user` int(11) DEFAULT NULL,
  `last_build_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;;

DROP TABLE IF EXISTS `jobs`;
CREATE TABLE `jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) unsigned NOT NULL,
  `reserved_at` int(10) unsigned DEFAULT NULL,
  `available_at` int(10) unsigned NOT NULL,
  `created_at` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;;

DROP TABLE IF EXISTS `media_files`;
CREATE TABLE `media_files` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `file_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_size` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_extension` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `create_user` int(11) DEFAULT NULL,
  `update_user` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `app_id` int(11) DEFAULT NULL,
  `app_user_id` int(11) DEFAULT NULL,
  `file_width` int(11) DEFAULT NULL,
  `file_height` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `folder_id` bigint(20) DEFAULT '0',
  `driver` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=179 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;;

DROP TABLE IF EXISTS `media_folders`;
CREATE TABLE `media_folders` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` bigint(20) DEFAULT '0',
  `user_id` bigint(20) DEFAULT NULL,
  `create_user` int(11) DEFAULT NULL,
  `update_user` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `media_folders_parent_id_name_unique` (`parent_id`,`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;;

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;;

DROP TABLE IF EXISTS `notifications`;
CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint(20) unsigned NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;;

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;;

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;;

DROP TABLE IF EXISTS `user_meta`;
CREATE TABLE `user_meta` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `val` text COLLATE utf8mb4_unicode_ci,
  `create_user` int(11) DEFAULT NULL,
  `update_user` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;;

DROP TABLE IF EXISTS `user_plan`;
CREATE TABLE `user_plan` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `plan_id` bigint(20) NOT NULL,
  `start_date` timestamp NULL DEFAULT NULL,
  `end_date` timestamp NULL DEFAULT NULL,
  `max_service` int(11) DEFAULT '0',
  `price` decimal(12,2) DEFAULT NULL,
  `plan_data` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(4) DEFAULT '1',
  `create_user` bigint(20) DEFAULT NULL,
  `update_user` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;;

DROP TABLE IF EXISTS `user_upgrade_request`;
CREATE TABLE `user_upgrade_request` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `role_request` int(11) DEFAULT NULL,
  `approved_time` datetime DEFAULT NULL,
  `status` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `approved_by` int(11) DEFAULT NULL,
  `create_user` int(11) DEFAULT NULL,
  `update_user` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;;

DROP TABLE IF EXISTS `user_views`;
CREATE TABLE `user_views` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `client_ip` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `create_user` int(11) DEFAULT NULL,
  `update_user` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;;

DROP TABLE IF EXISTS `user_wishlist`;
CREATE TABLE `user_wishlist` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `object_id` int(11) DEFAULT NULL,
  `object_model` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `create_user` int(11) DEFAULT NULL,
  `update_user` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;;

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `last_login_at` datetime DEFAULT NULL,
  `avatar_id` bigint(20) DEFAULT NULL,
  `bio` text COLLATE utf8mb4_unicode_ci,
  `status` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `create_user` int(11) DEFAULT NULL,
  `update_user` int(11) DEFAULT NULL,
  `vendor_commission_amount` int(11) DEFAULT NULL,
  `vendor_commission_type` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_id` bigint(20) DEFAULT NULL,
  `billing_last_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_first_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stripe_customer_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `payment_gateway` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_guests` int(11) DEFAULT NULL,
  `locale` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `verify_submit_status` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_verified` smallint(6) DEFAULT NULL,
  `need_update_pw` tinyint(4) DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;;

DROP TABLE IF EXISTS `vendor_payout_accounts`;
CREATE TABLE `vendor_payout_accounts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `vendor_id` bigint(20) NOT NULL,
  `payout_method` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_info` text COLLATE utf8mb4_unicode_ci,
  `create_user` int(11) DEFAULT NULL,
  `update_user` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_main` tinyint(4) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `vendor_payout_accounts_vendor_id_index` (`vendor_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;;

DROP TABLE IF EXISTS `vendor_payouts`;
CREATE TABLE `vendor_payouts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `vendor_id` bigint(20) NOT NULL,
  `total` decimal(10,2) DEFAULT NULL,
  `status` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payout_method` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_info` text COLLATE utf8mb4_unicode_ci,
  `month` smallint(6) DEFAULT NULL,
  `year` smallint(6) DEFAULT NULL,
  `note_to_admin` text COLLATE utf8mb4_unicode_ci,
  `note_to_vendor` text COLLATE utf8mb4_unicode_ci,
  `last_process_by` int(11) DEFAULT NULL,
  `pay_date` timestamp NULL DEFAULT NULL,
  `create_user` int(11) DEFAULT NULL,
  `update_user` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `vendor_payouts_year_month_index` (`year`,`month`),
  KEY `vendor_payouts_vendor_id_index` (`vendor_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;;

INSERT INTO `bc_attrs` (`id`, `name`, `slug`, `service`, `create_user`, `update_user`, `created_at`, `updated_at`, `deleted_at`, `hide_in_single`, `hide_in_filter_search`, `position`) VALUES
(1, 'Company size', 'company-size', 'company', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

INSERT INTO `bc_candidate_categories` (`id`, `origin_id`, `cat_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2025-04-16 03:24:08', NULL),
(2, 1, 9, '2025-04-16 03:24:08', NULL),
(3, 3, 2, '2025-04-16 03:24:08', NULL),
(4, 3, 8, '2025-04-16 03:24:08', NULL),
(5, 4, 2, '2025-04-16 03:24:08', NULL),
(6, 4, 7, '2025-04-16 03:24:08', NULL),
(7, 5, 2, '2025-04-16 03:24:08', NULL),
(8, 5, 8, '2025-04-16 03:24:08', NULL),
(9, 6, 2, '2025-04-16 03:24:08', NULL),
(10, 6, 7, '2025-04-16 03:24:08', NULL),
(11, 7, 4, '2025-04-16 03:24:08', NULL),
(12, 7, 8, '2025-04-16 03:24:08', NULL),
(13, 8, 2, '2025-04-16 03:24:08', NULL),
(14, 8, 6, '2025-04-16 03:24:08', NULL);

INSERT INTO `bc_candidate_cvs` (`id`, `file_id`, `origin_id`, `is_default`, `create_user`, `update_user`, `created_at`, `updated_at`) VALUES
(1, 74, 1, 1, 1, NULL, '2025-04-16 03:24:08', NULL),
(2, 75, 3, 1, 3, NULL, '2025-04-16 03:24:08', NULL),
(3, 76, 4, 1, 4, NULL, '2025-04-16 03:24:08', NULL),
(4, 77, 5, 1, 5, NULL, '2025-04-16 03:24:08', NULL),
(5, 78, 6, 1, 6, NULL, '2025-04-16 03:24:08', NULL),
(6, 79, 7, 1, 7, NULL, '2025-04-16 03:24:08', NULL),
(7, 80, 8, 1, 8, NULL, '2025-04-16 03:24:08', NULL),
(8, 178, 16, 1, 16, 16, '2025-06-24 19:23:26', '2025-06-24 19:27:19');

INSERT INTO `bc_candidate_skills` (`id`, `origin_id`, `skill_id`, `created_at`, `updated_at`) VALUES
(1, 1, 2, '2025-04-16 03:24:08', NULL),
(2, 1, 4, '2025-04-16 03:24:08', NULL),
(3, 1, 5, '2025-04-16 03:24:08', NULL),
(4, 1, 7, '2025-04-16 03:24:08', NULL),
(5, 3, 2, '2025-04-16 03:24:08', NULL),
(6, 3, 3, '2025-04-16 03:24:08', NULL),
(7, 3, 5, '2025-04-16 03:24:08', NULL),
(8, 3, 8, '2025-04-16 03:24:08', NULL),
(9, 4, 1, '2025-04-16 03:24:08', NULL),
(10, 4, 3, '2025-04-16 03:24:08', NULL),
(11, 4, 5, '2025-04-16 03:24:08', NULL),
(12, 4, 7, '2025-04-16 03:24:08', NULL),
(13, 5, 2, '2025-04-16 03:24:08', NULL),
(14, 5, 4, '2025-04-16 03:24:08', NULL),
(15, 5, 5, '2025-04-16 03:24:08', NULL),
(16, 5, 8, '2025-04-16 03:24:08', NULL),
(17, 6, 2, '2025-04-16 03:24:08', NULL),
(18, 6, 4, '2025-04-16 03:24:08', NULL),
(19, 6, 5, '2025-04-16 03:24:08', NULL),
(20, 6, 7, '2025-04-16 03:24:08', NULL),
(21, 7, 1, '2025-04-16 03:24:08', NULL),
(22, 7, 3, '2025-04-16 03:24:08', NULL),
(23, 7, 5, '2025-04-16 03:24:08', NULL),
(24, 7, 8, '2025-04-16 03:24:08', NULL),
(25, 8, 1, '2025-04-16 03:24:08', NULL),
(26, 8, 4, '2025-04-16 03:24:08', NULL),
(27, 8, 5, '2025-04-16 03:24:08', NULL),
(28, 8, 7, '2025-04-16 03:24:08', NULL);

INSERT INTO `bc_candidates` (`id`, `title`, `website`, `gender`, `gallery`, `video`, `allow_search`, `education`, `experience`, `award`, `social_media`, `languages`, `education_level`, `experience_year`, `expected_salary`, `salary_type`, `location_id`, `map_lat`, `map_lng`, `map_zoom`, `city`, `country`, `address`, `create_user`, `update_user`, `slug`, `deleted_at`, `origin_id`, `lang`, `created_at`, `updated_at`, `video_cover_id`) VALUES
(1, 'UI Designer at Invision', NULL, 'male', '68,69,70,71', 'https://www.youtube.com/watch?v=bhOiLfkChPo', 'publish', '[{\"from\":\"2015\",\"to\":\"2019\",\"location\":\"Harvard University\",\"reward\":\"MBA from Harvard Business School\",\"information\": \"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin a ipsum tellus.<br/> Interdum et malesuada fames ac anteipsum primis in faucibus.\"},{\"from\":\"2011\",\"to\":\"2015\",\"location\":\"Tomms College\",\"reward\":\"Bachlors in Fine Arts\",\"information\": \"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin a ipsum tellus.<br/> Interdum et malesuada fames ac anteipsum primis in faucibus.\"}]', '[{\"from\":\"2015\",\"to\":\"2019\",\"location\":\"Google\",\"position\":\"Web Designer\",\"information\": \"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin a ipsum tellus.<br/> Interdum et malesuada fames ac anteipsum primis in faucibus.\"},{\"from\":\"2011\",\"to\":\"2015\",\"location\":\"Facebook\",\"position\":\"CEO Founder\",\"information\": \"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin a ipsum tellus.<br/> Interdum et malesuada fames ac anteipsum primis in faucibus.\"},{\"from\":\"2011\",\"to\":\"2015\",\"location\":\"Tomms College\",\"position\":\"CEO Founder\",\"information\": \"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin a ipsum tellus.<br/> Interdum et malesuada fames ac anteipsum primis in faucibus.\"}]', '[{\"from\":\"2015\",\"to\":\"2019\",\"location\":\"Harvard University\",\"reward\":\"Perfect Attendance Programs\",\"information\": \"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin a ipsum tellus.<br/> Interdum et malesuada fames ac anteipsum primis in faucibus.\"},{\"from\":\"2011\",\"to\":\"2015\",\"location\":\"Tomms College\",\"reward\":\"Top Performer Recognition\",\"information\": \"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin a ipsum tellus.<br/> Interdum et malesuada fames ac anteipsum primis in faucibus.\"}]', '{\"skype\":\"superio.test\",\"facebook\":\"https:\\/\\/superio.test\\/\",\"twitter\":\"https:\\/\\/superio.test\\/\",\"instagram\":\"https:\\/\\/superio.test\\/\",\"pinterest\":\"https:\\/\\/superio.test\\/\",\"dribbble\":\"https:\\/\\/superio.test\\/\",\"google\":\"https:\\/\\/superio.test\\/\",\"linkedin\":\"https:\\/\\/superio.test\\/\"}', 'English, German, Spanish', 'associate', 1, '406', 'monthly', 4, '40.94401669296697', '-74.16938781738281', 16, 'Miami', 'US', NULL, 1, NULL, 'ui-designer-at-invision-1', NULL, NULL, NULL, '2025-04-16 03:24:08', NULL, 23),
(3, 'UI Designer at Invision', NULL, 'male', '68,69,70,71', 'https://www.youtube.com/watch?v=bhOiLfkChPo', 'publish', '[{\"from\":\"2015\",\"to\":\"2019\",\"location\":\"Harvard University\",\"reward\":\"MBA from Harvard Business School\",\"information\": \"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin a ipsum tellus.<br/> Interdum et malesuada fames ac anteipsum primis in faucibus.\"},{\"from\":\"2011\",\"to\":\"2015\",\"location\":\"Tomms College\",\"reward\":\"Bachlors in Fine Arts\",\"information\": \"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin a ipsum tellus.<br/> Interdum et malesuada fames ac anteipsum primis in faucibus.\"}]', '[{\"from\":\"2015\",\"to\":\"2019\",\"location\":\"Google\",\"position\":\"Web Designer\",\"information\": \"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin a ipsum tellus.<br/> Interdum et malesuada fames ac anteipsum primis in faucibus.\"},{\"from\":\"2011\",\"to\":\"2015\",\"location\":\"Facebook\",\"position\":\"CEO Founder\",\"information\": \"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin a ipsum tellus.<br/> Interdum et malesuada fames ac anteipsum primis in faucibus.\"},{\"from\":\"2011\",\"to\":\"2015\",\"location\":\"Tomms College\",\"position\":\"CEO Founder\",\"information\": \"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin a ipsum tellus.<br/> Interdum et malesuada fames ac anteipsum primis in faucibus.\"}]', '[{\"from\":\"2015\",\"to\":\"2019\",\"location\":\"Harvard University\",\"reward\":\"Perfect Attendance Programs\",\"information\": \"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin a ipsum tellus.<br/> Interdum et malesuada fames ac anteipsum primis in faucibus.\"},{\"from\":\"2011\",\"to\":\"2015\",\"location\":\"Tomms College\",\"reward\":\"Top Performer Recognition\",\"information\": \"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin a ipsum tellus.<br/> Interdum et malesuada fames ac anteipsum primis in faucibus.\"}]', '{\"skype\":\"superio.test\",\"facebook\":\"https:\\/\\/superio.test\\/\",\"twitter\":\"https:\\/\\/superio.test\\/\",\"instagram\":\"https:\\/\\/superio.test\\/\",\"pinterest\":\"https:\\/\\/superio.test\\/\",\"dribbble\":\"https:\\/\\/superio.test\\/\",\"google\":\"https:\\/\\/superio.test\\/\",\"linkedin\":\"https:\\/\\/superio.test\\/\"}', 'English, German, Spanish', 'professional', 5, '169', 'weekly', 1, '40.77055783505125', '-74.26002502441406', 16, 'New York', 'US', NULL, 3, NULL, 'ui-designer-at-invision-2', NULL, NULL, NULL, '2025-04-16 03:24:08', NULL, 23),
(4, 'UI Designer at Invision', NULL, 'male', '68,69,70,71', 'https://www.youtube.com/watch?v=bhOiLfkChPo', 'publish', '[{\"from\":\"2015\",\"to\":\"2019\",\"location\":\"Harvard University\",\"reward\":\"MBA from Harvard Business School\",\"information\": \"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin a ipsum tellus.<br/> Interdum et malesuada fames ac anteipsum primis in faucibus.\"},{\"from\":\"2011\",\"to\":\"2015\",\"location\":\"Tomms College\",\"reward\":\"Bachlors in Fine Arts\",\"information\": \"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin a ipsum tellus.<br/> Interdum et malesuada fames ac anteipsum primis in faucibus.\"}]', '[{\"from\":\"2015\",\"to\":\"2019\",\"location\":\"Google\",\"position\":\"Web Designer\",\"information\": \"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin a ipsum tellus.<br/> Interdum et malesuada fames ac anteipsum primis in faucibus.\"},{\"from\":\"2011\",\"to\":\"2015\",\"location\":\"Facebook\",\"position\":\"CEO Founder\",\"information\": \"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin a ipsum tellus.<br/> Interdum et malesuada fames ac anteipsum primis in faucibus.\"},{\"from\":\"2011\",\"to\":\"2015\",\"location\":\"Tomms College\",\"position\":\"CEO Founder\",\"information\": \"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin a ipsum tellus.<br/> Interdum et malesuada fames ac anteipsum primis in faucibus.\"}]', '[{\"from\":\"2015\",\"to\":\"2019\",\"location\":\"Harvard University\",\"reward\":\"Perfect Attendance Programs\",\"information\": \"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin a ipsum tellus.<br/> Interdum et malesuada fames ac anteipsum primis in faucibus.\"},{\"from\":\"2011\",\"to\":\"2015\",\"location\":\"Tomms College\",\"reward\":\"Top Performer Recognition\",\"information\": \"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin a ipsum tellus.<br/> Interdum et malesuada fames ac anteipsum primis in faucibus.\"}]', '{\"skype\":\"superio.test\",\"facebook\":\"https:\\/\\/superio.test\\/\",\"twitter\":\"https:\\/\\/superio.test\\/\",\"instagram\":\"https:\\/\\/superio.test\\/\",\"pinterest\":\"https:\\/\\/superio.test\\/\",\"dribbble\":\"https:\\/\\/superio.test\\/\",\"google\":\"https:\\/\\/superio.test\\/\",\"linkedin\":\"https:\\/\\/superio.test\\/\"}', 'English, German, Spanish', 'certificate', 1, '360', 'monthly', 1, '40.7427837', '-73.11445617675781', 16, 'New York', 'US', NULL, 4, NULL, 'ui-designer-at-invision-3', NULL, NULL, NULL, '2025-04-16 03:24:08', NULL, 23),
(5, 'UI Designer at Invision', NULL, 'male', '68,69,70,71', 'https://www.youtube.com/watch?v=bhOiLfkChPo', 'publish', '[{\"from\":\"2015\",\"to\":\"2019\",\"location\":\"Harvard University\",\"reward\":\"MBA from Harvard Business School\",\"information\": \"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin a ipsum tellus.<br/> Interdum et malesuada fames ac anteipsum primis in faucibus.\"},{\"from\":\"2011\",\"to\":\"2015\",\"location\":\"Tomms College\",\"reward\":\"Bachlors in Fine Arts\",\"information\": \"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin a ipsum tellus.<br/> Interdum et malesuada fames ac anteipsum primis in faucibus.\"}]', '[{\"from\":\"2015\",\"to\":\"2019\",\"location\":\"Google\",\"position\":\"Web Designer\",\"information\": \"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin a ipsum tellus.<br/> Interdum et malesuada fames ac anteipsum primis in faucibus.\"},{\"from\":\"2011\",\"to\":\"2015\",\"location\":\"Facebook\",\"position\":\"CEO Founder\",\"information\": \"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin a ipsum tellus.<br/> Interdum et malesuada fames ac anteipsum primis in faucibus.\"},{\"from\":\"2011\",\"to\":\"2015\",\"location\":\"Tomms College\",\"position\":\"CEO Founder\",\"information\": \"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin a ipsum tellus.<br/> Interdum et malesuada fames ac anteipsum primis in faucibus.\"}]', '[{\"from\":\"2015\",\"to\":\"2019\",\"location\":\"Harvard University\",\"reward\":\"Perfect Attendance Programs\",\"information\": \"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin a ipsum tellus.<br/> Interdum et malesuada fames ac anteipsum primis in faucibus.\"},{\"from\":\"2011\",\"to\":\"2015\",\"location\":\"Tomms College\",\"reward\":\"Top Performer Recognition\",\"information\": \"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin a ipsum tellus.<br/> Interdum et malesuada fames ac anteipsum primis in faucibus.\"}]', '{\"skype\":\"superio.test\",\"facebook\":\"https:\\/\\/superio.test\\/\",\"twitter\":\"https:\\/\\/superio.test\\/\",\"instagram\":\"https:\\/\\/superio.test\\/\",\"pinterest\":\"https:\\/\\/superio.test\\/\",\"dribbble\":\"https:\\/\\/superio.test\\/\",\"google\":\"https:\\/\\/superio.test\\/\",\"linkedin\":\"https:\\/\\/superio.test\\/\"}', 'English, German, Spanish', 'bachelor', 1, '585', 'hourly', 3, '40.70437865245596', '-73.98674011230469', 16, 'London', 'US', NULL, 5, NULL, 'ui-designer-at-invision-4', NULL, NULL, NULL, '2025-04-16 03:24:08', NULL, 23),
(6, 'UI Designer at Invision', NULL, 'male', '68,69,70,71', 'https://www.youtube.com/watch?v=bhOiLfkChPo', 'publish', '[{\"from\":\"2015\",\"to\":\"2019\",\"location\":\"Harvard University\",\"reward\":\"MBA from Harvard Business School\",\"information\": \"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin a ipsum tellus.<br/> Interdum et malesuada fames ac anteipsum primis in faucibus.\"},{\"from\":\"2011\",\"to\":\"2015\",\"location\":\"Tomms College\",\"reward\":\"Bachlors in Fine Arts\",\"information\": \"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin a ipsum tellus.<br/> Interdum et malesuada fames ac anteipsum primis in faucibus.\"}]', '[{\"from\":\"2015\",\"to\":\"2019\",\"location\":\"Google\",\"position\":\"Web Designer\",\"information\": \"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin a ipsum tellus.<br/> Interdum et malesuada fames ac anteipsum primis in faucibus.\"},{\"from\":\"2011\",\"to\":\"2015\",\"location\":\"Facebook\",\"position\":\"CEO Founder\",\"information\": \"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin a ipsum tellus.<br/> Interdum et malesuada fames ac anteipsum primis in faucibus.\"},{\"from\":\"2011\",\"to\":\"2015\",\"location\":\"Tomms College\",\"position\":\"CEO Founder\",\"information\": \"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin a ipsum tellus.<br/> Interdum et malesuada fames ac anteipsum primis in faucibus.\"}]', '[{\"from\":\"2015\",\"to\":\"2019\",\"location\":\"Harvard University\",\"reward\":\"Perfect Attendance Programs\",\"information\": \"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin a ipsum tellus.<br/> Interdum et malesuada fames ac anteipsum primis in faucibus.\"},{\"from\":\"2011\",\"to\":\"2015\",\"location\":\"Tomms College\",\"reward\":\"Top Performer Recognition\",\"information\": \"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin a ipsum tellus.<br/> Interdum et malesuada fames ac anteipsum primis in faucibus.\"}]', '{\"skype\":\"superio.test\",\"facebook\":\"https:\\/\\/superio.test\\/\",\"twitter\":\"https:\\/\\/superio.test\\/\",\"instagram\":\"https:\\/\\/superio.test\\/\",\"pinterest\":\"https:\\/\\/superio.test\\/\",\"dribbble\":\"https:\\/\\/superio.test\\/\",\"google\":\"https:\\/\\/superio.test\\/\",\"linkedin\":\"https:\\/\\/superio.test\\/\"}', 'English, German, Spanish', 'diploma', 4, '209', 'hourly', 4, '40.641311', '-73.778139', 16, 'Miami', 'US', NULL, 6, NULL, 'ui-designer-at-invision-5', NULL, NULL, NULL, '2025-04-16 03:24:08', NULL, 23),
(7, 'UI Designer at Invision', NULL, 'female', '68,69,70,71', 'https://www.youtube.com/watch?v=bhOiLfkChPo', 'publish', '[{\"from\":\"2015\",\"to\":\"2019\",\"location\":\"Harvard University\",\"reward\":\"MBA from Harvard Business School\",\"information\": \"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin a ipsum tellus.<br/> Interdum et malesuada fames ac anteipsum primis in faucibus.\"},{\"from\":\"2011\",\"to\":\"2015\",\"location\":\"Tomms College\",\"reward\":\"Bachlors in Fine Arts\",\"information\": \"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin a ipsum tellus.<br/> Interdum et malesuada fames ac anteipsum primis in faucibus.\"}]', '[{\"from\":\"2015\",\"to\":\"2019\",\"location\":\"Google\",\"position\":\"Web Designer\",\"information\": \"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin a ipsum tellus.<br/> Interdum et malesuada fames ac anteipsum primis in faucibus.\"},{\"from\":\"2011\",\"to\":\"2015\",\"location\":\"Facebook\",\"position\":\"CEO Founder\",\"information\": \"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin a ipsum tellus.<br/> Interdum et malesuada fames ac anteipsum primis in faucibus.\"},{\"from\":\"2011\",\"to\":\"2015\",\"location\":\"Tomms College\",\"position\":\"CEO Founder\",\"information\": \"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin a ipsum tellus.<br/> Interdum et malesuada fames ac anteipsum primis in faucibus.\"}]', '[{\"from\":\"2015\",\"to\":\"2019\",\"location\":\"Harvard University\",\"reward\":\"Perfect Attendance Programs\",\"information\": \"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin a ipsum tellus.<br/> Interdum et malesuada fames ac anteipsum primis in faucibus.\"},{\"from\":\"2011\",\"to\":\"2015\",\"location\":\"Tomms College\",\"reward\":\"Top Performer Recognition\",\"information\": \"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin a ipsum tellus.<br/> Interdum et malesuada fames ac anteipsum primis in faucibus.\"}]', '{\"skype\":\"superio.test\",\"facebook\":\"https:\\/\\/superio.test\\/\",\"twitter\":\"https:\\/\\/superio.test\\/\",\"instagram\":\"https:\\/\\/superio.test\\/\",\"pinterest\":\"https:\\/\\/superio.test\\/\",\"dribbble\":\"https:\\/\\/superio.test\\/\",\"google\":\"https:\\/\\/superio.test\\/\",\"linkedin\":\"https:\\/\\/superio.test\\/\"}', 'English, German, Spanish', 'master', 2, '223', 'weekly', 3, '41.080938', '-73.535957', 16, 'London', 'US', NULL, 7, NULL, 'ui-designer-at-invision-6', NULL, NULL, NULL, '2025-04-16 03:24:08', NULL, 23),
(8, 'UI Designer at Invision', NULL, 'male', '68,69,70,71', 'https://www.youtube.com/watch?v=bhOiLfkChPo', 'publish', '[{\"from\":\"2015\",\"to\":\"2019\",\"location\":\"Harvard University\",\"reward\":\"MBA from Harvard Business School\",\"information\": \"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin a ipsum tellus.<br/> Interdum et malesuada fames ac anteipsum primis in faucibus.\"},{\"from\":\"2011\",\"to\":\"2015\",\"location\":\"Tomms College\",\"reward\":\"Bachlors in Fine Arts\",\"information\": \"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin a ipsum tellus.<br/> Interdum et malesuada fames ac anteipsum primis in faucibus.\"}]', '[{\"from\":\"2015\",\"to\":\"2019\",\"location\":\"Google\",\"position\":\"Web Designer\",\"information\": \"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin a ipsum tellus.<br/> Interdum et malesuada fames ac anteipsum primis in faucibus.\"},{\"from\":\"2011\",\"to\":\"2015\",\"location\":\"Facebook\",\"position\":\"CEO Founder\",\"information\": \"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin a ipsum tellus.<br/> Interdum et malesuada fames ac anteipsum primis in faucibus.\"},{\"from\":\"2011\",\"to\":\"2015\",\"location\":\"Tomms College\",\"position\":\"CEO Founder\",\"information\": \"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin a ipsum tellus.<br/> Interdum et malesuada fames ac anteipsum primis in faucibus.\"}]', '[{\"from\":\"2015\",\"to\":\"2019\",\"location\":\"Harvard University\",\"reward\":\"Perfect Attendance Programs\",\"information\": \"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin a ipsum tellus.<br/> Interdum et malesuada fames ac anteipsum primis in faucibus.\"},{\"from\":\"2011\",\"to\":\"2015\",\"location\":\"Tomms College\",\"reward\":\"Top Performer Recognition\",\"information\": \"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin a ipsum tellus.<br/> Interdum et malesuada fames ac anteipsum primis in faucibus.\"}]', '{\"skype\":\"superio.test\",\"facebook\":\"https:\\/\\/superio.test\\/\",\"twitter\":\"https:\\/\\/superio.test\\/\",\"instagram\":\"https:\\/\\/superio.test\\/\",\"pinterest\":\"https:\\/\\/superio.test\\/\",\"dribbble\":\"https:\\/\\/superio.test\\/\",\"google\":\"https:\\/\\/superio.test\\/\",\"linkedin\":\"https:\\/\\/superio.test\\/\"}', 'English, German, Spanish', 'professional', 4, '870', 'daily', 4, '41.079386', '-73.519478', 16, 'Miami', 'US', NULL, 8, NULL, 'ui-designer-at-invision-7', NULL, NULL, NULL, '2025-04-16 03:24:08', NULL, 23),
(16, 'failamir abdullah', 'sss.ciptawiratirta.com', 'male', NULL, NULL, NULL, '[{\"from\":\"2012\",\"to\":\"2022\",\"location\":\"sasasa\",\"reward\":\"dadada\",\"information\":\"mamamam\"},{\"from\":\"2112\",\"to\":\"3232\",\"location\":\"qaqaqa\",\"reward\":\"wawawaw\",\"information\":\"cacacaaca\"}]', '[{\"from\":\"2121\",\"to\":\"1212\",\"location\":\"dadada\",\"position\":\"xaxaxaxa\",\"information\":\"xaxaxa\"},{\"from\":null,\"to\":null,\"location\":null,\"position\":null,\"information\":null}]', '[{\"from\":\"1212\",\"to\":\"1212\",\"location\":\"zazaaza\",\"reward\":\"zazaza\",\"information\":\"zazaza\"},{\"from\":null,\"to\":null,\"location\":null,\"reward\":null,\"information\":null}]', '{\"facebook\":null,\"instagram\":null,\"linkedin\":null}', '', 'master', 2, '100', 'hourly', 2, '51.505', '-0.09', 8, 'Sleman', 'ID', 'Jl. Randu, Sanggrahan, Condongcatur, Kec. Depok', 16, 16, 'failamir-abdullah', NULL, NULL, NULL, '2025-06-24 10:20:21', '2025-06-24 21:19:11', NULL);

INSERT INTO `bc_categories` (`id`, `name`, `content`, `slug`, `status`, `origin_id`, `icon`, `lang`, `_lft`, `_rgt`, `parent_id`, `create_user`, `update_user`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Accounting / Finance', NULL, 'accounting-finance', 'publish', NULL, 'icon flaticon-money-1', NULL, 1, 2, NULL, NULL, NULL, NULL, '2025-04-16 03:24:08', '2025-04-16 03:24:08'),
(2, 'Marketing', NULL, 'marketing', 'publish', NULL, 'icon flaticon-promotion', NULL, 3, 4, NULL, NULL, NULL, NULL, '2025-04-16 03:24:08', '2025-04-16 03:24:08'),
(3, 'Design', NULL, 'design', 'publish', NULL, 'icon flaticon-vector', NULL, 5, 6, NULL, NULL, NULL, NULL, '2025-04-16 03:24:08', '2025-04-16 03:24:08'),
(4, 'Development', NULL, 'development', 'publish', NULL, 'icon flaticon-web-programming', NULL, 7, 8, NULL, NULL, NULL, NULL, '2025-04-16 03:24:08', '2025-04-16 03:24:08'),
(5, 'Human Resource', NULL, 'human-resource', 'publish', NULL, 'icon flaticon-headhunting', NULL, 9, 10, NULL, NULL, NULL, NULL, '2025-04-16 03:24:08', '2025-04-16 03:24:08'),
(6, 'Project Management', NULL, 'project-management', 'publish', NULL, 'icon flaticon-rocket-ship', NULL, 11, 12, NULL, NULL, NULL, NULL, '2025-04-16 03:24:08', '2025-04-16 03:24:08'),
(7, 'Customer Service', NULL, 'customer-service', 'publish', NULL, 'icon flaticon-support-1', NULL, 13, 14, NULL, NULL, NULL, NULL, '2025-04-16 03:24:08', '2025-04-16 03:24:08'),
(8, 'Health and Care', NULL, 'health-and-care', 'publish', NULL, 'icon flaticon-first-aid-kit-1', NULL, 15, 16, NULL, NULL, NULL, NULL, '2025-04-16 03:24:08', '2025-04-16 03:24:08'),
(9, 'Automotive Jobs', NULL, 'automotive-jobs', 'publish', NULL, 'icon flaticon-car', NULL, 17, 18, NULL, NULL, NULL, NULL, '2025-04-16 03:24:08', '2025-04-16 03:24:08');

INSERT INTO `bc_companies` (`id`, `name`, `email`, `phone`, `website`, `avatar_id`, `cover_id`, `founded_in`, `allow_search`, `is_featured`, `owner_id`, `location_id`, `category_id`, `about`, `social_media`, `city`, `state`, `country`, `zip_code`, `address`, `slug`, `status`, `map_lat`, `map_lng`, `gallery`, `is_verified`, `deleted_at`, `create_user`, `update_user`, `created_at`, `updated_at`, `review_score`) VALUES
(1, 'Netflix', 'employer@superio.test', '112 666 888', 'https://netflix.com', 84, 2, '2025-04-16', 1, 0, 2, 1, 9, '<h4>Hello! This is my story.</h4>\r\n                        <p>Hello! I am a Seattle/Tacoma, Washington area graphic designer with over 6 years of graphic design experience. I specialize in designing infographics, icons, brochures, and flyers.</p>\r\n                        <ul class=\"instructor_estimate\">\r\n                            <li>Included in my estimate:</li>\r\n                            <li>Custom illustrations</li>\r\n                            <li>Stock images</li>\r\n                            <li>Any final files you need</li>\r\n                        </ul>\r\n                        <p>If you have a specific budget or deadline, let me know and I will work with you!</p>', '{\"skype\":\"bookingcore.co\",\"facebook\":\"https:\\/\\/bookingcore.co\\/\",\"twitter\":\"https:\\/\\/bookingcore.co\\/\",\"instagram\":\"https:\\/\\/bookingcore.co\\/\",\"pinterest\":\"https:\\/\\/bookingcore.co\\/\",\"dribbble\":\"https:\\/\\/bookingcore.co\\/\",\"google\":\"https:\\/\\/bookingcore.co\\/\"}', 'London', NULL, 'UK', NULL, 'Washington', 'netflix', 'publish', '40.94401669296697', '-74.16938781738281', NULL, 1, NULL, NULL, NULL, '2025-04-16 03:24:08', NULL, NULL),
(2, 'Opendoor', 'williamson@superio.test', '112 666 888', 'https://opendoor.com', 85, 2, '2025-04-16', 1, 0, 9, 1, 3, '<h4>Hello! This is my story.</h4>\r\n                        <p>Hello! I am a Seattle/Tacoma, Washington area graphic designer with over 6 years of graphic design experience. I specialize in designing infographics, icons, brochures, and flyers.</p>\r\n                        <ul class=\"instructor_estimate\">\r\n                            <li>Included in my estimate:</li>\r\n                            <li>Custom illustrations</li>\r\n                            <li>Stock images</li>\r\n                            <li>Any final files you need</li>\r\n                        </ul>\r\n                        <p>If you have a specific budget or deadline, let me know and I will work with you!</p>', '{\"skype\":\"bookingcore.co\",\"facebook\":\"https:\\/\\/bookingcore.co\\/\",\"twitter\":\"https:\\/\\/bookingcore.co\\/\",\"instagram\":\"https:\\/\\/bookingcore.co\\/\",\"pinterest\":\"https:\\/\\/bookingcore.co\\/\",\"dribbble\":\"https:\\/\\/bookingcore.co\\/\",\"google\":\"https:\\/\\/bookingcore.co\\/\"}', 'London', NULL, 'UK', NULL, 'Washington', 'opendoor', 'publish', '40.77055783505125', '-74.26002502441406', NULL, 0, NULL, NULL, NULL, '2025-04-16 03:24:08', NULL, NULL),
(3, 'Checkr', 'fox@superio.test', '112 666 888', 'https://checkr.com', 86, 2, '2025-04-16', 1, 1, 10, 1, 3, '<h4>Hello! This is my story.</h4>\r\n                        <p>Hello! I am a Seattle/Tacoma, Washington area graphic designer with over 6 years of graphic design experience. I specialize in designing infographics, icons, brochures, and flyers.</p>\r\n                        <ul class=\"instructor_estimate\">\r\n                            <li>Included in my estimate:</li>\r\n                            <li>Custom illustrations</li>\r\n                            <li>Stock images</li>\r\n                            <li>Any final files you need</li>\r\n                        </ul>\r\n                        <p>If you have a specific budget or deadline, let me know and I will work with you!</p>', '{\"skype\":\"bookingcore.co\",\"facebook\":\"https:\\/\\/bookingcore.co\\/\",\"twitter\":\"https:\\/\\/bookingcore.co\\/\",\"instagram\":\"https:\\/\\/bookingcore.co\\/\",\"pinterest\":\"https:\\/\\/bookingcore.co\\/\",\"dribbble\":\"https:\\/\\/bookingcore.co\\/\",\"google\":\"https:\\/\\/bookingcore.co\\/\"}', 'London', NULL, 'UK', NULL, 'Washington', 'checkr', 'publish', '40.7427837', '-73.11445617675781', NULL, 0, NULL, NULL, NULL, '2025-04-16 03:24:09', NULL, NULL),
(4, 'Mural', 'hiddleston@superio.test', '112 666 888', 'https://mural.com', 87, 2, '2025-04-16', 1, 1, 11, 1, 4, '<h4>Hello! This is my story.</h4>\r\n                        <p>Hello! I am a Seattle/Tacoma, Washington area graphic designer with over 6 years of graphic design experience. I specialize in designing infographics, icons, brochures, and flyers.</p>\r\n                        <ul class=\"instructor_estimate\">\r\n                            <li>Included in my estimate:</li>\r\n                            <li>Custom illustrations</li>\r\n                            <li>Stock images</li>\r\n                            <li>Any final files you need</li>\r\n                        </ul>\r\n                        <p>If you have a specific budget or deadline, let me know and I will work with you!</p>', '{\"skype\":\"bookingcore.co\",\"facebook\":\"https:\\/\\/bookingcore.co\\/\",\"twitter\":\"https:\\/\\/bookingcore.co\\/\",\"instagram\":\"https:\\/\\/bookingcore.co\\/\",\"pinterest\":\"https:\\/\\/bookingcore.co\\/\",\"dribbble\":\"https:\\/\\/bookingcore.co\\/\",\"google\":\"https:\\/\\/bookingcore.co\\/\"}', 'London', NULL, 'UK', NULL, 'Washington', 'mural', 'publish', '40.70437865245596', '-73.98674011230469', NULL, 1, NULL, NULL, NULL, '2025-04-16 03:24:09', NULL, NULL),
(5, 'Astronomer', 'linda@superio.test', '112 666 888', 'https://astronomer.com', 88, 2, '2025-04-16', 1, 1, 12, 1, 8, '<h4>Hello! This is my story.</h4>\r\n                        <p>Hello! I am a Seattle/Tacoma, Washington area graphic designer with over 6 years of graphic design experience. I specialize in designing infographics, icons, brochures, and flyers.</p>\r\n                        <ul class=\"instructor_estimate\">\r\n                            <li>Included in my estimate:</li>\r\n                            <li>Custom illustrations</li>\r\n                            <li>Stock images</li>\r\n                            <li>Any final files you need</li>\r\n                        </ul>\r\n                        <p>If you have a specific budget or deadline, let me know and I will work with you!</p>', '{\"skype\":\"bookingcore.co\",\"facebook\":\"https:\\/\\/bookingcore.co\\/\",\"twitter\":\"https:\\/\\/bookingcore.co\\/\",\"instagram\":\"https:\\/\\/bookingcore.co\\/\",\"pinterest\":\"https:\\/\\/bookingcore.co\\/\",\"dribbble\":\"https:\\/\\/bookingcore.co\\/\",\"google\":\"https:\\/\\/bookingcore.co\\/\"}', 'London', NULL, 'UK', NULL, 'Washington', 'astronomer', 'publish', '40.641311', '-73.778139', NULL, 1, NULL, NULL, NULL, '2025-04-16 03:24:09', NULL, NULL),
(6, 'Figma', 'john@superio.test', '112 666 888', 'https://figma.com', 89, 2, '2025-04-16', 1, 0, 13, 1, 5, '<h4>Hello! This is my story.</h4>\r\n                        <p>Hello! I am a Seattle/Tacoma, Washington area graphic designer with over 6 years of graphic design experience. I specialize in designing infographics, icons, brochures, and flyers.</p>\r\n                        <ul class=\"instructor_estimate\">\r\n                            <li>Included in my estimate:</li>\r\n                            <li>Custom illustrations</li>\r\n                            <li>Stock images</li>\r\n                            <li>Any final files you need</li>\r\n                        </ul>\r\n                        <p>If you have a specific budget or deadline, let me know and I will work with you!</p>', '{\"skype\":\"bookingcore.co\",\"facebook\":\"https:\\/\\/bookingcore.co\\/\",\"twitter\":\"https:\\/\\/bookingcore.co\\/\",\"instagram\":\"https:\\/\\/bookingcore.co\\/\",\"pinterest\":\"https:\\/\\/bookingcore.co\\/\",\"dribbble\":\"https:\\/\\/bookingcore.co\\/\",\"google\":\"https:\\/\\/bookingcore.co\\/\"}', 'London', NULL, 'UK', NULL, 'Washington', 'figma', 'publish', '41.080938', '-73.535957', NULL, 1, NULL, NULL, NULL, '2025-04-16 03:24:09', NULL, NULL),
(7, 'Stripe', 'rebecca@superio.test', '112 666 888', 'https://stripe.com', 90, 2, '2025-04-16', 1, 0, 14, 1, 5, '<h4>Hello! This is my story.</h4>\r\n                        <p>Hello! I am a Seattle/Tacoma, Washington area graphic designer with over 6 years of graphic design experience. I specialize in designing infographics, icons, brochures, and flyers.</p>\r\n                        <ul class=\"instructor_estimate\">\r\n                            <li>Included in my estimate:</li>\r\n                            <li>Custom illustrations</li>\r\n                            <li>Stock images</li>\r\n                            <li>Any final files you need</li>\r\n                        </ul>\r\n                        <p>If you have a specific budget or deadline, let me know and I will work with you!</p>', '{\"skype\":\"bookingcore.co\",\"facebook\":\"https:\\/\\/bookingcore.co\\/\",\"twitter\":\"https:\\/\\/bookingcore.co\\/\",\"instagram\":\"https:\\/\\/bookingcore.co\\/\",\"pinterest\":\"https:\\/\\/bookingcore.co\\/\",\"dribbble\":\"https:\\/\\/bookingcore.co\\/\",\"google\":\"https:\\/\\/bookingcore.co\\/\"}', 'London', NULL, 'UK', NULL, 'Washington', 'stripe', 'publish', '41.079386', '-73.519478', NULL, 1, NULL, NULL, NULL, '2025-04-16 03:24:09', NULL, NULL),
(8, 'admin@ciptawiratirta.com ', 'admin@ciptawiratirta.com', NULL, NULL, NULL, NULL, NULL, 0, 0, 15, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'admin-at-ciptawiratirtacom', NULL, NULL, NULL, NULL, NULL, NULL, 15, NULL, '2025-06-24 19:52:22', '2025-06-24 19:52:22', NULL);

INSERT INTO `bc_company_categories` (`id`, `name`, `content`, `slug`, `status`, `origin_id`, `icon`, `lang`, `_lft`, `_rgt`, `parent_id`, `create_user`, `update_user`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Accounting / Finance', NULL, 'accounting-finance', 'publish', NULL, 'icon flaticon-money-1', NULL, 1, 2, NULL, NULL, NULL, NULL, '2025-04-16 03:55:18', '2025-04-16 03:55:18'),
(2, 'Marketing', NULL, 'marketing', 'publish', NULL, 'icon flaticon-promotion', NULL, 3, 4, NULL, NULL, NULL, NULL, '2025-04-16 03:55:18', '2025-04-16 03:55:18'),
(3, 'Design', NULL, 'design', 'publish', NULL, 'icon flaticon-vector', NULL, 5, 6, NULL, NULL, NULL, NULL, '2025-04-16 03:55:18', '2025-04-16 03:55:18'),
(4, 'Development', NULL, 'development', 'publish', NULL, 'icon flaticon-web-programming', NULL, 7, 8, NULL, NULL, NULL, NULL, '2025-04-16 03:55:18', '2025-04-16 03:55:18'),
(5, 'Human Resource', NULL, 'human-resource', 'publish', NULL, 'icon flaticon-headhunting', NULL, 9, 10, NULL, NULL, NULL, NULL, '2025-04-16 03:55:18', '2025-04-16 03:55:18'),
(6, 'Project Management', NULL, 'project-management', 'publish', NULL, 'icon flaticon-rocket-ship', NULL, 11, 12, NULL, NULL, NULL, NULL, '2025-04-16 03:55:18', '2025-04-16 03:55:18'),
(7, 'Customer Service', NULL, 'customer-service', 'publish', NULL, 'icon flaticon-support-1', NULL, 13, 14, NULL, NULL, NULL, NULL, '2025-04-16 03:55:18', '2025-04-16 03:55:18'),
(8, 'Health and Care', NULL, 'health-and-care', 'publish', NULL, 'icon flaticon-first-aid-kit-1', NULL, 15, 16, NULL, NULL, NULL, NULL, '2025-04-16 03:55:18', '2025-04-16 03:55:18'),
(9, 'Automotive Jobs', NULL, 'automotive-jobs', 'publish', NULL, 'icon flaticon-car', NULL, 17, 18, NULL, NULL, NULL, NULL, '2025-04-16 03:55:18', '2025-04-16 03:55:18');

INSERT INTO `bc_company_term` (`id`, `term_id`, `company_id`, `create_user`, `update_user`, `created_at`, `updated_at`) VALUES
(1, 4, 1, NULL, NULL, '2025-04-16 03:24:08', '2025-04-16 03:24:08'),
(2, 6, 2, NULL, NULL, '2025-04-16 03:24:08', '2025-04-16 03:24:08'),
(3, 1, 3, NULL, NULL, '2025-04-16 03:24:09', '2025-04-16 03:24:09'),
(4, 5, 4, NULL, NULL, '2025-04-16 03:24:09', '2025-04-16 03:24:09'),
(5, 4, 5, NULL, NULL, '2025-04-16 03:24:09', '2025-04-16 03:24:09'),
(6, 1, 6, NULL, NULL, '2025-04-16 03:24:09', '2025-04-16 03:24:09'),
(7, 4, 7, NULL, NULL, '2025-04-16 03:24:09', '2025-04-16 03:24:09');

INSERT INTO `bc_gig_cat` (`id`, `name`, `content`, `slug`, `status`, `image_id`, `faqs`, `news_cat_id`, `_lft`, `_rgt`, `parent_id`, `create_user`, `update_user`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Graphics & Design', 'Inventore maxime nisi aliquid et aut expedita voluptas distinctio. Itaque officia adipisci libero saepe. Eum inventore voluptas dolore animi quod perspiciatis dolorem. Aspernatur dicta dolor distinctio et eaque ea.', 'graphics-design', 'publish', 167, '[{\"title\":\"Qui et.\",\"content\":\"Qui ipsam ex omnis natus. Doloremque eius excepturi et ut nihil. Quia exercitationem corporis vel sint non quod fuga.\"},{\"title\":\"Voluptas ducimus.\",\"content\":\"Voluptatem ut ab recusandae ab. Qui dolores maxime dolores est quae unde. Quidem et numquam natus eos incidunt. Ut qui quaerat qui accusamus eum. Et cupiditate id quasi hic.\"},{\"title\":\"Autem aut et.\",\"content\":\"Cumque itaque et iste laudantium omnis unde. Et assumenda incidunt quia sint quisquam error explicabo. Dignissimos quis minima reiciendis nulla rerum a. Et qui dolorem dolorum quasi atque.\"},{\"title\":\"Repudiandae autem.\",\"content\":\"Et optio laboriosam minus ut eligendi. Illo a voluptate tempore aut aliquam. Quia tempore reiciendis velit repudiandae consequatur. Quasi amet possimus corporis voluptatem a porro. Libero hic est delectus labore maiores officiis.\"}]', 6, 1, 32, NULL, NULL, NULL, NULL, '2025-04-16 03:24:09', '2025-04-16 03:24:09'),
(2, 'Logo Design', 'In aut iusto modi quia nisi voluptas. Esse in rerum qui modi sint. Impedit voluptatem soluta nemo fugiat assumenda. Dolorem qui odio atque mollitia reiciendis.', 'logo-design', 'publish', 171, NULL, NULL, 2, 11, 1, NULL, NULL, NULL, '2025-04-16 03:24:09', '2025-04-16 03:24:09'),
(3, 'Neque nisi saepe aut.', 'Perferendis praesentium et voluptatem. Autem praesentium officiis quibusdam at est non veniam. Perspiciatis esse nam commodi eos recusandae.', 'neque-nisi-saepe-aut', 'publish', 170, NULL, NULL, 3, 4, 2, NULL, NULL, NULL, '2025-04-16 03:24:09', '2025-04-16 03:24:09'),
(4, 'Voluptatem ut doloribus quisquam ratione.', 'Ut exercitationem sit commodi impedit rerum odit. Sed iure a rerum. Veritatis et ut consequatur non cupiditate suscipit nulla aut. Doloremque consectetur incidunt aperiam temporibus qui minima minima.', 'voluptatem-ut-doloribus-quisquam-ratione', 'publish', 171, NULL, NULL, 5, 6, 2, NULL, NULL, NULL, '2025-04-16 03:24:09', '2025-04-16 03:24:09'),
(5, 'Incidunt minus.', 'Repudiandae perferendis fuga nulla. Aut voluptas qui fugiat quis iusto nostrum. Officiis vitae numquam quas doloremque ullam unde voluptate. Laudantium accusantium consequuntur autem consectetur.', 'incidunt-minus', 'publish', 171, NULL, NULL, 7, 8, 2, NULL, NULL, NULL, '2025-04-16 03:24:09', '2025-04-16 03:24:09'),
(6, 'Nesciunt consectetur enim.', 'Ipsa quia esse esse aspernatur non sit. Culpa cupiditate ut exercitationem ut sunt.', 'nesciunt-consectetur-enim', 'publish', 169, NULL, NULL, 9, 10, 2, NULL, NULL, NULL, '2025-04-16 03:24:09', '2025-04-16 03:24:09'),
(7, 'Repellat voluptatem architecto.', 'Debitis quod voluptas et cum eos. Consequatur nostrum tempora placeat ut qui tempora et. Sed sed eius unde delectus qui ea ullam. Fugiat et excepturi aut culpa ullam.', 'repellat-voluptatem-architecto', 'publish', 172, NULL, NULL, 12, 21, 1, NULL, NULL, NULL, '2025-04-16 03:24:09', '2025-04-16 03:24:09'),
(8, 'Neque nisi saepe aut.', 'Perferendis praesentium et voluptatem. Autem praesentium officiis quibusdam at est non veniam. Perspiciatis esse nam commodi eos recusandae.', 'neque-nisi-saepe-aut-1', 'publish', 170, NULL, NULL, 13, 14, 7, NULL, NULL, NULL, '2025-04-16 03:24:09', '2025-04-16 03:24:09'),
(9, 'Voluptatem ut doloribus quisquam ratione.', 'Ut exercitationem sit commodi impedit rerum odit. Sed iure a rerum. Veritatis et ut consequatur non cupiditate suscipit nulla aut. Doloremque consectetur incidunt aperiam temporibus qui minima minima.', 'voluptatem-ut-doloribus-quisquam-ratione-1', 'publish', 171, NULL, NULL, 15, 16, 7, NULL, NULL, NULL, '2025-04-16 03:24:09', '2025-04-16 03:24:09'),
(10, 'Incidunt minus.', 'Repudiandae perferendis fuga nulla. Aut voluptas qui fugiat quis iusto nostrum. Officiis vitae numquam quas doloremque ullam unde voluptate. Laudantium accusantium consequuntur autem consectetur.', 'incidunt-minus-1', 'publish', 171, NULL, NULL, 17, 18, 7, NULL, NULL, NULL, '2025-04-16 03:24:09', '2025-04-16 03:24:09'),
(11, 'Nesciunt consectetur enim.', 'Ipsa quia esse esse aspernatur non sit. Culpa cupiditate ut exercitationem ut sunt.', 'nesciunt-consectetur-enim-1', 'publish', 169, NULL, NULL, 19, 20, 7, NULL, NULL, NULL, '2025-04-16 03:24:09', '2025-04-16 03:24:09'),
(12, 'Tempora accusantium qui.', 'Tempora quibusdam perspiciatis qui eaque quia aperiam. Quas qui soluta et quas repellendus cumque. Qui explicabo similique vero quos. Cum ipsam quas ut placeat aliquam autem doloribus.', 'tempora-accusantium-qui', 'publish', 170, NULL, NULL, 22, 31, 1, NULL, NULL, NULL, '2025-04-16 03:24:09', '2025-04-16 03:24:09'),
(13, 'Neque nisi saepe aut.', 'Perferendis praesentium et voluptatem. Autem praesentium officiis quibusdam at est non veniam. Perspiciatis esse nam commodi eos recusandae.', 'neque-nisi-saepe-aut-2', 'publish', 170, NULL, NULL, 23, 24, 12, NULL, NULL, NULL, '2025-04-16 03:24:09', '2025-04-16 03:24:09'),
(14, 'Voluptatem ut doloribus quisquam ratione.', 'Ut exercitationem sit commodi impedit rerum odit. Sed iure a rerum. Veritatis et ut consequatur non cupiditate suscipit nulla aut. Doloremque consectetur incidunt aperiam temporibus qui minima minima.', 'voluptatem-ut-doloribus-quisquam-ratione-2', 'publish', 171, NULL, NULL, 25, 26, 12, NULL, NULL, NULL, '2025-04-16 03:24:09', '2025-04-16 03:24:09'),
(15, 'Incidunt minus.', 'Repudiandae perferendis fuga nulla. Aut voluptas qui fugiat quis iusto nostrum. Officiis vitae numquam quas doloremque ullam unde voluptate. Laudantium accusantium consequuntur autem consectetur.', 'incidunt-minus-2', 'publish', 171, NULL, NULL, 27, 28, 12, NULL, NULL, NULL, '2025-04-16 03:24:09', '2025-04-16 03:24:09'),
(16, 'Nesciunt consectetur enim.', 'Ipsa quia esse esse aspernatur non sit. Culpa cupiditate ut exercitationem ut sunt.', 'nesciunt-consectetur-enim-2', 'publish', 169, NULL, NULL, 29, 30, 12, NULL, NULL, NULL, '2025-04-16 03:24:09', '2025-04-16 03:24:09'),
(17, 'Digital Marketing', 'Corporis asperiores repellendus dolorum dolore amet soluta nisi. Saepe occaecati magnam atque cum mollitia. Aliquid et non voluptatem enim. Nobis id non ut in.', 'digital-marketing', 'publish', 167, '[{\"title\":\"Qui et.\",\"content\":\"Qui ipsam ex omnis natus. Doloremque eius excepturi et ut nihil. Quia exercitationem corporis vel sint non quod fuga.\"},{\"title\":\"Voluptas ducimus.\",\"content\":\"Voluptatem ut ab recusandae ab. Qui dolores maxime dolores est quae unde. Quidem et numquam natus eos incidunt. Ut qui quaerat qui accusamus eum. Et cupiditate id quasi hic.\"},{\"title\":\"Autem aut et.\",\"content\":\"Cumque itaque et iste laudantium omnis unde. Et assumenda incidunt quia sint quisquam error explicabo. Dignissimos quis minima reiciendis nulla rerum a. Et qui dolorem dolorum quasi atque.\"},{\"title\":\"Repudiandae autem.\",\"content\":\"Et optio laboriosam minus ut eligendi. Illo a voluptate tempore aut aliquam. Quia tempore reiciendis velit repudiandae consequatur. Quasi amet possimus corporis voluptatem a porro. Libero hic est delectus labore maiores officiis.\"}]', 3, 33, 64, NULL, NULL, NULL, NULL, '2025-04-16 03:24:09', '2025-04-16 03:24:09'),
(18, 'Logo Design', 'In aut iusto modi quia nisi voluptas. Esse in rerum qui modi sint. Impedit voluptatem soluta nemo fugiat assumenda. Dolorem qui odio atque mollitia reiciendis.', 'logo-design-1', 'publish', 171, NULL, NULL, 34, 43, 17, NULL, NULL, NULL, '2025-04-16 03:24:09', '2025-04-16 03:24:09'),
(19, 'Neque nisi saepe aut.', 'Perferendis praesentium et voluptatem. Autem praesentium officiis quibusdam at est non veniam. Perspiciatis esse nam commodi eos recusandae.', 'neque-nisi-saepe-aut-3', 'publish', 170, NULL, NULL, 35, 36, 18, NULL, NULL, NULL, '2025-04-16 03:24:09', '2025-04-16 03:24:09'),
(20, 'Voluptatem ut doloribus quisquam ratione.', 'Ut exercitationem sit commodi impedit rerum odit. Sed iure a rerum. Veritatis et ut consequatur non cupiditate suscipit nulla aut. Doloremque consectetur incidunt aperiam temporibus qui minima minima.', 'voluptatem-ut-doloribus-quisquam-ratione-3', 'publish', 171, NULL, NULL, 37, 38, 18, NULL, NULL, NULL, '2025-04-16 03:24:09', '2025-04-16 03:24:09'),
(21, 'Incidunt minus.', 'Repudiandae perferendis fuga nulla. Aut voluptas qui fugiat quis iusto nostrum. Officiis vitae numquam quas doloremque ullam unde voluptate. Laudantium accusantium consequuntur autem consectetur.', 'incidunt-minus-3', 'publish', 171, NULL, NULL, 39, 40, 18, NULL, NULL, NULL, '2025-04-16 03:24:09', '2025-04-16 03:24:09'),
(22, 'Nesciunt consectetur enim.', 'Ipsa quia esse esse aspernatur non sit. Culpa cupiditate ut exercitationem ut sunt.', 'nesciunt-consectetur-enim-3', 'publish', 169, NULL, NULL, 41, 42, 18, NULL, NULL, NULL, '2025-04-16 03:24:09', '2025-04-16 03:24:09'),
(23, 'Repellat voluptatem architecto.', 'Debitis quod voluptas et cum eos. Consequatur nostrum tempora placeat ut qui tempora et. Sed sed eius unde delectus qui ea ullam. Fugiat et excepturi aut culpa ullam.', 'repellat-voluptatem-architecto-1', 'publish', 172, NULL, NULL, 44, 53, 17, NULL, NULL, NULL, '2025-04-16 03:24:09', '2025-04-16 03:24:09'),
(24, 'Neque nisi saepe aut.', 'Perferendis praesentium et voluptatem. Autem praesentium officiis quibusdam at est non veniam. Perspiciatis esse nam commodi eos recusandae.', 'neque-nisi-saepe-aut-4', 'publish', 170, NULL, NULL, 45, 46, 23, NULL, NULL, NULL, '2025-04-16 03:24:09', '2025-04-16 03:24:09'),
(25, 'Voluptatem ut doloribus quisquam ratione.', 'Ut exercitationem sit commodi impedit rerum odit. Sed iure a rerum. Veritatis et ut consequatur non cupiditate suscipit nulla aut. Doloremque consectetur incidunt aperiam temporibus qui minima minima.', 'voluptatem-ut-doloribus-quisquam-ratione-4', 'publish', 171, NULL, NULL, 47, 48, 23, NULL, NULL, NULL, '2025-04-16 03:24:09', '2025-04-16 03:24:09'),
(26, 'Incidunt minus.', 'Repudiandae perferendis fuga nulla. Aut voluptas qui fugiat quis iusto nostrum. Officiis vitae numquam quas doloremque ullam unde voluptate. Laudantium accusantium consequuntur autem consectetur.', 'incidunt-minus-4', 'publish', 171, NULL, NULL, 49, 50, 23, NULL, NULL, NULL, '2025-04-16 03:24:09', '2025-04-16 03:24:09'),
(27, 'Nesciunt consectetur enim.', 'Ipsa quia esse esse aspernatur non sit. Culpa cupiditate ut exercitationem ut sunt.', 'nesciunt-consectetur-enim-4', 'publish', 169, NULL, NULL, 51, 52, 23, NULL, NULL, NULL, '2025-04-16 03:24:09', '2025-04-16 03:24:09'),
(28, 'Tempora accusantium qui.', 'Tempora quibusdam perspiciatis qui eaque quia aperiam. Quas qui soluta et quas repellendus cumque. Qui explicabo similique vero quos. Cum ipsam quas ut placeat aliquam autem doloribus.', 'tempora-accusantium-qui-1', 'publish', 170, NULL, NULL, 54, 63, 17, NULL, NULL, NULL, '2025-04-16 03:24:09', '2025-04-16 03:24:09'),
(29, 'Neque nisi saepe aut.', 'Perferendis praesentium et voluptatem. Autem praesentium officiis quibusdam at est non veniam. Perspiciatis esse nam commodi eos recusandae.', 'neque-nisi-saepe-aut-5', 'publish', 170, NULL, NULL, 55, 56, 28, NULL, NULL, NULL, '2025-04-16 03:24:09', '2025-04-16 03:24:09'),
(30, 'Voluptatem ut doloribus quisquam ratione.', 'Ut exercitationem sit commodi impedit rerum odit. Sed iure a rerum. Veritatis et ut consequatur non cupiditate suscipit nulla aut. Doloremque consectetur incidunt aperiam temporibus qui minima minima.', 'voluptatem-ut-doloribus-quisquam-ratione-5', 'publish', 171, NULL, NULL, 57, 58, 28, NULL, NULL, NULL, '2025-04-16 03:24:09', '2025-04-16 03:24:09'),
(31, 'Incidunt minus.', 'Repudiandae perferendis fuga nulla. Aut voluptas qui fugiat quis iusto nostrum. Officiis vitae numquam quas doloremque ullam unde voluptate. Laudantium accusantium consequuntur autem consectetur.', 'incidunt-minus-5', 'publish', 171, NULL, NULL, 59, 60, 28, NULL, NULL, NULL, '2025-04-16 03:24:09', '2025-04-16 03:24:09'),
(32, 'Nesciunt consectetur enim.', 'Ipsa quia esse esse aspernatur non sit. Culpa cupiditate ut exercitationem ut sunt.', 'nesciunt-consectetur-enim-5', 'publish', 169, NULL, NULL, 61, 62, 28, NULL, NULL, NULL, '2025-04-16 03:24:09', '2025-04-16 03:24:09'),
(33, 'Video & Animation', 'Nostrum occaecati qui est voluptatum reprehenderit dolorem. Porro sint odit repudiandae esse recusandae suscipit. Esse est recusandae minima. Officia eius natus id autem accusantium.', 'video-animation', 'publish', 167, '[{\"title\":\"Qui et.\",\"content\":\"Qui ipsam ex omnis natus. Doloremque eius excepturi et ut nihil. Quia exercitationem corporis vel sint non quod fuga.\"},{\"title\":\"Voluptas ducimus.\",\"content\":\"Voluptatem ut ab recusandae ab. Qui dolores maxime dolores est quae unde. Quidem et numquam natus eos incidunt. Ut qui quaerat qui accusamus eum. Et cupiditate id quasi hic.\"},{\"title\":\"Autem aut et.\",\"content\":\"Cumque itaque et iste laudantium omnis unde. Et assumenda incidunt quia sint quisquam error explicabo. Dignissimos quis minima reiciendis nulla rerum a. Et qui dolorem dolorum quasi atque.\"},{\"title\":\"Repudiandae autem.\",\"content\":\"Et optio laboriosam minus ut eligendi. Illo a voluptate tempore aut aliquam. Quia tempore reiciendis velit repudiandae consequatur. Quasi amet possimus corporis voluptatem a porro. Libero hic est delectus labore maiores officiis.\"}]', 1, 65, 96, NULL, NULL, NULL, NULL, '2025-04-16 03:24:09', '2025-04-16 03:24:09'),
(34, 'Logo Design', 'In aut iusto modi quia nisi voluptas. Esse in rerum qui modi sint. Impedit voluptatem soluta nemo fugiat assumenda. Dolorem qui odio atque mollitia reiciendis.', 'logo-design-2', 'publish', 171, NULL, NULL, 66, 75, 33, NULL, NULL, NULL, '2025-04-16 03:24:09', '2025-04-16 03:24:09'),
(35, 'Neque nisi saepe aut.', 'Perferendis praesentium et voluptatem. Autem praesentium officiis quibusdam at est non veniam. Perspiciatis esse nam commodi eos recusandae.', 'neque-nisi-saepe-aut-6', 'publish', 170, NULL, NULL, 67, 68, 34, NULL, NULL, NULL, '2025-04-16 03:24:09', '2025-04-16 03:24:09'),
(36, 'Voluptatem ut doloribus quisquam ratione.', 'Ut exercitationem sit commodi impedit rerum odit. Sed iure a rerum. Veritatis et ut consequatur non cupiditate suscipit nulla aut. Doloremque consectetur incidunt aperiam temporibus qui minima minima.', 'voluptatem-ut-doloribus-quisquam-ratione-6', 'publish', 171, NULL, NULL, 69, 70, 34, NULL, NULL, NULL, '2025-04-16 03:24:09', '2025-04-16 03:24:09'),
(37, 'Incidunt minus.', 'Repudiandae perferendis fuga nulla. Aut voluptas qui fugiat quis iusto nostrum. Officiis vitae numquam quas doloremque ullam unde voluptate. Laudantium accusantium consequuntur autem consectetur.', 'incidunt-minus-6', 'publish', 171, NULL, NULL, 71, 72, 34, NULL, NULL, NULL, '2025-04-16 03:24:09', '2025-04-16 03:24:09'),
(38, 'Nesciunt consectetur enim.', 'Ipsa quia esse esse aspernatur non sit. Culpa cupiditate ut exercitationem ut sunt.', 'nesciunt-consectetur-enim-6', 'publish', 169, NULL, NULL, 73, 74, 34, NULL, NULL, NULL, '2025-04-16 03:24:09', '2025-04-16 03:24:09'),
(39, 'Repellat voluptatem architecto.', 'Debitis quod voluptas et cum eos. Consequatur nostrum tempora placeat ut qui tempora et. Sed sed eius unde delectus qui ea ullam. Fugiat et excepturi aut culpa ullam.', 'repellat-voluptatem-architecto-2', 'publish', 172, NULL, NULL, 76, 85, 33, NULL, NULL, NULL, '2025-04-16 03:24:09', '2025-04-16 03:24:09'),
(40, 'Neque nisi saepe aut.', 'Perferendis praesentium et voluptatem. Autem praesentium officiis quibusdam at est non veniam. Perspiciatis esse nam commodi eos recusandae.', 'neque-nisi-saepe-aut-7', 'publish', 170, NULL, NULL, 77, 78, 39, NULL, NULL, NULL, '2025-04-16 03:24:09', '2025-04-16 03:24:09'),
(41, 'Voluptatem ut doloribus quisquam ratione.', 'Ut exercitationem sit commodi impedit rerum odit. Sed iure a rerum. Veritatis et ut consequatur non cupiditate suscipit nulla aut. Doloremque consectetur incidunt aperiam temporibus qui minima minima.', 'voluptatem-ut-doloribus-quisquam-ratione-7', 'publish', 171, NULL, NULL, 79, 80, 39, NULL, NULL, NULL, '2025-04-16 03:24:09', '2025-04-16 03:24:09'),
(42, 'Incidunt minus.', 'Repudiandae perferendis fuga nulla. Aut voluptas qui fugiat quis iusto nostrum. Officiis vitae numquam quas doloremque ullam unde voluptate. Laudantium accusantium consequuntur autem consectetur.', 'incidunt-minus-7', 'publish', 171, NULL, NULL, 81, 82, 39, NULL, NULL, NULL, '2025-04-16 03:24:09', '2025-04-16 03:24:09'),
(43, 'Nesciunt consectetur enim.', 'Ipsa quia esse esse aspernatur non sit. Culpa cupiditate ut exercitationem ut sunt.', 'nesciunt-consectetur-enim-7', 'publish', 169, NULL, NULL, 83, 84, 39, NULL, NULL, NULL, '2025-04-16 03:24:09', '2025-04-16 03:24:09'),
(44, 'Tempora accusantium qui.', 'Tempora quibusdam perspiciatis qui eaque quia aperiam. Quas qui soluta et quas repellendus cumque. Qui explicabo similique vero quos. Cum ipsam quas ut placeat aliquam autem doloribus.', 'tempora-accusantium-qui-2', 'publish', 170, NULL, NULL, 86, 95, 33, NULL, NULL, NULL, '2025-04-16 03:24:09', '2025-04-16 03:24:09'),
(45, 'Neque nisi saepe aut.', 'Perferendis praesentium et voluptatem. Autem praesentium officiis quibusdam at est non veniam. Perspiciatis esse nam commodi eos recusandae.', 'neque-nisi-saepe-aut-8', 'publish', 170, NULL, NULL, 87, 88, 44, NULL, NULL, NULL, '2025-04-16 03:24:09', '2025-04-16 03:24:09'),
(46, 'Voluptatem ut doloribus quisquam ratione.', 'Ut exercitationem sit commodi impedit rerum odit. Sed iure a rerum. Veritatis et ut consequatur non cupiditate suscipit nulla aut. Doloremque consectetur incidunt aperiam temporibus qui minima minima.', 'voluptatem-ut-doloribus-quisquam-ratione-8', 'publish', 171, NULL, NULL, 89, 90, 44, NULL, NULL, NULL, '2025-04-16 03:24:09', '2025-04-16 03:24:09'),
(47, 'Incidunt minus.', 'Repudiandae perferendis fuga nulla. Aut voluptas qui fugiat quis iusto nostrum. Officiis vitae numquam quas doloremque ullam unde voluptate. Laudantium accusantium consequuntur autem consectetur.', 'incidunt-minus-8', 'publish', 171, NULL, NULL, 91, 92, 44, NULL, NULL, NULL, '2025-04-16 03:24:09', '2025-04-16 03:24:09'),
(48, 'Nesciunt consectetur enim.', 'Ipsa quia esse esse aspernatur non sit. Culpa cupiditate ut exercitationem ut sunt.', 'nesciunt-consectetur-enim-8', 'publish', 169, NULL, NULL, 93, 94, 44, NULL, NULL, NULL, '2025-04-16 03:24:09', '2025-04-16 03:24:09');

INSERT INTO `bc_gig_cat_types` (`id`, `name`, `content`, `slug`, `status`, `image_id`, `cat_id`, `cat_children`, `_lft`, `_rgt`, `parent_id`, `create_user`, `update_user`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Distinctio pariatur amet.', NULL, 'distinctio-pariatur-amet', 'publish', 173, 1, '[7,12]', 0, 0, NULL, NULL, NULL, NULL, '2025-04-16 03:24:09', '2025-04-16 03:24:09'),
(2, 'Enim est.', NULL, 'enim-est', 'publish', 176, 1, '[2,7]', 0, 0, NULL, NULL, NULL, NULL, '2025-04-16 03:24:09', '2025-04-16 03:24:09'),
(3, 'Voluptatem vel.', NULL, 'voluptatem-vel', 'publish', 174, 1, '[2,7,12]', 0, 0, NULL, NULL, NULL, NULL, '2025-04-16 03:24:09', '2025-04-16 03:24:09'),
(4, 'Doloremque non quia.', NULL, 'doloremque-non-quia', 'publish', 175, 17, '[18,23,28]', 0, 0, NULL, NULL, NULL, NULL, '2025-04-16 03:24:09', '2025-04-16 03:24:09'),
(5, 'Repellendus nobis reiciendis.', NULL, 'repellendus-nobis-reiciendis', 'publish', 176, 17, '[18,23,28]', 0, 0, NULL, NULL, NULL, NULL, '2025-04-16 03:24:09', '2025-04-16 03:24:09'),
(6, 'Quibusdam et sed.', NULL, 'quibusdam-et-sed', 'publish', 174, 17, '[18,23,28]', 0, 0, NULL, NULL, NULL, NULL, '2025-04-16 03:24:09', '2025-04-16 03:24:09'),
(7, 'Debitis labore.', NULL, 'debitis-labore', 'publish', 176, 33, '[34,39,44]', 0, 0, NULL, NULL, NULL, NULL, '2025-04-16 03:24:09', '2025-04-16 03:24:09'),
(8, 'Earum soluta iusto.', NULL, 'earum-soluta-iusto', 'publish', 175, 33, '[34,44]', 0, 0, NULL, NULL, NULL, NULL, '2025-04-16 03:24:09', '2025-04-16 03:24:09'),
(9, 'Nihil et.', NULL, 'nihil-et', 'publish', 174, 33, '[34,39,44]', 0, 0, NULL, NULL, NULL, NULL, '2025-04-16 03:24:09', '2025-04-16 03:24:09');

INSERT INTO `bc_gigs` (`id`, `title`, `slug`, `content`, `image_id`, `banner_image_id`, `is_featured`, `gallery`, `video_url`, `cat_id`, `cat2_id`, `cat3_id`, `basic_price`, `standard_price`, `premium_price`, `extra_price`, `review_score`, `status`, `packages`, `package_compare`, `faqs`, `requirements`, `basic_delivery_time`, `create_user`, `update_user`, `author_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'I will Quod corrupti veritatis', 'i-will-quod-corrupti-veritatis', '<p>Rerum dolore qui porro est. Id inventore odit assumenda ut ullam saepe iste voluptas. Omnis et ullam deserunt dolores aut a aliquam.</p>\r\n                                <p>Autem sit eveniet quia et. Praesentium ut rerum consequatur optio voluptates. Enim voluptatem nemo suscipit quidem nihil.</p>\r\n                                <p>Autem non quas in repudiandae alias blanditiis aperiam. Quis non exercitationem delectus rerum molestiae ullam temporibus. Neque harum nemo asperiores hic. Voluptas harum aspernatur minima suscipit velit ipsam aut.</p>\r\n                                <p>Voluptatum quia minima quasi autem. Distinctio quo possimus velit ut porro dolorem.</p>\r\n                                <p>Illo distinctio quis qui rem provident. Dolor sit recusandae vel consectetur illum illum qui.</p>\r\n                                <p>Voluptas dignissimos facilis voluptas est molestiae sed odio. Doloremque non cumque mollitia dolor labore. Ratione et est sit et odio dolor. Aut iste ipsam placeat sunt nesciunt.</p>\r\n                                <p>Eaque autem rerum veritatis placeat qui. Ad voluptatem est sint voluptatem est quis beatae. Dolorum modi praesentium voluptate numquam. Et quo dolorem odio aliquid non cupiditate eum. Delectus quo exercitationem non.</p>\r\n                                <p>Deserunt est a sunt voluptatem velit temporibus. Veritatis qui nisi est animi. Non cupiditate tenetur error aliquam quia.</p>\r\n                                <p>Provident at vero quo beatae doloribus suscipit velit cumque. Nihil dicta molestias consequatur cum sed voluptate. Et quasi at velit perspiciatis nobis quia. Quidem laudantium non vel laboriosam rerum aut.</p>\r\n                                <p>Rerum totam rem eos quam necessitatibus sed consectetur. Itaque quia consequatur nisi suscipit autem expedita. Corporis id dignissimos consequatur molestiae.    </p>', 173, NULL, NULL, '173, 174, 175, 176', 'https://www.youtube.com/watch?v=K1QICrgxTjA', 17, 18, 19, 10.00, 19.00, 166.00, NULL, 4.7, 'publish', '[{\"name\":\"Basic\",\"key\":\"basic\",\"desc\":\"Voluptate occaecati beatae ut et culpa.\",\"delivery_time\":1,\"revision\":3},{\"name\":\"Standard\",\"key\":\"standard\",\"desc\":\"Natus tempora perspiciatis totam sed.\",\"delivery_time\":4,\"revision\":3},{\"name\":\"Premium\",\"key\":\"premium\",\"desc\":\"Minus eos perspiciatis ex sunt iusto.\",\"delivery_time\":6,\"revision\":3}]', '[{\"name\":\"Nisi ratione consequuntur qui.\",\"content\":\"No\",\"content1\":\"Yes\",\"content2\":\"Yes\"},{\"name\":\"Quae minima eos.\",\"content\":\"No\",\"content1\":\"Yes\",\"content2\":\"Yes\"},{\"name\":\"Neque id.\",\"content\":\"No\",\"content1\":\"Yes\",\"content2\":\"Yes\"}]', NULL, NULL, 1, NULL, NULL, 1, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10'),
(2, 'I will Ab cumque aut et reiciendis itaque ea ipsa qui.', 'i-will-ab-cumque-aut-et-reiciendis-itaque-ea-ipsa-qui', '<p>Rerum dolore qui porro est. Id inventore odit assumenda ut ullam saepe iste voluptas. Omnis et ullam deserunt dolores aut a aliquam.</p>\r\n                                <p>Autem sit eveniet quia et. Praesentium ut rerum consequatur optio voluptates. Enim voluptatem nemo suscipit quidem nihil.</p>\r\n                                <p>Autem non quas in repudiandae alias blanditiis aperiam. Quis non exercitationem delectus rerum molestiae ullam temporibus. Neque harum nemo asperiores hic. Voluptas harum aspernatur minima suscipit velit ipsam aut.</p>\r\n                                <p>Voluptatum quia minima quasi autem. Distinctio quo possimus velit ut porro dolorem.</p>\r\n                                <p>Illo distinctio quis qui rem provident. Dolor sit recusandae vel consectetur illum illum qui.</p>\r\n                                <p>Voluptas dignissimos facilis voluptas est molestiae sed odio. Doloremque non cumque mollitia dolor labore. Ratione et est sit et odio dolor. Aut iste ipsam placeat sunt nesciunt.</p>\r\n                                <p>Eaque autem rerum veritatis placeat qui. Ad voluptatem est sint voluptatem est quis beatae. Dolorum modi praesentium voluptate numquam. Et quo dolorem odio aliquid non cupiditate eum. Delectus quo exercitationem non.</p>\r\n                                <p>Deserunt est a sunt voluptatem velit temporibus. Veritatis qui nisi est animi. Non cupiditate tenetur error aliquam quia.</p>\r\n                                <p>Provident at vero quo beatae doloribus suscipit velit cumque. Nihil dicta molestias consequatur cum sed voluptate. Et quasi at velit perspiciatis nobis quia. Quidem laudantium non vel laboriosam rerum aut.</p>\r\n                                <p>Rerum totam rem eos quam necessitatibus sed consectetur. Itaque quia consequatur nisi suscipit autem expedita. Corporis id dignissimos consequatur molestiae.    </p>', 173, NULL, NULL, '173, 174, 175, 176', 'https://www.youtube.com/watch?v=K1QICrgxTjA', 33, 34, 35, 6.00, 34.00, 186.00, NULL, 4.7, 'publish', '[{\"name\":\"Basic\",\"key\":\"basic\",\"desc\":\"Accusantium neque maxime accusamus molestiae voluptatem.\",\"delivery_time\":2,\"revision\":3},{\"name\":\"Standard\",\"key\":\"standard\",\"desc\":\"Sapiente hic exercitationem labore.\",\"delivery_time\":4,\"revision\":3},{\"name\":\"Premium\",\"key\":\"premium\",\"desc\":\"Sit illum deserunt necessitatibus dolorem sit nihil vel quia.\",\"delivery_time\":6,\"revision\":3}]', '[{\"name\":\"Et natus id et.\",\"content\":\"No\",\"content1\":\"Yes\",\"content2\":\"Yes\"},{\"name\":\"Et molestiae voluptatem harum.\",\"content\":\"No\",\"content1\":\"Yes\",\"content2\":\"Yes\"},{\"name\":\"Perferendis qui dolorem.\",\"content\":\"No\",\"content1\":\"Yes\",\"content2\":\"Yes\"}]', NULL, NULL, 2, NULL, NULL, 1, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10'),
(3, 'I will Accusantium saepe nostrum sunt minus.', 'i-will-accusantium-saepe-nostrum-sunt-minus', '<p>Rerum dolore qui porro est. Id inventore odit assumenda ut ullam saepe iste voluptas. Omnis et ullam deserunt dolores aut a aliquam.</p>\r\n                                <p>Autem sit eveniet quia et. Praesentium ut rerum consequatur optio voluptates. Enim voluptatem nemo suscipit quidem nihil.</p>\r\n                                <p>Autem non quas in repudiandae alias blanditiis aperiam. Quis non exercitationem delectus rerum molestiae ullam temporibus. Neque harum nemo asperiores hic. Voluptas harum aspernatur minima suscipit velit ipsam aut.</p>\r\n                                <p>Voluptatum quia minima quasi autem. Distinctio quo possimus velit ut porro dolorem.</p>\r\n                                <p>Illo distinctio quis qui rem provident. Dolor sit recusandae vel consectetur illum illum qui.</p>\r\n                                <p>Voluptas dignissimos facilis voluptas est molestiae sed odio. Doloremque non cumque mollitia dolor labore. Ratione et est sit et odio dolor. Aut iste ipsam placeat sunt nesciunt.</p>\r\n                                <p>Eaque autem rerum veritatis placeat qui. Ad voluptatem est sint voluptatem est quis beatae. Dolorum modi praesentium voluptate numquam. Et quo dolorem odio aliquid non cupiditate eum. Delectus quo exercitationem non.</p>\r\n                                <p>Deserunt est a sunt voluptatem velit temporibus. Veritatis qui nisi est animi. Non cupiditate tenetur error aliquam quia.</p>\r\n                                <p>Provident at vero quo beatae doloribus suscipit velit cumque. Nihil dicta molestias consequatur cum sed voluptate. Et quasi at velit perspiciatis nobis quia. Quidem laudantium non vel laboriosam rerum aut.</p>\r\n                                <p>Rerum totam rem eos quam necessitatibus sed consectetur. Itaque quia consequatur nisi suscipit autem expedita. Corporis id dignissimos consequatur molestiae.    </p>', 173, NULL, NULL, '173, 174, 175, 176', 'https://www.youtube.com/watch?v=K1QICrgxTjA', 1, 2, 3, 7.00, 49.00, 165.00, NULL, 4.0, 'publish', '[{\"name\":\"Basic\",\"key\":\"basic\",\"desc\":\"Ducimus sed doloremque corrupti.\",\"delivery_time\":3,\"revision\":3},{\"name\":\"Standard\",\"key\":\"standard\",\"desc\":\"Accusantium dolores soluta dolorem veniam quia voluptates veritatis.\",\"delivery_time\":4,\"revision\":3},{\"name\":\"Premium\",\"key\":\"premium\",\"desc\":\"Dignissimos dicta optio esse.\",\"delivery_time\":6,\"revision\":3}]', '[{\"name\":\"Repudiandae consequatur ut.\",\"content\":\"No\",\"content1\":\"Yes\",\"content2\":\"Yes\"},{\"name\":\"Qui similique.\",\"content\":\"No\",\"content1\":\"Yes\",\"content2\":\"Yes\"},{\"name\":\"Impedit facere vel vero.\",\"content\":\"No\",\"content1\":\"Yes\",\"content2\":\"Yes\"}]', NULL, NULL, 3, NULL, NULL, 1, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10'),
(4, 'I will Eveniet facere quod nihil.', 'i-will-eveniet-facere-quod-nihil', '<p>Rerum dolore qui porro est. Id inventore odit assumenda ut ullam saepe iste voluptas. Omnis et ullam deserunt dolores aut a aliquam.</p>\r\n                                <p>Autem sit eveniet quia et. Praesentium ut rerum consequatur optio voluptates. Enim voluptatem nemo suscipit quidem nihil.</p>\r\n                                <p>Autem non quas in repudiandae alias blanditiis aperiam. Quis non exercitationem delectus rerum molestiae ullam temporibus. Neque harum nemo asperiores hic. Voluptas harum aspernatur minima suscipit velit ipsam aut.</p>\r\n                                <p>Voluptatum quia minima quasi autem. Distinctio quo possimus velit ut porro dolorem.</p>\r\n                                <p>Illo distinctio quis qui rem provident. Dolor sit recusandae vel consectetur illum illum qui.</p>\r\n                                <p>Voluptas dignissimos facilis voluptas est molestiae sed odio. Doloremque non cumque mollitia dolor labore. Ratione et est sit et odio dolor. Aut iste ipsam placeat sunt nesciunt.</p>\r\n                                <p>Eaque autem rerum veritatis placeat qui. Ad voluptatem est sint voluptatem est quis beatae. Dolorum modi praesentium voluptate numquam. Et quo dolorem odio aliquid non cupiditate eum. Delectus quo exercitationem non.</p>\r\n                                <p>Deserunt est a sunt voluptatem velit temporibus. Veritatis qui nisi est animi. Non cupiditate tenetur error aliquam quia.</p>\r\n                                <p>Provident at vero quo beatae doloribus suscipit velit cumque. Nihil dicta molestias consequatur cum sed voluptate. Et quasi at velit perspiciatis nobis quia. Quidem laudantium non vel laboriosam rerum aut.</p>\r\n                                <p>Rerum totam rem eos quam necessitatibus sed consectetur. Itaque quia consequatur nisi suscipit autem expedita. Corporis id dignissimos consequatur molestiae.    </p>', 176, NULL, NULL, '173, 174, 175, 176', 'https://www.youtube.com/watch?v=K1QICrgxTjA', 33, 34, 35, 7.00, 18.00, 253.00, NULL, 4.3, 'publish', '[{\"name\":\"Basic\",\"key\":\"basic\",\"desc\":\"Officia sint qui assumenda minima consequatur vitae.\",\"delivery_time\":2,\"revision\":3},{\"name\":\"Standard\",\"key\":\"standard\",\"desc\":\"Ipsa esse non ullam.\",\"delivery_time\":4,\"revision\":3},{\"name\":\"Premium\",\"key\":\"premium\",\"desc\":\"Rem veritatis magni velit sit ipsa sit.\",\"delivery_time\":6,\"revision\":3}]', '[{\"name\":\"Earum qui eveniet.\",\"content\":\"No\",\"content1\":\"Yes\",\"content2\":\"Yes\"},{\"name\":\"Voluptas temporibus consequatur culpa iure.\",\"content\":\"No\",\"content1\":\"Yes\",\"content2\":\"Yes\"},{\"name\":\"Deleniti repellat animi.\",\"content\":\"No\",\"content1\":\"Yes\",\"content2\":\"Yes\"}]', NULL, NULL, 2, NULL, NULL, 1, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10'),
(5, 'I will Quasi asperiores praesentium sunt doloribus.', 'i-will-quasi-asperiores-praesentium-sunt-doloribus', '<p>Rerum dolore qui porro est. Id inventore odit assumenda ut ullam saepe iste voluptas. Omnis et ullam deserunt dolores aut a aliquam.</p>\r\n                                <p>Autem sit eveniet quia et. Praesentium ut rerum consequatur optio voluptates. Enim voluptatem nemo suscipit quidem nihil.</p>\r\n                                <p>Autem non quas in repudiandae alias blanditiis aperiam. Quis non exercitationem delectus rerum molestiae ullam temporibus. Neque harum nemo asperiores hic. Voluptas harum aspernatur minima suscipit velit ipsam aut.</p>\r\n                                <p>Voluptatum quia minima quasi autem. Distinctio quo possimus velit ut porro dolorem.</p>\r\n                                <p>Illo distinctio quis qui rem provident. Dolor sit recusandae vel consectetur illum illum qui.</p>\r\n                                <p>Voluptas dignissimos facilis voluptas est molestiae sed odio. Doloremque non cumque mollitia dolor labore. Ratione et est sit et odio dolor. Aut iste ipsam placeat sunt nesciunt.</p>\r\n                                <p>Eaque autem rerum veritatis placeat qui. Ad voluptatem est sint voluptatem est quis beatae. Dolorum modi praesentium voluptate numquam. Et quo dolorem odio aliquid non cupiditate eum. Delectus quo exercitationem non.</p>\r\n                                <p>Deserunt est a sunt voluptatem velit temporibus. Veritatis qui nisi est animi. Non cupiditate tenetur error aliquam quia.</p>\r\n                                <p>Provident at vero quo beatae doloribus suscipit velit cumque. Nihil dicta molestias consequatur cum sed voluptate. Et quasi at velit perspiciatis nobis quia. Quidem laudantium non vel laboriosam rerum aut.</p>\r\n                                <p>Rerum totam rem eos quam necessitatibus sed consectetur. Itaque quia consequatur nisi suscipit autem expedita. Corporis id dignissimos consequatur molestiae.    </p>', 174, NULL, NULL, '173, 174, 175, 176', 'https://www.youtube.com/watch?v=K1QICrgxTjA', 33, 34, 35, 5.00, 37.00, 235.00, NULL, 4.3, 'publish', '[{\"name\":\"Basic\",\"key\":\"basic\",\"desc\":\"Praesentium itaque eligendi harum repellendus quibusdam consectetur possimus.\",\"delivery_time\":2,\"revision\":3},{\"name\":\"Standard\",\"key\":\"standard\",\"desc\":\"Magnam laboriosam rerum dolores velit.\",\"delivery_time\":4,\"revision\":3},{\"name\":\"Premium\",\"key\":\"premium\",\"desc\":\"Aut cupiditate et pariatur laborum.\",\"delivery_time\":6,\"revision\":3}]', '[{\"name\":\"Et qui ea.\",\"content\":\"No\",\"content1\":\"Yes\",\"content2\":\"Yes\"},{\"name\":\"Deserunt debitis.\",\"content\":\"No\",\"content1\":\"Yes\",\"content2\":\"Yes\"},{\"name\":\"Iusto velit excepturi.\",\"content\":\"No\",\"content1\":\"Yes\",\"content2\":\"Yes\"}]', NULL, NULL, 2, NULL, NULL, 1, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10'),
(6, 'I will Laboriosam eligendi velit enim et.', 'i-will-laboriosam-eligendi-velit-enim-et', '<p>Rerum dolore qui porro est. Id inventore odit assumenda ut ullam saepe iste voluptas. Omnis et ullam deserunt dolores aut a aliquam.</p>\r\n                                <p>Autem sit eveniet quia et. Praesentium ut rerum consequatur optio voluptates. Enim voluptatem nemo suscipit quidem nihil.</p>\r\n                                <p>Autem non quas in repudiandae alias blanditiis aperiam. Quis non exercitationem delectus rerum molestiae ullam temporibus. Neque harum nemo asperiores hic. Voluptas harum aspernatur minima suscipit velit ipsam aut.</p>\r\n                                <p>Voluptatum quia minima quasi autem. Distinctio quo possimus velit ut porro dolorem.</p>\r\n                                <p>Illo distinctio quis qui rem provident. Dolor sit recusandae vel consectetur illum illum qui.</p>\r\n                                <p>Voluptas dignissimos facilis voluptas est molestiae sed odio. Doloremque non cumque mollitia dolor labore. Ratione et est sit et odio dolor. Aut iste ipsam placeat sunt nesciunt.</p>\r\n                                <p>Eaque autem rerum veritatis placeat qui. Ad voluptatem est sint voluptatem est quis beatae. Dolorum modi praesentium voluptate numquam. Et quo dolorem odio aliquid non cupiditate eum. Delectus quo exercitationem non.</p>\r\n                                <p>Deserunt est a sunt voluptatem velit temporibus. Veritatis qui nisi est animi. Non cupiditate tenetur error aliquam quia.</p>\r\n                                <p>Provident at vero quo beatae doloribus suscipit velit cumque. Nihil dicta molestias consequatur cum sed voluptate. Et quasi at velit perspiciatis nobis quia. Quidem laudantium non vel laboriosam rerum aut.</p>\r\n                                <p>Rerum totam rem eos quam necessitatibus sed consectetur. Itaque quia consequatur nisi suscipit autem expedita. Corporis id dignissimos consequatur molestiae.    </p>', 175, NULL, NULL, '173, 174, 175, 176', 'https://www.youtube.com/watch?v=K1QICrgxTjA', 1, 2, 3, 6.00, 31.00, 228.00, NULL, 5.0, 'publish', '[{\"name\":\"Basic\",\"key\":\"basic\",\"desc\":\"Suscipit tempore aut provident aspernatur.\",\"delivery_time\":1,\"revision\":3},{\"name\":\"Standard\",\"key\":\"standard\",\"desc\":\"Nesciunt asperiores eum magnam voluptatem doloremque.\",\"delivery_time\":4,\"revision\":3},{\"name\":\"Premium\",\"key\":\"premium\",\"desc\":\"Nesciunt rerum ab ut aut quibusdam.\",\"delivery_time\":6,\"revision\":3}]', '[{\"name\":\"Iste debitis laborum.\",\"content\":\"No\",\"content1\":\"Yes\",\"content2\":\"Yes\"},{\"name\":\"Nesciunt voluptas eveniet.\",\"content\":\"No\",\"content1\":\"Yes\",\"content2\":\"Yes\"},{\"name\":\"Deleniti quo enim quisquam veniam.\",\"content\":\"No\",\"content1\":\"Yes\",\"content2\":\"Yes\"}]', NULL, NULL, 1, NULL, NULL, 1, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10'),
(7, 'I will Non error quia earum blanditiis nemo ea.', 'i-will-non-error-quia-earum-blanditiis-nemo-ea', '<p>Rerum dolore qui porro est. Id inventore odit assumenda ut ullam saepe iste voluptas. Omnis et ullam deserunt dolores aut a aliquam.</p>\r\n                                <p>Autem sit eveniet quia et. Praesentium ut rerum consequatur optio voluptates. Enim voluptatem nemo suscipit quidem nihil.</p>\r\n                                <p>Autem non quas in repudiandae alias blanditiis aperiam. Quis non exercitationem delectus rerum molestiae ullam temporibus. Neque harum nemo asperiores hic. Voluptas harum aspernatur minima suscipit velit ipsam aut.</p>\r\n                                <p>Voluptatum quia minima quasi autem. Distinctio quo possimus velit ut porro dolorem.</p>\r\n                                <p>Illo distinctio quis qui rem provident. Dolor sit recusandae vel consectetur illum illum qui.</p>\r\n                                <p>Voluptas dignissimos facilis voluptas est molestiae sed odio. Doloremque non cumque mollitia dolor labore. Ratione et est sit et odio dolor. Aut iste ipsam placeat sunt nesciunt.</p>\r\n                                <p>Eaque autem rerum veritatis placeat qui. Ad voluptatem est sint voluptatem est quis beatae. Dolorum modi praesentium voluptate numquam. Et quo dolorem odio aliquid non cupiditate eum. Delectus quo exercitationem non.</p>\r\n                                <p>Deserunt est a sunt voluptatem velit temporibus. Veritatis qui nisi est animi. Non cupiditate tenetur error aliquam quia.</p>\r\n                                <p>Provident at vero quo beatae doloribus suscipit velit cumque. Nihil dicta molestias consequatur cum sed voluptate. Et quasi at velit perspiciatis nobis quia. Quidem laudantium non vel laboriosam rerum aut.</p>\r\n                                <p>Rerum totam rem eos quam necessitatibus sed consectetur. Itaque quia consequatur nisi suscipit autem expedita. Corporis id dignissimos consequatur molestiae.    </p>', 173, NULL, NULL, '173, 174, 175, 176', 'https://www.youtube.com/watch?v=K1QICrgxTjA', 17, 18, 19, 6.00, 27.00, 243.00, NULL, 4.7, 'publish', '[{\"name\":\"Basic\",\"key\":\"basic\",\"desc\":\"Error ea consectetur facere autem.\",\"delivery_time\":2,\"revision\":3},{\"name\":\"Standard\",\"key\":\"standard\",\"desc\":\"Modi delectus enim sit.\",\"delivery_time\":4,\"revision\":3},{\"name\":\"Premium\",\"key\":\"premium\",\"desc\":\"Et temporibus non totam voluptas provident commodi.\",\"delivery_time\":6,\"revision\":3}]', '[{\"name\":\"Iure dolor ipsam enim.\",\"content\":\"No\",\"content1\":\"Yes\",\"content2\":\"Yes\"},{\"name\":\"Adipisci mollitia laudantium.\",\"content\":\"No\",\"content1\":\"Yes\",\"content2\":\"Yes\"},{\"name\":\"Facilis delectus molestias.\",\"content\":\"No\",\"content1\":\"Yes\",\"content2\":\"Yes\"}]', NULL, NULL, 2, NULL, NULL, 1, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10'),
(8, 'I will Quam asperiores culpa fugit.', 'i-will-quam-asperiores-culpa-fugit', '<p>Rerum dolore qui porro est. Id inventore odit assumenda ut ullam saepe iste voluptas. Omnis et ullam deserunt dolores aut a aliquam.</p>\r\n                                <p>Autem sit eveniet quia et. Praesentium ut rerum consequatur optio voluptates. Enim voluptatem nemo suscipit quidem nihil.</p>\r\n                                <p>Autem non quas in repudiandae alias blanditiis aperiam. Quis non exercitationem delectus rerum molestiae ullam temporibus. Neque harum nemo asperiores hic. Voluptas harum aspernatur minima suscipit velit ipsam aut.</p>\r\n                                <p>Voluptatum quia minima quasi autem. Distinctio quo possimus velit ut porro dolorem.</p>\r\n                                <p>Illo distinctio quis qui rem provident. Dolor sit recusandae vel consectetur illum illum qui.</p>\r\n                                <p>Voluptas dignissimos facilis voluptas est molestiae sed odio. Doloremque non cumque mollitia dolor labore. Ratione et est sit et odio dolor. Aut iste ipsam placeat sunt nesciunt.</p>\r\n                                <p>Eaque autem rerum veritatis placeat qui. Ad voluptatem est sint voluptatem est quis beatae. Dolorum modi praesentium voluptate numquam. Et quo dolorem odio aliquid non cupiditate eum. Delectus quo exercitationem non.</p>\r\n                                <p>Deserunt est a sunt voluptatem velit temporibus. Veritatis qui nisi est animi. Non cupiditate tenetur error aliquam quia.</p>\r\n                                <p>Provident at vero quo beatae doloribus suscipit velit cumque. Nihil dicta molestias consequatur cum sed voluptate. Et quasi at velit perspiciatis nobis quia. Quidem laudantium non vel laboriosam rerum aut.</p>\r\n                                <p>Rerum totam rem eos quam necessitatibus sed consectetur. Itaque quia consequatur nisi suscipit autem expedita. Corporis id dignissimos consequatur molestiae.    </p>', 173, NULL, NULL, '173, 174, 175, 176', 'https://www.youtube.com/watch?v=K1QICrgxTjA', 1, 2, 3, 10.00, 24.00, 187.00, NULL, 5.0, 'publish', '[{\"name\":\"Basic\",\"key\":\"basic\",\"desc\":\"A sed sit qui asperiores est ut optio.\",\"delivery_time\":1,\"revision\":3},{\"name\":\"Standard\",\"key\":\"standard\",\"desc\":\"Omnis est sed laborum error quam.\",\"delivery_time\":4,\"revision\":3},{\"name\":\"Premium\",\"key\":\"premium\",\"desc\":\"Non qui magnam ratione consequatur excepturi.\",\"delivery_time\":6,\"revision\":3}]', '[{\"name\":\"Illo est nihil magni harum.\",\"content\":\"No\",\"content1\":\"Yes\",\"content2\":\"Yes\"},{\"name\":\"Fugit illo quisquam.\",\"content\":\"No\",\"content1\":\"Yes\",\"content2\":\"Yes\"},{\"name\":\"Repellat perspiciatis aliquam.\",\"content\":\"No\",\"content1\":\"Yes\",\"content2\":\"Yes\"}]', NULL, NULL, 1, NULL, NULL, 1, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10'),
(9, 'I will Officiis autem quas et sit quas inventore architecto aspernatur.', 'i-will-officiis-autem-quas-et-sit-quas-inventore-architecto-aspernatur', '<p>Rerum dolore qui porro est. Id inventore odit assumenda ut ullam saepe iste voluptas. Omnis et ullam deserunt dolores aut a aliquam.</p>\r\n                                <p>Autem sit eveniet quia et. Praesentium ut rerum consequatur optio voluptates. Enim voluptatem nemo suscipit quidem nihil.</p>\r\n                                <p>Autem non quas in repudiandae alias blanditiis aperiam. Quis non exercitationem delectus rerum molestiae ullam temporibus. Neque harum nemo asperiores hic. Voluptas harum aspernatur minima suscipit velit ipsam aut.</p>\r\n                                <p>Voluptatum quia minima quasi autem. Distinctio quo possimus velit ut porro dolorem.</p>\r\n                                <p>Illo distinctio quis qui rem provident. Dolor sit recusandae vel consectetur illum illum qui.</p>\r\n                                <p>Voluptas dignissimos facilis voluptas est molestiae sed odio. Doloremque non cumque mollitia dolor labore. Ratione et est sit et odio dolor. Aut iste ipsam placeat sunt nesciunt.</p>\r\n                                <p>Eaque autem rerum veritatis placeat qui. Ad voluptatem est sint voluptatem est quis beatae. Dolorum modi praesentium voluptate numquam. Et quo dolorem odio aliquid non cupiditate eum. Delectus quo exercitationem non.</p>\r\n                                <p>Deserunt est a sunt voluptatem velit temporibus. Veritatis qui nisi est animi. Non cupiditate tenetur error aliquam quia.</p>\r\n                                <p>Provident at vero quo beatae doloribus suscipit velit cumque. Nihil dicta molestias consequatur cum sed voluptate. Et quasi at velit perspiciatis nobis quia. Quidem laudantium non vel laboriosam rerum aut.</p>\r\n                                <p>Rerum totam rem eos quam necessitatibus sed consectetur. Itaque quia consequatur nisi suscipit autem expedita. Corporis id dignissimos consequatur molestiae.    </p>', 174, NULL, NULL, '173, 174, 175, 176', 'https://www.youtube.com/watch?v=K1QICrgxTjA', 17, 18, 19, 7.00, 40.00, 293.00, NULL, 4.3, 'publish', '[{\"name\":\"Basic\",\"key\":\"basic\",\"desc\":\"Rerum aut dignissimos nulla blanditiis aliquid fuga.\",\"delivery_time\":3,\"revision\":3},{\"name\":\"Standard\",\"key\":\"standard\",\"desc\":\"Nulla amet consequuntur quidem.\",\"delivery_time\":4,\"revision\":3},{\"name\":\"Premium\",\"key\":\"premium\",\"desc\":\"Esse blanditiis quae dolor assumenda consequuntur nihil rerum.\",\"delivery_time\":6,\"revision\":3}]', '[{\"name\":\"Nihil culpa libero.\",\"content\":\"No\",\"content1\":\"Yes\",\"content2\":\"Yes\"},{\"name\":\"Qui quia optio facere.\",\"content\":\"No\",\"content1\":\"Yes\",\"content2\":\"Yes\"},{\"name\":\"Culpa odit quasi autem.\",\"content\":\"No\",\"content1\":\"Yes\",\"content2\":\"Yes\"}]', NULL, NULL, 3, NULL, NULL, 1, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10'),
(10, 'I will Debitis explicabo aut hic neque et.', 'i-will-debitis-explicabo-aut-hic-neque-et', '<p>Rerum dolore qui porro est. Id inventore odit assumenda ut ullam saepe iste voluptas. Omnis et ullam deserunt dolores aut a aliquam.</p>\r\n                                <p>Autem sit eveniet quia et. Praesentium ut rerum consequatur optio voluptates. Enim voluptatem nemo suscipit quidem nihil.</p>\r\n                                <p>Autem non quas in repudiandae alias blanditiis aperiam. Quis non exercitationem delectus rerum molestiae ullam temporibus. Neque harum nemo asperiores hic. Voluptas harum aspernatur minima suscipit velit ipsam aut.</p>\r\n                                <p>Voluptatum quia minima quasi autem. Distinctio quo possimus velit ut porro dolorem.</p>\r\n                                <p>Illo distinctio quis qui rem provident. Dolor sit recusandae vel consectetur illum illum qui.</p>\r\n                                <p>Voluptas dignissimos facilis voluptas est molestiae sed odio. Doloremque non cumque mollitia dolor labore. Ratione et est sit et odio dolor. Aut iste ipsam placeat sunt nesciunt.</p>\r\n                                <p>Eaque autem rerum veritatis placeat qui. Ad voluptatem est sint voluptatem est quis beatae. Dolorum modi praesentium voluptate numquam. Et quo dolorem odio aliquid non cupiditate eum. Delectus quo exercitationem non.</p>\r\n                                <p>Deserunt est a sunt voluptatem velit temporibus. Veritatis qui nisi est animi. Non cupiditate tenetur error aliquam quia.</p>\r\n                                <p>Provident at vero quo beatae doloribus suscipit velit cumque. Nihil dicta molestias consequatur cum sed voluptate. Et quasi at velit perspiciatis nobis quia. Quidem laudantium non vel laboriosam rerum aut.</p>\r\n                                <p>Rerum totam rem eos quam necessitatibus sed consectetur. Itaque quia consequatur nisi suscipit autem expedita. Corporis id dignissimos consequatur molestiae.    </p>', 176, NULL, NULL, '173, 174, 175, 176', 'https://www.youtube.com/watch?v=K1QICrgxTjA', 17, 18, 19, 9.00, 23.00, 288.00, NULL, 4.3, 'publish', '[{\"name\":\"Basic\",\"key\":\"basic\",\"desc\":\"Et sunt nulla voluptas sequi eum consequatur facere.\",\"delivery_time\":3,\"revision\":3},{\"name\":\"Standard\",\"key\":\"standard\",\"desc\":\"Sit deserunt laborum ducimus.\",\"delivery_time\":4,\"revision\":3},{\"name\":\"Premium\",\"key\":\"premium\",\"desc\":\"Harum molestiae rerum sed distinctio et.\",\"delivery_time\":6,\"revision\":3}]', '[{\"name\":\"Sequi ex debitis.\",\"content\":\"No\",\"content1\":\"Yes\",\"content2\":\"Yes\"},{\"name\":\"Qui quidem.\",\"content\":\"No\",\"content1\":\"Yes\",\"content2\":\"Yes\"},{\"name\":\"Pariatur inventore beatae architecto.\",\"content\":\"No\",\"content1\":\"Yes\",\"content2\":\"Yes\"}]', NULL, NULL, 3, NULL, NULL, 1, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10'),
(11, 'I will Quidem neque omnis non exercitationem quia perspiciatis deserunt.', 'i-will-quidem-neque-omnis-non-exercitationem-quia-perspiciatis-deserunt', '<p>Rerum dolore qui porro est. Id inventore odit assumenda ut ullam saepe iste voluptas. Omnis et ullam deserunt dolores aut a aliquam.</p>\r\n                                <p>Autem sit eveniet quia et. Praesentium ut rerum consequatur optio voluptates. Enim voluptatem nemo suscipit quidem nihil.</p>\r\n                                <p>Autem non quas in repudiandae alias blanditiis aperiam. Quis non exercitationem delectus rerum molestiae ullam temporibus. Neque harum nemo asperiores hic. Voluptas harum aspernatur minima suscipit velit ipsam aut.</p>\r\n                                <p>Voluptatum quia minima quasi autem. Distinctio quo possimus velit ut porro dolorem.</p>\r\n                                <p>Illo distinctio quis qui rem provident. Dolor sit recusandae vel consectetur illum illum qui.</p>\r\n                                <p>Voluptas dignissimos facilis voluptas est molestiae sed odio. Doloremque non cumque mollitia dolor labore. Ratione et est sit et odio dolor. Aut iste ipsam placeat sunt nesciunt.</p>\r\n                                <p>Eaque autem rerum veritatis placeat qui. Ad voluptatem est sint voluptatem est quis beatae. Dolorum modi praesentium voluptate numquam. Et quo dolorem odio aliquid non cupiditate eum. Delectus quo exercitationem non.</p>\r\n                                <p>Deserunt est a sunt voluptatem velit temporibus. Veritatis qui nisi est animi. Non cupiditate tenetur error aliquam quia.</p>\r\n                                <p>Provident at vero quo beatae doloribus suscipit velit cumque. Nihil dicta molestias consequatur cum sed voluptate. Et quasi at velit perspiciatis nobis quia. Quidem laudantium non vel laboriosam rerum aut.</p>\r\n                                <p>Rerum totam rem eos quam necessitatibus sed consectetur. Itaque quia consequatur nisi suscipit autem expedita. Corporis id dignissimos consequatur molestiae.    </p>', 173, NULL, NULL, '173, 174, 175, 176', 'https://www.youtube.com/watch?v=K1QICrgxTjA', 33, 34, 35, 7.00, 16.00, 292.00, NULL, 5.0, 'publish', '[{\"name\":\"Basic\",\"key\":\"basic\",\"desc\":\"Quaerat corporis non accusamus voluptas quibusdam.\",\"delivery_time\":2,\"revision\":3},{\"name\":\"Standard\",\"key\":\"standard\",\"desc\":\"Possimus voluptates aut necessitatibus inventore minima voluptatum eligendi repudiandae.\",\"delivery_time\":4,\"revision\":3},{\"name\":\"Premium\",\"key\":\"premium\",\"desc\":\"Voluptate culpa quisquam eveniet ut.\",\"delivery_time\":6,\"revision\":3}]', '[{\"name\":\"Ut expedita quasi.\",\"content\":\"No\",\"content1\":\"Yes\",\"content2\":\"Yes\"},{\"name\":\"Molestiae consequatur aut.\",\"content\":\"No\",\"content1\":\"Yes\",\"content2\":\"Yes\"},{\"name\":\"Reprehenderit cum eos.\",\"content\":\"No\",\"content1\":\"Yes\",\"content2\":\"Yes\"}]', NULL, NULL, 2, NULL, NULL, 1, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10'),
(12, 'I will Impedit assumenda non consequatur vitae sed dolores.', 'i-will-impedit-assumenda-non-consequatur-vitae-sed-dolores', '<p>Rerum dolore qui porro est. Id inventore odit assumenda ut ullam saepe iste voluptas. Omnis et ullam deserunt dolores aut a aliquam.</p>\r\n                                <p>Autem sit eveniet quia et. Praesentium ut rerum consequatur optio voluptates. Enim voluptatem nemo suscipit quidem nihil.</p>\r\n                                <p>Autem non quas in repudiandae alias blanditiis aperiam. Quis non exercitationem delectus rerum molestiae ullam temporibus. Neque harum nemo asperiores hic. Voluptas harum aspernatur minima suscipit velit ipsam aut.</p>\r\n                                <p>Voluptatum quia minima quasi autem. Distinctio quo possimus velit ut porro dolorem.</p>\r\n                                <p>Illo distinctio quis qui rem provident. Dolor sit recusandae vel consectetur illum illum qui.</p>\r\n                                <p>Voluptas dignissimos facilis voluptas est molestiae sed odio. Doloremque non cumque mollitia dolor labore. Ratione et est sit et odio dolor. Aut iste ipsam placeat sunt nesciunt.</p>\r\n                                <p>Eaque autem rerum veritatis placeat qui. Ad voluptatem est sint voluptatem est quis beatae. Dolorum modi praesentium voluptate numquam. Et quo dolorem odio aliquid non cupiditate eum. Delectus quo exercitationem non.</p>\r\n                                <p>Deserunt est a sunt voluptatem velit temporibus. Veritatis qui nisi est animi. Non cupiditate tenetur error aliquam quia.</p>\r\n                                <p>Provident at vero quo beatae doloribus suscipit velit cumque. Nihil dicta molestias consequatur cum sed voluptate. Et quasi at velit perspiciatis nobis quia. Quidem laudantium non vel laboriosam rerum aut.</p>\r\n                                <p>Rerum totam rem eos quam necessitatibus sed consectetur. Itaque quia consequatur nisi suscipit autem expedita. Corporis id dignissimos consequatur molestiae.    </p>', 173, NULL, NULL, '173, 174, 175, 176', 'https://www.youtube.com/watch?v=K1QICrgxTjA', 33, 34, 35, 6.00, 25.00, 266.00, NULL, 4.3, 'publish', '[{\"name\":\"Basic\",\"key\":\"basic\",\"desc\":\"Laborum consequatur culpa sapiente quia nemo.\",\"delivery_time\":1,\"revision\":3},{\"name\":\"Standard\",\"key\":\"standard\",\"desc\":\"Quasi ipsam incidunt rerum.\",\"delivery_time\":4,\"revision\":3},{\"name\":\"Premium\",\"key\":\"premium\",\"desc\":\"Quas qui culpa voluptatem consequatur perferendis et.\",\"delivery_time\":6,\"revision\":3}]', '[{\"name\":\"Quis aut quasi soluta.\",\"content\":\"No\",\"content1\":\"Yes\",\"content2\":\"Yes\"},{\"name\":\"Sequi similique qui qui cum.\",\"content\":\"No\",\"content1\":\"Yes\",\"content2\":\"Yes\"},{\"name\":\"Ad officia amet debitis et.\",\"content\":\"No\",\"content1\":\"Yes\",\"content2\":\"Yes\"}]', NULL, NULL, 1, NULL, NULL, 1, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:11'),
(13, 'I will Nemo veritatis non at magni itaque.', 'i-will-nemo-veritatis-non-at-magni-itaque', '<p>Rerum dolore qui porro est. Id inventore odit assumenda ut ullam saepe iste voluptas. Omnis et ullam deserunt dolores aut a aliquam.</p>\r\n                                <p>Autem sit eveniet quia et. Praesentium ut rerum consequatur optio voluptates. Enim voluptatem nemo suscipit quidem nihil.</p>\r\n                                <p>Autem non quas in repudiandae alias blanditiis aperiam. Quis non exercitationem delectus rerum molestiae ullam temporibus. Neque harum nemo asperiores hic. Voluptas harum aspernatur minima suscipit velit ipsam aut.</p>\r\n                                <p>Voluptatum quia minima quasi autem. Distinctio quo possimus velit ut porro dolorem.</p>\r\n                                <p>Illo distinctio quis qui rem provident. Dolor sit recusandae vel consectetur illum illum qui.</p>\r\n                                <p>Voluptas dignissimos facilis voluptas est molestiae sed odio. Doloremque non cumque mollitia dolor labore. Ratione et est sit et odio dolor. Aut iste ipsam placeat sunt nesciunt.</p>\r\n                                <p>Eaque autem rerum veritatis placeat qui. Ad voluptatem est sint voluptatem est quis beatae. Dolorum modi praesentium voluptate numquam. Et quo dolorem odio aliquid non cupiditate eum. Delectus quo exercitationem non.</p>\r\n                                <p>Deserunt est a sunt voluptatem velit temporibus. Veritatis qui nisi est animi. Non cupiditate tenetur error aliquam quia.</p>\r\n                                <p>Provident at vero quo beatae doloribus suscipit velit cumque. Nihil dicta molestias consequatur cum sed voluptate. Et quasi at velit perspiciatis nobis quia. Quidem laudantium non vel laboriosam rerum aut.</p>\r\n                                <p>Rerum totam rem eos quam necessitatibus sed consectetur. Itaque quia consequatur nisi suscipit autem expedita. Corporis id dignissimos consequatur molestiae.    </p>', 176, NULL, NULL, '173, 174, 175, 176', 'https://www.youtube.com/watch?v=K1QICrgxTjA', 1, 2, 3, 8.00, 26.00, 175.00, NULL, 4.7, 'publish', '[{\"name\":\"Basic\",\"key\":\"basic\",\"desc\":\"Et neque incidunt aut aspernatur eos.\",\"delivery_time\":2,\"revision\":3},{\"name\":\"Standard\",\"key\":\"standard\",\"desc\":\"Sed consequatur non ex voluptatem.\",\"delivery_time\":4,\"revision\":3},{\"name\":\"Premium\",\"key\":\"premium\",\"desc\":\"Animi cum nobis saepe.\",\"delivery_time\":6,\"revision\":3}]', '[{\"name\":\"Dolorum iusto magnam quod.\",\"content\":\"No\",\"content1\":\"Yes\",\"content2\":\"Yes\"},{\"name\":\"Laborum velit neque.\",\"content\":\"No\",\"content1\":\"Yes\",\"content2\":\"Yes\"},{\"name\":\"Asperiores repudiandae asperiores est.\",\"content\":\"No\",\"content1\":\"Yes\",\"content2\":\"Yes\"}]', NULL, NULL, 2, NULL, NULL, 1, NULL, '2025-04-16 03:24:11', '2025-04-16 03:24:11'),
(14, 'I will In aut in est eum doloremque.', 'i-will-in-aut-in-est-eum-doloremque', '<p>Rerum dolore qui porro est. Id inventore odit assumenda ut ullam saepe iste voluptas. Omnis et ullam deserunt dolores aut a aliquam.</p>\r\n                                <p>Autem sit eveniet quia et. Praesentium ut rerum consequatur optio voluptates. Enim voluptatem nemo suscipit quidem nihil.</p>\r\n                                <p>Autem non quas in repudiandae alias blanditiis aperiam. Quis non exercitationem delectus rerum molestiae ullam temporibus. Neque harum nemo asperiores hic. Voluptas harum aspernatur minima suscipit velit ipsam aut.</p>\r\n                                <p>Voluptatum quia minima quasi autem. Distinctio quo possimus velit ut porro dolorem.</p>\r\n                                <p>Illo distinctio quis qui rem provident. Dolor sit recusandae vel consectetur illum illum qui.</p>\r\n                                <p>Voluptas dignissimos facilis voluptas est molestiae sed odio. Doloremque non cumque mollitia dolor labore. Ratione et est sit et odio dolor. Aut iste ipsam placeat sunt nesciunt.</p>\r\n                                <p>Eaque autem rerum veritatis placeat qui. Ad voluptatem est sint voluptatem est quis beatae. Dolorum modi praesentium voluptate numquam. Et quo dolorem odio aliquid non cupiditate eum. Delectus quo exercitationem non.</p>\r\n                                <p>Deserunt est a sunt voluptatem velit temporibus. Veritatis qui nisi est animi. Non cupiditate tenetur error aliquam quia.</p>\r\n                                <p>Provident at vero quo beatae doloribus suscipit velit cumque. Nihil dicta molestias consequatur cum sed voluptate. Et quasi at velit perspiciatis nobis quia. Quidem laudantium non vel laboriosam rerum aut.</p>\r\n                                <p>Rerum totam rem eos quam necessitatibus sed consectetur. Itaque quia consequatur nisi suscipit autem expedita. Corporis id dignissimos consequatur molestiae.    </p>', 174, NULL, NULL, '173, 174, 175, 176', 'https://www.youtube.com/watch?v=K1QICrgxTjA', 33, 34, 35, 9.00, 32.00, 153.00, NULL, 4.3, 'publish', '[{\"name\":\"Basic\",\"key\":\"basic\",\"desc\":\"Expedita voluptates laborum ratione eos quisquam.\",\"delivery_time\":2,\"revision\":3},{\"name\":\"Standard\",\"key\":\"standard\",\"desc\":\"Vel dignissimos fuga assumenda veniam enim vero.\",\"delivery_time\":4,\"revision\":3},{\"name\":\"Premium\",\"key\":\"premium\",\"desc\":\"Qui ipsa nam maxime saepe eum.\",\"delivery_time\":6,\"revision\":3}]', '[{\"name\":\"Omnis aut quaerat.\",\"content\":\"No\",\"content1\":\"Yes\",\"content2\":\"Yes\"},{\"name\":\"Quia soluta quia iste.\",\"content\":\"No\",\"content1\":\"Yes\",\"content2\":\"Yes\"},{\"name\":\"Autem explicabo perspiciatis temporibus.\",\"content\":\"No\",\"content1\":\"Yes\",\"content2\":\"Yes\"}]', NULL, NULL, 2, NULL, NULL, 1, NULL, '2025-04-16 03:24:11', '2025-04-16 03:24:11'),
(15, 'I will Quas non veniam atque quo et.', 'i-will-quas-non-veniam-atque-quo-et', '<p>Rerum dolore qui porro est. Id inventore odit assumenda ut ullam saepe iste voluptas. Omnis et ullam deserunt dolores aut a aliquam.</p>\r\n                                <p>Autem sit eveniet quia et. Praesentium ut rerum consequatur optio voluptates. Enim voluptatem nemo suscipit quidem nihil.</p>\r\n                                <p>Autem non quas in repudiandae alias blanditiis aperiam. Quis non exercitationem delectus rerum molestiae ullam temporibus. Neque harum nemo asperiores hic. Voluptas harum aspernatur minima suscipit velit ipsam aut.</p>\r\n                                <p>Voluptatum quia minima quasi autem. Distinctio quo possimus velit ut porro dolorem.</p>\r\n                                <p>Illo distinctio quis qui rem provident. Dolor sit recusandae vel consectetur illum illum qui.</p>\r\n                                <p>Voluptas dignissimos facilis voluptas est molestiae sed odio. Doloremque non cumque mollitia dolor labore. Ratione et est sit et odio dolor. Aut iste ipsam placeat sunt nesciunt.</p>\r\n                                <p>Eaque autem rerum veritatis placeat qui. Ad voluptatem est sint voluptatem est quis beatae. Dolorum modi praesentium voluptate numquam. Et quo dolorem odio aliquid non cupiditate eum. Delectus quo exercitationem non.</p>\r\n                                <p>Deserunt est a sunt voluptatem velit temporibus. Veritatis qui nisi est animi. Non cupiditate tenetur error aliquam quia.</p>\r\n                                <p>Provident at vero quo beatae doloribus suscipit velit cumque. Nihil dicta molestias consequatur cum sed voluptate. Et quasi at velit perspiciatis nobis quia. Quidem laudantium non vel laboriosam rerum aut.</p>\r\n                                <p>Rerum totam rem eos quam necessitatibus sed consectetur. Itaque quia consequatur nisi suscipit autem expedita. Corporis id dignissimos consequatur molestiae.    </p>', 174, NULL, NULL, '173, 174, 175, 176', 'https://www.youtube.com/watch?v=K1QICrgxTjA', 17, 18, 19, 9.00, 50.00, 180.00, NULL, 4.0, 'publish', '[{\"name\":\"Basic\",\"key\":\"basic\",\"desc\":\"Perspiciatis saepe alias deleniti itaque fugit.\",\"delivery_time\":3,\"revision\":3},{\"name\":\"Standard\",\"key\":\"standard\",\"desc\":\"Voluptas aliquam voluptatem incidunt temporibus adipisci.\",\"delivery_time\":4,\"revision\":3},{\"name\":\"Premium\",\"key\":\"premium\",\"desc\":\"Est nesciunt adipisci qui.\",\"delivery_time\":6,\"revision\":3}]', '[{\"name\":\"Sit quaerat expedita.\",\"content\":\"No\",\"content1\":\"Yes\",\"content2\":\"Yes\"},{\"name\":\"Fuga atque aut.\",\"content\":\"No\",\"content1\":\"Yes\",\"content2\":\"Yes\"},{\"name\":\"Voluptatem id consequatur molestias.\",\"content\":\"No\",\"content1\":\"Yes\",\"content2\":\"Yes\"}]', NULL, NULL, 3, NULL, NULL, 1, NULL, '2025-04-16 03:24:11', '2025-04-16 03:24:11'),
(16, 'I will Amet autem quia sit eveniet autem nobis.', 'i-will-amet-autem-quia-sit-eveniet-autem-nobis', '<p>Rerum dolore qui porro est. Id inventore odit assumenda ut ullam saepe iste voluptas. Omnis et ullam deserunt dolores aut a aliquam.</p>\r\n                                <p>Autem sit eveniet quia et. Praesentium ut rerum consequatur optio voluptates. Enim voluptatem nemo suscipit quidem nihil.</p>\r\n                                <p>Autem non quas in repudiandae alias blanditiis aperiam. Quis non exercitationem delectus rerum molestiae ullam temporibus. Neque harum nemo asperiores hic. Voluptas harum aspernatur minima suscipit velit ipsam aut.</p>\r\n                                <p>Voluptatum quia minima quasi autem. Distinctio quo possimus velit ut porro dolorem.</p>\r\n                                <p>Illo distinctio quis qui rem provident. Dolor sit recusandae vel consectetur illum illum qui.</p>\r\n                                <p>Voluptas dignissimos facilis voluptas est molestiae sed odio. Doloremque non cumque mollitia dolor labore. Ratione et est sit et odio dolor. Aut iste ipsam placeat sunt nesciunt.</p>\r\n                                <p>Eaque autem rerum veritatis placeat qui. Ad voluptatem est sint voluptatem est quis beatae. Dolorum modi praesentium voluptate numquam. Et quo dolorem odio aliquid non cupiditate eum. Delectus quo exercitationem non.</p>\r\n                                <p>Deserunt est a sunt voluptatem velit temporibus. Veritatis qui nisi est animi. Non cupiditate tenetur error aliquam quia.</p>\r\n                                <p>Provident at vero quo beatae doloribus suscipit velit cumque. Nihil dicta molestias consequatur cum sed voluptate. Et quasi at velit perspiciatis nobis quia. Quidem laudantium non vel laboriosam rerum aut.</p>\r\n                                <p>Rerum totam rem eos quam necessitatibus sed consectetur. Itaque quia consequatur nisi suscipit autem expedita. Corporis id dignissimos consequatur molestiae.    </p>', 173, NULL, NULL, '173, 174, 175, 176', 'https://www.youtube.com/watch?v=K1QICrgxTjA', 17, 18, 19, 9.00, 15.00, 212.00, NULL, 4.3, 'publish', '[{\"name\":\"Basic\",\"key\":\"basic\",\"desc\":\"Sit minus repellat nemo exercitationem ullam.\",\"delivery_time\":2,\"revision\":3},{\"name\":\"Standard\",\"key\":\"standard\",\"desc\":\"Iste eos qui odit temporibus nihil dolore non.\",\"delivery_time\":4,\"revision\":3},{\"name\":\"Premium\",\"key\":\"premium\",\"desc\":\"Nihil aut voluptatem et eos molestiae est.\",\"delivery_time\":6,\"revision\":3}]', '[{\"name\":\"Earum consequatur alias delectus.\",\"content\":\"No\",\"content1\":\"Yes\",\"content2\":\"Yes\"},{\"name\":\"Enim odit dolores.\",\"content\":\"No\",\"content1\":\"Yes\",\"content2\":\"Yes\"},{\"name\":\"Voluptas consequatur voluptatem.\",\"content\":\"No\",\"content1\":\"Yes\",\"content2\":\"Yes\"}]', NULL, NULL, 2, NULL, NULL, 1, NULL, '2025-04-16 03:24:11', '2025-04-16 03:24:11'),
(17, 'I will Pariatur eos voluptates amet rerum.', 'i-will-pariatur-eos-voluptates-amet-rerum', '<p>Rerum dolore qui porro est. Id inventore odit assumenda ut ullam saepe iste voluptas. Omnis et ullam deserunt dolores aut a aliquam.</p>\r\n                                <p>Autem sit eveniet quia et. Praesentium ut rerum consequatur optio voluptates. Enim voluptatem nemo suscipit quidem nihil.</p>\r\n                                <p>Autem non quas in repudiandae alias blanditiis aperiam. Quis non exercitationem delectus rerum molestiae ullam temporibus. Neque harum nemo asperiores hic. Voluptas harum aspernatur minima suscipit velit ipsam aut.</p>\r\n                                <p>Voluptatum quia minima quasi autem. Distinctio quo possimus velit ut porro dolorem.</p>\r\n                                <p>Illo distinctio quis qui rem provident. Dolor sit recusandae vel consectetur illum illum qui.</p>\r\n                                <p>Voluptas dignissimos facilis voluptas est molestiae sed odio. Doloremque non cumque mollitia dolor labore. Ratione et est sit et odio dolor. Aut iste ipsam placeat sunt nesciunt.</p>\r\n                                <p>Eaque autem rerum veritatis placeat qui. Ad voluptatem est sint voluptatem est quis beatae. Dolorum modi praesentium voluptate numquam. Et quo dolorem odio aliquid non cupiditate eum. Delectus quo exercitationem non.</p>\r\n                                <p>Deserunt est a sunt voluptatem velit temporibus. Veritatis qui nisi est animi. Non cupiditate tenetur error aliquam quia.</p>\r\n                                <p>Provident at vero quo beatae doloribus suscipit velit cumque. Nihil dicta molestias consequatur cum sed voluptate. Et quasi at velit perspiciatis nobis quia. Quidem laudantium non vel laboriosam rerum aut.</p>\r\n                                <p>Rerum totam rem eos quam necessitatibus sed consectetur. Itaque quia consequatur nisi suscipit autem expedita. Corporis id dignissimos consequatur molestiae.    </p>', 173, NULL, NULL, '173, 174, 175, 176', 'https://www.youtube.com/watch?v=K1QICrgxTjA', 17, 18, 19, 8.00, 48.00, 243.00, NULL, 4.0, 'publish', '[{\"name\":\"Basic\",\"key\":\"basic\",\"desc\":\"Et voluptatibus veritatis et eius libero tempora.\",\"delivery_time\":1,\"revision\":3},{\"name\":\"Standard\",\"key\":\"standard\",\"desc\":\"Voluptatem ea voluptatibus quo consequatur harum accusamus.\",\"delivery_time\":4,\"revision\":3},{\"name\":\"Premium\",\"key\":\"premium\",\"desc\":\"Laborum sunt et iusto tenetur molestias cupiditate natus.\",\"delivery_time\":6,\"revision\":3}]', '[{\"name\":\"Aut quia vel.\",\"content\":\"No\",\"content1\":\"Yes\",\"content2\":\"Yes\"},{\"name\":\"Saepe ut harum optio.\",\"content\":\"No\",\"content1\":\"Yes\",\"content2\":\"Yes\"},{\"name\":\"Aspernatur consectetur et qui.\",\"content\":\"No\",\"content1\":\"Yes\",\"content2\":\"Yes\"}]', NULL, NULL, 1, NULL, NULL, 1, NULL, '2025-04-16 03:24:11', '2025-04-16 03:24:11'),
(18, 'I will Eligendi occaecati aut nisi et culpa ea qui.', 'i-will-eligendi-occaecati-aut-nisi-et-culpa-ea-qui', '<p>Rerum dolore qui porro est. Id inventore odit assumenda ut ullam saepe iste voluptas. Omnis et ullam deserunt dolores aut a aliquam.</p>\r\n                                <p>Autem sit eveniet quia et. Praesentium ut rerum consequatur optio voluptates. Enim voluptatem nemo suscipit quidem nihil.</p>\r\n                                <p>Autem non quas in repudiandae alias blanditiis aperiam. Quis non exercitationem delectus rerum molestiae ullam temporibus. Neque harum nemo asperiores hic. Voluptas harum aspernatur minima suscipit velit ipsam aut.</p>\r\n                                <p>Voluptatum quia minima quasi autem. Distinctio quo possimus velit ut porro dolorem.</p>\r\n                                <p>Illo distinctio quis qui rem provident. Dolor sit recusandae vel consectetur illum illum qui.</p>\r\n                                <p>Voluptas dignissimos facilis voluptas est molestiae sed odio. Doloremque non cumque mollitia dolor labore. Ratione et est sit et odio dolor. Aut iste ipsam placeat sunt nesciunt.</p>\r\n                                <p>Eaque autem rerum veritatis placeat qui. Ad voluptatem est sint voluptatem est quis beatae. Dolorum modi praesentium voluptate numquam. Et quo dolorem odio aliquid non cupiditate eum. Delectus quo exercitationem non.</p>\r\n                                <p>Deserunt est a sunt voluptatem velit temporibus. Veritatis qui nisi est animi. Non cupiditate tenetur error aliquam quia.</p>\r\n                                <p>Provident at vero quo beatae doloribus suscipit velit cumque. Nihil dicta molestias consequatur cum sed voluptate. Et quasi at velit perspiciatis nobis quia. Quidem laudantium non vel laboriosam rerum aut.</p>\r\n                                <p>Rerum totam rem eos quam necessitatibus sed consectetur. Itaque quia consequatur nisi suscipit autem expedita. Corporis id dignissimos consequatur molestiae.    </p>', 175, NULL, NULL, '173, 174, 175, 176', 'https://www.youtube.com/watch?v=K1QICrgxTjA', 1, 2, 3, 5.00, 49.00, 280.00, NULL, 4.7, 'publish', '[{\"name\":\"Basic\",\"key\":\"basic\",\"desc\":\"Assumenda quia ipsa architecto ratione.\",\"delivery_time\":1,\"revision\":3},{\"name\":\"Standard\",\"key\":\"standard\",\"desc\":\"Ut earum quis sint nobis cumque voluptatem consequuntur.\",\"delivery_time\":4,\"revision\":3},{\"name\":\"Premium\",\"key\":\"premium\",\"desc\":\"Architecto nulla qui consequuntur.\",\"delivery_time\":6,\"revision\":3}]', '[{\"name\":\"Sapiente et itaque asperiores.\",\"content\":\"No\",\"content1\":\"Yes\",\"content2\":\"Yes\"},{\"name\":\"Aut occaecati illo.\",\"content\":\"No\",\"content1\":\"Yes\",\"content2\":\"Yes\"},{\"name\":\"Est reprehenderit minima qui et.\",\"content\":\"No\",\"content1\":\"Yes\",\"content2\":\"Yes\"}]', NULL, NULL, 1, NULL, NULL, 1, NULL, '2025-04-16 03:24:11', '2025-04-16 03:24:11'),
(19, 'I will Repellat ut sed et assumenda reprehenderit.', 'i-will-repellat-ut-sed-et-assumenda-reprehenderit', '<p>Rerum dolore qui porro est. Id inventore odit assumenda ut ullam saepe iste voluptas. Omnis et ullam deserunt dolores aut a aliquam.</p>\r\n                                <p>Autem sit eveniet quia et. Praesentium ut rerum consequatur optio voluptates. Enim voluptatem nemo suscipit quidem nihil.</p>\r\n                                <p>Autem non quas in repudiandae alias blanditiis aperiam. Quis non exercitationem delectus rerum molestiae ullam temporibus. Neque harum nemo asperiores hic. Voluptas harum aspernatur minima suscipit velit ipsam aut.</p>\r\n                                <p>Voluptatum quia minima quasi autem. Distinctio quo possimus velit ut porro dolorem.</p>\r\n                                <p>Illo distinctio quis qui rem provident. Dolor sit recusandae vel consectetur illum illum qui.</p>\r\n                                <p>Voluptas dignissimos facilis voluptas est molestiae sed odio. Doloremque non cumque mollitia dolor labore. Ratione et est sit et odio dolor. Aut iste ipsam placeat sunt nesciunt.</p>\r\n                                <p>Eaque autem rerum veritatis placeat qui. Ad voluptatem est sint voluptatem est quis beatae. Dolorum modi praesentium voluptate numquam. Et quo dolorem odio aliquid non cupiditate eum. Delectus quo exercitationem non.</p>\r\n                                <p>Deserunt est a sunt voluptatem velit temporibus. Veritatis qui nisi est animi. Non cupiditate tenetur error aliquam quia.</p>\r\n                                <p>Provident at vero quo beatae doloribus suscipit velit cumque. Nihil dicta molestias consequatur cum sed voluptate. Et quasi at velit perspiciatis nobis quia. Quidem laudantium non vel laboriosam rerum aut.</p>\r\n                                <p>Rerum totam rem eos quam necessitatibus sed consectetur. Itaque quia consequatur nisi suscipit autem expedita. Corporis id dignissimos consequatur molestiae.    </p>', 175, NULL, NULL, '173, 174, 175, 176', 'https://www.youtube.com/watch?v=K1QICrgxTjA', 17, 18, 19, 10.00, 49.00, 112.00, NULL, 4.7, 'publish', '[{\"name\":\"Basic\",\"key\":\"basic\",\"desc\":\"Repudiandae beatae culpa ducimus numquam autem beatae.\",\"delivery_time\":1,\"revision\":3},{\"name\":\"Standard\",\"key\":\"standard\",\"desc\":\"Tenetur quod sint sit hic.\",\"delivery_time\":4,\"revision\":3},{\"name\":\"Premium\",\"key\":\"premium\",\"desc\":\"Quo dolorem nesciunt ut sed.\",\"delivery_time\":6,\"revision\":3}]', '[{\"name\":\"Et dolor esse.\",\"content\":\"No\",\"content1\":\"Yes\",\"content2\":\"Yes\"},{\"name\":\"Ut maxime sint.\",\"content\":\"No\",\"content1\":\"Yes\",\"content2\":\"Yes\"},{\"name\":\"Ea numquam nihil.\",\"content\":\"No\",\"content1\":\"Yes\",\"content2\":\"Yes\"}]', NULL, NULL, 1, NULL, NULL, 1, NULL, '2025-04-16 03:24:11', '2025-04-16 03:24:11'),
(20, 'I will Iure corrupti iure numquam veniam sit.', 'i-will-iure-corrupti-iure-numquam-veniam-sit', '<p>Rerum dolore qui porro est. Id inventore odit assumenda ut ullam saepe iste voluptas. Omnis et ullam deserunt dolores aut a aliquam.</p>\r\n                                <p>Autem sit eveniet quia et. Praesentium ut rerum consequatur optio voluptates. Enim voluptatem nemo suscipit quidem nihil.</p>\r\n                                <p>Autem non quas in repudiandae alias blanditiis aperiam. Quis non exercitationem delectus rerum molestiae ullam temporibus. Neque harum nemo asperiores hic. Voluptas harum aspernatur minima suscipit velit ipsam aut.</p>\r\n                                <p>Voluptatum quia minima quasi autem. Distinctio quo possimus velit ut porro dolorem.</p>\r\n                                <p>Illo distinctio quis qui rem provident. Dolor sit recusandae vel consectetur illum illum qui.</p>\r\n                                <p>Voluptas dignissimos facilis voluptas est molestiae sed odio. Doloremque non cumque mollitia dolor labore. Ratione et est sit et odio dolor. Aut iste ipsam placeat sunt nesciunt.</p>\r\n                                <p>Eaque autem rerum veritatis placeat qui. Ad voluptatem est sint voluptatem est quis beatae. Dolorum modi praesentium voluptate numquam. Et quo dolorem odio aliquid non cupiditate eum. Delectus quo exercitationem non.</p>\r\n                                <p>Deserunt est a sunt voluptatem velit temporibus. Veritatis qui nisi est animi. Non cupiditate tenetur error aliquam quia.</p>\r\n                                <p>Provident at vero quo beatae doloribus suscipit velit cumque. Nihil dicta molestias consequatur cum sed voluptate. Et quasi at velit perspiciatis nobis quia. Quidem laudantium non vel laboriosam rerum aut.</p>\r\n                                <p>Rerum totam rem eos quam necessitatibus sed consectetur. Itaque quia consequatur nisi suscipit autem expedita. Corporis id dignissimos consequatur molestiae.    </p>', 175, NULL, NULL, '173, 174, 175, 176', 'https://www.youtube.com/watch?v=K1QICrgxTjA', 1, 2, 3, 9.00, 24.00, 271.00, NULL, 4.0, 'publish', '[{\"name\":\"Basic\",\"key\":\"basic\",\"desc\":\"Animi repellat molestias laboriosam et sed iste eum.\",\"delivery_time\":1,\"revision\":3},{\"name\":\"Standard\",\"key\":\"standard\",\"desc\":\"Qui repellendus suscipit in omnis aut exercitationem.\",\"delivery_time\":4,\"revision\":3},{\"name\":\"Premium\",\"key\":\"premium\",\"desc\":\"Sunt distinctio non iusto eum.\",\"delivery_time\":6,\"revision\":3}]', '[{\"name\":\"Sint inventore.\",\"content\":\"No\",\"content1\":\"Yes\",\"content2\":\"Yes\"},{\"name\":\"Alias fugiat vel.\",\"content\":\"No\",\"content1\":\"Yes\",\"content2\":\"Yes\"},{\"name\":\"Quae eaque magnam quasi.\",\"content\":\"No\",\"content1\":\"Yes\",\"content2\":\"Yes\"}]', NULL, NULL, 1, NULL, NULL, 1, NULL, '2025-04-16 03:24:11', '2025-04-16 03:24:11');

INSERT INTO `bc_job_candidates` (`id`, `job_id`, `candidate_id`, `cv_id`, `message`, `status`, `company_id`, `create_user`, `update_user`, `created_at`, `updated_at`) VALUES
(1, 12, 16, 8, 'qweqweqweq', 'approved', 1, 16, 15, '2025-06-24 19:23:26', '2025-06-24 19:24:35'),
(2, 9, 16, 8, 'qweqweqw', 'pending', 3, 16, NULL, '2025-06-24 19:52:02', '2025-06-24 19:52:02');

INSERT INTO `bc_job_categories` (`id`, `name`, `content`, `slug`, `status`, `origin_id`, `icon`, `lang`, `_lft`, `_rgt`, `parent_id`, `create_user`, `update_user`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Accounting / Finance', 'Nam dapibus nisl vitae elit fringilla rutrum. Aenean sollicitudin, erat a elementum rutrum.', 'accounting-finance', 'publish', NULL, 'icon flaticon-money-1', NULL, 1, 2, NULL, NULL, NULL, NULL, '2025-04-16 03:24:08', '2025-04-16 03:24:08'),
(2, 'Marketing', 'Nam dapibus nisl vitae elit fringilla rutrum. Aenean sollicitudin, erat a elementum rutrum.', 'marketing', 'publish', NULL, 'icon flaticon-promotion', NULL, 3, 4, NULL, NULL, NULL, NULL, '2025-04-16 03:24:08', '2025-04-16 03:24:08'),
(3, 'Design', 'Nam dapibus nisl vitae elit fringilla rutrum. Aenean sollicitudin, erat a elementum rutrum.', 'design', 'publish', NULL, 'icon flaticon-vector', NULL, 5, 6, NULL, NULL, NULL, NULL, '2025-04-16 03:24:08', '2025-04-16 03:24:08'),
(4, 'Development', 'Nam dapibus nisl vitae elit fringilla rutrum. Aenean sollicitudin, erat a elementum rutrum.', 'development', 'publish', NULL, 'icon flaticon-web-programming', NULL, 7, 8, NULL, NULL, NULL, NULL, '2025-04-16 03:24:08', '2025-04-16 03:24:08'),
(5, 'Human Resource', 'Nam dapibus nisl vitae elit fringilla rutrum. Aenean sollicitudin, erat a elementum rutrum.', 'human-resource', 'publish', NULL, 'icon flaticon-headhunting', NULL, 9, 10, NULL, NULL, NULL, NULL, '2025-04-16 03:24:08', '2025-04-16 03:24:08'),
(6, 'Project Management', 'Nam dapibus nisl vitae elit fringilla rutrum. Aenean sollicitudin, erat a elementum rutrum.', 'project-management', 'publish', NULL, 'icon flaticon-rocket-ship', NULL, 11, 12, NULL, NULL, NULL, NULL, '2025-04-16 03:24:08', '2025-04-16 03:24:08'),
(7, 'Customer Service', 'Nam dapibus nisl vitae elit fringilla rutrum. Aenean sollicitudin, erat a elementum rutrum.', 'customer-service', 'publish', NULL, 'icon flaticon-support-1', NULL, 13, 14, NULL, NULL, NULL, NULL, '2025-04-16 03:24:08', '2025-04-16 03:24:08'),
(8, 'Health and Care', 'Nam dapibus nisl vitae elit fringilla rutrum. Aenean sollicitudin, erat a elementum rutrum.', 'health-and-care', 'publish', NULL, 'icon flaticon-first-aid-kit-1', NULL, 15, 16, NULL, NULL, NULL, NULL, '2025-04-16 03:24:08', '2025-04-16 03:24:08'),
(9, 'Automotive Jobs', 'Nam dapibus nisl vitae elit fringilla rutrum. Aenean sollicitudin, erat a elementum rutrum.', 'automotive-jobs', 'publish', NULL, 'icon flaticon-car', NULL, 17, 18, NULL, NULL, NULL, NULL, '2025-04-16 03:24:08', '2025-04-16 03:24:08'),
(10, 'Accounting / Finance', NULL, 'accounting-finance-1', 'publish', NULL, 'icon flaticon-money-1', NULL, 19, 20, NULL, NULL, NULL, NULL, '2025-04-16 03:55:18', '2025-04-16 03:55:18'),
(11, 'Marketing', NULL, 'marketing-1', 'publish', NULL, 'icon flaticon-promotion', NULL, 21, 22, NULL, NULL, NULL, NULL, '2025-04-16 03:55:18', '2025-04-16 03:55:18'),
(12, 'Design', NULL, 'design-1', 'publish', NULL, 'icon flaticon-vector', NULL, 23, 24, NULL, NULL, NULL, NULL, '2025-04-16 03:55:18', '2025-04-16 03:55:18'),
(13, 'Development', NULL, 'development-1', 'publish', NULL, 'icon flaticon-web-programming', NULL, 25, 26, NULL, NULL, NULL, NULL, '2025-04-16 03:55:18', '2025-04-16 03:55:18'),
(14, 'Human Resource', NULL, 'human-resource-1', 'publish', NULL, 'icon flaticon-headhunting', NULL, 27, 28, NULL, NULL, NULL, NULL, '2025-04-16 03:55:18', '2025-04-16 03:55:18'),
(15, 'Project Management', NULL, 'project-management-1', 'publish', NULL, 'icon flaticon-rocket-ship', NULL, 29, 30, NULL, NULL, NULL, NULL, '2025-04-16 03:55:18', '2025-04-16 03:55:18'),
(16, 'Customer Service', NULL, 'customer-service-1', 'publish', NULL, 'icon flaticon-support-1', NULL, 31, 32, NULL, NULL, NULL, NULL, '2025-04-16 03:55:18', '2025-04-16 03:55:18'),
(17, 'Health and Care', NULL, 'health-and-care-1', 'publish', NULL, 'icon flaticon-first-aid-kit-1', NULL, 33, 34, NULL, NULL, NULL, NULL, '2025-04-16 03:55:18', '2025-04-16 03:55:18'),
(18, 'Automotive Jobs', NULL, 'automotive-jobs-1', 'publish', NULL, 'icon flaticon-car', NULL, 35, 36, NULL, NULL, NULL, NULL, '2025-04-16 03:55:18', '2025-04-16 03:55:18');

INSERT INTO `bc_job_skills` (`id`, `job_id`, `skill_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2025-04-16 03:24:08', NULL),
(2, 1, 2, '2025-04-16 03:24:08', NULL),
(3, 1, 3, '2025-04-16 03:24:08', NULL),
(4, 1, 6, '2025-04-16 03:24:08', NULL),
(5, 1, 7, '2025-04-16 03:24:08', NULL),
(6, 1, 8, '2025-04-16 03:24:08', NULL),
(7, 2, 1, '2025-04-16 03:24:08', NULL),
(8, 2, 2, '2025-04-16 03:24:08', NULL),
(9, 2, 3, '2025-04-16 03:24:08', NULL),
(10, 2, 4, '2025-04-16 03:24:08', NULL),
(11, 2, 5, '2025-04-16 03:24:08', NULL),
(12, 2, 6, '2025-04-16 03:24:08', NULL),
(13, 2, 8, '2025-04-16 03:24:08', NULL),
(14, 3, 1, '2025-04-16 03:24:08', NULL),
(15, 3, 2, '2025-04-16 03:24:08', NULL),
(16, 3, 3, '2025-04-16 03:24:08', NULL),
(17, 3, 4, '2025-04-16 03:24:08', NULL),
(18, 3, 7, '2025-04-16 03:24:08', NULL),
(19, 3, 8, '2025-04-16 03:24:08', NULL),
(20, 4, 1, '2025-04-16 03:24:08', NULL),
(21, 4, 2, '2025-04-16 03:24:08', NULL),
(22, 4, 3, '2025-04-16 03:24:08', NULL),
(23, 4, 4, '2025-04-16 03:24:08', NULL),
(24, 4, 6, '2025-04-16 03:24:08', NULL),
(25, 4, 8, '2025-04-16 03:24:08', NULL),
(26, 5, 1, '2025-04-16 03:24:08', NULL),
(27, 5, 2, '2025-04-16 03:24:08', NULL),
(28, 5, 4, '2025-04-16 03:24:08', NULL),
(29, 5, 5, '2025-04-16 03:24:08', NULL),
(30, 5, 6, '2025-04-16 03:24:08', NULL),
(31, 5, 7, '2025-04-16 03:24:08', NULL),
(32, 5, 8, '2025-04-16 03:24:08', NULL),
(33, 6, 3, '2025-04-16 03:24:08', NULL),
(34, 6, 4, '2025-04-16 03:24:08', NULL),
(35, 6, 5, '2025-04-16 03:24:08', NULL),
(36, 6, 7, '2025-04-16 03:24:08', NULL),
(37, 7, 1, '2025-04-16 03:24:08', NULL),
(38, 7, 2, '2025-04-16 03:24:08', NULL),
(39, 7, 6, '2025-04-16 03:24:08', NULL),
(40, 7, 7, '2025-04-16 03:24:08', NULL),
(41, 7, 8, '2025-04-16 03:24:08', NULL),
(42, 8, 1, '2025-04-16 03:24:08', NULL),
(43, 8, 2, '2025-04-16 03:24:08', NULL),
(44, 8, 3, '2025-04-16 03:24:08', NULL),
(45, 8, 5, '2025-04-16 03:24:08', NULL),
(46, 8, 6, '2025-04-16 03:24:08', NULL),
(47, 8, 7, '2025-04-16 03:24:08', NULL),
(48, 9, 1, '2025-04-16 03:24:08', NULL),
(49, 9, 2, '2025-04-16 03:24:08', NULL),
(50, 9, 4, '2025-04-16 03:24:08', NULL),
(51, 9, 5, '2025-04-16 03:24:08', NULL),
(52, 9, 6, '2025-04-16 03:24:08', NULL),
(53, 9, 7, '2025-04-16 03:24:08', NULL),
(54, 9, 8, '2025-04-16 03:24:08', NULL),
(55, 10, 1, '2025-04-16 03:24:08', NULL),
(56, 10, 2, '2025-04-16 03:24:08', NULL),
(57, 10, 4, '2025-04-16 03:24:08', NULL),
(58, 10, 5, '2025-04-16 03:24:08', NULL),
(59, 10, 6, '2025-04-16 03:24:08', NULL),
(60, 10, 8, '2025-04-16 03:24:08', NULL),
(61, 11, 3, '2025-04-16 03:24:08', NULL),
(62, 11, 4, '2025-04-16 03:24:08', NULL),
(63, 11, 6, '2025-04-16 03:24:08', NULL),
(64, 11, 7, '2025-04-16 03:24:08', NULL),
(65, 11, 8, '2025-04-16 03:24:08', NULL),
(66, 12, 2, '2025-04-16 03:24:08', NULL),
(67, 12, 4, '2025-04-16 03:24:08', NULL),
(68, 12, 8, '2025-04-16 03:24:08', NULL);

INSERT INTO `bc_job_types` (`id`, `name`, `slug`, `status`, `create_user`, `update_user`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Freelance', NULL, 'publish', NULL, NULL, NULL, '2025-04-16 03:24:08', NULL),
(2, 'Full Time', NULL, 'publish', NULL, NULL, NULL, '2025-04-16 03:24:08', NULL),
(3, 'Internship', NULL, 'publish', NULL, NULL, NULL, '2025-04-16 03:24:08', NULL),
(4, 'Part Time', NULL, 'publish', NULL, NULL, NULL, '2025-04-16 03:24:08', NULL),
(5, 'Temporary', NULL, 'publish', NULL, NULL, NULL, '2025-04-16 03:24:08', NULL);

INSERT INTO `bc_jobs` (`id`, `title`, `slug`, `content`, `category_id`, `thumbnail_id`, `location_id`, `company_id`, `job_type_id`, `expiration_date`, `hours`, `hours_type`, `salary_type`, `salary_min`, `salary_max`, `gender`, `map_lat`, `map_lng`, `map_zoom`, `experience`, `is_featured`, `is_urgent`, `status`, `deleted_at`, `create_user`, `update_user`, `created_at`, `updated_at`, `apply_type`, `apply_link`, `apply_email`, `gallery`, `video`, `video_cover_id`, `number_recruitments`, `is_approved`, `qualification`, `wage_agreement`) VALUES
(1, 'Product Manager, Studio', 'product-manager-studio', '<h4>Job Description</h4>\r\n                            <p>As a Product Designer, you will work within a Product Delivery Team fused with UX, engineering, product and data talent. You will help the team design beautiful interfaces that solve business challenges for our clients. We work with a number of Tier 1 banks on building web-based applications for AML, KYC and Sanctions List management workflows. This role is ideal if you are looking to segue your career into the FinTech or Big Data arenas.</p>\r\n                            <h4>Key Responsibilities</h4>\r\n                            <ul class=\"list-style-three\">\r\n                                <li>Be involved in every step of the product design cycle from discovery to developer handoff and user acceptance testing.</li>\r\n                                <li>Work with BAs, product managers and tech teams to lead the Product Design</li>\r\n                                <li>Maintain quality of the design process and ensure that when designs are translated into code they accurately reflect the design specifications.</li>\r\n                                <li>Accurately estimate design tickets during planning sessions.</li>\r\n                                <li>Contribute to sketching sessions involving non-designersCreate, iterate and maintain UI deliverables including sketch files, style guides, high fidelity prototypes, micro interaction specifications and pattern libraries.</li>\r\n                                <li>Ensure design choices are data led by identifying assumptions to test each sprint, and work with the analysts in your team to plan moderated usability test sessions.</li>\r\n                                <li>Design pixel perfect responsive UI’s and understand that adopting common interface patterns is better for UX than reinventing the wheel</li>\r\n                                <li>Present your work to the wider business at Show &amp; Tell sessions.</li>\r\n                            </ul>\r\n                            <h4>Skill &amp; Experience</h4>\r\n                            <ul class=\"list-style-three\">\r\n                                <li>You have at least 3 years’ experience working as a Product Designer.</li>\r\n                                <li>You have experience using Sketch and InVision or Framer X</li>\r\n                                <li>You have some previous experience working in an agile environment – Think two-week sprints.</li>\r\n                                <li>You are familiar using Jira and Confluence in your workflow</li>\r\n                            </ul>', 8, 0, 2, 1, 4, '2026-08-29 03:24:08', '30h', 'week', 'monthly', 4500.00, 6000.00, 'Both', '34.801041', '-118.212774', 16, 2.00, 1, 0, 'publish', NULL, 1, NULL, '2025-04-16 03:24:08', NULL, NULL, NULL, NULL, '68,69,70,71', 'https://www.youtube.com/watch?v=bhOiLfkChPo', 23, NULL, 'approved', NULL, NULL),
(2, 'Recruiting Coordinator', 'recruiting-coordinator', '<h4>Job Description</h4>\r\n                            <p>As a Product Designer, you will work within a Product Delivery Team fused with UX, engineering, product and data talent. You will help the team design beautiful interfaces that solve business challenges for our clients. We work with a number of Tier 1 banks on building web-based applications for AML, KYC and Sanctions List management workflows. This role is ideal if you are looking to segue your career into the FinTech or Big Data arenas.</p>\r\n                            <h4>Key Responsibilities</h4>\r\n                            <ul class=\"list-style-three\">\r\n                                <li>Be involved in every step of the product design cycle from discovery to developer handoff and user acceptance testing.</li>\r\n                                <li>Work with BAs, product managers and tech teams to lead the Product Design</li>\r\n                                <li>Maintain quality of the design process and ensure that when designs are translated into code they accurately reflect the design specifications.</li>\r\n                                <li>Accurately estimate design tickets during planning sessions.</li>\r\n                                <li>Contribute to sketching sessions involving non-designersCreate, iterate and maintain UI deliverables including sketch files, style guides, high fidelity prototypes, micro interaction specifications and pattern libraries.</li>\r\n                                <li>Ensure design choices are data led by identifying assumptions to test each sprint, and work with the analysts in your team to plan moderated usability test sessions.</li>\r\n                                <li>Design pixel perfect responsive UI’s and understand that adopting common interface patterns is better for UX than reinventing the wheel</li>\r\n                                <li>Present your work to the wider business at Show &amp; Tell sessions.</li>\r\n                            </ul>\r\n                            <h4>Skill &amp; Experience</h4>\r\n                            <ul class=\"list-style-three\">\r\n                                <li>You have at least 3 years’ experience working as a Product Designer.</li>\r\n                                <li>You have experience using Sketch and InVision or Framer X</li>\r\n                                <li>You have some previous experience working in an agile environment – Think two-week sprints.</li>\r\n                                <li>You are familiar using Jira and Confluence in your workflow</li>\r\n                            </ul>', 5, 0, 2, 1, 2, '2026-08-29 03:24:08', '30h', 'week', 'monthly', 4500.00, 6000.00, 'Both', '34.214848', '-116.617009', 16, 2.00, 0, 1, 'publish', NULL, 1, NULL, '2025-04-16 03:24:08', NULL, NULL, NULL, NULL, '68,69,70,71', 'https://www.youtube.com/watch?v=bhOiLfkChPo', 23, NULL, 'approved', NULL, NULL),
(3, 'Senior Product Designer', 'senior-product-designer', '<h4>Job Description</h4>\r\n                            <p>As a Product Designer, you will work within a Product Delivery Team fused with UX, engineering, product and data talent. You will help the team design beautiful interfaces that solve business challenges for our clients. We work with a number of Tier 1 banks on building web-based applications for AML, KYC and Sanctions List management workflows. This role is ideal if you are looking to segue your career into the FinTech or Big Data arenas.</p>\r\n                            <h4>Key Responsibilities</h4>\r\n                            <ul class=\"list-style-three\">\r\n                                <li>Be involved in every step of the product design cycle from discovery to developer handoff and user acceptance testing.</li>\r\n                                <li>Work with BAs, product managers and tech teams to lead the Product Design</li>\r\n                                <li>Maintain quality of the design process and ensure that when designs are translated into code they accurately reflect the design specifications.</li>\r\n                                <li>Accurately estimate design tickets during planning sessions.</li>\r\n                                <li>Contribute to sketching sessions involving non-designersCreate, iterate and maintain UI deliverables including sketch files, style guides, high fidelity prototypes, micro interaction specifications and pattern libraries.</li>\r\n                                <li>Ensure design choices are data led by identifying assumptions to test each sprint, and work with the analysts in your team to plan moderated usability test sessions.</li>\r\n                                <li>Design pixel perfect responsive UI’s and understand that adopting common interface patterns is better for UX than reinventing the wheel</li>\r\n                                <li>Present your work to the wider business at Show &amp; Tell sessions.</li>\r\n                            </ul>\r\n                            <h4>Skill &amp; Experience</h4>\r\n                            <ul class=\"list-style-three\">\r\n                                <li>You have at least 3 years’ experience working as a Product Designer.</li>\r\n                                <li>You have experience using Sketch and InVision or Framer X</li>\r\n                                <li>You have some previous experience working in an agile environment – Think two-week sprints.</li>\r\n                                <li>You are familiar using Jira and Confluence in your workflow</li>\r\n                            </ul>', 3, 0, 4, 2, 1, '2026-08-29 03:24:08', '30h', 'week', 'monthly', 4500.00, 6000.00, 'Both', '34.02889471970446', '-118.27121649671741', 16, 2.00, 1, 1, 'publish', NULL, 1, NULL, '2025-04-16 03:24:08', NULL, NULL, NULL, NULL, '68,69,70,71', 'https://www.youtube.com/watch?v=bhOiLfkChPo', 23, NULL, 'approved', NULL, NULL),
(4, 'Senior Full Stack Engineer, Creator Success', 'senior-full-stack-engineer-creator-success', '<h4>Job Description</h4>\r\n                            <p>As a Product Designer, you will work within a Product Delivery Team fused with UX, engineering, product and data talent. You will help the team design beautiful interfaces that solve business challenges for our clients. We work with a number of Tier 1 banks on building web-based applications for AML, KYC and Sanctions List management workflows. This role is ideal if you are looking to segue your career into the FinTech or Big Data arenas.</p>\r\n                            <h4>Key Responsibilities</h4>\r\n                            <ul class=\"list-style-three\">\r\n                                <li>Be involved in every step of the product design cycle from discovery to developer handoff and user acceptance testing.</li>\r\n                                <li>Work with BAs, product managers and tech teams to lead the Product Design</li>\r\n                                <li>Maintain quality of the design process and ensure that when designs are translated into code they accurately reflect the design specifications.</li>\r\n                                <li>Accurately estimate design tickets during planning sessions.</li>\r\n                                <li>Contribute to sketching sessions involving non-designersCreate, iterate and maintain UI deliverables including sketch files, style guides, high fidelity prototypes, micro interaction specifications and pattern libraries.</li>\r\n                                <li>Ensure design choices are data led by identifying assumptions to test each sprint, and work with the analysts in your team to plan moderated usability test sessions.</li>\r\n                                <li>Design pixel perfect responsive UI’s and understand that adopting common interface patterns is better for UX than reinventing the wheel</li>\r\n                                <li>Present your work to the wider business at Show &amp; Tell sessions.</li>\r\n                            </ul>\r\n                            <h4>Skill &amp; Experience</h4>\r\n                            <ul class=\"list-style-three\">\r\n                                <li>You have at least 3 years’ experience working as a Product Designer.</li>\r\n                                <li>You have experience using Sketch and InVision or Framer X</li>\r\n                                <li>You have some previous experience working in an agile environment – Think two-week sprints.</li>\r\n                                <li>You are familiar using Jira and Confluence in your workflow</li>\r\n                            </ul>', 4, 0, 3, 3, 5, '2026-08-29 03:24:08', '30h', 'week', 'monthly', 4500.00, 6000.00, 'Both', '33.994170', '-118.473674', 16, 2.00, 1, 0, 'publish', NULL, 1, NULL, '2025-04-16 03:24:08', NULL, NULL, NULL, NULL, '68,69,70,71', 'https://www.youtube.com/watch?v=bhOiLfkChPo', 23, NULL, 'approved', NULL, NULL),
(5, 'General Ledger Accountant', 'general-ledger-accountant', '<h4>Job Description</h4>\r\n                            <p>As a Product Designer, you will work within a Product Delivery Team fused with UX, engineering, product and data talent. You will help the team design beautiful interfaces that solve business challenges for our clients. We work with a number of Tier 1 banks on building web-based applications for AML, KYC and Sanctions List management workflows. This role is ideal if you are looking to segue your career into the FinTech or Big Data arenas.</p>\r\n                            <h4>Key Responsibilities</h4>\r\n                            <ul class=\"list-style-three\">\r\n                                <li>Be involved in every step of the product design cycle from discovery to developer handoff and user acceptance testing.</li>\r\n                                <li>Work with BAs, product managers and tech teams to lead the Product Design</li>\r\n                                <li>Maintain quality of the design process and ensure that when designs are translated into code they accurately reflect the design specifications.</li>\r\n                                <li>Accurately estimate design tickets during planning sessions.</li>\r\n                                <li>Contribute to sketching sessions involving non-designersCreate, iterate and maintain UI deliverables including sketch files, style guides, high fidelity prototypes, micro interaction specifications and pattern libraries.</li>\r\n                                <li>Ensure design choices are data led by identifying assumptions to test each sprint, and work with the analysts in your team to plan moderated usability test sessions.</li>\r\n                                <li>Design pixel perfect responsive UI’s and understand that adopting common interface patterns is better for UX than reinventing the wheel</li>\r\n                                <li>Present your work to the wider business at Show &amp; Tell sessions.</li>\r\n                            </ul>\r\n                            <h4>Skill &amp; Experience</h4>\r\n                            <ul class=\"list-style-three\">\r\n                                <li>You have at least 3 years’ experience working as a Product Designer.</li>\r\n                                <li>You have experience using Sketch and InVision or Framer X</li>\r\n                                <li>You have some previous experience working in an agile environment – Think two-week sprints.</li>\r\n                                <li>You are familiar using Jira and Confluence in your workflow</li>\r\n                            </ul>', 1, 0, 5, 4, 5, '2026-08-29 03:24:08', '30h', 'week', 'monthly', 4500.00, 6000.00, 'Both', '33.726181', '-118.303386', 16, 2.00, 0, 0, 'publish', NULL, 1, NULL, '2025-04-16 03:24:08', NULL, NULL, NULL, NULL, '68,69,70,71', 'https://www.youtube.com/watch?v=bhOiLfkChPo', 23, NULL, 'approved', NULL, NULL),
(6, 'Assistant / Store Keeper', 'assistant-store-keeper', '<h4>Job Description</h4>\r\n                            <p>As a Product Designer, you will work within a Product Delivery Team fused with UX, engineering, product and data talent. You will help the team design beautiful interfaces that solve business challenges for our clients. We work with a number of Tier 1 banks on building web-based applications for AML, KYC and Sanctions List management workflows. This role is ideal if you are looking to segue your career into the FinTech or Big Data arenas.</p>\r\n                            <h4>Key Responsibilities</h4>\r\n                            <ul class=\"list-style-three\">\r\n                                <li>Be involved in every step of the product design cycle from discovery to developer handoff and user acceptance testing.</li>\r\n                                <li>Work with BAs, product managers and tech teams to lead the Product Design</li>\r\n                                <li>Maintain quality of the design process and ensure that when designs are translated into code they accurately reflect the design specifications.</li>\r\n                                <li>Accurately estimate design tickets during planning sessions.</li>\r\n                                <li>Contribute to sketching sessions involving non-designersCreate, iterate and maintain UI deliverables including sketch files, style guides, high fidelity prototypes, micro interaction specifications and pattern libraries.</li>\r\n                                <li>Ensure design choices are data led by identifying assumptions to test each sprint, and work with the analysts in your team to plan moderated usability test sessions.</li>\r\n                                <li>Design pixel perfect responsive UI’s and understand that adopting common interface patterns is better for UX than reinventing the wheel</li>\r\n                                <li>Present your work to the wider business at Show &amp; Tell sessions.</li>\r\n                            </ul>\r\n                            <h4>Skill &amp; Experience</h4>\r\n                            <ul class=\"list-style-three\">\r\n                                <li>You have at least 3 years’ experience working as a Product Designer.</li>\r\n                                <li>You have experience using Sketch and InVision or Framer X</li>\r\n                                <li>You have some previous experience working in an agile environment – Think two-week sprints.</li>\r\n                                <li>You are familiar using Jira and Confluence in your workflow</li>\r\n                            </ul>', 9, 0, 2, 1, 1, '2026-08-29 03:24:08', '30h', 'week', 'monthly', 4500.00, 6000.00, 'Both', '33.710268', '-117.823488', 16, 2.00, 1, 0, 'publish', NULL, 1, NULL, '2025-04-16 03:24:08', NULL, NULL, NULL, NULL, '68,69,70,71', 'https://www.youtube.com/watch?v=bhOiLfkChPo', 23, NULL, 'approved', NULL, NULL),
(7, 'Product Sales Specialist', 'product-sales-specialist', '<h4>Job Description</h4>\r\n                            <p>As a Product Designer, you will work within a Product Delivery Team fused with UX, engineering, product and data talent. You will help the team design beautiful interfaces that solve business challenges for our clients. We work with a number of Tier 1 banks on building web-based applications for AML, KYC and Sanctions List management workflows. This role is ideal if you are looking to segue your career into the FinTech or Big Data arenas.</p>\r\n                            <h4>Key Responsibilities</h4>\r\n                            <ul class=\"list-style-three\">\r\n                                <li>Be involved in every step of the product design cycle from discovery to developer handoff and user acceptance testing.</li>\r\n                                <li>Work with BAs, product managers and tech teams to lead the Product Design</li>\r\n                                <li>Maintain quality of the design process and ensure that when designs are translated into code they accurately reflect the design specifications.</li>\r\n                                <li>Accurately estimate design tickets during planning sessions.</li>\r\n                                <li>Contribute to sketching sessions involving non-designersCreate, iterate and maintain UI deliverables including sketch files, style guides, high fidelity prototypes, micro interaction specifications and pattern libraries.</li>\r\n                                <li>Ensure design choices are data led by identifying assumptions to test each sprint, and work with the analysts in your team to plan moderated usability test sessions.</li>\r\n                                <li>Design pixel perfect responsive UI’s and understand that adopting common interface patterns is better for UX than reinventing the wheel</li>\r\n                                <li>Present your work to the wider business at Show &amp; Tell sessions.</li>\r\n                            </ul>\r\n                            <h4>Skill &amp; Experience</h4>\r\n                            <ul class=\"list-style-three\">\r\n                                <li>You have at least 3 years’ experience working as a Product Designer.</li>\r\n                                <li>You have experience using Sketch and InVision or Framer X</li>\r\n                                <li>You have some previous experience working in an agile environment – Think two-week sprints.</li>\r\n                                <li>You are familiar using Jira and Confluence in your workflow</li>\r\n                            </ul>', 2, 0, 2, 5, 2, '2026-08-29 03:24:08', '30h', 'week', 'monthly', 4500.00, 6000.00, 'Both', '33.588124', '-117.143191', 16, 2.00, 0, 0, 'publish', NULL, 1, NULL, '2025-04-16 03:24:08', NULL, NULL, NULL, NULL, '68,69,70,71', 'https://www.youtube.com/watch?v=bhOiLfkChPo', 23, NULL, 'approved', NULL, NULL),
(8, 'Executive, HR Operations', 'executive-hr-operations', '<h4>Job Description</h4>\r\n                            <p>As a Product Designer, you will work within a Product Delivery Team fused with UX, engineering, product and data talent. You will help the team design beautiful interfaces that solve business challenges for our clients. We work with a number of Tier 1 banks on building web-based applications for AML, KYC and Sanctions List management workflows. This role is ideal if you are looking to segue your career into the FinTech or Big Data arenas.</p>\r\n                            <h4>Key Responsibilities</h4>\r\n                            <ul class=\"list-style-three\">\r\n                                <li>Be involved in every step of the product design cycle from discovery to developer handoff and user acceptance testing.</li>\r\n                                <li>Work with BAs, product managers and tech teams to lead the Product Design</li>\r\n                                <li>Maintain quality of the design process and ensure that when designs are translated into code they accurately reflect the design specifications.</li>\r\n                                <li>Accurately estimate design tickets during planning sessions.</li>\r\n                                <li>Contribute to sketching sessions involving non-designersCreate, iterate and maintain UI deliverables including sketch files, style guides, high fidelity prototypes, micro interaction specifications and pattern libraries.</li>\r\n                                <li>Ensure design choices are data led by identifying assumptions to test each sprint, and work with the analysts in your team to plan moderated usability test sessions.</li>\r\n                                <li>Design pixel perfect responsive UI’s and understand that adopting common interface patterns is better for UX than reinventing the wheel</li>\r\n                                <li>Present your work to the wider business at Show &amp; Tell sessions.</li>\r\n                            </ul>\r\n                            <h4>Skill &amp; Experience</h4>\r\n                            <ul class=\"list-style-three\">\r\n                                <li>You have at least 3 years’ experience working as a Product Designer.</li>\r\n                                <li>You have experience using Sketch and InVision or Framer X</li>\r\n                                <li>You have some previous experience working in an agile environment – Think two-week sprints.</li>\r\n                                <li>You are familiar using Jira and Confluence in your workflow</li>\r\n                            </ul>', 5, 0, 1, 1, 1, '2026-08-29 03:24:08', '30h', 'week', 'monthly', 4500.00, 6000.00, 'Both', '32.648219', '-115.509738', 16, 2.00, 0, 0, 'publish', NULL, 1, NULL, '2025-04-16 03:24:08', NULL, NULL, NULL, NULL, '68,69,70,71', 'https://www.youtube.com/watch?v=bhOiLfkChPo', 23, NULL, 'approved', NULL, NULL),
(9, 'Restaurant Team Member', 'restaurant-team-member', '  <img src=\"/uploads/demo/general/job-post-img.jpg\" alt=\"\" width=\"850\" height=\"350\" /><br/><br/>\r\n                            <h4>Job Description</h4>\r\n                            <p>As a Product Designer, you will work within a Product Delivery Team fused with UX, engineering, product and data talent. You will help the team design beautiful interfaces that solve business challenges for our clients. We work with a number of Tier 1 banks on building web-based applications for AML, KYC and Sanctions List management workflows. This role is ideal if you are looking to segue your career into the FinTech or Big Data arenas.</p>\r\n                            <h4>Key Responsibilities</h4>\r\n                            <ul class=\"list-style-three\">\r\n                                <li>Be involved in every step of the product design cycle from discovery to developer handoff and user acceptance testing.</li>\r\n                                <li>Work with BAs, product managers and tech teams to lead the Product Design</li>\r\n                                <li>Maintain quality of the design process and ensure that when designs are translated into code they accurately reflect the design specifications.</li>\r\n                                <li>Accurately estimate design tickets during planning sessions.</li>\r\n                                <li>Contribute to sketching sessions involving non-designersCreate, iterate and maintain UI deliverables including sketch files, style guides, high fidelity prototypes, micro interaction specifications and pattern libraries.</li>\r\n                                <li>Ensure design choices are data led by identifying assumptions to test each sprint, and work with the analysts in your team to plan moderated usability test sessions.</li>\r\n                                <li>Design pixel perfect responsive UI’s and understand that adopting common interface patterns is better for UX than reinventing the wheel</li>\r\n                                <li>Present your work to the wider business at Show &amp; Tell sessions.</li>\r\n                            </ul>\r\n                            <h4>Skill &amp; Experience</h4>\r\n                            <ul class=\"list-style-three\">\r\n                                <li>You have at least 3 years’ experience working as a Product Designer.</li>\r\n                                <li>You have experience using Sketch and InVision or Framer X</li>\r\n                                <li>You have some previous experience working in an agile environment – Think two-week sprints.</li>\r\n                                <li>You are familiar using Jira and Confluence in your workflow</li>\r\n                            </ul>', 7, 0, 4, 3, 4, '2026-08-29 03:24:08', '30h', 'week', 'monthly', 4500.00, 6000.00, 'Both', '32.816113', '-116.936796', 16, 2.00, 1, 1, 'publish', NULL, 1, NULL, '2025-04-16 03:24:08', NULL, NULL, NULL, NULL, '68,69,70,71', 'https://www.youtube.com/watch?v=bhOiLfkChPo', 23, NULL, 'approved', NULL, NULL),
(10, 'Group Marketing Manager', 'group-marketing-manager', '<h4>Job Description</h4>\r\n                            <p>As a Product Designer, you will work within a Product Delivery Team fused with UX, engineering, product and data talent. You will help the team design beautiful interfaces that solve business challenges for our clients. We work with a number of Tier 1 banks on building web-based applications for AML, KYC and Sanctions List management workflows. This role is ideal if you are looking to segue your career into the FinTech or Big Data arenas.</p>\r\n                            <h4>Key Responsibilities</h4>\r\n                            <ul class=\"list-style-three\">\r\n                                <li>Be involved in every step of the product design cycle from discovery to developer handoff and user acceptance testing.</li>\r\n                                <li>Work with BAs, product managers and tech teams to lead the Product Design</li>\r\n                                <li>Maintain quality of the design process and ensure that when designs are translated into code they accurately reflect the design specifications.</li>\r\n                                <li>Accurately estimate design tickets during planning sessions.</li>\r\n                                <li>Contribute to sketching sessions involving non-designersCreate, iterate and maintain UI deliverables including sketch files, style guides, high fidelity prototypes, micro interaction specifications and pattern libraries.</li>\r\n                                <li>Ensure design choices are data led by identifying assumptions to test each sprint, and work with the analysts in your team to plan moderated usability test sessions.</li>\r\n                                <li>Design pixel perfect responsive UI’s and understand that adopting common interface patterns is better for UX than reinventing the wheel</li>\r\n                                <li>Present your work to the wider business at Show &amp; Tell sessions.</li>\r\n                            </ul>\r\n                            <h4>Skill &amp; Experience</h4>\r\n                            <ul class=\"list-style-three\">\r\n                                <li>You have at least 3 years’ experience working as a Product Designer.</li>\r\n                                <li>You have experience using Sketch and InVision or Framer X</li>\r\n                                <li>You have some previous experience working in an agile environment – Think two-week sprints.</li>\r\n                                <li>You are familiar using Jira and Confluence in your workflow</li>\r\n                            </ul>', 2, 0, 3, 1, 1, '2026-08-29 03:24:08', '30h', 'week', 'monthly', 4500.00, 6000.00, 'Both', '32.714993', '-117.137829', 16, 2.00, 0, 0, 'publish', NULL, 1, NULL, '2025-04-16 03:24:08', NULL, 'email', NULL, 'contact@superio.com', '68,69,70,71', 'https://www.youtube.com/watch?v=bhOiLfkChPo', 23, NULL, 'approved', NULL, NULL),
(11, 'Software Engineer (Android), Libraries', 'software-engineer-android-lib', '<h4>Job Description</h4>\r\n                            <p>As a Product Designer, you will work within a Product Delivery Team fused with UX, engineering, product and data talent. You will help the team design beautiful interfaces that solve business challenges for our clients. We work with a number of Tier 1 banks on building web-based applications for AML, KYC and Sanctions List management workflows. This role is ideal if you are looking to segue your career into the FinTech or Big Data arenas.</p>\r\n                            <h4>Key Responsibilities</h4>\r\n                            <ul class=\"list-style-three\">\r\n                                <li>Be involved in every step of the product design cycle from discovery to developer handoff and user acceptance testing.</li>\r\n                                <li>Work with BAs, product managers and tech teams to lead the Product Design</li>\r\n                                <li>Maintain quality of the design process and ensure that when designs are translated into code they accurately reflect the design specifications.</li>\r\n                                <li>Accurately estimate design tickets during planning sessions.</li>\r\n                                <li>Contribute to sketching sessions involving non-designersCreate, iterate and maintain UI deliverables including sketch files, style guides, high fidelity prototypes, micro interaction specifications and pattern libraries.</li>\r\n                                <li>Ensure design choices are data led by identifying assumptions to test each sprint, and work with the analysts in your team to plan moderated usability test sessions.</li>\r\n                                <li>Design pixel perfect responsive UI’s and understand that adopting common interface patterns is better for UX than reinventing the wheel</li>\r\n                                <li>Present your work to the wider business at Show &amp; Tell sessions.</li>\r\n                            </ul>\r\n                            <h4>Skill &amp; Experience</h4>\r\n                            <ul class=\"list-style-three\">\r\n                                <li>You have at least 3 years’ experience working as a Product Designer.</li>\r\n                                <li>You have experience using Sketch and InVision or Framer X</li>\r\n                                <li>You have some previous experience working in an agile environment – Think two-week sprints.</li>\r\n                                <li>You are familiar using Jira and Confluence in your workflow</li>\r\n                            </ul>', 4, 0, 2, 4, 4, '2026-08-29 03:24:08', '30h', 'week', 'monthly', 2500.00, 3500.00, 'Both', '32.522868', '-117.043382', 16, 2.00, 1, 0, 'publish', NULL, 1, NULL, '2025-04-16 03:24:08', NULL, 'external', 'https://themeforest.net/', NULL, '68,69,70,71', 'https://www.youtube.com/watch?v=bhOiLfkChPo', 23, NULL, 'approved', NULL, NULL),
(12, 'Product Designer / UI Designer', 'product-designer-ui-designer', '<h4>Job Description</h4>\r\n                            <p>As a Product Designer, you will work within a Product Delivery Team fused with UX, engineering, product and data talent. You will help the team design beautiful interfaces that solve business challenges for our clients. We work with a number of Tier 1 banks on building web-based applications for AML, KYC and Sanctions List management workflows. This role is ideal if you are looking to segue your career into the FinTech or Big Data arenas.</p>\r\n                            <h4>Key Responsibilities</h4>\r\n                            <ul class=\"list-style-three\">\r\n                                <li>Be involved in every step of the product design cycle from discovery to developer handoff and user acceptance testing.</li>\r\n                                <li>Work with BAs, product managers and tech teams to lead the Product Design</li>\r\n                                <li>Maintain quality of the design process and ensure that when designs are translated into code they accurately reflect the design specifications.</li>\r\n                                <li>Accurately estimate design tickets during planning sessions.</li>\r\n                                <li>Contribute to sketching sessions involving non-designersCreate, iterate and maintain UI deliverables including sketch files, style guides, high fidelity prototypes, micro interaction specifications and pattern libraries.</li>\r\n                                <li>Ensure design choices are data led by identifying assumptions to test each sprint, and work with the analysts in your team to plan moderated usability test sessions.</li>\r\n                                <li>Design pixel perfect responsive UI’s and understand that adopting common interface patterns is better for UX than reinventing the wheel</li>\r\n                                <li>Present your work to the wider business at Show &amp; Tell sessions.</li>\r\n                            </ul>\r\n                            <h4>Skill &amp; Experience</h4>\r\n                            <ul class=\"list-style-three\">\r\n                                <li>You have at least 3 years’ experience working as a Product Designer.</li>\r\n                                <li>You have experience using Sketch and InVision or Framer X</li>\r\n                                <li>You have some previous experience working in an agile environment – Think two-week sprints.</li>\r\n                                <li>You are familiar using Jira and Confluence in your workflow</li>\r\n                            </ul>', 3, 0, 1, 1, 5, '2026-08-29 03:24:08', '30h', 'week', 'monthly', 800.00, 3000.00, 'Both', '34.02889471970446', '-118.27121649671741', 16, 2.00, 1, 1, 'publish', NULL, 1, NULL, '2025-04-16 03:24:08', NULL, '', NULL, NULL, '68,69,70,71', 'https://www.youtube.com/watch?v=bhOiLfkChPo', 23, NULL, 'approved', NULL, NULL);

INSERT INTO `bc_locations` (`id`, `name`, `slug`, `image_id`, `map_lat`, `map_lng`, `map_zoom`, `status`, `_lft`, `_rgt`, `parent_id`, `create_user`, `update_user`, `deleted_at`, `origin_id`, `lang`, `created_at`, `updated_at`, `zipcode`) VALUES
(1, 'New York', 'new-york', 24, '40.712776', '-74.005974', 12, 'publish', 1, 2, NULL, 1, NULL, NULL, NULL, NULL, '2025-04-16 03:24:08', '2025-04-16 03:24:08', NULL),
(2, 'Paris', 'paris', 25, '48.856613', '2.352222', 12, 'publish', 3, 4, NULL, 1, NULL, NULL, NULL, NULL, '2025-04-16 03:24:08', '2025-04-16 03:24:08', NULL),
(3, 'London', 'london', 26, '48.856613', '2.352222', 12, 'publish', 5, 6, NULL, 1, NULL, NULL, NULL, NULL, '2025-04-16 03:24:08', '2025-04-16 03:24:08', NULL),
(4, 'Miami', 'miami', 27, '36.778259', '-119.417931', 12, 'publish', 7, 8, NULL, 1, NULL, NULL, NULL, NULL, '2025-04-16 03:24:08', '2025-04-16 03:24:08', NULL),
(5, 'Los Angeles', 'los-angeles', 28, '34.052235', '-118.243683', 12, 'publish', 9, 10, NULL, 1, NULL, NULL, NULL, NULL, '2025-04-16 03:24:08', '2025-04-16 03:24:08', NULL),
(6, 'New Jersey', 'new-jersey', 29, '40.058323', '-74.405663', 12, 'publish', 11, 12, NULL, 1, NULL, NULL, NULL, NULL, '2025-04-16 03:24:08', '2025-04-16 03:24:08', NULL),
(7, 'San Francisco', 'san-francisco', 30, '37.774929', '-122.419418', 12, 'publish', 13, 14, NULL, 1, NULL, NULL, NULL, NULL, '2025-04-16 03:24:08', '2025-04-16 03:24:08', NULL),
(8, 'Virginia', 'virginia', 31, '37.431572', '-78.656891', 12, 'publish', 15, 16, NULL, 1, NULL, NULL, NULL, NULL, '2025-04-16 03:24:08', '2025-04-16 03:24:08', NULL);

INSERT INTO `bc_plans` (`id`, `title`, `content`, `price`, `duration`, `duration_type`, `annual_price`, `max_service`, `status`, `role_id`, `is_recommended`, `deleted_at`, `create_user`, `update_user`, `created_at`, `updated_at`, `annual_max_service`) VALUES
(1, 'Basic', '<ul>\r\n                                                <li><span>1 job posting</span></li>\r\n                                                <li><span>0 featured job</span></li>\r\n                                                <li><span>Job displayed for 20 days</span></li>\r\n                                                <li><span>Premium Support 24/7 </span></li>\r\n                                            </ul>', 199.00, 1, 'month', 1199.00, 5, 'publish', 2, 0, NULL, NULL, NULL, '2025-04-16 03:55:18', '2025-04-16 03:55:18', NULL),
(2, 'Standard', '<ul>\r\n                                                <li><span>1 job posting</span></li>\r\n                                                <li><span>0 featured job</span></li>\r\n                                                <li><span>Job displayed for 20 days</span></li>\r\n                                                <li><span>Premium Support 24/7 </span></li>\r\n                                            </ul>', 499.00, 1, 'month', 1499.00, 20, 'publish', 2, 1, NULL, NULL, NULL, '2025-04-16 03:55:18', '2025-04-16 03:55:18', NULL),
(3, 'Extended', '<ul>\r\n                                                <li><span>1 job posting</span></li>\r\n                                                <li><span>0 featured job</span></li>\r\n                                                <li><span>Job displayed for 20 days</span></li>\r\n                                                <li><span>Premium Support 24/7 </span></li>\r\n                                            </ul>', 799.00, 1, 'month', 1799.00, 50, 'publish', 2, 0, NULL, NULL, NULL, '2025-04-16 03:55:18', '2025-04-16 03:55:18', NULL);

INSERT INTO `bc_review` (`id`, `object_id`, `object_model`, `title`, `content`, `rate_number`, `author_ip`, `status`, `publish_date`, `create_user`, `update_user`, `deleted_at`, `lang`, `created_at`, `updated_at`, `vendor_id`) VALUES
(1, 1, 'gig', 'Veniam nihil dolor.', 'Eum eu sumo albucius perfecto, commodo torquatos consequuntur pro ut, id posse splendide ius. Cu nisl putent omittantur usu, mutat atomorum ex pro, ius nibh nonumy id. Nam at eius dissentias disputando, molestie mnesarchum complectitur per te', 4, '127.0.0.1', 'approved', '2025-04-16 03:24:10', 1, NULL, NULL, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10', 1),
(2, 1, 'gig', 'Provident doloremque.', 'Eum eu sumo albucius perfecto, commodo torquatos consequuntur pro ut, id posse splendide ius. Cu nisl putent omittantur usu, mutat atomorum ex pro, ius nibh nonumy id. Nam at eius dissentias disputando, molestie mnesarchum complectitur per te', 5, '127.0.0.1', 'approved', '2025-04-16 03:24:10', 2, NULL, NULL, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10', 1),
(3, 1, 'gig', 'Fugit ut reprehenderit.', 'Eum eu sumo albucius perfecto, commodo torquatos consequuntur pro ut, id posse splendide ius. Cu nisl putent omittantur usu, mutat atomorum ex pro, ius nibh nonumy id. Nam at eius dissentias disputando, molestie mnesarchum complectitur per te', 5, '127.0.0.1', 'approved', '2025-04-16 03:24:10', 2, NULL, NULL, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10', 1),
(4, 2, 'gig', 'Consequatur ipsam corporis.', 'Eum eu sumo albucius perfecto, commodo torquatos consequuntur pro ut, id posse splendide ius. Cu nisl putent omittantur usu, mutat atomorum ex pro, ius nibh nonumy id. Nam at eius dissentias disputando, molestie mnesarchum complectitur per te', 5, '127.0.0.1', 'approved', '2025-04-16 03:24:10', 1, NULL, NULL, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10', 1),
(5, 2, 'gig', 'Nobis assumenda.', 'Eum eu sumo albucius perfecto, commodo torquatos consequuntur pro ut, id posse splendide ius. Cu nisl putent omittantur usu, mutat atomorum ex pro, ius nibh nonumy id. Nam at eius dissentias disputando, molestie mnesarchum complectitur per te', 5, '127.0.0.1', 'approved', '2025-04-16 03:24:10', 2, NULL, NULL, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10', 1),
(6, 2, 'gig', 'Assumenda molestiae.', 'Eum eu sumo albucius perfecto, commodo torquatos consequuntur pro ut, id posse splendide ius. Cu nisl putent omittantur usu, mutat atomorum ex pro, ius nibh nonumy id. Nam at eius dissentias disputando, molestie mnesarchum complectitur per te', 4, '127.0.0.1', 'approved', '2025-04-16 03:24:10', 2, NULL, NULL, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10', 1),
(7, 3, 'gig', 'Ut quia culpa.', 'Eum eu sumo albucius perfecto, commodo torquatos consequuntur pro ut, id posse splendide ius. Cu nisl putent omittantur usu, mutat atomorum ex pro, ius nibh nonumy id. Nam at eius dissentias disputando, molestie mnesarchum complectitur per te', 4, '127.0.0.1', 'approved', '2025-04-16 03:24:10', 2, NULL, NULL, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10', 1),
(8, 3, 'gig', 'Eveniet sed voluptatibus.', 'Eum eu sumo albucius perfecto, commodo torquatos consequuntur pro ut, id posse splendide ius. Cu nisl putent omittantur usu, mutat atomorum ex pro, ius nibh nonumy id. Nam at eius dissentias disputando, molestie mnesarchum complectitur per te', 4, '127.0.0.1', 'approved', '2025-04-16 03:24:10', 2, NULL, NULL, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10', 1),
(9, 3, 'gig', 'Voluptatem itaque delectus.', 'Eum eu sumo albucius perfecto, commodo torquatos consequuntur pro ut, id posse splendide ius. Cu nisl putent omittantur usu, mutat atomorum ex pro, ius nibh nonumy id. Nam at eius dissentias disputando, molestie mnesarchum complectitur per te', 4, '127.0.0.1', 'approved', '2025-04-16 03:24:10', 2, NULL, NULL, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10', 1),
(10, 4, 'gig', 'Et repellendus voluptatem.', 'Eum eu sumo albucius perfecto, commodo torquatos consequuntur pro ut, id posse splendide ius. Cu nisl putent omittantur usu, mutat atomorum ex pro, ius nibh nonumy id. Nam at eius dissentias disputando, molestie mnesarchum complectitur per te', 5, '127.0.0.1', 'approved', '2025-04-16 03:24:10', 2, NULL, NULL, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10', 1),
(11, 4, 'gig', 'Et praesentium.', 'Eum eu sumo albucius perfecto, commodo torquatos consequuntur pro ut, id posse splendide ius. Cu nisl putent omittantur usu, mutat atomorum ex pro, ius nibh nonumy id. Nam at eius dissentias disputando, molestie mnesarchum complectitur per te', 4, '127.0.0.1', 'approved', '2025-04-16 03:24:10', 2, NULL, NULL, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10', 1),
(12, 4, 'gig', 'Odit voluptatem numquam.', 'Eum eu sumo albucius perfecto, commodo torquatos consequuntur pro ut, id posse splendide ius. Cu nisl putent omittantur usu, mutat atomorum ex pro, ius nibh nonumy id. Nam at eius dissentias disputando, molestie mnesarchum complectitur per te', 4, '127.0.0.1', 'approved', '2025-04-16 03:24:10', 1, NULL, NULL, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10', 1),
(13, 5, 'gig', 'Adipisci vero corporis.', 'Eum eu sumo albucius perfecto, commodo torquatos consequuntur pro ut, id posse splendide ius. Cu nisl putent omittantur usu, mutat atomorum ex pro, ius nibh nonumy id. Nam at eius dissentias disputando, molestie mnesarchum complectitur per te', 4, '127.0.0.1', 'approved', '2025-04-16 03:24:10', 1, NULL, NULL, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10', 1),
(14, 5, 'gig', 'Explicabo perspiciatis quasi.', 'Eum eu sumo albucius perfecto, commodo torquatos consequuntur pro ut, id posse splendide ius. Cu nisl putent omittantur usu, mutat atomorum ex pro, ius nibh nonumy id. Nam at eius dissentias disputando, molestie mnesarchum complectitur per te', 4, '127.0.0.1', 'approved', '2025-04-16 03:24:10', 2, NULL, NULL, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10', 1),
(15, 5, 'gig', 'Perferendis facilis qui.', 'Eum eu sumo albucius perfecto, commodo torquatos consequuntur pro ut, id posse splendide ius. Cu nisl putent omittantur usu, mutat atomorum ex pro, ius nibh nonumy id. Nam at eius dissentias disputando, molestie mnesarchum complectitur per te', 5, '127.0.0.1', 'approved', '2025-04-16 03:24:10', 1, NULL, NULL, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10', 1),
(16, 6, 'gig', 'Optio at.', 'Eum eu sumo albucius perfecto, commodo torquatos consequuntur pro ut, id posse splendide ius. Cu nisl putent omittantur usu, mutat atomorum ex pro, ius nibh nonumy id. Nam at eius dissentias disputando, molestie mnesarchum complectitur per te', 5, '127.0.0.1', 'approved', '2025-04-16 03:24:10', 1, NULL, NULL, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10', 1),
(17, 6, 'gig', 'Voluptate qui laudantium.', 'Eum eu sumo albucius perfecto, commodo torquatos consequuntur pro ut, id posse splendide ius. Cu nisl putent omittantur usu, mutat atomorum ex pro, ius nibh nonumy id. Nam at eius dissentias disputando, molestie mnesarchum complectitur per te', 5, '127.0.0.1', 'approved', '2025-04-16 03:24:10', 1, NULL, NULL, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10', 1),
(18, 6, 'gig', 'Dignissimos at.', 'Eum eu sumo albucius perfecto, commodo torquatos consequuntur pro ut, id posse splendide ius. Cu nisl putent omittantur usu, mutat atomorum ex pro, ius nibh nonumy id. Nam at eius dissentias disputando, molestie mnesarchum complectitur per te', 5, '127.0.0.1', 'approved', '2025-04-16 03:24:10', 2, NULL, NULL, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10', 1),
(19, 7, 'gig', 'Accusamus sapiente.', 'Eum eu sumo albucius perfecto, commodo torquatos consequuntur pro ut, id posse splendide ius. Cu nisl putent omittantur usu, mutat atomorum ex pro, ius nibh nonumy id. Nam at eius dissentias disputando, molestie mnesarchum complectitur per te', 4, '127.0.0.1', 'approved', '2025-04-16 03:24:10', 2, NULL, NULL, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10', 1),
(20, 7, 'gig', 'Doloribus earum.', 'Eum eu sumo albucius perfecto, commodo torquatos consequuntur pro ut, id posse splendide ius. Cu nisl putent omittantur usu, mutat atomorum ex pro, ius nibh nonumy id. Nam at eius dissentias disputando, molestie mnesarchum complectitur per te', 5, '127.0.0.1', 'approved', '2025-04-16 03:24:10', 2, NULL, NULL, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10', 1),
(21, 7, 'gig', 'Vel enim minima.', 'Eum eu sumo albucius perfecto, commodo torquatos consequuntur pro ut, id posse splendide ius. Cu nisl putent omittantur usu, mutat atomorum ex pro, ius nibh nonumy id. Nam at eius dissentias disputando, molestie mnesarchum complectitur per te', 5, '127.0.0.1', 'approved', '2025-04-16 03:24:10', 1, NULL, NULL, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10', 1),
(22, 8, 'gig', 'Sed omnis.', 'Eum eu sumo albucius perfecto, commodo torquatos consequuntur pro ut, id posse splendide ius. Cu nisl putent omittantur usu, mutat atomorum ex pro, ius nibh nonumy id. Nam at eius dissentias disputando, molestie mnesarchum complectitur per te', 5, '127.0.0.1', 'approved', '2025-04-16 03:24:10', 2, NULL, NULL, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10', 1),
(23, 8, 'gig', 'Itaque aliquam.', 'Eum eu sumo albucius perfecto, commodo torquatos consequuntur pro ut, id posse splendide ius. Cu nisl putent omittantur usu, mutat atomorum ex pro, ius nibh nonumy id. Nam at eius dissentias disputando, molestie mnesarchum complectitur per te', 5, '127.0.0.1', 'approved', '2025-04-16 03:24:10', 1, NULL, NULL, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10', 1),
(24, 8, 'gig', 'Sed quis rerum.', 'Eum eu sumo albucius perfecto, commodo torquatos consequuntur pro ut, id posse splendide ius. Cu nisl putent omittantur usu, mutat atomorum ex pro, ius nibh nonumy id. Nam at eius dissentias disputando, molestie mnesarchum complectitur per te', 5, '127.0.0.1', 'approved', '2025-04-16 03:24:10', 1, NULL, NULL, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10', 1),
(25, 9, 'gig', 'Dolorem quaerat.', 'Eum eu sumo albucius perfecto, commodo torquatos consequuntur pro ut, id posse splendide ius. Cu nisl putent omittantur usu, mutat atomorum ex pro, ius nibh nonumy id. Nam at eius dissentias disputando, molestie mnesarchum complectitur per te', 4, '127.0.0.1', 'approved', '2025-04-16 03:24:10', 2, NULL, NULL, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10', 1),
(26, 9, 'gig', 'Vel ut.', 'Eum eu sumo albucius perfecto, commodo torquatos consequuntur pro ut, id posse splendide ius. Cu nisl putent omittantur usu, mutat atomorum ex pro, ius nibh nonumy id. Nam at eius dissentias disputando, molestie mnesarchum complectitur per te', 4, '127.0.0.1', 'approved', '2025-04-16 03:24:10', 2, NULL, NULL, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10', 1),
(27, 9, 'gig', 'Nemo quod alias.', 'Eum eu sumo albucius perfecto, commodo torquatos consequuntur pro ut, id posse splendide ius. Cu nisl putent omittantur usu, mutat atomorum ex pro, ius nibh nonumy id. Nam at eius dissentias disputando, molestie mnesarchum complectitur per te', 5, '127.0.0.1', 'approved', '2025-04-16 03:24:10', 1, NULL, NULL, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10', 1),
(28, 10, 'gig', 'Ullam vitae.', 'Eum eu sumo albucius perfecto, commodo torquatos consequuntur pro ut, id posse splendide ius. Cu nisl putent omittantur usu, mutat atomorum ex pro, ius nibh nonumy id. Nam at eius dissentias disputando, molestie mnesarchum complectitur per te', 4, '127.0.0.1', 'approved', '2025-04-16 03:24:10', 1, NULL, NULL, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10', 1),
(29, 10, 'gig', 'Quo ipsa.', 'Eum eu sumo albucius perfecto, commodo torquatos consequuntur pro ut, id posse splendide ius. Cu nisl putent omittantur usu, mutat atomorum ex pro, ius nibh nonumy id. Nam at eius dissentias disputando, molestie mnesarchum complectitur per te', 4, '127.0.0.1', 'approved', '2025-04-16 03:24:10', 2, NULL, NULL, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10', 1),
(30, 10, 'gig', 'Omnis perspiciatis.', 'Eum eu sumo albucius perfecto, commodo torquatos consequuntur pro ut, id posse splendide ius. Cu nisl putent omittantur usu, mutat atomorum ex pro, ius nibh nonumy id. Nam at eius dissentias disputando, molestie mnesarchum complectitur per te', 5, '127.0.0.1', 'approved', '2025-04-16 03:24:10', 1, NULL, NULL, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10', 1),
(31, 11, 'gig', 'Provident a.', 'Eum eu sumo albucius perfecto, commodo torquatos consequuntur pro ut, id posse splendide ius. Cu nisl putent omittantur usu, mutat atomorum ex pro, ius nibh nonumy id. Nam at eius dissentias disputando, molestie mnesarchum complectitur per te', 5, '127.0.0.1', 'approved', '2025-04-16 03:24:10', 1, NULL, NULL, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10', 1),
(32, 11, 'gig', 'Non quo quibusdam.', 'Eum eu sumo albucius perfecto, commodo torquatos consequuntur pro ut, id posse splendide ius. Cu nisl putent omittantur usu, mutat atomorum ex pro, ius nibh nonumy id. Nam at eius dissentias disputando, molestie mnesarchum complectitur per te', 5, '127.0.0.1', 'approved', '2025-04-16 03:24:10', 2, NULL, NULL, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10', 1),
(33, 11, 'gig', 'Dolor non ut.', 'Eum eu sumo albucius perfecto, commodo torquatos consequuntur pro ut, id posse splendide ius. Cu nisl putent omittantur usu, mutat atomorum ex pro, ius nibh nonumy id. Nam at eius dissentias disputando, molestie mnesarchum complectitur per te', 5, '127.0.0.1', 'approved', '2025-04-16 03:24:10', 2, NULL, NULL, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10', 1),
(34, 12, 'gig', 'Aliquam eos qui.', 'Eum eu sumo albucius perfecto, commodo torquatos consequuntur pro ut, id posse splendide ius. Cu nisl putent omittantur usu, mutat atomorum ex pro, ius nibh nonumy id. Nam at eius dissentias disputando, molestie mnesarchum complectitur per te', 5, '127.0.0.1', 'approved', '2025-04-16 03:24:10', 1, NULL, NULL, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10', 1),
(35, 12, 'gig', 'Eos ab.', 'Eum eu sumo albucius perfecto, commodo torquatos consequuntur pro ut, id posse splendide ius. Cu nisl putent omittantur usu, mutat atomorum ex pro, ius nibh nonumy id. Nam at eius dissentias disputando, molestie mnesarchum complectitur per te', 4, '127.0.0.1', 'approved', '2025-04-16 03:24:10', 2, NULL, NULL, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10', 1),
(36, 12, 'gig', 'Officiis maxime.', 'Eum eu sumo albucius perfecto, commodo torquatos consequuntur pro ut, id posse splendide ius. Cu nisl putent omittantur usu, mutat atomorum ex pro, ius nibh nonumy id. Nam at eius dissentias disputando, molestie mnesarchum complectitur per te', 4, '127.0.0.1', 'approved', '2025-04-16 03:24:11', 2, NULL, NULL, NULL, '2025-04-16 03:24:11', '2025-04-16 03:24:11', 1),
(37, 13, 'gig', 'Ab et quisquam.', 'Eum eu sumo albucius perfecto, commodo torquatos consequuntur pro ut, id posse splendide ius. Cu nisl putent omittantur usu, mutat atomorum ex pro, ius nibh nonumy id. Nam at eius dissentias disputando, molestie mnesarchum complectitur per te', 5, '127.0.0.1', 'approved', '2025-04-16 03:24:11', 2, NULL, NULL, NULL, '2025-04-16 03:24:11', '2025-04-16 03:24:11', 1),
(38, 13, 'gig', 'In impedit qui.', 'Eum eu sumo albucius perfecto, commodo torquatos consequuntur pro ut, id posse splendide ius. Cu nisl putent omittantur usu, mutat atomorum ex pro, ius nibh nonumy id. Nam at eius dissentias disputando, molestie mnesarchum complectitur per te', 4, '127.0.0.1', 'approved', '2025-04-16 03:24:11', 2, NULL, NULL, NULL, '2025-04-16 03:24:11', '2025-04-16 03:24:11', 1),
(39, 13, 'gig', 'Veritatis voluptate.', 'Eum eu sumo albucius perfecto, commodo torquatos consequuntur pro ut, id posse splendide ius. Cu nisl putent omittantur usu, mutat atomorum ex pro, ius nibh nonumy id. Nam at eius dissentias disputando, molestie mnesarchum complectitur per te', 5, '127.0.0.1', 'approved', '2025-04-16 03:24:11', 1, NULL, NULL, NULL, '2025-04-16 03:24:11', '2025-04-16 03:24:11', 1),
(40, 14, 'gig', 'Aut et.', 'Eum eu sumo albucius perfecto, commodo torquatos consequuntur pro ut, id posse splendide ius. Cu nisl putent omittantur usu, mutat atomorum ex pro, ius nibh nonumy id. Nam at eius dissentias disputando, molestie mnesarchum complectitur per te', 4, '127.0.0.1', 'approved', '2025-04-16 03:24:11', 2, NULL, NULL, NULL, '2025-04-16 03:24:11', '2025-04-16 03:24:11', 1),
(41, 14, 'gig', 'Rerum eos quis.', 'Eum eu sumo albucius perfecto, commodo torquatos consequuntur pro ut, id posse splendide ius. Cu nisl putent omittantur usu, mutat atomorum ex pro, ius nibh nonumy id. Nam at eius dissentias disputando, molestie mnesarchum complectitur per te', 5, '127.0.0.1', 'approved', '2025-04-16 03:24:11', 1, NULL, NULL, NULL, '2025-04-16 03:24:11', '2025-04-16 03:24:11', 1),
(42, 14, 'gig', 'Quis fugiat.', 'Eum eu sumo albucius perfecto, commodo torquatos consequuntur pro ut, id posse splendide ius. Cu nisl putent omittantur usu, mutat atomorum ex pro, ius nibh nonumy id. Nam at eius dissentias disputando, molestie mnesarchum complectitur per te', 4, '127.0.0.1', 'approved', '2025-04-16 03:24:11', 2, NULL, NULL, NULL, '2025-04-16 03:24:11', '2025-04-16 03:24:11', 1),
(43, 15, 'gig', 'Accusamus qui.', 'Eum eu sumo albucius perfecto, commodo torquatos consequuntur pro ut, id posse splendide ius. Cu nisl putent omittantur usu, mutat atomorum ex pro, ius nibh nonumy id. Nam at eius dissentias disputando, molestie mnesarchum complectitur per te', 4, '127.0.0.1', 'approved', '2025-04-16 03:24:11', 1, NULL, NULL, NULL, '2025-04-16 03:24:11', '2025-04-16 03:24:11', 1),
(44, 15, 'gig', 'Dicta at.', 'Eum eu sumo albucius perfecto, commodo torquatos consequuntur pro ut, id posse splendide ius. Cu nisl putent omittantur usu, mutat atomorum ex pro, ius nibh nonumy id. Nam at eius dissentias disputando, molestie mnesarchum complectitur per te', 4, '127.0.0.1', 'approved', '2025-04-16 03:24:11', 2, NULL, NULL, NULL, '2025-04-16 03:24:11', '2025-04-16 03:24:11', 1),
(45, 15, 'gig', 'In est totam.', 'Eum eu sumo albucius perfecto, commodo torquatos consequuntur pro ut, id posse splendide ius. Cu nisl putent omittantur usu, mutat atomorum ex pro, ius nibh nonumy id. Nam at eius dissentias disputando, molestie mnesarchum complectitur per te', 4, '127.0.0.1', 'approved', '2025-04-16 03:24:11', 2, NULL, NULL, NULL, '2025-04-16 03:24:11', '2025-04-16 03:24:11', 1),
(46, 16, 'gig', 'Deleniti sequi illo.', 'Eum eu sumo albucius perfecto, commodo torquatos consequuntur pro ut, id posse splendide ius. Cu nisl putent omittantur usu, mutat atomorum ex pro, ius nibh nonumy id. Nam at eius dissentias disputando, molestie mnesarchum complectitur per te', 4, '127.0.0.1', 'approved', '2025-04-16 03:24:11', 2, NULL, NULL, NULL, '2025-04-16 03:24:11', '2025-04-16 03:24:11', 1),
(47, 16, 'gig', 'Rerum asperiores necessitatibus.', 'Eum eu sumo albucius perfecto, commodo torquatos consequuntur pro ut, id posse splendide ius. Cu nisl putent omittantur usu, mutat atomorum ex pro, ius nibh nonumy id. Nam at eius dissentias disputando, molestie mnesarchum complectitur per te', 5, '127.0.0.1', 'approved', '2025-04-16 03:24:11', 1, NULL, NULL, NULL, '2025-04-16 03:24:11', '2025-04-16 03:24:11', 1),
(48, 16, 'gig', 'Ea temporibus non.', 'Eum eu sumo albucius perfecto, commodo torquatos consequuntur pro ut, id posse splendide ius. Cu nisl putent omittantur usu, mutat atomorum ex pro, ius nibh nonumy id. Nam at eius dissentias disputando, molestie mnesarchum complectitur per te', 4, '127.0.0.1', 'approved', '2025-04-16 03:24:11', 2, NULL, NULL, NULL, '2025-04-16 03:24:11', '2025-04-16 03:24:11', 1),
(49, 17, 'gig', 'Nobis nemo ad.', 'Eum eu sumo albucius perfecto, commodo torquatos consequuntur pro ut, id posse splendide ius. Cu nisl putent omittantur usu, mutat atomorum ex pro, ius nibh nonumy id. Nam at eius dissentias disputando, molestie mnesarchum complectitur per te', 4, '127.0.0.1', 'approved', '2025-04-16 03:24:11', 1, NULL, NULL, NULL, '2025-04-16 03:24:11', '2025-04-16 03:24:11', 1),
(50, 17, 'gig', 'Aut adipisci.', 'Eum eu sumo albucius perfecto, commodo torquatos consequuntur pro ut, id posse splendide ius. Cu nisl putent omittantur usu, mutat atomorum ex pro, ius nibh nonumy id. Nam at eius dissentias disputando, molestie mnesarchum complectitur per te', 4, '127.0.0.1', 'approved', '2025-04-16 03:24:11', 2, NULL, NULL, NULL, '2025-04-16 03:24:11', '2025-04-16 03:24:11', 1),
(51, 17, 'gig', 'Voluptatibus rerum ratione.', 'Eum eu sumo albucius perfecto, commodo torquatos consequuntur pro ut, id posse splendide ius. Cu nisl putent omittantur usu, mutat atomorum ex pro, ius nibh nonumy id. Nam at eius dissentias disputando, molestie mnesarchum complectitur per te', 4, '127.0.0.1', 'approved', '2025-04-16 03:24:11', 1, NULL, NULL, NULL, '2025-04-16 03:24:11', '2025-04-16 03:24:11', 1),
(52, 18, 'gig', 'Delectus saepe et.', 'Eum eu sumo albucius perfecto, commodo torquatos consequuntur pro ut, id posse splendide ius. Cu nisl putent omittantur usu, mutat atomorum ex pro, ius nibh nonumy id. Nam at eius dissentias disputando, molestie mnesarchum complectitur per te', 5, '127.0.0.1', 'approved', '2025-04-16 03:24:11', 2, NULL, NULL, NULL, '2025-04-16 03:24:11', '2025-04-16 03:24:11', 1),
(53, 18, 'gig', 'Recusandae qui nisi.', 'Eum eu sumo albucius perfecto, commodo torquatos consequuntur pro ut, id posse splendide ius. Cu nisl putent omittantur usu, mutat atomorum ex pro, ius nibh nonumy id. Nam at eius dissentias disputando, molestie mnesarchum complectitur per te', 4, '127.0.0.1', 'approved', '2025-04-16 03:24:11', 2, NULL, NULL, NULL, '2025-04-16 03:24:11', '2025-04-16 03:24:11', 1),
(54, 18, 'gig', 'Et aliquam voluptas.', 'Eum eu sumo albucius perfecto, commodo torquatos consequuntur pro ut, id posse splendide ius. Cu nisl putent omittantur usu, mutat atomorum ex pro, ius nibh nonumy id. Nam at eius dissentias disputando, molestie mnesarchum complectitur per te', 5, '127.0.0.1', 'approved', '2025-04-16 03:24:11', 1, NULL, NULL, NULL, '2025-04-16 03:24:11', '2025-04-16 03:24:11', 1),
(55, 19, 'gig', 'Omnis nesciunt similique.', 'Eum eu sumo albucius perfecto, commodo torquatos consequuntur pro ut, id posse splendide ius. Cu nisl putent omittantur usu, mutat atomorum ex pro, ius nibh nonumy id. Nam at eius dissentias disputando, molestie mnesarchum complectitur per te', 4, '127.0.0.1', 'approved', '2025-04-16 03:24:11', 1, NULL, NULL, NULL, '2025-04-16 03:24:11', '2025-04-16 03:24:11', 1),
(56, 19, 'gig', 'Fuga iusto.', 'Eum eu sumo albucius perfecto, commodo torquatos consequuntur pro ut, id posse splendide ius. Cu nisl putent omittantur usu, mutat atomorum ex pro, ius nibh nonumy id. Nam at eius dissentias disputando, molestie mnesarchum complectitur per te', 5, '127.0.0.1', 'approved', '2025-04-16 03:24:11', 2, NULL, NULL, NULL, '2025-04-16 03:24:11', '2025-04-16 03:24:11', 1),
(57, 19, 'gig', 'Consequatur et.', 'Eum eu sumo albucius perfecto, commodo torquatos consequuntur pro ut, id posse splendide ius. Cu nisl putent omittantur usu, mutat atomorum ex pro, ius nibh nonumy id. Nam at eius dissentias disputando, molestie mnesarchum complectitur per te', 5, '127.0.0.1', 'approved', '2025-04-16 03:24:11', 2, NULL, NULL, NULL, '2025-04-16 03:24:11', '2025-04-16 03:24:11', 1),
(58, 20, 'gig', 'Maxime quos similique.', 'Eum eu sumo albucius perfecto, commodo torquatos consequuntur pro ut, id posse splendide ius. Cu nisl putent omittantur usu, mutat atomorum ex pro, ius nibh nonumy id. Nam at eius dissentias disputando, molestie mnesarchum complectitur per te', 4, '127.0.0.1', 'approved', '2025-04-16 03:24:11', 2, NULL, NULL, NULL, '2025-04-16 03:24:11', '2025-04-16 03:24:11', 1),
(59, 20, 'gig', 'Eos quod.', 'Eum eu sumo albucius perfecto, commodo torquatos consequuntur pro ut, id posse splendide ius. Cu nisl putent omittantur usu, mutat atomorum ex pro, ius nibh nonumy id. Nam at eius dissentias disputando, molestie mnesarchum complectitur per te', 4, '127.0.0.1', 'approved', '2025-04-16 03:24:11', 2, NULL, NULL, NULL, '2025-04-16 03:24:11', '2025-04-16 03:24:11', 1),
(60, 20, 'gig', 'Ad voluptas.', 'Eum eu sumo albucius perfecto, commodo torquatos consequuntur pro ut, id posse splendide ius. Cu nisl putent omittantur usu, mutat atomorum ex pro, ius nibh nonumy id. Nam at eius dissentias disputando, molestie mnesarchum complectitur per te', 4, '127.0.0.1', 'approved', '2025-04-16 03:24:11', 1, NULL, NULL, NULL, '2025-04-16 03:24:11', '2025-04-16 03:24:11', 1);

INSERT INTO `bc_review_meta` (`id`, `review_id`, `object_id`, `object_model`, `name`, `val`, `create_user`, `update_user`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'gig', 'Service', '5', 1, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10'),
(2, 1, 1, 'gig', 'Organization', '5', 1, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10'),
(3, 1, 1, 'gig', 'Friendliness', '4', 1, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10'),
(4, 1, 1, 'gig', 'Area Expert', '4', 1, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10'),
(5, 1, 1, 'gig', 'Safety', '4', 1, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10'),
(6, 2, 1, 'gig', 'Service', '5', 1, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10'),
(7, 2, 1, 'gig', 'Organization', '5', 1, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10'),
(8, 2, 1, 'gig', 'Friendliness', '5', 1, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10'),
(9, 2, 1, 'gig', 'Area Expert', '4', 1, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10'),
(10, 2, 1, 'gig', 'Safety', '5', 1, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10'),
(11, 3, 1, 'gig', 'Service', '5', 1, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10'),
(12, 3, 1, 'gig', 'Organization', '5', 1, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10'),
(13, 3, 1, 'gig', 'Friendliness', '4', 1, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10'),
(14, 3, 1, 'gig', 'Area Expert', '5', 1, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10'),
(15, 3, 1, 'gig', 'Safety', '4', 1, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10'),
(16, 4, 2, 'gig', 'Service', '5', 1, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10'),
(17, 4, 2, 'gig', 'Organization', '4', 1, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10'),
(18, 4, 2, 'gig', 'Friendliness', '5', 1, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10'),
(19, 4, 2, 'gig', 'Area Expert', '4', 1, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10'),
(20, 4, 2, 'gig', 'Safety', '5', 1, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10'),
(21, 5, 2, 'gig', 'Service', '4', 1, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10'),
(22, 5, 2, 'gig', 'Organization', '5', 1, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10'),
(23, 5, 2, 'gig', 'Friendliness', '5', 1, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10'),
(24, 5, 2, 'gig', 'Area Expert', '5', 1, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10'),
(25, 5, 2, 'gig', 'Safety', '5', 1, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10'),
(26, 6, 2, 'gig', 'Service', '5', 1, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10'),
(27, 6, 2, 'gig', 'Organization', '4', 1, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10'),
(28, 6, 2, 'gig', 'Friendliness', '4', 1, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10'),
(29, 6, 2, 'gig', 'Area Expert', '4', 1, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10'),
(30, 6, 2, 'gig', 'Safety', '4', 1, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10'),
(31, 7, 3, 'gig', 'Service', '4', 1, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10'),
(32, 7, 3, 'gig', 'Organization', '4', 1, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10'),
(33, 7, 3, 'gig', 'Friendliness', '5', 1, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10'),
(34, 7, 3, 'gig', 'Area Expert', '4', 1, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10'),
(35, 7, 3, 'gig', 'Safety', '5', 1, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10'),
(36, 8, 3, 'gig', 'Service', '5', 1, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10'),
(37, 8, 3, 'gig', 'Organization', '4', 1, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10'),
(38, 8, 3, 'gig', 'Friendliness', '5', 1, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10'),
(39, 8, 3, 'gig', 'Area Expert', '4', 1, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10'),
(40, 8, 3, 'gig', 'Safety', '4', 1, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10'),
(41, 9, 3, 'gig', 'Service', '4', 1, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10'),
(42, 9, 3, 'gig', 'Organization', '4', 1, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10'),
(43, 9, 3, 'gig', 'Friendliness', '4', 1, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10'),
(44, 9, 3, 'gig', 'Area Expert', '4', 1, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10'),
(45, 9, 3, 'gig', 'Safety', '5', 1, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10'),
(46, 10, 4, 'gig', 'Service', '4', 1, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10'),
(47, 10, 4, 'gig', 'Organization', '5', 1, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10'),
(48, 10, 4, 'gig', 'Friendliness', '4', 1, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10'),
(49, 10, 4, 'gig', 'Area Expert', '5', 1, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10'),
(50, 10, 4, 'gig', 'Safety', '5', 1, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10'),
(51, 11, 4, 'gig', 'Service', '4', 1, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10'),
(52, 11, 4, 'gig', 'Organization', '4', 1, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10'),
(53, 11, 4, 'gig', 'Friendliness', '4', 1, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10'),
(54, 11, 4, 'gig', 'Area Expert', '4', 1, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10'),
(55, 11, 4, 'gig', 'Safety', '4', 1, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10'),
(56, 12, 4, 'gig', 'Service', '4', 1, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10'),
(57, 12, 4, 'gig', 'Organization', '4', 1, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10'),
(58, 12, 4, 'gig', 'Friendliness', '5', 1, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10'),
(59, 12, 4, 'gig', 'Area Expert', '5', 1, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10'),
(60, 12, 4, 'gig', 'Safety', '4', 1, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10'),
(61, 13, 5, 'gig', 'Service', '4', 1, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10'),
(62, 13, 5, 'gig', 'Organization', '5', 1, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10'),
(63, 13, 5, 'gig', 'Friendliness', '4', 1, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10'),
(64, 13, 5, 'gig', 'Area Expert', '5', 1, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10'),
(65, 13, 5, 'gig', 'Safety', '4', 1, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10'),
(66, 14, 5, 'gig', 'Service', '4', 1, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10'),
(67, 14, 5, 'gig', 'Organization', '4', 1, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10'),
(68, 14, 5, 'gig', 'Friendliness', '4', 1, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10'),
(69, 14, 5, 'gig', 'Area Expert', '4', 1, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10'),
(70, 14, 5, 'gig', 'Safety', '5', 1, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10'),
(71, 15, 5, 'gig', 'Service', '5', 1, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10'),
(72, 15, 5, 'gig', 'Organization', '5', 1, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10'),
(73, 15, 5, 'gig', 'Friendliness', '5', 1, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10'),
(74, 15, 5, 'gig', 'Area Expert', '5', 1, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10'),
(75, 15, 5, 'gig', 'Safety', '4', 1, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10'),
(76, 16, 6, 'gig', 'Service', '5', 1, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10'),
(77, 16, 6, 'gig', 'Organization', '4', 1, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10'),
(78, 16, 6, 'gig', 'Friendliness', '5', 1, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10'),
(79, 16, 6, 'gig', 'Area Expert', '4', 1, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10'),
(80, 16, 6, 'gig', 'Safety', '5', 1, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10'),
(81, 17, 6, 'gig', 'Service', '5', 1, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10'),
(82, 17, 6, 'gig', 'Organization', '4', 1, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10'),
(83, 17, 6, 'gig', 'Friendliness', '4', 1, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10'),
(84, 17, 6, 'gig', 'Area Expert', '5', 1, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10'),
(85, 17, 6, 'gig', 'Safety', '5', 1, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10'),
(86, 18, 6, 'gig', 'Service', '4', 1, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10'),
(87, 18, 6, 'gig', 'Organization', '5', 1, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10'),
(88, 18, 6, 'gig', 'Friendliness', '4', 1, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10'),
(89, 18, 6, 'gig', 'Area Expert', '5', 1, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10'),
(90, 18, 6, 'gig', 'Safety', '5', 1, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10'),
(91, 19, 7, 'gig', 'Service', '4', 1, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10'),
(92, 19, 7, 'gig', 'Organization', '4', 1, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10'),
(93, 19, 7, 'gig', 'Friendliness', '5', 1, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10'),
(94, 19, 7, 'gig', 'Area Expert', '5', 1, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10'),
(95, 19, 7, 'gig', 'Safety', '4', 1, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10'),
(96, 20, 7, 'gig', 'Service', '4', 1, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10'),
(97, 20, 7, 'gig', 'Organization', '4', 1, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10'),
(98, 20, 7, 'gig', 'Friendliness', '5', 1, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10'),
(99, 20, 7, 'gig', 'Area Expert', '5', 1, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10'),
(100, 20, 7, 'gig', 'Safety', '5', 1, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10'),
(101, 21, 7, 'gig', 'Service', '5', 1, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10'),
(102, 21, 7, 'gig', 'Organization', '5', 1, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10'),
(103, 21, 7, 'gig', 'Friendliness', '5', 1, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10'),
(104, 21, 7, 'gig', 'Area Expert', '4', 1, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10'),
(105, 21, 7, 'gig', 'Safety', '4', 1, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10'),
(106, 22, 8, 'gig', 'Service', '5', 1, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10'),
(107, 22, 8, 'gig', 'Organization', '5', 1, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10'),
(108, 22, 8, 'gig', 'Friendliness', '4', 1, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10'),
(109, 22, 8, 'gig', 'Area Expert', '5', 1, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10'),
(110, 22, 8, 'gig', 'Safety', '4', 1, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10'),
(111, 23, 8, 'gig', 'Service', '4', 1, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10'),
(112, 23, 8, 'gig', 'Organization', '5', 1, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10'),
(113, 23, 8, 'gig', 'Friendliness', '5', 1, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10'),
(114, 23, 8, 'gig', 'Area Expert', '4', 1, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10'),
(115, 23, 8, 'gig', 'Safety', '5', 1, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10'),
(116, 24, 8, 'gig', 'Service', '5', 1, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10'),
(117, 24, 8, 'gig', 'Organization', '5', 1, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10'),
(118, 24, 8, 'gig', 'Friendliness', '5', 1, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10'),
(119, 24, 8, 'gig', 'Area Expert', '5', 1, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10'),
(120, 24, 8, 'gig', 'Safety', '4', 1, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10'),
(121, 25, 9, 'gig', 'Service', '4', 1, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10'),
(122, 25, 9, 'gig', 'Organization', '4', 1, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10'),
(123, 25, 9, 'gig', 'Friendliness', '4', 1, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10'),
(124, 25, 9, 'gig', 'Area Expert', '4', 1, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10'),
(125, 25, 9, 'gig', 'Safety', '5', 1, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10'),
(126, 26, 9, 'gig', 'Service', '5', 1, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10'),
(127, 26, 9, 'gig', 'Organization', '4', 1, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10'),
(128, 26, 9, 'gig', 'Friendliness', '5', 1, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10'),
(129, 26, 9, 'gig', 'Area Expert', '4', 1, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10'),
(130, 26, 9, 'gig', 'Safety', '4', 1, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10'),
(131, 27, 9, 'gig', 'Service', '5', 1, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10'),
(132, 27, 9, 'gig', 'Organization', '4', 1, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10'),
(133, 27, 9, 'gig', 'Friendliness', '4', 1, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10'),
(134, 27, 9, 'gig', 'Area Expert', '5', 1, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10'),
(135, 27, 9, 'gig', 'Safety', '5', 1, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10'),
(136, 28, 10, 'gig', 'Service', '4', 1, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10'),
(137, 28, 10, 'gig', 'Organization', '4', 1, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10'),
(138, 28, 10, 'gig', 'Friendliness', '5', 1, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10'),
(139, 28, 10, 'gig', 'Area Expert', '5', 1, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10'),
(140, 28, 10, 'gig', 'Safety', '4', 1, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10'),
(141, 29, 10, 'gig', 'Service', '5', 1, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10'),
(142, 29, 10, 'gig', 'Organization', '4', 1, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10'),
(143, 29, 10, 'gig', 'Friendliness', '4', 1, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10'),
(144, 29, 10, 'gig', 'Area Expert', '4', 1, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10'),
(145, 29, 10, 'gig', 'Safety', '4', 1, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10'),
(146, 30, 10, 'gig', 'Service', '5', 1, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10'),
(147, 30, 10, 'gig', 'Organization', '4', 1, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10'),
(148, 30, 10, 'gig', 'Friendliness', '5', 1, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10'),
(149, 30, 10, 'gig', 'Area Expert', '5', 1, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10'),
(150, 30, 10, 'gig', 'Safety', '5', 1, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10'),
(151, 31, 11, 'gig', 'Service', '5', 1, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10'),
(152, 31, 11, 'gig', 'Organization', '5', 1, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10'),
(153, 31, 11, 'gig', 'Friendliness', '5', 1, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10'),
(154, 31, 11, 'gig', 'Area Expert', '4', 1, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10'),
(155, 31, 11, 'gig', 'Safety', '4', 1, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10'),
(156, 32, 11, 'gig', 'Service', '5', 1, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10'),
(157, 32, 11, 'gig', 'Organization', '5', 1, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10'),
(158, 32, 11, 'gig', 'Friendliness', '4', 1, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10'),
(159, 32, 11, 'gig', 'Area Expert', '4', 1, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10'),
(160, 32, 11, 'gig', 'Safety', '5', 1, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10'),
(161, 33, 11, 'gig', 'Service', '4', 1, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10'),
(162, 33, 11, 'gig', 'Organization', '5', 1, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10'),
(163, 33, 11, 'gig', 'Friendliness', '5', 1, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10'),
(164, 33, 11, 'gig', 'Area Expert', '5', 1, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10'),
(165, 33, 11, 'gig', 'Safety', '5', 1, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10'),
(166, 34, 12, 'gig', 'Service', '5', 1, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10'),
(167, 34, 12, 'gig', 'Organization', '5', 1, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10'),
(168, 34, 12, 'gig', 'Friendliness', '4', 1, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10'),
(169, 34, 12, 'gig', 'Area Expert', '4', 1, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10'),
(170, 34, 12, 'gig', 'Safety', '5', 1, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10'),
(171, 35, 12, 'gig', 'Service', '4', 1, NULL, '2025-04-16 03:24:10', '2025-04-16 03:24:10'),
(172, 35, 12, 'gig', 'Organization', '4', 1, NULL, '2025-04-16 03:24:11', '2025-04-16 03:24:11'),
(173, 35, 12, 'gig', 'Friendliness', '5', 1, NULL, '2025-04-16 03:24:11', '2025-04-16 03:24:11'),
(174, 35, 12, 'gig', 'Area Expert', '4', 1, NULL, '2025-04-16 03:24:11', '2025-04-16 03:24:11'),
(175, 35, 12, 'gig', 'Safety', '5', 1, NULL, '2025-04-16 03:24:11', '2025-04-16 03:24:11'),
(176, 36, 12, 'gig', 'Service', '4', 1, NULL, '2025-04-16 03:24:11', '2025-04-16 03:24:11'),
(177, 36, 12, 'gig', 'Organization', '5', 1, NULL, '2025-04-16 03:24:11', '2025-04-16 03:24:11'),
(178, 36, 12, 'gig', 'Friendliness', '4', 1, NULL, '2025-04-16 03:24:11', '2025-04-16 03:24:11'),
(179, 36, 12, 'gig', 'Area Expert', '4', 1, NULL, '2025-04-16 03:24:11', '2025-04-16 03:24:11'),
(180, 36, 12, 'gig', 'Safety', '4', 1, NULL, '2025-04-16 03:24:11', '2025-04-16 03:24:11'),
(181, 37, 13, 'gig', 'Service', '4', 1, NULL, '2025-04-16 03:24:11', '2025-04-16 03:24:11'),
(182, 37, 13, 'gig', 'Organization', '5', 1, NULL, '2025-04-16 03:24:11', '2025-04-16 03:24:11'),
(183, 37, 13, 'gig', 'Friendliness', '5', 1, NULL, '2025-04-16 03:24:11', '2025-04-16 03:24:11'),
(184, 37, 13, 'gig', 'Area Expert', '5', 1, NULL, '2025-04-16 03:24:11', '2025-04-16 03:24:11'),
(185, 37, 13, 'gig', 'Safety', '5', 1, NULL, '2025-04-16 03:24:11', '2025-04-16 03:24:11'),
(186, 38, 13, 'gig', 'Service', '4', 1, NULL, '2025-04-16 03:24:11', '2025-04-16 03:24:11'),
(187, 38, 13, 'gig', 'Organization', '4', 1, NULL, '2025-04-16 03:24:11', '2025-04-16 03:24:11'),
(188, 38, 13, 'gig', 'Friendliness', '4', 1, NULL, '2025-04-16 03:24:11', '2025-04-16 03:24:11'),
(189, 38, 13, 'gig', 'Area Expert', '4', 1, NULL, '2025-04-16 03:24:11', '2025-04-16 03:24:11'),
(190, 38, 13, 'gig', 'Safety', '5', 1, NULL, '2025-04-16 03:24:11', '2025-04-16 03:24:11'),
(191, 39, 13, 'gig', 'Service', '4', 1, NULL, '2025-04-16 03:24:11', '2025-04-16 03:24:11'),
(192, 39, 13, 'gig', 'Organization', '5', 1, NULL, '2025-04-16 03:24:11', '2025-04-16 03:24:11'),
(193, 39, 13, 'gig', 'Friendliness', '4', 1, NULL, '2025-04-16 03:24:11', '2025-04-16 03:24:11'),
(194, 39, 13, 'gig', 'Area Expert', '5', 1, NULL, '2025-04-16 03:24:11', '2025-04-16 03:24:11'),
(195, 39, 13, 'gig', 'Safety', '5', 1, NULL, '2025-04-16 03:24:11', '2025-04-16 03:24:11'),
(196, 40, 14, 'gig', 'Service', '5', 1, NULL, '2025-04-16 03:24:11', '2025-04-16 03:24:11'),
(197, 40, 14, 'gig', 'Organization', '4', 1, NULL, '2025-04-16 03:24:11', '2025-04-16 03:24:11'),
(198, 40, 14, 'gig', 'Friendliness', '4', 1, NULL, '2025-04-16 03:24:11', '2025-04-16 03:24:11'),
(199, 40, 14, 'gig', 'Area Expert', '4', 1, NULL, '2025-04-16 03:24:11', '2025-04-16 03:24:11'),
(200, 40, 14, 'gig', 'Safety', '5', 1, NULL, '2025-04-16 03:24:11', '2025-04-16 03:24:11'),
(201, 41, 14, 'gig', 'Service', '5', 1, NULL, '2025-04-16 03:24:11', '2025-04-16 03:24:11'),
(202, 41, 14, 'gig', 'Organization', '5', 1, NULL, '2025-04-16 03:24:11', '2025-04-16 03:24:11'),
(203, 41, 14, 'gig', 'Friendliness', '5', 1, NULL, '2025-04-16 03:24:11', '2025-04-16 03:24:11'),
(204, 41, 14, 'gig', 'Area Expert', '5', 1, NULL, '2025-04-16 03:24:11', '2025-04-16 03:24:11'),
(205, 41, 14, 'gig', 'Safety', '5', 1, NULL, '2025-04-16 03:24:11', '2025-04-16 03:24:11'),
(206, 42, 14, 'gig', 'Service', '4', 1, NULL, '2025-04-16 03:24:11', '2025-04-16 03:24:11'),
(207, 42, 14, 'gig', 'Organization', '5', 1, NULL, '2025-04-16 03:24:11', '2025-04-16 03:24:11'),
(208, 42, 14, 'gig', 'Friendliness', '4', 1, NULL, '2025-04-16 03:24:11', '2025-04-16 03:24:11'),
(209, 42, 14, 'gig', 'Area Expert', '5', 1, NULL, '2025-04-16 03:24:11', '2025-04-16 03:24:11'),
(210, 42, 14, 'gig', 'Safety', '4', 1, NULL, '2025-04-16 03:24:11', '2025-04-16 03:24:11'),
(211, 43, 15, 'gig', 'Service', '4', 1, NULL, '2025-04-16 03:24:11', '2025-04-16 03:24:11'),
(212, 43, 15, 'gig', 'Organization', '4', 1, NULL, '2025-04-16 03:24:11', '2025-04-16 03:24:11'),
(213, 43, 15, 'gig', 'Friendliness', '5', 1, NULL, '2025-04-16 03:24:11', '2025-04-16 03:24:11'),
(214, 43, 15, 'gig', 'Area Expert', '4', 1, NULL, '2025-04-16 03:24:11', '2025-04-16 03:24:11'),
(215, 43, 15, 'gig', 'Safety', '5', 1, NULL, '2025-04-16 03:24:11', '2025-04-16 03:24:11'),
(216, 44, 15, 'gig', 'Service', '4', 1, NULL, '2025-04-16 03:24:11', '2025-04-16 03:24:11'),
(217, 44, 15, 'gig', 'Organization', '4', 1, NULL, '2025-04-16 03:24:11', '2025-04-16 03:24:11'),
(218, 44, 15, 'gig', 'Friendliness', '4', 1, NULL, '2025-04-16 03:24:11', '2025-04-16 03:24:11'),
(219, 44, 15, 'gig', 'Area Expert', '4', 1, NULL, '2025-04-16 03:24:11', '2025-04-16 03:24:11'),
(220, 44, 15, 'gig', 'Safety', '4', 1, NULL, '2025-04-16 03:24:11', '2025-04-16 03:24:11'),
(221, 45, 15, 'gig', 'Service', '5', 1, NULL, '2025-04-16 03:24:11', '2025-04-16 03:24:11'),
(222, 45, 15, 'gig', 'Organization', '5', 1, NULL, '2025-04-16 03:24:11', '2025-04-16 03:24:11'),
(223, 45, 15, 'gig', 'Friendliness', '4', 1, NULL, '2025-04-16 03:24:11', '2025-04-16 03:24:11'),
(224, 45, 15, 'gig', 'Area Expert', '4', 1, NULL, '2025-04-16 03:24:11', '2025-04-16 03:24:11'),
(225, 45, 15, 'gig', 'Safety', '4', 1, NULL, '2025-04-16 03:24:11', '2025-04-16 03:24:11'),
(226, 46, 16, 'gig', 'Service', '5', 1, NULL, '2025-04-16 03:24:11', '2025-04-16 03:24:11'),
(227, 46, 16, 'gig', 'Organization', '4', 1, NULL, '2025-04-16 03:24:11', '2025-04-16 03:24:11'),
(228, 46, 16, 'gig', 'Friendliness', '5', 1, NULL, '2025-04-16 03:24:11', '2025-04-16 03:24:11'),
(229, 46, 16, 'gig', 'Area Expert', '4', 1, NULL, '2025-04-16 03:24:11', '2025-04-16 03:24:11'),
(230, 46, 16, 'gig', 'Safety', '4', 1, NULL, '2025-04-16 03:24:11', '2025-04-16 03:24:11'),
(231, 47, 16, 'gig', 'Service', '5', 1, NULL, '2025-04-16 03:24:11', '2025-04-16 03:24:11'),
(232, 47, 16, 'gig', 'Organization', '4', 1, NULL, '2025-04-16 03:24:11', '2025-04-16 03:24:11'),
(233, 47, 16, 'gig', 'Friendliness', '5', 1, NULL, '2025-04-16 03:24:11', '2025-04-16 03:24:11'),
(234, 47, 16, 'gig', 'Area Expert', '5', 1, NULL, '2025-04-16 03:24:11', '2025-04-16 03:24:11'),
(235, 47, 16, 'gig', 'Safety', '5', 1, NULL, '2025-04-16 03:24:11', '2025-04-16 03:24:11'),
(236, 48, 16, 'gig', 'Service', '4', 1, NULL, '2025-04-16 03:24:11', '2025-04-16 03:24:11'),
(237, 48, 16, 'gig', 'Organization', '4', 1, NULL, '2025-04-16 03:24:11', '2025-04-16 03:24:11'),
(238, 48, 16, 'gig', 'Friendliness', '4', 1, NULL, '2025-04-16 03:24:11', '2025-04-16 03:24:11'),
(239, 48, 16, 'gig', 'Area Expert', '4', 1, NULL, '2025-04-16 03:24:11', '2025-04-16 03:24:11'),
(240, 48, 16, 'gig', 'Safety', '5', 1, NULL, '2025-04-16 03:24:11', '2025-04-16 03:24:11'),
(241, 49, 17, 'gig', 'Service', '4', 1, NULL, '2025-04-16 03:24:11', '2025-04-16 03:24:11'),
(242, 49, 17, 'gig', 'Organization', '4', 1, NULL, '2025-04-16 03:24:11', '2025-04-16 03:24:11'),
(243, 49, 17, 'gig', 'Friendliness', '5', 1, NULL, '2025-04-16 03:24:11', '2025-04-16 03:24:11'),
(244, 49, 17, 'gig', 'Area Expert', '4', 1, NULL, '2025-04-16 03:24:11', '2025-04-16 03:24:11'),
(245, 49, 17, 'gig', 'Safety', '5', 1, NULL, '2025-04-16 03:24:11', '2025-04-16 03:24:11'),
(246, 50, 17, 'gig', 'Service', '4', 1, NULL, '2025-04-16 03:24:11', '2025-04-16 03:24:11'),
(247, 50, 17, 'gig', 'Organization', '5', 1, NULL, '2025-04-16 03:24:11', '2025-04-16 03:24:11'),
(248, 50, 17, 'gig', 'Friendliness', '4', 1, NULL, '2025-04-16 03:24:11', '2025-04-16 03:24:11'),
(249, 50, 17, 'gig', 'Area Expert', '4', 1, NULL, '2025-04-16 03:24:11', '2025-04-16 03:24:11'),
(250, 50, 17, 'gig', 'Safety', '4', 1, NULL, '2025-04-16 03:24:11', '2025-04-16 03:24:11'),
(251, 51, 17, 'gig', 'Service', '4', 1, NULL, '2025-04-16 03:24:11', '2025-04-16 03:24:11'),
(252, 51, 17, 'gig', 'Organization', '4', 1, NULL, '2025-04-16 03:24:11', '2025-04-16 03:24:11'),
(253, 51, 17, 'gig', 'Friendliness', '5', 1, NULL, '2025-04-16 03:24:11', '2025-04-16 03:24:11'),
(254, 51, 17, 'gig', 'Area Expert', '4', 1, NULL, '2025-04-16 03:24:11', '2025-04-16 03:24:11'),
(255, 51, 17, 'gig', 'Safety', '4', 1, NULL, '2025-04-16 03:24:11', '2025-04-16 03:24:11'),
(256, 52, 18, 'gig', 'Service', '5', 1, NULL, '2025-04-16 03:24:11', '2025-04-16 03:24:11'),
(257, 52, 18, 'gig', 'Organization', '4', 1, NULL, '2025-04-16 03:24:11', '2025-04-16 03:24:11'),
(258, 52, 18, 'gig', 'Friendliness', '4', 1, NULL, '2025-04-16 03:24:11', '2025-04-16 03:24:11'),
(259, 52, 18, 'gig', 'Area Expert', '5', 1, NULL, '2025-04-16 03:24:11', '2025-04-16 03:24:11'),
(260, 52, 18, 'gig', 'Safety', '5', 1, NULL, '2025-04-16 03:24:11', '2025-04-16 03:24:11'),
(261, 53, 18, 'gig', 'Service', '4', 1, NULL, '2025-04-16 03:24:11', '2025-04-16 03:24:11'),
(262, 53, 18, 'gig', 'Organization', '5', 1, NULL, '2025-04-16 03:24:11', '2025-04-16 03:24:11'),
(263, 53, 18, 'gig', 'Friendliness', '5', 1, NULL, '2025-04-16 03:24:11', '2025-04-16 03:24:11'),
(264, 53, 18, 'gig', 'Area Expert', '4', 1, NULL, '2025-04-16 03:24:11', '2025-04-16 03:24:11'),
(265, 53, 18, 'gig', 'Safety', '4', 1, NULL, '2025-04-16 03:24:11', '2025-04-16 03:24:11'),
(266, 54, 18, 'gig', 'Service', '4', 1, NULL, '2025-04-16 03:24:11', '2025-04-16 03:24:11'),
(267, 54, 18, 'gig', 'Organization', '5', 1, NULL, '2025-04-16 03:24:11', '2025-04-16 03:24:11'),
(268, 54, 18, 'gig', 'Friendliness', '5', 1, NULL, '2025-04-16 03:24:11', '2025-04-16 03:24:11'),
(269, 54, 18, 'gig', 'Area Expert', '4', 1, NULL, '2025-04-16 03:24:11', '2025-04-16 03:24:11'),
(270, 54, 18, 'gig', 'Safety', '5', 1, NULL, '2025-04-16 03:24:11', '2025-04-16 03:24:11'),
(271, 55, 19, 'gig', 'Service', '4', 1, NULL, '2025-04-16 03:24:11', '2025-04-16 03:24:11'),
(272, 55, 19, 'gig', 'Organization', '5', 1, NULL, '2025-04-16 03:24:11', '2025-04-16 03:24:11'),
(273, 55, 19, 'gig', 'Friendliness', '4', 1, NULL, '2025-04-16 03:24:11', '2025-04-16 03:24:11'),
(274, 55, 19, 'gig', 'Area Expert', '4', 1, NULL, '2025-04-16 03:24:11', '2025-04-16 03:24:11'),
(275, 55, 19, 'gig', 'Safety', '5', 1, NULL, '2025-04-16 03:24:11', '2025-04-16 03:24:11'),
(276, 56, 19, 'gig', 'Service', '5', 1, NULL, '2025-04-16 03:24:11', '2025-04-16 03:24:11'),
(277, 56, 19, 'gig', 'Organization', '5', 1, NULL, '2025-04-16 03:24:11', '2025-04-16 03:24:11'),
(278, 56, 19, 'gig', 'Friendliness', '5', 1, NULL, '2025-04-16 03:24:11', '2025-04-16 03:24:11'),
(279, 56, 19, 'gig', 'Area Expert', '4', 1, NULL, '2025-04-16 03:24:11', '2025-04-16 03:24:11'),
(280, 56, 19, 'gig', 'Safety', '4', 1, NULL, '2025-04-16 03:24:11', '2025-04-16 03:24:11'),
(281, 57, 19, 'gig', 'Service', '4', 1, NULL, '2025-04-16 03:24:11', '2025-04-16 03:24:11'),
(282, 57, 19, 'gig', 'Organization', '4', 1, NULL, '2025-04-16 03:24:11', '2025-04-16 03:24:11'),
(283, 57, 19, 'gig', 'Friendliness', '5', 1, NULL, '2025-04-16 03:24:11', '2025-04-16 03:24:11'),
(284, 57, 19, 'gig', 'Area Expert', '5', 1, NULL, '2025-04-16 03:24:11', '2025-04-16 03:24:11'),
(285, 57, 19, 'gig', 'Safety', '5', 1, NULL, '2025-04-16 03:24:11', '2025-04-16 03:24:11'),
(286, 58, 20, 'gig', 'Service', '5', 1, NULL, '2025-04-16 03:24:11', '2025-04-16 03:24:11'),
(287, 58, 20, 'gig', 'Organization', '5', 1, NULL, '2025-04-16 03:24:11', '2025-04-16 03:24:11'),
(288, 58, 20, 'gig', 'Friendliness', '4', 1, NULL, '2025-04-16 03:24:11', '2025-04-16 03:24:11'),
(289, 58, 20, 'gig', 'Area Expert', '4', 1, NULL, '2025-04-16 03:24:11', '2025-04-16 03:24:11'),
(290, 58, 20, 'gig', 'Safety', '4', 1, NULL, '2025-04-16 03:24:11', '2025-04-16 03:24:11'),
(291, 59, 20, 'gig', 'Service', '4', 1, NULL, '2025-04-16 03:24:11', '2025-04-16 03:24:11'),
(292, 59, 20, 'gig', 'Organization', '4', 1, NULL, '2025-04-16 03:24:11', '2025-04-16 03:24:11'),
(293, 59, 20, 'gig', 'Friendliness', '5', 1, NULL, '2025-04-16 03:24:11', '2025-04-16 03:24:11'),
(294, 59, 20, 'gig', 'Area Expert', '4', 1, NULL, '2025-04-16 03:24:11', '2025-04-16 03:24:11'),
(295, 59, 20, 'gig', 'Safety', '4', 1, NULL, '2025-04-16 03:24:11', '2025-04-16 03:24:11'),
(296, 60, 20, 'gig', 'Service', '5', 1, NULL, '2025-04-16 03:24:11', '2025-04-16 03:24:11'),
(297, 60, 20, 'gig', 'Organization', '4', 1, NULL, '2025-04-16 03:24:11', '2025-04-16 03:24:11'),
(298, 60, 20, 'gig', 'Friendliness', '4', 1, NULL, '2025-04-16 03:24:11', '2025-04-16 03:24:11'),
(299, 60, 20, 'gig', 'Area Expert', '4', 1, NULL, '2025-04-16 03:24:11', '2025-04-16 03:24:11'),
(300, 60, 20, 'gig', 'Safety', '5', 1, NULL, '2025-04-16 03:24:11', '2025-04-16 03:24:11');

INSERT INTO `bc_seo` (`id`, `object_id`, `object_model`, `seo_index`, `seo_title`, `seo_desc`, `seo_image`, `seo_share`, `create_user`, `update_user`, `origin_id`, `lang`, `created_at`, `updated_at`) VALUES
(1, 16, 'candidate', 1, NULL, NULL, NULL, '{\"facebook\":{\"title\":null,\"desc\":null,\"image\":null},\"twitter\":{\"title\":null,\"desc\":null,\"image\":null}}', 16, 16, NULL, NULL, '2025-06-24 19:18:56', '2025-06-24 19:19:29');

INSERT INTO `bc_skills` (`id`, `name`, `slug`, `status`, `create_user`, `update_user`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'app', 'app', 'publish', NULL, NULL, NULL, '2025-04-16 03:24:08', '2025-04-16 03:24:08'),
(2, 'administrative', 'administrative', 'publish', NULL, NULL, NULL, '2025-04-16 03:24:08', '2025-04-16 03:24:08'),
(3, 'android', 'android', 'publish', NULL, NULL, NULL, '2025-04-16 03:24:08', '2025-04-16 03:24:08'),
(4, 'wordpress', 'wordpress', 'publish', NULL, NULL, NULL, '2025-04-16 03:24:08', '2025-04-16 03:24:08'),
(5, 'design', 'design', 'publish', NULL, NULL, NULL, '2025-04-16 03:24:08', '2025-04-16 03:24:08'),
(6, 'react', 'react', 'publish', NULL, NULL, NULL, '2025-04-16 03:24:08', '2025-04-16 03:24:08'),
(7, 'javascript', 'javascript', 'publish', NULL, NULL, NULL, '2025-04-16 03:24:08', '2025-04-16 03:24:08'),
(8, 'html', 'html', 'publish', NULL, NULL, NULL, '2025-04-16 03:24:08', '2025-04-16 03:24:08');

INSERT INTO `bc_terms` (`id`, `name`, `content`, `attr_id`, `slug`, `create_user`, `update_user`, `origin_id`, `lang`, `created_at`, `updated_at`, `icon`, `deleted_at`, `image_id`) VALUES
(1, '10-50 Members', NULL, 1, '10-50-member', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, '50-100 Members', NULL, 1, '50-100-member', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, '100-200 Members', NULL, 1, '100-200-member', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, '200-500 Members', NULL, 1, '200-500-member', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, '500-1000 Members', NULL, 1, '500-1000-member', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, '1000-10000 Members', NULL, 1, '1000-10000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

INSERT INTO `core_languages` (`id`, `locale`, `name`, `flag`, `status`, `create_user`, `update_user`, `last_build_at`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'en', 'English', 'gb', 'publish', 1, NULL, NULL, NULL, '2025-04-16 03:24:02', '2025-04-16 03:24:02'),
(2, 'ja', 'Japanese', 'jp', 'publish', 1, NULL, NULL, NULL, '2025-04-16 03:24:02', '2025-04-16 03:24:02'),
(3, 'egy', 'Egyptian', 'eg', 'publish', 1, NULL, NULL, NULL, '2025-04-16 03:24:02', '2025-04-16 03:24:02');

INSERT INTO `core_menu_translations` (`id`, `origin_id`, `locale`, `items`, `create_user`, `update_user`, `created_at`, `updated_at`) VALUES
(1, 1, 'ja', '[{\"name\":\"\\u30db\\u30fc\\u30e0\\u30da\\u30fc\\u30b8\",\"url\":\"\\/ja\",\"item_model\":\"custom\",\"model_name\":\"Custom\",\"children\":[{\"name\":\"\\u30db\\u30fc\\u30e0\\u30da\\u30fc\\u30b801\",\"url\":\"\\/ja\",\"item_model\":\"custom\",\"children\":[]},{\"name\":\"\\u30db\\u30fc\\u30e0\\u30da\\u30fc\\u30b802\",\"url\":\"\\/ja\\/page\\/home-page-2\",\"item_model\":\"custom\",\"children\":[]},{\"name\":\"\\u30db\\u30fc\\u30e0\\u30da\\u30fc\\u30b803\",\"url\":\"\\/ja\\/page\\/home-page-3\",\"item_model\":\"custom\",\"children\":[]},{\"name\":\"\\u30db\\u30fc\\u30e0\\u30da\\u30fc\\u30b804\",\"url\":\"\\/ja\\/page\\/home-page-4\",\"item_model\":\"custom\",\"children\":[]},{\"name\":\"\\u30db\\u30fc\\u30e0\\u30da\\u30fc\\u30b805\",\"url\":\"\\/ja\\/page\\/home-page-5\",\"item_model\":\"custom\",\"children\":[]},{\"name\":\"\\u30db\\u30fc\\u30e0\\u30da\\u30fc\\u30b806\",\"url\":\"\\/ja\\/page\\/home-page-6\",\"item_model\":\"custom\",\"children\":[]},{\"name\":\"\\u30db\\u30fc\\u30e0\\u30da\\u30fc\\u30b807\",\"url\":\"\\/ja\\/page\\/home-page-7\",\"item_model\":\"custom\",\"children\":[]},{\"name\":\"\\u30db\\u30fc\\u30e0\\u30da\\u30fc\\u30b808\",\"url\":\"\\/ja\\/page\\/home-page-8\",\"item_model\":\"custom\",\"children\":[]},{\"name\":\"\\u30db\\u30fc\\u30e0\\u30da\\u30fc\\u30b809\",\"url\":\"\\/ja\\/page\\/home-page-9\",\"item_model\":\"custom\",\"children\":[]}]},{\"name\":\"GIG\",\"url\":\"\\/ja\\/gig\",\"item_model\":\"custom\",\"model_name\":\"Custom\",\"children\":[{\"name\":\"\\u30ab\\u30c6\\u30b4\\u30ea\\u30ec\\u30d9\\u30eb1\",\"url\":\"\\/ja\\/gig-cat\\/graphics-design\",\"item_model\":\"custom\"},{\"name\":\"\\u30ab\\u30c6\\u30b4\\u30ea\\u30ec\\u30d9\\u30eb2\",\"url\":\"\\/ja\\/gig-cat\\/logo-design\",\"item_model\":\"custom\"},{\"name\":\"\\u30ae\\u30b0\\u30ea\\u30b9\\u30c8\",\"url\":\"\\/ja\\/gig\",\"item_model\":\"custom\"},{\"name\":\"\\u30ae\\u30b0\\u306e\\u8a73\\u7d30\",\"url\":\"\\/ja\\/gig\\/i-will-quod-corrupti-veritatis\",\"item_model\":\"custom\"}]},{\"name\":\"\\u4ed5\\u4e8b\\u3092\\u63a2\\u3059\",\"url\":\"\\/ja\\/\",\"item_model\":\"custom\",\"model_name\":\"Custom\",\"children\":[{\"name\":\"\\u30b8\\u30e7\\u30d6\\u30ea\\u30b9\\u30c8\",\"url\":\"\\/ja\\/job\",\"item_model\":\"custom\",\"children\":[{\"name\":\"\\u30b8\\u30e7\\u30d6\\u30ea\\u30b9\\u30c8V1\",\"url\":\"\\/ja\\/job\",\"item_model\":\"custom\"},{\"name\":\"\\u30b8\\u30e7\\u30d6\\u30ea\\u30b9\\u30c8V2\",\"url\":\"\\/ja\\/job?_layout=v2\",\"item_model\":\"custom\"},{\"name\":\"\\u30b8\\u30e7\\u30d6\\u30ea\\u30b9\\u30c8V3\",\"url\":\"\\/ja\\/job?_layout=v3\",\"item_model\":\"custom\"},{\"name\":\"\\u30b8\\u30e7\\u30d6\\u30ea\\u30b9\\u30c8V4\",\"url\":\"\\/ja\\/job?_layout=v4\",\"item_model\":\"custom\"},{\"name\":\"\\u30b8\\u30e7\\u30d6\\u30ea\\u30b9\\u30c8V5\",\"url\":\"\\/ja\\/job?_layout=v5\",\"item_model\":\"custom\"},{\"name\":\"\\u30b8\\u30e7\\u30d6\\u30ea\\u30b9\\u30c8V6\",\"url\":\"\\/ja\\/job?_layout=v6\",\"item_model\":\"custom\"},{\"name\":\"\\u30b8\\u30e7\\u30d6\\u30ea\\u30b9\\u30c8V7\",\"url\":\"\\/ja\\/job?_layout=v7\",\"item_model\":\"custom\"},{\"name\":\"\\u30b8\\u30e7\\u30d6\\u30ea\\u30b9\\u30c8V8\",\"url\":\"\\/ja\\/job?_layout=v8\",\"item_model\":\"custom\"},{\"name\":\"\\u30b8\\u30e7\\u30d6\\u30ea\\u30b9\\u30c8V9\",\"url\":\"\\/ja\\/job?_layout=v9\",\"item_model\":\"custom\"}]},{\"name\":\"\\u4ed5\\u4e8b\\u306e\\u8a73\\u7d30\",\"url\":\"\\/ja\\/job\\/product-designer-ui-designer\",\"item_model\":\"custom\",\"children\":[{\"name\":\"\\u30b8\\u30e7\\u30d6\\u306e\\u8a73\\u7d30V1\",\"url\":\"\\/ja\\/job\\/product-designer-ui-designer\",\"item_model\":\"custom\"},{\"name\":\"\\u30b8\\u30e7\\u30d6\\u306e\\u8a73\\u7d30V2\",\"url\":\"\\/ja\\/job\\/product-designer-ui-designer?_layout=v2\",\"item_model\":\"custom\"},{\"name\":\"\\u30b8\\u30e7\\u30d6\\u306e\\u8a73\\u7d30V3\",\"url\":\"\\/ja\\/job\\/product-designer-ui-designer?_layout=v3\",\"item_model\":\"custom\"},{\"name\":\"\\u30b8\\u30e7\\u30d6\\u306e\\u8a73\\u7d30V4\",\"url\":\"\\/ja\\/job\\/restaurant-team-member?_layout=v4\",\"item_model\":\"custom\"},{\"name\":\"\\u30b8\\u30e7\\u30d6\\u306e\\u8a73\\u7d30V5\",\"url\":\"\\/ja\\/job\\/product-designer-ui-designer?_layout=v5\",\"item_model\":\"custom\"},{\"name\":\"\\u30b8\\u30e7\\u30d6\\u2013\\u5185\\u90e8\\u9069\\u7528\",\"url\":\"\\/ja\\/job\\/product-designer-ui-designer\",\"item_model\":\"custom\"},{\"name\":\"\\u30b8\\u30e7\\u30d6\\u2013\\u5916\\u90e8\\u9069\\u7528\",\"url\":\"\\/ja\\/job\\/software-engineer-android-lib\",\"item_model\":\"custom\"},{\"name\":\"\\u4ed5\\u4e8b\\u2013\\u30e1\\u30fc\\u30eb\\u3067\\u7533\\u3057\\u8fbc\\u3080\",\"url\":\"\\/ja\\/job\\/group-marketing-manager\",\"item_model\":\"custom\"}]}]},{\"name\":\"\\u96c7\\u7528\\u4e3b\",\"url\":\"\\/\",\"item_model\":\"custom\",\"model_name\":\"Custom\",\"children\":[{\"name\":\"\\u96c7\\u7528\\u8005\\u30ea\\u30b9\\u30c8\",\"url\":\"\\/ja\\/companies\",\"item_model\":\"custom\",\"children\":[{\"name\":\"\\u96c7\\u7528\\u8005\\u30ea\\u30b9\\u30c8V1\",\"url\":\"\\/ja\\/companies?_layout=v1\",\"item_model\":\"custom\"},{\"name\":\"\\u96c7\\u7528\\u8005\\u30ea\\u30b9\\u30c8V2\",\"url\":\"\\/ja\\/companies?_layout=v2\",\"item_model\":\"custom\"},{\"name\":\"\\u96c7\\u7528\\u8005\\u30ea\\u30b9\\u30c8V3\",\"url\":\"\\/ja\\/companies?_layout=v3\",\"item_model\":\"custom\"},{\"name\":\"\\u96c7\\u7528\\u8005\\u30ea\\u30b9\\u30c8V4\",\"url\":\"\\/ja\\/companies?_layout=v4\",\"item_model\":\"custom\"}]},{\"name\":\"\\u96c7\\u7528\\u4e3b\\u306e\\u8a73\\u7d30\",\"url\":\"\\/ja\\/companies\\/netflix\",\"item_model\":\"custom\",\"children\":[{\"name\":\"\\u96c7\\u7528\\u4e3b\\u306e\\u8a73\\u7d30V1\",\"url\":\"\\/ja\\/companies\\/netflix?_layout=v1\",\"item_model\":\"custom\"},{\"name\":\"\\u96c7\\u7528\\u4e3b\\u306e\\u8a73\\u7d30V2\",\"url\":\"\\/ja\\/companies\\/netflix?_layout=v2\",\"item_model\":\"custom\"},{\"name\":\"\\u96c7\\u7528\\u4e3b\\u306e\\u8a73\\u7d30V3\",\"url\":\"\\/ja\\/companies\\/netflix?_layout=v3\",\"item_model\":\"custom\"}]}]},{\"name\":\"\\u5019\\u88dc\\u8005\",\"url\":\"\\/\",\"item_model\":\"custom\",\"model_name\":\"Custom\",\"children\":[{\"name\":\"\\u5019\\u88dc\\u8005\\u30ea\\u30b9\\u30c8\",\"url\":\"\\/ja\\/candidate\",\"item_model\":\"custom\",\"children\":[{\"name\":\"\\u5019\\u88dc\\u8005\\u30ea\\u30b9\\u30c8V1\",\"url\":\"\\/ja\\/candidate?_layout=v1\",\"item_model\":\"custom\"},{\"name\":\"\\u5019\\u88dc\\u8005\\u30ea\\u30b9\\u30c8V2\",\"url\":\"\\/ja\\/candidate?_layout=v2\",\"item_model\":\"custom\"},{\"name\":\"\\u5019\\u88dc\\u8005\\u30ea\\u30b9\\u30c8V3\",\"url\":\"\\/ja\\/candidate?_layout=v3\",\"item_model\":\"custom\"},{\"name\":\"\\u5019\\u88dc\\u8005\\u30ea\\u30b9\\u30c8V4\",\"url\":\"\\/ja\\/candidate?_layout=v4\",\"item_model\":\"custom\"},{\"name\":\"\\u5019\\u88dc\\u8005\\u30ea\\u30b9\\u30c8V5\",\"url\":\"\\/ja\\/candidate?_layout=v5\",\"item_model\":\"custom\"}]},{\"name\":\"\\u5019\\u88dc\\u8005\\u306e\\u8a73\\u7d30\",\"url\":\"\\/ja\\/candidate\\/ui-designer-at-invision-1\",\"item_model\":\"custom\",\"children\":[{\"name\":\"\\u5019\\u88dc\\u8005\\u306e\\u8a73\\u7d30V1\",\"url\":\"\\/ja\\/candidate\\/ui-designer-at-invision-1\",\"item_model\":\"custom\"},{\"name\":\"\\u5019\\u88dc\\u8005\\u306e\\u8a73\\u7d30V2\",\"url\":\"\\/ja\\/candidate\\/ui-designer-at-invision-1?_layout=v2\",\"item_model\":\"custom\"},{\"name\":\"\\u5019\\u88dc\\u8005\\u306e\\u8a73\\u7d30V3\",\"url\":\"\\/ja\\/candidate\\/ui-designer-at-invision-1?_layout=v3\",\"item_model\":\"custom\"}]}]},{\"name\":\"\\u30da\\u30fc\\u30b8\",\"url\":\"\\/\",\"item_model\":\"custom\",\"model_name\":\"Custom\",\"children\":[{\"name\":\"\\u30d6\\u30ed\\u30b0\\u30ea\\u30b9\\u30c8\",\"url\":\"\\/ja\\/news\",\"item_model\":\"custom\"},{\"name\":\"\\u30d6\\u30ed\\u30b0\\u306e\\u8a73\\u7d30\",\"url\":\"\\/ja\\/news\\/5-tips-for-your-job-interviews\",\"item_model\":\"custom\"},{\"name\":\"\\u79c1\\u305f\\u3061\\u306b\\u95a2\\u3057\\u3066\\u306f\",\"url\":\"\\/ja\\/page\\/about\",\"item_model\":\"custom\",\"children\":[]},{\"name\":\"\\u3088\\u304f\\u3042\\u308b\\u8cea\\u554f\",\"url\":\"\\/ja\\/page\\/faqs\",\"item_model\":\"custom\",\"children\":[]},{\"name\":\"\\u898f\\u7d04\\u3068\\u6761\\u4ef6\",\"url\":\"\\/ja\\/page\\/terms-and-conditions\",\"item_model\":\"custom\",\"children\":[]},{\"name\":\"\\u9023\\u7d61\\u5148\",\"url\":\"\\/ja\\/contact\",\"item_model\":\"custom\",\"children\":[]}]}]', NULL, NULL, '2025-04-16 03:24:07', NULL),
(2, 1, 'egy', '[{\"name\":\"Home\",\"url\":\"\\/egy\",\"item_model\":\"custom\",\"model_name\":\"Custom\",\"children\":[{\"name\":\"Home Page 01\",\"url\":\"\\/egy\",\"item_model\":\"custom\",\"children\":[]},{\"name\":\"Home Page 02\",\"url\":\"\\/egy\\/page\\/home-page-2\",\"item_model\":\"custom\",\"children\":[]},{\"name\":\"Home Page 03\",\"url\":\"\\/egy\\/page\\/home-page-3\",\"item_model\":\"custom\",\"children\":[]},{\"name\":\"Home Page 04\",\"url\":\"\\/egy\\/page\\/home-page-4\",\"item_model\":\"custom\",\"children\":[]},{\"name\":\"Home Page 05\",\"url\":\"\\/egy\\/page\\/home-page-5\",\"item_model\":\"custom\",\"children\":[]},{\"name\":\"Home Page 06\",\"url\":\"\\/egy\\/page\\/home-page-6\",\"item_model\":\"custom\",\"children\":[]},{\"name\":\"Home Page 07\",\"url\":\"\\/egy\\/page\\/home-page-7\",\"item_model\":\"custom\",\"children\":[]},{\"name\":\"Home Page 08\",\"url\":\"\\/egy\\/page\\/home-page-8\",\"item_model\":\"custom\",\"children\":[]},{\"name\":\"Home Page 09\",\"url\":\"\\/egy\\/page\\/home-page-9\",\"item_model\":\"custom\",\"children\":[]}]},{\"name\":\"GIG\",\"url\":\"\\/egy\\/gig\",\"item_model\":\"custom\",\"model_name\":\"Custom\",\"children\":[{\"name\":\"Category Level 1\",\"url\":\"\\/egy\\/gig-cat\\/graphics-design\",\"item_model\":\"custom\"},{\"name\":\"Category Level 2\",\"url\":\"\\/egy\\/gig-cat\\/logo-design\",\"item_model\":\"custom\"},{\"name\":\"Gigs Listing\",\"url\":\"\\/egy\\/gig\",\"item_model\":\"custom\"},{\"name\":\"Gig Single\",\"url\":\"\\/egy\\/gig\\/i-will-quod-corrupti-veritatis\",\"item_model\":\"custom\"}]},{\"name\":\"Find Jobs\",\"url\":\"\\/egy\\/\",\"item_model\":\"custom\",\"model_name\":\"Custom\",\"children\":[{\"name\":\"Jobs Listing\",\"url\":\"\\/egy\\/job\",\"item_model\":\"custom\",\"children\":[{\"name\":\"Jobs Listing V1\",\"url\":\"\\/egy\\/job\",\"item_model\":\"custom\"},{\"name\":\"Jobs Listing V2\",\"url\":\"\\/egy\\/job?_layout=v2\",\"item_model\":\"custom\"},{\"name\":\"Jobs Listing V3\",\"url\":\"\\/egy\\/job?_layout=v3\",\"item_model\":\"custom\"},{\"name\":\"Jobs Listing V4\",\"url\":\"\\/egy\\/job?_layout=v4\",\"item_model\":\"custom\"},{\"name\":\"Jobs Listing V5\",\"url\":\"\\/egy\\/job?_layout=v5\",\"item_model\":\"custom\"},{\"name\":\"Jobs Listing V6\",\"url\":\"\\/egy\\/job?_layout=v6\",\"item_model\":\"custom\"},{\"name\":\"Jobs Listing V7\",\"url\":\"\\/egy\\/job?_layout=v7\",\"item_model\":\"custom\"},{\"name\":\"Jobs Listing V8\",\"url\":\"\\/egy\\/job?_layout=v8\",\"item_model\":\"custom\"},{\"name\":\"Jobs Listing V9\",\"url\":\"\\/egy\\/job?_layout=v9\",\"item_model\":\"custom\"}]},{\"name\":\"Job Single\",\"url\":\"\\/egy\\/job\\/product-designer-ui-designer\",\"item_model\":\"custom\",\"children\":[{\"name\":\"Job Single V1\",\"url\":\"\\/egy\\/job\\/product-designer-ui-designer\",\"item_model\":\"custom\"},{\"name\":\"Job Single V2\",\"url\":\"\\/egy\\/job\\/product-designer-ui-designer?_layout=v2\",\"item_model\":\"custom\"},{\"name\":\"Job Single V3\",\"url\":\"\\/egy\\/job\\/product-designer-ui-designer?_layout=v3\",\"item_model\":\"custom\"},{\"name\":\"Job Single V4\",\"url\":\"\\/egy\\/job\\/restaurant-team-member?_layout=v4\",\"item_model\":\"custom\"},{\"name\":\"Job Single V5\",\"url\":\"\\/egy\\/job\\/product-designer-ui-designer?_layout=v5\",\"item_model\":\"custom\"},{\"name\":\"Job \\u2013 Internal Apply\",\"url\":\"\\/egy\\/job\\/product-designer-ui-designer\",\"item_model\":\"custom\"},{\"name\":\"Job \\u2013 External Apply\",\"url\":\"\\/egy\\/job\\/software-engineer-android-lib\",\"item_model\":\"custom\"},{\"name\":\"Job \\u2013 Email Apply\",\"url\":\"\\/egy\\/job\\/group-marketing-manager\",\"item_model\":\"custom\"}]}]},{\"name\":\"Employers\",\"url\":\"\\/egy\\/\",\"item_model\":\"custom\",\"model_name\":\"Custom\",\"children\":[{\"name\":\"Employers List\",\"url\":\"\\/egy\\/companies\",\"item_model\":\"custom\",\"children\":[{\"name\":\"Employers Listing V1\",\"url\":\"\\/egy\\/companies?_layout=v1\",\"item_model\":\"custom\"},{\"name\":\"Employers Listing V2\",\"url\":\"\\/egy\\/companies?_layout=v2\",\"item_model\":\"custom\"},{\"name\":\"Employers Listing V3\",\"url\":\"\\/egy\\/companies?_layout=v3\",\"item_model\":\"custom\"},{\"name\":\"Employers Listing V4\",\"url\":\"\\/egy\\/companies?_layout=v4\",\"item_model\":\"custom\"}]},{\"name\":\"Employer Single\",\"url\":\"\\/egy\\/companies\\/netflix\",\"item_model\":\"custom\",\"children\":[{\"name\":\"Employer Single V1\",\"url\":\"\\/egy\\/companies\\/netflix?_layout=v1\",\"item_model\":\"custom\"},{\"name\":\"Employer Single V2\",\"url\":\"\\/egy\\/companies\\/netflix?_layout=v2\",\"item_model\":\"custom\"},{\"name\":\"Employer Single V3\",\"url\":\"\\/egy\\/companies\\/netflix?_layout=v3\",\"item_model\":\"custom\"}]}]},{\"name\":\"Candidates\",\"url\":\"\\/egy\\/\",\"item_model\":\"custom\",\"model_name\":\"Custom\",\"children\":[{\"name\":\"Candidates List\",\"url\":\"\\/egy\\/candidate\",\"item_model\":\"custom\",\"children\":[{\"name\":\"Candidates Listing V1\",\"url\":\"\\/egy\\/candidate?_layout=v1\",\"item_model\":\"custom\"},{\"name\":\"Candidates Listing V2\",\"url\":\"\\/egy\\/candidate?_layout=v2\",\"item_model\":\"custom\"},{\"name\":\"Candidates Listing V3\",\"url\":\"\\/egy\\/candidate?_layout=v3\",\"item_model\":\"custom\"},{\"name\":\"Candidates Listing V4\",\"url\":\"\\/egy\\/candidate?_layout=v4\",\"item_model\":\"custom\"},{\"name\":\"Candidates Listing V5\",\"url\":\"\\/egy\\/candidate?_layout=v5\",\"item_model\":\"custom\"}]},{\"name\":\"Candidates Single\",\"url\":\"\\/egy\\/candidate\\/ui-designer-at-invision-1\",\"item_model\":\"custom\",\"children\":[{\"name\":\"Candidate Single V1\",\"url\":\"\\/egy\\/candidate\\/ui-designer-at-invision-1\",\"item_model\":\"custom\"},{\"name\":\"Candidate Single V2\",\"url\":\"\\/egy\\/candidate\\/ui-designer-at-invision-1?_layout=v2\",\"item_model\":\"custom\"},{\"name\":\"Candidate Single V3\",\"url\":\"\\/egy\\/candidate\\/ui-designer-at-invision-1?_layout=v3\",\"item_model\":\"custom\"}]}]},{\"name\":\"Pages\",\"url\":\"\\/egy\\/\",\"item_model\":\"custom\",\"model_name\":\"Custom\",\"children\":[{\"name\":\"Blog List\",\"url\":\"\\/egy\\/news\",\"item_model\":\"custom\"},{\"name\":\"Blog Single\",\"url\":\"\\/egy\\/news\\/5-tips-for-your-job-interviews\",\"item_model\":\"custom\"},{\"name\":\"About Us\",\"url\":\"\\/egy\\/page\\/about\",\"item_model\":\"custom\",\"children\":[]},{\"name\":\"FAQ\'s\",\"url\":\"\\/egy\\/page\\/faqs\",\"item_model\":\"custom\",\"children\":[]},{\"name\":\"Terms\",\"url\":\"\\/egy\\/page\\/terms-and-conditions\",\"item_model\":\"custom\",\"children\":[]},{\"name\":\"Contact\",\"url\":\"\\/egy\\/contact\",\"item_model\":\"custom\",\"children\":[]}]}]', NULL, NULL, '2025-04-16 03:24:07', NULL);

INSERT INTO `core_menus` (`id`, `name`, `items`, `create_user`, `update_user`, `origin_id`, `lang`, `created_at`, `updated_at`) VALUES
(1, 'Main Menu', '[{\"name\":\"Home\",\"url\":\"\\/\",\"item_model\":\"custom\",\"model_name\":\"Custom\",\"children\":[{\"name\":\"Home Page 01\",\"url\":\"\\/\",\"item_model\":\"custom\",\"children\":[]},{\"name\":\"Home Page 02\",\"url\":\"\\/page\\/home-page-2\",\"item_model\":\"custom\",\"children\":[]},{\"name\":\"Home Page 03\",\"url\":\"\\/page\\/home-page-3\",\"item_model\":\"custom\",\"children\":[]},{\"name\":\"Home Page 04\",\"url\":\"\\/page\\/home-page-4\",\"item_model\":\"custom\",\"children\":[]},{\"name\":\"Home Page 05\",\"url\":\"\\/page\\/home-page-5\",\"item_model\":\"custom\",\"children\":[]},{\"name\":\"Home Page 06\",\"url\":\"\\/page\\/home-page-6\",\"item_model\":\"custom\",\"children\":[]},{\"name\":\"Home Page 07\",\"url\":\"\\/page\\/home-page-7\",\"item_model\":\"custom\",\"children\":[]},{\"name\":\"Home Page 08\",\"url\":\"\\/page\\/home-page-8\",\"item_model\":\"custom\",\"children\":[]},{\"name\":\"Home Page 09\",\"url\":\"\\/page\\/home-page-9\",\"item_model\":\"custom\",\"children\":[]}]},{\"name\":\"GIG\",\"url\":\"\\/gig\",\"item_model\":\"custom\",\"model_name\":\"Custom\",\"children\":[{\"name\":\"Category Level 1\",\"url\":\"\\/gig-cat\\/graphics-design\",\"item_model\":\"custom\"},{\"name\":\"Category Level 2\",\"url\":\"\\/gig-cat\\/logo-design\",\"item_model\":\"custom\"},{\"name\":\"Gigs Listing\",\"url\":\"\\/gig\",\"item_model\":\"custom\"},{\"name\":\"Gig Single\",\"url\":\"\\/gig\\/i-will-quod-corrupti-veritatis\",\"item_model\":\"custom\"}]},{\"name\":\"Find Jobs\",\"url\":\"\\/\",\"item_model\":\"custom\",\"model_name\":\"Custom\",\"children\":[{\"name\":\"Jobs Listing\",\"url\":\"\\/job\",\"item_model\":\"custom\",\"children\":[{\"name\":\"Jobs Listing V1\",\"url\":\"\\/job\",\"item_model\":\"custom\"},{\"name\":\"Jobs Listing V2\",\"url\":\"\\/job?_layout=v2\",\"item_model\":\"custom\"},{\"name\":\"Jobs Listing V3\",\"url\":\"\\/job?_layout=v3\",\"item_model\":\"custom\"},{\"name\":\"Jobs Listing V4\",\"url\":\"\\/job?_layout=v4\",\"item_model\":\"custom\"},{\"name\":\"Jobs Listing V5\",\"url\":\"\\/job?_layout=v5\",\"item_model\":\"custom\"},{\"name\":\"Jobs Listing V6\",\"url\":\"\\/job?_layout=v6\",\"item_model\":\"custom\"},{\"name\":\"Jobs Listing V7\",\"url\":\"\\/job?_layout=v7\",\"item_model\":\"custom\"},{\"name\":\"Jobs Listing V8\",\"url\":\"\\/job?_layout=v8\",\"item_model\":\"custom\"},{\"name\":\"Jobs Listing V9\",\"url\":\"\\/job?_layout=v9\",\"item_model\":\"custom\"}]},{\"name\":\"Job Single\",\"url\":\"\\/job\\/product-designer-ui-designer\",\"item_model\":\"custom\",\"children\":[{\"name\":\"Job Single V1\",\"url\":\"\\/job\\/product-designer-ui-designer\",\"item_model\":\"custom\"},{\"name\":\"Job Single V2\",\"url\":\"\\/job\\/product-designer-ui-designer?_layout=v2\",\"item_model\":\"custom\"},{\"name\":\"Job Single V3\",\"url\":\"\\/job\\/product-designer-ui-designer?_layout=v3\",\"item_model\":\"custom\"},{\"name\":\"Job Single V4\",\"url\":\"\\/job\\/restaurant-team-member?_layout=v4\",\"item_model\":\"custom\"},{\"name\":\"Job Single V5\",\"url\":\"\\/job\\/product-designer-ui-designer?_layout=v5\",\"item_model\":\"custom\"},{\"name\":\"Job \\u2013 Internal Apply\",\"url\":\"\\/job\\/product-designer-ui-designer\",\"item_model\":\"custom\"},{\"name\":\"Job \\u2013 External Apply\",\"url\":\"\\/job\\/software-engineer-android-lib\",\"item_model\":\"custom\"},{\"name\":\"Job \\u2013 Email Apply\",\"url\":\"\\/job\\/group-marketing-manager\",\"item_model\":\"custom\"}]}]},{\"name\":\"Employers\",\"url\":\"\\/\",\"item_model\":\"custom\",\"model_name\":\"Custom\",\"children\":[{\"name\":\"Employers List\",\"url\":\"\\/companies\",\"item_model\":\"custom\",\"children\":[{\"name\":\"Employers Listing V1\",\"url\":\"\\/companies?_layout=v1\",\"item_model\":\"custom\"},{\"name\":\"Employers Listing V2\",\"url\":\"\\/companies?_layout=v2\",\"item_model\":\"custom\"},{\"name\":\"Employers Listing V3\",\"url\":\"\\/companies?_layout=v3\",\"item_model\":\"custom\"},{\"name\":\"Employers Listing V4\",\"url\":\"\\/companies?_layout=v4\",\"item_model\":\"custom\"}]},{\"name\":\"Employer Single\",\"url\":\"\\/companies\\/netflix\",\"item_model\":\"custom\",\"children\":[{\"name\":\"Employer Single V1\",\"url\":\"\\/companies\\/netflix?_layout=v1\",\"item_model\":\"custom\"},{\"name\":\"Employer Single V2\",\"url\":\"\\/companies\\/netflix?_layout=v2\",\"item_model\":\"custom\"},{\"name\":\"Employer Single V3\",\"url\":\"\\/companies\\/netflix?_layout=v3\",\"item_model\":\"custom\"}]}]},{\"name\":\"Candidates\",\"url\":\"\\/\",\"item_model\":\"custom\",\"model_name\":\"Custom\",\"children\":[{\"name\":\"Candidates List\",\"url\":\"\\/candidate\",\"item_model\":\"custom\",\"children\":[{\"name\":\"Candidates Listing V1\",\"url\":\"\\/candidate?_layout=v1\",\"item_model\":\"custom\"},{\"name\":\"Candidates Listing V2\",\"url\":\"\\/candidate?_layout=v2\",\"item_model\":\"custom\"},{\"name\":\"Candidates Listing V3\",\"url\":\"\\/candidate?_layout=v3\",\"item_model\":\"custom\"},{\"name\":\"Candidates Listing V4\",\"url\":\"\\/candidate?_layout=v4\",\"item_model\":\"custom\"},{\"name\":\"Candidates Listing V5\",\"url\":\"\\/candidate?_layout=v5\",\"item_model\":\"custom\"}]},{\"name\":\"Candidates Single\",\"url\":\"\\/candidate\\/ui-designer-at-invision-1\",\"item_model\":\"custom\",\"children\":[{\"name\":\"Candidate Single V1\",\"url\":\"\\/candidate\\/ui-designer-at-invision-1\",\"item_model\":\"custom\"},{\"name\":\"Candidate Single V2\",\"url\":\"\\/candidate\\/ui-designer-at-invision-1?_layout=v2\",\"item_model\":\"custom\"},{\"name\":\"Candidate Single V3\",\"url\":\"\\/candidate\\/ui-designer-at-invision-1?_layout=v3\",\"item_model\":\"custom\"}]}]},{\"name\":\"Pages\",\"url\":\"\\/\",\"item_model\":\"custom\",\"model_name\":\"Custom\",\"children\":[{\"name\":\"Blog List\",\"url\":\"\\/news\",\"item_model\":\"custom\"},{\"name\":\"Blog Single\",\"url\":\"\\/news\\/5-tips-for-your-job-interviews\",\"item_model\":\"custom\"},{\"name\":\"About Us\",\"url\":\"\\/page\\/about\",\"item_model\":\"custom\",\"children\":[]},{\"name\":\"FAQ\'s\",\"url\":\"\\/page\\/faqs\",\"item_model\":\"custom\",\"children\":[]},{\"name\":\"Terms\",\"url\":\"\\/page\\/terms-and-conditions\",\"item_model\":\"custom\",\"children\":[]},{\"name\":\"Contact\",\"url\":\"\\/contact\",\"item_model\":\"custom\",\"children\":[]},{\"name\":\"Job Alert\",\"url\":\"\\/page\\/job-alert\",\"item_model\":\"custom\",\"children\":[]}]}]', NULL, NULL, NULL, NULL, '2025-04-16 03:24:07', NULL),
(2, 'Menu Utama', '[{\"id\":12,\"name\":\"Home\",\"class\":\"\",\"target\":\"\",\"item_model\":\"Modules\\\\Page\\\\Models\\\\Page\",\"origin_name\":\"Home Page 9\",\"model_name\":\"Page\",\"_open\":false,\"origin_edit_url\":\"http:\\/\\/127.0.0.1:8000\\/admin\\/module\\/page\\/edit\\/12\"},{\"id\":1,\"name\":\"About\",\"class\":\"\",\"target\":\"\",\"item_model\":\"Modules\\\\Page\\\\Models\\\\Page\",\"origin_name\":\"About\",\"model_name\":\"Page\",\"_open\":false,\"origin_edit_url\":\"http:\\/\\/127.0.0.1:8000\\/admin\\/module\\/page\\/edit\\/1\"},{\"id\":2,\"name\":\"Terms and Conditions\",\"class\":\"\",\"target\":\"\",\"item_model\":\"Modules\\\\Page\\\\Models\\\\Page\",\"origin_name\":\"Terms and Conditions\",\"model_name\":\"Page\",\"_open\":false,\"origin_edit_url\":\"http:\\/\\/127.0.0.1:8000\\/admin\\/module\\/page\\/edit\\/2\"},{\"id\":3,\"name\":\"FAQ\'s\",\"class\":\"\",\"target\":\"\",\"item_model\":\"Modules\\\\Page\\\\Models\\\\Page\",\"origin_name\":\"FAQ\'s\",\"model_name\":\"Page\",\"_open\":false,\"origin_edit_url\":\"http:\\/\\/127.0.0.1:8000\\/admin\\/module\\/page\\/edit\\/3\"},{\"id\":13,\"name\":\"Privacy policy\",\"class\":\"\",\"target\":\"\",\"item_model\":\"Modules\\\\Page\\\\Models\\\\Page\",\"origin_name\":\"Privacy policy\",\"model_name\":\"Page\",\"_open\":false,\"origin_edit_url\":\"http:\\/\\/127.0.0.1:8000\\/admin\\/module\\/page\\/edit\\/13\"}]', 15, 15, NULL, NULL, '2025-06-24 20:52:45', '2025-06-24 20:53:18');

INSERT INTO `core_news` (`id`, `title`, `content`, `slug`, `status`, `cat_id`, `image_id`, `banner_id`, `create_user`, `update_user`, `deleted_at`, `origin_id`, `lang`, `created_at`, `updated_at`) VALUES
(1, 'Attract Sales And Profits', '<h4>Course Description</h4>\r\n                            <p>Aliquam hendrerit sollicitudin purus, quis rutrum mi accumsan nec. Quisque bibendum orci ac nibh facilisis, at malesuada orci congue. Nullam tempus sollicitudin cursus. Ut et adipiscing erat. Curabitur this is a text link libero tempus congue.</p>\r\n                            <p>Duis mattis laoreet neque, et ornare neque sollicitudin at. Proin sagittis dolor sed mi elementum pretium. Donec et justo ante. Vivamus egestas sodales est, eu rhoncus urna semper eu. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Integer tristique elit lobortis purus bibendum, quis dictum metus mattis. Phasellus posuere felis sed eros porttitor mattis. Curabitur massa magna, tempor in blandit id, porta in ligula. Aliquam laoreet nisl massa, at interdum mauris sollicitudin et.</p>\r\n                            <p><img src=\"/uploads/demo/news/img-detail.jpg\" alt=\"\" width=\"770\" height=\"450\" /></p>\r\n                            <h4>Requirements</h4>\r\n                            <ul style=\"list-style-type: square;\">\r\n                            <li>We do not require any previous experience or pre-defined skills to take this course. A great orientation would be enough to master UI/UX design.</li>\r\n                            <li>A computer with a good internet connection.</li>\r\n                            <li>Adobe Photoshop (OPTIONAL)</li>\r\n                            </ul>', 'attract-sales-and-profits', 'publish', 1, 32, 165, 1, NULL, NULL, NULL, NULL, '2025-04-16 03:24:08', NULL),
(2, '5 Tips For Your Job Interviews', '<h4>Course Description</h4>\r\n                            <p>Aliquam hendrerit sollicitudin purus, quis rutrum mi accumsan nec. Quisque bibendum orci ac nibh facilisis, at malesuada orci congue. Nullam tempus sollicitudin cursus. Ut et adipiscing erat. Curabitur this is a text link libero tempus congue.</p>\r\n                            <p>Duis mattis laoreet neque, et ornare neque sollicitudin at. Proin sagittis dolor sed mi elementum pretium. Donec et justo ante. Vivamus egestas sodales est, eu rhoncus urna semper eu. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Integer tristique elit lobortis purus bibendum, quis dictum metus mattis. Phasellus posuere felis sed eros porttitor mattis. Curabitur massa magna, tempor in blandit id, porta in ligula. Aliquam laoreet nisl massa, at interdum mauris sollicitudin et.</p>\r\n                            <p><img src=\"/uploads/demo/news/img-detail.jpg\" alt=\"\" width=\"770\" height=\"450\" /></p>\r\n                            <h4>Requirements</h4>\r\n                            <ul style=\"list-style-type: square;\">\r\n                            <li>We do not require any previous experience or pre-defined skills to take this course. A great orientation would be enough to master UI/UX design.</li>\r\n                            <li>A computer with a good internet connection.</li>\r\n                            <li>Adobe Photoshop (OPTIONAL)</li>\r\n                            </ul>', '5-tips-for-your-job-interviews', 'publish', 1, 33, 165, 1, NULL, NULL, NULL, NULL, '2025-04-16 03:24:08', NULL),
(3, 'An Overworked Newspaper Editor', '<h4>Course Description</h4>\r\n                            <p>Aliquam hendrerit sollicitudin purus, quis rutrum mi accumsan nec. Quisque bibendum orci ac nibh facilisis, at malesuada orci congue. Nullam tempus sollicitudin cursus. Ut et adipiscing erat. Curabitur this is a text link libero tempus congue.</p>\r\n                            <p>Duis mattis laoreet neque, et ornare neque sollicitudin at. Proin sagittis dolor sed mi elementum pretium. Donec et justo ante. Vivamus egestas sodales est, eu rhoncus urna semper eu. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Integer tristique elit lobortis purus bibendum, quis dictum metus mattis. Phasellus posuere felis sed eros porttitor mattis. Curabitur massa magna, tempor in blandit id, porta in ligula. Aliquam laoreet nisl massa, at interdum mauris sollicitudin et.</p>\r\n                            <p><img src=\"/uploads/demo/news/img-detail.jpg\" alt=\"\" width=\"770\" height=\"450\" /></p>\r\n                            <h4>Requirements</h4>\r\n                            <ul style=\"list-style-type: square;\">\r\n                            <li>We do not require any previous experience or pre-defined skills to take this course. A great orientation would be enough to master UI/UX design.</li>\r\n                            <li>A computer with a good internet connection.</li>\r\n                            <li>Adobe Photoshop (OPTIONAL)</li>\r\n                            </ul>', 'an-overworked-newspaper-editor', 'publish', 1, 34, 165, 1, NULL, NULL, NULL, NULL, '2025-04-16 03:24:08', NULL),
(4, 'Attract Sales And Profits', '<h4>Course Description</h4>\r\n                            <p>Aliquam hendrerit sollicitudin purus, quis rutrum mi accumsan nec. Quisque bibendum orci ac nibh facilisis, at malesuada orci congue. Nullam tempus sollicitudin cursus. Ut et adipiscing erat. Curabitur this is a text link libero tempus congue.</p>\r\n                            <p>Duis mattis laoreet neque, et ornare neque sollicitudin at. Proin sagittis dolor sed mi elementum pretium. Donec et justo ante. Vivamus egestas sodales est, eu rhoncus urna semper eu. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Integer tristique elit lobortis purus bibendum, quis dictum metus mattis. Phasellus posuere felis sed eros porttitor mattis. Curabitur massa magna, tempor in blandit id, porta in ligula. Aliquam laoreet nisl massa, at interdum mauris sollicitudin et.</p>\r\n                            <p><img src=\"/uploads/demo/news/img-detail.jpg\" alt=\"\" width=\"770\" height=\"450\" /></p>\r\n                            <h4>Requirements</h4>\r\n                            <ul style=\"list-style-type: square;\">\r\n                            <li>We do not require any previous experience or pre-defined skills to take this course. A great orientation would be enough to master UI/UX design.</li>\r\n                            <li>A computer with a good internet connection.</li>\r\n                            <li>Adobe Photoshop (OPTIONAL)</li>\r\n                            </ul>', 'attract-sales-and-profits-2', 'publish', 4, 35, 165, 1, NULL, NULL, NULL, NULL, '2025-04-16 03:24:08', NULL),
(5, '5 Tips For Your Job Interviews', '<h4>Course Description</h4>\r\n                            <p>Aliquam hendrerit sollicitudin purus, quis rutrum mi accumsan nec. Quisque bibendum orci ac nibh facilisis, at malesuada orci congue. Nullam tempus sollicitudin cursus. Ut et adipiscing erat. Curabitur this is a text link libero tempus congue.</p>\r\n                            <p>Duis mattis laoreet neque, et ornare neque sollicitudin at. Proin sagittis dolor sed mi elementum pretium. Donec et justo ante. Vivamus egestas sodales est, eu rhoncus urna semper eu. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Integer tristique elit lobortis purus bibendum, quis dictum metus mattis. Phasellus posuere felis sed eros porttitor mattis. Curabitur massa magna, tempor in blandit id, porta in ligula. Aliquam laoreet nisl massa, at interdum mauris sollicitudin et.</p>\r\n                            <p><img src=\"/uploads/demo/news/img-detail.jpg\" alt=\"\" width=\"770\" height=\"450\" /></p>\r\n                            <h4>Requirements</h4>\r\n                            <ul style=\"list-style-type: square;\">\r\n                            <li>We do not require any previous experience or pre-defined skills to take this course. A great orientation would be enough to master UI/UX design.</li>\r\n                            <li>A computer with a good internet connection.</li>\r\n                            <li>Adobe Photoshop (OPTIONAL)</li>\r\n                            </ul>', '5-tips-for-your-job-interviews-2', 'publish', 3, 36, 165, 1, NULL, NULL, NULL, NULL, '2025-04-16 03:24:08', NULL),
(6, 'An Overworked Newspaper Editor', '<h4>Course Description</h4>\r\n                            <p>Aliquam hendrerit sollicitudin purus, quis rutrum mi accumsan nec. Quisque bibendum orci ac nibh facilisis, at malesuada orci congue. Nullam tempus sollicitudin cursus. Ut et adipiscing erat. Curabitur this is a text link libero tempus congue.</p>\r\n                            <p>Duis mattis laoreet neque, et ornare neque sollicitudin at. Proin sagittis dolor sed mi elementum pretium. Donec et justo ante. Vivamus egestas sodales est, eu rhoncus urna semper eu. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Integer tristique elit lobortis purus bibendum, quis dictum metus mattis. Phasellus posuere felis sed eros porttitor mattis. Curabitur massa magna, tempor in blandit id, porta in ligula. Aliquam laoreet nisl massa, at interdum mauris sollicitudin et.</p>\r\n                            <p><img src=\"/uploads/demo/news/img-detail.jpg\" alt=\"\" width=\"770\" height=\"450\" /></p>\r\n                            <h4>Requirements</h4>\r\n                            <ul style=\"list-style-type: square;\">\r\n                            <li>We do not require any previous experience or pre-defined skills to take this course. A great orientation would be enough to master UI/UX design.</li>\r\n                            <li>A computer with a good internet connection.</li>\r\n                            <li>Adobe Photoshop (OPTIONAL)</li>\r\n                            </ul>', 'an-overworked-newspaper-editor-2', 'publish', 1, 37, 165, 1, NULL, NULL, NULL, NULL, '2025-04-16 03:24:08', NULL);

INSERT INTO `core_news_category` (`id`, `name`, `content`, `slug`, `status`, `_lft`, `_rgt`, `parent_id`, `create_user`, `update_user`, `deleted_at`, `created_at`, `updated_at`, `origin_id`, `lang`) VALUES
(1, 'Education', NULL, 'education', 'publish', 1, 2, NULL, NULL, NULL, NULL, '2025-04-16 03:24:08', '2025-04-16 03:24:08', NULL, NULL),
(2, 'Information', NULL, 'information', 'publish', 3, 4, NULL, NULL, NULL, NULL, '2025-04-16 03:24:08', '2025-04-16 03:24:08', NULL, NULL),
(3, 'Interview', NULL, 'interview', 'publish', 5, 6, NULL, NULL, NULL, NULL, '2025-04-16 03:24:08', '2025-04-16 03:24:08', NULL, NULL),
(4, 'Job Seeking', NULL, 'job-seeking', 'publish', 7, 8, NULL, NULL, NULL, NULL, '2025-04-16 03:24:08', '2025-04-16 03:24:08', NULL, NULL),
(5, 'Jobs', NULL, 'jobs', 'publish', 9, 10, NULL, NULL, NULL, NULL, '2025-04-16 03:24:08', '2025-04-16 03:24:08', NULL, NULL),
(6, 'Learn', NULL, 'learn', 'publish', 11, 12, NULL, NULL, NULL, NULL, '2025-04-16 03:24:08', '2025-04-16 03:24:08', NULL, NULL),
(7, 'Skill', NULL, 'skill', 'publish', 13, 14, NULL, NULL, NULL, NULL, '2025-04-16 03:24:08', '2025-04-16 03:24:08', NULL, NULL),
(8, 'Travel', NULL, 'travel', 'publish', 15, 16, NULL, NULL, NULL, NULL, '2025-04-16 03:24:08', '2025-04-16 03:24:08', NULL, NULL);

INSERT INTO `core_news_tag` (`id`, `news_id`, `tag_id`, `create_user`, `update_user`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, NULL, NULL, NULL, NULL),
(2, 1, 4, 1, NULL, NULL, NULL, NULL),
(3, 1, 3, 1, NULL, NULL, NULL, NULL),
(4, 2, 2, 1, NULL, NULL, NULL, NULL),
(5, 2, 1, 1, NULL, NULL, NULL, NULL),
(6, 2, 3, 1, NULL, NULL, NULL, NULL),
(7, 3, 6, 1, NULL, NULL, NULL, NULL),
(8, 3, 3, 1, NULL, NULL, NULL, NULL),
(9, 3, 5, 1, NULL, NULL, NULL, NULL),
(10, 4, 6, 1, NULL, NULL, NULL, NULL),
(11, 4, 4, 1, NULL, NULL, NULL, NULL),
(12, 4, 1, 1, NULL, NULL, NULL, NULL),
(13, 5, 4, 1, NULL, NULL, NULL, NULL),
(14, 5, 3, 1, NULL, NULL, NULL, NULL),
(15, 5, 1, 1, NULL, NULL, NULL, NULL),
(16, 6, 5, 1, NULL, NULL, NULL, NULL),
(17, 6, 6, 1, NULL, NULL, NULL, NULL),
(18, 6, 3, 1, NULL, NULL, NULL, NULL);

INSERT INTO `core_pages` (`id`, `slug`, `title`, `content`, `short_desc`, `status`, `publish_date`, `image_id`, `template_id`, `show_template`, `header_style`, `footer_style`, `create_user`, `update_user`, `deleted_at`, `origin_id`, `lang`, `created_at`, `updated_at`, `custom_logo`) VALUES
(1, 'about', 'About', NULL, NULL, 'publish', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-04-16 03:24:08', NULL, NULL),
(2, 'terms-and-conditions', 'Terms and Conditions', '\r\n                <h3>1. Terms</h3>\r\n<p>Pharetra nulla ullamcorper sit lectus. Fermentum mauris pellentesque nec nibh sed et, vel diam, massa. Placerat quis vel fames interdum urna lobortis sagittis sed pretium. Aliquam eget posuere sit enim elementum nulla vulputate magna. Morbi sed arcu proin quis tortor non risus.</p>\r\n<p>Elementum lectus a porta commodo suspendisse arcu, aliquam lectus faucibus. Nisl malesuada tortor, ligula aliquet felis vitae enim. Mi augue aliquet mauris non elementum tincidunt eget facilisi. Pellentesque massa ipsum tempus vel aliquam massa eu pulvinar eget.</p>\r\n<p>&nbsp;</p>\r\n<h3>2. Limitations</h3>\r\n<p>Pharetra nulla ullamcorper sit lectus. Fermentum mauris pellentesque nec nibh sed et, vel diam, massa. Placerat quis vel fames interdum urna lobortis sagittis sed pretium. Aliquam eget posuere sit enim elementum nulla vulputate magna. Morbi sed arcu proin quis tortor non risus.</p>\r\n<p>Elementum lectus a porta commodo suspendisse arcu, aliquam lectus faucibus. Nisl malesuada tortor, ligula aliquet felis vitae enim. Mi augue aliquet mauris non elementum tincidunt eget facilisi. Pellentesque massa ipsum tempus vel aliquam massa eu pulvinar eget.</p>\r\n<p>&nbsp;</p>\r\n<h3>3. Revisions and Errata</h3>\r\n<p>Pharetra nulla ullamcorper sit lectus. Fermentum mauris pellentesque nec nibh sed et, vel diam, massa. Placerat quis vel fames interdum urna lobortis sagittis sed pretium. Aliquam eget posuere sit enim elementum nulla vulputate magna. Morbi sed arcu proin quis tortor non risus.</p>\r\n<p>Elementum lectus a porta commodo suspendisse arcu, aliquam lectus faucibus. Nisl malesuada tortor, ligula aliquet felis vitae enim. Mi augue aliquet mauris non elementum tincidunt eget facilisi. Pellentesque massa ipsum tempus vel aliquam massa eu pulvinar eget.</p>\r\n<p>&nbsp;</p>\r\n<h3>4. Site Terms of Use Modifications</h3>\r\n<p>Pharetra nulla ullamcorper sit lectus. Fermentum mauris pellentesque nec nibh sed et, vel diam, massa. Placerat quis vel fames interdum urna lobortis sagittis sed pretium. Aliquam eget posuere sit enim elementum nulla vulputate magna. Morbi sed arcu proin quis tortor non risus.</p>\r\n<p>Elementum lectus a porta commodo suspendisse arcu, aliquam lectus faucibus. Nisl malesuada tortor, ligula aliquet felis vitae enim. Mi augue aliquet mauris non elementum tincidunt eget facilisi. Pellentesque massa ipsum tempus vel aliquam massa eu pulvinar eget.</p>\r\n            ', NULL, 'publish', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-04-16 03:24:08', NULL, NULL),
(3, 'faqs', 'FAQ\'s', NULL, NULL, 'publish', NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-04-16 03:24:08', NULL, NULL),
(4, 'home-page-1', 'Home Page 1', NULL, NULL, 'publish', NULL, NULL, 3, NULL, 'transparent', 'style_1', NULL, NULL, NULL, NULL, NULL, '2025-04-16 03:24:08', NULL, NULL),
(5, 'home-page-2', 'Home Page 2', NULL, NULL, 'publish', NULL, NULL, 4, NULL, 'header-style-two', 'style-two', NULL, NULL, NULL, NULL, NULL, '2025-04-16 03:24:08', NULL, NULL),
(6, 'home-page-3', 'Home Page 3', NULL, NULL, 'publish', NULL, NULL, 5, NULL, 'transparent', 'alternate', NULL, NULL, NULL, NULL, NULL, '2025-04-16 03:24:08', NULL, NULL),
(7, 'home-page-4', 'Home Page 4', NULL, NULL, 'publish', NULL, NULL, 6, NULL, 'header-style-two', 'style-two', NULL, NULL, NULL, NULL, NULL, '2025-04-16 03:24:08', NULL, NULL),
(8, 'home-page-5', 'Home Page 5', NULL, NULL, 'publish', NULL, NULL, 7, NULL, 'normal', 'style_1', NULL, NULL, NULL, NULL, NULL, '2025-04-16 03:24:08', NULL, NULL),
(9, 'home-page-6', 'Home Page 6', NULL, NULL, 'publish', NULL, NULL, 8, NULL, 'normal', 'style_1', NULL, NULL, NULL, NULL, NULL, '2025-04-16 03:24:08', NULL, NULL),
(10, 'home-page-7', 'Home Page 7', NULL, NULL, 'publish', NULL, NULL, 9, NULL, 'normal', 'alternate3', NULL, NULL, NULL, NULL, NULL, '2025-04-16 03:24:08', NULL, NULL),
(11, 'home-page-8', 'Home Page 8', NULL, NULL, 'publish', NULL, NULL, 10, NULL, 'transparent', 'style_1', NULL, NULL, NULL, NULL, NULL, '2025-04-16 03:24:08', NULL, NULL),
(12, 'home-page-9', 'Home Page 9', NULL, NULL, 'publish', NULL, NULL, 11, NULL, 'header-style-two', 'style-six', NULL, NULL, NULL, NULL, NULL, '2025-04-16 03:24:08', NULL, NULL),
(13, 'privacy-policy', 'Privacy policy', '<h1>Privacy policy</h1>\n<p> This privacy policy (\"Policy\") describes how the personally identifiable information (\"Personal Information\") you may provide on the <a target=\"_blank\" href=\"http://superio.test\" rel=\"noreferrer noopener\">superio.test</a> website (\"Website\" or \"Service\") and any of its related products and services (collectively, \"Services\") is collected, protected and used. It also describes the choices available to you regarding our use of your Personal Information and how you can access and update this information. This Policy is a legally binding agreement between you (\"User\", \"you\" or \"your\") and this Website operator (\"Operator\", \"we\", \"us\" or \"our\"). By accessing and using the Website and Services, you acknowledge that you have read, understood, and agree to be bound by the terms of this Agreement. This Policy does not apply to the practices of companies that we do not own or control, or to individuals that we do not employ or manage.</p>\n<h2>Automatic collection of information</h2>\n<p>When you open the Website, our servers automatically record information that your browser sends. This data may include information such as your device\'s IP address, browser type and version, operating system type and version, language preferences or the webpage you were visiting before you came to the Website and Services, pages of the Website and Services that you visit, the time spent on those pages, information you search for on the Website, access times and dates, and other statistics.</p>\n<p>Information collected automatically is used only to identify potential cases of abuse and establish statistical information regarding the usage and traffic of the Website and Services. This statistical information is not otherwise aggregated in such a way that would identify any particular user of the system.</p>\n<h2>Collection of personal information</h2>\n<p>You can access and use the Website and Services without telling us who you are or revealing any information by which someone could identify you as a specific, identifiable individual. If, however, you wish to use some of the features on the Website, you may be asked to provide certain Personal Information (for example, your name and e-mail address). We receive and store any information you knowingly provide to us when you create an account, publish content,  or fill any online forms on the Website. When required, this information may include the following:</p>\n<ul><li>Personal details such as name, country of residence, etc.</li>\n<li>Contact information such as email address, address, etc.</li>\n<li>Account details such as user name, unique user ID, password, etc.</li>\n<li>Information about other individuals such as your family members, friends, etc.</li>\n</ul><p>Some of the information we collect is directly from you via the Website and Services. However, we may also collect Personal Information about you from other sources such as public databases and our joint marketing partners. You can choose not to provide us with your Personal Information, but then you may not be able to take advantage of some of the features on the Website. Users who are uncertain about what information is mandatory are welcome to contact us.</p>\n<h2>Use and processing of collected information</h2>\n<p>In order to make the Website and Services available to you, or to meet a legal obligation, we need to collect and use certain Personal Information. If you do not provide the information that we request, we may not be able to provide you with the requested products or services. Any of the information we collect from you may be used for the following purposes:</p>\n<ul><li>Create and manage user accounts</li>\n<li>Send administrative information</li>\n<li>Request user feedback</li>\n<li>Improve user experience</li>\n<li>Enforce terms and conditions and policies</li>\n<li>Run and operate the Website and Services</li>\n</ul><p>Processing your Personal Information depends on how you interact with the Website and Services, where you are located in the world and if one of the following applies: (i) you have given your consent for one or more specific purposes; this, however, does not apply, whenever the processing of Personal Information is subject to European data protection law; (ii) provision of information is necessary for the performance of an agreement with you and/or for any pre-contractual obligations thereof; (iii) processing is necessary for compliance with a legal obligation to which you are subject; (iv) processing is related to a task that is carried out in the public interest or in the exercise of official authority vested in us; (v) processing is necessary for the purposes of the legitimate interests pursued by us or by a third party.</p>\n<p> Note that under some legislations we may be allowed to process information until you object to such processing (by opting out), without having to rely on consent or any other of the following legal bases below. In any case, we will be happy to clarify the specific legal basis that applies to the processing, and in particular whether the provision of Personal Information is a statutory or contractual requirement, or a requirement necessary to enter into a contract.</p>\n<h2>Managing information</h2>\n<p>You are able to delete certain Personal Information we have about you. The Personal Information you can delete may change as the Website and Services change. When you delete Personal Information, however, we may maintain a copy of the unrevised Personal Information in our records for the duration necessary to comply with our obligations to our affiliates and partners, and for the purposes described below. If you would like to delete your Personal Information or permanently delete your account, you can do so by contacting us.</p>\n<h2>Disclosure of information</h2>\n<p> Depending on the requested Services or as necessary to complete any transaction or provide any service you have requested, we may share your information with your consent with our trusted third parties that work with us, any other affiliates and subsidiaries we rely upon to assist in the operation of the Website and Services available to you. We do not share Personal Information with unaffiliated third parties. These service providers are not authorized to use or disclose your information except as necessary to perform services on our behalf or comply with legal requirements. We may share your Personal Information for these purposes only with third parties whose privacy policies are consistent with ours or who agree to abide by our policies with respect to Personal Information. These third parties are given Personal Information they need only in order to perform their designated functions, and we do not authorize them to use or disclose Personal Information for their own marketing or other purposes.</p>\n<p>We will disclose any Personal Information we collect, use or receive if required or permitted by law, such as to comply with a subpoena, or similar legal process, and when we believe in good faith that disclosure is necessary to protect our rights, protect your safety or the safety of others, investigate fraud, or respond to a government request.</p>\n<h2>Retention of information</h2>\n<p>We will retain and use your Personal Information for the period necessary to comply with our legal obligations, resolve disputes, and enforce our agreements unless a longer retention period is required or permitted by law. We may use any aggregated data derived from or incorporating your Personal Information after you update or delete it, but not in a manner that would identify you personally. Once the retention period expires, Personal Information shall be deleted. Therefore, the right to access, the right to erasure, the right to rectification and the right to data portability cannot be enforced after the expiration of the retention period.</p>\n<h2>The rights of users</h2>\n<p>You may exercise certain rights regarding your information processed by us. In particular, you have the right to do the following: (i) you have the right to withdraw consent where you have previously given your consent to the processing of your information; (ii) you have the right to object to the processing of your information if the processing is carried out on a legal basis other than consent; (iii) you have the right to learn if information is being processed by us, obtain disclosure regarding certain aspects of the processing and obtain a copy of the information undergoing processing; (iv) you have the right to verify the accuracy of your information and ask for it to be updated or corrected; (v) you have the right, under certain circumstances, to restrict the processing of your information, in which case, we will not process your information for any purpose other than storing it; (vi) you have the right, under certain circumstances, to obtain the erasure of your Personal Information from us; (vii) you have the right to receive your information in a structured, commonly used and machine readable format and, if technically feasible, to have it transmitted to another controller without any hindrance. This provision is applicable provided that your information is processed by automated means and that the processing is based on your consent, on a contract which you are part of or on pre-contractual obligations thereof.</p>\n<h2>Privacy of children</h2>\n<p>We do not knowingly collect any Personal Information from children under the age of 18. If you are under the age of 18, please do not submit any Personal Information through the Website and Services. We encourage parents and legal guardians to monitor their children\'s Internet usage and to help enforce this Policy by instructing their children never to provide Personal Information through the Website and Services without their permission. If you have reason to believe that a child under the age of 18 has provided Personal Information to us through the Website and Services, please contact us. You must also be old enough to consent to the processing of your Personal Information in your country (in some countries we may allow your parent or guardian to do so on your behalf).</p>\n<h2>Cookies</h2>\n<p>The Website and Services use \"cookies\" to help personalize your online experience. A cookie is a text file that is placed on your hard disk by a web page server. Cookies cannot be used to run programs or deliver viruses to your computer. Cookies are uniquely assigned to you, and can only be read by a web server in the domain that issued the cookie to you.</p>\n<p>We may use cookies to collect, store, and track information for statistical purposes to operate the Website and Services. You have the ability to accept or decline cookies. Most web browsers automatically accept cookies, but you can usually modify your browser setting to decline cookies if you prefer. To learn more about cookies and how to manage them, visit <a target=\"_blank\" href=\"https://www.internetcookies.org\" rel=\"noreferrer noopener\">internetcookies.org</a></p>\n<h2>Do Not Track signals</h2>\n<p>Some browsers incorporate a Do Not Track feature that signals to websites you visit that you do not want to have your online activity tracked. Tracking is not the same as using or collecting information in connection with a website. For these purposes, tracking refers to collecting personally identifiable information from consumers who use or visit a website or online service as they move across different websites over time. How browsers communicate the Do Not Track signal is not yet uniform. As a result, the Website and Services are not yet set up to interpret or respond to Do Not Track signals communicated by your browser. Even so, as described in more detail throughout this Policy, we limit our use and collection of your personal information.</p>\n<h2>Email marketing</h2>\n<p>We offer electronic newsletters to which you may voluntarily subscribe at any time. We are committed to keeping your e-mail address confidential and will not disclose your email address to any third parties except as allowed in the information use and processing section or for the purposes of utilizing a third party provider to send such emails. We will maintain the information sent via e-mail in accordance with applicable laws and regulations.</p>\n<p>In compliance with the CAN-SPAM Act, all e-mails sent from us will clearly state who the e-mail is from and provide clear information on how to contact the sender. You may choose to stop receiving our newsletter or marketing emails by following the unsubscribe instructions included in these emails or by contacting us. However, you will continue to receive essential transactional emails.</p>\n<h2>Links to other resources</h2>\n<p>The Website and Services contain links to other resources that are not owned or controlled by us. Please be aware that we are not responsible for the privacy practices of such other resources or third parties. We encourage you to be aware when you leave the Website and Services and to read the privacy statements of each and every resource that may collect Personal Information.</p>\n<h2>Information security</h2>\n<p>We secure information you provide on computer servers in a controlled, secure environment, protected from unauthorized access, use, or disclosure. We maintain reasonable administrative, technical, and physical safeguards in an effort to protect against unauthorized access, use, modification, and disclosure of Personal Information in its control and custody. However, no data transmission over the Internet or wireless network can be guaranteed. Therefore, while we strive to protect your Personal Information, you acknowledge that (i) there are security and privacy limitations of the Internet which are beyond our control; (ii) the security, integrity, and privacy of any and all information and data exchanged between you and the Website and Services cannot be guaranteed; and (iii) any such information and data may be viewed or tampered with in transit by a third party, despite best efforts.</p>\n<h2>Data breach</h2>\n<p>In the event we become aware that the security of the Website and Services has been compromised or users Personal Information has been disclosed to unrelated third parties as a result of external activity, including, but not limited to, security attacks or fraud, we reserve the right to take reasonably appropriate measures, including, but not limited to, investigation and reporting, as well as notification to and cooperation with law enforcement authorities. In the event of a data breach, we will make reasonable efforts to notify affected individuals if we believe that there is a reasonable risk of harm to the user as a result of the breach or if notice is otherwise required by law. When we do, we will post a notice on the Website, send you an email.</p>\n<h2>Changes and amendments</h2>\n<p>We reserve the right to modify this Policy or its terms relating to the Website and Services from time to time in our discretion and will notify you of any material changes to the way in which we treat Personal Information. When we do, we will post a notification on the main page of the Website. We may also provide notice to you in other ways in our discretion, such as through contact information you have provided. Any updated version of this Policy will be effective immediately upon the posting of the revised Policy unless otherwise specified. Your continued use of the Website and Services after the effective date of the revised Policy (or such other act specified at that time) will constitute your consent to those changes. However, we will not, without your consent, use your Personal Information in a manner materially different than what was stated at the time your Personal Information was collected. Policy was created with <a style=\"color:inherit;\" target=\"_blank\" href=\"https://www.websitepolicies.com/privacy-policy-generator\" rel=\"noreferrer noopener\">WebsitePolicies</a>.</p>\n<h2>Acceptance of this policy</h2>\n<p>You acknowledge that you have read this Policy and agree to all its terms and conditions. By accessing and using the Website and Services you agree to be bound by this Policy. If you do not agree to abide by the terms of this Policy, you are not authorized to access or use the Website and Services.</p>\n<h2>Contacting us</h2>\n<p>If you would like to contact us to understand more about this Policy or wish to contact us concerning any matter relating to individual rights and your Personal Information, you may do so via the <a target=\"_blank\" href=\"http://superio.test/contact\" rel=\"noreferrer noopener\">contact form</a></p>\n<p>This document was last updated on October 6, 2020</p>', NULL, 'publish', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-04-16 03:24:08', '2025-04-16 03:24:08', NULL),
(14, 'job-alerts', 'Job Alerts', NULL, NULL, 'publish', NULL, NULL, 12, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-04-16 03:24:08', '2025-04-16 03:24:08', NULL);

INSERT INTO `core_role_permissions` (`id`, `role_id`, `permission`, `create_user`, `update_user`, `created_at`, `updated_at`) VALUES
(1, 1, 'gig_manage', NULL, NULL, '2025-04-16 03:24:01', '2025-04-16 03:24:01'),
(2, 1, 'gig_manage_others', NULL, NULL, '2025-04-16 03:24:01', '2025-04-16 03:24:01'),
(3, 1, 'candidate_manage', NULL, NULL, '2025-04-16 03:24:01', '2025-04-16 03:24:01'),
(4, 1, 'candidate_manage_others', NULL, NULL, '2025-04-16 03:24:01', '2025-04-16 03:24:01'),
(5, 1, 'employer_manage', NULL, NULL, '2025-04-16 03:24:01', '2025-04-16 03:24:01'),
(6, 1, 'employer_manage_others', NULL, NULL, '2025-04-16 03:24:01', '2025-04-16 03:24:01'),
(7, 1, 'job_manage', NULL, NULL, '2025-04-16 03:24:01', '2025-04-16 03:24:01'),
(8, 1, 'job_manage_others', NULL, NULL, '2025-04-16 03:24:01', '2025-04-16 03:24:01'),
(9, 1, 'skill_manage_others', NULL, NULL, '2025-04-16 03:24:01', '2025-04-16 03:24:01'),
(10, 1, 'category_manage_others', NULL, NULL, '2025-04-16 03:24:01', '2025-04-16 03:24:01'),
(11, 1, 'page_manage', NULL, NULL, '2025-04-16 03:24:01', '2025-04-16 03:24:01'),
(12, 1, 'page_manage_others', NULL, NULL, '2025-04-16 03:24:01', '2025-04-16 03:24:01'),
(13, 1, 'news_manage', NULL, NULL, '2025-04-16 03:24:01', '2025-04-16 03:24:01'),
(14, 1, 'news_manage_others', NULL, NULL, '2025-04-16 03:24:01', '2025-04-16 03:24:01'),
(15, 1, 'review_manage', NULL, NULL, '2025-04-16 03:24:01', '2025-04-16 03:24:01'),
(16, 1, 'review_manage_others', NULL, NULL, '2025-04-16 03:24:01', '2025-04-16 03:24:01'),
(17, 1, 'location_manage', NULL, NULL, '2025-04-16 03:24:01', '2025-04-16 03:24:01'),
(18, 1, 'setting_update', NULL, NULL, '2025-04-16 03:24:01', '2025-04-16 03:24:01'),
(19, 1, 'media_upload', NULL, NULL, '2025-04-16 03:24:01', '2025-04-16 03:24:01'),
(20, 1, 'media_manage_others', NULL, NULL, '2025-04-16 03:24:01', '2025-04-16 03:24:01'),
(21, 1, 'tools_view', NULL, NULL, '2025-04-16 03:24:01', '2025-04-16 03:24:01'),
(22, 1, 'language_manage', NULL, NULL, '2025-04-16 03:24:01', '2025-04-16 03:24:01'),
(23, 1, 'language_translation', NULL, NULL, '2025-04-16 03:24:01', '2025-04-16 03:24:01'),
(24, 1, 'role_manage', NULL, NULL, '2025-04-16 03:24:01', '2025-04-16 03:24:01'),
(25, 1, 'user_manage', NULL, NULL, '2025-04-16 03:24:01', '2025-04-16 03:24:01'),
(26, 1, 'system_log_view', NULL, NULL, '2025-04-16 03:24:01', '2025-04-16 03:24:01'),
(27, 1, 'plugin_manage', NULL, NULL, '2025-04-16 03:24:01', '2025-04-16 03:24:01'),
(28, 1, 'menu_manage', NULL, NULL, '2025-04-16 03:24:01', '2025-04-16 03:24:01'),
(29, 1, 'report_view', NULL, NULL, '2025-04-16 03:24:01', '2025-04-16 03:24:01'),
(30, 1, 'template_manage', NULL, NULL, '2025-04-16 03:24:01', '2025-04-16 03:24:01'),
(31, 1, 'contact_manage', NULL, NULL, '2025-04-16 03:24:02', '2025-04-16 03:24:02'),
(32, 1, 'newsletter_manage', NULL, NULL, '2025-04-16 03:24:02', '2025-04-16 03:24:02'),
(33, 1, 'setting_manage', NULL, NULL, '2025-04-16 03:24:02', '2025-04-16 03:24:02'),
(34, 1, 'dashboard_vendor_access', NULL, NULL, '2025-04-16 03:24:02', '2025-04-16 03:24:02'),
(35, 1, 'admin_payout_manage', NULL, NULL, '2025-04-16 03:24:02', '2025-04-16 03:24:02'),
(36, 1, 'candidate_payout_manage', NULL, NULL, '2025-04-16 03:24:02', '2025-04-16 03:24:02'),
(37, 1, 'theme_manage', NULL, NULL, '2025-04-16 03:24:02', '2025-04-16 03:24:02'),
(38, 2, 'job_manage', NULL, NULL, '2025-04-16 03:24:02', '2025-04-16 03:24:02'),
(39, 2, 'employer_manage', NULL, NULL, '2025-04-16 03:24:02', '2025-04-16 03:24:02'),
(40, 2, 'media_upload', NULL, NULL, '2025-04-16 03:24:02', '2025-04-16 03:24:02'),
(41, 3, 'candidate_manage', NULL, NULL, '2025-04-16 03:24:02', '2025-04-16 03:24:02'),
(42, 3, 'media_upload', NULL, NULL, '2025-04-16 03:24:02', '2025-04-16 03:24:02'),
(43, 3, 'gig_manage', NULL, NULL, '2025-04-16 03:24:02', '2025-04-16 03:24:02'),
(44, 3, 'candidate_payout_manage', NULL, NULL, '2025-04-16 03:55:18', '2025-04-16 03:55:18');

INSERT INTO `core_roles` (`id`, `name`, `code`, `create_user`, `update_user`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'administrator', NULL, NULL, NULL, '2025-04-16 03:24:01', '2025-04-16 03:24:01'),
(2, 'Employer', 'employer', NULL, NULL, NULL, '2025-04-16 03:24:02', '2025-04-16 03:24:02'),
(3, 'Candidate', 'candidate', NULL, NULL, NULL, '2025-04-16 03:24:02', '2025-04-16 03:24:02');

INSERT INTO `core_settings` (`id`, `name`, `group`, `val`, `autoload`, `create_user`, `update_user`, `lang`, `created_at`, `updated_at`) VALUES
(1, 'site_locale', 'general', 'en', NULL, 15, NULL, NULL, NULL, '2025-04-16 04:21:51'),
(2, 'site_enable_multi_lang', 'general', '1', NULL, 15, NULL, NULL, NULL, '2025-04-16 04:21:51'),
(3, 'enable_rtl_egy', 'general', '1', NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'menu_locations', NULL, '{\"primary\":2}', NULL, 15, 15, NULL, NULL, '2025-06-24 20:52:53'),
(5, 'admin_email', NULL, 'support@superio.com', NULL, NULL, NULL, NULL, NULL, NULL),
(6, 'email_from_name', NULL, 'Superio', NULL, NULL, NULL, NULL, NULL, NULL),
(7, 'email_from_address', NULL, 'support@superio.com', NULL, NULL, NULL, NULL, NULL, NULL),
(8, 'logo_id', NULL, '8', NULL, 15, NULL, NULL, NULL, '2025-04-16 04:21:51'),
(9, 'logo_white_id', NULL, '9', NULL, 15, NULL, NULL, NULL, '2025-04-16 04:21:51'),
(10, 'site_favicon', NULL, '11', NULL, 15, NULL, NULL, NULL, '2025-04-16 04:21:51'),
(11, 'footer_style', NULL, 'style_1', NULL, 15, NULL, NULL, NULL, '2025-04-16 04:21:51'),
(12, 'footer_info_text', NULL, '<p class=\"phone-num\"><span>Call us </span><a href=\"tel:123 456 7890\">123 456 7890</a></p>\r\n                                <p class=\"address\">329 Queensberry Street, North Melbourne VIC<br> 3051, Australia. <br>\r\n                                    <a href=\"mailto:support@superio.com\" class=\"email\">support@superio.com</a>\r\n                                </p>', NULL, 15, NULL, NULL, NULL, '2025-04-16 04:21:51'),
(13, 'copyright', NULL, '<p>&copy; 2021 <a href=\"/\">Superio</a>. All Right Reserved.</p>', NULL, 15, NULL, NULL, NULL, '2025-04-16 04:21:51'),
(14, 'footer_socials', NULL, '<a href=\"#\"><i class=\"fab fa-facebook-f\"></i></a>\r\n                                <a href=\"#\"><i class=\"fab fa-twitter\"></i></a>\r\n                                <a href=\"#\"><i class=\"fab fa-instagram\"></i></a>\r\n                                <a href=\"#\"><i class=\"fab fa-linkedin-in\"></i></a>', NULL, 15, NULL, NULL, NULL, '2025-04-16 04:21:51'),
(15, 'list_widget_footer', NULL, '[{\"title\":\"For Candidates\",\"size\":\"3\",\"content\":\"<ul class=\\\"list\\\">\\r\\n                                            <li><a href=\\\"#\\\">Browse Jobs<\\/a><\\/li>\\r\\n                                            <li><a href=\\\"#\\\">Browse Categories<\\/a><\\/li>\\r\\n                                            <li><a href=\\\"#\\\">Candidate Dashboard<\\/a><\\/li>\\r\\n                                            <li><a href=\\\"#\\\">Job Alerts<\\/a><\\/li>\\r\\n                                            <li><a href=\\\"#\\\">My Bookmarks<\\/a><\\/li>\\r\\n                                        <\\/ul>\"},{\"title\":\"For Employers\",\"size\":\"3\",\"content\":\"<ul class=\\\"list\\\">\\r\\n                                            <li><a href=\\\"#\\\">Browse Candidates<\\/a><\\/li>\\r\\n                                            <li><a href=\\\"#\\\">Employer Dashboard<\\/a><\\/li>\\r\\n                                            <li><a href=\\\"#\\\">Add Job<\\/a><\\/li>\\r\\n                                            <li><a href=\\\"#\\\">Job Packages<\\/a><\\/li>\\r\\n                                        <\\/ul>\"},{\"title\":\"About Us\",\"size\":\"3\",\"content\":\"<ul class=\\\"list\\\">\\r\\n                                            <li><a href=\\\"#\\\">Job Page<\\/a><\\/li>\\r\\n                                            <li><a href=\\\"#\\\">Job Page Alternative<\\/a><\\/li>\\r\\n                                            <li><a href=\\\"#\\\">Resume Page<\\/a><\\/li>\\r\\n                                            <li><a href=\\\"#\\\">Blog<\\/a><\\/li>\\r\\n                                            <li><a href=\\\"#\\\">Contact<\\/a><\\/li>\\r\\n                                        <\\/ul>\"},{\"title\":\"Helpful Resources\",\"size\":\"3\",\"content\":\"<ul class=\\\"list\\\">\\r\\n                                            <li><a href=\\\"#\\\">Site Map<\\/a><\\/li>\\r\\n                                            <li><a href=\\\"#\\\">Terms of Use<\\/a><\\/li>\\r\\n                                            <li><a href=\\\"#\\\">Privacy Center<\\/a><\\/li>\\r\\n                                            <li><a href=\\\"#\\\">Security Center<\\/a><\\/li>\\r\\n                                            <li><a href=\\\"#\\\">Accessibility Center<\\/a><\\/li>\\r\\n                                        <\\/ul>\"}]', NULL, 15, NULL, NULL, NULL, '2025-04-16 04:21:51'),
(16, 'list_widget_footer_ja', NULL, '[{\"title\":\"\\u5019\\u88dc\\u8005\\u5411\\u3051\",\"size\":\"3\",\"content\":\"<ul class=\\\"list\\\">\\r\\n                                            <li><a href=\\\"#\\\">\\u6c42\\u4eba\\u3092\\u95b2\\u89a7\\u3059\\u308b\\r\\n<\\/a><\\/li>\\r\\n                                            <li><a href=\\\"#\\\">\\u30ab\\u30c6\\u30b4\\u30ea\\u3092\\u95b2\\u89a7\\u3059\\u308b\\r\\n<\\/a><\\/li>\\r\\n                                            <li><a href=\\\"#\\\">\\u5019\\u88dc\\u30c0\\u30c3\\u30b7\\u30e5\\u30dc\\u30fc\\u30c9\\r\\n<\\/a><\\/li>\\r\\n                                            <li><a href=\\\"#\\\">\\u30b8\\u30e7\\u30d6\\u30a2\\u30e9\\u30fc\\u30c8<\\/a><\\/li>\\r\\n                                            <li><a href=\\\"#\\\">\\u30de\\u30a4\\u30d6\\u30c3\\u30af\\u30de\\u30fc\\u30af\\r\\n<\\/a><\\/li>\\r\\n                                        <\\/ul>\"},{\"title\":\"\\u96c7\\u7528\\u4e3b\\u306e\\u305f\\u3081\\u306b\",\"size\":\"3\",\"content\":\"<ul class=\\\"list\\\">\\r\\n                                            <li><a href=\\\"#\\\">\\u5019\\u88dc\\u8005\\u3092\\u95b2\\u89a7\\u3059\\u308b\\r\\n<\\/a><\\/li>\\r\\n                                            <li><a href=\\\"#\\\">\\u96c7\\u7528\\u8005\\u30c0\\u30c3\\u30b7\\u30e5\\u30dc\\u30fc\\u30c9\\r\\n<\\/a><\\/li>\\r\\n                                            <li><a href=\\\"#\\\">\\u30b8\\u30e7\\u30d6\\u3092\\u8ffd\\u52a0\\r\\n<\\/a><\\/li>\\r\\n                                            <li><a href=\\\"#\\\">\\u30b8\\u30e7\\u30d6\\u30d1\\u30c3\\u30b1\\u30fc\\u30b8\\r\\n<\\/a><\\/li>\\r\\n                                        <\\/ul>\"},{\"title\":\"\\u79c1\\u305f\\u3061\\u306b\\u95a2\\u3057\\u3066\\u306f\",\"size\":\"3\",\"content\":\"<ul class=\\\"list\\\">\\r\\n                                            <li><a href=\\\"#\\\">\\u6c42\\u4eba\\u30da\\u30fc\\u30b8\\r\\n<\\/a><\\/li>\\r\\n                                            <li><a href=\\\"#\\\">\\u6c42\\u4eba\\u30da\\u30fc\\u30b8\\u306e\\u4ee3\\u66ff\\r\\n<\\/a><\\/li>\\r\\n                                            <li><a href=\\\"#\\\">\\u5c65\\u6b74\\u66f8\\u30da\\u30fc\\u30b8\\r\\n<\\/a><\\/li>\\r\\n                                            <li><a href=\\\"#\\\">\\u30d6\\u30ed\\u30b0<\\/a><\\/li>\\r\\n                                            <li><a href=\\\"#\\\">\\u30b3\\u30f3\\u30bf\\u30af\\u30c8\\r\\n<\\/a><\\/li>\\r\\n                                        <\\/ul>\"},{\"title\":\"\\u5f79\\u7acb\\u3064\\u30ea\\u30bd\\u30fc\\u30b9\",\"size\":\"3\",\"content\":\"<ul class=\\\"list\\\">\\r\\n                                            <li><a href=\\\"#\\\">\\u30b5\\u30a4\\u30c8\\u30de\\u30c3\\u30d7\\r\\n<\\/a><\\/li>\\r\\n                                            <li><a href=\\\"#\\\">\\u5229\\u7528\\u898f\\u7d04\\r\\n<\\/a><\\/li>\\r\\n                                            <li><a href=\\\"#\\\">\\u30d7\\u30e9\\u30a4\\u30d0\\u30b7\\u30fc\\u30bb\\u30f3\\u30bf\\u30fc\\r\\n<\\/a><\\/li>\\r\\n                                            <li><a href=\\\"#\\\">\\u30bb\\u30ad\\u30e5\\u30ea\\u30c6\\u30a3\\u30bb\\u30f3\\u30bf\\u30fc\\r\\n<\\/a><\\/li>\\r\\n                                            <li><a href=\\\"#\\\">\\u30a2\\u30af\\u30bb\\u30b7\\u30d3\\u30ea\\u30c6\\u30a3\\u30bb\\u30f3\\u30bf\\u30fc\\r\\n<\\/a><\\/li>\\r\\n                                        <\\/ul>\"}]', NULL, NULL, NULL, NULL, NULL, NULL),
(17, 'home_page_id', 'general', '12', NULL, 15, NULL, NULL, NULL, '2025-04-16 04:21:51'),
(18, 'terms_and_conditions_id', 'general', '2', NULL, 15, NULL, NULL, NULL, '2025-04-16 04:21:51'),
(19, 'page_contact_title', 'general', 'Contact Us', NULL, NULL, NULL, NULL, NULL, NULL),
(20, 'page_contact_lists', 'general', '[{\"title\":\"Address\",\"desc\":\"329 Queensberry Street, North Melbourne VIC 3051, Australia.\",\"icon\":\"116\"},{\"title\":\"Call Us\",\"desc\":\"<a href=\\\"#\\\" class=\\\"phone\\\">123 456 7890<\\/a>\",\"icon\":\"117\"},{\"title\":\"Email\",\"desc\":\"<a href=\\\"#\\\">contact.london@example.com<\\/a>\",\"icon\":\"118\"}]', NULL, 15, NULL, NULL, NULL, '2025-04-16 04:21:51'),
(21, 'page_contact_iframe_google_map', 'general', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3151.835253576489!2d144.95372995111143!3d-37.817327679652266!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad65d4c2b349649%3A0xb6899234e561db11!2sEnvato!5e0!3m2!1sen!2sin!4v1581584770980!5m2!1sen!2sin\" width=\"100%\" height=\"500\" frameborder=\"0\" style=\"border:0;\" allowfullscreen=\"\"></iframe>', NULL, 15, NULL, NULL, NULL, '2025-04-16 04:21:51'),
(22, 'contact_call_to_action_title', 'general', 'Recruiting?', NULL, 15, NULL, NULL, NULL, '2025-04-16 04:21:51'),
(23, 'contact_call_to_action_sub_title', 'general', 'Advertise your jobs to millions of monthly users and search 15.8 million <br> CVs in our database.', NULL, 15, NULL, NULL, NULL, '2025-04-16 04:21:51'),
(24, 'contact_call_to_action_button_text', 'general', 'Start Recruiting Now', NULL, 15, NULL, NULL, NULL, '2025-04-16 04:21:51'),
(25, 'contact_call_to_action_button_link', 'general', '#', NULL, 15, NULL, NULL, NULL, '2025-04-16 04:21:51'),
(26, 'contact_call_to_action_image', 'general', '40', NULL, 15, NULL, NULL, NULL, '2025-04-16 04:21:51'),
(27, 'currency_main', 'payment', 'usd', NULL, NULL, NULL, NULL, NULL, NULL),
(28, 'currency_format', 'payment', 'left', NULL, NULL, NULL, NULL, NULL, NULL),
(29, 'currency_decimal', 'payment', ',', NULL, NULL, NULL, NULL, NULL, NULL),
(30, 'currency_thousand', 'payment', '.', NULL, NULL, NULL, NULL, NULL, NULL),
(31, 'currency_no_decimal', 'payment', '0', NULL, NULL, NULL, NULL, NULL, NULL),
(32, 'extra_currency', 'payment', '[{\"currency_main\":\"eur\",\"currency_format\":\"left\",\"currency_thousand\":\".\",\"currency_decimal\":\",\",\"currency_no_decimal\":\"2\",\"rate\":\"0.902807\"},{\"currency_main\":\"jpy\",\"currency_format\":\"right_space\",\"currency_thousand\":\".\",\"currency_decimal\":\",\",\"currency_no_decimal\":\"0\",\"rate\":\"0.00917113\"}]', NULL, NULL, NULL, NULL, NULL, NULL),
(33, 'map_provider', NULL, 'gmap', NULL, NULL, NULL, NULL, NULL, NULL),
(34, 'map_gmap_key', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL),
(35, 'g_offline_payment_enable', NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL),
(36, 'g_offline_payment_name', NULL, 'Offline Payment', NULL, NULL, NULL, NULL, NULL, NULL),
(37, 'date_format', NULL, 'm/d/Y', NULL, 15, NULL, NULL, NULL, '2025-04-16 04:21:51'),
(38, 'site_timezone', NULL, 'UTC', NULL, 15, NULL, NULL, NULL, '2025-04-16 04:21:51'),
(39, 'site_title', NULL, 'Superio', NULL, 15, NULL, NULL, NULL, '2025-04-16 04:21:51'),
(40, 'email_header', NULL, '<h1 class=\"site-title\" style=\"text-align: center\">Superio</h1>', NULL, NULL, NULL, NULL, NULL, NULL),
(41, 'email_footer', NULL, '<p class=\"\" style=\"text-align: center\">&copy; 2021 Superio. All rights reserved</p>', NULL, NULL, NULL, NULL, NULL, NULL),
(42, 'enable_preloader', NULL, '', NULL, 15, NULL, NULL, NULL, '2025-04-16 04:21:51'),
(43, 'enable_mail_user_registered', NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL),
(44, 'user_content_email_registered', NULL, '<h1 style=\"text-align: center\">Welcome!</h1>\r\n                    <h3>Hello [first_name] [last_name]</h3>\r\n                    <p>Thank you for signing up with Superio! We hope you enjoy your time with us.</p>\r\n                    <p>Regards,</p>\r\n                    <p>Superio</p>', NULL, NULL, NULL, NULL, NULL, NULL),
(45, 'admin_enable_mail_user_registered', NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL),
(46, 'admin_content_email_user_registered', NULL, '<h3>Hello Administrator</h3>\r\n                    <p>We have new registration</p>\r\n                    <p>Full name: [first_name] [last_name]</p>\r\n                    <p>Email: [email]</p>\r\n                    <p>Regards,</p>\r\n                    <p>Superio</p>', NULL, NULL, NULL, NULL, NULL, NULL),
(47, 'user_content_email_forget_password', NULL, '<h1>Hello!</h1>\r\n                    <p>You are receiving this email because we received a password reset request for your account.</p>\r\n                    <p style=\"text-align: center\">[button_reset_password]</p>\r\n                    <p>This password reset link expire in 60 minutes.</p>\r\n                    <p>If you did not request a password reset, no further action is required.\r\n                    </p>\r\n                    <p>Regards,</p>\r\n                    <p>Superio</p>', NULL, NULL, NULL, NULL, NULL, NULL),
(48, 'email_driver', NULL, 'log', NULL, NULL, NULL, NULL, NULL, NULL),
(49, 'email_host', NULL, 'smtp.mailgun.org', NULL, NULL, NULL, NULL, NULL, NULL),
(50, 'email_port', NULL, '587', NULL, NULL, NULL, NULL, NULL, NULL),
(51, 'email_encryption', NULL, 'tls', NULL, NULL, NULL, NULL, NULL, NULL),
(52, 'email_username', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL),
(53, 'email_password', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL),
(54, 'email_mailgun_domain', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL),
(55, 'email_mailgun_secret', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL),
(56, 'email_mailgun_endpoint', NULL, 'api.mailgun.net', NULL, NULL, NULL, NULL, NULL, NULL),
(57, 'email_postmark_token', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL),
(58, 'email_ses_key', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL),
(59, 'email_ses_secret', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL),
(60, 'email_ses_region', NULL, 'us-east-1', NULL, NULL, NULL, NULL, NULL, NULL),
(61, 'email_sparkpost_secret', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL),
(62, 'content_email_apply_job_submit', NULL, '<h3>Hello [employer_name],</h3>\r\n                            <p>A candidate apply for your job:</p>\r\n                            <p>Candidate Name: [candidate_name]</p>\r\n                            <p>Message: [message]</p>\r\n                            <p>Regards,</p>\r\n                            <p>Superio</p>', NULL, NULL, NULL, NULL, NULL, NULL),
(63, 'content_email_change_applicants_status', NULL, '<h3>Hello [candidate_name],</h3>\r\n                            <p>Employer [applicants_status] you from job [job_title]</p>\r\n                            <p>Regards,</p>\r\n                            <p>Superio</p>', NULL, NULL, NULL, NULL, NULL, NULL),
(64, 'cookie_agreement_enable', NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL),
(65, 'cookie_agreement_button_text', NULL, 'Got it', NULL, NULL, NULL, NULL, NULL, NULL),
(66, 'cookie_agreement_content', NULL, '<p>This website requires cookies to provide all of its features. By using our website, you agree to our use of cookies. <a href=\'#\'>More info</a></p>', NULL, NULL, NULL, NULL, NULL, NULL),
(67, 'booking_why_book_with_us', NULL, '[{\"title\":\"No-hassle best price guarantee\",\"link\":\"#\",\"icon\":\"flaticon-star\"},{\"title\":\"Customer care available 24\\/7\",\"link\":\"#\",\"icon\":\"flaticon-support\"},{\"title\":\"Hand-picked Tours & Activities\",\"link\":\"#\",\"icon\":\"flaticon-favorites-button\"},{\"title\":\"Free Travel Insureance\",\"link\":\"#\",\"icon\":\"flaticon-airplane\"}]', NULL, NULL, NULL, NULL, NULL, NULL),
(68, 'logo_invoice_id', NULL, '8', NULL, NULL, NULL, NULL, NULL, NULL),
(69, 'invoice_company_info', NULL, '<p><span style=\"font-size: 14pt;\"><strong>Superio Company</strong></span></p>\r\n                                <p>Ha Noi, Viet Nam</p>\r\n                                <p>www.superio.test</p>', NULL, NULL, NULL, NULL, NULL, NULL),
(70, 'vendor_commission_type', NULL, 'percent', NULL, NULL, NULL, NULL, '2025-04-16 03:24:08', '2025-04-16 03:24:08'),
(71, 'vendor_commission_amount', NULL, '10', NULL, NULL, NULL, NULL, '2025-04-16 03:24:08', '2025-04-16 03:24:08'),
(72, 'news_page_list_title', 'news', 'Blog', NULL, NULL, NULL, NULL, NULL, NULL),
(73, 'news_page_list_sub_title', 'news', 'Blog', NULL, NULL, NULL, NULL, NULL, NULL),
(74, 'news_page_list_banner', 'news', '39', NULL, NULL, NULL, NULL, NULL, NULL),
(75, 'news_sidebar', 'news', '[{\"title\":null,\"content\":null,\"type\":\"search_form\"},{\"title\":\"About Us\",\"content\":\"Nam dapibus nisl vitae elit fringilla rutrum. Aenean sollicitudin, erat a elementum rutrum, neque sem pretium metus, quis mollis nisl nunc et massa\",\"type\":\"content_text\"},{\"title\":\"Categories\",\"content\":null,\"type\":\"category\"},{\"title\":\"Tags\",\"content\":null,\"type\":\"tag\"}]', NULL, NULL, NULL, NULL, NULL, NULL),
(76, 'candidate_page_search_title', NULL, 'Find Candidates', NULL, NULL, NULL, NULL, NULL, NULL),
(77, 'candidate_page_search_title_ja', NULL, '仕事を探す', NULL, NULL, NULL, NULL, NULL, NULL),
(78, 'candidate_list_layout', NULL, 'v1', NULL, NULL, NULL, NULL, NULL, NULL),
(79, 'candidate_single_layout', NULL, 'v1', NULL, NULL, NULL, NULL, NULL, NULL),
(80, 'candidate_sidebar_search_fields', NULL, '[\r\n                        {\"title\":\"Search by Keywords\",\"type\":\"keyword\",\"position\":\"1\"},\r\n                        {\"title\":\"Location\",\"type\":\"location\",\"position\":\"2\"},\r\n                        {\"title\":\"Category\",\"type\":\"category\",\"position\":\"3\"},\r\n                        {\"title\":\"Skills\",\"type\":\"skill\",\"position\":\"4\"},\r\n                        {\"title\":\"Date Posted\",\"type\":\"date_posted\",\"position\":\"5\"},\r\n                        {\"title\":\"Experience Level\",\"type\":\"experience\",\"position\":\"6\"},\r\n                        {\"title\":\"Education Levels\",\"type\":\"education\",\"position\":\"7\"}\r\n\r\n                    ]', NULL, NULL, NULL, NULL, NULL, NULL),
(81, 'candidate_location_search_style', NULL, 'autocomplete', NULL, NULL, NULL, NULL, NULL, NULL),
(82, 'job_page_search_title', NULL, 'Find Jobs', NULL, NULL, NULL, NULL, NULL, NULL),
(83, 'job_page_search_title_ja', NULL, '仕事を探す', NULL, NULL, NULL, NULL, NULL, NULL),
(84, 'jobs_list_layout', NULL, 'job-list-v1', NULL, NULL, NULL, NULL, NULL, NULL),
(85, 'job_single_layout', NULL, 'job-single-v1', NULL, NULL, NULL, NULL, NULL, NULL),
(86, 'job_sidebar_search_fields', NULL, '[{\"title\":\"Search by Keywords\",\"type\":\"keyword\",\"position\":\"1\"},{\"title\":\"Location\",\"type\":\"location\",\"position\":\"2\"},{\"title\":\"Category\",\"type\":\"category\",\"position\":\"3\"},{\"title\":\"Job type\",\"type\":\"job_type\",\"position\":\"4\"},{\"title\":\"Date Posted\",\"type\":\"date_posted\",\"position\":\"5\"},{\"title\":\"Experience Level\",\"type\":\"experience\",\"position\":\"6\"},{\"title\":\"Salary\",\"type\":\"salary\",\"position\":\"7\"}]', NULL, NULL, NULL, NULL, NULL, NULL),
(87, 'job_banner_search_fields', NULL, '[{\"title\":\"Keyword\",\"type\":\"keyword\",\"position\":\"1\"},{\"title\":\"Location\",\"type\":\"location\",\"position\":\"2\"},{\"title\":\"Category\",\"type\":\"category\",\"position\":\"3\"}]', NULL, NULL, NULL, NULL, NULL, NULL),
(88, 'job_sidebar_cta', NULL, '{\"title\":\"Recruiting?\",\"desc\":\"Advertise your jobs to millions of monthly users and search 15.8 million CVs in our database.\",\"button\":{\"url\":\"#\",\"name\":\"Start Recruiting Now\",\"target\":\"_blank\"},\"image\":\"17\"}', NULL, NULL, NULL, NULL, NULL, NULL),
(89, 'job_location_search_style', NULL, 'autocomplete', NULL, NULL, NULL, NULL, NULL, NULL),
(90, 'company_page_search_title', NULL, 'Find Companies', NULL, NULL, NULL, NULL, NULL, NULL),
(91, 'company_page_search_title_ja', NULL, '会社を探す', NULL, NULL, NULL, NULL, NULL, NULL),
(92, 'company_list_layout', NULL, 'company-list-v1', NULL, NULL, NULL, NULL, NULL, NULL),
(93, 'single_company_layout', NULL, 'company-single-v1', NULL, NULL, NULL, NULL, NULL, NULL),
(94, 'company_sidebar_search_fields', NULL, '[{\"title\":\"Search by Keywords\",\"type\":\"keyword\",\"position\":\"1\"},{\"title\":\"Location\",\"type\":\"location\",\"position\":\"2\"},{\"title\":\"Category\",\"type\":\"category\",\"position\":\"3\"},{\"title\":\"Attribute\",\"type\":\"att\",\"position\":\"4\"},{\"title\":\"Founded Date\",\"type\":\"founded_date\",\"position\":\"5\"}]', NULL, NULL, NULL, NULL, NULL, NULL),
(95, 'company_sidebar_cta', NULL, '{\"title\":\"Recruiting?\",\"desc\":\"Advertise your jobs to millions of monthly users and search 15.8 million CVs in our database.\",\"button\":{\"url\":\"#\",\"name\":\"Start Recruiting Now\",\"target\":\"_blank\"},\"image\":\"17\"}', NULL, NULL, NULL, NULL, NULL, NULL),
(96, 'company_location_search_style', NULL, 'autocomplete', NULL, NULL, NULL, NULL, NULL, NULL),
(97, 'gig_booking_buyer_fees', NULL, '[{\"name\":\"Service fee\",\"price\":\"2\",\"unit\":\"fixed\"}]', NULL, NULL, NULL, NULL, '2025-04-16 03:24:11', '2025-04-16 03:24:11'),
(98, 'gig_enable_review', NULL, '1', NULL, NULL, NULL, NULL, '2025-04-16 03:24:11', '2025-04-16 03:24:11'),
(99, 'gig_review_number_per_page', NULL, '5', NULL, NULL, NULL, NULL, '2025-04-16 03:24:11', '2025-04-16 03:24:11'),
(100, 'gig_review_stats', NULL, '[{\"title\":\"Salary & Benefits\",\"desc\":\"Salary review every 6 months based on the work performance\"},{\"title\":\"Company Culture\",\"desc\":\"Company trip once a year and Team building once a month\"},{\"title\":\"Skill Development\",\"desc\":\"Well trained and dedicated to being able to catch the pace smoothly.\"},{\"title\":\"Work Satisfaction\",\"desc\":\"Our office is located with creative, open workspaces and a high-quality engaging environment.\"}]', NULL, NULL, NULL, NULL, '2025-04-16 03:24:11', '2025-04-16 03:24:11'),
(101, 'enable_mail_vendor_registered', 'vendor', '1', NULL, NULL, NULL, NULL, NULL, NULL),
(102, 'vendor_content_email_registered', 'vendor', '<h1 style=\"text-align: center;\">Welcome!</h1>\r\n                            <h3>Hello [first_name] [last_name]</h3>\r\n                            <p>Thank you for signing up with JobCore! We hope you enjoy your time with us.</p>\r\n                            <p>Regards,</p>\r\n                            <p>JobCore</p>', NULL, NULL, NULL, NULL, NULL, NULL),
(103, 'admin_enable_mail_vendor_registered', 'vendor', '1', NULL, NULL, NULL, NULL, NULL, NULL),
(104, 'admin_content_email_vendor_registered', 'vendor', '<h3>Hello Administrator</h3>\r\n                            <p>An user has been registered as Vendor. Please check the information bellow:</p>\r\n                            <p>Full name: [first_name] [last_name]</p>\r\n                            <p>Email: [email]</p>\r\n                            <p>Registration date: [created_at]</p>\r\n                            <p>You can approved the request here: [link_approved]</p>\r\n                            <p>Regards,</p>\r\n                            <p>JobCore</p>', NULL, NULL, NULL, NULL, NULL, NULL),
(105, 'booking_enquiry_enable_mail_to_vendor_content', 'enquiry', '<h3>Hello [vendor_name]</h3>\r\n                            <p>You get new inquiry request from [email]</p>\r\n                            <p>Name :[name]</p>\r\n                            <p>Emai:[email]</p>\r\n                            <p>Phone:[phone]</p>\r\n                            <p>Content:[note]</p>\r\n                            <p>Service:[service_link]</p>\r\n                            <p>Regards,</p>\r\n                            <p>JobCore</p>\r\n                            </div>', NULL, NULL, NULL, NULL, NULL, NULL),
(106, 'booking_enquiry_enable_mail_to_admin_content', 'enquiry', '<h3>Hello Administrator</h3>\r\n                            <p>You get new inquiry request from [email]</p>\r\n                            <p>Name :[name]</p>\r\n                            <p>Emai:[email]</p>\r\n                            <p>Phone:[phone]</p>\r\n                            <p>Content:[note]</p>\r\n                            <p>Service:[service_link]</p>\r\n                            <p>Vendor:[vendor_link]</p>\r\n                            <p>Regards,</p>\r\n                            <p>JobCore</p>', NULL, NULL, NULL, NULL, NULL, NULL),
(107, 'update_to_1.10', NULL, '1', NULL, NULL, NULL, NULL, '2025-04-16 03:55:18', '2025-04-16 03:55:18'),
(108, 'schema_gig_version', NULL, '1.7', NULL, NULL, NULL, NULL, '2025-04-16 03:55:18', '2025-04-16 03:55:18'),
(109, 'user_plans_page_title', 'user_plans', 'Pricing Packages', NULL, NULL, NULL, NULL, NULL, NULL),
(110, 'user_plans_page_sub_title', 'user_plans', 'Choose your pricing plan', NULL, NULL, NULL, NULL, NULL, NULL),
(111, 'user_plans_sale_text', 'user_plans', 'Save up to 10%', NULL, NULL, NULL, NULL, NULL, NULL),
(112, 'update_to_1.2.0.2', NULL, '1', NULL, NULL, NULL, NULL, '2025-04-16 03:55:18', '2025-04-16 03:55:18'),
(113, 'enable_hide_email_company', 'company', '0', NULL, NULL, NULL, NULL, NULL, NULL),
(114, 'update_to_1.3.0.0', NULL, '1', NULL, NULL, NULL, NULL, '2025-04-16 03:55:18', '2025-04-16 03:55:18'),
(115, 'update_to_2.0.0', NULL, '1', NULL, NULL, NULL, NULL, '2025-04-16 03:55:18', '2025-04-16 03:55:18'),
(116, 'update_to_2_0_1', NULL, '1', NULL, NULL, NULL, NULL, '2025-04-16 03:55:18', '2025-04-16 03:55:18'),
(117, 'update_to_2_1_0', NULL, '1', NULL, NULL, NULL, NULL, '2025-04-16 03:55:18', '2025-04-16 03:55:18'),
(118, 'company_role', NULL, '2', NULL, NULL, NULL, NULL, '2025-04-16 03:55:18', '2025-04-16 03:55:18'),
(119, 'update_to_2_2_0', NULL, '1', NULL, NULL, NULL, NULL, '2025-04-16 03:55:18', '2025-04-16 03:55:18'),
(120, 'update_to_2_3_0', NULL, '1', NULL, NULL, NULL, NULL, '2025-04-16 03:55:18', '2025-04-16 03:55:18'),
(121, 'update_to_2_4_0', NULL, '1', NULL, NULL, NULL, NULL, '2025-04-16 03:55:18', '2025-04-16 03:55:18'),
(122, 'update_to_251.1', NULL, '1', NULL, NULL, NULL, NULL, '2025-04-16 03:55:18', '2025-04-16 03:55:18'),
(123, 'update_to_3_0_1', NULL, '1', NULL, NULL, NULL, NULL, '2025-04-16 03:55:18', '2025-04-16 03:55:18'),
(124, 'site_desc', NULL, '', NULL, 15, NULL, NULL, '2025-04-16 04:21:51', '2025-04-16 04:21:51'),
(125, 'phone_contact', NULL, '', NULL, 15, NULL, NULL, '2025-04-16 04:21:51', '2025-04-16 04:21:51'),
(126, 'site_first_day_of_the_weekin_calendar', NULL, '1', NULL, 15, NULL, NULL, '2025-04-16 04:21:51', '2025-04-16 04:21:51'),
(127, 'enable_rtl', NULL, '', NULL, 15, NULL, NULL, '2025-04-16 04:21:51', '2025-04-16 04:21:51');

INSERT INTO `core_tags` (`id`, `name`, `slug`, `content`, `create_user`, `update_user`, `deleted_at`, `origin_id`, `lang`, `created_at`, `updated_at`) VALUES
(1, 'App', 'app', NULL, NULL, NULL, NULL, NULL, NULL, '2025-04-16 03:24:08', '2025-04-16 03:24:08'),
(2, 'Administrative', 'administrative', NULL, NULL, NULL, NULL, NULL, NULL, '2025-04-16 03:24:08', '2025-04-16 03:24:08'),
(3, 'Android', 'android', NULL, NULL, NULL, NULL, NULL, NULL, '2025-04-16 03:24:08', '2025-04-16 03:24:08'),
(4, 'Wordpress', 'wordpress', NULL, NULL, NULL, NULL, NULL, NULL, '2025-04-16 03:24:08', '2025-04-16 03:24:08'),
(5, 'Design', 'design', NULL, NULL, NULL, NULL, NULL, NULL, '2025-04-16 03:24:08', '2025-04-16 03:24:08'),
(6, 'React', 'react', NULL, NULL, NULL, NULL, NULL, NULL, '2025-04-16 03:24:08', '2025-04-16 03:24:08');

INSERT INTO `core_templates` (`id`, `title`, `content`, `type_id`, `create_user`, `update_user`, `origin_id`, `lang`, `created_at`, `updated_at`) VALUES
(1, 'About', '[{\"type\":\"breadcrumb_section\",\"name\":\"Breadcrumb Section\",\"model\":{\"title\":\"About Us\",\"sub_title\":\"About Us\",\"bg_image\":\"\",\"bg_color\":\"\"},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false},{\"type\":\"gallery\",\"name\":\"Gallery\",\"model\":{\"list_item\":[{\"_active\":true,\"image_id\":96},{\"_active\":true,\"image_id\":97},{\"_active\":true,\"image_id\":98},{\"_active\":true,\"image_id\":99},{\"_active\":true,\"image_id\":100},{\"_active\":true,\"image_id\":101}],\"style\":\"\"},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false},{\"type\":\"BlockCounter\",\"name\":\"Block Counter\",\"model\":{\"list_item\":[{\"_active\":true,\"number\":\"4\",\"symbol\":\"M\",\"desc\":\"4 million daily active users\"},{\"_active\":true,\"number\":\"12\",\"symbol\":\"k\",\"desc\":\"Over 12k open job positions\"},{\"_active\":true,\"number\":\"20\",\"symbol\":\"M\",\"desc\":\"Over 20 million stories shared\"}]},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false},{\"type\":\"text\",\"name\":\"Text\",\"model\":{\"content\":\"<h4>About Superio</h4>\\n<p>Far much that one rank beheld bluebird after outside ignobly allegedly more when oh arrogantly vehement irresistibly fussy penguin insect additionally wow absolutely crud meretriciously hastily dalmatian a glowered inset one echidna cassowary some parrot and much as goodness some froze the sullen much connected bat wonderfully on instantaneously eel valiantly petted this along across highhandedly much.</p>\\n<p>Repeatedly dreamed alas opossum but dramatically despite expeditiously that jeepers loosely yikes that as or eel underneath kept and slept compactly far purred sure abidingly up above fitting to strident wiped set waywardly far the and pangolin horse approving paid chuckled cassowary oh above a much opposite far much hypnotically more therefore wasp less that hey apart well like while superbly orca and far hence one.Far much that one rank beheld bluebird after outside ignobly allegedly more when oh arrogantly vehement irresistibly fussy.</p>\",\"class\":\"about-section-three\"},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false},{\"type\":\"call_to_action\",\"name\":\"Call To Action\",\"model\":{\"title\":\"Your Dream Jobs Are Waiting\",\"sub_title\":\"Over 1 million interactions, 50,000 success stories Make yours now.\",\"link_title\":\"Search Job\",\"link_more\":\"#\",\"style\":\"\",\"bg_image\":102,\"bg_gradient\":\"\",\"link_search\":\"Search Job\",\"url_search\":\"#\",\"link_apply\":\"Apply Job Now\",\"url_apply\":\"#\"},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false},{\"type\":\"testimonial\",\"name\":\"List Testimonial\",\"model\":{\"title\":\"Testimonials From Our Customers\",\"sub_title\":\"Lorem ipsum dolor sit amet elit, sed do eiusmod tempor\",\"list_item\":[{\"_active\":true,\"title\":\"Great quality!\",\"desc\":\"Without JobHunt i’d be homeless, they found me a job and got me sorted out quickly with everything! Can’t quite… The Mitech team works really hard to ensure high level of quality\",\"info_name\":\"Brooklyn Simmons\",\"info_desc\":\"Web Developer\",\"position\":null,\"avatar\":103},{\"_active\":true,\"title\":\"Great quality!\",\"desc\":\"Without JobHunt i’d be homeless, they found me a job and got me sorted out quickly with everything! Can’t quite… The Mitech team works really hard to ensure high level of quality\",\"info_name\":\"Brooklyn Simmons\",\"info_desc\":\"Web Developer\",\"position\":null,\"avatar\":103},{\"_active\":true,\"title\":\"Great quality!\",\"desc\":\"Without JobHunt i’d be homeless, they found me a job and got me sorted out quickly with everything! Can’t quite… The Mitech team works really hard to ensure high level of quality\",\"info_name\":\"Brooklyn Simmons\",\"info_desc\":\"Web Developer\",\"position\":null,\"avatar\":103}],\"style\":\"index\"},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false},{\"type\":\"HowItWork\",\"name\":\"How It Works\",\"model\":{\"style\":\"style_2\",\"title\":\"How It Works?\",\"list_item\":[{\"_active\":true,\"title\":\"Free Resume Assessments\",\"sub_title\":\"Employers on average spend 31 seconds scanning resumes to identify potential matches.\",\"icon_image\":104,\"order\":null},{\"_active\":true,\"title\":\"Job Fit Scoring\",\"sub_title\":\"Employers on average spend 31 seconds scanning resumes to identify potential matches.\",\"icon_image\":105,\"order\":null},{\"_active\":true,\"title\":\"Help Every Step of the Way\",\"sub_title\":\"Employers on average spend 31 seconds scanning resumes to identify potential matches.\",\"icon_image\":106,\"order\":null}],\"background_image\":\"\",\"sub_title\":\"Job for anyone, anywhere\"},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false},{\"type\":\"brands_list\",\"name\":\"Brands List\",\"model\":{\"list_item\":[{\"_active\":true,\"title\":\"Invision\",\"image_id\":107,\"brand_link\":\"#\"},{\"_active\":true,\"title\":\"figma\",\"image_id\":108,\"brand_link\":\"#\"},{\"_active\":true,\"title\":\"amazon\",\"image_id\":109,\"brand_link\":\"#\"},{\"_active\":true,\"title\":\"airbnb\",\"image_id\":110,\"brand_link\":\"#\"},{\"_active\":true,\"title\":\"spotify\",\"image_id\":111,\"brand_link\":\"#\"},{\"_active\":true,\"title\":\"slack\",\"image_id\":112,\"brand_link\":\"#\"},{\"_active\":true,\"title\":\"paypal\",\"image_id\":113,\"brand_link\":\"#\"}]},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false}]', NULL, NULL, NULL, NULL, NULL, '2025-04-16 03:24:08', NULL),
(2, 'FAQ', '[{\"type\":\"breadcrumb_section\",\"name\":\"Breadcrumb Section\",\"model\":{\"title\":\"Frequently Asked Questions\",\"sub_title\":\"faq\",\"bg_color\":\"transparent\"},\"component\":\"RegularBlock\",\"open\":true},{\"type\":\"FaqList\",\"name\":\"FAQ\'s List\",\"model\":{\"title\":\"Payments\",\"list_item\":[{\"_active\":false,\"title\":\"Why won\'t my payment go through?\",\"sub_title\":\"<p>Pharetra nulla ullamcorper sit lectus. Fermentum mauris pellentesque nec nibh sed et, vel diam, massa. Placerat quis vel fames interdum urna lobortis sagittis sed pretium. Aliquam eget posuere sit enim elementum nulla vulputate magna. Morbi sed arcu proin quis tortor non risus.</p>\\n<p>Elementum lectus a porta commodo suspendisse arcu, aliquam lectus faucibus.</p>\"},{\"_active\":false,\"title\":\"How do I get a refund?\",\"sub_title\":\"<p>Pharetra nulla ullamcorper sit lectus. Fermentum mauris pellentesque nec nibh sed et, vel diam, massa. Placerat quis vel fames interdum urna lobortis sagittis sed pretium. Aliquam eget posuere sit enim elementum nulla vulputate magna. Morbi sed arcu proin quis tortor non risus.</p>\\n<p>Elementum lectus a porta commodo suspendisse arcu, aliquam lectus faucibus.</p>\"},{\"_active\":false,\"title\":\"How do I redeem a coupon?\",\"sub_title\":\"<p>Pharetra nulla ullamcorper sit lectus. Fermentum mauris pellentesque nec nibh sed et, vel diam, massa. Placerat quis vel fames interdum urna lobortis sagittis sed pretium. Aliquam eget posuere sit enim elementum nulla vulputate magna. Morbi sed arcu proin quis tortor non risus.</p>\\n<p>Elementum lectus a porta commodo suspendisse arcu, aliquam lectus faucibus.</p>\"},{\"_active\":true,\"title\":\"Changing account name\",\"sub_title\":\"<p>Pharetra nulla ullamcorper sit lectus. Fermentum mauris pellentesque nec nibh sed et, vel diam, massa. Placerat quis vel fames interdum urna lobortis sagittis sed pretium. Aliquam eget posuere sit enim elementum nulla vulputate magna. Morbi sed arcu proin quis tortor non risus.</p>\\n<p>Elementum lectus a porta commodo suspendisse arcu, aliquam lectus faucibus.</p>\"}]},\"component\":\"RegularBlock\",\"open\":true},{\"type\":\"FaqList\",\"name\":\"FAQ\'s List\",\"model\":{\"title\":\"Suggestions\",\"list_item\":[{\"_active\":false,\"title\":\"Why won\'t my payment go through?\",\"sub_title\":\"<p>Pharetra nulla ullamcorper sit lectus. Fermentum mauris pellentesque nec nibh sed et, vel diam, massa. Placerat quis vel fames interdum urna lobortis sagittis sed pretium. Aliquam eget posuere sit enim elementum nulla vulputate magna. Morbi sed arcu proin quis tortor non risus.</p>\\n<p>Elementum lectus a porta commodo suspendisse arcu, aliquam lectus faucibus.</p>\"},{\"_active\":false,\"title\":\"How do I get a refund?\",\"sub_title\":\"<p>Pharetra nulla ullamcorper sit lectus. Fermentum mauris pellentesque nec nibh sed et, vel diam, massa. Placerat quis vel fames interdum urna lobortis sagittis sed pretium. Aliquam eget posuere sit enim elementum nulla vulputate magna. Morbi sed arcu proin quis tortor non risus.</p>\\n<p>Elementum lectus a porta commodo suspendisse arcu, aliquam lectus faucibus.</p>\"},{\"_active\":false,\"title\":\"How do I redeem a coupon?\",\"sub_title\":\"<p>Pharetra nulla ullamcorper sit lectus. Fermentum mauris pellentesque nec nibh sed et, vel diam, massa. Placerat quis vel fames interdum urna lobortis sagittis sed pretium. Aliquam eget posuere sit enim elementum nulla vulputate magna. Morbi sed arcu proin quis tortor non risus.</p>\\n<p>Elementum lectus a porta commodo suspendisse arcu, aliquam lectus faucibus.</p>\"},{\"_active\":true,\"title\":\"Changing account name\",\"sub_title\":\"<p>Pharetra nulla ullamcorper sit lectus. Fermentum mauris pellentesque nec nibh sed et, vel diam, massa. Placerat quis vel fames interdum urna lobortis sagittis sed pretium. Aliquam eget posuere sit enim elementum nulla vulputate magna. Morbi sed arcu proin quis tortor non risus.</p>\\n<p>Elementum lectus a porta commodo suspendisse arcu, aliquam lectus faucibus.</p>\"}]},\"component\":\"RegularBlock\",\"open\":true}]', NULL, NULL, NULL, NULL, NULL, '2025-04-16 03:24:08', NULL),
(3, 'Home Page 1', '[{\"type\":\"hero_banner\",\"name\":\"Hero Banner\",\"model\":{\"style\":\"style_1\",\"title\":\"There Are <span class=\\\"colored\\\">93,178<\\/span> Postings Here<br> For you!\",\"sub_title\":\"Find Jobs, Employment & Career Opportunities\",\"popular_searches\":\"Designer,Developer,Web,IOS,PHP,Senior,Engineer\",\"list_images\":[{\"_active\":false,\"image_id\":52},{\"_active\":false,\"image_id\":53},{\"_active\":false,\"image_id\":54},{\"_active\":false,\"image_id\":55}],\"banner_image\":49,\"location_style\":\"autocomplete\"},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false},{\"type\":\"job_categories\",\"name\":\"Job Categories\",\"model\":{\"style\":\"style_1\",\"title\":\"Popular Job Categories\",\"sub_title\":\"2020 jobs live - 293 added today.\",\"job_categories\":[\"6\",\"7\",\"8\",\"1\",\"2\",\"3\",\"4\",\"5\",\"9\"]},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false},{\"type\":\"jobs_list\",\"name\":\"Jobs List\",\"model\":{\"style\":\"style_1\",\"title\":\"Featured Jobs\",\"sub_title\":\"Know your worth and find the job that qualify your life\",\"number\":6,\"job_categories\":\"\",\"order\":\"is_featured\",\"order_by\":\"desc\",\"load_more_url\":\"\\/job\"},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false},{\"type\":\"testimonial\",\"name\":\"List Testimonial\",\"model\":{\"style\":\"style_2\",\"title\":\"Testimonials From Our Customers\",\"sub_title\":\"Lorem ipsum dolor sit amet elit, sed do eiusmod tempor\",\"list_item\":[{\"_active\":false,\"title\":\"Good theme\",\"desc\":\"Without JobHunt i\\u2019d be homeless, they found me a job and got me sorted out quickly with everything! Can\\u2019t quite\\u2026 The Mitech team works really hard to ensure high level of quality\",\"info_name\":\"Nicole Wells\",\"info_desc\":\"\",\"position\":\"Web Developer\",\"avatar\":103},{\"_active\":false,\"title\":\"Great quality!\",\"desc\":\"Without JobHunt i\\u2019d be homeless, they found me a job and got me sorted out quickly with everything! Can\\u2019t quite\\u2026 The Mitech team works really hard to ensure high level of quality\",\"info_name\":\"Gabriel Nolan\",\"position\":\"Consultant\",\"avatar\":114},{\"_active\":true,\"title\":\"Awesome Design\",\"desc\":\"Without JobHunt i\\u2019d be homeless, they found me a job and got me sorted out quickly with everything! Can\\u2019t quite\\u2026 The Mitech team works really hard to ensure high level of quality\",\"info_name\":\"Ashley Jenkins\",\"position\":\"Designer\",\"avatar\":115}]},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false},{\"type\":\"brands_list\",\"name\":\"Brands List\",\"model\":{\"list_item\":[{\"_active\":false,\"title\":\"Invision\",\"image_id\":107,\"brand_link\":\"#\"},{\"_active\":false,\"title\":\"Figma\",\"image_id\":108,\"brand_link\":null},{\"_active\":false,\"title\":\"Amazon\",\"image_id\":109,\"brand_link\":null},{\"_active\":false,\"title\":\"Airbnb\",\"image_id\":110,\"brand_link\":null},{\"_active\":false,\"title\":\"Spotify\",\"image_id\":111,\"brand_link\":null},{\"_active\":false,\"title\":\"Slack\",\"image_id\":112,\"brand_link\":null},{\"_active\":false,\"title\":\"Paypal\",\"image_id\":113,\"brand_link\":null}],\"style\":\"style_1\"},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false},{\"type\":\"about\",\"name\":\"About Us Block\",\"model\":{\"style\":\"style_1\",\"title\":\"Millions of Jobs. Find the one that suits you.\",\"content\":\"<p>Search all the open positions on the web. Get your own personalized salary estimate. Read reviews on over 600,000 companies worldwide.<\\/p>\\r\\n                                    <ul class=\\\"list-style-one\\\">\\r\\n                                    <li>Bring to the table win-win survival<\\/li>\\r\\n                                    <li>Capitalize on low hanging fruit to identify<\\/li>\\r\\n                                    <li>But I must explain to you how all this<\\/li>\\r\\n                                    <\\/ul>\",\"button_name\":\"Get Started\",\"button_url\":\"#\",\"button_target\":0,\"featured_image\":41,\"image_2\":43},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false},{\"type\":\"BlockCounter\",\"name\":\"Block Counter\",\"model\":{\"list_item\":[{\"_active\":false,\"number\":\"4\",\"symbol\":\"M\",\"desc\":\"4 million daily active users\"},{\"_active\":false,\"number\":\"12\",\"symbol\":\"k\",\"desc\":\"Over 12k open job positions\"},{\"_active\":false,\"number\":\"20\",\"symbol\":\"M\",\"desc\":\"Over 20 million stories shared\"}],\"max_width\":1310,\"style\":\"style_2\"},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false},{\"type\":\"list_news\",\"name\":\"News: List Items\",\"model\":{\"style\":\"style_1\",\"title\":\"Recent News Articles\",\"number\":3,\"category_id\":\"\",\"order\":\"\",\"order_by\":\"\",\"sub_title\":\"Fresh job related news content posted each day.\"},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false},{\"type\":\"app_download\",\"name\":\"App Download\",\"model\":{\"title\":\"Get the Superio Job <br>Search App\",\"sub_title\":\"DOWNLOAD & ENJOY\",\"desc\":\"Search through millions of jobs and find the right fit. Simply <br>swipe right to apply.\",\"button_image_1\":46,\"button_url_1\":\"#\",\"button_image_2\":47,\"button_url_2\":\"#\",\"featured_image\":45},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false},{\"type\":\"call_to_action\",\"name\":\"Call To Action\",\"model\":{\"style\":\"style_2\",\"title\":\"Recruiting?\",\"sub_title\":\"Advertise your jobs to millions of monthly users and search 15.8 million <br>CVs in our database.\",\"link_search\":\"Start Recruiting Now\",\"url_search\":\"#\",\"bg_image\":40},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false}]', NULL, NULL, NULL, NULL, NULL, '2025-04-16 03:24:08', NULL),
(4, 'Home Page 2', '[{\"type\":\"hero_banner\",\"name\":\"Hero Banner\",\"model\":{\"style\":\"style_2\",\"title\":\"Find Your Perfect Job <br>Match\",\"sub_title\":\"Find Jobs, Employment & Career Opportunities\",\"popular_searches\":\"Designer,Developer,Web,IOS,PHP,Senior,Engineer\",\"banner_image\":50,\"banner_image_2\":56,\"upload_cv_url\":\"#\",\"location_style\":\"autocomplete\"},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false},{\"type\":\"HowItWork\",\"name\":\"How It Works\",\"model\":{\"title\":\"How It Works?\",\"sub_title\":\"Job for anyone, anywhere\",\"list_item\":[{\"_active\":false,\"title\":\"Free Resume Assessments\",\"sub_title\":\"Employers on average spend 31 seconds scanning resumes to identify potential matches.\",\"icon_image\":104},{\"_active\":false,\"title\":\"Job Fit Scoring\",\"sub_title\":\"Employers on average spend 31 seconds scanning resumes to identify potential matches.\",\"icon_image\":105},{\"_active\":false,\"title\":\"Help Every Step of the Way\",\"sub_title\":\"Employers on average spend 31 seconds scanning resumes to identify potential matches.\",\"icon_image\":106}]},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false},{\"type\":\"jobs_list\",\"name\":\"Jobs List\",\"model\":{\"style\":\"style_2\",\"title\":\"Featured Jobs\",\"sub_title\":\"Know your worth and find the job that qualify your life\",\"number\":5,\"job_categories\":\"\",\"order\":\"is_featured\",\"order_by\":\"desc\",\"load_more_url\":\"\\/job\"},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false},{\"type\":\"list_locations\",\"name\":\"List Locations\",\"model\":{\"title\":\"Featured Cities\",\"sub_title\":\"Lorem ipsum dolor sit amet elit, sed do eiusmod tempor\",\"number\":5,\"order\":\"id\",\"order_by\":\"asc\"},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false},{\"type\":\"call_to_action\",\"name\":\"Call To Action\",\"model\":{\"style\":\"style_1\",\"title\":\"Your Dream Jobs Are Waiting\",\"sub_title\":\"Over 1 million interactions, 50,000 success stories Make yours now.\",\"link_search\":\"Search Job\",\"url_search\":\"\\/job\",\"link_apply\":\"Apply Job Now\",\"url_apply\":\"#\",\"bg_image\":48},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false},{\"type\":\"list_candidates\",\"name\":\"Candidates Blocks\",\"model\":{\"title\":\"Featured Candidates\",\"desc\":\"Lorem ipsum dolor sit amet elit, sed do eiusmod tempor\",\"number\":10,\"category_id\":\"\",\"order\":\"title\",\"order_by\":\"desc\"},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false},{\"type\":\"list_news\",\"name\":\"News: List Items\",\"model\":{\"style\":\"style_2\",\"title\":\"Recent News Articles\",\"number\":3,\"category_id\":\"\",\"order\":\"\",\"order_by\":\"\",\"sub_title\":\"Fresh job related news content posted each day.\"},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false},{\"type\":\"call_to_action\",\"name\":\"Call To Action\",\"model\":{\"style\":\"style_3\",\"title\":\"Let employers find you\",\"sub_title\":\"Advertise your jobs to millions of monthly users and search 15.8 million CVs in our database.\",\"link_search\":\"Search Job\",\"url_search\":\"\\/job\"},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false}]', NULL, NULL, NULL, NULL, NULL, '2025-04-16 03:24:08', NULL),
(5, 'Home Page 3', '[{\"type\":\"hero_banner\",\"name\":\"Hero Banner\",\"model\":{\"style\":\"style_3\",\"title\":\"Join us &amp; Explore Thousands <br> of Jobs\",\"sub_title\":\"Find Jobs, Employment & Career Opportunities\",\"popular_searches\":\"Designer,Developer,Web,IOS,PHP,Senior,Engineer\",\"banner_image\":51,\"location_style\":\"autocomplete\"},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false},{\"type\":\"brands_list\",\"name\":\"Brands List\",\"model\":{\"list_item\":[{\"_active\":false,\"title\":\"Invision\",\"image_id\":107,\"brand_link\":\"#\"},{\"_active\":false,\"title\":\"Figma\",\"image_id\":108,\"brand_link\":null},{\"_active\":false,\"title\":\"Amazon\",\"image_id\":109,\"brand_link\":null},{\"_active\":false,\"title\":\"Airbnb\",\"image_id\":110,\"brand_link\":null},{\"_active\":false,\"title\":\"Spotify\",\"image_id\":111,\"brand_link\":null},{\"_active\":false,\"title\":\"Slack\",\"image_id\":112,\"brand_link\":null},{\"_active\":false,\"title\":\"Paypal\",\"image_id\":113,\"brand_link\":null}],\"style\":\"style_2\"},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false},{\"type\":\"job_categories\",\"name\":\"Job Categories\",\"model\":{\"style\":\"style_2\",\"title\":\"Popular Job Categories\",\"sub_title\":\"2020 jobs live - 293 added today.\",\"job_categories\":[\"6\",\"7\",\"8\",\"1\",\"3\",\"4\",\"5\",\"9\"]},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false},{\"type\":\"jobs_list\",\"name\":\"Jobs List\",\"model\":{\"style\":\"style_3\",\"title\":\"Featured Jobs\",\"sub_title\":\"Know your worth and find the job that qualify your life\",\"number\":9,\"job_categories\":\"\",\"order\":\"is_featured\",\"order_by\":\"desc\",\"load_more_url\":\"\\/job\"},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false},{\"type\":\"testimonial\",\"name\":\"List Testimonial\",\"model\":{\"style\":\"index\",\"title\":\"Testimonials From Our Customers\",\"sub_title\":\"Lorem ipsum dolor sit amet elit, sed do eiusmod tempor\",\"list_item\":[{\"_active\":false,\"title\":\"Good theme\",\"desc\":\"Without JobHunt i\\u2019d be homeless, they found me a job and got me sorted out quickly with everything! Can\\u2019t quite\\u2026 The Mitech team works really hard to ensure high level of quality\",\"info_name\":\"Nicole Wells\",\"info_desc\":\"\",\"position\":\"Web Developer\",\"avatar\":103},{\"_active\":false,\"title\":\"Great quality!\",\"desc\":\"Without JobHunt i\\u2019d be homeless, they found me a job and got me sorted out quickly with everything! Can\\u2019t quite\\u2026 The Mitech team works really hard to ensure high level of quality\",\"info_name\":\"Gabriel Nolan\",\"position\":\"Consultant\",\"avatar\":114},{\"_active\":true,\"title\":\"Awesome Design\",\"desc\":\"Without JobHunt i\\u2019d be homeless, they found me a job and got me sorted out quickly with everything! Can\\u2019t quite\\u2026 The Mitech team works really hard to ensure high level of quality\",\"info_name\":\"Ashley Jenkins\",\"position\":\"Designer\",\"avatar\":115}]},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false},{\"type\":\"list_company\",\"name\":\"Company: List Items\",\"model\":{\"title\":\"Top Company Registered\",\"sub_title\":\"Some of the companies we\'ve helped recruit excellent applicants over the years.\",\"number\":10,\"category_id\":\"\",\"order\":\"name\",\"order_by\":\"asc\"},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false},{\"type\":\"about\",\"name\":\"About Us Block\",\"model\":{\"style\":\"style_2\",\"title\":\"Get applications from the world best talents.\",\"content\":\"<p>Search all the open positions on the web. Get your own personalized salary estimate. Read reviews on over 600,000 companies worldwide.<\\/p>\\r\\n                                    <ul class=\\\"list-style-one\\\">\\r\\n                                    <li>Bring to the table win-win survival<\\/li>\\r\\n                                    <li>Capitalize on low hanging fruit to identify<\\/li>\\r\\n                                    <li>But I must explain to you how all this<\\/li>\\r\\n                                    <\\/ul>\",\"button_name\":\"Post a Job\",\"button_url\":\"#\",\"button_target\":0,\"featured_image\":42,\"image_2\":44},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false},{\"type\":\"table_price\",\"name\":\"Table Pricing\",\"model\":{\"title\":\"Pricing Packages\",\"sub_title\":\"Lorem ipsum dolor sit amet elit, sed do eiusmod tempor.\",\"sale_off_text\":\"Save up to 10%\",\"monthly_title\":\"Monthly\",\"annual_title\":\"AnnualSave\",\"monthly_list\":[{\"_active\":false,\"title\":\"Basic\",\"price\":\"$199\",\"unit\":\"monthly\",\"featured\":\"<ul>\\r\\n                                                <li><span>1 job posting<\\/span><\\/li>\\r\\n                                                <li><span>0 featured job<\\/span><\\/li>\\r\\n                                                <li><span>Job displayed for 20 days<\\/span><\\/li>\\r\\n                                                <li><span>Premium Support 24\\/7 <\\/span><\\/li>\\r\\n                                            <\\/ul>\",\"button_name\":\"View Profile\",\"button_url\":\"#\"},{\"_active\":false,\"title\":\"Standard\",\"price\":\"$499\",\"unit\":\"monthly\",\"featured\":\"<ul>\\r\\n                                                <li><span>1 job posting<\\/span><\\/li>\\r\\n                                                <li><span>0 featured job<\\/span><\\/li>\\r\\n                                                <li><span>Job displayed for 20 days<\\/span><\\/li>\\r\\n                                                <li><span>Premium Support 24\\/7 <\\/span><\\/li>\\r\\n                                            <\\/ul>\",\"button_name\":\"View Profile\",\"button_url\":\"#\",\"is_recommended\":1},{\"_active\":false,\"title\":\"Extended\",\"price\":\"$799\",\"unit\":\"monthly\",\"featured\":\"<ul>\\r\\n                                                <li><span>1 job posting<\\/span><\\/li>\\r\\n                                                <li><span>0 featured job<\\/span><\\/li>\\r\\n                                                <li><span>Job displayed for 20 days<\\/span><\\/li>\\r\\n                                                <li><span>Premium Support 24\\/7 <\\/span><\\/li>\\r\\n                                            <\\/ul>\",\"button_name\":\"View Profile\",\"button_url\":\"#\"}],\"annual_list\":[{\"_active\":false,\"title\":\"Basic\",\"price\":\"$1199\",\"unit\":\"Annual\",\"featured\":\"<ul>\\r\\n                                                <li><span>1 job posting<\\/span><\\/li>\\r\\n                                                <li><span>0 featured job<\\/span><\\/li>\\r\\n                                                <li><span>Job displayed for 20 days<\\/span><\\/li>\\r\\n                                                <li><span>Premium Support 24\\/7 <\\/span><\\/li>\\r\\n                                            <\\/ul>\",\"button_name\":\"View Profile\",\"button_url\":\"#\"},{\"_active\":false,\"title\":\"Standard\",\"price\":\"$1499\",\"unit\":\"Annual\",\"featured\":\"<ul>\\r\\n                                                <li><span>1 job posting<\\/span><\\/li>\\r\\n                                                <li><span>0 featured job<\\/span><\\/li>\\r\\n                                                <li><span>Job displayed for 20 days<\\/span><\\/li>\\r\\n                                                <li><span>Premium Support 24\\/7 <\\/span><\\/li>\\r\\n                                            <\\/ul>\",\"button_name\":\"View Profile\",\"button_url\":\"#\",\"is_recommended\":1},{\"_active\":false,\"title\":\"Extended\",\"price\":\"$1799\",\"unit\":\"Annual\",\"featured\":\"<ul>\\r\\n                                                <li><span>1 job posting<\\/span><\\/li>\\r\\n                                                <li><span>0 featured job<\\/span><\\/li>\\r\\n                                                <li><span>Job displayed for 20 days<\\/span><\\/li>\\r\\n                                                <li><span>Premium Support 24\\/7 <\\/span><\\/li>\\r\\n                                            <\\/ul>\",\"button_name\":\"View Profile\",\"button_url\":\"#\"}]},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false}]', NULL, NULL, NULL, NULL, NULL, '2025-04-16 03:24:08', NULL),
(6, 'Home Page 4', '[{\"type\":\"hero_banner\",\"name\":\"Hero Banner\",\"model\":{\"style\":\"style_4\",\"title\":\"The Easiest Way to Get Your New Job\",\"sub_title\":\"\",\"popular_searches\":\"Designer, Developer, Web, IOS, PHP, Senior, Engineer,\",\"banner_image\":57,\"upload_cv_url\":\"\",\"banner_image_2\":\"\",\"list_images\":[],\"location_style\":\"autocomplete\"},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false},{\"type\":\"jobs_list\",\"name\":\"Jobs List\",\"model\":{\"style\":\"style_4\",\"title\":\"Most Popular Jobs\",\"sub_title\":\"Know your worth and find the job that qualify your life\",\"number\":6,\"job_categories\":[\"2\",\"3\",\"4\",\"9\"],\"order\":\"is_featured\",\"order_by\":\"desc\",\"load_more_url\":\"\"},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false},{\"type\":\"HowItWork\",\"name\":\"How It Works\",\"model\":{\"title\":\"How It Works?\",\"sub_title\":\"Job for anyone, anywhere\",\"list_item\":[{\"_active\":true,\"title\":\"Register an account <br> to start\",\"sub_title\":\"\",\"icon_image\":18},{\"_active\":true,\"title\":\"Explore over thousands <br> of resumes\",\"sub_title\":\"\",\"icon_image\":19},{\"_active\":true,\"title\":\"Find the most suitable <br> candidate\",\"sub_title\":\"\",\"icon_image\":20}],\"style\":\"style_3\"},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false},{\"type\":\"list_company\",\"name\":\"Company: List Items\",\"model\":{\"title\":\"Top Company Registered\",\"sub_title\":\"Some of the companies we\'ve helped recruit excellent applicants over the years.\",\"number\":10,\"category_id\":\"\",\"order\":\"name\",\"order_by\":\"asc\",\"style\":\"style_2\"},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false},{\"type\":\"job_categories\",\"name\":\"Job Categories\",\"model\":{\"style\":\"style_1\",\"title\":\"Popular Job Categories\",\"sub_title\":\"2020 jobs live - 293 added today.\",\"job_categories\":[\"6\",\"7\",\"8\",\"1\",\"2\",\"3\",\"4\",\"5\",\"9\"]},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false},{\"type\":\"list_news\",\"name\":\"News: List Items\",\"model\":{\"style\":\"style_3\",\"title\":\"Recent News Articles\",\"number\":3,\"category_id\":\"\",\"order\":\"\",\"order_by\":\"\",\"sub_title\":\"Fresh job related news content posted each day.\"},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false},{\"type\":\"brands_list\",\"name\":\"Brands List\",\"model\":{\"list_item\":[{\"_active\":false,\"title\":\"Invision\",\"image_id\":107,\"brand_link\":\"#\"},{\"_active\":false,\"title\":\"Figma\",\"image_id\":108,\"brand_link\":null},{\"_active\":false,\"title\":\"Amazon\",\"image_id\":109,\"brand_link\":null},{\"_active\":false,\"title\":\"Airbnb\",\"image_id\":110,\"brand_link\":null},{\"_active\":false,\"title\":\"Spotify\",\"image_id\":111,\"brand_link\":null},{\"_active\":false,\"title\":\"Slack\",\"image_id\":112,\"brand_link\":null},{\"_active\":false,\"title\":\"Paypal\",\"image_id\":113,\"brand_link\":null}],\"style\":\"style_1\"},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false}]', NULL, NULL, NULL, NULL, NULL, '2025-04-16 03:24:08', NULL),
(7, 'Home Page 5', '[{\"type\":\"hero_banner\",\"name\":\"Hero Banner\",\"model\":{\"style\":\"style_5\",\"title\":\"There Are <span class=\\\"colored\\\">93,178</span> Postings Here<br> For you!\",\"sub_title\":\"Find Jobs, Employment & Career Opportunities\",\"popular_searches\":\"Designer, Developer, Web, IOS, PHP, Senior, Engineer,\",\"list_images\":[{\"_active\":true,\"image_id\":50},{\"_active\":true,\"image_id\":51}],\"banner_image\":120,\"upload_cv_url\":\"\",\"banner_image_2\":134,\"banner_image_3\":135,\"location_style\":\"autocomplete\",\"style_5_banner_image_2\":121,\"style_5_banner_image_3\":122,\"style_5_list_images\":[{\"_active\":false,\"image_id\":52,\"url\":null},{\"_active\":false,\"image_id\":53,\"url\":null}],\"style_6_list_images\":\"\"},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false},{\"type\":\"jobs_list\",\"name\":\"Jobs List\",\"model\":{\"style\":\"style_5\",\"title\":\"Featured Jobs\",\"sub_title\":\"Know your worth and find the job that qualify your life\",\"number\":6,\"job_categories\":\"\",\"order\":\"is_featured\",\"order_by\":\"desc\",\"load_more_url\":\"/job\"},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false},{\"type\":\"job_categories\",\"name\":\"Job Categories\",\"model\":{\"style\":\"style_5\",\"title\":\"Popular Job Categories\",\"sub_title\":\"2020 jobs live - 293 added today.\",\"job_categories\":[\"1\",\"3\",\"4\",\"5\",\"6\",\"7\",\"8\",\"9\"]},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false},{\"type\":\"about\",\"name\":\"About Us Block\",\"model\":{\"style\":\"style_3\",\"title\":\"Get applications from the world best talents.\",\"content\":\"<p>Search all the open positions on the web. Get your own personalized salary estimate. Read reviews on over 600,000 companies worldwide.</p>\\n                                    <ul class=\\\"list-style-one\\\">\\n                                    <li>Bring to the table win-win survival</li>\\n                                    <li>Capitalize on low hanging fruit to identify</li>\\n                                    <li>But I must explain to you how all this</li>\\n                                    </ul>\",\"button_name\":\"Post a Job\",\"button_url\":\"#\",\"button_target\":0,\"featured_image\":123,\"image_2\":124,\"button_color\":\"\"},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false},{\"type\":\"list_news\",\"name\":\"News: List Items\",\"model\":{\"style\":\"style_2\",\"title\":\"Recent News Articles\",\"number\":3,\"category_id\":\"\",\"order\":\"\",\"order_by\":\"\",\"sub_title\":\"Fresh job related news content posted each day.\"},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false},{\"type\":\"testimonial\",\"name\":\"List Testimonial\",\"model\":{\"style\":\"style_4\",\"title\":\"Testimonials From Our Customers\",\"sub_title\":\"Lorem ipsum dolor sit amet elit, sed do eiusmod tempor\",\"list_item\":[{\"_active\":true,\"title\":\"Good theme\",\"desc\":\"Without JobHunt i’d be homeless, they found me a job and got me sorted out quickly with everything! Can’t quite… The Mitech team works really hard to ensure high level of quality\",\"info_name\":\"Nicole Wells\",\"info_desc\":\"\",\"position\":\"Web Developer\",\"avatar\":125},{\"_active\":true,\"title\":\"Great quality!\",\"desc\":\"Without JobHunt i’d be homeless, they found me a job and got me sorted out quickly with everything! Can’t quite… The Mitech team works really hard to ensure high level of quality\",\"info_name\":\"Gabriel Nolan\",\"position\":\"Consultant\",\"avatar\":125},{\"_active\":true,\"title\":\"Awesome Design\",\"desc\":\"Without JobHunt i’d be homeless, they found me a job and got me sorted out quickly with everything! Can’t quite… The Mitech team works really hard to ensure high level of quality\",\"info_name\":\"Ashley Jenkins\",\"position\":\"Designer\",\"avatar\":125}]},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false},{\"type\":\"brands_list\",\"name\":\"Brands List\",\"model\":{\"list_item\":[{\"_active\":false,\"title\":\"Invision\",\"image_id\":107,\"brand_link\":\"#\"},{\"_active\":false,\"title\":\"Figma\",\"image_id\":108,\"brand_link\":null},{\"_active\":false,\"title\":\"Amazon\",\"image_id\":109,\"brand_link\":null},{\"_active\":false,\"title\":\"Airbnb\",\"image_id\":110,\"brand_link\":null},{\"_active\":false,\"title\":\"Spotify\",\"image_id\":111,\"brand_link\":null},{\"_active\":false,\"title\":\"Slack\",\"image_id\":112,\"brand_link\":null},{\"_active\":false,\"title\":\"Paypal\",\"image_id\":113,\"brand_link\":null}],\"style\":\"style_2\"},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false},{\"type\":\"list_company\",\"name\":\"Company: List Items\",\"model\":{\"title\":\"Top Company Registered\",\"sub_title\":\"Some of the companies we\'ve helped recruit excellent applicants over the years.\",\"number\":10,\"category_id\":\"\",\"order\":\"name\",\"order_by\":\"asc\",\"style\":\"style_3\"},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false}]', NULL, NULL, NULL, NULL, NULL, '2025-04-16 03:24:08', NULL),
(8, 'Home Page 6', '[{\"type\":\"hero_banner\",\"name\":\"Hero Banner\",\"model\":{\"style\":\"style_6\",\"title\":\"Find a Perfect <br>Candidate\",\"sub_title\":\"Find Jobs, Employment & Career Opportunities\",\"popular_searches\":\"Designer, Developer, Web, IOS, PHP, Senior, Engineer,\",\"upload_cv_url\":\"\",\"banner_image\":126,\"banner_image_2\":\"\",\"location_style\":\"autocomplete\",\"style_6_list_images\":[{\"_active\":false,\"image_id\":52},{\"_active\":false,\"image_id\":53},{\"_active\":false,\"image_id\":54},{\"_active\":false,\"image_id\":55}]},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false},{\"type\":\"job_categories\",\"name\":\"Job Categories\",\"model\":{\"style\":\"style_3\",\"title\":\"Popular Job Categories\",\"sub_title\":\"2020 jobs live - 293 added today.\",\"job_categories\":[\"1\",\"2\",\"3\",\"4\",\"5\",\"6\",\"7\",\"8\"]},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false},{\"type\":\"jobs_list\",\"name\":\"Jobs List\",\"model\":{\"style\":\"style_6\",\"title\":\"Featured Jobs\",\"sub_title\":\"Know your worth and find the job that qualify your life\",\"number\":5,\"job_categories\":\"\",\"order\":\"is_featured\",\"order_by\":\"desc\",\"load_more_url\":\"/job\"},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false},{\"type\":\"call_to_action\",\"name\":\"Call To Action\",\"model\":{\"style\":\"style_1\",\"title\":\"Make a Difference with Your Online Resume!\",\"sub_title\":\"Your resume in minutes with JobHunt resume assistant is ready!\",\"link_search\":\"Create an Account\",\"url_search\":\"/register\",\"link_apply\":\"\",\"url_apply\":\"\",\"bg_image\":127},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false},{\"type\":\"testimonial\",\"name\":\"List Testimonial\",\"model\":{\"style\":\"style_3\",\"title\":\"Testimonials From Our Customers\",\"sub_title\":\"Lorem ipsum dolor sit amet elit, sed do eiusmod tempor\",\"list_item\":[{\"_active\":false,\"title\":\"Good theme\",\"desc\":\"Without JobHunt i’d be homeless, they found me a job and got me sorted out quickly with everything! Can’t quite… The Mitech team works really hard to ensure high level of quality\",\"info_name\":\"Nicole Wells\",\"info_desc\":\"\",\"position\":\"Web Developer\",\"avatar\":103},{\"_active\":false,\"title\":\"Great quality!\",\"desc\":\"Without JobHunt i’d be homeless, they found me a job and got me sorted out quickly with everything! Can’t quite… The Mitech team works really hard to ensure high level of quality\",\"info_name\":\"Gabriel Nolan\",\"position\":\"Consultant\",\"avatar\":114},{\"_active\":true,\"title\":\"Awesome Design\",\"desc\":\"Without JobHunt i’d be homeless, they found me a job and got me sorted out quickly with everything! Can’t quite… The Mitech team works really hard to ensure high level of quality\",\"info_name\":\"Ashley Jenkins\",\"position\":\"Designer\",\"avatar\":115}]},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false},{\"type\":\"brands_list\",\"name\":\"Brands List\",\"model\":{\"list_item\":[{\"_active\":true,\"title\":\"Invision\",\"image_id\":107,\"brand_link\":\"#\"},{\"_active\":true,\"title\":\"figma\",\"image_id\":108,\"brand_link\":\"#\"},{\"_active\":true,\"title\":\"amazon\",\"image_id\":109,\"brand_link\":\"#\"},{\"_active\":true,\"title\":\"airbnb\",\"image_id\":110,\"brand_link\":\"#\"},{\"_active\":true,\"title\":\"spotify\",\"image_id\":111,\"brand_link\":\"#\"},{\"_active\":true,\"title\":\"slack\",\"image_id\":112,\"brand_link\":\"#\"},{\"_active\":true,\"title\":\"paypal\",\"image_id\":113,\"brand_link\":\"#\"}],\"style\":\"style_1\"},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false},{\"type\":\"list_news\",\"name\":\"News: List Items\",\"model\":{\"style\":\"style_4\",\"title\":\"Recent News Articles\",\"number\":4,\"category_id\":\"\",\"order\":\"\",\"order_by\":\"\",\"sub_title\":\"Fresh job related news content posted each day.\"},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false},{\"type\":\"list_candidates\",\"name\":\"Candidates Blocks\",\"model\":{\"title\":\"Featured Candidates\",\"desc\":\"Lorem ipsum dolor sit amet elit, sed do eiusmod tempor\",\"number\":10,\"category_id\":\"\",\"order\":\"title\",\"order_by\":\"desc\"},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false}]', NULL, NULL, NULL, NULL, NULL, '2025-04-16 03:24:08', NULL),
(9, 'Home Page 7', '[{\"type\":\"hero_banner\",\"name\":\"Hero Banner\",\"model\":{\"style\":\"style_7\",\"title\":\"There Are <span class=\\\"colored\\\">93,178</span> <br>Postings Here For you!\",\"sub_title\":\"Find Jobs, Employment & Career Opportunities\",\"popular_searches\":\"Designer,Developer,Web,IOS,PHP,Senior,Engineer\",\"upload_cv_url\":\"\",\"banner_image\":128,\"banner_image_2\":\"\",\"style_5_banner_image_2\":\"\",\"style_5_banner_image_3\":\"\",\"list_images\":\"\",\"style_5_list_images\":\"\",\"style_6_list_images\":\"\",\"style_7_list_images\":[{\"_active\":true,\"image_id\":129,\"url\":null},{\"_active\":true,\"image_id\":130,\"url\":null},{\"_active\":true,\"image_id\":131,\"url\":null},{\"_active\":true,\"image_id\":132,\"url\":null},{\"_active\":true,\"image_id\":133,\"url\":null},{\"_active\":true,\"image_id\":134,\"url\":null}],\"location_style\":\"\"},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false},{\"type\":\"jobs_list\",\"name\":\"Jobs List\",\"model\":{\"style\":\"style_7\",\"title\":\"Featured Jobs\",\"sub_title\":\"Know your worth and find the job that qualify your life\",\"number\":\"\",\"job_categories\":[\"9\",\"7\",\"6\",\"4\",\"5\",\"3\",\"2\",\"1\"],\"order\":\"is_featured\",\"order_by\":\"asc\",\"load_more_url\":\"/job\"},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false},{\"type\":\"about\",\"name\":\"About Us Block\",\"model\":{\"style\":\"style_4\",\"title\":\"Video Job Ads: Our Top Pick\",\"sub_title\":\"Sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt. Labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.\",\"content\":\"<ul>\\n<li>Creative Study Pattern</li>\\n<li>Quick Crash Courses</li>\\n<li>Certification Awarded</li>\\n<li>Provided with Experimental Examples</li>\\n</ul>\",\"button_name\":\"Watch Video\",\"button_url\":\"https://www.youtube.com/watch?v=4UvS3k8D4rs\",\"button_target\":\"\",\"button_color\":\"\",\"featured_image\":135,\"image_2\":\"\"},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false},{\"type\":\"BlockCounter\",\"name\":\"Block Counter\",\"model\":{\"style\":\"style_2\",\"list_item\":[{\"_active\":true,\"number\":\"4\",\"symbol\":\"M\",\"desc\":\"4 million daily active users\"},{\"_active\":true,\"number\":\"12\",\"symbol\":\"K\",\"desc\":\"Over 12k open job positions\"},{\"_active\":true,\"number\":\"20\",\"symbol\":\"M\",\"desc\":\"Over 20 million stories shared\"}]},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false},{\"type\":\"list_company\",\"name\":\"Company: List Items\",\"model\":{\"style\":\"style_4\",\"title\":\"Top Company Registered\",\"sub_title\":\"Some of the companies we’ ve helped recruit excellent applicants over the years.\",\"number\":15,\"category_id\":[\"9\",\"7\",\"5\",\"6\",\"4\",\"3\",\"2\"],\"order\":\"name\",\"order_by\":\"desc\"},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false},{\"type\":\"testimonial\",\"name\":\"List Testimonial\",\"model\":{\"style\":\"style_5\",\"title\":\"Testimonials From Our Customers\",\"sub_title\":\"Lorem ipsum dolor sit amet elit, sed do eiusmod tempor\",\"list_item\":[{\"_active\":true,\"title\":\"Great quality!\",\"desc\":\"Without JobHunt i’d be homeless, they found me a job and got me sorted out quickly with everything! Can’t quite… The Mitech team works really hard to ensure high level of quality\",\"info_name\":\"Brooklyn Simmons\",\"position\":\"Web Developer\",\"avatar\":151},{\"_active\":true,\"title\":\"Great quality!\",\"desc\":\"Without JobHunt i’d be homeless, they found me a job and got me sorted out quickly with everything! Can’t quite… The Mitech team works really hard to ensure high level of quality\",\"info_name\":\"Brooklyn Simmons\",\"position\":\"Web Developer\",\"avatar\":136}],\"banner_image\":137,\"banner_image_2\":138},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false},{\"type\":\"job_categories\",\"name\":\"Job Categories\",\"model\":{\"style\":\"style_5\",\"title\":\"Popular Job Categories\",\"sub_title\":\"2020 jobs live - 293 added today.\",\"job_categories\":[\"9\",\"7\",\"5\",\"6\",\"8\",\"4\",\"2\",\"3\",\"1\"]},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false},{\"type\":\"jobs_list\",\"name\":\"Jobs List\",\"model\":{\"style\":\"style_8\",\"title\":\"Recent Jobs\",\"sub_title\":\"Know your worth and find the job that qualify your life\",\"number\":9,\"job_categories\":[\"1\",\"2\",\"3\",\"4\",\"5\",\"6\",\"7\",\"8\",\"9\"],\"order\":\"id\",\"order_by\":\"desc\",\"load_more_url\":\"\"},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false},{\"type\":\"list_candidates\",\"name\":\"Candidates: List Items\",\"model\":{\"style\":\"style_2\",\"title\":\"Featured Candidates\",\"desc\":\"Lorem ipsum dolor sit amet elit, sed do eiusmod tempor\",\"number\":6,\"category_id\":\"\",\"order\":\"id\",\"order_by\":\"desc\"},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false},{\"type\":\"BlockAds\",\"name\":\"Ads Us Block\",\"model\":{\"style\":\"style_1\",\"list_item\":[{\"_active\":true,\"title\":\"Recruiting\",\"sub_title\":\"Now\",\"button_name\":\"View All\",\"image_id\":139,\"ads_link\":\"#\"},{\"_active\":true,\"title\":\"Membership\",\"sub_title\":\"Opportunities\",\"button_name\":\"View All\",\"image_id\":140,\"ads_link\":\"#\"},{\"_active\":true,\"title\":\"Post a\",\"sub_title\":\"Vacancy\",\"button_name\":\"View All\",\"image_id\":141,\"ads_link\":\"#\"}]},\"component\":\"RegularBlock\",\"open\":true}]', NULL, NULL, NULL, NULL, NULL, '2025-04-16 03:24:08', NULL),
(10, 'Home Page 8', '[{\"type\":\"hero_banner\",\"name\":\"Hero Banner\",\"model\":{\"style\":\"style_8\",\"title\":\"Find Jobs\",\"sub_title\":\"Jobs & Job search. Find jobs in global. Executive jobs & work. Employment\",\"popular_searches\":\"Designer,Developer,Web,IOS,PHP,Senior,Engineer\",\"upload_cv_url\":\"#\",\"banner_image\":142,\"banner_image_2\":157,\"style_5_banner_image_2\":\"\",\"style_5_banner_image_3\":\"\",\"list_images\":\"\",\"style_5_list_images\":\"\",\"style_6_list_images\":\"\",\"style_7_list_images\":\"\",\"location_style\":\"autocomplete\"},\"component\":\"RegularBlock\",\"open\":true},{\"type\":\"brands_list\",\"name\":\"Brands List\",\"model\":{\"style\":\"style_3\",\"title\":\"Top Companies Hiring at Superio Now\",\"sub_title\":\"Lorem ipsum dolor sit amet elit, sed do eiusmod tempor\",\"list_item\":[{\"_active\":true,\"title\":\"1\",\"image_id\":143,\"brand_link\":\"#\"},{\"_active\":true,\"title\":\"2\",\"image_id\":144,\"brand_link\":\"#\"},{\"_active\":true,\"title\":\"3\",\"image_id\":145,\"brand_link\":\"#\"},{\"_active\":true,\"title\":\"4\",\"image_id\":146,\"brand_link\":\"#\"},{\"_active\":true,\"title\":\"5\",\"image_id\":147,\"brand_link\":\"#\"},{\"_active\":true,\"title\":\"6\",\"image_id\":148,\"brand_link\":\"#\"},{\"_active\":true,\"title\":\"7\",\"image_id\":149,\"brand_link\":\"#\"},{\"_active\":true,\"title\":\"8\",\"image_id\":136,\"brand_link\":\"#\"}]},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false},{\"type\":\"call_to_action\",\"name\":\"Call To Action\",\"model\":{\"style\":\"style_4\",\"title\":\"I am Recruiter\",\"sub_title\":\"One of our One of our jobs has some kind of flexibility jobs has some kind of flexibility option such as telecommuting, a part-time schedule or a flexible or flextime.\",\"link_search\":\"Post New Job\",\"url_search\":\"#\",\"link_apply\":\"\",\"url_apply\":\"\",\"bg_image\":150},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false},{\"type\":\"jobs_list\",\"name\":\"Jobs List\",\"model\":{\"style\":\"style_9\",\"title\":\"Featured Jobs\",\"sub_title\":\"Know your worth and find the job that qualify your life\",\"number\":8,\"job_categories\":[\"9\",\"8\",\"6\",\"7\",\"5\",\"4\"],\"order\":\"id\",\"order_by\":\"\",\"load_more_url\":\"/job\"},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false},{\"type\":\"call_to_action\",\"name\":\"Call To Action\",\"model\":{\"style\":\"style_5\",\"title\":\"I am Jobseeker\",\"sub_title\":\"One of our One of our jobs has some kind of flexibility jobs has some kind of flexibility option such as telecommuting, a part-time schedule or a flexible or flextime.\",\"link_search\":\"Browse Job\",\"url_search\":\"#\",\"link_apply\":\"\",\"url_apply\":\"\",\"bg_image\":150},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false},{\"type\":\"list_company\",\"name\":\"Company: List Items\",\"model\":{\"style\":\"style_5\",\"title\":\"Top Company Registered\",\"sub_title\":\"Some of the companies we’ve helped recruit excellent applicants over the years.\",\"number\":6,\"category_id\":[\"9\",\"7\",\"8\",\"6\",\"5\",\"4\"],\"order\":\"id\",\"order_by\":\"asc\",\"load_more_url\":\"/companies\"},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false},{\"type\":\"list_locations\",\"name\":\"List Locations\",\"model\":{\"title\":\"Featured Cities\",\"sub_title\":\"Lorem ipsum dolor sit amet elit, sed do eiusmod tempor\",\"number\":5,\"order\":\"id\",\"order_by\":\"asc\",\"custom_ids\":[],\"style\":\"style_2\",\"load_more_url\":\"/job\",\"load_more_name\":\"Browse All Locations \",\"layout\":\"style_2\"},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false},{\"type\":\"list_news\",\"name\":\"News: List Items\",\"model\":{\"style\":\"style_1\",\"title\":\"Recent News Articles\",\"sub_title\":\"Fresh job related news content posted each day.\",\"number\":3,\"category_id\":\"\",\"order\":\"id\",\"order_by\":\"desc\"},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false},{\"type\":\"BlockSubscribe\",\"name\":\"Subscribe Block\",\"model\":{\"style\":\"style_1\",\"title\":\"Subscribe Our Newsletter\",\"sub_title\":\"Advertise your jobs to millions of monthly users and search 15.8 million CVs in our database.\",\"button_name\":\"Subscribe\"},\"component\":\"RegularBlock\",\"open\":true}]', NULL, NULL, NULL, NULL, NULL, '2025-04-16 03:24:08', NULL),
(11, 'Home Page 9', '[{\"type\":\"hero_banner\",\"name\":\"Hero Banner\",\"model\":{\"style\":\"style_9\",\"title\":\"15,000+ Browse Jobs\",\"sub_title\":\"Find Jobs, Employment & Career Opportunities\",\"popular_searches\":\"\",\"upload_cv_url\":\"\",\"banner_image\":158,\"banner_image_2\":\"\",\"style_5_banner_image_2\":\"\",\"style_5_banner_image_3\":\"\",\"list_images\":\"\",\"style_5_list_images\":\"\",\"style_6_list_images\":\"\",\"style_7_list_images\":\"\",\"location_style\":\"autocomplete\",\"list_counter\":[{\"_active\":true,\"title\":\"97216\",\"sub_title\":\"Jobs\"},{\"_active\":true,\"title\":\"4782\",\"sub_title\":\"Members\"},{\"_active\":true,\"title\":\"5322\",\"sub_title\":\"Resume\"},{\"_active\":true,\"title\":\"6329\",\"sub_title\":\"Company\"}]},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false},{\"type\":\"jobs_list\",\"name\":\"Jobs List\",\"model\":{\"style\":\"style_10\",\"title\":\"Featured Jobs\",\"sub_title\":\"Know your worth and find the job that qualify your life\",\"number\":9,\"job_categories\":[\"9\",\"8\",\"7\",\"6\",\"5\",\"4\",\"3\",\"2\",\"1\"],\"order\":\"id\",\"order_by\":\"desc\",\"load_more_url\":\"\"},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false},{\"type\":\"about\",\"name\":\"About Us Block\",\"model\":{\"style\":\"style_5\",\"title\":\"Find Jobs with 3 easy steps\",\"sub_title\":\"Sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt. Labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.\",\"content\":\"<ul>\\n<li><span class=\\\"count\\\">1</span> Register an account to start</li>\\n<li><span class=\\\"count\\\">2</span> Explore over thousands of resumes</li>\\n<li><span class=\\\"count\\\">3</span> Find the most suitable candidate</li>\\n</ul>\",\"button_name\":\"\",\"button_url\":\"\",\"button_target\":\"\",\"button_color\":\"\",\"featured_image\":159,\"image_2\":160,\"sub_image_2\":\"300k+ Employers\"},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false},{\"type\":\"call_to_action\",\"name\":\"Call To Action\",\"model\":{\"style\":\"style_1\",\"title\":\"Make a Difference with Your Online Resume!\",\"sub_title\":\"Your resume in minutes with JobHunt resume assistant is ready!\",\"link_search\":\"Create an Account\",\"url_search\":\"#\",\"link_apply\":\"\",\"url_apply\":\"\",\"bg_image\":161},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false},{\"type\":\"job_categories\",\"name\":\"Job Categories\",\"model\":{\"style\":\"style_1\",\"title\":\"Popular Job Categories\",\"sub_title\":\"2020 jobs live - 293 added today.\",\"job_categories\":[\"9\",\"7\",\"8\",\"6\",\"5\",\"4\",\"3\",\"2\",\"1\"]},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false},{\"type\":\"list_candidates\",\"name\":\"Candidates: List Items\",\"model\":{\"style\":\"style_1\",\"title\":\"Featured Candidates\",\"desc\":\"Lorem ipsum dolor sit amet elit, sed do eiusmod tempor\",\"number\":12,\"category_id\":\"\",\"order\":\"id\",\"order_by\":\"desc\",\"load_more_url\":\"/candidate\",\"load_more_name\":\"Browse All\"},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false},{\"type\":\"testimonial\",\"name\":\"List Testimonial\",\"model\":{\"style\":\"style_6\",\"title\":\"Testimonials From Our Customers\",\"sub_title\":\"Lorem ipsum dolor sit amet elit, sed do eiusmod tempor\",\"list_item\":[{\"_active\":true,\"title\":\"Great quality!\",\"desc\":\"Without JobHunt i’d be homeless, they found me a job and got me sorted out quickly with everything! Can’t quite… The Mitech team works really hard to ensure high level of quality\",\"info_name\":\"Nicole Wells\",\"position\":\"Web Developer\",\"avatar\":163},{\"_active\":true,\"title\":\"Great quality!\",\"desc\":\"Without JobHunt i’d be homeless, they found me a job and got me sorted out quickly with everything! Can’t quite… The Mitech team works really hard to ensure high level of quality\",\"info_name\":\"Gabriel Nolan\",\"position\":\"Consultant\",\"avatar\":164},{\"_active\":true,\"title\":\"Great quality!\",\"desc\":\"Without JobHunt i’d be homeless, they found me a job and got me sorted out quickly with everything! Can’t quite… The Mitech team works really hard to ensure high level of quality\",\"info_name\":\"Nicole Wells\",\"position\":\"Web Developer\",\"avatar\":163},{\"_active\":true,\"title\":\"Great quality!\",\"desc\":\"Without JobHunt i’d be homeless, they found me a job and got me sorted out quickly with everything! Can’t quite… The Mitech team works really hard to ensure high level of quality\",\"info_name\":\"Gabriel Nolan\",\"position\":\"Consultant\",\"avatar\":164}],\"banner_image\":162,\"banner_image_2\":\"\"},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false},{\"type\":\"BlockCounter\",\"name\":\"Block Counter\",\"model\":{\"style\":\"style_1\",\"list_item\":[{\"_active\":true,\"number\":\"4\",\"symbol\":\"M\",\"desc\":\"4 million daily active users\"},{\"_active\":true,\"number\":\"12\",\"symbol\":\"k\",\"desc\":\"Over 12k open job positions\"},{\"_active\":true,\"number\":\"20\",\"symbol\":\"M\",\"desc\":\"Over 20 million stories shared\"}]},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false},{\"type\":\"list_news\",\"name\":\"News: List Items\",\"model\":{\"style\":\"style_1\",\"title\":\"Recent News Articles\",\"sub_title\":\"Fresh job related news content posted each day.\",\"number\":3,\"category_id\":\"\",\"order\":\"id\",\"order_by\":\"desc\"},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false},{\"type\":\"call_to_action\",\"name\":\"Call To Action\",\"model\":{\"style\":\"style_6\",\"title\":\"Gat a question?\",\"sub_title\":\"We\'re here to help. Check out our FAQs, send us an email or call us at 1 \",\"link_search\":\"(900) 777-7777.\",\"url_search\":\"#\",\"link_apply\":\"Get Started\",\"url_apply\":\"#\",\"bg_image\":\"\"},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false}]', NULL, NULL, NULL, NULL, NULL, '2025-04-16 03:24:08', NULL),
(12, 'Job Alerts', '[{\"type\":\"text\",\"model\":{\"content\":\"<h2 style=\\\"text-align: center;\\\">Create Job Alert<\\/h2>\\r\\n                                            <p style=\\\"text-align: center;\\\">Subscribe to receive instant alerts of new relevant jobs directly to your email inbox.<\\/p>\",\"class\":\"ja-container mt-5\"}},{\"type\":\"job_alert\",\"model\":{\"title\":\"Create Job Alert\"}}]', NULL, NULL, NULL, NULL, NULL, '2025-04-16 03:24:08', '2025-04-16 03:24:08');

INSERT INTO `media_files` (`id`, `file_name`, `file_path`, `file_size`, `file_type`, `file_extension`, `create_user`, `update_user`, `deleted_at`, `app_id`, `app_user_id`, `file_width`, `file_height`, `created_at`, `updated_at`, `folder_id`, `driver`) VALUES
(1, 'avatar', 'demo/general/avatar.jpg', NULL, 'image/jpeg', 'jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(2, 'avatar-2', 'demo/general/avatar-2.jpg', NULL, 'image/jpeg', 'jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(3, 'avatar-3', 'demo/general/avatar-3.jpg', NULL, 'image/jpeg', 'jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(4, 'ico_adventurous', 'demo/general/ico_adventurous.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(5, 'ico_localguide', 'demo/general/ico_localguide.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(6, 'ico_maps', 'demo/general/ico_maps.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(7, 'ico_paymethod', 'demo/general/ico_paymethod.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(8, 'logo', 'demo/general/logo.svg', NULL, 'image/svg+xml', 'svg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(9, 'logo-white', 'demo/general/logo-2.svg', NULL, 'image/svg+xml', 'svg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(10, 'bg_contact', 'demo/general/bg-contact.jpg', NULL, 'image/jpeg', 'jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(11, 'favicon', 'demo/general/favicon.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(12, 'thumb-vendor-register', 'demo/general/thumb-vendor-register.jpg', NULL, 'image/jpeg', 'jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(13, 'bg-video-vendor-register1', 'demo/general/bg-video-vendor-register1.jpg', NULL, 'image/jpeg', 'jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(14, 'ico_chat_1', 'demo/general/ico_chat_1.svg', NULL, 'image/svg', 'svg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(15, 'ico_friendship_1', 'demo/general/ico_friendship_1.svg', NULL, 'image/svg', 'svg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(16, 'ico_piggy-bank_1', 'demo/general/ico_piggy-bank_1.svg', NULL, 'image/svg', 'svg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(17, 'ads-bg-4', 'demo/general/ads-bg-4.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(18, 'process-1', 'demo/general/process-1.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(19, 'process-2', 'demo/general/process-2.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(20, 'process-3', 'demo/general/process-3.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(21, 'home-6-banner', 'demo/general/home-6-banner.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(22, 'job-post-img', 'demo/general/job-post-img.jpg', NULL, 'image/jpeg', 'jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(23, 'video-img', 'demo/general/video-img.jpg', NULL, 'image/jpeg', 'jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(24, 'location-1', 'demo/location/location-1.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(25, 'location-2', 'demo/location/location-2.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(26, 'location-3', 'demo/location/location-3.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(27, 'location-4', 'demo/location/location-4.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(28, 'location-5', 'demo/location/location-5.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(29, 'location-6', 'demo/location/location-6.jpg', NULL, 'image/jpeg', 'jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(30, 'location-7', 'demo/location/location-7.jpg', NULL, 'image/jpeg', 'jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(31, 'location-8', 'demo/location/location-8.jpg', NULL, 'image/jpeg', 'jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(32, 'news-1', 'demo/news/news-1.jpg', NULL, 'image/jpeg', 'jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(33, 'news-2', 'demo/news/news-2.jpg', NULL, 'image/jpeg', 'jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(34, 'news-3', 'demo/news/news-3.jpg', NULL, 'image/jpeg', 'jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(35, 'news-4', 'demo/news/news-4.jpg', NULL, 'image/jpeg', 'jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(36, 'news-5', 'demo/news/news-5.jpg', NULL, 'image/jpeg', 'jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(37, 'news-6', 'demo/news/news-6.jpg', NULL, 'image/jpeg', 'jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(38, 'news-7', 'demo/news/news-7.jpg', NULL, 'image/jpeg', 'jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(39, 'news-banner', 'demo/news/news-banner.jpg', NULL, 'image/jpeg', 'jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(40, 'image-1', 'demo/general/image-1.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(41, 'image-2', 'demo/general/image-2.jpg', NULL, 'image/jpeg', 'jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(42, 'image-3', 'demo/general/image-3.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(43, 'count-employers', 'demo/general/count-employers.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(44, 'app-list', 'demo/general/app-list.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(45, 'mobile-app', 'demo/general/mobile-app.jpg', NULL, 'image/jpeg', 'jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(46, 'apple', 'demo/general/apple.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(47, 'google', 'demo/general/google.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(48, 'bg-1', 'demo/general/bg-1.jpg', NULL, 'image/jpeg', 'jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(49, 'banner-img-1', 'demo/general/banner-img-1.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(50, 'banner-img-2', 'demo/general/banner-img-2.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(51, 'banner-img-3', 'demo/general/banner-img-3.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(52, 'banner-1-1', 'demo/general/banner-1-1.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(53, 'banner-1-2', 'demo/general/banner-1-2.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(54, 'banner-1-3', 'demo/general/banner-1-3.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(55, 'banner-1-4', 'demo/general/banner-1-4.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(56, 'banner-2-1', 'demo/general/banner-2-1.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(57, 'homepage-4-banner', 'demo/general/homepage-4-banner.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(58, 'candidate-1', 'demo/candidate/candidate-1.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(59, 'candidate-2', 'demo/candidate/candidate-2.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(60, 'candidate-3', 'demo/candidate/candidate-3.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(61, 'candidate-4', 'demo/candidate/candidate-4.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(62, 'candidate-5', 'demo/candidate/candidate-5.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(63, 'candidate-6', 'demo/candidate/candidate-6.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(64, 'candidate-7', 'demo/candidate/candidate-7.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(65, 'candidate-8', 'demo/candidate/candidate-8.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(66, 'candidate-9', 'demo/candidate/candidate-9.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(67, 'candidate', 'demo/candidate/candidate.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(68, 'portfolio-1', 'demo/candidate/portfolio-1.jpg', NULL, 'image/jpeg', 'jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(69, 'portfolio-2', 'demo/candidate/portfolio-2.jpg', NULL, 'image/jpeg', 'jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(70, 'portfolio-3', 'demo/candidate/portfolio-3.jpg', NULL, 'image/jpeg', 'jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(71, 'portfolio-4', 'demo/candidate/portfolio-4.jpg', NULL, 'image/jpeg', 'jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(72, 'portfolio-5', 'demo/candidate/portfolio-5.jpg', NULL, 'image/jpeg', 'jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(73, 'portfolio-6', 'demo/candidate/portfolio-6.jpg', NULL, 'image/jpeg', 'jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(74, 'resume_1', 'demo/candidate/resume_1.docx', NULL, 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'docx', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(75, 'resume_2', 'demo/candidate/resume_2.docx', NULL, 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'docx', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(76, 'resume_3', 'demo/candidate/resume_3.docx', NULL, 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'docx', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(77, 'resume_4', 'demo/candidate/resume_4.docx', NULL, 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'docx', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(78, 'resume_5', 'demo/candidate/resume_5.docx', NULL, 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'docx', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(79, 'resume_6', 'demo/candidate/resume_6.docx', NULL, 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'docx', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(80, 'resume_7', 'demo/candidate/resume_7.docx', NULL, 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'docx', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(81, 'resume_8', 'demo/candidate/resume_8.docx', NULL, 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'docx', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(82, 'resume_9', 'demo/candidate/resume_9.docx', NULL, 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'docx', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(83, 'resume_10', 'demo/candidate/resume_10.docx', NULL, 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'docx', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(84, 'bc_company-1', 'demo/company/bc_company-1.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(85, 'bc_company-2', 'demo/company/bc_company-2.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(86, 'bc_company-3', 'demo/company/bc_company-3.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(87, 'bc_company-4', 'demo/company/bc_company-4.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(88, 'bc_company-5', 'demo/company/bc_company-5.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(89, 'bc_company-6', 'demo/company/bc_company-6.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(90, 'bc_company-7', 'demo/company/bc_company-7.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(91, 'bc_company-8', 'demo/company/bc_company-8.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(92, 'bc_company-9', 'demo/company/bc_company-9.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(93, 'bc_company-10', 'demo/company/bc_company-10.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(94, 'bc_company-11', 'demo/company/bc_company-11.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(95, 'bc_company-12', 'demo/company/bc_company-12.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(96, 'about-img-1', 'demo/general/about-img-1.jpg', NULL, 'image/jpeg', 'jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(97, 'about-img-2', 'demo/general/about-img-2.jpg', NULL, 'image/jpeg', 'jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(98, 'about-img-3', 'demo/general/about-img-3.jpg', NULL, 'image/jpeg', 'jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(99, 'about-img-4', 'demo/general/about-img-4.jpg', NULL, 'image/jpeg', 'jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(100, 'about-img-5', 'demo/general/about-img-5.jpg', NULL, 'image/jpeg', 'jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(101, 'about-img-6', 'demo/general/about-img-6.jpg', NULL, 'image/jpeg', 'jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(102, 'call-to-action-bg-1', 'demo/general/call-to-action-bg-1.jpg', NULL, 'image/jpeg', 'jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(103, 'testi-thumb-1', 'demo/general/testi-thumb-1.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(104, 'how-it-work-1', 'demo/general/how-it-work-1.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(105, 'how-it-work-2', 'demo/general/how-it-work-2.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(106, 'how-it-work-3', 'demo/general/how-it-work-3.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(107, 'brand-1', 'demo/general/brand-1.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(108, 'brand-2', 'demo/general/brand-2.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(109, 'brand-3', 'demo/general/brand-3.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(110, 'brand-4', 'demo/general/brand-4.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(111, 'brand-5', 'demo/general/brand-5.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(112, 'brand-6', 'demo/general/brand-6.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(113, 'brand-7', 'demo/general/brand-7.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(114, 'testi-thumb-2', 'demo/general/testi-thumb-2.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(115, 'testi-thumb-3', 'demo/general/testi-thumb-3.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(116, 'placeholder', 'demo/general/placeholder.svg', NULL, 'image/svg+xml', 'svg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(117, 'smartphone', 'demo/general/smartphone.svg', NULL, 'image/svg+xml', 'svg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(118, 'letter', 'demo/general/letter.svg', NULL, 'image/svg+xml', 'svg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(119, 'contact-call-to-action', 'demo/general/contact-call-to-action.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(120, 'home5-banner-1', 'demo/general/home5-banner-1.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(121, 'home5-banner-2', 'demo/general/home5-banner-2.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(122, 'home5-banner-3', 'demo/general/home5-banner-3.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(123, 'home5-image-4', 'demo/general/home5-image-4.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(124, 'app-list-2', 'demo/general/app-list-2.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(125, 'home5-testimonial-image', 'demo/general/home5-testimonial-image.jpg', NULL, 'image/jpeg', 'jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(126, 'home-6-banner', 'demo/general/home-6-banner.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(127, 'call-to-action-2', 'demo/general/call-to-action-2.jpg', NULL, 'image/jpeg', 'jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(128, 'banner-img-8', 'demo/general/banner-img-8.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(129, 'banner-7-1', 'demo/general/banner-7-1.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(130, 'banner-7-2', 'demo/general/banner-7-2.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(131, 'banner-7-3', 'demo/general/banner-7-3.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(132, 'banner-7-4', 'demo/general/banner-7-4.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(133, 'banner-7-5', 'demo/general/banner-7-5.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(134, 'banner-7-6', 'demo/general/banner-7-6.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(135, 'about-style-7', 'demo/general/about-style-7.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(136, 'testimonial-style-7', 'demo/general/testimonial-style-7.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(137, 'testimonial-style-7-1', 'demo/general/testimonial-style-7-1.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(138, 'testimonial-style-7-2', 'demo/general/testimonial-style-7-2.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(139, 'ads-bg-1', 'demo/general/ads-bg-1.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(140, 'ads-bg-2', 'demo/general/ads-bg-2.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(141, 'ads-bg-3', 'demo/general/ads-bg-3.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(142, 'banner-img-9', 'demo/general/banner-img-9.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(143, 'company-8-1', 'demo/general/company-8-1.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(144, 'company-8-2', 'demo/general/company-8-2.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(145, 'company-8-3', 'demo/general/company-8-3.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(146, 'company-8-4', 'demo/general/company-8-4.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(147, 'company-8-5', 'demo/general/company-8-5.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(148, 'company-8-6', 'demo/general/company-8-6.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(149, 'company-8-7', 'demo/general/company-8-7.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(150, 'recruiter-8', 'demo/general/recruiter-8.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(151, 'jobseeker-9', 'demo/general/jobseeker-9.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(152, 'featured-1', 'demo/general/featured-1.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(153, 'featured-2', 'demo/general/featured-2.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(154, 'featured-3', 'demo/general/featured-3.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(155, 'featured-4', 'demo/general/featured-4.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(156, 'featured-5', 'demo/general/featured-5.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(157, 'banner-img-9-1', 'demo/general/banner-img-9-1.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(158, 'banner-img-9', 'demo/general/banner-layout-9.jpg', NULL, 'image/jpg', 'jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(159, 'about-style-9', 'demo/general/about-style-9.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(160, 'multi-peoples-style-9', 'demo/general/multi-peoples-style-9.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(161, 'call-to-action-9', 'demo/general/call-to-action-9.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(162, 'testimonials-9', 'demo/general/testimonials-9.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(163, 'testi-thumb-9-1', 'demo/general/testi-thumb-9-1.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(164, 'testi-thumb-9-2', 'demo/general/testi-thumb-9-2.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(165, 'news-banner', 'demo/news/news-banner.jpg', NULL, 'image/jpeg', 'jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(166, 'img-detail', 'demo/news/img-detail.jpg', NULL, 'image/jpeg', 'jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(167, 'gig-category-img', 'demo/gig/category-img.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(168, 'gig-sub-cat-1', 'demo/gig/sub-cat-1.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(169, 'gig-sub-cat-2', 'demo/gig/sub-cat-2.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(170, 'gig-sub-cat-3', 'demo/gig/sub-cat-3.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(171, 'gig-sub-cat-4', 'demo/gig/sub-cat-4.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(172, 'gig-sub-cat-5', 'demo/gig/sub-cat-5.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(173, 'gig-type1', 'demo/gig/type1.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(174, 'gig-type2', 'demo/gig/type2.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(175, 'gig-type3', 'demo/gig/type3.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(176, 'gig-type4', 'demo/gig/type4.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(177, 'download-1', '0000/16/2025/06/24/download-1.jpg', '6460', 'image/jpeg', 'jpg', 16, 16, NULL, NULL, NULL, 225, 225, '2025-06-24 19:18:50', '2025-06-24 19:18:50', 0, 'uploads'),
(178, 'thesis-revisi', '0000/16/2025/06/24/thesis-revisi.pdf', '271316', 'application/pdf', 'pdf', 16, 16, NULL, NULL, NULL, 0, 0, '2025-06-24 19:23:26', '2025-06-24 19:23:26', 0, 'uploads');

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_03_17_114820_create_table_core_pages', 1),
(4, '2019_03_17_140539_create_media_files_table', 1),
(5, '2019_03_20_081256_create_core_news_category_table', 1),
(6, '2019_03_27_081940_create_core_setting_table', 1),
(7, '2019_03_28_101009_create_bravo_booking_table', 1),
(8, '2019_03_28_165911_create_booking_meta_table', 1),
(9, '2019_03_29_093236_update_bookings_table', 1),
(10, '2019_04_01_045229_create_user_meta_table', 1),
(11, '2019_04_01_150630_create_menu_table', 1),
(12, '2019_04_02_150630_create_core_news_table', 1),
(13, '2019_04_03_080159_bravo_location', 1),
(14, '2019_04_05_143248_create_core_templates_table', 1),
(15, '2019_05_07_085430_create_core_languages_table', 1),
(16, '2019_05_07_085442_create_core_translations_table', 1),
(17, '2019_05_17_074008_create_bravo_review', 1),
(18, '2019_05_17_074048_create_bravo_review_meta', 1),
(19, '2019_05_17_113042_create_tour_attrs_table', 1),
(20, '2019_05_21_084235_create_bravo_contact_table', 1),
(21, '2019_05_28_152845_create_core_subscribers_table', 1),
(22, '2019_06_17_142338_bravo_seo', 1),
(23, '2019_08_09_163909_create_inbox_table', 1),
(24, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(25, '2020_04_02_150631_create_core_tags_table', 1),
(26, '2020_04_05_101016_create_gig_table', 1),
(27, '2020_11_23_092238_create_notifications_table', 1),
(28, '2021_04_02_150632_create_core_tag_new_table', 1),
(29, '2021_07_28_000000_create_candidates_table', 1),
(30, '2021_07_28_000001_create_categories_table', 1),
(31, '2021_07_31_032650_create_companies_table', 1),
(32, '2021_08_02_151855_create_bc_jobs_table', 1),
(33, '2021_08_15_174944_create_bc_skills_table', 1),
(34, '2021_08_22_173931_create_role_table', 1),
(35, '2021_09_09_081440_migrate_ver_1_0', 1),
(36, '2021_09_24_195241_create_order_table', 1),
(37, '2021_09_28_174255_create_jobs_table', 1),
(38, '2021_09_29_041836_create_user_plan_table', 1),
(39, '2021_12_13_032843_create_bc_company_term', 1),
(40, '2022_01_10_152433_create_bc_company_categories', 1),
(41, '2022_01_28_042923_migrate_ver_1_3', 1),
(42, '2022_03_14_160024_migrate_ver_2_0', 1),
(43, '2022_03_18_030121_create_user_views', 1),
(44, '2022_04_22_074555_migrate_ver_2_0_1', 1),
(45, '2022_06_18_012936_migrate_ver_2_0_2', 1),
(46, '2022_07_13_082318_create_media_folder_table', 1),
(47, '2022_09_22_091237_migrate_ver_2_2_0', 1),
(48, '2023_01_10_174202_migrate_ver_2_2_1', 1),
(49, '2023_03_18_040248_create_bc_customer_reports_table', 1),
(50, '2023_03_18_042321_migrate_ver_2_4_0', 1),
(51, '2023_05_19_080620_create_job_alert_table', 1),
(52, '2023_06_06_075325_migrate_ver_2_5_0', 1),
(53, '2023_09_27_063728_migrate_ver_251', 1);

INSERT INTO `notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('026b3bb8-7d42-4341-a301-e711ca2c95bd', 'App\\Notifications\\PrivateChannelServices', 'Modules\\User\\Models\\User', 16, '{\"id\":\"026b3bb8-7d42-4341-a301-e711ca2c95bd\",\"for_admin\":0,\"notification\":{\"id\":1,\"event\":\"EmployerChangeApplicantsStatus\",\"to\":\"employer\",\"name\":\"failamir abdullah\",\"avatar\":\"http:\\/\\/127.0.0.1:8000\\/images\\/avatar.png\",\"link\":\"http:\\/\\/127.0.0.1:8000\\/user\\/applied-jobs\",\"type\":\"apply_job\",\"message\":\"Employer approved you from job Product Designer \\/ UI Designer\"}}', '2025-06-24 19:24:55', '2025-06-24 19:24:35', '2025-06-24 19:24:55'),
('328d110a-fc27-4b7c-a191-19cae1c3ec2c', 'App\\Notifications\\AdminChannelServices', 'App\\User', 16, '{\"id\":\"328d110a-fc27-4b7c-a191-19cae1c3ec2c\",\"for_admin\":1,\"notification\":{\"id\":16,\"event\":\"SendMailUserRegistered\",\"to\":\"admin\",\"name\":\"failamir abdullah\",\"avatar\":\"http:\\/\\/127.0.0.1:8000\\/images\\/avatar.png\",\"link\":\"http:\\/\\/127.0.0.1:8000\\/admin\\/module\\/user?s=16\",\"type\":\"user\",\"message\":\"failamir abdullah has been registered\"}}', NULL, '2025-06-24 10:20:21', '2025-06-24 10:20:21'),
('87fe7522-928b-4800-b46a-0326bd497c5f', 'App\\Notifications\\PrivateChannelServices', 'App\\User', 2, '{\"id\":\"87fe7522-928b-4800-b46a-0326bd497c5f\",\"for_admin\":0,\"notification\":{\"id\":1,\"event\":\"CandidateApplyJobSubmit\",\"to\":\"employer\",\"name\":\"Employer \",\"avatar\":\"http:\\/\\/127.0.0.1:8000\\/uploads\\/0000\\/16\\/2025\\/06\\/24\\/download-1.jpg\",\"link\":\"http:\\/\\/127.0.0.1:8000\\/user\\/applicants\",\"type\":\"apply_job\",\"message\":\"failamir abdullah have applied to the job Product Designer \\/ UI Designer\"}}', NULL, '2025-06-24 19:23:26', '2025-06-24 19:23:26'),
('c570edc5-42c0-4e3a-bfa0-49a0bd3d0717', 'App\\Notifications\\PrivateChannelServices', 'App\\User', 10, '{\"id\":\"c570edc5-42c0-4e3a-bfa0-49a0bd3d0717\",\"for_admin\":0,\"notification\":{\"id\":2,\"event\":\"CandidateApplyJobSubmit\",\"to\":\"employer\",\"name\":\"Miles Fox\",\"avatar\":\"http:\\/\\/127.0.0.1:8000\\/uploads\\/0000\\/16\\/2025\\/06\\/24\\/download-1.jpg\",\"link\":\"http:\\/\\/127.0.0.1:8000\\/user\\/applicants\",\"type\":\"apply_job\",\"message\":\"failamir abdullah have applied to the job Restaurant Team Member\"}}', NULL, '2025-06-24 19:52:02', '2025-06-24 19:52:02');

INSERT INTO `user_upgrade_request` (`id`, `user_id`, `role_request`, `approved_time`, `status`, `approved_by`, `create_user`, `update_user`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 16, 2, NULL, 'pending', NULL, 16, NULL, NULL, '2025-06-24 18:30:29', '2025-06-24 18:30:29');

INSERT INTO `user_views` (`id`, `user_id`, `client_ip`, `create_user`, `update_user`, `created_at`, `updated_at`) VALUES
(1, 16, '127.0.0.1', 16, NULL, '2025-06-24 18:28:45', '2025-06-24 18:28:45');

INSERT INTO `user_wishlist` (`id`, `object_id`, `object_model`, `user_id`, `create_user`, `update_user`, `created_at`, `updated_at`) VALUES
(1, 10, 'job', 16, 16, NULL, '2025-06-24 19:51:03', '2025-06-24 19:51:03');

INSERT INTO `users` (`id`, `name`, `first_name`, `last_name`, `email`, `email_verified_at`, `password`, `phone`, `birthday`, `last_login_at`, `avatar_id`, `bio`, `status`, `create_user`, `update_user`, `vendor_commission_amount`, `vendor_commission_type`, `role_id`, `billing_last_name`, `billing_first_name`, `country`, `state`, `city`, `zip_code`, `address`, `address2`, `stripe_customer_id`, `deleted_at`, `remember_token`, `created_at`, `updated_at`, `payment_gateway`, `total_guests`, `locale`, `verify_submit_status`, `is_verified`, `need_update_pw`) VALUES
(1, 'Candidate ', 'Candidate', '', 'candidate@superio.test', '2025-04-16 03:24:02', '$2y$10$IOdQqrpxuGgzjFevnXDo4.C4m5lpRITkMeNGWobS0ACnABlI4az6y', '112 666 888', NULL, NULL, NULL, 'We\'re designers who have fallen in love with creating spaces for others to reflect, reset, and create. We split our time between two deserts (the Mojave, and the Sonoran). We love the way the heat sinks into our bones, the vibrant sunsets, and the wildlife we get to call our neighbors.', 'publish', NULL, NULL, NULL, NULL, 3, NULL, NULL, 'Viet Nam', NULL, NULL, NULL, 'My Dinh, Ha Noi', NULL, NULL, NULL, NULL, '2025-04-16 03:24:02', '2025-04-16 03:24:02', NULL, NULL, NULL, NULL, NULL, 1),
(2, 'Employer ', 'Employer', '', 'employer@superio.test', '2025-04-16 03:24:02', '$2y$10$Mdj3a9nYgTO0P/wrWRyuxOv9cOWTA0finsgmqMLEUP6qnzfEal0iu', '112 666 888', NULL, NULL, NULL, 'We\'re designers who have fallen in love with creating spaces for others to reflect, reset, and create. We split our time between two deserts (the Mojave, and the Sonoran). We love the way the heat sinks into our bones, the vibrant sunsets, and the wildlife we get to call our neighbors.', 'publish', NULL, NULL, NULL, NULL, 2, NULL, NULL, 'Viet Nam', NULL, NULL, NULL, 'My Dinh, Ha Noi', NULL, NULL, NULL, NULL, '2025-04-16 03:24:02', '2025-04-16 03:24:02', NULL, NULL, NULL, NULL, NULL, 1),
(3, 'Opendoor Robertson', 'Opendoor', 'Robertson', 'robertson@superio.test', NULL, '$2y$10$csX8a3wDzpV3Hv8zV54WDOBc.gYlhEyL1OmTebG2TwXrzZ/thH.Ye', '112 666 888', NULL, NULL, 58, 'We\'re designers who have fallen in love with creating spaces for others to reflect, reset, and create. We split our time between two deserts (the Mojave, and the Sonoran). We love the way the heat sinks into our bones, the vibrant sunsets, and the wildlife we get to call our neighbors.', 'publish', NULL, NULL, NULL, NULL, 3, NULL, NULL, 'Viet Nam', NULL, NULL, NULL, 'My Dinh, Ha Noi', NULL, NULL, NULL, NULL, '2025-04-16 03:24:03', '2025-04-16 03:24:03', NULL, NULL, NULL, NULL, NULL, 0),
(4, 'Checkr Warren', 'Checkr', 'Warren', 'warren@superio.test', NULL, '$2y$10$oEOcSH2gETHmyLtPEWX4E.e5MggiJWzQcrlF8lMLQg/uJyxhnDZaS', '112 666 888', NULL, NULL, 59, 'We\'re designers who have fallen in love with creating spaces for others to reflect, reset, and create. We split our time between two deserts (the Mojave, and the Sonoran). We love the way the heat sinks into our bones, the vibrant sunsets, and the wildlife we get to call our neighbors.', 'publish', NULL, NULL, NULL, NULL, 3, NULL, NULL, 'Viet Nam', NULL, NULL, NULL, 'My Dinh, Ha Noi', NULL, NULL, NULL, NULL, '2025-04-16 03:24:03', '2025-04-16 03:24:03', NULL, NULL, NULL, NULL, NULL, 0),
(5, 'Esther Victoria', 'Esther', 'Victoria', 'victoria@superio.test', NULL, '$2y$10$SBcXbWkA/Fpys/zQFNHRhOOpILhSBZytiwmt9UX3pdB3xa4F3ohN.', '112 666 888', NULL, NULL, 60, 'We\'re designers who have fallen in love with creating spaces for others to reflect, reset, and create. We split our time between two deserts (the Mojave, and the Sonoran). We love the way the heat sinks into our bones, the vibrant sunsets, and the wildlife we get to call our neighbors.', 'publish', NULL, NULL, NULL, NULL, 3, NULL, NULL, 'Viet Nam', NULL, NULL, NULL, 'My Dinh, Ha Noi', NULL, NULL, NULL, NULL, '2025-04-16 03:24:04', '2025-04-16 03:24:04', NULL, NULL, NULL, NULL, NULL, 0),
(6, 'Bell Alexander', 'Bell', 'Alexander', 'alexander@superio.test', NULL, '$2y$10$/j9Ag7ML/cZZgZ1/OC3UhuMhMQg3lKDZcTET9m0S7ntiP.9LMwTza', '112 666 888', NULL, NULL, 61, 'We\'re designers who have fallen in love with creating spaces for others to reflect, reset, and create. We split our time between two deserts (the Mojave, and the Sonoran). We love the way the heat sinks into our bones, the vibrant sunsets, and the wildlife we get to call our neighbors.', 'publish', NULL, NULL, NULL, NULL, 3, NULL, NULL, 'Viet Nam', NULL, NULL, NULL, 'My Dinh, Ha Noi', NULL, NULL, NULL, NULL, '2025-04-16 03:24:04', '2025-04-16 03:24:04', NULL, NULL, NULL, NULL, NULL, 0),
(7, 'Floyd Robert', 'Floyd', 'Robert', 'robert@superio.test', NULL, '$2y$10$xFxkLigR1xU.LQXPscMxyO5ScE47BrWWHYT8S9QUUmMtsnqhHjW.W', '112 666 888', NULL, NULL, 62, 'We\'re designers who have fallen in love with creating spaces for others to reflect, reset, and create. We split our time between two deserts (the Mojave, and the Sonoran). We love the way the heat sinks into our bones, the vibrant sunsets, and the wildlife we get to call our neighbors.', 'publish', NULL, NULL, NULL, NULL, 3, NULL, NULL, 'Viet Nam', NULL, NULL, NULL, 'My Dinh, Ha Noi', NULL, NULL, NULL, NULL, '2025-04-16 03:24:05', '2025-04-16 03:24:05', NULL, NULL, NULL, NULL, NULL, 0),
(8, 'Jerome Leslie', 'Jerome', 'Leslie', 'leslie@superio.test', NULL, '$2y$10$6BYWjQwrqLf3QITArrtp1Oqr7qSGtM3WWd0/jqdBME800Z3GPV3wG', '112 666 888', NULL, NULL, 63, 'We\'re designers who have fallen in love with creating spaces for others to reflect, reset, and create. We split our time between two deserts (the Mojave, and the Sonoran). We love the way the heat sinks into our bones, the vibrant sunsets, and the wildlife we get to call our neighbors.', 'publish', NULL, NULL, NULL, NULL, 3, NULL, NULL, 'Viet Nam', NULL, NULL, NULL, 'My Dinh, Ha Noi', NULL, NULL, NULL, NULL, '2025-04-16 03:24:05', '2025-04-16 03:24:05', NULL, NULL, NULL, NULL, NULL, 0),
(9, 'Cameron Williamson', 'Cameron', 'Williamson', 'williamson@superio.test', NULL, '$2y$10$2sZD1h6.ZdiCRkjWNAwkUOXcN9qa5ndn/ZfEt.0Gk9xZGawH0ktnW', '112 666 888', NULL, NULL, NULL, 'We\'re designers who have fallen in love with creating spaces for others to reflect, reset, and create. We split our time between two deserts (the Mojave, and the Sonoran). We love the way the heat sinks into our bones, the vibrant sunsets, and the wildlife we get to call our neighbors.', 'publish', NULL, NULL, NULL, NULL, 2, NULL, NULL, 'Viet Nam', NULL, NULL, NULL, 'My Dinh, Ha Noi', NULL, NULL, NULL, NULL, '2025-04-16 03:24:05', '2025-04-16 03:24:06', NULL, NULL, NULL, NULL, NULL, 0),
(10, 'Miles Fox', 'Miles', 'Fox', 'fox@superio.test', NULL, '$2y$10$prggRJJ1MVNblPjIQJS1t.dI9Ao1ErnDTUXI99xm00lgFlAMgDDPS', '112 666 888', NULL, NULL, NULL, 'We\'re designers who have fallen in love with creating spaces for others to reflect, reset, and create. We split our time between two deserts (the Mojave, and the Sonoran). We love the way the heat sinks into our bones, the vibrant sunsets, and the wildlife we get to call our neighbors.', 'publish', NULL, NULL, NULL, NULL, 2, NULL, NULL, 'Viet Nam', NULL, NULL, NULL, 'My Dinh, Ha Noi', NULL, NULL, NULL, NULL, '2025-04-16 03:24:06', '2025-04-16 03:24:06', NULL, NULL, NULL, NULL, NULL, 0),
(11, 'Tom Hiddleston', 'Tom', 'Hiddleston', 'hiddleston@superio.test', NULL, '$2y$10$AuhGIhE4hyVtpfUqioQMbOnWLeNSvQ9eAIf7FWvej/J2.q3Ur2iKq', '112 666 888', NULL, NULL, NULL, 'We\'re designers who have fallen in love with creating spaces for others to reflect, reset, and create. We split our time between two deserts (the Mojave, and the Sonoran). We love the way the heat sinks into our bones, the vibrant sunsets, and the wildlife we get to call our neighbors.', 'publish', NULL, NULL, NULL, NULL, 2, NULL, NULL, 'Viet Nam', NULL, NULL, NULL, 'My Dinh, Ha Noi', NULL, NULL, NULL, NULL, '2025-04-16 03:24:06', '2025-04-16 03:24:06', NULL, NULL, NULL, NULL, NULL, 0),
(12, 'Jennifer Linda', 'Jennifer', 'Linda', 'linda@superio.test', NULL, '$2y$10$h3m8SZJoQK9S5QFmmtXOVOoa1BvDyG88S9pDlT9tkJ2GfOvEGON6u', '112 666 888', NULL, NULL, NULL, 'We\'re designers who have fallen in love with creating spaces for others to reflect, reset, and create. We split our time between two deserts (the Mojave, and the Sonoran). We love the way the heat sinks into our bones, the vibrant sunsets, and the wildlife we get to call our neighbors.', 'publish', NULL, NULL, NULL, NULL, 2, NULL, NULL, 'Viet Nam', NULL, NULL, NULL, 'My Dinh, Ha Noi', NULL, NULL, NULL, NULL, '2025-04-16 03:24:07', '2025-04-16 03:24:07', NULL, NULL, NULL, NULL, NULL, 0),
(13, 'David John', 'David', 'John', 'john@superio.test', NULL, '$2y$10$U3re/Vi0CmInThmsVQzVW.NiIPGwt3lDssA/pDtda6DChQsmx2oVq', '112 666 888', NULL, NULL, NULL, 'We\'re designers who have fallen in love with creating spaces for others to reflect, reset, and create. We split our time between two deserts (the Mojave, and the Sonoran). We love the way the heat sinks into our bones, the vibrant sunsets, and the wildlife we get to call our neighbors.', 'publish', NULL, NULL, NULL, NULL, 2, NULL, NULL, 'Viet Nam', NULL, NULL, NULL, 'My Dinh, Ha Noi', NULL, NULL, NULL, NULL, '2025-04-16 03:24:07', '2025-04-16 03:24:07', NULL, NULL, NULL, NULL, NULL, 0),
(14, 'James Rebecca', 'James', 'Rebecca', 'rebecca@superio.test', NULL, '$2y$10$6eXPm2lleIdjOWkns68JZuG/bJVcfHcq44teCrqsKt6tg7P1yjSLS', '112 666 888', NULL, NULL, NULL, 'We\'re designers who have fallen in love with creating spaces for others to reflect, reset, and create. We split our time between two deserts (the Mojave, and the Sonoran). We love the way the heat sinks into our bones, the vibrant sunsets, and the wildlife we get to call our neighbors.', 'publish', NULL, NULL, NULL, NULL, 2, NULL, NULL, 'Viet Nam', NULL, NULL, NULL, 'My Dinh, Ha Noi', NULL, NULL, NULL, NULL, '2025-04-16 03:24:07', '2025-04-16 03:24:07', NULL, NULL, NULL, NULL, NULL, 0),
(15, 'admin@ciptawiratirta.com ', 'admin@ciptawiratirta.com', NULL, 'admin@ciptawiratirta.com', NULL, '$2y$10$1hoVzOQyClf1yMRDdcuiNO.mnuXPyGWhOlQJyHeMv7LXnfCBJF0pO', NULL, NULL, NULL, NULL, NULL, 'publish', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'RAWmXAboaKoQBUD5Y7Ao86DS4ZE930z97o8UiLOC59k7wyLhh6RdlAvPMqC2', '2025-04-16 03:24:11', '2025-04-16 03:24:11', NULL, NULL, NULL, NULL, NULL, 0),
(16, 'failamir abdullah', 'failamir', 'abdullah', 'ifailamir@gmail.com', NULL, '$2y$10$1hoVzOQyClf1yMRDdcuiNO.mnuXPyGWhOlQJyHeMv7LXnfCBJF0pO', '083148263597', NULL, NULL, 177, NULL, 'publish', NULL, NULL, NULL, NULL, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'MPkpTDJcMBkmdgmquGVxsUXNAPEsP88lZMkLa9IO47zx7qTgLSDntLIMF1Lh', '2025-06-24 10:20:21', '2025-06-24 19:26:03', NULL, NULL, NULL, NULL, NULL, 0);



/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;