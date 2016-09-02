<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <link href="/public/css/style.css" rel="stylesheet" type="text/css" />
    <script src="/public/js/jquery.js"></script>
    <title>用户登录</title>
</head>
<body>
<script>
    $(function(){
        $("#login").submit(function(){
            event.preventDefault();
            var callback = $("input[name='callback']").val();
            var username = $("input#username").val();
            if (username.length < 1){
                $(this).focus();
            }
            var password = $("input#password").val();
            if (password.length < 1) {
                $(this).focus();
            } else {
                $.ajax({
                    type: "post",
                    url : "/user/doLogin",
                    data: {"username" : username, "password" : password, "callback" :  callback},
                    success: function(data){
                        if (data.success == false){
                            alert(data.error);
                        } else {
                            if (callback.length > 0 && data.callback !== "http://h5.local/user/login") {
                                window.location.href = data.callback;
                            }else{
                                window.location.href = "/theme/index/-1/-1/1";
                            }
                        }
                    },
                    dataType: "json"
                });
            }
        });
    })
</script>


<div class="wrapper">
    <div class="container">
        <h1>Welcome</h1>

        <form class="form" id="login">
            <input type="text" id="username" placeholder="Username">
            <input type="password" id="password" placeholder="Password">
            <input type="hidden" name="callback" value="<?=$callback?>">
            <input type="submit" id="login-button" value="Login">
        </form>
    </div>

    <ul class="bg-bubbles">
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
    </ul>
</div>

</body>
</html>

