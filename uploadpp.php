<?php
  session_start();
  require_once('connection.php');
  $username = $_SESSION['id'];

  if (isset($_POST['changeImg'])) {
    $file = $_FILES['pfile'];
    $fileName = $_FILES['pfile']['name'];
    $fileTmpName = $_FILES['pfile']['tmp_name'];
    $fileSize = $_FILES['pfile']['size'];
    $fileError = $_FILES['pfile']['error'];
    $fileType = $_FILES['pfile']['type'];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg', 'jpeg', 'png', 'bmp');

    if (in_array($fileActualExt, $allowed)) {
      if ($fileError === 0) {
        if ($fileSize < 9999999999) {
          $newFileName = 'profile'.$username.'.'.$fileActualExt;
          $fileDestination = 'uploads/'.$newFileName;
          move_uploaded_file($fileTmpName, $fileDestination);
          $query = "UPDATE moreinfo SET dp = 1 WHERE username = '$username'";
          $dbresult = $db->query($query) or die($db->error);
          unset($_FILES['pfile']);
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


  }
?>
