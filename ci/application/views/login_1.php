<html>
<head>
    <title>管理员登录</title>
    <meta charset="UTF-8">
</head>
<body>
<div>
    <form action="login/doLogin" method="post">
        <div>
             <input id="" name="username" type="text" placeholder="用户名" >
             <input id="" name="password" type="text" placeholder="密码" >
        </div>
        <div >
            <div >
                <input  type="text" placeholder="验证码" onblur="if(this.value=='') { this.value='验证码:' } " onclick="if(this.value=='验证码:') { this.value=''; } " value="验证码:" style="width:150px;" name='captcha'>
                <!-- <span onclick="var time = new Date().getTime();$('#capimg').attr('src','__CONTROLLER__/verifyCode/'+time);"> -->
                <!--  <img id='capimg' style="width:130px;height:40px" src="__CONTROLLER__/verifyCode"> -->
                <span id='capimg' onclick="changeimg()"><?php echo $image;?></span>
                <a id="kanbuq" onclick="changeimg()" href="javascript:;">看不清，换一张</a>
            </div>
        </div>
        <div>
            <input name="" type="submit"  value="&nbsp;登&nbsp;&nbsp;&nbsp;&nbsp;录&nbsp;">
            <input name="" type="reset"  value="&nbsp;取&nbsp;&nbsp;&nbsp;&nbsp;消&nbsp;">
            <input name="" type="reset"  value="&nbsp;注&nbsp;&nbsp;&nbsp;&nbsp;册&nbsp;">
        </div>
    </form>
</div>
<script type="text/javascript" src="/CodeIgniter/public/jquery-1.11.3.min.js"></script>
<script>
    var _hmt = _hmt || [];
    (function() {
        var hm = document.createElement("script");
        hm.src = "//hm.baidu.com/hm.js?080836300300be57b7f34f4b3e97d911";
        var s = document.getElementsByTagName("script")[0];
        s.parentNode.insertBefore(hm, s);
    })();
    var _bdhmProtocol = (("https:" == document.location.protocol) ? " https://" : " http://");
    document.write(unescape("%3Cscript src='" + _bdhmProtocol + "hm.baidu.com/h.js%3F080836300300be57b7f34f4b3e97d911' type='text/javascript'%3E%3C/script%3E"));
    function changeimg(){
        $.ajax({
            type:'post',
            url:'Login/Code/',
            data:'ajax=1',
            dataType:'JSON',
            success:function(res){
                $('#capimg').html(res);
            }
        })
    }
</script>
</body>
</html>