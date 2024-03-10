<?php
   include("connection.php");
   if(isset($_POST['submit'])){
     $email = $_POST['email'];
     $password = $_POST['pass'];

    //we searching for a user with email provided//
     $sql = "select * from signup where email='$email'";
     $result = mysqli_query ($con, $sql);
     $count_user = mysqli_num_rows($result); //count the number of rows where the email is the same as the email submitted

     if($count_user > 0){ //meaning user found. Now lets compare the password
        $row = $result->fetch_array(); //fetch the data in an array called row
        if(password_verify($password, $row["password"])){
            echo '<script>
              window.location.href="welcome.php";
              alert("Wonders!!");
            </script>';  
        }
         //check if the pasworf and the hashed one in the db are the same
     }
     else{
    
            echo '<script>
              window.location.href="login.php";
              alert("no user found!!");
            </script>';  
        }
     
       
     }
     
?>