<?php
//测试控制器类 数据备份
class BackupControl extends Control{
    public function index(){
        $dirs = Dir::tree('data/Backup');
        $this->dirs = $dirs;
        $this->display();
    }
    // 备份表
    public function backup(){
    	Backup::backup(array("url"=>U('index')));	
    }
    // 山吃
    public function del(){
    	$dir=Q("dirname");
    	if(Dir::del("data/Backup/".$dir)){
    		$this->success('删除成功', 'index');
    	}else{
    		  $this->error('删除失败，请修改备份目录权限为Apache可写', 'index');
    	}
    }
    //还原  备份
    public function recovery(){
    	$dir=Q("dirname");
    	Backup::recovery(array("dir"=>"data/Backup/".$dir,"url"=>"index"));
    }


}
?>