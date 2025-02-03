<?php include('server.php') ;
$username=$_SESSION['username'];
$query = "SELECT * FROM `jobseeker` WHERE Username='$username'";
$result = mysqli_query($db, $query) or die ( mysqli_error($db));
$row = mysqli_fetch_assoc($result);
?>
	
 <!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Manage Job Seeker</title>
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
        $result = $mysqli->query("SELECT * FROM jobseeker") or die($mysqli_error);
        //pre_r($result);
        ?>
        <p style="font-size:20px; color:green;">Manage Job Seeker Details:</p><br>
        <div class="row justify-content-center">
        
            <table class="table">
                <thead>
                    <tr>
                        <th>Job Seeker Username</th>
                        <th>Password</th>
                        <th>Date of birth</th>
                        <th>Gender</th>
                        <th>Contact Number</th>
                        <th>Email</th>
                        <th colspan="6">Action</th>
                    <tr>
                </thead>
        <?php
            while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['Username']; ?></td>
                    <td><?php echo $row['Password']; ?></td>      
                    <td><?php echo $row['dob']; ?></td>
                    <td><?php echo $row['Gender']; ?></td>
                    <td><?php echo $row['ContactNumber']; ?></td>
                    <td><?php echo $row['Email']; ?></td>
                    <td>
                        <a href="managejobseeker.php?editjobseeker=<?php echo $row['ID']; ?>"
                            class="btn btn-info">Edit</a>
                            <a href="managejobseeker.php?deletejobseeker=<?php echo $row['ID']; ?>"
                            class="btn btn-danger">Delete</a>
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
    <p style="font-size:20px; color:green;">Edit Job Seeker Details:</p><br>
    <div>
    <form action="managejobseeker.php" method="POST">
        <input type="hidden" name="ID" value="<?php echo $ID; ?>">
        <div class="form-group">
        <label>Job Seeker Username</label>
        <input type="text" name="Username" value="<?php echo $Username;?>" class="form-control" placeholder="Enter your username">
        </div>
        <div class="form-group">
        <label>Password</label>
        <input type="text" name="Password" value="<?php echo $Password;?>" class="form-control" placeholder="Enter your password">
        </div>
        <div class="form-group">
        <label>dob</label>
        <input type="date" name="dob" value="<?php echo $dob;?>" class="form-control">
        </div>
        <div class="form-group">
        <label>Gender</label>
        <select name="Gender" value="<?php echo $Gender;?>" class="form-control">
            	<option>Male</option>
            	<option>Female</option>
        				</select>
        </div>
        <div class="form-group">
        <label>ContactNumber</label>
        <input type="text" name="ContactNumber" value="<?php echo $ContactNumber;?>" class="form-control" placeholder="Enter your contact number">
        </div>
        <div class="form-group">
        <label>Email</label>
        <input type="text" name="Email" value="<?php echo $Email;?>" class="form-control" placeholder="Enter your email">
        </div>
        <div class="form-group">
        <?php
            if($updatejobseeker == true):
            ?>
            <button type="submit" class="btn btn-info" name="updatejobseeker">Update</button>
            <?php endif; ?>
        </div>

</div>
</div>
</body>
</html>
</form>
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







