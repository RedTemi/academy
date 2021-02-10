<?php
header("Access-Control-Allow-Origin:https://pharmacademy.com.ng");
header('Access-Control-Allow-Methods: POST, GET, OPTIONS');
header('Access-Control-Allow-Headers: X-PINGOTHER, Content-Type');
header('Access-Control-Allow-Credentials: true');
session_start();
require_once('./main.php');
$auth = new Auth;
$load = json_decode($_POST['data'],true);
var_dump($_POST);
$fname = $load['fname'];
$lname = $load['lname'];
$email = $load['email'];
$phone = $load['phone'];
$password = $load['password'];
$is_pharm = $load['isPharm'];
$pcn = $load['pcn'];
$psn = $load['psn'];
$type = $load['type'];
$status = $load['status'];
$address = $load['workplace'];
$state = $load['state'];

$registerx = new Register;
if (isset($_POST)) {
  if ($auth->checkEmail($email)) {
    $user = new User($fname, $lname, $email, $phone, $password, $is_pharm,$state,$pcn, $psn, $type, $status, $work);
   echo $registerx->registerx($user)?'done':'failed';
   echo $user;
  }else{
    echo 'failed email taken';
  }
}
