<?php 
include "../connection.php";

$fname = $_POST['fname'];
$uname = $_POST['uname'];
$email = $_POST['email']; 
$pass = $_POST['pass'];
$confirmpass = $_POST['confirmpass']; 

$data = "fname=".$fname."&uname=".$uname."&email=".$email;

if (empty($fname)) {
    $error = "Your full name is required";
    header("Location: ../index.php?error=$error&$data");
    exit;
} else if (!preg_match("/\s/", $fname)) {
    $error = "Your full name is required";
    header("Location: ../index.php?error=$error&$data");
    exit;
} else if (empty($email)) {
    $error = "Your email is required";
    header("Location: ../index.php?error=$error&$data");
    exit;
} else if (empty($pass)) {
    $error = "Your password is required";
    header("Location: ../index.php?error=$error&$data");
    exit;
} else if ($pass !== $confirmpass) {
    $error = "Passwords do not match";
    header("Location: ../index.php?error=$error&$data");
    exit;
} else {
    // To check if email already exists
    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$email]);
    if ($stmt->rowCount() > 0) {
        $error = "Email already exists";
        header("Location: ../index.php?error=$error&$data");
        exit;
    } // To check if username already exists
    $sql = "SELECT * FROM users WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$uname]);
    if ($stmt->rowCount() > 0) {
        $error = "Username already exists";
        header("Location: ../index.php?error=$error&$data");
        exit;
    }else {
       
        $pass = password_hash($pass, PASSWORD_DEFAULT);
    
        $sql = "INSERT INTO users(fname, username, email, password) VALUES(?,?,?,?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$fname, $uname, $email, $pass]);
    
        header("Location: ../index.php?success=Your account has been created successfully");
        exit;
    }
}
?>