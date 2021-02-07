<?php
header("Access-Control-Allow-Origin: http://localhost:8080");
session_start();
require './main.php';
$webinar = new Webinar;
$webinar->webinarDelivery();