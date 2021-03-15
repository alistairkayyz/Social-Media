<?php
  require_once('connection.php');
  $name = $surname = $dob = $gender = "";
  $address = $city = $phone = $email = "";
  $username = $password = $checkpassword = "";

  $name = $_POST['name'];
  $surname = $_POST['surname'];
  $dob = $_POST['date'];
  $gender = $_POST['gender'];
  $address = $_POST['address'];
  $city = $_POST['city'];
  $phone = $_POST['phone'];
  $email = $_POST['email'];
  $username = $_POST['username'];
  $password = $_POST['password'];
  $checkpassword = $_POST['checkpassword'];

  //check if user exists
  $query = "SELECT * FROM users WHERE username='$username'";
  $query2 = "SELECT * FROM profiles WHERE username='$username'";

  $dbresults = $db->query($query);
  $dbresults2 = $db->query($query2);
  $row = $dbresults->fetch_array(MYSQLI_ASSOC);
  $row2 = $dbresults2->fetch_array(MYSQLI_ASSOC);

  if(mysqli_num_rows($dbresults) > 0 or mysqli_num_rows($dbresults2) > 0){
      echo "<p>User already exists!</p>";
      $db->close();
  }
  elseif($password != $checkpassword){
    echo "<p>Password does not match!</p>";
    $db->close();
  }
  elseif($username == ""){
    echo "<p>Username is empty!</p>";
    $db->close();
  }
  else{
    $query2 = "INSERT INTO users VALUES ('$username', '$password')";
    $dbresults = $db->query($query2);

    //add new profile
    $query3 = "INSERT INTO profiles (username, name, surname, birthdate, gender, address, city, phone, email) VALUES ('$username', '$name','$surname','$dob','$gender','$address','$city','$phone','$email')";
    $dbresults2 = $db->query($query3);

    //add username to moreinfo table
    $query4 = "INSERT INTO moreinfo (username, dp) VALUES ('$username', '0')";
    $dbresults3 = $db->query($query4);
    $db->close();

    if($dbresults && $dbresults2){
      header('Location: login.php');
    }else
      echo "Error: " .$query2 ." ".$query3;
  }
?>
