<?php
header('Content-Type: application/json;charset=utf-8');
$versions = [
    '3.0',
    '2.1',
    '2.0.2',
    '2.0.1'
];

$patches = [
    '2.0-2.0.1'=>['patch_url'=>'http://download.888zb.com/2.0-2.0.1.patch.zip','release_url'=>'https://github.com/gopeak/masterlab/releases/tag/v2.0.1'],
    '2.0.1-2.0.2'=>['patch_url'=>'http://download.888zb.com/2.0.1-2.0.2.patch.zip','release_url'=>'https://github.com/gopeak/masterlab/releases/tag/v2.0.2'],
    '2.0.2-2.1'=>['patch_url'=>'http://download.888zb.com/2.0.2-2.1.patch.zip','release_url'=>'https://github.com/gopeak/masterlab/releases/tag/v2.1'],
    '2.1-3.0'=>['patch_url'=>'http://download.888zb.com/2.1-3.0.patch.zip','release_url'=>'https://github.com/gopeak/masterlab/releases/tag/v3.0'],
];

/*
$_GET['action'] = 'get_available_versions';
$_GET['current_version'] = '2.0';
$_GET['patch_version'] = '2.0.1';
http://www.masterlab.vip/upgrade.php?action=get_available_versions&current_version=2.0
http://www.masterlab.vip/upgrade.php?action=get_patch_info&current_version=2.0&patch_version=2.0.1
*/
$action = isset($_GET['action']) ? trim($_GET['action']) : null;
if(!$action){
    echo json_encode([]);
}
if(!function_exists($action)){
    echo json_encode([]);
}else{
    $action();
}


function get_patch_info()
{
    global $patches;
    $currentVersion = isset($_GET['current_version']) ? trim($_GET['current_version']) : '';
    $patchVersion = isset($_GET['patch_version']) ? trim($_GET['patch_version']) : '';
    $key = $currentVersion.'-'.$patchVersion;
    if(!isset($patches[$key])){
        echo '{}';
        die;
    }
    echo json_encode($patches[$key]);
    die;
}

function get_available_versions()
{
    global $versions;
    $currentVersion = isset($_GET['current_version']) ? trim($_GET['current_version']) : null;
    if(!$currentVersion){
        echo '[]';
        die;
    }
    $returnVersions = [];
    foreach($versions as $v){
        if($v==$currentVersion){
            break;
        }
        $returnVersions[] = $v;
    }
    echo json_encode($returnVersions);
    die;
}