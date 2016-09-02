// JavaScript Document


if (/Android (\d+\.\d+)/.test(navigator.userAgent)) {
    var version = parseFloat(RegExp.$1);
    if (version > 2.3) {
        var phoneScale = parseInt(window.screen.width) / 640;
        document.write('<meta name="viewport" content="width=640, minimum-scale = ' + phoneScale + ', maximum-scale = ' + phoneScale + ', target-densitydpi=device-dpi">');
    } else {
        document.write('<meta name="viewport" content="width=640, target-densitydpi=device-dpi">');
    }
} else {
    document.write('<meta name="viewport" content="width=640, user-scalable=no, target-densitydpi=device-dpi">');
}







//轮播
window.onload = function () {
    var index = 0;
    var mySwiper = new Swiper('.swiper-container', {
        initialSlide: 0,//设置一开始展示第几个从0开始
        loop: true,//循环
        autoplay: 5000,
        pagination: '.swiper-pagination',//小圆点

    });


}

