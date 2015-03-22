-- phpMyAdmin SQL Dump
-- version 4.3.0
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2015-03-22 20:57:56
-- 服务器版本： 5.6.21-log
-- PHP Version: 5.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `hzx_vote`
--
CREATE DATABASE IF NOT EXISTS `hzx_vote` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `hzx_vote`;

-- --------------------------------------------------------

--
-- 表的结构 `item`
--

DROP TABLE IF EXISTS `item`;
CREATE TABLE IF NOT EXISTS `item` (
`id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `parent_id` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `item`
--

INSERT INTO `item` (`id`, `name`, `parent_id`) VALUES
(1, 'java', 2),
(2, 'php', 2),
(3, 'c/c++', 2),
(4, 'android', 2),
(5, 'ios', 2);

-- --------------------------------------------------------

--
-- 表的结构 `resu`
--

DROP TABLE IF EXISTS `resu`;
CREATE TABLE IF NOT EXISTS `resu` (
`id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `vote_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `resu`
--

INSERT INTO `resu` (`id`, `name`, `vote_id`, `item_id`) VALUES
(1, 'xyz', 2, 2),
(2, 'xyz', 2, 3),
(3, 'xiaobaicai', 2, 1),
(4, 'xiaobaicai', 2, 2),
(5, 'admin@admin.com', 2, 1),
(6, 'admin@admin.com', 2, 3),
(7, 'admin@admin.com', 2, 1),
(8, 'admin@admin.com', 2, 2),
(9, 'sophia', 2, 5);

-- --------------------------------------------------------

--
-- 表的结构 `vote`
--

DROP TABLE IF EXISTS `vote`;
CREATE TABLE IF NOT EXISTS `vote` (
`id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `vote`
--

INSERT INTO `vote` (`id`, `name`) VALUES
(2, 'PHP开发工程师');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `item`
--
ALTER TABLE `item`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `resu`
--
ALTER TABLE `resu`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vote`
--
ALTER TABLE `vote`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `resu`
--
ALTER TABLE `resu`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `vote`
--
ALTER TABLE `vote`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
