
## Windows 宝塔环境 安装示例

  注：该教程在windows sercer 2012  64位操作系统下测试通过,其他windows系统过程相似   
  这里仅仅是示例，如果示例安装成功，那么将你的域名和相应的路径值修改就可以  
  示例域名： www.masterlab.bt  ，请根据自己的情况修改  
  请在HOSTS文件中添加： 127.0.0.1 www.masterlab.bt   
  
### 一、宝塔环境安装

访问宝塔官方网站 https://www.bt.cn/ 下载最新的 Windows的`6.4`版本 
下载好后根据提示进行安装 ，初始化设置，输入账号密码后进入面板，选择安装Apache套件（Apache2.4 Php7.1 Mysql5.7）      
  ![1cut-202003100003482814.png](http://pm.masterlab.vip/attachment/image/20200310/1cut-202003100003482814.png "选择Apache套件")


### 二、下载Masterlab代码

1. 下载masterlab的最新完整代码  http://download.888zb.com/masterlab_v2.0.1.zip ，
 解压到 c 盘的 c:/wwwroot 目录下,解压后的目录结构如下:
```
    c:/wwwroot/masterlab            
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

2. 在宝塔的面板中添加网站

![1cut-202003100003346964.png](http://pm.masterlab.vip/attachment/image/20200310/1cut-202003100003346964.png "添加网站")

3. 点击刚才创建的站点，进入站点设置的"网站目录"界面，把"防跨站攻击(open_basedir)"选项打勾去掉  

![1cut-202003100003452136.png](http://pm.masterlab.vip/attachment/image/20200310/1cut-202003100003452136.png "点击刚才的站点")

![1cut-202003100003577715.png](http://pm.masterlab.vip/attachment/image/20200310/1cut-202003100003577715.png "打勾去掉")  

 

### 三、图文安装  

1.访问 http://www.masterlab.bt/install/ 按照提示进行安装  

![1cut-202003100003059670.png](http://pm.masterlab.vip/attachment/image/20200310/1cut-202003100003059670.png "安装过程")

![1cut-202003100003104999.png](http://pm.masterlab.vip/attachment/image/20200310/1cut-202003100003104999.png "安装结束")
 
2.登录系统，进入"管理\系统\邮件配置"页面，配置邮件发送功能，如果没有smtp服务器建议将"邮件推送功能"选项去掉  


### 四、下载和运行 MasterlabSocket  

 * 运行 C:\wwwroot\masterlab\bin 目录下 masterlab_socket.exe,  
 注：masterlab_socket.exe 是masterlab的异步和数据定时计算服务器， masterlab_socket不运行不会影响masterlab使用


 
 
