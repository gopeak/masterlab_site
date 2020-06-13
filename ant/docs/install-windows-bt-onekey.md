
## Masterlab宝塔环境一键安装

  注：该教程在windows sercer 2012 和 windows7 64位操作系统下测试通过,其他windows系统过程相似   
  这里仅仅是示例，如果示例安装成功，那么将你的域名和相应的路径值修改就可以  
  示例域名： www.masterlab.bt  ，请根据自己的情况修改  
  请在HOSTS文件中添加： 127.0.0.1 www.masterlab.bt   
  
### 一、宝塔环境安装

访问宝塔官方网站 https://www.bt.cn/ 下载最新的 Windows操作系统的`6.6`版本  

![宝塔面板](http://pm.masterlab.vip/attachment/image/20200613/20200613110429_46798.png "宝塔面板")  
  
根据提示进入宝塔web管理页面  

![安装运行环境套件](http://pm.masterlab.vip/attachment/image/20200613/20200613110546_19382.png "安装运行环境套件")  
  
初次进入宝塔web界面，选择安装Masterlab运行所需的环境: `Apache2.4 Mysql5.7 PHP7.3` ,耐心等待结束。 
你也可以在在左侧菜单的"软件管理"中,手动安装运行环境  

![手动安装环境](http://pm.masterlab.vip/attachment/image/20200613/20200613111429_38088.png "手动安装环境")  


### 二、一键部署Masterlab


1.在`软件管理`的`一键部署`中找到 Masterlab  

![一键部署Masterlab](http://pm.masterlab.vip/attachment/image/20200613/20200613111849_87681.png "一键部署Masterlab")  

点击安装，耐心等待安装结束  
  
![域名设置](http://pm.masterlab.vip/attachment/image/20200613/20200613114316_13248.png "域名设置")  

2.安装成功界面  

![安装成功](http://pm.masterlab.vip/attachment/image/20200613/20200613114019_39073.png "安装成功")  


3.安装成功后，在左侧菜单"网站"的站点管理页面会多出Masterlab的站点，点击设置，在"网站目录"界面，把"防跨站攻击(open_basedir)"选项打勾去掉  
  
![取消防跨站访问](http://pm.masterlab.vip/attachment/image/20200613/20200613114440_56667.png "取消防跨站访问")  




### 三、下载和运行 MasterlabSocket  

下载文件 http://download.888zb.com/masterlab-socket-v1.1-windows.zip 解压到 Masterlab的 `bin` 目录下 
 ```text
 # 修改你实际的目录 
 cd D:/wwwroot/www.masterlab.bt/bin
 masterlab_socket.exe start -d
```

   
 Masterlab_socket.exe 是masterlab的异步和数据定时计算服务器。注: Masterlab_socket 不运行不会影响masterlab使用


 
 
