<?php
require_once('connection.php');
$username = $_SESSION['id'];
$sqlid = "SELECT profileid FROM profiles WHERE username = '$username'";
$resultid = $db->query($sqlid);
$rowid = mysqli_num_rows($resultid);
if ($rowid) {
  $rowid = $resultid->fetch_assoc();
  $loggedPID = $rowid['profileid'];
}

?>
<body>
  <div class='search-container'>
    <div class='search-wrap'>
      <p id="update-header">
          Find Friends
      </p><br>
      <form class="find-friends" action="search_friends.php" method="post">
        <p id="search-box">
            <input type="text" placeholder="Search a friend by NAME or SURNAME" name="find" required>
            <button type="submit" name="search">Find</button>
        </p>
      </form>
      <br>

      <?php

        // filter search friends
        if (isset($_GET['results'])) {
          $searchValue = $_GET['results'];
          $query = "SELECT t1.profileid, t1.name, t1.surname, t2.job, t2.employer, t2.username FROM profiles AS t1, moreinfo AS t2 WHERE t1.username = '$searchValue' AND t2.username = '$searchValue'";
          $dbresult = $db->query($query) or die($db->error);
          $row = mysqli_num_rows($dbresult);
          if ($row) {
            while ($row = $dbresult->fetch_assoc()) {
              $profId = $row['profileid'];
              $username = $row['username'];
              $name = $row['name'];
              $surname = $row['surname'];
              $job = $row['job'];
              $employer = " at ".$row['employer'];

              if ($username != $_SESSION['id']) {
                //setting profile pic
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

                echo "<div id='search-result'>
                  <div id='friend-dp'>
                    <img src='$uploadedImg' id='friend-pp'>
                  </div>
                  <div id='friend-info'>
                    <a href='index.php?content=profile&profid=$profId'> $name $surname </a>
                    <br>
                    <span id='friend-career'> $job $employer </span>
                  </div>
                  <br>
                  <p id='friend-request'>
                    <a href='add>Add</a>
                  </p>
                </div>

                ";
              }
            }
          } else{
            echo "<span id='num-likes'>No users found!</span>";
          }

        }

        // search all friends and display them
        else{
          $query = "SELECT t1.profileid, t1.name, t1.surname, t2.job, t2.employer, t2.username FROM profiles AS t1, moreinfo AS t2 WHERE t1.username = t2.username";
          $dbresult = $db->query($query) or die($db->error);
          $row = mysqli_num_rows($dbresult);
          if ($row) {
            while ($row = $dbresult->fetch_assoc()) {
              $profId = $row['profileid'];
              $username = $row['username'];
              $name = $row['name'];
              $surname = $row['surname'];
              $job = $row['job'];
              $employer = " at ".$row['employer'];

              if ($username != $_SESSION['id']) {
                //setting profile pic
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

                echo "<div id='search-result'>
                  <div id='friend-dp'>
                    <img src='$uploadedImg' id='friend-pp'>
                  </div>
                  <div id='friend-info'>
                    <a href='index.php?content=profile&profid=$profId'> $name $surname </a>
                    <br>
                    <span id='friend-career'> $job $employer </span>
                  </div>
                  <br>";

                  //check for friend request
                  $query = "SELECT status, userOne, userTwo FROM friends WHERE userOne = '$loggedPID' AND userTwo = '$profId' OR userOne = '$profId' AND userTwo = '$loggedPID'";
                  $results = $db->query($query);
                  $row = mysqli_num_rows($results);

                  // display ADD button if no results found
                  if ($row == 0) {
                    echo "<p id='friend-request'>
                      <a href='addfriends.php?addfriend=$profId&id=$loggedPID'>Add</a>
                    </p>
                    ";
                  }
                  // display PENDING, ACCEPT and CANCEL if STATUS is 0
                  // display FRIENDS and UNFRIEND if STATUS is 1
                  elseif ($row > 0) {
                    $row = $results->fetch_assoc();
                    $status = $row['status'];
                    $userOne = $row['userOne'];
                    $userTwo = $row['userTwo'];

                    if ($status == 0 and $userOne == $loggedPID) {
                      echo "<p id='friend-request1'>
                      <a disabled>Pending</a>
                        <a href='addfriends.php?cancel=$loggedPID&id=$profId'>Cancel</a>
                      </p>
                      ";
                    } elseif ($status == 0 and $userTwo == $loggedPID) {
                      echo "<p id='friend-request1'>
                      <a href='addfriends.php?accept=$profId&id=$loggedPID&status=1'>Accept</a>
                        <a href='addfriends.php?cancel=$loggedPID&id=$profId'>Cancel</a>
                      </p>
                      ";
                    } else{
                      echo "<p id='friend-request1'>
                      <a disabled>Friends</a>
                        <a href='addfriends.php?cancel=$loggedPID&id=$profId'>Unfriend</a>
                      </p>
                      ";
                    }
                  }


                echo"
                </div>

                ";
              }
            }
          } else{
            echo "<span id='num-likes'>No users found!</span>";
          }
        }


      ?>

    </div>
  </div>
</body>
