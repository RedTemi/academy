<?php
require './main.php';
header("Access-Control-Allow-Origin: *");
$webinar = new Webinar;
$webinar->webinarDelivery();