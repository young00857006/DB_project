-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2022-01-11 19:49:29
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
-- 資料庫: `db`
--

-- --------------------------------------------------------

--
-- 資料表結構 `furniture`
--

CREATE TABLE `furniture` (
  `fId` varchar(125) COLLATE utf8_bin NOT NULL,
  `type` varchar(125) COLLATE utf8_bin NOT NULL,
  `color` varchar(125) COLLATE utf8_bin NOT NULL,
  `material` varchar(125) COLLATE utf8_bin NOT NULL,
  `supId` varchar(125) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- 傾印資料表的資料 `furniture`
--

INSERT INTO `furniture` (`fId`, `type`, `color`, `material`, `supId`) VALUES
('1', '2', '2', '2', '晨皓');

-- --------------------------------------------------------

--
-- 資料表結構 `have`
--

CREATE TABLE `have` (
  `amount` varchar(125) COLLATE utf8_bin NOT NULL,
  `fId` varchar(125) COLLATE utf8_bin NOT NULL,
  `sId` varchar(125) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- 傾印資料表的資料 `have`
--

INSERT INTO `have` (`amount`, `fId`, `sId`) VALUES
('2', '1', '家宏');

-- --------------------------------------------------------

--
-- 資料表結構 `publisher`
--

CREATE TABLE `publisher` (
  `supId` varchar(25) COLLATE utf8_bin NOT NULL,
  `supAdder` varchar(25) COLLATE utf8_bin NOT NULL,
  `supPhone` varchar(25) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- 傾印資料表的資料 `publisher`
--

INSERT INTO `publisher` (`supId`, `supAdder`, `supPhone`) VALUES
('晨皓', '基隆市中正區北寧路2號', '02-2462-2192');

-- --------------------------------------------------------

--
-- 資料表結構 `store`
--

CREATE TABLE `store` (
  `sId` varchar(25) COLLATE utf8_bin NOT NULL,
  `sAdder` varchar(25) COLLATE utf8_bin NOT NULL,
  `sPhone` varchar(25) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- 傾印資料表的資料 `store`
--

INSERT INTO `store` (`sId`, `sAdder`, `sPhone`) VALUES
('家宏', '海大', '123456');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `furniture`
--
ALTER TABLE `furniture`
  ADD PRIMARY KEY (`fId`);

--
-- 資料表索引 `have`
--
ALTER TABLE `have`
  ADD PRIMARY KEY (`fId`,`sId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
