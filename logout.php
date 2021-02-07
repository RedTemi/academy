<?php
session_start();
header("Access-Control-Allow-Origin: *");
require_once('main.php');
$auth = new Auth;
$auth->logout();
?>