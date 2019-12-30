

## Windows Apache2.4 PHP7.4 Mysql8 绿色纯净安装教程

 php运行环境的搭建是困扰新手们的一道难题，很多童鞋为了省事经常直接安装wamp集成软件， 
 这样虽然方便了新手童鞋，但是，个人觉得，这样对于深入学习及问题排错会造成相当的困扰，
 比如不知道是程序代码出现问题还是环境问题导致的。
 其实手动自行安装和配置环境，只要按照以下教程，整个时间花费还是很短的，文件下载完后5分钟内可以完成。
 

### 1. 文件下载和安装  
  首先下载所需的文件，如果你不想到官方网站一个个的下载，我这里把配置好的文件打包成一个压缩包直接下载解压即可   
  打包下载地址： 
   ```text
    所有文件打包下载地址 https://
   ```
    
  逐个下载方式（如果打包下载了就不用一个个下载了）：  
  Apache，这里选择 win64-VC15 2.4.41 版本
  ```text
  官方下载页 https://www.apachelounge.com/download/VC15/
  直接下载地址 https://home.apache.org/~steffenal/VC15/binaries/httpd-2.4.41-win64-VC15.zip
  ```

  PHP，这里选择 7.4.0-Win32-vc15-x64 版本
  ```text
  官网下载地址 https://windows.php.net/downloads/releases/php-7.4.0-Win32-vc15-x64.zip
  ```

  PHP-Redis扩展库，这里选择 5.1.1-7.4-ts-vc15-x64 版本
  ```text
  官网下载地址 https://windows.php.net/downloads/pecl/releases/redis/5.1.1/php_redis-5.1.1-7.4-ts-vc15-x64.zip
  ```
  Mysql8，这里选择 8.0.18-winx64. 版本
  ```text
  官方下载页: https://dev.mysql.com/downloads/mysql/
  官方直接下载地址：https://dev.mysql.com/get/Downloads/MySQL-8.0/mysql-8.0.18-winx64.zip 
  163镜像直接下载地址：http://mirrors.163.com/mysql/Downloads/MySQL-8.0/mysql-8.0.18-winx64.zip
  ```
  Masterlab，这里选择 2.0 版本
  ```text
  官方直接下载地址：http://www.masterlab.vip/download.php?file=masterlab-v1.2.zip 
  ```
 

  VC运行库, Microsoft visual c++ 2019 redistributable (x64) 
  ```text
  VC15下载页面 https://support.microsoft.com/en-us/help/2977003/the-latest-supported-visual-c-downloads
  直接下载地址 https://aka.ms/vs/16/release/vc_redist.x64.exe 
  ```  
   
   下载完毕后，首先安装VC运行库，如果已经安装则忽略；然后将Apache，PHP，Mysql压缩包解压到统一的一个目录下，这里暂定为  c:/phpenv  
    解压后的目录结构为：
  ```text
    C:/phpenv            
      |--   Apache24   
      |--   php-7.4    
      |--   mysql-8.0 
      |--   www
            |-- masterlab
```
    最后将 PHP-Redis 压缩包内的 php-redis.dll 文件解压到  c:/phpenv/php-7.4/ext 目录下  
    注：如果你想安装别的版本，请确保 Apache，php，php的redis扩展都是一个VC库，比如我这里使用的都是VC15 64位的版本

### 2. Apache 配置
下面以`C:\phpenv`作为环境的基准目录  

首先编辑 `C:\phpenv\Apache24\conf\httpd.conf` 文件

找到
`Define SRVROOT "c:/Apache24"`
替换为
`Define SRVROOT "c:/phpenv/Apache24"`

找到
  ```text
<Directory />
    AllowOverride none
    Require all denied
</Directory>
```
替换为
  ```text
<Directory />
  Options FollowSymLinks
  AllowOverride All
  #Allow from All
</Directory>
```

找到
`;LoadModule rewrite_module modules/mod_rewrite.so`
去掉前面的`;`


找到
  ```text
<IfModule dir_module>
    DirectoryIndex index.html
</IfModule>
```
修改为
  ```text
<IfModule dir_module>
    DirectoryIndex index.html index.htm index.php
</IfModule>
```

找到
`#Include conf/extra/httpd-vhosts.conf`
去掉前面的`#`
 
保存 `C:\phpenv\Apache24\conf\httpd.conf`


打开 `C:/phpenv/Apache24/conf/extra/httpd-vhosts.conf`
增加内容
  ```text
  <VirtualHost *:80>
    DocumentRoot "c:/phpenv/www/masterlab/app/public"
    # 这里修改成你自己的域名
    ServerName  www.yoursite.com
    <Directory />
        Options Indexes FollowSymLinks
        AllowOverride All
        #Allow from All
    </Directory>
    <Directory "c:/phpenv/www/masterlab/app/public">
        Options  Indexes FollowSymLinks
        AllowOverride All
        #Order allow,deny
        #Allow from All
    </Directory>

    Alias /attachment "c:/phpenv/www/masterlab/app/storage/attachment"
    <Directory "c:/phpenv/www/masterlab/app/storage/attachment">
        Options Indexes FollowSymLinks
        AllowOverride All
        #Order allow,deny
        #Allow from all
    </Directory>
  </VirtualHost>
```
在文件末尾增加
  ```text
# php7 support
LoadModule php7_module "c:/phpenv/php-7.4/php7apache2_4.dll"
AddType application/x-httpd-php .php .html .htm

# configure the path to php.ini
PHPIniDir "c:/phpenv/php-7.4"
```

### 3. PHP 配置

将 `c:/phpenv/php-7.4/php.ini-production` 重命名为 `c:/phpenv/php-7.4/php.ini`
修改 `c:/phpenv/php-7.4/php.ini` 

找到
`short_open_tag = Off`
替换为
`short_open_tag = On`

找到
`error_reporting = E_ALL & ~E_DEPRECATED & ~E_STRICT`
替换为
`error_reporting = E_ERROR`

找到
`;extension_dir = "ext"`
替换为
`extension_dir = "C:/phpenv/php-7.4/ext"`

找到
  ```text
;extension=curl
;extension=gd2
;extension=mysqli
;extension=pdo_mysql
;extension=mbstring
```
去掉前面的 `;`


文件末尾增加
  ```text
[Redis]
extension=php_redis.dll
```



修改 masterlab 代码
找到 C:\phpenv\www\masterlab\lib\MyPdo.php 文件

将 $sqlMode = "SET SQL_MODE='IGNORE_SPACE,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION'";
替换为（其实删除 NO_AUTO_CREATE_USER ）
$sqlMode = "SET SQL_MODE='IGNORE_SPACE,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION'";


在php.ini中将extension=curl前的分号去掉；（默认情况下已经去掉）

将php目录下的libssh2.dll放到apache安装目录的bin目录下；
重启apache。



### 3. 修改hosts
在 `C:\Windows\System32\drivers\etc\hosts` 文件中加入
```text
127.0.0.1 www.yoursite.com
```
重启 apache

### 4. 修改管理密码
在浏览器中访问 http://www.yoursite.com/ 默认账号 master 密码 123456   
登录成功后在个人设置中修改密码即可  

good luck to u~~  


 
 


