/*
 Navicat Premium Data Transfer

 Source Server         : Laragon Full
 Source Server Type    : MySQL
 Source Server Version : 80030 (8.0.30)
 Source Host           : localhost:3306
 Source Schema         : help-desk

 Target Server Type    : MySQL
 Target Server Version : 80030 (8.0.30)
 File Encoding         : 65001

 Date: 26/08/2023 19:30:10
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for activity_log
-- ----------------------------
DROP TABLE IF EXISTS `activity_log`;
CREATE TABLE `activity_log`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `log_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `event` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `subject_id` bigint UNSIGNED NULL DEFAULT NULL,
  `causer_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `causer_id` bigint UNSIGNED NULL DEFAULT NULL,
  `properties` json NULL,
  `batch_uuid` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `subject`(`subject_type` ASC, `subject_id` ASC) USING BTREE,
  INDEX `causer`(`causer_type` ASC, `causer_id` ASC) USING BTREE,
  INDEX `activity_log_log_name_index`(`log_name` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of activity_log
-- ----------------------------
INSERT INTO `activity_log` VALUES (1, 'Complaint Activity Log', 'This Record has been created by user: Super Admin', 'App\\Models\\Complaint', 'created', 5, 'App\\Models\\User', 1, '{\"attributes\": {\"sex\": \"Male\", \"status\": \"pending\", \"concern\": \"Recommendation\", \"details\": \"Minus deserunt tempo\", \"response\": null, \"last_name\": \"Name\", \"telephone\": \"15216949702\", \"first_name\": \"A\", \"attachments\": null, \"middle_name\": \"Better\", \"region.name\": \"Volta\", \"is_anonymous\": true, \"is_forwarded\": 0, \"district.name\": \"Afadjato South\", \"email_address\": \"kuvoz@mailinator.com\", \"ticket_number\": \"CID295\", \"times_forwarded\": 0, \"response_channel\": \"Whatsapp\", \"stakeholder_type\": \"Staff\", \"complaintCategory.name\": null}}', NULL, '2023-08-26 19:15:47', '2023-08-26 19:15:47');

-- ----------------------------
-- Table structure for comments
-- ----------------------------
DROP TABLE IF EXISTS `comments`;
CREATE TABLE `comments`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `complaint_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NULL DEFAULT NULL,
  `parent_id` bigint UNSIGNED NULL DEFAULT NULL,
  `comment` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `attachment` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `comments_complaint_id_foreign`(`complaint_id` ASC) USING BTREE,
  INDEX `comments_user_id_foreign`(`user_id` ASC) USING BTREE,
  INDEX `comments_parent_id_foreign`(`parent_id` ASC) USING BTREE,
  CONSTRAINT `comments_complaint_id_foreign` FOREIGN KEY (`complaint_id`) REFERENCES `complaints` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `comments_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `comments` (`id`) ON DELETE SET NULL ON UPDATE RESTRICT,
  CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 21 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of comments
-- ----------------------------
INSERT INTO `comments` VALUES (1, 3, 1, NULL, 'Consequatur commodi iure ex voluptatem quas. Nostrum voluptates quam sit error. Maiores quod cumque autem iste quae quod aut.', NULL, '2023-08-26 19:15:27', '2023-08-26 19:15:27');
INSERT INTO `comments` VALUES (2, 4, 4, NULL, 'Ut dignissimos alias iusto et ut quisquam aliquam odit. Impedit quia adipisci rem non atque. Labore beatae soluta aut.', NULL, '2023-08-26 19:15:27', '2023-08-26 19:15:27');
INSERT INTO `comments` VALUES (3, 4, 5, NULL, 'Qui sint eum velit incidunt reiciendis fugit ut. Tempora architecto fugiat sed. Ratione et neque et voluptas non aut ut ducimus. Provident perferendis dolor numquam aut iusto sint.', NULL, '2023-08-26 19:15:27', '2023-08-26 19:15:27');
INSERT INTO `comments` VALUES (4, 3, 4, NULL, 'Amet sunt aut voluptatem rem. Est dolor aut id magni corrupti minima.', NULL, '2023-08-26 19:15:27', '2023-08-26 19:15:27');
INSERT INTO `comments` VALUES (5, 3, 3, NULL, 'Repellat non nam nostrum quis. Nobis iste sed quam. Et illum eos aliquam iure. Mollitia rerum aut numquam quibusdam magni qui qui. Voluptas non quia qui voluptatem molestiae qui nobis quidem.', NULL, '2023-08-26 19:15:27', '2023-08-26 19:15:27');
INSERT INTO `comments` VALUES (6, 4, 5, NULL, 'Incidunt ratione dolorum quo excepturi ipsum. Aut aperiam asperiores ut est. Reiciendis odio repellendus sit fuga ipsa sed accusantium.', NULL, '2023-08-26 19:15:27', '2023-08-26 19:15:27');
INSERT INTO `comments` VALUES (7, 4, 3, NULL, 'Qui assumenda placeat id tenetur. Vitae et placeat vel qui et. Voluptatem debitis a incidunt sed aperiam qui nostrum recusandae.', NULL, '2023-08-26 19:15:27', '2023-08-26 19:15:27');
INSERT INTO `comments` VALUES (8, 4, 3, NULL, 'Adipisci est fugiat itaque. Est soluta molestias praesentium omnis consectetur dolor enim voluptate. Architecto eum facilis fugiat fugit sunt ducimus.', NULL, '2023-08-26 19:15:27', '2023-08-26 19:15:27');
INSERT INTO `comments` VALUES (9, 3, 5, NULL, 'Placeat non aut earum necessitatibus sit quo esse. Et excepturi quia iusto numquam id aperiam quas. Blanditiis est qui et placeat numquam. Non dolores deleniti ut adipisci soluta nostrum soluta.', NULL, '2023-08-26 19:15:27', '2023-08-26 19:15:27');
INSERT INTO `comments` VALUES (10, 4, 5, NULL, 'Impedit aliquid in at excepturi reiciendis. Officiis dolorem veritatis ut voluptas vel consequatur placeat. Non aut sint praesentium nostrum necessitatibus quibusdam reprehenderit.', NULL, '2023-08-26 19:15:27', '2023-08-26 19:15:27');
INSERT INTO `comments` VALUES (11, 2, 4, NULL, 'Adipisci voluptates tenetur ipsam eligendi nihil optio laborum quisquam. Vero illo perspiciatis debitis iusto earum est ad. Quia dicta vel dolore velit molestiae.', NULL, '2023-08-26 19:15:27', '2023-08-26 19:15:27');
INSERT INTO `comments` VALUES (12, 3, 2, NULL, 'Explicabo consequuntur molestias eaque molestiae voluptatum porro. Qui consectetur accusantium soluta ducimus saepe officia rerum recusandae. Maiores ab error rerum omnis cum totam nemo. Ullam voluptatem officia deleniti fugiat provident sapiente.', NULL, '2023-08-26 19:15:27', '2023-08-26 19:15:27');
INSERT INTO `comments` VALUES (13, 4, 5, NULL, 'Quam et excepturi ratione cumque. Dolor eum sint maiores occaecati in qui sunt. Eos quasi totam quia cumque pariatur architecto non.', NULL, '2023-08-26 19:15:27', '2023-08-26 19:15:27');
INSERT INTO `comments` VALUES (14, 1, 5, NULL, 'Sint et sequi libero incidunt voluptas voluptatem voluptate. Voluptas reprehenderit reprehenderit qui libero suscipit. Libero soluta mollitia nulla sint mollitia omnis quaerat distinctio. Ducimus voluptatibus qui eius necessitatibus. Esse earum rerum quo numquam quos.', NULL, '2023-08-26 19:15:27', '2023-08-26 19:15:27');
INSERT INTO `comments` VALUES (15, 1, 2, NULL, 'Voluptatum et rerum deleniti corrupti libero expedita. Quo ea odit nobis dolor doloremque ipsam. Neque commodi harum vel odit nobis. Tempore suscipit nostrum enim ad dolorem et tempore maxime.', NULL, '2023-08-26 19:15:27', '2023-08-26 19:15:27');
INSERT INTO `comments` VALUES (16, 2, 3, NULL, 'Inventore ut unde eos. Officiis iusto dolorum et exercitationem et nihil. Reprehenderit sunt aut tempore quod nostrum quidem ipsa. Et voluptatem officiis qui adipisci provident.', NULL, '2023-08-26 19:15:27', '2023-08-26 19:15:27');
INSERT INTO `comments` VALUES (17, 4, 3, NULL, 'Aut occaecati a qui. Sit consequatur qui sed quidem.', NULL, '2023-08-26 19:15:27', '2023-08-26 19:15:27');
INSERT INTO `comments` VALUES (18, 3, 5, NULL, 'Quidem sequi rerum optio nihil qui. Et unde necessitatibus corporis id provident. Enim dolorem qui quis ipsum a neque libero. Consectetur quisquam aliquam deleniti corporis.', NULL, '2023-08-26 19:15:27', '2023-08-26 19:15:27');
INSERT INTO `comments` VALUES (19, 3, 1, NULL, 'Rem rerum omnis quisquam corporis. Delectus rerum iusto accusamus rerum vitae. Provident maxime id ratione repellendus aperiam est sunt fugiat.', NULL, '2023-08-26 19:15:27', '2023-08-26 19:15:27');
INSERT INTO `comments` VALUES (20, 1, 4, NULL, 'Modi sit numquam sit temporibus. Distinctio eius et similique eos adipisci ut. Error accusantium error ut eius fuga consequatur velit pariatur.', NULL, '2023-08-26 19:15:27', '2023-08-26 19:15:27');

-- ----------------------------
-- Table structure for complaint_categories
-- ----------------------------
DROP TABLE IF EXISTS `complaint_categories`;
CREATE TABLE `complaint_categories`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `complaint_categories_slug_unique`(`slug` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of complaint_categories
-- ----------------------------
INSERT INTO `complaint_categories` VALUES (1, 'Safe Guarding', 'safe-guarding', 'Complaints about the safety or well-being of a child or vulnerable adult', NULL, NULL);
INSERT INTO `complaint_categories` VALUES (2, 'Ethical and Moral Concerns', 'ethical-and-moral-concerns', 'Complaints about the ethical or moral conduct of a member of staff', NULL, NULL);
INSERT INTO `complaint_categories` VALUES (3, 'Legal Concerns', 'legal-concerns', 'Complaints about the legal conduct of a member of staff', NULL, NULL);
INSERT INTO `complaint_categories` VALUES (4, 'Financial Concerns', 'financial-concerns', 'Complaints about the financial conduct of a member of staff', NULL, NULL);
INSERT INTO `complaint_categories` VALUES (5, 'Impact', 'impact', 'Complaints about the impact of a member of staff\'s conduct on the complainant', NULL, NULL);
INSERT INTO `complaint_categories` VALUES (6, 'Communication and Information', 'communication-and-information', 'Complaints about the communication and information provided by a member of staff', NULL, NULL);
INSERT INTO `complaint_categories` VALUES (7, 'Project and Service Quality', 'project-and-service-quality', 'Complaints about the quality of a project or service', NULL, NULL);
INSERT INTO `complaint_categories` VALUES (8, 'Health and Safety', 'health-and-safety', 'Complaints about the health and safety of a project or service', NULL, NULL);

-- ----------------------------
-- Table structure for complaints
-- ----------------------------
DROP TABLE IF EXISTS `complaints`;
CREATE TABLE `complaints`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `complaint_category_id` bigint UNSIGNED NULL DEFAULT NULL,
  `ticket_number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `middle_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `last_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `telephone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sex` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `age_range` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `region_id` bigint UNSIGNED NULL DEFAULT NULL,
  `district_id` bigint UNSIGNED NULL DEFAULT NULL,
  `stakeholder_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `concern` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `response` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `is_forwarded` tinyint(1) NOT NULL DEFAULT 0,
  `times_forwarded` bigint NOT NULL DEFAULT 0,
  `attachments` json NULL,
  `response_channel` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'How the complainant wants to be contacted',
  `is_anonymous` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'Whether the complainant wants to be anonymous',
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending' COMMENT 'open, closed, pending, resolved, escalated, etc',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `complaints_ticket_number_unique`(`ticket_number` ASC) USING BTREE,
  INDEX `complaints_complaint_category_id_foreign`(`complaint_category_id` ASC) USING BTREE,
  INDEX `complaints_region_id_foreign`(`region_id` ASC) USING BTREE,
  INDEX `complaints_district_id_foreign`(`district_id` ASC) USING BTREE,
  CONSTRAINT `complaints_complaint_category_id_foreign` FOREIGN KEY (`complaint_category_id`) REFERENCES `complaint_categories` (`id`) ON DELETE SET NULL ON UPDATE RESTRICT,
  CONSTRAINT `complaints_district_id_foreign` FOREIGN KEY (`district_id`) REFERENCES `districts` (`id`) ON DELETE SET NULL ON UPDATE RESTRICT,
  CONSTRAINT `complaints_region_id_foreign` FOREIGN KEY (`region_id`) REFERENCES `regions` (`id`) ON DELETE SET NULL ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of complaints
-- ----------------------------
INSERT INTO `complaints` VALUES (1, NULL, 'CID6491', 'Richmond', NULL, 'Friesen', 'osinski.angelina@example.net', '+18032248214', 'female', '0-17', 2, 24, 'student', 'complaint', 'Est vero quam officia et sunt alias laudantium quia. Ipsam molestiae nam sit minus accusamus. Sint voluptatem alias corporis aut.', NULL, 1, 0, NULL, 'field_visit', 0, 'pending', NULL, '2023-08-26 19:15:26', '2023-08-26 19:15:26');
INSERT INTO `complaints` VALUES (2, NULL, 'CID8812', 'Guy', NULL, 'Dibbert', 'simonis.carmela@example.org', '1-352-917-7876', 'male', '0-17', 3, 206, 'student', 'feedback', 'Perferendis sed voluptas mollitia consequatur quia. Sed sit deserunt eum velit accusantium dolore eum. Dolorem recusandae et sed.', NULL, 0, 0, NULL, 'email', 0, 'closed', NULL, '2023-08-26 19:15:26', '2023-08-26 19:15:26');
INSERT INTO `complaints` VALUES (3, NULL, 'CID6513', 'Eino', NULL, 'Goodwin', 'pwuckert@example.org', '(563) 324-7716', 'male', '0-17', 7, 209, 'staff', 'feedback', 'Aut vel amet dolores odit praesentium repellat. Nihil iure nulla voluptas cum corrupti odio impedit. Voluptatem dicta aspernatur magni numquam. Aut nihil sequi aut. Est minus est illum quia quia praesentium.', NULL, 1, 0, NULL, 'email', 1, 'closed', NULL, '2023-08-26 19:15:26', '2023-08-26 19:15:26');
INSERT INTO `complaints` VALUES (4, NULL, 'CID3564', 'Madaline', NULL, 'Orn', 'mlakin@example.net', '640-383-8301', 'female', '51-65', 7, 223, 'public', 'feedback', 'Quia labore rerum aliquid qui et. Eum possimus unde et quae aperiam. Possimus quod qui ipsam quibusdam.', NULL, 0, 0, NULL, 'field_visit', 0, 'closed', NULL, '2023-08-26 19:15:26', '2023-08-26 19:15:26');
INSERT INTO `complaints` VALUES (5, 5, 'CID295', 'A', 'Better', 'Name', 'kuvoz@mailinator.com', '15216949702', 'male', NULL, 9, 191, 'staff', 'recommendation', 'Minus deserunt tempo', NULL, 0, 0, NULL, 'whatsapp', 1, 'pending', NULL, '2023-08-26 19:15:47', '2023-08-26 19:17:44');

-- ----------------------------
-- Table structure for districts
-- ----------------------------
DROP TABLE IF EXISTS `districts`;
CREATE TABLE `districts`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `region_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `districts_region_id_foreign`(`region_id` ASC) USING BTREE,
  CONSTRAINT `districts_region_id_foreign` FOREIGN KEY (`region_id`) REFERENCES `regions` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 248 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of districts
-- ----------------------------
INSERT INTO `districts` VALUES (1, 1, 'Afigya Kwabre', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (2, 1, 'Ahafo Ano North', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (3, 1, 'Ahafo Ano South', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (4, 1, 'Amansie Central', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (5, 1, 'Amansie West', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (6, 1, 'Asante Akim Central', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (7, 1, 'Asante Akim North', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (8, 1, 'Asante Akim South', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (9, 1, 'Atwima Kwanwoma', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (10, 1, 'Atwima Mponua', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (11, 1, 'Atwima Nwabiagya', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (12, 1, 'Bekwai', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (13, 1, 'Bosome Freho', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (14, 1, 'Botsomtwe', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (15, 1, 'Ejisu', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (16, 1, 'Ejura Sekyedumase', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (17, 1, 'Kumasi', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (18, 1, 'Kwabre East', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (19, 1, 'Mampong', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (20, 1, 'Obuasi', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (21, 1, 'Offinso North', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (22, 1, 'Offinso South', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (23, 1, 'Sekyere Afram Plains', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (24, 1, 'Sekyere Central', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (25, 1, 'Sekyere East', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (26, 1, 'Sekyere Kumawu', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (27, 1, 'Sekyere South', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (28, 2, 'Asunafo North', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (29, 2, 'Asunafo South', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (30, 2, 'Asutifi North', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (31, 2, 'Asutifi South', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (32, 2, 'Atebubu-Amantin', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (33, 2, 'Banda', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (34, 2, 'Berekum', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (35, 2, 'Dormaa East', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (36, 2, 'Dormaa West', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (37, 2, 'Jaman North', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (38, 2, 'Jaman South', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (39, 2, 'Kintampo North', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (40, 2, 'Kintampo South', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (41, 2, 'Nkoranza North', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (42, 2, 'Nkoranza South', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (43, 2, 'Pru', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (44, 2, 'Sene', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (45, 2, 'Sunyani', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (46, 2, 'Sunyani West', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (47, 2, 'Tain', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (48, 2, 'Techiman', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (49, 2, 'Wenchi', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (50, 3, 'Abura-Asebu-Kwamankese', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (51, 3, 'Agona East', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (52, 3, 'Agona West Municipal', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (53, 3, 'Ajumako-Enyan-Essiam', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (54, 3, 'Asikuma-Odoben-Brakwa', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (55, 3, 'Assin North Municipal', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (56, 3, 'Assin South', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (57, 3, 'Awutu-Senya', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (58, 3, 'Awutu-Senya-East', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (59, 3, 'Cape Coast', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (60, 3, 'Effutu Municipal', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (61, 3, 'Ekumfi', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (62, 3, 'Gomoa East', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (63, 3, 'Gomoa West', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (64, 3, 'Komenda-Edina-Eguafo-Abirem', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (65, 3, 'Mfantsiman Municipal', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (66, 3, 'Twifo-Atti-Morkwa', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (67, 3, 'Twifo-Heman-Lower-Denkyira', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (68, 3, 'Upper-Denkyira-East', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (69, 3, 'Upper-Denkyira-West', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (70, 4, 'Abuakwa North', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (71, 4, 'Abuakwa South', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (72, 4, 'Achiase', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (73, 4, 'Afram Plains North', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (74, 4, 'Afram Plains South', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (75, 4, 'Akropong', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (76, 4, 'Akuapim North', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (77, 4, 'Akuapim South', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (78, 4, 'Asene Manso Akroso', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (79, 4, 'Atiwa East', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (80, 4, 'Atiwa West', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (81, 4, 'Ayensuano', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (82, 4, 'Birim Central', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (83, 4, 'Birim North', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (84, 4, 'Birim South', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (85, 4, 'Birim South', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (86, 4, 'Denkyembour', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (87, 4, 'East Akim Municipal', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (88, 4, 'Fanteakwa North', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (89, 4, 'Fanteakwa South', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (90, 4, 'Kade', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (91, 4, 'Kwaebibirem', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (92, 4, 'Kwahu Afram Plains North', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (93, 4, 'Kwahu Afram Plains South', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (94, 4, 'Kwahu East', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (95, 4, 'Kwahu South', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (96, 4, 'Kwahu West Municipal', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (97, 4, 'Lower Manya Krobo', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (98, 4, 'New-Juaben Municipal', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (99, 4, 'Nkawkaw', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (100, 4, 'Nsawam Adoagyire Municipal', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (101, 4, 'Suhum Municipal', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (102, 4, 'Upper Manya Krobo', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (103, 4, 'Upper West Akim', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (104, 4, 'West Akim Municipal', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (105, 4, 'Yilo Krobo Municipal', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (106, 5, 'Accra Metropolitan', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (107, 5, 'Ada East', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (108, 5, 'Ada West', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (109, 5, 'Adenta', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (110, 5, 'Ashaiman Municipal', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (111, 5, 'Ayawaso East', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (112, 5, 'Ayawaso North', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (113, 5, 'Ayawaso West', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (114, 5, 'Ayawaso Central', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (115, 5, 'Dade Kotopon', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (116, 5, 'Dangme East', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (117, 5, 'Dangme West', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (118, 5, 'Ga Central', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (119, 5, 'Ga East', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (120, 5, 'Ga South', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (121, 5, 'Ga West', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (122, 5, 'Kpone Katamanso', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (123, 5, 'Krowor', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (124, 5, 'La Dade Kotopon', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (125, 5, 'La Nkwantanang Madina', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (126, 5, 'Ledzokuku', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (127, 5, 'Ningo Prampram', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (128, 5, 'Okaikwei North', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (129, 5, 'Okaikwei South', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (130, 5, 'Shai Osudoku', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (131, 5, 'Tema Metropolitan', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (132, 5, 'Tema West', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (133, 6, 'Bole', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (134, 6, 'Bunkpurugu-Yunyoo', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (135, 6, 'Central Gonja', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (136, 6, 'Chereponi', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (137, 6, 'East Gonja', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (138, 6, 'Gushiegu', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (139, 6, 'Karaga', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (140, 6, 'Kpandai', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (141, 6, 'Mamprugu-Moagduri', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (142, 6, 'Nanumba North', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (143, 6, 'Nanumba South', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (144, 6, 'Saboba', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (145, 6, 'Sagnarigu', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (146, 6, 'Savelugu-Nanton', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (147, 6, 'Sawla-Tuna-Kalba', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (148, 6, 'Tamale Metropolitan', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (149, 6, 'Tatale-Sanguli', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (150, 6, 'Tolon', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (151, 6, 'West Gonja', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (152, 6, 'Yendi', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (153, 6, 'Zabzugu', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (154, 7, 'Bawku Municipal', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (155, 7, 'Bawku West', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (156, 7, 'Binduri', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (157, 7, 'Bolgatanga Municipal', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (158, 7, 'Bongo', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (159, 7, 'Builsa North', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (160, 7, 'Builsa South', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (161, 7, 'Garu-Tempane', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (162, 7, 'Kassena-Nankana West', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (163, 7, 'Kassena-Nankana Municipal', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (164, 7, 'Nabdam', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (165, 7, 'Pusiga', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (166, 7, 'Talensi', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (167, 7, 'Tempane', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (168, 7, 'Binduri', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (169, 7, 'Bolgatanga Municipal', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (170, 7, 'Bongo', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (171, 7, 'Builsa North', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (172, 7, 'Builsa South', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (173, 7, 'Garu-Tempane', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (174, 7, 'Kassena-Nankana West', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (175, 7, 'Kassena-Nankana Municipal', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (176, 7, 'Nabdam', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (177, 7, 'Pusiga', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (178, 7, 'Talensi', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (179, 7, 'Tempane', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (180, 8, 'Jirapa', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (181, 8, 'Lambussie Karni', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (182, 8, 'Lawra', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (183, 8, 'Nadowli', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (184, 8, 'Nandom', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (185, 8, 'Sissala East', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (186, 8, 'Sissala West', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (187, 8, 'Wa East', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (188, 8, 'Wa Municipal', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (189, 8, 'Wa West', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (190, 9, 'Adaklu', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (191, 9, 'Afadjato South', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (192, 9, 'Agotime Ziope', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (193, 9, 'Akatsi North', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (194, 9, 'Akatsi South', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (195, 9, 'Biakoye', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (196, 9, 'Central Tongu', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (197, 9, 'Ho Municipal', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (198, 9, 'Ho West', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (199, 9, 'Hohoe Municipal', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (200, 9, 'Jasikan', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (201, 9, 'Kadjebi', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (202, 9, 'Keta Municipal', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (203, 9, 'Ketu North', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (204, 9, 'Ketu South', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (205, 9, 'Kpando Municipal', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (206, 9, 'Krachi East', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (207, 9, 'Krachi Nchumuru', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (208, 9, 'Krachi West', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (209, 9, 'Nkwanta North', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (210, 9, 'Nkwanta South', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (211, 9, 'North Dayi', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (212, 9, 'North Tongu', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (213, 9, 'South Dayi', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (214, 9, 'South Tongu', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (215, 10, 'Ahanta West', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (216, 10, 'Ellembelle', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (217, 10, 'Jomoro', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (218, 10, 'Mpohor', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (219, 10, 'Nzema East', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (220, 10, 'Prestea-Huni Valley', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (221, 10, 'Sefwi Akontombra', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (222, 10, 'Sefwi Wiawso', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (223, 10, 'Shama', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (224, 10, 'Tarkwa-Nsuaem', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (225, 10, 'Wassa Amenfi Central', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (226, 10, 'Wassa Amenfi East', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (227, 10, 'Wassa Amenfi West', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (228, 10, 'Wassa East', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (229, 10, 'Wassa West', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (230, 11, 'Aowin', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (231, 11, 'Bia East', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (232, 11, 'Bia West', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (233, 11, 'Bibiani-Anhwiaso-Bekwai', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (234, 11, 'Juabeso', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (235, 11, 'Sefwi Akontombra', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (236, 11, 'Sefwi Wiawso', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (237, 11, 'Suaman', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (238, 11, 'Wasa Amenfi East', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (239, 11, 'Wasa Amenfi West', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (240, 12, 'Biakoye', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (241, 12, 'Jasikan', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (242, 12, 'Kadjebi', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (243, 12, 'Krachi East', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (244, 12, 'Krachi Nchumuru', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (245, 12, 'Krachi West', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (246, 12, 'Nkwanta North', NULL, NULL, NULL);
INSERT INTO `districts` VALUES (247, 12, 'Nkwanta South', NULL, NULL, NULL);

-- ----------------------------
-- Table structure for divisions
-- ----------------------------
DROP TABLE IF EXISTS `divisions`;
CREATE TABLE `divisions`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `div_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `div_email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `div_contact_person` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `div_contact_person_telephone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `div_cc` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of divisions
-- ----------------------------
INSERT INTO `divisions` VALUES (1, 'Gregory Haag', 'favournwevo@gmail.com', 'Miss Rosalinda Collier I', '1-860-979-6252', NULL, '2023-08-26 19:15:27', '2023-08-26 19:15:27');
INSERT INTO `divisions` VALUES (2, 'Ilene Murphy', 'favournwevo@gmail.com', 'Carroll Grimes I', '+1-870-789-5978', 'cmante@predovic.org', '2023-08-26 19:15:27', '2023-08-26 19:15:27');
INSERT INTO `divisions` VALUES (3, 'Max Treutel', 'favournwevo@gmail.com', 'Leonor Rowe', '+17406331732', 'fanny49@orn.org', '2023-08-26 19:15:27', '2023-08-26 19:15:27');
INSERT INTO `divisions` VALUES (4, 'Prof. Jed Gorczany II', 'favournwevo@gmail.com', 'Ashlee Christiansen', '+1.586.849.5643', 'klocko.will@gmail.com', '2023-08-26 19:15:27', '2023-08-26 19:15:27');
INSERT INTO `divisions` VALUES (5, 'Daryl Kris Sr.', 'favournwevo@gmail.com', 'Eliseo Kris', '+18454590850', 'allan62@yahoo.com', '2023-08-26 19:15:27', '2023-08-26 19:15:27');

-- ----------------------------
-- Table structure for failed_jobs
-- ----------------------------
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `failed_jobs_uuid_unique`(`uuid` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of failed_jobs
-- ----------------------------

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 16 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` VALUES (2, '2014_10_12_100000_create_password_reset_tokens_table', 1);
INSERT INTO `migrations` VALUES (3, '2019_08_19_000000_create_failed_jobs_table', 1);
INSERT INTO `migrations` VALUES (4, '2019_12_14_000001_create_personal_access_tokens_table', 1);
INSERT INTO `migrations` VALUES (5, '2023_08_20_112603_create_regions_table', 1);
INSERT INTO `migrations` VALUES (6, '2023_08_20_112615_create_districts_table', 1);
INSERT INTO `migrations` VALUES (7, '2023_08_20_114108_create_complaint_categories_table', 1);
INSERT INTO `migrations` VALUES (8, '2023_08_20_115802_create_complaints_table', 1);
INSERT INTO `migrations` VALUES (9, '2023_08_20_116232_create_comments_table', 1);
INSERT INTO `migrations` VALUES (10, '2023_08_21_132902_create_permission_tables', 1);
INSERT INTO `migrations` VALUES (11, '2023_08_26_104636_create_divisions_table', 1);
INSERT INTO `migrations` VALUES (12, '2023_08_26_104644_create_units_table', 1);
INSERT INTO `migrations` VALUES (13, '2023_08_26_110109_create_activity_log_table', 1);
INSERT INTO `migrations` VALUES (14, '2023_08_26_110110_add_event_column_to_activity_log_table', 1);
INSERT INTO `migrations` VALUES (15, '2023_08_26_110111_add_batch_uuid_column_to_activity_log_table', 1);

-- ----------------------------
-- Table structure for model_has_permissions
-- ----------------------------
DROP TABLE IF EXISTS `model_has_permissions`;
CREATE TABLE `model_has_permissions`  (
  `permission_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`permission_id`, `model_id`, `model_type`) USING BTREE,
  INDEX `model_has_permissions_model_id_model_type_index`(`model_id` ASC, `model_type` ASC) USING BTREE,
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of model_has_permissions
-- ----------------------------

-- ----------------------------
-- Table structure for model_has_roles
-- ----------------------------
DROP TABLE IF EXISTS `model_has_roles`;
CREATE TABLE `model_has_roles`  (
  `role_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`role_id`, `model_id`, `model_type`) USING BTREE,
  INDEX `model_has_roles_model_id_model_type_index`(`model_id` ASC, `model_type` ASC) USING BTREE,
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of model_has_roles
-- ----------------------------
INSERT INTO `model_has_roles` VALUES (1, 'App\\Models\\User', 1);

-- ----------------------------
-- Table structure for password_reset_tokens
-- ----------------------------
DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE `password_reset_tokens`  (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of password_reset_tokens
-- ----------------------------

-- ----------------------------
-- Table structure for permissions
-- ----------------------------
DROP TABLE IF EXISTS `permissions`;
CREATE TABLE `permissions`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `permissions_name_guard_name_unique`(`name` ASC, `guard_name` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 33 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of permissions
-- ----------------------------
INSERT INTO `permissions` VALUES (1, 'dashboard.view', 'web', '2023-08-26 19:15:24', '2023-08-26 19:15:24');
INSERT INTO `permissions` VALUES (2, 'users.list', 'web', '2023-08-26 19:15:24', '2023-08-26 19:15:24');
INSERT INTO `permissions` VALUES (3, 'users.create', 'web', '2023-08-26 19:15:24', '2023-08-26 19:15:24');
INSERT INTO `permissions` VALUES (4, 'users.edit', 'web', '2023-08-26 19:15:24', '2023-08-26 19:15:24');
INSERT INTO `permissions` VALUES (5, 'users.delete', 'web', '2023-08-26 19:15:25', '2023-08-26 19:15:25');
INSERT INTO `permissions` VALUES (6, 'roles.list', 'web', '2023-08-26 19:15:25', '2023-08-26 19:15:25');
INSERT INTO `permissions` VALUES (7, 'roles.create', 'web', '2023-08-26 19:15:25', '2023-08-26 19:15:25');
INSERT INTO `permissions` VALUES (8, 'roles.edit', 'web', '2023-08-26 19:15:25', '2023-08-26 19:15:25');
INSERT INTO `permissions` VALUES (9, 'regions.list', 'web', '2023-08-26 19:15:25', '2023-08-26 19:15:25');
INSERT INTO `permissions` VALUES (10, 'regions.create', 'web', '2023-08-26 19:15:25', '2023-08-26 19:15:25');
INSERT INTO `permissions` VALUES (11, 'regions.edit', 'web', '2023-08-26 19:15:25', '2023-08-26 19:15:25');
INSERT INTO `permissions` VALUES (12, 'regions.delete', 'web', '2023-08-26 19:15:25', '2023-08-26 19:15:25');
INSERT INTO `permissions` VALUES (13, 'districts.list', 'web', '2023-08-26 19:15:25', '2023-08-26 19:15:25');
INSERT INTO `permissions` VALUES (14, 'districts.create', 'web', '2023-08-26 19:15:25', '2023-08-26 19:15:25');
INSERT INTO `permissions` VALUES (15, 'districts.delete', 'web', '2023-08-26 19:15:25', '2023-08-26 19:15:25');
INSERT INTO `permissions` VALUES (16, 'complaints.list', 'web', '2023-08-26 19:15:25', '2023-08-26 19:15:25');
INSERT INTO `permissions` VALUES (17, 'complaints.create', 'web', '2023-08-26 19:15:25', '2023-08-26 19:15:25');
INSERT INTO `permissions` VALUES (18, 'complaints.view', 'web', '2023-08-26 19:15:25', '2023-08-26 19:15:25');
INSERT INTO `permissions` VALUES (19, 'complaints.comment', 'web', '2023-08-26 19:15:25', '2023-08-26 19:15:25');
INSERT INTO `permissions` VALUES (20, 'complaints.reply', 'web', '2023-08-26 19:15:25', '2023-08-26 19:15:25');
INSERT INTO `permissions` VALUES (21, 'complaints.forward', 'web', '2023-08-26 19:15:25', '2023-08-26 19:15:25');
INSERT INTO `permissions` VALUES (22, 'divisions.list', 'web', '2023-08-26 19:15:25', '2023-08-26 19:15:25');
INSERT INTO `permissions` VALUES (23, 'divisions.create', 'web', '2023-08-26 19:15:25', '2023-08-26 19:15:25');
INSERT INTO `permissions` VALUES (24, 'divisions.edit', 'web', '2023-08-26 19:15:25', '2023-08-26 19:15:25');
INSERT INTO `permissions` VALUES (25, 'divisions.delete', 'web', '2023-08-26 19:15:25', '2023-08-26 19:15:25');
INSERT INTO `permissions` VALUES (26, 'units.list', 'web', '2023-08-26 19:15:25', '2023-08-26 19:15:25');
INSERT INTO `permissions` VALUES (27, 'units.create', 'web', '2023-08-26 19:15:25', '2023-08-26 19:15:25');
INSERT INTO `permissions` VALUES (28, 'units.edit', 'web', '2023-08-26 19:15:25', '2023-08-26 19:15:25');
INSERT INTO `permissions` VALUES (29, 'units.delete', 'web', '2023-08-26 19:15:25', '2023-08-26 19:15:25');
INSERT INTO `permissions` VALUES (30, 'activity_logs.list', 'web', '2023-08-26 19:15:25', '2023-08-26 19:15:25');
INSERT INTO `permissions` VALUES (31, 'activity_logs.view', 'web', '2023-08-26 19:15:25', '2023-08-26 19:15:25');
INSERT INTO `permissions` VALUES (32, 'activity_logs.clear', 'web', '2023-08-26 19:15:25', '2023-08-26 19:15:25');

-- ----------------------------
-- Table structure for personal_access_tokens
-- ----------------------------
DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `personal_access_tokens_token_unique`(`token` ASC) USING BTREE,
  INDEX `personal_access_tokens_tokenable_type_tokenable_id_index`(`tokenable_type` ASC, `tokenable_id` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of personal_access_tokens
-- ----------------------------

-- ----------------------------
-- Table structure for regions
-- ----------------------------
DROP TABLE IF EXISTS `regions`;
CREATE TABLE `regions`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 13 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of regions
-- ----------------------------
INSERT INTO `regions` VALUES (1, 'Ashanti', NULL, NULL, NULL);
INSERT INTO `regions` VALUES (2, 'Brong Ahafo', NULL, NULL, NULL);
INSERT INTO `regions` VALUES (3, 'Central', NULL, NULL, NULL);
INSERT INTO `regions` VALUES (4, 'Eastern', NULL, NULL, NULL);
INSERT INTO `regions` VALUES (5, 'Greater Accra', NULL, NULL, NULL);
INSERT INTO `regions` VALUES (6, 'Northern', NULL, NULL, NULL);
INSERT INTO `regions` VALUES (7, 'Upper East', NULL, NULL, NULL);
INSERT INTO `regions` VALUES (8, 'Upper West', NULL, NULL, NULL);
INSERT INTO `regions` VALUES (9, 'Volta', NULL, NULL, NULL);
INSERT INTO `regions` VALUES (10, 'Western', NULL, NULL, NULL);
INSERT INTO `regions` VALUES (11, 'Western North', NULL, NULL, NULL);
INSERT INTO `regions` VALUES (12, 'Oti', NULL, NULL, NULL);

-- ----------------------------
-- Table structure for role_has_permissions
-- ----------------------------
DROP TABLE IF EXISTS `role_has_permissions`;
CREATE TABLE `role_has_permissions`  (
  `permission_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`permission_id`, `role_id`) USING BTREE,
  INDEX `role_has_permissions_role_id_foreign`(`role_id` ASC) USING BTREE,
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of role_has_permissions
-- ----------------------------
INSERT INTO `role_has_permissions` VALUES (1, 1);
INSERT INTO `role_has_permissions` VALUES (2, 1);
INSERT INTO `role_has_permissions` VALUES (3, 1);
INSERT INTO `role_has_permissions` VALUES (4, 1);
INSERT INTO `role_has_permissions` VALUES (5, 1);
INSERT INTO `role_has_permissions` VALUES (6, 1);
INSERT INTO `role_has_permissions` VALUES (7, 1);
INSERT INTO `role_has_permissions` VALUES (8, 1);
INSERT INTO `role_has_permissions` VALUES (9, 1);
INSERT INTO `role_has_permissions` VALUES (10, 1);
INSERT INTO `role_has_permissions` VALUES (11, 1);
INSERT INTO `role_has_permissions` VALUES (12, 1);
INSERT INTO `role_has_permissions` VALUES (13, 1);
INSERT INTO `role_has_permissions` VALUES (14, 1);
INSERT INTO `role_has_permissions` VALUES (15, 1);
INSERT INTO `role_has_permissions` VALUES (16, 1);
INSERT INTO `role_has_permissions` VALUES (17, 1);
INSERT INTO `role_has_permissions` VALUES (18, 1);
INSERT INTO `role_has_permissions` VALUES (19, 1);
INSERT INTO `role_has_permissions` VALUES (20, 1);
INSERT INTO `role_has_permissions` VALUES (21, 1);
INSERT INTO `role_has_permissions` VALUES (22, 1);
INSERT INTO `role_has_permissions` VALUES (23, 1);
INSERT INTO `role_has_permissions` VALUES (24, 1);
INSERT INTO `role_has_permissions` VALUES (25, 1);
INSERT INTO `role_has_permissions` VALUES (26, 1);
INSERT INTO `role_has_permissions` VALUES (27, 1);
INSERT INTO `role_has_permissions` VALUES (28, 1);
INSERT INTO `role_has_permissions` VALUES (29, 1);
INSERT INTO `role_has_permissions` VALUES (30, 1);
INSERT INTO `role_has_permissions` VALUES (31, 1);
INSERT INTO `role_has_permissions` VALUES (32, 1);

-- ----------------------------
-- Table structure for roles
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `roles_name_guard_name_unique`(`name` ASC, `guard_name` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of roles
-- ----------------------------
INSERT INTO `roles` VALUES (1, 'admin', 'web', '2023-08-26 19:15:25', '2023-08-26 19:15:25');
INSERT INTO `roles` VALUES (2, 'client_users', 'web', '2023-08-26 19:15:25', '2023-08-26 19:15:25');
INSERT INTO `roles` VALUES (3, 'divisional_reps', 'web', '2023-08-26 19:15:25', '2023-08-26 19:15:25');

-- ----------------------------
-- Table structure for units
-- ----------------------------
DROP TABLE IF EXISTS `units`;
CREATE TABLE `units`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `unit_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit_email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit_contact_person` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `unit_contact_person_telephone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `unit_cc` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of units
-- ----------------------------
INSERT INTO `units` VALUES (1, 'Roscoe Ferry', 'omegakaka1315@gmail.com', 'Kavon Vandervort V', '+1-336-714-4523', 'hkonopelski@hotmail.com', '2023-08-26 19:15:27', '2023-08-26 19:15:27');
INSERT INTO `units` VALUES (2, 'Morgan Reichel', 'omegakaka1315@gmail.com', 'Emerson Lakin', '+1.660.545.6645', NULL, '2023-08-26 19:15:27', '2023-08-26 19:15:27');
INSERT INTO `units` VALUES (3, 'Michele Rau', 'omegakaka1315@gmail.com', 'Ruthie Pfeffer', '(727) 845-0068', NULL, '2023-08-26 19:15:27', '2023-08-26 19:15:27');
INSERT INTO `units` VALUES (4, 'Vida Rodriguez', 'omegakaka1315@gmail.com', 'Mr. Jakob Rath', '1-754-938-4003', 'nheaney@christiansen.com', '2023-08-26 19:15:27', '2023-08-26 19:15:27');
INSERT INTO `units` VALUES (5, 'Tanner Hilpert', 'omegakaka1315@gmail.com', 'Deon Hane', '+1-847-848-8774', 'leannon.jacklyn@towne.biz', '2023-08-26 19:15:27', '2023-08-26 19:15:27');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `last_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_email_unique`(`email` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'Super Admin', 'Super', 'Admin', 'admin@admin.com', '2023-08-26 19:15:25', '$2y$10$oBBsJEmHwwHDB2qXKlY91.3e4RHD2cA9K73MbkzcMUS9JBBYvPIjS', '5B2d7GQtIT', NULL, '2023-08-26 19:15:25', '2023-08-26 19:15:25');
INSERT INTO `users` VALUES (2, 'Dr. Alvah Toy', 'Reva', 'Ondricka', 'kertzmann.noble@example.com', '2023-08-26 19:15:26', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '0pouGFQ1QX', NULL, '2023-08-26 19:15:26', '2023-08-26 19:15:26');
INSERT INTO `users` VALUES (3, 'Mrs. Crystel Wiegand', 'Edward', 'Koepp', 'foconnell@example.org', '2023-08-26 19:15:26', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '88cSNJBP54', NULL, '2023-08-26 19:15:26', '2023-08-26 19:15:26');
INSERT INTO `users` VALUES (4, 'Eloy Roob', 'Ola', 'Glover', 'ilene.medhurst@example.net', '2023-08-26 19:15:26', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'OvmbTbBmuw', NULL, '2023-08-26 19:15:26', '2023-08-26 19:15:26');
INSERT INTO `users` VALUES (5, 'Martina Jaskolski', 'Tanya', 'Kohler', 'gilda.schuppe@example.net', '2023-08-26 19:15:26', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'OzhF9Cd14u', NULL, '2023-08-26 19:15:26', '2023-08-26 19:15:26');

SET FOREIGN_KEY_CHECKS = 1;
