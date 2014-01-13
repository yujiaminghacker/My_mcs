<?php if(!defined("HDPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Typee" content="text/html; charset=utf-8" />
<title><?php echo C("webname");?> </title>
</head>
<link rel="stylesheet" type="text/css" href="http://localhost/My_mcs/template/default//static/css/qiye0.css"/>
<link rel="stylesheet" type="text/css" href="http://localhost/My_mcs/template/default//static/css/qiye1.css"/>
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
 			<a href="http://localhost/My_mcs"><img class="top2" src="http://localhost/My_mcs/template/default//static/img/top2.jpg"/></a>
 			<img class="top3" src="http://localhost/My_mcs/template/default//static/img/top3.jpg"/>
 			<img class="zili" src="http://localhost/My_mcs/template/default//static/img/zili.jpg"/>
 		</div>

 			<!-- 导航 -->
 		<div id="top-bottom">
 				 <?php if(!defined("HDPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?>
			   <ul><li><a href="http://localhost/My_mcs">网站首页</a></li><img class="gang" src="http://localhost/My_mcs/template/default//static/img/gang.jpg"/></ul>

		     	<ul><li><a href="http://localhost/My_mcs/index.php/Index/index/category/cid/9">集团概况</a></li><img class="gang" src="http://localhost/My_mcs/template/default//static/img/gang.jpg"/></ul>

				 <ul><li><a href="http://localhost/My_mcs/index.php/Index/index/category/cid/1" target="_self">新闻中心</a></li><img class="gang" src="http://localhost/My_mcs/template/default//static/img/gang.jpg"/></ul>


			    <ul> <li><a href="http://localhost/My_mcs/index.php/Index/index/category/cid/4" target="_self">产品专区</a></li><img class="gang" src="http://localhost/My_mcs/template/default//static/img/gang.jpg"/></ul>

			     <ul><li><a href="http://localhost/My_mcs/index.php/Index/index/category/cid/10">客户服务</a></li><img class="gang" src="http://localhost/My_mcs/template/default//static/img/gang.jpg"/></ul>
			     <ul><li><a href="http://localhost/My_mcs/index.php/Index/index/category/cid/15">公司介绍</a></li><img class="gang" src="http://localhost/My_mcs/template/default//static/img/gang.jpg"/></ul>
			    
			    <ul> <li><a href="http://localhost/My_mcs/index.php/Index/index/category/cid/14">联系我们</a></li></ul>
			    <!-- <ul> <li><a href="#">友情链接</a></li></ul> --><!-- 引入 导航-->
 		</div>
 			<!-- 间距 -->
 		<div id="jianju1"></div>


		<!-- 左 -->
		<div id="left">
			<!-- 翻页窗 动画没图 -->
		 	<div id="fanyechuang">
		 		<ul class="max_box_1">
		 			<li><img src="http://localhost/My_mcs/template/default//static//img/donghua.jpg" alt="" class="dh"/></li>
		 			<li><img src="http://localhost/My_mcs/template/default//static//img/donghua.jpg" alt="" class="dh"/></li>
		 			<li><img src="http://localhost/My_mcs/template/default//static//img/donghua.jpg" alt="" class="dh"/></li>
		 		</ul>
<!-- 
		 		<dl class="s_adv">
		 			<dt class="s_adv1">1</dt>
		 			<dt class="s_adv1">2</dt>
		 			<dt class="s_adv1">3</dt>
		 		</dl> -->
		 	</div>

		 	<div id="jianju2"><!--间距*--></div>

			<div id="qiyerongyu">
				<ul class="qiyerongyu">企业荣誉 <a href="http://localhost/My_mcs/index.php/Index/index/category/cid/12" class="gengduo1">[更多]</a></ul>
				<?php		
			import("ContentModel",GROUP_PATH."Cms/Content/Model");
			$where="";
			if(12){
				$where="category_cid=12";
			}
			$order="";
			switch ("new") {
				case 'new':
					  $order="addtime DESC";
					break;
				case 'hot':
					 $order="click DESC";
					break;	
			}
			$db=K("Content");

			$content=$db->limit(5)->where($where)->cache(-1)->order($order)->all();
			foreach ($content as $field) :
				$field['url']=U("Index/content",array('id'=>$field['id']));
				$field['title']=mb_substr($field['title'],0,11,"utf8");
				$field['content']=mb_substr($field['content'],0,11,"utf8");
				$field['thumb']="http://localhost/My_mcs/".$field['thumb'];
				?>	 	
					<li><a href="<?php echo $field['url'];?>"><?php echo $field['title'];?>…</a></li>
				<?php endforeach;?>	

				<img src="http://localhost/My_mcs/template/default//static/img1/52.jpg" alt="" width="200px" />

			</div>

	<div id="gongsixinwen">
		<ul><strong>公司新闻</strong><a href="http://localhost/My_mcs/index.php/Index/index/category/cid/2" class="gengduo2">[更多]</a></ul>
		 	<?php		
			import("ContentModel",GROUP_PATH."Cms/Content/Model");
			$where="";
			if(2){
				$where="category_cid=2";
			}
			$order="";
			switch ("hot") {
				case 'new':
					  $order="addtime DESC";
					break;
				case 'hot':
					 $order="click DESC";
					break;	
			}
			$db=K("Content");

			$content=$db->limit(1)->where($where)->cache(-1)->order($order)->all();
			foreach ($content as $field) :
				$field['url']=U("Index/content",array('id'=>$field['id']));
				$field['title']=mb_substr($field['title'],0,1000,"utf8");
				$field['content']=mb_substr($field['content'],0,1000,"utf8");
				$field['thumb']="http://localhost/My_mcs/".$field['thumb'];
				?>	 	
		 	 	<div class="tuzi">
		 			<li class="tu4"><a href="<?php echo $field['url'];?>"><img src="<?php echo $field['thumb'];?>" width="139" height="94"/></a></li>	
		 			<li class="zi"> <?php echo $field['title'];?></li>
		 		</div>
		 	<?php endforeach;?>
		 	<div id="tuzibottom">
		 	<?php		
			import("ContentModel",GROUP_PATH."Cms/Content/Model");
			$where="";
			if(2){
				$where="category_cid=2";
			}
			$order="";
			switch ("new") {
				case 'new':
					  $order="addtime DESC";
					break;
				case 'hot':
					 $order="click DESC";
					break;	
			}
			$db=K("Content");

			$content=$db->limit(3)->where($where)->cache(-1)->order($order)->all();
			foreach ($content as $field) :
				$field['url']=U("Index/content",array('id'=>$field['id']));
				$field['title']=mb_substr($field['title'],0,100,"utf8");
				$field['content']=mb_substr($field['content'],0,100,"utf8");
				$field['thumb']="http://localhost/My_mcs/".$field['thumb'];
				?>	 	
		 			<li><a href="<?php echo $field['url'];?>"><?php echo $field['title'];?></a><span><?php echo date('Y-m-d',$field['addtime']);?></span></li>
		 	<?php endforeach;?>
		 	</div>
   </div>





<!-- 营销课堂 -->
		 	<div id="yingxiaoketang">
		 		<div class="yingxiao1">
					<span class="yingxiao2"><strong>营销课堂</strong></span>
					<span class="yingxiao3"><a href="http://localhost/My_mcs/index.php/Index/index/category/cid/20">[更多]</a></span>
				</div>
				<br />
				<div class="wenzi-borrom">
				<?php		
			import("ContentModel",GROUP_PATH."Cms/Content/Model");
			$where="";
			if(20){
				$where="category_cid=20";
			}
			$order="";
			switch ("new") {
				case 'new':
					  $order="addtime DESC";
					break;
				case 'hot':
					 $order="click DESC";
					break;	
			}
			$db=K("Content");

			$content=$db->limit(1)->where($where)->cache(-1)->order($order)->all();
			foreach ($content as $field) :
				$field['url']=U("Index/content",array('id'=>$field['id']));
				$field['title']=mb_substr($field['title'],0,10,"utf8");
				$field['content']=mb_substr($field['content'],0,10,"utf8");
				$field['thumb']="http://localhost/My_mcs/".$field['thumb'];
				?>	 		
				<a href="<?php echo $field['url'];?>">&nbsp;&nbsp;<strong><?php echo $field['title'];?>…</strong></a>
				<?php endforeach;?>	
				<br /><br />
					<li><span>&nbsp;&nbsp; 　在沟通中首先认同对方的观点，让对方尽可能多地感觉到自己与对方是一致的，然后再表达自己的观点，就能很好地让对方接受…</span></li>
				</div>
		 	</div>
<!-- 国珍专刊 -->
	<div id="guozhenzhuankan">
				 <div class="guozhen1">
					<span class="guozhen2"><strong>国珍专刊</strong></span>
					<span class="guozhen3"><a href="http://localhost/My_mcs/index.php/Index/index/category/cid/23">[更多]</a></span>
				</div>
				<?php		
			import("ContentModel",GROUP_PATH."Cms/Content/Model");
			$where="";
			if(23){
				$where="category_cid=23";
			}
			$order="";
			switch ("new") {
				case 'new':
					  $order="addtime DESC";
					break;
				case 'hot':
					 $order="click DESC";
					break;	
			}
			$db=K("Content");

			$content=$db->limit(1)->where($where)->cache(-1)->order($order)->all();
			foreach ($content as $field) :
				$field['url']=U("Index/content",array('id'=>$field['id']));
				$field['title']=mb_substr($field['title'],0,100,"utf8");
				$field['content']=mb_substr($field['content'],0,100,"utf8");
				$field['thumb']="http://localhost/My_mcs/".$field['thumb'];
				?>	 	
				<img src="<?php echo $field['thumb'];?>"/>
				<div class="guozhen-zitu">
					<ul><a href="<?php echo $field['url'];?>"><strong><?php echo $field['title'];?></strong></a>
    					<li>
    						特别报道 <br />	
　　							新时代人见证“北斗”卫星成功发射;
						</li>
					</ul>
				</div>
			<?php endforeach;?>
		</div>

</div>
<!-- 右 -->
		
		<div id="right">
			<!-- 公告 -->
			<div id="gonggao">
				<div class="gonggao1">
					<span class="gonggao2"><strong>公告</strong></span>
					<span class="gengduo3"><a href="http://localhost/My_mcs/index.php/Index/index/category/cid/3">[更多]</a></span>
				</div>
				<?php		
			import("ContentModel",GROUP_PATH."Cms/Content/Model");
			$where="";
			if(3){
				$where="category_cid=3";
			}
			$order="";
			switch ("new") {
				case 'new':
					  $order="addtime DESC";
					break;
				case 'hot':
					 $order="click DESC";
					break;	
			}
			$db=K("Content");

			$content=$db->limit(4)->where($where)->cache(-1)->order($order)->all();
			foreach ($content as $field) :
				$field['url']=U("Index/content",array('id'=>$field['id']));
				$field['title']=mb_substr($field['title'],0,12,"utf8");
				$field['content']=mb_substr($field['content'],0,12,"utf8");
				$field['thumb']="http://localhost/My_mcs/".$field['thumb'];
				?>	 	
				 <li><a href="<?php echo $field['url'];?>"><?php echo $field['title'];?></a></li>
				<?php endforeach;?>
				</div>

<!-- 客服之窗 -->
			 	<div id="kefuzhichuang">
			 		<div id="kefu1">
						<span class="kefu2"><strong>健康知识</strong></span>
						<span class="kefu3"><a href="http://localhost/My_mcs/index.php/Index/index/category/cid/17">[更多]</a></span>
					</div>
					<?php		
			import("ContentModel",GROUP_PATH."Cms/Content/Model");
			$where="";
			if(17){
				$where="category_cid=17";
			}
			$order="";
			switch ("new") {
				case 'new':
					  $order="addtime DESC";
					break;
				case 'hot':
					 $order="click DESC";
					break;	
			}
			$db=K("Content");

			$content=$db->limit(3)->where($where)->cache(-1)->order($order)->all();
			foreach ($content as $field) :
				$field['url']=U("Index/content",array('id'=>$field['id']));
				$field['title']=mb_substr($field['title'],0,14,"utf8");
				$field['content']=mb_substr($field['content'],0,14,"utf8");
				$field['thumb']="http://localhost/My_mcs/".$field['thumb'];
				?>	 		
					  	<li><a href="<?php echo $field['url'];?>"><?php echo $field['title'];?>…</a></li>
					<?php endforeach;?>	

	 			</div>

<!-- _____爱心基金会 -->
	
		   	<div id="aixinjijinhui">
		   			<div id="aixin1">
						<span class="aixin2"><strong>爱心基金会</strong></span>
						<span class="aixin3"><a href="http://localhost/My_mcs/index.php/Index/index/category/cid/22">[更多]</a></span>
					</div>
					<?php		
			import("ContentModel",GROUP_PATH."Cms/Content/Model");
			$where="";
			if(22){
				$where="category_cid=22";
			}
			$order="";
			switch ("new") {
				case 'new':
					  $order="addtime DESC";
					break;
				case 'hot':
					 $order="click DESC";
					break;	
			}
			$db=K("Content");

			$content=$db->limit(1)->where($where)->cache(-1)->order($order)->all();
			foreach ($content as $field) :
				$field['url']=U("Index/content",array('id'=>$field['id']));
				$field['title']=mb_substr($field['title'],0,14,"utf8");
				$field['content']=mb_substr($field['content'],0,14,"utf8");
				$field['thumb']="http://localhost/My_mcs/".$field['thumb'];
				?>	 	
					  	<li><strong><a href="<?php echo $field['url'];?>"><?php echo $field['title'];?>…</a></strong></li>
					<?php endforeach;?>	
						
   						 <li>&nbsp;为了更好地履行企业社会责任，播撒国珍爱心，推动公益事业的发展，新时代健康产业集团正式成立了北京国珍爱心基金会。</li>
		   	</div>

<!-- 节能环保常识 -->
		 	<div id="jieneng">
					<div id="jieneng1">
						<span class="jieneng2"><strong>节能环保</strong></span>
						<span class="jieneng3"><a href="http://localhost/My_mcs/index.php/Index/index/category/cid/19">[更多]</a></span>
					</div>
					<?php		
			import("ContentModel",GROUP_PATH."Cms/Content/Model");
			$where="";
			if(19){
				$where="category_cid=19";
			}
			$order="";
			switch ("new") {
				case 'new':
					  $order="addtime DESC";
					break;
				case 'hot':
					 $order="click DESC";
					break;	
			}
			$db=K("Content");

			$content=$db->limit(3)->where($where)->cache(-1)->order($order)->all();
			foreach ($content as $field) :
				$field['url']=U("Index/content",array('id'=>$field['id']));
				$field['title']=mb_substr($field['title'],0,14,"utf8");
				$field['content']=mb_substr($field['content'],0,14,"utf8");
				$field['thumb']="http://localhost/My_mcs/".$field['thumb'];
				?>	 		
					  	<li><a href="<?php echo $field['url'];?>"><?php echo $field['title'];?>…</a></li>
					<?php endforeach;?>	
		 	</div>

</div>

		

<!-- 下面的 -->
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
		

 
 </div>

</div>
</body>
</html>
