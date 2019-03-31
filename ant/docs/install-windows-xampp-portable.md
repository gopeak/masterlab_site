

## Windows xampp3.2.3 懒人版安装示例

该示例基于 xampp3.2.3-portable并加装了Masterlab，下载后直接解压到硬盘根目录下运行就可以，免去繁琐的安装过程，  
但整合的数据库是MariaDB10而非Mysql5.7，导致全文索引中文字词无效，因此只适合懒人或小白。  

注：该示例仅在windows7下通过测试，其他windows版本还在调试中    

### 1. 下载  
  从 Masterlab官网下载打包好的 `xampp-masterlab-v1.1.7z` 文件，包文件包含了Masterlab所运行的环境和代码  
  http://www.masterlab.vip/download.php?file=xampp-masterlab-v1.1.7z   
  下载好后将文件解压到在硬盘的根目录，如 `e:/xampp`   

### 2. 运行  
  运行 `e:/xampp/xampp-control.exe` ，启动 apache 和 mysql  
    ![](http://www.masterlab.vip/docs/images/install/xampp-control.png)  

  运行 `e:/xampp/redis-server/redis-server.exe`   
    ![](http://www.masterlab.vip/docs/images/install/redis-server.png)  

  运行 `e:/masterlab/bin/masterlab_socket.exe`   
    ![](http://www.masterlab.vip/docs/images/install/masterlab_socket.png)  

### 3. 修改hosts
在 C:\Windows\System32\drivers\etc\hosts 文件中加入
```text
127.0.0.1 www.yoursite.com
```
重启 apache

### 4. 修改管理密码
在浏览器中访问 http://www.yoursite.com/ 默认账号 master 密码 123456   
登录成功后在个人设置中修改密码即可  


good luck to u~~  


 
 


