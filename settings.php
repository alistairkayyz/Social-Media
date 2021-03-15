<?php
  require_once('connection.php');
  $username = $_SESSION['id'];
  $query = "SELECT * FROM profiles WHERE username='$username'";
  $query2 = "SELECT * FROM moreinfo WHERE username='$username'";

  $dbresult = $db->query($query) or die($db->error);
  $dbresult2 = $db->query($query2) or die($db->error);

  $row = mysqli_num_rows($dbresult);
  $row2 = mysqli_num_rows($dbresult2);

  // profiles table infomation
  if($row){
    $row = $dbresult->fetch_assoc();
    $name = $row['name'];
    $surname = $row['surname'];
    $dob = $row['birthdate'];
    $gender = $row['gender'];
    $address = $row['address'];
    $city = $row['city'];
    $phone = $row['phone'];
    $email = $row['email'];
  }else{
    $name = $surname = $dob = $gender = $address = $city = $phone = $email = "";
  }

  //moreinfo table information
  if($row2){
    $row2 = $dbresult2->fetch_assoc();
    $bio = $row2['bio'];
    $job = $row2['job'];
    $employer = $row2['employer'];
  }else{
    $bio = $job = $employer = "";
  }
?>

<body>
  <div class="settings-container">
    <p id="update-header">
        Update Profile
    </p><br>
    <!--Register form----------------->
    <form id="update" class="update-pro" method="post" action="index.php?content=settings_process">

        <input type="text" placeholder="First Name" value="<?php echo $name; ?>" name="name" required>
        <br>
        <input type="text" placeholder="Last Name" value="<?php echo $surname; ?>" name="surname" required>
        <br>
        <input type="date" placeholder="Date of birth" value="<?php echo $dob; ?>" name="date" required>
        <br>
        <select value="<?php echo $gender; ?>" name="gender" required>
          <option disabled selected value="">Gender</option>
          <option value="Male">Male</option>
          <option value="Female">Female</option>
        </select>
        <br>
        <input type="text" placeholder="Line address" value="<?php echo $address; ?>" name="address">
        <br>
        <input type="text" placeholder="City" value="<?php echo $city; ?>" name="city">
        <br>
        <input type="tel" placeholder="Cellphone" value="<?php echo $phone; ?>" name="phone">
        <br>
        <input type="email" placeholder="Email address" value="<?php echo $email; ?>" name="email" required>
        <br>
        <textarea placeholder="Bio" rows="4" name="bio"><?php echo $bio; ?></textarea>
        <br>
        <input type="text" placeholder="Job" value="<?php echo $job; ?>" name="job">
        <br>
        <input type="text" placeholder="Employer" value="<?php echo $employer; ?>" name="employer">

        <p id="change-password">Change Password</p>
        <input type="password" placeholder="New Password" name="password" >
        <p id="hint">Your password must be at least 6 characters long and cannot contain whitespace.</p>
        <input type="password" placeholder="Confirm Password" name="checkpassword" >
        <br>
        <input type="submit" value="Update" name="update" class="form-btn">


  </div>
</body>
