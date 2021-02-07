<?php
$title = 'Password reset request';
include('templates/header.php');
?>
<div class="mt-2 mb-4">
<form action="passwordmailer.php" method="POST" class="border border-light col-lg-10 m-auto p-3 z-depth-1">
<p class="h4 mb-4 text-center">Password Reset</p>
<input type="email" id="defaultRegisterFormEmail" class="form-control mb-4" name="email" placeholder="E-mail" required>
<button name="submit_email" class="btn btn-md teal text-white my-4 mx-auto" type="submit" id="reset">Reset Password</button>
</form>
</div>
<?php
include('templates/footer.php');
?>