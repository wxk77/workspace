// JavaScript Document
if (/Android (\d+\.\d+)/.test(navigator.userAgent)) {
    var version = parseFloat(RegExp.$1);
    if (version > 2.3) {
        var phoneScale = parseInt(window.screen.width) / 640;
        document.write('<meta name="viewport" content="width=640, minimum-scale = ' + phoneScale + ', maximum-scale = ' + phoneScale + ', target-densitydpi=device-dpi">');
    } else {
        document.write('<meta name="viewport" content="width=640, target-densitydpi=device-dpi">');
    }
} else {
    document.write('<meta name="viewport" content="width=640, user-scalable=no, target-densitydpi=device-dpi">');
}

$(function () {
    var callback = $("#callback").val();
    $(".show-pwd").click(function (event) {
        $('.pwd').hideShowPassword('toggle');
    });

    $(".quxiao").click(function(){
        if (callback.length > 0) {
            window.location.href= callback;
        } else {
            window.location.href= '/';
        }
    });

    $(".denglu").click(function(){
        var username = $("#username").val();
        var password = $("#password").val();
        if( username.length == 0 ) {
            alert("用户名不能为空");
        } else if (password.length == 0) {
            alert("密码不能为空");
        } else {
            $.ajax({
                type: 'POST',
                url: "/user/doLogin",
                data: {
                    "username" : username,
                    "password" : password,
                },
                success: function(data){
                    if (false == data.success || false == data.IsSucceed) {
                        alert(data.error);
                    } else if(callback.length > 0) {
                        window.location.href = callback;
                    } else {
                        window.location.href = '/';
                    }
                },
                error : function() {
                    alert("网络异常");
                    window.location.href = "/";
                },
                dataType:"json",
            })
        }
    });
});