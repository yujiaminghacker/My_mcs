<?php
//测试控制器类
class ConfigControl extends Control{
	//数据表
	private $_db;
	function __init(){
		$this->_db=K("Config");//实例化这个模型  加载当前应用扩展模型
	}
    function edit(){
    	if(IS_POST){
    		if($this->_db->edit_config()){
    			$this->success('修改配置项成功');
    		}
    	}else{
    		$this->config=$this->_db->get_all_config();//产生html文件
    		$this->display();
       }	
    }
}
?>