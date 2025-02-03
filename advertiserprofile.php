<?php include('server.php') ;
$username=$_SESSION['username'];
$query = "SELECT * FROM `advertiser` WHERE Username='$username'";
$result = mysqli_query($db, $query) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result);
?>

 <!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Advertiser Profile</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
	<link href="css/style.css" rel="stylesheet">
</head>
<body>

<!-- Navigation -->
<nav class="navbar navbar-expand-md navbar-light bg-light sticky-top">
<div class="container-fluid">
	<a class="navbvar-brand" href="#"><img class="logo" src="img/Tiger.jpg">Little Tiger Job Portal</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
    <span class="navbar-toggler-icon"></span>
    
	</button>
	<div class="collapse navbar-collapse" id="navbarResponsive">
		<ul class="navbar-nav ml-auto">
		<li class="nav-item">
		<a class="nav-link" href="advertiser.php">Home</a>
        </li>
        <li class="nav-item">
			<a class="nav-link" href="advertiserprofile.php">Advertiser Profile</a>
		</li>
        <li class="nav-item">
			<a class="nav-link" href="jobpost.php">Post Job</a>
        </li>
	  <li class="nav-item">
			<a class="nav-link" href="advertiserfaq.php">FAQ</a>
        </li>
        <li class="nav-item">
			<a class="nav-link" href="advertiserblacklist.php">Blacklist</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="index1.php">Logout</a>
		</li>
	</ul>
	<a class="navbvar-brand" href="#">| <?php echo $_SESSION['username']; ?></a>
</div>
</div>
</nav>

<div class="header">
		<h2>Advertiser Profile</h2>
	</div>
<form method="post" action="advertiserprofile.php">

		<?php include('errors.php'); ?>

		<div class="input-group">
		<input type="hidden" name="AdvertiserID" value="<?php echo $row['ID']; ?>">
			<label>Job Seeker Username</label>
			<input type="text" name="AdvertiserUsername" value="<?php echo $row['Username']; ?>">
		</div>
		<div class="input-group">
			<label>Password</label>
			<input type="text" name="AdvertiserPassword" value="<?php echo $row['Password']; ?>">
		</div>
		<div class="input-group">
			<label>Date of Birth</label>
			<input type="date" name="Advertiserdob" value="<?php echo $row['dob']; ?>">
		</div>
		<div class="input-group">
		Gender :<select name="AdvertiserGender">
            				<option <?php if("Male"==$row["Gender"]) echo 'selected="selected"'; ?>>Male</option>
            				<option <?php if("Female"==$row["Gender"]) echo 'selected="selected"'; ?>>Female</option>
        					</select>
		</div>
		<div class="input-group">
			<label>Contact Number</label>
			<input type="contact_number" name="AdvertiserContactNumber" value="<?php echo $row['ContactNumber']; ?>">
		</div>
		<div class="input-group">
			<label>Email</label>
			<input type="email" name="AdvertiserEmail" value="<?php echo $row['Email']; ?>">
		</div>
    
		<div class="input-group">
			<button type="submit" class="btn" name="Advertiserprofileupdate">Update</button>
		</div>
	</form><hr>
	<br>
	<p style="color:red;">Apply Form Details:</p><br>
	<div class="input-group">
			
			<textarea disabled name="Applyform" rows="10" cols="120"><?php echo $row['Applyform']; ?></textarea>
		</div>
<br>

<!--- Footer -->
<footer>
<div class="container-fluid padding">
<div class="row text-center">
	<div class="col-md-4">
		<hr class="light">
		<h5>Contact us</h5>
		<hr class="light">
		<p>016-7012564</p>
		<p>LittleTiger@gmail.com</p>
		<p>3,Jalan Austin Heights Utama,
		Taman Mount Austin, 81100 Johor Bahru, Johor</p>
	</div>
	    <div class="col-md-4">
		<hr class="light">
		<h5>Service hours</h5>
		<hr class="light">
		<p>Monday:9am-5pm</p>
		<p>Saturday:10am-4pm</p>
		<p>Public Holiday & Sunday: Closed</p>
	</div>
	<div class="col-md-4">
		<hr class="light">
		<h5>Service Area</h5>
		<hr class="light">
		<p>Kuala Lumper</p>
		<p>Penang</p>
		<p>Johor</p>
	</div>
	<div class="col-12">
		<hr class="light-100">
		<h5>&COPY; LittleTiger@gmail.com</h5>
	</div>
	</div>
</div>
</footer>
</body>
</html>







