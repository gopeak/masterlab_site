centos下推荐使用yum包管理器来安装软件

### 为yum设置软件源

1. 备份
```
mv /etc/yum.repos.d/CentOS-Base.repo /etc/yum.repos.d/CentOS-Base.repo.backup
```

2. 下载新的CentOS-Base.repo 到/etc/yum.repos.d/

```
curl -o /etc/yum.repos.d/CentOS-Base.repo http://mirrors.aliyun.com/repo/Centos-7.repo
```
3. 之后运行yum makecache生成缓存

### 安装企业级linux扩展源epel
```
yum install epel-release

```

### 安装PHP依赖
```
yum update -y
yum install -y wget git gcc gcc-c++ make automake autoconf perl file tar re2c libjpeg libpng libjpeg-devel libpng-devel libjpeg-turbo freetype freetype-devel \
        libcurl-devel libxml2-devel libjpeg-turbo-devel libXpm-devel libXpm libicu-devel libmcrypt libmcrypt-devel libxslt-devel libxslt openssl openssl-devel bzip2-devel pcre-devel
```


### PHP7.1安装
```
cd ~


wget http://cn2.php.net/distributions/php-7.1.24.tar.gz

tar zxvf php-7.1.24.tar.gz

cd php-7.1.24

./configure \
   --prefix=/usr/local/php \
   --with-config-file-path=/usr/local/php/etc/ \
   --with-config-file-scan-dir=/usr/local/php/conf.d/ \
   --enable-fpm \
   --enable-cgi \
   --with-fpm-user=nginx  \
   --with-fpm-group=nginx \
   --disable-phpdbg \
   --enable-mbstring \
   --enable-calendar \
   --with-xsl \
   --with-openssl \
   --enable-soap \
   --enable-zip \
   --enable-shmop \
   --enable-sockets \
   --with-gd \
   --with-freetype-dir=/usr/include/freetype2/freetype \
   --with-jpeg-dir \
   --with-png-dir \
   --with-xpm-dir \
   --with-xmlrpc \
   --enable-pcntl \
   --enable-intl \
   --with-mcrypt \
   --enable-sysvsem \
   --enable-sysvshm \
   --enable-sysvmsg \
   --enable-opcache \
   --with-iconv \
   --with-bz2 \
   --with-curl \
   --enable-mysqlnd \
   --with-mysqli=mysqlnd \
   --with-pdo-mysql=mysqlnd \
   --with-zlib \
   --with-gettext


make
make install


echo "export PATH=/usr/local/php/bin:/usr/local/php/sbin:$PATH" >> /etc/profile \
 && source /etc/profile


cp php.ini-production /usr/local/php/etc/php.ini \
  && cp /usr/local/php/etc/php-fpm.conf.default /usr/local/php/etc/php-fpm.conf \
  && cp /usr/local/php/etc/php-fpm.d/www.conf.default /usr/local/php/etc/php-fpm.d/www.conf



# install redis 扩展
cd ~
wget https://pecl.php.net/get/redis-4.2.0.tgz
tar zxvf redis-4.2.0.tgz
cd redis-4.2.0
phpize
./configure --with-php-config=/usr/local/php/bin/php-config
make
make install


echo -e "\nextension=redis.so\n" >> /usr/local/php/etc/php.ini

# 测试扩展
php --ri redis


```

### Nginx安装
```
yum install nginx
```


### Mysql5.7安装
推荐使用Percona来安装mysql
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
3. 安装mysql
```
yum install Percona-Server-server-57
```
4. 停止mysql服务
```
systemctl stop mysql.service
```
5. 取消mysql的严格模式和新增对ngram的支持
修改配置文件/etc/percona-server.conf.d/mysqld.cnf
添加
```
sql_mode=NO_ENGINE_SUBSTITUTION,NO_ZERO_DATE,NO_ZERO_IN_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER
ngram_token_size=2
```

6. 启动mysql
```
systemctl start mysql.service
```


### Redis安装
```
yum install redis

默认配置文件
/etc/redis.conf
```




### FAQ:
- 为解决pecl安装php扩展出现的各种问题，故采用源码安装。以下是pecl安装的问题列表：
    1. pecl install redis  可能会出现 Connection to `ssl://pecl.php.net:443' failed 的问题
    2. No releases available for package "pecl.php.net/redis"
