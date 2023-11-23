<?php

/*
This class manages user-related operations in the database, like retrieving user details, 
creating new users, and handling password reset functionalities. 
The methods use prepared statements to securely interact with the database, preventing SQL injection attacks.
*/

// Include the Database connection file
require_once __DIR__ . '/../Database.php';

// UserModel class handles database operations related to users
class UserModel {
    private $db; // Database connection object

    // Constructor connects to the database upon instantiation of the UserModel
    public function __construct() {
        $this->db = (new Database())->connect();
    }

    // getUserByUsername retrieves a user by their username
    public function getUserByUsername($username) {
        // Prepare a SELECT statement to find a user by username
        $stmt = $this->db->prepare("SELECT * FROM users WHERE username = :username LIMIT 1");
        $stmt->bindParam(':username', $username); // Bind the username parameter
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC); // Fetches a single user as an associative array
    }

    // getUserById retrieves a user by their unique ID
    public function getUserById($userId) {
        // Prepare a SELECT statement to find a user by ID
        $stmt = $this->db->prepare("SELECT * FROM users WHERE id = :id LIMIT 1");
        $stmt->bindParam(':id', $userId); // Bind the user ID parameter
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC); // Fetches a single user as an associative array
    }

    // createUser inserts a new user into the database
    public function createUser($username, $passwordHash, $email) {
        // Prepare an INSERT statement to create a new user
        $stmt = $this->db->prepare("INSERT INTO users (username, password, email) VALUES (:username, :password, :email)");
        // Bind parameters for the INSERT query
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $passwordHash);
        $stmt->bindParam(':email', $email);

        return $stmt->execute(); // Executes the query and returns the result
    }

    // storePasswordResetToken updates a user's record with a password reset token
    public function storePasswordResetToken($email, $token) {
        // Prepare an UPDATE statement to store a password reset token
        $stmt = $this->db->prepare("UPDATE users SET password_reset_token = :token WHERE email = :email");
        // Bind parameters
        $stmt->bindParam(':token', $token);
        $stmt->bindParam(':email', $email);

        return $stmt->execute(); // Executes the query
    }

    // getUserByPasswordResetToken retrieves a user by their password reset token
    public function getUserByPasswordResetToken($token) {
        // Prepare a SELECT statement to find a user by password reset token
        $stmt = $this->db->prepare("SELECT * FROM users WHERE password_reset_token = :token LIMIT 1");
        $stmt->bindParam(':token', $token); // Bind the token parameter
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC); // Fetches a single user as an associative array
    }

    // removePasswordResetToken removes a password reset token from a user's record
    public function removePasswordResetToken($userId) {
        // Prepare an UPDATE statement to remove a password reset token
        $stmt = $this->db->prepare("UPDATE users SET password_reset_token = NULL WHERE id = :id");
        $stmt->bindParam(':id', $userId); // Bind the user ID

        return $stmt->execute(); // Executes the query
    }

    // updateUserPassword updates a user's password
    public function updateUserPassword($userId, $hashedNewPassword) {
        // Prepare an UPDATE statement to update a user's password
        $stmt = $this->db->prepare("UPDATE users SET password = :password WHERE id = :id");
        // Bind parameters
        $stmt->bindParam(':password', $hashedNewPassword);
        $stmt->bindParam(':id', $userId);

        return $stmt->execute(); // Executes the query and returns the result
    }
}
