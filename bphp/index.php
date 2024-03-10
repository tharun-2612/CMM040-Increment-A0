<?php
  include ("connection.php");
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel= "stylesheet" href="style.css">
  </head>
  <body>
    <div id="form">
      <h1 id = "heading">SignUp Form<h1><br></h1>
      <form name ="form" action = "signup.php" method="post"> <!--Form sends data to signup.php using the POST method -->
        <i class="bi bi-person-circle"></i>
        <input type = "text" id = "user" name ="user" placeholder = "Enter Username" required><br><br>
        <i class="bi bi-envelope-fill"></i>
        <input type = "email" id = "email" name ="email" placeholder = "Enter Email" required><br><br>
        <i class="bi bi-file-lock2-fill"></i>
        <input type = "password" id = "pass" name ="pass" placeholder = "Create Password" required><br><br>
        <i class="bi bi-file-lock2-fill"></i>
        <input type = "password" id = "password" name ="password" placeholder = "Confirm Password" required><br><br>
        <input type="submit" id="btn" name="submit" value="SignUp"/>




      </form>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>