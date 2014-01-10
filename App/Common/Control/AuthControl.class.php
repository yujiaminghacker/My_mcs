<?php

class AuthControl extends Control
{
    //构造函数
    public function __construct()
    {
        parent::__construct();
        if(!$this->checkAuth()){
            echo "<script>
                top.location.href='".U('Cms/Login/login')."';
            </script>";
            exit;
        }
    }
    //验证后台登录权限
    protected function checkAuth(){
        if(session('aid')){
            return true;
        }else{
            return false;
        }
    }
}