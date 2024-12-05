<?php
session_start(); // Start the session
require_once './config/db.php'; // Include database connection

// Initialize the database connection
$database = new Database();
$conn = $database->getConnection();

// Handle the form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form data
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $category = $_POST['category'];
    
    // Handle the image upload
    $image = $_FILES['image'];
    $targetDir = "uploads/";
    $targetFile = $targetDir . basename($image["name"]);
    
    // Check if the upload directory exists, if not, create it
    if (!file_exists($targetDir)) {
        mkdir($targetDir, 0755, true);
    }
    
    // Move the uploaded file to the target directory
    if (move_uploaded_file($image["tmp_name"], $targetFile)) {
        // Prepare SQL query with PDO
        $stmt = $conn->prepare("INSERT INTO products (name, description, price, quantity, category, image) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bindValue(1, $name);
        $stmt->bindValue(2, $description);
        $stmt->bindValue(3, $price);
        $stmt->bindValue(4, $quantity);
        $stmt->bindValue(5, $category);
        $stmt->bindValue(6, $targetFile);
        
        // Execute the query
        if ($stmt->execute()) {
            // Set a success message in the session and redirect
            $_SESSION['success_message'] = 'Product uploaded successfully!';
            header('Location: new_arrivals.php');
            exit(); // Stop further script execution after redirection
        } else {
            echo "Error: " . $stmt->errorInfo()[2];
        }
        
        $stmt->closeCursor();
    } else {
        echo "Error uploading file.";
    }
}

$conn = null;
?>
