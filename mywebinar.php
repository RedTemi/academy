<?php
header("Access-Control-Allow-Origin: http://localhost:8080");
session_start();
include_once('pdo.php');
include_once('mysqli.php');
  if (isset($_SESSION['username'])) {
$id = $_SESSION['user_id'];
// $tag = json_encode($tag);
$user = "SELECT * FROM user WHERE ID = $id";
$userss = $con -> query($user);
$stmt = "SELECT * FROM webinar_data WHERE  JSON_CONTAINS(users,'[\"${id}\"]')";
$result = $con -> query($stmt);
$stmtlive = "SELECT * FROM webinar_data WHERE  JSON_CONTAINS(users,'[\"${id}\"]') && is_live = 1";
$resultlive = $con-> query($stmtlive);
 $data = $userss->fetch_assoc();
// Associative array
$_SESSION['fullname']= $data['fname'].''.$data['lname'];
// $data->execute([$id]);
// $row = $data->fetchAll();
// var_dump($row);
  }
?>