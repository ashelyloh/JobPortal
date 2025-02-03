<?php include('server.php') ;
$username=$_SESSION['username'];
$Genderapply = "";
$Contactapply ="";
$dobapply = "";
$Emailapply="";
$ID="";




if(isset($_GET['applyid'])){
    $ID = $_GET['applyid'];
    
    $result = $mysqli->query("SELECT * FROM findjob WHERE ID='$ID'") or die($mysqli->error($mysqli));
    if ($result){
		$row = $result->fetch_array();
		$Username1 = $row['Username'];
       
    }

    $result1 = $mysqli->query("SELECT * FROM jobseeker WHERE Username='$username'") or die($mysqli->error($mysqli));
    if ($result1){
        $row = $result1->fetch_array();
        $Genderapply = $row['Gender'];
        $Contactapply = $row['ContactNumber'];
        $dobapply = $row['dob'];
        $Emailapply=$row['Email'];

    }
  
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apply for Job</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
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
        $result = $mysqli->query("SELECT * FROM applyjob") or die($mysqli_error);
        //pre_r($result);
        ?>

        <?php
        
        function pre_r( $array ){
            echo'<pre>';
            print_r($array);
            echo '</pre>';}
    ?>
    <div class="row justify-content-center">
    <form action="apply.php" method="POST">
        <br>
        <p style="font-size:20px;">Apply form for job seeker to enter:</p>
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <div class="form-group">
        <label>Full Name follow by(NRIC)</label>
        <input type="text" name="name" class="form-control" value="<?php echo $name; ?>" placeholder="Enter your full name">
        </div>
        <div class="form-group">
        <label>Apply Job ID</label>
        <input type="text" name="applyJobID" value="<?php echo $ID;?>" class="form-control" placeholder="Enter the Job ID for job that you want to apply" readonly>
        </div>
        <div class="form-group">
        <label>Advertiser Username</label>
        <input type="text" name="advertiserUsername" value="<?php echo $Username1?>" class="form-control" placeholder="Enter the Advertiser Username that you want to apply" readonly>
        </div>
        <div class="form-group">
        <label>Gender</label>
        <input type="text" name="gender" value="<?php echo $Genderapply;?>" class="form-control" placeholder="Enter your email address" readonly>
        </div>
        <div class="form-group">
        <label>Email Address</label>
        <input type="text" name="email" value="<?php echo $Emailapply;?>" class="form-control" placeholder="Enter your email address" readonly>
        </div>
        <div class="form-group">
        <label>Contact Number</label>
        <input type="text" name="contactNo" value="<?php echo $Contactapply;?>" class="form-control" placeholder="Enter your contact number" readonly>
        </div>
        <div class="form-group">
        <label>Date of birth</label>
        <input type="text" name="dob2" value="<?php echo $dobapply;?>" class="form-control" placeholder="Enter your date of birth [example:2001-01-02]" readonly>
        </div>
        <div class="form-group">
        <label>Address</label>
        <input type="text" name="address" value="<?php echo $address;?>" class="form-control" placeholder="Enter your address [example:6,Jalan Harimau 1, Taman Desa Durian, 81100 Johor Bahru, Johor.]">
        </div>
        <div class="form-group">
        <label>Year of experience</label>
        <input type="text" name="yearOfExperience" value="<?php echo $yearOfExperience;?>" class="form-control" placeholder="Enter your year of experience [example: 1 year]">
        </div>
        <div class="form-group">    
        <button type="submit" class="btn btn-primary" name="save">Save</button> 
        </div>
</form>
</div>
</div>
</body>
</html>
