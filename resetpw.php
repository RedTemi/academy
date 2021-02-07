<?php
$title = 'reset password';
include('templates/header.php');
include_once('pdo.php');
if($_GET['key'] && $_GET['reset'])
{
  $email=$_GET['key'];
  $pass=$_GET['reset'];
  $select=$dbh->prepare("select email,password from user where md5(email)=? and md5(password)=?");
  $select->execute([$email,$pass]);
  if($select->rowcount()==1)
  {
    ?>
    <form method="post" action="newpw.php" name="pwreset" onsubmit="return checkpw()" class="border border-light col-lg-10 m-auto p-3 z-depth-1">

    <p class="h4 mb-4 text-center">Login</p>
    <input type="hidden" name="email" value="<?php echo $email;?>">
    <input autocomplete="new-password" class="form-control" type="password" name="password" placeholder="new password" id="password">
    <input autocomplete="new-password" class="form-control" type="password" name="password2" placeholder="enter password again" id="password2">
    <button name="submit_password" class="btn btn-md teal text-white my-4 mx-auto" type="submit" id="reset">Reset password</button>
    </form>
    <?php
  }
}
include('templates/footer.php');
?>



