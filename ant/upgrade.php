<?php
header('Content-Type: application/json;charset=utf-8');

$ipArr = [
    //'47.244.62.11',
    //'113.104.244.229'
];
if(!checkIpAddr($ipArr)){
    echoFailJson("升级不可用，IP地址受限!");
}

$lastReleaseHtml = <<<'EOT'
<p>v2.1.1版本更新内容：</p>
<ol>
<li>修复状态流不能显示新状态的bug</li>
<li>修复“管理/事项配置/自定义字段”的交互问题</li>
<li>修复“管理/事项配置/自定义界面”的交互问题</li>
<li>优化：“事项列表和详情”的自定义字段显示</li>
<li>优化：删除项目时，增加双重确认，提高严谨性</li>
<li>优化：在线升级的检测和显示</li>
</ol>
<a href="#" onclick="$('#menu-upgrade').click();">进入升级界面</a>
EOT;


// 第一个元素为最新版本
$versions = [
    //['version' => '3.0', 'release_url' => 'https://github.com/gopeak/masterlab/releases/tag/v3.0','html'],
    ['version' => '2.1.1', 'release_url' => 'https://github.com/gopeak/masterlab/releases/tag/v2.1.1', 'title'=>'2.1.1升级通知', 'release_html'=>$lastReleaseHtml],
    ['version' => '2.1', 'release_url' => 'https://github.com/gopeak/masterlab/releases/tag/v2.1', 'title'=>'2.1升级通知了', 'release_html'=>$lastReleaseHtml],
    ['version' => '2.0.2', 'release_url' => 'https://github.com/gopeak/masterlab/releases/tag/v2.0.2', 'title'=>'2.0.2升级通知', 'release_html'=>$lastReleaseHtml],
    ['version' => '2.0.1', 'release_url' => 'https://github.com/gopeak/masterlab/releases/tag/v2.0.1']
];

$patches = [
    '2.1-2.1.1' => 'http://download.888zb.com/v2.1-v2.1.1-upgrade.zip',
    '2.0.2-2.1' => 'http://download.888zb.com/v2.0.2-v2.1-upgrade.zip',
    '2.0.1-2.0.2' => 'http://download.888zb.com/v2.0.1-v2.0.2-upgrade.zip',
    '2.0-2.0.1' => 'http://download.888zb.com/v2.0-v2.0.1-upgrade.zip'
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