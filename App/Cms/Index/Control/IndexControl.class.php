<?php
//测试控制器类
class IndexControl extends Control{
	private $_db;
    function __init(){
     	import("Content/Model/ContentModel");
     	define("__TEMPLATE__",__ROOT__ ."/template/default/");
    }
   function index(){
   		$this->display("template/default/index.html");
   }
   function category(){
        $this->display("template/default/list.html");   		
   }
    function content()
    {
        $id = Q("get.id", NULL, 'intval');
        if ($id > 0) {
            $db=K("Content");
            $this->field= $db->find($id);
            $this->display('template/default/content.html');
        }
    }
}
?>