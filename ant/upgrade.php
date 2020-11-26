<?php
header('Content-Type: application/json;charset=utf-8');

$ipArr = [
    //'127.0.0.1',
    //'113.104.244.6',
    //'139.9.49.224',
//	'139.9.49.224',
    //'47.244.62.11',
    //'183.11.29.118',
    //'183.11.29.140'
];
if(!checkIpAddr($ipArr)){
    echoFailJson("升级不可用，IP地址受限!");
}

$release212 = <<<'EOT'
<p>v2.1.2版本更新内容：</p>
<ol>
<li>在使用宝塔(bt.cn)环境下可一键部署</li>
<li>优化改进活动日志显示图片的适配问题</li>
<li>修复bug：协助人头像不能显示的bug</li>
<li>修复bug：事项标题转义;</li>
<li>修复bug：事项类型方案无法删除;</li>
<li>修复bug：事项评论截图上传问题</li>
<li>移除事项状态关联工作流方案</li>
<li>不再支持php7.0以下的版本</li>
</ol>
<a href="#" onclick="$('#menu-upgrade').click();">进入升级界面</a>
EOT;


$lastReleaseHtml = <<<'EOT'
<p>v2.1.9版本更新内容：</p>
<ol>
<li>修复高级查询分页的bug</li>
<li>修复没有参与项目的用户的事项列表会显示全部事项的bug</li>
<li>修复时间逻辑bug</li>

</ol>
<a href="#" onclick="$('#menu-upgrade').click();">进入升级界面</a>
EOT;


$lastReleaseHtml3rc3 = <<<'EOT'
<p>v3.0.0RC3版本更新内容：</p>
<ol>
<li>修复更新语句执行的BUG</li>
<li>其他bug</li>

</ol>
<a href="#" onclick="$('#menu-upgrade').click();">进入升级界面</a>
EOT;

$lastReleaseHtml3 = <<<'EOT'
<p>v3.0.0RC3版本更新内容：</p>
<ol>
<li>增加插件功能</li>
<li>增加项目文档功能</li>
<li>增加webhhok功能</li>
<li>增加项目模板功能</li>
<li>开放Api</li>
<li>重构服务器的数据库操作类</li>
<li>重构前端代码，移除大量无效代码</li>
<li>大量优化改进</li>

</ol>
<a href="#" onclick="$('#menu-upgrade').click();">进入升级界面</a>
EOT;


// 第一个元素为最新版本
$versions = [
    //['version' => '3.0', 'release_url' => 'https://github.com/gopeak/masterlab/releases/tag/v3.0','html'],
    ['version' => '3.0.0RC3', 'release_url' => 'https://github.com/gopeak/masterlab/releases/tag/v3.0.0RC3', 'title'=>'3.0.0RC3升级通知', 'release_html'=>$lastReleaseHtml3rc3],
    ['version' => '3.0.0RC2', 'release_url' => 'https://github.com/gopeak/masterlab/releases/tag/v3.0.0RC2', 'title'=>'3.0.0RC3升级通知', 'release_html'=>$lastReleaseHtml3],
    ['version' => '2.1.9', 'release_url' => 'https://github.com/gopeak/masterlab/releases/tag/v2.1.9', 'title'=>'2.1.9升级通知', 'release_html'=>$lastReleaseHtml],
    ['version' => '2.1.8', 'release_url' => 'https://github.com/gopeak/masterlab/releases/tag/v2.1.8', 'title'=>'2.1.8升级通知', 'release_html'=>$lastReleaseHtml],
    ['version' => '2.1.7', 'release_url' => 'https://github.com/gopeak/masterlab/releases/tag/v2.1.7', 'title'=>'2.1.7升级通知', 'release_html'=>$lastReleaseHtml],
    ['version' => '2.1.5', 'release_url' => 'https://github.com/gopeak/masterlab/releases/tag/v2.1.5', 'title'=>'2.1.5升级通知', 'release_html'=>$lastReleaseHtml],
    ['version' => '2.1.3', 'release_url' => 'https://github.com/gopeak/masterlab/releases/tag/v2.1.3', 'title'=>'2.1.3升级通知', 'release_html'=>$lastReleaseHtml],
    ['version' => '2.1.2', 'release_url' => 'https://github.com/gopeak/masterlab/releases/tag/v2.1.2', 'title'=>'2.1.2升级通知', 'release_html'=>$lastReleaseHtml],
    ['version' => '2.1.1', 'release_url' => 'https://github.com/gopeak/masterlab/releases/tag/v2.1.1', 'title'=>'2.1.1升级通知', 'release_html'=>$release212],
    ['version' => '2.1', 'release_url' => 'https://github.com/gopeak/masterlab/releases/tag/v2.1', 'title'=>'2.1升级通知了', 'release_html'=>$release212],
    ['version' => '2.0.2', 'release_url' => 'https://github.com/gopeak/masterlab/releases/tag/v2.0.2', 'title'=>'2.0.2升级通知', 'release_html'=>$release212],
    ['version' => '2.0.1', 'release_url' => 'https://github.com/gopeak/masterlab/releases/tag/v2.0.1']
];

$patches = [
    '3.0rc2-3.0.0RC3'=>'http://download.masterlab.vip/3.0.0RC2-3.0.0RC3-upgrade.zip',
    '3.0rc1-3.0.0RC3'=>'http://download.masterlab.vip/3.0.0RC2-3.0.0RC3-upgrade.zip',
    '3.0.0RC1-3.0.0RC3'=>'http://download.masterlab.vip/3.0.0RC1-3.0.0RC3-upgrade.zip',
    '3.0-3.0.0RC3'=>'http://download.masterlab.vip/3.0.0RC1-3.0.0RC3-upgrade.zip',
    '2.1.8-2.1.9'=>'http://download.masterlab.vip/v2.1.8-v2.1.9-upgrade.zip',
    '2.1.7-2.1.9'=>'http://download.masterlab.vip/v2.1.7-v2.1.9-upgrade.zip',
    '2.1.5-2.1.9'=>'http://download.masterlab.vip/v2.1.5-v2.1.9-upgrade.zip',
    '2.1.7-2.1.8'=>'http://download.masterlab.vip/v2.1.7-v2.1.8-upgrade.zip',
    '2.1.5-2.1.8'=>'http://download.masterlab.vip/v2.1.5-v2.1.8-upgrade.zip',
    '2.1.5-2.1.7'=>'http://download.masterlab.vip/v2.1.5-v2.1.7-upgrade.zip',
    '2.1.3-2.1.7'=>'http://download.masterlab.vip/v2.1.3-v2.1.7-upgrade.zip',
    '2.1.1-2.1.7'=>'http://download.masterlab.vip/v2.1.1-v2.1.7-upgrade.zip',
    '2.1.3-2.1.5'=>'http://download.masterlab.vip/v2.1.3-v2.1.5-upgrade.zip',
    '2.1.2-2.1.3'=>'http://download.masterlab.vip/v2.1.2-v2.1.3-upgrade.zip',
    '2.1.1-2.1.3'=>'http://download.masterlab.vip/v2.1.1-v2.1.3-upgrade.zip',
    '2.1-2.1.3'=>'http://download.masterlab.vip/v2.1-v2.1.3-upgrade.zip',
    '2.1-2.1.2'=>'http://download.masterlab.vip/v2.1-v2.1.2-upgrade.zip',
    '2.1.1-2.1.2' => 'http://download.masterlab.vip/v2.1.1-v2.1.2-upgrade.zip',
    '2.1-2.1.1' => 'http://download.masterlab.vip/v2.1-v2.1.1-upgrade.zip',
    '2.0.2-2.1' => 'http://download.masterlab.vip/v2.0.2-v2.1-upgrade.zip',
    '2.0.1-2.0.2' => 'http://download.masterlab.vip/v2.0.1-v2.0.2-upgrade.zip',
    '2.0-2.0.1' => 'http://download.masterlab.vip/v2.0-v2.0.1-upgrade.zip'
];

/*
 * $_GET['action'] = 'get_patch_info';
 * $_GET['current_version'] = '2.0.2';
 * http://www.masterlab.vip/upgrade.php?action=get_patch_info&current_version=2.0
*/
$action = isset($_GET['action']) ? trim($_GET['action']) : null;
if (!$action) {
    echoFailJson("action参数错误!");
}
if (!function_exists($action)) {
    echoFailJson("action参数错误, 函数不存在!");
} else {
    $action();
}

/**
 * 限制IP地址访问
 * @param $ipArr
 * @return bool
 */
function checkIpAddr($ipArr)
{
    if(empty($ipArr)){
        return true;
    }
    $clientIp = $_SERVER['REMOTE_ADDR'];

    if(!in_array($clientIp, $ipArr)){
        return false;
    }
    return true;

}
function get_patch_info()
{
    global $patches, $versions;
    $currentVersion = isset($_GET['current_version']) ? trim($_GET['current_version']) : '';
    $lastVersionArr = current($versions);
    //print_r($lastVersionArr);
    $lastVersion = $lastVersionArr['version'];
    if($currentVersion==$lastVersion){
        echoFailJson( '已经是最新版本,无需升级!');
    }
    $key = $currentVersion . '-' . @$lastVersionArr['version'];
    if (!isset($patches[$key])) {
        echoFailJson($key.' 不可升级!');
    }
    $arr = [];
    $arr['url'] = $patches[$key];
    $arr['last_version'] = $lastVersionArr;
    echoSuccessJson('升级可用', $arr);
}

/**
 * @param $msg
 */
function echoFailJson($msg)
{
    $arr = [];
    $arr['ret'] = '0';
    $arr['msg'] = $msg;
    $arr['data'] = null;
    echo json_encode($arr);
    die;
}

/**
 * @param $msg
 * @param $data
 */
function echoSuccessJson($msg, $data)
{
    $arr = [];
    $arr['ret'] = '200';
    $arr['msg'] = $msg;
    $arr['data'] = $data;
    echo json_encode($arr);
    die;
}
