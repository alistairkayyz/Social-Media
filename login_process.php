<?php
  require_once('connection.php');
  $username = $psw = "";

  $username = $_POST['uname'];
  $password = $_POST['pword'];

    $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $dbresult = $db->query($query);

    if(mysqli_num_rows($dbresult) > 0){

      while($row = $dbresult->fetch_assoc()){
        $username = $row['username'];
        session_start();
        $_SESSION['id'] = $username;
      }
        header('Location: index.php');
    }
    else {
      echo "Invalid Username or Password!";
    }
?>
