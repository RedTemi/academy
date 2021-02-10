<?php
header("Access-Control-Allow-Origin:*");
header('Access-Control-Allow-Methods: POST, GET, OPTIONS');
header('Access-Control-Allow-Headers: X-PINGOTHER, Content-Type');
header('Access-Control-Allow-Credentials: true');
require_once('./main.php');
$auth = new Auth;
$load = json_decode($_POST['data'],true);
$fname = $load['fname'];
$lname = $load['lname'];
$email = $load['email'];
$phone = $load['phone'];
$password = $load['password'];
$is_pharm = $load['is_pharm'];
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
    $registerx->registerx($user);
  }
}
