<?php
  session_start();
  if(isset($_POST['post-status']) and !empty($_POST['status'])){
    require_once('connection.php');
    $username = $_SESSION['id'];

    $status = $_POST['status'];
    $date = date("G:i, d M y");
    $file = $_FILES['mypic'];
    $fileName = $file['name'];
    $fileTmpName = $file['tmp_name'];
    $fileSize = $file['size'];
    $fileError = $file['error'];
    $fileType = $file['type'];
    if($fileError == 0){

      $fileExt = explode('.', $fileName);
      $fileActualExt = strtolower(end($fileExt));

      $allowed = array('jpg', 'jpeg', 'png', 'bmp');

      if (in_array($fileActualExt, $allowed)) {
        if ($fileError === 0) {
          if ($fileSize < 9999999999) {
            $newFileName = uniqid("post", false).'.'.$fileActualExt;
            $fileDestination = 'uploads/'.$newFileName;
            move_uploaded_file($fileTmpName, $fileDestination);
            $query = "INSERT INTO posts (username, postdate, status, postpic) VALUES ('$username', '$date', '$status', '$fileDestination')";
            $dbresult = $db->query($query) or die($db->error);
            header('Location: index.php?content=profile');
          } else{
            echo "Your file is too big";
          }
        } else{
          echo "There was an error uploading your file!";
        }
      } else{
        echo "You cannot upload files of this type!";
      }
    } else{
      $query = "INSERT INTO posts (username, postdate, status) VALUES ('$username', '$date', '$status')";
      $dbresult = $db->query($query) or die($db->error);
      header('Location: index.php?content=profile');
    }

  }
?>
