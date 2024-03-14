<?php
include '../../config.php';
$admin=new Admin();

if(isset($_GET['a_did'])){
    $id=$_GET['a_did'];
    
    $stmt=$admin->cud("DELETE FROM `application` WHERE `appliction_id`='$id'","delete");
    echo "<script>alert('Deleted Successfully');window.location='../jobs.php';</script>";
}
?>