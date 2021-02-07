<?php
header("Access-Control-Allow-Origin: http://localhost:8080|*");
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
$acpn = $load['acpn'];
$status = $load['status'];
$address = $load['workplace'];

$registerx = new Register;
if (isset($_POST)) {
  if ($auth->checkEmail($email)) {
    $user = new User($fname, $lname, $email, $phone, $password, $is_pharm, $pcn, $psn, $acpn, $status, $work);
    $registerx->registerx($user);
  }
}
