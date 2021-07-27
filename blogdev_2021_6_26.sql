-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 27, 2021 at 06:48 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blogdev_2021_6_26`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `added_on` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `email`, `password`, `added_on`) VALUES
(1, 'ifti', '01iftekharalam@gmail.com', '123', '2021-07-05 09:30:34');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `category` varchar(255) NOT NULL,
  `slug` varchar(20) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1=active, 0=deactive',
  `added_on` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category`, `slug`, `status`, `added_on`, `updated_on`) VALUES
(1, 'php', 'php', 1, '2021-07-05 09:40:40', '2021-07-05 09:40:40'),
(5, 'wordpress', 'wordpress', 1, '2021-07-05 11:48:40', '2021-07-05 11:48:40'),
(6, 'jquery', 'jquery', 1, '2021-07-05 12:38:47', '2021-07-05 12:38:47'),
(7, 'mysqli', 'mysqli', 1, '2021-07-05 12:38:52', '2021-07-05 12:38:52');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `comment_parent_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `comment_by` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `commented_on` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1=active, 0=deactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `comment_parent_id`, `post_id`, `content`, `comment_by`, `user_email`, `commented_on`, `status`) VALUES
(1, 0, 5, 'test', 'test', 'test@gmail.com', '2021-07-07 17:16:35', 1),
(2, 1, 5, 'this is reply', 'admin', 'admin@gmail.com', '2021-07-07 17:23:18', 1),
(3, 0, 5, 'echo test', 'test', 'test@gmail.com', '2021-07-07 17:37:47', 1),
(4, 3, 5, 'reply for echo test', 'admin', 'admin@gmail.com', '2021-07-07 17:38:19', 1),
(5, 3, 5, 'again reply for test', 'ifti', 'ifti@gmail.com', '2021-07-07 17:58:49', 1),
(6, 2, 5, 'Thanks to reply', 'test', 'test@gmail.com', '2021-07-07 18:01:05', 1),
(7, 1, 5, 'my reply', 'me', 'me@gmail.com', '2021-07-07 18:03:12', 1);

-- --------------------------------------------------------

--
-- Table structure for table `comment_reply`
--

CREATE TABLE `comment_reply` (
  `id` int(11) NOT NULL,
  `comment_id` int(11) NOT NULL,
  `reply_content` text NOT NULL,
  `replied_on` timestamp NOT NULL DEFAULT current_timestamp(),
  `replied_by` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1=active, 0=deactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `posted_by` varchar(255) NOT NULL,
  `post_title` text NOT NULL,
  `post_slug` varchar(255) NOT NULL,
  `post_feature_image` varchar(255) NOT NULL,
  `post_article` text NOT NULL,
  `posted_on` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1=active, 0=deactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `category_id`, `posted_by`, `post_title`, `post_slug`, `post_feature_image`, `post_article`, `posted_on`, `updated_on`, `status`) VALUES
(1, 7, 'webdevifti', 'post number one', 'post-number-one', '474228492_837538453_Untitled-1.png', 'one', '2021-07-05 12:42:09', '2021-07-06 04:10:06', 1),
(2, 5, 'webdevifti', 'post two', 'post-two', '226681851_848559874_My Post.png', 'two', '2021-07-05 12:42:38', '2021-07-06 04:10:06', 1),
(3, 1, 'webdevifti', 'post 3', 'post-3', '175417060_904613084_My Post (1).png', 'php test', '2021-07-05 12:43:14', '2021-07-06 04:10:06', 1),
(4, 6, 'webdevifti', 'Lorem ipsum, dolor sit amet', 'Lorem-ipsum,-dolor-sit-amet', '636643339_476329477_102829147_2609808052626255_8387344264869637315_n.jpg', 'Lorem ipsum, dolor sit amet consectetur adipisicing elitLorem ipsum, dolor sit amet consectetur adipisicing elitLorem ipsum, dolor sit amet consectetur adipisicing elitLorem ipsum, dolor sit amet consectetur adipisicing elitLorem ipsum, dolor sit amet consectetur adipisicing elitLorem ipsum, dolor sit amet consectetur adipisicing elitLorem ipsum, dolor sit amet consectetur adipisicing elitLorem ipsum, dolor sit amet consectetur adipisicing elitLorem ipsum, dolor sit amet consectetur adipisicing elitLorem ipsum, dolor sit amet consectetur adipisicing elitLorem ipsum, dolor sit amet consectetur adipisicing elitLorem ipsum, dolor sit amet consectetur adipisicing elitLorem ipsum, dolor sit amet consectetur adipisicing elitLorem ipsum, dolor sit amet consectetur adipisicing elitLorem ipsum, dolor sit amet consectetur adipisicing elitLorem ipsum, dolor sit amet consectetur adipisicing elitLorem ipsum, dolor sit amet consectetur adipisicing elitLorem ipsum, dolor sit amet consectetur adipisicing elitLorem ipsum, dolor sit amet consectetur adipisicing elitLorem ipsum, dolor sit amet consectetur adipisicing elitLorem ipsum, dolor sit amet consectetur adipisicing elitLorem ipsum, dolor sit amet consectetur adipisicing elitLorem ipsum, dolor sit amet consectetur adipisicing elitLorem ipsum, dolor sit amet consectetur adipisicing elitLorem ipsum, dolor sit amet consectetur adipisicing elitLorem ipsum, dolor sit amet consectetur adipisicing elitLorem ipsum, dolor sit amet consectetur adipisicing elitLorem ipsum, dolor sit amet consectetur adipisicing elitLorem ipsum, dolor sit amet consectetur adipisicing elitLorem ipsum, dolor sit amet consectetur adipisicing elitLorem ipsum, dolor sit amet consectetur adipisicing elitLorem ipsum, dolor sit amet consectetur adipisicing elit', '2021-07-05 12:43:50', '2021-07-06 04:10:05', 1),
(5, 5, 'webdevifti', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit', 'Lorem-ipsum,-dolor-sit-amet-consectetur-adipisicing-elit', '453442716_848281145_Photolab-8850086.jpeg', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Temporibus nulla ad nobis repellendus obcaecati, reprehenderit dolor neque ducimus exercitationem fugiat, quos unde magni sapiente doloremque sit? Odio, fugiat at maiores fugit temporibus consectetur vero id ullam. Similique officia temporibus non et eveniet dolore inventore enim unde explicabo! Officia, maxime illum amet excepturi assumenda a eligendi laboriosam velit natus quam dolor laborum provident sit tenetur perspiciatis rerum pariatur dolore quaerat consectetur id! Dignissimos optio sit, alias qui necessitatibus perferendis accusantium eveniet sunt culpa excepturi error dolorem quam tempora, vitae assumenda nobis. Minima quidem quisquam sint deleniti aliquid reprehenderit culpa non adipisci?', '2021-07-05 12:44:12', '2021-07-06 04:10:05', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `category` (`category`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment_reply`
--
ALTER TABLE `comment_reply`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `comment_reply`
--
ALTER TABLE `comment_reply`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
