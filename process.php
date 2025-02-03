<?php

session_start();

$mysqli = new mysqli('localhost', 'root', 'password', 'jobportal') or die(mysqli_error($mysqli));

$id = 0;
$update = false;
$feedback ='';
$blacklist ='';

if(isset($_POST['submit'])){
    $feedback = $_POST['feedback'];

    $mysqli->query("INSERT INTO faq (feedback) VALUES('$feedback')") or 
    die($mysqli->error);

    $_SESSION['message'] = "Feedback has been submitted!";
    $_SESSION['msg_type'] = "success";

    header("location: adminfaq.php");
}

if(isset($_POST['submitadvertiser'])){
    $feedback = $_POST['feedback'];

    $mysqli->query("INSERT INTO faq (feedback) VALUES('$feedback')") or 
    die($mysqli->error);

    $_SESSION['message'] = "Feedback has been submitted!";
    $_SESSION['msg_type'] = "success";

    header("location: advertiserfaq.php");
}

if(isset($_POST['submitjobseeker'])){
    $feedback = $_POST['feedback'];

    $mysqli->query("INSERT INTO faq (feedback) VALUES('$feedback')") or 
    die($mysqli->error);

    $_SESSION['message'] = "Feedback has been submitted!";
    $_SESSION['msg_type'] = "success";

    header("location: jobseekerfaq.php");
}

if(isset($_POST['submitblacklist'])){
    $blacklist = $_POST['blacklist'];

    $mysqli->query("INSERT INTO blist (blacklist) VALUES('$blacklist')") or 
    die($mysqli->error);

    $_SESSION['message'] = "Blacklist has been submitted!";
    $_SESSION['msg_type'] = "success";

    header("location: adminblacklist.php");
}

if(isset($_POST['adverstisersubmitblacklist'])){
    $blacklist = $_POST['blacklist'];

    $mysqli->query("INSERT INTO blist (blacklist) VALUES('$blacklist')") or 
    die($mysqli->error);

    $_SESSION['message'] = "Blacklist has been submitted!";
    $_SESSION['msg_type'] = "success";

    header("location: advertiserblacklist.php");
}

if(isset($_POST['jobseekersubmitblacklist'])){
    $blacklist = $_POST['blacklist'];

    $mysqli->query("INSERT INTO blist (blacklist) VALUES('$blacklist')") or 
    die($mysqli->error);

    $_SESSION['message'] = "Blacklist has been submitted!";
    $_SESSION['msg_type'] = "success";

    header("location: jobseekerblacklist.php");
}

if(isset($_GET['deleted'])){
    $id = $_GET['deleted'];
    $mysqli->query("DELETE FROM faq WHERE id=$id") or die($mysqli->error());

    $_SESSION['message'] = "Feedback has been deleted!";
    $_SESSION['msg_type'] = "danger";

    header("location: adminfaq.php");
}

if(isset($_GET['reply'])){
    $id = $_GET['reply'];
    $update = true;
    $result = $mysqli->query("SELECT * FROM faq WHERE id=$id") or die($mysqli->error());
    if ($result){
        $row = $result->fetch_array();
        $feedback = $row['feedback'];
    }
}


if(isset($_POST['update'])){
    $id = $_POST['id'];
    $feedback = $_POST['feedback'];

    $mysqli->query("UPDATE faq SET feedback='$feedback' WHERE id=$id") or die($mysqli->error);

    $_SESSION['message'] = "Feedback has been replied!";
    $_SESSION['msg_type'] = "warning";

    header("location: adminfaq.php");
}
