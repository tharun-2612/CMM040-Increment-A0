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

    
    <title>TeamO Mart Landing</title>
  </head>
  <body class = "indexpage">
    <header>
      <!-- Navigation Bar -->
      <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark opacity-75 transparent-navbar">
            <div class="container-fluid">
              <a class="navbar-brand" href="/index.php"
                ><img src="image/Bagsmely.png" height="70" alt="logo" /></a>
                  <a class="nav-link" href="#contact">Contact us</a>
                </div>
            </div>
        </nav>
      </div>
    </header>
    <main class="indexpage full-height">
    <div class="signup-intro text-center">
  <h1>Welcome to TeamO</h1>
 <p>The <span class="highlight">best way</span> to shop. Experience <span class="highlight">seamless online shopping</span> with us.</p>
</div>

  <div class="container" id="signup-form">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="transparent-form">
          <h2 class="text-center mb-4">Sign Up</h2>
          <!-- PHP Error Handling -->
          <?php if(isset($_GET['error'])){ ?>
            <div class="alert alert-danger" role="alert">
              <?php echo htmlspecialchars($_GET['error']); ?>
            </div>
          <?php } ?>
          <?php if(isset($_GET['success'])){ ?>
            <div class="alert alert-success" role="alert">
              <?php echo htmlspecialchars($_GET['success']); ?>
            </div>
          <?php } ?>
          <!-- Sign Up Form -->
          <form action="php/signup.php" method="post">
            <div class="form-group mb-3">
              <label for="fname">Full Name</label>
              <input type="text" class="form-control" id="fname" name="fname" value="<?php echo isset($_GET['fname']) ? htmlspecialchars($_GET['fname']) : ""; ?>" required>
            </div>
            <div class="form-group mb-3">
              <label for="email">Email</label>
              <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group mb-3">
              <label for="uname">Username</label>
              <input type="text" class="form-control" id="uname" name="uname" value="<?php echo isset($_GET['uname']) ? htmlspecialchars($_GET['uname']) : ""; ?>" required>
            </div>
            <div class="form-group mb-3">
              <label for="pass">Password</label>
              <input type="password" class="form-control" id="pass" name="pass" required>
            </div>
            <div class="form-group mb-3">
              <label for="confirmpass">Confirm Password</label>
              <input type="password" class="form-control" id="confirmpass" name="confirmpass" required>
            </div>
            <button type="submit" class="btn btn-primary">Sign Up</button>
            <a href="login.php" class="btn btn-link">Login</a>
          </form>
        </div>
      </div>
    </div>
  </div>
  
</main>

    <!-- footer -->
    <footer>
      <div class="footerindex">
         <div class="container">
            <div class="row">
               <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                  <a href="#top-of-page">
                     <img class="logo1" src="image/Bagsmely.png" height="70" alt="Footer Logo"/>
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
