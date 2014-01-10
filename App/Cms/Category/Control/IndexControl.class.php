<?php

/**
 * 栏目管理应用
 * Class IndexControl
 * yjm
 */
class IndexControl extends AuthControl
{
    //栏目的模型
    private $_db;
    // 栏目缓存
    private $_category;

    public function __init(){
        $this->_db = K('Category');  //false 只读不取
        $this->_category= F("category",false,CATEGORY_CACHE_PATH);
    }
    public function index(){
       $this->assign("category",$this->_category);
       $this->display();
    }  
    //添加栏目
    public function add(){
       if(IS_POST){
        if($this->_db->cat_add()){
            $this->success('添加栏目成功', 'index');
        }else {
                $this->error($this->_db->error);
            }
       }else{
            $pname="顶级栏目";
            if($pid= Q('get.pid')){
                $pname=$this->_category[$pid]['cat_name'];
            }
            $this->assign("pname",$pname);
            $this->display();
       }
    }
    //栏目名称检测（是否有同名栏目）
    public function check_category_name(){
        $cat_name=$_POST['cat_name'];
        echo $this->_db->where("cat_name='$cat_name'")->find() ? 0 : 1;
        exit;
    }
    //更新缓存
     public function update_cache(){
        $this->_db->update_cache();
        $this->success("缓存更新成功");
     }
    //删除栏目
     public function del(){
        if($cid=Q("get.cid")){
             //判断有没有子栏目
            if($this->_db->find("pid=$cid")){
                $this->error("请先删除子类栏目");
            }
             //判断有没有文章
            if($this->_db->table("content")->find("category_cid=$cid")){
                $this->error("请先移除栏目下的文章");
            }
            //删除栏目数据
            $this->_db->del_cotegory($cid);
            $this->success('删除栏目成功');

        }
     }
   //修改模板
     public function edit(){
       if($cid=Q("get.cid")){
        $field=$this->_category[$cid];//获取当前的点击
        foreach ($this->_category as $cid => $v) {
            $disable = $selected ="";//下拉框不可以选当前父级
            if($cid == $field['cid']){//当前和当前id
                $disable ='disabled="disabled"';
            }
            if($cid == $field['pid']){//当前和父级id
                $selected='selected="selected"';
            }
            $this->_category[$cid]['_html'] =
           "<option value='{$v['cid']}' $disable $selected> {$v['_name']} </option>";
         }
        $this->field=$field;//实例化一个不存在的属性。
        $this->category=$this->_category;//$this->assign("category",$this->_category)
        $this->display();
       }else{
        //修改栏目
        $this->_db->update_category();//修改栏目更新缓存  model
        $this->success("修改栏目成功","index");
       }
     }
}