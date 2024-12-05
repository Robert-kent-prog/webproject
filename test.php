<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Test Add to Cart</title>
</head>
<body>
    <h2>Test Add to Cart</h2>
    <form action="add_to_cart.php" method="POST">
        <label for="name">Product Name:</label>
        <input type="text" id="name" name="name" required><br>

        <label for="price">Product Price:</label>
        <input type="text" id="price" name="price" required><br>

        <label for="image">Product Image URL:</label>
        <input type="text" id="image" name="image" required><br>

        <button type="submit">Add to Cart</button>
    </form>
</body>
</html>
