<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./css/index.css" />
    <!-- Bootstrap Link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Item Update</title>
</head>
  <!-- Start of Body -->
<body class = "Uploadpage">
    <header>
        <?php include 'navbar.php'; ?>
    </header>
    <main>
        <?php
        require_once 'connection.php';
        if(isset($_GET['id']) && !empty(trim($_GET['id']))){
            $id = trim($_GET['id']);

            // php code for fetching item data
            $stmt = $conn->prepare("SELECT * FROM productsservices WHERE id = ?");
            $stmt->execute([$id]);
            $item = $stmt->fetch();
            
            if($item){
                if ($item) {
                    // Display the update form with item data
                    echo "<div class='container mt-5'>";
                    echo "<div class='row'>";
                    echo "<div class='col-md-8 offset-md-2'>";
                    echo "<div class='card'>";
                    echo "<div class='card-header'>";
                    echo "<h2 class='text-center'>Update Item</h2>";
                    echo "</div>";
                    echo "<div class='card-body'>";
                    echo "<form action='update_item_handler.php' method='post' enctype='multipart/form-data'>";
                    echo "<input type='hidden' name='id' value='" . htmlspecialchars($item['id']) . "' />";
                    echo "<div class='mb-3'><label>Item Name:</label><input type='text' name='itemName' value='" . htmlspecialchars($item['itemName']) . "' class='form-control'></div>";
                    echo "<div class='mb-3'><label>Description:</label><textarea name='description' class='form-control'>" . htmlspecialchars($item['description']) . "</textarea></div>";
                    echo "<div class='mb-3'><label>Price:</label><input type='text' name='price' value='" . htmlspecialchars($item['price']) . "' class='form-control'></div>";
                    echo "<div class='mb-3'><label>Item Image:</label><input type='file' name='itemImage' class='form-control'></div>";
                    echo "<button type='submit' class='btn btn-primary'>Update Item</button>";
                    echo "</form>";
                    } else {
                        // error handling
                        echo "<p>Item not found. <a href='seller.php'>Return to dashboard</a></p>";
                    }
                    } else {
                    // error handling
                    header("Location: seller.php?error=Item not found");
                    exit();
                    }
        
                }
        ?>
    </main>
    <footer>
        <?php include 'footer.php'; ?>
    </footer>
</body>
<!-- End of Body -->
</html>