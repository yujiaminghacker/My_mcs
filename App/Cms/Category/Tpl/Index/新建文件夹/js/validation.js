$(function(){
    $("from").validation({
        // 验证规则
        cat_name:{
            rule:{
                required:true,
                ajax:CONTROL+'/check_category_name'
            },
            error:{
                required:"栏目名称不能为空",
                ajax:'栏目已经存在'
            }
        }
    })
})
