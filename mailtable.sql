/*
Navicat MySQL Data Transfer

Source Server         : myconnection
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : mailmanager_db

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2021-01-03 21:54:09
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for mailtable
-- ----------------------------
DROP TABLE IF EXISTS `mailtable`;
CREATE TABLE `mailtable` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sender` varchar(255) DEFAULT NULL,
  `recipient` varchar(255) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `content` varchar(999) DEFAULT NULL,
  `attach_url` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of mailtable
-- ----------------------------
INSERT INTO `mailtable` VALUES ('1', 'chrlschwb@gmail.com', '123@haha.com', 'Test - html', '<html lang=\"en\">\n<head>\n  <title>Bootstrap Example</title>\n  <meta charset=\"utf-8\">\n  <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">\n  <link rel=\"stylesheet\" href=\"https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css\">\n  <script src=\"https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js\"></script>\n  <script src=\"https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js\"></script>\n  <script src=\"https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js\"></script>\n</head>\n<body>\n\n<div class=\"container\">\n  <h2>Basic Progress Bar</h2>\n  <p>To create a default progress bar, add a .progress class to a container element and add the progress-bar class to its child element. Use the CSS width property to set the width of the progress bar:</p>\n  <div class=\"progress\">\n    <div class=\"progress-bar\" style=\"width:70%\"></div>\n  </div>\n</div>\n\n</body>\n</html>', 'null', 'failed', '2021-01-03 13:33:10', null);
INSERT INTO `mailtable` VALUES ('4', 'chrlschwb@gmail.com', '123@vue.test', 'test2 - HTML', 'testing, testing\n\n<html>\n<head>\n  <link rel=\"stylesheet\" href=\"https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css\">\n  <script src=\"https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js\"></script>\n  <script src=\"https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js\"></script>\n  <script src=\"https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js\"></script>\n\n</head>\n<body>\n<u>testing<sup>3</sup>, testing<sub>2</sub></u>\n\n<div class=\"spinner-border text-muted\"></div>\n<div class=\"spinner-border text-primary\"></div>\n<div class=\"spinner-border text-success\"></div>\n<div class=\"spinner-border text-info\"></div>\n<div class=\"spinner-border text-warning\"></div>\n<div class=\"spinner-border text-danger\"></div>\n<div class=\"spinner-border text-secondary\"></div>\n<div class=\"spinner-border text-dark\"></div>\n<div class=\"spinner-border text-light\"></div>\n\n</body>\n<html>', null, 'failed', '2020-12-30 15:57:37', null);
INSERT INTO `mailtable` VALUES ('5', 'chrlschwb@gmail.com', 'denisgurovdev@outlook.com', 'LiveTest1', '<html>\n<body>\n<b>Hello</b>\n</body>\n</html>', null, 'failed', '2020-12-30 11:02:53', null);
INSERT INTO `mailtable` VALUES ('6', 'chrlschwb@gmail.com', 'denisgurovdev@outlook.com', 'LiveTest2', 'Hello, Denis! \nThis is Charlie.', null, 'failed', '2020-12-30 11:03:49', null);
INSERT INTO `mailtable` VALUES ('7', 'Charlie', 'chrlschwb@gmail.com', 'first test', 'hello charlie', null, 'failed', '2020-12-30 10:58:56', '2020-12-30 10:56:20');
INSERT INTO `mailtable` VALUES ('24', 'chrlschwb@gmail.com', 'denisgurovdev@outlook.com', 'File Attachment Test', 'This test is dedicated to file attachment', '5ff1c813e6e5c.txt', 'failed', '2021-01-03 13:35:39', '2021-01-03 13:35:16');
INSERT INTO `mailtable` VALUES ('25', 'chrlschwb@gmail.com', 'denisgurovdev@outlook.com', 'FileTest2', 'Another File Transfer Test 2', '5ff1c97ba37a5.txt', 'failed', '2021-01-03 13:41:15', '2021-01-03 13:36:35');
