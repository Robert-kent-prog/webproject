<?php
session_start();

// Check if the cart session is set
if (isset($_POST['order_btn'])) {
    // Collect form data
    $name = $_POST['name'];
    $number = $_POST['number'];
    $email = $_POST['email'];
    $method = $_POST['method'];
    $flat = $_POST['flat'];
    $street = $_POST['street'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $country = $_POST['country'];
    $pin_code = $_POST['pin_code'];

    // Check if the cart session exists
    if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
        $price_total = 0;
        $product_name = [];

        // Calculate the total price and collect product names from the session cart
        foreach ($_SESSION['cart'] as $product) {
            $product_name[] = $product['name'] . ' (' . $product['quantity'] . ') ';
            $product_price = floatval($product['price']) * intval($product['quantity']);
            $price_total += $product_price;
        }

        $total_product = implode(', ', $product_name);

        // Here you would save the order details into the database
        // Example:
        // $order_query = $pdo->prepare("INSERT INTO `order` (name, number, email, method, flat, street, city, state, country, pin_code, total_products, total_price) VALUES (:name, :number, :email, :method, :flat, :street, :city, :state, :country, :pin_code, :total_products, :total_price)");
        // $order_query->execute([...]);

        // Display the order confirmation message
        echo "
        <div class='container mt-5'>
            <div class='alert alert-success'>
                <h3>Thank you for shopping!</h3>
                <div class='order-detail'>
                    <span><strong>Products:</strong> $total_product</span>
                    <span class='total'> <strong>Total: </strong>$" . number_format($price_total, 2) . "/- </span>
                </div>
                <div class='customer-details'>
                    <p> <strong>Your Name:</strong> <span>$name</span> </p>
                    <p> <strong>Your Number:</strong> <span>$number</span> </p>
                    <p> <strong>Your Email:</strong> <span>$email</span> </p>
                    <p> <strong>Your Address:</strong> <span>$flat, $street, $city, $state, $country - $pin_code</span> </p>
                    <p> <strong>Payment Mode:</strong> <span>$method</span> </p>
                    <p>(*pay when product arrives*)</p>
                </div>
                <a href='products.php' class='btn btn-primary'>Continue Shopping</a>
            </div>
        </div>";
        
        // Clear the cart session after the order is placed
        unset($_SESSION['cart']);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- Custom CSS -->
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
        }

        .heading {
            text-align: center;
            margin-bottom: 20px;
            color: #007bff;
        }

        .checkout-form {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        }

        .inputBox {
            margin-bottom: 15px;
        }

        .inputBox input,
        .inputBox select {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            font-size: 16px;
        }

        .inputBox select {
            background-color: #f8f9fa;
        }

        .inputBox span {
            font-weight: bold;
            color: #333;
        }

        .btn {
            background-color: #007bff;
            color: white;
            font-size: 16px;
            padding: 10px 20px;
            border-radius: 5px;
            border: none;
            cursor: pointer;
        }

        .btn:hover {
            background-color: #0056b3;
        }

        .display-order span {
            font-size: 16px;
            display: block;
            margin-bottom: 8px;
        }

        .grand-total {
            font-weight: bold;
            color: #007bff;
            font-size: 18px;
        }

        .order-message-container {
            background-color: #28a745;
            padding: 30px;
            border-radius: 8px;
            color: white;
            text-align: center;
        }

        .order-detail, .customer-details p {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>

<div class="container">

    <section class="checkout-form">
        <h1 class="heading">Complete Your Order</h1>

        <form action="" method="post">
            <div class="display-order">
                <?php
                    // Check if the cart session is set and display cart details
                    if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
                        $total = 0;
                        $grand_total = 0;
                        foreach ($_SESSION['cart'] as $product) {
                            $total_price = floatval($product['price']) * intval($product['quantity']);
                            $grand_total = $total += $total_price;
                            echo "<span>{$product['name']} ({$product['quantity']})</span>";
                        }
                    } else {
                        echo "<div class='display-order'><span>Your cart is empty!</span></div>";
                    }
                ?>
                <span class="grand-total">Grand Total: Ksh <?= number_format($grand_total, 2); ?>/-</span>
            </div>

            <div class="flex">
                <div class="inputBox">
                    <span>Your Name</span>
                    <input type="text" placeholder="Enter your name" name="name" required>
                </div>
                <div class="inputBox">
                    <span>Your Number</span>
                    <input type="number" placeholder="Enter your number" name="number" required>
                </div>
                <div class="inputBox">
                    <span>Your Email</span>
                    <input type="email" placeholder="Enter your email" name="email" required>
                </div>
                <div class="inputBox">
                    <span>Payment Method</span>
                    <select name="method">
                        <option value="cash on delivery" selected>Cash on Delivery</option>
                        <option value="credit card">Credit Card</option>
                        <option value="paypal">Paypal</option>
                    </select>
                </div>
                <div class="inputBox">
                    <span>Address Line 1</span>
                    <input type="text" placeholder="e.g. Flat No." name="flat" required>
                </div>
                <div class="inputBox">
                    <span>Town</span>
                    <input type="text" placeholder="e.g. kitui" name="city" required>
                </div>
                <div class="inputBox">
                    <span>County</span>
                    <input type="text" placeholder="e.g. machakos" name="state" required>
                </div>
                <input type="submit" class="btn" value="Place Order" name="order_btn">
            </div>
        </form>
    </section>

</div>

<!-- Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
