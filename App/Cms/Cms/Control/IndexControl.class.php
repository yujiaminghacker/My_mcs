<?php

/**
 * 后台登录界面
 * Class IndexControl
 * @author yjm <yujiaminghacker@126.com>
 */
class IndexControl extends AuthControl
{
    //显示后台轴页面
    public function index(){
        $this->display();
    }
    //欢迎页面
    public function welcome(){	
        $this->display();
    }
}
?>