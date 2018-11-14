<html>
<?php

if(isset($this->session->userdata['logged_in'])) {
    header("location: http://localhost/bank/index.php/user_authentication/user_login_process");
}
?>

<head>
    <title>Login Form</title>
</head>

<body>

<?php
if(isset($logout_message)) {
    echo $logout_message;
}
else if(isset($message_display)) {
    echo $message_display;
}
?>

<h2>Login Form</h2>
<h4>Pikachu</h4>
<hr>

<?php echo form_open('user_authentication/user_login_process'); ?>

<?php
if(isset($error_message)) {
    echo $error_message;
}
echo validation_errors();
?>
<br>
<label>Username :</label>
<input type="email" name="username" placeholder="Valid email address"> <br>
<label>Password</label>
<input type="text" name="password" placeholder="Password"> <br>
<input type="submit" value="Login" name="submit"> <br>

<a href="<?php echo base_url()?> index.php/user_authentication/user_registration_show">To Signup click here</a>
<?php echo form_close(); ?>
</body>
</html>