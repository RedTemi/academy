<?php
header("Access-Control-Allow-Origin:https://pharmacademy.com.ng");
header('Access-Control-Allow-Methods: POST, GET, OPTIONS');
header('Access-Control-Allow-Headers: X-PINGOTHER, Content-Type');
header('Access-Control-Allow-Credentials: true');
require_once('./main.php');
$auth = new Auth;
echo $auth->checkEmail($_POST['email'])? 'valid':'invalid';