/*
 Navicat Premium Data Transfer

 Source Server         : web_connection
 Source Server Type    : MySQL
 Source Server Version : 80013
 Source Host           : localhost:3306
 Source Schema         : db_student_grade

 Target Server Type    : MySQL
 Target Server Version : 80013
 File Encoding         : 65001

 Date: 11/06/2019 10:42:32
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for admininfo
-- ----------------------------
DROP TABLE IF EXISTS `admininfo`;
CREATE TABLE `admininfo` (
  `id` varchar(10) NOT NULL,
  `password` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- ----------------------------
-- Records of admininfo
-- ----------------------------
BEGIN;
INSERT INTO `admininfo` VALUES ('10000', '123456');
COMMIT;

-- ----------------------------
-- Table structure for courseinfo
-- ----------------------------
DROP TABLE IF EXISTS `courseinfo`;
CREATE TABLE `courseinfo` (
  `courseId` varchar(10) NOT NULL,
  `courseName` varchar(30) NOT NULL,
  PRIMARY KEY (`courseId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of courseinfo
-- ----------------------------
BEGIN;
INSERT INTO `courseinfo` VALUES ('B01', '生物');
INSERT INTO `courseinfo` VALUES ('C01', '语文');
INSERT INTO `courseinfo` VALUES ('C02', '化学');
INSERT INTO `courseinfo` VALUES ('E01', '英语');
INSERT INTO `courseinfo` VALUES ('G01', '地理');
INSERT INTO `courseinfo` VALUES ('H01', '历史');
INSERT INTO `courseinfo` VALUES ('M01', '数学');
INSERT INTO `courseinfo` VALUES ('P01', '物理');
INSERT INTO `courseinfo` VALUES ('P02', '政治');
COMMIT;

-- ----------------------------
-- Table structure for grades
-- ----------------------------
DROP TABLE IF EXISTS `grades`;
CREATE TABLE `grades` (
  `stuId` varchar(10) NOT NULL,
  `courseId` varchar(10) NOT NULL,
  `score` int(4) NOT NULL,
  PRIMARY KEY (`stuId`,`courseId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of grades
-- ----------------------------
BEGIN;
INSERT INTO `grades` VALUES ('201621001', 'C01', 90);
INSERT INTO `grades` VALUES ('201621001', 'E01', 90);
INSERT INTO `grades` VALUES ('201621002', 'C01', 95);
INSERT INTO `grades` VALUES ('201621002', 'E01', 85);
INSERT INTO `grades` VALUES ('201621003', 'C01', 85);
INSERT INTO `grades` VALUES ('201621003', 'E01', 90);
INSERT INTO `grades` VALUES ('201621004', 'C01', 80);
INSERT INTO `grades` VALUES ('201621004', 'E01', 95);
INSERT INTO `grades` VALUES ('201621005', 'C01', 75);
INSERT INTO `grades` VALUES ('201621005', 'E01', 90);
INSERT INTO `grades` VALUES ('201621006', 'C01', 85);
INSERT INTO `grades` VALUES ('201621006', 'E01', 87);
INSERT INTO `grades` VALUES ('201621007', 'C01', 83);
INSERT INTO `grades` VALUES ('201621007', 'M01', 100);
INSERT INTO `grades` VALUES ('201621008', 'C01', 90);
INSERT INTO `grades` VALUES ('201621008', 'M01', 70);
INSERT INTO `grades` VALUES ('201621009', 'C01', 85);
INSERT INTO `grades` VALUES ('201621009', 'M01', 85);
INSERT INTO `grades` VALUES ('201621010', 'C01', 80);
INSERT INTO `grades` VALUES ('201621010', 'M01', 75);
INSERT INTO `grades` VALUES ('201621011', 'C01', 95);
INSERT INTO `grades` VALUES ('201621011', 'M01', 90);
INSERT INTO `grades` VALUES ('201621012', 'C01', 92);
INSERT INTO `grades` VALUES ('201621012', 'M01', 95);
INSERT INTO `grades` VALUES ('201621013', 'E01', 86);
INSERT INTO `grades` VALUES ('201621013', 'M01', 96);
INSERT INTO `grades` VALUES ('201621014', 'E01', 78);
INSERT INTO `grades` VALUES ('201621014', 'M01', 79);
INSERT INTO `grades` VALUES ('201621015', 'E01', 91);
INSERT INTO `grades` VALUES ('201621015', 'M01', 93);
INSERT INTO `grades` VALUES ('201621016', 'E01', 95);
INSERT INTO `grades` VALUES ('201621016', 'M01', 84);
INSERT INTO `grades` VALUES ('201621017', 'E01', 88);
INSERT INTO `grades` VALUES ('201621017', 'M01', 80);
INSERT INTO `grades` VALUES ('201621018', 'E01', 90);
INSERT INTO `grades` VALUES ('201621018', 'M01', 91);
COMMIT;

-- ----------------------------
-- Table structure for selectcourse
-- ----------------------------
DROP TABLE IF EXISTS `selectcourse`;
CREATE TABLE `selectcourse` (
  `stuId` varchar(10) NOT NULL,
  `teaId` varchar(10) NOT NULL,
  `courseId` varchar(10) NOT NULL,
  PRIMARY KEY (`stuId`,`teaId`,`courseId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of selectcourse
-- ----------------------------
BEGIN;
INSERT INTO `selectcourse` VALUES ('201621001', '10001', 'C01');
INSERT INTO `selectcourse` VALUES ('201621001', '10003', 'E01');
INSERT INTO `selectcourse` VALUES ('201621002', '10001', 'C01');
INSERT INTO `selectcourse` VALUES ('201621002', '10003', 'E01');
INSERT INTO `selectcourse` VALUES ('201621003', '10001', 'C01');
INSERT INTO `selectcourse` VALUES ('201621003', '10003', 'E01');
INSERT INTO `selectcourse` VALUES ('201621004', '10001', 'C01');
INSERT INTO `selectcourse` VALUES ('201621004', '10003', 'E01');
INSERT INTO `selectcourse` VALUES ('201621005', '10001', 'C01');
INSERT INTO `selectcourse` VALUES ('201621005', '10003', 'E01');
INSERT INTO `selectcourse` VALUES ('201621006', '10001', 'C01');
INSERT INTO `selectcourse` VALUES ('201621006', '10003', 'E01');
INSERT INTO `selectcourse` VALUES ('201621007', '10001', 'C01');
INSERT INTO `selectcourse` VALUES ('201621007', '10002', 'M01');
INSERT INTO `selectcourse` VALUES ('201621008', '10001', 'C01');
INSERT INTO `selectcourse` VALUES ('201621008', '10002', 'M01');
INSERT INTO `selectcourse` VALUES ('201621009', '10001', 'C01');
INSERT INTO `selectcourse` VALUES ('201621009', '10002', 'M01');
INSERT INTO `selectcourse` VALUES ('201621010', '10001', 'C01');
INSERT INTO `selectcourse` VALUES ('201621010', '10002', 'M01');
INSERT INTO `selectcourse` VALUES ('201621011', '10001', 'C01');
INSERT INTO `selectcourse` VALUES ('201621011', '10002', 'M01');
INSERT INTO `selectcourse` VALUES ('201621012', '10001', 'C01');
INSERT INTO `selectcourse` VALUES ('201621012', '10002', 'M01');
INSERT INTO `selectcourse` VALUES ('201621013', '10002', 'M01');
INSERT INTO `selectcourse` VALUES ('201621013', '10003', 'E01');
INSERT INTO `selectcourse` VALUES ('201621014', '10002', 'M01');
INSERT INTO `selectcourse` VALUES ('201621014', '10003', 'E01');
INSERT INTO `selectcourse` VALUES ('201621015', '10002', 'M01');
INSERT INTO `selectcourse` VALUES ('201621015', '10003', 'E01');
INSERT INTO `selectcourse` VALUES ('201621016', '10002', 'M01');
INSERT INTO `selectcourse` VALUES ('201621016', '10003', 'E01');
INSERT INTO `selectcourse` VALUES ('201621017', '10002', 'M01');
INSERT INTO `selectcourse` VALUES ('201621017', '10003', 'E01');
INSERT INTO `selectcourse` VALUES ('201621018', '10002', 'M01');
INSERT INTO `selectcourse` VALUES ('201621018', '10003', 'E01');
COMMIT;

-- ----------------------------
-- Table structure for stuinfo
-- ----------------------------
DROP TABLE IF EXISTS `stuinfo`;
CREATE TABLE `stuinfo` (
  `stuId` varchar(10) NOT NULL,
  `stuPaw` varchar(10) NOT NULL,
  `stuName` varchar(20) NOT NULL,
  `stuClass` varchar(2) NOT NULL,
  `stuSex` char(2) NOT NULL,
  PRIMARY KEY (`stuId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of stuinfo
-- ----------------------------
BEGIN;
INSERT INTO `stuinfo` VALUES ('201621001', '123456', '张三', '1', 'M');
INSERT INTO `stuinfo` VALUES ('201621002', '123456', '李四', '1', 'M');
INSERT INTO `stuinfo` VALUES ('201621003', '123456', '王二', '1', 'M');
INSERT INTO `stuinfo` VALUES ('201621004', '123456', '妲己', '1', 'F');
INSERT INTO `stuinfo` VALUES ('201621005', '123456', '甄姬', '1', 'F');
INSERT INTO `stuinfo` VALUES ('201621006', '123456', '徐磊', '1', 'M');
INSERT INTO `stuinfo` VALUES ('201621007', '123456', '鲁班', '2', 'M');
INSERT INTO `stuinfo` VALUES ('201621008', '123456', '后裔', '2', 'M');
INSERT INTO `stuinfo` VALUES ('201621009', '123456', '蔡文姬', '2', 'F');
INSERT INTO `stuinfo` VALUES ('201621010', '123456', '张飞', '2', 'M');
INSERT INTO `stuinfo` VALUES ('201621011', '123456', '关羽', '2', 'M');
INSERT INTO `stuinfo` VALUES ('201621012', '123456', '安其拉', '2', 'F');
INSERT INTO `stuinfo` VALUES ('201621013', '123456', '盾山', '3', 'M');
INSERT INTO `stuinfo` VALUES ('201621014', '123456', '张良', '3', 'M');
INSERT INTO `stuinfo` VALUES ('201621015', '123456', '艾琳', '3', 'F');
INSERT INTO `stuinfo` VALUES ('201621016', '123456', '阿珂', '3', 'F');
INSERT INTO `stuinfo` VALUES ('201621017', '123456', '牛魔', '3', 'M');
INSERT INTO `stuinfo` VALUES ('201621018', '123456', '韩信', '3', 'M');
INSERT INTO `stuinfo` VALUES ('201621020', '123456', 'ysq', '5', 'f');
COMMIT;

-- ----------------------------
-- Table structure for teainfo
-- ----------------------------
DROP TABLE IF EXISTS `teainfo`;
CREATE TABLE `teainfo` (
  `teaId` varchar(10) NOT NULL,
  `teaPaw` varchar(10) NOT NULL,
  `teaName` varchar(20) NOT NULL,
  `teaSex` varchar(2) NOT NULL,
  PRIMARY KEY (`teaId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of teainfo
-- ----------------------------
BEGIN;
INSERT INTO `teainfo` VALUES ('10001', '123456', '诸葛亮', 'M');
INSERT INTO `teainfo` VALUES ('10002', '123456', '泰勒', 'M');
INSERT INTO `teainfo` VALUES ('10003', '123456', '马云', 'M');
INSERT INTO `teainfo` VALUES ('10005', '123456', 'qsy', 'F');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
