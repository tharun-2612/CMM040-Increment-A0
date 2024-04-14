
<?php

session_start();
require_once 'connection.php';

 
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    $id = htmlspecialchars($_POST['id']);
    $itemName = htmlspecialchars($_POST['itemName']);
    $description = htmlspecialchars($_POST['description']);
    $price = htmlspecialchars($_POST['price']);
    $imagePath = htmlspecialchars($_POST['existingImagePath']);

    // Upload Handling
    if (!empty($_FILES["itemImage"]["name"])) {
        $targetDir = "uploads/";
        $fileName = basename($_FILES["itemImage"]["name"]);
        $targetFilePath = $targetDir . $fileName;
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
        $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
        if (in_array($fileType, $allowTypes)) {
           
            if (move_uploaded_file($_FILES["itemImage"]["tmp_name"], $targetFilePath)) {
                
                $imagePath = $targetFilePath;
            } else {
                
                header("Location: seller.php?error=Failed to upload image");
                exit();
            }
        } else {
            
            header("Location: seller.php?error=Only JPG, JPEG, PNG, & GIF files are allowed");
            exit();
        }
    }

    // To Update database table
    $sql = "UPDATE productsservices SET itemName = ?, description = ?, price = ?, imagePath = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);

    if ($stmt->execute([$itemName, $description, $price, $imagePath, $id])) {
        header("Location: seller.php?success=Item updated successfully");
    } else {
        header("Location: seller.php?error=Failed to update item");
    }
} else {
    header("Location: seller.php?error=Invalid request");
}
?>
