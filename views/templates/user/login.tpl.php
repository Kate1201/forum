<?php
require 'controllers/user/login.ctrl.php';
$login = new Login();
$errors = $login->getError();
?>
<?php include 'views/templates/base.php' ?>
<title>Log in</title>
<?php include 'views/templates/header.php' ?>
<h2>Login</h2>
<p>Please fill in your credentials to login.</p>
<div class="col-5">
<form class="" action="/forum/index.php/login" method="post">
    <div class="form-group">
        <label>Username</label>
        <input type="text" name="username" class="form-control" value="<?php if(isset($errors['username'])){echo $errors['username'];} ?>">
        <span class="help-block" style="color: red"><?php if(isset($errors['username'])){echo $errors['username'];} ?></span>
    </div>
    <div class="form-group">
        <label>Password</label>
        <input type="password" name="password" class="form-control">
        <span class="help-block" style="color: red"><?php if(isset($errors['password'])){ echo $errors['password'];} ?></span>
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-primary" value="Login">
    </div>
    <p>Don't have an account? <a href="/forum/index.php/register">Sign up now</a>.</p>
</form>

<?php require 'views/templates/footer.php' ?>
