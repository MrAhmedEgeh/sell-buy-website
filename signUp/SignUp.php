<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"  crossorigin="anonymous">
    <link href="../css Files/style.css" rel="stylesheet">
    <link href="../css Files/product.css" rel="stylesheet" type="text/css"/>

</head>
<body class="signu-b">
    <?php
    include '../Navbar/Navbar.php';
    ?>
    <div id="signUp">
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="container-sign" class="">
                        <div class="company-container">
                        <form id="company">
                        <h2>Sign Up a company</h2>
                        <UL class="error">
                            </UL>
                            <label for="name">Company Name:</label>
                            <input type="text" id="name" >

                            <label for="email">Email:</label>
                            <input type="email" id="email" >

                            <label for="username">Username:</label>
                            <input type="text" id="username" >

                            <label for="password">Password:</label>
                            <input type="password" id="password">

                            <input type="submit" onclick="company()" id="submit" value="submit">
                        </form>
                        </div>
                        <div class="user-container">
                        <form id="users">
                        <h2>Sign Up a user</h2>
                        <UL class="errors">
                            </UL>
                            <label for="email">Email:</label>
                            <input type="email" id="user-email" require>

                            <label for="username">Username:</label>
                            <input type="text" id="user-username" require>

                            <label for="pass">Password:</label>
                            <input type="password" id="user-pass" require>

                            <input type="submit" onclick="user()" id="submit" value="submit">
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="signUp.js" type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"  crossorigin="anonymous"></script>
</body>
</html>

<!--
                            <form id="signUp-form" class="form" method="post">
                            <h3  class="text-center text-info">Sign Up</h3>
                            <UL class="error">
                            </UL>
                            <div class="form-group">
                                <label for="email" class="text-info">Email:</label><br>
                                <input type="email" name="email" id="email" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="username" class="text-info">Username:</label><br>
                                <input type="text" name="username" id="username" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Password:</label><br>
                                <input type="password" name="password" id="password" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="remember-me" class="text-info"><span>Remember me</span> <span><input id="remember-me" name="remember-me" type="checkbox"></span></label><br>
                                <input id="sub-btn" type="submit" name="submit" class="btn btn-info btn-md" value="submit">
                            </div>
                            <div id="register-link" class="text-right">
                                <a href="http://localhost/InvMGMT/signIn/SignIn.php" class="text-info">Already have an account? Login</a>
                            </div>
                        </form>
-->