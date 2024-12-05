<?php
// Include the Database class
require_once '../config/db.php';

// Instantiate the Database object and get a connection
$database = new Database();
$pdo = $database->getConnection();

// Check if the connection was successful
if (!$pdo) {
    echo "Database connection not established.";
    exit;
}

// Retrieve product ID from URL
$productId = isset($_GET['id']) ? $_GET['id'] : 0;

// Fetch the product details
$sql = "SELECT * FROM products WHERE id = :id LIMIT 1";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':id', $productId);
$stmt->execute();
$product = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$product) {
    echo "Product not found.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Product</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css" />
    <style>
        body {
            background-color: #f2f2f2;
            font-family: Arial, sans-serif;
        }
        .upload-container {
            max-width: 600px;
            margin-top: 50px;
            padding: 30px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            margin-left: auto;
            margin-right: auto;
            margin-bottom:50px;
        }
        .upload-title {
            font-size: 28px;  
            font-weight: 700; 
            color: #FF3B6E; /* Pink color for title */
        }
        .btn-custom {
            background-color: red; /* Change to red */
            color: white;
            font-size: 20px;
            font-weight: 900;
        }
        .btn-custom:hover {
            background-color: darkred; /* Darker red on hover */
        }

    </style>
</head>
<body>
<?php include 'adminnavbar.php'; ?> 
<div class="upload-container">
    <h2 class="text-center mb-4 upload-title">Update Product</h2>
    <form action="save_updated_product.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($product['id']); ?>">

        <!-- Product Name Input -->
        <div class="form-group">
            <label for="name">Product Name:</label>
            <input type="text" id="name" name="name" class="form-control" required value="<?php echo htmlspecialchars($product['name']); ?>">
        </div>
        
        <!-- Description Input -->
        <div class="form-group">
            <label for="description">Description:</label>
            <textarea id="description" name="description" class="form-control" rows="3" required><?php echo htmlspecialchars($product['description']); ?></textarea>
        </div>

        <!-- Price Input -->
        <div class="form-group">
            <label for="price">Price (Ksh):</label>
            <input type="number" id="price" name="price" class="form-control" step="0.01" required value="<?php echo htmlspecialchars($product['price']); ?>">
        </div>

        <!-- Quantity Input -->
        <div class="form-group">
            <label for="quantity">Quantity:</label>
            <input type="number" id="quantity" name="quantity" class="form-control" required value="<?php echo htmlspecialchars($product['quantity']); ?>">
        </div>

        <!-- Category Dropdown -->
        <div class="form-group">
            <label for="category">Category:</label>
            <select id="category" name="category" class="form-control" required>
                <option value="" disabled>Select a category</option>
                <option value="Men" <?php echo $product['category'] == 'Men' ? 'selected' : ''; ?>>Men</option>
                <option value="Women" <?php echo $product['category'] == 'Women' ? 'selected' : ''; ?>>Women</option>
                <option value="Children" <?php echo $product['category'] == 'Children' ? 'selected' : ''; ?>>Children</option>
                <option value="Accessories" <?php echo $product['category'] == 'Accessories' ? 'selected' : ''; ?>>Accessories</option>
            </select>
        </div>
        
        <!-- Current Image Display -->
        <div class="form-group">
            <label>Current Image:</label><br>
            <img src="../<?php echo htmlspecialchars($product['image']); ?>" alt="Product Image" width="100"><br>
            <small class="form-text text-muted">You can upload a new image if needed.</small>
        </div>
        
        <!-- Image Upload Input -->
        <div class="form-group">
            <label for="images">Product Image (Select 1):</label>
            <input type="file" id="images" name="image" class="form-control-file" accept="image/*">
            <small class="form-text text-muted">You can select 1 new image.</small>
        </div>
        
        <!-- Update Button -->
        <button type="submit" class="btn btn-custom btn-block">Update</button>
    </form>
</div>

<?php include 'adminfooter.php'; ?> <!-- Include sidebar here -->

<!-- jQuery and Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>
