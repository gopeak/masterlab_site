

###Linux 安装步骤

* 环境准备
  安装之前需要有:web服务器(Nginx 或 Apache),Php,Mysql,Redis的运行环境 ，Linux的各操作系统的运行环境可参考下面文档，如果已经安装过则忽略  
 
   - Centos6 http://www.masterlab.vip/help.php?md=setup_centos6
   - Centos7 http://www.masterlab.vip/help.php?md=setup_centos7
   - Ubuntu http://www.masterlab.vip/help.php?md=setup_ubuntu
   
 如果您的Linux Web服务器使用的是Apache，可参考 [Windows安装示例](./help.php?md=install-windows "Windows安装示例") 的Apache配置   

* 下载Masterlab代码
    ```text
    # ubuntu系统请在命令前加 sudo
    mkdir /data/
    mkdir /data/www/
    cd /data/www/
    wget -c http://download.888zb.com/masterlab-last.zip  -O masterlab.zip
    unzip masterlab.zip -d ./masterlab
    cd masterlab
    ```
 
* nginx 配置虚拟主机映射至 `/data/www/masterlab/app/public`
   在`/etc/nginx/conf.d/` 新增配置文件 masterlab.conf   
    
    ```text
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
 * 重启web服务器和php-fpm,访问你刚才设置的域名  http://www.yoursite.com/install ，安装图文提示进行安装
 

 * 配置 MasterlabSocket  
    MasterlabSocket 是Masterlab用于异步发送邮件以及定时计算数据的后台程序（该程序不运行masterlab也是可以登录使用的）
    下载地址 https://github.com/gopeak/masterlab_socket/releases/tag/v1.1 
    放置于 masterlab 的 bin 目录下( 请勿覆盖cron.json文件)，赋予权限运行即可
 ```text
    chmod +x /data/www/masterlab/bin/masterlab_socket
    # 建议将masterlab_socket作为后台程序运行
    ./masterlab_socket start -d
```

 * 配置缓存
  安装好后，使用管理员登录系统，在“系统/缓存/修改”配置 是否启用redis缓存  
  启用redis缓存可提高程序的执行性能  
 
 * 配置邮件发送
  安 使用管理员登录系统，在“系统/邮件配置/修改”配置邮件发送功能，如果你没有自己的smtp服务器，建议关闭邮件推送功能，否则
  在masterlab执行操作时会出现卡慢的情况   
  
  
 

 


