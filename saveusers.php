<?php

session_start(); // Start the session
require_once './config/db.php';

// Initialize the database connection
$database = new Database();
$conn = $database->getConnection();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $role = $_POST['role']; // Retrieve the role from the form

    // Password confirmation check
    if ($password !== $confirm_password) {
        $_SESSION['error_message'] = 'Passwords do not match.';
        header('Location: signup.php');
        exit();
    }

    // Hash the password for security
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Check if email already exists
    $checkEmailSql = "SELECT * FROM users WHERE email = :email";
    $checkEmailStmt = $conn->prepare($checkEmailSql);
    $checkEmailStmt->bindParam(':email', $email);
    $checkEmailStmt->execute();

    if ($checkEmailStmt->rowCount() > 0) {
        $_SESSION['error_message'] = 'Email already registered. Please log in.';
        header('Location: signup.php');
        exit();
    }

    // Insert user data into the database using a prepared statement
    $sql = "INSERT INTO users (username, email, password, role) VALUES (:username, :email, :password, :role)"; // Added role to the SQL
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $hashed_password);
    $stmt->bindParam(':role', $role); // Bind the role parameter

    if ($stmt->execute()) {
        // Set a success message in the session
        $_SESSION['success_message'] = 'Signup successful! You can now log in.';
        // Redirect to the login page
        header('Location: login.php');
        exit();
    } else {
        // Optionally set an error message
        $_SESSION['error_message'] = 'Error: Could not execute the query.';
        header('Location: signup.php');
        exit();
    }
}
?>
