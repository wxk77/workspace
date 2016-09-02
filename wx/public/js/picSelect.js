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
	var index = 1;
	var oUl=document.querySelector(".list")
	var oLoading=document.querySelector(".loading");
	var oDiv=document.querySelector(".renovate");
	s=false;

	document.addEventListener("touchstart",function(){
		var clientH = document.documentElement.clientHeight;
		var bodyH = 0;
		var scrTop = 0;
		document.addEventListener("touchmove", function () {
			scrTop = document.documentElement.scrollTop || document.body.scrollTop;
			bodyH = document.documentElement.scrollHeight;

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
				oLoading.style.display = "block";
				oDiv.style.height = "2rem";
				oDiv.innerHTML = '<img src="/public/images/8.gif" alt="" />正在加载中！';
				if (!s) {
					s = true;
					index++;
					if (index > total_page) return;
					getData(index);
				}

			} else if (scrTop <= 0) {
				oLoading.style.display = "block";
				if (!s) {
					s = true;
					oUl.innerHTML = "";
					index = 1;
					getData(index);
				}
			}

		}, false)
	},false)

	//获取数据
	getData(1);
	function getData(index){
		$.ajax({
			type:"post",
			data:{
				index:index
			},
			url:"/tugou/search/" + index,
			async:true,
			dataType:"json",
			success:function(data){
				for(var i=0;i<data.length;i++){
					var oLi=document.createElement("li");
					oLi.className="items";
					oLi.innerHTML='<a href="/tugou/detail/'+ data[i].TGId +'" class="pic"><img src="'+data[i].ImageUrl+'" alt="" />' +
						'<div class="to_tip">'+data[i].ReplyCount+'</div> </a> <div class="intro"> ' +
						'<div class="reply">已回复 </div><div class="name">'+data[i].FuncName+'&nbsp;>&nbsp;'+data[i].GName+'</div>' +
						'<div class="intro_b"><div class="time">'+ data[i].CreateAt +'</div><div class="place">'+data[i].CityName+'·'+data[i].BName+'</div></div></div>';
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
