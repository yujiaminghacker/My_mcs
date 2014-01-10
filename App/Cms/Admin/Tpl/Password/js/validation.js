$(function () {
    $("form").validate({
        "oldpassword": {
            rule: {
                required: true,
                // ajax: CONTROL + '&m=check_code'
            },
            error: {
                required: '旧密码不能为空'
            }
        },
        password: {
            rule: {
                required: true
            },
            error: {
                required: '新密码不能为空'
            }
        },
        password2: {
            rule: {
                required: true,
            },
            error: {
                required: '新密码不能为空',
            }
        }
    })
})