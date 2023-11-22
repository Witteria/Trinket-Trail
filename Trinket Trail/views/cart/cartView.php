<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<title>Trinket Trail - Shopping Cart</title>
<meta name="description" content>
<meta name="viewport" content="width=device-width, initial-scale=1">

<?php
    include_once(__DIR__ . '/../includes/stylesheets.php');
?>

<!-- TODO: move this to a separate CSS file -->
<style>
        body {
            font-family: Arial, sans-serif;
            background-color: #0B0C10;
            margin: 0;
            padding: 0;
            color: #C5C6C7;
        }

        main {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #2C3539;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .cart-item {
            display: flex;
            align-items: center;
            border: 1px solid #66FCF1;
            padding: 10px;
            margin: 10px;
            background-color: #2C3539;
            border-radius: 10px;
        }

        .product-image-container {
            border: 1px solid #66FCF1;
            padding: 5px;
            border-radius: 10px;
        }

        .product-image {
            max-width: 100px;
            max-height: 100px;
            object-fit: cover;
        }

        .product-details {
            flex: 1;
        }

        .product-name {
            font-size: 1.2em;
            font-weight: bold;
            color: #66FCF1;
        }

        .product-category {
            color: #C5C6C7;
        }

        .product-price {
            color: #e44d26;
            font-size: 1.2em;
            font-weight: bold;
        }

        .product-description {
            margin-top: 10px;
            color: #C5C6C7;
        }

        .seller-info {
            margin-top: 10px;
            color: #C5C6C7;
        }
    </style>

</head>
<body>
    <main>
        <?php if (!empty($cart)): ?>
            <?php foreach ($cart as $cartLine): ?>
                <div class="cart-item">
                    <div class="product-image-container">
                        <img class="product-image" src="/assets/img/products/<?php echo $product['ProductID']; ?>.webp" alt="Product Image">
                    </div>
                    <div class="product-details">
                        <div class="product-name"><?php echo htmlentities($cartLine['ProductName']);?></div>
                        <div class="product-category">Category</div>
                        <div class="product-price"><?php echo htmlentities($cartLine['Price']);?></div>
                        <div class="product-description"><?php echo htmlentities($cartLine['Description']);?></div>
                        <div class="seller-info">Sold by: John Doe</div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>Your cart is empty.</p>
        <?php endif ?>
    </main>
</body>
</html>
