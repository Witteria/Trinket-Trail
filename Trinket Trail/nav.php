<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <?php
        require_once('stylesheets.php');
    ?>

    <style>
        body {
            background-image: url('images/hero_1.jpg');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            margin: 0;
            padding: 0;
        }

        .site-navbar {
            background-color: #0b0c10;
            position: fixed;
            width: 40%;
            z-index: 1000;
            padding: 10px;
            height: 50px;
            border-radius: 25px;
            left: 50%;
            transform: translateX(-50%);
        }

        .site-logo {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .site-logo a {
            color: #66fcf1;
            text-decoration: none;
            font-size: 1.2em;
            font-weight: bold;
            border-radius: 50%;
            overflow: hidden;
            display: inline-block;
            width: 40px;
            height: 40px;
            text-align: center;
            line-height: 40px;
            background-color: #0b0c10;
        }

        .site-menu {
            display: flex;
            justify-content: space-between;
            width: 100%;
            list-style: none;
            margin: 0;
            padding: 0;
        }

        .site-menu a {
            color: #66fcf1;
            text-decoration: none;
            padding: 5px 10px;
            border-radius: 10px;
            background-color: #0b0c10;
            transition: background-color 0.3s, color 0.3s;
        }

        .site-menu a:hover {
            background-color: #45a29e;
            color: #0b0c10;
        }

        .site-menu .nav-item.dropdown {
            background-color: #0b0c10;
        }

        .site-menu .nav-item.dropdown a {
            color: #66fcf1;
            background-color: #0b0c10;
            padding: 5px 10px;
            border-radius: 10px;
        }

        .site-menu .nav-item.dropdown a:hover {
            background-color: #45a29e;
            color: #0b0c10;
        }

        .site-menu .dropdown-menu {
            background-color: #0b0c10;
            border: none;
            margin-top: 10px;
        }

        .site-menu .dropdown-menu a {
            color: #66fcf1;
            background-color: #0b0c10;
            border-bottom: 1px solid #66fcf1;
            border-radius: 0; /* Remove border-radius */
            padding: 10px; /* Increase padding */
        }

        .site-menu .dropdown-menu a:hover {
            background-color: #45a29e;
            color: #0b0c10;
        }
    </style>
    <title>Website Menu #3</title>
    <!-- Add Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Your scripts and other meta tags go here -->
</head>

<body>
    <header class="site-navbar" role="banner">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="site-logo">
                            <h1 class="mb-0"><a href="index.html">Y</a></h1>
                        </div>
                        <nav class="site-navigation text-right" role="navigation">
                            <ul class="site-menu">
                                <li class="active"><a href="index.html"><span>Home</span></a></li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Dropdown
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="#">Menu One</a>
                                        <a class="dropdown-item" href="#">Menu Two</a>
                                        <a class="dropdown-item" href="#">Menu Three</a>
                                    </div>
                                </li>
                                <li><a href="listings.html"><span>Listings</span></a></li>
                                <li><a href="about.html"><span>About</span></a></li>
                                <li><a href="blog.html"><span>Blog</span></a></li>
                                <li><a href="contact.html"><span>Contact</span></a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Add Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>