
SET FOREIGN_KEY_CHECKS=0;

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL,
  `nickname` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL  COMMENT 'MD5加密',
  `delete_time` int(11) DEFAULT NULL,
  `update_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

INSERT INTO `user` VALUES ('1', '1','admin','e10adc3949ba59abbe56e057f20f883e',  null, null);

DROP TABLE IF EXISTS `role`;
CREATE TABLE `role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL ,
  `delete_time` int(11) DEFAULT NULL,
  `update_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

INSERT INTO `role` VALUES ('1', '管理员',  null, null);
INSERT INTO `role` VALUES ('2', '操作员',  null, null);


DROP TABLE IF EXISTS `taskitem`;
CREATE TABLE `taskitem` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL COMMENT '现金日记账项目',
  `delete_time` int(11) DEFAULT NULL,
  `update_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COMMENT='现金日记账项目';

INSERT INTO `taskitem` VALUES ('1', '管理费用',  null, null);
INSERT INTO `taskitem` VALUES ('2', '入库',  null, null);
INSERT INTO `taskitem` VALUES ('3', '工资',  null, null);
INSERT INTO `taskitem` VALUES ('4', '伙食费', null, null);
INSERT INTO `taskitem` VALUES ('5', '电费', null, null);
INSERT INTO `taskitem` VALUES ('6', '提成', null, null);

DROP TABLE IF EXISTS `consume`;
CREATE TABLE `consume` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL COMMENT '入库产品名称，通常作为标识',
  `delete_time` int(11) DEFAULT NULL,
  `update_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COMMENT='入库产品表';

INSERT INTO `consume` VALUES ('1', '饲料', null, null);
INSERT INTO `consume` VALUES ('2', '营养品', null, null);
INSERT INTO `consume` VALUES ('3', '消毒品', null, null);
INSERT INTO `consume` VALUES ('4', '进水机', null, null);
INSERT INTO `consume` VALUES ('5', '鼓风机', null, null);



DROP TABLE IF EXISTS `consume_item`;
CREATE TABLE `consume_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `consume_id` int(11) NOT NULL COMMENT '关联consume表',
  `name` varchar(50) DEFAULT NULL COMMENT '子类名称',
  `specs` varchar(50) DEFAULT NULL COMMENT '规格，如500ML/瓶',
  `unit` varchar(50) DEFAULT NULL COMMENT '单位 瓶',
  `price` decimal(6,2) DEFAULT NULL COMMENT '价格,单位：分',
  `delete_time` int(11) DEFAULT NULL,
  `update_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COMMENT='consume子项表';


INSERT INTO `consume_item` VALUES ('1', '1','米糠','50Kg/包', '包','22.11',null, null);
INSERT INTO `consume_item` VALUES ('2', '3','生石灰','50Kg/包', '包','21.11',null, null);
INSERT INTO `consume_item` VALUES ('3', '3','高锰酸钾','50Kg/包', '包','22.11',null, null);
INSERT INTO `consume_item` VALUES ('4', '5','鼓风机','100Kw/台', '台','1000',null, null);
INSERT INTO `consume_item` VALUES ('5', '2','鱼油（网购）','100ML/瓶', '瓶','22.11',null, null);
INSERT INTO `consume_item` VALUES ('6', '1','华义 食用葡萄糖','50Kg/包', '包','22.11',null, null);


DROP TABLE IF EXISTS `costarea`;
CREATE TABLE `costarea` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL COMMENT '费用区域',
  `delete_time` int(11) DEFAULT NULL,
  `update_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COMMENT='费用区域项';

INSERT INTO `costarea` VALUES ('1', '管理费用',  null, null);
INSERT INTO `costarea` VALUES ('2', 'A区费用',  null, null);
INSERT INTO `costarea` VALUES ('3', 'B区费用',  null, null);
INSERT INTO `costarea` VALUES ('4', 'C区费用',  null, null);
INSERT INTO `costarea` VALUES ('5', '车间费用',  null, null);
INSERT INTO `costarea` VALUES ('6', '总仓库',  null, null);


DROP TABLE IF EXISTS `aquaculturearea`;
CREATE TABLE `aquaculturearea` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL COMMENT '水产区域',
  `delete_time` int(11) DEFAULT NULL,
  `update_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COMMENT='水产区域项';

INSERT INTO `aquaculturearea` VALUES ('1', 'A区',  null, null);
INSERT INTO `aquaculturearea` VALUES ('2', 'B区',  null, null);
INSERT INTO `aquaculturearea` VALUES ('3', 'C区',  null, null);


DROP TABLE IF EXISTS `aquaculture_item`;
CREATE TABLE `aquaculture_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `aquaculture_id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL COMMENT '塘号',
  `delete_time` int(11) DEFAULT NULL,
  `update_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COMMENT='塘号';

INSERT INTO `aquaculture_item` VALUES ('1','1', '1号塘',  null, null);
INSERT INTO `aquaculture_item` VALUES ('2','2', '1号塘',  null, null);
INSERT INTO `aquaculture_item` VALUES ('3','3', '1号塘',  null, null);



DROP TABLE IF EXISTS `daybook`;
CREATE TABLE `daybook` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `book_time` int(11) DEFAULT NULL,
  `taskItem_id` int(11) NOT NULL,
  `income` int(11) NOT NULL,
  `pay` int(11) NOT NULL , 
  `surplus` int(11) NOT NULL ,
  `costarea_id` int(11) NOT NULL ,
  `paytype`  varchar(50) DEFAULT NULL COMMENT '结算方式' ,
  `delete_time` int(11) DEFAULT NULL,
  `update_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COMMENT='';

DROP TABLE IF EXISTS `stock`;
CREATE TABLE `stock` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `consumeitem_id` int(11) DEFAULT NULL,
  `total_count` int(11) NOT NULL DEFAULT '0',
  `delete_time` int(11) DEFAULT NULL,
  `update_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COMMENT='';

DROP TABLE IF EXISTS `stock_detail`;
CREATE TABLE `stock_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` int(4) DEFAULT NULL ,
  `consumeitem_id` int(11) DEFAULT NULL,
  `total_count` int(11) DEFAULT NULL ,
  `delete_time` int(11) DEFAULT NULL,
  `update_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COMMENT='';

