## 关于 `微信分享` 和 `QRcode二维码分享`那些踩过的坑

## 微信分享

### 进行微信分享时，前提在项目中安装 SDK

```js
npm install weixin-js-sdk
```

### 分享的略缩图链接地址

1. 通过 import 引入图片

```js
import "../assets/img/shareImg.png"
```

2. 进行 build 打包并提交至线上地址
3. 在线上地址中找到此图片链接
4. 再将 dist 目录下的打包后的图片名引入

```js
imgUrl: "https://tmarketing.inuol.com/static/img/shareImg.dd45f95.png"
```

<!--more-->

### 在微信公众号分享，报错 invalid url

1. 导致这个错误，一般是由于此域名被微信判定为安全域名，需在后台将这个域名配置进去
2. appid，appsecret 这两个也必须是配置对应的准确的才可以

```js
this.axios({
  method: "get",
  url: "https://tsoap.ftoul.com.cn/jssdk.php", //此为后端配置的微信SDK分享的接口
  params: {
    url: location.href.split("#")[0],
    //测试
    appid: "wxf2d124530158a621",
    appsecret: "11f0e5dabc0b83bd447fc455f10dc05a"
    //正式
    // appid: "wx54b08c17a2231b5c",
    // appsecret: "7254b1aab8e71625f5cc0e26893e7eb7"
  }
}).then(res => {
  this.wxShare(res.data, shareData)
})
```

### 分享的链接地址需带 uid 类似得参数时，安卓机的问题

正常分享时带参数写法：

```js
linkUrl: "分享的链接" + "?uid=" + window.localStorage.getItem("uid")
```

上述写法在 ios 端可以正常携带参数，但是安卓端会出现截取参数的行为！！

解决方法：

1. 新建一个中转页，例如 share.html，注意放在 dist 文件夹中，与 index.html 同级

```html
<!DOCTYPE html>

<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Document</title>
  </head>
  <body>
    <script>
      //获取地址栏参数
      let uid = location.href.split("=")[1]
      //重定向至你原本需要分享的页面
      location.href = "https://tmarketing.inuol.com/#/share?uid=" + uid
    </script>
  </body>
</html>
```

2. 将微信分享里面的链接改成如下，也就是说先去中转页，再有中转页专向你需要分享的页面

```js
 linkUrl:
          "https://tmarketing.inuol.com/share.html" +
          "?uid=" +
          window.localStorage.getItem("uid"),
```

3. 这样，安卓端也可以携带参数了。但是值得注意的是，安卓端携带参数后的链接与 ios 的链接是不一样的，
   再进行地址栏取参数值时，请务必看清楚链接差异，再进行取值。

### 完整 demo:

```js
import "../assets/img/shareImg.png";
//微信分享
    shareWX() {
      var shareData = {
        title: "签约壹诺代理人",
        linkUrl:
          "https://tmarketing.inuol.com/share.html" +
          "?uid=" +
          window.localStorage.getItem("uid"),
        imgUrl: "https://tmarketing.inuol.com/static/img/shareImg.dd45f95.png",
        desc: "壹诺代理人 ，给您的收入加加油"
      };
      this.axios({
        method: "get",
        url: signPackage,
        params: {
          url: location.href.split("#")[0],
          //测试
          appid: "wxf2d124530158a621",
          appsecret: "11f0e5dabc0b83bd447fc455f10dc05a"
          //正式
          // appid: "wx54b08c17a2231b5c",
          // appsecret: "7254b1aab8e71625f5cc0e26893e7eb7"
        }
      }).then(res => {
        this.wxShare(res.data, shareData);
      });
    },
    wxShare(a, b) {
      wx.config({
        debug: false, //
        appId: a.appId, // 必填，公众号的唯一标识
        timestamp: a.timestamp, // 必填，生成签名的时间戳
        nonceStr: a.nonceStr, // 必填，生成签名的随机串
        signature: a.signature, // 必填，签名
        jsApiList: [
          "onMenuShareTimeline",
          "onMenuShareAppMessage",
          "onMenuShareQQ",
          "onMenuShareQZone"
        ]
      });

      wx.ready(function() {
        wx.onMenuShareTimeline({
          title: b.title,
          link: b.linkUrl,
          desc: b.desc,
          imgUrl: b.imgUrl,
          success: function() {}
        });

        wx.onMenuShareAppMessage({
          title: b.title,
          desc: b.desc,
          link: b.linkUrl,
          imgUrl: b.imgUrl,
          type: "", // 分享类型,music、video或link，不填默认为link
          dataUrl: "", // 如果type是music或video，则要提供数据链接，默认为空
          success: function() {},
          cancel: function() {}
        });

        wx.onMenuShareQQ({
          title: b.title,
          desc: b.desc,
          link: b.linkUrl,
          imgUrl: b.imgUrl,
          success: function() {},
          cancel: function() {}
        });

        wx.onMenuShareQZone({
          title: b.title,
          desc: b.desc,
          link: b.linkUrl,
          imgUrl: b.imgUrl,
          success: function() {},
          cancel: function() {}
        });
      });
    }
```

## QRcode 二维码分享

### 如何生成带参数的动态二维码

1. 先下载 `qrcode.js`，然后将其引入 main.js

```js
import "./utils/qrcode.js"
```

2. 在 DOM 结构中，建立一个 div,取名 qrcode，再在你需要展示二维码的地方建立个 img

```html
<div id="qrcode" v-show="false"></div>
```

```html
<img id="code" src />
```

3. 建立两个方法：不需要 DOM 是父子结构，但是写法；其实就是讲 qrcode 这个结构中的 img 的 src，赋值在你需要展示的 img 的 src 中。

```js
//动态二维码
    showQr() {
      var Img = document.querySelector("#qrcode img").src; //不需要DOM是父子结构，但是写法是如此
      document.querySelector("#code").src = Img;
      //其实就是讲qrcode这个结构中的img的src，赋值在你需要展示的img的src中
    },
    qrCode() {
      let url = "https://tmarketing.inuol.com/share.html" + "?uid=" + this.uid;
      var qrcode = new QRCode("qrcode", {
        text: url,
        width: 200,
        height: 200,
        colorDark: "#000000",
        colorLight: "#ffffff",
        correctLevel: QRCode.CorrectLevel.H
      });
    },
```
