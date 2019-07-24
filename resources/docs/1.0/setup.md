# 安装酷博

---
- [添加域名解析](#section-1)
- [添加网站](#section-2)
- [安装酷博](#section-3)

<a name="section-1"></a>
## 添加域名解析
一个博客当然要有自己的专属域名啦，一个.com后缀的域名大概在五十人民币左右。如果还没有域名的朋友请先去注册购买一个。  
购买完毕后将dns解析到你的服务器ip上即可。
如果你的服务器在大陆网站是需要先备案才能正常访问的。具体备案流程请咨询你的服务器提供商，他们会协助你完成备案。

<a name="section-2"></a>
## 添加网站
添加完域名解析后，登录管理面板，依次点击左部菜单的网站，然后在点击添加网站：  
![添加网站](/images/docs/add_site.png)  
填写完毕后点击添加按钮。   
![网站信息](/images/docs/site_info.png)  
保存好数据库名、用户、密码等信息。后面会用到

<a name="section-3"></a>
## 安装酷博
通过SSH连上服务器，移动到网站根目录    
`cd /www/wwwroot/domian.com` 请将domian.com改为你自己的目录地址  

执行`composer create-project flex/blog`下载CoreBlog源码  
生成配置文件  
`cp .env.example .env`  
将.env文件中的数据库配置信息改为上方保存的信息。  
```DB_CONNECTION="mysql"
  DB_HOST="127.0.0.1" #数据库ip地址 默认即可
  DB_PORT=3306 #数据库端口 默认即可
  DB_DATABASE=blog #数据库名称
  DB_USERNAME=root #数据库用户名
  DB_PASSWORD=123456 #数据库密码
```
修改完毕后，执行安装命令  
`php artisan blog:install`  
至此, 安装完成 ^_^。