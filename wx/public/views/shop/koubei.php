<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
    <title>卖场网 - 成交口碑</title>
    <link rel="stylesheet" type="text/css" href="/public/css/reset_pj.css"/>
    <link rel="stylesheet" type="text/css" href="/public/css/stroll2.css"/>
    <script src="/public/js/jquery-1.11.3.min.js"></script>
    <script type="text/javascript" src="/public/js/discuss2.js"></script>
    <script>var shopid = <?=$shopid?>; var total_page = <?=$total?></script>
</head>
<body>
<?php if($list['RecordCount'] < 1):?>
    <div class="no_p">暂无成交口碑</div>
<?php else: ?>
<div id="outbox">

</div>
<div class="renovate" style="display:none;">
    释放即可加载更多
</div>
<?php endif; ?>
<div class="loading" style="display: none;">
    <img src="/public/images/1_1_00009.gif" alt="">
</div>
</body>
</html>
