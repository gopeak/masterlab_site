<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/6/22
 * Time: 15:16
 */


$subject = file_get_contents('client_info-6-20.log');
preg_match_all('/ \[title\]\s=>\s([^\n]*?)/sU', $subject, $result, PREG_PATTERN_ORDER);
$result = array_unique($result[1]);
var_dump(count($result));
print_r($result);