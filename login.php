<!DOCTYPE html>
<html>
    <head>
        <title>Login or Register</title>
        <script src="jquery-3.5.1.min.js"></script>


        <link rel="stylesheet" href="login.css">
    </head>
    <body>
        <div class="login-container">
            <div class="login-wrapper">
                <!-- Info --------------->
                <div class="info">
                    <div class="logo-nav">
                        <img src="icons/logo.png" class="login-logo">
                    </div>
                    <span class="slogan">
                        Connect helps you connect and communicate<br>with friends, customers and businesses.
                    </span>
                </div>

                <!-- Login form----------------->

                    <div class="login-form">

                        <span id="header">
                            Signin To Connect
                        </span>
                        <form id="login" method="post" action="login_process.php">
                            <input type="text" placeholder="Username" name="uname" required>
                            <input type="password" placeholder="Password" name="pword" required>
                            <br>
                            <a class="reset-password" href="changepassword.php" onClick="changePw()">
                              Forgotten password?
                            </a><br>

                            <input type="submit" value="Signin" class="form-btn">
                            <p> DON'T HAVE AN ACCOUNT?</P>
                            <a href="register.php">
                                <input type="button" value="Signup" class="form-btn">
                            </a>
                        </form>

                    </div>

            </div>
        </div>
    </body>

</html>
