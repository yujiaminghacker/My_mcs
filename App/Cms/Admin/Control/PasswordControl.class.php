<?php
//测试控制器类
class PasswordControl extends Control{
    function edit(){
        if(IS_POST){
        	 //验证新密码
        	$password = Q("post.password",NULL,"trim");
        	//确认密码
            $password2 = Q("post.password2", NULL, 'trim');
            //验证就密码
            $oldpassword = Q("post.oldpassword", NULL, 'trim');
            if(!$password){
            	$this->error('新密码不能为空');
            }
             if($password2!=$password){
                $this->error('两次密码不一至');
            }
            if(!$oldpassword){
                $this->error('旧密码不能为空');
            }
            //验证数据库的 旧密码
            $pw=M("admin")->getField("password");
            if(md5($oldpassword)!=$pw){
            	$this->error('旧密码输入错误');
            }
            M("admin")->save(array('aid'=>$_SESSION['aid'],'password'=>md5($password)));
        	session(NULL);
        	$this->success("密码修改成功，请重新登录","",5);
        }else{
        	$this->display();
        }
    }
    //验证yonghujiumima
    public function oldpassword(){
        if($oldpassword = Q("post.oldpassword")){
            echo session("oldpassword") == M("admin")->getField("password")?1:0;
            exit;
        }
    }

}
?>