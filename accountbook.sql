-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2017-07-10 12:43:15
-- 服务器版本： 5.7.11
-- PHP Version: 7.0.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `accountbook`
--

-- --------------------------------------------------------

--
-- 表的结构 `accounts`
--

CREATE TABLE `accounts` (
  `id` bigint(20) NOT NULL,
  `title` varchar(200) NOT NULL COMMENT '账目标题',
  `time` date NOT NULL COMMENT '账目产生时间',
  `recorder` varchar(20) NOT NULL COMMENT '记录人',
  `detail` text NOT NULL COMMENT '详情',
  `type` tinyint(4) NOT NULL COMMENT '花销0/收入1',
  `money` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `accounts`
--

INSERT INTO `accounts` (`id`, `title`, `time`, `recorder`, `detail`, `type`, `money`) VALUES
(6, '全体成员吃饭', '2017-06-08', 'tset', '就是大家一起在小龙坎吃了一顿火锅', 0, 899),
(5, '1111111111', '2017-06-01', 'tset', '赚了一笔大钱', 1, 4000),
(12, '百度狙', '2017-08-11', 'rahsu', '毒胆红素', 1, 213);

-- --------------------------------------------------------

--
-- 表的结构 `proof`
--

CREATE TABLE `proof` (
  `id` bigint(20) NOT NULL,
  `accountId` bigint(20) NOT NULL,
  `path` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL COMMENT 'id',
  `account` varchar(20) NOT NULL COMMENT '账号',
  `password` varchar(200) NOT NULL COMMENT '密码',
  `identity` int(11) NOT NULL COMMENT '身份',
  `realname` varchar(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`id`, `account`, `password`, `identity`, `realname`) VALUES
(1, 'tset', '96e79218965eb72c92a549dd5a330112', 1, 'rahsu'),
(26, '111', '96e79218965eb72c92a549dd5a330112', 3, '434'),
(22, 'jhgjhg', 'e10adc3949ba59abbe56e057f20f883e', 3, 'jhgjhgj'),
(25, '111111', '96e79218965eb72c92a549dd5a330112', 3, '111111'),
(23, '123456', 'e10adc3949ba59abbe56e057f20f883e', 2, '1'),
(21, 'tret', 'e10adc3949ba59abbe56e057f20f883e', 2, 'tret');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `proof`
--
ALTER TABLE `proof`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- 使用表AUTO_INCREMENT `proof`
--
ALTER TABLE `proof`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- 使用表AUTO_INCREMENT `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id', AUTO_INCREMENT=28;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
