<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Unicorn Admin</title>
		<meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <hdjs/>
        <js file="__CONTROL_TPL__/js/js.js"/>
		<css file="__CONTROL_TPL__/css/bootstrap.min.css"/>
		<css file="__CONTROL_TPL__/css/bootstrap-responsive.min.css"/>
        <css file="__CONTROL_TPL__/css/unicorn.login.css"/>
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
                             <img src="{|U:'code'}" style="cursor: pointer" onclick="this.src='__CONTROL__/code/'+Math.random()"/>
                            <span id="hd_code" ></span>
                        </div>
                           
                            
                    </div>
                </div>
                <div class="form-actions">
                    <span class="pull-right"><input type="submit" class="btn btn-inverse" value="Login" /></span>
                </div>
            </form>

        </div>
        <js file="__CONTROL_TPL__/js/unicorn.login.js"/>

    </body>
</html>
