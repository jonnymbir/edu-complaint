-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 26, 2023 at 10:26 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `help-desk`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint UNSIGNED NOT NULL,
  `complaint_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `parent_id` bigint UNSIGNED DEFAULT NULL,
  `comment` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attachment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `complaint_id`, `user_id`, `parent_id`, `comment`, `attachment`, `created_at`, `updated_at`) VALUES
(1, 3, 2, NULL, 'Ut nesciunt nulla sit et. Aperiam temporibus praesentium id molestias et cum rem. Eos sit quod delectus eligendi qui.', NULL, '2023-08-24 10:45:38', '2023-08-24 10:45:38'),
(2, 3, 2, NULL, 'Quod nihil placeat reprehenderit mollitia aperiam beatae. Voluptates et aliquid temporibus cumque. Aut sunt dicta totam modi consequuntur beatae. Pariatur dolore tempora dolore delectus nam. Optio qui soluta beatae aliquid et ex.', NULL, '2023-08-24 10:45:38', '2023-08-24 10:45:38'),
(3, 3, 1, NULL, 'Nesciunt eos cum cum facilis. Accusamus quasi voluptas et non a recusandae repudiandae. Necessitatibus doloribus quasi dolorem reiciendis fuga facilis corrupti.', NULL, '2023-08-24 10:45:38', '2023-08-24 10:45:38'),
(4, 4, 2, NULL, 'Aspernatur omnis dolor eaque omnis saepe. Alias voluptas aliquam officia qui ipsum excepturi. Repellat reiciendis et similique sed.', NULL, '2023-08-24 10:45:38', '2023-08-24 10:45:38'),
(5, 3, 3, NULL, 'Alias voluptate rem quis et illum quidem rerum. Omnis quia porro ratione quidem voluptatem autem. Consequatur aut fugit nihil ipsum placeat ut vitae.', NULL, '2023-08-24 10:45:38', '2023-08-24 10:45:38'),
(6, 1, 2, NULL, 'Minima consequatur libero similique sequi asperiores quia eligendi. Quisquam non eligendi exercitationem. Beatae dolorem molestiae qui ut necessitatibus. Dolorum qui enim atque qui.', NULL, '2023-08-24 10:45:38', '2023-08-24 10:45:38'),
(7, 1, 3, NULL, 'Sit facilis maiores velit iusto cum magnam fuga. Est rerum perferendis earum possimus sit cupiditate. Sit cum voluptatum dolore eos qui voluptatem provident.', NULL, '2023-08-24 10:45:38', '2023-08-24 10:45:38'),
(8, 2, 2, NULL, 'Saepe distinctio omnis hic omnis. Velit iste illum non qui repellendus. Quo quam alias esse repudiandae.', NULL, '2023-08-24 10:45:38', '2023-08-24 10:45:38'),
(9, 3, 4, NULL, 'Explicabo aspernatur recusandae accusamus ipsam pariatur ratione dolorem. Exercitationem natus deserunt alias sed qui sequi consequuntur. Sapiente eos laudantium aut non nam. Velit porro in sunt nesciunt porro.', NULL, '2023-08-24 10:45:38', '2023-08-24 10:45:38'),
(10, 1, 2, NULL, 'Possimus earum doloribus esse dolor sint dolorem vitae ducimus. Et asperiores culpa reiciendis dolorum dicta rem est. Autem non fuga dignissimos quo corporis laudantium veritatis. Quia ex eum omnis eum occaecati.', NULL, '2023-08-24 10:45:38', '2023-08-24 10:45:38'),
(11, 2, 1, NULL, 'Nobis harum quia dolor. Et voluptatem optio aut magni.', NULL, '2023-08-24 10:45:38', '2023-08-24 10:45:38'),
(12, 4, 5, NULL, 'Esse autem doloremque et consequatur earum deleniti voluptas ex. Perferendis libero at dolorum eligendi distinctio voluptatem. Qui eligendi fuga quidem officiis provident.', NULL, '2023-08-24 10:45:38', '2023-08-24 10:45:38'),
(13, 2, 4, NULL, 'Eligendi voluptatibus facere dicta. Voluptas pariatur temporibus consequuntur eum doloremque dolor sint sit. Repudiandae officia et sed accusantium quas deleniti rerum. Ratione eveniet itaque magnam delectus delectus enim a.', NULL, '2023-08-24 10:45:38', '2023-08-24 10:45:38'),
(14, 2, 5, NULL, 'Non et quibusdam perferendis ex expedita est unde. Blanditiis magnam eaque magnam recusandae qui aperiam deserunt tenetur. Accusamus sit exercitationem corrupti ab nobis.', NULL, '2023-08-24 10:45:38', '2023-08-24 10:45:38'),
(15, 4, 4, NULL, 'Quaerat ipsa dolore molestiae quis commodi. Accusamus qui nulla corrupti eligendi est facilis. Alias harum aspernatur qui eum quod sequi sunt.', NULL, '2023-08-24 10:45:38', '2023-08-24 10:45:38'),
(16, 4, 4, NULL, 'Distinctio reiciendis suscipit porro dolores. Dolor accusantium unde veritatis tempora.', NULL, '2023-08-24 10:45:38', '2023-08-24 10:45:38'),
(17, 2, 5, NULL, 'Veritatis tenetur cumque voluptatibus nobis ut velit deleniti. Iusto sit rerum nostrum in doloribus. Voluptate excepturi sint at.', NULL, '2023-08-24 10:45:38', '2023-08-24 10:45:38'),
(18, 2, 5, NULL, 'Odit et repellendus eos qui. Sed consequuntur architecto reprehenderit ipsum tempore in fugit nihil. Sequi sit perspiciatis expedita vel consequatur perspiciatis. Porro est error vitae illo enim.', NULL, '2023-08-24 10:45:38', '2023-08-24 10:45:38'),
(19, 2, 4, NULL, 'Ea rem harum ullam tempore culpa. Nemo optio aperiam sint quo nobis dolores qui. Et et qui impedit.', NULL, '2023-08-24 10:45:38', '2023-08-24 10:45:38'),
(20, 2, 1, NULL, 'Tempora in ut dolores omnis sit qui. Qui debitis molestiae in ut aliquid. Delectus quas sint qui quia aut quia.', NULL, '2023-08-24 10:45:38', '2023-08-24 10:45:38'),
(21, 1, 1, NULL, 'ersdfx', NULL, '2023-08-24 14:39:24', '2023-08-24 14:39:24'),
(22, 1, 1, NULL, 'Sref Ddv\\sd', NULL, '2023-08-24 14:39:51', '2023-08-24 14:39:51'),
(23, 1, 1, NULL, 'dsefw', NULL, '2023-08-24 14:40:11', '2023-08-24 14:40:11'),
(24, 1, 1, NULL, 'etfawerr refsg eg', NULL, '2023-08-24 14:40:16', '2023-08-24 14:40:16'),
(25, 1, 1, NULL, 'erdg ergesrdg serg', NULL, '2023-08-24 14:40:19', '2023-08-24 14:40:19');

-- --------------------------------------------------------

--
-- Table structure for table `complaints`
--

CREATE TABLE `complaints` (
  `id` bigint UNSIGNED NOT NULL,
  `ticket_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `middle_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telephone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sex` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age_range` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `region_id` bigint UNSIGNED DEFAULT NULL,
  `district_id` bigint UNSIGNED DEFAULT NULL,
  `stakeholder_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `concern` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `response` longtext COLLATE utf8mb4_unicode_ci,
  `is_forwarded` tinyint(1) NOT NULL DEFAULT '0',
  `times_forwarded` bigint NOT NULL DEFAULT '0',
  `attachments` json DEFAULT NULL,
  `response_channel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'How the complainant wants to be contacted',
  `is_anonymous` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Whether the complainant wants to be anonymous',
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending' COMMENT 'open, closed, pending, resolved, escalated, etc',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `complaints`
--

INSERT INTO `complaints` (`id`, `ticket_number`, `first_name`, `middle_name`, `last_name`, `email_address`, `telephone`, `sex`, `age_range`, `region_id`, `district_id`, `stakeholder_type`, `concern`, `details`, `response`, `is_forwarded`, `times_forwarded`, `attachments`, `response_channel`, `is_anonymous`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'TCKT381', 'Durward', NULL, 'Wyman', 'aliza77@example.com', '+1-848-791-6241', 'female', '0-17', 3, 247, 'student', 'feedback', 'Nulla et deleniti est facere est dolorem distinctio. Quisquam magni minima quae sit id sit. Quo nulla voluptatem autem sit. Perferendis porro repudiandae ullam saepe quia aut.', 'ok, i hear', 0, 0, NULL, 'whatsapp', 1, 'responded', NULL, '2023-08-24 10:45:38', '2023-08-24 14:39:11'),
(2, 'TCKT6152', 'Hollie', NULL, 'Hackett', 'justine.morissette@example.org', '854-916-7699', 'male', '0-17', 10, 29, 'parent', 'grievance', 'Voluptas facilis qui ullam quidem et pariatur non. Dolore exercitationem hic ut alias itaque consectetur ab. Impedit accusantium consequatur officia odit.', NULL, 1, 0, NULL, 'email', 0, 'closed', NULL, '2023-08-24 10:45:38', '2023-08-24 10:45:38'),
(3, 'TCKT233', 'Antone', NULL, 'Wiza', 'gleichner.waylon@example.org', '484.594.3625', 'male', '0-17', 7, 110, 'student', 'recommendation', 'Consequatur nemo molestiae commodi velit. Veritatis nisi quam repudiandae sequi.', NULL, 0, 0, NULL, 'field_visit', 0, 'closed', NULL, '2023-08-24 10:45:38', '2023-08-24 10:45:38'),
(4, 'TCKT2134', 'Maybelle', NULL, 'McCullough', 'wolff.leatha@example.com', '+12015756040', 'male', '0-17', 11, 147, 'student', 'grievance', 'Quam quos consequatur occaecati totam quo enim. Porro commodi enim rerum et. Corporis eveniet sed sint voluptatem. Aut vel possimus quo vitae eos quas et.', NULL, 1, 0, NULL, 'phone', 1, 'resolved', NULL, '2023-08-24 10:45:38', '2023-08-24 10:45:38'),
(5, 'TCKT2355', 'Super', NULL, 'Le', 'safo@gmail.com', '20000000000', 'male', NULL, 2, 31, 'staff', 'recommendation', 'qwertyuioasdfghjklzxcvbnm,.', NULL, 0, 0, NULL, 'telephone', 0, 'pending', NULL, '2023-08-24 17:10:19', '2023-08-24 17:10:19'),
(6, 'TCKT4776', 'Lillian', 'Beverly Vega', 'Bentley', 'gakyg@mailinator.com', '0200000000', 'female', NULL, 9, 201, 'staff', 'grievance', 'Esse non veniam pra', NULL, 0, 0, NULL, 'telephone', 0, 'pending', NULL, '2023-08-24 17:13:43', '2023-08-24 17:13:43'),
(7, 'TCKT477', 'Lillian', 'Beverly Vega', 'Bentley', 'gakyg@mailinator.com', '0200000000', 'female', NULL, 9, 201, 'staff', 'grievance', 'Esse non veniam pra', NULL, 0, 0, NULL, 'telephone', 0, 'pending', NULL, '2023-08-24 17:14:16', '2023-08-24 17:14:16'),
(8, 'TCKT9078', 'Sonia', 'Sheila Head', 'Jensen', 'komuka@mailinator.com', '0200000000', 'male', NULL, 3, 56, 'parent', 'complaint', 'Minim aut in distinc', NULL, 0, 0, NULL, 'whatsapp', 0, 'pending', NULL, '2023-08-24 17:14:43', '2023-08-24 17:14:43');

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `id` bigint UNSIGNED NOT NULL,
  `region_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`id`, `region_id`, `name`, `code`, `created_at`, `updated_at`) VALUES
(1, 1, 'Afigya Kwabre', NULL, NULL, NULL),
(2, 1, 'Ahafo Ano North', NULL, NULL, NULL),
(3, 1, 'Ahafo Ano South', NULL, NULL, NULL),
(4, 1, 'Amansie Central', NULL, NULL, NULL),
(5, 1, 'Amansie West', NULL, NULL, NULL),
(6, 1, 'Asante Akim Central', NULL, NULL, NULL),
(7, 1, 'Asante Akim North', NULL, NULL, NULL),
(8, 1, 'Asante Akim South', NULL, NULL, NULL),
(9, 1, 'Atwima Kwanwoma', NULL, NULL, NULL),
(10, 1, 'Atwima Mponua', NULL, NULL, NULL),
(11, 1, 'Atwima Nwabiagya', NULL, NULL, NULL),
(12, 1, 'Bekwai', NULL, NULL, NULL),
(13, 1, 'Bosome Freho', NULL, NULL, NULL),
(14, 1, 'Botsomtwe', NULL, NULL, NULL),
(15, 1, 'Ejisu', NULL, NULL, NULL),
(16, 1, 'Ejura Sekyedumase', NULL, NULL, NULL),
(17, 1, 'Kumasi', NULL, NULL, NULL),
(18, 1, 'Kwabre East', NULL, NULL, NULL),
(19, 1, 'Mampong', NULL, NULL, NULL),
(20, 1, 'Obuasi', NULL, NULL, NULL),
(21, 1, 'Offinso North', NULL, NULL, NULL),
(22, 1, 'Offinso South', NULL, NULL, NULL),
(23, 1, 'Sekyere Afram Plains', NULL, NULL, NULL),
(24, 1, 'Sekyere Central', NULL, NULL, NULL),
(25, 1, 'Sekyere East', NULL, NULL, NULL),
(26, 1, 'Sekyere Kumawu', NULL, NULL, NULL),
(27, 1, 'Sekyere South', NULL, NULL, NULL),
(28, 2, 'Asunafo North', NULL, NULL, NULL),
(29, 2, 'Asunafo South', NULL, NULL, NULL),
(30, 2, 'Asutifi North', NULL, NULL, NULL),
(31, 2, 'Asutifi South', NULL, NULL, NULL),
(32, 2, 'Atebubu-Amantin', NULL, NULL, NULL),
(33, 2, 'Banda', NULL, NULL, NULL),
(34, 2, 'Berekum', NULL, NULL, NULL),
(35, 2, 'Dormaa East', NULL, NULL, NULL),
(36, 2, 'Dormaa West', NULL, NULL, NULL),
(37, 2, 'Jaman North', NULL, NULL, NULL),
(38, 2, 'Jaman South', NULL, NULL, NULL),
(39, 2, 'Kintampo North', NULL, NULL, NULL),
(40, 2, 'Kintampo South', NULL, NULL, NULL),
(41, 2, 'Nkoranza North', NULL, NULL, NULL),
(42, 2, 'Nkoranza South', NULL, NULL, NULL),
(43, 2, 'Pru', NULL, NULL, NULL),
(44, 2, 'Sene', NULL, NULL, NULL),
(45, 2, 'Sunyani', NULL, NULL, NULL),
(46, 2, 'Sunyani West', NULL, NULL, NULL),
(47, 2, 'Tain', NULL, NULL, NULL),
(48, 2, 'Techiman', NULL, NULL, NULL),
(49, 2, 'Wenchi', NULL, NULL, NULL),
(50, 3, 'Abura-Asebu-Kwamankese', NULL, NULL, NULL),
(51, 3, 'Agona East', NULL, NULL, NULL),
(52, 3, 'Agona West Municipal', NULL, NULL, NULL),
(53, 3, 'Ajumako-Enyan-Essiam', NULL, NULL, NULL),
(54, 3, 'Asikuma-Odoben-Brakwa', NULL, NULL, NULL),
(55, 3, 'Assin North Municipal', NULL, NULL, NULL),
(56, 3, 'Assin South', NULL, NULL, NULL),
(57, 3, 'Awutu-Senya', NULL, NULL, NULL),
(58, 3, 'Awutu-Senya-East', NULL, NULL, NULL),
(59, 3, 'Cape Coast', NULL, NULL, NULL),
(60, 3, 'Effutu Municipal', NULL, NULL, NULL),
(61, 3, 'Ekumfi', NULL, NULL, NULL),
(62, 3, 'Gomoa East', NULL, NULL, NULL),
(63, 3, 'Gomoa West', NULL, NULL, NULL),
(64, 3, 'Komenda-Edina-Eguafo-Abirem', NULL, NULL, NULL),
(65, 3, 'Mfantsiman Municipal', NULL, NULL, NULL),
(66, 3, 'Twifo-Atti-Morkwa', NULL, NULL, NULL),
(67, 3, 'Twifo-Heman-Lower-Denkyira', NULL, NULL, NULL),
(68, 3, 'Upper-Denkyira-East', NULL, NULL, NULL),
(69, 3, 'Upper-Denkyira-West', NULL, NULL, NULL),
(70, 4, 'Abuakwa North', NULL, NULL, NULL),
(71, 4, 'Abuakwa South', NULL, NULL, NULL),
(72, 4, 'Achiase', NULL, NULL, NULL),
(73, 4, 'Afram Plains North', NULL, NULL, NULL),
(74, 4, 'Afram Plains South', NULL, NULL, NULL),
(75, 4, 'Akropong', NULL, NULL, NULL),
(76, 4, 'Akuapim North', NULL, NULL, NULL),
(77, 4, 'Akuapim South', NULL, NULL, NULL),
(78, 4, 'Asene Manso Akroso', NULL, NULL, NULL),
(79, 4, 'Atiwa East', NULL, NULL, NULL),
(80, 4, 'Atiwa West', NULL, NULL, NULL),
(81, 4, 'Ayensuano', NULL, NULL, NULL),
(82, 4, 'Birim Central', NULL, NULL, NULL),
(83, 4, 'Birim North', NULL, NULL, NULL),
(84, 4, 'Birim South', NULL, NULL, NULL),
(85, 4, 'Birim South', NULL, NULL, NULL),
(86, 4, 'Denkyembour', NULL, NULL, NULL),
(87, 4, 'East Akim Municipal', NULL, NULL, NULL),
(88, 4, 'Fanteakwa North', NULL, NULL, NULL),
(89, 4, 'Fanteakwa South', NULL, NULL, NULL),
(90, 4, 'Kade', NULL, NULL, NULL),
(91, 4, 'Kwaebibirem', NULL, NULL, NULL),
(92, 4, 'Kwahu Afram Plains North', NULL, NULL, NULL),
(93, 4, 'Kwahu Afram Plains South', NULL, NULL, NULL),
(94, 4, 'Kwahu East', NULL, NULL, NULL),
(95, 4, 'Kwahu South', NULL, NULL, NULL),
(96, 4, 'Kwahu West Municipal', NULL, NULL, NULL),
(97, 4, 'Lower Manya Krobo', NULL, NULL, NULL),
(98, 4, 'New-Juaben Municipal', NULL, NULL, NULL),
(99, 4, 'Nkawkaw', NULL, NULL, NULL),
(100, 4, 'Nsawam Adoagyire Municipal', NULL, NULL, NULL),
(101, 4, 'Suhum Municipal', NULL, NULL, NULL),
(102, 4, 'Upper Manya Krobo', NULL, NULL, NULL),
(103, 4, 'Upper West Akim', NULL, NULL, NULL),
(104, 4, 'West Akim Municipal', NULL, NULL, NULL),
(105, 4, 'Yilo Krobo Municipal', NULL, NULL, NULL),
(106, 5, 'Accra Metropolitan', NULL, NULL, NULL),
(107, 5, 'Ada East', NULL, NULL, NULL),
(108, 5, 'Ada West', NULL, NULL, NULL),
(109, 5, 'Adenta', NULL, NULL, NULL),
(110, 5, 'Ashaiman Municipal', NULL, NULL, NULL),
(111, 5, 'Ayawaso East', NULL, NULL, NULL),
(112, 5, 'Ayawaso North', NULL, NULL, NULL),
(113, 5, 'Ayawaso West', NULL, NULL, NULL),
(114, 5, 'Ayawaso Central', NULL, NULL, NULL),
(115, 5, 'Dade Kotopon', NULL, NULL, NULL),
(116, 5, 'Dangme East', NULL, NULL, NULL),
(117, 5, 'Dangme West', NULL, NULL, NULL),
(118, 5, 'Ga Central', NULL, NULL, NULL),
(119, 5, 'Ga East', NULL, NULL, NULL),
(120, 5, 'Ga South', NULL, NULL, NULL),
(121, 5, 'Ga West', NULL, NULL, NULL),
(122, 5, 'Kpone Katamanso', NULL, NULL, NULL),
(123, 5, 'Krowor', NULL, NULL, NULL),
(124, 5, 'La Dade Kotopon', NULL, NULL, NULL),
(125, 5, 'La Nkwantanang Madina', NULL, NULL, NULL),
(126, 5, 'Ledzokuku', NULL, NULL, NULL),
(127, 5, 'Ningo Prampram', NULL, NULL, NULL),
(128, 5, 'Okaikwei North', NULL, NULL, NULL),
(129, 5, 'Okaikwei South', NULL, NULL, NULL),
(130, 5, 'Shai Osudoku', NULL, NULL, NULL),
(131, 5, 'Tema Metropolitan', NULL, NULL, NULL),
(132, 5, 'Tema West', NULL, NULL, NULL),
(133, 6, 'Bole', NULL, NULL, NULL),
(134, 6, 'Bunkpurugu-Yunyoo', NULL, NULL, NULL),
(135, 6, 'Central Gonja', NULL, NULL, NULL),
(136, 6, 'Chereponi', NULL, NULL, NULL),
(137, 6, 'East Gonja', NULL, NULL, NULL),
(138, 6, 'Gushiegu', NULL, NULL, NULL),
(139, 6, 'Karaga', NULL, NULL, NULL),
(140, 6, 'Kpandai', NULL, NULL, NULL),
(141, 6, 'Mamprugu-Moagduri', NULL, NULL, NULL),
(142, 6, 'Nanumba North', NULL, NULL, NULL),
(143, 6, 'Nanumba South', NULL, NULL, NULL),
(144, 6, 'Saboba', NULL, NULL, NULL),
(145, 6, 'Sagnarigu', NULL, NULL, NULL),
(146, 6, 'Savelugu-Nanton', NULL, NULL, NULL),
(147, 6, 'Sawla-Tuna-Kalba', NULL, NULL, NULL),
(148, 6, 'Tamale Metropolitan', NULL, NULL, NULL),
(149, 6, 'Tatale-Sanguli', NULL, NULL, NULL),
(150, 6, 'Tolon', NULL, NULL, NULL),
(151, 6, 'West Gonja', NULL, NULL, NULL),
(152, 6, 'Yendi', NULL, NULL, NULL),
(153, 6, 'Zabzugu', NULL, NULL, NULL),
(154, 7, 'Bawku Municipal', NULL, NULL, NULL),
(155, 7, 'Bawku West', NULL, NULL, NULL),
(156, 7, 'Binduri', NULL, NULL, NULL),
(157, 7, 'Bolgatanga Municipal', NULL, NULL, NULL),
(158, 7, 'Bongo', NULL, NULL, NULL),
(159, 7, 'Builsa North', NULL, NULL, NULL),
(160, 7, 'Builsa South', NULL, NULL, NULL),
(161, 7, 'Garu-Tempane', NULL, NULL, NULL),
(162, 7, 'Kassena-Nankana West', NULL, NULL, NULL),
(163, 7, 'Kassena-Nankana Municipal', NULL, NULL, NULL),
(164, 7, 'Nabdam', NULL, NULL, NULL),
(165, 7, 'Pusiga', NULL, NULL, NULL),
(166, 7, 'Talensi', NULL, NULL, NULL),
(167, 7, 'Tempane', NULL, NULL, NULL),
(168, 7, 'Binduri', NULL, NULL, NULL),
(169, 7, 'Bolgatanga Municipal', NULL, NULL, NULL),
(170, 7, 'Bongo', NULL, NULL, NULL),
(171, 7, 'Builsa North', NULL, NULL, NULL),
(172, 7, 'Builsa South', NULL, NULL, NULL),
(173, 7, 'Garu-Tempane', NULL, NULL, NULL),
(174, 7, 'Kassena-Nankana West', NULL, NULL, NULL),
(175, 7, 'Kassena-Nankana Municipal', NULL, NULL, NULL),
(176, 7, 'Nabdam', NULL, NULL, NULL),
(177, 7, 'Pusiga', NULL, NULL, NULL),
(178, 7, 'Talensi', NULL, NULL, NULL),
(179, 7, 'Tempane', NULL, NULL, NULL),
(180, 8, 'Jirapa', NULL, NULL, NULL),
(181, 8, 'Lambussie Karni', NULL, NULL, NULL),
(182, 8, 'Lawra', NULL, NULL, NULL),
(183, 8, 'Nadowli', NULL, NULL, NULL),
(184, 8, 'Nandom', NULL, NULL, NULL),
(185, 8, 'Sissala East', NULL, NULL, NULL),
(186, 8, 'Sissala West', NULL, NULL, NULL),
(187, 8, 'Wa East', NULL, NULL, NULL),
(188, 8, 'Wa Municipal', NULL, NULL, NULL),
(189, 8, 'Wa West', NULL, NULL, NULL),
(190, 9, 'Adaklu', NULL, NULL, NULL),
(191, 9, 'Afadjato South', NULL, NULL, NULL),
(192, 9, 'Agotime Ziope', NULL, NULL, NULL),
(193, 9, 'Akatsi North', NULL, NULL, NULL),
(194, 9, 'Akatsi South', NULL, NULL, NULL),
(195, 9, 'Biakoye', NULL, NULL, NULL),
(196, 9, 'Central Tongu', NULL, NULL, NULL),
(197, 9, 'Ho Municipal', NULL, NULL, NULL),
(198, 9, 'Ho West', NULL, NULL, NULL),
(199, 9, 'Hohoe Municipal', NULL, NULL, NULL),
(200, 9, 'Jasikan', NULL, NULL, NULL),
(201, 9, 'Kadjebi', NULL, NULL, NULL),
(202, 9, 'Keta Municipal', NULL, NULL, NULL),
(203, 9, 'Ketu North', NULL, NULL, NULL),
(204, 9, 'Ketu South', NULL, NULL, NULL),
(205, 9, 'Kpando Municipal', NULL, NULL, NULL),
(206, 9, 'Krachi East', NULL, NULL, NULL),
(207, 9, 'Krachi Nchumuru', NULL, NULL, NULL),
(208, 9, 'Krachi West', NULL, NULL, NULL),
(209, 9, 'Nkwanta North', NULL, NULL, NULL),
(210, 9, 'Nkwanta South', NULL, NULL, NULL),
(211, 9, 'North Dayi', NULL, NULL, NULL),
(212, 9, 'North Tongu', NULL, NULL, NULL),
(213, 9, 'South Dayi', NULL, NULL, NULL),
(214, 9, 'South Tongu', NULL, NULL, NULL),
(215, 10, 'Ahanta West', NULL, NULL, NULL),
(216, 10, 'Ellembelle', NULL, NULL, NULL),
(217, 10, 'Jomoro', NULL, NULL, NULL),
(218, 10, 'Mpohor', NULL, NULL, NULL),
(219, 10, 'Nzema East', NULL, NULL, NULL),
(220, 10, 'Prestea-Huni Valley', NULL, NULL, NULL),
(221, 10, 'Sefwi Akontombra', NULL, NULL, NULL),
(222, 10, 'Sefwi Wiawso', NULL, NULL, NULL),
(223, 10, 'Shama', NULL, NULL, NULL),
(224, 10, 'Tarkwa-Nsuaem', NULL, NULL, NULL),
(225, 10, 'Wassa Amenfi Central', NULL, NULL, NULL),
(226, 10, 'Wassa Amenfi East', NULL, NULL, NULL),
(227, 10, 'Wassa Amenfi West', NULL, NULL, NULL),
(228, 10, 'Wassa East', NULL, NULL, NULL),
(229, 10, 'Wassa West', NULL, NULL, NULL),
(230, 11, 'Aowin', NULL, NULL, NULL),
(231, 11, 'Bia East', NULL, NULL, NULL),
(232, 11, 'Bia West', NULL, NULL, NULL),
(233, 11, 'Bibiani-Anhwiaso-Bekwai', NULL, NULL, NULL),
(234, 11, 'Juabeso', NULL, NULL, NULL),
(235, 11, 'Sefwi Akontombra', NULL, NULL, NULL),
(236, 11, 'Sefwi Wiawso', NULL, NULL, NULL),
(237, 11, 'Suaman', NULL, NULL, NULL),
(238, 11, 'Wasa Amenfi East', NULL, NULL, NULL),
(239, 11, 'Wasa Amenfi West', NULL, NULL, NULL),
(240, 12, 'Biakoye', NULL, NULL, NULL),
(241, 12, 'Jasikan', NULL, NULL, NULL),
(242, 12, 'Kadjebi', NULL, NULL, NULL),
(243, 12, 'Krachi East', NULL, NULL, NULL),
(244, 12, 'Krachi Nchumuru', NULL, NULL, NULL),
(245, 12, 'Krachi West', NULL, NULL, NULL),
(246, 12, 'Nkwanta North', NULL, NULL, NULL),
(247, 12, 'Nkwanta South', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_08_20_112603_create_regions_table', 1),
(6, '2023_08_20_112615_create_districts_table', 1),
(7, '2023_08_20_115802_create_complaints_table', 1),
(8, '2023_08_20_116232_create_comments_table', 1),
(9, '2023_08_21_132902_create_permission_tables', 1);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'dashboard', 'web', '2023-08-24 10:45:37', '2023-08-24 10:45:37');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `regions`
--

CREATE TABLE `regions` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `regions`
--

INSERT INTO `regions` (`id`, `name`, `code`, `created_at`, `updated_at`) VALUES
(1, 'Ashanti', NULL, NULL, NULL),
(2, 'Brong Ahafo', NULL, NULL, NULL),
(3, 'Central', NULL, NULL, NULL),
(4, 'Eastern', NULL, NULL, NULL),
(5, 'Greater Accra', NULL, NULL, NULL),
(6, 'Northern', NULL, NULL, NULL),
(7, 'Upper East', NULL, NULL, NULL),
(8, 'Upper West', NULL, NULL, NULL),
(9, 'Volta', NULL, NULL, NULL),
(10, 'Western', NULL, NULL, NULL),
(11, 'Western North', NULL, NULL, NULL),
(12, 'Oti', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'web', '2023-08-24 10:45:37', '2023-08-24 10:45:37'),
(2, 'client_users', 'web', '2023-08-24 10:45:38', '2023-08-24 10:45:38'),
(3, 'divisional_reps', 'web', '2023-08-24 10:45:38', '2023-08-24 10:45:38');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `first_name`, `last_name`, `email`, `email_verified_at`, `password`, `remember_token`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'Super', 'Admin', 'admin@admin.com', '2023-08-24 10:45:38', '$2y$10$Rj4ziJI8d.7tWYSsk1t1xOqpwYuqgXlpbEMlv.63/Ujj.P0pg2U3W', 'lE17trK9svp2itQD2VGMdR1eTIFkLtZQArqMzETFF0QchLMu3zOQNntUXvbs', NULL, '2023-08-24 10:45:38', '2023-08-24 10:45:38'),
(2, 'Edison Halvorson II', 'Brisa', 'Cartwright', 'breitenberg.ramiro@example.com', '2023-08-24 10:45:38', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'pMxXOh8tC7', NULL, '2023-08-24 10:45:38', '2023-08-24 10:45:38'),
(3, 'Minerva Herzog', 'Delores', 'Cremin', 'dickens.abelardo@example.org', '2023-08-24 10:45:38', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'xWK73K9W1A', NULL, '2023-08-24 10:45:38', '2023-08-24 10:45:38'),
(4, 'Adrianna Kiehn', 'Tito', 'Kautzer', 'dandre.abshire@example.org', '2023-08-24 10:45:38', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'XUs6xbUJ5F', NULL, '2023-08-24 10:45:38', '2023-08-24 10:45:38'),
(5, 'Emelia Block', 'Kraig', 'Ruecker', 'casper.burdette@example.org', '2023-08-24 10:45:38', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'mh6Vde8int', NULL, '2023-08-24 10:45:38', '2023-08-24 10:45:38');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_complaint_id_foreign` (`complaint_id`),
  ADD KEY `comments_user_id_foreign` (`user_id`),
  ADD KEY `comments_parent_id_foreign` (`parent_id`);

--
-- Indexes for table `complaints`
--
ALTER TABLE `complaints`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `complaints_ticket_number_unique` (`ticket_number`),
  ADD KEY `complaints_region_id_foreign` (`region_id`),
  ADD KEY `complaints_district_id_foreign` (`district_id`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `districts_region_id_foreign` (`region_id`);

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
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `regions`
--
ALTER TABLE `regions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

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
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `complaints`
--
ALTER TABLE `complaints`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=248;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `regions`
--
ALTER TABLE `regions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_complaint_id_foreign` FOREIGN KEY (`complaint_id`) REFERENCES `complaints` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `comments` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `complaints`
--
ALTER TABLE `complaints`
  ADD CONSTRAINT `complaints_district_id_foreign` FOREIGN KEY (`district_id`) REFERENCES `districts` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `complaints_region_id_foreign` FOREIGN KEY (`region_id`) REFERENCES `regions` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `districts`
--
ALTER TABLE `districts`
  ADD CONSTRAINT `districts_region_id_foreign` FOREIGN KEY (`region_id`) REFERENCES `regions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
