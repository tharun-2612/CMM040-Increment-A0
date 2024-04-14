<?php
include 'connection.php';

$category = $_GET['category'];
$subcategory = $_GET['subcategory'];
$searchQuery = $_GET['search'];


$sql = "SELECT * FROM productsservices WHERE category = :category AND subcategory = :subcategory AND itemName LIKE :searchQuery";
$stmt = $conn->prepare($sql);
$stmt->bindValue(':category', $category);
$stmt->bindValue(':subcategory', $subcategory);
$stmt->bindValue(':searchQuery', "%$searchQuery%"); 
$stmt->execute();
$filteredItems = $stmt->fetchAll(PDO::FETCH_ASSOC);

// To display the filtered items
foreach ($filteredItems as $item) {
    // To display item details
    echo "<h2>{$item['itemName']}</h2>";
    echo "<p>{$item['description']}</p>";
    echo "<p>£{$item['price']}</p>";
   
}
?>
