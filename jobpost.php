<?php include('server.php') ;
$username=$_SESSION['username'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Job Post</title>
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
<body>

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
        ?><br>
        <p style="font-size:20px; color:green;">Job post:</p><br>
        <div class="row justify-content-center">
            <table class="table">
                <thead>
                    <tr>
                        <th>Job ID</th>
                        <th>Advertiser Username</th>
                        <th>Job Type</th>
                        <th>Paid/Salary</th>
                        <th>Working Hours</th>
                        <th>Working Area</th>
                        <th>Job Description</th>
                        
                    <tr>
                </thead>
        <?php
            while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['ID']; ?></td>
                    <td><?php echo $row['Username']; ?></td>
                    <td><?php echo $row['jobtype']; ?></td>
                    <td><?php echo $row['paidsalary']; ?></td>      
                    <td><?php echo $row['workinghours']; ?></td>
                    <td><?php echo $row['workingarea']; ?></td>
                    <td><?php echo $row['jobdescription']; ?></td>
                    <td>
                      
                    </td>
                </tr>
            <?php endwhile; ?>
            </table>
        </div>

        <?php
        
        function pre_r( $array ){
            echo'<pre>';
            print_r($array);
            echo '</pre>';}
    ?>
    <div>
    <p style="font-size:20px; color:green;">Job post for advertiser to enter:</p><br>
    <form action="server.php" method="POST">    
        
        <input type="hidden" name="ID" value="<?php echo $ID3; ?>">
        <div class="form-group">
        <label>Advertiser Username</label>
        <input type="text" name="Username2" class="form-control" value="<?php echo $Username2;?>" placeholder="Enter advertiser username [login username]">
        </div>
        <div class="form-group">
        <label>Job Type</label>
        <input type="text" name="jobtype" class="form-control" value="<?php echo $jobtype;?>" placeholder="Enter job type [example:Full Time,Part Time]">
        </div>
        <div class="form-group">
        <label>Paid/Salary</label>
        <input type="text" name="paidsalary" value="<?php echo $paidsalary;?>" class="form-control" placeholder="Enter your paid/salary [example:RM2000 per month,RM8 per hours]">
        </div>
        <div class="form-group">
        <label>Working Hours</label>
        <input type="text" name="workinghours" value="<?php echo $workinghours;?>" class="form-control" placeholder="Enter working hours [example:8 hours per day]">
        </div>
        <div class="form-group">
        <label>Working Area</label>
        <input type="text" name="workingarea" value="<?php echo $workingarea;?>" class="form-control" placeholder="Enter working area [example:Skudai,Bukit Indah]">
        </div>
        <div class="form-group">
        <label>Job Description</label>
        <input type="text" name="jobdescription" value="<?php echo $jobdescription;?>" class="form-control" placeholder="Enter job description [example:Cashier,Event Crew]">
        </div>
        <div class="form-group">
            
            <button type="submit" class="btn btn-primary" name="savepostjob">Save</button> 
           
        </div>
       
</form>
</div>
</div>
<br>      
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
