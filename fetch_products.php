<?php
session_start(); // Start the session
// fetch_products.php
require_once "./config/db.php";  // Ensure this is the correct path to your db.php

// Initialize the database connection
$database = new Database();
$conn = $database->getConnection();

// Get category from the URL (GET request)
$category = isset($_GET['category']) ? $_GET['category'] : '';

// Check if category is provided
// Get category from the URL (GET request)
$category = isset($_GET['category']) ? $_GET['category'] : '';

// Check if category is provided
if ($category) {
    // Example query to fetch products based on the category
    $sql = "SELECT * FROM products WHERE category = :category";
    
    // Prepare the query
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        // Bind parameters using PDO
        $stmt->bindParam(':category', $category, PDO::PARAM_STR);
        
        // Execute the query
        $stmt->execute();
        
        // Fetch products and return as JSON
        $products = $stmt->fetchAll(PDO::FETCH_ASSOC);

        echo json_encode($products); // Return the products as JSON
    } else {
        echo json_encode(['error' => 'Failed to prepare statement']);
    }
} else {
    echo json_encode(['error' => 'No category specified']);
}
?>