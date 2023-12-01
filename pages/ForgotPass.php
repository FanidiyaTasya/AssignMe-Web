<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>

        <!-- FONTS -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
        
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
        integrity="sha384-e3YsXl83pVtISBB8pTgRXPICw2vUd49b2T6QqcgfsrXSw5tdP5J/BbSLPWepXkz" crossorigin="anonymous">
    <style>
        *{ 

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
            padding: 20px;
            width: 300px;
            text-align: center;
        }

        .forgot-password-form h3 {
            color: #506880;
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

        .form-group input {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .form-group button {
            width: 100%;
            /* Set the button width to 100% */
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px;
            border-radius: 4px;
            cursor: pointer;
        }

        .form-group button:hover {
            background-color: #0056b3;
        }

        .back-to-login {
            margin-top: 10px;
            text-align: center;
        }

        .back-to-login a {
            text-decoration: none;
            color: #007bff;
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
        <i class="fas fa-lock fa-3x" style="color: #007bff;"></i>
        <img src="../assets/img/1.png" alt="Click to view image">
        <h3>Forgot Password</h3>
        <p class="form-description">Enter your email address and we'll send you an email with instructions to reset your
            password.</p>
        <form action="../function/sendemailController.php" method="POST">
            <div class="form-group">
                <label for="email">Email address:</label>
                <div class="input-group">
                    <span class="input-group-prepend">
                        <i class="fas fa-envelope"></i>
                    </span>
                    <input type="email" id="email" name="email" required>
                </div>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block">
                    <i class="fas fa-key"></i> Submit
                </button>
            </div>
        </form>

        <div class="back-to-login">
            <a href="Login.php">
                <i class="fas fa-arrow-left"></i>
                < Back to Login </a>
        </div>
    </div>

    <!-- Font Awesome JS -->
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/js/all.min.js"
        integrity="sha384-pz3di4L0aiq/OIyzsIiCc5JnLUX1xezhl+kMOBrj2EEqGfNyg8O5iX4p5IK6Rf6P"
        crossorigin="anonymous"></script>

</body>

</html>