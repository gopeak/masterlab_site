#升级指南

鉴于Masterlab的运行环境的复杂性多样性，暂不提供自动更新的功能，如果用户自己修改了代码，升级前请做好备份，待升级成功后
在进行对比合并。  

对于手动下载代码进行安装的且版本大于1.0.2的，请参考下面的升级指南，升级请逐级进行。

对于版本小于1.0.2或git克隆源码安装的，可参考 Git方式升级 。


## Git方式升级  
  该方式支持任意版本的升级，要求Masterlab运行环境都已经具备

 1. 安装Composer,如果已经安装过请忽略  
    安装参考 https://www.runoob.com/w3cnote/composer-install-and-usage.html 
     
 2. 下载最新的Masterlab代码  
     最新版本下载地址:  https://github.com/gopeak/masterlab/archive/v1.2-preview.zip  
     找到 masterlab 的所在目录，  
	 假设原来的代码位于 `/data/www/masterlab`(请以实际目录地址为准)，把将新代码解压至 `/data/www/masterlab_laset` 
     进入命令行界面，执行以下命令,如果询问是否覆盖，请选全部同意:  
```text
		cd /data/www/masterlab_laset
		composer update
        cp -f  /data/www/masterlab/app/env.ini       /data/www/masterlab_laset/env.ini
        cp -rf /data/www/masterlab/app/config/deploy /data/www/masterlab_laset/app/config/
        cp -rf /data/www/masterlab/app/storage/attachment  /data/www/masterlab_laset/app/storage
        cp -rf /data/www/masterlab/app/storage/upload     /data/www/masterlab_laset/app/storage
        cp -rf /data/www/masterlab/app/storage/log        /data/www/masterlab_laset/app/storage
        cp -rf /data/www/masterlab/bin    /data/www/masterlab_laset/
```  
    
 3. 数据同步
     安装 Navicat Mysql 管理工具，版本最好为 11.0 以上  
     找到Masterlab使用的数据库相关信息（提示:可在 /data/www/masterlab/app/config/deploy/database.cfg 找到） 
     在数据库中创建一个可以远程连接的账号，将 Navicat 连接到数据库 
     假设原来数据库名称为 masterlab_db ,并创建一个新的数据库 masterlab_new  
	 ![10000cut-201907061707336864.png](http://pm.masterlab.vip/attachment/image/20190706/10000cut-201907061707336864.png "截图-10000cut-201907061707336864.png")  
     利用 Navicat 工具的同步结构功能，  
	 参考资料   https://blog.csdn.net/qq_23009105/article/details/84503209  
     假设原数据库名为 masterlab_db , 同步结构功能使用如下  
	![10000cut-201907061707309469.png](http://pm.masterlab.vip/attachment/image/20190706/10000cut-201907061707309469.png "截图-10000cut-201907061707309469.png")  
	![10000cut-201907061707172590.png](http://pm.masterlab.vip/attachment/image/20190706/10000cut-201907061707172590.png "截图-10000cut-201907061707172590.png")  
    使用 Navicat 工具的“同步数据”功能同步以下表数据：  
	permission main_notify_scheme_data issue_description_template main_setting main_widget user_widget issue_resolve agile_board_column  
	![10000cut-201907061707132745.png](http://pm.masterlab.vip/attachment/image/20190706/10000cut-201907061707132745.png "截图-10000cut-201907061707132745.png")  
    
 4. 回到命令行，将原来的Masterlab目录修改为 masterlab_old ,将新下载的目录修改为 masterlab:  
 ```text
		cd /data/www
        mv  /data/www/masterlab  /data/www/masterlab_old
		mv /data/www/masterlab_laset /data/www/masterlab
```
 5. 修改 `/data/www/masterlab/app/config/deploy/app.cfg.php` 的 `MASTERLAB_VERSION` 为 `1.2`  
 
 6. 重新给 `app/storage` 赋予写入权限 ,否则文件无法上传
    
 
 7. 以系统管理员的账号重新登录系统，查看页面的右上角用户头像的左侧，如果出现i的图标则表明升级成功;打开 "管理/系统/高级/缓存"页面
    点击 "清除数据"和"同步数据"按钮
 
 8. 编译 masterlab_socket    
    下载masterlab_socket代码， https://github.com/gopeak/masterlab_socket ,编译成功后，将 masterlab_socket 覆盖到 bin 目录下，然后重新运行
     运行命令
     ```text
       ./bin/masterlab_socket
      ```
  

## v1.1 到 v1.2 升级步骤  

提示：当前版本号的查看，一般位于 app/config/deploy/app.cfg.php MASTERLAB_VERSION 变量  

 1. 首先将 masterlab 的目录和数据库进行备份 

 2. 下载补丁文件  

    https://github.com/gopeak/masterlab/releases/download/v1.2/up_v1.1-to-v1.2.zip 

 3. 将补丁包的文件覆盖原来的代码  
    
 4. 在数据库中执行补丁包的更新Sql文件  
    ```text
    upgrade\database\up-v1.1-to-v1.2.sql
    ```
 
 5. 重新给 `app/storage` 赋予写入权限 
 
 6. 修改 `app/config/deploy/app.cfg.php` 的 `MASTERLAB_VERSION` 为 `1.2`  
 
 7. 以系统管理员的账号重新登录系统，查看页面的右上角用户头像的左侧，如果出现i的图标则表明升级成功;打开 "管理/系统/高级/缓存"页面
    点击 "清除数据"和"同步数据"按钮
 
 8. 要修复修复了非SSL服务器不能异步发送邮件的bug，需要重新编译 masterlab_socket ,
     https://github.com/gopeak/masterlab_socket ,编译成功后，将  masterlab_socket 覆盖到 bin 目录下，然后重新运行
     运行命令
     ```text
       ./bin/masterlab_socket
      ```
  
## v1.0.3 到 v1.1 升级步骤  

 1. 下载补丁文件  

    https://github.com/gopeak/masterlab/releases/download/v1.1/up_v1.0.3-to-v1.1.zip 
      

 2. 将补丁包的文件覆盖原来的代码  
  
    
 3. 在数据库中执行补丁包的更新Sql文件  
    ```text
    upgrade\database\up-v1.0.3-to-1.1.sql
    ```
   
4. 修改masterlab_socket服务器的配置文件 `bin/config.toml`  
    ```text
    # 修改Mysql数据库和redis服务的连接配置
     [mysql]
         database 	=	"masterlab"   
         host        =   "localhost"
         port		=	"3306"        
         user 		= 	"root"
         password 	= 	""
         charset	    =	"utf8mb4_unicode_ci"
         timeout	    =	"10"
         max_open_conns = 2000
         max_idle_conns = 1000
     
     [object]
         data_type 	= "redis"
         redis_host 	= "127.0.0.1"
         redis_port 	= "6379"
         redis_password = ""
    ```
    修改masterlab_socket服务器的cron文件 `bin/cron.json`  
    修改 `exe_bin` 为php的实际路径, 修改 `file` 为实际的文件路径
     ```text
     
      {
        "desc": "Project compute",
        "schedule": [
          {
            "name": "ProjectStat 每个半小时执行一次",
            "exe_bin": "/usr/bin/php", 
            "exp": "0 */30 * * * ?",
            "file": "/data/www/masterlab/app/server/timer/project.php",
            "arg": "-f"
          },
          {
            "name": "ProjectReport 每天23点58分执行项目统计",
            "exe_bin": "/usr/bin/php", 
            "exp": "0 58 23 * * ?",
            "file": "/data/www/masterlab/app/server/timer/projectDayReport.php",
            "arg": "-f"
          },
          {
            "name": "SprintReport 每天23点59分执行迭代统计",
            "exe_bin": "/usr/bin/php", 
            "exp": "0 59 23 * * ?",
            "file": "/data/www/masterlab/app/server/timer/sprintDayReport.php",
            "arg": "-f"
          }
        ]
      }
     ```
 4. 运行 `masterlab_socket` 服务  
     如果是centos或windows操作系统，赋予 `bin/masterlab_socket`  和 `bin/masterlab_socket.exe` 执行权限，其他操作系统访问  
     https://github.com/gopeak/masterlab_socket 自行编译  
     运行命令
     ```text
       ./bin/masterlab_socket
      ```
 
 5. 重新给 `app/storage` 赋予写入权限  
 
 
 6. 修改 `app/config/deploy/app.cfg.php` 的 `MASTERLAB_VERSION` 为 `1.1` ,清除浏览器缓存并重新登录  
 
 
 7. good luck ~~  
 
      
    
      

## v1.0.2 到 v1.0.3 升级步骤  

1. 下载补丁包  https://github.com/gopeak/masterlab/releases/download/v1.0.3/patch-v1.0.2tov1.0.3.zip ，覆盖代码  

2. 在数据库中找到表user_main，删除重复（字段 email 和 username）的用户数据  

3. 在数据库中执行以下SQL语句
```sql
SET FOREIGN_KEY_CHECKS=0;
ALTER TABLE `issue_description_template` ADD COLUMN `created`  int(11) UNSIGNED NOT NULL DEFAULT 0 COMMENT '创建时间' AFTER `content`;
ALTER TABLE `issue_description_template` ADD COLUMN `updated`  int(11) UNSIGNED NOT NULL DEFAULT 0 COMMENT '更新时间' AFTER `created`;
CREATE TABLE `issue_effect_version` (
`id`  int(11) UNSIGNED NOT NULL AUTO_INCREMENT ,
`issue_id`  int(11) UNSIGNED NULL DEFAULT NULL ,
`version_id`  int(11) UNSIGNED NULL DEFAULT NULL ,
PRIMARY KEY (`id`)
)
ENGINE=InnoDB
ROW_FORMAT=Compact;
UPDATE `permission` SET `name` = '访问事项列表（已废弃）' WHERE `permission`.`id` = 10005;
DROP INDEX `email` ON `user_main`;
CREATE UNIQUE INDEX `email` ON `user_main`(`email`) USING BTREE ;
DROP INDEX `username` ON `user_main`;
CREATE UNIQUE INDEX `username` ON `user_main`(`username`) USING BTREE ;
SET FOREIGN_KEY_CHECKS=1;
```  


4. 修改 app/config/deploy/app.cfg.php MASTERLAB_VERSION 为 1.0.3  


5. 清除浏览器缓存  

