ubuntu下推荐使用apt包管理器来安装软件


### **Ubuntu版本**

18.04

***

### **为APT设置软件源**

1. 替换系统源,用下面内容替换掉 /etc/apt/sources.list 这个文件
```
deb http://mirrors.163.com/ubuntu/ bionic main restricted universe multiverse
deb http://mirrors.163.com/ubuntu/ bionic-security main restricted universe multiverse
deb http://mirrors.163.com/ubuntu/ bionic-updates main restricted universe multiverse
deb http://mirrors.163.com/ubuntu/ bionic-proposed main restricted universe multiverse
deb http://mirrors.163.com/ubuntu/ bionic-backports main restricted universe multiverse
deb-src http://mirrors.163.com/ubuntu/ bionic main restricted universe multiverse
deb-src http://mirrors.163.com/ubuntu/ bionic-security main restricted universe multiverse
deb-src http://mirrors.163.com/ubuntu/ bionic-updates main restricted universe multiverse
deb-src http://mirrors.163.com/ubuntu/ bionic-proposed main restricted universe multiverse
deb-src http://mirrors.163.com/ubuntu/ bionic-backports main restricted universe multiverse
```

2. 依次执行
```
sudo apt-get update
sudo apt-get upgrade
sudo apt-get install -y software-properties-common
sudo apt-get install -y vim wget
```


***

### **安装php**


1. 添加PPA源
```
sudo add-apt-repository ppa:ondrej/nginx
按回车继续
sudo add-apt-repository ppa:ondrej/php
按回车继续
```
2. apt-get安装php
```
sudo apt-get install -y php7.2
sudo apt-get install -y php7.2-bcmath \
 php7.2-bz2 \
 php7.2-dba \
 php7.2-enchant \
 php7.2-fpm \
 php7.2-imap \
 php7.2-interbase \
 php7.2-intl \
 php7.2-mbstring \
 php7.2-phpdbg \
 php7.2-soap \
 php7.2-sybase \
 php7.2-xsl \
 php7.2-zip \
 php7.2-xmlrpc \
 php7.2-xml \
 php7.2-tidy \
 php7.2-sqlite3 \
 php7.2-snmp \
 php7.2-recode \
 php7.2-readline \
 php7.2-pspell \
 php7.2-pgsql \
 php7.2-opcache \
 php7.2-odbc \
 php7.2-mysql
sudo apt-get install -y php7.2-ldap \
 php7.2-json \
 php7.2-gmp \
 php7.2-gd \
 php7.2-dev \
 php7.2-curl \
 php7.2-common \
 php7.2-cli \
 php7.2-cgi \
 php7.2-redis \
```
3. 查看版本
```
php7.2 -v
php-fpm7.2 -v
```

4. 启动php-fpm
```
sudo service php7.2-fpm start
或
sudo systemctl status php7.2-fpm.service
```


***

### **安装nginx**


1. 安装命令
```
sudo apt-get install nginx
```

2. 编辑配置以支持PHP-FPM : 修改这个文件  vi /etc/nginx/sites-enabled/default
```
location ~ \.php$ {
                include snippets/fastcgi-php.conf;
                fastcgi_pass unix:/run/php/php7.2-fpm.sock;
}
```

3. 启动nginx
```
sudo systemctl start nginx.service
或
sudo service nginx start
```



***

### **安装mysql**


1. 安装命令
```
wget https://repo.percona.com/apt/percona-release_0.1-6.$(lsb_release -sc)_all.deb
dpkg -i percona-release_0.1-6.$(lsb_release -sc)_all.deb
sudo apt-get update
sudo apt-get install percona-server-server-5.7
```
2. 停止mysql
```
sudo systemctl stop mysql.service
```
3. 取消mysql的严格模式和新增对ngram的支持

修改配置文件/etc/mysql/percona-server.conf.d/mysqld.cnf
替换掉sql_mode的值和新增ngram_token_size
        ```
        sql_mode=NO_ENGINE_SUBSTITUTION,NO_ZERO_DATE,NO_ZERO_IN_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER
        ngram_token_size=2
        ```
4. 启动mysql
```
sudo systemctl start mysql.service
```



***

### **安装redis**


1. 安装命令
```
sudo apt-get install redis-server
```
2. 启动redis
```
sudo systemctl start redis.service
```




### FAQ

1. php.ini 需要设置 short_open_tag = ON
2. mysql安装后需要设置root密码