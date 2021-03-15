<!DOCTYPE html>
<html>
    <head>
        <title>Login or Register</title>
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
                    <div class="login-form">

                        <span id="header">
                            Signup To Connect
                        </span>
                        <!--Register form----------------->
                        <form id="register" class="my-form" method="post" action="register_process.php">

                            <input type="text" placeholder="First Name" name="name" class="field" required>
                            <input type="text" placeholder="Last Name" name="surname" class="field" required>
                            <input type="date" placeholder="Date of birth" name="date" class="field" required>
                            <select name="gender" required>
                              <option disabled selected value="">Gender</option>
                              <option value="Male">Male</option>
                              <option value="Female">Female</option>
                            </select>

                            <input type="text" placeholder="Line address" name="address" class="field" required>
                            <input type="text" placeholder="City" name="city" class="field" required>
                            <input type="tel" placeholder="Cellphone" name="phone" class="field" required>
                            <input type="email" placeholder="Email address" name="email" class="field" required>
                            <input type="text" placeholder="Username" name="username" class="field" required>
                            <input type="password" placeholder="Password" name="password" class="field" required>

                            <p id="hint">Your password must be at least 6 characters long and cannot contain whitespace.</p>

                            <input type="password" placeholder="Confirm Password" name="checkpassword" class="field" required>

                            <br>
                            <span class="tcs">
                                <input type="checkbox" name="terms" class="checkbox" required>
                                I accept the terms and conditions.<br>
                            </span>
                            <input type="submit" value="Signup" class="form-btn">

                            <p> ALREADY HAVE AN ACCOUNT?</P>

                            <a href="login.php">
                                <input type="button" value="Signin" class="form-btn">
                            </a>
                        </form>

                    </div>

            </div>
        </div>
    </body>

</html>
