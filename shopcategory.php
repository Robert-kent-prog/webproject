<?php
$category = isset($_GET['category']) ? $_GET['category'] : '';  // Get the category from the URL

// Optionally, add some debugging to check if the category is passed correctly
if (empty($category)) {
    $message[] = 'no specified category';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop Category</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="style.css" />
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .shop-category-banner {
            width: 100%;
            height: 200px;
            background-size: cover;
            background-position: center;
        }
        .product-card {
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 15px;
            margin-bottom: 20px;
        }
        .product-image {
            width: 100%;
            height: auto;
        }
        .product-info {
            text-align: center;
        }
    </style>
</head>
<body>
<?php include 'navbar.php'; ?> 
    <!-- Banner -->
    <div class="shop-category-banner" id="category-banner"></div>

    <!-- Products Section -->
    <div class="container mt-4">
        <div id="products-row" class="row"></div>
        <div class="text-center">
            <button class="btn btn-primary" onclick="loadMore()">Load More</button>
        </div>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', () => {
    // Initialize currentCategory from PHP (ensure PHP is processed before JavaScript runs)
    let currentCategory = '<?php echo addslashes($category); ?>';

    // Log the current category for debugging
    console.log('Category from PHP:', currentCategory);

    // Ensure currentCategory is set
    if (currentCategory) {
        console.log('Category successfully parsed from URL:', currentCategory);
        loadCategory(currentCategory);
    } else {
        console.warn('No category found or passed in the URL');
    }

    // Define loadCategory function
    function loadCategory(category) {
        currentCategory = category;  // Set currentCategory
        currentPage = 1;  // Initialize currentPage for pagination
        document.getElementById('products-row').innerHTML = ''; // Clear current products
        
        // Call fetchProducts to load products based on category
        fetchProducts();
    }

    // Function to fetch products from PHP
    function fetchProducts() {
        fetch(`fetch_products.php?category=${currentCategory}`)
            .then(response => response.json())
            .then(data => {
                console.log('Data received:', data);
                if (data.error) {
                    console.error('Error:', data.error);
                    alert(data.error); // Show an alert for debugging
                    return;
                }

                if (data.message) {
                    console.log(data.message); // Log for empty result case
                    alert(data.message); // Alert if no products are found
                    return;
                }

                // Clear current products
                let productsRow = document.getElementById('products-row');
                productsRow.innerHTML = ''; 

                // Display products
                data.forEach(product => {
                    let productHtml = `
                        <div class="col-md-3">
                            <div class="product-card">
                                <img src="${product.image}" class="product-image" alt="${product.name}">
                                <div class="product-info">
                                    <h5>${product.name}</h5>
                                    <p><strong>$${product.price}</strong></p>
                                    <p>Quantity: ${product.quantity}</p>
                                    <button class="btn btn-primary" onclick="addToCart('${product.name}', '${product.price}', '${product.image}')">Add to Cart</button>
                                </div>
                            </div>
                        </div>
                    `;
                    productsRow.innerHTML += productHtml;
                });
            })
            .catch(error => {
                console.error('Error fetching products:', error);
                // Add a debug log to check the raw response
                fetch(`fetch_products.php?category=${currentCategory}`)
                    .then(res => res.text())  // Get raw text response
                    .then(text => console.log('Raw Response:', text));
            });
    }
    });
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
            console.log(data.message);
            alert(data.message); // Show message on successful addition
        })
        .catch(error => {
            console.error('Error adding product to cart:', error);
        });
    }
    </script>
    <?php include 'footer.php'; ?> 
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
