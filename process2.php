<?php

session_start();

$mysqli = new mysqli('localhost', 'root', 'password', 'jobportal') or die(mysqli_error($mysqli));

$id = 0;
$update = false;
$name ='';
$applyJobID ='';
$gender ='';
$email ='';
$contactNo ='';
$dob ='';
$address ='';
$yearOfExperience ='';

if(isset($_POST['save'])){
    $name = $_POST['name'];
    $applyJobID = $_POST['applyJobID'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $contactNo = $_POST['contactNo'];
    $dob = $_POST['dob'];
    $address = $_POST['address'];
    $yearOfExperience = $_POST['yearOfExperience'];
    $mysqli->query("INSERT INTO applyjob (name,applyJobID,gender,email,contactNo,dob,address,yearOfExperience) VALUES('$name', '$applyJobID','$gender','$email','$contactNo','$dob','$address','$yearOfExperience')") or 
    die($mysqli->error);

    $_SESSION['message'] = "Record has been saved!";
    $_SESSION['msg_type'] = "success";

    header("name: process2.php");
}

if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    $mysqli->query("DELETE FROM applyjob WHERE id=$id") or die($mysqli->error());

    $_SESSION['message'] = "Record has been deleted!";
    $_SESSION['msg_type'] = "danger";

    header("name: process2.php");
}

if(isset($_GET['edit'])){
    $id = $_GET['edit'];
    $update = true;
    $result = $mysqli->query("SELECT * FROM applyjob WHERE id=$id") or die($mysqli->error());
    if ($result){
        $row = $result->fetch_array();
        $name = $row['name'];
        $applyJobID = $row['applyJobID'];
        $gender = $row['gender'];
        $email = $row['email'];
        $contactNo = $row['contactNo'];
        $dob = $row['dob'];
        $address = $row['address'];
        $yearOfExperience = $row['yearOfExperience'];
    }
}

if(isset($_POST['update'])){
    $name = $_POST['name'];
    $applyJobID = $_POST['applyJobID'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $contactNo = $_POST['contactNo'];
    $dob = $_POST['dob'];
    $address = $_POST['address'];
    $yearOfExperience = $_POST['yearOfExperience'];

    $mysqli->query("UPDATE applyjob SET name='$name',applyJobID='$applyJobID', gender='$gender', email='$email', contactNo='$contactNo', dob='$dob', address='$address', yearOfExperience='$yearOfExperience' WHERE id=$id") or die($mysqli->error);

    $_SESSION['message'] = "Record has been updated!";
    $_SESSION['msg_type'] = "warning";

    header("name: process2.php");
}
