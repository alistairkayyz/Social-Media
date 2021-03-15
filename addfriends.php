<?php
  session_start();
  require_once('connection.php');

  // send friend request
  if (isset($_GET['addfriend']) and isset($_GET['id'])) {
    $userOne = $_GET['id'];
    $userTwo = $_GET['addfriend'];
    $sql = "INSERT INTO friends (userOne, userTwo, status) VALUES ('$userOne', '$userTwo', 0)";
    $results = $db->query($sql);
    header('Location: index.php?content=search&Added');
  }

  // accept friend request
  if (isset($_GET['accept']) and isset($_GET['id']) and isset($_GET['status'])) {
    $user1 = $_GET['id'];
    $user2 = $_GET['accept'];
    $status = $_GET['status'];
    $sql = "UPDATE friends SET status = '$status' WHERE userOne = '$user1' AND userTwo = '$user2' OR userOne = '$user2' AND userTwo = '$user1'";
    $results = $db->query($sql);
    header('Location: index.php?content=search&Cancelled');
  }

  // canel friend request or unfriend
  if (isset($_GET['cancel']) and isset($_GET['id'])) {
    $user1 = $_GET['id'];
    $user2 = $_GET['cancel'];
    $sql = "DELETE FROM friends WHERE userOne = '$user1' AND userTwo = '$user2' OR userOne = '$user2' AND userTwo = '$user1'";
    $results = $db->query($sql);
    header('Location: index.php?content=search&Cancelled');
  }



?>
