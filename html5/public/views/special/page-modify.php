<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>编辑页面信息</title>
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
                <li>
                    <span class="logo"></span>
                    <span class="menu">模板列表</span>
                    <span class="arrow"></span>
                </li>
                <li class="click-color">
                    <span class="logo"></span>
                    <span class="menu">专题详情列表</span>
                    <span class="arrow"></span>
                </li>
            </ul>
        </div>
    </div>
    <div class="right">
        <div >
            <p class="map">您当前的位置 > 专题列表 > 新增专题</p>
            <form id="page" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?=$data['id']?>">
                <div class="form">
                    <div class="item">
                        <div class="form-title"><em></em><span>页面信息</span></div>
                        <div class="temp">
                            <div class="temp-left detail">
                                <div class="box">
                                    <p class="name">显示标题：</p>
                                    <input type="text" class="text" name="page[title]" value="<?=$data['title']?>">
                                </div>
                                <div class="box">
                                    <p class="name">分享标题：</p>
                                    <input type="text" class="text" name="page[share][title]" value="<?=$data['share_title']?>">
                                </div>
                                <div class="box">
                                    <p class="name">分享图片：</p>
                                    <input type="hidden" name="page[image]" value="<?=$data['share_image']?>">
                                    <input type="file" class="text" name="pageImage">
                                </div>
                            </div>
                            <div class="temp-right detail">
                                <div class="box">
                                    <p class="name">分享链接：</p>
                                    <input type="text" class="text" name="page[share][link]" value="<?=$data['share_link']?>">
                                </div>
                                <div class="box">
                                    <p class="name">分享描述：</p>
                                    <input type="text" class="text" name="page[share][describe]" value="<?=$data['share_desc']?>">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="btn">
                        <a href="javascript:;" data-id="<?=$data['id']?>" class="save">保存</a>
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
    $(function(){
        $("a.save").on("click", function(){
            var title = $("input[name='page[title]']").val();
            $.ajax({
                url: "/special/modifyPageInfo/" + $(this).data("id"),
                type: "POST",
                data: new FormData($("#page")[0]),
                processData: false,
                contentType: false,
                dataType: "json"
            }).done(function(data){
                if(false === data.success){
                    alert("修改专题数据失败");
                }else if(true === data.success){
                    alert("修改数据成功");
                }
            });
        });

        $("a.cancel").on("click", function(){
            window.history.back();
        });
    });

</script>

</body>
</html>
