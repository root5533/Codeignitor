<html>
<head>
    <title>Admin</title>
</head>
<body>

<h2>Past Transactions</h2>
<a href="<?php echo base_url()?>index.php/user_authentication/logout">To Log out click here</a>

<?php echo form_open("user_transaction/get_transactions"); ?>

<?php echo validation_errors(); ?>

<?php
if(isset($message_display)) {
    echo $message_display;
}
?>

<br>
<label>Account Number</label>
<select name="account_number">
    <option value="" disabled selected>Please Select One</option>
</select>
<br>

<label>Start Date</label>
<input type="date" name="start_date" data-date-inline-picker="true" />

<br>

<label>End Date</label>
<input type="date" name="end_date" data-date-inline-picker="true" />
<br>
<input type="submit" name="submit" value="Get Statement">

<?php echo form_close() ?>

</body>
</html>