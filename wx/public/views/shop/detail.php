<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
    <title>卖场网 - 店铺详情</title>
    <link rel="stylesheet" type="text/css" href="/public/css/reset_pj.css"/>
    <link rel="stylesheet" type="text/css" href="/public/css/shopDetails.css"/>
    <link rel="stylesheet" href="/public/css/swiper-3.3.1.min.css" />
    <script src="/public/js/jquery-1.11.3.min.js" type="text/javascript" charset="utf-8"></script>
    <script src="/public/js/swiper-3.3.1.min.js"></script>
    <script src="/public/js/shopDetails.js"></script>
    <script>
        var is_login = false;
        var user_id = 0;
        <?php if($is_login): ?>
            is_login = true;
            user_id = <?=$userid?>
        <?php endif; ?>
        var shop_latitude = <?=$info['Latitude']?>;
        var shop_logitude = <?=$info['Logitude']?>;
    </script>
</head>
<body>
<section>
    <!--轮播图-->
    <div class="swiper-container head_banner">
        <div class="swiper-wrapper">
            <?php if(strlen($info['Image1Url'])):?>
            <div class="swiper-slide"><img src="<?=$info['Image1Url']?>"/></div>
            <?php endif; ?>
            <?php if(strlen($info['Image2Url'])):?>
            <div class="swiper-slide"><img src="<?=$info['Image2Url']?>"/></div>
            <?php endif; ?>
            <?php if(strlen($info['Image3Url'])):?>
            <div class="swiper-slide"><img src="<?=$info['Image3Url']?>"/></div>
            <?php endif; ?>
        </div>
        <!-- 如果需要分页器 -->
        <div class="swiper-pagination small"></div>
    </div>
    <!--店铺名字-->
    <div class="shop_info">
        <div class="shop_h">
            <div class="pic">
                <img src="<?=$info['LogoUrl']?>" alt="" />
            </div>
            <div class="name">
                <h2><?=$info['Name']?></h2>
                <p>地址：<?=$info['MallName']?></p>
            </div>
        </div>
        <div class="shop_c">
            <div class="place">
                <span id="distance">定位中...</span>
            </div>
            <ul class="shop_item">
                <li>
                    <span class="item_h"><?=$info['ShopStatics']['TuGouReplyCount']?></span>
                    <span class="item_c">寻物回复</span>
                </li>
                <li>
                    <span class="item_h"><?=$info['ShopStatics']['ShopDiscussCount']?></span>
                    <span class="item_c">逛店口碑</span>
                </li>
                <li>
                    <span class="item_h"><?=$info['ShopStatics']['ShopDealKoubeiCount']?></span>
                    <span class="item_c">成交口碑</span>
                </li>
            </ul>
        </div>
    </div>
</section>
<!--补贴券-->
<section>
    <!--没有补贴-->
    <?php if($subsidy['IsHaveSubsidy'] < 1): ?>
    <div class="no_subsidy">
        <div class="subsidy_l">
            <div class="intr">
                <p class="intr_h">集齐600点呼声,店铺必上补贴</p>
                <div class="intr_f">
                    <p>每个账号可添加 <span class="g"><?=$subsidy['SingleUserCanSupportCount'];?></span> 点呼声</p>
                    <p>每消耗1张激活码增加<span class="g"><?=$subsidy['SingleActiveCodeCanSupportCount']?></span>点呼声</p>
                </div>
            </div>
            <div class="intr_info">
                <p>每单付款时补贴</p>
                <p class="big"><em >600</em>元</p>
            </div>
            <div class="voice">
                <div class="percent" style="width:<?php echo round( (1 - $subsidy['TotalCount']/$subsidy['NeedCount']) * 100 , 2) . "%"; ?>"></div>
                <?php if( $subsidy['TotalCount'] < $subsidy['NeedCount'] ): ?>
                <span>还差<?=$subsidy['NeedCount'] - $subsidy['TotalCount']?>点呼声</span>
                <?php endif; ?>
            </div>
        </div>
        <div class="subsidy_r">
            <?php if( $is_login && $subsidy['IsAlreaySupportCount'] > 0 && $subsidy['IsAlreaySupportCountWithActiveCode'] > 0): ?>
            <div class="need_al">
                已经申请
            </div>
            <?php else: ?>
            <div class="need">
                我要补贴
            </div>
            <?php endif; ?>
        </div>
    </div>
    <?php else: ?>
    <!--有补贴-->
    <div class="subsidy">
        <div class="subsidy_s">
            <div class="swiper-wrapper">
                <?php foreach($subsidy['SubsidyInfos'] as $key=>$item): ?>
                <div class="swiper-slides">
                    <?php if($item['IsBuy'] > 0):?>
                        <div class="no_subsidy sold">
                            <div class="subsidy_l">
                                <div class="intr">
                                    <p class="intr_h">第<?php echo ++$key; ?>份补贴(<span class="g"><?=$item['BasicValue']?></span>元基础补贴)<br />
                                        另有<span class="g"><?=$item['ExtraValue']?></span>元额外补贴</p>
                                    <div class="intr_f">
                                        <p>补贴抢购已结束</p>
                                    </div>
                                </div>
                                <div class="intr_info">
                                    <p>每单付款时补贴</p>
                                    <p class="big"><em ><?=$item['Value']?></em>元</p>
                                </div>
                            </div>
                        </div>
                    <?php else: ?>
                        <div class="no_subsidy">
                            <div class="subsidy_l">
                                <div class="intr">
                                    <p class="intr_h">第<?php echo ++$key; ?>份补贴(<span class="g"><?=$item['BasicValue']?></span>元基础补贴)<br />
                                      另有<span class="g"><?=$item['ExtraValue']?></span>元额外补贴</p>
                                    <div class="intr_f">
                                        <p>暂无业主获得,<a href="#">快来抢>></a></p>
                                    </div>
                                </div>
                                <div class="intr_info">
                                    <p>每单付款时补贴</p>
                                    <p class="big"><em ><?=$item['Value']?></em>元</p>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
                <?php endforeach; ?>

                <div class="swiper-slides">
                    <div class="no_subsidy">
                        <div class="subsidy_r">
                            <p><?php echo date('m')?>月补贴</p>
                            <div class="num">
                                共<?php echo count($subsidy['SubsidyInfos']);?>份
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>
</section>
<section>
    <ul class="nav">
        <li><a href="javascript:;"><div class="icon_sp"></div>店铺商品</a></li>
        <li><a href="javascript:;"><div class="icon_hd"></div>店铺活动</a></li>
        <li><a href="javascript:;"><div class="icon_wt"></div>店铺微推</a></li>
        <li><a href="javascript:;"><div class="icon_yh"></div>店铺优惠券</a></li>
    </ul>
</section>
<section>
    <ul class="item">
        <?php foreach($subsidy['DiscountActiveCodeInfos']['DiscountActiveCodeGroupDetailInfo'] as $key=>$item): ?>
        <?php $key = 3 * ($key + 1); ?>
        <?php if($item['LeftCount'] < 1):?>
        <li>
            <p><em class="c"><?=$key-2?>折~<?=$key?>折激活码售罄</em></p>
            <p>折~<?=$key?>折<em class="f">激活码</em>(共<?=$item['TotalCount']?>张)</p>
            <a class="sold" onclick="return false;">售罄</a>
        </li>
        <?php elseif($item['NextAvailable'] != 0):?>
        <li>
            <p><em class="g"><?=$item['NextAvailable'];?></em><em class="c">后 可购买<?=$item['LeftCount']?>张</em><em class="f"><?=$item['Discount']?>折码</em></p>
            <p>折~<?=$key?>折<em class="f">激活码</em>(共<?=$item['TotalCount']?>张)</p>
            <a href="#" class="sold">购买</a>
        </li>
        <?php else:?>
        <li>
            <p><em class="g">当前可购买<?=$item['LeftCount']?>张</em><em class="g">。  快去抢！</em></p>
            <p>折~<?=$key?>折<em class="f">激活码</em>(共<?=$item['TotalCount']?>张)</p>
            <a href="#" class="buy">购买</a>
        </li>
        <?php endif;?>
        <?php endforeach; ?>
    </ul>
</section>
<section>
    <div class="stroll">
        <?php if($discuss['RecordCount'] > 0): ?>
        <div class="group">
            <?php if(sizeof($discuss['Tags']) < 1): ?>
            <span>适合小户型</span><span>质量好</span><span>适合小户型</span>
            <?php else:?>
            <?php foreach($discuss['Tags'] as $tag):?>
            <span><?=$tag?></span>
            <?php endforeach; ?>
            <?php endif; ?>
        </div>
        <?php endif; ?>
        逛店口碑
    </div>
    <div class="tab">
        <?php if($discuss['RecordCount'] < 1): ?>
            <div class="no_p">暂无逛店口碑</div>
        <?php else: ?>
        <div class="swiper-container stroll_nav">
            <div class="swiper-wrapper">
                <?php foreach($discuss['TuGouDiscussInfoList'] as $item): ?>
                <div class="swiper-slide">
                    <div class="str_h">
                        <div class="star">
                            <?php for($i=0;$i<$item['Level'];$i++){?>
                            <span class="light"></span>
                            <?php } ?>
                            <?php for($i=5;$i>$item['Level'];$i--){?>
                            <span></span>
                            <?php } ?>
                        </div>
                        <div class="time">
                            <?php echo date('y-m-d H:i:s', substr($item['CreateAt'], 6, 10));?>
                        </div>
                    </div>
                    <div class="str_c">
                        <p class="ping">评：<?php echo show_replay_text($item['GoodsName'], 25);?></p>
                        <div class="pic_group">
                            <?php foreach($item['DiscussImages'] as $key=>$image): ?>
                            <?php if ($key > 3) : ?>
                            <?php continue; ?>
                            <?php endif; ?>
                            <img src="<?=$image?>" alt="" />
                            <?php endforeach; ?>
                        </div>
                        <div class="pl">
                           <?php echo show_replay_text(trim($item['Content']), 100); ?>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
            <div class="swiper-pagination kb_small"></div>
        </div>
        <div class="more">
            <a href="<?php echo site_url('shop/discuss/'. $info['Id'])?>">查看全部逛店口碑</a>
        </div>
        <?php endif; ?>
    </div>
</section>
<section>
    <div class="stroll sale">
        <?php if($koubei['RecordCount'] > 0): ?>
        <div class="group">
            <span>适合小户型</span><span>质量好</span><span>适合小户型</span>
        </div>
        <?php endif; ?>
        成交口碑
    </div>
    <div class="tab sales">
        <?php if($koubei['RecordCount'] < 1): ?>
            <div class="no_p">暂无成交口碑</div>
        <?php else: ?>
        <?php foreach($koubei['DealKouBeiInfoList'] as $item): ?>
        <div class="swiper-container">
            <div class="str_c">
                <div class="goods">
                    <div class="goods_l">
                        <img src="<?php echo isset($item['RelatedGoodsImageUrl']) ? $item['RelatedGoodsImageUrl'] : '/public/images/loading.png'; ?>" alt="" />
                    </div>
                    <div class="goods_r">
                        <p><?=$item['RelatedGoodsName']?></p>
                        <p><span>逛店口碑(<?=$item['DiscussCount']?>)</span><span>成交口碑(<?=$item['DealKoubeiCount']?>)</span></p>
                    </div>
                </div>
				<div class="pl_h">
                    <?=$item['Title']?>
        		</div>
                <div class="pic_group">
                    <?php foreach($item['Paragraphs'] as $key=>$paragraph): ?>
                    <?php if($key < 4):?>
                    <img src="<?=$paragraph['ImageUrl']?>" alt="" />
                    <?php endif;?>
                    <?php endforeach; ?>
                </div>
				 <div class="pl">
                    <?=$item['Paragraphs'][0]['Content']?>
                </div>
            </div>
            <div class="str_h">
                <div class="star">
                    <?=$item['CreateUserBuildingName']?>
                </div>
                <div class="time">
                    <?php echo date('y-m-d H:i:s', substr($item['CreateAt'], 6, 10))?>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
     <div class="more kb_more">
        <a href="<?php echo site_url('shop/koubei/'. $info['Id'])?>">查看全部成交口碑</a>
    </div>
    <?php endif; ?>
</section>
<div class="model">
    <div class="main">
        <p>补贴的呼声达到</br><span class="f">600</span>点  店铺必出补贴</p>
        <div class="btn_group">
            <?php if($subsidy['IsAlreaySupportCount'] < 1 ): ?>
                <a href="" onclick="addCalling(<?=$info['Id']?>, <?=$userid?>, 2)">冻结1张激活码 助200点呼声</a>
            <?php else: ?>
                <a class="disable" onclick="return false;">冻结1张激活码 助200点呼声</a>
            <?php endif; ?>
            <?php if($subsidy['IsAlreaySupportCountWithActiveCode'] < 1): ?>
                <a href="" onclick="addCalling(<?=$info['Id']?>, <?=$userid?>, 1)">小手一抖  助2点呼声</a>
            <?php else: ?>
                <a class="disable">小手一抖  助2点呼声</a>
            <?php endif; ?>
        </div>
    </div>
</div>
<script>
    function addCalling(shopid, userid, type){
        $.ajax({
            type: 'POST',
            url: "/shop/addCalling/" + shopid + "/" + userid + "/" + type,

            success: function(data){
                if (false == data.success || false == data.IsSucceed) {
                    alert(data.error);
                } else {
                    window.location.href = '/';
                }
            },
            error : function() {
                alert("网络异常");
                window.location.href = "/";
            },
            dataType:"json",
        })
    }
</script>
</body>
</html>
