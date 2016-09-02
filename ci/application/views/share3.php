<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

</body>
<script type="text/javascript" src="/CodeIgniter/public/share.js"></script>
<script type="text/javascript">
/**
 * 定制接口
 * @param opts 定制内容
 */
setShareInfo({
    title:          '父爱，在你看不到的地方', // 分享标题
    summary:        '父爱如山，感觉不到只因身在此山中', // 分享内容
    pic:            'http://qzonestyle.gtimg.cn/aoi/sola/20150617094556_OvfOpoRKRB.png', // 分享图片
    url:            'http://qzs.qzone.qq.com/qzone/qzact/act/2015/father-day-m/index.html', // 分享链接
    // 微信权限验证配置信息，若不在微信传播，可忽略
    WXconfig: {
        swapTitleInWX: true, // 是否标题内容互换（仅朋友圈，因朋友圈内只显示标题）
        appId: 'wxba0877b55128af25', // 公众号的唯一标识
        timestamp: '1414587457', // 生成签名的时间戳
        nonceStr: 'Wm3WZYTPz0wzccnW', // 生成签名的随机串
        signature: 'cf13235e1ce325eec103f237b6d04837597aad62 '// 签名
    }
});
</script>
</html>