<?php
header("Access-Control-Allow-Origin: *");
session_start();
require_once('main.php');
$auth = new Auth;
$auth->logout();
?>