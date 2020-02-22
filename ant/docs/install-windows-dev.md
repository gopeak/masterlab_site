

## Windows masterlab 开发环境
 

### 1. clone代码
 
```text
git clone git@github.com:gopeak/masterlab.git
# 在masterlab根目录下执行,如果执行错误请将php.exe加入到环境变量中
php composer.phar config -g repo.packagist composer https://mirrors.aliyun.com/composer/
php composer.phar update  

```
 

### 2. Apache 配置
 
打开 `xampp/apache/conf/extra/httpd-vhosts.conf`
增加内容
  ```text
  <VirtualHost *:80>
    DocumentRoot "c:/phpenv/www/masterlab/app/public"
    ServerName  masterlab.ink
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
 然后重启Apache  
 
 hosts 文件增加  
 
 127.0.0.1 masterlab.ink
 
### 3. 覆盖文件

将 env.ini 和文件夹 添加到masterlab根目录



### 4. Final
 
在浏览器中访问  http://masterlab.ink/ 
 
good luck to u~~  


 
 