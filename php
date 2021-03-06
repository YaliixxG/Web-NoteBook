
PHP 中的每个代码行都必须以分号结束。分号是一种分隔符，用于把指令集区分开来。

-----------------------------------------------------------------------------------------
基本的 PHP 语法

1.PHP 脚本可以放在文档中的任何位置。

2.PHP 脚本以 <?php 开始，以 ?> 结束：
   
                                <?php
                                        
                                // PHP 代码
                                        
                                ?>

3.PHP 文件的默认文件扩展名是 ".php"。

4.PHP 文件通常包含 HTML 标签和一些 PHP 脚本代码。

5.有两种在浏览器输出文本的基础指令：echo 和 print。
                                <?php
                                echo "Hello World!";
                                ?>

--------------------------------------------------------------------------------------------

PHP 变量规则：

1.变量以 $ 符号开始，后面跟着变量的名称
2.变量名必须以字母或者下划线字符开始
3.变量名只能包含字母数字字符以及下划线（A-z、0-9 和 _ ）
4.变量名不能包含空格
5.变量名是区分大小写的（$y 和 $Y 是两个不同的变量）

变量是用于存储信息的"容器"：
                          <?php
                            $x=5;
                            $y=6;
                            $z=$x+$y;
                            echo $z;
                            ?>
php没有声明变量的命令，变量在第一次赋值时就被创建，并且会根据变量的值，自动把变量转换为正确的数据类型

-------------------------------------------------------------------------------------------------------

PHP 变量作用域

变量的作用域是脚本中变量可被引用/使用的部分。

PHP 有四种不同的变量作用域：

local
global                            要在一个函数中访问一个全局变量，需要使用 global 关键字。
                                    <?php 
                                    $x=5;   //全局
                                    $y=10;  //全局

                                    function myTest()                                          
                                    { 
                                    global $x,$y; //函数内访问全局变量，需要用global关键字
                                    $y=$x+$y;     // 其实还可以这么写 $GLOBALS['y']=$GLOBALS['x']+$GLOBALS['y']; 
                                                  //PHP 将所有全局变量存储在一个名为 $GLOBALS[index] 的数组中。 index 保存变量的名称。这个数组可以在函数内部访问，也可以直接用来更新全局变量。
                                    } 

                                    myTest(); 
                                    echo $y; // 输出 15 
                                    ?>
                                    
static                           当一个函数完成时，它的所有变量通常都会被删除。然而，有时候您希望某个局部变量不要被删除。要做到这一点，请在您第一次声明变量时使用 static 关键字
parameter                        函数定义中参数

局部作用域和全局作用域
在所有函数外部定义的变量，拥有全局作用域。除了函数外，全局变量可以被脚本中的任何部分访问。