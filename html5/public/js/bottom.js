// JavaScript Document

$(function(){
	
		
		window.onscroll=function(){
			var s=document.body.scrollTop;
			if(s>=1000){  
				$(".backtop").css("display","block");
			  }else if(s<1000){
				  $(".backtop").css("display","none");
			  }
			
			
		}
		
});
