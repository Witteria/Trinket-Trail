<?php

/*
This class is responsible for managing product-related data interactions with the database. 
It includes methods for fetching all products, fetching a single product by ID, searching for products by name, 
creating a new product, and editing an existing product. 
The methods use prepared statements for security against SQL injection.
*/

// Include the Database connection file
require_once __DIR__ . '/../Database.php';

// ProductModel class handles database operations related to products
class ProductModel {
    private $db; // Database connection object

    // Predefined SQL queries as constants
    const QUERY_GET_ALL_PRODUCTS = 'SELECT * FROM Products';
    const QUERY_GET_PRODUCT_BY_ID = 'SELECT * FROM Products WHERE ProductID = :productId';
    const QUERY_SEARCH_PRODUCTS = 'SELECT * FROM Products WHERE ProductName LIKE :searchTerm';

    // Constructor connects to the database upon instantiation of the ProductModel
    public function __construct() {
        $this->db = (new Database())->connect();
    }

    // getProducts method retrieves all products from the database
    public function getProducts() {
        $stmt = $this->db->prepare(self::QUERY_GET_ALL_PRODUCTS);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC); // Fetches the results as an associative array
    }

    // getProduct method retrieves a single product by its ID
    public function getProduct($productId) {
        $stmt = $this->db->prepare(self::QUERY_GET_PRODUCT_BY_ID);
        $stmt->bindParam(':productId', $productId, PDO::PARAM_INT); // Binds the product ID parameter
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC); // Fetches a single product as associative array
    }

    // searchProducts method performs a search on product names
    public function searchProducts($searchTerm) {
        $searchTerm = "%$searchTerm%"; // Adds wildcard characters for partial matching

        $stmt = $this->db->prepare(self::QUERY_SEARCH_PRODUCTS);
        $stmt->bindParam(':searchTerm', $searchTerm, PDO::PARAM_STR); // Binds the search term
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC); // Fetches matched products
    }

    // createProduct method inserts a new product into the database
    public function createProduct($userId, $name, $description, $price) {
        $sql = "INSERT INTO products (user_id, name, description, price) VALUES (:user_id, :name, :description, :price)";
        $stmt = $this->db->prepare($sql);
        // Bind parameters for the INSERT query
        $stmt->bindParam(':user_id', $userId);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':price', $price);

        return $stmt->execute(); // Executes the query and returns the result
    }

    // editProduct method updates an existing product
    public function editProduct($productId, $name, $description, $price) {
        $sql = "UPDATE products SET name = :name, description = :description, price = :price WHERE id = :product_id";
        $stmt = $this->db->prepare($sql);
        // Bind parameters for the UPDATE query
        $stmt->bindParam(':product_id', $productId);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':price', $price);

        return $stmt->execute(); // Executes the query and returns the result
    }
}
