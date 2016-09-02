﻿<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<LINK rel="Bookmark" href="/favicon.ico" >
<LINK rel="Shortcut Icon" href="/favicon.ico" />
<!--[if lt IE 9]>
<script type="text/javascript" src="lib/html5.js"></script>
<script type="text/javascript" src="lib/respond.min.js"></script>
<script type="text/javascript" src="lib/PIE_IE678.js"></script>
<![endif]-->
<link rel="stylesheet" type="text/css" href="H-ui/static/h-ui/css/H-ui.min.css" />
<link rel="stylesheet" type="text/css" href="H-ui/static/h-ui/css/H-ui.admin.css" />
<link rel="stylesheet" type="text/css" href="H-ui/lib/Hui-iconfont/1.0.7/iconfont.css" />
<link rel="stylesheet" type="text/css" href="H-ui/lib/icheck/icheck.css" />
<link rel="stylesheet" type="text/css" href="H-ui/static/h-ui/skin/default/skin.css" id="skin" />
<link rel="stylesheet" type="text/css" href="H-ui/static/h-ui/css/style.css" />
<!--[if IE 6]>
<script type="text/javascript" src="lib/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<title>主题列表</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 主题管理 <span class="c-gray en">&gt;</span> 主题列表 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
	<div class="text-c"> 日期范围：
		<input type="text" onfocus="WdatePicker( { maxDate:'#F { $dp.$D(\'datemax\')||\'%y-%M-%d\' } ' } )" id="datemin" class="input-text Wdate" style="width:120px;">
		-
		<input type="text" onfocus="WdatePicker( { minDate:'#F{$dp.$D(\'datemin\') } ',maxDate:'%y-%M-%d' } )" id="datemax" class="input-text Wdate" style="width:120px;">
		<input type="text" class="input-text" style="width:250px" placeholder="输入主题名称" id="" name="">
		<button type="submit" class="btn btn-success" id="" name=""><i class="Hui-iconfont">&#xe665;</i> 搜主题</button>
	</div>
	<div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l"><a href="javascript:;" onclick="datadel()" class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i> 批量删除</a> <a href="javascript:;" onclick="topic_add('添加主题','Topic/topic_add','800','500')" class="btn btn-primary radius"><i class="Hui-iconfont">&#xe600;</i> 添加主题</a></span> <span class="r">共有数据：<strong></strong> 条</span> </div>
	<table class="table table-border table-bordered table-bg">
		<thead>
			<tr>
				<th scope="col" colspan="9">主题列表</th>
			</tr>
			<tr class="text-c">
				<th width="25"><input type="checkbox" name="" value=""></th>
				<th width="40">topicID</th>
				<th width="150">主题介绍</th>
				<th width="100">主题年份</th>
				<th width="90">主题名称</th>
				<th width="150">系列名称</th>
				<th width="100">系列title</th>
				<th width="100">系列英文名</th>
				<th width="130">卖场地址</th>
				<th width="100">卖场名称</th>
				<th width="100">品牌名称</th>
				<th width="100">品牌简介</th>
				<th width="100">商品名称</th>
				<th width="100">商品型号</th>				
				<th width="100">主题图片</th>
				<th width="100">系列大图</th>
				<th width="100">商品小图</th>
			</tr>
		</thead>
		
	</table>
</div>
<script type="text/javascript" src="H-ui/lib/jquery/1.9.1/jquery.min.js"></script>  
<script type="text/javascript" src="H-ui/lib/layer/2.1/layer.js"></script> 
<script type="text/javascript" src="H-ui/lib/laypage/1.2/laypage.js"></script> 
<script type="text/javascript" src="H-ui/lib/My97DatePicker/WdatePicker.js"></script> 
<script type="text/javascript" src="H-ui/static/h-ui/js/H-ui.js"></script> 
<script type="text/javascript" src="H-ui/static/h-ui/js/H-ui.admin.js"></script> 
<script type="text/javascript">
/*
	参数解释：
	title	标题
	url		请求的url
	id		需要操作的数据id
	w		弹出层宽度（缺省调默认值）
	h		弹出层高度（缺省调默认值）
*/
/*管理员-增加*/
function topic_add(title,url,w,h){
	layer_show(title,url,w,h);
}
/*管理员-删除*/
function goods_del(obj,id){
	layer.confirm('确认要删除吗？',function(index){
		//此处请求后台程序，下方是成功后的前台处理……
		$.ajax({
			type:'post',
			url:'__CONTROLLER__/goodsDel',
			data:'user_id=' + id,
			dataType:'JSON',
			success:function(res){
				if (res=="success") {
					$(obj).parents("tr").remove();
					layer.msg('已删除',{icon:1,time:1000});					
				}else{
					layer.msg('删除失败',{icon:1,time:1000});
				}
			}
		})
		$(obj).parents("tr").remove();
		layer.msg('已删除!',{icon:1,time:1000});
	});

}
/*管理员-编辑*/
function goods_edit(title,url,id,w,h){
	layer_show(title,url+'?goods_id='+id,w,h);
}
/*管理员-停用*/
function admin_stop(obj,id){
	layer.confirm('确认要停用吗？',function(index){
		//此处请求后台程序，下方是成功后的前台处理……
		
		$(obj).parents("tr").find(".td-manage").prepend('<a onClick="admin_start(this,id)" href="javascript:;" title="启用" style="text-decoration:none"><i class="Hui-iconfont">&#xe615;</i></a>');
		$(obj).parents("tr").find(".td-status").html('<span class="label label-default radius">已禁用</span>');
		$(obj).remove();
		layer.msg('已停用!',{icon: 5,time:1000});
	});
}

/*管理员-启用*/
function admin_start(obj,id){
	layer.confirm('确认要启用吗？',function(index){
		//此处请求后台程序，下方是成功后的前台处理……
		
		
		$(obj).parents("tr").find(".td-manage").prepend('<a onClick="admin_stop(this,id)" href="javascript:;" title="停用" style="text-decoration:none"><i class="Hui-iconfont">&#xe631;</i></a>');
		$(obj).parents("tr").find(".td-status").html('<span class="label label-success radius">已启用</span>');
		$(obj).remove();
		layer.msg('已启用!', {icon: 6,time:1000});
	});
}
function datadel(){
    layer.confirm('确认要删除吗？',function(index){
    		//整理数据；
    		var goodsdels='';
    		$('input:checkbox:checked').each(function(){
    			goodsdels = goodsdels + this.value + '=' + this.value + '&';
    		});
		//此处请求后台程序，下方是成功后的前台处理……
		$.ajax({
			type:'post',
			url:'__CONTROLLER__/delAll',
			data:goodsdels,
			dataType:'JSON',
			success:function(res){
				if (res=="success") {
					$('input:checkbox:checked').each(function(){
						if(this.value != ''){
							$(this).parents("tr").remove();
						}
					});
					layer.msg('已删除',{icon:1,time:1000});					
				}else{
					layer.msg('删除失败',{icon:1,time:1000});
				}
			}
		})
	})
}
</script>
</body>
</html>

















