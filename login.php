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
    <title>Your Mart</title>
  </head>
  <body class = loginpage>
    <header>
      <!-- Navigation Bar -->
      <div class="container-fluid">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark opacity-75">
          <div class="container-fluid">
            <a class="navbar-brand" href="/index.html"
              ><img src="image/Bagsmely.png" height="120" alt="logo" /></a
            >
           
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
                <a class="nav-link active" aria-current="page" href="/index.html"
                  >Home</a
                >
                <a class="nav-link" href="/product.html">Products</a>
                <div class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Market Place
                  </a>
                  
                </div>
                <a class="nav-link" href="#contact">Contact us</a>
              </div>
            </div>

            <form class="d-flex">
              <input
                class="form-control me-2"
                type="search"
                placeholder="Search"
                aria-label="Search"
              />
              <button class="btn btn-outline-success" type="submit">
                Search
              </button>
            </form>
            <a class="nav-link" aria-current="page" href="/login.html">Log in</a>
          </div>
        </nav>
      </div>
    </header>

      <!-- Login form -->
    <main class = loginpage>  
      <div class="container catagori">
        <div class="row">
          <div class="cat2 d-flex">
            <form class="shadow w-450 p-3" action="php/login.php" method="post">
            <h4>LOGIN</h4><br>
            <?php if (!empty($_GET['error'])): ?>
            <p style="color: red;"><?= $_GET['error'] ?></p>
            <?php endif; ?>

              <div class="mb-3">
              <label class="form-label">User name</label>
              <input type="text" 
                    class="form-control"
                    name="uname" value="<?= !empty($_GET['uname']) ? $_GET['uname'] : '' ?>">
               </div>

              <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" 
                      class="form-control"
                      name="pass">
              </div>
              <button type="submit" class="btn btn-primary">Login</button>
              <a href="index.php">Sign Up</a>
            </form>
          </div>
       </div>
      </div>
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
                     <li><a href="https://www.facebook.com/marketplace/create"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                     <li><a href="https://twitter.com/home?lang=en"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                     <li><a href="https://www.linkedin.com/feed/"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a></li>
                     <li><a href="https://www.instagram.com/?login&hl=en-gb"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
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
   
  </body>
  
</html>
