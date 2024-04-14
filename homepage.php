<?php session_start();?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    
    <!-- Bootstrap Link -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
      crossorigin="anonymous"/>
    
      <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <!-- Extarnal css link -->
    <link rel="stylesheet" href="./css/index.css" />
    <title>TeamO Mart Home Page</title>
  </head>
  <body class= "homepage">
    <header>
      <!-- Navigation Bar -->
      <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark opacity-75">
          <div class="container-fluid">
            <a class="navbar-brand" href="/index.php"
              ><img src="image/Bagsmely.png" height="80" alt="logo" /></a>
           
            <button
              class="navbar-toggler"
              type="button"
              data-bs-toggle="collapse"
              data-bs-target="#navbarNavAltMarkup"
              aria-controls="navbarNavAltMarkup"
              aria-expanded="false"
              aria-label="Toggle navigation"
            >
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
              <div class="navbar-nav">
                <a class="nav-link active" aria-current="page" href="homepage.php">Home</a
                >
                
                <div class="navbar-nav">
                  <a class="nav-link active" href="seller.php" aria-current="page">
                    Seller's Market
                  </a>
                 
                </div>
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
    <main>
      <!-- Welcome Message -->
      <div class="welcomeNote p-2"> 
        <h1>Welcome <?php if(isset($_SESSION['fname'])): echo($_SESSION['fname']) . " "; endif; ?>to TeamO Mart</h1>
        <p>Explore the best products and services handpicked for you.</p>
        <a href="#product" class="ExploreBut">Explore Now</a>
      </div>

      <!-- Bootstrap Carousel -->
      <div class="container-fluid">
        <div
          id="carouselExampleIndicators"
          class="carousel slide caro-bg"
          data-bs-ride="carousel"
        >
          <div class="carousel-indicators">
            <button
              type="button"
              data-bs-target="#carouselExampleIndicators"
              data-bs-slide-to="0"
              class="active"
              aria-current="true"
              aria-label="Slide 1"
            ></button>
            <button
              type="button"
              data-bs-target="#carouselExampleIndicators"
              data-bs-slide-to="1"
              aria-label="Slide 2"
            ></button>
            <button
              type="button"
              data-bs-target="#carouselExampleIndicators"
              data-bs-slide-to="2"
              aria-label="Slide 3"
            ></button>
          </div>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <div class="row d-flex align-items-center">
                <div class="col-md-7">
                  <h1>Beauty services</h1>
                  <p>Lets make you look great for that special someone</p>
                  <h3 class="pricing">From £6</h3>
                  <button class="btn buy-now">Buy now</button>
                </div>
                <div class="col-md-5 d-flex justify-content-center">
                <img src="image/salon.png" class="d-block carousel-img" alt="Salon service Image"/>
                  <img src="image/Barbing.png" class="d-block carousel-img" alt="Salon service Image"/>
                  
                </div>
              </div>
            </div>

            <div class="carousel-item">
              <div class="row d-flex align-items-center">
                <div class="col-md-7">
                  <h1>Clothing and Accessories</h1>
                  <p>
                  High Quality Clothing at Affordable Prices
                  </p>
                  <h3 class="pricing">From £3</h3>
                  <button class="btn buy-now">Buy now</button>
                </div>
                <div class="col-md-5 d-flex justify-content-center">
                  <img src="image/clothing 2.png" class="d-block carousel-img" alt="Clothing" />
                  <img src="image/suitcase.png" class="d-block carousel-img" alt="Clothing" />
                </div>
              </div>
            </div>

            <div class="carousel-item">
              <div class="row d-flex align-items-center">
                <div class="col-md-7">
                  <h1>Household Item that matches your style</h1>
                  <p>Great Household items at Best Prices</p>
                  <h3 class="pricing">£1130</h3>
                  <button class="btn buy-now">Buy now</button>
                </div>
                <div class="col-md-5 d-flex justify-content-center">
                  <img src="image/Household Appliances.png" class="d-block carousel-img" alt="Household" />
                  <img src="image/Home appliances.png" class="d-block carousel-img" alt="Household" />
                </div>
              </div>
            </div>
          </div>
          <button
            class="carousel-control-prev"
            type="button"
            data-bs-target="#carouselExampleIndicators"
            data-bs-slide="prev"
          >
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button
            class="carousel-control-next"
            type="button"
            data-bs-target="#carouselExampleIndicators"
            data-bs-slide="next"
          >
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
      </div>
     

     <!-- Sample Products -->
     <section id="product">
    <div class="container-fluid">
        <form id="categoryForm" class="d-flex" action="search_result.php" method="GET">
            <select class="form-select me-2" name="category" id="categorySelect" onchange="updateSubcategories()">
                <option selected>Choose category...</option>
                <option value="products">Products</option>
                <option value="services">Services</option>
            </select>

            <select class="form-select me-2" name="subcategory" id="subcategorySelect">
                <option selected>Choose sub-category...</option>
            </select>

            <input class="form-control me-2" type="search" placeholder="Search items..." aria-label="Search" id="searchInput" name="search">

            <button class="btn btn-outline-success" type="submit">Go</button>
        </form>
    </div>
    <div class="containerT">
        <h1>Most Favorited Items</h1>
    </div>
    <div class="container-fluid">
    <?php
        include 'connection.php';
        $categoriesQuery = $conn->query("SELECT DISTINCT category FROM productsservices");
        while ($category = $categoriesQuery->fetch(PDO::FETCH_ASSOC)): ?>
            <h2 class="section-title category-title"><?php echo htmlspecialchars($category['category']); ?></h2>
            <div class="row row-cols-1 row-cols-md-5 g-4">
                <?php
                $itemsQuery = $conn->prepare("SELECT * FROM productsservices WHERE category = ?");
                $itemsQuery->execute([$category['category']]);
                while ($item = $itemsQuery->fetch(PDO::FETCH_ASSOC)): ?>
                    <div class="col item">
                        <div class="card h-100">
                            <img src="<?php echo htmlspecialchars($item['imagePath']); ?>" class="card-img-top" alt="<?php echo htmlspecialchars($item['itemName']); ?>" />
                            <div class="card-body">
                                <h5 class="card-title"><?php echo htmlspecialchars($item['itemName']); ?></h5>
                                <p class="card-text"><?php echo htmlspecialchars($item['description']); ?></p>
                                <h6>£<?php echo htmlspecialchars($item['price']); ?></h6>
                                <a href="product_details.php?id=<?php echo $item['id']; ?>" class="btn btn-primary">View Details</a>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php endwhile; ?>
    </div>
</section>
</main>
    <!-- footer -->
    <footer>
      <div class="footer">
         <div class="container">
            <div class="row">
               <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                  <a href="#top-of-page">
                     <img class="logo1" src="image/Bagsmely.png" alt="Footer Logo"/>
                  </a>
                  <ul class="social_icon">
                     <li><a href="https://www.facebook.com/marketplace/create" alt="facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                     <li><a href="https://twitter.com/home?lang=en" alt="twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                     <li><a href="https://www.linkedin.com/feed/" alt="linkedin"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a></li>
                     <li><a href="https://www.instagram.com/?login&hl=en-gb" alt="instagram><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                  </ul>
               </div>
               <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                  <h3>INFO</h3>
                  <ul class="about_us">
                     <li><a href="#">About Us</a></li>
                     <li><a href="#">FAQs</a></li>
                     <li><a href="#">Advertise</a></li>
                     <li><a href="#">Terms and Conditions</a></li>
                     <li><a href="PrivacyPolicy.html">Privacy Policy</a></li>
                     <li><a href="#">Help & Support</a></li>
                  </ul>
               </div>

               <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                  <h3>Contact Us</h3>
                  <ul class="conta">
                     <li>
                        <p>RGU, Garthdee</p>
                     </li>
                     <li>+44 35565962049</li>
                     <li>TeamO@gmail.com</li>

                  </ul>
               </div>
               <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                  <form class="bottom_form">
                     <h3>Newsletter</h3>
                     <input class="enter" placeholder="Enter your email" type="text" name="Enter your email">
                     <button class="sub_btn">subscribe</button>
                  </form>
               </div>
            </div>
         </div>
         <div class="copyright">
            <div class="container">
               <div class="row">
                  <div class="col-md-12">
                     <p>Copyright © 2024 TeamO, Inc. All rights reserved.</a></p>
                     
                  </div>
               </div>
            </div>
         </div>
      </div>
   </footer>
   

    <!-- JS bundle for Bootstrap -->
    <script
      src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
      integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
      integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13"
      crossorigin="anonymous"
    ></script>
   <!-- JS bundle for Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
<script>
  function updateSubcategories() {
    var category = document.getElementById("categorySelect").value;
    var subcategorySelect = document.getElementById("subcategorySelect");

    subcategorySelect.innerHTML = '';

    if (category === "products") {
      var subcategories = ["Clothing", "Automobile", "Electronics", "Household"];
    } else if (category === "services") {
      var subcategories = ["Beauty Services", "Tutoring Services"];
    }

    subcategories.forEach(function(subcategory) {
      var option = new Option(subcategory, subcategory.toLowerCase().replace(/\s+/g, '_'));
      subcategorySelect.add(option);
    });
  }

  function redirectToSubcategoryPage(event) {
    event.preventDefault();

    var categorySelect = document.getElementById("categorySelect");
    var category = categorySelect.value;
    var subcategorySelect = document.getElementById("subcategorySelect");
    var subcategory = subcategorySelect.value;

    var pageUrl = (category === "products" ? 'search_result.php' : 'search_result.php') + '?category=' + category + '&subcategory=' + subcategory;
    window.location.href = pageUrl;
  }

  // Function to filter items based on search input
  function filterItems() {
    var searchInput = document.getElementById("searchInput").value.toLowerCase();
    var items = document.querySelectorAll(".item");
    
    items.forEach(function(item) {
      var itemName = item.querySelector(".card-title").textContent.toLowerCase();
      if (itemName.includes(searchInput)) {
        item.style.display = "block";
      } else {
        item.style.display = "none";
      }
    });
  }

  document.getElementById("categoryForm").addEventListener("submit", redirectToSubcategoryPage);

  // To listen for input in the search bar and filter items accordingly
  document.getElementById("searchInput").addEventListener("input", filterItems);
</script>
</body>
</html>

