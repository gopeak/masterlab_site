

### 环境要求
```
- Web Server : Nginx or Apache
- Php
  - 版本 >= 5.6 
  - 扩展 ：curl,mysqlnd,pdo,opcache,mbstring,redis
  - php.ini ： 
- Mysql
  - 版本 >= 5.5
  - 其他 ： 启用 innodb引擎 和 ngram全文索引，禁用严格模式

```

### 安装步骤

 1. 下载代码，可前往官方网站 http://www.masterlab.vip/download.php 下载最新的完整包.
或者从 github上克隆代码
 2. 在web服务器添加虚拟主机并绑定到 app/public 目录
 3. 在Mysql中创建一个数据库,字符集为 utf8mb4 ,然后将根目录的 masterlab.sql 导入到数据库中
 4. 配置全文搜索
 5. 将根目录下的 env.ini-example 重命名为 env.ini
 6. 修改php配置文件,
 7. 重启web服务器
 8. 启用redis缓存
 9. 执行定时任务

### Windows安装示例

1.首先搭建Masterlab的运行环境，这里为简便安装，直接使用已经集成好的 `Xampp`，下载地址:
```
https://www.apachefriends.org/xampp-files/7.2.11/xampp-win32-7.2.11-0-VC15-installer.exe
```
下载好后将xampp安装在硬盘的根目录，如 D:/xampp


2.下载最新版本的完整代码包，解压到 c 盘的 www 目录下

3.修改xampp中的Apache配置文件

   + 打开 xampp\apache\conf\httpd.conf文件,找到

   ```apache
    <Directory />
      ..
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
    DocumentRoot "c:/www/masterlab/app/public"
    # 这里修改成你自己的域名
    ServerName  www.yoursite.com
    <Directory />    
        Options Indexes FollowSymLinks
        AllowOverride All      
        Allow from All     
    </Directory>    
    <Directory "c:/www/masterlab/app/public">    
        Options  Indexes FollowSymLinks    
        AllowOverride All    
        Order allow,deny    
        Allow from All    
    </Directory>    
	
    Alias /attachment "c:/www/masterlab/app/storage/attachment" 
    <Directory "c:/www/masterlab/app/storage/attachment">
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

Mysql5.6版本（包含）以下版本需要安装sphinx全文搜索引擎，下载地址 `http://www.masterlab.vip/sphinx-zh.zip`,解压至
`C:\www/sphinx`，修改配置文件 `C:/www/sphinx-for-chinese/bin/sphinx.conf`,
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
        path			= C:/www/masterlab/bin/sphinx-for-chinese/var/data/issue
        docinfo			= extern
        charset_type = utf-8
        chinese_dictionary = C:/www/masterlab/bin/sphinx-for-chinese/etc/xdict
    }
    
    indexer
    {
        mem_limit		= 256M
    }
    
    searchd
    {
        listen			= 9312
        listen			= 9306:mysql41
        log				= C:/www/masterlab/bin/sphinx-for-chinese/var/log/searchd.log
        query_log		= C:/www/masterlab/bin/sphinx-for-chinese/var/log/query.log
        read_timeout	= 5
        max_children	= 30
        pid_file		= C:/www/masterlab/bin/sphinx-for-chinese/var/log/searchd.pid
        max_matches		= 1000
        seamless_rotate	= 1
        preopen_indexes	= 1
        unlink_old		= 1
        workers			= threads # for RT to work
        binlog_path		= C:/www/masterlab/bin/sphinx-for-chinese/var/data
    }

```

在 `C:/www/masterlab/bin/sphinx-for-chinese/` 下执行索引构建和启动服务命令
```
  C:/www/masterlab/bin/sphinx-for-chinese/bin/indexer.exe --all
  C:/www/masterlab/bin/sphinx-for-chinese/bin/searchd.exe
``` 

5.将根目录下的 `env.ini-example` 重命名为 `env.ini`

6.修改php配置文件

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
10. 定时任务，Masterlab中的图表功能需要定时执行脚本
 ```
 每一个小时计算冗余的项目数据
 C:\xampp\php\php.exe  c:/www/masterlab/app/server/timer/project.php
 
 每天晚上 23.55 计算每个项目的冗余数据
 C:\xampp\php\php.exe  c:/www/masterlab/app/server/timer/projectDayReport.php

 每天晚上 23.50 计算每个迭代的冗余数据
 C:\xampp\php\php.exe  c:/www/masterlab/app/server/timer/sprintDayReport.php
 
```


### Linux 安装步骤

* 环境准备
  安装过程使用 git 和 composer ,同时还要搭建Nginx+Mysql5.7+Php7.2+Redis的运行环境，安装过程可参考下面文档，如果已经安装过则忽略
```text
    Centos6 http://www.masterlab.vip/help.php?md=setup_centos6
    Centos7 http://www.masterlab.vip/help.php?md=setup_centos7
    Ubuntu http://www.masterlab.vip/help.php?md=setup_ubuntu
```

* 环境搭建好后下载Masterlab代码
```bash
mkdir /data/www/
cd /data/www/
git clone git@github.com:gopeak/hornet-framework.git
git clone git@github.com:gopeak/masterlab.git
cd masterlab
composer update
```
如果 composer 命令执行很慢，则可以修改为国内镜像，参考 https://pkg.phpcomposer.com/

* 创建数据库，数据库创建命令
```sql
create database masterlab character set utf8mb4 collate utf8mb4_unicode_ci;
```
导入数据库
```sql
source /data/www/masterlab/masterlab.sql
```
Mysql5.7以上版本,使用Ngram插件启用内置的全文索引
   ```mysql
        ALTER table issue_main add fulltext index fulltext_summary( `summary`) with parser ngram;
        ALTER table issue_main add fulltext index fulltext_summary_description( `summary`, `description`) with parser ngram;
        ALTER table project_main add fulltext index fulltext_name_description( `name`, `description`) with parser ngram;
        ALTER table project_main add fulltext index fulltext_name( `name`) with parser ngram;
```

* nginx 配置虚拟主机映射至 `/data/www/masterlab/app/public`

```nginx
server {
    listen 80;
    # 网站的域名
    server_name www.yoursite.com;

    # 程序的安装路径
    root /data/www/masterlab/app/public;

    index index.html index.htm index.php; 
	gzip on;
	gzip_min_length 1k;
	gzip_buffers 4 16k;
	#gzip_http_version 1.0;
	gzip_comp_level 2;
	gzip_types  application/javascript  text/plain application/x-javascript  application/json  text/css application/xml text/javascript application/x-httpd-php;

	gzip_vary off;
	gzip_disable "MSIE [1-6]\.";

    # 配置设置图片格式文件
    location ~* \.(jpg|jpeg|gif|png|ico|swf)$ {
        expires 3y; 
        access_log off; 
        # gzip off;
    }

    # 配置css/js文件
    location ~* \.(css|js)$ {
        access_log off;
        expires 3y;
    }

  # 禁止用户上传目录下所有.php文件的访问，提高安全性
    location ~ ^/files/.*\.(php|php5)$ {
        deny all;
    } 
    location ~ ^/attachment/.*\.(php|php5)$ {
        deny all;
    }
 
    location  /{
        if (!-e $request_filename) {
                rewrite ^/((?!upload).*)$ /index.php/$1 last;
                break;
         }
    }

    location ^~ /attachment/ {
        root  /data/www/masterlab/app/storage/;
    }

    location ~ \.php {
        fastcgi_pass   127.0.0.1:9000;
        fastcgi_index  index.php;
        fastcgi_split_path_info ^(.+\.php)(.*)$;
        fastcgi_param PATH_INFO $fastcgi_path_info;
        fastcgi_param  SCRIPT_FILENAME  $document_root$fastcgi_script_name;
        include        fastcgi_params;
     }

}

```

 * 将根目录下的 env.ini-example 重命名为 env.ini  
 
```bash
    cp -f /data/www/masterlab/env.ini-example /data/www/masterlab/env.ini
```

 * 修改配置文件

 ```
  # 主配置文件,将 ROOT_URL 修改为 http://www.yoursite.com/ , 注:后面的斜杠不能少;ENABLE_CACHE 设置为true
  app/config/deploy/app.cfg.php`    
   
  # 数据库的连接配置
  app/config/deploy/database.cfg.php 
  
  # Redis的连接配置，$_config['enable'] 设置为true
  app/config/deploy/cache.cfg.php    
   
```

 * 设置定时任务
```
0,30 22-23 * * * /usr/bin/php /data/www/masterlab/app/server/timer/project.php
55 23 * * * /usr/bin/php /data/www/masterlab/app/server/timer/projectDayReport.php
56 23 * * * /usr/bin/php /data/www/masterlab/app/server/timer/sprintDayReport.php

```

 * 重启web服务器,访问你刚才设置的域名,初始管理员账号 master 密码 testtest
 
 

