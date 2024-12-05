<?php
// Start the session only if it hasn't been started already
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Check if the cart session is set and count the items
$row_count = isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0;
?>
<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top"> 
      <a class="navbar-brand text-dark" href="#">
        <img src="./images/logo.jpeg" style="width: 40px; height: 40px; margin-right: 10px"/>
       Boutique Ecommerce website
      </a>
      <button
        class="navbar-toggler"
        type="button"
        data-toggle="collapse"
        data-target="#navbarNav"
        aria-controls="navbarNav"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto custom-nav">
          <li class="nav-item"><a class="nav-link text-primary" href="./homepage.php">Home</a></li>
          <li class="nav-item"><a class="nav-link text-primary" href="./new_arrivals.php">NewArrivals</a></li>
          <li class="nav-item"><a class="nav-link text-primary" href="./admin/index.php">Admin</a></li>
          <li class="nav-item"><a class="nav-link text-primary" href="./shopcategory.php?category=men" onclick="loadCategory('men')">Men</a></li>
          <li class="nav-item"><a class="nav-link text-primary" href="./shopcategory.php?category=women" onclick="loadCategory('women')">Women</a></li>
          <li class="nav-item"><a class="nav-link text-primary" href="./shopcategory.php?category=kids" onclick="loadCategory('kids')">Kids</a></li>
          <li class="nav-item"><a class="nav-link text-primary" href="./shopcategory.php?category=accessories" onclick="loadCategory('accessories')">Accessories</a></li>
          <!-- Cart with dynamic count -->
          <li class="nav-item"><a class="nav-link text-primary" href="./cart.php">Cart <span><?php echo $row_count; ?></span></a></li>
        </ul>
      </div>
    </nav>
  </header>