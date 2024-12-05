<?php
session_start(); // Start the session
require_once './config/db.php'; // Include database connection

// Initialize the database connection
$database = new Database();
$conn = $database->getConnection();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve login data
    $login = $_POST['username_email']; // Can be username or email
    $password = $_POST['password']; // User's password

    // SQL query to check if the user exists with the provided username or email
    $sql = "SELECT * FROM users WHERE username = :login OR email = :login";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':login', $login);
    $stmt->execute();

    // Check if the user was found
    if ($stmt->rowCount() > 0) {
        $user = $stmt->fetch(PDO::FETCH_ASSOC); // Fetch user data

        // Verify the password against the hashed password in the database
        if (password_verify($password, $user['password'])) {
            // Password is correct, store user data in session
            $_SESSION['user_id'] = $user['id']; // Assuming there's an 'id' field
            $_SESSION['username'] = $user['username'];
            $_SESSION['role'] = $user['role']; // Store user role if needed

            // Set a success message
            $_SESSION['success_message'] = 'Login successful! Welcome back, ' . $user['username'] . '.';
            // Redirect to a welcome page or dashboard
            header('Location: homepage.php');
            exit();
        } else {
            // Password is incorrect
            $_SESSION['error_message'] = 'Invalid username/email or password.';
            header('Location: login.php');
            exit();
        }
    } else {
        // User not found
        $_SESSION['error_message'] = 'Invalid username/email or password.';
        header('Location: login.php');
        exit();
    }
}
?>
