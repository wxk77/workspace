<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title><?=$special['page']['title']?></title>
    <meta name="viewport" content="width=640, user-scalable=no, target-densitydpi=device-dpi">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="format-detection" content="telephone=no">

    <link rel="stylesheet" type="text/css" href="/public/css/reset.css">
    <link rel="stylesheet" type="text/css" href="/public/css/H5_01.css">

    <script src="/public/js/jquery-1.11.3.min.js"></script>
    <script>
        // JavaScript Document
        if(/Android (\d+\.\d+)/.test(navigator.userAgent)){
            var version = parseFloat(RegExp.$1);
            if(version > 2.3){
                var phoneScale = parseInt(window.screen.width) / 640;
                document.write('<meta name="viewport" content="width=640, minimum-scale = ' + phoneScale + ', maximum-scale = ' + phoneScale + ', target-densitydpi=device-dpi">');
            } else {
                document.write('<meta name="viewport" content="width=640, target-densitydpi=device-dpi">');
            }
        } else {
            document.write('<meta name="viewport" content="width=640, user-scalable=no, target-densitydpi=device-dpi">');
        }
    </script>

</head>

<body>
<header><img src="<?=$special['image']?>" />
        <div class="map"><span><?=$special['McName']?></span></div>
        <a href="#" class="Hknow1"><img src="/public/images/H5_01/konw.png" /></a>
        <div class="logo"><img src="<?=$special['logo']?>" /></div>
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
                    title: "<?php echo $special['page']['share_title']?>",
                    desc:  "<?php echo $special['page']['share_desc']?>",
                    link:  "<?php echo $special['page']['share_link']?>",
                    imgUrl: "<?php echo $special['page']['share_image']?>"
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
