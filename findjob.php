<?php include('server.php') ;
$username=$_SESSION['username'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Find Job</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
    <link href="css/style.css" rel="stylesheet">
    <style type="text/css">
    	.wrapper
    	{
            background-color:#d7e7ec;
            margin:20px;
    		color: black;
      }
    </style>
</head>
<body class="bg-dark">

<nav class="navbar navbar-expand-md navbar-light bg-light sticky-top">
<div class="container-fluid">

	<a class="navbvar-brand" href="#"><img class="logo" src="img/Tiger.jpg">Little Tiger Job Portal</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
	<span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="navbarResponsive">
		<ul class="navbar-nav ml-auto">
		<li class="nav-item">
			<a class="nav-link" href="jobseeker.php">Home</a>
        </li>
        <li class="nav-item">
			<a class="nav-link" href="jobseekerprofile.php">Job Seeker Profile</a>
		</li>
        <li class="nav-item">
			<a class="nav-link" href="findjob.php">Find Job</a>
        </li>
	  <li class="nav-item">
			<a class="nav-link" href="jobseekerfaq.php">FAQ</a>
        </li>
        <li class="nav-item">
			<a class="nav-link" href="jobseekerblacklist.php">Blacklist</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="index1.php">Logout</a>
		</li>
	</ul>
  <a class="navbvar-brand" href="#">| <?php echo $_SESSION['username']; ?></a>
</div>
</div>
</nav>

  <div class="container">
    <div class="row mt-4">
      <div class="col-md-8 mx-auto bg-light rounded p-4">
        <h5 class="text-center font-weight-bold text-dark">Find your ideal job</h5>
        <hr class="my-1">
        <h5 class="text-center text-secondary text-dark">Enter any keyword in the search box</h5>
        <form action="details.php" method="post" class="p-3">
          <div class="input-group">
            <input type="text" name="search" id="search" class="form-control form-control-lg rounded-0 border-dark" placeholder="Search..." autocomplete="off" required>
            <div class="form-group">
              <input type="submit" name="submit" value="Search" class="btn2 btn-secondary btn-lg rounded-0">
            </div>
          </div>
        </form>
      </div>
      <div class="col-md-5" style="position: relative;margin-top: -38px;margin-left: 215px;">
        <div class="list-group" id="show-list">
          <!-- Here autocomplete list will be display -->
        </div>
      </div>
    </div>
  </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="script2.js"></script>
 </body><br><br>
<?php require_once 'server.php'; ?>

    <?php
    if (isset($_SESSION['message'])): ?>
    <div class="alert alert-<?=$_SESSION['msg_type']?>">

    <?php
        echo $_SESSION['message'];
        unset($_SESSION['message']); ?>
    
    </div>
    <?php endif ?>
    <div class="container">
    <?php 
        $mysqli = new mysqli('localhost', 'root', 'password', 'jobportal') or die(mysqli_error($mysqli));
        $result = $mysqli->query("SELECT * FROM findjob") or die($mysqli_error);
        //pre_r($result);
        ?>

        <div class="row justify-content-center">
        <p style="color:white;font-size:50px;">All Job Post:</p><br>
            <table class="table">
                <thead>
                    <tr>
                        <th style="color:white">Job ID</th>
                        <th style="color:white">Advertiser Username</th>
                        <th style="color:white">Job Type</th>
                        <th style="color:white">Paid/Salary</th>
                        <th style="color:white">Working Hours</th>
                        <th style="color:white">Working Area</th>
                        <th style="color:white">Job Description</th>
                        <th style="color:white" colspan="6">Action</th>
                    <tr>
                    
                </thead>
        <?php
            while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td style="color:white"><?php echo $row['ID']; ?></td>
                    <td style="color:white"><?php echo $row['Username']; ?></td>
                    <td style="color:white"><?php echo $row['jobtype']; ?></td>
                    <td style="color:white"><?php echo $row['paidsalary']; ?></td>      
                    <td style="color:white"><?php echo $row['workinghours']; ?></td>
                    <td style="color:white"><?php echo $row['workingarea']; ?></td>
                    <td style="color:white"><?php echo $row['jobdescription']; ?></td>
                    <td>
                    <div>
                    <a type="submit" name="submit" value="Apply" class="btn btn-info rounded-20" href="apply.php?applyid=<?php echo $row['ID']; ?>" >Apply</a>
            </div>
                    </td>
                </tr>
            <?php endwhile; ?>
            </table>
        </div>
        </div>
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