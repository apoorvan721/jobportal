<?php
include '../../config.php';
$admin=new Admin();

if(isset($_GET['r_id'])){
    $id=$_GET['r_id'];
    
    $stmt=$admin->cud("DELETE FROM `refer` WHERE `refer_id`='$id'","delete");
    echo "<script>alert('Deleted Successfully');window.location='../referrals.php';</script>";
}
?>