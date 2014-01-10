<?php 
class ConfigModel extends Model{
	public $table="config";
	//获得配置项，根据类型产生相应的html
	public function get_all_config(){
		$config=$this->all();//编译数组config
		// p($config);exit;
		foreach($config as $k=>$c){
			// p($c);exit;
			$html="<tr><td class='w100'>{$c['title']}</td>";
			switch ($c['show_type']) {
				case 1:
					$html.="
					<td><input type='text' name='{$c['id']}' class='w200' value='{$c['value']}'/></td></tr>";
					break;
				case 2:
					$html.="<td>";
					$conf= explode(',', $c['conf']);
					foreach ($conf as $n) {
						$d=explode(":", $n);
						$select=$n[0]==$c['value']?"checked='checked'":"";//获取网站开关 是开 默认就选上  不是 就是空
						$html.="<label><input type='radio' name='{$c['id']}' value='{$d[0]}' $select /> {$d[1]}</label>";
					}
					$html.="</td></tr>";
					break;
			}
			$config[$k]['_html']=$html;
		}
		return $config;
		
	}
	//修改配置项
	public function edit_config(){
		foreach($_POST as $id=>$value){
			$this->save(array("id"=>$id,'value'=>$value));
		}
		$config = $this->field('name,value')->all();
		$arr=array();
		foreach ($config as $v) {
			$arr[$v['name']]=$v['value'];		
		}
		$data = "<?php if(!defined('HDPHP_PATH'))exit;\nreturn ".var_export($arr,true).";\n?>";
	    return file_put_contents("./data/config/config.inc.php", $data);
	}
}
