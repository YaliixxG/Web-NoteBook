
## HTML5  

### HTML5新特性：
            用于绘画的 canvas 元素
            用于媒介回放的 video 和 audio 元素
            对本地离线存储的更好的支持
            新的特殊内容元素，比如 article、footer、header、nav、section
            新的表单控件，比如 calendar、date、time、email、url、search

--------------------------------------------------------------------------------------------------------------

### 语义要素
1. HTML5 添加了很多语义元素如下所示：

      `<article>`	              定义页面独立的内容区域。|块标签  
      `<aside>`	                      定义页面的侧边栏内容。|块标签  
      `<bdi>`	                      允许您设置一段文本，使其脱离其父元素的文本方向设置。  
      `<command>`	              定义命令按钮，比如单选按钮、复选框或按钮  
      `<details>`	              用于描述文档或文档某个部分的细节  
      `<dialog>`	              定义对话框，比如提示框  
      `<summary>`	              标签包含 details 元素的标题  
      `<figure>`	              规定独立的流内容（图像、图表、照片、代码等等）。|块标签  
      `<figcaption>`	              定义 `<figure>` 元素的标题  
      `<footer>`	              定义 section 或 document 的页脚。|块标签  
      `<header>`	              定义了文档的头部区域 |块标签  
      `<mark>`	              定义带有记号的文本。  
      `<meter>`	              定义度量衡。仅用于已知最大和最小值的度量。  
      `<nav>	`                      定义导航链接的部分。|块标签  
      `<progress>`	              定义任何类型的任务的进度。  
      `<ruby>`	              定义 ruby 注释（中文注音或字符）。  
      `<rt>`	              定义字符（中文注音或字符）的解释或发音。  
      `<rp>`	              在 ruby 注释中使用，定义不支持 ruby 元素的浏览器所显示的内容。  
      `<section>`	              定义文档中的节（section、区段）。|块标签  
      `<time>`	              定义日期或时间。  
      `<wbr>	`               规定在文本中的何处适合添加换行符。

2. 自定义新元素标签
document.createElement("myHero")   <myHero>我的第一个新元素</myHero> 要把新标签写在HTML中

-------------------------------------------------------------------------------------------------------------------------

### Internet Explorer 浏览器问题

HTML5能适用于现代所有浏览器，但是IE只有IE9可以适用，IE6-IE8不适用

如果遇到IE浏览器怎么处理呢？
将这段代码添加至头部区域：  
```js
      <!--[if lt IE 9]>
      <script src="http://apps.bdimg.com/libs/html5shiv/3.7/html5shiv.min.js"></script>
      <![endif]-->
      //以上代码是一个注释，作用是在 IE 浏览器的版本小于 IE9 时将读取 html5.js 文件，并解析它。
```

-------------------------------------------------------------------------------------------------------------------------------

画布CANVAS `<canvas>`它是一个画布标签，只是作为一个图形容器，必须使用脚本来绘制图形。

```js
var c=document.getElementById("myCanvas");
var ctx=c.getContext("2d");

getContext()     返回一个用于在画布上绘图的环境

语法：Canvas.getContext(contextID)
参数 contextID 指定了您想要在画布上绘制的类型。当前唯一的合法值是 "2d"，它指定了二维绘图，并且导致这个方法返回一个环境对象，该对象导出一个二维绘图 API。

ctx.fillStyle = color|gradient|pattern
color  指示绘图填充色的CSS颜色值
gradient 用于填充绘图的渐变对象（线性或放射性）
pattern 用于填充绘图的pattern对象

ctx.font = "24px Helvetica"  属性设置或返回画布上文本内容的当前字体属性。

ctx.textBaseline = "top"     属性设置或返回在绘制文本时的当前文本基线。

ctx.textAlign = "left"       属性根据锚点，设置或返回文本内容的当前对齐方式。



fillText() 方法在画布上绘制填色的文本。文本的默认颜色是黑色。
context.fillText(text,x,y,maxWidth);
text	           规定在画布上输出的文本。
x	           开始绘制文本的 x 坐标位置（相对于画布）。
y	           开始绘制文本的 y 坐标位置（相对于画布）。
maxWidth	   可选。允许的最大文本宽度，以像素计。

window.requestAnimationFrame() 方法告诉浏览器您希望执行动画并请求浏览器在下一次重绘之
前调用指定的函数来更新动画。该方法使用一个回调函数作为参数，这个回调函数会在浏览器重绘之前调用。

```

---------------------------------------------------------------------------------------------------------------------------------------

### 内联 SVG `<svg>...</svg>`

什么是SVG？
SVG 指可伸缩矢量图形 (Scalable Vector Graphics)
SVG 用于定义用于网络的基于矢量的图形
SVG 使用 XML 格式定义图形
SVG 图像在放大或改变尺寸的情况下其图形质量不会有损失
SVG 是万维网联盟的标准

SVG优势
与其他图像格式相比（比如 JPEG 和 GIF），使用 SVG 的优势在于：  
      1. SVG 图像可通过文本编辑器来创建和修改
      2. SVG 图像可被搜索、索引、脚本化或压缩
      3. SVG 是可伸缩的  
      4. SVG 图像可在任何的分辨率下被高质量地打印  
      5. SVG 可在图像质量不下降的情况下被放大

------------------------------------------------------------------------------------------------------------------------------------------

### MathML   `<math>...</math>`

 实例：
 ```HTML  
 <body>
           <math xmlns="http://www.w3.org/1998/Math/MathML">
                  <mrow>
                        <msup><mi>a</mi><mn>2</mn></msup>
                        <mo>+</mo>
                        <msup><mi>b</mi><mn>2</mn></msup>
                        <mo>=</mo>
                        <msup><mi>c</mi><mn>2</mn></msup>
                  </mrow>
            </math>
</body>
```

            运算出来的结果：a2 + b2 = c2 （a的平方 + b的平方 = c的平方）

-----------------------------------------------------------------------------------------------------------------------------

拖放（Drag 和 Drop）

拖放是一种常见的特性，即抓取对象以后拖到另一个位置。在 HTML5 中，拖放是标准的一部分，任何元素都能够拖放。

                  <script>
                  function allowDrop(ev)
                  {
                        ev.preventDefault();                            //取消事件的默认动作
                  }

                  function drag(ev)
                  {
                        ev.dataTransfer.setData("Text",ev.target.id);
                  }

                  function drop(ev)
                  {
                        ev.preventDefault();
                        var data=ev.dataTransfer.getData("Text");
                        ev.target.appendChild(document.getElementById(data));
                  }
                  </script>
                  </head>

                  <body>

                  <p>拖动 w3cschool.cn 图片到矩形框中:</p>

                  <div id="div1" ondrop="drop(event)" ondragover="allowDrop(event)"></div>
                  <br>
                  <img id="drag1" src="/statics/images/logo.png" draggable="true" ondragstart="drag(event)" width="336" height="69">

                  </body>


  1. 设置元素为可拖放

     首先，为了使元素可拖动，把 draggable 属性设置为 true ：
     <img draggable="true">

 2. 拖动什么 - ondragstart 和 setData()

    然后，规定当元素被拖动时，会发生什么。
    在上面的例子中，ondragstart 属性调用了一个函数，drag(event)，它规定了被拖动的数据。

    dataTransfer.setData() 方法设置被拖数据的数据类型和值：

      function drag(ev)
      {
      ev.dataTransfer.setData("Text",ev.target.id);
      }
      在这个例子中，数据类型是 "Text"，值是可拖动元素的 id ("drag1")。

3. 放到何处 - ondragover
      ondragover 事件规定在何处放置被拖动的数据。

      默认地，无法将数据/元素放置到其他元素中。如果需要设置允许放置，我们必须阻止对元素的默认处理方式。

      这要通过调用 ondragover 事件的 event.preventDefault() 方法：

      event.preventDefault()

4. 进行放置 - ondrop

      当放置被拖数据时，会发生 drop 事件。

      在上面的例子中，ondrop 属性调用了一个函数，drop(event)：

      function drop(ev)
      {
      ev.preventDefault();
      var data=ev.dataTransfer.getData("Text");
      ev.target.appendChild(document.getElementById(data));
      }

      //触发ondrop事件通过event.dataTransfer.getData("Text")来得到上面event.dataTransfer.setData("Text",ev.target.id)
      //的img的id,通过event.target.appendChild(document.getElementById(data))来把img放到div中，注意这里event.target指的是div，不是上面的img了。至此，页面的拖动完成了。

----------------------------------------------------------------------------------------------------------------------------------------

地理定位 Geolocation

HTML5 Geolocation API 用于获得用户的地理位置。鉴于该特性可能侵犯用户的隐私，除非用户同意，否则用户位置信息是不可用的。

这个用法可以参照 w3cschool 上的实例，实例上有如何定位经纬度，如何在地图上显示位置等等。

----------------------------------------------------------------------------------------------------------------------------------------------

Video(视频)

            <video width="320" height="240" controls>           //width 和 height 属性控制视频的尺寸
                  <source src="movie.mp4" type="video/mp4">     //中间可以连入多个source, 浏览器会选择第一个支持的文件来播放
                  <source src="movie.ogg" type="video/ogg">
                  您的浏览器不支持Video标签。                    //标签之间插入的内容是提供给不支持 video 元素的浏览器显示的。
            </video>

            <video>..</video> 元素提供了 播放、暂停和音量控件来控制视频。

            格式	 MIME-type
            MP4	  video/mp4
            WebM	  video/webm
            Ogg	  video/ogg

          具体用法可以参照 w3cschool

--------------------------------------------------------------------------------------------------------------------------------------------------

Audio(音频)

            <audio controls>                                     //control 属性供添加播放、暂停和音量控件
                  <source src="horse.ogg" type="audio/ogg">      //中间可以连入多个source, 浏览器会选择第一个支持的文件来播放
                  <source src="horse.mp3" type="audio/mpeg">
                  您的浏览器不支持 audio 元素。                   //标签之间插入的内容是提供给不支持 audio 元素的浏览器显示的。
            </audio>

            格式	   MIME-type
            MP3	     audio/mpeg
            Ogg	     audio/ogg
            Wav	     audio/wav

            具体用法可以参照 w3cschool

--------------------------------------------------------------------------------------------------------------------------------------------------

Input 类型

      color                   从拾色器中选择一个颜色
      date                    定义一个时间控制器，允许你从一个日期选择器选择一个日期
      datetime                定义一个日期和时间控制器（本地时间）
      datetime-local          定义一个日期和时间 (无时区)
      email                   在提交表单时，会自动验证 email 域的值是否合法有效
      month                   定义月与年 (无时区)
      number                  定义一个数值输入域(限定)   数量 ( 1 到 5 之间 ): <input type="number" name="quantity" min="1" max="5">
                                                            max- 规定允许的最大值
                                                            min - 规定允许的最小值
                                                            step - 规定合法的数字间隔（如果 step="3"，则合法的数是 -3,0,3,6 等）
                                                            value - 规定默认值
      range                   定义一个不需要非常精确的数值（类似于滑块控制）   <input type="range" name="points" min="1" max="10">
                                                            max- 规定允许的最大值
                                                            min - 规定允许的最小值
                                                            step - 规定合法的数字间隔（如果 step="3"，则合法的数是 -3,0,3,6 等）
                                                            value - 规定默认值
      search                  定义一个搜索字段 (类似站点搜索或者Google搜索)
      tel                     定义输入电话号码字段
      time                    定义可输入时间控制器（无时区）
      url                     定义输入URL字段
      week                    定义周和年 (无时区)

------------------------------------------------------------------------------------------------------------------------------------------------------

表单元素

<datalist>                   规定输入域的选项列表

                             <form action="/statics/demosource/demo-form.php" method="get">
                              <input list="browsers" name="browser">
                              <datalist id="browsers">
                              <option value="Internet Explorer">
                              <option value="Firefox">
                              <option value="Chrome">
                              <option value="Opera">
                              <option value="Safari">
                              </datalist>
                              <input type="submit">
                              </form>

<keygen>                     提供一种验证用户的可靠方法,规定用于表单的密钥对生成器字段
                             当提交表单时，会生成两个键，一个是私钥，一个公钥。
                             私钥（private key）存储于客户端，公钥（public key）则被发送到服务器。公钥可用于之后验证用户的客户端证书（client certificate）。

                             <form action="demo_keygen.asp" method="get">
                              用户名: <input type="text" name="usr_name">
                              加密: <keygen name="security">
                              <input type="submit">
                              </form>

<output>                     用于不同类型的输出，比如计算或脚本输出

                             <form oninput="x.value=parseInt(a.value)+parseInt(b.value)">0
                              <input type="range" id="a" value="50">100 +
                              <input type="number" id="b" value="50">=
                              <output name="x" for="a b"></output>
                              </form>

---------------------------------------------------------------------------------------------------------------------------------------------------------

表单属性

HTML5 的 <form> 和 <input>标签添加了几个新属性.

<form>新属性：
                  autocomplete         当用户填写过一些内容后，再次刷新后，点击此处，会显示前面已经输入过的内容（比如账号之类的）
                                       适用于 <form> 标签，以及以下类型的 <input> 标签：text, search, url, telephone, email, password, datepickers, range 以及 color。
                                       autocomplete="on | off"

                  novalidate           规定在提交表单时不应该验证 form 或 input 域。 只要添加该属性，则此form或者input不需要验证；此属性是一个布尔值属性
                                       <form action="demo-form.php" novalidate>

<input>新属性：
                  autocomplete         同form一样

                  autofocus            规定在页面加载时，域自动地获得焦点，此属性是一个布尔值属性  <input type="text" name="fname" autofocus>

                  form                 规定输入域所属的一个或多个表单。
                                        <form action="demo-form.php" id="form1">
                                          First name: <input type="text" name="fname"><br>
                                          <input type="submit" value="Submit">
                                          </form>

                                          Last name: <input type="text" name="lname" form="form1">     这一个input虽然不在form1这个表单里面，但是添加此属性可以关联这个表单，成为它的一部分

                  formaction          用于描述表单提交的URL地址,会覆盖<form> 元素中的action属性,The formaction 属性用于 type="submit" 和 type="image".
                                          以下HTMLform表单包含了两个不同地址的提交按钮：
                                          <form action="demo-form.php">
                                          First name: <input type="text" name="fname"><br>
                                          Last name: <input type="text" name="lname"><br>
                                          <input type="submit" value="Submit"><br>
                                          <input type="submit" formaction="demo-admin.php"
                                          value="Submit as admin">
                                          </form>

                  formenctype         描述了表单提交到服务器的数据编码 (只对form表单中 method="post" 表单),属性覆盖 form 元素的 enctype 属性,该属性与 type="submit" 和 type="image" 配合使用

                                       第一个提交按钮已默认编码发送表单数据，第二个提交按钮以 "multipart/form-data" 编码格式发送表单数据:
                                          <form action="demo-post_enctype.php" method="post">
                                          First name: <input type="text" name="fname"><br>
                                          <input type="submit" value="Submit">
                                          <input type="submit" formenctype="multipart/form-data"
                                          value="Submit as Multipart/form-data">
                                          </form>

                  formmethod            定义了表单提交的方式,覆盖了 <form> 元素的的method 属性。该属性可以与 type="submit" 和 type="image" 配合使用
                                        <input type="submit" formmethod="post" formaction="demo-post.php" value="Submit using POST">

                  formnovalidate         是一个 boolean 属性,表单提交时无需被验证,formnovalidate 属性会覆盖 <form> 元素的novalidate属性,与type="submit”一起使用

                  formtarget             一个名称或一个关键字来指明表单提交数据接收后的展示。覆盖 <form>元素的target属性,与type="submit" 和 type="image"配合使用.

                  height , width        规定用于 image 类型的 <input> 标签的图像高度和宽度。

                  list                  规定输入域的 datalist。datalist 是输入域的选项列表。
                                        <datalist id="browsers">
                                          <option value="Internet Explorer">
                                          <option value="Firefox">
                                          <option value="Chrome">
                                          <option value="Opera">
                                          <option value="Safari">
                                        </datalist>

                  min and max           用于为包含数字或日期的 input 类型规定限定（约束）,min、max 和 step 属性适用于以下类型的 <input> 标签：date pickers、number 以及 range。step是步进值。

                  multiple              是一个 boolean 属性，规定<input> 元素中可选择多个值，属性适用于以下类型的<input> 标签：email 和 file。: email, and file。意思就是可以选择多个邮件，多个文件

                  pattern (regexp)      描述了一个正则表达式用于验证<input> 元素的值，适用于以下类型的<input> 标签: text, search, url, tel, email, 和 password.
                                        下面的例子显示了一个只能包含三个字母的文本域（不含数字及特殊字符）：
                                        Country code: <input type="text" name="country_code" pattern="[A-Za-z]{3}" title="Three letter country code">

                  placeholder           常用的啦~

                  required              是一个 boolean 属性.规定必须在提交之前填写输入域（不能为空）。
                                        适用于以下类型的<input> 标签：text, search, url, telephone, email, password, date pickers, number, checkbox, radio 以及 file。
                                        Username: <input type="text" name="usrname" required>

                  step                  为输入域规定合法的数字间隔。可以与 max 和 min 属性创建一个区域值.
                                        与以下type类型一起使用: number, range, date, datetime, datetime-local, month, time 和 week.
                                        规定input step步长为3:
                                        <input type="number" name="points" step="3">

------------------------------------------------------------------------------------------------------------------------------------------------------

语义元素

                 <header>               描述了文档的头部区域
                  <nav>                 定义导航链接的部分。
                  <section>             定义文档中的节（section、区段）。比如章节、页眉、页脚或文档中的其他部分。
                  <article>             定义独立的内容
                  <aside>               定义页面主区域内容之外的内容（比如侧边栏）。内容应与主区域的内容相关.
                  <figcaption>          定义 <figure> 元素的标题.应该被置于 "figure" 元素的第一个或最后一个子元素的位置。
                  <figure>              规定独立的流内容（图像、图表、照片、代码等等）,内容应该与主内容相关，但如果被删除，则不应对文档流产生影响。
                  <footer>              描述了文档的底部区域.


                  以上的元素都是块元素(除了<figcaption>).
                  为了让这些块及元素在所有版本的浏览器中生效，你需要在样式表文件中设置一下属性 (以下样式代码可以让旧版本浏览器支持本章介绍的块级元素):

                  header, section, footer, aside, nav, article, figure
                  {
                  display: block;
                  }

------------------------------------------------------------------------------------------------------------------------------------------------------

Web 存储

HTML5 web 存储,一个比cookie更好的本地存储方式。

                localStorage            没有时间限制的数据存储
                sessionStorage          针对一个 session 的数据存储

               在使用 web 存储前,应检查浏览器是否支持 localStorage 和sessionStorage:
                                                                                    if(typeof(Storage)!=="undefined"){
                                                                                          // 是的! 支持 localStorage  sessionStorage 对象!
                                                                                          // 一些代码.....
                                                                                          }else{
                                                                                          // 抱歉! 不支持 web 存储。
                                                                                          }
              实例：<div id="result"></div>
                  <script>
                  if(typeof(Storage)!=="undefined")
                  {
                  //存储
                  localStorage.sitename="W3Cschool在线教程";                                         //使用 key="sitename" 和 value="W3Cschool在线教程" 创建一个 localStorage 键/值对。

                  //查找
                  document.getElementById("result").innerHTML="网站名：" + localStorage.sitename;   //检索键值为"sitename" 的值然后将数据插入 id="result"的元素中
                  }
                  else
                  {
                  document.getElementById("result").innerHTML="对不起，您的浏览器不支持 web 存储。";
                  }
                  </script>


                  不管是 localStorage，还是 sessionStorage，可使用的API都相同，常用的有如下几个（以localStorage为例）：
                  保存数据：localStorage.setItem(key,value);
                  读取数据：localStorage.getItem(key);
                  删除单个数据：localStorage.removeItem(key);
                  删除所有数据：localStorage.clear();
                  得到某个索引的key：localStorage.key(index);

                  提示: 键/值对通常以字符串存储，你可以按自己的需要转换该格式。

------------------------------------------------------------------------------------------------------------------------------------------------------

Web SQL 数据库

核心方法

openDatabase           这个方法使用现有的数据库或者新建的数据库创建一个数据库对象。
                       打开数据库    var db = openDatabase('mydb', '1.0', 'Test DB', 2 * 1024 * 1024);
                                          mydb               数据库名称
                                          1.0                版本号
                                          Test DB            描述文本
                                          2 * 1024 * 1024    数据库大小
                                          第五个参数          创建回调（会在创建数据库后被调用）

transaction            这个方法让我们能够控制一个事务，以及基于这种情况执行提交或者回滚。
                       执行查询操作  var db = openDatabase('mydb', '1.0', 'Test DB', 2 * 1024 * 1024);
                                    db.transaction(function (tx) {
                                       tx.executeSql('CREATE TABLE IF NOT EXISTS LOGS (id unique, log)');
                                    });
                      上面的语句执行后会在 'mydb' 数据库中创建一个名为 LOGS 的表。

executeSql            这个方法用于执行实际的 SQL 查询。

以上具体实例可参考 w3cschool在线教程

------------------------------------------------------------------------------------------------------------------------------------------------------

应用程序缓存（Application Cache）

应用程序缓存为应用带来三个优势：

            离线浏览 - 用户可在应用离线时使用它们
            速度 - 已缓存资源加载得更快
            减少服务器负载 - 浏览器将只从服务器下载更新过或更改过的资源。

详情具体参考 w3cschool在线教程
