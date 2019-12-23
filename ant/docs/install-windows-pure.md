

## Windows Apache2.4 PHP7.4 Mysql8 绿色纯净安装教程

Apache 

注：该示例仅在windows7下通过测试，其他windows版本还在调试中    

### 1. 下载和安装  
  首先下载所需的文件  
  Apache，这里选择 win64-VC15 2.4.41 版本
  ```text
  https://www.apachelounge.com/download/VC15/
  https://home.apache.org/~steffenal/VC15/binaries/httpd-2.4.41-win64-VC15.zip
  ```

  PHP，这里选择 7.4.0-Win32-vc15-x64 版本
  ```text
  https://windows.php.net/downloads/releases/php-7.4.0-Win32-vc15-x64.zip
  ```

  PHP-Redis扩展库，这里选择 5.1.1-7.4-ts-vc15-x64 版本
  ```text
  https://windows.php.net/downloads/pecl/releases/redis/5.1.1/php_redis-5.1.1-7.4-ts-vc15-x64.zip
  ```
  Mysql8，这里选择 8.0.18-winx64. 版本
  ```text
  https://windows.php.net/downloads/pecl/releases/redis/5.1.1/php_redis-5.1.1-7.4-ts-vc15-x64.zip
  ```

  VC运行库, Microsoft visual c++ 2019 redistributable (x64) 
  ```text
  https://support.microsoft.com/en-us/help/2977003/the-latest-supported-visual-c-downloads
  https://aka.ms/vs/16/release/vc_redist.x64.exe 
  ```  
   
   下载完毕后，首先安装VC运行库，如果已经安装则忽略；然后将Apache，PHP，Mysql压缩包解压到统一的一个目录下，这里暂定为  c:/phpenv  
    解压后的目录结构为：
  ```text
    c:/phpenv            
      |--   Apache24   
      |--   php-7.4    
      |--   mysql-8.0 
```
    最后将 PHP-Redis 压缩包内的 php-redis.dll 文件解压到  c:/phpenv/php-7.4/ext 目录下  

### 2. Apache 配置

编辑 `C:\phpenv\Apache24\conf\httpd.conf` 文件

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


 
 


