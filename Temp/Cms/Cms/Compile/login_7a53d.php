<?php if(!defined("HDPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><!DOCTYPE html>
<html lang="en">
    <head>
        <title>Unicorn Admin</title>
		<meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <script type='text/javascript' src='http://localhost/hdphp/hdphp/hdphp/../hdjs/jquery-1.8.2.min.js'></script>
<link href='http://localhost/hdphp/hdphp/hdphp/../hdjs/css/hdjs.css' rel='stylesheet' media='screen'>
<script src='http://localhost/hdphp/hdphp/hdphp/../hdjs/js/hdjs.js'></script>
<script src='http://localhost/hdphp/hdphp/hdphp/../hdjs/js/slide.js'></script>
<script src='http://localhost/hdphp/hdphp/hdphp/../hdjs/org/cal/lhgcalendar.min.js'></script>
<script type='text/javascript'>
		HOST = 'http://localhost';
		ROOT = 'http://localhost/My_mcs';
		WEB = 'http://localhost/My_mcs/index.php';
		URL = 'http://localhost/My_mcs/index.php/Cms/Login/login';
		HDPHP = 'http://localhost/hdphp/hdphp/hdphp';
		HDPHPDATA = 'http://localhost/hdphp/hdphp/hdphp/Data';
		HDPHPTPL = 'http://localhost/hdphp/hdphp/hdphp/Lib/Tpl';
		HDPHPEXTEND = 'http://localhost/hdphp/hdphp/hdphp/Extend';
		APP = 'http://localhost/My_mcs/index.php/Cms';
		CONTROL = 'http://localhost/My_mcs/index.php/Cms/Login';
		METH = 'http://localhost/My_mcs/index.php/Cms/Login/login';
		GROUP = 'http://localhost/My_mcs/G:\wamp\www\My_mcs\App';
		TPL = 'http://localhost/My_mcs/App/Cms/Cms/Tpl';
		CONTROLTPL = 'http://localhost/My_mcs/App/Cms/Cms/Tpl/Login';
		STATIC = 'http://localhost/My_mcs/App/Cms/Cms/Tpl/Static';
		PUBLIC = 'http://localhost/My_mcs/App/Cms/Cms/Tpl/Public';
</script>
        <script type="text/javascript" src="http://localhost/My_mcs/App/Cms/Cms/Tpl/Login/js/js.js"></script>
		<link type="text/css" rel="stylesheet" href="http://localhost/My_mcs/App/Cms/Cms/Tpl/Login/css/bootstrap.min.css"/>
		<link type="text/css" rel="stylesheet" href="http://localhost/My_mcs/App/Cms/Cms/Tpl/Login/css/bootstrap-responsive.min.css"/>
        <link type="text/css" rel="stylesheet" href="http://localhost/My_mcs/App/Cms/Cms/Tpl/Login/css/unicorn.login.css"/>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>
    <body>
 
<!--         <div id="logo">
            <img src="img/logo.png" alt="" />
        </div> -->  
        <div id="loginbox">            
            <form id="loginform" class="form-vertical" action="index.html" />
				<p>请输入：后台管理账号密码 </p>
                <div class="control-group">
                    <div class="controls">
                        <div class="input-prepend">
                            <span class="add-on">
                                <i class="icon-user"></i>
                            </span>
                            <input type="text" name="username" placeholder="Username"/>
                        </div>
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <div class="input-prepend">
                            <span class="add-on">
                                <i class="icon-lock"></i>
                            </span>
                            <input type="password" placeholder="Password"  name="password"/>
                        </div>
                    </div>
                </div>
                <!-- 验证码 -->

              <div class="control-group">
                    <div class="controls">
                        <div class="input-prepend">
                            <span class="add-on">
                                <i class="icon-code"></i>
                            </span>
                            <input type="text" placeholder="Code"   name="code" class="w100" />
                             <img src="<?php echo U('code');?>" style="cursor: pointer" onclick="this.src='http://localhost/My_mcs/index.php/Cms/Login/code/'+Math.random()"/>
                            <span id="hd_code" ></span>
                        </div>
                           
                            
                    </div>
                </div>
                <div class="form-actions">
                    <span class="pull-right"><input type="submit" class="btn btn-inverse" value="Login" /></span>
                </div>
            </form>

        </div>
        <script type="text/javascript" src="http://localhost/My_mcs/App/Cms/Cms/Tpl/Login/js/unicorn.login.js"></script>

    </body>
</html>
