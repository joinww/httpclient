<?php
require_once '../vendor/autoload.php';

$httpClient = new HttpClient\Client();
//$response = $httpClient->get('https://www.baidu.com/s?wd=php');

//$response = $httpClient->get('http://www.baidu.com/s?wd=php');
//
//$response = $httpClient->get('http://www.sogou.com/web?query=php&lkx=0&ie=utf8');
//
$response = $httpClient->post('http://test.monitor.com/tests/post.php',
	['wd'=>'php'],
	['st'=>1,'ad'=>1]);

var_dump($response->getBody());