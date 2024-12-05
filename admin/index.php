<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="style1.css">
    <link rel="stylesheet" href="style.css">
    <title>Admin Panel - Dashboard</title>
</head>
<body>
<header>
  <nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top"> 
    <a class="navbar-brand text-dark" href="#">
      <img src="../images/logo.jpeg" alt="Logo" style="width: 40px; height: 40px; margin-right: 10px"/>
      Boutique Ecommerce Website
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
        <li class="nav-item"><a class="nav-link text-primary" href="../homepage.php">Home</a></li>
        <li class="nav-item"><a class="nav-link text-primary" href="../uploadProduct.php">Upload Products</a></li>
        <li class="nav-item"><a class="nav-link text-primary" href="../admin/index.php">Admin</a></li>
      </ul>
    </div>
  </nav>
</header>
    <!-- Sidebar Toggle Button for Small Screens -->
    <button class="btn btn-dark sidebar-toggle d-md-none" id="menuToggle">
        <i class="fas fa-bars"></i> Menu
    </button>

    <div class="container-fluid">
        <div class="row">
        <?php include 'sidebar.php'; ?> <!-- Include sidebar here -->

            <!-- Main Content -->
            <main class="col-md-10 ms-sm-auto col-lg-10 px-md-4">
                <h2 class="mt-4">Admin Dashboard</h2>

                <!-- Dashboard Cards -->
                <div class="row">
                    <div class="col-md-4">
                        <div class="card text-white bg-primary">
                            <div class="card-body">
                                <h5 class="card-title">Total Sales</h5>
                                <p class="card-text">$<?= 1200; // Replace with PHP code for total sales ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card text-white bg-success">
                            <div class="card-body">
                                <h5 class="card-title">New Orders</h5>
                                <p class="card-text"><?= 5; // Replace with PHP code for new orders ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card text-white bg-info">
                            <div class="card-body">
                                <h5 class="card-title">Total Products</h5>
                                <p class="card-text"><?= 20; // Replace with PHP code for total products ?></p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Recent Orders Table -->
                <h3 class="mt-4">Recent Orders</h3>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>Customer</th>
                            <th>Total</th>
                            <th>Status</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Replace with PHP code to loop through recent orders
                        $orders = [
                            ["id" => 101, "customer" => "Jane Doe", "total" => "$150", "status" => "Pending", "date" => "2024-11-01"],
                            ["id" => 102, "customer" => "John Smith", "total" => "$200", "status" => "Completed", "date" => "2024-10-30"]
                        ];
                        foreach ($orders as $order) {
                            echo "<tr>
                                <td>{$order['id']}</td>
                                <td>{$order['customer']}</td>
                                <td>{$order['total']}</td>
                                <td>{$order['status']}</td>
                                <td>{$order['date']}</td>
                              </tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </main>
        </div>
    </div>
   
    <footer class="bg-dark text-white text-center text-md-left py-4">
        <div class="container">
            <div class="row">
                <!-- Collections Section -->
                <div class="col-md-6">
                    <section>
                        <h2 class="footer-heading">Collections</h2>
                        <ul class="list-unstyled">
                            <li><a href="#" class="text-white">Men's Fashion</a></li>
                            <li><a href="#" class="text-white">Women's Fashion</a></li>
                            <li><a href="#" class="text-white">Children's Fashion</a></li>
                            <li><a href="#" class="text-white">Accessories</a></li>
                        </ul>
                    </section>
                </div>

                <!-- Contact Us Section -->
                <div class="col-md-6">
                    <section>
                        <h2 class="footer-heading">Contact Us</h2>
                        <p>
                            Call:
                            <a href="tel:+254713554972" class="text-white">+254713554972</a> /
                            <a href="tel:+254724390322" class="text-white">+254724390322</a>
                        </p>
                        <p>
                            Email:
                            <a href="mailto:info@kwavonzacenter.ac.ke" class="text-white">info@kwavonzacenter.ac.ke</a>
                        </p>
                        <h2>Follow Us:</h2>
                        <div class="social-icons d-flex justify-content-center justify-content-md-start">
                            <a href="#" class="text-white mx-2"><i class="fab fa-facebook bg-white text-dark p-2 rounded icon-square"></i></a>
                            <a href="#" class="text-white mx-2"><i class="fab fa-twitter bg-white text-dark p-2 rounded icon-square"></i></a>
                            <a href="#" class="text-white mx-2"><i class="fab fa-instagram bg-white text-dark p-2 rounded icon-square"></i></a>
                            <a href="#" class="text-white mx-2"><i class="fab fa-youtube bg-white text-dark p-2 rounded icon-square"></i></a>
                            <a href="#" class="text-white mx-2"><i class="fab fa-tiktok bg-white text-dark p-2 rounded icon-square"></i></a>
                        </div>
                    </section>
                </div>
            </div>
        </div>
        
        <!-- Footer Bottom Text -->
        <hr class="footer-divider">
        <p class="mt-4 footer-text">&copy; 2024 Kwa Vonza Boutique Center. All Rights Reserved.</p>
    </footer>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.querySelector(".sidebar-toggle").addEventListener("click", function() {
                const sidebar = document.getElementById("sidebar");
                sidebar.classList.toggle("active");
            });
            
            document.querySelector(".sidebar-close").addEventListener("click", function() {
                const sidebar = document.getElementById("sidebar");
                sidebar.classList.remove("active"); // Close the sidebar
            });
        });
    </script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
