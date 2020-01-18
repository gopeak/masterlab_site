

### 配置要求
```
- Web Server : Nginx 或 Apache
- Php
  - 版本 >= 5.6 
  - 必备扩展 ：curl,mysqlnd,pdo,opcache,mbstring,redis
  - php.ini ： 需要short_open_tag = On
- Mysql
  - 版本 >= 5.7

-  masterlab\app\storage 目录要求写入权限
-  masterlab\app\public\attachment 目录要求写入权限
-  masterlab\app\public\install 目录要求写入权限
```

### Windows运行环境配置
建议使用手动安装和配置 Apache+PHP+Mysql 环境，参考链接 http://www.masterlab.vip/help.php?md=install-windows-pure  
还要修改PHP的 php.ini 一下选项   
```
   short_open_tag = On
   upload_max_filesize = 8M
   post_max_size = 8M
   memory_limit = 128M
   max_execution_time = 30
 
```
Windows安装Masterlab示例 http://www.masterlab.vip/help.php?md=install-windows  

### Linux运行环境配置
 
   网上有很多 Nginx+Mysql5.7+Php7.2+Redis 的配置指南，我们也提供以下文档供您参考安装
 
   - Centos6 http://www.masterlab.vip/help.php?md=setup_centos6
   - Centos7 http://www.masterlab.vip/help.php?md=setup_centos7
   - Ubuntu http://www.masterlab.vip/help.php?md=setup_ubuntu
   
   Linux安装Masterlab示例 http://www.masterlab.vip/help.php?md=install-linux  

