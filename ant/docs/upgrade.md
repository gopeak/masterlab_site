## 升级指南


### 大于v2.0.1 已经支持在线升级


### v2.0  至 v2.0.1 升级
下载升级文件 http://download.888zb.com/v2.0-v2.0.1-upgrade.zip ,压缩包内文件覆盖到根目录即可



### v2.0alpha  至 v2.0 升级
下载升级文件 http://download.888zb.com/v2.0alpha-v2.0-upgrade.zip ,按照压缩包内的 readme.md 进行升级
注：如果升级失败，建议安装最新的2.0版本，然后在就系统中的项目的"事项列表/更多/导出Excel"中导出事项，再导入进2.0即可


### v1.2 至 v2.0 升级
下载升级文件 http://download.888zb.com/v1.2-v2.0-upgrade.zip ,按照压缩包内的 readme.md 进行升级  
注：连接mysql的用户要求具备修改表结构的权限，升级期间请勿对masterlab进行操作



### 版本小于1.2升级  
由于1.2以下的版本和v2.0的数据库表结构差异比较大，目前暂不提供自动升级脚本，如果你拥有Mysql的数据管理能力，可以手动进行升级  

1.备份源码和数据库  

2.安装最新的v2.0版本  

3.使用数据库管理`Navicat最新版` 进行老版本和v2.0数据的差异对比，并同步   
  可参考文章 https://www.cnblogs.com/guoyinghome/p/11220281.html   
  
4.将当前的`app/storage/attachment` 的所有子目录和文件拷贝到2.0的 `app/public/attachment` 

5.将当前的 `app/config/deploy/database.cfg.php` 覆盖到 v2.0的 `app/config/deploy/database.cfg.php` 

6.使用2.0版本进行访问  




   
