<?php
class TagTag{
	public $tag=array(
		"channel"=>array("block"=>1,"level"=>4),
		"arclist"=>array("block"=>1,"level"=>10),
		"one"=>array("block"=>1,"level"=>4),
		"page"=>array("block"=>0,"level"=>4),
		 'pagelist' => array('block' => 1, 'level' => 4),
	);
	//栏目标签  field['url']  生成url地址
	public function _channel($attr,$content){
		$row = isset($attr['row'])?$attr['row']:10;
		$cid = isset($attr['cid'])?$attr['cid']:0;
		$php=<<<str
<?php
		\$where='';
		if($cid){
			\$where="pid=$cid";
		}
		\$db=M("category");
		\$category=\$db->limit($row)->where(\$where)->all();
		foreach(\$category as \$field):
			\$field['url']=U('Index/category',array('cid'=>\$field['cid']));
		?>
str;
		
		$php.=$content;
		$php.="<?php endforeach;?>";
		return $php;
	}
//文章标签
	public function _arclist($attr,$contnet){
		$row=isset($attr['row'])?$attr['row']:10;
		$titlelen=isset($attr['titlelen'])?$attr['titlelen']:30;
		$cache=isset($attr['cache'])?$attr['cache']:-1;
		$cid=isset($attr['cid'])?$attr['cid']:0;
		$type=isset($attr['type'])?$attr['type']:"new";
		$php=<<<str
<?php		
			import("ContentModel",GROUP_PATH."Cms/Content/Model");
			\$where="";
			if($cid){
				\$where="category_cid=$cid";
			}
			\$order="";
			switch ("$type") {
				case 'new':
					  \$order="addtime DESC";
					break;
				case 'hot':
					 \$order="click DESC";
					break;	
			}
			\$db=K("Content");

			\$content=\$db->limit($row)->where(\$where)->cache($cache)->order(\$order)->all();
			foreach (\$content as \$field) :
				\$field['url']=U("Index/content",array('id'=>\$field['id']));
				\$field['title']=mb_substr(\$field['title'],0,$titlelen,"utf8");
				\$field['content']=mb_substr(\$field['content'],0,$titlelen,"utf8");
				\$field['thumb']="__ROOT__/".\$field['thumb'];
				?>	 	
str;
			$php.=$contnet;
			$php.="<?php endforeach;?>";
			return $php;
	}
	//介绍 one 读取一篇文章
	public  function _one($attr,$content){
		$aid=$attr['aid'];
		$php=<<<str
		<?php
		import("ContentModel",GROUP_PATH.'Cms/Content/Model');
		\$db=K("Content");
		\$field = \$db->find($aid);
		;?>
str;
		$php.=$content;
		return $php;
	} 
	//列表页分页
	public function _pagelist($attr,$contnet){
		$row=isset($attr['row'])?$attr['row']:10;
		$php=<<<str
		<?php
		import("ContentModel",GROUP_PATH.'Cms/Content/Model');
		\$db = K("Content");
		\$cid=\$_GET['cid'];
		\$cat=\$db->table('category')->where("cid=\$cid or pid=\$cid")->field('cid')->all();
		\$_tmp=array();
		foreach (\$cat as \$c) {
			\$_tmp[]=\$c['cid'];
		}
		\$where='category_cid in('.implode(',', \$_tmp).')';
		\$count=\$db->where(\$where)->count();
		\$page= new Page(\$count,$row);
		\$data = \$db->where(\$where)->limit(\$page->limit())->all();
		foreach (\$data as \$field) :
			\$field['caturl']=U("Index/Index/category",array('cid'=>\$field['cid']));
			\$field['url']=U('Index/Index/content',array('id'=>\$field['id']));
		?>
str;
     $php.=$contnet;
     $php.="<?php endforeach;?>";
	 return $php;
	}
	//category  page 分页数据
	public function _page($attr){
        $style = isset($attr['style'])?$attr['style']:1;
        return '<?php echo $page->show('.$style.')?>';
	}





}