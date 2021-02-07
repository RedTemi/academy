<?php
header("Access-Control-Allow-Origin: http://localhost:8080 | *");
session_start();
require_once('main.php');
$auth = new Auth;
$auth->logout();
?>