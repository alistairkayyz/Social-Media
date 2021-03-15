<?php
  session_start();
  require_once('connection.php');

  $postid = $_GET['pid'];
  $username = $_SESSION['id'];
  $comment = $_POST['comment'];
  $date = date("G:i, d M y");

  if (empty($comment)) {
    header("Location: index.php?content=profile");
  } else{
    $query2 = "INSERT INTO comments (postid, username, comment, ctime) VALUES('$postid', '$username', '$comment', '$date')" ;
    $dbresult = $db->query($query2) or die($db->error);
    header("Location: index.php?content=profile");
  }

?>
