
## Windows Wampserver 安装示例

  注：该教程在win7 64位操作系统下测试通过,其他windows系统过程相似，只是要选对应的Wampserver版本
  
### 一、环境安装和配置

1.下载Apache+PHP+Mysql集成包:Wampserver3:  
```text
# 官方下载地址, 选择64位的版本 wampserver3.1.9_x64.exe
https://sourceforge.net/projects/wampserver/files/WampServer%203/WampServer%203.0.0/

# 百度网盘下载 
链接：https://pan.baidu.com/s/1BhEhlVSVljISTTmjfHQdLg 
提取码：jg55 
```
  

  下载好后将 `Wampserver` 安装在硬盘的根目录，如 `d:/wamp64`  
  安装完毕后将 php版本切换到 7.3 ，再将 short_open_tag 启用，如下图所示  
  ![1cut-201907082307437473.png](http://pm.masterlab.vip/attachment/image/20190708/1cut-201907082307437473.png "截图-1cut-201907082307437473.png")
  
  ![1cut-201907082307081145.png](http://pm.masterlab.vip/attachment/image/20190708/1cut-201907082307081145.png "截图-1cut-201907082307081145.png")

  
2.安装 redis 扩展, 下载地址 https://windows.php.net/downloads/pecl/releases/redis/4.2.0/ ,选择下载 `php_redis-4.2.0-7.3-ts-vc15-x64.zip`,
 解压至 `d:\wamp64\bin\php\php7.3.5\ext` 目录，在 `d:\wamp64\bin\apache\apache2.4.39\bin\php.ini` 末尾增加一下内容，然后重启Apache
 
   ```
[Redis]
extension=php_redis
   ```  
    
3.安装Redis Server，下载地址 http://www.masterlab.vip/download.php?file=Redis-x64-3.0.501.zip
  解压至于 `d:\bin\Redis` 目录，在命令行界面下执行 
  ```
    d:\bin\Redis\redis-server.exe d:\bin\Redis\redis.windows.conf
```


### 二、下载Masterlab代码

下载最新版本的完整代码  http://www.masterlab.vip/download.php?file=masterlab-full-last.zip ，
 解压到 d 盘的 d:/www 目录下,解压后的目录结构如下:
```
    d:/www/masterlab            
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

### 三、Apache配置Masterlab的虚拟主机
1.修改 `Wampserver` 中的Apache配置文件

   + 打开 d:\wamp64\bin\apache\apache2.4.39\conf\httpd.conf文件,(注:如果找不到文件， apache的版本可能不一样请自行查找)  
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

2.打开 `d:\wamp64\bin\apache\apache2.4.39\conf\extra\httpd-vhosts.conf`文件，添加以下代码(为你自己的域名):

   ```apache
   <VirtualHost *:80>
    DocumentRoot "d:/www/masterlab/app/public"
    # 这里修改成你自己的域名
    ServerName  www.yoursite.com
    <Directory />    
        Options Indexes FollowSymLinks
        AllowOverride All      
        Allow from All     
    </Directory>    
    <Directory "d:/www/masterlab/app/public">    
        Options  Indexes FollowSymLinks    
        AllowOverride All    
        Order allow,deny    
        Allow from All    
    </Directory>    
	
    Alias /attachment "d:/www/masterlab/app/storage/attachment" 
    <Directory "d:/www/masterlab/app/storage/attachment">
		Options Indexes FollowSymLinks
		AllowOverride All
		Order allow,deny
		Allow from all
	</Directory>  
  </VirtualHost>
  ```
重启 Apache 服务器


### 四、图文安装  

如果没有域名可修改hosts，在 C:\Windows\System32\drivers\etc\hosts 文件中加入
```text
127.0.0.1 www.yoursite.com
```

1.访问 http://www.yoursite.com/install/ 按照提示进行安装  
  注：如果以后要修改域名，也要同时修改 app/config/deploy/app.cfg.php 中的ROOT_URL 

![1cut-201907090007493572.png](http://pm.masterlab.vip/attachment/image/20190709/1cut-201907090007493572.png "截图-1cut-201907090007493572.png")  


![1cut-201907090007063115.png](http://pm.masterlab.vip/attachment/image/20190709/1cut-201907090007063115.png "截图-1cut-201907090007063115.png")  

![1cut-201907090007572430.png](http://pm.masterlab.vip/attachment/image/20190709/1cut-201907090007572430.png "截图-1cut-201907090007572430.png")  

![1cut-201907090007238368.png](http://pm.masterlab.vip/attachment/image/20190709/1cut-201907090007238368.png "截图-1cut-201907090007238368.png")  

![1cut-201907090007246651.png](http://pm.masterlab.vip/attachment/image/20190709/1cut-201907090007246651.png "截图-1cut-201907090007246651.png")

2.登录系统，进入"管理\系统\邮件配置"页面，配置邮件发送功能  


### 五、下载和运行 MasterlabSocket  

 * win7操作系统可直接运行 d:/www/masterlab/bin 目录下 masterlab_socket.exe,  
 * 其他windows系统请访问 https://github.com/gopeak/masterlab_socket 进行编译,编译成功后，将 masterlab_socket.exe 拷贝到 C:/www/masterlab/bin 目录下  
 然后直接点击运行  


 
 
