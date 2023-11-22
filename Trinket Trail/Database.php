<?php

// Require Composer's autoloader to automatically load dependencies
require_once 'vendor/autoload.php';

// Use Dotenv namespace for loading environment variables
use Dotenv\Dotenv;

class Database {
    // Define properties for database connection details
    private $host;
    private $db_name;
    private $username;
    private $password;
    private $conn;

    // Constructor to initialize the properties using environment variables
    public function __construct() {
        // Create a new Dotenv instance pointing to the directory where .env file exists
        $dotenv = Dotenv::createImmutable(__DIR__);
        // Load environment variables from .env file into PHP's $_ENV
        $dotenv->load();

        // Set database connection details from environment variables
        $this->host = $_ENV['DB_HOST'];
        $this->db_name = $_ENV['DB_NAME'];
        $this->username = $_ENV['DB_USER'];
        $this->password = $_ENV['DB_PASS'];
    }

    // Method to establish a database connection
    public function connect() {
        // Initialize connection to null
        $this->conn = null;

        try {
            // Attempt to establish a PDO connection with the database
            $this->conn = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->db_name, $this->username, $this->password);
            // Set the PDO error mode to exception for better error handling
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            // Catch and display any connection errors
            echo 'Connection Error: ' . $e->getMessage();
        }

        // Return the database connection object
        return $this->conn;
    }
}
