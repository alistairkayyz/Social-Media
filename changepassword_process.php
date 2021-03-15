<?php
  require_once('connection.php');
  $name = $surname = $password = $checkpassword = "";

  $username = $_POST['username'];
  $password = $_POST['password'];
  $checkpassword = $_POST['checkpassword'];

  //check if user exists
  $query = "SELECT * FROM users WHERE username='$username'";
  $dbresults = $db->query($query);
  $row = $dbresults->fetch_array(MYSQLI_ASSOC);

  if($password != $checkpassword){
    echo "<p>Password does not match!</p>";
    $db->close();
  }
  elseif($username == ""){
    echo "<p>Username is empty!</p>";
    $db->close();
  }
  elseif(mysqli_num_rows($dbresults) > 0){
    $query = "UPDATE users SET password = '$password' WHERE username = '$username'";
    $dbresults = $db->query($query);
    $db->close();
    header('Location: login.php');
  }
  else{
    echo "<p>User does not exists!</p>";
    $db->close();
  }
?>
