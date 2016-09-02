
<html>
<head>
<title>My Form</title>
</head>
<body>

<h3>Your form was successfully submitted!</h3>

<p><?php echo anchor('form', 'Try it again!'); ?></p>

</body>
</html>










<form id="theme">
    <label for="">宣传页面头部图片</label><input type="file"  name="headerImage" id=""><br/>
    <div class="contents">
        <div class="content" style="margin-top: 10px;">
            <label for="">系列主题</label><input type="text"  name="series[TopicName]" id="">
            <label for="">系列描述</label><input type="text"  name="series[desc]" id="">
            <br>
            <label for="">主推产品</label>
            <div class="product">
                <label for="">产品01</label>
                <input type="text" placeholder='产品型号' name="number" id="">
                <input type="text" placeholder="产品名" name="ProductName" id="">
                <input type="text" placeholder="产品售价" name="ProductPrice" id="">
            </div>
            <div class="product">
                <label for="">产品02</label>
                <input type="text" placeholder='产品型号' name="number" id="">
                <input type="text" placeholder="产品名" name="ProductName" id="">
                <input type="text" placeholder="产品售价" name="ProductPrice" id="">
            </div>
        </div>
    </div>
    <br>

    <a id="add">添加新数据</a>

    <button>提交</button>