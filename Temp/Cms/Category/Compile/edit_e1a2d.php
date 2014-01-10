<?php if(!defined("HDPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><!DOCTYPE html>
<html lang="en">
    <head>
        <title>编辑栏目</title>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <script type='text/javascript' src='http://localhost/hdphp/hdphp/hdphp/../hdjs/jquery-1.8.2.min.js'></script>
<link href='http://localhost/hdphp/hdphp/hdphp/../hdjs/css/hdjs.css' rel='stylesheet' media='screen'>
<script src='http://localhost/hdphp/hdphp/hdphp/../hdjs/js/hdjs.js'></script>
<script src='http://localhost/hdphp/hdphp/hdphp/../hdjs/js/slide.js'></script>
<script src='http://localhost/hdphp/hdphp/hdphp/../hdjs/org/cal/lhgcalendar.min.js'></script>
<script type='text/javascript'>
		HOST = 'http://localhost';
		ROOT = 'http://localhost/My_Cms';
		WEB = 'http://localhost/My_Cms/index.php';
		URL = 'http://localhost/My_Cms/index.php/Category/Index/edit/cid/2';
		HDPHP = 'http://localhost/hdphp/hdphp/hdphp';
		HDPHPDATA = 'http://localhost/hdphp/hdphp/hdphp/Data';
		HDPHPTPL = 'http://localhost/hdphp/hdphp/hdphp/Lib/Tpl';
		HDPHPEXTEND = 'http://localhost/hdphp/hdphp/hdphp/Extend';
		APP = 'http://localhost/My_Cms/index.php/Category';
		CONTROL = 'http://localhost/My_Cms/index.php/Category/Index';
		METH = 'http://localhost/My_Cms/index.php/Category/Index/edit';
		GROUP = 'http://localhost/My_Cms/G:\wamp\www\My_Cms\App';
		TPL = 'http://localhost/My_Cms/App/Cms/Category/Tpl';
		CONTROLTPL = 'http://localhost/My_Cms/App/Cms/Category/Tpl/Index';
		STATIC = 'http://localhost/My_Cms/App/Cms/Category/Tpl/Static';
		PUBLIC = 'http://localhost/My_Cms/App/Cms/Category/Tpl/Public';
</script>
        <script type="text/javascript" src="http://localhost/My_Cms/App/Cms/Category/Tpl/Index/js/validation.js"></script>
        <link type="text/css" rel="stylesheet" href="http://localhost/My_Cms/App/Cms/Category/Tpl/Index/css/css.css"/>
        <link type="text/css" rel="stylesheet" href="http://localhost/My_Cms/App/Cms/Category/Tpl/Index/css/bootstrap.min.css"/>
        <link type="text/css" rel="stylesheet" href="http://localhost/My_Cms/App/Cms/Category/Tpl/Index/css/bootstrap-responsive.min.css"/>
        <link type="text/css" rel="stylesheet" href="http://localhost/My_Cms/App/Cms/Category/Tpl/Index/css/fullcalendar.css"/>
        <link type="text/css" rel="stylesheet" href="http://localhost/My_Cms/App/Cms/Category/Tpl/Index/css/unicorn.main.css"/>
        <link type="text/css" rel="stylesheet" href="http://localhost/My_Cms/App/Cms/Category/Tpl/Index/css/unicorn.grey.css"/>
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
                <li class="btn btn-inverse"><a href="<?php echo U('Cms/Login/out');?>" target="_self"><i class="icon icon-share-alt"></i> <span class="text">Exit</span></a></li>
            </ul>
        </div>
         <!-- 左边 分类管理 -->
        <div id="sidebar">
            <a href="#" class="visible-phone"><i class="icon icon-home"></i> Dashboard</a>
            <ul>
                <li class=""><a href="http://localhost/My_Cms"><i class="icon icon-home"></i> <span>前台Index</span></a></li>
                <li class="submenu active open">
                    <a href="#"><i class="icon icon-th-list"></i> <span>总管理</span> <span class="label">2</span></a>
                    <ul>
                        <li ><a href="<?php echo U('Content/Index/index');?>">文章管理</a></li>
                        <li class="active"><a href="<?php echo U('Category/Index/index');?>">栏目管理</a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="#"><i class="icon icon-file"></i> <span>我的面板</span> <span class="label">1</span></a>
                    <ul>
                        <li><a href="<?php echo U('Admin/Password/edit');?>">修改密码</a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="#"><i class="icon icon-pencil"></i><span>配置</span> <span class="label">1</span></a>
                    <ul>
                        <li><a href="<?php echo U('Config/Config/edit');?>">网站配置</a></li>
                    </ul>
                </li>
                                <li class="submenu">
                    <a href="#"><i class="icon icon-pencil"></i><span>系统</span> <span class="label">1</span></a>
                    <ul>
                        <li><a href="<?php echo U('Backup/Backup/index');?>">备份数据</a></li>
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
    <div class="menu_list">
        <ul>
            <li><a href="<?php echo U('index');?>">栏目列表</a></li>
            <li><a href="javascript:;" class="action">添加栏目</a></li>
        </ul>
    </div>
    <form action="http://localhost/My_Cms/index.php/Category/Index/edit" method="post" class="hd-form">
        <!-- 以藏域  name  cid  传过去的是栏目的cid -->
        <input type="hidden" name="cid" value="<?php echo $field['cid'];?>" />
        <div class="tab">
            <ul class="tab_menu">
                <li lab="base">
                    <a> 基本设置 </a>
                </li>
            </ul>
            <div class="tab_content">
                <div id="base">
                    <table class="table1">
                        <tr>
                            <td class="w100">父级</td>
                            <td>
                                <select name="pid">
                                    <option value='0'> == 一级栏目==</option>
                                    <?php $hd["list"]["n"]["total"]=0;if(isset($category) && !empty($category)):$_id_n=0;$_index_n=0;$lastn=min(1000,count($category));
$hd["list"]["n"]["first"]=true;
$hd["list"]["n"]["last"]=false;
$_total_n=ceil($lastn/1);$hd["list"]["n"]["total"]=$_total_n;
$_data_n = array_slice($category,0,$lastn);
if(count($_data_n)==0):echo "";
else:
foreach($_data_n as $key=>$n):
if(($_id_n)%1==0):$_id_n++;else:$_id_n++;continue;endif;
$hd["list"]["n"]["index"]=++$_index_n;
if($_index_n>=$_total_n):$hd["list"]["n"]["last"]=true;endif;?>

                                         <?php echo $n['_html'];?>
                                    <?php $hd["list"]["n"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>

                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td class="w100">栏目名称</td>
                            <td>
                                <input type="text" class="w300" name="cat_name" value="<?php echo $field['cat_name'];?>"/>
                            </td>
                        </tr>
                        <tr>
                            <td>关键字</td>
                            <td>
                               <input type="text" class="w300" name="keywords" value="<?php echo $field['keywords'];?>"/>
                            </td>
                        </tr>
                        <tr>
                            <td>描述</td>
                            <td>
                                <textarea class="w300" name="description"><?php echo $field['description'];?></textarea>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            <input type="submit" class="btn btn-primary" value="确定"/>
        </div>
    </form>
</div>
</div>
        </div>
        
            <script type="text/javascript" src="http://localhost/My_Cms/App/Cms/Category/Tpl/Index/js/excanvas.min.js"></script>

            <script type="text/javascript" src="http://localhost/My_Cms/App/Cms/Category/Tpl/Index/js/jquery.ui.custom.js"></script>
            <script type="text/javascript" src="http://localhost/My_Cms/App/Cms/Category/Tpl/Index/js/bootstrap.min.js"></script>
            <script type="text/javascript" src="http://localhost/My_Cms/App/Cms/Category/Tpl/Index/js/jquery.flot.min.js"></script>
            <script type="text/javascript" src="http://localhost/My_Cms/App/Cms/Category/Tpl/Index/js/jquery.flot.resize.min.js"></script>
            <script type="text/javascript" src="http://localhost/My_Cms/App/Cms/Category/Tpl/Index/js/jquery.peity.min.js"></script>
            <script type="text/javascript" src="http://localhost/My_Cms/App/Cms/Category/Tpl/Index/js/fullcalendar.min.js"></script>
            <script type="text/javascript" src="http://localhost/My_Cms/App/Cms/Category/Tpl/Index/js/unicorn.js"></script>
            <script type="text/javascript" src="http://localhost/My_Cms/App/Cms/Category/Tpl/Index/js/unicorn.dashboard.js"></script>

    </body>
</html>