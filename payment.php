<?php
session_start();
include 'connection.php';

if (empty($_SESSION['cart'])) {
    header("Location: cart.php");
    exit();
}

// To fetch products from the database based on the cart items
$productIds = implode(',', array_keys($_SESSION['cart']));
$cartQuery = $conn->prepare("SELECT * FROM productsservices WHERE id IN ($productIds)");
$cartQuery->execute();
$cartProducts = $cartQuery->fetchAll(PDO::FETCH_ASSOC);

$total = 0; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Head section -->
</head>
<body class="homepage">
<header>
    <!-- Navigation Bar -->
</header>
<main class="container mt-5">
    <div class="row">
        <!-- Display products in the cart -->
        <?php foreach ($cartProducts as $product): ?>
            <!-- Product cards -->
        <?php endforeach; ?>
        <div class="col-12">
            <h3>Total: £<?php echo number_format($total, 2); ?></h3>
        </div>
    </div>
    <!-- Buyer's details form -->
    <h1>Buyer's Details</h1>
    <form action="save_delivery_details.php" method="post">
        <div class="mb-3">
            <label for="street" class="form-label">Street Line</label>
            <input type="text" class="form-control" id="street" name="street" required>
        </div>
        <div class="mb-3">
            <label for="houseNumber" class="form-label">House Number</label>
            <input type="text" class="form-control" id="houseNumber" name="houseNumber" required>
        </div>
        <div class="mb-3">
            <label for="city" class="form-label">City</label>
            <input type="text" class="form-control" id="city" name="city" required>
        </div>
        <div class="mb-3">
            <label for="plannedDeliveryTime" class="form-label">Planned Delivery Time</label>
            <input type="datetime-local" class="form-control" id="plannedDeliveryTime" name="plannedDeliveryTime" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit Buyer's Details</button>
    </form>

    <?php
    
    if (isset($_GET['success']) && $_GET['success'] == 'true') {
        echo '<div class="alert alert-success" role="alert">
                Your order has been placed successfully. Thank you!
              </div>';
    } elseif (isset($_GET['error']) && $_GET['error'] == 'true') {
        echo '<div class="alert alert-danger" role="alert">
                Error occurred while placing your order. Please try again.
              </div>';
    }
    ?>
</main>
<footer class="footer mt-auto py-3 bg-dark text-white">
    <div class="container">
        <span>&copy; 2024 TeamO Mart, Inc. All rights reserved.</span>
    </div>
</footer>
<!-- JavaScript -->
</body>
</html>
