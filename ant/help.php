<?php
$page = 'help';

$mdFile = 'introduce';
if (isset($_GET['md'])) {
    $mdFile = str_replace(['/', '\\'], ['', ''], $_GET['md']);
}
if ($mdFile == 'install') {
    $mdFile = 'env';
}

require_once './lib/parsedown/Parsedown.php';

?>
<!DOCTYPE html>
<!-- saved from url=(0058)https://antv.alipay.com/zh-cn/g2/3.x/tutorial/history.html -->
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>MasterLab - 互联网项目、产品管理解决方案</title>
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
    <? include 'hotjar.php'?>

</head>
<body class="template-doc">

<? include 'header.php' ?>

<div class="drawer-toggle"><span class="iconfont icon-menu-fold"></span></div>
<div class="drawer-overlay"></div>

<div class="doc-container container-fluid">
    <div class="row flex-xl-nowrap">
        <div class="menu bd-sidebar drawer">
            <div class="inner">
                <div class="filter-container"></div>
                <ul class="list-group">
                    <li class="list-group-item <? if ($mdFile == 'introduce') echo 'active'; ?>">
                        <a href="./help.php">介绍</a></li>
                    <li class="list-group-item <? if ($mdFile == 'env') echo 'active'; ?>">
                        <a href="?md=env">运行环境</a></li>
                    <li class="list-group-item <? if ($mdFile == 'install-windows') echo 'active'; ?>">
                        <a href="?md=install-windows">Windows安装示例</a></li>
                    <li class="list-group-item <? if ($mdFile == 'install-linux') echo 'active'; ?>">
                        <a href="?md=install-linux">Linux安装示例</a></li>
                    <li class="list-group-item <? if ($mdFile == 'explain_word') echo 'active'; ?>">
                        <a href="?md=explain_word">名词解释</a></li>
                    <li class="list-group-item <? if ($mdFile == 'quickstart') echo 'active'; ?>">
                        <a href="?md=quickstart">快速上手</a></li>
                    <li class="list-group-item <? if ($mdFile == 'advanced') echo 'active'; ?>">
                        <a href="?md=advanced">进阶</a>
                    </li>
                    <li class="list-group-item <? if ($mdFile == 'faq') echo 'active'; ?>">
                        <a href="?md=faq">常见问题</a>
                    </li>
                    <li class="list-group-item <? if ($mdFile == 'key') echo 'active'; ?>">
                        <a href="?md=key">快捷键</a>
                    </li>
                    <li class="list-group-item <? if ($mdFile == 'developer_guide') echo 'active'; ?>">
                        <a href="?md=developer_guide">开发指南</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="detail content">
            <div class="toc-container" style="position: absolute;">
                <div class="toc">

                </div>
            </div>
            <article id="description-view" class="markdown">
                <?php
                $markdown = file_get_contents('./docs/' . $mdFile . '.md');
                echo Parsedown::instance()->text($markdown);
                ?>
            </article>
        </div>
    </div>
</div>

<? include 'footer.php' ?>
<script type="text/javascript">

    window.__meta = {
        "currentProduct": "g2",
        "assets": "/assets",
        "dist": "/assets/dist/3.0.0",
        "href": "/zh-cn/g2/3.x/tutorial/history.html",
        "locale": "zh-cn",
        "version": "3.0.0"
    };
</script>
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
     style="position: absolute; display: none; max-height: 300px; z-index: 9999;">

</div>

</body>
</html>