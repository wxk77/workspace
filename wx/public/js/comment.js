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
	var aItems=document.getElementsByClassName("items");
	var aMain=document.getElementsByClassName("main");
	for(var i=0;i<aItems.length;i++){
		aItems[i].index=i;
		aItems[i].onclick=function(){
			for(var i=0;i<aItems.length;i++){
				aItems[i].className="items";
				aMain[i].className="main";
			}
			this.className="items active";
			aMain[this.index].className="main current";
		}
	}
	var oReply=document.getElementsByClassName("reply")[0];
	var aBtn=document.getElementsByClassName("rep_btn");
	var replyBtn=document.getElementById("return");
	var oTxt=document.getElementById("txt");
	var oModel=document.querySelector(".model");
	for(var i=0;i<aBtn.length;i++){
		aBtn[i].addEventListener("touchstart",function(){
			oModel.className="model show";
			
//			oReply.style.display="block";
//			oTxt.focus();
//			var s=window.screen.height;
//			console.log(s);
//			oReply.style.top=(s/rem-2.5)+"rem";
		},false)
	}
	oModel.addEventListener("touchstart",function(ev){
		var oSrc=ev.target||ev.srcElement;
		if(oSrc.className=="show_btn"){
			oReply.className="reply show";
			oTxt.focus();
		}
		oModel.className="model";
	},false)
	replyBtn.addEventListener("click",function(){
		oReply.className="reply";
		oTxt.value="";
		
	},false)
//	
}
