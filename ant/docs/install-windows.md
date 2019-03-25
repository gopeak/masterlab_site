


## Windows安装示例

### 一、环境安装和配置

1.首先搭建Masterlab的运行环境，这里使用集成包 `Wampserver`，下载地址:
```text
# 官方下载地址,选择64位的版本 wampserver3.1.4_x64.exe
https://sourceforge.net/projects/wampserver/files/WampServer%203/WampServer%203.0.0/wampserver3.1.7_x64.exe/download

```
  注：请下载 3.1.4_x64. 版本否则接下来安装的路径可能出错
  下载好后将 `Wampserver` 安装在硬盘的根目录，如 C:/wamp64
  
  
2.安装Redis Server，下载地址 http://www.masterlab.vip/download.php?file=Redis-x64-3.0.501.zip
  解压至于 C:\bin\Redis 目录，在命令行界面下执行 
  ```
    C:\bin\Redis\redis-server.exe C:\bin\Redis\redis.windows.conf
```
  
3.修改 `c:\wamp64\bin\apache\apache2.4.35\bin\php.ini` 配置项
  ```
   short_open_tag = On
   upload_max_filesize = 8M
   post_max_size = 8M
   memory_limit = 128M
   max_execution_time = 30
   
  ```
4.安装 redis 扩展, 下载地址 https://windows.php.net/downloads/pecl/releases/redis/4.2.0/ ,选择下载 `php_redis-4.2.0-7.2-ts-vc15-x64.zip`,
 解压至 `C:\wamp64\bin\php\php7.2.10\ext`，在 `c:\wamp64\bin\apache\apache2.4.35\bin\php.ini` 增加
 
   ```
[Redis]
extension=php_redis
    
   ```

### 二、下载Masterlab代码

下载最新版本的完整代码  http://www.masterlab.vip/download.php?file=masterlab-full-last.zip ，
 解压到 C 盘的 C:/www 目录下,解压后的目录结构如下:
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
      |--   php.ini    
      |--   README.md
```

### 三、Apache配置Masterlab的虚拟主机
1.修改 `Wampserver` 中的Apache配置文件

   + 打开 C:\wamp64\bin\apache\apache2.4.35\conf\httpd.conf文件,找到

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

2.打开 `C:\wamp64\bin\apache\apache2.4.35\conf\extra\httpd-vhosts.conf`文件，添加以下代码(为你自己的域名):

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


### 四、图文安装
1.访问 http://www.yoursite.com/install/ 按照提示进行安装 

2.登录系统，进入"管理\系统\邮件配置"页面，配置邮件发送功能


### 五、下载和运行 MasterlabSocket

 * win7操作系统可直接运行 C:/www/masterlab/bin 目录下 masterlab_socket.exe, 
 * 其他windows系统请访问 https://github.com/gopeak/masterlab_socket 进行编译,编译成功后，将 masterlab_socket.exe 拷贝到 C:/www/masterlab/bin 目录下
 然后直接点击运行


 
 
