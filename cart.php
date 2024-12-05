<?php
// Start session if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Update quantity in the session cart
if (isset($_POST['update_update_btn'])) {
    $index = $_POST['update_quantity_index'];
    $new_quantity = $_POST['update_quantity'];
    
    // Check if the item exists in the session cart
    if (isset($_SESSION['cart'][$index])) {
        $_SESSION['cart'][$index]['quantity'] = $new_quantity;
        header("Location: cart.php"); // Redirect to refresh the page
        exit(); // Ensure the script stops after the redirect
    }
}

// Remove an item from the session cart
if (isset($_GET['remove'])) {
    $index = $_GET['remove'];
    
    // Check if the item exists in the session cart
    if (isset($_SESSION['cart'][$index])) {
        unset($_SESSION['cart'][$index]);
        $_SESSION['cart'] = array_values($_SESSION['cart']); // Reindex array
        header("Location: cart.php");
        exit(); // Stop the script after the redirect
    }
}

// Delete all items from the session cart
if (isset($_GET['delete_all'])) {
    unset($_SESSION['cart']);
    header("Location: cart.php");
    exit(); // Stop the script after the redirect
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Shopping Cart</title>

   <!-- Font Awesome CDN for icons -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
   <link rel="stylesheet" href="./style.css" />

   <style>
      /* General Styles */
      body {
         font-family: Arial, sans-serif;
         margin: 0;
         padding: 20px;
         display: flex;
         flex-direction: column; /* Align everything vertically */
         justify-content: flex-start; /* Keep navbar at top */
         align-items: center;
         min-height: 100vh;
      }

      .cart-container {
         width: 100%;
         max-width: 1200px;
         padding: 20px;
      }

      .heading {
         text-align: center;
         font-size: 2em;
         color: #333;
         margin-bottom: 20px;
         font-weight: bold;
      }

      /* Table Styles */
      .shopping-cart table {
         width: 100%;
         border-collapse: collapse;
         margin-bottom: 20px;
      }

      .shopping-cart table th,
      .shopping-cart table td {
         padding: 15px;
         text-align: left;
         border-bottom: 1px solid #ddd;
      }

      .shopping-cart table th {
         background-color: #4CAF50;
         color: white;
         font-size: 1.1em;
      }

      .shopping-cart table tbody tr:hover {
         background-color: #f9f9f9;
      }

      .image-cell img {
         max-width: 50px;
         border-radius: 5px;
      }

      /* Quantity Container */
      .quantity-container {
         display: flex;
         align-items: center;
         gap: 8px;
      }

      .quantity-container input[type="number"] {
         width: 50px;
         text-align: center;
         padding: 5px;
         border-radius: 4px;
         border: 1px solid #ddd;
      }

      /* Button Styles */
      .option-btn, .delete-btn, .checkout-btn a {
         display: inline-block;
         padding: 10px 20px;
         font-weight: bold;
         border-radius: 5px;
         text-align: center;
         text-decoration: none;
         transition: background-color 0.3s ease, transform 0.2s ease;
      }

      .option-btn {
         background-color: #4CAF50;
         color: white;
      }

      .delete-btn {
         background-color: #ff4d4d;
         color: white;
         width: 100px;
      }

      .checkout-btn a {
         background-color: #FF8C00;
         color: white;
         display: block;
         width: 100%;
         text-align: center;
         margin-top: 10px;
         padding: 12px 0;
      }

      /* Hover and Active States */
      .option-btn:hover { background-color: #45a049; }
      .delete-btn:hover { background-color: #e74c3c; }
      .checkout-btn a:hover { background-color: #FFA500; }

      /* Disabled State */
      .btn.disabled {
         background-color: #ccc;
         pointer-events: none;
         cursor: default;
      }

      /* Grand Total Row */
      .table-bottom td {
         font-weight: bold;
         font-size: 1.1em;
      }

            /* Style for the quantity input field */
      .quantity-container .quantity-input {
         width: 60px; /* Set the width of the input field */
         height: 40px; /* Increase the height for better visibility */
         text-align: center;
         font-size: 1.2em;
         border: 2px solid #ddd; /* Light border */
         border-radius: 5px; /* Rounded corners */
         padding: 5px;
         transition: border-color 0.3s ease;
      }

      .quantity-container .quantity-input:focus {
         border-color: #4CAF50; /* Green border on focus */
      }

      /* Style for the Update button */
      .update-btn {
         background-color: #FF8C00; 
         color: white;
         border: none;
         border-radius: 5px;
         font-size: 1em;
         padding: 10px 20px;
         margin-left: 10px;
         cursor: pointer;
         transition: background-color 0.3s ease, transform 0.2s ease;
      }

      .update-btn:hover {
         background-color:  #FFA500; 
         transform: scale(1.05); /* Slightly enlarge on hover */
      }

      .update-btn:active {
         background-color: #3e8e41; /* Even darker green on click */
      }
      .navbar {
      width: 100%;
      background-color: #333;
      padding: 10px 0;
      position: fixed;
      top: 0;
      left: 0;
      z-index: 1000; /* Ensures the navbar stays on top */
   }

   .navbar-container {
         display: flex;
         justify-content: space-between;
         align-items: center;
         width: 90%;
         margin: 0 auto;
      }

      .navbar .logo {
         font-size: 24px;
         color: white;
         text-decoration: none;
         font-weight: bold;
      }

      .navbar-links {
         list-style: none;
         display: flex;
         gap: 20px;
      }

      .navbar-links li {
         display: inline-block;
      }

      .navbar-links a {
         text-decoration: none;
         font-size: 16px;
         padding: 8px 16px;
         transition: background-color 0.3s ease;
         color: #003366;
      }
      .navbar .navbar-links li a {
         position: relative;
         text-decoration: none;
         font-size: 16px;
      }

      .cart-count {
         position: absolute;
         top: -5px;
         right: -10px;
         background-color: #ff8c00;
         color: white;
         border-radius: 50%;
         padding: 5px 10px;
         font-size: 14px;
         font-weight: bold;
      }

      .navbar-links a:hover {
        color: #551A7E; 
         border-radius: 5px;
      }

      /* Style the cart page */
      .cart-container {
         padding-top: 70px; /* Ensure content is not hidden behind navbar */
         width: 80%;
         margin: 20px auto;
      }
      .navbar-brand {
         font-size: 20px;
         text-decoration: none;
         display: flex;
         align-items: center;
      }

      .navbar-brand img {
         margin-right: 10px;
      }

      /* Responsive Adjustments */
      @media (max-width: 768px) {
         .shopping-cart table th, 
         .shopping-cart table td {
            font-size: 0.9em;
         }
         .quantity-container input[type="number"] {
            width: 40px;
         }
      }
   </style>

</head>
<body>
<?php include 'cartnavbar.php'; ?> 
<div class="cart-container">
    <section class="shopping-cart">
        <h1 class="heading">Shopping Cart</h1>

        <table>
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total Price</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $grand_total = 0;
                if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
                    foreach ($_SESSION['cart'] as $index => $cartItem) {
                        $sub_total = floatval($cartItem['price']) * intval($cartItem['quantity']);
                        $grand_total += $sub_total;
                ?>
                <tr>
                    <td class="image-cell"><img src="<?php echo $cartItem['image']; ?>" alt="Product Image"></td>
                    <td><?php echo $cartItem['name']; ?></td>
                    <td>Ksh <?php echo number_format(floatval($cartItem['price'])); ?>/-</td>
                    <td>
                        <form action="" method="post" class="quantity-container">
                            <input type="hidden" name="update_quantity_index" value="<?php echo $index; ?>">
                            <input type="number" name="update_quantity" min="1" value="<?php echo $cartItem['quantity']; ?>" class="quantity-input">
                            <input type="submit" value="Update" name="update_update_btn" class="update-btn">
                        </form>
                    </td>

                    <td>Ksh <?php echo number_format($sub_total); ?>/-</td>
                    <td><a href="cart.php?remove=<?php echo $index; ?>" onclick="return confirm('Remove item from cart?')" class="delete-btn"> <i class="fas fa-trash"></i> Remove</a></td>
                </tr>
                <?php 
                    }
                } else {
                    echo "<tr><td colspan='6'>Your cart is empty!</td></tr>";
                }
                ?>
                <tr class="table-bottom">
                    <td><a href="./new_arrivals.php" class="option-btn">Continue Shopping</a></td>
                    <td colspan="3">Grand Total</td>
                    <td>Ksh <?php echo number_format($grand_total); ?>/-</td>
                    <td><a href="cart.php?delete_all" onclick="return confirm('Are you sure you want to delete all?');" class="delete-btn"> <i class="fas fa-trash"></i> Delete All</a></td>
                </tr>
            </tbody>
        </table>

        <div class="checkout-btn">
            <a href="checkout.php" class="btn <?= ($grand_total > 0) ? '' : 'disabled'; ?>">Proceed to Checkout</a>
        </div>
    </section>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
