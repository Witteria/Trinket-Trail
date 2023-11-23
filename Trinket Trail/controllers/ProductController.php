<?php

require_once __DIR__ . '/../models/ProductModel.php';

class ProductController
{
    private $model;

    public function __construct()
    {
        $this->model = new ProductModel();
    }

    public function listProducts()
    {
        $products = $this->model->getProducts();

        // Load the view
        require_once __DIR__ . '/../views/product/listView.php';
    }

    public function showProduct($productId)
    {
        $product = $this->model->getProduct($productId);

        // Load the view
        require_once __DIR__ . '/../views/product/detailView.php';
    }

    public function searchProducts()
    {
        if (isset($_POST['searchTerm'])) {
            $products = $this->model->searchProducts($_POST['searchTerm']);
        }

        // Load the view
        require_once __DIR__ . '/../views/product/searchResults.php';
    }

    public function addToCart()
    {
        // Check if product ID is set and is a number
        if (isset($_POST['productId']) && is_numeric($_POST['productId'])) {
            $productId = $_POST['productId'];

            // Start session if not already started
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }

            // Check if the 'cart' session array exists
            if (!isset($_SESSION['cart'])) {
                $_SESSION['cart'] = [];
            }

            // Add the product ID to the cart
            // TODO: check that product ID exists before we add it to the session
            $_SESSION['cart'][] = $productId;

            // Redirect or output success message
            echo "Product added to cart successfully.";
        } else {
            // TODO: handle error in a more user friendly way
            echo "Invalid product ID.";
            exit();
        }
    }

    public function createProduct()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['name'] ?? '';
            $description = $_POST['description'] ?? '';
            $price = $_POST['price'] ?? 0;
            $userId = $_SESSION['user_id'] ?? null; // Make sure the user is logged in

            // Perform further validation and sanitization here

            if ($userId && $name && $description && $price) {
                // If validation passes, call the model method to create the product
                $result = $this->model->createProduct($userId, $name, $description, $price);

                if ($result) {
                    // Redirect to product listing or confirmation page
                    header('Location: /products/list');
                    exit;
                } else {
                    // Handle error
                    echo "An error occurred while creating the product.";
                }
            } else {
                // Handle validation error
                echo "Validation failed. All fields are required.";
            }
        } else {
            // Show the product creation form
            require_once '../views/product/createView.php';
        }
    }

    public function editProduct($productId)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['name'] ?? '';
            $description = $_POST['description'] ?? '';
            $price = $_POST['price'] ?? 0;
            $userId = $_SESSION['user_id'] ?? null; // Make sure the user is logged in

            // Perform further validation and sanitization here

            $product = $this->model->getProduct($productId);
            if ($product && $product['user_id'] == $userId) {
                // If validation passes and the user owns the product, call the model method to update the product
                $result = $this->model->editProduct($productId, $name, $description, $price);

                if ($result) {
                    // Redirect to product listing or confirmation page
                    header('Location: /products/list');
                    exit;
                } else {
                    // Handle error
                    echo "An error occurred while editing the product.";
                }
            } else {
                // Handle validation error or ownership issue
                echo "Validation failed or you do not have permission to edit this product.";
            }
        } else {
            // Show the product edit form
            $product = $this->model->getProduct($productId);
            if ($product) {
                require_once '../views/product/editView.php';
            } else {
                echo "Product not found.";
            }
        }
    }
}
