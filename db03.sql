-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- 主機: 127.0.0.1
-- 產生時間： 2018-08-21 09:29:58
-- 伺服器版本: 10.1.31-MariaDB
-- PHP 版本： 7.0.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `db03`
--

-- --------------------------------------------------------

--
-- 資料表結構 `movie`
--

CREATE TABLE `movie` (
  `movie_seq` int(10) UNSIGNED NOT NULL,
  `movie_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `movie_con` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `movie_long` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `movie_upday` date NOT NULL,
  `movie_lv` int(5) NOT NULL,
  `movie_dir` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `movie_fa` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `movie_img` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `movie_video` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `movie_display` int(2) NOT NULL,
  `movie_desc` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 資料表的匯出資料 `movie`
--

INSERT INTO `movie` (`movie_seq`, `movie_name`, `movie_con`, `movie_long`, `movie_upday`, `movie_lv`, `movie_dir`, `movie_fa`, `movie_img`, `movie_video`, `movie_display`, `movie_desc`) VALUES
(2, '芙蘭大戰金槍客', '床上大戰', '49分5秒', '2018-08-17', 4, '就是我啦', '幻想鄉', '20180808092115.PNG', '20180808092115.mp4', 1, 1),
(3, 'aaa', 'wreeeeeeeeeeeeeeeeeeee', '111', '2021-01-01', 1, 'dsa', 'asd', '20180808131245.png', '20180808131245.avi', 1, 2),
(4, 'aaa', 'wreeeeeeeeeeeeeeeeeeee', '111', '2018-08-07', 3, 'dsa', 'asd', '20180808133428.png', '20180808133428.avi', 1, 3),
(5, '揪會來跳舞', 'wreeeeeeeeeeeeeeeeeeee', '111', '2018-11-11', 3, '123214213', '1111', '20180808133444.png', '20180808133444.avi', 1, 4),
(6, 'aaa', 'wreeeeeeeeeeeeeeeeeeee', '111', '2021-01-01', 1, 'dsa', 'asd', '20180808133500.png', '20180808133500.avi', 1, 5),
(7, '魔獸爭霸', '凶狠的魔獸', '1分50秒', '2020-10-10', 4, '還是我 ㄎㄎ', '暴雪', '20180808144028.png', '20180808144028.swf', 1, 0);

-- --------------------------------------------------------

--
-- 資料表結構 `poster`
--

CREATE TABLE `poster` (
  `poster_seq` int(10) NOT NULL,
  `poster_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `poster_img` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `poster_desc` int(10) NOT NULL,
  `poster_ani` int(10) NOT NULL DEFAULT '1',
  `poster_display` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 資料表的匯出資料 `poster`
--

INSERT INTO `poster` (`poster_seq`, `poster_name`, `poster_img`, `poster_desc`, `poster_ani`, `poster_display`) VALUES
(1, '讚爆芙蘭拜託', '1533650029.PNG', 1, 1, 1),
(2, '11', '1534252945.jpg', 6, 3, 1),
(3, '22', '1534252983.jpg', 3, 2, 1),
(4, '33', '1534254806.jpg', 4, 1, 1),
(5, '44', '1534254818.jpg', 5, 2, 1),
(6, 'ya', '1534254844.jpg', 2, 3, 1);

-- --------------------------------------------------------

--
-- 資料表結構 `ticket`
--

CREATE TABLE `ticket` (
  `ticket_seq` int(10) UNSIGNED NOT NULL,
  `ticket_movieseq` int(10) NOT NULL,
  `ticket_date` date NOT NULL,
  `ticket_site` int(10) NOT NULL,
  `ticket_sit` int(10) NOT NULL,
  `ticket_no` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ticket_cnt` int(10) NOT NULL COMMENT '下訂次數'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 資料表的匯出資料 `ticket`
--

INSERT INTO `ticket` (`ticket_seq`, `ticket_movieseq`, `ticket_date`, `ticket_site`, `ticket_sit`, `ticket_no`, `ticket_cnt`) VALUES
(48, 7, '2020-10-10', 3, 2, '202010100001', 1),
(49, 7, '2020-10-10', 3, 8, '202010100001', 1),
(50, 7, '2020-10-10', 3, 14, '202010100001', 1),
(51, 7, '2020-10-10', 3, 18, '202010100001', 1),
(55, 2, '2018-08-19', 4, 7, '201808190002', 2),
(56, 2, '2018-08-19', 4, 14, '201808190002', 2),
(57, 2, '2018-08-19', 2, 3, '201808190003', 3),
(58, 2, '2018-08-19', 2, 10, '201808190003', 3),
(59, 2, '2018-08-19', 2, 17, '201808190003', 3),
(60, 7, '2020-10-11', 5, 2, '202010110004', 4),
(61, 7, '2020-10-11', 5, 6, '202010110004', 4),
(62, 7, '2020-10-11', 5, 14, '202010110004', 4),
(63, 7, '2020-10-10', 3, 5, '202010100005', 5),
(64, 7, '2020-10-10', 3, 16, '202010100005', 5),
(65, 7, '2020-10-11', 5, 8, '202010110006', 6),
(66, 7, '2020-10-11', 5, 13, '202010110006', 6),
(67, 7, '2020-10-11', 5, 18, '202010110006', 6),
(68, 7, '2020-10-11', 4, 7, '202010110007', 7),
(69, 7, '2020-10-11', 4, 14, '202010110007', 7);

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `movie`
--
ALTER TABLE `movie`
  ADD PRIMARY KEY (`movie_seq`);

--
-- 資料表索引 `poster`
--
ALTER TABLE `poster`
  ADD PRIMARY KEY (`poster_seq`);

--
-- 資料表索引 `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`ticket_seq`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `movie`
--
ALTER TABLE `movie`
  MODIFY `movie_seq` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- 使用資料表 AUTO_INCREMENT `poster`
--
ALTER TABLE `poster`
  MODIFY `poster_seq` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- 使用資料表 AUTO_INCREMENT `ticket`
--
ALTER TABLE `ticket`
  MODIFY `ticket_seq` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
