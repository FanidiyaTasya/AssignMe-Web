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
        <i class="fa-solid fa-shield-halved fa-3x" style="color: #363F71;"></i>
        <h3>Create New Password</h3>
        <p class="form-description">Enter the OTP sent to your email address to verify your identity.</p>

        <form method="POST" action="../function/resetPassController.php" id="form">
            <div class="form-group">
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control " name="password" id="password" autofocus>
                    <div class="invalid-feedback" id="passwordError"></div>
                </div>

                <div class="mb-3">
                    <label for="confirmPass" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control " name="confirmPass" id="confirmPass">
                    <div class="invalid-feedback" id="confirmPassError"></div>
                </div>
            </div>

            <div class="form-group">
                <button type="submit" id="buttonReset" class="btn btn-primary btn-block">Reset Password</button>
            </div>
        </form>

        <div class="back-to-login">
            <a class="d-inline text-decoration-none" href="../pages/ForgotPass.php"> < Forgot Password</a>
        </div>
    </div>

    <script>
        document.getElementById('form').addEventListener('submit', function (event) {
            const passwordInput = document.getElementById('password');
            const confirmPassInput = document.getElementById('confirmPass');
            const passwordError = document.getElementById('passwordError');
            const confirmPassError = document.getElementById('confirmPassError');

            if (passwordInput.value.length < 8) {
                passwordInput.classList.add('is-invalid');
                confirmPassInput.classList.add('is-invalid');
                passwordError.textContent = 'Password must be at least 8 characters';
                confirmPassError.style.display = 'block';
                event.preventDefault(); // menghindari pengiriman formulir kl ada kesalahan
            } else if (passwordInput.value !== confirmPassInput.value) {
                passwordInput.classList.add('is-valid');
                confirmPassInput.classList.add('is-invalid');
                passwordError.textContent = '';  
                confirmPassInput.setCustomValidity('Password doesn\'t match!');
                confirmPassError.textContent = 'Password doesn\'t match!';
                confirmPassError.style.display = 'block';
                event.preventDefault(); 
            } else {
                passwordInput.classList.remove('is-invalid');
                confirmPassInput.classList.remove('is-invalid');
                passwordError.textContent = ''; 
                confirmPassInput.setCustomValidity('');
                passwordInput.classList.add('is-valid');
                confirmPassInput.classList.add('is-valid');
                confirmPassError.style.display = 'none';
            }
        });
    </script>
</body>
</html>