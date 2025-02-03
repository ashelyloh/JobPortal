<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>Advertiser Login</title>
	<link href="css/style.css" rel="stylesheet">
</head>
<body>

	<div class="header">
		<h2>Advertiser Login</h2>
	</div>
	
	<form method="post" action="loginadvertiser.php">

		<?php include('errors.php'); ?>

		<div class="input-group">
			<label>Advertiser Username</label>
			<input type="text" name="AdvertiserUsernameL" >
		</div>
		<div class="input-group">
			<label>Password</label>
			<input type="password" name="AdvertiserPasswordL">
		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="login_advertiser">Login</button>
		</div>
		<p>
			Not yet a member? <a href="registeradvertiser.php">Sign up</a>
		</p>
	</form>


</body>
</html>