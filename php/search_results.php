<?php
// Starting the session
session_start();

// Include database connection
include "./connection.php";

// Uising th e GET command,fetch the category and subcategory 
$category = isset($_GET['category']) ? $_GET['category'] : '';
$subcategory = isset($_GET['subcategory']) ? $_GET['subcategory'] : '';

// Fetch items from the database based on the category and subcategory
$sql = "SELECT * FROM productsservices WHERE category = ? AND subcategory = ?";
$stmt = $conn->prepare($sql);
$stmt->execute([$category, $subcategory]);

// Fetch all matching rows
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

if($results) {
    echo "<h2>Items in " . htmlspecialchars($category) . " > " . htmlspecialchars($subcategory) . ":</h2>";
    foreach($results as $row) {
        echo "<p>" . htmlspecialchars($row['subcategory']) . "</p>"; 
    }
} else {
    echo "No items found in the selected category and sub-category.";
}

$category = 'Products'; 

$sql = "SELECT * FROM productsservices WHERE category = ?";
$stmt = $conn->prepare($sql);
$stmt->execute([$category]);

while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo "<div>";
    echo "<h3>".htmlspecialchars($row['itemName'])."</h3>";
    echo "<p>".htmlspecialchars($row['description'])."</p>";
    echo "<img src='".htmlspecialchars($row['imagePath'])."' alt='product image' style='width: 200px;'>";
    echo "</div>";
}
?>