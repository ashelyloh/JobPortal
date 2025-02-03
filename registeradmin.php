<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>Register Admin</title>
	<link href="css/style.css" rel="stylesheet">
</head>
<body>
	<div class="header">
		<h2>Register Admin</h2>
	</div>
	
	<form method="post" action="registeradmin.php">

	<?php include('errors.php'); ?>

		<div class="input-group">
			<label>Admin Username</label>
			<input type="text" name="regAdminUsername" value="<?php echo $regAdminUsername; ?>">
		</div>
		
		<div class="input-group">
			<label>Password</label>
			<input type="password" name="regAdminPassword1">
		</div>
		<div class="input-group">
			<label>Confirm Password</label>
			<input type="password" name="regAdminPassword2">
		</div>
		<div class="input-group">
			<label>Date of Birth</label>
			<input type="date" name="regAdmindob">
		</div>
		<div class="input-group">
		Gender: <select name="regAdminGender">
            				<option>Male</option>
            				<option>Female</option>
        					</select>
		</div>
		<div class="input-group">
			<label>Contact Number</label>
			<input type="contact_number" name="regAdminContactNumber">
		</div>
		<div class="input-group">
			<label>Email</label>
			<input type="email" name="regAdminEmail" value="">
		</div>

		<div class="input-group">
			<button type="submit" class="btn" name="reg_Admin">Register</button>
		</div>
		<p>
			Already a member? <a href="login.php">Log in</a>
		</p>
	</form>
</body>
</html>
        





  