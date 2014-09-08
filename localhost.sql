-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Sep 08, 2014 at 11:05 AM
-- Server version: 5.5.34
-- PHP Version: 5.5.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `scenery`
--
CREATE DATABASE IF NOT EXISTS `scenery` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `scenery`;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE `category` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT COMMENT '分类id',
  `name` varchar(50) DEFAULT NULL COMMENT '分类名称',
  `parent_id` bigint(20) DEFAULT NULL COMMENT '父分类id',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `parent_id`) VALUES
(1, '地域分类', 0),
(2, '类型分类', 0),
(3, '市内景点', 1),
(4, '郊区景点', 1),
(5, '远郊县景点', 1),
(6, '宫殿', 2),
(7, '宗教场所', 2),
(8, '寺庙', 7),
(9, '道观', 7);

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

DROP TABLE IF EXISTS `comment`;
CREATE TABLE `comment` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT COMMENT '评论id',
  `sid` bigint(20) DEFAULT NULL COMMENT '评论所属景点id',
  `author` bigint(20) DEFAULT NULL COMMENT '评论用户id',
  `cdate` timestamp NULL DEFAULT CURRENT_TIMESTAMP COMMENT '评论时间',
  `content` text COMMENT '评论内容',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
CREATE TABLE `news` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT COMMENT '新闻公告id',
  `title` varchar(200) DEFAULT NULL COMMENT '新闻标题',
  `ndate` timestamp NULL DEFAULT CURRENT_TIMESTAMP COMMENT '新闻发布时间',
  `author` varchar(100) DEFAULT NULL COMMENT '作者',
  `img` varchar(100) DEFAULT NULL COMMENT '图片地址',
  `category` int(11) DEFAULT NULL COMMENT '新闻公告分类',
  `content` text COMMENT '新闻公告内容',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `ndate`, `author`, `img`, `category`, `content`) VALUES
(1, '这是一条测试新闻', '2014-09-04 08:15:24', 'xsf72006', NULL, 0, '这条新闻没有图片'),
(2, '这是一条测试公告', '2014-09-04 08:20:01', 'xsf72006', NULL, 1, '这条公告有图片，作为测试。'),
(3, '这是一条测试新闻', '2014-09-04 08:23:01', 'xsf72006', NULL, 0, '有图片的哟'),
(5, '考！', '2014-09-04 08:29:46', 'xsf72006', NULL, 0, 'dddd'),
(6, '再试一次！', '2014-09-04 08:36:22', 'xsf72006', '1409819782.jpg', 1, '。。。'),
(7, '成功了！！', '2014-09-04 08:41:15', 'xsf72006', '1409820075.jpg', 0, '这个后缀名是怎么回事。。'),
(8, '测试后缀名的', '2014-09-05 01:14:30', 'xsf72006', '1409879670.jpg', 0, '这条新闻是用来测试后缀名能不能保存到数据库里的'),
(9, '再试一下图片名称', '2014-09-05 01:24:32', 'xsf72006', '1409880272.jpg', 1, '     一定可以的！！！'),
(10, 'test', '2014-09-05 14:09:33', 'xsf72006', NULL, 0, ',,,,,,,'),
(11, '这是第11条新闻', '2014-09-05 14:14:31', 'xsf72006', NULL, 1, '应该翻页了。。');

-- --------------------------------------------------------

--
-- Table structure for table `scenery`
--

DROP TABLE IF EXISTS `scenery`;
CREATE TABLE `scenery` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT COMMENT '景点id',
  `sname` varchar(50) DEFAULT NULL COMMENT '景点名称',
  `summary` text COMMENT '景点介绍',
  `img` varchar(256) DEFAULT NULL COMMENT '景点图片链接',
  `category` varchar(100) DEFAULT NULL COMMENT '景点所属分类（可多个）',
  `categoryname` varchar(200) DEFAULT NULL COMMENT '分类名',
  `area` varchar(100) DEFAULT NULL COMMENT '景点面积',
  `traffic` int(11) DEFAULT NULL COMMENT '日均客流量',
  `position` varchar(500) DEFAULT NULL COMMENT '景点地址',
  `bus` varchar(500) DEFAULT NULL COMMENT '经过景点的路线',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `scenery`
--

INSERT INTO `scenery` (`id`, `sname`, `summary`, `img`, `category`, `categoryname`, `area`, `traffic`, `position`, `bus`) VALUES
(5, '测试景点', '测试景点简介', '1410097208.jpg', ',3,8,', '地域分类,地域分类', '4839', 4378, '北京市海淀区学院路37号', '48'),
(6, '测试景点多个景区', '测试', '1410097317.jpg', ',3,9,', '地域分类,地域分类', '32', 12, '北京市海淀区学院路37号', '23'),
(7, '测试景点多个景区', '测试', '1410097425.jpg', ',3,9,', '地域分类,地域分类', '32', 12, '北京市海淀区学院路37号', '23'),
(8, '测试景点多个景区', '测试', '1410097569.jpg', ',3,9,', '地域分类,地域分类', '32', 12, '北京市海淀区学院路37号', '23'),
(9, '测试景点多个景区', '测试', '1410097596.jpg', ',3,9,', '地域分类,地域分类', '32', 12, '北京市海淀区学院路37号', '23'),
(10, '测试景点多个景区', '测试', '1410097638.jpg', ',3,9,', '市内景点,道观', '32', 12, '北京市海淀区学院路37号', '23'),
(11, '测试景点多个景区', '测试', '1410097655.jpg', ',3,9,', '市内景点,道观', '32', 12, '北京市海淀区学院路37号', '23'),
(12, '测试景点多个景区', '测试', '1410097657.jpg', ',3,9,', '市内景点,道观', '32', 12, '北京市海淀区学院路37号', '23'),
(13, '测试景点多个景区', '测试', '1410097658.jpg', ',3,9,', '市内景点,道观', '32', 12, '北京市海淀区学院路37号', '23'),
(14, '测试景点多个景区', '测试', '1410097660.jpg', ',3,9,', '市内景点,道观', '32', 12, '北京市海淀区学院路37号', '23'),
(15, '测试景点多个景区', '测试', '1410097661.jpg', ',3,9,', '市内景点,道观', '32', 12, '北京市海淀区学院路37号', '23'),
(16, '测试景点多个景区', '测试', '1410097662.jpg', ',3,9,', '市内景点,道观', '32', 12, '北京市海淀区学院路37号', '23');

-- --------------------------------------------------------

--
-- Table structure for table `subscenery`
--

DROP TABLE IF EXISTS `subscenery`;
CREATE TABLE `subscenery` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT COMMENT '景区id',
  `fid` bigint(20) DEFAULT NULL COMMENT '所属景点id',
  `name` varchar(100) DEFAULT NULL COMMENT '景区名',
  `img` varchar(256) DEFAULT NULL COMMENT '景区图片链接',
  `summary` text COMMENT '景区介绍',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `subscenery`
--

INSERT INTO `subscenery` (`id`, `fid`, `name`, `img`, `summary`) VALUES
(7, 5, '测试景区', '14100972080.jpg', '测试景区简介'),
(8, 5, '测试景区2', '14100972081.jpg', '测试景区简介'),
(9, 6, '测试', '14100973180.jpg', '测试'),
(10, 7, '测试', '14100974250.jpg', '测试'),
(11, 8, '测试', '14100975690.jpg', '测试'),
(12, 9, '测试', '14100975960.jpg', '测试'),
(13, 10, '测试', '14100976380.jpg', '测试'),
(14, 11, '测试', '14100976550.jpg', '测试'),
(15, 12, '测试', '14100976570.jpg', '测试'),
(16, 13, '测试', '14100976580.jpg', '测试'),
(17, 14, '测试', '14100976600.jpg', '测试'),
(18, 15, '测试', '14100976610.jpg', '测试'),
(19, 16, '测试', '14100976620.jpg', '测试');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT COMMENT ' 用户ID',
  `username` varchar(50) DEFAULT NULL COMMENT '用户名',
  `passwd` varchar(500) DEFAULT NULL COMMENT '用户密码',
  `privilege` int(11) DEFAULT '0' COMMENT '权限',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `passwd`, `privilege`) VALUES
(2, 'timmy.xu', 'ccf8cdea44e7cfffcedc3fa65434312dace0b586', 1),
(6, 'renfei.song', 'ccf8cdea44e7cfffcedc3fa65434312dace0b586', 1),
(14, 'ziming.song', 'ccf8cdea44e7cfffcedc3fa65434312dace0b586', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
