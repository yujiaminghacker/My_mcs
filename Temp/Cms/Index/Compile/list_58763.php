<?php if(!defined("HDPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<?php
		import("ContentModel",GROUP_PATH.'Cms/Content/Model');
		$db = K("Content");
		$cid=$_GET['cid'];
		$cat=$db->table('category')->where("cid=$cid or pid=$cid")->field('cid')->all();
		$_tmp=array();
		foreach ($cat as $c) {
			$_tmp[]=$c['cid'];
		}
		$where='category_cid in('.implode(',', $_tmp).')';
		$count=$db->where($where)->count();
		$page= new Page($count,1);
		$data = $db->where($where)->limit($page->limit())->all();
		foreach ($data as $field) :
			$field['caturl']=U("Index/Index/category",array('cid'=>$field['cid']));
			$field['url']=U('Index/Index/content',array('id'=>$field['id']));
		?>
<title> <?php echo $field['cat_name'];?> </title>
<?php endforeach;?>
</head>
<link rel="stylesheet" type="text/css" href="http://localhost/My_Cms/template/default//static/css/qiye0.css"/>
<link rel="stylesheet" type="text/css" href="http://localhost/My_Cms/template/default//static/css/qiye2.css"/>
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
 			<!-- 间距 -->
 		<div id="jianju1"></div>

 		<!-- 大图 -->
 		<div id="cen-tu">


 		</div>

 		<!-- 左面 -->
 	<div id="left"> 
 			<ul><strong class="left-1"> 栏目管理</strong></ul>
 			<li class="left-2"><a href="http://localhost/My_Cms">网站首页</a></li>
 			<?php
		$where='';
		if(13){
			$where="pid=13";
		}
		$db=M("category");
		$category=$db->limit(10)->where($where)->all();
		foreach($category as $field):
			$field['url']=U('Index/category',array('cid'=>$field['cid']));
		?>
                   <li class="left-2"><a href="<?php echo $field['url'];?>"><?php echo $field['cat_name'];?></a></li>
            <?php endforeach;?>
            
 	</div>



 		<!-- 右边 -->
 <div id="right">
				<?php
		import("ContentModel",GROUP_PATH.'Cms/Content/Model');
		$db = K("Content");
		$cid=$_GET['cid'];
		$cat=$db->table('category')->where("cid=$cid or pid=$cid")->field('cid')->all();
		$_tmp=array();
		foreach ($cat as $c) {
			$_tmp[]=$c['cid'];
		}
		$where='category_cid in('.implode(',', $_tmp).')';
		$count=$db->where($where)->count();
		$page= new Page($count,1);
		$data = $db->where($where)->limit($page->limit())->all();
		foreach ($data as $field) :
			$field['caturl']=U("Index/Index/category",array('cid'=>$field['cid']));
			$field['url']=U('Index/Index/content',array('id'=>$field['id']));
		?>
 			<ul class="right-1"> 首页 > <?php echo $field['cat_name'];?>  </ul>
 		<?php endforeach;?>
 			 <div class="right-bottom">
 			 			<?php
		import("ContentModel",GROUP_PATH.'Cms/Content/Model');
		$db = K("Content");
		$cid=$_GET['cid'];
		$cat=$db->table('category')->where("cid=$cid or pid=$cid")->field('cid')->all();
		$_tmp=array();
		foreach ($cat as $c) {
			$_tmp[]=$c['cid'];
		}
		$where='category_cid in('.implode(',', $_tmp).')';
		$count=$db->where($where)->count();
		$page= new Page($count,7);
		$data = $db->where($where)->limit($page->limit())->all();
		foreach ($data as $field) :
			$field['caturl']=U("Index/Index/category",array('cid'=>$field['cid']));
			$field['url']=U('Index/Index/content',array('id'=>$field['id']));
		?>	
 					<li>
 						<span>[<?php echo $field['cat_name'];?>]</span><img src="<?php echo $field['thumb'];?>" alt="" />
 						<?php echo date('Y-m-d',$field['addtime']);?>
 					  <a href="<?php echo $field['url'];?>"><?php echo $field['title'];?></a>
 					</li>
 				<?php endforeach;?>
 				<div class="dingwei_fenye"><?php echo $page->show(2)?></div>
 				</div>		 	
 </div>
 	<div style="clear:both"></div>
	<div id="footer">
		<div class="footer1">
			<a href="#"><li id="gongsi-1">公司邮局</li></a>
			<a href="#"><li>产品展示</li></a>
			<a href="#"><li>市场专区</li></a>
			<a href="#"><li>培训中心</li></a>
			<a href="#"><li>国珍电视</li></a>
			<a href="#"><li>客服服务</li></a>
			<a href="#"><li>联系我们</li></a>
		</div>
		<div class="footer2">	
		</div>
		   	<li class="zuihou">新时代健康产业（集团）有限公司 北京市朝阳区安翔北里甲11号北京创业大厦B座9层、18、19层</li>
		   	<li class="zuihou1">电话：010-64850599 e-mail:webmaster@5dgz.com ICP证:<a href="#">京ICP备05046821号 </a>备案编号:京公海网安备110108000810号 京公网安备110105013098</li>		
	</div> 
		
</body>
</html>
