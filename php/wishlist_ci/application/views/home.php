
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
		<h3><?php echo isset($_SESSION['response']['message']) ? $_SESSION['response']['message'] : ""?></h3>

		<form action="controllers/users.php?q=register" method="post">
			<fieldset>
				<legend>Register</legend>
				<label for="">Name</label>
				<input type="text" name="name" required>
				<label for="">Username</label>
				<input type="text" name="username" required>
				<label for="">Password</label>
				<input type="password" name="password" required>
				<label for="">Confirm Password</label>
				<input type="password" name="confirm_password" required>
				<label for="">Hired At</label>
				<input type="date" name="hired_at" required>
				<input type="submit" value="Register" required>
			</fieldset>
		</form>
		<form action="controllers/users.php?q=login" method="post">
			<fieldset>
				<legend>Login</legend>
				<label for="">Username</label>
				<input type="text" name="username" required>
				<label for="">Password</label>
				<input type="password" name="password" required>
				<input type="submit" value="Login">
			</fieldset>
		</form>
	</div>
</body>
</html>
