<!doctype html>
<html>
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
                    <span class="menu">专题列表</span>
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
                    <div class="name"><em></em><span>专题列表</span></div>
                    <form>
                        <div class="search-all">
                            <div class="item">
                                <span>模板编号：</span>
                                <input class="text" type="text" name="theme" id="alias">
                            </div>
                            <div class="item">
                                <span>专题名称：</span>
                                <input class="text" type="text" name="special" id="id">
                            </div>
                            <a class="search"></a>
                        </div>
                    </form>
                </div>
                <table class="table2">
                    <tr>
                        <th>模板编号</th>
                        <th>标题</th>
                        <th>描述</th>
                        <th>创建人</th>
                        <th>创建时间</th>
                        <th>操作</th>
                    </tr>
                    <?php foreach($special as $item): ?>
                    <tr>
                        <td><?=$item['theme']?></td>
                        <td><?=$item['title']?></td>
                        <td><?=$item['share_desc']?></td>
                        <td><?=$item['username']?></td>
                        <td><?=$item['create_time']?></td>
                        <td>
                            <span class="preview" data-id="<?=$item['id'] ?>" data-theme="<?=$item['theme'] ?>" title="预览专题"></span>
                            <span class='add' data-id="<?=$item['id'] ?>" data-theme="<?=$item['theme'] ?>" title="添加专题内容"></span>
                            <span class='edit' data-id="<?=$item['id']?>" data-theme="<?=$item['theme'] ?>" title="编辑专题内容"></span>
                            <span class="delete" data-id="<?=$item['id']?>" title="删除该专题"></span>
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
    var exitPreview = function(){
        $("div.dialog").removeClass("overlay").css("display", "none");
    };

    $(function(){
        $("span.delete").on("click", function(){
            var is_last = $("table tr").length > 2 ? false : true;
            if(confirm("确定要删除该数据？")){
                $.ajax({
                    url: '/special/delete',
                    type: 'POST',
                    data: {"id": $(this).data("id")},
                    dataType: "json"
                }).done(function(data){
                    if(data.success === true){
                        if(is_last){
                            window.location.href = "/special/index";
                        }else{
                            window.location.reload();
                        }
                    }
                });
            }
        });

        $("span.add").on("click", function(){
            window.location.href = "/special/appendData/" + $(this).data("id") + "/" + $(this).data("theme");
        });

        $("span.edit").on('click',function(){
            window.location.href="/special/edit/"+ $(this).data("id") + "/" + $(this).data("theme");
        })

        $("span.preview").on("click", function(){
            var special_id = $(this).data("id");
            var theme_id = $(this).data("theme");
            $("div.dialog>iframe").attr("src", "/special/preview/" + special_id);
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

        $("span.edit").on("click", function(){
            window.location.href = "/special/edit/" + $(this).data("id") + "/" + $(this).data("theme");
        });
    });

</script>

</body>
</html>
