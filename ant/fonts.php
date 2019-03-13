<?php
$page = 'ux';
?>
<!DOCTYPE html>
<!-- saved from url=(0058)https://antv.alipay.com/zh-cn/g2/3.x/tutorial/history.html -->
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,minimum-scale=1.0,user-scalable=no" />
    <title>MasterLab - 互联网项目、产品管理解决方案--UX设计原则</title>
    <link rel="icon" href="https://gw.alipayobjects.com/os/antv/assets/favoricon.png" type="image/x-icon">
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
                    <li class="list-group-item"><a href="/zh-cn/vis/design/index.html">设计原则</a></li>
                    <li class="list-group-item"><a href="/zh-cn/vis/design/color.html">色彩</a></li>
                    <li class="list-group-item active"><a href="/zh-cn/vis/design/font.html">字体</a></li>
                </ul>
            </div>
        </div>
        <div class="detail content">
            <div class="toc-container">
                <div class="toc">
                    <ul class="toc-list ">
                        <li class="toc-list-item"><a href="#_字体" class="toc-link node-name--H1  is-active-link">字体</a>
                            <ul class="toc-list ">
                                <li class="toc-list-item"><a href="#_字体家族" class="toc-link node-name--H2 ">字体家族</a></li>
                                <li class="toc-list-item"><a href="#_字号" class="toc-link node-name--H2 ">字号</a></li>
                                <li class="toc-list-item"><a href="#_字体颜色" class="toc-link node-name--H2 ">字体颜色</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
            <article><h1 id="_字体"><a href="#_字体" class="anchor"></a>字体</h1>
                <p>AntV 的字体是基于<a href="https://docs.gitlab.com/ee/development/ux_guide/features.html"> Gitlab 和 Ant Design 字体体系</a>，并结合数据可视化特性而选定。遵循 AntV
                    数据可视化中 “清晰” 的设计原则，需具备“可读性”、“易读性”，避免不必要修饰。</p>
                <p>选用字体需有以下三个注意点：</p>
                <ul>
                    <li>为方便数据的比较和阅读，建议选取等宽字体；</li>
                    <li>跨平台的字体设定，力求在各个操作系统下都有最佳展示效果；</li>
                    <li>合理的使用不同的字重、字号和颜色来强调图表中信息重要等级；</li>
                </ul>
                <h2 id="_字体家族"><a href="#_字体家族" class="anchor"><span class="iconfont icon-link"></span></a>字体家族</h2>
                <p>AntV 的字体家族优先使用系统默认的界面字体，同时提供了一套利于屏显的备用字体库，来维护在不同平台以及浏览器的显示下字体始终保持良好的可读性和易读性，体现了友好，稳定和专业的特性。</p>
                <p>字体家族 css 代码如下：</p>
                <div class="highlight"><pre><span class="hljs-selector-tag">font-family</span>: <span
                                class="hljs-selector-tag">-apple-system</span>, <span class="hljs-selector-tag">BlinkMacSystemFont</span>, "<span
                                class="hljs-selector-tag">Segoe</span> <span class="hljs-selector-tag">UI</span>", <span
                                class="hljs-selector-tag">Roboto</span>,
             "<span class="hljs-selector-tag">Helvetica</span> <span class="hljs-selector-tag">Neue</span>", <span
                                class="hljs-selector-tag">Helvetica</span>, "<span
                                class="hljs-selector-tag">PingFang</span> <span
                                class="hljs-selector-tag">SC</span>", "<span
                                class="hljs-selector-tag">Hiragino</span> <span
                                class="hljs-selector-tag">Sans</span> <span class="hljs-selector-tag">GB</span>", "<span
                                class="hljs-selector-tag">Microsoft</span> <span class="hljs-selector-tag">YaHei</span>",
             <span class="hljs-selector-tag">SimSun</span>, <span class="hljs-selector-tag">sans-serif</span>;
</pre>
                </div>
                <p>另外，在中后台系统中，数字经常需要进行纵向对比展示，我们单独将数字的字体设置为<code>Helvetica Neue</code>，使其为等宽字体。</p>
                <h2 id="_字号"><a href="#_字号" class="anchor"><span class="iconfont icon-link"></span></a>字号</h2>
                <p>使用不同的字号和字重来传递图表中的视觉信息层次。默认字体为<code>12pt</code>。 <img
                            src="https://gw.alipayobjects.com/zos/rmsportal/NeUwjaYGVAgwiMZfibpU.jpeg"
                            alt="图表文字大小.jpg | center | 704x253"></p>
                <h2 id="_字体颜色"><a href="#_字体颜色" class="anchor"><span class="iconfont icon-link"></span></a>字体颜色</h2>
                <p><img src="https://gw.alipayobjects.com/zos/rmsportal/OAujCWIkyFgDIlgilrHJ.png"
                        alt="image.png | left | 562x205"></p>
                <div class="prev-next"><a href="./fonts.php" class="float-left pre">色彩</a></div>
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
                <li class="nav-item"><a class="declaration" href="https://antv.alipay.com/zh-cn/about.html">关于我们</a>
                </li>
            </ul>
            <a class="declaration" href="https://docs.alipay.com/policies/privacy/antfin">隐私权政策</a> <span>|</span> <a
                    class="declaration" href="https://render.alipay.com/p/f/fd-izto3cem/index.html">权益保障承诺书</a> <span>ICP 证浙 B2-2-100257 Copyright © 蚂蚁金融服务集团</span>
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