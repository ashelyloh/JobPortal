<?php include('server.php') ;
$username=$_SESSION['username'];
$query = "SELECT * FROM `admin` WHERE Username='$username'";
$result = mysqli_query($db, $query) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result);
?>

 <!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Homepage</title>
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
			<a class="nav-link" href="admin.php">Home</a>
        </li>
        <li class="nav-item">
			<a class="nav-link" href="adminprofile.php">Admin Profile</a>
		</li>
		<li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Manage 
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="managejobseeker.php">Manage Job Seeker</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="manageadvertiser.php">Manage Advertiser</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="managepostjob.php">Manage Job Post</a>
		  <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="adminapply.php">Manage Apply Form</a>
        </div>
      </li>
	  <li class="nav-item">
			<a class="nav-link" href="adminfaq.php">FAQ</a>
        </li>
        <li class="nav-item">
			<a class="nav-link" href="adminblacklist.php">Blacklist</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="index.php">Logout</a>
		</li>
	</ul>
	<a class="navbvar-brand" href="#">| <?php echo $_SESSION['username']; ?></a>
</div>
</div>
</nav>

<div class="header">
		<h2>Admin Profile</h2>
	</div>
<form method="post" action="adminprofile.php">

		<?php include('errors.php'); ?>

		<div class="input-group">
		<input type="hidden" name="ID" value="<?php echo $row['ID']; ?>">
			<label>Username</label>
			<input type="text" name="AdminUsername" value="<?php echo $row['Username']; ?>">
		</div>
		<div class="input-group">
			<label>Password</label>
			<input type="text" name="Password" value="<?php echo $row['Password']; ?>">
		</div>
		<div class="input-group">
			<label>Date of Birth</label>
			<input type="date" name="dob" value="<?php echo $row['dob']; ?>">
		</div>
		<div class="input-group">
		Gender : <select name="Gender">
            				<option <?php if("Male"==$row["Gender"]) echo 'selected="selected"'; ?>>Male</option>
            				<option <?php if("Female"==$row["Gender"]) echo 'selected="selected"'; ?>>Female</option>
        					</select>
		</div>
		<div class="input-group">
			<label>Contact Number</label>
			<input type="contact_number" name="ContactNumber" value="<?php echo $row['ContactNumber']; ?>">
		</div>
		<div class="input-group">
			<label>Email</label>
			<input type="email" name="E-mail" value="<?php echo $row['Email']; ?>">
		</div>

		<div class="input-group">
			<button type="submit" class="btn" name="Adminprofileupdate">Update</button>
		</div>
	</form>
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















