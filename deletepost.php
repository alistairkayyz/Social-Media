<?php
  session_start();
  require_once('connection.php');

  $postid = $_GET['pid']; // post ID
  $query = "DELETE FROM posts WHERE postid = '$postid'";
  $dbresult = $db->query($query) or die($db->error);

  $query2 = "DELETE FROM likes WHERE postid = '$postid'";
  $dbresult2 = $db->query($query2) or die($db->error);
  
  $query3 = "DELETE FROM comments WHERE postid = '$postid'";
  $dbresult3 = $db->query($query3) or die($db->error);
  header("Location: index.php?content=profile");
?>
