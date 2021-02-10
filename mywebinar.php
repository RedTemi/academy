<?php
header("Access-Control-Allow-Origin:*");
header('Access-Control-Allow-Methods: POST, GET, OPTIONS');
header('Access-Control-Allow-Headers: X-PINGOTHER, Content-Type');
header('Access-Control-Allow-Credentials: true');
session_start();
require_once('./main.php');
$webinar = new Webinar;
echo $webinar->checkWebinar_data($_POST['id'])
?>