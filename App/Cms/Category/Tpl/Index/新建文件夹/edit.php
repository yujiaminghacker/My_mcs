<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>添加栏目</title>
    <hdui/>
    <css file='__CONTROL_TPL__/css/css.css'/>
    <js file='__CONTROL_TPL__/js/validation.js'/>
</head>
<body>
<div class="warp">
    <div class="menu_list">
        <ul>
            <li><a href="{|U:'index'}">栏目列表</a></li>
            <li><a href="javascript:;" class="action">添加栏目</a></li>
        </ul>
    </div>
    <form action="__METH__" method="post" class="hd-form">
        <!-- 以藏域  name  cid  传过去的是栏目的cid -->
        <input type="hidden" name="cid" value="{$field.cid}" />
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
                                    <list from="$category" name="n">
                                         {$n._html}
                                    </list>

                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td class="w100">栏目名称</td>
                            <td>
                                <input type="text" class="w300" name="cat_name" value="{$field.cat_name}"/>
                            </td>
                        </tr>
                        <tr>
                            <td>关键字</td>
                            <td>
                               <input type="text" class="w300" name="keywords" value="{$field.keywords}"/>
                            </td>
                        </tr>
                        <tr>
                            <td>描述</td>
                            <td>
                                <textarea class="w300" name="description">{$field.description}</textarea>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            <input type="submit" class="btn btn-primary" value="确定"/>
        </div>
    </form>
</div>
</body>
</html>