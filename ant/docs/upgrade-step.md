

##v1.1到v1.2升级步骤  

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
##v1.0.3到v1.1升级步骤  

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
 
      
    
      

##v1.0.2 到 v1.0.3升级步骤  

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

