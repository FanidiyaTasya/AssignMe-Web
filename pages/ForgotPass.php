<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AssignMe</title>

    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">

    <!-- Style CSS -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    
    <link rel="stylesheet" href="../assets/css/forgotPass-style.css">
    

    <!-- FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
</head>

<body>
    <div class="form">
        <i class="fas fa-lock fa-3x" style="color: #363F71;"></i>
        <h3>Forgot Password</h3>
        <p class="form-description">Enter your email address and we'll send you an email with instructions to reset your password.</p>

        <form action="../function/sendemailController.php" method="POST">
            <div class="form-group">
                <div class="input-group">
                    <i class="fas fa-envelope"></i>
                    <input type="email" id="email" name="email" placeholder="Enter your email" required autofocus>
                </div>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block">Submit</button>
            </div>
        </form>

        <div class="back-to-login">
            <!-- <span class="d-inline">Back to <a href="Login.php" class="d-inline text-decoration-none">Login</a></span> -->
            <a href="Login.php"> < Back to Login </a>
        </div>
    </div>
</body>

</html>