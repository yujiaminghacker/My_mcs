<?php
//测试控制器类  文章控制器
class IndexControl extends AuthControl{
	//文章表模型
	private $_db;
	//栏目缓存
	private $_category;
	public function __construct(){
		$this->_db = K("Content");//文章表 
                             //false 只读不取
		$this->_category = F("category",false,CATEGORY_CACHE_PATH);

	}
    function index(){
       $count = $this->_db->count();//统计
       $page = new Page($count, 7);//分页
       $data = $this->_db->limit($page->limit())->all();//分页全部都取出来
       $this->assign(array('page' => $page->show(), 'data' => $data));//2个assign可以数组模式
       $this->category = $this->_category;
       $this->display();
    }
    //发表文章
    public function add(){
    	if(IS_POST){
    		//发表文章
    		$this->_db->add_content();
    	    $this->success('修改发表成功', 'index');
    	}else{
    		$this->category = $this->_category;
        $this->display();
    	}
    }   
     //删除栏目
     public function del(){
        if($cid=Q("get.id")){
            //删除栏目数据
            $this->_db->del_cotegory($cid);
            $this->success('删除栏目成功');
        }
     }
    //修改文章
    public function edit(){
      if(IS_POST){
        //修改文章
        $this->_db->edit_content();//Model
        $this->success('修改发表成功', 'index');
      }else{
          if ($id = Q('get.id', NULL, 'intval')) {
         $a= $this->category = $this->_category;
         // p($a);exit;
          //将当前文章字段分配到模板
          $q=$this->field = $this->_db->find($id);   
          // p($q);exit;       
          $this->display();
        }
      }
    }
}
