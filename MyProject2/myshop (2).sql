-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2017-05-04 12:21:20
-- 服务器版本： 5.6.17-log
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `myshop`
--

-- --------------------------------------------------------

--
-- 表的结构 `album`
--

CREATE TABLE IF NOT EXISTS `album` (
  `id` int(16) NOT NULL AUTO_INCREMENT,
  `Pid` int(16) NOT NULL COMMENT '对应商品id',
  `albumPath` varchar(150) NOT NULL COMMENT '商品图片',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- 转存表中的数据 `album`
--

INSERT INTO `album` (`id`, `Pid`, `albumPath`) VALUES
(1, 1, 'bdef28ef5cb6c3632e11d00de845f908.jpg'),
(2, 1, '7aa2c6d2f43361a1fe2c0e29262a1605.jpg'),
(3, 1, '9b0e7fbef7e58e7a85d18f76ebacba8f.jpg'),
(4, 1, 'ebacad6c6a80e81ca54901af46064d90.jpg'),
(5, 1, 'bb0053774531e3d2a750c31425cae9a4.jpg'),
(6, 2, 'c7879dfdeb049c300900c0fb85bbb147.jpg'),
(7, 2, '34708a8dc25a157a22b4c48c78f5516c.jpg'),
(8, 2, '50e23e2f944db24b0c53c6fe6212bd30.jpg'),
(9, 2, 'd0bfa7aee87ac6ad88ad6d9e23ebf184.jpg'),
(10, 2, '15ecc2ed0bfc27fc7b8708b1460b486a.jpg');

-- --------------------------------------------------------

--
-- 表的结构 `cate`
--

CREATE TABLE IF NOT EXISTS `cate` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `cateName` varchar(16) NOT NULL COMMENT '分类名称',
  `cateAbout` varchar(200) NOT NULL COMMENT '分类说明',
  `creatTime` varchar(16) NOT NULL,
  `updateTime` varchar(16) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- 转存表中的数据 `cate`
--

INSERT INTO `cate` (`id`, `cateName`, `cateAbout`, `creatTime`, `updateTime`) VALUES
(1, '特卖专区', '这里是特卖专区', '2017-04-13 15:56', ''),
(2, '热门推荐', '这里是热门推荐', '2017-04-13 15:57', ''),
(3, '数码专区', '这里是数码专区', '2017-04-13 16:01', ''),
(4, '运动器材', '这里是运动器材专区', '2017-04-13 16:01', ''),
(5, '服装服饰专区', '这里是服装服饰专区', '2017-04-27 14:39', ''),
(7, '', '', '2017-05-04 14:53', '');

-- --------------------------------------------------------

--
-- 表的结构 `commonuser`
--

CREATE TABLE IF NOT EXISTS `commonuser` (
  `id` int(5) NOT NULL AUTO_INCREMENT COMMENT '用户id',
  `username` varchar(30) NOT NULL COMMENT '用户名',
  `password` varchar(16) NOT NULL COMMENT '密码',
  `sex` enum('男','女','保密','') NOT NULL COMMENT '性别',
  `face` varchar(60) NOT NULL COMMENT '头像',
  `regTime` varchar(32) NOT NULL COMMENT '注册时间',
  `money` varchar(10) NOT NULL COMMENT '余额',
  `QQ` int(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `tel` varchar(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- 转存表中的数据 `commonuser`
--

INSERT INTO `commonuser` (`id`, `username`, `password`, `sex`, `face`, `regTime`, `money`, `QQ`, `email`, `tel`) VALUES
(2, 'admin4', 'adminadmin', '男', 'fc4f4bf82c77de08c0d96b482612871b.jpg', '2017-04-12 10:56:35', '', 158555827, '158555827@qq.com', '13739496281'),
(5, '汪汪', 'wangwang', '男', '077022ed40011aa053cd6e3614c4a81a.jpg', '2017-04-13 15:53:43', '', 158555827, '158555827@qq.com', '13739496281'),
(8, 'ssss', '999999999', '男', 'aae8c67417cf8b1af8ab741da11f55cf.jpg', '2017-04-17 16:57:15', '', 999999, '999999', '999999999');

-- --------------------------------------------------------

--
-- 表的结构 `ordered`
--

CREATE TABLE IF NOT EXISTS `ordered` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `proName` varchar(32) NOT NULL,
  `full_address` varchar(32) NOT NULL,
  `buyer` varchar(32) NOT NULL,
  `tel` varchar(13) NOT NULL COMMENT '固定电话',
  `proPrice` varchar(5) NOT NULL,
  `phone` varchar(13) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `ordered`
--

INSERT INTO `ordered` (`id`, `proName`, `full_address`, `buyer`, `tel`, `proPrice`, `phone`) VALUES
(1, '自行车bike', '成都', '石锋', '86699999', '999', '13739499187');

-- --------------------------------------------------------

--
-- 表的结构 `shoppro`
--

CREATE TABLE IF NOT EXISTS `shoppro` (
  `id` int(16) NOT NULL AUTO_INCREMENT COMMENT '商品号id',
  `Cateid` smallint(4) NOT NULL COMMENT '商品分类id',
  `Pname` varchar(16) NOT NULL COMMENT '商品名字',
  `mPrice` decimal(16,0) NOT NULL COMMENT '原价',
  `iPrice` decimal(16,0) NOT NULL COMMENT '网站价格',
  `Pdesc` varchar(200) NOT NULL COMMENT '商品简介',
  `pubTime` varchar(16) NOT NULL COMMENT '上架时间',
  `promulgator` varchar(16) NOT NULL,
  `NewOrOld` varchar(16) NOT NULL,
  `address` varchar(16) NOT NULL,
  `state` enum('在售','已售出') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `shoppro`
--

INSERT INTO `shoppro` (`id`, `Cateid`, `Pname`, `mPrice`, `iPrice`, `Pdesc`, `pubTime`, `promulgator`, `NewOrOld`, `address`, `state`) VALUES
(1, 1, '自行车bike', '999', '999', '自行车bike的相关描述，自行车bike的相关描述，自行车bike的相关描述，自行车bike的相关描述，自行车bike的相关描述，', '2017-05-04 17:44', 'F2', '新', '成都大学', '已售出'),
(2, 1, '电脑computer', '4999', '4999', '电脑computer的相关描述，电脑computer的相关描述，电脑computer的相关描述，电脑computer的相关描述，电脑computer的相关描述，电脑computer的相关描述，', '2017-05-04 17:46', 'F2', '新', '成都大学', '在售');

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(3) NOT NULL AUTO_INCREMENT COMMENT '自增id',
  `username` varchar(16) NOT NULL COMMENT '用户名',
  `password` varchar(16) NOT NULL COMMENT '密码',
  `tel` varchar(11) NOT NULL COMMENT '电话',
  `regTime` varchar(16) NOT NULL,
  `updateTime` varchar(16) NOT NULL,
  `money` varchar(16) NOT NULL COMMENT '余额',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `tel`, `regTime`, `updateTime`, `money`) VALUES
(1, 'admin', 'admin', '13739499187', '2017-04-18 16:35', '', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
