<?php
include '../../config.php';
$admin=new Admin();

if(isset($_GET['pay_id'])){
    $id=$_GET['pay_id'];
    
    $stmt=$admin->cud("DELETE FROM `payment` WHERE `payment_id`='$id'","delete");
    echo "<script>alert('Deleted Successfully');window.location='../payments.php';</script>";
}
?>