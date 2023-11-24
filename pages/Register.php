<?php 
session_start();
require_once __DIR__ . ('/../function/RegisterController.php');

if (isset($_POST['submit'])) {
    $register = new RegisterController;
    $message = $register->getData($_POST['username'], $_POST['email'], $_POST['password'], $_POST['confirm-password']);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    
    <!-- STYLE -->
    <link rel="stylesheet" href="../assets/css/login-regist-style.css">
    
    <!-- FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    
</head>
<body>
    <section class="common">
        <div class="common-box">
            <div class="common-container">

                <div class="common-left">
                    <div class="header">
                        <h1>Create an Account</h1>
                        <p>Fill in the following details to register.</p>
                    </div>

                    <?php
					if(isset($_POST['submit'])){
						echo "<div class='alert alert-danger text-center' role='alert'> '".$register->message."'</div>";
					}
				    ?>

                    <form class="common-form" method="POST">
                        <label for="username" class="form-label">Name</label>
                        <input type="text" class="form-control" name="username" id="username" placeholder="Enter your name">

                        <label for = "email" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="Enter your email">

                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" id="password" placeholder="Enter your password">

                        <label for="confirm-password" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" name="confirm-password" id="confirm-password" placeholder="Confirm your password">

                        <button class="common-button" type="submit" name="submit">Sign Up</button>
                        <button class="common-button-google">
                            <img src="../assets/img/google.png" width="20" height="20" alt="">  Sign Up With Google</button>
                        
                        <div class="text-center">
                            <span class="d-inline">Already have an account? <a href="Login.php" class="d-inline text-decoration-none">Sign In</a></span>
                        </div>
                    </form>
                </div>

                <div class="common-right">
                    <img src="../assets/img/login.png" alt="">
                </div>
                
            </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
