<?php if(!defined("HDPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $field['title'];?></title>
</head>
<link rel="stylesheet" type="text/css" href="http://localhost/My_Cms/template/default//static/css/qiye0.css"/>
<link rel="stylesheet" type="text/css" href="http://localhost/My_Cms/template/default//static/css/qiye3.css"/>
<body>
	<div id="zuiwai">
		<div id="top-shang">
			
			<dd class="gzshf"><a href="#">并不是最棒的企业站 </a>|</dd>
			<dd class="axjjh">&nbsp;<a href="#">最更棒永远是下一个</a></dd>
    			<dd class="zgjn"><a href="#">企业站</a> |</dd>
    			<dd class="zgxsd"><a href="#">作者 </a>：</dd>
    			<dd class="zjgj"><a href="#">My于佳明</a></dd>
		</div>

		<!-- 	上中 -->
 		<div id="top-cen">
 			<a href="http://localhost/My_Cms"><img class="top2" src="http://localhost/My_Cms/template/default//static/img/top2.jpg"/></a>
 			<img class="top3" src="http://localhost/My_Cms/template/default//static/img/top3.jpg"/>
 			<img class="zili" src="http://localhost/My_Cms/template/default//static/img/zili.jpg"/>

 		</div>

 			<!-- 导航 -->
 		<div id="top-bottom">
 			 <?php if(!defined("HDPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?>
			   <ul><li><a href="http://localhost/My_Cms">网站首页</a></li><img class="gang" src="http://localhost/My_Cms/template/default//static/img/gang.jpg"/></ul>

		     	<ul><li><a href="http://localhost/My_Cms/index.php/Index/index/category/cid/9">集团概况</a></li><img class="gang" src="http://localhost/My_Cms/template/default//static/img/gang.jpg"/></ul>

				 <ul><li><a href="http://localhost/My_Cms/index.php/Index/index/category/cid/1" target="_self">新闻中心</a></li><img class="gang" src="http://localhost/My_Cms/template/default//static/img/gang.jpg"/></ul>


			    <ul> <li><a href="http://localhost/My_Cms/index.php/Index/index/category/cid/4" target="_self">产品专区</a></li><img class="gang" src="http://localhost/My_Cms/template/default//static/img/gang.jpg"/></ul>

			     <ul><li><a href="http://localhost/My_Cms/index.php/Index/index/category/cid/10">客户服务</a></li><img class="gang" src="http://localhost/My_Cms/template/default//static/img/gang.jpg"/></ul>
			     <ul><li><a href="http://localhost/My_Cms/index.php/Index/index/category/cid/15">公司介绍</a></li><img class="gang" src="http://localhost/My_Cms/template/default//static/img/gang.jpg"/></ul>
			    
			    <ul> <li><a href="http://localhost/My_Cms/index.php/Index/index/category/cid/14">联系我们</a></li></ul>
			    <!-- <ul> <li><a href="#">友情链接</a></li></ul> --><!-- 引入 导航-->
 		</div>
		<img src="http://localhost/My_Cms/template/default//static/img3/2.jpg" alt="" width="950px" />

		<div class="cen">
			<div class="cen-1">
				<div class="cen-shang">
				<ul class="cen-2">
					<strong><?php echo $field['title'];?></strong>
				</ul>
				<ul class="cen-3">
				  	发布时间：<?php echo date('Y-m-d H:i:m',$field['addtime']);?> 浏览次数：<?php echo $field['click'];?>	分享到： 24〖字号：大 中 小〗
				 </ul>
			</div>
			<p>
				<?php echo $field['content'];?>
			</p>
		</div>
	</div>



</div>
</body>
</html>
