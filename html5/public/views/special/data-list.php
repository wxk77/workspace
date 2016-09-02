<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>专题列表</title>
    <link rel="stylesheet" type="text/css" href="/public/css/reset.css">
    <link rel="stylesheet" type="text/css" href="/public/css/demo-list.css">
    <link rel="stylesheet" href="/public/css/common.css"/>
    <script src="/public/js/jquery.js"></script>
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
        <div class="container">
            <p class="map">您当前的位置 > 专题列表</p>
            <div class="main">
                <div class="title">
                    <div class="name"><em></em><span>专题详情列表</span></div>
                </div>
                <table>
                    <tr>
                        <th>编辑类型</th>
                        <th style="width:60%;">描述</th>
                        <th>操作</th>
                    </tr>
                    <tr>
                        <td>基础页面</td>
                        <td>编辑页面基本内容：标题、名称等</td>
                        <td>
                            <span class="edit" id="page" data-id="<?=$id?>"></span>
                        </td>
                    </tr>
                    <tr>
                        <td>头部内容</td>
                        <td>编辑头部信息</td>
                        <td>
                            <span class="edit" id="header" data-id="<?=$id?>" data-theme="<?=$theme;?>"></span>
                            <span class="preview header" data-id="<?=$id?>" data-theme="<?=$theme;?>" data-type="1"></span>
                        </td>
                    </tr>
                    <?php foreach($special['content'] as $key=>$content): ?>
                    <tr>
                        <td>页面内容</td>
                        <td>编辑页面基本内容：标题、名称等</td>
                        <td>
                            <span class="edit modify" data-id="<?=$id?>" data-special="<?=$key;?>" data-theme="<?=$theme;?>"></span>
                            <span class="delete" data-id="<?=$id?>" data-special="<?=$key;?>"></span>
                            <span class="preview content" data-special="<?=$key;?>" data-theme="<?=$theme;?>" data-type="2"></span>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
    </div>
    <div class="dialog">
        <iframe id="myframe" frameborder="0" scrolling="auto"></iframe>
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
        $("span#page").on("click", function(){
           window.location.href = "/special/editPageInfo/" +  $(this).data("id");
        });

        $("span#header").on("click", function(){
            window.location.href = "/special/editHeader/" +  $(this).data("id")+ "/" + $(this).data("theme");
        });

        $("span.delete").on("click", function(){
            if(confirm("确定要删除该数据？")){
                $.ajax({
                    url: '/special/delete_content',
                    type: 'POST',
                    data: {"id": $(this).data("special")},
                    dataType: "json"
                }).done(function(data){
                    if(data.success === true){
                        window.location.reload();
                    }
                });
            }
        });

        var exitPreview = function(){
            $("div.dialog").removeClass("overlay").css("display", "none");
        };

        $("span.preview").on("click", function(){
            var special_id = $(this).data("id");
            var theme_id = $(this).data("theme");
            var type = $(this).data('type');
            var content_key =$(this).data("special");
            if(type < 2){
                $("div.dialog>iframe").attr("src", "/special/headerPreview/" +special_id+ "/" + theme_id);
            }else{
                $("div.dialog>iframe").attr("src", "/special/contentPreview/" + content_key + "/" + theme_id);
            }
            // number 50 以上PC端demo
            if (theme_id >= 50 ){
                $("div.dialog>iframe").css("width", "80%");
            }
            $("div.dialog").attr("title", "点击退出预览").addClass("overlay").css("display", "block");
            $("div.dialog").click(function(){
                exitPreview();
            });

            $(document).keydown(function(e) {
                if (e.keyCode == 27) {
                    exitPreview();
                }
            });
        });

        $("span.modify").on("click", function(){
            window.location.href = "/special/editContent/" + $(this).data("special") + "/" + $(this).data("theme");
        });

    });
</script>

</body>
</html>

