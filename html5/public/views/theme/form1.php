<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>新增专题</title>
    <script src="/public/js/jquery.js"></script>
    <link rel="stylesheet" href="/public/css/reset.css"/>
    <link rel="stylesheet" href="/public/css/common.css"/>
    <link rel="stylesheet" href="/public/css/base.css"/>
</head>
<body>
<div class="all">
    <div class="left">
        <div class="top">
            <div class="top-detail">
                <div class="head"><img src="/public/images/face.png" /></div>
                <div class="detail">
                    <p><?=$_SESSION['username']?></p>
                    <a id="logout" href="javascript:;">退出账号</a>
                </div>
            </div>
        </div>
        <div class="bottom">
            <ul id="nav">
                <li class="click-color">
                    <span class="logo"></span>
                    <span class="menu">模板列表</span>
                    <span class="arrow"></span>
                </li>
                <li>
                    <span class="logo"></span>
                    <span class="menu">专题列表</span>
                    <span class="arrow"></span>
                </li>
            </ul>
        </div>
    </div>
    <div class="right">
        <div >
            <p class="map">您当前的位置 > 专题列表 > 新增专题</p>
            <form id="theme" method="post" enctype="multipart/form-data">
                <input type="hidden" name="theme" value="1">
                <div class="form">
                    <div class="item">
                        <div class="form-title"><em></em><span>页面信息</span></div>
                        <div class="temp">
                            <div class="temp-left detail">
                                <div class="box">
                                    <p class="name">显示标题：</p>
                                    <input type="text" class="text" name="page[title]">
                                </div>
                                <div class="box">
                                    <p class="name">分享标题：</p>
                                    <input type="text" class="text" name="page[share][title]">
                                </div>
                                <div class="box">
                                    <p class="name">分享图片：</p>
                                    <input type="file" class="text" name="pageImage">
                                </div>
                            </div>
                            <div class="temp-right detail">
                                <div class="box">
                                    <p class="name">分享链接：</p>
                                    <input type="text" class="text" name="page[share][link]">
                                </div>
                                <div class="box">
                                    <p class="name">分享描述：</p>
                                    <input type="text" class="text" name="page[share][describe]">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="form-title"><em></em><span>头部信息</span></div>
                        <div class="temp">
                            <div class="temp-left detail">
                                <div class="box">
                                    <p class="name">显示图片：</p>
                                    <input type="file" class="text" name="headerImage">
                                </div>
                                <div class="box">
                                    <p class="name">卖场名称：</p>
                                    <input type="text" class="text" name="header[McName]">
                                </div>
                                <div class="box">
                                    <p class="name">卖场logo：</p>
                                    <input type="file" class="text" name="headerLogo">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="form-title"><em></em><span>商品展示数据信息</span></div>
                        <div class="temp" style="background:none;">
                            <div class="temp-left detail2" style="background:#fff;">
                                <div class="gray"><span>系列信息：</span></div>
                                <div class="box">
                                    <p class="name">系列名称：</p>
                                    <input type="text" class="text" name="series[name]">
                                </div>
                                <div class="box">
                                    <p class="name">系列图片：</p>
                                    <input type="file" class="text" name="seriesImage">
                                </div>
                            </div>
                            <div class="temp-right detail2" style="background:#fff";>
                                <div class="gray"><span>品牌概要：</span></div>
                                <div class="box">
                                    <p class="name">品牌名称：</p>
                                    <input type="text" class="text" name="brand[name]">
                                </div>
                                <div class="box">
                                    <p class="name">品牌简介：</p>
                                    <input type="text" class="text" name="brand[describe]">
                                </div>
                            </div>
                        </div>
                        <div class="mt-10"></div>
                        <div class="temp">
                            <div class="temp-left detail">
                                <div class="center"><span>产品1</span></div>
                                <div class="box">
                                    <p class="name">产品编号：</p>
                                    <input type="text" class="text" name="product[0][number]">
                                </div>
                                <div class="box">
                                    <p class="name">产品型号：</p>
                                    <input type="text" class="text"name="product[0][version]">
                                </div>
                                <div class="box">
                                    <p class="name">产品概要：</p>
                                    <input type="text" class="text" name="product[0][describe]">
                                </div>
                                <div class="box">
                                    <p class="name">产品图片：</p>
                                    <input type="file" class="text" name="product0Image">
                                </div>
                            </div>
                            <div class="temp-left detail" style="border-left:1px solid #ededed;margin-left:28px;">
                                <div class="center"><span>产品2</span></div>
                                <div class="box">
                                    <p class="name">产品编号：</p>
                                    <input type="text" class="text" name="product[1][number]">
                                </div>
                                <div class="box">
                                    <p class="name">产品型号：</p>
                                    <input type="text" class="text" name="product[1][version]">
                                </div>
                                <div class="box">
                                    <p class="name">产品概要：</p>
                                    <input type="text" class="text" name="product[1][describe]">
                                </div>
                                <div class="box">
                                    <p class="name">产品图片：</p>
                                    <input type="file" class="text" name="product1Image">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="btn">
                        <a href="javascript:;" class="save">保存</a>
                        <a href="javascript:;" class="cancel">取消</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    $("#logout").on("click", function(){
        window.location.href = "/user/logout";
    });

    $("#nav>li>span.arrow").click(function(){
        $(this).siblings(".second-ul").slideToggle();
        $(this).toggleClass("down");
    });

    $("#nav > li:nth-child(1) > span.menu").on("click", function(){console.log("theme");window.location.href = "/theme/index/-1/-1/1";});
    $("#nav > li:nth-child(2) > span.menu").on("click", function(){console.log("special");window.location.href = "/special/index";});
</script>
<script>

    var APP = APP || {};
    APP.checkNull = function(){
        var check = true;
        $("form#theme").find("input").each(function(){
            if (this.value.length === 0){
                $(this).focus();
                check = false;
                return false;
            }
        });
        return check;
    };
    APP.cancel = function(){
        $("form#theme").find("input").val("");
    };
    $(function(){
        $("#theme a.save").click(function(event){
            if(false === APP.checkNull()){
                alert("请填写完整数据");
            } else {
                $.ajax({
                    url: '/special/create',
                    type: 'POST',
                    data: new FormData($("#theme")[0]),
                    processData: false,
                    contentType: false,
                    dataType: "json"
                }).done(function(data){
                    if(false === data.success){
                        alert("创建专题数据失败");
                    }else if(true === data.success){
                        if(confirm("是否继续添加数据")){
                            window.location.href = "/special/appendData/" + data.id + "/" + data.theme;
                        }
                    }
                });
            }
            event.preventDefault();
        });
        $("#theme a.cancel").click(function(){
            APP.cancel();
        });
    });
</script>


</body>
</html>