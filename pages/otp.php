<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OTP Verification</title>

    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
        integrity="sha384-e3YsXl83pVtISBB8pTgRXPICw2vUd49b2T6QqcgfsrXSw5tdP5J/BbSLPWepXkz" crossorigin="anonymous">
    <style>
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .otp-form {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 30px;
            width: 300px;
            text-align: center;
        }

        .otp-form h3 {
            color: #465e77;
            margin-bottom: 20px;
        }

        .form-description {
            color: #555;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
            color: #333;
        }

        .form-group input {
            width: 100%;
            padding: 10px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
            outline: none;
            font-size: 14px;
        }

        .form-group button {
            width: 100%;
            background-color: #363F71;
            color: #fff;
            border: none;
            padding: 10px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        .form-group button:hover {
            background-color: #B4B6B9;
        }

        .back-to-login {
            margin-top: 20px;
            text-align: center;
        }

        .back-to-login a {
            text-decoration: none;
            color: #007bff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 14px;
        }

        .back-to-login i {
            margin-right: 5px;
        }
    </style>
</head>

<body>

    <div class="otp-form">
        <i class="fas fa-shield-alt fa-3x" style="color: #007bff;"></i>
        <img src="../assets/img/22.png" alt="Click to view image">
        <h3>OTP Verification</h3>
        <p class="form-description">Enter the OTP sent to your email address to verify your identity.</p>
        <form action="../function/otpController.php" method="POST">
            <div class="form-group">
                <label for="otp">Enter OTP:</label>
                <input type="text" id="otp" name="otp" required>
            </div>

            <div class="form-group">
                <button type="submit">
                    <i class="fas fa-check"></i> Verify
                </button>
            </div>
        </form>

        <div class="back-to-login">
            <a href="#">
                <i class="fas fa-arrow-left"></i>  < Forgot Password
            </a>
        </div>
    </div>

    <!-- Font Awesome JS -->
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/js/all.min.js"
        integrity="sha384-pz3di4L0aiq/OIyzsIiCc5JnLUX1xezhl+kMOBrj2EEqGfNyg8O5iX4p5IK6Rf6P"
        crossorigin="anonymous"></script>

</body>

</html>
