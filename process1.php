<?php

session_start();

$mysqli = new mysqli('localhost', 'root', 'password', 'jobportal') or die(mysqli_error($mysqli));

$id = 0;
$update = false;
$username ='';
$jobtype ='';
$paidsalary ='';
$workinghours ='';
$workingarea ='';
$jobdescription ='';

if(isset($_POST['save'])){
    $username = $_POST['username'];
    $jobtype = $_POST['jobtype'];
    $paidsalary = $_POST['paidsalary'];
    $workinghours = $_POST['workinghours'];
    $workingarea = $_POST['workingarea']; 
    $jobdescription = $_POST['jobdescription'];

    $mysqli->query("INSERT INTO findjob (username, jobtype, paidsalary,workinghours,workingarea,jobdescription) VALUES('$username','$jobtype', '$paidsalary','$workinghours','$workingarea','$jobdescription')") or 
    die($mysqli->error);

    $_SESSION['message'] = "Record has been saved!";
    $_SESSION['msg_type'] = "success";

    header("jobdescription: process1.php");
}

if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    $mysqli->query("DELETE FROM findjob WHERE id=$id") or die($mysqli->error());

    $_SESSION['message'] = "Record has been deleted!";
    $_SESSION['msg_type'] = "danger";

    header("jobdescription: process1.php");
}

if(isset($_GET['edit'])){
    $id = $_GET['edit'];
    $update = true;
    $result = $mysqli->query("SELECT * FROM findjob WHERE id=$id") or die($mysqli->error());
    if ($result){
        $row = $result->fetch_array();
        $username = $row['username'];
        $jobtype = $row['jobtype'];
        $paidsalary = $row['paidsalary'];      
        $workinghours = $row['workinghours'];
        $workingarea = $row['workingarea'];
        $jobdescription = $row['jobdescription'];
    }
}

if(isset($_POST['update'])){
    $id = $_POST['id'];
    $username = $_POST['username'];
    $jobtype = $_POST['jobtype'];
    $paidsalary = $_POST['paidsalary']; 
    $workinghours = $_POST['workinghours'];
    $workingarea = $_POST['workingarea'];
    $jobdescription = $_POST['jobdescription'];

    $mysqli->query("UPDATE findjob SET username='$username',jobtype='$jobtype', paidsalary='$paidsalary', workinghours='$workinghours', workingarea='$workingarea', jobdescription='$jobdescription' WHERE id=$id") or die($mysqli->error);

    $_SESSION['message'] = "Record has been updated!";
    $_SESSION['msg_type'] = "warning";

    header("jobdescription: process1.php");
}
