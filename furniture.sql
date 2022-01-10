-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2022-01-10 16:22:37
-- 伺服器版本： 10.4.22-MariaDB
-- PHP 版本： 8.0.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫: `test`
--

-- --------------------------------------------------------

--
-- 資料表結構 `furniture`
--

CREATE TABLE `furniture` (
  `fld` varchar(25) COLLATE utf8_bin NOT NULL,
  `type` varchar(25) COLLATE utf8_bin NOT NULL,
  `color` varchar(25) COLLATE utf8_bin NOT NULL,
  `material` varchar(25) COLLATE utf8_bin NOT NULL,
  `supId` varchar(25) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- 傾印資料表的資料 `furniture`
--

INSERT INTO `furniture` (`fld`, `type`, `color`, `material`, `supId`) VALUES
('1', '1', '1', '1', '晨皓'),
('2', '2', '2', '2', '晨皓'),
('3', '3', '3', '3', '晨皓');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `furniture`
--
ALTER TABLE `furniture`
  ADD PRIMARY KEY (`fld`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
