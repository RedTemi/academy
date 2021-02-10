<?php
header("Access-Control-Allow-Origin:https://pharmacademy.com.ng");
header('Access-Control-Allow-Methods: POST, GET, OPTIONS');
header('Access-Control-Allow-Headers: X-PINGOTHER, Content-Type');
header('Access-Control-Allow-Credentials: true');
session_start();
require './main.php';
$webinar = new Webinar;
$load = json_decode($_POST['data'],true);
echo $webinar->newWebinar($load['name'],$load['description'],$load['uid'],$load['time'],$load['image'],$load['color'],$load['target'])?'done':'failed';