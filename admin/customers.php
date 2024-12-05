<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="style1.css">
    <link rel="stylesheet" href="style.css">
    <title>Manage Customers</title>
</head>
<body>
<?php include 'adminnavbar.php'; ?>
    <button class="btn btn-dark sidebar-toggle d-md-none" id="menuToggle">
        <i class="fas fa-bars"></i> Menu
    </button>
    <div class="container-fluid">
        <div class="row">
            <?php include 'sidebar.php'; ?> <!-- Include the sidebar -->
            <main class="col-md-10 ms-sm-auto col-lg-10 px-md-4">
                <h2 class="mt-4">Manage Customers</h2>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>UserName</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        // Include the Database class
                        require_once '../config/db.php';

                        // Instantiate the Database object and get a connection
                        $database = new Database();
                        $pdo = $database->getConnection();

                        // Check if the connection was successful
                        if ($pdo) {
                            // Fetch customers from the database
                            $sql = "SELECT * FROM users";
                            $stmt = $pdo->query($sql);
                            $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
                        } else {
                            echo "Database connection not established.";
                            exit;
                        }
                        ?>
                     <?php foreach ($users as $customer): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($customer['id']); ?></td>
                            <td><?php echo htmlspecialchars($customer['username']); ?></td>
                            <td><?php echo htmlspecialchars($customer['email']); ?></td>
                            <td><?php echo htmlspecialchars($customer['role']); ?></td>
                            <td>
                                <a href="edit_customer.php?id=<?php echo $customer['id']; ?>" class="btn btn-sm btn-warning">Edit</a>
                                <a href="delete_customer.php?id=<?php echo $customer['id']; ?>" class="btn btn-sm btn-danger">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>

                    </tbody>
                </table>
            </main>
        </div>
    </div>
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

    
</html>

