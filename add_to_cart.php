<?php
session_start(); // Start the session

// Get POST parameters
$name = $_POST['name'];
$price = $_POST['price'];
$image = $_POST['image'];

// Check if the cart session already exists
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Check if the product already exists in the cart
$found = false;
foreach ($_SESSION['cart'] as &$item) {
    if ($item['name'] === $name) {
        // Product already exists in the cart, increment the quantity
        $item['quantity'] += 1;
        $found = true;
        break;
    }
}

// If the product is not found, add it as a new item
if (!$found) {
    $_SESSION['cart'][] = [
        'name' => $name,
        'price' => $price,
        'image' => $image,
        'quantity' => 1
    ];
}

echo json_encode(["message" => "Product added to cart successfully"]);
?>