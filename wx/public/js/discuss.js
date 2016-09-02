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
    var index=1;
    getData(shopid, 1);
    function getData(shopid, index){
        $.ajax({
            type:"post",
            data:{
                shopid : shopid,
                index  : index
            },
            url:"/shop/discussSearch/" + shopid + "/" +index,
            async:true,
            dataType:"json",
            success:function(data){
                for(var i=0;i<data.length;i++){
                    var oLi=document.createElement("section");
                    //oLi.className="items";
                    var stars = getStars(data[i].Level);
                    var images = getDiscussImages(data[i].DiscussImages);
                    oLi.innerHTML='<div class="tab"><div class="swiper-container stroll_nav"><div class="swiper-wrapper"><div class="swiper-slide"><div class="str_h"><div class="star">' +
                        stars + '</div><div class="time">' + data[i].CreateAt + '</div></div><div class="str_c"><p class="ping">评：' + data[i].GoodsName +
                        '</p><div class="pic_group">' + images +
                        '</div><div class="pl">' + data[i].Content +
                        '</div></div></div></div></div></div>';
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
function getStars(data)
{
    var string = "";
    for($i=0;$i<data;$i++) {
        string+= '<span class="light"></span>';
    }
    for($i=5;$i>data;$i--){
        string+= '<span></span>';
    }
    return string;
}

function getDiscussImages(data){
    var string = '';
    for(var i=0;i<data.length;i++){
        if(i>3) break;
        string += '<img src="' + data[i] + '" alt="" />';
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
