
## Windows 宝塔环境 安装示例

  注：该教程在win7 64位操作系统下测试通过,其他windows系统过程相似 
  这里仅仅是示例，如果示例安装成功，那么将你的域名和相应的路径值修改就可以
  示例域名： www.yoursite.com  ，请根据自己的情况修改
  请在HOSTS文件中添加： 127.0.0.1 www.yoursite.com  
  
### 一、宝塔环境安装

1.下载Windows的`5.4`版本, 操作系统win7以下版本只能用5.4的旧版，windows10系统的请选择新版本
```text
# 下载地址 
https://www.bt.cn/download/windows.html

```
![1cut-201907231507112440.png](http://pm.masterlab.vip/attachment/image/20190723/1cut-201907231507112440.png "安装过程")  

下载好后根据提示进行安装 ，打开宝塔的主界面，发现 Web服务器 PHP Mysql 都没有默认安装，需要点击 到"环境"面板进行安装，按照以下图示进行  

安装 Apache2.4  
![1cut-201907231507132995.png](http://pm.masterlab.vip/attachment/image/20190723/1cut-201907231507132995.png "安装 Apache2.4  )
 
安装 Php7.1  
![1cut-201907231507317716.png](http://pm.masterlab.vip/attachment/image/20190723/1cut-201907231507317716.png "安装Web服务php7.1")

安装 Mysql5.7 
![1cut-201907231507479685.png](http://pm.masterlab.vip/attachment/image/20190723/1cut-201907231507479685.png "安装 Mysql5.7 ")  

按下面图示设置Mysql新的root密码:  
![1cut-201907231507428797.png](http://pm.masterlab.vip/attachment/image/20190723/1cut-201907231507428797.png "设置Mysql新的root密码")  

启用web面板，如下图操作
![1cut-201907231907559271.png](http://pm.masterlab.vip/attachment/image/20190723/1cut-201907231907559271.png "启用web面板")

重启你的电脑，否则后面的添加网站步骤可能不生效

点击 “web面板”，安装php的redis扩展
![1cut-201907231907434885.png](http://pm.masterlab.vip/attachment/image/20190723/1cut-201907231907434885.png "安装扩展")  
![1cut-201907231907007025.png](http://pm.masterlab.vip/attachment/image/20190723/1cut-201907231907007025.png "安装扩展")  

### 二、下载Masterlab代码

1. 下载最新版本的完整代码  http://www.masterlab.vip/download.php?file=masterlab-full-last.zip ，
 解压到 c 盘的 c:/wwwroot 目录下,解压后的目录结构如下:
```
    c:/wwwroot/masterlab_full            
      |--   app   
      |--   bin    
      |--   lib    
      |--   travis
      |--   vendor
      |--   composer.json
      |--   env.ini-example       
      |--   LICENSE
      |--   php.ini    
      |--   README.md
```

2.添加网站,点击宝塔“网站”面板创建网站

![1cut-201907231907522690.png](http://pm.masterlab.vip/attachment/image/20190723/1cut-201907231907522690.png "添加网站")  

3.修改宝塔中的Apache主配置文件，找到 httpd.conf 文件

   + 打开 C:\BtSoft\WebSoft\apache\conf\httpd.conf文件,(注:如果找不到文件， 请自行查找)  
   找到

   ```apache
    <Directory />
        AllowOverride none
        Require all denied
    </Directory>
  ```
   替换为
   ```apache
    <Directory />
      Options FollowSymLinks
      AllowOverride All      
      Allow from All  
    </Directory>
  ```
<br>

4.点击宝塔“Web面板”修改网站的Apache的配置  
![1cut-201907231907035389.png](http://pm.masterlab.vip/attachment/image/20190723/1cut-201907231907035389.png "修改网站的Apache的配置")  
找到内容
```
    <Directory "C:/wwwroot/masterlab_full/app/public">    
        Options  Indexes FollowSymLinks    
        AllowOverride All    
        Order allow,deny    
        Allow from All    
    </Directory>    
 
```
在后面添加
```text
    Alias /attachment "C:\wwwroot\masterlab_full\app\storage\attachment" 
    <Directory "C:\wwwroot\masterlab_full\app\storage\attachment">
		Options Indexes FollowSymLinks
		AllowOverride All
		Order allow,deny
		Allow from all
	</Directory>
```
重启电脑再启动宝塔

### 三、安装和运行Redis服务器
   
  Redis Server，下载地址 http://www.masterlab.vip/download.php?file=Redis-x64-3.0.501.zip
  解压至于 `d:\bin\Redis` 目录，在命令行界面下执行 
  ```
    d:\bin\Redis\redis-server.exe d:\bin\Redis\redis.windows.conf
```

### 四、图文安装  


1.访问 http://www.yoursite.com/install/ 按照提示进行安装  
  注：如果以后想在内网中其他用户访问，修改 app/config/deploy/app.cfg.php 中的ROOT_URL,将你的ip地址代替域名  

![1cut-201907090007493572.png](http://pm.masterlab.vip/attachment/image/20190709/1cut-201907090007493572.png "截图-1cut-201907090007493572.png")  

![1cut-201907090007063115.png](http://pm.masterlab.vip/attachment/image/20190709/1cut-201907090007063115.png "截图-1cut-201907090007063115.png")  

![1cut-201907090007572430.png](http://pm.masterlab.vip/attachment/image/20190709/1cut-201907090007572430.png "截图-1cut-201907090007572430.png")  

![1cut-201907090007238368.png](http://pm.masterlab.vip/attachment/image/20190709/1cut-201907090007238368.png "截图-1cut-201907090007238368.png")  

![1cut-201907090007246651.png](http://pm.masterlab.vip/attachment/image/20190709/1cut-201907090007246651.png "截图-1cut-201907090007246651.png")

2.登录系统，进入"管理\系统\邮件配置"页面，配置邮件发送功能  


### 五、下载和运行 MasterlabSocket  

 * win7操作系统可直接运行 C:\wwwroot/masterlab/bin 目录下 masterlab_socket.exe,  
 * 其他windows系统请访问 https://github.com/gopeak/masterlab_socket 进行编译,编译成功后，将 masterlab_socket.exe 拷贝到 C:\wwwroot/masterlab/bin 目录下  
 然后直接点击运行  


 
 
