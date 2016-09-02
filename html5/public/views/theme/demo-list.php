<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>模板主题列表</title>
    <link rel="stylesheet" type="text/css" href="/public/css/reset.css">
    <link rel="stylesheet" type="text/css" href="/public/css/demo-list.css">
    <link rel="stylesheet" href="/public/css/common.css"/>
    <script src="/public/js/jquery.js"></script>
    <style>

    </style>
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
        <div class="container">
            <p class="map">您当前的位置 > 模板列表</p>
            <div class="main">
                <div class="title">
                    <div class="name"><em></em><span>模板列表</span></div>
                    <form>
                        <div class="search-all">
                            <div class="item">
                                <span>名称：</span>
                                <input class="text" type="text" name="alias" id="alias">
                            </div>
                            <div class="item">
                                <span>编号：</span>
                                <input class="text" type="text" name="id" id="id">
                            </div>
                            <a class="search"></a>
                        </div>
                    </form>
                </div>
                <table class="table">
                    <tr>
                        <th>编号</th>
                        <th>名称</th>
                        <th>描述</th>
                        <th>关联专题数</th>
                        <th>操作</th>
                    </tr>
                    <?php foreach($themes as $item): ?>
                        <tr>
                            <td><?=$item['id'] ?></td>
                            <td><?=$item['alias'] ?></td>
                            <td><?=$item['desc'] ?></td>
                            <td class='counts' data-id="<?=$item['id'] ?>" title="点击跳转关联专题列表"><?=$item['counts'] ?> </td>
                            <td>
                                <span class="showDemo" data-id="<?=$item['id'] ?>" data-demo="<?=$item['demo_html']?>" title="预览"></span>
                                <span class='create' data-id="<?=$item['id'] ?>" title="创建相应专题"/></span>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
                <div class="pagination">
                    <?php echo $this->pagination->create_links(); ?>
                </div>
            </div>
        </div>
    </div>
    <div class="dialog">
        <iframe id="myframe" frameborder="0" scrolling="auto"></iframe>
    </div>
</div>
<script>
    var exitPreview = function(){
        $("div.dialog").removeClass("overlay").css("display", "none");
    };

    $(function(){
        $("#logout").on("click", function(){
            window.location.href = "/user/logout";
        });

        $("#nav>li>span.arrow").click(function(){
            $(this).siblings(".second-ul").slideToggle();
            $(this).toggleClass("down");
        });

        $("#nav > li:nth-child(1) > span.menu").on("click", function(){console.log("theme");window.location.href = "/theme/index/-1/-1/1";});
        $("#nav > li:nth-child(2) > span.menu").on("click", function(){console.log("special");window.location.href = "/special/index";});

        $("a.search").on("click", function(){
            var alias = $("input[name='alias']").val();
            var number = $("input[name='id']").val();
            alias = alias.length > 0 ? alias : -1;
            number = number.length > 0 ? parseInt(number) : -1;
            window.location.href = "/theme/index/" + alias + "/" + number;
        });

        $("span.showDemo").on("click", function(){
            var number = $(this).data("id");
            console.log(number);
            $("div.dialog>iframe").attr("src", "/theme/demo/" + number);
            // number 50 以上PC端demo
            if (number >= 50 ){
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

        $("span.create").on("click", function(){
            window.location.href = "/theme/form/" + $(this).data("id");
        });
    });
</script>

</body>
</html>
