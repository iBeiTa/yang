<?php
/**
 * 贝塔小屋 3oo.me
 * QQ交流群： 751968139
 */

// [ 应用入口文件 ]
namespace think;

require __DIR__ . '/../vendor/autoload.php';

// 执行HTTP应用并响应
$http = (new App())->http;

$response = $http->run();

$response->send();

$http->end($response);
