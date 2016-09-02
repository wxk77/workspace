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

	for(var i=0;i<oList.length;i++){
		oList[i].index=i;
		oList[i].onclick=function(){

			for(var i=0;i<oList.length;i++){
				oList[i].className="list";
				oSec[i].style.display="none";
			}
			this.className="list active";
			oSec[this.index].style.display="block";
		}
	}
}

$(function(){

	//展开和隐藏图片
	$(".rep_img-showhide").click(function(){
		var src_all=$(this).children("img").attr("src");
		var src_temp = src_all.split(".");
		var src= src_temp[0];
		if(src=="images/rep_img_show"){
			$(this).children("img").attr("src","images/rep_img_hide.png");
			$(".rep_img").css("display","none");
		}else{
			$(this).children("img").attr("src","images/rep_img_show.png");
			$(".rep_img").css("display","block");
		}
	});


	//切换调用
	$(".switch2").click(function(e){
		$(this).parent(".two").parent(".rep_nav").children(".one").css(moveForward($(this).parent(".two"), e)).stop(true, true).animate({"left":0, "top":0}, 600);
	});
	$(".switch").click(function(e){
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