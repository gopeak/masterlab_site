<?php
$page = 'download';
define('ROOT_PATH', realpath(dirname(__FILE__)) . '/');
if (function_exists('date_default_timezone_set')) {
    date_default_timezone_set('Asia/Shanghai');
}

if (isset($_GET['file'])) {
    require_once "lib/comm_function.php";
    $file = ROOT_PATH . 'downloads/' . $_GET['file'];

    // local file that should be send to the client
    $local_file = $file;
// filename that the user gets as default
    $download_file = $file;
    //var_dump('downloads/' . $file);die;
    $download_rate = 85;
    if (file_exists($file)) {
        clientlog();

        // send headers
        header('Cache-control: private');
        header('Content-Type: application/octet-stream');
        header('Content-Length: ' . filesize($local_file));
        header('Content-Disposition: filename=' . $_GET['file']);

        // flush content
        flush();
        // open file stream
        $file = fopen($local_file, "r");
        while (!feof($file)) {
            // send the current file part to the browser
            print fread($file, round($download_rate * 1024));
            // flush the content to the browser
            flush();
        }
        // close file stream
        fclose($file);
    }
    die;
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="keywords" content="Masterlab,专业的项目管理工具">
    <meta name="description" content="助您交付卓越的产品">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>MasterLab - 互联网项目、产品管理解决方案--关于我们</title>
    <link rel="icon" href="https://gw.alipayobjects.com/os/antv/assets/favoricon.png" type="image/x-icon">
    <link rel="stylesheet" href="./about_files/bootstrap.min.css">
    <link rel="stylesheet" href="./about_files/bootstrap-grid.min.css">
    <link rel="stylesheet" href="./about_files/font_470089_q8g1f7kwli.css">
    <link rel="stylesheet" href="./about_files/common-84eda.css">
    <link rel="stylesheet" href="./about_files/slick.css">
    <link rel="stylesheet" href="./about_files/slick-theme.css">
    <link rel="stylesheet" href="./about_files/solarized-light.css">
    <link rel="stylesheet" href="./about_files/home-3defa.css">
    <link href="./favicon.ico" rel="shortcut icon" type="image/x-icon">

    <link rel="stylesheet" type="text/css" href="./product_files/index-1.css">
    <link rel="stylesheet" type="text/css" href="./product_files/index-2.css">
    <link rel="stylesheet" type="text/css" href="./product_files/featrue.css">
    <style>
        .align-right {
            text-align: right;
            margin-bottom: -32px;
            margin-right: 16px;
        }

        .img-landscape {
            margin: 0;
            max-width: 654px;
        }

        .main-info {
            /*line-height: 48px;*/
        }

        .intro {
            padding-bottom: 40px;
        }

        .features {
            padding: 128px 0;
        }

        .features h4 {
            font-size: 20px;
        }

        .blogs {
            min-height: 625px;
            padding: 112px 0 152px 0;
        }

        .card-body .description {
            font-weight: 300;
            padding: 0;
        }

        .blogs {
            padding: 112px 0 152px 0;
        }

        .blogs .col-md-6 {
            margin-top: 50px;
            padding: 0 32px;
        }

        .blogs .blog {
            border-radius: 4px;
            /*max-width: 100%;*/
            /*width: 100%;*/
            display: inline-block;
            height: 246px;
            /*color: #868e96;*/
            text-decoration: none;
            border: none;
            box-shadow: 0 2px 8px rgba(0, 0, 0, .09);
            margin: 0 auto;
            -webkit-transition: all .5s;
            -moz-transition: all .5s;
            transition: all .5s;
        }

        .blog:hover {
            text-decoration: none;
            -webkit-transform: translateY(-12px);
            -ms-transform: translateY(-12px);
            transform: translateY(-12px);
            box-shadow: 0 12px 24px rgba(0, 0, 0, .09);
        }

        .card-body {
            padding: 16px 24px;
        }

        .title {
            display: block;
            font-size: 16px;
            color: rgba(0, 0, 0, .85);
            margin-bottom: 4px;
        }

        .author {
            color: rgba(0, 0, 0, .45);
        }

        .avatar {
            border-radius: 10px;
            margin-right: 8px;
        }

        @media only screen and (max-width: 768px) {
            .img-landscape {
                margin: 64px 0 32px 0;
                max-width: 100%;
            }

            .card {
                margin: 16px auto;
            }

            .main-info {
                padding: 0 24px;
            }

            .header .main-info {
                padding: 0;
            }
        }

        .join-us {
            padding-bottom: 120px;
        }

        .info-items li {
            line-height: normal;
            padding: 14px 20px;
            display: flex;
            border-radius: 50px;
        }

        .info-items li:hover {
            background-color: #f5f5f5;
        }

        .info-items li > .face {
            display: none;
            width: 100px;
            height: 100px;
            border-radius: 50%;
        }

        .info-items li > .person {
            flex: 1;
            margin: 0 0 0 20px;
        }

        .info-items li > .person h4 {
            padding: 0 0 10px 0;
        }

        .description h2:before,
        .info-items li > .person h4:before {
            display: none;
        }
    </style>
    <? include 'hotjar.php'?>
</head>
<body class="template-home">

<div id="react-content">
    <div data-reactroot="" class="page-wrapper">
        <? include 'header.php' ?>

        <section class="description container text-center">
            <h2>下 载</h2>
            <span class="separator"></span>
            <div class="info-content">
                <p class="main-info">源代码托管于<a href="https://github.com/gopeak/masterlab/"> Github </a></p>
                <p class="main-info">Masterlab-full-last.zip为完整的代码包，无需安装Git和Composer命令行工具，安装过程详见<a href="help.php?md=install"> 文档 </a>页面 </p>
            </div>
        </section>

        <section class="description container text-center">
            <div class="info-content">
                <ul class="text-left info-items">
                    <li>
                        <img src="./about_files/intro-landscape.svg" class="face">
                        <div class="person">
                            <h4><a href="?file=masterlab-v1.0.2.zip">Masterlab-v1.0.2-last.zip</a></h4> v1.0.2 44.4M
                            <p>Masterlab完整代码,包含开发框架,Vendor类库,UTF-8字符集</p>
                        </div>
                    </li>
                    <li>
                        <img src="./about_files/intro-landscape.svg" class="face">
                        <div class="person">
                            <h4><a href="?file=Redis-x64-3.0.501.zip">Redis-x64-3.0.501.zip</a></h4> 5.7M
                            <p>Redis3.0 的Windows版本</p>
                        </div>
                    </li>
                </ul>
            </div>
        </section>

        <section class="join-us get-started description text-center">
            <h2></h2>
            <div class="info-content">
                <p class="main-info"></p>
            </div>
        </section>
        <? include 'footer.php' ?>
    </div>
</div>
<script type="text/javascript">
    /* eslint-disable */
    window.__meta = {
        "currentProduct": "vis",
        "assets": "/assets",
        "dist": "/assets/dist/3.0.0",
        "href": "/zh-cn/vis/index.html",
        "locale": "zh-cn",
        "version": "3.0.0"
    };</script>
<script src="./about_files/lodash-4.17.4.min.js"></script>
<script src="./about_files/jquery-3.2.1.min.js"></script>
<script src="./about_files/jquery.autocomplete-1.4.3.min.js"></script>
<script src="./about_files/jquery.visible-1.2.0.min.js"></script>
<script src="./about_files/popper.min.js"></script>
<script src="./about_files/bootstrap.min.js"></script>
<script src="./about_files/lazyload-2.0.0-beta.2.min.js"></script>
<div id="___tracers" style="display:none">

</div>
<div class="autocomplete-suggestions"
     style="position: absolute; display: none; max-height: 300px; z-index: 9999;"></div>
</body>
</html>