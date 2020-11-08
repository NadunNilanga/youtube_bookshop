/*
 Navicat Premium Data Transfer

 Source Server         : 127.0.0.1
 Source Server Type    : MySQL
 Source Server Version : 50719
 Source Host           : 127.0.0.1:3306
 Source Schema         : book_store

 Target Server Type    : MySQL
 Target Server Version : 50719
 File Encoding         : 65001

 Date: 22/05/2020 11:13:34
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for tbl_cart
-- ----------------------------
DROP TABLE IF EXISTS `tbl_cart`;
CREATE TABLE `tbl_cart`  (
  `rec_id` int(11) NOT NULL AUTO_INCREMENT,
  `invoice_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `t_price` decimal(10, 2) NOT NULL,
  `created_at` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`rec_id`) USING BTREE,
  INDEX `invoice_id`(`invoice_id`) USING BTREE,
  INDEX `item_id`(`item_id`) USING BTREE,
  CONSTRAINT `tbl_cart_ibfk_1` FOREIGN KEY (`invoice_id`) REFERENCES `tbl_invoice` (`invoice_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tbl_cart_ibfk_2` FOREIGN KEY (`item_id`) REFERENCES `tbl_items` (`item_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_cart
-- ----------------------------

-- ----------------------------
-- Table structure for tbl_daily_stock
-- ----------------------------
DROP TABLE IF EXISTS `tbl_daily_stock`;
CREATE TABLE `tbl_daily_stock`  (
  `rec_no` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) NOT NULL,
  `qty` decimal(10, 2) NOT NULL,
  `created_at` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`rec_no`) USING BTREE,
  INDEX `item_id`(`item_id`) USING BTREE,
  CONSTRAINT `tbl_daily_stock_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `tbl_items` (`item_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_daily_stock
-- ----------------------------

-- ----------------------------
-- Table structure for tbl_invoice
-- ----------------------------
DROP TABLE IF EXISTS `tbl_invoice`;
CREATE TABLE `tbl_invoice`  (
  `invoice_id` int(11) NOT NULL AUTO_INCREMENT,
  `rec_date` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0),
  `sub_total` decimal(10, 2) NOT NULL,
  `discount` decimal(10, 2) NOT NULL,
  `invoice_total` decimal(10, 2) NOT NULL,
  `cash` decimal(10, 2) NOT NULL,
  `balance` decimal(10, 2) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0=active, 1 deleted',
  PRIMARY KEY (`invoice_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_invoice
-- ----------------------------

-- ----------------------------
-- Table structure for tbl_items
-- ----------------------------
DROP TABLE IF EXISTS `tbl_items`;
CREATE TABLE `tbl_items`  (
  `item_id` int(11) NOT NULL AUTO_INCREMENT,
  `item_descriptiion` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `item_qty` decimal(10, 2) NOT NULL,
  `unit_price` decimal(10, 2) NOT NULL,
  `bar_code_value` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `created_at` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0),
  `status` tinyint(1) NOT NULL COMMENT '0=active, 1 =deleted',
  PRIMARY KEY (`item_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_items
-- ----------------------------
INSERT INTO `tbl_items` VALUES (1, 'sdasd', 45.00, 450.00, '12346', '2020-05-06 00:00:00', 0);

-- ----------------------------
-- Table structure for tbl_privilages
-- ----------------------------
DROP TABLE IF EXISTS `tbl_privilages`;
CREATE TABLE `tbl_privilages`  (
  `privilage_id` int(11) NOT NULL AUTO_INCREMENT,
  `privilage` varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `created_at` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`privilage_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_privilages
-- ----------------------------
INSERT INTO `tbl_privilages` VALUES (1, 'dsdgdgd', '2020-04-10 23:43:15');

-- ----------------------------
-- Table structure for tbl_users
-- ----------------------------
DROP TABLE IF EXISTS `tbl_users`;
CREATE TABLE `tbl_users`  (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `password` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `created_at` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0),
  `status` tinyint(1) NOT NULL COMMENT '0=active,1=deleted',
  PRIMARY KEY (`user_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_users
-- ----------------------------
INSERT INTO `tbl_users` VALUES (2, 'fgdgf', 'dfgdfgd', '2020-04-10 23:44:00', 0);
INSERT INTO `tbl_users` VALUES (4, 'nadun', 'ttt', '2020-05-02 00:00:00', 0);
INSERT INTO `tbl_users` VALUES (5, 'nadun2', '13', '2020-04-05 00:00:00', 0);

-- ----------------------------
-- Table structure for user_privilages
-- ----------------------------
DROP TABLE IF EXISTS `user_privilages`;
CREATE TABLE `user_privilages`  (
  `user_privilage_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `privilage_id` int(11) NOT NULL,
  `created_at` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`user_privilage_id`) USING BTREE,
  INDEX `user_id`(`user_id`, `privilage_id`) USING BTREE,
  INDEX `privilage_id`(`privilage_id`) USING BTREE,
  CONSTRAINT `user_privilages_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tbl_users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `user_privilages_ibfk_2` FOREIGN KEY (`privilage_id`) REFERENCES `tbl_privilages` (`privilage_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user_privilages
-- ----------------------------

SET FOREIGN_KEY_CHECKS = 1;
