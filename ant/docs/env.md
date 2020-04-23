

### 环境要求  
Apache+Php+Mysql 或 Nginx+Php+Mysql 
```
- Web Server : Nginx 或 Apache
- Php
  - 版本 >= 7.0
  - 必备扩展 ：curl,mysqlnd,pdo,opcache,mbstring,redis,ldap
  - php.ini   修改 upload_max_filesize = 8M
  - php.ini   修改 post_max_size = 8M
  - php.ini   修改 memory_limit = 128M  
  - php.ini   修改 max_execution_time = 30  
  
- Mysql
  - 版本 >= 5.6
-  masterlab/app/config/deploy 目录要求写入权限
-  masterlab/app/storage 目录要求写入权限
-  masterlab/app/public/attachment 目录要求写入权限
-  masterlab/app/public/install 目录要求写入权限
```
 

### Windows

[基于手动安装（适合学习和研究者，耗时约3分钟）](./help.php?md=install-windows-pure "官方纯净版安装-Apache2.4 PHP7.4 Mysql5.8 ")  
[基于宝塔6.4安装(小白专用，耗时约2分钟)](./help.php?md=install-windows-bt6.4 "基于宝塔6.4")  
[基于Wampserver（备用安装方案）](./help.php?md=install-windows-wamp "基于Wampserver")  

### Linux

   http://www.masterlab.vip/help.php?md=install-linux  

