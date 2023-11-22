<?php
require_once __DIR__ . '/../models/ProductModel.php';

class CartController
{
    private $model;

    public function __construct()
    {
        $this->model = new ProductModel();
    }

    public function showCart()
    {
        // Start the session if it's not already started
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        // Initialize the cart array
        $cart = [];

        // Check if there's a cart in the session and retrieve it
        if (isset($_SESSION['cart'])) {
            $cart = $_SESSION['cart'];
            $i = 0;
            foreach ($cart as $cartLine) {
                $cart[$i] = $this->model->getProduct($cartLine);
                $i++;
            }
        }

        // Load the cart view and pass the cart data to it
        require_once __DIR__ . '/../views/cart/cartView.php';
    }

    public function removeFromCart($productId)
    {
        // Start the session if it's not already started
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        // Initialize the cart array
        $cart = [];

        // Check if there's a cart in the session and retrieve it
        if (isset($_SESSION['cart'])) {
            $cart = $_SESSION['cart'];
            $key = array_search($productId, $cart);
            if ($key !== false) {
                unset($cart[$key]);
            }
        }

        // Load the cart view and pass the cart data to it
        require_once __DIR__ . '/../views/cart/cartView.php';
    }
}
