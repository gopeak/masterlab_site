
## Linux 宝塔环境 安装示例

  注：该教程在centos7 64位操作系统下测试通过,其他Linux系统过程相似   
  这里仅仅是示例，如果示例安装成功，那么将你的域名和相应的路径值修改就可以  
  示例域名： www.masterlab.ce  ，请根据自己的情况修改  
  请在HOSTS文件中添加： 127.0.0.1 www.masterlab.ce    
  

### 1.安装宝塔
```text
# Centos安装脚本
yum install -y wget && wget -O install.sh http://download.bt.cn/install/install.sh && sh install.sh

# Ubuntu/Deepin安装脚本
wget -O install.sh http://download.bt.cn/install/install-ubuntu.sh && sudo bash install.sh

# Debian安装脚本
wget -O install.sh http://download.bt.cn/install/install-ubuntu.sh && bash install.sh

# Fedora安装脚本
wget -O install.sh http://download.bt.cn/install/install.sh && bash install.sh

```  


根据提示进行安装，安装成功后会显示宝塔的web访问地址和账号密码，记下来并登录  

 

### 1. 下载最新masterlab的完整代码  http://download.888zb.com/masterlab-last.zip ，
 解压到 /www/masterlab 目录下,解压后的目录结构如下:
```
    /www/masterlab            
      |--   app   
      |--   bin    
      |--   lib    
      |--   travis
      |--   vendor
      |--   composer.json
      |--   env.ini-example       
      |--   LICENSE
      |--   php.ini    
      |--   README.md
```

### 2. 添加网站,点击宝塔“网站”面板创建网站

 同时把数据库创建了,后面安装会用上  

![1cut-202002071702172860.png](http://pm.masterlab.vip/attachment/image/20200207/1cut-202002071702172860.png "添加站点")
 
### 3. 去掉防跨站攻击
![1cut-202002071702235444.png](http://pm.masterlab.vip/attachment/image/20200207/1cut-202002071702235444.png "去掉防跨站攻击(open_basedir)")


 
### 4. 修改伪静态  

对于Web服务器是Nginx的： 
![1cut-202002071702442457.png](http://pm.masterlab.vip/attachment/image/20200207/1cut-202002071702442457.png "修改伪静态")  

```
 location  /{
        if (!-e $request_filename) {
                rewrite ^/((?!upload).*)$ /index.php/$1 last;
                break;
         }
    }

```

对于Web服务器是Apache的： 
```
 <IfModule mod_rewrite.c>
	RewriteEngine on
	RewriteCond %{REQUEST_FILENAME} !-d
	RewriteCond %{REQUEST_FILENAME} !-f
	RewriteRule ^(.*)$ index.php?/$1 [QSA,PT,L]
</IfModule>

```

<br>


### 5. 下载和运行 MasterlabSocket  

Centos和Windows系统已经编译成二进制，可以直接使用，  
https://github.com/gopeak/masterlab_socket/releases  
下载放置在 masterlab/bin 目录下，其他操作系统自行编译。  

运行命令 

```
cd /www/masterlab/bin
chmod +x ./masterlab_socket
./masterlab_socket start -d

```




### 6. 访问 http://www.masterlab.ce/install/ 
安装过程有些目录需要给 www 用户赋予写入权限  

```
chown -R www:www /www/masterlab/app/public/install/
chown -R www:www /www/masterlab/app/public/attachment/
chown -R www:www /www/masterlab/app/storage/
chown -R www:www /www/masterlab/app/config/deploy/
chown -R www:www /www/masterlab/bin/
chown -R www:www /www/masterlab/upgrade/

```

剩下按照提示进行安装  


good luck~~~
 
 
