<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>选择模板风格</title>
    <style type="text/css">
        ul li{float: left;
        border:solid 2px #aaaaaa;}
        ul li.active{
            border:solid 2px #f00;
        }
    </style>
</head>
<body>
<ul>
    <list from="$tpl" name="t">
        <li {$t.class}>
            <img src="{$t.pic}" width="200" height="200"/>
            <br/>
            <a href="{|U:'select_tpl',array('name'=>$t['name'])}">选择</a>
        </li>
    </list>
</ul>
</body>
</html>