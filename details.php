<?php
  require_once 'config.php';

  if (isset($_POST['submit'])) {
    $jobpost = $_POST['search'];
    $sql = 'SELECT * FROM findjob WHERE jobdescription = :jobdescription ';
    $stmt = $conn->prepare($sql);
    $stmt->execute(['jobdescription' => $jobpost]);
    $row = $stmt->fetch();
  } else {
    header('location: .');
    exit();
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Details</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.1/css/bootstrap.min.css">
</head>
<br><br>
<body class="bg-dark">
  <div class="container">
    <div class="row mt-8">
      <div class="col-8 mx-auto" >
        <div class="card shadow ">
          <div class="card-header">
            <h1 style="text-align:center">Job ID: <?= $row['ID'] ?></h1>
          </div>
          <div class="card-body">
            <h4><b>Advertiser Username :</b> <?= $row['Username'] ?></h4>
            <h4><b>Working area :</b> <?= $row['workingarea'] ?></h4>
            <h4><b>Job type :</b> <?= $row['jobtype'] ?></h4>
            <h4><b>Paid Salary :</b> <?= $row['paidsalary'] ?></h4>
            <h4><b>Working Hours :</b> <?= $row['workinghours'] ?></h4>
            <h4><b>Job Description :</b> <?= $row['jobdescription'] ?></h4>
             <br>
             <form action="apply.php" type="float:right">
             <a type="submit" name="submit" value="Apply" class="btn btn-info rounded-20" href="apply.php?applyid=<?php echo $row['ID']; ?>" >Apply</a>
             </form>
          </div>   
        </div>
      </div>
    </div>
  </div>

</body>

</html>