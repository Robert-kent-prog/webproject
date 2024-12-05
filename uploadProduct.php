<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Product</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
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
        label {
            font-size: 18px;  
            font-weight: 600; 
        }
        input[type="text"], input[type="number"], textarea {
            font-size: 20px;  
            font-weight: 500; 
        }
        .btn-custom {
            background-color: #FF3B6E; /* Pink button */
            color: white;
            font-size: 20px;
            font-weight: 900;
        }
        .btn-custom:hover {
            background-color: darkred;
        }
        .form-text {
            font-size: 14px;  
            font-weight: 400; 
        }
    </style>
</head>
<body>
<?php include 'navbar.php'; ?> 
<div class="upload-container">
    <h2 class="text-center mb-4 upload-title">Upload Product</h2>
    <form action="saveproducts.php" method="post" enctype="multipart/form-data">
        
        <!-- Product Name Input -->
        <div class="form-group">
            <label for="name">Product Name:</label>
            <input type="text" id="name" name="name" class="form-control" required>
        </div>
        
        <!-- Description Input -->
        <div class="form-group">
            <label for="description">Description:</label>
            <textarea id="description" name="description" class="form-control" rows="3" required></textarea>
        </div>

        <!-- Price Input -->
        <div class="form-group">
            <label for="price">Price (Ksh):</label>
            <input type="number" id="price" name="price" class="form-control" step="0.01" required>
        </div>

        <!-- Quantity Input -->
        <div class="form-group">
            <label for="quantity">Quantity:</label>
            <input type="number" id="quantity" name="quantity" class="form-control" required>
        </div>

        <!-- Category Dropdown -->
        <div class="form-group">
            <label for="category">Category:</label>
            <select id="category" name="category" class="form-control" required>
                <option value="" disabled selected>Select a category</option>
                <option value="Men">Men</option>
                <option value="Women">Women</option>
                <option value="Children">Children</option>
                <option value="Accessories">Accessories</option>
            </select>
        </div>
        
        <!-- Image Upload Input -->
        <div class="form-group">
            <label for="images">Product Image (Select 1):</label>
            <input type="file" id="images" name="image" class="form-control-file" accept="image/*" required>
            <small class="form-text text-muted">You can select 1 image.</small>
        </div>
        
        <!-- Upload Button -->
        <button type="submit" class="btn btn-custom btn-block">Upload</button>
    </form>
</div>

<?php include 'footer.php'; ?> <!-- Include sidebar here -->
<!-- jQuery and Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

<!-- Script to limit file selection to 1 image -->
<script>
document.getElementById('images').addEventListener('change', function() {
    if (this.files.length > 1) {
        alert("You can only upload 1 image.");
        this.value = ''; // Clear file input
    }
});
</script>

</body>
</html>
