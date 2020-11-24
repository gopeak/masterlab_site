
 **Windows 宝塔环境 安装示例**

  注：该教程在windows sercer 2012  64位操作系统下测试通过,其他windows系统过程相似   
  这里仅仅是示例，如果示例安装成功，那么将你的域名和相应的路径值修改就可以  
  示例域名： www.masterlab.bt  ，请根据自己的情况修改  
  请在HOSTS文件中添加： 127.0.0.1 www.masterlab.bt   
  
## 一、宝塔环境安装

访问宝塔官方网站 https://www.bt.cn/ 下载最新的 Windows系统的版本 
下载好后根据提示进行安装 ，初始化设置，输入账号密码后进入面板，选择安装Apache套件（Apache2.4 Php7.1 Mysql5.7）      
  ![1cut-202003100003482814.png](http://pm.masterlab.vip/attachment/image/20200310/1cut-202003100003482814.png "选择Apache套件")


## 二、下载Masterlab代码

1.下载masterlab的最新完整代码  http://download.masterlab.vip/masterlab-last.zip ，
 解压到 c 盘的 c:/wwwroot 目录下,解压后的目录结构如下:
```
    c:/wwwroot/masterlab            
      |--   app   
      |--   bin    
      |--   lib    
      |--   travis
      |--   vendor
      |--   public   
      |--   composer.json
      |--   env.ini-example       
      |--   LICENSE
      |--   php.ini    
      |--   README.md
```

2.在宝塔的面板中添加网站,同时把数据库创建了,后面安装会用上  

![1cut-202011242011212889.png](http://pm.masterlab.vip/attachment/image/20201124/1cut-202011242011212889.png "添加站点")
3.设置运行目录

![1cut-202011241911482306.png](http://pm.masterlab.vip/attachment/image/20201124/1cut-202011241911482306.png "设置运行目录")
4.修改伪静态  

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
或者  
```
location / {
	if (!-e $request_filename){
		rewrite  ^(.*)$  /index.php?s=$1  last;   break;
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



## 三、图文安装  

1.访问 http://www.masterlab.bt/install/ 按照提示进行安装  

![1cut-202003100003059670.png](http://pm.masterlab.vip/attachment/image/20200310/1cut-202003100003059670.png "安装过程")

![1cut-202003100003104999.png](http://pm.masterlab.vip/attachment/image/20200310/1cut-202003100003104999.png "安装结束")
 
2.登录系统，进入"管理\系统\邮件配置"页面，配置邮件发送功能，如果没有smtp服务器建议将"邮件推送功能"选项去掉  


## 四、下载和运行 MasterlabSocket  

下载文件 http://download.masterlab.vip/masterlab-socket-v1.1-windows.zip 解压到 Masterlab的 `bin` 目录下 

 ```text
 cd C:\wwwroot\masterlab\bin
 masterlab_socket.exe start -d
```

   
 注：masterlab_socket.exe 是masterlab的异步和数据定时计算服务器， masterlab_socket不运行不会影响masterlab使用


 
 
