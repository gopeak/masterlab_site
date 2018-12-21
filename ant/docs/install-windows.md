
 

### Windows安装示例

1.首先搭建Masterlab的运行环境，这里使用集成包 `Xampp`，最新版下载地址:
  https://www.apachefriends.org/xampp-files/7.2.11/xampp-win32-7.2.11-0-VC15-installer.exe
  下载好后将xampp安装在硬盘的根目录，如 C:/xampp
  
  为了能够支持全站搜索的中文字符集，建议安装Mysql5.7替换xampp自带的的 MariaDB10，Mysql5.7 window安装请参考 https://blog.csdn.net/qq_39340204/article/details/78593512
  
  安装Redis Server，下载地址 http://www.masterlab.vip/download.php?file=Redis-x64-3.0.501.zip
  解压至于 C:\bin\Redis 目录，在命令行界面下执行 C:\bin\Redis\redis-server.exe C:\bin\Redis\redis.windows.conf
  
  
  修改 C:/xampp/php/php.ini 配置项
  ```
   short_open_tag = On
   upload_max_filesize = 8M
   post_max_size = 8M
   memory_limit = 128M
   max_execution_time = 30
   
  ```
  安装 redis 扩展, 下载地址 https://windows.php.net/downloads/pecl/releases/redis/4.2.0/ ,选择下载 `php_redis-4.2.0-7.2-ts-vc15-x86.zip`,解压至 `C:/xampp/php/ext`
  在 `C:/xampp/php/php.ini` 增加
 
   ```
    [Redis]
    extension=redis
    
   ```

2.下载最新版本的完整代码包，解压到 C 盘的 C:/www 目录下
  解压后的目录结构如下:
```
    masterlab            
      |--   app   
      |--   bin  
      |--   lib    
      |--   travis
      |--   vendor
      |--   composer.json
      |--   env.ini-example       
      |--   LICENSE
      |--   masterlab.sql    
      |--   php.ini    
      |--   README.md
```

3.修改xampp中的Apache配置文件

   + 打开 xampp\apache\conf\httpd.conf文件,找到

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

+ 打开 `xampp\apache\conf\extra\httpd-vhosts.conf`文件，添加以下代码(为你自己的域名):

   ```apache
   <VirtualHost *:80>
    DocumentRoot "C:/www/masterlab/app/public"
    # 这里修改成你自己的域名
    ServerName  www.yoursite.com
    <Directory />    
        Options Indexes FollowSymLinks
        AllowOverride All      
        Allow from All     
    </Directory>    
    <Directory "C:/www/masterlab/app/public">    
        Options  Indexes FollowSymLinks    
        AllowOverride All    
        Order allow,deny    
        Allow from All    
    </Directory>    
	
    Alias /attachment "C:/www/masterlab/app/storage/attachment" 
    <Directory "C:/www/masterlab/app/storage/attachment">
		Options Indexes FollowSymLinks
		AllowOverride All
		Order allow,deny
		Allow from all
	</Directory>  
  </VirtualHost>
  ```
重启 Apache 服务器

4.访问 `http://www.yoursite.com/install/` 安装提示进行安装
 

5.登录系统，进入"管理\系统\邮件配置"页面，配置邮件发送功能


6.定时任务，Masterlab中的图表功能需要定时执行脚本
 ```text
 每一个小时计算冗余的项目数据
 C:\xampp\php\php.exe  C:/www/masterlab/app/server/timer/project.php
 
 每天晚上 23.55 计算每个项目的冗余数据
 C:\xampp\php\php.exe  C:/www/masterlab/app/server/timer/projectDayReport.php

 每天晚上 23.50 计算每个迭代的冗余数据
 C:\xampp\php\php.exe  C:/www/masterlab/app/server/timer/sprintDayReport.php
```

 
 
