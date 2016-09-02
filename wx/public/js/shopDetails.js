var rem=20;
function resizeRem(){
	rem=20/320*document.documentElement.clientWidth;
	document.documentElement.style.fontSize=rem+"px";
}
document.addEventListener("DOMContentLoaded",function(){
	resizeRem();
},false);
window.onresize=function(){
	resizeRem();
};

$(function(){
	
	//轮播图部分
	var mySwiper = new Swiper('.head_banner', {
		direction: 'horizontal',
		loop: true,
		pagination: '.small',
		autoplay: 2500,
		autoplayDisableOnInteraction: false
	});
	var mySwiper1 = new Swiper('.stroll_nav', {
		direction: 'horizontal',
		loop: true,
		pagination: '.kb_small',
		autoplay: 2500
	});
	var oBox = document.querySelector(".subsidy_s");
	if(oBox != null){
		var oSwiper = oBox.children[0];
		var oDiv = oSwiper.children;
		var w = 0;
		for(var i = 0; i < oDiv.length; i++){
			var s = oDiv[i].offsetWidth / rem + 2.5;
//  	console.log(s);
			w += s;
		}
		w = w - 1.85;
		oSwiper.style.width = w + "rem";
		drag(oSwiper);
	}

	function drag(obj){
		obj.addEventListener("touchstart", function(ev){
			var disX = ev.targetTouches[0].pageX - obj.offsetLeft;
//			var disY=ev.targetTouches[0].pageY-obj.offsetTop;

			function fnMove(ev){
				var x = ev.targetTouches[0].pageX - disX;
				if(x >= 0) x = 0;
				if(x <= -w * rem + oBox.offsetWidth) x = -w * rem + oBox.offsetWidth;
//				console.log(x);
				obj.style.left = x / rem + "rem";
//				obj.style.top=ev.targetTouches[0].pageY-disY+"px";
			}

			function fnEnd(){
				obj.removeEventListener("touchmove", fnMove, false);
//				obj.removeEventListener("touchend",fnEnd,false);
			}

			obj.addEventListener("touchmove", fnMove, false);

			obj.addEventListener("touchend", fnEnd, false);

			//ev.preventDefault();
		}, false)

	}

	// 弹窗
	$(".need").click(function(){
		if(!is_login){
			window.location.href = "/user/login";
		} else {
			$(".model").show();
		}
	});
	$(".model").click(function(ev){
		var oSrc = ev.target || ev.srcElement;
		if(oSrc.className == "model" || oSrc.tagName == "A");
		$(".model").hide();
		$(".need").addClass("need_al");
	});

	// 收藏按钮点击事件
	$("#favor").click(function(){

		if ( ! is_login ) {
			window.location.href = "/user/login";
		} else if ( ! is_favor ) {
			$.ajax({
				type : "POST",
				url	 : "/user/createFavor/" + shopid,
				success : function(data){
					if ( false == data.success ) {
						$(".textview").html(data.error).show();
						window.setTimeout( function(){ $(".textview").hide("slow") }, 2000 );
					} else {
						is_favor = true;
						$("#favorPNG").attr("src", "/public/images/shoucang2.png");
						$(".textview").html("收藏成功").show();
						window.setTimeout( function(){ $(".textview").hide("slow") }, 2000 );
					}

				},
				error : function(){
					$(".textview").html("网络异常").show();
					window.setTimeout( function(){ $(".textview").hide("slow") }, 2000 );
					window.location.href = "/";
				},
				dataType : "json"
			})

		} else {
			$.ajax({
				type : "POST",
				url	 : "/user/cancelFavor/" + shopid,
				success : function(data){
					if (false == data.success || false == data.body.IsSuccess) {
						$(".textview").html(data.error).show();
						window.setTimeout( function(){ $(".textview").hide("slow") }, 2000 );
					} else {
						is_favor = false;
						$("#favorPNG").attr("src", "/public/images/shoucang.png");
						$(".textview").html("取消收藏").show();
						window.setTimeout( function(){ $(".textview").hide("slow") }, 1500 );
					}
				},
				error : function(){
					$(".textview").html("网络异常").show();
					window.setTimeout( function(){ $(".textview").hide("slow") }, 1500 );
					window.location.href = "/";
				},
				dataType : "json"
			})
		}
		return false;
	});

	// 逛店口碑点击事件
	$("#current .swiper-slide").click(function(){
		var shop_name = $(this).find(".shopname").html();
		var tougou_id = $(this).find(".tugouid").html();
		var comment_stars = $(this).children().children().html();
		var comment_images = $(this).find(".str_c > .pic_group").html();
		var comment_content = $(this).find(".str_c > .pl").html();

		var cookietime = new Date();
		cookietime.setTime(cookietime.getTime() + (60 * 60 * 1000));//coockie保存一小时

		$.cookie('stars', comment_stars, { path : "/", expires : cookietime });
		$.cookie('images', comment_images, { path : "/", expires : cookietime });
		$.cookie('content', comment_content, { path : "/", expires : cookietime });
		$.cookie('shopname', shop_name, { path : "/", expires : cookietime });
		$.cookie('tugouid', tougou_id, { path : "/", expires : cookietime });

		window.location.href = '/shop/comment';
	});

	$("div.goods").click(function(){
		console.log($(this).html());
	});

	$("#subsidy").on("click",".swiper-slides",function(){
		window.location.href = '/subsidy/detail/' + $(this).data("id");
	});

	// 成交口碑点击事件
	$("div.simple").click(function(){
		var title = $(this).find(".pl_h").html();
		var content = $(this).find(".pl").html();
		var images = $(this).find(".pic_group").html();
		var building =  $(this).parent().next(".str_h").find(".star").html();
		var createtime =  $(this).parent().next(".str_h").find(".time").html();


		var cookietime = new Date();
		cookietime.setTime(cookietime.getTime() + (60 * 60 * 1000));//coockie保存一小时

		$.cookie('title', title, { path : "/", expires : cookietime });
		$.cookie('images', images, { path : "/", expires : cookietime });
		$.cookie('content', content, { path : "/", expires : cookietime });
		$.cookie('building', building, { path : "/", expires : cookietime });
		$.cookie('createtime', createtime, { path : "/", expires : cookietime });

		window.location.href = '/shop/knockdown';
	});


});