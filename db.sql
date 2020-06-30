-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- 主机： localhost
-- 生成日期： 2020-06-07 08:32:04
-- 服务器版本： 5.7.26
-- PHP 版本： 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `data`
--

-- --------------------------------------------------------

--
-- 表的结构 `board`
--

CREATE TABLE `board` (
  `boardId` int(11) NOT NULL,
  `boardName` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `parentId` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `board`
--

INSERT INTO `board` (`boardId`, `boardName`, `parentId`) VALUES
(2, '音乐', 0),

(14, '最新', 4);

-- --------------------------------------------------------


--
-- 表的结构 `message`
--

CREATE TABLE `message` (
  `Id` int(11) NOT NULL,
  `user_fk` int(11) DEFAULT NULL COMMENT '发布人',
  `message_content` varchar(255) DEFAULT NULL COMMENT '评论内容',
  `message_time` varchar(255) DEFAULT NULL COMMENT '评论时间',
  `product_fk` int(11) DEFAULT NULL,
  `parent_fk` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='评论';

--
-- 转存表中的数据 `message`
--

INSERT INTO `message` (`Id`, `user_fk`, `message_content`, `message_time`, `product_fk`, `parent_fk`) VALUES
(30, 8, '123456789', '2020-06-07 01:41:12', 2, 0),
(31, 7, '123456', '2020-06-07 01:50:10', 2, 0),
(32, 8, '1234567887654321', '2020-06-07 08:27:52', 2, 0),
(33, 8, '111111111', '2020-06-07 08:28:05', 4, 0),
(34, 8, '2222222', '2020-06-07 08:29:13', 4, 0),
(35, 8, '33333333333', '2020-06-07 08:29:15', 4, 0),
(36, 8, '44444444', '2020-06-07 08:29:18', 4, 0),
(37, 8, '5555555', '2020-06-07 08:30:51', 4, 0);

-- --------------------------------------------------------

--
-- 表的结构 `music`
--

CREATE TABLE `music` (
  `Id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `zhuanji` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `time` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `leixing` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `stcj` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '视听场景',
  `describ` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '描述',
  `musicFile` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `music`
--

INSERT INTO `music` (`Id`, `name`, `zhuanji`, `time`, `leixing`, `stcj`, `describ`, `musicFile`) VALUES
(2, '断桥残雪', '啦啦啦啦', '2010年', '摇滚', '睡觉', '周星驰vcv', './musicFile/159146253955296.mp3'),
(4, '素颜', '周星驰', '2008年', '摇滚', '周星驰', '去玩儿', './musicFile/159146336910920.mp3'),
(6, '降温', '在在在在', '2020-03-24', '摇滚', '去玩儿推欧派', '阿斯达四大', './musicFile/159146584555370.mp3');





-- --------------------------------------------------------

--
-- 表的结构 `userinfo`
--

CREATE TABLE `userinfo` (
  `uId` int(11) NOT NULL,
  `uName` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `uPass` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `sex` int(11) DEFAULT NULL,
  `Integral` int(11) DEFAULT NULL,
  `Head` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `regTime` int(11) DEFAULT NULL,
  `admin` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `userinfo`
--

INSERT INTO `userinfo` (`uId`, `uName`, `uPass`, `sex`, `Integral`, `Head`, `regTime`, `admin`) VALUES
(2, 'zcy', '202cb962ac59075b964b07152d234b70', 1, 210, 'zcy.jpg', NULL, 0),
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 0, 0, '0.jpg', NULL, 1);

--
-- 转储表的索引
--

--
-- 表的索引 `board`
--
ALTER TABLE `board`
  ADD PRIMARY KEY (`boardId`);

--
-- 表的索引 `keywords`
--
ALTER TABLE `keywords`
  ADD PRIMARY KEY (`keyWordsID`);

--
-- 表的索引 `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`Id`);

--
-- 表的索引 `music`
--
ALTER TABLE `music`
  ADD PRIMARY KEY (`Id`);



--
-- 表的索引 `userinfo`
--
ALTER TABLE `userinfo`
  ADD PRIMARY KEY (`uId`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `board`
--
ALTER TABLE `board`
  MODIFY `boardId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- 使用表AUTO_INCREMENT `keywords`
--
ALTER TABLE `keywords`
  MODIFY `keyWordsID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 使用表AUTO_INCREMENT `message`
--
ALTER TABLE `message`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- 使用表AUTO_INCREMENT `music`
--
ALTER TABLE `music`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;


--
-- 使用表AUTO_INCREMENT `userinfo`
--
ALTER TABLE `userinfo`
  MODIFY `uId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;