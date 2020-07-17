/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : mvc1

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2020-07-17 11:02:41
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for books
-- ----------------------------
DROP TABLE IF EXISTS `books`;
CREATE TABLE `books` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `book_name` varchar(255) DEFAULT NULL,
  `book_price` int(11) DEFAULT NULL,
  `book_intro` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of books
-- ----------------------------
INSERT INTO `books` VALUES ('2', 'Cody Oneil', '145', 'Eius voluptatibus it');
INSERT INTO `books` VALUES ('3', 'Eve Harris', '323', 'Molestiae est moles');
INSERT INTO `books` VALUES ('4', 'Sacha Mcknight', '304', 'Iusto sed necessitat');
INSERT INTO `books` VALUES ('5', 'Herrod Morse', '953', 'Quos reprehenderit d');
INSERT INTO `books` VALUES ('6', 'Zachery Duncan', '242', 'Eaque sit quia ut li');
INSERT INTO `books` VALUES ('7', 'Holmes Suarez', '406', 'Fugiat pariatur Ius');
