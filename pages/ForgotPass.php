<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>

    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">

    <!-- Font Awesome CSS -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />

    <!-- FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

    <style>
        * {
            font-family: 'Poppins', sans-serif;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .forgot-password-form {
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 40px; 
            width: 400px; 
            text-align: center;
        }

        .forgot-password-form h3 {
            color: #363F71;
            margin-bottom: 10px;
        }

        .form-description {
            color: #555;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .form-group .input-group {
            position: relative;
        }

        .form-group .input-group i {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            left: 18px; /* Menyesuaikan posisi ikon di dalam kolom input */
            color: #363F71; 
        }

        .form-group input {
            width: calc(100% - 20px); /* Lebar input dikurangi margin kiri dan kanan ikon */
            padding: 10px 30px 10px 30px; 
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
            transition: border-color 0.3s;
        }

        .form-group input:focus {
            border-color: #007bff; /* Warna border saat input aktif/fokus */
        }

        .form-group input:focus + .input-group i {
            color: #007bff; /* Memberikan warna ikon ketika kolom input aktif/fokus */
        }

        .form-group button {
            width: 100%;
            background-color: #363F71;
            color: #fff;
            border: none;
            padding: 10px;
            border-radius: 4px;
            cursor: pointer;
        }

        .form-group button:hover {
            background-color: #B4B6B9;
        }

        .back-to-login {
            margin-top: 10px;
            text-align: center;
        }

        .back-to-login a {
            text-decoration: none;
            color: #737373;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .back-to-login i {
            margin-right: 5px;
        }
    </style>
</head>

<body>
    <div class="forgot-password-form">
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
            <a href="Login.php"> < Back to Login </a>
        </div>
    </div>
</body>

</html>