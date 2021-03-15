<?php
  session_start();
  require_once('connection.php');

  $postid = $_GET['pid']; // post ID
  $username = $_SESSION['id'];
  $date = date("G:i, d M y");
  $query = "SELECT * FROM likes WHERE postid = '$postid' AND username = '$username'";
  $dbresult = $db->query($query) or die($db->error);
  $row = mysqli_num_rows($dbresult);
  if ($row) {
    $query2 = "DELETE FROM likes WHERE postid = '$postid' AND username = '$username'" ;
    $dbresult = $db->query($query2) or die($db->error);
    header("Location: index.php?content=profile");
  } else{
    $query2 = "INSERT INTO likes VALUES('$postid', '$username', '$date')" ;
    $dbresult = $db->query($query2) or die($db->error);
    header("Location: index.php?content=profile");
  }

?>
