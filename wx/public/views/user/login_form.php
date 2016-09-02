<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>卖场网 - 登录页</title>
    <meta name="viewport" content="width=640, user-scalable=no, target-densitydpi=device-dpi">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="format-detection" content="telephone=no">

    <link rel="stylesheet" type="text/css" href="/public/css/reset.css">
    <link rel="stylesheet" type="text/css" href="/public/css/login.css">

    <script src="/public/js/jquery-1.11.3.min.js"></script>
    <script src="/public/js/hideShowPassword.js"></script>
    <script src="/public/js/login.js"></script>

</head>

<body>
<div class="main">
    <div class="logo"><img src="/public/images/logo.png" /></div>
    <div class="edit">
        <div class="shuru">
            <input id="username" type="text" class="text" placeholder="手机号" >
            <input id="password" type="password" class="pwd" placeholder="密码" >
            <input id="callback" type="hidden" name="callback" value="<?=$callback?>">
            <a href="#" class="show-pwd"><img src="/public/images/pwd.png" /></a>
        </div>
        <div class="tijiao">
            <a class="quxiao">取消</a>
            <a class="denglu">登录</a>
        </div>
        <div class="forgit">
            <ul>
                <li><a>忘记密码？</a></li>
                <li style="text-align:right;"><a>注册</a></li>
            </ul>
        </div>
    </div>

    <div class="footer">
        <div class="footer-header"><img src="/public/images/footer.png" /></div>
        <div class="three">
            <ul>
                <li>
                    <a href="#">
                        <img src="/public/images/QQ.png" />
                        <p>QQ登录</p>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img src="/public/images/weixin.png" />
                        <p>微信登陆</p>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img src="/public/images/weibo.png" />
                        <p>微博登陆</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>

</div>
</body>
</html>
