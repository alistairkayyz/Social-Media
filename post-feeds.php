<?php
  require_once('connection.php');
  $username = $_SESSION['id'];

?>

<body>
  <div class="profile-container">
    <?php
      //allow only the logged in user to change the profile pic
      if ($_SESSION['id'] == $username) {

        // Write a post if user id = session id
        echo "
        <form id='create-post' action='post_status.php' method='post' enctype='multipart/form-data'>
          <div class='post-container'>
            <div class='post-section'>
              <span id'user-dp'>
                <img src='$uploadedImg' id='status-pp'>
              </span>
              <span id='status-area'>
                <textarea name='status' placeholder='What is on your mind?' rows='2' id='mystatus' required></textarea>
              </span>
              <br>
              <span id='sta'>
                <input type='file' class='custom-file-input' name='mypic'>
              </span>
              <span id='status-btn'>
                <button type='submit' name='post-status'>Post</button>
              </span>
            </div>
          </div>
        </form>
        ";
      }
    ?>
    <!-- Post Feed -->
    <div class="feed-post">

        <?php
        // retrieve post info to post it


        $queryPost = "SELECT t1.postid, t1.username, t1.postdate, t1.status, t1.postpic, t2.name, t2.surname FROM posts AS t1, profiles AS t2 WHERE t1.username = t2.username ORDER BY postid DESC";
        $resultPost = $db->query($queryPost) or die($db->error);
        $rowPost = mysqli_num_rows($resultPost);

        if ($rowPost > 0) {
          while($rowP = $resultPost->fetch_assoc()){
            $username = $rowP['username'];
            $fname = $rowP['name'];
            $lname = $rowP['surname'];
            $postid = $rowP['postid'];
            $postdate = $rowP['postdate'];
            $status = $rowP['status'];
            $postpic = $rowP['postpic'];
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

            echo "<form class='frm-feed' action='addcomments.php?pid=$postid' method='post'>
            <div class='posted-feed'>
                <div id='poster-pic'>
                  <img src='$uploadedImg' id='status-pp'>
                </div>
                <br>
                <div id='poster-info'>
                  <span id='poster-name'> $fname $lname </span><br>
                  <span id='time-posted'><img src='icons/time.png' id='icon-time'> $postdate </span><br>
                </div>
                <br>";
                //allow only the logged in user to delete
                if ($_SESSION['id'] == $username) {
                  echo "<span id='delete-option'>
                  <a href='deletepost.php?pid=$postid'><img src='icons/trash.png' id='delete-post'></a>
                </span>";
              }
              echo " <br>
            </div>
            ";

            // put status
            echo "<div class='my-post'>

                <span id='feed-posted'>
                  <span id='feed-text'> $status </span>
                  <br>";

            //put pic if uploaded
            if($postpic != ""){
              echo "      <span id='feed-pic'>
                    <img src='$postpic' id='posted-pic'>
                  </span>
                  <br>

            ";}
            // number of likes
            $querylikes = "SELECT * FROM likes WHERE postid = '$postid'";
            $resultlikes = $db->query($querylikes) or die($db->error);
            $rowLikes = mysqli_num_rows($resultlikes);
            if ($rowLikes) {
              $numlikes = 'Likes: '. $rowLikes;
            } else{
              $numlikes = 'No Likes';
            }
            // number of likes
            $queryComm = "SELECT * FROM comments WHERE postid = '$postid'";
            $resultComm = $db->query($queryComm) or die($db->error);
            $rowComm = mysqli_num_rows($resultComm);
            if ($rowComm) {
              $numComm = 'Comments: '.$rowComm;
            } else{
              $numComm = 'No Comments';
            }

            // get friends that liked this post
            $queryliked = "SELECT t1.username, t2.name, t2.surname FROM likes AS t1, profiles AS t2 WHERE t1.postid = '$postid' AND t1.username = t2.username";
            $resultliked = $db->query($queryliked) or die($db->error);
            $rowLiked = mysqli_num_rows($resultliked);

            echo "<p id='num-likes-comments'>
              <a href='addlikes.php?pid=$postid'><img src='icons/like.png' id='like-post'></a><br>
              <span id='num-likes'>$numlikes</span>
              <span id='num-comments'>$numComm</span>
            </p>";
            if ($rowLiked > 0) {
              echo " <p id='friends-liked'>Liked by: ";
                while($liked = $resultliked->fetch_assoc()){
                  $nameLiked = $liked['name'];
                  $surnameLiked = $liked['surname'];
                  echo "$nameLiked $surnameLiked |";
              }
              echo "</p>";
            } else{
              echo "<p id='friends-liked'>No one liked this post</p>";
            }
            echo "<p id='comment-area'>
                <textarea placeholder='Type a comment' name='comment' rows='1'></textarea>
                <br>
                <button id='btn-comment' type='submit' >Comment</button>

              </p>
              <br>";

              // get the comments
              $queryc = "SELECT t1.commentid, t1.postid, t1.comment, t1.ctime, t2.name, t2.surname FROM comments AS t1, profiles AS t2 WHERE t1.postid = '$postid' AND t1.username = t2.username";
              $resultc = $db->query($queryc) or die($db->error);
              $rowc = mysqli_num_rows($resultc);

              if ($rowc > 0) {
                  while($rowc = $resultc->fetch_assoc()){
                    $commentid = $rowc['commentid'];
                    $postId = $rowc['postid'];
                    $comment = $rowc['comment'];
                    $ctime = $rowc['ctime'];
                    $namec = $rowc['name'];
                    $surnamec = $rowc['surname'];
                    echo "<div id='comment-section'>
                      <div id='friends-comments'>
                        <p id='commenter-name'> $namec $surnamec</p>
                        <p class='comment'> $comment </p>
                        <p id='time-commented'>
                          <img src='icons/time.png' id='icon-time'> $ctime
                        </p>";
                        //allow only the logged in user to delete
                        if ($_SESSION['id'] == $username) {
                          echo "<div>
                            <a href='delete_comment.php?cid=$commentid'>DELETE COMMENT</a>
                          </div>";
                        }
                      echo "</div>
                    </div>";
                }
              } else{
                echo "<p id='friends-liked'>No one commented on this post</p>";
              }

              echo"
            </span>
        </div>
        </form>
              ";
            }

          } else{
            echo "<h2 id='feed-text'> You have no posts</h2>";
          }
        ?>
    </div>




  </div>
</body>
