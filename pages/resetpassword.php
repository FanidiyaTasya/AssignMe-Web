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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/forgotPass-style.css">

    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

</head>
<body>
    <div class="form">
        <i class="fas fa-lock fa-3x" style="color: #363F71;"></i>
        <h3>Create New Password</h3>
        <p class="form-description">Enter the OTP sent to your email address to verify your identity.</p>

        <form method="POST" action="../function/resetController.php">
            <div class="form-group">
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <!-- <i class="fas fa-key"></i> -->
                    <input type="password" class="form-control is-valid" id="password" name="password" required>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div>

                <div class="mb-3">
                    <label for="confirmPass" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control is-invalid" id="confirmPass" name="confirmPassword" aria-describedby="validationServer05Feedback" required>
                    <div id="validationServer05Feedback" class="invalid-feedback">
                        Passwords do not match.
                    </div>
                </div>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block">Reset Password</button>
            </div>
        </form>

        <div class="back-to-login">
            <a href="../pages/ForgotPass.php"> < Forgot password</a>
        </div>
    </div>
</body>
</html>