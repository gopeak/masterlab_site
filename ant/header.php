<link rel="stylesheet" type="text/css" href="./product_files/mobile.css" media="screen and (min-width: 320px) and (max-width:640px)">

<header id="header" class="clearfix home-page-header">
    <div class="ant-row header-content">
        <div class="header-logo ant-col-xs-24 ant-col-sm-24 ant-col-md-8 ant-col-lg-5 ant-col-xl-5 ant-col-xxl-4">
            <a id="logo" href="./index.php">
                <img alt="logo" src="./product_files/KDpgvguMpGfqaHPjicRK.svg"><span>MasterLab</span></a>
        </div>

        <button class="btn btn-toggle">
            <svg viewBox="64 64 896 896" class="" data-icon="menu" width="1em" height="1em" fill="currentColor" aria-hidden="true">
                <path d="M904 160H120c-4.4 0-8 3.6-8 8v64c0 4.4 3.6 8 8 8h784c4.4 0 8-3.6 8-8v-64c0-4.4-3.6-8-8-8zm0 624H120c-4.4 0-8 3.6-8 8v64c0 4.4 3.6 8 8 8h784c4.4 0 8-3.6 8-8v-64c0-4.4-3.6-8-8-8zm0-312H120c-4.4 0-8 3.6-8 8v64c0 4.4 3.6 8 8 8h784c4.4 0 8-3.6 8-8v-64c0-4.4-3.6-8-8-8z"></path>
            </svg>
        </button>

        <div class="header-nav-bar ant-col-xs-0 ant-col-sm-0 ant-col-md-16 ant-col-lg-19 ant-col-xl-19 ant-col-xxl-20" id="header-nav-bar">
            <div id="search-box" style="display: none"><i class="anticon anticon-search"></i>
           
            </div>

            <ul class="ant-menu menu-site ant-menu-light ant-menu-root ant-menu-horizontal" id="nav"
                role="menu">

               <!-- <li class="ant-menu-item " role="menuitem">
                    <a  href="./index.php"><span>首页</span></a>
                </li>-->
                <li class="ant-menu-item <? if($page=='product') echo 'ant-menu-item-selected'; ?> " role="menuitem">
                    <a   href="./index.php"><span>首 页</span></a>
                </li>
                <li class="ant-menu-item  <? if($page=='demo') echo 'ant-menu-item-selected'; ?>" role="menuitem">
                    <a href="./demo.php"><span>Demo</span></a>
                </li>
                <li class="ant-menu-item  <? if($page=='help') echo 'ant-menu-item-selected'; ?>" role="menuitem">
                    <a href="./help.php"><span>文 档</span></a>
                </li>
                <li class="ant-menu-item  <? if($page=='download') echo 'ant-menu-item-selected'; ?>" role="menuitem">
                    <a  href="./download.php"><span>下 载</span></a>
                </li>
                <li class="ant-menu-item  <? if($page=='milestone') echo 'ant-menu-item-selected'; ?>" role="menuitem">
                    <a  href="./milestone.php"><span>时间轴</span></a>
                </li>
                <li class="ant-menu-item  <? if($page=='donate') echo 'ant-menu-item-selected'; ?>" role="menuitem">
                    <a  href="./donate.php"><span>打 赏</span></a>
                </li>
                <li class="ant-menu-item  <? if($page=='about') echo 'ant-menu-item-selected'; ?>" role="menuitem"><a href="./about.php"><span>关于我们</span></a>
                </li>
                <li class="ant-menu-item " role="menuitem" >
                    <a  href="https://github.com/gopeak/masterlab"><span>Github</span></a>
                </li>

            </ul>

        </div>
    </div>
</header>

<script src="./about_files/jquery-3.2.1.min.js"></script>

<script>
    $(function () {
       


        $(".btn.btn-toggle").on("click", function (e) {
            e.preventDefault();
            e.stopPropagation();

            if ($("#header-nav-bar").is(":visible")) {
                $("#header-nav-bar").slideUp(300);
            } else {
                $("#header-nav-bar").slideDown(300);
            }
        });
    });
</script>