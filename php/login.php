<?php 
session_start();

if(isset($_POST['uname']) && isset($_POST['pass'])){

    // Database connection
    include "../connection.php";

    // Get username and password from POST request
    $uname = $_POST['uname'];
    $pass = $_POST['pass'];

    // Check if username or password is empty
    if(empty($uname)){
        echo "User name is required";
        exit;
    } else if(empty($pass)){
        echo "Password is required";
        exit;
    } else {
        // Prepare SQL query to select user
        $sql = "SELECT * FROM users WHERE username = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$uname]);

        if($stmt->rowCount() == 1){
            $user = $stmt->fetch();

            if(password_verify($pass, $user['password'])){
                // Redirect to home page
                $_SESSION['id'] = $user['id'];
                $_SESSION['fname'] = $user['fname'];
                header("Location: ../homepage.php");
                exit;
            } else {
                echo "Incorrect username or password";
                exit;
            }
        } else {
            echo "Incorrect username or password";
            exit;
        }
    }
} else {
    header("Location: ../index.php?error=error");
    exit;
}
?>
