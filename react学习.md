## 1. React简介
+ React 起源于 Facebook 的内部项目，因为该公司对市场上所有 JavaScript MVC 框架，都不满意，就决定自己写一套，用来架设 Instagram（照片交友） 的网站。做出来以后，发现这套东西很好用，**就在2013年5月开源了**。
+ Angular1 2009 年  谷歌    MVC  不支持 组件化开发
+ 由于 React 的**设计思想极其独特**，属于革命性创新，性能出众，代码逻辑却非常简单。所以，越来越多的人开始关注和使用，认为它可能是将来 Web 开发的主流工具。
+ 清楚两个概念：
  + library（库）：小而巧的库，只提供了特定的API；优点就是 船小好掉头，可以很方便的从一个库切换到另外的库；但是代码几乎不会改变；
  + Framework（框架）：大而全的是框架；框架提供了一整套的解决方案；所以，如果在项目中间，想切换到另外的框架，是比较困难的；




## 2. 前端三大主流框架

> 三大框架一大抄

+ Angular.js：出来**较早**的前端框架，学习曲线比较陡，NG1学起来比较麻烦，NG2 ~ NG5开始，进行了一系列的改革，也提供了组件化开发的概念；从NG2开始，也支持使用TS（TypeScript）进行编程；
+ Vue.js：**最火**（关注的人比较多）的一门前端框架，它是中国人开发的，对我我们来说，文档要友好一些；
+ React.js：**最流行**（用的人比较多）的一门框架，因为它的设计很优秀；




## 3. React与vue的对比
### 组件化方面
1. **什么是模块化：**是从**代码**的角度来进行分析的；把一些可复用的代码，抽离为单个的模块；便于项目的维护和开发；
2. **什么是组件化：** 是从 **UI 界面**的角度 来进行分析的；把一些可服用的UI元素，抽离为单独的组件；便于项目的维护和开发；
3. **组件化的好处**：随着项目规模的增大，手里的组件越来越多；很方便就能把现有的组件，拼接为一个完整的页面；
4. **Vue是如何实现组件化的**： 通过 `.vue` 文件，来创建对应的组件；
   + template  结构
   + script        行为
   + style           样式


5. **React如何实现组件化**：大家注意，React中有组件化的概念，但是，并没有像vue这样的组件模板文件；React中，一切都是以JS来表现的；因此要学习React，JS要合格；ES6 和 ES7 （async  和 await） 要会用；
### 开发团队方面
+ React是由FaceBook前端官方团队进行维护和更新的；因此，React的维护开发团队，技术实力比较雄厚；
+ Vue：第一版，主要是有作者 尤雨溪 专门进行维护的，当 Vue更新到 2.x 版本后，也有了一个以 尤雨溪 为主导的开源小团队，进行相关的开发和维护；

### 社区方面
+ 在社区方面，React由于诞生的较早，所以社区比较强大，一些常见的问题、坑、最优解决方案，文档、博客在社区中都是可以很方便就能找到的；
+ Vue是近两年才火起来的，所以，它的社区相对于React来说，要小一些，可能有的一些坑，没人踩过；

### 移动APP开发体验方面
+ Vue，结合 Weex 这门技术，提供了 迁移到 移动端App开发的体验（Weex，目前只是一个 小的玩具， 并没有很成功的 大案例；）
+ React，结合 ReactNative，也提供了无缝迁移到 移动App的开发体验（RN用的最多，也是最火最流行的）；





## 4. 为什么要学习React
1. 和Angular1相比，React设计很优秀，一切基于JS并且实现了组件化开发的思想；
2. 开发团队实力强悍，不必担心断更的情况；
3. 社区强大，很多问题都能找到对应的解决方案；
4. 提供了无缝转到 ReactNative 上的开发体验，让我们技术能力得到了拓展；增强了我们的核心竞争力；
5. 很多企业中，前端项目的技术选型采用的是React.js；





## 5. React中几个核心的概念
### 虚拟DOM（Virtual Document Object Model）
 + **DOM的本质是什么**：浏览器中的概念，用JS对象来表示 页面上的元素，并提供了操作 DOM 对象的API；
 + **什么是React中的虚拟DOM**：是框架中的概念，是程序员 用JS对象来模拟 页面上的 DOM 和 DOM嵌套；
 + **为什么要实现虚拟DOM（虚拟DOM的目的）**：为了实现页面中， DOM 元素的高效更新
 + **DOM和虚拟DOM的区别**：
    + **DOM**：浏览器中，提供的概念；用JS对象，表示页面上的元素，并提供了操作元素的API；

    + **虚拟DOM**：是框架中的概念；而是开发框架的程序员，手动用JS对象来模拟DOM元素和嵌套关系；

      + 本质： 用JS对象，来模拟DOM元素和嵌套关系；
      + 目的：就是为了实现页面元素的高效更新；

      ![虚拟DOM - 表格排序案例](images/虚拟DOM引入图片.png)

### Diff算法
 - **tree diff**:新旧两棵DOM树，逐层对比的过程，就是 Tree Diff； 当整颗DOM逐层对比完毕，则所有需要被按需更新的元素，必然能够找到；

 - **component diff**：在进行Tree Diff的时候，每一层中，组件级别的对比，叫做 Component Diff；

    - 如果对比前后，组件的类型相同，则**暂时**认为此组件不需要被更新；
    - 如果对比前后，组件类型不同，则需要移除旧组件，创建新组件，并追加到页面上；

 - **element diff**：在进行组件对比的时候，如果两个组件类型相同，则需要进行 元素级别的对比，这叫做 Element Diff；

   ![Diff算法图](images/Diff.png)

## 6. 创建基本的webpack4.x项目

1. 运行`npm init -y` 快速初始化项目
2. 在项目根目录创建`src`源代码目录和`dist`产品目录
3. 在 src 目录下创建 `index.html`
4. 使用 cnpm 安装 webpack ，运行`cnpm i webpack webpack-cli -D`
   + 如何安装 `cnpm`: 全局运行 `npm i cnpm -g`
5. 注意：webpack 4.x 提供了 约定大于配置的概念；目的是为了尽量减少 配置文件的体积；
   + 默认约定了：
   + 打包的入口是`src` -> `index.js`
   + 打包的输出文件是`dist` -> `main.js`
   + 4.x 中 新增了 `mode` 选项(为必选项)，可选的值为：`development` 和 `production`;



## 7. 在项目中使用 react

1. 运行 `cnpm i react react-dom -S` 安装包

   + react： 专门用于创建组件和虚拟DOM的，同时组件的生命周期都在这个包中
   + react-dom： 专门进行DOM操作的，最主要的应用场景，就是`ReactDOM.render()`

2. 在`index.html`页面中，创建容器：

   ```html
   <!-- 容器，将来，使用 React 创建的虚拟DOM元素，都会被渲染到这个指定的容器中 -->
   <div id="app"></div>
   ```

3. 导入 包：

   ```js
   import React from 'react'
   import ReactDOM from 'react-dom'
   ```

4. 创建虚拟DOM元素：

   ```jsx
   // 这是 创建虚拟DOM元素的 API    <h1 title="啊，五环" id="myh1">你比四环多一环</h1>
   //  第一个参数： 字符串类型的参数，表示要创建的标签的名称
   //  第二个参数：对象类型的参数， 表示 创建的元素的属性节点
   //  第三个参数： 子节点
   const myh1 = React.createElement('h1', { title: '啊，五环', id: 'myh1' }, '你比四环多一环')
   ```


5. 渲染：

   ```js
   // 3. 渲染虚拟DOM元素
   // 参数1： 表示要渲染的虚拟DOM对象
   // 参数2： 指定容器,注意：这里不能直接放 容器元素的Id字符串，需要放一个容器的DOM对象
   ReactDOM.render(myh1, document.getElementById('app'))
   ```

   ​

## 8. JSX语法

> 什么是JSX语法：就是符合 xml 规范的 JS 语法；（语法格式相对来说，要比HTML严谨很多）

1. **如何启用 jsx 语法？**
   + 安装 `babel` 插件

     - 运行`cnpm i babel-core babel-loader babel-plugin-transform-runtime -D`
     - 运行`cnpm i babel-preset-env babel-preset-stage-0 -D`

   + 安装能够识别转换jsx语法的包 `babel-preset-react` 

     + 运行`cnpm i babel-preset-react -D`

   + 添加 `.babelrc` 配置文件

     ```json
     {
       "presets": ["env", "stage-0", "react"],
       "plugins": ["transform-runtime"]
     }
     ```

   + 添加babel-loader配置项：

     ```js
     module: { //要打包的第三方模块
         rules: [
           { test: /\.js|jsx$/, use: 'babel-loader', exclude: /node_modules/ }
         ]
     }
     ```
2. **jsx 语法的本质**：并不是直接把 jsx 渲染到页面上，而是 内部先转换成了 createElement 形式，再渲染的；

3. **在 jsx 中混合写入 js 表达式**：在 jsx 语法中，要把 JS代码写到 `{ }` 中

   + 渲染数字
   + 渲染字符串
   + 渲染布尔值
   + 为属性绑定值
   + 渲染jsx元素
   + 渲染jsx元素数组
   + 将普通字符串数组，转为jsx数组并渲染到页面上【两种方案】