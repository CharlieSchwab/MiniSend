/*
 Navicat MySQL Data Transfer

 Source Server         : myconnection
 Source Server Type    : MySQL
 Source Server Version : 100414
 Source Host           : localhost:3306
 Source Schema         : mailmanager_db

 Target Server Type    : MySQL
 Target Server Version : 100414
 File Encoding         : 65001

 Date: 30/12/2020 14:40:56
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for mailtable
-- ----------------------------
DROP TABLE IF EXISTS `mailtable`;
CREATE TABLE `mailtable`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `sender` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `recipient` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `subject` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `content` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `attach_url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of mailtable
-- ----------------------------
INSERT INTO `mailtable` VALUES (1, 'chrlschwb@gmail.com', '123@haha.com', 'Test', 'Hello', NULL, '', NULL, NULL);
INSERT INTO `mailtable` VALUES (3, 'chrlschwb@gmail.com', '123@uo.comsss', 'test2', 'too long goingdfef', NULL, NULL, '2020-12-30 11:01:59', NULL);
INSERT INTO `mailtable` VALUES (4, 'chrlschwb@gmail.com', '123@vue.test', 'test', 'testing, testing', NULL, NULL, '2020-12-30 11:02:18', NULL);
INSERT INTO `mailtable` VALUES (5, 'chrlschwb@gmail.com', 'denisgurovdev@outlook.com', 'LiveTest1', '<html>\n<body>\n<b>Hello</b>\n</body>\n</html>', NULL, NULL, '2020-12-30 11:02:53', NULL);
INSERT INTO `mailtable` VALUES (6, 'chrlschwb@gmail.com', 'denisgurovdev@outlook.com', 'LiveTest2', 'Hello, Denis! \nThis is Charlie.', NULL, NULL, '2020-12-30 11:03:49', NULL);
INSERT INTO `mailtable` VALUES (7, 'Charlie', 'chrlschwb@gmail.com', 'first test', 'hello charlie', NULL, NULL, '2020-12-30 10:58:56', '2020-12-30 10:56:20');
INSERT INTO `mailtable` VALUES (8, 'Charlie', 'chrlschwb@gmail.com', 'first test', 'hello charlie', NULL, NULL, '2020-12-30 11:00:35', '2020-12-30 11:00:35');

SET FOREIGN_KEY_CHECKS = 1;
