<?php
include_once('templates/header.php');
if(isset($_POST['submit_password']) && $_POST['key'] && $_POST['reset'])
{
  include_once('pdo.php');
  $email=$_POST['email'];
  $pass=$_POST['password'];
  $pass = password_hash($pass,PASSWORD_BCRYPT);
  $stmt = 'UPDATE user SET password = ? WHERE email = ?';
  $change = $dbh->prepare($stmt);
  $change->execute([$pass,$email]);
  if($change->execute([$pass,$email])){
      echo '<p>Password changed successfuly</p>';
  }
  else{
      echo '<p>something went wrong.</p>';
  }
}
include_once('templates/footer.php');
?>