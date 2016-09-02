window.onload=function(){
    var oLoading=document.querySelector(".loading");
    var oDiv=document.querySelector(".renovate");
    var oUl=document.getElementById("outbox");
    s=false;

    document.addEventListener("touchstart",function(){
        var clientH = document.documentElement.clientHeight;
        var bodyH = 0;
        var scrTop = 0;
        document.addEventListener("touchmove", function () {
            scrTop = document.documentElement.scrollTop || document.body.scrollTop;
            bodyH = document.documentElement.scrollHeight;

            if (index > total_page) {
                return;
            }
            if (scrTop + clientH >= bodyH) {
                oDiv.style.display = "block";
                //oDiv.style.height=scrTop+clientH-bodyH+"rem";
                oDiv.innerHTML = '释放即可加载更多！';
            } else if (scrTop <= 0) {
                //todo 下拉刷新
//					oLoading.style.display="block";
            }
        }, false);

        document.addEventListener("touchend", function () {
            if (scrTop + clientH >= bodyH) {
                if (!s) {
                    s = true;
                    index++;
                    if (index > total_page) {
                        $('.renovate').css("display", "none");
                        return;
                    } else {
                        oLoading.style.display = "block";
                        oDiv.style.height = "2rem";
                        oDiv.innerHTML = '<img src="/public/images/8.gif" alt="" />正在加载中！';
                        getData(shopid, index);
                    }

                }

            } else if (scrTop <= 0) {
                location.reload();
            }

        }, false)
    },false)

    //获取数据
    var index = 1;
    getData(shopid, 1);
    function getData(shopid, index){
        $.ajax({
            type:"post",
            data:{
                shopid:shopid,
                index:index
            },
            url:"/shop/koubeiSearch/" + shopid + "/" + index,
            async:true,
            dataType:"json",
            success:function(data){
                for(var i=0;i<data.length;i++){
                    var oLi=document.createElement("section");
                    var image = data[i].RelatedGoodsImageUrl !== undefined ? data[i].RelatedGoodsImageUrl : '/public/images/loading.png';
                    var images = getKoubeiImages(data[i].Paragraphs);
                    oLi.innerHTML='<div class="tab sales"><div class="swiper-container"><div class="str_c"><div class="goods"><div class="goods_l">'
                    + '<img src="'+ image +'" alt="" />' + '</div><div class="goods_r"><p>'
                    + data[i].RelatedGoodsName+'</p>' + '<p><span>逛店口碑('+ data[i].DiscussCount + ')</span><span>成交口碑('+ data[i].DealKoubeiCount +')</span></p></div></div>'
                    + '<p class="ping">'+ data[i].Title +'</p><div class="pic_group">' + images + '</div><div class="pl">' +
                    data[i].Paragraphs[0].Content + '</div></div><div class="str_h"><div class="star">' +
                    data[i].CreateUserBuildingName + '</div><div class="time">16-06-10  15:32:51</div></div></div></div>';
                    oUl.appendChild(oLi);
                    oLoading.style.display=oDiv.style.display="none";
                }
                s=false;
            },
            error:function(){
                console.log("error");
            }
        });
    }
}
function getKoubeiImages(data)
{
    var string = "";
    for(var i=0;i<data.length;i++){
        string+= '<img src="' + data[i].ImageUrl + '" alt="" />';
    }
    return string;
}

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


