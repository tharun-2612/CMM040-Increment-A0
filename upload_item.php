
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./css/index.css" />
    <!-- Bootstrap Link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Upload New Item</title>
</head>
  <!-- Start of Body -->
<body class = "Uploadpage">
    <header>
            <?php include 'navbar.php'; ?>
    </header>  
    <main>
        <?php
        // Start the session to store user data
        session_start();

        // User login confirmation
        if (!isset($_SESSION['id'])) {
            header('Location: ../login.php');
            exit;
        }

        // Establish connection with the database
        require_once "connection.php"; 
        $itemName = $description = $category = $subcategory = "";
        $imagePath = "";
        $errors = [];
        // Server side code for Confirming form submission
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $itemName = isset($_POST['itemName']) ? htmlspecialchars($_POST['itemName']) : '';
            $description = isset($_POST['description']) ? htmlspecialchars($_POST['description']) : '';
            $category = isset($_POST['category']) ? htmlspecialchars($_POST['category']) : '';
            $subcategory = isset($_POST['subcategory']) ? htmlspecialchars($_POST['subcategory']) : '';
            if (isset($_FILES['itemImage'])) {
                if ($_FILES['itemImage']['error'] === UPLOAD_ERR_OK) {
                    $targetDir = "uploads/";
                    $fileName = basename($_FILES["itemImage"]["name"]);
                    $targetFilePath = $targetDir . $fileName;
                    $fileType = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));
                    $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
                    if (in_array($fileType, $allowTypes)) {
                        if (move_uploaded_file($_FILES["itemImage"]["tmp_name"], $targetFilePath)) {
                            $sql = "INSERT INTO productsservices (itemName, description, category, subcategory, imagePath) VALUES (?, ?, ?, ?, ?)";
                            $stmt = $conn->prepare($sql);
                            if ($stmt->execute([$itemName, $description, $category, $subcategory, $targetFilePath])) {
                                header("Location: seller.php?success=upload");
                                exit();  
                            } else {
                                $errors[] = "Error in inserting into the database.";
                            }
                        } else {
                            $errors[] = "Failed to upload file.";
                        }
                    } else {
                        $errors[] = "Only JPG, JPEG, PNG, & GIF files are allowed.";   
                    }
                }
            }
        }
        ?>
        <!-- HTML Form -->
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <div class="card">
                        <div class="card-header">
                            <h2 class="text-center">Upload New Item</h2>
                        </div>
                        <div class="card-body">
                            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
                                <div class="mb-3">
                                    <label for="itemName" class="form-label">Item Name:</label>
                                    <input type="text" class="form-control" name="itemName" id="itemName" required>
                                </div>

                                <div class="mb-3">
                                    <label for="description" class="form-label">Description:</label>
                                    <textarea class="form-control" name="description" id="description" required></textarea>
                                </div>

                                <div class="mb-3">
                                    <label for="category" class="form-label">Category:</label>
                                    <select class="form-select" name="category" id="categorySelect" onchange="updateSubcategories()" required>
                                        <option value="">Select a category...</option>
                                        <option value="Products">Products</option>
                                        <option value="Services">Services</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="subcategory" class="form-label">Subcategory:</label>
                                    <select class="form-select" name="subcategory" id="subcategorySelect" required>
                                        <option value="">Select a subcategory...</option>
                                     
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="itemImage" class="form-label">Item Image:</label>
                                    <input type="file" class="form-control" name="itemImage" id="itemImage" required>
                                </div>

                                <button type="submit" class="btn btn-primary">Upload Item</button>
                            </form>
                            <!-- End of HTML form -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Java script for displaying corresponding subcategpries for categories -->
        <script>
            function updateSubcategories() {
                var category = document.getElementById("categorySelect").value;
                var subcategorySelect = document.getElementById("subcategorySelect");

                subcategorySelect.innerHTML = ''; 

                if (category === "Products") {
                    var subcategories = ["Clothing", "Automobile", "Electronics", "Household"];
                } else if (category === "Services") {
                    var subcategories = ["Beauty Services", "Tutoring Services"];
                }
                subcategories.forEach(function(subcategory) {
                    var option = new Option(subcategory, subcategory);
                    subcategorySelect.add(option);
                });
            }
        </script>
        <!--End of javascript -->
            <!-- JS bundle for Bootstrap -->
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <?php include 'footer.php'; ?>
    </body>
      <!--End of body -->
</html>