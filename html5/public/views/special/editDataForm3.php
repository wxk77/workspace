<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
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
                    <span class="menu">专题列表</span>
                    <span class="arrow"></span>
                </li>
            </ul>
        </div>
    </div>
    <div class="right">
        <div >
            <p class="map">您当前的位置 > 专题列表 > 编辑数据</p>
            <form id="theme" method="post" enctype="multipart/form-data">
                <div class="form">
                    <div class="item">
                        <div class="form-title"><em></em><span>商品展示数据信息</span></div>
                        <div class="temp" style="background:none;">
                            <div class="temp-left detail2" style="background:#fff;">
                                <div class="gray"><span>系列信息：</span></div>
                                <div class="box">
                                    <p class="name">系列标题：</p>
                                    <input type="text" class="text" name="series[title]" value="<?=$special['series']['title']?>">
                                </div>
                                <div class="box">
                                    <p class="name">系列logo：</p>
                                    <input type="file" class="text" name="seriesLogo">
                                    <input type="hidden" name="series[logo]" value="<?=$special['series']['logo']?>">
                                </div>
                            </div>
                            <div class="temp-right detail2" style="background:#fff";>
                                <div class="gray"><span>系列信息：</span></div>
                                <div class="box">
                                    <p class="name">系列描述：</p>
                                    <input type="text" class="text" name="series[describe]" value="<?=$special['series']['describe']?>">
                                </div>
                                <div class="box">
                                    <p class="name">系列图片：</p>
                                    <input type="file" class="text" name="seriesImage">
                                    <input type="hidden" name="series[image]" value="<?=$special['series']['image']?>">
                                </div>
                            </div>
                        </div>
                        <div class="mt-10"></div>
                        <div class="temp">
                            <div class="temp-left detail">
                                <div class="center"><span>产品1</span></div>
                                <div class="box">
                                    <p class="name">产品名称：</p>
                                    <input type="text" class="text" name="product[0][name]" value="<?=$special['product'][0]['name']?>">
                                </div>
                                <div class="box">
                                    <p class="name">产品型号：</p>
                                    <input type="text" class="text"name="product[0][version]" value="<?=$special['product'][0]['version']?>">
                                </div>
                                <div class="box">
                                    <p class="name">产品补贴：</p>
                                    <input type="text" class="text" name="product[0][subsidy]" value="<?=$special['product'][0]['subsidy']?>">
                                </div>
                                <div class="box">
                                    <p class="name">产品图片：</p>
                                    <input type="file" class="text" name="product0Image">
                                    <input type="hidden" name="product[0][image]" value="<?=$special['product'][0]['image']?>">
                                </div>
                            </div>
                            <div class="temp-left detail" style="border-left:1px solid #ededed;margin-left:28px;">
                                <div class="center"><span>产品2</span></div>
                                <div class="box">
                                    <p class="name">产品名称：</p>
                                    <input type="text" class="text" name="product[1][name]" value="<?=$special['product'][1]['name']?>">
                                </div>
                                <div class="box">
                                    <p class="name">产品型号：</p>
                                    <input type="text" class="text"name="product[1][version]" value="<?=$special['product'][1]['version']?>">
                                </div>
                                <div class="box">
                                    <p class="name">产品补贴：</p>
                                    <input type="text" class="text" name="product[1][subsidy]" value="<?=$special['product'][1]['subsidy']?>">
                                </div>
                                <div class="box">
                                    <p class="name">产品图片：</p>
                                    <input type="file" class="text" name="product1Image">
                                    <input type="hidden" name="product[1][image]" value="<?=$special['product'][1]['image']?>">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="btn">
                        <a href="javascript:;" class="save" data-id="<?=$id?>">保存修改</a>
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
    $("a.save").on("click", function(){
        $.ajax({
            url: '/special/modifyContent/' + $(this).data("id"),
            type: 'POST',
            data: new FormData($("#theme")[0]),
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

    $("a.cancel").click(function(){
        window.history.back();
    });
</script>

</body>
</html>