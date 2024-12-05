<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
 
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <title>KwaVonza Boutique Ecommerce website</title>
    <link
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="style.css" />
    <style>
    .product-image {
        object-fit: contain;  /* Ensures the image fits within the container without cropping */
        max-height: 200px;     /* Limits the maximum height of the image */
        width: 100%;           /* Ensures the image takes up the full width of the card */
        margin: 0 auto;        /* Centers the image horizontally */
    }

    .card-body {
        display: flex;
        flex-direction: column;
        justify-content: space-between;  /* Ensures the content inside the card is spread evenly */
    }
    .featured-products .row {
    display: flex; /* Makes all cards in the row flex items */
    flex-wrap: wrap; /* Allows wrapping to the next line for responsiveness */
    }

    .product-card {
        display: flex;
        flex-direction: column; /* Ensures content flows vertically */
        justify-content: space-between; /* Distributes space between elements */
        height: 100%; /* Ensures all cards stretch equally */
    }

    .card-body {
        display: flex;
        flex-direction: column;
        justify-content: space-between; /* Align content evenly */
        flex-grow: 1; /* Ensures the body grows to fill available space */
    }
    .featured-products {
        display: flex;
        flex-direction: column;
        align-items: center;
        margin: 0 auto;
        text-align: center; /* Ensures content alignment */
    }

    .featured-products .section-title {
        text-align: center;
    }

    /* Hero Section Styling */
    .hero {
    background-image: url('./images/bg3.jpeg'); /* Replace with a relevant image */
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    height: 70vh;
    display: flex;
    flex-direction: column; /* Stack children vertically */
    justify-content: center; /* Center vertically */
    align-items: center; /* Center horizontally */
    text-align: center;
    color: white;
    position: relative;
    padding: 20px;
}

.hero h1 {
    font-size: 3.5rem;
    font-weight: bold;
    text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.6);
    margin-bottom: 10px; /* Add spacing between the title and subtitle */
}

.hero .hero-subtitle {
    font-size: 1.5rem; /* Slightly larger for emphasis */
    font-weight: 300; /* Light font weight for elegance */
    margin-top: 0; /* Reset margin to align closer to h1 */
    line-height: 1.6; /* Improve readability */
    color: rgba(255, 255, 255, 0.9); /* Soft white for contrast */
    text-shadow: 1px 1px 4px rgba(0, 0, 0, 0.7); /* Subtle shadow for visibility */
}

/* Overlay effect */
.hero::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.5); 
    z-index: 1;
}

.hero h1, .hero p {
    position: relative;
    z-index: 2;
}


/* Section Titles */
.section-title {
    font-size: 2.5rem;
    margin-bottom: 20px;
    color: #333;
    font-weight: bold;
    margin-top: 50px;
    text-transform: uppercase;
    border-bottom: 3px solid #007bff;
    display: inline-block;
    padding-bottom: 5px;
}

/* Card Styling */
.product-card {
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.product-card:hover {
    transform: scale(1.05);
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
}

.product-image {
    border-radius: 5px;
}

/* Button Styling */
.btn-primary {
    background-color: #007bff;
    border-color: #007bff;
    transition: background-color 0.3s ease, transform 0.3s ease;
}

.btn-primary:hover {
    background-color: #0056b3;
    transform: scale(1.1);
}

.btn-success {
    background-color: #28a745;
    border-color: #28a745;
    transition: background-color 0.3s ease, transform 0.3s ease;
}

.btn-success:hover {
    background-color: #218838;
    transform: scale(1.1);
}

/* Testimonial Section */
blockquote {
    font-style: italic;
    background: #f8f9fa;
    border-left: 4px solid #007bff;
    padding: 15px 20px;
    margin: 10px 0;
    font-size: 1rem;
}

/* Newsletter Subscription */
form input[type="email"] {
    border-radius: 5px;
    border: 1px solid #ccc;
    padding: 10px;
    width: 100%;
}

form button {
    border-radius: 5px;
    padding: 10px 20px;
    font-size: 1rem;
}

/* Responsive Adjustments */
@media (max-width: 768px) {
    .hero h1 {
        font-size: 2.5rem;
    }

    .hero p {
        font-size: 1rem;
    }

    .product-card {
        margin-bottom: 20px;
    }

    .section-title {
        font-size: 2rem;
    }
}

</style>
</head>
<body>
<?php include 'navbar.php'; ?> 

<div class="hero">
    <h1>Discover Your Unique Style</h1>
    <p class="hero-subtitle">Find fashionable, handpicked collections that bring out your best self. Shop now and redefine elegance!</p>
</div>


<!-- About Section -->
<div class="container text-center">
    <h2 class="section-title">About Us</h2>
    <p>Welcome to the boutique where fashion meets passion! At Dazzling Collections, every piece is handpicked to ensure you shine with confidence and grace. Our curated collection blends timeless styles with the latest trends to make shopping not just a necessity but an experience you’ll cherish.</p>
    <p><strong>Our promise:</strong> Exceptional quality, personalized service, and a love for style that resonates in every product.</p>
</div>


<!-- Featured Products Section -->
<div class="container featured-products">
    <h2 class="section-title">Featured Products</h2>
    <div class="row d-flex align-items-stretch">
        <div class="col-md-3">
            <div class="card product-card">
                <img src="./images/dress.jpeg" class="card-img-top product-image" alt="Product 1">
                <div class="card-body">
                    <h5 class="card-title">Stylish Dress</h5>
                    <p class="card-text">Turn heads with this elegant and versatile dress. Perfect for any occasion. <strong>Only Ksh 4,000</strong>.</p>
                    <a href="#" class="btn btn-primary">Add to Cart</a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card product-card">
                <img src="./images/bags.jpeg" class="card-img-top product-image" alt="Product 2">
                <div class="card-body">
                    <h5 class="card-title">Elegant Handbags</h5>
                    <p class="card-text">Ksh 2,000</p>
                    <a href="#" class="btn btn-primary">Add to Cart</a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card product-card">
                <img src="./images/trousers.jpeg" class="card-img-top product-image" alt="Product 3">
                <div class="card-body">
                    <h5 class="card-title">Men Trousers</h5>
                    <p class="card-text">Ksh 1800</p>
                    <a href="#" class="btn btn-primary">Add to Cart</a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card product-card">
                <img src="./uploads/airfoce.jpeg" class="card-img-top product-image" alt="Product 4">
                <div class="card-body">
                    <h5 class="card-title">Comfortable Shoes</h5>
                    <p class="card-text">Ksh 3,500</p>
                    <a href="#" class="btn btn-primary">Add to Cart</a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Special Promotion Section -->
<div class="container text-center">
    <h2 class="section-title">🎉 Special Promotion 🎉</h2>
    <p><strong>Exclusive Offer:</strong> Get 20% off your first purchase and start your style journey with us!</p>
    <p>Use code <strong>WELCOME20</strong> at checkout. Hurry, offer ends soon!</p>
    <a href="#" class="btn btn-success">Shop Now</a>
</div>

<div class="container text-center">
    <h2 class="section-title">What Our Customers Say</h2>
    <div class="row">
        <div class="col-md-4">
            <blockquote>
                "The collection is stunning! I found the perfect outfit for my wedding anniversary. Highly recommend!" - <strong>Jane K.</strong>
            </blockquote>
        </div>
        <div class="col-md-4">
            <blockquote>
                "Excellent quality and fast delivery! These products make me feel confident and stylish." - <strong>Michael O.</strong>
            </blockquote>
        </div>
        <div class="col-md-4">
            <blockquote>
                "Absolutely love the unique pieces in this boutique. Definitely my go-to for fashion." - <strong>Sarah W.</strong>
            </blockquote>
        </div>
    </div>
</div>
<div class="container text-center">
    <h2 class="section-title">Stay Connected</h2>
    <p>Never miss out on the latest styles and exclusive offers! Subscribe to our newsletter and follow us on social media.</p>
    <form>
        <input type="email" placeholder="Enter your email" class="form-control">
        <button type="submit" class="btn btn-primary mt-2">Subscribe</button>
    </form>
</div>

<?php include 'footer.php'; ?> 

<!-- Bootstrap JS and dependencies (optional for certain Bootstrap features) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>