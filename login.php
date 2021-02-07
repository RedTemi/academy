<?php
header("Access-Control-Allow-Origin: http://localhost:8080|*");
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