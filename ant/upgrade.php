<?php
header('Content-Type: application/json;charset=utf-8');

// 第一个元素为最新版本
$versions = [
    //['version' => '3.0', 'release_url' => 'https://github.com/gopeak/masterlab/releases/tag/v3.0'],
    //['version' => '2.1', 'release_url' => 'https://github.com/gopeak/masterlab/releases/tag/v2.1'],
    //['version' => '2.0.2', 'release_url' => 'https://github.com/gopeak/masterlab/releases/tag/v2.0.2'],
    ['version' => '2.0.1', 'release_url' => 'https://github.com/gopeak/masterlab/releases/tag/v2.0.1']
];

$patches = [
    '2.0-2.0.1' => 'http://www.masterlab.vip/2.0-2.0.1-upgrade.zip'
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

function echoFailJson($msg)
{
    $arr = [];
    $arr['ret'] = '0';
    $arr['msg'] = $msg;
    $arr['data'] = null;
    echo json_encode($arr);
    die;
}

function echoSuccessJson($msg, $data)
{
    $arr = [];
    $arr['ret'] = '200';
    $arr['msg'] = $msg;
    $arr['data'] = $data;
    echo json_encode($arr);
    die;
}