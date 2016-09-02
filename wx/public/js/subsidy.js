/**
 * Created by yangkewei on 2016/6/23.
 */
if (/Android (\d+\.\d+)/.test(navigator.userAgent)) {
    var version = parseFloat(RegExp.$1);
    if (version > 2.3) {
        var phoneScale = parseInt(window.screen.width) / 640;
        document.write('<meta name="viewport" content="width=640, minimum-scale = ' + phoneScale + ', maximum-scale = ' + phoneScale + ', target-densitydpi=device-dpi">');
    } else {
        document.write('<meta name="viewport" content="width=640, target-densitydpi=device-dpi">');
    }
} else {
    document.write('<meta name="viewport" content="width=640, user-scalable=no, target-densitydpi=device-dpi">');
}


$(function () {
    //去掉广告
    $(".clear").click(function () {
        $("#clear").css("display", "none");
    });


});

//resizerem
var rem=20;
var jumpHref=null;

function displayDialog(n,m,href){
    jumpHref=href;
    if(n!=1){
        $(".model").show();
        return false;
    }

}


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


window.onload = function () {
    $("#cancel").click(function(){
        $(".model").hide();
    });
    $("#enter").click(function(){
        window.location.href="/subsidy/detail/"+jumpHref;
    });

    var index = 1;
    var oUl=document.querySelector(".list")
    var oLoading=document.querySelector(".loading");
    var oDiv=document.querySelector(".renovate");
    s=false;

    document.addEventListener("touchstart",function(){
            var clientH=document.documentElement.clientHeight;
            var bodyH=0;
            var scrTop=0;
            document.addEventListener("touchmove",function(){
                scrTop=document.documentElement.scrollTop||document.body.scrollTop;
                bodyH=document.documentElement.scrollHeight;

                if(scrTop+clientH>=bodyH && index < total_page){
                    console.log("111");
                    oDiv.style.display="block";
                    //oDiv.style.height=scrTop+clientH-bodyH+"rem";
                    oDiv.innerHTML='释放即可加载更多！';
                }else if(scrTop<=0){
                    //todo 下拉刷新
//					oLoading.style.display="block";
                }
            },false);

            document.addEventListener("touchend",function(){

                if(scrTop+clientH>=bodyH && index < total_page){
                    oLoading.style.display="block";
                    oDiv.style.height="2rem";
                    oDiv.innerHTML='<img src="/public/images/8.gif" alt="" />正在加载中！';
                    if(!s){
                        s=true;
                        index++;
                        getData(index);

                    }

                }else if(scrTop<=0){
                    //oLoading.style.display="block";
                    if(s){
                        s=true;
                        oUl.innerHTML="";
                        index=1;
                        getData(index);
                    }
                }

            },false)
    },false)

    //获取数据

    getData(1);
    function getData(index){
        $.ajax({
            type:"post",
            data:{
                index:index
            },
            url:"/subsidy/search/" + index,
            async:true,
            dataType:"json",
            success:function(data){
                for(var i=0;i<data.length;i++) {
                    var oLi = document.createElement("div");
                    var class_name = data[i].Value > 600 ? "red" : "blue";
                    oLi.className = "item";
                    var images = '</p><div class="icon">';
                    if (data[i].IsMCEnsure == 1) images += '<img src="/public/images/Order-subsidy/danbao.png" />';
                    if (data[i].IsShopEnsure == 1) images += '<img src="/public/images/Order-subsidy/chengnuo.png" />';
                    oLi.innerHTML = '<a href="/subsidy/detail/'+data[i].Id+'"  onclick="return displayDialog('+data[i].IsMCEnsure+','+data[i].IsShopEnsure+","+data[i].Id+')" >' +
                        '<div class="left"><p class="one">' + data[i].CityName + ' · ' + data[i].CityRegionName +
                        '<p class="two two-'+ class_name +'">' + data[i].ShopName + images +
                        '</div></div>' +
                        '<div class="right '+class_name+'"><p class="right-one">每单付款时补贴</p>' +
                        '<p class="right-two">' + data[i].Value + '<label>元</label></p></div>' +
                        '<div style="clear:both;"></div></div></a>';
                    oUl.appendChild(oLi);
                    oLoading.style.display = oDiv.style.display = "none";
                }
                s=false;
            },
            error:function(){
                console.log("error");
            }
        });
    }

}
