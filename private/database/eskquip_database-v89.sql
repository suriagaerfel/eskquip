-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 07, 2026 at 03:43 PM
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
-- Database: `eskquip_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `account_types`
--

CREATE TABLE `account_types` (
  `account_typeId` int(11) NOT NULL,
  `account_typeName` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contents`
--

CREATE TABLE `contents` (
  `contentId` int(11) NOT NULL,
  `contentTitle` longtext NOT NULL,
  `contentSlug` longtext NOT NULL,
  `contentTable` varchar(64) NOT NULL,
  `contentForeignId` int(11) NOT NULL,
  `contentRegistrantId` int(11) NOT NULL,
  `contentStatus` varchar(64) NOT NULL,
  `contentPubDate` datetime NOT NULL,
  `contentDescription` longtext NOT NULL,
  `contentImage` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contents`
--

INSERT INTO `contents` (`contentId`, `contentTitle`, `contentSlug`, `contentTable`, `contentForeignId`, `contentRegistrantId`, `contentStatus`, `contentPubDate`, `contentDescription`, `contentImage`) VALUES
(34, 'Erfel App', '', 'developer_tools', 6, 1, 'Unpublished', '2025-11-07 21:17:27', '', ''),
(46, 'Erfel App 2', '', 'developer_tools', 7, 1, 'Unpublished', '2025-11-08 13:11:13', '', ''),
(48, 'Erfel App 4', '', 'developer_tools', 9, 1, 'Unpublished', '2025-11-08 13:29:22', '', ''),
(49, 'Erfel App 5', '', 'developer_tools', 10, 1, 'Unpublished', '2025-11-08 13:29:46', '', ''),
(52, 'Erfel App 8', '', 'developer_tools', 13, 1, 'Unpublished', '2025-11-08 13:31:25', '', ''),
(53, 'Erfel App 9', '', 'developer_tools', 14, 1, 'Unpublished', '2025-11-08 13:32:17', '', ''),
(54, 'Erfel App 10', '', 'developer_tools', 15, 1, 'Unpublished', '2025-11-08 13:32:56', '', ''),
(55, 'Erfel App 11', '', 'developer_tools', 16, 1, 'Unpublished', '2025-11-08 13:33:32', '', ''),
(120, 'Erfel App 56', '', 'developer_tools', 17, 1, 'Draft', '0000-00-00 00:00:00', '', ''),
(121, 'dgfhfh', '', 'developer_tools', 18, 1, 'Draft', '0000-00-00 00:00:00', '', ''),
(207, 'fgfchgchgf', 'fgfchgchgf', 'teacher_files', 27, 18, 'Unpublished', '2025-12-07 12:39:32', '', ''),
(208, 'vnvjhj', 'vnvjhj', 'writer_articles', 107, 18, 'Waiting for Update', '2025-12-07 12:45:05', '', ''),
(211, 'sdfdgfg', 'sdfdgfg', 'teacher_files', 28, 18, 'Unpublished', '2025-12-07 14:17:04', '', ''),
(218, 'safsff', '', 'developer_tools', 19, 1, 'Draft', '0000-00-00 00:00:00', '', ''),
(219, 'ggg', '', 'developer_tools', 20, 1, 'Draft', '0000-00-00 00:00:00', '', ''),
(220, 'sff', '', 'developer_tools', 21, 1, 'Draft', '0000-00-00 00:00:00', '', ''),
(221, 'dsdgggg', '', 'developer_tools', 22, 1, 'Draft', '0000-00-00 00:00:00', '', ''),
(225, 'sdfsdfsafsaf', 'sdfsdfsafsaf', 'teacher_files', 31, 1, 'Unpublished', '2025-12-11 11:06:40', '', ''),
(227, 'gdfgg', 'gdfgg', 'writer_articles', 115, 1, 'Unpublished', '2025-12-11 13:24:47', '', ''),
(229, 'sdfgfdh', 'sdfgfdh', 'teacher_files', 33, 1, 'Unpublished', '2025-12-12 20:03:43', '', ''),
(231, 'CVFDGFGFDG', 'cvfdgfgfdg', 'teacher_files', 34, 1, 'Draft', '0000-00-00 00:00:00', '', ''),
(233, 'fdgfdhfdhfdh', 'fdgfdhfdhfdh', 'writer_articles', 117, 1, 'Unpublished', '2025-12-13 21:31:16', '', ''),
(235, 'dsgfdhgfjhgjhg', 'dsgfdhgfjhgjhg', 'writer_articles', 119, 1, 'Unpublished', '2025-12-13 21:56:15', '', ''),
(236, 'chgfghg', 'chgfghg', 'writer_articles', 120, 1, 'Waiting for Update', '2025-12-14 14:57:39', '', ''),
(237, 'fgfdhgfh', 'fgfdhgfh', 'writer_articles', 121, 1, 'Waiting for Update', '2025-12-14 15:37:32', '', ''),
(238, 'dgfdgfdgfdg', 'dgfdgfdgfdg', 'writer_articles', 122, 18, 'Waiting for Update', '2025-12-14 16:05:18', '', ''),
(239, 'SDGFDH', '', 'developer_tools', 24, 1, 'Unpublished', '2025-12-15 22:58:41', '', ''),
(240, 'xcfhchgh', 'xcfhchgh', 'school_researches', 39, 9, 'Unpublished', '2025-12-19 18:58:49', '', ''),
(241, 'ggfdhfdhfdh', 'ggfdhfdhfdh', 'teacher_files', 35, 1, 'Unpublished', '2025-12-19 19:09:01', '', ''),
(242, 'ghgvjgjhg', 'ghgvjgjhg', 'writer_articles', 123, 1, 'Waiting for Update', '2025-12-15 23:09:38', '', ''),
(245, 'dfgfdgfdgfg', 'dfgfdgfdgfg', 'writer_articles', 124, 1, 'Draft', '0000-00-00 00:00:00', '', ''),
(246, 'dffdhfh', 'dffdhfh', 'writer_articles', 125, 1, 'Draft', '0000-00-00 00:00:00', '', ''),
(247, 'dgfdg', 'dgfdg', 'writer_articles', 126, 1, 'Waiting for Update', '2025-12-16 13:01:10', '', ''),
(248, 'gfdgfgfd', 'gfdgfgfd', 'writer_articles', 127, 1, 'Draft', '0000-00-00 00:00:00', '', ''),
(249, 'sdfdsfds', 'sdfdsfds', 'writer_articles', 128, 1, 'Draft', '0000-00-00 00:00:00', '', ''),
(250, 'gjgfjfj', 'gjgfjfj', 'writer_articles', 129, 1, 'Draft', '0000-00-00 00:00:00', '', ''),
(251, 'The Forces of Ecosystem Evolution', 'the+forces+of+ecosystem+evolution', 'writer_articles', 130, 1, 'Unpublished', '2025-12-16 16:17:41', '', ''),
(252, 'sdgfdgfdh', 'sdgfdgfdh', 'teacher_files', 36, 1, 'Unpublished', '2025-12-27 17:16:20', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `content_performance`
--

CREATE TABLE `content_performance` (
  `content_viewId` int(11) NOT NULL,
  `content_viewTimestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `content_viewTable` varchar(100) NOT NULL,
  `content_viewForeignId` int(11) NOT NULL,
  `content_viewUserId` int(11) NOT NULL,
  `content_viewTime` int(11) NOT NULL,
  `content_viewLastUpdate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `content_performance`
--

INSERT INTO `content_performance` (`content_viewId`, `content_viewTimestamp`, `content_viewTable`, `content_viewForeignId`, `content_viewUserId`, `content_viewTime`, `content_viewLastUpdate`) VALUES
(1, '2025-12-11 13:22:06', 'teacher_files', 31, 1, 171, '2025-12-18 12:18:56'),
(2, '2025-12-11 15:26:47', 'teacher_files', 28, 1, 228, '2025-12-22 00:40:45'),
(3, '2025-12-13 06:51:01', 'teacher_files', 30, 1, 72, '2025-12-14 14:48:13'),
(4, '2025-12-13 11:22:17', 'developer_tools', 23, 1, 7, '2025-12-13 11:22:22'),
(5, '2025-12-13 13:01:46', 'teacher_files', 33, 0, 228, '2025-12-13 13:21:49'),
(6, '2025-12-13 13:27:00', 'writer_articles', 100, 1, 0, '2025-12-13 13:27:00'),
(7, '2025-12-13 13:31:30', 'writer_articles', 117, 1, 221, '2025-12-16 05:56:36'),
(8, '2025-12-13 13:52:48', 'writer_articles', 118, 1, 224, '2025-12-23 07:51:38'),
(9, '2025-12-13 13:56:18', 'writer_articles', 119, 1, 1096, '2025-12-14 15:39:02'),
(10, '2025-12-13 14:15:46', 'teacher_files', 33, 1, 100, '2025-12-14 15:00:57'),
(11, '2025-12-13 14:32:56', 'writer_articles', 119, 0, 36, '2025-12-16 02:01:24'),
(12, '2025-12-14 08:22:12', 'writer_articles', 118, 0, 209, '2025-12-23 07:51:29'),
(13, '2025-12-14 08:28:29', 'writer_articles', 116, 18, 9, '2025-12-14 08:28:38'),
(14, '2025-12-14 08:33:34', 'writer_articles', 117, 0, 258, '2025-12-14 09:09:17'),
(15, '2025-12-14 09:06:37', 'writer_articles', 116, 0, 20, '2025-12-16 02:01:25'),
(16, '2025-12-14 09:18:08', 'writer_articles', 116, 1, 79, '2025-12-21 05:10:39'),
(17, '2025-12-14 09:22:17', 'writer_articles', 115, 1, 12, '2025-12-14 09:22:30'),
(18, '2025-12-14 11:07:17', 'writer_articles', 99, 1, 1, '2025-12-14 11:07:17'),
(19, '2025-12-15 15:29:13', 'teacher_files', 31, 0, 22, '2026-01-05 12:03:41'),
(20, '2025-12-16 08:17:46', 'writer_articles', 130, 0, 477, '2025-12-16 13:03:54'),
(21, '2025-12-16 09:50:53', 'writer_articles', 130, 1, 60, '2025-12-18 03:10:52'),
(22, '2025-12-18 03:10:56', 'developer_tools', 24, 1, 3, '2025-12-18 03:10:58'),
(23, '2025-12-23 07:31:49', 'teacher_files', 29, 1, 28, '2025-12-27 06:17:59'),
(24, '2025-12-23 15:12:15', 'teacher_files', 32, 1, 3, '2025-12-23 15:22:45'),
(25, '2025-12-25 08:26:34', 'teacher_files', 32, 9, 0, '2025-12-25 08:26:34'),
(26, '2025-12-27 02:05:15', 'teacher_files', 32, 0, 10, '2025-12-27 02:05:45'),
(27, '2025-12-27 08:00:02', 'teacher_files', 29, 9, 21, '2025-12-27 08:00:46'),
(28, '2025-12-27 09:14:57', 'teacher_files', 35, 1, 7, '2025-12-27 09:15:05'),
(29, '2025-12-27 11:26:11', 'teacher_files', 29, 0, 19, '2025-12-27 11:44:27'),
(30, '2025-12-29 13:34:58', 'teacher_files', 36, 1, 9, '2025-12-29 13:35:44'),
(31, '2026-01-04 06:59:05', 'teacher_files', 31, 18, 52, '2026-01-04 07:01:48');

-- --------------------------------------------------------

--
-- Table structure for table `developer_tools`
--

CREATE TABLE `developer_tools` (
  `developer_toolId` int(11) NOT NULL,
  `developer_toolTitle` longtext NOT NULL,
  `developer_toolCategory` varchar(64) NOT NULL,
  `developer_toolDescription` longtext NOT NULL,
  `developer_toolIcon` varchar(64) NOT NULL,
  `developer_toolOwner` varchar(64) NOT NULL,
  `developer_toolCreatedDate` datetime NOT NULL,
  `developer_toolPubDate` datetime NOT NULL,
  `developer_toolUpdateDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `developer_toolStatus` varchar(64) NOT NULL DEFAULT 'Draft',
  `developer_toolForReview` varchar(64) NOT NULL,
  `developer_toolLink` varchar(100) NOT NULL,
  `developer_toolDirectory` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `developer_tools`
--

INSERT INTO `developer_tools` (`developer_toolId`, `developer_toolTitle`, `developer_toolCategory`, `developer_toolDescription`, `developer_toolIcon`, `developer_toolOwner`, `developer_toolCreatedDate`, `developer_toolPubDate`, `developer_toolUpdateDate`, `developer_toolStatus`, `developer_toolForReview`, `developer_toolLink`, `developer_toolDirectory`) VALUES
(6, 'Erfel App', 'Mathematics', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', '', '1', '2025-11-07 21:17:07', '2025-11-07 21:17:27', '2025-12-06 06:39:46', 'Unpublished', '', '/public/tools/erfel-app/', ''),
(7, 'Erfel App 2', 'Science', 'ontrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.', '', '1', '2025-11-08 13:10:59', '2025-11-08 13:11:13', '2025-12-10 07:05:56', 'Unpublished', '', '/public/tools/erfel-app-2/', ''),
(9, 'Erfel App 4', 'Science', 'ontrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.', '/uploads/tool-icons/9-20251211225448.jpeg', '1', '2025-11-08 13:29:15', '2025-11-08 13:29:22', '2025-12-19 11:51:57', 'Unpublished', '', '/public/tools/erfel-app-4/', ''),
(10, 'Erfel App 5', 'Mathematics', 'ontrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of &quot;de Finibus Bonorum et Malorum&quot; (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, &quot;Lorem ipsum dolor sit amet..&quot;, comes from a line in section 1.10.32.', '', '1', '2025-11-08 13:29:39', '2025-11-08 13:29:46', '2025-11-13 11:55:33', 'Unpublished', '', '/public/tools/erfel-app-5/', ''),
(13, 'Erfel App 8', 'Language', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.', '', '1', '2025-11-08 13:31:02', '2025-11-08 13:31:25', '2025-12-06 06:39:30', 'Unpublished', '', '/public/tools/erfel-app-8/', ''),
(14, 'Erfel App 9', 'Arts', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.', '', '1', '2025-11-08 13:32:10', '2025-11-08 13:32:17', '2025-12-06 06:39:21', 'Unpublished', '', '/public/tools/erfel-app-9/', ''),
(15, 'Erfel App 10', 'Mathematics', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.', '', '1', '2025-11-08 13:32:48', '2025-11-08 13:32:56', '2025-11-12 05:30:55', 'Unpublished', '', '/public/tools/erfel-app-10/', ''),
(16, 'Erfel App 11', 'Language', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of &quot;de Finibus Bonorum et Malorum&quot; (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, &quot;Lorem ipsum dolor sit amet..&quot;, comes from a line in section 1.10.32.', '', '1', '2025-11-08 13:33:25', '2025-11-08 13:33:32', '2025-11-12 05:30:51', 'Unpublished', '', '/public/tools/erfel-app-11/', ''),
(17, 'Erfel App 56', 'Mathematics', 'ontrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of &quot;de Finibus Bonorum et Malorum&quot; (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, &quot;Lorem ipsum dolor sit amet..&quot;, comes from a line in section 1.10.32.', '', '1', '2025-11-18 12:23:48', '0000-00-00 00:00:00', '2025-11-18 04:23:48', 'Draft', '', '/public/tools/erfel-app-56/', ''),
(18, 'dgfhfh', 'Mathematics', 'hcghfggfj', '', '1', '2025-11-18 12:24:49', '0000-00-00 00:00:00', '2025-11-18 04:24:49', 'Draft', '', '/public/tools/dgfhfh/', ''),
(19, 'safsff', 'Mathematics', 'dddd', '', '1', '2025-12-10 10:10:15', '0000-00-00 00:00:00', '2025-12-10 02:10:15', 'Draft', '', '/public/tools/safsff/', ''),
(20, 'ggg', 'Mathematics', 'gggg', '', '1', '2025-12-10 10:12:11', '0000-00-00 00:00:00', '2025-12-10 02:12:11', 'Draft', '', '/public/tools/ggg/', ''),
(21, 'sff', 'Mathematics', 'gfdgfdg', '', '1', '2025-12-10 10:14:59', '0000-00-00 00:00:00', '2025-12-10 02:15:51', 'Draft', '', '/public/tools/sff/', ''),
(22, 'dsdgggg', 'Science', 'dfff', '', '1', '2025-12-10 10:18:59', '0000-00-00 00:00:00', '2025-12-10 02:18:59', 'Draft', '', '/public/tools/dsdgggg/', ''),
(24, 'SDGFDH', 'Mathematics', 'GFJGJHJHG', '/uploads/tool-icons/24-20251215214335.jpeg', '1', '2025-12-15 21:41:36', '2025-12-15 22:58:41', '2025-12-19 13:08:55', 'Unpublished', '', '/public/tools/sdgfdh/', '');

-- --------------------------------------------------------

--
-- Table structure for table `developer_tool_versions`
--

CREATE TABLE `developer_tool_versions` (
  `developer_toolVersionId` int(11) NOT NULL,
  `developer_toolVersionTimestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `developer_toolVersionForeignId` int(11) NOT NULL,
  `developer_toolVersionNumber` int(11) NOT NULL,
  `developer_toolVersionContent` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `developer_uploaded_files`
--

CREATE TABLE `developer_uploaded_files` (
  `developer_uploadedFileId` int(11) NOT NULL,
  `developer_uploadedFileTimestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `developer_uploadedFileFolderId` int(11) NOT NULL,
  `developer_uploadedFileLink` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `developer_uploaded_files`
--

INSERT INTO `developer_uploaded_files` (`developer_uploadedFileId`, `developer_uploadedFileTimestamp`, `developer_uploadedFileFolderId`, `developer_uploadedFileLink`) VALUES
(8, '2025-11-07 13:17:25', 6, '/public/tools/erfel-app/index.php'),
(9, '2025-11-08 05:11:11', 7, '/public/tools/erfel-app-2/index.php'),
(11, '2025-11-08 05:29:21', 9, '/public/tools/erfel-app-4/index.php'),
(12, '2025-11-08 05:29:45', 10, '/public/tools/erfel-app-5/index.php'),
(15, '2025-11-08 05:31:10', 13, '/public/tools/erfel-app-8/index.php'),
(17, '2025-11-08 05:32:54', 15, '/public/tools/erfel-app-10/index.php'),
(19, '2025-11-11 06:31:16', 16, '/public/tools/erfel-app-11/index.php'),
(28, '2025-12-15 14:27:26', 24, '/public/tools/sdgfdh/index.php');

-- --------------------------------------------------------

--
-- Table structure for table `editor_edits`
--

CREATE TABLE `editor_edits` (
  `editor_editId` int(11) NOT NULL,
  `editor_timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `editor_writerArticleId` varchar(64) NOT NULL,
  `editor_userId` varchar(64) NOT NULL,
  `editor_comment` longtext NOT NULL,
  `editor_updateDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `editor_lastEditor` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `editor_edits`
--

INSERT INTO `editor_edits` (`editor_editId`, `editor_timestamp`, `editor_writerArticleId`, `editor_userId`, `editor_comment`, `editor_updateDate`, `editor_lastEditor`) VALUES
(4, '2025-10-06 06:46:41', '2', '', '', '2025-10-06 06:46:41', ''),
(5, '2025-10-06 07:00:22', '2', '1', '', '2025-10-06 07:00:22', ''),
(6, '2025-10-06 07:07:24', '3', '', '', '2025-10-06 07:07:24', ''),
(7, '2025-10-06 07:21:12', '4', '', '', '2025-10-06 07:21:12', ''),
(8, '2025-10-06 07:52:14', '2', '', '', '2025-10-06 07:52:14', ''),
(9, '2025-10-06 08:06:08', '4', '', '', '2025-10-06 08:06:08', ''),
(10, '2025-10-06 10:09:08', '4', '', '', '2025-10-06 10:09:08', ''),
(11, '2025-10-06 10:29:06', '4', '', '', '2025-10-06 10:29:06', '');

-- --------------------------------------------------------

--
-- Table structure for table `editor_registrations`
--

CREATE TABLE `editor_registrations` (
  `editorId` int(11) NOT NULL,
  `editorTimestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `editorUserId` int(11) NOT NULL,
  `editorFullname` varchar(256) NOT NULL,
  `editorEmailAddress` varchar(64) NOT NULL,
  `editorCredentialType` varchar(64) NOT NULL,
  `editorCredentialNumber` varchar(64) NOT NULL,
  `editorCredentialExpiry` datetime NOT NULL,
  `editorCredentialFile` varchar(64) NOT NULL,
  `editorResume` varchar(64) NOT NULL,
  `editorEditingExperience` longtext NOT NULL,
  `editorProfileStatus` varchar(64) NOT NULL DEFAULT 'Pending',
  `editorProfileApprovalDate` datetime NOT NULL,
  `editorTotalEdits` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `file_purchase`
--

CREATE TABLE `file_purchase` (
  `file_purchaseId` int(11) NOT NULL,
  `file_purchaseTimestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `file_purchaseFileId` int(11) NOT NULL,
  `file_purchaseFileOwnerId` int(11) NOT NULL,
  `file_purchaseAmount` int(11) NOT NULL,
  `file_purchasePurchaserUserId` int(11) NOT NULL,
  `file_purchasePaymentChannel` varchar(64) NOT NULL,
  `file_purchaseReferenceNumber` varchar(64) NOT NULL,
  `file_purchaseStatus` varchar(64) NOT NULL,
  `file_purchaseProofLink` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `file_purchase`
--

INSERT INTO `file_purchase` (`file_purchaseId`, `file_purchaseTimestamp`, `file_purchaseFileId`, `file_purchaseFileOwnerId`, `file_purchaseAmount`, `file_purchasePurchaserUserId`, `file_purchasePaymentChannel`, `file_purchaseReferenceNumber`, `file_purchaseStatus`, `file_purchaseProofLink`) VALUES
(1, '2025-12-07 06:18:06', 28, 18, 10, 1, 'GCASH', 'vsdsdgdsfsdg', 'Approved', '/uploads/file-purchase/proof/userid-1-20251207141806.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `funder_registrations`
--

CREATE TABLE `funder_registrations` (
  `funderId` int(11) NOT NULL,
  `funderTimestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `funderUserId` int(11) NOT NULL,
  `funderFullname` varchar(256) NOT NULL,
  `funderEmailAddress` varchar(64) NOT NULL,
  `funderBankName` varchar(100) NOT NULL,
  `funderBankAccountName` varchar(256) NOT NULL,
  `funderBankAccountNumber` varchar(64) NOT NULL,
  `funderReasons` longtext NOT NULL,
  `funderPaymentProof` varchar(64) NOT NULL,
  `funderProfileStatus` varchar(64) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `institution_studies`
--

CREATE TABLE `institution_studies` (
  `institution_studyId` int(11) NOT NULL,
  `institution_studyInstitutionAccountName` varchar(64) NOT NULL,
  `institution_studyUploader` varchar(64) NOT NULL,
  `institution_studyAuthors` varchar(250) NOT NULL,
  `institution_studyAbstract` longtext NOT NULL,
  `institution_studyUploaded` timestamp NOT NULL DEFAULT current_timestamp(),
  `institution_studyUpdated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `institution_studyFileLink` varchar(64) NOT NULL,
  `institution_studyStatus` varchar(64) NOT NULL DEFAULT 'Draft'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `messageId` int(11) NOT NULL,
  `messageSenderUserId` int(11) NOT NULL,
  `messageReceiverUserId` int(11) NOT NULL,
  `messageContent` longtext NOT NULL,
  `messageTimestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
  `noteId` int(11) NOT NULL,
  `noteContent` longtext NOT NULL,
  `noteForUserId` int(11) NOT NULL,
  `noteForRole` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `other_registrations`
--

CREATE TABLE `other_registrations` (
  `otherId` int(11) NOT NULL,
  `otherTimestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `otherType` varchar(64) DEFAULT NULL,
  `otherUserId` int(11) NOT NULL,
  `otherResume` varchar(150) NOT NULL,
  `otherLicenseCertification` varchar(150) NOT NULL,
  `otherSample` varchar(150) NOT NULL,
  `otherAgreement` varchar(150) NOT NULL,
  `otherNotes` longtext NOT NULL,
  `otherStatus` varchar(64) NOT NULL DEFAULT 'Pending',
  `otherApprovalDate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `other_registrations`
--

INSERT INTO `other_registrations` (`otherId`, `otherTimestamp`, `otherType`, `otherUserId`, `otherResume`, `otherLicenseCertification`, `otherSample`, `otherAgreement`, `otherNotes`, `otherStatus`, `otherApprovalDate`) VALUES
(1, '2025-12-06 02:29:31', 'Teacher', 18, '', '/uploads/registration/teacher/license-certification/Erfel  Printing-20251206102931.pdf', '', '/uploads/registration/teacher/agreement/Erfel  Printing-20251206102931.pdf', 'fdsgdsgsgsggg', 'Kept', '2026-01-07 10:14:30'),
(2, '2025-12-07 01:11:16', 'Writer', 18, '', '', 'https://facebook.com', '/uploads/registration/writer/agreement/Erfel  Printing-20251207091116.pdf', 'dsgffdh', 'Revoked', '2026-01-06 22:08:30'),
(7, '2026-01-04 05:19:15', 'Developer', 18, '', '', 'https://facebook.com', '/uploads/registration/developer/agreement/Erfel--Printing-20260104131915.pdf', '', 'Pending', NULL),
(12, '2026-01-06 05:32:30', 'Teacher', 1, '', '/uploads/registration/teacher/license-certification/Erfel-Contiga-Suriaga-20260106133230.pdf', '', '/uploads/registration/teacher/agreement/Erfel-Contiga-Suriaga-20260106133230.pdf', '', 'Kept', '2026-01-07 10:14:29'),
(13, '2026-01-06 05:35:43', 'Writer', 1, '', '', 'sdfdsgdsg', '/uploads/registration/writer/agreement/Erfel-Contiga-Suriaga-20260106133543.pdf', 'cff', 'Rejected', '2026-01-06 20:48:26'),
(14, '2026-01-06 05:36:14', 'Researches', 9, '', '', '', '/uploads/registration/researches/agreement/Example-High-School-20260106133614.pdf', '', 'Pending', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `payment_options`
--

CREATE TABLE `payment_options` (
  `payment_optionId` int(11) NOT NULL,
  `payment_optionName` varchar(64) NOT NULL,
  `payment_optionAccountHolder` varchar(100) NOT NULL,
  `payment_optionAccountNumber` varchar(64) NOT NULL,
  `payment_optionLogo` varchar(64) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment_options`
--

INSERT INTO `payment_options` (`payment_optionId`, `payment_optionName`, `payment_optionAccountHolder`, `payment_optionAccountNumber`, `payment_optionLogo`) VALUES
(1, 'GCash', 'Erfel C. Suriaga', '09942762632', NULL),
(2, 'GCash', 'Erfel C. Suriaga', '09942762632', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `promotions`
--

CREATE TABLE `promotions` (
  `promotionId` int(11) NOT NULL,
  `promotionTimestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `promotionNameCompany` longtext NOT NULL,
  `promotionTitle` longtext NOT NULL,
  `promotionTopics` longtext NOT NULL,
  `promotionDescription` longtext NOT NULL,
  `promotionType` varchar(64) NOT NULL,
  `promotionImage` longtext NOT NULL,
  `promotionLink` longtext NOT NULL,
  `promotionDuration` varchar(64) NOT NULL,
  `promotionAmount` int(11) NOT NULL,
  `promotionAgreement` longtext NOT NULL,
  `promotionDate` datetime NOT NULL,
  `promotionExpiry` datetime NOT NULL,
  `promotionStatus` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `promotions`
--

INSERT INTO `promotions` (`promotionId`, `promotionTimestamp`, `promotionNameCompany`, `promotionTitle`, `promotionTopics`, `promotionDescription`, `promotionType`, `promotionImage`, `promotionLink`, `promotionDuration`, `promotionAmount`, `promotionAgreement`, `promotionDate`, `promotionExpiry`, `promotionStatus`) VALUES
(1, '2025-12-04 11:21:16', 'Erfel Suriaga', 'Promoting the EskQuip Web App', 'education', 'This web app is awesome.', 'Products', '/uploads/promotion/image/erfel_suriaga-20251204192116.jpeg', 'https://shopee.ph/erfiaga', '4', 50, '/uploads/promotion/agreement/erfel_suriaga-20251204192116.pdf', '2025-12-04 20:47:49', '2025-12-08 20:47:49', 'Unpublished'),
(2, '2025-12-04 13:11:59', 'Erfel Suriaga', 'Promoting the EskQuip App', 'Education', 'sdfdssgdsg', 'Products', '/uploads/promotion/image/erfel_suriaga-20251204211159.jpeg', 'https://facebook.com', '5', 6, '/uploads/promotion/agreement/erfel_suriaga-20251204211159.pdf', '2025-12-04 21:12:02', '2025-12-09 21:12:02', 'Published'),
(3, '2025-12-04 13:22:30', 'Erfelddgfdg', 'fhdh', 'fgdfggfgfg', 'ghghhdfh', 'Services', '/uploads/promotion/image/erfelddgfdg-20251204212230.jpeg', 'https://youtube.com', '6', 7, '/uploads/promotion/agreement/erfelddgfdg-20251204212230.pdf', '2025-12-04 21:22:33', '2025-12-10 21:22:33', 'Unpublished'),
(4, '2025-12-04 14:08:33', 'sdg', 'fgfg', 'fdhfgh', 'gfjgfjgfj', 'Products', '/uploads/promotion/image/sdg-20251204220833.jpeg', 'dgdg', '56', 7, '/uploads/promotion/agreement/sdg-20251204220833.pdf', '2025-12-04 22:08:35', '2026-01-29 22:08:35', 'Published'),
(5, '2025-12-04 14:09:06', 'dgfdg', 'dhfgghfh', 'gfdg', 'fgfdhfdh', 'Products', '/uploads/promotion/image/dgfdg-20251204220906.jpeg', 'fdgfdg', '67', 67, '/uploads/promotion/agreement/dgfdg-20251204220906.pdf', '2025-12-04 22:09:08', '2026-02-09 22:09:08', 'Unpublished'),
(6, '2026-01-07 13:31:55', 'Erfel Suriaga', 'Promoting the EskQuip Web App', 'education', 'This web app is awesome.', 'Products', '/uploads/promotion/image/erfel_suriaga-20260107213155.', 'https://shopee.ph/erfiaga', '4', 50, '/uploads/promotion/agreement/erfel_suriaga-20260107213155.', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Draft'),
(7, '2026-01-07 13:54:52', 'Erfelddgfdg', 'fhdh', 'fgdfggfgfg', 'ghghhdfh', 'Services', '/uploads/promotion/image/erfelddgfdg-20260107215452.', 'https://youtube.com', '6', 7, '/uploads/promotion/agreement/erfelddgfdg-20260107215452.', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Draft'),
(8, '2026-01-07 13:54:53', 'Erfelddgfdg', 'fhdh', 'fgdfggfgfg', 'ghghhdfh', 'Services', '/uploads/promotion/image/erfelddgfdg-20260107215453.', 'https://youtube.com', '6', 7, '/uploads/promotion/agreement/erfelddgfdg-20260107215453.', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Draft'),
(9, '2026-01-07 14:10:22', 'dgfdg', 'dhfgghfh', 'gfdg', 'fgfdhfdh', 'Products', '/eskquip/private/uploads/promotion/image/dgfdg-20251204220906.jpeg', 'fdgfdg', '67', 67, '/eskquip/private/uploads/promotion/agreement/dgfdg-20251204220906.pdf', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Draft'),
(10, '2026-01-07 14:10:26', 'dgfdg', 'dhfgghfh', 'gfdg', 'fgfdhfdh', 'Products', '/eskquip/private/uploads/promotion/image/dgfdg-20251204220906.jpeg', 'fdgfdg', '67', 67, '/eskquip/private/uploads/promotion/agreement/dgfdg-20251204220906.pdf', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Draft'),
(11, '2026-01-07 14:11:05', 'Erfelddgfdg', 'fhdh', 'fgdfggfgfg', 'ghghhdfh', 'Services', '/eskquip/private/uploads/promotion/image/erfelddgfdg-20260107215452.', 'https://youtube.com', '6', 7, '/eskquip/private/uploads/promotion/agreement/erfelddgfdg-20260107215452.', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Draft'),
(12, '2026-01-07 14:14:23', 'dgfdg', 'dhfgghfh', 'gfdg', 'fgfdhfdh', 'Products', '/uploads/promotion/image/dgfdg-20260107221423.jpeg', 'fdgfdg', '67', 67, '/eskquip/private/eskquip/private/uploads/promotion/agreement/dgfdg-20251204220906.pdf', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Draft'),
(13, '2026-01-07 14:16:17', 'dgfdg', 'dhfgghfh', 'gfdg', 'fgfdhfdh', 'Products', '/uploads/promotion/image/dgfdg-20260107221617.jpeg', 'fdgfdg', '67', 67, '/eskquip/private/eskquip/private/uploads/promotion/agreement/dgfdg-20251204220906.pdf', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Draft'),
(14, '2026-01-07 14:17:08', 'dgfdg', 'dhfgghfh', 'gfdg', 'fgfdhfdh', 'Products', '/uploads/promotion/image/dgfdg-20260107221708.jpeg', 'fdgfdg', '67', 67, '/eskquip/private/eskquip/private/uploads/promotion/agreement/dgfdg-20251204220906.pdf', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Draft'),
(15, '2026-01-07 14:20:38', 'dgfdg', 'dhfgghfh', 'gfdg', 'fgfdhfdh', 'Products', '/uploads/promotion/image/dgfdg-20260107222038.jpeg', 'fdgfdg', '67', 67, '/eskquip/private/eskquip/private/uploads/promotion/agreement/dgfdg-20251204220906.pdf', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Draft'),
(16, '2026-01-07 14:29:58', 'dgfdg', 'dhfgghfh', 'gfdg', 'fgfdhfdh', 'Products', '/uploads/promotion/image/dgfdg-20260107222958.jpeg', 'fdgfdg', '67', 67, '/eskquip/private/eskquip/private/eskquip/private/uploads/promotion/agreement/dgfdg-20251204220906.pdf', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Draft'),
(17, '2026-01-07 14:30:45', 'dgfdg', 'dhfgghfh', 'gfdg', 'fgfdhfdh', 'Products', '/uploads/promotion/image/dgfdg-20260107223045.jpeg', 'fdgfdg', '67', 67, '/eskquip/private/eskquip/private/eskquip/private/eskquip/private/uploads/promotion/agreement/dgfdg-20251204220906.pdf', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Draft'),
(18, '2026-01-07 14:31:13', 'dgfdg', 'dhfgghfh', 'gfdg', 'fgfdhfdh', 'Services', '/eskquip/private/uploads/promotion/image/dgfdg-20260107223045.jpeg', 'fdgfdg', '67', 67, '/eskquip/private/eskquip/private/eskquip/private/eskquip/private/eskquip/private/uploads/promotion/agreement/dgfdg-20251204220906.pdf', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Draft'),
(19, '2026-01-07 14:31:21', 'Erfel', 'dhfgghfh', 'gfdg', 'fgfdhfdh', 'Services', '/eskquip/private/eskquip/private/uploads/promotion/image/dgfdg-20260107223045.jpeg', 'fdgfdg', '67', 67, '/eskquip/private/eskquip/private/eskquip/private/eskquip/private/eskquip/private/eskquip/private/uploads/promotion/agreement/dgfdg-20251204220906.pdf', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Draft'),
(20, '2026-01-07 14:33:34', 'new', 'gfhgfh', 'gfhgfh', 'ghgfhg', 'Products', '/uploads/promotion/image/new-20260107223334.jpeg', 'fgffdhfdhfdhfdhhhh', '1', 56, '/uploads/promotion/agreement/new-20260107223334.jpeg', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Draft'),
(21, '2026-01-07 14:33:57', 'new', 'gfhgfh', 'gfhgfh', 'ghgfhg', 'Products', '/eskquip/private/uploads/promotion/image/new-20260107223334.jpeg', 'fgffdhfdhfdhfdhhhh', '2', 56, '/eskquip/private/uploads/promotion/agreement/new-20260107223334.jpeg', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Draft');

-- --------------------------------------------------------

--
-- Table structure for table `registrant_activities`
--

CREATE TABLE `registrant_activities` (
  `registrant_activityId` int(11) NOT NULL,
  `registrant_activityTimestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `registrant_activityUserId` int(11) NOT NULL,
  `registrant_activityContent` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registrant_activities`
--

INSERT INTO `registrant_activities` (`registrant_activityId`, `registrant_activityTimestamp`, `registrant_activityUserId`, `registrant_activityContent`) VALUES
(1, '2025-10-29 12:53:32', 1, 'Logged in'),
(2, '2025-10-29 12:59:22', 1, 'Logged out'),
(3, '2025-10-29 12:59:49', 1, 'Logged in'),
(4, '2025-10-29 12:59:56', 1, 'Logged out'),
(5, '2025-10-29 13:12:21', 1, 'Logged in'),
(6, '2025-10-29 13:13:48', 1, 'Logged out'),
(7, '2025-10-29 13:13:51', 1, 'Logged in'),
(8, '2025-10-29 13:16:44', 1, 'Logged out'),
(9, '2025-10-29 13:16:47', 1, 'Logged in'),
(10, '2025-10-30 03:52:16', 1, 'Logged out'),
(11, '2025-10-30 03:54:35', 16, 'Logged in'),
(12, '2025-10-30 03:56:21', 16, 'Logged out'),
(13, '2025-10-30 03:56:31', 1, 'Logged in'),
(14, '2025-10-30 04:33:24', 1, 'Logged out'),
(15, '2025-10-30 04:59:35', 1, 'Logged in'),
(16, '2025-10-30 05:04:31', 9, 'Logged in'),
(17, '2025-10-30 05:48:31', 9, 'Logged out'),
(18, '2025-10-30 05:48:37', 16, 'Logged in'),
(19, '2025-10-30 14:36:20', 16, 'Logged out'),
(20, '2025-10-30 14:36:36', 9, 'Logged out'),
(21, '2025-10-31 04:25:52', 1, 'Logged out'),
(22, '2025-10-31 04:30:21', 1, 'Logged in'),
(23, '2025-10-31 06:27:43', 1, 'Logged out'),
(24, '2025-10-31 07:15:08', 1, 'Logged in'),
(25, '2025-11-02 02:15:42', 1, 'Logged out'),
(26, '2025-11-02 05:08:55', 1, 'Logged in'),
(27, '2025-11-06 10:00:30', 1, 'Logged out'),
(28, '2025-11-06 10:02:47', 1, 'Logged in'),
(29, '2025-11-06 12:21:24', 1, 'Logged out'),
(30, '2025-11-06 12:26:40', 9, 'Logged in'),
(31, '2025-11-06 12:30:35', 9, 'Logged out'),
(32, '2025-11-06 12:31:29', 9, 'Logged in'),
(33, '2025-11-06 12:33:17', 1, 'Logged out'),
(34, '2025-11-06 13:01:38', 9, 'Logged out'),
(35, '2025-11-06 13:01:45', 9, 'Logged in'),
(36, '2025-11-06 13:08:37', 9, 'Logged out'),
(37, '2025-11-06 14:47:17', 9, 'Logged in'),
(38, '2025-11-06 14:47:24', 9, 'Logged out'),
(39, '2025-11-07 04:52:54', 1, 'Logged in'),
(40, '2025-11-07 05:06:01', 9, 'Logged in'),
(41, '2025-11-07 05:22:37', 1, 'Logged out'),
(42, '2025-11-07 05:31:24', 1, 'Logged in'),
(43, '2025-11-07 05:42:20', 9, 'Logged out'),
(44, '2025-11-07 05:53:35', 1, 'Logged out'),
(45, '2025-11-07 05:55:02', 15, 'Logged in'),
(46, '2025-11-07 08:28:16', 15, 'Logged out'),
(47, '2025-11-07 08:28:51', 1, 'Logged in'),
(48, '2025-11-07 08:30:13', 1, 'Logged out'),
(49, '2025-11-07 08:30:29', 15, 'Logged in'),
(50, '2025-11-07 08:40:18', 15, 'Logged out'),
(51, '2025-11-07 08:40:25', 1, 'Logged in'),
(52, '2025-11-07 08:42:38', 1, 'Logged out'),
(53, '2025-11-07 08:42:47', 15, 'Logged in'),
(54, '2025-11-07 11:24:35', 1, 'Logged in'),
(55, '2025-11-07 12:07:02', 1, 'Logged out'),
(56, '2025-11-07 12:07:09', 9, 'Logged out'),
(57, '2025-11-07 12:58:49', 15, 'Logged out'),
(58, '2025-11-07 12:59:00', 1, 'Logged in'),
(59, '2025-11-08 05:54:42', 9, 'Logged out'),
(60, '2025-11-08 11:10:00', 9, 'Logged in'),
(61, '2025-11-08 11:25:41', 9, 'Logged out'),
(62, '2025-11-08 11:26:33', 1, 'Logged out'),
(63, '2025-11-08 11:26:36', 1, 'Logged in'),
(64, '2025-11-08 11:33:20', 1, 'Logged out'),
(65, '2025-11-08 11:33:29', 1, 'Logged in'),
(66, '2025-11-08 11:33:51', 0, 'Logged out'),
(67, '2025-11-08 11:48:01', 1, 'Logged out'),
(68, '2025-11-08 11:49:03', 1, 'Logged in'),
(69, '2025-11-08 11:49:21', 1, 'Logged out'),
(70, '2025-11-08 11:49:32', 1, 'Logged in'),
(71, '2025-11-08 11:58:18', 1, 'Logged out'),
(72, '2025-11-08 11:58:39', 1, 'Logged in'),
(73, '2025-11-08 11:59:10', 1, 'Logged out'),
(74, '2025-11-08 11:59:46', 1, 'Logged in'),
(75, '2025-11-08 12:00:25', 1, 'Logged out'),
(76, '2025-11-08 12:00:35', 1, 'Logged in'),
(77, '2025-11-08 12:01:16', 1, 'Logged out'),
(78, '2025-11-08 12:04:47', 1, 'Logged in'),
(79, '2025-11-08 12:05:18', 1, 'Logged out'),
(80, '2025-11-08 12:06:53', 1, 'Logged in'),
(81, '2025-11-08 12:07:29', 1, 'Logged out'),
(82, '2025-11-08 12:09:51', 1, 'Logged in'),
(83, '2025-11-08 12:10:24', 1, 'Logged out'),
(84, '2025-11-08 12:10:47', 1, 'Logged in'),
(85, '2025-11-08 14:25:40', 9, 'Logged in'),
(86, '2025-11-08 14:26:16', 9, 'Logged out'),
(87, '2025-11-09 06:29:04', 9, 'Logged in'),
(88, '2025-11-10 05:56:41', 1, 'Logged out'),
(89, '2025-11-10 05:56:53', 15, 'Logged in'),
(90, '2025-11-10 06:01:56', 9, 'Logged out'),
(91, '2025-11-10 06:01:59', 9, 'Logged in'),
(92, '2025-11-10 06:04:37', 9, 'Logged out'),
(93, '2025-11-10 06:17:32', 9, 'Logged in'),
(94, '2025-11-10 06:29:39', 1, 'Logged in'),
(95, '2025-11-11 05:32:25', 1, 'Logged out'),
(96, '2025-11-11 05:32:29', 1, 'Logged in'),
(97, '2025-11-11 06:19:41', 9, 'Logged out'),
(98, '2025-11-11 06:19:45', 9, 'Logged in'),
(99, '2025-11-11 06:21:00', 1, 'Logged out'),
(100, '2025-11-11 06:21:11', 1, 'Logged in'),
(101, '2025-11-11 06:32:13', 9, 'Logged out'),
(102, '2025-11-11 06:33:06', 15, 'Logged out'),
(103, '2025-11-11 06:33:11', 15, 'Logged in'),
(104, '2025-11-11 06:35:01', 1, 'Logged out'),
(105, '2025-11-11 06:35:07', 1, 'Logged in'),
(106, '2025-11-11 06:40:00', 15, 'Logged out'),
(107, '2025-11-11 06:40:09', 9, 'Logged in'),
(108, '2025-11-11 06:45:17', 1, 'Logged out'),
(109, '2025-11-11 07:21:27', 0, 'Logged out'),
(110, '2025-11-11 07:55:12', 17, 'Logged in'),
(111, '2025-11-11 07:58:04', 17, 'Logged out'),
(112, '2025-11-11 07:58:12', 17, 'Logged in'),
(113, '2025-11-11 07:58:26', 17, 'Logged out'),
(114, '2025-11-11 08:13:47', 17, 'Logged in'),
(115, '2025-11-11 08:14:08', 17, 'Logged out'),
(116, '2025-11-11 08:14:20', 17, 'Logged in'),
(117, '2025-11-11 08:16:01', 17, 'Logged out'),
(118, '2025-11-11 08:16:34', 17, 'Logged in'),
(119, '2025-11-11 08:19:06', 17, 'Logged out'),
(120, '2025-11-11 08:19:13', 17, 'Logged in'),
(121, '2025-11-11 08:20:11', 17, 'Logged out'),
(122, '2025-11-11 08:22:31', 17, 'Logged in'),
(123, '2025-11-11 08:23:44', 17, 'Logged out'),
(124, '2025-11-11 08:23:56', 17, 'Logged in'),
(125, '2025-11-11 08:24:04', 17, 'Logged out'),
(126, '2025-11-11 08:31:38', 17, 'Logged in'),
(127, '2025-11-11 08:31:39', 17, 'Logged out'),
(128, '2025-11-11 08:33:10', 17, 'Logged in'),
(129, '2025-11-11 08:33:12', 17, 'Logged out'),
(130, '2025-11-11 08:36:21', 17, 'Logged in'),
(131, '2025-11-11 08:36:35', 17, 'Logged out'),
(132, '2025-11-11 08:37:39', 18, 'Logged in'),
(133, '2025-11-11 08:37:47', 18, 'Logged out'),
(134, '2025-11-11 12:46:31', 1, 'Logged in'),
(135, '2025-11-12 01:46:10', 1, 'Logged out'),
(136, '2025-11-12 02:03:08', 18, 'Logged in'),
(137, '2025-11-12 02:09:16', 18, 'Logged out'),
(138, '2025-11-12 02:09:22', 1, 'Logged in'),
(139, '2025-11-12 03:00:19', 1, 'Logged out'),
(140, '2025-11-12 03:00:29', 18, 'Logged in'),
(141, '2025-11-12 03:45:13', 18, 'Logged out'),
(142, '2025-11-12 03:45:19', 1, 'Logged in'),
(143, '2025-11-12 05:08:48', 1, 'Logged out'),
(144, '2025-11-12 05:08:56', 1, 'Logged in'),
(145, '2025-11-12 05:09:17', 1, 'Logged out'),
(146, '2025-11-12 05:09:27', 18, 'Logged in'),
(147, '2025-11-12 05:11:04', 18, 'Logged out'),
(148, '2025-11-12 05:11:10', 1, 'Logged in'),
(149, '2025-11-12 05:11:27', 1, 'Logged out'),
(150, '2025-11-12 05:11:33', 18, 'Logged in'),
(151, '2025-11-12 05:24:51', 18, 'Logged out'),
(152, '2025-11-12 05:25:04', 1, 'Logged in'),
(153, '2025-11-12 05:46:48', 1, 'Logged out'),
(154, '2025-11-12 05:47:04', 1, 'Logged in'),
(155, '2025-11-12 05:48:52', 18, 'Logged in'),
(156, '2025-11-12 06:37:35', 18, 'Logged out'),
(157, '2025-11-12 06:48:08', 18, 'Logged in'),
(158, '2025-11-12 06:54:28', 18, 'Logged out'),
(159, '2025-11-12 06:56:36', 18, 'Logged in'),
(160, '2025-11-12 12:32:19', 1, 'Logged out'),
(161, '2025-11-12 12:34:11', 1, 'Logged in'),
(162, '2025-11-13 01:55:38', 18, 'Logged out'),
(163, '2025-11-13 02:31:31', 1, 'Logged out'),
(164, '2025-11-13 02:31:46', 1, 'Logged in'),
(165, '2025-11-13 03:02:54', 18, 'Logged in'),
(166, '2025-11-13 05:04:42', 18, 'Logged out'),
(167, '2025-11-13 05:07:07', 1, 'Logged out'),
(168, '2025-11-13 05:08:05', 1, 'Logged in'),
(169, '2025-11-13 05:14:47', 0, 'Logged out'),
(170, '2025-11-13 05:16:06', 1, 'Logged out'),
(171, '2025-11-13 05:17:05', 1, 'Logged out'),
(172, '2025-11-13 05:17:13', 1, 'Logged in'),
(173, '2025-11-13 05:17:22', 0, 'Logged out'),
(174, '2025-11-13 05:19:11', 1, 'Logged out'),
(175, '2025-11-13 05:19:30', 1, 'Logged out'),
(176, '2025-11-13 05:19:37', 1, 'Logged in'),
(177, '2025-11-13 05:22:16', 0, 'Logged out'),
(178, '2025-11-13 05:22:38', 1, 'Logged out'),
(179, '2025-11-13 05:22:49', 1, 'Logged in'),
(180, '2025-11-13 05:22:58', 0, 'Logged out'),
(181, '2025-11-13 05:23:11', 1, 'Logged out'),
(182, '2025-11-13 05:23:25', 1, 'Logged in'),
(183, '2025-11-13 05:24:24', 0, 'Logged out'),
(184, '2025-11-13 05:26:56', 1, 'Logged out'),
(185, '2025-11-13 05:27:02', 1, 'Logged in'),
(186, '2025-11-13 05:27:35', 0, 'Logged out'),
(187, '2025-11-13 05:29:37', 1, 'Logged out'),
(188, '2025-11-13 05:29:45', 1, 'Logged in'),
(189, '2025-11-13 05:29:53', 1, 'Logged out'),
(190, '2025-11-13 05:30:05', 0, 'Logged out'),
(191, '2025-11-13 05:30:56', 1, 'Logged out'),
(192, '2025-11-13 05:31:03', 1, 'Logged in'),
(193, '2025-11-13 05:31:10', 1, 'Logged out'),
(194, '2025-11-13 05:31:33', 1, 'Logged in'),
(195, '2025-11-13 05:32:30', 1, 'Logged out'),
(196, '2025-11-13 05:34:21', 1, 'Logged in'),
(197, '2025-11-13 05:34:51', 1, 'Logged out'),
(198, '2025-11-13 05:36:52', 1, 'Logged in'),
(199, '2025-11-13 05:37:00', 1, 'Logged out'),
(200, '2025-11-13 05:39:35', 1, 'Logged in'),
(201, '2025-11-13 05:39:42', 1, 'Logged out'),
(202, '2025-11-13 05:42:04', 1, 'Logged in'),
(203, '2025-11-13 05:42:12', 1, 'Logged out'),
(204, '2025-11-13 05:42:22', 1, 'Logged in'),
(205, '2025-11-13 05:42:32', 1, 'Logged out'),
(206, '2025-11-13 05:52:17', 1, 'Logged in'),
(207, '2025-11-13 05:53:59', 1, 'Logged out'),
(208, '2025-11-13 05:57:03', 18, 'Logged in'),
(209, '2025-11-13 06:00:10', 1, 'Logged in'),
(210, '2025-11-13 06:00:56', 1, 'Logged out'),
(211, '2025-11-13 06:33:36', 18, 'Logged out'),
(212, '2025-11-13 09:07:01', 1, 'Logged in'),
(213, '2025-11-13 09:25:11', 1, 'Logged out'),
(214, '2025-11-13 09:43:21', 1, 'Logged in'),
(215, '2025-11-13 10:25:10', 18, 'Logged in'),
(216, '2025-11-13 11:05:49', 18, 'Logged out'),
(217, '2025-11-13 11:11:27', 18, 'Logged in'),
(218, '2025-11-13 11:13:54', 18, 'Logged out'),
(219, '2025-11-13 11:14:05', 18, 'Logged in'),
(220, '2025-11-13 11:17:25', 18, 'Logged out'),
(221, '2025-11-13 11:17:30', 1, 'Logged out'),
(222, '2025-11-13 11:19:11', 9, 'Logged out'),
(223, '2025-11-13 11:19:19', 9, 'Logged in'),
(224, '2025-11-13 11:21:11', 1, 'Logged in'),
(225, '2025-11-13 11:23:07', 1, 'Logged out'),
(226, '2025-11-13 11:25:05', 18, 'Logged in'),
(227, '2025-11-13 11:25:22', 18, 'Logged out'),
(228, '2025-11-13 11:25:30', 1, 'Logged in'),
(229, '2025-11-13 11:29:19', 1, 'Logged out'),
(230, '2025-11-13 11:29:39', 18, 'Logged in'),
(231, '2025-11-13 11:46:23', 9, 'Logged out'),
(232, '2025-11-13 11:46:38', 1, 'Logged in'),
(233, '2025-11-13 13:07:33', 18, 'Logged out'),
(234, '2025-11-13 13:07:45', 9, 'Logged in'),
(235, '2025-11-14 03:39:46', 1, 'Logged out'),
(236, '2025-11-14 03:40:14', 9, 'Logged out'),
(237, '2025-11-14 03:40:18', 9, 'Logged in'),
(238, '2025-11-14 03:40:27', 9, 'Logged out'),
(239, '2025-11-14 04:55:41', 9, 'Logged in'),
(240, '2025-11-14 05:36:05', 1, 'Logged in'),
(241, '2025-11-14 08:03:45', 1, 'Logged out'),
(242, '2025-11-14 09:22:32', 1, 'Logged in'),
(243, '2025-11-14 09:22:45', 9, 'Logged out'),
(244, '2025-11-14 09:27:54', 18, 'Logged in'),
(245, '2025-11-14 13:05:35', 1, 'Logged out'),
(246, '2025-11-15 03:31:23', 1, 'Logged in'),
(247, '2025-11-15 03:31:36', 1, 'Logged out'),
(248, '2025-11-15 05:41:12', 1, 'Logged in'),
(249, '2025-11-15 07:31:20', 1, 'Logged out'),
(250, '2025-11-15 07:32:52', 1, 'Logged in'),
(251, '2025-11-15 07:33:18', 1, 'Logged out'),
(252, '2025-11-15 07:43:37', 1, 'Logged in'),
(253, '2025-11-15 08:21:04', 18, 'Logged out'),
(254, '2025-11-15 08:21:24', 18, 'Logged in'),
(255, '2025-11-15 10:55:38', 18, 'Logged out'),
(256, '2025-11-15 10:55:42', 18, 'Logged in'),
(257, '2025-11-15 11:59:54', 18, 'Logged out'),
(258, '2025-11-15 11:59:57', 18, 'Logged in'),
(259, '2025-11-15 12:02:16', 18, 'Logged out'),
(260, '2025-11-15 12:22:01', 18, 'Logged in'),
(261, '2025-11-15 12:23:18', 18, 'Logged out'),
(262, '2025-11-15 12:25:18', 1, 'Logged out'),
(263, '2025-11-15 12:25:25', 1, 'Logged in'),
(264, '2025-11-15 14:08:46', 18, 'Logged in'),
(265, '2025-11-15 14:12:06', 18, 'Logged out'),
(266, '2025-11-15 14:12:15', 9, 'Logged in'),
(267, '2025-11-15 14:44:53', 9, 'Logged out'),
(268, '2025-11-16 00:30:15', 1, 'Logged out'),
(269, '2025-11-16 00:38:46', 1, 'Logged in'),
(270, '2025-11-16 08:34:56', 18, 'Logged in'),
(271, '2025-11-16 15:51:25', 1, 'Logged out'),
(272, '2025-11-17 01:37:29', 1, 'Logged in'),
(273, '2025-11-17 10:33:43', 1, 'Logged out'),
(274, '2025-11-17 10:35:32', 1, 'Logged in'),
(275, '2025-11-17 10:35:38', 1, 'Logged out'),
(276, '2025-11-17 10:36:39', 18, 'Logged out'),
(277, '2025-11-17 10:36:48', 18, 'Logged in'),
(278, '2025-11-17 10:38:33', 1, 'Logged in'),
(279, '2025-11-17 10:38:40', 1, 'Logged out'),
(280, '2025-11-17 10:53:25', 18, 'Logged out'),
(281, '2025-11-17 12:14:40', 1, 'Logged in'),
(282, '2025-11-17 13:19:00', 1, 'Logged out'),
(283, '2025-11-17 13:23:11', 1, 'Logged in'),
(284, '2025-11-17 15:21:48', 1, 'Logged out'),
(285, '2025-11-17 23:56:55', 1, 'Logged in'),
(286, '2025-11-17 23:57:03', 1, 'Logged out'),
(287, '2025-11-18 00:04:38', 1, 'Logged in'),
(288, '2025-11-18 00:09:23', 1, 'Logged out'),
(289, '2025-11-18 00:09:32', 18, 'Logged in'),
(290, '2025-11-18 00:09:51', 18, 'Logged out'),
(291, '2025-11-18 00:10:02', 1, 'Logged in'),
(292, '2025-11-18 02:59:16', 1, 'Logged out'),
(293, '2025-11-18 03:00:03', 1, 'Logged in'),
(294, '2025-11-18 03:40:00', 1, 'Logged out'),
(295, '2025-11-18 03:40:11', 9, 'Logged in'),
(296, '2025-11-18 03:56:09', 9, 'Logged out'),
(297, '2025-11-18 03:56:17', 1, 'Logged in'),
(298, '2025-11-18 12:47:12', 1, 'Logged out'),
(299, '2025-11-19 03:04:17', 1, 'Logged in'),
(300, '2025-11-19 03:22:21', 18, 'Logged in'),
(301, '2025-11-19 13:43:33', 1, 'Logged out'),
(302, '2025-11-19 13:44:19', 18, 'Logged out'),
(303, '2025-11-19 13:44:30', 18, 'Logged in'),
(304, '2025-11-19 14:07:27', 18, 'Logged out'),
(305, '2025-11-22 04:19:34', 1, 'Logged in'),
(306, '2025-11-22 04:21:00', 1, 'Logged out'),
(307, '2025-11-22 04:21:26', 1, 'Logged in'),
(308, '2025-11-22 04:54:41', 18, 'Logged in'),
(309, '2025-11-22 08:03:02', 1, 'Logged out'),
(310, '2025-11-22 08:03:36', 1, 'Logged in'),
(311, '2025-11-22 08:07:53', 18, 'Logged out'),
(312, '2025-11-22 09:07:22', 1, 'Logged out'),
(313, '2025-11-22 09:58:01', 1, 'Logged in'),
(314, '2025-11-24 07:33:11', 1, 'Logged out'),
(315, '2025-11-24 07:35:12', 1, 'Logged in'),
(316, '2025-11-24 13:11:11', 1, 'Logged out'),
(317, '2025-11-25 04:32:33', 1, 'Logged in'),
(318, '2025-11-25 05:07:06', 1, 'Logged out'),
(319, '2025-11-25 05:14:55', 1, 'Logged in'),
(320, '2025-11-25 05:14:58', 1, 'Logged out'),
(321, '2025-11-26 00:45:15', 1, 'Logged in'),
(322, '2025-11-26 01:33:27', 1, 'Logged out'),
(323, '2025-11-26 01:33:39', 1, 'Logged in'),
(324, '2025-11-26 02:52:54', 9, 'Logged in'),
(325, '2025-11-26 05:42:04', 1, 'Logged out'),
(326, '2025-11-26 05:42:11', 18, 'Logged in'),
(327, '2025-11-26 06:09:16', 18, 'Logged out'),
(328, '2025-11-26 06:16:51', 1, 'Logged in'),
(329, '2025-11-26 11:07:11', 1, 'Logged out'),
(330, '2025-11-26 11:07:52', 1, 'Logged in'),
(331, '2025-11-26 11:21:20', 1, 'Logged out'),
(332, '2025-11-26 11:21:27', 18, 'Logged in'),
(333, '2025-11-26 11:26:28', 18, 'Logged out'),
(334, '2025-11-26 11:38:39', 1, 'Logged in'),
(335, '2025-11-26 12:45:46', 1, 'Logged out'),
(336, '2025-11-26 12:51:18', 1, 'Logged in'),
(337, '2025-11-26 12:54:40', 1, 'Logged out'),
(338, '2025-11-27 01:39:00', 1, 'Logged in'),
(339, '2025-11-27 01:39:28', 1, 'Logged out'),
(340, '2025-11-27 01:41:08', 1, 'Logged in'),
(341, '2025-11-27 05:13:33', 1, 'Logged out'),
(342, '2025-11-27 05:14:58', 9, 'Logged out'),
(343, '2025-11-27 05:15:02', 9, 'Logged in'),
(344, '2025-11-27 05:15:51', 1, 'Logged in'),
(345, '2025-11-27 05:29:58', 1, 'Logged out'),
(346, '2025-11-27 05:30:11', 18, 'Logged in'),
(347, '2025-11-27 05:39:16', 18, 'Logged out'),
(348, '2025-11-27 05:39:23', 1, 'Logged in'),
(349, '2025-11-27 05:47:48', 1, 'Logged out'),
(350, '2025-11-27 05:47:54', 18, 'Logged in'),
(351, '2025-11-27 07:32:14', 18, 'Logged out'),
(352, '2025-11-27 07:32:21', 1, 'Logged in'),
(353, '2025-11-27 07:33:37', 1, 'Logged out'),
(354, '2025-11-27 07:33:43', 18, 'Logged in'),
(355, '2025-11-27 07:36:53', 18, 'Logged out'),
(356, '2025-11-27 07:37:02', 1, 'Logged in'),
(357, '2025-11-27 07:40:21', 1, 'Logged out'),
(358, '2025-11-27 07:40:27', 18, 'Logged in'),
(359, '2025-11-27 07:49:54', 18, 'Logged out'),
(360, '2025-11-27 07:50:07', 1, 'Logged in'),
(361, '2025-11-27 07:53:14', 1, 'Logged out'),
(362, '2025-11-27 08:04:35', 1, 'Logged in'),
(363, '2025-11-27 08:20:35', 1, 'Logged out'),
(364, '2025-11-27 09:22:18', 1, 'Logged in'),
(365, '2025-11-27 11:33:39', 1, 'Logged out'),
(366, '2025-11-27 13:38:24', 1, 'Logged in'),
(367, '2025-11-27 14:21:47', 1, 'Logged out'),
(368, '2025-11-27 14:33:46', 1, 'Logged in'),
(369, '2025-11-27 14:34:10', 1, 'Logged out'),
(370, '2025-11-28 03:34:28', 1, 'Logged in'),
(371, '2025-11-28 06:27:13', 1, 'Logged out'),
(372, '2025-11-28 06:41:50', 1, 'Logged in'),
(373, '2025-11-28 11:41:09', 1, 'Logged out'),
(374, '2025-11-28 11:42:03', 9, 'Logged out'),
(375, '2025-11-28 11:42:08', 9, 'Logged in'),
(376, '2025-11-28 11:52:33', 1, 'Logged in'),
(377, '2025-11-28 12:43:52', 9, 'Logged out'),
(378, '2025-11-28 12:44:00', 18, 'Logged in'),
(379, '2025-11-28 14:26:10', 18, 'Logged out'),
(380, '2025-11-28 14:26:20', 9, 'Logged in'),
(381, '2025-11-28 14:57:00', 1, 'Logged out'),
(382, '2025-11-30 11:31:09', 1, 'Logged in'),
(383, '2025-11-30 12:07:23', 1, 'Logged out'),
(384, '2025-11-30 12:07:40', 18, 'Logged in'),
(385, '2025-11-30 12:32:01', 18, 'Logged out'),
(386, '2025-11-30 12:32:11', 1, 'Logged in'),
(387, '2025-11-30 12:51:57', 1, 'Logged out'),
(388, '2025-11-30 12:52:08', 18, 'Logged in'),
(389, '2025-11-30 13:10:20', 18, 'Logged out'),
(390, '2025-11-30 13:10:55', 1, 'Logged in'),
(391, '2025-11-30 13:31:22', 1, 'Logged out'),
(392, '2025-11-30 13:31:30', 1, 'Logged in'),
(393, '2025-12-01 05:26:10', 1, 'Logged out'),
(394, '2025-12-01 06:23:04', 1, 'Logged in'),
(395, '2025-12-01 06:25:28', 1, 'Logged out'),
(396, '2025-12-01 06:25:33', 18, 'Logged in'),
(397, '2025-12-01 06:25:48', 18, 'Logged out'),
(398, '2025-12-01 06:26:44', 1, 'Logged in'),
(399, '2025-12-01 06:37:17', 1, 'Logged out'),
(400, '2025-12-01 06:37:23', 18, 'Logged in'),
(401, '2025-12-01 06:41:37', 18, 'Logged out'),
(402, '2025-12-01 07:33:03', 1, 'Logged in'),
(403, '2025-12-01 10:14:28', 1, 'Logged out'),
(404, '2025-12-01 10:14:37', 1, 'Logged in'),
(405, '2025-12-01 12:01:41', 1, 'Logged out'),
(406, '2025-12-01 12:04:06', 1, 'Logged in'),
(407, '2025-12-01 12:09:14', 1, 'Logged out'),
(408, '2025-12-01 12:09:22', 18, 'Logged in'),
(409, '2025-12-01 12:11:09', 1, 'Logged in'),
(410, '2025-12-01 12:21:27', 1, 'Logged out'),
(411, '2025-12-01 12:37:10', 18, 'Logged out'),
(412, '2025-12-01 12:39:34', 1, 'Logged in'),
(413, '2025-12-01 12:47:03', 1, 'Logged out'),
(414, '2025-12-01 13:08:41', 1, 'Logged in'),
(415, '2025-12-01 13:39:30', 1, 'Logged out'),
(416, '2025-12-01 13:40:41', 9, 'Logged out'),
(417, '2025-12-01 13:40:50', 9, 'Logged in'),
(418, '2025-12-01 13:47:45', 1, 'Logged in'),
(419, '2025-12-01 13:57:00', 1, 'Logged out'),
(420, '2025-12-01 14:04:21', 1, 'Logged in'),
(421, '2025-12-01 14:17:29', 1, 'Logged out'),
(422, '2025-12-01 14:17:50', 9, 'Logged out'),
(423, '2025-12-01 14:19:40', 18, 'Logged in'),
(424, '2025-12-01 14:28:03', 1, 'Logged in'),
(425, '2025-12-01 15:09:56', 18, 'Logged out'),
(426, '2025-12-01 15:10:00', 1, 'Logged out'),
(427, '2025-12-02 01:12:13', 1, 'Logged in'),
(428, '2025-12-02 02:56:43', 1, 'Logged out'),
(429, '2025-12-02 02:56:51', 18, 'Logged in'),
(430, '2025-12-02 08:57:15', 1, 'Logged in'),
(431, '2025-12-02 10:05:52', 1, 'Logged out'),
(432, '2025-12-02 10:05:55', 1, 'Logged in'),
(433, '2025-12-02 11:23:28', 1, 'Logged out'),
(434, '2025-12-02 11:25:02', 1, 'Logged out'),
(435, '2025-12-02 11:25:36', 18, 'Logged out'),
(436, '2025-12-02 11:25:41', 18, 'Logged in'),
(437, '2025-12-02 12:25:30', 18, 'Logged out'),
(438, '2025-12-02 12:25:36', 1, 'Logged in'),
(439, '2025-12-02 13:19:26', 1, 'Logged out'),
(440, '2025-12-02 13:55:58', 1, 'Logged in'),
(441, '2025-12-02 14:35:39', 9, 'Logged in'),
(442, '2025-12-02 14:37:29', 9, 'Logged out'),
(443, '2025-12-04 13:47:05', 1, 'Logged out'),
(444, '2025-12-04 14:07:15', 1, 'Logged in'),
(445, '2025-12-05 00:41:03', 1, 'Logged out'),
(446, '2025-12-05 00:41:12', 18, 'Logged in'),
(447, '2025-12-05 00:43:11', 18, 'Logged out'),
(448, '2025-12-05 00:43:19', 1, 'Logged in'),
(449, '2025-12-05 00:44:34', 1, 'Logged out'),
(450, '2025-12-05 00:44:45', 18, 'Logged in'),
(451, '2025-12-05 02:24:11', 9, 'Logged in'),
(452, '2025-12-05 02:39:41', 18, 'Logged out'),
(453, '2025-12-05 02:39:48', 1, 'Logged in'),
(454, '2025-12-05 04:35:49', 1, 'Logged out'),
(455, '2025-12-05 04:37:00', 1, 'Logged in'),
(456, '2025-12-05 07:00:36', 18, 'Logged in'),
(457, '2025-12-05 07:36:47', 18, 'Logged out'),
(458, '2025-12-05 07:38:19', 9, 'Logged out'),
(459, '2025-12-05 07:38:29', 9, 'Logged in'),
(460, '2025-12-05 07:40:34', 9, 'Logged out'),
(461, '2025-12-05 07:48:31', 9, 'Logged in'),
(462, '2025-12-05 07:58:30', 9, 'Logged out'),
(463, '2025-12-05 13:20:30', 18, 'Logged in'),
(464, '2025-12-05 13:30:08', 18, 'Logged out'),
(465, '2025-12-05 13:38:11', 9, 'Logged in'),
(466, '2025-12-05 14:40:38', 9, 'Logged out'),
(467, '2025-12-06 01:46:21', 18, 'Logged in'),
(468, '2025-12-06 03:01:17', 1, 'Logged out'),
(469, '2025-12-06 03:05:00', 1, 'Logged in'),
(470, '2025-12-06 03:05:36', 1, 'Logged out'),
(471, '2025-12-06 03:08:58', 1, 'Logged in'),
(472, '2025-12-06 04:45:44', 18, 'Logged out'),
(473, '2025-12-06 05:37:46', 1, 'Logged out'),
(474, '2025-12-06 05:41:15', 18, 'Logged in'),
(475, '2025-12-06 05:47:34', 18, 'Logged out'),
(476, '2025-12-06 05:48:25', 18, 'Logged in'),
(477, '2025-12-06 05:53:32', 18, 'Logged out'),
(478, '2025-12-06 05:53:51', 9, 'Logged in'),
(479, '2025-12-06 06:07:20', 9, 'Logged out'),
(480, '2025-12-06 06:07:28', 18, 'Logged in'),
(481, '2025-12-06 06:13:44', 18, 'Logged out'),
(482, '2025-12-06 06:38:52', 1, 'Logged in'),
(483, '2025-12-06 06:49:52', 1, 'Logged out'),
(484, '2025-12-06 06:49:58', 18, 'Logged in'),
(485, '2025-12-06 07:16:06', 18, 'Logged out'),
(486, '2025-12-06 07:16:18', 1, 'Logged in'),
(487, '2025-12-06 07:24:12', 9, 'Logged in'),
(488, '2025-12-06 13:50:40', 9, 'Logged out'),
(489, '2025-12-06 13:50:52', 18, 'Logged in'),
(490, '2025-12-07 00:55:40', 18, 'Logged out'),
(491, '2025-12-07 00:55:50', 9, 'Logged in'),
(492, '2025-12-07 01:00:28', 9, 'Logged out'),
(493, '2025-12-07 01:00:37', 18, 'Logged in'),
(494, '2025-12-07 02:04:21', 18, 'Logged out'),
(495, '2025-12-07 02:04:46', 9, 'Logged in'),
(496, '2025-12-07 02:28:20', 9, 'Logged out'),
(497, '2025-12-07 02:28:31', 18, 'Logged in'),
(498, '2025-12-07 03:38:36', 18, 'Logged out'),
(499, '2025-12-07 03:38:46', 9, 'Logged in'),
(500, '2025-12-07 04:01:39', 9, 'Logged out'),
(501, '2025-12-07 04:01:46', 18, 'Logged in'),
(502, '2025-12-07 04:16:04', 18, 'Logged out'),
(503, '2025-12-07 04:16:44', 9, 'Logged in'),
(504, '2025-12-07 04:22:56', 9, 'Logged out'),
(505, '2025-12-07 04:23:13', 18, 'Logged in'),
(506, '2025-12-07 04:31:09', 18, 'Logged out'),
(507, '2025-12-07 04:31:22', 9, 'Logged in'),
(508, '2025-12-07 04:34:33', 9, 'Logged out'),
(509, '2025-12-07 04:34:41', 18, 'Logged in'),
(510, '2025-12-07 04:49:13', 18, 'Logged out'),
(511, '2025-12-07 04:49:20', 9, 'Logged in'),
(512, '2025-12-07 04:53:59', 9, 'Logged out'),
(513, '2025-12-07 05:14:35', 9, 'Logged in'),
(514, '2025-12-07 05:44:17', 9, 'Logged out'),
(515, '2025-12-07 05:44:26', 18, 'Logged in'),
(516, '2025-12-07 13:27:36', 1, 'Logged out'),
(517, '2025-12-07 14:15:14', 1, 'Logged in'),
(518, '2025-12-07 14:22:46', 1, 'Logged out'),
(519, '2025-12-07 14:29:18', 1, 'Logged in'),
(520, '2025-12-07 15:57:43', 1, 'Logged out'),
(521, '2025-12-07 16:04:29', 1, 'Logged in'),
(522, '2025-12-08 09:24:52', 1, 'Logged out'),
(523, '2025-12-08 10:48:25', 1, 'Logged in'),
(524, '2025-12-09 01:32:24', 1, 'Logged out'),
(525, '2025-12-09 01:35:33', 1, 'Logged in'),
(526, '2025-12-09 02:07:20', 1, 'Logged out'),
(527, '2025-12-09 02:07:29', 1, 'Logged in'),
(528, '2025-12-09 04:20:20', 1, 'Logged out'),
(529, '2025-12-09 05:32:52', 1, 'Logged in'),
(530, '2025-12-10 02:14:34', 1, 'Logged out'),
(531, '2025-12-10 02:14:44', 1, 'Logged in'),
(532, '2025-12-10 06:25:22', 9, 'Logged in'),
(533, '2025-12-10 06:56:06', 9, 'Logged out'),
(534, '2025-12-10 06:56:49', 9, 'Logged in'),
(535, '2025-12-11 05:31:18', 18, 'Logged out'),
(536, '2025-12-11 05:31:30', 18, 'Logged in'),
(537, '2025-12-11 06:17:19', 18, 'Logged out'),
(538, '2025-12-11 06:18:27', 9, 'Logged out'),
(539, '2025-12-11 06:18:35', 9, 'Logged in'),
(540, '2025-12-11 08:23:22', 9, 'Logged out'),
(541, '2025-12-11 08:23:30', 9, 'Logged in'),
(542, '2025-12-11 11:24:17', 9, 'Logged out'),
(543, '2025-12-11 11:24:34', 9, 'Logged in'),
(544, '2025-12-11 11:28:58', 9, 'Logged out'),
(545, '2025-12-11 11:29:07', 9, 'Logged in'),
(546, '2025-12-11 11:30:42', 9, 'Logged out'),
(547, '2025-12-12 01:38:36', 1, 'Logged out'),
(548, '2025-12-12 01:40:15', 1, 'Logged in'),
(549, '2025-12-12 01:41:59', 1, 'Logged out'),
(550, '2025-12-12 01:42:07', 18, 'Logged in'),
(551, '2025-12-12 01:43:33', 18, 'Logged out'),
(552, '2025-12-12 11:48:37', 1, 'Logged in'),
(553, '2025-12-12 14:51:38', 1, 'Logged out'),
(554, '2025-12-12 14:53:06', 9, 'Logged in'),
(555, '2025-12-13 01:26:50', 1, 'Logged in'),
(556, '2025-12-13 02:20:10', 1, 'Logged out'),
(557, '2025-12-13 02:20:22', 18, 'Logged in'),
(558, '2025-12-13 06:06:48', 18, 'Logged out'),
(559, '2025-12-13 06:06:57', 1, 'Logged in'),
(560, '2025-12-13 06:27:47', 1, 'Logged out'),
(561, '2025-12-13 06:29:23', 1, 'Logged in'),
(562, '2025-12-13 06:29:35', 1, 'Logged out'),
(563, '2025-12-13 06:30:38', 1, 'Logged in'),
(564, '2025-12-13 06:30:49', 1, 'Logged out'),
(565, '2025-12-13 06:32:00', 1, 'Logged in'),
(566, '2025-12-13 06:35:54', 1, 'Logged out'),
(567, '2025-12-13 06:36:02', 1, 'Logged in'),
(568, '2025-12-13 06:57:35', 1, 'Logged out'),
(569, '2025-12-13 06:59:28', 9, 'Logged out'),
(570, '2025-12-13 06:59:41', 9, 'Logged in'),
(571, '2025-12-13 11:17:15', 1, 'Logged in'),
(572, '2025-12-14 08:05:01', 18, 'Logged in'),
(573, '2025-12-14 09:17:52', 1, 'Logged out'),
(574, '2025-12-14 09:18:03', 1, 'Logged in'),
(575, '2025-12-15 12:35:03', 9, 'Logged out'),
(576, '2025-12-15 12:35:14', 9, 'Logged in'),
(577, '2025-12-15 15:10:09', 9, 'Logged out'),
(578, '2025-12-15 15:10:17', 9, 'Logged in'),
(579, '2025-12-15 15:13:38', 1, 'Logged out'),
(580, '2025-12-16 02:41:03', 1, 'Logged in'),
(581, '2025-12-19 08:18:57', 1, 'Logged out'),
(582, '2025-12-19 09:29:46', 1, 'Logged in'),
(583, '2025-12-19 10:46:46', 9, 'Logged out'),
(584, '2025-12-19 10:46:59', 9, 'Logged in'),
(585, '2025-12-21 05:21:15', 1, 'Logged out'),
(586, '2025-12-21 11:01:19', 1, 'Logged in'),
(587, '2025-12-22 04:09:24', 1, 'Logged out'),
(588, '2025-12-22 04:13:29', 18, 'Logged out'),
(589, '2025-12-22 04:13:40', 18, 'Logged in'),
(590, '2025-12-22 05:00:10', 18, 'Logged out'),
(591, '2025-12-22 05:00:14', 18, 'Logged in'),
(592, '2025-12-22 07:59:16', 9, 'Logged out'),
(593, '2025-12-22 07:59:28', 9, 'Logged in'),
(594, '2025-12-22 12:54:41', 1, 'Logged in'),
(595, '2025-12-22 14:14:22', 1, 'Logged out'),
(596, '2025-12-23 03:43:01', 18, 'Logged out'),
(597, '2025-12-23 03:43:22', 1, 'Logged in'),
(598, '2025-12-23 04:01:11', 9, 'Logged out'),
(599, '2025-12-23 04:01:20', 9, 'Logged in'),
(600, '2025-12-23 04:02:04', 9, 'Logged out'),
(601, '2025-12-23 07:28:45', 1, 'Logged out'),
(602, '2025-12-23 07:28:49', 1, 'Logged in'),
(603, '2025-12-24 02:03:55', 9, 'Logged in'),
(604, '2025-12-26 02:29:26', 1, 'Logged out'),
(605, '2025-12-26 02:29:35', 1, 'Logged in'),
(606, '2025-12-26 03:51:38', 9, 'Logged out'),
(607, '2025-12-26 03:51:52', 9, 'Logged in'),
(608, '2025-12-26 13:33:36', 1, 'Logged out'),
(609, '2025-12-26 13:33:56', 1, 'Logged in'),
(610, '2025-12-27 02:11:40', 1, 'Logged out'),
(611, '2025-12-27 02:11:49', 1, 'Logged in'),
(612, '2025-12-27 02:29:09', 9, 'Logged out'),
(613, '2025-12-27 02:29:20', 9, 'Logged in'),
(614, '2025-12-27 07:56:58', 9, 'Logged out'),
(615, '2025-12-27 07:57:07', 9, 'Logged in'),
(616, '2025-12-27 07:59:39', 9, 'Logged out'),
(617, '2025-12-27 07:59:52', 9, 'Logged in'),
(618, '2025-12-29 13:08:53', 1, 'Logged out'),
(619, '2025-12-29 13:09:03', 1, 'Logged in'),
(620, '2025-12-30 06:06:47', 1, 'Logged out'),
(621, '2025-12-30 06:06:55', 1, 'Logged in'),
(622, '2025-12-30 06:48:08', 9, 'Logged out'),
(623, '2025-12-30 06:48:16', 9, 'Logged in'),
(624, '2026-01-03 04:57:19', 1, 'Logged out'),
(625, '2026-01-03 04:57:23', 1, 'Logged in'),
(626, '2026-01-03 11:16:01', 9, 'Logged out'),
(627, '2026-01-03 11:16:09', 18, 'Logged in'),
(628, '2026-01-04 02:14:23', 1, 'Logged out'),
(629, '2026-01-04 02:14:32', 1, 'Logged in'),
(630, '2026-01-04 03:23:18', 18, 'Logged out'),
(631, '2026-01-04 03:23:26', 18, 'Logged in'),
(632, '2026-01-04 04:49:44', 18, 'Logged out'),
(633, '2026-01-04 04:49:53', 18, 'Logged in'),
(634, '2026-01-04 08:33:09', 18, 'Logged out'),
(635, '2026-01-04 08:33:19', 9, 'Logged in'),
(636, '2026-01-06 04:10:57', 1, 'Logged out'),
(637, '2026-01-06 04:11:30', 1, 'Logged in'),
(638, '2026-01-06 04:13:01', 9, 'Logged out'),
(639, '2026-01-06 04:13:10', 9, 'Logged in'),
(640, '2026-01-06 08:08:52', 18, 'Logged in'),
(641, '2026-01-06 08:11:07', 18, 'Logged out'),
(642, '2026-01-06 08:11:23', 18, 'Logged in'),
(643, '2026-01-06 08:39:21', 1, 'Logged out'),
(644, '2026-01-06 08:39:28', 1, 'Logged in'),
(645, '2026-01-06 08:49:34', 18, 'Logged out'),
(646, '2026-01-07 01:10:37', 1, 'Logged out'),
(647, '2026-01-07 01:10:47', 1, 'Logged in'),
(648, '2026-01-07 12:10:30', 1, 'Logged out'),
(649, '2026-01-07 12:54:03', 1, 'Logged in');

-- --------------------------------------------------------

--
-- Table structure for table `registrant_subscriptions`
--

CREATE TABLE `registrant_subscriptions` (
  `registrant_subscriptionId` int(11) NOT NULL,
  `registrant_subscriptionUserId` int(11) NOT NULL,
  `registrant_subscriptionUserFullName` varchar(64) NOT NULL,
  `registrant_subscriptionType` varchar(64) NOT NULL,
  `registrant_subscriptionDuration` varchar(2) NOT NULL DEFAULT '1',
  `registrant_subscriptionTotal` int(11) NOT NULL,
  `registrant_subscriptionPaymentOption` varchar(64) NOT NULL,
  `registrant_subscriptionSenderName` varchar(250) NOT NULL,
  `registrant_subscriptionSenderAccountNumber` varchar(64) NOT NULL,
  `registrant_subscriptionRefNumber` varchar(64) NOT NULL,
  `registrant_subscriptionProofOfPayment` varchar(100) NOT NULL,
  `registrant_subscriptionTimestamp` datetime NOT NULL DEFAULT current_timestamp(),
  `registrant_subscriptionStatus` varchar(64) NOT NULL DEFAULT 'Pending',
  `registrant_subscriptionDate` datetime DEFAULT NULL,
  `registrant_subscriptionExpiry` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registrant_subscriptions`
--

INSERT INTO `registrant_subscriptions` (`registrant_subscriptionId`, `registrant_subscriptionUserId`, `registrant_subscriptionUserFullName`, `registrant_subscriptionType`, `registrant_subscriptionDuration`, `registrant_subscriptionTotal`, `registrant_subscriptionPaymentOption`, `registrant_subscriptionSenderName`, `registrant_subscriptionSenderAccountNumber`, `registrant_subscriptionRefNumber`, `registrant_subscriptionProofOfPayment`, `registrant_subscriptionTimestamp`, `registrant_subscriptionStatus`, `registrant_subscriptionDate`, `registrant_subscriptionExpiry`) VALUES
(1, 1, '', 'Tools', '4', 276, 'GCASH', '', '', 'fdgfdgfg', '/uploads/subscription/proof/userid-1-20260107110522.jpeg', '2026-01-07 11:05:22', 'Approved', '2026-01-07 11:48:58', '2026-05-07 11:48:58'),
(2, 1, '', 'Seller', '7', 700, 'GCASH', '', '', 'fgfdgfdhgfdhdfhfdhfdhdfhfdhffgfh', '/uploads/subscription/proof/userid-1-20260107115340.jpeg', '2026-01-07 11:53:40', 'Approved', '2026-01-07 11:54:02', '2026-08-05 11:54:02');

-- --------------------------------------------------------

--
-- Table structure for table `registrations`
--

CREATE TABLE `registrations` (
  `registrantId` int(11) NOT NULL,
  `registrantCode` varchar(64) NOT NULL,
  `registrantFirstName` varchar(256) NOT NULL,
  `registrantMiddleName` varchar(256) NOT NULL,
  `registrantLastName` varchar(256) NOT NULL,
  `registrantAccountName` varchar(100) NOT NULL,
  `registrantDescription` longtext NOT NULL,
  `registrantAccountType` varchar(64) NOT NULL,
  `registrantProfilePictureStatus` int(11) DEFAULT 1,
  `registrantProfilePictureLink` varchar(100) NOT NULL,
  `registrantCoverPhotoLink` varchar(100) NOT NULL,
  `registrantBirthdate` date NOT NULL,
  `registrantGender` varchar(64) NOT NULL,
  `registrantCivilStatus` varchar(64) NOT NULL,
  `registrantAddressStreet` varchar(100) NOT NULL,
  `registrantAddressBarangay` varchar(100) NOT NULL,
  `registrantAddressCity` varchar(100) NOT NULL,
  `registrantAddressProvince` varchar(100) NOT NULL,
  `registrantAddressRegion` varchar(100) NOT NULL,
  `registrantAddressCountry` varchar(100) NOT NULL,
  `registrantAddressZipCode` varchar(64) NOT NULL,
  `registrantEducationalAttainment` varchar(64) NOT NULL,
  `registrantSchool` varchar(100) NOT NULL,
  `registrantOccupation` varchar(100) NOT NULL,
  `registrantEmailAddress` varchar(64) NOT NULL,
  `registrantMobileNumber` varchar(64) NOT NULL,
  `registrantUsername` varchar(100) NOT NULL,
  `registrantPassword` varchar(100) NOT NULL,
  `registrantConfirmationCode` varchar(64) NOT NULL,
  `registrantBasicAccount` varchar(64) NOT NULL,
  `registrantTeacherAccount` varchar(64) NOT NULL,
  `registrantWriterAccount` varchar(64) NOT NULL,
  `registrantEditorAccount` varchar(64) NOT NULL,
  `registrantSiteManagerAccount` varchar(64) NOT NULL,
  `registrantDataAnalystAccount` varchar(64) NOT NULL,
  `registrantDeveloperAccount` varchar(64) NOT NULL,
  `registrantFunderAccount` varchar(64) NOT NULL,
  `registrantResearchesAccount` varchar(64) NOT NULL,
  `registrantVerificationStatus` varchar(64) NOT NULL DEFAULT 'Unverified',
  `registrantStatus` varchar(64) NOT NULL DEFAULT 'No Ban',
  `registrantCreatedAt` datetime NOT NULL,
  `resetTokenHash` varchar(64) NOT NULL,
  `resetTokenHashExpiration` datetime NOT NULL,
  `registrantPaymentChannel` varchar(64) NOT NULL,
  `registrantBankAccountName` varchar(150) NOT NULL,
  `registrantBankAccountNumber` varchar(64) NOT NULL,
  `registrantReviewSchedules` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registrations`
--

INSERT INTO `registrations` (`registrantId`, `registrantCode`, `registrantFirstName`, `registrantMiddleName`, `registrantLastName`, `registrantAccountName`, `registrantDescription`, `registrantAccountType`, `registrantProfilePictureStatus`, `registrantProfilePictureLink`, `registrantCoverPhotoLink`, `registrantBirthdate`, `registrantGender`, `registrantCivilStatus`, `registrantAddressStreet`, `registrantAddressBarangay`, `registrantAddressCity`, `registrantAddressProvince`, `registrantAddressRegion`, `registrantAddressCountry`, `registrantAddressZipCode`, `registrantEducationalAttainment`, `registrantSchool`, `registrantOccupation`, `registrantEmailAddress`, `registrantMobileNumber`, `registrantUsername`, `registrantPassword`, `registrantConfirmationCode`, `registrantBasicAccount`, `registrantTeacherAccount`, `registrantWriterAccount`, `registrantEditorAccount`, `registrantSiteManagerAccount`, `registrantDataAnalystAccount`, `registrantDeveloperAccount`, `registrantFunderAccount`, `registrantResearchesAccount`, `registrantVerificationStatus`, `registrantStatus`, `registrantCreatedAt`, `resetTokenHash`, `resetTokenHashExpiration`, `registrantPaymentChannel`, `registrantBankAccountName`, `registrantBankAccountNumber`, `registrantReviewSchedules`) VALUES
(1, '25000000001', 'Erfel', 'Contiga', 'Suriaga', 'Erfel Contiga Suriaga', 'Erfel Suriaga is a licensed professional teacher who can program educational apps at the same time...hhhggg', 'Personal', 0, '/uploads/profile-pictures/Erfel_Contiga_Suriaga-20251122133917.jpeg', '/uploads/cover-photos/Erfel_Contiga_Suriaga-20251122133846.jpeg', '1997-04-27', 'Male', 'Single', 'Prk Kalubihan', 'DAGA', 'CADIZ CITY', 'NEGROS OCCIDENTAL', 'NIR', 'Philippines', '', 'with Doctorate Degree', 'PNU Visayas', 'Teacher', 'suriagaerfel@gmail.com', '09000000000', 'erfelsuriaga', '$2y$10$DZ4q2gC6udSEHqYUDulVDe1RBrRM7NCVAVFb1Z47R/2ubxTq2k9oG', '', 'Basic User', 'Teacher', '', 'Editor', 'Site Manager', 'Data Analyst', 'Developer', 'Funder', '', 'Verified', 'Kept', '2025-10-08 14:24:42', '8894d06e414e2e4e98467f42b2e86cdf51df3da3abdec150f1851d4bfa1a1a11', '2025-12-02 21:57:56', 'landbank', 'Erfel Suriaga', '09942761634', 'Monday-Friday(8am -9am)'),
(9, '25000000009', '', '', '', 'Example High School', 'HIA is a catholic school that commits itself to guide young boys and girls into a search of a true and authentic education which recognizes the greatness of God and the nothingness of man.', 'School', 1, '/uploads/profile-pictures/Holy_Infant_Academy-20251115224017.jpeg', '/uploads/cover-photos/Holy_Infant_Academy-20251115223950.jpeg', '0000-00-00', '', '', '', 'CAPANICKIAN NORTE', 'ALLACAPAN', 'CAGAYAN', 'REGION II', 'Philippines', '', '', '', '', 'sirversafel@gmail.com', '09942762632', 'sirversafel', '$2y$10$EY5ISxLZDiTZ/xoEcBnQM.iSLhhQl/4QyaiMlQgjZuBusdBkzX1KW', '', 'College or University', '', '', '', '', '', '', '', 'Researches', 'Verified', 'Kept', '2025-10-18 11:50:01', '', '0000-00-00 00:00:00', '', '', '', ''),
(15, '25000000015', 'Nonoy', '', 'Trebyu', 'Nonoy  Trebyu', '', 'Personal', 1, '', '', '2025-10-11', 'Male', 'Single', 'Prk Kalubihan', 'ALILEM DAYA (POB.)', 'ALILEM', 'ILOCOS SUR', 'REGION I', 'Philippines', '', 'Elementary Graduate', 'PNU Visayas', 'Teacher', 'noytrebyu@gmail.com', '09942762632', 'noytrebyu', '$2y$10$YhtX4E82xeeewo85AzHwReXB44ndXRDMgu7ZKcDGUBKMFC7vMcI8S', '', 'Basic User', 'Teacher', '', '', '', '', '', '', '', 'Verified', 'Kept', '2025-10-22 10:18:53', '', '0000-00-00 00:00:00', '', '', '', ''),
(16, '25000000016', 'Erfiaga', '', 'Publishing', 'Erfiaga Publishing', '', 'Personal', 1, '', '', '2025-10-15', 'Hide Gender', '', '', '', '', '', '', '', '', '', '', '', 'erfiagaprintsandbooks@gmail.com', '', 'erfiaga', '$2y$10$YiTGGjQ30rKhWRG7iOfWM.Oj5xua63HL74cTaqHgma2.sEya9yfSi', '', 'Basic User', '', '', '', '', '', '', '', '', 'Verified', 'Kept', '2025-10-30 11:53:47', '', '0000-00-00 00:00:00', '', '', '', ''),
(18, '', 'Erfel', '', 'Printing', 'Erfel Printing', '', 'Personal', 1, '/uploads/profile-pictures/Erfel__Printing-20251223100004.jpeg', '/uploads/cover-photos/Erfel__Printing-20251223103151.jpeg', '2025-11-18', 'Male', '', 'dsgdgg', 'DURIPES', 'BACARRA', 'ILOCOS NORTE', 'REGION I', 'Philippines', '', '', 'PNU', 'Teacher', 'erfelprintingservices@gmail.com', '09942762632', 'eps', '$2y$10$I.d83QSfQ/LX5RJkvcG56OYuAToGU17g82TT5GLqpKGBhlqvQEKiC', '', 'Basic User', 'Teacher', '', 'Editor', '', '', '', '', '', 'Verified', 'Kept', '2025-11-11 16:37:14', '7e87a4ba6af4acb315c171675730123bc1fabcb9a776e6536024f9ea1867bce7', '2026-01-06 17:23:12', 'GCASH', 'Erfel Suriaga', '09942762632', 'Mon-Fri');

-- --------------------------------------------------------

--
-- Table structure for table `school_researches`
--

CREATE TABLE `school_researches` (
  `school_researchId` int(11) NOT NULL,
  `school_researchTitle` longtext NOT NULL,
  `school_researchSlug` longtext NOT NULL,
  `school_researchCategory` varchar(64) NOT NULL,
  `school_researchAbstract` longtext NOT NULL,
  `school_researchImage` varchar(100) NOT NULL,
  `school_researchFormat` varchar(64) NOT NULL,
  `school_researchUploader` int(11) NOT NULL,
  `school_researchProponents` varchar(64) NOT NULL,
  `school_researchUploadDate` datetime NOT NULL,
  `school_researchDate` date NOT NULL,
  `school_researchLiveDate` datetime NOT NULL,
  `school_researchUpdateDate` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `school_researchStatus` varchar(64) NOT NULL DEFAULT 'Draft',
  `school_researchLink` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `school_researches`
--

INSERT INTO `school_researches` (`school_researchId`, `school_researchTitle`, `school_researchSlug`, `school_researchCategory`, `school_researchAbstract`, `school_researchImage`, `school_researchFormat`, `school_researchUploader`, `school_researchProponents`, `school_researchUploadDate`, `school_researchDate`, `school_researchLiveDate`, `school_researchUpdateDate`, `school_researchStatus`, `school_researchLink`) VALUES
(39, 'xcfhchgh', 'xcfhchgh', 'Correlational', 'ffdgfdg', '/uploads/thumbnails/researches/39-20251215221332.jpeg', 'pdf', 9, 'dfgfg', '2025-12-15 22:06:21', '2025-12-10', '2025-12-19 18:58:49', '2025-12-19 19:11:16', 'Unpublished', '/uploads/documents/school/9-7863666863686768.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `school_research_versions`
--

CREATE TABLE `school_research_versions` (
  `school_researchVersionId` int(11) NOT NULL,
  `school_researchVersionTimestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `school_researchVersionForeignId` int(11) NOT NULL,
  `school_researchVersionNumber` int(11) NOT NULL,
  `school_researchVersionContent` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `teacher_files`
--

CREATE TABLE `teacher_files` (
  `teacher_fileId` int(11) NOT NULL,
  `teacher_fileTitle` longtext NOT NULL,
  `teacher_fileSlug` longtext NOT NULL,
  `teacher_fileCategory` varchar(64) NOT NULL,
  `teacher_fileAccessType` varchar(64) NOT NULL DEFAULT 'Free',
  `teacher_fileSharedWith` varchar(300) NOT NULL,
  `teacher_fileDescription` longtext NOT NULL,
  `teacher_fileLatestVersionNumber` int(11) NOT NULL,
  `teacher_fileImage` varchar(100) NOT NULL,
  `teacher_fileFormat` varchar(64) NOT NULL,
  `teacher_fileOwner` varchar(64) NOT NULL,
  `teacher_fileUploadDate` datetime NOT NULL,
  `teacher_filePubDate` datetime NOT NULL,
  `teacher_fileUpdateDate` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `teacher_fileStatus` varchar(64) NOT NULL DEFAULT 'Draft',
  `teacher_fileForSale` varchar(64) NOT NULL DEFAULT 'Not for Sale',
  `teacher_fileAmount` int(7) NOT NULL,
  `teacher_fileLink` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teacher_files`
--

INSERT INTO `teacher_files` (`teacher_fileId`, `teacher_fileTitle`, `teacher_fileSlug`, `teacher_fileCategory`, `teacher_fileAccessType`, `teacher_fileSharedWith`, `teacher_fileDescription`, `teacher_fileLatestVersionNumber`, `teacher_fileImage`, `teacher_fileFormat`, `teacher_fileOwner`, `teacher_fileUploadDate`, `teacher_filePubDate`, `teacher_fileUpdateDate`, `teacher_fileStatus`, `teacher_fileForSale`, `teacher_fileAmount`, `teacher_fileLink`) VALUES
(27, 'fgfchgchgf', 'fgfchgchgf', 'Lesson Plan', 'Purchased', '', 'cnfghfhdf', 0, '/uploads/thumbnails/teacher-files/27-20251207123930.jpeg', 'pdf', '18', '2025-12-07 12:36:42', '2025-12-07 12:39:32', '2025-12-07 14:13:09', 'Unpublished', 'Not for Sale', 0, '/uploads/documents/teacher/18-66676663686763686766.pdf'),
(28, 'sdfdgfg', 'sdfdgfg', 'Syllabus', 'Purchased', '', 'fdgfgfhfhfdh', 0, '/uploads/thumbnails/teacher-files/28-20251207141651.jpeg', 'pdf', '18', '2025-12-07 14:16:17', '2025-12-07 14:17:04', '2025-12-22 22:02:51', 'Unpublished', 'Not for Sale', 10, '/uploads/documents/teacher/18-73646664676667.pdf'),
(31, 'sdfsdfsafsaf', 'sdfsdfsafsaf', 'Syllabus', 'Free', '', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of &quot;de Finibus Bonorum et Malorum&quot; (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, &quot;Lorem ipsum dolor sit amet..&quot;, comes from a line in section 1.10.32. HHHH\r\n\r\nThe standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from &quot;de Finibus Bonorum et Malorum&quot; by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham. hhhhhhhhhhhh HHHHH', 0, '/uploads/thumbnails/teacher-files/31-20251226105604.jpeg', 'pdf', '1', '2025-12-11 11:06:27', '2025-12-11 11:06:40', '2026-01-06 15:56:45', 'Unpublished', 'Not for Sale', 0, '/uploads/documents/teacher/1-736466736466736166736166.pdf'),
(33, 'sdfgfdh', 'sdfgfdh', 'Lesson Plan', 'Free', '', 'Are you struggling to protect user privacy while creating high-quality mobile apps? The article highlighted real anxiety around unauthorized data sharing, lack of user control, and complex security protocols. Developers and creators want to build professional apps, but constant privacy risks, hidden data permissions, and technical hurdles can slow progress or leave sensitive information exposed.\r\n\r\nTake control of your app’s privacy and user experience with Natively. Our no-code platform lets you focus on user trust by offering secure app building from the start. In minutes, you can prototype, test, and deploy custom mobile apps that include comprehensive privacy safeguards—without writing a single line of code. Ready to turn privacy concerns into peace of mind? See how Natively’s visual builder works and put secure app creation within your reach today.gg', 0, '/uploads/thumbnails/teacher-files/33-20251212200342.jpeg', 'pdf', '1', '2025-12-12 19:59:59', '2025-12-12 20:03:43', '2025-12-21 10:20:25', 'Unpublished', 'Not for Sale', 0, '/uploads/documents/teacher/1-73646667666468.pdf'),
(34, 'CVFDGFGFDG', 'cvfdgfgfdg', 'Syllabus', 'Free', '', 'DFGFXGFDGFDGFDGFG', 0, '/uploads/thumbnails/teacher-files/34-20251214181340.jpeg', 'pdf', '1', '2025-12-13 14:15:00', '0000-00-00 00:00:00', '2025-12-14 18:13:40', 'Draft', 'Not for Sale', 0, '/uploads/documents/teacher/1-43564644474647464447.pdf'),
(35, 'ggfdhfdhfdh', 'ggfdhfdhfdh', 'Lesson Plan', 'Purchased', 'gggg', 'dhhdhfdh ggg', 0, '/uploads/thumbnails/teacher-files/35-20251215221642.jpeg', 'pdf', '1', '2025-12-15 22:16:32', '2025-12-19 19:09:01', '2026-01-04 11:10:45', 'Unpublished', 'Not for Sale', 100, '/uploads/documents/teacher/1-6767666468666468666468.pdf'),
(36, 'sdgfdgfdh', 'sdgfdgfdh', 'Syllabus', 'Purchased', '', 'dfdgegf', 0, '/uploads/thumbnails/teacher-files/36-20251227171547.jpeg', 'pdf', '1', '2025-12-16 17:53:34', '2025-12-27 17:16:20', '2026-01-04 11:10:43', 'Unpublished', 'Not for Sale', 20, '/uploads/documents/teacher/1-736467666467666468.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_file_versions`
--

CREATE TABLE `teacher_file_versions` (
  `teacher_fileVersionId` int(11) NOT NULL,
  `teacher_fileVersionTimestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `teacher_fileVersionForeignId` int(11) NOT NULL,
  `teacher_fileVersionNumber` int(11) NOT NULL,
  `teacher_fileVersionContent` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `teacher_registrations`
--

CREATE TABLE `teacher_registrations` (
  `teacherId` int(11) NOT NULL,
  `teacherTimestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `teacherUserId` int(11) NOT NULL,
  `teacherFullname` varchar(256) NOT NULL,
  `teacherEmailAddress` varchar(64) NOT NULL,
  `teacherIDCardType` varchar(100) NOT NULL,
  `teacherIDCardNo` varchar(64) NOT NULL,
  `teacherIDCardExpiry` date NOT NULL,
  `teacherCard` varchar(256) NOT NULL,
  `teacherResume` varchar(256) NOT NULL,
  `teacherProfileStatus` varchar(64) NOT NULL DEFAULT 'Pending',
  `teacherProfileApprovalDate` datetime NOT NULL,
  `teacherTeachingExperience` longtext NOT NULL,
  `teacherTotalFiles` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teacher_registrations`
--

INSERT INTO `teacher_registrations` (`teacherId`, `teacherTimestamp`, `teacherUserId`, `teacherFullname`, `teacherEmailAddress`, `teacherIDCardType`, `teacherIDCardNo`, `teacherIDCardExpiry`, `teacherCard`, `teacherResume`, `teacherProfileStatus`, `teacherProfileApprovalDate`, `teacherTeachingExperience`, `teacherTotalFiles`) VALUES
(1, '2025-09-22 11:18:34', 1, '  ', 'suriagaerfel@gmail.com', 'PRC ID', 'fdsfdsf', '0000-00-00', '/uploads/registration/teacher/cards/--20250922075210.pdf', '/uploads/registration/teacher/resumes/--20250922075210.docx', 'Approved', '2025-09-22 19:18:34', 'dsdsgds', 0);

-- --------------------------------------------------------

--
-- Table structure for table `terms_conditions`
--

CREATE TABLE `terms_conditions` (
  `term_conditionId` int(11) NOT NULL,
  `term_conditionAccountType` varchar(64) NOT NULL,
  `term_conditionContent` longtext NOT NULL,
  `term_conditionDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `terms_conditions`
--

INSERT INTO `terms_conditions` (`term_conditionId`, `term_conditionAccountType`, `term_conditionContent`, `term_conditionDate`) VALUES
(1, 'teacher', 'Content for terms and conditions for teachers...', '2025-09-17 13:17:59'),
(2, 'writer', 'Content for terms and conditions for writers...', '2025-09-17 13:17:59');

-- --------------------------------------------------------

--
-- Table structure for table `tools`
--

CREATE TABLE `tools` (
  `toolId` int(11) NOT NULL,
  `toolName` varchar(100) NOT NULL,
  `toolIcon` varchar(64) NOT NULL,
  `toolDescription` longtext NOT NULL,
  `toolUse` varchar(250) NOT NULL,
  `toolCategory` varchar(64) NOT NULL,
  `toolURL` varchar(100) NOT NULL,
  `toolReleased` datetime NOT NULL,
  `toolStatus` varchar(64) DEFAULT 'Draft'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tools`
--

INSERT INTO `tools` (`toolId`, `toolName`, `toolIcon`, `toolDescription`, `toolUse`, `toolCategory`, `toolURL`, `toolReleased`, `toolStatus`) VALUES
(1, 'Bulk Certificate Generator', '', 'This tool helps teachers in preparing certificates easily.', '', 'Math', 'gfjgfjgjgj', '2025-09-15 11:33:49', 'Live');

-- --------------------------------------------------------

--
-- Table structure for table `website_status`
--

CREATE TABLE `website_status` (
  `website_statusId` int(11) NOT NULL,
  `website_statusName` varchar(64) NOT NULL DEFAULT 'Published'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `writer_articles`
--

CREATE TABLE `writer_articles` (
  `writer_articleId` int(11) NOT NULL,
  `writer_articleTitle` longtext NOT NULL,
  `writer_articleSlug` longtext NOT NULL,
  `writer_articleImage` varchar(150) NOT NULL,
  `writer_articleCategory` varchar(64) NOT NULL,
  `writer_articleTopic` varchar(100) NOT NULL,
  `writer_articleWriterId` int(11) NOT NULL,
  `writer_articleWriterName` varchar(256) NOT NULL,
  `writer_articleEditors` text NOT NULL,
  `writer_articleWriteDate` datetime NOT NULL,
  `writer_articleUpdateDate` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `writer_articlePubDate` datetime NOT NULL,
  `writer_articleContent` longtext NOT NULL,
  `writer_articleContentLatestVersionNumber` int(11) NOT NULL DEFAULT 1,
  `writer_articleStatus` varchar(64) NOT NULL DEFAULT 'Draft',
  `writer_articleComments` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `writer_articles`
--

INSERT INTO `writer_articles` (`writer_articleId`, `writer_articleTitle`, `writer_articleSlug`, `writer_articleImage`, `writer_articleCategory`, `writer_articleTopic`, `writer_articleWriterId`, `writer_articleWriterName`, `writer_articleEditors`, `writer_articleWriteDate`, `writer_articleUpdateDate`, `writer_articlePubDate`, `writer_articleContent`, `writer_articleContentLatestVersionNumber`, `writer_articleStatus`, `writer_articleComments`) VALUES
(99, 'Terms of Use', 'terms+of+use', '/uploads/featured-images/99-20251211155953.jpeg', 'Administrative', 'Terms of Use', 1, 'Erfel Contiga Suriaga', '', '2025-12-01 19:50:34', '2025-12-19 18:28:26', '2025-12-01 19:50:38', '            <p data-start=\"234\" data-end=\"250\"><strong data-start=\"234\" data-end=\"250\">Terms of Use</strong></p>\r\n<p data-start=\"252\" data-end=\"278\"><strong data-start=\"252\" data-end=\"278\">Effective Date: [Date]</strong></p>\r\n<p data-start=\"280\" data-end=\"591\">Welcome to [Your Web App Name] (the “Service”), provided by [Your Company Name] (“we”, “us”, or “our”). By accessing or using our website and web application (the \"App\"), you agree to comply with and be bound by these Terms of Use (the \"Agreement\"). If you do not agree with these terms, do not use the Service.</p><h3 data-start=\"593\" data-end=\"623\">1. <strong data-start=\"600\" data-end=\"623\">Acceptance of Terms</strong></h3>\r\n<p data-start=\"624\" data-end=\"928\">By accessing or using the Service, you agree to these Terms of Use, as well as any additional terms, conditions, or policies that may apply to specific features or services available through the Service. If you do not agree to any of these terms, you must immediately discontinue your use of the Service.</p>\r\n<h3 data-start=\"930\" data-end=\"952\">2. <strong data-start=\"937\" data-end=\"952\">Eligibility</strong></h3>\r\n<p data-start=\"953\" data-end=\"1143\">You must be at least [18] years of age (or the legal age of majority in your jurisdiction) to use the Service. By using the Service, you represent and warrant that you are eligible to do so.</p>\r\n<h3 data-start=\"1145\" data-end=\"1176\">3. <strong data-start=\"1152\" data-end=\"1176\">Account Registration</strong></h3>\r\n<p data-start=\"1177\" data-end=\"1561\">To access certain features of the Service, you may be required to create an account. You agree to provide accurate, current, and complete information during the registration process and to update your information to keep it accurate and complete. You are responsible for maintaining the confidentiality of your account credentials and for all activities that occur under your account.</p>\r\n<h3 data-start=\"1563\" data-end=\"1592\">4. <strong data-start=\"1570\" data-end=\"1592\">Use of the Service</strong></h3>\r\n<p data-start=\"1593\" data-end=\"1812\">You agree to use the Service in accordance with all applicable local, state, and international laws. You are solely responsible for your conduct and any data or content you upload, post, or transmit through the Service.</p>\r\n<ul data-start=\"1814\" data-end=\"2041\">\r\n<li data-start=\"1814\" data-end=\"1910\">\r\n<p data-start=\"1816\" data-end=\"1910\">You agree not to use the Service for any unlawful, harmful, fraudulent, or malicious purposes.</p>\r\n</li>\r\n<li data-start=\"1911\" data-end=\"2041\">\r\n<p data-start=\"1913\" data-end=\"2041\">You will not attempt to gain unauthorized access to any part of the Service or any systems or networks connected to the Service.</p>\r\n</li>\r\n</ul>\r\n<h3 data-start=\"2043\" data-end=\"2066\">5. <strong data-start=\"2050\" data-end=\"2066\">User Content</strong></h3>\r\n<p data-start=\"2067\" data-end=\"2320\">You may be allowed to upload, submit, or transmit content through the Service (\"User Content\"). By submitting User Content, you grant us a non-exclusive, worldwide, royalty-free license to use, display, and distribute the content as part of the Service.</p>\r\n<p data-start=\"2322\" data-end=\"2494\">You are solely responsible for the User Content you provide and agree not to submit content that violates any intellectual property rights, laws, or any third-party rights.</p>\r\n<h3 data-start=\"2496\" data-end=\"2514\">6. <strong data-start=\"2503\" data-end=\"2514\">Privacy</strong></h3>\r\n<p data-start=\"2515\" data-end=\"2764\">We respect your privacy. Our collection, use, and sharing of personal information are governed by our Privacy Policy, which is incorporated into these Terms of Use by reference. Please review our Privacy Policy to understand how we handle your data.</p>\r\n<h3 data-start=\"2766\" data-end=\"2798\">7. <strong data-start=\"2773\" data-end=\"2798\">Prohibited Activities</strong></h3>\r\n<p data-start=\"2799\" data-end=\"2858\">You agree not to engage in any of the following activities:</p>\r\n<ul data-start=\"2860\" data-end=\"3233\">\r\n<li data-start=\"2860\" data-end=\"2987\">\r\n<p data-start=\"2862\" data-end=\"2987\">Impersonating any person or entity, or falsely stating or otherwise misrepresenting your affiliation with a person or entity.</p>\r\n</li>\r\n<li data-start=\"2988\" data-end=\"3081\">\r\n<p data-start=\"2990\" data-end=\"3081\">Interfering with or disrupting the Service or servers or networks connected to the Service.</p>\r\n</li>\r\n<li data-start=\"3082\" data-end=\"3134\">\r\n<p data-start=\"3084\" data-end=\"3134\">Uploading viruses, malware, or other harmful code.</p>\r\n</li>\r\n<li data-start=\"3135\" data-end=\"3233\">\r\n<p data-start=\"3137\" data-end=\"3233\">Engaging in data mining, scraping, or extracting content from the Service without authorization.</p>\r\n</li>\r\n</ul>\r\n<h3 data-start=\"3235\" data-end=\"3257\">8. <strong data-start=\"3242\" data-end=\"3257\">Termination</strong></h3>\r\n<p data-start=\"3258\" data-end=\"3430\">We may suspend or terminate your access to the Service at our sole discretion, without notice, for any reason, including if we believe you have violated these Terms of Use.</p>\r\n<h3 data-start=\"3432\" data-end=\"3454\">9. <strong data-start=\"3439\" data-end=\"3454\">Disclaimers</strong></h3>\r\n<p data-start=\"3455\" data-end=\"3645\">The Service is provided “as is” and “as available” without warranties of any kind, either express or implied. We do not warrant that the Service will be error-free, secure, or uninterrupted.</p>\r\n<h3 data-start=\"3647\" data-end=\"3682\">10. <strong data-start=\"3655\" data-end=\"3682\">Limitation of Liability</strong></h3>\r\n<p data-start=\"3683\" data-end=\"3893\">To the maximum extent permitted by law, [Your Company Name] will not be liable for any direct, indirect, incidental, special, or consequential damages arising out of your use of or inability to use the Service.</p>\r\n<h3 data-start=\"3895\" data-end=\"3922\">11. <strong data-start=\"3903\" data-end=\"3922\">Indemnification</strong></h3>\r\n<p data-start=\"3923\" data-end=\"4186\">You agree to indemnify and hold [Your Company Name] and its affiliates, officers, employees, and agents harmless from any claims, losses, liabilities, and expenses (including legal fees) arising out of your use of the Service or your breach of these Terms of Use.</p>\r\n<h3 data-start=\"4188\" data-end=\"4220\">12. <strong data-start=\"4196\" data-end=\"4220\">Changes to the Terms</strong></h3>\r\n<p data-start=\"4221\" data-end=\"4525\">We reserve the right to modify, update, or change these Terms of Use at any time. We will provide notice of any material changes by updating the effective date at the top of this page. Your continued use of the Service after the effective date of any changes constitutes your acceptance of those changes.</p>\r\n<h3 data-start=\"4527\" data-end=\"4552\">13. <strong data-start=\"4535\" data-end=\"4552\">Governing Law</strong></h3>\r\n<p data-start=\"4553\" data-end=\"4708\">These Terms of Use will be governed by and construed in accordance with the laws of the state of [State], without regard to its conflict of law principles.</p>\r\n<h3 data-start=\"4710\" data-end=\"4740\">14. <strong data-start=\"4718\" data-end=\"4740\">Dispute Resolution</strong></h3>\r\n<p data-start=\"4741\" data-end=\"5058\">Any disputes or claims arising from or related to these Terms of Use or the Service shall be resolved through binding arbitration in [Location], in accordance with the rules of [Arbitration Organization], and judgment on the award rendered by the arbitrator(s) may be entered in any court having jurisdiction thereof.</p>\r\n<h3 data-start=\"5060\" data-end=\"5082\">15. <strong data-start=\"5068\" data-end=\"5082\">Contact Us</strong></h3>\r\n<p data-start=\"5083\" data-end=\"5156\">If you have any questions about these Terms of Use, please contact us at:<br></p><p data-start=\"5158\" data-end=\"5224\"><br></p>        ', 15, 'Published', ''),
(100, 'Data Privacy', 'data+privacy', '/uploads/featured-images/100-20251215205645.jpeg', 'Administrative', 'Data Privacy', 1, 'Erfel Contiga Suriaga', '', '2025-12-01 20:04:42', '2025-12-23 20:49:36', '2025-12-01 20:04:44', 'This our data privacy page...', 1, 'Published', ''),
(101, 'About Us', 'about+us', '/uploads/featured-images/101-20251215205524.jpeg', 'Administrative', 'About Us', 1, 'Erfel Contiga Suriaga', '', '2025-12-01 20:05:29', '2025-12-16 14:10:36', '2025-12-01 20:05:30', '            <p>xgfgfdhdhdh ggggg bgg<br>fgfh&nbsp;<br>ggj<br><br></p>', 46, 'Unpublished', ''),
(107, 'vnvjhj', 'vnvjhj', '/uploads/featured-images/107-20251207124502.jpeg', 'News', 'hjhgjgj', 18, 'Erfel  Printing', '', '2025-12-07 12:44:53', '2025-12-14 14:54:52', '2025-12-07 12:45:05', 'jghj', 1, 'Waiting for Update', ''),
(115, 'gdfgg', 'gdfgg', '/uploads/featured-images/115-20251214151347.jpeg', 'Opinion', 'fdhfdh', 1, 'Erfel  Suriaga', '1', '2025-12-11 12:20:45', '2025-12-19 19:47:52', '2025-12-11 13:24:47', '            fghgfhfhfhfdh          ', 21, 'Unpublished', 'dsfdsgdsgsdgdgg gggggghhhh'),
(117, 'fdgfdhfdhfdh', 'fdgfdhfdhfdh', '/uploads/featured-images/117-20251213213112.jpeg', 'News', 'ghghfhgh', 1, 'Erfel  Suriaga', '', '2025-12-13 21:30:53', '2025-12-19 19:48:04', '2025-12-13 21:31:16', 'ghgfhfghgfhgfhgffgjgfjgf', 1, 'Unpublished', ''),
(119, 'dsgfdhgfjhgjhg', 'dsgfdhgfjhgjhg', '/uploads/featured-images/119-20251213215545.jpeg', 'Tutorial', 'jhgkhkjhkjk', 1, 'Erfel  Suriaga', '', '2025-12-13 21:55:30', '2025-12-19 19:53:07', '2025-12-13 21:56:15', '            <p style=\"margin-top: 0.5em; margin-bottom: 1em; color: rgb(32, 33, 34); font-family: sans-serif; font-size: 16px;\"><i><b>The New York Times</b></i> (<i><b>NYT</b></i>)<sup id=\"cite_ref-5\" class=\"reference\" style=\"line-height: 1; unicode-bidi: isolate; text-wrap-mode: nowrap; font-size: 12.8px;\"><a href=\"https://en.wikipedia.org/wiki/The_New_York_Times#cite_note-5\" style=\"color: rgb(51, 102, 204); background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; border-radius: 2px; overflow-wrap: break-word;\"><span class=\"cite-bracket\">[</span>b<span class=\"cite-bracket\">]</span></a></sup> is a newspaper based in <a href=\"https://en.wikipedia.org/wiki/Manhattan\" title=\"Manhattan\" style=\"color: rgb(51, 102, 204); background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; border-radius: 2px; overflow-wrap: break-word;\">Manhattan</a>, New York City. <i>The New York Times</i> covers domestic, national, and international news, and publishes opinion pieces and reviews. As one of the longest-running newspapers in the United States, the <i>Times</i> serves as one of the country\'s <a href=\"https://en.wikipedia.org/wiki/Newspaper_of_record\" title=\"Newspaper of record\" style=\"color: rgb(51, 102, 204); background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; border-radius: 2px; overflow-wrap: break-word;\">newspapers of record</a>. As of August 2025, <i>The New York Times</i> had 11.88 million total and 11.3 million online subscribers, both by significant margins the <a href=\"https://en.wikipedia.org/wiki/List_of_newspapers_in_the_United_States\" title=\"List of newspapers in the United States\" style=\"color: rgb(51, 102, 204); background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; border-radius: 2px; overflow-wrap: break-word;\">highest numbers for any newspaper in the United States</a>; the total also included 580,000 print subscribers. <i>The New York Times</i> is published by <a href=\"https://en.wikipedia.org/wiki/The_New_York_Times_Company\" title=\"The New York Times Company\" style=\"color: rgb(51, 102, 204); background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; border-radius: 2px; overflow-wrap: break-word;\">the New York Times Company</a>; since 1896, the company has been chaired by the Ochs-Sulzberger family, whose current chairman and the paper\'s publisher is <a href=\"https://en.wikipedia.org/wiki/A._G._Sulzberger\" title=\"A. G. Sulzberger\" style=\"color: rgb(51, 102, 204); background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; border-radius: 2px; overflow-wrap: break-word;\">A. G. Sulzberger</a>. The <i>Times</i> is headquartered at <a href=\"https://en.wikipedia.org/wiki/The_New_York_Times_Building\" title=\"The New York Times Building\" style=\"color: rgb(51, 102, 204); background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; border-radius: 2px; overflow-wrap: break-word;\">The New York Times Building</a> in <a href=\"https://en.wikipedia.org/wiki/Midtown_Manhattan\" title=\"Midtown Manhattan\" style=\"color: rgb(51, 102, 204); background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; border-radius: 2px; overflow-wrap: break-word;\">Midtown Manhattan</a>.</p><p style=\"margin-top: 0.5em; margin-bottom: 1em; color: rgb(32, 33, 34); font-family: sans-serif; font-size: 16px;\">The <i>Times</i> was founded as the conservative <i>New-York Daily Times</i> in 1851, and came to national recognition in the 1870s with its aggressive coverage of corrupt politician <a href=\"https://en.wikipedia.org/wiki/William_M._Tweed\" title=\"William M. Tweed\" style=\"color: rgb(51, 102, 204); background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; border-radius: 2px; overflow-wrap: break-word;\">Boss Tweed</a>. Following the <a href=\"https://en.wikipedia.org/wiki/Panic_of_1893\" title=\"Panic of 1893\" style=\"color: rgb(51, 102, 204); background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; border-radius: 2px; overflow-wrap: break-word;\">Panic of 1893</a>, <i><a href=\"https://en.wikipedia.org/wiki/Chattanooga_Times\" class=\"mw-redirect\" title=\"Chattanooga Times\" style=\"color: rgb(51, 102, 204); background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; border-radius: 2px; overflow-wrap: break-word;\">Chattanooga Times</a></i> publisher <a href=\"https://en.wikipedia.org/wiki/Adolph_Ochs\" title=\"Adolph Ochs\" style=\"color: rgb(51, 102, 204); background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; border-radius: 2px; overflow-wrap: break-word;\">Adolph Ochs</a> gained a controlling interest in the company. In 1935, Ochs was succeeded by his son-in-law, <a href=\"https://en.wikipedia.org/wiki/Arthur_Hays_Sulzberger\" title=\"Arthur Hays Sulzberger\" style=\"color: rgb(51, 102, 204); background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; border-radius: 2px; overflow-wrap: break-word;\">Arthur Hays Sulzberger</a>, who began a push into European news. Sulzberger\'s son <a href=\"https://en.wikipedia.org/wiki/Arthur_Ochs_Sulzberger\" title=\"Arthur Ochs Sulzberger\" style=\"color: rgb(51, 102, 204); background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; border-radius: 2px; overflow-wrap: break-word;\">Arthur Ochs Sulzberger</a> became publisher in 1963, adapting to a changing newspaper industry and introducing radical changes. <i>The New York Times</i> was involved in the landmark 1964 <a href=\"https://en.wikipedia.org/wiki/Supreme_Court_of_the_United_States\" title=\"Supreme Court of the United States\" style=\"color: rgb(51, 102, 204); background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; border-radius: 2px; overflow-wrap: break-word;\">U.S. Supreme Court</a> case <i><a href=\"https://en.wikipedia.org/wiki/New_York_Times_Co._v._Sullivan\" title=\"New York Times Co. v. Sullivan\" style=\"color: rgb(51, 102, 204); background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; border-radius: 2px; overflow-wrap: break-word;\">New York Times Co. v. Sullivan</a></i>, which restricted the ability of public officials to sue the media for <a href=\"https://en.wikipedia.org/wiki/Defamation\" title=\"Defamation\" style=\"color: rgb(51, 102, 204); background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; border-radius: 2px; overflow-wrap: break-word;\">defamation</a>.</p>        ', 2, 'Unpublished', ''),
(120, 'chgfghg', 'chgfghg', '', 'Trivia', 'hgfhgfh', 1, 'Erfel  Suriaga', '1', '2025-12-14 14:57:29', '2025-12-14 15:50:56', '2025-12-14 14:57:39', 'gfhgfjgfjfgjj', 1, 'Waiting for Update', ''),
(121, 'fgfdhgfh', 'fgfdhgfh', '/uploads/featured-images/121-20251214153518.jpeg', 'News', 'dhgfhgf', 1, 'Erfel  Suriaga', '1', '2025-12-14 15:35:06', '2025-12-14 15:51:55', '2025-12-14 15:37:32', 'gfgfgfjj', 1, 'Waiting for Update', 'dfdfgfhgfjhhj'),
(122, 'dgfdgfdgfdg', 'dgfdgfdgfdg', '', 'Tutorial', 'fhfdhfh', 18, 'Erfel  Printing', '1', '2025-12-14 16:05:16', '2025-12-14 16:05:37', '2025-12-14 16:05:18', 'fhfdhfdhfdhfdhfdh', 1, 'Waiting for Update', ''),
(123, 'ghgvjgjhg', 'ghgvjgjhg', '/uploads/featured-images/123-20251215221723.jpeg', 'Trivia', 'fgfgfg', 1, 'Erfel  Suriaga', '', '2025-12-15 22:17:14', '2025-12-15 23:09:38', '2025-12-15 23:09:38', '            fdgfdgfdgdgg ggg        ', 4, 'Waiting for Update', ''),
(124, 'dfgfdgfdgfg', 'dfgfdgfdgfg', '', 'Tutorial', 'fbdfhfd', 1, 'Erfel  Suriaga', '', '2025-12-16 11:07:16', '2025-12-16 11:22:33', '0000-00-00 00:00:00', '            hfhhfdh ffff        ', 3, 'Draft', ''),
(125, 'dffdhfh', 'dffdhfh', '', 'Tutorial', 'gj', 1, 'Erfel  Suriaga', '', '2025-12-16 11:54:13', '2025-12-16 12:23:03', '0000-00-00 00:00:00', '                    ', 22, 'Draft', ''),
(126, 'dgfdg', 'dgfdg', '', 'Trivia', 'ghgfhgf', 1, 'Erfel  Suriaga', '', '2025-12-16 12:36:35', '2025-12-16 13:01:10', '2025-12-16 13:01:10', '            gjhhghgjhgj hhhhh gggggg        ', 10, 'Waiting for Update', ''),
(127, 'gfdgfgfd', 'gfdgfgfd', '', 'Opinion', 'zdfddsg', 1, 'Erfel  Suriaga', '', '2025-12-16 14:12:25', '2025-12-16 14:12:25', '0000-00-00 00:00:00', '                                    fggfgsg                        ', 1, 'Draft', ''),
(128, 'sdfdsfds', 'sdfdsfds', '', 'Tutorial', 'fdgsgsdg', 1, 'Erfel  Suriaga', '', '2025-12-16 14:17:48', '2025-12-16 14:17:48', '0000-00-00 00:00:00', '                                                            fdgdfhfh                                        ', 1, 'Draft', ''),
(129, 'gjgfjfj', 'gjgfjfj', '', 'Tutorial', 'vcfgh', 1, 'Erfel  Suriaga', '', '2025-12-16 14:19:07', '2025-12-16 14:20:38', '0000-00-00 00:00:00', '            <p>            jghjghg gggg<br></p><p><br></p>        ', 4, 'Draft', ''),
(130, 'The Forces of Ecosystem Evolution', 'the+forces+of+ecosystem+evolution', '/uploads/featured-images/130-20251216175442.jpeg', 'Trivia', 'Ecosytem', 1, 'Erfel  Suriaga', '', '2025-12-16 16:15:39', '2025-12-27 15:53:20', '2025-12-16 16:17:41', '            <p>This article introduces the forces and related dynamics of ecosystem\r\nevolution. An ecosystem is “a group of autonomous firms and individuals whose actions, decisions, and investments are complementary in the sense that their value as a system is greater than the\r\nsum of the values of the separate parts.”1 Ecosystems as organizational forms—\r\nan alternative to firms and markets—are enabled by the design of modular technological systems.2 System modularization reduces the need for tight control<br>and coordination, and it simplifies the coordination of innovation across firm\r\nboundaries. <br><br><br><iframe frameborder=\"0\" src=\"//www.youtube.com/embed/1XfkVva5p2Q\" width=\"640\" height=\"360\" class=\"note-video-clip\"></iframe><br>\r\n<br><br>Ecosystems first came to the attention of managers and management scholars in the 1990s and early 2000s. Beginning with the IBM PC in 1981, the success\r\nand rapid pace of innovation in the computer industry showcased the power of\r\nmodular technical systems in combination with managed business ecosystems.3\r\nThe value of this business model has been validated by a number of hugely successful firms who have prospered from participating in and controlling ecosystems. Today an increasing number of firms are looking to grow the ecosystems\r\nthey are involved in, especially as technologies from the computer industry are\r\ndiffusing through the rest of the economy.<br><br>However, ecosystems are not a one-size-fits-all solution that can be easily\r\ndesigned and set up by any group of firms. On the contrary, sustainable ecosystems are the result of a delicate balance between, on the one hand, forces that\r\npush economic activities toward integration into a single corporation and, on the\r\nother hand, forces that pull economic activities out onto the market. We call these\r\nforces centripetal and centrifugal forces, respectively, following recent work by\r\none of the authors.In explaining how these forces work, we draw specifically on\r\nthe economic theory of complementarities between different components of a\r\ntechnical system.<br><br>The forces affecting ecosystem structure change over time. Due to these\r\ndynamics, ecosystems are seldom stable but often in a state of flux.7 With this\r\narticle, we want to explain how centripetal and centrifugal forces shape ecosystem structure and influence ecosystem evolution. Both technological innovations\r\nand new styles of management may shift the balance between centripetal and centrifugal forces in all or part of an ecosystem.\r\n<br><br>First, technological innovations enable and are enabled by ecosystems.\r\nNew technologies may affect a single component in a larger technical system,\r\ncausing the component to become commoditized or generalized. They may affect\r\na group of components, as happens when critical interfaces become standardized.\r\nOr they may affect the whole system, causing the ecosystem to expand, contract,\r\nor, in some cases, collapse. On top of that, a modularized system in itself reduces\r\nthe cost of experimentation and customization, thus increasing the value of new\r\ntechnologies.8 Modularization also allows multiple actors with different capabilities to contribute innovations that can then be combined to create new value\r\npropositions.<br><br>Second, new management techniques affect the costs of coordination in ecosystems.10 For example, novel ways of contracting may reduce the need for control\r\nthrough ownership and open up possibilities to organize activities in ecosystems\r\nrather than within firms.11 Furthermore, new ways of managing within a firm can\r\nincrease the level of collaboration across organization boundaries.\r\n12 In this article, we\r\ndraw from our understanding of organizing and managing open innovation13 to\r\nexplain how managerial developments lead to ecosystem evolution.<br><br>In the remainder of this article we introduce the sources of centripetal and\r\ncentrifugal forces, respectively. We explain how ecosystem evolution is caused by\r\nthe dynamics of technology as well as by new developments in management and\r\ncoordination. We then describe several instances where technical and managerial\r\ndynamics were interdependent and both contributed to ecosystem evolution. We\r\nend by discussing how managers can plan for and/or guide ecosystem evolution.\r\nThroughout, we illustrate our argument with well-documented empirical examples, including cases presented in the other articles in this Special Section of\r\nCalifornia Management Review, all of which were initially presented at the seventh\r\nannual World Open Innovation Conference in December 2020.<br>                    </p>        ', 5, 'Unpublished', '');

-- --------------------------------------------------------

--
-- Table structure for table `writer_article_versions`
--

CREATE TABLE `writer_article_versions` (
  `writer_articleVersionId` int(11) NOT NULL,
  `writer_articleVersionTimestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `writer_articleVersionForeignId` int(11) NOT NULL,
  `writer_articleVersionNumber` int(11) NOT NULL,
  `writer_articleVersionContent` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `writer_article_versions`
--

INSERT INTO `writer_article_versions` (`writer_articleVersionId`, `writer_articleVersionTimestamp`, `writer_articleVersionForeignId`, `writer_articleVersionNumber`, `writer_articleVersionContent`) VALUES
(28, '2025-12-01 12:04:42', 100, 1, 'This our data privacy page...'),
(38, '2025-12-07 04:44:53', 107, 1, 'jghj'),
(484, '2025-12-11 04:26:23', 115, 18, '            fghgfhfhfhfdh        '),
(485, '2025-12-11 04:26:23', 115, 18, '            fghgfhfhfhfdh        '),
(503, '2025-12-13 13:30:53', 117, 1, 'ghgfhfghgfhgfhgffgjgfjgf'),
(506, '2025-12-13 13:55:30', 119, 1, '<p style=\"margin-top: 0.5em; margin-bottom: 1em; color: rgb(32, 33, 34); font-family: sans-serif; font-size: 16px;\"><i><b>The New York Times</b></i>&nbsp;(<i><b>NYT</b></i>)<sup id=\"cite_ref-5\" class=\"reference\" style=\"line-height: 1; unicode-bidi: isolate; text-wrap-mode: nowrap; font-size: 12.8px;\"><a href=\"https://en.wikipedia.org/wiki/The_New_York_Times#cite_note-5\" style=\"color: rgb(51, 102, 204); background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; border-radius: 2px; overflow-wrap: break-word;\"><span class=\"cite-bracket\">[</span>b<span class=\"cite-bracket\">]</span></a></sup>&nbsp;is a newspaper based in&nbsp;<a href=\"https://en.wikipedia.org/wiki/Manhattan\" title=\"Manhattan\" style=\"color: rgb(51, 102, 204); background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; border-radius: 2px; overflow-wrap: break-word;\">Manhattan</a>, New York City.&nbsp;<i>The New York Times</i>&nbsp;covers domestic, national, and international news, and publishes opinion pieces and reviews. As one of the longest-running newspapers in the United States, the&nbsp;<i>Times</i>&nbsp;serves as one of the country\'s&nbsp;<a href=\"https://en.wikipedia.org/wiki/Newspaper_of_record\" title=\"Newspaper of record\" style=\"color: rgb(51, 102, 204); background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; border-radius: 2px; overflow-wrap: break-word;\">newspapers of record</a>. As of August&nbsp;2025,&nbsp;<i>The New York Times</i>&nbsp;had 11.88 million total and 11.3 million online subscribers, both by significant margins the&nbsp;<a href=\"https://en.wikipedia.org/wiki/List_of_newspapers_in_the_United_States\" title=\"List of newspapers in the United States\" style=\"color: rgb(51, 102, 204); background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; border-radius: 2px; overflow-wrap: break-word;\">highest numbers for any newspaper in the United States</a>; the total also included 580,000 print subscribers.&nbsp;<i>The New York Times</i>&nbsp;is published by&nbsp;<a href=\"https://en.wikipedia.org/wiki/The_New_York_Times_Company\" title=\"The New York Times Company\" style=\"color: rgb(51, 102, 204); background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; border-radius: 2px; overflow-wrap: break-word;\">the New York Times Company</a>; since 1896, the company has been chaired by the Ochs-Sulzberger family, whose current chairman and the paper\'s publisher is&nbsp;<a href=\"https://en.wikipedia.org/wiki/A._G._Sulzberger\" title=\"A. G. Sulzberger\" style=\"color: rgb(51, 102, 204); background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; border-radius: 2px; overflow-wrap: break-word;\">A. G. Sulzberger</a>. The&nbsp;<i>Times</i>&nbsp;is headquartered at&nbsp;<a href=\"https://en.wikipedia.org/wiki/The_New_York_Times_Building\" title=\"The New York Times Building\" style=\"color: rgb(51, 102, 204); background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; border-radius: 2px; overflow-wrap: break-word;\">The New York Times Building</a>&nbsp;in&nbsp;<a href=\"https://en.wikipedia.org/wiki/Midtown_Manhattan\" title=\"Midtown Manhattan\" style=\"color: rgb(51, 102, 204); background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; border-radius: 2px; overflow-wrap: break-word;\">Midtown Manhattan</a>.</p><p style=\"margin-top: 0.5em; margin-bottom: 1em; color: rgb(32, 33, 34); font-family: sans-serif; font-size: 16px;\">The&nbsp;<i>Times</i>&nbsp;was founded as the conservative&nbsp;<i>New-York Daily Times</i>&nbsp;in 1851, and came to national recognition in the 1870s with its aggressive coverage of corrupt politician&nbsp;<a href=\"https://en.wikipedia.org/wiki/William_M._Tweed\" title=\"William M. Tweed\" style=\"color: rgb(51, 102, 204); background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; border-radius: 2px; overflow-wrap: break-word;\">Boss Tweed</a>. Following the&nbsp;<a href=\"https://en.wikipedia.org/wiki/Panic_of_1893\" title=\"Panic of 1893\" style=\"color: rgb(51, 102, 204); background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; border-radius: 2px; overflow-wrap: break-word;\">Panic of 1893</a>,&nbsp;<i><a href=\"https://en.wikipedia.org/wiki/Chattanooga_Times\" class=\"mw-redirect\" title=\"Chattanooga Times\" style=\"color: rgb(51, 102, 204); background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; border-radius: 2px; overflow-wrap: break-word;\">Chattanooga Times</a></i>&nbsp;publisher&nbsp;<a href=\"https://en.wikipedia.org/wiki/Adolph_Ochs\" title=\"Adolph Ochs\" style=\"color: rgb(51, 102, 204); background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; border-radius: 2px; overflow-wrap: break-word;\">Adolph Ochs</a>&nbsp;gained a controlling interest in the company. In 1935, Ochs was succeeded by his son-in-law,&nbsp;<a href=\"https://en.wikipedia.org/wiki/Arthur_Hays_Sulzberger\" title=\"Arthur Hays Sulzberger\" style=\"color: rgb(51, 102, 204); background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; border-radius: 2px; overflow-wrap: break-word;\">Arthur Hays Sulzberger</a>, who began a push into European news. Sulzberger\'s son&nbsp;<a href=\"https://en.wikipedia.org/wiki/Arthur_Ochs_Sulzberger\" title=\"Arthur Ochs Sulzberger\" style=\"color: rgb(51, 102, 204); background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; border-radius: 2px; overflow-wrap: break-word;\">Arthur Ochs Sulzberger</a>&nbsp;became publisher in 1963, adapting to a changing newspaper industry and introducing radical changes.&nbsp;<i>The New York Times</i>&nbsp;was involved in the landmark 1964&nbsp;<a href=\"https://en.wikipedia.org/wiki/Supreme_Court_of_the_United_States\" title=\"Supreme Court of the United States\" style=\"color: rgb(51, 102, 204); background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; border-radius: 2px; overflow-wrap: break-word;\">U.S. Supreme Court</a>&nbsp;case&nbsp;<i><a href=\"https://en.wikipedia.org/wiki/New_York_Times_Co._v._Sullivan\" title=\"New York Times Co. v. Sullivan\" style=\"color: rgb(51, 102, 204); background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; border-radius: 2px; overflow-wrap: break-word;\">New York Times Co. v. Sullivan</a></i>, which restricted the ability of public officials to sue the media for&nbsp;<a href=\"https://en.wikipedia.org/wiki/Defamation\" title=\"Defamation\" style=\"color: rgb(51, 102, 204); background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; border-radius: 2px; overflow-wrap: break-word;\">defamation</a>.</p>'),
(507, '2025-12-13 13:56:07', 119, 2, '            <p style=\"margin-top: 0.5em; margin-bottom: 1em; color: rgb(32, 33, 34); font-family: sans-serif; font-size: 16px;\"><i><b>The New York Times</b></i> (<i><b>NYT</b></i>)<sup id=\"cite_ref-5\" class=\"reference\" style=\"line-height: 1; unicode-bidi: isolate; text-wrap-mode: nowrap; font-size: 12.8px;\"><a href=\"https://en.wikipedia.org/wiki/The_New_York_Times#cite_note-5\" style=\"color: rgb(51, 102, 204); background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; border-radius: 2px; overflow-wrap: break-word;\"><span class=\"cite-bracket\">[</span>b<span class=\"cite-bracket\">]</span></a></sup> is a newspaper based in <a href=\"https://en.wikipedia.org/wiki/Manhattan\" title=\"Manhattan\" style=\"color: rgb(51, 102, 204); background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; border-radius: 2px; overflow-wrap: break-word;\">Manhattan</a>, New York City. <i>The New York Times</i> covers domestic, national, and international news, and publishes opinion pieces and reviews. As one of the longest-running newspapers in the United States, the <i>Times</i> serves as one of the country\'s <a href=\"https://en.wikipedia.org/wiki/Newspaper_of_record\" title=\"Newspaper of record\" style=\"color: rgb(51, 102, 204); background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; border-radius: 2px; overflow-wrap: break-word;\">newspapers of record</a>. As of August 2025, <i>The New York Times</i> had 11.88 million total and 11.3 million online subscribers, both by significant margins the <a href=\"https://en.wikipedia.org/wiki/List_of_newspapers_in_the_United_States\" title=\"List of newspapers in the United States\" style=\"color: rgb(51, 102, 204); background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; border-radius: 2px; overflow-wrap: break-word;\">highest numbers for any newspaper in the United States</a>; the total also included 580,000 print subscribers. <i>The New York Times</i> is published by <a href=\"https://en.wikipedia.org/wiki/The_New_York_Times_Company\" title=\"The New York Times Company\" style=\"color: rgb(51, 102, 204); background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; border-radius: 2px; overflow-wrap: break-word;\">the New York Times Company</a>; since 1896, the company has been chaired by the Ochs-Sulzberger family, whose current chairman and the paper\'s publisher is <a href=\"https://en.wikipedia.org/wiki/A._G._Sulzberger\" title=\"A. G. Sulzberger\" style=\"color: rgb(51, 102, 204); background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; border-radius: 2px; overflow-wrap: break-word;\">A. G. Sulzberger</a>. The <i>Times</i> is headquartered at <a href=\"https://en.wikipedia.org/wiki/The_New_York_Times_Building\" title=\"The New York Times Building\" style=\"color: rgb(51, 102, 204); background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; border-radius: 2px; overflow-wrap: break-word;\">The New York Times Building</a> in <a href=\"https://en.wikipedia.org/wiki/Midtown_Manhattan\" title=\"Midtown Manhattan\" style=\"color: rgb(51, 102, 204); background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; border-radius: 2px; overflow-wrap: break-word;\">Midtown Manhattan</a>.</p><p style=\"margin-top: 0.5em; margin-bottom: 1em; color: rgb(32, 33, 34); font-family: sans-serif; font-size: 16px;\">The <i>Times</i> was founded as the conservative <i>New-York Daily Times</i> in 1851, and came to national recognition in the 1870s with its aggressive coverage of corrupt politician <a href=\"https://en.wikipedia.org/wiki/William_M._Tweed\" title=\"William M. Tweed\" style=\"color: rgb(51, 102, 204); background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; border-radius: 2px; overflow-wrap: break-word;\">Boss Tweed</a>. Following the <a href=\"https://en.wikipedia.org/wiki/Panic_of_1893\" title=\"Panic of 1893\" style=\"color: rgb(51, 102, 204); background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; border-radius: 2px; overflow-wrap: break-word;\">Panic of 1893</a>, <i><a href=\"https://en.wikipedia.org/wiki/Chattanooga_Times\" class=\"mw-redirect\" title=\"Chattanooga Times\" style=\"color: rgb(51, 102, 204); background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; border-radius: 2px; overflow-wrap: break-word;\">Chattanooga Times</a></i> publisher <a href=\"https://en.wikipedia.org/wiki/Adolph_Ochs\" title=\"Adolph Ochs\" style=\"color: rgb(51, 102, 204); background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; border-radius: 2px; overflow-wrap: break-word;\">Adolph Ochs</a> gained a controlling interest in the company. In 1935, Ochs was succeeded by his son-in-law, <a href=\"https://en.wikipedia.org/wiki/Arthur_Hays_Sulzberger\" title=\"Arthur Hays Sulzberger\" style=\"color: rgb(51, 102, 204); background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; border-radius: 2px; overflow-wrap: break-word;\">Arthur Hays Sulzberger</a>, who began a push into European news. Sulzberger\'s son <a href=\"https://en.wikipedia.org/wiki/Arthur_Ochs_Sulzberger\" title=\"Arthur Ochs Sulzberger\" style=\"color: rgb(51, 102, 204); background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; border-radius: 2px; overflow-wrap: break-word;\">Arthur Ochs Sulzberger</a> became publisher in 1963, adapting to a changing newspaper industry and introducing radical changes. <i>The New York Times</i> was involved in the landmark 1964 <a href=\"https://en.wikipedia.org/wiki/Supreme_Court_of_the_United_States\" title=\"Supreme Court of the United States\" style=\"color: rgb(51, 102, 204); background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; border-radius: 2px; overflow-wrap: break-word;\">U.S. Supreme Court</a> case <i><a href=\"https://en.wikipedia.org/wiki/New_York_Times_Co._v._Sullivan\" title=\"New York Times Co. v. Sullivan\" style=\"color: rgb(51, 102, 204); background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; border-radius: 2px; overflow-wrap: break-word;\">New York Times Co. v. Sullivan</a></i>, which restricted the ability of public officials to sue the media for <a href=\"https://en.wikipedia.org/wiki/Defamation\" title=\"Defamation\" style=\"color: rgb(51, 102, 204); background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; border-radius: 2px; overflow-wrap: break-word;\">defamation</a>.</p>        '),
(508, '2025-12-14 06:57:29', 120, 1, 'gfhgfjgfjfgjj'),
(509, '2025-12-14 07:35:06', 121, 1, 'gfgfgfjj'),
(510, '2025-12-14 08:05:16', 122, 1, 'fhfdhfdhfdhfdhfdh'),
(511, '2025-12-14 09:18:34', 115, 19, '            fghgfhfhfhfdh        '),
(512, '2025-12-14 09:20:29', 115, 20, '            fghgfhfhfhfdh&nbsp;&nbsp;'),
(513, '2025-12-14 09:22:10', 115, 21, '            fghgfhfhfhfdh          '),
(516, '2025-12-14 10:54:32', 99, 11, '            <p data-start=\"234\" data-end=\"250\"><strong data-start=\"234\" data-end=\"250\">Terms of Use</strong></p>\r\n<p data-start=\"252\" data-end=\"278\"><strong data-start=\"252\" data-end=\"278\">Effective Date: [Date]</strong></p>\r\n<p data-start=\"280\" data-end=\"591\">Welcome to [Your Web App Name] (the “Service”), provided by [Your Company Name] (“we”, “us”, or “our”). By accessing or using our website and web application (the \"App\"), you agree to comply with and be bound by these Terms of Use (the \"Agreement\"). If you do not agree with these terms, do not use the Service.</p><h3 data-start=\"593\" data-end=\"623\">1. <strong data-start=\"600\" data-end=\"623\">Acceptance of Terms</strong></h3>\r\n<p data-start=\"624\" data-end=\"928\">By accessing or using the Service, you agree to these Terms of Use, as well as any additional terms, conditions, or policies that may apply to specific features or services available through the Service. If you do not agree to any of these terms, you must immediately discontinue your use of the Service.</p>\r\n<h3 data-start=\"930\" data-end=\"952\">2. <strong data-start=\"937\" data-end=\"952\">Eligibility</strong></h3>\r\n<p data-start=\"953\" data-end=\"1143\">You must be at least [18] years of age (or the legal age of majority in your jurisdiction) to use the Service. By using the Service, you represent and warrant that you are eligible to do so.</p>\r\n<h3 data-start=\"1145\" data-end=\"1176\">3. <strong data-start=\"1152\" data-end=\"1176\">Account Registration</strong></h3>\r\n<p data-start=\"1177\" data-end=\"1561\">To access certain features of the Service, you may be required to create an account. You agree to provide accurate, current, and complete information during the registration process and to update your information to keep it accurate and complete. You are responsible for maintaining the confidentiality of your account credentials and for all activities that occur under your account.</p>\r\n<h3 data-start=\"1563\" data-end=\"1592\">4. <strong data-start=\"1570\" data-end=\"1592\">Use of the Service</strong></h3>\r\n<p data-start=\"1593\" data-end=\"1812\">You agree to use the Service in accordance with all applicable local, state, and international laws. You are solely responsible for your conduct and any data or content you upload, post, or transmit through the Service.</p>\r\n<ul data-start=\"1814\" data-end=\"2041\">\r\n<li data-start=\"1814\" data-end=\"1910\">\r\n<p data-start=\"1816\" data-end=\"1910\">You agree not to use the Service for any unlawful, harmful, fraudulent, or malicious purposes.</p>\r\n</li>\r\n<li data-start=\"1911\" data-end=\"2041\">\r\n<p data-start=\"1913\" data-end=\"2041\">You will not attempt to gain unauthorized access to any part of the Service or any systems or networks connected to the Service.</p>\r\n</li>\r\n</ul>\r\n<h3 data-start=\"2043\" data-end=\"2066\">5. <strong data-start=\"2050\" data-end=\"2066\">User Content</strong></h3>\r\n<p data-start=\"2067\" data-end=\"2320\">You may be allowed to upload, submit, or transmit content through the Service (\"User Content\"). By submitting User Content, you grant us a non-exclusive, worldwide, royalty-free license to use, display, and distribute the content as part of the Service.</p>\r\n<p data-start=\"2322\" data-end=\"2494\">You are solely responsible for the User Content you provide and agree not to submit content that violates any intellectual property rights, laws, or any third-party rights.</p>\r\n<h3 data-start=\"2496\" data-end=\"2514\">6. <strong data-start=\"2503\" data-end=\"2514\">Privacy</strong></h3>\r\n<p data-start=\"2515\" data-end=\"2764\">We respect your privacy. Our collection, use, and sharing of personal information are governed by our Privacy Policy, which is incorporated into these Terms of Use by reference. Please review our Privacy Policy to understand how we handle your data.</p>\r\n<h3 data-start=\"2766\" data-end=\"2798\">7. <strong data-start=\"2773\" data-end=\"2798\">Prohibited Activities</strong></h3>\r\n<p data-start=\"2799\" data-end=\"2858\">You agree not to engage in any of the following activities:</p>\r\n<ul data-start=\"2860\" data-end=\"3233\">\r\n<li data-start=\"2860\" data-end=\"2987\">\r\n<p data-start=\"2862\" data-end=\"2987\">Impersonating any person or entity, or falsely stating or otherwise misrepresenting your affiliation with a person or entity.</p>\r\n</li>\r\n<li data-start=\"2988\" data-end=\"3081\">\r\n<p data-start=\"2990\" data-end=\"3081\">Interfering with or disrupting the Service or servers or networks connected to the Service.</p>\r\n</li>\r\n<li data-start=\"3082\" data-end=\"3134\">\r\n<p data-start=\"3084\" data-end=\"3134\">Uploading viruses, malware, or other harmful code.</p>\r\n</li>\r\n<li data-start=\"3135\" data-end=\"3233\">\r\n<p data-start=\"3137\" data-end=\"3233\">Engaging in data mining, scraping, or extracting content from the Service without authorization.</p>\r\n</li>\r\n</ul>\r\n<h3 data-start=\"3235\" data-end=\"3257\">8. <strong data-start=\"3242\" data-end=\"3257\">Termination</strong></h3>\r\n<p data-start=\"3258\" data-end=\"3430\">We may suspend or terminate your access to the Service at our sole discretion, without notice, for any reason, including if we believe you have violated these Terms of Use.</p>\r\n<h3 data-start=\"3432\" data-end=\"3454\">9. <strong data-start=\"3439\" data-end=\"3454\">Disclaimers</strong></h3>\r\n<p data-start=\"3455\" data-end=\"3645\">The Service is provided “as is” and “as available” without warranties of any kind, either express or implied. We do not warrant that the Service will be error-free, secure, or uninterrupted.</p>\r\n<h3 data-start=\"3647\" data-end=\"3682\">10. <strong data-start=\"3655\" data-end=\"3682\">Limitation of Liability</strong></h3>\r\n<p data-start=\"3683\" data-end=\"3893\">To the maximum extent permitted by law, [Your Company Name] will not be liable for any direct, indirect, incidental, special, or consequential damages arising out of your use of or inability to use the Service.</p>\r\n<h3 data-start=\"3895\" data-end=\"3922\">11. <strong data-start=\"3903\" data-end=\"3922\">Indemnification</strong></h3>\r\n<p data-start=\"3923\" data-end=\"4186\">You agree to indemnify and hold [Your Company Name] and its affiliates, officers, employees, and agents harmless from any claims, losses, liabilities, and expenses (including legal fees) arising out of your use of the Service or your breach of these Terms of Use.</p>\r\n<h3 data-start=\"4188\" data-end=\"4220\">12. <strong data-start=\"4196\" data-end=\"4220\">Changes to the Terms</strong></h3>\r\n<p data-start=\"4221\" data-end=\"4525\">We reserve the right to modify, update, or change these Terms of Use at any time. We will provide notice of any material changes by updating the effective date at the top of this page. Your continued use of the Service after the effective date of any changes constitutes your acceptance of those changes.</p>\r\n<h3 data-start=\"4527\" data-end=\"4552\">13. <strong data-start=\"4535\" data-end=\"4552\">Governing Law</strong></h3>\r\n<p data-start=\"4553\" data-end=\"4708\">These Terms of Use will be governed by and construed in accordance with the laws of the state of [State], without regard to its conflict of law principles.</p>\r\n<h3 data-start=\"4710\" data-end=\"4740\">14. <strong data-start=\"4718\" data-end=\"4740\">Dispute Resolution</strong></h3>\r\n<p data-start=\"4741\" data-end=\"5058\">Any disputes or claims arising from or related to these Terms of Use or the Service shall be resolved through binding arbitration in [Location], in accordance with the rules of [Arbitration Organization], and judgment on the award rendered by the arbitrator(s) may be entered in any court having jurisdiction thereof.</p>\r\n<h3 data-start=\"5060\" data-end=\"5082\">15. <strong data-start=\"5068\" data-end=\"5082\">Contact Us</strong></h3>\r\n<p data-start=\"5083\" data-end=\"5156\">If you have any questions about these Terms of Use, please contact us at:<br><br><br><br></p><p data-start=\"5158\" data-end=\"5224\"><br></p>        '),
(517, '2025-12-14 10:54:45', 99, 12, '            <p data-start=\"234\" data-end=\"250\"><strong data-start=\"234\" data-end=\"250\">Terms of Use</strong></p>\r\n<p data-start=\"252\" data-end=\"278\"><strong data-start=\"252\" data-end=\"278\">Effective Date: [Date]</strong></p>\r\n<p data-start=\"280\" data-end=\"591\">Welcome to [Your Web App Name] (the “Service”), provided by [Your Company Name] (“we”, “us”, or “our”). By accessing or using our website and web application (the \"App\"), you agree to comply with and be bound by these Terms of Use (the \"Agreement\"). If you do not agree with these terms, do not use the Service.</p><h3 data-start=\"593\" data-end=\"623\">1. <strong data-start=\"600\" data-end=\"623\">Acceptance of Terms</strong></h3>\r\n<p data-start=\"624\" data-end=\"928\">By accessing or using the Service, you agree to these Terms of Use, as well as any additional terms, conditions, or policies that may apply to specific features or services available through the Service. If you do not agree to any of these terms, you must immediately discontinue your use of the Service.</p>\r\n<h3 data-start=\"930\" data-end=\"952\">2. <strong data-start=\"937\" data-end=\"952\">Eligibility</strong></h3>\r\n<p data-start=\"953\" data-end=\"1143\">You must be at least [18] years of age (or the legal age of majority in your jurisdiction) to use the Service. By using the Service, you represent and warrant that you are eligible to do so.</p>\r\n<h3 data-start=\"1145\" data-end=\"1176\">3. <strong data-start=\"1152\" data-end=\"1176\">Account Registration</strong></h3>\r\n<p data-start=\"1177\" data-end=\"1561\">To access certain features of the Service, you may be required to create an account. You agree to provide accurate, current, and complete information during the registration process and to update your information to keep it accurate and complete. You are responsible for maintaining the confidentiality of your account credentials and for all activities that occur under your account.</p>\r\n<h3 data-start=\"1563\" data-end=\"1592\">4. <strong data-start=\"1570\" data-end=\"1592\">Use of the Service</strong></h3>\r\n<p data-start=\"1593\" data-end=\"1812\">You agree to use the Service in accordance with all applicable local, state, and international laws. You are solely responsible for your conduct and any data or content you upload, post, or transmit through the Service.</p>\r\n<ul data-start=\"1814\" data-end=\"2041\">\r\n<li data-start=\"1814\" data-end=\"1910\">\r\n<p data-start=\"1816\" data-end=\"1910\">You agree not to use the Service for any unlawful, harmful, fraudulent, or malicious purposes.</p>\r\n</li>\r\n<li data-start=\"1911\" data-end=\"2041\">\r\n<p data-start=\"1913\" data-end=\"2041\">You will not attempt to gain unauthorized access to any part of the Service or any systems or networks connected to the Service.</p>\r\n</li>\r\n</ul>\r\n<h3 data-start=\"2043\" data-end=\"2066\">5. <strong data-start=\"2050\" data-end=\"2066\">User Content</strong></h3>\r\n<p data-start=\"2067\" data-end=\"2320\">You may be allowed to upload, submit, or transmit content through the Service (\"User Content\"). By submitting User Content, you grant us a non-exclusive, worldwide, royalty-free license to use, display, and distribute the content as part of the Service.</p>\r\n<p data-start=\"2322\" data-end=\"2494\">You are solely responsible for the User Content you provide and agree not to submit content that violates any intellectual property rights, laws, or any third-party rights.</p>\r\n<h3 data-start=\"2496\" data-end=\"2514\">6. <strong data-start=\"2503\" data-end=\"2514\">Privacy</strong></h3>\r\n<p data-start=\"2515\" data-end=\"2764\">We respect your privacy. Our collection, use, and sharing of personal information are governed by our Privacy Policy, which is incorporated into these Terms of Use by reference. Please review our Privacy Policy to understand how we handle your data.</p>\r\n<h3 data-start=\"2766\" data-end=\"2798\">7. <strong data-start=\"2773\" data-end=\"2798\">Prohibited Activities</strong></h3>\r\n<p data-start=\"2799\" data-end=\"2858\">You agree not to engage in any of the following activities:</p>\r\n<ul data-start=\"2860\" data-end=\"3233\">\r\n<li data-start=\"2860\" data-end=\"2987\">\r\n<p data-start=\"2862\" data-end=\"2987\">Impersonating any person or entity, or falsely stating or otherwise misrepresenting your affiliation with a person or entity.</p>\r\n</li>\r\n<li data-start=\"2988\" data-end=\"3081\">\r\n<p data-start=\"2990\" data-end=\"3081\">Interfering with or disrupting the Service or servers or networks connected to the Service.</p>\r\n</li>\r\n<li data-start=\"3082\" data-end=\"3134\">\r\n<p data-start=\"3084\" data-end=\"3134\">Uploading viruses, malware, or other harmful code.</p>\r\n</li>\r\n<li data-start=\"3135\" data-end=\"3233\">\r\n<p data-start=\"3137\" data-end=\"3233\">Engaging in data mining, scraping, or extracting content from the Service without authorization.</p>\r\n</li>\r\n</ul>\r\n<h3 data-start=\"3235\" data-end=\"3257\">8. <strong data-start=\"3242\" data-end=\"3257\">Termination</strong></h3>\r\n<p data-start=\"3258\" data-end=\"3430\">We may suspend or terminate your access to the Service at our sole discretion, without notice, for any reason, including if we believe you have violated these Terms of Use.</p>\r\n<h3 data-start=\"3432\" data-end=\"3454\">9. <strong data-start=\"3439\" data-end=\"3454\">Disclaimers</strong></h3>\r\n<p data-start=\"3455\" data-end=\"3645\">The Service is provided “as is” and “as available” without warranties of any kind, either express or implied. We do not warrant that the Service will be error-free, secure, or uninterrupted.</p>\r\n<h3 data-start=\"3647\" data-end=\"3682\">10. <strong data-start=\"3655\" data-end=\"3682\">Limitation of Liability</strong></h3>\r\n<p data-start=\"3683\" data-end=\"3893\">To the maximum extent permitted by law, [Your Company Name] will not be liable for any direct, indirect, incidental, special, or consequential damages arising out of your use of or inability to use the Service.</p>\r\n<h3 data-start=\"3895\" data-end=\"3922\">11. <strong data-start=\"3903\" data-end=\"3922\">Indemnification</strong></h3>\r\n<p data-start=\"3923\" data-end=\"4186\">You agree to indemnify and hold [Your Company Name] and its affiliates, officers, employees, and agents harmless from any claims, losses, liabilities, and expenses (including legal fees) arising out of your use of the Service or your breach of these Terms of Use.</p>\r\n<h3 data-start=\"4188\" data-end=\"4220\">12. <strong data-start=\"4196\" data-end=\"4220\">Changes to the Terms</strong></h3>\r\n<p data-start=\"4221\" data-end=\"4525\">We reserve the right to modify, update, or change these Terms of Use at any time. We will provide notice of any material changes by updating the effective date at the top of this page. Your continued use of the Service after the effective date of any changes constitutes your acceptance of those changes.</p>\r\n<h3 data-start=\"4527\" data-end=\"4552\">13. <strong data-start=\"4535\" data-end=\"4552\">Governing Law</strong></h3>\r\n<p data-start=\"4553\" data-end=\"4708\">These Terms of Use will be governed by and construed in accordance with the laws of the state of [State], without regard to its conflict of law principles.</p>\r\n<h3 data-start=\"4710\" data-end=\"4740\">14. <strong data-start=\"4718\" data-end=\"4740\">Dispute Resolution</strong></h3>\r\n<p data-start=\"4741\" data-end=\"5058\">Any disputes or claims arising from or related to these Terms of Use or the Service shall be resolved through binding arbitration in [Location], in accordance with the rules of [Arbitration Organization], and judgment on the award rendered by the arbitrator(s) may be entered in any court having jurisdiction thereof.</p>\r\n<h3 data-start=\"5060\" data-end=\"5082\">15. <strong data-start=\"5068\" data-end=\"5082\">Contact Us</strong></h3>\r\n<p data-start=\"5083\" data-end=\"5156\">If you have any questions about these Terms of Use, please contact us at:<br><br><br></p><p data-start=\"5158\" data-end=\"5224\"><br></p>        '),
(518, '2025-12-14 10:56:26', 99, 13, '<p data-start=\"234\" data-end=\"250\"><strong data-start=\"234\" data-end=\"250\">Terms of Use</strong></p>\r\n<p data-start=\"252\" data-end=\"278\"><strong data-start=\"252\" data-end=\"278\">Effective Date: [Date]</strong></p>\r\n<p data-start=\"280\" data-end=\"591\">Welcome to [Your Web App Name] (the “Service”), provided by [Your Company Name] (“we”, “us”, or “our”). By accessing or using our website and web application (the \"App\"), you agree to comply with and be bound by these Terms of Use (the \"Agreement\"). If you do not agree with these terms, do not use the Service.</p><h3 data-start=\"593\" data-end=\"623\">1. <strong data-start=\"600\" data-end=\"623\">Acceptance of Terms</strong></h3>\r\n<p data-start=\"624\" data-end=\"928\">By accessing or using the Service, you agree to these Terms of Use, as well as any additional terms, conditions, or policies that may apply to specific features or services available through the Service. If you do not agree to any of these terms, you must immediately discontinue your use of the Service.</p>\r\n<h3 data-start=\"930\" data-end=\"952\">2. <strong data-start=\"937\" data-end=\"952\">Eligibility</strong></h3>\r\n<p data-start=\"953\" data-end=\"1143\">You must be at least [18] years of age (or the legal age of majority in your jurisdiction) to use the Service. By using the Service, you represent and warrant that you are eligible to do so.</p>\r\n<h3 data-start=\"1145\" data-end=\"1176\">3. <strong data-start=\"1152\" data-end=\"1176\">Account Registration</strong></h3>\r\n<p data-start=\"1177\" data-end=\"1561\">To access certain features of the Service, you may be required to create an account. You agree to provide accurate, current, and complete information during the registration process and to update your information to keep it accurate and complete. You are responsible for maintaining the confidentiality of your account credentials and for all activities that occur under your account.</p>\r\n<h3 data-start=\"1563\" data-end=\"1592\">4. <strong data-start=\"1570\" data-end=\"1592\">Use of the Service</strong></h3>\r\n<p data-start=\"1593\" data-end=\"1812\">You agree to use the Service in accordance with all applicable local, state, and international laws. You are solely responsible for your conduct and any data or content you upload, post, or transmit through the Service.</p>\r\n<ul data-start=\"1814\" data-end=\"2041\">\r\n<li data-start=\"1814\" data-end=\"1910\">\r\n<p data-start=\"1816\" data-end=\"1910\">You agree not to use the Service for any unlawful, harmful, fraudulent, or malicious purposes.</p>\r\n</li>\r\n<li data-start=\"1911\" data-end=\"2041\">\r\n<p data-start=\"1913\" data-end=\"2041\">You will not attempt to gain unauthorized access to any part of the Service or any systems or networks connected to the Service.</p>\r\n</li>\r\n</ul>\r\n<h3 data-start=\"2043\" data-end=\"2066\">5. <strong data-start=\"2050\" data-end=\"2066\">User Content</strong></h3>\r\n<p data-start=\"2067\" data-end=\"2320\">You may be allowed to upload, submit, or transmit content through the Service (\"User Content\"). By submitting User Content, you grant us a non-exclusive, worldwide, royalty-free license to use, display, and distribute the content as part of the Service.</p>\r\n<p data-start=\"2322\" data-end=\"2494\">You are solely responsible for the User Content you provide and agree not to submit content that violates any intellectual property rights, laws, or any third-party rights.</p>\r\n<h3 data-start=\"2496\" data-end=\"2514\">6. <strong data-start=\"2503\" data-end=\"2514\">Privacy</strong></h3>\r\n<p data-start=\"2515\" data-end=\"2764\">We respect your privacy. Our collection, use, and sharing of personal information are governed by our Privacy Policy, which is incorporated into these Terms of Use by reference. Please review our Privacy Policy to understand how we handle your data.</p>\r\n<h3 data-start=\"2766\" data-end=\"2798\">7. <strong data-start=\"2773\" data-end=\"2798\">Prohibited Activities</strong></h3>\r\n<p data-start=\"2799\" data-end=\"2858\">You agree not to engage in any of the following activities:</p>\r\n<ul data-start=\"2860\" data-end=\"3233\">\r\n<li data-start=\"2860\" data-end=\"2987\">\r\n<p data-start=\"2862\" data-end=\"2987\">Impersonating any person or entity, or falsely stating or otherwise misrepresenting your affiliation with a person or entity.</p>\r\n</li>\r\n<li data-start=\"2988\" data-end=\"3081\">\r\n<p data-start=\"2990\" data-end=\"3081\">Interfering with or disrupting the Service or servers or networks connected to the Service.</p>\r\n</li>\r\n<li data-start=\"3082\" data-end=\"3134\">\r\n<p data-start=\"3084\" data-end=\"3134\">Uploading viruses, malware, or other harmful code.</p>\r\n</li>\r\n<li data-start=\"3135\" data-end=\"3233\">\r\n<p data-start=\"3137\" data-end=\"3233\">Engaging in data mining, scraping, or extracting content from the Service without authorization.</p>\r\n</li>\r\n</ul>\r\n<h3 data-start=\"3235\" data-end=\"3257\">8. <strong data-start=\"3242\" data-end=\"3257\">Termination</strong></h3>\r\n<p data-start=\"3258\" data-end=\"3430\">We may suspend or terminate your access to the Service at our sole discretion, without notice, for any reason, including if we believe you have violated these Terms of Use.</p>\r\n<h3 data-start=\"3432\" data-end=\"3454\">9. <strong data-start=\"3439\" data-end=\"3454\">Disclaimers</strong></h3>\r\n<p data-start=\"3455\" data-end=\"3645\">The Service is provided “as is” and “as available” without warranties of any kind, either express or implied. We do not warrant that the Service will be error-free, secure, or uninterrupted.</p>\r\n<h3 data-start=\"3647\" data-end=\"3682\">10. <strong data-start=\"3655\" data-end=\"3682\">Limitation of Liability</strong></h3>\r\n<p data-start=\"3683\" data-end=\"3893\">To the maximum extent permitted by law, [Your Company Name] will not be liable for any direct, indirect, incidental, special, or consequential damages arising out of your use of or inability to use the Service.</p>\r\n<h3 data-start=\"3895\" data-end=\"3922\">11. <strong data-start=\"3903\" data-end=\"3922\">Indemnification</strong></h3>\r\n<p data-start=\"3923\" data-end=\"4186\">You agree to indemnify and hold [Your Company Name] and its affiliates, officers, employees, and agents harmless from any claims, losses, liabilities, and expenses (including legal fees) arising out of your use of the Service or your breach of these Terms of Use.</p>\r\n<h3 data-start=\"4188\" data-end=\"4220\">12. <strong data-start=\"4196\" data-end=\"4220\">Changes to the Terms</strong></h3>\r\n<p data-start=\"4221\" data-end=\"4525\">We reserve the right to modify, update, or change these Terms of Use at any time. We will provide notice of any material changes by updating the effective date at the top of this page. Your continued use of the Service after the effective date of any changes constitutes your acceptance of those changes.</p>\r\n<h3 data-start=\"4527\" data-end=\"4552\">13. <strong data-start=\"4535\" data-end=\"4552\">Governing Law</strong></h3>\r\n<p data-start=\"4553\" data-end=\"4708\">These Terms of Use will be governed by and construed in accordance with the laws of the state of [State], without regard to its conflict of law principles.</p>\r\n<h3 data-start=\"4710\" data-end=\"4740\">14. <strong data-start=\"4718\" data-end=\"4740\">Dispute Resolution</strong></h3>\r\n<p data-start=\"4741\" data-end=\"5058\">Any disputes or claims arising from or related to these Terms of Use or the Service shall be resolved through binding arbitration in [Location], in accordance with the rules of [Arbitration Organization], and judgment on the award rendered by the arbitrator(s) may be entered in any court having jurisdiction thereof.</p>\r\n<h3 data-start=\"5060\" data-end=\"5082\">15. <strong data-start=\"5068\" data-end=\"5082\">Contact Us</strong></h3>\r\n<p data-start=\"5083\" data-end=\"5156\">If you have any questions about these Terms of Use, please contact us at:<br></p><p data-start=\"5158\" data-end=\"5224\"><br></p>        '),
(519, '2025-12-15 14:17:14', 123, 1, 'fdgfdgfdgdgg'),
(520, '2025-12-15 14:45:02', 123, 2, '            fdgfdgfdgdgg ggg        '),
(521, '2025-12-15 15:04:34', 123, 3, '            fdgfdgfdgdgg ggg        '),
(522, '2025-12-15 15:04:39', 123, 4, '            fdgfdgfdgdgg ggg        '),
(523, '2025-12-16 03:07:16', 124, 1, 'hfhhfdh'),
(524, '2025-12-16 03:07:58', 124, 2, '            hfhhfdh');
INSERT INTO `writer_article_versions` (`writer_articleVersionId`, `writer_articleVersionTimestamp`, `writer_articleVersionForeignId`, `writer_articleVersionNumber`, `writer_articleVersionContent`) VALUES
(527, '2025-12-16 03:16:31', 99, 14, '            <p data-start=\"234\" data-end=\"250\"><strong data-start=\"234\" data-end=\"250\">Terms of Use</strong></p>\r\n<p data-start=\"252\" data-end=\"278\"><strong data-start=\"252\" data-end=\"278\">Effective Date: [Date]</strong></p>\r\n<p data-start=\"280\" data-end=\"591\">Welcome to [Your Web App Name] (the “Service”), provided by [Your Company Name] (“we”, “us”, or “our”). By accessing or using our website and web application (the \"App\"), you agree to comply with and be bound by these Terms of Use (the \"Agreement\"). If you do not agree with these terms, do not use the Service.</p><h3 data-start=\"593\" data-end=\"623\">1. <strong data-start=\"600\" data-end=\"623\">Acceptance of Terms</strong></h3>\r\n<p data-start=\"624\" data-end=\"928\">By accessing or using the Service, you agree to these Terms of Use, as well as any additional terms, conditions, or policies that may apply to specific features or services available through the Service. If you do not agree to any of these terms, you must immediately discontinue your use of the Service.</p>\r\n<h3 data-start=\"930\" data-end=\"952\">2. <strong data-start=\"937\" data-end=\"952\">Eligibility</strong></h3>\r\n<p data-start=\"953\" data-end=\"1143\">You must be at least [18] years of age (or the legal age of majority in your jurisdiction) to use the Service. By using the Service, you represent and warrant that you are eligible to do so.</p>\r\n<h3 data-start=\"1145\" data-end=\"1176\">3. <strong data-start=\"1152\" data-end=\"1176\">Account Registration</strong></h3>\r\n<p data-start=\"1177\" data-end=\"1561\">To access certain features of the Service, you may be required to create an account. You agree to provide accurate, current, and complete information during the registration process and to update your information to keep it accurate and complete. You are responsible for maintaining the confidentiality of your account credentials and for all activities that occur under your account.</p>\r\n<h3 data-start=\"1563\" data-end=\"1592\">4. <strong data-start=\"1570\" data-end=\"1592\">Use of the Service</strong></h3>\r\n<p data-start=\"1593\" data-end=\"1812\">You agree to use the Service in accordance with all applicable local, state, and international laws. You are solely responsible for your conduct and any data or content you upload, post, or transmit through the Service.</p>\r\n<ul data-start=\"1814\" data-end=\"2041\">\r\n<li data-start=\"1814\" data-end=\"1910\">\r\n<p data-start=\"1816\" data-end=\"1910\">You agree not to use the Service for any unlawful, harmful, fraudulent, or malicious purposes.</p>\r\n</li>\r\n<li data-start=\"1911\" data-end=\"2041\">\r\n<p data-start=\"1913\" data-end=\"2041\">You will not attempt to gain unauthorized access to any part of the Service or any systems or networks connected to the Service.</p>\r\n</li>\r\n</ul>\r\n<h3 data-start=\"2043\" data-end=\"2066\">5. <strong data-start=\"2050\" data-end=\"2066\">User Content</strong></h3>\r\n<p data-start=\"2067\" data-end=\"2320\">You may be allowed to upload, submit, or transmit content through the Service (\"User Content\"). By submitting User Content, you grant us a non-exclusive, worldwide, royalty-free license to use, display, and distribute the content as part of the Service.</p>\r\n<p data-start=\"2322\" data-end=\"2494\">You are solely responsible for the User Content you provide and agree not to submit content that violates any intellectual property rights, laws, or any third-party rights.</p>\r\n<h3 data-start=\"2496\" data-end=\"2514\">6. <strong data-start=\"2503\" data-end=\"2514\">Privacy</strong></h3>\r\n<p data-start=\"2515\" data-end=\"2764\">We respect your privacy. Our collection, use, and sharing of personal information are governed by our Privacy Policy, which is incorporated into these Terms of Use by reference. Please review our Privacy Policy to understand how we handle your data.</p>\r\n<h3 data-start=\"2766\" data-end=\"2798\">7. <strong data-start=\"2773\" data-end=\"2798\">Prohibited Activities</strong></h3>\r\n<p data-start=\"2799\" data-end=\"2858\">You agree not to engage in any of the following activities:</p>\r\n<ul data-start=\"2860\" data-end=\"3233\">\r\n<li data-start=\"2860\" data-end=\"2987\">\r\n<p data-start=\"2862\" data-end=\"2987\">Impersonating any person or entity, or falsely stating or otherwise misrepresenting your affiliation with a person or entity.</p>\r\n</li>\r\n<li data-start=\"2988\" data-end=\"3081\">\r\n<p data-start=\"2990\" data-end=\"3081\">Interfering with or disrupting the Service or servers or networks connected to the Service.</p>\r\n</li>\r\n<li data-start=\"3082\" data-end=\"3134\">\r\n<p data-start=\"3084\" data-end=\"3134\">Uploading viruses, malware, or other harmful code.</p>\r\n</li>\r\n<li data-start=\"3135\" data-end=\"3233\">\r\n<p data-start=\"3137\" data-end=\"3233\">Engaging in data mining, scraping, or extracting content from the Service without authorization.</p>\r\n</li>\r\n</ul>\r\n<h3 data-start=\"3235\" data-end=\"3257\">8. <strong data-start=\"3242\" data-end=\"3257\">Termination</strong></h3>\r\n<p data-start=\"3258\" data-end=\"3430\">We may suspend or terminate your access to the Service at our sole discretion, without notice, for any reason, including if we believe you have violated these Terms of Use.</p>\r\n<h3 data-start=\"3432\" data-end=\"3454\">9. <strong data-start=\"3439\" data-end=\"3454\">Disclaimers</strong></h3>\r\n<p data-start=\"3455\" data-end=\"3645\">The Service is provided “as is” and “as available” without warranties of any kind, either express or implied. We do not warrant that the Service will be error-free, secure, or uninterrupted.</p>\r\n<h3 data-start=\"3647\" data-end=\"3682\">10. <strong data-start=\"3655\" data-end=\"3682\">Limitation of Liability</strong></h3>\r\n<p data-start=\"3683\" data-end=\"3893\">To the maximum extent permitted by law, [Your Company Name] will not be liable for any direct, indirect, incidental, special, or consequential damages arising out of your use of or inability to use the Service.</p>\r\n<h3 data-start=\"3895\" data-end=\"3922\">11. <strong data-start=\"3903\" data-end=\"3922\">Indemnification</strong></h3>\r\n<p data-start=\"3923\" data-end=\"4186\">You agree to indemnify and hold [Your Company Name] and its affiliates, officers, employees, and agents harmless from any claims, losses, liabilities, and expenses (including legal fees) arising out of your use of the Service or your breach of these Terms of Use.</p>\r\n<h3 data-start=\"4188\" data-end=\"4220\">12. <strong data-start=\"4196\" data-end=\"4220\">Changes to the Terms</strong></h3>\r\n<p data-start=\"4221\" data-end=\"4525\">We reserve the right to modify, update, or change these Terms of Use at any time. We will provide notice of any material changes by updating the effective date at the top of this page. Your continued use of the Service after the effective date of any changes constitutes your acceptance of those changes.</p>\r\n<h3 data-start=\"4527\" data-end=\"4552\">13. <strong data-start=\"4535\" data-end=\"4552\">Governing Law</strong></h3>\r\n<p data-start=\"4553\" data-end=\"4708\">These Terms of Use will be governed by and construed in accordance with the laws of the state of [State], without regard to its conflict of law principles.</p>\r\n<h3 data-start=\"4710\" data-end=\"4740\">14. <strong data-start=\"4718\" data-end=\"4740\">Dispute Resolution</strong></h3>\r\n<p data-start=\"4741\" data-end=\"5058\">Any disputes or claims arising from or related to these Terms of Use or the Service shall be resolved through binding arbitration in [Location], in accordance with the rules of [Arbitration Organization], and judgment on the award rendered by the arbitrator(s) may be entered in any court having jurisdiction thereof.</p>\r\n<h3 data-start=\"5060\" data-end=\"5082\">15. <strong data-start=\"5068\" data-end=\"5082\">Contact Us</strong></h3>\r\n<p data-start=\"5083\" data-end=\"5156\">If you have any questions about these Terms of Use, please contact us at:<br></p><p data-start=\"5158\" data-end=\"5224\"><br></p>        '),
(528, '2025-12-16 03:16:35', 99, 15, '            <p data-start=\"234\" data-end=\"250\"><strong data-start=\"234\" data-end=\"250\">Terms of Use</strong></p>\r\n<p data-start=\"252\" data-end=\"278\"><strong data-start=\"252\" data-end=\"278\">Effective Date: [Date]</strong></p>\r\n<p data-start=\"280\" data-end=\"591\">Welcome to [Your Web App Name] (the “Service”), provided by [Your Company Name] (“we”, “us”, or “our”). By accessing or using our website and web application (the \"App\"), you agree to comply with and be bound by these Terms of Use (the \"Agreement\"). If you do not agree with these terms, do not use the Service.</p><h3 data-start=\"593\" data-end=\"623\">1. <strong data-start=\"600\" data-end=\"623\">Acceptance of Terms</strong></h3>\r\n<p data-start=\"624\" data-end=\"928\">By accessing or using the Service, you agree to these Terms of Use, as well as any additional terms, conditions, or policies that may apply to specific features or services available through the Service. If you do not agree to any of these terms, you must immediately discontinue your use of the Service.</p>\r\n<h3 data-start=\"930\" data-end=\"952\">2. <strong data-start=\"937\" data-end=\"952\">Eligibility</strong></h3>\r\n<p data-start=\"953\" data-end=\"1143\">You must be at least [18] years of age (or the legal age of majority in your jurisdiction) to use the Service. By using the Service, you represent and warrant that you are eligible to do so.</p>\r\n<h3 data-start=\"1145\" data-end=\"1176\">3. <strong data-start=\"1152\" data-end=\"1176\">Account Registration</strong></h3>\r\n<p data-start=\"1177\" data-end=\"1561\">To access certain features of the Service, you may be required to create an account. You agree to provide accurate, current, and complete information during the registration process and to update your information to keep it accurate and complete. You are responsible for maintaining the confidentiality of your account credentials and for all activities that occur under your account.</p>\r\n<h3 data-start=\"1563\" data-end=\"1592\">4. <strong data-start=\"1570\" data-end=\"1592\">Use of the Service</strong></h3>\r\n<p data-start=\"1593\" data-end=\"1812\">You agree to use the Service in accordance with all applicable local, state, and international laws. You are solely responsible for your conduct and any data or content you upload, post, or transmit through the Service.</p>\r\n<ul data-start=\"1814\" data-end=\"2041\">\r\n<li data-start=\"1814\" data-end=\"1910\">\r\n<p data-start=\"1816\" data-end=\"1910\">You agree not to use the Service for any unlawful, harmful, fraudulent, or malicious purposes.</p>\r\n</li>\r\n<li data-start=\"1911\" data-end=\"2041\">\r\n<p data-start=\"1913\" data-end=\"2041\">You will not attempt to gain unauthorized access to any part of the Service or any systems or networks connected to the Service.</p>\r\n</li>\r\n</ul>\r\n<h3 data-start=\"2043\" data-end=\"2066\">5. <strong data-start=\"2050\" data-end=\"2066\">User Content</strong></h3>\r\n<p data-start=\"2067\" data-end=\"2320\">You may be allowed to upload, submit, or transmit content through the Service (\"User Content\"). By submitting User Content, you grant us a non-exclusive, worldwide, royalty-free license to use, display, and distribute the content as part of the Service.</p>\r\n<p data-start=\"2322\" data-end=\"2494\">You are solely responsible for the User Content you provide and agree not to submit content that violates any intellectual property rights, laws, or any third-party rights.</p>\r\n<h3 data-start=\"2496\" data-end=\"2514\">6. <strong data-start=\"2503\" data-end=\"2514\">Privacy</strong></h3>\r\n<p data-start=\"2515\" data-end=\"2764\">We respect your privacy. Our collection, use, and sharing of personal information are governed by our Privacy Policy, which is incorporated into these Terms of Use by reference. Please review our Privacy Policy to understand how we handle your data.</p>\r\n<h3 data-start=\"2766\" data-end=\"2798\">7. <strong data-start=\"2773\" data-end=\"2798\">Prohibited Activities</strong></h3>\r\n<p data-start=\"2799\" data-end=\"2858\">You agree not to engage in any of the following activities:</p>\r\n<ul data-start=\"2860\" data-end=\"3233\">\r\n<li data-start=\"2860\" data-end=\"2987\">\r\n<p data-start=\"2862\" data-end=\"2987\">Impersonating any person or entity, or falsely stating or otherwise misrepresenting your affiliation with a person or entity.</p>\r\n</li>\r\n<li data-start=\"2988\" data-end=\"3081\">\r\n<p data-start=\"2990\" data-end=\"3081\">Interfering with or disrupting the Service or servers or networks connected to the Service.</p>\r\n</li>\r\n<li data-start=\"3082\" data-end=\"3134\">\r\n<p data-start=\"3084\" data-end=\"3134\">Uploading viruses, malware, or other harmful code.</p>\r\n</li>\r\n<li data-start=\"3135\" data-end=\"3233\">\r\n<p data-start=\"3137\" data-end=\"3233\">Engaging in data mining, scraping, or extracting content from the Service without authorization.</p>\r\n</li>\r\n</ul>\r\n<h3 data-start=\"3235\" data-end=\"3257\">8. <strong data-start=\"3242\" data-end=\"3257\">Termination</strong></h3>\r\n<p data-start=\"3258\" data-end=\"3430\">We may suspend or terminate your access to the Service at our sole discretion, without notice, for any reason, including if we believe you have violated these Terms of Use.</p>\r\n<h3 data-start=\"3432\" data-end=\"3454\">9. <strong data-start=\"3439\" data-end=\"3454\">Disclaimers</strong></h3>\r\n<p data-start=\"3455\" data-end=\"3645\">The Service is provided “as is” and “as available” without warranties of any kind, either express or implied. We do not warrant that the Service will be error-free, secure, or uninterrupted.</p>\r\n<h3 data-start=\"3647\" data-end=\"3682\">10. <strong data-start=\"3655\" data-end=\"3682\">Limitation of Liability</strong></h3>\r\n<p data-start=\"3683\" data-end=\"3893\">To the maximum extent permitted by law, [Your Company Name] will not be liable for any direct, indirect, incidental, special, or consequential damages arising out of your use of or inability to use the Service.</p>\r\n<h3 data-start=\"3895\" data-end=\"3922\">11. <strong data-start=\"3903\" data-end=\"3922\">Indemnification</strong></h3>\r\n<p data-start=\"3923\" data-end=\"4186\">You agree to indemnify and hold [Your Company Name] and its affiliates, officers, employees, and agents harmless from any claims, losses, liabilities, and expenses (including legal fees) arising out of your use of the Service or your breach of these Terms of Use.</p>\r\n<h3 data-start=\"4188\" data-end=\"4220\">12. <strong data-start=\"4196\" data-end=\"4220\">Changes to the Terms</strong></h3>\r\n<p data-start=\"4221\" data-end=\"4525\">We reserve the right to modify, update, or change these Terms of Use at any time. We will provide notice of any material changes by updating the effective date at the top of this page. Your continued use of the Service after the effective date of any changes constitutes your acceptance of those changes.</p>\r\n<h3 data-start=\"4527\" data-end=\"4552\">13. <strong data-start=\"4535\" data-end=\"4552\">Governing Law</strong></h3>\r\n<p data-start=\"4553\" data-end=\"4708\">These Terms of Use will be governed by and construed in accordance with the laws of the state of [State], without regard to its conflict of law principles.</p>\r\n<h3 data-start=\"4710\" data-end=\"4740\">14. <strong data-start=\"4718\" data-end=\"4740\">Dispute Resolution</strong></h3>\r\n<p data-start=\"4741\" data-end=\"5058\">Any disputes or claims arising from or related to these Terms of Use or the Service shall be resolved through binding arbitration in [Location], in accordance with the rules of [Arbitration Organization], and judgment on the award rendered by the arbitrator(s) may be entered in any court having jurisdiction thereof.</p>\r\n<h3 data-start=\"5060\" data-end=\"5082\">15. <strong data-start=\"5068\" data-end=\"5082\">Contact Us</strong></h3>\r\n<p data-start=\"5083\" data-end=\"5156\">If you have any questions about these Terms of Use, please contact us at:<br></p><p data-start=\"5158\" data-end=\"5224\"><br></p>        '),
(529, '2025-12-16 03:22:33', 124, 3, '            hfhhfdh ffff        '),
(537, '2025-12-16 03:54:13', 125, 1, 'hghgkhk'),
(538, '2025-12-16 03:54:16', 125, 2, '            hghgkhk        '),
(544, '2025-12-16 04:58:24', 126, 7, '            gjhhghgjhgj hhhhh gggggg        '),
(545, '2025-12-16 04:58:27', 126, 8, '            gjhhghgjhgj hhhhh gggggg        '),
(546, '2025-12-16 04:58:30', 126, 9, '            gjhhghgjhgj hhhhh gggggg        '),
(547, '2025-12-16 04:58:31', 126, 10, '            gjhhghgjhgj hhhhh gggggg        '),
(559, '2025-12-16 05:52:59', 101, 42, '            <p>ghhh ggg<br></p><p><br></p><p><br></p><p><br></p><p><br></p><p><br></p><p><br></p><p>&nbsp;ggggg</p><p><br></p><p><br></p><p><br></p><p><br></p><p><br></p>'),
(560, '2025-12-16 05:55:10', 101, 43, '            <p>ghhh ggg<br></p><p><br></p><p><br></p><p><br></p><p><br></p><p><br></p><p><br></p><p>&nbsp;ggggg gggg hgh</p><p><br></p><p><br></p><p><br></p><p><br></p><p><br></p><p><br></p><p><br></p><p><br></p><p><br></p><p><br></p><p><br></p><p><br></p><p><br></p><p><br></p><p><br></p><p><br></p>        '),
(561, '2025-12-16 06:03:38', 101, 44, '            <p><br>xgfgfdhdhdh</p>'),
(562, '2025-12-16 06:04:06', 101, 45, '<p>xgfgfdhdhdh ggggg bgg<br><br></p>        '),
(563, '2025-12-16 06:10:36', 101, 46, '            <p>xgfgfdhdhdh ggggg bgg<br>fgfh&nbsp;<br>ggj<br><br></p>'),
(564, '2025-12-16 06:12:25', 127, 1, '                                    fggfgsg                        '),
(565, '2025-12-16 06:17:48', 128, 1, '                                                            fdgdfhfh                                        '),
(566, '2025-12-16 06:19:07', 129, 1, '            jghjghg        '),
(567, '2025-12-16 06:20:17', 129, 2, '<p>            jghjghg gggg&nbsp;<br><br></p><br><p><br></p>'),
(568, '2025-12-16 06:20:27', 129, 3, '            <p>            jghjghg gggg</p><p><br></p>        '),
(569, '2025-12-16 06:20:38', 129, 4, '            <p>            jghjghg gggg<br></p><p><br></p>        '),
(570, '2025-12-16 08:15:39', 130, 1, '                        <p>This article introduces the forces and related dynamics of ecosystem\r\nevolution. An ecosystem is “a group of autonomous firms and individuals whose actions, decisions, and investments are complementary in the sense that their value as a system is greater than the\r\nsum of the values of the separate parts.”1 Ecosystems as organizational forms—\r\nan alternative to firms and markets—are enabled by the design of modular technological systems.2 System modularization reduces the need for tight control<br>and coordination, and it simplifies the coordination of innovation across firm\r\nboundaries.\r\n<br><br>Ecosystems first came to the attention of managers and management scholars in the 1990s and early 2000s. Beginning with the IBM PC in 1981, the success\r\nand rapid pace of innovation in the computer industry showcased the power of\r\nmodular technical systems in combination with managed business ecosystems.3\r\nThe value of this business model has been validated by a number of hugely successful firms who have prospered from participating in and controlling ecosystems. Today an increasing number of firms are looking to grow the ecosystems\r\nthey are involved in, especially as technologies from the computer industry are\r\ndiffusing through the rest of the economy.<br><br>However, ecosystems are not a one-size-fits-all solution that can be easily\r\ndesigned and set up by any group of firms. On the contrary, sustainable ecosystems are the result of a delicate balance between, on the one hand, forces that\r\npush economic activities toward integration into a single corporation and, on the\r\nother hand, forces that pull economic activities out onto the market. We call these\r\nforces centripetal and centrifugal forces, respectively, following recent work by\r\none of the authors.In explaining how these forces work, we draw specifically on\r\nthe economic theory of complementarities between different components of a\r\ntechnical system.<br><br>The forces affecting ecosystem structure change over time. Due to these\r\ndynamics, ecosystems are seldom stable but often in a state of flux.7 With this\r\narticle, we want to explain how centripetal and centrifugal forces shape ecosystem structure and influence ecosystem evolution. Both technological innovations\r\nand new styles of management may shift the balance between centripetal and centrifugal forces in all or part of an ecosystem.\r\n<br><br>First, technological innovations enable and are enabled by ecosystems.\r\nNew technologies may affect a single component in a larger technical system,\r\ncausing the component to become commoditized or generalized. They may affect\r\na group of components, as happens when critical interfaces become standardized.\r\nOr they may affect the whole system, causing the ecosystem to expand, contract,\r\nor, in some cases, collapse. On top of that, a modularized system in itself reduces\r\nthe cost of experimentation and customization, thus increasing the value of new\r\ntechnologies.8 Modularization also allows multiple actors with different capabilities to contribute innovations that can then be combined to create new value\r\npropositions.<br><br>Second, new management techniques affect the costs of coordination in ecosystems.10 For example, novel ways of contracting may reduce the need for control\r\nthrough ownership and open up possibilities to organize activities in ecosystems\r\nrather than within firms.11 Furthermore, new ways of managing within a firm can\r\nincrease the level of collaboration across organization boundaries.\r\n12 In this article, we\r\ndraw from our understanding of organizing and managing open innovation13 to\r\nexplain how managerial developments lead to ecosystem evolution.<br><br>In the remainder of this article we introduce the sources of centripetal and\r\ncentrifugal forces, respectively. We explain how ecosystem evolution is caused by\r\nthe dynamics of technology as well as by new developments in management and\r\ncoordination. We then describe several instances where technical and managerial\r\ndynamics were interdependent and both contributed to ecosystem evolution. We\r\nend by discussing how managers can plan for and/or guide ecosystem evolution.\r\nThroughout, we illustrate our argument with well-documented empirical examples, including cases presented in the other articles in this Special Section of\r\nCalifornia Management Review, all of which were initially presented at the seventh\r\nannual World Open Innovation Conference in December 2020.<br><br>                    </p>                '),
(571, '2025-12-16 08:15:50', 130, 2, '            <p>This article introduces the forces and related dynamics of ecosystem\r\nevolution. An ecosystem is “a group of autonomous firms and individuals whose actions, decisions, and investments are complementary in the sense that their value as a system is greater than the\r\nsum of the values of the separate parts.”1 Ecosystems as organizational forms—\r\nan alternative to firms and markets—are enabled by the design of modular technological systems.2 System modularization reduces the need for tight control<br>and coordination, and it simplifies the coordination of innovation across firm\r\nboundaries.\r\n<br><br>Ecosystems first came to the attention of managers and management scholars in the 1990s and early 2000s. Beginning with the IBM PC in 1981, the success\r\nand rapid pace of innovation in the computer industry showcased the power of\r\nmodular technical systems in combination with managed business ecosystems.3\r\nThe value of this business model has been validated by a number of hugely successful firms who have prospered from participating in and controlling ecosystems. Today an increasing number of firms are looking to grow the ecosystems\r\nthey are involved in, especially as technologies from the computer industry are\r\ndiffusing through the rest of the economy.<br><br>However, ecosystems are not a one-size-fits-all solution that can be easily\r\ndesigned and set up by any group of firms. On the contrary, sustainable ecosystems are the result of a delicate balance between, on the one hand, forces that\r\npush economic activities toward integration into a single corporation and, on the\r\nother hand, forces that pull economic activities out onto the market. We call these\r\nforces centripetal and centrifugal forces, respectively, following recent work by\r\none of the authors.In explaining how these forces work, we draw specifically on\r\nthe economic theory of complementarities between different components of a\r\ntechnical system.<br><br>The forces affecting ecosystem structure change over time. Due to these\r\ndynamics, ecosystems are seldom stable but often in a state of flux.7 With this\r\narticle, we want to explain how centripetal and centrifugal forces shape ecosystem structure and influence ecosystem evolution. Both technological innovations\r\nand new styles of management may shift the balance between centripetal and centrifugal forces in all or part of an ecosystem.\r\n<br><br>First, technological innovations enable and are enabled by ecosystems.\r\nNew technologies may affect a single component in a larger technical system,\r\ncausing the component to become commoditized or generalized. They may affect\r\na group of components, as happens when critical interfaces become standardized.\r\nOr they may affect the whole system, causing the ecosystem to expand, contract,\r\nor, in some cases, collapse. On top of that, a modularized system in itself reduces\r\nthe cost of experimentation and customization, thus increasing the value of new\r\ntechnologies.8 Modularization also allows multiple actors with different capabilities to contribute innovations that can then be combined to create new value\r\npropositions.<br><br>Second, new management techniques affect the costs of coordination in ecosystems.10 For example, novel ways of contracting may reduce the need for control\r\nthrough ownership and open up possibilities to organize activities in ecosystems\r\nrather than within firms.11 Furthermore, new ways of managing within a firm can\r\nincrease the level of collaboration across organization boundaries.\r\n12 In this article, we\r\ndraw from our understanding of organizing and managing open innovation13 to\r\nexplain how managerial developments lead to ecosystem evolution.<br><br>In the remainder of this article we introduce the sources of centripetal and\r\ncentrifugal forces, respectively. We explain how ecosystem evolution is caused by\r\nthe dynamics of technology as well as by new developments in management and\r\ncoordination. We then describe several instances where technical and managerial\r\ndynamics were interdependent and both contributed to ecosystem evolution. We\r\nend by discussing how managers can plan for and/or guide ecosystem evolution.\r\nThroughout, we illustrate our argument with well-documented empirical examples, including cases presented in the other articles in this Special Section of\r\nCalifornia Management Review, all of which were initially presented at the seventh\r\nannual World Open Innovation Conference in December 2020.<br>                    </p>        '),
(572, '2025-12-16 08:15:51', 130, 3, '            <p>This article introduces the forces and related dynamics of ecosystem\r\nevolution. An ecosystem is “a group of autonomous firms and individuals whose actions, decisions, and investments are complementary in the sense that their value as a system is greater than the\r\nsum of the values of the separate parts.”1 Ecosystems as organizational forms—\r\nan alternative to firms and markets—are enabled by the design of modular technological systems.2 System modularization reduces the need for tight control<br>and coordination, and it simplifies the coordination of innovation across firm\r\nboundaries.\r\n<br><br>Ecosystems first came to the attention of managers and management scholars in the 1990s and early 2000s. Beginning with the IBM PC in 1981, the success\r\nand rapid pace of innovation in the computer industry showcased the power of\r\nmodular technical systems in combination with managed business ecosystems.3\r\nThe value of this business model has been validated by a number of hugely successful firms who have prospered from participating in and controlling ecosystems. Today an increasing number of firms are looking to grow the ecosystems\r\nthey are involved in, especially as technologies from the computer industry are\r\ndiffusing through the rest of the economy.<br><br>However, ecosystems are not a one-size-fits-all solution that can be easily\r\ndesigned and set up by any group of firms. On the contrary, sustainable ecosystems are the result of a delicate balance between, on the one hand, forces that\r\npush economic activities toward integration into a single corporation and, on the\r\nother hand, forces that pull economic activities out onto the market. We call these\r\nforces centripetal and centrifugal forces, respectively, following recent work by\r\none of the authors.In explaining how these forces work, we draw specifically on\r\nthe economic theory of complementarities between different components of a\r\ntechnical system.<br><br>The forces affecting ecosystem structure change over time. Due to these\r\ndynamics, ecosystems are seldom stable but often in a state of flux.7 With this\r\narticle, we want to explain how centripetal and centrifugal forces shape ecosystem structure and influence ecosystem evolution. Both technological innovations\r\nand new styles of management may shift the balance between centripetal and centrifugal forces in all or part of an ecosystem.\r\n<br><br>First, technological innovations enable and are enabled by ecosystems.\r\nNew technologies may affect a single component in a larger technical system,\r\ncausing the component to become commoditized or generalized. They may affect\r\na group of components, as happens when critical interfaces become standardized.\r\nOr they may affect the whole system, causing the ecosystem to expand, contract,\r\nor, in some cases, collapse. On top of that, a modularized system in itself reduces\r\nthe cost of experimentation and customization, thus increasing the value of new\r\ntechnologies.8 Modularization also allows multiple actors with different capabilities to contribute innovations that can then be combined to create new value\r\npropositions.<br><br>Second, new management techniques affect the costs of coordination in ecosystems.10 For example, novel ways of contracting may reduce the need for control\r\nthrough ownership and open up possibilities to organize activities in ecosystems\r\nrather than within firms.11 Furthermore, new ways of managing within a firm can\r\nincrease the level of collaboration across organization boundaries.\r\n12 In this article, we\r\ndraw from our understanding of organizing and managing open innovation13 to\r\nexplain how managerial developments lead to ecosystem evolution.<br><br>In the remainder of this article we introduce the sources of centripetal and\r\ncentrifugal forces, respectively. We explain how ecosystem evolution is caused by\r\nthe dynamics of technology as well as by new developments in management and\r\ncoordination. We then describe several instances where technical and managerial\r\ndynamics were interdependent and both contributed to ecosystem evolution. We\r\nend by discussing how managers can plan for and/or guide ecosystem evolution.\r\nThroughout, we illustrate our argument with well-documented empirical examples, including cases presented in the other articles in this Special Section of\r\nCalifornia Management Review, all of which were initially presented at the seventh\r\nannual World Open Innovation Conference in December 2020.<br>                    </p>        '),
(573, '2025-12-16 08:33:33', 130, 4, '            <p>This article introduces the forces and related dynamics of ecosystem\r\nevolution. An ecosystem is “a group of autonomous firms and individuals whose actions, decisions, and investments are complementary in the sense that their value as a system is greater than the\r\nsum of the values of the separate parts.”1 Ecosystems as organizational forms—\r\nan alternative to firms and markets—are enabled by the design of modular technological systems.2 System modularization reduces the need for tight control<br>and coordination, and it simplifies the coordination of innovation across firm\r\nboundaries.<br><br><br><iframe frameborder=\"0\" src=\"//www.youtube.com/embed/1XfkVva5p2Q\" width=\"640\" height=\"360\" class=\"note-video-clip\"></iframe><br>\r\n<br><br>Ecosystems first came to the attention of managers and management scholars in the 1990s and early 2000s. Beginning with the IBM PC in 1981, the success\r\nand rapid pace of innovation in the computer industry showcased the power of\r\nmodular technical systems in combination with managed business ecosystems.3\r\nThe value of this business model has been validated by a number of hugely successful firms who have prospered from participating in and controlling ecosystems. Today an increasing number of firms are looking to grow the ecosystems\r\nthey are involved in, especially as technologies from the computer industry are\r\ndiffusing through the rest of the economy.<br><br>However, ecosystems are not a one-size-fits-all solution that can be easily\r\ndesigned and set up by any group of firms. On the contrary, sustainable ecosystems are the result of a delicate balance between, on the one hand, forces that\r\npush economic activities toward integration into a single corporation and, on the\r\nother hand, forces that pull economic activities out onto the market. We call these\r\nforces centripetal and centrifugal forces, respectively, following recent work by\r\none of the authors.In explaining how these forces work, we draw specifically on\r\nthe economic theory of complementarities between different components of a\r\ntechnical system.<br><br>The forces affecting ecosystem structure change over time. Due to these\r\ndynamics, ecosystems are seldom stable but often in a state of flux.7 With this\r\narticle, we want to explain how centripetal and centrifugal forces shape ecosystem structure and influence ecosystem evolution. Both technological innovations\r\nand new styles of management may shift the balance between centripetal and centrifugal forces in all or part of an ecosystem.\r\n<br><br>First, technological innovations enable and are enabled by ecosystems.\r\nNew technologies may affect a single component in a larger technical system,\r\ncausing the component to become commoditized or generalized. They may affect\r\na group of components, as happens when critical interfaces become standardized.\r\nOr they may affect the whole system, causing the ecosystem to expand, contract,\r\nor, in some cases, collapse. On top of that, a modularized system in itself reduces\r\nthe cost of experimentation and customization, thus increasing the value of new\r\ntechnologies.8 Modularization also allows multiple actors with different capabilities to contribute innovations that can then be combined to create new value\r\npropositions.<br><br>Second, new management techniques affect the costs of coordination in ecosystems.10 For example, novel ways of contracting may reduce the need for control\r\nthrough ownership and open up possibilities to organize activities in ecosystems\r\nrather than within firms.11 Furthermore, new ways of managing within a firm can\r\nincrease the level of collaboration across organization boundaries.\r\n12 In this article, we\r\ndraw from our understanding of organizing and managing open innovation13 to\r\nexplain how managerial developments lead to ecosystem evolution.<br><br>In the remainder of this article we introduce the sources of centripetal and\r\ncentrifugal forces, respectively. We explain how ecosystem evolution is caused by\r\nthe dynamics of technology as well as by new developments in management and\r\ncoordination. We then describe several instances where technical and managerial\r\ndynamics were interdependent and both contributed to ecosystem evolution. We\r\nend by discussing how managers can plan for and/or guide ecosystem evolution.\r\nThroughout, we illustrate our argument with well-documented empirical examples, including cases presented in the other articles in this Special Section of\r\nCalifornia Management Review, all of which were initially presented at the seventh\r\nannual World Open Innovation Conference in December 2020.<br>                    </p>        '),
(592, '2025-12-27 07:53:20', 130, 5, '            <p>This article introduces the forces and related dynamics of ecosystem\r\nevolution. An ecosystem is “a group of autonomous firms and individuals whose actions, decisions, and investments are complementary in the sense that their value as a system is greater than the\r\nsum of the values of the separate parts.”1 Ecosystems as organizational forms—\r\nan alternative to firms and markets—are enabled by the design of modular technological systems.2 System modularization reduces the need for tight control<br>and coordination, and it simplifies the coordination of innovation across firm\r\nboundaries. <br><br><br><iframe frameborder=\"0\" src=\"//www.youtube.com/embed/1XfkVva5p2Q\" width=\"640\" height=\"360\" class=\"note-video-clip\"></iframe><br>\r\n<br><br>Ecosystems first came to the attention of managers and management scholars in the 1990s and early 2000s. Beginning with the IBM PC in 1981, the success\r\nand rapid pace of innovation in the computer industry showcased the power of\r\nmodular technical systems in combination with managed business ecosystems.3\r\nThe value of this business model has been validated by a number of hugely successful firms who have prospered from participating in and controlling ecosystems. Today an increasing number of firms are looking to grow the ecosystems\r\nthey are involved in, especially as technologies from the computer industry are\r\ndiffusing through the rest of the economy.<br><br>However, ecosystems are not a one-size-fits-all solution that can be easily\r\ndesigned and set up by any group of firms. On the contrary, sustainable ecosystems are the result of a delicate balance between, on the one hand, forces that\r\npush economic activities toward integration into a single corporation and, on the\r\nother hand, forces that pull economic activities out onto the market. We call these\r\nforces centripetal and centrifugal forces, respectively, following recent work by\r\none of the authors.In explaining how these forces work, we draw specifically on\r\nthe economic theory of complementarities between different components of a\r\ntechnical system.<br><br>The forces affecting ecosystem structure change over time. Due to these\r\ndynamics, ecosystems are seldom stable but often in a state of flux.7 With this\r\narticle, we want to explain how centripetal and centrifugal forces shape ecosystem structure and influence ecosystem evolution. Both technological innovations\r\nand new styles of management may shift the balance between centripetal and centrifugal forces in all or part of an ecosystem.\r\n<br><br>First, technological innovations enable and are enabled by ecosystems.\r\nNew technologies may affect a single component in a larger technical system,\r\ncausing the component to become commoditized or generalized. They may affect\r\na group of components, as happens when critical interfaces become standardized.\r\nOr they may affect the whole system, causing the ecosystem to expand, contract,\r\nor, in some cases, collapse. On top of that, a modularized system in itself reduces\r\nthe cost of experimentation and customization, thus increasing the value of new\r\ntechnologies.8 Modularization also allows multiple actors with different capabilities to contribute innovations that can then be combined to create new value\r\npropositions.<br><br>Second, new management techniques affect the costs of coordination in ecosystems.10 For example, novel ways of contracting may reduce the need for control\r\nthrough ownership and open up possibilities to organize activities in ecosystems\r\nrather than within firms.11 Furthermore, new ways of managing within a firm can\r\nincrease the level of collaboration across organization boundaries.\r\n12 In this article, we\r\ndraw from our understanding of organizing and managing open innovation13 to\r\nexplain how managerial developments lead to ecosystem evolution.<br><br>In the remainder of this article we introduce the sources of centripetal and\r\ncentrifugal forces, respectively. We explain how ecosystem evolution is caused by\r\nthe dynamics of technology as well as by new developments in management and\r\ncoordination. We then describe several instances where technical and managerial\r\ndynamics were interdependent and both contributed to ecosystem evolution. We\r\nend by discussing how managers can plan for and/or guide ecosystem evolution.\r\nThroughout, we illustrate our argument with well-documented empirical examples, including cases presented in the other articles in this Special Section of\r\nCalifornia Management Review, all of which were initially presented at the seventh\r\nannual World Open Innovation Conference in December 2020.<br>                    </p>        ');

-- --------------------------------------------------------

--
-- Table structure for table `writer_registrations`
--

CREATE TABLE `writer_registrations` (
  `writerId` int(11) NOT NULL,
  `writerTimestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `writerUserId` int(11) NOT NULL,
  `writerFullname` varchar(256) NOT NULL,
  `writerEmailAddress` varchar(64) NOT NULL,
  `writerCredentialType` varchar(64) NOT NULL,
  `writerCredentialNumber` varchar(64) NOT NULL,
  `writerCredentialExpiry` datetime NOT NULL,
  `writerCredentialFile` varchar(64) NOT NULL,
  `writerResume` varchar(64) NOT NULL,
  `writerWritingExperience` longtext NOT NULL,
  `writerProfileStatus` varchar(64) NOT NULL DEFAULT 'Pending',
  `writerProfileApprovalDate` datetime NOT NULL,
  `writerTotalArticles` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account_types`
--
ALTER TABLE `account_types`
  ADD PRIMARY KEY (`account_typeId`);

--
-- Indexes for table `contents`
--
ALTER TABLE `contents`
  ADD PRIMARY KEY (`contentId`);

--
-- Indexes for table `content_performance`
--
ALTER TABLE `content_performance`
  ADD PRIMARY KEY (`content_viewId`);

--
-- Indexes for table `developer_tools`
--
ALTER TABLE `developer_tools`
  ADD PRIMARY KEY (`developer_toolId`);

--
-- Indexes for table `developer_tool_versions`
--
ALTER TABLE `developer_tool_versions`
  ADD PRIMARY KEY (`developer_toolVersionId`);

--
-- Indexes for table `developer_uploaded_files`
--
ALTER TABLE `developer_uploaded_files`
  ADD PRIMARY KEY (`developer_uploadedFileId`);

--
-- Indexes for table `editor_edits`
--
ALTER TABLE `editor_edits`
  ADD PRIMARY KEY (`editor_editId`);

--
-- Indexes for table `editor_registrations`
--
ALTER TABLE `editor_registrations`
  ADD PRIMARY KEY (`editorId`);

--
-- Indexes for table `file_purchase`
--
ALTER TABLE `file_purchase`
  ADD PRIMARY KEY (`file_purchaseId`);

--
-- Indexes for table `funder_registrations`
--
ALTER TABLE `funder_registrations`
  ADD PRIMARY KEY (`funderId`);

--
-- Indexes for table `other_registrations`
--
ALTER TABLE `other_registrations`
  ADD PRIMARY KEY (`otherId`);

--
-- Indexes for table `payment_options`
--
ALTER TABLE `payment_options`
  ADD PRIMARY KEY (`payment_optionId`);

--
-- Indexes for table `promotions`
--
ALTER TABLE `promotions`
  ADD PRIMARY KEY (`promotionId`);

--
-- Indexes for table `registrant_activities`
--
ALTER TABLE `registrant_activities`
  ADD PRIMARY KEY (`registrant_activityId`);

--
-- Indexes for table `registrant_subscriptions`
--
ALTER TABLE `registrant_subscriptions`
  ADD PRIMARY KEY (`registrant_subscriptionId`);

--
-- Indexes for table `registrations`
--
ALTER TABLE `registrations`
  ADD PRIMARY KEY (`registrantId`);

--
-- Indexes for table `school_researches`
--
ALTER TABLE `school_researches`
  ADD PRIMARY KEY (`school_researchId`);

--
-- Indexes for table `school_research_versions`
--
ALTER TABLE `school_research_versions`
  ADD PRIMARY KEY (`school_researchVersionId`);

--
-- Indexes for table `teacher_files`
--
ALTER TABLE `teacher_files`
  ADD PRIMARY KEY (`teacher_fileId`);

--
-- Indexes for table `teacher_file_versions`
--
ALTER TABLE `teacher_file_versions`
  ADD PRIMARY KEY (`teacher_fileVersionId`);

--
-- Indexes for table `teacher_registrations`
--
ALTER TABLE `teacher_registrations`
  ADD PRIMARY KEY (`teacherId`);

--
-- Indexes for table `terms_conditions`
--
ALTER TABLE `terms_conditions`
  ADD PRIMARY KEY (`term_conditionId`);

--
-- Indexes for table `tools`
--
ALTER TABLE `tools`
  ADD PRIMARY KEY (`toolId`);

--
-- Indexes for table `writer_articles`
--
ALTER TABLE `writer_articles`
  ADD PRIMARY KEY (`writer_articleId`);

--
-- Indexes for table `writer_article_versions`
--
ALTER TABLE `writer_article_versions`
  ADD PRIMARY KEY (`writer_articleVersionId`);

--
-- Indexes for table `writer_registrations`
--
ALTER TABLE `writer_registrations`
  ADD PRIMARY KEY (`writerId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account_types`
--
ALTER TABLE `account_types`
  MODIFY `account_typeId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contents`
--
ALTER TABLE `contents`
  MODIFY `contentId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=262;

--
-- AUTO_INCREMENT for table `content_performance`
--
ALTER TABLE `content_performance`
  MODIFY `content_viewId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `developer_tools`
--
ALTER TABLE `developer_tools`
  MODIFY `developer_toolId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `developer_tool_versions`
--
ALTER TABLE `developer_tool_versions`
  MODIFY `developer_toolVersionId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `developer_uploaded_files`
--
ALTER TABLE `developer_uploaded_files`
  MODIFY `developer_uploadedFileId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `editor_edits`
--
ALTER TABLE `editor_edits`
  MODIFY `editor_editId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `editor_registrations`
--
ALTER TABLE `editor_registrations`
  MODIFY `editorId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `file_purchase`
--
ALTER TABLE `file_purchase`
  MODIFY `file_purchaseId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `funder_registrations`
--
ALTER TABLE `funder_registrations`
  MODIFY `funderId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `other_registrations`
--
ALTER TABLE `other_registrations`
  MODIFY `otherId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `promotions`
--
ALTER TABLE `promotions`
  MODIFY `promotionId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `registrant_activities`
--
ALTER TABLE `registrant_activities`
  MODIFY `registrant_activityId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=650;

--
-- AUTO_INCREMENT for table `registrant_subscriptions`
--
ALTER TABLE `registrant_subscriptions`
  MODIFY `registrant_subscriptionId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `registrations`
--
ALTER TABLE `registrations`
  MODIFY `registrantId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `school_researches`
--
ALTER TABLE `school_researches`
  MODIFY `school_researchId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `school_research_versions`
--
ALTER TABLE `school_research_versions`
  MODIFY `school_researchVersionId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `teacher_files`
--
ALTER TABLE `teacher_files`
  MODIFY `teacher_fileId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `teacher_file_versions`
--
ALTER TABLE `teacher_file_versions`
  MODIFY `teacher_fileVersionId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `teacher_registrations`
--
ALTER TABLE `teacher_registrations`
  MODIFY `teacherId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `terms_conditions`
--
ALTER TABLE `terms_conditions`
  MODIFY `term_conditionId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tools`
--
ALTER TABLE `tools`
  MODIFY `toolId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `writer_articles`
--
ALTER TABLE `writer_articles`
  MODIFY `writer_articleId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=135;

--
-- AUTO_INCREMENT for table `writer_article_versions`
--
ALTER TABLE `writer_article_versions`
  MODIFY `writer_articleVersionId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=596;

--
-- AUTO_INCREMENT for table `writer_registrations`
--
ALTER TABLE `writer_registrations`
  MODIFY `writerId` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
