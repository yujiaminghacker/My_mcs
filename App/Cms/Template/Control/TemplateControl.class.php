<?php

//测试控制器类
class TemplateControl extends Control
{

    function __init()
    {
    }

    //设置网站风格
    function set_style()
    {
        $tpl=array();
        foreach (glob('Template/*') as $n=>$s) {
            $tmp=array('name'=>basename($s),'pic'=>__ROOT__.'/'.$s.'/thumb.jpg');
            $tmp['class']=C('template_style')==basename($s)?' class="active"':'';
            $tpl[]=$tmp;
        }
        $this->tpl = $tpl;
        $this->display();
    }
    //选择模板
    public function select_tpl(){
        $name= Q("name");
        //导入config表模型
        import('Config/Model/ConfigModel');
        $db =K("Config");
        $db->where('name="template_style"')->save(array('value'=>$name));
        if($db->edit_config_file()){
            $this->success('设置模板风格成功!');
        }
    }
}

?>
















