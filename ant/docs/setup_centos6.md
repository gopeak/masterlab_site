centos下推荐使用yum包管理器来安装软件

### 为yum设置软件源

1. 备份
```
mv /etc/yum.repos.d/CentOS-Base.repo /etc/yum.repos.d/CentOS-Base.repo.backup
```

2. 下载新的CentOS-Base.repo 到/etc/yum.repos.d/

```
curl -o /etc/yum.repos.d/CentOS-Base.repo http://mirrors.aliyun.com/repo/Centos-6.repo
```
3、之后运行yum makecache生成缓存

### 安装企业级linux扩展源epel
```
yum install -y epel-release
```

### 安装webtatic源
对centos系统不太熟练的同学，这里推荐使用webtatic来安装php
```
rpm -Uvh https://mirror.webtatic.com/yum/el6/latest.rpm
```


### Nginx安装
1. 安装命令
```
yum install -y nginx
```
2. 配置文件目录
```
cd /etc/nginx
```

3. 相关命令
```
service nginx start|stop|status|restart
```

### Mysql5.7安装
推荐使用Percona来安装mysql, **安装或使用过程中遇到的问题请查看本页面的FAQ**
1. 安装Percona的yum源
```
yum install http://www.percona.com/downloads/percona-release/redhat/0.1-6/percona-release-0.1-6.noarch.rpm
```
2. 测试一下Percona的yum源
```
yum list | grep percona
```
你会看到如下：
```
...
Percona-Server-57-debuginfo.x86_64      5.7.10-3.1.el7                 @percona-release-x86_64
Percona-Server-client-57.x86_64         5.7.10-3.1.el7                 @percona-release-x86_64
Percona-Server-devel-57.x86_64          5.7.10-3.1.el7                 @percona-release-x86_64
Percona-Server-server-57.x86_64         5.7.10-3.1.el7                 @percona-release-x86_64
Percona-Server-shared-57.x86_64         5.7.10-3.1.el7                 @percona-release-x86_64
Percona-Server-shared-compat-57.x86_64  5.7.10-3.1.el7                 @percona-release-x86_64
Percona-Server-test-57.x86_64           5.7.10-3.1.el7                 @percona-release-x86_64
Percona-Server-tokudb-57.x86_64         5.7.10-3.1.el7                 @percona-release-x86_64
...
```

3. 安装Percona Server
```
yum install -y Percona-Server-server-57
```

4. 停止mysql服务
```
service mysql stop
```
5. 取消mysql的严格模式和新增对ngram的支持
修改配置文件 `/etc/my.cnf` ，在 `[mysqld]` 段中添加
```
sql_mode=NO_ENGINE_SUBSTITUTION,NO_ZERO_DATE,NO_ZERO_IN_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER
ngram_token_size=2
```
6. 启动mysql
```
service mysql start
```

7. 获取mysql的root账号初始密码的两种方式：
- 直接获取安装时生成的随机密码
```
cat /var/log/mysqld.log  | grep "A temporary password" | awk -F " " '{print$11}'
```

- 使用无密码登陆的方式，修改配置文件 `/etc/my.cnf` ，在 `[mysqld]` 中添加
```
skip-grant-tables
```

8. 测试连接并修改root密码
- 登陆命令
```
mysql -uroot -p

```
- 修改root密码
```
step 1: SET PASSWORD = PASSWORD('your new password');
step 2: ALTER USER 'root'@'localhost' PASSWORD EXPIRE NEVER;
step 3: flush privileges;
```


9. 相关命令
```
service mysql start|stop|status|restart
```

### Redis安装
1. 安装命令
```
yum install redis
```

2. 修改配置文件
```
vi /etc/redis.conf

简单的单机部署只需要把daemonize改为yes即可，更多的配置项请查阅/etc/redis.conf文件
```

3. 启动redis
```
service redis start
```

4. 测试redis
```
redis-cli
```

5. 相关命令
```
service redis start|stop|status|restart
```


### PHP安装

1. 安装命令
```
yum install -y mod_php71w php71w-bcmath php71w-cli php71w-common php71w-dba php71w-devel php71w-embedded php71w-enchant 
yum install -y php71w-fpm php71w-gd php71w-imap php71w-interbase php71w-intl php71w-ldap php71w-mbstring php71w-mcrypt 
yum install -y php71w-mysqlnd php71w-odbc php71w-opcache php71w-pdo php71w-pear php71w-pecl-apcu php71w-pecl-imagick 
yum install -y php71w-pecl-memcached php71w-pecl-mongodb php71w-pecl-redis php71w-pecl-xdebug php71w-pgsql php71w-phpdbg 
yum install -y php71w-process php71w-pspell php71w-recode php71w-snmp php71w-soap php71w-tidy php71w-xml php71w-xmlrpc
```

2. 启动php-fpm
```
service php-fpm start
```

3. php的配置文件
```
/etc/php.ini
/etc/php.d/*
/etc/php-fpm.ini
/etc/php-fpm.d/*
```

4. 相关命令
```
service php-fpm start|stop|status|restart
```


### 测试lnmpr
1. 新建nginx虚拟目录配置文件：vi /etc/nginx/conf.d/test-lnmpr.conf
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

2. 新建php测试文件: vi /var/webroot/index.php
```
<?php

phpinfo();
```

3. 访问http://ip:8080

### FAQ

1. 想在测试环境的mysql设置简单密码
- 报错如下：
```
ERROR 1819 (HY000): Your password does not satisfy the current policy requirements
```
- 解决方法：
修改配置文件 `/etc/my.cnf` ，在 `[mysqld]` 中添加
```
default_password_lifetime=0
validate_password_length=4
validate_password_policy=LOW
```


2. rpm -Uvh https://mirror.webtatic.com/yum/el6/latest.rpm
- 若出现如下错误
```
14: problem making ssl connection
Error: Cannot find a valid baseurl for repo: webtatic
```
- 解决方法：
修改文件 /etc/yum.repos.d/epel.repo
```
 [epel]
 name=Extra Packages for Enterprise Linux 6 - $basearch
 #baseurl=http://download.fedoraproject.org/pub/epel/6/$basearch
 mirrorlist=https://mirrors.fedoraproject.org/metalink?repo=epel-6&arch=$basearch
 failovermethod=priority
 enabled=1
 gpgcheck=1
 gpgkey=file:///etc/pki/rpm-gpg/RPM-GPG-KEY-EPEL-6

```

将enabled=1先改为enabled=0
yum install ca-certificates，安装成功后，将enabled重新改为1，保存后再执行命令


3. 在访问nginx的时候出现超时
- 原因：防火墙阻止访问
- 解决：设置防火墙或关闭防火墙 service iptables stop


4. 在访问nginx时出现 403 Forbidden
- 权限问题
查看nginx.conf的运行用户，把对应项目代码目录的权限要与nginx运行用户的权限一致
- 看一下selinux是否关闭了
```
##如果SELinux status参数为enabled即为开启状态
/usr/sbin/sestatus -v

##临时关闭selinux
setenforce 0

##永久关闭selinux
step1: 修改/etc/selinux/config 文件
step2: 将SELINUX=enforcing改为SELINUX=disabled
step3: 重启机器即可
```