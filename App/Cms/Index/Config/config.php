<?php
if (!defined("HDPHP_PATH"))exit('No direct script access allowed');
//更多配置请查看hdphp/Config/config.php
return array(
	 'TPL_FIX'                       => '.html',     //模版文件扩展名
	     //模板标签类文件
     'TPL_TAGS'     =>array('TagTag'),
     'CACHE_SELECT_TIME'=>10
);
?>