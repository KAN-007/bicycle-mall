-- phpMyAdmin SQL Dump
-- version phpStudy 2014
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 
-- 服务器版本: 5.5.40
-- PHP 版本: 7.0.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `shop`
--

-- --------------------------------------------------------

--
-- 表的结构 `db_admin`
--

CREATE TABLE IF NOT EXISTS `db_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uname` varchar(50) CHARACTER SET utf8 NOT NULL,
  `password` varchar(100) CHARACTER SET utf8 NOT NULL,
  `trealname` varchar(30) CHARACTER SET utf8 DEFAULT NULL,
  `tphone` varchar(15) CHARACTER SET utf8 DEFAULT NULL,
  `times` int(11) DEFAULT NULL,
  `status` tinyint(2) NOT NULL DEFAULT '2' COMMENT '1是管理员2是教师',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=18 ;

--
-- 转存表中的数据 `db_admin`
--

INSERT INTO `db_admin` (`id`, `uname`, `password`, `trealname`, `tphone`, `times`, `status`) VALUES
(1, 'admin', 'c4ca4238a0b923820dcc509a6f75849b', NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- 表的结构 `db_brand`
--

CREATE TABLE IF NOT EXISTS `db_brand` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `img` varchar(100) DEFAULT NULL,
  `add_time` datetime DEFAULT NULL,
  `order` int(6) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='品牌表' AUTO_INCREMENT=13 ;

--
-- 转存表中的数据 `db_brand`
--

INSERT INTO `db_brand` (`id`, `name`, `img`, `add_time`, `order`) VALUES
(7, '喜德盛', 'brand/20200614\\21d7d0b86d34f832ac02f5f607a14d2c.jpg', '2020-06-14 17:35:10', 1),
(8, '凤凰', 'brand/20200614\\2b2c4f5cd546c542aad1cfa5b7c4f275.jpg', '2020-06-14 17:42:57', 2),
(9, '飞鸽', 'brand/20200614\\4d4ee04cfb9bcc5f2d3b835a9e906c94.jpg', '2020-06-14 17:52:04', 3),
(10, 'MARMOT', 'brand/20200614\\a4f2fb6c06dd616be4b617fe46d15f44.jpg', '2020-06-14 18:00:35', 4),
(11, '佳沃', 'brand/20200614\\657005e67a18fb85ae5b549739d03b25.jpg', '2020-06-14 18:05:46', 5),
(12, '艾玛', 'brand/20200614\\fe524a35f1bddbd15bbeba0abc39a0aa.jpg', '2020-06-14 18:10:12', 5);

-- --------------------------------------------------------

--
-- 表的结构 `db_car`
--

CREATE TABLE IF NOT EXISTS `db_car` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gid` int(11) DEFAULT NULL,
  `num` int(11) DEFAULT NULL,
  `uid` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=23 ;

--
-- 转存表中的数据 `db_car`
--

INSERT INTO `db_car` (`id`, `gid`, `num`, `uid`) VALUES
(8, 4, 11, 1),
(12, 10, 7, 6),
(20, 8, 1, 3),
(21, 7, 1, 3),
(22, 12, 1, 3);

-- --------------------------------------------------------

--
-- 表的结构 `db_goods`
--

CREATE TABLE IF NOT EXISTS `db_goods` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `details` text NOT NULL,
  `pic` varchar(100) DEFAULT NULL,
  `price` decimal(8,0) DEFAULT NULL,
  `nums` varchar(100) DEFAULT NULL,
  `add_time` datetime DEFAULT NULL,
  `tid` int(6) DEFAULT NULL,
  `bid` int(6) DEFAULT NULL,
  `status` int(6) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- 转存表中的数据 `db_goods`
--

INSERT INTO `db_goods` (`id`, `name`, `details`, `pic`, `price`, `nums`, `add_time`, `tid`, `bid`, `status`) VALUES
(7, '凤凰牌山地车', '凤凰牌山地车，一年车龄，7成新，车况良好', 'goods/20200614\\59f8068ab3c53522dd2e3ea33541556a.jpg', '150', '2', '2020-06-14 17:44:37', 7, 8, 1),
(8, '飞鸽折叠自行车', '飞鸽折叠自行车，八成新，原价200，喜欢的同学可以下单了！！', 'goods/20200614\\4e953b092bd886e803b66ed00053e372.jpg', '100', '0', '2020-06-14 17:55:18', 8, 9, 1),
(9, '死飞自行车', '17年淘宝买的死飞，链子有点生锈，可小刀', 'goods/20200614\\0ab0f9dbe574726442a6e33ef9cfad1d.jpg', '100', '1', '2020-06-14 18:02:26', 9, 10, 1),
(10, '佳沃公路自行车', '碳素公路车，车龄2年，把手和座垫有一点破，不影响大体', 'goods/20200614\\fe19ea6d242889a519f36ec1e6166d0b.jpg', '450', '1', '2020-06-14 18:08:12', 10, 11, 1),
(11, '艾玛电动自行车', '艾玛电动车，三年车龄，更换过电池。带充电器。', 'goods/20200614\\4b81112753927d3967fa73c12bfaad98.jpg', '400', '1', '2020-06-14 18:12:41', 11, 12, 1),
(12, '喜德盛自行车', '车况良好', 'goods/20200614\\ed773eee33e99a3772e8e1d8296ebffe.jpg', '100', '0', '2020-06-14 18:15:05', 9, 7, 1);

--
-- 触发器 `db_goods`
--
DROP TRIGGER IF EXISTS `test`;
DELIMITER //
CREATE TRIGGER `test` BEFORE UPDATE ON `db_goods`
 FOR EACH ROW BEGIN
    DECLARE msg VARCHAR (255); 
    IF NEW.nums<0 then 
    set msg = "库存不能小于0";
    SIGNAL SQLSTATE 'HY000' SET mysql_errno = 22, message_text = msg;
    END IF;    
END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- 表的结构 `db_order`
--

CREATE TABLE IF NOT EXISTS `db_order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) DEFAULT NULL,
  `gid` int(11) DEFAULT NULL,
  `add_time` datetime DEFAULT NULL,
  `send_time` datetime DEFAULT NULL,
  `receive_time` datetime DEFAULT NULL,
  `status` varchar(5) DEFAULT NULL COMMENT '1待发货2.待收货3.待评价4，已评价',
  `evaluate` varchar(200) DEFAULT NULL,
  `revaluate` varchar(200) DEFAULT NULL,
  `num` int(11) DEFAULT NULL,
  `total` decimal(8,0) DEFAULT NULL,
  `price` decimal(8,0) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=22 ;

--
-- 转存表中的数据 `db_order`
--

INSERT INTO `db_order` (`id`, `uid`, `gid`, `add_time`, `send_time`, `receive_time`, `status`, `evaluate`, `revaluate`, `num`, `total`, `price`) VALUES
(20, 3, 8, '2020-06-14 18:23:02', '2020-06-14 18:34:40', '2020-06-14 18:35:02', '4', '不错不错，价格实惠，而且车还很新，谢谢师兄啦', '觉得不错可以推荐给其他工学哦！！', 1, '100', '100'),
(21, 3, 12, '2020-06-14 18:49:13', '2020-06-14 18:51:07', '2020-06-14 18:51:13', '4', '666666真心不错淘到好东西了', '谢谢惠顾', 1, '100', '100');

-- --------------------------------------------------------

--
-- 表的结构 `db_type`
--

CREATE TABLE IF NOT EXISTS `db_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `add_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- 转存表中的数据 `db_type`
--

INSERT INTO `db_type` (`id`, `name`, `order`, `add_time`) VALUES
(7, '山地车', 1, '2020-06-14 17:29:15'),
(8, '折叠车', 2, '2020-06-14 17:29:53'),
(9, '城市自行车', 3, '2020-06-14 17:30:51'),
(10, '公路车', 4, '2020-06-14 17:31:05'),
(11, '电动车', 5, '2020-06-14 17:32:39');

-- --------------------------------------------------------

--
-- 表的结构 `db_user`
--

CREATE TABLE IF NOT EXISTS `db_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `tel` varchar(11) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `realname` varchar(50) DEFAULT NULL,
  `add_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `db_user`
--

INSERT INTO `db_user` (`id`, `name`, `password`, `tel`, `address`, `realname`, `add_time`) VALUES
(3, '123456', 'e10adc3949ba59abbe56e057f20f883e', '13160891576', '中山大学新华学院东莞校区13栋', '熊本熊本熊', '2020-06-11 23:25:09'),
(4, '1111', 'b59c67bf196a4758191e42f76670ceba', '13160965427', '中大新华4栋', '璐本蔚', '2020-06-14 18:26:37');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
