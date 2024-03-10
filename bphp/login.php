<?php
   include("connection.php");
   if(isset($_GET['submit'])){
     $username = $_GET['user'];
     $password = $_GET['pass'];
     

     $sql = "select * from login where user='$username'";
     $result = mysqli_query ($con, $sql);
     $count_user = mysqli_num_rows($result);

     

     if($count_user == 0 & $count_email==0){
        if($password==$cpassword){
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $sql_insert = "INSERT INTO signup(user, email, password) VALUES('$username', '$email', '$hash')";
            $result_insert = mysqli_query($con, $sql_insert);
            if($result_insert){
                header("Location:welcome.php");
                exit();
            }
        }
     }
     else{
        if($count_user>0){
            echo '<script>
              window.location.href="index.php";
              alert("Username already exists!!");
            </script>';  
        }
        
        }
     }
   
?>