<?php
include '../config.php';
$admin = new Admin();

if(isset($_POST['elogin'])){
$email = $_POST['email'];
$password = $_POST['password'];
$stmt = $admin->ret("SELECT * FROM `provider` where `provider_email`='$email'");
$count = $stmt->rowCount();
if ($count > 0) {
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $dbpass = $row['provider_pass'];

    if (password_verify($password, $dbpass)) {
        $_SESSION['pid']= $row['provider_id'];
        echo "<script>alert('Logged In successfully');window.location='../employer_index.php';</script>";
    }
    else{
        echo "<script>alert('Email or Password is incorrect');window.location='../employer_login.php';</script>";
    }
}
else{
   echo "<script>alert('Email or Password is incorrect');window.location='../employer_login.php';</script>";
}
}
?>