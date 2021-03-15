<body>
  <?php
    require_once('connection.php');
    $username = $_SESSION['id'];
    $query = "SELECT * FROM profiles WHERE username='$username'";
    $query2 = "SELECT * FROM moreinfo WHERE username='$username'";

    $dbresult = $db->query($query) or die($db->error);
    $dbresult2 = $db->query($query2) or die($db->error);

    $row = mysqli_num_rows($dbresult);
    $row2 = mysqli_num_rows($dbresult2);

    //Set left-menu name and surname
    if($row){
      $row = $dbresult->fetch_assoc();
      $name = $row['name'];
      $surname = $row['surname'];
    }else{
      $name = "Name";
      $surname = "Surname";
    }

    //Set left-menu job and employer
    if($row2){
      $row2 = $dbresult2->fetch_assoc();
      if(isset($row2['job'])){
        $job = $row2['job'];
      }else{
        $job = "";
      }
      if(isset($row2['employer'])){
        $employer = "at ".$row2['employer'];
      }else{
        $employer = "";
      }
    }else{
      $job = "";
      $employer = "";
    }

    // get profileid of the logged user
    $sqlid = "SELECT profileid FROM profiles WHERE username = '$username'";
    $resultid = $db->query($sqlid);
    $rowid = mysqli_num_rows($resultid);
    if ($rowid) {
      $rowid = $resultid->fetch_assoc();
      $loggedPID = $rowid['profileid'];
    }

    //getting the users number of friends
    $sqlNum = "SELECT * FROM friends WHERE (userOne = '$loggedPID' OR userTwo = '$loggedPID') AND status = 1";
    $myresults = $db->query($sqlNum);
    $rowNum = mysqli_num_rows($myresults);

    if ($rowNum) {
      $friends = $rowNum;
    } else{
      $friends = 0;
    }
  ?>

  <!--upload profile pic-->
  <?php
    $uploadedImg = "uploads/default.jpg";

    $queryImg = "SELECT * FROM moreinfo WHERE username = '$username'";
    $dbresultImg = $db->query($queryImg) or die($db->error);
    $rowImg = mysqli_num_rows($dbresult);

    if($rowImg){
      $myrow = $dbresultImg->fetch_assoc();
      if($myrow['dp'] == 1){
        $uploadedImg = "uploads/profile".$username.".jpg?".mt_rand();
      }
    }
  ?>

  <div class="top-left">
    <h2 class="heading-p">Profile</h2>
    <p class="profile-pic">
      <img src="<?php echo $uploadedImg; ?>" id="pp">
      <br>
      <span class="profile-name">
        <?php echo $name.' '.$surname; ?>
      </span>
      <br>
      <span class="profile-job">
        <?php echo $job.' '.$employer; ?>
      </span>
    </p>

    <p class="total-friends">
      You have <?php echo $friends; ?> friends
    </p>
    <p class="profile-view">
      <a href="index.php?content=profile">View Profile</a>
    </p>
  </div>
  <div class="bottom-left">
    <h2 class="heading">Notifications</h2>
    <p class="notification-list">
      <a href="#">
        <span id="notification-txt">
          Freedom Candy liked your post.
        </span>
      </a>
      <br>
      <span id="notification-time">
        2 minutes ago
      </span>
    </p>
    <p class="notification-list">
      <a href="#">
        <span id="notification-txt">
          Nhlanhla Khosa and 3 othes commented your post.
        </span>
      </a>
      <br>
      <span id="notification-time">
        10 minutes ago
      </span>
    </p>
    <p class="notification-list">
      <a href="#">
        <span id="notification-txt">
          Faith Moloto and 13 othes liked your post.
        </span>
      </a>
      <br>
      <span id="notification-time">
        2 hours ago
      </span>
    </p>
    <p class="notification-list">
      <a href="index.php?content=notification">
        <span id="notification-link">
          See more
        </span>
      </a>
    </p>

  </div>
</body>
