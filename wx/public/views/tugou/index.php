<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
    <title>卖场网 - 图片寻物</title>
    <link rel="stylesheet" href="/public/css/reset_pj.css" />
    <link rel="stylesheet" href="/public/css/picSelect.css" />
    <script>var total_page = <?php echo ceil($total/20);?></script>
    <script src="/public/js/jquery-1.11.3.min.js" ></script>
    <script src="/public/js/picSelect.js"></script>
</head>
<body>
<header>
    <p>广州共 <?=$total?> 条图片寻物需求</p>
    <a href="javascript:;">筛选<em class="sel_icon"></em></a>
</header>
<section>
    <ul class="list">

    </ul>
</section>
<div class="renovate">
    释放即可加载更多
</div>
<div class="loading">
    <img src="/public/images/1_1_00009.gif" alt="" />
</div>
</body>
</html>
