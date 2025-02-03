<?php
  require_once 'config.php';
  $mysqli = new mysqli('localhost', 'root', 'password', 'jobportal') or die(mysqli_error($mysqli));

$id = 0;
$update = false;
$blacklist ='';

  if (isset($_POST['query'])) {
    $inpText = $_POST['query'];
    $sql = 'SELECT blacklist FROM blist WHERE blacklist LIKE :blacklist'; 
    $stmt = $conn->prepare($sql);
    $stmt->execute(['blacklist' => '%' . $inpText . '%']);
    $result = $stmt->fetchAll();

    if ($result) {
      foreach ($result as $row) {
        echo '<a href="#" class="list-group-item list-group-item-action border-1">' . $row['blacklist'] . '</a>';
      }
    } else {
      echo '<p class="list-group-item border-1">No Record</p>';
    }
  }

  
?>