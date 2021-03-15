<?php
  require_once('connection.php');
  $username = $_SESSION['id'];

?>
<body>
  <div class="inbox-container">
    <p id="update-header">
        Messages
    </p><br>
    <div class="inbox-wrap">
      <p id="list-friends"> List of Friends</p>
      <br>
      <div id='search-result'>
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
      <br>
    </div>
    <br>
    <form class="frm-indox" action="index.html" method="post">
      <div class="message-area">
        <textarea name="message" rows="2" placeholder="Type a message"></textarea>
        <button type="submit" name="button">Send</button>
      </div>
    </form>
  </div>
</body>
