查阅下面的常见问题,帮助您解决疑惑或困难。


## 安装问题排查

1. 安装成功后访问首页报500错误，请确保从官方网站 http://www.masterlab.vip/download.php 下载最新的完整包  
   ,如果从 https://github.com/gopeak/masterlab 下载的代码,需要手动解压根目录的`vendor.zip`文件 
```                   
# Linux
unzip ./vendor.zip
```  

2. 如果输入正确账号密码却无法登录成功，要确保会话的目录对于当前运行的php用户拥有读写权限，可通过访问 /p.php 查找`$_SERVER['USER']`和`session.save_path`分别找到会话目录和当前php用户  

3. 建议您从官方网站下载完整的安装包，如果从github或码云上下载则不包含依赖的 vendor 类库  

4. `app/storage` 和 `app/public/install` 目录php运行用户需要写入权限  

5. 为查看安装出现的具体问题，可在 `app/config/deploy/app.cfg.php` 中修改错误报告  
```php
error_reporting(E_ERROR); // 修改为下面一行
error_reporting(E_ALL);
```  

6. 重新安装后或升级后界面显示有问题，请清除浏览器缓存  

7. 可手动关闭redis缓存，在 "管理/系统/缓存/修改"界面中可关闭缓存  

8. 邮件配置中发送测试成功，但是收不到邮件，是因为没有后台运行 `masterlab_socket` 程序,可以在邮件配置中禁用"异步方式发送邮件" 

9. 如果创建和更新事项都会有卡慢卡顿的情况，应该会是邮件推送引起的，在 “管理/系统/邮件配置”关闭邮件推送选项，然后重试  



## 如何快速的上手Masterlab？

1. 首先以管理员身份登录Masterlab
2. 接着在"管理/用户管理"中创建用户账号
3. 如果您的开发团队项目不多，可创建直接在default组织下创建项目
4. 在创建好的项目的设置中，给已经创建好的用户分配角色及权限
5. 在项目中再创建事项(bug 任务 优化改进型等)并分配给用户
6. 然后通过迭代看板和统计图表跟进事项的状态和解决结果。



## 如何启用LDAP认证

1. 先启用PHP的`ldap`扩展  
  windows系统纯净安装的，在浏览器访问 /p.php 查找`Loaded Configuration File`找到php的配置文件`php.ini`路径编辑,  
   ```
   # 去掉;
   ;extension=ldap
   extension=ldap
   ```  
  
   宝塔安装的，进入web管理面板，在`软件管理`界面找到php所有版本，在设置里将 ldap 扩展启用  
   
   Linux centos系统的，如果使用 yum webtatic 的源，则直接执行
   ```
   # php7.1版本用下面命令
   yum install -y php71w-ldap
   # php7.2版本用下面命令
   yum install -y php72w-ldap
   # 重启php-fpm
   systemctl restart php-fpm.service
   ```     
   Linux ubuntu，如果使用 yum webtatic 的源，则直接执行
   ```
   # php7.1版本用下面命令
   sudo apt-get install -y php7.1-ldap
   # php7.2版本用下面命令
   sudo apt-get install -y php7.2-ldap
   # 重启php-fpm
   sudo service php7.1-fpm restart 
   sudo service php7.2-fpm restart 
   ```
   Linux 源码安装的  
   ```
   # 进入php源码根目录的ext/ldap
   cd ./ext/ldap/
   phpize
   ./configure
   make & make install
   # 编译成功会生成ldap.so文件，并提示你要在php.ini加载 extension=ldap.so
   # 使用命令检查是否加载成功
   php -m | grep "ld"
   ```      
  
2. 启用`ldap`扩展后，以管理员身份进入Masterlab的"管理/系统/ldap认证"，配置ldap相关信息即可


## 什么是事项？

事项可以是一件事情，一个任务，一个需求，或一个bug，如果masterlab自带的事项类型不满足您的需求，管理员可以在系统中添加自定义事项类型

## 什么是经办人？

事项指派的处理人,也是负责人。分工明确，责任到人有利于提高团队协作的效率。

## 如何修改上传附件大小的限制
  首先在"管理/系统/附件设置"设置`最大上传附件的大小`；
  其次还要修改php.ini 的 `upload_max_filesize` , `post_max_size` 值；
  最后修改完后Windows系统的要重启apache，Linux系统的重启下php-fpm


## 状态和解决结果的区别？

- 状态是事项周期内的某一个过程的体现，状态一般由经办人如开发人员 设计师来变更。
- 解决结果是对经办人处理事项状态的评定，解决结果一般由QA或产品经理在操作。
- 状态和解决结果在用户刚使用的时候搞混，最好的区分方法由不同角色操作即可。

## 什么是工作流？

工作流是按照一定的规则和过程执行一个事项，在Masterlab中体现在事项在生命周期内不同状态之间的变化。 每个状态以矩形框表示。 
每个工作流跳转由箭头指引方向。你可以在 "系统"中添加自己的自定义工作流，详见《使用指南》。


## 升级失败怎么解决？
建议您升级前，手动备份masterlab的主程序和数据库。如果升级失败，编辑 `app/config/deploy/app.cfg.php`文件，将`MASTERLAB_VERSION`  
修改为原版本号，然后重新进入升级界面再次升级。如果无法得到解决，请加群联系群主。 



## 发现严重bug或修改怎么办？

您可以到 `https://github.com/gopeak/masterlab/issues/new` 提交您发现的bug或建议，我们将会尽快处理和反馈。


## Masterlab可以商业化吗？
你可以免费使用Masterlab社区版无需任何费用,您也可以对Masterlab社区版进行二次开发，但不得用于商业化，如需商业化或商业合作请联系QQ群314155057 管理员进行授权。


其他问题还可以加入我们的QQ群进行咨询: 314155057 https://jq.qq.com/?_wv=1027&k=51oDG9Z
