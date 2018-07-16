

定义全局变量
原理：
设置一个专用的的全局变量模块文件，模块里面定义一些变量初始状态，用export default 暴露出去，在main.js里面使用Vue.prototype挂载到vue实例上面或者在其它地方需要使用时，引入该模块便可。

全局变量模块文件：
Global.vue文件：

![vue1](global/vue1.png)

# 使用方式1：
在需要的地方引用进全局变量模块文件，然后通过文件里面的变量名字获取全局变量参数值。

在text1.vue组件中使用：

![vue2](global/vue2.png)
<!--more-->
# 使用方式2：
在程序入口的main.js文件里面，将上面那个Global.vue文件挂载到Vue.prototype。

    import global_ from './components/Global'//引用文件
    Vue.prototype.GLOBAL = global_//挂载到Vue实例上面
接着在整个项目中不需要再通过引用Global.vue模块文件，直接通过this就可以直接访问Global文件里面定义的全局变量。

text2.vue：

![vue3](global/vue3.png)

Vuex也可以设置全局变量：
通过vuex来存放全局变量，这里东西比较多，也相对复杂一些，有兴趣的小伙伴们，可自行查阅资料，折腾一波、

定义全局函数
原理
新建一个模块文件，然后在main.js里面通过Vue.prototype将函数挂载到Vue实例上面，通过this.函数名，来运行函数。

1. 在main.js里面直接写函数
简单的函数可以直接在main.js里面直接写

Vue.prototype.changeData = function (){//changeData是函数名
  alert('执行成功');
}
组件中调用：

this.changeData();//直接通过this运行函数
2. 写一个模块文件，挂载到main.js上面。
base.js文件，文件位置可以放在跟main.js同一级，方便引用

exports.install = function (Vue, options) {
   Vue.prototype.text1 = function (){//全局函数1
    alert('执行成功1');
    };
    Vue.prototype.text2 = function (){//全局函数2
    alert('执行成功2');
    };
};
main.js入口文件：

    import base from './base'//引用
    Vue.use(base);//将全局函数当做插件来进行注册
组件里面调用：

    this.text1();
    this.text2();

