<?php


//print_r($_POST);

file_put_contents('./logs/app_info.log', print_r($_POST,true ), FILE_APPEND);



require_once  '/data/www/masterlab_site/masterlab_console/app/globals.php';
use main\app\ctrl\Index;
use main\app\model\CustomerLogModel;
// 初始化开发框架基本设置
$config = new \stdClass();
$config->currentApp = APP_NAME;
$config->appPath = APP_PATH;
$config->appStatus = APP_STATUS;
$config->enableTrace = ENABLE_TRACE;
$config->enableWriteReqLog = WRITE_REQUEST_LOG;
$config->enableSecurityMap = SECURITY_MAP_ENABLE;
$config->exceptionPage = VIEW_PATH.'exception.php';
$config->ajaxProtocolClass  = 'ajax';
$config->enableReflectMethod = ENABLE_REFLECT_METHOD;

new framework\HornetEngine($config);
$dbModel = new CustomerLogModel();
//print_r($dbModel->db->getRows('SELECT * FROM `customer_log` ORDER BY `id` DESC limit 10'));
if(isset($_POST['company_info'])){

    $info = [];
    $info['company'] = $_POST['company_info']['company'];
    $info['linkman'] = $_POST['company_info']['company_linkman'];
    $info['phone'] = $_POST['company_info']['company_phone'];
    $info['os'] = $_POST['os'];
    $info['server'] = $_POST['server'];
    $info['env'] = $_POST['env'];
    $info['php_version'] = $_POST['php_version'];
    $info['mysql_version'] = $_POST['mysql_version'];
    $info['server_ip'] = $_POST['server_ip'];
    $info['client_ip'] = $_POST['client_ip'];
    $info['host'] = $_POST['host'];
    $info['port'] = $_POST['port'];
    $info['masterlab_version'] = $_POST['masterlab_version'];
    $info['server_time'] = $_POST['server_time'];
    $info['time'] = time();
    $info['update_date'] = date('Y-m-d');

    $dbModel = new CustomerLogModel();
    list($ret, $msg) = $dbModel->insert($info);
    if(!$ret){
        echo $msg;
    }else{
        echo '200';
    }

    unset($dbModel);
//$rows = $dbModel->getRows();

}
