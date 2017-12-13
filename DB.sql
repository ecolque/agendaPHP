/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 100113
Source Host           : localhost:3306
Source Database       : test

Target Server Type    : MYSQL
Target Server Version : 100113
File Encoding         : 65001

Date: 2017-12-13 09:30:53
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for eventos
-- ----------------------------
DROP TABLE IF EXISTS `eventos`;
CREATE TABLE `eventos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `start` date NOT NULL,
  `time_start` time NOT NULL,
  `end` date DEFAULT NULL,
  `time_end` time DEFAULT NULL,
  `allDay` tinyint(1) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `usuarios` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of eventos
-- ----------------------------

-- ----------------------------
-- Table structure for usuarios
-- ----------------------------
DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `birth_date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of usuarios
-- ----------------------------
INSERT INTO `usuarios` VALUES ('13', 'juan@gmail.com', 'Juan Perez', '$2y$10$t2owyLqQzKb4RUaG1eOy/.f2/E7mORiKQPVEpYA7npk8R4/Zs65DO', '1980-02-01');
INSERT INTO `usuarios` VALUES ('14', 'ernesto@gmail.com', 'Ernesto', '$2y$10$pE390W42CA/s5nm7yBxAtOBGN8D3KhdcSb1CkwprsOs1lA.wtX2UK', '1980-12-01');
INSERT INTO `usuarios` VALUES ('15', 'marco@gmail.com', 'Marco Perez', '$2y$10$J0cku3wvK7GVyI99BJv0f.NbvIzCSZ/LsOh6lbieQI.cDQcPjsP0y', '1990-02-01');
