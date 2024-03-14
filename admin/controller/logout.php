<?php
include '../../config.php';
$admin=new Admin();
session_destroy();
unset($_SESSION['admin_id']);
echo "<script>alert('Logged out Successfully');window.location='../login.php'</script>";
?>