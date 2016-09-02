<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
    <title>卖场网-<?=$data['building']?></title>
    <link rel="stylesheet" href="/public/css/mui.min.css">
    <link rel="stylesheet" href="/public/css/reset_pj.css" />
    <link rel="stylesheet" type="text/css" href="/public/css/comDetails.css"/>
    <!--<script src="js/shopSelDetails.js" type="text/javascript" charset="utf-8"></script>-->
    <script src="/public/js/jquery-1.11.3.min.js" type="text/javascript" charset="utf-8"></script>
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
</head>
<body>
<section>
    <div class="main">
        <div class="mui-slider pj_slider">
            <div class="mui-slider-group pj_group">
                <?php foreach($data['images'] as $image): ?>
                <div class="mui-slider-item">
                    <a class="img_box" href="#"><img class="img" src="<?=$image?>" data-preview-src="" data-preview-group="1" /></a>
                    <div class="details">
                        <div class="de_h">
                            <p><?=$data['content']?></p>
                        </div>
                        <div class="de_f">
                            <div class="fllow">
                                <span class="zan">点赞（23）</span>
                                <span class="ping">评论（7）</span>
                            </div>
                            <a href="http://www.baidu.com">查看该商品></a>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
        <!--<div class="page">1/2</div>-->
    </div>
</section>
<script src="/public/js/mui.min.js"></script>
<script src="/public/js/mui.zoom.js"></script>
<script src="/public/js/mui.previewimage.js"></script>
<script>
    mui.previewImage();

    var s=document.querySelector(".pj_group");
    var oNow=document.querySelector(".page");
    var cur=document.querySelector(".mui-preview-indicator");
    var aSwiper=s.children;
    var curIndex=1;
    document.querySelector('.mui-preview-image').addEventListener('slide', function(event) {
        //注意slideNumber是从0开始的；
        curIndex=event.detail.slideNumber;
        console.log(event.detail.slideNumber+1);
        s.style.webkitTransform="translate3d(-"+curIndex*window.screen.width+"px,0px,0px)";
        for(var i=0;i<s.children.length;i++){
            s.children[i].className="mui-slider-item";
        }
        s.children[curIndex].className="mui-slider-item mui-active";
    });
    //		document.querySelector('.mui-slider').addEventListener('slide', function(event) {
    //			curIndex=event.detail.slideNumber;
    //			oNow.innerHTML=curIndex+1+"/"+aSwiper.length;
    //		});
    //		oNow.innerHTML=curIndex+"/"+aSwiper.length;

    $(function(){
        $("div.de_f > a").click(function(){
            window.location.href = $(this).attr("href");
        });
    });
</script>
</body>
</html>
