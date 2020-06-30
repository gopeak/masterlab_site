
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

![1cut-201907241207175254.png](http://pm.masterlab.vip/attachment/image/20190724/1cut-201907241207175254.png "安装过程")  

下载好后根据提示进行安装 ，打开宝塔的主界面，发现 Web服务器 PHP Mysql 都没有默认安装，需要点击 到"环境"面板进行安装，按照以下图示进行  

安装 Apache2.4   
  ![1cut-201907241207474175.png](http://pm.masterlab.vip/attachment/image/20190724/1cut-201907241207474175.png "安装 Apache")  
 
安装 Php7.1  
![1cut-201907241207498777.png](http://pm.masterlab.vip/attachment/image/20190724/1cut-201907241207498777.png "安装Web服务php7")

安装 Mysql5.7  
![1cut-201907231507479685.png](http://pm.masterlab.vip/attachment/image/20190723/1cut-201907231507479685.png "安装 Mysql5.7 ")  

按下面图示设置Mysql新的root密码:  
![1cut-201907231507428797.png](http://pm.masterlab.vip/attachment/image/20190723/1cut-201907231507428797.png "设置Mysql新的root密码")  

启用web面板，如下图操作
![1cut-201907231907559271.png](http://pm.masterlab.vip/attachment/image/20190723/1cut-201907231907559271.png "启用web面板")


点击 “web面板”，安装php的redis扩展
![1cut-201907231907434885.png](http://pm.masterlab.vip/attachment/image/20190723/1cut-201907231907434885.png "安装扩展")  
![1cut-201907231907007025.png](http://pm.masterlab.vip/attachment/image/20190723/1cut-201907231907007025.png "安装扩展")  

重启你的电脑，否则后面的添加网站步骤可能不生效  

### 二、下载Masterlab代码

1. 下载最新版本的完整代码  http://download.masterlab.vip/masterlab-last.zip ，
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

2. 添加网站,点击宝塔“网站”面板创建网站

![1cut-201907231907522690.png](http://pm.masterlab.vip/attachment/image/20190723/1cut-201907231907522690.png "添加网站")  

3. 修改宝塔中的Apache主配置文件，找到 httpd.conf 文件

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

4. 点击宝塔“Web面板”修改网站的Apache的配置  
![1cut-201907231907035389.png](http://pm.masterlab.vip/attachment/image/20190723/1cut-201907231907035389.png "修改网站的Apache的配置")  

5. 修改网站的伪静态设置   

```text
 <IfModule mod_rewrite.c>
	RewriteEngine on
	RewriteCond %{REQUEST_FILENAME} !-d
	RewriteCond %{REQUEST_FILENAME} !-f
	RewriteRule ^(.*)$ index.php?/$1 [QSA,PT,L]
</IfModule>
```  

如下图  
![1cut-201907241207233431.png](http://pm.masterlab.vip/attachment/image/20190724/1cut-201907241207233431.png "伪静态")  

6. 修改php.ini的disable_functions ,去掉`exec`    
![1cut-201907241207226072.png](http://pm.masterlab.vip/attachment/image/20190724/1cut-201907241207226072.png "去掉exec")  


重启电脑再启动宝塔

### 三、安装和运行Redis服务器
   
  Redis Server，下载地址 http://www.masterlab.vip/download.php?file=Redis-x64-3.0.501.zip
  解压至于 `d:\bin\Redis` 目录，在命令行界面下执行 
  ```
    d:\bin\Redis\redis-server.exe d:\bin\Redis\redis.windows.conf
```

### 四、图文安装  


1.访问 http://www.yoursite.com/install/ 按照提示进行安装  
 
2.登录系统，进入"管理\系统\邮件配置"页面，配置邮件发送功能  


### 五、下载和运行 MasterlabSocket  

 * win7操作系统可直接运行 C:\wwwroot\masterlab_full\bin 目录下 masterlab_socket.exe,  
 * 其他windows系统请访问 https://github.com/gopeak/masterlab_socket 进行编译,编译成功后，将 masterlab_socket.exe 拷贝到 C:\wwwroot\masterlab\bin 目录下  
 然后直接点击运行  


 
 
