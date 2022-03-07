-- Adminer 4.8.1 MySQL 5.7.28 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `customer`;
CREATE TABLE `customer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `address` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `login` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `login` (`login`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO `customer` (`id`, `name`, `address`, `email`, `login`, `password`) VALUES
(1,	'熊木 和夫',	'東京都新宿区西新宿2-8-1',	'beartree1@php.com',	'kumaki',	'$2y$10$3D5ZXabnPgw3eZXTFQEgm.BuH.dTgM2lBdahb05S.DTeWY7kwCDOi');

DROP TABLE IF EXISTS `denpyo`;
CREATE TABLE `denpyo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `customer_id` (`customer_id`),
  CONSTRAINT `denpyo_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `favorite`;
CREATE TABLE `favorite` (
  `customer_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  PRIMARY KEY (`customer_id`,`product_id`),
  KEY `product_id` (`product_id`),
  CONSTRAINT `favorite_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`),
  CONSTRAINT `favorite_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `product`;
CREATE TABLE `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `price` int(11) NOT NULL,
  `images` blob NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

INSERT INTO `product` (`id`, `name`, `price`, `images`) VALUES
(1,	'松の実',	700,	''),
(2,	'くるみ',	270,	''),
(3,	'ひまわりの種',	210,	''),
(4,	'アーモンド',	220,	''),
(5,	'カシューナッツ',	250,	''),
(6,	'ジャイアントコーン',	180,	''),
(7,	'ピスタチオ',	310,	''),
(8,	'マカダミアナッツ',	600,	''),
(9,	'かぼちゃの種',	180,	''),
(10,	'ピーナッツ',	150,	''),
(11,	'クコの実',	400,	''),
(12,	'落花生',	1200,	''),
(13,	'枝豆',	1200,	''),
(14,	'そら豆',	1100,	''),
(15,	'ピーカンナッツ',	560,	'a:1:{i:0;s:13:\"upload/15.jpg\";}');

DROP TABLE IF EXISTS `purchase`;
CREATE TABLE `purchase` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `customer_id` (`customer_id`),
  CONSTRAINT `purchase_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `purchase` (`id`, `customer_id`, `date`) VALUES
(1,	1,	'2022-02-25 02:21:00'),
(2,	1,	'2022-02-25 02:21:00'),
(3,	1,	'2022-02-26 04:20:09'),
(4,	1,	'2022-03-02 00:23:10'),
(5,	1,	'2022-03-07 00:13:27'),
(6,	1,	'2022-03-07 03:16:45');

DROP TABLE IF EXISTS `purchase_detail`;
CREATE TABLE `purchase_detail` (
  `purchase_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `count` int(11) NOT NULL,
  PRIMARY KEY (`purchase_id`,`product_id`),
  KEY `product_id` (`product_id`),
  CONSTRAINT `purchase_detail_ibfk_1` FOREIGN KEY (`purchase_id`) REFERENCES `purchase` (`id`),
  CONSTRAINT `purchase_detail_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `purchase_detail` (`purchase_id`, `product_id`, `count`) VALUES
(1,	1,	1),
(2,	1,	1),
(3,	13,	1),
(4,	1,	1),
(4,	2,	1),
(5,	1,	4),
(5,	2,	4),
(6,	3,	10);

-- 2022-03-07 04:16:50