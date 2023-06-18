-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2023-06-15 16:31:55
-- 伺服器版本： 10.4.27-MariaDB
-- PHP 版本： 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `myvote`
--

-- --------------------------------------------------------

--
-- 資料表結構 `options`
--

CREATE TABLE `options` (
  `opt_id` int(10) UNSIGNED NOT NULL,
  `topic_id` varchar(200) NOT NULL,
  `opt` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `options`
--

INSERT INTO `options` (`opt_id`, `topic_id`, `opt`) VALUES
(1, '14', '01'),
(2, '15', '01'),
(3, '15', '02'),
(4, '15', '03'),
(5, '15', '04'),
(6, '15', '05'),
(7, '15', '06'),
(8, '16', '01'),
(9, '16', '02'),
(10, '16', '03');

-- --------------------------------------------------------

--
-- 資料表結構 `prs`
--

CREATE TABLE `prs` (
  `pr_id` int(11) NOT NULL,
  `pr` int(10) NOT NULL,
  `pr_descrition` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `prs`
--

INSERT INTO `prs` (`pr_id`, `pr`, `pr_descrition`) VALUES
(1, 1, 'super'),
(3, 2, 'poster'),
(4, 0, 'menber');

-- --------------------------------------------------------

--
-- 資料表結構 `questions`
--

CREATE TABLE `questions` (
  `q_id` int(11) NOT NULL,
  `topic_id` int(11) NOT NULL,
  `q` varchar(200) NOT NULL,
  `q_type` int(11) NOT NULL,
  `q_option` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `topics`
--

CREATE TABLE `topics` (
  `topic_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `start_time` datetime NOT NULL,
  `stop_time` datetime NOT NULL,
  `created_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `upate_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `subject` varchar(60) NOT NULL,
  `img` text NOT NULL,
  `q_type` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `topics`
--

INSERT INTO `topics` (`topic_id`, `user_id`, `start_time`, `stop_time`, `created_time`, `upate_time`, `subject`, `img`, `q_type`) VALUES
(15, 1, '2023-06-15 10:39:00', '2023-06-30 10:41:00', '2023-06-15 02:36:59', '2023-06-15 02:36:59', '06151036', '', 2),
(16, 1, '2023-06-15 10:39:00', '2023-06-30 10:41:00', '2023-06-15 02:38:39', '2023-06-15 02:38:39', '06151038', '', 1);

-- --------------------------------------------------------

--
-- 資料表結構 `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  `pr` int(2) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `user`
--

INSERT INTO `user` (`user_id`, `name`, `pr`, `email`, `password`) VALUES
(11, '哀', 2, 'i@gmail.com', 'i'),
(12, '', 0, 'bob@gmail.com', 'bob'),
(13, 'AMY', 0, 'amy@gmail.com', 'amy'),
(14, 'chanel', 0, 'chanel@gmail.com', 'chanel'),
(15, 'one', 0, 'one@gmail.com', 'one'),
(16, 'two', 0, 'two@gmail.com', 'two'),
(17, 'three', 0, 'three@gmail.com', 'three');

-- --------------------------------------------------------

--
-- 資料表結構 `votes`
--

CREATE TABLE `votes` (
  `vote_id` int(11) NOT NULL,
  `opt_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `ans` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`opt_id`);

--
-- 資料表索引 `prs`
--
ALTER TABLE `prs`
  ADD PRIMARY KEY (`pr_id`);

--
-- 資料表索引 `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`q_id`);

--
-- 資料表索引 `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`topic_id`);

--
-- 資料表索引 `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- 資料表索引 `votes`
--
ALTER TABLE `votes`
  ADD PRIMARY KEY (`vote_id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `options`
--
ALTER TABLE `options`
  MODIFY `opt_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `prs`
--
ALTER TABLE `prs`
  MODIFY `pr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `questions`
--
ALTER TABLE `questions`
  MODIFY `q_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `topics`
--
ALTER TABLE `topics`
  MODIFY `topic_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `votes`
--
ALTER TABLE `votes`
  MODIFY `vote_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
