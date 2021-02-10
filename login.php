<?php
header("Access-Control-Allow-Origin:https://pharmacademy.com.ng");
header('Access-Control-Allow-Methods: POST, GET, OPTIONS');
header('Access-Control-Allow-Headers: X-PINGOTHER, Content-Type');
header('Access-Control-Allow-Credentials: true');
session_start();
require_once('./main.php');
$auth = new Auth;
$email = $_POST['email'];
$password = $_POST['password'];

if($_POST['login']){
if(!$auth->login($email,$password)){
  echo 'failed';
}else{
    echo 'sucess';
}
}
?>