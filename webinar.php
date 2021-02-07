<?php
header("Access-Control-Allow-Origin: *");
session_start();
require './main.php';
$webinar = new Webinar;
$webinar->webinarDelivery();