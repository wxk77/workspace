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
	var oName=document.getElementById("name");
	var oPhone=document.getElementById("phone");
	var oPro=document.getElementById("propose");
	var oBtn=document.getElementById("btn");

	var phoneReg=/^(\(86\))?[0]?((1[358][0-9]{9})|(147[0-9]{8})|(17[3678][\d]{8}))$/;
	oBtn.onclick=function(){
		if(oName.value==""){
			alert("请填写姓名");
			return false;
		}else if(oPhone.value==""){
			alert("请填写手机号");
			return false;
		}else if(!(phoneReg.test(oPhone.value))){
			alert("请填写正确的手机号");
			return false;
		}else if(oPro.value==""){
			alert("请填写您的意见或建议");
			return false;
		}else if(oPro.value.length<8){
			alert("意见或建议必须超过8个字");
			return false;
		}

	}

}
