## 差异对比方式升级  
  该方式支持任意版本的升级，要求Masterlab运行环境都已经具备

 1. 安装Composer  
    如果已经安装过请忽略  
    安装参考 https://www.runoob.com/w3cnote/composer-install-and-usage.html  
2. 下载最新的Masterlab代码  
     最新版本下载地址:  https://github.com/gopeak/masterlab/archive/v1.2.zip  
     找到 masterlab 的所在目录，  
	 假设原来的代码位于 `/data/www/masterlab`(请以实际目录地址为准)，把将新代码解压至 `/data/www/masterlab_last` 
     进入命令行界面，执行以下命令,如果询问是否覆盖，请选全部同意:  
```
        wget https://github.com/gopeak/masterlab/archive/v1.2.zip
        unzip v1.2.zip  -d masterlab_last
        mv -rf /data/www/masterlab_last/masterlab-1.2/* /data/www/masterlab_last/
		cd /data/www/masterlab_last
		composer update
        cp -f  /data/www/masterlab/env.ini       /data/www/masterlab_last/env.ini
        cp -rf /data/www/masterlab/app/config/deploy /data/www/masterlab_last/app/config/
        cp -rf /data/www/masterlab/app/storage/attachment  /data/www/masterlab_last/app/storage
        cp -rf /data/www/masterlab/app/storage/upload     /data/www/masterlab_last/app/storage
        cp -rf /data/www/masterlab/app/storage/log        /data/www/masterlab_last/app/storage
        cp -rf /data/www/masterlab/bin                    /data/www/masterlab_last/
```  
 3. 数据同步  
     安装 Navicat Mysql 管理工具，版本最好为 11.0 以上  
     在数据库中创建一个可以远程连接的账号，将 Navicat 连接到数据库 
     创建一个新的数据库`masterlab_new`  
![10000cut-201907061707336864.png](http://pm.masterlab.vip/attachment/image/20190706/10000cut-201907061707336864.png "截图-10000cut-201907061707336864.png")  
     导入
      ```text
      /data/www/masterlab_last/app/public/install/data/main.sql 
      /data/www/masterlab_last/app/public/install/data/fulltext-5.7.sql 
      ```
  
使用Navicat工具的同步结构功能
参考资料   https://blog.csdn.net/qq_23009105/article/details/84503209  
假设原数据库名为 masterlab_db , 同步结构功能使用如下  
![10000cut-201907061707309469.png](http://pm.masterlab.vip/attachment/image/20190706/10000cut-201907061707309469.png "截图-10000cut-201907061707309469.png")   
![10000cut-201907061707172590.png](http://pm.masterlab.vip/attachment/image/20190706/10000cut-201907061707172590.png "截图-10000cut-201907061707172590.png")  
  
  
使用 Navicat 工具的“同步数据”功能同步以下表数据：  
```text
permission main_notify_scheme_data issue_description_template main_setting main_widget user_widget issue_resolve agile_board_column  
```
![10000cut-201907061707132745.png](http://pm.masterlab.vip/attachment/image/20190706/10000cut-201907061707132745.png "截图-10000cut-201907061707132745.png")  
    
 4. 回到命令行，将原来的Masterlab目录修改为 masterlab_old ,将新下载的目录修改为 masterlab:  
 ```text
		cd /data/www
        mv  /data/www/masterlab  /data/www/masterlab_old
		mv /data/www/masterlab_last /data/www/masterlab
```
 5. 修改 `/data/www/masterlab/app/config/deploy/app.cfg.php` 的 `MASTERLAB_VERSION` 为 `1.2`  
 
 6. 重新给 `/data/www/masterlab/app/storage` 赋予写入权限 ,否则文件无法上传
    
 
 7. 以系统管理员的账号重新登录系统，查看页面的右上角用户头像的左侧，如果出现i的图标则表明升级成功;打开 "管理/系统/高级/缓存"页面
    点击 "清除数据"和"同步数据"按钮
 
 8. 编译 masterlab_socket    
    下载masterlab_socket代码， https://github.com/gopeak/masterlab_socket ,编译成功后，将 masterlab_socket 覆盖到 bin 目录下，然后重新运行
运行命令
```text
       ./bin/masterlab_socket
```
