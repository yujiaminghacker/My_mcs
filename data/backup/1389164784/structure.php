<?php if(!defined('HDPHP_PATH'))EXIT;
$db->exe("DROP TABLE IF EXISTS `".$db_prefix."admin`");
$db->exe("CREATE TABLE `".$db_prefix."admin`".$db_prefix." (
  `".$db_prefix."aid`".$db_prefix." smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `".$db_prefix."username`".$db_prefix." char(30) NOT NULL DEFAULT '' COMMENT '帐号',
  `".$db_prefix."password`".$db_prefix." char(32) NOT NULL DEFAULT '' COMMENT '密码',
  PRIMARY KEY (`".$db_prefix."aid`".$db_prefix.")
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='管理员表'");
$db->exe("DROP TABLE IF EXISTS `".$db_prefix."category`");
$db->exe("CREATE TABLE `".$db_prefix."category`".$db_prefix." (
  `".$db_prefix."cid`".$db_prefix." smallint(5) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `".$db_prefix."cat_name`".$db_prefix." char(30) NOT NULL DEFAULT '' COMMENT '栏目名称',
  `".$db_prefix."pid`".$db_prefix." smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '父ID',
  `".$db_prefix."cat_order`".$db_prefix." smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '栏目排序',
  PRIMARY KEY (`".$db_prefix."cid`".$db_prefix.")
) ENGINE=MyISAM AUTO_INCREMENT=54 DEFAULT CHARSET=utf8 COMMENT='栏目表'");
$db->exe("DROP TABLE IF EXISTS `".$db_prefix."config`");
$db->exe("CREATE TABLE `".$db_prefix."config`".$db_prefix." (
  `".$db_prefix."id`".$db_prefix." smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `".$db_prefix."title`".$db_prefix." char(60) DEFAULT NULL COMMENT '标题',
  `".$db_prefix."name`".$db_prefix." char(30) DEFAULT NULL COMMENT '变量名',
  `".$db_prefix."show_type`".$db_prefix." tinyint(4) NOT NULL DEFAULT '1' COMMENT '显示类型  1 文本框  2 单选框',
  `".$db_prefix."value`".$db_prefix." char(100) NOT NULL DEFAULT '',
  `".$db_prefix."conf`".$db_prefix." varchar(255) DEFAULT NULL,
  PRIMARY KEY (`".$db_prefix."id`".$db_prefix.")
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COMMENT='网站配置'");
$db->exe("DROP TABLE IF EXISTS `".$db_prefix."content`");
$db->exe("CREATE TABLE `".$db_prefix."content`".$db_prefix." (
  `".$db_prefix."id`".$db_prefix." int(10) unsigned NOT NULL AUTO_INCREMENT,
  `".$db_prefix."title`".$db_prefix." char(100) NOT NULL DEFAULT '' COMMENT '标题',
  `".$db_prefix."content`".$db_prefix." text COMMENT '正文',
  `".$db_prefix."addtime`".$db_prefix." int(10) NOT NULL DEFAULT '0' COMMENT '添加时间',
  `".$db_prefix."click`".$db_prefix." mediumint(8) unsigned NOT NULL DEFAULT '100' COMMENT '查看次数',
  `".$db_prefix."flag`".$db_prefix." set('置顶','推荐') DEFAULT NULL COMMENT '文章属性',
  `".$db_prefix."category_cid`".$db_prefix." smallint(6) NOT NULL COMMENT '栏目id',
  `".$db_prefix."admin_aid`".$db_prefix." smallint(5) unsigned NOT NULL COMMENT '管理员id',
  `".$db_prefix."keywords`".$db_prefix." varchar(255) DEFAULT NULL COMMENT '关键字',
  `".$db_prefix."description`".$db_prefix." varchar(255) DEFAULT NULL COMMENT '描述',
  `".$db_prefix."thumb`".$db_prefix." varchar(255) DEFAULT NULL COMMENT '缩略图',
  PRIMARY KEY (`".$db_prefix."id`".$db_prefix."),
  KEY `".$db_prefix."fk_content_category_idx`".$db_prefix." (`".$db_prefix."category_cid`".$db_prefix."),
  KEY `".$db_prefix."fk_content_admin1_idx`".$db_prefix." (`".$db_prefix."admin_aid`".$db_prefix.")
) ENGINE=MyISAM AUTO_INCREMENT=36 DEFAULT CHARSET=utf8 COMMENT='文章表'");
$db->exe("DROP TABLE IF EXISTS `".$db_prefix."hd_name`");
$db->exe("CREATE TABLE `".$db_prefix."hd_name`".$db_prefix." (
  `".$db_prefix."id`".$db_prefix." int(10) unsigned NOT NULL AUTO_INCREMENT,
  `".$db_prefix."title`".$db_prefix." varchar(50) DEFAULT NULL,
  `".$db_prefix."con`".$db_prefix." varchar(100) DEFAULT NULL,
  `".$db_prefix."click`".$db_prefix." int(11) DEFAULT NULL,
  PRIMARY KEY (`".$db_prefix."id`".$db_prefix.")
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8");
$db->exe("DROP TABLE IF EXISTS `".$db_prefix."links`");
$db->exe("CREATE TABLE `".$db_prefix."links`".$db_prefix." (
  `".$db_prefix."id`".$db_prefix." smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `".$db_prefix."webname`".$db_prefix." varchar(45) NOT NULL DEFAULT '',
  `".$db_prefix."url`".$db_prefix." varchar(100) NOT NULL DEFAULT '',
  `".$db_prefix."logo`".$db_prefix." varchar(255) NOT NULL DEFAULT '',
  `".$db_prefix."status`".$db_prefix." tinyint(4) NOT NULL DEFAULT '0' COMMENT '状态  1 显示  0 不显示',
  PRIMARY KEY (`".$db_prefix."id`".$db_prefix.")
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='友情链接'");
