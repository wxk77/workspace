<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title><?=$special['page']['title']?></title>
    <meta name="viewport" content="width=640, user-scalable=no, target-densitydpi=device-dpi">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="format-detection" content="telephone=no">

    <link rel="stylesheet" type="text/css" href="/public/css/reset_pj.css"/>
    <link rel="stylesheet" type="text/css" href="/public/css/wuzhou_mobile.css"/>

    <script src="/public/js/jquery-1.11.3.min.js"></script>
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
<header><img src="<?=$special['header']['image']?>" /></header>
<?php foreach($special['content'] as $key=>$item): ?>
    <section class="main">
        <div class="nav_head">
            <img src="<?=$item['series']['logo']?>" width="324" height="285" alt="" />
        </div>
        <div class="container">
            <div class="cont_h">
                <p><?=$item['series']['title']?></p>
                <p><?=$item['series']['describe']?></p>
            </div>
            <div class="cont_c">
                <div class="imgbox">
                    <a href=""><img src="<?=$item['series']['image']?>"/></a>
                </div>
            </div>
            <div class="cont_f">
                <div class="imgbox2">
                    <a href="#">
                        <img src="<?=$item['product'][0]['image']?>" width="225" height="185" />
                        <div class="info">
                            <p>名称:<?=$item['product'][0]['name']?></p>
                            <p>型号：<?=$item['product'][0]['version']?></p>
                            <span><i><?=$item['product'][0]['subsidy']?></i></span>
                        </div>
                    </a>
                    <a href="#">
                        <img src="<?=$item['product'][1]['image']?>" width="225" height="185" />
                        <div class="info">
                            <p>名称:<?=$item['product'][1]['name']?></p>
                            <p>型号:<?=$item['product'][1]['version']?></p>
                            <span><i><?=$item['product'][1]['subsidy']?></i></span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>
<?php endforeach; ?>

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
