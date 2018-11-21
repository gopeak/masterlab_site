

###Linux 安装步骤

* 环境准备
  安装之前需要有 git 和 composer 命令行工具, 以及 Nginx+Mysql5.7+Php7.2+Redis 的运行环境，安装过程可参考下面文档，如果已经安装过则忽略
 
   - Centos6 http://www.masterlab.vip/help.php?md=setup_centos6
   - Centos7 http://www.masterlab.vip/help.php?md=setup_centos7
   - Ubuntu http://www.masterlab.vip/help.php?md=setup_ubuntu
 

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
 
 

