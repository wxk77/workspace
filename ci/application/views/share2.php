<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>jQuery手机端点击弹出分享按钮代码 - 16素材网</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
<style type="text/css">
#nativeShare {
    font-size: 13px;
}

#nativeShare .label {
    font-size: 20px;
}

#nativeShare .list {
    width: 90%;
    margin: 0 auto;
}

#nativeShare .list span {
    width: 30%;
    display: inline-block;
    text-align: center;
    margin: 10px 0;
}

#nativeShare .list span i {
    width: 40px;
    height: 40px;
    display: block;
    margin: 0 auto;
    margin-bottom: 5px;
}

#nativeShare .weibo i {
    background-image: url('./icon/weibo.png');
    background-size: cover;
}

#nativeShare .weixin i {
    background-image: url('./icon/weixin_friend.png');
    background-size: cover;
}

#nativeShare .weixin_timeline i {
    background-image: url('./icon/weixin.png');
    background-size: cover;
}

#nativeShare .qq i {
    background-image: url('./icon/qq.png');
    background-size: cover;
}

#nativeShare .qzone i {
    background-image: url('./icon/qqzone.png');
    background-size: cover;
}

#nativeShare .more i {
    background-image: url('./icon/more.png');
    background-size: cover;
}

<!-- <script type="text/javascript" src="public/share-jquery-1.7.js"></script> -->
</head>
<!-- <style type="text/css">
* { padding: 0; margin: 0; }
.am-share { font-size: 14px; border-radius: 0; bottom: 0; left: 0; position: fixed; text-align: center; -webkit-transform: translateY(100%); -ms-transform: translateY(100%); transform: translateY(100%); -webkit-transition: -webkit-transform 300ms; transition: transform 300ms ; width: 100%; z-index: 1110; }
.am-modal-active { transform: translateY(0px);  -webkit-transform: translateY(0); -ms-transform: translateY(0); transform: translateY(0) }
.am-modal-out { z-index: 1109; -webkit-transform: translateY(100%); -ms-transform: translateY(100%); transform: translateY(100%) }

.am-share-title { background-color: #f8f8f8; border-bottom: 1px solid #fff; border-top-left-radius: 2px; border-top-right-radius: 2px; color: #555; font-weight: 400; margin: 0 10px; padding: 10px 0 0; text-align: center; }
.am-share-title::after { border-bottom: 1px solid #dfdfdf; content: ""; display: block; height: 0; margin-top: 10px; width: 100%; }

.am-share-footer { margin: 10px; }
.am-share-footer .share_btn { color: #555;  display: block; width: 100%; background-color: #e6e6e6; border: 1px solid #e6e6e6; border-radius: 0; cursor: pointer;  font-size: 16px; font-weight: 400; line-height: 1.2; padding: 0.625em 0; text-align: center; transition: background-color 300ms ease-out 0s, border-color 300ms ease-out 0s; vertical-align: middle; white-space: nowrap;font-family:"微软雅黑";  }

.am-share-sns { background-color: #f8f8f8; border-radius: 0 0 2px 2px; margin: 0 10px; padding-top: 15px; height:auto; zoom:1; overflow:auto; }

.am-share-sns li { margin-bottom: 15px; display: block; float: left; height: auto;  width: 25%; }

.am-share-sns a { color: #555; display: block; text-decoration:none; }
.am-share-sns span { display: block; }

.am-share-sns li i { background-position: center 50%; background-repeat: no-repeat; background-size: 36px 36px; background-color: #ccc; color: #fff; display: inline-block; font-size: 18px; height: 36px; line-height: 36px; margin-bottom: 5px; width: 36px; }
.am-share-sns .share-icon-weibo { background-image: url(); }

.sharebg { background-color: rgba(0, 0, 0, 0.6); bottom: 0; height: 100%; left: 0; opacity: 0; position: fixed; right: 0; top: 0; width: 100%; z-index: 1100; display:none; }
.sharebg-active { opacity: 1; display:block; }

</style> 
<body>

<div id="nativeShare"></div>
<script>
var nativeShare = function (elementNode, config) {
    if (!document.getElementById(elementNode)) {
        return false;
    }

    var qApiSrc = {
        lower: "http://3gimg.qq.com/html5/js/qb.js",
        higher: "http://jsapi.qq.com/get?api=app.share"
    };
    var bLevel = {
        qq: {forbid: 0, lower: 1, higher: 2},
        uc: {forbid: 0, allow: 1}
    };
    var UA = navigator.appVersion;
    var isqqBrowser = (UA.split("MQQBrowser/").length > 1) ? bLevel.qq.higher : bLevel.qq.forbid;
    var isucBrowser = (UA.split("UCBrowser/").length > 1) ? bLevel.uc.allow : bLevel.uc.forbid;
    var version = {
        uc: "",
        qq: ""
    };
    var isWeixin = false;

    config = config || {};
    this.elementNode = elementNode;
    this.url = config.url || document.location.href || '';
    this.title = config.title || document.title || '';
    this.desc = config.desc || document.title || '';
    this.img = config.img || document.getElementsByTagName('img').length > 0 && document.getElementsByTagName('img')[0].src || '';
    this.img_title = config.img_title || document.title || '';
    this.from = config.from || window.location.host || '';
    this.ucAppList = {
        sinaWeibo: ['kSinaWeibo', 'SinaWeibo', 11, '新浪微博'],
        weixin: ['kWeixin', 'WechatFriends', 1, '微信好友'],
        weixinFriend: ['kWeixinFriend', 'WechatTimeline', '8', '微信朋友圈'],
        QQ: ['kQQ', 'QQ', '4', 'QQ好友'],
        QZone: ['kQZone', 'QZone', '3', 'QQ空间']
    };

    this.share = function (to_app) {
        var title = this.title, url = this.url, desc = this.desc, img = this.img, img_title = this.img_title, from = this.from;
        if (isucBrowser) {
            to_app = to_app == '' ? '' : (platform_os == 'iPhone' ? this.ucAppList[to_app][0] : this.ucAppList[to_app][1]);
            if (to_app == 'QZone') {
                B = "mqqapi://share/to_qzone?src_type=web&version=1&file_type=news&req_type=1&image_url="+img+"&title="+title+"&description="+desc+"&url="+url+"&app_name="+from;
                k = document.createElement("div"), k.style.visibility = "hidden", k.innerHTML = '<iframe src="' + B + '" scrolling="no" width="1" height="1"></iframe>', document.body.appendChild(k), setTimeout(function () {
                    k && k.parentNode && k.parentNode.removeChild(k)
                }, 5E3);
            }
            if (typeof(ucweb) != "undefined") {
                ucweb.startRequest("shell.page_share", [title, title, url, to_app, "", "@" + from, ""])
            } else {
                if (typeof(ucbrowser) != "undefined") {
                    ucbrowser.web_share(title, title, url, to_app, "", "@" + from, '')
                } else {
                }
            }
        } else {
            if (isqqBrowser && !isWeixin) {
                to_app = to_app == '' ? '' : this.ucAppList[to_app][2];
                var ah = {
                    url: url,
                    title: title,
                    description: desc,
                    img_url: img,
                    img_title: img_title,
                    to_app: to_app,//微信好友1,腾讯微博2,QQ空间3,QQ好友4,生成二维码7,微信朋友圈8,啾啾分享9,复制网址10,分享到微博11,创意分享13
                    cus_txt: "请输入此时此刻想要分享的内容"
                };
                ah = to_app == '' ? '' : ah;
                if (typeof(browser) != "undefined") {
                    if (typeof(browser.app) != "undefined" && isqqBrowser == bLevel.qq.higher) {
                        browser.app.share(ah)
                    }
                } else {
                    if (typeof(window.qb) != "undefined" && isqqBrowser == bLevel.qq.lower) {
                        window.qb.share(ah)
                    } else {
                    }
                }
            } else {
            }
        }
    };

    this.html = function() {
        var position = document.getElementById(this.elementNode);
        var html = '<div class="label">分享到</div>'+
            '<div class="list clearfix">'+
            '<span data-app="sinaWeibo" class="nativeShare weibo"><i></i>新浪微博</span>'+
            '<span data-app="weixin" class="nativeShare weixin"><i></i>微信好友</span>'+
            '<span data-app="weixinFriend" class="nativeShare weixin_timeline"><i></i>微信朋友圈</span>'+
            '<span data-app="QQ" class="nativeShare qq"><i></i>QQ好友</span>'+
            '<span data-app="QZone" class="nativeShare qzone"><i></i>QQ空间</span>'+
            '<span data-app="" class="nativeShare more"><i></i>更多</span>'+
            '</div>';
        position.innerHTML = html;
    };

    this.isloadqqApi = function () {
        if (isqqBrowser) {
            var b = (version.qq < 5.4) ? qApiSrc.lower : qApiSrc.higher;
            var d = document.createElement("script");
            var a = document.getElementsByTagName("body")[0];
            d.setAttribute("src", b);
            a.appendChild(d)
        }
    };

    this.getPlantform = function () {
        ua = navigator.userAgent;
        if ((ua.indexOf("iPhone") > -1 || ua.indexOf("iPod") > -1)) {
            return "iPhone"
        }
        return "Android"
    };

    this.is_weixin = function () {
        var a = UA.toLowerCase();
        if (a.match(/MicroMessenger/i) == "micromessenger") {
            return true
        } else {
            return false
        }
    };

    this.getVersion = function (c) {
        var a = c.split("."), b = parseFloat(a[0] + "." + a[1]);
        return b
    };

    this.init = function () {
        platform_os = this.getPlantform();
        version.qq = isqqBrowser ? this.getVersion(UA.split("MQQBrowser/")[1]) : 0;
        version.uc = isucBrowser ? this.getVersion(UA.split("UCBrowser/")[1]) : 0;
        isWeixin = this.is_weixin();
        if ((isqqBrowser && version.qq < 5.4 && platform_os == "iPhone") || (isqqBrowser && version.qq < 5.3 && platform_os == "Android")) {
            isqqBrowser = bLevel.qq.forbid
        } else {
            if (isqqBrowser && version.qq < 5.4 && platform_os == "Android") {
                isqqBrowser = bLevel.qq.lower
            } else {
                if (isucBrowser && ((version.uc < 10.2 && platform_os == "iPhone") || (version.uc < 9.7 && platform_os == "Android"))) {
                    isucBrowser = bLevel.uc.forbid
                }
            }
        }
        this.isloadqqApi();
        if (isqqBrowser || isucBrowser) {
            this.html();
        } else {
            document.write('目前该分享插件仅支持手机UC浏览器和QQ浏览器');
        }
    };

    this.init();

    var share = this;
    var items = document.getElementsByClassName('nativeShare');
    for (var i=0;i<items.length;i++) {
        items[i].onclick = function(){
            share.share(this.getAttribute('data-app'));
        }
    }

    return this;
};
 var config = {
        url:'http://blog.wangjunfeng.com',// 分享的网页链接
        title:'王俊锋的个人博客',// 标题
        desc:'王俊锋的个人博客',// 描述
        img:'http://www.wangjunfeng.com/img/face.jpg',// 图片
        img_title:'王俊锋的个人博客',// 图片标题
        from:'王俊锋的博客' // 来源
    };
    var share_obj = new nativeShare('nativeShare',config);
</script>
</body>
</html>
