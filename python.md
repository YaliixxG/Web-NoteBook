# Python

#### Python 是一种解释型、面向对象、动态数据类型的高级程序设计语言。

#### Python 官网：https://www.python.org/

## Python 函数

1. 规则

你可以定义一个由自己想要功能的函数，以下是简单的规则：

-   函数代码块以 def 关键词开头，后接函数标识符名称和圆括号()。
-   任何传入参数和自变量必须放在圆括号中间。圆括号之间可以用于定义参数。
-   函数的第一行语句可以选择性地使用文档字符串—用于存放函数说明。
-   函数内容以冒号起始，并且缩进。
-   return [表达式] 结束函数，选择性地返回一个值给调用方。不带表达式的 return 相当于返回 None。

2.  语法

        def functionname( parameters ):
        "函数_文档字符串"
        function_suite
        return [expression]

实例：

        # 定义函数
        def printme(str):
            "打印传入的参数"
            print(str)
            return

        #调用函数
        printme("调用函数")

## 命名空间和作用域

> 一个 Python 表达式可以访问局部命名空间和全局命名空间里的变量。如果一个局部变量和一个全局变量重名，则局部变量会覆盖全局变量。每个函数都有自己的命名空间。类的方法的作用域规则和通常函数的一样。Python 会智能地猜测一个变量是局部的还是全局的，它假设任何在函数内赋值的变量都是局部的。因此，如果要给函数内的全局变量赋值，必须使用 global 语句。

        #!/usr/bin/python
        # -*- coding: UTF-8 -*-

        Money = 2000
        def AddMoney():
        # 想让Money变成全局变量就取消以下注释:
        # global Money
        Money = Money + 1

        print Money
        AddMoney()
        print Money

## Python 中的包

> 包是一个分层次的文件目录结构，它定义了一个由模块及子包，和子包下的子包等组成的 Python 的应用环境。简单来说，包就是文件夹，但该文件夹下必须存在 **init**.py 文件, 该文件的内容可以为空。**init**.py 用于标识当前文件夹是一个包。

考虑一个在 package_runoob 目录下的 demo1.py、demo2.py、**init**.py 文件，test.py 为测试调用包的代码，目录结构如下：

        test.py
        package_demo
        |-- __init__.py
        |-- demo1.py
        |-- demo2.py




        # 1.package_demo/demo1.py 文件代码如下
        #!/usr/bin/python
        # -*- coding: UTF-8 -*-

        def demo1():
        print "I'm in demo1"

        # 2.package_demo/demo2.py 文件代码如下
        #!/usr/bin/python
        # -*- coding: UTF-8 -*-

        def demo1():
        print "I'm in demo2"

        # 3.现在，在 package_demo 目录下创建 __init__.py：
        # __init__.py文件代码如下
        #!/usr/bin/python
        # -*- coding: UTF-8 -*-

        if __name__ == '__main__':
            print '作为主程序运行'
        else:
            print 'package_demo 初始化'


        # 然后我们在 package_demo 同级目录下创建 test.py 来调用 package_demo 包
        # test.py文件代码如下
        #!/usr/bin/python
        # -*- coding: UTF-8 -*-

        # 导入 Phone 包
        from package_demo.demo1 import demo1
        from package_demo.demo2 import demo2

        demo1()
        demo2()

        # 以上实例输出结果：
        package_demo 初始化
        I'm in demo1
        I'm in demo2

## 基础语法

### 行和缩进

> 学习 Python 与其他语言最大的区别就是，Python 的代码块不使用大括号 {} 来控制类，函数以及其他逻辑判断。python 最具特色的就是用缩进来写模块。缩进的空白数量是可变的，但是所有代码块语句必须包含相同的缩进空白数量，这个必须严格执行。

### 多行语句

1.  斜杠（ \）将一行的语句分为多行显示，如下所示：

        total = item_one + \
                item_two + \
                item_three

2.  语句中包含 [], {} 或 () 括号就不需要使用多行连接符。如下实例：

        days = ['Monday', 'Tuesday', 'Wednesday',
                'Thursday', 'Friday']

### Python 注释

1. #号
2. """ 或者 ‘’‘

## Python 变量类型

### 标准数据类型

-   Numbers（数字）
-   String（字符串）
-   List（列表）
-   Tuple（元组）
-   Dictionary（字典）

### Python 列表

1. 列表用 [ ] 标识，是 python 最通用的复合数据类型。
2. 列表中值的切割也可以用到变量 [头下标:尾下标] ，就可以截取相应的列表，从左到右索引默认 0 开始，从右到左索引默认 -1 开始，下标可以为空表示取到头或尾。

### Python 元组

1. 元组用"()"标识。内部元素用逗号隔开。
2. 元组不能二次赋值，相当于只读列表，元祖可以看成是“不允许更新的列表”

### Python 字典

1.字典用"{ }"标识。字典由索引(key)和它对应的值 value 组成。

### Python 数据类型转换

-   int(x,base)
    -   将 x 转换为一个整数。x 为带转化的数字或者字符串，base 可写可不写，为进制数，默认十进制。
-   long(x,base)
    -   将 x 转换为一个长整数。
-   str(x)

    -   将对象 x 转换为字符串。

            >>>s = 'RUNOOB'
            >>> str(s)
            'RUNOOB'
            >>> dict = {'runoob': 'runoob.com', 'google': 'google.com'};
            >>> str(dict)
            "{'google': 'google.com', 'runoob': 'runoob.com'}"
            >>>

-   repr(x)
    -   将对象 x 转换为表达式字符串。
-   eval(str)

    -   用来计算在字符串中的有效 Python 表达式,并返回一个对象。

            >>>x = 7
            >>> eval( '3 * x' )
            21
            >>> eval('pow(2,2)')
            4
            >>> eval('2 + 2')
            4
            >>> n=81
            >>> eval("n + 4")
            85

-   tuple(s)

    -   将序列 s 转换为一个元组。

            >>>tuple([1,2,3,4])

            (1, 2, 3, 4)

            >>> tuple({1:2,3:4})    #针对字典 会返回字典的key组成的tuple

            (1, 3)

            >>> tuple((1,2,3,4))    #元组会返回元组自身

            (1, 2, 3, 4)

-   list(s)
    -   将序列 s 转换为一个列表。
-   set(s)

    -   转换为可变集合。

            >>>x = set('runoob')
            >>> y = set('google')
            >>> x, y
            (set(['b', 'r', 'u', 'o', 'n']), set(['e', 'o', 'g', 'l']))   # 重复的被删除
            >>> x & y         # 交集
            set(['o'])
            >>> x | y         # 并集
            set(['b', 'e', 'g', 'l', 'o', 'n', 'r', 'u'])
            >>> x - y         # 差集
            set(['r', 'b', 'u', 'n'])
            >>>

-   dict(d)

    -   创建一个字典。d 必须是一个序列 (key,value)元组。

              >>>dict()                        # 创建空字典
              {}
              >>> dict(a='a', b='b', t='t')     # 传入关键字
              {'a': 'a', 'b': 'b', 't': 't'}
              >>> dict(zip(['one', 'two', 'three'], [1, 2, 3]))   # 映射函数方式来构造字典
              {'three': 3, 'two': 2, 'one': 1}
              >>> dict([('one', 1), ('two', 2), ('three', 3)])    # 可迭代对象方式来构造字典
              {'three': 3, 'two': 2, 'one': 1}
              >>>

## Python 条件语句

        if 判断条件：
            执行语句……
        else：
            执行语句……

        if 判断条件1:
            执行语句1……
        elif 判断条件2:
            执行语句2……
        elif 判断条件3:
            执行语句3……
        else:
            执行语句4……

-   并且 and
-   或者 or

## Python 循环语句

-   while 循环

    -   在给定的判断条件为 true 时执行循环体，否则退出循环体

            count = 0
            while (count < 9):
            print 'The count is:', count
            count = count + 1

            print "Good bye!"

*   for 循环

          for letter in 'Python':     # 第一个实例
          print '当前字母 :', letter

          fruits = ['banana', 'apple',  'mango']
          for fruit in fruits:        # 第二个实例
          print '当前水果 :', fruit

          print "Good bye!"

*   pass 语句

    pass 不做任何事情，一般用做占位语句。

## Python Number(数字)

-   整型(Int) - 通常被称为是整型或整数，是正或负整数，不带小数点。
-   长整型(long integers) - 无限大小的整数，整数最后是一个大写或小写的 L。
-   浮点型(floating point real values) - 浮点型由整数部分与小数部分组成，浮点型也可以使用科学计数法表示（2.5e2 = 2.5 x 102 = 250）
-   复数(complex numbers) - 复数由实数部分和虚数部分构成，可以用 a + bj,或者 complex(a,b)表示， 复数的实部 a 和虚部 b 都是浮点型。
