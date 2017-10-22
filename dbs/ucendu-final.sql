-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 23, 2017 lúc 01:45 AM
-- Phiên bản máy phục vụ: 10.1.26-MariaDB
-- Phiên bản PHP: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `ucendu-final`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2017_10_10_021717_create_reading_level_users_table', 1),
(2, '2017_10_10_021800_create_reading_users_table', 1),
(3, '2017_10_10_021854_create_reading_password_resets_table', 1),
(4, '2017_10_10_023622_create_reading_type_lessons_table', 1),
(5, '2017_10_10_025453_create_reading_level_lessons_table', 1),
(6, '2017_10_10_025540_create_reading_type_questions_table', 1),
(7, '2017_10_10_032403_create_reading_learning_type_questions_table', 1),
(14, '2017_10_10_040217_create_reading_type_question_detail_of_lessons_table', 2),
(15, '2017_10_10_040915_create_reading_question_and_answer_lessons_table', 2),
(16, '2017_10_10_041019_create_reading_result_lessons_table', 2),
(18, '2017_10_10_035557_create_reading_question_lessons_table', 3),
(19, '2017_10_10_032633_create_reading_question_learnings_table', 4),
(20, '2017_10_10_032817_create_reading_practice_lessons_table', 5),
(21, '2017_10_10_034722_create_reading_mini_test_lessons_table', 5),
(22, '2017_10_10_035050_create_reading_mix_test_lessons_table', 5),
(23, '2017_10_10_035322_create_reading_full_test_lessons_table', 5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `reading_full_test_lessons`
--

CREATE TABLE `reading_full_test_lessons` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level_user_id` int(10) UNSIGNED NOT NULL,
  `content_lesson` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `content_highlight` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_feature` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content_quiz` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `content_answer_quiz` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_questions` int(11) NOT NULL,
  `limit_time` int(11) NOT NULL DEFAULT '60',
  `order_lesson` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `reading_learning_type_questions`
--

CREATE TABLE `reading_learning_type_questions` (
  `id` int(10) UNSIGNED NOT NULL,
  `type_question_id` int(10) UNSIGNED NOT NULL,
  `title_section` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `step_section` int(11) NOT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'fa-cog',
  `view_layout` tinyint(4) NOT NULL DEFAULT '1',
  `content_section` text COLLATE utf8mb4_unicode_ci,
  `left_content` text COLLATE utf8mb4_unicode_ci,
  `right_content` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `reading_learning_type_questions`
--

INSERT INTO `reading_learning_type_questions` (`id`, `type_question_id`, `title_section`, `step_section`, `icon`, `view_layout`, `content_section`, `left_content`, `right_content`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'test', 3, 'fa-cog', 1, '<p>dsad<span class=\"label-input key-label\"><strong>1</strong></span> <input class=\"question-quiz question-input question-1 last-option\" data-qnumber=\"1\" name=\"question-1\" onclick=\"bitest(this)\" type=\"text\" /></p>', '', '', 1, '2017-10-12 03:50:16', '2017-10-12 03:50:16'),
(2, 1, 'testr123', 33, 'fa-cog', 1, '<p><span class=\"label-input key-label\"><strong>1</strong></span> <input class=\"question-quiz question-input question-1 last-option\" data-qnumber=\"1\" name=\"question-1\" onclick=\"bitest(this)\" type=\"text\" /></p>', '', '', 1, '2017-10-12 03:51:43', '2017-10-12 03:51:43'),
(3, 1, '3esd', 67, 'fa-cog', 1, '<p>dsad asdsad&nbsp;</p>', '', '', 1, '2017-10-12 04:00:02', '2017-10-12 04:00:02'),
(4, 1, 'asd', 4, 'fa-cog', 1, '<p><span class=\"label-input key-label\"><strong>3</strong></span> <input class=\"question-quiz question-input question-3 last-option\" data-qnumber=\"1\" name=\"question-3\" onclick=\"bitest(this)\" type=\"text\" /></p>', '', '', 1, '2017-10-12 04:13:43', '2017-10-12 04:13:43'),
(5, 2, 'test', 3, 'fa-cog', 1, '<p><span class=\"label-input key-label\"><strong>3</strong></span> <input class=\"question-quiz question-input question-3 last-option\" data-qnumber=\"1\" name=\"question-3\" onclick=\"bitest(this)\" type=\"text\" /></p>', '', '', 1, '2017-10-12 04:15:22', '2017-10-12 04:15:22'),
(6, 1, 'tse', 3454, 'fa-cog', 1, '<p><span class=\"label-input key-label\"><strong>1</strong></span> <input class=\"question-quiz question-input question-1 last-option\" data-qnumber=\"1\" name=\"question-1\" onclick=\"bitest(this)\" type=\"text\" /></p>\n\n<p><span class=\"label-input key-label\"><strong>3</strong></span> <input class=\"question-quiz question-input question-3 last-option\" data-qnumber=\"2\" name=\"question-3\" onclick=\"bitest(this)\" type=\"text\" /></p>', '', '', 1, '2017-10-12 04:28:22', '2017-10-12 04:28:22'),
(7, 4, 'wfsdf', 2, 'fa-cog', 2, '<p><span class=\"label-input key-label\"><strong>3</strong></span> <input class=\"question-quiz question-input question-3 last-option\" data-qnumber=\"3\" name=\"question-3\" onclick=\"bitest(this)\" type=\"text\" /></p>', '<p>asd</p>\n', '<p><span class=\"label-input key-label\"><strong>34</strong></span> <input class=\"question-quiz question-input question-34 last-option\" data-qnumber=\"4\" name=\"question-34\" onclick=\"bitest(this)\" type=\"text\" /></p>\n', 1, '2017-10-12 04:32:45', '2017-10-12 04:32:45'),
(8, 2, 'asd', 1, 'fa-cog', 1, '<p>asdasd<span class=\"label-input key-label\"><strong>1</strong></span> <input class=\"question-quiz question-input question-1 last-option\" data-qnumber=\"5\" name=\"question-1\" onclick=\"bitest(this)\" type=\"text\" /></p>', '', '', 1, '2017-10-12 11:27:04', '2017-10-12 11:27:04');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `reading_level_lessons`
--

CREATE TABLE `reading_level_lessons` (
  `id` int(10) UNSIGNED NOT NULL,
  `level` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `reading_level_lessons`
--

INSERT INTO `reading_level_lessons` (`id`, `level`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Basic', 1, '2017-10-11 08:39:52', '2017-10-11 08:39:52'),
(2, 'Inter', 1, '2017-10-11 08:39:55', '2017-10-11 08:39:55'),
(3, 'Master', 1, '2017-10-11 08:39:58', '2017-10-11 08:39:58');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `reading_level_users`
--

CREATE TABLE `reading_level_users` (
  `id` int(10) UNSIGNED NOT NULL,
  `level` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `reading_level_users`
--

INSERT INTO `reading_level_users` (`id`, `level`, `status`, `created_at`, `updated_at`) VALUES
(1, 'User', 1, '2017-10-11 08:39:21', '2017-10-11 08:39:21'),
(2, 'VIP', 1, '2017-10-11 08:39:27', '2017-10-11 08:39:27'),
(3, 'Supporter', 1, '2017-10-11 08:39:35', '2017-10-11 08:39:35'),
(4, 'Admin', 1, '2017-10-11 08:39:38', '2017-10-11 08:39:38');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `reading_mini_test_lessons`
--

CREATE TABLE `reading_mini_test_lessons` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level_user_id` int(10) UNSIGNED NOT NULL,
  `type_question_id` int(11) DEFAULT NULL,
  `content_lesson` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `content_highlight` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_feature` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content_quiz` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `content_answer_quiz` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_questions` int(11) NOT NULL,
  `order_lesson` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `reading_mix_test_lessons`
--

CREATE TABLE `reading_mix_test_lessons` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level_user_id` int(10) UNSIGNED NOT NULL,
  `content_lesson` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `content_highlight` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_feature` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content_quiz` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `content_answer_quiz` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_questions` int(11) NOT NULL,
  `limit_time` int(11) NOT NULL DEFAULT '20',
  `order_lesson` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `reading_password_resets`
--

CREATE TABLE `reading_password_resets` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `reading_practice_lessons`
--

CREATE TABLE `reading_practice_lessons` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level_user_id` int(10) UNSIGNED NOT NULL,
  `content_lesson` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `content_highlight` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_feature` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content_quiz` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `content_answer_quiz` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_questions` int(11) NOT NULL,
  `order_lesson` int(11) NOT NULL,
  `type_question_id` int(11) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `reading_practice_lessons`
--

INSERT INTO `reading_practice_lessons` (`id`, `title`, `level_user_id`, `content_lesson`, `content_highlight`, `image_feature`, `content_quiz`, `content_answer_quiz`, `total_questions`, `order_lesson`, `type_question_id`, `status`, `created_at`, `updated_at`) VALUES
(1, '123', 1, '<p>asd</p>\n', '<p>asd</p>\n', '1-19398820_1426172534129041_1021977243_n.png', '<p>1<span class=\"label-input key-label\"><strong>2</strong></span> <input class=\"question-quiz question-input question-2 last-option\" data-qnumber=\"1\" name=\"question-2\" onclick=\"bitest(this)\" type=\"text\" /></p>\n', '<p>1<span class=\"label-input key-label\"><strong>2</strong></span> <input class=\"question-quiz question-input question-2 last-option\" data-qnumber=\"1\" name=\"question-2\" onclick=\"bitest(this)\" type=\"text\" disabled=\"disabled\"></p><div class=\"explain-area explain-2 explain-area-1\" data-qnumber=\"1\" data-qorder=\"2\" data-type-question=\"1\"><div class=\"show-answer\"><button type=\"button\" class=\"btn btn-danger btn-show-answer\">Answer 2 <div class=\"badge badge-pill key-answer\">A</div></button><div class=\"keywords-show hidden-class\" id=\"keywordArea-1\"> <span class=\"keywords-area-title\"><i class=\"fa fa-key\" aria-hidden=\"true\"></i>&nbsp;Keywords</span><span class=\"keywords-area\">No_keywords</span></div></div><div class=\"solution-tools locate-highlight-tool\"><a class=\"btn btn-xs btn-outline-warning btn-locate-highlight\" data-qnumber=\"1\" onclick=\"scrollToHighlight(2)\"><i class=\"fa fa-map-marker\" aria-hidden=\"true\"></i>&nbsp;Locate</a></div><div class=\"solution-tools locate-comment-tool\"><a class=\"btn btn-xs btn-outline-primary btn-show-comments\" data-qnumber=\"1\" data-toggle=\"collapse\" href=\"#commentArea-1\" aria-expanded=\"false\" aria-controls=\"commentArea-1\" onclick=\"showComments(1)\"><i class=\"fa fa-question\" aria-hidden=\"true\"></i>&nbsp;Comments</a></div><div class=\"collapse collage-comments collapse-custom\" id=\"commentArea-1\"> <div class=\"card card-header comments-area-title\">QUESTION &amp; ANSWER:</div><div class=\"card card-block comments-area\"></div></div></div>\n', 1, 5, 1, 1, '2017-10-12 11:40:10', '2017-10-16 02:57:00'),
(2, 'Advanced initialisation', 2, '<p><b>adsad asd</b></p>\n', '<p><b><span class=\"answer-highlight highlight-2 hidden-highlight\" data-timestamp=\"1507808502919\" style=\"background-color: rgb(255, 255, 123);\" data-highlighted=\"true\" data-qnumber=\"3\" id=\"hl-answer-3\">ad</span>sa<span class=\"answer-highlight highlight-1 hidden-highlight\" data-timestamp=\"1507808500023\" style=\"background-color: rgb(255, 255, 123);\" data-highlighted=\"true\" data-qnumber=\"2\" id=\"hl-answer-2\">d asd</span></b></p>\n', '2-anh-luffy-chibi-3.jpg', '<p><span class=\"label-input key-label\"><strong>1</strong></span> <input class=\"question-quiz question-input question-1 last-option\" data-qnumber=\"2\" name=\"question-1\" onclick=\"bitest(this)\" type=\"text\" /></p>\n\n<p><span class=\"label-input key-label\"><strong>2</strong></span> <input class=\"question-quiz question-input question-2 last-option\" data-qnumber=\"3\" name=\"question-2\" onclick=\"bitest(this)\" type=\"text\" /></p>\n', '<p><span class=\"label-input key-label\"><strong>1</strong></span> <input class=\"question-quiz question-input question-1 last-option\" data-qnumber=\"2\" name=\"question-1\" onclick=\"bitest(this)\" type=\"text\" disabled=\"disabled\"></p><div class=\"explain-area explain-1 explain-area-2\" data-qnumber=\"2\" data-qorder=\"1\" data-type-question=\"4\"><div class=\"show-answer\"><button type=\"button\" class=\"btn btn-danger btn-show-answer\">Answer 1 <div class=\"badge badge-pill key-answer\">A</div></button><div class=\"keywords-show \" id=\"keywordArea-2\"> <span class=\"keywords-area-title\"><i class=\"fa fa-key\" aria-hidden=\"true\"></i>&nbsp;Keywords</span><span class=\"keywords-area\">D</span></div></div><div class=\"solution-tools locate-highlight-tool\"><a class=\"btn btn-xs btn-outline-warning btn-locate-highlight\" data-qnumber=\"2\" onclick=\"scrollToHighlight(1)\"><i class=\"fa fa-map-marker\" aria-hidden=\"true\"></i>&nbsp;Locate</a></div><div class=\"solution-tools locate-comment-tool\"><a class=\"btn btn-xs btn-outline-primary btn-show-comments\" data-qnumber=\"2\" data-toggle=\"collapse\" href=\"#commentArea-2\" aria-expanded=\"false\" aria-controls=\"commentArea-2\" onclick=\"showComments(2)\"><i class=\"fa fa-question\" aria-hidden=\"true\"></i>&nbsp;Comments</a></div><div class=\"collapse collage-comments collapse-custom\" id=\"commentArea-2\"> <div class=\"card card-header comments-area-title\">QUESTION &amp; ANSWER:</div><div class=\"card card-block comments-area\"></div></div></div>\n\n<p><span class=\"label-input key-label\"><strong>2</strong></span> <input class=\"question-quiz question-input question-2 last-option\" data-qnumber=\"3\" name=\"question-2\" onclick=\"bitest(this)\" type=\"text\" disabled=\"disabled\"></p><div class=\"explain-area explain-2 explain-area-3\" data-qnumber=\"3\" data-qorder=\"2\" data-type-question=\"4\"><div class=\"show-answer\"><button type=\"button\" class=\"btn btn-danger btn-show-answer\">Answer 2 <div class=\"badge badge-pill key-answer\">D</div></button><div class=\"keywords-show \" id=\"keywordArea-3\"> <span class=\"keywords-area-title\"><i class=\"fa fa-key\" aria-hidden=\"true\"></i>&nbsp;Keywords</span><span class=\"keywords-area\">sad</span></div></div><div class=\"solution-tools locate-highlight-tool\"><a class=\"btn btn-xs btn-outline-warning btn-locate-highlight\" data-qnumber=\"3\" onclick=\"scrollToHighlight(2)\"><i class=\"fa fa-map-marker\" aria-hidden=\"true\"></i>&nbsp;Locate</a></div><div class=\"solution-tools locate-comment-tool\"><a class=\"btn btn-xs btn-outline-primary btn-show-comments\" data-qnumber=\"3\" data-toggle=\"collapse\" href=\"#commentArea-3\" aria-expanded=\"false\" aria-controls=\"commentArea-3\" onclick=\"showComments(3)\"><i class=\"fa fa-question\" aria-hidden=\"true\"></i>&nbsp;Comments</a></div><div class=\"collapse collage-comments collapse-custom\" id=\"commentArea-3\"> <div class=\"card card-header comments-area-title\">QUESTION &amp; ANSWER:</div><div class=\"card card-block comments-area\"></div></div></div>\n', 2, 3, 4, 1, '2017-10-12 11:41:44', '2017-10-12 11:41:44'),
(3, 'test-123324', 3, '<p><b>adsad asd</b></p>\n', '<p><b><span class=\"answer-highlight highlight-2 hidden-highlight\" data-timestamp=\"1507808502919\" style=\"background-color: rgb(255, 255, 123);\" data-highlighted=\"true\" data-qnumber=\"3\" id=\"hl-answer-3\">ad</span>sa<span class=\"answer-highlight highlight-1 hidden-highlight\" data-timestamp=\"1507808500023\" style=\"background-color: rgb(255, 255, 123);\" data-highlighted=\"true\" data-qnumber=\"2\" id=\"hl-answer-2\">d asd</span></b></p>\n', '3-anh-luffy-chibi-3.jpg', '<p><span class=\"label-input key-label\"><strong>1</strong></span> <input class=\"question-quiz question-input question-1 last-option\" data-qnumber=\"2\" name=\"question-1\" onclick=\"bitest(this)\" type=\"text\" /></p>\n\n<p><span class=\"label-input key-label\"><strong>2</strong></span> <input class=\"question-quiz question-input question-2 last-option\" data-qnumber=\"3\" name=\"question-2\" onclick=\"bitest(this)\" type=\"text\" /></p>\n', '<p><span class=\"label-input key-label\"><strong>1</strong></span> <input class=\"question-quiz question-input question-1 last-option\" data-qnumber=\"2\" name=\"question-1\" onclick=\"bitest(this)\" type=\"text\" disabled=\"disabled\"></p><div class=\"explain-area explain-1 explain-area-2\" data-qnumber=\"2\" data-qorder=\"1\" data-type-question=\"4\"><div class=\"show-answer\"><button type=\"button\" class=\"btn btn-danger btn-show-answer\">Answer 1 <div class=\"badge badge-pill key-answer\">A</div></button><div class=\"keywords-show \" id=\"keywordArea-2\"> <span class=\"keywords-area-title\"><i class=\"fa fa-key\" aria-hidden=\"true\"></i>&nbsp;Keywords</span><span class=\"keywords-area\">D</span></div></div><div class=\"solution-tools locate-highlight-tool\"><a class=\"btn btn-xs btn-outline-warning btn-locate-highlight\" data-qnumber=\"2\" onclick=\"scrollToHighlight(1)\"><i class=\"fa fa-map-marker\" aria-hidden=\"true\"></i>&nbsp;Locate</a></div><div class=\"solution-tools locate-comment-tool\"><a class=\"btn btn-xs btn-outline-primary btn-show-comments\" data-qnumber=\"2\" data-toggle=\"collapse\" href=\"#commentArea-2\" aria-expanded=\"false\" aria-controls=\"commentArea-2\" onclick=\"showComments(2)\"><i class=\"fa fa-question\" aria-hidden=\"true\"></i>&nbsp;Comments</a></div><div class=\"collapse collage-comments collapse-custom\" id=\"commentArea-2\"> <div class=\"card card-header comments-area-title\">QUESTION &amp; ANSWER:</div><div class=\"card card-block comments-area\"></div></div></div>\n\n<p><span class=\"label-input key-label\"><strong>2</strong></span> <input class=\"question-quiz question-input question-2 last-option\" data-qnumber=\"3\" name=\"question-2\" onclick=\"bitest(this)\" type=\"text\" disabled=\"disabled\"></p><div class=\"explain-area explain-2 explain-area-3\" data-qnumber=\"3\" data-qorder=\"2\" data-type-question=\"4\"><div class=\"show-answer\"><button type=\"button\" class=\"btn btn-danger btn-show-answer\">Answer 2 <div class=\"badge badge-pill key-answer\">D</div></button><div class=\"keywords-show \" id=\"keywordArea-3\"> <span class=\"keywords-area-title\"><i class=\"fa fa-key\" aria-hidden=\"true\"></i>&nbsp;Keywords</span><span class=\"keywords-area\">sad</span></div></div><div class=\"solution-tools locate-highlight-tool\"><a class=\"btn btn-xs btn-outline-warning btn-locate-highlight\" data-qnumber=\"3\" onclick=\"scrollToHighlight(2)\"><i class=\"fa fa-map-marker\" aria-hidden=\"true\"></i>&nbsp;Locate</a></div><div class=\"solution-tools locate-comment-tool\"><a class=\"btn btn-xs btn-outline-primary btn-show-comments\" data-qnumber=\"3\" data-toggle=\"collapse\" href=\"#commentArea-3\" aria-expanded=\"false\" aria-controls=\"commentArea-3\" onclick=\"showComments(3)\"><i class=\"fa fa-question\" aria-hidden=\"true\"></i>&nbsp;Comments</a></div><div class=\"collapse collage-comments collapse-custom\" id=\"commentArea-3\"> <div class=\"card card-header comments-area-title\">QUESTION &amp; ANSWER:</div><div class=\"card card-block comments-area\"></div></div></div>\n', 2, 7, 4, 1, '2017-10-12 11:41:46', '2017-10-16 04:51:23'),
(4, '-changed', 2, '<p><b>adsad asd</b></p>\n', '<p><b><span class=\"answer-highlight highlight-2 hidden-highlight\" data-timestamp=\"1507808502919\" style=\"background-color: rgb(255, 255, 123);\" data-highlighted=\"true\" data-qnumber=\"3\" id=\"hl-answer-3\">ad</span>sa<span class=\"answer-highlight highlight-1 hidden-highlight\" data-timestamp=\"1507808500023\" style=\"background-color: rgb(255, 255, 123);\" data-highlighted=\"true\" data-qnumber=\"2\" id=\"hl-answer-2\">d asd</span></b></p>\n', '4-anh-luffy-chibi-3.jpg', '<p><span class=\"label-input key-label\"><strong>1</strong></span> <input class=\"question-quiz question-input question-1 last-option\" data-qnumber=\"2\" name=\"question-1\" onclick=\"bitest(this)\" type=\"text\" /></p>\n\n<p><span class=\"label-input key-label\"><strong>2</strong></span> <input class=\"question-quiz question-input question-2 last-option\" data-qnumber=\"3\" name=\"question-2\" onclick=\"bitest(this)\" type=\"text\" /></p>\n', '<p><span class=\"label-input key-label\"><strong>1</strong></span> <input class=\"question-quiz question-input question-1 last-option\" data-qnumber=\"2\" name=\"question-1\" onclick=\"bitest(this)\" type=\"text\" disabled=\"disabled\"></p><div class=\"explain-area explain-1 explain-area-2\" data-qnumber=\"2\" data-qorder=\"1\" data-type-question=\"4\"><div class=\"show-answer\"><button type=\"button\" class=\"btn btn-danger btn-show-answer\">Answer 1 <div class=\"badge badge-pill key-answer\">A</div></button><div class=\"keywords-show \" id=\"keywordArea-2\"> <span class=\"keywords-area-title\"><i class=\"fa fa-key\" aria-hidden=\"true\"></i>&nbsp;Keywords</span><span class=\"keywords-area\">D</span></div></div><div class=\"solution-tools locate-highlight-tool\"><a class=\"btn btn-xs btn-outline-warning btn-locate-highlight\" data-qnumber=\"2\" onclick=\"scrollToHighlight(1)\"><i class=\"fa fa-map-marker\" aria-hidden=\"true\"></i>&nbsp;Locate</a></div><div class=\"solution-tools locate-comment-tool\"><a class=\"btn btn-xs btn-outline-primary btn-show-comments\" data-qnumber=\"2\" data-toggle=\"collapse\" href=\"#commentArea-2\" aria-expanded=\"false\" aria-controls=\"commentArea-2\" onclick=\"showComments(2)\"><i class=\"fa fa-question\" aria-hidden=\"true\"></i>&nbsp;Comments</a></div><div class=\"collapse collage-comments collapse-custom\" id=\"commentArea-2\"> <div class=\"card card-header comments-area-title\">QUESTION &amp; ANSWER:</div><div class=\"card card-block comments-area\"></div></div></div>\n\n<p><span class=\"label-input key-label\"><strong>2</strong></span> <input class=\"question-quiz question-input question-2 last-option\" data-qnumber=\"3\" name=\"question-2\" onclick=\"bitest(this)\" type=\"text\" disabled=\"disabled\"></p><div class=\"explain-area explain-2 explain-area-3\" data-qnumber=\"3\" data-qorder=\"2\" data-type-question=\"4\"><div class=\"show-answer\"><button type=\"button\" class=\"btn btn-danger btn-show-answer\">Answer 2 <div class=\"badge badge-pill key-answer\">D</div></button><div class=\"keywords-show \" id=\"keywordArea-3\"> <span class=\"keywords-area-title\"><i class=\"fa fa-key\" aria-hidden=\"true\"></i>&nbsp;Keywords</span><span class=\"keywords-area\">sad</span></div></div><div class=\"solution-tools locate-highlight-tool\"><a class=\"btn btn-xs btn-outline-warning btn-locate-highlight\" data-qnumber=\"3\" onclick=\"scrollToHighlight(2)\"><i class=\"fa fa-map-marker\" aria-hidden=\"true\"></i>&nbsp;Locate</a></div><div class=\"solution-tools locate-comment-tool\"><a class=\"btn btn-xs btn-outline-primary btn-show-comments\" data-qnumber=\"3\" data-toggle=\"collapse\" href=\"#commentArea-3\" aria-expanded=\"false\" aria-controls=\"commentArea-3\" onclick=\"showComments(3)\"><i class=\"fa fa-question\" aria-hidden=\"true\"></i>&nbsp;Comments</a></div><div class=\"collapse collage-comments collapse-custom\" id=\"commentArea-3\"> <div class=\"card card-header comments-area-title\">QUESTION &amp; ANSWER:</div><div class=\"card card-block comments-area\"></div></div></div>\n', 2, 41, 1, 1, '2017-10-12 11:41:48', '2017-10-16 02:54:46'),
(6, 'title-changed', 3, '<p>asd sad sad</p>\n', '<p>asd sad sad</p>\n', '5-anh-luffy-chibi-3.jpg', '<p><span class=\"label-input key-label\"><strong>1</strong></span> <input class=\"question-quiz question-input question-1 last-option\" data-qnumber=\"1\" name=\"question-1\" onclick=\"bitest(this)\" type=\"text\" /></p>\n\n<p><span class=\"label-input key-label\"><strong>2</strong></span> <input class=\"question-quiz question-input question-2 last-option\" data-qnumber=\"2\" name=\"question-2\" onclick=\"bitest(this)\" type=\"text\" /><span class=\"label-input key-label\"><strong>4</strong></span> <input class=\"question-quiz question-input question-4 last-option\" data-qnumber=\"3\" name=\"question-4\" onclick=\"bitest(this)\" type=\"text\" /></p>\n', '<p><span class=\"label-input key-label\"><strong>1</strong></span> <input class=\"question-quiz question-input question-1 last-option\" data-qnumber=\"1\" name=\"question-1\" onclick=\"bitest(this)\" type=\"text\" disabled=\"disabled\"></p><div class=\"explain-area explain-1 explain-area-1\" data-qnumber=\"1\" data-qorder=\"1\" data-type-question=\"1\"><div class=\"show-answer\"><button type=\"button\" class=\"btn btn-danger btn-show-answer\">Answer 1 <div class=\"badge badge-pill key-answer\">A</div></button><div class=\"keywords-show \" id=\"keywordArea-1\"> <span class=\"keywords-area-title\"><i class=\"fa fa-key\" aria-hidden=\"true\"></i>&nbsp;Keywords</span><span class=\"keywords-area\">d</span></div></div><div class=\"solution-tools locate-highlight-tool\"><a class=\"btn btn-xs btn-outline-warning btn-locate-highlight\" data-qnumber=\"1\" onclick=\"scrollToHighlight(1)\"><i class=\"fa fa-map-marker\" aria-hidden=\"true\"></i>&nbsp;Locate</a></div><div class=\"solution-tools locate-comment-tool\"><a class=\"btn btn-xs btn-outline-primary btn-show-comments\" data-qnumber=\"1\" data-toggle=\"collapse\" href=\"#commentArea-1\" aria-expanded=\"false\" aria-controls=\"commentArea-1\" onclick=\"showComments(1)\"><i class=\"fa fa-question\" aria-hidden=\"true\"></i>&nbsp;Comments</a></div><div class=\"collapse collage-comments collapse-custom\" id=\"commentArea-1\"> <div class=\"card card-header comments-area-title\">QUESTION &amp; ANSWER:</div><div class=\"card card-block comments-area\"></div></div></div>\n\n<p><span class=\"label-input key-label\"><strong>2</strong></span> <input class=\"question-quiz question-input question-2 last-option\" data-qnumber=\"2\" name=\"question-2\" onclick=\"bitest(this)\" type=\"text\" disabled=\"disabled\"><span class=\"label-input key-label\"><strong>4</strong></span> <input class=\"question-quiz question-input question-4 last-option\" data-qnumber=\"3\" name=\"question-4\" onclick=\"bitest(this)\" type=\"text\" disabled=\"disabled\"></p><div class=\"explain-area explain-4 explain-area-3\" data-qnumber=\"3\" data-qorder=\"4\" data-type-question=\"1\"><div class=\"show-answer\"><button type=\"button\" class=\"btn btn-danger btn-show-answer\">Answer 4 <div class=\"badge badge-pill key-answer\">C</div></button><div class=\"keywords-show hidden-class\" id=\"keywordArea-3\"> <span class=\"keywords-area-title\"><i class=\"fa fa-key\" aria-hidden=\"true\"></i>&nbsp;Keywords</span><span class=\"keywords-area\">No_keywords</span></div></div><div class=\"solution-tools locate-highlight-tool\"><a class=\"btn btn-xs btn-outline-warning btn-locate-highlight\" data-qnumber=\"3\" onclick=\"scrollToHighlight(4)\"><i class=\"fa fa-map-marker\" aria-hidden=\"true\"></i>&nbsp;Locate</a></div><div class=\"solution-tools locate-comment-tool\"><a class=\"btn btn-xs btn-outline-primary btn-show-comments\" data-qnumber=\"3\" data-toggle=\"collapse\" href=\"#commentArea-3\" aria-expanded=\"false\" aria-controls=\"commentArea-3\" onclick=\"showComments(3)\"><i class=\"fa fa-question\" aria-hidden=\"true\"></i>&nbsp;Comments</a></div><div class=\"collapse collage-comments collapse-custom\" id=\"commentArea-3\"> <div class=\"card card-header comments-area-title\">QUESTION &amp; ANSWER:</div><div class=\"card card-block comments-area\"></div></div></div><div class=\"explain-area explain-2 explain-area-2\" data-qnumber=\"2\" data-qorder=\"2\" data-type-question=\"1\"><div class=\"show-answer\"><button type=\"button\" class=\"btn btn-danger btn-show-answer\">Answer 2 <div class=\"badge badge-pill key-answer\">B</div></button><div class=\"keywords-show \" id=\"keywordArea-2\"> <span class=\"keywords-area-title\"><i class=\"fa fa-key\" aria-hidden=\"true\"></i>&nbsp;Keywords</span><span class=\"keywords-area\">asd</span></div></div><div class=\"solution-tools locate-highlight-tool\"><a class=\"btn btn-xs btn-outline-warning btn-locate-highlight\" data-qnumber=\"2\" onclick=\"scrollToHighlight(2)\"><i class=\"fa fa-map-marker\" aria-hidden=\"true\"></i>&nbsp;Locate</a></div><div class=\"solution-tools locate-comment-tool\"><a class=\"btn btn-xs btn-outline-primary btn-show-comments\" data-qnumber=\"2\" data-toggle=\"collapse\" href=\"#commentArea-2\" aria-expanded=\"false\" aria-controls=\"commentArea-2\" onclick=\"showComments(2)\"><i class=\"fa fa-question\" aria-hidden=\"true\"></i>&nbsp;Comments</a></div><div class=\"collapse collage-comments collapse-custom\" id=\"commentArea-2\"> <div class=\"card card-header comments-area-title\">QUESTION &amp; ANSWER:</div><div class=\"card card-block comments-area\"></div></div></div>\n', 3, 6, 1, 1, '2017-10-12 11:57:40', '2017-10-13 08:19:45'),
(7, 'te11234567134', 4, '<p>sad</p>\n', '<p>sad</p>\n', '7-5099730d07dceb82b2cd.jpg', '<p><span class=\"label-input key-label\"><strong>1</strong></span> <input class=\"question-quiz question-input question-1 last-option\" data-qnumber=\"4\" name=\"question-1\" onclick=\"bitest(this)\" type=\"text\" /></p>\n', '<p><span class=\"label-input key-label\"><strong>1</strong></span> <input class=\"question-quiz question-input question-1 last-option\" data-qnumber=\"4\" name=\"question-1\" onclick=\"bitest(this)\" type=\"text\" disabled=\"disabled\"></p><div class=\"explain-area explain-1 explain-area-4\" data-qnumber=\"4\" data-qorder=\"1\" data-type-question=\"3\"><div class=\"show-answer\"><button type=\"button\" class=\"btn btn-danger btn-show-answer\">Answer 1 <div class=\"badge badge-pill key-answer\">A</div></button><div class=\"keywords-show \" id=\"keywordArea-4\"> <span class=\"keywords-area-title\"><i class=\"fa fa-key\" aria-hidden=\"true\"></i>&nbsp;Keywords</span><span class=\"keywords-area\">ds</span></div></div><div class=\"solution-tools locate-highlight-tool\"><a class=\"btn btn-xs btn-outline-warning btn-locate-highlight\" data-qnumber=\"4\" onclick=\"scrollToHighlight(1)\"><i class=\"fa fa-map-marker\" aria-hidden=\"true\"></i>&nbsp;Locate</a></div><div class=\"solution-tools locate-comment-tool\"><a class=\"btn btn-xs btn-outline-primary btn-show-comments\" data-qnumber=\"4\" data-toggle=\"collapse\" href=\"#commentArea-4\" aria-expanded=\"false\" aria-controls=\"commentArea-4\" onclick=\"showComments(4)\"><i class=\"fa fa-question\" aria-hidden=\"true\"></i>&nbsp;Comments</a></div><div class=\"collapse collage-comments collapse-custom\" id=\"commentArea-4\"> <div class=\"card card-header comments-area-title\">QUESTION &amp; ANSWER:</div><div class=\"card card-block comments-area\"></div></div></div>\n', 1, 6, 4, 1, '2017-10-16 01:48:46', '2017-10-16 04:50:59'),
(8, 'changeddddddddddd', 3, '<p>dsad</p>\n', '<p>dsad</p>\n', '8-70b811c266138a4dd302.jpg', '<p><span class=\"label-input key-label\"><strong>1</strong></span> <input class=\"question-quiz question-input question-1 last-option\" data-qnumber=\"5\" name=\"question-1\" onclick=\"bitest(this)\" type=\"text\" /></p>\n', '<p><span class=\"label-input key-label\"><strong>1</strong></span> <input class=\"question-quiz question-input question-1 last-option\" data-qnumber=\"5\" name=\"question-1\" onclick=\"bitest(this)\" type=\"text\" disabled=\"disabled\"></p><div class=\"explain-area explain-1 explain-area-5\" data-qnumber=\"5\" data-qorder=\"1\" data-type-question=\"4\"><div class=\"show-answer\"><button type=\"button\" class=\"btn btn-danger btn-show-answer\">Answer 1 <div class=\"badge badge-pill key-answer\">sd</div></button><div class=\"keywords-show \" id=\"keywordArea-5\"> <span class=\"keywords-area-title\"><i class=\"fa fa-key\" aria-hidden=\"true\"></i>&nbsp;Keywords</span><span class=\"keywords-area\">sd</span></div></div><div class=\"solution-tools locate-highlight-tool\"><a class=\"btn btn-xs btn-outline-warning btn-locate-highlight\" data-qnumber=\"5\" onclick=\"scrollToHighlight(1)\"><i class=\"fa fa-map-marker\" aria-hidden=\"true\"></i>&nbsp;Locate</a></div><div class=\"solution-tools locate-comment-tool\"><a class=\"btn btn-xs btn-outline-primary btn-show-comments\" data-qnumber=\"5\" data-toggle=\"collapse\" href=\"#commentArea-5\" aria-expanded=\"false\" aria-controls=\"commentArea-5\" onclick=\"showComments(5)\"><i class=\"fa fa-question\" aria-hidden=\"true\"></i>&nbsp;Comments</a></div><div class=\"collapse collage-comments collapse-custom\" id=\"commentArea-5\"> <div class=\"card card-header comments-area-title\">QUESTION &amp; ANSWER:</div><div class=\"card card-block comments-area\"></div></div></div>\n', 1, 5, 4, 1, '2017-10-16 01:49:45', '2017-10-16 04:51:05'),
(9, 'Tes', 1, '<p>dfgfhg hghjg jhj h</p>\n', '<p><span class=\"answer-highlight highlight-1 hidden-highlight\" data-timestamp=\"1508143411920\" style=\"background-color: rgb(255, 255, 123);\" data-highlighted=\"true\" data-qnumber=\"6\" id=\"hl-answer-6\">dfgf</span>hg hghj<span class=\"answer-highlight highlight-2 hidden-highlight\" data-timestamp=\"1508143417536\" style=\"background-color: rgb(255, 255, 123);\" data-highlighted=\"true\" id=\"hl-answer-undefined\">g jhj h</span></p>\n', '9-Download.jpg', '<p>gfgf<span class=\"label-input key-label\"><strong>1</strong></span> <input class=\"question-quiz question-input question-1 last-option\" data-qnumber=\"6\" name=\"question-1\" onclick=\"bitest(this)\" type=\"text\" /></p>\n', '<p>gfgf<span class=\"label-input key-label\"><strong>1</strong></span> <input class=\"question-quiz question-input question-1 last-option\" data-qnumber=\"6\" name=\"question-1\" onclick=\"bitest(this)\" type=\"text\" disabled=\"disabled\"></p><div class=\"explain-area explain-1 explain-area-6\" data-qnumber=\"6\" data-qorder=\"1\" data-type-question=\"1\"><div class=\"show-answer\"><button type=\"button\" class=\"btn btn-danger btn-show-answer\">Answer 1 <div class=\"badge badge-pill key-answer\">A</div></button><div class=\"keywords-show hidden-class\" id=\"keywordArea-6\"> <span class=\"keywords-area-title\"><i class=\"fa fa-key\" aria-hidden=\"true\"></i>&nbsp;Keywords</span><span class=\"keywords-area\">No_keywords</span></div></div><div class=\"solution-tools locate-highlight-tool\"><a class=\"btn btn-xs btn-outline-warning btn-locate-highlight\" data-qnumber=\"6\" onclick=\"scrollToHighlight(1)\"><i class=\"fa fa-map-marker\" aria-hidden=\"true\"></i>&nbsp;Locate</a></div><div class=\"solution-tools locate-comment-tool\"><a class=\"btn btn-xs btn-outline-primary btn-show-comments\" data-qnumber=\"6\" data-toggle=\"collapse\" href=\"#commentArea-6\" aria-expanded=\"false\" aria-controls=\"commentArea-6\" onclick=\"showComments(6)\"><i class=\"fa fa-question\" aria-hidden=\"true\"></i>&nbsp;Comments</a></div><div class=\"collapse collage-comments collapse-custom\" id=\"commentArea-6\"> <div class=\"card card-header comments-area-title\">QUESTION &amp; ANSWER:</div><div class=\"card card-block comments-area\"></div></div></div>\n', 1, 1, 1, 1, '2017-10-16 08:44:10', '2017-10-16 08:44:10');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `reading_question_and_answer_lessons`
--

CREATE TABLE `reading_question_and_answer_lessons` (
  `id` int(10) UNSIGNED NOT NULL,
  `question_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `reply_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `content_cmt` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `private` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `reading_question_learnings`
--

CREATE TABLE `reading_question_learnings` (
  `id` int(10) UNSIGNED NOT NULL,
  `learning_type_question_id` int(10) UNSIGNED NOT NULL,
  `type_question_id` int(10) UNSIGNED NOT NULL,
  `question_custom_id` int(10) UNSIGNED NOT NULL,
  `answer` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keyword` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `reading_question_learnings`
--

INSERT INTO `reading_question_learnings` (`id`, `learning_type_question_id`, `type_question_id`, `question_custom_id`, `answer`, `keyword`, `status`, `created_at`, `updated_at`) VALUES
(1, 6, 1, 1, 'A', 'No_keywords', 1, '2017-10-12 04:28:22', '2017-10-12 04:28:22'),
(2, 6, 1, 2, 'D', 'No_keywords', 1, '2017-10-12 04:28:22', '2017-10-12 04:28:22'),
(3, 7, 4, 3, 'AS', 'No_keywords', 1, '2017-10-12 04:32:45', '2017-10-12 04:32:45'),
(4, 7, 4, 4, 'D', 'csv', 1, '2017-10-12 04:32:45', '2017-10-12 04:32:45'),
(5, 8, 2, 5, 'A', 'No_keywords', 1, '2017-10-12 11:27:04', '2017-10-12 11:27:04');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `reading_question_lessons`
--

CREATE TABLE `reading_question_lessons` (
  `id` int(10) UNSIGNED NOT NULL,
  `lesson_id` int(10) UNSIGNED NOT NULL,
  `type_lesson_id` int(11) DEFAULT NULL,
  `question_custom_id` int(10) UNSIGNED NOT NULL,
  `answer` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keyword` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type_question_id` int(10) UNSIGNED NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `reading_question_lessons`
--

INSERT INTO `reading_question_lessons` (`id`, `lesson_id`, `type_lesson_id`, `question_custom_id`, `answer`, `keyword`, `type_question_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 6, 1, 1, 'A', 'd', 1, 1, '2017-10-12 11:57:40', '2017-10-12 11:57:40'),
(2, 6, 1, 2, 'B', 'asd', 1, 1, '2017-10-12 11:57:40', '2017-10-12 11:57:40'),
(3, 6, 1, 3, 'C', 'No_keywords', 1, 1, '2017-10-12 11:57:40', '2017-10-12 11:57:40'),
(4, 7, 1, 4, 'A', 'ds', 3, 1, '2017-10-16 01:48:46', '2017-10-16 01:48:46'),
(5, 8, 1, 5, 'sd', 'sd', 4, 1, '2017-10-16 01:49:45', '2017-10-16 01:49:45'),
(6, 9, 1, 6, 'A', 'No_keywords', 1, 1, '2017-10-16 08:44:10', '2017-10-16 08:44:10');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `reading_result_lessons`
--

CREATE TABLE `reading_result_lessons` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `lesson_id` int(10) UNSIGNED NOT NULL,
  `type_lesson_id` int(11) DEFAULT NULL,
  `correct_answer` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `list_answered` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `highest_correct` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `reading_type_lessons`
--

CREATE TABLE `reading_type_lessons` (
  `id` int(10) UNSIGNED NOT NULL,
  `type_lesson` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `reading_type_questions`
--

CREATE TABLE `reading_type_questions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level_lesson_id` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `reading_type_questions`
--

INSERT INTO `reading_type_questions` (`id`, `name`, `level_lesson_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Locating information', '1', 1, '2017-10-11 08:40:56', '2017-10-11 08:40:56'),
(2, 'Locating information', '2', 1, '2017-10-11 08:41:00', '2017-10-11 08:41:00'),
(3, 'Locating information', '3', 1, '2017-10-11 08:41:03', '2017-10-11 08:41:03'),
(4, 'Matching', '2', 1, '2017-10-11 15:35:21', '2017-10-11 15:35:21');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `reading_type_question_detail_of_lessons`
--

CREATE TABLE `reading_type_question_detail_of_lessons` (
  `id` int(10) UNSIGNED NOT NULL,
  `lesson_id` int(10) UNSIGNED NOT NULL,
  `type_lesson_id` int(11) DEFAULT NULL,
  `type_question_id` int(10) UNSIGNED NOT NULL,
  `total_questions_of_type` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `reading_users`
--

CREATE TABLE `reading_users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level_user_id` tinyint(4) NOT NULL DEFAULT '0',
  `fullname` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `district` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(16) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `activated` tinyint(4) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `reading_full_test_lessons`
--
ALTER TABLE `reading_full_test_lessons`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `reading_learning_type_questions`
--
ALTER TABLE `reading_learning_type_questions`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `reading_level_lessons`
--
ALTER TABLE `reading_level_lessons`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `reading_level_lessons_level_unique` (`level`);

--
-- Chỉ mục cho bảng `reading_level_users`
--
ALTER TABLE `reading_level_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `reading_level_users_level_unique` (`level`);

--
-- Chỉ mục cho bảng `reading_mini_test_lessons`
--
ALTER TABLE `reading_mini_test_lessons`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `reading_mix_test_lessons`
--
ALTER TABLE `reading_mix_test_lessons`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `reading_password_resets`
--
ALTER TABLE `reading_password_resets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reading_password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `reading_practice_lessons`
--
ALTER TABLE `reading_practice_lessons`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `reading_question_and_answer_lessons`
--
ALTER TABLE `reading_question_and_answer_lessons`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `reading_question_learnings`
--
ALTER TABLE `reading_question_learnings`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `reading_question_lessons`
--
ALTER TABLE `reading_question_lessons`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `reading_result_lessons`
--
ALTER TABLE `reading_result_lessons`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `reading_type_lessons`
--
ALTER TABLE `reading_type_lessons`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `reading_type_lessons_type_lesson_unique` (`type_lesson`);

--
-- Chỉ mục cho bảng `reading_type_questions`
--
ALTER TABLE `reading_type_questions`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `reading_type_question_detail_of_lessons`
--
ALTER TABLE `reading_type_question_detail_of_lessons`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `reading_users`
--
ALTER TABLE `reading_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `reading_users_username_unique` (`username`),
  ADD UNIQUE KEY `reading_users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT cho bảng `reading_full_test_lessons`
--
ALTER TABLE `reading_full_test_lessons`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `reading_learning_type_questions`
--
ALTER TABLE `reading_learning_type_questions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `reading_level_lessons`
--
ALTER TABLE `reading_level_lessons`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `reading_level_users`
--
ALTER TABLE `reading_level_users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `reading_mini_test_lessons`
--
ALTER TABLE `reading_mini_test_lessons`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `reading_mix_test_lessons`
--
ALTER TABLE `reading_mix_test_lessons`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `reading_password_resets`
--
ALTER TABLE `reading_password_resets`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `reading_practice_lessons`
--
ALTER TABLE `reading_practice_lessons`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `reading_question_and_answer_lessons`
--
ALTER TABLE `reading_question_and_answer_lessons`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `reading_question_learnings`
--
ALTER TABLE `reading_question_learnings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `reading_question_lessons`
--
ALTER TABLE `reading_question_lessons`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `reading_result_lessons`
--
ALTER TABLE `reading_result_lessons`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `reading_type_lessons`
--
ALTER TABLE `reading_type_lessons`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `reading_type_questions`
--
ALTER TABLE `reading_type_questions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `reading_type_question_detail_of_lessons`
--
ALTER TABLE `reading_type_question_detail_of_lessons`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `reading_users`
--
ALTER TABLE `reading_users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
