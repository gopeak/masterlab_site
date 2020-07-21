<?php
$page = 'about';
?>
<!DOCTYPE html>
<!-- saved from url=(0044)https://antv.alipay.com/zh-cn/vis/index.html -->
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <? include 'seo.php'?>
    <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,minimum-scale=1.0,user-scalable=no" />
    <title>MasterLab - 互联网项目、产品管理解决方案--关于我们</title>
    <link rel="stylesheet" href="./about_files/bootstrap.min.css">
    <link rel="stylesheet" href="./about_files/bootstrap-grid.min.css">
    <link rel="stylesheet" href="./about_files/font_470089_q8g1f7kwli.css">
    <link rel="stylesheet" href="./about_files/common-84eda.css">
    <link rel="stylesheet" href="./about_files/slick.css">
    <link rel="stylesheet" href="./about_files/slick-theme.css">
    <link rel="stylesheet" href="./about_files/solarized-light.css">
    <link rel="stylesheet" href="./about_files/home-3defa.css">
    <link href="./favicon.ico" rel="shortcut icon" type="image/x-icon">

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
        .join-us{
            padding-bottom:120px;
        }
        .info-items li {
            line-height: normal;
            padding: 14px 20px;
            display: flex;
            border-radius: 50px;
        }
        .info-items li:hover{
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
        .info-items li > .person h4{
            padding: 0 0 10px 0;
        }
        .description h2:before,
        .info-items li > .person h4:before{
            display: none;
        }
    </style>
    <? include 'hotjar.php'?>
</head>
<body class="template-home">

<div id="react-content">
    <div data-reactroot="" class="page-wrapper">
        <? include 'header.php'?>


        <section class="intro">
            <div class="container">
                <div class="header row">
                    <div class="col-md-5">
                        <h1>关于我们</h1>
                        <p class="main-info">

                            MasterLab 发扬开源和分享互联网精神，充分利用来自开源的其他力量，积极融入开源社区，发扬开源协作创新精神，合理应用开源技术为互联网企业服务！</p>
                        <br>
                        <p class="main-info">才启程，不停步，愿与君同行。</p>
                    </div>
                    <div class="col-md-7">
                        <img class="img-landscape" src="./about_files/word.png" alt="">
                    </div>
                </div>
            </div>
        </section>

        <section class="description container text-center">
            <h2 id="关于团队">关于团队</h2>
            <span class="separator"></span>
            <div class="info-content">
                <p class="main-info">我们一支富有激情充满活力的技术团队，也是一群可爱的人，一起快乐做一件有意义的事情。</p>

                
            </div>
        </section>

        <section class="description container text-center" style="display: ">
            <h2 id="关于团队">团队成员</h2>
            <span class="separator"></span>
            <div class="info-content">
                <ul class="text-left info-items">
                    <li>
                        <img src="./about_files/intro-landscape.svg" class="face">
                        <div class="person">
                            <h4>Sven</h4>
                            <p>产品经理兼码农, 爱好摩旅、徒步穿越、攀登</p>
                        </div>
                    </li>
                    <li>
                        <img src="./about_files/intro-landscape.svg" class="face">
                        <div class="person">
                            <h4>Lyman</h4>
                            <p>技术大拿，IT界的李健</p>
                        </div>
                    </li>
                    <li>
                        <img src="./about_files/intro-landscape.svg" class="face">
                        <div class="person">
                            <h4>Mo</h4>
                            <p>资深前端工程师&UI设计师, 美食家  </p>
                        </div>
                    </li>
                    <li>
                        <img src="./about_files/intro-landscape.svg" class="face">
                        <div class="person">
                            <h4>Jelly</h4>
                            <p>资深前端工程师, 程序员中花木兰</p>
                        </div>
                    </li>
                    <li>
                        <img src="./about_files/intro-landscape.svg" class="face">
                        <div class="person">
                            <h4>Jouney</h4>
                            <p>擅长运营推广</p>
                        </div>
                    </li>
                </ul>
            </div>
        </section>
        <!--
                <section class="description container text-center">
                    <h2 id="">开发理念</h2>
                    <span class="separator"></span>
                    <div class="info-content">
                        <ul  class="text-left info-items" >
                            <li>简单 -因为迭代和渐进开发，不需要一次到位简单可读性</li>
                            <li>勇气 -勇于承担任务，授权，完成任务，赢得尊重</li>
                            <li>沟通 -文档完整规范清晰;团队氛围良好，及早沟通，自组织团队</li>
                            <li>反馈 -沟通后需要再次反馈；快速将产品投入市场，收到反馈，再次迭代</li>
                        </ul>
                    </div>
                </section>

                <section class="description container text-center">
                    <h2 id="">开发实践</h2>
                    <span class="separator"></span>
                    <div class="info-content">
                        <ul  class="text-left info-items" >
                            <li>单元测试  及时反馈极大降低回归测试成本极大减少调试时间部署起来信心十足</li>
                            <li>持续集成  提早集成，自动化部署
                            </li>
                            <li>重构  收放自如 偿还技术债务</li>
                            <li>代码规范  用代码进行沟通，清晰表达意图 动态评估取舍 保持简单</li>
                        </ul>
                    </div>
                </section>

               <section class="join-us get-started description text-center ">
                    <h2 id="">加入我们</h2>
                    <span class="separator"></span>
                    <div class="info-content">
                        <p class="main-info">如果你对编程、
                            数据分析、交互设计充满激情，无论你是工程师，还是设计师，请联系我们，期待你的加入。weichaoduo@163.com</p>
                            <a href="mailto:weichaoduo@163.com" class="btn btn-round-link more-tutorial btn-primary btn-lg">立即加入</a>
                    </div>
                </section>-->

        <section class="join-us get-started description text-center">
            <h2 id="">联系我们</h2>
            <span class="separator"></span>
            <div class="info-content">
                <ul  class="text-left info-items" >
                <li  >地址：广东省深圳市罗湖区水贝二路特力大厦916室</li>
                <li  >电话：0755-25118069</li>
                <li >邮箱：weichaoduo@163.com</li>
                <li ><a href="https://map.baidu.com/poi/%E7%89%B9%E5%8A%9B%E5%A4%A7%E5%8E%A6/@12705045.265,2564479.37,19z?uid=af1ae56b59966f124207c16f&ugc_type=3&ugc_ver=1&device_ratio=1&compat=1&querytype=detailConInfo&da_src=shareurl">
                    <img src="Images/map_add.png">
                        </a>
                </li>
                </ul>
            </div>
        </section>

        <? include 'footer.php'?>
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
<script type="text/javascript" src="./about_files/g2.min.js"></script>
<script type="text/javascript" src="./about_files/data-set.min.js"></script>
<script src="./about_files/jquery.headroom-0.9.4.min.js"></script>
<script src="./about_files/slick.min.js"></script>
<script src="./about_files/clipboard-1.7.1.min.js"></script>
<script src="./about_files/home-049f8.js"></script>
<script src="./about_files/common-729ed.js"></script>
<div class="autocomplete-suggestions"
     style="position: absolute; display: none; max-height: 300px; z-index: 9999;"></div>
</body>
</html>