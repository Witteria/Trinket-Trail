<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Secondhand Shop Cart</title>
    
    <?php
        require_once('stylesheets.php');
    ?>

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
        <div class="cart-item">
            <div class="product-image-container">
                <img class="product-image" src="product1.jpg" alt="Product Image">
            </div>
            <div class="product-details">
                <div class="product-name">Laptop</div>
                <div class="product-category">Electronics</div>
                <div class="product-price">$499.99</div>
                <div class="product-description">A high-quality used laptop in excellent condition.</div>
                <div class="seller-info">Sold by: John Doe</div>
            </div>
        </div>

        <div class="cart-item">
            <div class="product-image-container">
                <img class="product-image" src="product2.jpg" alt="Product Image">
            </div>
            <div class="product-details">
                <div class="product-name">Vintage Chair</div>
                <div class="product-category">Furniture</div>
                <div class="product-price">$29.99</div>
                <div class="product-description">A beautifully crafted vintage chair with unique details.</div>
                <div class="seller-info">Sold by: Jane Smith</div>
            </div>
        </div>
    </main>
</body>

</html>
