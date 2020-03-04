<?php
$page = 'milestone';
?>
<!DOCTYPE html>
<!-- saved from url=(0058)https://antv.alipay.com/zh-cn/g2/3.x/tutorial/history.html -->
<html>
<head>
    <? include 'meta.php' ?>
    <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,minimum-scale=1.0,user-scalable=no" />
    <title>MasterLab - 互联网项目、产品管理解决方案--里程碑</title>
    <link rel="stylesheet" href="./history_files/bootstrap.min.css">
    <link rel="stylesheet" href="./history_files/bootstrap-grid.min.css">
    <link rel="stylesheet" href="./history_files/font_470089_q8g1f7kwli.css">
    <link rel="stylesheet" href="./history_files/common-84eda.css">
    <link rel="stylesheet" href="./history_files/solarized-light.css">
    <link rel="stylesheet" href="./history_files/tocbot.css">
    <link rel="stylesheet" href="./history_files/doc-dda30.css">
    <link href="./favicon.ico" rel="shortcut icon" type="image/x-icon">

    <link href="./favicon.ico" rel="shortcut icon" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="./product_files/index-1.css">
    <link rel="stylesheet" type="text/css" href="./product_files/index-2.css">
    <link rel="stylesheet" type="text/css" href="./product_files/featrue.css">
    <? include 'hotjar.php'?>
</head>
<body class="template-doc">
<div style="display: none">
    <img src="./history_files/logo-with-text.svg" alt=""> <img
            src="./history_files/bpKcpwimYnZMTarUxCEd.png" alt="">
</div>
<? include 'header.php' ?>

<div class="drawer-toggle"><span class="iconfont icon-menu-fold"></span></div>
<div class="drawer-overlay"></div>
<div class="doc-container container-fluid">
    <div class="row flex-xl-nowrap">
        <div class="menu bd-sidebar drawer">
            <div class="inner">
                <div class="filter-container"></div>
                <ul class="list-group">
                    <li class="list-group-item active"><a href="./milestone.php">里程碑</a></li>
                    <li class="list-group-item"><a href="./todo.php">未来规划</a></li>
                </ul>
            </div>
        </div>
        <div class="main-container ant-col-xs-24 ant-col-sm-24 ant-col-md-18 ant-col-lg-19">
            <article class="markdown">
                <h1><!-- react-text: 7590 -->更新log<!-- /react-text --></h1>
                <h2>v2.0 版本发布</h2>
                <p>新增甘特图模块，创新的将事项分解和思维导图进行整合</p>
                <p>新功能：</p>
                <ol>
                    <li>事项分解功能，创新的将思维导图和事项分解进行整合，直观高效的进行事项管理</li>
                    <li>项目甘特图功能，可有效的对全项目和迭代进行时间计划和资源配置 </li>
                    <li>增强了看板模块的自定义功能，看板数据高度可配置</li>
                    <li>增加事项的高级查询功能，多条件可嵌套，这是史上最高级的查询，满足多样的查询需求 </li>
                    <li>首页小工具，增加“我关注的事项”，“分配我未解决事项”</li>
                    <li>项目设置增加了迭代管理</li>
                    <li>项目统计增加了"全部事项"，“已解决事项”，“未解决事项”的筛选</li>
                    <li>管理页面增加了服务器信息的显示</li>
                    <li>管理/用户管理增加了修改头像的功能</li>
                    <li>增加了项目的归档功能</li>
                    <li>全局权限升级为基于角色的管理</li>
                    <li>增加“允许用户注册”设置项</li>
                    <li>项目列表增加了排序和搜索功能</li>
                </ol>
                <p>优化改进项：</p>
                <ol>
                    <li>事项表单的状态和解决结果由下拉菜单变更为标签选择</li>
                    <li>优化了过滤器的显示和管理 </li>
                    <li>优化了项目设置的UI和交互</li>
                    <li>代码的视图从php修改为twig模板引擎</li>
                    <li>实现列表页面增加当前用户未解决的数量</li>
                    <li>简化了安装要求，redis服务和redis的php扩展不再是必须的，php.ini的short_open_tag不需要打开</li>
                </ol>
                <p>废弃功能：</p>
                <ol>
                    <li>全局权限与用户组无关</li>
                    <li>不再支持如 htttp://xxxx.com/masterlab 二级虚拟目录,建议通过web服务器配置不同的端口 </li>
                    <li>web服务器不需要配置 /attachment 别名，上传的附件被移动到 app/public//attachment</li>
                    <li>移除了一些不常用的事项列表的系统过滤器</li>
                    <li>全局搜索不再使用全文索引</li>
                </ol>
                <h2>v1.2 版本发布</h2>
                <p>新增多项实用功能和优化改进项，同时修复大量bug</p>
                <p>新功能和优化改进有:</p>
                <ol>
                    <li>增加项目成员管理功能</li>
                    <li>事项列表中用户可以自定义显示列 </li>
                    <li>事项导入导出</li>
                    <li>响应式视图及排序功能</li>
                    <li>可以在事项描述中粘贴截图</li>
                    <li>浏览器兼容提示</li>
                </ol>
                <p><hr></p>
                <h2>v1.1 版本</h2>
                <p>新增多项功能和修复bug</p>
                <p>新增功能:</p>
                <ol>
                    <li>事项更时触发邮件推送，收件人可选：报告人，负责人，关注人</li>
                    <li>增加了socket服务程序，用于实时数据通信和异步执行</li>
                    <li>增加事项详情的相关活动日志</li>
                    <li>增加Redis连接配置密码认证</li>
                </ol>
                    <p>修复bug：</p>
                    <ol>
                    <li>UI界面问题</li>
                    <li>邮件无法发送的问题</li>
                    <li>后台管理用户的一系列问题</li>
                    <li>首页自定义面板删除无效的问题</li>
                </ol>
                <p><hr></p>
                <h2>v1.0.3 版本发布</h2>
                <p>Masterlab在打造极致卓越的项目管理工具路上奔跑着！v1.0.3版本增加了事项模块的多个新功能，进一步完善权限模块，并修复20多个bug，建议升级到该版本：</p>
                <ol>
                    <li>完善了权限模块</li>
                    <li>完善了子任务功能</li>
                    <li>新增事项描述模板的管理</li>
                    <li>新增了事项过滤器的管理</li>
                    <li>新增权重值的统计</li>
                    <li>安装过程增加php session 目录的权限检查</li>
                    <li>增加事项延期和警告的图标</li>
                    <li>事项/详情视图增加了“上一个”和“下一个”功能</li>
                    <li>增加关闭事项功能</li>
                    <li>修复待办事项变更，用户注册，事项查询，影响版本等20多个bug</li>
                </ol>
                <p><hr></p>
                <h2>v1.0 正式版发布</h2>
                <p>2019.01.01,祝大家新年快乐，同时1.0版本中也正式发布了，修复了众多明显的bug并增加如下功能点：</p>
                <ol>
                    <li>简化安装过程及文档，增加了图文安装过程</li>
                    <li>事项的附件可以通过移动端扫码上传</li>
                    <li>增加了首页的自定义面板功能，每个用户可以管理和排列首页内容</li>
                    <li>不再支持Sphinx全文搜索引擎，Mysql版本建议使用5.7或以上的版本</li>
                    <li>增加了左侧菜单选项</li>
                    <li>删除了许多不必要的文件，完整代码包大小由原来的70多M减少到45M</li>
                    <li>增加了收集用户基本信息（非重要或敏感）的功能</li>
                    <li>...</li>
                </ol>
                <p><hr></p>
                <h2>v1.0-pre 体验版发布</h2>
                <p>2018.11.6,修复了大部分bug,正式推出</p>
                <ol>
                    <li>logo设计</li>
                    <li>Loading 动画, 无数据插画, 错误的友好提示</li>
                    <li>事项弹出层滚动优化</li>
                    <li>事项列表根据选项可直接右侧浮出详情</li>
                    <li>事项表单上传组件优化</li>
                    <li>Backlog页面左侧菜单UI美化</li>
                    <li>Backlog 页面的Sprint子面板增加描述UI</li>
                    <li>Backlog页面左侧面板取消滚动，而右侧事项列表要求滚动</li>
                    <li>左侧面板的Backlog和Closed可以将事项拖动进去</li>
                    <li>看板事项UI美化</li>
                    <li>项目列表首页优化</li>
                    <li>项目表单优化</li>
                    <li>统计</li>
                    <li>图表</li>
                    <li>...</li>
                </ol>
                <p><hr></p>

                <h2> v0.9-alpha 版本发布</h2>
                <p>2018.7.28,实现了完整功能且流程通畅</p>
                <ol>
                    <li>事项列表的复制，删除 </li>
                    <li>事项列表加入到 Backlog Sprint </li>
                    <li>事项列表，可以在右侧弹出详情</li>
                    <li>事项子任务 </li>
                    <li>事项列表的搜索优化</li>
                    <li>事项详情的操作按钮功能(编辑 复制 自定义字段 关注 状态 解决结果 附件 删除) √</li>
                    <li>事项的协作人 </li>
                    <li>系统中的各种设置项的应用(时间 公告 附件 UI) </li>
                    <li>备份和恢复</li>
                    <li>权限控制的应用 </li>
                    <li>用户资料功能点 </li>
                    <li>首页显示定义和实现</li>
                    <li>动态的定义和显示 </li>
                    <li>统一的语言(中文) </li>
                    <li>快捷键</li>
                    <li>...</li>
                </ol>
                <p><hr></p>

                <h2>完成产品设计</h2>
                <p>2018.4.1,确定了产品结构和关系，输出文档和交互页面</p>
                <p></p>
                <h2>组建团队</h2>
                <p>2017.12.1</p>
                <p></p>

            </article>
        </div>
    </div>
</div>
<footer class="navbar navbar-expand-lg bg-dark" style="display: none">
    <div class="container">
        <div class="navbar-collapse" id="navbarFooter">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item"><a class="declaration" href="https://weibo.com/antv2017"><span
                                class="iconfont icon-sinaweibo"></span></a></li>
                <li class="nav-item"><a class="declaration" href="https://github.com/antvis/"><span
                                class="iconfont icon-github"></span></a></li>
                <li class="nav-item"><a class="declaration" href="#">关于我们</a>
                </li>
            </ul>
            <a class="declaration" href="#">隐私权政策</a> <span>|</span> <a
                    class="declaration" href="#">权益保障承诺书</a> <span>ICP </span>
        </div>
    </div>
</footer>
<script type="text/javascript">/* eslint-disable */
    window.__meta = {
        "currentProduct": "g2",
        "assets": "/assets",
        "dist": "/assets/dist/3.0.0",
        "href": "/zh-cn/g2/3.x/tutorial/history.html",
        "locale": "zh-cn",
        "version": "3.0.0"
    };</script>
<script src="./history_files/lodash-4.17.4.min.js"></script>
<script src="./history_files/jquery-3.2.1.min.js"></script>
<script src="./history_files/jquery.autocomplete-1.4.3.min.js"></script>
<script src="./history_files/jquery.visible-1.2.0.min.js"></script>
<script src="./history_files/popper.min.js"></script>
<script src="./history_files/bootstrap.min.js"></script>
<script src="./history_files/lazyload-2.0.0-beta.2.min.js"></script>
<div id="___tracers" style="display:none">

</div>
<script src="./history_files/jquery.headroom-0.9.4.min.js"></script>
<script src="./history_files/clipboard-1.7.1.min.js"></script>
<script src="./history_files/tocbot.min.js"></script>
<script src="./history_files/doc-eda67.js"></script>
<script src="./history_files/common-729ed.js"></script>
<div class="autocomplete-suggestions"
     style="position: absolute; display: none; max-height: 300px; z-index: 9999;"></div>
<div class="autocomplete-suggestions"
     style="position: absolute; display: none; max-height: 300px; z-index: 9999;"></div>
</body>
</html>