-- Adminer 4.1.0 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `PIPELINE_admin`;
CREATE TABLE `PIPELINE_admin` (
  `aid` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`aid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `PIPELINE_node`;
CREATE TABLE `PIPELINE_node` (
  `nid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pid` int(10) unsigned NOT NULL,
  `tid` int(10) NOT NULL,
  `addtime` varchar(10) NOT NULL,
  `deadline_time` date NOT NULL,
  `remark` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`nid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `PIPELINE_project`;
CREATE TABLE `PIPELINE_project` (
  `pid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `addtime` varchar(10) NOT NULL,
  `producer` varchar(50) DEFAULT NULL,
  `area` varchar(50) DEFAULT NULL,
  `os` varchar(50) NOT NULL,
  `ip` varchar(200) DEFAULT NULL,
  `contract` varchar(255) DEFAULT NULL COMMENT '合同',
  `issuer` varchar(200) DEFAULT NULL COMMENT '发行方',
  `type` tinyint(1) unsigned DEFAULT NULL COMMENT '1自研 2第二方 3第三方',
  `operator` varchar(255) DEFAULT NULL COMMENT '运营负责人',
  `apply` varchar(255) DEFAULT NULL,
  `remark` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`pid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `PIPELINE_type`;
CREATE TABLE `PIPELINE_type` (
  `tid` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(40) NOT NULL,
  PRIMARY KEY (`tid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `PIPELINE_type` (`tid`, `name`) VALUES
(1, '立项'),
(2, 'CBT1'),
(3, 'CBT2'),
(4, 'CBT3'),
(5, 'OBT'),
(6, 'LAUNCH'),
(7, '官方网站'),
(8, '宣传网站'),
(9, '其他');

DROP TABLE IF EXISTS `PIPELINE_update`;
CREATE TABLE `PIPELINE_update` (
  `uid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nid` int(10) unsigned NOT NULL,
  `type` tinyint(2) NOT NULL DEFAULT '0' COMMENT '-1提前 0不变 1延后 2删除',
  `addtime` varchar(10) NOT NULL,
  `update_time` date NOT NULL,
  `remark` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


-- 2014-11-26 07:00:13
