<?php 
/**
 * 文章模型
 * Class ContentModel
 */
 class ContentModel extends RelationModel{
 	//设置模型操作表
    public $table = 'content';
        //多表
    public $join=array(
        'category'=>array(
            'type'=>BELONGS_TO,
            'parent_key'=>'cid',//栏目表主键
            'foreign_key'=>'category_cid'//文章表的外键
        )
    );
    //自动处理函数
    public $auto=array(
    	array('keywords', '_keywords', 'method', 2, 3),//关键字  
    	array("addtime","strtotime","function",2,3),//时间戳
    	array("flag","_flag","method",2,3),//属性
    	array("description","_description","method",2,3),//描述
        array("thumb","_thumb","method",2,3),//缩略图
        array('admin_aid', '_admin_aid', 'method', 2, 3),//文章发布者id
     );
// http://localhost/My_Cms/./upload/2014/01/09/5701389277738.jpg 
    //缩略图处理
    public function _thumb()
    {   
        if (empty($_FILES['thumb']['name'])) {
            return Q('post.old_thumb','','');
        } else {
            $upload = new Upload('./upload/' . date("Y") . '/' . date('m') . '/' . date('d'));//值是路径
            $file = $upload->upload();
            return $file[0]['path'];
        }
    }
    //文章发布者id
    public function _admin_aid(){
        return session("aid");
    }
    //属性处理 
    public function _flag($val){
    	return empty($val)?"":implode(",",$val);
    }
    //取关键字
    public function _keywords($val){
    	if(!empty($val)){
    		return $val;
    	}
    	$content=Q("post.content","","strip_tags","trim");//取词 json
    	$words= String::splitWord($content);//截断 数组
    	$c=array();
        for($i=0;$i<8;$i++){
            $c[]=key($words);
            if(!array_shift($words)){
                break;
            }
        }
    	return implode(",", $c);
    }
    //取描述
    public function _description($val){
    	if(!empty($val)){
    		return $val;
    	}
    	$content=Q("post.content","","strip_tags","trim");
    	return mb_substr($content,0,80,"utf8");
    }
    //发表文章
    public function add_content(){
    	if($this->create()){
    		return $this->add();
    	}
    }
    //删除栏目
    public function del_cotegory($cid){
        $this->del($cid);
        return $this->save();
    }
    // 修改文章
    public function edit_content(){
    	if($this->create()){
    		return $this->save();
    	}
    }
 }