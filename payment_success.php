<?php
session_start();


if (isset($_POST['cardNumber']) && isset($_POST['cardExpiry']) && isset($_POST['cardCVV'])) {
    

    
    unset($_SESSION['cart']);

    
    header("Location: payment.php?success=true");
    exit();
} else {
    
    header("Location: payment.php?error=true");
    exit();
}
?>
