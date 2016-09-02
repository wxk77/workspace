<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
    <title>卖场网 - 图搜详情</title>
    <link rel="stylesheet" type="text/css" href="/public/css/reset_pj.css"/>
    <link rel="stylesheet" type="text/css" href="/public/css/picDetails.css"/>
    <script src="/public/js/jquery-1.11.3.min.js" type="text/javascript" charset="utf-8"></script>
    <script src="/public/js/picDetails.js" type="text/javascript" charset="utf-8"></script>

</head>
<body>
<nav id="nav">
    <div class="list active">图搜详情</div>
    <div class="list">回复<span><?=$detail['ReplyCount']?></span></div>
    <div class="list">逛评<span><?=$detail['DiscussCount']?></span></div>
</nav>
<!--tab列表-->
<section>
    <div class="pic_box">
        <img src="<?=$detail['ImageUrl']?>" alt="" />
        <div class="name">
            <span><?=$detail['CreateAt']?></span>
            <p><?=$detail['BName']?></p>
        </div>
    </div>
    <div class="cell_form">
        <div class="cell">
            <div class="cell_hd">
                <label class="label">标题</label>
            </div>
            <div class="cell_bd">
                <p><?=$detail['Title']?></p>
            </div>
        </div>
        <div class="cell">
            <div class="cell_hd">
                <label class="label">买什么</label>
            </div>
            <div class="cell_bd">
                <p><?=$detail['CategoryName']?>-<?=$detail['IndustryName']?></p>
            </div>
        </div>
        <div class="cell">
            <div class="cell_hd">
                <label class="label">到哪买</label>
            </div>
            <div class="cell_bd">
                <p><?=$detail['CRegions']?></p>
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
                <label class="label"><?=$item['AttrName']?></label>
            </div>
            <div class="cell_bd">
                <p><?php echo $item['ADetailNames'] ? $item['ADetailNames'] : '暂无'; ?></p>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</section>

<section id='reply'>
    <div class="rep_list">
        <ul>
            <a href="#" class="rep_img-showhide"><img src="/public/images/rep_img_show.png" /></a>
            <li>
                <div class="rep_img"><img src="/public/images/rep_img.jpg" /><img src="/public/images/accept.png" id="accept" /></div>
                <div class="rep_nav">

                    <div class="one">
                        <ul class="rep-ulone">
                            <li>
                                <a href="#"><img src="/public/images/map.png" /><span>导航</span></a>
                            </li>
                            <li>
                                <a href="#"><img src="/public/images/tel.png" /><span>电话</span></a>
                            </li>
                            <li>
                                <a href="#"><img src="/public/images/mail.png" /><span>寻聊</span></a>
                            </li>
                        </ul>
                        <a href="#" class="switch"><img src="/public/images/delete.png" /></a>
                    </div>
                    <div class="two">
                        <ul class="rep_ultwo">
                            <li>
                                <a href="#"><img src="/public/images/huifu-img.png" class="huifu-img" /></a>
                            </li>
                            <li>
                                <a href="#">
                                        	<span>
                                            	<label>实木地板 型号A11...</label>
                                                <label>皇朝家私吉盛伟邦店</label>
                                            </span>
                                    <img src="/public/images/huifu-mail.png" class="huifu-mail" style="display:none;" />
                                    <p class="huifu-bi"><img src="/public/images/huifu-bi.png" /><span>比图</span></p>
                                </a>
                            </li>
                        </ul>
                        <a href="#" class="switch2"><img src="/public/images/back.png" /></a>
                        <img src="/public/images/accept2.png" class="accept2" />
                    </div>
                </div>
            </li>
        </ul>
    </div>
</section>
<section>
    <div class="tab">
        <div class="swiper-container stroll_nav">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="str_h">
                        <div class="star">
                            <span class="light"></span><span></span><span></span><span></span><span></span>
                        </div>
                        <div class="time">
                            16-06-10  15:32:51
                        </div>
                    </div>
                    <div class="str_c">
                        <p class="ping">评：大自然地板红檀香实木地板 <em class="g">(5图)</em></p>
                        <div class="pic_group">
                            <img src="/public/images/loading.png" alt="" />
                            <img src="/public/images/loading.png" alt="" />
                            <img src="/public/images/loading.png" alt="" />
                            <img src="/public/images/loading.png" alt="" />
                        </div>
                        <div class="pl">
                            东西不错，导购也漂亮！就是导购太少了，在旁边站了半天才理我，人家生意好，没办法。虽然美女导购给了逛店红包，但还是…<a href="#">[查看全文]</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</body>
</html>




