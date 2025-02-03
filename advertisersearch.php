<?php
  require_once 'config.php';
  require_once 'process.php';
  $username=$_SESSION['username'];
  if (isset($_POST['searching'])) {
    $searchfeedback = $_POST['search'];
    $sql = "SELECT * FROM faq WHERE feedback='$searchfeedback'";
    $stmt = $conn->prepare($sql);
    $stmt->execute(['feedback' => $searchfeedback]);
    $row = $stmt->fetch();
  } else {
    header('location: .');
    exit();
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>FAQ</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
    <link href="css/style.css" rel="stylesheet">
    <style type="text/css">
    	.wrapper
    	{
            background-color:#d7e7ec;
            margin-left:20px;
            margin-right:20px;
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

    <?php require_once 'process.php'; ?>

    <?php
    if (isset($_SESSION['message'])): ?>
    <div class="alert alert-<?=$_SESSION['msg_type']?>">

    <?php
        echo $_SESSION['message'];
        unset($_SESSION['message']); ?>
    
    </div>
    <?php endif ?>
    <div class="wrapper">
    <div class="container">
    <?php 
        $mysqli = new mysqli('localhost', 'root', 'password', 'jobportal') or die(mysqli_error($mysqli));
        $result = $mysqli->query("SELECT * FROM faq") or die($mysqli->error);
        //pre_r($result);
        ?>
        
        <div class="container">

<div class="container">
<div class="row mt-4">
<div class="col-md-8 mx-auto  rounded p-4">
        
        <h5 class="text-center text-secondary text-dark">Enter any keyword in the search box</h5>
        <hr class="my-1">
        <form action="advertisersearch.php" method="post" class="p-3">
          <div class="input-group">
            <input type="text" name="search" id="search" class="form-control form-control-lg rounded-0 border-dark" placeholder="Search..." autocomplete="off" required>
            <div class="form-group">
              <input type="submit" name="searching" value="Search" class="btn2 btn-secondary btn-lg rounded-0">
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
  <script src="faqscript.js"></script>
    </div>
    <hr class="my-1">
        <div class="row justify-content-center">
       
            <table class="table">
                <thead>
                    <tr>
                        <th><h4>FAQ</h4></th>
                    </tr>
                </thead>
                <tr>
                    <td><p> <?= $row['feedback'] ?></p></td>
                </tr>
            </table>
        </div>

        <?php
        function pre_r( $array ){
            echo'<pre>';
            print_r($array);
            echo '</pre>';}
    ?>

<div class="container">
<div class="row mt-4">
<div class="col-md-8 mx-auto  rounded p-4">

        <h5 class="text-center text-secondary text-dark">If you have any suggestions or questions please comment below.</h5>
        <hr class="my-1">
        <form action="process.php" method="POST" class="p-3">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <div class="form-group">
        <input type="text" name="feedback" class="form-control" value="<?php echo $feedback;?>" placeholder="What other problems you face on?"> 
        </div>
        <div class="form-group">
        <?php
            if($update == true):
            ?>
            <button type="submit" class="btn btn-info" name="update">Update</button>
            <?php else: ?>
            <button type="submit" class="btn btn-primary" name="submitadvertiser">Submit</button> 
            <?php endif; ?>
            
            </div>
          </div>
        </form>
      </div>
      
      <div class="col-md-5" style="position: relative;margin-top: -38px;margin-left: 215px;">
</div>
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

