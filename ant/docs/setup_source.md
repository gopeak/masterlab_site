使用源码包安装(各系统通用)

* 通过源码包来部署masterlab


### **运行环境的检查与配置**

0. masterlab需要的运行环境
    * 推荐使用LINUX+PHP+MYSQL+REDIS，不推荐使用windows来作为生产环境, 但可以作为预览环境或开发环境来使用
    * PHP(5.6/7.0/7.1/7.2版本)
    * MYSQL(5.6/5.7版本)
    * NGINX
    * REDIS

1. 检查masterlab需要的PHP配置
    * 检查或安装redis扩展
    * 修改php.ini文件，把short_open_tag 设置为 On

2. 检查masterlab需要的mysql配置
    * 取消mysql的严格模式和新增对ngram的支持，修改配置文件my.ini/my.cnf ，在 [mysqld] 段中添加
    ```
    sql_mode=NO_ENGINE_SUBSTITUTION,NO_ZERO_DATE,NO_ZERO_IN_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER
    ngram_token_size=2
    ```

3. 检查masterlab需要的NGINX配置
    * masterlab/app/public 为项目的入口目录, 假设你的源码目录为 /data/www/masterlab
    ```
    server {
        ...
        index index.html index.htm index.php;
        root /data/www/masterlab/app/public;
        ...
        location / {
            try_files $uri $uri/ /index.php$is_args$args;
            autoindex on;
        }
        location ^~ /attachment/ {
            root /data/www/masterlab/app/storage;
        }
        location ~ \.php$ {
            ...
        }
        ...
    }
    ```

4. 检查REDIS是否安装
redis存在无密码漏洞攻击，安全起见要设置密码




### **部署masterlab源代码**

1. 下载源码, 得到masterlab-{version}.zip文件
```
https://github.com/gopeak/masterlab/releases
```

2. 将其解压缩，并将目录重命名为masterlab。相应的目录, 如： /data/www/masterlab。


3. 通过浏览器访问以下地址，系统会自动转入安装程序。

```
http://域名/install  或  http://ip:端口/install
```


### **手动修改masterlab配置信息**

```
masterlab/app/config/deploy
```