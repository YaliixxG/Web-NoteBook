
问题描述
前后端完全分离的项目，前端使用Vue + axios，后端使用SpringMVC，容器为Tomcat。
使用CORS协议解决跨域访问数据限制的问题，但是发现客户端的Ajax请求不会自动带上服务器返回的Cookie：JSESSIONID。
导致每一个Ajax请求在服务端看来都是一个新的请求，都会在服务端创建新的Session（在响应消息头中设置Set-Cookie：JSESSIONID=xxx）。
而在项目中使用了Shiro框架，用户认证信息是放在Session中的，由于客户端不会把JSESSIONID返回给服务器端，因此使用Session策略存放数据的方式不可用。

原因分析
实际上，这是浏览器的同源策略导致的问题：不允许JS访问跨域的Cookie。
举个例子，现有网站A使用域名a.example.com，网站B使用域名b.example.com，如果希望在2个网站之间共享Cookie（浏览器可以将Cookie发送给服务器），那么在设置的Cookie的时候，必须设置domain为example.com。

解决方案
需要从2个方面解决：
1.服务器端使用CROS协议解决跨域访问数据问题时，需要设置响应消息头Access-Control-Allow-Credentials值为“true”。
同时，还需要设置响应消息头Access-Control-Allow-Origin值为指定单一域名（注：不能为通配符“*”）。

@Override
public void doFilter(ServletRequest request, ServletResponse response, FilterChain chain)
        throws IOException, ServletException {
    HttpServletRequest req = (HttpServletRequest)request;
    HttpServletResponse resp = (HttpServletResponse)response;
    
    String origin = req.getHeader("Origin");
    if(origin == null) {
        origin = req.getHeader("Referer");
    }
    resp.setHeader("Access-Control-Allow-Origin", origin);            // 允许指定域访问跨域资源
    resp.setHeader("Access-Control-Allow-Credentials", "true");       // 允许客户端携带跨域cookie，此时origin值不能为“*”，只能为指定单一域名
    
    if(RequestMethod.OPTIONS.toString().equals(req.getMethod())) {
        String allowMethod = req.getHeader("Access-Control-Request-Method");
        String allowHeaders = req.getHeader("Access-Control-Request-Headers");
        resp.setHeader("Access-Control-Max-Age", "86400");            // 浏览器缓存预检请求结果时间,单位:秒
        resp.setHeader("Access-Control-Allow-Methods", allowMethod);  // 允许浏览器在预检请求成功之后发送的实际请求方法名
        resp.setHeader("Access-Control-Allow-Headers", allowHeaders); // 允许浏览器发送的请求消息头
        return;
    }

    chain.doFilter(request, response);
}
2.客户端需要设置Ajax请求属性withCredentials=true，让Ajax请求都带上Cookie。

对于XMLHttpRequest的Ajax请求

var xhr = new XMLHttpRequest();
xhr.open('GET', url);
xhr.withCredentials = true; // 携带跨域cookie
xhr.send();

对于JQuery的Ajax请求

$.ajax({
type: "GET",
url: url,
xhrFields: {
    withCredentials: true // 携带跨域cookie
},
processData: false,
success: function(data) {
    console.log(data);  
}
});

对于axios的Ajax请求

axios.defaults.withCredentials=true; // 让ajax携带cookie