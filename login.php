<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin Login</title>
	<link href="css/style.css" rel="stylesheet">
</head>
<body>

	<div class="header">
		<h2>Admin Login</h2>
	</div>
	
	<form method="post" action="login.php">

		<?php include('errors.php'); ?>

		<div class="input-group">
			<label>Username</label>
			<input type="text" name="AdminUsernameL" >
		</div>
		<div class="input-group">
			<label>Password</label>
			<input type="password" name="AdminPasswordL">
		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="login_user">Login</button>
		</div>
		<p>
			Not yet a member? <a href="registeradmin.php">Sign up</a>
		</p>
	</form>


</body>
</html>