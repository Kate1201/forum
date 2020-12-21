<?php
require 'controllers/user/register.ctrl.php';
$register = new Register();
$errors = $register->getError();
?>

<?php include 'views/templates/header.php' ?>
<title>Sign Up</title>
<?php include 'views/templates/base.php' ?>
<h2>Sign Up</h2>
<p>Please fill this form to create an account.</p>
<div class="col-5">
<form class="" action="/forum/index.php/register" method="post">
    <div class="form-group">
        <label>Username</label>
        <input type="text" name="username" class="form-control" value="">
        <span class="help-block" style="color: red"><?php if(isset($errors['username'])){ echo $errors['username'][0];} ?></span>
    </div>
    <div class="form-group">
        <label>Password</label>
        <input type="password" name="password" class="form-control" value="">
        <span class="help-block" style="color: red"><?php if(isset($errors['password'])){ echo $errors['password'][0];} ?></span>
    </div>
    <div class="form-group">
        <label>Confirm Password</label>
        <input type="password" name="confirm_password" class="form-control" value="">
        <span class="help-block" style="color: red"><?php if(isset($errors['confirm_password'])){ echo $errors['confirm_password'][0];} ?></span>
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-primary" value="Submit">
        <input type="reset" class="btn btn-default" value="Reset">
    </div>
    <p>Already have an account? <a href="/forum/index.php/login">Login here</a>.</p>
</form>
<?php require 'views/templates/footer.php' ?>