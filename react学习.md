## React 学习

React 如何实现组件化？  
React 中有组件化的概念，但是并没有像 VUE 这样的组件模板文件；React 中，一切都是以 JS 来表现的。（ES6,ES7)

### 核心概念

1. 虚拟 DOM

- DOM：`浏览器中的概念`，用 JS 对象来表示页面上的元素，并提供了操作 DOM 对象的 API
- 虚拟 DOM：`框架中的概念`，用 JS 对象来模拟页面上的 DOM 元素和 DOM 嵌套关系
- 为什么要实现虚拟 DOM：为了实现页面中，DOM 元素的高效更新

2. Diff 算法

- tree diff:新旧两颗 DOM 树，逐层对比的过程；当整颗 DOM 逐层对比完毕，则所有需要被按需更新的元素，必然能够找到。
- component diff:在进行 tree diff 的时候，每一层中，组件级别的对比；
  - 如果对比前后，组件的额类型相同，则暂时认为此组件不需要被更新
  - 如果对比前后，组件类型不同，则需要移除旧组件，创建新组件，并追加到页面上
- element diff:在进行组件对比的时候，如果两个组件类型相同，则需要进行元素级别的对比

3. 创建基本的 webpack4.x 项目

- 运行 `npm init -y` 快速初始化项目
- 在项目根目录创建`src`源代码和`dist`产品目录
- 在 src 目录下创建`index.html`
- 使用 npm 安装 webpack,运行 `cnpm i webpack webpack-cli -D`
  - 全局运行 `npm i cnpm -g`
- 注意：webpack 4.x 提供了约定大于配置的概念；目的是为了尽量减少配置文件的体积；默认约定了：
  - 打包的入口是 `src` -> `index.js`
  - 打包的输出文件是 `dist` -> `main.js`
- 4.x 中新增了 `mode`选项（此选项为必选项），可选值为：`development`（开发模式，不压缩）和`production`（产品模式，压缩）
