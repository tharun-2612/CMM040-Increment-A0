<?php
   include("connection.php");
   if(isset($_POST['submit'])){
     $username = $_POST['user'];
     $email = $_POST['email'];
     $password = $_POST['pass'];
     $cpassword = $_POST['password'];

  

    //  $sql = "select * from signup where user='$username'";
    //  $result = mysqli_query ($con, $sql);
    //  $count_user = mysqli_num_rows($result);

     $sql = "select * from signup where email='$email'";
     $result = mysqli_query ($con, $sql);
     $count_email = mysqli_num_rows($result); //count the number of rows where the email is the same as the email submitted

     

     if($count_email == 0){ //meaning no one is in with the same email
        if($password==$cpassword){
            $hash = password_hash($password, PASSWORD_DEFAULT); //this encrypts the password for the db and saves it as hash
            $sql_insert = "INSERT INTO signup(user, email, password) VALUES('$username', '$email', '$hash')";
            $result_insert = mysqli_query($con, $sql_insert);
            if($result_insert){ //if it inserts properly
              echo '<script>
              window.location.href="index.php";
              alert("Passwords do not match with confirmation!!");
              </script>';
                header("Location:login.php");
                exit();
            }
        }
        else{
         
           echo '<script>
          window.location.href="index.php";
          alert("Passwords do not match with confirmation!!");
          </script>';
        }
     }
     else{
        // if($count_user>0){
        //     echo '<script>
        //       window.location.href="index.php";
        //       alert("Username already exists!!");
        //     </script>';  
        // }
        if($count_email>0){
            echo '<script>
              window.location.href="index.php";
              alert("Email already exists!!");
            </script>'; 
        }
       
     }
     
   }
?>