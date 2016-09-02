<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>卖场网 - 订单现金补贴</title>
    <meta name="viewport" content="width=640, user-scalable=no, target-densitydpi=device-dpi">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="format-detection" content="telephone=no">

    <link rel="stylesheet" type="text/css" href="/public/css/reset.css">
    <link rel="stylesheet" type="text/css" href="/public/css/Money-subsidy.css">
    <link rel="stylesheet" type="text/css" href="/public/css/swiper.css">
    <script src="/public/js/jquery-1.11.3.min.js"></script>
    <script src="/public/js/swiper.min.js"></script>

    <script src="/public/js/script.js"></script>
    <script>
        function down(){
            window.location.href='http://a.app.qq.com/o/simple.jsp?pkgname=cc.mc.mcf';
            return;
        }
    </script>
</head>

<body>
<section>
    <header>
        <div class="money">
            <img src="/public/images/Money-subsidy/bu.png" />
            <span><?=$detail['Value']?><label>元</label></span>
        </div>
        <ul class="explain">
            <li>
                <span>仅限&nbsp;<?=$detail['ShopName']?>;</span>
            </li>
            <li>
                <span>仅限&nbsp;一张订单使用;</span>
            </li>
            <li>
                <span>仅限&nbsp;店铺内使用，外场活动不可使用；</span>
            </li>
            <li>
                <span>仅限&nbsp;付款时现金抵扣，不兑现、不找零</span>
            </li>
        </ul>
        <div class="ownership"><span>最终解释权归&nbsp;卖场网&nbsp;所有</span></div>
    </header>
</section>
<section>
    <div class="swiper-container">
        <div class="swiper-wrapper">
            <?php foreach($detail['Ads'] as $image): ?>
            <div class="swiper-slide"><a href="<?=$image['Href']?>"><img src="<?=$image["ImageUrl"]?>" /></a></div>
            <?php endforeach; ?>
        </div>
        <!-- 圆点容器 -->
        <div class="swiper-pagination"></div>
    </div>
</section>
<div class="relation">
    <div class="relation-detail">
        <a href="/shop/detail/<?=$detail['ShopId']?>" class="go"><img src="/public/images/Money-subsidy/go.png" /></a>
        <span><a href="/shop/detail/<?=$detail['ShopId']?>"><?=show_replay_text($detail['ShopName'], 13)?></a></span>
        <a href="tel:<?=$detail['ShopTelephone']?>" class="tel"></a>
<!--        <a href="#" class="mail"></a>-->
    </div>
</div>
<footer>
    <a href="#" onclick="down()">下载寻物鼠，获取<?=$detail['Value']?>元补贴</a>
</footer>
</body>
</html>
