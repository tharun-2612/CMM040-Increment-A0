<?php
session_start();
require_once "connection.php";

if(isset($_GET['id']) && !empty(trim($_GET['id']))){
    $id = trim($_GET['id']);

    // To delete statement
    $stmt = $conn->prepare("DELETE FROM productsservices WHERE id = ?");
    
    if($stmt->execute([$id])){
        header("Location: seller.php?message=Item deleted successfully");
        exit();
    } else {
        header("Location: seller.php?error=Error deleting item");
        exit();
    }
}