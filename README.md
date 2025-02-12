## Boutique E-Commerce Website

### Overview
This is a fully functional boutique e-commerce website built using **HTML, CSS, JavaScript, Bootstrap, PHP, and MySQL**. The website allows users to browse products, add items to their cart, check out, and manage their accounts. Admins can upload new products, manage categories, and view customer details.

---

### Features

#### **User Features**
- **Product Browsing**: Users can explore products categorized into different sections (e.g., New Arrivals, Shop by Category).
- **Shopping Cart**: Add, remove, or update items in the cart.
- **Checkout Process**: Securely complete purchases.
- **User Authentication**: Sign up, log in, and manage profiles.
- **Responsive Design**: Fully responsive layout for all devices.

#### **Admin Features**
- **Product Management**: Upload, update, and delete products.
- **Customer Management**: View and manage customer details.
- **Category Management**: Organize products into categories.
- **Dashboard**: Admin-specific dashboard with navigation and footer.

---

### File Structure

| **Folder/File**         | **Description**                                  |
|-------------------------|--------------------------------------------------|
| `admin/`               | Contains admin-related files                     |
| `admin/adminfooter.php` | Footer for admin pages                          |
| `admin/adminnavbar.php` | Navbar for admin pages                          |
| `admin/customers.php`   | Manage customers (admin-only)                   |
| `admin/index.php`       | Admin dashboard                                 |
| `admin/sidebar.php`     | Sidebar navigation for admin                    |
| `admin/update_product.php` | Update product details (admin-only)         |
| `admin/style.css`       | Styles for admin pages                          |
| `admin/style1.css`      | Additional styles for admin pages               |
| `images/`              | Folder for product images                        |
| `uploads/`             | Folder for uploaded product images               |
| `.gitignore`           | Git ignore file                                  |
| `add_to_cart.php`      | Handles adding products to the cart              |
| `authenticateUsers.php` | Authenticates user login                         |
| `cart.css`             | Styles for the cart page                         |
| `cart.php`             | Shopping cart page                               |
| `cartnavbar.php`       | Navbar for cart-related pages                    |
| `checkout.php`         | Checkout process page                            |
| `fetch_products.php`   | Fetches products from the database               |
| `footer.php`           | Footer for user-facing pages                     |
| `homepage.php`         | Main homepage of the website                     |
| `login.php`           | Login page for users                              |
| `navbar.php`           | Navbar for user-facing pages                     |
| `new_arrivals.php`     | Displays new arrivals section                    |
| `saveproducts.php`     | Saves products to the database                   |
| `saveusers.php`        | Saves user data to the database                  |
| `shopcategory.php`     | Displays products by category                    |
| `signup.php`           | Signup page for users                            |
| `sqlquery.php`        | Contains SQL queries for database operations      |
| `style.css`           | General styles for the website                    |
| `test.php`            | Test file for debugging purposes                  |
| `uploadProduct.php`    | Allows admins to upload new products             |

---

### Prerequisites

To run this project locally, you need the following tools installed on your machine:

- **Web Server**: A local web server that supports PHP and MySQL, such as:
  - XAMPP
  - WAMP
  - MAMP
- **Database**: Ensure that MySQL is installed and running. The project uses MySQL for storing product, user, and order data.
- **Browser**: Any modern browser (e.g., Chrome, Firefox, Edge).

---

### Setup Instructions

#### **Clone the Repository**
'''
git clone https://github.com/your-repo-url/boutique-ecommerce.git

## Set Up the Web Server

1. **Download and install XAMPP.**  
2. **Place the project folder (`boutique-ecommerce`) inside the `htdocs` directory of XAMPP.**  
   - On Windows: `C:\xampp\htdocs\`

## Configure the Database

1. **Start the Apache and MySQL services in XAMPP.**  
2. **Open phpMyAdmin:** [http://localhost/phpmyadmin](http://localhost/phpmyadmin)  
3. **Create a new database.**  
4. **Import the SQL schema from `sqlquery.php` into the database.**

## Run the Application

1. **Open your browser and navigate to:**
   - [http://localhost/boutique-ecommerce/homepage.php](http://localhost/boutique-ecommerce/homepage.php) (User View)
   - [http://localhost/boutique-ecommerce/admin/index.php](http://localhost/boutique-ecommerce/admin/index.php) (Admin View)

2. **Test the Features:**
   - Sign up or log in as a user.
   - Browse products, add them to the cart, and proceed to checkout.
   - Log in as an admin to manage products, customers, and categories.

---

## Usage

### **User Flow**
- **Sign Up / Log In:** Users can create an account or log in using their credentials.  
- **Browse Products:** Explore products under _"New Arrivals"_ or _"Shop by Category"_.  
- **Add to Cart:** Add desired products to the cart and adjust quantities.  
- **Checkout:** Complete the purchase process securely.  

### **Admin Flow**
- **Log In:** Access the admin dashboard using admin credentials.  
- **Upload Products:** Use `uploadProduct.php` to add new products.  
- **Manage Customers:** View and manage customer details via `customers.php`.  
- **Update Products:** Modify existing products using `update_product.php`.  

---

## Technologies Used

### **Frontend**
- **HTML**  
- **CSS**  
- **JavaScript**  
- **Bootstrap** _(for responsive design)_

### **Backend**
- **PHP** _(for server-side logic)_  
- **MySQL** _(for database management)_

---

## Contributing

If you'd like to contribute to this project, feel free to fork the repository and submit a pull request. Suggestions and improvements are always welcome!

---

## License

This project is licensed under the **MIT License**. Feel free to use, modify, and distribute the code as needed.

---

## Contact

For any questions or feedback, feel free to reach out:

- **Email:** robertmuendo828@gmail.com  
- **GitHub:** [@Robert-kent-prog](https://github.com/Robert-kent-prog)
