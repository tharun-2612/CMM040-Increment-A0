<?php
session_start();
include 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize the input data
    $street = htmlspecialchars(trim($_POST['street']));
    $houseNumber = htmlspecialchars(trim($_POST['houseNumber']));
    $city = htmlspecialchars(trim($_POST['city']));
    $plannedDeliveryTime = htmlspecialchars(trim($_POST['plannedDeliveryTime']));
    
    // Get the user ID from the session
    $userId = $_SESSION['user_id']; // Assuming you have stored the user ID in the session
    
    // Insert the buyer's details into the database
    $insertQuery = $conn->prepare("INSERT INTO buyer_details (buyer_id, street, house_number, city, planned_delivery_time) VALUES (:buyer_id, :street, :house_number, :city, :planned_delivery_time)");
    $insertQuery->bindParam(':buyer_id', $userId);
    $insertQuery->bindParam(':street', $street);
    $insertQuery->bindParam(':house_number', $houseNumber);
    $insertQuery->bindParam(':city', $city);
    $insertQuery->bindParam(':planned_delivery_time', $plannedDeliveryTime);
    
    if ($insertQuery->execute()) {
        // Redirect to payment success page
        header("Location: payment.php?success=true");
        exit();
    } else {
        // Redirect to payment error page
        header("Location: payment.php?error=true");
        exit();
    }
} else {
    // Redirect to payment page if accessed directly
    header("Location: payment.php");
    exit();
}
?>
