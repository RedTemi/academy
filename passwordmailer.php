<?php
if(isset($_POST['submit_email']) && $_POST['email'])
{
  $emailz = $_POST['email'];
  $email = $_POST['email'];
  include_once('pdo.php');
  $select = $dbh->prepare("SELECT email,password FROM user WHERE email=?");
  $select->execute([$email]);
  $count = $select->rowcount();
  if($count==1)
  {
    $row=$select->fetch(PDO::FETCH_ASSOC);
    $email=md5($row['email']);
    $pass=md5($row['password']);
    $link="<a href='nucleartest.com.ng/resetpw.php?key=".$email."&reset=".$pass."'>Click To Reset password</a>";
    
    require 'PHPMailer/src/Exception.php';
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';
    $mail = new  PHPMailer\PHPMailer\PHPMailer(true);
    $mail->CharSet = "utf-8";
    $mail->IsSMTP();
    $mail->SMTPAuth = true;                  
    $mail->Username = "passwords@nucleartest.com.ng";
    // GMAIL password
    $mail->Password = "Snowyday.1";
    $mail->SMTPSecure = "ssl";  
    // sets GMAIL as the SMTP server
    $mail->Host = "mail.nucleartest.com.ng";
    // set the SMTP port for the GMAIL server
    $mail->Port = "465";
    $mail->From='passwords@nucleartest.com.ng';
    $mail->FromName='Pharmacademy';
    $mail->AddAddress($row['email']);
    $mail->Subject  =  'Reset Password';
    $mail->IsHTML(true);
    $mail->Body    = '<p>you are recieving this mail because you requested a password reset</p><p>Click On This Link to Reset Password '.$link.'</p>';
    if($mail->Send())
    {
      echo '<p class="h3">Check Your Email and Click on the link sent to your email</p>';
    }
    else
    {
      echo '<p>';
      echo "Mail Error - >".$mail->ErrorInfo;
      echo '</p>';
    }
  }	
}
?>