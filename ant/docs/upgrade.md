## 升级指南

### 从v2.0.1往后已经支持在线升级
在页面右上角点击"向下箭头/升级"打开升级界面进行确认操作即可，升级前请先备份好数据库  
如果在线升级失败，可以尝试进行手动操作
```text
# 下载对应的补丁包
v2.1.5 到 v2.1.7 补丁包：http://download.masterlab.vip/v2.1.5-v2.1.7-upgrade.zip
v2.1.3 到 v2.1.7 补丁包：http://download.masterlab.vip/v2.1.3-v2.1.7-upgrade.zip
v2.1.1 到 v2.1.7 补丁包：http://download.masterlab.vip/v2.1.1-v2.1.7-upgrade.zip
v2.1.1 到 v2.1.2 补丁包： http://download.masterlab.vip/v2.1.1-v2.1.2-upgrade.zip
v2.1 到 v2.1.2 补丁包：   http://download.masterlab.vip/v2.1-v2.1.2-upgrade.zip
v2.0.2 到 v2.1.2 补丁包： http://download.masterlab.vip/v2.0.2-v2.1.2-upgrade.zip  
v2.0.1 到 v2.1.2 补丁包： http://download.masterlab.vip/v2.0-v2.1.2-upgrade.zip
v2.0 到 v2.1.2 补丁包：   http://download.masterlab.vip/v2.0-v2.1.2-upgrade.zip

# 1.将补丁包下载到masterlab/upgrade目录下,并解压缩
# 2.将压缩包内的patch.zip文件和目录覆盖到masterlab原文件
# 3.如果压缩包内存在vendor.zip文件，则解压出来覆盖原来的vendor文件夹
# 4.在分别在数据库中执行 database.sql和index.sql
# 5.最后修改 `app/config/deploy/app.cfg.php`文件，将`MASTERLAB_VERSION`修改为最新版本号

```

### v2.0  至 v2.0.1 升级
下载升级文件 http://download.masterlab.vip/v2.0-v2.0.1-upgrade.zip ,压缩包内文件覆盖到根目录即可


### v1.2 至 v2.0.2 升级
下载升级文件 http://download.masterlab.vip/v1.2-v2.0.2-upgrade.zip ,按照压缩包内的 readme.md 进行升级  
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




   
