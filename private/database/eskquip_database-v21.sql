-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 03, 2025 at 09:15 AM
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
(34, 'Erfel App', '', 'developer_tools', 6, 1, 'Published', '2025-11-07 21:17:27', '', ''),
(46, 'Erfel App 2', '', 'developer_tools', 7, 1, 'Published', '2025-11-08 13:11:13', '', ''),
(47, 'Erfel App 3', '', 'developer_tools', 8, 1, 'Published', '2025-11-08 13:12:16', '', ''),
(48, 'Erfel App 4', '', 'developer_tools', 9, 1, 'Published', '2025-11-08 13:29:22', '', ''),
(49, 'Erfel App 5', '', 'developer_tools', 10, 1, 'Unpublished', '2025-11-08 13:29:46', '', ''),
(50, 'Erfel App 6', '', 'developer_tools', 11, 1, 'Published', '2025-11-08 13:30:20', '', ''),
(51, 'Erfel App 7', '', 'developer_tools', 12, 1, 'Published', '2025-11-08 13:30:45', '', ''),
(52, 'Erfel App 8', '', 'developer_tools', 13, 1, 'Published', '2025-11-08 13:31:25', '', ''),
(53, 'Erfel App 9', '', 'developer_tools', 14, 1, 'Published', '2025-11-08 13:32:17', '', ''),
(54, 'Erfel App 10', '', 'developer_tools', 15, 1, 'Unpublished', '2025-11-08 13:32:56', '', ''),
(55, 'Erfel App 11', '', 'developer_tools', 16, 1, 'Unpublished', '2025-11-08 13:33:32', '', ''),
(63, 'Research 1', '', 'school_researches', 3, 9, 'Published', '2025-11-08 13:55:48', '', ''),
(64, 'Research 2', '', 'school_researches', 4, 9, 'Published', '2025-11-08 14:01:33', '', ''),
(65, 'Research 3', '', 'school_researches', 5, 9, 'Published', '2025-11-08 16:17:07', '', ''),
(66, 'Research 4', '', 'school_researches', 6, 9, 'Published', '2025-11-08 16:17:37', '', ''),
(67, 'Research 5', '', 'school_researches', 7, 9, 'Published', '2025-11-08 16:23:51', '', ''),
(68, 'Research 6', '', 'school_researches', 8, 9, 'Published', '2025-11-08 16:18:51', '', ''),
(69, 'Research 7', '', 'school_researches', 9, 9, 'Published', '2025-11-08 16:23:46', '', ''),
(70, 'Research 8', '', 'school_researches', 10, 9, 'Published', '2025-11-08 16:23:42', '', ''),
(71, 'Research 9', '', 'school_researches', 11, 9, 'Published', '2025-11-08 16:23:37', '', ''),
(72, 'Research 10', '', 'school_researches', 12, 9, 'Published', '2025-11-08 16:23:33', '', ''),
(73, 'Research 11', '', 'school_researches', 13, 9, 'Published', '2025-11-08 16:23:30', '', ''),
(74, 'Research 12', '', 'school_researches', 14, 9, 'Unpublished', '2025-11-08 16:24:55', '', ''),
(82, 'Test Paper for Grade 2 Science First Grading', '', 'teacher_files', 1, 1, 'Published', '2025-11-13 12:41:23', '', ''),
(83, 'sssgfdhffHNFFgggghhff', '', 'school_researches', 16, 9, 'Draft', '0000-00-00 00:00:00', '', ''),
(84, 'sssgfdhffHNFFgggghhffhh', '', 'school_researches', 17, 9, 'Draft', '0000-00-00 00:00:00', '', ''),
(85, 'gfgg', '', 'school_researches', 18, 9, 'Draft', '0000-00-00 00:00:00', '', ''),
(86, 'gfggfgg', '', 'school_researches', 19, 9, 'Draft', '0000-00-00 00:00:00', '', ''),
(87, 'gfggfggggg', '', 'school_researches', 20, 9, 'Draft', '0000-00-00 00:00:00', '', ''),
(88, 'xgfh', '', 'school_researches', 21, 9, 'Draft', '0000-00-00 00:00:00', '', ''),
(89, 'gfhgfjj', '', 'school_researches', 22, 9, 'Draft', '0000-00-00 00:00:00', '', ''),
(90, 'sdgfdgfd', '', 'school_researches', 23, 9, 'Draft', '0000-00-00 00:00:00', '', ''),
(91, 'dgdg', '', 'school_researches', 24, 9, 'Draft', '0000-00-00 00:00:00', '', ''),
(92, 'dgxgdg', '', 'school_researches', 25, 9, 'Draft', '0000-00-00 00:00:00', '', ''),
(102, 'Lesson plan 2', '', 'teacher_files', 11, 18, 'Published', '2025-11-14 17:30:04', '', ''),
(103, 'lesson plan 3', '', 'teacher_files', 12, 18, 'Published', '2025-11-27 15:47:03', '', ''),
(114, 'xvfgfgfd', '', 'school_researches', 26, 9, 'Draft', '0000-00-00 00:00:00', '', ''),
(120, 'Erfel App 56', '', 'developer_tools', 17, 1, 'Draft', '0000-00-00 00:00:00', '', ''),
(121, 'dgfhfh', '', 'developer_tools', 18, 1, 'Draft', '0000-00-00 00:00:00', '', ''),
(167, 'New Research for Today: Must be approved for  1$', '', 'school_researches', 27, 9, 'Published', '2025-11-28 19:43:42', '', ''),
(168, 'New Research 2 for Today: Must be approved for  1$', 'new+research+2+for+today+must+be+approved+for+1', 'school_researches', 28, 9, 'Unpublished', '2025-11-28 20:36:44', '', ''),
(172, 'zvxggfdgg', 'zvxggfdgg', 'school_researches', 29, 9, 'Published', '2025-11-28 22:48:36', '', ''),
(188, 'dfdgfdgf', 'dfdgfdgf', 'school_researches', 30, 9, 'Draft', '0000-00-00 00:00:00', '', ''),
(189, 'ererewtt', 'ererewtt', 'writer_articles', 102, 1, 'Waiting for Update', '2025-12-01 22:04:40', '', ''),
(190, 'fdsdsgdsg', 'fdsdsgdsg', 'writer_articles', 103, 1, 'Draft', '0000-00-00 00:00:00', '', '');

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
(1, '2025-11-30 10:58:18', 'writer_articles', 86, 0, 15, '2025-11-30 11:04:55'),
(2, '2025-11-30 10:58:59', 'school_researches', 29, 0, 30, '2025-11-30 11:07:04'),
(3, '2025-11-30 10:59:23', 'teacher_files', 17, 0, 22, '2025-11-30 11:05:29'),
(4, '2025-11-30 11:00:51', 'writer_articles', 84, 0, 6, '2025-11-30 11:01:48'),
(5, '2025-11-30 11:27:30', 'school_researches', 27, 0, 7, '2025-11-30 11:27:36'),
(6, '2025-11-30 12:25:42', 'writer_articles', 93, 18, 3, '2025-11-30 12:25:44'),
(7, '2025-11-30 12:49:58', 'writer_articles', 97, 1, 19, '2025-11-30 13:11:18'),
(8, '2025-11-30 13:13:36', 'teacher_files', 17, 1, 9, '2025-11-30 13:14:17'),
(9, '2025-11-30 13:17:31', 'writer_articles', 97, 0, 0, '2025-11-30 13:17:31'),
(10, '2025-12-01 10:08:05', 'teacher_files', 15, 1, 0, '2025-12-01 10:08:05'),
(11, '2025-12-01 10:49:28', 'school_researches', 29, 1, 0, '2025-12-01 10:49:28'),
(12, '2025-12-01 14:17:29', 'teacher_files', 15, 0, 0, '2025-12-01 14:17:29'),
(13, '2025-12-01 14:20:54', 'school_researches', 29, 18, 0, '2025-12-01 14:20:54'),
(14, '2025-12-01 14:21:14', 'teacher_files', 15, 18, 0, '2025-12-01 14:21:14'),
(15, '2025-12-01 15:08:57', 'teacher_files', 18, 18, 0, '2025-12-01 15:08:57'),
(16, '2025-12-01 15:09:56', 'teacher_files', 18, 0, 0, '2025-12-01 15:09:56'),
(17, '2025-12-02 14:00:06', 'teacher_files', 18, 1, 0, '2025-12-02 14:00:06');

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
(6, 'Erfel App', 'Mathematics', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', '', '1', '2025-11-07 21:17:07', '2025-11-07 21:17:27', '2025-11-07 13:54:52', 'Published', '', '/public/tools/erfel-app/', ''),
(7, 'Erfel App 2', 'Science', 'ontrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.', '', '1', '2025-11-08 13:10:59', '2025-11-08 13:11:13', '2025-11-08 05:11:13', 'Published', '', '/public/tools/erfel-app-2/', ''),
(8, 'Erfel App 3', 'Arts', 'ontrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.', '', '1', '2025-11-08 13:12:07', '2025-11-08 13:12:16', '2025-11-08 05:12:16', 'Published', '', '/public/tools/erfel-app-3/', ''),
(9, 'Erfel App 4', 'Science', 'ontrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.', '', '1', '2025-11-08 13:29:15', '2025-11-08 13:29:22', '2025-11-08 05:29:22', 'Published', '', '/public/tools/erfel-app-4/', ''),
(10, 'Erfel App 5', 'Mathematics', 'ontrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of &quot;de Finibus Bonorum et Malorum&quot; (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, &quot;Lorem ipsum dolor sit amet..&quot;, comes from a line in section 1.10.32.', '', '1', '2025-11-08 13:29:39', '2025-11-08 13:29:46', '2025-11-13 11:55:33', 'Unpublished', '', '/public/tools/erfel-app-5/', ''),
(11, 'Erfel App 6', 'Science', 'ontrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.', '', '1', '2025-11-08 13:30:14', '2025-11-08 13:30:20', '2025-11-08 05:30:20', 'Published', '', '/public/tools/erfel-app-6/', ''),
(12, 'Erfel App 7', 'Language', 'ontrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of &quot;de Finibus Bonorum et Malorum&quot; (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, &quot;Lorem ipsum dolor sit amet..&quot;, comes from a line in section 1.10.32.', '', '1', '2025-11-08 13:30:37', '2025-11-08 13:30:45', '2025-11-12 04:01:31', 'Published', '', '/public/tools/erfel-app-7/', ''),
(13, 'Erfel App 8', 'Language', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.', '', '1', '2025-11-08 13:31:02', '2025-11-08 13:31:25', '2025-11-08 05:31:25', 'Published', '', '/public/tools/erfel-app-8/', ''),
(14, 'Erfel App 9', 'Arts', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.', '', '1', '2025-11-08 13:32:10', '2025-11-08 13:32:17', '2025-11-26 05:05:14', 'Published', '', '/public/tools/erfel-app-9/', ''),
(15, 'Erfel App 10', 'Mathematics', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.', '', '1', '2025-11-08 13:32:48', '2025-11-08 13:32:56', '2025-11-12 05:30:55', 'Unpublished', '', '/public/tools/erfel-app-10/', ''),
(16, 'Erfel App 11', 'Language', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of &quot;de Finibus Bonorum et Malorum&quot; (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, &quot;Lorem ipsum dolor sit amet..&quot;, comes from a line in section 1.10.32.', '', '1', '2025-11-08 13:33:25', '2025-11-08 13:33:32', '2025-11-12 05:30:51', 'Unpublished', '', '/public/tools/erfel-app-11/', ''),
(17, 'Erfel App 56', 'Mathematics', 'ontrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of &quot;de Finibus Bonorum et Malorum&quot; (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, &quot;Lorem ipsum dolor sit amet..&quot;, comes from a line in section 1.10.32.', '', '1', '2025-11-18 12:23:48', '0000-00-00 00:00:00', '2025-11-18 04:23:48', 'Draft', '', '/public/tools/erfel-app-56/', ''),
(18, 'dgfhfh', 'Mathematics', 'hcghfggfj', '', '1', '2025-11-18 12:24:49', '0000-00-00 00:00:00', '2025-11-18 04:24:49', 'Draft', '', '/public/tools/dgfhfh/', '');

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
(10, '2025-11-08 05:12:14', 8, '/public/tools/erfel-app-3/index.php'),
(11, '2025-11-08 05:29:21', 9, '/public/tools/erfel-app-4/index.php'),
(12, '2025-11-08 05:29:45', 10, '/public/tools/erfel-app-5/index.php'),
(13, '2025-11-08 05:30:19', 11, '/public/tools/erfel-app-6/index.php'),
(14, '2025-11-08 05:30:44', 12, '/public/tools/erfel-app-7/index.php'),
(15, '2025-11-08 05:31:10', 13, '/public/tools/erfel-app-8/index.php'),
(17, '2025-11-08 05:32:54', 15, '/public/tools/erfel-app-10/index.php'),
(19, '2025-11-11 06:31:16', 16, '/public/tools/erfel-app-11/index.php'),
(23, '2025-11-12 04:00:43', 12, '/public/tools/erfel-app-7/tool-editor.php'),
(25, '2025-11-19 07:29:15', 14, '/public/tools/erfel-app-9/index.php');

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
(3, '2025-11-12 12:50:07', 118, 1, 10, 18, '4325325', 'sfsdfdsg', 'Approved', '/uploads/file-purchase/proof/userid-18-20251112205007.pdf'),
(4, '2025-11-14 10:08:45', 10, 1, 10, 18, 'GCASH', 'DSGFDHH', 'Approved', '/uploads/file-purchase/proof/userid-18-20251114180845.pdf'),
(5, '2025-11-14 10:14:25', 9, 1, 30, 18, 'dsgdgfg', 'dbgfgh', 'Approved', '/uploads/file-purchase/proof/userid-18-20251114181425.pdf');

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
(2, '2025-10-30 06:14:54', 'Teacher', 1, '/uploads/registration/teacher/resume/Erfel-Suriaga-20251030141454.pdf', '/uploads/registration/teacher/license-certification/Erfel-Suriaga-20251030141454.pdf', '/uploads/registration/teacher/sample/Erfel-Suriaga-20251030141454.pdf', '/uploads/registration/teacher/agreement/Erfel-Suriaga-20251030141454.pdf', 'hfgfg                                                                                                                   ', 'Kept', '2025-12-01 19:18:09'),
(3, '2025-10-30 06:51:30', 'Editor', 1, '/uploads/registration/editor/resume/Erfel-Suriaga-20251030145130.pdf', '/uploads/registration/editor/license-certification/Erfel-Suriaga-20251030145130.pdf', '/uploads/registration/editor/sample/Erfel-Suriaga-20251030145130.pdf', '/uploads/registration/editor/agreement/Erfel-Suriaga-20251030145130.pdf', '', 'Kept', '2025-12-01 11:29:16'),
(4, '2025-11-07 11:08:07', 'Teacher', 15, '/uploads/registration/teacher/resume/Nonoy-Trebyu-20251107190807.pdf', '/uploads/registration/teacher/license-certification/Nonoy-Trebyu-20251107190807.pdf', '/uploads/registration/teacher/sample/Nonoy-Trebyu-20251107190807.pdf', '/uploads/registration/teacher/agreement/Nonoy-Trebyu-20251107190807.pdf', 'Noy Trebyu', 'Revoked', '2025-12-01 19:07:34'),
(5, '2025-11-12 02:03:37', 'Teacher', 18, '/uploads/registration/teacher/resume/Erfel Printing-20251112100337.pdf', '/uploads/registration/teacher/license-certification/Erfel Printing-20251112100337.pdf', '/uploads/registration/teacher/sample/Erfel Printing-20251112100337.pdf', '/uploads/registration/teacher/agreement/Erfel Printing-20251112100337.pdf', '                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                gdhgfhggvjhhhfgfggcgfhhhhh                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                ', 'Kept', '2025-12-01 20:11:43'),
(6, '2025-11-13 03:15:11', 'Writer', 18, '/uploads/registration/writer/resume/Erfel Printing-20251113111511.pdf', '/uploads/registration/writer/license-certification/Erfel Printing-20251113111511.pdf', '/uploads/registration/writer/sample/Erfel Printing-20251113111511.pdf', '/uploads/registration/writer/agreement/Erfel Printing-20251113111511.pdf', '', 'Kept', '2025-11-17 14:42:41'),
(7, '2025-11-27 06:03:24', 'Editor', 18, '', '/uploads/registration/editor/license-certification/Erfel  Printing-20251127140324.pdf', '', '/uploads/registration/editor/agreement/Erfel  Printing-20251127140324.pdf', '                                                                                                                                                                                                      dzfdf                                          ', 'Kept', '2025-12-01 11:29:14');

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
-- Table structure for table `promotional_contents`
--

CREATE TABLE `promotional_contents` (
  `promotional_contentId` int(11) NOT NULL,
  `promotional_contentTimestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `promotional_contentTopic` longtext NOT NULL,
  `promotional_contentImageLink` longtext NOT NULL,
  `promotional_contentDuration` varchar(64) NOT NULL,
  `promotional_contentStatus` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(442, '2025-12-02 14:37:29', 9, 'Logged out');

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
  `registrant_subscriptionAmount` int(11) NOT NULL,
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

INSERT INTO `registrant_subscriptions` (`registrant_subscriptionId`, `registrant_subscriptionUserId`, `registrant_subscriptionUserFullName`, `registrant_subscriptionType`, `registrant_subscriptionDuration`, `registrant_subscriptionAmount`, `registrant_subscriptionPaymentOption`, `registrant_subscriptionSenderName`, `registrant_subscriptionSenderAccountNumber`, `registrant_subscriptionRefNumber`, `registrant_subscriptionProofOfPayment`, `registrant_subscriptionTimestamp`, `registrant_subscriptionStatus`, `registrant_subscriptionDate`, `registrant_subscriptionExpiry`) VALUES
(1, 18, '', 'Seller', '1', 0, 'GCASH', '', '', 'fsdfdf', '/uploads/subscription/proof/userid-18-20251201222722.jpeg', '2025-12-01 22:27:23', 'Approved', '2025-12-01 22:28:12', '2025-12-31 22:28:12');

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

INSERT INTO `registrations` (`registrantId`, `registrantCode`, `registrantFirstName`, `registrantMiddleName`, `registrantLastName`, `registrantAccountName`, `registrantDescription`, `registrantAccountType`, `registrantProfilePictureStatus`, `registrantProfilePictureLink`, `registrantCoverPhotoLink`, `registrantBirthdate`, `registrantGender`, `registrantCivilStatus`, `registrantAddressStreet`, `registrantAddressBarangay`, `registrantAddressCity`, `registrantAddressProvince`, `registrantAddressRegion`, `registrantAddressCountry`, `registrantAddressZipCode`, `registrantEducationalAttainment`, `registrantSchool`, `registrantOccupation`, `registrantEmailAddress`, `registrantMobileNumber`, `registrantUsername`, `registrantPassword`, `registrantConfirmationCode`, `registrantBasicAccount`, `registrantTeacherAccount`, `registrantWriterAccount`, `registrantEditorAccount`, `registrantSiteManagerAccount`, `registrantDataAnalystAccount`, `registrantDeveloperAccount`, `registrantFunderAccount`, `registrantVerificationStatus`, `registrantStatus`, `registrantCreatedAt`, `resetTokenHash`, `resetTokenHashExpiration`, `registrantPaymentChannel`, `registrantBankAccountName`, `registrantBankAccountNumber`, `registrantReviewSchedules`) VALUES
(1, '25000000001', 'Erfel', '', 'Suriaga', 'Erfel  Suriaga', 'Erfel Contiga Suriaga is a licensed professional teacher whose educational vision goes beyond the classroom.', 'Personal', 0, '/uploads/profile-pictures/Erfel_Contiga_Suriaga-20251122133917.jpeg', '/uploads/cover-photos/Erfel_Contiga_Suriaga-20251122133846.jpeg', '1997-04-27', 'Male', 'Single', 'Prk Kalubihan', 'DAGA', 'CADIZ CITY', 'NEGROS OCCIDENTAL', 'NIR', 'Philippines', '', 'with Doctorate Degree', 'PNU Visayas', 'Teacher', 'suriagaerfel@gmail.com', '09942762632', 'erfelsuriaga', '$2y$10$DZ4q2gC6udSEHqYUDulVDe1RBrRM7NCVAVFb1Z47R/2ubxTq2k9oG', '', 'Basic User', 'Teacher', 'Writer', 'Editor', 'Site Manager', 'Data Analyst', 'Developer', 'Funder', 'Verified', 'Kept', '2025-10-08 14:24:42', '8894d06e414e2e4e98467f42b2e86cdf51df3da3abdec150f1851d4bfa1a1a11', '2025-12-02 21:57:56', 'landbank', 'Erfel Suriaga', '09942761634', 'Monday-Friday(8am -9am)'),
(9, '25000000009', 'na', '', 'na', 'Holy Infant Academy', 'HIA is a catholic school that commits itself to guide young boys and girls into a search of a true and authentic education which recognizes the greatness of God and the nothingness of man.', 'School', 1, '/uploads/profile-pictures/Holy_Infant_Academy-20251115224017.jpeg', '/uploads/cover-photos/Holy_Infant_Academy-20251115223950.jpeg', '0000-00-00', '', '', '', 'CAPANICKIAN NORTE', 'ALLACAPAN', 'CAGAYAN', 'REGION II', 'Philippines', '', '', '', '', 'sirversafel@gmail.com', '09942762632', 'sirversafel', '$2y$10$EY5ISxLZDiTZ/xoEcBnQM.iSLhhQl/4QyaiMlQgjZuBusdBkzX1KW', '', 'Elementary School', '', '', '', '', '', '', '', 'Verified', 'Kept', '2025-10-18 11:50:01', '', '0000-00-00 00:00:00', '', '', '', ''),
(15, '25000000015', 'Nonoy', '', 'Trebyu', 'Nonoy  Trebyu', '', 'Personal', 1, '', '', '2025-10-11', 'Male', 'Single', 'Prk Kalubihan', 'ALILEM DAYA (POB.)', 'ALILEM', 'ILOCOS SUR', 'REGION I', 'Philippines', '', 'Elementary Graduate', 'PNU Visayas', 'Teacher', 'noytrebyu@gmail.com', '09942762632', 'noytrebyu', '$2y$10$YhtX4E82xeeewo85AzHwReXB44ndXRDMgu7ZKcDGUBKMFC7vMcI8S', '', 'Basic User', '', '', '', '', '', '', '', 'Verified', 'Kept', '2025-10-22 10:18:53', '', '0000-00-00 00:00:00', '', '', '', ''),
(16, '25000000016', 'Erfiaga', '', 'Publishing', 'Erfiaga Publishing', '', 'Personal', 1, '', '', '2025-10-15', 'Hide Gender', '', '', '', '', '', '', '', '', '', '', '', 'erfiagaprintsandbooks@gmail.com', '', 'erfiaga', '$2y$10$YiTGGjQ30rKhWRG7iOfWM.Oj5xua63HL74cTaqHgma2.sEya9yfSi', '', 'Basic User', '', '', '', '', '', '', '', 'Verified', 'Revoked', '2025-10-30 11:53:47', '', '0000-00-00 00:00:00', '', '', '', ''),
(18, '', 'Erfel', '', 'Printing', 'Erfel  Printing', '', 'Personal', 1, '', '', '2025-11-18', 'Male', '', '', 'DURIPES', 'BACARRA', 'ILOCOS NORTE', 'REGION I', 'Philippines', '', 'Associate Degree Holder', '', '', 'erfelprintingservices@gmail.com', '', 'eps', '$2y$10$I.d83QSfQ/LX5RJkvcG56OYuAToGU17g82TT5GLqpKGBhlqvQEKiC', '', 'Basic User', 'Teacher', 'Writer', 'Editor', '', '', '', '', 'Verified', 'Revoked', '2025-11-11 16:37:14', 'f5def5aa322491ee0d030f2e8bd6f1e1e0d0733650c34d6f13e5790aefb2c21d', '2025-11-17 19:34:02', 'GCASH', 'ddfdgdsg', 'dfgdgdg', 'fgfxgdfg');

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
(3, 'Research 1', '', 'Correlational', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.', '', 'pdf', 9, 'None', '2025-11-08 13:55:45', '2025-11-20', '2025-11-08 13:55:48', '2025-11-08 13:55:48', 'Published', '/uploads/documents/school/9-52657365617263682031.pdf'),
(4, 'Research 2', '', 'Experimental', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.', '', 'pdf', 9, 'et al', '2025-11-08 14:01:30', '2025-11-18', '2025-11-08 14:01:33', '2025-11-08 14:01:33', 'Published', '/uploads/documents/school/9-52657365617263682032.pdf'),
(5, 'Research 3', '', 'Experimental', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.', '', 'pdf', 9, 'et al', '2025-11-08 16:17:04', '2025-11-26', '2025-11-08 16:17:07', '2025-11-08 16:17:07', 'Published', '/uploads/documents/school/9-52657365617263682033.pdf'),
(6, 'Research 4', '', 'Correlational', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.', '', 'pdf', 9, 'et al', '2025-11-08 16:17:36', '2025-11-12', '2025-11-08 16:17:37', '2025-11-08 16:17:37', 'Published', '/uploads/documents/school/9-52657365617263682034.pdf'),
(7, 'Research 5', '', 'Case Study', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.', '', 'pdf', 9, 'et al', '2025-11-08 16:18:22', '2025-11-11', '2025-11-08 16:23:51', '2025-11-08 16:23:51', 'Published', '/uploads/documents/school/9-52657365617263682035.pdf'),
(8, 'Research 6', '', 'Experimental', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.', '', 'pdf', 9, 'et al', '2025-11-08 16:18:46', '2025-11-06', '2025-11-08 16:18:51', '2025-11-08 16:18:51', 'Published', '/uploads/documents/school/9-52657365617263682036.pdf'),
(9, 'Research 7', '', 'Descriptive', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.', '', 'pdf', 9, 'et al', '2025-11-08 16:21:35', '2025-05-15', '2025-11-08 16:23:46', '2025-11-08 16:23:46', 'Published', '/uploads/documents/school/9-52657365617263682037.pdf'),
(10, 'Research 8', '', 'Correlational', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.', '', 'pdf', 9, 'et al', '2025-11-08 16:22:00', '2025-11-12', '2025-11-08 16:23:42', '2025-11-08 16:23:42', 'Published', '/uploads/documents/school/9-52657365617263682038.pdf'),
(11, 'Research 9', '', 'Correlational', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.', '', 'pdf', 9, 'et al', '2025-11-08 16:22:27', '2025-11-13', '2025-11-08 16:23:37', '2025-11-08 16:23:37', 'Published', '/uploads/documents/school/9-52657365617263682039.pdf'),
(12, 'Research 10', '', 'Correlational', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.', '', 'pdf', 9, 'et al', '2025-11-08 16:23:02', '2025-11-26', '2025-11-08 16:23:33', '2025-11-08 16:23:33', 'Published', '/uploads/documents/school/9-5265736561726368203130.pdf'),
(13, 'Research 11', '', 'Descriptive', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.', '', 'pdf', 9, 'et al', '2025-11-08 16:23:27', '2025-11-05', '2025-11-08 16:23:30', '2025-11-08 16:23:30', 'Published', '/uploads/documents/school/9-5265736561726368203131.pdf'),
(14, 'Research 12', '', 'Experimental', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of &quot;de Finibus Bonorum et Malorum&quot; (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, &quot;Lorem ipsum dolor sit amet..&quot;, comes from a line in section 1.10.32.vbbbagggg', '', 'pdf', 9, 'et al', '2025-11-08 16:24:54', '2025-11-19', '2025-11-08 16:24:55', '2025-11-27 16:08:25', 'Unpublished', '/uploads/documents/school/9-5265736561726368203132.pdf'),
(16, 'sssgfdhffHNFFgggghhff', '', 'Descriptive', 'gfgfgf', '', 'pdf', 9, 'dhfdhdfhfgh', '2025-11-13 21:48:43', '2025-10-29', '0000-00-00 00:00:00', '2025-11-13 21:48:43', 'Draft', '/uploads/documents/school/9-737373676664686666484e46466767676768686666.pdf'),
(17, 'sssgfdhffHNFFgggghhffhh', '', 'Descriptive', 'dxgfhf', '', 'pdf', 9, 'hgfj', '2025-11-13 21:50:34', '2025-10-29', '0000-00-00 00:00:00', '2025-11-13 21:50:34', 'Draft', '/uploads/documents/school/9-737373676664686666484e464667676767686866666868.pdf'),
(18, 'gfgg', '', 'Correlational', 'fggsdgg', '', 'pdf', 9, 'sgdgdgg', '2025-11-14 09:57:15', '2025-11-05', '0000-00-00 00:00:00', '2025-11-14 09:57:15', 'Draft', '/uploads/documents/school/9-67666767.pdf'),
(19, 'gfggfgg', '', 'Correlational', 'fggsdgg', '', 'pdf', 9, 'sgdgdgg', '2025-11-14 09:58:06', '2025-11-05', '0000-00-00 00:00:00', '2025-11-14 09:58:06', 'Draft', '/uploads/documents/school/9-67666767666767.pdf'),
(20, 'gfggfggggg', '', 'Correlational', 'fggsdgg', '', 'pdf', 9, 'sgdgdgg', '2025-11-14 10:04:12', '2025-11-05', '0000-00-00 00:00:00', '2025-11-14 10:04:12', 'Draft', '/uploads/documents/school/9-67666767666767676767.pdf'),
(21, 'xgfh', '', 'Correlational', 'gfgfjgfj', '', 'pdf', 9, 'ghgfhf', '2025-11-14 10:12:32', '2025-11-04', '0000-00-00 00:00:00', '2025-11-14 10:12:32', 'Draft', '/uploads/documents/school/9-78676668.pdf'),
(22, 'gfhgfjj', '', 'Experimental', 'ghdhgh', '', 'pdf', 9, 'dffdh', '2025-11-14 10:30:44', '2025-11-12', '0000-00-00 00:00:00', '2025-11-14 10:30:44', 'Draft', '/uploads/documents/school/9-67666867666a6a.pdf'),
(23, 'sdgfdgfd', '', 'Correlational', 'gfhgfhgf', '', 'pdf', 9, 'hfh', '2025-11-14 10:40:06', '2025-11-12', '0000-00-00 00:00:00', '2025-11-14 10:40:06', 'Draft', '/uploads/documents/school/9-7364676664676664.pdf'),
(24, 'dgdg', '', 'Experimental', 'hfghgfh', '', 'pdf', 9, 'fdfdh', '2025-11-14 10:42:54', '2025-11-13', '0000-00-00 00:00:00', '2025-11-14 10:42:54', 'Draft', '/uploads/documents/school/9-64676467.pdf'),
(25, 'dgxgdg', '', 'Correlational', 'ffj', '', 'pdf', 9, 'ghgfjgfj', '2025-11-14 10:44:17', '2025-11-12', '0000-00-00 00:00:00', '2025-11-14 10:44:18', 'Draft', '/uploads/documents/school/9-646778676467.pdf'),
(26, 'xvfgfgfd', '', 'Correlational', 'vjvhjhhg', '', 'pdf', 9, 'hgjjgj', '2025-11-15 22:12:59', '2025-11-20', '0000-00-00 00:00:00', '2025-11-15 22:12:59', 'Draft', '/uploads/documents/school/9-7876666766676664.pdf'),
(27, 'New Research for Today: Must be approved for  1$', 'new+research+for+today+must+be+approved+for+1', 'Descriptive', 'sfdsgfdhgfggkhgk', '', 'pdf', 9, 'sdfdsgsdgsdgdsg', '2025-11-28 19:43:39', '2025-11-07', '2025-11-28 19:43:42', '2025-11-28 19:43:42', 'Published', '/uploads/documents/school/9-4e657720526573656172636820666f7220546f6461793a204d75737420626520617070726f76656420666f7220203124.pdf'),
(28, 'New Research 2 for Today: Must be approved for  1$', 'new+research+2+for+today+must+be+approved+for+1', 'Causal-comparative', 'ddgfdhfgh', '', 'pdf', 9, 'sdgdsg', '2025-11-28 20:36:42', '2025-11-12', '2025-11-28 20:36:44', '2025-11-28 22:31:36', 'Unpublished', '/uploads/documents/school/9-4e6577205265736561726368203220666f7220546f6461793a204d75737420626520617070726f76656420666f7220203124.pdf'),
(29, 'zvxggfdgg', 'zvxggfdgg', 'Correlational', 'fdhfhfdh', '', 'pdf', 9, 'gffhfh', '2025-11-28 22:48:33', '2025-11-13', '2025-11-28 22:48:36', '2025-11-28 22:48:36', 'Published', '/uploads/documents/school/9-7a7678676766646767.pdf'),
(30, 'dfdgfdgf', 'dfdgfdgf', 'Correlational', 'fgfdgsgsgg', '', 'pdf', 9, 'dgxgsdg', '2025-12-01 21:42:12', '2025-12-10', '0000-00-00 00:00:00', '2025-12-01 21:42:12', 'Draft', '/uploads/documents/school/9-6466646766646766.pdf');

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

INSERT INTO `teacher_files` (`teacher_fileId`, `teacher_fileTitle`, `teacher_fileSlug`, `teacher_fileCategory`, `teacher_fileAccessType`, `teacher_fileSharedWith`, `teacher_fileDescription`, `teacher_fileImage`, `teacher_fileFormat`, `teacher_fileOwner`, `teacher_fileUploadDate`, `teacher_filePubDate`, `teacher_fileUpdateDate`, `teacher_fileStatus`, `teacher_fileForSale`, `teacher_fileAmount`, `teacher_fileLink`) VALUES
(1, 'Test Paper for Grade 2 Science First Grading', '', 'Syllabus', 'Free', '', 'Test Paper for Grade 2 Science First Gradinggs', '', 'pdf', '1', '2025-11-13 12:40:05', '2025-11-13 12:41:23', '2025-12-03 13:20:42', 'Published', 'Not for Sale', 0, '/uploads/documents/teacher/1-5465737420506170657220666f72204772616465203220536369656e63652046697273742047726164696e67.pdf'),
(11, 'Lesson plan 2', '', 'Syllabus', 'Free', '', 'sddffgnfng', '', 'pdf', '18', '2025-11-14 17:29:43', '2025-11-14 17:30:04', '2025-11-14 17:30:04', 'Published', 'Not for Sale', 0, '/uploads/documents/teacher/18-4c6573736f6e20706c616e2032.pdf'),
(12, 'lesson plan 3', '', 'Lesson Plan', 'Purchased', '', 'gegrhgrnnhghgmhmym', '', 'pdf', '18', '2025-11-14 17:33:00', '2025-11-27 15:47:03', '2025-11-27 15:47:08', 'Published', 'For Sale', 20, '/uploads/documents/teacher/18-6c6573736f6e20706c616e2033.pdf');

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
(99, 'Terms of Use', 'terms+of+use', '', 'Administrative', 'Terms of Use', 1, 'Erfel Contiga Suriaga', '', '2025-12-01 19:50:34', '2025-12-01 19:50:38', '2025-12-01 19:50:38', '<p data-start=\"234\" data-end=\"250\"><strong data-start=\"234\" data-end=\"250\">Terms of Use</strong></p>\r\n<p data-start=\"252\" data-end=\"278\"><strong data-start=\"252\" data-end=\"278\">Effective Date: [Date]</strong></p>\r\n<p data-start=\"280\" data-end=\"591\">Welcome to [Your Web App Name] (the “Service”), provided by [Your Company Name] (“we”, “us”, or “our”). By accessing or using our website and web application (the \"App\"), you agree to comply with and be bound by these Terms of Use (the \"Agreement\"). If you do not agree with these terms, do not use the Service.</p>\r\n<h3 data-start=\"593\" data-end=\"623\">1. <strong data-start=\"600\" data-end=\"623\">Acceptance of Terms</strong></h3>\r\n<p data-start=\"624\" data-end=\"928\">By accessing or using the Service, you agree to these Terms of Use, as well as any additional terms, conditions, or policies that may apply to specific features or services available through the Service. If you do not agree to any of these terms, you must immediately discontinue your use of the Service.</p>\r\n<h3 data-start=\"930\" data-end=\"952\">2. <strong data-start=\"937\" data-end=\"952\">Eligibility</strong></h3>\r\n<p data-start=\"953\" data-end=\"1143\">You must be at least [18] years of age (or the legal age of majority in your jurisdiction) to use the Service. By using the Service, you represent and warrant that you are eligible to do so.</p>\r\n<h3 data-start=\"1145\" data-end=\"1176\">3. <strong data-start=\"1152\" data-end=\"1176\">Account Registration</strong></h3>\r\n<p data-start=\"1177\" data-end=\"1561\">To access certain features of the Service, you may be required to create an account. You agree to provide accurate, current, and complete information during the registration process and to update your information to keep it accurate and complete. You are responsible for maintaining the confidentiality of your account credentials and for all activities that occur under your account.</p>\r\n<h3 data-start=\"1563\" data-end=\"1592\">4. <strong data-start=\"1570\" data-end=\"1592\">Use of the Service</strong></h3>\r\n<p data-start=\"1593\" data-end=\"1812\">You agree to use the Service in accordance with all applicable local, state, and international laws. You are solely responsible for your conduct and any data or content you upload, post, or transmit through the Service.</p>\r\n<ul data-start=\"1814\" data-end=\"2041\">\r\n<li data-start=\"1814\" data-end=\"1910\">\r\n<p data-start=\"1816\" data-end=\"1910\">You agree not to use the Service for any unlawful, harmful, fraudulent, or malicious purposes.</p>\r\n</li>\r\n<li data-start=\"1911\" data-end=\"2041\">\r\n<p data-start=\"1913\" data-end=\"2041\">You will not attempt to gain unauthorized access to any part of the Service or any systems or networks connected to the Service.</p>\r\n</li>\r\n</ul>\r\n<h3 data-start=\"2043\" data-end=\"2066\">5. <strong data-start=\"2050\" data-end=\"2066\">User Content</strong></h3>\r\n<p data-start=\"2067\" data-end=\"2320\">You may be allowed to upload, submit, or transmit content through the Service (\"User Content\"). By submitting User Content, you grant us a non-exclusive, worldwide, royalty-free license to use, display, and distribute the content as part of the Service.</p>\r\n<p data-start=\"2322\" data-end=\"2494\">You are solely responsible for the User Content you provide and agree not to submit content that violates any intellectual property rights, laws, or any third-party rights.</p>\r\n<h3 data-start=\"2496\" data-end=\"2514\">6. <strong data-start=\"2503\" data-end=\"2514\">Privacy</strong></h3>\r\n<p data-start=\"2515\" data-end=\"2764\">We respect your privacy. Our collection, use, and sharing of personal information are governed by our Privacy Policy, which is incorporated into these Terms of Use by reference. Please review our Privacy Policy to understand how we handle your data.</p>\r\n<h3 data-start=\"2766\" data-end=\"2798\">7. <strong data-start=\"2773\" data-end=\"2798\">Prohibited Activities</strong></h3>\r\n<p data-start=\"2799\" data-end=\"2858\">You agree not to engage in any of the following activities:</p>\r\n<ul data-start=\"2860\" data-end=\"3233\">\r\n<li data-start=\"2860\" data-end=\"2987\">\r\n<p data-start=\"2862\" data-end=\"2987\">Impersonating any person or entity, or falsely stating or otherwise misrepresenting your affiliation with a person or entity.</p>\r\n</li>\r\n<li data-start=\"2988\" data-end=\"3081\">\r\n<p data-start=\"2990\" data-end=\"3081\">Interfering with or disrupting the Service or servers or networks connected to the Service.</p>\r\n</li>\r\n<li data-start=\"3082\" data-end=\"3134\">\r\n<p data-start=\"3084\" data-end=\"3134\">Uploading viruses, malware, or other harmful code.</p>\r\n</li>\r\n<li data-start=\"3135\" data-end=\"3233\">\r\n<p data-start=\"3137\" data-end=\"3233\">Engaging in data mining, scraping, or extracting content from the Service without authorization.</p>\r\n</li>\r\n</ul>\r\n<h3 data-start=\"3235\" data-end=\"3257\">8. <strong data-start=\"3242\" data-end=\"3257\">Termination</strong></h3>\r\n<p data-start=\"3258\" data-end=\"3430\">We may suspend or terminate your access to the Service at our sole discretion, without notice, for any reason, including if we believe you have violated these Terms of Use.</p>\r\n<h3 data-start=\"3432\" data-end=\"3454\">9. <strong data-start=\"3439\" data-end=\"3454\">Disclaimers</strong></h3>\r\n<p data-start=\"3455\" data-end=\"3645\">The Service is provided “as is” and “as available” without warranties of any kind, either express or implied. We do not warrant that the Service will be error-free, secure, or uninterrupted.</p>\r\n<h3 data-start=\"3647\" data-end=\"3682\">10. <strong data-start=\"3655\" data-end=\"3682\">Limitation of Liability</strong></h3>\r\n<p data-start=\"3683\" data-end=\"3893\">To the maximum extent permitted by law, [Your Company Name] will not be liable for any direct, indirect, incidental, special, or consequential damages arising out of your use of or inability to use the Service.</p>\r\n<h3 data-start=\"3895\" data-end=\"3922\">11. <strong data-start=\"3903\" data-end=\"3922\">Indemnification</strong></h3>\r\n<p data-start=\"3923\" data-end=\"4186\">You agree to indemnify and hold [Your Company Name] and its affiliates, officers, employees, and agents harmless from any claims, losses, liabilities, and expenses (including legal fees) arising out of your use of the Service or your breach of these Terms of Use.</p>\r\n<h3 data-start=\"4188\" data-end=\"4220\">12. <strong data-start=\"4196\" data-end=\"4220\">Changes to the Terms</strong></h3>\r\n<p data-start=\"4221\" data-end=\"4525\">We reserve the right to modify, update, or change these Terms of Use at any time. We will provide notice of any material changes by updating the effective date at the top of this page. Your continued use of the Service after the effective date of any changes constitutes your acceptance of those changes.</p>\r\n<h3 data-start=\"4527\" data-end=\"4552\">13. <strong data-start=\"4535\" data-end=\"4552\">Governing Law</strong></h3>\r\n<p data-start=\"4553\" data-end=\"4708\">These Terms of Use will be governed by and construed in accordance with the laws of the state of [State], without regard to its conflict of law principles.</p>\r\n<h3 data-start=\"4710\" data-end=\"4740\">14. <strong data-start=\"4718\" data-end=\"4740\">Dispute Resolution</strong></h3>\r\n<p data-start=\"4741\" data-end=\"5058\">Any disputes or claims arising from or related to these Terms of Use or the Service shall be resolved through binding arbitration in [Location], in accordance with the rules of [Arbitration Organization], and judgment on the award rendered by the arbitrator(s) may be entered in any court having jurisdiction thereof.</p>\r\n<h3 data-start=\"5060\" data-end=\"5082\">15. <strong data-start=\"5068\" data-end=\"5082\">Contact Us</strong></h3>\r\n<p data-start=\"5083\" data-end=\"5156\">If you have any questions about these Terms of Use, please contact us at:</p>\r\n<p data-start=\"5158\" data-end=\"5224\">[Your Company Name]<br data-start=\"5177\" data-end=\"5180\">\r\n[Address]<br data-start=\"5189\" data-end=\"5192\">\r\n[Email Address]<br data-start=\"5207\" data-end=\"5210\">\r\n[Phone Number]</p>                    ', 1, 'Published', ''),
(100, 'Data Privacy', 'data+privacy', '', 'Administrative', 'Data Privacy', 1, 'Erfel Contiga Suriaga', '', '2025-12-01 20:04:42', '2025-12-01 20:04:44', '2025-12-01 20:04:44', 'This our data privacy page...', 1, 'Published', ''),
(101, 'About Us', 'about+us', '', 'Administrative', 'About Us', 1, 'Erfel Contiga Suriaga', '', '2025-12-01 20:05:29', '2025-12-01 20:05:30', '2025-12-01 20:05:30', 'This is our about page...', 1, 'Published', ''),
(102, 'ererewtt', 'ererewtt', '', 'News', 'dffsg', 1, 'Erfel Contiga Suriaga', '1', '2025-12-01 22:04:37', '2025-12-01 22:05:37', '2025-12-01 22:04:40', '            fddfdfdfhdfgfdgfdghhgfhh', 2, 'To Revise', 'gffhfh'),
(103, 'fdsdsgdsg', 'fdsdsgdsg', '', 'News', 'ffgfdgsdg', 1, 'Erfel  Suriaga', '', '2025-12-03 10:07:27', '2025-12-03 10:07:37', '0000-00-00 00:00:00', 'dgdsgdsgdsg', 2, 'Draft', '');

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
(27, '2025-12-01 11:50:34', 99, 1, '<p data-start=\"234\" data-end=\"250\"><strong data-start=\"234\" data-end=\"250\">Terms of Use</strong></p>\r\n<p data-start=\"252\" data-end=\"278\"><strong data-start=\"252\" data-end=\"278\">Effective Date: [Date]</strong></p>\r\n<p data-start=\"280\" data-end=\"591\">Welcome to [Your Web App Name] (the “Service”), provided by [Your Company Name] (“we”, “us”, or “our”). By accessing or using our website and web application (the \"App\"), you agree to comply with and be bound by these Terms of Use (the \"Agreement\"). If you do not agree with these terms, do not use the Service.</p>\r\n<h3 data-start=\"593\" data-end=\"623\">1. <strong data-start=\"600\" data-end=\"623\">Acceptance of Terms</strong></h3>\r\n<p data-start=\"624\" data-end=\"928\">By accessing or using the Service, you agree to these Terms of Use, as well as any additional terms, conditions, or policies that may apply to specific features or services available through the Service. If you do not agree to any of these terms, you must immediately discontinue your use of the Service.</p>\r\n<h3 data-start=\"930\" data-end=\"952\">2. <strong data-start=\"937\" data-end=\"952\">Eligibility</strong></h3>\r\n<p data-start=\"953\" data-end=\"1143\">You must be at least [18] years of age (or the legal age of majority in your jurisdiction) to use the Service. By using the Service, you represent and warrant that you are eligible to do so.</p>\r\n<h3 data-start=\"1145\" data-end=\"1176\">3. <strong data-start=\"1152\" data-end=\"1176\">Account Registration</strong></h3>\r\n<p data-start=\"1177\" data-end=\"1561\">To access certain features of the Service, you may be required to create an account. You agree to provide accurate, current, and complete information during the registration process and to update your information to keep it accurate and complete. You are responsible for maintaining the confidentiality of your account credentials and for all activities that occur under your account.</p>\r\n<h3 data-start=\"1563\" data-end=\"1592\">4. <strong data-start=\"1570\" data-end=\"1592\">Use of the Service</strong></h3>\r\n<p data-start=\"1593\" data-end=\"1812\">You agree to use the Service in accordance with all applicable local, state, and international laws. You are solely responsible for your conduct and any data or content you upload, post, or transmit through the Service.</p>\r\n<ul data-start=\"1814\" data-end=\"2041\">\r\n<li data-start=\"1814\" data-end=\"1910\">\r\n<p data-start=\"1816\" data-end=\"1910\">You agree not to use the Service for any unlawful, harmful, fraudulent, or malicious purposes.</p>\r\n</li>\r\n<li data-start=\"1911\" data-end=\"2041\">\r\n<p data-start=\"1913\" data-end=\"2041\">You will not attempt to gain unauthorized access to any part of the Service or any systems or networks connected to the Service.</p>\r\n</li>\r\n</ul>\r\n<h3 data-start=\"2043\" data-end=\"2066\">5. <strong data-start=\"2050\" data-end=\"2066\">User Content</strong></h3>\r\n<p data-start=\"2067\" data-end=\"2320\">You may be allowed to upload, submit, or transmit content through the Service (\"User Content\"). By submitting User Content, you grant us a non-exclusive, worldwide, royalty-free license to use, display, and distribute the content as part of the Service.</p>\r\n<p data-start=\"2322\" data-end=\"2494\">You are solely responsible for the User Content you provide and agree not to submit content that violates any intellectual property rights, laws, or any third-party rights.</p>\r\n<h3 data-start=\"2496\" data-end=\"2514\">6. <strong data-start=\"2503\" data-end=\"2514\">Privacy</strong></h3>\r\n<p data-start=\"2515\" data-end=\"2764\">We respect your privacy. Our collection, use, and sharing of personal information are governed by our Privacy Policy, which is incorporated into these Terms of Use by reference. Please review our Privacy Policy to understand how we handle your data.</p>\r\n<h3 data-start=\"2766\" data-end=\"2798\">7. <strong data-start=\"2773\" data-end=\"2798\">Prohibited Activities</strong></h3>\r\n<p data-start=\"2799\" data-end=\"2858\">You agree not to engage in any of the following activities:</p>\r\n<ul data-start=\"2860\" data-end=\"3233\">\r\n<li data-start=\"2860\" data-end=\"2987\">\r\n<p data-start=\"2862\" data-end=\"2987\">Impersonating any person or entity, or falsely stating or otherwise misrepresenting your affiliation with a person or entity.</p>\r\n</li>\r\n<li data-start=\"2988\" data-end=\"3081\">\r\n<p data-start=\"2990\" data-end=\"3081\">Interfering with or disrupting the Service or servers or networks connected to the Service.</p>\r\n</li>\r\n<li data-start=\"3082\" data-end=\"3134\">\r\n<p data-start=\"3084\" data-end=\"3134\">Uploading viruses, malware, or other harmful code.</p>\r\n</li>\r\n<li data-start=\"3135\" data-end=\"3233\">\r\n<p data-start=\"3137\" data-end=\"3233\">Engaging in data mining, scraping, or extracting content from the Service without authorization.</p>\r\n</li>\r\n</ul>\r\n<h3 data-start=\"3235\" data-end=\"3257\">8. <strong data-start=\"3242\" data-end=\"3257\">Termination</strong></h3>\r\n<p data-start=\"3258\" data-end=\"3430\">We may suspend or terminate your access to the Service at our sole discretion, without notice, for any reason, including if we believe you have violated these Terms of Use.</p>\r\n<h3 data-start=\"3432\" data-end=\"3454\">9. <strong data-start=\"3439\" data-end=\"3454\">Disclaimers</strong></h3>\r\n<p data-start=\"3455\" data-end=\"3645\">The Service is provided “as is” and “as available” without warranties of any kind, either express or implied. We do not warrant that the Service will be error-free, secure, or uninterrupted.</p>\r\n<h3 data-start=\"3647\" data-end=\"3682\">10. <strong data-start=\"3655\" data-end=\"3682\">Limitation of Liability</strong></h3>\r\n<p data-start=\"3683\" data-end=\"3893\">To the maximum extent permitted by law, [Your Company Name] will not be liable for any direct, indirect, incidental, special, or consequential damages arising out of your use of or inability to use the Service.</p>\r\n<h3 data-start=\"3895\" data-end=\"3922\">11. <strong data-start=\"3903\" data-end=\"3922\">Indemnification</strong></h3>\r\n<p data-start=\"3923\" data-end=\"4186\">You agree to indemnify and hold [Your Company Name] and its affiliates, officers, employees, and agents harmless from any claims, losses, liabilities, and expenses (including legal fees) arising out of your use of the Service or your breach of these Terms of Use.</p>\r\n<h3 data-start=\"4188\" data-end=\"4220\">12. <strong data-start=\"4196\" data-end=\"4220\">Changes to the Terms</strong></h3>\r\n<p data-start=\"4221\" data-end=\"4525\">We reserve the right to modify, update, or change these Terms of Use at any time. We will provide notice of any material changes by updating the effective date at the top of this page. Your continued use of the Service after the effective date of any changes constitutes your acceptance of those changes.</p>\r\n<h3 data-start=\"4527\" data-end=\"4552\">13. <strong data-start=\"4535\" data-end=\"4552\">Governing Law</strong></h3>\r\n<p data-start=\"4553\" data-end=\"4708\">These Terms of Use will be governed by and construed in accordance with the laws of the state of [State], without regard to its conflict of law principles.</p>\r\n<h3 data-start=\"4710\" data-end=\"4740\">14. <strong data-start=\"4718\" data-end=\"4740\">Dispute Resolution</strong></h3>\r\n<p data-start=\"4741\" data-end=\"5058\">Any disputes or claims arising from or related to these Terms of Use or the Service shall be resolved through binding arbitration in [Location], in accordance with the rules of [Arbitration Organization], and judgment on the award rendered by the arbitrator(s) may be entered in any court having jurisdiction thereof.</p>\r\n<h3 data-start=\"5060\" data-end=\"5082\">15. <strong data-start=\"5068\" data-end=\"5082\">Contact Us</strong></h3>\r\n<p data-start=\"5083\" data-end=\"5156\">If you have any questions about these Terms of Use, please contact us at:</p>\r\n<p data-start=\"5158\" data-end=\"5224\">[Your Company Name]<br data-start=\"5177\" data-end=\"5180\">\r\n[Address]<br data-start=\"5189\" data-end=\"5192\">\r\n[Email Address]<br data-start=\"5207\" data-end=\"5210\">\r\n[Phone Number]</p>                    '),
(28, '2025-12-01 12:04:42', 100, 1, 'This our data privacy page...'),
(29, '2025-12-01 12:05:29', 101, 1, 'This is our about page...'),
(30, '2025-12-01 14:04:37', 102, 1, 'fddfdfdfhdfgfdgfdg'),
(31, '2025-12-01 14:05:37', 102, 2, '            fddfdfdfhdfgfdgfdghhgfhh'),
(32, '2025-12-03 02:07:27', 103, 1, '                    '),
(33, '2025-12-03 02:07:37', 103, 2, 'dgdsgdsgdsg');

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
-- Indexes for table `promotional_contents`
--
ALTER TABLE `promotional_contents`
  ADD PRIMARY KEY (`promotional_contentId`);

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
-- Indexes for table `teacher_files`
--
ALTER TABLE `teacher_files`
  ADD PRIMARY KEY (`teacher_fileId`);

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
  MODIFY `contentId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=191;

--
-- AUTO_INCREMENT for table `content_performance`
--
ALTER TABLE `content_performance`
  MODIFY `content_viewId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `developer_tools`
--
ALTER TABLE `developer_tools`
  MODIFY `developer_toolId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `developer_uploaded_files`
--
ALTER TABLE `developer_uploaded_files`
  MODIFY `developer_uploadedFileId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

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
  MODIFY `file_purchaseId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `funder_registrations`
--
ALTER TABLE `funder_registrations`
  MODIFY `funderId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `other_registrations`
--
ALTER TABLE `other_registrations`
  MODIFY `otherId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `promotional_contents`
--
ALTER TABLE `promotional_contents`
  MODIFY `promotional_contentId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `registrant_activities`
--
ALTER TABLE `registrant_activities`
  MODIFY `registrant_activityId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=443;

--
-- AUTO_INCREMENT for table `registrant_subscriptions`
--
ALTER TABLE `registrant_subscriptions`
  MODIFY `registrant_subscriptionId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `registrations`
--
ALTER TABLE `registrations`
  MODIFY `registrantId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `school_researches`
--
ALTER TABLE `school_researches`
  MODIFY `school_researchId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `teacher_files`
--
ALTER TABLE `teacher_files`
  MODIFY `teacher_fileId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

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
  MODIFY `writer_articleId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `writer_article_versions`
--
ALTER TABLE `writer_article_versions`
  MODIFY `writer_articleVersionId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `writer_registrations`
--
ALTER TABLE `writer_registrations`
  MODIFY `writerId` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
