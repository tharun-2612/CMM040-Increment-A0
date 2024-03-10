<?php
$servername = "localhost";
$username = "root";
$password = "";
$db_name="cmm004";
$con = new mysqli($servername,$username,$password,$db_name, 3306);
if($con->connect_error){
    {
        die("connection failed:".$con->connect_error );
    }    
}
?>
