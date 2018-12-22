<script>
    var _hmt = _hmt || [];
    (function() {
        var hm = document.createElement("script");
        hm.src = "https://hm.baidu.com/hm.js?c27224e9422ad09a7671501443713d99";
        var s = document.getElementsByTagName("script")[0];
        s.parentNode.insertBefore(hm, s);
    })();
</script>

<header id="header" class="clearfix home-page-header">
    <div class="ant-row">
        <div class="ant-col-xs-24 ant-col-sm-24 ant-col-md-8 ant-col-lg-5 ant-col-xl-5 ant-col-xxl-4">
            <a id="logo" href="./index.php">
                <img alt="logo" src="./product_files/KDpgvguMpGfqaHPjicRK.svg"><span>MasterLab</span></a>
        </div>
        <div class="ant-col-xs-0 ant-col-sm-0 ant-col-md-16 ant-col-lg-19 ant-col-xl-19 ant-col-xxl-20">
            <div id="search-box" style="display: none"><i class="anticon anticon-search"></i>
                <div class="ant-select-show-search ant-select-auto-complete ant-select ant-select-combobox ant-select-enabled">
                    <div class="ant-select-selection
            ant-select-selection--single" role="combobox" aria-autocomplete="list" aria-haspopup="true"
                         aria-expanded="false">
                        <div class="ant-select-selection__rendered">
                            <div unselectable="on" class="ant-select-selection__placeholder"
                                 style="display: block; user-select: none;">搜索组件...
                            </div>
                            <ul>
                                <li class="ant-select-search ant-select-search--inline">
                                    <div class="ant-select-search__field__wrap hide">
                                        <input type="text" value=""  class="ant-input ant-select-search__field">
                                        <span  class="ant-select-search__field__mirror"></span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <span class="ant-select-arrow" unselectable="on"
                              style="user-select: none;"><b></b></span></div>
                </div>
            </div>

            <ul class="ant-menu menu-site ant-menu-light ant-menu-root ant-menu-horizontal" id="nav"
                role="menu">

               <!-- <li class="ant-menu-item " role="menuitem">
                    <a  href="./index.php"><span>首页</span></a>
                </li>-->
                <li class="ant-menu-item <? if($page=='product') echo 'ant-menu-item-selected'; ?> " role="menuitem">
                    <a   href="./index.php"><span>首 页</span></a>
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
                    <a  href="./donate.php"><span>捐 献</span></a>
                </li>
                <li class="ant-menu-item  <? if($page=='about') echo 'ant-menu-item-selected'; ?>" role="menuitem"><a href="./about.php"><span>关于我们</span></a>
                </li>
                <li class="ant-menu-item " role="menuitem" >
                    <a  href="https://github.com/gopeak/masterlab" target="_blank"><span>Github</span></a>
                </li>

            </ul>
        </div>
    </div>
</header>