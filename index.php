<?php
    session_start();
    if(isset($_SESSION['id'])){
    $username = $_SESSION['id'];
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Connect</title>
        <link rel="stylesheet" href="index.css">
    </head>
    <body>
        <div class="my-nav">
            <?php include ("navigation.php"); ?>
        </div>
        <section class="index-container">
          <div class="index-wrap">
            <div class="left-menu">
              <?php include ("leftmenu.php"); ?>
            </div>
            <main>
                <?php
                // check if content is set else it loads posts 
                    if(isset($_REQUEST['content'])){
                        include($_REQUEST['content']. ".php");
                    }else{
                        include("post-feeds.php");
                    }
                ?>
            </main>
            <div class="right-menu">
              <?php include ("rightmenu.php"); ?>
            </div>
          </div>
        </section>
        <footer>
            <?php include("footer.inc.php"); ?>
        </footer>
    </body>
</html>
<?php
    }else{
        header("Location: login.php");
    }
?>
