<!DOCTYPE html>
<html>
<head>
    <title>User</title>
</head>
<body>
<h1>User</h1>
 <div>
            <div>
                <legend>头部信息：</legend>
                <ol>
                    <li>
                        <label for="">主题图片:</label>
                        <input type="file"  name="headerImage" id="" class="type2">
                    </li>
                </ol>
            </div>
        </div>
        <div class="contents">
                <div class="content">

                    <legend>主题资料：</legend>
                    <ol>
                        <li>
                            <input type="text"  name="TopicName" id="" placeholder="主题名称" class="type1">
                            <input type="text"  name="TopicDesc" id="" placeholder="主题描述" class="type1">
                        </li>
                    </ol>
             </div>
            <div class="content">
                <legend>系列资料：</legend>
                <ol>
                    <li>
                        <input type="text"  name="series[TopicName]" id="" placeholder="系列主题" class="type1">
                        <input type="text"  name="series[desc]" id="" placeholder="系列描述" class="type1">
                        <input type="text"  name="series[name]" id=""  placeholder="系列名称" class="type1">
                        <input type="text"  name="series[EnName]" id="" placeholder="系列英文名" class="type1">
                    </li>
                </ol>
            </div>
            <div class="content">
                <legend>品牌资料：</legend>
                <ol>
                    <li>
                        <input type="text"  name="brand[name]" id="" placeholder="品牌名称" class="type1">
                        <input type="text"  name="brand[desc]" id="" placeholder="品牌描述" class="type1">
                    </li>
                </ol>
            </div>
            <div class="product">
                <legend>主推产品：</legend>
                <ol>
                    <li>
                        <label for="">产品1：</label>
                        <input type="text" placeholder='产品型号' name="number" id="" >

                        <input type="text" placeholder="产品名" name="ProductName" id="" class="type1">

                        <input type="text" placeholder="产品售价" name="ProductPrice" id="" class="type1">
                    </li>
                    <li>
                        <label for="">产品2：</label>
                        <input type="text" placeholder='产品型号' name="number" id=""  >
                        <input type="text" placeholder="产品名" name="ProductName" id="" class="type1">
                        <input type="text" placeholder="产品售价" name="ProductPrice" id="" class="type1">
                    </li>
                </ol>
            </div>
        </div>
</body>
</html>