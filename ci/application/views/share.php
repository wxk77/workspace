<html>
<head>
<title>微信分享</title>
<meta charset="utf-8">
</head>
<body>

	<h3 id="menu-share">分享接口</h3>    
        <span class="desc">获取“分享到朋友圈”按钮点击状态及自定义分享内容接口</span>    
        <button class="btn btn_primary" id="onMenuShareTimeline">onMenuShareTimeline</button>    
        <span class="desc">获取“分享给朋友”按钮点击状态及自定义分享内容接口</span>    
        <button class="btn btn_primary" id="onMenuShareAppMessage">onMenuShareAppMessage</button>    
        <span class="desc">获取“分享到QQ”按钮点击状态及自定义分享内容接口</span>    
        <button class="btn btn_primary" id="onMenuShareQQ">onMenuShareQQ</button>    
        <span class="desc">获取“分享到腾讯微博”按钮点击状态及自定义分享内容接口</span>    
        <button class="btn btn_primary" id="onMenuShareWeibo">onMenuShareWeibo</button> 


<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
<script>
wx.config({
    debug: true,//这里是开启测试，如果设置为true，则打开每个步骤，都会有提示，是否成功或者失败
    appId: 'wxba0877b55128af25',
    timestamp: '1414587457',//这个一定要与上面的php代码里的一样。
    nonceStr: 'Wm3WZYTPz0wzccnW',//这个一定要与上面的php代码里的一样。
    signature: 'cf13235e1ce325eec103f237b6d04837597aad62',
    jsApiList: [
      // 所有要调用的 API 都要加到这个列表中
        'onMenuShareTimeline',
        'onMenuShareAppMessage',
        'onMenuShareQQ',
        'onMenuShareWeibo'
    ]
});
wx.ready(function () {
  // 1 判断当前版本是否支持指定 JS 接口，支持批量判断
  // document.querySelector('#checkJsApi').onclick = function () {
  //   wx.checkJsApi({
  //     jsApiList: [
  //       'getNetworkType',
  //       'previewImage'
  //     ],
  //     success: function (res) {
  //       alert(JSON.stringify(res));
  //     }
  //   });
  // };
  // 2. 分享接口
  // 2.1 监听“分享给朋友”，按钮点击、自定义分享内容及分享结果接口
  document.querySelector('#onMenuShareAppMessage').onclick = function () {
    wx.onMenuShareAppMessage({
      title: '互联网之子',
      desc: '在长大的过程中，我才慢慢发现，我身边的所有事，别人跟我说的所有事，那些所谓本来如此，注定如此的事，它们其实没有非得如此，事情是可以改变的。更重要的是，有些事既然错了，那就该做出改变。',
      link: 'http://movie.douban.com/subject/25785114/',
      imgUrl: 'http://img3.douban.com/view/movie_poster_cover/spst/public/p2166127561.jpg',
      trigger: function (res) {
        alert('用户点击发送给朋友');
      },
      success: function (res) {
        alert('已分享');
      },
      cancel: function (res) {
        alert('已取消');
      },
      fail: function (res) {
        alert(JSON.stringify(res));
      }
    });
    alert('已注册获取“发送给朋友”状态事件');
  };
  // 2.2 监听“分享到朋友圈”按钮点击、自定义分享内容及分享结果接口
  document.querySelector('#onMenuShareTimeline').onclick = function () {
    wx.onMenuShareTimeline({
      title: '互联网之子',
      link: 'http://movie.douban.com/subject/25785114/',
      imgUrl: 'http://img3.douban.com/view/movie_poster_cover/spst/public/p2166127561.jpg',
      trigger: function (res) {
        alert('用户点击分享到朋友圈');
      },
      success: function (res) {
        alert('已分享');
      },
      cancel: function (res) {
        alert('已取消');
      },
      fail: function (res) {
        alert(JSON.stringify(res));
      }
    });
    alert('已注册获取“分享到朋友圈”状态事件');
  };
  // 2.3 监听“分享到QQ”按钮点击、自定义分享内容及分享结果接口
  document.querySelector('#onMenuShareQQ').onclick = function () {
    wx.onMenuShareQQ({
      title: '互联网之子',
      desc: '在长大的过程中，我才慢慢发现，我身边的所有事，别人跟我说的所有事，那些所谓本来如此，注定如此的事，它们其实没有非得如此，事情是可以改变的。更重要的是，有些事既然错了，那就该做出改变。',
      link: 'http://movie.douban.com/subject/25785114/',
      imgUrl: 'http://img3.douban.com/view/movie_poster_cover/spst/public/p2166127561.jpg',
      trigger: function (res) {
        alert('用户点击分享到QQ');
      },
      complete: function (res) {
        alert(JSON.stringify(res));
      },
      success: function (res) {
        alert('已分享');
      },
      cancel: function (res) {
        alert('已取消');
      },
      fail: function (res) {
        alert(JSON.stringify(res));
      }
    });
    alert('已注册获取“分享到 QQ”状态事件');
  };
  
  // 2.4 监听“分享到微博”按钮点击、自定义分享内容及分享结果接口
  document.querySelector('#onMenuShareWeibo').onclick = function () {
    wx.onMenuShareWeibo({
      title: '互联网之子',
      desc: '在长大的过程中，我才慢慢发现，我身边的所有事，别人跟我说的所有事，那些所谓本来如此，注定如此的事，它们其实没有非得如此，事情是可以改变的。更重要的是，有些事既然错了，那就该做出改变。',
      link: 'http://movie.douban.com/subject/25785114/',
      imgUrl: 'http://img3.douban.com/view/movie_poster_cover/spst/public/p2166127561.jpg',
      trigger: function (res) {
        alert('用户点击分享到微博');
      },
      complete: function (res) {
        alert(JSON.stringify(res));
      },
      success: function (res) {
        alert('已分享');
      },
      cancel: function (res) {
        alert('已取消');
      },
      fail: function (res) {
        alert(JSON.stringify(res));
      }
    });
    alert('已注册获取“分享到微博”状态事件');
  };
});
</script>

</body>




</html>






























