<?php if(!defined('HDPHP_PATH'))EXIT;
$db->exe("REPLACE INTO ".$db_prefix."category (`cid`,`cat_name`,`pid`,`cat_order`) VALUES('7','产品管理','0','0')");
$db->exe("REPLACE INTO ".$db_prefix."category (`cid`,`cat_name`,`pid`,`cat_order`) VALUES('8','海铁联运','7','0')");
$db->exe("REPLACE INTO ".$db_prefix."category (`cid`,`cat_name`,`pid`,`cat_order`) VALUES('6','办公室','0','0')");
$db->exe("REPLACE INTO ".$db_prefix."category (`cid`,`cat_name`,`pid`,`cat_order`) VALUES('9','码头作业','7','0')");
$db->exe("REPLACE INTO ".$db_prefix."category (`cid`,`cat_name`,`pid`,`cat_order`) VALUES('10','集装箱定舱','7','0')");
$db->exe("REPLACE INTO ".$db_prefix."category (`cid`,`cat_name`,`pid`,`cat_order`) VALUES('11','优质的仓储服务','7','0')");
$db->exe("REPLACE INTO ".$db_prefix."category (`cid`,`cat_name`,`pid`,`cat_order`) VALUES('12','海陆联运','7','0')");
$db->exe("REPLACE INTO ".$db_prefix."category (`cid`,`cat_name`,`pid`,`cat_order`) VALUES('13','网站新闻','0','0')");
