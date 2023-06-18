-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2023-06-18 11:30:39
-- 伺服器版本： 10.4.24-MariaDB
-- PHP 版本： 8.0.19

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
  `topic_id` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `opt` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL
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
(8, '16', '38-3'),
(9, '16', '38-4'),
(12, '17', '23-5'),
(14, '17', '23+4'),
(15, '17', '0008'),
(16, '16', '38-1'),
(17, '16', '38-2'),
(18, '18', '確定會買'),
(19, '18', '再考慮一下'),
(20, '18', '絕對不會買'),
(21, '19', '暗沉'),
(22, '19', '太油'),
(23, '19', '痘痘'),
(24, '19', '粉刺'),
(25, '19', '皺紋'),
(26, '19', '太乾'),
(27, '20', '值得信賴的'),
(28, '20', '沒有感覺'),
(29, '20', '令人討厭'),
(30, '21', '會注意'),
(31, '21', '不會注意'),
(32, '21', '會特別注意牛肉的而已'),
(33, '22', '很棒'),
(34, '22', '不開心'),
(35, '22', '太少連假'),
(36, '22', '太多補班'),
(37, '23', '北部粽'),
(38, '23', '南部粽'),
(39, '23', '鹼粽'),
(40, '23', '豆沙粽'),
(41, '23', '北平粽'),
(42, '23', '湖州粽'),
(43, '24', '有'),
(44, '24', '沒有，完全不想玩'),
(45, '24', '我現在太忙了，等有空再玩'),
(46, '25', '我是world gym 會員'),
(47, '25', '我曾經是world gym 會員'),
(48, '25', '我是健身工房會員'),
(49, '25', '我曾經是健身工房會員'),
(50, '25', '我去國民健康中心'),
(51, '25', '我不去健身房'),
(52, '25', '我不運動的'),
(53, '26', '1-1'),
(54, '26', '1-2'),
(55, '26', '1-3'),
(56, '26', '1-4'),
(57, '26', '1-5'),
(58, '26', '1+6'),
(59, '27', '2-1'),
(60, '27', '2-3'),
(61, '27', '2-5'),
(62, '28', '3-1'),
(63, '28', '3-2'),
(64, '28', '3-3'),
(65, '28', '3-4'),
(66, '29', '4-1'),
(67, '29', '4-2'),
(68, '29', '4-3'),
(69, '29', ''),
(70, '30', '5-1'),
(71, '31', '6-1'),
(72, '32', '確定會買'),
(73, '33', '6-1');

-- --------------------------------------------------------

--
-- 資料表結構 `prs`
--

CREATE TABLE `prs` (
  `pr_id` int(11) NOT NULL,
  `pr` int(10) NOT NULL,
  `pr_descrition` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL
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
  `q` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `subject` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `q_type` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `topics`
--

INSERT INTO `topics` (`topic_id`, `user_id`, `start_time`, `stop_time`, `created_time`, `upate_time`, `subject`, `img`, `q_type`) VALUES
(18, 14, '2023-06-13 22:31:00', '2023-06-30 18:37:00', '2023-06-17 10:32:51', '2023-06-18 03:13:10', '基北北桃月票開賣了，你的購買意願是?', 'dessert01.jpg', 1),
(19, 14, '2023-07-01 22:42:00', '2023-07-08 23:42:00', '2023-06-17 10:43:32', '2023-06-18 03:13:35', '你最近的皮膚困擾?', '001.png', 2),
(20, 14, '2023-06-06 10:58:00', '2023-06-15 01:54:00', '2023-06-18 02:55:38', '2023-06-18 02:55:38', '6/15警察節，你對警察的感覺是?', '001.png', 1),
(21, 14, '2023-06-23 02:15:00', '2023-06-30 11:15:00', '2023-06-18 03:16:13', '2023-06-18 03:16:13', '加拿大的牛肉要開放了，你會特別留意產地食材嗎?', 'food01.jpg', 1),
(22, 14, '2023-06-18 11:21:00', '2023-06-30 11:17:00', '2023-06-18 03:18:41', '2023-06-18 03:18:41', '2024行事曆公布了，你的看法是?', 'cat02.jpg', 2),
(23, 14, '2023-06-07 11:24:00', '2023-06-24 11:24:00', '2023-06-18 03:20:52', '2023-06-18 03:23:26', '端午節會買那些粽子?', '001.png', 2),
(24, 14, '2023-05-12 11:26:00', '2023-08-31 11:26:00', '2023-06-18 03:27:54', '2023-06-18 03:27:54', '你有玩薩爾達王國之淚嗎?', '005.png', 1),
(25, 14, '2023-06-15 11:29:00', '2023-09-22 11:29:00', '2023-06-18 03:31:44', '2023-06-18 03:31:44', '你有上健身房的習慣嗎?', '006.png', 2),
(26, 14, '2023-06-16 11:40:00', '2023-06-30 11:42:00', '2023-06-18 03:36:40', '2023-06-18 03:36:40', '主題1', 'paws.png', 1),
(27, 14, '2023-06-06 11:37:00', '2023-06-17 11:37:00', '2023-06-18 03:37:30', '2023-06-18 03:37:30', '主題2', 'paws.png', 2),
(28, 14, '2023-06-14 11:38:00', '2023-07-08 11:38:00', '2023-06-18 03:39:19', '2023-06-18 03:39:19', '主題3', 'paws.png', 2),
(29, 14, '2023-06-12 11:40:00', '2023-06-23 11:45:00', '2023-06-18 03:41:05', '2023-06-18 03:41:05', '主題4', 'paws.png', 1),
(30, 14, '2023-06-14 21:01:00', '2023-06-30 17:07:00', '2023-06-18 09:01:30', '2023-06-18 09:01:30', '主題5', 'paws.png', 1),
(31, 14, '2023-06-08 17:01:00', '2023-06-28 17:01:00', '2023-06-18 09:02:00', '2023-06-18 09:02:00', '主題6', 'cat02.jpg', 2),
(32, 14, '2023-06-08 17:06:00', '2023-06-29 17:02:00', '2023-06-18 09:02:24', '2023-06-18 09:02:24', '主題7', '', 2),
(33, 14, '2023-06-23 17:02:00', '2023-06-29 17:02:00', '2023-06-18 09:02:55', '2023-06-18 09:02:55', '主題8', 'cat02.jpg', 1);

-- --------------------------------------------------------

--
-- 資料表結構 `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `name` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pr` int(2) NOT NULL,
  `email` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `user`
--

INSERT INTO `user` (`user_id`, `name`, `pr`, `email`, `password`) VALUES
(11, '哀', 2, 'i@gmail.com', 'i'),
(13, 'AMY', 2, 'amy@gmail.com', 'amy'),
(14, 'chanel', 1, 'chanel@gmail.com', 'chanel'),
(15, 'one', 1, 'one@gmail.com', 'one'),
(16, 'two', 0, 'two@gmail.com', 'two'),
(17, 'three', 0, 'three@gmail.com', 'three'),
(18, 'nn4', 0, 'four@gmail.com', 'is915any837'),
(19, '5', 0, 'five@gmail.com', '55555'),
(20, '6', 0, '6@gmail.com', '6'),
(21, '123', 0, '123@gmail.com', '123'),
(22, '茱麗葉', 0, 'juliet@yahoo.com.tw', 'juliet'),
(23, '無名氏', 0, 'no@gmail.om', 'no'),
(24, '王一', 0, 'w1@gmail.com', 'w1');

-- --------------------------------------------------------

--
-- 資料表結構 `votes`
--

CREATE TABLE `votes` (
  `vote_id` int(11) NOT NULL,
  `topic_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `ans` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `votes`
--

INSERT INTO `votes` (`vote_id`, `topic_id`, `user_id`, `ans`) VALUES
(1, 15, 21, '5'),
(2, 15, 21, '6'),
(3, 15, 21, '2'),
(4, 15, 21, '5'),
(5, 15, 21, '6'),
(6, 19, 14, '暗沉'),
(7, 19, 14, '太油'),
(8, 19, 14, '痘痘'),
(9, 19, 14, '暗沉'),
(10, 19, 14, '太油'),
(11, 19, 14, '痘痘'),
(12, 19, 22, '暗沉'),
(13, 19, 22, '粉刺'),
(14, 19, 22, '暗沉'),
(15, 19, 22, '粉刺'),
(16, 19, 22, '太乾'),
(17, 19, 13, '粉刺'),
(18, 19, 23, '粉刺'),
(19, 19, 23, '皺紋');

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
  MODIFY `opt_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

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
  MODIFY `topic_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `votes`
--
ALTER TABLE `votes`
  MODIFY `vote_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
