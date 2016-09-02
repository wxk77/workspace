<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
    <title>H5_02</title>
    <link rel="stylesheet" type="text/css" href="/public/css/reset_pj.css"/>
    <link rel="stylesheet" type="text/css" href="/public/css/H5_02.css"/>
    <script type="text/javascript">
        var rem=20;
        function resizeRem(){
            rem=20/320*document.documentElement.clientWidth;
            document.documentElement.style.fontSize=rem+"px";
        }
        document.addEventListener("DOMContentLoaded",function(){
            resizeRem();
        },false)
        window.onresize=function(){
            resizeRem();
        }
    </script>
</head>

<body>
<header class="banner">qw
    <img src="<?=$special['image']?>" />
    <div class="logo-top">
        <img src="<?=$special['logo']?>" />
    </div>
    <div class="describe">
        <div class="describe-title"><?=show_str($special['mcName'])[0]?><span><?=show_str($special['mcName'])[1]?></span><?=show_str($special['mcName'])[2]?></div>
        <p><?=$special['mcDescribe']?></p>
    </div>
    <a href="#" class="Hknow2"><img src="/public/images/H5_02/anniu001.png" /></a>
</header>

<div style="width:100%;height:50px;"></div>
<link rel="stylesheet" type="text/css" href="http://topic.mc.cc/static/shadow.css?v=1111">
<script src="http://libs.baidu.com/jquery/1.9.1/jquery.min.js"></script>
<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
<script src="http://topic.mc.cc/static/fs_shadow.js"></script>
<script>
    $(function () {
        fs_shadow.initDom("http://tool.mc.cc/mcf2");
        $.post("http://topic.mc.cc/wx.php", {method: "getwxconfig", url: window.location.href}, function (data) {
            wx.config({
                debug: false,
                appId: data.appId,
                timestamp: data.timestamp,
                nonceStr: data.nonceStr,
                signature: data.signature,
                jsApiList: [
                    'onMenuShareTimeline',
                    'onMenuShareAppMessage'
                ]
            });
            wx.ready(function () {
                var shareData64 = {
                    title: '这里写标题',
                    desc: '这里写描述',
                    link: window.location.href,
                    imgUrl: "http://topic.mc.cc/h5/images/xxxx 这里放转发头图url"
                };
                wx.onMenuShareAppMessage(shareData64);
                wx.onMenuShareTimeline(shareData64);

            });

            wx.error(function (res) {
                alert(res.errMsg + " wx");
            });

        }, "json")
    })

</script>
</body>
</html>
