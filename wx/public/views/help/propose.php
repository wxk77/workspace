<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
    <link rel="stylesheet" href="/public/css/reset_pj.css" />
    <link rel="stylesheet" type="text/css" href="/public/css/propose.css"/>
    <script src="/public/js/propose.js" type="text/javascript" charset="utf-8"></script>
    <title>卖场网 - 投诉与建议</title>
</head>
<body>
<section>
    <form action="<?php echo site_url('help/suggest');?>" method="post">
        <div class="items"><input id="name" name="username" type="text" placeholder="姓名"/></div>
        <div class="items"><input id="phone" name="mobile" type="text" placeholder="电话号码"/></div>
        <div class="items"><textarea id="propose" name="suggest" rows="" cols="" placeholder="投诉与建议8个字符以上"></textarea></div>
        <div class="submit">
            <input id="btn" type="submit" value="提交" />
        </div>
    </form>
</section>
</body>
</html>
