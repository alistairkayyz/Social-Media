<?php
//create connection
$db = new mysqli("localhost", "user1", "password", "connect");

//check connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}
?>
