<?php
if (!defined("HDPHP_PATH"))exit('No direct script access allowed');
//更多配置请查看hdphp/Config/config.php
return array(
	"DB_BACKUP"=>ROOT_PATH."data/backup/".time(),
	//数据库备份目录
);
?>