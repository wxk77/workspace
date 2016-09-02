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

window.onload=function(){
	var oNav=document.getElementById("nav");
	var oList=oNav.children;
	var oSec=document.querySelectorAll("section");
	var f= 1,s=1;

	for(var i=0;i<oList.length;i++){
		oList[i].index=i;
		oList[i].onclick=function(){
			for(var i=0;i<oList.length;i++){
				oList[i].className="list";
				oSec[i].style.display="none";
			}
			this.className="list active";
			oSec[this.index].style.display="block";

			if(oList[1].className=="list active" && f==1){
				f=2;
				getData(tugou_id,1);
			}
			if(oList[2].className=="list active" && s==1){
				s=2;
				getData2(tugou_id,1);
			}
		}
	}
}
$(function(){
		var num=$("#huifu").text();
		if(num==0){

			$(".rep_img-showhide").css("display","none");
		}else{
			$(".rep_img-showhide").css("display","block");
		}
	//展开和隐藏图片
	$(".rep_img-showhide").click(function(){
		var src_all=$(this).children("img").attr("src");
		var src_temp = src_all.split(".");
		var src= src_temp[0];
		if(src=="/public/images/rep_img_show"){
			$(this).children("img").attr("src","/public/images/rep_img_hide.png");
			$(".rep_img").css("display","none");
		}else{
			$(this).children("img").attr("src","/public/images/rep_img_show.png");
			$(".rep_img").css("display","block");
		}
	});


	//切换调用
	$("#thelist").on("click",".switch2",function(e){
		$(this).parent(".two").parent(".rep_nav").children(".one").css(moveForward($(this).parent(".two"), e)).stop(true, true).animate({"left":0, "top":0}, 600);
	});
	$("#thelist").on("click",".switch",function(e){
		$(this).parent(".one").animate(moveForward($(this).parent(".one").parent(".rep_nav").children(".two"), e), 600);
	});

});

//切换
var moveForward = function(elem, e){
	var w = elem.width(), h = elem.height(), direction=0, cssprop={};
	cssprop.left = "-100%";
	cssprop.top = 0;
	return cssprop;
}


//上拉加载，下拉刷新
var myScroll, pullDownEl, pullDownOffset, pullUpEl, pullUpOffset;
var index=1;
 
 
function getData(tugou_id, index){
	var oList=document.getElementById("thelist");
	$.ajax({
		type:"post",
		data:{
			tugopu_id:tugou_id,
			index:index
		},
		url:"/tugou/replyList/" + tugou_id+ "/" +index,
		async:true,
		dataType:"json",
		success:function(data){
			for(var i=0;i<data.length;i++){
				var odiv=document.createElement("li");
				odiv.innerHTML='<div class="rep_img"><img src=" ' + data[i].GImage + ' " /><img src="/public/images/accept.png" id="accept" /></div>' +
					'<div class="rep_nav"><div class="one"><ul class="rep-ulone">' +
					'<li><a href="#"><img src="/public/images/map.png" /><span>导航</span></a></li>' +
					'<li><a href="#"><img src="/public/images/tel.png" /><span>电话</span></a></li>' +
					'<li><a href="#"><img src="/public/images/mail.png" /><span>寻聊</span></a></li></ul>' +
					'<a href="#" class="switch"><img src="/public/images/delete.png" /></a></div>' +
					'<div class="two"><ul class="rep_ultwo">' +
					'<li><a href="#"><img src=" ' + data[i].SImage + ' "  class="huifu-img" /></a></li>' +
					'<li style="width:7.5rem;"><a href="#"><span style="width:4.9rem; overflow: hidden;"><label> ' + data[i].GName + ' </label><label> ' + data[i].SName + ' </label></span>' +
					'<img src="/public/images/huifu-mail.png" class="huifu-mail" style="display:none;" />' +
					'<p class="huifu-bi"><img src="/public/images/huifu-bi.png" /><span>比图</span></p></a></li></ul>' +
					'<a href="#" class="switch2"><img src="/public/images/back.png" /></a><img src="/public/images/accept2.png" class="accept2" /></div></div>';;
				oList.appendChild(odiv);
			}
			s=false;
		},
		error:function(){
			console.log("error");
		}
	});
}
 
/**
 * 下拉刷新 （自定义实现此方法）
 * myScroll.refresh(); 数据加载完成后，调用界面更新方法
 */
function pullDownAction () {
		index=1;
		$("#thelist").html("").append('<a href="#" class="rep_img-showhide"><img src="/public/images/rep_img_show.png" /></a>');
		getData(tugou_id,1);
		myScroll.refresh();     //数据加载完成后，调用界面更新方法
}
/**
 * 滚动翻页 （自定义实现此方法）
 */
function pullUpAction () {
		index++;
		if(index > total_reply){
			myScroll.refresh();     //数据加载完成后，调用界面更新方法
			return;
		}else{
			getData(tugou_id,index);
			myScroll.refresh();     //数据加载完成后，调用界面更新方法
		}

}
 
/**
 * 初始化iScroll控件
 */
function loaded() {
    pullDownEl = document.getElementById('pullDown');
    pullDownOffset = pullDownEl.offsetHeight;
    pullUpEl = document.getElementById('pullUp');  
    pullUpOffset = pullUpEl.offsetHeight;
     
    myScroll = new iScroll('wrapper', {
        scrollbarClass: 'myScrollbar',
        useTransition: false,
        topOffset: pullDownOffset,
        onRefresh: function () {
            if (pullDownEl.className.match('loading')) {
                pullDownEl.className = '';
                pullDownEl.querySelector('.pullDownLabel').innerHTML = '';
            } else if (pullUpEl.className.match('loading')) {
                pullUpEl.className = '';
                pullUpEl.querySelector('.pullUpLabel').innerHTML = '';
            }
        },
        onScrollMove: function () {
            if (this.y > 5 && !pullDownEl.className.match('flip')) {
                pullDownEl.className = 'flip';
                pullDownEl.querySelector('.pullDownLabel').innerHTML = '释放即可刷新...';
                this.minScrollY = 0;
            } else if (this.y < 5 && pullDownEl.className.match('flip')) {
                pullDownEl.className = '';
                pullDownEl.querySelector('.pullDownLabel').innerHTML = '下拉刷新...';
                this.minScrollY = -pullDownOffset;
            } else if (this.y < (this.maxScrollY - 5) && !pullUpEl.className.match('flip')) {
                pullUpEl.className = 'flip';
                pullUpEl.querySelector('.pullUpLabel').innerHTML = '释放即可加载更多...';
                this.maxScrollY = this.maxScrollY;
            } else if (this.y > (this.maxScrollY + 5) && pullUpEl.className.match('flip')) {
                pullUpEl.className = '';
                pullUpEl.querySelector('.pullUpLabel').innerHTML = '上拉加载更多...';
                this.maxScrollY = pullUpOffset;
            }
        },
        onScrollEnd: function () {
            if (pullDownEl.className.match('flip')) {
                pullDownEl.className = 'loading';
                pullDownEl.querySelector('.pullDownLabel').innerHTML = '<div class="load"><img src="/public/images/1_1_00009.gif"/></div>加载中...';
                pullDownAction();   // ajax call
            } else if (pullUpEl.className.match('flip')) {
                pullUpEl.className = 'loading';
                pullUpEl.querySelector('.pullUpLabel').innerHTML = '<div class="load"><img src="/public/images/1_1_00009.gif"/></div>加载中...';               
                pullUpAction(); // ajax call
            }
        }
    });
     
//  setTimeout(function () { document.getElementById('wrapper').style.left = '0'; }, 800);
}
 
//初始化绑定iScroll控件
document.addEventListener('touchmove', function (e) { e.preventDefault(); }, false);
document.addEventListener('DOMContentLoaded', loaded, false);



//上拉加载，下拉刷新2
var myScroll2, pullDownEl2, pullDownOffset2, pullUpEl2, pullUpOffset2;
var index2=1;
 
 

//获取数据2

function getData2(tugou_id,index){
	var oList=document.getElementById("thelist2");
	$.ajax({
		type:"post",
		data:{
			tugou_id:tugou_id,
			index:index
		},
		url:"/tugou/discuss/" + tugou_id+ "/" +index,
		async:true,
		dataType:"json",
		success:function(data){
			//console.log(data);
			for(var i=0;i<data.length;i++){
				var oLi=document.createElement("div");
				oLi.className="tab";
				var stars = getStars(data[i].Level);
				var images = getDiscussImages(data[i].DiscussImages);
				oLi.innerHTML='<div class="swiper-container stroll_nav"><div class="swiper-wrapper"><div class="swiper-slide"><div class="str_h"><div class="star">' +
					stars + '</div><div class="time">' + data[i].CreateAt + '</div></div><div class="str_c"><p class="ping">评：' + data[i].GoodsName +
					'</p><div class="pic_group">' + images +
					'</div><div class="pl">' + data[i].Content +
					'</div></div></div></div></div>';

				oList.appendChild(oLi);
			}
		},
		error:function(){
			console.log("error");
		}
	});
}


/**
 * 下拉刷新 （自定义实现此方法）
 * myScroll.refresh(); 数据加载完成后，调用界面更新方法
 */
function pullDownAction2 () {
		index2=1;
		document.querySelector("#thelist2").innerHTML="";
		getData2(tugou_id,1);
		myScroll2.refresh();     //数据加载完成后，调用界面更新方法
}
/**
 * 滚动翻页 （自定义实现此方法）
 */
function pullUpAction2 () {
		index2++;
	    if(index2 > total_discuss){
			myScroll2.refresh();     //数据加载完成后，调用界面更新方法
			return;
		}else{
			getData2(tugou_id,index2);
			myScroll2.refresh();     //数据加载完成后，调用界面更新方法
		}

}

/**
 * 初始化iScroll控件
 */
function loaded2() {
    pullDownEl2 = document.getElementById('pullDown2');
    pullDownOffset2 = pullDownEl2.offsetHeight;
    pullUpEl2 = document.getElementById('pullUp2');  
    pullUpOffset2 = pullUpEl2.offsetHeight;
     
    myScroll2 = new iScroll('wrapper2', {
        scrollbarClass: 'myScrollbar2',
        useTransition: false,
        topOffset: pullDownOffset2,
        onRefresh: function () {
            if (pullDownEl2.className.match('loading')) {
                pullDownEl2.className = '';
                pullDownEl2.querySelector('.pullDownLabel').innerHTML = '';
            } else if (pullUpEl2.className.match('loading')) {
                pullUpEl2.className = '';
                pullUpEl2.querySelector('.pullUpLabel').innerHTML = '';
            }
        },
        onScrollMove: function () {
            if (this.y > 5 && !pullDownEl2.className.match('flip')) {
                pullDownEl2.className = 'flip';
                pullDownEl2.querySelector('.pullDownLabel').innerHTML = '释放即可刷新...';
                this.minScrollY = 0;
            } else if (this.y < 5 && pullDownEl.className.match('flip')) {
                pullDownEl2.className = '';
                pullDownEl2.querySelector('.pullDownLabel').innerHTML = '下拉刷新...';
                this.minScrollY = -pullDownOffset;
            } else if (this.y < (this.maxScrollY - 5) && !pullUpEl2.className.match('flip')) {
                pullUpEl2.className = 'flip';
                pullUpEl2.querySelector('.pullUpLabel').innerHTML = '释放即可加载更多...';
                this.maxScrollY = this.maxScrollY;
            } else if (this.y > (this.maxScrollY + 5) && pullUpEl2.className.match('flip')) {
                pullUpEl2.className = '';
                pullUpEl2.querySelector('.pullUpLabel').innerHTML = '上拉加载更多...';
                this.maxScrollY = pullUpOffset2;
            }
        },
        onScrollEnd: function () {
            if (pullDownEl2.className.match('flip')) {
                pullDownEl2.className = 'loading';
                pullDownEl2.querySelector('.pullDownLabel').innerHTML = '<div class="load"><img src="/public/images/1_1_00009.gif"/></div>加载中...';
                pullDownAction2();   // ajax call
            } else if (pullUpEl2.className.match('flip')) {
                pullUpEl2.className = 'loading';
                pullUpEl2.querySelector('.pullUpLabel').innerHTML = '<div class="load"><img src="/public/images/1_1_00009.gif"/></div>加载中...';               
                pullUpAction2(); // ajax call
            }
        }
    });
     
//  setTimeout(function () { document.getElementById('wrapper').style.left = '0'; }, 800);
}
 
//初始化绑定iScroll控件
//document.addEventListener('touchmove', function (e) { e.preventDefault(); }, false);
document.addEventListener('DOMContentLoaded', loaded2, false);

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

function getDiscussImages(data) {
	var string = '';
	for (var i = 0; i < data.length; i++) {
		if (i > 3) break;
		string += '<img src="' + data[i] + '" alt="" />';
	}
	return string;
}