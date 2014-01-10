<?php
header("Content-type:text/html;charset=utf-8");
define('HDPHP_PATH',true);
//应用安装
//1 版权协议
//2 运行环境检测：运行函数检测  目录文件检测
//3 配置数据库
//4 建表与插入原始数据
//5 安装完成界面
if(is_file("lock.php")){
        echo "<div style='border:solid 1px #dcdcdc;padding:3px;'>请删除install目录下的Lock.php文件后再执行安装";
    exit;
}
$step= isset($_GET['step'])?$_GET['step']:1;
switch ($step) {
    case '1':
        require "./template/copyright.html";
        exit;
        break;
    case "2":
        $gd=extension_loaded("gd")?"正确":"错误";//gd库
        $mysqli=extension_loaded("mysqli")?"正确":"错误";//musqli
        $func = array( //函数
            'mb_substr',
            "imagecreatetruecolor"
        );
        $dir=array(//目录检测
            '../data/Category',
            '../data/Backup',
            '../data/Config',
            '../upload',
            '../data/Config/config.inc.php',
            '../data/Config/db.inc.php',
        );
        require "./template/check.html";
        break;
    case "3":
        //配置数据库
        require 'template/set_database.html';
        break;
    case "check_db":
    //尝试连接数据库
    if(!@mysql_connect($_POST['DB_HOST'],$_POST['DB_USER'],$_POST['DB_PASSWORD'])){
         echo '数据库连接参数错误！';
    }
    //数据库名字
    if(@mysql_select_db($_POST['DB_DATABASE'])){
        echo "数据库已经存在";
    }
    $db=new Db();
    //表前缀
    $db_prefix='';
    //创建出具库
    $db->exe("CREATE DATABASE {$_POST['DB_DATABASE']} CHARSET UTF8");
    //选择数据库
    mysql_select_db($_POST['DB_DATABASE']);
    mysql_query("SET NAMES UTF8");
    //创建表
    require "sql/structure.php";
    //插入数据
    foreach (glob("sql/data/*") as $f) {
           require $f;
    }
    //修改配置文件
    $config =require "../data/config/db.inc.php";
    $config = array_merge($config,$_POST);
    $data = "<?php if(!defined('HDPHP_PATH'))exit;\nreturn ".var_export($config,true).";\n?>";
    file_put_contents('../data/config/db.inc.php',$data);
    success('数据表创建完成!');
    break;
    case "5":
    file_put_contents("lock.php", "");
     require 'template/success.html';
     break;
}


function error($msg){
    echo "<div style='border:solid 1px #f00;width:500px;padding:20px;'>$msg</div>";
    echo "<script>setTimeout(function(){window.history.go(-1)},2000);</script>";
    exit;
}
function success($msg){
    echo "<div style='border:solid 1px green;width:500px;padding:20px;'>$msg</div>";
    echo "<script>setTimeout(function(){location.href='?step=5'},2000);</script>";
    exit;
}
class Db{
    function exe($sql){
        if(!mysql_query($sql)){
            echo mysql_error();exit;
        }
    }
}

