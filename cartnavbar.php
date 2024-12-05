<?php
// Start the session only if it hasn't been started already
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Check if the cart session is set and count the items
$row_count = isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0;
?>
<nav class="navbar">
    <div class="navbar-container">
        <a class="navbar-brand text-dark">
            <img src="./images/logo.jpeg" style="width: 40px; height: 40px; margin-right: 10px"/>
            Dazzling Collections
        </a>
        <ul class="navbar-links">
            <li><a href="new_arrivals.php">New Arrivals</a></li>
            <li><a href="cart.php">Shopping Cart</a></li>
            <li><a href="checkout.php">Checkout</a></li>
            <li><a href="login.php">Login</a></li>
            <li>
                <a href="./cart.php">
                    Cart
                    <span class="cart-count"><?php echo $row_count; ?></span>
                </a>
            </li>
        </ul>
    </div>
</nav>
