

## Windows Apache2.4 PHP7.4 Mysql8 绿色纯净安装教程

 php运行环境的搭建是困扰新手们的一道难题，很多童鞋为了省事经常直接安装wamp集成软件， 
 这样虽然方便了新手童鞋，但是，个人觉得，这样对于深入学习及问题排错会造成相当的困扰，
 比如不知道是程序代码出现问题还是环境问题导致的。
 其实手动自行安装和配置环境，只要按照以下教程，整个时间花费还是很短的，文件下载完后2分钟内可以完成。
 

### 1. 文件下载和安装  
  首先下载所需的文件. 
  如果你不想到一个个下载修改配置文件，我这里把配置好的文件打包成一个zip文件，下载解压后，直接跳转到步骤5“MySQL配置”。
  打包文件下载地址：  http://download.888zb.com/phpenv.zip
  
    
  逐个下载方式（已经打包下载就免了）  
   #### VC运行库
```text
    # Apache和PHP运行需要 Microsoft visual c++ 2019 redistributable (x64) 
    VC15下载页面 https://support.microsoft.com/en-us/help/2977003/the-latest-supported-visual-c-downloads
    直接下载地址 https://aka.ms/vs/16/release/VC_redist.x64.exe
```  
 
  #### Apache2.4
  ```text
  # 选择 win64-VC15 2.4.41 版本
  官方下载页 https://www.apachelounge.com/download/VC15/
  直接下载地址 https://home.apache.org/~steffenal/VC15/binaries/httpd-2.4.41-win64-VC15.zip
  ```

  #### PHP7.4
  ```text
  # 选择 7.4.0-Win32-vc15-x64 版本
  官网下载地址 https://windows.php.net/downloads/releases/php-7.4.0-Win32-vc15-x64.zip
  ```

  #### PHP-Redis扩展库
  ```text
  #  这里选择 5.1.1-7.4-ts-vc15-x64 版本
  官网下载地址 https://windows.php.net/downloads/pecl/releases/redis/5.1.1/php_redis-5.1.1-7.4-ts-vc15-x64.zip
  ```
  #### Mysql8.0
  ```text
  官方下载页: https://dev.mysql.com/downloads/mysql/
  官方直接下载地址：https://dev.mysql.com/get/Downloads/MySQL-8.0/mysql-8.0.18-winx64.zip 
  163镜像直接下载地址：http://mirrors.163.com/mysql/Downloads/MySQL-8.0/mysql-8.0.18-winx64.zip
  ```
  #### Masterlab2.0
  ```text
  官方直接下载地址：http://download.888zb.com/masterlab-full-last.zip
  ```
   #### Redis-server3.0
   ```text
   直接下载地址：http://download.888zb.com/Redis-x64-3.0.504.zip
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
最后将 `php_redis-5.1.1-7.4-ts-vc15-x64.zip` 压缩包内的 `php-redis.dll` 文件解压到  `c:/phpenv/php-7.4/ext` 目录下    
注：如果你想安装别的版本，请确保 Apache，php，php的redis扩展都是一个VC库，比如我这里使用的都是VC15 64位的版本

### 2. Apache 配置
下面以`C:\phpenv`作为环境的基准目录  

首先编辑 `c:\phpenv\Apache24\conf\httpd.conf` 文件

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

在文件末尾增加
  ```text
# php7 support
LoadModule php7_module "c:/phpenv/php-7.4/php7apache2_4.dll"
AddType application/x-httpd-php .php .html .htm

# configure the path to php.ini
PHPIniDir "c:/phpenv/php-7.4"
```

 
保存 `c:\phpenv\Apache24\conf\httpd.conf`


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
 
  </VirtualHost>
```

### 3. PHP 配置

将 `c:/phpenv/php-7.4/php.ini-production` 重命名为 `c:/phpenv/php-7.4/php.ini`
修改 `c:/phpenv/php-7.4/php.ini` 

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

将php目录下的`libssh2.dll`放到Apache的`bin`目录下  

进入命令行启动 apache
  ```text
cd c:\phpenv\Apache24\bin
httpd.exe
 
```
![10000cut-201912302112512522.png](http://pm.masterlab.vip/attachment/image/20191230/10000cut-201912302112512522.png "Apache运行")   

启动成功没有报错的话，在浏览器中访问 http://localhost/p.php ,便可以查看php的配置输出 
 
![10000cut-201912302212385958.png](http://pm.masterlab.vip/attachment/image/20191230/10000cut-201912302212385958.png "php配置")

可以将Apache加入到服务中
  ```text
cd c:\phpenv\Apache24\bin
 httpd -k install 
```

### 4. 安装过程遇到的问题排除
 1. 本教程在windows7 ,windows10, windows server2008 64位操作系统下通过测试，其他32位操作系统请下载时改变对应的32版本即可
 2. 遇到`vcruntime140.dll` 错误的问题，请下载安装 vc_redist_x64/86.exe 运行库
 3. Apache默认80端口,如果已经被其他进程占用,请修改 `c:\phpenv\Apache24\conf\httpd.conf`  80 端口为其他

  
### 5. Mysql 配置
进入一个新的命令行
  ```text

# 进入bin目录
cd c:\phpenv\mysql-8.0\bin
# 安装mysql服务
mysqld  -install
# 执行初始化
mysqld --initialize-insecure
# 启动mysql服务
net start mysql

```
![1cut-201912301612416930.png](http://pm.masterlab.vip/attachment/image/20191230/1cut-201912301612416930.png "mysql启动") 

在Mysql根目录下创建配置文件 my.ini,内容如下：

  ```text
[client]
#客户端端口号为3306
port   = 3306
default-character-set=utf8
 
[mysqld]
# 设置3306端口
port = 3306
user = root
socket  =C:/phpenv/mysql-8.0/bin/mysql.sock
# 设置mysql的安装目录
basedir=C:/phpenv/mysql-8.0
# 设置 mysql数据库的数据的存放目录，MySQL 8+ 不需要以下配置，系统自己生成即可，否则有可能报错
#datadir=C:/phpenv/mysql-8.0/data
max_connections=128
character-set-server=utf8
default-storage-engine=INNODB
default_authentication_plugin=mysql_native_password

```
将my.ini文件路径加入到环境变量 Path 中

使用root用户操作数据库，这样很不安全，因此要要创建一个新的mysql用户  
打开一个新的命令行，通过sql命令创建: 用户名  dev_user , 密码 123456
  ```text
# root密码默认为空，如果错误可以查看 log/mysqld.log 
mysql -u root -h127.0.0.1
# 创建新用户并赋予权限
create user 'dev_user'@'%' identified by '123456';
alter user 'dev_user'@'%' IDENTIFIED WITH mysql_native_password BY '123456';
grant all privileges on *.* to 'dev_user'@'%';
flush privileges;
 
```
![1cut-201912301612126556.png](http://pm.masterlab.vip/attachment/image/20191230/1cut-201912301612126556.png "Mysql创建用户")  

使用Mysql管理工具Navicat测试是否连接成功  
![1cut-201912301612161636.png](http://pm.masterlab.vip/attachment/image/20191230/1cut-201912301612161636.png "Mysql连接")  


### 6. Redis-server 启动
直接运行 c:\phpenv\Redis-server\redis-server.exe 文件即可. 默认为 6379 端口，如果要改为Windows服务方式管理,执行以下命令
  ```text
# 进入目录  
cd c:\phpenv\Redis-server
# 注册服务，并命名为 redis-hd
redis-server.exe --service-install redis.windows.conf --service-name redis-hd

# 开启服务
sc start redis-hd

# 停止服务 sc stop redis-hd
# 删除服务 sc delete redis-hd
 
```
 

### 7. Masterlab 安装
 
在浏览器中访问  http://localhost/install  
请按照提示，一步一步执行即可  
需要注意的是，数据库服务器请使用 127.0.0.1 ,否则会提示连接失败

 ![1cut-201912301712329462.png](http://pm.masterlab.vip/attachment/image/20191230/1cut-201912301712329462.png "设置数据库")  
  
 ![1cut-201912301712302468.png](http://pm.masterlab.vip/attachment/image/20191230/1cut-201912301712302468.png "安装成功")  

如果要更换域名访问，则修改 `C:/phpenv/Apache24/conf/extra/httpd-vhosts.conf` 中的域名,然后重启Apache，  

good luck to u~~  


 
 