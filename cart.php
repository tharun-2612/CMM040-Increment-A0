<?php
session_start();
include 'connection.php';

// To check if the cart is not empty

if (!empty($_POST['productId'])) {
    $productId = $_POST['productId'];
    $_SESSION['cart'][$productId] = $_SESSION['cart'][$productId] ?? 0;
    $_SESSION['cart'][$productId]++;
}
if (!empty($_SESSION['cart'])) {
    // To fetch products from the database based on the cart items
    $productIds = implode(',', array_keys($_SESSION['cart']));
    $cartQuery = $conn->prepare("SELECT * FROM productsservices WHERE id IN ($productIds)");
    $cartQuery->execute();
    $cartProducts = $cartQuery->fetchAll(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart | TeamO Mart</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>
    <link rel="stylesheet" href="./css/index.css" />
</head>
<body class="homepage">
<header>
<div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark opacity-75">
            <div class="container-fluid">
                <a class="navbar-brand" href="/index.php">
                    <img src="image/Bagsmely.png" height="80" alt="logo" />
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <a class="nav-link active" aria-current="page" href="homepage.php">Home</a>
                        <a class="nav-link" href="seller.php">Seller's Market</a>
                        <a class="nav-link" href="#contact">Contact us</a>
                    </div>
                </div>
                <a href="logout.php" class="btn btn-danger">Logout</a>
            </div>
        </nav>
    </div>
</header>
<main class = "cart">
    <div class="container mt-5">
        <h1 class="mb-4">Shopping Cart</h1>
        <?php if (!empty($cartProducts)): ?>
            <div class="row">
                <?php foreach ($cartProducts as $product): ?>
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <img src="<?php echo htmlspecialchars($product['imagePath']); ?>" class="card-img-top" alt="<?php echo htmlspecialchars($product['itemName']); ?>">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo htmlspecialchars($product['itemName']); ?></h5>
                                <p class="card-text"><?php echo htmlspecialchars($product['description']); ?></p>
                                <p class="card-text">Price: £<?php echo htmlspecialchars($product['price']); ?></p>
                                <form action="remove_from_cart.php" method="post">
                                    <input type="hidden" name="productId" value="<?php echo $product['id']; ?>">
                                    <button type="submit" class="btn btn-danger">Remove from Cart</button>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <!-- Checkout Button -->
            <div class="d-flex justify-content-center mt-4">
                <a href="payment.php" class="btn btn-success">Proceed to Checkout</a>
            </div>
        <?php else: ?>
            <p>Your cart is empty.</p>
        <?php endif; ?>
    </div>
</main>
<footer class="footer mt-auto py-3 bg-dark text-white">
    <div class="container">
        <span>&copy; 2024 TeamO Mart, Inc. All rights reserved.</span>
    </div>
</footer>
<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-4RaxMwhjY9GEix1AnXVtG81lNAlvJlC+9x3gROnShy85R8PfAa4TL/JbShp4iMIg" crossorigin="anonymous"></script>
</body>
</html>
