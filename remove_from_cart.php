<?php
session_start();

// Check if a product ID was posted and remove it from the cart
if (!empty($_POST['productId'])) {
    $productId = $_POST['productId'];
    unset($_SESSION['cart'][$productId]);
}

// Redirect back to the cart page
header("Location: cart.php");
exit();
?>
