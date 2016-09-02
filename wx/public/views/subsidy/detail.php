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
                <span>仅限&nbsp;大自然地板马会家居店;</span>
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
            <?php foreach($detail['LogoUrls'] as $image): ?>
            <div class="swiper-slide"><img src="<?=$image?>" /></div>
            <?php endforeach; ?>
        </div>
        <!-- 圆点容器 -->
        <div class="swiper-pagination"></div>
    </div>
</section>
<div class="relation">
    <div class="relation-detail">
        <span><?=$detail['ShopName']?></span>
        <a href="#" class="tel"></a>
        <a href="#" class="mail"></a>
    </div>
    <a href="#" class="go"><img src="/public/images/Money-subsidy/go.png" /></a>
</div>
<footer>
    <a href="#">立刻使用</a>
</footer>
</body>
</html>
