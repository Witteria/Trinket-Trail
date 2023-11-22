<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login Page</title>

  <?php
    require_once('includes/stylesheets.php');
  ?>

<style>
    body {
      background-color: #000000;
      color: #C5C6C7;
    }
    h2
    {
      text-align: center;
    }
    .login-container {
      max-width: 400px;
      margin: 0 auto;
      padding: 20px;
      margin-top: 5px;
      background-color: #1F2833;
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      color: white;
    }
    .form-control {
      background-color: #C5C6C7;
      color: #0B0C10;
    }
    .btn-primary {
      background-color: #66FCF1;
      border-color: #66FCF1;
      color: black;
    }
    .btn-primary:hover {
      background-color: #45A29E;
      border-color: #45A29E;
    }
    a {
      color: #66FCF1;
    }
    a:hover {
      color: #45A29E;
    }
    .logo-container {
      margin: 25px 0 25px 0;
      text-align: center;
    }
    .logo-container img {
      width: 400px;
      height: 200px;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="logo-container">
      <a href= "index.php">
        <img src="/assets/img/logo_main.png" alt="Logo">
      </a>
    </div>
    <div class="login-container">
      <h2 class="mb-4">Login</h2>
      <form method="post" action="">
        <div class="form-group">
          <label for="username">Username</label>
          <input type="text" class="form-control" id="username" name="username" placeholder="Enter your username">
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password">
        </div>
        <button type="submit" class="btn btn-primary btn-block mt-3" name="login">Login</button>
      </form>
      <p class="mt-3 text-center">Don't have an account? <a href="signup.php">Sign Up</a></p>
    </div>
  </div>

  <!-- Bootstrap JS and dependencies -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
