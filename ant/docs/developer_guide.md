# 开发指南
## 开发框架
>Masterlab使用Hornet-framework框架进行开发的，Hornet-framework是一个高性能,轻量级,易于上手,功能完备的PHP LMVC 开发框架。 
LMVC分别是 Logic逻辑 Model模型 View视图 Ctrl控制器，与传统的MVC框架比多一层Logic层，目的是解决在复杂的应用系统时，
逻辑代码混杂于Model或Ctrl之间的问题。


## 要求
Masterlab 当前主要使用 PHP 和 JQuery 以及Mysql技术进行开发,为提高PHP的执行性能性能，开发使用PHP7.0以上的版本，依赖类库使用Composer进行组织，
数据库使用Mysql5.7及以上版本以支持中文全文索引,为减少数据库查询使用Redis作为数据缓存。

```
git v2.1 +
php v7.1 +
phpunit v7.0+
composer v1.6.0 +
Mysql v5.7 +
Redis v3.0 +
```


## 配置开发环境


通过git获取源代码

```
mkdir /c/www/
cd /c/www/
git clone git@github.com:gopeak/hornet-framework.git
git clone git@github.com:gopeak/masterlab.git
cd masterlab
git checkout -b dev
git pull origin dev
composer update

```

安装 Masterlab 参考文档 http://www.masterlab.vip/help.php?md=env 

 

## Masterlab的目录结构说明
```

hornet-framework        开发框架
masterlab
|--  vendor             为composer的第三方类库
|--  lib                为非vendor的第三方类库
|--  app 为项目实现代码
      |--   app/classes  为逻辑实现类
      |--   app/config   为配置文件目录，有部署 开发不同的配置可切换
      |--   app/ctrl     控制器目录，用于编写流程控制
      |--   app/function 为函数存放目录
      |--   app/model    为模型类，主要用于数据库 缓存 IO 等交互
      |--   app/public   为网站访问到目录，入口文件在此，可存放静态文件
      |--   app/api      为api接口的控制器类
      |--   app/storage  为存储目录,可存放临时文件 上传文件 大数据等
      |--   app/test     测试相关目录,使用PHPUNIT进行单元测试和自动化测试
      |--   app/view     视图层
      |--   app/server   异步，队列,定时执行的服务代码
```

## 插件开发
目前Masterlab尚未支持插件功能，因为如果要进行二次开发，只能在当前的代码直接修改

## PHP代码说明
* PHP代码遵循psr2标准，使用户驼峰命名规范
* 更多的开发说明，请参考 Hornet-framework 的开发指南 https://github.com/gopeak/hornet-framework/wiki
* 项目中大部分使用了前后端分离，以ajax异步调用的方式获取和显示数据。
* 部分页面的内容仍然使用php代码直接输出和控制前端的html js, php.ini需要开启 short_open_tag 
* app/config 有不同状态的配置，开发时从deploy中复制一份为 development ,然后再 .env 文件中修改为 development 即可
* 每当修复某个bug或新加一些功能后，要编写对应的测试代码，以保障质量，测试代码位于 app/test ,如何运行参见 readme.txt 文件
* 配置文件中的 app.cfg.php 为主配置文件，可以开启或关闭 缓存，调试等选项

## 前端说明
使用Jquery 作为基础的类库，前端数据获取主要通过ajax调用的方式获取，获取数据后通过handlebars模板引擎进行视图呈现。后期规划使用Vue的单页模式进行开发。
事项导航搜索模块的UI和交互等使用了Gitlab源码。