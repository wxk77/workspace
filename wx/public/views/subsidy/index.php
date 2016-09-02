<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>卖场网 - 订单补贴</title>
    <meta name="viewport" content="width=640, user-scalable=no, target-densitydpi=device-dpi">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="format-detection" content="telephone=no">

    <link rel="stylesheet" type="text/css" href="/public/css/reset.css">
    <link rel="stylesheet" type="text/css" href="/public/css/Order-subsidy.css">

    <script src="/public/js/jquery-1.11.3.min.js"></script>
    <script>
        var total_page=<?php echo ceil($total/20);?>
    </script>
    <script src="/public/js/subsidy.js"></script>
</head>

<body>
<section>
    <nav class="nav">
        <ul>
            <li>
                <a href="#">
                    <span>金额</span>
                    <em class="money"></em>
                </a>
            </li>
            <li>
                <a href="#">
                    <span>筛选</span>
                    <em class="chose"></em>
                </a>
            </li>
            <li>
                <a href="#">
                    <span>查找</span>
                    <em class="find"></em>
                </a>
            </li>
        </ul>
        <a href="#" class="butie">
            <em class="butie-img"></em>
            <span>补贴申请</span>
        </a>
    </nav>
</section>
<section id="clear">
    <ul class="text">
        <li>
            <span><img src="/public/images/Order-subsidy/danbao.png" />:</span>
            <span>卖场网现金担保，补贴无条件使用</span>
        </li>
        <li>
            <span><img src="/public/images/Order-subsidy/chengnuo.png" />:</span>
            <span>提供补贴的店铺书面承诺，补贴可用.</span>
        </li>
        <a href="#" class="clear"></a>
    </ul>
</section>
<section style="background:#eeeeee;">
<!--    <div class="lsit-summary"><span>含有<label class="word">海蓝地</label>关键字的补贴</span></div>-->
    <div class="list">

    </div>

</section>
<div class="renovate">
    释放即可加载更多
</div>
<div class="loading">
    <img src="/public/images/1_1_00009.gif" alt="" />
</div>
<div class="model" id="dialog">
    <div class="m_box">
        <h3>免责声明</h3>
        <p><?=$text?></p>
        <div class="btn_g">
            <span id="cancel">取消</span>
            <span id="enter">知道了</span>
        </div>
    </div>
</div>

<!--<section>-->
<!--    <footer>-->
<!--        <ul>-->
<!--            <li>-->
<!--                <a href="#">-->
<!--                    <img src="/public/images/Order-subsidy/bu.png" />-->
<!--                    <p class="bu">所有补贴</p>-->
<!--                </a>-->
<!--            </li>-->
<!--            <li>-->
<!--                <a href="#">-->
<!--                    <img src="/public/images/Order-subsidy/code.png" />-->
<!--                    <p class="code">激活码</p>-->
<!--                </a>-->
<!--            </li>-->
<!--            <a href="#" class="qiang">-->
<!--                <img src="/public/images/Order-subsidy/qiang.png">-->
<!--                <p>抢补贴</p>-->
<!--            </a>-->
<!--        </ul>-->
<!--    </footer>-->
<!--</section>-->

</body>
</html>
