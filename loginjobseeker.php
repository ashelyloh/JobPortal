<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>Job Seeker Login</title>
	<link href="css/style.css" rel="stylesheet">
</head>
<body>

	<div class="header">
		<h2>Job Seeker Login</h2>
	</div>
	
	<form method="post" action="loginjobseeker.php">

		<?php include('errors.php'); ?>

		<div class="input-group">
			<label>JobSeeker Username</label>
			<input type="text" name="JobSeekerUsernameL" >
		</div>
		<div class="input-group">
			<label>Password</label>
			<input type="password" name="JobSeekerPasswordL">
		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="login_jobseeker">Login</button>
		</div>
		<p>
			Not yet a member? <a href="registerjobseeker.php">Sign up</a>
		</p>
	</form>


</body>
</html>