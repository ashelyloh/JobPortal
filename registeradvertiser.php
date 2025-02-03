<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>Registration Advertiser</title>
	<link href="css/style.css" rel="stylesheet">
</head>
<body>
	<div class="header">
		<h2>Register Advertiser</h2>
	</div>
	
	<form method="post" action="registeradvertiser.php">

		<?php include('errors.php'); ?>

		<div class="input-group">
			<label>Advertiser Username</label>
			<input type="text" name="regAdvertiserUsername" value="<?php echo $regAdvertiserUsername; ?>">
		</div>
		
		<div class="input-group">
			<label>Password</label>
			<input type="password" name="regAdvertiserPassword1">
		</div>
		<div class="input-group">
			<label>Confirm Password</label>
			<input type="password" name="regAdvertiserPassword2">
		</div>
		<div class="input-group">
			<label>Date of Birth</label>
			<input type="date" name="regAdvertiserdob">
		</div>
		<div class="input-group">
		Gender:<select name="regAdvertiserGender">
            				<option>Male</option>
            				<option>Female</option>
        					</select>
		</div>
		<div class="input-group">
			<label>Contact Number</label>
			<input type="contact_number" name="regAdvertiserContactNumber">
		</div>
		<div class="input-group">
			<label>Email</label>
			<input type="email" name="regAdvertiserEmail" value="<?php echo $regAdvertiserEmail; ?>">
		</div>
		<div class="input-group">
		<input type="hidden" name="regAdvertiserApplyform" >
		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="reg_Advertiser">Register</button>
		</div>
		<p>
			Already a member? <a href="loginadvertiser.php">Log in</a>
		</p>
	</form>
</body>
</html>
        





  