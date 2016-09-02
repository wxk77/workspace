<script type="text/javascript">
	function toshare(){
		$(".am-share").addClass("am-modal-active");	
		if($(".sharebg").length>0){
			$(".sharebg").addClass("sharebg-active");
		}else{
			$("body").append('<div class="sharebg"></div>');
			$(".sharebg").addClass("sharebg-active");
		}
		$(".sharebg-active,.share_btn").click(function(){
			$(".am-share").removeClass("am-modal-active");	
			setTimeout(function(){
				$(".sharebg-active").removeClass("sharebg-active");	
				$(".sharebg").remove();	
			},300);
		})
	}	
</script>
<span onClick="toshare()" style="border:dotted 1px #ddd;display:block;width:100px;text-align:center;margin:20px auto 0 auto;cursor:pointer;height:60px;line-height:60px;">点击分享到</span>



<div class="am-share">
  <h3 class="am-share-title">分享到</h3>
  <ul class="am-share-sns">
    <li><a href="http://v.t.sina.com.cn/share/share.php?&url={url}&title={title}&content=gb2312"> <i class="share-icon-weibo"></i> <span><image src='weibo.jpg' weight=10px;height=10px;/>新浪微博</span> </a> </li>
    <li><a href="http://v.t.qq.com/share/share.php?title={title}&url={url}&pic={pic:|}"> <i class="share-icon-weibo"></i> <span>QQ微博</span> </a> </li>
    <li><a href="http://share.renren.com/share/buttonshare.do?link={url}&title={title}"> <i class="share-icon-weibo"></i> <span>人人</span> </a> </li>
    <li><a href="http://sns.qzone.qq.com/cgi-bin/qzshare/cgi_qzshare_onekey?url={url}&title={title}"> <i class="share-icon-weibo"></i> <span>QQ空间</span> </a> </li>
	<li><a href="http://www.douban.com/recommend/?url={url}&title"> <i class="share-icon-weibo"></i> <span>豆瓣</span> </a> </li>
  </ul>
  <div class="am-share-footer"><button class="share_btn">取消</button></div>
</div>

