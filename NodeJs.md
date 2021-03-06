module exports = XXX   声明需要调用的函数 不声明会显示未定义  

module.exports = fn1   这种写法只是支持一个函数的声明  
```js
//这种写法支持多个函数的声明
module.exports = {
    fn1:function(){

    }，
    fn2:function(){

    }
} 
```   
                    

----------------------------------------------------------------------------------------------

### 创建一个NodeJs应用

步骤一：引入required模块，使用require指令来载入http模块，并将实例化的HTTP赋值给变量http，实例如下：
```js
       var http = require("http");
```  


步骤二：创建服务器，接下来我们使用 http.createServer() 方法创建服务器，并使用 listen 方法绑定 8888 端口。  

函数通过 request, response 参数来接收和响应数据。  

实例如下，在你项目的根目录下创建一个叫 server.js 的文件，并写入以下代码：  
 ```js      
       var http = require("http");
       http.createServer(function(request,response){
           //发送HTTP头部
           //http状态值：200：ok
           //内容类型：text/plain
           response.writeHead(200,{'Content-Type':'text/plain'});

           //发送响应数据"Hello World"
           response.end('Hello World')
       }).listen(8888)

       //终端打印如下信息
       console.log('Server running at http://127.00.0:8888/');  
```

步骤三：在终端输入 node server.js 

-------------------------------------------------------------------------------------------------------------

### NPM 使用介绍

NPM是随同NodeJS一起安装的包管理工具，能解决NodeJS代码部署上的很多问题。  

常见的使用场景有以下几种：  

* 允许用户从NPM服务器下载别人编写的第三方包到本地使用。
* 允许用户从NPM服务器下载并安装别人编写的命令行程序到本地使用。
* 允许用户将自己编写的包或命令行程序上传到NPM服务器供别人使用。

测试是否安装成功？       输入"`npm -v`"，出现版本号提示表示安装成功。  

升级版本                `$ npm install npm -g`  


### Express 全局安装与本地安装  
```js
npm install express           # 本地安装
npm install express -g        # 全局安装  
```
>如果出现这个错误：npm err! Error: connect ECONNREFUSED 127.0.0.1:8087   
解决办法为：$ npm config set proxy null 

本地安装  

1. 将安装包放在 ./node_modules 下（运行 npm 命令时所在的目录），如果没有 node_modules 目录，会在当前执行 npm 命令的目录下生成 node_modules 目录。
2. 可以通过 require() 来引入本地安装的包。
全局安装
1. 将安装包放在 /usr/local 下或者你 node 的安装目录。
2. 可用。以直接在命令行里使
如果你希望具备两者功能，则需要在两个地方安装它或使用 npm link。 

--------------------------------------------------------------------------------------------------------------------------

### 回调函数

Node.js 异步编程的直接体现就是回调。异步编程依托于回调来实现，但不能说使用了回调后程序就异步化了。  

回调函数在完成任务后就会被调用，Node 使用了大量的回调函数，Node 所有 API 都支持回调函数。  

例如，我们可以一边读取文件，一边执行其他命令，在文件读取完成后，我们将文件内容作为回调函数的参数返回。这样在执行代码时就没有阻塞或等待文件 I/O 操作。这就大大提高了 Node.js 的性能，可以处理大量的并发请求。  

    
回调函数就是为了创建无阻塞代码，阻塞是按顺序执行的，而非阻塞是不需要按顺序的，所以如果需要处理回调函数的参数，我们就需要写在回调函数内。

------------------------------------------------------------------------------------------------------------------------------

### 事件循环

Node.js 是单进程单线程应用程序，但是通过事件和回调支持并发，所以性能非常高。每一个 API 都是异步的，并作为一个独立线程运行，使用异步函数调用，并处理并发。  

基本上所有的事件机制都是用设计模式中观察者模式实现。单线程类似进入一个while(true)的事件循环，直到没有事件观察者退出，每个异步事件都生成一个事件观察者，如果有事件发生就调用该回调函数.  


### 事件驱动程序
Node.js 使用事件驱动模型，当web server接收到请求，就把它关闭然后进行处理，然后去服务下一个web请求。当这个请求完成，它被放回处理队列，当到达队列开头，这个结果被返回给用户。  

这个模型非常高效可扩展性非常强，因为webserver一直接受请求而不等待任何读写操作。（这也被称之为非阻塞式IO或者事件驱动IO）  

在事件驱动模型中，会生成一个主循环来监听事件，当检测到事件时触发回调函数。  


Node.js 有多个内置的事件，我们可以通过引入 events 模块，并通过实例化 EventEmitter 类来绑定和监听事件  
```js
    // 引入 events 模块
    var events = require('events');
    // 创建 eventEmitter 对象
    var eventEmitter = new events.EventEmitter();
    以下程序绑定事件处理程序：

    // 绑定事件及事件的处理程序
    eventEmitter.on('eventName', eventHandler);
    我们可以通过程序触发事件：

    // 触发事件
    eventEmitter.emit('eventName');
```

实例：创建 main.js 文件，代码如下所示：  
```js
    // 引入 events 模块
    var events = require('events');
    // 创建 eventEmitter 对象
    var eventEmitter = new events.EventEmitter();

    // 创建事件处理程序
    var connectHandler = function connected() {
    console.log('连接成功。');
                                    
    // 触发 data_received 事件 
    eventEmitter.emit('data_received');
      }

    // 绑定 connection 事件处理程序
    eventEmitter.on('connection', connectHandler);
                                    
    // 使用匿名函数绑定 data_received 事件
    eventEmitter.on('data_received', function(){
    console.log('数据接收成功。');
    });

    // 触发 connection 事件 
    eventEmitter.emit('connection');

    console.log("程序执行完毕。");
```

    接下来让我们执行以上代码：

    $ node main.js
    连接成功。
    数据接收成功。
    程序执行完毕。  
    

------------------------------------------------------------------------------------------------------------------------------------------------

### 事件

EventEmitter  
事件发射与事件监听器功能的封装。每个事件由一个事件名和若干个参 数组成，事件名是一个字符串，通常表达一定的语义。对于每个事件，EventEmitter 支持 若干个事件监听器。  

 当事件发射时，注册到这个事件的事件监听器被依次调用，事件参数作 为回调函数参数传递。
                    
-------------------------------------------------------------------------------------------------------------------------------------------------

### 安装express

`Express` 是一个简洁而灵活的 node.js Web应用框架, 提供了一系列强大特性帮助你创建各种 Web 应用，和丰富的 HTTP 工具。使用 Express 可以快速地搭建一个完整功能的网站。

`Express` 框架核心特性：
* 可以设置中间件来响应 HTTP 请求。
* 定义了路由表用于执行不同的 HTTP 请求动作。
* 可以通过向模板传递参数来动态渲染 HTML 页面

安装 `Express`
安装 `Express` 并将其保存到依赖列表中：
```js
$ npm install express --save
```

以上命令会将 Express 框架安装在当期目录的 node_modules 目录中， node_modules 目录下会自动创建 express 目录。以下几个重要的模块是需要与 express 框架一起安装的：  
```txt
body-parser - node.js 中间件，用于处理 JSON, Raw, Text 和 URL 编码的数据。
cookie-parser - 这就是一个解析Cookie的工具。通过req.cookies可以取到传过来的cookie，并把它们转成对象。
multer - node.js 中间件，用于处理 enctype="multipart/form-data"（设置表单的MIME编码）的表单数据。
```
```js
$ npm install body-parser --save
$ npm install cookie-parser --save
$ npm install multer --save  
```


### request 和 response 对象的具体介绍：

Request 对象 - request 对象表示 HTTP 请求，包含了请求查询字符串，参数，内容，HTTP 头部等属性。常见属性有：
```js
req.app：                               当callback为外部文件时，用req.app访问express的实例
req.baseUrl：                           获取路由当前安装的URL路径
req.body / req.cookies：                获得「请求主体」/ Cookies
req.fresh / req.stale：                 判断请求是否还「新鲜」
req.hostname / req.ip：                 获取主机名和IP地址
req.originalUrl：                       获取原始请求URL
req.params：                            获取路由的parameters
req.path：                              获取请求路径
req.protocol：                          获取协议类型
req.query：                             获取URL的查询参数串
req.route：                             获取当前匹配的路由
req.subdomains：                        获取子域名
req.accpets（）：                       检查请求的Accept头的请求类型
req.acceptsCharsets / req.acceptsEncodings / req.acceptsLanguages
req.get（）：                           获取指定的HTTP请求头
req.is（）：                            判断请求头Content-Type的MIME类型
```

Response 对象 - response 对象表示 HTTP 响应，即在接收到请求时向客户端发送的 HTTP 响应数据。常见属性有：  

```js
res.app：                               同req.app一样
res.append（）：                        追加指定HTTP头
res.set（）在res.append（）后将重置之前设置的头
res.cookie（name，value [，option]）：  设置Cookie
opition: domain / expires / httpOnly / maxAge / path / secure / signed
res.clearCookie（）：                  清除Cookie
res.download（）：                     传送指定路径的文件
res.get（）：                          返回指定的HTTP头
res.json（）：                         传送JSON响应
res.jsonp（）：                        传送JSONP响应
res.location（）：                     只设置响应的Location HTTP头，不设置状态码或者close response
res.redirect（）：                     设置响应的Location HTTP头，并且设置状态码302
res.send（）：                         传送HTTP响应
res.sendFile（path [，options] [，fn]）：传送指定路径的文件 -会自动根据文件extension设定Content-Type
res.set（）：                          设置HTTP头，传入object可以一次设置多个头
res.status（）：                       设置HTTP状态码
res.type（）：                         设置Content-Type的MIME类型  
```