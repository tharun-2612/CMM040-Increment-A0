<?php

session_start();
include 'connection.php';

// To fetch Unique Categories
$categories = $conn->query("SELECT DISTINCT category FROM productsservices");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TeamO Mart Sellers Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="./css/index.css" rel="stylesheet">
    <style>
      .col-md-4 {
            flex: 0 0 20%; 
            max-width: 20%; 
        }  
    </style>
</head>
<!-- Begining of Body -->
<body class="homepage">
    <header>
        <?php include 'navbar.php'; ?>
    </header>
    <main class="container-fluid mt-4 ">
        <?php while($category = $categories->fetch(PDO::FETCH_ASSOC)): ?>
            <section>
                <h2 class="section-title category-title"><?php echo htmlspecialchars($category['category']); ?></h2>
                <?php 
                $subcategories = $conn->prepare("SELECT DISTINCT subcategory FROM productsservices WHERE category=?");
                $subcategories->execute([$category['category']]);
                
                while($subcategory = $subcategories->fetch(PDO::FETCH_ASSOC)): ?>
                    <h3 class="subcategory-title"><?php echo htmlspecialchars($subcategory['subcategory']); ?></h3>
                    <div class="row">
                        <?php 
                        $items = $conn->prepare("SELECT * FROM productsservices WHERE category=? AND subcategory=? ORDER BY upload_date DESC");
                        $items->execute([$category['category'], $subcategory['subcategory']]);
                        
                        while($item = $items->fetch(PDO::FETCH_ASSOC)): ?>
                            <div class="col-md-4 mb-4">
                                <div class="card" onclick="toggleDescription(this)">
                                    <img src="<?php echo htmlspecialchars($item['imagePath']); ?>" alt="<?php echo htmlspecialchars($item['itemName']); ?>" class="card-img-top">
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo htmlspecialchars($item['itemName']); ?></h5>
                                        <p class="card-price">£<?php echo htmlspecialchars($item['price']); ?></p>
                                        <p class="card-text"><?php echo htmlspecialchars($item['description']); ?></p>
                                        <div class="upload-info">
                                            <a href="update_item.php?id=<?php echo $item['id']; ?>" class="btn btn-primary btn-sm">Update</a>
                                            <a href="delete_item.php?id=<?php echo $item['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this item?');">Delete</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    </div>
                <?php endwhile; ?>
            </section>
        <?php endwhile; ?>

        <div class="text-center">
            <a href="upload_item.php" class="btn btn-primary">Upload New Item</a>
        </div>
    </main>
    <footer>
        <?php include 'footer.php'; ?>
    </footer>
   
    <script>
    function toggleDescription(card) {
        var description = card.querySelector('.card-text');
        description.classList.toggle('visible');
    }
    </script>
</body>
<!-- End of Body -->
</html>