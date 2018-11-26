## localStorage 知识点：

### JS 对象

1. 读取形式：localStorage.name
2. 添加/修改：localStorage.name = "xuanyuan" 其中"xuanyuan"只能是字符串形式（目前为止只支持字符串）。所以存储时是 JSON 对象时需要执行下 JSON.stringify，所以获取时需要执行下 JSON.parse
3. 删除：detele localStorage.name

### API

1. 获取键值对数量：localStorage.length
2. 读取：localStorage.getItem('name'), localStorage.key(i)
3. 添加/修改：localStorage.setItem('name','xuanyuan')
4. 删除对应键值：localStorage.removeItem('name')
5. 删除所有数据：localStorage.clear()

### sessionStorage 与 localStorage

localStorage 有效期是永久的。一般的浏览器能存储的是 5MB 左右。sessionStorage api 与 localStorage 相同。  
sessionStorage 默认的有效期是浏览器的会话时间（也就是说标签页关闭后就消失了）。  
localStorage 作用域是协议、主机名、端口。（理论上，不人为的删除，一直存在设备中）  
sessionStorage 作用域是窗口、协议、主机名、端口。
