

### 配置要求  
```
- Web Server : Nginx 或 Apache
- Php
  - 版本 >= 5.6 
  - 必备扩展 ：curl,mysqlnd,pdo,opcache,mbstring,redis
  - php.ini   修改 upload_max_filesize = 8M
  - php.ini   修改 post_max_size = 8M
  - php.ini   修改 memory_limit = 128M  
  - php.ini   修改 max_execution_time = 30  
  
- Mysql
  - 版本 >= 5.7

-  masterlab\app\storage 目录要求写入权限
-  masterlab\app\public\attachment 目录要求写入权限
-  masterlab\app\public\install 目录要求写入权限
```
 

### Windows

[2分钟安装Apache2.4 PHP7.4 Mysql5.8纯净版（强烈推荐!）](./help.php?md=install-windows-pure "官方纯净版安装-Apache2.4 PHP7.4 Mysql5.8 ")  
[基于Wampserver](./help.php?md=install-windows-wamp "基于Wampserver")  
[基于宝塔(bt.cn)](./help.php?md=install-windows-bt "基于宝塔(bt.cn)")  

### Linux
 
   完整的Linux安装Masterlab示例  
   http://www.masterlab.vip/help.php?md=install-linux  

