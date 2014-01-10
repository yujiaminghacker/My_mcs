$(function () {
    $("form").validate({
        "username": {
            rule: {
                required: true
            },
            error: {
                required: '帐号不能为空'
            }
        },
        password: {
            rule: {
                required: true
            },
            error: {
                required: '密码不能为空'
            }
        },
        code: {
            rule: {
                required: true,
                ajax: CONTROL + '&m=check_code'
            },
            error: {
                required: '验证码不能为空',
                ajax: '验证码输入错误'
            }
        }
    })
})
//异步提交登录
$(function () {
    $("form").submit(function () {
        if ($(this).is_validate()) {
            $.ajax({
                url: METH, //地址
                data: $(this).serialize(),//数据
                type: 'post',
                dataType: 'json',
                success: function (data) {
                    if(data.stat==0){
                        alert(data.msg);
                    }else{
                        window.location.reload(true);//添true 不走缓存刷新页面 不添是刷新缓存
                    }
                }
            })
        }
        return false;
    })
})


