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
$(function(){
	
	//轮播图部分
	var mySwiper = new Swiper ('.head_banner', {
	    direction: 'horizontal',
	    loop: true,
	    pagination: '.small',
        autoplay: 2500,
        autoplayDisableOnInteraction: false
	})       
    var mySwiper1 = new Swiper ('.stroll_nav', {
	    direction: 'horizontal',
	    loop: true,
	    pagination: '.kb_small',
	     autoplay: 2500
	})       
    var oBox=document.querySelector(".subsidy_s");
    if (oBox != null) {
		var oSwiper=oBox.children[0];
		var oDiv=oSwiper.children;
		var w=0;
		for(var i=0;i<oDiv.length;i++){
			var s=oDiv[i].offsetWidth/rem+2.5;
//  	console.log(s);
			w+=s;
		}
		w=w-1.85;
		oSwiper.style.width=w+"rem";
		drag(oSwiper);
	}
    
    function drag(obj){
		obj.addEventListener("touchstart",function(ev){
			
			var disX=ev.targetTouches[0].pageX-obj.offsetLeft;
//			var disY=ev.targetTouches[0].pageY-obj.offsetTop;
			
			function fnMove(ev){
				var x=ev.targetTouches[0].pageX-disX;
				if(x>=0) x=0;
				if(x<=-w*rem+oBox.offsetWidth) x=-w*rem+oBox.offsetWidth;
//				console.log(x);
				obj.style.left=x/rem+"rem";
//				obj.style.top=ev.targetTouches[0].pageY-disY+"px";
			}
			function fnEnd(){
				obj.removeEventListener("touchmove",fnMove,false);
//				obj.removeEventListener("touchend",fnEnd,false);
			}

			obj.addEventListener("touchmove",fnMove,false);
			
			obj.addEventListener("touchend",fnEnd,false);
			
			ev.preventDefault();
		},false)

	}
    
    //弹窗
    $(".need").click(function(){
		if ( ! is_login ) {
			window.location.href = "/user/login";
		} else {
			$(".model").show();
		}
    })
    $(".model").click(function(ev){
    	var oSrc=ev.target||ev.srcElement;
    	console.log(oSrc)
    	if(oSrc.className=="model" || oSrc.tagName=="A");
    	$(".model").hide();
    	$(".need").addClass("need_al");
    })
})