<?php
header("Access-Control-Allow-Origin:https://pharmacademy.com.ng");
session_start();
require_once('main.php');
$auth = new Auth;
$auth->logout();
?>