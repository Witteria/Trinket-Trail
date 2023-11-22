<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Trinket Trail</title>

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles -->
    <style>
        body {
            background-color: #0B0C10;
            color: #C5C6C7;
        }

        .navbar {
            background-color: #1F2833;
        }

        .navbar-toggler-icon::after {
            display: block;
            background-color: #C5C6C7;
            height: 3px; /* Adjust height if needed */
            width: 22px; /* Adjust width if needed */
            margin-top: 3px; /* Adjust spacing between lines if needed */
        }

        .navbar-dark .navbar-toggler {
            border-color: #C5C6C7;
        }

        .navbar-nav .nav-link {
            color: #C5C6C7;
        }

        .navbar-nav .nav-link:hover {
            color: #66FCF1;
        }

        .container {
            margin-top: 50px;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            color: #66FCF1;
        }

        .navbar-brand {
            order: -1; /* Set the order to place it on the left */
            margin-right: 15px; /* Adjust margin as needed */
        }

        .search-form {
            order: 1; /* Set the order to place it in the middle */
            margin-right: 10px;
        }

        .navbar-toggler {
            order: 2; /* Set the order to place it on the right */
        }

        /* Add a new class for dropdown items */
        .navbar-nav-dropdown {
            order: 3; /* Set the order to place it on the right */
        }

        @media (min-width: 768px) {
            /* Apply styles for screens larger than or equal to 768px */
            .navbar-nav {
                order: 1; /* Set the order to place it on the left */
            }

            .search-form {
                order: 2; /* Set the order to place it in the middle */
            }

            .navbar-toggler {
                order: 3; /* Set the order to place it on the right */
            }

            .navbar-nav-dropdown {
                order: 4; /* Set the order to place it on the right */
            }
        }
    </style>
</head>

<body>

    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <!-- Trinket Trail text with a hyperlink to the left -->
        <a class="navbar-brand" href="index.php">Trinket Trail</a>
        <!-- Navbar links on the left -->
        <div class="collapse navbar-collapse navbar-nav" id="navbarResponsive">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Saved Items</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="profile.php">View Profile</a>
                </li>
            </ul>
        </div>
        <!-- Search bar in the middle -->
        <form class="form-inline ml-auto search-form">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
        <!-- Navbar toggler on the right -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
            aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </nav>

    <!-- Page Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="my-4">Welcome to Trinket Trail</h1>
                <p>Find great deals on unique trinkets and treasures.</p>
            </div>
        </div>
        <!-- Add more content as needed -->
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>

</html>
