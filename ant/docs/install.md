 



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

 1.下载代码，可前往官方网站 http://www.masterlab.vip/download.php 下载最新的完整包.
或者从 github上克隆代码
```bash
   # 下载开发框架
   git clone https://github.com/gopeak/hornet-framework.git
   # 从master分支克隆代码或release直接下载
   git clone https://github.com/gopeak/masterlab.git
   # 安装依赖类库
   cd masterlab
   composer update
```

 2. 在web服务器添加虚拟主机并绑定到 app/public 目录

 3. 将根目录下的 env.ini-example 重命名为 env.ini

 4. 在Mysql中创建一个数据库,字符集为 utf8mb4 ,然后将根目录的 masterlab.sql 导入到数据库中

 4. 修改 app/config/deploy/app.cfg.php 文件中的 ROOT_URL 常量

 5. 修改 app/config/deploy/database.cfg.php 文件中的数据库配置

 6. 重启web服务器


### Windows安装示例

1.首先搭建Masterlab的运行环境，这里为简便安装，直接使用已经打包集成好的Xampp，下载地址:
```
https://www.apachefriends.org/xampp-files/7.2.11/xampp-win32-7.2.11-0-VC15-installer.exe
```
下载好后将xampp安装在硬盘的根目录，如 D:/xampp


2.下载Masterlab最新版本的完整代码包，将masterlab解压到 c 盘的 www 目录下


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

+ 打开 xampp\apache\conf\extra\httpd-vhosts.conf文件,添加以下代码(为你自己的域名):

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


4. 打使用xampp自带的phpMyAdmin http://localhost/phpmyadmin/ 创建数据库 masterlab
 
```sql
create database masterlabdefault character set utf8mb4 collate utf8mb4_unicode_ci;
```

创建好后，将masterlab根目录下的masterlab.sql导入到数据库中


5. 将根目录下的 env.ini-example 重命名为 env.ini


6. 将 masterlab/app/config/deploy/app.cfg.php 文件中的 ROOT_URL 常量值修改为
```
http://www.yoursite.com/
```

7. 修改 masterlab/app/config/deploy/database.cfg.php 文件中的数据库连接配置

8.重启Apache，在浏览器中访问`www.yoursite.com`即可。



### Linux 安装步骤

* 环境准备
  安装过程使用 git 和 composer ,同时还要搭建Nginx+Mysql5.7+Php7.2+Redis的运行环境，安装过程可参考下面文档，如果已经有则忽略
```
http://www.yoursite.com/
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
* 创建数据库，数据库创建命令
```sql
create database masterlabdefault character set utf8mb4 collate utf8mb4_unicode_ci;
```
导入数据库
```sql
source /data/www/masterlab/masterlab.sql
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

修改 app/config/deploy/app.cfg.php 文件中的 ROOT_URL 常量  

```php 

    // 修改为你自己的域名，特别注意不能少了后面的 / 
    define('ROOT_URL', 'http://www.yoursitecom/');

```

修改 app/config/deploy/database.cfg.php 文件中的数据库配置  

```php 
$_config = array(
    'database' =>
        array(
            'default' =>
                array(
                    'driver' => 'mysql',
                    'host' => '127.0.0.1',
                    'port' => '3306',
                    'user' => 'hornet', //hornet
                    'password' => 'hornet2017@.@', // hornet2017@.@
                    'db_name' => 'masterlab_pm',
                    'charset' => 'utf8',
                    'timeout' => 10,
                    'show_field_info' => false,
                ),
            'framework_db' =>
                array(
                    'driver' => 'mysql',
                    'host' => '127.0.0.1',
                    'port' => '3306',
                    'user' => 'hornet',
                    'password' => 'hornet2017@.@',
                    'db_name' => 'xphp_test',
                    'charset' => 'utf8',
                    'timeout' => 10,
                    'show_field_info' => false,
                ),
            'log_db' =>
                array(
                    'driver' => 'mysql',
                    'host' => '127.0.0.1',
                    'port' => '3306',
                    'user' => 'hornet',
                    'password' => 'hornet2017@.@',
                    'db_name' => 'masterlab_pm',
                    'charset' => 'utf8',
                    'timeout' => 10,
                    'show_field_info' => false,
                ),
        ),
    'config_map_class' =>
        array(
            'default' =>
                array(),
            'framework_db' =>
                array(
                    0 => 'FrameworkUserModel',
                    1 => 'FrameworkCacheKeyModel',
                ),
            'log_db' =>
                array(
                    0 => 'UnitTestUnitModel'
                ),
        ),
);

```

 * 重启web服务器,访问你刚才设置的域名即可,管理员初始账号 master 密码 MasterLab520

