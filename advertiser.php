<?php 
	session_start(); 
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
<!--- Image Slider -->
<div id="slides" class="carousel slide" data-ride="carousel">
<ul class="carousel-indicators">
	<li data-target="#slides" data-slide-to="0" class="active"></li>
	<li data-target="#slides" data-slide-to="1"></li>
	<li data-target="#slides" data-slide-to="2"></li>
</ul>
<div class="carousel-inner">
	<div class="carousel-item active">
		<img src="img/employee1.jpg">
		<div class="carousel-caption">
			<h1 class="display-2">Job Portal</h1>
				
	</div>
	</div>
	<div class="carousel-item">
        <img src="img/background2.jpg">
	</div>
	<div class="carousel-item">
		<img src="img/background3.jpg">
	</div>
	</div>
	</div>

<!--- Welcome Section -->
<div class="container-fluid padding">
<div class="row welcome text-center">
	<div class="col-12">
		<h1 class="display-4">Built with ease.</h1>
	</div>
	<hr>
	<div class="col-12">
		<p class="lead">Welcome to Job Portal website!<br>
		Job Portal is a free and friendly platform for Job Seekers and Advertisers!</p>
	</div>
</div>
</div>
	<!--- Benefit-->
	<div class="container-fluid padding">
<div class="row welcome text-center">
	<div class="col-12">
		<h1 class="display-4">Benefit</h1>
	</div>	
	<hr>
	</div>
</div>

<!--- Cards -->
<div class="container-fluid padding">
<div class="row padding">
	
	<div class="col-md-4">
	<div class="card">
		<img class="card-img-top" src="img/Reliability.jpg">
		<div class="card-body">
		<h4 class="card-title">Reliability</h4>
		<p class="card-text">We provide you reliable and most demanding job scopes in market.</p> 
	</div>
	</div>
	</div>

	<div class="col-md-4">
		<div class="card">
			<img class="card-img-top" src="img/Recommendation.jpg">
			<div class="card-body">
			<h4 class="card-title">Recommendation</h4>
			<p class="card-text">Our instant matching tech generates a shortlist based on the criteria you select.</p> 
	</div>
	</div>
	</div>

	<div class="col-md-4">
		<div class="card">
			<img class="card-img-top" src="img/Security.jpg">
			<div class="card-body">
			<h4 class="card-title">High Security</h4>
			<p class="card-text">All user's information provided will be kept private and confidential by our highly secured security system.</p>
	
	</div>
	</div>
	</div>

		</div>
		</div>
<hr class="my-4">



<!--- Two Column Section -->
<div class="container-fluid padding">
<div class="row padding">
	<div class="col-lg-6">
	<h2>Personalized for you...</h2>
	<p>Employees can easier to find their favourite job without spending too much time. </p><br>
	<p>Advertiser can post the job at our platform to reduce the time in finding employees.<br>
	 It's easy to set up your free account in second, and help's available if you should ever need it.</p><br>
	 <p>We're obsessive about security and protection of data with the same 128-bit encryption and physical security that used in banks.</p>
	<br>

	</div>
    
	<div class="col-lg-6">
		<img src="img/desk.png" class="img-fluid">
	</div>

	</div>
	</div>
<hr class="my-4">
<!--- Fixed background -->
<figure>
	<div class="fixed-wrap">
		<div id="fixed">
	</div>
	</div>
</figure>
<hr class="my-4">
<!--- Features-->
<div class="container-fluid padding">
<div class="row welcome text-center">
	<div class="col-12">
		<h1 class="display-4">Features</h1>
	</div>	
	<hr>
	</div>
</div>

<!--- Cards -->
<div class="container-fluid padding">
<div class="row padding">
	
	<div class="col-md-4">
	<div class="card">
		<img class="card-img-top" src="img/team1.png">
		<div class="card-body">
		<h4 class="card-title">Find Job</h4>
		<p class="card-text">Find professionals you can trust by browsing their samples of previous and reading their profile reviews.</p>
	</div>
	</div>
	</div>

	<div class="col-md-4">
		<div class="card">
			<img class="card-img-top" src="img/team2.png">
			<div class="card-body">
			<h4 class="card-title">Post Job</h4>
			<p class="card-text">Find reliable and better quality workers effortlessly, reduce cost of hiring  
			and make the survey more efficiency.</p> 
	</div>
	</div>
	</div>

	<div class="col-md-4">
		<div class="card">
			<img class="card-img-top" src="img/team3.png">
			<div class="card-body">
			<h4 class="card-title">FAQ</h4>
			<p class="card-text">We're always here to help. Our support consists of real people who are available 24/7.</p>
		
	</div>
	</div>
	</div>

		</div>
		</div>

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







