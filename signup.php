<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>

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
        input[type="text"], input[type="email"], input[type="password"] {
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
        small {
            font-size: 16px;  
            font-weight: 500; 
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
    <h2 class="text-center mb-4">Sign Up</h2>
    <form action="saveusers.php" method="post">
        <!-- Username Input -->
        <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" class="form-control" required>
        </div>
        
        <!-- Email Input -->
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" class="form-control" required>
        </div>
        
        <!-- Password Input with Show/Hide Feature -->
        <div class="form-group">
            <label for="password">Password:</label>
            <div class="input-group">
                <input type="password" id="password" name="password" class="form-control" required>
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="button" onclick="togglePassword('password')">Show</button>
                </div>
            </div>
        </div>

        <!-- Confirm Password Input with Show/Hide Feature -->
        <div class="form-group">
            <label for="confirm_password">Confirm Password:</label>
            <div class="input-group">
                <input type="password" id="confirm_password" name="confirm_password" class="form-control" required>
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="button" onclick="togglePassword('confirm_password')">Show</button>
                </div>
            </div>
        </div>
        
        <!-- Role Selection -->
        <div class="form-group">
            <label for="role">Select Role:</label>
            <select id="role" name="role" class="form-control" required>
                <option value="">Choose...</option>
                <option value="Admin">Admin</option>
                <option value="User">User</option>
            </select>
        </div>

        <!-- Sign Up Button -->
        <button type="submit" class="btn btn-custom btn-block">Sign Up</button>
    </form>

    <!-- Login Redirect Button -->
    <div class="text-center mt-3">
        <p class="signup-link">Already have an account? <a href="login.php">Login</a></p>
    </div>
</div>

<!-- jQuery and Bootstrap JS (for form handling and validation) -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

<!-- Script for Show/Hide Password -->
<script>
function togglePassword(id) {
    const input = document.getElementById(id);
    const button = input.nextElementSibling.querySelector('button');
    if (input.type === "password") {
        input.type = "text";
        button.textContent = "Hide";
    } else {
        input.type = "password";
        button.textContent = "Show";
    }
}
</script>

</body>
</html>
