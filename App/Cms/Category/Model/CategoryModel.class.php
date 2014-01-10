<?php 
/**
 * lanmumoxing
 *Class CategoryModel
 * yjm
 */
class CategoryModel extends Model{
    public $validata=array(
        array("cat_name","nonull",'栏目名不能为空',2,3),
    );
    //添加栏目
    public function cat_add(){
        //执行验证 创建
        if($this->create()){
            //添加数据
            $this->add();
            //更新缓存
            $this->update_cache();
            return true;
        }else{
            return false;
        }
    }
    //更新栏目缓存
    public function update_cache()
    {
        //删除缓存
        $data = $this->all();
        $data = Data::tree($data, 'cat_name');
        $cat = array();
        foreach ($data as $d) {
            $cat[$d['cid']] = $d;
        }
        return F('category', $cat, CATEGORY_CACHE_PATH);
    }
    //删除栏目
    public function del_cotegory($cid){
        $this->del($cid);
        return $this->update_cache();
    }
    //修改栏目
    public function update_category(){
        if($this->create()){//自动执行
            $this->save();//更新
            $this->update_cache();
        }
    }

}