<?php

/*
This script is setting up basic routing for a web application, 
deciding which controller actions to execute based on the requested path. 
The .htaccess file makes sure that all requests go through index.php, while passing the path as a query parameter. 
It also includes a setup for environment-specific configurations and error handling, 
leveraging the Dotenv library for environment variable management. 
The script handles both GET and POST requests, 
directing to the appropriate controller and method based on the path in the URL.
*/

// Require necessary files and classes
require_once 'vendor/autoload.php'; // Autoloads classes from the 'vendor' directory (Composer)
require_once __DIR__ . '/controllers/ProductController.php'; // Include the ProductController class
require_once __DIR__ . '/controllers/CartController.php'; // Include the CartController class

// Use Dotenv namespace for loading environment variables
use Dotenv\Dotenv;

// Create a new Dotenv instance pointing to the directory where .env file exists (current directory)
$dotenv = Dotenv::createImmutable(__DIR__);
// Load environment variables from .env file into PHP's $_ENV array
$dotenv->load();

// Define a constant to determine if the environment is a production or staging/test environment
define('PRODENV', $_ENV['PRODENV'] === 'true' ? true : false);

// Enable detailed error reporting if not in production environment
if (!PRODENV) {
    error_reporting(E_ALL);
    ini_set('display_errors', '1');
    ini_set('display_startup_errors', 1);
}

// Get the 'path' parameter from the query string (all requests go through index.php as index.php?path=x)
$path = $_GET['path'];

// Routing logic based on the request method and path
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Match path for list of products
    if ($path === 'products/list') {
        $controller = new ProductController();
        $controller->listProducts();
    // Match path for a single product
    } elseif (preg_match('#^products/(\d+)$#', $path, $matches)) {
        $productId = $matches[1]; // Extract the product ID from the URL
        $controller = new ProductController();
        $controller->showProduct($productId);
    // Match path for viewing the cart
    } elseif ($path === 'cart') {
        $controller = new CartController();
        $controller->showCart();
    // TODO: added the following temporary paths so these URLs keep working until they are properly routed through a controller
    } elseif ($path === 'about') {
        require_once __DIR__ . '/views/about.php';
    } elseif ($path === 'listing') {
        require_once __DIR__ . '/views/listing.php';
    } elseif ($path === 'login') {
        require_once __DIR__ . '/views/login.php';
    } elseif ($path === 'signup') {
        require_once __DIR__ . '/views/signup.php';
    } else {
        // Display 404 Not Found if no matching route
        // TODO: render 404 page
        echo "404 Not Found";
    }    
} else {
    // Handling POST requests
    if ($path === 'cart/add') {
        $controller = new ProductController();
        $controller->addToCart();
    } else if ($path === 'search') {
        $controller = new ProductController();
        $controller->searchProducts();
    } else {
        // Display 404 Not Found if no matching route
        // TODO: render 404 page
        echo "404 Not Found";
    }
}
