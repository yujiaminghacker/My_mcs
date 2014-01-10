$(function (){
	$("form").validation({
		//验证规则
		title: {
			rule: {
				required:true
			},
			error:{
				required:"文章标题不能为空"
			}
		}
	})
    $("form").submit(function () {
        if (!UE.getEditor('hd_content').hasContents()) {
            alert('内容不能为空');
             return false;
        }

    })
})