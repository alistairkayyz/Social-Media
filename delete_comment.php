<?php
  session_start();
  require_once('connection.php');

  $commid = $_GET['cid']; // comment ID
  $query = "DELETE FROM comments WHERE commentid  = '$commid'";
  $dbresult = $db->query($query) or die($db->error);
  $query2 = "DELETE FROM likes WHERE postid = '$postid'";
  $dbresult2 = $db->query($query2) or die($db->error);
  header("Location: index.php?content=profile");
?>
