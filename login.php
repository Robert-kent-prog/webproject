<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f2f2f2;
            font-family: Arial, sans-serif;
        }
        .container {
            max-width: 600px;
            margin-top: 50px;
            padding: 30px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }
        h2 {
            font-size: 28px;  
            font-weight: 700; 
        }
        label {
            font-size: 18px;  
            font-weight: 600; 
        }
        input[type="text"], input[type="password"] {
            font-size: 20px;  
            font-weight: 500; 
        }
        .btn-custom {
            background-color: red;
            color: white;
            font-size: 20px;
            font-weight: 900;
        }
        .btn-custom:hover {
            background-color: darkred;
        }
        .signup-link {
            font-size: 20px;
            font-weight: 600;
            color: blue;
        }
        .signup-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="container">
    <h2 class="text-center mb-4">Login</h2>

    <?php
    session_start();
    if (isset($_SESSION['error_message'])) {
        echo '<div class="alert alert-danger" role="alert">' . $_SESSION['error_message'] . '</div>';
        unset($_SESSION['error_message']); // Clear the message after displaying it
    }
    if (isset($_SESSION['success_message'])) {
        echo '<div class="alert alert-success" role="alert">' . $_SESSION['success_message'] . '</div>';
        unset($_SESSION['success_message']); // Clear the message after displaying it
    }
    ?>
    <form action="authenticteUsers.php" method="post">
        <!--Allow users to login using Username or Email Input -->
        <div class="form-group">
            <label for="username_email">Username or Email:</label>
            <input type="text" id="username_email" name="username_email" class="form-control" required>
        </div>
        
        <!-- Password Input with Show/Hide Feature -->
        <div class="form-group">
            <label for="password">Password:</label>
            <div class="input-group">
                <input type="password" id="password" name="password" class="form-control" required>
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="button" onclick="togglePassword()">Show</button>
                </div>
            </div>
        </div>
        
        <!-- Login Button -->
        <button type="submit" class="btn btn-custom btn-block">Login</button>
    </form>
    
    <!-- Sign Up Redirect Button -->
    <div class="text-center mt-3">
        <p class="signup-link">Don’t have an account? <a href="signup.php">Sign Up</a></p>
    </div>
</div>

<!-- jQuery and Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

<!-- Show/Hide Password Script -->
<script>
function togglePassword() {
    const passwordInput = document.getElementById('password');
    const button = passwordInput.nextElementSibling.querySelector('button');
    if (passwordInput.type === "password") {
        passwordInput.type = "text";
        button.textContent = "Hide";
    } else {
        passwordInput.type = "password";
        button.textContent = "Show";
    }
}
</script>

</body>
</html>
