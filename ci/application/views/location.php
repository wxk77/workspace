<!DOCTYPE html>
 <html>
   <head>
     <title>获取经纬度</title>
<script type="text/javascript">

    var position_option = {
                enableHighAccuracy: true,
                maximumAge: 30,
                timeout: 20
            };
navigator.geolocation.getCurrentPosition(getPositionSuccess, getPositionError, position_option);

function getPositionSuccess( position ){
        var lat = position.coords.latitude;
        var lng = position.coords.longitude;
        alert( "您所在的位置： 纬度" + lat + "，经度" + lng );
        if(typeof position.address !== "undefined"){
                var country = position.address.country;
                var province = position.address.region;
                var city = position.address.city;
                alert(' 您位于 ' + country + province + '省' + city +'市');
        }
}
function getPositionError(error) {
    switch (error.code) {
        case error.TIMEOUT:
            alert("连接超时，请重试");
            break;
        case error.PERMISSION_DENIED:
            alert("您拒绝了使用位置共享服务，查询已取消");
            break;
        case error.POSITION_UNAVAILABLE:
            alert("获取位置信息失败");
            break;
    }
}
</script>
   </head>
   <body >
   </body>
 </html>












 <!DOCTYPE HTML > 
 <html lang="en">
  <head>
   <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"> 
   <title>获取经纬度</title> 
   </head> 
   <body> </body> 
   </html> 
<!--     <script src="http://api.map.baidu.com/api?v=1.4" type="text/javascript"></script>  -->
    <!-- <script src="http://api.map.baidu.com/api?v=2.0&ak=WVAXZ05oyNRXS5egLImmentg"></script> -->
    <script type="text/javascript" > 
        // var options = { enableHighAccuracy : true, maximumAge : 50, timeout:1000 } 
        // navigator.geolocation.getCurrentPosition(onSuccess, onError, options);
        // function onSuccess(position) {  
        //      var crd = position.coords;
        //      var latitude=crd.latitude;
        //      var longitude=crd.longitude;
            
              // alert('当前地址的经纬度：经度' + longitude + '，纬度' + latitude); 
              
        // }
           
        // function onError(error) { 
        //     switch (error.code) { 
        //         case 1: alert("位置服务被拒绝"); break; 
        //         case 2: alert("暂时获取不到位置信息"); break;
        //         case 3: alert("获取信息超时"); break; 
        //         case 4: alert("未知错误"); break; }  
        //         } 
              



  function Rad(d){
       return d * Math.PI / 180.0;//经纬度转换成三角函数中度分表形式。
    }
    //计算距离，参数分别为第一点的纬度，经度；第二点的纬度，经度
    function GetDistance(lat1,lng1,lat2,lng2){
    
        var radLat1 = Rad(lat1);
        var radLat2 = Rad(lat2);
        var a = radLat1 - radLat2;
        var  b = Rad(lng1) - Rad(lng2);
        var s = 2 * Math.asin(Math.sqrt(Math.pow(Math.sin(a/2),2) +
        Math.cos(radLat1)*Math.cos(radLat2)*Math.pow(Math.sin(b/2),2)));
        s = s *6378.137 ;// EARTH_RADIUS;
        s = Math.round(s * 10) / 10; //输出为公里
        //s=s.toFixed(4);
         return s;
        
    }
    var lat1=124.55;
        var lng1=34.33;
        var lat2=139.77;
        var lng2=45.23;
        var dis=GetDistance(lat1,lng1,lat2,lng2);
        alert(dis);
 </script>












<!-- <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd"> <html lang="en"> <head> <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"> <title>demo</title> </head> <body> </body> </html>  <script src="http://api.map.baidu.com/api?v=1.4" type="text/javascript"></script> <script type="text/javascript" >function getLocation() { var options = { enableHighAccuracy : true, maximumAge : 1000 } alert('this is getLocation()'); if (navigator.geolocation) { 浏览器支持geolocation navigator.geolocation.getCurrentPosition(onSuccess, onError, options); } else { 浏览器不支持geolocation alert('您的浏览器不支持地理位置定位'); } } 成功时 function onSuccess(position) { 返回用户位置 经度 var longitude = position.coords.longitude; 纬度 var latitude = position.coords.latitude; alert('当前地址的经纬度：经度' + longitude + '，纬度' + latitude); 根据经纬度获取地理位置，不太准确，获取城市区域还是可以的 var map = new BMap.Map("allmap"); var point = new BMap.Point(longitude, latitude); var gc = new BMap.Geocoder(); gc.getLocation(point, function(rs) { var addComp = rs.addressComponents; alert(addComp.province + ", " + addComp.city + ", "+ addComp.district + ", " + addComp.street + ", "+ addComp.streetNumber); });  这里后面可以写你的后续操作了 postData(longitude, latitude); }失败时 function onError(error) { switch (error.code) { case 1: alert("位置服务被拒绝"); break; case 2: alert("暂时获取不到位置信息"); break; case 3: alert("获取信息超时"); break; case 4: alert("未知错误"); break; } 这里后面可以写你的后续操作了 经度 var longitude = 23.1823780000; 纬度 var latitude = 113.4233310000; postData(longitude, latitude); } </script>
 -->