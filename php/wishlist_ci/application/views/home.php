
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login</title>
	<style>
		form input {
			border: 1px solid red;
			display: block;
			margin-top: 2px;
			margin-bottom: 10px;
		}
	</style>
</head>
<body>
	<div id="wrapper">
		
		<h2>Welcome To Wishlist App CI Version 0.1</h2>
       
        
		<h4><?php echo validation_errors(); ?></h4>
		<?php echo form_open('/user/register'); ?>
			<fieldset>
				<legend>Register</legend>
				<label for="">Name</label>
				<input type="text" name="name" >
				<label for="">Username</label>
				<input type="text" name="username" >
				<label for="">Password</label>
				<input type="password" name="password">
				<label for="">Confirm Password</label>
				<input type="password" name="confirm_password">
				<label for="">Hired At</label>
				<input type="date" name="hired_at">
				<input type="submit" value="Register">
			</fieldset>
		</form>
		
		<?php echo form_open('/user/login'); ?>
			<fieldset>
				<legend>Login</legend>
                <?php
                    if ($this->session->flashdata('error')) {
                        echo "<h3+> {$this->session->flashdata('error')} </h3>";
                    }
                ?>
				<label for="">Username</label>
				<input type="text" name="username" >
				<label for="">Password</label>
				<input type="password" name="password" >
				<input type="submit" value="Login">
			</fieldset>
		</form>
	</div>
</body>
</html>
