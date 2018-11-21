
 

### Windows安装示例

1.首先搭建Masterlab的运行环境，这里使用集成包 `Xampp`，最新版下载地址:
  https://www.apachefriends.org/xampp-files/7.2.11/xampp-win32-7.2.11-0-VC15-installer.exe
  下载好后将xampp安装在硬盘的根目录，如 C:/xampp
  
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
    hornet-framework     php开发框架
    masterlab            源码
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

4.打使用xampp自带的phpMyAdmin `http://localhost/phpmyadmin/` 创建数据库 `masterlab`
 
```sql
create database masterlab character set utf8mb4 collate utf8mb4_unicode_ci;
```

创建好数据库后，将根目录下的 `masterlab.sql` 导入到数据库中

Mysql5.6版本（包含）以下版本需要安装sphinx全文搜索引擎，下载地址 `http://www.masterlab.vip/download.php?file=sphinx-for-chinese-windows.zip`,解压至
`C:/www/sphinx`，修改配置文件 `C:/www/sphinx/bin/sphinx.conf`,
```
    source masterlab_issue
    {
            type                    = mysql
            sql_host                = 127.0.0.1
            sql_user                = root
            sql_pass                =
            sql_db                  = masterlab
            sql_port                = 3306
    
            sql_query_pre		= SET NAMES utf8
            sql_query               = select * from issue_main
            #sql_attr_uint          = id
            #sql_attr_timestamp     = date_added
            sql_attr_string        = id
    }
    
    index issue
    {
        source			= masterlab_issue
        path			= C:/www/sphinx/var/data/issue
        docinfo			= extern
        charset_type = utf-8
        chinese_dictionary = C:/www/sphinx/etc/xdict
    }
    
    indexer
    {
        mem_limit		= 256M
    }
    
    searchd
    {
        listen			= 9312
        listen			= 9306:mysql41
        log				= C:/www/sphinx/var/log/searchd.log
        query_log		= C:/www/sphinx/var/log/query.log
        read_timeout	= 5
        max_children	= 30
        pid_file		= C:/www/sphinx/var/log/searchd.pid
        max_matches		= 1000
        seamless_rotate	= 1
        preopen_indexes	= 1
        unlink_old		= 1
        workers			= threads # for RT to work
        binlog_path		= C:/www/sphinx/var/data
    }

```

在 `C:/www/sphinx/` 下执行索引构建和启动服务命令
```
  C:/www/sphinx/bin/indexer.exe --all
  C:/www/sphinx/bin/searchd.exe
``` 

5.将根目录下的 `env.ini-example` 重命名为 `env.ini`

6.修改masterlab的配置文件

 ```
   app/config/deploy/app.cfg.php`     # 主配置文件,将 ROOT_URL 修改为 http://www.yoursite.com/ , 后面的斜杠不能少!
   app/config/deploy/database.cfg.php # 数据库的连接配置
   
```

8.重启Apache，在浏览器中访问`www.yoursite.com`即可

9.配置Redis,如果启用了Redis缓存功能将显著提高Masterlab的访问性能，下载Redis的windows版本,下载地址 
`https://github.com/MicrosoftArchive/redis/releases`，下载最新的 zip 文件，解压至于 `C:/www/redis`,
直接运行 `redis-server.exe` 启动redis，默认配置是
```text
 host 127.0..0.1
 port 6379
```
启用缓存 还需要修改php的以下配置文件
 ```
   app/config/deploy/app.cfg.php`     # 主配置文件,将 ENABLE_CACHE 修改为 true
   app/config/deploy/cache.cfg.php    # Redis的连接配置,$_config['enable'] 为设置为 true
```
10.定时任务，Masterlab中的图表功能需要定时执行脚本
 ```text
 每一个小时计算冗余的项目数据
 C:\xampp\php\php.exe  C:/www/masterlab/app/server/timer/project.php
 
 每天晚上 23.55 计算每个项目的冗余数据
 C:\xampp\php\php.exe  C:/www/masterlab/app/server/timer/projectDayReport.php

 每天晚上 23.50 计算每个迭代的冗余数据
 C:\xampp\php\php.exe  C:/www/masterlab/app/server/timer/sprintDayReport.php
```

