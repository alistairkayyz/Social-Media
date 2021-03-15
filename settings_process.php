<?php
  if (isset($_POST['update'])) {
    require_once('connection.php');
    $username = $_SESSION['id'];
    $name = $surname = $dob = $gender = $address = "";
    $city = $phone = $email = $password = $checkpassword =  "";
    $bio = $job = $employer = "";

    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $dob = $_POST['date'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $checkpassword = $_POST['checkpassword'];
    $bio = $_POST['bio'];
    $job = $_POST['job'];
    $employer = $_POST['employer'];


    //check if user exists
    $query = "SELECT * FROM profiles WHERE username = '$username'";
    $query2 = "SELECT * FROM moreinfo WHERE username = '$username'";
    $dbresult = $db->query($query) or die($db->error);
    $dbresult2 = $db->query($query2) or die($db->error);
    $row = mysqli_num_rows($dbresult);
    $row2 = mysqli_num_rows($dbresult2);

    if($row and !$row2){
      // update profiles table
      $query3 = "UPDATE profiles SET name = '$name', surname = '$surname', birthdate = '$dob', gender = '$gender', address = '$address', city = '$city', phone = '$phone', email = '$email' WHERE username = '$username'";
      $dbresults = $db->query($query3);

      // insert moreinfo table
      $query4 = "INSERT INTO moreinfo (username, bio, job, employer) VALUES ('$username', '$bio', '$job', '$employer')";
      $dbresults2 = $db->query($query4);

    }
    elseif($row and $row2){
      // update profiles table
      $query3 = "UPDATE profiles SET name = '$name', surname = '$surname', birthdate = '$dob', gender = '$gender', address = '$address', city = '$city', phone = '$phone', email = '$email' WHERE username = '$username'";
      $dbresults = $db->query($query3);

      // update moreinfo table
      $query4 = "UPDATE moreinfo SET bio = '$bio', job = '$job', employer = '$employer' WHERE username = '$username'";
      $dbresults2 = $db->query($query4);

      echo "<div class='updated'>";
      echo "
          <p  id='confirm-update'>Profile Updated Successfully!</p>
          <a href='index.php?content=settings' id=''>Back</a>
      ";
      echo "</div>";

    }
    else{
      echo "<p>Update Failed!</p>";
      $db->close();
    }
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
      echo "<div class='updated'>";
      echo "
          <p  id='confirm-update'>Profile Updated Successfully!</p>
          <a href='index.php?content=settings' id=''>Back</a>
      ";
      echo "</div>";
    }
    else{
      echo "<p>User does not exists!</p>";
      $db->close();
    }
  }

?>
