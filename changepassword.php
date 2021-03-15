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
                <!--- Info --------------->
                <div class="info">
                    <div class="logo-nav">
                        <img src="icons/logo.png" class="login-logo">
                    </div>
                    <span class="slogan">
                        Connect helps you connect and communicate<br>with friends, customers and businesses.
                    </span>
                </div>

                <!--- Login form----------------->

                    <div class="login-form">
                    <span id="header">
                            Change Password
                        </span>
                        <!---change form----------------->
                        <form id="change-pw" class="my-form" method="post" action="changepassword_process.php">
                            <input type="text" placeholder="Username" name="username" required>
                            <input type="password" placeholder="New Password" name="password"required>
                            <p id="hint">Your password must be at least 6 characters long and cannot contain whitespace.</p>
                            <input type="password" placeholder="Confirm Password" name="checkpassword" required>
                            <input type="submit" value="Submit" class="form-btn">
                            <p><a href="login.php" class="reset-password">Back</a></p>
                        </form>

                    </div>

            </div>
        </div>
    </body>

</html>
