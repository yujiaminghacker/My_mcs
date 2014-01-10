<?php if(!defined("HDPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><!DOCTYPE html>
<html lang="en">
    <head>
        <title>添加文章</title>
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
		URL = 'http://localhost/My_Cms/index.php/Content/Index/add';
		HDPHP = 'http://localhost/hdphp/hdphp/hdphp';
		HDPHPDATA = 'http://localhost/hdphp/hdphp/hdphp/Data';
		HDPHPTPL = 'http://localhost/hdphp/hdphp/hdphp/Lib/Tpl';
		HDPHPEXTEND = 'http://localhost/hdphp/hdphp/hdphp/Extend';
		APP = 'http://localhost/My_Cms/index.php/Content';
		CONTROL = 'http://localhost/My_Cms/index.php/Content/Index';
		METH = 'http://localhost/My_Cms/index.php/Content/Index/add';
		GROUP = 'http://localhost/My_Cms/G:\wamp\www\My_Cms\App';
		TPL = 'http://localhost/My_Cms/App/Cms/Content/Tpl';
		CONTROLTPL = 'http://localhost/My_Cms/App/Cms/Content/Tpl/Index';
		STATIC = 'http://localhost/My_Cms/App/Cms/Content/Tpl/Static';
		PUBLIC = 'http://localhost/My_Cms/App/Cms/Content/Tpl/Public';
</script>
        <hdui bootstrap="true"/>
         <link type="text/css" rel="stylesheet" href="http://localhost/My_Cms/App/Cms/Content/Tpl/Index/css/css.css"/>
        <script type="text/javascript" src="http://localhost/My_Cms/App/Cms/Content/Tpl/Index/js/validation.js"></script>
        <link type="text/css" rel="stylesheet" href="http://localhost/My_Cms/App/Cms/Content/Tpl/Index/css/bootstrap.min.css"/>
        <link type="text/css" rel="stylesheet" href="http://localhost/My_Cms/App/Cms/Content/Tpl/Index/css/bootstrap-responsive.min.css"/>
        <link type="text/css" rel="stylesheet" href="http://localhost/My_Cms/App/Cms/Content/Tpl/Index/css/fullcalendar.css"/>
        <link type="text/css" rel="stylesheet" href="http://localhost/My_Cms/App/Cms/Content/Tpl/Index/css/unicorn.main.css"/>
        <link type="text/css" rel="stylesheet" href="http://localhost/My_Cms/App/Cms/Content/Tpl/Index/css/unicorn.grey.css"/>
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
                        <li class="active"><a href="<?php echo U('Content/Index/index');?>">文章管理</a></li>
                        <li ><a href="<?php echo U('Category/Index/index');?>">栏目管理</a></li>
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
            <li><a href="<?php echo U('index');?>">文章列表</a></li>
            <li><a href="javascript:;" class="action">添加文章</a></li>
        </ul>
    </div>
    <form action="http://localhost/My_Cms/index.php/Content/Index/add" method="post" class="hd-form" enctype="multipart/form-data">
        <div class="tab">
            <ul class="tab_menu">
                <li lab="base">
                    <a> 基本设置 </a>
                </li>
                <li lab="ext">
                    <a> 其他设置 </a>
                </li>
            </ul>
            <div class="tab_content">
                <div id="base">
                    <table class="table1">
                        <tr>
                            <td class="w100">标题</td>
                            <td>
                                <input type="text" name='title' class="w300"/>
                            </td>
                        </tr>
                        <tr>
                            <td class="w100">属性</td>
                            <td>
                                <label>
                                    <input type="checkbox" name='flag[]' value="置顶"/> 置顶
                                </label>
                                <label>
                                    <input type="checkbox" name='flag[]' value="推荐"/> 推荐
                                </label>
                            </td>
                        </tr>
                        <tr>
                            <td class="w100">栏目</td>
                            <td>
                                <select name="category_cid">
                                    <?php $hd["list"]["c"]["total"]=0;if(isset($category) && !empty($category)):$_id_c=0;$_index_c=0;$lastc=min(1000,count($category));
$hd["list"]["c"]["first"]=true;
$hd["list"]["c"]["last"]=false;
$_total_c=ceil($lastc/1);$hd["list"]["c"]["total"]=$_total_c;
$_data_c = array_slice($category,0,$lastc);
if(count($_data_c)==0):echo "";
else:
foreach($_data_c as $key=>$c):
if(($_id_c)%1==0):$_id_c++;else:$_id_c++;continue;endif;
$hd["list"]["c"]["index"]=++$_index_c;
if($_index_c>=$_total_c):$hd["list"]["c"]["last"]=true;endif;?>

                                        <option value="<?php echo $c['cid'];?>"><?php echo $c['_name'];?></option>
                                    <?php $hd["list"]["c"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td class="w100">缩略图</td>
                            <td>
                                <input type="file" name="thumb"/>
                            </td>
                        </tr>
                        <tr>
                            <td>正文</td>
                            <td>
                                <script type="text/javascript" charset="utf-8" src="http://localhost/hdphp/hdphp/hdphp/Extend/Org/Ueditor/ueditor.config.js"></script><script type="text/javascript" charset="utf-8" src="http://localhost/hdphp/hdphp/hdphp/Extend/Org/Ueditor/ueditor.all.min.js"></script><script type="text/javascript">UEDITOR_HOME_URL="http://localhost/hdphp/hdphp/hdphp/Extend/Org/Ueditor/"</script><script id="hd_content" name="content" type="text/plain"></script>
        <script type='text/javascript'>
        $(function(){
                var ue = UE.getEditor('hd_content',{
                imageUrl:'http://localhost/My_Cms/index.php/Content/Index&m=ueditor_upload&water=0&uploadsize=2000000&maximagewidth=false&maximageheight=false'//处理上传脚本
                ,zIndex : 0
                ,autoClearinitialContent:false
                ,initialFrameWidth:"100%" //宽度1000
                ,initialFrameHeight:"300" //宽度1000
                ,autoHeightEnabled:false //是否自动长高,默认true
                ,autoFloatEnabled:false //是否保持toolbar的位置不动,默认true
                ,maximumWords:2000 //允许的最大字符数
                ,readonly : false //编辑器初始化结束后,编辑区域是否是只读的，默认是false
                ,wordCount:true //是否开启字数统计
                ,imagePath:''//图片修正地址
                , toolbars:[
            ['fullscreen', 'source', '|', 'undo', 'redo', '|',
                'bold', 'italic', 'underline', 'fontborder', 'strikethrough', 'superscript', 'subscript', 'removeformat', 'formatmatch', 'autotypeset', 'blockquote', 'pasteplain', '|', 'forecolor', 'backcolor', 'insertorderedlist', 'insertunorderedlist', 'selectall', 'cleardoc', '|',
                'rowspacingtop', 'rowspacingbottom', 'lineheight', '|',
                'customstyle', 'paragraph', 'fontfamily', 'fontsize', '|',
                'directionalityltr', 'directionalityrtl', 'indent', '|',
                'justifyleft', 'justifycenter', 'justifyright', 'justifyjustify', '|', 'touppercase', 'tolowercase', '|',
                'link', 'unlink', 'anchor', '|', 'imagenone', 'imageleft', 'imageright', 'imagecenter', '|',
                'insertimage', 'emotion', 'scrawl', 'insertvideo', 'music', 'attachment', 'map', 'gmap', 'insertframe','insertcode', 'pagebreak', 'template', 'background', '|',
                'horizontal', 'date', 'time', 'spechars', 'snapscreen', 'wordimage', '|',
                'inserttable', 'deletetable', 'insertparagraphbeforetable', 'insertrow', 'deleterow', 'insertcol', 'deletecol', 'mergecells', 'mergeright', 'mergedown', 'splittocells', 'splittorows', 'splittocols', 'charts', '|',
                'print', 'preview', 'searchreplace', 'drafts']
            ]//工具按钮
            });
        })
        </script>
                            </td>
                        </tr>
                    </table>
                </div>
                <!--                其他设置-->
                <div id="ext">
                    <table class="table1">
                        <tr>
                            <td>关键字</td>
                            <td>
                                <input type="text" class='w300' name="keywords"/>
                            </td>
                        </tr>
                        <tr>
                            <td>描述</td>
                            <td>
                                <textarea name="description" class="w400 h100"></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td>点击数</td>
                            <td>
                                <input type="text" class='w300' name="click" value="100"/>
                            </td>
                        </tr>
                        <tr>
                            <td>发表时间</td>
                            <td>
                                <input type="text" readonly="readonly" id="updatetime" name="addtime"
                                       value="<?php echo date('Y/m/d h:i:s');?>"
                                       class="w150"/>
                                <script>
                                    $('#updatetime').calendar({format: 'yyyy/MM/dd HH:mm'});
                                </script>

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
        
            <script type="text/javascript" src="http://localhost/My_Cms/App/Cms/Content/Tpl/Index/js/excanvas.min.js"></script>
            <script type="text/javascript" src="http://localhost/My_Cms/App/Cms/Content/Tpl/Index/js/jquery.ui.custom.js"></script>
            <script type="text/javascript" src="http://localhost/My_Cms/App/Cms/Content/Tpl/Index/js/bootstrap.min.js"></script>
            <script type="text/javascript" src="http://localhost/My_Cms/App/Cms/Content/Tpl/Index/js/jquery.flot.min.js"></script>
            <script type="text/javascript" src="http://localhost/My_Cms/App/Cms/Content/Tpl/Index/js/jquery.flot.resize.min.js"></script>
            <script type="text/javascript" src="http://localhost/My_Cms/App/Cms/Content/Tpl/Index/js/jquery.peity.min.js"></script>
            <script type="text/javascript" src="http://localhost/My_Cms/App/Cms/Content/Tpl/Index/js/fullcalendar.min.js"></script>
            <script type="text/javascript" src="http://localhost/My_Cms/App/Cms/Content/Tpl/Index/js/unicorn.js"></script>
            <script type="text/javascript" src="http://localhost/My_Cms/App/Cms/Content/Tpl/Index/js/unicorn.dashboard.js"></script>

    </body>
</html>
