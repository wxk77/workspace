<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title><?=$special['page']['title']?></title>
    <meta name="viewport" content="width=640, user-scalable=no, target-densitydpi=device-dpi">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="format-detection" content="telephone=no">

    <link rel="stylesheet" type="text/css" href="/public/css/reset_pj.css"/>
    <link rel="stylesheet" type="text/css" href="/public/css/H5_02.css"/>

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
    <header class="banner">
        <img src="<?=$special['header']['image']?>" />
        <div class="logo-top">
            <img src="<?=$special['header']['logo']?>" />
        </div>
        <div class="describe">
            <div class="describe-title">广州<span>吉盛伟邦</span>琶洲店</div>
            <p><?=$special['header']['mcDescribe']?></p>
        </div>
        <a href="#" class="Hknow2"><img src="/public/images/H5_02/anniu001.png" /></a>
    </header>

    <section>
        <div class="main">
            <?php foreach($special['content'] as $key=>$item): ?>
            <div class="items">
                <div class="items_h">
                    <div class="pic_box">
                        <img src="<?=$item['series']['image']?>"/>
                        <div class="back_img">
                            <img src="<?=$item['series']['background']?>"/>
                        </div>
                    </div>
                    <div class="catena">
                        <h2><?=$item['series']['title']?></h2>
                        <p><span class="font_40">卫</span><span class="font_32">浴</span><span class="font_35 top">系</span><span class="font_35">列</span></p>
                        <p class="title"><?=$item['series']['describe']?></p>
                    </div>
                </div>
                <div class="items_c">
                    <ul>
                        <li>
                            <a href="#">
                                <div class="brand">
                                    <h3><?=$item['product'][0]['brand']?></h3>
                                </div>
                                <div class="details">
                                    <p class="name"><?=$item['product'][0]['name']?></p>
                                    <p class="xinghao">型号：<?=$item['product'][0]['version']?></p>
                                    <p class="jiage">补贴<span>￥<em><?=$item['product'][0]['subsidy']?></em>元</span></p>
                                </div>
                                <div class="shop_pic">
                                    <img src="<?=$item['product'][0]['image']?>" alt="" />
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <div class="brand">
                                    <h3><?=$item['product'][1]['brand']?></h3>
                                </div>
                                <div class="details">
                                    <p class="name"><?=$item['product'][1]['name']?></p>
                                    <p class="xinghao">型号：<?=$item['product'][1]['version']?></p>
                                    <p class="jiage">补贴<span>￥<em><?=$item['product'][1]['subsidy']?></em>元</span></p>
                                </div>
                                <div class="shop_pic">
                                    <img src="<?=$item['product'][1]['image']?>" alt="" />
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </section>

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
