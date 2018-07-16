
# webpack  
是一个现代 JavaScript 应用程序的静态模块打包器(module bundler)。当 webpack 处理应用程序时，它会递归地构建一个依赖关系图(dependency graph)，其中包含应用程序需要的每个模块，然后将所有这些模块打包成一个或多个 bundle。  

  * 入口(entry)
  * 输出(output)
  * loader
  * 插件(plugins)  
  <!--more-->

## 入口
入口起点(entry point)指示 webpack 应该使用哪个模块，来作为构建其内部依赖图的开始。进入入口起点后，webpack 会找出有哪些模块和库是入口起点（直接和间接）依赖的。  

### 单个入口简写语法：  

  webpack.config.js  

       
    const config = {
      entry: {
        main: './path/to/my/entry/file.js'
      }
    };  


### 对象语法  

 1.分离应用程序(app)和第三方库(vendor)入口   

  webpack.config.js  

    const config = {
     entry: {
     app: './src/app.js',
     vendors: './src/vendors.js'
     }
    }; 
 

2.多页面应用程序  

webpack.config.js  

    const config = {
     entry: {
     pageOne: './src/pageOne/index.js',
     pageTwo: './src/pageTwo/index.js',
     pageThree: './src/pageThree/index.js'
     }
    }; 

这是我们告诉webpack需要三个独立分离的依赖图  

## 输出  
output 属性告诉 webpack 在哪里输出它所创建的 bundles，以及如何命名这些文件，默认值为 ./dist。基本上，整个应用程序结构，都会被编译到你指定的输出路径的文件夹中。你可以通过在配置中指定一个 output 字段，来配置这些处理过程。  
### 用法
在 webpack 中配置 output 属性的最低要求是，将它的值设置为一个对象，包括以下两点：

* filename 用于输出文件的文件名。
* 目标输出目录 path 的绝对路径。  

 webpack.config.js  

        const config = {
              output: {
                filename: 'bundle.js',
                path: '/home/proj/public/assets'
              }
            };

        module.exports = config;
   

此配置将一个单独的 bundle.js 文件输出到 /home/proj/public/assets 目录中。  
### 多个入口起点  
 
    {
        entry:{
            app:'./src/app.js',
            search:'./src/search.js'
        },
        output:{
            filename:'[name].js',
            path: __dirname + '/dist'
        }
    }
    //写入到硬盘：./dist/app.js,./dist/search.js 
  
### 高级进阶  
使用CDN和资源hash的复杂示例   
config.js  
  
    output:{
        path:'home/proj/cdn/assets/[hash]',
        publicPath:'http://cdn.example.com/assets/[hash]/'
    } 
 
在编译时不知道最终输出文件的 publicPath 的情况下，publicPath 可以留空，并且在入口起点文件运行时动态设置。如果你在编译时不知道 publicPath，你可以先忽略它，并且在入口起点设置 __webpack_public_path__。  

    __webpack_public_path__ = myRuntimePublicPath

    // 剩余的应用程序入口
  
## loader  
loader 用于对模块的源代码进行转换。loader 可以使你在 import 或"加载"模块时预处理文件。因此，loader 类似于其他构建工具中“任务(task)”，并提供了处理前端构建步骤的强大方法。loader 可以将文件从不同的语言（如 TypeScript）转换为 JavaScript，或将内联图像转换为 data URL。loader 甚至允许你直接在 JavaScript 模块中 import CSS文件!  
### 使用
三种使用loader的方式：
* 配置（推荐）：在 webpack.config.js 文件中指定 loader。  
* 内联：在每个 import 语句中显式指定 loader。（具体看文档）
* CLI：在 shell 命令中指定它们。 （具体看文档）  

### 配置  
module.rules 允许你在 webpack 配置中指定多个 loader。 这是展示 loader 的一种简明方式，并且有助于使代码变得简洁。同时让你对各个 loader 有个全局概览：  
 
        module:{
                rules:[
                    {
                        test:/\.css$/,
                        use:[
                            {loader:'style-loader'},
                            {
                                loader:'css-loader',
                                options:{
                                    modules:true
                                }
                            }
                        ]
                    }
                ]
            }
        //loader 能够使用 options 对象进行配置。
 
## 插件   
插件是 webpack 的支柱功能。webpack 自身也是构建于，你在 webpack 配置中用到的相同的插件系统之上！

插件目的在于解决 loader 无法实现的其他事。  
### 用法  
由于插件可以携带参数/选项，你必须在 webpack 配置中，向 plugins 属性传入 new 实例。  

 webpack.config.js  

    const HtmlWebpackPlugin = require('html-webpack-plugin'); //通过 npm 安装
    const webpack = require('webpack'); //访问内置的插件
    const path = require('path');

    const config = {
      entry: './path/to/my/entry/file.js',
      output: {
        filename: 'my-first-webpack.bundle.js',
        path: path.resolve(__dirname, 'dist')
      },
      module: {
        rules: [
          {
            test: /\.(js|jsx)$/,
            use: 'babel-loader'
          }
        ]
      },
      plugins: [
        new webpack.optimize.UglifyJsPlugin(),
        new HtmlWebpackPlugin({template: './src/index.html'})
      ]
    };

    module.exports = config;
 
## 配置  
因为 webpack 配置是标准的 Node.js CommonJS 模块，你可以做到以下事情：
* 通过 require(...) 导入其他文件
* 通过 require(...) 使用 npm 的工具函数
* 使用 JavaScript 控制流表达式，例如 ?: 操作符
* 对常用值使用常量或变量
* 编写并执行函数来生成部分配置  

## 模块  
### 什么是webpack模块  
* ES2015 import 语句
* CommonJS require() 语句
* AMD define 和 require 语句
* css/sass/less 文件中的 @import 语句。
* 样式(url(...))或 HTML 文件(`<img src=...>`)中的图片链接(image url)

### 优化路径  

#### 1. resolve.extensions 
　　在webpack.base.conf.js中，我们可以看到resolve配置，其中的extengsions是一个数组，如下所示：

    extensions: ['.js', '.vue', '.json'],
　　通过这样的配置，我们在组件中过着路由中应用组件时，就可以更为方便的应用，比如：

  import Hello from '@components/Hello';
　　即Hello.vue这个组件我们不需要添加.vue后缀就可以引用到了，如果不用extensions， 我们就必须要用@components/Hello.vue来引入这个文件。 

 

 

#### 2. resolve.alias
　　在组件之间相互引用时，可能是下面这样的：
  
    import Hello from '../src.components/Hello';  

　　其中的路径是相对于当前页面的。 但是如果嵌套等更为复杂，那么写起来会比较麻烦。但是如果我们通过这样的配置：


      resolve: {
        extensions: ['.js', '.vue', '.json'],
        alias: {
          'vue$': 'vue/dist/vue.esm.js',
          '@pages': path.join(__dirname, "..", "src", "pages"),
          "@components": path.join(__dirname, "..", "src", "components"),
          // 注意： 静态资源通过src，不能这么设置。
          // "@assets": path.join(__dirname, "..", "src", "assets"),
        }
  

其中vue$表示引入vue，就可以像下面这么写：  
  
    import Vue from 'vue'  

　　另外，对于@pages和@components我们就可以直接引用了，而省去了一大堆的复杂应用，另外通过@可以消除歧义。如下所示：

    import Hello from '@components/Hello';


    import App from '@pages/App'  

　　值得注意的时： 在webpack.config.js中我们不能使用../ 以及./这种形式的路径方式，而是通过 path.join 和 __dirname 这种形式来表示路径，否则会报错。

　　另外： 在组件中，我们会引用一些静态文件，即static下的文件， 这时我们就不能用 alias 下的配置了，而必须使用一般的配置方式。  

## 构建目标  
因为服务器和浏览器代码都可以用 JavaScript 编写，所以 webpack 提供了多种构建目标(target)，你可以在你的 webpack 配置中设置。  

### 用法  
要设置 target 属性，只需要在你的 webpack 配置中设置 target 的值。  
webpack.config.js

    module.exports = {
      target: 'node'
    };  
  
在上面例子中，使用 node webpack 会编译为用于「类 Node.js」环境（使用 Node.js 的 require ，而不是使用任意内置模块（如 fs 或 path）来加载 chunk）。  

### 多个Target  
尽管 webpack 不支持向 target 传入多个字符串，你可以通过打包两份分离的配置来创建同构的库：  
webpack.config.js

    var path = require('path');
    var serverConfig = {
      target: 'node',
      output: {
        path: path.resolve(__dirname, 'dist'),
        filename: 'lib.node.js'
      }
      //…
    };

    var clientConfig = {
      target: 'web', // <=== 默认是 'web'，可省略
      output: {
        path: path.resolve(__dirname, 'dist'),
        filename: 'lib.js'
      }
      //…
    };

    module.exports = [ serverConfig, clientConfig ];

上面的例子将在你的 dist 文件夹下创建 lib.js 和 lib.node.js 文件。










