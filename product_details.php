<?php
session_start();
include 'connection.php';

if (isset($_GET['id'])) {
    $productId = intval($_GET['id']);
    $productQuery = $conn->prepare("SELECT * FROM productsservices WHERE id = ?");
    $productQuery->execute([$productId]);
    $product = $productQuery->fetch(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Bootstrap Link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>
    <link rel="stylesheet" href="./css/index.css" />
    <title><?php echo $product ? htmlspecialchars($product['itemName']) : 'Product Not Found'; ?> | TeamO Mart</title>
</head>
<body class="homepage">
<header>
    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark opacity-75">
            <div class="container-fluid">
                <a class="navbar-brand" href="/index.php">
                    <img src="image/Bagsmely.png" height="80" alt="logo" />
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <a class="nav-link active" aria-current="page" href="homepage.php">Home</a>
                        <a class="nav-link" href="seller.php">Seller's Market</a>
                        <a class="nav-link" href="#contact">Contact us</a>
                        <!-- Cart Symbol Link -->
                    <a href="cart.php" class="nav-link">
                        <i class="fa fa-shopping-cart"></i> 
                    </a>
                    </div>
                </div>
                <a href="logout.php" class="btn btn-danger">Logout</a>
            </div>
        </nav>
    </div>
</header>
<main class = "product">
    <div class="container-fluid mt-5">
        <?php if ($product): ?>
            <div class="row">
                <div class="col-md-6">
                    <img src="<?php echo htmlspecialchars($product['imagePath']); ?>" alt="<?php echo htmlspecialchars($product['itemName']); ?>" class="img-fluid" />
                </div>
                <div class="col-md-6">
                    <h1><?php echo htmlspecialchars($product['itemName']); ?></h1>
                    <p class="description"><?php echo htmlspecialchars($product['description']); ?></p>
                    <h3>Price: £<?php echo htmlspecialchars($product['price']); ?></h3>
                    <form action="cart.php" method="post">
    <input type="hidden" name="productId" value="<?php echo $product['id']; ?>">
    <button type="submit" class="btn btn-primary">Add to Cart</button>
</form>

                </div>
            </div>
        <?php else: ?>
            <h2>Product not found!</h2>
        <?php endif; ?>
    </div>
</main>
<footer class="footer mt-auto py-3 bg-dark text-white">
    <div class="container">
        <span>&copy; 2024 TeamO Mart, Inc. All rights reserved.</span>
    </div>
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-4RaxMwhjY9GEix1AnXVtG81lNAlvJlC+9x3gROnShy85R8PfAa4TL/JbShp4iMIg" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
<script>
    function addToCart() {
        // To display a confirmation message
        alert("Item has been added to cart!");

        // To redirect to cart.php
        window.location.href = "cart.php";
    }
</script>
</body>
</html>
