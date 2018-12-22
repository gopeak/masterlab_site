

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
 wget -c http://www.masterlab.vip/download.php?file=masterlab-full-last.zip  -O masterlab.zip
unzip masterlab.zip -d ./masterlab
cd masterlab
```
 
* nginx 配置虚拟主机映射至 `/data/www/masterlab/app/public`

```nginx
server {
    listen 80;
    # 你的域名
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

 * 重启web服务器,访问你刚才设置的域名  http://www.yoursite.com/install ，安装图文提示进行安装
 
 

 * 设置定时任务
```
0,30 22-23 * * * /usr/bin/php /data/www/masterlab/app/server/timer/project.php
55 23 * * * /usr/bin/php /data/www/masterlab/app/server/timer/projectDayReport.php
56 23 * * * /usr/bin/php /data/www/masterlab/app/server/timer/sprintDayReport.php

```


 
 

