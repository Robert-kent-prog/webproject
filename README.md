Boutique E-Commerce Website
Overview
This is a fully functional boutique e-commerce website built using HTML , CSS , JavaScript , Bootstrap , PHP , and MySQL . The website allows users to browse products, add items to their cart, check out, and manage their accounts. Admins can upload new products, manage categories, and view customer details.

Features
User Features:
Product Browsing : Users can explore products categorized into different sections (e.g., New Arrivals, Shop by Category).
Shopping Cart : Add, remove, or update items in the cart.
Checkout Process : Securely complete purchases.
User Authentication : Sign up, log in, and manage profiles.
Responsive Design : Fully responsive layout for all devices.
Admin Features:
Product Management : Upload, update, and delete products.
Customer Management : View and manage customer details.
Category Management : Organize products into categories.
Dashboard : Admin-specific dashboard with navigation and footer.
File Structure
Below is the folder structure and explanation of key files:
boutique-ecommerce/
├── admin/
│   ├── adminfooter.php       # Footer for admin pages
│   ├── adminnavbar.php       # Navbar for admin pages
│   ├── customers.php         # Manage customers (admin-only)
│   ├── index.php             # Admin dashboard
│   ├── sidebar.php           # Sidebar navigation for admin
│   ├── update_product.php    # Update product details (admin-only)
│   ├── style.css             # Styles for admin pages
│   └── style1.css            # Additional styles for admin pages
├── images/                   # Folder for product images
├── uploads/                  # Folder for uploaded product images
├── .gitignore                # Git ignore file
├── add_to_cart.php           # Handles adding products to the cart
├── authenticateUsers.php     # Authenticates user login
├── cart.css                  # Styles for the cart page
├── cart.php                  # Shopping cart page
├── cartnavbar.php            # Navbar for cart-related pages
├── checkout.php              # Checkout process page
├── fetch_products.php        # Fetches products from the database
├── footer.php                # Footer for user-facing pages
├── homepage.php              # Main homepage of the website
├── login.php                 # Login page for users
├── navbar.php                # Navbar for user-facing pages
├── new_arrivals.php          # Displays new arrivals section
├── saveproducts.php          # Saves products to the database
├── saveusers.php             # Saves user data to the database
├── shopcategory.php          # Displays products by category
├── signup.php                # Signup page for users
├── sqlquery.php              # Contains SQL queries for database operations
├── style.css                 # General styles for the website
├── test.php                  # Test file for debugging purposes
├── uploadProduct.php         # Allows admins to upload new products
Prerequisites
To run this project locally, you need the following tools installed on your machine:

Web Server : A local web server that supports PHP and MySQL, such as:
XAMPP
WAMP
MAMP
Database : Ensure that MySQL is installed and running. The project uses MySQL for storing product, user, and order data.
Browser : Any modern browser (e.g., Chrome, Firefox, Edge).
Setup Instructions
Clone the Repository :
bash
Copy
1
git clone https://github.com/your-repo-url/boutique-ecommerce.git
Set Up the Web Server :
Download and install XAMPP .
Place the project folder (boutique-ecommerce) inside the htdocs directory of XAMPP (C:\xampp\htdocs\ on Windows).
Configure the Database :
Start the Apache and MySQL services in XAMPP.
Open phpMyAdmin (http://localhost/phpmyadmin) and create a new database.
Import the SQL schema from sqlquery.php into the database.
Run the Application :
Open your browser and navigate to http://localhost/boutique-ecommerce/homepage.php.
For admin access, go to http://localhost/boutique-ecommerce/admin/index.php.
Test the Features :
Sign up or log in as a user.
Browse products, add them to the cart, and proceed to checkout.
Log in as an admin to manage products, customers, and categories.
Usage
User Flow:
Sign Up / Log In : Users can create an account or log in using their credentials.
Browse Products : Explore products under "New Arrivals" or "Shop by Category".
Add to Cart : Add desired products to the cart and adjust quantities.
Checkout : Complete the purchase process securely.
Admin Flow:
Log In : Access the admin dashboard using admin credentials.
Upload Products : Use the uploadProduct.php page to add new products.
Manage Customers : View and manage customer details via customers.php.
Update Products : Modify existing products using update_product.php.
Technologies Used
Frontend :
HTML
CSS
JavaScript
Bootstrap (for responsive design)
Backend :
PHP (for server-side logic)
MySQL (for database management)
Contributing
If you'd like to contribute to this project, feel free to fork the repository and submit a pull request. Suggestions and improvements are always welcome!

License
This project is licensed under the MIT License . Feel free to use, modify, and distribute the code as needed.

Contact
For any questions or feedback, feel free to reach out:

Email: robertmuendo828@gmail.com
GitHub: @Robert-kent-prog
