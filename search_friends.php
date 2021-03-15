<?php
  session_start();
  require_once('connection.php');

   $searchValue = $_POST['find'];
   $sql = "SELECT username FROM profiles WHERE name = '$searchValue' OR surname = '$searchValue'";
   $dbresult = $db->query($sql) or die($db->error);
   $row = mysqli_num_rows($dbresult);
   if ($row) {
     while ($row = $dbresult->fetch_assoc()) {
       $results = $row['username'];
       header("Location:  index.php?content=search&results=$results");
     }
   } else{
     header('Location:  index.php?content=search&Failed');
   }

?>
