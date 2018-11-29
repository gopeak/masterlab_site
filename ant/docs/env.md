

### 环境要求
```
- Web Server : Nginx or Apache
- Php
  - 版本 >= 5.6 
  - 扩展 ：curl,mysqlnd,pdo,opcache,mbstring,redis
  - php.ini ： short_open_tag = On
- Mysql
  - 版本 >= 5.5

-  masterlab\app\storage 要求写入权限
```

### Windows运行环境配置
windows环境我们建议直接使用 Xampp 或 WampServer 集成安装包，然后再额外的安装redis扩展即可，建议使用WampServer 最新版本，
集成 `Apache 2.4.27 – Php7.1.9 – MySQL 5.7.19`
修改 php.ini 配置即可
```
   short_open_tag = On
   upload_max_filesize = 8M
   post_max_size = 8M
   memory_limit = 128M
   max_execution_time = 30
   
   [Redis]
       extension=redis
```
Windows Xampp 安装 Masterlab示例 http://www.masterlab.vip/help.php?md=install-windows  

### Linux运行环境配置
 
   网上有很多 Nginx+Mysql5.7+Php7.2+Redis 的配置指南，我们也提供以下文档供您参考安装
 
   - Centos6 http://www.masterlab.vip/help.php?md=setup_centos6
   - Centos7 http://www.masterlab.vip/help.php?md=setup_centos7
   - Ubuntu http://www.masterlab.vip/help.php?md=setup_ubuntu
   
   Linux 安装 Masterlab示例 http://www.masterlab.vip/help.php?md=install-linux  

### 安装步骤

 1. 下载代码，可前往官方网站 http://www.masterlab.vip/download.php 下载最新的完整包.
或者从 github上克隆代码
 2. 在web服务器添加虚拟主机并绑定到 app/public 目录
 3. 在Mysql中创建一个数据库,字符集为 utf8mb4 ,然后将根目录的 masterlab.sql 导入到数据库中
 4. 配置全文搜索
 5. 将根目录下的 env.ini-example 重命名为 env.ini
 6. 修改php配置文件,
 7. 重启web服务器
 8. 启用redis缓存
 9. 执行定时任务

###  
 