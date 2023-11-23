<?php

require_once __DIR__ . '/../models/UserModel.php';

class UserController {

    private $userModel;

    public function __construct() {
        $this->userModel = new UserModel();
    }

    public function login() {
        // You would get these from a login form submission
        $username = $_POST['username'] ?? '';
        $password = $_POST['password'] ?? '';

        // Perform input validation and sanitation here

        // Check credentials and login the user
        $user = $this->userModel->getUserByUsername($username);
        if ($user && password_verify($password, $user['password'])) {
            // Start the session and set user details
            session_start();
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];

            // Redirect to a protected area
            header('Location: /dashboard.php');
            exit;
        } else {
            // Handle login failure
            echo 'Invalid credentials.';
        }
    }

    public function register() {
        // You would get these from a registration form submission
        $username = $_POST['username'] ?? '';
        $password = $_POST['password'] ?? '';
        $email = $_POST['email'] ?? '';

        // Perform input validation, sanitation, and password hashing here

        // Create the user record
        $success = $this->userModel->createUser($username, password_hash($password, PASSWORD_DEFAULT), $email);

        if ($success) {
            // Redirect to the login page
            header('Location: /login.php');
            exit;
        } else {
            // Handle registration failure
            echo 'Registration failed.';
        }
    }

    public function forgotPassword() {
        $email = $_POST['email'] ?? '';

        // Perform input validation and sanitation here

        // Generate a password reset token
        $token = bin2hex(random_bytes(16));
        $this->userModel->storePasswordResetToken($email, $token);

        // Prepare the email content
        $to = $email;
        $subject = "Password Reset Request";
        $message = "Please click on the link to reset your password:\n\n";
        // TODO: change domain
        $message .= "https://www.domain.be/reset-password/$token\n\n";
        $message .= "If you did not request a password reset, please ignore this email.";
        $headers = "From: noreply@domain.be\r\n";
        $headers .= "Reply-To: no-reply@domain.be\r\n";

        // TODO: consider using a library for this like PHPMailer
        // Send the email
        if (mail($to, $subject, $message, $headers)) {
            echo "A password reset link has been sent to your email address.";
        } else {
            echo "Failed to send password reset email.";
        }
    }

    public function resetPassword($token) {
        $newPassword = $_POST['new_password'] ?? '';
        $confirmPassword = $_POST['confirm_password'] ?? '';

        // Check if the new passwords match
        if ($newPassword !== $confirmPassword) {
            echo "Passwords do not match.";
            return;
        }

        // Perform input validation, sanitation, and password strength checks here

        // Find the user by the reset token
        $user = $this->userModel->getUserByPasswordResetToken($token);

        // If a user with that token exists, reset their password
        if ($user) {
            $hashedNewPassword = password_hash($newPassword, PASSWORD_DEFAULT);
            $this->userModel->updateUserPassword($user['id'], $hashedNewPassword);

            // Remove or invalidate the reset token so it can't be used again
            $this->userModel->removePasswordResetToken($user['id']);

            echo "Your password has been reset successfully.";

            // Redirect to the login page or any other appropriate page
            header('Location: /login.php');
            exit;
        } else {
            echo "Invalid or expired password reset token.";
        }
    }

    public function logout() {
        // Start the session and unset user details
        session_start();
        unset($_SESSION['user_id']);
        unset($_SESSION['username']);

        // Destroy the session
        session_destroy();

        // Redirect to the homepage or login page
        header('Location: /index.php');
        exit;
    }

    public function changePassword() {
        // Start the session to get user ID
        session_start();
        $userId = $_SESSION['user_id'] ?? null;

        // You would get these from a change password form submission
        $currentPassword = $_POST['current_password'] ?? '';
        $newPassword = $_POST['new_password'] ?? '';

        // Perform input validation, sanitation, and check current password
        $user = $this->userModel->getUserById($userId);
        if ($user && password_verify($currentPassword, $user['password'])) {
            // Password is correct, proceed with changing the password
            $hashedNewPassword = password_hash($newPassword, PASSWORD_DEFAULT);
            $this->userModel->updateUserPassword($userId, $hashedNewPassword);

            // Inform the user of success
            echo 'Password changed successfully.';
        } else {
            // Handle password change failure
            echo 'Current password is incorrect.';
        }
    }
}
