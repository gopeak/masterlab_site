centos下推荐使用yum包管理器来安装软件


### 先进行Mysql5.7安装
 
1.下载 MySQL yum包
```
wget http://repo.mysql.com/mysql57-community-release-el7-10.noarch.rpm
```
2.安装MySQL源
```
rpm -Uvh mysql57-community-release-el7-10.noarch.rpm
```
 
3.安装MySQL服务端,需要等待一些时间
```
yum install -y mysql-community-server
```
4.启动MySQL
```
systemctl start mysqld.service
```
5.检查是否启动成功
```
systemctl status mysqld.service
```
6.获取临时密码，MySQL5.7为root用户随机生成了一个密码
```
grep 'temporary password' /var/log/mysqld.log 
```
7.通过临时密码登录MySQL，进行修改密码操作
```
mysql -uroot -p
```
使用临时密码登录后，不能进行其他的操作，否则会报错，这时候我们进行修改密码操作
```
set global validate_password_policy=0;
set global validate_password_length=1;
ALTER USER 'root'@'localhost' IDENTIFIED BY 'yourpassword';
GRANT ALL PRIVILEGES ON *.* TO 'root'@'%' IDENTIFIED BY 'yourpassword' WITH GRANT OPTION;
FLUSH PRIVILEGES;
quit
```


8.修改配置文件 `/etc/my.cnf` ，在 `[mysqld]` 段中添加
```
sql_mode=NO_ENGINE_SUBSTITUTION,NO_ZERO_DATE,NO_ZERO_IN_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER
ngram_token_size=2
```

9.开启开机自启动
```
systemctl enable mysqld
systemctl daemon-reload
```

10.重新启动mysql
```
systemctl restart mysqld.service
```
相关命令
```
systemctl start|stop|status|restart mysqld.service
```


 

### 安装企业级linux扩展源epel
```
yum install -y epel-release
```

### 安装webtatic源
对centos系统不太熟练的同学，这里推荐使用webtatic来安装php
```
rpm -Uvh https://mirror.webtatic.com/yum/el7/webtatic-release.rpm
```

### Nginx安装
1.安装命令
```
yum install -y nginx
```
2.配置文件目录
```
/etc/nginx
```

3.相关命令
```
systemctl start|stop|status|restart nginx.service
```



### Redis安装
1.安装命令
```
yum install -y redis
```

2.修改配置文件
```
vi /etc/redis.conf
PS:简单的单机部署只需要把daemonize改为yes即可，更多的配置项请查阅/etc/redis.conf文件
```

3.启动redis
```
systemctl start redis.service
```

4.测试redis
```
redis-cli
```

5.相关命令
```
systemctl start|stop|status|restart redis.service
```



### PHP安装

1.安装命令
```
yum install -y mod_php71w php71w-bcmath php71w-cli php71w-common php71w-dba php71w-devel php71w-embedded php71w-enchant
yum install -y php71w-fpm php71w-gd php71w-imap php71w-ldap php71w-interbase php71w-intl php71w-ldap php71w-mbstring php71w-mcrypt
yum install -y php71w-mysqlnd php71w-odbc php71w-opcache php71w-pdo php71w-pear php71w-pecl-apcu php71w-pecl-imagick
yum install -y php71w-pecl-memcached php71w-pecl-mongodb php71w-pecl-redis php71w-pecl-xdebug php71w-pgsql php71w-phpdbg
yum install -y php71w-process php71w-pspell php71w-recode php71w-snmp php71w-soap php71w-tidy php71w-xml php71w-xmlrpc
```

2.启动php-fpm
```
systemctl start php-fpm.service
```

3.php的配置文件和目录
```
/etc/php.ini
/etc/php.d/*
/etc/php-fpm.ini
/etc/php-fpm.d/*
```

4.相关命令
```
systemctl start|stop|status|restart php-fpm.service
```

### 测试lnmpr

1.新建nginx虚拟目录配置文件：vi /etc/nginx/conf.d/test-lnmpr.conf
```
server {
    listen       8080;
    server_name  localhost;
    charset UTF-8;
    location / {
        root   /var/webroot;
        index  index.php index.html index.htm;
    }

    location ~ \.php$ {
        root           /var/webroot;
        fastcgi_pass   127.0.0.1:9000;
        fastcgi_index  index.php;
        fastcgi_param  SCRIPT_FILENAME  /var/webroot/$fastcgi_script_name;
        include        fastcgi_params;
    }
}
```

2.新建php测试文件:

 ```
 mkdir  /var/webroot/
 vi /var/webroot/index.php
 ```
 内容
```
<?php
phpinfo();
```

3.重新启动nginx和php-fpm

4.访问 http://localhost:8080 


### FAQ
 
1.如果出现 `Connecting to localhost (localhost)|::1|:8080... failed: No route to host.` 则表明nginx重启失败，  
  可 执行  `ps aux |grep nginx` 查看进程号然后执行 `kill -9 进程号`，再启动 nginx  `systemctl start  nginx.service` 

2.rpm -Uvh https://mirror.webtatic.com/yum/el6/latest.rpm 的问题
    - 若出现如下错误
```
14: problem making ssl connection
Error: Cannot find a valid baseurl for repo: webtatic
```
    - 解决方法： 用 修改文件 /etc/yum.repos.d/epel.repo
```
 [epel]
 ...
 enabled=1
 ...
```
将enabled=1先改为enabled=0
yum install ca-certificates，安装成功后，将enabled重新改为1，保存后再执行命令


3.出现http访问nginx访问不了的情况，请查看下防火墙设置
    - 关闭firewall：
```
systemctl stop firewalld.service #停止firewall
systemctl disable firewalld.service #禁止firewall开机启动
firewall-cmd --state #查看默认防火墙状态
```