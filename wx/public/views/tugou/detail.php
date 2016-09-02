<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
    <title>卖场网 - 图搜详情</title>
    <link rel="stylesheet" type="text/css" href="/public/css/reset_pj.css"/>
    <link rel="stylesheet" type="text/css" href="/public/css/picDetails.css"/>
    <script src="/public/js/jquery-1.11.3.min.js" type="text/javascript" charset="utf-8"></script>
    <script src="/public/js/iscroll.js" type="text/javascript" charset="utf-8"></script>
    <script src="/public/js/picDetails.js" type="text/javascript" charset="utf-8"></script>
   <script>var tugou_id = <?=$tugou_id?>;var total_reply = <?php echo $total_reply;?>;var total_discuss = <?php echo $total_discuss;?></script>

</head>
<body>
<nav id="nav">
    <div class="list active">图搜详情</div>
    <div class="list">回复<span id="huifu"><?=$detail['ReplyCount'] ?></span></div>
    <div class="list">逛评<span><?=$detail['DiscussCount'] ?></span></div>
</nav>
<!--tab列表-->
<section style="display: block">
    <div class="pic_box">
        <img src="<?=$detail['ImageUrl'] ?>" alt="" />
        <div class="name">
            <span><?=$detail['CreateAt'] ?></span>
            <p><?=$detail['BName'] ?></p>
        </div>
    </div>
    <div class="cell_form">
        <div class="cell">
            <div class="cell_hd">
                <label class="label">标题</label>
            </div>
            <div class="cell_bd">
                <p><?=$detail['Title'] ?></p>
            </div>
        </div>
        <div class="cell">
            <div class="cell_hd">
                <label class="label">买什么</label>
            </div>
            <div class="cell_bd">
                <p><?=$detail['CategoryName'] ?>-<?=$detail['IndustryName'] ?></p>
            </div>
        </div>
        <div class="cell">
            <div class="cell_hd">
                <label class="label">到哪买</label>
            </div>
            <div class="cell_bd">
                <p><?=$detail['CRegions'] ?></p>
            </div>
        </div>
    </div>
    <!--参数需求-->
    <div class="param">
        <p>参数需求</p>
    </div>
    <div class="cell_form">
        <?php foreach($detail['GCAttrList'] as $item): ?>
        <div class="cell">
            <div class="cell_hd">
                <label class="label"><?=$item['AttrName'] ?></label>
            </div>
            <div class="cell_bd">
                <p><?php echo $item['ADetailNames'] ? $item['ADetailNames'] : '暂无'; ?></p>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</section>

<section>
    <div id="wrapper" class="wrapper">
        <div id="scroller" class="scroller">
            <div id="pullDown" >
                <span class="pullDownLabel"></span>
            </div>
            <div id="thelist" class="thelist" style="position: relative;">
                <a href="#" class="rep_img-showhide"><img src="/public/images/rep_img_show.png" /></a>
                <div class="rep_list" >
                    <ul>

                    </ul>
                </div>
            </div>
            <div id="pullUp" >
                <span class="pullUpLabel"></span>
            </div>
        </div>
    </div>
</section>

<section>
	<div id="wrapper2" class="wrapper">
		<div id="scroller2" class="scroller">
			<div id="pullDown2">
				<span class="pullDownLabel"></span>
			</div>
			<div id="thelist2" class="thelist">
				 <div class="tab">

	            </div>
	        </div>
			<div id="pullUp2">
				<span class="pullUpLabel"></span>
			</div>
		</div>
	</div>
</section>
</body>
</html>




