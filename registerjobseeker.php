<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>Register Job Seeker</title>
	<link href="css/style.css" rel="stylesheet">
</head>
<body>
	<div class="header">
		<h2>Register Job Seeker</h2>
	</div>
	
	<form method="post" action="registerjobseeker.php">

		<?php include('errors.php'); ?>

		<div class="input-group">
			<label>Job Seeker Username</label>
			<input type="text" name="regJobSeekerUsername" value="<?php echo $regJobSeekerUsername; ?>">
		</div>
		
		<div class="input-group">
			<label>Password</label>
			<input type="password" name="regJobSeekerPassword_1">
		</div>
		<div class="input-group">
			<label>Confirm Password</label>
			<input type="password" name="regJobSeekerPassword_2">
		</div>
		<div class="input-group">
			<label>Date of Birth</label>
			<input type="date" name="regJobSeekerdob">
		</div>
		<div class="input-group">
		Gender:<select name="regJobSeekerGender">
            				<option>Male</option>
            				<option>Female</option>
        					</select>
		</div>
		<div class="input-group">
			<label>Contact Number</label>
			<input type="contact_number" name="regJobSeekerContactNumber">
		</div>
		<div class="input-group">
			<label>Email</label>
			<input type="email" name="regJobSeekerEmail" value="<?php echo $regJobSeekerEmail; ?>">
		</div>

		<div class="input-group">
			<button type="submit" class="btn" name="reg_JobSeeker">Register</button>
		</div>
		<p>
			Already a member? <a href="loginjobseeker.php">Log in</a>
		</p>
	</form>
</body>
</html>
        





  