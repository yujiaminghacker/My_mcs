<!DOCTYPE html>
<html lang="en">
    <head>
        <title>网站配置</title>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <hdjs />
        <js file='__CONTROL_TPL__/js/validation.js'/>
        <css file='__CONTROL_TPL__/css/css.css'/>
        <css file="__CONTROL_TPL__/css/bootstrap.min.css"/>
        <css file="__CONTROL_TPL__/css/bootstrap-responsive.min.css"/>
        <css file="__CONTROL_TPL__/css/fullcalendar.css"/>
        <css file="__CONTROL_TPL__/css/unicorn.main.css"/>
        <css file="__CONTROL_TPL__/css/unicorn.grey.css " class="skin-color">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>
    <body>
        
        <!-- 站位div -->
        <div id="header">
            <h1><a href="./dashboard.html">Unicorn Admin</a></h1>       
        </div>
        <!-- 搜索框 -->
        <div id="search">
            <input type="text" placeholder="Search here..." /><button type="submit" class="tip-right" title="Search"><i class="icon-search icon-white"></i></button>
        </div>
        <!-- 右上角 登陆 消息中心 -->
        <div id="user-nav" class="navbar navbar-inverse">
            <ul class="nav btn-group">
                <li class="btn btn-inverse"><a href="{|U:'Cms/Login/out'}" target="_self"><i class="icon icon-share-alt"></i> <span class="text">Exit</span></a></li>
            </ul>
        </div>
         <!-- 左边 分类管理 -->
        <div id="sidebar">
            <a href="#" class="visible-phone"><i class="icon icon-home"></i> Dashboard</a>
            <ul>
                <li class=""><a href="__ROOT__"><i class="icon icon-home"></i> <span>前台Index</span></a></li>
               <li class="submenu ">
                    <a href="#"><i class="icon icon-th-list"></i> <span>总管理</span> <span class="label">2</span></a>
                    <ul>
                        <li ><a href="{|U:'Content/Index/index'}">文章管理</a></li>
                        <li ><a href="{|U:'Category/Index/index'}">栏目管理</a></li>
                    </ul>
                </li>
                <li class="submenu ">
                    <a href="#"><i class="icon icon-file"></i> <span>我的面板</span> <span class="label">1</span></a>
                    <ul>
                        <li ><a href="{|U:'Admin/Password/edit'}">修改密码</a></li>
                    </ul>
                </li>
                <li class="submenu active open">
                    <a href="#"><i class="icon icon-cog"></i><span>配置</span> <span class="label">1</span></a>
                    <ul>
                        <li class="active"><a href="{|U:'Config/Config/edit'}">网站配置</a></li>
                    </ul>
                </li>
                                <li class="submenu">
                    <a href="#"><i class="icon icon-pencil"></i><span>系统</span> <span class="label">1</span></a>
                    <ul>
                        <li><a href="{|U:'Backup/Backup/index'}">备份数据</a></li>
                    </ul>
                </li>
            </ul>
        
        </div>
        <!-- 切换北京 -->
        <div id="style-switcher">
            <i class="icon-arrow-left icon-white"></i>
            <span>Style:</span>
            <a href="#grey" style="background-color: #555555;border-color: #aaaaaa;"></a>
            <a href="#blue" style="background-color: #2D2F57;"></a>
            <a href="#red" style="background-color: #673232;"></a>
        </div>
        
        <div id="content">
            <div id="content-header">
                <h1>Yjm   Cms </h1>
                <div class="btn-group">
                    <a class="btn btn-large tip-bottom" title="Manage Files"><i class="icon-file"></i></a>
                    <a class="btn btn-large tip-bottom" title="Manage Users"><i class="icon-user"></i></a>
                    <a class="btn btn-large tip-bottom" title="Manage Comments"><i class="icon-comment"></i><span class="label label-important">5</span></a>
                    <a class="btn btn-large tip-bottom" title="Manage Orders"><i class="icon-shopping-cart"></i></a>
                </div>
            </div>
            <div id="breadcrumb">
                <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
                <a href="#" class="current">Yjm</a>
            </div>
<div class="warp">
    <form action="__METH__" method="post" class="hd-form">
        <div class="tab">
            <ul class="tab_menu">
                <li lab="base">
                    <a> 网站配置 </a>
                </li>
            </ul>
            <div class="tab_content">
                <div id="base">
                    <table class="table1">
                        <list from="$config" name="c">
                            {$c._html}
                        </list>
                    </table>
                </div>
            </div>
            <input type="submit" class="btn btn-primary" value="确定"/>
        </div>
    </form>
</div>
        </div>
        <js file="__CONTROL_TPL__/js/jquery.min.js"/>
            <js file="__CONTROL_TPL__/js/excanvas.min.js"/>
            <js file="__CONTROL_TPL__/js/jquery.ui.custom.js"/>
            <js file="__CONTROL_TPL__/js/bootstrap.min.js"/>
            <js file="__CONTROL_TPL__/js/jquery.flot.min.js"/>
            <js file="__CONTROL_TPL__/js/jquery.flot.resize.min.js"/>
            <js file="__CONTROL_TPL__/js/jquery.peity.min.js"/>
            <js file="__CONTROL_TPL__/js/fullcalendar.min.js"/>
            <js file="__CONTROL_TPL__/js/unicorn.js"/>
            <js file="__CONTROL_TPL__/js/unicorn.dashboard.js"/>

    </body>
</html>
