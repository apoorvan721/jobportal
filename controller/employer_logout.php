<?php
include '../config.php';
$admin=new Admin();
session_destroy();
unset($_SESSION['pid']);
echo "<script>alert('Logged out Successfully');window.location='../employer_login.php'</script>";