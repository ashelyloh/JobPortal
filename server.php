<?php 
	session_start();

	// variable declaration
	$regAdminUsername = '';
	$regAdminEmail    = "";
	$regAdminPassword1="";
	$regAdminPassword1="";
	$regAdmindob="";
	$regAdminGender="";
    $regAdminContactNumber="";
    $errors = array(); 
	$_SESSION['success'] = "";
	
    
     // connect to database
	$db = mysqli_connect("localhost", "root", "password", "jobportal");
    
	// REGISTER Admin
	if (isset($_POST['reg_Admin'])) {
        // receive all input values from the form

		$regAdminUsername= mysqli_real_escape_string($db, $_POST['regAdminUsername']);
		$regAdminEmail  = mysqli_real_escape_string($db, $_POST['regAdminEmail']);
		$regAdminPassword1 = mysqli_real_escape_string($db, $_POST['regAdminPassword1']);
		$regAdminPassword2 = mysqli_real_escape_string($db, $_POST['regAdminPassword2']);
		$regAdmindob = mysqli_real_escape_string($db, $_POST['regAdmindob']);
		$regAdminGender = mysqli_real_escape_string($db, $_POST['regAdminGender']);
		$regAdminContactNumber = mysqli_real_escape_string($db, $_POST['regAdminContactNumber']);
		// form validation: ensure that the form is correctly filled
		if (empty($regAdminUsername)) { array_push($errors, "Username is required"); }
		if (empty($regAdminPassword1)) { array_push($errors, "Password is required"); }
		if (empty($regAdminPassword2)) { array_push($errors, "Confirm Password is required"); }
		if (empty($regAdmindob)) { array_push($errors, "Date of Birth is required"); }
		if (empty($regAdminContactNumber)) { array_push($errors, "Contact Number is required"); }
		if (empty($regAdminEmail)) { array_push($errors, "Email is required"); }
		
		

		$query = "SELECT * FROM `admin` WHERE Username='$regAdminUsername'";
		$results2 = mysqli_query($db,$query);

		if (mysqli_num_rows($results2)>0){
				array_push($errors, "This username already exist");
			}

		if ($regAdminPassword1 != $regAdminPassword2) {
			array_push($errors, "The two passwords do not match");
		}

		// register user if there are no errors in the form
		if (count($errors) == 0) {
            $regAdminPassword2 = md5($regAdminPassword1);//encrypt the password before saving in the database
            $query = "INSERT INTO `admin` ( `Username`, `Password`, `dob`, `Gender`, `ContactNumber`, `Email`) VALUES ('$regAdminUsername','$regAdminPassword1 ','$regAdmindob','$regAdminGender','$regAdminContactNumber','$regAdminEmail')";
				mysqli_query($db, $query);
			$_SESSION['regAdminUsername'] = $regAdminUsername;
			$_SESSION['success'] = "You are now logged in";
			header('location: index.php');
        }
    }


	// LOGIN Admin
	if (isset($_POST['login_user'])) {
		$AdminUsernameL = mysqli_real_escape_string($db, $_POST['AdminUsernameL']);
		$AdminPasswordL = mysqli_real_escape_string($db, $_POST['AdminPasswordL']);

		if (empty($AdminUsernameL)) {
			array_push($errors, "Username is required");
		}
		if (empty($AdminPasswordL)) {
			array_push($errors, "Password is required");
		}

		if (count($errors) == 0) {
			$query = "SELECT * FROM admin WHERE Username='$AdminUsernameL' AND Password=$AdminPasswordL";
			$results = mysqli_query($db, $query);

			if (mysqli_num_rows($results) == 1) {
				$_SESSION['username'] = $AdminUsernameL;
				header('location: admin.php');
			}else {
				array_push($errors, "Wrong username/password combination");
			}
		}
	}
	
	if (isset($_POST['Adminprofileupdate'])) {
		
		$ID = mysqli_real_escape_string($db, $_POST['ID']);
		$AdminUsername = mysqli_real_escape_string($db, $_POST['AdminUsername']);
		$Password = mysqli_real_escape_string($db, $_POST['Password']);
		$email = mysqli_real_escape_string($db, $_POST['E-mail']);
		$dob = mysqli_real_escape_string($db, $_POST['dob']);
		$Gender = mysqli_real_escape_string($db, $_POST['Gender']);
		$ContactNumber = mysqli_real_escape_string($db, $_POST['ContactNumber']);
		if (empty($AdminUsername)) { array_push($errors, "Username is required"); }
		if (empty($Password)) { array_push($errors, "Password is required"); }
		if (empty($dob)) { array_push($errors, "Date of Birth is required"); }
		if (empty($ContactNumber)) { array_push($errors, "Contact Number is required"); }
		if (empty($email)) { array_push($errors, "Email is required"); }
		$query = "SELECT * FROM `admin` WHERE Username='$AdminUsername'";
		$results2 = mysqli_query($db,$query);

		if (mysqli_num_rows($results2)>1){
				array_push($errors, "This username already exist");
			}
		if (count($errors) == 0) {
		$_SESSION['username']=$AdminUsername;
		$query = "UPDATE admin SET Username='$AdminUsername',Password='$Password',dob='$dob', Gender='$Gender',ContactNumber='$ContactNumber',Email='$email' WHERE ID='$ID'";
		mysqli_query($db, $query) or die(mysqli_error($db));
		echo '<script language="javascript">';
echo 'alert("update complete")';
echo '</script>';
		}
	}
	
	

$regJobSeekerUsername="";
$regJobSeekerEmail="";
$regJobSeekerPassword_1="";
$regJobSeekerPassword_2="";
$regJobSeekerdob="";
$regJobSeekerGender="";
$regJobSeekerContactNumber="";

	// REGISTER Job Seeker 
	if (isset($_POST['reg_JobSeeker'])) {
		// receive all input values from the form
		$regJobSeekerUsername = mysqli_real_escape_string($db, $_POST['regJobSeekerUsername']);
		$regJobSeekerEmail = mysqli_real_escape_string($db, $_POST['regJobSeekerEmail']);
		$regJobSeekerPassword_1 = mysqli_real_escape_string($db, $_POST['regJobSeekerPassword_1']);
		$regJobSeekerPassword_2 = mysqli_real_escape_string($db, $_POST['regJobSeekerPassword_2']);
		$regJobSeekerdob = mysqli_real_escape_string($db, $_POST['regJobSeekerdob']);
		$regJobSeekerGender = mysqli_real_escape_string($db, $_POST['regJobSeekerGender']);
		$regJobSeekerContactNumber = mysqli_real_escape_string($db, $_POST['regJobSeekerContactNumber']);
		// form validation: ensure that the form is correctly filled
		if (empty($regJobSeekerUsername)) { array_push($errors, "Username is required"); }	
		if (empty($regJobSeekerPassword_1)) { array_push($errors, "Password is required"); }
		if (empty($regJobSeekerdob)) { array_push($errors, "Date of birth is required"); }
		if (empty($regJobSeekerContactNumber)) { array_push($errors, "Contact number is required"); }
        if (empty($regJobSeekerEmail)) { array_push($errors, "Email is required"); }

		$query = "SELECT * FROM `jobseeker` WHERE Username='$regJobSeekerUsername'";
		$results3 = mysqli_query($db,$query);

		if (mysqli_num_rows($results3)>0){
				array_push($errors, "This username already exist");
			}
	
		if ($regJobSeekerPassword_1 != $regJobSeekerPassword_2) {
			array_push($errors, "The two passwords do not match");
		}

		// register user if there are no errors in the form
		if (count($errors) == 0) {
			$regJobSeekerPassword_2 = md5($regJobSeekerPassword_1);//encrypt the password before saving in the database
			$query = "INSERT INTO `jobseeker`(`Username`, `Password`, `dob`, `Gender`, `ContactNumber`, `Email`) VALUES ('$regJobSeekerUsername','$regJobSeekerPassword_1','$regJobSeekerdob','$regJobSeekerGender','$regJobSeekerContactNumber','$regJobSeekerEmail')";
			mysqli_query($db, $query);

			$_SESSION['regJobSeekerUsername'] = $regJobSeekerUsername;
			$_SESSION['success'] = "You are now logged in";
			header('location: index1.php');
		}

	}
		// ... 

	// LOGIN Job Seeker 
	if (isset($_POST['login_jobseeker'])) {
		$JobSeekerUsernameL = mysqli_real_escape_string($db, $_POST['JobSeekerUsernameL']);
		$JobSeekerPasswordL = mysqli_real_escape_string($db, $_POST['JobSeekerPasswordL']);

		if (empty($JobSeekerUsernameL)) {
			array_push($errors, "Username is required");
		}
		if (empty($JobSeekerPasswordL )) {
			array_push($errors, "Password is required");
		}

		if (count($errors) == 0) {
			$query = "SELECT * FROM jobseeker WHERE Username='$JobSeekerUsernameL' AND Password='$JobSeekerPasswordL'";
			$results = mysqli_query($db, $query);

			if (mysqli_num_rows($results) == 1) {
				$_SESSION['username'] =$JobSeekerUsernameL ;
				header('location: jobseeker.php');
			}else {
				array_push($errors, "Wrong username/password combination");
			}
		}

	}
	if (isset($_POST['JobSeekerprofileupdate'])) {
		
		$JobSeekerID = mysqli_real_escape_string($db, $_POST['JobSeekerID']);
		$JobSeekerUsername= mysqli_real_escape_string($db, $_POST['JobSeekerUsername']);
		$JobSeekerPassword= mysqli_real_escape_string($db, $_POST['JobSeekerPassword']);
		$JobSeekerEmail = mysqli_real_escape_string($db, $_POST['JobSeekerEmail']);
		$JobSeekerdob = mysqli_real_escape_string($db, $_POST['JobSeekerdob']);
		$JobSeekerGender = mysqli_real_escape_string($db, $_POST['JobSeekerGender']);
		$JobSeekerContactNumber = mysqli_real_escape_string($db, $_POST['JobSeekerContactNumber']);
		if (empty($JobSeekerUsername)) { array_push($errors, "Username is required"); }
		if (empty($JobSeekerPassword)) { array_push($errors, "Password is required"); }
		if (empty($JobSeekerdob)) { array_push($errors, "Date of Birth is required"); }
		if (empty($JobSeekerContactNumber)) { array_push($errors, "Contact Number is required"); }
		if (empty($JobSeekerEmail)) { array_push($errors, "Email is required"); }
		$query = "SELECT * FROM `jobseeker` WHERE Username='$JobSeekerUsername'";
		$results3 = mysqli_query($db,$query);

		if (mysqli_num_rows($results3)>0){
				array_push($errors, "This username already exist");
			}
		if (count($errors) == 0) {
		$_SESSION['username']=$JobSeekerUsername;
		$query = "UPDATE jobseeker SET Username='$JobSeekerUsername',Password='$JobSeekerPassword',dob='$JobSeekerdob', Gender='$JobSeekerGender',ContactNumber='$JobSeekerContactNumber',Email='$JobSeekerEmail' WHERE ID='$JobSeekerID'";
		mysqli_query($db, $query) or die(mysqli_error($db));
		echo '<script language="javascript">';
	echo 'alert("update complete")';
	echo '</script>';
		}
	}
	
		// variable declaration
		$regAdvertiserUsername = "";
		$regAdvertiserEmail    = "";
		$regAdvertiserPassword1="";
		$regAdvertiserPassword1="";
		$regAdvertiserdob="";
		$regAdvertiserGender="";
		$regAdvertiserContactNumber="";
		$regAdvertiserApplyForm ="";
		
		// REGISTER Advertiser
		if (isset($_POST['reg_Advertiser'])) {
			// receive all input values from the form
	
			$regAdvertiserUsername= mysqli_real_escape_string($db, $_POST['regAdvertiserUsername']);
			$regAdvertiserEmail  = mysqli_real_escape_string($db, $_POST['regAdvertiserEmail']);
			$regAdvertiserPassword1 = mysqli_real_escape_string($db, $_POST['regAdvertiserPassword1']);
			$regAdvertiserPassword2 = mysqli_real_escape_string($db, $_POST['regAdvertiserPassword2']);
			$regAdvertiserdob = mysqli_real_escape_string($db, $_POST['regAdvertiserdob']);
			$regAdvertiserGender = mysqli_real_escape_string($db, $_POST['regAdvertiserGender']);
			$regAdvertiserContactNumber = mysqli_real_escape_string($db, $_POST['regAdvertiserContactNumber']);
			$regAdvertiserApplyForm = mysqli_real_escape_string($db, $_POST['regAdvertiserApplyform']);
			// form validation: ensure that the form is correctly filled
			if (empty($regAdvertiserUsername)) { array_push($errors, "Username is required"); }
			if (empty($regAdvertiserPassword1)) { array_push($errors, "Password is required"); }
			if (empty($regAdvertiserdob)) { array_push($errors, "Date of birth is required"); }
			if (empty($regAdvertiserContactNumber)) { array_push($errors, "Contact number is required"); }
			if (empty($regAdvertiserEmail)) { array_push($errors, "Email is required"); }
			$query = "SELECT * FROM `advertiser` WHERE Username='$regAdvertiserUsername'";
			$results4 = mysqli_query($db,$query);

			if (mysqli_num_rows($results4)>0){
				array_push($errors, "This username already exist");
			}
			if ($regAdvertiserPassword1 != $regAdvertiserPassword2) {
				array_push($errors, "The two passwords do not match");
			}
	
			// register user if there are no errors in the form
			if (count($errors) == 0) {
				$regAdvertiserPassword2= md5($regAdvertiserPassword1);//encrypt the password before saving in the database
				$query = "INSERT INTO `advertiser` ( `Username`,`Password`, `dob`, `Gender`, `ContactNumber`, `Email`,`Applyform`) VALUES ('$regAdvertiserUsername','$regAdvertiserPassword1 ','$regAdvertiserdob','$regAdvertiserGender','$regAdvertiserContactNumber','$regAdvertiserEmail','$regAdvertiserApplyform')";
				mysqli_query($db, $query)or die(mysqli_error($db));;
	
				$_SESSION['regAdvertiserUsername'] = $regAdvertiserUsername;
				$_SESSION['success'] = "You are now logged in";
				header('location: index1.php');
			}
		}
 // LOGIN Advertiser
 if (isset($_POST['login_advertiser'])) {
	$AdvertiserUsernameL = mysqli_real_escape_string($db, $_POST['AdvertiserUsernameL']);
	$AdvertiserPasswordL = mysqli_real_escape_string($db, $_POST['AdvertiserPasswordL']);

	if (empty($AdvertiserUsernameL)) {
		array_push($errors, "Username is required");
	}
	if (empty($AdvertiserPasswordL )) {
		array_push($errors, "Password is required");
	}

	if (count($errors) == 0) {
		$query = "SELECT * FROM advertiser WHERE Username='$AdvertiserUsernameL' AND Password=$AdvertiserPasswordL";
		$results123 = mysqli_query($db, $query);

		if (mysqli_num_rows($results123) == 1) {
			$_SESSION['username'] =$AdvertiserUsernameL ;
			header('location: advertiser.php');
		}else {
			array_push($errors, "Wrong username/password combination");
		}
	}

}

if (isset($_POST['Advertiserprofileupdate'])) {
		
	$AdvertiserID = mysqli_real_escape_string($db, $_POST['AdvertiserID']);
	$AdvertiserUsername= mysqli_real_escape_string($db, $_POST['AdvertiserUsername']);
	$AdvertiserPassword= mysqli_real_escape_string($db, $_POST['AdvertiserPassword']);
	$AdvertiserEmail = mysqli_real_escape_string($db, $_POST['AdvertiserEmail']);
	$Advertiserdob = mysqli_real_escape_string($db, $_POST['Advertiserdob']);
	$AdvertiserGender = mysqli_real_escape_string($db, $_POST['AdvertiserGender']);
	$AdvertiserContactNumber = mysqli_real_escape_string($db, $_POST['AdvertiserContactNumber']);
	if (empty($AdvertiserUsername)) { array_push($errors, "Username is required"); }
		if (empty($AdvertiserPassword)) { array_push($errors, "Password is required"); }
		if (empty($Advertiserdob)) { array_push($errors, "Date of Birth is required"); }
		if (empty($AdvertiserContactNumber)) { array_push($errors, "Contact Number is required"); }
		if (empty($AdvertiserEmail)) { array_push($errors, "Email is required"); }
		$query = "SELECT * FROM `advertiser` WHERE Username='$AdvertiserUsername'";
		$results4 = mysqli_query($db,$query);

		if (mysqli_num_rows($results4)>0){
				array_push($errors, "This username already exist");
			}
		if (count($errors) == 0) {
	$_SESSION['username']=$AdvertiserUsername;
	$query = "UPDATE advertiser SET Username='$AdvertiserUsername',Password='$AdvertiserPassword',dob='$Advertiserdob', Gender='$AdvertiserGender',ContactNumber='$AdvertiserContactNumber',Email='$AdvertiserEmail' WHERE ID='$AdvertiserID'";
	mysqli_query($db, $query) or die(mysqli_error($db));
	echo '<script language="javascript">';
echo 'alert("update complete")';
echo '</script>';
		}
}
	

$ID3 = 0;
$updatepostjob = false;
$Username2='';
$jobtype ='';
$paidsalary ='';
$workinghours ='';
$workingarea ='';
$jobdescription ='';
$mysqli = new mysqli('localhost', 'root', 'password', 'jobportal') or die(mysqli_error($mysqli));
if(isset($_POST['savepostjob'])){
	$Username2 =$_POST['Username2'];
    $jobtype = $_POST['jobtype'];
    $paidsalary = $_POST['paidsalary'];
    $workinghours = $_POST['workinghours'];
    $workingarea = $_POST['workingarea']; 
    $jobdescription = $_POST['jobdescription'];
		
			
   			$mysqli->query("INSERT INTO findjob (Username,jobtype, paidsalary,workinghours,workingarea,jobdescription) VALUES('$Username2','$jobtype', '$paidsalary','$workinghours','$workingarea','$jobdescription')")or
			die($mysqli->error);

    $_SESSION['message'] = "Record has been saved!";
    $_SESSION['msg_type'] = "success";
		
	header("jobdescription: server.php");
	
}

if(isset($_GET['deletepostjob'])){
    $ID3 = $_GET['deletepostjob'];
    $mysqli->query("DELETE FROM findjob WHERE ID=$ID3") or die($mysqli->error());

    $_SESSION['message'] = "Record has been deleted!";
    $_SESSION['msg_type'] = "danger";

    header("jobdescription: server.php");
}

if(isset($_GET['editpostjob'])){
    $ID3 = $_GET['editpostjob'];
    $updatepostjob = true;
    $result = $mysqli->query("SELECT * FROM findjob WHERE ID=$ID3") or die($mysqli->error($mysqli));
    if ($result){
		$row = $result->fetch_array();
		$Username2= $row['Username'];
        $jobtype = $row['jobtype'];
        $paidsalary = $row['paidsalary'];      
        $workinghours = $row['workinghours'];
        $workingarea = $row['workingarea'];
        $jobdescription = $row['jobdescription'];
    }
}

if(isset($_POST['updatepostjob'])){
	$ID3 = $_POST['ID3'];
	$Username2 = $_POST['Username2'];
    $jobtype = $_POST['jobtype'];
    $paidsalary = $_POST['paidsalary']; 
    $workinghours = $_POST['workinghours'];
    $workingarea = $_POST['workingarea'];
    $jobdescription = $_POST['jobdescription'];

    $mysqli->query("UPDATE findjob SET Username='$Username2', jobtype='$jobtype', paidsalary='$paidsalary', workinghours='$workinghours', workingarea='$workingarea', jobdescription='$jobdescription' WHERE ID=$ID3") or die($mysqli->error);

    $_SESSION['message'] = "Record has been updated!";
    $_SESSION['msg_type'] = "warning";

    header("jobdescription: server.php");
}

$ID1 = 0;
$updateadvertiser = false;
$Username1 ='';
$Password1='';
$dob1='';
$Gender1 ='';
$ContactNumber1 ='';
$Email1 ='';
$Applyform ='';
$mysqli = new mysqli('localhost', 'root', 'password', 'jobportal') or die(mysqli_error($mysqli));
if(isset($_POST['saveadvertiser'])){
    $Username1 = $_POST['Username1'];
    $Password1 = $_POST['Password1'];
    $dob1 = $_POST['dob1'];
    $Gender1= $_POST['Gender1']; 
	$ContactNumber1 = $_POST['ContactNumber1'];
	$Email1 = $_POST['Email1'];
	$Applyform = $_POST['Applyform'];

    $mysqli->query("INSERT INTO advertiser (Username,Password,dob,Gender,ContactNumber,Email,Applyform) VALUES('$Username1', '$Password1','$dob1','$Gender1','$ContactNumber1','$Email1','$Applyform')") or 
    die($mysqli->error);

    $_SESSION['message'] = "Record has been saved!";
    $_SESSION['msg_type'] = "success";

	header("jobdescription: server.php");
}

if(isset($_GET['deleteadvertiser'])){
    $ID = $_GET['deleteadvertiser'];
    $mysqli->query("DELETE FROM advertiser WHERE ID=$ID") or die($mysqli->error());

    $_SESSION['message'] = "Record has been deleted!";
    $_SESSION['msg_type'] = "danger";

    header("jobdescription: server.php");
}

if(isset($_GET['editadvertiser'])){
    $ID1 = $_GET['editadvertiser'];
    $updateadvertiser = true;
    $result = $mysqli->query("SELECT * FROM advertiser WHERE ID='$ID1'") or die($mysqli->error($mysqli));
    if ($result){
		$row = $result->fetch_array();
		$Username1 = $row['Username'];
		$Password1 =  $row['Password'];
		$dob1 =  $row['dob'];
		$Gender1=  $row['Gender']; 
		$ContactNumber1 =  $row['ContactNumber'];
		$Email1 =  $row['Email'];
		$Applyform =  $row['Applyform'];
	}
}

if(isset($_POST['updateadvertiser'])){
    $ID1 = $_POST['ID1'];
    $Username1 = $_POST['Username1'];
    $Password1 = $_POST['Password1'];
    $dob1 = $_POST['dob1'];
    $Gender1= $_POST['Gender1']; 
	$ContactNumber1 = $_POST['ContactNumber1'];
	$Email1 = $_POST['Email1'];
	$Applyform = $_POST['Applyform'];

    $mysqli->query("UPDATE advertiser SET Username='$Username1', Password='$Password1', dob='$dob1', Gender='$Gender1', ContactNumber='$ContactNumber1', Email='$Email1', Applyform='$Applyform' WHERE ID='$ID1'") or die($mysqli->error);

    $_SESSION['message'] = "Record has been updated!";
    $_SESSION['msg_type'] = "warning";

    header("jobdescription: server.php");
}
$ID = 0;
$updatejobseeker = false;
$Username ='';
$Password='';
$dob='';
$Gender ='';
$ContactNumber ='';
$Email ='';
$mysqli = new mysqli('localhost', 'root', 'password', 'jobportal') or die(mysqli_error($mysqli));
if(isset($_POST['savejobseeker'])){
    $Username = $_POST['Username'];
    $Password = $_POST['Password'];
    $dob = $_POST['dob'];
    $Gender= $_POST['Gender']; 
	$ContactNumber = $_POST['ContactNumber'];
	$Email = $_POST['Email'];


    $mysqli->query("INSERT INTO jobseeker (Username,Password,dob,Gender,ContactNumber,Email) VALUES('$Username', '$Password','$dob','$Gender','$ContactNumber','$Email')") or 
    die($mysqli->error);

    $_SESSION['message'] = "Record has been saved!";
    $_SESSION['msg_type'] = "success";

	header("jobdescription: server.php");
}

if(isset($_GET['deletejobseeker'])){
    $ID = $_GET['deletejobseeker'];
    $mysqli->query("DELETE FROM jobseeker WHERE ID=$ID") or die($mysqli->error());

    $_SESSION['message'] = "Record has been deleted!";
    $_SESSION['msg_type'] = "danger";

    header("jobdescription: server.php");
}

if(isset($_GET['editjobseeker'])){
    $ID = $_GET['editjobseeker'];
    $updatejobseeker = true;
    $result = $mysqli->query("SELECT * FROM jobseeker WHERE ID=$ID") or die($mysqli->error($mysqli));
    if ($result){
		$row = $result->fetch_array();
		$Username= $row['Username'];
		$Password =  $row['Password'];
		$dob =  $row['dob'];
		$Gender=  $row['Gender']; 
		$ContactNumber =  $row['ContactNumber'];
		$Email =  $row['Email'];
    }
}

if(isset($_POST['updatejobseeker'])){
    $ID = $_POST['ID'];
    $Username = $_POST['Username'];
    $Password = $_POST['Password'];
    $dob = $_POST['dob'];
    $Gender= $_POST['Gender']; 
	$ContactNumber = $_POST['ContactNumber'];
	$Email = $_POST['Email'];

    $mysqli->query("UPDATE jobseeker SET Username='$Username', Password='$Password', dob='$dob', Gender='$Gender', ContactNumber='$ContactNumber', Email='$Email' WHERE ID=$ID") or die($mysqli->error);

    $_SESSION['message'] = "Record has been updated!";
    $_SESSION['msg_type'] = "warning";

    header("jobdescription: server.php");
}
$id = 0;
$update = false;
$name ='';
$applyJobID ='';
$advertiserUsername ='';
$gender ='';
$email ='';
$contactNo ='';
$dob2 ='';
$address ='';
$yearOfExperience ='';
$mysqli = new mysqli('localhost', 'root', 'password', 'jobportal') or die(mysqli_error($mysqli));
if(isset($_POST['save'])){
    $name = $_POST['name'];
	$applyJobID = $_POST['applyJobID'];
	$advertiserUsername = $_POST['advertiserUsername'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $contactNo = $_POST['contactNo'];
    $dob2 = $_POST['dob2'];
    $address = $_POST['address'];
	$yearOfExperience = $_POST['yearOfExperience'];
	
	 if (empty($name) And empty($applyJobID) And empty($advertiserUsername) And empty($gender) And
	 empty($email) And empty($contactNo) And empty($dob2) And empty($address) And empty($yearOfExperience))
	 {
		$_SESSION['message'] = "All the field is required!";
		$_SESSION['msg_type'] = "danger";
	 }
	 elseif (empty($applyJobID) And empty($advertiserUsername) And empty($gender) And
	 empty($email) And empty($contactNo) And empty($dob2) And empty($address) And empty($yearOfExperience))
	 {
		$_SESSION['message'] = "Apply Job ID, Advertiser Username, Gender, Email Address, Contact Number, Date of birth, Address, Year of experience is required!";
		$_SESSION['msg_type'] = "danger";
	 }
	 elseif (empty($name) And empty($applyJobID) And empty($advertiserUsername) And empty($gender) And
	 empty($email) And empty($contactNo) And empty($dob2) And empty($yearOfExperience))
	 {
		$_SESSION['message'] = "Full Name follow by(NRIC), Apply Job ID, Advertiser Username, Gender, Email Address, Contact Number, Date of birth, Year of experience is required!";
		$_SESSION['msg_type'] = "danger";
	 }
	 elseif (empty($name) And empty($applyJobID) And empty($advertiserUsername) And empty($gender) And
	 empty($email) And empty($contactNo) And empty($dob2) And empty($address))
	 {
		$_SESSION['message'] = "Full Name follow by(NRIC), Apply Job ID, Advertiser Username, Gender, Email Address, Contact Number, Date of birth, Address is required!";
		$_SESSION['msg_type'] = "danger";
	 }
	 elseif (empty($address) And empty($yearOfExperience) And empty($name)) {
	 
		$_SESSION['message'] = "Address, Year of experience, Full Name follow by(NRIC) is required!";
		$_SESSION['msg_type'] = "danger";
	 }	
	 elseif (empty($address) And empty($name))
	 {
		$_SESSION['message'] = "Address and Full Name follow by(NRIC) is required!";
		$_SESSION['msg_type'] = "danger";
	 }	
	 elseif (empty($address) And empty($yearOfExperience))
	 {
		$_SESSION['message'] = "Address and Year of experience is required!";
		$_SESSION['msg_type'] = "danger";
	 }
	 elseif (empty($yearOfExperience) And empty($name))
	 {
		$_SESSION['message'] = "Year of experience and Full Name follow by(NRIC) is required!";
		$_SESSION['msg_type'] = "danger";
	 }
	 elseif (empty($yearOfExperience) And empty($address))
	 {
		$_SESSION['message'] = "Year of experience and Address is required!";
		$_SESSION['msg_type'] = "danger";
	 }		
	 elseif (empty($name))
	 {
		$_SESSION['message'] = "Full Name follow by(NRIC) is required!";
		$_SESSION['msg_type'] = "danger";
	 }	
	 elseif (empty($address))
	{
	   $_SESSION['message'] = "Address is required!";
	   $_SESSION['msg_type'] = "danger";
	}
	 elseif (empty($yearOfExperience))
	 {
		$_SESSION['message'] = "Year of experience is required!";
		$_SESSION['msg_type'] = "danger";
	 }
	 else
	 {
	$mysqli->query("INSERT INTO applyjob (name,applyJobID,advertiserUsername,gender,email,contactNo,dob,address,yearOfExperience) VALUES('$name','$applyJobID','$advertiserUsername','$gender','$email','$contactNo','$dob2','$address','$yearOfExperience')")or
	die($mysqli->error);
    
	$_SESSION['message'] = "Apply successfully! Please wait for advertiser to contact you!";
	$_SESSION['msg_type'] = "success";
	$name="";
	$address="";
	$yearOfExperience="";

	header("name: server.php"); 
	 }
}

if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    $mysqli->query("DELETE FROM applyjob WHERE id=$id") or die($mysqli->error());

    $_SESSION['message'] = "Record has been deleted!";
    $_SESSION['msg_type'] = "danger";

    header("name: server.php");
}

?>
