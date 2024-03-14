<?php
include '../../config.php';
$admin = new Admin();
if(isset($_POST['login'])){
$email = $_POST['email'];
$password = $_POST['pass'];

$stmt = $admin->ret("SELECT * FROM `admin` WHERE `admin_email`='$email'");
$count=$stmt->rowCount();
if ($count > 0) {
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $dbpass = $row['admin_password'];
    if (password_verify($password, $dbpass)) {
        $_SESSION['admin_id']=$row['admin_id'];
        echo "<script>alert('Login Successful');window.location='../index.php'</script>";
    } else {
        echo "<script>alert(' password is invalid');window.location='../login.php'</script>";
    }
} else {
    echo "<script>alert('Email is invalid');window.location='../login.php'</script>";
}
}
?>