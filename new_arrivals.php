<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Arrivals</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="style.css" />
    <style>
        .product-image {
            max-width: 100%;      
            max-height: 150px;    
            object-fit: contain;  
        }


        .card {
            height: 100%; 
        }

    </style>
</head>
<body>
<?php include 'navbar.php'; ?> 
<div class="container mt-5">
    <h2 class="text-center mb-4">New Arrivals</h2>
    <div class="row">
        <?php
        if (isset($_SESSION['success_message'])) {
            echo "<script>alert('{$_SESSION['success_message']}');</script>";
            unset($_SESSION['success_message']); // Clear the message after displaying
        }

        // Database configuration
        $host = 'localhost'; // your database host
        $dbname = 'ecomerceproject'; // your database name
        $username = 'root'; // your database username
        $password = ''; // your database password

        // Create a connection
        $conn = new mysqli($host, $username, $password, $dbname);

        // Check the connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Fetch products
        $result = $conn->query("SELECT * FROM products ORDER BY created_at DESC");

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $name = addslashes($row['name']);
                $price = $row['price'];
                $image = addslashes($row['image']);
                // Now, inject the PHP variables into JavaScript via the onclick handler
                echo '<div class="col-md-3 mb-4">
                        <div class="card">
                            <img src="' . $row['image'] . '" class="card-img-top product-image" alt="' . $row['name'] . '">
                            <div class="card-body">
                                <h5 class="card-title"><strong>' . $row['name'] . '</strong></h5>
                                <p class="card-text">' . $row['description'] . '</p>
                                <p class="card-text">Price: <strong>Ksh' . $row['price'] . '</strong></p>
                                <p class="card-text">Available Quantity: <strong>' . $row['quantity'] . '</strong></p>
                                <p class="card-text">Category: <strong>' . $row['category'] . '</strong></p>
                                <button class="btn btn-primary" onclick="addToCart(\'' . $name . '\', \'' . $price . '\', \'' . $image . '\')">Add to Cart</button>
                            </div>
                        </div>
                    </div>';
            }
        } else {
            echo "<p>No new arrivals found.</p>";
        }

        // Close the database connection
        $conn->close();
        ?>
    </div>
</div>

<?php include 'footer.php'; ?>

<script>
// JavaScript function to handle Add to Cart
function addToCart(name, price, image) {
    fetch('add_to_cart.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: `name=${encodeURIComponent(name)}&price=${encodeURIComponent(price)}&image=${encodeURIComponent(image)}`
    })
    .then(response => response.json())
    .then(data => {
        if (data.message) {
            alert(data.message); // Show message on successful addition
        } else if (data.error) {
            alert(data.error); // Show error message if any
        }
    })
    .catch(error => {
        console.error('Error adding product to cart:', error);
        alert('An error occurred while adding the item to your cart.');
    });
}
</script>
</body>
</html>
