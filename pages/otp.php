<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AssignMe</title>

    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">

    <!-- STYLE -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../assets/css/forgotPass-style.css">

    <!-- FONT -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
</head>
<body>

    <div class="form">
        <i class="fas fa-shield-alt fa-3x" style="color: #363F71;"></i>
        <h3>OTP Verification</h3>
        <p class="form-description">Enter the OTP sent to your email address to verify your identity.</p>

        <form action="../function/otpController.php" method="POST">
            <div class="code-container">
                <input type="number" id="otp" name="otp[]" placeholder="0" class="code" min="0" max="9" required>
                <input type="number" id="otp" name="otp[]" placeholder="0" class="code" min="0" max="9" required>
                <input type="number" id="otp" name="otp[]" placeholder="0" class="code" min="0" max="9" required>
                <input type="number" id="otp" name="otp[]" placeholder="0" class="code" min="0" max="9" required>
                <input type="number" id="otp" name="otp[]" placeholder="0" class="code" min="0" max="9" required>
                <input type="number" id="otp" name="otp[]" placeholder="0" class="code" min="0" max="9" required>
            </div>

            <div class="form-group">
                <button type="submit" class="btn">Verify</button>
            </div>
        </form>

        <!-- <div class="text-center">
            <span class="d-inline">I did'nt received the code? <a href="#" class="d-inline text-decoration-none">Send again</a></span>
            <a href="Login.php">Back to Login</a>
        </div> -->
    </div>

    <script>
        const codes = document.querySelectorAll('.code')
        codes[0].focus()
        codes.forEach((code, idx) => {
            code.addEventListener('keydown', (e) => {
                if(e.key >= 0 && e.key <= 9) {
                    codes[idx].value = ''
                    setTimeout(() => codes[idx + 1].focus(), 10)
                } else if(e.key === 'Backspace') {
                    setTimeout(() => codes[idx - 1].focus(), 10)
                }
            })
        })
    </script>
</body>
</html>
