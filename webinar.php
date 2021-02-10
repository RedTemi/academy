<?php
header("Access-Control-Allow-Origin:https://pharmacademy.com.ng");
header('Access-Control-Allow-Methods: POST, GET, OPTIONS');
header('Access-Control-Allow-Headers: X-PINGOTHER, Content-Type');
header('Access-Control-Allow-Credentials: true');
session_start();
require './main.php';
$webinar = new Webinar;
$webinar->webinarDelivery();